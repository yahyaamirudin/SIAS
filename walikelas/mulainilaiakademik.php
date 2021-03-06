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


    <!-- Sidebar -->
    <?php  
    include "sidebar.php";
    ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="nilai akademik.html">Nilai akademik</a>
          </li>
          <li class="breadcrumb-item active">Daftar siswa</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Data Nilai Siswa</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width: 50px;">No</th>
                    <th style="width: 100px;">Mapel</th>
                    <th style="width: 100px;">Kelas</th>
                    <th style="width: 300px;">Nama</th>
                    <th>Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no=1;
                  $mapel =$_POST['pelajaran'];
                  $nkelas = $_POST['kelas'];
                  $sql = mysqli_query($konek,"SELECT * FROM siswa JOIN mapel join kelas ON siswa.ID_Kelas=mapel.ID_Kelas and  mapel.ID_Kelas=kelas.ID_Kelas WHERE nama_mapel = '$mapel' and Nama_kelas = '$nkelas'");
                  while ($data=mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                      <td><?php  echo $no++; ?></td>
                      <td style="width: 100px;"><?php  echo $data['nama_mapel']; ?></td>
                      <td style="width: 100px;"><?php  echo $data['Nama_kelas']; ?></td>
                       <td style="width: 300px;"><?php  echo $data['Nama']; ?></td>
                       <td><a href="<a href='daftarsiswaakademik.php?kelas=<?=$row['Nama_kelas']?>&pelajaran=<?=$row['nama_mapel']?>'></a>">Nilai</a></td>
                    </tr>
                  </tbody>
                  <?php
                }  
                ?>
              </table>
            </form>
          </div>
          <!-- <script>
            $(document).ready(function () {
              $("myButton").click(function () {
                $("myForm").submit();
              });
            });
          </script>  -->
        <!--   <?php  
          // if (isset($_POST['sub'])) {
          //  $kelas = $_POST['kelas'];
          //  $mapel =$_POST['pelajaran'];
          //  $nama = $_POST['Nama'];
          //  $tgs1 = $_POST['tugas1'];
          //  $tgs2 = $_POST['tugas2'];
          //  $uh = $_POST['UH'];
          //  $uts = $_POST['UTS'];
          //  $uas = $_POST['UAS'];

          //  $q="INSERT INTO `nilai_siswa` VALUES ('$kelas','$maple','$nama','$tgs1','$tgs2','$uh','$uts','$uas')";
          //  $add = mysqli_query($konek,$q);
         // }
         ?> -->
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
