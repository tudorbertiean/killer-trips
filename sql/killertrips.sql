-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 05:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(30, 'sila.jpg', 'La Sila', 'Natural, mountainous area ', 52, '2018-04-03 20:32:19');

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
(46, 'Cluj', 'City in Transylvania Romania.', 'Romania', '207660.jpg', '2018-04-02 22:21:15'),
(47, 'Banff', 'Resort town in the Rocky Mountains of Alberta', 'Canada', 'banff.jpg', '2018-04-03 17:21:52'),
(49, 'Toronto', 'Capital of Ontario', 'Canada', 'toronto.jpg', '2018-04-03 19:47:35'),
(50, 'Miami', 'City in Florida. Tropical weather', 'USA', 'miami.jpg', '2018-04-03 20:01:45'),
(51, 'Sydney', ' State capital of New South Wales and the most populous city in Australia', 'Australia', 'sydney.jpg', '2018-04-03 20:19:29'),
(52, 'Cosenza', 'City in mountains of Calabria', 'Italy', 'cosenza.jpg', '2018-04-03 20:32:19');

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
(13, '2018-04-03 19:25:22', 16, 'test', 46),
(14, '2018-04-03 19:53:11', 16, 'test', 49),
(15, '2018-04-03 20:05:08', 16, '???', 50),
(16, '2018-04-03 20:05:30', 16, 'Hurricanes arent even tough. Wind aint hurting me', 50),
(17, '2018-04-03 20:43:43', 16, 'Very nice place. Nduja is great', 52);

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
(25, 46, '2018-04-02 22:21:15', 'My Nonna was attacked by a hoard of gypsies getting off the train last week. Very scary', 'Gypsies'),
(26, 46, '2018-04-02 22:21:15', 'The wolves have returned to our village this winter. The first time in 5 years, we had become complacent, forgetting their might and persistence. Many have perished. Many more still will.', 'Wolves'),
(27, 47, '2018-04-03 17:21:52', 'Being buried alive in snow is very scary', 'Avalanches'),
(28, 47, '2018-04-03 17:34:19', 'There are many people skiing in banff and many trees. A recipe for disaster', 'Skiing into a Tree'),
(29, 49, '2018-04-03 19:47:35', 'Have rabies, are not afraid of humans', 'Raccoons'),
(30, 50, '2018-04-03 20:01:45', 'Literal dinosaurs. Eat everything', 'Alligators'),
(31, 50, '2018-04-03 20:01:45', 'Destroy stuff. ', 'Hurricanes'),
(32, 51, '2018-04-03 20:19:29', 'Tiny jellyfish that sting swimmers', 'Box Jellyfish'),
(33, 52, '2018-04-03 20:32:19', 'Wolves are the symbol of the La Sila Park', 'Wolves');

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
(16, 'babaganoush', '8434d496f6da2e2d3fe2968691b22d87', 'admin');

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
(66, 46, 16, 1);

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
  MODIFY `attractionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `killinfo`
--
ALTER TABLE `killinfo`
  MODIFY `killid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
