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
            <a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
        <div class="h1">
          <h1> Edit Profil <?php echo $_SESSION['nama']; ?></h1>
        </div>
        <form method="POST" action="" enctype="multipart/form-data">
          <table class="table table-bordered" >
            <tr>
              <td>NIP</td>
              <td><input type="text" name="NIP"></td>
            </tr>
            <tr>
              <td>Nama Guru</td>
              <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><input type="text" name="Alamat"></td>
            </tr>
            <tr>
              <td>Telepon</td>
              <td><input type="text" name="telp"></td>
            </tr>
            <tr>
              <td>Username</td>
              <td><input type="text" name="Username"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="text" name="Password"></td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td><input type="text" name="Tempat"></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td><input type="date" name="Tanggal"></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>
                <input type="radio" name="JK" value="L">Laki laki
                <input type="radio" name="JK" value="P">Perempuan
              </td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" required>
                  <label class="custom-file-label" for="customFile">Upload file foto</label>
                </div>
              </td>
            </tr>
          </table>
          <button type="submit" name="simpan">Simpan</button>
        </form>
        <?php  
        if (isset($_POST['simpan'])) {
          $nip    = $_POST['NIP'];
          $nama   = $_POST['Nama'];
          $alamat = $_POST['Alamat'];
          $telp   = $_POST['telp'];
          $user   = $_POST['Username'];
          $pass   = $_POST['Password'];
          $tmpt    = $_POST['Tempat'];
          $tanggal= $_POST['Tanggal'];
          $jk     = $_POST['JK'];
          
          $foto   = $_FILES['foto']['name'];
          $tmp = $_FILES['foto']['tmp_name'];
          $fotobaru = date('dmYHis').$foto;
          $path = "../image/".$fotobaru;
          move_uploaded_file($tmp, $path);

          $query = "UPDATE guru set NIP='$nip',nama_guru='$nama',Alamat = '$alamat',telepon='$telp',username='$user',password='$pass',tempat='$tmpt',tanggal_lahir='$tanggal',jenis_kelamin='$jk',foto='$fotobaru' where nama_guru='".$_SESSION['nama']."'";
          $upp = mysqli_query($konek,$query);
          echo $query;
        }


        ?>
      </div>
    </div>

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright © SIAS 2018</span>
        </div>
      </div>
    </footer>

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
