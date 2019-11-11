-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2018 at 12:41 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `NIS` int(10) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `ID_Kelas` varchar(3) NOT NULL,
  `Tgl_absen` date NOT NULL,
  `Keterangan` enum('Hadir','Izin','Sakit','Alpha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`NIS`, `Nama`, `ID_Kelas`, `Tgl_absen`, `Keterangan`) VALUES
(1200, 'drogba', '7', '2018-11-05', 'Hadir'),
(1201, 'M.Essien', '7', '2018-11-05', 'Hadir'),
(1203, 'C.Ronaldo', '7', '2018-11-05', 'Sakit'),
(1204, 'L.Messi', '7', '2018-11-05', 'Hadir'),
(1205, 'P.Dybala', '7', '2018-11-05', 'Sakit'),
(1206, 'D.Alli', '7', '2018-11-05', 'Izin'),
(1207, 'M.Salah', '7', '2018-11-05', 'Hadir'),
(1208, 'K.Koulibaly', '7', '2018-11-05', 'Hadir'),
(1209, 'A.Griezman', '7', '2018-11-05', 'Hadir'),
(1210, 'G.Buffon', '7', '2018-11-05', 'Alpha'),
(1200, 'drogba', '7', '2018-11-05', 'Hadir'),
(1201, 'M.Essien', '7', '2018-11-05', 'Hadir'),
(1203, 'C.Ronaldo', '7', '2018-11-05', 'Sakit'),
(1204, 'L.Messi', '7', '2018-11-05', 'Hadir'),
(1205, 'P.Dybala', '7', '2018-11-05', 'Sakit'),
(1206, 'D.Alli', '7', '2018-11-05', 'Izin'),
(1207, 'M.Salah', '7', '2018-11-05', 'Hadir'),
(1208, 'K.Koulibaly', '7', '2018-11-05', 'Hadir'),
(1209, 'A.Griezman', '7', '2018-11-05', 'Hadir'),
(1210, 'G.Buffon', '7', '2018-11-05', 'Alpha'),
(1200, 'drogba', '7', '2018-11-06', 'Hadir'),
(1201, 'M.Essien', '7', '2018-11-06', 'Hadir'),
(1203, 'C.Ronaldo', '7', '2018-11-06', 'Hadir'),
(1204, 'L.Messi', '7', '2018-11-06', 'Hadir'),
(1205, 'P.Dybala', '7', '2018-11-06', 'Hadir'),
(1206, 'D.Alli', '7', '2018-11-06', 'Hadir'),
(1207, 'M.Salah', '7', '2018-11-06', 'Hadir'),
(1208, 'K.Koulibaly', '7', '2018-11-06', 'Hadir'),
(1209, 'A.Griezman', '7', '2018-11-06', 'Hadir'),
(1210, 'G.Buffon', '7', '2018-11-06', 'Hadir'),
(1200, 'drogba', '7', '2018-11-07', 'Alpha'),
(1201, 'M.Essien', '7', '2018-11-07', 'Hadir'),
(1203, 'C.Ronaldo', '7', '2018-11-07', 'Hadir'),
(1204, 'L.Messi', '7', '2018-11-07', 'Hadir'),
(1205, 'P.Dybala', '7', '2018-11-07', 'Hadir'),
(1206, 'D.Alli', '7', '2018-11-07', 'Sakit'),
(1207, 'M.Salah', '7', '2018-11-07', 'Izin'),
(1208, 'K.Koulibaly', '7', '2018-11-07', 'Alpha'),
(1209, 'A.Griezman', '7', '2018-11-07', 'Hadir'),
(1210, 'G.Buffon', '7', '2018-11-07', 'Hadir'),
(1200, 'drogba', '7', '2018-11-08', 'Hadir'),
(1201, 'M.Essien', '7', '2018-11-08', 'Hadir'),
(1203, 'C.Ronaldo', '7', '2018-11-08', 'Hadir'),
(1204, 'L.Messi', '7', '2018-11-08', 'Hadir'),
(1205, 'P.Dybala', '7', '2018-11-08', 'Hadir'),
(1206, 'D.Alli', '7', '2018-11-08', 'Hadir'),
(1207, 'M.Salah', '7', '2018-11-08', 'Hadir'),
(1208, 'K.Koulibaly', '7', '2018-11-08', 'Hadir'),
(1209, 'A.Griezman', '7', '2018-11-08', 'Hadir'),
(1210, 'G.Buffon', '7', '2018-11-08', 'Hadir'),
(1200, 'drogba', '7', '2018-11-09', 'Hadir'),
(1201, 'M.Essien', '7', '2018-11-09', 'Hadir'),
(1203, 'C.Ronaldo', '7', '2018-11-09', 'Hadir'),
(1204, 'L.Messi', '7', '2018-11-09', 'Hadir'),
(1205, 'P.Dybala', '7', '2018-11-09', 'Hadir'),
(1206, 'D.Alli', '7', '2018-11-09', 'Hadir'),
(1207, 'M.Salah', '7', '2018-11-09', 'Hadir'),
(1208, 'K.Koulibaly', '7', '2018-11-09', 'Hadir'),
(1209, 'A.Griezman', '7', '2018-11-09', 'Hadir'),
(1210, 'G.Buffon', '7', '2018-11-09', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `Nomor_Agenda` int(100) NOT NULL,
  `Perihal` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `Tempat` varchar(100) NOT NULL,
  `Acara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`Nomor_Agenda`, `Perihal`, `waktu`, `Tempat`, `Acara`) VALUES
(100, 'pemberitahuan', '2018-11-02', 'sekolah', 'lorem ipsum'),
(200, 'pengumuman', '2018-11-01', 'aula sekolah', 'pengumuman hari libur akhir semester\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_administrasi`
--

CREATE TABLE `biaya_administrasi` (
  `Kelas` varchar(10) NOT NULL,
  `NIS` int(6) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Lunas','Belum Lunas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_administrasi`
--

INSERT INTO `biaya_administrasi` (`Kelas`, `NIS`, `Nama`, `tanggal`, `keterangan`) VALUES
('7', 1200, 'drogba', '2018-07-31', 'Lunas'),
('7', 1201, 'M.Essien', '2018-11-01', 'Lunas'),
('7', 1203, 'C.Ronaldo', '2018-11-02', 'Lunas'),
('7', 1204, 'L.Messi', '2018-11-03', 'Lunas'),
('7', 1205, 'P.Dybala', '2018-11-20', 'Lunas'),
('7', 1206, 'D.Alli', '2018-11-01', 'Lunas'),
('7', 1207, 'M.Salah', '2018-11-03', 'Lunas'),
('7', 1208, 'K.Koulibaly', '2018-11-05', 'Lunas'),
('7', 1209, 'A.Griezman', '2018-11-03', 'Lunas'),
('7', 1200, 'G.Buffon', '2018-11-09', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `NIP` int(5) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `foto` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`NIP`, `nama_guru`, `Alamat`, `telepon`, `username`, `password`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `foto`, `level`) VALUES
(100, 'J.loew', 'jl.Raya,Malang', '08934567823', 'loew', 'loew', 'jerman', '1974-12-29', 'L', '26112018090431Yuka Kawamura 2.jpg', 'guru'),
(200, 'J.Mourinho', 'jl.candi 2,malang', '08756476594', ' mou', 'mou', 'Portugal', '1984-07-12', 'L', '26112018085120woman 2.jpg', 'walikelas'),
(300, 'C.Ancelotti', 'jl.raya,malang', '08934567831', ' anc', 'anc', 'Italia', '1968-11-28', 'L', '26112018085233unknown3.jpg', 'walikelas'),
(400, 'J.Guardiola', 'jl.masjid,malang', '08756476567', ' gua', 'gua', 'Spanyol', '1980-10-18', 'L', '26112018085416unknown.jpg', 'walikelas'),
(500, 'D.Simeone', 'jl.Dieng,malang', '08976756548', ' sime', 'sime', 'Argentina', '1979-09-29', 'L', '26112018085535TEMPLATE POST.jpg', 'guru'),
(600, 'M.Allegri', 'jl.Ambarawa,Malang', '08756476588', ' all', 'all', 'Italy', '1975-09-27', 'L', '26112018085713Tatjana-Saphira-49 copy.jpg', 'guru'),
(700, 'Z.Zidane', 'jl.Bandung,malang', '08233445511', ' zid', 'zid', 'Prancis', '1982-09-28', 'L', '26112018085852sarina.jpg', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `ID_mapel` varchar(3) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `semester` int(1) NOT NULL,
  `tahun_awal` int(4) NOT NULL,
  `tahun_akhir` int(11) NOT NULL,
  `Guru` varchar(20) NOT NULL,
  `Nama_Kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`ID_mapel`, `nama_mapel`, `jam`, `hari`, `semester`, `tahun_awal`, `tahun_akhir`, `Guru`, `Nama_Kelas`) VALUES
('1', 'matematika', ' 3-4', ' senin', 1, 2018, 2019, 'J.loew', '7'),
('2', 'biologi', '6-7', 'senin', 1, 2018, 2019, 'J.Mourinho', '7'),
('3', 'fisika dan kimia', ' 1-3', ' selasa', 1, 2018, 2019, 'C.Ancelotti', '7'),
('4', 'bahasa inggris', ' 4-6', ' selasa', 1, 2018, 2019, 'J.Guardiola', '7'),
('7', 'seni budaya dan kete', ' 7', ' selasa', 1, 2018, 2019, 'D.Simeone', '7'),
('5', 'bahasa indonesia', ' 1-2', ' rabu', 1, 2018, 2019, 'Z.Zidane', '7'),
('6', 'bahasa jawa', ' 3-4', ' rabu', 1, 2018, 2019, 'M.Allegri', '7'),
('9', 'agama', ' 6-7', ' rabu', 1, 2018, 2019, 'Z.Zidane', '7'),
('8', 'olahraga', ' 1-2', ' kamis', 1, 2018, 2019, 'J.loew', '7'),
('10', 'PKN', ' 3-4', ' kamis', 1, 2018, 2019, 'C.Ancelotti', '7'),
('11', 'IPS', ' 6-7', ' kamis', 1, 2018, 2019, 'D.Simeone', '7'),
('12', 'sejarah', ' 1-3', ' jumat', 1, 2018, 2019, 'J.Guardiola', '7');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `Nama_kelas` varchar(20) NOT NULL,
  `walikelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Nama_kelas`, `walikelas`) VALUES
('7', 'J.Mourinho'),
('8', 'C.Ancelotti'),
('9', 'J.Guardiola');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `NIP` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `NIP`, `nama`, `username`, `password`, `level`) VALUES
(13, 100, 'J.loew', 'loew', 'loew', 'guru'),
(14, 200, 'J.Mourinho', 'mou', 'mou', 'walikelas'),
(15, 300, 'C.Ancelotti', 'anc', 'anc', 'walikelas'),
(16, 400, 'J.Guardiola', 'gua', 'gua', 'walikelas'),
(17, 500, 'D.Simeone', 'sime', 'sime', 'guru'),
(18, 600, 'M.Allegri', 'all', 'all', 'guru'),
(19, 700, 'Z.Zidane', 'zid', 'zid', 'guru'),
(20, 1200, 'Mulyono', 'mul', 'mul', 'ortu'),
(21, 1201, 'prastowo', 'pras', 'pras', 'ortu'),
(22, 1202, 'prayitno', 'pray', 'pray', 'ortu'),
(23, 1203, 'pratikno', 'prak', 'prak', 'ortu'),
(24, 1204, 'sutrisno', 'sut', 'sut', 'ortu'),
(25, 1205, 'siswanto', 'sis', 'sis', 'ortu'),
(26, 1206, 'armando', 'arm', 'arm', 'ortu'),
(27, 1207, 'ferguso', 'fer', 'fer', 'ortu'),
(28, 1208, 'leonardo', 'leo', 'leo', 'ortu'),
(29, 1209, 'michel', 'mic', 'mic', 'ortu'),
(30, 1210, 'fernando', 'fero', 'fero', 'ortu'),
(31, 1, 'yahya', 'yahya', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `ID_mapel` int(3) NOT NULL,
  `type_mapel` varchar(100) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `KKM` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`ID_mapel`, `type_mapel`, `nama_mapel`, `KKM`) VALUES
