-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 11:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage4`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_photo`
--

CREATE TABLE `car_photo` (
  `image_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_photo`
--

INSERT INTO `car_photo` (`image_id`, `car_id`, `image`) VALUES
(4, 12, 'OIP.jpeg'),
(5, 12, 'download.jpeg'),
(6, 12, 'download (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(30) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `reply` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `title`, `description`, `type`, `date`, `email_id`, `reply`) VALUES
(1, 'complaint', 'uuuuu', 'medium', '2023-09-22', 'moncy@gmail.com', '1'),
(2, 'complaint', 'ttrtgdg', 'low', '2023-09-22', 'moncy@gmail.com', '1'),
(3, 'complaint', 'heee', 'low', '2023-09-22', 'moncy@gmail.com', '1'),
(4, 'tttttt', 'vdsgeth', 'website', '2023-09-22', 'moncy@gmail.com', '1'),
(5, 'hfhfhfh', 'hfgfgkewfgu', 'car', '2023-09-23', 'abcd@gmail.com', '0'),
(6, 'tttttt', 'not working', 'website', '2023-09-23', 'gourirajc@gmail.com', '1'),
(7, '', '', '', '2023-09-30', 'moncy@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Kasaragod'),
(2, 'Kannur'),
(3, 'Wayanad'),
(4, 'Kozhikode'),
(5, 'Malappuram'),
(6, 'Palakkad'),
(7, 'Thrissur'),
(8, 'Ernakulam'),
(9, 'Idukki'),
(10, 'Kottayam'),
(11, 'Alappuzha'),
(12, 'Pathanamthitta'),
(13, 'Kollam'),
(14, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email_id` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email_id`, `password`, `user_type`, `user_status`) VALUES
('abc@gmail.com', 'abc1234', '1', '1'),
('abcd@gmail.com', 'abcd1234', '1', '1'),
('admin1234@gmail.com', 'admin1234', '0', '1'),
('basilkreji@gmail.com', 'basil1234', '1', '1'),
('eldhowilson@gmail.com', 'eldho1234', '1', '1'),
('gokulrajc63@gmail.com', 'gokul1234', '1', '1'),
('gourirajc@gmail.com', 'gouri1234', '1', '1'),
('moncy@gmail.com', 'moncy1234', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `name` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `model_year` varchar(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `plate_number` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  `description` varchar(70) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `image`, `name`, `category`, `model_year`, `brand`, `plate_number`, `color`, `capacity`, `description`, `amount`, `status`) VALUES
(13, 'p3.jpg', 'Audi', 'Premium', '', '', '', 'Blue', '2', 'Well Maintained', '6000', 0),
(14, 'p4.jpg', 'Mini Cooper', 'Premium', '', '', '', 'Grey', '2', 'Well Maintained', '5000', 0),
(15, 'p1.jpg', 'Benz', 'Premium', '', '', '', 'Black', '4', 'Well Maintained', '5000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `house_name` varchar(30) NOT NULL,
  `street_name` varchar(30) NOT NULL,
  `district` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`first_name`, `last_name`, `contact`, `email_id`, `date_of_birth`, `house_name`, `street_name`, `district`, `pincode`, `state`) VALUES
('ududu', 'jddiju', '5588226699', 'abc@gmail.com', '2004-09-06', 'eee', 'ffff', 'wayanad', '656987', 'kerala'),
('ududu', 'jddiju', 'ttrtrtrt', 'abcd@gmail.com', '2023-09-13', 'eee', 'ffff', 'Palakkad', '656987', 'kerala'),
('basil', 'k reji', '5588226699', 'basilkreji@gmail.com', '2023-09-07', 'cccc', 'yyyyy', 'Ernakulam', '686667', 'kerala'),
('Eldho', 'Wilson', '9074288916', 'eldhowilson@gmail.com', '2003-04-22', 'Chakkalackal', 'Pampakkuda', 'Ernakulam', '686667', 'Kerala'),
('Gokul', 'Raj', '9061393951', 'gokulrajc63@gmail.com', '2003-04-11', 'Chavarukulangara(H)', 'Periyappuram', 'Ernakulam', '686667', 'Kerala'),
('Gouri', 'Raj', '6235273701', 'gourirajc@gmail.com', '2006-06-06', 'Chavarukulangara', 'Periyappuram', 'Ernakulam', '686667', 'Kerala'),
('moncy', 'francis', '8945214788', 'moncy@gmail.com', '2003-09-11', 'moncyy', 'Muvattupuzha', 'Ernakulam', '687543', 'kerala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_photo`
--
ALTER TABLE `car_photo`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_photo`
--
ALTER TABLE `car_photo`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
