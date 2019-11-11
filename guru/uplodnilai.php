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
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Data User</li>
        </ol>
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <h3>Uplod file Nilai(hanya format xls)</h3>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file" id="file" required>
                  <label class="custom-file-label" for="customFile">Upload file nilai</label>
                </div>
                <button type="submit" name="download" value="download" class="btn btn float-right"><a href="../_file/sampel/download.xlsx">dowload format</a></button>

                <button type="submit" name="import" value="Import" class="btn btn-primary float-right">Submit</button>

                <?php  
                if (isset($_POST['import'])) {
                  $file = $_FILES['file']['name'];
                  $ekstensi = explode(".", $file);
                  $file_name = "file-".round(microtime(true)).".".end($ekstensi);
                  $sumber = $_FILES['file']['tmp_name'];
                  $target_dir = "../_file/";
                  $target_file = $target_dir.$file_name;
                  move_uploaded_file($sumber, $target_file);
                  include "../_assets/libs/phpexcel/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php";
                  $obj = PHPExcel_IOFactory::load($target_file);
                  $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);
                  $sql = "INSERT INTO nilai_siswa (Nama_Kelas,Mapel,nama,tugas1,tugas2,UH,UTS,UAS,Semester,tahun_awal,tahun_akhir) VALUES";
                  for($i=3;$i<=count($all_data);$i++){
                    $nkelas     = $all_data[$i]['A'];
                    $nmapel     = $all_data[$i]['B'];
                    $nama       = $all_data[$i]['C'];
                    $ntugas1    = $all_data[$i]['D'];
                    $ntugas2    = $all_data[$i]['E'];
                    $UH         = $all_data[$i]['F'];
                    $UTS        = $all_data[$i]['G'];
                    $UAS        = $all_data[$i]['H'];
                    $semester   = $all_data[$i]['I'];
                    $tawal      = $all_data[$i]['J'];
                    $takhir     = $all_data[$i]['K'];
                    $sql        .="('$nkelas', '$nmapel', '$nama', '$ntugas1', '$ntugas2', '$UH', '$UTS', '$UAS', '$semester', '$tawal', '$takhir'),"; 
                  }
                  $sql= substr($sql,0,-1);
                  echo "IMPORT BERHASIL";
                  mysqli_query($konek,$sql)or die(mysqli_error($konek));
                  unlink($target_file);
                }

                ?>

              </form>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php  
    include "footer.php";
    ?>
  </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<?php  
include "logoutmodal.php";
?>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
