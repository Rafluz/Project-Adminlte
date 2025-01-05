<?php
session_start();

// Cek apakah user sudah login
if (empty($_SESSION['user'])) {
    // Redirect ke halaman login jika session kosong
    header("Location: login.php"); // Ganti dengan path halaman login Anda
    exit(); // Hentikan eksekusi script
} else {
    include "./header.php"; // header
    include "./sidebar.php"; // sidebar

    // Validasi input untuk parameter 'page'
    $allowed_pages = ['tambah_menu']; // Halaman yang diizinkan
    $page = isset($_GET['page']) ? $_GET['page'] : '';

    if (!in_array($page, $allowed_pages) && $page !== '') {
        // Jika halaman tidak valid, tampilkan pesan error
        echo "<center><font color='red'>Halaman tidak ditemukan!</font></center>";
    } else {
        // Load halaman sesuai dengan parameter 'page'
        switch ($page) {
            case "tambah_menu":
                include __DIR__ . "/../page/form_tambah_menu/form_tambah_menu.php";
                break;

            default:
                include "./home.php";
        }
    }

    include "./footer.php";
}
?>