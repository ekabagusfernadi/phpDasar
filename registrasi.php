<?php

    require "functions.php";
    
    if( isset($_POST["register"]) ) {
        
        if( registrasi($_POST) > 0 ) {
            echo    "
                    <script>
                        alert('User Baru Berhasil Ditambahkan');
                        document.location.href = 'registrasi.php';
                    </script>
                ";
        } else {
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label {
            display : block;
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="container">
            <center>
                <h1>
                    Halaman Registrasi
                </h1>
            </center>
        </div>
    </header>
    <section id="content">
        <div class="container">

            <form action="" method="post">

                <ul>
                    <li>
                        <label for="username">username : </label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </li>
                    <li>
                        <label for="password">password : </label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </li>
                    <li>
                        <label for="konfirmasiPassword">konfirmasi password : </label>
                        <input type="password" name="konfirmasiPassword" id="konfirmasiPassword" autocomplete="off" required>
                    </li>
                    <li>
                        <button type="submit" name="register">Register!</button>
                    </li>
                </ul>
            
            </form>

        </div>
    </section>
</body>
</html>