-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 01:34 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`, `status`) VALUES
(1, 'นักเรียน (Student)', 1),
(2, 'ผู้ช่วยอาจารย์ (Staff)', 1),
(3, 'อาจารย์ (Teacher)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(35) NOT NULL,
  `data` text NOT NULL,
  `created_at` int(15) unsigned NOT NULL,
  `modified_at` int(15) unsigned DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `data`, `created_at`, `modified_at`) VALUES
('e1pek1ev4osijdv5tma1gv38s6', '$PHALCON/CSRF$|s:32:"1dc9c279f9f4704b45d348db4a088656";', 1399410497, 0),
('knacg72aulig1kcluqc22rs743', '$PHALCON/CSRF$|s:32:"fac270db3c8da6f69cd13619235ed63b";auth|b:1;user|O:8:"stdClass":5:{s:2:"id";s:2:"14";s:9:"firstname";s:9:"wannapong";s:8:"lastname";s:8:"student6";s:8:"username";s:8:"student6";s:5:"email";s:18:"student6@gmail.com";}$PHALCON/CSRF/KEY$|s:16:"NP4DVtvi2HiRfJoI";', 1399856277, 1399857550);

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `name`, `status`) VALUES
(1, 'ชาย', 1),
(2, 'หญิง', 1),
(3, 'ไม่แน่ใจ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type` tinyint(1) NOT NULL DEFAULT '1',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_type`, `sex`, `firstname`, `lastname`, `email`, `username`, `password`, `token`, `activate`, `status`) VALUES
(1, 1, 1, 'Mr.Student1', 'WK', 'student1@gmail.com', 'student1', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1),
(2, 2, 2, 'wannapong', 'staff1', 'staff1@gmail.com', 'staff1', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1),
(3, 3, 3, 'wannapong', 'teacher1', 'teacher1@gmail.com', 'teacher1', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1),
(4, 1, 0, 'wannapong', 'admin1', 'admin1@gmail.com', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1),
(14, 2, 2, 'wannapong', 'student6', 'student6@gmail.com', 'student6', '25f9e794323b453885f5181f1b624d0b', '1', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
