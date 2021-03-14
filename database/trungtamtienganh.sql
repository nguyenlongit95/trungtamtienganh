-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2021 lúc 04:37 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trungtamtienganh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canh_bao`
--

CREATE TABLE `canh_bao` (
  `id` int(11) NOT NULL,
  `ma_hoc_vien` int(11) NOT NULL,
  `loai_canh_bao` int(11) NOT NULL COMMENT '1: Nghỉ học, 2: Điểm thấp 3: Không làm bài tập 4: Không tập trung',
  `noi_dung_canh_bao` text COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_canh_bao` timestamp NULL DEFAULT NULL,
  `tinh_trang_canh_bao` int(11) NOT NULL COMMENT '0: chua canh bao 1: da canh bao',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `canh_bao`
--

INSERT INTO `canh_bao` (`id`, `ma_hoc_vien`, `loai_canh_bao`, `noi_dung_canh_bao`, `thoi_gian_canh_bao`, `tinh_trang_canh_bao`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'Nghỉ học 3 buổi rồi nhé', '2021-03-23 17:00:00', 0, '2021-03-13 20:33:08', '2021-03-13 20:33:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_so`
--

CREATE TABLE `diem_so` (
  `id` int(11) NOT NULL,
  `ma_qua_trinh_hoc` int(11) NOT NULL,
  `thoi_gian` timestamp NULL DEFAULT current_timestamp(),
  `diem` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem_so`
--

INSERT INTO `diem_so` (`id`, `ma_qua_trinh_hoc`, `thoi_gian`, `diem`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-03-09 17:00:00', 9, '2021-03-11 06:54:16', '2021-03-11 06:54:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` int(11) NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `truong_dai_hoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`id`, `ten`, `tuoi`, `dia_chi`, `ma_mon_hoc`, `truong_dai_hoc`, `so_dien_thoai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LongNguyen', 26, 'ha Noi', '1', 'PTIT', '0393803548', '2021-03-10 09:17:52', '2021-03-10 09:17:52', NULL),
(2, 'Thanh Nhàn', 25, 'Ứng Hoà, Hà Nội', '3', 'Học Viện Công Nghệ Bưu Chính Viễn Thông', '03216548912', '2021-03-11 02:33:22', '2021-03-11 02:42:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_phi`
--

CREATE TABLE `hoc_phi` (
  `id` int(11) NOT NULL,
  `ma_hoc_vien` int(11) NOT NULL,
  `ma_lop_hoc` int(11) NOT NULL,
  `hoc_phi` int(11) NOT NULL,
  `tinh_trang_nop_hoc_phi` int(11) NOT NULL DEFAULT 0 COMMENT '1: da nop 0: chua nop',
  `ngay_nop_hoc_phi` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_phi`
--

INSERT INTO `hoc_phi` (`id`, `ma_hoc_vien`, `ma_lop_hoc`, `hoc_phi`, `tinh_trang_nop_hoc_phi`, `ngay_nop_hoc_phi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 405000, 1, '2021-03-12 19:39:50', '2021-03-11 00:36:25', '2021-03-12 19:39:50', NULL),
(2, 3, 3, 5500000, 1, '2021-03-13 19:51:43', '2021-03-13 19:41:11', '2021-03-13 19:51:43', NULL),
(3, 1, 3, 5500000, 1, '2021-03-13 19:45:40', '2021-03-13 19:41:24', '2021-03-13 19:45:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_vien`
--

CREATE TABLE `hoc_vien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten_phu_huynh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `truong_hoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_vien`
--

INSERT INTO `hoc_vien` (`id`, `ten`, `tuoi`, `email`, `dia_chi`, `thong_tin`, `so_dien_thoai`, `ten_phu_huynh`, `truong_hoc`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LongNguyen', 26, 'nguyenlongit95@gmail.com', 'Ngọc Trục, Đại Mỗ, Nam Từ Liêm, Hà Nội', 'Đang làm tại Co-well Asia', '0393803548', 'Nguyễn Công Tường', 'PTIT', 0, '2021-03-09 21:26:15', '2021-03-09 21:51:55', NULL),
(2, 'Thanh Nhan', 25, 'thanhnhan030796@gmail.com', 'Ha Noi', 'Đang làm tại Viettel', '123456789', 'Phạm Thị Nhâm', 'PTIT', 1, '2021-03-09 21:46:38', '2021-03-09 21:46:38', NULL),
(3, 'HocVIenTest1', 25, 'hocvientest1@gmail.com', 'Ha Noi', 'asd', '5463218912', 'aaaa', 'PTIT', 1, '2021-03-13 19:28:23', '2021-03-13 19:28:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id` int(11) NOT NULL,
  `ten_lop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_lop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_giang_vien` int(11) NOT NULL,
  `so_hoc_vien` int(11) NOT NULL,
  `thoi_gian_bat_dau` timestamp NULL DEFAULT NULL,
  `thoi_gian_ket_thuc` timestamp NULL DEFAULT NULL,
  `gio_vao_lop` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gio_tan_lop` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lich_hoc` text COLLATE utf8_unicode_ci NOT NULL,
  `hoc_phi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id`, `ten_lop`, `ma_lop`, `thong_tin`, `ma_mon_hoc`, `ma_giang_vien`, `so_hoc_vien`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `gio_vao_lop`, `gio_tan_lop`, `lich_hoc`, `hoc_phi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kỹ thuật lập tình bài 1', 'KTLTB1', 'Đào tạo kỹ thuật lập trình cơ bản', '1', 1, 45, '2021-03-09 17:00:00', '2021-03-30 17:00:00', '2021-03-10 00:00:00', '2021-03-26 00:00:00', '[\"3\",\"4\"]', 400000, '2021-03-10 02:35:01', '2021-03-10 02:35:01', NULL),
(2, 'C++ và hướng đối tượng', 'COOP', 'Ngôn ngữ lập trình và lập trình hướng đối tượng', '3', 1, 20, '2021-03-10 17:00:00', '2021-03-30 17:00:00', '2021-03-11 00:00:00', '2021-03-16 00:00:00', '[\"3\",\"4\"]', 450000, '2021-03-10 02:41:57', '2021-03-10 02:41:57', NULL),
(3, 'Lập trình web cơ bản', 'WEBBASIC', 'Lập trình web với html và css', '1', 1, 99, '2021-03-13 17:00:00', '2021-03-30 17:00:00', '23:38', '01:40', '[\"2\"]', 5500000, '2021-03-13 19:38:15', '2021-03-13 19:38:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong_giang_vien`
--

CREATE TABLE `luong_giang_vien` (
  `id` int(11) NOT NULL,
  `ma_giang_vien` int(11) NOT NULL,
  `ngay_tra_luong` timestamp NULL DEFAULT NULL,
  `luong` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luong_giang_vien`
--

INSERT INTO `luong_giang_vien` (`id`, `ma_giang_vien`, `ngay_tra_luong`, `luong`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-03-17 17:00:00', 7000000, '2021-03-11 10:04:25', '2021-03-11 10:04:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_mon_hoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ten`, `ma_mon_hoc`, `thong_tin`, `created_at`, `updated_at`) VALUES
(1, 'Kỹ thuật lập trình', 'KTLT', 'Đào tạo kỹ thuật lập trình cho sinh viên', '2021-03-10 01:29:38', '2021-03-10 01:29:38'),
(2, 'Kỹ thuật lập trình', 'KTLTK1', 'Đào tạo kỹ thuật lập trình cho sinh viên và người đã đi làm và người già', '2021-03-10 01:36:48', '2021-03-10 01:37:58'),
(3, 'Ngôn ngữ lập trình C++', 'CPP', 'Lập trình C++ cơ bản cho người mới bắt đầu', '2021-03-10 01:45:02', '2021-03-10 01:45:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paygates`
--

CREATE TABLE `paygates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `configs` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `paygates`
--

INSERT INTO `paygates` (`id`, `name`, `code`, `url`, `configs`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Ngân Lượng', 'nganluong', 'https://www.nganluong.vn/checkout.php', '{\"currency\":\"USD\",\"MERCHANT_PASS\":\"Ax1L0GR3sB3f4kHQAj1JtIAWcuvgArQlNyrqcGCbdvLzGJ6nSHm8l2kF\",\"MERCHANT_ID\":\"Q3FZWYGFYLG8WDGW\",\"RECEIVER\":\"sb-3rtbb3863326_api1.business.example.com\"}', '', '2020-11-27 02:58:17', '2020-12-01 03:44:21', NULL),
(3, 'VNPAY', 'vnpay', 'http://sandbox.vnpayment.vn/paymentv2/vpcpay.html', '{\"currency\":\"VND\",\"vnp_TmnCode\":\"Ax1L0GR3sB3f4kHQAj1JtIAWcuvgArQlNyrqcGCbdvLzGJ6nSHm8l2kF\",\"vnp_HashSecret\":\"Q3FZWYGFYLG8WDGW\"}', '', '2020-12-02 02:49:33', '2020-12-02 02:49:33', NULL),
(4, 'PayPal', 'paypal', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=', '{\"API_USERNAME\":\"sb-nlqij3868487_api1.business.example.com\",\"API_PASSWORD\":\"R9SRY8RF3CCSNE3P\",\"API_SIGNATURE\":\"A3CZZ6twi-WT-7ZwGQua95N4-iDJAoXTkTDd9WQ7kUjYBGT3y8pqxT4D\", \"VERSION\" : \"53.0\"}', '', '2020-12-07 09:22:36', '2020-12-07 09:22:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qua_trinh_hoc`
--

CREATE TABLE `qua_trinh_hoc` (
  `id` int(11) NOT NULL,
  `ma_mon_hoc` int(11) NOT NULL,
  `ma_lop_hoc` int(11) DEFAULT NULL,
  `ma_hoc_vien` int(11) NOT NULL,
  `thoi_gian_hoc` timestamp NULL DEFAULT NULL,
  `diem_so` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `thong_tin` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Các lưu ý của giảng viên với học viên này',
  `tinh_trang_hoc` int(11) NOT NULL COMMENT '1: tốt 2: trung bình 3: không tốt',
  `hoc_phi` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `qua_trinh_hoc`
--

INSERT INTO `qua_trinh_hoc` (`id`, `ma_mon_hoc`, `ma_lop_hoc`, `ma_hoc_vien`, `thoi_gian_hoc`, `diem_so`, `thong_tin`, `tinh_trang_hoc`, `hoc_phi`, `created_at`, `updated_at`) VALUES
(4, 3, 2, 1, '2021-03-10 17:00:00', NULL, ' ', 1, NULL, '2021-03-11 00:36:25', '2021-03-11 00:36:25'),
(3, 3, 2, 2, '2021-03-10 17:00:00', NULL, ' ', 1, NULL, '2021-03-11 00:29:27', '2021-03-11 00:29:27'),
(5, 1, 3, 3, '2021-03-13 17:00:00', NULL, ' ', 1, NULL, '2021-03-13 19:41:11', '2021-03-13 19:41:11'),
(6, 1, 3, 1, '2021-03-13 17:00:00', NULL, ' ', 1, NULL, '2021-03-13 19:41:24', '2021-03-13 19:41:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(250) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'favicon', '/storage/userfiles/images/nencer-fav.png', NULL, '2019-01-25 09:56:44'),
(2, 'backendlogo', '/storage/userfiles/images/nencer-logo.png', NULL, '2019-01-25 09:56:44'),
(3, 'name', 'Long Nguyen', NULL, '2019-01-25 09:56:44'),
(4, 'title', 'Upload lưu trữ file không giới hạn, miễn phí và an toàn', NULL, '2019-01-25 09:56:44'),
(5, 'description', 'Ứng dụng lõi của mọi phần mềm và hệ thống', NULL, '2019-01-25 09:56:44'),
(6, 'language', 'N/A', NULL, '2019-01-25 09:56:44'),
(7, 'phone', '943793984', NULL, '2019-01-25 09:56:44'),
(8, 'twitter', 'fb.com/admin', NULL, '2019-01-25 09:56:44'),
(9, 'email', 'nguyenlongit95@gmail.com', NULL, '2019-01-25 09:56:44'),
(10, 'facebook', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', NULL, '2019-01-25 09:56:44'),
(11, 'logo', '/storage/userfiles/images/nencer.png', NULL, '2019-01-25 09:56:44'),
(12, 'hotline', '0123456789', NULL, '2019-01-25 09:56:44'),
(13, 'backendname', 'AdminLTE', NULL, '2019-01-25 09:56:44'),
(14, 'backendlang', 'N/A', NULL, '2019-01-25 09:56:44'),
(15, 'copyright', 'Website đang chờ xin giấy phép của bộ TTTT.', NULL, '2019-01-25 09:56:44'),
(16, 'timezone', 'Asia/Ho_Chi_Minh', NULL, '2019-01-25 09:56:44'),
(17, 'googleplus', 'fb.com/admin', NULL, '2019-01-25 09:56:44'),
(18, 'websitestatus', 'ONLINE', NULL, '2019-01-25 09:56:44'),
(19, 'address', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', '2018-08-21 03:53:44', '2019-01-25 09:56:44'),
(21, 'default_user_group', '2', '2018-08-21 04:06:25', '2019-01-25 09:56:44'),
(22, 'twofactor', 'none', '2018-09-05 14:17:56', '2019-01-25 09:56:44'),
(23, 'fronttemplate', 'default', '2018-09-25 06:29:14', '2019-01-25 09:56:44'),
(24, 'offline_mes', 'Website đang bảo trì!', NULL, '2019-01-25 09:56:44'),
(25, 'smsprovider', 'none', '2018-10-09 10:17:08', '2019-01-25 09:56:44'),
(26, 'youtube', 'https://www.youtube.com/watch?v=neCmEbI2VWg', NULL, '2019-01-25 09:56:44'),
(27, 'globalpopup', '0', NULL, '2019-01-25 09:56:44'),
(28, 'globalpopup_mes', '<p>Chưa c&oacute; nội dung g&igrave;</p>', NULL, '2019-01-25 09:56:44'),
(29, 'social_login', '0', NULL, '2019-01-25 09:56:44'),
(30, 'google_analytic_id', '30', NULL, '2019-01-25 09:56:44'),
(31, 'header_js', 'N/A', NULL, '2019-01-25 09:56:44'),
(32, 'footer_js', 'N/A', NULL, '2019-01-25 09:56:44'),
(33, 'home_tab_active', 'Softcard', NULL, '2019-01-25 09:56:44'),
(34, 'fileSecretkey', '12345678', NULL, NULL),
(35, 'affiliate', 'http://localhost/core/public/user/register/', NULL, '2019-01-14 08:33:48'),
(36, 'top_bg', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(37, 'slide_bg', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(38, 'footer_bg', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(39, 'top_color', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(40, 'allow_transfer', '0', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(41, 'type_slider', 'slider', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(42, 'countdown', '30', NULL, '2019-01-25 09:56:44'),
(43, 'footerlogo', '/storage/userfiles/images/nencer-logo-gray.png', NULL, NULL),
(44, 'logo', '/storage/userfiles/images/nencer-logo.png', NULL, '2020-12-01 23:37:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'NguyenLong', 'nguyenlongit95@gmail.com', '2020-12-01 17:00:00', '$2y$10$/XiVXPWQ5Ol2RmUitWDmKebYsyMJfoS/ohx8Z5NTLbDd6zoot53fe', NULL, 0, NULL, '2020-12-02 00:50:30'),
(2, 'LongNguyen', 'admin@local.com', NULL, '$2y$10$J5S5sUMXp23V9xE44Fkn6OYABxbwgPcneNFOuf7ht7TMUjkfxg7FS', NULL, 0, '2020-12-07 01:08:58', '2020-12-07 01:08:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_voucher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giam_gia` int(11) DEFAULT NULL COMMENT 'Tính theo %',
  `thoi_gian_het_han` timestamp NULL DEFAULT NULL,
  `trang_thai_su_dung` int(11) NOT NULL DEFAULT 1 COMMENT '0: chua su dung 1: da su dung',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `ten`, `ma_voucher`, `giam_gia`, `thoi_gian_het_han`, `trang_thai_su_dung`, `created_at`, `updated_at`) VALUES
(2, 'Giảm 10% cho môn C++', '10PCPP', 10, '2021-03-30 17:00:00', 0, '2021-03-11 19:32:49', '2021-03-11 19:32:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `canh_bao`
--
ALTER TABLE `canh_bao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diem_so`
--
ALTER TABLE `diem_so`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoc_phi`
--
ALTER TABLE `hoc_phi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoc_vien`
--
ALTER TABLE `hoc_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luong_giang_vien`
--
ALTER TABLE `luong_giang_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `paygates`
--
ALTER TABLE `paygates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qua_trinh_hoc`
--
ALTER TABLE `qua_trinh_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `canh_bao`
--
ALTER TABLE `canh_bao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `diem_so`
--
ALTER TABLE `diem_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoc_phi`
--
ALTER TABLE `hoc_phi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoc_vien`
--
ALTER TABLE `hoc_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `luong_giang_vien`
--
ALTER TABLE `luong_giang_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `paygates`
--
ALTER TABLE `paygates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `qua_trinh_hoc`
--
ALTER TABLE `qua_trinh_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
