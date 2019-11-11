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
          <a href="absen.html">Absen</a>
        </li>
        <li class="breadcrumb-item active">Mulai Absensi</li>
      </ol>
      <!-- form input absen -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
        Absen Siswa</div>
        <div class="card-body">
          <div class="table-responsive">
            <form method="post">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>kelas</th>
                    <th>NIS</th>
                    <th style="width: 450px;">Nama siswa</th>
                    <th style="width: 300px;">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $kelas = $_GET['idkelas'];
                  $tgl   = $_GET['tgl1'];
                  $query = "SELECT * from biaya_administrasi join siswa on biaya_administrasi.Nama=siswa.Nama where Kelas='$kelas'";
                  $sql = mysqli_query($konek,$query);
                  $no = 1;
                  $i = 0;
                  if($sql){
                    while ($data=mysqli_fetch_array($sql)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['Kelas']; ?>
                          <input type="hidden" name="kelas[]" value="<?php  echo $data['Kelas']; ?>">
                        </td>
                        <td><?php echo $data['NIS']; ?>
                          <input type="hidden" name="nis[]" value="<?php  echo $data['NIS']; ?>">
                        </td>
                        <td><?php echo $data['Nama']; ?>
                          <input type="hidden" name="nama[]" value="<?php  echo $data['Nama']; ?>">
                        </td>
                          <input type="hidden" name="tanggal[]" class="form-control" value="<?php echo $_GET['tgl1']?>">
                        <td>
                          <input type="radio"  name="keterangan[<?php echo $i ?>]" value="hadir" checked>hadir

                          <input type="radio" name="keterangan[<?php echo $i ?>]" value="sakit">sakit

                          <input type="radio" name="keterangan[<?php echo $i ?>]" value="izin">izin

                          <input type="radio"  name="keterangan[<?php echo $i ?>]" value="alpha">alpha
                        </div>
                  <?php
                  $i++;
                }  

              }else{
                echo "Query failed with error: " . mysqli_error($konek) . "<br>";
              }
              ?>
            </tbody>
          </table>
          <button type='submit' name='submit' class='btn btn-primary'>Submit</button> 
        </form>
        <?php 
        if (isset($_POST['submit'])) {
          $jmldata = count($_POST['nama']);
          for($x=0;$x<$jmldata;$x++){
            $nis    = $_POST['nis'][$x];
            $nama   = $_POST['nama'][$x];
            $kls    = $_POST['kelas'][$x];
            $tgl    = $_POST['tanggal'][$x];
            $ket    = $_POST['keterangan'][$x];
            $query = "INSERT INTO `absensi`(`NIS`, `Nama`, `ID_Kelas`, `Tgl_absen`, `Keterangan`) VALUES ('$nis','$nama','$kls','$tgl','$ket')";
            $add  =  mysqli_query($konek,$query);
            echo $query;
            header("location:absen.php");
          }
        }
        ?>    
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>
</div>
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