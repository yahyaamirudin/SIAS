<?php ob_start();
	include "../koneksi.php";
	$ID = $_GET['ID'];
	$query = "DELETE FROM jadwal_pelajaran WHERE ID_mapel='$ID'";
	$data  = mysqli_query($konek, $query);
	// echo $query;
	header('location: Jadwal.php');
?>