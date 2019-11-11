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
  <title>Data Administrasi</title>
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
      <h3>Input Biaya Administrasi</h3>
      <form action="" method="post">
        <table border=0>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <td>Kelas</td>
                  <td>
                    <select name="Kelas" class="custom-select custom-select mb-3">
                     <?php  
                     $qkelas = mysqli_query($konek,"SELECT * FROM `kelas`");
                     while ($row=mysqli_fetch_assoc($qkelas)) {
                      echo '<option value="'.$row['Nama_kelas'].'">'.$row['Nama_kelas'].'</option>';
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>NIS</td>
                  <td>
                    <select name="NIS" id="NIS" onchange="isi_otomatis()" class="custom-select custom-select mb-3">
                     <?php  
                     $qkelas = mysqli_query($konek,"SELECT * FROM `siswa`");
                     while ($row=mysqli_fetch_assoc($qkelas)) {
                      echo '<option value="'.$row['NIS'].'">'.$row['NIS'].'</option>';
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Siswa</td>
                  <td><input type="text" name="Nama" id="Nama" prequired size="30"/></td>
                </tr>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script type="text/javascript">
                  function isi_otomatis(){
                    var NIS = $("#NIS").val();
                    $.ajax({
                      url:'ajaxrespon.php',
                      data:"NIS="+NIS,
                    }).success(function (data) {
                      var json = data,
                      obj = JSON.parse(json);
                      $('#Nama').val(obj.Nama);
                    });
                  }
                </script>
                <tr>
                  <td>Tanggal</td>
                  <td><input type="date" name="tanggal" required size="30"/></td>
                </tr>

                <tr>
                  <td>Keterangan</td>
                  <td><input type="radio" name="keterangan" value="Lunas" title="Lunas" required size="30"/>Lunas&nbsp;&nbsp;
                    <input type="radio" name="keterangan" value="Belum Lunas" title="Belum" required size="30"/>Belum Lunas</td>
                  </tr>

                  <tr>
                   <td></td>
                   <td><input type="submit" name="sub" value="Simpan Data" size="30"/></td>
                 </table>
                 
                 <?PHP
                 if (isset($_POST['sub'])) {
                  $nKelas      = $_POST['Kelas'];
                  $Siswa       = $_POST['Nama'];
                  $nis         = $_POST['NIS'];
                  $Tanggal     = $_POST['tanggal'];
                  $Keterangan  = $_POST['keterangan'];
                  $query  = "INSERT INTO biaya_administrasi VALUES ('$nKelas','$nis', '$Siswa','$Tanggal', '$Keterangan')";
                  $sql = mysqli_query($konek, $query);
                  // echo $query;
    // header('location: index.php');
                }
                ?>
              </form>
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                Data Administrasi</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Kelas</th>
                          <th>NIS</th>
                          <th>Siswa</th>
                          <th>Tanggal</th>
                          <th>Keterangan</th>
                          <th>Delete</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                    </tbody>
                    <?PHP
                    $data=mysqli_query($konek, "SELECT * from biaya_administrasi order by Kelas");
                    $no=1;
                    while($row=mysqli_fetch_array($data)){
                      ?>
                      <tr>
                       <td><?php echo $no++ ?></td>
                       <td><?php echo $row['Kelas']; ?></td>
                       <td><?php echo $row['NIS'] ?></td>
                       <td><?php echo $row['Nama']; ?></td>
                       <td><?php echo $row['tanggal']; ?></td>
                       <td><?php echo $row['keterangan']; ?></td>
                       <td><center><a href='delete_administrasi.php?NIS=<?php echo $row['NIS'];?>'><i class="fas fa-trash"></i></a></td>
                         <td><center><a href='edit_administrasi.php?NIS=<?php echo $row['NIS'];?>'><i class="fas fa-edit"></i></a></td>
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



