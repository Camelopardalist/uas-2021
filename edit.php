<?php
require 'functions.php';

$id = $_GET["id"];

$mhs= query ("SELECT * FROM mahasiswa WHERE id = $id") [0];

if( isset($_POST["ubah"])) {
  
//mengecek data berhasil ditambah atau tidak 
if ( edit($_POST) > 0){
      echo "
      <script>
      alert('data berhasil diubah!');
      document.location.href = 'dashboard.php';
      </script>
      ";
}else{
      echo"<script>
      alert ('data gagal diubah!');
      document.location.href = 'dashboard.php';
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
		<h1>Edit Daftar Anggota</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
			
				<form action="" method="post" enctype="multipart/form-data">
				<input type ="hidden" name ="id" value="<?= $mhs["id"]; ?> ">
                <input class="text" type="text" name="nama" required value="<?= $mhs["nama"]; ?>">
                <input class="text" type="text" name="email" required value="<?= $mhs["email"]; ?>">
				<img src="img/<?= $mhs['Gambar']; ?>" width="40"></img><br>
                  <input type="file" name="Gambar" >              
				    <input class="text" type="text" name="no_tlp" required value="<?= $mhs["no_tlp"]; ?>">
                <input class="text" type="text" name="barcode" required value="<?= $mhs["barcode"]; ?>">

					<div class="wthree-text">
						
					<input type="submit" name="ubah" value="EDIT">
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