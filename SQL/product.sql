-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 11:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS `product`;

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL COMMENT 'The image file name',
  `Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Image`, `Price`) VALUES
(1, 'Apple', '1.jpg', 1),
(3, 'Pear', '2.jpg', 2),
(4, 'Laptop', '3.jpg', 700),
(5, 'Coffee', '4.jpg', 2.5),
(8, 'book1', 'saara_1.jpeg', 30),
(9, 'book2', 'saara_2.jpeg', 15),
(10, 'book3', 'saara_3.jpeg', 40),
(11, 'book4', 'saara_4.jpeg', 2),
(12, 'Wrist Watch', 'Solomon_1.jpg', 16.89),
(13, 'Backpack(school bag)', 'Solomon_2.jpg', 17),
(14, 'Soft seating Couch', 'Solomon_3.jpg', 20),
(15, 'White Sneakers', 'Solomon_4.jpg', 15.97),
(16, 'maksim_1', 'maksim_1.jpg', 12),
(17, 'maksim_2', 'maksim_2.jpg', 110),
(18, 'maksim_3', 'maksim_3.jpg', 11),
(19, 'maksim_4', 'maksim_4.jpg', 17.3),
(20, 'Water bottle', 'Lucky_1.jpg', 12),
(21, 'P Shoes', 'Lucky_2.jpg', 40),
(22, 'Chairs', 'Lucky_3.jpg', 50),
(23, 'Wrist watch', 'Lucky_4.jpg', 35),
(24, 'Pizza', '2108073_1.jpg', 6),
(25, 'Munakoiso', '2108073_2.jpg', 4),
(26, 'Bourbon', '2108073_3.jpg', 24),
(27, 'Bicycle', '2108073_4.jpg', 45),
(28, 'Banana yogurt', 'iiro_kankkunen.5.jpg', 0.7),
(29, 'Smartwatch', 'iiro_kankkunen.6.jpg', 400),
(30, 'Computer Mouse', 'iiro_kankkunen.7.jpg', 80),
(31, 'Engineer statue', 'iiro_kankkunen.8.jpg', 50),
(32, 'Lomo Saltado', 'Aure_1.jpg', 55),
(33, 'Causa', 'Aure_2.jpg', 35),
(34, 'Cake', 'Aure_3.jpg', 22),
(35, 'Ice Cream', 'Aure_4.jpg', 12),
(36, 'glass', 'eetu_glass.jpg', 6),
(37, 'small camera', 'eetu_small_camera.jpg', 50),
(38, 'fake plant', 'eetu_fake_plant.jpg', 15),
(39, 'scissors', 'eetu_scissors.jpg', 20),
(40, 'Chain', 'Lateef_1.jpg', 14),
(41, 'Birthday Cake', 'Lateef_2.jpg', 45),
(42, 'Trainers', 'Lateef_3.jpg', 20),
(43, 'Moisturizing Lotion', 'Lateef_4.jpg', 27),
(44, 'Matvei_1', 'Matvei_1.jpg', 150),
(45, 'Matvei_2', 'Matvei_2.jpg', 100),
(46, 'Matvei_3', 'Matvei_3.jpg', 254.5),
(47, 'Matvei_4', 'Matvei_4.jpg', 200),
(48, 'Body Lotion', 'koulibaly_1.jpg', 2),
(49, 'Cacao', 'koulibaly_2.jpg', 4),
(50, 'Smart Health Watch ', 'Koulibaly_3.jpg', 50),
(51, 'Headphone ', 'Koulibaly_4.jpg', 300),
(52, 'Waterbottle', 'valtteri_1.jpg', 1),
(53, 'Apple juice', 'valtteri_2.jpg', 41),
(54, 'Gum', 'valtteri_3.jpg', 190),
(55, 'Spoon', 'valtteri_4.jpg', 14),
(56, 'Jacket', 'Humayun_1.jpg', 150),
(57, 'Flower', 'Humayun_2.jpg', 2),
(58, 'Burger', 'Humayun_3.jpg', 6),
(59, 'Matal', 'Humayun_4.jpg', 200),
(60, 'Shoes', 'Noman_1.jpeg', 50),
(61, 'Wool cap', 'Noman_2.jpeg', 7),
(62, 'Spectacles', 'Noman_3.jpeg', 15),
(63, 'School Bag', 'Noman_4.jpeg', 20),
(64, 'Smart Television', 'Sakawat_1.jpeg', 200),
(65, 'Lamp', 'Sakawat_2.jpeg', 60),
(66, 'Pillows', 'Sakawat_3.jpeg', 15),
(67, 'Stool', 'Sakawat_4.jpeg', 12),
(68, 'Hand glops ', 'Prodip_1.jpg', 4),
(69, 'Cap', 'Prodip_2.jpg', 2.5),
(70, 'Bag', 'Prodip_3.jpg', 150),
(71, 'Mobile Phone', 'Prodip_4.jpg', 210);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
