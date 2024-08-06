<?php
// File: config/db.php

require_once __DIR__ . '/load_env.php';

try {
    loadEnv(__DIR__ . '/../.env.local');

    $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
    $pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Confirmation message
    echo 'Database connection successful.<br>';

    // Optional: Perform a test query
    $stmt = $pdo->query('SELECT 1');
    if ($stmt) {
        echo 'Test query executed successfully.<br>';
    } else {
        echo 'Test query failed.<br>';
    }
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
} catch (Exception $e) {
    die('Error loading environment variables: ' . $e->getMessage());
}
