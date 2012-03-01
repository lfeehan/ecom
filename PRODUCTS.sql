-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2012 at 07:49 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10-1ubuntu1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTS`
--

CREATE TABLE IF NOT EXISTS `PRODUCTS` (
  `PROD_ID` int(8) NOT NULL AUTO_INCREMENT,
  `PROD_NAME` varchar(20) NOT NULL,
  `PROD_PRICE` int(6) NOT NULL,
  `PROD_QUANTITY` int(3) NOT NULL,
  `PROD_DESC` text NOT NULL,
  `PROD_TYPE` varchar(10) NOT NULL,
  PRIMARY KEY (`PROD_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`PROD_ID`, `PROD_NAME`, `PROD_PRICE`, `PROD_QUANTITY`, `PROD_DESC`, `PROD_TYPE`) VALUES
(1, 'test kite', 1000, 3, 'great kite', 'kite'),
(2, 'test board', 500, 2, 'great board', 'board');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
