-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2019 at 05:32 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homeinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `oid` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `cpass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`oid`, `fname`, `lname`, `mail`, `pass`, `cpass`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'test1234', 'test1234'),
(2, 'xyz', 'xyz', 'xyz@gmail.com', 'Xyz@1234', 'Xyz@1234'),
(3, 'testing', 'testing', 'testing@gmail.com', 'Testing@1234', 'Testing@1234');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `rid` int(255) NOT NULL AUTO_INCREMENT,
  `oname` varchar(255) DEFAULT NULL,
  `oadd` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `hlocation` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `hprice` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rid`, `oname`, `oadd`, `mail`, `phone`, `hlocation`, `desc`, `hprice`, `img`) VALUES
(5, 'test', 'ddun', 'test@gmail.com', '9876543210', 'ddun', '2bhk for rent ', '12000', 'image/pic3.jpg'),
(6, 'xyz', 'ddun', 'xyz@gmail.com', '9876543210', 'ddun', '2bhk for rent in good condition', '15000', 'image/pic2.jpg'),
(7, 'testing', 'ddun', 'testing@gmail.com', '9988767891', 'ddun', '1bhk in good condition', '7000', 'image/pic6.png');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sid` int(255) NOT NULL AUTO_INCREMENT,
  `oname` varchar(255) DEFAULT NULL,
  `oadd` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `hlocation` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `hprice` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sid`, `oname`, `oadd`, `mail`, `phone`, `hlocation`, `desc`, `hprice`, `img`) VALUES
(2, 'test', 'ddun', 'test@gmail.com', '9876543210', 'ddun', '2 floor house for sale', '10000000', 'image/spic2.jpg'),
(3, 'xyz', 'ddun', 'xyz@gmail.com', '9876543210', 'ddun', '2 floor house for sale ', '12000000', 'image/spic5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `cpass` varchar(255) DEFAULT NULL,
  `add` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `lname`, `mail`, `pass`, `cpass`, `add`, `phone`) VALUES
(12, 'anuj', 'garg', 'anuj@gmail.com', 'anuj1234', 'anuj1234', 'ddun', '9876543210'),
(13, 'aaa', 'aaa', 'aaa@gmail.com', 'pass', 'pass', 'ddun', '987654321'),
(14, 'test', 'test', 'test@gmail.com', 'test12', 'test12', 'ddun', '987654321'),
(15, 'user', 'user', 'user@gmail.com', 'User@1234', 'User@1234', 'ddun', '9876543210'),
(16, 'xyz', 'xyz', 'xyz@gmail.com', 'Xyz@1234', 'Xyz@1234', 'ddun', '9876543210');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
