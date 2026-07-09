<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use RetroCore\Http\Request;
use RetroCore\Http\Response;
use RetroCore\Security\Auth;
use RetroCore\Security\Csrf;
use RetroCore\Session\Session;
use RetroCore\Validation\Validator;
use Throwable;

final class AuthController
{
    public function showLogin(Request $request): Response
    {
        return Response::html(view('auth/login', ['title' => 'Iniciar sesión']));
    }

    public function login(Request $request): Response
    {
        if (! Csrf::validate((string) $request->input('_csrf'))) {
            Session::put('error', 'La sesión ha caducado. Vuelve a intentarlo.');
            return Response::redirect('/login');
        }

        $email = trim((string) $request->input('email'));
        $password = (string) $request->input('password');

        if (Auth::attempt($email, $password)) {
            return Response::redirect('/dashboard');
        }

        Session::put('_old', ['email' => $email]);
        Session::put('error', 'Credenciales incorrectas.');
        return Response::redirect('/login');
    }

    public function showRegister(Request $request): Response
    {
        return Response::html(view('auth/register', ['title' => 'Crear cuenta']));
    }

    public function register(Request $request): Response
    {
        if (! Csrf::validate((string) $request->input('_csrf'))) {
            Session::put('error', 'La sesión ha caducado. Vuelve a intentarlo.');
            return Response::redirect('/register');
        }

        $data = $request->all();
        $errors = Validator::authRegister($data);

        if ($errors !== []) {
            Session::put('_old', [
                'username' => (string)($data['username'] ?? ''),
                'email' => (string)($data['email'] ?? ''),
            ]);
            Session::put('errors', $errors);
            return Response::redirect('/register');
        }

        try {
            $id = User::create(
                trim((string) $data['username']),
                trim((string) $data['email']),
                (string) $data['password']
            );

            Auth::loginById($id);
            return Response::redirect('/dashboard');
        } catch (Throwable) {
            Session::put('error', 'No se pudo crear la cuenta. Puede que el usuario o correo ya existan.');
            return Response::redirect('/register');
        }
    }

    public function logout(Request $request): Response
    {
        Auth::logout();
        return Response::redirect('/');
    }
}
