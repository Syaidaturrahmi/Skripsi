-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2022 pada 05.53
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balita`
--

CREATE TABLE `balita` (
  `kode_balita` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `balita`
--

INSERT INTO `balita` (`kode_balita`, `nik`, `nama_balita`, `tempat_lahir`, `tgl_lahir`, `jenkel`) VALUES
(20, '3604221710870003', 'salsa', 'Serang', '2020-07-07', 'P'),
(21, '3604221308880006', 'ibrahim', 'Jakarta', '2018-05-27', 'L'),
(22, '3604220401850001', 'ikbal', 'Serang', '2020-05-10', 'L'),
(23, '3604220401850001', 'zahra', 'Serang', '2020-08-17', 'P'),
(25, '3604220611750003', 'nazla', 'serang', '2020-05-10', 'P'),
(26, '3604221609670001', 'luafi', 'Serang', '2019-05-12', 'L'),
(27, '3604221403900004', 'rafa', 'Serang', '2017-11-17', 'L'),
(28, '3604222503750002', 'alwi', 'serang', '2018-04-20', 'L'),
(29, '3604222402920005', 'dewi', 'Serang', '2020-11-18', 'P'),
(30, '3604222709910004', 'fenia', 'Serang', '2019-10-13', 'P'),
(31, '327505071098', 'Andi', 'Jakarta', '2020-10-10', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `kode_balita` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `tipe` enum('imun','perk') NOT NULL,
  `bb_balita` decimal(3,1) DEFAULT NULL,
  `tb_balita` decimal(4,1) DEFAULT NULL,
  `tgl_periksa` date DEFAULT NULL,
  `jenis_vaksin` varchar(18) DEFAULT NULL,
  `tgl_imunisasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`kode_balita`, `nik`, `tipe`, `bb_balita`, `tb_balita`, `tgl_periksa`, `jenis_vaksin`, `tgl_imunisasi`) VALUES
