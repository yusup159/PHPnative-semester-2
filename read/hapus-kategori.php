<?php 
include "koneksi.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM kategori WHERE id=$id";
	$query= mysqli_query($koneksi,$sql);

	if ($query) {
		header("location:kategori.php");
		exit;
	}else{echo "Gagal menghapus data";}
 ?>