(1, 'akademik', 'matematika', 75),
(2, 'akademik', 'biologi', 75),
(3, 'akademik', 'fisika dan kimia', 75),
(4, 'akademik', 'bahasa inggris', 75),
(5, 'akademik', 'bahasa indonesia', 75),
(6, 'akademik', 'bahasa jawa', 75),
(7, 'akademik', 'seni budaya dan keterampilan', 75),
(8, 'akademik', 'olahraga', 75),
(9, 'akademik', 'agama', 75),
(10, 'akademik', 'PKN', 75),
(11, 'akademik', 'IPS', 75),
(12, 'akademik', 'sejarah', 75);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_non`
--

CREATE TABLE `nilai_non` (
  `Kelas` varchar(10) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `tahun_awal` int(8) NOT NULL,
  `tahun_akhir` int(8) NOT NULL,
  `semester` int(2) NOT NULL,
  `Kesantrian` int(3) NOT NULL,
  `Tajwid` int(3) NOT NULL,
  `Qiroah` int(3) NOT NULL,
  `An-Nass` int(3) NOT NULL,
  `Vocabulary` int(3) NOT NULL,
  `Jurnalistik` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_non`
--

INSERT INTO `nilai_non` (`Kelas`, `Nama`, `tahun_awal`, `tahun_akhir`, `semester`, `Kesantrian`, `Tajwid`, `Qiroah`, `An-Nass`, `Vocabulary`, `Jurnalistik`) VALUES
('7A', 'cindy', 2018, 2019, 1, 89, 78, 67, 77, 88, 77),
('7', 'drogba', 2018, 2019, 1, 87, 78, 78, 80, 77, 80),
('7', 'M.Essien', 2018, 2019, 1, 87, 78, 87, 68, 90, 87),
('7', 'C.Ronaldo', 2018, 2019, 1, 87, 67, 87, 78, 76, 80);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `Nama_Kelas` varchar(6) NOT NULL,
  `Mapel` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tugas1` int(3) NOT NULL,
  `tugas2` int(3) NOT NULL,
  `UH` int(3) NOT NULL,
  `UTS` int(3) NOT NULL,
  `UAS` int(3) NOT NULL,
  `Nilai_Akhir` int(3) NOT NULL,
  `Semester` int(1) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tahun_awal` year(4) NOT NULL,
  `tahun_akhir` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`Nama_Kelas`, `Mapel`, `nama`, `tugas1`, `tugas2`, `UH`, `UTS`, `UAS`, `Nilai_Akhir`, `Semester`, `keterangan`, `tahun_awal`, `tahun_akhir`) VALUES
