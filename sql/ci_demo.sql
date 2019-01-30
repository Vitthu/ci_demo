-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2018 at 11:34 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `expert_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `designation` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `categories` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`expert_id`, `name`, `email`, `password`, `designation`, `about`, `categories`, `image`, `date_added`, `is_active`) VALUES
(1, 'williams ', 'williams@askme.com', '32250170a0dca92d53ec9624f336ca24', 'Service Representative', 'Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web!  Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! Looking for something more than just a free theme? Head over to Creative Tim and preview some of the best premium Bootstrap themes and templates on the web! ', '["1","2","3"]', 'http://localhost/expert/uploads/experts/http://localhost/expert/uploads/experts/http://localhost/expert/uploads/experts/logo1536833288.jpg', '2018-09-08 09:34:27', 1),
(4, 'Brajesh Mishra', 'test2@askme.com', '32250170a0dca92d53ec9624f336ca24', 'Security Adviser ', 'In April 1991, Mishra joined the Bharatiya Janata Party and became head of its foreign policy cell.He resigned from the party in March 1998 on becoming the 9th Principal Secretary to the Prime Minister of India. After Brajesh Mishra, the post of principal secretary became such a powerful one that it eclipsed the status of cabinet ministers. As Vajpayee''s troubleshooter, he was one of the most powerful principal secretaries the PMO had ever seen.', '["1","3","5"]', 'men1536833354.jpeg', '2018-09-12 12:53:08', 1),
(5, 'Vitthal', 'vitthal@askme.com', '32250170a0dca92d53ec9624f336ca24', 'Developer', 'Software developer, one who programs computers or designs the system to match the requirements of a systems analyst\r\nWeb developer, a programmer who specializes in, or is specifically engaged in, the development of World Wide Web ', '["1","3"]', '61536843258.jpg', '2018-09-13 12:54:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `session_categories`
--

CREATE TABLE `session_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_categories`
--

INSERT INTO `session_categories` (`category_id`, `name`, `is_active`, `date_added`) VALUES
(1, 'IT', 1, '2018-09-08 07:19:30'),
(2, 'CSR', 1, '2018-09-08 07:19:30'),
(3, 'Security', 1, '2018-09-08 07:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` int(2) NOT NULL,
  `profile_photo` varchar(500) NOT NULL,
  `banner` varchar(500) NOT NULL,
  `login_attempt` int(11) NOT NULL,
  `is_logged` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_group_id`, `salt`, `first_name`, `last_name`, `email`, `contact`, `date_added`, `date_modified`, `status`, `profile_photo`, `banner`, `login_attempt`, `is_logged`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '21232f297', 'Admin', 'admin', 'leometric2@gmail.com', '9552654856', '2018-09-08 00:00:00', '2018-10-27 14:51:13', 1, 'download1536387257.jpeg', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `user_group_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `permission` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `name`, `permission`) VALUES
(1, 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`expert_id`);

--
-- Indexes for table `session_categories`
--
ALTER TABLE `session_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `expert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `session_categories`
--
ALTER TABLE `session_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
