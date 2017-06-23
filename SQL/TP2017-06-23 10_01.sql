-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-06-23 10:01:35
-- 服务器版本： 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp`
--

-- --------------------------------------------------------

--
-- 表的结构 `e_banner`
--

CREATE TABLE `e_banner` (
  `id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `hover` varchar(900) NOT NULL,
  `url` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `e_link`
--

CREATE TABLE `e_link` (
  `id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `hover` varchar(900) NOT NULL,
  `url` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `e_menu`
--

CREATE TABLE `e_menu` (
  `menu_id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL DEFAULT '',
  `controller` varchar(300) NOT NULL,
  `icon` varchar(300) DEFAULT '<i class="fa fa-wpforms"></i>',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `e_menu`
--

INSERT INTO `e_menu` (`menu_id`, `name`, `pid`, `url`, `controller`, `icon`, `listorder`, `status`, `type`) VALUES
(1, '友连', 0, 'Link/index', 'Link', '<i class=\"fa fa-link\" ></i>', 10, 1, 1),
(15, '轮播', 0, 'Banner/index', 'Banner', '<i class=\"fa fa-th-large\"></i>', 5, 1, 1),
(18, '网站设置', 0, 'Basic/index', 'Basic', '<i class=\"fa fa-wrench\"></i>', 20, 1, 1),
(19, '新闻', 0, 'News/index', 'News', '<i class=\"fa fa-file-text-o\"></i>', 2, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `e_news`
--

CREATE TABLE `e_news` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `sort_id` int(11) NOT NULL DEFAULT '-1',
  `summary` varchar(300) NOT NULL,
  `thumb` varchar(300) NOT NULL,
  `mp4` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `e_sort`
--

CREATE TABLE `e_sort` (
  `id` int(11) NOT NULL,
  `sort_name` varchar(200) NOT NULL,
  `sort_en` varchar(300) NOT NULL,
  `controller` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `e_user`
--

CREATE TABLE `e_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(200) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL DEFAULT '管理员',
  `password` varchar(320) DEFAULT NULL,
  `lastlogintime` int(10) UNSIGNED DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `e_user`
--

INSERT INTO `e_user` (`id`, `username`, `name`, `password`, `lastlogintime`, `email`, `status`, `admin_status`) VALUES
(1, 'admin', '管理员', 'c6d26619ca0edc89862ba560495429aa', 1498182564, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_banner`
--
ALTER TABLE `e_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_link`
--
ALTER TABLE `e_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_menu`
--
ALTER TABLE `e_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `parentid` (`pid`),
  ADD KEY `module` (`url`);

--
-- Indexes for table `e_news`
--
ALTER TABLE `e_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_sort`
--
ALTER TABLE `e_sort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_user`
--
ALTER TABLE `e_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `e_banner`
--
ALTER TABLE `e_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `e_link`
--
ALTER TABLE `e_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `e_menu`
--
ALTER TABLE `e_menu`
  MODIFY `menu_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `e_news`
--
ALTER TABLE `e_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `e_sort`
--
ALTER TABLE `e_sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `e_user`
--
ALTER TABLE `e_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
