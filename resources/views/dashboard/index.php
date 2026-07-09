<section class="panel">
    <span class="badge">Panel de usuario</span>
    <h1>Hola, <?= e($user['username'] ?? 'usuario') ?></h1>
    <p class="lead">Ya tienes sesión iniciada. Este será el futuro centro de control de tu perfil fotográfico.</p>

    <div class="grid">
        <article class="card">
            <strong>Email</strong>
            <p><?= e($user['email'] ?? '') ?></p>
        </article>

        <article class="card">
            <strong>Rol</strong>
            <p><?= e($user['role'] ?? 'user') ?></p>
        </article>

        <article class="card">
            <strong>Estado</strong>
            <p><?= e($user['status'] ?? 'active') ?></p>
        </article>
    </div>

    <form method="post" action="/logout" class="logout">
        <?= csrf_field() ?>
        <button class="button secondary" type="submit">Cerrar sesión</button>
    </form>
</section>
