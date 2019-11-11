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
  <title>Data Ortu</title>
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
<body>
  <h3>Edit Orang Tua Siswa</h3>
  <form action="" method="post">
  <table border=0>
     <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
      <td>NIS</td>
      <td><input type="text" name="NIS" value="<?php echo $_GET['NIS'] ?>" /></td>
    </tr>
    <tr>
      <td>Nama Ortu</td>
      <td><input type="text" name="nama_ortu"/></td>
    </tr>

    <tr>
      <td>Alamat Ortu</td>
      <td><input type="text" name="alamat_ortu" /></td>
    </tr>

    <tr>
      <td>Telepon</td>
      <td><input type="text" name="telepon" maxlength="12" /></td>
    </tr>

    <tr>
      <td>Username</td>
      <td><input type="text" name="username" /></td>
    </tr>

    <tr>
      <td>Password</td>
      <td><input type="password" name="password" /></td>
    </tr>
    
    <tr>
       <td></td>
         <td><input type="submit" name="sub" value="Edit" size="30"/></td>
  </table>
  </form>

<?PHP
  if (isset($_POST['sub'])) {
    $nNIS         = $_POST['NIS'];
    $NamaOrtu     = $_POST['nama_ortu']; 
    $AlamatOrtu   = $_POST['alamat_ortu'];
    $Telepon      = $_POST['telepon'];
    $Username     = $_POST['username'];
    $Password     = $_POST['password'];
    $query        = "UPDATE ortu SET NIS='$nNIS', nama_ortu='$NamaOrtu', alamat_ortu='$AlamatOrtu', telepon='$Telepon',username='$Username', password='$Password' where NIS='$nNIS'";
    $sql          = mysqli_query($konek, $query);

    $query2       = "UPDATE login set NIP = '$nNIS',nama='$NamaOrtu',username='$Username',password='$Password' where NIP = '$nNIS' ";
    $data2        = mysqli_query($konek,$query2);
    // echo $query;
    header('location: Ortu.php');
  }
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

 

