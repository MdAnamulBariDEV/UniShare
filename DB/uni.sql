-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 07:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `registration_date`, `token`) VALUES
(1, 'admin', 'forallpurposes3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-08-28 16:17:12', '740fdae9834f48e13cef70270007e0'),
(2, 'demo', 'ximnewaz@gmail.com', '1234', '2023-01-14 15:34:04', '9a884ea3716488341f3cb44aba4aed'),
(3, 'test', 'test@gmail.com', '1234', '2023-01-14 15:34:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `rating`, `review`, `pid`) VALUES
(1, '0', 5, '0', 6),
(2, 'Test', 4, 'Great', 8);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `del_status` int(11) DEFAULT NULL,
  `counter` int(10) DEFAULT NULL,
  `download` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `title`, `description`, `video`, `tags`, `user_id`, `status`, `category`, `upload_time`, `del_status`, `counter`, `download`) VALUES
(1, 'Demo Course Title', 'asdasdasd', '011181305.docx', 'Web, graphics', 9, NULL, NULL, '2023-01-14 15:16:57', 1, 5, NULL),
(2, 'acbfvs', ' dawdawdwadaw', 'Class Diagrams.pdf', 'dfsd,fgf', 9, NULL, NULL, '2023-01-14 15:16:57', 1, 5, NULL),
(3, 'erer', ' sdfdssdfsdf', 'CT3SAD.xlsx', 'erew,dfsdf', 9, NULL, NULL, '2023-01-14 16:48:46', 0, 16, 1),
(4, 'affdsd', ' fgfrrrrrrrrrrrrrrr5953sdfsdfdsfs', 'E-Med_final_Slide-1 (1).pptx', 'ddsfsd,fdgdf', 9, NULL, NULL, '2023-01-14 15:16:57', 1, 5, NULL),
(5, 'course', ' wdwadwa', 'Group-3 (Emed).docx', 'wdwa', 9, 0, 'algorithm', '2023-01-14 16:48:30', 1, 5, 1),
(6, 'New File for Sad Project', ' Uploaded for Mr ISharak', 'FYDP-Features.docx', 'SAD, OOP', 10, 0, 'system', '2023-01-14 17:51:47', 1, 16, NULL),
(7, 'Point Check', ' Test data', '2.jpeg', 'Test, Test', 1, 1, 'hardware', '2023-01-14 15:16:57', 1, 5, NULL),
(8, 'Sad File 2', ' lorem imsadsdasdwe fsdfa sd ADWADW ASD AS', 'Screenshot_20221021_092051.png', 'sad ', 1, 1, 'system', '2023-01-14 17:52:52', NULL, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_details` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tag` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post_title`, `post_details`, `post_time`, `tag`, `status`) VALUES
(1, 1, 'Data Structure', 'I need all the videos of data structure.  ', '2022-09-06 17:54:35', NULL, 1),
(2, 4, 'Lorem Ipsum', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum', '2022-09-06 17:56:19', NULL, 1),
(3, 6, 'wda', 'asdas', '2022-09-06 17:56:20', NULL, 1),
(4, 8, 'asdasd', 'asdasdasd', '2022-09-06 17:56:20', NULL, 1),
(5, 9, 'wadawdwa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2022-09-06 17:56:21', NULL, 1),
(6, 1, 'Sad Project Courses', 'Lorem Ipsum .........', '2022-09-06 17:52:34', NULL, 0),
(7, 1, 'PHP OOP', 'Lorem ipsum ', '2022-09-06 17:52:35', 'Tag, here', 0),
(8, 10, 'Sad Project Courses', 'Lorem Ipsum', '2022-09-06 17:52:37', 'SAD, OOP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `shipping_address` longtext DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact_no`, `shipping_address`, `registration_date`, `status`, `point`, `token`) VALUES
(1, 'Sayed Nur E Newaz', 'ximnewaz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0123213', 'Test 1 2 3 4 5', '2023-01-14 16:55:45', 0, 65, '8e921bc85c63cc157bd1c270081f45'),
(4, 'Demo', 'demo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123', NULL, '2021-06-02 14:39:19', 0, 2, 'bc2ea0ea8251054b722290c75a7f4f'),
(6, 'jim', 'jim@gmail.com', '202cb962ac59075b964b07152d234b70', '123', NULL, '2021-08-28 09:15:15', 0, 110, '99db6f514f5508650324d03c22d32a'),
(8, 'Demo', 'Demo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', NULL, '2021-09-18 20:34:17', 0, 0, '46a3266dbedbc9c29d8eef931e9c2d'),
(9, 'Final Test', 'snewaz181305@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', '159789', '', '2022-09-07 06:36:35', 0, 0, 'b1ba30fb7d04b1d846598ed7a9b0d1'),
(10, 'Ishrak name updated', 'test@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '', '2022-08-24 06:10:28', 0, 0, '9b50da63a2f82c38b43234682d91f7');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `posting date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `FKwishlist308861` (`user_id`),
  ADD KEY `FKwishlist616636` (`medicine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
