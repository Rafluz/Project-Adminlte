<?php
session_start();
include "../auth/connect.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

//echo "$u $p";

$qr = "SELECT * FROM tbuser WHERE username='" . $user . "' AND password='" . $pass . "'";
$result = $db->query($qr);
$n = $result->rowCount();
if ($n <> 0) {
    $_SESSION['user'] = $user;
    echo "<script>window.location = 
    'http://localhost:8080/xampp/native/view/layout/'</script>";
} else {
    echo "<script>window.location = 
    'http://localhost:8080/xampp/native/view/page/auth/login.php'</script>";
}

?>