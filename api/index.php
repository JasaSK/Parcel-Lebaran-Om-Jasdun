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

require __DIR__ . '/../public/index.php';