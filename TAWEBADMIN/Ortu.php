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
  <title>Data Ortu</title>
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
      <h3>Input Orang Tua Siswa</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <table border=0>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <td>NIS</td>
                <td><input type="text" name="NIS" prequired size="30"/></td>
              </tr>
              <tr>
                <td>Nama Ortu</td>
                <td><input type="text" name="nama_ortu" prequired size="30"/></td>
              </tr>

              <tr>
                <td>Alamat Ortu</td>
                <td><input type="text" name="alamat_ortu" required size="30"/></td>
              </tr>

              <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon" maxlength="12" required size="30"/></td>
              </tr>

              <tr>
                <td>Username</td>
                <td><input type="text" name="username" required size="30"/></td>
              </tr>

              <tr>
                <td>Password</td>
                <td><input type="password" name="password" required size="30"/></td>
              </tr>
              <tr>
                <td>foto</td>
                <div class="custom-file">
                  <td><input type="file" name="foto"></td>
                </div>
              </tr>
              <td><input type="hidden" name="level" value="ortu" /></td>
              <tr>
               <td></td>
               <td><input type="submit" name="sub" value="Simpan" size="30"/></td>
             </table>
           </form>
           <?PHP
           if (isset($_POST['sub'])) {
            $nNIS     = $_POST['NIS'];
            $NamaOrtu = $_POST['nama_ortu']; 
            $AlamatOrtu = $_POST['alamat_ortu'];
            $Telepon  = $_POST['telepon'];
            $Username = $_POST['username'];
            $Password = $_POST['password'];
            $level    = $_POST['level'];

            $foto   = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $fotobaru = date('dmYHis').$foto;
            $path = "../image/".$fotobaru;
            move_uploaded_file($tmp, $path);
            $query    = "INSERT INTO ortu VALUES ('$nNIS','$NamaOrtu','$AlamatOrtu', '$Telepon','$Username', '$Password','$fotobaru')";
            $sql      = mysqli_query($konek, $query);
            $quer     = "INSERT INTO login (`NIP`,`nama`, `username`, `password`, `level`)VALUES ('$nNIS','$NamaOrtu','$Username', '$Password','$level')";
            $sqm      = mysqli_query($konek, $quer);
            // echo $query;
          }
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Data Guru</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NIS</th>
                      <th>Nama ortu</th>
                      <th>Alamat ortu</th>
                      <th>telepon</th>
                      <th>username</th>
                      <th>password</th>
                      <th>Delete</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                </tbody>
                <?PHP
                $data=mysqli_query($konek, "SELECT * from ortu order by NIS");
                $no=1;
                while($row=mysqli_fetch_array($data)){
                  ?>
                  <tr>
                   <td><?php echo $no++ ?></td>
                   <td><?php echo $row['NIS']; ?></td>
                   <td><?php echo $row['nama_ortu']; ?></td>
                   <td><?php echo $row['alamat_ortu']; ?></td>
                   <td><?php echo $row['telepon']; ?></td>
                   <td><?php echo $row['username']; ?></td>
                   <td><?php echo $row['password']; ?></td>
                   <td><center><a href='delete_ortu.php?NIS=<?php echo $row['NIS'];?>'><i class="fas fa-trash"></i></a></td>
                     <td><center><a href='edit_ortu.php?NIS=<?php echo $row['NIS'];?>'><i class="far fa-edit"></i></a></td>
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
       <script src="../js/demo/chart-area-demo.js"></script
       </body>
       </html>



