<?php
session_start();
$_SESSION['user'] = '';
echo "<script>window.location = 
    'http://localhost:8080/xampp/native/view/page/auth/login.php'</script>";
?>