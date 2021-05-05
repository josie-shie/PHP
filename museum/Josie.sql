-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021 年 05 月 05 日 16:38
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `Josie`
--

-- --------------------------------------------------------

--
-- 資料表結構 `museum`
--

CREATE TABLE `museum` (
  `id` int(10) NOT NULL COMMENT '流水號',
  `museumId` int(10) NOT NULL COMMENT '博物館編號',
  `museumName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博物館名稱',
  `museumCity` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '縣市編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `museum`
--

INSERT INTO `museum` (`id`, `museumId`, `museumName`, `museumCity`) VALUES
(1, 1, '臺北市立美術館', '1'),
(2, 2, '台北當代藝術館', '1'),
(3, 3, '臺北市立忠泰美術館', '1'),
(4, 4, '順益台灣美術館', '1'),
(5, 5, '兒童藝術教育中心', '1'),
(6, 6, '楊英風美術館', '1'),
(7, 7, '北師美術館', '1'),
(8, 8, '國立臺灣師範大學美術館', '1'),
(9, 9, '長流美術館', '1'),
(10, 10, '典藏美術館', '1'),
(11, 11, '天使美術館', '1'),
(12, 12, '巫登益美術館', '1'),
(13, 13, '鳳甲美術館', '1'),
(14, 14, '蘇荷兒童美術館', '1'),
(15, 15, '關渡美術館', '1'),
(16, 16, '花博公園美術園區', '1'),
(17, 17, '台師大德群畫廊', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `museum`
--
ALTER TABLE `museum`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `museum`
--
ALTER TABLE `museum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
