<?php
//sleep(1);           // 1 detik
usleep(1000000);    // 1 detik
require"../functions.php";

$keyword = $_GET["keyword"];

// $query = "SELECT * FROM mahasiswa WHERE 
//     nama LIKE '%$keyword%'
//     OR nrp LIKE '%$keyword%'
//     OR email LIKE '%$keyword%'
//     OR jurusan LIKE '%$keyword%'
//     ORDER BY id ASC
//     ";
// $mahasiswa = query($query);

$mahasiswa = cari($keyword);

?>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
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
                        <td>
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