('7', 'matematika', 'drogba', 67, 76, 87, 67, 65, 72, 1, 'belum Tuntas', 2018, 2019),
('7', 'matematika', 'M.Essien', 67, 67, 65, 67, 87, 71, 1, 'Tuntas', 2018, 2019),
('7', 'matematika', 'C.Ronaldo', 67, 56, 76, 87, 67, 71, 1, 'Tuntas', 2018, 2019),
('7', 'matematika', 'L.Messi', 67, 87, 67, 87, 67, 75, 1, 'Tuntas', 2018, 2019),
('7', 'matematika', 'P.Dybala', 54, 90, 87, 87, 67, 77, 1, 'Tuntas', 2018, 2019),
('7', 'matematika', 'D.Alli', 89, 99, 78, 66, 56, 78, 1, 'belum Tuntas', 2018, 2019),
('7', 'matematika', 'M.Salah', 87, 65, 80, 89, 78, 80, 1, 'Tuntas', 2018, 2019),
('7', 'matematika', 'K.Koulibaly', 67, 56, 87, 77, 68, 71, 1, 'Tuntas', 2018, 2019),
('7', 'matematika', 'A.Griezman', 66, 78, 67, 74, 73, 72, 1, 'belum Tuntas', 2018, 2019),
('7', 'matematika', 'G.Buffon', 56, 76, 89, 78, 65, 73, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'drogba', 78, 78, 98, 78, 67, 80, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'M.Essien', 87, 89, 78, 67, 87, 82, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'C.Ronaldo', 98, 78, 67, 87, 87, 83, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'L.Messi', 79, 78, 67, 87, 67, 76, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'P.Dybala', 78, 87, 98, 78, 67, 82, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'D.Alli', 56, 48, 79, 76, 78, 67, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'M.Salah', 67, 87, 67, 78, 76, 75, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'K.Koulibaly', 67, 87, 86, 78, 76, 79, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'A.Griezman', 78, 77, 76, 79, 87, 79, 1, 'Tuntas', 2018, 2019),
('7', 'biologi', 'G.Buffon', 76, 78, 76, 76, 76, 76, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'drogba', 67, 87, 67, 65, 78, 73, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'M.Essien', 76, 76, 87, 67, 45, 70, 1, 'belum Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'C.Ronaldo', 76, 78, 76, 76, 75, 76, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'L.Messi', 65, 76, 87, 67, 65, 72, 1, 'belum Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'P.Dybala', 64, 67, 87, 66, 56, 68, 1, 'belum Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'D.Alli', 56, 76, 56, 76, 56, 64, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'M.Salah', 76, 75, 76, 76, 89, 78, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'K.Koulibaly', 67, 87, 56, 76, 87, 75, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'A.Griezman', 67, 65, 67, 87, 65, 70, 1, 'Tuntas', 2018, 2019),
('7', 'seni budaya dan kete', 'G.Buffon', 67, 87, 67, 65, 67, 71, 1, 'belum Tuntas', 2018, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `NIS` int(4) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`NIS`, `nama_ortu`, `alamat_ortu`, `telepon`, `username`, `password`, `foto`) VALUES
(1200, 'Mulyono', 'jl.candi 5,malang', '08934567831', 'mul', 'mul', '26112018095523Yuka Kawamura 2.jpg'),
(1201, 'prastowo', 'jl.ijen,malang', '08756476568', 'pras', 'pras', '26112018095620Yuka Kawamura.jpg'),
(1202, 'prayitno', 'jl.candi 5,malang', '08934567833', 'pray', 'pray', '26112018095656woman 2.jpg'),
(1203, 'pratikno', 'jl.candi 5,malang', '08934567830', 'prak', 'prak', '26112018095729woman 1.jpg'),
(1204, 'sutrisno', 'jl.semarang,malang', '08698786754', 'sut', 'sut', '26112018095852Untitled-1.png'),
(1205, 'siswanto', 'jl.surabaya,malang', '08967564532', 'sis', 'sis', '26112018095934unknown3.jpg'),
(1206, 'armando', 'jl.bandung,malang', '08233445867', 'arm', 'arm', '26112018100022unknown.jpg'),
(1207, 'ferguso', 'jl.galunggung', '08976865431', 'fer', 'fer', '26112018100057TEMPLATE POST.jpg'),
(1208, 'leonardo', 'jl.sutami,malang', '089345678222', 'leo', 'leo', '26112018100137Tatjana-Saphira-49 copy.jpg'),
(1209, 'michel', 'jl.jombang,malang', '087676565434', 'mic', 'mic', '26112018100224sarina.jpg'),
(1210, 'fernando', 'jl.candi 3,malang', '08934567832', 'fero', 'fero', '26112018100326robert pattinson.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(4) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `Tempat lahir` varchar(20) NOT NULL,
  `Tanggal lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `Nama`, `Alamat`, `telepon`, `Tempat lahir`, `Tanggal lahir`) VALUES
(1200, 'drogba', 'jl.semeru,malang', '08956434521', 'pantai gading', '0000-00-00'),
(1201, 'M.Essien', 'jl.semeru,malang', '08233445566', 'Ghana', '1997-12-04'),
(1202, 'G.Bale', 'jl.candi 3,malang', '08934567839', 'Wales', '1998-02-04'),
(1203, 'C.Ronaldo', 'jl.candi 3,malang', '08934567832', 'Portugal', '1998-12-14'),
(1204, 'L.Messi', 'jl.candi 3,malang', '08233445599', 'Argentina', '1998-01-01'),
(1205, 'P.Dybala', 'jl.galunggung,malang', '08934564567', 'Argentina', '1997-02-28'),
(1206, 'D.Alli', 'jl.jombang,malang', '08934564569', 'Inggris', '1999-12-11'),
(1207, 'M.Salah', 'jl.Sutami,malang', '08934564545', 'Mesir', '1999-03-05'),
(1208, 'K.Koulibaly', 'jl.veteran,malang', '08756476587', 'maroko', '1999-02-27'),
(1209, 'A.Griezman', 'jl.Ijen,malang', '08767567654', 'Prancis', '1998-10-29'),
(1210, 'G.Buffon', 'jl.Dieng,malang', '08233445476', 'Italia', '1997-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`ID_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
