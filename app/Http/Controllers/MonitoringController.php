<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class MonitoringController extends Controller
{
    function monitoring(Request $request) {
        $tgldipilih = $request->route("tgl");
        if ($tgldipilih == null) {
            $tgldipilih = Carbon::now('Asia/Jakarta');
        } 

        $karyawan = DB::table('users')
            ->join('absen', 'users.id', '=', 'idkaryawan')
            ->select('users.*', 'absen.*')
            // ->where('absen.tgl', $tgldipilih->format('Y-m-d'))
            ->get();
        $data = array(
            'active'=>'monitoring',
            'datas' => $karyawan,
            'date' => $tgldipilih
            );
        return view('monitoring')->with($data);
    }

    function cetaklaporan(Request $request) {
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $tglawal = $request->input("tglawal");
        $tglakhir = $request->input("tglakhir");

        $datas = DB::table('users')
            ->join('absen', 'users.id', '=', 'idkaryawan')
            ->select('users.*', 'absen.*')
            // ->where('absen.tgl','like', Carbon::today()->toDateString())
            ->get();

        foreach ($datas as $d) {
            if ($d->tgl != null) {
                $pecahkan = explode('-', $d->tgl);
                $newDate = explode(' ', $pecahkan[2])[0].' '.$bulan[$pecahkan[1]].' '. $pecahkan[0] ;
                $d->tgl = $newDate;
            }
        }
        $pdf = PDF::loadview('laporanpdf',['datas'=>$datas]);
        return $pdf->stream();
    }

    function detailabsen($id) {
        $absen = DB::table('users')
        ->join('absen', 'users.id', '=', 'idkaryawan')->where('absen.id', $id)->get();
        $data = array(
            'active'=>'monitoring',
            'datas' => $absen,
            );
        return view('detailabsen')->with($data);
    }

    function laporan(Request $request) {
        $tgldipilih = $request->route("tglawal");
        if ($tgldipilih == null) {
            $tgldipilih = Carbon::now('Asia/Jakarta');
        } 

        $karyawan = DB::table('users')
            ->join('absen', 'users.id', '=', 'idkaryawan')
            ->select('users.*', 'absen.*')
            // ->where('absen.tgl', $tgldipilih->format('Y-m-d'))
            ->get();
        $data = array(
            'active'=>'laporan',
            'datas' => $karyawan,
            'date' => $tgldipilih
            );
        return view('laporan')->with($data);
    }
}
