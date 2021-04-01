-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2019 lúc 06:03 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `forum`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `MACD` int(11) NOT NULL,
  `TENCD` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `MOTA` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENTK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYTAO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SOBAIPOST` int(11) NOT NULL DEFAULT '0',
  `ISLOCKED` bit(1) NOT NULL DEFAULT b'0',
  `MATMC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chude`
--

INSERT INTO `chude` (`MACD`, `TENCD`, `MOTA`, `TENTK`, `NGAYTAO`, `SOBAIPOST`, `ISLOCKED`, `MATMC`) VALUES
(1, 'Seagame 30', 'Các lịch thi đấu, diễn biến Sg30\r\n', 'admin', '2019-12-13 00:47:25', 1, b'0', 2),
(2, 'Thời trang', 'Chuyên gia thời trang', 'admin', '2019-12-13 00:00:00', 1, b'1', 2),
(3, 'Pháp luật', 'Kiến thức về pháp luật\r\n', 'admin', '2019-12-18 08:15:12', 0, b'0', 1),
(4, 'Đối ngoại', 'Đối ngoại', 'admin', '2019-12-18 00:00:00', 0, b'0', 2),
(5, 'báo cáo cuối kỳ', 'pttk hdt', 'admin', '2019-12-18 00:00:00', 2, b'0', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `MAPOST` int(11) NOT NULL,
  `TENPOST` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `TENTK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `IMAGE` text COLLATE utf8_unicode_ci,
  `NGAYTAO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LUOTXEM` int(11) NOT NULL DEFAULT '0',
  `SOCMT` int(11) NOT NULL DEFAULT '0',
  `DUYET` int(2) NOT NULL DEFAULT '0',
  `MACD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`MAPOST`, `TENPOST`, `TENTK`, `NOIDUNG`, `IMAGE`, `NGAYTAO`, `LUOTXEM`, `SOCMT`, `DUYET`, `MACD`) VALUES
(13, 'Tiến Linh tiến hóa thành \"siêu tiền đạo\" của Việt Nam như thế nào?', 'admin', 'Môn bóng đá nam SEA Games 30 không chỉ khép lại với chức vô địch được chờ đợi qua nhiều thế hệ của U22 Việt Nam. Đội bóng sao vàng còn tìm được lời khẳng định chắc nịch cho vị trí tiền đạo mũi nhọn, của U23 Việt Nam và cả ĐT Việt Nam, đó chính là Nguyễn Tiến Linh.\r\n\r\nNếu coi siêu phẩm vào lưới UAE trong khuôn khổ vòng loại World Cup 2022 là một trang mới trong sự nghiệp của Tiến Linh, thì những gì tiền đạo này thể hiện ở SEA Games 30 càng tô đậm nhận định trên', '', '2019-12-22 19:36:38', 23, 0, 1, 1),
(14, 'Giới thiệu chuyên mục Lập trình ứng dụng Windows - Csharp C#', 'admin', 'C# là một ngôn ngữ lập trình hướng đối tượng được phát triển bởi Microsoft.', '', '2019-12-23 11:42:57', 2, 0, 1, 5),
(15, 'Bài toán sinh lời hấp dẫn từ Lavieen Hội An', 'admin', 'Cơ hội vàng để đầu tư\r\n\r\nCảnh vật nên thơ, ẩm thực phong phú và nét văn hóa truyền thống được lưu giữ gần như nguyên vẹn khiến Hội An luôn là điểm đến yêu thích của du khách. Đô thị cổ này luôn nằm trong top đầu trên các bảng xếp hạng du lịch của các tổ chức quốc tế và tạp chí uy tín. Thống kê cho thấy trong 6 tháng đầu năm 2019, có khoảng 3 triệu lượt khách đến tham quan và lưu trú tại Hội An, tăng 15.62% so với cùng kỳ.\r\n\r\nBài toán sinh lời hấp dẫn từ Lavieen Hội An - 1\r\n\r\nHội An, thị trường nhiều tiềm năng để phát triển BĐS du lịch\r\n\r\nQuá trình gia tăng nhanh chóng của lượng du khách quốc tế đến Hội An đang đặt ra bài toán mới cho ngành dịch vụ du lịch khi tại đây vẫn đang thiếu các dự án nghỉ dưỡng chất lượng. Hiện tại, giá thuê khách sạn cao cấp tại Hội An khoảng 1.5 - 2 triệu/phòng/đêm, trong khi đó các khu vực có vị trí đẹp, gần sông, cạnh biển thì giá sẽ cao hơn, dao động khoảng 2 - 3 triệu/phòng/đêm. Những biệt thự nghỉ dưỡng 5 sao có mức giá đắt đỏ lên tới 20 - 30 triệu/đêm', '', '2019-12-23 11:44:20', 3, 1, 1, 2),
(18, 'Báo cáo cuối kỳ', 'admin', 'Phân tích thiết kế hướng đối tượng', '', '2019-12-23 12:01:38', 2, 1, 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TENTK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HOTEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GIOITINH` bit(1) DEFAULT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `SDT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AVATAR` text COLLATE utf8_unicode_ci,
  `LOAITK` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TENTK`, `MATKHAU`, `HOTEN`, `GIOITINH`, `DIACHI`, `NGAYSINH`, `SDT`, `EMAIL`, `AVATAR`, `LOAITK`) VALUES
('a', 'a', 'aa', NULL, NULL, NULL, NULL, 'a@gmail.com', NULL, 2),
('admin', 'admin', 'admin', b'1', 'lhp', '2019-12-04', '1234342', 'admin@gmail.com', 'df1.jpg', 1),
('huy', 'huy', 'HuyGia', NULL, NULL, NULL, NULL, 'giahuy@gmail.com', NULL, 2),
('tran', 'tran', 'TrậnNguyễn ', NULL, NULL, NULL, NULL, 'trannqt@gmail.com', 'download.jpg', 2),
('trannqt', '1', 'Nguyễn Quang Trường Trận', b'0', 'lhp', '2019-12-03', '21345', '1@gmail.com', 'df3.jpg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thaoluan`
--

