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

  <title>Profil</title>

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
            <a href="#">Nama</a>
          </li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card-body">
          <div class="table-responsive">
            <table>
              <?php  
              $query  = "SELECT*FROM  ortu where nama_ortu ='".$_SESSION['nama']."'";
              $data   = mysqli_query($konek,$query);
              while($row=mysqli_fetch_array($data)){
                ?>
                <tr>
                 <td>Nama</td>
                 <td>:</td>
                 <td><?php echo $row['nama_ortu']?></td>
               </tr>
               <tr>
                 <td>Alamat Ortu</td>
                 <td>:</td>
                 <td><?php echo $row['alamat_ortu'] ?></td>
               </tr>
               <tr>
                 <td>telepon</td>
                 <td>:</td>
                 <td><?php echo $row['telepon'] ?></td>
               </tr>
               <tr>
                <td>username</td>
                <td>:</td>
                <td><?php echo $row['username'] ?></td>
              </tr>
              <tr>
                <td>password</td>
                <td>:</td>
                <td><?php echo $row['password']; ?></td>
              </tr>
            <?php  }?>
          </table>
        </div>
      </div>
      <?php  
      include "footer.php";
      ?>
      <?php  
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