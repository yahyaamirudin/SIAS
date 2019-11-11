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
  <title>Data Administrasi</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
  <?php include "header.php"; ?>
  <div id="wrapper">
    <?php include "sidebar.php"; ?>
    <body>
      <h3>Edit Biaya Administrasi</h3>
      <form action="" method="post">
        <table border=0>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <td>Kelas</td>
                  <td><input type="text" name="Kelas" value="<?php $_GET['Kelas'] ?>" prequired size="30"/></td>
                </tr>
                <tr>
                  <td>Siswa</td>
                  <td><input type="text" name="NIS" value="<?php $_GET['NIS'] ?>" prequired size="30"/></td>
                </tr>
                <tr>
                  <td>Siswa</td>
                  <td><input type="text" name="siswa" value="<?php $_GET['Nama'] ?>" prequired size="30"/></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td><input type="date" name="tanggal" required size="30"/></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><input type="radio" name="keterangan" value="Lunas" title="Lunas" required size="30"/>Lunas&nbsp;&nbsp;
                    <input type="radio" name="keterangan" value="Belum Lunas" title="Belum" required size="30"/>Belum Lunas</td>
                  </tr>
                  <tr>
                   <td></td>
                   <td><input type="submit" name="sub" value="Edit" size="30"/></td>
                 </table>
                 <?PHP
                 if (isset($_POST['sub'])) {
                  $nKelas   = $_POST['Kelas'];
                  $NIS      = $_POST['NIS'];
                  $Siswa    = $_POST['siswa'];
                  $Tanggal  = $_POST['tanggal'];
                  $Keterangan  = $_POST['keterangan'];
                  $query  = "UPDATE biaya_administrasi SET Kelas='$nKelas', siswa='$Siswa', tanggal='$Tanggal', keterangan='$Keterangan' where NIS='$NIS'";
                  $sql = mysqli_query($konek, $query);
                  // echo $query;
                  header('location: index.php');
                }
                ?>
              </form>

              <?php include "footer.php"; ?>
              <?php include "logoutmodal.php"; ?>
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



