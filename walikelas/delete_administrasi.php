<?php ob_start();
	include "../koneksi.php";
	$NIS = $_GET['NIS'];
	$query = "DELETE FROM biaya_administrasi WHERE NIS='$NIS'";
	$data  = mysqli_query($konek,$query);
	// echo $query;
	header('location: Administrasi.php');
?>