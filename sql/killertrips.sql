-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2018 at 03:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `killertrips`
--

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `attractionid` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cityid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`attractionid`, `image`, `name`, `description`, `cityid`, `date`) VALUES
(23, 'michael.jpg', 'St. Michael\'s Church', 'Very Pretty Church. No Gypsies Here. Thank God', 46, '2018-04-02 22:21:15'),
(24, 'salt.jpg', 'The Salt Mines', 'Salina Turda. Salt Mine converted to an amusement park', 46, '2018-04-02 22:21:15'),
(25, 'bnp.jpg', 'Banff National Park', 'Oldest national park in Canada', 47, '2018-04-03 17:21:52'),
(27, 'skydome.jpg', 'Sky Dome', 'Baseball is played here', 49, '2018-04-03 19:47:35'),
(28, 'everglades.jpg', 'Everglades National Park', 'Large swamp wetland in Southern Florida', 50, '2018-04-03 20:01:45'),
(29, 'opera.jpg', 'Sydney Opera House', '', 51, '2018-04-03 20:19:29'),
(30, 'sila.jpg', 'La Sila', 'Natural, mountainous area ', 52, '2018-04-03 20:32:19'),
(31, 'bondi.jpg', 'Bondi Beach', 'Popular beach in Sydney', 51, '2018-04-04 15:43:07'),
(32, 'seaquarium.jpg', 'Miami Seaquarium', 'Home of many sea creatures. Such as Orcas', 50, '2018-04-04 15:44:10'),
(33, 'abbazia.jpg', 'Abbazia Florense', 'Abbey dedicated to Joachim of Fiore. Built in 12th Century', 52, '2018-04-04 16:04:29'),
(41, 'tokyo-disneyland.jpg', '1', '1', 58, '2018-04-04 18:01:11'),
(42, 'tsukijifishmarket.jpg', '2', '2', 58, '2018-04-04 18:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityid` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `country` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityid`, `city`, `description`, `country`, `image`, `date`) VALUES
(46, 'Cluj', 'Cluj-Napoca, commonly known as Cluj, is the fourth most populous city in Romania, and the seat of Cluj County in the northwestern part of the country. Geographically, it is roughly equidistant from Bucharest (324 kilometres (201 miles)), Budapest (351 km (218 mi)) and Belgrade (322 km (200 mi)). Located in the Some?ul Mic River valley, the city is considered the unofficial capital to the historical province of Transylvania. From 1790 to 1848 and from 1861 to 1867, it was the official capital of the Grand Principality of Transylvania.', 'Romania', '207660.jpg', '2018-04-02 22:21:15'),
(47, 'Banff', 'The Town of Banff is located inside Banff National Park, Canada\'s first and the world\'s third national park, established in 1885. The park itself is 6,641 square kilometres (2,564 square miles); 96 percent of the park is wilderness. ... Banff National National Park was declared a UNESCO World Heritage Site in 1984.', 'Canada', 'banff.jpg', '2018-04-03 17:21:52'),
(49, 'Toronto', 'Toronto, the capital of the province of Ontario, is a major Canadian city along Lake Ontarios northwestern shore. It\'s a dynamic metropolis with a core of soaring skyscrapers, all dwarfed by the iconic, free-standing CN Tower. Toronto also has many green spaces, from the orderly oval of Queen\'s Park to 400-acre High Park and its trails, sports facilities and zoo.', 'Canada', 'toronto.jpg', '2018-04-03 19:47:35'),
(50, 'Miami', 'Miami is an international city at Florida\'s southeastern tip. Its Cuban influence is reflected in the cafes and cigar shops that line Calle Ocho in Little Havana. On barrier islands across the turquoise waters of Biscayne Bay is Miami Beach, home to South Beach. This glamorous neighborhood is famed for its colorful art deco buildings, white sand, surfside hotels and trendsetting nightclubs.', 'USA', 'miami.jpg', '2018-04-03 20:01:45'),
(51, 'Sydney', 'Sydney, capital of New South Wales and one of Australia\'s largest cities, is best known for its harbourfront Sydney Opera House, with a distinctive sail-like design. Massive Darling Harbour and the smaller Circular Quay port are hubs of waterside life, with the arched Harbour Bridge and esteemed Royal Botanic Garden nearby. Sydney Tower\'s outdoor platform, the Skywalk, offers 360-degree views of the city and suburbs.', 'Australia', 'sydney.jpg', '2018-04-03 20:19:29'),
(52, 'Cosenza', 'Cosenza is a city in the Calabria region of Southern Italy. The city proper has a population of 71,000; the urban area counts over 268,000 inhabitants. It is the capital of the Province of Cosenza, which has a population of around 735,000. The demonym of Cosenza is cosentino in Italian and Cosentian in English.', 'Italy', 'cosenza.jpg', '2018-04-03 20:32:19'),
(58, 'Tokyo', 'Nice city', 'Japan', 'tokyo.jpg', '2018-04-04 18:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `date`, `userid`, `comment`, `cityid`) VALUES
(12, '2018-04-03 17:12:15', 16, 'Very nice place\r\n', 46),
(15, '2018-04-03 20:05:08', 16, '???', 50),
(16, '2018-04-03 20:05:30', 16, 'Hurricanes arent even tough. Wind aint hurting me', 50),
(17, '2018-04-03 20:43:43', 16, 'Very nice place. Nduja is great', 52),
(18, '2018-04-04 16:12:04', 1, 'Alligators are as big as advertised. Watch out!!!!', 50),
(19, '2018-04-04 16:12:47', 1, 'This place is amazing but the wolves travel in packs', 52),
(20, '2018-04-04 16:15:29', 1, 'I was born here and can confirm that this is a very nice city and country', 46),
(22, '2018-04-04 18:00:03', 1, 'very nice', 52);

-- --------------------------------------------------------

--
-- Table structure for table `killinfo`
--

CREATE TABLE `killinfo` (
  `killid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `killtext` text NOT NULL,
  `killname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `killinfo`
--

INSERT INTO `killinfo` (`killid`, `cityid`, `date`, `killtext`, `killname`) VALUES
(24, 46, '2018-04-02 22:21:15', 'Transylvania is home to the vampire dracula. He may be old now but he still is very scary', 'Vampires'),
(25, 46, '2018-04-02 22:21:15', 'Many evil people roam the streets looking to steal your goods. Be careful by all means.', 'Pick pocketers'),
(26, 46, '2018-04-02 22:21:15', 'The wolves have returned to our village this winter. The first time in 5 years, we had become complacent, forgetting their might and persistence. Many have perished. Many more still will.', 'Wolves'),
(27, 47, '2018-04-03 17:21:52', 'Being buried alive in snow is very scary', 'Avalanches'),
(28, 47, '2018-04-03 17:34:19', 'There are many people skiing in banff and many trees. A recipe for disaster', 'Skiing into a Tree'),
(29, 49, '2018-04-03 19:47:35', 'Have rabies, are not afraid of humans', 'Raccoons'),
(30, 50, '2018-04-03 20:01:45', 'Literal dinosaurs. Eat everything', 'Alligators'),
(31, 50, '2018-04-03 20:01:45', 'Destroy stuff. ', 'Hurricanes'),
(32, 51, '2018-04-03 20:19:29', 'Tiny jellyfish that sting swimmers', 'Box Jellyfish'),
(33, 52, '2018-04-03 20:32:19', 'Wolves are the symbol of the La Sila Park', 'Wolves'),
(34, 52, '2018-04-04 16:14:07', 'Vipera berus, the common European adder or common European viper, is a venomous snake that is extremely widespread and can be found throughout most of Western Europe and as far as East Asia. ', 'European Adder'),
(35, 52, '2018-04-04 16:14:40', 'Very mountainous area leads to a lot of falling rocks.', 'Falling Rocks'),
(40, 58, '2018-04-04 18:01:11', 'watch our for moving plates', 'earthquake'),
(41, 58, '2018-04-04 18:01:11', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `permission` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `permission`) VALUES
(1, 'tudorbertiean', '33d890d33f91d52fc9b405a0dda65336', 'admin'),
(12, 'jackstufs', '33d890d33f91d52fc9b405a0dda65336', 'admin'),
(13, 'tud', '33d890d33f91d52fc9b405a0dda65336', 'admin'),
(14, 'tttt', '33d890d33f91d52fc9b405a0dda65336', 'admin'),
(15, 'tuuuud', '33d890d33f91d52fc9b405a0dda65336', 'admin'),
(16, 'babaganoush', '8434d496f6da2e2d3fe2968691b22d87', 'admin'),
(17, 'tudor11', '33d890d33f91d52fc9b405a0dda65336', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `voteid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`voteid`, `cityid`, `userid`, `score`) VALUES
(4, 46, 1, 1),
(5, 46, 1, 1),
(6, 46, 1, 1),
(7, 46, 1, 1),
(8, 46, 1, 1),
(9, 46, 1, 1),
(10, 46, 1, 1),
(11, 46, 1, 1),
(12, 46, 1, 1),
(13, 46, 1, 1),
(14, 46, 1, 1),
(15, 46, 1, 1),
(16, 46, 1, 1),
(17, 46, 1, 1),
(18, 46, 1, 1),
(19, 46, 1, 1),
(20, 46, 1, 1),
(21, 46, 1, 1),
(22, 46, 1, 1),
(23, 46, 1, 1),
(24, 46, 1, -1),
(25, 46, 1, -1),
(26, 46, 1, -1),
(27, 46, 1, -1),
(28, 46, 1, -1),
(29, 46, 1, -1),
(30, 46, 1, -1),
(31, 46, 1, -1),
(32, 46, 1, -1),
(33, 46, 1, -1),
(34, 46, 1, -1),
(35, 46, 1, -1),
(36, 46, 1, -1),
(37, 46, 1, -1),
(38, 46, 1, -1),
(39, 46, 1, -1),
(40, 46, 1, -1),
(41, 46, 1, -1),
(42, 46, 1, -1),
(43, 46, 1, -1),
(44, 46, 1, -1),
(45, 46, 1, -1),
(46, 46, 1, -1),
(47, 46, 1, -1),
(48, 46, 1, -1),
(49, 46, 1, -1),
(50, 46, 1, -1),
(51, 46, 1, -1),
(52, 46, 1, -1),
(53, 46, 1, -1),
(54, 46, 1, -1),
(55, 46, 1, -1),
(56, 46, 1, -1),
(57, 46, 1, -1),
(58, 46, 1, -1),
(59, 46, 1, -1),
(60, 46, 14, 1),
(64, 46, 13, -1),
(65, 46, 16, 1),
(66, 46, 16, 1),
(67, 52, 1, 1),
(68, 52, 1, 1),
(69, 52, 1, 1),
(70, 52, 1, 1),
(71, 52, 1, 1),
(72, 52, 1, 1),
(73, 52, 1, 1),
(74, 52, 1, 1),
(75, 52, 1, 1),
(76, 52, 1, 1),
(77, 52, 1, 1),
(78, 52, 1, 1),
(79, 52, 1, 1),
(80, 52, 1, 1),
(81, 52, 1, 1),
(82, 52, 1, 1),
(83, 52, 1, 1),
(84, 52, 1, 1),
(85, 52, 1, 1),
(86, 52, 1, 1),
(87, 52, 1, 1),
(88, 52, 1, 1),
(89, 52, 1, 1),
(90, 52, 1, 1),
(91, 52, 1, 1),
(92, 52, 1, 1),
(93, 52, 1, 1),
(94, 52, 1, 1),
(95, 52, 1, 1),
(96, 52, 1, 1),
(97, 52, 1, 1),
(98, 52, 1, 1),
(99, 52, 1, 1),
(100, 52, 1, 1),
(101, 52, 1, 1),
(102, 52, 1, 1),
(103, 52, 1, 1),
(104, 52, 1, 1),
(105, 52, 1, 1),
(106, 52, 1, 1),
(107, 52, 1, 1),
(108, 52, 1, 1),
(109, 52, 1, 1),
(110, 52, 1, 1),
(111, 52, 1, 1),
(112, 52, 1, 1),
(113, 52, 1, 1),
(114, 52, 1, 1),
(115, 52, 1, 1),
(116, 52, 1, 1),
(117, 52, 1, 1),
(118, 52, 1, 1),
(119, 52, 1, 1),
(120, 46, 1, 1),
(121, 46, 1, 1),
(122, 46, 1, 1),
(123, 46, 1, 1),
(124, 46, 1, 1),
(125, 46, 1, 1),
(126, 46, 1, 1),
(127, 46, 1, 1),
(128, 46, 1, 1),
(129, 46, 1, 1),
(130, 46, 1, 1),
(131, 46, 1, 1),
(132, 46, 1, 1),
(133, 46, 1, 1),
(134, 46, 1, 1),
(135, 46, 1, 1),
(136, 46, 1, 1),
(137, 46, 1, 1),
(138, 46, 1, 1),
(139, 46, 1, 1),
(140, 46, 1, 1),
(141, 46, 1, 1),
(142, 51, 1, -1),
(143, 51, 1, -1),
(144, 51, 1, -1),
(145, 51, 1, -1),
(146, 51, 1, -1),
(147, 51, 1, -1),
(148, 51, 1, -1),
(149, 51, 1, -1),
(150, 51, 1, -1),
(151, 51, 1, -1),
(152, 51, 1, -1),
(153, 51, 1, -1),
(154, 51, 1, -1),
(155, 51, 1, -1),
(156, 51, 1, -1),
(157, 47, 1, 1),
(158, 50, 1, 1),
(159, 50, 1, 1),
(160, 50, 1, 1),
(161, 50, 1, 1),
(162, 50, 1, 1),
(163, 50, 1, 1),
(164, 50, 1, 1),
(165, 49, 1, -1),
(166, 49, 1, -1),
(167, 49, 1, -1),
(169, 58, 1, 1),
(170, 58, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`attractionid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `killinfo`
--
ALTER TABLE `killinfo`
  ADD PRIMARY KEY (`killid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`voteid`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `attractionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `killinfo`
--
ALTER TABLE `killinfo`
  MODIFY `killid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attractions`
--
ALTER TABLE `attractions`
  ADD CONSTRAINT `attractions_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`cityid`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `city` FOREIGN KEY (`cityid`) REFERENCES `cities` (`cityid`),
  ADD CONSTRAINT `user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `killinfo`
--
ALTER TABLE `killinfo`
  ADD CONSTRAINT `killinfo_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`cityid`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`cityid`) REFERENCES `cities` (`cityid`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
