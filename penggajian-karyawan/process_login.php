<?php
session_start();

// Koneksi ke basis data (sesuaikan dengan konfigurasi Anda)
$host = 'localhost';
$db = 'penggajian_karyawan';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Simulasikan proses otentikasi, sesuaikan dengan kebutuhan aplikasi Anda
$username = $_POST['username'];
$password = $_POST['password'];

// Query otentikasi untuk admin
$admin_query = $conn->prepare("SELECT * FROM admin WHERE Username = :username AND Password = :password");
$admin_query->bindParam(':username', $username);
$admin_query->bindParam(':password', $password);
$admin_query->execute();
$admin_result = $admin_query->fetch(PDO::FETCH_ASSOC);

// Query otentikasi untuk karyawan
$karyawan_query = $conn->prepare("SELECT * FROM karyawan WHERE Username = :username AND Password = :password");
$karyawan_query->bindParam(':username', $username);
$karyawan_query->bindParam(':password', $password);
$karyawan_query->execute();
$karyawan_result = $karyawan_query->fetch(PDO::FETCH_ASSOC);

if ($admin_result) {
    $_SESSION['user_type'] = 'admin';
    header('Location: dashboard_admin.php');
} elseif ($karyawan_result) {
    $_SESSION['user_type'] = 'karyawan';
    header('Location: dashboard_pengguna.php');
} else {
    // Redirect kembali ke halaman login jika login gagal
    header('Location: login.php');
}
?>