-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2022 pada 16.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_lain`
--

CREATE TABLE `biaya_lain` (
  `id_biaya_lain` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `draf_pendaftaran`
--

CREATE TABLE `draf_pendaftaran` (
  `id_draf` bigint(20) UNSIGNED NOT NULL,
  `id_jurusan` bigint(20) NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` bigint(20) NOT NULL,
  `jk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `wali_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Aktif',
  `kelas` bigint(20) DEFAULT NULL,
  `bayar` bigint(20) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` bigint(20) UNSIGNED NOT NULL,
  `id_guru` bigint(20) NOT NULL,
  `periode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `jk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nip`, `nohp`, `jk`, `bidang`, `alamat`, `status`) VALUES
(1, 'Putri Elitra', 10102938384, 812345678, 'perempuan', 'UI/UX', 'Lubuk Basung', 'Aktif'),
(2, 'Ahmad Aji', 1123456789, 8123456789, 'laki-laki', 'Web Design', 'Kota Padang', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'SIstem Informasi', NULL, NULL),
(2, 'Teknik Informatika', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `nama_kelas`, `wali_kelas`) VALUES
(1, 10, 'Sistem Informasi (A)', 'yessi aprilia'),
(2, 11, 'Teknik Informatika(A)', 'Aprilia Yessi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pendapatan` date DEFAULT NULL,
  `jumlah_pendapatan` bigint(20) DEFAULT NULL,
  `sumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengeluaran` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banyak` int(11) DEFAULT NULL,
  `jumlah_pengeluaran` bigint(20) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tanggal_pendapatan`, `jumlah_pendapatan`, `sumber`, `tanggal_pengeluaran`, `keterangan`, `satuan`, `banyak`, `jumlah_pengeluaran`, `status`) VALUES
