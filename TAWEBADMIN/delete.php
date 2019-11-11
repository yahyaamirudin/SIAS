<?php ob_start();
	include "../koneksi.php";
	$id_mapel=$_GET['ID_mapel'];
	$query  = "DELETE FROM mapel WHERE ID_mapel='$id_mapel'";
	$data   = mysqli_query($konek,$query);
	// echo $query;
	header('location:mapel.php');
?>