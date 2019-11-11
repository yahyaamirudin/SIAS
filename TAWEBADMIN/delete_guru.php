<?php ob_start();
	include "../koneksi.php";
	$NIP = $_GET['NIP'];
	$query = "DELETE FROM guru WHERE NIP='$NIP'";
	$data  = mysqli_query($konek, $query);
	$quer  = "DELETE FROM login WHERE NIP='$NIP'";
	$dat   = mysqli_query($konek, $quer);
	// echo $query;
	header('location:Guru.php');
?>