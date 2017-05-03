-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 02:37 PM
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
-- Table structure for table `channel_subscribers`
--

CREATE TABLE `channel_subscribers` (
  `channel_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_subscribers`
--

INSERT INTO `channel_subscribers` (`channel_id`, `user_id`) VALUES
(1, 2),
(2, 3),
(1, 3),
(3, 4),
(1, 5),
(2, 5),
(1, 7),
(3, 2),
(2, 1),
(6, 1),
(4, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_views`
--

CREATE TABLE `channel_views` (
  `channel_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_views`
--

INSERT INTO `channel_views` (`channel_id`, `user_id`) VALUES
(4, 2),
(3, 2),
(1, 2),
(6, 2),
(1, 3),
(1, 4),
(1, 8),
(2, 8),
(3, 8),
(1, 5),
(2, 5),
(8, 5),
(7, 5),
(2, 1),
(7, 4),
(5, 4),
(2, 4),
(3, 4),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(20) NOT NULL,
  `video_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `re_comment` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `video_id`, `user_id`, `text`, `date`, `re_comment`) VALUES
(1, 1, 1, 'Super qko video!', '2017-05-02', NULL),
(2, 1, 5, 'Share what you think?', '2017-05-02', NULL),
(3, 1, 5, 'Share what you think?', '2017-05-02', NULL),
(4, 1, 5, 'Share what you think?', '2017-05-02', NULL),
(5, 1, 5, 'Share what you think?', '2017-05-02', NULL);

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
(101, 'Wales');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discussion_id` int(20) NOT NULL,
  `channel_id` int(10) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `user_discussant_id` int(10) NOT NULL,
  `re_discussion` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`discussion_id`, `channel_id`, `text`, `date`, `user_discussant_id`, `re_discussion`) VALUES
(1, 1, 'Share what you think', '2017-05-02', 2, NULL),
(2, 1, 'Share what you think', '2017-05-02', 2, NULL),
(3, 1, 'Share what you think', '2017-05-02', 2, NULL),
(4, 2, 'Share what you think?', '2017-05-02', 4, NULL),
(5, 2, 'Share what you think?', '2017-05-02', 4, NULL),
(6, 2, 'Share what you think?', '2017-05-02', 4, NULL),
(7, 1, 'Share what you think?', '2017-05-02', 4, NULL),
(8, 1, 'Share what you think?', '2017-05-02', 4, NULL),
(9, 1, 'Share what you think?', '2017-05-02', 4, NULL),
(10, 1, 'Share what you think?', '2017-05-02', 2, NULL),
(11, 1, 'Share what you think?', '2017-05-02', 2, NULL),
(12, 4, 'Share what you think?', '2017-05-02', 2, NULL),
(13, 4, 'Share what you think?', '2017-05-02', 2, NULL),
(14, 4, 'Share what you think?', '2017-05-02', 2, NULL),
(15, 4, 'Share what you think?', '2017-05-02', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disliked_videos`
--

CREATE TABLE `disliked_videos` (
  `user_id` int(10) NOT NULL,
  `video_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disliked_videos`
--

INSERT INTO `disliked_videos` (`user_id`, `video_id`) VALUES
(5, 1),
(1, 16),
(1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `user_id` int(10) NOT NULL,
  `video_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`user_id`, `video_id`, `date`) VALUES
(2, 26, '2017-05-02 13:20:19'),
(2, 23, '2017-05-02 13:20:22'),
(2, 19, '2017-05-02 13:20:26'),
(2, 28, '2017-05-02 13:20:28'),
(3, 39, '2017-05-02 13:32:54'),
(3, 38, '2017-05-02 13:32:02'),
(3, 34, '2017-05-02 13:32:07'),
(3, 33, '2017-05-02 13:32:11'),
(3, 32, '2017-05-02 13:32:14'),
(3, 26, '2017-05-02 13:32:46'),
(3, 1, '2017-05-02 13:33:12'),
(3, 28, '2017-05-02 13:32:58'),
(3, 3, '2017-05-02 13:33:14'),
(3, 5, '2017-05-02 13:33:18'),
(3, 9, '2017-05-02 13:33:22'),
(3, 25, '2017-05-02 13:33:25'),
(4, 39, '2017-05-02 13:36:06'),
(4, 29, '2017-05-02 13:39:11'),
(4, 33, '2017-05-02 13:39:15'),
(4, 1, '2017-05-02 13:39:22'),
(4, 25, '2017-05-02 13:39:28'),
(4, 31, '2017-05-02 13:39:32'),
(4, 15, '2017-05-02 13:39:34'),
(4, 9, '2017-05-02 13:39:37'),
(4, 3, '2017-05-02 13:39:40'),
(5, 39, '2017-05-02 13:41:34'),
(5, 26, '2017-05-02 13:41:39'),
(5, 1, '2017-05-02 13:41:50'),
(7, 18, '2017-05-02 13:43:27'),
(7, 39, '2017-05-02 13:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `liked_videos`
--

CREATE TABLE `liked_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `video_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked_videos`
--

INSERT INTO `liked_videos` (`id`, `user_id`, `video_id`) VALUES
(3, 3, 39),
(4, 3, 38),
(5, 3, 34),
(6, 3, 33),
(7, 3, 32),
(8, 3, 26),
(9, 3, 1),
(10, 3, 28),
(11, 3, 3),
(12, 3, 5),
(13, 3, 9),
(14, 3, 25),
(15, 4, 29),
(16, 4, 33),
(17, 4, 1),
(18, 4, 25),
(19, 4, 31),
(20, 4, 15),
(21, 4, 9),
(22, 4, 3),
(23, 5, 39),
(24, 5, 26),
(26, 7, 39);

-- --------------------------------------------------------

--
-- Table structure for table `music_genre`
--

CREATE TABLE `music_genre` (
  `music_genre_id` int(2) NOT NULL,
  `music_genre` varchar(50) NOT NULL
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
  `title` varchar(100) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `country_id` int(10) NOT NULL,
  `join_date` date NOT NULL,
  `subscribers` int(20) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `picture` varchar(150) NOT NULL,
  `banner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `country_id`, `join_date`, `subscribers`, `description`, `picture`, `banner`) VALUES
(1, 'Bichmo', '030c80e7ce5aabcb29ef3df2d216ba4dbeea4eed', '18c4ffa41a30e90fba333bc28a78eab4ba6810fa', 16, '2017-05-02', 4, 'Welcome to my chanel!', '1493728887306bichmo.jpg', '1493728892721banner03.jpg'),
(2, 'Kiro', '9c0106ca13ebcc328da8ad898b2af18401425e6f', '7c222fb2927d828af22f592134e8932480637c0d', 1, '2017-05-02', 3, 'Welcome to my chanel!', '1493731497136kiro.jpg', '1493731503261banner_super_man_sfog.jpg'),
(3, 'Ani', 'fb03c4551611642ea8c5768aa029d9452075f408', '7c222fb2927d828af22f592134e8932480637c0d', 35, '2017-05-02', 2, 'Welcome to my chanel!', '1493731726816user2.jpg', '1493731735344aboutbanner1.jpg'),
(4, 'Geri', '8b36f4941e85eb2b6b7f2ace797c8fb1bf7a7351', '7c222fb2927d828af22f592134e8932480637c0d', 1, '2017-05-02', 1, 'Welcome to my chanel!', '1493732318570user3.jpg', '1493732341176aboutbanner1.jpg'),
(5, 'Bobi', '77231add3943f59c1f7632ed70a1d74338f3c434', '7c222fb2927d828af22f592134e8932480637c0d', 33, '2017-05-02', 0, 'Welcome to my chanel!', '1493732459223user4.jpg', '1493732481453banner03.jpg'),
(6, 'Niki', 'b284772a24f3b22957984459fed34ff1889b2593', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 18, '2017-05-02', 1, 'Welcome to my chanel!', 'default-user.jpg', 'channel-banner.png'),
(7, 'Groro', '199cf277a85615a43694bc2244562713bb219856', '7c222fb2927d828af22f592134e8932480637c0d', 35, '2017-05-02', 0, 'Welcome to my chanel!', '1493732598370Kreacher.jpg', 'channel-banner.png'),
(8, 'Bichmo23', '8f50da0274cbad1d5419e14cca52dd5a10bfa583', '7c222fb2927d828af22f592134e8932480637c0d', 29, '2017-05-02', 0, 'Welcome to my chanel!', '1493738679401user4.jpg', 'channel-banner.png');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `poster_path` varchar(200) NOT NULL,
  `duration` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(500) NOT NULL,
  `category_id` int(2) NOT NULL,
  `music_genre_id` int(2) DEFAULT NULL,
  `is_privacy` tinyint(1) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `title`, `path`, `poster_path`, `duration`, `date`, `text`, `category_id`, `music_genre_id`, `is_privacy`, `user_id`) VALUES
(1, 'Ana Maria Bogomil - Teb Si Pozhelah (Official HD)', 'Ana Maria  Bogomil - Teb Si Pozhelah  (Official HD)1493728922446.mp4', 'AnaMariaBogomil-TebSiPozhelah(OfficialHD)1493728922446.jpg', '0:03:33', '2017-05-02', 'Ana Maria Bogomil - Teb Si Pozhelah (Official HD)', 3, 1, 0, 1),
(2, 'Ariana Grande - Side to side', 'Ariana Grande - Side to side1493729005270.mp4', 'ArianaGrande-Sidetoside1493729005270.jpg', '0:03:57', '2017-05-02', 'Ariana Grande - Side to side', 3, 18, 0, 1),
(3, 'Florian Paetzold - Easy (Official Music Video)', 'Florian Paetzold - Easy (Official Music Video)1493729026857.mp4', 'FlorianPaetzold-Easy(OfficialMusicVideo)1493729026857.jpg', '0:03:42', '2017-05-02', 'Florian Paetzold - Easy (Official Music Video)', 3, 16, 0, 1),
(4, 'Stand By Me Ben E King 1961', 'Stand By Me Ben E King 19611493729048267.mp4', 'StandByMeBenEKing19611493729048267.jpg', '0:02:57', '2017-05-02', 'Stand By Me Ben E King 1961', 3, 11, 1, 1),
(5, 'Michael Buble and Blake Shelton - Home ( Live 2008 ) HD', 'Michael Buble and Blake Shelton - Home  ( Live 2008 ) HD1493729070791.mp4', 'MichaelBubleandBlakeShelton-Home(Live2008)HD1493729070791.jpg', '0:06:09', '2017-05-02', 'Michael Buble and Blake Shelton - Home ( Live 2008 ) HD', 3, 3, 0, 1),
(6, 'Kristina Train - How Long Will I Love You (The Waterboys Cover).jpeg', 'Kristina Train - How Long Will I Love You (The Waterboys Cover).jpeg1493729115800.mp4', 'KristinaTrain-HowLongWillILoveYou(TheWaterboysCover).jpeg1493729115800.jpg', '0:02:12', '2017-05-02', 'Kristina Train - How Long Will I Love You (The Waterboys Cover).jpeg', 3, NULL, 0, 1),
(7, 'Roya - Lie', 'Roya - Lie1493729139905.mp4', 'Roya-Lie1493729139905.jpg', '0:03:36', '2017-05-02', 'Roya - Lie', 3, 19, 0, 1),
(8, 'Disciples - They Dont Know', 'Disciples - They Dont Know1493729154459.mp4', 'Disciples-TheyDontKnow1493729154459.jpg', '0:05:30', '2017-05-02', 'Disciples - They Dont Know', 3, NULL, 1, 1),
(9, 'Fly O Tech - Funk Me Down (Original Mix)', 'Fly O Tech - Funk Me Down (Original Mix)1493729188295.mp4', 'FlyOTech-FunkMeDown(OriginalMix)1493729188295.jpg', '0:06:28', '2017-05-02', 'Fly O Tech - Funk Me Down (Original Mix)', 3, 6, 0, 1),
(10, 'Havana - Vita Bella (Official Video)', 'Havana - Vita Bella (Official Video)1493729207327.mp4', 'Havana-VitaBella(OfficialVideo)1493729207327.jpg', '0:04:12', '2017-05-02', 'Havana - Vita Bella (Official Video)', 3, 6, 1, 1),
(11, 'INNA - Yalla Official Music Video', 'INNA - Yalla  Official Music Video1493729223862.mp4', 'INNA-YallaOfficialMusicVideo1493729223862.jpg', '0:03:16', '2017-05-02', 'INNA - Yalla Official Music Video', 3, 6, 0, 1),
(12, 'Mahmut Orhan - Feel feat. Sena Sener (Official Video)', 'Mahmut Orhan - Feel feat. Sena Sener (Official Video)1493729238037.mp4', 'MahmutOrhan-Feelfeat.SenaSener(OfficialVideo)1493729238037.jpg', '0:03:26', '2017-05-02', 'Mahmut Orhan - Feel feat. Sena Sener (Official Video)', 3, 16, 0, 1),
(13, 'Mark Lower ft. Scarlett Quinn - Bad Boys Cry (Original mix)', 'Mark Lower ft. Scarlett Quinn - Bad Boys Cry (Original mix)1493729256165.mp4', 'MarkLowerft.ScarlettQuinn-BadBoysCry(Originalmix)1493729256165.jpg', '0:05:43', '2017-05-02', 'Mark Lower ft. Scarlett Quinn - Bad Boys Cry (Original mix)', 3, 9, 0, 1),
(14, 'MC YANKOO - Oziljak (feat Muharem Redzepi)', 'MC YANKOO - Oziljak (feat Muharem Redzepi)1493729273288.mp4', 'MCYANKOO-Oziljak(featMuharemRedzepi)1493729273288.jpg', '0:03:39', '2017-05-02', 'MC YANKOO - Oziljak (feat Muharem Redzepi)', 3, 18, 0, 1),
(15, 'Nelly Furtado - Waiting For The Night', 'Nelly Furtado - Waiting For The Night1493729300190.mp4', 'NellyFurtado-WaitingForTheNight1493729300190.jpg', '0:04:31', '2017-05-02', 'Nelly Furtado - Waiting For The Night', 3, 6, 0, 1),
(16, 'Natural Parks in Bulgaria', 'Natural Parks in Bulgaria1493730660012.mp4', 'NaturalParksinBulgaria1493730660012.jpg', '0:04:17', '2017-05-02', 'Natural Parks in Bulgaria', 13, NULL, 0, 1),
(17, 'BULGARIA 4-3 LUXEMBOURG 2018 FIFA World Cup Qualifiers - All Goals', 'BULGARIA 4-3 LUXEMBOURG 2018 FIFA World Cup Qualifiers - All Goals1493730730158.mp4', 'BULGARIA4-3LUXEMBOURG2018FIFAWorldCupQualifiers-AllGoals1493730730158.jpg', '0:06:33', '2017-05-02', 'BULGARIA 4-3 LUXEMBOURG 2018 FIFA World Cup Qualifiers - All Goals', 5, NULL, 0, 1),
(18, 'Funniest and Fails SPORT Compilation', 'Funniest and Fails SPORT Compilation1493730762425.mp4', 'FunniestandFailsSPORTCompilation1493730762425.jpg', '0:04:49', '2017-05-02', 'Funniest and Fails SPORT Compilation', 5, NULL, 0, 1),
(19, 'Top 10 Famous Penalty Kicks Impossible To Forget', 'Top 10 Famous Penalty Kicks  Impossible To Forget1493730814635.mp4', 'Top10FamousPenaltyKicksImpossibleToForget1493730814635.jpg', '0:03:38', '2017-05-02', 'Top 10 Famous Penalty Kicks Impossible To Forget', 5, NULL, 0, 2),
(20, 'Match 18 Switzerland v Senegal - FIFA Beach Soccer World Cup 2017', 'Match 18 Switzerland v Senegal - FIFA Beach Soccer World Cup 20171493730827862.mp4', 'Match18SwitzerlandvSenegal-FIFABeachSoccerWorldCup20171493730827862.jpg', '0:02:11', '2017-05-02', 'Match 18 Switzerland v Senegal - FIFA Beach Soccer World Cup 2017', 5, NULL, 0, 2),
(21, 'GOODKIDS Official Trailer (Comedy) American Pie Like Movie HD', 'GOODKIDS Official Trailer (Comedy) American Pie Like Movie HD1493730839995.mp4', 'GOODKIDSOfficialTrailer(Comedy)AmericanPieLikeMovieHD1493730839995.jpg', '0:03:20', '2017-05-02', 'GOODKIDS Official Trailer (Comedy) American Pie Like Movie HD', 1, NULL, 0, 2),
(22, 'Bruno Mars - Just The Way You Are', 'Bruno Mars - Just The Way You Are OFFICIAL VIDEO14932742331201493730893235.mp4', 'BrunoMars-JustTheWayYouAreOFFICIALVIDEO14932742331201493730893235.jpg', '0:04:01', '2017-05-02', 'Bruno Mars - Just The Way You Are', 3, 15, 0, 2),
(23, 'Deadpool 2 Teaser Trailer 2017 - 2018 Movie Trailer - Official', 'Deadpool 2 Teaser Trailer 2017 - 2018 Movie Trailer - Official14932006742261493730954403.mp4', 'Deadpool2TeaserTrailer2017-2018MovieTrailer-Official14932006742261493730954403.jpg', '0:03:41', '2017-05-02', 'Deadpool 2 Teaser Trailer 2017 - 2018 Movie Trailer - Official', 1, NULL, 0, 2),
(24, 'Duke Dumont - Ocean Drive', 'Duke Dumont - Ocean Drive14931988425331493731038349.mp4', 'DukeDumont-OceanDrive14931988425331493731038349.jpg', '0:03:27', '2017-05-02', 'Duke Dumont - Ocean Drive', 3, 20, 0, 2),
(25, 'Pitbull - Rain Over Me ft. Marc Anthony', 'Pitbull - Rain Over Me ft. Marc Anthony14931994971941493731064688.mp4', 'Pitbull-RainOverMeft.MarcAnthony14931994971941493731064688.jpg', '0:03:53', '2017-05-02', 'Pitbull - Rain Over Me ft. Marc Anthony', 3, 19, 0, 2),
(26, 'Shakira -woka woka', 'Shakira -woka woka14931995468271493731091850.mp4', 'Shakira-wokawoka14931995468271493731091850.jpg', '0:03:30', '2017-05-02', 'Shakira -woka woka', 3, 16, 0, 2),
(27, 'Sia - The Greatest', 'Sia - The Greatest14931996060941493731114576.mp4', 'Sia-TheGreatest14931996060941493731114576.jpg', '0:05:51', '2017-05-02', 'Sia - The Greatest', 3, 17, 0, 2),
(28, 'Talking nuws', 'Talking nuws14932003884741493731138547.mp4', 'Talkingnuws14932003884741493731138547.jpg', '0:00:44', '2017-05-02', 'Talking nuws', 9, NULL, 0, 2),
(29, 'The Best Sports Vines lought', 'The Best Sports Vines lought14932000882331493731302045.mp4', 'TheBestSportsVineslought14932000882331493731302045.jpg', '0:10:37', '2017-05-02', 'The Best Sports Vines lought', 9, NULL, 0, 2),
(30, 'The Best Sports Vines-football1', 'The Best Sports Vines-football14932001227141493731339604.mp4', 'TheBestSportsVines-football14932001227141493731339604.jpg', '0:05:46', '2017-05-02', 'The Best Sports Vines-football1', 5, NULL, 0, 2),
(31, 'The Chainsmokers - Dont Let Me Down ft. Daya', 'The Chainsmokers - Dont Let Me Down ft. Daya14931996408671493731363833.mp4', 'TheChainsmokers-DontLetMeDownft.Daya14931996408671493731363833.jpg', '0:03:37', '2017-05-02', 'The Chainsmokers - Dont Let Me Down ft. Daya', 3, 19, 0, 2),
(32, 'The Mummy Official Trailer 1 (2017) Tom Cruise Sofia Boutella Action Movie HD', 'The Mummy Official Trailer 1 (2017) Tom Cruise Sofia Boutella Action Movie HD14932006535681493731386909.mp4', 'TheMummyOfficialTrailer1(2017)TomCruiseSofiaBoutellaActionMovieHD14932006535681493731386909.jpg', '0:03:03', '2017-05-02', 'The Mummy Official Trailer 1 (2017) Tom Cruise Sofia Boutella Action Movie HD', 1, NULL, 0, 2),
(33, 'TOP 5 BEST Auditions That Will BLOW YOUR MIND', 'TOP 5 BEST Auditions That Will BLOW YOUR MIND14932004109681493731421557.mp4', 'TOP5BESTAuditionsThatWillBLOWYOURMIND14932004109681493731421557.jpg', '0:07:09', '2017-05-02', 'TOP 5 BEST Auditions That Will BLOW YOUR MIND', 9, NULL, 0, 2),
(34, 'Funny Fails Compilation Best Fails of the year', 'Funny Fails Compilation  Best Fails of the year1493731764206.mp4', 'FunnyFailsCompilationBestFailsoftheyear1493731764206.jpg', '0:05:48', '2017-05-02', 'Funny Fails Compilation Best Fails of the year', 10, NULL, 0, 3),
(35, 'Funniest and Fails SPORT Compilation privacy', 'Funniest and Fails SPORT Compilation1493731783652.mp4', 'FunniestandFailsSPORTCompilation1493731783652.jpg', '0:04:49', '2017-05-02', 'Funniest and Fails SPORT Compilation', 5, NULL, 1, 3),
(36, 'Calvin Harris Disciples - How Deep Is Your Love', 'Calvin Harris  Disciples - How Deep Is Your Love1493731810805.mp4', 'CalvinHarrisDisciples-HowDeepIsYourLove1493731810805.jpg', '0:04:20', '2017-05-02', 'Calvin Harris Disciples - How Deep Is Your Love', 5, NULL, 0, 3),
(37, 'Mahmut Orhan - Feel feat. Sena Sener (Official Video) priavcy', 'Mahmut Orhan - Feel feat. Sena Sener (Official Video)1493731837196.mp4', 'MahmutOrhan-Feelfeat.SenaSener(OfficialVideo)1493731837196.jpg', '0:03:26', '2017-05-02', 'Mahmut Orhan - Feel feat. Sena Sener (Official Video)\nDescription', 3, 13, 1, 3),
(38, 'Bulgaroa', 'Bulgaroa1493731872315.mp4', 'Bulgaroa1493731872315.jpg', '0:10:55', '2017-05-02', 'Bulgaroa', 10, NULL, 0, 3),
(39, 'Top 10 Famous Penalty Kicks Impossible To Forgetf', 'Top 10 Famous Penalty Kicks  Impossible To Forget1493731895273.mp4', 'Top10FamousPenaltyKicksImpossibleToForget1493731895273.jpg', '0:03:38', '2017-05-02', 'Top 10 Famous Penalty Kicks Impossible To Forget', 5, NULL, 0, 3),
(40, 'dsfdsfds', 'The Weeknd - Starboy (official) ft. Daft Punk1493738489021.mp4', 'TheWeeknd-Starboy(official)ft.DaftPunk1493738489021.jpg', '0:04:33', '2017-05-02', 'xz xc z', 3, 9, 0, 8);

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
-- Table structure for table `video_views`
--

CREATE TABLE `video_views` (
  `video_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_views`
--

INSERT INTO `video_views` (`video_id`, `user_id`) VALUES
(1, 1),
(15, 1),
(26, 2),
(23, 2),
(19, 2),
(28, 2),
(39, 3),
(38, 3),
(34, 3),
(33, 3),
(32, 3),
(26, 3),
(1, 3),
(28, 3),
(3, 3),
(5, 3),
(9, 3),
(25, 3),
(39, 4),
(29, 4),
(33, 4),
(1, 4),
(25, 4),
(31, 4),
(15, 4),
(9, 4),
(3, 4),
(39, 5),
(26, 5),
(1, 5),
(18, 7),
(39, 7),
(39, 1),
(38, 1),
(36, 1),
(34, 1),
(33, 1),
(32, 1),
(31, 1),
(30, 1),
(29, 1),
(28, 1),
(9, 1),
(5, 1),
(20, 1),
(17, 1),
(16, 1),
(7, 1),
(40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `watches_later`
--

CREATE TABLE `watches_later` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `video_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watches_later`
--

INSERT INTO `watches_later` (`id`, `user_id`, `video_id`) VALUES
(2, 3, 39),
(3, 3, 38),
(4, 7, 18),
(5, 7, 38),
(20, 1, 18);

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
-- Indexes for table `channel_subscribers`
--
ALTER TABLE `channel_subscribers`
  ADD KEY `channel_id` (`channel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `channel_views`
--
ALTER TABLE `channel_views`
  ADD KEY `channel_id` (`channel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `re_comment` (`re_comment`);

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
  ADD KEY `channel_id` (`channel_id`),
  ADD KEY `user_discussant_id` (`user_discussant_id`),
  ADD KEY `re_discussion` (`re_discussion`);

--
-- Indexes for table `disliked_videos`
--
ALTER TABLE `disliked_videos`
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `music_genre`
--
ALTER TABLE `music_genre`
  ADD PRIMARY KEY (`music_genre_id`),
  ADD UNIQUE KEY `music_genre` (`music_genre`),
  ADD KEY `idx_genre` (`music_genre`);

--
-- Indexes for table `play_lists`
--
ALTER TABLE `play_lists`
  ADD PRIMARY KEY (`play_list_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_p_title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_password` (`password`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `path` (`path`),
  ADD UNIQUE KEY `poster_path` (`poster_path`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `music_genre_id` (`music_genre_id`),
  ADD KEY `idx_v_titel` (`title`);

--
-- Indexes for table `video_plist`
--
ALTER TABLE `video_plist`
  ADD KEY `video_id` (`video_id`),
  ADD KEY `play_list_id` (`play_list_id`);

--
-- Indexes for table `video_views`
--
ALTER TABLE `video_views`
  ADD KEY `video_id` (`video_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `watches_later`
--
ALTER TABLE `watches_later`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`),
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discussion_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `liked_videos`
--
ALTER TABLE `liked_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `watches_later`
--
ALTER TABLE `watches_later`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `channel_subscribers`
--
ALTER TABLE `channel_subscribers`
  ADD CONSTRAINT `channel_subscribers_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `channel_subscribers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `channel_views`
--
ALTER TABLE `channel_views`
  ADD CONSTRAINT `channel_views_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `channel_views_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`re_comment`) REFERENCES `comments` (`comment_id`);

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_discussant_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `discussions_ibfk_3` FOREIGN KEY (`re_discussion`) REFERENCES `discussions` (`discussion_id`);

--
-- Constraints for table `disliked_videos`
--
ALTER TABLE `disliked_videos`
  ADD CONSTRAINT `disliked_videos_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `disliked_videos_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
  ADD CONSTRAINT `liked_videos_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
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
-- Constraints for table `video_views`
--
ALTER TABLE `video_views`
  ADD CONSTRAINT `video_views_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `video_views_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `watches_later`
--
ALTER TABLE `watches_later`
  ADD CONSTRAINT `watches_later_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`),
  ADD CONSTRAINT `watches_later_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
