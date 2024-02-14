-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 05:27 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `group` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `salary` int(11) NOT NULL,
  `img` varchar(225) DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `email`, `password`, `phone1`, `phone2`, `group`, `status`, `salary`, `img`, `createAt`) VALUES
(1, 'mohmed', 'samy', 'mohamed@mail.com', '123', '01150100104', '01150100104', 'employee', 'lm', 50, NULL, '2022-06-03 15:05:30'),
(2, 'sayed', 'mohamed', 'sayed@gmail.com', '1233', '01100433760', '01018326408', 'admin', 'active', 55, NULL, '2022-06-03 03:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `createAt`) VALUES
(1, 'Double', '2022-06-01 18:21:35'),
(2, 'King', '2022-06-01 18:21:44'),
(3, 'Family', '2022-06-01 18:21:29'),
(4, 'Suite', '2022-06-01 18:21:48'),
(5, 'Single', '2022-06-01 18:21:54'),
(6, 'Triple', '2022-06-01 18:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `custmer`
--

CREATE TABLE `custmer` (
  `id` int(11) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(150) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(55) NOT NULL,
  `cresteAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custmer`
--

INSERT INTO `custmer` (`id`, `firstName`, `lastName`, `email`, `password`, `img`, `phone`, `address`, `cresteAt`) VALUES
(1, 'youssef', 'shaaban', 'youssefshaaban.8000@gmail.com', '123', '1654029329IMG_20201001_114752_005.jpg', '01123402232', 'elnozha', '2022-05-31 20:35:29'),
(2, 'youssef', 'shaaban', 'youssef.8000@gmail.com', '111', '1654038860', '01123402232', 'elnozha', '2022-05-31 23:14:20'),
(3, 'sayed', 'moahemd', 'sayed@gmail.com', '123', '1654096221sayed.jpg', '01100433760', 'Hawmdia', '2022-06-01 15:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Manager'),
(2, 'Front Desk Receptionist'),
(3, 'Housekeeping Manager	'),
(4, 'Cheif'),
(5, 'Waiter'),
(6, 'Hotel Sales Manager	'),
(7, 'Hotel Maintenance Engineer'),
(8, 'Room Attendant'),
(9, 'Concierge');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(20) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `lastName`, `email`, `password`, `departmentid`, `shift`, `createdAt`) VALUES
(5, 'sayed', 'moahemd', 'sayed@gmail.com', '123', 7, 3, '2022-05-28 15:53:02'),
(6, 'youssef', 'shaaban', 'youssef.8000@gmail.com', '12345', 6, 1, '2022-06-01 17:41:21'),
(7, 'Micheal', 'Amir', 'Micheal@gmail', '1234', 2, 3, '2022-06-01 17:42:58'),
(8, 'Mohamed', 'Samy', 'mohamed@gmail.com', '12345', 7, 3, '2022-06-03 13:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `price` int(55) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `custmerId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `days` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) NOT NULL DEFAULT 'whating'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(50) NOT NULL,
  `descriptions` varchar(225) DEFAULT NULL,
  `img` varchar(225) DEFAULT NULL,
  `adminId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'active',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `descriptions`, `img`, `adminId`, `categoryId`, `status`, `createAt`) VALUES
(1, 'K5-102', 300, 'Pool view, WiFi, HDTV, media panel, laptop safe, minibar  Admire views of the pool from this stylish guest room with one king bed. Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your', '16540294611.png', 0, 2, 'active', '2022-06-03 14:38:05'),
(2, 'F-60', 500, '144 sq. m., two minibars, two bathrooms, two TVs, air conditioning, mini bar, tea & coffee facilities. This 144 sq. m. Queen Family Room features two bathrooms and walk in showers both fully stocked with luxurious amenities. ', '16540355964.png', 2, 3, 'active', '2022-06-03 03:55:52'),
(3, 'D1-106', 500, 'Pool view, terrace, WiFi, HDTV, media panel, laptop safe, minibar  Located on the ground floor opposite the pool, enjoy the sunshine from the private terrace of this stylish cabana room with one king bed.  Unwind and watch th', '1654099973TWIN GUEST ROOM.jpg', 2, 1, 'active', '2022-06-01 16:12:53'),
(4, 'S-201', 200, 'Elegant dÃ©cor, air conditioning, tea & coffee facilities, 37-inch TV, mini bar. Stay in this contemporary guest room featuring a queen-sized bed. This room comfortably sleeps two adults and two children. Unwind in front of t', '16541078191.jpg', 2, 5, 'active', '2022-06-03 14:40:10'),
(5, 'T-302', 500, 'Pool view, terrace, WiFi, HDTV, media panel, laptop safe, minibar  Located on the ground floor opposite the pool, enjoy the sunshine from the private terrace of this stylish cabana room with one king bed.  Unwind and watch th', '16541078641.jpg', 2, 6, 'active', '2022-06-01 18:24:24'),
(6, 'Su-401', 700, 'Elegant dÃ©cor, air conditioning, tea & coffee facilities, 37-inch TV, mini bar. Stay in this contemporary guest room featuring a queen-sized bed. This room comfortably sleeps two adults and two children. Unwind in front of t', '16541079052.jpg', 2, 4, 'active', '2022-06-03 03:55:55'),
(7, 'K2-103', 700, 'WiFi, HDTV, media panel, laptop safe, minibar  Enjoy your stay in this stylish guest room with one king bed.  Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your devices to the scree', '16542690903.png', 1, 2, 'active', '2022-06-03 15:11:30'),
(8, 'K1-101', 600, 'WiFi, HDTV, media panel, laptop safe, minibar  Enjoy your stay in this stylish guest room with one king bed.  Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your devices to the scree', '1654269176KING GUEST ROOM1.jpg', 1, 2, 'active', '2022-06-03 15:12:56'),
(9, 'F2-100', 900, ' 144 sq. m., two minibars, two bathrooms, two TVs, air conditioning, mini bar, tea & coffee facilities. This 144 sq. m. Queen Family Room features two bathrooms and walk in showers both fully stocked with luxurious amenities.', '1654269236FAMILY TWO-CONNECTING BEDROOMS.png', 1, 3, 'active', '2022-06-03 15:13:56'),
(10, 'F3-121', 1000, 'Mountain or city view, private balcony, floor to ceiling windows, mini bar, 32-inch HDTV, coffee maker  The Family Connecting Room combines two Guest Rooms, king & twin, into the one bookable room, enhancing the convenience o', '1654269284pool view.jpg', 1, 3, 'active', '2022-06-03 15:14:44'),
(11, 'D2-104', 600, 'Pool view, terrace, WiFi, HDTV, media panel, laptop safe, minibar  Located on the ground floor opposite the pool, enjoy the sunshine from the private terrace of this stylish cabana room with one king bed.  Unwind and watch th', '1654269341TWIN GUEST ROOM.jpg', 1, 1, 'active', '2022-06-03 15:15:41'),
(12, 'D3-103', 700, ' This bright guestroom offers majestic views of the mountains or city.  Enjoy a decadent cup of freshly brewed coffee and admire the views from your private balcony.  Unwind on the couch in your cozy bathrobe and slippers as ', '16542693763.png', 1, 1, 'active', '2022-06-03 15:16:16'),
(13, 'D4-107', 750, 'Pool view, WiFi, HDTV, media panel, laptop safe, minibar  Admire views of the pool from this stylish guest room with twin beds.  Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your d', '16542694271.png', 1, 1, 'active', '2022-06-03 15:17:07'),
(14, 'F5-109', 850, 'Elegant dÃ©cor, air conditioning, tea & coffee facilities, 37-inch TV, mini bar. Stay in this contemporary guest room featuring a queen-sized bed. This room comfortably sleeps two adults and two children. Unwind in front of t', '16542694774.png', 1, 3, 'active', '2022-06-03 15:17:57'),
(15, 'Su-202', 1200, 'WiFi, HDTV, media panel, laptop safe, minibar  Enjoy your stay in this stylish guest room with one king bed.  Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your devices to the scree', '16542695131.jpg', 1, 4, 'active', '2022-06-03 15:18:33'),
(16, 'T2-120', 600, ' This bright guestroom offers majestic views of the mountains or city.  Enjoy a decadent cup of freshly brewed coffee and admire the views from your private balcony.  Unwind on the couch in your cozy bathrobe and slippers as ', '16542697472.jpg', 1, 6, 'active', '2022-06-03 15:22:27'),
(17, 'T3-301', 800, ' This bright guestroom offers majestic views of the mountains or city.  Enjoy a decadent cup of freshly brewed coffee and admire the views from your private balcony.  Unwind on the couch in your cozy bathrobe and slippers as ', '1654269769triple1.jpg', 1, 6, 'active', '2022-06-03 15:22:49'),
(18, 'S-200', 400, 'WiFi, HDTV, media panel, laptop safe, minibar  Enjoy your stay in this stylish guest room with one king bed.  Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your devices to the scree', '16542699262.jpg', 1, 5, 'active', '2022-06-03 15:25:26'),
(19, 'S-203', 500, ' This bright guestroom offers majestic views of the mountains or city.  Enjoy a decadent cup of freshly brewed coffee and admire the views from your private balcony.  Unwind on the couch in your cozy bathrobe and slippers as ', '16542699464.jpg', 1, 5, 'active', '2022-06-03 15:25:46'),
(20, 'K4-100', 700, 'WiFi, HDTV, media panel, laptop safe, minibar  Enjoy your stay in this stylish guest room with one king bed.  Unwind and watch the HDTV and stay connected with the media panel allowing you to connect your devices to the scree', '16542700051.png', 1, 2, 'active', '2022-06-03 15:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `name`) VALUES
(1, 'from 4:00Am to 10:00Am'),
(2, 'from 10:00Am to 4:00Pm'),
(3, 'from 4:00Pm to 10:00Pm'),
(4, 'from 10:00Pm to 4:00Am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custmer`
--
ALTER TABLE `custmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `shift` (`shift`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custmerId` (`custmerId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custmer`
--
ALTER TABLE `custmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`shift`) REFERENCES `shift` (`id`);

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`custmerId`) REFERENCES `custmer` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
