<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "functions.php";

if (isset($_GET["id"])) {
// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];// lngsung ambil index 0
//var_dump($mhs["nrp"]);
}


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo    "
                    <script>
                        alert('Data Berhasil Diubah');
                        document.location.href = 'index.php';
                    </script>
                ";
    } else {
        echo    "
                    <script>
                        alert('Data Gagal Diubah');
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <header id="header">
        <div class="container">
            <center>
                <h1>
                    Ubah Data Mahasiswa
                </h1>
                <a href="index.php">Kembali</a>
                <br>
                <br>
            </center>
        </div>
    </header>
    <section id="content">
        <div class="container">
            <form action="ubah.php" method="post" enctype="multipart/form-data">
            
                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
                <ul>
                    
                    <li>
                        <label for="nrp">Nrp : </label>
                        <input type="text" name="nrp" id="nrp" autocomplete="off" required value="<?= $mhs["nrp"]; ?>">
                        <br><br>
                    </li>
                    <li>
                        <label for="nama">Nama : </label>
                        <input type="text" name="nama" id="nama" autocomplete="off" required value="<?= $mhs["nama"]; ?>">
                        <br><br>
                    </li>
                    <li>
                        <label for="email">Email : </label>
                        <input type="text" name="email" id="email" autocomplete="off" required value="<?= $mhs["email"]; ?>" size="30">
                        <br><br>
                    </li>
                    <li>
                        <label for="jurusan">Jurusan : </label>
                        <input type="text" name="jurusan" id="jurusan" autocomplete="off" required value="<?= $mhs["jurusan"]; ?>">
                        <br><br>
                    </li>
                    <li>
                        <label for="gambar">Gambar : </label>
                        <br><br>
                        <img src="img/<?= $mhs["gambar"] ?>" alt="" width="100px">
                        <br>
                        <input type="file" name="gambar" id="gambar" autocomplete="off"> <!-- tidak perlu value karena sudah menjadi $_FILES -->
                        <br><br>
                    </li>
                    <li>
                        <button type="submit" name="submit">Ubah Data!</button>
                    </li>
                </ul>
            </form>
        </div>
    </section>
</body>
</html>