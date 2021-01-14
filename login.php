<?php


require 'functions.php';

if( isset($_POST["login"])) {

      $nama = $_POST["nama"];
      $password = $_POST["password"];

      $result = mysqli_query($conn, "SELECT * FROM user WHERE 
      nama ='$nama'");

      if ( mysqli_num_rows($result) === 1) {


         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;  
            
         if ( isset($_POST['remember']) ) {

            setcookie('login','true', time() + 120);
         }   
            header("location: dashboard.php");
            exit;
         }
      }
      


      $error = true;

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    


<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
            <form action="" class="box" method="post">
                    <h1>Login</h1>
                   
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input type="text" name="nama" placeholder="Username"> 
                    <input type="password" name="password" placeholder="Password"> 
                    <a class="forgot text-muted">Have account? <a href="register.php">Register</a></a> 
                    <input type="submit" name="login" value="Login">
                    <div class="col-md-12">
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
</body>
</html>