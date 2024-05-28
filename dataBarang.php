<?php

include 'koneksidb.php';

$barang = query("SELECT * FROM barang");

?>
<html>
	<head><title> Admin - Data Barang</title>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
	.main .judul{
		width:310px;
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
			<h3> Data Barang Voliyuk </h3>
		</div>
		<div class="tabel">
			<table border="1" cellpadding="10" cellspacing="0">

			<tr>
			<th>Id</th>
			<th>Nama Barang</th>
			<th>Harga Barang</th>
			<th>Gambar Barang</th>
			<th>Aksi</th>
			</tr>
			
			<?php $i = 1 ?>
			<?php foreach ($barang as $row):?>
			
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row["nama"];?></td>
			<td><?php echo $row["harga"];?></td>
			<td><img src="img/<?php echo $row["gambar"];?>" width="100"></td>
			<td style="height:100px" width="80px" align="center"><a href="editBarang.php?id=<?php echo $row["id"];?>" class = "editBtn"> Edit data </a> <br><br><br>
			<a href="deleteBarang.php?id=<?php echo $row["id"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data?');" class = "delBtn"> Hapus data </a></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
			
		</div>
		<a href="addBarang.php" class="addBtn"> Tambah Data </a>
	</div>
</body>
</html>