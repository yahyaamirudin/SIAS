<?php
include '../koneksi.php';
$nis 			= $_GET['NIS'];
$query 			= mysqli_query($konek, "SELECT * from siswa where NIS ='$nis'");
$mahasiswa 		= mysqli_fetch_array($query);
$datas 			= array(
            			'Nama' =>  $mahasiswa['Nama'],
            			);
 echo json_encode($datas);
?>