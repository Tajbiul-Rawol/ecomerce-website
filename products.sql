-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 09:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch366`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `regular_price` float NOT NULL,
  `sale_price` float NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `regular_price`, `sale_price`, `product_description`, `category`, `tag`, `brand`, `image`) VALUES
(2, 'Logitech mini Speakers', 2500, 1750, 'Logitech mini wireless speakers, Total Watt (Peak): 24 W  Total Watt (RMS): 12 W  Bluetooth version:', 'gadgets', '#speakers', 'Logitech', '9d68b127366c80dc9a92bac35056d64e.jpg'),
(3, 'custom mechanical keyboard ', 3900, 3500, 'OUTEMU blue switches, 50 million clicks, antighosting, n key roll overs', 'gadgets', '#keyboards', 'ZOUYA', '7bbe8a0c4097eec7e359141e992248ff.jpg'),
(4, 'Projector keyboard', 3950, 2950, 'keyboard projected from laser, photo sensitive touch keyboad', 'gadgets', '#keyboards', 'Outimu', '7242ca001dc6c6ee831d03d88ca06189.jpg'),
(5, 'Cam Pen', 1800, 900, 'A high tech pen with spy hole camera, HD recording ', 'gadgets', '#spycam', 'Spyware', '0be18f00e1285d4300f5363340166809.jpg'),
(6, 'Mini Projector', 3000, 2200, 'Mini projector, portable, 10000 luminscent, hd projection', 'gadgets', '#projectors', 'Toshiba', 'a3ac895d73fdbc9fdd8641d4e19e64b9.jpg'),
(7, 'Mini Projector', 3000, 2200, 'Mini projector, portable, 10000 luminscent, hd projection', 'gadgets', '#projectors', 'Toshiba', 'bca43f40752e88991ed652a7e5c0ba38.jpg'),
(8, 'Usb Hub', 700, 500, 'Multi usb port hub, 3 usb 3.0, 2 USB c', 'gadgets', '#USB', 'PILO', '03270171f2561dc857128d8a331c54af.jpg'),
(9, 'USB light', 250, 125, 'Portable usb lamp light for study', 'gadgets', '#USB', 'CHingzo', '1099240115102a05111c649b66cc0af3.jpg'),
(10, 'USB keylogger', 5000, 4250, 'Keylogger to hack data from any pc', 'gadgets', '#hack', 'Spyware', '1f1f9bd64c3b4d22d6b2b726901a5156.jpg'),
(12, 'Yoloka watches for men', 2000, 1200, 'Watch for men, stainless steel belts', 'watches', '#Menswatch', 'Yoloka', '0c0b3ca4f092448fd451b029b449c6c7.jpg'),
(13, 'Sekonda mens watch', 8000, 7500, 'Sekonda, gold watch for men, mens watch, stainless steel gold watch', 'watches', '#Menswatch', 'SEKOnda', '77dd4c0e600df846c02027f2cf3175bf.jpg'),
(14, 'Red sneakers', 2000, 1500, 'Red sneakers for jogging and running for men', 'shoes', '#sneakers', 'Reebok', 'c0e094bca2f396fe64c135c806152891.jpg'),
(15, 'Necklace pendant', 799.99, 699.99, 'Sterling silver necklace', 'jewelery', '#NEcklace', 'HIRA', 'bcaf104d15a752070a48546d69d22c10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
