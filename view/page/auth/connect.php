<?php //connect.php

$dsn = "mysql:host=localhost;dbname=3c";
$user = "root";
$pass = "";

try {
    $db = new PDO($dsn, $user, $pass);
    // Set agar error ditangani sebagai exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set karakter encoding ke UTF-8 (opsional, tetapi disarankan)
    $db->exec("SET NAMES utf8");
} catch (PDOException $e) {
    // Tampilkan error jika koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}
?>