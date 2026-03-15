<?php

namespace App\Helpers;

class CaptchaHelper
{
    public static function generate($length = 8)
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
        $captcha = '';

        for ($i = 0; $i < $length; $i++) {
            $captcha .= $characters[random_int(0, strlen($characters) - 1)];
        }

        session([
            'captcha_text' => $captcha,
            'captcha_expires' => now()->addMinutes(5),
        ]);

        return $captcha;
    }
}
