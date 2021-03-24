-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2021 pada 15.12
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
-- Database: `cek1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_11_070139_add_confirmation', 1),
(4, '2018_10_26_191828_add_username_to_table_user', 1),
(5, '2018_10_27_160855_create_tbl_kategori', 1),
(6, '2018_11_01_135754_create_tbl_barang', 1),
(7, '2018_11_02_134756_create_tbl_kostumer', 1),
(8, '2018_11_02_143235_create_tbl_supplier', 1),
(9, '2018_11_07_114340_create_tbl_penjualan', 1),
(10, '2018_11_07_155343_create_tbl_penjualan_item', 1),
(11, '2018_11_08_192626_create_tbl_penjualan_bayar', 1),
(12, '2018_11_14_123932_create_tbl_pembelian', 1),
(13, '2018_11_14_124109_create_tbl_pembelian_item', 1),
(14, '2018_11_14_124400_create_tbl_pembelian_bayar', 1),
(15, '2018_11_28_170744_create_tbl_paket', 1),
(16, '2018_11_28_170956_tbl_paket_item', 1),
(17, '2018_12_20_192813_create_tbl_apriori', 1),
(18, '2019_01_17_135225_create_trigger_update_harga', 1),
(19, '2019_01_17_141527_create_trigger_stok_update_penjualan', 1),
(20, '2019_01_17_150951_create_trigger_stok_pembelian', 1),
(21, '2019_01_17_151200_create_trigger_rollback_pembelian', 1),
(22, '2019_01_17_153416_create_trigger_stok_update_pembelian', 1),
(23, '2019_01_17_203414_create_trigger_stok_penjualan', 1),
(24, '2019_01_17_203550_create_trigger_rollback_penjualan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_apriori`
--

CREATE TABLE `tbl_apriori` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_support` double(8,2) NOT NULL,
  `min_confidence` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_apriori`
--

INSERT INTO `tbl_apriori` (`id`, `min_support`, `min_confidence`, `created_at`, `updated_at`) VALUES
(1, 30.00, 70.00, '2021-03-22 13:53:13', '2021-03-23 14:07:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `barang_kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_stokStatus` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_stok` int(11) NOT NULL,
  `barang_hBeli` int(11) NOT NULL,
  `barang_hJual` int(11) NOT NULL,
  `barang_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kategori_id`, `barang_kode`, `barang_nama`, `barang_stokStatus`, `barang_stok`, `barang_hBeli`, `barang_hJual`, `barang_detail`, `barang_status`, `created_at`, `updated_at`) VALUES
