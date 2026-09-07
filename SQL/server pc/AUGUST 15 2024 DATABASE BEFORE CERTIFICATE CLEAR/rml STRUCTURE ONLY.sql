-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 11:35 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `balancestandard`
--

CREATE TABLE `balancestandard` (
  `id` int(11) NOT NULL,
  `balance` text NOT NULL,
  `description` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `empty1` text NOT NULL,
  `full1` text NOT NULL,
  `empty2` text NOT NULL,
  `full2` text NOT NULL,
  `empty3` text NOT NULL,
  `full3` text NOT NULL,
  `empty4` text NOT NULL,
  `full4` text NOT NULL,
  `empty5` text NOT NULL,
  `full5` text NOT NULL,
  `emptySD` text NOT NULL,
  `fullSD` text NOT NULL,
  `nominalEmpty` text DEFAULT NULL,
  `nominalFull` text DEFAULT NULL,
  `sensitivityWeight` text NOT NULL,
  `uncertSensitivityWeight` text NOT NULL,
  `maximumValue` text DEFAULT NULL,
  `minimumValue` text DEFAULT NULL,
  `differenceValue` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `resolution1` text DEFAULT NULL,
  `resolution2` text DEFAULT NULL,
  `conditionForResolution` text DEFAULT NULL,
  `sensitivityWeightDelta` text DEFAULT NULL,
  `uncertSensitivityWeightDelta` text DEFAULT NULL,
  `pooledValue` text DEFAULT NULL,
  `measurements` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barometerstandard`
--

CREATE TABLE `barometerstandard` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `resolution` text DEFAULT NULL,
  `uncertaintyHPA` text DEFAULT NULL,
  `uncertaintyRH` text DEFAULT NULL,
  `uncertaintyTEMPAIR` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buffersolutionstandard`
--

CREATE TABLE `buffersolutionstandard` (
  `id` int(11) NOT NULL,
  `certificateNumber` text DEFAULT NULL,
  `pHValue` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `calibrationProvider` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `uncertaintypH` text DEFAULT NULL,
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`)),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buffersolutionstandardvalues`
--

CREATE TABLE `buffersolutionstandardvalues` (
  `id` int(11) NOT NULL,
  `standardID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `bufferSolutionReading` text DEFAULT NULL,
  `nextBufferSolutionReading` text DEFAULT NULL,
  `driftOfBufferSolutionReading` text DEFAULT NULL,
  `temperature` text DEFAULT NULL,
  `nextTemperature` text DEFAULT NULL,
  `changeInTemperature` text DEFAULT NULL,
  `sensitivityCoefficient` text DEFAULT NULL,
  `status` text DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calipertable`
--

CREATE TABLE `calipertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `certificateNumber` varchar(255) NOT NULL,
  `idOfCustomer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cmc`
--

CREATE TABLE `cmc` (
  `id` int(11) NOT NULL,
  `calibrationProcedure` text DEFAULT NULL,
  `cmcValue` text DEFAULT NULL,
  `conditions` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `id` int(11) NOT NULL,
  `customer` text NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digitalthermometertable`
--

CREATE TABLE `digitalthermometertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` text DEFAULT NULL,
  `customer` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dateReceived` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `recommendedDueDate` text DEFAULT NULL,
  `placeOfCalibration` text DEFAULT NULL,
  `standardUsed` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` text DEFAULT NULL,
  `checkedBy` text DEFAULT NULL,
  `verifierPosition` text DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp(),
  `specificationsArray` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentArray` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedValues` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `standard` text DEFAULT NULL,
  `customerInfo` longtext DEFAULT NULL,
  `equipmentInfo` longtext DEFAULT NULL,
  `environmentInfo` longtext DEFAULT NULL,
  `dataInputs` longtext DEFAULT NULL,
  `calculatedData` longtext DEFAULT NULL,
  `images` text DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingRemarks1` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digitaltimerstandard`
--

CREATE TABLE `digitaltimerstandard` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `calibrationProvider` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL,
  `standardResolution` text DEFAULT NULL,
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`)),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digitaltimerstandardvalues`
--

CREATE TABLE `digitaltimerstandardvalues` (
  `id` int(11) NOT NULL,
  `standardID` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `rmlReading` text DEFAULT NULL,
  `nmlReading` text DEFAULT NULL,
  `previousCorrectionSecond` text DEFAULT NULL,
  `correctionSecond` text DEFAULT NULL,
  `uncertaintySecond` text DEFAULT NULL,
  `driftSecond` text DEFAULT NULL,
  `previousMeasuredFrequency` text DEFAULT NULL,
  `measuredFrequency` text DEFAULT NULL,
  `deviationHertz` text DEFAULT NULL,
  `uncertaintyHertz` text NOT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digitaltimertable`
--

CREATE TABLE `digitaltimertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingCalibrationResultOffsetRemarks` text NOT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingOffsetInfo` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `graphMin` text DEFAULT NULL,
  `graphMax` text DEFAULT NULL,
  `graphStep` text DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documentingprocesscalibratorstandard`
--

CREATE TABLE `documentingprocesscalibratorstandard` (
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

-- --------------------------------------------------------

--
-- Table structure for table `documentingprocesscalibratorstandardvalues`
--

CREATE TABLE `documentingprocesscalibratorstandardvalues` (
  `id` int(11) NOT NULL,
  `standardID` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `function` text DEFAULT NULL,
  `functionType` text DEFAULT NULL,
  `sensorType` text DEFAULT NULL,
  `rangeValue` text DEFAULT NULL,
  `rangeValueUnit` text DEFAULT NULL,
  `settingValue` text DEFAULT NULL,
  `settingValueUnit` text DEFAULT NULL,
  `settingValueHertz` text DEFAULT NULL,
  `settingValueHertzUnit` text DEFAULT NULL,
  `coverageFactorValue` text DEFAULT NULL,
  `standardResolution` text DEFAULT NULL,
  `standardReadability` text DEFAULT NULL,
  `influenceFactorValue` text NOT NULL,
  `percentageValue` text DEFAULT NULL,
  `indicatedValue` text DEFAULT NULL,
  `indicatedValueUnit` text DEFAULT NULL,
  `uncertainty` text DEFAULT NULL,
  `uncertaintyUnit` text DEFAULT NULL,
  `previousIndicatedValue` text DEFAULT NULL,
  `previousIndicatedValueUnit` text DEFAULT NULL,
  `drift` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `electricalmetertable`
--

CREATE TABLE `electricalmetertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `electronicbalancetable`
--

CREATE TABLE `electronicbalancetable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `graphMin` text DEFAULT NULL,
  `graphMax` text DEFAULT NULL,
  `graphStep` text DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elect_table_1`
--

CREATE TABLE `elect_table_1` (
  `id` int(11) NOT NULL,
  `PabLogo` varchar(10) DEFAULT '''true''',
  `certificateNumber` text NOT NULL,
  `customer` text NOT NULL,
  `address` text NOT NULL,
  `dateReceived` text NOT NULL,
  `dateCalibrated` text NOT NULL,
  `recommendedDueDate` text NOT NULL,
  `placeOfCalibration` text NOT NULL,
  `equipmentDescription` text NOT NULL,
  `manufacturer` text NOT NULL,
  `modelNumber` text NOT NULL,
  `serialNumber` text NOT NULL,
  `equipmentID` text NOT NULL,
  `maxCapacity` text NOT NULL,
  `maxCapacityMeasurement` text NOT NULL,
  `minCapacity` text DEFAULT NULL,
  `minCapacityMeasurement` text DEFAULT NULL,
  `readability` text NOT NULL,
  `readabilityMeasurement` text NOT NULL,
  `startTemp` text NOT NULL,
  `endTemp` text NOT NULL,
  `aveTemp` text NOT NULL,
  `startRh` text NOT NULL,
  `endRh` text NOT NULL,
  `AveRh` text NOT NULL,
  `weight` text NOT NULL,
  `premA` text DEFAULT NULL,
  `premB` text DEFAULT NULL,
  `premC` text DEFAULT NULL,
  `premD` text DEFAULT NULL,
  `premE` text DEFAULT NULL,
  `premF` text DEFAULT NULL,
  `premG` text DEFAULT NULL,
  `repeat1` text NOT NULL,
  `repeat2` text NOT NULL,
  `repeat3` text NOT NULL,
  `repeat4` text NOT NULL,
  `repeat5` text NOT NULL,
  `repeat6` text NOT NULL,
  `repeat7` text NOT NULL,
  `repeat8` text NOT NULL,
  `repeat9` text NOT NULL,
  `repeat10` text NOT NULL,
  `stDev` text NOT NULL,
  `stDevReal` text NOT NULL,
  `remarksA` text DEFAULT NULL,
  `remarksB` text DEFAULT NULL,
  `remarksC` text DEFAULT NULL,
  `remarksD` text DEFAULT NULL,
  `remarksE` text DEFAULT NULL,
  `remarksF` text DEFAULT NULL,
  `calibratedBy` text NOT NULL,
  `encodedBy` text NOT NULL,
  `checkedby` text NOT NULL,
  `eccentricityUnit` text NOT NULL,
  `eccentricity1Start` text NOT NULL,
  `eccentricity2` text NOT NULL,
  `eccentricity3` text NOT NULL,
  `eccentricity4` text NOT NULL,
  `eccentricity5` text NOT NULL,
  `eccentricity1End` text NOT NULL,
  `error2` text NOT NULL,
  `error3` text NOT NULL,
  `error4` text NOT NULL,
  `error5` text NOT NULL,
  `error1` text NOT NULL,
  `error2View` text DEFAULT NULL,
  `error3View` text DEFAULT NULL,
  `error4View` text DEFAULT NULL,
  `error5View` text DEFAULT NULL,
  `error1View` text DEFAULT NULL,
  `load` text NOT NULL,
  `errDiff` text NOT NULL,
  `illusA` text DEFAULT NULL,
  `illusB` text DEFAULT NULL,
  `linearityUnit` text NOT NULL,
  `convenMass1` text NOT NULL,
  `indication1` text NOT NULL,
  `linearError1` text NOT NULL,
  `expandedUncertain1` text NOT NULL,
  `k1` text NOT NULL,
  `uncertain1` text NOT NULL,
  `mpe1` text NOT NULL,
  `convection1` text NOT NULL,
  `class1` text NOT NULL,
  `convenMass2` text NOT NULL,
  `indication2` text NOT NULL,
  `linearError2` text NOT NULL,
  `expandedUncertain2` text NOT NULL,
  `k2` text NOT NULL,
  `uncertain2` text NOT NULL,
  `mpe2` text NOT NULL,
  `convection2` text NOT NULL,
  `class2` text NOT NULL,
  `convenMass3` text NOT NULL,
  `indication3` text NOT NULL,
  `linearError3` text NOT NULL,
  `expandedUncertain3` text NOT NULL,
  `k3` text NOT NULL,
  `uncertain3` text NOT NULL,
  `mpe3` text NOT NULL,
  `convection3` text NOT NULL,
  `class3` text NOT NULL,
  `convenMass4` text NOT NULL,
  `indication4` text NOT NULL,
  `linearError4` text NOT NULL,
  `expandedUncertain4` text NOT NULL,
  `k4` text NOT NULL,
  `uncertain4` text NOT NULL,
  `mpe4` text NOT NULL,
  `convection4` text NOT NULL,
  `class4` text NOT NULL,
  `convenMass5` text NOT NULL,
  `indication5` text NOT NULL,
  `linearError5` text NOT NULL,
  `expandedUncertain5` text NOT NULL,
  `k5` text NOT NULL,
  `uncertain5` text NOT NULL,
  `mpe5` text NOT NULL,
  `convection5` text NOT NULL,
  `class5` text NOT NULL,
  `convenMass6` text NOT NULL,
  `indication6` text NOT NULL,
  `linearError6` text NOT NULL,
  `expandedUncertain6` text NOT NULL,
  `k6` text NOT NULL,
  `uncertain6` text NOT NULL,
  `mpe6` text NOT NULL,
  `convection6` text NOT NULL,
  `class6` text NOT NULL,
  `convenMass7` text NOT NULL,
  `indication7` text NOT NULL,
  `linearError7` text NOT NULL,
  `expandedUncertain7` text NOT NULL,
  `k7` text NOT NULL,
  `uncertain7` text NOT NULL,
  `mpe7` text NOT NULL,
  `convection7` text NOT NULL,
  `class7` text NOT NULL,
  `convenMass8` text NOT NULL,
  `indication8` text NOT NULL,
  `linearError8` text NOT NULL,
  `expandedUncertain8` text NOT NULL,
  `k8` text NOT NULL,
  `uncertain8` text NOT NULL,
  `mpe8` text NOT NULL,
  `convection8` text NOT NULL,
  `class8` text NOT NULL,
  `linearLoad1` text NOT NULL,
  `linearLoad2` text NOT NULL,
  `linearLoad3` text NOT NULL,
  `linearLoad4` text NOT NULL,
  `linearLoad5` text NOT NULL,
  `linearLoad6` text NOT NULL,
  `linearLoad7` text NOT NULL,
  `linearLoad8` text NOT NULL,
  `markings1` text DEFAULT NULL,
  `markings2` text DEFAULT NULL,
  `markings3` text DEFAULT NULL,
  `markings4` text DEFAULT NULL,
  `markings5` text DEFAULT NULL,
  `markings6` text DEFAULT NULL,
  `markings7` text DEFAULT NULL,
  `markings8` text DEFAULT NULL,
  `markHidden1` text DEFAULT NULL,
  `markHidden2` text DEFAULT NULL,
  `markHidden3` text DEFAULT NULL,
  `markHidden4` text DEFAULT NULL,
  `markHidden5` text DEFAULT NULL,
  `markHidden6` text DEFAULT NULL,
  `markHidden7` text DEFAULT NULL,
  `markHidden8` text DEFAULT NULL,
  `convenMassG1` text DEFAULT NULL,
  `convenMassG2` text DEFAULT NULL,
  `convenMassG3` text DEFAULT NULL,
  `convenMassG4` text DEFAULT NULL,
  `convenMassG5` text DEFAULT NULL,
  `convenMassG6` text DEFAULT NULL,
  `convenMassG7` text DEFAULT NULL,
  `convenMassG8` text DEFAULT NULL,
  `repeatabilityValue` text NOT NULL,
  `repeatabilityUnit` text NOT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingRemarks1` longtext DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `dateOfIssue` varchar(255) DEFAULT current_timestamp(),
  `graphMin` text DEFAULT NULL,
  `graphMax` text DEFAULT NULL,
  `graphStep` text DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elect_table_2`
--

CREATE TABLE `elect_table_2` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `certificateNumber` varchar(255) NOT NULL,
  `dateOfCalibration` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `prevAirDensity` text DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL,
  `calibrationProvider` text NOT NULL,
  `dateOfInsert` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elect_table_3`
--

CREATE TABLE `elect_table_3` (
  `id` int(11) NOT NULL,
  `serialNumber` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `class` text DEFAULT NULL,
  `nominalValue` varchar(255) DEFAULT NULL,
  `nominalUnit` varchar(10) DEFAULT NULL,
  `marking` varchar(255) DEFAULT NULL,
  `conventionalMass` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `uncertainty` varchar(255) DEFAULT NULL,
  `mpe` varchar(255) DEFAULT NULL,
  `drift` text DEFAULT NULL,
  `previousConventionalMass` text DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL,
  `calibrationProvider` varchar(255) DEFAULT NULL,
  `standardID` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enclosuretable`
--

CREATE TABLE `enclosuretable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `glasswaretable`
--

CREATE TABLE `glasswaretable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `selectedBalance` text DEFAULT NULL,
  `selectedBarometer` text DEFAULT NULL,
  `selectedThermometer` text DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceabilityVolumetric` longtext DEFAULT NULL,
  `settingCalibrationProcedureAndTraceabilityPova` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `imagetable`
--

CREATE TABLE `imagetable` (
  `id` int(11) NOT NULL,
  `imageName` text DEFAULT NULL,
  `imagePath` text DEFAULT NULL,
  `worksheetID` text DEFAULT NULL,
  `worksheetType` text DEFAULT NULL,
  `idOfCertificate` text DEFAULT NULL,
  `certificateNumber` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `pabconditions`
--

CREATE TABLE `pabconditions` (
  `id` int(11) NOT NULL,
  `instrument` text NOT NULL,
  `conditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`conditions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `personnelName` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phmetertable`
--

CREATE TABLE `phmetertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingCalibrationResultOffsetRemarks` text NOT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `settingCalibrationAdditionalInfo` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `graphMin` text DEFAULT NULL,
  `graphMax` text DEFAULT NULL,
  `graphStep` text DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ph_meter_standard`
--

CREATE TABLE `ph_meter_standard` (
  `id` int(11) NOT NULL,
  `tempC` text NOT NULL,
  `tempK` text NOT NULL,
  `LN` text NOT NULL,
  `En` text NOT NULL,
  `slope` text NOT NULL,
  `dateOfNextCali` text NOT NULL,
  `manufacturer` text NOT NULL,
  `modelNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `placeholders`
--

CREATE TABLE `placeholders` (
  `id` int(11) NOT NULL,
  `module1CalibrationProcedureAndTraceability` text NOT NULL,
  `module1UncertaintyOfMeasurement` text NOT NULL,
  `module1CalibrationResults` text NOT NULL,
  `module1Remarks` text NOT NULL,
  `module2CalibrationProcedureAndTraceability` text NOT NULL,
  `module2UncertaintyOfMeasurement` text NOT NULL,
  `module2CalibrationResults` text NOT NULL,
  `module2Remarks` text NOT NULL,
  `module3CalibrationProcedureAndTraceability` text NOT NULL,
  `module3CalibrationProcedureAndTraceability2` text NOT NULL,
  `module3UncertaintyOfMeasurement` text NOT NULL,
  `module3CalibrationResults` text NOT NULL,
  `module3Remarks` text NOT NULL,
  `module4CalibrationProcedureAndTraceability` text NOT NULL,
  `module4CalibrationProcedureAndTraceability2` text NOT NULL,
  `module4UncertaintyOfMeasurement` text NOT NULL,
  `module4CalibrationResults` text NOT NULL,
  `module4Remarks` text NOT NULL,
  `module5CalibrationProcedureAndTraceability` text NOT NULL,
  `module5UncertaintyOfMeasurement` text NOT NULL,
  `module5CalibrationResults` text NOT NULL,
  `module5Remarks` text NOT NULL,
  `module6CalibrationProcedureAndTraceability` text NOT NULL,
  `module6CalibrationResults` text NOT NULL,
  `module6UncertaintyOfMeasurement` text NOT NULL,
  `module6Remarks` longtext NOT NULL,
  `module6OffsetInfo` text NOT NULL,
  `module7CalibrationProcedureAndTraceability` text NOT NULL,
  `module7CalibrationResults` text NOT NULL,
  `module7UncertaintyOfMeasurement` text NOT NULL,
  `module7MeasurementCondition` text NOT NULL,
  `module7Remarks` text NOT NULL,
  `module8CalibrationProcedureAndTraceability` text NOT NULL,
  `module8CalibrationResults` text NOT NULL,
  `module8UncertaintyOfMeasurement` text NOT NULL,
  `module8Remarks` longtext NOT NULL,
  `module8CalibrationAdditionalInfo` text NOT NULL,
  `module9CalibrationProcedureAndTraceabilityVolumetric` text NOT NULL,
  `module9CalibrationProcedureAndTraceabilityPova` text NOT NULL,
  `module9CalibrationResults` text NOT NULL,
  `module9UncertaintyOfMeasurement` text NOT NULL,
  `module9Remarks` text NOT NULL,
  `module10CalibrationProcedureAndTraceability` text NOT NULL,
  `module10CalibrationResults` text NOT NULL,
  `module10UncertaintyOfMeasurement` text NOT NULL,
  `module10Remarks` longtext NOT NULL,
  `module11CalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `module11CalibrationResults` longtext DEFAULT NULL,
  `module11UncertaintyOfMeasurement` longtext DEFAULT NULL,
  `module11Remarks` longtext DEFAULT NULL,
  `module13CalibrationProcedureAndTraceability` text DEFAULT NULL,
  `module13CalibrationResults` text DEFAULT NULL,
  `module13UncertaintyOfMeasurement` text DEFAULT NULL,
  `module13Remarks` text DEFAULT NULL,
  `module14CalibrationProcedureAndTraceability` text DEFAULT NULL,
  `module14CalibrationResults` text DEFAULT NULL,
  `module14UncertaintyOfMeasurement` text DEFAULT NULL,
  `module14Remarks` text DEFAULT NULL,
  `module15CalibrationProcedureAndTraceability` text DEFAULT NULL,
  `module15CalibrationResults` text DEFAULT NULL,
  `module15UncertaintyOfMeasurement` text DEFAULT NULL,
  `module15Remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pressuregaugestandarddetails`
--

CREATE TABLE `pressuregaugestandarddetails` (
  `id` int(11) NOT NULL,
  `standardDescription` varchar(255) DEFAULT NULL,
  `serialNumber` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `calibrationCertificate` varchar(255) DEFAULT NULL,
  `laboratory` varchar(255) DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `unit_Original` varchar(255) DEFAULT NULL,
  `unit_Converted` varchar(255) DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pressuregaugestandardvalues`
--

CREATE TABLE `pressuregaugestandardvalues` (
  `id` int(11) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `applied` varchar(255) DEFAULT NULL,
  `increasing` varchar(255) DEFAULT NULL,
  `decreasing` varchar(255) DEFAULT NULL,
  `mean` varchar(255) DEFAULT NULL,
  `deviation` varchar(255) DEFAULT NULL,
  `uncertainty` varchar(255) DEFAULT NULL,
  `correction` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pressuregaugetable`
--

CREATE TABLE `pressuregaugetable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referencethermohygrometer`
--

CREATE TABLE `referencethermohygrometer` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `measurements` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refractometertable`
--

CREATE TABLE `refractometertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requestsamples`
--

CREATE TABLE `requestsamples` (
  `id` int(11) NOT NULL,
  `sampleID` text DEFAULT NULL,
  `requestReferenceNumber` text DEFAULT NULL,
  `sampleCode` text DEFAULT NULL,
  `worksheetType` text DEFAULT NULL,
  `worksheetID` text DEFAULT NULL,
  `rawData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rml_table`
--

CREATE TABLE `rml_table` (
  `id` int(11) NOT NULL,
  `ccno` int(11) NOT NULL,
  `costumer` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `modelno` int(11) NOT NULL,
  `serialno` int(11) NOT NULL,
  `equipid` varchar(255) NOT NULL,
  `accuracy` varchar(255) NOT NULL,
  `range_range` varchar(255) NOT NULL,
  `measurement` varchar(255) NOT NULL,
  `graduation` varchar(255) NOT NULL,
  `readability` varchar(255) NOT NULL,
  `datereceived` varchar(255) NOT NULL,
  `datecalibrated` varchar(255) NOT NULL,
  `reccduedate` varchar(255) NOT NULL,
  `placeofcalib` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `ambtemp` varchar(255) NOT NULL,
  `relhumidity` varchar(255) NOT NULL,
  `Patm` varchar(255) NOT NULL,
  `prelimInspec` varchar(255) NOT NULL,
  `hstd` varchar(255) NOT NULL,
  `huuc` varchar(255) NOT NULL,
  `heightDifference` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `standardDescription` varchar(255) NOT NULL,
  `standardManufacturer` varchar(255) NOT NULL,
  `standardModelNumber` varchar(255) NOT NULL,
  `standardSerialNumber` varchar(255) NOT NULL,
  `dateOfNextCalibration` varchar(255) NOT NULL,
  `standardRemarks` varchar(255) NOT NULL,
  `standardAccessories` varchar(255) NOT NULL,
  `timeStarted` varchar(255) NOT NULL,
  `timeFinished` varchar(255) NOT NULL,
  `calibratedBy` varchar(255) NOT NULL,
  `checkedBy` varchar(255) NOT NULL,
  `daten` varchar(255) NOT NULL,
  `MeasurementData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`MeasurementData`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standard_balance`
--

CREATE TABLE `standard_balance` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `resolution` text DEFAULT NULL,
  `resolution2` text DEFAULT NULL,
  `conditionForResolution` text DEFAULT NULL,
  `tempCoefficient` text DEFAULT NULL,
  `uncertainty` text DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL,
  `sensitivityWeightDelta` text DEFAULT NULL,
  `uncertSensitivityWeightDelta` text DEFAULT NULL,
  `sensitivityWeight` text DEFAULT NULL,
  `uncertSensitivityWeight` text DEFAULT NULL,
  `pooledValue` text DEFAULT NULL,
  `sdValues` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sdValues`)),
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dateOfInsert` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standard_chamber`
--

CREATE TABLE `standard_chamber` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`)),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standard_currentcoil`
--

CREATE TABLE `standard_currentcoil` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `turns` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standard_gaugeblock`
--

CREATE TABLE `standard_gaugeblock` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `certificateNumber` varchar(255) NOT NULL,
  `dateOfCalibration` varchar(255) NOT NULL,
  `coverageFactor` text DEFAULT NULL,
  `calibrationProvider` text NOT NULL,
  `measurement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurement`)),
  `dateOfInsert` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standard_measurement_gaugeblock`
--

CREATE TABLE `standard_measurement_gaugeblock` (
  `id` int(11) NOT NULL,
  `standardID` text DEFAULT NULL,
  `nominalLength` text DEFAULT NULL,
  `serialNumberError` text DEFAULT NULL,
  `centLngError` text DEFAULT NULL,
  `maxLngError` text DEFAULT NULL,
  `minLngError` text DEFAULT NULL,
  `parallel` text DEFAULT NULL,
  `calResult` text DEFAULT NULL,
  `dateOfInsert` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standard_uncertainty_gaugeblock`
--

CREATE TABLE `standard_uncertainty_gaugeblock` (
  `id` int(11) NOT NULL,
  `standardID` text DEFAULT NULL,
  `rangeMin` text DEFAULT NULL,
  `rangeMax` text DEFAULT NULL,
  `uncertainty` text DEFAULT NULL,
  `errorGrade0` text DEFAULT NULL,
  `parallelismGrade0` text DEFAULT NULL,
  `errorGrade1` text DEFAULT NULL,
  `parallelismGrade1` text DEFAULT NULL,
  `errorGrade2` text DEFAULT NULL,
  `parallelismGrade2` text DEFAULT NULL,
  `dateOfInsert` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone_no` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(180) DEFAULT NULL,
  `signature` varchar(180) DEFAULT NULL,
  `position` text DEFAULT NULL,
  `role` varchar(255) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_guest`
--

CREATE TABLE `tbl_users_guest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `role` varchar(255) DEFAULT '''user'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temperaturecontrollertable`
--

CREATE TABLE `temperaturecontrollertable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` text DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temperaturerecorder`
--

CREATE TABLE `temperaturerecorder` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `channelNumber` text DEFAULT NULL,
  `testPoint` text DEFAULT NULL,
  `stdReading` text DEFAULT NULL,
  `uucReading` text DEFAULT NULL,
  `correction` text DEFAULT NULL,
  `uncertainty` text DEFAULT NULL,
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`)),
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temperaturesource`
--

CREATE TABLE `temperaturesource` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `maxInstability` text DEFAULT NULL,
  `maxAxial` text DEFAULT NULL,
  `maxRadial` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweightmaterial`
--

CREATE TABLE `testweightmaterial` (
  `id` int(11) NOT NULL,
  `material` text NOT NULL,
  `density` text NOT NULL,
  `uncertainty` text NOT NULL,
  `unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweightmpe`
--

CREATE TABLE `testweightmpe` (
  `id` int(11) NOT NULL,
  `nominalValue` text NOT NULL,
  `nominalUnit` text NOT NULL,
  `class` text NOT NULL,
  `MPE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweightpab`
--

CREATE TABLE `testweightpab` (
  `id` int(11) NOT NULL,
  `classification` text NOT NULL,
  `class` text NOT NULL,
  `instrument` text NOT NULL,
  `rangePAB` text NOT NULL,
  `cmc` text NOT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweightsensitivitytest`
--

CREATE TABLE `testweightsensitivitytest` (
  `id` int(11) NOT NULL,
  `balance` text NOT NULL,
  `empty1` text NOT NULL,
  `full1` text NOT NULL,
  `empty2` text NOT NULL,
  `full2` text NOT NULL,
  `empty3` text NOT NULL,
  `full3` text NOT NULL,
  `empty4` text NOT NULL,
  `full4` text NOT NULL,
  `empty5` text NOT NULL,
  `full5` text NOT NULL,
  `emptySD` text NOT NULL,
  `fullSD` text NOT NULL,
  `sensitivityWeight` text NOT NULL,
  `uncertSensitivityWeight` text NOT NULL,
  `maximumValue` text DEFAULT NULL,
  `minimumValue` text DEFAULT NULL,
  `differenceValue` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `resolution1` text DEFAULT NULL,
  `resolution2` text DEFAULT NULL,
  `conditionForResolution` text DEFAULT NULL,
  `sensitivityWeightDelta` text DEFAULT NULL,
  `uncertSensitivityWeightDelta` text DEFAULT NULL,
  `pooledValue` text DEFAULT NULL,
  `measurements` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweightstandarddetails`
--

CREATE TABLE `testweightstandarddetails` (
  `id` int(11) NOT NULL,
  `serialNumber` text NOT NULL,
  `certificateNumber` text NOT NULL,
  `type` text NOT NULL,
  `class` text NOT NULL,
  `prevAirDensity` text DEFAULT NULL,
  `dateOfCalibration` text NOT NULL,
  `manufacturer` text NOT NULL,
  `description` text NOT NULL,
  `issuer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweightstandardvalues`
--

CREATE TABLE `testweightstandardvalues` (
  `id` int(11) NOT NULL,
  `serialNumber` text NOT NULL,
  `class` text NOT NULL,
  `nominalValue` text NOT NULL,
  `nominalUnit` text NOT NULL,
  `marking` text NOT NULL,
  `conventionalMass` text NOT NULL,
  `unit` text NOT NULL,
  `uncertainty` text NOT NULL,
  `mpe` text DEFAULT NULL,
  `issuer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testweighttable`
--

CREATE TABLE `testweighttable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT '''true''',
  `certificateNumber` text DEFAULT NULL,
  `tsrNumber` text DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `standard` text DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`customerInfo`)),
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`equipmentInfo`)),
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`environmentInfo`)),
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dataInputs`)),
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`calculatedData`)),
  `images` text DEFAULT NULL,
  `customer` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dateReceived` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `recommendedDueDate` text DEFAULT NULL,
  `placeOfCalibration` text DEFAULT NULL,
  `equipmentDescription` text DEFAULT NULL,
  `manufacturer` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `Class` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `equipmentID` text DEFAULT NULL,
  `approxClass` text DEFAULT NULL,
  `cycle` text DEFAULT NULL,
  `standardDescription` text DEFAULT NULL,
  `accessories` text DEFAULT NULL,
  `maker` text DEFAULT NULL,
  `classStandard` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `serialNumberStandard` text DEFAULT NULL,
  `dateOfNextCalib` text DEFAULT NULL,
  `timeStart` text DEFAULT NULL,
  `timeFinished` text DEFAULT NULL,
  `calibrationOfficer` text DEFAULT NULL,
  `checkedBy` text DEFAULT NULL,
  `verifierPosition` text DEFAULT NULL,
  `dateCalibratedBy` text DEFAULT NULL,
  `dateCheckedBy` text DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `calibrationProcedureAndTraceabilityNot` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingRemarks1` longtext DEFAULT NULL,
  `allData` longtext DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermochamber`
--

CREATE TABLE `thermochamber` (
  `id` int(11) NOT NULL,
  `unit` text DEFAULT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `inhomogeneity` text NOT NULL,
  `Instability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermohygrometertable`
--

CREATE TABLE `thermohygrometertable` (
  `id` int(11) NOT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `standard` varchar(255) DEFAULT NULL,
  `customerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `equipmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `environmentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dataInputs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `calculatedData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibrationOfficer` varchar(255) DEFAULT NULL,
  `checkedBy` varchar(255) DEFAULT NULL,
  `verifierPosition` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` varchar(255) DEFAULT NULL,
  `calibratorAccountID` varchar(255) DEFAULT NULL,
  `verifierEmail` varchar(255) DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermostandarddrift`
--

CREATE TABLE `thermostandarddrift` (
  `id` int(11) NOT NULL,
  `serialNumber` text NOT NULL,
  `unit` text NOT NULL,
  `dateCalibrated` text NOT NULL,
  `testPoint` text NOT NULL,
  `testPointValue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermostandarddriftprt`
--

CREATE TABLE `thermostandarddriftprt` (
  `id` int(11) NOT NULL,
  `serialNumber` text NOT NULL,
  `testPoint` text NOT NULL,
  `previousTest` text NOT NULL,
  `currentTest` text NOT NULL,
  `drift` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermostandardtable`
--

CREATE TABLE `thermostandardtable` (
  `id` int(11) NOT NULL,
  `standard` text NOT NULL,
  `manufacturer` text NOT NULL,
  `modelNumber` text NOT NULL,
  `serialNumber` text NOT NULL,
  `certificateNumber` text NOT NULL,
  `dateOfCali` text NOT NULL,
  `dateOfNextCali` text NOT NULL,
  `standardUsed` text NOT NULL,
  `stdResolutionTemp` text DEFAULT NULL,
  `stdResolutionRH` text DEFAULT NULL,
  `issuingLab` text NOT NULL,
  `coverageFactor` text DEFAULT NULL,
  `status` text DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermostandardtestpoints`
--

CREATE TABLE `thermostandardtestpoints` (
  `id` int(11) NOT NULL,
  `serialNumber` text NOT NULL,
  `testPoint` text NOT NULL,
  `unit` text NOT NULL,
  `RML` text NOT NULL,
  `NML` text NOT NULL,
  `correction` text NOT NULL,
  `readoutStandardUncertaintyFromCertificate` varchar(255) NOT NULL DEFAULT '''0.00''',
  `uncertainty` text NOT NULL,
  `previousRML` text DEFAULT NULL,
  `drift` text DEFAULT NULL,
  `range` text DEFAULT NULL,
  `res` text DEFAULT NULL,
  `readability` text DEFAULT NULL,
  `coverageFactor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thermotable`
--

CREATE TABLE `thermotable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT '''true''',
  `certificateNumber` text DEFAULT NULL,
  `customer` text NOT NULL,
  `address` text NOT NULL,
  `dateReceived` text NOT NULL,
  `dateCalibrated` text NOT NULL,
  `recommendedDueDate` text NOT NULL,
  `dateOfIssue` varchar(255) DEFAULT NULL,
  `placeOfCalibration` text NOT NULL,
  `equipmentDescription` text NOT NULL,
  `manufacturer` text NOT NULL,
  `modelNumber` text NOT NULL,
  `serialNumber` text NOT NULL,
  `equipmentID` text NOT NULL,
  `typeOfEquipment` text DEFAULT NULL,
  `startTemp` text NOT NULL,
  `endTemp` text NOT NULL,
  `startRh` text NOT NULL,
  `endRh` text NOT NULL,
  `ambTemp` text NOT NULL,
  `ambRh` text NOT NULL,
  `standardAndAccessories` text DEFAULT NULL,
  `selectedChamber` text DEFAULT NULL,
  `premA` text DEFAULT NULL,
  `premB` text DEFAULT NULL,
  `premC` text DEFAULT NULL,
  `premD` text DEFAULT NULL,
  `tableTempIn` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tableTempIn`)),
  `tableTempInRange` text DEFAULT NULL,
  `tableTempInResGrad` text DEFAULT NULL,
  `tableTempInReadability` text DEFAULT NULL,
  `tableTempOut` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tableTempOut`)),
  `tableTempOutRange` text DEFAULT NULL,
  `tableTempOutResGrad` text DEFAULT NULL,
  `tableTempOutReadability` text DEFAULT NULL,
  `tableRH` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tableRH`)),
  `tableRHRange` text DEFAULT NULL,
  `tableRHResGrad` text DEFAULT NULL,
  `tableRHReadability` text DEFAULT NULL,
  `tableRNOut` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tableRNOut`)),
  `tableRNOutRange` text DEFAULT NULL,
  `tableRNOutResGrad` text DEFAULT NULL,
  `tableRNOutReadability` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `remarksA` text DEFAULT NULL,
  `calibrationOfficer` text NOT NULL,
  `checkedBy` text NOT NULL,
  `verifierPosition` text NOT NULL,
  `image` text DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingRemarks1` longtext DEFAULT NULL,
  `inputtedArrayTempIn` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inputtedArrayTempIn`)),
  `inputtedArrayTempOut` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inputtedArrayTempOut`)),
  `inputtedArrayRHIn` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inputtedArrayRHIn`)),
  `inputtedArrayRHOunt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inputtedArrayRHOunt`)),
  `datas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`datas`)),
  `customDecimalPlace` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `completion` varchar(255) DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp(),
  `standard` text DEFAULT NULL,
  `chamber` text DEFAULT NULL,
  `customerInfo` longtext DEFAULT NULL,
  `equipmentInfo` longtext DEFAULT NULL,
  `environmentInfo` longtext DEFAULT NULL,
  `dataInputs` longtext DEFAULT NULL,
  `calculatedData` longtext DEFAULT NULL,
  `images` text DEFAULT NULL,
  `settingMeasurementCondition` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timer_standard`
--

CREATE TABLE `timer_standard` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `serialNumber` text NOT NULL,
  `certificateNumber` text NOT NULL,
  `calibrationProvider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verifier`
--

CREATE TABLE `verifier` (
  `verifier_id` int(11) NOT NULL,
  `verifierName` text DEFAULT NULL,
  `verifierPosition` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `weighingscaletable`
--

CREATE TABLE `weighingscaletable` (
  `id` int(11) NOT NULL,
  `tsrID` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `customer` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dateReceived` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `recommendedDueDate` text DEFAULT NULL,
  `placeOfCalibration` text DEFAULT NULL,
  `standardUsed` text DEFAULT NULL,
  `premA` text DEFAULT NULL,
  `premB` text DEFAULT NULL,
  `premC` text DEFAULT NULL,
  `premD` text DEFAULT NULL,
  `premE` text DEFAULT NULL,
  `premF` text DEFAULT NULL,
  `premG` text DEFAULT NULL,
  `illustration` text DEFAULT NULL,
  `calibrationOfficer` text DEFAULT NULL,
  `checkedBy` text DEFAULT NULL,
  `verifierPosition` text DEFAULT NULL,
  `specificationData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`specificationData`)),
  `environmentData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`environmentData`)),
  `spanCalibrationData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`spanCalibrationData`)),
  `sensitivityTestData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sensitivityTestData`)),
  `eccentricityTestData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`eccentricityTestData`)),
  `linearityTestData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`linearityTestData`)),
  `repeatabilityTestData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`repeatabilityTestData`)),
  `calculatedValuesData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`calculatedValuesData`)),
  `standard` text DEFAULT NULL,
  `customerInfo` longtext DEFAULT NULL,
  `equipmentInfo` longtext DEFAULT NULL,
  `environmentInfo` longtext DEFAULT NULL,
  `dataInputs` longtext DEFAULT NULL,
  `calculatedData` longtext DEFAULT NULL,
  `images` text DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL,
  `calibrationProcedureAndTraceabilityNot` longtext DEFAULT NULL,
  `settingUncertaintyOfMeasurement` longtext DEFAULT NULL,
  `settingCalibrationResults` longtext DEFAULT NULL,
  `settingRemarks` longtext DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `dateOfIssue` text DEFAULT NULL,
  `completion` text DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `dateTimeCalibrated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wirelesstemperaturelogger`
--

CREATE TABLE `wirelesstemperaturelogger` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `dateOfCalibration` text DEFAULT NULL,
  `channelNumber` text DEFAULT NULL,
  `testPoint` text DEFAULT NULL,
  `stdReading` text DEFAULT NULL,
  `uucReading` text DEFAULT NULL,
  `correction` text DEFAULT NULL,
  `uncertainty` text DEFAULT NULL,
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balancestandard`
--
ALTER TABLE `balancestandard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barometerstandard`
--
ALTER TABLE `barometerstandard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buffersolutionstandard`
--
ALTER TABLE `buffersolutionstandard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buffersolutionstandardvalues`
--
ALTER TABLE `buffersolutionstandardvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calipertable`
--
ALTER TABLE `calipertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmc`
--
ALTER TABLE `cmc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digitalthermometertable`
--
ALTER TABLE `digitalthermometertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digitaltimerstandard`
--
ALTER TABLE `digitaltimerstandard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digitaltimerstandardvalues`
--
ALTER TABLE `digitaltimerstandardvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digitaltimertable`
--
ALTER TABLE `digitaltimertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentingprocesscalibratorstandard`
--
ALTER TABLE `documentingprocesscalibratorstandard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentingprocesscalibratorstandardvalues`
--
ALTER TABLE `documentingprocesscalibratorstandardvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electricalmetertable`
--
ALTER TABLE `electricalmetertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electronicbalancetable`
--
ALTER TABLE `electronicbalancetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elect_table_1`
--
ALTER TABLE `elect_table_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elect_table_2`
--
ALTER TABLE `elect_table_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elect_table_3`
--
ALTER TABLE `elect_table_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enclosuretable`
--
ALTER TABLE `enclosuretable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glasswaretable`
--
ALTER TABLE `glasswaretable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagetable`
--
ALTER TABLE `imagetable`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pabconditions`
--
ALTER TABLE `pabconditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phmetertable`
--
ALTER TABLE `phmetertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ph_meter_standard`
--
ALTER TABLE `ph_meter_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placeholders`
--
ALTER TABLE `placeholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pressuregaugestandarddetails`
--
ALTER TABLE `pressuregaugestandarddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pressuregaugestandardvalues`
--
ALTER TABLE `pressuregaugestandardvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pressuregaugetable`
--
ALTER TABLE `pressuregaugetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencethermohygrometer`
--
ALTER TABLE `referencethermohygrometer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refractometertable`
--
ALTER TABLE `refractometertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestsamples`
--
ALTER TABLE `requestsamples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rml_table`
--
ALTER TABLE `rml_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_balance`
--
ALTER TABLE `standard_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_chamber`
--
ALTER TABLE `standard_chamber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_currentcoil`
--
ALTER TABLE `standard_currentcoil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_gaugeblock`
--
ALTER TABLE `standard_gaugeblock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_measurement_gaugeblock`
--
ALTER TABLE `standard_measurement_gaugeblock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_uncertainty_gaugeblock`
--
ALTER TABLE `standard_uncertainty_gaugeblock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_guest`
--
ALTER TABLE `tbl_users_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperaturecontrollertable`
--
ALTER TABLE `temperaturecontrollertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperaturerecorder`
--
ALTER TABLE `temperaturerecorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperaturesource`
--
ALTER TABLE `temperaturesource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweightmaterial`
--
ALTER TABLE `testweightmaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweightmpe`
--
ALTER TABLE `testweightmpe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweightpab`
--
ALTER TABLE `testweightpab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweightsensitivitytest`
--
ALTER TABLE `testweightsensitivitytest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweightstandarddetails`
--
ALTER TABLE `testweightstandarddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweightstandardvalues`
--
ALTER TABLE `testweightstandardvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testweighttable`
--
ALTER TABLE `testweighttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermochamber`
--
ALTER TABLE `thermochamber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermohygrometertable`
--
ALTER TABLE `thermohygrometertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermostandarddrift`
--
ALTER TABLE `thermostandarddrift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermostandarddriftprt`
--
ALTER TABLE `thermostandarddriftprt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermostandardtable`
--
ALTER TABLE `thermostandardtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermostandardtestpoints`
--
ALTER TABLE `thermostandardtestpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermotable`
--
ALTER TABLE `thermotable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timer_standard`
--
ALTER TABLE `timer_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifier`
--
ALTER TABLE `verifier`
  ADD PRIMARY KEY (`verifier_id`);

--
-- Indexes for table `weighingscaletable`
--
ALTER TABLE `weighingscaletable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wirelesstemperaturelogger`
--
ALTER TABLE `wirelesstemperaturelogger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balancestandard`
--
ALTER TABLE `balancestandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barometerstandard`
--
ALTER TABLE `barometerstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buffersolutionstandard`
--
ALTER TABLE `buffersolutionstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buffersolutionstandardvalues`
--
ALTER TABLE `buffersolutionstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calipertable`
--
ALTER TABLE `calipertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmc`
--
ALTER TABLE `cmc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalthermometertable`
--
ALTER TABLE `digitalthermometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitaltimerstandard`
--
ALTER TABLE `digitaltimerstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitaltimerstandardvalues`
--
ALTER TABLE `digitaltimerstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitaltimertable`
--
ALTER TABLE `digitaltimertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentingprocesscalibratorstandard`
--
ALTER TABLE `documentingprocesscalibratorstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentingprocesscalibratorstandardvalues`
--
ALTER TABLE `documentingprocesscalibratorstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electricalmetertable`
--
ALTER TABLE `electricalmetertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electronicbalancetable`
--
ALTER TABLE `electronicbalancetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elect_table_1`
--
ALTER TABLE `elect_table_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elect_table_2`
--
ALTER TABLE `elect_table_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elect_table_3`
--
ALTER TABLE `elect_table_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enclosuretable`
--
ALTER TABLE `enclosuretable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glasswaretable`
--
ALTER TABLE `glasswaretable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagetable`
--
ALTER TABLE `imagetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiproductcalibratorstandard`
--
ALTER TABLE `multiproductcalibratorstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiproductcalibratorstandardvalues`
--
ALTER TABLE `multiproductcalibratorstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pabconditions`
--
ALTER TABLE `pabconditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phmetertable`
--
ALTER TABLE `phmetertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ph_meter_standard`
--
ALTER TABLE `ph_meter_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placeholders`
--
ALTER TABLE `placeholders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pressuregaugestandarddetails`
--
ALTER TABLE `pressuregaugestandarddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pressuregaugestandardvalues`
--
ALTER TABLE `pressuregaugestandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pressuregaugetable`
--
ALTER TABLE `pressuregaugetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referencethermohygrometer`
--
ALTER TABLE `referencethermohygrometer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refractometertable`
--
ALTER TABLE `refractometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestsamples`
--
ALTER TABLE `requestsamples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rml_table`
--
ALTER TABLE `rml_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_balance`
--
ALTER TABLE `standard_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_chamber`
--
ALTER TABLE `standard_chamber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_currentcoil`
--
ALTER TABLE `standard_currentcoil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_gaugeblock`
--
ALTER TABLE `standard_gaugeblock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_measurement_gaugeblock`
--
ALTER TABLE `standard_measurement_gaugeblock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_uncertainty_gaugeblock`
--
ALTER TABLE `standard_uncertainty_gaugeblock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users_guest`
--
ALTER TABLE `tbl_users_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temperaturecontrollertable`
--
ALTER TABLE `temperaturecontrollertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temperaturerecorder`
--
ALTER TABLE `temperaturerecorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temperaturesource`
--
ALTER TABLE `temperaturesource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweightmaterial`
--
ALTER TABLE `testweightmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweightmpe`
--
ALTER TABLE `testweightmpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweightpab`
--
ALTER TABLE `testweightpab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweightsensitivitytest`
--
ALTER TABLE `testweightsensitivitytest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweightstandarddetails`
--
ALTER TABLE `testweightstandarddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweightstandardvalues`
--
ALTER TABLE `testweightstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testweighttable`
--
ALTER TABLE `testweighttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermochamber`
--
ALTER TABLE `thermochamber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermohygrometertable`
--
ALTER TABLE `thermohygrometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermostandarddrift`
--
ALTER TABLE `thermostandarddrift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermostandarddriftprt`
--
ALTER TABLE `thermostandarddriftprt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermostandardtable`
--
ALTER TABLE `thermostandardtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermostandardtestpoints`
--
ALTER TABLE `thermostandardtestpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermotable`
--
ALTER TABLE `thermotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timer_standard`
--
ALTER TABLE `timer_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifier`
--
ALTER TABLE `verifier`
  MODIFY `verifier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weighingscaletable`
--
ALTER TABLE `weighingscaletable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wirelesstemperaturelogger`
--
ALTER TABLE `wirelesstemperaturelogger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
