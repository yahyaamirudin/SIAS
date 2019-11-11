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
  <title>Jadwal Pelajaran</title>
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
  <h3>Input Jadwal Pelajaran</h3>
  <form action="" method="post">
  <table border=0>
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
      <td>Id Mapel</td>
      <td><input type="text" name="ID_mapel" prequired size="30"/></td>
    </tr>
    <tr>
      <td>Nama Mapel</td>
      <td><input type="text" name="Nama_Mapel" prequired size="30"/></td>
    </tr>
    <tr>
      <td>Jam</td>
      <td><input type="text" name="jam" prequired size="30"/></td>
    </tr>

    <tr>
      <td>Hari</td>
      <td><input type="text" name="hari" required size="30"/></td>
    </tr>

    <tr>
      <td>Semester</td>
      <td><input type="text" name="semester" required size="30"/></td>
    </tr>

    <tr>
      <td>Tahun Awal</td>
      <td><input type="text" name="tahun_awal" prequired size="30"/></td>
    </tr>

    <tr>
      <td>Tahun Akhir</td>
      <td><input type="text" name="tahun_akhir" prequired size="30"/></td>
    </tr>

    <tr>
      <td>Guru</td>
      <td>
        <select name="Guru" class="custom-select custom-select mb-3">
                   <?php  
                   $qkelas = mysqli_query($konek,"SELECT * FROM `guru`");
                   while ($row=mysqli_fetch_assoc($qkelas)) {
                    echo '<option value="'.$row['nama_guru'].'">'.$row['nama_guru'].'</option>';
                  }
                  ?>
      </td>
    </tr>

    <tr>
      <td>Nama Kelas</td>
      <td><input type="text" name="Nama_Kelas" required size="30"/></td>
    </tr>
    <tr>
       <td></td>
         <td><input type="submit" name="sub" value="Simpan Data" size="30"/></td>
  </table>
  <?PHP
  if (isset($_POST['sub'])) {
    $nIdMapel     = $_POST['ID_mapel'];
    $nMpale       = $_POST['Nama_Mapel'];
    $Jam          = $_POST['jam'];
    $Hari         = $_POST['hari'];
    $Semester     = $_POST['semester'];
    $TahunAwal    = $_POST['tahun_awal'];
    $TahunAkhir   = $_POST['tahun_akhir'];
    $Guru         = $_POST['Guru'];
    $NamaKelas    = $_POST['Nama_Kelas'];
    $query        = "INSERT INTO jadwal_pelajaran VALUES ('$nIdMapel','$nMpale', ' $Jam', ' $Hari', '$Semester' , '$TahunAwal', '$TahunAkhir', '$Guru', '$NamaKelas')";
    $sql = mysqli_query($konek, $query);
    echo $query;
    header('location: index.php');
  }
  ?>
  </form>
  
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

 

