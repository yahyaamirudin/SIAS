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
  <title>Data Siswa</title>
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
    <h3>Input Data Siswa</h3>
    <form action="" method="post">
      <table border=0>
       <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
              <td>NIS</td>
              <td><input type="text" name="NIS" prequired size="30"/></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td><input type="text" name="Nama" prequired size="30"/></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><input type="text" name="Alamat" required size="30"/></td>
            </tr>
            <tr>
              <td>Telepon</td>
              <td><input type="text" name="telepon" required size="30"/></td>
            </tr>
            <tr>
              <td>Tempat Lahir</td>
              <td><input type="text" name="Tempatlahir" required size="30"/></td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>   
              <td><input type="date" name="Tanggallahir" required size="30"/></td>
            </tr>
            <tr>
             <td></td>
             <td><input type="submit" name="sub" value="Simpan" size="30"></td>
           </table>
           <?PHP
           if (isset($_POST['sub'])) {
            $nNIS     = $_POST['NIS'];
            $Nama     = $_POST['Nama'];
            $Alamat   = $_POST['Alamat'];
            $telepon  = $_POST['telepon'];
            $TempatLahir  = $_POST['Tempatlahir'];
            $TanggalLahir = $_POST['Tanggallahir'];
            $query  = "INSERT INTO siswa VALUES ('$nNIS', '$Nama', '$Alamat','$telepon', '$TempatLahir', '$TanggalLahir')";
            $sql = mysqli_query($konek, $query);
            header('location: Siswa.php');
          }
          ?>
        </form>
      </tr>
    </table>
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
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Tempat lahir</th>
                      <th>Tanggal lahir</th>
                      <th>Delete</th>
                      <th>Edit</th>
                    </tr>
                    </thead>
                </tbody>
                <?PHP
                $data=mysqli_query($konek, "SELECT * from siswa order by NIS");
                $no=1;
                while($row=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                   <td><?php echo $row['NIS']; ?></td>
                   <td><?php echo $row['Nama']; ?></td>
                   <td><?php echo $row['Alamat']; ?></td>
                   <td><?php echo $row['telepon']; ?></td>
                   <td><?php echo $row['Tempat lahir']; ?></td>
                   <td><?php echo $row['Tanggal lahir']; ?></td>
                   <td><center><a href='delete_siswa.php?nis=<?php echo $row['NIS'];?>'><i class="fas fa-trash"></i></a></td>
                   <td><center><a href='edit_siswa.php?nis=<?php echo $row['NIS'];?>'><i class="far fa-edit"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</table>
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



