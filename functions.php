<?php

// koneksi database
$namaHost = "localhost";
$namaUser = "root";
$password = "";
$namaDatabase = "phpdasar";

$conn = mysqli_connect($namaHost, $namaUser, $password, $namaDatabase);

// function query database
function query($query) {
    global $conn; // global scope
    $result = mysqli_query($conn, $query);
    // proses ambil data lngsung difunction
    // wadah
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function cari
function cari($keyword) {
    $kataKunci = $keyword;

    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE '%$kataKunci%'
    OR nrp LIKE '%$kataKunci%'
    OR email LIKE '%$kataKunci%'
    OR jurusan LIKE '%$kataKunci%'
    ORDER BY id ASC
    ";
    $hasilCari = query($query); // panggil function query untuk panggil seluruh data(fetch)
    return $hasilCari;
}


// function tambah data
function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nrp = htmlspecialchars($data["nrp"]);   // biar saat diquery tidak banyak tanda kutip
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if ($gambar === false) {
        return false; // menghentikan function
    }

    // query insert data
    $query =    "INSERT INTO mahasiswa
                VALUES
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                "; // kalau pakai petik 2 ("") error hati2
    mysqli_query ($conn, $query);

     // cek apakah data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn)); // jika berhasil (data rows bertambah) return 1 jika error -1
    return mysqli_affected_rows($conn);
    
}

// function upload
function upload() {
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) { // 4 = tidak ada gambar yang diupload
        echo    "<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    // cek apakah data yg diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode(".", $namaFile); // variable jadi array ["eka", "jpg"]
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // ambil index terakhir array dan lakukan lowercase

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) { // jika variabel tidak ada dalam array $ekstensiGambarValid
        echo    "<script>
                    alert('yang anda upload bukan gambar');
                </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if ($ukuranFile > 100000) { // ukuran dalam byte
        echo    "<script>
                    alert('ukuran gambar terlalu besar (max 100kb)');
                </script>";
        return false;
    }


    // lolos pengecekan, gambar siap diupload

    // generate nama gambar baru
    $namaFileBaru = uniqid(); // akan membangkitkan string angka random
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;
    //var_dump($namaFileBaru); die;

    move_uploaded_file($tmpName, "img/" . $namaFileBaru); // copy file yang di pilih beserta namanya ke server tempat penyimpanan gambar
    
    return $namaFileBaru; // return nama file supaya bisa tersimpan didatabase

}


// function hapus
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// function ubah
function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen masukkan ke variable
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) { // tidak upload gambar
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query update data
    $query =    "UPDATE mahasiswa
                SET nama = '$nama', nrp = '$nrp', email = '$email', jurusan = '$jurusan', gambar = '$gambar'
                WHERE id = $id
                ";
    
    mysqli_query($conn, $query);
    // cek apakah data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn)); // jika berhasil (data rows bertambah) return 1 jika error -1
    return mysqli_affected_rows($conn);

}

// function registrasi
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));    // stripslashes berfungsi agar karakter /\ tidak masuk ke database
    $password = mysqli_real_escape_string($conn, $data["password"]); // agar karakter escape terhitung string '

    $konfirmasiPassword = mysqli_real_escape_string($conn, $data["konfirmasiPassword"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) { // jika menghasilkan nilia true ($result bisa di fetch)
        echo    "
                    <script>
                        alert('username sudah terdaftar');
                        document.location.href = 'registrasi.php';
                    </script>
                ";

        return false;
    }

    // cek konfirmasi password
    if( $password !== $konfirmasiPassword ) {
        echo    "
                    <script>
                        alert('Konfirmasi password tidak sesuai');
                        document.location.href = 'registrasi.php';
                    </script>
                ";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT); // default mengikuti metode terupdate
    //$password = md5($password);   // mudah di baca menggunakan google
    //var_dump($password);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}


?>