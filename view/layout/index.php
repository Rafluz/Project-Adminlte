<?php
session_start();

// Cek apakah sesi pengguna sudah ada
if (empty($_SESSION['user'])) {
    echo "<center>
    <font color='red'>Access Denied</font>
    </center>";
    exit; // Menghentikan eksekusi jika akses ditolak
} else {
    include "./header.php";
    include "./sidebar.php";

    // Mendapatkan parameter 'page' dan memfilter inputnya
    if (isset($_GET['page'])) {
        $page = htmlspecialchars($_GET['page']); // Menghindari serangan XSS
    } else {
        $page = "";
    }

    // Switch case untuk menentukan halaman yang di-include
    switch ($page) {
        case "tambah_menu":
            include_once "../page/form_tambah_menu/form_tambah_menu.php";
            break;
        case "tambah_post":
            include_once "../../view/page/form_tambah_post/form_tambah_post.php";
            break;
        default:
            include_once "./home.php";
    }

    include "./footer.php";
}
?>
