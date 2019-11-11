<?php ob_start();
	include "../koneksi.php";
	$NmKelas = $_GET['kelas'];
	$query = "DELETE FROM kelas WHERE Nama_kelas='$NmKelas'";
	$data  = mysqli_query($konek, $query);
	// echo $query;
	header('location: Kelas.php');
?>