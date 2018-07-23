-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jul 2018 pada 01.27
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` varchar(8) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `prodi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`) VALUES
('04316020', 'Surya', 'Blitar', '1995-06-10', 'l', 'Teknik Informatika'),
('04316022', 'Safira', 'Semarang', '1995-05-03', 'p', 'Sistem Informasi'),
('04316911', 'Cantika', 'Surabaya', '1995-06-15', 'p', 'Sistem Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(2, 'Ayah', 'Andrea Hirata', 'Bentang Pustaka', '2008', '978-979-1227-45-2', 14, 'rak2', '2018-07-01'),
(6, 'Edensor', 'Andrea Hirata', 'Bentang Pustaka', '2005', '979-3062-79-7', 19, 'rak1', '2018-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `tgl_kembali` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 'cici', '78', 'ghukj', '2018-07-02', '2018-07-01', 'kembali'),
(2, 'Maryamah Karpov', '04316020', 'Surya Agung P', '2018-07-01', '2018-07-06', 'kembali'),
(3, 'Maryamah Karpov', '04316020', 'Surya Agung P', '0000-00-00', '0000-00-00', 'kembali'),
(4, 'Maryamah Karpov', '04316020', 'Surya Agung P', '0000-00-00', '0000-00-00', 'kembali'),
(5, 'Maryamah Karpov', '04316020', 'Surya Agung P', '09-07-2018', '16-07-2018', 'kembali'),
(6, 'nanana', '04316020', 'Surya Agung P', '10-07-2018', '07-12-99', 'kembali'),
(7, 'nanana', '04316020', 'Surya Agung P', '10-07-2018', '24-07-18', 'kembali'),
(8, 'lklklklk', '04316020', 'Surya Agung P', '22-07-2018', '29-07-2018', 'kembali'),
(9, 'Maryamah Karpov', '04316020', 'Surya Agung P', '22-07-2018', '29-07-2018', 'kembali'),
(10, 'Laskar Pelangi', '04316020', 'Surya Agung P', '23-07-2018', '30-07-2018', 'kembali'),
(11, 'Maryamah Karpov', '04316020', 'Surya', '23-07-2018', '30-07-2018', 'kembali'),
(12, 'Ayah', '04316020', 'Surya', '23-07-2018', '30-07-2018', 'pinjam'),
(13, 'Edensor', '04316022', 'Safira', '23-07-2018', '30-07-2018', 'kembali'),
(14, 'Edensor', '04316911', 'Cantika', '23-07-2018', '06-08-18', 'kembali'),
(15, 'Edensor', '04316911', 'Cantika', '24-07-2018', '31-07-2018', 'pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(17, 'admin', 'admin', 'Surya Agung Priambodo', 'Admin', 'man.png'),
(18, 'user', 'user', 'Georgina Safira', 'User', 'girl.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
