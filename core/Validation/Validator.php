<?php

declare(strict_types=1);

namespace RetroCore\Validation;

final class Validator
{
    public static function authRegister(array $data): array
    {
        $errors = [];

        if (trim((string)($data['username'] ?? '')) === '') {
            $errors['username'] = 'El nombre de usuario es obligatorio.';
        } elseif (! preg_match('/^[a-zA-Z0-9_]{3,30}$/', (string)$data['username'])) {
            $errors['username'] = 'Usa 3-30 caracteres: letras, números o guion bajo.';
        }

        if (! filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Introduce un correo válido.';
        }

        if (strlen((string)($data['password'] ?? '')) < 8) {
            $errors['password'] = 'La contraseña debe tener al menos 8 caracteres.';
        }

        return $errors;
    }
}
