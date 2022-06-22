-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table trungtamtienganh.chiet_khau
CREATE TABLE IF NOT EXISTS `chiet_khau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_buoi_hoc` int(11) DEFAULT NULL,
  `chiet_khau` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `udated_at` timestamp NULL DEFAULT NULL,
  `ma_lop_hoc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.chiet_khau: ~0 rows (approximately)
DELETE FROM `chiet_khau`;
/*!40000 ALTER TABLE `chiet_khau` DISABLE KEYS */;
INSERT INTO `chiet_khau` (`id`, `so_buoi_hoc`, `chiet_khau`, `created_at`, `udated_at`, `ma_lop_hoc`) VALUES
	(1, 1, 5, NULL, NULL, 4),
	(3, 3, 8, NULL, NULL, 4);
/*!40000 ALTER TABLE `chiet_khau` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
