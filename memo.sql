-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 04:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `memo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_memo`
--

CREATE TABLE IF NOT EXISTS `tbl_memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_memo`
--

INSERT INTO `tbl_memo` (`id`, `title`, `description`) VALUES
(2, 'asdfa', 'sdfasdfasdfa'),
(3, 'fasdfasdfasd', 'fasdfasdfasdfsadf'),
(8, 'test create', 'asdfasdf'),
(11, 'TEST CREATEASDF ASDFA ASDFAS AWSDF ASF A ASDFAFK H', ''),
(12, 'TEST CREATEASDF ASDFA ASDFAS AWSDF ASF A ASDFAFK H', 'test createasdf asdfa asdfas awsdf asf a asdfafk h\r\ntest createasdf asdfa asdfas awsdf asf a asdfafk h\r\ntest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfafk htest createasdf asdfa asdfas awsdf asf a asdfa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;