-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 03:36 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(11) NOT NULL,
  `BookName` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `BookAuthor` varchar(60) COLLATE utf8_bin NOT NULL,
  `Regno` varchar(60) COLLATE utf8_bin NOT NULL,
  `Copyno` varchar(2) COLLATE utf8_bin NOT NULL,
  `Type` varchar(20) COLLATE utf8_bin NOT NULL,
  `img` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookName`, `BookAuthor`, `Regno`, `Copyno`, `Type`, `img`) VALUES
(3, 'ลับลวงใจลับลวงใจ ลับลวงใจ', 'กิ่งฉัตร', '9786162190506', '1', 'นิยาย  นิยายโรแมนติก', 'https://storage.naiin.com/system/application/bookstore/resource/product/201106/33723/1000109472_front_XXL.jpg'),
(4, 'ลางลิขิตลางลิขิต ลางลิขิต', 'กิ่งฉัตร', '9786161818791', '1', 'นิยาย  นิยายโรแมนติก', 'https://storage.naiin.com/system/application/bookstore/resource/product/201703/211202/1000195067_front_XXL.jpg'),
(5, 'อาฟเตอร์เอิร์ธ After Earth', 'ปีเตอร์ เดวิด', '9789742897031', '1', 'Books', 'https://storage.naiin.com/system/application/bookstore/resource/product/201305/113569/1000144242_front_XXL.jpg'),
(6, 'เทพยุทธ์เซียน GLORY เล่ม 15', 'หูเตี๋ยหลาน', '9786164570917', '1', 'Books', 'https://storage.naiin.com/system/application/bookstore/resource/product/201807/239170/1000209512_front_XXL.jpg'),
(7, 'หอบ๊องคนบวม เล่ม 6', 'ZENSHU', '9786163247827', '1', 'Books', 'https://storage.naiin.com/system/application/bookstore/resource/product/201807/238722/1000209275_front_XXL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `memberid` int(7) NOT NULL,
  `DateBrw` datetime NOT NULL,
  `DateReturn` datetime NOT NULL,
  `BookID` varchar(30) COLLATE utf8_bin NOT NULL,
  `BookName` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `memberid`, `DateBrw`, `DateReturn`, `BookID`, `BookName`) VALUES
(4, 2, '2018-09-02 20:07:25', '2018-09-09 20:07:25', '7', 'หอบ๊องคนบวม เล่ม 6');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberid` int(7) NOT NULL,
  `MTitle` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `MFname` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `MLname` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `MGender` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `MLevel` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `MRoom` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `Username` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Password` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberid`, `MTitle`, `MFname`, `MLname`, `MGender`, `MLevel`, `MRoom`, `Username`, `Password`) VALUES
(2, 'นาย', 'นูรุดดีน', 'แมะตีเมาะ', 'ชาย', 'ปวส.', '2', 'deen', 'qwaszx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
