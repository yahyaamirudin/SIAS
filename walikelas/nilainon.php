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
          <a href="nilainonakademik.html">Daftar Siswa</a>
        </li>
        <li class="breadcrumb-item active">Nilai</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
        Data Nilai Siswa</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                <form method="POST" action="">
                  <input type="text" name="nama" class="form-control" value="<?php echo $_GET['nama']?>">

                   <input type="hidden" name="kelas" class="form-control" value="<?php echo $_GET['kelas']?>">
                   <input type="text" name="awal" class="form-control" value="<?php echo $_GET['awal']?>">

                   <input type="hidden" name="akhir" class="form-control" value="<?php echo $_GET['akhir']?>">
                    <input type="hidden" name="smash" class="form-control" value="<?php echo $_GET['smash']?>">
                  <tr>
                    <th>Nilai akhlak</th>
                    <th>Nilai</th>
                  </tr>
                  <tr>
                    <td>1. kesantrian</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="santri" class="form-control" id="nilainonakademik">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Alquran</th>
                    <th>Nilai</th>
                  </tr>
                  <tr>
                    <td>1. tajwid</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="tajwid" class="form-control" id="nilainonakademik">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Arab</th>
                    <th>Nilai</th>
                  </tr>
                  <tr>
                    <td>1. Qiroah</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="qiroah" class="form-control" id="nilainonakademik">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Hafalan</th>
                    <td>Nilai</td>
                  </tr>
                  <tr>
                    <td>1. An-Nass</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="nass" class="form-control" id="nilainonakademik">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Inggris</th>
                    <th>Nilai</th>
                  </tr>
                  <tr>
                    <td>1. Vocabulary</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="vocab" class="form-control" id="nilainonakademik">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Nilai Tambahan</th>
                    <th>Nilai</th>
                  </tr>
                  <tr>
                    <td>1. Jurnalistik</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="jurnal" class="form-control" id="nilainonakademik">
                      </div>
                    </td>
                  </tr>
              </tbody>
            </table>
             <button type="submit" name="sub" class="btn btn-primary">Submit</button> 
          </form>
            <?php 
            if (isset($_POST['sub'])) {
              $nkelas = $_POST['kelas'];
              $nama   = $_POST['nama'];
              $awal   = $_POST['awal'];
              $akhir  = $_POST['akhir'];
              $smt    = $_POST['smash'];
              $santri = $_POST['santri'];
              $tajwid = $_POST['tajwid'];
              $qiroah = $_POST['qiroah'];
              $nass   = $_POST['nass'];
              $vocab  = $_POST['vocab'];
              $jurnal = $_POST['jurnal'];
              $query = "INSERT INTO nilai_non VALUES ('$nkelas','$nama','$awal','$akhir','$smt','$santri','$tajwid','$qiroah','$nass','$vocab','$jurnal')";
              $sql = mysqli_query($konek,$query);
              echo $query;
              header('location:nilainonakademik.php');
            }
            ?>

          </form>
        </div>
      </div>
    </div>
  </div>
  <?php  
  include "footer.php";
  ?>
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
