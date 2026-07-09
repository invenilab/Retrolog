<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use RetroCore\Routing\Router;

return function (Router $router): void {
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/health', [HomeController::class, 'health']);

    $router->get('/login', [AuthController::class, 'showLogin'], [GuestMiddleware::class]);
    $router->post('/login', [AuthController::class, 'login'], [GuestMiddleware::class]);

    $router->get('/register', [AuthController::class, 'showRegister'], [GuestMiddleware::class]);
    $router->post('/register', [AuthController::class, 'register'], [GuestMiddleware::class]);

    $router->post('/logout', [AuthController::class, 'logout'], [AuthMiddleware::class]);

    $router->get('/dashboard', [DashboardController::class, 'index'], [AuthMiddleware::class]);
};
