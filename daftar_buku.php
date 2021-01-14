<?php

require 'functions.php';

$buku = query("SELECT * FROM pinjam_buku");

if (isset($_POST["cari"])){
  $buku = cari($_POST["keyword"]); 
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<style>
  
      .loader {
          width: 40px;
          position : absolute;
          top: 140px;
          right: 240px;
          z-index: -1;
          display: none;

      }

      @media print {
          .logout {
              display: none;
          }
      }
</style>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Daftar Buku</h1>
    <div class="colorlibcopy-agile">   
        <h2>Daftar Anggota? <a href="anggota.php">Daftar</a></h2>
	<br>
    <br>
    <br>
    <br>

    <form  method="post" action="" class="form-inline md-form mr-auto mb-2">

    <input type="text" name="keyword" size="1 0" autofocus 
    placeholder="silahkan masukan keyword anda..."autocomplete="off" Id
    ="keyword">
    
    <button type="submit" name="cari" Id="tombol-cari">Cari !</button>

    <img src="img/loader.gif" class="loader">
</form>
<br>
<br>
<br>

				<table class="table table-striped w-auto-center">

  <!--Table head-->
  <thead class="text-center">
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Penulis</th>
      <th>Tahun Terbit</th>
      <th>No Buku</th>
    </tr>
  </thead>
  <!--Table head-->
  <?php $i = 1; ?>
<?php foreach ($buku as $row ): ?>
  <!--Table body-->
  <tbody>
    <tr class="table-info">
    <td><?= $i ?></td>
    <td><?= $row["judul_buku"]; ?></td>
      <td><?= $row["penulis_buku"]; ?></td>
      <td><?= $row["tahun_terbit"]; ?></td>
      <td><?= $row["no_buku"]; ?></td>
      
    </tr>
    <?php $i++; ?>
    <?php endforeach  ; ?>
		
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
  <script src="js/script.js"></script>  
</body>
</html>