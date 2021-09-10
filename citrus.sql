-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 09:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `appgini_query_log`
--

CREATE TABLE `appgini_query_log` (
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `statement` longtext DEFAULT NULL,
  `duration` decimal(10,2) UNSIGNED DEFAULT 0.00,
  `error` text DEFAULT NULL,
  `memberID` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appgini_query_log`
--

INSERT INTO `appgini_query_log` (`datetime`, `statement`, `duration`, `error`, `memberID`, `uri`) VALUES
('2021-07-17 11:56:04', 'ALTER TABLE `membership_groups` ADD UNIQUE INDEX `name` (`name`)', '0.00', 'Duplicate key name \'name\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_groups` ADD COLUMN `allowCSVImport` TINYINT NOT NULL DEFAULT \'0\'', '0.00', 'Duplicate column name \'allowCSVImport\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_users` ADD COLUMN `pass_reset_key` VARCHAR(100)', '0.00', 'Duplicate column name \'pass_reset_key\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_users` ADD COLUMN `pass_reset_expiry` INT UNSIGNED', '0.00', 'Duplicate column name \'pass_reset_expiry\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_users` ADD INDEX `groupID` (`groupID`)', '0.00', 'Duplicate key name \'groupID\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_users` ADD COLUMN `flags` TEXT', '0.00', 'Duplicate column name \'flags\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_users` ADD COLUMN `allowCSVImport` TINYINT NOT NULL DEFAULT \'0\'', '0.00', 'Duplicate column name \'allowCSVImport\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_userrecords` ADD UNIQUE INDEX `tableName_pkValue` (`tableName`, `pkValue`(150))', '0.00', 'Duplicate key name \'tableName_pkValue\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_userrecords` ADD INDEX `pkValue` (`pkValue`)', '0.00', 'Duplicate key name \'pkValue\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_userrecords` ADD INDEX `tableName` (`tableName`)', '0.00', 'Duplicate key name \'tableName\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_userrecords` ADD INDEX `memberID` (`memberID`)', '0.00', 'Duplicate key name \'memberID\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_userrecords` ADD INDEX `groupID` (`groupID`)', '0.00', 'Duplicate key name \'groupID\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_grouppermissions` ADD UNIQUE INDEX `groupID_tableName` (`groupID`, `tableName`)', '0.00', 'Duplicate key name \'groupID_tableName\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'ALTER TABLE `membership_userpermissions` ADD UNIQUE INDEX `memberID_tableName` (`memberID`, `tableName`)', '0.00', 'Duplicate key name \'memberID_tableName\'', 'guest', '/citrus/app/index.php?signIn=1'),
('2021-07-17 11:56:04', 'INSERT INTO `membership_users` SET \r\n			`memberID`=\'admin\', \r\n			`passMD5`=\'$2y$10$2Mx6O8/tNfzm.hsjnX3b6eEqAyRFDta7w6mOIwNHXtwzzarY/IuYq\', \r\n			`email`=\'admin@admin.com\', \r\n			`signUpDate`=\'2021-07-17\', \r\n			`groupID`=\'2\', \r\n			`isBanned`=0, \r\n			`isApproved`=1, \r\n			`comments`=\'Admin member created automatically on 2021-07-17\'', '0.00', 'Duplicate entry \'admin\' for key \'PRIMARY\'', 'guest', '/citrus/app/index.php?signIn=1');

-- --------------------------------------------------------

--
-- Table structure for table `applicants_and_tenants`
--

