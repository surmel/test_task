<?php

namespace App\Services;

class SmsService
{
    public function __construct()
    {
        $this->connect();
    }

    private function connect() {
        // set connection
    }

    public function send($number, $body) {
        //send sms
    }
}