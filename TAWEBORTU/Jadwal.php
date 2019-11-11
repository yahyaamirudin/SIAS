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

  <title>Jadwal Pelajaran</title>

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
    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
      Jadwal Pelajaran</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>ID_mapel</th>
                <th>jam</th>
                <th>hari</th>
                <th>semester</th>
                <th>tahun_awal</th>
                <th>tahun_akhir</th>
                <th>Guru</th>
                <th>Nama_Kelas</th>
              </tr>
              <?php 
              $a=mysqli_query($konek, "SELECT * FROM jadwal_pelajaran ORDER BY hari");
              $no=1;
              while ($d=mysqli_fetch_array($a)) {
                ?>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['ID_mapel'] ?></td>
                <td><?php echo $d['jam'] ?></d>
                <td><?php echo $d['hari'] ?></d>
                <td><?php echo $d['semester']; ?></td>
                <td><?php echo $d['tahun_awal']; ?></d>
                <td><?php echo $d['tahun_akhir']; ?></d>
                <td><?php echo $d['Guru']; ?></td>
                <td><?php echo $d['Nama_Kelas']; ?></d>
                </tr>";
              <?php 
              }
              ?>
            </thead>
          </table>
        </div>
      </div>
      <?php  
      include "footer.php";
      ?>
      <?php  
      include "logoutmodal.php";
      ?>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>
</body>

</html>