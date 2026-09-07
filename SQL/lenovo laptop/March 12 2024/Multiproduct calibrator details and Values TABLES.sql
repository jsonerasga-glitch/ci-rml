-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rml`
--

-- --------------------------------------------------------

--
-- Table structure for table `multiproductcalibratorstandard`
--

CREATE TABLE `multiproductcalibratorstandard` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `calibrationProvider` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL,
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`)),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiproductcalibratorstandard`
--

INSERT INTO `multiproductcalibratorstandard` (`id`, `serialNumber`, `certificateNumber`, `description`, `calibrationProvider`, `brand`, `model`, `dateOfCalibration`, `coverageFactor`, `measurements`, `status`) VALUES
(2, '2885802', '11-2022-ECAL-0125', 'Multi-Product Calibrator', 'NML (Philippines)  through DOST-CALABARZON RML	 		', 'Fluke', '5502A', '2023-01-12', '2', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `multiproductcalibratorstandardvalues`
--

CREATE TABLE `multiproductcalibratorstandardvalues` (
  `id` int(11) NOT NULL,
  `standardID` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `function` text DEFAULT NULL,
  `rangeMin` text DEFAULT NULL,
  `rangeMinUnit` text DEFAULT NULL,
  `rangeMax` text DEFAULT NULL,
  `rangeMaxUnit` text DEFAULT NULL,
  `outputSetting` text DEFAULT NULL,
  `outputSettingUnit` text DEFAULT NULL,
  `outputSettingHertz` text DEFAULT NULL,
  `outputSettingHertzUnit` text DEFAULT NULL,
  `coverageFactorValue` text DEFAULT NULL,
  `measuredOutputVoltage` text DEFAULT NULL,
  `measuredOutputVoltageUnit` text DEFAULT NULL,
  `uncertainty` text DEFAULT NULL,
  `uncertaintyUnit` text DEFAULT NULL,
  `previousMeasuredOutputVoltage` text DEFAULT NULL,
  `previousMeasuredOutputVoltageUnit` text DEFAULT NULL,
  `drift` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiproductcalibratorstandardvalues`
--

INSERT INTO `multiproductcalibratorstandardvalues` (`id`, `standardID`, `serialNumber`, `type`, `function`, `rangeMin`, `rangeMinUnit`, `rangeMax`, `rangeMaxUnit`, `outputSetting`, `outputSettingUnit`, `outputSettingHertz`, `outputSettingHertzUnit`, `coverageFactorValue`, `measuredOutputVoltage`, `measuredOutputVoltageUnit`, `uncertainty`, `uncertaintyUnit`, `previousMeasuredOutputVoltage`, `previousMeasuredOutputVoltageUnit`, `drift`, `status`) VALUES
(1, '2', '2885802', 'AC', 'Voltage', '33', 'mV', '329.999', 'mV', '100', 'mV', '50', 'Hz', '2', '99.9754', 'mV', '0.0072', 'mV', '99.9754', 'mV', '0', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multiproductcalibratorstandard`
--
ALTER TABLE `multiproductcalibratorstandard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiproductcalibratorstandardvalues`
--
ALTER TABLE `multiproductcalibratorstandardvalues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multiproductcalibratorstandard`
--
ALTER TABLE `multiproductcalibratorstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `multiproductcalibratorstandardvalues`
--
ALTER TABLE `multiproductcalibratorstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
