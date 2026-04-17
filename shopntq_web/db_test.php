<?php
$host = '127.0.0.1'; 
$db   = 'shopntq';
$user = 'root';      
$pass = ''; // Leave this completely empty!      

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "<h1>🎉 Success! You are connected to the shopntq database!</h1>";
} catch (\PDOException $e) {
    echo "<h1>❌ Connection Failed.</h1>";
    echo "<p>Error details: " . $e->getMessage() . "</p>";
}
?>