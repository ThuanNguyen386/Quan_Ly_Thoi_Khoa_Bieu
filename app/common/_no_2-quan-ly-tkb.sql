-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 11:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: ` no.2-quan-ly-tkb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2022-01-07 09:29:40', '2021-12-30 12:30:43'),
(2, 'hocsinh', 'e10adc3949ba59abbe56e057f20f883e', 2, '', '2022-01-07 09:16:50', '2021-12-31 10:11:01'),
(3, 'giaovien', 'e10adc3949ba59abbe56e057f20f883e', 3, '', '2022-01-07 12:39:43', '2021-12-31 12:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) NOT NULL,
  `school_year` char(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `week_day` char(10) NOT NULL,
  `lesson` char(10) NOT NULL,
  `notes` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `school_year`, `subject_id`, `teacher_id`, `week_day`, `lesson`, `notes`, `updated`, `created`) VALUES
(11, '3', 1, 1, 'Thứ 4', 'l73291.txt', 'n41.txt', '2022-01-08 16:38:57', '2022-01-08 16:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `school_year` char(10) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `avatar`, `description`, `school_year`, `updated`, `created`) VALUES
(1, 'English', 'english.jpg', 'Ngoại ngữ - a', '2', '2022-01-08 22:15:24', '2022-01-04 15:26:52'),
(2, 'Literature', 'literature.jpg', 'Mon van hoc', '3', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(3, 'Statistics', 'statistic.jpg', 'Xac suat', '3', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(4, 'Chemistry', 'chemistry.jpg', 'Mon hoa cho SV', '2', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(5, 'Web design', 'mathematics.jpg', 'Thiet ke web', '4', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(11, 'Toán lớp 10', 'sach-giao-khoa-dai-so-lop-10.jpg', 'Toán 10 gồm: Đại số và Giải tích', '3', '2022-01-03 17:06:02', '2022-01-01 12:05:43'),
(12, 'Toán lớp 18', 'sach-giao-khoa-toan-8.jpg', 'Toán 8 gồm: Đại số và Giải tích', '1', '2022-01-03 17:06:02', '2022-01-01 12:05:43'),
(13, 'Toán lớp 9', 'sach-giao-khoa-toan-lop-9.jpg', 'Nội dung chương trình Toán lớp 9 bao gồm hai phần: Đại số và Hình học và chia thành 8 chủ đề', '2', '2022-01-03 17:06:02', '2021-12-31 13:35:31'),
(14, 'Đại số tuyến tính', 'sach-giao-khoa-dai-so-lop-10.jpg', 'đay là môn đại sô tuyến tính', '1', '2022-01-03 16:44:25', '2022-01-03 16:01:25'),
(15, 'Đại số tuyến tính', 'sach-giao-khoa-toan-lop-9.jpg', 'dd', '1', '2022-01-03 17:28:25', '2022-01-03 17:01:25'),
(16, 'Đại số tuyến tính', 'sach-giao-khoa-dai-so-lop-10.jpg', 'đây là môn đại số tuyến tính', '2021', '2022-01-03 17:41:12', '2022-01-03 17:01:12'),
(17, 'Toán 9', 'sach-giao-khoa-toan-lop-9.jpg', 'đây là toán lớp 9', '2020', '2022-01-04 09:26:14', '2022-01-04 09:01:14'),
(20, 'English', 'english.jpg', 'Ngoại ngữ', '2', '2022-01-04 00:38:19', '2021-12-30 23:08:43'),
(21, 'Literature', 'literature.jpg', 'Mon van hoc', '3', '2021-12-30 23:11:41', '2021-12-30 23:11:41'),
(31, 'Statistics', 'statistic.jpg', 'Xac suat', '3', '2021-12-30 23:11:41', '2021-12-30 23:11:41'),
(41, 'Chemistry', 'chemistry.jpg', 'Mon hoa cho SV', '2', '2021-12-30 23:11:41', '2021-12-30 23:11:41'),
(51, 'Web design', 'mathematics.jpg', 'Thiet ke web', '4', '2021-12-30 23:11:41', '2021-12-30 23:11:41'),
(60, 'Văncdef', 'dđ', 'hinh-anh-hinh-nen-heo-con-de-thuong-chi-bi-danh-cho-iphone-dep-300x169.jpg', '2', '2022-01-09 00:35:22', '2022-01-09 00:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `specialized` char(10) NOT NULL,
  `degree` char(10) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(1, 'Nguyễn Văn A', 'nva.jpg', 'Tiến sỹ khoa toán', '002', '003', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(4, 'Nguyễn Khắc Q', 'nkq.jpg', 'Phó giáo sư mời giảng', '003', '004', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(12, 'Hoàng Thị Du', 'hinh-nen-mau-xam-lap-lanh.jpg', 'aaa', '002', '002', '2022-01-09 03:24:23', '2022-01-09 03:01:23'),
(13, 'Nguyễn Văn A', 'ntd.webp', 'Tiến sỹ khoa toán', '002', '004', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(14, 'Trần Thị B', 'ntv.jpg', 'Tiến sỹ khoa lý', '002', '003', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(15, 'Hoàng Kim T', 'ntv.jpg', 'Thạc sỹ', '003', '001', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(16, 'Nguyễn Khắc Q', 'ntv.jpg', 'Phó giáo sư mời giảng', '001', '002', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(17, 'Trần Văn C', 'ntv.jpg', 'Giáo Sư khoa Toán', '002', '004', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(18, 'Nguyễn Thanh V', 'nva.jpg', 'Tiến sỹ khoa Sinh', '002', '005', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(19, 'Vũ Thu H', 'tvc.jpg', 'Tiến sỹ mời giảng', '002', '002', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(20, 'Nguyễn Thị D', 'vth.jpg', 'Thạc sỹ khoa sinh', '003', '004', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(21, 'Nguyễn Cẩm V', 'ntv.jpg', 'Tiến sỹ khoa lý', '001', '001', '2022-01-09 04:55:03', '2022-01-09 04:55:03'),
(22, 'Nguyễn Hữu H', 'nkq.jpg', 'Phó giáo sư mời giảng', '002', '001', '2022-01-09 04:55:03', '2022-01-09 04:55:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
