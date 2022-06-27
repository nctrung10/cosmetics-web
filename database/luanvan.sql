-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 04:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(11) NOT NULL,
  `chude` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mota_ngan` text NOT NULL,
  `noidung` text NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id`, `chude`, `slug`, `mota_ngan`, `noidung`, `hinhanh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Bí quyết chăm sóc da vùng chữ T', 'bi-quyet-cham-soc-da-vung-chu-t', '<p>Bạn đang mệt mỏi với <strong>v&ugrave;ng chữ T</strong> l&uacute;c n&agrave;o cũng b&oacute;ng dầu? Việc kiểm so&aacute;t dầu c&oacute; thể hơi kh&oacute; khăn, nhưng kh&ocirc;ng phải l&agrave; ho&agrave;n to&agrave;n kh&ocirc;ng thể. Đọc tiếp v&agrave; kh&aacute;m ph&aacute; c&aacute;c mẹo chăm s&oacute;c da để kiểm so&aacute;t dầu v&ugrave;ng chữ T nh&eacute;!</p>', '<h2>V&ugrave;ng chữ T l&agrave; g&igrave;?</h2>\r\n\r\n<p>L&agrave; v&ugrave;ng h&igrave;nh chữ T tr&ecirc;n khu&ocirc;n mặt bao gồm tr&aacute;n, mũi, cằm v&agrave; v&ugrave;ng xung quanh miệng. Thường th&igrave; khu vực n&agrave;y sẽ tiết dầu nhiều hơn c&aacute;c phần c&ograve;n lại tr&ecirc;n gương măt, c&ograve;n l&yacute; do th&igrave; Watsons sẽ tiết lộ ở phần sau nha!</p>\r\n\r\n<h2>V&igrave; sao ch&uacute;ng lại đổ dầu?</h2>\r\n\r\n<p>V&igrave; c&aacute;c tuyến b&atilde; nhờn tập trung xung quanh. Khi c&aacute;c tuyến b&atilde; nhờn hoạt động qu&aacute; mức sẽ tiết ra nhiều b&atilde; nhờn hơn khiến v&ugrave;ng n&agrave;y trở n&ecirc;n b&oacute;ng dầu. Dưới đ&acirc;y l&agrave; những l&yacute; do rất c&oacute; thể khiến c&aacute;c tuyến b&atilde; nhờn hoạt động qu&aacute; mức</p>\r\n\r\n<ul>\r\n	<li>Gen di truyền</li>\r\n	<li>Độ ẩm</li>\r\n	<li>Thời tiết n&oacute;ng</li>\r\n	<li>Rửa mặt qu&aacute; nhiều</li>\r\n	<li>Lựa chọn sai sản phẩm chăm s&oacute;c da / trang điểm</li>\r\n	<li>Chế độ ăn kh&ocirc;ng tốt</li>\r\n	<li>Thay đổi nội tiết tố</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://www.watsons.vn/blog/wp-content/uploads/1125_main-banner-adaptation.jpg\" /></p>\r\n\r\n<h2>C&aacute;ch khắc phục</h2>\r\n\r\n<p>Đ&acirc;y l&agrave; những g&igrave; bạn cần l&agrave;m để gi&agrave;nh chiến thắng trong cuộc chiến với v&ugrave;ng chữ T b&oacute;ng nhờn của m&igrave;nh v&agrave; loại bỏ dầu thừa một c&aacute;ch hiệu quả.</p>\r\n\r\n<ul>\r\n	<li>Chọn sữa rửa mặt dạng gel hoặc tạo bọt thay v&igrave; sử dụng c&aacute;c sản phẩm c&oacute; chứa cồn</li>\r\n	<li>Sử dụng <strong>toner</strong>&nbsp;(nước hoa hồng) kh&ocirc;ng chứa cồn trong chế độ chăm s&oacute;c da của bạn</li>\r\n	<li><a href=\"http://127.0.0.1:8000/tay-te-bao-chet\"><span style=\"color:#16a085\"><u>Tẩy tế b&agrave;o chế</u>t</span></a>&nbsp;v&agrave; l&agrave;m th&ocirc;ng tho&aacute;ng da của bạn &iacute;t nhất một lần một tuần để l&agrave;m sạch tế b&agrave;o da chết, mụn đầu trắng v&agrave; dầu thừa t&iacute;ch tụ</li>\r\n	<li>Sử dụng kem dưỡng ẩm gốc nước / kh&ocirc;ng dầu</li>\r\n	<li>Mang theo giấy thấm dầu b&ecirc;n m&igrave;nh</li>\r\n</ul>', 'blog-skincare-vung-chu-t.jpg', 1, '2021-11-26 02:12:07', '2021-11-27 06:12:55'),
(2, 'Có nên đắp mặt nạ giấy mỗi ngày?', 'co-nen-dap-mat-na-giay-moi-ngay', '<p>Bạn c&oacute; thể đ&atilde; nghe n&oacute;i về điều n&agrave;y, đặc biệt l&agrave; ở H&agrave;n Quốc, việc đắp mặt nạ giấy h&agrave;ng ng&agrave;y l&agrave; điều b&igrave;nh thường, họ tin rằng đ&oacute; l&agrave; c&aacute;ch hiệu quả nhất để giữ cho l&agrave;n da mềm mịn, rạng rỡ v&agrave; sạch mụn. Bạn đang tự hỏi liệu c&oacute; n&ecirc;n sử dụng mặt nạ giấy mỗi ng&agrave;y? Ch&uacute;ng m&igrave;nh đ&atilde; xin &yacute; kiến một v&agrave;i b&aacute;c sĩ da liễu về điều n&agrave;y, v&agrave; c&acirc;u trả lời l&agrave; c&oacute;, nhưng đi k&egrave;m với một số lưu &yacute; nhỏ. C&ugrave;ng đọc tiếp để t&igrave;m hiểu nh&eacute;!</p>', '<h2>Kh&ocirc;ng n&ecirc;n d&ugrave;ng mặt nạ giấy c&oacute; chứa axit mỗi ng&agrave;y</h2>\r\n\r\n<p>C&aacute;c b&aacute;c sĩ da liễu n&oacute;i với rằng bạn n&ecirc;n sử dụng mặt nạ giấy mỗi ng&agrave;y nếu đ&oacute; kh&ocirc;ng phải l&agrave; mặt nạ chứa axit glycolic. Mặt nạ giấy c&oacute; nh&atilde;n &ldquo;chống l&atilde;o h&oacute;a&rdquo;, thường được pha chế với axit glycolic để tẩy tế b&agrave;o chết. Axit glycolic l&agrave; một chất tự nhi&ecirc;n, khi được sử dụng trong c&aacute;c sản phẩm chăm s&oacute;c da n&oacute; sẽ cung cấp c&aacute;c lợi &iacute;ch từ việc trẻ h&oacute;a l&agrave;n da đến dưỡng ẩm. Tuy nhi&ecirc;n, nếu nồng độ axit qu&aacute; cao th&igrave; kh&ocirc;ng n&ecirc;n sử dụng h&agrave;ng ng&agrave;y v&igrave; c&oacute; thể g&acirc;y k&iacute;ch ứng.</p>\r\n\r\n<p><img alt=\"A picture containing person, indoor, wall\r\n\r\nDescription automatically generated\" src=\"https://lh5.googleusercontent.com/q8Wo5Xp4X7T9B09HeK6qYjMj9cqoIXmB02UYW5gpz77s3l1PDbYivYjRQfhq-Z-_RG6vQCcD4z_f7LldhB2bjc4PS47MH8TiHgvTMpJyZC1gLa6MDj2u9ASRJog5fxMpAhF89L8=s0\" /></p>\r\n\r\n<h2>Lưu &yacute; cho những l&agrave;n da dễ l&ecirc;n mụn</h2>\r\n\r\n<p>Những người c&oacute; l&agrave;n da dễ bị mụn kh&ocirc;ng n&ecirc;n sử dụng mặt nạ giấy mỗi ng&agrave;y v&igrave; chất liệu của mặt nạ giấy đ&ocirc;i khi c&oacute; thể g&acirc;y b&iacute; tắc lỗ ch&acirc;n l&ocirc;ng v&agrave; dẫn đến t&igrave;nh trạng mụn trầm trọng hơn. Thay v&agrave;o đ&oacute;, c&aacute;c b&aacute;c sĩ da liễu khuy&ecirc;n bạn chỉ n&ecirc;n sử dụng mặt nạ giấy mỗi tuần một lần nếu bạn c&oacute; l&agrave;n da dễ l&ecirc;n mụn.</p>\r\n\r\n<h2>Lợi &iacute;ch của việc đắp mặt nạ giấy mỗi ng&agrave;y</h2>\r\n\r\n<p>Sử dụng mặt nạ giấy mỗi ng&agrave;y c&oacute; thể gi&uacute;p tăng cường độ ẩm cho da của bạn. Bằng việc sử dụng h&agrave;ng ng&agrave;y, bạn c&oacute; thể tận hưởng kết quả tương tự như d&ugrave;ng kem dưỡng ẩm lu&ocirc;n đ&oacute;!</p>\r\n\r\n<p><img alt=\"A person holding the face\r\n\r\nDescription automatically generated with low confidence\" src=\"https://lh4.googleusercontent.com/OZhxb-w8u25SnVNFPAiSapT2Ib2LeS8vCsywl_hPtFAIR6SBLDrY3ns3z-6CH9A1iBjDiwUPwFNqMiim_OPEigSjqSr2ZjL9vWQztuIsNHV7Yu8jDqK0ZR0tnXKUBbBBMlWk7MQ=s0\" /></p>\r\n\r\n<p>Hơn nữa, nếu bạn c&oacute; l&agrave;n da nhạy cảm, sử dụng mặt nạ giấy c&oacute; thể giảm nguy cơ k&iacute;ch ứng da v&igrave; ch&uacute;ng thường chứa &iacute;t chất bảo quản hơn.</p>', 'blog-co-nen-dap-mat-na-giay-moi-ngay.jpg', 1, '2021-11-26 02:39:11', '2021-11-27 06:34:12'),
(3, 'Cách trị mụn đầu đen & đầu trắng tại nhà', 'cach-tri-mun-dau-den-dau-trang-tai-nha', '<p>Rất kh&oacute; để loại bỏ mụn đầu đen v&agrave; mụn đầu trắng. Sau khi nặn ch&uacute;ng ra, bạn sẽ t&igrave;m thấy h&agrave;ng t&aacute; thứ kh&aacute;c để giải quyết. Cả mụn đầu đen v&agrave; mụn đầu trắng đều h&igrave;nh th&agrave;nh khi lỗ ch&acirc;n l&ocirc;ng bị tắc nghẽn bởi c&aacute;c tạp chất, tế b&agrave;o da chết, b&atilde; nhờn v&agrave; vi khuẩn. H&atilde;y c&ugrave;ng Watsons kh&aacute;m ph&aacute; c&aacute;c phương ph&aacute;p gi&uacute;p bạn trị mụn đầu đen v&agrave; đầu trắng tại nh&agrave; nh&eacute;!</p>', '<h2>Lột mụn</h2>\r\n\r\n<p>Miếng lột mụn rất tốt để loại bỏ mụn đầu đen tr&ecirc;n tr&aacute;n, mũi v&agrave; cằm thường xuy&ecirc;n. C&oacute; thể d&ugrave;ng nồi hấp hoặc nồi nước s&ocirc;i để x&ocirc;ng mặt, từ đ&oacute; l&agrave;m mềm da v&agrave; mở lỗ ch&acirc;n l&ocirc;ng trước. Sau đ&oacute;, đặt miếng lột mụn v&agrave;o mũi v&agrave; để trong 10-15 ph&uacute;t. Cuối c&ugrave;ng, lột bỏ v&agrave; rửa sạch bằng nước ấm.</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh4.googleusercontent.com/8tvuaQro3cuIPWMUFtYuZEy0lMrvthz__1aPiZrV7ve0U8oF5NLNqcH70BtIP880_ZHdJwPGN2KdGo-lEFcj36w2-Jk8SebxGlrjD0EpHG4LNC64WA4_PGluKQhcELLynUa5RAk\" /></p>\r\n\r\n<h2>Tẩy da chết vật l&yacute;</h2>\r\n\r\n<p>Tẩy da chết thường xuy&ecirc;n l&agrave; c&aacute;ch tốt nhất để loại bỏ cả mụn đầu đen v&agrave; mụn đầu trắng. Bạn n&ecirc;n chọn sản phẩm tẩy tế b&agrave;o chết dịu nhẹ cho da mặt, kh&ocirc;ng c&oacute; th&agrave;nh phần g&acirc;y hại để tr&aacute;nh g&acirc;y k&iacute;ch ứng da. Tẩy tế b&agrave;o chết cho da c&oacute; thể loại bỏ c&aacute;c tạp chất, tế b&agrave;o da chết, b&atilde; nhờn v&agrave; vi khuẩn từ lỗ ch&acirc;n l&ocirc;ng. Tẩy tế b&agrave;o chết c&oacute; chứa axit salicylic đặc biệt tốt để loại bỏ mụn đầu trắng. H&atilde;y nhớ thoa kem dưỡng ẩm kh&ocirc;ng g&acirc;y mụn sau khi tẩy da chết để kh&oacute;a độ ẩm cho da v&agrave; tr&aacute;nh tắc nghẽn lỗ ch&acirc;n l&ocirc;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh5.googleusercontent.com/yF6uPKuzpjm9Q8G-zyxxT-zrrHkOs3wfqdWyEQzbX7OjRmKaccQBzU77o_jaPyS4uUaiBdz4ryHClyib6pV9FrMX9vrzUkNUN27HhMJQTFNUTPczF9fwOWi491COo1EvcUn_RC4\" /></p>\r\n\r\n<h2>Mặt nạ sạch s&acirc;u</h2>\r\n\r\n<p>Mặt nạ&nbsp;l&agrave;m sạch s&acirc;u như mặt nạ đất s&eacute;t, mặt nạ than v&agrave; mặt nạ lột c&oacute; thể l&agrave;m tan sự t&iacute;ch tụ của tế b&agrave;o da chết trong lỗ ch&acirc;n l&ocirc;ng. Ch&uacute;ng cũng c&oacute; thể hấp thụ dầu thừa để giảm lượng mụn. Cố gắng sử dụng mặt nạ l&agrave;m sạch s&acirc;u hai lần một tuần để ngăn ngừa t&igrave;nh trạng tắc nghẽn lỗ ch&acirc;n l&ocirc;ng v&agrave; gi&uacute;p l&agrave;n da của bạn tr&ocirc;ng th&ocirc;ng tho&aacute;ng hơn nh&eacute;!</p>\r\n\r\n<p><img alt=\"\" src=\"https://lh4.googleusercontent.com/0S8tMYAeLf9PbSs5Up-uknPNrnlLZEdYdf9b259D6NyuApEbN8sD9taDiI7-OO-Qyf_YybHotWuJ0zovsUKFR6tHGIAvEslspJbvQDE2vF0y60eb6jCYlVnxTBrKLrvEiluQ1jI\" /></p>', 'blog-tri-mun-dau-trang-dau-den.jpg', 1, '2021-12-17 07:46:03', '2021-12-17 07:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `link` varchar(255) DEFAULT '#' COMMENT 'lien ket den quang cao',
  `mota` varchar(200) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `ten`, `hinhanh`, `link`, `mota`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Simple for life', 'banner-simple-brand.jpg', NULL, '<p>Tham khảo ngay c&aacute;c sản phẩm từ Simple</p>', 1, '2021-11-05 18:43:36', '2021-11-05 18:43:36'),
(2, 'Khuyến mãi Noel 2021', 'banner-2.jpg', '#', '<p>Giảm gi&aacute; một số sản phẩm hot với số lượng c&oacute; hạn.</p>', 1, '2021-10-11 10:07:00', '2021-12-17 05:29:36'),
(3, 'Khuyến mãi 11/11', '', '#', 'Khuyến mãi khủng hàng loạt sản phẩm sự kiện 11/11', 0, '2021-11-05 18:32:13', '2021-11-05 11:55:37'),
(5, 'Ưu đãi hấp dẫn', 'banner-1.png', '#', '<p>Khuyến m&atilde;i sốc một số sản phẩm hot!!!</p>', 1, '2021-10-10 09:30:39', '2021-11-20 01:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `biendonggia`
--

CREATE TABLE `biendonggia` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sanpham_gia` float NOT NULL,
  `ngaycapnhat` varchar(100) NOT NULL COMMENT 'ngày lúc thêm/sửa đổi giá sản phẩm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biendonggia`