CREATE TABLE `applicants_and_tenants` (
  `id` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `driver_license_number` varchar(15) DEFAULT NULL,
  `driver_license_state` varchar(15) DEFAULT NULL,
  `requested_lease_term` varchar(15) DEFAULT NULL,
  `monthly_gross_pay` decimal(8,2) DEFAULT NULL,
  `additional_income` decimal(8,2) DEFAULT NULL,
  `assets` decimal(8,2) DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Applicant',
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants_and_tenants`
--

INSERT INTO `applicants_and_tenants` (`id`, `last_name`, `first_name`, `email`, `phone`, `birth_date`, `driver_license_number`, `driver_license_state`, `requested_lease_term`, `monthly_gross_pay`, `additional_income`, `assets`, `status`, `notes`) VALUES
(1, 'Dhumal', 'Santosh', 'santosh@admin.com', '9921489098', NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, 'Applicant', NULL),
(2, 'Patil', 'Rahul', 'santosh@admin.com', '9921489012', NULL, '8967HF1234', NULL, NULL, '1000.00', NULL, NULL, 'Tenant', NULL),
(3, 'S.', 'Sangram', 'sangram@gmail.com', '9867567679', NULL, '123445', NULL, NULL, NULL, NULL, NULL, 'Tenant', NULL),
(4, 'Naveen', 'k', 'naveen@gmail.com', '1234567890', '1907-05-11', '1234567890', NULL, NULL, '1000.00', '100.00', NULL, 'Applicant', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications_leases`
--

CREATE TABLE `applications_leases` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenants` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Application',
  `property` int(10) UNSIGNED DEFAULT NULL,
  `unit` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(40) NOT NULL DEFAULT 'Fixed',
  `total_number_of_occupants` varchar(15) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `recurring_charges_frequency` varchar(40) NOT NULL DEFAULT 'Monthly',
  `next_due_date` date DEFAULT NULL,
  `rent` decimal(8,2) DEFAULT NULL,
  `security_deposit` decimal(15,2) DEFAULT NULL,
  `security_deposit_date` date DEFAULT NULL,
  `emergency_contact` varchar(100) DEFAULT NULL,
  `co_signer_details` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `agreement` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications_leases`
--

INSERT INTO `applications_leases` (`id`, `tenants`, `status`, `property`, `unit`, `type`, `total_number_of_occupants`, `start_date`, `end_date`, `recurring_charges_frequency`, `next_due_date`, `rent`, `security_deposit`, `security_deposit_date`, `emergency_contact`, `co_signer_details`, `notes`, `agreement`) VALUES
(1, 1, 'Lease', 1, 2, 'Fixed', '3', '2021-07-08', '2022-07-08', 'Monthly', '2021-07-08', '300.00', '1000.00', '2021-07-08', '9503460604', 'Satish Dhumal\r\nsatish@gmail.com\r\n9123456789', 'Test notes', '1'),
(2, 4, 'Application', 1, 1, 'Fixed', '4', '2021-07-17', '2022-07-17', 'Monthly', '2021-07-17', '500.00', '1000.00', NULL, 'Mr. sangram\r\nMo:1234565656', 'Islam Shaikh\r\nMo:4354356464\r\nEmail:islam@sanbds.cm', '<br>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('iqlpoe1slq85m15pbg08bejoq2ihkgqi', '::1', 1626526914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532363931343b),
('mh6nvfanuqgimk0i5krul2sn6cduif5g', '::1', 1626525670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532353637303b),
('kpkantq3pgfh5ntbhq7pja1u9dh9a0oi', '::1', 1626526322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532363332323b),
('tqhpdt2gptcikbj17aodvs0r5vkihhvv', '::1', 1626526686, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532363638363b),
('15g76mppsk972vg58j81lpgb6ns9tttm', '::1', 1626527442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532373434323b),
('qtsbrlvjtn6ukp5958m8rr0kf64dmv51', '::1', 1626527490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532373439303b),
('ru5cottkm26g8kgro514c5p9gminnuds', '::1', 1626528279, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532383237393b),
('lj5oderev6cpio4r9alp3br5ela709f0', '::1', 1626527490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532373439303b),
('89b39ja65kqb6k3k8i73oa6l5las8nnt', '::1', 1626529410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532393431303b),
('7k325kq14n8a9siuobfpf3rklg9a9ja6', '::1', 1626529486, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363532393431303b),
('2ckb071rsomocec5p2ehb5bqc60e3jcf', '::1', 1626695617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632363639353535353b);

-- --------------------------------------------------------

--
-- Table structure for table `employment_and_income_history`
--

CREATE TABLE `employment_and_income_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenant` int(10) UNSIGNED DEFAULT NULL,
  `employer_name` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `employer_phone` varchar(15) DEFAULT NULL,
  `employed_from` date DEFAULT NULL,
  `employed_till` date DEFAULT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) NOT NULL DEFAULT 0,
  `allowView` tinyint(4) NOT NULL DEFAULT 0,
  `allowEdit` tinyint(4) NOT NULL DEFAULT 0,
  `allowDelete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 2, 'applicants_and_tenants', 1, 3, 3, 3),
(2, 2, 'applications_leases', 1, 3, 3, 3),
(3, 2, 'residence_and_rental_history', 1, 3, 3, 3),
(4, 2, 'employment_and_income_history', 1, 3, 3, 3),
(5, 2, 'references', 1, 3, 3, 3),
(6, 2, 'rental_owners', 1, 3, 3, 3),
(7, 2, 'properties', 1, 3, 3, 3),
(8, 2, 'property_photos', 1, 3, 3, 3),
(9, 2, 'units', 1, 3, 3, 3),
(10, 2, 'unit_photos', 1, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL,
  `allowCSVImport` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`, `allowCSVImport`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2021-07-08', 0, 0, 0),
(2, 'Admins', 'Admin group created automatically on 2021-07-08', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userpermissions`
--

CREATE TABLE `membership_userpermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `memberID` varchar(100) NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) NOT NULL DEFAULT 0,
  `allowView` tinyint(4) NOT NULL DEFAULT 0,
  `allowEdit` tinyint(4) NOT NULL DEFAULT 0,
  `allowDelete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(100) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_userrecords`
--

INSERT INTO `membership_userrecords` (`recID`, `tableName`, `pkValue`, `memberID`, `dateAdded`, `dateUpdated`, `groupID`) VALUES
(1, 'rental_owners', '1', 'admin', 1625800852, 1625800852, 2),
(2, 'properties', '1', 'admin', 1625801088, 1625801098, 2),
(3, 'units', '1', 'admin', 1625801316, 1625801316, 2),
(4, 'units', '2', 'admin', 1625801363, 1625801443, 2),
(5, 'unit_photos', '1', 'admin', 1625801475, 1625801475, 2),
(6, 'unit_photos', '2', 'admin', 1625801491, 1625801491, 2),
(7, 'unit_photos', '3', 'admin', 1625801524, 1625801524, 2),
(8, 'applicants_and_tenants', '1', 'admin', 1625801810, 1625801810, 2),
(9, 'applicants_and_tenants', '2', 'admin', 1625801814, 1625801891, 2),
(10, 'applications_leases', '1', 'admin', 1625803452, 1625803452, 2),
(11, 'residence_and_rental_history', '1', 'admin', 1625803607, 1625803607, 2),
(12, 'applicants_and_tenants', '4', 'admin', 1626529808, 1626529808, 2),
(13, 'applications_leases', '2', 'admin', 1626529955, 1626529955, 2),
(14, 'units', '3', 'admin', 1626530543, 1626530543, 2);

-- --------------------------------------------------------

--
-- Table structure for table `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(100) NOT NULL,
  `passMD5` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text DEFAULT NULL,
  `custom2` text DEFAULT NULL,
  `custom3` text DEFAULT NULL,
  `custom4` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `pass_reset_key` varchar(100) DEFAULT NULL,
  `pass_reset_expiry` int(10) UNSIGNED DEFAULT NULL,
  `allowCSVImport` tinyint(4) NOT NULL DEFAULT 0,
  `flags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`, `pass_reset_key`, `pass_reset_expiry`, `allowCSVImport`, `flags`) VALUES
('admin', '$2y$10$.iOUJdVFECRU61v5eb/r1uKDurcWegowG8QQfPYMfjYOM0NlqFmS6', 'admin@admin.com', '2021-07-08', 2, 0, 1, NULL, NULL, NULL, NULL, 'Admin member created automatically on 2021-07-08', NULL, NULL, 0, NULL),
('guest', NULL, NULL, '2021-07-08', 1, 0, 1, NULL, NULL, NULL, NULL, 'Anonymous member created automatically on 2021-07-08', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_usersessions`
--

CREATE TABLE `membership_usersessions` (
  `memberID` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `expiry_ts` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_name` text NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `type` varchar(40) NOT NULL,
  `number_of_units` decimal(15,0) DEFAULT NULL,
  `owner` int(10) UNSIGNED DEFAULT NULL,
  `operating_account` varchar(40) DEFAULT NULL,
  `property_reserve` decimal(15,0) DEFAULT NULL,
  `lease_term` varchar(15) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `City` varchar(40) DEFAULT NULL,
  `State` varchar(40) DEFAULT NULL,
  `ZIP` decimal(15,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_name`, `photo`, `type`, `number_of_units`, `owner`, `operating_account`, `property_reserve`, `lease_term`, `country`, `street`, `City`, `State`, `ZIP`) VALUES
(1, 'Heaven House', '8b38a5b2a298fe8cc.jpg', 'Residential', '2', 1, NULL, NULL, NULL, 'India', 'Mega Center, Hadapsar', 'Pune', 'MH', '411042');

-- --------------------------------------------------------

--
-- Table structure for table `property_photos`
--

CREATE TABLE `property_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `property` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenant` int(10) UNSIGNED DEFAULT NULL,
  `reference_name` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rental_owners`
--

CREATE TABLE `rental_owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `company_name` varchar(40) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `primary_email` varchar(40) DEFAULT NULL,
  `alternate_email` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `zip` decimal(15,0) DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rental_owners`
--

INSERT INTO `rental_owners` (`id`, `first_name`, `last_name`, `company_name`, `date_of_birth`, `primary_email`, `alternate_email`, `phone`, `country`, `street`, `city`, `state`, `zip`, `comments`) VALUES
(1, 'Islam', 'Shaikh', 'Precloud Technologies', '1991-01-29', 'islamjshaikh@gmail.com', NULL, '+919503460604', 'India', 'M403 Mega Center', 'Pune', 'MH', '411042', '<br>');

-- --------------------------------------------------------

--
-- Table structure for table `residence_and_rental_history`
--

CREATE TABLE `residence_and_rental_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenant` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `landlord_or_manager_name` varchar(15) DEFAULT NULL,
  `landlord_or_manager_phone` varchar(15) DEFAULT NULL,
  `monthly_rent` decimal(6,2) DEFAULT NULL,
  `duration_of_residency_from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `reason_for_leaving` varchar(40) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `residence_and_rental_history`
--

INSERT INTO `residence_and_rental_history` (`id`, `tenant`, `address`, `landlord_or_manager_name`, `landlord_or_manager_phone`, `monthly_rent`, `duration_of_residency_from`, `to`, `reason_for_leaving`, `notes`) VALUES
(1, 1, 'Hadapasar, Magarpatta', 'Heaven Manager', '7777777777', '300.00', '2021-07-08', NULL, NULL, '<br>');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `property` int(10) UNSIGNED DEFAULT NULL,
  `unit_number` varchar(40) DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `size` varchar(40) DEFAULT NULL,
  `country` int(10) UNSIGNED DEFAULT NULL,
  `street` int(10) UNSIGNED DEFAULT NULL,
  `city` int(10) UNSIGNED DEFAULT NULL,
  `state` int(10) UNSIGNED DEFAULT NULL,
  `postal_code` int(10) UNSIGNED DEFAULT NULL,
  `rooms` varchar(40) DEFAULT NULL,
  `bathroom` decimal(15,0) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `market_rent` decimal(15,0) DEFAULT NULL,
  `rental_amount` decimal(6,2) DEFAULT NULL,
  `deposit_amount` decimal(6,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `property`, `unit_number`, `photo`, `status`, `size`, `country`, `street`, `city`, `state`, `postal_code`, `rooms`, `bathroom`, `features`, `market_rent`, `rental_amount`, `deposit_amount`, `description`) VALUES
(1, 1, 'Ground Floor Flat', '0dc224b6297fed9cd.jpeg', 'Listed', '1200', 1, 1, 1, 1, 1, '3', '2', 'Cable ready, Air conditioning, Balcony, Heat - electric', NULL, '9999.99', NULL, '<span style=\"font-size: 11.998px;\">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</span><br>'),
(2, 1, '1st Floor Flat', '3da0ce5a9ec5530b7.jpeg', 'Unlisted', '1000', 1, 1, 1, 1, 1, '3', '2', 'Cable ready, Air conditioning, Refrigerator, Balcony, Heat - electric', NULL, '8000.00', NULL, '<span xss=\"removed\">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</span><br>'),
(3, 1, 'Plot 401', '01e694628706782fa.jpeg', 'Listed', '1400', 1, 1, 1, 1, 1, '3', '2', 'Air conditioning, Refrigerator, Dishwasher', NULL, '1000.00', NULL, '<br>');

-- --------------------------------------------------------

--
-- Table structure for table `unit_photos`
--

CREATE TABLE `unit_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_photos`
--

INSERT INTO `unit_photos` (`id`, `unit`, `photo`, `description`) VALUES
(1, 2, '4186a678c65e237a9.jpg', '<br>'),
(2, 2, '655ee11d1fecb9026.jpg', '<br>'),
(3, 1, '5fd121ed98c01b0bc.jpeg', '<br>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants_and_tenants`
--
ALTER TABLE `applicants_and_tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications_leases`
--
ALTER TABLE `applications_leases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenants` (`tenants`),
  ADD KEY `property` (`property`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `employment_and_income_history`
--
ALTER TABLE `employment_and_income_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant` (`tenant`);

--
-- Indexes for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`),
  ADD UNIQUE KEY `groupID_tableName` (`groupID`,`tableName`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  ADD PRIMARY KEY (`permissionID`),
  ADD UNIQUE KEY `memberID_tableName` (`memberID`,`tableName`);

--
-- Indexes for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD UNIQUE KEY `tableName_pkValue` (`tableName`,`pkValue`(150)),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `membership_usersessions`
--
ALTER TABLE `membership_usersessions`
  ADD UNIQUE KEY `memberID_token_agent` (`memberID`,`token`,`agent`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `expiry_ts` (`expiry_ts`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `property_photos`
--
ALTER TABLE `property_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property` (`property`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant` (`tenant`);

--
-- Indexes for table `rental_owners`
--
ALTER TABLE `rental_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residence_and_rental_history`
--
ALTER TABLE `residence_and_rental_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant` (`tenant`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property` (`property`);

--
-- Indexes for table `unit_photos`
--
ALTER TABLE `unit_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit` (`unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants_and_tenants`
--
ALTER TABLE `applicants_and_tenants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications_leases`
--
ALTER TABLE `applications_leases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employment_and_income_history`
--
ALTER TABLE `employment_and_income_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_photos`
--
ALTER TABLE `property_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_owners`
--
ALTER TABLE `rental_owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `residence_and_rental_history`
--
ALTER TABLE `residence_and_rental_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_photos`
--
ALTER TABLE `unit_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
