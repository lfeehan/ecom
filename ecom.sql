-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2012 at 10:23 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `PROD_ID` int(8) NOT NULL AUTO_INCREMENT,
  `PROD_NAME` varchar(20) NOT NULL,
  `PROD_PRICE` int(6) NOT NULL,
  `PROD_QUANTITY` int(3) NOT NULL,
  `PROD_DESC` varchar(900) NOT NULL,
  `PROD_TYPE` varchar(25) NOT NULL,
  PRIMARY KEY (`PROD_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PROD_ID`, `PROD_NAME`, `PROD_PRICE`, `PROD_QUANTITY`, `PROD_DESC`, `PROD_TYPE`) VALUES
(1, 'Wetsuit', 100, 50, 'Sexy pink wetsuit with yellow trim', 'wetsuit'),
(50, 'SuperKite 2000', 400, 25, 'This kite makes you fucking awesome', 'kite'),
(51, 'Cheapo Sail', 250, 40, 'This kite is a bit shit really', 'kite');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `PROD_ID` int(8) NOT NULL,
  `IMAGE_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`PROD_ID`, `IMAGE_ID`) VALUES
(1, 'images/001_1.jpg'),
(1, 'images/001_2.jpg'),
(50, 'images/050_1.jpg'),
(51, 'images/051_1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
