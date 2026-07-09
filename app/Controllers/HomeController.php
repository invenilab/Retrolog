<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use RetroCore\Http\Request;
use RetroCore\Http\Response;

final class HomeController
{
    public function index(Request $request): Response
    {
        return Response::html(view('home/index', [
            'title' => 'RetroLog',
            'subtitle' => 'Primer acercamiento funcional con registro, login y dashboard.',
            'userCount' => User::count(),
        ]));
    }

    public function health(Request $request): Response
    {
        return Response::json([
            'status' => 'ok',
            'service' => 'retrolog',
            'version' => 'v1.0-alpha.iteration-4',
            'php' => PHP_VERSION,
            'timestamp' => date(DATE_ATOM),
        ]);
    }
}
