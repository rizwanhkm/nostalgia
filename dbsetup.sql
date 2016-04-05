-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2016 at 06:27 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nostalgia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `settings` varchar(45) NOT NULL,
  `value` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`settings`, `value`) VALUES
('password', 'Nostalgia@2016'),
('username', 'Nostalgia'),
('voting', '0');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `no` varchar(10) NOT NULL,
  `Mr.Handsome` varchar(45) DEFAULT NULL,
  `Ms.Beautiful` varchar(45) DEFAULT NULL,
  `Mr.Popular` varchar(45) DEFAULT NULL,
  `Ms.Popular` varchar(45) DEFAULT NULL,
  `Mr.Flirt` varchar(45) DEFAULT NULL,
  `Ms.Flirt` varchar(45) DEFAULT NULL,
  `Mr.Casanova` varchar(45) DEFAULT NULL,
  `Ms.Trendy` varchar(45) DEFAULT NULL,
  `Mr.Kanjoos` varchar(45) DEFAULT NULL,
  `Ms.Kanjoos` varchar(45) DEFAULT NULL,
  `Mr.Atti` varchar(45) DEFAULT NULL,
  `Ms.Atti` varchar(45) DEFAULT NULL,
  `Mr.Sportsperson` varchar(45) DEFAULT NULL,
  `Ms.Sportsperson` varchar(45) DEFAULT NULL,
  `Mr.Fundoo` varchar(45) DEFAULT NULL,
  `Ms.Fundoo` varchar(45) DEFAULT NULL,
  `Mr.Chaat` varchar(45) DEFAULT NULL,
  `Ms.Chaat` varchar(45) DEFAULT NULL,
  `Mr.Magicmoments` varchar(45) DEFAULT NULL,
  `Ms.Magicmoments` varchar(45) DEFAULT NULL,
  `Silencer` varchar(45) DEFAULT NULL,
  `Good Samaritan` varchar(45) DEFAULT NULL,
  `Jack of All trades` varchar(45) DEFAULT NULL,
  `Workaholic` varchar(45) DEFAULT NULL,
  `GPL` varchar(45) DEFAULT NULL,
  `Lost Puppy` varchar(45) DEFAULT NULL,
  `The Foodie` varchar(45) DEFAULT NULL,
  `Night Watchman` varchar(45) DEFAULT NULL,
  `Stalker` varchar(45) DEFAULT NULL,
  `Transformer` varchar(45) DEFAULT NULL,
  `Complaint Box` varchar(45) DEFAULT NULL,
  `Just Friends` varchar(45) DEFAULT NULL,
  `Best Couple` varchar(45) DEFAULT NULL,
  `Section 377` varchar(45) DEFAULT NULL,
  `101% Attendence` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominations`
--

CREATE TABLE `nominations` (
  `rollno` varchar(10) NOT NULL,
  `Mr.Handsome` varchar(45) DEFAULT NULL,
  `Ms.Beautiful` varchar(45) DEFAULT NULL,
  `Mr.Popular` varchar(45) DEFAULT NULL,
  `Ms.Popular` varchar(45) DEFAULT NULL,
  `Mr.Flirt` varchar(45) DEFAULT NULL,
  `Ms.Flirt` varchar(45) DEFAULT NULL,
  `Mr.Casanova` varchar(45) DEFAULT NULL,
  `Ms.Trendy` varchar(45) DEFAULT NULL,
  `Mr.Kanjoos` varchar(45) DEFAULT NULL,
  `Ms.Kanjoos` varchar(45) DEFAULT NULL,
  `Mr.Atti` varchar(45) DEFAULT NULL,
  `Ms.Atti` varchar(45) DEFAULT NULL,
  `Mr.Sportsperson` varchar(45) DEFAULT NULL,
  `Ms.Sportsperson` varchar(45) DEFAULT NULL,
  `Mr.Fundoo` varchar(45) DEFAULT NULL,
  `Ms.Fundoo` varchar(45) DEFAULT NULL,
  `Mr.Chaat` varchar(45) DEFAULT NULL,
  `Ms.Chaat` varchar(45) DEFAULT NULL,
  `Mr.Magicmoments` varchar(45) DEFAULT NULL,
  `Ms.Magicmoments` varchar(45) DEFAULT NULL,
  `Silencer` varchar(45) DEFAULT NULL,
  `Good Samaritan` varchar(45) DEFAULT NULL,
  `Jack of All trades` varchar(45) DEFAULT NULL,
  `Workaholic` varchar(45) DEFAULT NULL,
  `GPL` varchar(45) DEFAULT NULL,
  `Lost Puppy` varchar(45) DEFAULT NULL,
  `The Foodie` varchar(45) DEFAULT NULL,
  `Night Watchman` varchar(45) DEFAULT NULL,
  `Stalker` varchar(45) DEFAULT NULL,
  `Transformer` varchar(45) DEFAULT NULL,
  `Complaint Box` varchar(45) DEFAULT NULL,
  `Just Friends_1` varchar(45) DEFAULT NULL,
  `Just Friends_2` varchar(45) DEFAULT NULL,
  `Best Couple_1` varchar(45) DEFAULT NULL,
  `Best Couple_2` varchar(45) DEFAULT NULL,
  `Section 377_1` varchar(45) DEFAULT NULL,
  `Section 377_2` varchar(45) DEFAULT NULL,
  `101% Attendence` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rollnodetails`
