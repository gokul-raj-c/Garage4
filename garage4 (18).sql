-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 11:50 AM
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
(88, 'Ambassador', 'Vintage', 'white', '4', '4000', '20', 'gourirajc@gmail.com', '2', '2023-10-29', '2023-10-30', '2023-10-31', '8000', 1, 0);

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
(10, 'Website Performance', 'It is Not Working Properly', 'website', '2023-10-07', 'moncy@gmail.com', '1', 'We Will Fix It Soon'),
(11, 'Car Working', 'viper not functioning', 'car', '2023-10-14', 'gourirajc@gmail.com', '1', 'we appologise');

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
('admin1234@gmail.com', 'admin1234', '0', '1'),
('basilkreji@gmail.com', 'basil1234', '1', '1'),
('eldhowilson@gmail.com', 'eldho1234', '1', '1'),
('gokulrajc63@gmail.com', 'gokul1234', '1', '1'),
('gourirajc@gmail.com', 'gouri1234', '1', '1'),
('moncy@gmail.com', 'moncy1234', '1', '1');

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
(23, '71', 'gokulrajc63@gmail.com', '14000', '2023-10-21 11:07:20'),
(24, '72', 'gokulrajc63@gmail.com', '16000', '2023-10-21 11:27:55'),
(25, '73', 'gokulrajc63@gmail.com', '36000', '2023-10-21 12:00:10'),
(26, '73', 'gokulrajc63@gmail.com', '36000', '2023-10-21 12:02:08'),
(27, '74', 'gokulrajc63@gmail.com', '16500', '2023-10-21 12:16:37'),
(28, '75', 'gokulrajc63@gmail.com', '24000', '2023-10-21 12:35:05'),
(29, '76', 'gokulrajc63@gmail.com', '8000', '2023-10-21 12:37:51'),
(30, '77', 'gokulrajc63@gmail.com', '27500', '2023-10-25 07:04:27'),
(31, '78', 'gokulrajc63@gmail.com', '35000', '2023-10-25 07:06:50'),
(32, '78', 'gokulrajc63@gmail.com', '35000', '2023-10-25 07:06:57'),
(33, '78', 'gokulrajc63@gmail.com', '35000', '2023-10-25 07:09:25'),
(34, '79', 'gokulrajc63@gmail.com', '12000', '2023-10-25 08:41:42'),
(35, '79', 'gokulrajc63@gmail.com', '12000', '2023-10-25 08:58:59'),
(36, '80', 'gokulrajc63@gmail.com', '28000', '2023-10-25 16:45:39'),
(37, '81', 'gokulrajc63@gmail.com', '16500', '2023-10-25 17:00:44'),
(38, '82', 'gokulrajc63@gmail.com', '18000', '2023-10-25 17:28:00'),
(39, '83', 'gokulrajc63@gmail.com', '16000', '2023-10-25 17:38:29'),
(40, '84', 'gokulrajc63@gmail.com', '28000', '2023-10-26 06:50:58'),
(41, '85', 'gokulrajc63@gmail.com', '24000', '2023-10-27 08:20:05'),
(42, '86', 'gokulrajc63@gmail.com', '11000', '2023-10-27 08:29:17'),
(43, '87', 'gokulrajc63@gmail.com', '24000', '2023-10-29 06:31:32'),
(44, '88', 'gourirajc@gmail.com', '8000', '2023-10-29 11:44:21');

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
(13, 'p3.jpg', 'Audi', 'Premium', '', '', '', 'Blue', '4', 'Maintained', '7000', 0),
(14, 'p4.jpg', 'Mini Cooper', 'Premium', '', '', '', 'Grey', '2', 'Maintained', '8000', 0),
(17, 'n5.jpg', 'Polo', 'Other', '', '', '', 'Black', '4', 'Maintained', '4000', 0),
(18, 'nn1.jpg', 'Swift', 'Other', '', '', '', 'White', '4', 'Maintained', '4000', 0),
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
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`image`, `first_name`, `last_name`, `contact`, `email_id`, `date_of_birth`, `house_name`, `street_name`, `district`, `pincode`, `state`) VALUES
('default', 'basil', 'k reji', '5588226699', 'basilkreji@gmail.com', '2023-09-07', 'cccc', 'yyyyy', 'Ernakulam', '686667', 'kerala'),
('eldhowilsongmailcom.jpg', 'Eldho', 'Wilson', '9074288916', 'eldhowilson@gmail.com', '2003-04-22', 'Chakkalackal', 'Pampakkuda', 'Ernakulam', '686667', 'Kerala'),
('gokulrajc63gmailcom.jpg', 'Gokul', 'Raj', '9061393951', 'gokulrajc63@gmail.com', '2003-04-11', 'Chavarukulangara(H)', 'Periyappuram', 'Ernakulam', '686667', 'Kerala'),
('default', 'Gouri', 'Raj', '6235273701', 'gourirajc@gmail.com', '2006-06-06', 'Chavarukulangara', 'Periyappuram', 'Ernakulam', '686667', 'Kerala'),
('moncygmailcom.jpg', 'Moncy', 'Francis', '8945214788', 'moncy@gmail.com', '2003-09-11', 'moncyy', 'Muvattupuzha', 'Ernakulam', '687543', 'kerala');

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
