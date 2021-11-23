-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 23, 2021 lúc 09:55 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandienmay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(2, 'Minh', 'minh@123', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL,
  `tenbaiviet` varchar(50) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`baiviet_id`, `danhmuc_id`, `baiviet_image`, `tenbaiviet`, `tomtat`, `noidung`) VALUES
(5, 3, 'a4.jpg', 'Bài 1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(9, 2, 'ab.jpg', 'Bài 3', 'Kiến thức máy vi tính,laptop', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(3, 'Máy giặt'),
(4, 'Điện thoại'),
(5, 'Tivi và Đồ dùng'),
(13, 'Laptop'),
(14, 'Camera');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuctin`
--

CREATE TABLE `tbl_danhmuctin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuctin`
--

INSERT INTO `tbl_danhmuctin` (`danhmuctin_id`, `tendanhmuc`) VALUES
(2, 'Kiến thức máy tính'),
(3, 'Kiến thức điện thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_donhang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `khachhang_id`, `soluong`, `mahang`, `ngaythang`, `status_donhang`) VALUES
(47, 7, 24, 3, '355', '2021-09-06 14:46:30', 0),
(48, 1, 24, 3, '355', '2021-09-06 14:46:30', 0),
(49, 20, 24, 3, '68', '2021-10-28 02:11:43', 0),
(50, 34, 24, 2, '68', '2021-10-28 02:11:43', 0),
(51, 37, 24, 1, '762', '2021-10-28 02:15:28', 0),
(52, 27, 24, 1, '762', '2021-10-28 02:15:28', 0),
(53, 35, 24, 2, '490', '2021-10-28 02:17:46', 2),
(54, 34, 24, 3, '490', '2021-10-28 02:17:46', 2),
(55, 28, 26, 1, '8', '2021-11-14 08:55:14', 0),
(56, 26, 26, 1, '8', '2021-11-14 08:55:14', 0),
(57, 27, 26, 1, '8', '2021-11-14 08:55:14', 0),
(58, 37, 26, 2, '8', '2021-11-14 08:55:14', 0),
(59, 28, 27, 1, '481', '2021-11-14 08:55:24', 0),
(60, 26, 27, 1, '481', '2021-11-14 08:55:24', 0),
(61, 27, 27, 1, '481', '2021-11-14 08:55:24', 0),
(62, 37, 27, 2, '481', '2021-11-14 08:55:24', 0),
(63, 28, 24, 7, '5854-2021-11-16-10-10-38', '2021-11-16 09:10:38', 0),
(64, 28, 24, 7, '5170-2021-11-16-10-11-14', '2021-11-16 09:11:14', 0),
(65, 35, 24, 3, '5170-2021-11-16-10-11-14', '2021-11-16 09:11:14', 0),
(66, 26, 24, 1, '5170-2021-11-16-10-11-14', '2021-11-16 09:11:14', 0),
(67, 27, 24, 1, '5170-2021-11-16-10-11-14', '2021-11-16 09:11:14', 0),
(68, 28, 24, 7, '9300-2021-11-16-10-11-50', '2021-11-16 09:11:50', 0),
(69, 28, 24, 7, '2145-2021-11-16-10-15-30', '2021-11-16 09:15:30', 0),
(70, 27, 24, 1, '8891-2021-11-16-10-15-42', '2021-11-16 09:15:42', 0),
(71, 26, 29, 1, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(72, 35, 29, 3, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(73, 34, 29, 3, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(74, 24, 29, 1, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(75, 23, 29, 1, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(76, 5, 29, 10, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(77, 36, 30, 1, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0),
(78, 22, 30, 1, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0),
(79, 21, 30, 3, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0),
(80, 16, 30, 1, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_giaodich` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `khachhang_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `status_giaodich`) VALUES
(4, 20, 7, 1, '587', '2021-09-04 15:49:52', 2),
(5, 20, 4, 2, '587', '2021-09-04 15:49:52', 2),
(6, 21, 6, 1, '599', '2021-09-02 12:56:49', 0),
(7, 24, 7, 2, '784', '2021-09-06 09:57:15', 2),
(16, 24, 6, 3, '72', '2021-09-06 10:26:21', 2),
(17, 24, 4, 3, '72', '2021-09-06 10:26:21', 2),
(18, 24, 6, 3, '695', '2021-09-06 13:43:38', 2),
(19, 24, 3, 3, '695', '2021-09-06 13:43:38', 2),
(20, 24, 7, 3, '355', '2021-09-06 14:46:30', 0),
(21, 24, 1, 3, '355', '2021-09-06 14:46:30', 0),
(22, 24, 20, 3, '68', '2021-10-28 02:11:43', 0),
(23, 24, 34, 2, '68', '2021-10-28 02:11:43', 0),
(24, 24, 37, 1, '762', '2021-10-28 02:15:28', 0),
(25, 24, 27, 1, '762', '2021-10-28 02:15:28', 0),
(26, 24, 35, 2, '490', '2021-10-28 02:28:37', 2),
(27, 24, 34, 3, '490', '2021-10-28 02:28:37', 2),
(28, 26, 28, 1, '8', '2021-11-15 06:33:02', 0),
(29, 26, 26, 1, '8', '2021-11-15 06:33:02', 0),
(30, 26, 27, 1, '8', '2021-11-15 06:33:02', 0),
(31, 26, 37, 2, '8', '2021-11-15 06:33:02', 0),
(32, 27, 28, 1, '481', '2021-11-14 08:57:37', 2),
(33, 27, 26, 1, '481', '2021-11-14 08:57:37', 2),
(34, 27, 27, 1, '481', '2021-11-14 08:57:37', 2),
(35, 27, 37, 2, '481', '2021-11-14 08:57:37', 2),
(36, 24, 28, 7, '5854-2021-11-16-10-10-38', '2021-11-16 09:25:36', 2),
(37, 24, 28, 7, '5170-2021-11-16-10-11-14', '2021-11-16 09:22:15', 2),
(38, 24, 35, 3, '5170-2021-11-16-10-11-14', '2021-11-16 09:22:15', 2),
(39, 24, 26, 1, '5170-2021-11-16-10-11-14', '2021-11-16 09:22:15', 2),
(40, 24, 27, 1, '5170-2021-11-16-10-11-14', '2021-11-16 09:22:15', 2),
(41, 24, 28, 7, '9300-2021-11-16-10-11-50', '2021-11-16 09:11:50', 0),
(42, 24, 28, 7, '2145-2021-11-16-10-15-30', '2021-11-16 09:15:30', 0),
(43, 24, 27, 1, '8891-2021-11-16-10-15-42', '2021-11-16 09:15:42', 0),
(44, 29, 26, 1, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(45, 29, 35, 3, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(46, 29, 34, 3, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(47, 29, 24, 1, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(48, 29, 23, 1, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(49, 29, 5, 10, '8849-2021-11-16-16-49-50', '2021-11-16 15:49:50', 0),
(50, 30, 36, 1, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0),
(51, 30, 22, 1, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0),
(52, 30, 21, 3, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0),
(53, 30, 16, 1, '1351-2021-11-22-04-40-47', '2021-11-22 03:40:47', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `tensanpham`, `sanpham_id`, `giasanpham`, `hinhanh`, `soluong`) VALUES
(130, 'LG Boom Blast Speaker', 36, '180', 'mm2.jpg', 5),
(131, 'Moto X4 (6 GB)', 24, '233', 'mk2.jpg', 1),
(132, 'Điện thoại LG', 16, '8500000', 'dienthoai_lg.jpg', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `email`, `password`, `giaohang`, `note`) VALUES
(21, 'Minh123', '09092889912', 'Ben Tre', 'minh1@123', '202cb962ac59075b964b07152d234b70', 1, 'nhanh'),
(22, 'Huyền', '0909286629', 'Cần Thơ', 'huyen@123', '202cb962ac59075b964b07152d234b70', 0, 'None'),
(23, 'Ngân', '0909286688', 'Bến Tre', 'ngan@123', '202cb962ac59075b964b07152d234b70', 0, 'None'),
(24, 'Hoà123', '12345678', 'Chợ123', 'hoa@123', '202cb962ac59075b964b07152d234b70', 1, 'None'),
(25, '123asd', '2134', '123', '213@aasd', '202cb962ac59075b964b07152d234b70', 0, NULL),
(26, 'Nhi', '09090123', '23sd', '123@123', '202cb962ac59075b964b07152d234b70', 1, '2'),
(28, 'Thanh', '0909188213', 'HCM', 'thanh@gmail.com', '202cb962ac59075b964b07152d234b70', 0, NULL),
(29, 'Thành', '0909123864', '123c', 'thanh@123', '202cb962ac59075b964b07152d234b70', 0, NULL),
(30, 'Thảo', '090912823', 'Bến', 'nhi@gmail.com', '202cb962ac59075b964b07152d234b70', 0, NULL),
(31, 'Quyên', '090912234', 'Bến Tre', 'quyen@gmail.com', '202cb962ac59075b964b07152d234b70', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sp_khuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL DEFAULT 0,
  `sanpham_hot` int(11) NOT NULL DEFAULT 0,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sp_khuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(5, 3, 'Máy giặt Panasonic', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem', '7000000', '5900000', 1, 1, 0, 'm8.jpg'),
(16, 4, 'Điện thoại LG', 'Bền', 'Đẹp', '9000000', '8500000', 0, 0, 11, 'dienthoai_lg.jpg'),
(21, 4, 'Samsung Galaxy J7', 'dep', 'dep', '6000000', '5600000', 0, 0, 9, 'm1.jpg'),
(22, 4, 'OPPO A37f', 'dep', 'dep', '6500000', '6000000', 0, 0, 22, 'm2.jpg'),
(23, 4, 'Infinix Hot S3', 'dep', 'dep', '300', '290', 0, 0, 11, 'mk1.jpg'),
(24, 4, 'Moto X4 (6 GB)', 'dep', 'dep', '240', '233', 0, 0, 31, 'mk2.jpg'),
(25, 4, 'iVooMi i Series', 'dep', 'dep', '260', '249', 0, 0, 12, 'mk3.jpg'),
(26, 13, 'Dell Vostro Laptop', 'dep', 'dep', '260', '252', 0, 0, 0, 'mk4.jpg'),
(27, 13, 'Acer Laptop', 'dep', 'dep', '260', '240', 0, 0, 0, 'mk5.jpg'),
(28, 13, 'Lenovo ', 'dep', 'dep', '320', '300', 0, 0, 0, 'mk6.jpg'),
(29, 5, 'Sony 80 cm (32 inches)', 'dep', 'dep', '340', '320', 0, 0, 4, 'm4.jpg'),
(30, 5, 'Artis Speaker', 'dep', 'dep', '399', '349', 0, 1, 2, 'm5.jpg'),
(31, 5, 'Philips Speakers', 'dep', 'dep', '300', '249', 0, 0, 4, 'm6.jpg'),
(34, 5, 'Microwave Oven', 'dep', 'dep', '300', '280', 0, 0, 1, 'm9.jpg'),
(35, 5, 'Boat Rockerz Headset', 'dep', 'dep', '320', '350', 0, 0, 0, 'mm1.jpg'),
(36, 5, 'LG Boom Blast Speaker', 'dep', 'dep', '200', '180', 0, 0, 4, 'mm2.jpg'),
(37, 14, 'Nikon Camera', 'dep', 'dep', '230', '200', 0, 1, 0, 'mm3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'bg.jpg', 'slider khuyến mãi', 1),
(2, 'a4.jpg', 'slider 50%', 0),
(3, 'b2.jpg', '', 1),
(5, 'b3.jpg', '', 1),
(8, 'b4.jpg', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_views`
--

CREATE TABLE `tbl_views` (
  `view_id` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_views`
--

INSERT INTO `tbl_views` (`view_id`, `view`) VALUES
(1, 769);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuctin`
--
ALTER TABLE `tbl_danhmuctin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_views`
--
ALTER TABLE `tbl_views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuctin`
--
ALTER TABLE `tbl_danhmuctin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_views`
--
ALTER TABLE `tbl_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
