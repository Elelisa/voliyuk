<?php
	require 'koneksidb.php';
	if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpw = $_POST['confirmpw'];
	
	if ($password == $confirmpw){
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
		
		if (mysqli_fetch_assoc($result)){
			echo '<script> alert("Username yang anda gunakan tidak tersedia"); window.location.href = "regis.php";</script>';
		} else {
			$query = "INSERT INTO user VALUES ('','$email','$dob','$username','$password')";
			$result = mysqli_query($conn, $query);
			
			if(mysqli_affected_rows($conn)>0){
				echo '<script type="text/Javascript"> alert ("Registrasi berhasil"); window.location.href = "login.php"</script>';		
			}
			else {
				echo '<script type="text/Javascript"> alert ("Registrasi gagal"); window.location.href = "regis.php"</script>';
			}
		}
	} else {
		echo '<script> alert("Masukkan konfirmasi password yang sama dengan password!"); window.location.href = "regis.php";</script>';
	}
	}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi</title>
<link rel="stylesheet" type="text/css" href="styles/styleform.css">
<style> 
@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');

.box{
	top: 54%;
	left:70%;
}
.teks{
	top:50%;
	left:30%;
}
.teks p{
	font-size:20px;
}
.teks h1{
	font-size: 60px;
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
		<a href="login.php" >Login</a>
	</div>
</div>
<div class="teks">
	<p> Selamat Datang di </p>
	<h1> Voliyuk </h1>
	<p id="p2">Sudah melakukan registrasi? Login sekarang!</p>
</div>
<div class="box">
	<h3> Registrasi</h3>
	<form method= "POST">
	<div class="textField">
		<label for="">Email</label><br>
		<input type="text" name="email" required>
	</div>	
	<div class="textField">
		<label for="">Date of Birth</label><br>
		<input type="date" name="dob" required>
	</div>	
	<div class="textField">
		<label for="">Username</label><br>
		<input type="text" name="username" required>
	</div>
	<div class="textField">
		<label for="">Password</label><br>
		<input type="password" name="password" required>
	</div>	
	<div class="textField">
		<label for="">Confirm Password</label><br>
		<input type="password" name="confirmpw" required>
	</div>	
	<div class="submit">
	<button type="submit" name="submit"> Registrasi </button>
	</div>
</div>
</body>
</html>