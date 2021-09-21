-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2021 at 05:57 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `company_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bags`
--

DROP TABLE IF EXISTS `bags`;
CREATE TABLE IF NOT EXISTS `bags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `discription` varchar(255) NOT NULL,
  `total_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`id`, `name`, `price`, `discription`, `total_item`) VALUES
(1, 'fredgvregt g', 23.76, 'dsf rrfd rfg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cloths`
--

DROP TABLE IF EXISTS `cloths`;
CREATE TABLE IF NOT EXISTS `cloths` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `size` int NOT NULL,
  `men_women_kid` tinyint(1) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `total_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cloths`
--

INSERT INTO `cloths` (`id`, `name`, `price`, `size`, `men_women_kid`, `discription`, `total_item`) VALUES
(1, 'qwerwerf', 54.45, 23, 1, 'erwe gtg rtuyhryh rtyr', 5);

-- --------------------------------------------------------

--
-- Table structure for table `compani_id`
--

DROP TABLE IF EXISTS `compani_id`;
CREATE TABLE IF NOT EXISTS `compani_id` (
  `id_no` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `compani_id`
--

INSERT INTO `compani_id` (`id_no`) VALUES
('cv23432165'),
('987653fg45'),
('0987uy4563');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_form`
--

DROP TABLE IF EXISTS `feedback_form`;
CREATE TABLE IF NOT EXISTS `feedback_form` (
  `name` varchar(100) NOT NULL,
  `phone_no` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` longtext NOT NULL,
  PRIMARY KEY (`name`,`phone_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback_form`
--

INSERT INTO `feedback_form` (`name`, `phone_no`, `email`, `feedback`) VALUES
('Jane', 2147483647, 'vimukthinia@gmail.com', 'wefhbrewf wefvrwefdnew qedqowfd evr2374f 2grwef');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

DROP TABLE IF EXISTS `shoes`;
CREATE TABLE IF NOT EXISTS `shoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `size` int NOT NULL,
  `men_women_kid` tinyint(1) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `total_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `price`, `size`, `men_women_kid`, `discription`, `total_item`) VALUES
(7, 'brown Laced Up Calf Boots', 9000, 37, 2, 'Pair these with a smart blazer and a floaty skirt for a balance between femininity and masculinity. Featuring a mini square toe with lace up design', 10),
(2, 'Converse midnight blue', 6000, 37, 1, 'Feel It the trend setter presents a gorgeous collection of footwear. Stylish and comfortable are the words that define the collection perfectly.', 10),
(3, 'Converse Black casual', 5000, 32, 1, 'Men will never want to take off their Converse low top trainers. The black colour and leather upper make it a first-class product.', 10),
(4, 'Black Leather Croc Shoes', 13000, 37, 1, 'Classic lace up derby shoes. Moc Croc leather uppers. Blake stitch construction. Intricate hand stitched detailing. Fully lined calf leather.', 10),
(5, 'Tauntte Cow Leather Formal Shoes', 10000, 37, 1, 'Soft leather is not only for skin-friendly, also for keep a good breathability to feet', 10),
(6, 'Dark green Suede Leather Oxford Shoes', 14000, 37, 1, 'One of most popular styles, these Oxford shoes have been meticulously handcrafted in Italy from fine suede calf leather.', 10),
(8, 'green yellow short heels', 6000, 37, 2, '2020 New Women Green Yellow Nude Kitten Heels Tacones Mujer 7cm Short Low Heel Shoes Giltter Crystal Rhinestone Pumps Plus Size', 10),
(9, 'Gemma Black Slip On High Heel Court Shoes', 14000, 37, 2, 'Brand New Sexy Black Apricot Women Office Formal Pumps High Heels Red Lady Bridal Dress Shoes', 10),
(10, 'Tottenham Dress Flat blue', 5000, 36, 2, 'A penny loafer with a difference; wonderfully wearable with suede leather, textured edging and a leather welt.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

DROP TABLE IF EXISTS `toys`;
CREATE TABLE IF NOT EXISTS `toys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `discription` varchar(255) NOT NULL,
  `total_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `name`, `price`, `discription`, `total_item`) VALUES
(1, 'car', 345.76, 'sefs ergterg dgtybret dyttg', 10),
(2, 'car', 345.76, 'sefs ergterg dgtybret dyttg', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
