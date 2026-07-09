<?php

declare(strict_types=1);

namespace RetroCore\Config;

final class Config
{
    private array $items = [];

    public function __construct(private readonly string $basePath)
    {
        $this->loadEnv();
        $this->items = [
            'app' => require $this->basePath . '/config/app.php',
            'database' => require $this->basePath . '/config/database.php',
        ];
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $segments = explode('.', $key);
        $value = $this->items;

        foreach ($segments as $segment) {
            if (! is_array($value) || ! array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }

    private function loadEnv(): void
    {
        $file = $this->basePath . '/.env';

        if (! is_file($file)) {
            return;
        }

        foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
                continue;
            }

            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value, " \t\n\r\0\x0B\"'");

            $_ENV[$key] = $value;
            putenv($key . '=' . $value);
        }
    }
}
