<?php
include "koneksi.php";

$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$nama	=	$_POST['nama'];
$alamat	=	$_POST['alamat'];
$telp	=	$_POST['telp'];
$keperluan	=	$_POST['keperluan'];

$query 	=	mysqli_query($koneksi, "UPDATE tamu SET nama='".$nama."', alamat='".$alamat."', telp='".$telp."', keperluan='".$keperluan."' where id='".$id."'");

if ($query){
	echo "
		<script>
		alert('Berhasil');
		window.location.href='list.php';
		</script>
			";
}else{
	echo "Gagal edit data";
}
?>