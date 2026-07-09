<?php

declare(strict_types=1);

namespace App\Controllers;

use RetroCore\Http\Request;
use RetroCore\Http\Response;
use RetroCore\Security\Auth;

final class DashboardController
{
    public function index(Request $request): Response
    {
        return Response::html(view('dashboard/index', [
            'title' => 'Panel',
            'user' => Auth::user(),
        ]));
    }
}
