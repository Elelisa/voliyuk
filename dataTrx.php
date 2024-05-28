<?php

include 'koneksidb.php';

$transaksi = query("SELECT * FROM data_sewa RIGHT JOIN pelunasan ON data_sewa.id = pelunasan.id_penyewaan");

?>
<html>
	<head><title> Admin - Riwayat Transaksi</title>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
	.main .judul{
		width:350px;
	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/stylemain.css">
	</head>
<body>
	<div class="header">
		<div class="judul">
			<h1>Voliyuk</h1>
		</div>
		<div class="navbar">
			<a href="homeAdmin.html" >Home</a>
		</div>
	</div>
	<div class="main">
		<div class="judul">
			<h3> Data Penyewaan Voliyuk </h3>
		</div>
		<div class="tabel">
			<table border="1" cellpadding="10" cellspacing="0">

			<tr>
			<th>Id</th>
			<th>Nama Penyewa</th>
			<th>Tanggal Reservasi</th>
			<th>Tujuan Reservasi</th>
			<th>Tanggal Pelunasan</th>
			<th>Total Biaya</th>
			<th>Bukti Transaksi</th>
			</tr>
			
			<?php $i = 1 ?>
			<?php foreach ($transaksi as $row):?>
			
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row["nama_penyewa"];?></td>
			<td><?php echo $row["tanggal_reservasi"];?></td>
			<td><?php echo $row["reservasi_untuk"];?></td>
			<td><?php echo $row["tgl_pelunasan"];?></td>
			<td><?php echo $row["total_harga"];?></td>
			<td><img src="img/<?php echo $row["gambar"];?>" width="250"></td>
			<td></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
			
		</div>
	</div>
</body>
</html>