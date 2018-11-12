-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 10:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careerspoons`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_organizations`
--

CREATE TABLE `add_organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'www.example.com',
  `company_employees` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `company_industry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_since` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_cnic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verify_by_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `company_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'About Your Company',
  `company_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Not Yet Have Any Document',
  `isChecked` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_organizations`
--

INSERT INTO `add_organizations` (`id`, `company_name`, `company_type`, `company_city`, `company_branch`, `company_phone`, `company_website`, `company_employees`, `company_industry`, `company_since`, `company_location`, `company_email`, `company_password`, `company_cnic`, `verify_by_email`, `company_info`, `company_document`, `isChecked`, `created_at`, `updated_at`) VALUES
(1, 'Net Sole', 'Public', 'Lahore', '12345', '(1321) 312-3123', 'www.example.com', '0', 'ETC', '2018-11-13', 'as', 'netsole92gmail.com', '12', '09876-4352345-5', '0', 'About Your Company', 'Not Yet Have Any Document', 'true', '2018-11-12 06:43:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2018_11_02_173146_user_registeration', 1),
(14, '2018_11_12_103546_add_organization', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_cv_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkbox` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verify_by_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_organizations`
--
ALTER TABLE `add_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_users_user_email_unique` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_organizations`
--
ALTER TABLE `add_organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
