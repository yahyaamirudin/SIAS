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
  <title>Data Kelas</title>
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
      <h3>Input Kelas Siswa</h3>
      <form action="" method="post">
        <table border=0>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <td>Nama Kelas</td>
                <td><input type="text" name="Nama_kelas" prequired size="30"/></td>
              </tr>
              <tr>
                <td>Walikelas</td>
                <td>
                  <select name="walikelas" class="custom-select custom-select mb-3">
                   <?php  
                   $qkelas = mysqli_query($konek,"SELECT * FROM `guru`");
                   while ($row=mysqli_fetch_assoc($qkelas)) {
                    echo '<option value="'.$row['nama_guru'].'">'.$row['nama_guru'].'</option>';
                  }
                  ?>
                  <input type="hidden" name="level" value="walikelas">
                </select>
              </td>
            </tr>    
            <tr>
             <td></td>
             <td><input type="submit" name="sub" value="Simpan Data" size="30"/></td>
           </table>
         </form>
         <?PHP
         if (isset($_POST['sub'])) {
          $nNmKelas     = $_POST['Nama_kelas'];
          $Walikelas    = $_POST['walikelas'];
          $level        = $_POST['level'];
          $query        = "INSERT INTO kelas VALUES ('$nNmKelas', '$Walikelas')";
          $sql          = mysqli_query($konek, $query);
          $update       = "UPDATE login set level='$level' where nama='$Walikelas'";
          $sql2         = mysqli_query($konek, $update);
          $update2      = "UPDATE guru set level='$level' where nama_guru='$Walikelas'";
          $sql3         = mysqli_query($konek, $update2);

          echo $query;
          header('location: Kelas.php');
        }
        ?>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Data Kelas</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Kelas</th>
                    <th>Walikelas</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                </thead>
              </tbody>
              <?PHP
              $data=mysqli_query($konek, "SELECT * from kelas order by Nama_kelas");
              $no=1;
              while($row=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['Nama_kelas']; ?></td>
                  <td><?php echo $row['walikelas']; ?></td>
                  <td><center><a href='delete_kelas.php?kelas=<?php echo $row['Nama_kelas'];?>'><i class="fas fa-trash"></i></a></td>
                   <td><center><a href='edit_kelas.php?kelas=<?php echo $row['Nama_kelas'];?>'><i class="fas fa-edit"></i></a></td>
                   </tr>
                 <?php } ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>

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



