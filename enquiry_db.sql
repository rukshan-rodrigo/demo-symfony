-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2014 at 12:27 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `enquiry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `email`, `sequence`) VALUES
(1, 'Information Technology', 'info.test@example.com', 1),
(3, 'test', 'test@test.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) DEFAULT NULL,
  `enquiry_type_id` int(11) DEFAULT NULL,
  `enquiry_level_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `family_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `file_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enquiry_date` datetime NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `report_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `manager_comments` longtext COLLATE utf8_unicode_ci,
  `is_approved` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9D996984AE80F5DF` (`department_id`),
  KEY `IDX_9D9969846BA44BD2` (`enquiry_type_id`),
  KEY `IDX_9D9969845EC4D266` (`enquiry_level_id`),
  KEY `IDX_9D996984A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `department_id`, `enquiry_type_id`, `enquiry_level_id`, `user_id`, `family_name`, `first_name`, `age`, `file_number`, `gender`, `enquiry_date`, `country`, `city`, `place`, `report_by`, `description`, `manager_comments`, `is_approved`, `created_at`, `modified_at`, `email`) VALUES
(1, 1, 1, 1, 1, 'Anne', 'test', 24, '345', 'Female', '2012-04-04 17:16:00', 'DZ', 'tes', 'ttes', 'test', 'test', 'test', 1, '2014-04-08 11:18:57', '2014-04-08 12:12:42', 'test@example.com'),
(2, 1, 1, 1, 1, 'Family bb', 'First', 23, 'File number', 'Male', '2014-04-15 13:16:00', 'AC', 'City', 'Place', 'Report by', 'Description', 'Manager comments', 0, '2014-04-08 11:20:40', '2014-04-08 11:21:32', ''),
(3, 1, 1, 1, 1, 'FamilyTest', 'firsTest', 45, '345', 'Male', '2015-07-17 00:00:00', 'AX', 'City', 'Place', 'Report by', 'Description', 'Manager', 1, '2014-04-08 12:17:39', '2014-04-08 12:17:39', 'test@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_level`
--

CREATE TABLE IF NOT EXISTS `enquiry_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enquiry_level`
--

INSERT INTO `enquiry_level` (`id`, `name`, `description`, `sequence`) VALUES
(1, 'High Priority', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_type`
--

CREATE TABLE IF NOT EXISTS `enquiry_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enquiry_type`
--

INSERT INTO `enquiry_type` (`id`, `name`, `description`, `sequence`) VALUES
(1, 'H/W Request t', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_user`
--

CREATE TABLE IF NOT EXISTS `enquiry_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DE607C6192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_DE607C61A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enquiry_user`
--

INSERT INTO `enquiry_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'adminuser', 'adminuser', 'admin@example.com', 'admin@example.com', 1, 'ngdn4s0kxmsg08wssgc8cs8g8w4kk0o', 'HJ8mWacTNSCMgpzUed0gia60A7d+ausVacsnZ23TMq9CkwwGYyEPk+uBwlRwyXfMLt1a2+h3zz4NuAQk1lAUdQ==', '2014-04-08 12:24:17', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL),
(2, 'sunimalee', 'sunimalee', 'admintest@example.com', 'admintest@example.com', 1, '97tfv2op730g84ks4ccckkg8wcw8c8s', 'WBV6StaSv48LpKTzlulxY84/5P6YUrbzKnVJ0Nl9qdCR3rJkRLH+YUQw2u3JR5+BYfw1JnxgQ3YU17qyyoWvaQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `FK_9D9969845EC4D266` FOREIGN KEY (`enquiry_level_id`) REFERENCES `enquiry_level` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_9D9969846BA44BD2` FOREIGN KEY (`enquiry_type_id`) REFERENCES `enquiry_type` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_9D996984A76ED395` FOREIGN KEY (`user_id`) REFERENCES `enquiry_user` (`id`),
  ADD CONSTRAINT `FK_9D996984AE80F5DF` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
