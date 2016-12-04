-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 02:05 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smashdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attended`
--

CREATE TABLE `attended` (
  `player` char(32) NOT NULL,
  `name` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competed_against`
--

CREATE TABLE `competed_against` (
  `player_one` char(16) NOT NULL,
  `player_two` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `happened_at`
--

CREATE TABLE `happened_at` (
  `name` char(32) NOT NULL,
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `is_from`
--

CREATE TABLE `is_from` (
  `player` char(32) NOT NULL,
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `city` char(16) NOT NULL,
  `state` char(16) NOT NULL,
  `region` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playedduring`
--

CREATE TABLE `playedduring` (
  `player` char(32) NOT NULL,
  `season_name` enum('fall','spring','summer') NOT NULL,
  `season_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `name` enum('fall','spring','summer') NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `name` char(32) NOT NULL,
  `num_of_players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attended`
--
ALTER TABLE `attended`
  ADD PRIMARY KEY (`player`,`name`);

--
-- Indexes for table `competed_against`
--
ALTER TABLE `competed_against`
  ADD PRIMARY KEY (`player_one`,`player_two`);

--
-- Indexes for table `happened_at`
--
ALTER TABLE `happened_at`
  ADD PRIMARY KEY (`name`,`city`,`state`);

--
-- Indexes for table `hosted_tournament_in`
--
ALTER TABLE `hosted_tournament_in`
  ADD PRIMARY KEY (`season_name`,`season_year`,`city`,`state`);

--
-- Indexes for table `is_from`
--
ALTER TABLE `is_from`
  ADD PRIMARY KEY (`player`,`city`,`state`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`city`,`state`);

--
-- Indexes for table `playedduring`
--
ALTER TABLE `playedduring`
  ADD PRIMARY KEY (`player`,`season_name`,`season_year`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
