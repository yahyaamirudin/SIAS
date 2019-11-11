<?php
include "../koneksi.php";
ob_start();
session_start();
if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
};
?>

<?php  
include "crud.php";
$crud = new CRUD("localhost","root","","webakhir");
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
  <link href="../_assets/open-iconic/png" rel="stylesheet">

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
      <div class="h1">
        <h1>Data User</h1>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="card bg-primary">
            <div class="card-body">
              <h3 class="card-text text-left">
                <?php  
                $sql      = "SELECT NIS from siswa";
                $data     = mysqli_query($konek,$sql);
                $result   = mysqli_num_rows($data);
                echo $result;
                ?>
              </h3>
              <h3 class="card-text text-left">Siswa</h3>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card bg-success">
            <div class="card-body">
             <h3 class="card-text text-left">
               <?php  
               $sql      = "SELECT NIP from guru";
               $data     = mysqli_query($konek,$sql);
               $result   = mysqli_num_rows($data);
               echo $result;
               ?>
             </h3>
             <h3 class="card-text text-left">Guru</h3>
           </div>
         </div>
       </div>
       <div class="col-sm-4">
        <div class="card bg-warning">
          <div class="card-body">
           <h3 class="card-text text-left">
            <?php  
            $sql      = "SELECT NIS from ortu";
            $data     = mysqli_query($konek,$sql);
            $result   = mysqli_num_rows($data);
            echo $result;
            ?>
          </h3>
          <h3 class="card-text text-left">Ortu</h3>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
   <div class="col-sm-4">
    <div class="card bg-danger">
      <div class="card-body">
        <h3 class="card-text text-left">
          <?php  
          $sql      = "SELECT Nomor_Agenda from agenda";
          $data     = mysqli_query($konek,$sql);
          $result   = mysqli_num_rows($data);
          echo $result;
          ?>
        </h3>
        <h3 class="card-text text-left">Agenda</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card bg-info">
      <div class="card-body">
       <h3 class="card-text text-left">
          <?php  
          $sql      = "SELECT * from biaya_administrasi";
          $data     = mysqli_query($konek,$sql);
          $result   = mysqli_num_rows($data);
          echo $result;
          ?>
       </h3>
       <h3 class="card-text text-left">Administrasi</h3>
     </div>
   </div>
 </div>
</div>
</div>
</div>
<?php 
include "footer.php";
?>
</div>
</div>
<!-- Scroll to Top Button-->
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
