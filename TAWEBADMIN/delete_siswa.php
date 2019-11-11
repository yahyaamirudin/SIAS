<?php ob_start();
	include "../koneksi.php";
	$NIS = $_GET['nis'];
	$query = "DELETE FROM siswa WHERE NIS = '$NIS'";
	$data  = mysqli_query($konek, $query);
	// echo $query;
	 header('location: Siswa.php');
?>