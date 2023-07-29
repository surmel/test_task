<?php

namespace App\Services;

class CsrfSecurityService
{
    /**
     * @return void
     * @throws \Exception
     */
    public function generateToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $csrf_token = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $csrf_token;
        }
    }

    /**
     * @param $post
     * @param $session
     * @return bool
     */
    public function isValid($post, $session) {
        return $post['csrf_token'] === $session['csrf_token'];
    }
}