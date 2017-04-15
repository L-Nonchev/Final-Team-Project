-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 12:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circle_tube`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chanals`
--

CREATE TABLE `chanals` (
  `user_id` int(10) NOT NULL,
  `chanal_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE `coments` (
  `coment_id` int(20) NOT NULL,
  `video_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `c_text` varchar(300) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `re_coment` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discussion_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `d_text` varchar(300) NOT NULL,
  `d_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_discussant_id` int(10) NOT NULL,
  `re_discussion` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `user_id` int(10) NOT NULL,
  `video_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `play_lists`
--

CREATE TABLE `play_lists` (
  `play_list_id` int(10) NOT NULL,
  `p_title` varchar(30) NOT NULL,
  `p_logo_path` varchar(150) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `u_email` varchar(40) NOT NULL,
  `u_password` varchar(40) NOT NULL,
  `country` varchar(20) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subscribers` int(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pic_path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(20) NOT NULL,
  `v_titel` varchar(30) NOT NULL,
  `v_path` varchar(50) DEFAULT NULL,
  `V_poster_path` varchar(50) DEFAULT NULL,
  `v_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `v_text` varchar(300) DEFAULT NULL,
  `v_like` int(250) DEFAULT NULL,
  `v_dislike` int(250) DEFAULT NULL,
  `v_views` int(250) DEFAULT NULL,
  `category_id` int(3) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_plist`
--

CREATE TABLE `video_plist` (
  `video_id` int(20) NOT NULL,
  `play_list_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `chanals`
--
ALTER TABLE `chanals`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chanal_id` (`chanal_id`);

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`coment_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `re_coment` (`re_coment`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_discussant_id` (`user_discussant_id`),
  ADD KEY `re_discussion` (`re_discussion`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `play_lists`
--
ALTER TABLE `play_lists`
  ADD PRIMARY KEY (`play_list_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_p_title` (`p_title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD KEY `idx_email` (`u_email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD UNIQUE KEY `v_titel` (`v_titel`),
  ADD UNIQUE KEY `v_path` (`v_path`),
  ADD UNIQUE KEY `V_poster_path` (`V_poster_path`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `idx_v_titel` (`v_titel`);

--
-- Indexes for table `video_plist`
--
ALTER TABLE `video_plist`
  ADD KEY `video_id` (`video_id`),
  ADD KEY `play_list_id` (`play_list_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `coment_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discussion_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `play_lists`
--
ALTER TABLE `play_lists`
  MODIFY `play_list_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chanals`
--
ALTER TABLE `chanals`
  ADD CONSTRAINT `chanals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `chanals_ibfk_2` FOREIGN KEY (`chanal_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `coments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `coments_ibfk_3` FOREIGN KEY (`re_coment`) REFERENCES `coments` (`coment_id`);

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_discussant_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `discussions_ibfk_3` FOREIGN KEY (`re_discussion`) REFERENCES `discussions` (`discussion_id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `play_lists`
--
ALTER TABLE `play_lists`
  ADD CONSTRAINT `play_lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `video_plist`
--
ALTER TABLE `video_plist`
  ADD CONSTRAINT `video_plist_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `video_plist_ibfk_2` FOREIGN KEY (`play_list_id`) REFERENCES `play_lists` (`play_list_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
