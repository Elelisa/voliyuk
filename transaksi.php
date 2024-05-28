<?php
include 'koneksidb.php';

$id_penyewaan = $_GET["id"];

$datasewa = query("SELECT * FROM data_sewa WHERE id = $id_penyewaan")[0];


if (isset($_POST["submit"])){

	if(bayar($_POST)>0){
		echo '<script type="text/Javascript"> alert ("Transaksi Berhasil!"); window.location.href = "beranda.html"</script>';		
	}
	else {
		echo '<script type="text/Javascript"> alert ("Transaksi Gagal!"); window.location.href = "transaksi.php"</script>';
	}
}

function upload(){
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$error = $_FILES ['gambar']['error'];
	$tmpName = $_FILES ['gambar']['tmp_name'];
	
	if ($error == 4){
		echo "<script> alert ('Anda belum memasukan bukti transfer') </script>"; 
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
function bayar($data){
	global $conn;
	global $id_penyewaan;
	
	$tgl_pelunasan = $data["tgl_pelunasan"];
	$gambar = upload();
	
	if (!$gambar){
		return false;
	}

	$query = "INSERT INTO pelunasan VALUES ('', '$tgl_pelunasan','$id_penyewaan','$gambar')";
	
	mysqli_query($conn,$query);
	
	return mysqli_affected_rows($conn);
}
?>

<html>
<head>
<title>Pelunasan Reservasi</title>
<link rel="stylesheet" type="text/css" href="styles/styleform.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
.box2{
	position: absolute;
	top: 50%;
	left: 35%;
	transform: translate(-50%,-50%);
	padding-left: 30px;
	padding-right: 30px;
	padding-bottom: 30px;
	width:300px; 
	background:#fff;
	border-radius:10px;
}
.box{
	left: 65%;
}
.box2 h3{
	font-size:25px;
	text-align:center;
	padding: 0 0 15px 0;
	border-bottom: 1px solid silver;
	font-family: 'Barlow Condensed';
}

</style>
</head>
<body>
<div class="header">
	<div class="judul">
		<h1>Voliyuk</h1>
	</div>
</div>
<div class="box2">
	<h3> Data Penyewaan </h3>

	<div class="textField">
	<label for="">Nama Penyewa : <?php echo $datasewa["nama_penyewa"];?></label><br><br>
	</div>
	
	<div class="textField">
	<label for="">Tanggal Reservasi : <?php echo $datasewa["tanggal_reservasi"];?></label><br><br>
	</div>
	
	<div class="textField">
	<label for="">Jenis_lapangan : <?php echo $datasewa["jenis_lapangan"];?></label><br><br>
	</div>
	
	<div class="textField">
	<label for="">Durasi Penyewaan : <?php echo $datasewa["durasi_penyewaan"];?></label><br><br>
	</div>
	
	<div class="textField">
	<label for="">Total Bayar : <?php echo $datasewa["total_harga"] ;?></label><br><br>
	</div>
</div>
<div class="box">
	<h3> Formulir Pembayaran </h3>
	<form action="" method="POST" enctype = "multipart/form-data">
	
	<div class="textField">
	<label for="">Tanggal Pelunasan : </label><br>
	<input type="datetime-local" name="tgl_pelunasan" required><br>
	</div>
	
	<div class="textField">
	<label for="">Bukti Pembayaran: </label><br>
	<input type="file" name="gambar" required><br>
	</div>

	<div class="submit">
	<button type="submit" name="submit"> Selesai </button>
	</div>
</div>

</body>
</html>