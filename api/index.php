<?php

if (($_SERVER['REQUEST_URI'] ?? '') === '/cek-env') {
    header('Content-Type: application/json');

    $key = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? $_SERVER['APP_KEY'] ?? null);

    echo json_encode([
        'APP_KEY_ada' => !empty($key),
        'APP_KEY_mulai_base64' => is_string($key) && str_starts_with($key, 'base64:'),
        'APP_KEY_panjang' => is_string($key) ? strlen($key) : 0,
        'APP_ENV' => getenv('APP_ENV') ?: null,
    ]);

    exit;
}

if (($_SERVER['REQUEST_URI'] ?? '') === '/cek-laravel') {
    header('Content-Type: application/json');

    require __DIR__ . '/../vendor/autoload.php';

    $app = require __DIR__ . '/../bootstrap/app.php';

    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

    $key = config('app.key');

    echo json_encode([
        'config_cache_ada' => file_exists(__DIR__ . '/../bootstrap/cache/config.php'),
        'laravel_app_key_ada' => !empty($key),
        'laravel_app_key_mulai_base64' => is_string($key) && str_starts_with($key, 'base64:'),
        'laravel_app_key_panjang' => is_string($key) ? strlen($key) : 0,
        'laravel_env' => app()->environment(),
    ]);

    exit;
}

require __DIR__ . '/../public/index.php';