-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 12:04 PM
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
(71, 'Audi', 'Premium', 'Blue', '4', '7000', '13', 'gokulrajc63@gmail.com', '2', '2023-10-21', '2023-10-22', '2023-10-23', '14000', 1, 0),
(72, 'Ambassador', 'Vintage', 'white', '4', '4000', '20', 'gokulrajc63@gmail.com', '4', '2023-10-21', '2023-10-24', '2023-10-27', '16000', 1, 0),
(73, 'Fortuner', 'Premium', 'white', '4', '6000', '21', 'gokulrajc63@gmail.com', '6', '2023-10-21', '2023-10-26', '2023-10-31', '36000', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_photo`
--

CREATE TABLE `car_photo` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_photo`
--

INSERT INTO `car_photo` (`image_id`, `user_id`, `image`) VALUES
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
(26, '73', 'gokulrajc63@gmail.com', '36000', '2023-10-21 12:02:08');

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
(18, 'nn1.jpg', 'Swift', 'Other', '', '', '', 'White', '4', 'Maintained', '4000', 0),
(19, 'p1.jpg', 'Benz', 'Premium', '', '', '', 'Black', '4', 'Well Maintained', '5500', 0),
(20, 'v2.jpg', 'Ambassador', 'Vintage', '', '', '', 'white', '4', 'Maintained', '4000', 1),
(21, 'n3.jpg', 'Fortuner', 'Premium', '', '', '', 'white', '4', 'Maintained', '6000', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `website_review`
--

CREATE TABLE `website_review` (
  `review_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

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
-- Indexes for table `website_review`
--
ALTER TABLE `website_review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `car_photo`
--
ALTER TABLE `car_photo`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `website_review`
--
ALTER TABLE `website_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
