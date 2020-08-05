-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2019 pada 09.48
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xr6_28`
--
CREATE DATABASE IF NOT EXISTS `xr6_28` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `xr6_28`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(200) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `alamat_karyawan` varchar(200) NOT NULL,
  `kontak` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `kontak`, `username`, `password`) VALUES
('nb001', 'Sugeng Enjing', 'Magetan', '087465329100', 'enjing12', '12345'),
('nb002', 'Ratnawati', 'Solo,Jawa Tengah', '083845256430', 'ratna.wati', '123'),
('nb003', 'Sugeng ', 'Jakarta ', '085335967195', 'sugeng.geng', '1234'),
('nb004', 'Nabilla Maysha', 'Malang', '0859367583974', 'nabmay', '1245'),
('nb005', 'Zakka Junian', 'Bandung', '082336745980', 'zak.jp', '1345'),
('nb006', 'Nanik Rahmawati', 'Madiun', '087465329100', 'nanik.rahma', '135246'),
('nb007', 'Kesya Nur', 'Bandung', '081279430712', 'kesyaa.n', '12345678'),
('nb008', 'Nafarras AP', 'Magetan', '081279430712', 'naf.ap', '3245'),
('nb009', 'Valen Zidana', 'Surabaya', '089756430856', 'valen.zid', '24532'),
('nb010', 'Wilda Bela', 'Pacitan', '085442870451', 'wil.bela', '245');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` varchar(100) NOT NULL,
  `nomor_mobil` varchar(100) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `jenis` varchar(500) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `tahun_pembuatan` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `biaya_sewa_per_hari` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nomor_mobil`, `merk`, `jenis`, `warna`, `tahun_pembuatan`, `image`, `biaya_sewa_per_hari`) VALUES
('001', 'AE 1245 P', 'BMW', 'I3', 'Biru', '2017', '001-433.jpg', 1700000),
('002', 'P 1980 WN', 'Subaru', 'Offroad', 'Biru', '2018', '002-719.jpg', 1800000),
('003', 'N 1340 BW', 'BMW', 'M3', 'Merah', '2017', '003-223.jpg', 2000000),
('004', 'W 1800 NQ', 'Lamborghini', 'Sport', 'Hitam', '2018', '004-511.jpg', 2500000),
('005', 'AE 5309 NQ', 'BMW', 'I3', 'Putih', '2017', '005-372.jpg', 1700000),
('006', 'N 1320 WM', 'Lamborghini', 'Balap', 'Putih', '2018', '006-631.jpg', 2300000),
('007', 'L 1547 NB', 'Ford', 'Old Car', 'Merah', '2016', '007-683.jpg', 1500000),
('008', 'P 1245 NN', 'Ford', 'GTR', 'Kuning', '2017', '008-294.jpg', 2100000),
('009', 'S 1056 NC ', 'Subaru', 'Sport', 'Biru Putih', '2016', '009-95.jpg', 2000000),
('010', 'W 2843 KL', 'Subaru', 'Old Car', 'Putih', '2016', '010.288.jpg', 1600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(200) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `kontak` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `kontak`) VALUES
('ab01dc', 'Zakka', 'Magetan', '085335967195'),
('ab02dc', 'Akhbar', 'Magetan', '082336745980'),
('ab03dc', 'Salwa', 'Jombang', '089749239490'),
('ab04dc', 'Nafarras', 'Surabaya', '081279430712'),
('ab05dc', 'Nabilla', 'Malang', '083845256430'),
('ab06dc', 'Aldi', 'Madiun', '087569341207'),
('ab07dc', 'Kesya', 'Madiun', '089756430856'),
('ab08dc', 'Valen', 'Gresik', '085442870451'),
('ab09dc', 'Frad', 'Jember', '085621905279'),
('ab10dc', 'Wilda', 'Trenggalek', '085578234812');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(200) NOT NULL,
  `id_mobil` varchar(200) NOT NULL,
  `id_karyawan` varchar(200) NOT NULL,
  `id_pelanggan` varchar(200) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
