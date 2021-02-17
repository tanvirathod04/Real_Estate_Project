-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 05:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `card_id`) VALUES
(4, 0, 'kjkdfh', 'pooja', '2020-04-24 11:29:51', 0),
(5, 0, 'demo of mycomment', 'ritu', '2020-04-27 07:58:17', 1),
(6, 5, 'ok', 'pooja', '2020-04-27 08:02:43', 1),
(7, 0, 'abc', 'pooja', '2020-07-20 08:15:45', 27),
(8, 0, 'abcs', 'Pooja', '2020-07-23 08:42:40', 27),
(9, 0, 'hiiii', 'Pooja', '2021-02-09 09:35:51', 31),
(10, 0, 'hiiii', 'Pooja', '2021-02-09 09:35:55', 31),
(11, 0, 'hiiii', 'Pooja', '2021-02-09 09:35:56', 31),
(12, 0, 'tttttttttt', 'Pooja', '2021-02-10 06:13:20', 31),
(13, 0, 'tttttttttt', 'Pooja', '2021-02-10 06:13:21', 31);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `country` text NOT NULL,
  `language` text NOT NULL,
  `address` text NOT NULL,
  `fax` text NOT NULL,
  `url` text NOT NULL,
  `logo` text NOT NULL,
  `package_name` text NOT NULL,
  `employee_count` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `mail`, `password`, `phone`, `country`, `language`, `address`, `fax`, `url`, `logo`, `package_name`, `employee_count`, `counter`) VALUES
