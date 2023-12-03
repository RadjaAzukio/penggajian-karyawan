# penggajian-karyawan

### Menampilkan Index
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/b51d0f4d-808f-43c6-bf03-7a528294c2ae)

### Menampilkan Form login yang bisa diakses oleh *Admin* dan Pengguna
Pada halaman index, anda akan diarahkan ke *Form login*
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/4ef95226-4e2b-4dd5-ad5b-0d3ef67428d4)

Perlu diperhatikan disini yaitu:
- *Form login* bisa diakses oleh *Admin* dan pengguna
- JIka yang login terdeteksi sebagai *Admin*, maka akan diarahkan ke dashboard_admin
- Jika yang login terdeteksi sebagai pengguna, maka akan diarahkan ke dashboard_pengguna
- Setelah terdeteksi, sebelum diarahkan halaman selanjutnya akan diproses terlebih dahulu pada process_login.php untuk memverifikasi apakah yang login *admin* atau pengguna
#### Source Code untuk login.php
```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <form action="process_login.php" method="post">
        <div class="page">
            <div class="container">
                <div class="left">
                    <div class="login">Login</div>
                    <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to
                        read</div>
                </div>
                <div class="right">
                    <svg viewBox="0 0 320 300">
                        <defs>
                            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992"
                                x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
                                <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
                                <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
                            </linearGradient>
                        </defs>
                        <path
                            d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                    </svg>
                    <div class="form">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <input type="submit" id="submit" value="Submit">
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script>
            var currentAnimation = null;

            document.querySelector('#username').addEventListener('focus', function () {
                handleAnimation(0, 700, 'easeOutQuart');
            });

            document.querySelector('#password').addEventListener('focus', function () {
                handleAnimation(-336, 700, 'easeOutQuart');
            });

            document.querySelector('#submit').addEventListener('focus', function () {
                handleAnimation(-730, 700, 'easeOutQuart');
            });

            function handleAnimation(offset, duration, easing) {
                if (currentAnimation) currentAnimation.pause();
                currentAnimation = anime({
                    targets: 'path',
                    strokeDashoffset: {
                        value: offset,
                        duration: duration,
                        easing: easing
                    },
                    strokeDasharray: {
                        value: '240 1386',
                        duration: duration,
                        easing: easing
                    }
                });
            }
        </script>
</body>

</html>
```
### Dashboard Admin
Berikut tampilan **Dashboard Admin**
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/0a78cc23-c5bb-44fc-8e0c-4fefd79624d9)

#### Source Code
```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard_admin.css">
</head>

<body>

    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
        </header>

        <nav>
            <ul>
                <li><a href="dashboard_admin.php">Dashboard</a></li>
                <li><a href="data_karyawan.php">Data Karyawan</a></li>
                <li><a href="gaji_karyawan.php">Gaji Karyawan</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="manajemen_pengguna.php">Manajemen Pengguna</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </nav>

        <div class="content">
            <!-- Konten indeks bisa ditempatkan di sini -->
            <p>Selamat datang, Admin!</p>
            <p>Ini adalah halaman dashboard admin yang bagus.</p>
        </div>
    </div>

</body>

</html>
```

### Data Karyawan
Berikut tampilan **Data Karyawan**
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/962ec04f-fa32-4614-8d3c-6e9894ea5543)

#### Source Code
```
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
```
-  Pada halaman ini, terdapat link untuk **Tambah Data** 
-  **Tambah Data** yang disisipkan pada menu **Data Karyawan** agar *admin* bisa mengiputkan data karyawan baru
-  Ketika **Tambah Data** diklik, maka akan dialihkan ke menu tambah data karyawan

### Tambah Data Karyawan
Berikut tampilan tambah data karyawan
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/e00da613-5a51-4bf8-9463-3a7565a87eaf)

Didalam halaman ini terdapat:
-  NIK
-  Username
-  Password
-  Nama
-  Jenis Kelamin
-  Agama
-  Alamat
yang di isi dan di simpan di database dengan tabel **Karyawan**
- Setelah mengisi form tambah data, klik **Tambah Data** agar data yang kita masukan tersimpan di database

#### Source Code
```
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
```
-  Kita bisa melihat data yang baru saya inputkan tersimpan di database dan pada menu **Data Karyawan**
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/dd48dcda-22dd-4013-a1b5-1a0c9836ce94)
![image](https://github.com/RadjaAzukio/penggajian-karyawan/assets/115551911/e8d2ac8a-97c8-42d5-b9e0-513b649fff26)




