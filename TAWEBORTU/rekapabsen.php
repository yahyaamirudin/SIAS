<?php
include "../koneksi.php";
ob_start();
session_start();
if($_SESSION['level']==""){
	header("location:index.php?pesan=gagal");
};
?>	
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin - Tables</title>

	<!-- Bootstrap core CSS-->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
	<?php  
	include "header.php";
	?>
	<div id="wrapper">  
		<?php  
		include "sidebar.php";
		?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="absen.html">Absen</a>
					</li>
					<li class="breadcrumb-item active">Mulai Absensi</li>
				</ol>
				<!-- form input absen -->
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-table"></i>
					Absen Siswa</div>
					<div class="card-body">
						<div class="table-responsive">
							<table>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td>
										<?php  
										$query  = "SELECT distinct siswa.nama ,Nama_Kelas FROM ortu join siswa on ortu.NIS=siswa.NIS join nilai_siswa on nilai_siswa.nama=siswa.Nama where nama_ortu ='". $_SESSION['nama']."'";
										$result = mysqli_query($konek,$query);
										while($row = mysqli_fetch_array($result)){
											echo $row['nama'];
											echo "<input type = 'hidden' value='".$row['nama']."'>";
											?>
										</td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td>:</td>
									<td>
										<?php  
											echo $row['Nama_Kelas'];
										?>
									</td>
								</tr>

								</table>
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>tanggal</th>
											<th>keterangan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no =1;
										$sql   = "SELECT * FROM absensi where Nama ='".$row['nama']."'";
										$data  = mysqli_query($konek,$sql);
										while ($row=mysqli_fetch_array($data)) {
											?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $row['Tgl_absen'] ?></td>
												<td><?php echo $row['Keterangan'] ?></td>
											</tr>

										<?php } }?>        
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
				<?php
				include "footer.php";
				?>
			</div>
			<a class="scroll-to-top rounded" href="#page-top">
				<i class="fas fa-angle-up"></i>
			</a>

			<!-- Logout Modal-->
			<?php  
			include "logoutmodal.php";
			?>
			<!-- Bootstrap core JavaScript-->
			<script src="../vendor/jquery/jquery.min.js"></script>
			<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Core plugin JavaScript-->
			<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

			<!-- Page level plugin JavaScript-->
			<script src="../vendor/datatables/jquery.dataTables.js"></script>
			<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

			<!-- Custom scripts for all pages-->
			<script src="../js/sb-admin.min.js"></script>

			<!-- Demo scripts for this page-->
			<script src="../js/demo/datatables-demo.js"></script>
		</body>
		</html>