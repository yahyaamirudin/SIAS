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

  <title>SB Admin - Dashboard</title>

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
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Data User</li>
        </ol>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <form method="GET" action="daftarsiswagrafik.php">
                  <label>kelas</label>
                  <select name="kelas" class="custom-select custom-select mb-3">
                    <?php  
                    $q = mysqli_query($konek,"SELECT DISTINCT Nama_Kelas FROM `nilai_siswa`");
                    ?>
                    <?php  
                    while ($row=mysqli_fetch_assoc($q)) {
                      echo '<option value="'.$row['Nama_Kelas'].'">'.$row['Nama_Kelas'].'</option>';}
                      ?>
                    </select>
                    <label>Semester</label>
                    <div class="form-group">
                      <select name="smash" class="custom-select custom-select mb-3">
                        <?php  
                        $q = mysqli_query($konek,"SELECT DISTINCT Semester FROM `nilai_siswa`");
                        ?>
                        <?php  
                        while ($row=mysqli_fetch_assoc($q)) {
                          echo '<option value="'.$row['Semester'].'">'.$row['Semester'].'</option>';}
                          ?>
                        </select>
                        <select name="awal" class="custom-select custom-select mb-3">
                          <option selected>Periode Tahun awal</option>
                          <?php  
                          $qmapel = mysqli_query($konek,"SELECT distinct tahun_awal from `jadwal_pelajaran`");
                          while ($row=mysqli_fetch_assoc($qmapel)) {
                            echo '<option value="'.$row['tahun_awal'].'">'.$row['tahun_awal'].'</option>';}
                            ?>
                          </select>
                          <select name="akhir" class="custom-select custom-select mb-3">
                            <option selected>Periode Tahun akhir</option>
                            <?php  
                            $qmapel = mysqli_query($konek,"SELECT distinct tahun_akhir from `jadwal_pelajaran` ");
                            while ($row=mysqli_fetch_assoc($qmapel)) {
                              echo '<option value="'.$row['tahun_akhir'].'">'.$row['tahun_akhir'].'</option>';}
                              ?>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary bg-success">Search</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
          <?php  
          include "logoutmodal.php";
          ?>
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
