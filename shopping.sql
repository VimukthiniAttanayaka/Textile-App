-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2021 at 04:59 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `company_id`) VALUES
(1, 'perera@gmail.com', 'b9c3cd4c12ea09e5bafa5814f51cfa18', 'cv23432165'),
(2, 'ranatunga@gmail.com', 'c37bf859faf392800d739a41fe5af151', '987653fg45'),
(3, 'rosi@gmail.com', '83b9e3ce5f8ab1cbb375821b0249addd', '0987uy4563');

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
(1, 'Unisex Black Solid Backpack', 3199.99, 'Black backpack Padded haul loop 2 main compartments with zip closure', 5, 0),
(2, 'Unisex Blue 65 Litres Rucksack', 4499.99, 'Blue rucksack, secured with drawstring fastening One padded haul loop', 5, 0),
(3, 'Unisex Sea Green Solid Backpack', 4599.99, 'This bag of Provogue comes with spacious comparment with unique design', 5, 0),
(4, 'Unisex Brown Solid Backpack', 1999.99, 'Brown solid backpack Padded haul loop, ergonomic shoulder straps', 5, 0),
(5, 'Unisex Grey & Black Solid Training Duffel Bag', 1999.99, 'Black solid gym duffel bag One shoulder strap', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `size` int NOT NULL,
  `men_women_kid` int NOT NULL,
  `quentity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_email`, `product_id`, `catagory`, `name`, `price`, `size`, `men_women_kid`, `quentity`) VALUES
(1, 'sumudu@gmail.com', 1, 'cloths', 'Checked Lounge Set', 2499.99, 37, 1, 1),
(2, 'sumudu@gmail.com', 13, 'cloths', 'Satin Woven Top & Pyjamas Set', 674, 37, 3, 2),
(3, 'sumudu@gmail.com', 9, 'shoes', 'Pointed-Toe Ballerinas', 1399.99, 37, 2, 1),
(4, 'dulmina@gmail.com', 1, 'cloths', 'Checked Lounge Set', 2499.99, 37, 1, 1),
(5, 'dulmina@gmail.com', 7, 'shoes', 'Chunky Heeled Strappy Slip-On Sandals with Clear Strap', 1599.99, 37, 2, 2),
(6, 'dulmina@gmail.com', 1, 'toys', 'hoverboards', 7500, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `validated` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `validated`) VALUES
(1, 'sumudu@gmail.com', '51557d9f988aac6ce143958cb801afff', 1),
(2, 'dulmina@gmail.com', '28851e98171abc6cc1b6af78da741456', 0);

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
  `id` int NOT NULL AUTO_INCREMENT,
  `id_no` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `compani_id`
--

INSERT INTO `compani_id` (`id`, `id_no`) VALUES
(1, 'cv23432165'),
(2, '987653fg45'),
(3, '0987uy4563');

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
('Jane', 2147483647, 'vimukthinia@gmail.com', 'wefhbrewf wefvrwefdnew qedqowfd evr2374f 2grwef'),
('sumudu perera', 745637098, 'sumudu@gmail.com', 'wery good work');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `list` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int NOT NULL,
  `total_price` double NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `name`, `list`, `address`, `phone_no`, `total_price`, `date`) VALUES
(1, 'sadun@gmail.com', 'sadun kumara', 's:2>3,c:1>4,t:5>1', 'no.234,colombo', 756435876, 1654.98, '2021-09-28'),
(2, 'perera@gmail.com', 'dasun perera', 's:2>1,c:6>3,b:5>1', 'no.237,kandy,akurana', 453876564, 3458.56, '2021-09-27'),
(3, 'dumidu@gmail.com', 'dumidu ranatunga', 'b:2>3,c:13>4,t:2>1', 'no.564,polonnaruwa', 784523495, 4358.68, '2021-09-12'),
(4, 'chamara@gmail.com', 'chamara bandara', 'b:2>3,c:6>2', 'no.44,colombo', 812650876, 2554.98, '2021-09-22'),
(5, 'fred@gmail.com', 'devid pranandu', 'b:2>1,c:1>4,b:5>1,t:1>2', 'no.76,colombo', 236545876, 1424.98, '2021-09-28');

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
(1, 'Atom Eternal 2.0 Black', 4999.99, 37, 1, 'The perfect mix between the comfort ', 7, 0),
(2, 'Atom Oasis Pink', 4499.99, 35, 1, 'the noisy city, find your Oasis in the middle of the urban jungle with these sneakers', 9, 0),
(3, 'Marathon Skin Black', 5499.99, 37, 1, 'The Marathon family grows with its more formal evolution ', 5, 0),
(4, 'Marathon Nebula Grey', 3499.99, 37, 1, 'we bring you Nebula, a new chromatic galaxy', 8, 0),
(5, 'Marathon Nebula Dark Grey', 4999.99, 37, 1, 'The same elegant design, with the technical-sporty ', 6, 0),
(6, 'Sling-Back Flat Sandals with Cut-Outs', 2100, 37, 2, '•  Wipe with a clean, dry cloth when needed •  Genuine leather upper •  TPR sole', 5, 0),
(7, 'Chunky Heeled Strappy Slip-On Sandals with Clear Strap', 1599.99, 37, 2, '•  Wipe with a clean, dry cloth when needed •  Heel height: 2 inches •  Regular Fit', 8, 2),
(8, 'Strappy Flat Sandals with Ankle Strap', 1499.99, 37, 2, '•  100% PU upper •  100% TPR sole •  Regular Fit', 9, 0),
(9, 'Pointed-Toe Ballerinas', 1399.99, 37, 2, '•  Metal accent •  Regular Fit •  Synthetic upper •  TPR sole', 6, 0),
(10, 'Chunky Heeled Sandals', 1000, 37, 2, '•  Fabric insole •  Regular •  Synthetic upper', 9, 1),
(11, 'Printed Slingback Clogs', 1345, 15, 3, '•  Croslite upper & sole •  Slip-on styling •  Regular Fit', 4, 3),
(12, 'Casual Shoes with Embroidered Accent', 1499.99, 15, 3, '•  Genuine leather upper •  TPR sole', 7, 1),
(13, 'Low-Top Lace-Up Sneakers', 750, 15, 3, '•  Lace fastening •  Regular Fit •  PU upper', 8, 0),
(14, 'Disney Frozen Print Ballerinas', 549.99, 13, 3, '•  Slip-on styling •  3-month warranty against manufacturing defects', 5, 3),
(15, 'Textured Lace-Up Sports Shoes', 692, 10, 3, '•  Lace fastening •  Fabric upper •  Rubber sole', 8, 1);

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
