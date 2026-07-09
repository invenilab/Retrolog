<?php

declare(strict_types=1);

return [
    'name' => env_value('APP_NAME', 'RetroLog'),
    'env' => env_value('APP_ENV', 'local'),
    'debug' => env_value('APP_DEBUG', true),
    'url' => env_value('APP_URL', 'http://localhost:8080'),
    'timezone' => env_value('APP_TIMEZONE', 'Europe/Madrid'),
];
