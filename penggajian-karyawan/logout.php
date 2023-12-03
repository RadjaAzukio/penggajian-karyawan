<?php
// Mulai sesi (jika belum dimulai)
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lainnya
header("Location: login.php");
exit();
?>