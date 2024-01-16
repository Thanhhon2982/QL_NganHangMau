-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2024 lúc 07:03 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bbdms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`, `login_date`) VALUES
(1, 'nguyenthanhhon2982@gmail.com', '2023-12-03 14:03:42', '2023-12-03'),
(2, 'nguyenthanhhon2982@gmail.com', '2023-12-04 14:53:16', '2023-12-04'),
(3, 'nguyenthanhhon2982@gmail.com', '2023-12-05 14:08:33', '2023-12-05'),
(4, 'thaoquyen02@gmail.com', '2023-12-05 16:21:49', '2023-12-05'),
(5, 'thaoquyen02@gmail.com', '2023-12-08 14:06:54', '2023-12-08'),
(6, 'thaoduong@gmail.com', '2023-12-08 14:10:14', '2023-12-08'),
(7, 'thaoquyen02@gmail.com', '2023-12-08 14:23:41', '2023-12-08'),
(8, 'buiducdanh@gmail.com', '2023-12-08 14:25:00', '2023-12-08'),
(9, 'longvu@gmail.com', '2023-12-08 14:25:47', '2023-12-08'),
(10, 'minhduc236@gmail.com', '2023-12-08 14:26:43', '2023-12-08'),
(11, 'tqthang@gmail.com', '2023-12-08 14:27:09', '2023-12-08'),
(12, 'doantrang@gmail.com', '2023-12-08 14:27:45', '2023-12-08'),
(13, 'quanghuy@gmail.com', '2023-12-08 14:28:04', '2023-12-08'),
(14, 'dtrung@gmail.com', '2023-12-08 14:28:50', '2023-12-08'),
(15, 'nguyenthanhhon2982@gmail.com', '2023-12-08 14:29:11', '2023-12-08'),
(16, 'thaoquyen02@gmail.com', '2023-12-09 09:48:59', '2023-12-09'),
(17, 'thaoquyen02@gmail.com', '2023-12-09 16:47:36', '2023-12-09'),
(18, 'thaoquyen02@gmail.com', '2023-12-20 14:05:24', '2023-12-20'),
(19, 'nguyenthanhhon2982@gmail.com', '2023-12-21 14:11:43', '2023-12-21'),
(20, 'nguyenthanhhon2982@gmail.com', '2023-12-21 15:08:53', '2023-12-21'),
(21, 'nguyenthanhhon2982@gmail.com', '2023-12-21 15:11:22', '2023-12-21'),
(22, 'nguyenthanhhon2982@gmail.com', '2023-12-21 15:12:33', '2023-12-21'),
(23, 'nguyenthanhhon2982@gmail.com', '2023-12-21 15:15:29', '2023-12-21'),
(24, 'nguyenthanhhon2982@gmail.com', '2023-12-21 15:18:56', '2023-12-21'),
(25, 'nguyenthanhhon2982@gmail.com', '2023-12-28 14:20:56', '2023-12-28'),
(26, 'nguyenthanhhon2982@gmail.com', '2024-01-02 12:16:13', '2024-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` text DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Avatar` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `Avatar`, `AdminRegdate`) VALUES
(2, 'Nguyễn Thanh Hơn ', 'admin', '0344517822', 'nguyenthanhhon2982@gmail.com', '4297f44b13955235245b2497399d7a93', 'avatar.jpg', '2023-12-11 12:52:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblblooddonars`
--

