<?php //connect.php

$dsn = "mysql:dbname=belajar;host=localhost";
$user = "root";
$pass = "";

try {
    $db = new PDO($dsn, $user, $pass);
} catch (PDOException $e)
{
    echo "Gagal ".$e->getMessage();
}

?>