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
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Nilai akademik</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <table>
            <tr>
                <td style="width: 300px;">Walikelas</td>
                <td style="width: 300px;">:</td>
                <td style="width: 300px;"><?php echo $_SESSION['nama'] ?></td>
            </tr>
            <tr>
              <form method="GET" action="daftarsiswaakademik.php">
                <td style="width: 300px;">Pilih kelas</td>
                <td style="width: 300px;">:</td>
                <td style="width: 300px;">
                  <select name="kelas" class="custom-select custom-select mb-3">
                   <?php  
                   $qkelas = mysqli_query($konek,"SELECT * FROM `kelas` join guru on kelas.walikelas=guru.nama_guru where walikelas='".$_SESSION['nama']."'");
                   while ($row=mysqli_fetch_assoc($qkelas)) {
                    echo '<option value="'.$row['Nama_kelas'].'">'.$row['Nama_kelas'].'</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td style="width: 300px;">Pilih pelajaran</td>
                <td style="width: 300px;">:</td>
                <td style="width: 300px;">
                 <select name="pelajaran" class="custom-select custom-select mb-3">
                  <?php  
                 $qmapel = mysqli_query($konek,"SELECT * FROM `mapel` join `jadwal_pelajaran` on mapel.ID_mapel = jadwal_pelajaran.ID_mapel");
                  while ($row=mysqli_fetch_array($qmapel)) {
                    echo '<option value="'.$row['nama_mapel'].'">'.$row['nama_mapel'].'</option>';}
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
               <td style="width: 300px;">Periode tahun awal</td>
               <td style="width: 300px;">:</td>
               <td style="width: 300px;">
                <select name="awal" class="custom-select custom-select mb-3">
                  <option selected>Periode Tahun awal</option>
                  <?php  
                  $qmapel = mysqli_query($konek,"SELECT distinct tahun_awal from `jadwal_pelajaran`");
                  while ($row=mysqli_fetch_assoc($qmapel)) {
                    echo '<option value="'.$row['tahun_awal'].'">'.$row['tahun_awal'].'</option>';}
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
               <td style="width: 300px;">Periode tahun akhir</td>
               <td style="width: 300px;">:</td>
               <td style="width: 300px;">
                <select name="akhir" class="custom-select custom-select mb-3">
                  <option selected>Periode Tahun akhir</option>
                  <?php  
                  $qmapel = mysqli_query($konek,"SELECT distinct tahun_akhir from `jadwal_pelajaran` ");
                  while ($row=mysqli_fetch_assoc($qmapel)) {
                    echo '<option value="'.$row['tahun_akhir'].'">'.$row['tahun_akhir'].'</option>';}
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
               <td style="width: 300px;">Semester</td>
               <td style="width: 300px;">:</td>
               <td style="width: 300px;">
                <select name="smash" class="custom-select custom-select mb-3">
                  <option selected>Semester</option>
                  <?php  
                  $qmapel = mysqli_query($konek,"SELECT distinct semester from `jadwal_pelajaran` ");
                  while ($row=mysqli_fetch_assoc($qmapel)) {  
                    echo '<option value="'.$row['semester'].'">'.$row['semester'].'</option>';}
                    ?>
                  </select>
                </td>
              </tr>
            </table>
            
            <button type="submit">submit</button>

          </form>
        </div>
      </div>
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
