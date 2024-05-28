<?php
require 'koneksidb.php';

if (isset($_POST["submit"])){

	if(add($_POST)>0){
		echo '<script type="text/Javascript"> alert ("Data berhasil ditambahkan"); window.location.href = "dataLapangan.php"</script>';		
	}
	else {
		echo '<script type="text/Javascript"> alert ("Data gagal ditambahkan"); window.location.href = "dataLapangan.php"</script>';
	}
}
function add($data){
	global $conn;
	
	$jenis_lapangan = $data["jenis_lapangan"];
	$harga = $data["harga"];
	
	$gambar = upload();
	if (!$gambar){
		return false;
	}
	
	$query = "INSERT INTO lapangan VALUES ('', '$jenis_lapangan','$harga','$gambar')";
	
	mysqli_query($conn,$query);
	
	return mysqli_affected_rows($conn);
}

function upload(){
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$error = $_FILES ['gambar']['error'];
	$tmpName = $_FILES ['gambar']['tmp_name'];
	
	if ($error == 4){
		echo "<script> alert ('Anda belum memasukan gambar') </script>"; 
		return false;
	}
	
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode ('.',$nama_file);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script> alert ('Yang anda upload bukan file gambar') </script>"; 
		return false;
	}
	
	if ($ukuran_file > 10000000){
		echo "<script> alert ('Ukuran gambar terlalu besar') </script>"; 
		return false;
	}
	$nama_fileBaru = uniqid();
	$nama_fileBaru .= '.';
	$nama_fileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/' . $nama_fileBaru);
	
	return $nama_fileBaru;
}
?>

<html>
<head>
<title> Admin - Tambah data Lapangan </title>
<link rel="stylesheet" type="text/css" href="styles/styleform.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
</style>
</head>
<body>
<div class="header">
	<div class="judul">
		<h1>Voliyuk</h1>
	</div>
</div>

<div class="box">
	<h3> Tambah data lapangan</h3>
	<form action="" method="POST" enctype="multipart/form-data">
	
	<div class="textField">
	<label for="">Jenis Lapangan: </label><br>
	<input type="text" name="jenis_lapangan" required><br>
	</div>
	
	<div class="textField">
	<label for="">Harga : </label><br>
	<input type="int" name="harga" ><br>
	</div>
	
	<div class="textField">
	<label for="">Gambar Lapangan: </label><br>
	<input type="file" name="gambar" required><br>
	</div>

	<div class="submit">
	<button type="submit" name="submit"> Tambah </button>
	</div>
</div>

</body>
</html>