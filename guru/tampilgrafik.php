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

  <script type="text/javascript" src="../js/Chartjs/Chart.js"></script>

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
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
          Area Chart Example</div>
          

          <?php  
          $nama     = $_GET['nama']; 
          $kelas    = $_GET['kelas'];
          $smt      = $_GET['smash'];
          $sql = "SELECT * FROM nilai_siswa WHERE Nama_Kelas='$kelas' and nama = '$nama' and Semester = '$smt'";
          $sql2 = "SELECT Distinct Nama_Kelas,nama,Semester FROM nilai_siswa WHERE Nama_Kelas='$kelas' and nama = '$nama' and Semester = '$smt'";
          $hasil = mysqli_query($konek,$sql2);
          while($row = mysqli_fetch_array($hasil)){
            ?>
            <table>
              <tr>
                <td>Nama      = <?php echo $row['nama']; ?></td>
              </tr>
              <tr>
                <td>kelas     =<?php echo $row['Nama_Kelas']; ?></td>
              </tr>
              <tr>
                <td>Semester  =<?php echo $row['Semester']; ?></td>
              </tr>
              <tr>
                <td style="display: none;"><?php echo $row['Nilai_Akhir']; ?></td>
              </tr>
            </table>
          <?php } ?>


          <div class="card-body">
            <canvas id="myChart" width="100%" height="30"></canvas>
          </div>

          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ["Matematika", "PKN", "Biologi"],
                datasets: [{
                  label: '',
                  data: [
                  <?php
                 
                  $Matematika = mysqli_query($konek,"SELECT Nilai_Akhir FROM nilai_siswa WHERE Nama_Kelas='$kelas' and nama = '$nama' and Semester = '$smt' and Mapel = 'matematika'");

                    while ($row = mysqli_fetch_array($Matematika)){
                      echo $row['Nilai_Akhir'];
                    }
                  
                  ?>,
                   <?php  
                  $PKN = mysqli_query($konek,"SELECT Nilai_Akhir FROM nilai_siswa WHERE Nama_Kelas='$kelas' and nama = '$nama' and Semester = '$smt' and Mapel = 'PKN'");
                    while ($row = mysqli_fetch_array($PKN)){
                      echo $row['Nilai_Akhir'];}
                  ?>,
                   <?php  
                  $Biologi = mysqli_query($konek,"SELECT Nilai_Akhir FROM nilai_siswa WHERE Nama_Kelas='$kelas' and nama = '$nama' and Semester = '$smt' and Mapel = 'Biologi'");
                   while ($row = mysqli_fetch_array($Biologi)){
                      echo $row['Nilai_Akhir'];}
                  ?>

                  ],
                  backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  
                  ],
                  borderColor: [
                  'rgba(255,99,132,1)',
                  
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          </script>
        </div>
      </div>
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
