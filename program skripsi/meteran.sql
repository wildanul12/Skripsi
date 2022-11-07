-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2020 pada 22.01
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meteran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `meteran` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `golongan` varchar(11) NOT NULL,
  `total` varchar(20) NOT NULL,
  `pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `meteran`, `nama`, `alamat`, `golongan`, `total`, `pembayaran`) VALUES
(1, '333', 'ddd', 'jl.ccc', '1A', '12', '13200'),
(2, '456', 'aaa', 'jl.aaa', '1A', '15', '16500'),
(3, '456', 'aaa', 'jl.aaa', '1A', '15', '16500'),
(4, '456', 'aaa', 'jl.aaa', '1A', '15', '16500'),
(5, '123', 'wildanul ahsan', 'jl. bojong wetan no.15', '1B', '20', '44000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'wildan', 'ac174e67e662c4d31dcc2e8b16358024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `meteran` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id`, `meteran`, `nama`, `alamat`, `golongan`, `waktu`) VALUES
(6, '456', 'aaa', 'jl.aaa', '1A', '2020-04-14 03:48:29'),
(8, '222', 'bbb', 'jl.bbb', '1B', '0000-00-00 00:00:00'),
(9, '111', 'aaa', 'jl.aaa', '1A', '2020-04-17 23:46:15'),
(10, '333', 'ccc', 'jl.ccc', '1A', '2020-04-25 19:46:31'),
(13, '123', 'wildan', 'jl.Bojong Wetan No.15', '1B', '2020-04-25 20:00:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensor`
--

CREATE TABLE `sensor` (
  `id_sensor` int(10) NOT NULL,
  `meteran` varchar(10) NOT NULL,
  `debit` varchar(30) NOT NULL,
  `volume` varchar(30) NOT NULL,
  `liter` varchar(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sensor`
--

INSERT INTO `sensor` (`id_sensor`, `meteran`, `debit`, `volume`, `liter`, `total`, `pembayaran`, `waktu`) VALUES
(15, '456', '4', '5', '4', '15', '16500', '2020-04-25 19:49:26'),
(16, '456', '5', '6', '5', '15', '16500', '2020-04-25 19:49:26'),
(17, '222', '2', '3', '4', '31', '68200', '2020-04-25 19:49:26'),
(19, '456', '4', '3', '6', '15', '16500', '2020-04-25 19:49:26'),
(20, '111', '1', '2', '5', '21', '23100', '2020-04-25 19:49:26'),
(21, '333', '4', '3', '5', '20', '22000', '2020-04-25 19:49:26'),
(78, '222', '4', '5', '8', '31', '68200', '2020-04-25 19:49:26'),
(81, '111', '2', '3', '6', '21', '23100', '2020-04-25 19:49:26'),
(82, '333', '3', '4', '7', '20', '22000', '2020-04-25 19:49:26'),
(84, '333', '4', '3', '8', '20', '22000', '2020-04-25 19:49:26'),
(91, '222', '3', '7', '9', '31', '68200', '2020-04-25 19:49:26'),
(95, '111', '4', '5', '10', '21', '23100', '2020-04-25 19:49:26'),
(96, '222', '4', '5', '10', '31', '68200', '2020-04-25 19:49:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id_sensor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id_sensor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
