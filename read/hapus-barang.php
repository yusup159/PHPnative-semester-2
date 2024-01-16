<?php 
include "koneksi.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM barang_toko WHERE id=$id";
	$query= mysqli_query($koneksi,$sql);

	if ($query) {
		header("location:barang.php");
		exit;
	}else{echo "Gagal menghapus data";}
 ?>