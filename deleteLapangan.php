<?php
include 'koneksidb.php';

$id = $_GET["id"];

if(del($id)>0){
	echo '<script type="text/Javascript"> alert ("Data berhasil dihapus"); window.location.href = "dataLapangan.php"</script>';		
}
else {
	echo '<script type="text/Javascript"> alert ("Data gagal dihapus"); window.location.href = "dataLapangan.php"</script>';
}

function del($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM lapangan WHERE id = $id");
	
	return mysqli_affected_rows($conn);
}
?>