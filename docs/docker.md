# RetroLog - Docker

## Inicio rapido

```bash
cp .env.example .env
docker compose up -d --build
docker compose exec app composer dump-autoload
```

## URLs

- RetroLog: http://localhost:8080
- Healthcheck: http://localhost:8080/health
- phpMyAdmin: http://localhost:8081
- Mailpit: http://localhost:8025

## Nota importante

Si ya tenias un volumen de MariaDB anterior, la tabla `users` puede no crearse automaticamente porque `database/init` solo se ejecuta al crear el volumen por primera vez.

Para reiniciar desde cero:

```bash
docker compose down -v
docker compose up -d --build
docker compose exec app composer dump-autoload
```
