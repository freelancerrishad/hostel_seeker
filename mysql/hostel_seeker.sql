-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 02:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_seeker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(100) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL,
  `owner_username` varchar(100) DEFAULT NULL,
  `hostel_name` varchar(100) DEFAULT NULL,
  `hostel_area` varchar(100) DEFAULT NULL,
  `no_of_rooms` int(11) DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `short_descript` varchar(1000) DEFAULT NULL,
  `descript` varchar(5000) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`id`, `owner_username`, `hostel_name`, `hostel_area`, `no_of_rooms`, `image`, `short_descript`, `descript`, `status`) VALUES
(10, 'wdr', 'faridpur', 'faridpur', 10, 0x3930333238323634325f646f776e6c6f61642e6a666966, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 1),
(11, 'wdr', 'sasdsd', 'rereerer', 15, 0x3439323936373138305f646f776e6c6f61642e6a666966, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_owner`
--

CREATE TABLE `hostel_owner` (
  `owner_username` varchar(100) NOT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `owner_number` int(11) DEFAULT NULL,
  `owner_NID` int(11) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `owner_pass` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_owner`
--

INSERT INTO `hostel_owner` (`owner_username`, `owner_name`, `owner_number`, `owner_NID`, `email_address`, `owner_pass`, `address`) VALUES
('wdr', 'Rishad Islam', 1705978622, 2002332063, 'eshopier2021@gmail.com', 'rishad', 'Kurigram Sadar');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_username` varchar(100) NOT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `member_profession` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `NID` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `member_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_username`, `member_name`, `email_address`, `mobile_number`, `member_profession`, `age`, `NID`, `gender`, `address`, `member_pass`) VALUES
('wdr', 'Rishad Islam', 'eshopier2021@gmail.com', 1705978622, 'student', 10, 2002332063, 'male', 'Kurigram Sadar', 'rishad');

-- --------------------------------------------------------

--
-- Table structure for table `member_details`
--

CREATE TABLE `member_details` (
  `id` int(11) NOT NULL,
  `hostel_name` varchar(100) NOT NULL,
  `room_number` int(11) DEFAULT NULL,
  `member_01_ocupation` varchar(100) DEFAULT NULL,
  `member_02_ocupation` varchar(100) DEFAULT NULL,
  `member_03_ocupation` varchar(100) DEFAULT NULL,
  `member_04_ocupation` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_details`
--

INSERT INTO `member_details` (`id`, `hostel_name`, `room_number`, `member_01_ocupation`, `member_02_ocupation`, `member_03_ocupation`, `member_04_ocupation`, `status`) VALUES
(9, '', 101, 'student', 'teacher', 'businessman', 'gov job', 1),
(10, '', 101, 'tea', 'teacher', 'job', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `sent_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `received_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createdAt` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sent_by`, `received_by`, `message`, `createdAt`, `image`) VALUES
(74, 'wdr', 'wdr', 'hi', '2021-09-25 07:45:27am', ''),
(75, 'wdr', 'wdr', 'hlw', '2021-09-25 07:45:52am', ''),
(76, 'wdr', 'wdr', 'hi', '2021-09-25 08:10:28am', ''),
(77, 'wdr', 'wdr', 'hi', '2021-09-25 09:15:50am', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages2`
--

CREATE TABLE `messages2` (
  `id` int(100) NOT NULL,
  `sent_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `received_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createdAt` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages2`
--

INSERT INTO `messages2` (`id`, `sent_by`, `received_by`, `message`, `createdAt`) VALUES
(3, 'wdr', 'wdr', 'hlw', '2021-09-25 07:45:43am'),
(4, 'wdr', 'wdr', 'hlw', '2021-09-25 08:21:34am');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `member_username` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) DEFAULT NULL,
  `hostel_name` varchar(100) NOT NULL,
  `room_number` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `no_of_member_present` int(11) NOT NULL,
  `rent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hostel_name`, `room_number`, `capacity`, `no_of_member_present`, `rent`) VALUES
(9, '', 101, 4, 0, 5000),
(9, '', 102, 3, 0, 5000),
(10, '', 101, 4, 0, 5000),
(10, '', 102, 40, 20, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hostel_owner`
--
ALTER TABLE `hostel_owner`
  ADD PRIMARY KEY (`owner_username`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_username`),
  ADD UNIQUE KEY `member_username` (`member_username`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages2`
--
ALTER TABLE `messages2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `messages2`
--
ALTER TABLE `messages2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
