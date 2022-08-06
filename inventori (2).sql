-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 06.34
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `user_nik` int(30) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `user_nik`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `jumlah`, `tujuan`, `satuan`, `status`) VALUES
(3, 0, 'TRK-0722001', '2022-07-22', 'BAR-0121001', 'Nutrisari', '1', 'asda', 'Pack', 1),
(4, 0, 'TRK-0722002', '2022-07-22', 'BAR-0121001', 'Nutrisari', '2', 'asda', 'Pack', 1),
(5, 0, 'TRK-0722003', '2022-07-22', 'BAR-0121001', 'Nutrisari', '2', '2', 'Pack', 1),
(6, 0, 'TRK-0722004', '2022-07-22', 'BAR-0121001', 'Nutrisari', '1', '1', 'Pack', 1),
(7, 0, 'TRK-0722005', '2022-07-27', 'BAR-0121001', 'Nutrisari', '1', 'bandung', 'Pack', 1),
(8, 26, 'TRK-0722006', '2022-07-27', 'BAR-0121001', 'Nutrisari', '1', 'bandung', 'Pack', 0),
(9, 1001, 'TRK-0722007', '2022-07-27', 'BAR-0121001', 'Nutrisari', '1', 'bandung', 'Pack', 0),
(10, 1001, 'TRK-0722008', '2022-07-27', 'BAR-0121001', 'Nutrisari', '1', 'bandung', 'Pack', 0);

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE gudang SET jumlah = jumlah-new.jumlah
    WHERE kode_barang=new.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `pengirim`, `jumlah`, `satuan`) VALUES
(2, 'TRM-0722002', '2022-07-19', 'BAR-0121001', 'Nutrisari', 'PT Sahabat Utama', '1', 'Pack'),
(3, 'TRK-0722001', '2022-07-19', 'BAR-0121001', 'Nutrisari', '', '1', 'Pack');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE gudang SET jumlah = jumlah+new.jumlah
    WHERE kode_barang=new.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `jumlah` varchar(250) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`id`, `kode_barang`, `nama_barang`, `jenis_barang`, `jumlah`, `satuan`) VALUES
(1, 'BAR-0121001', 'Nutrisari', 'Minuman', '1', 'Pack'),
(2, 'BAR-0722002', 'Popok', '6.Minuman', '0', '8.Pack'),
(3, 'BAR-0722003', 'Nutrisari jeruk', 'Makanan', '0', 'Unit'),
(4, 'BAR-0722004', 'Nutrisari 2', 'Minuman', '0', 'PCS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis_barang`) VALUES
(5, 'Makanan'),
(6, 'Minuman'),
(7, 'Obat'),
(8, 'da'),
(9, 'digital');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(5, 'Unit'),
(7, 'PCS'),
(8, 'Pack'),
(9, 'Kg'),
(10, 'Butir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id` int(100) NOT NULL,
  `kode_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(11, 'SUP-0722221', 'PT Kontol kuda il', 'kuda sada', '312313321312313');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tele`
--

CREATE TABLE `tele` (
  `id` int(11) NOT NULL,
  `chat_id` varchar(250) NOT NULL,
  `cmd1` varchar(250) DEFAULT NULL,
  `cmd2` varchar(250) DEFAULT NULL,
  `cmd3` varchar(255) DEFAULT NULL,
  `cmd4` varchar(250) DEFAULT NULL,
  `cmd5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tele`
--

INSERT INTO `tele` (`id`, `chat_id`, `cmd1`, `cmd2`, `cmd3`, `cmd4`, `cmd5`) VALUES
(1, '132213', '1', 'asu', '3', 'kontol', '5'),
(2, '31', '', '', '', '', ''),
(3, '12312331', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('superadmin','admin','petugas') NOT NULL DEFAULT 'petugas',
  `foto` varchar(255) NOT NULL,
  `chat_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `alamat`, `telepon`, `username`, `password`, `level`, `foto`, `chat_id`) VALUES
(26, '1001', 'Wanda Hadis Suara', '', '08999444000', 'wanda', 'wanda', 'superadmin', 'teacher4.png', '1'),
(27, '10001', 'admin', '', '0986660000', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '_CPC3217 copy.jpg', ''),
(28, '12313', 'asdadas', '', '1231212', 'asa', 'dasds', 'admin', '1658260028_792941d1a451be', ''),
(29, '123123', 'komto;', '', '21312313', 'sada', 'asda', 'petugas', '1658260355_4b39ed7c344af3', ''),
(30, '213213', 'ADAD', '', 'ADAS', 'ADAD', 'ADA', 'admin', '1658260414_aa882a1f4b2971', ''),
(31, '12323', 'ASDA', '', 'ADAD', 'ADAD', 'ADA', 'petugas', '1658260449_6cb87ad4d5658d', ''),
(32, '', '', '', '', '', '', '', '1658260559_4f071bbae99c52', ''),
(33, '23133', 'Wanda Hadis sUARA', '', '1331233', 'ADSAD', 'ASDAS', 'admin', '1658260882_ef3fa2ee17f0cb', ''),
(34, '13123', 'ssad', '', 'adas', 'adas', 'ada', 'admin', '1658261098_da71ae23c80780184645.png', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tele`
--
ALTER TABLE `tele`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tele`
--
ALTER TABLE `tele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
