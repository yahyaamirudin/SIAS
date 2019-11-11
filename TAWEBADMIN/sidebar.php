<!-- Sidebar -->
<?php 
if (!empty($_SESSION['username'])) {
 ?>
 <ul class="sidebar navbar-nav float-left">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-user"></i>
      <span><?php echo $_SESSION['nama']; ?></span>
    </a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Mata Pelajaran</span>
    </a>
    <div class="dropdown-menu" arial-labelledby="pagesDropdown">
     <a class="dropdown-item" href="mapel.php">Mapel</a>
   </div>
 </li>
 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-folder"></i>
    <span>Data User</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="Siswa.php">Siswa</a>
    <a class="dropdown-item" href="Guru.php">Guru</a>
    <a class="dropdown-item" href="Ortu.php">Orang Tua</a>
  </div>
</li>
</a>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-folder"></i>
    <span>Kelas</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="Kelas.php">Data Kelas</a>
  </div>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-folder"></i>
    <span>Agenda dan Administrasi</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="Agenda.php">Agenda Sekolah</a>
    <a class="dropdown-item" href="Administrasi.php">Administrasi Siswa</a>
  </div>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-folder"></i>
    <span>Jadwal Pelajaran</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="Jadwal.php">Jadwal Pelajaran</a>
  </div>
</li>
</ul>
<div id="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Home</a>
      </li>
      <li class="breadcrumb-item active">Data User</li>
      </ol
      <?php } ?>