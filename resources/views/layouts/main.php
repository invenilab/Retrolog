<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= e($title ?? 'RetroLog') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/app.css">
</head>
<body>
    <header class="topbar">
        <div class="wrap">
            <a class="brand" href="/">RetroLog</a>
            <nav>
                <a href="/">Inicio</a>
                <a href="/dashboard">Panel</a>
                <a href="/login">Login</a>
                <a href="/register">Registro</a>
                <a href="/health">Health</a>
            </nav>
        </div>
    </header>

    <main class="wrap page">
        <?php if ($message = flash('error')): ?>
            <div class="alert alert-error"><?= e($message) ?></div>
        <?php endif; ?>

        <?php if ($message = flash('success')): ?>
            <div class="alert alert-success"><?= e($message) ?></div>
        <?php endif; ?>

        <?= $content ?>
    </main>
</body>
</html>
