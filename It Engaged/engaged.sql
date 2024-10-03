-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2024 at 04:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engaged`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `event_date`, `location`, `description`) VALUES
(1, 'Be a developer', '2024-11-13', 'Darling Harbour', 'meet with employer and develop to get jobs and opportunities to learn'),
(2, 'Tech Workshod', '2024-10-23', 'Level 3, Wentwoth institute Building', ' learn about designing website in advanced way');

-- --------------------------------------------------------

--
-- Table structure for table `graduation`
--

DROP TABLE IF EXISTS `graduation`;
CREATE TABLE IF NOT EXISTS `graduation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `graduation`
--

INSERT INTO `graduation` (`id`, `date`, `time`, `location`, `description`) VALUES
(1, '2023-12-19', '12:00:00', 'Wentwoth building', 'WELCOME TO THE GRADUTION FELLOW TUDENTS.');

-- --------------------------------------------------------

--
-- Table structure for table `interships`
--

DROP TABLE IF EXISTS `interships`;
CREATE TABLE IF NOT EXISTS `interships` (
  `interships_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `DESCRIPTION` text,
  `posted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`interships_id`),
  KEY `posted_by` (`posted_by`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `interships`
--

INSERT INTO `interships` (`interships_id`, `title`, `company`, `location`, `DESCRIPTION`, `posted_by`, `created_at`) VALUES
(1, 'Graphic Design Intern', 'Design studio', 'Darwin', 'Assist in creating designs', 1, '2024-09-23 03:54:10'),
(2, ' software designing Intern', 'soft tech', 'Adelaide', 'Assist in maintaining and developing software', 1, '2024-09-23 03:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text,
  `posted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`),
  KEY `posted_by` (`posted_by`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `company`, `location`, `description`, `posted_by`, `created_at`) VALUES
(1, ' Web designer', 'microsoft', 'Sydney', 'Develop next level webpage.', 1, '2024-09-23 03:50:11'),
(2, 'Software developer', 'Tech giants', 'melbourne', 'Develop and maintain software application.', 1, '2024-09-23 03:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
