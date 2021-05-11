<?php
include "koneksi.php";

$tanggal = date('Y-m-d');
$nama	=	$_POST['nama'];
$alamat	=	$_POST['alamat'];
$telp	=	$_POST['telp'];
$keperluan	=	$_POST['keperluan'];

$query	=	mysqli_query($koneksi, "INSERT INTO tamu (tanggal, nama, alamat, telp, keperluan) VALUES ('".$tanggal."', '".$nama."', '".$alamat."', '".$telp."', '".$keperluan."')");

if ($query){
	echo "	<script>
			alert('Berhasil');
			window.location.href='list.php';
			</script>
		 ";
}else{
	echo "Gagal menambah data";
	echo $telp;

}
?>