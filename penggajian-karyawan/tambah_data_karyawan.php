<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "penggajian_karyawan";

$conn = new mysqli($host, $username, "", $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir jika ada pengiriman data POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST["nik"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $jenisKelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $alamat = $_POST["alamat"];

    // Query untuk menambahkan data karyawan
    $sql = "INSERT INTO karyawan (NIK, Username, Password, Nama, Jenis_Kelamin, Agama, Alamat)
            VALUES ('$nik', '$username', '$password', '$nama', '$jenisKelamin', '$agama', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        header("Location: data_karyawan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="tambah_data_karyawan.css">
    <title>Tambah Data Karyawan</title>
</head>

<body>
    <h1>Tambah Data Karyawan</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nik">NIK:</label>
        <input type="text" name="nik" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="agama">Agama:</label>
        <input type="text" name="agama" required>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" rows="4" required></textarea>

        <button type="submit">Tambah Data</button>
    </form>
</body>

</html>