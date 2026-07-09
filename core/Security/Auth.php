<?php

declare(strict_types=1);

namespace RetroCore\Security;

use App\Models\User;
use RetroCore\Session\Session;

final class Auth
{
    public static function attempt(string $email, string $password): bool
    {
        $user = User::findByEmail($email);

        if (! $user || ! password_verify($password, $user['password'])) {
            return false;
        }

        Session::regenerate();
        Session::put('user_id', (int) $user['id']);

        return true;
    }

    public static function loginById(int $id): void
    {
        Session::regenerate();
        Session::put('user_id', $id);
    }

    public static function user(): ?array
    {
        $id = Session::get('user_id');

        if (! $id) {
            return null;
        }

        return User::findById((int) $id);
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function logout(): void
    {
        Session::forget('user_id');
        Session::regenerate();
    }
}
