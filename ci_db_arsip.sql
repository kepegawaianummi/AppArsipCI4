-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.11-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk db_arsip
CREATE DATABASE IF NOT EXISTS `db_arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_arsip`;

-- membuang struktur untuk table db_arsip.auth_activation_attempts
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_activation_attempts: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_groups: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_groups_permissions
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_groups_permissions: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_groups_users
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_groups_users: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_logins: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_permissions
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_permissions: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_reset_attempts
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_reset_attempts: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.auth_users_permissions
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.auth_users_permissions: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` char(50) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_arsip.config: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.dbconfigure
CREATE TABLE IF NOT EXISTS `dbconfigure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `database` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_arsip.dbconfigure: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `dbconfigure` DISABLE KEYS */;
/*!40000 ALTER TABLE `dbconfigure` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.migrations: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_user` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_user` (`kd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_arsip.profiles: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `kd_user`, `nama`, `jenis_kelamin`, `created`, `modified`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 'admin', 'admin', 'pria', NULL, NULL, '2021-01-30 10:21:04', '2021-01-30 10:21:04', NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` char(40) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` blob DEFAULT NULL,
  `expires` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.sessions: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.tbl_bok
CREATE TABLE IF NOT EXISTS `tbl_bok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_bok` char(50) DEFAULT NULL,
  `nama_bok` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_bok_unik` (`kd_bok`),
  KEY `kd_bok` (`kd_bok`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_arsip.tbl_bok: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tbl_bok` DISABLE KEYS */;
INSERT INTO `tbl_bok` (`id`, `kd_bok`, `nama_bok`, `created`, `modified`) VALUES
	(1, 'a', 'tes', '2021-01-30 19:31:13', '2021-01-30 19:32:11'),
	(2, 'b', 'b', '2021-01-30 20:14:32', '2021-01-30 20:14:32'),
	(3, 'c', 'c', '2021-01-30 20:14:40', '2021-01-30 20:14:40');
/*!40000 ALTER TABLE `tbl_bok` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.tbl_penyimpanan
CREATE TABLE IF NOT EXISTS `tbl_penyimpanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` char(50) DEFAULT NULL,
  `kd_bok` char(50) DEFAULT NULL,
  `kd_rak` char(50) DEFAULT NULL,
  `warna_sampul` char(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_surat_uniq` (`no_surat`),
  KEY `no_surat` (`no_surat`),
  KEY `kd_bok` (`kd_bok`),
  KEY `kd_rak` (`kd_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_arsip.tbl_penyimpanan: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `tbl_penyimpanan` DISABLE KEYS */;
INSERT INTO `tbl_penyimpanan` (`id`, `no_surat`, `kd_bok`, `kd_rak`, `warna_sampul`, `created`, `modified`) VALUES
	(13, '12345', '', '', '', '2021-01-31 12:03:16', '2021-01-31 12:03:16'),
	(14, 'kk', '', '', '', '2021-01-31 12:04:25', '2021-01-31 12:04:25'),
	(15, '111', 'tes', '', '', '2021-01-31 12:09:00', '2021-01-31 12:09:00'),
	(16, '212121', 'a', '', '', '2021-01-31 12:12:25', '2021-01-31 12:12:25'),
	(17, 'adsadsad', 'a', '12345', '', '2021-01-31 12:20:46', '2021-01-31 12:20:46'),
	(18, '123', 'a', 'aa', '', '2021-01-31 13:45:41', '2021-01-31 13:45:41'),
	(19, 'SKL11111', 'c', '123', 'KUNING', '2021-01-31 13:48:40', '2021-01-31 13:48:40'),
	(20, '3213SKL', 'c', '123', '', '2021-01-31 13:51:32', '2021-01-31 13:51:32');
/*!40000 ALTER TABLE `tbl_penyimpanan` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.tbl_rak
CREATE TABLE IF NOT EXISTS `tbl_rak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_rak` char(50) DEFAULT NULL,
  `kd_bok` char(50) DEFAULT NULL,
  `nama_rak` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_rak_unik` (`kd_rak`),
  KEY `kd_rak` (`kd_rak`),
  KEY `no_bok` (`kd_bok`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_arsip.tbl_rak: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tbl_rak` DISABLE KEYS */;
