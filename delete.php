<?php
include "koneksi.php";
$id	=	$_GET['id'];

$query	=	mysqli_query($koneksi, "DELETE FROM tamu WHERE id = '".$id."'");

if ($query){
	echo "
		<script>
		alert('Berhasil');
		window.location.href='list.php';
		</script>
		 ";
}else{
	echo "Gagal menghapus data";
}
?>