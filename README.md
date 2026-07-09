# RetroLog

RetroLog es una plataforma fotografica social autoalojada inspirada en la experiencia clasica de los fotologs de finales de 2011 hasta su desaparición.

## Estado

```text
v1.0-alpha / Iteracion 4
Primer acercamiento funcional: registro, login, logout y dashboard.
```

## Incluye

- Docker con PHP 8.4 + Apache.
- MariaDB 11.
- Redis.
- phpMyAdmin.
- Mailpit.
- Composer.
- Autoload PSR-4.
- RetroCore MVC.
- Router con middleware.
- Request / Response.
- Configuracion desde `.env`.
- Motor de vistas.
- PDO real.
- Modelo `User`.
- Registro de usuarios.
- Login / logout.
- Sesiones.
- CSRF basico.
- Dashboard protegido.

## Inicio rapido

```bash
cp .env.example .env
docker compose up -d --build
docker compose exec app composer dump-autoload
```

Abre:

```text
http://localhost:8080
```

## Probar funcionalidad

1. Abre `http://localhost:8080/register`.
2. Crea un usuario.
3. Seras redirigido a `/dashboard`.
4. Cierra sesion.
5. Entra de nuevo desde `/login`.

## Documentacion

- [Docker](docs/docker.md)

## Proxima iteracion

- Instalador web `/install`.
- Usuario administrador inicial.
- Panel admin basico.
- Gestion de perfil.
- Avatar.
- Preparacion de subida de fotografias.
