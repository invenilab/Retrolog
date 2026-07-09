<?php

declare(strict_types=1);

namespace RetroCore\Security;

use RetroCore\Session\Session;

final class Csrf
{
    public static function token(): string
    {
        $token = Session::get('_csrf_token');

        if (! is_string($token) || $token === '') {
            $token = bin2hex(random_bytes(32));
            Session::put('_csrf_token', $token);
        }

        return $token;
    }

    public static function validate(?string $token): bool
    {
        return is_string($token) && hash_equals((string) Session::get('_csrf_token'), $token);
    }
}
