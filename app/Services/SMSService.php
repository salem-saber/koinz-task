<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SMSService
{


    private mixed $smsProvider;

    public function __construct()
    {
        $this->smsProvider = env('SMS_PROVIDER');
    }

    public function sendSMS($phone, $message)
    {

        try {
            $this->{$this->smsProvider}($phone, $message);
            Log::info('SMS sent successfully');
        } catch (\Exception $e) {
            Log::error('SMS sending failed: ' . $e->getMessage());
        }


    }

    public function ProviderA($phone, $message)
    {
        Http::withOptions(['verify' => false])->post(env('SMS_PROVIDER_A_URL'), [
            'phone' => $phone,
            'message' => $message
        ]);
    }

    public function ProviderB($phone, $message)
    {

        Http::withOptions(['verify' => false])->post(env('SMS_PROVIDER_B_URL'), [
            'phone' => $phone,
            'message' => $message
        ]);
    }


}
