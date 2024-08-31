-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 07:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('Credit','Debit') NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `type`, `details`, `created_at`) VALUES
(1, 3, 1500.00, 'Credit', 'Deposit', '2024-08-31 13:02:51'),
(2, 3, 1500.00, 'Credit', 'Deposit', '2024-08-31 13:03:20'),
(3, 3, 1.00, 'Credit', 'Deposit', '2024-08-31 13:03:38'),
(4, 3, 321.00, 'Debit', 'Withdraw', '2024-08-31 13:07:08'),
(5, 3, 32121.00, 'Debit', 'Withdraw', '2024-08-31 13:08:45'),
(6, 3, 880.00, 'Debit', 'Withdraw', '2024-08-31 13:09:27'),
(9, 3, 500.00, 'Credit', 'Transfer from ', '2024-08-31 13:14:23'),
(11, 3, 2000.00, 'Credit', 'Transfer from ', '2024-08-31 13:14:39'),
(13, 3, 13.00, 'Credit', 'Transfer from Nabeel Shahzad', '2024-08-31 13:16:57'),
(15, 3, 13.00, 'Credit', 'Transfer from Nabeel Shahzad', '2024-08-31 13:17:13'),
(17, 3, 10.00, 'Credit', 'Transfer from Nabeel Shahzad', '2024-08-31 13:17:55'),
(18, 4, 32000.00, 'Credit', 'Deposit', '2024-08-31 14:40:50'),
(19, 4, 10.00, 'Credit', 'Deposit', '2024-08-31 16:16:05'),
(21, 5, 32000.00, 'Credit', 'Transfer from Nabeel', '2024-08-31 17:31:11'),
(23, 4, 32000.00, 'Credit', 'Transfer from husnian', '2024-08-31 17:31:38'),
(24, 4, 32000.00, 'Debit', 'Withdraw', '2024-08-31 17:31:54'),
(25, 4, 32000.00, 'Debit', 'Withdraw', '2024-08-31 17:32:00'),
(26, 5, 99999999.99, 'Credit', 'Deposit', '2024-08-31 17:32:26'),
(27, 5, 1.00, 'Debit', 'Transfer to dev.nabeel95@gmail.com', '2024-08-31 17:32:51'),
(28, 4, 1.00, 'Credit', 'Transfer from husnian', '2024-08-31 17:32:51'),
(29, 5, 32000.00, 'Credit', 'Deposit', '2024-08-31 17:32:59'),
(30, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:33:30'),
(31, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:33:40'),
(32, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:33:56'),
(33, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:00'),
(34, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:20'),
(35, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:24'),
(36, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:27'),
(37, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:31'),
(38, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:34'),
(39, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:37'),
(40, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:43'),
(41, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:34:50'),
(42, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:01'),
(43, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:11'),
(44, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:14'),
(45, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:18'),
(46, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:20'),
(47, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:23'),
(48, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:26'),
(49, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:34'),
(50, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:35:54'),
(51, 5, 320000.00, 'Credit', 'Deposit', '2024-08-31 17:36:07'),
(52, 5, 99999999.99, 'Credit', 'Deposit', '2024-08-31 17:36:11'),
(53, 5, 3.20, 'Debit', 'Withdraw', '2024-08-31 17:36:23'),
(54, 5, 99999999.99, 'Debit', 'Withdraw', '2024-08-31 17:36:30'),
(55, 5, 99999999.99, 'Debit', 'Transfer to dev.nabeel95@gmail.com', '2024-08-31 17:36:50'),
(56, 4, 99999999.99, 'Credit', 'Transfer from husnian', '2024-08-31 17:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` varchar(50) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `created_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `balance`, `verification_token`, `is_verified`, `created_time`) VALUES
(3, 'Nabeel', 'nabeel816@gmail.com', '$2y$10$FVfW5kr9g.AitusXa2WK/.WjzqJ3mXbUtiGfXmZqNRuu3KfrtMmKG', '70752', '22b4caca6f8579a4bf70ded5c5af7dc5', 1, '2024-08-31 13:08:29'),
(4, 'Nabeel', 'dev.nabeel95@gmail.com', '$2y$10$bQCfhR0B6juJyCLrC3k8deU/mhR77aqwxQX5yTn5mctDDsaYJl0NC', '50000', NULL, 0, NULL),
(5, 'husnian', 'husnainali8798@gmail.com', '$2y$10$W.TGzsvN1.2tRAKzgP/BtuqnfDonTUAdLCHS46WhgQe.1bkPrqeyO', '89000', NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