CREATE TABLE `thaoluan` (
  `MATL` int(11) NOT NULL,
  `TENTK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MAPOST` int(11) NOT NULL,
  `NGAYTL` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NOIDUNG` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `IMAGE` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thaoluan`
--

INSERT INTO `thaoluan` (`MATL`, `TENTK`, `MAPOST`, `NGAYTL`, `NOIDUNG`, `IMAGE`) VALUES
(6, 'admin', 15, '2019-12-23 11:48:43', 'Việt Nam cố lên', ''),
(7, 'admin', 18, '2019-12-23 12:02:29', 'test', 'quang-hai-dau-son-heung-min-quang-h---i7-1577026082-482-width660height371-5762365209.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumuc`
--

CREATE TABLE `thumuc` (
  `MATM` int(11) NOT NULL,
  `TENTM` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `TENTK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYTAO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SOTMC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thumuc`
--

INSERT INTO `thumuc` (`MATM`, `TENTM`, `TENTK`, `NGAYTAO`, `SOTMC`) VALUES
(1, 'Thư mục gốc', 'admin', '2019-12-13 00:45:24', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumuccon`
--

CREATE TABLE `thumuccon` (
  `MATMC` int(11) NOT NULL,
  `TENTMC` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENTK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYTAO` datetime DEFAULT CURRENT_TIMESTAMP,
  `SOCD` int(11) NOT NULL DEFAULT '0',
  `MATM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thumuccon`
--

INSERT INTO `thumuccon` (`MATMC`, `TENTMC`, `TENTK`, `NGAYTAO`, `SOCD`, `MATM`) VALUES
(1, 'Việt Nam', 'admin', '2019-12-13 00:46:13', 0, 1),
(2, 'Nước ngoài', 'admin', '2019-12-13 02:21:18', 0, 1),
(3, 'Môn học', 'admin', '2019-12-18 09:18:20', 10, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`MACD`),
  ADD KEY `chude_ibfk_1` (`MATMC`),
  ADD KEY `chude_ibfk_2` (`TENTK`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`MAPOST`),
  ADD KEY `TENTK` (`TENTK`),
  ADD KEY `MACD` (`MACD`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TENTK`);

--
-- Chỉ mục cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD PRIMARY KEY (`MATL`),
  ADD KEY `POSTID` (`MAPOST`),
  ADD KEY `TENTK` (`TENTK`);

--
-- Chỉ mục cho bảng `thumuc`
--
ALTER TABLE `thumuc`
  ADD PRIMARY KEY (`MATM`),
  ADD KEY `TENTK` (`TENTK`);

--
-- Chỉ mục cho bảng `thumuccon`
--
ALTER TABLE `thumuccon`
  ADD PRIMARY KEY (`MATMC`),
  ADD KEY `MATM` (`MATM`),
  ADD KEY `TENTK` (`TENTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chude`
--
ALTER TABLE `chude`
  MODIFY `MACD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `MAPOST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  MODIFY `MATL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thumuc`
--
ALTER TABLE `thumuc`
  MODIFY `MATM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thumuccon`
--
ALTER TABLE `thumuccon`
  MODIFY `MATMC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chude`
--
ALTER TABLE `chude`
  ADD CONSTRAINT `chude_ibfk_1` FOREIGN KEY (`MATMC`) REFERENCES `thumuccon` (`MATMC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chude_ibfk_2` FOREIGN KEY (`TENTK`) REFERENCES `taikhoan` (`TENTK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`TENTK`) REFERENCES `taikhoan` (`TENTK`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`MACD`) REFERENCES `chude` (`MACD`);

--
-- Các ràng buộc cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD CONSTRAINT `thaoluan_ibfk_1` FOREIGN KEY (`MAPOST`) REFERENCES `post` (`MAPOST`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `thaoluan_ibfk_2` FOREIGN KEY (`TENTK`) REFERENCES `taikhoan` (`TENTK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `thumuc`
--
ALTER TABLE `thumuc`
  ADD CONSTRAINT `thumuc_ibfk_1` FOREIGN KEY (`TENTK`) REFERENCES `taikhoan` (`TENTK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `thumuccon`
--
ALTER TABLE `thumuccon`
  ADD CONSTRAINT `thumuccon_ibfk_1` FOREIGN KEY (`MATM`) REFERENCES `thumuc` (`MATM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `thumuccon_ibfk_2` FOREIGN KEY (`TENTK`) REFERENCES `taikhoan` (`TENTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
