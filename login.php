<?php
	require 'koneksidb.php';
	if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
	}
	
	if (password_verify($password, $row['password'])){
		echo '<script type="text/Javascript"> alert("Login berhasil! Halo ' .$username. '! Selamat datang di Voliyuk"); window.location.href = "homePenyewa.html";</script>';	
		exit;
	}
	if ($username == 'adminvoliyuk' && $password =='voliyuk9'){
		echo '<script type="text/Javascript"> alert("Selamat datang di voliyuk! Anda berhasil login sebagai Admin"); window.location.href = "homeAdmin.html";</script>';
	}
	}
	$error = true;
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="styles/styleform.css">
<style> 
@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
.box{
	top: 65%;
}
.teks{
	top:25%;
	left:50%;
}
.teks #p2{
	color: #fff;
	font-size:12px;
	font-family: 'Barlow Condensed';
}
</style>
</head>
<body>
<div class="header">
	<div class="judul">
		<h1>Voliyuk</h1>
	</div>
	<div class="navbar">
		<a href="regis.php" >Registrasi</a>
	</div>
</div>
<div class="teks">
	<p> Selamat Datang di </p>
	<h1> Voliyuk </h1>
	<p id="p2">Belum punya akun? Registrasi terlebih dahulu!</p>
</div>
<div class="box">
	<h3> LOGIN </h3>
	<form method= "POST">
	<div class="textField">
		<label for="">Username</label><br>
		<input type="text" name="username" required><br>
	</div>
	<div class="textField">
		<label for="">Password</label><br>
		<input type="password" name="password" required><br>
	</div>	
	<div class="login">
	<button type="submit" name="login"> login </button>
	</div>
</div>
</body>
</html>