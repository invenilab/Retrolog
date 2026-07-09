<?php $errors = RetroCore\Session\Session::pull('errors', []); ?>

<section class="panel narrow">
    <span class="badge">Nueva cuenta</span>
    <h1>Crear cuenta</h1>

    <form method="post" action="/register" class="form">
        <?= csrf_field() ?>

        <label>
            Nombre de usuario
            <input type="text" name="username" value="<?= e(old('username')) ?>" required>
            <?php if (isset($errors['username'])): ?><small class="error"><?= e($errors['username']) ?></small><?php endif; ?>
        </label>

        <label>
            Correo electrónico
            <input type="email" name="email" value="<?= e(old('email')) ?>" required>
            <?php if (isset($errors['email'])): ?><small class="error"><?= e($errors['email']) ?></small><?php endif; ?>
        </label>

        <label>
            Contraseña
            <input type="password" name="password" required>
            <?php if (isset($errors['password'])): ?><small class="error"><?= e($errors['password']) ?></small><?php endif; ?>
        </label>

        <button class="button" type="submit">Registrarme</button>
    </form>

    <p class="muted">¿Ya tienes cuenta? <a href="/login">Entrar</a></p>
</section>
