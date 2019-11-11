<?php ob_start();
	include "../koneksi.php";
	$NIS = $_GET['NIS'];
	$query = "DELETE FROM ortu WHERE NIS='$NIS'";
	$data  = mysqli_query($konek, $query);

	$quer  = "DELETE FROM login WHERE NIP='$NIS'";
	$dat   = mysqli_query($konek, $quer);
	// echo $query;
	header('location: Ortu.php');
?>