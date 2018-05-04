-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2016 at 07:42 PM
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
  `credit_card_exp_month` varchar(2) DEFAULT NULL,
  `credit_card_exp_year` varchar(4) DEFAULT NULL,
  `pay_day` varchar(10) DEFAULT NULL,
  `order_key` varchar(100) DEFAULT NULL,
  `insta_id` varchar(50) DEFAULT NULL,
  `insta_followers_ini` int(20) DEFAULT NULL,
  `insta_following` int(20) DEFAULT NULL,
  `HTTP_SERVER_VARS` text CHARACTER SET utf8 COLLATE utf8_bin,
  `foults` tinyint(4) DEFAULT NULL,
  `last_access` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`user_id`, `credit_card_number`, `credit_card_status_id`, `credit_card_cvc`, `credit_card_name`, `credit_card_exp_month`, `credit_card_exp_year`, `pay_day`, `order_key`, `insta_id`, `insta_followers_ini`, `insta_following`, `HTTP_SERVER_VARS`, `foults`, `last_access`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e0c0954a-dbd5-4e79-b513-0769d89bb490', '3916799608x', 5, 28, NULL, 0, '1478755453'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '94b8b67b-a04c-4bf2-a88e-7898edf3b403', '3858629065', 40, 68, NULL, 0, '1479015852'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '236116119x', 21, 0, NULL, 0, '1479276636'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3271838254', 640, 975, NULL, NULL, '1479017693'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1427864444', 150, 154, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '308087081', 1924, 195, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1340581726', 1412, 1007, NULL, NULL, '1478934795'),
(10, '5162208060967447', NULL, '616', 'PEDRO BASTOS PETTI', '03', '2019', '1479362146', '5f4ef87d-cf0d-4da1-91f6-5a394924c308', '3916799608', 703, 3070, NULL, NULL, NULL);

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
-- Table structure for table `daily_work`
--

