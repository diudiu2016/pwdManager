-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2016 at 10:11 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pwd_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwd_user`
--

CREATE TABLE `pwd_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pwd_user`
--

INSERT INTO `pwd_user` (`user_id`, `email`, `nickname`, `status`) VALUES
(19, 'tszk@live.hk', 'tsz', '1'),
(20, 'checker.cmrs@gmail.com', 'asd', '1'),
(21, 'programmer.post90s@gmail.com', 'asd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_user_authenticate`
--

CREATE TABLE `pwd_user_authenticate` (
  `user_id` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password2` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pwd_user_authenticate`
--

INSERT INTO `pwd_user_authenticate` (`user_id`, `password`, `password2`) VALUES
(19, '1234', '12345'),
(20, '12', '123'),
(21, '1234', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_user_passwords`
--

CREATE TABLE `pwd_user_passwords` (
  `password_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pwd_user_passwords`
--

INSERT INTO `pwd_user_passwords` (`password_id`, `user_id`, `item`, `user_name`, `password`) VALUES
(8, 19, 'fb', 'asd', '1234'),
(10, 19, 'app', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwd_user`
--
ALTER TABLE `pwd_user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwd_user`
--
ALTER TABLE `pwd_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pwd_user_authenticate`
--
ALTER TABLE `pwd_user_authenticate`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pwd_user_passwords`
--
ALTER TABLE `pwd_user_passwords`
  MODIFY `password_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;