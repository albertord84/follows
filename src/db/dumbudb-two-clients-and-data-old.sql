-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2016 at 07:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumbudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `user_id` int(20) NOT NULL,
  `credit_card_number` varchar(16) DEFAULT NULL,
  `credit_card_status_id` int(1) DEFAULT NULL,
  `credit_card_cvc` varchar(3) DEFAULT NULL,
  `credit_card_name` varchar(100) DEFAULT NULL,
  `pay_day` int(1) DEFAULT NULL,
  `insta_id` varchar(50) DEFAULT NULL,
  `insta_followers_ini` int(20) DEFAULT NULL,
  `insta_following` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`user_id`, `credit_card_number`, `credit_card_status_id`, `credit_card_cvc`, `credit_card_name`, `pay_day`, `insta_id`, `insta_followers_ini`, `insta_following`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '3916799608', 5, 28),
(2, NULL, NULL, NULL, NULL, NULL, '3858629065', 40, 68);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_status`
--

CREATE TABLE `credit_card_status` (
  `id` int(1) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followed`
--

CREATE TABLE `followed` (
  `id` int(20) NOT NULL,
  `followed_id` varchar(20) NOT NULL,
  `client_id` int(20) NOT NULL,
  `reference_id` int(1) NOT NULL,
  `requested` tinyint(1) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `unfollowed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followed`
--

INSERT INTO `followed` (`id`, `followed_id`, `client_id`, `reference_id`, `requested`, `date`, `unfollowed`) VALUES
(2, '1900420218', 2, 5, 0, 1000, 0),
(4, '1900420218', 2, 5, 1, 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `value` float DEFAULT NULL,
  `date` int(4) DEFAULT NULL,
  `id` int(20) NOT NULL,
  `client_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_profile`
--

CREATE TABLE `reference_profile` (
  `id` int(1) NOT NULL,
  `insta_name` varchar(100) DEFAULT NULL,
  `insta_id` varchar(100) NOT NULL,
  `client_id` int(20) NOT NULL,
  `insta_follower_cursor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_profile`
--

INSERT INTO `reference_profile` (`id`, `insta_name`, `insta_id`, `client_id`, `insta_follower_cursor`) VALUES
(1, 'cristiano', '173560420', 1, NULL),
(2, 'brunomars', '20053826', 1, NULL),
(3, 'katyperry', '407964088', 1, NULL),
(4, 'plazaniteroi', '576130566', 2, NULL),
(5, 'nike', '13460080', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `robot`
--

CREATE TABLE `robot` (
  `id` int(1) NOT NULL,
  `IP` varchar(50) NOT NULL,
  `dir` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telf` varchar(15) DEFAULT NULL,
  `role_id` int(1) NOT NULL,
  `status_id` int(1) NOT NULL,
  `languaje` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `email`, `telf`, `role_id`, `status_id`, `languaje`) VALUES
(1, 'Alberto', 'albertoreyesd84', 'alberto', 'albertord84@gmail.com', '12344321', 2, 1, 'EN'),
(2, 'Jose Ramon', 'josergm86', 'joseramon', 'asdf@asdf.com', NULL, 2, 1, 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'ADMIN'),
(2, 'CLIENT'),
(3, 'ATTENDET');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(1) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `name`) VALUES
(1, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(1) NOT NULL,
  `IP` varchar(50) NOT NULL,
  `dir` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_robot`
--

CREATE TABLE `worker_robot` (
  `worker_id` int(1) NOT NULL,
  `robot_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `credit_card_status_id` (`credit_card_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `credit_card_status`
--
ALTER TABLE `credit_card_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followed`
--
ALTER TABLE `followed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_id` (`reference_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `reference_profile`
--
ALTER TABLE `reference_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `robot`
--
ALTER TABLE `robot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_robot`
--
ALTER TABLE `worker_robot`
  ADD KEY `worker_id` (`worker_id`),
  ADD KEY `robot_id` (`robot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_card_status`
--
ALTER TABLE `credit_card_status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followed`
--
ALTER TABLE `followed`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_profile`
--
ALTER TABLE `reference_profile`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `robot`
--
ALTER TABLE `robot`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_config`
--
ALTER TABLE `system_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_credit_card_status` FOREIGN KEY (`credit_card_status_id`) REFERENCES `credit_card_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `followed`
--
ALTER TABLE `followed`
  ADD CONSTRAINT `fk_client_followed` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reference` FOREIGN KEY (`reference_id`) REFERENCES `reference_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_client_payment` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reference_profile`
--
ALTER TABLE `reference_profile`
  ADD CONSTRAINT `fk_client_reference_profile` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_status` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_robot`
--
ALTER TABLE `worker_robot`
  ADD CONSTRAINT `fk_robot` FOREIGN KEY (`robot_id`) REFERENCES `robot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_worker` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
