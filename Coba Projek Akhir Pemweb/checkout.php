<?php 
    session_start();

    // Hapus data dari session cart setelah checkout
    unset($_SESSION['cart']);

    // Redirect kembali ke halaman kategori
    header("location:kategori.php");
    exit();
?>