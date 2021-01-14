<?php

 require 'functions.php';
 
 include 'header.php';
 include 'navbar.php';


$user = query("SELECT * FROM user");

?>


<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Admin Profile</h4>
                  <p class="card-category">Cek your profile here</p>
                </div>
                <div class="card-body">
                  <form>
                  <table class="table">
                  <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">No Tlp</th>
                              <th scope="col">Photo</th>
                              <th scope="col">Barcode</th>
                            </tr>
                          </thead>
                          <?php $i = 1; ?>
<?php foreach ($user as $row ): ?>
                          <tbody>
                            <tr>
                            <th scope="row"><?= $row["nama"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["no_tlp"]; ?></td>
                           <td><img src="img/<?= $row ["Gambar"]; ?> " width="50"></td>
                          <td><?= $row["barcode"]; ?></td>   
                            </tr>
                            <?php endforeach  ; ?>
                          </tbody>
                        </table>
                        </div>
                        </div>
                        </div>
                   
           

  
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
       



<?php

include 'footer.php';
include 'script.php';
?>