-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-08-24 10:25:35
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db06`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `a_seq` int(11) NOT NULL,
  `a_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_view` int(11) NOT NULL,
  `a_del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `ad`
--

INSERT INTO `ad` (`a_seq`, `a_title`, `a_view`, `a_del`) VALUES
(1, 'wfwfwvgfsvgerg', 1, 0),
(2, 'ukiukluikuk', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `footer`
--

CREATE TABLE `footer` (
  `f_seq` int(1) NOT NULL,
  `f_title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `footer`
--

INSERT INTO `footer` (`f_seq`, `f_title`) VALUES
(1, 'fgfggfegeg');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `m_seq` int(11) NOT NULL,
  `m_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_view` int(1) DEFAULT '0',
  `m_del` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `images`
--

INSERT INTO `images` (`m_seq`, `m_img`, `m_view`, `m_del`) VALUES
(3, '01C05.gif', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `m_seq` int(11) NOT NULL,
  `m_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`m_seq`, `m_id`, `m_password`, `m_delete`) VALUES
(1, 'admin', '1234', 0),
(2, 'test', '1', 0),
(4, '2adfa', '33334523', 0),
(5, '3', '44', 0),
(6, '34', '3333', 0),
(7, '334', '333', 0),
(8, '44', '44', 0),
(9, '55', '55', 0),
(10, '4rgh', '444555th', 0),
(11, 'qefwe', 'dsftht', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `mvim`
--

CREATE TABLE `mvim` (
  `m_seq` int(11) NOT NULL,
  `m_mvim` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_view` int(1) DEFAULT '0',
  `m_del` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `mvim`
--

INSERT INTO `mvim` (`m_seq`, `m_mvim`, `m_view`, `m_del`) VALUES
(1, '01C01.swf', NULL, 0),
(2, '01D08.jpg', NULL, 0),
(3, '01C03.swf', NULL, 1),
(4, '01C04.swf', NULL, 0),
(5, '01C03.swf', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `n_seq` int(11) NOT NULL,
  `n_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_view` int(1) NOT NULL DEFAULT '0',
  `n_del` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`n_seq`, `n_title`, `n_view`, `n_del`) VALUES
(1, 'Fsfggfgegfreg', 0, 0),
(2, 'DSFSDFSDFegfrg', 0, 0),
(3, 'DSFSDFSDFHNFHNGH', 0, 0),
(4, 'DGBHFRHB', 0, 0),
(5, 'DGBHFRHBGHNGHN', 0, 0),
(6, 'WRFRWE', 0, 0),
(7, 'FSGFEG', 1, 0),
(8, 'FVGFG', 1, 0),
(9, 'FVGFGEFGEGFR', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `t_seq` int(11) NOT NULL,
  `t_til` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_sub` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_view` int(1) NOT NULL,
  `t_del` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `titles`
--

INSERT INTO `titles` (`t_seq`, `t_til`, `t_sub`, `t_view`, `t_del`) VALUES
(1, '01B01.jpg', '1111118888', 0, 0),
(2, '01B02.jpg', 'ASDdaD', 1, 0),
(3, '01B03.jpg', '34tr3', 0, 0),
(4, '01B04.jpg', 'sdvsv', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `t_seq` int(1) NOT NULL,
  `t_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `total`
--

INSERT INTO `total` (`t_seq`, `t_total`) VALUES
(1, 22);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`a_seq`);

--
-- 資料表索引 `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`f_seq`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`m_seq`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_seq`);

--
-- 資料表索引 `mvim`
--
ALTER TABLE `mvim`
  ADD PRIMARY KEY (`m_seq`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_seq`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`t_seq`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`t_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `ad`
--
ALTER TABLE `ad`
  MODIFY `a_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `footer`
--
ALTER TABLE `footer`
  MODIFY `f_seq` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `m_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `m_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `mvim`
--
ALTER TABLE `mvim`
  MODIFY `m_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `n_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `titles`
--
ALTER TABLE `titles`
  MODIFY `t_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `total`
--
ALTER TABLE `total`
  MODIFY `t_seq` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