(1, '2022-02-18', 300000, 'uang seragam', '2022-02-18', NULL, NULL, NULL, NULL, 'pendapatan'),
(2, '2022-02-18', 300000, 'uang seragam', '2022-02-18', NULL, NULL, NULL, NULL, 'pendapatan'),
(3, '2022-03-03', 100000, 'uang SPP', '2022-03-03', NULL, NULL, NULL, NULL, 'pendapatan'),
(4, '2022-03-03', 100000, 'uang SPP', '2022-03-03', NULL, NULL, NULL, NULL, 'pendapatan'),
(5, '2022-03-03', 100000, 'uang SPP', '2022-03-03', NULL, NULL, NULL, NULL, 'pendapatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_10_11_144215_create_siswa_table', 1),
(3, '2021_10_11_145137_create_kelas_table', 1),
(4, '2021_10_12_032552_create_guru_table', 1),
(5, '2021_10_12_035410_create_jurusan_table', 1),
(6, '2021_10_14_064327_create_pendaftaran_table', 1),
(7, '2021_10_14_072006_create_pembayaran_table', 1),
(8, '2021_10_16_070818_create_uang_spp_table', 1),
(9, '2021_10_17_093258_create_uang_ujian_table', 1),
(10, '2021_10_17_094729_create_uang_seragam_table', 1),
(11, '2021_10_17_132644_create_uang_dsp_table', 1),
(12, '2021_10_17_132920_create_uang_pkl_table', 1),
(13, '2021_10_19_024913_create_gaji_table', 1),
(14, '2021_10_19_063044_create_biaya_lain_table', 1),
(15, '2021_10_21_142807_create_draf_pendaftaran_table', 1),
(17, '2021_12_18_145701_create_laporan_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `jenis_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `jenis_pembayaran`, `nominal`, `kode`) VALUES
(1, 'Uang Pendaftaran', 125000, 'KM-0001'),
(2, 'Uang Seragam', 300000, 'KM-0002'),
(3, 'Uang DSP', 1000000, 'KM-0003'),
(4, 'Uang SPP', 100000, 'KM-0004'),
(5, 'Uang Ujian', 80000, 'KM-0005'),
(6, 'Uang PKL', 700000, 'KM-0006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` bigint(20) UNSIGNED NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nominal`, `nama_siswa`, `waktu`, `tanggal`) VALUES
(1, 125000, 'Ayu Sari', '01:42:25', '2021-12-21'),
(2, 125000, 'izen', '01:42:33', '2021-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `id_jurusan` bigint(20) NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` bigint(20) NOT NULL,
  `jk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `wali_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `id_jurusan`, `nama_siswa`, `nis`, `jk`, `tanggal_lahir`, `wali_siswa`, `alamat_siswa`, `status`) VALUES
(1, 1, 1, 'Ayu Sari', 1212121122, 'perempuan', '2021-12-18', 'Ayah Surang den', 'Kota Padang', 'Aktif'),
(2, 2, 2, 'izen', 11111111, 'laki-laki', '2021-12-19', 'Ayah Surang den', 'Kota Padang', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_dsp`
--

CREATE TABLE `uang_dsp` (
  `id_uang_dsp` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_pkl`
--

CREATE TABLE `uang_pkl` (
  `id_uang_pkl` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_seragam`
--

CREATE TABLE `uang_seragam` (
  `id_uang_seragam` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uang_seragam`
--

INSERT INTO `uang_seragam` (`id_uang_seragam`, `id_siswa`, `nominal`, `status`, `tanggal`, `waktu`) VALUES
(1, 1, 300000, 'lunas', '2022-03-03', '12:15:22'),
(2, 2, 300000, 'lunas', '2022-03-03', '12:15:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_spp`
--

CREATE TABLE `uang_spp` (
  `id_uang_spp` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `bulan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uang_spp`
--

INSERT INTO `uang_spp` (`id_uang_spp`, `id_siswa`, `bulan`, `nominal`, `tanggal`, `waktu`) VALUES
(1, 1, 'Maret-2022', 100000, '2022-03-03', '04:44:16'),
(2, 1, 'Maret-2022', 100000, '2022-03-03', '08:43:09'),
(3, 2, 'Maret-2022', 100000, '2022-03-03', '08:43:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_ujian`
--

CREATE TABLE `uang_ujian` (
  `id_uang_ujian` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `periode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `nohp`, `status`) VALUES
(1, 'Admin', 'admin', '$2y$10$GkdK3jLAJ/ATJcwF9tRJD.mogJJRGDa2ARmayB9ktVB8WKs1zn7I2', 8123456789, 'admin'),
(2, 'bendahara', 'bendahara', '$2y$10$vYoFMrUKjVdnGbhVWQzdr.0/qkndCgfzXShWSU1q3Iv/M3lECsHcu', 8123456789, 'bendahara'),
(3, 'Darti S.kom', 'kepsek', '$2y$10$TTXe6ZHRUrc0Z0i8WtwaBOWNkS8pWCieTfHWm3Udeq1fefIszCzB.', 8123456789, 'kepsek'),
(4, 'Amal Bakti Mukmin', 'ketua_yayasan', '$2y$10$aTqLbJwcTdbmeUOWNG6RRufLFoCYDWmkgOyhYFCrCnSt3cmA6Whma', 8123456789, 'ketua_yayasan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_lain`
--
ALTER TABLE `biaya_lain`
  ADD PRIMARY KEY (`id_biaya_lain`);

--
-- Indeks untuk tabel `draf_pendaftaran`
--
ALTER TABLE `draf_pendaftaran`
  ADD PRIMARY KEY (`id_draf`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `uang_dsp`
--
ALTER TABLE `uang_dsp`
  ADD PRIMARY KEY (`id_uang_dsp`);

--
-- Indeks untuk tabel `uang_pkl`
--
ALTER TABLE `uang_pkl`
  ADD PRIMARY KEY (`id_uang_pkl`);

--
-- Indeks untuk tabel `uang_seragam`
--
ALTER TABLE `uang_seragam`
  ADD PRIMARY KEY (`id_uang_seragam`);

--
-- Indeks untuk tabel `uang_spp`
--
ALTER TABLE `uang_spp`
  ADD PRIMARY KEY (`id_uang_spp`);

--
-- Indeks untuk tabel `uang_ujian`
--
ALTER TABLE `uang_ujian`
  ADD PRIMARY KEY (`id_uang_ujian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_lain`
--
ALTER TABLE `biaya_lain`
  MODIFY `id_biaya_lain` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `draf_pendaftaran`
--
ALTER TABLE `draf_pendaftaran`
  MODIFY `id_draf` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `uang_dsp`
--
ALTER TABLE `uang_dsp`
  MODIFY `id_uang_dsp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uang_pkl`
--
ALTER TABLE `uang_pkl`
  MODIFY `id_uang_pkl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uang_seragam`
--
ALTER TABLE `uang_seragam`
  MODIFY `id_uang_seragam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `uang_spp`
--
ALTER TABLE `uang_spp`
  MODIFY `id_uang_spp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `uang_ujian`
--
ALTER TABLE `uang_ujian`
  MODIFY `id_uang_ujian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
