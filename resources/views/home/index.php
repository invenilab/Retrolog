<section class="panel">
    <span class="badge">Iteración 4</span>
    <h1><?= e($title) ?></h1>
    <p class="lead"><?= e($subtitle) ?></p>

    <div class="actions">
        <a class="button" href="/register">Crear cuenta</a>
        <a class="button secondary" href="/login">Entrar</a>
    </div>

    <div class="grid">
        <article class="card">
            <strong>Usuarios registrados</strong>
            <p><?= e($userCount) ?></p>
        </article>

        <article class="card">
            <strong>Autenticación</strong>
            <p>Registro, login, logout, sesiones y CSRF inicial.</p>
        </article>

        <article class="card">
            <strong>Siguiente fase</strong>
            <p>Perfiles, avatares y primera subida de fotografías.</p>
        </article>
    </div>
</section>
