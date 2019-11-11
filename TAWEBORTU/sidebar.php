<?php 
if (!empty($_SESSION['username'])) {
 ?>
 <!-- Sidebar -->
 <ul class="sidebar navbar-nav float-left">
   <center><img src="logo.jpg" height="100" width="100"></center>
   <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-user"></i>
      <span><?php echo $_SESSION['nama']; ?></span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cekakademik.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Akademik</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ceknonakademik.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Non Akademik</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="rekapabsen.php">
      <i class="fas fa-list-ul"></i>
      <span>Presensi Kehadiran</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Administrasi.php">
      <i class="fas fa-book"></i>
      <span>Administrasi</span>
    </a></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="agenda.php">
      <i class="far fa-calendar-alt"></i>
      <span>Agenda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Jadwal.php">
      <i class="fas fa-clipboard-list"></i>
      <span>Jadwal Pelajaran</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Guru.php">
        <i class="fas fa-users"></i>
        <span>Daftar Guru</span></a>
      </li>
    </ul>
    <?php } ?>