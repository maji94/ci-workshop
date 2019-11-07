-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 07:02 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_workshop`
--
CREATE DATABASE IF NOT EXISTS `db_workshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_workshop`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `id_workshop` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `judul`, `konten`, `tanggal`) VALUES
(16, '#TablighAkbarHUT51Bkl', 'a:3:{i:0;s:14:\"1572734859.jpg\";i:1;s:14:\"1572800784.jpg\";i:2;s:15:\"15728007841.jpg\";}', '2019-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_narasumber`
--

CREATE TABLE `tb_narasumber` (
  `id` int(11) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_narasumber`
--

INSERT INTO `tb_narasumber` (`id`, `foto`, `nama`, `jns_kelamin`, `keterangan`) VALUES
(2, '1570328784.jpg', 'Suparmaji, S.Kom', 'laki', 'Holisticly benchmark best-of-breed value and business niches. Dynamically evolve vertical catalysts for change via global meta-services. Authoritatively innovate high-payoff internal or \"organic\" sources and synergistic leadership skills. Continually transition tactical meta-services before robust content. Appropriately exploit high-payoff models and global schemas.\r\n\r\nProgressively procrastinate high-quality internal or \"organic\" sources after 24/7 outsourcing. Efficiently drive tactical manufactured products through interoperable human capital. Interactively disintermediate adaptive strategic theme areas for ethical niche markets. Completely recaptiualize plug-and-play collaboration.'),
(3, '1570331904.jpeg', 'suparmaji2', 'laki', 'Conveniently engage business relationships and low-risk high-yield channels. Dramatically foster adaptive processes and frictionless platforms. Energistically seize customer directed leadership skills rather than extensive solutions. Authoritatively expedite ubiquitous e-services after bricks-and-clicks potentialities. Compellingly utilize standards compliant portals for intuitive e-tailers.\r\n\r\nMonotonectally engineer client-focused functionalities vis-a-vis holistic e-services. Uniquely monetize timely manufactured products via equity invested methodologies. Seamlessly drive orthogonal communities whereas inexpensive interfaces. Energistically streamline user-centric methods of empowerment for superior best practices. Uniquely.'),
(17, '1570344659.jpg', 'mamang', 'laki', 'Intrinsicly embrace enterprise-wide systems before quality e-markets. Interactively deliver next-generation potentialities through cross-unit \"outside the box\" thinking. Seamlessly pontificate reliable potentialities for resource-leveling convergence. Uniquely whiteboard frictionless catalysts for change without extensive strategic theme areas. Compellingly utilize flexible materials through out-of-the-box leadership.\r\n\r\nCompetently administrate interoperable internal or \"organic\" sources via emerging models. Rapidiously recaptiualize just in time services rather than high standards in solutions. Interactively pontificate standardized web-readiness with client-based e-business. Conveniently impact pandemic.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembina`
--

CREATE TABLE `tb_pembina` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nip` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `bidang` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembina`
--

INSERT INTO `tb_pembina` (`id`, `foto`, `nip`, `nama`, `bidang`, `email`, `nohp`, `alamat`) VALUES
(3, '1571672463.jpeg', '1771022407940007', 'Kozuki Oden', 'Bidang 2', 'suparmaji09@gmail.com', '082178556004', 'jl. serayu no 58'),
(4, '1571991348.jpg', '1771022407940011', 'SAPUTRA BHAKTI WIJAYA', 'Bidang Urais', 'suparmaji09@gmail.com', '082178556004', 'jl. serayu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id` int(11) NOT NULL,
  `foto` varchar(24) NOT NULL,
  `nip` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `ktp` varchar(19) NOT NULL,
  `tmp_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan` varchar(15) NOT NULL,
  `alamat_rm` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `unker` text NOT NULL,
  `kab` varchar(32) NOT NULL,
  `alamat_kt` text NOT NULL,
  `npwp` varchar(32) NOT NULL,
  `norek` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id`, `foto`, `nip`, `nama`, `ktp`, `tmp_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `pendidikan`, `alamat_rm`, `email`, `nohp`, `golongan`, `jabatan`, `unker`, `kab`, `alamat_kt`, `npwp`, `norek`) VALUES
(1, '1571481522.png', '1771022407940004', 'suparmaji', '1771022407940004', 'Bengkulu', '1994-07-24', 'laki', 'ISLAM', 'Sarjana 1', 'Jl. Serayu No. 48 Kelurahan Padang Harapan, Kecamatan Gading Cempaka', 'suparmaji09@gmail.com', '082178556004', 'IV.B', 'Pembina', 'Biro Pemerintahan dan Kesra', 'Provinsi Bengkulu', 'Jl. Pembangunan No. 01 Kota Bengkulu', '123456789101112', '12345678910 (Bank Bengkulu)'),
(4, '1569948517.jpg', '1771022407940006', 'suparmaji4', '1771022407940004', 'Bengkulu', '2019-10-01', 'laki', 'ISLAM', 'Sarjana 1', 'jl. bengawan solo', 'suparmaji09@gmail.com', '082178556004', 'IV/B', 'Pembina', 'Biro Hukum', 'Provinsi Bengkulu', 'Jl. Pembangunan No. 1', '12345678910', '123456789 (Bank Mandiri)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` enum('admin','pembina','peserta') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, '1771022407940004', 'af15d5fdacd5fdfea300e88a8e253e82', 'peserta'),
(5, '1771022407940006', 'af15d5fdacd5fdfea300e88a8e253e82', 'peserta'),
(8, '1771022407940007', 'af15d5fdacd5fdfea300e88a8e253e82', 'pembina'),
(9, 'admins', 'af15d5fdacd5fdfea300e88a8e253e82', 'admin'),
(12, '1771022407940011', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'pembina');

-- --------------------------------------------------------

--
-- Table structure for table `tb_workshop`
--

CREATE TABLE `tb_workshop` (
  `id` int(11) NOT NULL,
  `narasumber` text NOT NULL,
  `nm_kegiatan` varchar(200) NOT NULL,
  `status` enum('open','ongoing','close') NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `kuota` int(11) NOT NULL,
  `judul_materi` varchar(200) NOT NULL,
  `file_materi` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_narasumber`
--
ALTER TABLE `tb_narasumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembina`
--
ALTER TABLE `tb_pembina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_workshop`
--
ALTER TABLE `tb_workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_narasumber`
--
ALTER TABLE `tb_narasumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_pembina`
--
ALTER TABLE `tb_pembina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_workshop`
--
ALTER TABLE `tb_workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
