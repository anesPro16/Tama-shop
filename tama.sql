-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2023 pada 10.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peran_user`
--

CREATE TABLE `peran_user` (
  `id` int(11) NOT NULL,
  `peran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peran_user`
--

INSERT INTO `peran_user` (`id`, `peran`) VALUES
(1, 'admin'),
(2, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(3) NOT NULL,
  `nama_brg` varchar(25) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(4) NOT NULL,
  `total_harga` int(16) NOT NULL,
  `terjual` int(4) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `kode_brg`, `keterangan`, `kategori`, `harga`, `stok`, `total_harga`, `terjual`, `gambar`) VALUES
(1, 'Air Mineral', 'mAM001', 'Air Mineral 500 ml', 'Minuman', 3000, 0, 0, 0, 'Air_Mineral.jpeg'),
(2, 'Beras', 'SB002', 'Beras Kepala Super 5 Kg', 'Sembako', 70000, 38, 2660000, 2, 'Beras.png'),
(3, 'Kukis', 'mK003', 'Kukis Kering', 'Makanan', 10000, 13, 130000, 3, 'Kukis.jpg'),
(4, 'Mie Ayam Bawang', 'SMAB004', 'Indomie Ayam Bawang', 'Sembako', 4000, 57, 228000, 1, 'Mie_Ayam_Bawang.png'),
(5, 'Donat', 'mD005', 'Donat isi 8 buah', 'Makanan', 12000, 59, 708000, 0, 'Donat.jpg'),
(6, 'Susu UHT', 'mSU006', 'Susu Full Cream 300 ml', 'Minuman', 8000, 105, 840000, 0, 'Susu_UHT.png'),
(7, 'Mie Soto', 'SMS007', 'Indomie rasa Soto', 'Sembako', 3500, 50, 175000, 2, 'Mie_Soto.png'),
(8, 'Fanta Jeruk', 'mFJ008', 'Fanta rasa Jeruk 500 ml', 'Minuman', 6000, 86, 516000, 2, 'Fanta_Jeruk.jpg'),
(9, 'Gula Pasir', 'SGP009', 'Gula Pasir 1 Kg', 'Sembako', 18000, 43, 774000, 1, 'Gula_Pasir.png'),
(10, 'Pop mie', 'SPm010', 'pop mie rasa ayam', 'Sembako', 6000, 47, 282000, 1, 'Pop_mie.png'),
(11, 'Royco', 'SR011', 'Royco rasa ayam', 'Sembako', 500, 57, 28500, 0, 'Royco.png'),
(12, 'Beras', 'SB012', 'Beras Berliansae', 'Sembako', 80000, 67, 5360000, 0, 'Beras1.png'),
(13, 'Mi Goreng', 'SMG013', 'Mi instant rasa ayam', 'Sembako', 3500, 67, 234500, 1, 'Mi_Goreng.png'),
(14, 'Beras', 'SB014', 'Beras Sugar Free', 'Sembako', 78000, 48, 3744000, 0, 'Beras2.png'),
(16, 'Mie kari Ayam', 'SMkA015', 'Indomie rasa kari ayam', 'Sembako', 4000, 68, 272000, 0, 'Mi_Kari.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `batas_bayar` date NOT NULL,
  `waktu_bayar` int(11) NOT NULL,
  `konfirmasi` varchar(15) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `id_user`, `nama`, `alamat`, `total_bayar`, `tgl_pesan`, `batas_bayar`, `waktu_bayar`, `konfirmasi`, `gambar`) VALUES
(1, 1, 'Admin', 'Babelan', 14000, '2023-12-11', '2023-12-12', 1702283626, 'Sudah Bayar', 'pay.png'),
(2, 2, 'Aji', 'Indoporlen', 160000, '2023-12-13', '2023-12-14', 1702472015, 'Sudah Bayar', 'pay.png'),
(4, 4, 'Yohanes', 'Bahagia', 19000, '2023-12-16', '2023-12-17', 1702732916, 'Sudah Bayar', 'foto.png'),
(5, 3, 'Aliya', 'Tambun', 6000, '2023-12-16', '2023-12-17', 1702699481, 'Sudah Bayar', 'pay.png'),
(6, 5, 'Mutiara', 'Bekasi', 3500, '2023-12-16', '2023-12-17', 1702732922, 'Sudah Bayar', 'foto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lapor`
--

