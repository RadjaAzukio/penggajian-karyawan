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

// Query untuk mengambil data karyawan
$sql = "SELECT * FROM karyawan";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data_karyawan.css">
    <title>Data Karyawan</title>
</head>

<body>
    <h1>Data Karyawan</h1>
    <a href="tambah_data_karyawan.php">Tambah Data Karyawan</a>

    <?php
    // Jika data karyawan ditemukan
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID Karyawan</th>
                <th>NIK</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
            </tr>";

        // Tampilkan data karyawan
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["ID_Karyawan"] . "</td>
                    <td>" . $row["NIK"] . "</td>
                    <td>" . $row["Username"] . "</td>
                    <td>" . $row["Nama"] . "</td>
                    <td>" . $row["Jenis_Kelamin"] . "</td>
                    <td>" . $row["Agama"] . "</td>
                    <td>" . $row["Alamat"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data karyawan.";
    }

    // Tutup koneksi
    $conn->close();
    ?>
</body>

</html>