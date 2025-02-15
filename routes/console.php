<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Twilio\Rest\Client;

Artisan::command('notif:send', function () {
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

        } else {
            $message = $twilio->messages->create("whatsapp:+6281210669194", [
                'from' => "whatsapp:".env('twilio_whatsapp_number'),
                'body' => "Hari ini semua karyawan hadir.",
            ]);
        }
    } catch (\Exception $e) {
        // dd($e);
    }
})->timezone('Asia/Jakarta')->at('22:30');