CREATE TABLE `tb_lapor` (
  `id` int(11) NOT NULL,
  `id_psn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `nama_brg` varchar(25) NOT NULL,
  `masalah` varchar(25) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `laporan` varchar(16) NOT NULL,
  `balasan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lapor`
--

INSERT INTO `tb_lapor` (`id`, `id_psn`, `id_user`, `nama`, `alamat`, `nama_brg`, `masalah`, `foto`, `laporan`, `balasan`) VALUES
(3, 1, 1, 'Admin', 'Babelan', 'Kukis', 'Barang Rusak', 'foto.png', 'Laporan Diterima', 'Mohon Maaf, Barang akan dikirm Lagi'),
(4, 2, 1, 'Admin', 'Babelan', 'Mie Ayam Bawang', 'Barang Belum Tiba', 'foto.png', 'Laporan Diterima', 'Mohon Maaf, Barang akan dikirm Lagi'),
(5, 3, 2, 'Aji Suwandika', 'Indoporlen', 'Beras', 'Barang Belum Tiba', 'foto.png', 'Laporan Diterima', 'Mohon Maaf, Barang akan dikirm Lagi'),
(6, 11, 3, 'Aliya', 'Tambun', 'Pop mie', 'Barang Belum Tiba', 'foto.png', 'Sedang Diproses', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(3) NOT NULL,
  `id_invoice` int(3) NOT NULL,
  `id_brg` int(3) NOT NULL,
  `nomor_resi` int(11) NOT NULL,
  `nama_brg` varchar(25) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` varchar(15) NOT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nomor_resi`, `nama_brg`, `jumlah`, `harga`, `pilihan`, `status`) VALUES
(1, 1, 3, 935760, 'Kukis', 1, 10000, 'Cod', 'Terkirim'),
(2, 1, 4, 535651, 'Mie Ayam Bawang', 1, 4000, 'Cod', 'Terkirim'),
(3, 2, 2, 679950, 'Beras', 2, 70000, 'Cod', 'Mengirim'),
(4, 2, 3, 222785, 'Kukis', 2, 10000, 'Cod', 'Mengirim'),
(8, 4, 7, 231514, 'Mie Soto', 2, 3500, 'BRI', 'Gudang'),
(9, 4, 8, 489795, 'Fanta Jeruk', 2, 6000, 'BRI', 'Gudang'),
(11, 5, 10, 406631, 'Pop mie', 1, 6000, 'Dana', 'Gudang'),
(12, 6, 13, 470764, 'Mi Goreng', 1, 3500, 'Dana', 'Gudang');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `order` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
	WHERE id_brg = NEW.id_brg;
    UPDATE tb_barang SET terjual = terjual+NEW.jumlah
    WHERE id_brg = NEW.id_brg;
    UPDATE tb_barang SET total_harga = stok*harga
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` varchar(12) NOT NULL,
  `no_hp` varchar(11) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `aktif` int(1) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_peran` int(11) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `alamat`, `no_hp`, `foto`, `aktif`, `password`, `id_peran`, `waktu`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Babelan', '0123456789', 'foto.jpg', 1, '$2y$10$L1yTsv7w6lzuKbfQPaoHKeA1FQOV4HpsKdYYrAwgnKT.LqgENUwSi', 1, '2023-08-01'),
(2, 'Aji', 'aji@sn.com', 'Indoporlen', '0234567891', 'foto.jpg', 1, '$2y$10$3nAqH64tcEQNsaoH/eK5h.ED.rvhr9ewdm/SO51meu6P37g8Qphza', 2, '2023-08-10'),
(3, 'Aliya', 'aliya@raf.com', 'Tambun', '0345678912', 'foto.jpg', 1, '$2y$10$j5f16Ja1PBZSR0aOG7YJyOLZIWVAxJRQnM124v2IePO4Da/SaNKqC', 2, '2023-08-12'),
(4, 'Yohanes', 'anes@yoh.com', 'Bahagia', '0456789123', 'foto.jpg', 1, '$2y$10$os9Po5ddS04LU0FSoQ3Z6OFXqTYwUTi70mEeJMRKx7Qoa5m2Ca/xe', 2, '2023-08-16'),
(5, 'Mutiara', 'muti@gmail.com', 'Bekasi', '0845658123', 'foto.jpg', 1, '$2y$10$/L.LHYmjfvm/p/Co5NlUEOD5G5Md2o4H5SiHV7BvmG69P9cl4NiKC', 2, '2023-12-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `id_peran` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `id_peran`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 3, 3),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'buyer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `url` varchar(90) NOT NULL,
  `icon` varchar(35) NOT NULL,
  `is_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `judul`, `url`, `icon`, `is_aktif`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard_admin', 'fas fa-fw fa-dashboard', 1),
(2, 1, 'Data Barang', 'admin/data_barang', 'fas fa-fw fa-database', 1),
(3, 1, 'Invoice', 'admin/invoice', 'fas fa-fw fa-file-invoice', 1),
(4, 1, 'Detail Invoice', 'admin/invoice/detail_inv', 'fas fa-fw fa-file-invoice-dollar', 1),
(5, 1, 'Pengiriman', 'admin/kirim', 'fas fa-fw fa-people-carry-box', 1),
(6, 1, 'Laporan Produk', 'admin/kirim/laporAdm', 'fas fa-fw fa-message', 1),
(7, 2, 'shop', 'buyer', 'fas fa-fw fa-shop', 1),
(8, 2, 'Profil Saya', 'buyer/profil', 'fas fa-fw fa-user', 1),
(9, 2, 'Logout', 'admin/dashboard_admin/logOut', 'fas fa-fw fa-sign-out-alt', 1),
(10, 4, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(11, 4, 'Manajemen Submenu', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peran_user`
--
ALTER TABLE `peran_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_invoice_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tb_lapor`
--
ALTER TABLE `tb_lapor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_psn` (`id_psn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pesanan_ibfk_1` (`id_invoice`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peran_user`
--
ALTER TABLE `peran_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_lapor`
--
ALTER TABLE `tb_lapor`
  ADD CONSTRAINT `tb_lapor_ibfk_1` FOREIGN KEY (`id_psn`) REFERENCES `tb_pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_lapor_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `tb_invoice` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
