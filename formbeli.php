<?php

include 'koneksidb.php';

$barang = query("SELECT * FROM barang");

?>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head><title> Katalog Barang </title>
	<link rel="stylesheet" type="text/css" href="styles/styleform.css">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Lobster&family=Merienda+One&display=swap');
	.box{
	top: 53%;
	left: 60%;
    width: 70%;
    height: auto;
	padding-bottom: 10px;
	}
	.teks{
		top:20%;
		left:10%;
	}
	.teks h1{
		font-size: 40px;
	}
	.teks #p2{
		color: #fff;
		font-size:30px;
		font-family: 'Barlow Condensed';
	}
	.box table{
		width: 100%;
	}

	.box table td{	
		text-align: center;
		font-size:18px;
		font-family: 'Barlow Condensed';
		padding-top: 20px;
	}
	.box table th{	
		text-align: center;
		font-size:20px;
		font-family: 'Barlow Condensed';
	}
	.addBtn {
		display:flex;
		width:72px;
		text-decoration: none;
		font-family: 'Barlow Condensed';
		color:#fff;
		padding:12px 15px;
		background:#061202;
		position:relative;
		margin-top:10px;
		margin-left:auto;
		margin-right:0px;
		margin-bottom:10px;
	}
	.addBtn:hover{
		background:#6b9c5c;
		transition:0.2s;
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
	<div class="box">
			<h3> Katalog Barang Voliyuk </h3>
		
		<div class="tabel">
			<table border="0" cellpadding="0" cellspacing="0">

			<tr>
			<th>Id</th>
			<th>Nama Barang</th>
			<th>Gambar Barang</th>
			<th>Harga Barang</th>
			</tr>
			
			<?php $i = 1 ?>
			<?php foreach ($barang as $row):?>
			
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row["nama"];?></td>
			<td><img src="img/<?php echo $row["gambar"];?>" width="200"></td>
			<td><?php echo $row["harga"];?></td>
			</tr>

			<?php $i++; ?>
			<?php endforeach; ?>
		</div>
		<a href="transaksi.php?id=<?php echo $row["id"];?>" class="addBtn"> Lakukan Pembayaran </a>
	</div>
</body>
</html>