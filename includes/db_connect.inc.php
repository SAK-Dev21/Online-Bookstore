<?php

$host = 'localhost';
$dbname = 'your_database_name'; // Replace with your database name
$dbusername = 'root'; // Replace with your MySQL username
$dbpassword = ''; // Replace with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>