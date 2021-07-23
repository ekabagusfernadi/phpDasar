<?php

require_once __DIR__ . '/vendor/autoload.php';

require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

$mpdf = new \Mpdf\Mpdf();

$html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Daftar Mahasiswa</title>
                <link rel="stylesheet" href="css/print.css">
            </head>
            <body>
                <h1>Daftar Mahasiswa</h1>

                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </tr>';

                    $i = 1;
                    foreach( $mahasiswa as $mhs ) {
                        $html .=    '
                                        <tr>
                                            <td>' . $i++ . '</td>
                                            <td><img src="img/' . $mhs["gambar"] .'" width="50"></td>
                                            <td>' . $mhs["nrp"] . '</td>
                                            <td>' . $mhs["nama"] . '</td>
                                            <td>' . $mhs["email"] . '</td>
                                            <td>' . $mhs["jurusan"] . '</td>
                                        </tr>
                                    ';
                    }

$html .=        '</table>
            </body>
            </html>
        '; // isi harus string semua

$mpdf->WriteHTML($html);
// $mpdf->Output("daftar-mahasiswa.pdf", \Mpdf\Output\Destination::INLINE);

$mpdf->Output("daftar-mahasiswa.pdf", "D");    // ubah nama file jadi bukan mpdf dan destinasi file    // INLINE = PREVIEW & DOWNLOAD = LNGSUNG DOWNLOAD

?>