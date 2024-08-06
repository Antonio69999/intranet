<?php
spl_autoload_register(function ($class) {
    $paths = [
        '../controllers/',
        '../models/',
    ];

    foreach ($paths as $path) {
        $file = __DIR__ . '/' . $path . $class . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }

    // Debugging: Print the paths being checked
    error_log("Autoload: Class $class not found in paths: " . implode(', ', $paths));
});