(2, 'Thorat Global Softwares', 'thoratglobalsoftwares@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '2455672', 'India', 'English', 'Nasik', 'Fno123', 'https://thoratglobalsoftwares.com', 'LogoColorNoText_Time1472121375494.png', 'standard', 10, 7),
(7, 'Amdocs', 'amdocs@am.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '02572456', 'India', 'English', 'Mumbai', 'F02787', 'https://amdocs.com', 'logo.png', 'basic', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `meeting_with` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `user_id`, `meeting_with`) VALUES
(7, 'abc', '2020-02-13 00:00:00', '2020-02-14 00:00:00', 101, ''),
(8, 'birthday', '2020-02-06 00:00:00', '2020-02-07 00:00:00', 144, ''),
(9, 'abc', '2020-03-03 00:00:00', '2020-03-04 00:00:00', 144, ''),
(10, 'abc', '2020-03-04 00:00:00', '2020-03-05 00:00:00', 144, ''),
(11, 'tit', '2020-03-02 04:30:00', '2020-03-02 05:00:00', 144, ''),
(13, 'abc', '2020-03-05 00:00:00', '2020-03-06 00:00:00', 144, ''),
(14, 'McD', '2020-03-11 00:00:00', '2020-03-12 00:00:00', 144, ''),
(15, 'Meeting', '2020-03-12 00:00:00', '2020-03-13 00:00:00', 145, ''),
(16, 'Holiday', '2020-03-10 00:00:00', '2020-03-11 00:00:00', 149, ''),
(17, 'Meeting', '2020-03-20 00:00:00', '2020-03-21 00:00:00', 149, ''),
(18, 'abc', '2020-07-16 00:00:00', '2020-07-17 00:00:00', 145, ''),
(21, 'iuik7u', '2021-02-09 00:00:00', '2021-02-10 00:00:00', 154, ''),
(22, 'Meeting12', '2021-02-11 00:00:00', '2021-02-12 00:00:00', 145, '');

-- --------------------------------------------------------

--
-- Table structure for table `onoffice`
--

CREATE TABLE `onoffice` (
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `salutation` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `company` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `country` text NOT NULL,
  `language` text NOT NULL,
  `postal_code` text NOT NULL,
  `town` text NOT NULL,
  `street` text NOT NULL,
  `house_no` text NOT NULL,
  `mobile` text NOT NULL,
  `fax` text NOT NULL,
  `logo` text NOT NULL,
  `status` enum('pending','approved','','') NOT NULL DEFAULT 'pending',
  `package` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice`
--

INSERT INTO `onoffice` (`user_id`, `company_id`, `salutation`, `first_name`, `last_name`, `company`, `mail`, `password`, `phone`, `country`, `language`, `postal_code`, `town`, `street`, `house_no`, `mobile`, `fax`, `logo`, `status`, `package`) VALUES
(1, 1, 'hiii', 'tanvi', 'rathod', 'reddust', 'tanvi@gmail.com', '12345', '56576876888', 'india', 'eng', '422003', 'nashik', 'nashik', '54', '4654665757', '6757', '676765', 'pending', 'yiu'),
(101, 0, 'ms', 'pooja', 'nunse', 'thorat softwares', 'poojanunse12@gmail.com', 'captch@#77', '7507025677', 'india', 'english', '422401', 'nasik', 'nasik', 'c2', '7090908070', 'fax-no', 'f7.jpg', 'pending', ''),
(137, 0, 'Mr', 'Pooja', 'Nunse', 'TS', 'poojanunse@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '7058413966', 'India', 'Maharashtra', '422401', 'nashik', 'c2 sant rohidas society ,godse mala anand road ,deolali camp', 'c3', '7058413966', '07058413966', 'f7.jpg', 'pending', ''),
(139, 0, 'Ms', 'Shriya', 'Shriya', 'MAstek', 'shriya@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '', 'India', 'English', '422401', 'Thane', 'Thane', 'c3', '7058413966', '', 'f7.jpg', 'pending', ''),
(143, 0, 'Mr', 'Raj', 'Thorat', 'Thorat', 'raj@g.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '', 'India', 'English', '12001', 'Nasik', 'MLS Street', '200', '7058413966', 'Fax12201', 'avatar.jpg', 'pending', ''),
(145, 2, 'Ms', 'Pooja', 'Nunse', 'Thorat', 'poojanunse1995@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '', 'India', 'English', '422401', 'DCMP', 'DHS', 'c3', '7507025677', '', 'image10.jpg', 'pending', ''),
(146, 2, 'Mr', 'Raj', 'Thorat', 'Thorat', 'rajthorat@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '', 'India', 'English', '2894', 'ANC', 'SLN', 'C5', '9090909090', '', 'avatar.jpg', 'pending', ''),
(149, 7, '', 'Amdocs', 'Amdocs', 'Amdocs', 'amdocs@am.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '02572456', 'India', 'English', '', 'Mumbai', 'Mumbai', '', '02572456', 'F02787', 'logo.png', 'approved', 'basic'),
(151, 7, 'Herr', 'Arif', 'Shaikh', 'Amdocs', 'arif@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '2456667', 'India', 'English', '12201', 'Thane', 'Mumbai', '12', '7058413988', 'Fax123', 'avatar.jpg', 'pending', ''),
(154, 2, 'Firma', 'Thorat Global Softwares', 'Thorat Global Softwares', 'Thorat Global Softwares', 'thoratglobalsoftwares@gmail.com', '26c8635c4e068e04cfd4cdc4b4435989ec0f6e0e46a00803e5064c708aa6f371', '2455672', 'India', 'English', '0245', 'Nasik', 'Down Town Strasse', 'c23', '9090909090', 'Fno123', 'LogoColorNoText_Time1472121375494.png', 'approved', 'standard'),
(155, 0, 'Familie', 'fdssf', 'ds', 'Thorat', 't.thorat@conplusinvest.de', '95d245f3eb25eb695e980c0591c16a4c818e609cd2aac265580749c877848926', 'yuh', 'augsburg', 'er', 'yu', 'y', 'rft', 'y6', '9874561230', 'rty5', 'facebook.jpg', 'pending', ''),
(156, 2, 'keine Angabe', 'dwd', 'ere', 'Thorat', 'tushart@live.com', '2198d2614f11cab933156adc8c0d697eb5a26da8121651e1086ecb87e83c6161', '6y8u578', 'fewtf', 'fref', '666', 'hjgj', 'erfd', '12', '1234567890', 'erf', 'fake.png', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_address`
--

CREATE TABLE `onoffice_address` (
  `id` int(11) NOT NULL,
  `client_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `salutation` text NOT NULL,
  `entry_date` date NOT NULL,
  `first_name` text NOT NULL,
  `name` text NOT NULL,
  `company` text NOT NULL,
  `company_additional` longtext NOT NULL,
  `street` text NOT NULL,
  `zip` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `telefon1` text NOT NULL,
  `telefon2` text NOT NULL,
  `mobile` text NOT NULL,
  `fax_no` text NOT NULL,
  `birthdate` date NOT NULL,
  `salutation2` text NOT NULL,
  `first_name2` text NOT NULL,
  `last_name2` text NOT NULL,
  `birthdate2` date NOT NULL,
  `employer` text NOT NULL,
  `job_title` text NOT NULL,
  `position` text NOT NULL,
  `salary` text NOT NULL,
  `employment` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `Homepage` text NOT NULL,
  `contact_salutation` text NOT NULL,
  `Last_Contact` text NOT NULL,
  `Customer_logo` text NOT NULL,
  `Preferred_form_of` text NOT NULL,
  `contact_Entry_Date` date NOT NULL,
  `Status` text NOT NULL,
  `Agent` text NOT NULL,
  `Type_of_contract` text NOT NULL,
  `Last_action` text NOT NULL,
  `Contact_source` text NOT NULL,
  `Lead` text NOT NULL,
  `Newsletter` text NOT NULL,
  `Terms_accepted` tinyint(1) NOT NULL,
  `Accepted_recall` tinyint(1) NOT NULL,
  `Customer_since` date NOT NULL,
  `Vip_contact` tinyint(1) NOT NULL,
  `warning_msg` text NOT NULL,
  `Save_until_date` date NOT NULL,
  `Save_until_reason` text NOT NULL,
  `GDPR_status` text NOT NULL,
  `main_contact` text NOT NULL,
  `second_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_address`
--

INSERT INTO `onoffice_address` (`id`, `client_no`, `user_id`, `company_id`, `salutation`, `entry_date`, `first_name`, `name`, `company`, `company_additional`, `street`, `zip`, `city`, `country`, `telefon1`, `telefon2`, `mobile`, `fax_no`, `birthdate`, `salutation2`, `first_name2`, `last_name2`, `birthdate2`, `employer`, `job_title`, `position`, `salary`, `employment`, `Email1`, `Email2`, `Homepage`, `contact_salutation`, `Last_Contact`, `Customer_logo`, `Preferred_form_of`, `contact_Entry_Date`, `Status`, `Agent`, `Type_of_contract`, `Last_action`, `Contact_source`, `Lead`, `Newsletter`, `Terms_accepted`, `Accepted_recall`, `Customer_since`, `Vip_contact`, `warning_msg`, `Save_until_date`, `Save_until_reason`, `GDPR_status`, `main_contact`, `second_contact`) VALUES
(1, 1091, 137, 1, 'Mr', '2022-03-03', 'Pooja', 'Pooja', 'TS', 'TS', 'c2', '422401', 'nashik', 'Afganistan', '07058413966', '07058413966', '7058413966', '56313066', '2019-03-03', 'Mr', 'Pooja', 'Nunse', '2020-01-01', 'hjhjh', 'yuyuu', 'hkhjkh', '35000', '', 'poojanunse1995@gmail.com', 'poojanunse1995@gmail.com', 'khkjhkjh', 'Pooja', 'kjkj', 'user.png', '', '2021-02-02', 'Not Started', 'jhgjhg', 'Privatkontakt', '2022-02-03', 'jhgjhg', 'Pooja', '4', 0, 0, '2016-01-01', 0, 'kgjg', '2022-02-03', '', '', 'Ritu', 'Riya'),
(3, 304, 137, 1, 'Ms', '2022-02-03', 'Reeta', 'Reeta', 'CO', 'CO', 'Street Abc', '422401', 'nashik', 'India', '07058413966', '07058413966', '7058413966', '09156313066', '2023-02-02', 'Mr', 'Pooja', 'Nunse', '2021-02-02', 'hjhjh', 'yuyuu', 'hkhjkh', 'jghjgjh', 'temporary', 'poojanunse1995@gmail.com', 'poojanunse1995@gmail.com', 'Home ', 'Pooja', 'Contact', 'user.png', 'Telefax', '2020-01-01', 'Completed', 'jhgjhgj', 'indMulti673Select249', '2018-01-01', 'jhgjhg', 'Pooja Nunse', '2', 1, 0, '2018-01-01', 0, 'Warning', '2020-02-03', 'aufbewahrungsfrist', 'ignorieren', 'Pooja', 'Pooja'),
(5, 500, 139, 0, 'Mr', '2020-01-01', 'Thorat', 'Softwares', 'TS', '', 'nasik', '422401', 'nasik', 'Afganistan', '', '', '7058413966', '', '2020-01-01', 'Mr', '', '', '0000-00-00', '', '', '', '', '', 'poojanunse1995@gmail.com', '', 'khkjhkjh', 'Pooja', 'kjkj', '', '', '2020-01-01', 'Not Started', 'jhgjhgj', 'Privatkontakt', '2020-01-01', 'hjhjkhh', 'Pooja', '4', 0, 0, '2020-01-01', 0, 'jhgj', '2016-01-01', '', '', 'Pooja', 'Pooja'),
(6, 500000, 145, 7, 'Frau', '2020-01-01', 'Ritu', 'Singh', 'Capgemini', 'Capgemini', 'OLS', '2323', 'PSJF', 'Germany', '2902900', '', '9090909090', '', '2020-01-01', 'keine Angabe', '', '', '0000-00-00', '', '', '', '', '', 'ritusingh@gmail.com', '', 'HomePage', 'AMC', 'LKD', 'user.png', 'Brief', '2020-02-01', 'status2adr_active', 'ANCM', 'indMulti673Select249', '2020-01-01', 'AMC', 'MNC', '3', 1, 1, '2019-01-01', 1, 'NA', '2020-01-01', 'vertrag', 'speicherungwiderrufen', 'Herry', 'Peter'),
(7, 500000, 145, 7, 'Herr', '2020-01-01', 'Tom', 'Ray', 'TaTa', 'TaTa', 'PLF', '909090', 'MKL', 'Germany', '', '', '9080907089', 'v7bnb', '2019-06-04', 'keine Angabe', '', '', '0000-00-00', '', '', '', '', '', 'tomm.ray@gmail.com', '', 'Hpage.com', 'NH', 'hjgj', 'avatar.jpg', 'Email', '2020-01-01', 'status2adr_active', 'LK', 'Privatkontakt', '2020-01-01', 'hj', 'kl', '2', 0, 1, '2021-01-01', 1, 'NA', '2020-01-01', 'nachweispflicht', 'speicherungwiderrufen', 'Paul', 'Paul'),
(8, 5, 154, 2, 'keine Angabe', '2020-01-01', 'ABC', 'ABC', 'XYZ', 'XY', 'OO', '9090', 'JKDFJ', 'China', '9090909090', '', '9090909090', 'bhbdhf', '2020-01-01', 'keine Angabe', '', '', '0000-00-00', '', '', '', '', '', 'poojanunse12@gmail.com', '', 'jhgjhg', 'ghjgjhg', 'jhgjhg', 'logo.png', 'Email', '2021-01-01', 'status2adr_active', 'jhdjhd', 'Privatkontakt', '2020-01-01', 'hjgdjg', 'hjghjghj', '0', 1, 0, '2020-01-01', 0, 'jhgsdjgh', '2020-01-01', 'vertrag', 'speicherungwiderrufen', 'ghghjg', 'hjgjhg');

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_address_files`
--

CREATE TABLE `onoffice_address_files` (
  `id` int(11) NOT NULL,
  `onoffice_address_id` int(11) NOT NULL,
  `file_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_address_files`
--

INSERT INTO `onoffice_address_files` (`id`, `onoffice_address_id`, `file_`) VALUES
(16, 1, 'research article.pdf'),
(21, 3, 'halophiles edited.docx'),
(23, 5, 'tsconfig.json'),
(24, 5, 'tsconfig.json'),
(25, 5, 'tsconfig.json'),
(26, 5, 'tsconfig.json'),
(27, 1, 'editor-style.css'),
(28, 6, 'app.png');

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_address_property_serach`
--

CREATE TABLE `onoffice_address_property_serach` (
  `id` int(11) NOT NULL,
  `onoffice_address_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mode` text NOT NULL,
  `filter` text NOT NULL,
  `status` text NOT NULL,
  `status2` text NOT NULL,
  `no_of_datasets` text NOT NULL,
  `display_above` text NOT NULL,
  `hide_already_offered` tinyint(1) NOT NULL,
  `only_show_own` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_address_property_serach`
--

INSERT INTO `onoffice_address_property_serach` (`id`, `onoffice_address_id`, `name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`, `hide_already_offered`, `only_show_own`) VALUES
(1, 1, 'abc', 'automaticAssign', 'Bitte wählen', 'Aktiv', 'Alle', '500', '200', 1, 1),
(2, 6, 'MArk', 'automaticAssign', 'Bitte wählen', 'Aktiv', 'Alle', '500', '200', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_appointment_assigned_addresses`
--

CREATE TABLE `onoffice_appointment_assigned_addresses` (
  `id` int(11) NOT NULL,
  `onoffice_appointment_basic_data_id` int(11) NOT NULL,
  `client_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_appointment_assigned_properties`
--

CREATE TABLE `onoffice_appointment_assigned_properties` (
  `id` int(11) NOT NULL,
  `onoffice_appointment_basic_data_id` int(11) NOT NULL,
  `onoffice_property_basic_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_appointment_basic_data`
--

CREATE TABLE `onoffice_appointment_basic_data` (
  `type_of_appointment` text NOT NULL,
  `subject` text NOT NULL,
  `appointment_status` text NOT NULL,
  `notes` text NOT NULL,
  `starting_date` date NOT NULL,
  `starting_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `travel_time` time NOT NULL,
  `full_day_appointment` tinyint(1) NOT NULL,
  `place_of_appointment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `check_in` text NOT NULL,
  `check_out` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_appointment_basic_data`
--

INSERT INTO `onoffice_appointment_basic_data` (`type_of_appointment`, `subject`, `appointment_status`, `notes`, `starting_date`, `starting_time`, `end_date`, `end_time`, `travel_time`, `full_day_appointment`, `place_of_appointment`, `user_id`, `id`, `check_in`, `check_out`) VALUES
('hjhjh', 'hjhjh', 'jhjhjh', 'hjhjhjh', '2019-09-01', '12:00:00', '2019-09-01', '12:00:00', '12:00:00', 1, 'jkhkjhk', 101, 101, 'hkyuyy', 'uyuyuy');

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_appointment_files`
--

CREATE TABLE `onoffice_appointment_files` (
  `id` int(11) NOT NULL,
  `onoffice_appointment_basic_data_id` int(11) NOT NULL,
  `file_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_appointment_options`
--

CREATE TABLE `onoffice_appointment_options` (
  `id` int(11) NOT NULL,
  `appointment_basic_id` int(11) DEFAULT NULL,
  `reminder_time` time NOT NULL,
  `memory_of` text NOT NULL,
  `confirmed_participants_only` tinyint(1) NOT NULL,
  `email` tinyint(1) NOT NULL,
  `pop_up` tinyint(1) NOT NULL,
  `sms` tinyint(1) NOT NULL,
  `repetition_type` text NOT NULL,
  `repetition_start_date` date NOT NULL,
  `repetition_end_date` date NOT NULL,
  `open_end` tinyint(1) NOT NULL,
  `appointment_feedback_delay` text NOT NULL,
  `private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_appointment_options`
--

INSERT INTO `onoffice_appointment_options` (`id`, `appointment_basic_id`, `reminder_time`, `memory_of`, `confirmed_participants_only`, `email`, `pop_up`, `sms`, `repetition_type`, `repetition_start_date`, `repetition_end_date`, `open_end`, `appointment_feedback_delay`, `private`) VALUES
(1, 101, '00:00:00', 'gjhg', 1, 1, 1, 1, 'khkjh', '2019-12-12', '2019-12-12', 1, 'jhjh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_appointment_participants`
--

CREATE TABLE `onoffice_appointment_participants` (
  `id` int(11) NOT NULL,
  `onoffice_appointment_basic_data_id` int(11) NOT NULL,
  `participants` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_property_assign_contactperson`
--

CREATE TABLE `onoffice_property_assign_contactperson` (
  `id` int(11) NOT NULL,
  `onoffice_property_basic_data_id` int(11) NOT NULL,
  `client_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_property_assign_contactperson`
--

INSERT INTO `onoffice_property_assign_contactperson` (`id`, `onoffice_property_basic_data_id`, `client_no`) VALUES
(1, 6, 304),
(2, 6, 1091);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_property_assign_owner`
--

CREATE TABLE `onoffice_property_assign_owner` (
  `id` int(11) NOT NULL,
  `onoffice_property_basic_data_id` int(11) NOT NULL,
  `client_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_property_assign_owner`
--

INSERT INTO `onoffice_property_assign_owner` (`id`, `onoffice_property_basic_data_id`, `client_no`) VALUES
(1, 6, 304),
(2, 6, 1091),
(3, 7, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_property_basic_data`
--

CREATE TABLE `onoffice_property_basic_data` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `Data_Record_Ref_No` text NOT NULL,
  `Status` text NOT NULL,
  `Property_External` text NOT NULL,
  `Agent` text NOT NULL,
  `Type_of_order` text NOT NULL,
  `Order_Until` date NOT NULL,
  `Sold_on` date NOT NULL,
  `last_action` text NOT NULL,
  `status2` text NOT NULL,
  `property_title` text NOT NULL,
  `street` text NOT NULL,
  `house_no` text NOT NULL,
  `postal_code` text NOT NULL,
  `town` text NOT NULL,
  `country` text NOT NULL,
  `Property_class` text NOT NULL,
  `Property_type` text NOT NULL,
  `type_of_usage` text NOT NULL,
  `marketing_method` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_image` text NOT NULL,
  `currency` text NOT NULL,
  `external_commission` text NOT NULL,
  `internal_commission` text NOT NULL,
  `plus_VAT_to_provision` text NOT NULL,
  `usable_area` text NOT NULL,
  `purchase_price` text NOT NULL,
  `living_area` text NOT NULL,
  `number_of_rooms` text NOT NULL,
  `number_of_bedrooms` text NOT NULL,
  `number_of_bathrooms` text NOT NULL,
  `plot_surface` text NOT NULL,
  `number_of_toilets` text NOT NULL,
  `description` text NOT NULL,
  `equipment_description` text NOT NULL,
  `location` text NOT NULL,
  `miscellaneous` text NOT NULL,
  `cable_satellite_TV` tinyint(1) NOT NULL,
  `energy_performance` text NOT NULL,
  `energy_pass_valid` text NOT NULL,
  `energy_cerrificate` text NOT NULL,
  `hot_water_included` tinyint(1) NOT NULL,
  `year_of_construction` text NOT NULL,
  `main_fuel_type` text NOT NULL,
  `dist_kindergarten` text NOT NULL,
  `dist_to_primary_schools` text NOT NULL,
  `dist_high_school` text NOT NULL,
  `dist_highway` text NOT NULL,
  `dist_to_downtown` text NOT NULL,
  `avail_from` text NOT NULL,
  `commercial_use` tinyint(1) NOT NULL,
  `rented` tinyint(1) NOT NULL,
  `listed_building` tinyint(1) NOT NULL,
  `Beaconing` text NOT NULL,
  `Heating` text NOT NULL,
  `Number_of_Floors` text NOT NULL,
  `Parking` text NOT NULL,
  `conditions` text NOT NULL,
  `Pets` text NOT NULL,
  `archive_property` tinyint(1) NOT NULL,
  `status2_nach_dem` text NOT NULL,
  `permanantly_in_rotation` text NOT NULL,
  `fictional_address_active` tinyint(1) NOT NULL,
  `fictional_price_active` tinyint(1) NOT NULL,
  `fictitional_price` text NOT NULL,
  `portals_website_api` text NOT NULL,
  `word_brochure_email` text NOT NULL,
  `pdf_brochure` text NOT NULL,
  `owner_addr_in_pdf` text NOT NULL,
  `marketing_status` text NOT NULL,
  `public` text NOT NULL,
  `exclusive` tinyint(1) NOT NULL,
  `top_offer` tinyint(1) NOT NULL,
  `google_maps` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `pricereduction` tinyint(1) NOT NULL,
  `reference` tinyint(1) NOT NULL,
  `free_of_commission` tinyint(1) NOT NULL,
  `property_of_the_day` tinyint(1) NOT NULL,
  `publish` text NOT NULL,
  `Balkon` tinyint(1) NOT NULL,
  `Terrasse` tinyint(1) NOT NULL,
  `Wintergarten` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_property_basic_data`
--

INSERT INTO `onoffice_property_basic_data` (`id`, `company_id`, `Data_Record_Ref_No`, `Status`, `Property_External`, `Agent`, `Type_of_order`, `Order_Until`, `Sold_on`, `last_action`, `status2`, `property_title`, `street`, `house_no`, `postal_code`, `town`, `country`, `Property_class`, `Property_type`, `type_of_usage`, `marketing_method`, `user_id`, `property_image`, `currency`, `external_commission`, `internal_commission`, `plus_VAT_to_provision`, `usable_area`, `purchase_price`, `living_area`, `number_of_rooms`, `number_of_bedrooms`, `number_of_bathrooms`, `plot_surface`, `number_of_toilets`, `description`, `equipment_description`, `location`, `miscellaneous`, `cable_satellite_TV`, `energy_performance`, `energy_pass_valid`, `energy_cerrificate`, `hot_water_included`, `year_of_construction`, `main_fuel_type`, `dist_kindergarten`, `dist_to_primary_schools`, `dist_high_school`, `dist_highway`, `dist_to_downtown`, `avail_from`, `commercial_use`, `rented`, `listed_building`, `Beaconing`, `Heating`, `Number_of_Floors`, `Parking`, `conditions`, `Pets`, `archive_property`, `status2_nach_dem`, `permanantly_in_rotation`, `fictional_address_active`, `fictional_price_active`, `fictitional_price`, `portals_website_api`, `word_brochure_email`, `pdf_brochure`, `owner_addr_in_pdf`, `marketing_status`, `public`, `exclusive`, `top_offer`, `google_maps`, `new`, `pricereduction`, `reference`, `free_of_commission`, `property_of_the_day`, `publish`, `Balkon`, `Terrasse`, `Wintergarten`) VALUES
(4, 1, '5e3d2d10b1e27', 'Active', '5e3d2d10b1e2c', 'Ritu', 'exclusive', '2018-01-01', '2020-01-01', '2018-01-01', 'Active', 'Royal Property', 'SBI Street', 'house123', '422401', 'Deolali ', 'India', 'House', 'Villa', 'Commercial', 'Purchase', 137, 'light_brick.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0),
(5, 1, '5e3d2e69bfa6b', 'Active', '5e3d2e69bfa6f', 'Soha', 'Standard', '2018-01-01', '2020-01-01', '2020-01-01', 'Active', 'Noor Enclave', 'SM DHS ', '123', '422401', 'Diu', 'India', 'House', 'Villa', 'Residential', 'Purchase', 139, 'marbletiles.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0),
(6, 1, '5e413278e3b8f', 'Active', '5e413278e8481', 'Roy', 'exclusive', '2020-01-01', '2020-01-01', '2019-01-01', 'Active', 'Noor Enclave', 'FT Sint ', 'N002', '12001', 'Deolali', 'Great Britain', 'House', 'Villa', 'Residential', 'Purchase', 137, 'house.jpg', 'USD', '3450', '898', 'No', 'abc', '6438', 'abc', 'four', 'two', 'two', '200', 'two', 'mysample Location', 'mysample Equipment Description', 'mysample Location', 'mysample Miscellaneous', 1, 'According to construction', '2021-02-01', 'A', 0, '2010', 'Alternative', '200', '200', '200', '200', '100', 'Own', 0, 1, 0, 'Gas', 'Furnance Heating', '20', '2 Garages', 'Refurbished', 'Yes', 0, 'status2obj_archiviert', 'yes', 1, 1, '2000', 'yes', 'yes', 'yes', 'yes', 'reserved', 'yes', 0, 0, 1, 0, 1, 1, 0, 0, 'no', 0, 0, 0),
(7, 7, '5e5ce1f9b1430', 'Aktiv', '5e5ce1f9b14d6', 'Roy', 'keine Angaben', '2021-02-02', '2021-02-02', '2020-02-02', 'Aktiv', 'NoorAvenue', 'SLN BZ', 'c5', '122', 'Muz', 'Germany', 'keine Angaben', 'keine Angaben', 'wohnen', 'kauf', 145, 'house.jpg', '€', '2000', '209', 'Nein', '209', '2000', '209', '209', '209', '209', '209', '209', 'When it is peace, then we may view again\r\nWith new-won eyes each other\'s truer form\r\nAnd wonder. Grown more loving-kind and warm\r\nWe\'ll grasp firm hands and laugh at the old pain,\r\nWhen it is peace. But until peace, the storm\r\nThe darkness and the thunder and the rain.', 'When it is peace, then we may view again\r\nWith new-won eyes each other\'s truer form\r\nAnd wonder. Grown more loving-kind and warm\r\nWe\'ll grasp firm hands and laugh at the old pain,\r\nWhen it is peace. But until peace, the storm\r\nThe darkness and the thunder and the rain.', 'When it is peace, then we may view again\r\nWith new-won eyes each other\'s truer form\r\nAnd wonder. Grown more loving-kind and warm\r\nWe\'ll grasp firm hands and laugh at the old pain,\r\nWhen it is peace. But until peace, the storm\r\nThe darkness and the thunder and the rain.', 'When it is peace, then we may view again\r\nWith new-won eyes each other\'s truer form\r\nAnd wonder. Grown more loving-kind and warm\r\nWe\'ll grasp firm hands and laugh at the old pain,\r\nWhen it is peace. But until peace, the storm\r\nThe darkness and the thunder and the rain.', 1, 'According to construction', '2020-01-01', 'G', 1, '2000', 'Solar', '200', '200', '200', '200', '200', '200', 1, 1, 1, 'Solar', 'Furnance Heating', '6', '2 Garages', 'Refurbished', 'Nein', 1, 'Keine Angabe', 'yes', 1, 1, '200', 'yes', 'yes', 'yes', 'yes', 'Reserviert', 'yes', 0, 0, 1, 1, 1, 1, 0, 0, 'yes', 1, 1, 1),
(8, 2, '602105d8680b3', 'Aktiv', '602105d8680b6', 'kuio', 'keine Angaben', '2021-02-11', '2021-02-20', '2021-02-26', 'Aktiv', 'ui', 'Alter Postweg', '12', '666', 'hjgj', 'Afganistan', 'hallen_lager_prod', 'keine Angaben', 'wohnen', 'kauf', 145, 'facebook.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_property_files`
--

CREATE TABLE `onoffice_property_files` (
  `id` int(11) NOT NULL,
  `onoffice_property_basic_data_id` int(11) NOT NULL,
  `file_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_property_files`
--

INSERT INTO `onoffice_property_files` (`id`, `onoffice_property_basic_data_id`, `file_`) VALUES
(3, 4, 'invitro ppt - sayali k..pptx'),
(4, 6, 'MongoDBCompass.exe'),
(5, 7, 'app.png');

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_property_propective_buyer`
--

CREATE TABLE `onoffice_property_propective_buyer` (
  `id` int(11) NOT NULL,
  `onoffice_property_basic_data_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mode` text NOT NULL,
  `filter` text NOT NULL,
  `status` text NOT NULL,
  `status2` text NOT NULL,
  `no_of_datasets` text NOT NULL,
  `display_above` text NOT NULL,
  `hide_contacted_interested_parties` tinyint(1) NOT NULL,
  `only_show_int_par` tinyint(1) NOT NULL,
  `hide_rejections` tinyint(1) NOT NULL,
  `hide_links` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_property_propective_buyer`
--

INSERT INTO `onoffice_property_propective_buyer` (`id`, `onoffice_property_basic_data_id`, `name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`, `hide_contacted_interested_parties`, `only_show_int_par`, `hide_rejections`, `hide_links`) VALUES
(1, 6, 'Jeff', 'Manual assignment', 'favourite properties', 'Archive', 'all', '500', 'ABC', 1, 0, 0, 1),
(2, 6, 'roma', 'Automatical assignment', '100.000 £ - 300.000 £', 'Active', 'all', '500', 'XYZ', 1, 1, 0, 0),
(3, 7, 'Peter', 'automaticAssign', 'Bitte wählen', 'Aktiv', 'Alle', '500', '200', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_todo`
--

CREATE TABLE `onoffice_todo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `task` text NOT NULL,
  `assign_user` text NOT NULL,
  `assigned_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_todo`
--

INSERT INTO `onoffice_todo` (`id`, `user_id`, `company_id`, `item`, `content`, `task`, `assign_user`, `assigned_user_id`) VALUES
(2, 154, 2, 'Video conferencing', 'this is sample content related to video conferencing meeting', 'inprogress', 'public', 0),
(14, 154, 2, 'Deployment', 'deployment of todo board is done !', 'complete', 'me', 0),
(16, 145, 2, 'RealEstate ', '80% work of onoffice is done and others are in progress', 'inprogress', 'me', 0),
(25, 154, 2, 'Presentation', 'content', 'todo', 'user', 154),
(26, 145, 2, 'GesAPro', 'sample content', 'complete', '', 0),
(27, 145, 2, 'Presentation', 'sample content', 'complete', 'user', 145),
(28, 145, 2, 'hiii', 'gfhg', 'hello', '', 0),
(29, 145, 2, 'niki', 'niki', 'niki', '', 0),
(30, 145, 2, 'tani', 'gfgh', 'tani', '', 0),
(31, 145, 2, 'task1', 'doing task..', 'todo', '', 0),
(32, 145, 2, 'Niki', 'done to do ', 'inProgress', '', 0),
(33, 145, 2, 'Tanvi Demo', 'Done todo List', 'Todo', '', 0),
(35, 145, 2, 'demo', 'dgf', '', '', 0),
(46, 145, 2, 'tniiiiii', 'tniiiiii', '', '', 0),
(48, 145, 2, 'tanu', 'doing work', 'todo', '', 0),
(51, 145, 2, 'hghy', 'trial', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_todo_assign_user`
--

CREATE TABLE `onoffice_todo_assign_user` (
  `id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL,
  `assigned_user_id` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onoffice_todo_files`
--

CREATE TABLE `onoffice_todo_files` (
  `id` int(11) NOT NULL,
  `onoffice_todo_id` int(11) NOT NULL,
  `file_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onoffice_todo_files`
--

INSERT INTO `onoffice_todo_files` (`id`, `onoffice_todo_id`, `file_`) VALUES
(1, 24, 'house.jpg'),
(3, 24, 'skype.png'),
(4, 2, 'skype.png'),
(5, 25, 'halophiles edited tvs.docx'),
(6, 31, 'facebook.jpg'),
(7, 31, 'real.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `priviledge`
--

CREATE TABLE `priviledge` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `address_read` int(11) NOT NULL,
  `property_read` int(11) NOT NULL,
  `task_read` int(11) NOT NULL,
  `address_edit` int(11) NOT NULL,
  `address_delete` int(11) NOT NULL,
  `property_edit` int(11) NOT NULL,
  `property_delete` int(11) NOT NULL,
  `task_edit` int(11) NOT NULL,
  `task_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priviledge`
--

INSERT INTO `priviledge` (`id`, `user_id`, `company_id`, `address_read`, `property_read`, `task_read`, `address_edit`, `address_delete`, `property_edit`, `property_delete`, `task_edit`, `task_delete`) VALUES
(1, 151, 7, 1, 1, 0, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `date`, `user_id`) VALUES
(3, 'ytghyut', '2021-02-09 05:28:43', 145),
(4, 'tani', '2021-02-09 05:28:43', 145),
(5, 'niki', '2021-02-09 05:29:12', 145);

-- --------------------------------------------------------

--
-- Table structure for table `teamproq`
--

CREATE TABLE `teamproq` (
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `salutation` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `company` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `country` text NOT NULL,
  `language` text NOT NULL,
  `postal_code` text NOT NULL,
  `town` text NOT NULL,
  `street` text NOT NULL,
  `house_no` text NOT NULL,
  `mobile` text NOT NULL,
  `fax` text NOT NULL,
  `logo` text NOT NULL,
  `status` enum('pending','approved','','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onoffice`
--
ALTER TABLE `onoffice`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `onoffice_address`
--
ALTER TABLE `onoffice_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `onoffice_address_files`
--
ALTER TABLE `onoffice_address_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_address_id` (`onoffice_address_id`);

--
-- Indexes for table `onoffice_address_property_serach`
--
ALTER TABLE `onoffice_address_property_serach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_address_id` (`onoffice_address_id`);

--
-- Indexes for table `onoffice_appointment_assigned_addresses`
--
ALTER TABLE `onoffice_appointment_assigned_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_appointment_basic_data_id` (`onoffice_appointment_basic_data_id`);

--
-- Indexes for table `onoffice_appointment_assigned_properties`
--
ALTER TABLE `onoffice_appointment_assigned_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_appointment_basic_data_id` (`onoffice_appointment_basic_data_id`),
  ADD KEY `onoffice_property_basic_data_id` (`onoffice_property_basic_data_id`);

--
-- Indexes for table `onoffice_appointment_basic_data`
--
ALTER TABLE `onoffice_appointment_basic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `onoffice_appointment_files`
--
ALTER TABLE `onoffice_appointment_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_appointment_basic_data_id` (`onoffice_appointment_basic_data_id`);

--
-- Indexes for table `onoffice_appointment_options`
--
ALTER TABLE `onoffice_appointment_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_basic_id` (`appointment_basic_id`);

--
-- Indexes for table `onoffice_appointment_participants`
--
ALTER TABLE `onoffice_appointment_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_appointment_basic_data_id` (`onoffice_appointment_basic_data_id`);

--
-- Indexes for table `onoffice_property_assign_contactperson`
--
ALTER TABLE `onoffice_property_assign_contactperson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_property_basic_data_id` (`onoffice_property_basic_data_id`);

--
-- Indexes for table `onoffice_property_assign_owner`
--
ALTER TABLE `onoffice_property_assign_owner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_property_basic_data_id` (`onoffice_property_basic_data_id`);

--
-- Indexes for table `onoffice_property_basic_data`
--
ALTER TABLE `onoffice_property_basic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_client_id` (`user_id`);

--
-- Indexes for table `onoffice_property_files`
--
ALTER TABLE `onoffice_property_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_property_basic_data_id` (`onoffice_property_basic_data_id`);

--
-- Indexes for table `onoffice_property_propective_buyer`
--
ALTER TABLE `onoffice_property_propective_buyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onoffice_property_basic_data_id` (`onoffice_property_basic_data_id`);

--
-- Indexes for table `onoffice_todo`
--
ALTER TABLE `onoffice_todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `onoffice_todo_assign_user`
--
ALTER TABLE `onoffice_todo_assign_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `onoffice_todo_files`
--
ALTER TABLE `onoffice_todo_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priviledge`
--
ALTER TABLE `priviledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `teamproq`
--
ALTER TABLE `teamproq`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `onoffice`
--
ALTER TABLE `onoffice`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `onoffice_address`
--
ALTER TABLE `onoffice_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `onoffice_address_files`
--
ALTER TABLE `onoffice_address_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `onoffice_address_property_serach`
--
ALTER TABLE `onoffice_address_property_serach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `onoffice_appointment_assigned_addresses`
--
ALTER TABLE `onoffice_appointment_assigned_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onoffice_appointment_assigned_properties`
--
ALTER TABLE `onoffice_appointment_assigned_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onoffice_appointment_files`
--
ALTER TABLE `onoffice_appointment_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onoffice_appointment_options`
--
ALTER TABLE `onoffice_appointment_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `onoffice_appointment_participants`
--
ALTER TABLE `onoffice_appointment_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onoffice_property_assign_contactperson`
--
ALTER TABLE `onoffice_property_assign_contactperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `onoffice_property_assign_owner`
--
ALTER TABLE `onoffice_property_assign_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `onoffice_property_basic_data`
--
ALTER TABLE `onoffice_property_basic_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `onoffice_property_files`
--
ALTER TABLE `onoffice_property_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `onoffice_property_propective_buyer`
--
ALTER TABLE `onoffice_property_propective_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `onoffice_todo`
--
ALTER TABLE `onoffice_todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `onoffice_todo_assign_user`
--
ALTER TABLE `onoffice_todo_assign_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onoffice_todo_files`
--
ALTER TABLE `onoffice_todo_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `priviledge`
--
ALTER TABLE `priviledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teamproq`
--
ALTER TABLE `teamproq`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `onoffice_address`
--
ALTER TABLE `onoffice_address`
  ADD CONSTRAINT `onoffice_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `onoffice` (`user_id`);

--
-- Constraints for table `onoffice_address_files`
--
ALTER TABLE `onoffice_address_files`
  ADD CONSTRAINT `onoffice_address_files_ibfk_1` FOREIGN KEY (`onoffice_address_id`) REFERENCES `onoffice_address` (`id`);

--
-- Constraints for table `onoffice_address_property_serach`
--
ALTER TABLE `onoffice_address_property_serach`
  ADD CONSTRAINT `onoffice_address_property_serach_ibfk_1` FOREIGN KEY (`onoffice_address_id`) REFERENCES `onoffice_address` (`id`);

--
-- Constraints for table `onoffice_appointment_assigned_addresses`
--
ALTER TABLE `onoffice_appointment_assigned_addresses`
  ADD CONSTRAINT `onoffice_appointment_assigned_addresses_ibfk_1` FOREIGN KEY (`onoffice_appointment_basic_data_id`) REFERENCES `onoffice_appointment_basic_data` (`id`);

--
-- Constraints for table `onoffice_appointment_assigned_properties`
--
ALTER TABLE `onoffice_appointment_assigned_properties`
  ADD CONSTRAINT `onoffice_appointment_assigned_properties_ibfk_1` FOREIGN KEY (`onoffice_appointment_basic_data_id`) REFERENCES `onoffice_appointment_basic_data` (`id`),
  ADD CONSTRAINT `onoffice_appointment_assigned_properties_ibfk_2` FOREIGN KEY (`onoffice_property_basic_data_id`) REFERENCES `onoffice_property_basic_data` (`id`);

--
-- Constraints for table `onoffice_appointment_basic_data`
--
ALTER TABLE `onoffice_appointment_basic_data`
  ADD CONSTRAINT `onoffice_appointment_basic_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `onoffice` (`user_id`);

--
-- Constraints for table `onoffice_appointment_files`
--
ALTER TABLE `onoffice_appointment_files`
  ADD CONSTRAINT `onoffice_appointment_files_ibfk_1` FOREIGN KEY (`onoffice_appointment_basic_data_id`) REFERENCES `onoffice_appointment_basic_data` (`id`);

--
-- Constraints for table `onoffice_appointment_options`
--
ALTER TABLE `onoffice_appointment_options`
  ADD CONSTRAINT `onoffice_appointment_options_ibfk_2` FOREIGN KEY (`appointment_basic_id`) REFERENCES `onoffice_appointment_basic_data` (`id`);

--
-- Constraints for table `onoffice_appointment_participants`
--
ALTER TABLE `onoffice_appointment_participants`
  ADD CONSTRAINT `onoffice_appointment_participants_ibfk_1` FOREIGN KEY (`onoffice_appointment_basic_data_id`) REFERENCES `onoffice_appointment_basic_data` (`id`);

--
-- Constraints for table `onoffice_property_assign_owner`
--
ALTER TABLE `onoffice_property_assign_owner`
  ADD CONSTRAINT `onoffice_property_assign_owner_ibfk_1` FOREIGN KEY (`onoffice_property_basic_data_id`) REFERENCES `onoffice_property_basic_data` (`id`);

--
-- Constraints for table `onoffice_property_basic_data`
--
ALTER TABLE `onoffice_property_basic_data`
  ADD CONSTRAINT `onoffice_property_basic_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `onoffice` (`user_id`);

--
-- Constraints for table `onoffice_property_files`
--
ALTER TABLE `onoffice_property_files`
  ADD CONSTRAINT `onoffice_property_files_ibfk_1` FOREIGN KEY (`onoffice_property_basic_data_id`) REFERENCES `onoffice_property_basic_data` (`id`);

--
-- Constraints for table `onoffice_property_propective_buyer`
--
ALTER TABLE `onoffice_property_propective_buyer`
  ADD CONSTRAINT `onoffice_property_propective_buyer_ibfk_1` FOREIGN KEY (`onoffice_property_basic_data_id`) REFERENCES `onoffice_property_basic_data` (`id`);

--
-- Constraints for table `onoffice_todo`
--
ALTER TABLE `onoffice_todo`
  ADD CONSTRAINT `onoffice_todo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `onoffice` (`user_id`),
  ADD CONSTRAINT `onoffice_todo_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `onoffice_todo_assign_user`
--
ALTER TABLE `onoffice_todo_assign_user`
  ADD CONSTRAINT `onoffice_todo_assign_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `onoffice` (`user_id`),
  ADD CONSTRAINT `onoffice_todo_assign_user_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `onoffice` (`user_id`);

--
-- Constraints for table `teamproq`
--
ALTER TABLE `teamproq`
  ADD CONSTRAINT `teamproq_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
