<?php 
if (!empty($_SESSION['username'])) {
 ?>
 <nav class="navbar navbar-expand navbar-dark static-top " style="background-color: #367757">
  <a class="navbar-brand mr-1" href="index.html">SIAS</a>
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- <span class="badge badge-danger">9+</span> -->
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <h1 class="dropdown-header"> Walikelas</h1>
        <?php 
        ?>
        <a class="dropdown-item" href="#">Selamat datang <?php echo $_SESSION['nama']; ?></a>

        <div class="card">
          <div class="card-body">
            <?php  
            $sql = "SELECT foto FROM guru where username ='".$_SESSION['username']."'";
            $dat = mysqli_query($konek,$sql);
            while ($row=mysqli_fetch_array($dat)){
              echo "<img src=../image/".$row['foto'].">";
            }
            ?>
            <a href="profilwalikelas.php" class="btn btn-primary">Profil</a>
            <a href="profilwalikelasedit.php" class="btn btn-primary">Edit Profil</a>
          </div>
        </div>

        <div class="dropdown-divider"></div>
        <!--  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a> -->
      </div>
    </li>
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-sign-out-alt fa-fw"></i>
        <!-- <span class="badge badge-danger">7</span> -->
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    </li>
  </ul>
</nav>
<?php 
}; ?>