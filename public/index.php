<?php

declare(strict_types=1);

use RetroCore\Config\Config;
use RetroCore\Http\Request;
use RetroCore\Routing\Router;
use RetroCore\Session\Session;

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

$config = new Config(BASE_PATH);
date_default_timezone_set($config->get('app.timezone', 'Europe/Madrid'));

Session::start();

$router = new Router();

(require BASE_PATH . '/routes/web.php')($router);

try {
    $response = $router->dispatch(Request::capture());
} catch (Throwable $exception) {
    if ($config->get('app.debug', true)) {
        $response = RetroCore\Http\Response::html(
            '<h1>RetroLog Error</h1><pre>' . htmlspecialchars((string) $exception, ENT_QUOTES, 'UTF-8') . '</pre>',
            500
        );
    } else {
        $response = RetroCore\Http\Response::html(view('errors/500'), 500);
    }
}

$response->send();
