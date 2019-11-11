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
    include"sidebar.php";
    ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Data Nilai Siswa</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width: 20px;">No</th>
                    <th style="width: 80px;">Kelas</th>
                    <th>Nama</th>
                    <th>Lihat Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $kls   = $_GET['kelas'];
                  $smt   = $_GET['semester'];
                  $awal  = $_GET['awal'];
                  $akhir = $_GET['akhir'];
                  $no=1;
                  $query = "SELECT DISTINCT nama,Nama_Kelas FROM `nilai_siswa` where Nama_Kelas = '$kls' and Semester = '$smt' and tahun_awal = '$awal' and tahun_akhir='$akhir'";
                  $sql = mysqli_query($konek,$query);
                  while ($data=mysqli_fetch_array($sql)){
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['Nama_Kelas']; ?></td>
                        <td><?php echo $data['nama']?></td>
                        <td><a href="fullnilai2.php?idkelas=<?=$data['Nama_Kelas']?>&nama=<?=$data['nama']?>&semester=<?=$_GET['semester']?>&awal=<?=$_GET['awal']?>&akhir=<?=$_GET['akhir']?>">lihat nilai</a></td>
                      </tr>
                  <?php  }?>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php  
        include "footer.php";
        ?>
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
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
