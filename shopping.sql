-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2021 at 09:41 AM
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
  `sold_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`id`, `name`, `price`, `discription`, `total_item`, `sold_item`) VALUES
(1, 'Unisex Black Solid Backpack', 3199.99, 'Black backpack Padded haul loop 2 main compartments with zip closure', 10, 0),
(2, 'Unisex Blue 65 Litres Rucksack', 4499.99, 'Blue rucksack, secured with drawstring fastening One padded haul loop', 10, 0),
(3, 'Unisex Sea Green Solid Backpack', 4599.99, 'This bag of Provogue comes with spacious comparment with unique design', 10, 0),
(4, 'Unisex Brown Solid Backpack', 1999.99, 'Brown solid backpack Padded haul loop, ergonomic shoulder straps', 10, 0),
(5, 'Unisex Grey & Black Solid Training Duffel Bag', 1999.99, 'Black solid gym duffel bag One shoulder strap', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `size` int NOT NULL,
  `quentity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `catagory`, `name`, `price`, `size`, `quentity`) VALUES
(1, 1, 'cloths', 'Checked Lounge Set', 2499.99, 37, 0),
(2, 2, 'cloths', 'Heathered Pyjamas with Elasticated Waist', 2999.99, 37, 0),
(3, 5, 'cloths', 'Slim Fit Shirt with Patch Pocket', 1699.99, 37, 0),
(4, 3, 'shoes', 'Marathon Skin Black', 5499.99, 37, 0),
(5, 7, 'cloths', 'Ankle Length Slim Fit Cargo Pants', 4999.99, 37, 0);

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
  `sold_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cloths`
--

INSERT INTO `cloths` (`id`, `name`, `price`, `size`, `men_women_kid`, `discription`, `total_item`, `sold_item`) VALUES
(1, 'Checked Lounge Set', 2499.99, 37, 1, 'Machine wash •  100% cotton', 5, 0),
(2, 'Heathered Pyjamas with Elasticated Waist', 2999.99, 37, 1, '47% modal, 47% cotton, 6% elastane Lycra •  Machine wash •  Mid Rise', 5, 0),
(3, 'Checkered Shirt with Patch Pocket', 1499.99, 37, 1, 'Single-button angled cuffs •  Curved hemline •  Regular Fit •  Machine wash cold', 5, 0),
(4, 'Sportswear Swoosh By Air Crew-Neck T-shirt', 1795.99, 37, 1, 'Regular Fit •  Machine wash cold •  100% Cotton', 5, 0),
(5, 'Slim Fit Shirt with Patch Pocket', 1699.99, 37, 1, 'Slim Fit •  Cotton •  Machine wash', 5, 0),
(6, 'Women Printed Slim Fit Shirt', 799.99, 37, 2, '•  Machine wash •  100% polyester', 5, 0),
(7, 'Ankle Length Slim Fit Cargo Pants', 4999.99, 37, 2, 'Slim Fit •  55% polyamide, 38% viscose and 7% elastane •  Machine wash •  Mid Rise', 5, 0),
(8, 'Checked Straight Kurta with Mock Buttons', 1299.99, 37, 2, 'Machine wash cold •  Yarn dyed cotton slub •  No Darts', 5, 0),
(9, 'Slim Fit Pleat-Front Pants', 1999.99, 37, 2, '•  Slim Fit •  Machine wash •  63% polyester, 33% viscose and 4% elastane •  Mid Rise', 5, 0),
(10, 'Washed Button-Down Jacket with Slip Pockets', 3499.99, 37, 2, '•  100% cotton •  Machine wash', 5, 0),
(11, 'Printed Hooded Trucker Jacket', 1350, 15, 3, '•  Wash instruction as per tag •  Insert pockets •  Buttoned flap pockets', 5, 0),
(12, 'LogLogo Print Crew-Neck Sweater', 1124, 15, 3, '•  Machine wash •  100% Cotton', 5, 0),
(13, 'Satin Woven Top & Pyjamas Set', 674, 15, 3, '•  Solid Front open Shirt and Pyjama Pant •  Comfortable fit and easy to wear pattern', 5, 0),
(14, 'Fit & Flare Dress with Florettes', 892, 15, 3, 'Waist tie-up •  Hand wash •  Polyester knit', 5, 0),
(15, 'Shirt with Printed Sleeveless T-shirt', 584, 15, 3, '•  Machine wash cold •  Cotton •  Relaxed Fit', 5, 0);

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `list` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `sold_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `price`, `size`, `men_women_kid`, `discription`, `total_item`, `sold_item`) VALUES
(1, 'Atom Eternal 2.0 Black', 4999.99, 37, 1, 'The perfect mix between the comfort ', 10, 0),
(2, 'Atom Oasis Pink', 4499.99, 35, 1, 'the noisy city, find your Oasis in the middle of the urban jungle with these sneakers', 10, 0),
(3, 'Marathon Skin Black', 5499.99, 37, 1, 'The Marathon family grows with its more formal evolution ', 10, 0),
(4, 'Marathon Nebula Grey', 3499.99, 37, 1, 'we bring you Nebula, a new chromatic galaxy', 10, 0),
(5, 'Marathon Nebula Dark Grey', 4999.99, 37, 1, 'The same elegant design, with the technical-sporty ', 10, 0),
(6, 'Sling-Back Flat Sandals with Cut-Outs', 2100, 37, 2, '•  Wipe with a clean, dry cloth when needed •  Genuine leather upper •  TPR sole', 10, 0),
(7, 'Chunky Heeled Strappy Slip-On Sandals with Clear Strap', 1599.99, 37, 2, '•  Wipe with a clean, dry cloth when needed •  Heel height: 2 inches •  Regular Fit', 10, 0),
(8, 'Strappy Flat Sandals with Ankle Strap', 1499.99, 37, 2, '•  100% PU upper •  100% TPR sole •  Regular Fit', 9, 0),
(9, 'Pointed-Toe Ballerinas', 1399.99, 37, 2, '•  Metal accent •  Regular Fit •  Synthetic upper •  TPR sole', 10, 0),
(10, 'Chunky Heeled Sandals', 1000, 37, 2, '•  Fabric insole •  Regular •  Synthetic upper', 10, 0),
(11, 'Printed Slingback Clogs', 1345, 15, 3, '•  Croslite upper & sole •  Slip-on styling •  Regular Fit', 10, 0),
(12, 'Casual Shoes with Embroidered Accent', 1499.99, 15, 3, '•  Genuine leather upper •  TPR sole', 10, 0),
(13, 'Low-Top Lace-Up Sneakers', 750, 15, 3, '•  Lace fastening •  Regular Fit •  PU upper', 10, 0),
(14, 'Disney Frozen Print Ballerinas', 549.99, 13, 3, '•  Slip-on styling •  3-month warranty against manufacturing defects', 10, 0),
(15, 'Textured Lace-Up Sports Shoes', 692, 10, 3, '•  Lace fastening •  Fabric upper •  Rubber sole', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

DROP TABLE IF EXISTS `toys`;
CREATE TABLE IF NOT EXISTS `toys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `total_item` int NOT NULL,
  `discription` varchar(255) NOT NULL,
  `sold_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `name`, `price`, `total_item`, `discription`, `sold_item`) VALUES
(1, 'hoverboards', 7500, 5, '', 0),
(2, 'Adventure Force Battle Blazer Blaster', 1499.99, 5, '', 0),
(3, 'Beadery Wonder Loom Kit', 1499.99, 5, '', 0),
(4, 'Scale Remote Control Pink Jeep', 2499.99, 5, '', 0),
(5, 'Tiny Tukkins Playset', 999.99, 5, '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