(3, 6, '1', 'acer', 'Aktif', 9, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:36:59', '2021-03-23 13:39:54'),
(4, 6, '2', 'asus', 'Aktif', 2, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:39:42', '2021-03-23 13:39:42'),
(5, 6, '3', 'toshiba', 'Aktif', 3, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:40:15', '2021-03-23 13:40:15'),
(6, 6, '4', 'samsung', 'Aktif', 2, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:41:18', '2021-03-23 13:41:18'),
(7, 6, '5', 'hp', 'Aktif', 4, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:41:43', '2021-03-23 13:41:43'),
(8, 6, '6', 'hewpa', 'Aktif', 9, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:42:03', '2021-03-23 13:42:03'),
(9, 6, '7', 'dell', 'Aktif', 9, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:42:22', '2021-03-23 13:42:22'),
(10, 6, '8', 'axio', 'Aktif', 9, 1, 5000, '<p>&nbsp;</p>', 'Aktif', '2021-03-23 13:42:36', '2021-03-23 13:42:36');

--
-- Trigger `tbl_barang`
--
DELIMITER $$
CREATE TRIGGER `updateHarga_barang` AFTER UPDATE ON `tbl_barang` FOR EACH ROW BEGIN
                UPDATE
                tbl_paket_item SET
                    barang_hAsli = new.barang_hJual
                WHERE
                    id = new.id;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(5, '1', 'Sembako', '2021-03-23 13:30:10', '2021-03-23 13:30:10'),
(6, '2', 'laptop', '2021-03-23 13:33:50', '2021-03-23 13:33:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kostumer`
--

CREATE TABLE `tbl_kostumer` (
  `id` int(10) UNSIGNED NOT NULL,
  `kostumer_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kostumer_kontak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostumer_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kostumer`
--

INSERT INTO `tbl_kostumer` (`id`, `kostumer_nama`, `kostumer_kontak`, `kostumer_detail`, `created_at`, `updated_at`) VALUES
(4, 'Das', '5435', NULL, '2021-03-22 10:46:48', '2021-03-22 10:46:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id` int(10) UNSIGNED NOT NULL,
  `paket_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_harga` int(11) NOT NULL,
  `paket_status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket_item`
--

CREATE TABLE `tbl_paket_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `paket_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `barang_hAsli` int(11) NOT NULL,
  `barang_hJual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `pembelian_invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembelian_tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `pembelian_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian_bayar`
--

CREATE TABLE `tbl_pembelian_bayar` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pembayaran_tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `biaya_lain` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian_item`
--

CREATE TABLE `tbl_pembelian_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `beli_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Trigger `tbl_pembelian_item`
--
DELIMITER $$
CREATE TRIGGER `rollback_pembelian` AFTER DELETE ON `tbl_pembelian_item` FOR EACH ROW BEGIN
                UPDATE
                tbl_barang SET
                    barang_stok = barang_stok - old.beli_qty
                WHERE
                    id = old.barang_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokUpdate_pembelian` AFTER UPDATE ON `tbl_pembelian_item` FOR EACH ROW BEGIN
                UPDATE
                tbl_barang SET
                    barang_stok = barang_stok + (new.beli_qty - old.beli_qty),
                    barang_hBeli = new.harga_beli
                WHERE
                    id = new.barang_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_pembelian` AFTER INSERT ON `tbl_pembelian_item` FOR EACH ROW BEGIN
                UPDATE
                tbl_barang SET
                    barang_stok = barang_stok + new.beli_qty,
                    barang_hBeli = new.harga_beli
                WHERE
                    id = new.barang_id;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kostumer_id` int(10) UNSIGNED DEFAULT NULL,
  `penjualan_invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `penjualan_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id`, `kostumer_id`, `penjualan_invoice`, `penjualan_tgl`, `penjualan_detail`, `created_at`, `updated_at`) VALUES
(5, NULL, 'INVC/JUAL/230321/1616507162', '2021-03-23 13:43:00', '<p>&nbsp;</p>', '2021-03-23 13:43:49', '2021-03-23 13:43:49'),
(6, NULL, 'INVC/JUAL/230321/1616507115', '2021-03-23 13:44:00', '<p>&nbsp;</p>', '2021-03-23 13:44:32', '2021-03-23 13:44:32'),
(7, NULL, 'INVC/JUAL/230321/1616507199', '2021-03-23 13:45:00', '<p>&nbsp;</p>', '2021-03-23 13:46:03', '2021-03-23 13:46:03'),
(8, NULL, 'INVC/JUAL/230321/1616507213', '2021-03-23 13:46:00', '<p>&nbsp;</p>', '2021-03-23 13:46:41', '2021-03-23 13:46:41'),
(9, NULL, 'INVC/JUAL/230321/1616507383', '2021-03-23 13:46:00', '<p>&nbsp;</p>', '2021-03-23 13:47:16', '2021-03-23 13:47:16'),
(10, NULL, 'INVC/JUAL/230321/1616507406', '2021-03-23 13:48:00', '<p>&nbsp;</p>', '2021-03-23 13:48:50', '2021-03-23 13:48:50'),
(11, NULL, 'INVC/JUAL/230321/1616507453', '2021-03-23 13:49:00', '<p>&nbsp;</p>', '2021-03-23 13:49:20', '2021-03-23 13:49:20'),
(12, NULL, 'INVC/JUAL/230321/1616508071', '2021-03-23 13:56:00', '<p>&nbsp;</p>', '2021-03-23 14:00:10', '2021-03-23 14:00:10'),
(13, NULL, 'INVC/JUAL/230321/1616508182', '2021-03-23 14:00:00', '<p>&nbsp;</p>', '2021-03-23 14:02:41', '2021-03-23 14:02:41'),
(14, NULL, 'INVC/JUAL/230321/1616508358', '2021-03-23 14:02:00', '<p>&nbsp;</p>', '2021-03-23 14:03:10', '2021-03-23 14:03:10'),
(15, NULL, 'INVC/JUAL/230321/1616508311', '2021-03-23 14:03:00', '<p>&nbsp;</p>', '2021-03-23 14:03:43', '2021-03-23 14:03:43'),
(16, NULL, 'INVC/JUAL/230321/1616508331', '2021-03-23 14:03:00', '<p>&nbsp;</p>', '2021-03-23 14:04:26', '2021-03-23 14:04:26'),
(17, NULL, 'INVC/JUAL/230321/1616508517', '2021-03-23 14:05:00', '<p>&nbsp;</p>', '2021-03-23 14:05:54', '2021-03-23 14:05:54'),
(18, NULL, 'INVC/JUAL/230321/1616508578', '2021-03-23 14:06:00', '<p>&nbsp;</p>', '2021-03-23 14:06:25', '2021-03-23 14:06:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_bayar`
--

CREATE TABLE `tbl_penjualan_bayar` (
  `id` int(10) UNSIGNED NOT NULL,
  `penjualan_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pembayaran_tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `biaya_lain` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_penjualan_bayar`
--

INSERT INTO `tbl_penjualan_bayar` (`id`, `penjualan_id`, `user_id`, `pembayaran_tgl`, `biaya_lain`, `bayar`, `created_at`, `updated_at`) VALUES
(5, 5, 5, '2021-03-23 13:43:00', 0, 15000, '2021-03-23 13:43:49', '2021-03-23 13:43:49'),
(6, 6, 5, '2021-03-23 13:44:00', 0, 15000, '2021-03-23 13:44:32', '2021-03-23 13:44:32'),
(7, 7, 5, '2021-03-23 13:45:00', 0, 15000, '2021-03-23 13:46:03', '2021-03-23 13:46:03'),
(8, 8, 5, '2021-03-23 13:46:00', 0, 15000, '2021-03-23 13:46:41', '2021-03-23 13:46:41'),
(9, 9, 5, '2021-03-23 13:46:00', 0, 15000, '2021-03-23 13:47:17', '2021-03-23 13:47:17'),
(10, 10, 5, '2021-03-23 13:48:00', 0, 15000, '2021-03-23 13:48:51', '2021-03-23 13:48:51'),
(11, 11, 5, '2021-03-23 13:49:00', 0, 15000, '2021-03-23 13:49:20', '2021-03-23 13:49:20'),
(12, 12, 5, '2021-03-23 13:56:00', 0, 15000, '2021-03-23 14:00:11', '2021-03-23 14:00:11'),
(13, 13, 5, '2021-03-23 14:00:00', 0, 15000, '2021-03-23 14:02:42', '2021-03-23 14:02:42'),
(14, 14, 5, '2021-03-23 14:02:00', 0, 15000, '2021-03-23 14:03:10', '2021-03-23 14:03:10'),
(15, 15, 5, '2021-03-23 14:03:00', 0, 15000, '2021-03-23 14:03:44', '2021-03-23 14:03:44'),
(16, 16, 5, '2021-03-23 14:03:00', 0, 15000, '2021-03-23 14:04:26', '2021-03-23 14:04:26'),
(17, 17, 5, '2021-03-23 14:05:00', 0, 15000, '2021-03-23 14:05:54', '2021-03-23 14:05:54'),
(18, 18, 5, '2021-03-23 14:06:00', 0, 20000, '2021-03-23 14:06:26', '2021-03-23 14:06:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_item`
--

CREATE TABLE `tbl_penjualan_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `penjualan_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jual_qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_penjualan_item`
--

INSERT INTO `tbl_penjualan_item` (`id`, `penjualan_id`, `barang_id`, `harga_beli`, `harga_jual`, `jual_qty`, `diskon`, `created_at`, `updated_at`) VALUES
(4, 5, 3, 1, 5000, 1, 0, '2021-03-23 13:43:49', '2021-03-23 13:43:49'),
(5, 5, 6, 1, 5000, 1, 0, '2021-03-23 13:43:49', '2021-03-23 13:43:49'),
(6, 5, 5, 1, 5000, 1, 0, '2021-03-23 13:43:49', '2021-03-23 13:43:49'),
(7, 6, 3, 1, 5000, 1, 0, '2021-03-23 13:44:32', '2021-03-23 13:44:32'),
(8, 6, 4, 1, 5000, 1, 0, '2021-03-23 13:44:32', '2021-03-23 13:44:32'),
(9, 6, 5, 1, 5000, 1, 0, '2021-03-23 13:44:32', '2021-03-23 13:44:32'),
(10, 7, 7, 1, 5000, 1, 0, '2021-03-23 13:46:03', '2021-03-23 13:46:03'),
(11, 7, 6, 1, 5000, 1, 0, '2021-03-23 13:46:03', '2021-03-23 13:46:03'),
(12, 7, 5, 1, 5000, 1, 0, '2021-03-23 13:46:03', '2021-03-23 13:46:03'),
(13, 8, 3, 1, 5000, 1, 0, '2021-03-23 13:46:41', '2021-03-23 13:46:41'),
(14, 8, 4, 1, 5000, 1, 0, '2021-03-23 13:46:41', '2021-03-23 13:46:41'),
(15, 8, 6, 1, 5000, 1, 0, '2021-03-23 13:46:41', '2021-03-23 13:46:41'),
(16, 9, 3, 1, 5000, 1, 0, '2021-03-23 13:47:16', '2021-03-23 13:47:16'),
(17, 9, 6, 1, 5000, 1, 0, '2021-03-23 13:47:17', '2021-03-23 13:47:17'),
(18, 9, 5, 1, 5000, 1, 0, '2021-03-23 13:47:17', '2021-03-23 13:47:17'),
(19, 10, 3, 1, 5000, 1, 0, '2021-03-23 13:48:50', '2021-03-23 13:48:50'),
(20, 10, 7, 1, 5000, 1, 0, '2021-03-23 13:48:51', '2021-03-23 13:48:51'),
(21, 10, 5, 1, 5000, 1, 0, '2021-03-23 13:48:51', '2021-03-23 13:48:51'),
(22, 11, 3, 1, 5000, 1, 0, '2021-03-23 13:49:20', '2021-03-23 13:49:20'),
(23, 11, 4, 1, 5000, 1, 0, '2021-03-23 13:49:20', '2021-03-23 13:49:20'),
(24, 11, 5, 1, 5000, 1, 0, '2021-03-23 13:49:20', '2021-03-23 13:49:20'),
(25, 12, 3, 1, 5000, 1, 0, '2021-03-23 14:00:10', '2021-03-23 14:00:10'),
(26, 12, 4, 1, 5000, 1, 0, '2021-03-23 14:00:10', '2021-03-23 14:00:10'),
(27, 12, 7, 1, 5000, 1, 0, '2021-03-23 14:00:11', '2021-03-23 14:00:11'),
(28, 13, 4, 1, 5000, 1, 0, '2021-03-23 14:02:41', '2021-03-23 14:02:41'),
(29, 13, 7, 1, 5000, 1, 0, '2021-03-23 14:02:41', '2021-03-23 14:02:41'),
(30, 13, 6, 1, 5000, 1, 0, '2021-03-23 14:02:42', '2021-03-23 14:02:42'),
(31, 14, 3, 1, 5000, 1, 0, '2021-03-23 14:03:10', '2021-03-23 14:03:10'),
(32, 14, 7, 1, 5000, 1, 0, '2021-03-23 14:03:10', '2021-03-23 14:03:10'),
(33, 14, 6, 1, 5000, 1, 0, '2021-03-23 14:03:10', '2021-03-23 14:03:10'),
(34, 15, 3, 1, 5000, 1, 0, '2021-03-23 14:03:44', '2021-03-23 14:03:44'),
(35, 15, 6, 1, 5000, 1, 0, '2021-03-23 14:03:44', '2021-03-23 14:03:44'),
(36, 15, 5, 1, 5000, 1, 0, '2021-03-23 14:03:44', '2021-03-23 14:03:44'),
(37, 16, 4, 1, 5000, 1, 0, '2021-03-23 14:04:26', '2021-03-23 14:04:26'),
(38, 16, 7, 1, 5000, 1, 0, '2021-03-23 14:04:26', '2021-03-23 14:04:26'),
(39, 16, 6, 1, 5000, 1, 0, '2021-03-23 14:04:26', '2021-03-23 14:04:26'),
(40, 17, 3, 1, 5000, 1, 0, '2021-03-23 14:05:54', '2021-03-23 14:05:54'),
(41, 17, 4, 1, 5000, 1, 0, '2021-03-23 14:05:54', '2021-03-23 14:05:54'),
(42, 17, 8, 1, 5000, 1, 0, '2021-03-23 14:05:54', '2021-03-23 14:05:54'),
(43, 18, 3, 1, 5000, 1, 0, '2021-03-23 14:06:26', '2021-03-23 14:06:26'),
(44, 18, 4, 1, 5000, 1, 0, '2021-03-23 14:06:26', '2021-03-23 14:06:26'),
(45, 18, 9, 1, 5000, 1, 0, '2021-03-23 14:06:26', '2021-03-23 14:06:26'),
(46, 18, 10, 1, 5000, 1, 0, '2021-03-23 14:06:26', '2021-03-23 14:06:26');

--
-- Trigger `tbl_penjualan_item`
--
DELIMITER $$
CREATE TRIGGER `rollback_penjualan` AFTER DELETE ON `tbl_penjualan_item` FOR EACH ROW BEGIN
                UPDATE
                tbl_barang SET
                    barang_stok = CASE WHEN barang_stokStatus = "Aktif" THEN barang_stok + old.jual_qty WHEN barang_stokStatus = "Tidak Aktif" THEN 0 END
                WHERE
                    id = old.barang_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokUpdate_penjualan` AFTER UPDATE ON `tbl_penjualan_item` FOR EACH ROW BEGIN
                UPDATE
                tbl_barang SET
                    barang_stok = CASE WHEN barang_stokStatus = "Aktif" THEN barang_stok - (new.jual_qty - old.jual_qty) WHEN barang_stokStatus = "Tidak Aktif" THEN 0 END
                WHERE
                    id = new.barang_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_penjualan` AFTER INSERT ON `tbl_penjualan_item` FOR EACH ROW BEGIN
                UPDATE
                tbl_barang SET
                    barang_stok = CASE WHEN barang_stokStatus = "Aktif" THEN barang_stok - new.jual_qty WHEN barang_stokStatus = "Tidak Aktif" THEN 0 END
                WHERE
                    id = new.barang_id;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_kontak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `confirmation_code`, `confirmed`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alfian', 'mohammadalfian467@gmail.com', 'alfian', NULL, 'yVQF3Rai8aEu6lHEP4xVJM4Bcwjx29', 0, '$2y$10$xsyPg76s8FB.Qe0AKMIf5OgtIsxZqnN2Wire80ucJnSUYdQAw7di2', 'Aktif', '2dPhRaAlSDPBg39Sxm3PbxAgg6dgsz7PmEgMxtdp6fNX2LL1MyJMt4CQQF7W', '2021-03-22 00:20:51', '2021-03-23 10:28:24'),
(5, 'Mohammad1', 'mohammad1@gmail.com', 'mohammad', NULL, 'yJSCrH6am7NdEYQpmGMk3J3BMcxZWn', 0, '$2y$10$0jsGweRP4RVyqyAhoFNpJO47j60aFDeXCzsvDWmot0zL7fQbyFpG.', 'Aktif', 'P2tgg8r0SIApvHTJkG7M46oj7Pl6oEdLKGRrJYORI9L8KJbLTjCCriNXhWJu', '2021-03-23 10:12:51', '2021-03-23 12:26:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_apriori`
--
ALTER TABLE `tbl_apriori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_barang_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_kategori_kategori_kode_unique` (`kategori_kode`);

--
-- Indeks untuk tabel `tbl_kostumer`
--
ALTER TABLE `tbl_kostumer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_paket_item`
--
ALTER TABLE `tbl_paket_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_paket_item_paket_id_foreign` (`paket_id`),
  ADD KEY `tbl_paket_item_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pembelian_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `tbl_pembelian_bayar`
--
ALTER TABLE `tbl_pembelian_bayar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pembelian_bayar_pembelian_id_foreign` (`pembelian_id`),
  ADD KEY `tbl_pembelian_bayar_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tbl_pembelian_item`
--
ALTER TABLE `tbl_pembelian_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pembelian_item_pembelian_id_foreign` (`pembelian_id`),
  ADD KEY `tbl_pembelian_item_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_penjualan_kostumer_id_foreign` (`kostumer_id`);

--
-- Indeks untuk tabel `tbl_penjualan_bayar`
--
ALTER TABLE `tbl_penjualan_bayar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_penjualan_bayar_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `tbl_penjualan_bayar_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tbl_penjualan_item`
--
ALTER TABLE `tbl_penjualan_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_penjualan_item_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `tbl_penjualan_item_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_apriori`
--
ALTER TABLE `tbl_apriori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kostumer`
--
ALTER TABLE `tbl_kostumer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket_item`
--
ALTER TABLE `tbl_paket_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian_bayar`
--
ALTER TABLE `tbl_pembelian_bayar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian_item`
--
ALTER TABLE `tbl_pembelian_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan_bayar`
--
ALTER TABLE `tbl_penjualan_bayar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan_item`
--
ALTER TABLE `tbl_penjualan_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_paket_item`
--
ALTER TABLE `tbl_paket_item`
  ADD CONSTRAINT `tbl_paket_item_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_paket_item_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `tbl_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD CONSTRAINT `tbl_pembelian_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pembelian_bayar`
--
ALTER TABLE `tbl_pembelian_bayar`
  ADD CONSTRAINT `tbl_pembelian_bayar_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `tbl_pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembelian_bayar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pembelian_item`
--
ALTER TABLE `tbl_pembelian_item`
  ADD CONSTRAINT `tbl_pembelian_item_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembelian_item_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `tbl_pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD CONSTRAINT `tbl_penjualan_kostumer_id_foreign` FOREIGN KEY (`kostumer_id`) REFERENCES `tbl_kostumer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan_bayar`
--
ALTER TABLE `tbl_penjualan_bayar`
  ADD CONSTRAINT `tbl_penjualan_bayar_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `tbl_penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penjualan_bayar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan_item`
--
ALTER TABLE `tbl_penjualan_item`
  ADD CONSTRAINT `tbl_penjualan_item_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penjualan_item_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `tbl_penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
