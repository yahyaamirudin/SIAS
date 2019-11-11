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
              <form method="POST" action="">
                <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No</th>
                    <th style="width: 300px;">Nama</th>
                    <th>Nilai Tugas 1</th>
                    <th>Nilai Tugas 2</th>
                    <th>Nilai UH</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                  </tr>
                </thead>
                <tbody>

                 <?php  
                 $no=1;
                 $kelas =$_GET['kelas'];
                 $mapel =$_GET['pelajaran'];
                 $awal  =$_GET['awal'];
                 $akhir =$_GET['akhir'];
                 $smt   =$_GET['smash'];

                 $query = "SELECT distinct siswa.Nama from mapel join jadwal_pelajaran on mapel.ID_mapel=jadwal_pelajaran.ID_mapel
                 join biaya_administrasi on jadwal_pelajaran.Nama_Kelas=biaya_administrasi.Kelas
                 join siswa on biaya_administrasi.Nama=siswa.Nama where Nama_Kelas = '$kelas' and semester='$smt' and tahun_awal = '$awal' and tahun_akhir='$akhir' ";
                 $sql = mysqli_query($konek,$query);
                 if($sql){
                  while ($row=mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                      <td><?php  echo $no++; ?></td>
                      <td style="width: 100px;"><?php  echo $row['Nama']; ?>
                      <input type="hidden" name="nama[]" value="<?php  echo $row['Nama']; ?>">
                    </td>
                    <td><input type="text" name="tugas1[]"></td>
                    <td><input type="text" name="tugas2[]"></td>
                    <td><input type="text" name="UH[]"></td>
                    <td><input type="text" name="UTS[]"></td>
                    <td><input type="text" name="UAS[]"></td>
                    <input type="hidden" name="kelas[]" class="form-control" value="<?php echo $_GET['kelas']?>">
                    <input type="hidden" name="pelajaran[]" class="form-control" value="<?php echo $_GET['pelajaran']?>">
                    <input type="hidden" name="awal[]" class="form-control" value="<?php echo $_GET['awal']?>">
                    <input type="hidden" name="akhir[]" class="form-control" value="<?php echo $_GET['akhir']?>">
                    <input type="hidden" name="smash[]" class="form-control" value="<?php echo $_GET['smash']?>">
                  </tr>
                </tbody>
                <?php
              }  
            }else{
              echo "Query failed with error: " . mysqli_error($konek) . "<br>";
            }
            ?>
          </table>
          <button type="submit" name="submit">Submit</button>
        </form>

      
        <?php

        if (isset($_POST['submit'])) {
         $jmldata = count($_POST['nama']);
         for($i = 0;$i<$jmldata;$i++){
           $kelas   = $_POST['kelas'][$i];
           $nama    = $_POST['nama'][$i];
           $maple   = $_POST['pelajaran'][$i];
           $tgs1    = $_POST['tugas1'][$i];
           $tgs2    = $_POST['tugas2'][$i];
           $uh      = $_POST['UH'][$i];
           $nuts    = $_POST['UTS'][$i];
           $nuas    = $_POST['UAS'][$i];
           $smt     = $_POST['smash'][$i];
           $aw      = $_POST['awal'][$i];
           $ak      = $_POST['akhir'][$i];
           $jml     = ($tgs1+$tgs2+$uh+$nuts+$nuas)/5;

//===================================================================================================================
            // <!-- menghitung siswa lulu dan tidak -->
           $siswa      = "SELECT COUNT(Nilai_Akhir) as jumlah from nilai_siswa";
           $datasis    = mysqli_query($konek,$siswa);
           $resultsis  = mysqli_fetch_array($datasis);
           // echo "jumlah siswa ".$resultsis['jumlah'];
           // echo "<br>";

           $lulus      = "SELECT COUNT(Nilai_Akhir) as jumlah from nilai_siswa where Nilai_Akhir>=75";
           $datalul    = mysqli_query($konek,$lulus);
           $resultlul  = mysqli_fetch_array($datalul);
           // echo "jumlah siswa lulus ".$resultlul['jumlah'];
           // echo "<br>";

           $gagal      = "SELECT COUNT(Nilai_Akhir) as jumlah from nilai_siswa where Nilai_Akhir<75";
           $datagag    = mysqli_query($konek,$gagal);
           $resultgag  = mysqli_fetch_array($datagag);
           // echo "jumlah siswa gagal ".$resultgag['jumlah'];
           // echo "<br>";
           // echo "<hr>";


            // <!-- menghitung data total tabel nilai uas -->

           $uastotal  =  "SELECT COUNT(UAS) as jumlah FROM nilai_siswa";
           $duastot   = mysqli_query($konek,$uastotal);
           $resultot = mysqli_fetch_array($duastot); 
           // echo "jumlah total uas ".$resultot['jumlah'];
           // echo "<br>";

            // <!-- menghitung data total tabel nilai uts -->

           $utstotal  =  "SELECT COUNT(UTS) as jumlah FROM nilai_siswa";
           $dutstot   = mysqli_query($konek,$utstotal);
           $resultot2 = mysqli_fetch_array($dutstot); 
           // echo "jumlah total uts ".$resultot2['jumlah'];
           // echo "<br>";
           // echo "<hr>";


            // <!-- menghitung data lulus dan gagal  tabel nilai uts -->

           $uts = "SELECT COUNT(UTS) as jumlah FROM nilai_siswa where UTS >=75";
           $duts   = mysqli_query($konek,$uts);
           $resultuts = mysqli_fetch_array($duts); 
           // echo "jumlah uts lulus ".$resultuts['jumlah'];
           // echo "<br>";
           $uts2 = "SELECT COUNT(UTS) as jumlah FROM nilai_siswa where UTS <75";
           $duts2  = mysqli_query($konek,$uts2);
           $resultuts2 = mysqli_fetch_array($duts2); 
           // echo "jumlah uts gagal ".$resultuts2['jumlah'];
           // echo "<br>";
           // echo "<hr>";

            // <!-- menghitung data lulus dan gagal  tabel nilai uts -->

           $uas    = "SELECT COUNT(UAS) as jumlah FROM nilai_siswa where UAS >=75";
           $duas   = mysqli_query($konek,$uas);
           $resultuas = mysqli_fetch_array($duas); 
           // echo "jumlah uas lulus ".$resultuas['jumlah'];
           // echo "<br>";
           $uas2    = "SELECT COUNT(UAS) as jumlah FROM nilai_siswa where UAS <75";
           $duas2   = mysqli_query($konek,$uas2);
           $resultuas2 = mysqli_fetch_array($duas2); 
           // echo "jumlah uas gagal ".$resultuas2['jumlah'];
           // echo "<br>";

           //  <!-- mencari entropy semseta -->
           $entropytot = 0;
           $entropytot = (-($resultlul['jumlah']/$resultsis['jumlah'])*log($resultlul['jumlah']/$resultsis['jumlah'],2)+(-($resultgag['jumlah']/$resultsis['jumlah'])*log($resultgag['jumlah']/$resultsis['jumlah'],2)));
           // echo "<br>";
           // echo "entropynya total : ".$entropytot;

        // mencari entropy uts
           $entropyuts   = (-($resultuts['jumlah']/$resultot['jumlah'])*log($resultuts['jumlah']/$resultot['jumlah'],2)+(-($resultuts2['jumlah']/$resultot['jumlah'])*log($resultuts2['jumlah']/$resultot['jumlah'],2)));
           // echo "<br>";
           // echo "entropy uts ".$entropyuts;
        // mencari entropy uas
           $entropyuas   = (-($resultuas['jumlah']/$resultot['jumlah'])*log($resultuas['jumlah']/$resultot['jumlah'],2)+(-($resultuas2['jumlah']/$resultot['jumlah'])*log($resultuas2['jumlah']/$resultot['jumlah'],2)));
           // echo "<br>";
           // echo "entropy uas ".$entropyuas;
        //mencari gain uts
           $gainuts = $entropytot-((($resultuts['jumlah']/$resultot['jumlah'])*$entropyuts)+(($resultuts2['jumlah']/$resultot['jumlah'])*$entropyuts));
           // echo "<br>";
           // echo "gain uts ".$gainuts;
        //mencari gain uas
           $gainuas = $entropytot-((($resultuas['jumlah']/$resultot['jumlah'])*$entropyuas)+(($resultuas2['jumlah']/$resultot['jumlah'])*$entropyuas));
           // echo "<br>";
           // echo "gain uas ".$gainuas;
           // echo "<br>";
           // echo "<br>";
            // if ($maks == $gainuas){
            //     if ($nuas>=75) {
            //       echo "root1 dan tuntas";
            //       echo "<br>";
            //       $ket = 'Tuntas';
            //       $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
            //       // $ket = $_POST['keterangan'];
            //   }else{
            //       echo "root1 dan Belumtuntas";
            //       $ket = 'Belumtuntas';
            //       $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);}

            // }else if ($maks == $gainuts){
            //     if ($nuts>=75) {
            //       echo "<br>";
            //       echo "root2 dan tuntas";
            //       echo "<br>";
            //       $ket = 'Tuntas';
            //       $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
            //       // $ket = $_POST['keterangan'];
            //     }else{
            //       echo "root2 dan Belumtuntas";
            //       $ket = 'Belumtuntas';
            //       $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);}

            // }else{
            //       $ket = 'final Belumtuntas';
            //       $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
            //       // $ket = $_POST['keterangan'];
            // }
           $maks = max($gainuas,$gainuts);
           if ($maks == $gainuas) {
             if ($nuas>=75) {
              // echo "root uas /lulus";
              // echo "<br>";
              $ket = 'Tuntas';
              // $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
            }else if($nuas<75){
                if (($nuts>=75)) {
                  // echo "uts dan uas /lulus";
                  // echo "<br>";
                  $ket = 'Tuntas';
                  // $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
                }else{
                  // echo "uts dan uas tidak lulus";
                  // echo "<br>";
                  $ket = 'belum Tuntas';
                  // $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
                }
              }
          }else if ($maks == $gainuts) {
            if ($nuts>=75) {
              // echo "root uts /lulus";
              // echo "<br>";
              $ket = 'Tuntas';
              // $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
            }else if($nuts<75){
                if (($nuas>=75)) {
                  // echo "uts dan uas /lulus";
                  // echo "<br>";
                  $ket = 'Tuntas';
                  // $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);1
                }else{
                  // echo "uts dan uas tidak lulus";
                  // echo "<br>";
                  $ket = 'belum Tuntas';
                  // $ket = mysqli_real_escape_string($konek,$_POST['keterangan'][$i]);
                }
            }
          }else{
            echo "diluar patokan nilai";
          } 
          $query="INSERT INTO `nilai_siswa` VALUES ('$kelas','$maple','$nama','$tgs1','$tgs2','$uh','$nuts','$nuas', '$jml', '$smt','$ket','$aw', '$ak')";
          $add = mysqli_query($konek,$query);
          header('location:index.php');
          // echo $query;
        }
      }
      ?>
    </div>
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