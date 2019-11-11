<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webakhir2';
$cnn = mysqli_connect($host, $user, $pass, $db);
if (!$cnn) {
	exit('Koneksi Gagal');
}
?>