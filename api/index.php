<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

register_shutdown_function(function () {
    $error = error_get_last();

    if ($error !== null) {
        http_response_code(500);
        header('Content-Type: text/plain; charset=utf-8');

        echo "FATAL ERROR\n";
        echo "TYPE: " . $error['type'] . "\n";
        echo "MESSAGE: " . $error['message'] . "\n";
        echo "FILE: " . $error['file'] . "\n";
        echo "LINE: " . $error['line'] . "\n";
    }
});

try {
    require __DIR__ . '/../public/index.php';
} catch (Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');

    echo "ROOT ERROR\n";
    echo "CLASS: " . get_class($e) . "\n";
    echo "MESSAGE: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . "\n";
    echo "LINE: " . $e->getLine() . "\n\n";

    echo "TRACE:\n";
    echo $e->getTraceAsString();
}