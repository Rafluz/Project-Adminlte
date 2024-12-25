<?php 
session_start();
$_SESSION['user']='';
echo "<script>window.location = 
    'http://localhost/blajar/view/page/auth/login.php'</script>";
?>