--

INSERT INTO `biendonggia` (`id`, `sanpham_id`, `sanpham_gia`, `ngaycapnhat`, `created_at`, `updated_at`) VALUES
(3, 19, 90000, '2021-11-13 19:00:37', '2021-11-13 05:00:37', '2021-11-13 05:00:37'),
(4, 23, 85000, '2021-11-09 19:01:24', '2021-11-13 05:01:24', '2021-11-13 05:01:24'),
(5, 23, 90000, '2021-11-10 19:02:01', '2021-11-13 05:02:01', '2021-11-13 05:02:01'),
(6, 23, 100000, '2021-11-12 19:02:35', '2021-11-13 05:02:35', '2021-11-13 05:02:35'),
(7, 23, 120000, '2021-11-13 19:02:45', '2021-11-13 05:02:45', '2021-11-13 05:02:45'),
(8, 15, 61000, '2021-11-16 16:25:20', '2021-11-16 02:25:20', '2021-11-16 02:25:20'),
(9, 18, 210000, '2021-11-16 16:26:01', '2021-11-16 02:26:01', '2021-11-16 02:26:01'),
(10, 15, 61000, '2021-11-16 16:26:41', '2021-11-16 02:26:41', '2021-11-16 02:26:41'),
(11, 12, 21000, '2021-11-17 02:39:53', '2021-11-16 12:39:53', '2021-11-16 12:39:53'),
(12, 12, 21000, '2021-11-17 02:45:50', '2021-11-16 12:45:50', '2021-11-16 12:45:50'),
(13, 15, 61000, '2021-11-17 02:46:38', '2021-11-16 12:46:38', '2021-11-16 12:46:38'),
(14, 15, 61000, '2021-11-17 02:46:46', '2021-11-16 12:46:46', '2021-11-16 12:46:46'),
(15, 14, 1320000, '2021-11-17 13:44:12', '2021-11-16 23:44:12', '2021-11-16 23:44:12'),
(16, 19, 93000, '2021-11-17 13:44:29', '2021-11-16 23:44:29', '2021-11-16 23:44:29'),
(17, 18, 72000, '2021-11-17 13:44:45', '2021-11-16 23:44:45', '2021-11-16 23:44:45'),
(18, 15, 62000, '2021-11-17 13:45:00', '2021-11-16 23:45:00', '2021-11-16 23:45:00'),
(19, 12, 22000, '2021-11-17 13:45:22', '2021-11-16 23:45:22', '2021-11-16 23:45:22'),
(20, 11, 280000, '2021-11-17 13:45:34', '2021-11-16 23:45:34', '2021-11-16 23:45:34'),
(21, 8, 190000, '2021-11-17 13:45:58', '2021-11-16 23:45:58', '2021-11-16 23:45:58'),
(22, 9, 65000, '2021-11-17 13:46:57', '2021-11-16 23:46:57', '2021-11-16 23:46:57'),
(23, 7, 75000, '2021-11-17 13:47:09', '2021-11-16 23:47:09', '2021-11-16 23:47:09'),
(24, 3, 178000, '2021-11-17 13:47:27', '2021-11-16 23:47:27', '2021-11-16 23:47:27'),
(25, 24, 100000, '2021-11-20 16:01:28', '2021-11-20 02:01:28', '2021-11-20 02:01:28'),
(26, 24, 100000, '2021-11-20 16:04:35', '2021-11-20 02:04:35', '2021-11-20 02:04:35'),
(27, 24, 100000, '2021-11-20 16:11:38', '2021-11-20 02:11:38', '2021-11-20 02:11:38'),
(28, 14, 1320000, '2021-11-20 16:14:14', '2021-11-20 02:14:14', '2021-11-20 02:14:14'),
(29, 18, 72000, '2021-11-21 23:29:59', '2021-11-21 09:29:59', '2021-11-21 09:29:59'),
(30, 18, 72000, '2021-11-21 23:30:33', '2021-11-21 09:30:33', '2021-11-21 09:30:33'),
(31, 18, 72000, '2021-11-21 23:34:02', '2021-11-21 09:34:02', '2021-11-21 09:34:02'),
(32, 18, 72000, '2021-11-21 23:34:27', '2021-11-21 09:34:27', '2021-11-21 09:34:27'),
(33, 19, 93000, '2021-11-21 23:54:26', '2021-11-21 09:54:26', '2021-11-21 09:54:26'),
(34, 23, 120000, '2021-11-22 00:03:22', '2021-11-21 10:03:22', '2021-11-21 10:03:22'),
(35, 18, 75000, '2021-11-22 15:58:55', '2021-11-22 01:58:55', '2021-11-22 01:58:55'),
(36, 8, 190000, '2021-12-09 14:45:38', '2021-12-09 00:45:38', '2021-12-09 00:45:38'),
(37, 8, 185000, '2021-12-09 14:46:04', '2021-12-09 00:46:04', '2021-12-09 00:46:04'),
(38, 18, 80000, '2021-12-09 14:47:17', '2021-12-09 00:47:17', '2021-12-09 00:47:17'),
(39, 12, 22000, '2021-12-09 14:48:14', '2021-12-09 00:48:14', '2021-12-09 00:48:14'),
(40, 12, 28000, '2021-12-09 14:48:38', '2021-12-09 00:48:38', '2021-12-09 00:48:38'),
(41, 14, 1320000, '2021-12-09 15:06:39', '2021-12-09 01:06:39', '2021-12-09 01:06:39'),
(42, 3, 178000, '2021-12-10 12:30:12', '2021-12-09 22:30:12', '2021-12-09 22:30:12'),
(43, 14, 1320000, '2021-12-10 12:30:47', '2021-12-09 22:30:47', '2021-12-09 22:30:47'),
(44, 11, 272000, '2021-12-10 12:32:34', '2021-12-09 22:32:34', '2021-12-09 22:32:34'),
(45, 8, 185000, '2021-12-10 12:33:05', '2021-12-09 22:33:05', '2021-12-09 22:33:05'),
(46, 9, 65000, '2021-12-10 12:34:08', '2021-12-09 22:34:08', '2021-12-09 22:34:08'),
(47, 9, 65000, '2021-12-10 12:34:39', '2021-12-09 22:34:39', '2021-12-09 22:34:39'),
(48, 24, 100000, '2021-12-10 12:36:42', '2021-12-09 22:36:42', '2021-12-09 22:36:42'),
(49, 15, 410000, '2021-12-17 20:29:57', '2021-12-17 06:29:57', '2021-12-17 06:29:57'),
(50, 15, 410000, '2021-12-17 20:31:13', '2021-12-17 06:31:13', '2021-12-17 06:31:13'),
(51, 15, 410000, '2021-12-17 20:34:34', '2021-12-17 06:34:34', '2021-12-17 06:34:34'),
(52, 15, 410000, '2021-12-17 20:39:15', '2021-12-17 06:39:15', '2021-12-17 06:39:15'),
(53, 15, 410000, '2021-12-17 20:40:21', '2021-12-17 06:40:21', '2021-12-17 06:40:21'),
(54, 18, 80000, '2021-12-17 20:49:18', '2021-12-17 06:49:18', '2021-12-17 06:49:18'),
(55, 25, 240000, '2021-12-17 21:36:53', '2021-12-17 07:36:53', '2021-12-17 07:36:53'),
(56, 26, 160000, '2021-12-21 22:19:16', '2021-12-21 08:19:16', '2021-12-21 08:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tonggia` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `donhang_id`, `sanpham_id`, `soluong`, `tonggia`, `created_at`, `updated_at`) VALUES
(20, 16, 11, 2, 520000, '2021-11-03 04:12:28', '2021-11-03 04:12:28'),
(21, 17, 11, 3, 780000, '2021-11-03 04:22:26', '2021-11-03 04:22:26'),
(22, 18, 11, 3, 780000, '2021-11-03 04:27:20', '2021-11-03 04:27:20'),
(23, 19, 14, 1, 1359000, '2021-11-03 04:34:11', '2021-11-03 04:34:11'),
(24, 20, 14, 3, 4077000, '2021-11-03 07:27:52', '2021-11-03 07:27:52'),
(25, 21, 11, 3, 780000, '2021-11-03 07:30:50', '2021-11-03 07:30:50'),
(26, 21, 14, 1, 1359000, '2021-11-03 07:30:50', '2021-11-03 07:30:50'),
(27, 22, 11, 2, 520000, '2021-11-03 07:42:19', '2021-11-03 07:42:19'),
(28, 23, 14, 1, 1290000, '2021-11-06 03:53:16', '2021-11-06 03:53:16'),
(29, 23, 7, 1, 69000, '2021-11-06 03:53:16', '2021-11-06 03:53:16'),
(30, 24, 14, 1, 1290000, '2021-11-08 02:53:23', '2021-11-08 02:53:23'),
(31, 25, 11, 1, 260000, '2021-11-08 04:43:51', '2021-11-08 04:43:51'),
(32, 26, 8, 1, 189000, '2021-11-08 04:47:11', '2021-11-08 04:47:11'),
(33, 26, 12, 5, 105000, '2021-11-08 04:47:11', '2021-11-08 04:47:11'),
(34, 27, 9, 1, 60000, '2021-11-08 05:18:43', '2021-11-08 05:18:43'),
(35, 27, 11, 1, 260000, '2021-11-08 05:18:43', '2021-11-08 05:18:43'),
(36, 28, 11, 1, 260000, '2021-11-08 22:26:21', '2021-11-08 22:26:21'),
(39, 35, 14, 2, 2580000, '2021-11-09 03:25:11', '2021-11-09 03:25:11'),
(40, 35, 7, 1, 69000, '2021-11-09 03:25:11', '2021-11-09 03:25:11'),
(47, 174, 3, 2, 336000, '2021-11-09 11:17:06', '2021-11-09 11:17:06'),
(48, 175, 8, 1, 189000, '2021-11-10 02:17:08', '2021-11-10 02:17:08'),
(49, 175, 9, 1, 60000, '2021-11-10 02:17:08', '2021-11-10 02:17:08'),
(50, 176, 8, 3, 567000, '2021-11-13 04:06:02', '2021-11-13 04:06:02'),
(51, 177, 8, 3, 567000, '2021-11-13 04:19:25', '2021-11-13 04:19:25'),
(54, 179, 12, 5, 105000, '2021-11-15 11:23:45', '2021-11-15 11:23:45'),
(55, 179, 7, 2, 117300, '2021-11-15 11:23:45', '2021-11-15 11:23:45'),
(56, 180, 7, 2, 117300, '2021-11-16 04:17:36', '2021-11-16 04:17:36'),
(57, 181, 8, 1, 161500, '2021-11-18 19:16:52', '2021-11-18 19:16:52'),
(58, 181, 11, 1, 280000, '2021-11-18 19:16:52', '2021-11-18 19:16:52'),
(59, 182, 9, 3, 195000, '2021-11-27 07:05:21', '2021-11-27 07:05:21'),
(60, 182, 12, 10, 220000, '2021-11-27 07:05:21', '2021-11-27 07:05:21'),
(61, 183, 11, 1, 280000, '2021-11-27 07:30:47', '2021-11-27 07:30:47'),
(62, 183, 9, 2, 130000, '2021-11-27 07:30:47', '2021-11-27 07:30:47'),
(63, 184, 14, 1, 1188000, '2021-11-27 07:33:25', '2021-11-27 07:33:25'),
(64, 184, 7, 2, 135000, '2021-11-27 07:33:25', '2021-11-27 07:33:25'),
(65, 185, 8, 2, 342000, '2021-11-27 07:45:40', '2021-11-27 07:45:40'),
(66, 186, 11, 1, 280000, '2021-11-27 07:47:25', '2021-11-27 07:47:25'),
(67, 187, 8, 1, 166500, '2021-12-09 23:05:01', '2021-12-09 23:05:01'),
(68, 187, 14, 1, 1188000, '2021-12-09 23:05:01', '2021-12-09 23:05:01'),
(69, 188, 12, 5, 140000, '2021-12-09 23:05:48', '2021-12-09 23:05:48'),
(70, 188, 7, 1, 67500, '2021-12-09 23:05:48', '2021-12-09 23:05:48'),
(71, 189, 11, 1, 272000, '2021-12-15 02:47:27', '2021-12-15 02:47:27'),
(72, 190, 25, 1, 216000, '2021-12-17 07:54:06', '2021-12-17 07:54:06'),
(73, 190, 9, 1, 65000, '2021-12-17 07:54:06', '2021-12-17 07:54:06'),
(74, 191, 8, 6, 999000, '2021-12-21 08:01:31', '2021-12-21 08:01:31'),
(75, 192, 8, 3, 499500, '2021-12-21 08:08:29', '2021-12-21 08:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sosao` tinyint(5) NOT NULL DEFAULT 5,
  `binhluan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id`, `khachhang_id`, `sanpham_id`, `sosao`, `binhluan`, `created_at`, `updated_at`) VALUES
(1, 2, 14, 5, 'Sản phẩm trên cả tuyệt vời, xứng đáng đồng tiền.', '2021-11-05 04:49:56', '2021-11-05 04:49:56'),
(2, 1, 14, 5, 'Rất ưng ý', '2021-11-05 04:50:19', '2021-11-05 04:50:19'),
(3, 2, 14, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa alias perspiciatis nihil corporis odit veritatis. Quod porro, iste voluptas provident repellat sed, doloribus facilis fuga ipsum, tempora veritatis ullam dolorem?', '2021-11-05 12:37:04', '2021-11-05 12:37:04'),
(4, 4, 14, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa alias perspiciatis nihil corporis odit veritatis. Quod porro, iste voluptas provident repellat sed, doloribus facilis fuga ipsum, tempora veritatis ullam dolorem?', '2021-11-05 12:37:04', '2021-11-05 12:37:04'),
(5, 2, 14, 2, 'Sản phẩm không như mong đợi, giao hàng hơi lâu, không xứng với giá tiền.', '2021-11-05 06:19:41', '2021-11-05 06:19:41'),
(6, 5, 12, 5, 'Rất tốt', '2021-11-09 16:43:12', '2021-11-09 16:43:12'),
(7, 5, 14, 5, 'Trên cả tuyệt vời', '2021-11-09 16:45:00', '2021-11-09 16:45:00'),
(8, 2, 14, 5, 'Sản phẩm rất tốt', '2021-12-17 08:07:26', '2021-12-17 08:07:26'),
(9, 2, 8, 5, 'Sản phẩm tốt', '2021-12-21 07:56:14', '2021-12-21 07:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL COMMENT 'ten hien thi tren url',
  `trangthai` tinyint(1) NOT NULL COMMENT '1:an, 2:hien',
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`id`, `ten`, `slug`, `trangthai`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Sữa rửa mặt', 'sua-rua-mat', 1, 0, '2021-09-08 17:00:00', '2021-11-18 19:35:15'),
(2, 'Nước tẩy trang', 'nuoc-tay-trang', 1, 0, '2021-09-07 17:00:00', '2021-11-18 19:22:30'),
(4, 'Mặt nạ', 'mat-na', 1, 0, '2021-09-07 17:00:00', '2021-09-13 02:53:38'),
(5, 'Nước hoa hồng', 'nuoc-hoa-hong', 0, 0, '2021-09-08 17:00:00', '2021-11-16 12:45:00'),
(10, 'Xịt khoáng', 'xit-duong-am', 1, 0, '2021-09-09 17:00:00', '2021-09-23 03:19:39'),
(13, 'Kem chống nắng', 'kem-chong-nang', 1, 0, '2021-09-12 21:02:49', '2021-09-13 01:10:07'),
(15, 'Bông tẩy trang', 'bong-tay-trang', 0, 0, '2021-09-13 02:29:40', '2021-11-16 12:44:57'),
(17, 'Mặt nạ ngủ', 'mat-na-ngu', 1, 4, '2021-09-27 04:06:40', '2021-11-16 12:43:01'),
(18, 'Mặt nạ giấy', 'mat-na-giay', 1, 4, '2021-09-27 04:07:49', '2021-10-26 03:37:34'),
(21, 'Dưỡng vùng mắt', 'duong-vung-mat', 0, 0, '2021-09-28 02:47:44', '2021-11-16 12:44:55'),
(22, 'Tẩy tế bào chết', 'tay-te-bao-chet', 1, 0, '2021-09-28 02:50:39', '2021-11-18 19:35:53'),
(23, 'Mặt nạ lột mụn', 'mat-na-lot-mun', 1, 4, '2021-09-28 04:23:50', '2021-10-26 03:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `httt_id` int(11) NOT NULL COMMENT 'lien ket id bang hinhthucthanhtoan',
  `tenKH` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `sdt` varchar(12) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `chuthich` text DEFAULT NULL,
  `gia_giam` float NOT NULL DEFAULT 0 COMMENT 'voucher',
  `phivanchuyen` float NOT NULL DEFAULT 0,
  `tongtien` float NOT NULL DEFAULT 0,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:dang cho xu ly, 2:da xac nhan, 3:da huy',
  `ngaydathang` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `khachhang_id`, `httt_id`, `tenKH`, `email`, `sdt`, `diachi`, `chuthich`, `gia_giam`, `phivanchuyen`, `tongtien`, `trangthai`, `ngaydathang`, `created_at`, `updated_at`) VALUES
(16, 2, 1, 'Nguyen Chi Trung', 'chitrunghg111@gmail.com', '0909000777', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'zczzczczczc', 0, 0, 500000, 3, '2021-11-13', '2021-11-13 04:12:28', '2021-12-09 21:48:10'),
(17, 2, 1, 'Nguyen Chi Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'zczzczczc', 0, 0, 730000, 3, '2021-11-13', '2021-11-13 04:22:26', '2021-12-09 21:48:19'),
(18, 2, 1, 'Nguyen Chi Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'abc', 0, 0, 730000, 3, '2021-11-13', '2021-11-13 04:27:20', '2021-12-09 21:48:27'),
(19, 2, 1, 'Nguyen Chi Trung', 'chitrunghg111@gmail.com', '0909000666', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'Sáng đi', 0, 0, 1223100, 3, '2021-11-03', '2021-11-03 04:34:11', '2021-12-09 21:48:36'),
(20, 2, 1, 'Trung', 'chitrunghg111@gmail.com', '0909000999', 'Lê Lai, An Phú, Ninh Kiều, Cần Thơ', 'Giao hàng buổi sáng', 0, 0, 3977000, 3, '2021-11-03', '2021-11-03 07:27:52', '2021-12-09 21:48:44'),
(21, 2, 1, 'Nguyen Chi Trung', 'chitrunghg111@gmail.com', '0909000999', 'Lê Lai, An Phú, Ninh Kiều, Cần Thơ', 'Chiều nhe', 100000, 0, 2039000, 2, '2021-11-03', '2021-11-03 07:30:50', '2021-12-09 21:48:56'),
(22, 2, 1, 'Thinh', 'chitrunghg111@gmail.com', '0808000888', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'Giao hàng chiều', 100000, 30000, 450000, 2, '2021-11-03', '2021-11-03 07:42:19', '2021-12-09 21:49:06'),
(23, 5, 2, 'Nguyễn Bích Trâm', 'tremtrem2003@gmail.com', '0909333888', 'Rạch Gòi, Châu Thành A, Hậu Giang', 'Giao hàng buổi chiều, buổi sáng còn ngủ =))', 50000, 0, 1309000, 2, '2021-11-06', '2021-11-06 11:00:16', '2021-12-09 21:49:15'),
(24, 2, 1, 'Khang', 'khangfat99@gmail.com', '0908111888', '25 Nguyễn Trãi, Quận Ninh Kiều, Cần Thơ', 'giao hàng buổi chiều, buổi sáng còn ngủ.', 50000, 0, 1240000, 2, '2021-11-08', '2021-11-08 02:53:23', '2021-12-09 21:49:26'),
(25, 2, 2, 'Hữu Khang', 'khangfat99@gmail.com', '0908111888', '25 Nguyễn Trãi, Ninh Kiều, Cần Thơ', 'Giao hàng buổi chiều ạ', 0, 30000, 290000, 2, '2021-11-08', '2021-11-08 04:43:51', '2021-12-09 21:50:09'),
(26, 2, 1, 'Hữu Khang', 'khangfat99@gmail.com', '0908111888', '25 Nguyễn Trãi, Ninh Kiều, Cần Thơ', NULL, 0, 30000, 324000, 2, '2021-11-08', '2021-11-08 04:47:11', '2021-12-09 21:50:18'),
(27, 2, 1, 'Khang', 'khangfat99@gmail.com', '0908111888', '25 Nguyễn Trãi, Ninh Kiều, Cần Thơ', NULL, 0, 30000, 350000, 2, '2021-11-08', '2021-11-08 05:18:43', '2021-12-09 21:50:27'),
(28, 2, 1, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', NULL, 0, 30000, 290000, 2, '2021-11-09', '2021-11-08 22:26:21', '2021-12-09 21:50:33'),
(35, 2, 2, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', NULL, 50000, 0, 2599000, 2, '2021-11-09', '2021-11-09 03:24:53', '2021-12-09 21:52:44'),
(174, 2, 2, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'chiều', 50000, 30000, 316000, 2, '2021-11-09', '2021-11-09 11:17:06', '2021-12-09 21:53:01'),
(175, 2, 2, 'Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'Giao hàng chiều', 0, 30000, 279000, 2, '2021-11-10', '2021-11-10 02:17:08', '2021-12-09 21:54:53'),
(176, 2, 1, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', NULL, 0, 30000, 597000, 2, '2021-11-13', '2021-11-13 04:06:02', '2021-12-09 21:55:27'),
(177, 5, 1, 'Nguyễn Bích Trâm', 'tremtrem2003@gmail.com', '0909333888', 'Rạch Gòi, Châu Thành A, Hậu Giang', NULL, 50000, 30000, 547000, 2, '2021-11-13', '2021-11-13 04:19:25', '2021-12-09 21:55:37'),
(179, 2, 1, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'Giao hàng buổi chiều', 50000, 30000, 202300, 2, '2021-11-16', '2021-11-15 11:23:45', '2021-12-09 21:56:36'),
(180, 2, 1, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'fafafafafaf', 50000, 30000, 97300, 2, '2021-11-16', '2021-11-16 04:17:36', '2021-12-09 22:07:15'),
(181, 2, 2, 'Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', 'giao hàng buổi sáng', 50000, 30000, 421500, 2, '2021-11-19', '2021-11-18 19:16:52', '2021-12-09 22:07:26'),
(182, 2, 1, 'Trung', 'chitrunghg111@gmail.com', '0909000999', 'Lê Lai, An Phú, Ninh Kiều, Cần Thơ', 'Giao hàng chiều', 50000, 30000, 395000, 2, '2021-11-27', '2021-11-27 07:05:21', '2021-12-09 22:08:07'),
(183, 4, 2, 'Nguyễn Hữu Thoại', 'thoai2013@gmail.com', '0909220884', 'Ấp Tân Hiệp, Xã Tân Bình, Huyện Phụng Hiệp, Hậu Giang', 'Giao hàng sáng', 0, 30000, 440000, 2, '2021-11-27', '2021-11-27 07:30:47', '2021-12-09 22:08:14'),
(184, 2, 2, 'Khang', 'huynhhuukhang1607@gmail.com', '0909000999', '29 Nguyễn Trãi, Ninh Kiều, Cần Thơ', 'giao hàng trưa', 0, 0, 1323000, 2, '2021-11-27', '2021-11-27 07:33:25', '2021-12-09 22:08:22'),
(185, 2, 1, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', NULL, 0, 30000, 372000, 2, '2021-11-27', '2021-11-27 07:45:40', '2021-12-09 21:45:06'),
(186, 2, 1, 'Khang', 'chitrunghg111@gmail.com', '0909000999', 'Ấp Thị Tứ, Thị trấn Rạch gòi, Châu Thành A, Hậu Giang', NULL, 0, 30000, 310000, 3, '2021-11-27', '2021-11-27 14:47:25', '2021-12-09 21:43:52'),
(187, 4, 1, 'Nguyễn Hữu Thoại', 'thoai2013@gmail.com', '0909220884', 'Ấp Tân Hiệp, Xã Tân Bình, Huyện Phụng Hiệp, Hậu Giang', 'sáng', 50000, 0, 1304500, 2, '2021-12-10', '2021-12-10 06:05:01', '2021-12-21 06:34:39'),
(188, 4, 1, 'Nguyễn Hữu Thoại', 'thoai2013@gmail.com', '0909220884', 'Ấp Tân Hiệp, Xã Tân Bình, Huyện Phụng Hiệp, Hậu Giang', 'chiều', 0, 30000, 237500, 2, '2021-12-10', '2021-12-10 06:05:48', '2021-12-21 06:34:28'),
(189, 4, 1, 'Nguyễn Hữu Thoại', 'thoai2013@gmail.com', '0909220884', 'Ấp Tân Hiệp, Xã Tân Bình, Huyện Phụng Hiệp, Hậu Giang', 'abc', 0, 30000, 302000, 3, '2021-12-15', '2021-12-15 09:47:27', '2021-12-15 03:17:02'),
(190, 2, 2, 'Trung', 'chitrunghg111@gmail.com', '0909000999', 'Ninh Kiều, Cần Thơ', 'Giao hàng buổi sáng', 50000, 30000, 261000, 2, '2021-12-17', '2021-12-17 14:52:57', '2021-12-17 07:58:46'),
(191, 2, 2, 'Nguyen Van A', 'chitrunghg111@gmail.com', '0909000888', 'Cần Thơ', 'Giao hàng buổi sáng', 50000, 0, 949000, 3, '2021-12-21', '2021-12-21 14:58:35', '2021-12-21 08:03:34'),
(192, 2, 1, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Thị Trấn Rạch Gòi, Châu Thành A, Hậu Giang', 'Giao hàng buổi chiều', 50000, 30000, 479500, 2, '2021-12-21', '2021-12-21 15:08:29', '2021-12-21 08:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE `giamgia` (
  `id` int(11) NOT NULL,
  `ma_gg` varchar(100) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `hinhthuc` tinyint(3) NOT NULL COMMENT '1:%, 2:so tien',
  `giatri` int(11) NOT NULL COMMENT 'ap dung theo hinhthuc',
  `soluong` int(11) NOT NULL COMMENT 'sl ma giam gia',
  `ngaybatdau` varchar(50) NOT NULL,
  `ngayketthuc` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giamgia`
--

INSERT INTO `giamgia` (`id`, `ma_gg`, `ten`, `hinhthuc`, `giatri`, `soluong`, `ngaybatdau`, `ngayketthuc`, `created_at`, `updated_at`) VALUES
(1, 'COVID2021', 'Giảm giá COVID 2021', 2, 50000, 46, '2021-11-14', '2021-11-30', '2021-11-14 06:41:06', '2021-11-27 07:05:21'),
(2, 'noel2021', 'Giảm Giá Giáng Sinh 2021', 2, 50000, 46, '2021-12-01', '2021-12-31', '2021-12-09 22:01:08', '2021-12-21 08:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucthanhtoan`
--

CREATE TABLE `hinhthucthanhtoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhthucthanhtoan`
--

INSERT INTO `hinhthucthanhtoan` (`id`, `ten`, `mota`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Nhận hàng - trả tiền (COD)', 'Bạn sẽ thanh toán bằng tiền mặt cho nhân viên giao hàng ngay khi nhận hàng.', 1, '2021-10-30 06:33:36', '2021-10-30 06:33:36'),
(2, 'Thanh toán qua VNPAY', 'Thực hiện thanh toán qua cổng thanh toán VNPAY. Đơn hàng sẽ được giao sau khi bạn đã hoàn tất thanh toán.', 1, '2021-10-30 06:33:36', '2021-10-30 06:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(12) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:nam, 0:nu',
  `ngaysinh` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten`, `email`, `sdt`, `diachi`, `password`, `gioitinh`, `ngaysinh`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Nguyễn Trí Trung', 'trung111@gmail.com', '0909000111', 'Quận 1, Thành phố Hồ Chí Minh', '$2y$10$UR9Bl4HT.pZSWkwrp.yZ..P5BYtPYMi.6Vs7K.DZWQDzKEm.JbqF.', 1, '1999-09-19', '2021-10-04 02:15:11', '2021-11-15 03:15:26', 'AobjwcfsYiUmdgIWhVrsTjugBENzMlGbOAYv58DWXfQQcXEisRQSq7EcuKZ5'),
(2, 'Nguyễn Chí Trung', 'chitrunghg111@gmail.com', '0909000999', 'Thị Trấn Rạch Gòi, Châu Thành A, Hậu Giang', '$2y$10$EuZOSwamtRaZ6y3U2todr.kMjWZg2/7qO3NSVZHVmMG7zgtiqpQbS', 1, '1999-10-02', '2021-10-04 02:27:11', '2021-12-17 07:56:16', '1xYGuh2DXfnFM6vbIx6xNNCNWBPno1f1rBvGDUsuqfH7cM6Q56iZbjkpoG41'),
(4, 'Nguyễn Hữu Thoại', 'thoai2013@gmail.com', '0909220884', 'Ấp Tân Hiệp, Xã Tân Bình, Huyện Phụng Hiệp, Hậu Giang', '$2y$10$1eLcKUyzLkUHdUB1Fy1w7udi/AwTc5w1Cx4QJ6smfz8rMAhbDGvuy', 1, '2013-11-01', '2021-10-16 06:48:46', '2021-11-15 03:06:18', '2gaZ79gi5ZlGBykC9dGRE03fASqqEY1zPZYkS44twmaLx6dosiZeXlR2NrcW'),
(5, 'Nguyễn Bích Trâm', 'tremtrem2003@gmail.com', '0909333888', 'Rạch Gòi, Châu Thành A, Hậu Giang', '$2y$10$IvaH7Nk5prF0Figs4ITA2.w7oTxaw1YIM9yDpLPmdwNjWQubZbLTC', 1, NULL, '2021-11-06 03:52:39', '2021-11-06 03:52:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `danhmucsp_id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `giatri` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1,
  `ngaybatdau` varchar(100) NOT NULL,
  `ngayketthuc` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `danhmucsp_id`, `ten`, `giatri`, `trangthai`, `ngaybatdau`, `ngayketthuc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Khuyến mãi sữa rửa mặt', 10, 1, '2021-11-14', '2021-11-21', '2021-11-14 06:36:57', '2021-11-15 10:36:18'),
(2, 1, 'Khuyến mãi Noel', 10, 1, '2021-12-01', '2021-12-31', '2021-11-15 03:46:59', '2021-12-09 04:29:31'),
(3, 1, 'Thích thì KM', 5, 1, '2021-11-16', '2021-11-30', '2021-11-15 03:51:01', '2021-11-15 10:21:42'),
(4, 10, 'Khuyến mãi xịt khoáng', 80, 0, '2021-11-14', '2021-11-14', '2021-11-15 03:52:45', '2021-12-09 04:23:49'),
(5, 10, 'Khuyến mãi xịt khoáng 2', 7, 0, '2021-11-15', '2021-11-15', '2021-11-15 03:53:30', '2021-12-09 04:24:07'),
(6, 2, 'Khuyến mãi nước tẩy trang', 5, 1, '2021-11-15', '2021-11-16', '2021-11-15 04:03:18', '2021-11-15 10:36:01'),
(7, 4, 'Khuyến mãi tất cả mặt nạ', 10, 1, '2021-12-17', '2021-12-31', '2021-11-15 05:21:16', '2021-12-17 00:13:42'),
(8, 23, 'KM mặt nạ', 5, 0, '2021-11-16', '2021-11-17', '2021-11-16 01:30:15', '2021-11-16 02:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_09_20_083412_taikhoan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `p_transaction_id` varchar(100) NOT NULL COMMENT 'ma giao dich',
  `p_money` float NOT NULL COMMENT 'so tien thanh toan',
  `p_note` text DEFAULT NULL COMMENT 'noi dung thanh toan',
  `p_vnp_reponse_code` varchar(255) DEFAULT NULL COMMENT 'ma phan hoi',
  `p_code_vnpay` varchar(255) NOT NULL COMMENT 'ma giao dich vnpay',
  `p_code_bank` varchar(255) NOT NULL COMMENT 'ma ngan hang',
  `p_time` varchar(255) NOT NULL COMMENT 'thoi gian chuyen khoan',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `donhang_id`, `p_transaction_id`, `p_money`, `p_note`, `p_vnp_reponse_code`, `p_code_vnpay`, `p_code_bank`, `p_time`, `created_at`, `updated_at`) VALUES
(2, 35, 'qgBQ8s9CuClHhGD', 2599000, 'Thanh toán đơn hàng', '00', '13623599', 'NCB', '2021-11-09 17:25', '2021-11-09 03:25:11', '2021-11-09 03:25:11'),
(3, 174, 'Ogq3KF7G7scPPLc', 316000, 'Thanh toán đơn hàng', '00', '13623782', 'NCB', '2021-11-10 01:16', '2021-11-09 11:17:06', '2021-11-09 11:17:06'),
(4, 175, '7h0Ut166HMH4ALC', 279000, 'Thanh toán đơn hàng mới', '00', '13624352', 'NCB', '2021-11-10 16:16', '2021-11-10 02:17:08', '2021-11-10 02:17:08'),
(5, 181, 'eyCX3TWv0Pn6NYf', 421500, 'Thanh toán đơn hàng Eden Beauty', '00', '13631325', 'NCB', '2021-11-19 09:15', '2021-11-18 19:16:52', '2021-11-18 19:16:52'),
(6, 183, 'Tv7IjyESIDMOg1v', 440000, 'Thanh toán đơn hàng', '00', '13641439', 'NCB', '2021-11-27 21:30', '2021-11-27 07:30:47', '2021-11-27 07:30:47'),
(7, 184, 'OBiaTPgbNo4Fifk', 1323000, 'Thanh toán đơn hàng', '00', '13641440', 'NCB', '2021-11-27 21:33', '2021-11-27 07:33:25', '2021-11-27 07:33:25'),
(8, 190, 'uhKFoSzxGreqilt', 261000, 'Thanh toán đơn hàng', '00', '13655916', 'NCB', '2021-12-17 21:53', '2021-12-17 07:54:06', '2021-12-17 07:54:06'),
(9, 191, 'JM6sP8F3ZlSJYqN', 949000, 'Thanh toán đơn hàng mới', '00', '13658281', 'NCB', '2021-12-21 22:01', '2021-12-21 08:01:31', '2021-12-21 08:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `danhmucsp_id` int(11) NOT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `xuatxu_id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL COMMENT 'ten hien thi tren url',
  `hinhanh` varchar(200) NOT NULL,
  `image_list` text DEFAULT NULL,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `gia` float NOT NULL,
  `gia_ban` float NOT NULL DEFAULT 0,
  `mota` text NOT NULL,
  `mota_ngan` text DEFAULT NULL,
  `nsx` varchar(50) DEFAULT NULL,
  `hsd` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `danhmucsp_id`, `thuonghieu_id`, `xuatxu_id`, `ten`, `slug`, `hinhanh`, `image_list`, `soluong`, `gia`, `gia_ban`, `mota`, `mota_ngan`, `nsx`, `hsd`, `created_at`, `updated_at`) VALUES
(3, 13, 4, 2, 'Kem chống nắng Sunplay Skin Aqua Clear White', 'kem-chong-nang-sunplay-skin-aqua-clear-white', 'kcn-sunplay-skin-aqua-clear-white.jpg', '[\"kcn-sunplay-skin-aqua-clear-white.jpg\",\"kcn-sunplay-skin-aqua-clear-white-3.jpg\",\"kcn-sunplay-skin-aqua-clear-white-2.jpg\"]', 100, 168000, 178000, '<p>Kết hợp c&ocirc;ng nghệ Watery Capsule x Ceramide Boost gi&uacute;p chống nắng v&agrave; giữ ẩm đột ph&aacute;, c&ugrave;ng với khả năng chịu nước v&agrave; mồ h&ocirc;i cao cho khả năng chống nắng mạnh mẽ, c&ocirc;ng thức dịu nhẹ cho l&agrave;n da nhạy cảm gi&uacute;p phục hồi l&agrave;n da dưỡng da trắng mịn tối ưu.</p>', '<p>Kem chống năng số 1 gi&uacute;p dưỡng da trắng mịn, an to&agrave;n cho da</p>', '2021-07-01', '2023-07-01', '2021-09-14 02:16:57', '2021-12-09 22:30:12'),
(7, 1, 7, 6, 'Sữa rửa mặt Nivea Pearl White Micro Bubbles Deep Clean Foam 5IN1 Trắng Da Ngọc Trai 100g', 'sua-rua-mat-nivea-pearl-white-micro-bubbles-deep-clean-foam-5in1-trang-da-ngoc-trai-100g', 'srm-nivea-pearl-white-micro-bubbles.jpg', '[\"srm-nivea-pearl-white-micro-bubbles.jpg\",\"srm-nivea-pearl-white-micro-bubbles-3.jpg\",\"srm-nivea-pearl-white-micro-bubbles-2.jpg\"]', 50, 70000, 75000, '<p>Sữa Rửa Mặt Nivea Pearl White Micro Bubbles Deep Clean Foam B&ugrave;n Trắng Da Ngọc Trai, ph&aacute;t triển dựa tr&ecirc;n c&ocirc;ng thức l&agrave;m sạch cho mọi loại da, mang đến hiệu quả sạch s&acirc;u v&agrave; tinh chất Pearly White t&iacute;ch hợp cho t&aacute;c dụng dưỡng trắng da gấp 10 lần. - Tinh chất Pearly White: Cung cấp khả năng dưỡng trắng da gấp 10 lần so với Vitamin C. - C&ocirc;ng nghệ bọt si&ecirc;u nhỏ: L&agrave;m sạch s&acirc;u hiệu quả mọi bụi bẩn b&atilde; nhờn m&agrave; kh&ocirc;ng cần ch&agrave; x&aacute;t mạnh tr&ecirc;n da. - Kh&ocirc;ng chứa cồn, paraben v&agrave; dầu kho&aacute;ng gi&uacute;p an to&agrave;n dịu nhẹ cho da.</p>', NULL, NULL, NULL, '2021-09-17 02:31:29', '2021-12-21 06:34:28'),
(8, 1, 5, 1, 'Sữa rửa mặt Cosrx Low PH Morning Gel Cleanser 150ml', 'sua-rua-mat-cosrx-low-ph-morning-gel-cleanser-150ml', 'srm-cosrx-low-ph-good-morning-150ml.jpg', '[\"srm-cosrx-low-ph-good-morning-150ml.jpg\",\"srm-cosrx-low-ph-good-morning-150ml-4.jpg\",\"srm-cosrx-low-ph-good-morning-150ml-3.jpg\",\"srm-cosrx-low-ph-good-morning-150ml-2.jpg\"]', 96, 180000, 185000, '<p>Cosrx l&agrave; thương hiệu mỹ phẩm nội địa H&agrave;n Quốc chuy&ecirc;n biệt d&agrave;nh cho l&agrave;n da Ch&acirc;u &Aacute; gi&uacute;p mọi c&ocirc; g&aacute;i giải quyết c&aacute;c vấn đề thường gặp như da dầu, dễ nổi mụn, da sạm đen,..., cosrx tự h&agrave;o với c&aacute;c sản phẩm lu&ocirc;n nằm trong top best-seller tại H&agrave;n cũng như tr&ecirc;n những website mỹ phẩm uy t&iacute;n tr&ecirc;n khắp thế giới.</p>\r\n\r\n<p><strong>Low PH Good Morning Gel Cleanser</strong>&nbsp;l&agrave; sữa rửa mặt được chiết xuất từ dầu c&acirc;y tr&agrave; v&agrave; c&aacute;c th&agrave;nh phần tự nhi&ecirc;n kh&aacute;c cho c&ocirc;ng thức tinh khiết nhẹ nh&agrave;ng nhưng hiệu quả với độ pH 5,0-6,0 gi&uacute;p l&agrave;m sạch da hiệu quả m&agrave; kh&ocirc;ng hề kh&ocirc; căng, ph&ugrave; hợp với mọi loại da nhất l&agrave; da nhạy cảm.</p>\r\n\r\n<p><img alt=\"\" src=\"https://adminbeauty.hvnet.vn/Upload/tinymce/2019/3/28/a2113029.jpg\" style=\"height:640px; width:640px\" /></p>', '<p style=\"text-align:left\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">- C&oacute; độ pH gần như l&agrave;n da tự nhi&ecirc;n</span></span></span></span></p>\r\n\r\n<p style=\"text-align:left\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">- Chứa th&agrave;nh phần BHA gi&uacute;p tẩy nhẹ lớp da chết</span></span></span></span></p>\r\n\r\n<p style=\"text-align:left\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">- Chứa tinh dầu tea tree gi&uacute;p kiềm dầu v&agrave; se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng</span></span></span></span></p>\r\n\r\n<p style=\"text-align:left\"><span style=\"font-size:14px\"><span style=\"color:#666666\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">- Kết cấu dạng gel, tạo bọt nhẹ cực th&iacute;ch hợp cho mọi l&agrave;n da d&ugrave; l&agrave; nhạy cảm nhất</span></span></span></span></p>', '2021-08-07', '2023-08-07', '2021-09-17 02:33:03', '2021-12-21 08:13:45'),
(9, 2, 2, 5, 'Nước tẩy trang Simple Kind To Skin Micellar Cleansing Water 200ml', 'nuoc-tay-trang-simple-kind-to-skin-micellar-cleansing-water-200ml', 'nuoc-tay-trang-simple.jpg', '[\"nuoc-tay-trang-simple.jpg\",\"ntt-simple-4.jpg\",\"ntt-simple-3.jpg\",\"ntt-simple-2.jpg\"]', 99, 60000, 65000, '<p>Nước tẩy trang Simple Kind to Skin Micellar Cleansing Water được sử dụng c&ocirc;ng nghệ Mixen rất l&agrave;nh t&iacute;nh cho da. Gồm c&aacute;c ph&acirc;n tử c&oacute; 2 đầu, 1 đầu h&uacute;t nước 1 đầu kị nước c&oacute; thể h&ograve;a tan trong dầu. Sản phẩm c&oacute; khả năng h&uacute;t sạch bụi bẩn, cặn trang điểm, kem chống nắng m&agrave; kh&ocirc;ng cần d&ugrave;ng tới s&uacute;t, x&agrave; ph&ograve;ng hại da.</p>', NULL, '2021-07-01', '2023-07-01', '2021-09-22 07:15:04', '2021-12-17 07:58:46'),
(11, 10, 3, 4, 'Xịt khoáng dưỡng da Vichy Thermale 150ml', 'xit-khoang-duong-da-vichy-thermale-150ml', 'xk-vichy-150ml.jpg', '[\"xk-vichy-4.jpg\",\"xk-vichy-3.jpg\",\"xk-vichy-2.jpg\"]', 100, 260000, 272000, '<p>Nước Xịt Kho&aacute;ng Dưỡng Da Vichy Thermale c&oacute; nguồn gốc từ thi&ecirc;n nhi&ecirc;n v&agrave; kh&ocirc;ng thể sản xuất nh&acirc;n tạo. Được tạo th&agrave;nh qua qu&aacute; tr&igrave;nh d&agrave;i: Bắt dầu từ s&acirc;u dưới đ&aacute;y n&uacute;i lửa ở v&ugrave;ng Auvergne, nước kho&aacute;ng Vichy Thermal Spa được chuyển h&oacute;a dần dần v&agrave; thu nạp kho&aacute;ng chất qu&yacute; hiếm trước khi trở về mặt đất, tinh khiết v&agrave; chứa nhiều lợi &iacute;ch.</p>', '<p>- C&acirc;n bằng độ pH</p>\r\n\r\n<p>- Tăng cường sức đề kh&aacute;ng cho da</p>\r\n\r\n<p>- K&iacute;ch th&iacute;ch t&aacute;i tạo tế b&agrave;o da</p>', '2021-09-01', '2023-09-01', '2021-09-23 03:35:40', '2021-12-09 22:32:34'),
(12, 18, 1, 1, 'Mặt nạ giấy chiết xuất chanh Innisfree My Real Squeeze Mask', 'mat-na-giay-chiet-xuat-chanh-innisfree-my-real-squeeze-mask', 'mask-innisfree-chanh.jpg', '[\"mask-innisfree-chanh.jpg\",\"mask-innisfree-chanh-3.jpg\",\"mask-innisfree-chanh-2.jpg\"]', 99, 21000, 28000, '<p>Innisfree My Real Squeeze Mask l&agrave; mặt nạ giấy với 18 loại kh&aacute;c nhau từ c&aacute;c nguy&ecirc;n liệu từ tự nhi&ecirc;n, cung cấp độ ẩm theo nhu cầu dưỡng da của bạn. Đ&acirc;y l&agrave; mặt nạ dạng nước, l&agrave; một trong ba loại mặt nạ mới ph&aacute;t triển của d&ograve;ng sản phẩm Innisfree My Real Squeeze Mask. Với c&ocirc;ng nghệ đ&atilde; qua cải tiến v&agrave; c&aacute;ch t&acirc;n, sản phẩm th&iacute;ch hợp với l&agrave;n da dầu, da hỗn hợp dầu, da nhiều b&atilde; nhờn, lỗ ch&acirc;n l&ocirc;ng to v&agrave; c&oacute; mụn; gi&uacute;p cấp nước s&acirc;u, hạn chế b&atilde; nhờn, dịu nhẹ ph&ugrave; hợp với da nhạy cảm, da mụn.</p>', NULL, '2021-01-02', '2022-01-03', '2021-09-23 04:01:16', '2021-12-21 06:34:28'),
(14, 1, 6, 3, 'Sữa rửa mặt Murad Essential-C Cleanser 200ml', 'sua-rua-mat-murad-essential-c-cleanser-200ml', 'srm-murad-essential-c-cleanser.jpg', '[\"srm-murad-essential-c-cleanser-4.jpg\",\"srm-murad-essential-c-cleanser-3.jpg\",\"srm-murad-essential-c-cleanser-2.jpg\"]', 99, 1300000, 1320000, '<p><strong>Sữa Rửa Mặt Murad Essential-C Cleanser 200ml</strong> &ndash; Sản phẩm l&agrave;m sạch gi&agrave;u chất chống oxy ho&aacute; đ&atilde; được cấp bằng s&aacute;ng chế. - Murad Essential-C Cleanser l&agrave; sữa rửa mặt cực kỳ đ&igrave;nh d&aacute;m đến từ thương hiệu mỹ phẩm nổi tiếng Murad (Mỹ). Sản phẩm sử dụng Vitamin A, C v&agrave; E gi&uacute;p c&acirc;n bằng v&agrave; cấp ẩm ngay lập tức cho những l&agrave;n da bị tổn hại bởi m&ocirc;i trường.</p>\r\n\r\n<p>✔️&nbsp;L&agrave;m sạch da, loại bỏ c&aacute;c tạp chất từ m&ocirc;i trường b&aacute;m tr&ecirc;n da một c&aacute;ch hiệu quả</p>\r\n\r\n<p>✔️&nbsp;Phục hồi c&aacute;c dấu hiệu da bị tổn thương do yếu tố từ b&ecirc;n ngo&agrave;i t&aacute;c động l&ecirc;n da, lấy lại độ ẩm cho da</p>\r\n\r\n<p>✔️&nbsp;Chống oxy h&oacute;a mạnh mẽ, ngăn ngừa l&atilde;o h&oacute;a da&nbsp;</p>\r\n\r\n<p>✔️&nbsp;Trung h&ograve;a c&aacute;c gốc tự do, hỗ trợ giảm thiểu khả năng g&acirc;y ra n&aacute;m, sạm</p>\r\n\r\n<p>✔️&nbsp;<em>Đ&aacute;nh thức c&aacute;c gi&aacute;c quan, mang đến tinh thần sảng kho&aacute;i đầy hưng phấn</em></p>', '<p>Sữa rửa mặt loại bỏ tạp chất <strong>Murad Essential-C Cleanser</strong>&nbsp;gi&uacute;p bạn l&agrave;m sạch ho&agrave;n to&agrave;n tạp chất, phục hồi c&aacute;c dấu hiệu thương tổn từ c&aacute;c t&aacute;c nh&acirc;n ngoại lai v&agrave; lấy lại độ ẩm đ&atilde; mất.&nbsp;</p>', '2021-11-01', '2023-01-01', '2021-10-14 03:13:20', '2021-12-21 06:34:39'),
(15, 17, 1, 1, 'Mặt nạ ngủ ngăn ngừa lão hóa lựu đỏ Innisfree Jeju Pomegranate Revitalizing Capsule Sleeping Pack', 'mat-na-ngu-ngan-ngua-lao-hoa-luu-do-innisfree-jeju-pomegranate-revitalizing-capsule-sleeping-pack', 'mask-ngu-innisfree-luu-do.png', '[\"mask-ngu-innisfree-luu-do-2.jpg\",\"mask-ngu-innisfree-luu-do.png\"]', 10, 400000, 410000, '<p>Jeju Pomegranate Revitalizing &ndash; d&ograve;ng sản phẩm c&oacute; th&agrave;nh phần từ Lựu hữu cơ Jeju bảo vệ v&agrave; duy tr&igrave; sức khoẻ của da khỏi c&aacute;c t&aacute;c động b&ecirc;n ngo&agrave;i v&agrave; sự l&atilde;o ho&aacute; từ b&ecirc;n trong.&nbsp;<strong>Mặt nạ ngủ Innisfree Jeju Pomegranate Revitalizing Capsule Sleeping Pack</strong>&nbsp;hỗ trợ dưỡng ẩm, bảo vệ v&agrave; ngăn ngừa l&atilde;o h&oacute;a sớm mang lại vẻ s&aacute;ng trong rạng rỡ cho l&agrave;n da trong l&uacute;c ngủ. Dưới đ&acirc;y l&agrave; th&ocirc;ng tin chi tiết của phẩm.</p>\r\n\r\n<h3>C&ocirc;ng dụng</h3>\r\n\r\n<ul>\r\n	<li><strong>Mặt nạ ngủ Innisfree Jeju</strong>&nbsp;cung cấp nước v&agrave; dưỡng chất ngăn ngừa l&atilde;o ho&aacute;, mang đến l&agrave;n da tươi trẻ.</li>\r\n	<li>Chứa vi&ecirc;n nang dạng gel tinh dầu hạt lựu tạo lớp h&agrave;ng rảo bảo vệ v&agrave; giữ ẩm cho da, tăng cường độ săn chắc v&agrave; độ ẩm.</li>\r\n	<li>Nước &eacute;p lựu tươi nguy&ecirc;n quả c&oacute; khả năng chống oxy ho&aacute; &ndash; l&atilde;o ho&aacute; mạnh mẽ từ c&aacute;c t&aacute;c động b&ecirc;n ngo&agrave;i v&agrave; b&ecirc;n trong cơ thể.</li>\r\n</ul>\r\n\r\n<h3>C&aacute;ch sử dụng</h3>\r\n\r\n<ul>\r\n	<li>Ở bước chăm s&oacute;c da cuối c&ugrave;ng v&agrave;o ban đ&ecirc;m, thay cho bước kem dưỡng&nbsp;</li>\r\n	<li>Lấy một lượng sản phẩm mặt nạ ngủ Innisfree th&iacute;ch hợp thoa l&ecirc;n v&ugrave;ng da mặt v&agrave; cổ&nbsp;</li>\r\n	<li>Massage nhẹ để c&aacute;c dưỡng chất được hấp thụ tốt nhất.&nbsp;</li>\r\n	<li>Rửa lại bằng nước sạch v&agrave;o s&aacute;ng h&ocirc;m sau.&nbsp;</li>\r\n	<li>Sử dụng 2-3 lần/ tuần</li>\r\n</ul>\r\n\r\n<h3>Lưu &yacute; khi sử dụng mặt nạ ngủ Innisfree Jeju<strong>&nbsp;</strong></h3>\r\n\r\n<ul>\r\n	<li>Ngưng sử dụng mỹ phẩm khi gặp phải c&aacute;c triệu chứng sau. Nếu tiếp tục sử dụng c&oacute; thể khiến t&igrave;nh trạng trở n&ecirc;n trầm trọng, cần tư vấn với chuy&ecirc;n gia về da liễu:<br />\r\n	&ndash; Bị nổi đốm đỏ, sưng ph&ugrave;, mẩn ngứa khi sử dụng v.v.<br />\r\n	&ndash; V&ugrave;ng da thoa mỹ phẩm bị c&aacute;c triệu chứng n&ecirc;u tr&ecirc;n khi tiếp x&uacute;c với &aacute;nh s&aacute;ng trực tiếp.</li>\r\n	<li>Kh&ocirc;ng thoa l&ecirc;n vết thương, v&ugrave;ng da vi&ecirc;m nhiễm, lở lo&eacute;t, v.v.</li>\r\n	<li>Tr&aacute;nh xa tầm tay trẻ em</li>\r\n	<li>Tr&aacute;nh bảo quản giữa nơi nhiệt độ qu&aacute; cao v&agrave; qu&aacute; thấp (dưới 0oC trong tủ lạnh), nơi c&oacute; &aacute;nh s&aacute;ng trực tiếp.</li>\r\n	<li>Tr&aacute;nh v&ugrave;ng mắt</li>\r\n</ul>', '<p><span style=\"font-size:11px\">- Jeju Pomegranate Revitalizing &ndash; d&ograve;ng sản phẩm c&oacute; th&agrave;nh phần từ Lựu hữu cơ Jeju bảo vệ v&agrave; duy tr&igrave; sức khoẻ của da khỏi c&aacute;c t&aacute;c động b&ecirc;n ngo&agrave;i v&agrave; sự l&atilde;o ho&aacute; từ b&ecirc;n trong. </span></p>\r\n\r\n<p><span style=\"font-size:11px\">-<strong> Mặt nạ ngủ ngăn ngừa l&atilde;o h&oacute;a lựu đỏ Innisfree Jeju Pomegranate Revitalizing Capsule Sleeping Pack</strong> hỗ trợ dưỡng ẩm, bảo vệ v&agrave; ngăn ngừa l&atilde;o h&oacute;a sớm mang lại vẻ s&aacute;ng trong rạng rỡ cho l&agrave;n da trong l&uacute;c ngủ.</span></p>', '2021-08-04', '2022-08-31', '2021-10-26 00:24:43', '2021-12-17 06:40:21'),
(18, 23, 1, 7, 'Mặt nạ lột mụn demo', 'mat-na-lot-mun-demo', 'mask-innisfree-demo.jpg', NULL, 0, 70000, 80000, '<p>Nội dung <strong>Mặt nạ lột mụn demo</strong></p>', '<p>- Mặt nạ lột mụn demo</p>\r\n\r\n<p>- Mặt nạ lột mụn demo</p>\r\n\r\n<p>- Mặt nạ lột mụn demo</p>', '2021-10-01', '2022-01-21', '2021-10-26 04:38:11', '2021-12-17 06:49:18'),
(19, 22, 7, 6, 'Sản phẩm Demo 3', 'san-pham-demo-3', '1632287507-sanpham.jpg', NULL, 60, 90000, 93000, '<p><strong>SẢN PHẨM DEMO 3</strong> l&agrave; qeyqrutoqtfakfabzmvznvzvzzczczczc</p>', '<p>M&ocirc; tả ngắn Sản phẩm demo 3</p>', '2021-09-01', '2021-11-30', '2021-11-12 12:38:49', '2021-11-21 09:54:26'),
(23, 22, 7, 6, 'San pham demo 4', 'san-pham-demo-4', 'ntt-senka-micellar-formula-white.png', NULL, 10, 90000, 120000, '<p>4</p>', '<p>4</p>', '2021-03-01', '2022-03-01', '2021-11-13 05:01:24', '2021-11-21 10:03:22'),
(24, 10, 5, 3, 'Xịt khoáng demo 1', 'xit-khoang-demo-1', 'xk-vichy-4.jpg', NULL, 5, 90000, 100000, '<p>m&ocirc; tả m&ocirc; tả</p>', '<p>m&ocirc; tả m&ocirc; tả</p>', '2021-11-01', '2021-12-31', '2021-11-20 02:01:28', '2021-12-09 22:36:42'),
(25, 1, 1, 1, 'Sữa Rửa Mặt Innisfree Jeju Cherry Blossom Jam Cleanser 150g', 'sua-rua-mat-innisfree-jeju-cherry-blossom-jam-cleanser-150g', 'srm-innisfree-cherry.jpg', NULL, 99, 200000, 240000, '<p><strong>Sữa rửa mặt Innisfree Jeju Cherry Blossom Jam Cleanser 150g</strong> được chiết xuất từ hoa anh đ&agrave;o H&agrave;n Quốc gi&agrave;u dưỡng chất mang lại cho bạn l&agrave; da mịn m&agrave;ng, mềm mại v&agrave; trắng hồng tự nhi&ecirc;n. Sản phẩm được rất nhiều ph&aacute;i đẹp ưa chuộng v&agrave; tin d&ugrave;ng bởi độ l&agrave;nh t&iacute;nh v&agrave; an to&agrave;n cho da.</p>\r\n\r\n<p><img alt=\"\" src=\"https://adminbeauty.hvnet.vn/Upload/tinymce/2021/5/19/vugvf024245.jpg\" style=\"height:640px; width:640px\" /></p>\r\n\r\n<h2>C&Ocirc;NG DỤNG SẢN PHẨM</h2>\r\n\r\n<p>Innisfree Jeju Cherry Blossom Jam Cleanser l&agrave; gel rửa mặt c&oacute; t&iacute;nh axit yếu với c&ocirc;ng nghệ micellar, c&oacute; t&aacute;c dụng như một thỏi nam ch&acirc;m gi&uacute;p l&agrave;m sạch da một c&aacute;ch nhẹ nh&agrave;ng vừa loại bỏ tạp chất trong v&agrave; ngo&agrave;i lỗ ch&acirc;n l&ocirc;ng. V&igrave; l&agrave; sản phẩm c&oacute; gốc nước n&ecirc;n Jeju Cherry Blossom Jam Cleanser c&ograve;n được khuyến kh&iacute;ch trở th&agrave;nh sản phẩm l&agrave;m sạch thứ cấp trong quy tr&igrave;nh Double Cleansing.</p>\r\n\r\n<p>Innisfree Jeju Cherry Blossom Jam Cleanser c&oacute; chứa 50ppm chiết xuất từ L&aacute; hoa anh đ&agrave;o Ho&agrave;ng Gia tại đảo Jeju. Đ&acirc;y l&agrave; một th&agrave;nh phần c&oacute; chứa rất nhiều c&aacute;c dưỡng chất hữu cơ, vitamin tổng hợp&hellip;c&oacute; lợi cho da. Đặc biệt n&oacute; c&oacute; khả năng l&agrave;m bừng sức sống cho l&agrave;n da, gi&uacute;p l&agrave;n da bạn được dưỡng trắng hồng rạng rỡ, n&acirc;ng tone da, l&agrave;m đều m&agrave;u da.</p>\r\n\r\n<p>Innisfree Jeju Cherry Blossom Jam Cleanser c&oacute; chứa Betaine &ndash; dưỡng chất từ chiết xuất củ cải đường c&oacute; t&aacute;c dụng cấp ẩm, l&agrave;m dịu c&aacute;c dấu hiệu kh&ocirc; da, th&ocirc; r&aacute;p, gi&uacute;p da căng mịn đủ nước, cải thiện bề mặt da mềm mịn hơn. Khi kết hợp c&ocirc;ng thức th&agrave;nh phần với kết cấu dạng mứt hoa, sữa rửa mặt hoa anh đ&agrave;o sẽ gi&uacute;p da ngậm nước v&agrave; trong mọng như &aacute;nh s&aacute;ng xuy&ecirc;n qua thủy tinh.</p>\r\n\r\n<p><img alt=\"\" src=\"https://adminbeauty.hvnet.vn/Upload/tinymce/2021/5/19/11111024422.jpg\" style=\"height:640px; width:640px\" /></p>\r\n\r\n<p>─ Kết cấu gel mềm mại v&agrave; sệt như một loại mứt hoa l&agrave;m giảm ma s&aacute;t tr&ecirc;n da, gi&uacute;p da được loại bỏ tạp chất v&agrave; giữ được độ ẩm ngay sau khi l&agrave;m sạch da.</p>\r\n\r\n<p>─ L&agrave; gel rửa mặt l&agrave;m sạch dịu nhẹ, c&oacute; t&iacute;nh axit yếu với c&ocirc;ng nghệ micellar, c&ocirc;ng thức 9FREE v&agrave; kh&ocirc;ng c&oacute; x&agrave; ph&ograve;ng.</p>\r\n\r\n<p>─ Ph&ugrave; hợp cho mọi loại da, th&iacute;ch hợp để l&agrave;m sạch da buổi s&aacute;ng v&agrave; l&agrave; sản phẩm thứ cấp trong phương ph&aacute;p Double Cleansing.</p>\r\n\r\n<p>─ C&oacute; chứa chiết xuất từ l&aacute; hoa anh đ&agrave;o Ho&agrave;ng Gia kết hợp với Betaine gi&uacute;p cấp ẩm, l&agrave;m dịu tr&igrave;nh trạng kh&ocirc; da, dưỡng da trắng hồng rạng rỡ, n&acirc;ng tone da, l&agrave;m đều m&agrave;u da.</p>\r\n\r\n<p>─ Sữa rửa mặt c&oacute; hương hoa đ&agrave;o mang lại cảm gi&aacute;c thư gi&atilde;n cho da v&agrave; tinh thần v&agrave;o mỗi buổi s&aacute;ng.</p>', '<p>- Kết cấu gel mềm mại v&agrave; sệt gi&uacute;p l&agrave;m giảm ma s&aacute;t tr&ecirc;n da</p>\r\n\r\n<p>- Gi&uacute;p da loại bỏ c&aacute;c tạp chất v&agrave; giữ được độ ẩm sau khi l&agrave;m sạch da</p>\r\n\r\n<p>- Gi&uacute;p cấp ẩm, l&agrave;m dịu tr&igrave;nh trạng kh&ocirc; da</p>\r\n\r\n<p>- Dưỡng da trắng hồng rạng rỡ, n&acirc;ng tone da, l&agrave;m đều m&agrave;u da</p>', '2021-12-01', '2023-12-15', '2021-12-17 07:36:53', '2021-12-17 07:58:46'),
(26, 13, 4, 2, 'Sữa Chống Nắng Shiseido Senka Perfect UV Milk SPF50/PA++++', 'sua-chong-nang-shiseido-senka-perfect-uv-milk-spf50pa', 'kcn-senka-perfect-uv-milk.jpg', '[\"kcn-senka-perfect-uv-milk-3.jpg\",\"kcn-senka-perfect-uv-milk-2.jpg\"]', 100, 150000, 160000, '<p><strong>Sữa Chống Nắng Shiseido Senka Perfect UV Milk SPF50/PA++++</strong> mang lại cảm gi&aacute;c mịn mượt, cho bề mặt da lu&ocirc;n tươi s&aacute;ng rạng rỡ. Sản phẩm c&oacute; chỉ số SPF 50+/ PA++++ gi&uacute;p bảo vệ da trước tia UVB, t&aacute;c nh&acirc;n g&acirc;y sạm da, ch&aacute;y nắng cũng như tia UVA, t&aacute;c nh&acirc;n g&acirc;y đốm n&acirc;u, t&agrave;n nhanh v&agrave; l&atilde;o h&oacute;a.</p>\r\n\r\n<p><strong>Th&agrave;nh Phần Ch&iacute;nh V&agrave; C&ocirc;ng Dụng:</strong><br />\r\n- M&agrave;ng chắn UV mạnh mẽ với SPF 50+/PA++++: Bảo vệ da khỏi t&aacute;c hại của tia tử ngoại, ngăn ngừa sự h&igrave;nh th&agrave;nh đốm n&acirc;u, sạm da<br />\r\n- C&ocirc;ng nghệ &ldquo;Natu-ence&rdquo; độc quyền từ Shiseido gi&uacute;p n&acirc;ng cao hiệu quả của c&aacute;c th&agrave;nh phần dưỡng da tự nhi&ecirc;n từ Nhật Bản (Tơ Tằm Trắng, Mật Ong, C&aacute;m Gạo)<br />\r\n- Sử dụng như lớp l&oacute;t trang điểm ho&agrave;n hảo: Hạt phấn si&ecirc;u mịn cho lớp nền mịn mượt, kh&ocirc;ng bị bong tr&oacute;c v&agrave; bền m&agrave;u</p>\r\n\r\n<p><img alt=\"\" src=\"https://adminbeauty.hvnet.vn/Upload/tinymce/2021/2/25/g-nang-senka-perfect-uv-milk-9_8c0dfb8e7c9d4954bab5b8b97ae053fe_master_79e23f6b8e1e4c049fea36ce15152fa0022219.jpg\" style=\"height:640px; width:640px\" /><br />\r\n- Kết cấu sữa mỏng nhẹ, kh&ocirc;ng nhờn r&iacute;t, cho l&agrave;n da mịn mượt, rạng rỡ<br />\r\n- Kh&ocirc;ng m&ugrave;i &ndash; Kh&ocirc;ng m&agrave;u &ndash; Kh&ocirc;ng b&iacute; tắc lỗ ch&acirc;n l&ocirc;ng<br />\r\n- L&acirc;u tr&ocirc;i khi tiếp x&uacute;c với nước &amp; mồ h&ocirc;i<br />\r\n- Th&iacute;ch hợp khi hoạt động ngo&agrave;i trời</p>', '<p>- Sữa chống nắng Senka Perfect UV Milk N gi&uacute;p bảo vệ da khỏi t&aacute;c hại của tia UV (t&aacute;c nh&acirc;n dẫn đến những đốm n&aacute;m, sạm tr&ecirc;n da).</p>\r\n\r\n<p>- Chỉ số PA++++ gi&uacute;p chống lại tia UVA, ngăn ngừa h&igrave;nh th&agrave;nh t&agrave;n nhang v&agrave; l&atilde;o h&oacute;a da.</p>\r\n\r\n<p>- Khả năng chống tr&ocirc;i trong nước v&agrave; mồ h&ocirc;i tốt, đặc biệt ph&ugrave; hợp với những hoạt động như bơi lội, thể thao.</p>', '2021-12-21', '2024-12-24', '2021-12-21 08:19:16', '2021-12-21 08:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `ten`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Trung', 'chitrunghg111@gmail.com', '$2y$10$WvehZsIDCpCFhoKFpSwgueRdNedENEVUISjmcAAr3SW.wkxwy43Sm', NULL, '2021-09-14 18:08:09', '2021-09-14 18:08:09'),
(2, 'Nguyen Chi Trung', 'ebadmin@gmail.com', '$2y$10$eXNHR466s4FY5enQjiYG3ussx2BD5Y.4c7s23BXZB4TYX6uqQaFaS', NULL, '2021-09-14 18:39:18', '2021-09-14 18:39:18'),
(3, 'Eden', 'eden@gmail.com', '$2y$10$GzFjNog/H3GzDKOVN1Xd0.nE1SmcOrJTtHUU4QpSVOxSFU9B.7pXC', NULL, '2021-09-20 02:06:35', '2021-09-20 02:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `id` int(11) NOT NULL,
  `doanhthu` float NOT NULL,
  `loinhuan` float NOT NULL,
  `ngaydathang` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`id`, `doanhthu`, `loinhuan`, `ngaydathang`, `created_at`, `updated_at`) VALUES
(1, 558000, 167400, '2021-11-10', NULL, '2021-12-09 21:54:53'),
(2, 22004000, 6601200, '2021-11-09', NULL, '2021-12-09 21:53:01'),
(3, 4408000, 1322400, '2021-11-08', NULL, '2021-12-09 21:50:27'),
(4, 2618000, 785400, '2021-11-06', NULL, '2021-12-09 21:49:15'),
(5, 4978000, 1493400, '2021-11-03', NULL, '2021-12-09 21:49:06'),
(8, 3104000, 931200, '2021-11-13', NULL, '2021-12-09 21:55:37'),
(9, 3977000, 1193100, '2021-11-18', '2021-11-17 11:42:30', '2021-11-17 11:42:30'),
(10, 518800, 155640, '2021-11-19', '2021-11-18 19:20:00', '2021-12-09 22:07:26'),
(11, 310000, 93000, '2021-11-28', '2021-11-27 22:34:25', '2021-11-27 22:34:25'),
(12, 1741300, 522390, '2021-12-03', '2021-12-03 01:24:29', '2021-12-03 01:26:46'),
(13, 372000, 111600, '2021-12-04', '2021-12-03 20:58:45', '2021-12-03 20:58:45'),
(14, 1323000, 396900, '2021-12-10', '2021-12-09 10:42:44', '2021-12-09 10:42:44'),
(15, 2840000, 852000, '2021-11-27', '2021-12-09 21:43:52', '2021-12-09 22:08:22'),
(16, 202300, 60690, '2021-11-15', '2021-12-09 21:56:36', '2021-12-09 21:56:36'),
(17, 97300, 29190, '2021-11-16', '2021-12-09 22:07:15', '2021-12-09 22:07:15'),
(18, 261000, 78300, '2021-12-17', '2021-12-17 07:58:46', '2021-12-17 07:58:46'),
(19, 2021500, 606450, '2021-12-21', '2021-12-21 06:34:28', '2021-12-21 08:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `ten`, `slug`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Innisfree', 'innisfree', 1, '2021-10-12 03:38:01', '2021-12-17 07:19:46'),
(2, 'Simple', 'simple', 1, '2021-10-12 04:00:55', '2021-11-08 10:20:44'),
(3, 'Vichy', 'vichy', 1, '2021-10-12 04:02:23', '2021-11-17 00:03:23'),
(4, 'Sunplay', 'sunplay', 1, '2021-10-12 04:06:18', '2021-10-12 04:06:18'),
(5, 'Cosrx', 'cosrx', 1, '2021-10-12 04:10:01', '2021-11-17 00:02:28'),
(6, 'Murad', 'murad', 1, '2021-10-14 03:08:36', '2021-11-17 00:02:27'),
(7, 'Nivea', 'nivea', 1, '2021-10-15 03:19:04', '2021-11-04 11:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xuatxu`
--

CREATE TABLE `xuatxu` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xuatxu`
--

INSERT INTO `xuatxu` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hàn Quốc', 'han-quoc', '2021-10-13 04:08:58', '2021-10-13 04:08:58'),
(2, 'Nhật Bản', 'nhat-ban', '2021-10-13 08:57:28', '2021-10-13 08:57:28'),
(3, 'Mỹ', 'my', '2021-10-13 08:57:48', '2021-10-13 08:57:48'),
(4, 'Pháp', 'phap', '2021-10-13 09:00:37', '2021-10-13 09:00:37'),
(5, 'Anh Quốc', 'anh-quoc', '2021-10-13 09:04:04', '2021-10-13 09:04:04'),
(6, 'Đức', 'duc', '2021-10-13 09:05:45', '2021-10-13 09:05:45'),
(7, 'Úc', 'uc', '2021-10-13 09:07:46', '2021-10-13 09:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biendonggia`
--
ALTER TABLE `biendonggia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`ten`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `httt_id` (`httt_id`);

--
-- Indexes for table `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_gg` (`ma_gg`);

--
-- Indexes for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`ten`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `sdt` (`sdt`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmucsp_id` (`danhmucsp_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_transaction_id` (`p_transaction_id`),
  ADD KEY `donhang_id` (`donhang_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`ten`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `danhmucsp_id` (`danhmucsp_id`),
  ADD KEY `thuonghieu_id` (`thuonghieu_id`),
  ADD KEY `xuatxu_id` (`xuatxu_id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taikhoan_email_unique` (`email`);

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thuonghieu_ten_unique` (`ten`) USING BTREE,
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `xuatxu_ten_unique` (`ten`) USING BTREE,
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `biendonggia`
--
ALTER TABLE `biendonggia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `giamgia`
--
ALTER TABLE `giamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biendonggia`
--
ALTER TABLE `biendonggia`
  ADD CONSTRAINT `biendonggia_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`httt_id`) REFERENCES `hinhthucthanhtoan` (`id`);

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`danhmucsp_id`) REFERENCES `danhmucsanpham` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmucsp_id`) REFERENCES `danhmucsanpham` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`thuonghieu_id`) REFERENCES `thuonghieu` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`xuatxu_id`) REFERENCES `xuatxu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
