
<?php



require 'functions.php';

include 'header.php';
include 'navbar.php';

if ( isset($_POST["isi"]) ) {

    if ( isi($_POST)> 0 ) {
        echo "<script>
             alert('user baru berhasil ditambahkan!');
        </script>";
    } else {
        echo mysqli_error($conn);
    }

}
?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Table Pinjaman Buku </h4>
                  <p class="card-category">Data di sini</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <form class="table" method="post">
                    <div class="form-group">
                        <label for="id_buku">Id Buku</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="no_buku">
                    </div>
                    <div class="form-group">
                        <label for="barcode_anggota">Barcode Anggota</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="barcode_anggota">
                    </div>
                    <div class="form-group">
                        <label for="barcode_petugas">Barcode Petugas</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="barcode_petugas">
                    </div>
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label for="tgl_pinjam">Tgl Pinjam</label>
                        <input type="date"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="tgl_pinjam">
                    </div>                 
                    <button type="submit" name="isi" class="btn btn-primary">Submit</button>
                    </form>
<?php

include 'footer.php';
include 'script.php';
?>