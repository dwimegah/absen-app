<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Schedule;
use Twilio\Rest\Client;
use Illuminate\Console\Command;

class SendNotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send whatsapp notification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
    
            $message = $twilio->messages->create("whatsapp:+6281210669194", [
                'from' => "whatsapp:".env('twilio_whatsapp_number'),
                'body' => "Hari ini semua karyawan hadir.",
            ]);
        } catch (\Exception $e) {
            // dd($e);
        }
    }
}
