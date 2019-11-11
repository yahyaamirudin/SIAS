<?php 
ob_start();
session_start();
if(isset($_SESSION['username'])) header("location: guru/index.php");
include "koneksi.php";

?>
<?php 
if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style type="text/css">
  img{
    height: 150px;
    width: 130px;
    margin-top: 10px;
  }
  body{
  background: #35A9DB;
  text-align: center;
  background: linear-gradient(yellow,#35A9DB); /* Standard syntax */
  background: -webkit-linear-gradient(yellow,#35A9DB); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(yellow,#35A9DB); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(yellow,#35A9DB); /* For Firefox 3.6 to 15 */
}

 

</style>

</head>

<body>
  <div class="logo text-center">
    <img src="image/logo.jpg" alt="logo">
    <h1 class="h1 text-center">SISTEM INFORMASI AKADEMIK SISWA</h1>
    <h2 class="text-center"></h2>
  </div>
  <div class="container">
    <div class="row mx-auto">
      <div class="card col-md-7 mx-auto" style="width: 18rem;">
        <div class="card-body">
         <h5 class="card-title">SELAMAT DATANG DI SISTEM INFORMASI SISWA SMP ISLAM TERPADU KEBONSARI MADIUN</h5>
         <p class="card-text">sistem informasi siswa ini terdiri dari 4 role user. yaitu admin,walikelas,guru dan orangtua. setiap user memiliki hak akses masing masing. </p>
       </div>
     </div>
     <div class="card card-login col-md-4 mx-auto">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form method="post" action="">
          <div class="form-group">
           <label for="username">Username</label>
           <div class="form-label-group">
            <input type="text" name="username1" class="form-control" placeholder="username" required="required" autofocus="autofocus"/>
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <div class="form-label-group">
            <input type="password" name="password1" class="form-control" placeholder="password" required="required">
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<?php
include 'koneksi.php';
if (isset($_POST['username1'])&&isset($_POST['password1'])) {

  $username = $_POST["username1"];
  $password = $_POST["password1"];
  $log      = mysqli_query($konek, "SELECT * from login where username='$username' and password='$password'");
  $result   = mysqli_num_rows($log);
  $data = mysqli_fetch_array($log);


  if($result>0){
    if ($data['level'] == "admin") {
      $_SESSION['username'] = $username;

          // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
      $_SESSION['level']    = "admin";
      echo "<script>alert('Selamat Datang, Admin.')";
      header("location:TAWEBADMIN/index.php");
  // kondisi walikelas
    }elseif($data['level'] == "walikelas"){
      session_start();
      $_SESSION['username'] = $username;
          // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
      $_SESSION['level']    = "walikelas";
      echo "<script>alert('Selamat Datang, walikelas.')";
      header("location:walikelas/index.php");
  // kondisi guru
    }elseif($data['level'] == "guru"){
      session_start();
      $_SESSION['username'] = $username;
          // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
      $_SESSION['level']    = "guru";
      echo "<script>alert('Selamat Datang, guru.')";
      header("location:guru/index.php");

    }elseif($data['level'] == 'ortu'){
      session_start();
      $_SESSION['username'] = $username;
          // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
      $_SESSION['level']    = "ortu";
      echo "<script>alert('Selamat Datang, ortu.')</script>";
      header("location:TAWEBORTU/Profile.php");
    }else{
      header("location:login.php?pesan=gagal");
      echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    }
    $_SESSION['nama'] = $data['nama'];
  }
}
  ?>
</body>
</html>