INSERT INTO `tbl_rak` (`id`, `kd_rak`, `kd_bok`, `nama_rak`, `created`, `modified`) VALUES
	(1, 'aa', 'a', 'mantap', '2021-01-30 19:39:36', '2021-01-31 08:23:20'),
	(2, '12345', 'a', 'a', '2021-01-30 20:18:12', '2021-01-31 07:16:47'),
	(3, 'b', 'b', 'b', '2021-01-30 20:21:47', '2021-01-31 08:26:48'),
	(4, '123', 'c', 'RAK ABC', '2021-01-31 13:33:59', '2021-01-31 13:33:59');
/*!40000 ALTER TABLE `tbl_rak` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.tbl_suratkeluar
CREATE TABLE IF NOT EXISTS `tbl_suratkeluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` char(50) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `tahun_arsip` decimal(10,0) DEFAULT NULL,
  `perihal_surat` text DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `instansi_asal` text DEFAULT NULL,
  `keterangan_surat` text DEFAULT NULL,
  `jenis_surat` text DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_surat_unik` (`no_surat`),
  KEY `no_surat` (`no_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_arsip.tbl_suratkeluar: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tbl_suratkeluar` DISABLE KEYS */;
INSERT INTO `tbl_suratkeluar` (`id`, `no_surat`, `tgl_surat`, `tgl_diterima`, `tahun_arsip`, `perihal_surat`, `isi_surat`, `instansi_asal`, `keterangan_surat`, `jenis_surat`, `created`, `modified`) VALUES
	(8, 'SKL11111', '2021-01-31', '2021-01-31', 2021, '11', '11', '11111', '11', '111', '2021-01-31 13:48:40', '2021-01-31 13:48:40'),
	(9, '3213SKL', '2021-01-28', '2021-01-30', 2021, '12321', '1313', '123131', '213', '131', '2021-01-31 13:51:32', '2021-01-31 13:51:32');
/*!40000 ALTER TABLE `tbl_suratkeluar` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.tbl_suratmasuk
CREATE TABLE IF NOT EXISTS `tbl_suratmasuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` char(50) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `tahun_arsip` year(4) DEFAULT NULL,
  `perihal_surat` text DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `instansi_asal` text DEFAULT NULL,
  `keterangan_surat` text DEFAULT NULL,
  `jenis_surat` text DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_surat_uniq` (`no_surat`),
  KEY `no_surat` (`no_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_arsip.tbl_suratmasuk: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `tbl_suratmasuk` DISABLE KEYS */;
INSERT INTO `tbl_suratmasuk` (`id`, `no_surat`, `tgl_surat`, `tgl_diterima`, `tahun_arsip`, `perihal_surat`, `isi_surat`, `instansi_asal`, `keterangan_surat`, `jenis_surat`, `created`, `modified`) VALUES
	(29, '12345', '2021-01-31', '2021-01-31', '2021', '123', 'a', 'aaa', '', 'Re', '2021-01-31 12:03:16', '2021-01-31 12:03:16'),
	(30, 'kk', '2021-01-31', '2021-01-31', '2021', 'kk', 'kk', 'kk', 'kk', 'kk', '2021-01-31 12:04:25', '2021-01-31 12:04:25'),
	(31, '111', '2021-01-31', '2021-01-31', '2021', '11', '11', '111', '111', '11', '2021-01-31 12:09:00', '2021-01-31 12:09:00'),
	(32, '212121', '2021-01-01', '2021-01-02', '2021', '11111', '1111', '111', '111', '111', '2021-01-31 12:12:25', '2021-01-31 12:12:25'),
	(33, 'adsadsad', '2021-01-31', '2021-01-31', '2021', 'adad', 'adad', 'adad', 'adad', 'adad', '2021-01-31 12:20:46', '2021-01-31 12:20:46');
/*!40000 ALTER TABLE `tbl_suratmasuk` ENABLE KEYS */;

-- membuang struktur untuk table db_arsip.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `bagian` enum('skpd','admin','uptd','author') DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_arsip.users: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `nama`, `jenis_kelamin`, `bagian`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(11, '', 'admin', '$2y$10$sZzCeW1m5frdJGYagWHP.eDDb8LcXvIDdLBGd4KfYrNmjtHRqCk5q', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'pria', 'admin', 1, 0, '2021-01-30 10:21:03', '2021-01-30 10:21:03', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
