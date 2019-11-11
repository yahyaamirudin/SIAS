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
  <title>Data Siswa</title>
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
  <?php 
  include "header.php";
  ?>

  <div id="wrapper">
    <?php  
    include "sidebar.php";
    ?>
    <h3>Input Data Siswa</h3>
    <form action="" method="POST">
      <table border=0>
       <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
              <td>NIS</td>
              <td><input type="text" name="NIS" value="<?php echo $_GET['nis'] ?>" /></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td><input type="text" name="Nama" /></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><input type="text" name="Alamat" /></td>
            </tr>
            <tr>
              <td>Telepon</td>
              <td><input type="text" name="telepon" /></td>
            </tr>
            <tr>
              <td>Tempat Lahir</td>
              <td><input type="text" name="Tempat" /></td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>   
              <td><input type="date" name="Tanggal" /></td>
            </tr>
            <tr>
             <td></td>
             <td><input type="submit" name="sub" value="Edit" size="30"></td>
           </table>
         </form>

         <?PHP
         if (isset($_POST['sub'])) {
          $NIS            = $_POST['NIS'];
          $Nama           = $_POST['Nama'];
          $Alamat         = $_POST['Alamat'];
          $telepon        = $_POST['telepon'];
          $Tempat         = $_POST['Tempat'];
          $Tanggal        = $_POST['Tanggal'];
          $query  = "UPDATE `siswa` SET `NIS`='$NIS',`Nama`='$Nama',`Alamat`='$Alamat',`telepon`='$telepon',`Tempat lahir`='$Tempat',`Tanggal lahir` = '$Tanggal' WHERE `NIS` ='$NIS'";
          $sql = mysqli_query($konek, $query);
          echo $query;
          header('location: Siswa.php');
        }
        ?>
      </form>

      <?php  
        include "footer.php";
        include "logoutmodal.php";
      ?>

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



