<?php
include "../koneksi.php";
ob_start();
session_start();
if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
};
?>

<?php  
include "crud.php";
$crud = new CRUD("localhost","root","","webakhir" )
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
            <form method="post">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>kelas</th>
                    <th>NIS</th>
                    <th style="width: 450px;">Nama siswa</th>
                    <th>keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $kelas = $_GET['idkelas'];
                  $tgl   = $_GET['tgl1'];
                  $sql   = "SELECT * FROM absensi where Tgl_absen = '$tgl'";
                  $data  = mysqli_query($konek,$sql);
                  while ($row=mysqli_fetch_array($data)) {
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['ID_Kelas']; ?></td>
                    <td><?php echo $row['NIS']; ?></td>
                    <td><?php echo $row['Nama'] ?></td>
                    <td><?php echo $row['Keterangan'] ?></td>
                  </tr>

                  <?php } ?>        
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