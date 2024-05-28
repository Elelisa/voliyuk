-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 15.54
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voliyuk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `gambar`) VALUES
(4, 'Bola Voli', 50000, '61aa1c447f120.jpg'),
(5, 'Baju Voli 1 Set', 80000, '61aa1c686ce50.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sewa`
--

CREATE TABLE `data_sewa` (
  `id` int(255) NOT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `tanggal_reservasi` datetime NOT NULL,
  `reservasi_untuk` datetime NOT NULL,
  `durasi_penyewaan` int(11) NOT NULL,
  `jenis_lapangan` varchar(255) NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_sewa`
--

INSERT INTO `data_sewa` (`id`, `nama_penyewa`, `tanggal_reservasi`, `reservasi_untuk`, `durasi_penyewaan`, `jenis_lapangan`, `total_harga`) VALUES
(25, 'Elica', '2021-11-28 18:03:00', '2021-11-29 18:03:00', 2, 'VIP', 300000),
(26, 'lulu', '2021-11-28 19:34:00', '2021-12-02 19:34:00', 3, 'VIP', 450000),
(27, 'Elica', '2021-11-28 20:03:00', '2021-11-29 20:03:00', 1, 'VIP', 150000),
(28, 'didi', '2021-11-28 20:03:00', '2021-11-29 20:04:00', 2, 'VIP', 300000),
(29, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(30, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(31, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(32, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(33, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(34, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(35, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(36, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(37, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(38, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(39, 'Mia', '2021-12-03 03:05:00', '2021-12-12 03:05:00', 2, 'VVIP', 400000),
(40, 'Mia', '2021-12-03 03:51:00', '2022-01-03 03:51:00', 2, 'VVIP', 400000),
(41, 'Mia', '2021-12-03 03:51:00', '2022-01-03 03:51:00', 2, 'VVIP', 400000),
(42, 'Ojun', '2021-12-03 21:06:00', '2021-12-12 21:06:00', 2, 'VIP', 300000),
(43, 'Ojun', '2021-12-03 21:06:00', '2021-12-12 21:06:00', 2, 'VIP', 300000),
(44, 'Ojun', '2021-12-03 21:06:00', '2021-12-12 21:06:00', 2, 'VIP', 300000),
(45, 'Ojun', '2021-12-03 22:05:00', '2021-12-21 22:05:00', 2, 'VVIP', 400000),
(46, 'Ojun', '2021-12-03 22:27:00', '2021-12-19 22:27:00', 2, 'VVIP', 400000),
(47, 'Ojun', '2021-12-06 22:30:00', '2021-12-27 22:30:00', 1, 'VVIP', 200000),
(48, 'Ojun', '2021-12-06 22:39:00', '2021-12-28 22:39:00', 2, 'VVIP', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(100) NOT NULL,
  `jenis_lapangan` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id`, `jenis_lapangan`, `harga`, `gambar`) VALUES
(5, 'VIP', 150000, '61aa1c9f9f902.jpg'),
(6, 'VVIP', 200000, '61a321a01574b.jpeg'),
(7, 'Regular', 50000, '61aa1c927a93f.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelunasan`
--

CREATE TABLE `pelunasan` (
  `id` int(100) NOT NULL,
  `tgl_pelunasan` datetime NOT NULL,
  `id_penyewaan` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelunasan`
--

INSERT INTO `pelunasan` (`id`, `tgl_pelunasan`, `id_penyewaan`, `gambar`) VALUES
(6, '2021-11-28 18:04:00', 25, '61a357c1c7af7.jpg'),
(9, '2021-11-28 19:34:00', 26, '61a369762dd6c.png'),
(10, '2021-11-28 20:04:00', 28, '61a37073b7dcb.jpeg'),
(11, '2021-12-03 21:13:00', 44, '61aa18446a609.jpg'),
(12, '2021-12-03 21:13:00', 44, '61aa18bd877d9.jpg'),
(13, '2021-12-03 22:04:00', 25, '61aa23fec04d7.png'),
(14, '2021-12-03 22:12:00', 45, '61aa25d0bc649.jpg'),
(15, '2021-12-03 22:43:00', 48, '61aa2cfe8d3b0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `dob`, `username`, `password`) VALUES
(5, 'eli', '2002-03-07', 'elicalalala', '$2y$10$FsKq8xM9RnjsqpZwBvAkKOOqXABrxF63StGUZFn.1q7LWkrdVT7Ki'),
(6, 'miamaha@gmail.com', '2008-05-05', 'maa', '$2y$10$Pt6Fp9Yj5z5dBeWsVGT2OOFg65/BNWVQJvSr4HFKh.KI2Hvy8Js3K'),
(7, 'xiaojun@gmail.com', '2003-08-08', 'ojun', '$2y$10$.l0widEoU6VAb8MK.JMzfeKnvt.4.dRmmPIC5Beg1cU4DlAaaar5W');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_sewa`
--
ALTER TABLE `data_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penyewaan` (`id_penyewaan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_sewa`
--
ALTER TABLE `data_sewa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD CONSTRAINT `pelunasan_ibfk_1` FOREIGN KEY (`id_penyewaan`) REFERENCES `data_sewa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
