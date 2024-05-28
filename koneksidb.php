<?php
$server = "localhost";
$user = "root";
$pass = "";
$db_name = "voliyuk";

$conn = mysqli_connect($server, $user, $pass,$db_name);

if (!$conn){
	die("Gagal terhubung ke database".mysqli_connect_error());
}
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];
	while($row = mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}
?>