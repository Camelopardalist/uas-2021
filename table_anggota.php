<?php



require 'functions.php';

include 'header.php';
include 'navbar.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
?>


<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Table Anggota</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th> Nama</th>
                        <th> Email </th>
                        <th>Photo</th>
                        <th>No Tlp</th>
                        <th>Barcode</th>
                        <th>Aksi</th>
                      </thead>
                      <?php $i = 1; ?>
<?php foreach ($mahasiswa as $row ): ?>
                      <tbody>
                        <tr>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><img src="img/<?= $row ["Gambar"]; ?> " width="50"></td>
                        <td><?= $row["no_tlp"]; ?></td>
                          <td class="text-primary">
                          <?= $row["barcode"]; ?></td>
                          <td class="text-primary">
    <a href="edit.php?id=<?= $row["id"] ?>">Ubah</a> |
    <a href="hapus.php?id=<?= $row ["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
</td>
                        </tr>
                        <?php endforeach  ; ?>
                       
<?php

include 'footer.php';
include 'script.php';
?>