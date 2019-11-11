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

  <title>SB Ortu  - Dashboard</title>

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
    
          <!-- DataTables Example -->
         <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Informasi User</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>nama_ortu</th>
                      <th>alamat_ortu</th>
                      <th>telepon</th>
                      <th>username</th>
                      <th>password</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tbody>
                      <tr>
                      <td>1801</td>
                      <td>Kartika</td>
                      <td>Malang</td>
                      <td>081936888084</td>
                      <td>Kar</td>
                      <td>tika</td>
                     </tr>
                      <tr>
                      <td>1802</td>
                      <td>Sarjono</td>
                      <td>Malang</td>
                      <td>081936888084</td>
                      <td>Kar</td>
                      <td>tika</td>
                    </tr>
                    <tr>
                      <td>1803</td>
                      <td>Hidayati</td>
                      <td>Malang</td>
                      <td>081936888084</td>
                      <td>Kar</td>
                      <td>tika</td>
                    </tr>
                    <tr>
                      <td>1804</td>
                      <td>Mariam</td>
                      <td>Malang</td>
                      <td>081936888084</td>
                      <td>Kar</td>
                      <td>tika</td>
                    </tr>
                    <tr>
                      <td>1805</td>
                      <td>Rahayu</td>
                      <td>Malang</td>
                      <td>081936888084</td>
                      <td>Kar</td>
                      <td>tika</td>
                    </tr>
                    <tr>
                      <td>1806</td>
                      <td>Budiono</td>
                      <td>Malang</td>
                      <td>081936888084</td>
                      <td>Kar</td>
                      <td>tika</td>
                    </tr>
 <!-- Sticky Footer -->
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
