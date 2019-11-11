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
  <?php  ?>
  <nav class="navbar navbar-expand navbar-dark static-top " style="background-color: #367757">
    <a class="navbar-brand mr-1" href="index.html">SIAS</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <h1 class="dropdown-header"> Walikelas</h1>
          <a class="dropdown-item" href="#">Selamat datang user</a>
          <div class="card">
            <div class="card-body">
              <img src="../image/logo.png"alt="" class="img-thumbnail rounded-circle">
              <a href="profilwalikelas.html" class="btn btn-primary">Profil</a>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <!--  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a> -->
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav float-left">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Mata Pelajaran</span>
       </a>
       <div class="dropdown-menu" arial-labelledby="pagesDropdown">
         <a class="dropdown-item" href="mapel.php">Mapel</a>
       </div>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data User</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="siswa.php">Siswa</a>
            <a class="dropdown-item" href="guru.php">Guru</a>
            <a class="dropdown-item" href="ortu.php">Orang Tua</a>
            </div>
          </li>
       </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
           <span>Kelas</span>
         </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="Kelas.php">Data Kelas</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
           <span>Agenda dan Administrasi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="agenda.html">Agenda Sekolah</a>
            <a class="dropdown-item" href="Administrasi.php">Administrasi Siswa</a>
            </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Jadwal Pelajaran</span>
        </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="Jadwal.php">Jadwal Pelajaran</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manajemen Siswa</span>
        </a>
      </li>
        </ul>

        <div id="content-wrapper">
          <div class="container-fluid">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
<body>
  <?php include "koneksi.php" ?>
  <h3>Edit Biaya Administrasi</h3>
  <form action="" method="post">
  <table border=0>
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
      <td>Kelas</td>
      <td><input type="text" name="Kelas" prequired size="30"/></td>
    </tr>

    <tr>
      <td>Siswa</td>
      <td><input type="text" name="siswa" prequired size="30"/></td>
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
    $Siswa    = $_POST['siswa'];
    $Tanggal  = $_POST['tanggal'];
    $Keterangan  = $_POST['keterangan'];
    $query  = "UPDATE biaya_administrasi SET Kelas='$nKelas', siswa='$Siswa', tanggal='$Tanggal', keterangan='$Keterangan' where Kelas='$nKelas'";
    $sql = mysqli_query($cnn, $query);
    echo $query;
    header('location: index.php');
  }
  ?>
  </form>
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

 

