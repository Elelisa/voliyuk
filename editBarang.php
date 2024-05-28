<?php
include 'koneksidb.php';

$id = $_GET["id"];

$databarang = query("SELECT * FROM barang WHERE id = $id")[0];

if (isset($_POST["submit"])){

	if(edit($_POST)>0){
		echo '<script type="text/Javascript"> alert ("Data berhasil diubah"); window.location.href = "dataBarang.php"</script>';		
	}
	else {
		echo '<script type="text/Javascript"> alert ("Data gagal diubah"); window.location.href = "dataBarang.php"</script>';
	}
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
function edit($data){
	global $conn;
	
	$id = $data["id"];
	$nama= $data["nama"];
	$harga = $data["harga"];
	$gambarLama = $data ["gambarLama"];
	
	if ($_FILES ['gambar']['error'] == 4){
		$gambar = $gambarLama;
	}
	else{
		$gambar = upload();
	}
	
	
	$query = "UPDATE barang SET nama='$nama',harga='$harga',gambar='$gambar' WHERE id = $id";
	
	mysqli_query($conn,$query);
	
	return mysqli_affected_rows($conn);
}
?>

<html>
<head>
<title>Admin - Edit data Barang</title>
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
	<h3> Edit data Barang</h3>
	<form action="" method="POST" enctype = "multipart/form-data">

	<input type="hidden" name="id" value="<?php echo $databarang["id"];?>">
	<input type="hidden" name="gambarLama" value="<?php echo $databarang["gambar"];?>">
	
	<div class="textField">
	<label for="">Nama Barang : </label><br>
	<input type="text" name="nama" value="<?php echo $databarang["nama"];?>"><br>
	</div>
	
	<div class="textField">
	<label for="">Harga Barang : </label><br>
	<input type="int" name="harga" value="<?php echo $databarang["harga"];?>"><br>
	</div>
	
	<div class="textField">
	<label for="">Gambar Barang: </label><br>
	<img src= "img/<?= $databarang['gambar'];?>" width ="50"> <br>
	<input type="file" name="gambar" id="gambar"><br>
	</div>

	<div class="submit">
	<button type="submit" name="submit"> Edit </button>
	</div>
</div>

</body>
</html>