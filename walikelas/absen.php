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
$crud = new CRUD("localhost","root","","webakhir" )
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
            <a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Absensi</li>
        </ol>
        <!-- form input absen -->
        <div class="row">
          <div class="col-sm-6">
            <h2>Input absensi</h2>
            <div class="card">
              <div class="card-body">
                <form action="mulaiabsen.php" method="GET" role="form">
                  <label>kelas</label>
                  <select name="idkelas" class="custom-select custom-select mb-3" id="kelas">
                    <?php 
                    // $submit = $_REQUEST['submit'];
                    // $kelas = $_REQUEST['kelas'];
                    // $idprodi = $_REQUEST['idprodi'];
                    // $nis=$_REQUEST['nis'];
                    $qkelas = mysqli_query($konek,"SELECT * FROM `kelas` join guru on kelas.walikelas=guru.nama_guru where walikelas='".$_SESSION['nama']."'");

                    while ($row=mysqli_fetch_assoc($qkelas)) {
                      echo '<option value="'.$row['Nama_kelas'].'">'.$row['Nama_kelas'].'</option>';
                    }
                    ?>
                  </select>
                  <div class="form-group">
                    <label class="sr-only" for="tgl1">Mulai</label>
                    <input type="date" class="form-control" id="tgl1" name="tgl1">
                  </div>
                 <!--  <div class="form-group">
                    <label>tanggal</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
                  </div>
                  <br> -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit" value="baru" class="btn btn-default">mulai absen</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--  <?php  
      // if (@$_POST['submit']) {
      //     $kelas = @$_POST['idkelas'];
      //     $tgl = @$_POST['tgl'];
      //     $data = $array('idkelas'=>$kelas,'tgl'->$tgl);
      //     $crud->insert("absensi",$data);

      //  }
          ?> -->
          <div class="col-sm-6">
            <h2>Lihat Absensi</h2>
            <div class="card">
              <div class="card-body">
                <form action="rekapabsen.php" method="get">
                  <label>kelas</label>
                  <select name="idkelas" class="custom-select custom-select mb-3" id="kelas">
                    <?php 
                    // $submit = $_REQUEST['submit'];
                    // $kelas = $_REQUEST['kelas'];
                    // $idprodi = $_REQUEST['idprodi'];
                    // $nis=$_REQUEST['nis'];
                    $qkelas = mysqli_query($konek,"SELECT * FROM `kelas` join guru on kelas.walikelas=guru.nama_guru where walikelas='".$_SESSION['nama']."'");
                    while (list($kelas)=mysqli_fetch_array($qkelas)) {
                      echo '<option value="'.$kelas.'">'.$kelas.'</option>';
                    }
                    ?>
                  </select>
                  <div class="form-group">
                    <input type="date" class="form-control" id="tgl" name="tgl1"/>
                  </div>
                  <button type="submit" name="rekap" class="btn btn-primary" >Rekap absen</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
  </div>
</div>
<!-- /.container-fluid -->

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
<script src="../vendor/datatables/jquery.dataTables.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
