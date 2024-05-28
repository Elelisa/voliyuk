<?php

include 'koneksidb.php';

$lapangan = query("SELECT * FROM lapangan");

?>
<html>
	<head><title> Admin - Data Lapangan</title>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
	.main .judul{
		width:360px;
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
			<h3> Data Lapangan Voliyuk </h3>
		</div>
		<div class="tabel">
			<table border="1" cellpadding="10" cellspacing="0">

			<tr>
			<th>Id</th>
			<th>Jenis Lapangan</th>
			<th>Harga Lapangan</th>
			<th>Gambar Lapangan</th>
			<th>Aksi</th>
			</tr>
			
			<?php $i = 1 ?>
			<?php foreach ($lapangan as $row):?>
			
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row["jenis_lapangan"];?></td>
			<td><?php echo $row["harga"];?></td>
			<td><img src="img/<?php echo $row["gambar"];?>" width="100"></td>
			<td style="height:100px" width="80px" align="center"><a href="editLapangan.php?id=<?php echo $row["id"];?>" class = "editBtn"> Edit data </a> <br><br><br>
			<a href="deleteLapangan.php?id=<?php echo $row["id"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data?');" class = "delBtn"> Hapus data </a></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
			
		</div>
		<a href="addLapangan.php" class="addBtn"> Tambah Data </a>
	</div>
</body>
</html>