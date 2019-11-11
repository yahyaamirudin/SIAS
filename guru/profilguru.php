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
          <h1>Profil <?php echo $_SESSION['nama']; ?></h1>
        </div>
        <table class="table table-bordered" >
          <tr>
            <td>NIP</td>
            <?php  
            $nama = $_SESSION['nama'];
            ?>
            <td>
              <?php  
              $sql = "SELECT NIP FROM guru where username ='".$_SESSION['username']."'";
              $dat = mysqli_query($konek,$sql);
              while ($row=mysqli_fetch_array($dat)){
                echo $row['NIP'];
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>Nama Guru</td>
            <td>
              <?php  
              $sql = "SELECT nama_guru FROM guru where username ='".$_SESSION['username']."'";
              $dat = mysqli_query($konek,$sql);
              while ($row=mysqli_fetch_array($dat)){
                echo $row['nama_guru'];
              }
              ?> 
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>
              <?php  
              $sql = "SELECT Alamat FROM guru where username ='".$_SESSION['username']."'";
              $dat = mysqli_query($konek,$sql);
              while ($row=mysqli_fetch_array($dat)){
                echo $row['Alamat'];}
                ?> 
              </td>
            </tr>
            <tr>
              <td>Telepon</td>
              <td>

                <?php  
                $sql = "SELECT telepon FROM guru where username ='".$_SESSION['username']."'";
                $dat = mysqli_query($konek,$sql);
                while ($row=mysqli_fetch_array($dat)){
                  echo $row['telepon'];}
                  ?> 

                </td>
              </tr>
              <tr>
                <td>Username</td>
                <td>
                  <?php  
                  $sql = "SELECT username FROM guru where username ='".$_SESSION['username']."'";
                  $dat = mysqli_query($konek,$sql);
                  while ($row=mysqli_fetch_array($dat)){
                    echo $row['username'];}
                    ?> 
                  </td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td>
                    <?php  
                    $sql = "SELECT password FROM guru where username ='".$_SESSION['username']."'";
                    $dat = mysqli_query($konek,$sql);
                    while ($row=mysqli_fetch_array($dat)){
                      echo $row['password'];}
                      ?> 
                    </td>
                  </tr>
                  <tr>
                    <td>TTL </td>
                    <td>
                      <?php  
                       $sql = "SELECT tempat,tanggal_lahir FROM guru where username ='".$_SESSION['username']."'";
                      $dat = mysqli_query($konek,$sql);
                      while ($row=mysqli_fetch_array($dat)){
                        echo $row['tempat'];
                        echo ",";
                        echo $row['tanggal_lahir'];
                        }
                        ?> 

                      </td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>
                        <?php  
                        $sql = "SELECT jenis_kelamin FROM guru where username ='".$_SESSION['username']."'";
                        $dat = mysqli_query($konek,$sql);
                        while ($row=mysqli_fetch_array($dat)){
                          echo $row['jenis_kelamin'];}
                          ?> 
                        </td>
                      </tr>
                      <tr>
                      <td>Foto</td>
                      <td>
                        <?php  
                        $sql = "SELECT foto FROM guru where username ='".$_SESSION['username']."'";
                        $dat = mysqli_query($konek,$sql);
                        while ($row=mysqli_fetch_array($dat)){
                          echo "<img src=../image/".$row['foto']." width='400' height='300'>";
                        }
                          ?> 
                        </td>
                      </tr>
                    </table>
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
