<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "nama_database";

$conn = new mysqli($host, $username, $password, $database);
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