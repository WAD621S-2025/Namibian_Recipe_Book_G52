<?php
// Define environment mode: 'local' or 'live'
$env = 'local'; // Change to 'local' for local development

if ($env === 'local') {
    // Local environment (WAMP/XAMPP)
    $host = 'localhost';
    $db   = 'recipe_book';
    $user = 'root';
    $pass = 'password';
} else if ($env === 'live') {
    // Live environment (InfinityFree)
    $host = 'sql106.infinityfree.com';
    $db   = 'if0_40220766_recipe_book';
    $user = 'if0_40220766';
    $pass = 'V6zlWlScBxUR';
}

$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die(" DB Connection failed ($env): " . $e->getMessage());
}