--

CREATE TABLE `rollnodetails` (
  `rollNo` varchar(50) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `rollno` varchar(10) NOT NULL,
  `Mr.Handsome` varchar(45) DEFAULT NULL,
  `Ms.Beautiful` varchar(45) DEFAULT NULL,
  `Mr.Popular` varchar(45) DEFAULT NULL,
  `Ms.Popular` varchar(45) DEFAULT NULL,
  `Mr.Flirt` varchar(45) DEFAULT NULL,
  `Ms.Flirt` varchar(45) DEFAULT NULL,
  `Mr.Casanova` varchar(45) DEFAULT NULL,
  `Ms.Trendy` varchar(45) DEFAULT NULL,
  `Mr.Kanjoos` varchar(45) DEFAULT NULL,
  `Ms.Kanjoos` varchar(45) DEFAULT NULL,
  `Mr.Atti` varchar(45) DEFAULT NULL,
  `Ms.Atti` varchar(45) DEFAULT NULL,
  `Mr.Sportsperson` varchar(45) DEFAULT NULL,
  `Ms.Sportsperson` varchar(45) DEFAULT NULL,
  `Mr.Fundoo` varchar(45) DEFAULT NULL,
  `Ms.Fundoo` varchar(45) DEFAULT NULL,
  `Mr.Chaat` varchar(45) DEFAULT NULL,
  `Ms.Chaat` varchar(45) DEFAULT NULL,
  `Mr.Magicmoments` varchar(45) DEFAULT NULL,
  `Ms.Magicmoments` varchar(45) DEFAULT NULL,
  `Silencer` varchar(45) DEFAULT NULL,
  `Good Samaritan` varchar(45) DEFAULT NULL,
  `Jack of All trades` varchar(45) DEFAULT NULL,
  `Workaholic` varchar(45) DEFAULT NULL,
  `GPL` varchar(45) DEFAULT NULL,
  `Lost Puppy` varchar(45) DEFAULT NULL,
  `The Foodie` varchar(45) DEFAULT NULL,
  `Night Watchman` varchar(45) DEFAULT NULL,
  `Stalker` varchar(45) DEFAULT NULL,
  `Transformer` varchar(45) DEFAULT NULL,
  `Complaint Box` varchar(45) DEFAULT NULL,
  `Just Friends` varchar(45) DEFAULT NULL,
  `Best Couple` varchar(45) DEFAULT NULL,
  `Section 377` varchar(45) DEFAULT NULL,
  `101% Attendence` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting`
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`settings`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `nominations`
--
ALTER TABLE `nominations`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `rollnodetails`
--
ALTER TABLE `rollnodetails`
  ADD PRIMARY KEY (`rollNo`),
  ADD UNIQUE KEY `rollNo_UNIQUE` (`rollNo`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`rollno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
