<?php

$database = 'evaristo';
$user = 'root';
$password = '';
$dsn = "mysql:host=127.0.0.1;dbname=" . $database . ";charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (\PDOException $e) {
    die($e->getMessage());
}