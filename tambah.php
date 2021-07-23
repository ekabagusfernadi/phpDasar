<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "functions.php";
// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // var_dump($_POST);
    // var_dump($_FILES);
    // die; // script dibawah tidak dijalankan
    
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo    "
                    <script>
                        alert('Data Berhasil Ditambahkan');
                        document.location.href = 'index.php';
                    </script>
                ";
    } else {
        echo    "
                    <script>
                        alert('Data Gagal Ditambahkan');
                    </script>
                ";
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <header id="header">
        <div class="container">
            <center>
                <h1>
                    Tambah Data Mahasiswa
                </h1>
                <a href="index.php">Kembali</a>
                <br>
                <br>
            </center>
        </div>
    </header>
    <section id="content">
        <div class="container">
            <form action="tambah.php" method="post" enctype="multipart/form-data"> <!-- supaya form bisa mengelola type = "file", agar data string dikelola $_POST dan file dikelola $_FILES (gambar/files sudah tidak dikelola lagi oleh $_POST tapi diambil alih oleh $_FILES)-->
                <ul>
                    <li>
                        <label for="nrp">Nrp : </label>
                        <input type="text" name="nrp" id="nrp" autocomplete="off" required>
                        <br><br>
                    </li>
                    <li>
                        <label for="nama">Nama : </label>
                        <input type="text" name="nama" id="nama" autocomplete="off" required>
                        <br><br>
                    </li>
                    <li>
                        <label for="email">Email : </label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                        <br><br>
                    </li>
                    <li>
                        <label for="jurusan">Jurusan : </label>
                        <input type="text" name="jurusan" id="jurusan" autocomplete="off" required>
                        <br><br>
                    </li>
                    <li>
                        <label for="gambar">Gambar : </label>
                        <input type="file" name="gambar" id="gambar" autocomplete="off">
                        <br><br>
                    </li>
                    <li>
                        <button type="submit" name="submit">Tambah Data!</button>
                    </li>
                </ul>
            </form>
        </div>
    </section>
</body>
</html>