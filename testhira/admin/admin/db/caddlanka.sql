-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2017 at 02:37 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caddlanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `criteria` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `empid`, `name`, `user_id`, `password`, `status`, `criteria`) VALUES
(1, '', 'Admin', 'admin', 'a38ea78c26cccbe29675544a1dd58820', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

DROP TABLE IF EXISTS `career`;
CREATE TABLE IF NOT EXISTS `career` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_no` varchar(50) NOT NULL,
  `fulname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `residence` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `coursename` text NOT NULL,
  `interested` varchar(50) NOT NULL,
  `locations` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `resume` varchar(250) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `career`
--


-- --------------------------------------------------------

--
-- Table structure for table `how_to_join`
--

DROP TABLE IF EXISTS `how_to_join`;
CREATE TABLE IF NOT EXISTS `how_to_join` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(150) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `national_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `institute_name` varchar(50) NOT NULL,
  `institute_address` text NOT NULL,
  `institute_phone` varchar(50) NOT NULL,
  `institute_mobile` varchar(50) NOT NULL,
  `know_about` varchar(250) NOT NULL,
  `others` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `how_to_join`
--


-- --------------------------------------------------------

--
-- Table structure for table `quick_enquiry`
--

DROP TABLE IF EXISTS `quick_enquiry`;
CREATE TABLE IF NOT EXISTS `quick_enquiry` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `course_intrested` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quick_enquiry`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
