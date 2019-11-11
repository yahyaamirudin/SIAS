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
        <h1 class="dropdown-header">Admin</h1>
        <?php 
        ?>
        <a class="dropdown-item" href="#">Selamat datang <?php echo $_SESSION['nama']; ?></a>
        <div class="card">
          <div class="card-body">

            <img src="../image/logo.jpg" alt="" class="img-thumbnail rounded-circle">
            
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