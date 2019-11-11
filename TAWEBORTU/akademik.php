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
            <a href="nilai akademik.html">Nilai Siswa Akademik</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Data Nilai Akademik Siswa</div>
          <div class="card-body">
            <div class="table-responsive">
             <table>
              <?php
              $nama = $_GET['nama'];
              $kls  = $_GET['kelas'];
              $s    = $_GET['smash'];
              $awal = $_GET['awal'];
              $akhir = $_GET['akhir']; 
              ?>
              <tr>
               <td>Nama</td>
               <td>:</td>
               <td><?php echo $nama ?></td>
             </tr>
             <tr>
               <td>Kelas</td>
               <td>:</td>
               <td><?php echo $kls?></td>
             </tr>
             <tr></tr>
           </table>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <h1>Nilai Akademik</h1>
                  <th>No</th>
                  <th>Mata pelajaran</th>
                  <th>Nilai Tugas 1</th>
                  <th>Nilai Tugas 2</th>
                  <th>Nilai UH</th>
                  <th>Nilai UTS</th>
                  <th>Nilai UAS</th>
                  <th>Nilai Akhir</th>
                  <th>Ket</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;  
                $query = "SELECT * from nilai_siswa WHERE nama='$nama' and Nama_Kelas='$kls' and Semester='$s'" ;
                $sql = mysqli_query($konek,$query);
                while ($col = mysqli_fetch_array($sql)){              
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $col['Mapel']; ?></td>
                    <td><?php echo $col['tugas1']; ?></td>
                    <td><?php echo $col['tugas2']; ?></td>
                    <td><?php echo $col['UH']; ?></td>
                    <td><?php echo $col['UTS']; ?></td>
                    <td><?php echo $col['UAS']; ?></td>
                    <?php  
                    $t1   =$col['tugas1'];
                    $t2   =$col['tugas2'];
                    $uh   =$col['UH'];
                    $uts  =$col['UTS'];
                    $uas  =$col['UAS'];
                    // var_dump($t1);
                    $akhir=($t1+$t2+$uh+$uts+$uas)/5;
                    ?>
                    <td><?php echo $akhir; ?></td>
                    <td><?php echo $col['keterangan']; ?></td>
                  </td>
                </tr>

              </tbody>
            <?php  }?>
          </table>
        <br>
        <?php  
        include "footer.php";
        ?>
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>
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
