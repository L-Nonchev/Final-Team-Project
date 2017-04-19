-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 10:17 AM
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
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Cars & Vehicles'),
(9, 'Comdy'),
(13, 'Education'),
(10, 'Entertaiment'),
(1, 'Film & Animation'),
(7, 'Gaming'),
(12, 'How-to & Style'),
(3, 'Music'),
(11, 'News & Politics'),
(15, 'Non-profits & Activitsm'),
(8, 'People & Blogs'),
(4, 'Pets & Animals'),
(14, 'Science & Technology'),
(5, 'Sports'),
(6, 'Travel & Events');

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
  `c_text` varchar(500) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `re_coment` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(10) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Afganistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andora'),
(5, 'Argentian'),
(6, 'Armenia'),
(7, 'Australia'),
(8, 'Austria'),
(9, 'Azerbaijan'),
(10, 'Bahams'),
(11, 'Belarus'),
(12, 'Belgium'),
(13, 'Bosna and Herzegovian'),
(14, 'Botswana'),
(15, 'Brazil'),
(16, 'Bulgaira'),
(17, 'Canada'),
(18, 'Cape Verde'),
(19, 'Chech Republic'),
(20, 'Chile'),
(21, 'China'),
(22, 'Colombia'),
(23, 'Croatia'),
(24, 'Cuba'),
(25, 'Cyprusv'),
(26, 'Denmark'),
(27, 'Dominican Republic'),
(28, 'Ecuador'),
(29, 'Egypt'),
(30, 'England'),
(31, 'Estonia'),
(32, 'Ethiopia'),
(33, 'Finaldn'),
(34, 'France'),
(35, 'Georiga'),
(36, 'Germany'),
(37, 'Ghana'),
(38, 'Greece'),
(39, 'Greenland'),
(40, 'Hungary'),
(41, 'Iceland'),
(42, 'India'),
(43, 'Indonesia'),
(44, 'Iran'),
(45, 'Iraq'),
(46, 'Ireland'),
(47, 'Israel'),
(48, 'Italy'),
(49, 'Jamaica'),
(50, 'Japan'),
(51, 'Jordan'),
(52, 'Kazakhstan'),
(53, 'Kuwait'),
(54, 'Latvia'),
(55, 'Libya'),
(56, 'Lithuania'),
(57, 'Luxembourg'),
(58, 'Macedonia'),
(59, 'Maldivis'),
(60, 'Malta'),
(61, 'Marocco'),
(62, 'Mexico'),
(63, 'Moldova'),
(64, 'Monaco'),
(65, 'Netherlands'),
(66, 'New Zeawand'),
(67, 'Niger'),
(68, 'Nigeria'),
(69, 'Northern Ireland'),
(70, 'Norway'),
(71, 'Pakistan'),
(72, 'Panama'),
(73, 'Paraguay'),
(74, 'Philippines'),
(75, 'Poland'),
(76, 'Portugal'),
(77, 'Qatar'),
(78, 'Romania'),
(79, 'Russia'),
(80, 'Saudi Arabia'),
(81, 'Scotland'),
(82, 'Serbia'),
(83, 'Seychelles'),
(84, 'Slovenia'),
(85, 'Slovkia'),
(86, 'South Africa'),
(87, 'South Korea'),
(88, 'Spain'),
(89, 'Sweden'),
(90, 'Switzeland'),
(91, 'Syria'),
(92, 'Thailand'),
(93, 'Turkey'),
(94, 'Ukraine'),
(95, 'United Arab Emirates'),
(96, 'United Kingdom'),
(97, 'United States'),
(98, 'Uruguay'),
(99, 'Uzbekistan'),
(100, 'Venezuela'),
(101, 'Wales'),
(102, 'Afganistan'),
(103, 'Albania'),
(104, 'Algeria'),
(105, 'Andora'),
(106, 'Argentian'),
(107, 'Armenia'),
(108, 'Australia'),
(109, 'Austria'),
(110, 'Azerbaijan'),
(111, 'Bahams'),
(112, 'Belarus'),
(113, 'Belgium'),
(114, 'Bosna and Herzegovian'),
(115, 'Botswana'),
(116, 'Brazil'),
(117, 'Bulgaira'),
(118, 'Canada'),
(119, 'Cape Verde'),
(120, 'Chech Republic'),
(121, 'Chile'),
(122, 'China'),
(123, 'Colombia'),
(124, 'Croatia'),
(125, 'Cuba'),
(126, 'Cyprusv'),
(127, 'Denmark'),
(128, 'Dominican Republic'),
(129, 'Ecuador'),
(130, 'Egypt'),
(131, 'England'),
(132, 'Estonia'),
(133, 'Ethiopia'),
(134, 'Finaldn'),
(135, 'France'),
(136, 'Georiga'),
(137, 'Germany'),
(138, 'Ghana'),
(139, 'Greece'),
(140, 'Greenland'),
(141, 'Hungary'),
(142, 'Iceland'),
(143, 'India'),
(144, 'Indonesia'),
(145, 'Iran'),
(146, 'Iraq'),
(147, 'Ireland'),
(148, 'Israel'),
(149, 'Italy'),
(150, 'Jamaica'),
(151, 'Japan'),
(152, 'Jordan'),
(153, 'Kazakhstan'),
(154, 'Kuwait'),
(155, 'Latvia'),
(156, 'Libya'),
(157, 'Lithuania'),
(158, 'Luxembourg'),
(159, 'Macedonia'),
(160, 'Maldivis'),
(161, 'Malta'),
(162, 'Marocco'),
(163, 'Mexico'),
(164, 'Moldova'),
(165, 'Monaco'),
(166, 'Netherlands'),
(167, 'New Zeawand'),
(168, 'Niger'),
(169, 'Nigeria'),
(170, 'Northern Ireland'),
(171, 'Norway'),
(172, 'Pakistan'),
(173, 'Panama'),
(174, 'Paraguay'),
(175, 'Philippines'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Qatar'),
(179, 'Romania'),
(180, 'Russia'),
(181, 'Saudi Arabia'),
(182, 'Scotland'),
(183, 'Serbia'),
(184, 'Seychelles'),
(185, 'Slovenia'),
(186, 'Slovkia'),
(187, 'South Africa'),
(188, 'South Korea'),
(189, 'Spain'),
(190, 'Sweden'),
(191, 'Switzeland'),
(192, 'Syria'),
(193, 'Thailand'),
(194, 'Turkey'),
(195, 'Ukraine'),
(196, 'United Arab Emirates'),
(197, 'United Kingdom'),
(198, 'United States'),
(199, 'Uruguay'),
(200, 'Uzbekistan'),
(201, 'Venezuela'),
(202, 'Wales'),
(203, 'Afganistan'),
(204, 'Albania'),
(205, 'Algeria'),
(206, 'Andora'),
(207, 'Argentian'),
(208, 'Armenia'),
(209, 'Australia'),
(210, 'Austria'),
(211, 'Azerbaijan'),
(212, 'Bahams'),
(213, 'Belarus'),
(214, 'Belgium'),
(215, 'Bosna and Herzegovian'),
(216, 'Botswana'),
(217, 'Brazil'),
(218, 'Bulgaira'),
(219, 'Canada'),
(220, 'Cape Verde'),
(221, 'Chech Republic'),
(222, 'Chile'),
(223, 'China'),
(224, 'Colombia'),
(225, 'Croatia'),
(226, 'Cuba'),
(227, 'Cyprusv'),
(228, 'Denmark'),
(229, 'Dominican Republic'),
(230, 'Ecuador'),
(231, 'Egypt'),
(232, 'England'),
(233, 'Estonia'),
(234, 'Ethiopia'),
(235, 'Finaldn'),
(236, 'France'),
(237, 'Georiga'),
(238, 'Germany'),
(239, 'Ghana'),
(240, 'Greece'),
(241, 'Greenland'),
(242, 'Hungary'),
(243, 'Iceland'),
(244, 'India'),
(245, 'Indonesia'),
(246, 'Iran'),
(247, 'Iraq'),
(248, 'Ireland'),
(249, 'Israel'),
(250, 'Italy'),
(251, 'Jamaica'),
(252, 'Japan'),
(253, 'Jordan'),
(254, 'Kazakhstan'),
(255, 'Kuwait'),
(256, 'Latvia'),
(257, 'Libya'),
(258, 'Lithuania'),
(259, 'Luxembourg'),
(260, 'Macedonia'),
(261, 'Maldivis'),
(262, 'Malta'),
(263, 'Marocco'),
(264, 'Mexico'),
(265, 'Moldova'),
(266, 'Monaco'),
(267, 'Netherlands'),
(268, 'New Zeawand'),
(269, 'Niger'),
(270, 'Nigeria'),
(271, 'Northern Ireland'),
(272, 'Norway'),
(273, 'Pakistan'),
(274, 'Panama'),
(275, 'Paraguay'),
(276, 'Philippines'),
(277, 'Poland'),
(278, 'Portugal'),
(279, 'Qatar'),
(280, 'Romania'),
(281, 'Russia'),
(282, 'Saudi Arabia'),
(283, 'Scotland'),
(284, 'Serbia'),
(285, 'Seychelles'),
(286, 'Slovenia'),
(287, 'Slovkia'),
(288, 'South Africa'),
(289, 'South Korea'),
(290, 'Spain'),
(291, 'Sweden'),
(292, 'Switzeland'),
(293, 'Syria'),
(294, 'Thailand'),
(295, 'Turkey'),
(296, 'Ukraine'),
(297, 'United Arab Emirates'),
(298, 'United Kingdom'),
(299, 'United States'),
(300, 'Uruguay'),
(301, 'Uzbekistan'),
(302, 'Venezuela'),
(303, 'Wales');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discussion_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `d_text` varchar(500) NOT NULL,
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
-- Table structure for table `liked_videos`
--

CREATE TABLE `liked_videos` (
  `user_id` int(10) NOT NULL,
  `liked_videos_video_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `music_genre`
--

CREATE TABLE `music_genre` (
  `music_genre_id` int(2) NOT NULL,
  `music_genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music_genre`
--

INSERT INTO `music_genre` (`music_genre_id`, `music_genre`) VALUES
(1, 'Asian Pop (J-Pop, K-pop)'),
(2, 'Blues'),
(3, 'Children’s Music'),
(4, 'Classical Music'),
(5, 'Country Music'),
(6, 'Dance Music'),
(7, 'European Music (Folk/Pop)'),
(8, 'Hip Hop/Rap'),
(9, 'Indie Pop'),
(10, 'Inspirational (incl. Gospel)'),
(11, 'Jazz'),
(12, 'Latin Music'),
(13, 'New Age'),
(14, 'Opera'),
(15, 'Pop (Popular music)'),
(16, 'R&B/Soul'),
(17, 'Reggae'),
(18, 'Rock'),
(19, 'Singer/Songw'),
(20, 'Singer/Songwriter (inc. Folk)'),
(21, 'Soundtrack'),
(22, 'Vocal'),
(23, 'World Music/Beats');

-- --------------------------------------------------------

--
-- Table structure for table `play_lists`
--

CREATE TABLE `play_lists` (
  `play_list_id` int(10) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `p_logo_path` varchar(150) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `u_email` varchar(40) NOT NULL,
  `u_password` varchar(40) NOT NULL,
  `country_id` int(10) NOT NULL,
  `join_date` date NOT NULL,
  `subscribers` int(20) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `pic_path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(20) NOT NULL,
  `v_title` varchar(100) NOT NULL,
  `v_path` varchar(100) NOT NULL,
  `v_poster_path` varchar(100) DEFAULT NULL,
  `v_date` date NOT NULL,
  `v_text` varchar(500) DEFAULT NULL,
  `v_like` int(250) DEFAULT NULL,
  `v_dislike` int(250) DEFAULT NULL,
  `v_views` int(250) DEFAULT NULL,
  `category_id` int(2) NOT NULL,
  `music_genre_id` int(2) DEFAULT NULL,
  `is_privacy` tinyint(1) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `watches_later`
--

CREATE TABLE `watches_later` (
  `user_id` int(10) NOT NULL,
  `watches_late_video_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD KEY `idx_category` (`category_name`);

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

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
-- Indexes for table `liked_videos`
--
ALTER TABLE `liked_videos`
  ADD KEY `liked_videos_video_id` (`liked_videos_video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `music_genre`
--
ALTER TABLE `music_genre`
  ADD PRIMARY KEY (`music_genre_id`),
  ADD KEY `idx_genre` (`music_genre`);

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
  ADD KEY `country_id` (`country_id`),
  ADD KEY `idx_email` (`u_email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD UNIQUE KEY `v_title` (`v_title`),
  ADD UNIQUE KEY `v_path` (`v_path`),
  ADD UNIQUE KEY `v_poster_path` (`v_poster_path`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `music_genre_id` (`music_genre_id`),
  ADD KEY `idx_v_titel` (`v_title`);

--
-- Indexes for table `video_plist`
--
ALTER TABLE `video_plist`
  ADD KEY `video_id` (`video_id`),
  ADD KEY `play_list_id` (`play_list_id`);

--
-- Indexes for table `watches_later`
--
ALTER TABLE `watches_later`
  ADD KEY `watches_late_video_id` (`watches_late_video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `coment_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discussion_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `music_genre`
--
ALTER TABLE `music_genre`
  MODIFY `music_genre_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
-- Constraints for table `liked_videos`
--
ALTER TABLE `liked_videos`
  ADD CONSTRAINT `liked_videos_ibfk_1` FOREIGN KEY (`liked_videos_video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `liked_videos_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `play_lists`
--
ALTER TABLE `play_lists`
  ADD CONSTRAINT `play_lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `videos_ibfk_3` FOREIGN KEY (`music_genre_id`) REFERENCES `music_genre` (`music_genre_id`);

--
-- Constraints for table `video_plist`
--
ALTER TABLE `video_plist`
  ADD CONSTRAINT `video_plist_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `video_plist_ibfk_2` FOREIGN KEY (`play_list_id`) REFERENCES `play_lists` (`play_list_id`);

--
-- Constraints for table `watches_later`
--
ALTER TABLE `watches_later`
  ADD CONSTRAINT `watches_later_ibfk_1` FOREIGN KEY (`watches_late_video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `watches_later_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
