<?php

namespace App\Services;
class EmailService
{
    public function __construct()
    {
        $this->connect();
    }

    private function connect() {
        // set connection
    }

    public function send($email, $body) {
        // send email
    }

}