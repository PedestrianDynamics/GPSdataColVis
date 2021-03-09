-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2021 at 08:08 PM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Table structure for table `current`
--

CREATE TABLE `current` (
  `id` int(11) NOT NULL,
  `lang` double NOT NULL,
  `lat` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `androidId` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `accuracy` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `traces`
--

CREATE TABLE `traces` (
  `id` int(11) NOT NULL,
  `lang` double NOT NULL,
  `lat` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `androidId` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `accuracy` double NOT NULL
) ENGINE=In