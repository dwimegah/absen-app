<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\KehadiranRequest;
use App\Http\Request\KetidakhadiranRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Twilio\Rest\Client;

class AbsenController extends Controller
{
    function absen(Request $request) {
        $absen = DB::table('users')
            ->join('absen', 'absen.idkaryawan', '=', 'users.id')
            ->select('absen.*')
            ->whereRaw('absen.idkaryawan = ?', Auth::id())
            ->whereRaw('DATE_FORMAT(absen.jammasuk, "%Y-%m-%d") = ?', Carbon::now('Asia/Jakarta')->format('Y-m-d'))
            ->first();
        $pulang= null;
        if ($absen != null) {
            $pulang = $absen->absenpulang;
        }
        $data = array(
            'active'=>'absensi',
            'absen' => $absen,
            'pulang' => $pulang
            );
        return view('absen')->with($data);
    }
    
    public function saveabsen(KehadiranRequest $request) {
        $absenmasuk = $request->input('absenmasuk');
        $absenpulang = $request->input('absenpulang');

        $date = Carbon::now('Asia/Jakarta');

        if ($absenpulang != null) {
            $datas = DB::table('absen')
            ->where('id', $request->input('id'))
            ->update([
                'absenmasuk' => $absenmasuk,
                'jampulang' => $date->format('Y-m-d H:i:s'),
                'absenpulang' => $absenpulang,
                'keterangan' => $request->input('keterangan'),
            ]);
        } else {
            $request->validated();
            $datas = DB::table('absen')->insert([
                'idkaryawan' => $request->input('idkaryawan'),
                'absenmasuk' => $absenmasuk,
                'kehadiran' => "Hadir",
                'tgl' => $date->format('Y-m-d'),
                'jammasuk' => $date->format('Y-m-d H:i:s'),
                'jammasuk' => $date->format('Y-m-d H:i:s'),
                'absenpulang' => $absenpulang,
                'keterangan' => $request->input('keterangan'),
            ]);
        }

        return redirect()->route('absen');
    }

    public function saveketidakhadiran(KetidakhadiranRequest $request) {
        $request->validated();

        $idkaryawan = $request->idkaryawan;
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        $keterangan = $request->keterangan;
        $media = $request->media;

        $name = $request->input('name');
        $filename = $name.".".request()->media->getClientOriginalExtension();
        request()->media->move(public_path('file/ketidakhadiran'), $filename);

        $period = CarbonPeriod::create($tglawal, $tglakhir);

        // Iterate over the period
        foreach ($period as $date) {
            $karyawan = DB::table('absen')->insert([
                'kehadiran' => 'Tidak Hadir',
                'idkaryawan' => $idkaryawan,
                'tgl' => $date->format('Y-m-d'),
                'keterangan' => $keterangan,
                'media' => $filename
            ]);
        }
       
        return redirect()->route('monitoring');
    }

    public function sendmessage(Request $request) {
        try {
            $datas;
            $tgl = Carbon::now('Asia/Jakarta');
            
            if (Auth::user()->role == "superuser") {
                $datas = DB::table('users')
                ->join('absen', 'users.id', '=', 'idkaryawan')
                ->select('users.*', 'absen.*')
                ->where('absen.kehadiran', 'Tidak Hadir')
                ->where('absen.tgl', $tgl->format('Y-m-d'))
                ->get();
            } 
            else if (Auth::user()->role == "manager") {
                $datas = DB::table('users')
                ->join('absen', 'users.id', '=', 'idkaryawan')
                ->select('users.*', 'absen.*')
                ->where('users.projek', Auth::user()->projek)
                ->where('absen.kehadiran', 'Tidak Hadir')
                ->where('absen.tgl', $tgl->format('Y-m-d'))
                ->get();
            }
    
            $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
    
            if (sizeof($datas) > 0) {
                $body = "Selamat pagi. \n" .
                "Berikut list yang tidak hadir hari ini: \n";
                $i = 1;

                foreach ($datas as $d) {
                    $body .= strval($i) . '. ' . $d->name . " (" . $d->jabatan . ") \n";
                    $i++;
                }
                // dd($body);

                $message = $twilio->messages->create("whatsapp:+6281210669194", [
                    'from' => "whatsapp:".env('twilio_whatsapp_number'),
                    'body' => $body,
                ]);

                dd($body);
            } else {
                $message = $twilio->messages->create("whatsapp:+6281210669194", [
                    'from' => "whatsapp:".env('twilio_whatsapp_number'),
                    'body' => "Hari ini semua karyawan hadir.",
                ]);
                dd($message);
            }
        } catch (\Exception $e) {
            // dd($e);
        }
    }
}
