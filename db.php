<?php
$host = 'localhost';
$dbname = 'a30112614_SCP_db'; 
$username = 'a30112614_Ujjawal'; 
$password = 'scpfinalproject';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>