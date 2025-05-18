-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 12:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newngodatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_note_for_executive_committees`
--

CREATE TABLE `child_note_for_executive_committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pnote_exeid` bigint(20) UNSIGNED NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `receiver_id` varchar(11) DEFAULT NULL,
  `sent_status` varchar(11) DEFAULT NULL,
  `sender_id` varchar(11) DEFAULT NULL,
  `view_status` varchar(11) DEFAULT NULL,
  `back_sign_status` varchar(11) DEFAULT NULL,
  `amPmValue` varchar(200) DEFAULT NULL,
  `amPmValueUpdate` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_note_for_executive_committees`
--
ALTER TABLE `child_note_for_executive_committees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_note_for_executive_committees_pnote_exeid_foreign` (`pnote_exeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_note_for_executive_committees`
--
ALTER TABLE `child_note_for_executive_committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_note_for_executive_committees`
--
ALTER TABLE `child_note_for_executive_committees`
  ADD CONSTRAINT `child_note_for_executive_committees_pnote_exeid_foreign` FOREIGN KEY (`pnote_exeid`) REFERENCES `parent_not_for_executive_committees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
