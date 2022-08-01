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


-- Dumping database structure for trungtamtienganh
CREATE DATABASE IF NOT EXISTS `trungtamtienganh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `trungtamtienganh`;

-- Dumping structure for table trungtamtienganh.about
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.about: ~0 rows (approximately)
DELETE FROM `about`;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
	(1, 'WE PROVIDE THE BEST ONLINE COURSES', 'Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet. Lorem ipsum viverra feugiat.', NULL, NULL);
/*!40000 ALTER TABLE `about` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.bai_viet
CREATE TABLE IF NOT EXISTS `bai_viet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `description` text,
  `display` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.bai_viet: ~4 rows (approximately)
DELETE FROM `bai_viet`;
/*!40000 ALTER TABLE `bai_viet` DISABLE KEYS */;
INSERT INTO `bai_viet` (`id`, `title`, `info`, `description`, `display`, `created_at`, `updated_at`, `deleted_at`, `image`) VALUES
	(1, 'Bài viết 1', 'fewvsgreg', '<p>f1eg19er4g</p>', 0, NULL, NULL, '2022-07-13 03:26:58', NULL),
	(2, 'Mostly Interesting UX/UI Designing', 'Donec sed tempus enim, a congue risus. Pellentesque euismod massa a quam\r\nviverra interdum.', '<h3><span style="color:#c0392b">HISTORY, PURPOSE AND USAGE</span></h3>\r\n\r\n<p><em>Lorem ipsum</em>, or&nbsp;<em>lipsum</em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;for use in a type specimen book. It usually begins with:</p>\r\n\r\n<p>&ldquo;<span style="background-color:#dddddd">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&rdquo;</span></p>\r\n\r\n<p>The purpose of&nbsp;<em>lorem ipsum</em>&nbsp;is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn&#39;t distract from the layout. A practice not without&nbsp;<a href="https://loremipsum.io/#controversy" title="Controversy in the Design World">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p>\r\n\r\n<p><img alt="" src="http://trungtamtienganh.test/plugins/ckfinder/userfiles/images/ava.jpg" style="height:80px; width:80px" /></p>\r\n\r\n<p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it&#39;s seen all around the web; on templates, websites, and stock designs. Use our&nbsp;<a href="https://loremipsum.io/#generator" title="Lorem Ipsum Generator">generator</a>&nbsp;to get your own, or read on for the authoritative history of&nbsp;<em>lorem ipsum</em>.</p>', 1, NULL, NULL, NULL, 'blog1.jpg'),
	(3, 'Growth Mindsets for Online Learners', 'Donec sed tempus enim, a congue risus. Pellentesque euismod massa a quam viverra interdum.', '<h3>HISTORY, PURPOSE AND USAGE</h3>\r\n\r\n<p><em>Lorem ipsum</em>, or&nbsp;<em>lipsum</em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;for use in a type specimen book. It usually begins with:</p>\r\n\r\n<blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&rdquo;</blockquote>\r\n\r\n<p>The purpose of&nbsp;<em>lorem ipsum</em>&nbsp;is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn&#39;t distract from the layout. A practice not without&nbsp;<a href="https://loremipsum.io/#controversy" title="Controversy in the Design World">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p>\r\n\r\n<p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it&#39;s seen all around the web; on templates, websites, and stock designs. Use our&nbsp;<a href="https://loremipsum.io/#generator" title="Lorem Ipsum Generator">generator</a>&nbsp;to get your own, or read on for the authoritative history of&nbsp;<em>lorem ipsum</em>.</p>', 1, NULL, NULL, NULL, 'blog2.jpg'),
	(4, 'Super fast & user friendly interface', 'Donec sed tempus enim, a congue risus. Pellentesque euismod massa a quam viverra interdum.', '<h3>HEDONIST ROOTS</h3>\r\n\r\n<p>Until recently, the prevailing view assumed&nbsp;<em>lorem ipsum</em>&nbsp;was born as a nonsense text. &ldquo;It&#39;s not Latin, though it looks like it, and it actually says nothing,&rdquo;&nbsp;<em>Before &amp; After</em>&nbsp;magazine&nbsp;<a href="https://www.straightdope.com/columns/read/2290/what-does-the-filler-text-lorem-ipsum-mean/" rel="noopener" target="_blank" title="Straight Dope – What Does the Filler Text Lorem Ipsum Mean?">answered a curious reader</a>, &ldquo;Its &lsquo;words&rsquo; loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.&rdquo;</p>\r\n\r\n<p>As Cicero would put it, &ldquo;Um, not so fast.&rdquo;</p>\r\n\r\n<p>The placeholder text, beginning with the line&nbsp;<em>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit&rdquo;</em>, looks like Latin because in its youth, centuries ago, it was Latin.</p>\r\n\r\n<p>Richard McClintock, a Latin scholar from Hampden-Sydney College, is&nbsp;<a href="https://en.wikipedia.org/wiki/Lorem_ipsum" rel="noopener" target="_blank" title="Wikipedia – Lorem Ipsum">credited</a>&nbsp;with discovering the source behind the ubiquitous filler text. In seeing a sample of&nbsp;<em>lorem ipsum</em>, his interest was piqued by&nbsp;<em>consectetur</em>&mdash;a genuine, albeit rare, Latin word. Consulting a Latin dictionary led McClintock to a passage from&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;(&ldquo;On the Extremes of Good and Evil&rdquo;), a first-century B.C. text from the Roman philosopher Cicero.</p>\r\n\r\n<p>In particular, the garbled words of&nbsp;<em>lorem ipsum</em>&nbsp;bear an unmistakable resemblance to sections 1.10.32&ndash;33 of Cicero&#39;s work, with the most notable passage excerpted below:</p>\r\n\r\n<blockquote>&ldquo;Neque porro quisquam est, qui&nbsp;<em>dolorem ipsum</em>&nbsp;quia&nbsp;<em>dolor sit amet, consectetur, adipisci velit, sed</em>&nbsp;quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.&rdquo;</blockquote>\r\n\r\n<p>A 1914 English translation by&nbsp;<a href="https://en.wikipedia.org/wiki/Lorem_ipsum#English_translation" rel="noopener" target="_blank" title="Wikipedia – Lorem Ipsum English Translation">Harris Rackham</a>&nbsp;reads:</p>\r\n\r\n<blockquote>&ldquo;Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure.&rdquo;</blockquote>\r\n\r\n<p>McClintock&#39;s eye for detail certainly helped narrow the whereabouts of&nbsp;<em>lorem ipsum&#39;s</em>&nbsp;origin, however, the &ldquo;how and when&rdquo; still remain something of a mystery, with competing theories and timelines.</p>', 1, NULL, NULL, NULL, 'blog3.jpg');
