<?php
require 'functions.php';

include 'header.php';
include 'navbar.php';


$pinjam = query("SELECT * FROM pinjambuku");
 
if (isset($_POST["search"])){
  $pinjam = search($_POST["keyword"]); 
    
}
?>


<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <form method="post" class="navbar-form">
              <div class="input-group no-border">
                <input type="text" name="keyword" Id="tombol-search" class="form-control" placeholder="Search...">
                <button type="submit" name="search" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
                  <h4 class="card-title ">Table Pinjaman Buku </h4>
                  <p class="card-category">Data di sini</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th> No Buku</th>
                        <th> Barcode Anggota</th>
                        <th>Barcode Petugas</th>
                        <th>Judul Buku </th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali </th>
                        <th>Terlambat(Hari)</th>
                        <th>Total Denda</th>
                        <th>Aksi</th>
                      </thead>
<?php foreach ($pinjam as $row): ?>
  <?php
    
    $t = date_create($row['tgl_kembali']);
     $n = date_create(date('Y-m-d'));
     $terlambat = date_diff($n, $t);
     $hari = $terlambat->format("%a");
  
     // menghitung denda
     $denda = $hari * 1000;
     if ($n < $t){
        $t = date_create($row['tgl_kembali']);
        $n = date_create(date('Y-m-d'));
        $terlambat = date_diff($n, $t);
        $hari = $terlambat->format("%a");
     
        // menghitung denda
        $denda = $hari * 1000;
     }else{
         0

?>

                      
                      <tbody>
                        <tr>
                        <td><?= $row["no_buku"]; ?></td>
                        <td><?= $row["barcode_anggota"]; ?></td>
                        <td><?= $row["barcode_petugas"]; ?></td>
                        <td><?= $row["judul_buku"]; ?></td>
                        <td><?= $row["tgl_pinjam"]; ?></td>
                        <td><?= $row["tgl_kembali"]; ?></td>
                        <td><?= $hari ?></td>
                        <td><?= $denda ?></td>
                        <td><a href="delete.php?id=<?= $row ["id"]; ?>" onclick="return confirm('yakin?');"><button class="btn btn-primary">Sudah Kembali</button></a></td>  
                        </tr>
                        
  <?php  }?>    
 <?php endforeach ;?>       
  
                        <script src="js/script.js"></script>                       
<?php

include 'footer.php';
include 'script.php';
?>