CREATE TABLE `tblblooddonars` (
  `id` int(11) NOT NULL,
  `FullName` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Message` mediumtext CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblblooddonars`
--

INSERT INTO `tblblooddonars` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `status`, `Password`, `img`) VALUES
(14, 'Nguyễn Thanh Hơn', '0344517822', 'nguyenthanhhon2982@gmail.com', 'Nam', 21, 'O', '622/10 Cộng Hòa, Phường 13, Tân Bình', 'Xin chào tôi là ...', '2023-11-29 12:38:10', 1, '202cb962ac59075b964b07152d234b70', 'Hon.jpg'),
(15, 'Nguyễn Lê Thảo Quyên', '0341241241', 'thaoquyen02@gmail.com', 'Nữ', 21, 'A', 'Gò Vấp, TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-05 16:21:34', 1, '8c533bc2d61aa1e5e4f0dfb9bc1d3c34', 'Quyen.jpg'),
(16, 'Nguyễn Thị Thảo Dương', '0931241214', 'thaoduong@gmail.com', 'Nữ', 21, 'A', 'Tân Phú,TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 13:54:41', 1, '84fbef17f8fcb9fe3e583a94b30daa90', 'Duong.jpg'),
(17, 'Bùi Đức Danh', '0331525623', 'buiducdanh@gmail.com', 'Nam', 21, 'O', 'Bình Tân, TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 13:54:41', 1, 'c830240d61e140721e27e8349617a357', 'Danh.png'),
(18, 'Huỳnh Long Vũ', '0344124512', 'longvu@gmail.com', 'Nam', 21, 'O', 'Tân Bình, TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 13:54:41', 1, 'ad7dbd69c764298cf4cc28b9a81f484c', 'Vu.jpg'),
(19, 'Tạ Quang Thắng', '0345762913', 'tqthang@gmail.com', 'Nam', 21, 'O', 'Tân Bình, TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 13:54:41', 1, 'a081b22f804cb2f6a555ad28e89c0336', 'Thang.jpg'),
(20, 'Vũ Minh Đức', '0358728351', 'minhduc236@gmail.com', 'Nam', 21, 'A', 'Hóc Môn, TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 13:54:41', 1, '1db30d698fe48bd994450a1128f52915', 'Pan.jpg'),
(21, 'Trương Thị Hoàng Đoan Trang', '0357238984', 'doantrang@gmail.com', 'Nữ', 21, 'AB', 'Bình Chánh, TP HCM', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 13:54:41', 1, '279bc6e0b729e579f78314e900fc7d3a', 'Trang.jpg'),
(22, 'Âu Dương Đức Trung', '0344124241', 'dtrung@gmail.com', 'Nam', 21, 'O', 'Phú Nhuận', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 14:22:26', 1, '2042386396def3c26a2bd1af64ae5623', 'Trung.jpg'),
(23, 'Phạm Quang Huy', '0345823213', 'quanghuy@gmail.com', 'Nam', 21, 'AB', 'Hiệp Bình, Gò Vấp', 'Hãy tham gia chiến dịch hiến máu cùng chúng tôi! Mỗi giọt máu của bạn có thể cứu sống. Hãy đến, hiến máu và chung tay xây dựng cộng đồng mạnh mẽ. Cảm ơn bạn đã đồng hành!', '2023-12-08 14:22:26', 1, '2b3e975063ae9985de336b245fa6f320', 'Huy.jpg'),
(24, 'Nguyễn Văn An', '0344571821', 'nguyenvanan@gmail.com', 'Nam', 26, 'O', 'Tân Bình, TP HCM', 'Tôi là ....', '2023-12-28 11:16:07', 1, 'b1a2fda470a0515f00913c7fb34395d1', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`id`, `BloodGroup`, `PostingDate`) VALUES
(1, 'A', '2022-04-30 20:33:50'),
(2, 'AB', '2022-04-30 20:34:00'),
(3, 'O', '2022-04-30 20:34:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbloodrequirer`
--

CREATE TABLE `tblbloodrequirer` (
  `ID` int(10) NOT NULL,
  `BloodDonarID` int(10) DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EmailId` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `BloodRequirefor` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Message` mediumtext CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbloodrequirer`
--

INSERT INTO `tblbloodrequirer` (`ID`, `BloodDonarID`, `name`, `EmailId`, `ContactNumber`, `BloodRequirefor`, `Message`, `ApplyDate`) VALUES
(11, 15, 'Nguyễn Thanh Hơn', 'nguyenthanhhon2982@gmail.com', 344517822, 'Mẹ', 'a', '2024-01-02 13:03:49'),
(12, 15, 'Nguyễn Thanh Hơn', 'nguyenthanhhon2982@gmail.com', 344517822, 'Mẹ', 'a', '2024-01-02 13:05:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, '120A Trần Kế Xương, Phường 07,Phú Nhuận, Hồ Chí Minh', '0950080108@sv.hcmunre.edu.vn', '+84 344 517 822');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(11, 'Nguyễn Thanh Hơn', 'nguyenthanhhon2982@gmail.com', '0344517822', 'Hãy ....', '2024-01-02 13:18:12', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(3, 'Giới thiệu', 'gioithieu', '<div style=\"text-align: justify;font-family:Didot;\"><section style=\"font-size: 1.3rem;\">Hệ thống quản lý ngân hàng máu cam kết kết nối lòng nhân ái và sức khỏe. Chúng tôi là một đội ngũ đam mê, cam kết đóng góp vào việc cứu sống và cải thiện chất lượng cuộc sống bằng cách quản lý hiệu quả nguồn cung máu. Sứ mệnh của chúng tôi là tạo ra một nền tảng linh hoạt và dễ sử dụng, giúp các tổ chức y tế và người hiến máu nhanh chóng kết nối, chia sẻ và cung cấp máu đến những nơi cần thiết.<br>Chúng tôi là một đội ngũ đa dạng, gồm những chuyên gia trong lĩnh vực công nghệ thông tin, y tế và quản lý dự án, đồng lòng hướng tới mục tiêu chung: cung cấp giải pháp hiệu quả và đột phá cho hệ thống ngân hàng máu. Chúng tôi không chỉ chú trọng vào sự tiện lợi và linh hoạt, mà còn đặt mình vào vị trí của những người phục vụ cộng đồng y tế để tạo ra những giải pháp thực sự đáp ứng nhu cầu thực tế.</br><h2>Tại Sao Chọn Hệ thống quản lý ngân hàng máu?</h2><ul><li><strong>Hiệu Quả và Tiết Kiệm Thời Gian:</strong> Hệ thống của chúng tôi tối ưu hóa quy trình quản lý ngân hàng máu, giảm thiểu công việc thủ công và tăng cường hiệu suất làm việc.</li><li><strong>An Toàn và Bảo Mật:</strong> Chúng tôi đặt sự an toàn và bảo mật dữ liệu lên hàng đầu, đảm bảo thông tin quan trọng về máu và người hiến máu được bảo vệ tối đa.</li><li><strong>Hỗ Trợ Khách Hàng Tận Tâm:</strong> Đội ngũ hỗ trợ khách hàng của chúng tôi luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc, đảm bảo rằng mọi người dùng đều có trải nghiệm tốt nhất trên Hệ thống quản lý ngân hàng máu.</li> </ul> </section></div>\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bgroup` (`BloodGroup`);

--
-- Chỉ mục cho bảng `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BloodGroup` (`BloodGroup`),
  ADD KEY `BloodGroup_2` (`BloodGroup`);

--
-- Chỉ mục cho bảng `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `donorid` (`BloodDonarID`);

--
-- Chỉ mục cho bảng `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