(20, '3604221710870003', 'imun', NULL, NULL, NULL, 'HB-O (0-7 hari)', '2021-02-01'),
(21, '3604221308880006', 'imun', NULL, NULL, NULL, '*DPT-HB-Hib 1', '2021-01-31'),
(22, '3604220401850001', 'imun', NULL, NULL, NULL, '*DPT-HB-Hib 3', '2021-01-31'),
(20, '3604221710870003', 'imun', NULL, NULL, NULL, '*Polio 2', '2021-02-02'),
(22, '3604220401850001', 'imun', NULL, NULL, NULL, 'HB-O (0-7 hari)', '2021-02-01'),
(22, '3604220401850001', 'imun', NULL, NULL, NULL, 'Campak', '2021-02-02'),
(20, '3604221710870003', 'perk', '24.2', '52.5', '2021-01-31', NULL, NULL),
(21, '3604221308880006', 'perk', '21.9', '47.7', '2021-02-01', NULL, NULL),
(22, '3604220401850001', 'perk', '22.0', '46.2', '2021-01-31', NULL, NULL),
(22, '3604220401850001', 'perk', '22.2', '46.7', '2021-02-01', NULL, NULL),
(22, '3604220401850001', 'perk', '22.5', '47.1', '2021-02-02', NULL, NULL),
(20, '3604221710870003', 'perk', '10.3', '52.5', '2021-01-31', NULL, NULL),
(21, '3604221308880006', 'perk', '15.2', '47.7', '2021-02-01', NULL, NULL),
(22, '3604220401850001', 'perk', '13.7', '47.1', '2021-02-02', NULL, NULL),
(23, '3604220401850001', 'perk', '16.2', '52.0', '2021-02-07', NULL, NULL),
(25, '3604220611750003', 'perk', '10.7', '44.2', '2021-02-07', NULL, NULL),
(26, '3604221609670001', 'perk', '17.5', '46.6', '2021-02-07', NULL, NULL),
(27, '3604221403900004', 'perk', '12.0', '32.0', '2021-02-07', NULL, NULL),
(28, '3604222503750002', 'perk', '19.2', '56.0', '2021-02-07', NULL, NULL),
(29, '3604222402920005', 'perk', '9.6', '67.0', '2021-02-07', NULL, NULL),
(30, '3604222709910004', 'perk', '14.8', '46.0', '2021-02-07', NULL, NULL),
(31, '327505071098', 'perk', '13.6', '44.0', '2021-02-07', NULL, NULL),
(23, '3604220401850001', 'imun', NULL, NULL, NULL, 'BCG', '2021-02-07'),
(25, '3604220611750003', 'imun', NULL, NULL, NULL, '', '2021-02-07'),
(26, '3604221609670001', 'imun', NULL, NULL, NULL, '', '2021-02-07'),
(27, '3604221403900004', 'imun', NULL, NULL, NULL, '*IPV', '2021-02-07'),
(28, '3604222503750002', 'imun', NULL, NULL, NULL, '', '2021-02-07'),
(29, '3604222402920005', 'imun', NULL, NULL, NULL, 'HB-O (0-7 hari)', '2021-02-07'),
(30, '3604222709910004', 'imun', NULL, NULL, NULL, 'BCG', '2021-02-07'),
(31, '327505071098', 'imun', NULL, NULL, NULL, '*Polio 1', '2021-02-07'),
(20, '3604221710870003', 'imun', NULL, NULL, NULL, '', '2021-02-05'),
(21, '3604221308880006', 'imun', NULL, NULL, NULL, 'Campak', '2021-02-07'),
(23, '3604220401850001', 'imun', NULL, NULL, NULL, 'Campak', '2021-02-07'),
(27, '3604221403900004', 'imun', NULL, NULL, NULL, '*Polio 2', '2021-02-07'),
(29, '3604222402920005', 'imun', NULL, NULL, NULL, '*DPT-HB-Hib 1', '2021-02-07'),
(31, '327505071098', 'imun', NULL, NULL, NULL, '*Polio 3', '2021-02-07'),
(30, '3604222709910004', 'imun', NULL, NULL, NULL, '', '2021-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_imun`
--

CREATE TABLE `history_imun` (
  `kode_balita` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `jenis_vaksin` varchar(18) NOT NULL,
  `tgl_imunisasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_imun`
--

INSERT INTO `history_imun` (`kode_balita`, `nik`, `jenis_vaksin`, `tgl_imunisasi`) VALUES
(20, '3604221710870003', '', '2021-02-05'),
(21, '3604221308880006', '***Campak', '2021-02-07'),
(22, '3604220401850001', '***Campak', '2021-02-02'),
(23, '3604220401850001', '***Campak', '2021-02-07'),
(25, '3604220611750003', '', '2021-02-07'),
(26, '3604221609670001', '', '2021-02-07'),
(27, '3604221403900004', '*Polio 2', '2021-02-07'),
(28, '3604222503750002', '', '2021-02-07'),
(29, '3604222402920005', '*DPT-HB-Hib 1', '2021-02-07'),
(30, '3604222709910004', '', '2021-02-07'),
(31, '327505071098', '*Polio 3', '2021-02-07'),
(20, '3604221710870003', '***Campak', '2021-02-08'),
(27, '3604221403900004', '*DPT-HB-Hib 1', '2021-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ibu_hamil`
--

CREATE TABLE `ibu_hamil` (
  `nik` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `suami` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ibu_hamil`
--

INSERT INTO `ibu_hamil` (`nik`, `nama`, `suami`, `alamat`, `tgl_lahir`, `created`, `updated`) VALUES
('112423435534', 'Raahmy', 'Doni', 'Desa Sidua-dua Kecamatan Kualuh Selatan', '2000-02-25', '2022-06-11', '2022-06-11'),
('14078545645', 'Nurni', 'Dedi', 'Jakarta', '2003-07-13', '2022-06-11', '2022-06-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `kode_balita` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `jenis_vaksin` varchar(18) NOT NULL,
  `tgl_imunisasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `imunisasi`
--

INSERT INTO `imunisasi` (`kode_balita`, `nik`, `jenis_vaksin`, `tgl_imunisasi`) VALUES
(20, '3604221710870003', '***Campak', '2021-02-08'),
(21, '3604221308880006', '***Campak', '2021-02-07'),
(22, '3604220401850001', '***Campak', '2021-02-02'),
(23, '3604220401850001', '***Campak', '2021-02-07'),
(25, '3604220611750003', '', '2021-02-07'),
(26, '3604221609670001', '', '2021-02-07'),
(27, '3604221403900004', '*DPT-HB-Hib 1', '2021-02-08'),
(28, '3604222503750002', '', '2021-02-07'),
(29, '3604222402920005', '*DPT-HB-Hib 1', '2021-02-07'),
(30, '3604222709910004', '', '2021-02-07'),
(31, '327505071098', '*Polio 3', '2021-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `tanggal`, `jam`) VALUES
(4, '2020-11-17', '10:10:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lansia`
--

CREATE TABLE `lansia` (
  `nik` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lansia`
--

INSERT INTO `lansia` (`nik`, `nama`, `alamat`, `tanggal`, `created`, `updated`) VALUES
('12345678', 'DONI MULYA SYAHPUTRA', 'Medan City', '1994-02-15', '2022-06-11', '2022-06-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan_ibu`
--

CREATE TABLE `pemeriksaan_ibu` (
  `nik` int(25) NOT NULL,
  `speksi` varchar(100) NOT NULL,
  `tensi` varchar(100) NOT NULL,
  `vitamin` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan_ibu`
--

INSERT INTO `pemeriksaan_ibu` (`nik`, `speksi`, `tensi`, `vitamin`, `tanggal`) VALUES
(2147483647, 'Bebas', '100', 'B Compleks', '2022-06-11'),
(2147483647, 'erwerwer', 'rwererwrwe', 'gdfgdfgd', '2022-06-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkembangan_balita`
--

CREATE TABLE `perkembangan_balita` (
  `kode_balita` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `bb_balita` decimal(3,1) NOT NULL,
  `tb_balita` decimal(4,1) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perkembangan_balita`
--

INSERT INTO `perkembangan_balita` (`kode_balita`, `nik`, `bb_balita`, `tb_balita`, `tgl_periksa`) VALUES
(20, '3604221710870003', '10.3', '52.5', '2021-01-31'),
(21, '3604221308880006', '15.2', '47.7', '2021-02-01'),
(22, '3604220401850001', '13.7', '47.1', '2021-02-02'),
(23, '3604220401850001', '16.2', '52.0', '2021-02-07'),
(25, '3604220611750003', '10.7', '44.2', '2021-02-07'),
(26, '3604221609670001', '17.5', '46.6', '2021-02-07'),
(27, '3604221403900004', '12.0', '32.0', '2021-02-07'),
(28, '3604222503750002', '19.2', '56.0', '2021-02-07'),
(29, '3604222402920005', '9.6', '67.0', '2021-02-07'),
(30, '3604222709910004', '14.8', '46.0', '2021-02-07'),
(31, '327505071098', '13.6', '44.0', '2021-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phbs`
--

CREATE TABLE `phbs` (
  `kode_phbs` int(3) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `jenis_berita` varchar(50) NOT NULL,
  `tempat_dibuat` varchar(50) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `penulis_berita` varchar(100) NOT NULL,
  `editor_berita` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `phbs`
--

INSERT INTO `phbs` (`kode_phbs`, `judul_berita`, `jenis_berita`, `tempat_dibuat`, `tgl_dibuat`, `deskripsi_berita`, `penulis_berita`, `editor_berita`, `penerbit`, `gambar`) VALUES
(3, ' Pentingkah Memberi Suplemen Vitamin D untuk Bayi?', 'Kesehatan Bayi', 'Kompas', '2021-01-24', 'Kekurangan vitamin D bisa menyebabkan penyakit tulang rapuh yang disebut rakhitis, kata Liermann. Vitamin D membantu tubuh menyerap kalsium untuk membentuk dan memperkuat tulang. Tanpa vitamin D, seorang anak lebih rentan mengalami patah tulang dan masalah pertumbuhan. Tubuh juga membutuhkan vitamin D untuk perkembangan otak dan kesehatan sistem kekebalan tubuh.\r\nIbu yang mengonsumsi cukup vitamin D mampu menghasilkan ASI dengan kandungan vitamin D yang memadai untuk kebutuhan bayi.', 'Ariska Puspita Anggraini', 'Ariska Puspita Anggraini', 'Kompas', 'img/keg3.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `agama` varchar(9) NOT NULL,
  `pekerjaan` varchar(10) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `akses` enum('user','admin') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `agama`, `pekerjaan`, `nama_suami`, `akses`, `username`, `password`) VALUES
('1020302948', 'Testing', 'testing', '2021-01-25', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'user', 'testing', 'ae2b1fca515949e5d54fb22b8ed95575'),
('12345', 'Regina Devi Tarigan', 'Medan', '1999-05-10', 'Jl. RS Fatmawati No. 1', '081281567751', 'Kristen', 'Mahasiswa', 'Robert Downey Juniot', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('327505071098', 'Samiun', 'Jakarta', '1999-10-07', 'Jakarta', '0891249124', 'Islam', 'Ngamen', 'Gobar', 'user', 'andi', 'ee11cbb19052e40b07aac0ca060c23ee'),
('3604220401850001', 'elis', 'serang', '2020-08-17', 'kalobar', '082271432281', 'islam', 'wirausaha', 'suprallah', 'user', 'zahra', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604220611750003', 'ika', 'Serang', '1989-11-06', 'pasir k', '087781241345', 'Islam', 'petani', 'rohim', 'user', 'nazla', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604221308880006', 'Surtini', 'Jakarta', '1990-08-13', 'kp pagedongan', '08125711963', 'Islam', 'wirausaha', 'bayu', 'user', 'ibrahim', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604221403900004', 'esih', 'Serang', '1997-03-14', 'pagedong I', '081277481212', 'Islam', 'ibu rumah ', 'agus', 'user', 'rafa', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604221609670001', 'meisy', 'Serang', '1987-09-16', 'kalabor', '087712413512', 'Islam', 'petani', 'samanudin', 'user', 'luafi', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604221710870003', 'nurwahida', 'Serang', '1993-10-17', 'kp pagedongan', '082264712430', 'Islam', 'ibu rumah ', 'supandi', 'user', 'salsa', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604222402920005', 'Kaesih', 'Serang', '1986-02-24', 'kalobar', '082314751182', 'Islam', 'ibu rumah ', 'rahmat', 'user', 'dewi', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604222503750002', 'rokayah', 'bekasi', '1987-03-25', 'kalabor', '087781184523', 'Islam', 'petani', 'mandala', 'user', 'alwi', '827ccb0eea8a706c4c34a16891f84e7b'),
('3604222709910004', 'Siti', 'Jakarta', '1995-09-27', 'pagedongan', '081341551881', 'Islam', 'ibu rumah ', 'Enoh', 'user', 'fenia', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`kode_balita`),
  ADD KEY `fk_nik` (`nik`);

--
-- Indeks untuk tabel `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indeks untuk tabel `lansia`
--
ALTER TABLE `lansia`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `perkembangan_balita`
--
ALTER TABLE `perkembangan_balita`
  ADD KEY `fk_kode_balita` (`kode_balita`);

--
-- Indeks untuk tabel `phbs`
--
ALTER TABLE `phbs`
  ADD PRIMARY KEY (`kode_phbs`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balita`
--
ALTER TABLE `balita`
  MODIFY `kode_balita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `phbs`
--
ALTER TABLE `phbs`
  MODIFY `kode_phbs` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `perkembangan_balita`
--
ALTER TABLE `perkembangan_balita`
  ADD CONSTRAINT `fk_kode_balita` FOREIGN KEY (`kode_balita`) REFERENCES `balita` (`kode_balita`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
