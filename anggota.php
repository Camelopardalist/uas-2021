<?php

require 'functions.php';

if( isset($_POST["submit"])) {
   
//mengecek data berhasil ditambah atau tidak 
if ( tambah($_POST) > 0){
      echo "
      <script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'mahasiswa1.php';
      </script>
      ";
}else{
      echo"<script>
      alert ('data gagal ditambahkan!');
      document.location.href = 'index.php';
      </script>
      ";
} 
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
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Daftar Anggota</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="post" enctype="multipart/form-data">
					<input class="text" type="text" name="nama" placeholder="Input Nama Anda" required="">
					<input class="text email" type="email" name="email" placeholder="Alamat" required="">
					<input class="text" type="file" name="Gambar" placeholder="masukan gambar" required="">
					<input class="text" type="text" name="no_tlp" placeholder="Input No Telephone" required="">
					<input class="text" type="text" name="barcode" placeholder="Barcode input 6 digit" required="">
					<div class="wthree-text">
						
					<input type="submit" name="submit" value="DAFTAR">
				</form>
			
			</div>
		</div>
		<!-- copyright -->
		
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
</body>
</html>