/*!40000 ALTER TABLE `bai_viet` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.canh_bao
CREATE TABLE IF NOT EXISTS `canh_bao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_hoc_vien` int(11) NOT NULL,
  `loai_canh_bao` int(11) NOT NULL COMMENT '1: Nghỉ học, 2: Điểm thấp 3: Không làm bài tập 4: Không tập trung',
  `noi_dung_canh_bao` text COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_canh_bao` timestamp NULL DEFAULT NULL,
  `tinh_trang_canh_bao` int(11) NOT NULL COMMENT '0: chua canh bao 1: da canh bao',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.canh_bao: 0 rows
DELETE FROM `canh_bao`;
/*!40000 ALTER TABLE `canh_bao` DISABLE KEYS */;
/*!40000 ALTER TABLE `canh_bao` ENABLE KEYS */;

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

-- Dumping data for table trungtamtienganh.chiet_khau: ~2 rows (approximately)
DELETE FROM `chiet_khau`;
/*!40000 ALTER TABLE `chiet_khau` DISABLE KEYS */;
INSERT INTO `chiet_khau` (`id`, `so_buoi_hoc`, `chiet_khau`, `created_at`, `udated_at`, `ma_lop_hoc`) VALUES
	(1, 1, 10, NULL, NULL, 4),
	(3, 3, 8, NULL, NULL, 4);
