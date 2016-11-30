-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-29 16:15:58
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd_manager`
--

-- --------------------------------------------------------

--
-- 表的结构 `pwd_user`
--

CREATE TABLE `pwd_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `pwd_user`
--

INSERT INTO `pwd_user` (`user_id`, `email`, `nickname`, `status`) VALUES
(28, 'test@com', 'test', '1'),
(29, 'souniangao@163.com', 'diudiu', '1');

-- --------------------------------------------------------

--
-- 表的结构 `pwd_user_authenticate`
--

CREATE TABLE `pwd_user_authenticate` (
  `user_id` int(11) NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `pwd_user_authenticate`
--

INSERT INTO `pwd_user_authenticate` (`user_id`, `password`, `password2`) VALUES
(28, 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(29, '94192e397ab4b56c69f6218a2b82430c99dbd04d9d4f4b807ceaa95e08a37ecb', 'efb8ff29217bc41094aef8880e152b419895619818b17c182e8052825a03292e');

-- --------------------------------------------------------

--
-- 表的结构 `pwd_user_passwords`
--

CREATE TABLE `pwd_user_passwords` (
  `password_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `pwd_user_passwords`
--

INSERT INTO `pwd_user_passwords` (`password_id`, `user_id`, `item`, `user_name`, `password`) VALUES
(30, 28, '4t3', 'qt43t', 'NwECu3YAPFhkzdp/tQ=='),
(31, 28, 'facebook', 'diu', '+QAwmyr3PFggrHQ59ZkPRnPVGkLFBQ=='),
(40, 28, 'test', 'test', 'sQLda2AlPVhpo7jCTp3d'),
(41, 28, 'test1', 'test1', 'RAK0qpklPVi0PHt8Otgv'),
(42, 28, 'test2', 'test2', 'SgCwuNQlPVjE9sbaMXcvVkgXc8r2G4kwGSxkTI8RMrLYf78='),
(43, 28, 'test3', 'test3', 'ywMnAfklPVj/JxcsTAinUxiiBQ/VIu9AsTVCnbrWFLY4fQY='),
(44, 28, 'test4', 'e', 'qwFr46QmPVh0YzcW'),
(45, 28, '12', '231', '9QLAk+kmPVgllBU='),
(46, 28, '111', '111', '6QC8EbwoPVhKJqXI'),
(47, 29, 'facebook', 'diudiu', '/gLd2Nc1PVirabyt09m2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwd_user`
--
ALTER TABLE `pwd_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `pwd_user_authenticate`
--
ALTER TABLE `pwd_user_authenticate`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pwd_user_passwords`
--
ALTER TABLE `pwd_user_passwords`
  ADD PRIMARY KEY (`password_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `pwd_user`
--
ALTER TABLE `pwd_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `pwd_user_authenticate`
--
ALTER TABLE `pwd_user_authenticate`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `pwd_user_passwords`
--
ALTER TABLE `pwd_user_passwords`
  MODIFY `password_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
