<?php
include 'koneksidb.php';

$id = $_GET["id"];

if(del($id)>0){
	echo '<script type="text/Javascript"> alert ("Data berhasil dihapus"); window.location.href = "dataBarang.php"</script>';		
}
else {
	echo '<script type="text/Javascript"> alert ("Data gagal dihapus"); window.location.href = "dataBarang.php"</script>';
}

function del($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
	
	return mysqli_affected_rows($conn);
}
?>