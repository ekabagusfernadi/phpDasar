<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// menghubungkan ke halaman functions.php
require "functions.php"; // bisa pakai require atau include

// tombol cari diklik
if (isset($_POST["cari"])){
    $keyword = $_POST["keyword"];
    $mahasiswa = cari($keyword);
    
} else {
    // tampilan defaultnya
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 20px;
            margin: 0 10px 0 10px;
            display: none;
        }
        
        /* fitur bawaan */
        @media print { /* syntax css yang berlaku ketika halaman diprint saja */
            .logout,
            .tambah,
            .form-cari,
            .aksi{
                display: none;
            }
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="container">
            <center>
                <h1>
                    Daftar Mahasiswa
                </h1>
                <a href="logout.php" class="logout">Logout</a>
                <br>
                <br>
                <a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a>
                <br>
                <br>
                <a href="cetak.php" target="_blank">Cetak</a>
                <br>
                <br>
            </center>
        </div>
    </header>
    <section id="content">
        <div class="container">

            <form action="" method="post" class="form-cari">
                <input type="text" name="keyword" autocomplete="off" autofocus placeholder="masukkan keyword pencarian" size="40" id="keyword">
                <button type="submit" name="cari" id="tombolCari">Cari!</button>

                <img src="img/loader.gif" class="loader">

            </form>

            <div id="containerTable">
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <th>No.</th>
                        <th class="aksi">Aksi</th>
                        <th>Gambar</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </tr>

                    <?php $nomer = 1; ?>
                    <?php foreach( $mahasiswa as $mhs ) : ?>

                    <tr>
                        <td><?php echo $nomer; $nomer++;?></td>
                        <td class="aksi">
                            <a href="ubah.php?id=<?= $mhs["id"]; ?>">ubah</a> |
                            <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin?')">hapus</a>
                        </td>
                        <td><img src="img/<?= $mhs["gambar"]; ?>" alt="" width="50"></td>
                        <td><?= $mhs["nrp"]; ?></td>
                        <td><?= $mhs["nama"]; ?></td>
                        <td><?= $mhs["email"]; ?></td>
                        <td><?= $mhs["jurusan"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
<script src="js/jquery-3.6.0.min.js"></script>    <!--bisa ditempatkan ditag title atau diatas tag penutup body tapi pastikan ditempatkan sebelum file js buatan kita -->
<script src="js/script.js"></script>
</body>
</html>