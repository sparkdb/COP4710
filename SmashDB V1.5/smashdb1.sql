-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 08:22 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smashdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attended`
--

CREATE TABLE `attended` (
  `player` char(32) NOT NULL,
  `name` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attended`
--

INSERT INTO `attended` (`player`, `name`) VALUES
('Armada', 'Coffee Boys 10');

-- --------------------------------------------------------

--
-- Table structure for table `competed_against`
--

CREATE TABLE `competed_against` (
  `player_one` char(16) NOT NULL,
  `player_two` char(16) NOT NULL,
  `player_one_victories` int(11) NOT NULL,
  `player_two_victories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competed_against`
--

INSERT INTO `competed_against` (`player_one`, `player_two`, `player_one_victories`, `player_two_victories`) VALUES
('Armada', 'M2K', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `happened_at`
--

CREATE TABLE `happened_at` (
  `name` char(32) NOT NULL,
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `happened_at`
--

INSERT INTO `happened_at` (`name`, `city`, `state`) VALUES
('Coffee Boys 10', 'Tallahassee', 'Florida');

-- --------------------------------------------------------

--
-- Table structure for table `hosted_tournament_in`
--

CREATE TABLE `hosted_tournament_in` (
  `season_name` enum('fall','spring','summer') NOT NULL,
  `season_year` int(11) NOT NULL,
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hosted_tournament_in`
--

INSERT INTO `hosted_tournament_in` (`season_name`, `season_year`, `city`, `state`) VALUES
('fall', 2016, 'Tallahassee', 'Florida');

-- --------------------------------------------------------

--
-- Table structure for table `is_from`
--

CREATE TABLE `is_from` (
  `player` char(32) NOT NULL,
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_from`
--

INSERT INTO `is_from` (`player`, `city`, `state`) VALUES
('Armada', 'Tallahassee', 'Florida');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL,
  `region` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`city`, `state`, `region`) VALUES
('Tallahassee', 'Florida', 'North Florida');

-- --------------------------------------------------------

--
-- Table structure for table `playedduring`
--

CREATE TABLE `playedduring` (
  `player` char(32) NOT NULL,
  `season_name` enum('fall','spring','summer') NOT NULL,
  `season_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playedduring`
--

INSERT INTO `playedduring` (`player`, `season_name`, `season_year`) VALUES
('Armada', 'fall', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `name` char(16) NOT NULL,
  `wins` int(11) NOT NULL,
  `losses` int(11) NOT NULL,
  `win_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`name`, `wins`, `losses`, `win_rate`) VALUES
('Armada', 86, 4, 0.6),
('M2K', 1006, 25, 7);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `name` enum('fall','spring','summer') NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`name`, `year`) VALUES
('fall', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `name` char(32) NOT NULL,
  `num_of_players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`name`, `num_of_players`) VALUES
('Coffee Boys 10', 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attended`
--
ALTER TABLE `attended`
  ADD PRIMARY KEY (`player`,`name`),
  ADD KEY `player` (`player`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `competed_against`
--
ALTER TABLE `competed_against`
  ADD PRIMARY KEY (`player_one`,`player_two`),
  ADD KEY `player_one` (`player_one`,`player_two`),
  ADD KEY `player two competing constraint` (`player_two`);

--
-- Indexes for table `happened_at`
--
ALTER TABLE `happened_at`
  ADD PRIMARY KEY (`name`,`city`,`state`),
  ADD KEY `name` (`name`,`city`,`state`),
  ADD KEY `city state tournament constraint` (`city`,`state`);

--
-- Indexes for table `hosted_tournament_in`
--
ALTER TABLE `hosted_tournament_in`
  ADD PRIMARY KEY (`season_name`,`season_year`,`city`,`state`),
  ADD KEY `season_name` (`season_name`,`season_year`,`city`,`state`),
  ADD KEY `tournament location constraint` (`city`,`state`);

--
-- Indexes for table `is_from`
--
ALTER TABLE `is_from`
  ADD PRIMARY KEY (`player`,`city`,`state`),
  ADD KEY `player` (`player`,`city`,`state`),
  ADD KEY `player location constraint` (`city`,`state`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`city`,`state`);

--
-- Indexes for table `playedduring`
--
ALTER TABLE `playedduring`
  ADD PRIMARY KEY (`player`,`season_name`,`season_year`),
  ADD KEY `player` (`player`,`season_name`,`season_year`),
  ADD KEY `season player played constraint` (`season_name`,`season_year`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`name`,`year`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attended`
--
ALTER TABLE `attended`
  ADD CONSTRAINT `at tournament constraint` FOREIGN KEY (`name`) REFERENCES `tournaments` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player attended tournament constraint` FOREIGN KEY (`player`) REFERENCES `player` (`name`) ON UPDATE CASCADE;

--
-- Constraints for table `competed_against`
--
ALTER TABLE `competed_against`
  ADD CONSTRAINT `player one competing constraint` FOREIGN KEY (`player_one`) REFERENCES `player` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `player two competing constraint` FOREIGN KEY (`player_two`) REFERENCES `player` (`name`) ON UPDATE CASCADE;

--
-- Constraints for table `happened_at`
--
ALTER TABLE `happened_at`
  ADD CONSTRAINT `city state tournament constraint` FOREIGN KEY (`city`,`state`) REFERENCES `location` (`city`, `state`),
  ADD CONSTRAINT `tournament name constraint` FOREIGN KEY (`name`) REFERENCES `tournaments` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hosted_tournament_in`
--
ALTER TABLE `hosted_tournament_in`
  ADD CONSTRAINT `tournament location constraint` FOREIGN KEY (`city`,`state`) REFERENCES `location` (`city`, `state`),
  ADD CONSTRAINT `tournament season constraint` FOREIGN KEY (`season_name`,`season_year`) REFERENCES `season` (`name`, `year`);

--
-- Constraints for table `is_from`
--
ALTER TABLE `is_from`
  ADD CONSTRAINT `player from constraint` FOREIGN KEY (`player`) REFERENCES `player` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `player location constraint` FOREIGN KEY (`city`,`state`) REFERENCES `location` (`city`, `state`);

--
-- Constraints for table `playedduring`
--
ALTER TABLE `playedduring`
  ADD CONSTRAINT `player season constraint` FOREIGN KEY (`player`) REFERENCES `player` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `season player played constraint` FOREIGN KEY (`season_name`,`season_year`) REFERENCES `season` (`name`, `year`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
