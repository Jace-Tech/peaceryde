-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2022 at 06:48 PM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ryde`
--
CREATE DATABASE IF NOT EXISTS `ryde` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ryde`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `email`, `name`, `type`, `password`, `date`) VALUES
(1, 'MAIN_ADMIN', 'jacealex151@gmail.com', 'Jace Alexander', 'HIGH', '$2y$10$6NIsnqfbvPowebRSsGFXGObRzBVoyg57KIiTp5QY7FDVDTB2LQcZ2', '2022-04-20 19:30:15'),
(3, 'adm_9343373548', 'henry@gmail.com', 'Henry Alexander', 'LOW', '$2y$10$silTdxOn0IkZKjgjyqlA5eYAvL9Xec.qzemtEFrH08vCva0E0vKKy', '2022-04-26 04:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `bi_table`
--

CREATE TABLE `bi_table` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `shares` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `coperate_address` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_table`
--

INSERT INTO `bi_table` (`id`, `user_id`, `shares`, `email`, `company_name`, `coperate_address`, `date`) VALUES
(1, 'usr_9659950400', 11000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-11 21:03:25'),
(2, 'usr_5410171766', 11000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-11 21:05:28'),
(3, 'usr_6659384249', 11000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-11 21:07:26'),
(4, 'usr_5798162847', 11000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-11 21:11:59'),
(5, 'usr_7091416817', 11000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-11 21:12:19'),
(6, 'usr_5059383723', 11000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-11 21:12:49'),
(7, 'usr_6079950974', 100000000, 'theonlyfreddie@gmail.com', 'hgjjkjl', 'jjjjjkjjko', '2022-04-12 11:57:10'),
(8, 'usr_5329499498', 10000000, 'theonlyfreddie@gmail.com', 'hgjjkjl', 'jjjjjkjjko', '2022-04-12 11:58:32'),
(9, 'usr_3127924170', 90000000, 'jacealex151@gmail.com', 'JaceTech', 'JaceTech', '2022-04-15 10:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `tags`, `date`) VALUES
(5, 'How can the widget to my website?', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', NULL, '2022-03-19 08:45:03'),
(7, 'Trying', 'H to ggggg', NULL, '2022-04-14 12:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `sender_id` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_id`, `user_id`, `sender_id`, `message`, `is_read`, `date`) VALUES
(1, 'msg_432488416', 'MAIN_ADMIN', 'usr_0491557399', 'testing this', 1, '2022-04-24 05:13:12'),
(2, 'msg_073026686', 'usr_0491557399', 'MAIN_ADMIN', 'Ok, I think it\'s working now', 1, '2022-04-24 07:17:35'),
(3, 'msg_734157285', 'MAIN_ADMIN', 'usr_0491557399', 'Hey you, what&#39;s up', 1, '2022-04-24 07:18:40'),
(4, 'msg_837199636', 'usr_0491557399', 'MAIN_ADMIN', 'Fuck', 1, '2022-04-24 07:31:10'),
(5, 'msg_408617025', 'usr_0491557399', 'MAIN_ADMIN', 'THANK GOD!!', 1, '2022-04-24 07:56:31'),
(6, 'msg_346223299', 'MAIN_ADMIN', 'usr_0491557399', 'OH MY GOODNESS!, JACE YOU DID IT', 1, '2022-04-24 07:57:05'),
(7, 'msg_453029613', 'usr_0491557399', 'MAIN_ADMIN', 'YEAH, I\'M THE BEST', 1, '2022-04-24 08:00:11'),
(8, 'msg_169571234', 'MAIN_ADMIN', 'usr_0491557399', 'Big head', 1, '2022-04-24 08:00:53'),
(9, 'msg_697394848', 'usr_0491557399', 'MAIN_ADMIN', 'I\'m okay', 1, '2022-04-24 08:01:24'),
(10, 'msg_390200139', 'usr_0491557399', 'MAIN_ADMIN', 'Hahahahhhahahahahah', 1, '2022-04-24 18:49:35'),
(11, 'msg_788434698', 'MAIN_ADMIN', 'usr_0491557399', 'Why are you so happy?', 1, '2022-04-24 19:02:22'),
(12, 'msg_322949502', 'usr_8309201315', 'MAIN_ADMIN', 'Testing This', 1, '2022-05-24 18:54:08'),
(13, 'msg_462240211', 'MAIN_ADMIN', 'usr_8309201315', 'Trying something again, please work this time oo', 1, '2022-05-24 18:54:45'),
(14, 'msg_524699716', 'MAIN_ADMIN', 'usr_8309201315', 'ok', 1, '2022-05-24 19:01:09'),
(15, 'msg_090303378', 'msg_524699716', 'MAIN_ADMIN', 'Alrighty man', 0, '2022-05-25 21:50:44'),
(16, 'msg_540014038', 'msg_524699716', 'MAIN_ADMIN', 'What?', 0, '2022-05-25 21:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `ref_id` varchar(100) NOT NULL,
  `service` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `ref_id`, `service`, `amount`, `status`, `date`) VALUES
(1, 'usr_0491557399', 'trx-ref_79221874484', 'srvs-002', 459.864, 'success', '2022-04-19 18:25:57'),
(2, 'usr_8933539184', 'trx-ref_28220187608', 'srvs-001', 218.983, 'pending', '2022-05-24 15:18:05'),
(3, 'usr_8309201315', 'trx-ref_94398472364', 'srvs-001', 218.983, 'pending', '2022-05-24 15:27:03'),
(4, 'usr_8309201315', 'trx-ref_68758872305', 'srvs-001', 218.983, 'success', '2022-05-24 15:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `payment_card`
--

CREATE TABLE `payment_card` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `card_name` varchar(200) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `card_cvv` varchar(100) NOT NULL,
  `card_expiry` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `reset_id` varchar(50) NOT NULL,
  `pin` varchar(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_id`, `service`, `date`) VALUES
(1, 'srvs-002', 'Nigeria Business Visa On Arrival', '2022-03-07 12:49:48'),
(2, 'srvs-001', 'Nigeria Temporary Work Permit (TWP)', '2022-03-07 12:50:22'),
(3, 'srvs-003', 'Nigeria Business Incorporation', '2022-03-07 12:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id` int(11) NOT NULL,
  `services` varchar(255) NOT NULL,
  `countries` text NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id`, `services`, `countries`, `admin_id`, `status`, `date`) VALUES
(11, 'srvs-002', '[\"benin\",\"botswana\",\"bulgaria\",\"burkina faso \"]', 'adm_9343373548', 'suspended', '2022-04-26 04:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `tracking_id` varchar(200) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `tracking` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `files` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_table`
--
ALTER TABLE `bi_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bi_table`
--
ALTER TABLE `bi_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
