<!DOCTYPE html>
<html lang="en">

<?php
// Periksa apakah "username" ada di URL
if (isset($_GET["username"])) {
    $username = $_GET["username"];
} else {
    // Atau berikan nilai default jika tidak ada
    $username = "Pengguna";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard_pengguna.css">
    <title>Dashboard Pengguna</title>
</head>

<body>
    <h1>Dashboard Pengguna</h1>

    <nav>
        <ul>
            <li><a href="dashboard_pengguna.php">Dashboard</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="gaji_karyawan.php">Gaji Karyawan</a></li>
            <li><a href="ubah_password.php">Ubah Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <!-- Isi konten dashboard di sini -->
        <p>Selamat datang,
            <?php echo $username; ?>!
        </p>
        <!-- Tambahkan informasi atau widget lainnya sesuai kebutuhan -->
    </div>
</body>

</html>