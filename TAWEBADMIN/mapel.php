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
  <title>Mata Pelajaran</title>
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
  <h3>Input Mata Pelajaran</h3>
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
      <td>Type Mapel</td>
      <td><input type="text" name="type_mapel" prequired size="30"/></td>
    </tr>

    <tr>
      <td>Nama Mapel</td>
      <td><input type="text" name="nama_mapel" required size="30"/></td>
    </tr>

    <tr>
      <td>KKM</td>
      <td><input type="text" name="kkm" required size="30"/></td>
    </tr>

    <tr>
       <td></td>
         <td><input type="submit" name="sub" value="Simpan Data" size="30"/></td>
  </table>
  <?PHP
  if (isset($_POST['sub'])) {
    $nidmapel    = $_POST['ID_mapel'];
    $tpmapel   = $_POST['type_mapel'];
    $nmmapel   = $_POST['nama_mapel'];
    $kkm  = $_POST['kkm'];
    $query  = "INSERT INTO mapel VALUES ('$nidmapel', '$tpmapel', '$nmmapel', '$kkm')";
    $sql = mysqli_query($konek, $query);
    header('location: mapel.php');
}
?>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Mata Pelajaran</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Mapel</th>
                      <th>Type Mapel</th>
                      <th>Nama Mapel</th>
                      <th>KKM</th>
                      <th>Delete</th>
                      <th>Edit</th>
                    </tr>
                </thead>
                </tbody>
                <?PHP
                $data=mysqli_query($konek, "SELECT * from mapel order by ID_mapel");
                $no=1;
                while($row=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                   <td><?php echo $row['ID_mapel']; ?></td>
                   <td><?php echo $row['type_mapel']; ?></td>
                   <td><?php echo $row['nama_mapel']; ?></td>
                   <td><?php echo $row['KKM']; ?></td>
                   <td><center><a href="delete.php?ID_mapel=<?php echo $row['ID_mapel'];?>"><i class="fas fa-trash"></i></a></td>
                   <td><center><a href="edit.php?ID_mapel=<?php echo $row['ID_mapel'];?>"><i class="far fa-edit"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php  
  include "logoutmodal.php";
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

 

