<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\KehadiranRequest;
use App\Http\Request\KetidakhadiranRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;
use Carbon\Carbon;

class AbsenController extends Controller
{
    function absen() {
        $data = array(
            'active'=>'absensi',
            'dataHadir' => null
            );
        return view('absenmasuk')->with($data);
    }
    
    public function saveabsen(KehadiranRequest $request) {
        $name = $request->input('name');
        $absenmasuk = $request->input('absenMasuk');
        $absenpulang = $request->input('absenPulang');

        $date = Carbon::now('Asia/Jakarta');

        $fileName = $name .'_'. $date->format('Y-m-d H:i:s'). '_' . '.jpg';

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

        return redirect()->route('absen');
    }

    public function saveketidakhadiran(KetidakhadiranRequest $request) {
        $request->validated();

        $idkaryawan = $request->idkaryawan;
        $tglawal = $request->tglawal;
        $keterangan = $request->keterangan;
        $media = $request->media;

        $name = $request->input('name');
        $filename = $name.".".request()->media->getClientOriginalExtension();
        request()->media->move(public_path('file/ketidakhadiran'), $filename);

        $karyawan = DB::table('absen')->insert([
            'kehadiran' => 'Tidak Hadir',
            'idkaryawan' => $idkaryawan,
            'tgl' => $tglawal,
            'keterangan' => $keterangan,
            'media' => $filename
        ]);

        return redirect()->route('monitoring');
    }
}
