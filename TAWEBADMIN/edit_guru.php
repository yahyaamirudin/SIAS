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
  <title>Data Guru</title>
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
    <body>
      <h3>Input Data Guru</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <table border=0>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <td>NIP</td>
                <td><input type="text" name="NIP" value = "<?php echo $_GET['NIP'] ?>"/></td>
              </tr>
              <tr>
                <td>Nama Guru</td>
                <td><input type="text" name="nama_guru" required="" /></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required/></td>
              </tr>
              <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon" maxlength="12" required/></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><input type="text" name="username" required/></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" name="password" required/></td>
              </tr>
              <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempat" required/></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td><input type="Date" name="tanggal_lahir" required/></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><input type="radio" name="jenis_kelamin" value="L" title="Laki-laki" required/>Laki-laki&nbsp;&nbsp;
                  <input type="radio" name="jenis_kelamin" value="P" title="Perempuan" required/>Perempuan</td>
                </tr>
                <tr>
                  <td>foto</td>
                  <div class="custom-file">
                    <td><input type="file" name="foto"></td>
                  </div>
                </tr>
                <tr>
                  <td>Level</td>
                  <td>
                    <input type="radio" name="level" value="guru" title="Guru" required size="30"/>Guru&nbsp;&nbsp;
                    <input type="radio" name="level" value="walikelas" title="Walikelas" required size="30"/>Walikelas
                  </td>
                </tr>
                <tr>
                 <td></td>
                 <td><input type="submit" name="sub" value="Edit" size="30"/></td>
               </table>
             </form>

             <?PHP
             if (isset($_POST['sub'])) {
              $NIP            = $_POST['NIP'];
              $NamaGuru       = $_POST['nama_guru'];
              $Alamat         = $_POST['alamat'];
              $Telepon        = $_POST['telepon'];
              $Username       = $_POST['username'];
              $Password       = $_POST['password'];
              $TempatLahir    = $_POST['tempat'];
              $TanggalLahir   = $_POST['tanggal_lahir'];
              $JenisKelamin   = $_POST['jenis_kelamin'];
              $level          = $_POST['level'];
              $foto           = $_FILES['foto']['name'];
              $tmp            = $_FILES['foto']['tmp_name'];
              $fotobaru       = date('dmYHis').$foto;
              $path           = "../image/".$fotobaru;
              move_uploaded_file($tmp, $path);

              $query  = "UPDATE guru set NIP = '$NIP', nama_guru='$NamaGuru', Alamat='$Alamat', telepon='$Telepon', username='$Username', password='$Password', tempat='$TempatLahir', tanggal_lahir='$TanggalLahir',  jenis_kelamin='$JenisKelamin',foto='$fotobaru',level = '$level' where NIP = '$NIP' ";
              $data = mysqli_query($konek,$query);
              $query2  = "UPDATE login set NIP = '$NIP',nama='$NamaGuru',username='$Username',password='$Password',level = '$level' where NIP = '$NIP' ";
              $data2 = mysqli_query($konek,$query2);
              // echo $query; 
              header('location: Guru.php');
            }
            ?>
            <?php  
            include "footer.php";
            ?>
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







