<?php

declare(strict_types=1);

return [
    'default' => env_value('DB_CONNECTION', 'mysql'),
    'connections' => [
        'mysql' => [
            'host' => env_value('DB_HOST', 'mariadb'),
            'port' => env_value('DB_PORT', '3306'),
            'database' => env_value('DB_DATABASE', 'retrolog'),
            'username' => env_value('DB_USERNAME', 'retrolog'),
            'password' => env_value('DB_PASSWORD', 'retrolog_dev_password'),
            'charset' => 'utf8mb4',
        ],
    ],
];
