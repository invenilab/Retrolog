<?php

declare(strict_types=1);

namespace App\Middleware;

use RetroCore\Http\Request;
use RetroCore\Http\Response;
use RetroCore\Security\Auth;

final class GuestMiddleware
{
    public function handle(Request $request): ?Response
    {
        if (Auth::check()) {
            return Response::redirect('/dashboard');
        }

        return null;
    }
}
