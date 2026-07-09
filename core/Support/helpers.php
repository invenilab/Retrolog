<?php

declare(strict_types=1);

if (! function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        return rtrim(BASE_PATH . ($path ? DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR) : ''), DIRECTORY_SEPARATOR);
    }
}

if (! function_exists('view')) {
    function view(string $template, array $data = [], string $layout = 'layouts/main'): string
    {
        return (new RetroCore\View\View(base_path('resources/views')))->render($template, $data, $layout);
    }
}

if (! function_exists('e')) {
    function e(mixed $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (! function_exists('env_value')) {
    function env_value(string $key, mixed $default = null): mixed
    {
        $value = $_ENV[$key] ?? getenv($key);
        if ($value === false || $value === null) {
            return $default;
        }

        return match (strtolower((string) $value)) {
            'true' => true,
            'false' => false,
            'null' => null,
            default => $value,
        };
    }
}

if (! function_exists('redirect')) {
    function redirect(string $path): RetroCore\Http\Response
    {
        return RetroCore\Http\Response::redirect($path);
    }
}

if (! function_exists('csrf_field')) {
    function csrf_field(): string
    {
        $token = RetroCore\Security\Csrf::token();
        return '<input type="hidden" name="_csrf" value="' . e($token) . '">';
    }
}

if (! function_exists('old')) {
    function old(string $key, string $default = ''): string
    {
        $old = RetroCore\Session\Session::pull('_old', []);
        RetroCore\Session\Session::put('_old', $old);
        return (string)($old[$key] ?? $default);
    }
}

if (! function_exists('flash')) {
    function flash(string $key): ?string
    {
        return RetroCore\Session\Session::pull($key);
    }
}
