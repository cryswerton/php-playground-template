<?php

// Database connection details matching docker-compose.yml
$host = 'db';             // Use the service name 'db' instead of 'localhost'
$db = 'mydatabase';       // Same as MYSQL_DATABASE
$user = 'user';           // Same as MYSQL_USER
$pass = 'userpassword';   // Same as MYSQL_PASSWORD

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Connection successful
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
