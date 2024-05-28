<?php
	
	if (isset($_POST["submit"])){

		if(add($_POST)>0){
			echo '<script>
				var beli = confirm("Data penyewa telah disimpan. Apakah ingin melihat katalog barang?");
				if (beli == true) {
					window.location.href="formbeli.php";
				} else {
					window.location.href="infoSewa.php";
				}
			</script>';
		}
		else {
			echo '<script type="text/Javascript"> alert ("Data gagal disimpan"); window.location.href = "formsewa.php"</script>';
		}
	}
	function add($data){
	global $conn;
	$nama_penyewa = $_POST['nama_penyewa'];
	$tanggal_reservasi = $_POST['tanggal_reservasi'];
	$reservasi_untuk = $_POST['reservasi_untuk'];
	$durasi_penyewaan = $_POST['durasi_penyewaan'];
	$jenis_lapangan = $_POST['jenis_lapangan'];
	require 'koneksidb.php';
	$harga = query("SELECT harga FROM lapangan WHERE jenis_lapangan = '$jenis_lapangan'");
	$total_harga = (int)$harga[0]['harga']* (int)$durasi_penyewaan;

	$query = "INSERT INTO data_sewa VALUES ('', '$nama_penyewa','$tanggal_reservasi','$reservasi_untuk','$durasi_penyewaan','$jenis_lapangan', $total_harga)";
	
	mysqli_query($conn,$query);
	
	return mysqli_affected_rows($conn);
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulir Reservasi</title>
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
		<a href="homePenyewa.html" >Home</a>
	</div>
</div>
<div class="teks">
	<p> Selamat Datang di </p>
	<h1> Voliyuk </h1>
	<p id="p2">Isilah formulir reservasi berikut sesuai data sebenarnya</p>
</div>
<div class="box">
	<h3> Formulir Reservasi </h3>
	<form method= "POST">
	<div class="textField">
		<label for="">Nama : </label><br>
		<input type="text" name="nama_penyewa" required>
	</div>	
	<div class="textField">
		<label for="">Tanggal Reservasi :</label><br>
		<input type="datetime-local" name="tanggal_reservasi" required>
	</div>	
	<div class="textField">
		<label for="">Reservasi Untuk :</label><br>
		<input type="datetime-local" name="reservasi_untuk" required>
	</div>
	<div class="textField">
		<label for="">Durasi Penyewaan (Jam):</label><br>
		<input type="int" name="durasi_penyewaan" required>
	</div>
	<div class="textField">
		<label for="">Jenis Lapangan :</label><br>
		<select name="jenis_lapangan">
			<option value="VVIP">VVIP</option>
			<option value="VIP">VIP</option>
			<option value="Reguler">Reguler</option>
		</select>
	</div>	
	<div class="submit">
	<button type="submit" name="submit"> Selesai </button>
	</div>
</div>
</body>
</html>