/*!40000 ALTER TABLE `chiet_khau` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.diem_so
CREATE TABLE IF NOT EXISTS `diem_so` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_qua_trinh_hoc` int(11) NOT NULL,
  `thoi_gian` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `diem` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.diem_so: 3 rows
DELETE FROM `diem_so`;
/*!40000 ALTER TABLE `diem_so` DISABLE KEYS */;
INSERT INTO `diem_so` (`id`, `ma_qua_trinh_hoc`, `thoi_gian`, `diem`, `created_at`, `updated_at`) VALUES
	(1, 7, '2022-05-04 00:00:00', 5, '2022-05-04 11:07:29', '2022-05-04 11:07:29'),
	(2, 7, '2022-05-12 00:00:00', 3, '2022-05-04 11:16:15', '2022-05-04 11:16:15'),
	(3, 9, '2022-05-11 00:00:00', 8, '2022-05-04 12:26:06', '2022-05-04 12:26:06');
/*!40000 ALTER TABLE `diem_so` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.giang_vien
CREATE TABLE IF NOT EXISTS `giang_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` int(11) NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `truong_dai_hoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `hien_thi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.giang_vien: 3 rows
DELETE FROM `giang_vien`;
/*!40000 ALTER TABLE `giang_vien` DISABLE KEYS */;
INSERT INTO `giang_vien` (`id`, `ten`, `tuoi`, `dia_chi`, `ma_mon_hoc`, `truong_dai_hoc`, `so_dien_thoai`, `created_at`, `updated_at`, `deleted_at`, `avatar`, `hien_thi`) VALUES
	(1, 'LongNCT', 27, 'Hà Nội', '1', 'Học Viện Công Nghệ Bưu Chính Viễn Thông - PTIT', '0393803548', '2022-05-04 03:41:51', '2022-05-04 03:41:51', NULL, NULL, NULL),
	(2, 'Lê Thị Thanh Nhàn', 26, 'Hà Nội', '2', 'Học Viện Công Nghệ Bưu Chính Viễn Thông - PTIT', '012345678954', '2022-05-04 03:42:33', '2022-05-04 03:42:33', NULL, NULL, NULL),
	(6, 'qqqqq', 11, 'Hà Nội', '1', 'xzcvevf', '1231233456', '2022-07-12 01:30:48', '2022-07-12 01:30:48', NULL, 'ava.jpg', NULL);