CREATE TABLE `daily_work` (
  `reference_id` int(2) UNSIGNED NOT NULL,
  `to_follow` int(4) DEFAULT NULL,
  `to_unfollow` int(4) DEFAULT NULL,
  `cookies` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `date` varchar(10) DEFAULT NULL,
  `unfollowed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `value` float DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
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
  `insta_follower_cursor` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_profile`
--

INSERT INTO `reference_profile` (`id`, `insta_name`, `insta_id`, `client_id`, `insta_follower_cursor`, `deleted`) VALUES
(1, 'cristiano', '173560420', 1, 'AQCZEWzF7C2QMkhzU-qeERkNBvg5UYd1EvHc_3CXBzGQ76iW4xNsRIOQSP7bsZrXzcQEyLUuKoBT6zxOUd3DtpixMrXFKteBcdDOqKMy_ndMoPNYkou5ni_DX_17-hLYyms', 1),
(2, 'brunomars', '20053826', 1, 'AQDwyyJiSRLoyxa85E8Lp3VGqGMUdW_DEK5p7YKagvhqJytysaSR0dSdYC1mOHYMdi810R82D0lB1s3WjYemimuTnUHgpAbfp-QLUW1lZNIH_-ORp7TVAwl8y7gl8pmDV18', 0),
(3, 'katyperry', '407964088', 1, 'AQD4d2xVV5U3uP5ROSUAh7PWKL_WQWOyi2OlWTABxoRnla1Zaz6nECMPnTTfpwHMLt_VOabO3RVmqD6HZccKL1svxBPXCFb8ysf0p9lMmNSgJ3pkcJzjJzsUP6_X8bUqxt4', 0),
(4, 'plazaniteroi', '576130566', 2, 'AQDemzHcQdo0ZZ26CdlJfrq-C3lmap_6t9xLPusrAQWyjac6duNt6WX21zmqbXsYfRUAR0k3HQOnYzYBvQHAAHhes8vgERZO3OAL1jEZ-2ex9by-jIvf7-4uVR4EJscM2ak', 0),
(5, 'nike', '13460080', 2, 'AQCtcMD91_ILuR39-udA213TjpQ0u5bSxfhGaya77lFUQ4UhnY9Q60kcnziG-O_r8IlHKtdMutLAQH5CkCXT_V2Ccn_piek8LhnKZuIqdaie0rVGrNmm0ziG2IiZ1JGahjk', 0),
(6, 'ofelipeguga', '260616653', 3, 'AQBBgvx7Clso2weuHvp8nupwOTfVckJBqe0lDxzRnE29mA2HwQTX6aNogUGT_Lf1FzyRV-21qwuuqleJySOE9vGE85PQ0Z2Pr88IncmC_55-qKFUlUZF5ee47BXfzLdnKuE', 0),
(8, 'gabrielapugliesi', '29797722', 3, 'AQAez4ylTh013eDKtPMbie77DJZv2ErnldSl-n-P4lJF3Z24aDe4O884wqBgc-BYYA2cMv7PZfx3u-iMYJ05reMQk_TUh13lQVMahR3wX3LV2YO9xdt4pBT_EIewIFho47g', 0),
(9, 't.t.burger', '477656499', 3, 'AQDLcgxAleqXWC1IxUhqFJAE-oKPpKMCB_E5J_2VSe55h7ESLQsAuIWzBSI_31aMkqlsVH5BH438wgcHw75UCjb5VlypqMwCV-azOMcmoM5TNWIQc3gJnKFWJFTdRIRQuKE', 0),
(10, 'restaurantemanekineko', '175617464', 5, 'AQCpzFD8W_S1gktYYKM3qc2lgw7RHCyObGk_9erDH6-2kIDwQHUWuydnQsfzb8EmZq_v7hvrVl0pNrEaXnTip8kfZaoU6bUs106kxLZCUpe8G7f6F0cBw3aWxXfr__Rj684', 0),
(11, 'caopanheirolabra', '42588053', 6, 'AQCTknuXu7F8QmxQyrvMyfzoTSlm0SDwdUMHOKLeqMa22YcbTQX1F_gqt942II-RwwAe-e6btd3zQquWJtH71i9meHJNBljXFN37jVDFbepQcYmEdXE0RYyQCjNJFwPDGpQ', 0),
(12, 'neymarjr', '26669533', 7, 'AQAKq8H_tfsYz3FsS_95A9KIQ9J--f1M2HDu0PBto6uJZQ7HOqhc_C3IlXTs3QZ21QdlLjmitpNo7vDcnW6q7Em41PIIdrR03YQUmtK9ESJlR1OTuhRtopZKNuc8bEdEwXs', 0),
(13, 'bielmaciel', '14675186', 7, 'AQD9vDd7266gkPmKQw6bwtDYnnCIePpZ13B3pUh7fOnTH0wQVQrhanOKe4KGcKx2C03mVr7fKWF58n5ztf8drGYRqIjyZmpJGvJMgtb-_AwQjqtk0GXhzbEXCfCTS_YC9BY', 0),
(14, 'prateadobass', '189936641', 7, 'AQAyqXsPBzaP0r_yPlVCM_pWFuOoBjd-FK49RHcwElTCZIV56d-sgHJiDFU7B7xPLqwgqM27s0TNUaUS1TlH3hELeTATOVkXOxoTITuk6lnmyibNBTlYkF8trdbYnzuF724', 0),
(15, 'carlgracetattoos', '16715128', 8, 'AQBa73XcWYeH3Rmk9OLHB-1rCPYQ2dNnRuUWEA51v6mFiPBANEAYf6D7rp1fladXui7w2fBVBdO44JEljQ1Yeva-a8pNmSIsClQmA3XYICc4dhj07J2B41d7aGSdTHk4hcU', 0),
(16, 'tommymontoya', '17578759', 8, 'AQDSF_4s_A5547jFjdBinuhEUuzTD-JO8-alMlX_CBxchx-eroyaFMgqPu-yJph3fvoSsxTDcfURVZKdpuikZpZpdhmoZni6wIGH1KhIgKwSj5vsScBPdOqnDnvenRaKwxw', 0),
(17, 'cristiano', '173560420', 1, 'AQB5sgb5SHh2rKX8wWJ8W0hX1qOQgRhXdf8eX-mX2mjQiRVaoaVVEne3c0_EtmStBh8ngAQiIjYOL4owyV8y1dh40LGqXzOGcnDTtp1lZ3LDdoOqXjrmgp33JFNfYyrMJng', 0),
(18, 'poornvideosex', '3597511683', 5, NULL, 1),
(19, 'nike', '13460080', 5, NULL, 1),
(20, 'brunomars', '20053826', 10, NULL, 0),
(21, 'katyperry', '407964088', 10, NULL, 0),
(22, 'cristiano', '173560420', 10, NULL, 0);

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
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telf` varchar(15) DEFAULT NULL,
  `role_id` int(1) NOT NULL,
  `status_id` int(1) NOT NULL,
  `status_date` varchar(10) DEFAULT NULL,
  `languaje` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `email`, `telf`, `role_id`, `status_id`, `status_date`, `languaje`) VALUES
(1, 'Alberto', 'albertoreyesd84', 'alberto', 'albertord84@gmail.com', '12344321', 2, 4, NULL, 'EN'),
(2, 'Jose Ramon', 'josergm86', 'joseramon', 'asdf@asdf.com', NULL, 2, 1, NULL, 'PT'),
(3, 'Pedro Petti', 'pedropetti', 'Pp106020946', 'pedro@seiva.pro', NULL, 2, 1, NULL, 'PT'),
(5, 'Smart Sushi', 'smartsushidelivery', '838485', NULL, NULL, 2, 1, NULL, ''),
(6, 'luna_westie', 'luna_westie', 'luna.0404', NULL, NULL, 2, 1, NULL, ''),
(7, 'fabricio.uchoa', 'fabricio.uchoa', 'f4br1c10', NULL, NULL, 2, 5, NULL, ''),
(8, 'sandrozion7', 'sandrozion7', 'ziontattoo71', NULL, NULL, 2, 1, NULL, 'PT'),
(9, 'Pedro', 'pedro', 'pedro', NULL, NULL, 1, 1, NULL, ''),
(10, 'Alberto Reyes', 'albertoreyesd1984', 'alberto', 'albertord84@gmail.com', NULL, 2, 1, NULL, '');

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
(1, 'ACTIVE'),
(2, 'BLOCKED_BY_PAYMENT'),
(3, 'BLOCKED_BY_INSTA'),
(4, 'DELETED'),
(5, 'INACTIVE'),
(6, 'PENDING'),
(7, 'UNFOLLOW'),
(8, 'BEGINNER');

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
-- Indexes for table `daily_work`
--
ALTER TABLE `daily_work`
  ADD PRIMARY KEY (`reference_id`),
  ADD UNIQUE KEY `reference_id serial` (`reference_id`),
  ADD KEY `profile_reference` (`reference_id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_profile`
--
ALTER TABLE `reference_profile`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
