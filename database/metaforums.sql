-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 04:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metaforums`
--

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `threadsubtopic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `title`, `message`, `creator_id`, `created_at`, `updated_at`, `threadsubtopic_id`) VALUES
(1, 'Tes Thread game fps', 'tes tes tes tes tes tes tes', 10, '2021-05-13 00:00:00', '2021-05-13 00:00:00', 2),
(2, 'Tes Thread game fps tes tes tes tes tes tes tes tes tes tes tes tes tes tes tes tes v tes tes tes tes tes tes tes tes tes tes v tes', 'tes tes tes tes tes tes tes123', 10, '2021-05-13 00:00:00', '2021-05-13 00:00:00', 2),
(3, 'tes thread painting tes thread painting', 'tes painting tes painting tes painting', 10, '2021-05-13 08:53:33', '2021-05-13 08:53:33', 47),
(4, 'tes thread sketch tes thread sketch', 'tes sketch painting tes thread painting tes sketch painting tes thread painting tes sketch painting tes thread painting', 10, '2021-05-13 08:53:33', '2021-05-13 08:53:33', 48);

-- --------------------------------------------------------

--
-- Table structure for table `threadsubtopic`
--

CREATE TABLE `threadsubtopic` (
  `id` int(11) NOT NULL,
  `threadsubtopic_name` varchar(255) NOT NULL,
  `threadtopic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threadsubtopic`
--

INSERT INTO `threadsubtopic` (`id`, `threadsubtopic_name`, `threadtopic_id`) VALUES
(1, 'RPG', 1),
(2, 'FPS', 1),
(3, 'JRPG', 1),
(4, 'Action', 1),
(5, 'Adventure', 1),
(6, 'Horror', 1),
(7, 'Survival', 1),
(8, 'Moba', 1),
(9, 'Arcade', 1),
(10, 'Action', 2),
(11, 'Adventure', 2),
(12, 'Horror', 2),
(13, 'Drama', 2),
(14, 'Comedy', 2),
(15, 'Sci-Fi', 2),
(16, 'Supernatural', 2),
(17, 'Website', 3),
(18, 'Mobile', 3),
(19, 'Slice of Life', 2),
(20, 'Slice of Life', 2),
(21, 'Slice of Life', 2),
(22, 'Slice of Life', 2),
(23, 'Cryptocurrency', 3),
(24, 'Artificial Intelligence', 3),
(25, 'Sinovac', 6),
(26, 'AstraZeneca', 6),
(27, 'New Covid Variant', 6),
(28, 'Football', 7),
(29, 'Volley', 7),
(30, 'Badminton', 7),
(31, 'Basketball', 7),
(32, 'F1', 7),
(33, 'Moto GP', 7),
(34, 'Ski', 7),
(35, 'Tennis', 7),
(36, 'Celebrity', 9),
(37, 'Recipe', 10),
(38, 'Forest', 13),
(39, 'Mountain', 13),
(40, 'Lake', 13),
(41, 'River', 13),
(42, 'Crater', 13),
(43, 'Car', 14),
(44, 'Bike', 14),
(45, 'Plane', 14),
(46, 'Train', 14),
(47, 'Painting', 12),
(48, 'Sketch', 12),
(49, 'Photo', 12);

-- --------------------------------------------------------

--
-- Table structure for table `threadtopic`
--

CREATE TABLE `threadtopic` (
  `id` int(11) NOT NULL,
  `topicname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threadtopic`
--

INSERT INTO `threadtopic` (`id`, `topicname`) VALUES
(12, 'Art'),
(14, 'Automotic'),
(6, 'Covid19'),
(5, 'Economy'),
(11, 'Education'),
(9, 'Entertainment'),
(2, 'Film'),
(10, 'Food'),
(8, 'Health'),
(4, 'Politic'),
(7, 'Sport'),
(3, 'Technology'),
(1, 'VideoGame'),
(13, 'World');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `onlinestatus` varchar(20) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `emailverifystatus` tinyint(1) NOT NULL,
  `logindate` datetime DEFAULT NULL,
  `moderationstatus` varchar(30) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `aboutme` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `pass`, `roles`, `onlinestatus`, `avatar`, `emailverifystatus`, `logindate`, `moderationstatus`, `address`, `aboutme`) VALUES
(1, 'test@gmail.com', 'Magizuki', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(2, 'test@gmail.com', 'Magizokoi', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(3, 'test@gmail.com', 'Magibuto', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(4, 'test@gmail.com', 'Baba Yaga', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(5, 'test@gmail.com', 'ChVine', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(6, 'test@gmail.com', 'ChVine10', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, '2021-05-13 09:42:07', 'Active', NULL, 'hello hello'),
(10, 'metaforumsdev@gmail.com', 'Magizuki1', 'bWV0YWZvcnVtczEyMw==', 'USER', 'Online', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 1, '2021-05-15 04:12:11', 'Active', NULL, 'hello hello'),
(17, 'test@gmail.com', 'Magizuki10', 'YmFiYXlhZ2ExMjM=', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(19, 'test@gmail.com', 'Magizuki123123', 'YmFiYXlhZ2ExMjM=', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(22, 'test@gmail.com', 'Magizuki21312321', 'YmFiYXlhZ2ExMjM=', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello'),
(24, 'test@gmail.com', 'Magizuki4234', 'YmFiYXlhZ2ExMjM=', 'USER', 'Offline', 'http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg', 0, NULL, 'Active', NULL, 'hello hello');

-- --------------------------------------------------------

--
-- Table structure for table `viewer`
--

CREATE TABLE `viewer` (
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `isFavorite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `threadsubtopic_id` (`threadsubtopic_id`) USING BTREE;

--
-- Indexes for table `threadsubtopic`
--
ALTER TABLE `threadsubtopic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threadtopic_id` (`threadtopic_id`);

--
-- Indexes for table `threadtopic`
--
ALTER TABLE `threadtopic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topicname` (`topicname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewer`
--
ALTER TABLE `viewer`
  ADD PRIMARY KEY (`user_id`,`thread_id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `threadsubtopic`
--
ALTER TABLE `threadsubtopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `threadtopic`
--
ALTER TABLE `threadtopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`threadsubtopic_id`) REFERENCES `threadsubtopic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threadsubtopic`
--
ALTER TABLE `threadsubtopic`
  ADD CONSTRAINT `threadsubtopic_ibfk_1` FOREIGN KEY (`threadtopic_id`) REFERENCES `threadtopic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `viewer`
--
ALTER TABLE `viewer`
  ADD CONSTRAINT `viewer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viewer_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
