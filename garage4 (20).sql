-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 04:03 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `carname` varchar(60) NOT NULL,
  `category` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `capacity` varchar(40) NOT NULL,
  `rate` varchar(40) NOT NULL,
  `car_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `days` varchar(40) NOT NULL,
  `bdate` date NOT NULL,
  `pick` date NOT NULL,
  `dropd` date NOT NULL,
  `total` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `carname`, `category`, `color`, `capacity`, `rate`, `car_id`, `email`, `days`, `bdate`, `pick`, `dropd`, `total`, `status`, `payment`) VALUES
(90, 'Fortuner', 'Premium', 'white', '4', '6000', '21', 'gokulrajc63@gmail.com', '4', '2023-10-31', '2023-11-01', '2023-11-04', '24000', 2, 0),
(91, 'Polo', 'Other', 'Black', '4', '4000', '17', 'gokulrajc63@gmail.com', '2', '2023-10-31', '2023-11-02', '2023-11-03', '8000', 2, 0),
(92, 'Audi', 'Premium', 'Blue', '4', '7000', '13', 'gokulrajc63@gmail.com', '3', '2023-10-31', '2023-11-02', '2023-11-04', '21000', 1, 0),
(93, 'Swift', 'Other', 'White', '4', '4000', '18', 'gokulrajc63@gmail.com', '9', '2023-10-31', '2023-11-03', '2023-11-11', '36000', 1, 0);

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
  `reply` varchar(10) NOT NULL,
  `message` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `title`, `description`, `type`, `date`, `email_id`, `reply`, `message`) VALUES
(12, 'Car Working', 'should be checked properly', 'car', '2023-10-31', 'gokulrajc63@gmail.com', '0', '');

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
('gokulrajc63@gmail.com', 'Gokul123#', '1', '1'),
('gourirajc@gmail.com', 'Gouri123#', '1', '1'),
('teamgarage4web@gmail.com', 'admin1234', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `expiry` datetime NOT NULL,
  `sendtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `email`, `otp`, `expiry`, `sendtime`) VALUES
(1, 'gokulrajc63@gmail.com', '554133', '2023-10-27 12:16:22', '0000-00-00 00:00:00'),
(2, 'gokulrajc63@gmail.com', '862464', '2023-10-28 07:22:14', '2023-10-28 05:07:19'),
(3, 'gokulrajc63@gmail.com', '816957', '2023-10-28 07:24:01', '2023-10-28 05:09:16'),
(4, 'gokulrajc63@gmail.com', '307779', '2023-10-28 07:24:16', '2023-10-28 05:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `paid_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `email`, `amount`, `paid_date`) VALUES
(45, '89', 'gokulrajc63@gmail.com', '28000', '2023-10-30 15:48:11'),
(46, '90', 'gokulrajc63@gmail.com', '24000', '2023-10-31 06:03:38'),
(47, '91', 'gokulrajc63@gmail.com', '8000', '2023-10-31 06:55:15'),
(48, '92', 'gokulrajc63@gmail.com', '21000', '2023-10-31 14:28:32'),
(49, '93', 'gokulrajc63@gmail.com', '36000', '2023-10-31 16:01:22');

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
(13, 'p3.jpg', 'Audi', 'Premium', '', '', '', 'Blue', '4', 'Maintained', '7000', 1),
(14, 'p4.jpg', 'Mini Cooper', 'Premium', '', '', '', 'Grey', '2', 'Maintained', '8000', 0),
(17, 'n5.jpg', 'Polo', 'Other', '', '', '', 'Black', '4', 'Maintained', '4000', 0),
(18, 'nn1.jpg', 'Swift', 'Other', '', '', '', 'White', '4', 'Maintained', '4000', 1),
(19, 'p1.jpg', 'Benz', 'Premium', '', '', '', 'Black', '4', 'Well Maintained', '5500', 0),
(20, 'v2.jpg', 'Ambassador', 'Vintage', '', '', '', 'white', '4', 'Maintained', '4000', 1),
(21, 'n3.jpg', 'Fortuner', 'Premium', '', '', '', 'white', '4', 'Maintained', '6000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `house_name` varchar(30) NOT NULL,
  `street_name` varchar(30) NOT NULL,
  `district` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `state` varchar(30) NOT NULL,
  `date_of_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`image`, `first_name`, `last_name`, `contact`, `email_id`, `date_of_birth`, `house_name`, `street_name`, `district`, `pincode`, `state`, `date_of_join`) VALUES
('default.jpg', 'Gokul', 'Raj', '9061393951', 'gokulrajc63@gmail.com', '2003-04-11', 'chavarukulangara', 'periyappuram', 'Ernakulam', '686667', 'kerala', '2023-10-30'),
('default.jpg', 'Gouri', 'Raj', '6235273701', 'gourirajc@gmail.com', '2006-06-06', 'chavarukulangara', 'periyappuram', 'Ernakulam', '686667', 'kerala', '2023-10-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

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
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
