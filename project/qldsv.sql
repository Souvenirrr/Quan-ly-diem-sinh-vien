-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2018 lúc 05:34 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `classid` int(11) NOT NULL,
  `nameclass` varchar(30) DEFAULT NULL,
  `scienceid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`classid`, `nameclass`, `scienceid`) VALUES
(0, 'ATTT K14A', 'ATTT'),
(1, 'CNTT K14A', 'CNTT'),
(2, 'ATTT K14B', 'ATTT'),
(3, 'TKDH K14B', 'TTDPT'),
(4, 'CNTT K14C', 'CNTT'),
(5, 'TKDH K14A', 'TTDPT'),
(6, 'DDT K14A', 'CNTDH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result`
--

CREATE TABLE `result` (
  `studentid` varchar(20) DEFAULT NULL,
  `subjectid` varchar(20) DEFAULT NULL,
  `diemcc` float DEFAULT NULL,
  `diemthi` float DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `result`
--

INSERT INTO `result` (`studentid`, `subjectid`, `diemcc`, `diemthi`, `semester`) VALUES
('DTC155D4802010103', 'PIN231', 8, 6.5, '2017-2018-1'),
('DTC155D4802010103', 'GIS131', 6.5, 7, '2017-2018-2'),
('DTC155D4802010103', 'PML121', 5, 1, '2017-2018-2'),
('DTC15HD4802010069', 'PIN231', 7, 6, '2017-2018-1'),
('DTC155D4802010203', 'PML121', 7.5, 8.5, '2017-2018-1'),
('DTC155D4802010203', 'PIN231', 5, 6, '2018-2019-1'),
(NULL, NULL, NULL, NULL, '2015-2016-1'),
(NULL, NULL, NULL, NULL, '2015-2016-2'),
(NULL, NULL, NULL, NULL, '2016-2017-1'),
(NULL, NULL, NULL, NULL, '2016-2017-2'),
(NULL, NULL, NULL, NULL, '2018-2019-2'),
('DTC155D4802010305', 'GIS131', 5, 8, NULL),
('DTC155D4802010203', 'ADP231', 4, 6, NULL),
('DTC155D4802010203', 'ENG132', 5, 8, NULL),
('DTC155D4802010203', 'FOL121', 9, 7.5, NULL),
('DTC155D4802010203', 'GTC113', 7, 5, NULL),
('DTC155D4802010203', 'PHY130', 7, 6.5, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `science`
--

CREATE TABLE `science` (
  `scienceid` varchar(20) NOT NULL,
  `namescience` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `science`
--

INSERT INTO `science` (`scienceid`, `namescience`) VALUES
('ATTT', 'An toàn thông tin'),
('CNTDH', 'Công nghệ tự động hóa'),
('CNTT', 'Công nghệ thông tin'),
('TTDPT', 'Truyền thông đa phương tiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `studentid` varchar(20) NOT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(3) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `password` varchar(65) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `lv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`studentid`, `fullname`, `birthday`, `gender`, `address`, `password`, `classid`, `lv`) VALUES
('', '', '0000-00-00', '', '', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 0),
('admin', 'admin', NULL, NULL, NULL, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 1),
('DTC155D129429384', 'Nguyễn Văn An', '1997-06-11', 'Nam', 'Nam Định', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 6, 0),
('DTC155D4802010103', 'Trần Công Tùng', '1997-02-19', 'Nam', 'Ha Noi', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 5, 0),
('DTC155D4802010203', 'Nguyễn Thị Anh', '1998-09-15', 'Nữ', 'Bắc Giang', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0, 0),
('DTC155D4802010204', 'Nguyễn Thị Lan', '1998-09-11', 'Nữ', 'Thái Nguyên', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, 0),
('DTC155D4802010305', 'Nguyễn Ngọc Ánh', '1997-05-20', 'Nữ', 'Cao Bằng', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 4, 0),
('DTC15HD4802010069', 'Nguyễn Đăng Hải', '1997-05-05', 'Nam', 'Nam Định', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 0),
('SV01', 'Nguyễn Văn A', '1997-06-03', 'Nam', 'Thái Nguyên', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `subjectid` varchar(20) NOT NULL,
  `namesubject` varchar(50) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`subjectid`, `namesubject`, `number`) VALUES
('ADP231', 'Lập trình nâng cao', 3),
('ENG132', 'Anh văn 2', 3),
('FOL121', 'Pháp luật đại cương', 2),
('GIS131', 'Tin học đại cương', 3),
('GTC113', 'Giáo dục thể chất 3 (Bóng rổ)', 1),
('PHY130', 'Vật lý', 3),
('PIN231', 'Nhập môn lập trình', 3),
('PJA331', 'Lập trình Java', 3),
('PML121', 'Những nguyên lí cơ bản của Mác- Lê Nin', 2),
('PML132', 'Những nguyên lý cơ bản của CN Mác-Lênin', 3),
('POS221', 'Nguyên lý các hệ điều hành', 2),
('PRS221', 'Xác suất thống kê', 2),
('VNP121', 'Tiếng việt thực hành', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `fk_mak` (`scienceid`);

--
-- Chỉ mục cho bảng `result`
--
ALTER TABLE `result`
  ADD KEY `fk_masv` (`studentid`),
  ADD KEY `fk_mamon` (`subjectid`);

--
-- Chỉ mục cho bảng `science`
--
ALTER TABLE `science`
  ADD PRIMARY KEY (`scienceid`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `fk_malop` (`classid`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_mak` FOREIGN KEY (`scienceid`) REFERENCES `science` (`scienceid`);

--
-- Các ràng buộc cho bảng `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_mamon` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`subjectid`),
  ADD CONSTRAINT `fk_masv` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_malop` FOREIGN KEY (`classid`) REFERENCES `class` (`classid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