/*!40000 ALTER TABLE `giang_vien` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.hoc_phi
CREATE TABLE IF NOT EXISTS `hoc_phi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_hoc_vien` int(11) NOT NULL,
  `ma_lop_hoc` int(11) NOT NULL,
  `hoc_phi` int(11) NOT NULL,
  `tinh_trang_nop_hoc_phi` int(11) NOT NULL DEFAULT '0' COMMENT '1: da nop 0: chua nop',
  `ngay_nop_hoc_phi` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.hoc_phi: 11 rows
DELETE FROM `hoc_phi`;
/*!40000 ALTER TABLE `hoc_phi` DISABLE KEYS */;
INSERT INTO `hoc_phi` (`id`, `ma_hoc_vien`, `ma_lop_hoc`, `hoc_phi`, `tinh_trang_nop_hoc_phi`, `ngay_nop_hoc_phi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 1000000, 1, '2022-05-04 03:49:11', '2022-05-04 03:48:16', '2022-05-04 03:49:11', NULL),
	(10, 1, 2, 600000, 0, NULL, '2022-05-04 05:25:42', '2022-05-04 05:25:42', NULL),
	(9, 2, 1, 810000, 1, '2022-05-04 04:34:22', '2022-05-04 04:33:00', '2022-05-04 04:34:22', NULL),
	(7, 2, 2, 600000, 1, '2022-05-04 04:33:25', '2022-05-04 04:06:11', '2022-05-04 04:33:25', NULL),
	(6, 2, 2, 600000, 1, '2022-05-04 04:05:18', '2022-05-04 04:05:10', '2022-05-04 04:05:18', NULL),
	(11, 3, 3, 600000, 1, '2022-06-07 02:04:23', '2022-06-07 09:04:23', '2022-06-07 09:04:23', NULL),
	(12, 3, 2, 600000, 0, NULL, '2022-06-07 02:11:34', '2022-06-07 02:11:34', NULL),
	(13, 4, 2, 600000, 0, NULL, '2022-06-13 03:27:07', '2022-06-13 03:27:07', NULL),
	(14, 5, 3, 3600000, 1, '2022-06-20 02:15:27', '2022-06-20 09:15:27', '2022-06-20 09:15:27', NULL),
	(15, 5, 4, 800000, 1, '2022-06-20 02:42:18', '2022-06-20 02:23:44', '2022-06-20 02:42:18', NULL),
	(17, 3, 4, 720000, 0, NULL, '2022-06-23 03:46:08', '2022-06-23 03:46:08', NULL);
/*!40000 ALTER TABLE `hoc_phi` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.hoc_vien
CREATE TABLE IF NOT EXISTS `hoc_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten_phu_huynh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `truong_hoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.hoc_vien: 3 rows
DELETE FROM `hoc_vien`;
/*!40000 ALTER TABLE `hoc_vien` DISABLE KEYS */;
INSERT INTO `hoc_vien` (`id`, `ten`, `ngay_sinh`, `email`, `dia_chi`, `thong_tin`, `so_dien_thoai`, `ten_phu_huynh`, `truong_hoc`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'LongNguyen', '2022-06-13 09:45:18', '', 'Ha Noi', 'Demo', '6549841894', 'àew', 'Không có', 1, '2022-06-07 02:04:23', '2022-06-07 02:04:23', NULL),
	(4, 'ThanhNhan', '2022-06-13 10:09:25', 'asdasd@gmail.com', 'Ha Noi', 'Demo', '6549841894', 'àew', 'Không có', 1, '2022-06-15 02:04:23', '2022-06-07 02:04:23', NULL),
	(5, 'HocVIen3', '2022-06-20 00:00:00', '', 'Ha Noi 1', 'zxvfewf', '8524693174', 'àew', 'PPPPP', 1, '2022-06-20 02:15:27', '2022-06-20 02:15:27', NULL);
/*!40000 ALTER TABLE `hoc_vien` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.lop_hoc
CREATE TABLE IF NOT EXISTS `lop_hoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_lop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_lop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_giang_vien` int(11) NOT NULL,
  `so_hoc_vien` int(11) NOT NULL,
  `thoi_gian_bat_dau` timestamp NULL DEFAULT NULL,
  `thoi_gian_ket_thuc` timestamp NULL DEFAULT NULL,
  `gio_vao_lop` text COLLATE utf8_unicode_ci,
  `gio_tan_lop` text COLLATE utf8_unicode_ci,
  `lich_hoc` text COLLATE utf8_unicode_ci NOT NULL,
  `hoc_phi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `so_buoi_hoc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.lop_hoc: 4 rows
DELETE FROM `lop_hoc`;
/*!40000 ALTER TABLE `lop_hoc` DISABLE KEYS */;
INSERT INTO `lop_hoc` (`id`, `ten_lop`, `ma_lop`, `thong_tin`, `ma_mon_hoc`, `ma_giang_vien`, `so_hoc_vien`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `gio_vao_lop`, `gio_tan_lop`, `lich_hoc`, `hoc_phi`, `created_at`, `updated_at`, `deleted_at`, `so_buoi_hoc`) VALUES
	(1, 'Tiếng Anh cơ bản 1', 'EngBasic12', 'Đào tạo tiếng Anh cơ bản cho học sinh cấp 1', '1', 1, 1, '2022-05-04 00:00:00', '2023-05-31 00:00:00', '11:45', '00:45', '["2","8"]', 1000000, '2022-05-04 03:43:36', '2022-05-04 04:32:55', NULL, NULL),
	(2, 'Tiếng Anh cơ bản 2', 'EngBasic2', 'Dậy tiếng Anh cho học sinh cấp 2 lớp 6', '2', 2, 5, '2022-06-01 00:00:00', '2022-06-30 00:00:00', '04:50', '05:20', '["3","4"]', 600000, '2022-05-04 03:45:12', '2022-05-04 03:45:12', NULL, NULL),
	(3, 'Tiếng Anh cơ bản 3', 'EngBasic3', 'Dậy tiếng Anh cho học sinh cấp 2 lớp 6', '2', 2, 5, '2022-06-01 00:00:00', '2022-06-30 00:00:00', '04:50', '05:20', '["3","4"]', 600000, '2022-05-04 03:45:12', '2022-05-04 03:45:12', NULL, NULL),
	(4, 'TiengAnh4', 'ENG4B', 'zvw', '1', 1, 99, '2022-06-01 00:00:00', '2022-06-30 00:00:00', '10:49', '14:53', '["4","5"]', 800000, '2022-06-20 01:47:36', '2022-06-20 01:49:01', NULL, 98);
/*!40000 ALTER TABLE `lop_hoc` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.luong_giang_vien
CREATE TABLE IF NOT EXISTS `luong_giang_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_giang_vien` int(11) NOT NULL,
  `ngay_tra_luong` timestamp NULL DEFAULT NULL,
  `luong` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.luong_giang_vien: 1 rows
DELETE FROM `luong_giang_vien`;
/*!40000 ALTER TABLE `luong_giang_vien` DISABLE KEYS */;
INSERT INTO `luong_giang_vien` (`id`, `ma_giang_vien`, `ngay_tra_luong`, `luong`, `created_at`, `updated_at`) VALUES
	(1, 2, '2022-05-31 00:00:00', 1000000, '2022-05-04 11:12:31', '2022-05-04 11:12:31');
/*!40000 ALTER TABLE `luong_giang_vien` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trungtamtienganh.migrations: 0 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.mon_hoc
CREATE TABLE IF NOT EXISTS `mon_hoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.mon_hoc: 3 rows
DELETE FROM `mon_hoc`;
/*!40000 ALTER TABLE `mon_hoc` DISABLE KEYS */;
INSERT INTO `mon_hoc` (`id`, `ten`, `ma_mon_hoc`, `thong_tin`, `created_at`, `updated_at`) VALUES
	(1, 'Tiếng Anh Cấp 1', 'Eng1', 'Dậy tiếng Anh cho học sinh cấp 1', '2022-05-04 03:40:19', '2022-05-04 03:40:19'),
	(2, 'Tiếng Anh Cấp 2', 'Eng2', 'Dậy tiếng Anh cho học sinh cấp 2', '2022-05-04 03:40:36', '2022-05-04 03:40:36'),
	(3, 'Tiếng Anh', 'ENG', '-', '2022-06-06 01:59:45', '2022-06-06 01:59:45');
/*!40000 ALTER TABLE `mon_hoc` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.paygates
CREATE TABLE IF NOT EXISTS `paygates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `configs` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.paygates: 3 rows
DELETE FROM `paygates`;
/*!40000 ALTER TABLE `paygates` DISABLE KEYS */;
INSERT INTO `paygates` (`id`, `name`, `code`, `url`, `configs`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Ngân Lượng', 'nganluong', 'https://www.nganluong.vn/checkout.php', '{"currency":"USD","MERCHANT_PASS":"Ax1L0GR3sB3f4kHQAj1JtIAWcuvgArQlNyrqcGCbdvLzGJ6nSHm8l2kF","MERCHANT_ID":"Q3FZWYGFYLG8WDGW","RECEIVER":"sb-3rtbb3863326_api1.business.example.com"}', '', '2020-11-27 09:58:17', '2020-12-01 10:44:21', NULL),
	(3, 'VNPAY', 'vnpay', 'http://sandbox.vnpayment.vn/paymentv2/vpcpay.html', '{"currency":"VND","vnp_TmnCode":"Ax1L0GR3sB3f4kHQAj1JtIAWcuvgArQlNyrqcGCbdvLzGJ6nSHm8l2kF","vnp_HashSecret":"Q3FZWYGFYLG8WDGW"}', '', '2020-12-02 09:49:33', '2020-12-02 09:49:33', NULL),
	(4, 'PayPal', 'paypal', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=', '{"API_USERNAME":"sb-nlqij3868487_api1.business.example.com","API_PASSWORD":"R9SRY8RF3CCSNE3P","API_SIGNATURE":"A3CZZ6twi-WT-7ZwGQua95N4-iDJAoXTkTDd9WQ7kUjYBGT3y8pqxT4D", "VERSION" : "53.0"}', '', '2020-12-07 16:22:36', '2020-12-07 16:22:36', NULL);
/*!40000 ALTER TABLE `paygates` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.qua_trinh_hoc
CREATE TABLE IF NOT EXISTS `qua_trinh_hoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_mon_hoc` int(11) NOT NULL,
  `ma_lop_hoc` int(11) DEFAULT NULL,
  `ma_hoc_vien` int(11) NOT NULL,
  `thoi_gian_hoc` timestamp NULL DEFAULT NULL,
  `diem_so` text COLLATE utf8_unicode_ci,
  `thong_tin` text COLLATE utf8_unicode_ci COMMENT 'Các lưu ý của giảng viên với học viên này',
  `tinh_trang_hoc` int(11) NOT NULL COMMENT '1: tốt 2: trung bình 3: không tốt',
  `hoc_phi` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.qua_trinh_hoc: 9 rows
DELETE FROM `qua_trinh_hoc`;
/*!40000 ALTER TABLE `qua_trinh_hoc` DISABLE KEYS */;
INSERT INTO `qua_trinh_hoc` (`id`, `ma_mon_hoc`, `ma_lop_hoc`, `ma_hoc_vien`, `thoi_gian_hoc`, `diem_so`, `thong_tin`, `tinh_trang_hoc`, `hoc_phi`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2022-05-04 00:00:00', NULL, ' ', 1, NULL, '2022-05-04 03:48:16', '2022-05-04 03:48:16'),
	(7, 2, 2, 2, '2022-06-01 00:00:00', NULL, ' ', 1, NULL, '2022-05-04 04:06:11', '2022-05-04 04:06:11'),
	(9, 1, 1, 2, '2022-05-04 00:00:00', NULL, ' ', 1, NULL, '2022-05-04 04:33:00', '2022-05-04 04:33:00'),
	(10, 2, 2, 1, '2022-06-01 00:00:00', NULL, ' ', 1, NULL, '2022-05-04 05:25:42', '2022-05-04 05:25:42'),
	(11, 2, 3, 3, '2022-06-01 00:00:00', NULL, '', 1, NULL, '2022-06-07 09:04:23', NULL),
	(12, 2, 2, 3, '2022-07-01 00:00:00', NULL, ' ', 1, NULL, '2022-06-07 02:11:34', '2022-06-07 02:11:34'),
	(14, 2, 2, 4, '2022-06-30 00:00:00', NULL, '', 1, 600000, '2022-06-13 03:27:07', '2022-06-13 03:27:07'),
	(15, 2, 3, 5, '2022-06-01 00:00:00', NULL, '', 1, NULL, '2022-06-20 09:15:27', NULL),
	(23, 1, 4, 3, '2022-06-30 00:00:00', NULL, '', 1, 720000, '2022-06-23 03:46:08', '2022-06-23 03:46:08');
/*!40000 ALTER TABLE `qua_trinh_hoc` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.says
CREATE TABLE IF NOT EXISTS `says` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lop` varchar(255) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `noi_dung` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.says: ~2 rows (approximately)
DELETE FROM `says`;
/*!40000 ALTER TABLE `says` DISABLE KEYS */;
INSERT INTO `says` (`id`, `lop`, `ten`, `noi_dung`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Tiếng Anh 3', 'Học Viên 1', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n                                    doloremque laudantium, totam rem aperiam,.', 'testi2.jpg', NULL, NULL, NULL);
/*!40000 ALTER TABLE `says` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(250) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.settings: ~43 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'favicon', '/storage/userfiles/images/nencer-fav.png', NULL, '2019-01-25 16:56:44'),
	(2, 'backendlogo', '/storage/userfiles/images/nencer-logo.png', NULL, '2019-01-25 16:56:44'),
	(3, 'name', 'Long Nguyen', NULL, '2019-01-25 16:56:44'),
	(4, 'title', 'Upload lưu trữ file không giới hạn, miễn phí và an toàn', NULL, '2019-01-25 16:56:44'),
	(5, 'description', 'Ứng dụng lõi của mọi phần mềm và hệ thống', NULL, '2019-01-25 16:56:44'),
	(6, 'language', 'N/A', NULL, '2019-01-25 16:56:44'),
	(7, 'phone', '943793984', NULL, '2019-01-25 16:56:44'),
	(8, 'twitter', 'fb.com/admin', NULL, '2019-01-25 16:56:44'),
	(9, 'email', 'nguyenlongit95@gmail.com', NULL, '2019-01-25 16:56:44'),
	(10, 'facebook', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', NULL, '2019-01-25 16:56:44'),
	(11, 'logo', '/storage/userfiles/images/nencer.png', NULL, '2019-01-25 16:56:44'),
	(12, 'hotline', '0123456789', NULL, '2019-01-25 16:56:44'),
	(13, 'backendname', 'AdminLTE', NULL, '2019-01-25 16:56:44'),
	(14, 'backendlang', 'N/A', NULL, '2019-01-25 16:56:44'),
	(15, 'copyright', 'Website đang chờ xin giấy phép của bộ TTTT.', NULL, '2019-01-25 16:56:44'),
	(16, 'timezone', 'Asia/Ho_Chi_Minh', NULL, '2019-01-25 16:56:44'),
	(17, 'googleplus', 'fb.com/admin', NULL, '2019-01-25 16:56:44'),
	(18, 'websitestatus', 'ONLINE', NULL, '2019-01-25 16:56:44'),
	(19, 'address', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', '2018-08-21 10:53:44', '2019-01-25 16:56:44'),
	(21, 'default_user_group', '2', '2018-08-21 11:06:25', '2019-01-25 16:56:44'),
	(22, 'twofactor', 'none', '2018-09-05 21:17:56', '2019-01-25 16:56:44'),
	(23, 'fronttemplate', 'default', '2018-09-25 13:29:14', '2019-01-25 16:56:44'),
	(24, 'offline_mes', 'Website đang bảo trì!', NULL, '2019-01-25 16:56:44'),
	(25, 'smsprovider', 'none', '2018-10-09 17:17:08', '2019-01-25 16:56:44'),
	(26, 'youtube', 'https://www.youtube.com/watch?v=neCmEbI2VWg', NULL, '2019-01-25 16:56:44'),
	(27, 'globalpopup', '0', NULL, '2019-01-25 16:56:44'),
	(28, 'globalpopup_mes', '<p>Chưa c&oacute; nội dung g&igrave;</p>', NULL, '2019-01-25 16:56:44'),
	(29, 'social_login', '0', NULL, '2019-01-25 16:56:44'),
	(30, 'google_analytic_id', '30', NULL, '2019-01-25 16:56:44'),
	(31, 'header_js', 'N/A', NULL, '2019-01-25 16:56:44'),
	(32, 'footer_js', 'N/A', NULL, '2019-01-25 16:56:44'),
	(33, 'home_tab_active', 'Softcard', NULL, '2019-01-25 16:56:44'),
	(34, 'fileSecretkey', '12345678', NULL, NULL),
	(35, 'affiliate', 'http://localhost/core/public/user/register/', NULL, '2019-01-14 15:33:48'),
	(36, 'top_bg', 'N/A', '2019-01-23 13:42:05', '2019-01-25 16:56:44'),
	(37, 'slide_bg', 'N/A', '2019-01-23 13:42:05', '2019-01-25 16:56:44'),
	(38, 'footer_bg', 'N/A', '2019-01-23 13:42:05', '2019-01-25 16:56:44'),
	(39, 'top_color', 'N/A', '2019-01-23 13:42:05', '2019-01-25 16:56:44'),
	(40, 'allow_transfer', '0', '2019-01-23 13:42:05', '2019-01-25 16:56:44'),
	(41, 'type_slider', 'slider', '2019-01-23 13:42:05', '2019-01-25 16:56:44'),
	(42, 'countdown', '30', NULL, '2019-01-25 16:56:44'),
	(43, 'footerlogo', '/storage/userfiles/images/nencer-logo-gray.png', NULL, NULL),
	(44, 'logo', '/storage/userfiles/images/nencer-logo.png', NULL, '2020-12-02 06:37:56');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `display` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.sliders: ~0 rows (approximately)
DELETE FROM `sliders`;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `image`, `display`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'b1.png', 1, '2022-07-14 08:45:03', NULL, NULL);
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.slogans
CREATE TABLE IF NOT EXISTS `slogans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slogan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table trungtamtienganh.slogans: ~0 rows (approximately)
DELETE FROM `slogans`;
/*!40000 ALTER TABLE `slogans` DISABLE KEYS */;
INSERT INTO `slogans` (`id`, `slogan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'This Is The New Way\r\nTo Learn Online', NULL, NULL, NULL);
/*!40000 ALTER TABLE `slogans` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2' COMMENT '0: admin 1: nhan vien',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trungtamtienganh.users: 3 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'NguyenLong', 'nguyenlongit95@gmail.com', '2020-12-02 00:00:00', '$2y$10$bBApcwZ.BMKx8TztYV0p.Omtlx.Ew86gFGza4lZWOiG50C.Ts9tw.', NULL, 0, NULL, '2020-12-02 07:50:30'),
	(2, 'LongNguyen', 'admin@local.com', NULL, '$2y$10$bBApcwZ.BMKx8TztYV0p.Omtlx.Ew86gFGza4lZWOiG50C.Ts9tw.', NULL, 0, '2020-12-07 08:08:58', '2020-12-07 08:08:58'),
	(3, 'NhanVien1', 'nhanvien1@gmail.com', '2021-03-22 00:00:00', '$2y$10$J5S5sUMXp23V9xE44Fkn6OYABxbwgPcneNFOuf7ht7TMUjkfxg7FS', NULL, 1, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table trungtamtienganh.voucher
CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_voucher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giam_gia` int(11) DEFAULT NULL COMMENT 'Tính theo %',
  `thoi_gian_het_han` timestamp NULL DEFAULT NULL,
  `trang_thai_su_dung` int(11) NOT NULL DEFAULT '1' COMMENT '0: chua su dung 1: da su dung',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table trungtamtienganh.voucher: 1 rows
DELETE FROM `voucher`;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
INSERT INTO `voucher` (`id`, `ten`, `ma_voucher`, `giam_gia`, `thoi_gian_het_han`, `trang_thai_su_dung`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Tiếng Anh Cơ bản 1', 'EngBasic1', 10, '2022-09-12 00:00:00', 1, '2022-05-04 03:51:04', '2022-05-04 03:51:04', NULL);
/*!40000 ALTER TABLE `voucher` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
