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
      <span>Manajemen Siswa</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="absen.php">Absensi Siswa</h6>
        <a class="dropdown-item" href="nilai akademik.php">Nilai Akademik</a>
        <a class="dropdown-item" href="nilainonakademik.php">Nilai non Akademik</a>
        <a class="dropdown-item" href="pilihraport.php">Lihat dan Cetak Nilai</a>
        <a class="dropdown-item" href="uploadnilai.php">Upload Nilai</a>
        <a class="dropdown-item" href="grafiksiswa.php">Grafik siswa</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="agenda.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Agenda dan Informasi</span></a>
      </li>
    </ul>

    <?php }; ?>