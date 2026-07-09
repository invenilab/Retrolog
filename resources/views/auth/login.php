<section class="panel narrow">
    <span class="badge">Acceso</span>
    <h1>Iniciar sesión</h1>

    <form method="post" action="/login" class="form">
        <?= csrf_field() ?>

        <label>
            Correo electrónico
            <input type="email" name="email" value="<?= e(old('email')) ?>" required>
        </label>

        <label>
            Contraseña
            <input type="password" name="password" required>
        </label>

        <button class="button" type="submit">Entrar</button>
    </form>

    <p class="muted">¿No tienes cuenta? <a href="/register">Crear cuenta</a></p>
</section>
