<?php
sleep(1);
require '../functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM pinjambuku
         WHERE 
              barcode_anggota LIKE '%$keyword%' OR
              judul_buku LIKE '%$keyword%'
              ";
$pinjam = query($query);

?>
<table border ="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Barcode</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Posisi</th>
</tr>
<?php $i = 1; ?>
<?php foreach ($mahasiswa as $row ): ?>
<tr>
    <td><?= $i ?></td>
    <td><img src="img/<?= $row ["Gambar"]; ?> " width="50"></td>
    <td><?= $row["Barcode"]; ?></td>
    <td><?= $row["Nama"]; ?></td>
    <td><?= $row["Email"]; ?></td>
    <td><?= $row ["Posisi"]; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach  ; ?>
</table>
