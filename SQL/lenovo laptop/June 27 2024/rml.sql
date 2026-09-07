-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 02:32 AM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `tel`, `email`, `url`) VALUES
(1, '+63 49 536-8091', 'rml4a@yahoo.com / dost4a.rml@gmail.com', 'http://region4a.dost.gov.ph');

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

--
-- Dumping data for table `balancestandard`
--

INSERT INTO `balancestandard` (`id`, `balance`, `description`, `certificateNumber`, `provider`, `empty1`, `full1`, `empty2`, `full2`, `empty3`, `full3`, `empty4`, `full4`, `empty5`, `full5`, `emptySD`, `fullSD`, `nominalEmpty`, `nominalFull`, `sensitivityWeight`, `uncertSensitivityWeight`, `maximumValue`, `minimumValue`, `differenceValue`, `dateCalibrated`, `resolution1`, `resolution2`, `conditionForResolution`, `sensitivityWeightDelta`, `uncertSensitivityWeightDelta`, `pooledValue`, `measurements`) VALUES
(1, 'XPE2006 DR', 'Semi-Micro Balance', NULL, NULL, '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '', '', '0.0100032', '0.0000013', '0.00021', '-0.00024', '0.00045', '2022-10-05', '0.00001', '0.000005', '81', '0.00004000000000026205', '0.000017888543820115508', '0.0000053', ''),
(2, 'MCM2004', NULL, NULL, NULL, '0.0019000', '2000.00280', '0.0020000', '2000.00300', '0.0020000', '2000.00310', '0.0019000', '2000.00300', '0.0018000', '2000.00300', '0.0000836660026534076', '0.0001095445114735353', NULL, NULL, '0.002018', '0.12', '0.001', '-0.001', '0.002', '', '0.0001', '', '', '0.0001095445114735353', '0.000048989794843366115', '0.000214249', NULL),
(3, 'MCM60K3', NULL, NULL, NULL, '0.4980000', '50000.67800', '0.4940000', '50000.67800', '0.4940000', '50000.68400', '0.4920000', '50000.68200', '0.4940000', '50000.68600', '0.002190890230020666', '0.003577708764728539', NULL, NULL, '0.500057', '0.08', '0.096', '-0.334', '0.43000000000000005', '2021-04-01', '0.001', '', '', '0.003577708764728539', '0.0016000000003259629', '0.010835326', NULL),
(5, 'MCM2004 - 2023 1st Quarter', NULL, NULL, NULL, '0.0201', '2000.0148', '0.0197', '2000.0151', '0.0199', '2000.0151', '0.0199', '2000.0151', '0.0198', '2000.0154', '0.0001483239697419134', '0.00021213203438310348', NULL, NULL, '0.019993', '0.000015', '', '', '', '2022-10-05', '0.0001', '', '', '0.00021213203438310348', '0.0000948683298171884', '0.00076', NULL),
(6, 'MCM60K3 - 2023 2nd Quarter', NULL, NULL, NULL, '0.492', '50000.512', '0.500', '50000.498', '0.492', '50000.494', '0.498', '50000.524', '0.502', '50000.494', '0.004604345773288539', '0.013221195104827646', '', '', '0.500011', '0.0000013', '', '', '', '2022-04-28', '', '', '', '-0.5044000', '0.0059127', '0.0017', ''),
(7, 'MCM60K3 - 2022_4th Quarter', NULL, NULL, NULL, '0.496', '50000.074', '0.492', '50000.056', '0.488', '50000.088', '0.502', '50000.052', '0.508', '50000.092', '0.007949842765740723', '0.01813284313031058', NULL, NULL, '0.500076', '0.000040', '', '', '', '2022-10-05', '', '', '', '0.01813284313031058', '0.008109253972942907', '0.00324', NULL),
(8, 'MCM2004- 2023_1st Quarter', NULL, NULL, NULL, '0.0201', '2000.0148', '0.0197', '2000.0151', '0.0199', '2000.0151', '0.0199', '2000.0151', '0.0198', '2000.0154', '0.0001483239697419134', '0.00021213203438310348', NULL, NULL, '0.019993', '0.000015', '', '', '', '', '0.0001', '', '', '0.00021213203438310348', '0.0000948683298171884', '0.00076', NULL),
(9, 'MCM60K3 -2023 1st Quarter', NULL, NULL, NULL, '0.500', '50000.792', '0.496', '50000.784', '0.498', '50000.808', '0.496', '50000.776', '0.492', '50000.818', '0.0029664793948382677', '0.017227884373721882', NULL, NULL, '0.500076', '0.000040', '', '', '', '2023-01-26', '0.002', '', '', '0.017227884373721882', '0.0077045441136297035', '0.001661', '[{\"measurementNumber\":\"112\",\"testLoad\":\"112\",\"indication\":\"121\",\"error\":\"212\",\"uncertaintyMeasurement\":\"121\"}]'),
(10, 'MCM2004 - 2023 2nd Quarter', '', '', '', '0.0201', '2000.0254', '0.0200', '2000.0257', '0.0199', '2000.0252', '0.0200', '2000.0252', '0.0199', '2000.0255', '0.000083666', '0.0002121', '', '', '0.020005', '0.000015', '', '', 'NaN', '2023-06-21', '0.0001', '', '', '-0.0254000', '0.0000949', '0.0000312971459', '[]'),
(11, 'MCM60K3 - 2023 2nd Quarter ', '', '', '', '0.492', '50000.512', '0.500', '50000.498', '0.492', '50000.494', '0.498', '50000.524', '0.502', '50000.494', '0.004604346', '0.0132212', '', '', '0.500011', '0.000040', '', '', '', '2023-06-28', '0.002', '', '', '-0.5044000', '0.0059127', '0.0017464470961', '[]'),
(12, 'XPE2006 DR - RESOLUTION 0.00001', 'Semi-Micro Balance', '', '', '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '', '', '0.0100032', '0.0000013', '0.00021', '-0.00024', '0.00045', '2022-10-05', '0.00001', '', '', '0.00004000000000026205', '0.000017888543820115508', '0.0000053', '[{\"measurementNumber\":\"1\",\"testLoad\":\"0.010002\",\"indication\":\"0.010005\",\"error\":\"0.000003\",\"uncertaintyMeasurement\":\"0.000035\"},{\"measurementNumber\":\"2\",\"testLoad\":\"0.100006\",\"indication\":\"0.100005\",\"error\":\"-0.000001\",\"uncertaintyMeasurement\":\"0.000037\"},{\"measurementNumber\":\"3\",\"testLoad\":\"0.500010\",\"indication\":\"0.500000\",\"error\":\"-0.000010\",\"uncertaintyMeasurement\":\"0.000039\"},{\"measurementNumber\":\"4\",\"testLoad\":\"0.999995\",\"indication\":\"1.000000\",\"error\":\"0.000005\",\"uncertaintyMeasurement\":\"0.000041\"},{\"measurementNumber\":\"5\",\"testLoad\":\"4.999987\",\"indication\":\"4.999985\",\"error\":\"-0.000002\",\"uncertaintyMeasurement\":\"0.000051\"},{\"measurementNumber\":\"6\",\"testLoad\":\"10.000001\",\"indication\":\"9.999985\",\"error\":\"-0.000016\",\"uncertaintyMeasurement\":\"0.00008\"},{\"measurementNumber\":\"7\",\"testLoad\":\"19.999987\",\"indication\":\"19.999965\",\"error\":\"-0.000021\",\"uncertaintyMeasurement\":\"0.00010\"},{\"measurementNumber\":\"8\",\"testLoad\":\"50.000000\",\"indication\":\"50.000070\",\"error\":\"0.000070\",\"uncertaintyMeasurement\":\"0.00012\"},{\"measurementNumber\":\"9\",\"testLoad\":\"79.999987\",\"indication\":\"79.999965\",\"error\":\"-0.000022\",\"uncertaintyMeasurement\":\"0.00021\"},{\"measurementNumber\":\"10\",\"testLoad\":\"99.999970\",\"indication\":\"100.00017\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00017\"},{\"measurementNumber\":\"11\",\"testLoad\":\"119.999956\",\"indication\":\"120.00012\",\"error\":\"0.00016\",\"uncertaintyMeasurement\":\"0.00023\"},{\"measurementNumber\":\"12\",\"testLoad\":\"149.999970\",\"indication\":\"150.00019\",\"error\":\"0.00022\",\"uncertaintyMeasurement\":\"0.00026\"},{\"measurementNumber\":\"13\",\"testLoad\":\"209.999871\",\"indication\":\"210.00007\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00035\"}]'),
(13, 'XPE2006 DR - RESOLUTION 0.000005', 'Semi-Micro Balance', '008648 D-K-15035-01-00 2022-06', 'NML (Philippines)', '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '', '', '0.0100032', '0.0000013', '0.00021', '-0.00024', '0.00045', '2022-06-27', '0.000005', '', '', '0.00004000000000026205', '0.000017888543820115508', '0.0000053', '[{\"measurementNumber\":\"1\",\"testLoad\":\"0.010002\",\"indication\":\"0.010005\",\"error\":\"0.000003\",\"uncertaintyMeasurement\":\"0.000035\"},{\"measurementNumber\":\"2\",\"testLoad\":\"0.100006\",\"indication\":\"0.100005\",\"error\":\"-0.000001\",\"uncertaintyMeasurement\":\"0.000037\"},{\"measurementNumber\":\"3\",\"testLoad\":\"0.500010\",\"indication\":\"0.500000\",\"error\":\"-0.000010\",\"uncertaintyMeasurement\":\"0.000039\"},{\"measurementNumber\":\"4\",\"testLoad\":\"0.999995\",\"indication\":\"1.000000\",\"error\":\"0.000005\",\"uncertaintyMeasurement\":\"0.000041\"},{\"measurementNumber\":\"5\",\"testLoad\":\"4.999987\",\"indication\":\"4.999985\",\"error\":\"-0.000002\",\"uncertaintyMeasurement\":\"0.000051\"},{\"measurementNumber\":\"6\",\"testLoad\":\"10.000001\",\"indication\":\"9.999985\",\"error\":\"-0.000016\",\"uncertaintyMeasurement\":\"0.00008\"},{\"measurementNumber\":\"7\",\"testLoad\":\"19.999987\",\"indication\":\"19.999965\",\"error\":\"-0.000021\",\"uncertaintyMeasurement\":\"0.00010\"},{\"measurementNumber\":\"8\",\"testLoad\":\"50.000000\",\"indication\":\"50.000070\",\"error\":\"0.000070\",\"uncertaintyMeasurement\":\"0.00012\"},{\"measurementNumber\":\"9\",\"testLoad\":\"79.999987\",\"indication\":\"79.999965\",\"error\":\"-0.000022\",\"uncertaintyMeasurement\":\"0.00021\"},{\"measurementNumber\":\"10\",\"testLoad\":\"99.999970\",\"indication\":\"100.00017\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00017\"},{\"measurementNumber\":\"11\",\"testLoad\":\"119.999956\",\"indication\":\"120.00012\",\"error\":\"0.00016\",\"uncertaintyMeasurement\":\"0.00023\"},{\"measurementNumber\":\"12\",\"testLoad\":\"149.999970\",\"indication\":\"150.00019\",\"error\":\"0.00022\",\"uncertaintyMeasurement\":\"0.00026\"},{\"measurementNumber\":\"13\",\"testLoad\":\"209.999871\",\"indication\":\"210.00007\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00035\"}]'),
(14, 'MCM60K3 - 2023 2nd Quarter - 1', '', '', '', '0.492', '50000.512', '0.500', '50000.498', '0.492', '50000.494', '0.498', '50000.524', '0.502', '50000.494', '0.004604345773288539', '0.013221195104827646', '', '', '0.0059127', '0.000040', '', '', '', '2023-08-30', '0.002', '', '', '-0.5044000', '0.005912698199636415', '0.0017464470961072', NULL),
(15, 'MCM2004 - 2023 3rd Quarter', '', '', '', '0.0194', '2000.0204', '0.0194', '2000.0207', '0.0193', '2000.0210', '0.0193', '2000.0211', '0.0193', '2000.0210', '0.000054772', '0.0002881', '', '', '0.020007', '0.000015', '', '', '', '2023-08-28', '0.0001', '', '', '-0.0208400', '0.0001288', '0.00003', ''),
(16, 'MCM60K3 - 2023 3rd Quarter', '', '', '', '0.492', '49999.850', '0.490', '49999.849', '0.492', '49999.844', '0.490', '49999.844', '0.500', '49999.840', '0.004147288270665548', '0.004098780308017689', '', '', '0.500010', '0.000040', '', '', '', '2023-10-06', '0.002', '', '', '0.0072000', '0.0018547', '0.0017464470961072', ''),
(17, 'sample', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.000001', '', '', '', '', '', '[]'),
(18, 'MCM2004 - 2023 2nd Sem', '', '', '', '0.0194', '2000.0204', '0.0194', '2000.0207', '0.0193', '2000.0210', '0.0193', '2000.0211', '0.0193', '2000.0210', '0.000054772255750516275', '0.00028809720574544034', '', '', '0.020007', '0.000015', '', '', '', '', '0.0001', '', '', '-0.0208400', '0.0001288409872349095', '0.00003', ''),
(19, 'MCM60K3 - 2023 2nd Sem', '', '', '', '0.492', '49999.850', '0.490', '49999.849', '0.492', '49999.844', '0.490', '49999.844', '0.500', '49999.840', '0.004147288270665548', '0.004098780308017689', '', '', '0.50001', '0.000040', '', '', '', '', '0.002', '', '', '0.0072000', '0.0018547236990991423', '0.0017464470961', ''),
(20, 'MCM60K3 - 2024 1st SEM', '', '', '', '0.488', '49999.322', '0.502', '49999.332', '0.502', '49999.334', '0.502', '49999.338', '0.504', '49999.338', '0.006542170893518457', '0.0065726706914010224', '', '', '0.5000730', '0.000040', '', '', '', '', '0.002', '', '', '0.6672000', '0.0029393876919386456', '0.00542443697276789', NULL),
(21, 'MCM2004 - 2024 1st SEM', '', '', '', '0.0199', '2000.0214', '0.0197', '2000.0216', '0.0199', '2000.0215', '0.0198', '2000.0216', '0.0198', '2000.0219', '0.00008366600265340829', '0.00018708286929173542', '', '', '0.020007', '0.000015', '', '', '', '', '0.0001', '', '', '-0.0216000', '0.0000837', '0.0000204014291833271', ''),
(22, 'XPE2006 DR - 2024 1st SEM', '', '', '', '0.009990', '199.99997', '0.009985', '199.99995', '0.009995', '199.99991', '0.009995', '199.99994', '0.009995', '199.99994', '0.000004472135954999398', '0.000021679483386383195', '', '', '0.010003', '0.0000013', '0.00021', '-0.00024', '0.00045', '', '0.0001', '', '', '0.0000580', '0.000010', '0.0000221878883', '');

-- --------------------------------------------------------

--
-- Table structure for table `barometerstandard`
--

CREATE TABLE `barometerstandard` (
  `id` int(11) NOT NULL,
  `serialNumber` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `resolution` text DEFAULT NULL,
  `uncertaintyHPA` text DEFAULT NULL,
  `uncertaintyRH` text DEFAULT NULL,
  `uncertaintyTEMPAIR` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barometerstandard`
--

INSERT INTO `barometerstandard` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `resolution`, `uncertaintyHPA`, `uncertaintyRH`, `uncertaintyTEMPAIR`, `status`) VALUES
(1, 'A17110063', 'PICL2022-02D-052 / PICL2022-01C-061 / PICL2022-03D-017', 'Digital Barometer', 'DOST-PAGASA', '0.1', '0.78', '1.7', '0.6', 'active'),
(2, 'A17110002', 'PICL2022-01-004 / PICL2021-03-265 / PICL2021-07-096', 'Digital Barometer', 'DOST-PAGASA', '0.1', '0.59', '0.24', '1.6', 'active');

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

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`id`, `customer`, `address`) VALUES
(11, 'J Emmanuel Pastries ', 'Naga cam Sur'),
(13, 'National Fisheries Research and Development Institute - Fresh Water Fisheries Research and Development Center', 'Butong, Taal, Batangas'),
(14, 'Alpha Lab Calamba Philippines Corporation', 'LTO Road, Barangay Real, Calamba City, Laguna'),
(15, 'Carlos Superdrug - Central Office and Warehouse', 'Maharlika Hi-way, Brgy. Ibabang Dupay, Red-V, Lucena City, Quezon'),
(18, 'Nadel Food Products', '249 Brgy. Talangan, Nagcarlan'),
(19, 'Bal Asia, Inc.', 'Brgy. Dayap, Calauan, Laguna'),
(20, 'Carlos Superdrug - Campo Branch', 'Dona Aurora Blvd., Gulang gulang, Lucena City, Quezon'),
(21, 'Carlos Superdrug - Sariaya Branch', 'Gen. Luna St. Cor. Rodriguez St. Poblacion 2, Sariaya, Quezon'),
(22, 'Carlos Superdrug - Atimonan Branch', '1495 Manuel L. Quezon St., Brgy. Zone IV, Poblacion, Atimonan, Quezon'),
(23, 'Acculab Calibration Laboratory', 'B3  Unit 419 Chateau Verde Condominium Gate 2, Valle Verde I, E. Rodriguez Jr., Ave., Pasig City'),
(24, 'Adtek Enterprise Inc.', 'Mamatid Rd. Bargy Banlic, Cabuyao City, Laguna'),
(25, 'Al-Safex', '0820 Britain St. Better Living Subd. Isabang, Lucena City'),
(26, 'Aristorenas Enterprise', '3 Hari Street Barangay Market Area, Sta. Rosa City, Laguna'),
(27, 'Baby Melani Gimena', '#018 J.P. Rizal Street., Brgy. Quisao, Pililla, Rizal'),
(28, 'Batangas Egg Producers Cooperative', 'Brgy. Don Luis, San Jose, Batangas'),
(29, 'BSFil Technologies, Inc.', 'Brgy. Dayap, Calauan, Laguna'),
(30, 'BSFil Technologies, Inc. - Pulilan Plant', 'Ochoa St. Brgy.Tenejero, Pulilan, Bulacan'),
(31, 'Calamba 5M Foods Corp. - Max’s SM Calamba', '2/F Max’s Restaurant SM City Calamba, Brgy. Real, Calamba City, Laguna'),
(32, 'Carlos Superdrug - Allarey Branch', '20 M.S. Enverga Cor., Allarey St., Lucena City, Quezon'),
(34, 'Carlos Superdrug - Cabana Branch Branch', 'Quezon Ave., Cor., Cabana Sts., Brgy. IV, Lucena City, Quezon'),
(35, ' Carlos Superdrug - Calauag Branch', 'Arguelles Cor., Quezon St., Brgy V Poblacion, Calauag, Quezon'),
(37, ' Carlos Superdrug - Candelaria 2 Branch', 'Rizal St., Maharlika Highway, Pob., Candelaria, Quezon'),
(38, 'Carlos Superdrug - Catanauan Branch', 'Quezon Ave., Cor. Bonifacio St., Catanauan, Quezon'),
(40, 'Carlos Superdrug - CM Recto Branch', 'CM Recto St., Brgy. 6, Lucena City, Quezon'),
(41, '  Carlos Superdrug - Evangelista Branch', 'Quezon Avenue Corner Evangelista St., Brgy. VII, Lucena City'),
(42, ' Carlos Superdrug - Gumaca 2 Branch', 'A. Bonifacio St., Brgy. Tabing Dagat, Gumaca, Quezon'),
(43, 'Carlos Superdrug - Gumaca 1 Branch', 'A. Bonifacio cor. Tanada St., Brgy. San Diego Pob., Gumaca, Quezon'),
(44, 'Carlos Superdrug - Isabang Town Center Branch', 'G/F Isabang Town Center, Brgy. Isabang, Tayabas City'),
(45, 'Carlos Superdrug - Iyam Branch', 'Maharlika Highway, Brgy. Isabang, Lucena City, Quezon'),
(46, 'Carlos Superdrug - La Suerte Branch', 'Maharlika Highway. Brgy. Alupaye, Pabilao, Quezon'),
(47, 'Carlos Superdrug - Lucban Market Branch', 'A. Racelis Ave. Cor. Gen Lucban Sts., Lucban, Quezon'),
(48, 'Carlos Superdrug - Lucban QA Branch', 'Quezon Ave. Cor. Don V. Cadelina St., Lucban, Quezon'),
(49, 'Carlos Superdrug - Luisiana Branch', 'Estrellado St., Zone VIII, Luisiana, Laguna'),
(50, ' Carlos Superdrug - Merchan Branch', 'Merchan Cor., Rizal Sts., Brgy. VI, Lucena City, Quezon'),
(51, 'Carlos Superdrug - Pacific Mall Branch', 'G/F Pacific Mall, M.L Tagarao St., Brgy. III, Lucena City'),
(52, 'Carlos Superdrug - QMC Branch', 'Quezon Ave., cor. Valdeavilla Sts. Brgy. XI, Lucena City'),
(53, 'Carlos Superdrug - Quezon Avenue Branch', 'DRC Bldg. Quezon Ave. cor. M.L. Tagarao St. Brgy. IV, Lucena City'),
(54, 'Carlos Superdrug - Red-V Branch', 'Recio Bldg., Maharlika Highway, Brgy. Ibs Dupay, Lucena City'),
(56, 'Carlos Superdrug - Shoprite Mayao Branch', 'Maharlika Highway, Brgy. Kanlurang Mayao, Lucena City, Quezon'),
(57, 'Carlos Superdrug - Tayabas Branch', '56 Gen. Luna St., Cor. P. Nadera St., Brgy. Angeles Zone 3, Tayabas City, Quezon'),
(58, 'Carlos Superdrug - Unisan Branch', '36 Quezon Ave., Brgy. F. De Jesus, Unisan, Quezon'),
(59, 'Casile Guinting Upland Marketing Cooperative', 'Brgy. Casile, Cabuyao City , Laguna'),
(60, 'City Government of Trece Martires', 'Trece Martires City, Cavite'),
(61, 'CMA Agri - Development Corporation', 'General Luna St. Sabang, Lipa City, Batangas'),
(62, 'Llano Farmers Multi Purpose Cooperative', 'Jica Highway, Sitio Llano, Bayugo, Jalajala, Rizal'),
(63, 'Mabato Coffee and High Value Crop Agriculture Cooperative', 'Brgy. Mabato Calamaba City , Laguna'),
(64, 'Milk Joy - Batangas Agribusiness Center', 'Brgy. Bolbok, Lipa City'),
(65, 'MinSU-Calapan City Campus - FICC-MIMAROPA', 'Calapan City, Oriental Mindoro'),
(66, 'Newly Weds Foods (Philippines)', 'Unit A, 103 Excellence Avenue, CIP I, Canlubang, Calamba City, Laguna'),
(67, 'Optimum Refrigeration Systems Solutions Inc.', 'No. 31 RMT Industrial Complex, Brgy. Cuyab, City of San Pedro, Laguna'),
(68, 'Pacific Oil Farmers, Inc', 'km. 23 Bunawan, Davao City, Davao del Sur'),
(69, 'Pasciolco Agri Ventures', '1358 Capistrano St., Lusacan, Tiaong, Quezon'),
(70, 'Philippine Morinda Citrifolia, Inc.', '9613 Taal St. Los Baños Subd., Batong Malaki, Los Baños, Laguna'),
(71, 'Puregold - Calamba', 'National Highway Brgy. Halang, Calamba City, Laguna'),
(72, 'Puregold - Parian Jr.', 'National Highway Brgy. Parian, Calamba City, Laguna'),
(73, 'Puregold Alaminos', 'Alaminos Complex, Brgy. San Juan, Alaminos, Laguna'),
(74, 'Puregold Candelaria', 'Maharlika Highway, Brgy. Masin Sur, Candelaria, Quezon'),
(75, 'Puregold Los Baños Extra', 'ational Highway, Brgy. Batong Malake, Los Baños, Laguna'),
(76, 'Puregold Los Baños Jr.', 'National Highway, Brgy. Batong Malake, Los Baños, Laguna'),
(77, 'Puregold Price Club, Inc.', '168 Puregold Pagsanjan - National Highway Brygy. Biñan, Pagsanjan, Laguna'),
(78, 'Puregold Price Club, Inc.', '366 PG Pila Poblacion Market - Brgy. Bulilan Norte, 4010 Pila, Laguna'),
(79, 'Puregold Price Club, Inc.', '428 Puregold Victoria - M.H. Del Pilar, Cor. E Quirino St., Victoria, Laguna'),
(80, 'Puregold Price Club, Inc.', 'JP Rizal St., Brgy. 6 Poblacion, Calamba City, Laguna'),
(81, 'Puregold Price Club, Inc. - Sambat', 'Colago Ave. Brgy. I-A, San Pablo City, Laguna'),
(82, 'Puregold Priceclub - Lipa City Branch', 'Lipa City Batangas'),
(83, 'Puregold Priceclub - Rosario Batangas Branch', 'Rosario Batangas'),
(84, 'Puregold Priceclub - Sto. Tomas Branch', 'Sto. Tomas City Batangas'),
(85, 'Puregold Priceclub - Tanauan City Branch', 'B134  Brgy. 7 Poblacion Tanauan City Batangas'),
(86, 'Puregold Priceclub - Tanauan City Branch', 'Brgy. 7 Poblacion Tanauan City Batangas'),
(87, 'A135  Puregold San Pablo Highway', 'Maharlika Highway, Brgy. San Francisco, San Pablo City, Laguna'),
(88, 'Puregold San Pablo Starshop', 'Marcos Paulino St. Brgy. III-A, San Pablo City, Laguna'),
(89, 'Puregold Tiaong', 'Doña Tating St. Barrio, Poblacion II, Tiaong, Quezon'),
(90, 'Rejoice Family Foods Corporation', 'km. 10, Sasa, Davao City, Davao del Sur'),
(91, 'Rosario Fasteners Corporation', 'Phase 2, Block 7, Lot 1, EPZA, Rosario, Cavite'),
(92, 'Sambel Pacific Corp.', '705 Jentec Compound, Barandal, Calamba, Laguna'),
(93, 'Sto. Niño Petron Service Station', 'Maharlika Hi-way Brgy. Turbina, Calamba City, Laguna'),
(94, 'Sunfruitions Foods Corp', 'San Agustin, Concepcion, Tarlac City'),
(95, 'Torres Trading Co., Inc.', 'YTMI Realty Enocomic Zone, Brgy. Makiling, Calamba City, Laguna'),
(96, 'V&F Ice Plant and Cold Storage', '437 San Roque, Sto. Tomas, Batangas'),
(97, 'Yakult Philippines, Inc. - Bottle Making', 'Bo Makiling, Calamba City, Laguna'),
(98, 'Yakult Philippines, Inc. - Bottling', 'B146  Bo Makiling, Calamba City, Laguna'),
(99, 'Yakult Philippines, Inc. - Utility', 'Bo Makiling, Calamba City, Laguna'),
(100, 'Yakult Philippines, Inc. - PMPC', 'Bo. Makiling, Calamba City, Laguna'),
(101, 'Keystone Instruments', '2130 Leveriza Street, Pasay City'),
(102, 'CosmoMedical, Inc.', '686 San Juan Road, Barangay San Fernando, Malvar Batangas, Philippines'),
(103, 'JOF Trading Corporation', 'Unit No. 7 Vergeewoods Stalls National Highway, Maahas, Los Baños, Laguna'),
(104, 'Newly Weds Foods (Philippines)', 'Unit A, 103 Excellence Avenue, CIP 1, Canlubang, Calamba City, Laguna'),
(105, 'Department of Science and Technology CALABARZON - Regional Metrology Laboratory', 'DOST CALABARZON Comp., Jamboree Road, Timugan, Los Banos, Laguna'),
(106, 'Paete General Hospital, Inc.', 'J.P. Rizal St., Brgy. Quinale, Paete, Laguna'),
(107, 'Forest Products Research and Develoment Institute - FTC', 'Narra St., Forestry Campus, UPLB, College, Laguna'),
(108, 'Forest Products Research and Development Institute - Seasoning', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(109, 'Forest Products Research and Development Institute - Wood Finishing', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(110, 'Forest Products Research and Development Institute - TID/BEEDS', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(111, 'Forest Products Research and Development Institute - EPDL', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(112, 'Forest Products Research and Development Institute - Pulp and Paper', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(113, 'Forest Products Research and Development Institute - Pulp and Paper Testing Laboratory', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(114, 'Blue Macay Food Manufacturing Corp.', 'Purok 3, Brgy. Sirang Lupa, Calamba City, Laguna'),
(115, 'Dienen Medical Enterprises, Inc.', '206 Santiago, Malvar, Batangas'),
(116, 'Tonio\'s Sisig', 'Brgy. Calumpang, Tayabas City, Quezon'),
(117, 'Uni-President (Philippines) Corporation', 'Lot 3-A, First Industrial Township SEZ, Brgy. Pagaspas, Tanauan City, Batangas'),
(118, 'Y.E.S. Import/ Export Corporation', 'km 47 RFM Road, GTC Compound, Brgy. Pulo, Cabuyao City, Laguna'),
(119, 'Sambat Birthing Home', 'Tanauan City, Batangas'),
(120, 'Pagaspas Birthing Home', 'Tanauan City, Batangas'),
(121, 'Rural Health Unit I', 'Tanauan City, Batangas'),
(122, 'Medquick Pharmacy', 'RAS #12 Stall #39 Regidor St., San Pablo Shopping Mall, Public Market, Brgy. VII-E, San Pablo City, Laguna'),
(123, 'Mediserv Pharmacy', 'Wallside Brgy. Bagong Bayan, San Pablo City, Laguna'),
(124, 'Mediserv II Pharmacy', 'GF Enriquez Bldg. A. Flores St., Brgy. VI-C, San Pablo City, Laguna'),
(125, 'Puregold Sta.Cruz', '1449 P. Guevarra St. Poblacion IV, Sta Cruz, Laguna'),
(126, 'Forest Products Research and Development Institute - FTC', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(127, 'Forest Products Research and Development Institute - Plywood Testing', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(129, 'Parado\'s Pharmacy', 'III Tavera St., Pakil, Laguna'),
(130, 'University of Sto. Tomas – Laboratory Equipment and Supplies Office', '8/F LESO, UST Central Laboratory , España Blvd, Sampaloc, Manila'),
(131, 'Candelaria Drug Corporation', 'Cabuñag St. cor. Regidor St., Candelaria, Quezon'),
(132, 'Greatlab Pharmaceutical, Inc.', 'Rodriquez Compound, Brgy. Malabanban Sur, Candelaria, Quezon'),
(133, 'DOST CALABARZON – Regional Volumetric Calibration Laboratory (RVCL)', 'Provincial Engineering Office Compound, Kumintang, Ilaya, Batangas City'),
(134, 'Artjams Pharmacy', '3093 National Highway, Bucal, Calamba City, Laguna'),
(135, 'Liwayway Marketing Corporation – Flexible Packaging Division', 'km 23 Anabu I, Imus, Cavite'),
(136, 'Forest Products Research and Development Institute - FPPTL', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(137, 'Y.E.S. Export/ Import Corporation', 'km 47 RFM Road, GTC Compound, Brgy. Pulo, Cabuyao City, Laguna'),
(138, 'Ginga AgriFood Manufacturing Enterprises, Inc.', '041 Mabilog na Bundok, Lobo, Batangas'),
(139, 'Forest Products Research and Development Institute - MSD CBS ', 'Narra Street, Forestry Campus, UPLB, College, Laguna'),
(140, 'Hacienda Macalauan, Inc.', 'Brgy. Mabacan, Calauan,Laguna'),
(141, 'NovoAgri, Inc.', 'Ambal  Compound, km 88, Nat\'l Highway, Banay-Banay 1st, San Jose Batangas'),
(142, 'Nestlé Philippines, Inc.', 'First Philippines Industrial Park, 2nd Street, Sto. Tomas 4234 Batangas'),
(153, '8583 Pharmaceutical, Inc.', 'Purok 3, Maharlika Highway, Brgy. Busay, Daraga, Albay'),
(154, 'Cignale Automation Control Services', '148 L. Wood St., Taytay Rizal'),
(155, 'San Miguel Foods, Inc.', '3rd Flr. Andenson Bldg. 3 Brgy. Parian, Calamba City, Laguna'),
(156, 'Sta. Rosa 5M Food Corporation – Max’s Restaurant', 'Balibago Commercial Complex, Sta. Rosa City, Laguna'),
(157, 'Escaba Food Products, Inc.', 'Brgy. Sta. Ana, San Pablo City, Laguna'),
(158, 'Green Harvest Food Products', '187 Santa Monica, San Pablo City 4000, Laguna '),
(159, 'Saint Jude Family Hospital', 'Los Baños, Laguna '),
(160, 'Betan Drugstore', '113 E. Quirino St., Brgy. Nanhaya, Victoria, Laguna'),
(161, 'Laguna Holy Family Hospital, Inc.', '1824 J. De Leon St. Pagsawitan, Sta. Cruz, Laguna'),
(162, 'Nalco Philippines, Inc.', 'Brgy. Real, Calamba City, Laguna'),
(163, 'Anihan Technical Institute', '294 Purok 6, Brgy. Milagrosa, Calamba City, Laguna'),
(166, 'Department of Health - Bicol Center for Health and Development', 'Bagtang Road, Sagpon, Daraga, Albay, Philippines'),
(167, 'International Rice Research Institute ', 'College, Los Baños, Laguna'),
(169, 'Sunrich Manufacturing Corporation', 'Lot 1, Block 4 Centennial St., Millenium Drive, LISP III, Sto. Tomas, Batangas'),
(170, 'Carlos Superdrug - Mauban Branch', 'Rizal St. Brgy. Rizaliana Pob., Mauban Quezon'),
(171, 'Makiling Medica Drugtore', 'ES Plaza Grove, Brgy. Batong Malake, Los Baños, Laguna'),
(172, 'Carlos Superdrug - CM Recto Branch', 'CM Recto St., Brgy. 6, Lucena City, Quezon'),
(173, 'Carlos Superdrug - Candelaria 1 Branch', 'Regidor St. Cor. Cabunag St., Candelaria, Quezon'),
(174, 'Carlos Superdrug - San Francisco Branch', 'Queblar St., Brgy. Cawayan 1, San Francisco, Quezon'),
(175, 'Carlos Superdrug - Agdangan Branch', 'Aguilar St. cor Yakal St. Brgy. Poblacion 1, Agdangan, Quezon'),
(176, 'Dr. Care Pharmacy Canlubang', 'Blk 43, Lot 23 Asia 1 Kapayapaan Ville, Canlubang, Calamba City, Laguna'),
(177, 'Philippine Carabao Center', 'UPLB, B.M. Gonzales Animal Science Complex, College, Laguna'),
(178, 'Philippine Carabao Center ', 'UPLB, B.M. Gonzales Animal Science Complex, College, Laguna'),
(179, 'Liwayway Marketing Corporation - Tarlac Plant', 'Gerona, Tarlac'),
(180, 'Patricia\'s Food Products Mfg.', '9077 Purok I, Brgy. Palina, Nagcarlan, Laguna'),
(181, 'Queen Lois Catering', 'National highway Brgy, Dayap, Calauan, Laguna'),
(182, 'Sentrong Pamilihan ng Produktong Agrikultura ng Quezon Foundation Inc.', 'Lucena City, Quezon'),
(183, 'DOST CALABARZON – Cavite Water and Waste Water Testing Laboratory', 'Cavite Provincial Capitol Compound, Luciano, Trece Martirez City'),
(184, 'Southern Luzon State University - MRTL', 'Lucban, Quezon'),
(185, 'BGB Foods Corporation', 'Doña Francisca Street, Teomora Village Phase II,  Brgy. San Gabriel, San Pablo City, Laguna'),
(186, 'Philippine Rice Research Institute', 'Pili Drive, UPLB Campus, Los Baños, Laguna'),
(187, 'Batangas Medical Center', 'Bihi Road, Kumintang Ibaba, Batangas City'),
(188, 'City Government of Calamba', 'Calamba City, Laguna'),
(189, 'Pagaspas Birthing Home', 'Tanauan City, Batangas'),
(190, 'Rural Health Unit II', 'Tanauan City, Batangas'),
(191, 'Anihan Technical School Livelihood Center', '294 Purok 6, Brgy. Milagrosa, Calamba City, Laguna'),
(192, 'Golden Maven Food Services Inc.', 'Max\'s Restaurant Olivares Plaza Mall, Batong Malake, Los Baños, Laguna		'),
(193, 'Pamantasan ng Cabuyao', 'Katapatan Mutual Homes, Banay Banay, City of Cabuyao, Laguna'),
(194, 'J. Emmanuel Pastries – The House of Pili', '178 Jacana St., RJ Village, Haring Canaman, Camarines Sur'),
(195, 'DENR - Ecosystems Research and Development Bureau', 'ERDB, Forestry, UPLB, Los Banos, Laguna		'),
(196, 'Sunrich Manufacturing Corporation - Silangan', 'Building 1, Silangan Interchange, Canlubang, Calamba City, Laguna'),
(197, 'Municipality of Tanza', 'Tanza, Cavite'),
(199, 'DOST CALABARZON – REGIONAL VOLUMETRIC CALIBRATION LABORATORY (RVCL)', 'Provincial Engineering Office Compound, Kumintang, Ilaya, Batangas City'),
(200, 'DOST CALABARZON – REGIONAL VOLUMETRIC CALIBRATION LABORATORY (RVCL)', 'Provincial Engineering Office Compound, Kumintang, Ilaya, Batangas City'),
(201, 'Mindoro Dairy Cooperative', 'Nautical Highway, Brgy. Salcedo, Bansud, Oriental Mindoro'),
(202, 'Batangas Egg Producers Multi-purpose Cooperative', 'Brgy. Don Luis, San Jose, Batangas		'),
(203, 'Xtragen Pharmacy																', 'Sta Rosa City, Laguna																'),
(204, 'Windmill Gourmet, Inc.', 'Unit 9 Geoland Industrial Compound, 7760 Narra Road, Brgy. San Antonio, San Pedro, Laguna'),
(205, 'Alpha Laboratory Calamba Philippines Corporation', 'LTO Road, Barangay Real, Calamba City, Laguna'),
(206, 'Laguna Water District Aquatech Resources Corporation', 'National Highway, Maahas, Los Baños, Laguna'),
(207, 'Gen. Trias Dairy Raisers Multi-Purpose Cooperative', 'Purok 1, Brgy. Santiago, Gen. Trias, Cavite');

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

--
-- Dumping data for table `digitalthermometertable`
--

INSERT INTO `digitalthermometertable` (`id`, `tsrID`, `certificateNumber`, `PabLogo`, `customer`, `address`, `dateReceived`, `dateCalibrated`, `recommendedDueDate`, `placeOfCalibration`, `standardUsed`, `completion`, `calibrationOfficer`, `checkedBy`, `verifierPosition`, `calibratorAccountEmail`, `calibratorAccountID`, `verifierEmail`, `dateTimeCalibrated`, `specificationsArray`, `environmentArray`, `calculatedValues`, `standard`, `customerInfo`, `equipmentInfo`, `environmentInfo`, `dataInputs`, `calculatedData`, `images`, `settingCalibrationProcedureAndTraceability`, `settingUncertaintyOfMeasurement`, `settingRemarks1`, `settingCalibrationResults`, `comments`, `dateOfIssue`) VALUES
(160, '348', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-25 17:20:21', NULL, NULL, NULL, NULL, '{\"customer\":\"Bounty Agro Ventures, Inc.\",\"address\":\"Crossing\",\"tsrNumber\":\"R4AL1-022024-MET-0027\",\"dateReceived\":\"2024-02-14\"}', '{\"certificateNumber\":\"2024-027-TMP-02-001\",\"equipmentDescription\":\"THERMOMETER\",\"manufacturer\":\"Testo\",\"modelNumber\":\"108\",\"serialNumber\":\"42643659/803\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '349', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-25 17:20:22', NULL, NULL, NULL, NULL, '{\"customer\":\"Bounty Agro Ventures, Inc.\",\"address\":\"Crossing\",\"tsrNumber\":\"R4AL1-022024-MET-0027\",\"dateReceived\":\"2024-02-14\"}', '{\"certificateNumber\":\"2024-027-TMP-02-002\",\"equipmentDescription\":\"THERMOMETER\",\"manufacturer\":\"Testo\",\"modelNumber\":\"108\",\"serialNumber\":\"42681534/1021\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, '350', '2024-027-TMP-02-003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Mylene S. Lontoc', 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'admin@admin.com', '13', 'roger_esmeria@gmail.com', '2024-06-25 17:20:23', NULL, NULL, NULL, '4010016-latest 2024', '{\"customer\":\"Bounty Agro Ventures, Inc.\",\"address\":\"Crossing\",\"tsrNumber\":\"R4AL1-022024-MET-0027\",\"dateReceived\":\"2024-02-14\",\"recommendedDueDateInterval\":\"\",\"recommendedDueDate\":\"\"}', '{\"dateCalibrated\":\"\",\"certificateNumber\":\"2024-027-TMP-02-003\",\"description\":\"EDITED\",\"manufacturer\":\"Testo\",\"modelNumber\":\"108\",\"serialNumber\":\"42680985/1021\",\"undefined\":\"\",\"equipmentNumber\":\"EDITED\",\"range\":\"EDITED\",\"resolution\":\"EDITED\",\"readability\":\"\",\"liquidInGlassC\":\"total\",\"liquidInGlassT\":\"total\",\"liquidInGlassP\":\"partial\",\"partialImmersion\":\"\",\"liquidInGlassN\":\"not\",\"otherDepth\":\"\"}', '{\"tempStart\":\"\",\"rhStart\":\"\",\"startAtmPressure\":\"\",\"pAmbUnit\":\"hPa\",\"tempEnd\":\"\",\"rhEnd\":\"\",\"endtAtmPressure\":\"\",\"tempAmb\":\"22\",\"rhAmb\":\"66\",\"pAmb\":\"0.1005\"}', '{\"selectedStandard\":\"4010016-latest 2024\",\"numberOfTables1\":\"1\",\"testPointTbodyTable1Row1\":\"0\",\"standardUsedTbodyTable1Row1\":\"4010016-latest 2024\",\"temperatureSourceTbodyTable1Row1\":\"4\",\"UUCtrial1TbodyTable1Row1\":\"0\",\"UUCtrial2TbodyTable1Row1\":\"0\",\"UUCtrial3TbodyTable1Row1\":\"0\",\"standardTrial1TbodyTable1Row1\":\"0.01\",\"standardTrial2TbodyTable1Row1\":\"0.01\",\"standardTrial3TbodyTable1Row1\":\"0.01\",\"testPointTbodyTable1Row2\":\"100\",\"standardUsedTbodyTable1Row2\":\"4010016-latest 2024\",\"temperatureSourceTbodyTable1Row2\":\"4\",\"UUCtrial1TbodyTable1Row2\":\"99.9\",\"UUCtrial2TbodyTable1Row2\":\"99.9\",\"UUCtrial3TbodyTable1Row2\":\"99.9\",\"standardTrial1TbodyTable1Row2\":\"99.986\",\"standardTrial2TbodyTable1Row2\":\"99.986\",\"standardTrial3TbodyTable1Row2\":\"99.986\",\"testPointTbodyTable1Row3\":\"0\",\"standardUsedTbodyTable1Row3\":\"4010016-latest 2024\",\"temperatureSourceTbodyTable1Row3\":\"4\",\"UUCtrial1TbodyTable1Row3\":\"0\",\"UUCtrial2TbodyTable1Row3\":\"0\",\"UUCtrial3TbodyTable1Row3\":\"0\",\"standardTrial1TbodyTable1Row3\":\"0.02\",\"standardTrial2TbodyTable1Row3\":\"0.02\",\"standardTrial3TbodyTable1Row3\":\"0.02\"}', '[{\"table1\":{\"row1\":{\"testPoint\":0,\"uucTrialArray\":[0,0,0],\"standardTrialArray\":[0.01,0.01,0.01],\"uucTrialAverage\":0,\"standardTrialAverage\":0.01,\"uucStdDev\":0,\"uncStandardPRT\":0.08,\"standardStdDev\":0,\"uncUUCResolution\":null,\"UncRepeatabilityUUC\":0,\"UncRepeatabilityStandard\":0,\"correctionFromCertificate\":0,\"correctedValue\":0.01,\"readoutStandardUncertainty\":0,\"UncReadoutStandardUncertainty\":0,\"PRTstandardUncertainty\":0.16,\"drift\":0.17800000000000002,\"UncDrift\":0.1027683479157534,\"bathInstability\":0.013222222222218265,\"axialHomogenity\":0.009866666666662614,\"radialHomogenity\":0.008599999999991776,\"hysteresis\":0.005773502691896258,\"combinedUncertainty\":null,\"veffect\":null,\"k\":\"NaN\",\"expandedUncertainty\":null,\"tempSourceId\":\"4\",\"standardUsed\":\"4010016-latest 2024\"},\"row2\":{\"testPoint\":100,\"uucTrialArray\":[99.9,99.9,99.9],\"standardTrialArray\":[99.986,99.986,99.986],\"uucTrialAverage\":99.90000000000002,\"standardTrialAverage\":99.986,\"uucStdDev\":1.7404671430534633e-14,\"uncStandardPRT\":0.08,\"standardStdDev\":0,\"uncUUCResolution\":null,\"UncRepeatabilityUUC\":1.004859173557616e-14,\"UncRepeatabilityStandard\":0,\"correctionFromCertificate\":0,\"correctedValue\":99.986,\"readoutStandardUncertainty\":0,\"UncReadoutStandardUncertainty\":0,\"PRTstandardUncertainty\":0.16,\"drift\":0.2599999999999909,\"UncDrift\":0.15011106998929746,\"bathInstability\":0.013222222222218265,\"axialHomogenity\":0.009866666666662614,\"radialHomogenity\":0.008599999999991776,\"hysteresis\":0.005773502691896258,\"combinedUncertainty\":null,\"veffect\":null,\"k\":\"NaN\",\"expandedUncertainty\":null,\"tempSourceId\":\"4\",\"standardUsed\":\"4010016-latest 2024\"},\"row3\":{\"testPoint\":0,\"uucTrialArray\":[0,0,0],\"standardTrialArray\":[0.02,0.02,0.02],\"uucTrialAverage\":0,\"standardTrialAverage\":0.02,\"uucStdDev\":0,\"uncStandardPRT\":0.08,\"standardStdDev\":0,\"uncUUCResolution\":null,\"UncRepeatabilityUUC\":0,\"UncRepeatabilityStandard\":0,\"correctionFromCertificate\":0,\"correctedValue\":0.02,\"readoutStandardUncertainty\":0,\"UncReadoutStandardUncertainty\":0,\"PRTstandardUncertainty\":0.16,\"drift\":0.17800000000000002,\"UncDrift\":0.1027683479157534,\"bathInstability\":0.013222222222218265,\"axialHomogenity\":0.009866666666662614,\"radialHomogenity\":0.008599999999991776,\"hysteresis\":0.005773502691896258,\"combinedUncertainty\":null,\"veffect\":null,\"k\":\"NaN\",\"expandedUncertainty\":null,\"tempSourceId\":\"4\",\"standardUsed\":\"4010016-latest 2024\"}}}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, NULL, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Mylene S. Lontoc', 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'admin@admin.com', '13', 'roger_esmeria@gmail.com', '2024-06-25 17:29:16', NULL, NULL, NULL, '', '{\"customer\":\"Carlos Superdrug - Atimonan Branch\",\"address\":\"1495 Manuel L. Quezon St., Brgy. Zone IV, Poblacion, Atimonan, Quezon\",\"tsrNumber\":\"R4AL1-022024-MET-0027\",\"dateReceived\":\"\",\"recommendedDueDateInterval\":\"\",\"recommendedDueDate\":\"\"}', '{\"dateCalibrated\":\"\",\"certificateNumber\":\"asd\",\"description\":\"asd\",\"manufacturer\":\"\",\"modelNumber\":\"\",\"serialNumber\":\"\",\"undefined\":\"\",\"equipmentNumber\":\"\",\"range\":\"\",\"resolution\":\"\",\"readability\":\"\",\"liquidInGlassC\":\"total\",\"liquidInGlassT\":\"total\",\"liquidInGlassP\":\"partial\",\"partialImmersion\":\"\",\"liquidInGlassN\":\"not\",\"otherDepth\":\"\"}', '{\"tempStart\":\"\",\"rhStart\":\"\",\"startAtmPressure\":\"\",\"pAmbUnit\":\"hPa\",\"tempEnd\":\"\",\"rhEnd\":\"\",\"endtAtmPressure\":\"\",\"tempAmb\":\"22\",\"rhAmb\":\"66\",\"pAmb\":\"0.1005\"}', '{\"selectedStandard\":\"\"}', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `influenceFactorValue` text NOT NULL,
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

--
-- Dumping data for table `electronicbalancetable`
--

INSERT INTO `electronicbalancetable` (`id`, `tsrID`, `certificateNumber`, `PabLogo`, `standard`, `customerInfo`, `equipmentInfo`, `environmentInfo`, `dataInputs`, `calculatedData`, `images`, `completion`, `calibrationOfficer`, `checkedBy`, `verifierPosition`, `calibratorAccountEmail`, `calibratorAccountID`, `verifierEmail`, `settingCalibrationProcedureAndTraceability`, `settingCalibrationResults`, `settingUncertaintyOfMeasurement`, `settingMeasurementCondition`, `settingRemarks`, `comments`, `graphMin`, `graphMax`, `graphStep`, `dateOfIssue`, `dateTimeCalibrated`) VALUES
(1, NULL, '2024-178-MAS-06-001', 'true', '6031214(SPLITHERE)6021214 - For verification purpose only OLD STD 2022', '{\"customer\":\"Sunny and Scramble\",\"address\":\"Malanday, San Mateo, Rizal\",\"tsrNumber\":\"TSR-2024-178\",\"dateReceived\":\"2024-06-04\",\"recommendedDueDateSelect\":\"12\",\"recommendedDueDate\":\"2025-06-07\"}', '{\"dateCalibrated\":\"2024-06-07\",\"certificateNumber\":\"2024-178-MAS-06-001\",\"equipmentDescription\":\"Electronic Balance\",\"manufacturer\":\"Asuki\",\"modelNumber\":\"FW-6\",\"serialNumber\":\"6FW2201108152\",\"equipmentId\":\"None\",\"placeOfCalibration\":\"Mass Laboratory\",\"maxCapacity\":\"30\",\"minCapacity\":\"50\",\"unit\":\"kg\",\"resolution\":\"5\",\"readability\":\"1\",\"kForCompute\":\"2\"}', '{\"tempStart\":\"20.4\",\"rhStart\":\"42\",\"startAtmPressure\":\"\",\"pAmbUnit\":\"bar\",\"tempEnd\":\"20.1\",\"rhEnd\":\"44.9\",\"endtAtmPressure\":\"\",\"tempAmb\":\"20.25\",\"rhAmb\":\"43.45\",\"pAmb\":\"0.1005\"}', '{\"illusA\":\"checked\",\"illusB\":\"illusB\",\"illusC\":\"illusC\",\"illusOther\":\"illusOther\",\"load\":\"10\",\"eccentricity1Start\":\"10\",\"eccentricity2\":\"10\",\"error2\":\"0.0000\",\"error2View\":\"0.0000\",\"eccentricity3\":\"10\",\"error3\":\"0.0000\",\"error3View\":\"0.0000\",\"eccentricity4\":\"10\",\"error4\":\"0.0000\",\"error4View\":\"0.0000\",\"eccentricity5\":\"10\",\"error5\":\"0.0000\",\"error5View\":\"0.0000\",\"eccentricity1End\":\"\",\"error1\":\"10.0000\",\"error1View\":\"10.0000\",\"errDiff\":\"0.0000\",\"valuesId1\":\"\",\"markingsUsed1\":\"\",\"conventionalMassCurrentUnit1\":\"0\",\"conventionalMassG1\":\"0.000000\",\"standardUncertainty1\":\"0.000000\",\"mpe1\":\"0.000000\",\"convection1\":\"0\",\"class1\":\"F2 Weights\",\"linearError1\":\"0.000000\",\"linearLoad1\":\"0\",\"indication1\":\"0\",\"standardUsed1\":\"\",\"valuesId2\":\"570\",\"markingsUsed2\":\"AML\",\"conventionalMassCurrentUnit2\":\"1.0000031\",\"conventionalMassG2\":\"1000.003100\",\"standardUncertainty2\":\"5.000000\",\"mpe2\":\"16.000000\",\"convection2\":\"0\",\"class2\":\"F2 Weights\",\"linearError2\":\"-0.000003\",\"linearLoad2\":\"1\",\"indication2\":\"1\",\"standardUsed2\":\"AML\",\"valuesId3\":\"569\",\"markingsUsed3\":\"ASS\",\"conventionalMassCurrentUnit3\":\"2.0000050000000003\",\"conventionalMassG3\":\"2000.005000\",\"standardUncertainty3\":\"10.000000\",\"mpe3\":\"30.000000\",\"convection3\":\"0\",\"class3\":\"F2 Weights\",\"linearError3\":\"-0.000005\",\"linearLoad3\":\"2\",\"indication3\":\"2\",\"standardUsed3\":\"ASS\",\"valuesId4\":\"567\",\"markingsUsed4\":\"AWF\",\"conventionalMassCurrentUnit4\":\"5.0000230000000006\",\"conventionalMassG4\":\"5000.023000\",\"standardUncertainty4\":\"25.000000\",\"mpe4\":\"80.000000\",\"convection4\":\"0\",\"class4\":\"F2 Weights\",\"linearError4\":\"-0.000023\",\"linearLoad4\":\"5\",\"indication4\":\"5\",\"standardUsed4\":\"AWF\",\"valuesId5\":\"567(SPLIT)569(SPLIT)571\",\"markingsUsed5\":\"AWF(SPLIT)ASS(SPLIT)AQF\",\"conventionalMassCurrentUnit5\":\"7.5000297\",\"conventionalMassG5\":\"7500.029700\",\"standardUncertainty5\":\"37.500000\",\"mpe5\":\"118.000000\",\"convection5\":\"0\",\"class5\":\"F2 Weights\",\"linearError5\":\"-0.000030\",\"linearLoad5\":\"7.5\",\"indication5\":\"7.5\",\"standardUsed5\":\"AWF + ASS + AQF\",\"valuesId6\":\"566(SPLIT)567\",\"markingsUsed6\":\"AFT(SPLIT)AWF\",\"conventionalMassCurrentUnit6\":\"15.000069\",\"conventionalMassG6\":\"15000.069000\",\"standardUncertainty6\":\"75.000000\",\"mpe6\":\"240.000000\",\"convection6\":\"0\",\"class6\":\"F2 Weights\",\"linearError6\":\"-0.000069\",\"linearLoad6\":\"15\",\"indication6\":\"15\",\"standardUsed6\":\"AFT + AWF\",\"valuesId7\":\"650(SPLIT)569(SPLIT)571\",\"markingsUsed7\":\"AC5(SPLIT)ASS(SPLIT)AQF\",\"conventionalMassCurrentUnit7\":\"22.5001027\",\"conventionalMassG7\":\"22500.102700\",\"standardUncertainty7\":\"112.500000\",\"mpe7\":\"338.000000\",\"convection7\":\"0\",\"class7\":\"F2 Weights\",\"linearError7\":\"-0.000103\",\"linearLoad7\":\"22.5\",\"indication7\":\"22.5\",\"standardUsed7\":\"AC5 + ASS + AQF\",\"valuesId8\":\"650(SPLIT)566\",\"markingsUsed8\":\"AC5(SPLIT)AFT\",\"conventionalMassCurrentUnit8\":\"30.000142\",\"conventionalMassG8\":\"30000.142000\",\"standardUncertainty8\":\"150.000000\",\"mpe8\":\"460.000000\",\"convection8\":\"0\",\"class8\":\"F2 Weights\",\"linearError8\":\"-0.000142\",\"linearLoad8\":\"30\",\"indication8\":\"30\",\"standardUsed8\":\"AC5 + AFT\",\"repeatabilityRaw\":\"20\",\"numberOfRepeatability\":\"10\",\"repeat1\":\"20\",\"repeat6\":\"20\",\"repeat2\":\"20\",\"repeat7\":\"20\",\"repeat3\":\"20\",\"repeat8\":\"20\",\"repeat4\":\"20\",\"repeat9\":\"20\",\"repeat5\":\"20\",\"repeat10\":\"20\",\"stDev\":\"0\"}', '[{\"linearLoad\":0,\"ReferenceWeightCalculated\":0,\"AirBuoyancytCalculated\":0,\"DriftOfWeightCalculated\":0,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.2886751345948129,\"kForCompute\":2,\"expandedUncertainty\":0.5773502691896258},{\"linearLoad\":1,\"ReferenceWeightCalculated\":0.0000025,\"AirBuoyancytCalculated\":0.000002309401076758503,\"DriftOfWeightCalculated\":0.000003079201435678004,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.4082482904896621,\"kForCompute\":2,\"expandedUncertainty\":0.8164965809793242},{\"linearLoad\":2,\"ReferenceWeightCalculated\":0.000005,\"AirBuoyancytCalculated\":0.000004330127018922193,\"DriftOfWeightCalculated\":0.000005773502691896258,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.4082482905582705,\"kForCompute\":2,\"expandedUncertainty\":0.816496581116541},{\"linearLoad\":5,\"ReferenceWeightCalculated\":0.0000125,\"AirBuoyancytCalculated\":0.000011547005383792516,\"DriftOfWeightCalculated\":0.00001539600717839002,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.4082482911088387,\"kForCompute\":2,\"expandedUncertainty\":0.8164965822176774},{\"linearLoad\":7.5,\"ReferenceWeightCalculated\":0.00001875,\"AirBuoyancytCalculated\":0.00001703183294109396,\"DriftOfWeightCalculated\":0.00002270911058812528,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.40824829188132095,\"kForCompute\":2,\"expandedUncertainty\":0.8164965837626419},{\"linearLoad\":15,\"ReferenceWeightCalculated\":0.0000375,\"AirBuoyancytCalculated\":0.00003464101615137755,\"DriftOfWeightCalculated\":0.00004618802153517006,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.4082482962686434,\"kForCompute\":2,\"expandedUncertainty\":0.8164965925372868},{\"linearLoad\":22.5,\"ReferenceWeightCalculated\":0.00005625,\"AirBuoyancytCalculated\":0.000048786097746523376,\"DriftOfWeightCalculated\":0.00006504813032869783,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.40824830243624016,\"kForCompute\":2,\"expandedUncertainty\":0.8164966048724803},{\"linearLoad\":30,\"ReferenceWeightCalculated\":0.000075,\"AirBuoyancytCalculated\":0.00006639528095680696,\"DriftOfWeightCalculated\":0.00008852704127574262,\"ConvectionEffectsCalculated\":0,\"RoundingNoLoadCalculated\":0.2886751345948129,\"RoundingWithLoadCalculated\":0.2886751345948129,\"EccentricityCalculated\":0,\"stDevRepeatability\":0,\"StandardUncertaintyError\":0.40824831235050696,\"kForCompute\":2,\"expandedUncertainty\":0.8164966247010139}]', NULL, 'Pending', 'Engr. Julius P. Regoroso', 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'admin@admin.com', '13', 'roger_esmeria@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-25 17:45:11'),
(442, '351', NULL, 'true', NULL, '{\"customer\":\"Mernel\'s Food Corp.\",\"address\":\"km 65 National Highway\",\"tsrNumber\":\"R4AL1-022024-MET-0019\",\"dateReceived\":\"2024-02-06\"}', '{\"certificateNumber\":\"2024-019-MAS-02-001\",\"equipmentDescription\":\"BALANCE\",\"manufacturer\":\"General Master\",\"modelNumber\":\"GM-10-JE21\",\"serialNumber\":\"160907-04907\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-25 17:51:36'),
(443, '352', NULL, 'true', NULL, '{\"customer\":\"Mernel\'s Food Corp.\",\"address\":\"km 65 National Highway\",\"tsrNumber\":\"R4AL1-022024-MET-0019\",\"dateReceived\":\"2024-02-06\"}', '{\"certificateNumber\":\"2024-019-MAS-02-002\",\"equipmentDescription\":\"BALANCE\",\"manufacturer\":\"General Master\",\"modelNumber\":\"GM-10-JE21\",\"serialNumber\":\"171670-00789\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-25 17:51:38');

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

--
-- Dumping data for table `elect_table_2`
--

INSERT INTO `elect_table_2` (`id`, `description`, `manufacturer`, `type`, `serialNumber`, `certificateNumber`, `dateOfCalibration`, `class`, `prevAirDensity`, `coverageFactor`, `calibrationProvider`, `dateOfInsert`, `status`) VALUES
(5, 'OIML Class E2 Weights', 'Troemner', 'E2', '91096', '009418 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights - Test weights', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(6, 'OIML Class E2 Weights', 'Troemner', 'E2', '91095', '009417 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights - Test weights', '1.2', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(7, 'OIML Class E2 Weights', 'Troemner', 'E2', '91094', '009416 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights - Test weights', '1.2', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(8, 'OIML Class E2 Weights', 'Troemner', 'E2', '91093', '009415 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights - Test weights', '1.2', NULL, 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(15, 'OIML Class E2 Weights', 'Troemner', 'E2', '4000014940 - Air density 1.18--', '009414 D-K-15035-01-00 2023-05', '2024-05-17', 'OIML Class E2 Weights - Test weights (25 pcs)', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(46, 'OIML Class F2 Weights', 'Troemner', 'OIML Class F2', '57248', '009412 D-K-15035-01-00 2023-05', '2023-05-11', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(47, 'OIML Class F2 Weights', 'Troemner', 'OIML Class F2', '57249', '009413 D-K-15035-01-00 2023-06', '2023-06-07', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '1.2', NULL, 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(49, 'OIML Class F1 Weights					', 'Haefner', 'OIML Class F1', '7740119', '009581 D-K-15035-01-00 2023-05', '2024-06-05', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(67, 'OIML Class F2 Weights', 'Haefner', 'F2 Weights', '6031214', '009954 D-K-15035-01-00-2023-09', '2023-09-13', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(68, 'OIML Class F2 Weights', 'Haefner', 'OIML Class F2', '6021214 - For verification purpose only OLD STD 2022', '009953 D-K-15035-01-00 2023-09', '2024-08-15', 'OIML Class F2 Weights - Test weights, 20 kg', '1.2', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(69, 'OIML Class F2 Weights', 'Haefner', 'F2 Weights', '6031214 - For verification purpose only (1.2) no drift', '009954 D-K-15035-01-00 2023-09', '2023-12-29', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '1.2', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'inactive'),
(73, 'OIML Class M1 Weights ', 'Haefner', 'OIML Class M1 ', '4640918 -12-2023-Air Density (1.2)', '2023-215-MAS-07-039', '2024-01-01', 'OIML Class M1 - Test weights, 1g to 10 kg', '1.2', '2', 'NML (Philippines) through DOST CALABARZON - RML						 						', '2024-02-22 00:24:22', 'active'),
(74, 'Free Nominal Mass Standards', 'Fuji', 'M1', '09000800 -  2022 Air Density(1.2) ', 'W22-45805-23-27', '2023-10-07', 'OIML Class M1 Weights - Set of Weights', '1.2', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '2024-02-22 00:24:22', 'active'),
(75, 'Free Nominal Mass Standards', 'FPSI', 'Free Nominal Mass Standards', 'See Calibration Certificate - Air Density (1.2)', 'W22-45805-01 to 22 (A to V)									', '2023-10-13', 'None Indicated', '1.2', '', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI					 					', '2024-02-22 00:24:22', 'active'),
(77, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights - Test weights', '91095 - Old Conventional Mass', '009417 D-K-15035-01-00 2023-05', '2023-05-19', 'E2', '1.18', NULL, 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(78, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights - Test weights (25 pcs)', '4000014940 - Air density (1.18)', '009414 D-K-15035-01-00 2023-05', '2023-05-17', 'E2', '1.2', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(79, 'OIML Class F2 Weights', 'Troemner', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '57249 - Air density 1.18', '009413 D-K-15035-01-00 2023-06', '2023-06-07', 'OIML Class F2', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(80, 'OIML Class F2 Weights', 'Troemner', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '57248 - Old Conventional Mass', '009412 D-K-15035-01-00 2023-05', '2024-05-11', 'OIML Class F2', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(81, 'OIML Class F2 Weights', 'Haefner', 'OIML Class F2 Weights - Test weights, 20 kg', '6021214', '009953 D-K-15035-01-00 2023-09', '2024-08-15', 'OIML Class F2', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(82, 'Free Nominal Mass Standards', 'Fuji', 'OIML Class M1 Weights - Set of Weights', '09000800 - Old Conventional Mass - Air Density (1.18)', 'W23-51224-01 to 11 W23-51224-12-16', '2023-10-07', 'M1', '1.18', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '2024-02-22 00:24:22', 'active'),
(83, 'OIML Class M1 Weights ', 'Haefner', 'OIML Class M1 - Test weights, 1g to 10 kg', '4640918 -  12-2022-Air Density (1.2)', '2022-373-MAS-12-001', '2024-01-01', 'OIML Class M1 ', '1.2', '2', 'NML (Philippines) through DOST CALABARZON - RML', '2024-02-22 00:24:22', 'active'),
(84, 'Free Nominal Mass Standards', 'FPSI', 'None Indicated', 'See Calibration Certificate - Old STD, Air Density (1.18)', 'W23-51224-01 to 11', '2024-01-01', 'Free Nominal Mass Standards', '1.18', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '2024-02-22 00:24:22', 'active'),
(85, 'OIML Class F1 Weights', 'Haefner', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '7740119 - Old Conventional Mass', '009581 D-K-15035-01-00 2023-05', '2024-06-05', 'OIML Class F1', '1.2', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(86, 'Free Nominal Mass Standards', 'FPSI', 'None Indicated', 'See Calibration Certificate - Air Density (1.18)', 'W22-45805-01 to 22 (A to V)			', '2024-01-01', 'Free Nominal Mass Standards', '1.18', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI					 					', '2024-02-22 00:24:22', 'active'),
(87, 'OIML Class M1 Weights ', 'Haefner', 'OIML Class M1 ', '4640918 -  12-2022-Air Density (1.18) Weighing Scale', '2022-373-MAS-12-001', '2024-01-01', 'OIML Class M1 - Test weights, 1g to 10 kg', '1.18', '2', 'NML (Philippines)', '2024-02-22 00:24:22', 'active'),
(88, 'Free Nominal Mass Standards', 'FPSI', 'None Indicated', 'See Calibration Certificate - Old Air Density (1.2)', '2023-215-MAS-07-037', '2023-10-10', 'Free Nominal Mass Standards', '1.2', '2', 'NML (Philippines) through DOST CALABARZON - RML', '2024-02-22 00:24:22', 'active'),
(89, 'Free Nominal Mass Standards', 'Fuji', 'OIML Class M1 Weights - Set of Weights ', '09000800 -  16/11/2022 Air Density(1.18)', '2022-373-MAS-12-001', '2024-01-01', 'M1', '1.18', '2', 'NML (Philippines) through DOST CALABARZON - RML', '2024-02-22 00:24:22', 'inactive'),
(90, 'OIML Class F2 Weights', 'Haefner', 'F2 Weights', '6031214 - Air density (1.2)', '009954 D-K-15035-01-00-2023-09', '2023-09-13', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1.2', '2', 'NML (Philippines)', '2024-03-04 08:54:44', 'inactive'),
(91, 'OIML Class F2 Weights', 'Haefner', 'F2 Weights', '6031214 - Air Density (1.2) No Drift', '009954 D-K-15035-01-00 2023-09', '2023-09-13', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '1.18', '2', 'NML (Philippines)', '2024-03-07 11:20:52', 'inactive'),
(94, 'OIML Class E2 Weights', 'Troemner', 'E2', '91096-latest 2024', '009418 D-K-15035-01-00 2023-05', '2024-01-01', 'OIML Class E2 Weights', '1.18', '2', 'NML (Philippines)', '2024-06-13 14:35:33', 'active'),
(95, 'OIML Class E2 Weights', 'Troemner', 'E2', '91095-latest 2024', '009417 D-K-15035-01-00 2023-05', '2024-01-01', 'OIML Class E2 Weights', '1.2', '2', 'NML (Philippines)', '2024-06-13 14:42:23', 'active'),
(96, 'OIML Class E2 Weights', 'Troemner', 'E2', '91094 -latest 2024', '009416 D-K-15035-01-00 2023-05', '2024-01-01', 'OIML Class E2 Weights', '1.18', '2', 'NML (Philippines)', '2024-06-13 15:57:14', 'active'),
(97, 'OIML Class E2 Weights', 'Troemner', 'E2', '91093-latest 2024', '009415 D-K-15035-01-00 2023-05', '2024-01-01', 'NML (Philippines)', '1.18', '2', 'OIML Class E2 Weights', '2024-06-13 16:12:30', 'active'),
(98, 'OIML Class E2 Weights', 'Troemner', 'E2', '4000014940-latest 2024', '009414 D-K-15035-01-00 2023-05', '2024-01-01', 'NML (Philippines)', '1.2', '2', 'OIML Class E2 Weights', '2024-06-13 16:19:53', 'active'),
(99, 'OIML Class E2 Weights', 'Troemner', 'E2', '4000014940-2 latest 2024', '12-2019-TSWT-0755', '2024-01-01', 'NML (Philippines)', '1.2', '2', 'OIML Class E2 Weights', '2024-06-14 08:31:09', 'active'),
(100, 'OIML Class F1 Weights', 'Haefner', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '7740119-latest 2024', '009581 D-K-15035-01-00 2023-05', '2024-01-01', 'OIML Class F1', '1.2', '2', 'OIML Class F1 Weights', '2024-06-14 08:36:53', 'active'),
(101, 'OIML Class F2 Weights', 'Troemner', 'OIML Class F2', '57249-latest 2024', '009413 D-K-15035-01-00 2023-06', '2024-01-01', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '1.2', '2', 'NML (Philippines)', '2024-06-14 09:33:09', 'active'),
(102, 'OIML Class F2 Weights', 'Haefner', 'F2 Weights', '6031214-latest 2024', '0009954 D-K-15035-01-00 2023-09', '2024-01-01', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1.2', '2', 'NML (Philippines)', '2024-06-14 09:56:26', 'active'),
(103, 'OIML Class F2 Weights', 'Troemner', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '57248-latest 2024', '009412 D-K-15035-01-00 2023-05', '2024-01-01', 'OIML Class F2', '1.18', '2', 'NML (Philippines)', '2024-06-14 10:17:47', 'active'),
(104, 'OIML Class F2 Weights', 'Haefner', 'OIML Class F2', '6021214-latest 2024', '009001 D-K-15035-01-00 2022-08', '2024-01-01', 'OIML Class F2 Weights - Test weights, 20 kg', '1.2', '2', 'NML (Philippines)', '2024-06-14 10:45:27', 'active'),
(105, 'Free Nominal Mass Standards', 'Fuji', 'OIML Class M1 Weights - Set of Weights', '09000800-latest 2024', 'W23-51224-12-16', '2024-01-01', 'M1', '1.18', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '2024-06-14 10:58:41', 'active'),
(106, 'OIML Class M1 Weights ', 'Haefner', 'OIML Class M1 - Test weights, 1g to 10 kg', '4640918-latest 2024', '2022-373-MAS-12-001', '2024-01-01', 'OIML Class M1', '1.18', '2', 'NML (Philippines) through DOST CALABARZON - RML', '2024-06-14 11:20:03', 'active'),
(107, 'Free Nominal Mass Standards', 'Haefner', 'FPSI', 'See Calibration Certificate-latest 2024', 'W23-51224-01 to 11', '2024-01-01', 'Free Nominal Mass Standards', '1.18', '2', 'None Indicated', '2024-06-14 11:44:17', 'active'),
(108, 'OIML Class F2 Weights', 'Haefner', 'F2 Weights', '6031214-test weight', '009954 D-K-15035-01-00-2023-09', '2023-09-13', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1.2', '2', 'NML (Philippines)', '2024-06-18 10:42:35', 'active');

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

--
-- Dumping data for table `elect_table_3`
--

INSERT INTO `elect_table_3` (`id`, `serialNumber`, `type`, `class`, `nominalValue`, `nominalUnit`, `marking`, `conventionalMass`, `unit`, `uncertainty`, `mpe`, `drift`, `previousConventionalMass`, `coverageFactor`, `calibrationProvider`, `standardID`, `status`) VALUES
(54, '91096', 'E2', 'OIML Class E2 Weights - Test weights', '200', 'g', 'None', '200.00007', 'g', '0.1', '0.3', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. through FPSI', '5', 'active'),
(55, '91095', 'E2', 'OIML Class E2 Weights - Test weights', '100', 'g', 'none', '99.99996', 'g', '0.05', '0.16', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. through FPSI', '6', 'active'),
(56, '91094', 'E2', 'OIML Class E2 Weights - Test weights', '50', 'g', 'none', '50.00003', 'g', '0.03', '0.1', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. through FPSI', '7', 'active'),
(57, '91093', 'E2', 'OIML Class E2 Weights - Test weights', '10', 'g', 'None', '10.000001', 'g', '0.02', '0.06', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. through FPSI', '8', 'active'),
(317, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '1', 'kg', 'none', '999.9991', 'g', '5', '16', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(318, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '500', 'g', 'none', '500', 'g', '2.5', '8', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(319, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '200', 'g', 'point', '200.0009', 'g', '1', '3', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(320, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '200', 'g', 'none', '200.0002', 'g', '1', '3', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(321, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '100', 'g', 'none', '99.99985', 'g', '0.5', '1.6', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(322, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '50', 'g', 'none', '50.00019', 'g', '0.3', '1', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(323, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '20', 'g', 'point', '20.00022', 'g', '0.25', '0.8', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(324, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '20', 'g', 'none', '20.00032', 'g', '0.25', '0.8', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(325, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '10', 'g', 'none', '10.00021', 'g', '0.2', '0.6', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(326, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '5', 'g', 'none', '5.00021', 'g', '0.16', '0.5', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(327, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '2', 'g', 'point', '1.99989', 'g', '0.12', '0.4', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(328, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '2', 'g', 'none', '1.99992', 'g', '0.12', '0.4', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(329, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '1', 'g', 'none', '1.000000', 'g', '0.1', '0.3', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(330, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '500', 'mg', 'none', '0.500054', 'g', '0.08', '0.25', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(331, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '200', 'mg', 'point', '0.200051', 'g', '0.06', '0.2', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(332, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '200', 'mg', 'none', '0.200045', 'g', '0.06', '0.2', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(333, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '100', 'mg', 'none', '0.100053', 'g', '0.05', '0.16', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(334, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '50', 'mg', 'none', '0.050004', 'g', '0.04', '0.12', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(335, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '20', 'mg', 'point', '0.019973', 'g', '0.03', '0.1', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(336, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.1', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(337, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '10', 'mg', 'none', '0.010013', 'g', '0.025', '0.8', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(338, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '5', 'mg', 'none', '0.005014', 'g', '0.02', '0.06', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(339, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '2', 'mg', 'point', '0.002005', 'g', '0.02', '0.06', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(340, '57249', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', '2', 'mg', 'none', '0.002003', 'g', '0.02', '0.06', NULL, NULL, NULL, 'NML (Philippines)', '47', 'active'),
(512, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '500', 'g', 'BXA', '500.00061', 'g', '0.80', '2.5', '0.000100', '500.00051', '2', 'NML (Philippines)', '49', 'active'),
(513, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'g', 'DZ9', '200.00011', 'g', '0.30', '1.0', '0.000050', '200.00016', '2', 'NML (Philippines)', '49', 'active'),
(514, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'g', 'DZ8', '200.00014', 'g', '0.30', '1.0', '0.000010', '200.00015', '2', 'NML (Philippines)', '49', 'active'),
(515, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '100', 'g', 'CL3', '100.00003', 'g', '0.16', '0.5', '0.000010', '100.00002', '2', 'NML (Philippines)', '49', 'active'),
(516, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '50', 'g', 'CG4', '49.99997', 'g', '0.10', '0.3', '0.000020', '49.99999', '2', 'NML (Philippines)', '49', 'active'),
(517, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'g', 'CUY', '19.999992', 'g', '0.08', '0.25', '0.000010', '19.999982', '2', 'NML (Philippines)', '49', 'active'),
(518, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'g', 'CUW', '20.000077', 'g', '0.08', '0.25', '0.000000', '20.000077', '2', 'NML (Philippines)', '49', 'active'),
(519, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '10', 'g', 'C7F', '10.000071', 'g', '0.06', '0.20', '0.000014', '10.000057', '2', 'NML (Philippines)', '49', 'active'),
(520, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '5', 'g', 'BPF', '5.000045', 'g', '0.05', '0.16', '0.000002', '5.000047', '2', 'NML (Philippines)', '49', 'active'),
(521, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'g', 'GI0', '2.000042', 'g', '0.04', '0.12', '0.000000', '2.000042', '2', 'NML (Philippines)', '49', 'active'),
(522, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'g', 'GHX', '2.000043', 'g', '0.04', '0.12', '0.000003', '2.00004', '2', 'NML (Philippines)', '49', 'active'),
(523, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '1', 'g', 'CFF', '1.000030', 'g', '0.03', '0.10', '0.000002', '1.000028', '2', 'NML (Philippines)', '49', 'active'),
(524, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '500', 'mg', 'none', '0.500010', 'g', '0.025', '0.08', '0.000002', '0.500012', '2', 'NML (Philippines)', '49', 'active'),
(525, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'mg', 'point', '0.200030', 'g', '0.020', '0.06', '0.000001', '0.200029', '2', 'NML (Philippines)', '49', 'active'),
(526, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'mg', 'none', '0.200033', 'g', '0.020', '0.06', '0.000003', '0.20003', '2', 'NML (Philippines)', '49', 'active'),
(527, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '100', 'mg', 'none', '0.100003', 'g', '0.016', '0.05', '0.000006', '0.100009', '2', 'NML (Philippines)', '49', 'active'),
(528, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '50', 'mg', 'none', '0.050015', 'g', '0.012', '0.04', '0.000001', '0.0500160', '2', 'NML (Philippines)', '49', 'active'),
(529, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'mg', 'point', '0.020012', 'g', '0.010', '0.03', '0.000000', '0.0200120', '2', 'NML (Philippines)', '49', 'active'),
(530, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'mg', 'none', '0.020000', 'g', '0.010', '0.03', '0.000000', '0.0200000', '2', 'NML (Philippines)', '49', 'active'),
(531, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '10', 'mg', 'none', '0.010013', 'g', '0.008', '0.025', '0.000003', '0.0100160', '2', 'NML (Philippines)', '49', 'active'),
(532, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '5', 'mg', 'none', '0.005003', 'g', '0.006', '0.020', '0.000000', '0.0050030', '2', 'NML (Philippines)', '49', 'active'),
(533, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'mg', 'point', '0.001992', 'g', '0.006', '0.020', '0.000012', '0.0020040', '2', 'NML (Philippines)', '49', 'active'),
(534, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'mg', 'none', '0.001995', 'g', '0.006', '0.020', '0.000012', '0.0020070', '2', 'NML (Philippines)', '49', 'active'),
(535, '7740119', 'OIML Class F1', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '1', 'mg', 'none', '0.001001', 'g', '0.006', '0.020', '0.000001', '0.0010020', '2', 'NML (Philippines)', '49', 'active'),
(566, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '10 ', 'kg', 'AFT', '10000.046', 'g', '50', '160', '0.0020', '10000.048', '2', 'NML (Philippines)', '67', 'active'),
(567, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '5', 'kg', 'AWF', '5000.023', 'g', '25', '80', '0.0010', '5000.024', '2', 'NML (Philippines)', '67', 'active'),
(568, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', '0.0000', '2000.006', '2', 'NML (Philippines)', '67', 'active'),
(569, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', '0.0000', '2000.005', '2', 'NML (Philippines)', '67', 'active'),
(570, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', '0.0001', '1000.003', '2', 'NML (Philippines)', '67', 'active'),
(571, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '500', 'g', 'AQF', '500.0017', 'g', '2.5', '8', '0.0000', '500.0017', '2', 'NML (Philippines)', '67', 'active'),
(572, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '200', 'g', 'AMY', '200.0004', 'g', '1', '3', '0.0003', '200.0007', '2', 'NML (Philippines)', '67', 'active'),
(573, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '200', 'g', 'AMX', '200.0007', 'g', '1', '3', '0.0003', '200.0004', '2', 'NML (Philippines)', '67', 'active'),
(574, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '100', 'g', 'ANL', '100.00039', 'g', '0.50', '1.6', '0.0000', '100.00037', '2', 'NML (Philippines)', '67', 'active'),
(575, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '50', 'g', 'AJL', '50.00026', 'g', '0.30', '1', '0.0000', '50.00028', '2', 'NML (Philippines)', '67', 'active'),
(576, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '20', 'g', 'AN5', '20.00027', 'g', '0.25', '0.8', '0.0000', '20.00007', '2', 'NML (Philippines)', '67', 'active'),
(577, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '20', 'g', 'AN4', '20.00007', 'g', '0.25', '0.8', '0.0000', '20.00026', '2', 'NML (Philippines)', '67', 'active'),
(578, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '10', 'g', 'AK2', '10.0003', 'g', '0.20', '0.6', '0.0000', '10.00028', '2', 'NML (Philippines)', '67', 'active'),
(579, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', '0.0000', '5.00018', '2', 'NML (Philippines)', '67', 'active'),
(580, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '2', 'g', 'ALT', '2.00007', 'g', '0.12', '0.4', '0.0000', '2.00011', '2', 'NML (Philippines)', '67', 'active'),
(581, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '2', 'g', 'ALS', '2.00011', 'g', '0.12', '0.4', '0.0000', '2.00007', '2', 'NML (Philippines)', '67', 'active'),
(582, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1', 'g', 'AL5', '1.00005', 'g', '0.10', '0.3', '0.0000', '1.00006', '2', 'NML (Philippines)', '67', 'active'),
(583, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '500', 'mg', 'none', '0.50001', 'mg', '0.080', '0.25', '0.0001', '0.50011', '2', 'NML (Philippines)', '67', 'active'),
(584, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '200', 'mg', 'point', '0.199995', 'mg', '0.060', '0.2', '0.0001', '0.19993', '2', 'NML (Philippines)', '67', 'active'),
(585, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '200', 'mg', 'none', '0.199989', 'mg', '0.060', '0.2', '0.0000', '0.199988', '2', 'NML (Philippines)', '67', 'active'),
(586, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '100', 'mg', 'none', '0.100075', 'mg', '0.050', '0.16', '0.0000', '0.100079', '2', 'NML (Philippines)', '67', 'active'),
(587, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '50', 'mg', 'none', '0.050021', 'mg', '0.040', '0.12', '0.0000', '0.050022', '2', 'NML (Philippines)', '67', 'active'),
(588, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '20', 'mg', 'point', '0.019997', 'mg', '0.030', '0.1', '0.0000', '0.019996', '2', 'NML (Philippines)', '67', 'active'),
(589, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '20', 'mg', 'none', '0.020007', 'mg', '0.030', '0.1', '0.0000', '0.02005', '2', 'NML (Philippines)', '67', 'active'),
(590, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '10', 'mg', 'none', '0.010006', 'mg', '0.025', '0.08', '0.0000', '0.010008', '2', 'NML (Philippines)', '67', 'active'),
(591, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '2', 'mg', 'point', '0.00201', 'mg', '0.020', '0.06', '0.0000', '0.002005', '2', 'NML (Philippines)', '67', 'active'),
(592, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '2', 'mg', 'none', '0.002008', 'mg', '0.020', '0.06', '0.0000', '0.002003', '2', 'NML (Philippines)', '67', 'active'),
(593, '6031214', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg ', '1', 'mg', 'none', '0.000997', 'mg', '0.020', '0.06', '0.0000', '0.000998', '2', 'NML (Philippines)', '67', 'active'),
(594, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '5', 'kg', 'none', '5000.0038', 'g', '2.5', '8.0', '0', '0', '2', 'NML (Philippines)', '15', 'active'),
(595, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '2', 'kg', 'point', '2000.0015', 'g', '1.00', '3.0', '0', '0', '2', 'NML (Philippines)', '15', 'active'),
(596, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '2', 'kg', 'none', '2000.0013', 'g', '1.00', '3.0', '0', '0', '2', 'NML (Philippines)', '15', 'active'),
(597, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '1', 'kg', 'none', '1000.00036', 'g', '0.53', '1.6', '0.000130', '1000.00049', '2', 'NML (Philippines)', '15', 'active'),
(598, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '500', 'g', 'none', '499.99999', 'g', '0.26', '0.8', '0.000080', '500.00007', '2', 'NML (Philippines)', '15', 'active'),
(599, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '200', 'g', 'point', '199.99997', 'g', '0.10', '0.3', '0.000020', '199.99999', '2', 'NML (Philippines)', '15', 'active'),
(600, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '200', 'g', 'none', '199.99997', 'g', '0.10', '0.3', '0.000040', '199.99993', '2', 'NML (Philippines)', '15', 'active'),
(601, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '100', 'g', 'none', '100.00002', 'g', '0.053', '0.2', '0.000048', '99.999972', '2', 'NML (Philippines)', '15', 'active'),
(602, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '50', 'g', 'none', '49.99997', 'g', '0.033', '0.10', '0.000007', '49.999963', '2', 'NML (Philippines)', '15', 'active'),
(603, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '20', 'g', 'point', '20.000007', 'g', '0.026', '0.08', '0.000003', '20.000004', '2', 'NML (Philippines)', '15', 'active'),
(604, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '20', 'g', 'none', '20.000016', 'g', '0.026', '0.08', '0.000005', '20.000021', '2', 'NML (Philippines)', '15', 'active'),
(605, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '10', 'g', 'none', '9.999974', 'g', '0.020', '0.1', '0.000000', '0.0100032', '2', 'NML (Philippines)', '15', 'active'),
(606, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '5', 'g', 'none', '5.000017', 'g', '0.016', '0.05', '0.000000', '5.000017', '2', 'NML (Philippines)', '15', 'active'),
(607, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '2', 'g', 'point', '2.000013', 'g', '0.013', '0.04', '0.000004', '2.000017', '2', 'NML (Philippines)', '15', 'active'),
(608, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '2', 'g', 'none', '2.000011', 'g', '0.013', '0.04', '0.000004', '2.000015', '2', 'NML (Philippines)', '15', 'active'),
(609, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '1', 'g', 'none', '1.000017', 'g', '0.010', '0.03', '0.000004', '1.000013', '2', 'NML (Philippines)', '15', 'active'),
(610, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '500', 'mg', 'none', '0.500013', 'g', '0.0083', '0.025', '0.000002', '0.5000110', '2', 'NML (Philippines)', '15', 'active'),
(611, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '200', 'mg', 'point', '0.200007', 'g', '0.0066', '0.020', '0.000004', '0.2000113', '2', 'NML (Philippines)', '15', 'active'),
(612, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '200', 'mg', 'none', '0.2000080', 'g', '0.0066', '0.020', '0.000001', '0.2000090', '2', 'NML (Philippines)', '15', 'active'),
(613, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '100', 'mg', 'none', '0.1000080', 'g', '0.0053', '0.016', '0.000001', '0.1000074', '2', 'NML (Philippines)', '15', 'active'),
(614, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '50', 'mg', 'none', '0.050004', 'g', '0.0040', '0.012', '0.000002', '0.0500059', '2', 'NML (Philippines)', '15', 'active'),
(615, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '20', 'mg', 'point', '0.0200040', 'g', '0.0033', '0.010', '0.000001', '0.0200028', '2', 'NML (Philippines)', '15', 'active'),
(616, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '20', 'mg', 'none', '0.020004', 'g', '0.0033', '0.010', '0.000001', '0.0200033', '2', 'NML (Philippines)', '15', 'active'),
(617, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '10', 'mg', 'none', '0.010003', 'g', '0.0026', '0.008', '0.000000', '0.0100032', '2', 'NML (Philippines)', '15', 'active'),
(618, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '5', 'mg', 'none', '0.005002', 'g', '0.0020', '0.006', '0.000001', '0.0050031', '2', 'NML (Philippines)', '15', 'active'),
(619, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '2', 'mg', 'point', '0.002003', 'g', '0.0020', '0.006', '0.000000', '0.0020026', '2', 'NML (Philippines)', '15', 'active'),
(620, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '2', 'mg', 'none', '0.002003', 'g', '0.0020', '0.006', '0.000001', '0.0020018', '2', 'NML (Philippines)', '15', 'active'),
(621, '4000014940 - Air density (1.18)', 'E2', 'OIML Class E2 Weights - Test weights (25 pcs)', '1', 'mg', 'none', '0.001001', 'g', '0.0020', '0.006', '0.000001', '0.0010021', '2', 'NML (Philippines)', '15', 'active'),
(622, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '10', 'kg', 'AFT', '10000.048', 'g', '50', '160', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(623, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '5', 'kg', 'AWF', '5000.024', 'g', '25', '30', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(624, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(625, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(626, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(627, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '500', 'g', 'AQF', '500.0017', 'g', '2.5', '8', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(628, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '200', 'g', 'AMY', '200.0007', 'g', '1', '3', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(629, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '200', 'g', 'AMX', '200.0004', 'g', '1', '3', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(630, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '100', 'g', 'ANL', '100.00037', 'g', '0.50', '1.6', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(631, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '50', 'g', 'AJL', '50.00028', 'g', '0.30', '1', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(632, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '20', 'g', 'AN5', '20.00007', 'g', '0.25', '0.8', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(633, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '20', 'g', 'AN4', '20.00026', 'g', '0.25', '0.8', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(634, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '10', 'g', 'AK2', '10.00028', 'g', '0.20', '0.6', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(635, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(636, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '2', 'g', 'ALT', '2.00007', 'g', '0.12', '0.4', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(637, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '2', 'g', 'ALS', '2.00011', 'g', '0.12', '0.4', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(638, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '1', 'g', 'AL5', '1.00006', 'g', '0.10', '0.3', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(639, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '500', 'mg', 'none', '0.50011', 'g', '0.080', '0.25', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(640, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '200', 'mg', 'point', '0.199993', 'g', '0.060', '0.2', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(641, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '200', 'mg', 'none', '0.199988', 'g', '0.060', '0.2', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(642, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '100', 'mg', 'none', '0.100079', 'g', '0.050', '0.16', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(643, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '50', 'mg', 'none', '0.050022', 'g', '0.040', '0.12', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(644, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '20', 'mg', 'point', '0.019996', 'g', '0.030', '0.1', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(645, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '20', 'mg', 'none', '0.020005', 'g', '0.030', '0.1', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(646, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '10', 'mg', 'none', '0.010008', 'g', '0.025', '0.08', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(647, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '2', 'mg', 'point', '0.002005', 'g', '0.020', '0.06', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(648, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '2', 'mg', 'none', '0.002003', 'g', '0.020', '0.06', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(649, '6031214 - For verification purpose only OLD STD 2022', 'F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 10 kg', '1', 'mg', 'none', '0.000998', 'g', '0.020', '0.06', '0', '0', '2', 'NML (Philippines)', '69', 'inactive'),
(650, '6021214 - For verification purpose only OLD STD 2022', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 20 kg', '20', 'kg', 'AC5', '20000.096', 'g', '100', '300', '', '', '2', 'NML (Philippines)', '68', 'active'),
(651, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '5', 'kg', 'A', '5000.021', 'g', '83', '800', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(652, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '10', 'kg', 'B', '10000.12', 'g', '160', '1600', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(653, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '10', 'kg', 'C', '10000.02', 'g', '160', '1600', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(654, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'D', '20000.27', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(655, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'E', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(656, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'F', '20000.27', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(657, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'G', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(658, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'H', '20000.33', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(659, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'I', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(660, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'J', '20000.27', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(661, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'K', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(662, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'L', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(663, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'M', '20000.27', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(664, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'N', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(665, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'O', '20000.17', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(666, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'P', '20000.33', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(667, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'Q', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(668, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'R', '20000.17', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(669, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'S', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(670, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'T', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(671, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'U', '20000.27', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(672, 'See Calibration Certificate - Air Density (1.2)', 'Free Nominal Mass Standards', 'None Indicated', '20', 'kg', 'V', '20000.07', 'g', '330', '3000', NULL, NULL, NULL, 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '71', 'active'),
(674, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '10', 'kg', 'APZ', '10000.1630', 'g', '160', '500', '0.0080000', '10000.1550', '2', 'NML (Philippines)', '73', 'active'),
(675, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '5', 'kg', 'AXY', '5000.0910', 'g', '80', '250', '0.0030000', '5000.0880', '2', 'NML (Philippines)', '73', 'active'),
(676, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'kg', 'BEQ', '2000.0420', 'g', '30', '100', '0.0030000', '2000.0450', '2', 'NML (Philippines)', '73', 'active'),
(677, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'kg', 'BEN', '2000.0330', 'g', '30', '100', '0.0030000', '2000.0360', '2', 'NML (Philippines)', '73', 'active'),
(678, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '1', 'kg', 'BQ6', '1000.0180', 'g', '16', '50', '0.0000000', '1000.0180', '2', 'NML (Philippines)', '73', 'active'),
(679, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '500', 'g', 'B8L', '500.0049', 'g', '11', '25', '0.0003000', '500.0046', '2', 'NML (Philippines)', '73', 'active'),
(680, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '200', 'g', 'BQ7', '200.0024', 'g', '3', '10', '0.0004000', '200.0020', '2', 'NML (Philippines)', '73', 'active'),
(681, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '200', 'g', 'BPZ', '200.0032', 'g', '3', '10', '0.0004000', '200.0028', '2', 'NML (Philippines)', '73', 'active'),
(682, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '100', 'g', 'BER', '100.0016', 'g', '1.6', '5', '0.0001000', '100.0015', '2', 'NML (Philippines)', '73', 'active'),
(683, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '50', 'g', 'BPK', '50.0006', 'g', '1.2', '3', '0.0001000', '50.0005', '2', 'NML (Philippines)', '73', 'active'),
(684, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '20', 'g', 'BSJ', '20.0006', 'g', '1.2', '2.5', '0.0003800', '20.0010', '2', 'NML (Philippines)', '73', 'active'),
(685, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '20', 'g', 'BSG', '20.0009', 'g', '1.2', '2.5', '0.0002100', '20.0011', '2', 'NML (Philippines)', '73', 'active'),
(686, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '10', 'g', 'B8Y', '10.0007', 'g', '1.2', '2', '0.0001200', '10.00058', '2', 'NML (Philippines)', '73', 'active'),
(687, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '5', 'g', 'B42', '5.0005', 'g', '1.2', '1.6', '0.0002400', '5.00026', '2', 'NML (Philippines)', '73', 'active'),
(688, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'g', 'BM3', '2.0002', 'g', '1.2', '1.2', '0.0000800', '2.00012', '2', 'NML (Philippines)', '73', 'active'),
(689, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'g', 'BLI', '2.0001', 'g', '1.2', '1.2', '0.0000600', '2.00004', '2', 'NML (Philippines)', '73', 'active'),
(690, '4640918 -  12-2022-Air Density (1.2)', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '1', 'g', 'B5D', '1.0005', 'g', '1.2', '1', '0.0002600', '1.00076', '2', 'NML (Philippines)', '73', 'active'),
(691, '09000800 -  2022 Air Density(1.2) ', 'M1', 'OIML Class M1 Weights - Set of Weights', '5', 'kg', 'none', '5000.027', 'g', '83', '250', '0.0000000', '5000.027', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '74', 'active'),
(692, '09000800 -  2022 Air Density(1.2) ', 'M1', 'OIML Class M1 Weights - Set of Weights', '2', 'kg', 'point', '2000.008', 'g', '33', '100', '0.0100000', '2000.008', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '74', 'active'),
(693, '09000800 -  2022 Air Density(1.2) ', 'M1', 'OIML Class M1 Weights - Set of Weights', '2', 'kg', 'none', '2000.008', 'g', '33', '100', '0.0200000', '2000.028', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '74', 'active'),
(694, '09000800 -  2022 Air Density(1.2) ', 'M1', 'OIML Class M1 Weights - Set of Weights', '1', 'kg', 'none', '1000.014', 'g', '16', '50', '0.0000000', '1000.014', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '74', 'active'),
(695, '09000800 -  2022 Air Density(1.2) ', 'M1', 'OIML Class M1 Weights - Set of Weights', '500', 'g', 'none', '500.003', 'g', '8.3', '25', '0.0041000', '500.007', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '74', 'active'),
(696, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'kg', 'none', '20000.085', 'g', '100', '300', '', '', '2', 'NML (Philippines)', '46', 'active'),
(697, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '10', 'kg', 'none', '10000.02', 'g', '50', '160', '', '', '2', 'NML (Philippines)', '46', 'active'),
(698, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '5', 'kg', 'none', '5000.002', 'g', '25', '80', '0', '0', '2', 'NML (Philippines)', '46', 'active'),
(699, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'kg', 'point', '1999.996', 'g', '10', '30', '', '', '2', 'NML (Philippines)', '46', 'active'),
(700, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'kg', 'none', '1999.995', 'g', '10', '30', '', '', '2', 'NML (Philippines)', '46', 'active'),
(701, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1', 'kg', 'none', '1000.0002', 'g', '5', '16', '', '', '2', 'NML (Philippines)', '46', 'active'),
(702, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '500', 'g', 'none', '499.9998', 'g', '2.5', '8', '0.00020', '500', '2', 'NML (Philippines)', '46', 'active'),
(703, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'g', 'point', '199.9993', 'g', '1', '3', '', '', '2', 'NML (Philippines)', '46', 'active'),
(704, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'g', 'none', '200.0013', 'g', '1', '3', '', '', '2', 'NML (Philippines)', '46', 'active'),
(705, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '100', 'g', 'none', '100.00073', 'g', '0.5', '1.6', '', '', '2', 'NML (Philippines)', '46', 'active'),
(706, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '50', 'g', 'none', '50.00025', 'g', '0.3', '1', '', '', '2', 'NML (Philippines)', '46', 'active'),
(707, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'g', 'point', '20.00029', 'g', '0.25', '0.8', '', '', '2', 'NML (Philippines)', '46', 'active'),
(708, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'g', 'none', '20.00007', 'g', '0.25', '0.8', '', '', '2', 'NML (Philippines)', '46', 'active'),
(709, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '10', 'g', 'none', '10.00012', 'g', '0.2', '0.6', '', '', '2', 'NML (Philippines)', '46', 'active'),
(710, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '5', 'g', 'none', '5.00003', 'g', '0.16', '0.5', '', '', '2', 'NML (Philippines)', '46', 'active'),
(711, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'g', 'point', '2.00013', 'g', '0.12', '0.4', '', '', '2', 'NML (Philippines)', '46', 'active'),
(712, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'g', 'none', '2.00012', 'g', '0.12', '0.4', '', '', '2', 'NML (Philippines)', '46', 'active'),
(713, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1', 'g', 'none', '1.00019', 'g', '0.1', '0.3', '', '', '2', 'NML (Philippines)', '46', 'active'),
(714, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '500', 'mg', 'none', '0.500073', 'g', '0.08', '0.25', '', '', '2', 'NML (Philippines)', '46', 'active'),
(715, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'mg', 'point', '0.200065', 'g', '0.06', '0.2', '', '', '2', 'NML (Philippines)', '46', 'active'),
(716, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'mg', 'none', '0.200058', 'g', '0.06', '0.2', '', '', '2', 'NML (Philippines)', '46', 'active'),
(717, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '100', 'mg', 'none', '0.10005', 'g', '0.05', '0.16', '', '', '2', 'NML (Philippines)', '46', 'active'),
(718, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '50', 'mg', 'none', '0.050035', 'g', '0.04', '0.12', '', '', '2', 'NML (Philippines)', '46', 'active'),
(719, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'mg', 'point', '0.020015', 'g', '0.03', '0.1', '', '', '2', 'NML (Philippines)', '46', 'active'),
(720, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.1', '', '', '2', 'NML (Philippines)', '46', 'active'),
(721, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '10', 'mg', 'none', '0.009999', 'g', '0.025', '0.08', '', '', '2', 'NML (Philippines)', '46', 'active'),
(722, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '5', 'mg', 'none', '0.005008', 'g', '0.02', '0.06', '', '', '2', 'NML (Philippines)', '46', 'active'),
(723, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'mg', 'point', '0.002002', 'g', '0.02', '0.06', '', '', '2', 'NML (Philippines)', '46', 'active'),
(724, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'mg', 'none', '0.002004', 'g', '0.02', '0.06', '', '', '2', 'NML (Philippines)', '46', 'active'),
(725, '57248', 'OIML Class F2', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1 ', 'mg', 'none', '0.001011', 'g', '0.02', '0.060', '', '', '2', 'NML (Philippines)', '46', 'active'),
(748, '91095 - Old Conventional Mass', 'OIML Class E2 Weights - Test weights', 'E2', '100', 'g', 'None', '100.00004', 'g', '0.05', '0.16', NULL, NULL, NULL, 'NML (Philippines)', '77', 'active'),
(750, '4000014940 - Air density (1.2)', 'OIML Class E2 Weights - Test weights (25 pcs)', 'E2', '5', 'kg', 'none', '5000.0038', 'g', '2.5', '8.000', '0.000300', '5000.0041', '2', 'NML (Philippines)', '78', 'active'),
(751, '4000014940 - Air density (1.2)', 'OIML Class E2 Weights - Test weights (25 pcs)', 'E2', '2', 'kg', 'point', '2000.0015', 'g', '1', '3.000', '0.000200', '2000.0017', '2', 'NML (Philippines)', '78', 'active'),
(752, '4000014940 - Air density (1.2)', 'OIML Class E2 Weights - Test weights (25 pcs)', 'E2', '2', 'kg', 'none', '2000.0013', 'g', '1', '3.000', '2000.001300', '0', '2', 'NML (Philippines)', '78', 'active'),
(753, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '1', 'kg', 'none', '999.9991', 'g', '5', '16', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(754, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '500', 'g', 'none', '500', 'g', '2.5', '8', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(755, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '200', 'g', 'point', '200.0009', 'g', '1', '3.0', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(756, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '200', 'g', 'none', '200.0002', 'g', '1', '3.0', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(757, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '100', 'g', 'none', '99.99985', 'g', '0.5', '1.6', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(758, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '50', 'g', 'none', '50.00019', 'g', '0.3', '1', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(759, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '20', 'g', 'point', '20.00022', 'g', '0.25', '0.8', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(760, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '20', 'g', 'none', '20.00032', 'g', '0.25', '0.8', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(761, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '10', 'g', 'none', '10.00021', 'g', '0.2', '0.6', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(762, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '5', 'g', 'none', '5.00021', 'g', '0.16', '0.5', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(763, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '2', 'g', 'point', '1.99989', 'g', '0.12', '0.4', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(764, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '2', 'g', 'none', '1.99992', 'g', '0.12', '0.4', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(765, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '1', 'g', 'none', '1', 'g', '0.1', '0.3', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(766, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '500', 'mg', 'none', '0.500054', 'g', '0.08', '0.25', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(767, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '200', 'mg', 'point', '0.200051', 'g', '0.06', '0.20', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(768, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '200', 'mg', 'none', '0.200045', 'g', '0.06', '0.20', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(769, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '100', 'mg', 'none', '0.100053', 'g', '0.05', '0.16', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(770, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '50', 'mg', 'none', '0.050004', 'g', '0.04', '0.12', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(771, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '20', 'mg', 'point', '0.019973', 'g', '0.03', '0.10', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(772, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.10', '0', '0', '2', 'NML (Philippines)', '79', 'active');
INSERT INTO `elect_table_3` (`id`, `serialNumber`, `type`, `class`, `nominalValue`, `nominalUnit`, `marking`, `conventionalMass`, `unit`, `uncertainty`, `mpe`, `drift`, `previousConventionalMass`, `coverageFactor`, `calibrationProvider`, `standardID`, `status`) VALUES
(773, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '10', 'mg', 'none', '0.010013', 'g', '0.025', '0.08', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(774, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '5', 'mg', 'none', '0.005014', 'g', '0.02', '0.06', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(775, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '2', 'mg', 'point', '0.002005', 'g', '0.02', '0.06', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(776, '57249 - Air density 1.18', 'OIML Class F2 Weights - Test weights, 2 mg to 1 kg', 'OIML Class F2', '2', 'mg', 'none', '0.002003', 'g', '0.02', '0.06', '0', '0', '2', 'NML (Philippines)', '79', 'active'),
(777, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '20', 'kg', 'none', '20000.085', 'g', '100', '300', '0.00000', '20000.085', '2', 'NML (Philippines)', '80', 'active'),
(778, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '10', 'kg', 'none', '10000.021', 'g', '50', '160', '0.00100', '10000.021', '2', 'NML (Philippines)', '80', 'active'),
(779, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '5', 'kg', 'none', '5000.002', 'g', '25', '30', '0.00600', '4999.996', '2', 'NML (Philippines)', '80', 'active'),
(780, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '2', 'kg', 'point', '1999.996', 'g', '10', '30', '0.00300', '1999.993', '2', 'NML (Philippines)', '80', 'active'),
(781, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '2', 'kg', 'none', '1999.995', 'g', '10', '30', '0.00100', '1999.994', '2', 'NML (Philippines)', '80', 'active'),
(782, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '1', 'kg', 'none', '1000.0002', 'g', '5', '16', '0.00000', '1000.0002', '2', 'NML (Philippines)', '80', 'active'),
(783, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '500', 'g', 'none', '499.9998', 'g', '2.5', '8', '0.00020', '500', '2', 'NML (Philippines)', '80', 'active'),
(784, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '200', 'g', 'point', '199.9993', 'g', '1', '3', '0.00010', '199.9994', '2', 'NML (Philippines)', '80', 'active'),
(785, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '200', 'g', 'none', '200.0013', 'g', '1', '3', '0.00000', '200.0013', '2', 'NML (Philippines)', '80', 'active'),
(786, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '100', 'g', 'none', '100.00073', 'g', '0.5', '1.6', '0.00004', '100.00077', '2', 'NML (Philippines)', '80', 'active'),
(787, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '50', 'g', 'none', '50.00025', 'g', '0.3', '1', '0.00008', '50.00033', '2', 'NML (Philippines)', '80', 'active'),
(788, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '20', 'g', 'point', '20.00029', 'g', '0.25', '0.8', '0.00001', '20.0003', '2', 'NML (Philippines)', '80', 'active'),
(789, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '20', 'g', 'none', '20.00007', 'g', '0.25', '0.8', '0.00002', '20.00009', '2', 'NML (Philippines)', '80', 'active'),
(790, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '10', 'g', 'none', '10.00012', 'g', '0.2', '0.6', '0.00004', '10.00008', '2', 'NML (Philippines)', '80', 'active'),
(791, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '5', 'g', 'none', '5.00003', 'g', '0.16', '0.5', '0.00000', '5.00003', '2', 'NML (Philippines)', '80', 'active'),
(792, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '2', 'g', 'point', '2.00013', 'g', '0.12', '0.4', '0.00001', '2.00012', '2', 'NML (Philippines)', '80', 'active'),
(793, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '2', 'g', 'none', '2.00012', 'g', '0.12', '0.4', '0.00001', '2.00011', '2', 'NML (Philippines)', '80', 'active'),
(794, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '1', 'g', 'none', '1.00019', 'g', '0.1', '0.3', '0.00000', '1.00019', '2', 'NML (Philippines)', '80', 'active'),
(795, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '500', 'mg', 'none', '0.500073', 'g', '0.08', '0.25', '0.00000', '0.500076', '2', 'NML (Philippines)', '80', 'active'),
(796, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '200', 'mg', 'point', '0.200065', 'g', '0.06', '0.2', '0.00000', '0.200066', '2', 'NML (Philippines)', '80', 'active'),
(797, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '200', 'mg', 'none', '0.200058', 'g', '0.06', '0.2', '0.00000', '0.200059', '2', 'NML (Philippines)', '80', 'active'),
(798, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '100', 'mg', 'none', '0.10005', 'g', '0.05', '0.16', '0.00000', '0.100054', '2', 'NML (Philippines)', '80', 'active'),
(799, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '50', 'mg', 'none', '0.05004', 'g', '0.04', '0.12', '0.00000', '0.050035', '2', 'NML (Philippines)', '80', 'active'),
(800, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '20', 'mg', 'point', '0.020015', 'g', '0.03', '0.1', '0.00001', '0.020004', '2', 'NML (Philippines)', '80', 'active'),
(801, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.1', '0.00001', '0.019993', '2', 'NML (Philippines)', '80', 'active'),
(802, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '10', 'mg', 'none', '0.009999', 'g', '0.025', '0.08', '0.00000', '0.010001', '2', 'NML (Philippines)', '80', 'active'),
(803, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '5', 'mg', 'none', '0.005008', 'g', '0.02', '0.06', '0.00000', '0.005007', '2', 'NML (Philippines)', '80', 'active'),
(804, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '2', 'mg', 'point', '0.002002', 'g', '0.02', '0.06', '0.00001', '0.002015', '2', 'NML (Philippines)', '80', 'active'),
(805, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '2', 'mg', 'none', '0.002004', 'g', '0.02', '0.06', '0.00001', '0.002017', '2', 'NML (Philippines)', '80', 'active'),
(806, '57248 - Old Conventional Mass', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', 'OIML Class F2', '1', 'mg', 'none', '0.001011', 'g', '0.02', '0.06', '0.00000', '0.001012', '2', 'NML (Philippines)', '80', 'active'),
(807, '6021214', 'OIML Class F2 Weights - Test weights, 20 kg', 'OIML Class F2', '20', 'kg', 'AC5', '20000.095', 'g', '100', '300', '0', '0', '2', 'NML (Philippines)', '81', 'active'),
(808, '09000800 - Old Conventional Mass - Air Density (1.18)', 'OIML Class M1 Weights - Set of Weights', 'M1', '5', 'kg', 'none', '5000.027', 'g', '83', '250', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '82', 'active'),
(809, '09000800 - Old Conventional Mass - Air Density (1.18)', 'OIML Class M1 Weights - Set of Weights', 'M1', '2', 'kg', 'none', '2000.018', 'g', '33', '100', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '82', 'active'),
(810, '09000800 - Old Conventional Mass - Air Density (1.18)', 'OIML Class M1 Weights - Set of Weights', 'M1', '2', 'kg', 'none', '2000.008', 'g', '33', '100', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '82', 'active'),
(811, '09000800 - Old Conventional Mass - Air Density (1.18)', 'OIML Class M1 Weights - Set of Weights', 'M1', '1', 'kg', 'none', '1000.016', 'g', '16', '50', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '82', 'active'),
(812, '09000800 - Old Conventional Mass - Air Density (1.18)', 'OIML Class M1 Weights - Set of Weights', 'M1', '500', 'g', 'none', '500.003', 'g', '8.3', '25', '0', '0', '2', '8.3', '82', 'active'),
(813, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '10', 'kg', 'APZ', '10000.1550', 'g', '160', '500', '0.0080000', '10000.1550', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(814, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '5', 'kg', 'AXY', '5000.0880', 'g', '80', '250', '0.0030000', '5000.0880', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(815, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '2', 'kg', 'BEQ', '2000.0450', 'g', '36', '100', '0.0030000', '2000.0450', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(816, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '2', 'kg', 'BEN', '2000.0360', 'g', '30', '100', '0.0030000', '2000.0360', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(817, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '1', 'kg', 'BQ6', '1000.0180', 'g', '16', '50', '0.0000000', '1000.0180', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(818, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '500', 'g', 'B8L', '500.0046', 'g', '8.0', '25', '0.0003000', '500.0046', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(819, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '200', 'g', 'BQ7', '200.0020', 'g', '3.0', '10', '0.0004000', '200.0020', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(820, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '200', 'g', 'BPZ', '200.0028', 'g', '3.0', '10', '0.0004000', '200.0028', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(821, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '100', 'g', 'BER', '100.0015', 'g', '1.6', '5', '0.0001000', '100.0015', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(822, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '50', 'g', 'BPK', '50.00050', 'g', '1.2', '3', '0.0001000', '50.0005', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(823, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '20', 'g', 'BSJ', '20.00098', 'g', '1.2', '2.5', '0.0003800', '20.0010', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(824, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '20', 'g', 'BSG', '20.00111', 'g', '1.2', '2.5', '0.0002100', '0.0002100', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(825, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '10', 'g', 'B8Y', '10.00058', 'g', '1.2', '2', '0.0001200', '10.00058', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(826, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '5', 'g', 'B42', '5.00026', 'g', '1.2', '1.6', '0.0002400', '5.00026', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(827, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '2', 'g', 'BM3', '2.00012', 'g', '1.2', '1.2', '0.0000800', '2.00012', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(828, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '2', 'g', 'BLI', '5.00004', 'g', '1.2', '1.2', '0.0000600', '2.00004', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(829, '4640918 -  12-2022-Air Density (1.18)', 'OIML Class M1 - Test weights, 1g to 10 kg', 'OIML Class M1 ', '1', 'g', 'B5D', '1.00076', 'g', '1.2', '1', '0.0002600', '1.00076', '2', 'NML (Philippines) through DOST CALABARZON - RML', '83', 'active'),
(830, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '5', 'kg', 'A', '5000.032', 'g', '170', '800', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(831, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '10', 'kg', 'B', '10000.16', 'g', '160', '1600', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(832, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '10', 'kg', 'C', '10000.02', 'g', '160', '1600', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(833, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'D', '19999.70', 'g', '300', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(834, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'E', '19999.56', 'g', '300', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(835, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'F', '20000.17', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(836, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'G', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(837, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'H', '20000.55', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(838, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'I', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(839, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'J', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(840, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'K', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(841, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'L', '19999.01', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(842, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'M', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(843, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'N', '20000.17', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(844, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'O', '19999.40', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(845, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'P', '20000.11', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(846, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'Q', '19999.29', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(847, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'R', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(848, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'S', '20000.47', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(849, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'T', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(850, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'U', '20000.17', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(851, 'See Calibration Certificate - Old STD, Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'V', '20000.28', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '84', 'active'),
(852, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '500', 'g', 'BXA', '500.00061', 'g', '0.80', '2.5', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(853, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '200', 'g', 'DZ9', '200.00011', 'g', '0.30', '1.0', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(854, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '200', 'g', 'DZ8', '200.00014', 'g', '0.30', '1.0', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(855, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '100', 'g', 'CL3', '100.00003', 'g', '0.16', '0.5', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(856, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '50', 'g', 'CG4', '49.99997', 'g', '0.10', '0.3', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(857, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '20', 'g', 'CUY', '19.999992', 'g', '0.08', '0.25', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(858, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '20', 'g', 'CUW', '20.000077', 'g', '0.08', '0.25', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(859, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '10', 'g', 'C7F', '10.000071', 'g', '0.06', '0.20', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(860, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '5', 'g', 'BPF', '5.000045', 'g', '0.05', '0.16', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(861, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '2', 'g', 'GI0', '2.000042', 'g', '0.04', '0.12', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(862, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '2', 'g', 'GHX', '2.000043', 'g', '0.04', '0.12', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(863, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '1', 'g', 'CFF', '1.000030', 'g', '0.03', '0.10', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(864, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '500', 'mg', 'none', '0.500010', 'g', '0.025', '0.08', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(865, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '200', 'mg', 'point', '0.500030', 'g', '0.020', '0.06', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(866, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '200', 'mg', 'none', '0.200033', 'g', '0.020', '0.06', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(867, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '100', 'mg', 'none', '0.100003', 'g', '0.016', '0.05', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(868, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '50', 'mg', 'none', '0.050015', 'g', '0.012', '0.04', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(869, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '20', 'mg', 'point', '0.020012', 'g', '0.010', '0.03', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(870, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '20', 'mg', 'none', '0.020000', 'g', '0.010', '0.03', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(871, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '10', 'mg', 'none', '0.020013', 'g', '0.008', '0.025', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(872, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '5', 'mg', 'none', '0.005003', 'g', '0.006', '0.020', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(873, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '2', 'mg', 'point', '0.001992', 'g', '0.006', '0.020', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(874, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '2', 'mg', 'none', '0.001995', 'g', '0.006', '0.020', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(875, '7740119 - Old Conventional Mass', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', 'OIML Class F1', '1', 'mg', 'none', '0.001001', 'g', '0.006', '0.020', '0', '0', '2', 'NML (Philippines)', '85', 'active'),
(876, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '5', 'kg', 'A', '5000.021', 'g', '83', '800', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI					 					', '86', 'active'),
(877, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '10', 'kg', 'B', '10000.12', 'g', '160', '1600', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI	 ', '86', 'active'),
(878, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '10', 'kg', 'C', '10000.02', 'g', '160', '1600', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(879, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'D', '20000.27', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(880, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'E', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(881, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'F', '20000.27', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(882, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'G', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(883, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'H', '20000.33', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(884, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'I', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(885, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'J', '20000.27', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(886, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'K', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(887, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'L', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(888, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'M', '20000.27', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(889, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'N', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(890, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'O', '20000.17', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(891, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'P', '20000.33', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(892, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'Q', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(893, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'R', '20000.17', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(894, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'S', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(895, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'T', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(896, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'U', '20000.27', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(897, 'See Calibration Certificate - Air Density (1.18)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'V', '20000.07', 'g', '330', '3000', '0', '0', '2', 'Sartorius Lab Instruments GmbH & Co. KG through FPSI', '86', 'active'),
(898, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '10', 'kg', 'APZ', '10000.1550', 'g', '160', '500', '0', '0', ' 2', 'NML (Philippines)', '87', 'active'),
(899, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '5', 'kg', 'AXY', '5000.0880', 'g', '80', '250', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(900, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'kg', 'BEQ', '2000.0450', 'g', '36', '100', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(901, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'kg', 'BEN', '2000.0360', 'g', '30', '100', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(902, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '1', 'kg', 'BQ6', '1000.0180', 'g', '16', '50', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(903, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '500', 'g', 'B8L', '500.0046', 'g', '8.0', '25', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(904, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '200', 'g', 'BQ7', '200.0020', 'g', '3.0', '10', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(905, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '200', 'g', 'BPZ', '200.0028', 'g', '3.0', '10', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(906, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '100', 'g', 'BER', '100.0015', 'g', '1.6', '5', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(907, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '50', 'g', 'BPK', '50.0005', 'g', '1.0', '3', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(908, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '20', 'g', 'BSJ', '20.0010', 'g', '0.81', '2.5', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(909, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '20', 'g', 'BSG', '20.0011', 'g', '0.80', '2.5', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(910, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '10', 'g', 'B8Y', '10.0006', 'g', '0.60', '2', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(911, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '5', 'g', 'B42', '5.0003', 'g', '0.50', '1.6', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(912, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'g', 'BM3', '2.0001', 'g', '0.40', '1.2', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(913, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '2', 'g', 'BLI', '5.0000', 'g', '0.40', '1.2', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(914, '4640918 -  12-2022-Air Density (1.18) Weighing Scale', 'OIML Class M1 ', 'OIML Class M1 - Test weights, 1g to 10 kg', '1', 'g', 'B5D', '1.0008', 'g', '0.65', '1', '0', '0', '2', 'NML (Philippines)', '87', 'active'),
(915, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '5', 'kg', 'A', '5000.032', 'g', '170', '800', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(916, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '10', 'kg', 'B', '10000.16', 'g', '160', '1600', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(917, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '10', 'kg', 'C', '10000.02', 'g', '160', '1600', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(918, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'D', '19999.70', 'g', '300', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(919, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'E', '19999.56', 'g', '300', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(920, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'F', '20000.17', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(921, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'G', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(922, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'H', '20000.55', 'g', '340', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(923, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'I', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(924, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'J', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(925, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'K', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(926, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'L', '19999.01', 'g', '310', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(927, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'M', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(928, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'N', '20000.17', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(929, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'O', '19999.40', 'g', '300', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(930, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'P', '20000.11', 'g', '300', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(931, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'Q', '19999.29', 'g', '420', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(932, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'R', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(933, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'S', '20000.47', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(934, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'T', '20000.07', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(935, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'U', '20000.17', 'g', '330', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(936, 'See Calibration Certificate - Old Air Density (1.2)', 'None Indicated', 'Free Nominal Mass Standards', '20', 'kg', 'V', '20000.28', 'g', '420', '3000', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '88', 'active'),
(937, '09000800 -  16/11/2022 Air Density(1.18)', 'OIML Class M1 Weights - Set of Weights ', 'M1', '5', 'kg', 'none', '5000.027', 'g', '83', '250', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '89', 'inactive'),
(938, '09000800 -  16/11/2022 Air Density(1.18)', 'OIML Class M1 Weights - Set of Weights ', 'M1', '2', 'kg', 'point', '2000.018', 'g', '33', '100', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '89', 'inactive'),
(939, '09000800 -  16/11/2022 Air Density(1.18)', 'OIML Class M1 Weights - Set of Weights ', 'M1', '2', 'kg', 'none', '2000.008', 'g', '33', '100', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '89', 'inactive'),
(940, '09000800 -  16/11/2022 Air Density(1.18)', 'OIML Class M1 Weights - Set of Weights ', 'M1', '1', 'kg', 'none', '1000.016', 'g', '16', '50', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '89', 'inactive'),
(941, '09000800 -  16/11/2022 Air Density(1.18)', 'OIML Class M1 Weights - Set of Weights ', 'M1', '500', 'g', 'none', '500.003', 'g', '8.3', '25', '0', '0', '2', 'NML (Philippines) through DOST CALABARZON - RML', '89', 'inactive'),
(942, '6031214 - Air density (1.18)', NULL, NULL, '10', 'kg', 'AFT', '10000.046', 'g', '50', '160', '0', '0', '2', NULL, '90', 'inactive'),
(943, '6031214 - Air density (1.18)', NULL, NULL, '5', 'kg', 'AWF', '5000.023', 'g', '25', '80', '0.0010', '5000.024', '2', NULL, '90', 'inactive'),
(944, '6031214 - Air density (1.18)', NULL, NULL, '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', '0.0000', '2000.006', '2', NULL, '90', 'inactive'),
(945, '6031214 - Air density (1.18)', NULL, NULL, '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', '0', '0', '2', NULL, '90', 'inactive'),
(946, '6031214 - Air density (1.18)', NULL, NULL, '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', '0', '0', '2', NULL, '90', 'inactive'),
(947, '6031214 - Air density (1.18)', NULL, NULL, '500', 'g', 'AQF', '500.0017', 'g', '2.5', '8', '0', '0', '2', NULL, '90', 'inactive'),
(948, '6031214 - Air density (1.18)', NULL, NULL, '200', 'g', 'AMY', '200.0004', 'g', '1', '3', '0', '0', '2', NULL, '90', 'inactive'),
(949, '6031214 - Air density (1.18)', NULL, NULL, '200', 'g', 'AMX', '200.0007', 'g', '1', '3', '0', '0', '2', NULL, '90', 'inactive'),
(950, '6031214 - Air density (1.18)', NULL, NULL, '100', 'g', 'ANL', '100.00039', 'g', '0.50', '1.6', '0.00002', '0', '2', NULL, '90', 'inactive'),
(951, '6031214 - Air density (1.18)', NULL, NULL, '50', 'g', 'AJL', '50.00026', 'g', '0.30', '1', '0.00002', '0', '2', NULL, '90', 'inactive'),
(952, '6031214 - Air density (1.18)', NULL, NULL, '20', 'g', 'AN5', '20.00027', 'g', '0.25', '0.8', '0', '0', '2', NULL, '90', 'inactive'),
(953, '6031214 - Air density (1.18)', NULL, NULL, '20', 'g', 'AN4', '20.00007', 'g', '0.25', '0.8', '0', '0', '2', NULL, '90', 'inactive'),
(954, '6031214 - Air density (1.18)', NULL, NULL, '10', 'g', 'AK2', '10.0003', 'g', '0.20', '0.6', '0.00002', '0', '2', NULL, '90', 'inactive'),
(955, '6031214 - Air density (1.18)', NULL, NULL, '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', '0', '0', '2', NULL, '90', 'inactive'),
(956, '6031214 - Air density (1.18)', NULL, NULL, '2', 'g', 'ALT', '2.00011', 'g', '0.12', '0.4', '0', '0', '2', NULL, '90', 'inactive'),
(957, '6031214 - Air density (1.18)', NULL, NULL, '2', 'g', 'ALS', '2.00007', 'g', '0.12', '0.4', '0.00004', '0', '2', NULL, '90', 'inactive'),
(958, '6031214 - Air density (1.18)', NULL, NULL, '1', 'g', 'AL5', '1.00005', 'g', '0.10', '0.3', '0.00001', '0', '2', NULL, '90', 'inactive'),
(959, '6031214 - Air density (1.18)', NULL, NULL, '500', 'mg', 'none', '0.50001', 'g', '0.080', '0.25', '0', '0', '2', NULL, '90', 'inactive'),
(960, '6031214 - Air density (1.18)', NULL, NULL, '200', 'mg', 'point', '0.199995', 'g', '0.060', '0.2', '0', '0', '2', NULL, '90', 'inactive'),
(961, '6031214 - Air density (1.18)', NULL, NULL, '200', 'mg', 'none', '0.199989', 'g', '0.060', '0.2', '0', '0', '2', NULL, '90', 'inactive'),
(962, '6031214 - Air density (1.18)', NULL, NULL, '100', 'mg', 'none', '0.100075', 'g', '0.050', '0.16', '0', '0', '2', NULL, '90', 'inactive'),
(963, '6031214 - Air density (1.18)', NULL, NULL, '50', 'mg', 'none', '0.050021', 'g', '0.040', '0.12', '0', '0', '2', NULL, '90', 'inactive'),
(964, '6031214 - Air density (1.18)', NULL, NULL, '20', 'mg', 'point', '0.019997', 'g', '0.030', '0.1', '0', '0', '2', NULL, '90', 'inactive'),
(965, '6031214 - Air density (1.18)', NULL, NULL, '20', 'mg', 'none', '0.020007', 'g', '0.030', '0.10', '0', '0', '2', NULL, '90', 'inactive'),
(966, '6031214 - Air density (1.18)', NULL, NULL, '10', 'mg', 'none', '0.010006', 'g', '0.025', '0.08', '0', '0', '2', NULL, '90', 'inactive'),
(967, '6031214 - Air density (1.18)', NULL, NULL, '2', 'mg', 'point', '0.00201', 'g', '0.020', '0.06', '0', '0', '2', NULL, '90', 'inactive'),
(968, '6031214 - Air density (1.18)', NULL, NULL, '2', 'mg', 'none', '0.002008', 'g', '0.020', '0.06', '0', '0', '2', NULL, '90', 'inactive'),
(969, '6031214 - Air density (1.18)', NULL, NULL, '1', 'mg', 'none', '0.000997', 'g', '0.020', '0.06', '0', '0', '2', NULL, '90', 'inactive'),
(970, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '10', 'kg', 'AFT', '10000.046', 'g', '50', '160', '0', '1.2', '2', NULL, '91', 'inactive'),
(971, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '5', 'kg', 'AWF', '5000.023', 'g', '25', '80', '0', '0', '2', NULL, '91', 'inactive'),
(972, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', '0', '1.2', '2', NULL, '91', 'inactive'),
(973, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', '0', '1.2', '2', NULL, '91', 'inactive'),
(974, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', '0', '1.2', '2', NULL, '91', 'inactive'),
(975, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '500', 'kg', 'AQF', '500.0017', 'g', '2.5', '8', '0', '1.2', '2', NULL, '91', 'inactive'),
(976, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '200', 'g', 'AMY', '200.0004', 'g', '1', '3', '0', '1.2', '2', NULL, '91', 'inactive'),
(977, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '200', 'g', 'AMX', '200.0007', 'g', '1', '3', '0', '1.2', '2', NULL, '91', 'inactive'),
(978, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '100', 'g', 'ANL', '100.00039', 'g', '0.50', '1.6', '0', '1.2', '2', NULL, '91', 'inactive'),
(979, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '50', 'g', 'AJL', '50.00026', 'g', '0.30', '1', '0', '1.2', '2', NULL, '91', 'inactive'),
(980, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '20', 'g', 'AN5', '20.00007', 'g', '0.25', '0.8', '0', '1.2', '2', NULL, '91', 'inactive'),
(981, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '20', 'g', 'AN4', '20.00027', 'g', '0.25', '0.8', '0', '1.2', '2', NULL, '91', 'inactive'),
(982, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '10', 'g', 'AK2', '10.0003', 'g', '0.20', '0.6', '0', '1.2', '2', NULL, '91', 'inactive'),
(983, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', '0', '1.2', '2', NULL, '91', 'inactive'),
(984, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '2', 'g', 'ALT', '2.00007', 'g', '0.12', '0.4', '0', '1.2', '2', NULL, '91', 'inactive'),
(985, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '2', 'g', 'ALS', '2.00011', 'g', '0.12', '0.4', '0', '1.2', '2', NULL, '91', 'inactive'),
(986, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '1', 'g', 'AL5', '1.00005', 'g', '0.10', '0.3', '0', '1.2', '2', NULL, '91', 'inactive'),
(987, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '500', 'mg', 'none', '0.50001', 'g', '0.080', '0.25', '0', '1.2', '2', NULL, '91', 'inactive'),
(988, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '200', 'mg', 'point', '0.199995', 'g', '0.060', '0.2', '0', '1.2', '2', NULL, '91', 'inactive'),
(989, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '200', 'mg', 'none', '0.199989', 'g', '0.060', '0.2', '0', '1.2', '2', NULL, '91', 'inactive'),
(990, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '100', 'mg', 'none', '0.100075', 'g', '0.050', '0.16', '0', '1.2', '2', NULL, '91', 'inactive'),
(991, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '50', 'mg', 'none', '0.050021', 'g', '0.040', '0.12', '0', '1.2', '2', NULL, '91', 'inactive'),
(992, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '20', 'mg', 'point', '0.019997', 'g', '0.030', '0.1', '0', '1.2', '2', NULL, '91', 'inactive'),
(993, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '20', 'mg', 'none', '0.020007', 'g', '0.030', '0.1', '0', '1.2', '2', NULL, '91', 'inactive'),
(994, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '10', 'mg', 'none', '0.010006', 'g', '0.025', '0.8', '0', '1.2', '2', NULL, '91', 'inactive'),
(995, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '2', 'mg', 'point', '0.00201', 'g', '0.020', '0.06', '0', '1.2', '2', NULL, '91', 'inactive'),
(996, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '2', 'mg', 'none', '0.002008', 'g', '0.020', '0.06', '0', '1.2', '2', NULL, '91', 'inactive'),
(997, '6031214 - Air Density (1.2) No Drift', NULL, NULL, '1', 'mg', 'none', '0.000997', 'g', '0.020', '0.060', '0', '1.2', '2', NULL, '91', 'inactive'),
(998, '91096', NULL, NULL, '1', 'kg', '1', '1', 'g', '1', '1', '1', '2', '2', NULL, '5', 'inactive'),
(999, '91096-latest 2024', NULL, NULL, '200', 'g', 'None', '200.00007', 'g', '0.1', '0.3', '0', '0', '2', NULL, '94', 'active'),
(1000, '91095-latest 2024', NULL, NULL, '100', 'g', 'None', '100.00004', 'g', '0.05', '0.16', '0', '0', '2', NULL, '95', 'active'),
(1001, '91094 -latest 2024', NULL, NULL, '50', 'g', 'None', '50.00003', 'g', '0.03', '0.1', '0', '0', '2', NULL, '96', 'active'),
(1002, '91093-latest 2024', NULL, NULL, '10', 'g', 'None', '10.000001', 'g', '0.02', '0.06', '0', '0', '2', NULL, '97', 'active'),
(1003, '4000014940-latest 2024', NULL, NULL, '5', 'kg', 'none', '5000.0038', 'g', '2.5', '8', '0', '0', '2', NULL, '98', 'active'),
(1004, '4000014940-latest 2024', NULL, NULL, '2', 'kg', 'point', '2000.0015', 'g', '1.00', '3', '0', '0', '2', NULL, '98', 'active'),
(1005, '4000014940-latest 2024', NULL, NULL, '2', 'kg', 'none', '2000.0013', 'g', '1.00', '3', '0', '0', '2', NULL, '98', 'active'),
(1006, '4000014940-latest 2024', NULL, NULL, '1', 'kg', 'none', '1000.00036', 'g', '0.53', '1.6', '0', '0', '2', NULL, '98', 'active'),
(1007, '4000014940-latest 2024', NULL, NULL, '500', 'g', 'none', '499.99999', 'g', '0.26', '0.8', '0', '0', '2', NULL, '98', 'active'),
(1008, '4000014940-latest 2024', NULL, NULL, '200', 'g', 'point', '199.99997', 'g', '0.10', '0.3', '0', '0', '2', NULL, '98', 'active'),
(1009, '4000014940-latest 2024', NULL, NULL, '200', 'g', 'none', '199.99997', 'g', '0.10', '0.3', '0', '0', '2', NULL, '98', 'active'),
(1010, '4000014940-latest 2024', NULL, NULL, '100', 'g', 'none', '100.00002', 'g', '0.053', '0.16', '0', '0', '2', NULL, '98', 'active'),
(1011, '4000014940-latest 2024', NULL, NULL, '50', 'g', 'none', '49.99997', 'g', '0.033', '0.1', '0', '0', '2', NULL, '98', 'active'),
(1012, '4000014940-latest 2024', NULL, NULL, '20', 'g', 'point', '20.000007', 'g', '0.026', '0.08', '0', '0', '2', NULL, '98', 'active'),
(1013, '4000014940-latest 2024', NULL, NULL, '20', 'g', 'none', '20.000016', 'g', '0.026', '0.08', '0', '0', '2', NULL, '98', 'active');
INSERT INTO `elect_table_3` (`id`, `serialNumber`, `type`, `class`, `nominalValue`, `nominalUnit`, `marking`, `conventionalMass`, `unit`, `uncertainty`, `mpe`, `drift`, `previousConventionalMass`, `coverageFactor`, `calibrationProvider`, `standardID`, `status`) VALUES
(1014, '4000014940-latest 2024', NULL, NULL, '10', 'g', 'none', '9.999974', 'g', '0.020', '0.06', '0', '0', '2', NULL, '98', 'active'),
(1015, '4000014940-latest 2024', NULL, NULL, '5', 'g', 'none', '5.000017', 'g', '0.016', '0.05', '0', '0', '2', NULL, '98', 'active'),
(1016, '4000014940-latest 2024', NULL, NULL, '2', 'g', 'point', '2.000013', 'g', '0.013', '0.04', '0', '0', '2', NULL, '98', 'active'),
(1017, '4000014940-latest 2024', NULL, NULL, '2', 'g', 'none', '2.000011', 'g', '0.013', '0.04', '0', '0', '2', NULL, '98', 'active'),
(1018, '4000014940-latest 2024', NULL, NULL, '1', 'g', 'none', '1.000017', 'g', '0.010', '0.03', '0', '0', '2', NULL, '98', 'active'),
(1019, '4000014940-latest 2024', NULL, NULL, '500', 'mg', 'none', '0.5000130', 'g', '0.0083', '0.025', '0', '0', '2', NULL, '98', 'active'),
(1020, '4000014940-latest 2024', NULL, NULL, '200', 'mg', 'point', '0.2000070', 'g', '0.0066', '0.02', '0', '0', '2', NULL, '98', 'active'),
(1021, '4000014940-latest 2024', NULL, NULL, '200', 'mg', 'none', '0.2000080', 'g', '0.0066', '0.02', '0', '0', '2', NULL, '98', 'active'),
(1022, '4000014940-latest 2024', NULL, NULL, '100', 'mg', 'none', '0.1000080', 'g', '0.0053', '0.016', '0', '0', '2', NULL, '98', 'active'),
(1023, '4000014940-latest 2024', NULL, NULL, '50', 'mg', 'none', '0.0500040', 'g', '0.0040', '0.012', '0', '0', '2', NULL, '98', 'active'),
(1024, '4000014940-latest 2024', NULL, NULL, '20', 'mg', 'point', '0.0200040', 'g', '0.0033', '0.01', '0', '0', '2', NULL, '98', 'active'),
(1025, '4000014940-latest 2024', NULL, NULL, '20', 'mg', 'none', '0.0200040', 'g', '0.0033', '0.01', '0', '0', '2', NULL, '98', 'active'),
(1026, '4000014940-latest 2024', NULL, NULL, '10', 'mg', 'none', '0.0100030', 'g', '0.0026', '0.008', '0', '0', '2', NULL, '98', 'active'),
(1027, '4000014940-latest 2024', NULL, NULL, '5', 'mg', 'none', '0.0050020', 'g', '0.0020', '0.006', '0', '0', '2', NULL, '98', 'active'),
(1028, '4000014940-latest 2024', NULL, NULL, '2', 'mg', 'point', '0.0020030', 'g', '0.0020', '0.006', '0', '0', '2', NULL, '98', 'active'),
(1029, '4000014940-latest 2024', NULL, NULL, '2', 'mg', 'none', '0.0020030', 'g', '0.0020', '0.006', '0', '0', '2', NULL, '98', 'active'),
(1030, '4000014940-latest 2024', NULL, NULL, '1', 'mg', 'none', '0.0010010', 'g', '0.0020', '0.006', '0', '0', '2', NULL, '98', 'active'),
(1031, '4000014940-2 latest 2024', NULL, NULL, '5', 'kg', 'none', '5000.004', 'g', '2.5', '8', '0', '0', '2', NULL, '99', 'active'),
(1032, '4000014940-2 latest 2024', NULL, NULL, '2', 'kg', 'point', '2000.0014', 'g', '1.00', '3', '0', '0', '2', NULL, '99', 'active'),
(1033, '4000014940-2 latest 2024', NULL, NULL, '2', 'kg', 'none', '2000.0016', '', '1.00', '3', '0', '0', '2', NULL, '99', 'active'),
(1034, '7740119-latest 2024', NULL, NULL, '500', 'g', 'BXA', '500.00061', 'g', '0.80', '2.5', '0', '0', '2', NULL, '100', 'active'),
(1035, '7740119-latest 2024', NULL, NULL, '200', 'g', 'DZ9', '200.00011', 'g', '0.30', '1.0', '0', '0', '2', NULL, '100', 'active'),
(1036, '7740119-latest 2024', NULL, NULL, '200', 'g', 'DZ8', '200.00014', 'g', '0.30', '1.0', '0', '0', '2', NULL, '100', 'active'),
(1037, '7740119-latest 2024', NULL, NULL, '100', 'g', 'CL3', '100.00003', 'g', '0.16', '0.5', '0', '0', '2', NULL, '100', 'active'),
(1038, '7740119-latest 2024', NULL, NULL, '50', 'g', 'CG4', '49.99997', 'g', '0.10', '0.3', '0', '0', '2', NULL, '100', 'active'),
(1039, '7740119-latest 2024', NULL, NULL, '20', 'g', 'CUY', '20.000077', 'g', '0.08', '0.25', '0', '0', '2', NULL, '100', 'active'),
(1040, '7740119-latest 2024', NULL, NULL, '20', 'g', 'C7F', '10.000071', 'g', '0.06', '0.20', '0', '0', '2', NULL, '100', 'active'),
(1041, '7740119-latest 2024', NULL, NULL, '5', 'g', 'BPF', '5.000045', 'g', '0.05', '0.16', '0', '0', '2', NULL, '100', 'active'),
(1042, '7740119-latest 2024', NULL, NULL, '2', 'g', 'GI0', '2.000042', 'g', '0.04', '0.12', '0', '0', '2', NULL, '100', 'active'),
(1043, '7740119-latest 2024', NULL, NULL, '2', 'g', 'GHX', '2.000043', 'g', '0.04', '0.12', '0', '0', '2', NULL, '100', 'active'),
(1044, '7740119-latest 2024', NULL, NULL, '1', 'g', 'CFF', '1.000030', 'g', '0.03', '0.10', '0', '0', '2', NULL, '100', 'active'),
(1045, '7740119-latest 2024', NULL, NULL, '500', 'mg', 'none', '0.500010', 'g', '0.025', '0.08', '0', '0', '2', NULL, '100', 'active'),
(1046, '7740119-latest 2024', NULL, NULL, '200', 'mg', 'point', '0.500030', 'g', '0.020', '0.06', '0', '0', '2', NULL, '100', 'active'),
(1047, '7740119-latest 2024', NULL, NULL, '200', 'mg', 'none', '0.200033', 'g', '0.020', '0.06', '0', '0', '2', NULL, '100', 'active'),
(1048, '7740119-latest 2024', NULL, NULL, '100', 'mg', 'none', '0.100003', 'g', '0.016', '0.05', '0', '0', '2', NULL, '100', 'active'),
(1049, '7740119-latest 2024', NULL, NULL, '50', 'mg', 'none', '0.050015', 'g', '0.012', '0.04', '0', '0', '2', NULL, '100', 'active'),
(1050, '7740119-latest 2024', NULL, NULL, '20', 'mg', 'point', '0.020012', 'g', '0.010', '0.03', '0', '0', '2', NULL, '100', 'active'),
(1051, '7740119-latest 2024', NULL, NULL, '20', 'mg', 'none', '0.020000', 'g', '0.010', '0.03', '0', '0', '2', NULL, '100', 'active'),
(1052, '7740119-latest 2024', NULL, NULL, '10', 'mg', 'none', '0.020013', 'g', '0.008', '0.025', '0', '0', '2', NULL, '100', 'active'),
(1053, '7740119-latest 2024', NULL, NULL, '5', 'mg', 'none', '0.005003', 'g', '0.006', '0.020', '0', '0', '2', NULL, '100', 'active'),
(1054, '7740119-latest 2024', NULL, NULL, '2', 'mg', 'point', '0.001992', 'g', '0.006', '0.020', '0', '0', '2', NULL, '100', 'active'),
(1055, '7740119-latest 2024', NULL, NULL, '2', 'mg', 'none', '0.001995', 'g', '0.006', '0.020', '0', '0', '2', NULL, '100', 'active'),
(1056, '7740119-latest 2024', NULL, NULL, '1', 'mg', 'none', '0.001001', 'g', '0.006', '0.020', '0', '0', '2', NULL, '100', 'active'),
(1057, '57249-latest 2024', NULL, NULL, '1', 'kg', 'none', '999.9991', 'g', '5', '16', '0', '0', '2', NULL, '101', 'active'),
(1058, '57249-latest 2024', NULL, NULL, '500', 'g', 'none', '500', 'g', '2.5', '8', '0', '0', '2', NULL, '101', 'active'),
(1059, '57249-latest 2024', NULL, NULL, '200', 'g', 'point', '200.0009', 'g', '1', '3.0', '0', '0', '2', NULL, '101', 'active'),
(1060, '57249-latest 2024', NULL, NULL, '200', 'g', 'none', '200.0002', 'g', '1', '3.0', '0', '0', '2', NULL, '101', 'active'),
(1061, '57249-latest 2024', NULL, NULL, '100', 'g', 'none', '99.99985', 'g', '0.5', '1.6', '0', '0', '2', NULL, '101', 'active'),
(1062, '57249-latest 2024', NULL, NULL, '50', 'g', 'none', '50.00019', 'g', '0.3', '1', '0', '0', '2', NULL, '101', 'active'),
(1063, '57249-latest 2024', NULL, NULL, '20', 'g', 'point', '20.00022', 'g', '0.25', '0.8', '0', '0', '2', NULL, '101', 'active'),
(1064, '57249-latest 2024', NULL, NULL, '20', 'g', 'none', '20.00032', 'g', '0.25', '0.8', '0', '0', '2', NULL, '101', 'active'),
(1065, '57249-latest 2024', NULL, NULL, '10', 'g', 'none', '10.00021', 'g', '0.2', '0.6', '0', '0', '2', NULL, '101', 'active'),
(1066, '57249-latest 2024', NULL, NULL, '5', 'g', 'none', '5.00021', 'g', '0.16', '0.5', '0', '0', '2', NULL, '101', 'active'),
(1067, '57249-latest 2024', NULL, NULL, '2', 'g', 'point', '1.99989', 'g', '0.12', '0.4', '0', '0', '2', NULL, '101', 'active'),
(1068, '57249-latest 2024', NULL, NULL, '2', 'g', 'none', '1.99992', 'g', '0.12', '0.4', '0', '0', '2', NULL, '101', 'active'),
(1069, '57249-latest 2024', NULL, NULL, '1', 'g', 'none', '1', 'g', '0.1', '0.3', '0', '0', '2', NULL, '101', 'active'),
(1070, '57249-latest 2024', NULL, NULL, '500', 'mg', 'none', '0.500054', 'g', '0.08', '0.25', '0', '0', '2', NULL, '101', 'active'),
(1071, '57249-latest 2024', NULL, NULL, '200', 'mg', 'point', '0.200051', 'g', '0.06', '0.20', '0', '0', '2', NULL, '101', 'active'),
(1072, '57249-latest 2024', NULL, NULL, '200', 'mg', 'none', '0.200045', 'g', '0.06', '0.20', '0', '0', '2', NULL, '101', 'active'),
(1073, '57249-latest 2024', NULL, NULL, '100', 'mg', 'none', '0.100053', 'g', '0.05', '0.16', '0', '0', '2', NULL, '101', 'active'),
(1074, '57249-latest 2024', NULL, NULL, '50', 'mg', 'none', '0.050004', 'g', '0.04', '0.12', '0', '0', '2', NULL, '101', 'active'),
(1075, '57249-latest 2024', NULL, NULL, '20', 'mg', 'point', '0.019973', 'g', '0.03', '0.10', '0', '0', '2', NULL, '101', 'active'),
(1076, '57249-latest 2024', NULL, NULL, '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.10', '0', '0', '2', NULL, '101', 'active'),
(1077, '57249-latest 2024', NULL, NULL, '10', 'mg', 'none', '0.010013', 'g', '0.025', '0.08', '0', '0', '2', NULL, '101', 'active'),
(1078, '57249-latest 2024', NULL, NULL, '5', 'mg', 'none', '0.005014', 'g', '0.02', '0.06', '0', '0', '2', NULL, '101', 'active'),
(1079, '57249-latest 2024', NULL, NULL, '2', 'mg', 'point', '0.002005', 'g', '0.02', '0.06', '0', '0', '2', NULL, '101', 'active'),
(1080, '57249-latest 2024', NULL, NULL, '2', 'mg', 'none', '0.002003', 'g', '0.02', '0.06', '0', '0', '2', NULL, '101', 'active'),
(1081, '6031214-latest 2024', NULL, NULL, '10', 'kg', 'AFT', '10000.046', 'g', '50', '160', '0', '0', '2', NULL, '102', 'active'),
(1082, '6031214-latest 2024', NULL, NULL, '5', 'kg', 'AWF', '5000.023', 'g', '25', '80', '0', '0', '2', NULL, '102', 'active'),
(1083, '6031214-latest 2024', NULL, NULL, '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', '0', '0', '2', NULL, '102', 'active'),
(1084, '6031214-latest 2024', NULL, NULL, '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', '0', '0', '2', NULL, '102', 'active'),
(1085, '6031214-latest 2024', NULL, NULL, '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', '0', '0', '2', NULL, '102', 'active'),
(1086, '6031214-latest 2024', NULL, NULL, '500', 'g', 'AQF', '500.0017', 'g', '2.5', '8', '0', '0', '2', NULL, '102', 'active'),
(1087, '6031214-latest 2024', NULL, NULL, '200', 'g', 'AMY', '200.0004', 'g', '1', '3', '0', '0', '2', NULL, '102', 'active'),
(1088, '6031214-latest 2024', NULL, NULL, '200', 'g', 'AMX', '200.0007', 'g', '1', '3', '0', '0', '2', NULL, '102', 'active'),
(1089, '6031214-latest 2024', NULL, NULL, '100', 'g', 'ANL', '100.00039', 'g', '0.50', '1.6', '0', '0', '2', NULL, '102', 'active'),
(1090, '6031214-latest 2024', NULL, NULL, '50', 'g', 'AJL', '50.00026', 'g', '0.30', '1', '0', '0', '2', NULL, '102', 'active'),
(1091, '6031214-latest 2024', NULL, NULL, '20', 'g', 'AN5', '20.00027', 'g', '0.25', '0.8', '0', '0', '2', NULL, '102', 'active'),
(1092, '6031214-latest 2024', NULL, NULL, '20', 'g', 'AN4', '20.00007', 'g', '0.25', '0.8', '0', '0', '2', NULL, '102', 'active'),
(1093, '6031214-latest 2024', NULL, NULL, '10', 'g', 'AK2', '10.0003', 'g', '0.20', '0.6', '0', '0', '2', NULL, '102', 'active'),
(1094, '6031214-latest 2024', NULL, NULL, '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', '0', '0', '2', NULL, '102', 'active'),
(1095, '6031214-latest 2024', NULL, NULL, '2', 'g', 'ALT', '2.00011', 'g', '0.12', '0.4', '0', '0', '2', NULL, '102', 'active'),
(1096, '6031214-latest 2024', NULL, NULL, '2', 'g', 'ALS', '2.00007', 'g', '0.12', '0.4', '0', '0', '2', NULL, '102', 'active'),
(1097, '6031214-latest 2024', NULL, NULL, '1', 'g', 'AL5', '1.00005', 'g', '0.10', '0.3', '0', '0', '2', NULL, '102', 'active'),
(1098, '6031214-latest 2024', NULL, NULL, '500', 'mg', 'none', '0.50001', 'g', '0.080', '0.25', '0', '0', '2', NULL, '102', 'active'),
(1099, '6031214-latest 2024', NULL, NULL, '200', 'mg', 'point', '0.199995', 'g', '0.060', '0.2', '0', '0', '2', NULL, '102', 'active'),
(1100, '6031214-latest 2024', NULL, NULL, '200', 'mg', 'none', '0.199989', 'g', '0.060', '0.2', '0', '0', '2', NULL, '102', 'active'),
(1101, '6031214-latest 2024', NULL, NULL, '100', 'mg', 'none', '0.100075', 'g', '0.050', '0.16', '0', '0', '2', NULL, '102', 'active'),
(1102, '6031214-latest 2024', NULL, NULL, '50', 'mg', 'none', '0.050021', 'g', '0.040', '0.12', '0', '0', '2', NULL, '102', 'active'),
(1103, '6031214-latest 2024', NULL, NULL, '20', 'mg', 'point', '0.019997', 'g', '0.030', '0.1', '0', '0', '2', NULL, '102', 'active'),
(1104, '6031214-latest 2024', NULL, NULL, '20', 'mg', 'none', '0.020007', 'g', '0.030', '0.1', '0', '0', '2', NULL, '102', 'active'),
(1105, '6031214-latest 2024', NULL, NULL, '10', 'mg', 'none', '0.010006', 'g', '0.025', '0.08', '0', '0', '2', NULL, '102', 'active'),
(1106, '6031214-latest 2024', NULL, NULL, '2', 'mg', 'point', '0.00201', 'g', '0.020', '0.06', '0', '0', '2', NULL, '102', 'active'),
(1107, '6031214-latest 2024', NULL, NULL, '2', 'mg', 'none', '0.002008', 'g', '0.020', '0.06', '0', '0', '2', NULL, '102', 'active'),
(1108, '6031214-latest 2024', NULL, NULL, '1', 'mg', 'none', '0.000997', 'g', '0.020', '0.06', '0', '0', '2', NULL, '102', 'active'),
(1109, '57248-latest 2024', NULL, NULL, '20', 'kg', 'none', '20000.085', 'g', '100', '300', '0', '0', '2', NULL, '103', 'active'),
(1110, '57248-latest 2024', NULL, NULL, '10', 'kg', 'none', '10000.02', 'g', '50', '160', '0', '0', '2', NULL, '103', 'active'),
(1111, '57248-latest 2024', NULL, NULL, '5', 'kg', 'none', '5000.002', 'g', '25', '80', '0', '0', '2', NULL, '103', 'active'),
(1112, '57248-latest 2024', NULL, NULL, '2', 'kg', 'point', '1999.996', 'g', '10', '30', '0', '0', '2', NULL, '103', 'active'),
(1113, '57248-latest 2024', NULL, NULL, '2', 'kg', 'none', '1999.995', 'g', '10', '30', '0', '0', '2', NULL, '103', 'active'),
(1114, '57248-latest 2024', NULL, NULL, '1', 'kg', 'none', '1000.0002', 'g', '5', '16', '0', '0', '2', NULL, '103', 'active'),
(1115, '57248-latest 2024', NULL, NULL, '500', 'g', 'none', '499.9998', 'g', '2.5', '8', '0', '0', '2', NULL, '103', 'active'),
(1116, '57248-latest 2024', NULL, NULL, '200', 'g', 'point', '199.9993', 'g', '1', '3', '0', '0', '2', NULL, '103', 'active'),
(1117, '57248-latest 2024', NULL, NULL, '200', 'g', 'none', '200.0013', 'g', '1', '3', '0', '0', '2', NULL, '103', 'active'),
(1118, '57248-latest 2024', NULL, NULL, '100', 'g', 'none', '100.00073', 'g', '0.5', '1.6', '0', '0', '2', NULL, '103', 'active'),
(1119, '57248-latest 2024', NULL, NULL, '50', 'g', 'none', '50.00025', 'g', '0.3', '1', '0', '0', '2', NULL, '103', 'active'),
(1120, '57248-latest 2024', NULL, NULL, '20', 'g', 'point', '20.00029', 'g', '0.25', '0.8', '0', '0', '2', NULL, '103', 'active'),
(1121, '57248-latest 2024', NULL, NULL, '20', 'g', 'none', '20.00007', 'g', '0.25', '0.8', '0', '0', '2', NULL, '103', 'active'),
(1122, '57248-latest 2024', NULL, NULL, '10', 'g', 'none', '10.00012', 'g', '0.2', '0.6', '0', '0', '2', NULL, '103', 'active'),
(1123, '57248-latest 2024', NULL, NULL, '5', 'g', 'none', '5.00003', 'g', '0.16', '0.5', '0', '0', '2', NULL, '103', 'active'),
(1124, '57248-latest 2024', NULL, NULL, '2', 'g', 'point', '2.00013', 'g', '0.12', '0.4', '0', '0', '2', NULL, '103', 'active'),
(1125, '57248-latest 2024', NULL, NULL, '2', 'g', 'none', '2.00012', 'g', '0.12', '0.4', '0', '0', '2', NULL, '103', 'active'),
(1126, '57248-latest 2024', NULL, NULL, '1', 'g', 'none', '1.00019', 'g', '0.1', '0.3', '0', '0', '2', NULL, '103', 'active'),
(1127, '57248-latest 2024', NULL, NULL, '500', 'mg', 'none', '0.500073', 'g', '0.08', '0.25', '0', '0', '2', NULL, '103', 'active'),
(1128, '57248-latest 2024', NULL, NULL, '200', 'mg', 'point', '0.200065', 'g', '0.06', '0.2', '0', '0', '2', NULL, '103', 'active'),
(1129, '57248-latest 2024', NULL, NULL, '200', 'mg', 'none', '0.200058', 'g', '0.06', '0.2', '0', '0', '2', NULL, '103', 'active'),
(1130, '57248-latest 2024', NULL, NULL, '100', 'mg', 'none', '0.10005', 'g', '0.05', '0.16', '0', '0', '2', NULL, '103', 'active'),
(1131, '57248-latest 2024', NULL, NULL, '50', 'mg', 'none', '0.05004', 'g', '0.04', '0.12', '0', '0', '2', NULL, '103', 'active'),
(1132, '57248-latest 2024', NULL, NULL, '20', 'mg', 'point', '0.020015', 'g', '0.03', '0.1', '0', '0', '2', NULL, '103', 'active'),
(1133, '57248-latest 2024', NULL, NULL, '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.1', '0', '0', '2', NULL, '103', 'active'),
(1134, '57248-latest 2024', NULL, NULL, '10', 'mg', 'none', '0.009999', 'g', '0.025', '0.08', '0', '0', '2', NULL, '103', 'active'),
(1135, '57248-latest 2024', NULL, NULL, '5', 'mg', 'none', '0.005008', 'g', '0.02', '0.06', '0', '0', '2', NULL, '103', 'active'),
(1136, '57248-latest 2024', NULL, NULL, '2', 'mg', 'point', '0.002002', 'g', '0.02', '0.06', '0', '0', '2', NULL, '103', 'active'),
(1137, '57248-latest 2024', NULL, NULL, '2', 'mg', 'none', '0.002004', 'g', '0.02', '0.06', '0', '0', '2', NULL, '103', 'active'),
(1138, '57248-latest 2024', NULL, NULL, '1', 'mg', 'none', '0.001011', 'g', '0.02', '0.06', '0', '0', '2', NULL, '103', 'active'),
(1139, '6021214-latest 2024', NULL, NULL, '20', 'kg', 'AC5', '20000.00096', 'g', '100', '300', '0', '0', '2', NULL, '104', 'active'),
(1140, '09000800-latest 2024', NULL, NULL, '5', 'kg', 'none', '5000.027', 'g', '83', '250', '0', '0', '2', NULL, '105', 'active'),
(1141, '09000800-latest 2024', NULL, NULL, '2', 'kg', 'point', '2000.018', 'g', '33', '100', '0', '0', '2', NULL, '105', 'active'),
(1142, '09000800-latest 2024', NULL, NULL, '2', 'kg', 'none', '2000.008', 'g', '33', '100', '0', '0', '2', NULL, '105', 'active'),
(1143, '09000800-latest 2024', NULL, NULL, '1', 'kg', 'none', '1000.016', 'g', '16', '50', '0', '0', '2', NULL, '105', 'active'),
(1144, '09000800-latest 2024', NULL, NULL, '500', 'g', 'none', '500.003', 'g', '8.3', '25', '0', '0', '2', NULL, '105', 'active'),
(1145, '4640918-latest 2024', NULL, NULL, '10', 'kg', 'APZ', '10000.1550', 'g', '160', '500', '0', '0', '2', NULL, '106', 'active'),
(1146, '4640918-latest 2024', NULL, NULL, '5', 'kg', 'AXY', '5000.0880', 'g', '80', '250', '0', '0', '2', NULL, '106', 'active'),
(1147, '4640918-latest 2024', NULL, NULL, '2', 'kg', 'BEQ', '2000.0450', 'g', '36', '100', '0', '0', '2', NULL, '106', 'active'),
(1148, '4640918-latest 2024', NULL, NULL, '2', 'kg', 'BEN', '2000.0360', 'g', '30', '100', '0', '0', '2', NULL, '106', 'active'),
(1149, '4640918-latest 2024', NULL, NULL, '1', 'kg', 'BQ6', '1000.0180', 'g', '16', '50', '0', '0', '2', NULL, '106', 'active'),
(1150, '4640918-latest 2024', NULL, NULL, '500', 'g', 'B8L', '500.0046', 'g', '8', '25', '0', '0', '2', NULL, '106', 'active'),
(1151, '4640918-latest 2024', NULL, NULL, '200', 'g', 'BQ7', '200.0020', 'g', '3.0', '10', '0', '0', '2', NULL, '106', 'active'),
(1152, '4640918-latest 2024', NULL, NULL, '200', 'g', 'BPZ', '200.0028', 'g', '3.0', '10', '0', '0', '2', NULL, '106', 'active'),
(1153, '4640918-latest 2024', NULL, NULL, '100', 'g', 'BER', '100.0015', 'g', '1.6', '5', '0', '0', '2', NULL, '106', 'active'),
(1154, '4640918-latest 2024', NULL, NULL, '50', 'g', 'BPK', '50.00050', 'g', '1.00', '3', '0', '0', '2', NULL, '106', 'active'),
(1155, '4640918-latest 2024', NULL, NULL, '20', 'g', 'BSJ', '20.00098', 'g', '0.81', '2.5', '0', '0', '2', NULL, '106', 'active'),
(1156, '4640918-latest 2024', NULL, NULL, '20', 'g', 'BSG', '20.00111', 'g', '0.80', '2.5', '0', '0', '2', NULL, '106', 'active'),
(1157, '4640918-latest 2024', NULL, NULL, '10', 'g', 'B8Y', '10.00058', 'g', '0.60', '2', '0', '0', '2', NULL, '106', 'active'),
(1158, '4640918-latest 2024', NULL, NULL, '5', 'g', 'B42', '5.00026', 'g', '0.50', '1.6', '0', '0', '2', NULL, '106', 'active'),
(1159, '4640918-latest 2024', NULL, NULL, '2', 'g', 'BM3', '2.00012', 'g', '0.40', '1.2', '0', '0', '2', NULL, '106', 'active'),
(1160, '4640918-latest 2024', NULL, NULL, '2', 'g', 'BLI', '5.00004', 'g', '0.40', '1.2', '0', '0', '2', NULL, '106', 'active'),
(1161, '4640918-latest 2024', NULL, NULL, '1', 'g', 'B5D', '1.00076', 'g', '0.65', '1', '0', '0', '2', NULL, '106', 'active'),
(1162, 'See Calibration Certificate-latest 2024', NULL, NULL, '5', 'kg', 'A', '5000.032', 'g', '170', '800', '0', '0', '2', NULL, '107', 'active'),
(1163, 'See Calibration Certificate-latest 2024', NULL, NULL, '10', 'kg', 'B', '10000.16', 'g', '160', '1600', '0', '0', '2', NULL, '107', 'active'),
(1164, 'See Calibration Certificate-latest 2024', NULL, NULL, '10', 'kg', 'C', '10000.02', 'g', '160', '1600', '0', '0', '2', NULL, '107', 'active'),
(1165, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'D', '19999.70', 'g', '300', '3000', '0', '0', '2', NULL, '107', 'active'),
(1166, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'E', '19999.56', 'g', '300', '3000', '0', '0', '2', NULL, '107', 'active'),
(1167, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'F', '20000.17', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1168, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'G ', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1169, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'H', '20000.55', 'g', '340', '3000', '0', '0', '2', NULL, '107', 'active'),
(1170, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'I', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1171, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'J', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1172, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'K', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1173, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'L', '19999.01', 'g', '310', '3000', '0', '0', '2', NULL, '107', 'active'),
(1174, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'M', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1175, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'N', '20000.17', 'g', '20000.17', '330', '0', '0', '2', NULL, '107', 'active'),
(1176, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'O', '19999.40', 'g', '300', '3000', '0', '0', '2', NULL, '107', 'active'),
(1177, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'P', '20000.11', 'g', '300', '3000', '0', '0', '2', NULL, '107', 'active'),
(1178, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'Q', '19999.29', 'g', '420', '3000', '0', '0', '2', NULL, '107', 'active'),
(1179, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'R', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1180, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'S', '20000.47', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1181, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'T', '20000.07', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1182, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'U', '20000.17', 'g', '330', '3000', '0', '0', '2', NULL, '107', 'active'),
(1183, 'See Calibration Certificate-latest 2024', NULL, NULL, '20', 'kg', 'V', '20000.28', 'g', '420', '3000', '0', '0', '2', NULL, '107', 'active'),
(1184, '6031214-test weight', NULL, NULL, '10', 'kg', 'AFT', '10000.046', 'g', '50', '160', '0.0020', '10000.048', '2', NULL, '108', 'active'),
(1185, '6031214-test weight', NULL, NULL, '5', 'kg', 'AWF', '5000.023', 'g', '25', '80', '0.0010', '5000.024', '2', NULL, '108', 'active'),
(1186, '6031214-test weight', NULL, NULL, '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', '0.0000', '2000.006', '2', NULL, '108', 'active'),
(1187, '6031214-test weight', NULL, NULL, '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', '0.0000', '2000.005', '2', NULL, '108', 'active'),
(1188, '6031214-test weight', NULL, NULL, '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', '0.0001', '1000.003', '2', NULL, '108', 'active'),
(1189, '6031214-test weight', NULL, NULL, '500', 'g', 'AQF', '500.0017', 'g', '2.5', '8', '0.0000', '500.0017', '2', NULL, '108', 'active'),
(1190, '6031214-test weight', NULL, NULL, '200', 'g', 'AMY', '200.0004', 'g', '1', '3', '0.0003', '200.0007', '2', NULL, '108', 'active'),
(1191, '6031214-test weight', NULL, NULL, '200', 'g', 'AMX', '200.0007', 'g', '1', '3', '0.0003', '200.0004', '2', NULL, '108', 'active'),
(1192, '6031214-test weight', NULL, NULL, '100', 'g', 'ANL', '100.00039', 'g', '0.50', '1.6', '0.0000', '100.00037', '2', NULL, '108', 'active'),
(1193, '6031214-test weight', NULL, NULL, '50', 'g', 'AJL', '50.00026', 'g', '0.30', '1', '0.0000', '50.00028', '2', NULL, '108', 'active'),
(1194, '6031214-test weight', NULL, NULL, '20', 'g', 'AN5', '20.00007', 'g', '0.25', '0.8', '0.0000', '20.00007', '2', NULL, '108', 'active'),
(1195, '6031214-test weight', NULL, NULL, '20', 'g', 'AN4', '20.00027', 'g', '0.25', '0.8', '0.0000', '20.00026', '2', NULL, '108', 'active'),
(1196, '6031214-test weight', NULL, NULL, '10', 'g', 'AK2', '10.0003', 'g', '0.20', '0.6', '0.0000', '10.00028', '2', NULL, '108', 'active'),
(1197, '6031214-test weight', NULL, NULL, '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', '0.0000', '5.00018', '2', NULL, '108', 'active'),
(1198, '6031214-test weight', NULL, NULL, '2', 'g', 'ALT', '2.00007', 'g', '0.12', '0.4', '0.0000', '2.00011', '2', NULL, '108', 'active'),
(1199, '6031214-test weight', NULL, NULL, '2', 'g', 'ALS', '2.00011', 'g', '0.12', '0.4', '0.0000', '2.00007', '2', NULL, '108', 'active'),
(1200, '6031214-test weight', NULL, NULL, '1', 'g', 'AL5', '1.00005', 'g', '0.10', '0.3', '0.0000', '1.00006', '2', NULL, '108', 'active'),
(1201, '6031214-test weight', NULL, NULL, '500', 'mg', 'none', '0.50001', 'g', '0.080', '0.25', '0.0001', '0.50011', '2', NULL, '108', 'active'),
(1202, '6031214-test weight', NULL, NULL, '200', 'mg', 'point', '0.199995', 'g', '0.060', '0.2', '0.0001', '0.19993', '2', NULL, '108', 'active'),
(1203, '6031214-test weight', NULL, NULL, '200', 'mg', 'none', '0.199989', 'g', '0.060', '0.2', '0.0000', '0.199988', '2', NULL, '108', 'active'),
(1204, '6031214-test weight', NULL, NULL, '100', 'mg', 'none', '0.100075', 'g', '0.050', '0.16', '0.0000', '0.100079', '2', NULL, '108', 'active'),
(1205, '6031214-test weight', NULL, NULL, '50', 'mg', 'none', '0.050021', 'g', '0.040', '0.12', '0.0000', '0.050022', '2', NULL, '108', 'active'),
(1206, '6031214-test weight', NULL, NULL, '20', 'mg', 'point', '0.019997', 'g', '0.030', '0.1', '0.0000', '0.019996', '2', NULL, '108', 'active'),
(1207, '6031214-test weight', NULL, NULL, '20', 'mg', 'none', '0.020007', 'g', '0.030', '0.1', '0.0000', '0.02005', '2', NULL, '108', 'active'),
(1208, '6031214-test weight', NULL, NULL, '10', 'mg', 'none', '0.010006', 'g', '0.025', '0.8', '0.0000', '0.010008', '2', NULL, '108', 'active'),
(1209, '6031214-test weight', NULL, NULL, '2', 'mg', 'point', '0.00201', 'g', '0.020', '0.06', '0.0000', '0.002005', '2', NULL, '108', 'active'),
(1210, '6031214-test weight', NULL, NULL, '2', 'mg', 'none', '0.002008', 'g', '0.020', '0.06', '0.0000', '0.002003', '2', NULL, '108', 'active'),
(1211, '6031214-test weight', NULL, NULL, '1', 'mg', 'none', '0.000997', 'g', '0.020', '0.060', '0.0000', '0.000998', '2', NULL, '108', 'active');

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
(1, '2', '2885802', 'AC', 'Voltage', '33', 'mV', '329.999', 'mV', '100', 'mV', '50', 'Hz', '2', '99.9754', 'mV', '0.0072', 'mV', '99.9754', 'mV', '0', 'inactive'),
(4, '2', '2885802', 'AC', 'Voltage', '0.33', 'V', '3.29999', 'V', '1.00000 ', 'V', '50', 'Hz', '2', '0.999832', 'V', '0.000092', 'V', '0.999832', 'V', '0', 'inactive'),
(5, '2', '2885802', 'DC', 'Voltage', '0', 'mV', '329.9999', 'mV', '100.0000', 'mV', '', '', '2', '99.99999', 'mV', '0.00051', 'mV', '99.99999', 'mV', '0', 'inactive'),
(6, '2', '2885802', 'DC', 'Voltage', '0', 'mV', '329.9999', 'mV', '100.0000', 'mV', '', '', '2', '99.99999', 'mV', '0.00051', 'mV', '99.99999', 'mV', '0', 'active'),
(7, '2', '2885802', 'DC', 'Voltage', '0', 'V', '3.299999', 'V', '1.000000', 'V', '', '', '2', '1.0000012', 'V', '0.0000038', 'V', '1.0000012', 'V', '0', 'active'),
(8, '2', '2885802', 'DC', 'Voltage', '0', 'V', '32.99999', 'V', '10.00000', 'V', '', '', '2', '9.99976', 'V', '0.000036', 'V', '9.99976', 'V', '0', 'active'),
(9, '2', '2885802', 'DC', 'Voltage', '30', 'V', '329.9999', 'V', '100.0000', 'V', '', '', '2', '99.99976', 'V', '0.00053', 'V', '99.99976', 'V', '0', 'active'),
(10, '2', '2885802', 'DC', 'Voltage', '100', 'V', '1020', 'V', '1000', 'V', '', '', '2', '100.3432', 'V', '0.0082', 'V', '100.3432', 'V', '0', 'active'),
(11, '2', '2885802', 'AC', 'Voltage', '33', 'mV', ' 329.999', 'mV', '100.000', 'mV', '50', 'Hz', ' 2', '99.9754', 'mV', '0.0072', 'mV', '99.9754', 'mV', '0', 'active'),
(12, '2', '2885802', 'AC', 'Voltage', '33', 'mV', '329.999', 'mV', '100.000', 'mV', '1', 'kHz', '2', '99.9830', 'mV', '0.0072', 'mV', '99.9830', 'mV', '0', 'active'),
(13, '2', '2885802', 'AC', 'Voltage', '0.33', 'V', '3.29999', 'V', '1.00000', 'V', '50', 'Hz', '2', '0.999832', 'V', '0.000092', 'V', '0.999832', 'V', '0', 'active'),
(14, '2', '2885802', 'AC', 'Voltage', '0.33', 'V', ' 3.29999', 'V', '1.00000', 'V', '1', 'kHz', '2', '0.999881', 'V', '0.000092', 'V', '0.999881', 'V', '0', 'active'),
(15, '2', '2885802', 'AC', 'Voltage', '3.3', 'V', '32.9999', 'V', '10.0000', 'V', '50', 'Hz', '2', '9.99824', 'V', '0.00072', 'V', '9.99824', 'V', '0', 'active'),
(16, '2', '2885802', 'AC', 'Voltage', '3.3', 'V', '32.9999', 'V', '10.0000', 'V', '1', 'kHz', '2', '9.99820', 'V', '0.00072', 'V', '9.99820', 'V', '0', 'active'),
(17, '2', '2885802', 'AC', 'Voltage', '33', 'V', '329.999', 'V', '100.000', 'V', '50', 'Hz', '2', '99.983', 'V', '0.023', 'V', '99.983', 'V', '0', 'active'),
(18, '2', '2885802', 'AC', 'Voltage', '33', 'V', '329.999', 'V', '100.000', 'V', '1', 'kHz', '2', '99.983', 'V', '0.023', 'V', '99.983', 'V', '0', 'active'),
(19, '2', '2885802', 'AC', 'Voltage', '330', 'V', '1020', 'V', '1000.00', 'V', '50', 'Hz', '2', '650.06', 'V', '0.23', 'V', '650.06', 'V', '0', 'active'),
(20, '2', '2885802', 'AC', 'Voltage', '330', 'V', '1020', 'V', '1000.00', 'V', '1', 'kHz', '2', '650.10', 'V', '0.23', 'V', '650.10', 'V', '0', 'active'),
(21, '2', '2885802', 'DC', 'Current', '0', 'mA', '329.999 ', 'mA', '100.000', 'mA', '', '', '2', '100.0028', 'mA', '0.0025', 'mA', '100.0028', 'mA', '0', 'active'),
(22, '2', '2885802', 'DC', 'Current', '0', 'A', '1.09999', 'A', '1.00000', 'A', '', '', '2', '1.00041', 'A', '0.000025', 'A', '1.00041', 'A', '0', 'active'),
(23, '2', '2885802', 'AC', 'Current', '33', 'mA', '329.999', 'mA', '1000.000', 'mA', '50', 'Hz', '2', '100.0114', 'mA', '0.0013', 'mA', '100.0114', 'mA', '0', 'active'),
(24, '2', '2885802', 'AC', 'Current', '33', 'mA', '329.999', 'mA', '1000.000', 'mA', '1', 'kHz', '2', '100.016', 'mA', '0.0014', 'mA', '100.016', 'mA', '0', 'active'),
(25, '2', '2885802', 'AC', 'Current', '0.33', 'A', '1.09999', 'A', '1.00000', 'A', '50', 'Hz', '2', '1.00018', 'A', '0.00010', 'A', '1.00018', 'A', '0', 'active'),
(26, '2', '2885802', 'AC', 'Current', '0.33', 'A', '1.09999', 'A', '1.00000', 'A', '1', 'kHz', '2', '1.00012', 'A', '0.00010', 'A', '1.00012', 'A', '0', 'active'),
(27, '2', '2885802', 'Resistance', 'Resistance', '0', 'Ω', '10.9999', 'Ω', '1.0000', 'Ω', '', '', '2', '1.00017', 'Ω', '0.000060', 'Ω', '1.00017', 'Ω', '0', 'active'),
(28, '2', '2885802', 'Resistance', 'Resistance', '11', 'Ω', '32.9999', 'Ω', '10.0000', 'Ω', '', '', '2', '9.99975', 'Ω', '0.00011', 'Ω', '9.99975', 'Ω', '0', 'active'),
(29, '2', '2885802', 'Resistance', 'Resistance', '33', 'Ω', '109.9999', 'Ω', '100.0000', 'Ω', '', '', '2', '99.99930', 'Ω', '0.00096', 'Ω', '99.99930', 'Ω', '0', 'active'),
(30, '2', '2885802', 'Resistance', 'Resistance', '330', 'Ω', '1.099999', 'kΩ', '1.000000', 'kΩ', '', '', '2', '1.0000016 ', 'kΩ', '0.0000096', 'kΩ', '1.0000016 ', 'kΩ', '0', 'active'),
(31, '2', '2885802', 'Resistance', 'Resistance', '3.3', 'kΩ', '10.99999', 'kΩ', '10.00000', 'kΩ', '', '', '2', '9.999971', 'kΩ', '0.000096', 'kΩ', '9.999971', 'kΩ', '0', 'active'),
(32, '2', '2885802', 'Resistance', 'Resistance', '33', 'kΩ', '109.9999', 'kΩ', '100.0000', 'kΩ', '', '', '2', '100.00960', 'MΩ', '0.00096', 'MΩ', '100.00960', 'MΩ', '0', 'active'),
(33, '2', '2885802', 'Resistance', 'Resistance', '330', 'kΩ', '1.099999', 'MΩ', '1.000000', 'MΩ', '', '', '2', '1.0000056', 'MΩ', '0.0000095', 'MΩ', '1.0000056', 'MΩ', '0', 'active'),
(34, '2', '2885802', 'Resistance', 'Resistance', '3.3', 'MΩ', '10.99999', 'MΩ', '10.00000', 'MΩ', '', '', '2', '10.00018', 'MΩ', '0.00020', 'MΩ', '10.00018', 'MΩ', '0', 'active'),
(35, '2', '2885802', 'Resistance', 'Resistance', '33', 'MΩ', '109.9999', 'MΩ', '100.0000', 'MΩ', '', '', '2', '99.999', 'MΩ', '0.013', 'MΩ', '99.999', 'MΩ', '0', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pabconditions`
--

CREATE TABLE `pabconditions` (
  `id` int(11) NOT NULL,
  `instrument` text NOT NULL,
  `conditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`conditions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pabconditions`
--

INSERT INTO `pabconditions` (`id`, `instrument`, `conditions`) VALUES
(10, 'Pressure', '{\"rangeFrom1\":\"12\",\"rangeTo1\":\"12\",\"resolution1\":\"12\",\"cmc1\":\"12\",\"placeOfCalibration1\":\"12\",\"unitRangeFrom1\":\"atm\",\"unitRangeTo1\":\"atm\",\"unitResolution1\":\"atm\",\"unitCMC1\":\"atm\"}'),
(11, 'Pressure', '{\"rangeFrom1\":\"aa\",\"rangeTo1\":\"aa\",\"resolution1\":\"aa\",\"cmc1\":\"aa\",\"placeOfCalibration1\":\"aa\",\"rangeFrom2\":\"bb\",\"rangeTo2\":\"bb\",\"resolution2\":\"bb\",\"cmc2\":\"bb\",\"placeOfCalibration2\":\"bb\",\"rangeFrom3\":\"cc\",\"rangeTo3\":\"cc\",\"resolution3\":\"cc\",\"cmc3\":\"cc\",\"placeOfCalibration3\":\"cc\",\"unitRangeFrom1\":\"bar\",\"unitRangeTo1\":\"atm\",\"unitResolution1\":\"atm\",\"unitCMC1\":\"atm\",\"unitRangeFrom2\":\"atm\",\"unitRangeTo2\":\"atm\",\"unitResolution2\":\"atm\",\"unitCMC2\":\"atm\",\"unitRangeFrom3\":\"atm\",\"unitRangeTo3\":\"atm\",\"unitResolution3\":\"atm\",\"unitCMC3\":\"atm\"}');

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

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `personnelName`, `position`, `email`) VALUES
(2, 'Mylene S. Lontoc', 'Calibration Officer', 'm.lontoc@r3cms'),
(3, 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'r.esmeria@r3cms.com'),
(4, 'John June L. Paran', 'Technical Manager', 'june_paran@gmail.com'),
(5, 'Engr. Mark Gilbert E. Marasigan', 'Calibration Officer', NULL),
(6, 'User Account', '', 'user@user.com'),
(10, 'Engr. Julius P. Regoroso', 'Calibration Officer', 'j.regoroso@r3cms.com');

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

--
-- Dumping data for table `ph_meter_standard`
--

INSERT INTO `ph_meter_standard` (`id`, `tempC`, `tempK`, `LN`, `En`, `slope`, `dateOfNextCali`, `manufacturer`, `modelNumber`) VALUES
(4, '43', '4', '32323', '4', '533', '', '', ''),
(5, '12', '3', '4', '5222', '6545', '', '', '');

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
  `module7CalibrationProcedureAndTraceability` text NOT NULL,
  `module7CalibrationResults` text NOT NULL,
  `module7UncertaintyOfMeasurement` text NOT NULL,
  `module7MeasurementCondition` text NOT NULL,
  `module7Remarks` text NOT NULL,
  `module9CalibrationProcedureAndTraceabilityVolumetric` text NOT NULL,
  `module9CalibrationProcedureAndTraceabilityPova` text NOT NULL,
  `module9CalibrationResults` text NOT NULL,
  `module9UncertaintyOfMeasurement` text NOT NULL,
  `module9Remarks` text NOT NULL,
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

--
-- Dumping data for table `placeholders`
--

INSERT INTO `placeholders` (`id`, `module1CalibrationProcedureAndTraceability`, `module1UncertaintyOfMeasurement`, `module1CalibrationResults`, `module1Remarks`, `module2CalibrationProcedureAndTraceability`, `module2UncertaintyOfMeasurement`, `module2CalibrationResults`, `module2Remarks`, `module3CalibrationProcedureAndTraceability`, `module3CalibrationProcedureAndTraceability2`, `module3UncertaintyOfMeasurement`, `module3CalibrationResults`, `module3Remarks`, `module4CalibrationProcedureAndTraceability`, `module4CalibrationProcedureAndTraceability2`, `module4UncertaintyOfMeasurement`, `module4CalibrationResults`, `module4Remarks`, `module5CalibrationProcedureAndTraceability`, `module5UncertaintyOfMeasurement`, `module5CalibrationResults`, `module5Remarks`, `module7CalibrationProcedureAndTraceability`, `module7CalibrationResults`, `module7UncertaintyOfMeasurement`, `module7MeasurementCondition`, `module7Remarks`, `module9CalibrationProcedureAndTraceabilityVolumetric`, `module9CalibrationProcedureAndTraceabilityPova`, `module9CalibrationResults`, `module9UncertaintyOfMeasurement`, `module9Remarks`, `module11CalibrationProcedureAndTraceability`, `module11CalibrationResults`, `module11UncertaintyOfMeasurement`, `module11Remarks`, `module13CalibrationProcedureAndTraceability`, `module13CalibrationResults`, `module13UncertaintyOfMeasurement`, `module13Remarks`, `module14CalibrationProcedureAndTraceability`, `module14CalibrationResults`, `module14UncertaintyOfMeasurement`, `module14Remarks`, `module15CalibrationProcedureAndTraceability`, `module15CalibrationResults`, `module15UncertaintyOfMeasurement`, `module15Remarks`) VALUES
(1, 'The unit under calibration (UUC) was calibrated following CP-010 based on EURAMET cg-18 “Guidelines on the Calibration of Non-Automatic Weighing Instruments”using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The uncertainty stated is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with EA-4/02 M: 2022: Evaluation of the Uncertainty of Measurement in Calibration. The value of the measureand lies within the assigned range of values with a probability of approximately 95%.', 'The results of calibration are shown on the following pages of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with RML\\\'s CP-012 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The uncertainty stated in this calibration certificate is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with \"JCGM 100:2008 Evaluation of measurement data - Guide to the expression of uncertainty in measurement\". The value of the measurand lies within the assigned range of values with a probability of approximately 95 %.', 'The results of calibration are shown on page 2 of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.(splitHere)Measurement in italicized form are not included in the Scope of Accreditation of the Laboratory.', 'The unit under calibration (UUC) has been calibrated in accordance with OIML R 111-1: 2004 (E) and RML\'s CP-003 Double Substitution Weighing without Air Buoyancy Correction using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The unit under calibration (UUC) has been calibrated in accordance with OIML R 111-1: 2004 (E) and RML\'s CP-003 Double Substitution Weighing with Air Buoyancy Correction using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory', 'The uncertainty stated in this calibration certificate is the expanded uncertainty at a confidence level of approximately 95% with a coverage factor of k=2.', 'The results of calibration are shown on page 2 of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with RML\'s CP-002 using the following references standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The unit under calibration (UUC) was calibrated in accordance with OIML R 76-1 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The expanded uncertainty of measurement is (SPLIT) estimated at a confidence level of 95% with a coverage factor of k=2.', 'The results of calibration are shown on the following pages of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with RML\'s CP-011 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The uncertainty stated in this calibration certificate is the expanded uncertainty at a confidence level of approximately 95% with a coverage factor of k = 2.', 'The results of calibration are shown on the following pages of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with the Guidance DKD R-6-1 (Edition 03/2014) Calibration of Pressure Gauge following sequence B and RML\'s CP-001 using the following reference standard/s that are traceable to the SI Units as maintained by the issuing laboratory:', 'The results of calibration are shown on page 2 of this certificate.', 'The uncertainty stated is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k=2. It has been determined in accordance with the \"EA-4/02 M: 2022 - Evaluation of Measurement in Calibration \". The value of the measurand lies within the assigned range of values with a probability of approximately 95%.', 'The UUC was mounted according to its normal use with the pressure inlet connection at the bottom and has been calibrated from 0 to 4000 psi positive gauge pressures  using air as pressure medium', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The conversion factor used is: 1 kPa = 0.145038 psi.(splitHere)The data with asterisk (*) was provided by the customer.(splitHere)The UUC was calibrated up to 1500 psi only.', 'The unit under calibration (UUC) has been calibrated in accordance with Gravimetric Method and RML\'s CP-015 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The unit under calibration (UUC) has been calibrated in accordance with Gravimetric Method and RML\'s CP-016 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The results of calibration are shown on page 2 of this certificate.', 'The uncertainty stated in this calibration certificate is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with \"JCGM 100:2008 Evaluation of measurement data - Guide to the expression of uncertainty in measurement\". The value of the measurand lies within the assigned range of values with a probability of approximately 95 %.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) has been calibrated following CP-009 based on  DKD-R-5-7 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory', 'The results of calibration are shown on the following pages of this certificate.', 'The uncertainty stated in this calibration certificate is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with \"JCGM 100:2008 Evaluation of measurement data - Guide to the expression of uncertainty in measurement\". The value of the measurand lies within the assigned range of values with a probability of approximately 95 %.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `unit_Original` varchar(255) DEFAULT NULL,
  `unit_Converted` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pressuregaugestandarddetails`
--

INSERT INTO `pressuregaugestandarddetails` (`id`, `standardDescription`, `serialNumber`, `model`, `calibrationCertificate`, `laboratory`, `unit_Original`, `unit_Converted`, `status`) VALUES
(1, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck PM 620', '08-2018-PRES-0106', 'NML (Philippines)', 'bar', 'kPa', 'inactive'),
(2, 'Pressure Module', '2883658', 'GE DRUCK PM 620', '08-2018-PRES-0104', 'NML (Philippines)', 'kPa', 'kPa', 'inactive'),
(4, '', '', '', '', '', 'atm', 'atm', 'inactive'),
(5, '', '', '', '', '', 'atm', 'atm', 'inactive'),
(6, 'Digital Pressure Gauge', '218181B0037', 'Additel ADT680', '18081612', 'NIST through Additel Corporation (USA)', 'atm', 'atm', 'inactive'),
(7, 'Digital Pressure Gauge DEMO', '218181B0037', 'Additel ADT680', '18081612', 'NIST through Additel Corporation (USA)', 'psi', 'kPa', 'inactive'),
(8, 'sample', 'sample', 'sample', 'sample', 'sample', 'kPa', 'psi', 'inactive'),
(9, 'Digital Pressure Gauge', '3593048', 'GE Druck DPI104', '10-2018-PRES-0178', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(10, 'Digital Pressure Gauge', '4024042', 'Fluke 700G31', '10-2018-PRES-0179', 'NML (Philippines)', 'Mpa', 'kPa', 'inactive'),
(11, 'Pressure Module', '2883658', 'GE DRUCK PM 620', '009327 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'bar', 'psi', 'inactive'),
(12, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck PM 620', '08-2018-PRES-0106', 'NML (Philippines)', 'kPa', 'psi', 'inactive'),
(13, 'Pressure Module', '2883658', 'GE DRUCK PM 620', '12-2021-PRES-0258', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(14, 'Digital Pressure (Vaccum)', '2883658', 'GE DRUCK 620', '08-2018-PRES-0104', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(15, 'Pressure Module', '3485385', 'GE Druck PM 620', '08-2018-PRES-0107', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(16, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck PM 620', '12-2021-PRES-0261', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(17, 'Pressure Module', '2883658', 'GE DRUCK PM 620', '12-2021-PRES-0258', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(18, 'Digital Pressure (Vaccum)', '2883658', 'GE DRUCK 620', '12-2021-PRES-0259', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(19, 'Pressure Module', '3485385', 'GE Druck PM 620', '10-2020-PRES-0101', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(20, 'Digital Pressure Gauge', '400302', 'Fluke 700G04 pressure', '12-2020-PRES-0139', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(21, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck 3905003', '12-2021-PRES-0261', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(22, 'Pressure Module', '2883658', 'GE Druck PM 620 2883658', '009327 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(23, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck 3905003', '009328 D-K-15035-01-00 2023-04', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(24, 'Pressure Module', '2883658', 'GE Druck PM 620', '009327 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(25, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck 3905003', '009328 D-K-15035-01-00 2023-04', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(26, 'Pressure Module', '2883658', 'GE Druck PM 620 2883658', '009327 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(27, 'Pressure Module', '2883658', 'GE Druck Gen ii 2883658 vacuum', '12-2021-PRES-0259', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(28, 'Pressure Module', '3485385', 'GE Druck 3485385', '10-2020-PRES-0101', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(29, 'Digital Pressure Gauge', '4003026', 'Fluke 700G04 pressure', '2023SMCS28935', 'Southern Metrology and Calibration Services, Inc.', 'psi', 'kPa', 'inactive'),
(30, 'Digital Pressure Gauge', '4003026', 'Fluke 700G04 Vacuum', '2023SMCS28935', 'Southern Metrology and Calibration Services, Inc.', 'psi', 'kPa', 'inactive'),
(31, 'Digital Pressure Gauge', '3593048', 'DPI 104 3593048', '009330 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(32, 'Digital Pressure Gauge', '4024042', 'Fluke 700G31 4024042', '12-2020-PRES-0137', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(33, 'Digital Pressure Gauge', '218181B0037', 'Additel 218181B0037', 'MIRDC-012023-INS-0039A', 'NIM, China through DOST-MIRDC', 'psi', 'kPa', 'inactive'),
(34, 'Pressure Calibrator', '4323213', 'Fluke 718-30G / 4323213 pressure', 'MIRDC-012023-INS-0039B', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(35, 'Pressure Module', '2883658 - Pressure', 'GE Druck PM 620 2883658', '009327 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'bar', 'kPa', 'active'),
(36, 'Pressure Module', '2883658', 'GE Druck Gen ii 2883658 vacuum', '12-2021-PRES-0259', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(37, 'Pressure Module', '2883658Digital Pressure (Vaccum)', 'GE Druck Gen ii 2883658 vacuum', '12-2021-PRES-0259', 'NML (Philippines)', 'psi', 'kPa', 'inactive'),
(38, 'Pressure Module', '2883658 - Vacuum', 'GE Druck Gen ii 2883658 vacuum', '12-2021-PRES-0259', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(39, 'Pressure Module', '3485385', 'GE Druck 3485385', '10-2020-PRES-0101', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(40, 'Digital Pressure Gauge', '4003026 - Pressure', 'Fluke 700G04 pressure', '2023SMCS28935', 'Southern Metrology and Calibration Services, Inc.', 'psi', 'kPa', 'active'),
(41, 'Digital Pressure Gauge', '4003026 - Vacuum', 'Fluke 700G04 Vacuum', '2023SMCS28935', 'Southern Metrology and Calibration Services, Inc.', 'inHg', 'kPa', 'active'),
(42, 'Digital Pressure Gauge', '3593048', 'DPI 104 3593048', '009330 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(43, 'Digital Pressure Gauge', '4024042 ', 'Fluke 700G31 4024042', '12-2020-PRES-0137', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(44, 'Digital Pressure Gauge', '218181B0037-2024', 'Additel 218181B0037', 'MIRDC-022024-INS-0109A', 'NIM, China through DOST-MIRDC', 'psi', 'kPa', 'active'),
(45, 'Pressure Calibrator', '4323213', 'Fluke 718-30G / 4323213 pressure', 'MIRDC-012023-INS-0039B', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(46, 'Digital Pressure Gauge', '218181B0037 - 2024', 'Additel 218181B0037', 'MIRDC-022024-INS-0109A', 'NIM, China through DOST-MIRDC', 'psi', 'kPa', 'inactive'),
(47, '1', '1', '1', '1', '1', 'atm', 'atm', 'inactive'),
(48, 'Digital Pressure Gauge', '218181B0037-2024', 'Additel 218181B0037', 'MIRDC-012023-INS-0039A', 'NIM, China through DOST-MIRDC', 'psi', 'kPa', 'inactive'),
(49, 'Digital Pressure Gauge', '218181B0037-2023', 'Additel 218181B0037', 'MIRDC-012023-INS-0039A', 'NIM, China through DOST-MIRDC', 'psi', 'kPa', 'active'),
(50, 'Digital Pressure Gauge', '4024042 - 2024', 'Fluke 700G31 4024042', '009331 D-K-15035-01-00 2023-04', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(51, 'Digital Pressure Gauge', '3593048-2022', 'DPI 104 3593048', '008062 D-K-15035-01-00 2022-03', 'NML (Philippines)', 'psi', 'kPa', 'active'),
(52, '0', '0', '0', '0', '0', 'atm', 'atm', 'inactive');

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

--
-- Dumping data for table `pressuregaugestandardvalues`
--

INSERT INTO `pressuregaugestandardvalues` (`id`, `serialNumber`, `applied`, `increasing`, `decreasing`, `mean`, `deviation`, `uncertainty`, `correction`, `status`) VALUES
(6, '2883658 - Pressure', '0', '0', '0.035', '0.018', '0.018', '0.040', '-0.018', 'inactive'),
(7, '2883658 - Pressure', '199.9276', '199.974', '200.096', '200.035', '0.10739999999998417', '0.09', '-0.10739999999998417', 'inactive'),
(9, '2883658 - Pressure', '399.9576', '400.096', '400.229', '400.162', '0.20439999999996417', '0.09', '-0.20439999999996417', 'inactive'),
(10, 'PM 620 / 3905003', '1', '1', '1', '1', '0', '1', '0', 'inactive'),
(11, '2883658 - Pressure', '599.8765', '600.126', '600.259', '600.1925', '0.3160000000000309', '0.090', '-0.3160000000000309', 'inactive'),
(12, '2883658 - Pressure', '799.9004', '800.251', '800.395', '800.3230', '0.42259999999998854', '0.100', '-0.42259999999998854', 'inactive'),
(13, '2883658 - Pressure', '999.8250', '1000.285', '1000.435', '1000.3600', '0.5349999999999682', '0.110', '-0.5349999999999682', 'inactive'),
(14, '2883658 - Pressure', '1199.7487', '1200.325', '1200.474', '1200.3990', '0.6502999999997883', '0.110', '-0.6502999999997883', 'inactive'),
(15, '2883658 - Pressure', '1399.7728', '1400.464', '1400.600', '1400.5320', '0.7591999999999643', '0.110', '-0.7591999999999643', 'inactive'),
(16, '2883658 - Pressure', '1599.6970', '1600.507', '1600.632', '1600.5690', '0.8720000000000709', '0.114', '-0.8720000000000709', 'inactive'),
(17, '2883658 - Pressure', '1799.6823', '1800.611', '1800.705', '1800.6580', '0.9756999999999607', '0.128', '-0.9756999999999607', 'inactive'),
(18, '2883658 - Pressure', '1999.6061', '2000.650', '2000.686', '2000.6680', '1.0618999999999232', '0.142', '-1.0618999999999232', 'inactive'),
(19, '', '1999.6061', '2000.650', '2000.686', '2000.6680', '1.0618999999999232', '0.142', '-1.0618999999999232', 'inactive'),
(20, '218181B0037-2024', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'inactive'),
(21, '218181B0037-2024', '2062.2', '2062.9', '2062.9', '2062.9', '0.7000000000002728', '0.5', '-0.7000000000002728', 'inactive'),
(22, '218181B0037-2024', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181', 'inactive'),
(23, '218181B0037-2024', '6188.7', '6189.4', '6189.4', '6189.4', '0.6999999999998181', '0.8', '-0.6999999999998181', 'inactive'),
(24, '218181B0037-2024', '8252.3', '8253.0', '8253.0', '8253.0', '0.7000000000007276', '1.0', '-0.7000000000007276', 'inactive'),
(25, '218181B0037-2024', '10315.3', '10315.9', '10315.9', '10315.9', '0.6000000000003638', '1.2', '-0.6000000000003638', 'inactive'),
(26, '218181B0037-2024', '12378.9', '12378.9', '12378.9', '12378.9', '0', '1.5', '0', 'inactive'),
(27, '218181B0037-2024', '14441.8', '14442.5', '14442.5', '14442.5', '0.7000000000007276', '1.7', '-0.7000000000007276', 'inactive'),
(28, '218181B0037-2024', '16505.4', '16505.4', '16505.4', '16505.4', '0', '0.0000', '0', 'inactive'),
(29, '218181B0037-2024', '18568.3', '18569.0', '18569.0', '18569.0', '0.7000000000007276', '-0.6895', '-0.7000000000007276', 'inactive'),
(30, '218181B0037-2024', '20631.2', '20631.9', '20631.9', '20631.9', '0.7000000000007276', '2.5', '-0.7000000000007276', 'inactive'),
(31, '218181B0037-2024', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'inactive'),
(32, 'sample', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'inactive'),
(33, 'sample', '2062.2', '2062.9', '2062.9', '2062.9', '0.7000000000002728', '0.5', '-0.7000000000002728', 'inactive'),
(34, 'sample', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181', 'inactive'),
(35, 'sample', '6188.7', '6189.4', '6189.4', '6189.4', '0.6999999999998181', '0.8', '-0.6999999999998181', 'inactive'),
(36, 'sample', '8252.3', '8253.0', '8253.0', '8253.0', '0.7000000000007276', '1.0', '-0.7000000000007276', 'inactive'),
(37, 'sample', '10315.3', '10315.9', '10315.9', '10315.9', '0.6000000000003638', '1.2', '-0.6000000000003638', 'inactive'),
(38, 'sample', '12378.9', '12378.9', '12378.9', '12378.9', '0', '1.5', '0', 'inactive'),
(39, 'sample', '14441.8', '14442.5', '14442.5', '14442.5', '0.7000000000007276', '1.7', '-0.7000000000007276', 'inactive'),
(40, 'sample', '16505.4', '16505.4', '16505.4', '16505.4', '0', '2.0', '0', 'inactive'),
(41, 'sample', '18568.3', '18569.0', '18569.0', '18569.0', '0.7000000000007276', '2.2', '-0.7000000000007276', 'inactive'),
(42, 'sample', '20631.2', '20631.9', '20631.9', '20631.9', '0.7000000000007276', '2.5', '-0.7000000000007276', 'inactive'),
(43, '3593048', '0.000', '0.00', '0.10', '0.050', '0.05', '0.100', '-0.05', 'inactive'),
(44, '3593048', '199.930', '199.90', '200.10', '200.000', '0.06999999999999318', '0.100', '-0.06999999999999318', 'inactive'),
(45, '3593048', '399.960', '399.90', '400.20', '400.050', '0.09000000000003183', '0.200', '-0.09000000000003183', 'inactive'),
(46, '3593048', '599.870', '599.80', '600.10', '599.950', '0.08000000000004093', '0.200', '-0.08000000000004093', 'inactive'),
(47, '3593048', '799.900', '799.90', '800.20', '800.050', '0.14999999999997726', '0.200', '-0.14999999999997726', 'inactive'),
(48, '3593048', '999.820', '999.80', '1000.20', '1000.000', '0.17999999999994998', '0.200', '-0.17999999999994998', 'inactive'),
(49, '3593048', '1199.740', '1199.80', '1200.10', '1199.950', '0.21000000000003638', '0.200', '-0.21000000000003638', 'inactive'),
(50, '3593048', '1399.760', '1399.90', '1400.10', '1400.000', '0.2400000000000091', '0.200', '-0.2400000000000091', 'inactive'),
(51, '3593048', '1599.690', '1600.00', '1600.20', '1600.100', '0.4099999999998545', '0.200', '-0.4099999999998545', 'inactive'),
(52, '3593048', '1799.670', '1799.90', '1800.00', '1799.950', '0.2799999999999727', '0.100', '-0.2799999999999727', 'inactive'),
(53, '3593048', '1999.590', '1999.90', '1999.90', '1999.900', '0.3100000000001728', '0.100', '-0.3100000000001728', 'inactive'),
(54, '4024042', '0', '0.0', '1.0', '0.0', '0', '1.0', '0', 'inactive'),
(55, '4024042', '6998.9', '6992.0', '6992.0', '6992.0', '-6.899999999999636', '1.0', '6.899999999999636', 'inactive'),
(56, '4024042', '13998.2', '13987.0', '13987.0', '13987.0', '-11.200000000000728', '2.0', '11.200000000000728', 'inactive'),
(57, '4024042', '20996.4', '20978.0', '20978.0', '20978.0', '-18.400000000001455', '2.0', '18.400000000001455', 'inactive'),
(58, '4024042', '27995.5', '27976.0', '27973.0', '27974.0', '-21.5', '4.0', '21.5', 'inactive'),
(59, '4024042', '34993.6', '34966.0', '34966.0', '34966.0', '-27.599999999998545', '3.0', '27.599999999998545', 'inactive'),
(60, '4024042', '41991.5', '41964.0', '41960.0', '41962.0', '-29.5', '5.0', '29.5', 'inactive'),
(61, '4024042', '48990.4', '48959.0', '48957.0', '48958.0', '-32.400000000001455', '9.0', '32.400000000001455', 'inactive'),
(62, '4024042', '55988.2', '55948.0', '55949.0', '55948.0', '-40.19999999999709', '5.0', '40.19999999999709', 'inactive'),
(63, '4024042', '62985.9', '62943.0', '62939.0', '62941.0', '-44.900000000001455', '7.0', '44.900000000001455', 'inactive'),
(64, '4024042', '69984.6', '69934.0', '69939.0', '69937.0', '-47.60000000000582', '6.0', '47.60000000000582', 'inactive'),
(65, '2883658 - Pressure', '1', '1', '1', '1', '0', '1', '0', 'inactive'),
(66, 'PM 620 / 3905003', '2', '2', '2', '2', '0', '2', '0', 'inactive'),
(67, 'PM 620 / 3905003', '2', '2', '2', '2', '0', '2', '0', 'inactive'),
(68, 'PM 620 / 3905003', '2', '2', '2', '2', '0', '2', '0', 'inactive'),
(69, 'PM 620 / 3905003', '3', '3', '3', '3', '0', '3', '0', 'inactive'),
(70, 'PM 620 / 3905003', '2', '2', '2', '2', '0', '2', '0', 'inactive'),
(71, 'PM 620 / 3905003', '0.000', '0.00', '1.00', '0.5000', '0.5', '2.5000', '-0.5', 'inactive'),
(72, 'PM 620 / 3905003', '19953.090', '19958.40', '19967.60', '19963.0000', '9.909999999999854', '5.6000', '-9.909999999999854', 'inactive'),
(73, 'PM 620 / 3905003', '39906.450', '39919.20', '39931.30', '39925.3000', '18.85000000000582', '7.4000', '-18.85000000000582', 'inactive'),
(74, 'PM 620 / 3905003', '59858.670', '59881.50', '59895.40', '59888.4000', '29.7300000000032', '8.7000', '-29.7300000000032', 'inactive'),
(75, 'PM 620 / 3905003', '79811.410', '79844.80', '79858.40', '79851.6000', '40.19000000000233', '8.6000', '-40.19000000000233', 'inactive'),
(76, 'PM 620 / 3905003', '99764.210', '99807.50', '99822.10', '99814.8000', '50.58999999999651', '9.4000', '-50.58999999999651', 'inactive'),
(77, 'PM 620 / 3905003', '119716.920', '119770.60', '119784.70', '119777.7000', '60.779999999998836', '9.5000', '-60.779999999998836', 'inactive'),
(78, 'PM 620 / 3905003', '139669.690', '139734.80', '139747.40', '139741.1000', '71.41000000000349', '10.0000', '-71.41000000000349', 'inactive'),
(79, 'PM 620 / 3905003', '159622.440', '159698.30', '159708.80', '159703.5000', '81.05999999999767', '12.0000', '-81.05999999999767', 'inactive'),
(80, 'PM 620 / 3905003', '179571.320', '179658.70', '179665.40', '179662.1000', '90.77999999999884', '13.0000', '-90.77999999999884', 'inactive'),
(81, 'PM 620 / 3905003', '199963.000', '200062.00', '200065.00', '200063.5000', '100.5', '15.0000', '-100.5', 'inactive'),
(82, 'PM 620 / 3905003', '0.000', '0.00', '0.00', '0.0000', '0', '63.0000', '0', 'active'),
(83, 'PM 620 / 3905003', '99911.800', '99640.00', '99664.00', '99652.0000', '-259.8000000000029', '63.0000', '259.8000000000029', 'active'),
(84, 'PM 620 / 3905003', '199648.500', '199424.00', '199440.00', '199432.0000', '-216.5', '63.0000', '216.5', 'active'),
(85, 'PM 620 / 3905003', '299357.900', '299182.00', '299179.00', '299180.5000', '-177.40000000002328', '63.0000', '177.40000000002328', 'active'),
(86, 'PM 620 / 3905003', '399096.700', '398948.00', '398982.00', '398965.0000', '-131.70000000001164', '63.0000', '131.70000000001164', 'active'),
(87, 'PM 620 / 3905003', '498820.400', '498763.00', '498774.00', '498768.5000', '-51.90000000002328', '63.0000', '51.90000000002328', 'active'),
(88, 'PM 620 / 3905003', '598537.700', '598513.00', '598510.00', '598511.5000', '-26.199999999953434', '63.0000', '26.199999999953434', 'active'),
(89, 'PM 620 / 3905003', '698257.900', '698284.00', '698294.00', '698289.0000', '31.099999999976717', '63.0000', '-31.099999999976717', 'active'),
(90, 'PM 620 / 3905003', '797978.300', '798054.00', '798052.00', '798053.0000', '74.69999999995343', '67.0000', '-74.69999999995343', 'active'),
(91, 'PM 620 / 3905003', '897774.700', '897866.00', '897837.00', '897851.5000', '76.80000000004657', '75.0000', '-76.80000000004657', 'active'),
(92, 'PM 620 / 3905003', '999733.700', '999831.00', '999839.00', '999835.0000', '101.30000000004657', '83.0000', '-101.30000000004657', 'active'),
(93, '2883658 - Pressure', '0.0000', '0.000', '0.035', '0.0175', '0.0175', '0.040', '-0.0175', 'inactive'),
(94, '2883658 - Pressure', '999.1180', '996.400', '200.096', '598.2480', '-400.87', '0.090', '400.87', 'inactive'),
(95, '2883658 - Pressure', '1996.4850', '1994.240', '400.229', '1197.2345', '-799.2504999999999', '0.090', '799.2504999999999', 'inactive'),
(96, '2883658 - Pressure', '2993.5790', '2991.820', '600.259', '1796.0395', '-1197.5395', '0.090', '1197.5395', 'inactive'),
(97, '2883658 - Pressure', '3990.9670', '3989.480', '800.395', '2394.9375', '-1596.0295', '0.100', '1596.0295', 'inactive'),
(98, '2883658 - Pressure', '4988.2040', '4987.630', '1000.435', '2994.0325', '-1994.1715', '0.110', '1994.1715', 'inactive'),
(99, '2883658 - Pressure', '5985.3770', '5985.130', '1200.474', '1200.3990', '-4784.978000000001', '0.110', '4784.978000000001', 'inactive'),
(100, '2883658 - Pressure', '6982.5790', '6982.840', '1400.600', '4191.7200', '-2790.8589999999995', '0.110', '2790.8589999999995', 'inactive'),
(101, '2883658 - Pressure', '7979.7830', '7980.540', '1600.632', '1600.5690', '-6379.214', '0.114', '6379.214', 'inactive'),
(102, '2883658 - Pressure', '8977.7470', '8978.660', '1800.705', '5389.6825', '-3588.0644999999995', '0.128', '3588.0644999999995', 'inactive'),
(103, '2883658 - Pressure', '9997.3370', '9998.310', '2000.686', '5999.4980', '-3997.839', '0.142', '3997.839', 'inactive'),
(104, '2883658 - Pressure', '9997.3370', '9998.310', '2000.686', '5999.4980', '-3997.839', '0.142', '3997.839', 'inactive'),
(105, '2883658 - Pressure', '0.0000', '0.000', '0.035', '0.0175', '0.0175', '0.040', '-0.0175', 'inactive'),
(106, '2883658 - Pressure', '999.1180', '996.400', '200.096', '598.2480', '-400.87', '0.090', '400.87', 'inactive'),
(107, '2883658 - Pressure', '1996.4850', '1994.240', '400.229', '1197.2345', '-799.2504999999999', '0.090', '799.2504999999999', 'inactive'),
(108, '2883658 - Pressure', '2993.5790', '2991.820', '600.259', '1796.0395', '-1197.5395', '0.090', '1197.5395', 'inactive'),
(109, '2883658 - Pressure', '3990.9670', '3989.480', '800.395', '2394.9375', '-1596.0295', '0.100', '1596.0295', 'inactive'),
(110, '2883658 - Pressure', '4988.2040', '4987.630', '1000.435', '2994.0325', '-1994.1715', '0.110', '1994.1715', 'inactive'),
(111, '2883658 - Pressure', '5985.3770', '5985.130', '1200.474', '1200.3990', '-4784.978000000001', '0.110', '4784.978000000001', 'inactive'),
(112, '2883658 - Pressure', '6982.5790', '6982.840', '1400.600', '4191.7200', '-2790.8589999999995', '0.110', '2790.8589999999995', 'inactive'),
(113, '2883658 - Pressure', '7979.7830', '7980.540', '1600.632', '1600.5690', '-6379.214', '0.114', '6379.214', 'inactive'),
(114, '2883658 - Pressure', '8977.7470', '8978.660', '1800.705', '5389.6825', '-3588.0644999999995', '0.128', '3588.0644999999995', 'inactive'),
(115, '2883658 - Pressure', '9997.3370', '9998.310', '2000.686', '5999.4980', '-3997.839', '0.142', '3997.839', 'inactive'),
(116, '2883658 - Pressure', '0.0000', '0.000', '0.035', '0.0175', '0.0175', '0.040', '-0.0175', 'active'),
(117, '2883658 - Pressure', '999.1180', '996.400', '200.096', '598.2480', '-400.87', '0.090', '400.87', 'active'),
(118, '2883658 - Pressure', '1996.4850', '1994.240', '400.229', '1197.2345', '-799.2504999999999', '0.090', '799.2504999999999', 'active'),
(119, '2883658 - Pressure', '2993.5790', '2991.820', '600.259', '1796.0395', '-1197.5395', '0.090', '1197.5395', 'active'),
(120, '2883658 - Pressure', '3990.9670', '3989.480', '800.395', '2394.9375', '-1596.0295', '0.100', '1596.0295', 'active'),
(121, '2883658 - Pressure', '4988.2040', '4987.630', '1000.435', '2994.0325', '-1994.1715', '0.110', '1994.1715', 'active'),
(122, '2883658 - Pressure', '5985.3770', '5985.130', '1200.474', '1200.3990', '-4784.978000000001', '0.110', '4784.978000000001', 'active'),
(123, '2883658 - Pressure', '6982.5790', '6982.840', '1400.600', '4191.7200', '-2790.8589999999995', '0.110', '2790.8589999999995', 'active'),
(124, '2883658 - Pressure', '7979.7830', '7980.540', '1600.632', '1600.5690', '-6379.214', '0.114', '6379.214', 'active'),
(125, '2883658 - Pressure', '8977.7470', '8978.660', '1800.705', '5389.6825', '-3588.0644999999995', '0.128', '3588.0644999999995', 'active'),
(126, '2883658 - Pressure', '9997.3370', '9998.310', '2000.686', '5999.4980', '-3997.839', '0.142', '3997.839', 'active'),
(127, '3593048', '0.000', '0.00', '0.10', '0.050', '0.05', '0.058', '-0.05', 'active'),
(128, '3593048', '199.530', '199.50', '199.60', '199.550', '0.020000000000010232', '0.120', '-0.020000000000010232', 'active'),
(129, '3593048', '399.060', '398.90', '399.10', '399.000', '-0.060000000000002274', '0.130', '0.060000000000002274', 'active'),
(130, '3593048', '598.590', '598.40', '598.70', '598.550', '-0.04000000000007731', '0.190', '0.04000000000007731', 'active'),
(131, '3593048', '798.110', '797.90', '798.20', '798.050', '-0.06000000000005912', '0.220', '0.06000000000005912', 'active'),
(132, '3593048', '997.640', '997.40', '997.70', '997.550', '-0.09000000000003183', '0.220', '0.09000000000003183', 'active'),
(133, '3593048', '1197.170', '1196.90', '1197.20', '1197.050', '-0.12000000000011823', '0.190', '0.12000000000011823', 'active'),
(134, '3593048', '1396.700', '1396.50', '1396.70', '1396.600', '-0.10000000000013642', '0.180', '0.10000000000013642', 'active'),
(135, '3593048', '1596.220', '1596.00', '1596.20', '1596.100', '-0.12000000000011823', '0.140', '0.12000000000011823', 'active'),
(136, '3593048', '1795.710', '1795.50', '1795.60', '1795.550', '-0.16000000000008185', '0.130', '0.16000000000008185', 'active'),
(137, '3593048', '1999.630', '1999.50', '1999.50', '1999.500', '-0.13000000000010914', '0.150', '0.13000000000010914', 'active'),
(138, '4024042 ', '0', '0', '0', '0', '0', '1', '0', 'active'),
(139, '4024042 ', '6999.0', '6930', '6994', '6993', '-6', '2', '6', 'active'),
(140, '4024042 ', '13998.3', '13990', '13989', '13989', '-9.299999999999272', '3', '9.299999999999272', 'active'),
(141, '4024042 ', '20996.6', '20983', '20985', '20984', '-12.599999999998545', '2', '12.599999999998545', 'active'),
(142, '4024042 ', '27995.7', '27977', '27980', '27978', '-17.700000000000728', '3', '17.700000000000728', 'active'),
(143, '4024042 ', '34993.8', '34971', '34974', '34972', '-21.80000000000291', '3', '21.80000000000291', 'active'),
(144, '4024042 ', '41991.8', '41965', '41969', '41967', '-24.80000000000291', '4', '24.80000000000291', 'active'),
(145, '4024042 ', '48990.7', '48963', '48964', '48963', '-27.69999999999709', '4', '27.69999999999709', 'active'),
(146, '4024042 ', '55988.5', '55954', '55956', '55955', '-33.5', '5', '33.5', 'active'),
(147, '4024042 ', '62986.3', '62949', '62948', '62948', '-38.30000000000291', '5', '38.30000000000291', 'active'),
(148, '4024042 ', '69985.0', '69949', '69951', '69950', '-35', '6', '35', 'active'),
(149, '218181B0037-2024', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'inactive'),
(150, '218181B0037-2024', '2062.2', '2062.9', '2062.9', '2062.9', '0.7000000000002728', '0.5', '-0.7000000000002728', 'inactive'),
(151, '218181B0037-2024', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181', 'inactive'),
(152, '218181B0037-2024', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181', 'inactive'),
(153, '218181B0037-2024', '6188.7', '6189.4', '6189.4', '6189.4', '0.6999999999998181', '0.8', '-0.6999999999998181', 'inactive'),
(154, '218181B0037-2024', '8252.3', '8253.0', '8253.0', '8253.0', '0.7000000000007276', '1.0', '-0.7000000000007276', 'inactive'),
(155, '218181B0037-2024', '10315.3', '10315.9', '10315.9', '10315.9', '0.6000000000003638', '1.2', '-0.6000000000003638', 'inactive'),
(156, '218181B0037-2024', '12378.9', '12378.9', '12378.9', '12378.9', '0', '1.5', '0', 'inactive'),
(157, '218181B0037-2024', '14441.8', '14442.5', '14442.5', '14442.5', '0.7000000000007276', '1.7', '-0.7000000000007276', 'inactive'),
(158, '218181B0037-2024', '16505.4', '16505.4', '16505.4', '16505.4', '0', '2.0', '0', 'inactive'),
(159, '218181B0037-2024', '18568.3', '18569.0', '18569.0', '18569.0', '0.7000000000007276', '2.2', '-0.7000000000007276', 'inactive'),
(160, '218181B0037-2024', '20631.2', '20631.9', '20631.9', '20631.9', '0.7000000000007276', '2.5', '-0.7000000000007276', 'inactive'),
(161, '218181B0037-2024', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'active'),
(162, '218181B0037-2024', '2062.2', '2062.2', '2062.2', '2062.2', '0', '0.5', '0', 'active'),
(163, '218181B0037-2024', '4125.1', '4125.8', '4125.8', '4125.8', '0.6999999999998181', '0.6', '-0.6999999999998181', 'active'),
(164, '218181B0037-2024', '6188.0', '6188.7', '6188.7', '6188.7', '0.6999999999998181', '0.8', '-0.6999999999998181', 'active'),
(165, '218181B0037-2024', '8251.0', '8252.3', '8252.3', '8252.3', '1.2999999999992724', '1.0', '-1.2999999999992724', 'active'),
(166, '218181B0037-2024', '10313.2', '10315.3', '10315.3', '10315.3', '2.099999999998545', '1.3', '-2.099999999998545', 'active'),
(167, '218181B0037-2024', '12376.8', '12378.9', '12378.9', '12378.9', '2.100000000000364', '1.5', '-2.100000000000364', 'active'),
(168, '218181B0037-2024', '14439.7', '14441.8', '14441.8', '14441.8', '2.099999999998545', '1.7', '-2.099999999998545', 'active'),
(169, '218181B0037-2024', '16502.6', '16505.4', '16505.4', '16505.4', '2.8000000000029104', '2.0', '-2.8000000000029104', 'active'),
(170, '218181B0037-2024', '18565.5', '18569.0', '18569.0', '18569.0', '3.5', '2.2', '-3.5', 'active'),
(171, '218181B0037-2024', '20627.7', '20631.2', '20631.2', '20631.2', '3.5', '2.5', '-3.5', 'active'),
(172, '4323213', '0.00000', '0.00000', '0.00000', '1.00000', '1', '0.01000', '-1', 'active'),
(173, '4323213', '9.99400', '9.96000', '9.97000', '9.96000', '-0.03399999999999892', '0.02000', '0.03399999999999892', 'active'),
(174, '4323213', '19.99000', '19.93000', '19.95000', '19.94000', '-0.04999999999999716', '0.02000', '0.04999999999999716', 'active'),
(175, '4323213', '29.98400', '29.92000', '29.93000', '29.92000', '-0.06400000000000006', '0.02000', '0.06400000000000006', 'active'),
(176, '4323213', '39.98100', '39.91000', '39.91000', '39.91000', '-0.07100000000000506', '0.03000', '0.07100000000000506', 'active'),
(177, '4323213', '49.97300', '49.89000', '49.89000', '49.89000', '-0.08299999999999841', '0.03000', '0.08299999999999841', 'active'),
(178, '4323213', '59.97000', '59.87000', '59.89000', '59.88000', '-0.0899999999999963', '0.03000', '0.0899999999999963', 'active'),
(179, '4323213', '69.96200', '69.86000', '69.87000', '69.86000', '-0.10200000000000387', '0.02000', '0.10200000000000387', 'active'),
(180, '4323213', '79.96600', '79.84000', '79.85000', '79.84000', '-0.12599999999999056', '0.03000', '0.12599999999999056', 'active'),
(181, '4323213', '89.95800', '89.82000', '89.82000', '89.82000', '-0.13800000000000523', '0.03000', '0.13800000000000523', 'active'),
(182, '4323213', '99.95700', '99.81000', '99.81000', '99.81000', '-0.14699999999999136', '0.03000', '0.14699999999999136', 'active'),
(183, '2883658 - Vacuum', '0.0000', '0.000', '0.000', '0.000', '0', '0.020', '0', 'active'),
(184, '2883658 - Vacuum', '-9.9941', '-9.987', '-9.974', '-9.980', '0.014099999999999113', '0.020', '-0.014099999999999113', 'active'),
(185, '2883658 - Vacuum', '-19.9900', '-19.967', '-19.964', '-19.965', '0.02499999999999858', '0.020', '-0.02499999999999858', 'active'),
(186, '2883658 - Vacuum', '-29.9838', '-29.960', '-29.960', '-29.960', '0.023799999999997823', '0.020', '-0.023799999999997823', 'active'),
(187, '2883658 - Vacuum', '-39.9811', '-39.954', '-39.954', '-39.954', '0.027099999999997237', '0.030', '-0.027099999999997237', 'active'),
(188, '2883658 - Vacuum', '-49.9727', '-49.942', '-49.937', '-49.939', '0.03370000000000317', '0.020', '-0.03370000000000317', 'active'),
(189, '2883658 - Vacuum', '-59.9697', '-59.930', '-59.925', '-59.927', '0.04270000000000351', '0.020', '-0.04270000000000351', 'active'),
(190, '2883658 - Vacuum', '-69.9617', '-69.914', '-69.915', '-69.915', '0.046699999999987085', '0.030', '-0.046699999999987085', 'active'),
(191, '2883658 - Vacuum', '-79.9662', '-79.899', '-79.905', '-79.902', '0.06419999999999959', '0.030', '-0.06419999999999959', 'active'),
(192, '2883658 - Vacuum', '-89.9576', '-89.894', '-89.897', '-89.895', '0.06260000000000332', '0.030', '-0.06260000000000332', 'active'),
(193, '2883658 - Vacuum', '-94.9527', '-94.873', '-94.885', '-94.879', '0.07369999999998811', '0.030', '-0.07369999999998811', 'active'),
(194, '4003026 - Pressure', '0.000', '0.00', '0.00', '0.00', '0', '0.90', '0', 'active'),
(195, '4003026 - Pressure', '11.323', '10.00', '10.00', '10.00', '-1.3230000000000004', '1.00', '1.3230000000000004', 'active'),
(196, '4003026 - Pressure', '21.340', '20.00', '20.00', '20.00', '-1.3399999999999999', '1.00', '1.3399999999999999', 'active'),
(197, '4003026 - Pressure', '31.408', '30.00', '30.00', '30.00', '-1.4080000000000013', '1.00', '1.4080000000000013', 'active'),
(198, '4003026 - Pressure', '41.391', '40.00', '40.00', '40.00', '-1.3909999999999982', '1.00', '1.3909999999999982', 'active'),
(199, '4003026 - Pressure', '51.415', '50.00', '50.00', '50.00', '-1.4149999999999991', '1.00', '1.4149999999999991', 'active'),
(200, '4003026 - Pressure', '61.443', '60.00', '6.00', '60.00', '-1.4429999999999978', '1.00', '1.4429999999999978', 'active'),
(201, '4003026 - Pressure', '71.421', '70.00', '70.00', '70.00', '-1.4210000000000065', '1.00', '1.4210000000000065', 'active'),
(202, '4003026 - Pressure', '81.435', '80.00', '80.00', '80.00', '-1.4350000000000023', '1.00', '1.4350000000000023', 'active'),
(203, '4003026 - Pressure', '91.409', '90.00', '90.00', '90.00', '-1.409000000000006', '1.00', '1.409000000000006', 'active'),
(204, '4003026 - Pressure', '101.382', '100.00', '100.00', '100.00', '-1.382000000000005', '1.00', '1.382000000000005', 'active'),
(205, '4003026 - Vacuum', '0.0000', '0.0000', '0.000', '0.000', '0', '0.027', '0', 'active'),
(206, '4003026 - Vacuum', '-9.9890', '-10.0000', '-10.000', '-10.000', '-0.010999999999999233', '0.027', '0.010999999999999233', 'active'),
(207, '4003026 - Vacuum', '-19.9200', '-20.0000', '-20.000', '-20.000', '-0.0799999999999983', '0.027', '0.0799999999999983', 'active'),
(208, '4003026 - Vacuum', '-29.8400', '-30.0000', '-30.000', '-30.000', '-0.16000000000000014', '0.027', '0.16000000000000014', 'active'),
(209, '4003026 - Vacuum', '-39.9780', '-40.0000', '-40.000', '-40.000', '-0.021999999999998465', '0.027', '0.021999999999998465', 'active'),
(210, '4003026 - Vacuum', '-49.9670', '-50.0000', '-50.000', '-50.000', '-0.03300000000000125', '0.027', '0.03300000000000125', 'active'),
(211, '4003026 - Vacuum', '-59.9950', '-60.0000', '-60.000', '-60.000', '-0.005000000000002558', '0.027', '0.005000000000002558', 'active'),
(212, '4003026 - Vacuum', '-69.9250', '-70.0000', '-70.000', '-70.000', '-0.07500000000000284', '0.027', '0.07500000000000284', 'active'),
(213, '4003026 - Vacuum', '-79.9950', '-80.0000', '-80.000', '-80.000', '-0.0049999999999954525', '0.027', '0.0049999999999954525', 'active'),
(214, '4003026 - Vacuum', '-89.9870', '-90.0000', '-90.000', '-90.000', '-0.01300000000000523', '0.027', '0.01300000000000523', 'active'),
(215, '4003026 - Vacuum', '0.0000', '0.0000', '0.000', '0.000', '0', '0.000', '0', 'active'),
(216, '218181B0037 - 2024', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'inactive'),
(217, '218181B0037 - 2024', '2062.2', '2062.2', '2062.2', '2062.2', '0', '0.5', '0', 'inactive'),
(218, '218181B0037 - 2024', '4125.1', '4125.8', '4125.8', '4125.8', '0.6999999999998181', '0.6', '-0.6999999999998181', 'inactive'),
(219, '218181B0037 - 2024', '6188.0', '6188.7', '6188.7', '6188.7', '0.6999999999998181', '0.8', '-0.6999999999998181', 'inactive'),
(220, '218181B0037 - 2024', '8251.0', '8252.3', '8252.3', '8252.3', '1.2999999999992724', '1.0', '-1.2999999999992724', 'inactive'),
(221, '218181B0037 - 2024', '10313.2', '10315.3', '10315.3', '10315.3', '2.099999999998545', '1.2', '-2.099999999998545', 'inactive'),
(222, '218181B0037 - 2024', '12376.8', '12378.9', '12378.9', '12378.9', '2.100000000000364', '1.5', '-2.100000000000364', 'inactive'),
(223, '218181B0037 - 2024', '14439.7', '14441.8', '14441.8', '14441.8', '2.099999999998545', '1.7', '-2.099999999998545', 'inactive'),
(224, '218181B0037 - 2024', '16502.6', '16505.4', '16505.4', '16505.4', '2.8000000000029104', '2.0', '-2.8000000000029104', 'inactive'),
(225, '218181B0037 - 2024', '18565.5', '18569.0', '18569.0', '18569.0', '3.5', '2.2', '-3.5', 'inactive'),
(226, '218181B0037 - 2024', '20627.7', '20631.2', '20631.2', '20631.2', '3.5', '2.5', '-3.5', 'inactive'),
(227, '218181B0037-2023', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0', 'active'),
(228, '218181B0037-2023', '2062.2', '2062.9', '2062.9', '2062.9', '0.7000000000002728', '0.5', '-0.7000000000002728', 'active'),
(229, '218181B0037-2023', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181', 'active'),
(230, '218181B0037-2023', '6188.7', '6189.4', '6189.4', '6189.4', '0.6999999999998181', '0.8', '-0.6999999999998181', 'active'),
(231, '218181B0037-2023', '8252.3', '8253.0', '8253.0', '8253.0', '0.7000000000007276', '1.0', '-0.7000000000007276', 'active'),
(232, '218181B0037-2023', '10315.3', '10315.9', '10315.9', '10315.9', '0.6000000000003638', '1.2', '-0.6000000000003638', 'active'),
(233, '218181B0037-2023', '12378.9', '12378.9', '12378.9', '12378.9', '0', '1.5', '0', 'active'),
(234, '218181B0037-2023', '14441.8', '14442.5', '14442.5', '14442.5', '0.7000000000007276', '1.7', '-0.7000000000007276', 'active'),
(235, '218181B0037-2023', '16505.4', '16505.4', '16505.4', '16505.4', '0', '2.0', '0', 'active'),
(236, '218181B0037-2023', '18568.3', '18569.0', '18569.0', '18569.0', '0.7000000000007276', '2.2', '-0.7000000000007276', 'active'),
(237, '218181B0037-2023', '20631.2', '20631.9', '20631.9', '20631.9', '0.7000000000007276', '2.5', '-0.7000000000007276', 'active'),
(238, '4024042 - 2024', '0.0', '0.0', '2.0', '1.0', '1', '1.6', '-1', 'active'),
(239, '4024042 - 2024', '6985.1', '6978.0', '6978.0', '6978.0', '-7.100000000000364', '1.3', '7.100000000000364', 'active'),
(240, '4024042 - 2024', '13968.5', '13956.0', '13960.0', '13958.0', '-10.5', '3.3', '10.5', 'active'),
(241, '4024042 - 2024', '20951.8', '20935.0', '20940.0', '20937.5', '-14.299999999999272', '3.0', '14.299999999999272', 'active'),
(242, '4024042 - 2024', '27934.9', '27914.0', '27916.0', '27915.0', '-19.900000000001455', '2.9', '19.900000000001455', 'active'),
(243, '4024042 - 2024', '34918.1', '34893.0', '34896.0', '34894.5', '-23.599999999998545', '3.4', '23.599999999998545', 'active'),
(244, '4024042 - 2024', '41901.1', '41872.0', '41875.0', '41873.5', '-27.599999999998545', '3.6', '27.599999999998545', 'active'),
(245, '4024042 - 2024', '48884.0', '48854.0', '48855.0', '48854.5', '-29.5', '4.1', '29.5', 'active'),
(246, '4024042 - 2024', '55866.9', '55831.0', '55832.0', '55831.5', '-35.400000000001455', '4.7', '35.400000000001455', 'active'),
(247, '4024042 - 2024', '62849.7', '62808.0', '62808.0', '62808.0', '-41.69999999999709', '5.3', '41.69999999999709', 'active'),
(248, '4024042 - 2024', '69986.1', '69946.0', '69945.0', '69945.5', '-40.60000000000582', '5.9', '40.60000000000582', 'active'),
(249, '3593048-2022', '0.000', '0.00', '0.10', '0.050', '0.05', '0.100', '-0.05', 'active'),
(250, '3593048-2022', '199.930', '199.90', '200.10', '200.000', '0.06999999999999318', '0.100', '-0.06999999999999318', 'active'),
(251, '3593048-2022', '399.960', '399.90', '400.20', '400.050', '0.09000000000003183', '0.200', '-0.09000000000003183', 'active'),
(252, '3593048-2022', '599.870', '599.80', '600.10', '599.950', '0.08000000000004093', '0.200', '-0.08000000000004093', 'active'),
(253, '3593048-2022', '799.900', '799.90', '800.20', '800.050', '0.14999999999997726', '0.200', '-0.14999999999997726', 'active'),
(254, '3593048-2022', '999.820', '999.80', '1000.20', '1000.000', '0.17999999999994998', '0.200', '-0.17999999999994998', 'active'),
(255, '3593048-2022', '1199.740', '1199.80', '1200.10', '1199.950', '0.21000000000003638', '0.200', '-0.21000000000003638', 'active'),
(256, '3593048-2022', '1399.760', '1399.90', '1400.10', '1400.000', '0.2400000000000091', '0.200', '-0.2400000000000091', 'active'),
(257, '3593048-2022', '1599.690', '1600.00', '1600.20', '1600.100', '0.4099999999998545', '0.200', '-0.4099999999998545', 'active'),
(258, '3593048-2022', '1799.670', '1799.90', '1800.00', '1799.950', '0.2799999999999727', '0.100', '-0.2799999999999727', 'active'),
(259, '3593048-2022', '1999.590', '1999.90', '1999.90', '1999.900', '0.3100000000001728', '0.100', '-0.3100000000001728', 'active');

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

--
-- Dumping data for table `requestsamples`
--

INSERT INTO `requestsamples` (`id`, `sampleID`, `requestReferenceNumber`, `sampleCode`, `worksheetType`, `worksheetID`, `rawData`) VALUES
(348, '17903', 'R4AL1-022024-MET-0027', '', 'THERMOMETER', '160', '{\"id\":\"17903\",\"sampleCode\":\"\",\"sampleName\":\"1) Digital Thermometer\",\"description\":\"CP-011\\r\\nCert. No.: 2024-027-TMP-02-001\\r\\nManufacturer : Testo\\r\\nModel : 108\\r\\nSerial No. : 42643659/803\"}'),
(349, '17904', 'R4AL1-022024-MET-0027', '', 'THERMOMETER', '161', '{\"id\":\"17904\",\"sampleCode\":\"\",\"sampleName\":\"2) Digital Thermometer\",\"description\":\"CP-011\\r\\nCert. No.: 2024-027-TMP-02-002\\r\\nManufacturer : Testo\\r\\nModel : 108\\r\\nSerial No. : 42681534/1021\"}'),
(350, '17905', 'R4AL1-022024-MET-0027', '', 'THERMOMETER', '162', '{\"id\":\"17905\",\"sampleCode\":\"\",\"sampleName\":\"3) Digital Thermometer\",\"description\":\"CP-011\\r\\nCert. No.: 2024-027-TMP-02-003\\r\\nManufacturer : Testo\\r\\nModel : 108\\r\\nSerial No. : 42680985/1021\"}'),
(351, '17833', 'R4AL1-022024-MET-0019', '', 'BALANCE', '442', '{\"id\":\"17833\",\"sampleCode\":\"\",\"sampleName\":\"1) Electronic Balance\",\"description\":\"Cert No.: 2024-019-MAS-02-001\\r\\nManufacturer : General Master\\r\\nModel : GM-10-JE21\\r\\nSerial No. : 160907-04907\\r\\n\"}'),
(352, '17834', 'R4AL1-022024-MET-0019', '', 'BALANCE', '443', '{\"id\":\"17834\",\"sampleCode\":\"\",\"sampleName\":\"2) Electronic Balance\",\"description\":\"Cert No.: 2024-019-MAS-02-002\\r\\nManufacturer : General Master\\r\\nModel : GM-10-JE21\\r\\nSerial No. : 171670-00789\\r\\n\"}');

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

--
-- Dumping data for table `rml_table`
--

INSERT INTO `rml_table` (`id`, `ccno`, `costumer`, `address`, `equipment`, `manufacturer`, `modelno`, `serialno`, `equipid`, `accuracy`, `range_range`, `measurement`, `graduation`, `readability`, `datereceived`, `datecalibrated`, `reccduedate`, `placeofcalib`, `capacity`, `ambtemp`, `relhumidity`, `Patm`, `prelimInspec`, `hstd`, `huuc`, `heightDifference`, `medium`, `remarks`, `standardDescription`, `standardManufacturer`, `standardModelNumber`, `standardSerialNumber`, `dateOfNextCalibration`, `standardRemarks`, `standardAccessories`, `timeStarted`, `timeFinished`, `calibratedBy`, `checkedBy`, `daten`, `MeasurementData`) VALUES
(11, 123, '123', '123', '123', '123', 123, 123, '123', '123', '123', '', '123', '123', '', '2021-05-26', '2021-05-26', '123', '123', '123', '123', '123', 'A0B0E0F', '123', '123', '123', '123', '123', '123', '123', '123', '123', '0023-12-31', '123', '123', '12:31', '12:31', '123', '123', '0023-12-31', '[{\"id\":\"asd\",\"one\":\"asd\",\"two\":\"asd\",\"three\":\"asd\"},{\"id\":\"123\",\"one\":\"1234\",\"two\":\"1234\",\"three\":\"1234\"}]'),
(12, 123, '123', '123', '123', '123', 123, 123, '123', '123', '123', 'psi', '123', '123', '', '2021-05-26', '2021-05-26', '123', '123', '123', '123', '123', 'A0B0E0F', '123', '123', '123', '123', '123', '123', '123', '123', '123', '0023-12-31', '123', '123', '12:31', '12:31', '123', '123', '0023-12-31', '[{\"key\":3,\"id\":\"3\",\"one\":\"1234\",\"two\":\"1234\",\"three\":\"134\"},{\"key\":2,\"id\":\"2\",\"one\":\"1234\",\"two\":\"1234\",\"three\":\"1234\"},{\"key\":1,\"id\":\"1\",\"one\":\"1234\",\"two\":\"1234\",\"three\":\"1234\"}]'),
(13, 0, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '2021-05-26', '2021-05-26', '', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2021-05-26', '', '', '00:33', '06:37', '', '', '2021-05-26', '[{\"key\":1,\"id\":\"\",\"one\":\"\",\"two\":\"\",\"three\":\"\"}]'),
(14, 0, '', '', '', '', 0, 0, '', '', '', '', '', '', '2021-05-26', '2021-05-26', '2021-05-26', '', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2021-05-26', '', '', '00:33', '06:37', '', '', '2021-05-26', '[{\"key\":1,\"id\":\"\",\"one\":\"\",\"two\":\"\",\"three\":\"\"}]'),
(15, 0, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[{\"key\":1,\"id\":\"\",\"one\":\"\",\"two\":\"\",\"three\":\"\"}]'),
(16, 2147483647, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[{\"key\":1,\"id\":\"\",\"one\":\"\",\"two\":\"\",\"three\":\"\"}]'),
(17, 55555, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[{\"key\":1,\"id\":\"\",\"one\":\"\",\"two\":\"\",\"three\":\"\"}]');

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
-- Table structure for table `standard_currentcoil`
--

CREATE TABLE `standard_currentcoil` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `turns` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standard_currentcoil`
--

INSERT INTO `standard_currentcoil` (`id`, `description`, `serialNumber`, `turns`, `status`) VALUES
(1, 'Current coil turn 10', 'Current coil turn 10', '10', 'active');

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

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `lname`, `email`, `phone_no`, `password`, `created_at`, `profile_image`, `signature`, `position`, `role`) VALUES
(2, 'Paulo', 'Molleno', 'pau123@gmail.com', '12312312313', '$2y$10$iEJib7LzvdkONhC01ZL1LuJKC1Yif84NAt/tYd/HE2lhyoQM6aInC', '2021-07-26 00:42:33', NULL, NULL, NULL, 'admin'),
(13, 'Admin', 'Account', 'admin@admin.com', '09123456789', '$2y$10$nw5SvCMa7ZffzltBC59pmekxo6gYmtPJayyKNjLKmcMaIZhJu.kra', '2022-09-22 03:37:10', NULL, NULL, NULL, 'admin'),
(14, 'Roger', 'Esmeria', 'roger_esmeria@gmail.com', '09091234567', '$2y$10$FROSpSIn1V43kubbZ3Xb3.6HAJhDGUva1dl24gd7LovDeBhCZCH9u', '2022-09-27 03:10:34', NULL, NULL, NULL, 'admin'),
(15, 'John June', 'Paran', 'june_paran@gmail.com', '09091234567', '$2y$10$FROSpSIn1V43kubbZ3Xb3.6HAJhDGUva1dl24gd7LovDeBhCZCH9u', '2022-09-27 03:10:34', NULL, NULL, NULL, 'admin'),
(17, 'Rogerson', 'Esmeria', 'r.esmeria@r3cms.com', '09091234567', '$2y$10$2SMyV84el1MpJ/6x/EBEZOrgthO3t3YDuphjdK77EpWs6M35u7gYG', '2024-01-12 01:00:24', NULL, NULL, NULL, 'admin'),
(18, 'Mylene', 'Lontoc', 'm.lontoc@r3cms.com', '09000000000', '$2y$10$Jx7AUTjcmy5EL/LDNDRmJenN315NyIWPaLA3bD7l6HETsUygtny0u', '2024-01-22 05:14:39', NULL, NULL, NULL, 'admin');

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

--
-- Dumping data for table `tbl_users_guest`
--

INSERT INTO `tbl_users_guest` (`id`, `name`, `lname`, `email`, `password`, `phone_no`, `created_at`, `profile_image`, `signature`, `position`, `role`) VALUES
(3, 'Guest', 'User', 'guestuser@gmail.com', '$2y$10$zjUwEqGhUczRjMNUi/MnJ.dwQedMKJAkkB.ZfeS8gvrVjjX0PRLcK', '09091234567', '2022-02-10 00:58:44', NULL, NULL, NULL, 'user'),
(4, 'User', 'Account', 'user@user.com', '$2y$10$hva76l35shmb1rf.LBbNTOvKz3r9NIubCd7mYqM5qZTpmumGwuCD.', '09123456789', '2022-09-22 04:50:06', '1663822206_12aff2dafa757bd1b55e.png', '1663822206_0761d0a56f094713fcd0.png', NULL, 'user'),
(5, 'Piolo', 'Pascual', 'guestuser123@gmail.com', '$2y$10$geWyc/V6pwW.YnVCQZjrc.hFyJUPpWGNiodojImpUJxHT1cu8XIVO', '09091234567', '2022-09-27 02:55:35', '1664247335_1be6d4e363bea570e9cc.png', '1664247335_cf8e5d6b45bf3a794672.png', NULL, 'user'),
(6, 'Mylene', 'Lontoc', 'mylene_lontoc@gmail.com', '$2y$10$67gm2I7HsPTpOsqWWPyLN.RspgV0FKYABIM0PbivTqUeRnQqakNq2', '09091234567', '2022-09-27 02:56:30', '1664247390_a2d4bf7c1d38bc2f77ec.jpg', '1664247390_241aae4ad14440e45892.png', NULL, 'user'),
(7, 'Mylene', 'Lontoc', 'm.lontoc@r3cms.com', '$2y$10$Jx7AUTjcmy5EL/LDNDRmJenN315NyIWPaLA3bD7l6HETsUygtny0u', '09000000000', '2024-01-29 06:00:12', NULL, NULL, NULL, 'user'),
(8, 'Hylen', 'Lapitan', 'h.lapitan@r3cms.com', '$2y$10$QeyW4BoYr0N3znU86XjdCuD6C7s43R8Opw8iYIgM7fRgvIuEdd1oW', '09090000002', '2024-01-29 06:00:19', NULL, NULL, NULL, 'user'),
(9, 'Jerald', 'Erfe', 'j.erfe@r3cms.com', '$2y$10$S8OIzA9hYSRxBEkKu6Ajou55U027hLWgUHD9eXUi7AvDg66rtxNti', '09090000003', '2024-01-29 06:00:24', NULL, NULL, NULL, 'user'),
(10, 'Ryan', 'Aquino', 'r.aquino@r3cms.com', '$2y$10$xKE9L1lhY24rm88N1ddhY.I6W8QuILVcjJB9Y1ihz30VM6ViMMhSe', '09090000004', '2024-01-29 06:00:28', NULL, NULL, NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tempcontrollertable`
--

CREATE TABLE `tempcontrollertable` (
  `id` int(11) NOT NULL,
  `PabLogo` text DEFAULT NULL,
  `certificateNumber` text DEFAULT NULL,
  `customer` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `reccomendedDueDate` text DEFAULT NULL,
  `placeOfCalibration` text DEFAULT NULL,
  `equipmentDescription` text DEFAULT NULL,
  `selectedStandard` text DEFAULT NULL,
  `manufacturer` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `modelNumber` text DEFAULT NULL,
  `equipmentID` text DEFAULT NULL,
  `customCalibrationProcedureAndTraceability` text DEFAULT NULL,
  `customUncertaintyOfMeasurements` text DEFAULT NULL,
  `customCalibrationResults` text DEFAULT NULL,
  `customRemarks` text DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `verifierComment` text DEFAULT NULL,
  `issuingDate` text DEFAULT NULL,
  `dateTimeCalibrated` text DEFAULT NULL,
  `completion` text DEFAULT NULL,
  `calculatedData` text DEFAULT NULL,
  `inputtedData` text DEFAULT NULL
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
  `measurements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`measurements`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temperaturerecorder`
--

INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(2, 'S5UC09154', '2023-215-TMP-007-002', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2022-07-29', NULL, NULL, NULL, NULL, NULL, '0.82', '[[{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.000\",\"channel1UUCrow1\":\"-39.5\",\"channel1PREVIOUSCORRECTIONrow1\":\"\",\"channel1CORRECTIONrow1\":\"-0.50\",\"channel1UNCERTAINTYrow1\":\"0.29\",\"channel1DRIFTrow1\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.010\",\"channel1UUCrow2\":\"-19.9\",\"channel1PREVIOUSCORRECTIONrow2\":\"\",\"channel1CORRECTIONrow2\":\"-0.11\",\"channel1UNCERTAINTYrow2\":\"0.29\",\"channel1DRIFTrow2\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.000\",\"channel1UUCrow3\":\"-9.6\",\"channel1PREVIOUSCORRECTIONrow3\":\"\",\"channel1CORRECTIONrow3\":\"-0.40\",\"channel1UNCERTAINTYrow3\":\"0.29\",\"channel1DRIFTrow3\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"0.000\",\"channel1UUCrow4\":\"0.1\",\"channel1PREVIOUSCORRECTIONrow4\":\"\",\"channel1CORRECTIONrow4\":\"-0.10\",\"channel1UNCERTAINTYrow4\":\"0.29\",\"channel1DRIFTrow4\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"10.6\",\"channel1PREVIOUSCORRECTIONrow5\":\"\",\"channel1CORRECTIONrow5\":\"-0.60\",\"channel1UNCERTAINTYrow5\":\"0.74\",\"channel1DRIFTrow5\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"20.6\",\"channel1PREVIOUSCORRECTIONrow6\":\"\",\"channel1CORRECTIONrow6\":\"-0.60\",\"channel1UNCERTAINTYrow6\":\"0.74\",\"channel1DRIFTrow6\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.3\",\"channel1PREVIOUSCORRECTIONrow7\":\"\",\"channel1CORRECTIONrow7\":\"-0.30\",\"channel1UNCERTAINTYrow7\":\"0.74\",\"channel1DRIFTrow7\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50.0\",\"channel1PREVIOUSCORRECTIONrow8\":\"\",\"channel1CORRECTIONrow8\":\"0.00\",\"channel1UNCERTAINTYrow8\":\"0.74\",\"channel1DRIFTrow8\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"74.7\",\"channel1PREVIOUSCORRECTIONrow9\":\"\",\"channel1CORRECTIONrow9\":\"0.30\",\"channel1UNCERTAINTYrow9\":\"0.74\",\"channel1DRIFTrow9\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"100.0\",\"channel1PREVIOUSCORRECTIONrow10\":\"\",\"channel1CORRECTIONrow10\":\"0.00\",\"channel1UNCERTAINTYrow10\":\"0.74\",\"channel1DRIFTrow10\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"150.4\",\"channel1PREVIOUSCORRECTIONrow11\":\"\",\"channel1CORRECTIONrow11\":\"-0.40\",\"channel1UNCERTAINTYrow11\":\"0.74\",\"channel1DRIFTrow11\":\"\"},{\"channelName\":\"1\",\"channelNumber\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.020\",\"channel1UUCrow12\":\"200.4\",\"channel1PREVIOUSCORRECTIONrow12\":\"\",\"channel1CORRECTIONrow12\":\"-0.38\",\"channel1UNCERTAINTYrow12\":\"0.74\",\"channel1DRIFTrow12\":\"\"}],[{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.000\",\"channel2UUCrow1\":\"-39.7\",\"channel2PREVIOUSCORRECTIONrow1\":\"\",\"channel2CORRECTIONrow1\":\"-0.30\",\"channel2UNCERTAINTYrow1\":\"0.33\",\"channel2DRIFTrow1\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.010\",\"channel2UUCrow2\":\"-20.0\",\"channel2PREVIOUSCORRECTIONrow2\":\"\",\"channel2CORRECTIONrow2\":\"-0.01\",\"channel2UNCERTAINTYrow2\":\"0.33\",\"channel2DRIFTrow2\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.000\",\"channel2UUCrow3\":\"-10.1\",\"channel2PREVIOUSCORRECTIONrow3\":\"\",\"channel2CORRECTIONrow3\":\"0.10\",\"channel2UNCERTAINTYrow3\":\"0.36\",\"channel2DRIFTrow3\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"0.000\",\"channel2UUCrow4\":\"-0.1\",\"channel2PREVIOUSCORRECTIONrow4\":\"\",\"channel2CORRECTIONrow4\":\"0.10\",\"channel2UNCERTAINTYrow4\":\"0.33\",\"channel2DRIFTrow4\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"10.5\",\"channel2PREVIOUSCORRECTIONrow5\":\"\",\"channel2CORRECTIONrow5\":\"-0.50\",\"channel2UNCERTAINTYrow5\":\"0.75\",\"channel2DRIFTrow5\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"20.6\",\"channel2PREVIOUSCORRECTIONrow6\":\"\",\"channel2CORRECTIONrow6\":\"-0.60\",\"channel2UNCERTAINTYrow6\":\"0.75\",\"channel2DRIFTrow6\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.3\",\"channel2PREVIOUSCORRECTIONrow7\":\"\",\"channel2CORRECTIONrow7\":\"-0.30\",\"channel2UNCERTAINTYrow7\":\"0.75\",\"channel2DRIFTrow7\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.1\",\"channel2PREVIOUSCORRECTIONrow8\":\"\",\"channel2CORRECTIONrow8\":\"-0.10\",\"channel2UNCERTAINTYrow8\":\"0.75\",\"channel2DRIFTrow8\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"74.8\",\"channel2PREVIOUSCORRECTIONrow9\":\"\",\"channel2CORRECTIONrow9\":\"0.20\",\"channel2UNCERTAINTYrow9\":\"0.75\",\"channel2DRIFTrow9\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"100.1\",\"channel2PREVIOUSCORRECTIONrow10\":\"\",\"channel2CORRECTIONrow10\":\"-0.10\",\"channel2UNCERTAINTYrow10\":\"0.75\",\"channel2DRIFTrow10\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"150.3\",\"channel2PREVIOUSCORRECTIONrow11\":\"\",\"channel2CORRECTIONrow11\":\"-0.30\",\"channel2UNCERTAINTYrow11\":\"0.76\",\"channel2DRIFTrow11\":\"\"},{\"channelName\":\"2\",\"channelNumber\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.020\",\"channel2UUCrow12\":\"200.4\",\"channel2PREVIOUSCORRECTIONrow12\":\"\",\"channel2CORRECTIONrow12\":\"-0.38\",\"channel2UNCERTAINTYrow12\":\"0.76\",\"channel2DRIFTrow12\":\"\"}],[{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.000\",\"channel3UUCrow1\":\"-39.7\",\"channel3PREVIOUSCORRECTIONrow1\":\"\",\"channel3CORRECTIONrow1\":\"-0.30\",\"channel3UNCERTAINTYrow1\":\"0.32\",\"channel3DRIFTrow1\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.010\",\"channel3UUCrow2\":\"-20.0\",\"channel3PREVIOUSCORRECTIONrow2\":\"\",\"channel3CORRECTIONrow2\":\"-0.01\",\"channel3UNCERTAINTYrow2\":\"0.31\",\"channel3DRIFTrow2\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.000\",\"channel3UUCrow3\":\"-10.1\",\"channel3PREVIOUSCORRECTIONrow3\":\"\",\"channel3CORRECTIONrow3\":\"0.10\",\"channel3UNCERTAINTYrow3\":\"0.32\",\"channel3DRIFTrow3\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"0.000\",\"channel3UUCrow4\":\"-0.1\",\"channel3PREVIOUSCORRECTIONrow4\":\"\",\"channel3CORRECTIONrow4\":\"0.10\",\"channel3UNCERTAINTYrow4\":\"0.31\",\"channel3DRIFTrow4\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"10.4\",\"channel3PREVIOUSCORRECTIONrow5\":\"\",\"channel3CORRECTIONrow5\":\"-0.40\",\"channel3UNCERTAINTYrow5\":\"0.75\",\"channel3DRIFTrow5\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"20.3\",\"channel3PREVIOUSCORRECTIONrow6\":\"\",\"channel3CORRECTIONrow6\":\"-0.30\",\"channel3UNCERTAINTYrow6\":\"0.75\",\"channel3DRIFTrow6\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.1\",\"channel3PREVIOUSCORRECTIONrow7\":\"\",\"channel3CORRECTIONrow7\":\"-0.10\",\"channel3UNCERTAINTYrow7\":\"0.75\",\"channel3DRIFTrow7\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"50.0\",\"channel3PREVIOUSCORRECTIONrow8\":\"\",\"channel3CORRECTIONrow8\":\"0.00\",\"channel3UNCERTAINTYrow8\":\"0.75\",\"channel3DRIFTrow8\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"74.6\",\"channel3PREVIOUSCORRECTIONrow9\":\"\",\"channel3CORRECTIONrow9\":\"0.40\",\"channel3UNCERTAINTYrow9\":\"0.75\",\"channel3DRIFTrow9\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.000\",\"channel3UUCrow10\":\"100.0\",\"channel3PREVIOUSCORRECTIONrow10\":\"\",\"channel3CORRECTIONrow10\":\"0.00\",\"channel3UNCERTAINTYrow10\":\"0.75\",\"channel3DRIFTrow10\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.000\",\"channel3UUCrow11\":\"150.2\",\"channel3PREVIOUSCORRECTIONrow11\":\"\",\"channel3CORRECTIONrow11\":\"-0.20\",\"channel3UNCERTAINTYrow11\":\"0.75\",\"channel3DRIFTrow11\":\"\"},{\"channelName\":\"3\",\"channelNumber\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.020\",\"channel3UUCrow12\":\"200.1\",\"channel3PREVIOUSCORRECTIONrow12\":\"\",\"channel3CORRECTIONrow12\":\"-0.08\",\"channel3UNCERTAINTYrow12\":\"0.75\",\"channel3DRIFTrow12\":\"\"}],[{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.000\",\"channel4UUCrow1\":\"-39.8\",\"channel4PREVIOUSCORRECTIONrow1\":\"\",\"channel4CORRECTIONrow1\":\"-0.20\",\"channel4UNCERTAINTYrow1\":\"0.45\",\"channel4DRIFTrow1\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.010\",\"channel4UUCrow2\":\"-20.1\",\"channel4PREVIOUSCORRECTIONrow2\":\"\",\"channel4CORRECTIONrow2\":\"0.09\",\"channel4UNCERTAINTYrow2\":\"0.45\",\"channel4DRIFTrow2\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.000\",\"channel4UUCrow3\":\"-10.3\",\"channel4PREVIOUSCORRECTIONrow3\":\"\",\"channel4CORRECTIONrow3\":\"0.30\",\"channel4UNCERTAINTYrow3\":\"0.45\",\"channel4DRIFTrow3\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"0.000\",\"channel4UUCrow4\":\"-0.1\",\"channel4PREVIOUSCORRECTIONrow4\":\"\",\"channel4CORRECTIONrow4\":\"0.10\",\"channel4UNCERTAINTYrow4\":\"0.45\",\"channel4DRIFTrow4\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"10.2\",\"channel4PREVIOUSCORRECTIONrow5\":\"\",\"channel4CORRECTIONrow5\":\"-0.20\",\"channel4UNCERTAINTYrow5\":\"0.82\",\"channel4DRIFTrow5\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"20.1\",\"channel4PREVIOUSCORRECTIONrow6\":\"\",\"channel4CORRECTIONrow6\":\"-0.10\",\"channel4UNCERTAINTYrow6\":\"0.82\",\"channel4DRIFTrow6\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"36.9\",\"channel4PREVIOUSCORRECTIONrow7\":\"\",\"channel4CORRECTIONrow7\":\"0.10\",\"channel4UNCERTAINTYrow7\":\"0.82\",\"channel4DRIFTrow7\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.7\",\"channel4PREVIOUSCORRECTIONrow8\":\"\",\"channel4CORRECTIONrow8\":\"0.30\",\"channel4UNCERTAINTYrow8\":\"0.82\",\"channel4DRIFTrow8\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.4\",\"channel4PREVIOUSCORRECTIONrow9\":\"\",\"channel4CORRECTIONrow9\":\"0.60\",\"channel4UNCERTAINTYrow9\":\"0.82\",\"channel4DRIFTrow9\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"99.7\",\"channel4PREVIOUSCORRECTIONrow10\":\"\",\"channel4CORRECTIONrow10\":\"0.30\",\"channel4UNCERTAINTYrow10\":\"0.82\",\"channel4DRIFTrow10\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.000\",\"channel4UUCrow11\":\"150.0\",\"channel4PREVIOUSCORRECTIONrow11\":\"\",\"channel4CORRECTIONrow11\":\"0.00\",\"channel4UNCERTAINTYrow11\":\"0.82\",\"channel4DRIFTrow11\":\"\"},{\"channelName\":\"4\",\"channelNumber\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.020\",\"channel4UUCrow12\":\"199.7\",\"channel4PREVIOUSCORRECTIONrow12\":\"\",\"channel4CORRECTIONrow12\":\"0.32\",\"channel4UNCERTAINTYrow12\":\"0.82\",\"channel4DRIFTrow12\":\"\"}],[{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.000\",\"channel5UUCrow1\":\"-39.8\",\"channel5PREVIOUSCORRECTIONrow1\":\"\",\"channel5CORRECTIONrow1\":\"-0.20\",\"channel5UNCERTAINTYrow1\":\"0.3\",\"channel5DRIFTrow1\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.010\",\"channel5UUCrow2\":\"-20.0\",\"channel5PREVIOUSCORRECTIONrow2\":\"\",\"channel5CORRECTIONrow2\":\"-0.01\",\"channel5UNCERTAINTYrow2\":\"0.29\",\"channel5DRIFTrow2\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.000\",\"channel5UUCrow3\":\"-10.1\",\"channel5PREVIOUSCORRECTIONrow3\":\"\",\"channel5CORRECTIONrow3\":\"0.10\",\"channel5UNCERTAINTYrow3\":\"0.3\",\"channel5DRIFTrow3\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"0.000\",\"channel5UUCrow4\":\"-0.2\",\"channel5PREVIOUSCORRECTIONrow4\":\"\",\"channel5CORRECTIONrow4\":\"0.20\",\"channel5UNCERTAINTYrow4\":\"0.29\",\"channel5DRIFTrow4\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"10.1\",\"channel5PREVIOUSCORRECTIONrow5\":\"\",\"channel5CORRECTIONrow5\":\"-0.10\",\"channel5UNCERTAINTYrow5\":\"0.74\",\"channel5DRIFTrow5\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"20.1\",\"channel5PREVIOUSCORRECTIONrow6\":\"\",\"channel5CORRECTIONrow6\":\"-0.10\",\"channel5UNCERTAINTYrow6\":\"0.74\",\"channel5DRIFTrow6\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"36.9\",\"channel5PREVIOUSCORRECTIONrow7\":\"\",\"channel5CORRECTIONrow7\":\"0.10\",\"channel5UNCERTAINTYrow7\":\"0.74\",\"channel5DRIFTrow7\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.8\",\"channel5PREVIOUSCORRECTIONrow8\":\"\",\"channel5CORRECTIONrow8\":\"0.20\",\"channel5UNCERTAINTYrow8\":\"0.74\",\"channel5DRIFTrow8\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.6\",\"channel5PREVIOUSCORRECTIONrow9\":\"\",\"channel5CORRECTIONrow9\":\"0.40\",\"channel5UNCERTAINTYrow9\":\"0.74\",\"channel5DRIFTrow9\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"99.9\",\"channel5PREVIOUSCORRECTIONrow10\":\"\",\"channel5CORRECTIONrow10\":\"0.10\",\"channel5UNCERTAINTYrow10\":\"0.74\",\"channel5DRIFTrow10\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.000\",\"channel5UUCrow11\":\"150\",\"channel5PREVIOUSCORRECTIONrow11\":\"\",\"channel5CORRECTIONrow11\":\"0.00\",\"channel5UNCERTAINTYrow11\":\"0.74\",\"channel5DRIFTrow11\":\"\"},{\"channelName\":\"5\",\"channelNumber\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.020\",\"channel5UUCrow12\":\"200.2\",\"channel5PREVIOUSCORRECTIONrow12\":\"\",\"channel5CORRECTIONrow12\":\"-0.18\",\"channel5UNCERTAINTYrow12\":\"0.74\",\"channel5DRIFTrow12\":\"\"}],[{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.000\",\"channel6UUCrow1\":\"-40.0\",\"channel6PREVIOUSCORRECTIONrow1\":\"\",\"channel6CORRECTIONrow1\":\"0.00\",\"channel6UNCERTAINTYrow1\":\"0.29\",\"channel6DRIFTrow1\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.010\",\"channel6UUCrow2\":\"-20.2\",\"channel6PREVIOUSCORRECTIONrow2\":\"\",\"channel6CORRECTIONrow2\":\"0.19\",\"channel6UNCERTAINTYrow2\":\"0.29\",\"channel6DRIFTrow2\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.000\",\"channel6UUCrow3\":\"-10.4\",\"channel6PREVIOUSCORRECTIONrow3\":\"\",\"channel6CORRECTIONrow3\":\"0.40\",\"channel6UNCERTAINTYrow3\":\"0.29\",\"channel6DRIFTrow3\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"0.000\",\"channel6UUCrow4\":\"-0.4\",\"channel6PREVIOUSCORRECTIONrow4\":\"\",\"channel6CORRECTIONrow4\":\"0.40\",\"channel6UNCERTAINTYrow4\":\"0.29\",\"channel6DRIFTrow4\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"9.9\",\"channel6PREVIOUSCORRECTIONrow5\":\"\",\"channel6CORRECTIONrow5\":\"0.10\",\"channel6UNCERTAINTYrow5\":\"0.74\",\"channel6DRIFTrow5\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"19.8\",\"channel6PREVIOUSCORRECTIONrow6\":\"\",\"channel6CORRECTIONrow6\":\"0.20\",\"channel6UNCERTAINTYrow6\":\"0.74\",\"channel6DRIFTrow6\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.9\",\"channel6PREVIOUSCORRECTIONrow7\":\"\",\"channel6CORRECTIONrow7\":\"0.10\",\"channel6UNCERTAINTYrow7\":\"0.74\",\"channel6DRIFTrow7\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.7\",\"channel6PREVIOUSCORRECTIONrow8\":\"\",\"channel6CORRECTIONrow8\":\"0.30\",\"channel6UNCERTAINTYrow8\":\"0.74\",\"channel6DRIFTrow8\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.4\",\"channel6PREVIOUSCORRECTIONrow9\":\"\",\"channel6CORRECTIONrow9\":\"0.60\",\"channel6UNCERTAINTYrow9\":\"0.74\",\"channel6DRIFTrow9\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"99.7\",\"channel6PREVIOUSCORRECTIONrow10\":\"\",\"channel6CORRECTIONrow10\":\"0.30\",\"channel6UNCERTAINTYrow10\":\"0.74\",\"channel6DRIFTrow10\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.000\",\"channel6UUCrow11\":\"150.0\",\"channel6PREVIOUSCORRECTIONrow11\":\"\",\"channel6CORRECTIONrow11\":\"0.00\",\"channel6UNCERTAINTYrow11\":\"0.74\",\"channel6DRIFTrow11\":\"\"},{\"channelName\":\"6\",\"channelNumber\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.020\",\"channel6UUCrow12\":\"199.2\",\"channel6PREVIOUSCORRECTIONrow12\":\"\",\"channel6CORRECTIONrow12\":\"0.82\",\"channel6UNCERTAINTYrow12\":\"0.74\",\"channel6DRIFTrow12\":\"\"}],[{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.000\",\"channel7UUCrow1\":\"-39.5\",\"channel7PREVIOUSCORRECTIONrow1\":\"\",\"channel7CORRECTIONrow1\":\"-0.50\",\"channel7UNCERTAINTYrow1\":\"0.29\",\"channel7DRIFTrow1\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.010\",\"channel7UUCrow2\":\"-19.9\",\"channel7PREVIOUSCORRECTIONrow2\":\"\",\"channel7CORRECTIONrow2\":\"-0.11\",\"channel7UNCERTAINTYrow2\":\"0.29\",\"channel7DRIFTrow2\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.000\",\"channel7UUCrow3\":\"-9.7\",\"channel7PREVIOUSCORRECTIONrow3\":\"\",\"channel7CORRECTIONrow3\":\"-0.30\",\"channel7UNCERTAINTYrow3\":\"0.29\",\"channel7DRIFTrow3\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"0.000\",\"channel7UUCrow4\":\"0.1\",\"channel7PREVIOUSCORRECTIONrow4\":\"\",\"channel7CORRECTIONrow4\":\"-0.10\",\"channel7UNCERTAINTYrow4\":\"0.29\",\"channel7DRIFTrow4\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"10.5\",\"channel7PREVIOUSCORRECTIONrow5\":\"\",\"channel7CORRECTIONrow5\":\"-0.50\",\"channel7UNCERTAINTYrow5\":\"0.74\",\"channel7DRIFTrow5\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"20.6\",\"channel7PREVIOUSCORRECTIONrow6\":\"\",\"channel7CORRECTIONrow6\":\"-0.60\",\"channel7UNCERTAINTYrow6\":\"0.74\",\"channel7DRIFTrow6\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.2\",\"channel7PREVIOUSCORRECTIONrow7\":\"\",\"channel7CORRECTIONrow7\":\"-0.20\",\"channel7UNCERTAINTYrow7\":\"0.74\",\"channel7DRIFTrow7\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"50.1\",\"channel7PREVIOUSCORRECTIONrow8\":\"\",\"channel7CORRECTIONrow8\":\"-0.10\",\"channel7UNCERTAINTYrow8\":\"0.74\",\"channel7DRIFTrow8\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"74.8\",\"channel7PREVIOUSCORRECTIONrow9\":\"\",\"channel7CORRECTIONrow9\":\"0.20\",\"channel7UNCERTAINTYrow9\":\"0.74\",\"channel7DRIFTrow9\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"100.1\",\"channel7PREVIOUSCORRECTIONrow10\":\"\",\"channel7CORRECTIONrow10\":\"-0.10\",\"channel7UNCERTAINTYrow10\":\"0.74\",\"channel7DRIFTrow10\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.000\",\"channel7UUCrow11\":\"150.4\",\"channel7PREVIOUSCORRECTIONrow11\":\"\",\"channel7CORRECTIONrow11\":\"-0.40\",\"channel7UNCERTAINTYrow11\":\"0.74\",\"channel7DRIFTrow11\":\"\"},{\"channelName\":\"7\",\"channelNumber\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.020\",\"channel7UUCrow12\":\"199.9\",\"channel7PREVIOUSCORRECTIONrow12\":\"\",\"channel7CORRECTIONrow12\":\"0.12\",\"channel7UNCERTAINTYrow12\":\"0.74\",\"channel7DRIFTrow12\":\"\"}],[{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.000\",\"channel8UUCrow1\":\"-39.9\",\"channel8PREVIOUSCORRECTIONrow1\":\"\",\"channel8CORRECTIONrow1\":\"-0.10\",\"channel8UNCERTAINTYrow1\":\"0.30\",\"channel8DRIFTrow1\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.010\",\"channel8UUCrow2\":\"-20.1\",\"channel8PREVIOUSCORRECTIONrow2\":\"\",\"channel8CORRECTIONrow2\":\"0.09\",\"channel8UNCERTAINTYrow2\":\"0.30\",\"channel8DRIFTrow2\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.000\",\"channel8UUCrow3\":\"-10.1\",\"channel8PREVIOUSCORRECTIONrow3\":\"\",\"channel8CORRECTIONrow3\":\"0.10\",\"channel8UNCERTAINTYrow3\":\"0.30\",\"channel8DRIFTrow3\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"0.000\",\"channel8UUCrow4\":\"-0.2\",\"channel8PREVIOUSCORRECTIONrow4\":\"\",\"channel8CORRECTIONrow4\":\"0.20\",\"channel8UNCERTAINTYrow4\":\"0.30\",\"channel8DRIFTrow4\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"10.5\",\"channel8PREVIOUSCORRECTIONrow5\":\"\",\"channel8CORRECTIONrow5\":\"-0.50\",\"channel8UNCERTAINTYrow5\":\"0.74\",\"channel8DRIFTrow5\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"20.5\",\"channel8PREVIOUSCORRECTIONrow6\":\"\",\"channel8CORRECTIONrow6\":\"-0.50\",\"channel8UNCERTAINTYrow6\":\"0.74\",\"channel8DRIFTrow6\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37.1\",\"channel8PREVIOUSCORRECTIONrow7\":\"\",\"channel8CORRECTIONrow7\":\"-0.10\",\"channel8UNCERTAINTYrow7\":\"0.74\",\"channel8DRIFTrow7\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"50.0\",\"channel8PREVIOUSCORRECTIONrow8\":\"\",\"channel8CORRECTIONrow8\":\"0.00\",\"channel8UNCERTAINTYrow8\":\"0.74\",\"channel8DRIFTrow8\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"74.8\",\"channel8PREVIOUSCORRECTIONrow9\":\"\",\"channel8CORRECTIONrow9\":\"0.20\",\"channel8UNCERTAINTYrow9\":\"0.74\",\"channel8DRIFTrow9\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.000\",\"channel8UUCrow10\":\"100\",\"channel8PREVIOUSCORRECTIONrow10\":\"\",\"channel8CORRECTIONrow10\":\"0.00\",\"channel8UNCERTAINTYrow10\":\"0.74\",\"channel8DRIFTrow10\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.000\",\"channel8UUCrow11\":\"150.3\",\"channel8PREVIOUSCORRECTIONrow11\":\"\",\"channel8CORRECTIONrow11\":\"-0.30\",\"channel8UNCERTAINTYrow11\":\"0.74\",\"channel8DRIFTrow11\":\"\"},{\"channelName\":\"8\",\"channelNumber\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.020\",\"channel8UUCrow12\":\"200.0\",\"channel8PREVIOUSCORRECTIONrow12\":\"\",\"channel8CORRECTIONrow12\":\"0.02\",\"channel8UNCERTAINTYrow12\":\"0.74\",\"channel8DRIFTrow12\":\"\"}],[{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.000\",\"channel9UUCrow1\":\"-39.6\",\"channel9PREVIOUSCORRECTIONrow1\":\"\",\"channel9CORRECTIONrow1\":\"-0.40\",\"channel9UNCERTAINTYrow1\":\"0.30\",\"channel9DRIFTrow1\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.010\",\"channel9UUCrow2\":\"-20.0\",\"channel9PREVIOUSCORRECTIONrow2\":\"\",\"channel9CORRECTIONrow2\":\"-0.01\",\"channel9UNCERTAINTYrow2\":\"0.30\",\"channel9DRIFTrow2\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.000\",\"channel9UUCrow3\":\"-10.1\",\"channel9PREVIOUSCORRECTIONrow3\":\"\",\"channel9CORRECTIONrow3\":\"0.10\",\"channel9UNCERTAINTYrow3\":\"0.30\",\"channel9DRIFTrow3\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"0.000\",\"channel9UUCrow4\":\"-0.1\",\"channel9PREVIOUSCORRECTIONrow4\":\"\",\"channel9CORRECTIONrow4\":\"0.10\",\"channel9UNCERTAINTYrow4\":\"0.30\",\"channel9DRIFTrow4\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"10.4\",\"channel9PREVIOUSCORRECTIONrow5\":\"\",\"channel9CORRECTIONrow5\":\"-0.40\",\"channel9UNCERTAINTYrow5\":\"0.74\",\"channel9DRIFTrow5\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"20.4\",\"channel9PREVIOUSCORRECTIONrow6\":\"\",\"channel9CORRECTIONrow6\":\"-0.40\",\"channel9UNCERTAINTYrow6\":\"0.74\",\"channel9DRIFTrow6\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37.2\",\"channel9PREVIOUSCORRECTIONrow7\":\"\",\"channel9CORRECTIONrow7\":\"-0.20\",\"channel9UNCERTAINTYrow7\":\"0.74\",\"channel9DRIFTrow7\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"50.1\",\"channel9PREVIOUSCORRECTIONrow8\":\"\",\"channel9CORRECTIONrow8\":\"-0.10\",\"channel9UNCERTAINTYrow8\":\"0.74\",\"channel9DRIFTrow8\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"74.8\",\"channel9PREVIOUSCORRECTIONrow9\":\"\",\"channel9CORRECTIONrow9\":\"0.20\",\"channel9UNCERTAINTYrow9\":\"0.74\",\"channel9DRIFTrow9\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"100.2\",\"channel9PREVIOUSCORRECTIONrow10\":\"\",\"channel9CORRECTIONrow10\":\"-0.20\",\"channel9UNCERTAINTYrow10\":\"0.74\",\"channel9DRIFTrow10\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.000\",\"channel9UUCrow11\":\"150.7\",\"channel9PREVIOUSCORRECTIONrow11\":\"\",\"channel9CORRECTIONrow11\":\"-0.70\",\"channel9UNCERTAINTYrow11\":\"0.74\",\"channel9DRIFTrow11\":\"\"},{\"channelName\":\"9\",\"channelNumber\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.020\",\"channel9UUCrow12\":\"199.9\",\"channel9PREVIOUSCORRECTIONrow12\":\"\",\"channel9CORRECTIONrow12\":\"0.12\",\"channel9UNCERTAINTYrow12\":\"0.75\",\"channel9DRIFTrow12\":\"\"}],[{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.000\",\"channel10UUCrow1\":\"-39.7\",\"channel10PREVIOUSCORRECTIONrow1\":\"\",\"channel10CORRECTIONrow1\":\"-0.30\",\"channel10UNCERTAINTYrow1\":\"0.33\",\"channel10DRIFTrow1\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.010\",\"channel10UUCrow2\":\"-20.0\",\"channel10PREVIOUSCORRECTIONrow2\":\"\",\"channel10CORRECTIONrow2\":\"-0.01\",\"channel10UNCERTAINTYrow2\":\"0.33\",\"channel10DRIFTrow2\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.000\",\"channel10UUCrow3\":\"-10.2\",\"channel10PREVIOUSCORRECTIONrow3\":\"\",\"channel10CORRECTIONrow3\":\"0.20\",\"channel10UNCERTAINTYrow3\":\"0.33\",\"channel10DRIFTrow3\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"0.000\",\"channel10UUCrow4\":\"-0.1\",\"channel10PREVIOUSCORRECTIONrow4\":\"\",\"channel10CORRECTIONrow4\":\"0.10\",\"channel10UNCERTAINTYrow4\":\"0.33\",\"channel10DRIFTrow4\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"10.2\",\"channel10PREVIOUSCORRECTIONrow5\":\"\",\"channel10CORRECTIONrow5\":\"-0.20\",\"channel10UNCERTAINTYrow5\":\"0.75\",\"channel10DRIFTrow5\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"20.1\",\"channel10PREVIOUSCORRECTIONrow6\":\"\",\"channel10CORRECTIONrow6\":\"-0.10\",\"channel10UNCERTAINTYrow6\":\"0.75\",\"channel10DRIFTrow6\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"37.1\",\"channel10PREVIOUSCORRECTIONrow7\":\"\",\"channel10CORRECTIONrow7\":\"-0.10\",\"channel10UNCERTAINTYrow7\":\"0.75\",\"channel10DRIFTrow7\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.9\",\"channel10PREVIOUSCORRECTIONrow8\":\"\",\"channel10CORRECTIONrow8\":\"0.10\",\"channel10UNCERTAINTYrow8\":\"0.75\",\"channel10DRIFTrow8\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.6\",\"channel10PREVIOUSCORRECTIONrow9\":\"\",\"channel10CORRECTIONrow9\":\"0.40\",\"channel10UNCERTAINTYrow9\":\"0.75\",\"channel10DRIFTrow9\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"100.0\",\"channel10PREVIOUSCORRECTIONrow10\":\"\",\"channel10CORRECTIONrow10\":\"0.00\",\"channel10UNCERTAINTYrow10\":\"0.75\",\"channel10DRIFTrow10\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.000\",\"channel10UUCrow11\":\"150.2\",\"channel10PREVIOUSCORRECTIONrow11\":\"\",\"channel10CORRECTIONrow11\":\"-0.20\",\"channel10UNCERTAINTYrow11\":\"0.75\",\"channel10DRIFTrow11\":\"\"},{\"channelName\":\"10\",\"channelNumber\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.020\",\"channel10UUCrow12\":\"200.4\",\"channel10PREVIOUSCORRECTIONrow12\":\"\",\"channel10CORRECTIONrow12\":\"-0.38\",\"channel10UNCERTAINTYrow12\":\"0.76\",\"channel10DRIFTrow12\":\"\"}],[{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.000\",\"channel11UUCrow1\":\"-39.8\",\"channel11PREVIOUSCORRECTIONrow1\":\"\",\"channel11CORRECTIONrow1\":\"-0.20\",\"channel11UNCERTAINTYrow1\":\"0.33\",\"channel11DRIFTrow1\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.010\",\"channel11UUCrow2\":\"-20.0\",\"channel11PREVIOUSCORRECTIONrow2\":\"\",\"channel11CORRECTIONrow2\":\"-0.01\",\"channel11UNCERTAINTYrow2\":\"0.33\",\"channel11DRIFTrow2\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.000\",\"channel11UUCrow3\":\"-10.2\",\"channel11PREVIOUSCORRECTIONrow3\":\"\",\"channel11CORRECTIONrow3\":\"0.20\",\"channel11UNCERTAINTYrow3\":\"0.33\",\"channel11DRIFTrow3\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"0.000\",\"channel11UUCrow4\":\"-0.2\",\"channel11PREVIOUSCORRECTIONrow4\":\"\",\"channel11CORRECTIONrow4\":\"0.20\",\"channel11UNCERTAINTYrow4\":\"0.33\",\"channel11DRIFTrow4\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"10.2\",\"channel11PREVIOUSCORRECTIONrow5\":\"\",\"channel11CORRECTIONrow5\":\"-0.20\",\"channel11UNCERTAINTYrow5\":\"0.75\",\"channel11DRIFTrow5\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"20.1\",\"channel11PREVIOUSCORRECTIONrow6\":\"\",\"channel11CORRECTIONrow6\":\"-0.10\",\"channel11UNCERTAINTYrow6\":\"0.75\",\"channel11DRIFTrow6\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"36.9\",\"channel11PREVIOUSCORRECTIONrow7\":\"\",\"channel11CORRECTIONrow7\":\"0.10\",\"channel11UNCERTAINTYrow7\":\"0.75\",\"channel11DRIFTrow7\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.8\",\"channel11PREVIOUSCORRECTIONrow8\":\"\",\"channel11CORRECTIONrow8\":\"0.20\",\"channel11UNCERTAINTYrow8\":\"0.75\",\"channel11DRIFTrow8\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.5\",\"channel11PREVIOUSCORRECTIONrow9\":\"\",\"channel11CORRECTIONrow9\":\"0.50\",\"channel11UNCERTAINTYrow9\":\"0.75\",\"channel11DRIFTrow9\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"99.8\",\"channel11PREVIOUSCORRECTIONrow10\":\"\",\"channel11CORRECTIONrow10\":\"0.20\",\"channel11UNCERTAINTYrow10\":\"0.75\",\"channel11DRIFTrow10\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"150.0\",\"channel11PREVIOUSCORRECTIONrow11\":\"\",\"channel11CORRECTIONrow11\":\"0.00\",\"channel11UNCERTAINTYrow11\":\"0.75\",\"channel11DRIFTrow11\":\"\"},{\"channelName\":\"11\",\"channelNumber\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.020\",\"channel11UUCrow12\":\"199.7\",\"channel11PREVIOUSCORRECTIONrow12\":\"\",\"channel11CORRECTIONrow12\":\"0.32\",\"channel11UNCERTAINTYrow12\":\"0.75\",\"channel11DRIFTrow12\":\"\"}],[{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.000\",\"channel12UUCrow1\":\"-39.9\",\"channel12PREVIOUSCORRECTIONrow1\":\"\",\"channel12CORRECTIONrow1\":\"-0.10\",\"channel12UNCERTAINTYrow1\":\"0.30\",\"channel12DRIFTrow1\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.010\",\"channel12UUCrow2\":\"-20.2\",\"channel12PREVIOUSCORRECTIONrow2\":\"\",\"channel12CORRECTIONrow2\":\"0.19\",\"channel12UNCERTAINTYrow2\":\"0.30\",\"channel12DRIFTrow2\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.000\",\"channel12UUCrow3\":\"-10.4\",\"channel12PREVIOUSCORRECTIONrow3\":\"\",\"channel12CORRECTIONrow3\":\"0.40\",\"channel12UNCERTAINTYrow3\":\"0.30\",\"channel12DRIFTrow3\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"0.000\",\"channel12UUCrow4\":\"-0.4\",\"channel12PREVIOUSCORRECTIONrow4\":\"\",\"channel12CORRECTIONrow4\":\"0.40\",\"channel12UNCERTAINTYrow4\":\"0.30\",\"channel12DRIFTrow4\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"9.9\",\"channel12PREVIOUSCORRECTIONrow5\":\"\",\"channel12CORRECTIONrow5\":\"0.10\",\"channel12UNCERTAINTYrow5\":\"0.74\",\"channel12DRIFTrow5\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.9\",\"channel12PREVIOUSCORRECTIONrow6\":\"\",\"channel12CORRECTIONrow6\":\"0.10\",\"channel12UNCERTAINTYrow6\":\"0.74\",\"channel12DRIFTrow6\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"37.1\",\"channel12PREVIOUSCORRECTIONrow7\":\"\",\"channel12CORRECTIONrow7\":\"-0.10\",\"channel12UNCERTAINTYrow7\":\"0.74\",\"channel12DRIFTrow7\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.8\",\"channel12PREVIOUSCORRECTIONrow8\":\"\",\"channel12CORRECTIONrow8\":\"0.20\",\"channel12UNCERTAINTYrow8\":\"0.74\",\"channel12DRIFTrow8\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.4\",\"channel12PREVIOUSCORRECTIONrow9\":\"\",\"channel12CORRECTIONrow9\":\"0.60\",\"channel12UNCERTAINTYrow9\":\"0.74\",\"channel12DRIFTrow9\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"99.9\",\"channel12PREVIOUSCORRECTIONrow10\":\"\",\"channel12CORRECTIONrow10\":\"0.10\",\"channel12UNCERTAINTYrow10\":\"0.74\",\"channel12DRIFTrow10\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.000\",\"channel12UUCrow11\":\"150.3\",\"channel12PREVIOUSCORRECTIONrow11\":\"\",\"channel12CORRECTIONrow11\":\"-0.30\",\"channel12UNCERTAINTYrow11\":\"0.74\",\"channel12DRIFTrow11\":\"\"},{\"channelName\":\"12\",\"channelNumber\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.020\",\"channel12UUCrow12\":\"201.0\",\"channel12PREVIOUSCORRECTIONrow12\":\"\",\"channel12CORRECTIONrow12\":\"-0.98\",\"channel12UNCERTAINTYrow12\":\"0.76\",\"channel12DRIFTrow12\":\"\"}]]'),
(3, 'S5UC09155', '2022-270-TMP-07-003', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2022-07-29', NULL, NULL, NULL, NULL, NULL, '-Infinity', '[]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(10, 'S5UC09155 old TC', '2023-215-TMP-07-003', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2023-07-31', NULL, NULL, NULL, NULL, NULL, '0.81', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.000\",\"channel1UUCrow1\":\"-39.5\",\"channel1CORRECTIONrow1\":\"-0.50\",\"channel1UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.000\",\"channel1UUCrow2\":\"-19.6\",\"channel1CORRECTIONrow2\":\"-0.40\",\"channel1UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.000\",\"channel1UUCrow3\":\"-9.7\",\"channel1CORRECTIONrow3\":\"-0.30\",\"channel1UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"0.000\",\"channel1UUCrow4\":\"0.1\",\"channel1CORRECTIONrow4\":\"-0.10\",\"channel1UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"10.2\",\"channel1CORRECTIONrow5\":\"-0.20\",\"channel1UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"20.2\",\"channel1CORRECTIONrow6\":\"-0.20\",\"channel1UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.2\",\"channel1CORRECTIONrow7\":\"-0.20\",\"channel1UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50\",\"channel1CORRECTIONrow8\":\"0.00\",\"channel1UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"75.3\",\"channel1CORRECTIONrow9\":\"-0.30\",\"channel1UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"100.4\",\"channel1CORRECTIONrow10\":\"-0.40\",\"channel1UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"152.1\",\"channel1CORRECTIONrow11\":\"-2.10\",\"channel1UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.000\",\"channel1UUCrow12\":\"201.7\",\"channel1CORRECTIONrow12\":\"-1.70\",\"channel1UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.000\",\"channel2UUCrow1\":\"-39.7\",\"channel2CORRECTIONrow1\":\"-0.30\",\"channel2UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.000\",\"channel2UUCrow2\":\"-19.4\",\"channel2CORRECTIONrow2\":\"-0.60\",\"channel2UNCERTAINTYrow2\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.000\",\"channel2UUCrow3\":\"-9.6\",\"channel2CORRECTIONrow3\":\"-0.40\",\"channel2UNCERTAINTYrow3\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"0.000\",\"channel2UUCrow4\":\"0.3\",\"channel2CORRECTIONrow4\":\"-0.30\",\"channel2UNCERTAINTYrow4\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"10.3\",\"channel2CORRECTIONrow5\":\"-0.30\",\"channel2UNCERTAINTYrow5\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"20.3\",\"channel2CORRECTIONrow6\":\"-0.30\",\"channel2UNCERTAINTYrow6\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.4\",\"channel2CORRECTIONrow7\":\"-0.40\",\"channel2UNCERTAINTYrow7\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.1\",\"channel2CORRECTIONrow8\":\"-0.10\",\"channel2UNCERTAINTYrow8\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"75.4\",\"channel2CORRECTIONrow9\":\"-0.40\",\"channel2UNCERTAINTYrow9\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"100.4\",\"channel2CORRECTIONrow10\":\"-0.40\",\"channel2UNCERTAINTYrow10\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"151.4\",\"channel2CORRECTIONrow11\":\"-1.40\",\"channel2UNCERTAINTYrow11\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.000\",\"channel2UUCrow12\":\"201\",\"channel2CORRECTIONrow12\":\"-1.00\",\"channel2UNCERTAINTYrow12\":\"0.52\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.000\",\"channel3UUCrow1\":\"-40\",\"channel3CORRECTIONrow1\":\"0.00\",\"channel3UNCERTAINTYrow1\":\"0.68\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.000\",\"channel3UUCrow2\":\"-21.5\",\"channel3CORRECTIONrow2\":\"1.50\",\"channel3UNCERTAINTYrow2\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.000\",\"channel3UUCrow3\":\"-11.2\",\"channel3CORRECTIONrow3\":\"1.20\",\"channel3UNCERTAINTYrow3\":\"0.81\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"0.000\",\"channel3UUCrow4\":\"-0.1\",\"channel3CORRECTIONrow4\":\"0.10\",\"channel3UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"9.9\",\"channel3CORRECTIONrow5\":\"0.10\",\"channel3UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"20\",\"channel3CORRECTIONrow6\":\"0.00\",\"channel3UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.2\",\"channel3CORRECTIONrow7\":\"-0.20\",\"channel3UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"50.1\",\"channel3CORRECTIONrow8\":\"-0.10\",\"channel3UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"75.3\",\"channel3CORRECTIONrow9\":\"-0.30\",\"channel3UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.000\",\"channel3UUCrow10\":\"100.5\",\"channel3CORRECTIONrow10\":\"-0.50\",\"channel3UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.000\",\"channel3UUCrow11\":\"150.7\",\"channel3CORRECTIONrow11\":\"-0.70\",\"channel3UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.000\",\"channel3UUCrow12\":\"200.1\",\"channel3CORRECTIONrow12\":\"-0.10\",\"channel3UNCERTAINTYrow12\":\"0.77\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.000\",\"channel4UUCrow1\":\"-40.1\",\"channel4CORRECTIONrow1\":\"0.10\",\"channel4UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.000\",\"channel4UUCrow2\":\"-19.6\",\"channel4CORRECTIONrow2\":\"-0.40\",\"channel4UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.000\",\"channel4UUCrow3\":\"-9.7\",\"channel4CORRECTIONrow3\":\"-0.30\",\"channel4UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"0.000\",\"channel4UUCrow4\":\"0.1\",\"channel4CORRECTIONrow4\":\"-0.10\",\"channel4UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"10.1\",\"channel4CORRECTIONrow5\":\"-0.10\",\"channel4UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"19.8\",\"channel4CORRECTIONrow6\":\"0.20\",\"channel4UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"37.0\",\"channel4CORRECTIONrow7\":\"0.00\",\"channel4UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.9\",\"channel4CORRECTIONrow8\":\"0.10\",\"channel4UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.7\",\"channel4CORRECTIONrow9\":\"0.30\",\"channel4UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"99.9\",\"channel4CORRECTIONrow10\":\"0.10\",\"channel4UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.000\",\"channel4UUCrow11\":\"150.4\",\"channel4CORRECTIONrow11\":\"-0.40\",\"channel4UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.000\",\"channel4UUCrow12\":\"200.1\",\"channel4CORRECTIONrow12\":\"-0.10\",\"channel4UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.000\",\"channel5UUCrow1\":\"-40\",\"channel5CORRECTIONrow1\":\"0.00\",\"channel5UNCERTAINTYrow1\":\"0.30\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.000\",\"channel5UUCrow2\":\"-20.1\",\"channel5CORRECTIONrow2\":\"0.10\",\"channel5UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.000\",\"channel5UUCrow3\":\"-10.3\",\"channel5CORRECTIONrow3\":\"0.30\",\"channel5UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"0.000\",\"channel5UUCrow4\":\"0.2\",\"channel5CORRECTIONrow4\":\"-0.20\",\"channel5UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"10.1\",\"channel5CORRECTIONrow5\":\"-0.10\",\"channel5UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"20\",\"channel5CORRECTIONrow6\":\"0.00\",\"channel5UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"37\",\"channel5CORRECTIONrow7\":\"0.00\",\"channel5UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.9\",\"channel5CORRECTIONrow8\":\"0.10\",\"channel5UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.7\",\"channel5CORRECTIONrow9\":\"0.30\",\"channel5UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"99.8\",\"channel5CORRECTIONrow10\":\"0.20\",\"channel5UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.000\",\"channel5UUCrow11\":\"150.4\",\"channel5CORRECTIONrow11\":\"-0.40\",\"channel5UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.000\",\"channel5UUCrow12\":\"200.3\",\"channel5CORRECTIONrow12\":\"-0.30\",\"channel5UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.000\",\"channel6UUCrow1\":\"-40.1\",\"channel6CORRECTIONrow1\":\"0.10\",\"channel6UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.000\",\"channel6UUCrow2\":\"-19.7\",\"channel6CORRECTIONrow2\":\"-0.30\",\"channel6UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.000\",\"channel6UUCrow3\":\"-9.6\",\"channel6CORRECTIONrow3\":\"-0.40\",\"channel6UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"0.000\",\"channel6UUCrow4\":\"0.2\",\"channel6CORRECTIONrow4\":\"-0.20\",\"channel6UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"10.1\",\"channel6CORRECTIONrow5\":\"-0.10\",\"channel6UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"19.8\",\"channel6CORRECTIONrow6\":\"0.20\",\"channel6UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.7\",\"channel6CORRECTIONrow7\":\"0.30\",\"channel6UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.6\",\"channel6CORRECTIONrow8\":\"0.40\",\"channel6UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.3\",\"channel6CORRECTIONrow9\":\"0.70\",\"channel6UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"99.5\",\"channel6CORRECTIONrow10\":\"0.50\",\"channel6UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.000\",\"channel6UUCrow11\":\"150\",\"channel6CORRECTIONrow11\":\"0.00\",\"channel6UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.000\",\"channel6UUCrow12\":\"200\",\"channel6CORRECTIONrow12\":\"0.00\",\"channel6UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.000`\",\"channel7UUCrow1\":\"-39.6\",\"channel7CORRECTIONrow1\":\"-0.40\",\"channel7UNCERTAINTYrow1\":\"0.3\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.000\",\"channel7UUCrow2\":\"-20.1\",\"channel7CORRECTIONrow2\":\"0.10\",\"channel7UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.000\",\"channel7UUCrow3\":\"-10.5\",\"channel7CORRECTIONrow3\":\"0.50\",\"channel7UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"0.000\",\"channel7UUCrow4\":\"-0.10\",\"channel7CORRECTIONrow4\":\"0.10\",\"channel7UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"10.1\",\"channel7CORRECTIONrow5\":\"-0.10\",\"channel7UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"20.2\",\"channel7CORRECTIONrow6\":\"-0.20\",\"channel7UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.2\",\"channel7CORRECTIONrow7\":\"-0.20\",\"channel7UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"50\",\"channel7CORRECTIONrow8\":\"0.00\",\"channel7UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"75.6\",\"channel7CORRECTIONrow9\":\"-0.60\",\"channel7UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"100.5\",\"channel7CORRECTIONrow10\":\"-0.50\",\"channel7UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.000\",\"channel7UUCrow11\":\"150.9\",\"channel7CORRECTIONrow11\":\"-0.90\",\"channel7UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.000\",\"channel7UUCrow12\":\"200.1\",\"channel7CORRECTIONrow12\":\"-0.10\",\"channel7UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.000\",\"channel8UUCrow1\":\"-39.8\",\"channel8CORRECTIONrow1\":\"-0.20\",\"channel8UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.000\",\"channel8UUCrow2\":\"-20.4\",\"channel8CORRECTIONrow2\":\"0.40\",\"channel8UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.000\",\"channel8UUCrow3\":\"-10.6\",\"channel8CORRECTIONrow3\":\"0.60\",\"channel8UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"0.000\",\"channel8UUCrow4\":\"0.00\",\"channel8CORRECTIONrow4\":\"0.00\",\"channel8UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"10.1\",\"channel8CORRECTIONrow5\":\"-0.10\",\"channel8UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"20.2\",\"channel8CORRECTIONrow6\":\"-0.20\",\"channel8UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37.3\",\"channel8CORRECTIONrow7\":\"-0.30\",\"channel8UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"50.1\",\"channel8CORRECTIONrow8\":\"-0.10\",\"channel8UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"75.6\",\"channel8CORRECTIONrow9\":\"-0.60\",\"channel8UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.000\",\"channel8UUCrow10\":\"100.6\",\"channel8CORRECTIONrow10\":\"-0.60\",\"channel8UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.000\",\"channel8UUCrow11\":\"151.3\",\"channel8CORRECTIONrow11\":\"-1.30\",\"channel8UNCERTAINTYrow11\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.000\",\"channel8UUCrow12\":\"200.8\",\"channel8CORRECTIONrow12\":\"-0.80\",\"channel8UNCERTAINTYrow12\":\"0.48\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.000\",\"channel9UUCrow1\":\"-39.7\",\"channel9CORRECTIONrow1\":\"-0.30\",\"channel9UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.000\",\"channel9UUCrow2\":\"-19.8\",\"channel9CORRECTIONrow2\":\"-0.20\",\"channel9UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.000\",\"channel9UUCrow3\":\"-10.5\",\"channel9CORRECTIONrow3\":\"0.50\",\"channel9UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"0.000\",\"channel9UUCrow4\":\"0.1\",\"channel9CORRECTIONrow4\":\"-0.10\",\"channel9UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"10.1\",\"channel9CORRECTIONrow5\":\"-0.10\",\"channel9UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"20.1\",\"channel9CORRECTIONrow6\":\"-0.10\",\"channel9UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37.1\",\"channel9CORRECTIONrow7\":\"-0.10\",\"channel9UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"50.1\",\"channel9CORRECTIONrow8\":\"-0.10\",\"channel9UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"75.3\",\"channel9CORRECTIONrow9\":\"-0.30\",\"channel9UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"100.4\",\"channel9CORRECTIONrow10\":\"-0.40\",\"channel9UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.000\",\"channel9UUCrow11\":\"150.6\",\"channel9CORRECTIONrow11\":\"-0.60\",\"channel9UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.000\",\"channel9UUCrow12\":\"200.1\",\"channel9CORRECTIONrow12\":\"-0.10\",\"channel9UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.000\",\"channel10UUCrow1\":\"-39.9\",\"channel10CORRECTIONrow1\":\"-0.10\",\"channel10UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.000\",\"channel10UUCrow2\":\"-19.6\",\"channel10CORRECTIONrow2\":\"-0.40\",\"channel10UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.000\",\"channel10UUCrow3\":\"-9.7\",\"channel10CORRECTIONrow3\":\"-0.30\",\"channel10UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"0.000\",\"channel10UUCrow4\":\"0.1\",\"channel10CORRECTIONrow4\":\"-0.10\",\"channel10UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"10.1\",\"channel10CORRECTIONrow5\":\"-0.10\",\"channel10UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"19.9\",\"channel10CORRECTIONrow6\":\"0.10\",\"channel10UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"36.9\",\"channel10CORRECTIONrow7\":\"0.10\",\"channel10UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.9\",\"channel10CORRECTIONrow8\":\"0.10\",\"channel10UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.8\",\"channel10CORRECTIONrow9\":\"0.20\",\"channel10UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"100\",\"channel10CORRECTIONrow10\":\"0.00\",\"channel10UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.000\",\"channel10UUCrow11\":\"150.4\",\"channel10CORRECTIONrow11\":\"-0.40\",\"channel10UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.000\",\"channel10UUCrow12\":\"200.1\",\"channel10CORRECTIONrow12\":\"-0.10\",\"channel10UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.000\",\"channel11UUCrow1\":\"-39.9\",\"channel11CORRECTIONrow1\":\"-0.10\",\"channel11UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.000\",\"channel11UUCrow2\":\"-19.6\",\"channel11CORRECTIONrow2\":\"-0.40\",\"channel11UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.000\",\"channel11UUCrow3\":\"-9.60\",\"channel11CORRECTIONrow3\":\"-0.40\",\"channel11UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"0.000\",\"channel11UUCrow4\":\"0.20\",\"channel11CORRECTIONrow4\":\"-0.20\",\"channel11UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"10.1\",\"channel11CORRECTIONrow5\":\"-0.10\",\"channel11UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"19.9\",\"channel11CORRECTIONrow6\":\"0.10\",\"channel11UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"36.8\",\"channel11CORRECTIONrow7\":\"0.20\",\"channel11UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.8\",\"channel11CORRECTIONrow8\":\"0.20\",\"channel11UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.5\",\"channel11CORRECTIONrow9\":\"0.50\",\"channel11UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"99.7\",\"channel11CORRECTIONrow10\":\"0.30\",\"channel11UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"150.5\",\"channel11CORRECTIONrow11\":\"-0.50\",\"channel11UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.000\",\"channel11UUCrow12\":\"200.6\",\"channel11CORRECTIONrow12\":\"-0.60\",\"channel11UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.000\",\"channel12UUCrow1\":\"-39.9\",\"channel12CORRECTIONrow1\":\"-0.10\",\"channel12UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.000\",\"channel12UUCrow2\":\"-19.4\",\"channel12CORRECTIONrow2\":\"-0.60\",\"channel12UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.000\",\"channel12UUCrow3\":\"-9.2\",\"channel12CORRECTIONrow3\":\"-0.80\",\"channel12UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"0.000\",\"channel12UUCrow4\":\"0.1\",\"channel12CORRECTIONrow4\":\"-0.10\",\"channel12UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"10.1\",\"channel12CORRECTIONrow5\":\"-0.10\",\"channel12UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.8\",\"channel12CORRECTIONrow6\":\"0.20\",\"channel12UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"36.6\",\"channel12CORRECTIONrow7\":\"0.40\",\"channel12UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.6\",\"channel12CORRECTIONrow8\":\"0.40\",\"channel12UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.3\",\"channel12CORRECTIONrow9\":\"0.70\",\"channel12UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"99.4\",\"channel12CORRECTIONrow10\":\"0.60\",\"channel12UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.000\",\"channel12UUCrow11\":\"149.9\",\"channel12CORRECTIONrow11\":\"0.10\",\"channel12UNCERTAINTYrow11\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.000\",\"channel12UUCrow12\":\"200\",\"channel12CORRECTIONrow12\":\"0.00\",\"channel12UNCERTAINTYrow12\":\"0.48\"}]]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(11, 'S5UC09155 new TC', '2023-215-TMP-07-004', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2023-07-31', NULL, NULL, NULL, NULL, NULL, '0.77', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.010\",\"channel1UUCrow1\":\"-39.5\",\"channel1CORRECTIONrow1\":\"-0.51\",\"channel1UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.010\",\"channel1UUCrow2\":\"-19.5\",\"channel1CORRECTIONrow2\":\"-0.51\",\"channel1UNCERTAINTYrow2\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.010\",\"channel1UUCrow3\":\"-9.4\",\"channel1CORRECTIONrow3\":\"-0.61\",\"channel1UNCERTAINTYrow3\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"-0.010\",\"channel1UUCrow4\":\"0.4\",\"channel1CORRECTIONrow4\":\"-0.41\",\"channel1UNCERTAINTYrow4\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"9.990\",\"channel1UUCrow5\":\"10.4\",\"channel1CORRECTIONrow5\":\"-0.41\",\"channel1UNCERTAINTYrow5\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"19.990\",\"channel1UUCrow6\":\"20.5\",\"channel1CORRECTIONrow6\":\"-0.51\",\"channel1UNCERTAINTYrow6\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.5\",\"channel1CORRECTIONrow7\":\"-0.50\",\"channel1UNCERTAINTYrow7\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50.4\",\"channel1CORRECTIONrow8\":\"-0.40\",\"channel1UNCERTAINTYrow8\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"75.5\",\"channel1CORRECTIONrow9\":\"-0.50\",\"channel1UNCERTAINTYrow9\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.010\",\"channel1UUCrow10\":\"100.5\",\"channel1CORRECTIONrow10\":\"-0.49\",\"channel1UNCERTAINTYrow10\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"151.7\",\"channel1CORRECTIONrow11\":\"-1.70\",\"channel1UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.020\",\"channel1UUCrow12\":\"201.7\",\"channel1CORRECTIONrow12\":\"-1.68\",\"channel1UNCERTAINTYrow12\":\"0.77\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.010\",\"channel2UUCrow1\":\"-39\",\"channel2CORRECTIONrow1\":\"-1.01\",\"channel2UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.010\",\"channel2UUCrow2\":\"-19.2\",\"channel2CORRECTIONrow2\":\"-0.81\",\"channel2UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.010\",\"channel2UUCrow3\":\"-9.10\",\"channel2CORRECTIONrow3\":\"-0.91\",\"channel2UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"-0.010\",\"channel2UUCrow4\":\"0.6\",\"channel2CORRECTIONrow4\":\"-0.61\",\"channel2UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"9.990\",\"channel2UUCrow5\":\"10.5\",\"channel2CORRECTIONrow5\":\"-0.51\",\"channel2UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"19.990\",\"channel2UUCrow6\":\"20.5\",\"channel2CORRECTIONrow6\":\"-0.51\",\"channel2UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.4\",\"channel2CORRECTIONrow7\":\"-0.40\",\"channel2UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.2\",\"channel2CORRECTIONrow8\":\"-0.20\",\"channel2UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"75.2\",\"channel2CORRECTIONrow9\":\"-0.20\",\"channel2UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.010\",\"channel2UUCrow10\":\"100.2\",\"channel2CORRECTIONrow10\":\"-0.19\",\"channel2UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"151\",\"channel2CORRECTIONrow11\":\"-1.00\",\"channel2UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.020\",\"channel2UUCrow12\":\"201.1\",\"channel2CORRECTIONrow12\":\"-1.08\",\"channel2UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.010\",\"channel3UUCrow1\":\"-39.5\",\"channel3CORRECTIONrow1\":\"-0.51\",\"channel3UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.010\",\"channel3UUCrow2\":\"-19.6\",\"channel3CORRECTIONrow2\":\"-0.41\",\"channel3UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.010\",\"channel3UUCrow3\":\"-9.6\",\"channel3CORRECTIONrow3\":\"-0.41\",\"channel3UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"-0.010\",\"channel3UUCrow4\":\"0.2\",\"channel3CORRECTIONrow4\":\"-0.21\",\"channel3UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"9.990\",\"channel3UUCrow5\":\"10\",\"channel3CORRECTIONrow5\":\"-0.01\",\"channel3UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"19.990\",\"channel3UUCrow6\":\"20.1\",\"channel3CORRECTIONrow6\":\"-0.11\",\"channel3UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.2\",\"channel3CORRECTIONrow7\":\"-0.20\",\"channel3UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"50.2\",\"channel3CORRECTIONrow8\":\"-0.20\",\"channel3UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"75.3\",\"channel3CORRECTIONrow9\":\"-0.30\",\"channel3UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.010\",\"channel3UUCrow10\":\"100.5\",\"channel3CORRECTIONrow10\":\"-0.49\",\"channel3UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.000\",\"channel3UUCrow11\":\"151.3\",\"channel3CORRECTIONrow11\":\"-1.30\",\"channel3UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.020\",\"channel3UUCrow12\":\"201.5\",\"channel3CORRECTIONrow12\":\"-1.48\",\"channel3UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.010\",\"channel4UUCrow1\":\"-39.6\",\"channel4CORRECTIONrow1\":\"-0.41\",\"channel4UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.010\",\"channel4UUCrow2\":\"-19.6\",\"channel4CORRECTIONrow2\":\"-0.41\",\"channel4UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.010\",\"channel4UUCrow3\":\"-9.8\",\"channel4CORRECTIONrow3\":\"-0.21\",\"channel4UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"-0.010\",\"channel4UUCrow4\":\"0.1\",\"channel4CORRECTIONrow4\":\"-0.11\",\"channel4UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"9.990\",\"channel4UUCrow5\":\"10.1\",\"channel4CORRECTIONrow5\":\"-0.11\",\"channel4UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"19.990\",\"channel4UUCrow6\":\"20.1\",\"channel4CORRECTIONrow6\":\"-0.11\",\"channel4UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"37\",\"channel4CORRECTIONrow7\":\"0.00\",\"channel4UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"50\",\"channel4CORRECTIONrow8\":\"0.00\",\"channel4UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"75.2\",\"channel4CORRECTIONrow9\":\"-0.20\",\"channel4UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.010\",\"channel4UUCrow10\":\"100.4\",\"channel4CORRECTIONrow10\":\"-0.39\",\"channel4UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.000\",\"channel4UUCrow11\":\"151.1\",\"channel4CORRECTIONrow11\":\"-1.10\",\"channel4UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.020\",\"channel4UUCrow12\":\"201\",\"channel4CORRECTIONrow12\":\"-0.98\",\"channel4UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.010\",\"channel5UUCrow1\":\"-39.3\",\"channel5CORRECTIONrow1\":\"-0.71\",\"channel5UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.010\",\"channel5UUCrow2\":\"-19.4\",\"channel5CORRECTIONrow2\":\"-0.61\",\"channel5UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.010\",\"channel5UUCrow3\":\"-9.7\",\"channel5CORRECTIONrow3\":\"-0.31\",\"channel5UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"-0.010\",\"channel5UUCrow4\":\"0.1\",\"channel5CORRECTIONrow4\":\"-0.11\",\"channel5UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"9.990\",\"channel5UUCrow5\":\"10.1\",\"channel5CORRECTIONrow5\":\"-0.11\",\"channel5UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"19.990\",\"channel5UUCrow6\":\"20.1\",\"channel5CORRECTIONrow6\":\"-0.11\",\"channel5UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"36.9\",\"channel5CORRECTIONrow7\":\"0.10\",\"channel5UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"50\",\"channel5CORRECTIONrow8\":\"0.00\",\"channel5UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"75\",\"channel5CORRECTIONrow9\":\"0.00\",\"channel5UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.010\",\"channel5UUCrow10\":\"100\",\"channel5CORRECTIONrow10\":\"0.01\",\"channel5UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.000\",\"channel5UUCrow11\":\"150.6\",\"channel5CORRECTIONrow11\":\"-0.60\",\"channel5UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.020\",\"channel5UUCrow12\":\"200.1\",\"channel5CORRECTIONrow12\":\"-0.08\",\"channel5UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.010\",\"channel6UUCrow1\":\"-39.6\",\"channel6CORRECTIONrow1\":\"-0.41\",\"channel6UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.010\",\"channel6UUCrow2\":\"-16.7\",\"channel6CORRECTIONrow2\":\"-3.31\",\"channel6UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.010\",\"channel6UUCrow3\":\"-10.3\",\"channel6CORRECTIONrow3\":\"0.29\",\"channel6UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"-0.010\",\"channel6UUCrow4\":\"-0.1\",\"channel6CORRECTIONrow4\":\"0.09\",\"channel6UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"9.990\",\"channel6UUCrow5\":\"10.2\",\"channel6CORRECTIONrow5\":\"-0.21\",\"channel6UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"19.990\",\"channel6UUCrow6\":\"19.9\",\"channel6CORRECTIONrow6\":\"0.09\",\"channel6UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.9\",\"channel6CORRECTIONrow7\":\"0.10\",\"channel6UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"50\",\"channel6CORRECTIONrow8\":\"0.00\",\"channel6UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"75.1\",\"channel6CORRECTIONrow9\":\"-0.10\",\"channel6UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.010\",\"channel6UUCrow10\":\"100.2\",\"channel6CORRECTIONrow10\":\"-0.19\",\"channel6UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.000\",\"channel6UUCrow11\":\"151.2\",\"channel6CORRECTIONrow11\":\"-1.20\",\"channel6UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.020\",\"channel6UUCrow12\":\"200.8\",\"channel6CORRECTIONrow12\":\"-0.78\",\"channel6UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.010\",\"channel7UUCrow1\":\"-39.5\",\"channel7CORRECTIONrow1\":\"-0.51\",\"channel7UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.010\",\"channel7UUCrow2\":\"-19.6\",\"channel7CORRECTIONrow2\":\"-0.41\",\"channel7UNCERTAINTYrow2\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.010\",\"channel7UUCrow3\":\"-9.4\",\"channel7CORRECTIONrow3\":\"-0.61\",\"channel7UNCERTAINTYrow3\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"-0.010\",\"channel7UUCrow4\":\"0.3\",\"channel7CORRECTIONrow4\":\"-0.31\",\"channel7UNCERTAINTYrow4\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"9.990\",\"channel7UUCrow5\":\"10.5\",\"channel7CORRECTIONrow5\":\"-0.51\",\"channel7UNCERTAINTYrow5\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"19.990\",\"channel7UUCrow6\":\"20.4\",\"channel7CORRECTIONrow6\":\"-0.41\",\"channel7UNCERTAINTYrow6\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.4\",\"channel7CORRECTIONrow7\":\"-0.40\",\"channel7UNCERTAINTYrow7\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"50.3\",\"channel7CORRECTIONrow8\":\"-0.30\",\"channel7UNCERTAINTYrow8\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"75.3\",\"channel7CORRECTIONrow9\":\"-0.30\",\"channel7UNCERTAINTYrow9\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.010\",\"channel7UUCrow10\":\"100.3\",\"channel7CORRECTIONrow10\":\"-0.29\",\"channel7UNCERTAINTYrow10\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.000\",\"channel7UUCrow11\":\"151.4\",\"channel7CORRECTIONrow11\":\"-1.40\",\"channel7UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.020\",\"channel7UUCrow12\":\"201.1\",\"channel7CORRECTIONrow12\":\"-1.08\",\"channel7UNCERTAINTYrow12\":\"0.77\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.010\",\"channel8UUCrow1\":\"-39.4\",\"channel8CORRECTIONrow1\":\"-0.61\",\"channel8UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.010\",\"channel8UUCrow2\":\"-19.5\",\"channel8CORRECTIONrow2\":\"-0.51\",\"channel8UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.010\",\"channel8UUCrow3\":\"-9.4\",\"channel8CORRECTIONrow3\":\"-0.61\",\"channel8UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"-0.010\",\"channel8UUCrow4\":\"0.3\",\"channel8CORRECTIONrow4\":\"-0.31\",\"channel8UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"9.990\",\"channel8UUCrow5\":\"10.4\",\"channel8CORRECTIONrow5\":\"-0.41\",\"channel8UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"19.990\",\"channel8UUCrow6\":\"20.3\",\"channel8CORRECTIONrow6\":\"-0.31\",\"channel8UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37.3\",\"channel8CORRECTIONrow7\":\"-0.30\",\"channel8UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"50.2\",\"channel8CORRECTIONrow8\":\"-0.20\",\"channel8UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"75.3\",\"channel8CORRECTIONrow9\":\"-0.30\",\"channel8UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.010\",\"channel8UUCrow10\":\"100.4\",\"channel8CORRECTIONrow10\":\"-0.39\",\"channel8UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.000\",\"channel8UUCrow11\":\"151.2\",\"channel8CORRECTIONrow11\":\"-1.20\",\"channel8UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.020\",\"channel8UUCrow12\":\"201\",\"channel8CORRECTIONrow12\":\"-0.98\",\"channel8UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.010\",\"channel9UUCrow1\":\"-39.5\",\"channel9CORRECTIONrow1\":\"-0.51\",\"channel9UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.010\",\"channel9UUCrow2\":\"-19.6\",\"channel9CORRECTIONrow2\":\"-0.41\",\"channel9UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.010\",\"channel9UUCrow3\":\"-9.6\",\"channel9CORRECTIONrow3\":\"-0.41\",\"channel9UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"-0.010\",\"channel9UUCrow4\":\"0.3\",\"channel9CORRECTIONrow4\":\"-0.31\",\"channel9UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"9.990\",\"channel9UUCrow5\":\"10.1\",\"channel9CORRECTIONrow5\":\"-0.11\",\"channel9UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"19.990\",\"channel9UUCrow6\":\"20.1\",\"channel9CORRECTIONrow6\":\"-0.11\",\"channel9UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37.2\",\"channel9CORRECTIONrow7\":\"-0.20\",\"channel9UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"50.3\",\"channel9CORRECTIONrow8\":\"-0.30\",\"channel9UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"75.3\",\"channel9CORRECTIONrow9\":\"-0.30\",\"channel9UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.010\",\"channel9UUCrow10\":\"100.6\",\"channel9CORRECTIONrow10\":\"-0.59\",\"channel9UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.000\",\"channel9UUCrow11\":\"151.1\",\"channel9CORRECTIONrow11\":\"-1.10\",\"channel9UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.020\",\"channel9UUCrow12\":\"200.9\",\"channel9CORRECTIONrow12\":\"-0.88\",\"channel9UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.010\",\"channel10UUCrow1\":\"-39.6\",\"channel10CORRECTIONrow1\":\"-0.41\",\"channel10UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.010\",\"channel10UUCrow2\":\"-19.6\",\"channel10CORRECTIONrow2\":\"-0.41\",\"channel10UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.010\",\"channel10UUCrow3\":\"-9.9\",\"channel10CORRECTIONrow3\":\"-0.11\",\"channel10UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"-0.010\",\"channel10UUCrow4\":\"0.1\",\"channel10CORRECTIONrow4\":\"-0.11\",\"channel10UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"9.990\",\"channel10UUCrow5\":\"10.1\",\"channel10CORRECTIONrow5\":\"-0.11\",\"channel10UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"19.990\",\"channel10UUCrow6\":\"20\",\"channel10CORRECTIONrow6\":\"-0.01\",\"channel10UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"37.1\",\"channel10CORRECTIONrow7\":\"-0.10\",\"channel10UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"50.1\",\"channel10CORRECTIONrow8\":\"-0.10\",\"channel10UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"75.2\",\"channel10CORRECTIONrow9\":\"-0.20\",\"channel10UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.010\",\"channel10UUCrow10\":\"100.5\",\"channel10CORRECTIONrow10\":\"-0.49\",\"channel10UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.170\",\"channel10UUCrow11\":\"151\",\"channel10CORRECTIONrow11\":\"-0.83\",\"channel10UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.020\",\"channel10UUCrow12\":\"200.6\",\"channel10CORRECTIONrow12\":\"-0.58\",\"channel10UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.010\",\"channel11UUCrow1\":\"-39.4\",\"channel11CORRECTIONrow1\":\"-0.61\",\"channel11UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.010\",\"channel11UUCrow2\":\"-19.1\",\"channel11CORRECTIONrow2\":\"-0.91\",\"channel11UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.010\",\"channel11UUCrow3\":\"-9.8\",\"channel11CORRECTIONrow3\":\"-0.21\",\"channel11UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"-0.010\",\"channel11UUCrow4\":\"0.1\",\"channel11CORRECTIONrow4\":\"-0.11\",\"channel11UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"9.990\",\"channel11UUCrow5\":\"10.1\",\"channel11CORRECTIONrow5\":\"-0.11\",\"channel11UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"19.990\",\"channel11UUCrow6\":\"20.1\",\"channel11CORRECTIONrow6\":\"-0.11\",\"channel11UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"36.9\",\"channel11CORRECTIONrow7\":\"0.10\",\"channel11UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"50\",\"channel11CORRECTIONrow8\":\"0.00\",\"channel11UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"75\",\"channel11CORRECTIONrow9\":\"0.00\",\"channel11UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.010\",\"channel11UUCrow10\":\"100.1\",\"channel11CORRECTIONrow10\":\"-0.09\",\"channel11UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"149.9\",\"channel11CORRECTIONrow11\":\"0.10\",\"channel11UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.020\",\"channel11UUCrow12\":\"199.2\",\"channel11CORRECTIONrow12\":\"0.82\",\"channel11UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.010\",\"channel12UUCrow1\":\"-39.4\",\"channel12CORRECTIONrow1\":\"-0.61\",\"channel12UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.010\",\"channel12UUCrow2\":\"-19.0\",\"channel12CORRECTIONrow2\":\"-1.01\",\"channel12UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.010\",\"channel12UUCrow3\":\"-9.9\",\"channel12CORRECTIONrow3\":\"-0.11\",\"channel12UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"-0.010\",\"channel12UUCrow4\":\"0.00\",\"channel12CORRECTIONrow4\":\"-0.01\",\"channel12UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"9.990\",\"channel12UUCrow5\":\"10.1\",\"channel12CORRECTIONrow5\":\"-0.11\",\"channel12UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"19.990\",\"channel12UUCrow6\":\"20.0\",\"channel12CORRECTIONrow6\":\"-0.01\",\"channel12UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"36.9\",\"channel12CORRECTIONrow7\":\"0.10\",\"channel12UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"50.0\",\"channel12CORRECTIONrow8\":\"0.00\",\"channel12UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.9\",\"channel12CORRECTIONrow9\":\"0.10\",\"channel12UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.010\",\"channel12UUCrow10\":\"100.1\",\"channel12CORRECTIONrow10\":\"-0.09\",\"channel12UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.000\",\"channel12UUCrow11\":\"150.0\",\"channel12CORRECTIONrow11\":\"0.00\",\"channel12UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.020\",\"channel12UUCrow12\":\"199.3\",\"channel12CORRECTIONrow12\":\"0.72\",\"channel12UNCERTAINTYrow12\":\"0.75\"}]]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(15, 'H31173261', '2023-215-TMP-07-001', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Graptec', 'GL820', '2023-07-28', NULL, NULL, NULL, NULL, NULL, '1.4', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.000\",\"channel1UUCrow1\":\"-39.6\",\"channel1CORRECTIONrow1\":\"-0.40\",\"channel1UNCERTAINTYrow1\":\"1.2\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.000\",\"channel1UUCrow2\":\"-21.4\",\"channel1CORRECTIONrow2\":\"1.40\",\"channel1UNCERTAINTYrow2\":\"1.2\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.000\",\"channel1UUCrow3\":\"-11.7\",\"channel1CORRECTIONrow3\":\"1.70\",\"channel1UNCERTAINTYrow3\":\"1.2\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"0.000\",\"channel1UUCrow4\":\"-0.9\",\"channel1CORRECTIONrow4\":\"0.90\",\"channel1UNCERTAINTYrow4\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"9.7\",\"channel1CORRECTIONrow5\":\"0.30\",\"channel1UNCERTAINTYrow5\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"19.9\",\"channel1CORRECTIONrow6\":\"0.10\",\"channel1UNCERTAINTYrow6\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.1\",\"channel1CORRECTIONrow7\":\"-0.10\",\"channel1UNCERTAINTYrow7\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50\",\"channel1CORRECTIONrow8\":\"0.00\",\"channel1UNCERTAINTYrow8\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"74.9\",\"channel1CORRECTIONrow9\":\"0.10\",\"channel1UNCERTAINTYrow9\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"100.3\",\"channel1CORRECTIONrow10\":\"-0.30\",\"channel1UNCERTAINTYrow10\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"150.3\",\"channel1CORRECTIONrow11\":\"-0.30\",\"channel1UNCERTAINTYrow11\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.000\",\"channel1UUCrow12\":\"198.9\",\"channel1CORRECTIONrow12\":\"1.10\",\"channel1UNCERTAINTYrow12\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow13\":\"230\",\"channel1STANDARDrow13\":\"230.000\",\"channel1UUCrow13\":\"229.9\",\"channel1CORRECTIONrow13\":\"0.10\",\"channel1UNCERTAINTYrow13\":\"1.4\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.000\",\"channel2UUCrow1\":\"-39.6\",\"channel2CORRECTIONrow1\":\"-0.40\",\"channel2UNCERTAINTYrow1\":\"1.2\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.000\",\"channel2UUCrow2\":\"-21.1\",\"channel2CORRECTIONrow2\":\"1.10\",\"channel2UNCERTAINTYrow2\":\"1.2\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.000\",\"channel2UUCrow3\":\"-11.3\",\"channel2CORRECTIONrow3\":\"1.30\",\"channel2UNCERTAINTYrow3\":\"1.2\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"0.000\",\"channel2UUCrow4\":\"-0.9\",\"channel2CORRECTIONrow4\":\"0.90\",\"channel2UNCERTAINTYrow4\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"9.8\",\"channel2CORRECTIONrow5\":\"0.20\",\"channel2UNCERTAINTYrow5\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"20\",\"channel2CORRECTIONrow6\":\"0.00\",\"channel2UNCERTAINTYrow6\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.2\",\"channel2CORRECTIONrow7\":\"-0.20\",\"channel2UNCERTAINTYrow7\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.1\",\"channel2CORRECTIONrow8\":\"-0.10\",\"channel2UNCERTAINTYrow8\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"75\",\"channel2CORRECTIONrow9\":\"0.00\",\"channel2UNCERTAINTYrow9\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"100.4\",\"channel2CORRECTIONrow10\":\"-0.40\",\"channel2UNCERTAINTYrow10\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"150.4\",\"channel2CORRECTIONrow11\":\"-0.40\",\"channel2UNCERTAINTYrow11\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.000\",\"channel2UUCrow12\":\"199.2\",\"channel2CORRECTIONrow12\":\"0.80\",\"channel2UNCERTAINTYrow12\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow13\":\"230\",\"channel2STANDARDrow13\":\"230.000\",\"channel2UUCrow13\":\"230.8\",\"channel2CORRECTIONrow13\":\"-0.80\",\"channel2UNCERTAINTYrow13\":\"1.4\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.000\",\"channel3UUCrow1\":\"-39.6\",\"channel3CORRECTIONrow1\":\"-0.40\",\"channel3UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.00\",\"channel3UUCrow2\":\"-19.8\",\"channel3CORRECTIONrow2\":\"-0.20\",\"channel3UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.000\",\"channel3UUCrow3\":\"-9.9\",\"channel3CORRECTIONrow3\":\"-0.10\",\"channel3UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"0.000\",\"channel3UUCrow4\":\"0.1\",\"channel3CORRECTIONrow4\":\"-0.10\",\"channel3UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"10.0\",\"channel3CORRECTIONrow5\":\"0.00\",\"channel3UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"20.0\",\"channel3CORRECTIONrow6\":\"0.00\",\"channel3UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.0\",\"channel3CORRECTIONrow7\":\"0.00\",\"channel3UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"49.8\",\"channel3CORRECTIONrow8\":\"0.20\",\"channel3UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"74.7\",\"channel3CORRECTIONrow9\":\"0.30\",\"channel3UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.000\",\"channel3UUCrow10\":\"100.0\",\"channel3CORRECTIONrow10\":\"0.00\",\"channel3UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.040\",\"channel3UUCrow11\":\"150.2\",\"channel3CORRECTIONrow11\":\"-0.16\",\"channel3UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.000\",\"channel3UUCrow12\":\"199.2\",\"channel3CORRECTIONrow12\":\"0.80\",\"channel3UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow13\":\"230\",\"channel3STANDARDrow13\":\"229.980\",\"channel3UUCrow13\":\"229.4\",\"channel3CORRECTIONrow13\":\"0.58\",\"channel3UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.000\",\"channel4UUCrow1\":\"-39.7\",\"channel4CORRECTIONrow1\":\"-0.30\",\"channel4UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.000\",\"channel4UUCrow2\":\"-20.0\",\"channel4CORRECTIONrow2\":\"0.00\",\"channel4UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.000\",\"channel4UUCrow3\":\"-10.1\",\"channel4CORRECTIONrow3\":\"0.10\",\"channel4UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"0.000\",\"channel4UUCrow4\":\"0.0\",\"channel4CORRECTIONrow4\":\"0.00\",\"channel4UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"9.9\",\"channel4CORRECTIONrow5\":\"0.10\",\"channel4UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"19.9\",\"channel4CORRECTIONrow6\":\"0.10\",\"channel4UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"36.9\",\"channel4CORRECTIONrow7\":\"0.10\",\"channel4UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.7\",\"channel4CORRECTIONrow8\":\"0.30\",\"channel4UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.6\",\"channel4CORRECTIONrow9\":\"0.40\",\"channel4UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"100.0\",\"channel4CORRECTIONrow10\":\"0.00\",\"channel4UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.040\",\"channel4UUCrow11\":\"150.2\",\"channel4CORRECTIONrow11\":\"-0.16\",\"channel4UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.000\",\"channel4UUCrow12\":\"200.9\",\"channel4CORRECTIONrow12\":\"-0.90\",\"channel4UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow13\":\"230\",\"channel4STANDARDrow13\":\"229.980\",\"channel4UUCrow13\":\"231.9\",\"channel4CORRECTIONrow13\":\"-1.92\",\"channel4UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.000\",\"channel5UUCrow1\":\"-39.7\",\"channel5CORRECTIONrow1\":\"-0.30\",\"channel5UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.000\",\"channel5UUCrow2\":\"-19.9\",\"channel5CORRECTIONrow2\":\"-0.10\",\"channel5UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.000\",\"channel5UUCrow3\":\"-10\",\"channel5CORRECTIONrow3\":\"0.00\",\"channel5UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"0.000\",\"channel5UUCrow4\":\"0\",\"channel5CORRECTIONrow4\":\"0.00\",\"channel5UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"9.9\",\"channel5CORRECTIONrow5\":\"0.10\",\"channel5UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"20\",\"channel5CORRECTIONrow6\":\"0.00\",\"channel5UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"36.9\",\"channel5CORRECTIONrow7\":\"0.10\",\"channel5UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.7\",\"channel5CORRECTIONrow8\":\"0.30\",\"channel5UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.6\",\"channel5CORRECTIONrow9\":\"0.40\",\"channel5UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"100.1\",\"channel5CORRECTIONrow10\":\"-0.10\",\"channel5UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.040\",\"channel5UUCrow11\":\"150.2\",\"channel5CORRECTIONrow11\":\"-0.16\",\"channel5UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.000\",\"channel5UUCrow12\":\"199.1\",\"channel5CORRECTIONrow12\":\"0.90\",\"channel5UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow13\":\"230\",\"channel5STANDARDrow13\":\"229.980\",\"channel5UUCrow13\":\"229.2\",\"channel5CORRECTIONrow13\":\"0.78\",\"channel5UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.000\",\"channel6UUCrow1\":\"-39.6\",\"channel6CORRECTIONrow1\":\"-0.40\",\"channel6UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.000\",\"channel6UUCrow2\":\"-20.4\",\"channel6CORRECTIONrow2\":\"0.40\",\"channel6UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.000\",\"channel6UUCrow3\":\"-10.6\",\"channel6CORRECTIONrow3\":\"0.60\",\"channel6UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"0.000\",\"channel6UUCrow4\":\"0\",\"channel6CORRECTIONrow4\":\"0.00\",\"channel6UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"10\",\"channel6CORRECTIONrow5\":\"0.00\",\"channel6UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"20.1\",\"channel6CORRECTIONrow6\":\"-0.10\",\"channel6UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"37\",\"channel6CORRECTIONrow7\":\"0.00\",\"channel6UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.9\",\"channel6CORRECTIONrow8\":\"0.10\",\"channel6UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.8\",\"channel6CORRECTIONrow9\":\"0.20\",\"channel6UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"100.3\",\"channel6CORRECTIONrow10\":\"-0.30\",\"channel6UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.040\",\"channel6UUCrow11\":\"150.4\",\"channel6CORRECTIONrow11\":\"-0.36\",\"channel6UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.000\",\"channel6UUCrow12\":\"199.2\",\"channel6CORRECTIONrow12\":\"0.80\",\"channel6UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow13\":\"230\",\"channel6STANDARDrow13\":\"229.980\",\"channel6UUCrow13\":\"229.8\",\"channel6CORRECTIONrow13\":\"0.18\",\"channel6UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.000\",\"channel7UUCrow1\":\"-39.6\",\"channel7CORRECTIONrow1\":\"-0.40\",\"channel7UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.000\",\"channel7UUCrow2\":\"-19.8\",\"channel7CORRECTIONrow2\":\"-0.20\",\"channel7UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.000\",\"channel7UUCrow3\":\"-9.9\",\"channel7CORRECTIONrow3\":\"-0.10\",\"channel7UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"0.000\",\"channel7UUCrow4\":\"0.1\",\"channel7CORRECTIONrow4\":\"-0.10\",\"channel7UNCERTAINTYrow4\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"10.0\",\"channel7CORRECTIONrow5\":\"0.00\",\"channel7UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"20.0\",\"channel7CORRECTIONrow6\":\"0.00\",\"channel7UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.0\",\"channel7CORRECTIONrow7\":\"0.00\",\"channel7UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"49.8\",\"channel7CORRECTIONrow8\":\"0.20\",\"channel7UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"74.8\",\"channel7CORRECTIONrow9\":\"0.20\",\"channel7UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"100.3\",\"channel7CORRECTIONrow10\":\"-0.30\",\"channel7UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.040\",\"channel7UUCrow11\":\"150.4\",\"channel7CORRECTIONrow11\":\"-0.36\",\"channel7UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.000\",\"channel7UUCrow12\":\"199.0\",\"channel7CORRECTIONrow12\":\"1.00\",\"channel7UNCERTAINTYrow12\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow13\":\"230\",\"channel7STANDARDrow13\":\"229.980\",\"channel7UUCrow13\":\"229.1\",\"channel7CORRECTIONrow13\":\"0.88\",\"channel7UNCERTAINTYrow13\":\"0.74\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.000\",\"channel8UUCrow1\":\"-39.6\",\"channel8CORRECTIONrow1\":\"-0.40\",\"channel8UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.000\",\"channel8UUCrow2\":\"-19.7\",\"channel8CORRECTIONrow2\":\"-0.30\",\"channel8UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.000\",\"channel8UUCrow3\":\"-9.9\",\"channel8CORRECTIONrow3\":\"-0.10\",\"channel8UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"0.000\",\"channel8UUCrow4\":\"0.1\",\"channel8CORRECTIONrow4\":\"-0.10\",\"channel8UNCERTAINTYrow4\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"9.9\",\"channel8CORRECTIONrow5\":\"0.10\",\"channel8UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"20\",\"channel8CORRECTIONrow6\":\"0.00\",\"channel8UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37\",\"channel8CORRECTIONrow7\":\"0.00\",\"channel8UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"49.8\",\"channel8CORRECTIONrow8\":\"0.20\",\"channel8UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"74.7\",\"channel8CORRECTIONrow9\":\"0.30\",\"channel8UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.000\",\"channel8UUCrow10\":\"100.2\",\"channel8CORRECTIONrow10\":\"-0.20\",\"channel8UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.040\",\"channel8UUCrow11\":\"150.3\",\"channel8CORRECTIONrow11\":\"-0.26\",\"channel8UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.000\",\"channel8UUCrow12\":\"199.2\",\"channel8CORRECTIONrow12\":\"0.80\",\"channel8UNCERTAINTYrow12\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow13\":\"230\",\"channel8STANDARDrow13\":\"229.980\",\"channel8UUCrow13\":\"229.1\",\"channel8CORRECTIONrow13\":\"0.88\",\"channel8UNCERTAINTYrow13\":\"0.74\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.000\",\"channel9UUCrow1\":\"-39.6\",\"channel9CORRECTIONrow1\":\"-0.40\",\"channel9UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.000\",\"channel9UUCrow2\":\"-19.1\",\"channel9CORRECTIONrow2\":\"-0.90\",\"channel9UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.000\",\"channel9UUCrow3\":\"-9.5\",\"channel9CORRECTIONrow3\":\"-0.50\",\"channel9UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"0.000\",\"channel9UUCrow4\":\"0.1\",\"channel9CORRECTIONrow4\":\"-0.10\",\"channel9UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"9.9\",\"channel9CORRECTIONrow5\":\"0.10\",\"channel9UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"20\",\"channel9CORRECTIONrow6\":\"0.00\",\"channel9UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37\",\"channel9CORRECTIONrow7\":\"0.00\",\"channel9UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"49.8\",\"channel9CORRECTIONrow8\":\"0.20\",\"channel9UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"74.7\",\"channel9CORRECTIONrow9\":\"0.30\",\"channel9UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"100.1\",\"channel9CORRECTIONrow10\":\"-0.10\",\"channel9UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.040\",\"channel9UUCrow11\":\"150.2\",\"channel9CORRECTIONrow11\":\"-0.16\",\"channel9UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.000\",\"channel9UUCrow12\":\"199\",\"channel9CORRECTIONrow12\":\"1.00\",\"channel9UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow13\":\"230\",\"channel9STANDARDrow13\":\"229.980\",\"channel9UUCrow13\":\"229.0\",\"channel9CORRECTIONrow13\":\"0.98\",\"channel9UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.000\",\"channel10UUCrow1\":\"-39.6\",\"channel10CORRECTIONrow1\":\"-0.40\",\"channel10UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.000\",\"channel10UUCrow2\":\"-19.6\",\"channel10CORRECTIONrow2\":\"-0.40\",\"channel10UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.000\",\"channel10UUCrow3\":\"-9.7\",\"channel10CORRECTIONrow3\":\"-0.30\",\"channel10UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"0.000\",\"channel10UUCrow4\":\"0.1\",\"channel10CORRECTIONrow4\":\"-0.10\",\"channel10UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"10\",\"channel10CORRECTIONrow5\":\"0.00\",\"channel10UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"20.1\",\"channel10CORRECTIONrow6\":\"-0.10\",\"channel10UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"37\",\"channel10CORRECTIONrow7\":\"0.00\",\"channel10UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.8\",\"channel10CORRECTIONrow8\":\"0.20\",\"channel10UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.7\",\"channel10CORRECTIONrow9\":\"0.30\",\"channel10UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"100.3\",\"channel10CORRECTIONrow10\":\"-0.30\",\"channel10UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.040\",\"channel10UUCrow11\":\"150.4\",\"channel10CORRECTIONrow11\":\"-0.36\",\"channel10UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.000\",\"channel10UUCrow12\":\"199.1\",\"channel10CORRECTIONrow12\":\"0.90\",\"channel10UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow13\":\"230\",\"channel10STANDARDrow13\":\"229.980\",\"channel10UUCrow13\":\"229.0\",\"channel10CORRECTIONrow13\":\"0.98\",\"channel10UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.000\",\"channel11UUCrow1\":\"-39.6\",\"channel11CORRECTIONrow1\":\"-0.40\",\"channel11UNCERTAINTYrow1\":\"1.1\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.000\",\"channel11UUCrow2\":\"-19.8\",\"channel11CORRECTIONrow2\":\"-0.20\",\"channel11UNCERTAINTYrow2\":\"1.1\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.000\",\"channel11UUCrow3\":\"-10\",\"channel11CORRECTIONrow3\":\"0.00\",\"channel11UNCERTAINTYrow3\":\"1.1\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"0.000\",\"channel11UUCrow4\":\"0\",\"channel11CORRECTIONrow4\":\"0.00\",\"channel11UNCERTAINTYrow4\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"9.9\",\"channel11CORRECTIONrow5\":\"0.10\",\"channel11UNCERTAINTYrow5\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"20\",\"channel11CORRECTIONrow6\":\"0.00\",\"channel11UNCERTAINTYrow6\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"37.1\",\"channel11CORRECTIONrow7\":\"-0.10\",\"channel11UNCERTAINTYrow7\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.8\",\"channel11CORRECTIONrow8\":\"0.20\",\"channel11UNCERTAINTYrow8\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.9\",\"channel11CORRECTIONrow9\":\"0.10\",\"channel11UNCERTAINTYrow9\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"100.3\",\"channel11CORRECTIONrow10\":\"-0.30\",\"channel11UNCERTAINTYrow10\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"150.4\",\"channel11CORRECTIONrow11\":\"-0.40\",\"channel11UNCERTAINTYrow11\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.000\",\"channel11UUCrow12\":\"199.2\",\"channel11CORRECTIONrow12\":\"0.80\",\"channel11UNCERTAINTYrow12\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow13\":\"230\",\"channel11STANDARDrow13\":\"230.000\",\"channel11UUCrow13\":\"228.9\",\"channel11CORRECTIONrow13\":\"1.10\",\"channel11UNCERTAINTYrow13\":\"1.3\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.000\",\"channel12UUCrow1\":\"-39.6\",\"channel12CORRECTIONrow1\":\"-0.40\",\"channel12UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.000\",\"channel12UUCrow2\":\"-19.8\",\"channel12CORRECTIONrow2\":\"-0.20\",\"channel12UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.000\",\"channel12UUCrow3\":\"-10.2\",\"channel12CORRECTIONrow3\":\"0.20\",\"channel12UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"0.000\",\"channel12UUCrow4\":\"-0.1\",\"channel12CORRECTIONrow4\":\"0.10\",\"channel12UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"9.9\",\"channel12CORRECTIONrow5\":\"0.10\",\"channel12UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.9\",\"channel12CORRECTIONrow6\":\"0.10\",\"channel12UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"37.1\",\"channel12CORRECTIONrow7\":\"-0.10\",\"channel12UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.8\",\"channel12CORRECTIONrow8\":\"0.20\",\"channel12UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.8\",\"channel12CORRECTIONrow9\":\"0.20\",\"channel12UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"100.2\",\"channel12CORRECTIONrow10\":\"-0.20\",\"channel12UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.040\",\"channel12UUCrow11\":\"150.4\",\"channel12CORRECTIONrow11\":\"-0.36\",\"channel12UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.000\",\"channel12UUCrow12\":\"199.1\",\"channel12CORRECTIONrow12\":\"0.90\",\"channel12UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow13\":\"230\",\"channel12STANDARDrow13\":\"229.980\",\"channel12UUCrow13\":\"228.8\",\"channel12CORRECTIONrow13\":\"1.18\",\"channel12UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow1\":\"-40\",\"channel13STANDARDrow1\":\"-40.000\",\"channel13UUCrow1\":\"-39.6\",\"channel13CORRECTIONrow1\":\"-0.40\",\"channel13UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow2\":\"-20\",\"channel13STANDARDrow2\":\"-20.000\",\"channel13UUCrow2\":\"-19.7\",\"channel13CORRECTIONrow2\":\"-0.30\",\"channel13UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow3\":\"-10\",\"channel13STANDARDrow3\":\"-10.000\",\"channel13UUCrow3\":\"-10.2\",\"channel13CORRECTIONrow3\":\"0.20\",\"channel13UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow4\":\"0\",\"channel13STANDARDrow4\":\"0.000\",\"channel13UUCrow4\":\"-0.1\",\"channel13CORRECTIONrow4\":\"0.10\",\"channel13UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow5\":\"10\",\"channel13STANDARDrow5\":\"10.000\",\"channel13UUCrow5\":\"9.9\",\"channel13CORRECTIONrow5\":\"0.10\",\"channel13UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow6\":\"20\",\"channel13STANDARDrow6\":\"20.000\",\"channel13UUCrow6\":\"20\",\"channel13CORRECTIONrow6\":\"0.00\",\"channel13UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow7\":\"37\",\"channel13STANDARDrow7\":\"37.000\",\"channel13UUCrow7\":\"37.1\",\"channel13CORRECTIONrow7\":\"-0.10\",\"channel13UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow8\":\"50\",\"channel13STANDARDrow8\":\"50.000\",\"channel13UUCrow8\":\"49.8\",\"channel13CORRECTIONrow8\":\"0.20\",\"channel13UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow9\":\"75\",\"channel13STANDARDrow9\":\"75.000\",\"channel13UUCrow9\":\"74.9\",\"channel13CORRECTIONrow9\":\"0.10\",\"channel13UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow10\":\"100\",\"channel13STANDARDrow10\":\"100.000\",\"channel13UUCrow10\":\"100.3\",\"channel13CORRECTIONrow10\":\"-0.30\",\"channel13UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow11\":\"150\",\"channel13STANDARDrow11\":\"150.040\",\"channel13UUCrow11\":\"150.4\",\"channel13CORRECTIONrow11\":\"-0.36\",\"channel13UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow12\":\"200\",\"channel13STANDARDrow12\":\"200.000\",\"channel13UUCrow12\":\"199.1\",\"channel13CORRECTIONrow12\":\"0.90\",\"channel13UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow13\":\"230\",\"channel13STANDARDrow13\":\"229.980\",\"channel13UUCrow13\":\"228.8\",\"channel13CORRECTIONrow13\":\"1.18\",\"channel13UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow1\":\"-40\",\"channel14STANDARDrow1\":\"-40.000\",\"channel14UUCrow1\":\"-39.6\",\"channel14CORRECTIONrow1\":\"-0.40\",\"channel14UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow2\":\"-20\",\"channel14STANDARDrow2\":\"-20.000\",\"channel14UUCrow2\":\"-19.8\",\"channel14CORRECTIONrow2\":\"-0.20\",\"channel14UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow3\":\"-10\",\"channel14STANDARDrow3\":\"-10.000\",\"channel14UUCrow3\":\"-10.1\",\"channel14CORRECTIONrow3\":\"0.10\",\"channel14UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow4\":\"0\",\"channel14STANDARDrow4\":\"0.000\",\"channel14UUCrow4\":\"-0.1\",\"channel14CORRECTIONrow4\":\"0.10\",\"channel14UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow5\":\"10\",\"channel14STANDARDrow5\":\"10.000\",\"channel14UUCrow5\":\"9.8\",\"channel14CORRECTIONrow5\":\"0.20\",\"channel14UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow6\":\"20\",\"channel14STANDARDrow6\":\"20.000\",\"channel14UUCrow6\":\"19.9\",\"channel14CORRECTIONrow6\":\"0.10\",\"channel14UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow7\":\"37\",\"channel14STANDARDrow7\":\"37.000\",\"channel14UUCrow7\":\"37.1\",\"channel14CORRECTIONrow7\":\"-0.10\",\"channel14UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow8\":\"50\",\"channel14STANDARDrow8\":\"50.000\",\"channel14UUCrow8\":\"49.8\",\"channel14CORRECTIONrow8\":\"0.20\",\"channel14UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow9\":\"75\",\"channel14STANDARDrow9\":\"75.000\",\"channel14UUCrow9\":\"74.9\",\"channel14CORRECTIONrow9\":\"0.10\",\"channel14UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow10\":\"100\",\"channel14STANDARDrow10\":\"100.000\",\"channel14UUCrow10\":\"100.3\",\"channel14CORRECTIONrow10\":\"-0.30\",\"channel14UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow11\":\"150\",\"channel14STANDARDrow11\":\"150.040\",\"channel14UUCrow11\":\"150.4\",\"channel14CORRECTIONrow11\":\"-0.36\",\"channel14UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow12\":\"200\",\"channel14STANDARDrow12\":\"200.000\",\"channel14UUCrow12\":\"199\",\"channel14CORRECTIONrow12\":\"1.00\",\"channel14UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow13\":\"230\",\"channel14STANDARDrow13\":\"229.980\",\"channel14UUCrow13\":\"228.6\",\"channel14CORRECTIONrow13\":\"1.38\",\"channel14UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow1\":\"-40\",\"channel15STANDARDrow1\":\"-40.000\",\"channel15UUCrow1\":\"-39.7\",\"channel15CORRECTIONrow1\":\"-0.30\",\"channel15UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow2\":\"-20\",\"channel15STANDARDrow2\":\"-20.000\",\"channel15UUCrow2\":\"-19.8\",\"channel15CORRECTIONrow2\":\"-0.20\",\"channel15UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow3\":\"-10\",\"channel15STANDARDrow3\":\"-10.000\",\"channel15UUCrow3\":\"-10.1\",\"channel15CORRECTIONrow3\":\"0.10\",\"channel15UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow4\":\"0\",\"channel15STANDARDrow4\":\"0.000\",\"channel15UUCrow4\":\"-0.3\",\"channel15CORRECTIONrow4\":\"0.30\",\"channel15UNCERTAINTYrow4\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow5\":\"10\",\"channel15STANDARDrow5\":\"10.000\",\"channel15UUCrow5\":\"9.7\",\"channel15CORRECTIONrow5\":\"0.30\",\"channel15UNCERTAINTYrow5\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow6\":\"20\",\"channel15STANDARDrow6\":\"20.000\",\"channel15UUCrow6\":\"19.8\",\"channel15CORRECTIONrow6\":\"0.20\",\"channel15UNCERTAINTYrow6\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow7\":\"37\",\"channel15STANDARDrow7\":\"37.000\",\"channel15UUCrow7\":\"37\",\"channel15CORRECTIONrow7\":\"0.00\",\"channel15UNCERTAINTYrow7\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow8\":\"50\",\"channel15STANDARDrow8\":\"50.000\",\"channel15UUCrow8\":\"49.7\",\"channel15CORRECTIONrow8\":\"0.30\",\"channel15UNCERTAINTYrow8\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow9\":\"75\",\"channel15STANDARDrow9\":\"75.000\",\"channel15UUCrow9\":\"74.9\",\"channel15CORRECTIONrow9\":\"0.10\",\"channel15UNCERTAINTYrow9\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow10\":\"100\",\"channel15STANDARDrow10\":\"100.000\",\"channel15UUCrow10\":\"100.3\",\"channel15CORRECTIONrow10\":\"-0.30\",\"channel15UNCERTAINTYrow10\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow11\":\"150\",\"channel15STANDARDrow11\":\"150.040\",\"channel15UUCrow11\":\"150.4\",\"channel15CORRECTIONrow11\":\"-0.36\",\"channel15UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow12\":\"200\",\"channel15STANDARDrow12\":\"200.000\",\"channel15UUCrow12\":\"199\",\"channel15CORRECTIONrow12\":\"1.00\",\"channel15UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow13\":\"230\",\"channel15STANDARDrow13\":\"229.980\",\"channel15UUCrow13\":\"228.7\",\"channel15CORRECTIONrow13\":\"1.28\",\"channel15UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow1\":\"-40\",\"channel16STANDARDrow1\":\"-40.000\",\"channel16UUCrow1\":\"-39.7\",\"channel16CORRECTIONrow1\":\"-0.30\",\"channel16UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow2\":\"-20\",\"channel16STANDARDrow2\":\"-20.000\",\"channel16UUCrow2\":\"-19.8\",\"channel16CORRECTIONrow2\":\"-0.20\",\"channel16UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow3\":\"-10\",\"channel16STANDARDrow3\":\"-10.000\",\"channel16UUCrow3\":\"-10.1\",\"channel16CORRECTIONrow3\":\"0.10\",\"channel16UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow4\":\"0\",\"channel16STANDARDrow4\":\"0.000\",\"channel16UUCrow4\":\"0.000\",\"channel16CORRECTIONrow4\":\"0.00\",\"channel16UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow5\":\"10\",\"channel16STANDARDrow5\":\"10.000\",\"channel16UUCrow5\":\"9.7\",\"channel16CORRECTIONrow5\":\"0.30\",\"channel16UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow6\":\"20\",\"channel16STANDARDrow6\":\"20.000\",\"channel16UUCrow6\":\"19.8\",\"channel16CORRECTIONrow6\":\"0.20\",\"channel16UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow7\":\"37\",\"channel16STANDARDrow7\":\"37.000\",\"channel16UUCrow7\":\"37\",\"channel16CORRECTIONrow7\":\"0.00\",\"channel16UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow8\":\"50\",\"channel16STANDARDrow8\":\"50.000\",\"channel16UUCrow8\":\"49.7\",\"channel16CORRECTIONrow8\":\"0.30\",\"channel16UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow9\":\"75\",\"channel16STANDARDrow9\":\"75.000\",\"channel16UUCrow9\":\"74.9\",\"channel16CORRECTIONrow9\":\"0.10\",\"channel16UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow10\":\"100\",\"channel16STANDARDrow10\":\"100.000\",\"channel16UUCrow10\":\"100.2\",\"channel16CORRECTIONrow10\":\"-0.20\",\"channel16UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow11\":\"150\",\"channel16STANDARDrow11\":\"150.040\",\"channel16UUCrow11\":\"150.4\",\"channel16CORRECTIONrow11\":\"-0.36\",\"channel16UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow12\":\"200\",\"channel16STANDARDrow12\":\"200.000\",\"channel16UUCrow12\":\"199\",\"channel16CORRECTIONrow12\":\"1.00\",\"channel16UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow13\":\"230\",\"channel16STANDARDrow13\":\"229.980\",\"channel16UUCrow13\":\"228.4\",\"channel16CORRECTIONrow13\":\"1.58\",\"channel16UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow1\":\"-40\",\"channel17STANDARDrow1\":\"-40.000\",\"channel17UUCrow1\":\"-39.8\",\"channel17CORRECTIONrow1\":\"-0.20\",\"channel17UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow2\":\"-20\",\"channel17STANDARDrow2\":\"-20.000\",\"channel17UUCrow2\":\"-19.8\",\"channel17CORRECTIONrow2\":\"-0.20\",\"channel17UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow3\":\"-10\",\"channel17STANDARDrow3\":\"-10.000\",\"channel17UUCrow3\":\"-10.2\",\"channel17CORRECTIONrow3\":\"0.20\",\"channel17UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow4\":\"0\",\"channel17STANDARDrow4\":\"0.000\",\"channel17UUCrow4\":\"-0.3\",\"channel17CORRECTIONrow4\":\"0.30\",\"channel17UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow5\":\"10\",\"channel17STANDARDrow5\":\"10.000\",\"channel17UUCrow5\":\"9.6\",\"channel17CORRECTIONrow5\":\"0.40\",\"channel17UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow6\":\"20\",\"channel17STANDARDrow6\":\"20.000\",\"channel17UUCrow6\":\"19.7\",\"channel17CORRECTIONrow6\":\"0.30\",\"channel17UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow7\":\"37\",\"channel17STANDARDrow7\":\"37.000\",\"channel17UUCrow7\":\"36.8\",\"channel17CORRECTIONrow7\":\"0.20\",\"channel17UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow8\":\"50\",\"channel17STANDARDrow8\":\"50.000\",\"channel17UUCrow8\":\"49.6\",\"channel17CORRECTIONrow8\":\"0.40\",\"channel17UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow9\":\"75\",\"channel17STANDARDrow9\":\"75.000\",\"channel17UUCrow9\":\"74.7\",\"channel17CORRECTIONrow9\":\"0.30\",\"channel17UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow10\":\"100\",\"channel17STANDARDrow10\":\"100.000\",\"channel17UUCrow10\":\"100.1\",\"channel17CORRECTIONrow10\":\"-0.10\",\"channel17UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow11\":\"150\",\"channel17STANDARDrow11\":\"150.040\",\"channel17UUCrow11\":\"150.2\",\"channel17CORRECTIONrow11\":\"-0.16\",\"channel17UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow12\":\"200\",\"channel17STANDARDrow12\":\"200.000\",\"channel17UUCrow12\":\"198.7\",\"channel17CORRECTIONrow12\":\"1.30\",\"channel17UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow13\":\"230\",\"channel17STANDARDrow13\":\"229.980\",\"channel17UUCrow13\":\"228.3\",\"channel17CORRECTIONrow13\":\"1.68\",\"channel17UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow1\":\"-40\",\"channel18STANDARDrow1\":\"-40.000\",\"channel18UUCrow1\":\"-39.8\",\"channel18CORRECTIONrow1\":\"-0.20\",\"channel18UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow2\":\"-20\",\"channel18STANDARDrow2\":\"-20.000\",\"channel18UUCrow2\":\"-19.7\",\"channel18CORRECTIONrow2\":\"-0.30\",\"channel18UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow3\":\"-10\",\"channel18STANDARDrow3\":\"-10.000\",\"channel18UUCrow3\":\"-9.7\",\"channel18CORRECTIONrow3\":\"-0.30\",\"channel18UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow4\":\"0\",\"channel18STANDARDrow4\":\"0.000\",\"channel18UUCrow4\":\"-0.3\",\"channel18CORRECTIONrow4\":\"0.30\",\"channel18UNCERTAINTYrow4\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow5\":\"10\",\"channel18STANDARDrow5\":\"10.000\",\"channel18UUCrow5\":\"9.6\",\"channel18CORRECTIONrow5\":\"0.40\",\"channel18UNCERTAINTYrow5\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow6\":\"20\",\"channel18STANDARDrow6\":\"20.000\",\"channel18UUCrow6\":\"19.7\",\"channel18CORRECTIONrow6\":\"0.30\",\"channel18UNCERTAINTYrow6\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow7\":\"37\",\"channel18STANDARDrow7\":\"37.000\",\"channel18UUCrow7\":\"36.8\",\"channel18CORRECTIONrow7\":\"0.20\",\"channel18UNCERTAINTYrow7\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow8\":\"50\",\"channel18STANDARDrow8\":\"50.000\",\"channel18UUCrow8\":\"49.5\",\"channel18CORRECTIONrow8\":\"0.50\",\"channel18UNCERTAINTYrow8\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow9\":\"75\",\"channel18STANDARDrow9\":\"75.000\",\"channel18UUCrow9\":\"74.7\",\"channel18CORRECTIONrow9\":\"0.30\",\"channel18UNCERTAINTYrow9\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow10\":\"100\",\"channel18STANDARDrow10\":\"100.000\",\"channel18UUCrow10\":\"100.1\",\"channel18CORRECTIONrow10\":\"-0.10\",\"channel18UNCERTAINTYrow10\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow11\":\"150\",\"channel18STANDARDrow11\":\"150.040\",\"channel18UUCrow11\":\"150.3\",\"channel18CORRECTIONrow11\":\"-0.26\",\"channel18UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow12\":\"200\",\"channel18STANDARDrow12\":\"200.000\",\"channel18UUCrow12\":\"198.8\",\"channel18CORRECTIONrow12\":\"1.20\",\"channel18UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow13\":\"230\",\"channel18STANDARDrow13\":\"229.980\",\"channel18UUCrow13\":\"228.2\",\"channel18CORRECTIONrow13\":\"1.78\",\"channel18UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow1\":\"-40\",\"channel19STANDARDrow1\":\"-40.000\",\"channel19UUCrow1\":\"-39.6\",\"channel19CORRECTIONrow1\":\"-0.40\",\"channel19UNCERTAINTYrow1\":\"0.54\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow2\":\"-20\",\"channel19STANDARDrow2\":\"-20.000\",\"channel19UUCrow2\":\"-19.8\",\"channel19CORRECTIONrow2\":\"-0.20\",\"channel19UNCERTAINTYrow2\":\"0.54\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow3\":\"-10\",\"channel19STANDARDrow3\":\"-10.000\",\"channel19UUCrow3\":\"-10.1\",\"channel19CORRECTIONrow3\":\"0.10\",\"channel19UNCERTAINTYrow3\":\"0.54\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow4\":\"0\",\"channel19STANDARDrow4\":\"0.000\",\"channel19UUCrow4\":\"-0.3\",\"channel19CORRECTIONrow4\":\"0.30\",\"channel19UNCERTAINTYrow4\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow5\":\"10\",\"channel19STANDARDrow5\":\"10.000\",\"channel19UUCrow5\":\"9.7\",\"channel19CORRECTIONrow5\":\"0.30\",\"channel19UNCERTAINTYrow5\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow6\":\"20\",\"channel19STANDARDrow6\":\"20.000\",\"channel19UUCrow6\":\"19.8\",\"channel19CORRECTIONrow6\":\"0.20\",\"channel19UNCERTAINTYrow6\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow7\":\"37\",\"channel19STANDARDrow7\":\"37.000\",\"channel19UUCrow7\":\"37.0\",\"channel19CORRECTIONrow7\":\"0.00\",\"channel19UNCERTAINTYrow7\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow8\":\"50\",\"channel19STANDARDrow8\":\"50.000\",\"channel19UUCrow8\":\"49.6\",\"channel19CORRECTIONrow8\":\"0.40\",\"channel19UNCERTAINTYrow8\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow9\":\"75\",\"channel19STANDARDrow9\":\"75.000\",\"channel19UUCrow9\":\"74.8\",\"channel19CORRECTIONrow9\":\"0.20\",\"channel19UNCERTAINTYrow9\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow10\":\"100\",\"channel19STANDARDrow10\":\"100.000\",\"channel19UUCrow10\":\"100.2\",\"channel19CORRECTIONrow10\":\"-0.20\",\"channel19UNCERTAINTYrow10\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow11\":\"150\",\"channel19STANDARDrow11\":\"150.040\",\"channel19UUCrow11\":\"150.5\",\"channel19CORRECTIONrow11\":\"-0.46\",\"channel19UNCERTAINTYrow11\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow12\":\"200\",\"channel19STANDARDrow12\":\"200.000\",\"channel19UUCrow12\":\"198.7\",\"channel19CORRECTIONrow12\":\"1.30\",\"channel19UNCERTAINTYrow12\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow13\":\"230\",\"channel19STANDARDrow13\":\"229.980\",\"channel19UUCrow13\":\"228.3\",\"channel19CORRECTIONrow13\":\"1.68\",\"channel19UNCERTAINTYrow13\":\"0.87\"}],[{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow1\":\"-40\",\"channel20STANDARDrow1\":\"-40.000\",\"channel20UUCrow1\":\"-39.5\",\"channel20CORRECTIONrow1\":\"-0.50\",\"channel20UNCERTAINTYrow1\":\"0.75\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow2\":\"-20\",\"channel20STANDARDrow2\":\"-20.000\",\"channel20UUCrow2\":\"-20.9\",\"channel20CORRECTIONrow2\":\"0.90\",\"channel20UNCERTAINTYrow2\":\"0.75\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow3\":\"-10\",\"channel20STANDARDrow3\":\"-10.000\",\"channel20UUCrow3\":\"-11.2\",\"channel20CORRECTIONrow3\":\"1.20\",\"channel20UNCERTAINTYrow3\":\"0.75\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow4\":\"0\",\"channel20STANDARDrow4\":\"0.000\",\"channel20UUCrow4\":\"-0.5\",\"channel20CORRECTIONrow4\":\"0.50\",\"channel20UNCERTAINTYrow4\":\"1.00\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow5\":\"10\",\"channel20STANDARDrow5\":\"10.000\",\"channel20UUCrow5\":\"9.5\",\"channel20CORRECTIONrow5\":\"0.50\",\"channel20UNCERTAINTYrow5\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow6\":\"20\",\"channel20STANDARDrow6\":\"20.000\",\"channel20UUCrow6\":\"19.7\",\"channel20CORRECTIONrow6\":\"0.30\",\"channel20UNCERTAINTYrow6\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow7\":\"37\",\"channel20STANDARDrow7\":\"37.000\",\"channel20UUCrow7\":\"36.9\",\"channel20CORRECTIONrow7\":\"0.10\",\"channel20UNCERTAINTYrow7\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow8\":\"50\",\"channel20STANDARDrow8\":\"50.000\",\"channel20UUCrow8\":\"49.7\",\"channel20CORRECTIONrow8\":\"0.30\",\"channel20UNCERTAINTYrow8\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow9\":\"75\",\"channel20STANDARDrow9\":\"75.000\",\"channel20UUCrow9\":\"74.9\",\"channel20CORRECTIONrow9\":\"0.10\",\"channel20UNCERTAINTYrow9\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow10\":\"100\",\"channel20STANDARDrow10\":\"100.000\",\"channel20UUCrow10\":\"100.4\",\"channel20CORRECTIONrow10\":\"-0.40\",\"channel20UNCERTAINTYrow10\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow11\":\"150\",\"channel20STANDARDrow11\":\"150.040\",\"channel20UUCrow11\":\"151.1\",\"channel20CORRECTIONrow11\":\"-1.06\",\"channel20UNCERTAINTYrow11\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow12\":\"200\",\"channel20STANDARDrow12\":\"200.000\",\"channel20UUCrow12\":\"198.7\",\"channel20CORRECTIONrow12\":\"1.30\",\"channel20UNCERTAINTYrow12\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow13\":\"230\",\"channel20STANDARDrow13\":\"230.000\",\"channel20UUCrow13\":\"228.3\",\"channel20CORRECTIONrow13\":\"1.70\",\"channel20UNCERTAINTYrow13\":\"1.0\"}]]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(38, 'Ellab', '2023-215-TMP-078-05 to 025', 'Wireless Temperature Logger (ALL ELLAB)', 'NML (Philippines)  through DOST-CALABARZON RML', 'Ellab', 'Tracksense Pro Compact; Pro X Logger', '2023-08-20', NULL, NULL, NULL, NULL, NULL, '0.34', '[[{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow1\":\"0.000\",\"channel1STANDARDrow1\":\"0.000\",\"channel1UUCrow1\":\"-0.03\",\"channel1PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel1CORRECTIONrow1\":\"0.03\",\"channel1UNCERTAINTYrow1\":\"0.18\",\"channel1DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow2\":\"-30.010\",\"channel1STANDARDrow2\":\"-30.010\",\"channel1UUCrow2\":\"-30.03\",\"channel1PREVIOUSCORRECTIONrow2\":\"0.05\",\"channel1CORRECTIONrow2\":\"0.02\",\"channel1UNCERTAINTYrow2\":\"0.18\",\"channel1DRIFTrow2\":\"0.030000000000000002\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow3\":\"-20.000\",\"channel1STANDARDrow3\":\"-20.000\",\"channel1UUCrow3\":\"-20.03\",\"channel1PREVIOUSCORRECTIONrow3\":\"0.06\",\"channel1CORRECTIONrow3\":\"0.03\",\"channel1UNCERTAINTYrow3\":\"0.18\",\"channel1DRIFTrow3\":\"0.03\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow4\":\"-10.010\",\"channel1STANDARDrow4\":\"-10.010\",\"channel1UUCrow4\":\"-10.03\",\"channel1PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel1CORRECTIONrow4\":\"0.02\",\"channel1UNCERTAINTYrow4\":\"0.18\",\"channel1DRIFTrow4\":\"0.06\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow5\":\"10.000\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"9.98\",\"channel1PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel1CORRECTIONrow5\":\"0.02\",\"channel1UNCERTAINTYrow5\":\"0.18\",\"channel1DRIFTrow5\":\"0.030000000000000002\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow6\":\"20.000\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"19.97\",\"channel1PREVIOUSCORRECTIONrow6\":\"0.04\",\"channel1CORRECTIONrow6\":\"0.03\",\"channel1UNCERTAINTYrow6\":\"0.18\",\"channel1DRIFTrow6\":\"0.010000000000000002\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow7\":\"37.000\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"36.97\",\"channel1PREVIOUSCORRECTIONrow7\":\"0.04\",\"channel1CORRECTIONrow7\":\"0.03\",\"channel1UNCERTAINTYrow7\":\"0.18\",\"channel1DRIFTrow7\":\"0.010000000000000002\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow8\":\"50.000\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"49.97\",\"channel1PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel1CORRECTIONrow8\":\"0.03\",\"channel1UNCERTAINTYrow8\":\"0.18\",\"channel1DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow9\":\"75.000\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"74.94\",\"channel1PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel1CORRECTIONrow9\":\"0.06\",\"channel1UNCERTAINTYrow9\":\"0.18\",\"channel1DRIFTrow9\":\"0.019999999999999997\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow10\":\"100.000\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"99.94\",\"channel1PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel1CORRECTIONrow10\":\"0.06\",\"channel1UNCERTAINTYrow10\":\"0.18\",\"channel1DRIFTrow10\":\"0.009999999999999995\"},{\"channelName\":\"424923\",\"channelNumber\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow11\":\"125.000\",\"channel1STANDARDrow11\":\"125.000\",\"channel1UUCrow11\":\"124.95\",\"channel1PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel1CORRECTIONrow11\":\"0.05\",\"channel1UNCERTAINTYrow11\":\"0.23\",\"channel1DRIFTrow11\":\"0\"}],[{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow1\":\"0.000\",\"channel2STANDARDrow1\":\"0.000\",\"channel2UUCrow1\":\"-0.18\",\"channel2PREVIOUSCORRECTIONrow1\":\"0.19\",\"channel2CORRECTIONrow1\":\"0.18\",\"channel2UNCERTAINTYrow1\":\"0.18\",\"channel2DRIFTrow1\":\"0.010000000000000009\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow2\":\"-30.010\",\"channel2STANDARDrow2\":\"-30.010\",\"channel2UUCrow2\":\"-30.20\",\"channel2PREVIOUSCORRECTIONrow2\":\"0.19\",\"channel2CORRECTIONrow2\":\"0.19\",\"channel2UNCERTAINTYrow2\":\"0.18\",\"channel2DRIFTrow2\":\"0\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow3\":\"-20.000\",\"channel2STANDARDrow3\":\"-20.000\",\"channel2UUCrow3\":\"-20.18\",\"channel2PREVIOUSCORRECTIONrow3\":\"0.20\",\"channel2CORRECTIONrow3\":\"0.18\",\"channel2UNCERTAINTYrow3\":\"0.18\",\"channel2DRIFTrow3\":\"0.020000000000000018\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow4\":\"-10.010\",\"channel2STANDARDrow4\":\"-10.010\",\"channel2UUCrow4\":\"-10.19\",\"channel2PREVIOUSCORRECTIONrow4\":\"0.22\",\"channel2CORRECTIONrow4\":\"0.18\",\"channel2UNCERTAINTYrow4\":\"0.18\",\"channel2DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow5\":\"10.000\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"9.82\",\"channel2PREVIOUSCORRECTIONrow5\":\"0.19\",\"channel2CORRECTIONrow5\":\"0.18\",\"channel2UNCERTAINTYrow5\":\"0.18\",\"channel2DRIFTrow5\":\"0.010000000000000009\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow6\":\"20.000\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"19.82\",\"channel2PREVIOUSCORRECTIONrow6\":\"0.18\",\"channel2CORRECTIONrow6\":\"0.18\",\"channel2UNCERTAINTYrow6\":\"0.18\",\"channel2DRIFTrow6\":\"0\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow7\":\"36.990\",\"channel2STANDARDrow7\":\"36.990\",\"channel2UUCrow7\":\"36.81\",\"channel2PREVIOUSCORRECTIONrow7\":\"0.17\",\"channel2CORRECTIONrow7\":\"0.18\",\"channel2UNCERTAINTYrow7\":\"0.18\",\"channel2DRIFTrow7\":\"0.009999999999999981\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow8\":\"50.000\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"49.81\",\"channel2PREVIOUSCORRECTIONrow8\":\"0.16\",\"channel2CORRECTIONrow8\":\"0.19\",\"channel2UNCERTAINTYrow8\":\"0.18\",\"channel2DRIFTrow8\":\"0.03\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow9\":\"75.000\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"74.80\",\"channel2PREVIOUSCORRECTIONrow9\":\"0.19\",\"channel2CORRECTIONrow9\":\"0.20\",\"channel2UNCERTAINTYrow9\":\"0.18\",\"channel2DRIFTrow9\":\"0.010000000000000009\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow10\":\"100.000\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"99.79\",\"channel2PREVIOUSCORRECTIONrow10\":\"0.21\",\"channel2CORRECTIONrow10\":\"0.21\",\"channel2UNCERTAINTYrow10\":\"0.18\",\"channel2DRIFTrow10\":\"0\"},{\"channelName\":\"398961\",\"channelNumber\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow11\":\"124.990\",\"channel2STANDARDrow11\":\"124.990\",\"channel2UUCrow11\":\"124.79\",\"channel2PREVIOUSCORRECTIONrow11\":\"0.21\",\"channel2CORRECTIONrow11\":\"0.20\",\"channel2UNCERTAINTYrow11\":\"0.23\",\"channel2DRIFTrow11\":\"0.009999999999999981\"}],[{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow1\":\"0.000\",\"channel3STANDARDrow1\":\"0.000\",\"channel3UUCrow1\":\"-0.03\",\"channel3PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel3CORRECTIONrow1\":\"0.03\",\"channel3UNCERTAINTYrow1\":\"0.18\",\"channel3DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow2\":\"-30.010\",\"channel3STANDARDrow2\":\"-30.010\",\"channel3UUCrow2\":\"-30.04\",\"channel3PREVIOUSCORRECTIONrow2\":\"0.03\",\"channel3CORRECTIONrow2\":\"0.03\",\"channel3UNCERTAINTYrow2\":\"0.18\",\"channel3DRIFTrow2\":\"0\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow3\":\"-20.010\",\"channel3STANDARDrow3\":\"-20.010\",\"channel3UUCrow3\":\"-20.03\",\"channel3PREVIOUSCORRECTIONrow3\":\"0.05\",\"channel3CORRECTIONrow3\":\"0.02\",\"channel3UNCERTAINTYrow3\":\"0.18\",\"channel3DRIFTrow3\":\"0.030000000000000002\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow4\":\"-10.020\",\"channel3STANDARDrow4\":\"-10.020\",\"channel3UUCrow4\":\"-10.05\",\"channel3PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel3CORRECTIONrow4\":\"0.03\",\"channel3UNCERTAINTYrow4\":\"0.18\",\"channel3DRIFTrow4\":\"0.03\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow5\":\"10.000\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"9.97\",\"channel3PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel3CORRECTIONrow5\":\"0.03\",\"channel3UNCERTAINTYrow5\":\"0.18\",\"channel3DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow6\":\"20.000\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"19.96\",\"channel3PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel3CORRECTIONrow6\":\"0.04\",\"channel3UNCERTAINTYrow6\":\"0.18\",\"channel3DRIFTrow6\":\"0.010000000000000002\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow7\":\"36.990\",\"channel3STANDARDrow7\":\"36.990\",\"channel3UUCrow7\":\"36.95\",\"channel3PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel3CORRECTIONrow7\":\"0.04\",\"channel3UNCERTAINTYrow7\":\"0.18\",\"channel3DRIFTrow7\":\"0.010000000000000002\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow8\":\"50.000\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"49.97\",\"channel3PREVIOUSCORRECTIONrow8\":\"0.03\",\"channel3CORRECTIONrow8\":\"0.03\",\"channel3UNCERTAINTYrow8\":\"0.18\",\"channel3DRIFTrow8\":\"0\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow9\":\"75.000\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"74.95\",\"channel3PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel3CORRECTIONrow9\":\"0.05\",\"channel3UNCERTAINTYrow9\":\"0.18\",\"channel3DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow10\":\"100.010\",\"channel3STANDARDrow10\":\"100.010\",\"channel3UUCrow10\":\"99.98\",\"channel3PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel3CORRECTIONrow10\":\"0.03\",\"channel3UNCERTAINTYrow10\":\"0.18\",\"channel3DRIFTrow10\":\"0.04000000000000001\"},{\"channelName\":\"424933\",\"channelNumber\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow11\":\"125.000\",\"channel3STANDARDrow11\":\"125.000\",\"channel3UUCrow11\":\"124.99\",\"channel3PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel3CORRECTIONrow11\":\"0.01\",\"channel3UNCERTAINTYrow11\":\"0.23\",\"channel3DRIFTrow11\":\"0.04\"}],[{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow1\":\"0.000\",\"channel4STANDARDrow1\":\"0.000\",\"channel4UUCrow1\":\"-0.02\",\"channel4PREVIOUSCORRECTIONrow1\":\"0.03\",\"channel4CORRECTIONrow1\":\"0.02\",\"channel4UNCERTAINTYrow1\":\"0.18\",\"channel4DRIFTrow1\":\"0.009999999999999998\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow2\":\"-30.010\",\"channel4STANDARDrow2\":\"-30.010\",\"channel4UUCrow2\":\"-30.02\",\"channel4PREVIOUSCORRECTIONrow2\":\"0.05\",\"channel4CORRECTIONrow2\":\"0.01\",\"channel4UNCERTAINTYrow2\":\"0.18\",\"channel4DRIFTrow2\":\"0.04\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow3\":\"-20.000\",\"channel4STANDARDrow3\":\"-20.000\",\"channel4UUCrow3\":\"-20.04\",\"channel4PREVIOUSCORRECTIONrow3\":\"0.06\",\"channel4CORRECTIONrow3\":\"0.04\",\"channel4UNCERTAINTYrow3\":\"0.18\",\"channel4DRIFTrow3\":\"0.019999999999999997\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow4\":\"-10.010\",\"channel4STANDARDrow4\":\"-10.010\",\"channel4UUCrow4\":\"-10.03\",\"channel4PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel4CORRECTIONrow4\":\"0.02\",\"channel4UNCERTAINTYrow4\":\"0.18\",\"channel4DRIFTrow4\":\"0.039999999999999994\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow5\":\"10.000\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"9.99\",\"channel4PREVIOUSCORRECTIONrow5\":\"0.03\",\"channel4CORRECTIONrow5\":\"0.01\",\"channel4UNCERTAINTYrow5\":\"0.18\",\"channel4DRIFTrow5\":\"0.019999999999999997\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow6\":\"20.000\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"19.98\",\"channel4PREVIOUSCORRECTIONrow6\":\"0.02\",\"channel4CORRECTIONrow6\":\"0.02\",\"channel4UNCERTAINTYrow6\":\"0.18\",\"channel4DRIFTrow6\":\"0\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow7\":\"36.990\",\"channel4STANDARDrow7\":\"36.990\",\"channel4UUCrow7\":\"36.98\",\"channel4PREVIOUSCORRECTIONrow7\":\"0.01\",\"channel4CORRECTIONrow7\":\"0.01\",\"channel4UNCERTAINTYrow7\":\"0.18\",\"channel4DRIFTrow7\":\"0\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow8\":\"50.000\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.98\",\"channel4PREVIOUSCORRECTIONrow8\":\"0.02\",\"channel4CORRECTIONrow8\":\"0.02\",\"channel4UNCERTAINTYrow8\":\"0.18\",\"channel4DRIFTrow8\":\"0\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow9\":\"75.000\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.98\",\"channel4PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel4CORRECTIONrow9\":\"0.02\",\"channel4UNCERTAINTYrow9\":\"0.18\",\"channel4DRIFTrow9\":\"0.009999999999999998\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow10\":\"100.000\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"99.97\",\"channel4PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel4CORRECTIONrow10\":\"0.03\",\"channel4UNCERTAINTYrow10\":\"0.18\",\"channel4DRIFTrow10\":\"0.03\"},{\"channelName\":\"256899\",\"channelNumber\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow11\":\"125.000\",\"channel4STANDARDrow11\":\"125.000\",\"channel4UUCrow11\":\"124.99\",\"channel4PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel4CORRECTIONrow11\":\"0.01\",\"channel4UNCERTAINTYrow11\":\"0.23\",\"channel4DRIFTrow11\":\"0.03\"}],[{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow1\":\"-0.010\",\"channel5STANDARDrow1\":\"-0.010\",\"channel5UUCrow1\":\"-0.05\",\"channel5PREVIOUSCORRECTIONrow1\":\"0.05\",\"channel5CORRECTIONrow1\":\"0.04\",\"channel5UNCERTAINTYrow1\":\"0.18\",\"channel5DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow2\":\"-30.020\",\"channel5STANDARDrow2\":\"-30.020\",\"channel5UUCrow2\":\"-30.08\",\"channel5PREVIOUSCORRECTIONrow2\":\"0.06\",\"channel5CORRECTIONrow2\":\"0.06\",\"channel5UNCERTAINTYrow2\":\"0.18\",\"channel5DRIFTrow2\":\"0\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow3\":\"-20.000\",\"channel5STANDARDrow3\":\"-20.000\",\"channel5UUCrow3\":\"-20.05\",\"channel5PREVIOUSCORRECTIONrow3\":\"0.08\",\"channel5CORRECTIONrow3\":\"0.05\",\"channel5UNCERTAINTYrow3\":\"0.18\",\"channel5DRIFTrow3\":\"0.03\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow4\":\"-10.010\",\"channel5STANDARDrow4\":\"-10.010\",\"channel5UUCrow4\":\"-10.06\",\"channel5PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel5CORRECTIONrow4\":\"0.05\",\"channel5UNCERTAINTYrow4\":\"0.18\",\"channel5DRIFTrow4\":\"0.03\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow5\":\"10.000\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"9.96\",\"channel5PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel5CORRECTIONrow5\":\"0.04\",\"channel5UNCERTAINTYrow5\":\"0.18\",\"channel5DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow6\":\"20.000\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"19.96\",\"channel5PREVIOUSCORRECTIONrow6\":\"0.04\",\"channel5CORRECTIONrow6\":\"0.04\",\"channel5UNCERTAINTYrow6\":\"0.18\",\"channel5DRIFTrow6\":\"0\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow7\":\"36.990\",\"channel5STANDARDrow7\":\"36.990\",\"channel5UUCrow7\":\"36.95\",\"channel5PREVIOUSCORRECTIONrow7\":\"0.04\",\"channel5CORRECTIONrow7\":\"0.04\",\"channel5UNCERTAINTYrow7\":\"0.18\",\"channel5DRIFTrow7\":\"0\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow8\":\"50.000\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.95\",\"channel5PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel5CORRECTIONrow8\":\"0.05\",\"channel5UNCERTAINTYrow8\":\"0.18\",\"channel5DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow9\":\"75.000\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.96\",\"channel5PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel5CORRECTIONrow9\":\"0.04\",\"channel5UNCERTAINTYrow9\":\"0.18\",\"channel5DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow10\":\"100.000\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"99.98\",\"channel5PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel5CORRECTIONrow10\":\"0.02\",\"channel5UNCERTAINTYrow10\":\"0.18\",\"channel5DRIFTrow10\":\"0.039999999999999994\"},{\"channelName\":\"398964\",\"channelNumber\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow11\":\"124.990\",\"channel5STANDARDrow11\":\"124.990\",\"channel5UUCrow11\":\"124.91\",\"channel5PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel5CORRECTIONrow11\":\"0.08\",\"channel5UNCERTAINTYrow11\":\"0.23\",\"channel5DRIFTrow11\":\"0.03\"}],[{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow1\":\"0.000\",\"channel6STANDARDrow1\":\"0.000\",\"channel6UUCrow1\":\"-0.02\",\"channel6PREVIOUSCORRECTIONrow1\":\"0.03\",\"channel6CORRECTIONrow1\":\"0.02\",\"channel6UNCERTAINTYrow1\":\"0.18\",\"channel6DRIFTrow1\":\"0.009999999999999998\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow2\":\"-30.010\",\"channel6STANDARDrow2\":\"-30.010\",\"channel6UUCrow2\":\"-30.02\",\"channel6PREVIOUSCORRECTIONrow2\":\"0.06\",\"channel6CORRECTIONrow2\":\"0.01\",\"channel6UNCERTAINTYrow2\":\"0.18\",\"channel6DRIFTrow2\":\"0.049999999999999996\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow3\":\"-20.010\",\"channel6STANDARDrow3\":\"-20.010\",\"channel6UUCrow3\":\"-20.03\",\"channel6PREVIOUSCORRECTIONrow3\":\"0.08\",\"channel6CORRECTIONrow3\":\"0.02\",\"channel6UNCERTAINTYrow3\":\"0.18\",\"channel6DRIFTrow3\":\"0.06\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow4\":\"-10.020\",\"channel6STANDARDrow4\":\"-10.020\",\"channel6UUCrow4\":\"-10.04\",\"channel6PREVIOUSCORRECTIONrow4\":\"0.07\",\"channel6CORRECTIONrow4\":\"0.02\",\"channel6UNCERTAINTYrow4\":\"0.18\",\"channel6DRIFTrow4\":\"0.05\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow5\":\"10.000\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"9.99\",\"channel6PREVIOUSCORRECTIONrow5\":\"0.03\",\"channel6CORRECTIONrow5\":\"0.01\",\"channel6UNCERTAINTYrow5\":\"0.18\",\"channel6DRIFTrow5\":\"0.019999999999999997\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow6\":\"20.000\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"19.99\",\"channel6PREVIOUSCORRECTIONrow6\":\"0.02\",\"channel6CORRECTIONrow6\":\"0.01\",\"channel6UNCERTAINTYrow6\":\"0.18\",\"channel6DRIFTrow6\":\"0.01\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow7\":\"37.000\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.98\",\"channel6PREVIOUSCORRECTIONrow7\":\"0.01\",\"channel6CORRECTIONrow7\":\"0.02\",\"channel6UNCERTAINTYrow7\":\"0.18\",\"channel6DRIFTrow7\":\"0.01\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow8\":\"50.000\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.97\",\"channel6PREVIOUSCORRECTIONrow8\":\"0.02\",\"channel6CORRECTIONrow8\":\"0.03\",\"channel6UNCERTAINTYrow8\":\"0.18\",\"channel6DRIFTrow8\":\"0.009999999999999998\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow9\":\"75.000\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.97\",\"channel6PREVIOUSCORRECTIONrow9\":\"0.02\",\"channel6CORRECTIONrow9\":\"0.03\",\"channel6UNCERTAINTYrow9\":\"0.18\",\"channel6DRIFTrow9\":\"0.009999999999999998\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow10\":\"100.000\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"99.95\",\"channel6PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel6CORRECTIONrow10\":\"0.05\",\"channel6UNCERTAINTYrow10\":\"0.18\",\"channel6DRIFTrow10\":\"0\"},{\"channelName\":\"256882\",\"channelNumber\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow11\":\"125.000\",\"channel6STANDARDrow11\":\"125.000\",\"channel6UUCrow11\":\"124.96\",\"channel6PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel6CORRECTIONrow11\":\"0.04\",\"channel6UNCERTAINTYrow11\":\"0.23\",\"channel6DRIFTrow11\":\"0\"}],[{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow1\":\"-0.010\",\"channel7STANDARDrow1\":\"-0.010\",\"channel7UUCrow1\":\"-0.34\",\"channel7PREVIOUSCORRECTIONrow1\":\"0.34\",\"channel7CORRECTIONrow1\":\"0.33\",\"channel7UNCERTAINTYrow1\":\"0.18\",\"channel7DRIFTrow1\":\"0.010000000000000009\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow2\":\"-30.010\",\"channel7STANDARDrow2\":\"-30.010\",\"channel7UUCrow2\":\"-30.35\",\"channel7PREVIOUSCORRECTIONrow2\":\"0.33\",\"channel7CORRECTIONrow2\":\"0.34\",\"channel7UNCERTAINTYrow2\":\"0.18\",\"channel7DRIFTrow2\":\"0.010000000000000009\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow3\":\"-20.010\",\"channel7STANDARDrow3\":\"-20.010\",\"channel7UUCrow3\":\"-20.22\",\"channel7PREVIOUSCORRECTIONrow3\":\"0.35\",\"channel7CORRECTIONrow3\":\"0.21\",\"channel7UNCERTAINTYrow3\":\"0.34\",\"channel7DRIFTrow3\":\"0.13999999999999999\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow4\":\"-10.020\",\"channel7STANDARDrow4\":\"-10.020\",\"channel7UUCrow4\":\"-10.35\",\"channel7PREVIOUSCORRECTIONrow4\":\"0.37\",\"channel7CORRECTIONrow4\":\"0.33\",\"channel7UNCERTAINTYrow4\":\"0.18\",\"channel7DRIFTrow4\":\"0.03999999999999998\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow5\":\"10.000\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"9.65\",\"channel7PREVIOUSCORRECTIONrow5\":\"0.36\",\"channel7CORRECTIONrow5\":\"0.35\",\"channel7UNCERTAINTYrow5\":\"0.18\",\"channel7DRIFTrow5\":\"0.010000000000000009\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow6\":\"20.000\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"19.64\",\"channel7PREVIOUSCORRECTIONrow6\":\"0.36\",\"channel7CORRECTIONrow6\":\"0.36\",\"channel7UNCERTAINTYrow6\":\"0.18\",\"channel7DRIFTrow6\":\"0\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow7\":\"37.000\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"36.62\",\"channel7PREVIOUSCORRECTIONrow7\":\"0.36\",\"channel7CORRECTIONrow7\":\"0.38\",\"channel7UNCERTAINTYrow7\":\"0.18\",\"channel7DRIFTrow7\":\"0.020000000000000018\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow8\":\"50.000\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"49.61\",\"channel7PREVIOUSCORRECTIONrow8\":\"0.38\",\"channel7CORRECTIONrow8\":\"0.39\",\"channel7UNCERTAINTYrow8\":\"0.18\",\"channel7DRIFTrow8\":\"0.010000000000000009\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow9\":\"75.000\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"74.58\",\"channel7PREVIOUSCORRECTIONrow9\":\"0.41\",\"channel7CORRECTIONrow9\":\"0.42\",\"channel7UNCERTAINTYrow9\":\"0.18\",\"channel7DRIFTrow9\":\"0.010000000000000009\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow10\":\"100.000\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"99.55\",\"channel7PREVIOUSCORRECTIONrow10\":\"0.47\",\"channel7CORRECTIONrow10\":\"0.45\",\"channel7UNCERTAINTYrow10\":\"0.18\",\"channel7DRIFTrow10\":\"0.019999999999999962\"},{\"channelName\":\"398841\",\"channelNumber\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow11\":\"124.990\",\"channel7STANDARDrow11\":\"124.990\",\"channel7UUCrow11\":\"124.50\",\"channel7PREVIOUSCORRECTIONrow11\":\"0.48\",\"channel7CORRECTIONrow11\":\"0.49\",\"channel7UNCERTAINTYrow11\":\"0.23\",\"channel7DRIFTrow11\":\"0.010000000000000009\"}],[{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow1\":\"0.000\",\"channel8STANDARDrow1\":\"0.000\",\"channel8UUCrow1\":\"-0.04\",\"channel8PREVIOUSCORRECTIONrow1\":\"0.05\",\"channel8CORRECTIONrow1\":\"0.04\",\"channel8UNCERTAINTYrow1\":\"0.18\",\"channel8DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow2\":\"-30.010\",\"channel8STANDARDrow2\":\"-30.010\",\"channel8UUCrow2\":\"-30.05\",\"channel8PREVIOUSCORRECTIONrow2\":\"0.06\",\"channel8CORRECTIONrow2\":\"0.04\",\"channel8UNCERTAINTYrow2\":\"0.18\",\"channel8DRIFTrow2\":\"0.019999999999999997\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow3\":\"-20.010\",\"channel8STANDARDrow3\":\"-20.010\",\"channel8UUCrow3\":\"-20.05\",\"channel8PREVIOUSCORRECTIONrow3\":\"0.08\",\"channel8CORRECTIONrow3\":\"0.04\",\"channel8UNCERTAINTYrow3\":\"0.18\",\"channel8DRIFTrow3\":\"0.04\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow4\":\"-10.020\",\"channel8STANDARDrow4\":\"-10.020\",\"channel8UUCrow4\":\"-10.05\",\"channel8PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel8CORRECTIONrow4\":\"0.03\",\"channel8UNCERTAINTYrow4\":\"0.18\",\"channel8DRIFTrow4\":\"0.03\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow5\":\"10.000\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"9.97\",\"channel8PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel8CORRECTIONrow5\":\"0.03\",\"channel8UNCERTAINTYrow5\":\"0.18\",\"channel8DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow6\":\"20.000\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"19.97\",\"channel8PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel8CORRECTIONrow6\":\"0.03\",\"channel8UNCERTAINTYrow6\":\"0.18\",\"channel8DRIFTrow6\":\"0\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow7\":\"37.000\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"36.97\",\"channel8PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel8CORRECTIONrow7\":\"0.03\",\"channel8UNCERTAINTYrow7\":\"0.18\",\"channel8DRIFTrow7\":\"0\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow8\":\"50.000\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"49.95\",\"channel8PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel8CORRECTIONrow8\":\"0.05\",\"channel8UNCERTAINTYrow8\":\"0.18\",\"channel8DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow9\":\"75.000\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"74.96\",\"channel8PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel8CORRECTIONrow9\":\"0.04\",\"channel8UNCERTAINTYrow9\":\"0.18\",\"channel8DRIFTrow9\":\"0\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow10\":\"100.010\",\"channel8STANDARDrow10\":\"100.010\",\"channel8UUCrow10\":\"99.98\",\"channel8PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel8CORRECTIONrow10\":\"0.03\",\"channel8UNCERTAINTYrow10\":\"0.18\",\"channel8DRIFTrow10\":\"0.03\"},{\"channelName\":\"398825\",\"channelNumber\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow11\":\"125.000\",\"channel8STANDARDrow11\":\"125.000\",\"channel8UUCrow11\":\"124.97\",\"channel8PREVIOUSCORRECTIONrow11\":\"0.06\",\"channel8CORRECTIONrow11\":\"0.03\",\"channel8UNCERTAINTYrow11\":\"0.23\",\"channel8DRIFTrow11\":\"0.03\"}],[{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow1\":\"-0.010\",\"channel9STANDARDrow1\":\"-0.010\",\"channel9UUCrow1\":\"-0.04\",\"channel9PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel9CORRECTIONrow1\":\"0.03\",\"channel9UNCERTAINTYrow1\":\"0.18\",\"channel9DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow2\":\"-30.010\",\"channel9STANDARDrow2\":\"-30.010\",\"channel9UUCrow2\":\"-30.06\",\"channel9PREVIOUSCORRECTIONrow2\":\"0.07\",\"channel9CORRECTIONrow2\":\"0.05\",\"channel9UNCERTAINTYrow2\":\"0.18\",\"channel9DRIFTrow2\":\"0.020000000000000004\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow3\":\"-20.000\",\"channel9STANDARDrow3\":\"-20.000\",\"channel9UUCrow3\":\"-20.04\",\"channel9PREVIOUSCORRECTIONrow3\":\"0.00\",\"channel9CORRECTIONrow3\":\"0.04\",\"channel9UNCERTAINTYrow3\":\"0.18\",\"channel9DRIFTrow3\":\"0.04\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow4\":\"-10.020\",\"channel9STANDARDrow4\":\"-10.020\",\"channel9UUCrow4\":\"-10.05\",\"channel9PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel9CORRECTIONrow4\":\"0.03\",\"channel9UNCERTAINTYrow4\":\"0.18\",\"channel9DRIFTrow4\":\"0.05\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow5\":\"10.000\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"9.97\",\"channel9PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel9CORRECTIONrow5\":\"0.03\",\"channel9UNCERTAINTYrow5\":\"0.18\",\"channel9DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow6\":\"20.000\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"19.97\",\"channel9PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel9CORRECTIONrow6\":\"0.03\",\"channel9UNCERTAINTYrow6\":\"0.18\",\"channel9DRIFTrow6\":\"0\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow7\":\"37.000\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"36.97\",\"channel9PREVIOUSCORRECTIONrow7\":\"0.02\",\"channel9CORRECTIONrow7\":\"0.03\",\"channel9UNCERTAINTYrow7\":\"0.18\",\"channel9DRIFTrow7\":\"0.009999999999999998\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow8\":\"50.000\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"49.97\",\"channel9PREVIOUSCORRECTIONrow8\":\"0.03\",\"channel9CORRECTIONrow8\":\"0.03\",\"channel9UNCERTAINTYrow8\":\"0.18\",\"channel9DRIFTrow8\":\"0\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow9\":\"75.000\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"74.96\",\"channel9PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel9CORRECTIONrow9\":\"0.04\",\"channel9UNCERTAINTYrow9\":\"0.18\",\"channel9DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow10\":\"100.000\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"99.97\",\"channel9PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel9CORRECTIONrow10\":\"0.03\",\"channel9UNCERTAINTYrow10\":\"0.18\",\"channel9DRIFTrow10\":\"0.020000000000000004\"},{\"channelName\":\"398850\",\"channelNumber\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow11\":\"125.000\",\"channel9STANDARDrow11\":\"125.000\",\"channel9UUCrow11\":\"124.95\",\"channel9PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel9CORRECTIONrow11\":\"0.05\",\"channel9UNCERTAINTYrow11\":\"0.23\",\"channel9DRIFTrow11\":\"0.010000000000000002\"}],[{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow1\":\"-0.010\",\"channel10STANDARDrow1\":\"-0.010\",\"channel10UUCrow1\":\"-0.07\",\"channel10PREVIOUSCORRECTIONrow1\":\"0.07\",\"channel10CORRECTIONrow1\":\"0.06\",\"channel10UNCERTAINTYrow1\":\"0.18\",\"channel10DRIFTrow1\":\"0.010000000000000009\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow2\":\"-30.010\",\"channel10STANDARDrow2\":\"-30.010\",\"channel10UUCrow2\":\"-30.11\",\"channel10PREVIOUSCORRECTIONrow2\":\"0.09\",\"channel10CORRECTIONrow2\":\"0.10\",\"channel10UNCERTAINTYrow2\":\"0.18\",\"channel10DRIFTrow2\":\"0.010000000000000009\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow3\":\"-20.010\",\"channel10STANDARDrow3\":\"-20.010\",\"channel10UUCrow3\":\"-20.07\",\"channel10PREVIOUSCORRECTIONrow3\":\"0.10\",\"channel10CORRECTIONrow3\":\"0.05\",\"channel10UNCERTAINTYrow3\":\"0.18\",\"channel10DRIFTrow3\":\"0.05\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow4\":\"-10.020\",\"channel10STANDARDrow4\":\"-10.020\",\"channel10UUCrow4\":\"-10.07\",\"channel10PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel10CORRECTIONrow4\":\"0.05\",\"channel10UNCERTAINTYrow4\":\"0.18\",\"channel10DRIFTrow4\":\"0.03\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow5\":\"10.000\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"9.95\",\"channel10PREVIOUSCORRECTIONrow5\":\"0.07\",\"channel10CORRECTIONrow5\":\"0.05\",\"channel10UNCERTAINTYrow5\":\"0.18\",\"channel10DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow6\":\"20.000\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"19.95\",\"channel10PREVIOUSCORRECTIONrow6\":\"0.05\",\"channel10CORRECTIONrow6\":\"0.05\",\"channel10UNCERTAINTYrow6\":\"0.18\",\"channel10DRIFTrow6\":\"0\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow7\":\"36.990\",\"channel10STANDARDrow7\":\"36.990\",\"channel10UUCrow7\":\"36.94\",\"channel10PREVIOUSCORRECTIONrow7\":\"0.05\",\"channel10CORRECTIONrow7\":\"0.05\",\"channel10UNCERTAINTYrow7\":\"0.18\",\"channel10DRIFTrow7\":\"0\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow8\":\"50.000\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.95\",\"channel10PREVIOUSCORRECTIONrow8\":\"0.05\",\"channel10CORRECTIONrow8\":\"0.05\",\"channel10UNCERTAINTYrow8\":\"0.18\",\"channel10DRIFTrow8\":\"0\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow9\":\"75.000\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.97\",\"channel10PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel10CORRECTIONrow9\":\"0.03\",\"channel10UNCERTAINTYrow9\":\"0.18\",\"channel10DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow10\":\"100.000\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"99.96\",\"channel10PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel10CORRECTIONrow10\":\"0.04\",\"channel10UNCERTAINTYrow10\":\"0.18\",\"channel10DRIFTrow10\":\"0.019999999999999997\"},{\"channelName\":\"398855\",\"channelNumber\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow11\":\"124.990\",\"channel10STANDARDrow11\":\"124.990\",\"channel10UUCrow11\":\"124.95\",\"channel10PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel10CORRECTIONrow11\":\"0.04\",\"channel10UNCERTAINTYrow11\":\"0.23\",\"channel10DRIFTrow11\":\"0.010000000000000002\"}],[{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow1\":\"0.000\",\"channel11STANDARDrow1\":\"0.000\",\"channel11UUCrow1\":\"0.01\",\"channel11PREVIOUSCORRECTIONrow1\":\"0.01\",\"channel11CORRECTIONrow1\":\"-0.01\",\"channel11UNCERTAINTYrow1\":\"0.18\",\"channel11DRIFTrow1\":\"0.02\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow2\":\"-30.010\",\"channel11STANDARDrow2\":\"-30.010\",\"channel11UUCrow2\":\"-30.00\",\"channel11PREVIOUSCORRECTIONrow2\":\"0.01\",\"channel11CORRECTIONrow2\":\"-0.01\",\"channel11UNCERTAINTYrow2\":\"0.18\",\"channel11DRIFTrow2\":\"0.02\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow3\":\"-20.010\",\"channel11STANDARDrow3\":\"-20.010\",\"channel11UUCrow3\":\"-20.01\",\"channel11PREVIOUSCORRECTIONrow3\":\"0.03\",\"channel11CORRECTIONrow3\":\"0.00\",\"channel11UNCERTAINTYrow3\":\"0.18\",\"channel11DRIFTrow3\":\"0.03\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow4\":\"-10.020\",\"channel11STANDARDrow4\":\"-10.020\",\"channel11UUCrow4\":\"-10.02\",\"channel11PREVIOUSCORRECTIONrow4\":\"0.01\",\"channel11CORRECTIONrow4\":\"0.00\",\"channel11UNCERTAINTYrow4\":\"0.18\",\"channel11DRIFTrow4\":\"0.01\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow5\":\"10.000\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"10.01\",\"channel11PREVIOUSCORRECTIONrow5\":\"-0.03\",\"channel11CORRECTIONrow5\":\"-0.01\",\"channel11UNCERTAINTYrow5\":\"0.18\",\"channel11DRIFTrow5\":\"0.019999999999999997\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow6\":\"20.000\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"20.00\",\"channel11PREVIOUSCORRECTIONrow6\":\"-0.01\",\"channel11CORRECTIONrow6\":\"0.00\",\"channel11UNCERTAINTYrow6\":\"0.18\",\"channel11DRIFTrow6\":\"0.01\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow7\":\"37.000\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"37.00\",\"channel11PREVIOUSCORRECTIONrow7\":\"0.05\",\"channel11CORRECTIONrow7\":\"0.00\",\"channel11UNCERTAINTYrow7\":\"0.18\",\"channel11DRIFTrow7\":\"0.05\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow8\":\"50.000\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.98\",\"channel11PREVIOUSCORRECTIONrow8\":\"0.10\",\"channel11CORRECTIONrow8\":\"0.02\",\"channel11UNCERTAINTYrow8\":\"0.18\",\"channel11DRIFTrow8\":\"0.08\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow9\":\"75.000\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.98\",\"channel11PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel11CORRECTIONrow9\":\"0.02\",\"channel11UNCERTAINTYrow9\":\"0.18\",\"channel11DRIFTrow9\":\"0.009999999999999998\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow10\":\"100.000\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"99.95\",\"channel11PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel11CORRECTIONrow10\":\"0.05\",\"channel11UNCERTAINTYrow10\":\"0.18\",\"channel11DRIFTrow10\":\"0.009999999999999995\"},{\"channelName\":\"424975\",\"channelNumber\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow11\":\"125.000\",\"channel11STANDARDrow11\":\"125.000\",\"channel11UUCrow11\":\"124.94\",\"channel11PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel11CORRECTIONrow11\":\"0.06\",\"channel11UNCERTAINTYrow11\":\"0.23\",\"channel11DRIFTrow11\":\"0.009999999999999995\"}],[{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow1\":\"0.000\",\"channel12STANDARDrow1\":\"0.000\",\"channel12UUCrow1\":\"-0.02\",\"channel12PREVIOUSCORRECTIONrow1\":\"0.05\",\"channel12CORRECTIONrow1\":\"0.02\",\"channel12UNCERTAINTYrow1\":\"0.18\",\"channel12DRIFTrow1\":\"0.030000000000000002\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow2\":\"-30.010\",\"channel12STANDARDrow2\":\"-30.010\",\"channel12UUCrow2\":\"-30.02\",\"channel12PREVIOUSCORRECTIONrow2\":\"0.04\",\"channel12CORRECTIONrow2\":\"0.01\",\"channel12UNCERTAINTYrow2\":\"0.18\",\"channel12DRIFTrow2\":\"0.03\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow3\":\"-20.010\",\"channel12STANDARDrow3\":\"-20.010\",\"channel12UUCrow3\":\"-20.03\",\"channel12PREVIOUSCORRECTIONrow3\":\"-0.01\",\"channel12CORRECTIONrow3\":\"0.02\",\"channel12UNCERTAINTYrow3\":\"0.18\",\"channel12DRIFTrow3\":\"0.03\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow4\":\"-10.010\",\"channel12STANDARDrow4\":\"-10.010\",\"channel12UUCrow4\":\"-20.04\",\"channel12PREVIOUSCORRECTIONrow4\":\"0.07\",\"channel12CORRECTIONrow4\":\"0.03\",\"channel12UNCERTAINTYrow4\":\"0.18\",\"channel12DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow5\":\"10.000\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"9.98\",\"channel12PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel12CORRECTIONrow5\":\"0.02\",\"channel12UNCERTAINTYrow5\":\"0.18\",\"channel12DRIFTrow5\":\"0.02\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow6\":\"20.000\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.97\",\"channel12PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel12CORRECTIONrow6\":\"0.03\",\"channel12UNCERTAINTYrow6\":\"0.18\",\"channel12DRIFTrow6\":\"0\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow7\":\"37.000\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"36.97\",\"channel12PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel12CORRECTIONrow7\":\"0.03\",\"channel12UNCERTAINTYrow7\":\"0.18\",\"channel12DRIFTrow7\":\"0\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow8\":\"50.000\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.96\",\"channel12PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel12CORRECTIONrow8\":\"0.04\",\"channel12UNCERTAINTYrow8\":\"0.18\",\"channel12DRIFTrow8\":\"0\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow9\":\"75.000\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.96\",\"channel12PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel12CORRECTIONrow9\":\"0.04\",\"channel12UNCERTAINTYrow9\":\"0.18\",\"channel12DRIFTrow9\":\"0\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow10\":\"100.000\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"99.95\",\"channel12PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel12CORRECTIONrow10\":\"0.05\",\"channel12UNCERTAINTYrow10\":\"0.18\",\"channel12DRIFTrow10\":\"0\"},{\"channelName\":\"256888\",\"channelNumber\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow11\":\"125.000\",\"channel12STANDARDrow11\":\"125.000\",\"channel12UUCrow11\":\"124.95\",\"channel12PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel12CORRECTIONrow11\":\"0.05\",\"channel12UNCERTAINTYrow11\":\"0.23\",\"channel12DRIFTrow11\":\"0.010000000000000002\"}],[{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow1\":\"-0.010\",\"channel13STANDARDrow1\":\"-0.010\",\"channel13UUCrow1\":\"-0.06\",\"channel13PREVIOUSCORRECTIONrow1\":\"0.06\",\"channel13CORRECTIONrow1\":\"0.05\",\"channel13UNCERTAINTYrow1\":\"0.18\",\"channel13DRIFTrow1\":\"0.009999999999999995\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow2\":\"-20.000\",\"channel13STANDARDrow2\":\"-20.000\",\"channel13UUCrow2\":\"-20.04\",\"channel13PREVIOUSCORRECTIONrow2\":\"-0.11\",\"channel13CORRECTIONrow2\":\"0.04\",\"channel13UNCERTAINTYrow2\":\"0.18\",\"channel13DRIFTrow2\":\"0.15\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow3\":\"-10.010\",\"channel13STANDARDrow3\":\"-10.010\",\"channel13UUCrow3\":\"-10.06\",\"channel13PREVIOUSCORRECTIONrow3\":\"-0.05\",\"channel13CORRECTIONrow3\":\"0.05\",\"channel13UNCERTAINTYrow3\":\"0.18\",\"channel13DRIFTrow3\":\"0.1\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow4\":\"10.000\",\"channel13STANDARDrow4\":\"10.000\",\"channel13UUCrow4\":\"9.95\",\"channel13PREVIOUSCORRECTIONrow4\":\"0.03\",\"channel13CORRECTIONrow4\":\"0.05\",\"channel13UNCERTAINTYrow4\":\"0.18\",\"channel13DRIFTrow4\":\"0.020000000000000004\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow5\":\"20.000\",\"channel13STANDARDrow5\":\"20.000\",\"channel13UUCrow5\":\"19.93\",\"channel13PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel13CORRECTIONrow5\":\"0.07\",\"channel13UNCERTAINTYrow5\":\"0.18\",\"channel13DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow6\":\"36.990\",\"channel13STANDARDrow6\":\"36.990\",\"channel13UUCrow6\":\"36.91\",\"channel13PREVIOUSCORRECTIONrow6\":\"0.07\",\"channel13CORRECTIONrow6\":\"0.08\",\"channel13UNCERTAINTYrow6\":\"0.18\",\"channel13DRIFTrow6\":\"0.009999999999999995\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow7\":\"49.990\",\"channel13STANDARDrow7\":\"49.990\",\"channel13UUCrow7\":\"49.90\",\"channel13PREVIOUSCORRECTIONrow7\":\"0.07\",\"channel13CORRECTIONrow7\":\"0.09\",\"channel13UNCERTAINTYrow7\":\"0.18\",\"channel13DRIFTrow7\":\"0.01999999999999999\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow8\":\"75.000\",\"channel13STANDARDrow8\":\"75.000\",\"channel13UUCrow8\":\"74.92\",\"channel13PREVIOUSCORRECTIONrow8\":\"0.08\",\"channel13CORRECTIONrow8\":\"0.08\",\"channel13UNCERTAINTYrow8\":\"0.18\",\"channel13DRIFTrow8\":\"0\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow9\":\"100.010\",\"channel13STANDARDrow9\":\"100.010\",\"channel13UUCrow9\":\"99.94\",\"channel13PREVIOUSCORRECTIONrow9\":\"0.11\",\"channel13CORRECTIONrow9\":\"0.07\",\"channel13UNCERTAINTYrow9\":\"0.18\",\"channel13DRIFTrow9\":\"0.039999999999999994\"},{\"channelName\":\"398013\",\"channelNumber\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow10\":\"125.000\",\"channel13STANDARDrow10\":\"125.000\",\"channel13UUCrow10\":\"124.92\",\"channel13PREVIOUSCORRECTIONrow10\":\"0.08\",\"channel13CORRECTIONrow10\":\"0.08\",\"channel13UNCERTAINTYrow10\":\"0.23\",\"channel13DRIFTrow10\":\"0\"}],[{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow1\":\"-0.010\",\"channel14STANDARDrow1\":\"-0.010\",\"channel14UUCrow1\":\"0.00\",\"channel14PREVIOUSCORRECTIONrow1\":\"0.01\",\"channel14CORRECTIONrow1\":\"-0.01\",\"channel14UNCERTAINTYrow1\":\"0.18\",\"channel14DRIFTrow1\":\"0.02\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow2\":\"-30.010\",\"channel14STANDARDrow2\":\"-30.010\",\"channel14UUCrow2\":\"-30.01\",\"channel14PREVIOUSCORRECTIONrow2\":\"0.03\",\"channel14CORRECTIONrow2\":\"0.00\",\"channel14UNCERTAINTYrow2\":\"0.18\",\"channel14DRIFTrow2\":\"0.03\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow3\":\"-20.000\",\"channel14STANDARDrow3\":\"-20.000\",\"channel14UUCrow3\":\"-20.01\",\"channel14PREVIOUSCORRECTIONrow3\":\"0.03\",\"channel14CORRECTIONrow3\":\"0.01\",\"channel14UNCERTAINTYrow3\":\"0.18\",\"channel14DRIFTrow3\":\"0.019999999999999997\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow4\":\"-10.010\",\"channel14STANDARDrow4\":\"-10.010\",\"channel14UUCrow4\":\"-10.02\",\"channel14PREVIOUSCORRECTIONrow4\":\"0.05\",\"channel14CORRECTIONrow4\":\"0.01\",\"channel14UNCERTAINTYrow4\":\"0.18\",\"channel14DRIFTrow4\":\"0.04\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow5\":\"10.000\",\"channel14STANDARDrow5\":\"10.000\",\"channel14UUCrow5\":\"10.01\",\"channel14PREVIOUSCORRECTIONrow5\":\"0.01\",\"channel14CORRECTIONrow5\":\"-0.01\",\"channel14UNCERTAINTYrow5\":\"0.18\",\"channel14DRIFTrow5\":\"0.02\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow6\":\"20.000\",\"channel14STANDARDrow6\":\"20.000\",\"channel14UUCrow6\":\"20.00\",\"channel14PREVIOUSCORRECTIONrow6\":\"0.00\",\"channel14CORRECTIONrow6\":\"0.00\",\"channel14UNCERTAINTYrow6\":\"0.18\",\"channel14DRIFTrow6\":\"0\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow7\":\"36.990\",\"channel14STANDARDrow7\":\"36.990\",\"channel14UUCrow7\":\"37.00\",\"channel14PREVIOUSCORRECTIONrow7\":\"0.00\",\"channel14CORRECTIONrow7\":\"-0.01\",\"channel14UNCERTAINTYrow7\":\"0.18\",\"channel14DRIFTrow7\":\"0.01\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow8\":\"49.990\",\"channel14STANDARDrow8\":\"49.990\",\"channel14UUCrow8\":\"49.99\",\"channel14PREVIOUSCORRECTIONrow8\":\"0.01\",\"channel14CORRECTIONrow8\":\"0.00\",\"channel14UNCERTAINTYrow8\":\"0.18\",\"channel14DRIFTrow8\":\"0.01\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow9\":\"75.000\",\"channel14STANDARDrow9\":\"75.000\",\"channel14UUCrow9\":\"74.99\",\"channel14PREVIOUSCORRECTIONrow9\":\"0.01\",\"channel14CORRECTIONrow9\":\"0.01\",\"channel14UNCERTAINTYrow9\":\"0.18\",\"channel14DRIFTrow9\":\"0\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow10\":\"100.010\",\"channel14STANDARDrow10\":\"100.010\",\"channel14UUCrow10\":\"99.99\",\"channel14PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel14CORRECTIONrow10\":\"0.02\",\"channel14UNCERTAINTYrow10\":\"0.18\",\"channel14DRIFTrow10\":\"0.030000000000000002\"},{\"channelName\":\"491130; Sensor (460737)\",\"channelNumber\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow11\":\"125.000\",\"channel14STANDARDrow11\":\"125.000\",\"channel14UUCrow11\":\"124.97\",\"channel14PREVIOUSCORRECTIONrow11\":\"0.03\",\"channel14CORRECTIONrow11\":\"0.03\",\"channel14UNCERTAINTYrow11\":\"0.23\",\"channel14DRIFTrow11\":\"0\"}],[{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow1\":\"-0.010\",\"channel15STANDARDrow1\":\"-0.010\",\"channel15UUCrow1\":\"-0.03\",\"channel15PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel15CORRECTIONrow1\":\"0.02\",\"channel15UNCERTAINTYrow1\":\"0.18\",\"channel15DRIFTrow1\":\"0.02\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow2\":\"-30.010\",\"channel15STANDARDrow2\":\"-30.010\",\"channel15UUCrow2\":\"-30.03\",\"channel15PREVIOUSCORRECTIONrow2\":\"0.05\",\"channel15CORRECTIONrow2\":\"0.02\",\"channel15UNCERTAINTYrow2\":\"0.18\",\"channel15DRIFTrow2\":\"0.030000000000000002\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow3\":\"-20.000\",\"channel15STANDARDrow3\":\"-20.000\",\"channel15UUCrow3\":\"-20.03\",\"channel15PREVIOUSCORRECTIONrow3\":\"0.04\",\"channel15CORRECTIONrow3\":\"0.03\",\"channel15UNCERTAINTYrow3\":\"0.18\",\"channel15DRIFTrow3\":\"0.010000000000000002\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow4\":\"-10.010\",\"channel15STANDARDrow4\":\"-10.010\",\"channel15UUCrow4\":\"-10.04\",\"channel15PREVIOUSCORRECTIONrow4\":\"0.07\",\"channel15CORRECTIONrow4\":\"0.03\",\"channel15UNCERTAINTYrow4\":\"0.18\",\"channel15DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow5\":\"10.000\",\"channel15STANDARDrow5\":\"10.000\",\"channel15UUCrow5\":\"9.98\",\"channel15PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel15CORRECTIONrow5\":\"0.02\",\"channel15UNCERTAINTYrow5\":\"0.18\",\"channel15DRIFTrow5\":\"0.02\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow6\":\"20.000\",\"channel15STANDARDrow6\":\"20.000\",\"channel15UUCrow6\":\"19.98\",\"channel15PREVIOUSCORRECTIONrow6\":\"0.04\",\"channel15CORRECTIONrow6\":\"0.02\",\"channel15UNCERTAINTYrow6\":\"0.18\",\"channel15DRIFTrow6\":\"0.02\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow7\":\"36.990\",\"channel15STANDARDrow7\":\"36.990\",\"channel15UUCrow7\":\"36.96\",\"channel15PREVIOUSCORRECTIONrow7\":\"0.02\",\"channel15CORRECTIONrow7\":\"0.03\",\"channel15UNCERTAINTYrow7\":\"0.18\",\"channel15DRIFTrow7\":\"0.009999999999999998\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow8\":\"49.990\",\"channel15STANDARDrow8\":\"49.990\",\"channel15UUCrow8\":\"49.96\",\"channel15PREVIOUSCORRECTIONrow8\":\"0.03\",\"channel15CORRECTIONrow8\":\"0.03\",\"channel15UNCERTAINTYrow8\":\"0.18\",\"channel15DRIFTrow8\":\"0\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow9\":\"75.000\",\"channel15STANDARDrow9\":\"75.000\",\"channel15UUCrow9\":\"74.97\",\"channel15PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel15CORRECTIONrow9\":\"0.03\",\"channel15UNCERTAINTYrow9\":\"0.18\",\"channel15DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow10\":\"100.010\",\"channel15STANDARDrow10\":\"100.010\",\"channel15UUCrow10\":\"99.97\",\"channel15PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel15CORRECTIONrow10\":\"0.04\",\"channel15UNCERTAINTYrow10\":\"0.18\",\"channel15DRIFTrow10\":\"0.030000000000000006\"},{\"channelName\":\"491135; Sensor (460673)\",\"channelNumber\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow11\":\"125.000\",\"channel15STANDARDrow11\":\"125.000\",\"channel15UUCrow11\":\"124.96\",\"channel15PREVIOUSCORRECTIONrow11\":\"0.06\",\"channel15CORRECTIONrow11\":\"0.04\",\"channel15UNCERTAINTYrow11\":\"0.23\",\"channel15DRIFTrow11\":\"0.019999999999999997\"}],[{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow1\":\"-0.010\",\"channel16STANDARDrow1\":\"-0.010\",\"channel16UUCrow1\":\"-0.06\",\"channel16PREVIOUSCORRECTIONrow1\":\"0.06\",\"channel16CORRECTIONrow1\":\"0.05\",\"channel16UNCERTAINTYrow1\":\"0.18\",\"channel16DRIFTrow1\":\"0.009999999999999995\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow2\":\"-30.010\",\"channel16STANDARDrow2\":\"-30.010\",\"channel16UUCrow2\":\"-30.09\",\"channel16PREVIOUSCORRECTIONrow2\":\"0.09\",\"channel16CORRECTIONrow2\":\"0.08\",\"channel16UNCERTAINTYrow2\":\"0.18\",\"channel16DRIFTrow2\":\"0.009999999999999995\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow3\":\"-20.010\",\"channel16STANDARDrow3\":\"-20.010\",\"channel16UUCrow3\":\"-20.06\",\"channel16PREVIOUSCORRECTIONrow3\":\"0.05\",\"channel16CORRECTIONrow3\":\"0.05\",\"channel16UNCERTAINTYrow3\":\"0.18\",\"channel16DRIFTrow3\":\"0\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow4\":\"-10.020\",\"channel16STANDARDrow4\":\"-10.020\",\"channel16UUCrow4\":\"-10.07\",\"channel16PREVIOUSCORRECTIONrow4\":\"0.09\",\"channel16CORRECTIONrow4\":\"0.05\",\"channel16UNCERTAINTYrow4\":\"0.18\",\"channel16DRIFTrow4\":\"0.039999999999999994\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow5\":\"10.000\",\"channel16STANDARDrow5\":\"10.000\",\"channel16UUCrow5\":\"9.95\",\"channel16PREVIOUSCORRECTIONrow5\":\"0.07\",\"channel16CORRECTIONrow5\":\"0.05\",\"channel16UNCERTAINTYrow5\":\"0.18\",\"channel16DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow6\":\"20.000\",\"channel16STANDARDrow6\":\"20.000\",\"channel16UUCrow6\":\"19.96\",\"channel16PREVIOUSCORRECTIONrow6\":\"0.05\",\"channel16CORRECTIONrow6\":\"0.04\",\"channel16UNCERTAINTYrow6\":\"0.18\",\"channel16DRIFTrow6\":\"0.010000000000000002\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow7\":\"36.990\",\"channel16STANDARDrow7\":\"36.990\",\"channel16UUCrow7\":\"36.95\",\"channel16PREVIOUSCORRECTIONrow7\":\"0.05\",\"channel16CORRECTIONrow7\":\"0.04\",\"channel16UNCERTAINTYrow7\":\"0.18\",\"channel16DRIFTrow7\":\"0.010000000000000002\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow8\":\"50.000\",\"channel16STANDARDrow8\":\"50.000\",\"channel16UUCrow8\":\"49.95\",\"channel16PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel16CORRECTIONrow8\":\"0.05\",\"channel16UNCERTAINTYrow8\":\"0.18\",\"channel16DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow9\":\"75.000\",\"channel16STANDARDrow9\":\"75.000\",\"channel16UUCrow9\":\"74.96\",\"channel16PREVIOUSCORRECTIONrow9\":\"0.06\",\"channel16CORRECTIONrow9\":\"0.04\",\"channel16UNCERTAINTYrow9\":\"0.18\",\"channel16DRIFTrow9\":\"0.019999999999999997\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow10\":\"100.000\",\"channel16STANDARDrow10\":\"100.000\",\"channel16UUCrow10\":\"99.94\",\"channel16PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel16CORRECTIONrow10\":\"0.06\",\"channel16UNCERTAINTYrow10\":\"0.18\",\"channel16DRIFTrow10\":\"0.010000000000000009\"},{\"channelName\":\"398981\",\"channelNumber\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow11\":\"125.000\",\"channel16STANDARDrow11\":\"125.000\",\"channel16UUCrow11\":\"124.94\",\"channel16PREVIOUSCORRECTIONrow11\":\"0.08\",\"channel16CORRECTIONrow11\":\"0.06\",\"channel16UNCERTAINTYrow11\":\"0.23\",\"channel16DRIFTrow11\":\"0.020000000000000004\"}],[{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow1\":\"-0.010\",\"channel17STANDARDrow1\":\"-0.010\",\"channel17UUCrow1\":\"-0.17\",\"channel17PREVIOUSCORRECTIONrow1\":\"0.16\",\"channel17CORRECTIONrow1\":\"0.16\",\"channel17UNCERTAINTYrow1\":\"0.18\",\"channel17DRIFTrow1\":\"0\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow2\":\"-30.010\",\"channel17STANDARDrow2\":\"-30.010\",\"channel17UUCrow2\":\"-30.17\",\"channel17PREVIOUSCORRECTIONrow2\":\"0.18\",\"channel17CORRECTIONrow2\":\"0.16\",\"channel17UNCERTAINTYrow2\":\"0.18\",\"channel17DRIFTrow2\":\"0.01999999999999999\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow3\":\"-20.000\",\"channel17STANDARDrow3\":\"-20.000\",\"channel17UUCrow3\":\"-20.17\",\"channel17PREVIOUSCORRECTIONrow3\":\"0.19\",\"channel17CORRECTIONrow3\":\"0.17\",\"channel17UNCERTAINTYrow3\":\"0.18\",\"channel17DRIFTrow3\":\"0.01999999999999999\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow4\":\"-10.010\",\"channel17STANDARDrow4\":\"-10.010\",\"channel17UUCrow4\":\"-10.17\",\"channel17PREVIOUSCORRECTIONrow4\":\"0.20\",\"channel17CORRECTIONrow4\":\"0.16\",\"channel17UNCERTAINTYrow4\":\"0.18\",\"channel17DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow5\":\"10.000\",\"channel17STANDARDrow5\":\"10.000\",\"channel17UUCrow5\":\"9.84\",\"channel17PREVIOUSCORRECTIONrow5\":\"0.17\",\"channel17CORRECTIONrow5\":\"0.16\",\"channel17UNCERTAINTYrow5\":\"0.18\",\"channel17DRIFTrow5\":\"0.010000000000000009\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow6\":\"20.000\",\"channel17STANDARDrow6\":\"20.000\",\"channel17UUCrow6\":\"19.84\",\"channel17PREVIOUSCORRECTIONrow6\":\"0.16\",\"channel17CORRECTIONrow6\":\"0.16\",\"channel17UNCERTAINTYrow6\":\"0.18\",\"channel17DRIFTrow6\":\"0\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow7\":\"36.990\",\"channel17STANDARDrow7\":\"36.990\",\"channel17UUCrow7\":\"36.83\",\"channel17PREVIOUSCORRECTIONrow7\":\"0.16\",\"channel17CORRECTIONrow7\":\"0.16\",\"channel17UNCERTAINTYrow7\":\"0.18\",\"channel17DRIFTrow7\":\"0\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow8\":\"50.000\",\"channel17STANDARDrow8\":\"50.000\",\"channel17UUCrow8\":\"49.82\",\"channel17PREVIOUSCORRECTIONrow8\":\"0.17\",\"channel17CORRECTIONrow8\":\"0.18\",\"channel17UNCERTAINTYrow8\":\"0.18\",\"channel17DRIFTrow8\":\"0.009999999999999981\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow9\":\"75.000\",\"channel17STANDARDrow9\":\"75.000\",\"channel17UUCrow9\":\"74.83\",\"channel17PREVIOUSCORRECTIONrow9\":\"0.17\",\"channel17CORRECTIONrow9\":\"0.17\",\"channel17UNCERTAINTYrow9\":\"0.18\",\"channel17DRIFTrow9\":\"0\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow10\":\"100.000\",\"channel17STANDARDrow10\":\"100.000\",\"channel17UUCrow10\":\"99.79\",\"channel17PREVIOUSCORRECTIONrow10\":\"0.21\",\"channel17CORRECTIONrow10\":\"0.21\",\"channel17UNCERTAINTYrow10\":\"0.18\",\"channel17DRIFTrow10\":\"0\"},{\"channelName\":\"398828\",\"channelNumber\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow11\":\"124.990\",\"channel17STANDARDrow11\":\"124.990\",\"channel17UUCrow11\":\"124.77\",\"channel17PREVIOUSCORRECTIONrow11\":\"0.22\",\"channel17CORRECTIONrow11\":\"0.22\",\"channel17UNCERTAINTYrow11\":\"0.23\",\"channel17DRIFTrow11\":\"0\"}],[{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow1\":\"0.000\",\"channel18STANDARDrow1\":\"0.000\",\"channel18UUCrow1\":\"-0.03\",\"channel18PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel18CORRECTIONrow1\":\"0.03\",\"channel18UNCERTAINTYrow1\":\"0.18\",\"channel18DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow2\":\"-30.010\",\"channel18STANDARDrow2\":\"-30.010\",\"channel18UUCrow2\":\"-30.03\",\"channel18PREVIOUSCORRECTIONrow2\":\"0.01\",\"channel18CORRECTIONrow2\":\"0.02\",\"channel18UNCERTAINTYrow2\":\"0.18\",\"channel18DRIFTrow2\":\"0.01\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow3\":\"-20.010\",\"channel18STANDARDrow3\":\"-20.010\",\"channel18UUCrow3\":\"-20.02\",\"channel18PREVIOUSCORRECTIONrow3\":\"0.04\",\"channel18CORRECTIONrow3\":\"0.01\",\"channel18UNCERTAINTYrow3\":\"0.18\",\"channel18DRIFTrow3\":\"0.03\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow4\":\"-10.010\",\"channel18STANDARDrow4\":\"-10.010\",\"channel18UUCrow4\":\"-10.04\",\"channel18PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel18CORRECTIONrow4\":\"0.03\",\"channel18UNCERTAINTYrow4\":\"0.18\",\"channel18DRIFTrow4\":\"0.03\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow5\":\"10.000\",\"channel18STANDARDrow5\":\"10.000\",\"channel18UUCrow5\":\"9.98\",\"channel18PREVIOUSCORRECTIONrow5\":\"0.03\",\"channel18CORRECTIONrow5\":\"0.02\",\"channel18UNCERTAINTYrow5\":\"0.18\",\"channel18DRIFTrow5\":\"0.009999999999999998\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow6\":\"20.000\",\"channel18STANDARDrow6\":\"20.000\",\"channel18UUCrow6\":\"19.97\",\"channel18PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel18CORRECTIONrow6\":\"0.03\",\"channel18UNCERTAINTYrow6\":\"0.18\",\"channel18DRIFTrow6\":\"0\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow7\":\"37.000\",\"channel18STANDARDrow7\":\"37.000\",\"channel18UUCrow7\":\"36.97\",\"channel18PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel18CORRECTIONrow7\":\"0.03\",\"channel18UNCERTAINTYrow7\":\"0.18\",\"channel18DRIFTrow7\":\"0\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow8\":\"50.000\",\"channel18STANDARDrow8\":\"50.000\",\"channel18UUCrow8\":\"49.96\",\"channel18PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel18CORRECTIONrow8\":\"0.04\",\"channel18UNCERTAINTYrow8\":\"0.18\",\"channel18DRIFTrow8\":\"0\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow9\":\"75.000\",\"channel18STANDARDrow9\":\"75.000\",\"channel18UUCrow9\":\"74.95\",\"channel18PREVIOUSCORRECTIONrow9\":\"0.05\",\"channel18CORRECTIONrow9\":\"0.05\",\"channel18UNCERTAINTYrow9\":\"0.18\",\"channel18DRIFTrow9\":\"0\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow10\":\"100.010\",\"channel18STANDARDrow10\":\"100.010\",\"channel18UUCrow10\":\"99.95\",\"channel18PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel18CORRECTIONrow10\":\"0.06\",\"channel18UNCERTAINTYrow10\":\"0.18\",\"channel18DRIFTrow10\":\"0.010000000000000009\"},{\"channelName\":\"398857\",\"channelNumber\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow11\":\"125.000\",\"channel18STANDARDrow11\":\"125.000\",\"channel18UUCrow11\":\"124.94\",\"channel18PREVIOUSCORRECTIONrow11\":\"0.06\",\"channel18CORRECTIONrow11\":\"0.06\",\"channel18UNCERTAINTYrow11\":\"0.23\",\"channel18DRIFTrow11\":\"0\"}],[{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow1\":\"0.000\",\"channel19STANDARDrow1\":\"0.000\",\"channel19UUCrow1\":\"-0.09\",\"channel19PREVIOUSCORRECTIONrow1\":\"0.11\",\"channel19CORRECTIONrow1\":\"0.09\",\"channel19UNCERTAINTYrow1\":\"0.18\",\"channel19DRIFTrow1\":\"0.020000000000000004\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow2\":\"-20.010\",\"channel19STANDARDrow2\":\"-20.010\",\"channel19UUCrow2\":\"-20.07\",\"channel19PREVIOUSCORRECTIONrow2\":\"0.16\",\"channel19CORRECTIONrow2\":\"0.06\",\"channel19UNCERTAINTYrow2\":\"0.18\",\"channel19DRIFTrow2\":\"0.1\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow3\":\"-10.020\",\"channel19STANDARDrow3\":\"-10.020\",\"channel19UUCrow3\":\"-10.08\",\"channel19PREVIOUSCORRECTIONrow3\":\"0.14\",\"channel19CORRECTIONrow3\":\"0.06\",\"channel19UNCERTAINTYrow3\":\"0.18\",\"channel19DRIFTrow3\":\"0.08000000000000002\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow4\":\"10.010\",\"channel19STANDARDrow4\":\"10.010\",\"channel19UUCrow4\":\"9.93\",\"channel19PREVIOUSCORRECTIONrow4\":\"0.09\",\"channel19CORRECTIONrow4\":\"0.08\",\"channel19UNCERTAINTYrow4\":\"0.18\",\"channel19DRIFTrow4\":\"0.009999999999999995\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow5\":\"20.000\",\"channel19STANDARDrow5\":\"20.000\",\"channel19UUCrow5\":\"19.93\",\"channel19PREVIOUSCORRECTIONrow5\":\"0.08\",\"channel19CORRECTIONrow5\":\"0.07\",\"channel19UNCERTAINTYrow5\":\"0.18\",\"channel19DRIFTrow5\":\"0.009999999999999995\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow6\":\"37.000\",\"channel19STANDARDrow6\":\"37.000\",\"channel19UUCrow6\":\"36.92\",\"channel19PREVIOUSCORRECTIONrow6\":\"0.09\",\"channel19CORRECTIONrow6\":\"0.08\",\"channel19UNCERTAINTYrow6\":\"0.18\",\"channel19DRIFTrow6\":\"0.009999999999999995\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow7\":\"50.000\",\"channel19STANDARDrow7\":\"50.000\",\"channel19UUCrow7\":\"49.92\",\"channel19PREVIOUSCORRECTIONrow7\":\"0.07\",\"channel19CORRECTIONrow7\":\"0.08\",\"channel19UNCERTAINTYrow7\":\"0.18\",\"channel19DRIFTrow7\":\"0.009999999999999995\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow8\":\"75.000\",\"channel19STANDARDrow8\":\"75.000\",\"channel19UUCrow8\":\"74.93\",\"channel19PREVIOUSCORRECTIONrow8\":\"0.06\",\"channel19CORRECTIONrow8\":\"0.07\",\"channel19UNCERTAINTYrow8\":\"0.18\",\"channel19DRIFTrow8\":\"0.010000000000000009\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow9\":\"100.000\",\"channel19STANDARDrow9\":\"100.000\",\"channel19UUCrow9\":\"99.86\",\"channel19PREVIOUSCORRECTIONrow9\":\"0.07\",\"channel19CORRECTIONrow9\":\"0.14\",\"channel19UNCERTAINTYrow9\":\"0.18\",\"channel19DRIFTrow9\":\"0.07\"},{\"channelName\":\"491130; Sensor (461381)\",\"channelNumber\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow10\":\"124.990\",\"channel19STANDARDrow10\":\"124.990\",\"channel19UUCrow10\":\"124.86\",\"channel19PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel19CORRECTIONrow10\":\"0.13\",\"channel19UNCERTAINTYrow10\":\"0.23\",\"channel19DRIFTrow10\":\"0.06\"}],[{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow1\":\"0.000\",\"channel20STANDARDrow1\":\"0.000\",\"channel20UUCrow1\":\"-0.04\",\"channel20PREVIOUSCORRECTIONrow1\":\"0.07\",\"channel20CORRECTIONrow1\":\"0.04\",\"channel20UNCERTAINTYrow1\":\"0.18\",\"channel20DRIFTrow1\":\"0.030000000000000006\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow2\":\"-20.010\",\"channel20STANDARDrow2\":\"-20.010\",\"channel20UUCrow2\":\"-20.05\",\"channel20PREVIOUSCORRECTIONrow2\":\"0.13\",\"channel20CORRECTIONrow2\":\"0.04\",\"channel20UNCERTAINTYrow2\":\"0.18\",\"channel20DRIFTrow2\":\"0.09\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow3\":\"-10.020\",\"channel20STANDARDrow3\":\"-10.020\",\"channel20UUCrow3\":\"-10.05\",\"channel20PREVIOUSCORRECTIONrow3\":\"0.09\",\"channel20CORRECTIONrow3\":\"0.03\",\"channel20UNCERTAINTYrow3\":\"0.18\",\"channel20DRIFTrow3\":\"0.06\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow4\":\"10.010\",\"channel20STANDARDrow4\":\"10.010\",\"channel20UUCrow4\":\"9.97\",\"channel20PREVIOUSCORRECTIONrow4\":\"0.05\",\"channel20CORRECTIONrow4\":\"0.04\",\"channel20UNCERTAINTYrow4\":\"0.18\",\"channel20DRIFTrow4\":\"0.010000000000000002\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow5\":\"20.000\",\"channel20STANDARDrow5\":\"20.000\",\"channel20UUCrow5\":\"19.97\",\"channel20PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel20CORRECTIONrow5\":\"0.03\",\"channel20UNCERTAINTYrow5\":\"0.18\",\"channel20DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow6\":\"37.000\",\"channel20STANDARDrow6\":\"37.000\",\"channel20UUCrow6\":\"36.97\",\"channel20PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel20CORRECTIONrow6\":\"0.03\",\"channel20UNCERTAINTYrow6\":\"0.18\",\"channel20DRIFTrow6\":\"0\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow7\":\"50.000\",\"channel20STANDARDrow7\":\"50.000\",\"channel20UUCrow7\":\"49.97\",\"channel20PREVIOUSCORRECTIONrow7\":\"0.02\",\"channel20CORRECTIONrow7\":\"0.03\",\"channel20UNCERTAINTYrow7\":\"0.18\",\"channel20DRIFTrow7\":\"0.009999999999999998\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow8\":\"75.000\",\"channel20STANDARDrow8\":\"75.000\",\"channel20UUCrow8\":\"74.98\",\"channel20PREVIOUSCORRECTIONrow8\":\"0.01\",\"channel20CORRECTIONrow8\":\"0.02\",\"channel20UNCERTAINTYrow8\":\"0.18\",\"channel20DRIFTrow8\":\"0.01\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow9\":\"100.000\",\"channel20STANDARDrow9\":\"100.000\",\"channel20UUCrow9\":\"99.98\",\"channel20PREVIOUSCORRECTIONrow9\":\"0.05\",\"channel20CORRECTIONrow9\":\"0.02\",\"channel20UNCERTAINTYrow9\":\"0.18\",\"channel20DRIFTrow9\":\"0.030000000000000002\"},{\"channelName\":\"491135; Sensor (461294)\",\"channelNumber\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow10\":\"124.990\",\"channel20STANDARDrow10\":\"124.990\",\"channel20UUCrow10\":\"124.94\",\"channel20PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel20CORRECTIONrow10\":\"0.05\",\"channel20UNCERTAINTYrow10\":\"0.23\",\"channel20DRIFTrow10\":\"0\"}]]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(39, 'Ellab BACKUP', '2023-215-TMP-078-05 to 025', 'Wireless Temperature Logger (ALL ELLAB)', 'NML (Philippines)  through DOST-CALABARZON RML', 'Ellab', 'Tracksense Pro Compact; Pro X Logger', '2023-08-20', NULL, NULL, NULL, NULL, NULL, '0.23', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow1\":\"0.000\",\"channel1STANDARDrow1\":\"0.000\",\"channel1UUCrow1\":\"-0.03\",\"channel1PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel1CORRECTIONrow1\":\"0.03\",\"channel1UNCERTAINTYrow1\":\"0.18\",\"channel1DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow2\":\"-30.010\",\"channel1STANDARDrow2\":\"-30.010\",\"channel1UUCrow2\":\"-30.03\",\"channel1PREVIOUSCORRECTIONrow2\":\"0.05\",\"channel1CORRECTIONrow2\":\"0.02\",\"channel1UNCERTAINTYrow2\":\"0.18\",\"channel1DRIFTrow2\":\"0.030000000000000002\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow3\":\"-20.000\",\"channel1STANDARDrow3\":\"-20.000\",\"channel1UUCrow3\":\"-20.03\",\"channel1PREVIOUSCORRECTIONrow3\":\"0.06\",\"channel1CORRECTIONrow3\":\"0.03\",\"channel1UNCERTAINTYrow3\":\"0.18\",\"channel1DRIFTrow3\":\"0.03\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow4\":\"-10.010\",\"channel1STANDARDrow4\":\"-10.010\",\"channel1UUCrow4\":\"-10.03\",\"channel1PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel1CORRECTIONrow4\":\"0.02\",\"channel1UNCERTAINTYrow4\":\"0.18\",\"channel1DRIFTrow4\":\"0.06\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow5\":\"10.000\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"9.98\",\"channel1PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel1CORRECTIONrow5\":\"0.02\",\"channel1UNCERTAINTYrow5\":\"0.18\",\"channel1DRIFTrow5\":\"0.030000000000000002\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow6\":\"20.000\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"19.97\",\"channel1PREVIOUSCORRECTIONrow6\":\"0.04\",\"channel1CORRECTIONrow6\":\"0.03\",\"channel1UNCERTAINTYrow6\":\"0.18\",\"channel1DRIFTrow6\":\"0.010000000000000002\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow7\":\"37.000\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"36.97\",\"channel1PREVIOUSCORRECTIONrow7\":\"0.04\",\"channel1CORRECTIONrow7\":\"0.03\",\"channel1UNCERTAINTYrow7\":\"0.18\",\"channel1DRIFTrow7\":\"0.010000000000000002\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow8\":\"50.000\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"49.97\",\"channel1PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel1CORRECTIONrow8\":\"0.03\",\"channel1UNCERTAINTYrow8\":\"0.18\",\"channel1DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow9\":\"75.000\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"74.94\",\"channel1PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel1CORRECTIONrow9\":\"0.06\",\"channel1UNCERTAINTYrow9\":\"0.18\",\"channel1DRIFTrow9\":\"0.019999999999999997\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow10\":\"100.000\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"99.94\",\"channel1PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel1CORRECTIONrow10\":\"0.06\",\"channel1UNCERTAINTYrow10\":\"0.18\",\"channel1DRIFTrow10\":\"0.009999999999999995\"},{\"channelName\":\"channel1\",\"channelKey1\":\"424923\",\"channel1TESTPOINTrow11\":\"125.000\",\"channel1STANDARDrow11\":\"125.000\",\"channel1UUCrow11\":\"124.95\",\"channel1PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel1CORRECTIONrow11\":\"0.05\",\"channel1UNCERTAINTYrow11\":\"0.23\",\"channel1DRIFTrow11\":\"0\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow1\":\"0.000\",\"channel2STANDARDrow1\":\"0.000\",\"channel2UUCrow1\":\"-0.18\",\"channel2PREVIOUSCORRECTIONrow1\":\"0.19\",\"channel2CORRECTIONrow1\":\"0.18\",\"channel2UNCERTAINTYrow1\":\"0.18\",\"channel2DRIFTrow1\":\"0.010000000000000009\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow2\":\"-30.010\",\"channel2STANDARDrow2\":\"-30.010\",\"channel2UUCrow2\":\"-30.20\",\"channel2PREVIOUSCORRECTIONrow2\":\"0.19\",\"channel2CORRECTIONrow2\":\"0.19\",\"channel2UNCERTAINTYrow2\":\"0.18\",\"channel2DRIFTrow2\":\"0\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow3\":\"-20.000\",\"channel2STANDARDrow3\":\"-20.000\",\"channel2UUCrow3\":\"-20.18\",\"channel2PREVIOUSCORRECTIONrow3\":\"0.20\",\"channel2CORRECTIONrow3\":\"0.18\",\"channel2UNCERTAINTYrow3\":\"0.18\",\"channel2DRIFTrow3\":\"0.020000000000000018\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow4\":\"-10.010\",\"channel2STANDARDrow4\":\"-10.010\",\"channel2UUCrow4\":\"-10.19\",\"channel2PREVIOUSCORRECTIONrow4\":\"0.22\",\"channel2CORRECTIONrow4\":\"0.18\",\"channel2UNCERTAINTYrow4\":\"0.18\",\"channel2DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow5\":\"10.000\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"9.82\",\"channel2PREVIOUSCORRECTIONrow5\":\"0.19\",\"channel2CORRECTIONrow5\":\"0.18\",\"channel2UNCERTAINTYrow5\":\"0.18\",\"channel2DRIFTrow5\":\"0.010000000000000009\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow6\":\"20.000\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"19.82\",\"channel2PREVIOUSCORRECTIONrow6\":\"0.18\",\"channel2CORRECTIONrow6\":\"0.18\",\"channel2UNCERTAINTYrow6\":\"0.18\",\"channel2DRIFTrow6\":\"0\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow7\":\"36.990\",\"channel2STANDARDrow7\":\"36.990\",\"channel2UUCrow7\":\"36.81\",\"channel2PREVIOUSCORRECTIONrow7\":\"0.17\",\"channel2CORRECTIONrow7\":\"0.18\",\"channel2UNCERTAINTYrow7\":\"0.18\",\"channel2DRIFTrow7\":\"0.009999999999999981\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow8\":\"50.000\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"49.81\",\"channel2PREVIOUSCORRECTIONrow8\":\"0.16\",\"channel2CORRECTIONrow8\":\"0.19\",\"channel2UNCERTAINTYrow8\":\"0.18\",\"channel2DRIFTrow8\":\"0.03\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow9\":\"75.000\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"74.80\",\"channel2PREVIOUSCORRECTIONrow9\":\"0.19\",\"channel2CORRECTIONrow9\":\"0.20\",\"channel2UNCERTAINTYrow9\":\"0.18\",\"channel2DRIFTrow9\":\"0.010000000000000009\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow10\":\"100.000\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"99.79\",\"channel2PREVIOUSCORRECTIONrow10\":\"0.21\",\"channel2CORRECTIONrow10\":\"0.21\",\"channel2UNCERTAINTYrow10\":\"0.18\",\"channel2DRIFTrow10\":\"0\"},{\"channelName\":\"channel2\",\"channelKey2\":\"398961\",\"channel2TESTPOINTrow11\":\"124.990\",\"channel2STANDARDrow11\":\"124.990\",\"channel2UUCrow11\":\"124.79\",\"channel2PREVIOUSCORRECTIONrow11\":\"0.21\",\"channel2CORRECTIONrow11\":\"0.20\",\"channel2UNCERTAINTYrow11\":\"0.23\",\"channel2DRIFTrow11\":\"0.009999999999999981\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow1\":\"0.000\",\"channel3STANDARDrow1\":\"0.000\",\"channel3UUCrow1\":\"-0.03\",\"channel3PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel3CORRECTIONrow1\":\"0.03\",\"channel3UNCERTAINTYrow1\":\"0.18\",\"channel3DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow2\":\"-30.010\",\"channel3STANDARDrow2\":\"-30.010\",\"channel3UUCrow2\":\"-30.04\",\"channel3PREVIOUSCORRECTIONrow2\":\"0.03\",\"channel3CORRECTIONrow2\":\"0.03\",\"channel3UNCERTAINTYrow2\":\"0.18\",\"channel3DRIFTrow2\":\"0\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow3\":\"-20.010\",\"channel3STANDARDrow3\":\"-20.010\",\"channel3UUCrow3\":\"-20.03\",\"channel3PREVIOUSCORRECTIONrow3\":\"0.05\",\"channel3CORRECTIONrow3\":\"0.02\",\"channel3UNCERTAINTYrow3\":\"0.18\",\"channel3DRIFTrow3\":\"0.030000000000000002\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow4\":\"-10.020\",\"channel3STANDARDrow4\":\"-10.020\",\"channel3UUCrow4\":\"-10.05\",\"channel3PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel3CORRECTIONrow4\":\"0.03\",\"channel3UNCERTAINTYrow4\":\"0.18\",\"channel3DRIFTrow4\":\"0.03\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow5\":\"10.000\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"9.97\",\"channel3PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel3CORRECTIONrow5\":\"0.03\",\"channel3UNCERTAINTYrow5\":\"0.18\",\"channel3DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow6\":\"20.000\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"19.96\",\"channel3PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel3CORRECTIONrow6\":\"0.04\",\"channel3UNCERTAINTYrow6\":\"0.18\",\"channel3DRIFTrow6\":\"0.010000000000000002\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow7\":\"36.990\",\"channel3STANDARDrow7\":\"36.990\",\"channel3UUCrow7\":\"36.95\",\"channel3PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel3CORRECTIONrow7\":\"0.04\",\"channel3UNCERTAINTYrow7\":\"0.18\",\"channel3DRIFTrow7\":\"0.010000000000000002\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow8\":\"50.000\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"49.97\",\"channel3PREVIOUSCORRECTIONrow8\":\"0.03\",\"channel3CORRECTIONrow8\":\"0.03\",\"channel3UNCERTAINTYrow8\":\"0.18\",\"channel3DRIFTrow8\":\"0\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow9\":\"75.000\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"74.95\",\"channel3PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel3CORRECTIONrow9\":\"0.05\",\"channel3UNCERTAINTYrow9\":\"0.18\",\"channel3DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow10\":\"100.010\",\"channel3STANDARDrow10\":\"100.010\",\"channel3UUCrow10\":\"99.98\",\"channel3PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel3CORRECTIONrow10\":\"0.03\",\"channel3UNCERTAINTYrow10\":\"0.18\",\"channel3DRIFTrow10\":\"0.04000000000000001\"},{\"channelName\":\"channel3\",\"channelKey3\":\"424933\",\"channel3TESTPOINTrow11\":\"125.000\",\"channel3STANDARDrow11\":\"125.000\",\"channel3UUCrow11\":\"124.99\",\"channel3PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel3CORRECTIONrow11\":\"0.01\",\"channel3UNCERTAINTYrow11\":\"0.23\",\"channel3DRIFTrow11\":\"0.04\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow1\":\"0.000\",\"channel4STANDARDrow1\":\"0.000\",\"channel4UUCrow1\":\"-0.02\",\"channel4PREVIOUSCORRECTIONrow1\":\"0.03\",\"channel4CORRECTIONrow1\":\"0.02\",\"channel4UNCERTAINTYrow1\":\"0.18\",\"channel4DRIFTrow1\":\"0.009999999999999998\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow2\":\"-30.010\",\"channel4STANDARDrow2\":\"-30.010\",\"channel4UUCrow2\":\"-30.02\",\"channel4PREVIOUSCORRECTIONrow2\":\"0.05\",\"channel4CORRECTIONrow2\":\"0.01\",\"channel4UNCERTAINTYrow2\":\"0.18\",\"channel4DRIFTrow2\":\"0.04\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow3\":\"-20.000\",\"channel4STANDARDrow3\":\"-20.000\",\"channel4UUCrow3\":\"-20.04\",\"channel4PREVIOUSCORRECTIONrow3\":\"0.06\",\"channel4CORRECTIONrow3\":\"0.04\",\"channel4UNCERTAINTYrow3\":\"0.18\",\"channel4DRIFTrow3\":\"0.019999999999999997\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow4\":\"-10.010\",\"channel4STANDARDrow4\":\"-10.010\",\"channel4UUCrow4\":\"-10.03\",\"channel4PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel4CORRECTIONrow4\":\"0.02\",\"channel4UNCERTAINTYrow4\":\"0.18\",\"channel4DRIFTrow4\":\"0.039999999999999994\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow5\":\"10.000\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"9.99\",\"channel4PREVIOUSCORRECTIONrow5\":\"0.03\",\"channel4CORRECTIONrow5\":\"0.01\",\"channel4UNCERTAINTYrow5\":\"0.18\",\"channel4DRIFTrow5\":\"0.019999999999999997\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow6\":\"20.000\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"19.98\",\"channel4PREVIOUSCORRECTIONrow6\":\"0.02\",\"channel4CORRECTIONrow6\":\"0.02\",\"channel4UNCERTAINTYrow6\":\"0.18\",\"channel4DRIFTrow6\":\"0\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow7\":\"36.990\",\"channel4STANDARDrow7\":\"36.990\",\"channel4UUCrow7\":\"36.98\",\"channel4PREVIOUSCORRECTIONrow7\":\"0.01\",\"channel4CORRECTIONrow7\":\"0.01\",\"channel4UNCERTAINTYrow7\":\"0.18\",\"channel4DRIFTrow7\":\"0\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow8\":\"50.000\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.98\",\"channel4PREVIOUSCORRECTIONrow8\":\"0.02\",\"channel4CORRECTIONrow8\":\"0.02\",\"channel4UNCERTAINTYrow8\":\"0.18\",\"channel4DRIFTrow8\":\"0\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow9\":\"75.000\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.98\",\"channel4PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel4CORRECTIONrow9\":\"0.02\",\"channel4UNCERTAINTYrow9\":\"0.18\",\"channel4DRIFTrow9\":\"0.009999999999999998\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow10\":\"100.000\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"99.97\",\"channel4PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel4CORRECTIONrow10\":\"0.03\",\"channel4UNCERTAINTYrow10\":\"0.18\",\"channel4DRIFTrow10\":\"0.03\"},{\"channelName\":\"channel4\",\"channelKey4\":\"256899\",\"channel4TESTPOINTrow11\":\"125.000\",\"channel4STANDARDrow11\":\"125.000\",\"channel4UUCrow11\":\"124.99\",\"channel4PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel4CORRECTIONrow11\":\"0.01\",\"channel4UNCERTAINTYrow11\":\"0.23\",\"channel4DRIFTrow11\":\"0.03\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow1\":\"-0.010\",\"channel5STANDARDrow1\":\"-0.010\",\"channel5UUCrow1\":\"-0.05\",\"channel5PREVIOUSCORRECTIONrow1\":\"0.05\",\"channel5CORRECTIONrow1\":\"0.04\",\"channel5UNCERTAINTYrow1\":\"0.18\",\"channel5DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow2\":\"-30.020\",\"channel5STANDARDrow2\":\"-30.020\",\"channel5UUCrow2\":\"-30.08\",\"channel5PREVIOUSCORRECTIONrow2\":\"0.06\",\"channel5CORRECTIONrow2\":\"0.06\",\"channel5UNCERTAINTYrow2\":\"0.18\",\"channel5DRIFTrow2\":\"0\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow3\":\"-20.000\",\"channel5STANDARDrow3\":\"-20.000\",\"channel5UUCrow3\":\"-20.05\",\"channel5PREVIOUSCORRECTIONrow3\":\"0.08\",\"channel5CORRECTIONrow3\":\"0.05\",\"channel5UNCERTAINTYrow3\":\"0.18\",\"channel5DRIFTrow3\":\"0.03\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow4\":\"-10.010\",\"channel5STANDARDrow4\":\"-10.010\",\"channel5UUCrow4\":\"-10.06\",\"channel5PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel5CORRECTIONrow4\":\"0.05\",\"channel5UNCERTAINTYrow4\":\"0.18\",\"channel5DRIFTrow4\":\"0.03\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow5\":\"10.000\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"9.96\",\"channel5PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel5CORRECTIONrow5\":\"0.04\",\"channel5UNCERTAINTYrow5\":\"0.18\",\"channel5DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow6\":\"20.000\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"19.96\",\"channel5PREVIOUSCORRECTIONrow6\":\"0.04\",\"channel5CORRECTIONrow6\":\"0.04\",\"channel5UNCERTAINTYrow6\":\"0.18\",\"channel5DRIFTrow6\":\"0\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow7\":\"36.990\",\"channel5STANDARDrow7\":\"36.990\",\"channel5UUCrow7\":\"36.95\",\"channel5PREVIOUSCORRECTIONrow7\":\"0.04\",\"channel5CORRECTIONrow7\":\"0.04\",\"channel5UNCERTAINTYrow7\":\"0.18\",\"channel5DRIFTrow7\":\"0\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow8\":\"50.000\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.95\",\"channel5PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel5CORRECTIONrow8\":\"0.05\",\"channel5UNCERTAINTYrow8\":\"0.18\",\"channel5DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow9\":\"75.000\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.96\",\"channel5PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel5CORRECTIONrow9\":\"0.04\",\"channel5UNCERTAINTYrow9\":\"0.18\",\"channel5DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow10\":\"100.000\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"99.98\",\"channel5PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel5CORRECTIONrow10\":\"0.02\",\"channel5UNCERTAINTYrow10\":\"0.18\",\"channel5DRIFTrow10\":\"0.039999999999999994\"},{\"channelName\":\"channel5\",\"channelKey5\":\"398964\",\"channel5TESTPOINTrow11\":\"124.990\",\"channel5STANDARDrow11\":\"124.990\",\"channel5UUCrow11\":\"124.91\",\"channel5PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel5CORRECTIONrow11\":\"0.08\",\"channel5UNCERTAINTYrow11\":\"0.23\",\"channel5DRIFTrow11\":\"0.03\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow1\":\"0.000\",\"channel6STANDARDrow1\":\"0.000\",\"channel6UUCrow1\":\"-0.02\",\"channel6PREVIOUSCORRECTIONrow1\":\"0.03\",\"channel6CORRECTIONrow1\":\"0.02\",\"channel6UNCERTAINTYrow1\":\"0.18\",\"channel6DRIFTrow1\":\"0.009999999999999998\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow2\":\"-30.010\",\"channel6STANDARDrow2\":\"-30.010\",\"channel6UUCrow2\":\"-30.02\",\"channel6PREVIOUSCORRECTIONrow2\":\"0.06\",\"channel6CORRECTIONrow2\":\"0.01\",\"channel6UNCERTAINTYrow2\":\"0.18\",\"channel6DRIFTrow2\":\"0.049999999999999996\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow3\":\"-20.010\",\"channel6STANDARDrow3\":\"-20.010\",\"channel6UUCrow3\":\"-20.03\",\"channel6PREVIOUSCORRECTIONrow3\":\"0.08\",\"channel6CORRECTIONrow3\":\"0.02\",\"channel6UNCERTAINTYrow3\":\"0.18\",\"channel6DRIFTrow3\":\"0.06\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow4\":\"-10.020\",\"channel6STANDARDrow4\":\"-10.020\",\"channel6UUCrow4\":\"-10.04\",\"channel6PREVIOUSCORRECTIONrow4\":\"0.07\",\"channel6CORRECTIONrow4\":\"0.02\",\"channel6UNCERTAINTYrow4\":\"0.18\",\"channel6DRIFTrow4\":\"0.05\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow5\":\"10.000\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"9.99\",\"channel6PREVIOUSCORRECTIONrow5\":\"0.03\",\"channel6CORRECTIONrow5\":\"0.01\",\"channel6UNCERTAINTYrow5\":\"0.18\",\"channel6DRIFTrow5\":\"0.019999999999999997\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow6\":\"20.000\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"19.99\",\"channel6PREVIOUSCORRECTIONrow6\":\"0.02\",\"channel6CORRECTIONrow6\":\"0.01\",\"channel6UNCERTAINTYrow6\":\"0.18\",\"channel6DRIFTrow6\":\"0.01\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow7\":\"37.000\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.98\",\"channel6PREVIOUSCORRECTIONrow7\":\"0.01\",\"channel6CORRECTIONrow7\":\"0.02\",\"channel6UNCERTAINTYrow7\":\"0.18\",\"channel6DRIFTrow7\":\"0.01\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow8\":\"50.000\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.97\",\"channel6PREVIOUSCORRECTIONrow8\":\"0.02\",\"channel6CORRECTIONrow8\":\"0.03\",\"channel6UNCERTAINTYrow8\":\"0.18\",\"channel6DRIFTrow8\":\"0.009999999999999998\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow9\":\"75.000\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.97\",\"channel6PREVIOUSCORRECTIONrow9\":\"0.02\",\"channel6CORRECTIONrow9\":\"0.03\",\"channel6UNCERTAINTYrow9\":\"0.18\",\"channel6DRIFTrow9\":\"0.009999999999999998\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow10\":\"100.000\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"99.95\",\"channel6PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel6CORRECTIONrow10\":\"0.05\",\"channel6UNCERTAINTYrow10\":\"0.18\",\"channel6DRIFTrow10\":\"0\"},{\"channelName\":\"channel6\",\"channelKey6\":\"256882\",\"channel6TESTPOINTrow11\":\"125.000\",\"channel6STANDARDrow11\":\"125.000\",\"channel6UUCrow11\":\"124.96\",\"channel6PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel6CORRECTIONrow11\":\"0.04\",\"channel6UNCERTAINTYrow11\":\"0.23\",\"channel6DRIFTrow11\":\"0\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow1\":\"-0.010\",\"channel7STANDARDrow1\":\"-0.010\",\"channel7UUCrow1\":\"-0.34\",\"channel7PREVIOUSCORRECTIONrow1\":\"0.34\",\"channel7CORRECTIONrow1\":\"0.33\",\"channel7UNCERTAINTYrow1\":\"0.18\",\"channel7DRIFTrow1\":\"0.010000000000000009\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow2\":\"-30.010\",\"channel7STANDARDrow2\":\"-30.010\",\"channel7UUCrow2\":\"-30.35\",\"channel7PREVIOUSCORRECTIONrow2\":\"0.33\",\"channel7CORRECTIONrow2\":\"0.34\",\"channel7UNCERTAINTYrow2\":\"0.18\",\"channel7DRIFTrow2\":\"0.010000000000000009\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow3\":\"-20.010\",\"channel7STANDARDrow3\":\"-20.010\",\"channel7UUCrow3\":\"-20.22\",\"channel7PREVIOUSCORRECTIONrow3\":\"0.35\",\"channel7CORRECTIONrow3\":\"0.21\",\"channel7UNCERTAINTYrow3\":\"0.34\",\"channel7DRIFTrow3\":\"0.13999999999999999\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow4\":\"-10.020\",\"channel7STANDARDrow4\":\"-10.020\",\"channel7UUCrow4\":\"-10.35\",\"channel7PREVIOUSCORRECTIONrow4\":\"0.37\",\"channel7CORRECTIONrow4\":\"0.33\",\"channel7UNCERTAINTYrow4\":\"0.18\",\"channel7DRIFTrow4\":\"0.03999999999999998\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow5\":\"10.000\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"9.65\",\"channel7PREVIOUSCORRECTIONrow5\":\"0.36\",\"channel7CORRECTIONrow5\":\"0.35\",\"channel7UNCERTAINTYrow5\":\"0.18\",\"channel7DRIFTrow5\":\"0.010000000000000009\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow6\":\"20.000\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"19.64\",\"channel7PREVIOUSCORRECTIONrow6\":\"0.36\",\"channel7CORRECTIONrow6\":\"0.36\",\"channel7UNCERTAINTYrow6\":\"0.18\",\"channel7DRIFTrow6\":\"0\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow7\":\"37.000\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"36.62\",\"channel7PREVIOUSCORRECTIONrow7\":\"0.36\",\"channel7CORRECTIONrow7\":\"0.38\",\"channel7UNCERTAINTYrow7\":\"0.18\",\"channel7DRIFTrow7\":\"0.020000000000000018\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow8\":\"50.000\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"49.61\",\"channel7PREVIOUSCORRECTIONrow8\":\"0.38\",\"channel7CORRECTIONrow8\":\"0.39\",\"channel7UNCERTAINTYrow8\":\"0.18\",\"channel7DRIFTrow8\":\"0.010000000000000009\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow9\":\"75.000\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"74.58\",\"channel7PREVIOUSCORRECTIONrow9\":\"0.41\",\"channel7CORRECTIONrow9\":\"0.42\",\"channel7UNCERTAINTYrow9\":\"0.18\",\"channel7DRIFTrow9\":\"0.010000000000000009\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow10\":\"100.000\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"99.55\",\"channel7PREVIOUSCORRECTIONrow10\":\"0.47\",\"channel7CORRECTIONrow10\":\"0.45\",\"channel7UNCERTAINTYrow10\":\"0.18\",\"channel7DRIFTrow10\":\"0.019999999999999962\"},{\"channelName\":\"channel7\",\"channelKey7\":\"398841\",\"channel7TESTPOINTrow11\":\"124.990\",\"channel7STANDARDrow11\":\"124.990\",\"channel7UUCrow11\":\"124.50\",\"channel7PREVIOUSCORRECTIONrow11\":\"0.48\",\"channel7CORRECTIONrow11\":\"0.49\",\"channel7UNCERTAINTYrow11\":\"0.23\",\"channel7DRIFTrow11\":\"0.010000000000000009\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow1\":\"0.000\",\"channel8STANDARDrow1\":\"0.000\",\"channel8UUCrow1\":\"-0.04\",\"channel8PREVIOUSCORRECTIONrow1\":\"0.05\",\"channel8CORRECTIONrow1\":\"0.04\",\"channel8UNCERTAINTYrow1\":\"0.18\",\"channel8DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow2\":\"-30.010\",\"channel8STANDARDrow2\":\"-30.010\",\"channel8UUCrow2\":\"-30.05\",\"channel8PREVIOUSCORRECTIONrow2\":\"0.06\",\"channel8CORRECTIONrow2\":\"0.04\",\"channel8UNCERTAINTYrow2\":\"0.18\",\"channel8DRIFTrow2\":\"0.019999999999999997\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow3\":\"-20.010\",\"channel8STANDARDrow3\":\"-20.010\",\"channel8UUCrow3\":\"-20.05\",\"channel8PREVIOUSCORRECTIONrow3\":\"0.08\",\"channel8CORRECTIONrow3\":\"0.04\",\"channel8UNCERTAINTYrow3\":\"0.18\",\"channel8DRIFTrow3\":\"0.04\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow4\":\"-10.020\",\"channel8STANDARDrow4\":\"-10.020\",\"channel8UUCrow4\":\"-10.05\",\"channel8PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel8CORRECTIONrow4\":\"0.03\",\"channel8UNCERTAINTYrow4\":\"0.18\",\"channel8DRIFTrow4\":\"0.03\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow5\":\"10.000\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"9.97\",\"channel8PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel8CORRECTIONrow5\":\"0.03\",\"channel8UNCERTAINTYrow5\":\"0.18\",\"channel8DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow6\":\"20.000\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"19.97\",\"channel8PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel8CORRECTIONrow6\":\"0.03\",\"channel8UNCERTAINTYrow6\":\"0.18\",\"channel8DRIFTrow6\":\"0\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow7\":\"37.000\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"36.97\",\"channel8PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel8CORRECTIONrow7\":\"0.03\",\"channel8UNCERTAINTYrow7\":\"0.18\",\"channel8DRIFTrow7\":\"0\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow8\":\"50.000\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"49.95\",\"channel8PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel8CORRECTIONrow8\":\"0.05\",\"channel8UNCERTAINTYrow8\":\"0.18\",\"channel8DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow9\":\"75.000\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"74.96\",\"channel8PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel8CORRECTIONrow9\":\"0.04\",\"channel8UNCERTAINTYrow9\":\"0.18\",\"channel8DRIFTrow9\":\"0\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow10\":\"100.010\",\"channel8STANDARDrow10\":\"100.010\",\"channel8UUCrow10\":\"99.98\",\"channel8PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel8CORRECTIONrow10\":\"0.03\",\"channel8UNCERTAINTYrow10\":\"0.18\",\"channel8DRIFTrow10\":\"0.03\"},{\"channelName\":\"channel8\",\"channelKey8\":\"398825\",\"channel8TESTPOINTrow11\":\"125.000\",\"channel8STANDARDrow11\":\"125.000\",\"channel8UUCrow11\":\"124.97\",\"channel8PREVIOUSCORRECTIONrow11\":\"0.06\",\"channel8CORRECTIONrow11\":\"0.03\",\"channel8UNCERTAINTYrow11\":\"0.23\",\"channel8DRIFTrow11\":\"0.03\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow1\":\"-0.010\",\"channel9STANDARDrow1\":\"-0.010\",\"channel9UUCrow1\":\"-0.04\",\"channel9PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel9CORRECTIONrow1\":\"0.03\",\"channel9UNCERTAINTYrow1\":\"0.18\",\"channel9DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow2\":\"-30.010\",\"channel9STANDARDrow2\":\"-30.010\",\"channel9UUCrow2\":\"-30.06\",\"channel9PREVIOUSCORRECTIONrow2\":\"0.07\",\"channel9CORRECTIONrow2\":\"0.05\",\"channel9UNCERTAINTYrow2\":\"0.18\",\"channel9DRIFTrow2\":\"0.020000000000000004\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow3\":\"-20.000\",\"channel9STANDARDrow3\":\"-20.000\",\"channel9UUCrow3\":\"-20.04\",\"channel9PREVIOUSCORRECTIONrow3\":\"0.00\",\"channel9CORRECTIONrow3\":\"0.04\",\"channel9UNCERTAINTYrow3\":\"0.18\",\"channel9DRIFTrow3\":\"0.04\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow4\":\"-10.020\",\"channel9STANDARDrow4\":\"-10.020\",\"channel9UUCrow4\":\"-10.05\",\"channel9PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel9CORRECTIONrow4\":\"0.03\",\"channel9UNCERTAINTYrow4\":\"0.18\",\"channel9DRIFTrow4\":\"0.05\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow5\":\"10.000\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"9.97\",\"channel9PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel9CORRECTIONrow5\":\"0.03\",\"channel9UNCERTAINTYrow5\":\"0.18\",\"channel9DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow6\":\"20.000\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"19.97\",\"channel9PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel9CORRECTIONrow6\":\"0.03\",\"channel9UNCERTAINTYrow6\":\"0.18\",\"channel9DRIFTrow6\":\"0\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow7\":\"37.000\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"36.97\",\"channel9PREVIOUSCORRECTIONrow7\":\"0.02\",\"channel9CORRECTIONrow7\":\"0.03\",\"channel9UNCERTAINTYrow7\":\"0.18\",\"channel9DRIFTrow7\":\"0.009999999999999998\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow8\":\"50.000\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"49.97\",\"channel9PREVIOUSCORRECTIONrow8\":\"0.03\",\"channel9CORRECTIONrow8\":\"0.03\",\"channel9UNCERTAINTYrow8\":\"0.18\",\"channel9DRIFTrow8\":\"0\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow9\":\"75.000\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"74.96\",\"channel9PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel9CORRECTIONrow9\":\"0.04\",\"channel9UNCERTAINTYrow9\":\"0.18\",\"channel9DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow10\":\"100.000\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"99.97\",\"channel9PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel9CORRECTIONrow10\":\"0.03\",\"channel9UNCERTAINTYrow10\":\"0.18\",\"channel9DRIFTrow10\":\"0.020000000000000004\"},{\"channelName\":\"channel9\",\"channelKey9\":\"398850\",\"channel9TESTPOINTrow11\":\"125.000\",\"channel9STANDARDrow11\":\"125.000\",\"channel9UUCrow11\":\"124.95\",\"channel9PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel9CORRECTIONrow11\":\"0.05\",\"channel9UNCERTAINTYrow11\":\"0.23\",\"channel9DRIFTrow11\":\"0.010000000000000002\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow1\":\"-0.010\",\"channel10STANDARDrow1\":\"-0.010\",\"channel10UUCrow1\":\"-0.07\",\"channel10PREVIOUSCORRECTIONrow1\":\"0.07\",\"channel10CORRECTIONrow1\":\"0.06\",\"channel10UNCERTAINTYrow1\":\"0.18\",\"channel10DRIFTrow1\":\"0.010000000000000009\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow2\":\"-30.010\",\"channel10STANDARDrow2\":\"-30.010\",\"channel10UUCrow2\":\"-30.11\",\"channel10PREVIOUSCORRECTIONrow2\":\"0.09\",\"channel10CORRECTIONrow2\":\"0.10\",\"channel10UNCERTAINTYrow2\":\"0.18\",\"channel10DRIFTrow2\":\"0.010000000000000009\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow3\":\"-20.010\",\"channel10STANDARDrow3\":\"-20.010\",\"channel10UUCrow3\":\"-20.07\",\"channel10PREVIOUSCORRECTIONrow3\":\"0.10\",\"channel10CORRECTIONrow3\":\"0.05\",\"channel10UNCERTAINTYrow3\":\"0.18\",\"channel10DRIFTrow3\":\"0.05\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow4\":\"-10.020\",\"channel10STANDARDrow4\":\"-10.020\",\"channel10UUCrow4\":\"-10.07\",\"channel10PREVIOUSCORRECTIONrow4\":\"0.08\",\"channel10CORRECTIONrow4\":\"0.05\",\"channel10UNCERTAINTYrow4\":\"0.18\",\"channel10DRIFTrow4\":\"0.03\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow5\":\"10.000\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"9.95\",\"channel10PREVIOUSCORRECTIONrow5\":\"0.07\",\"channel10CORRECTIONrow5\":\"0.05\",\"channel10UNCERTAINTYrow5\":\"0.18\",\"channel10DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow6\":\"20.000\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"19.95\",\"channel10PREVIOUSCORRECTIONrow6\":\"0.05\",\"channel10CORRECTIONrow6\":\"0.05\",\"channel10UNCERTAINTYrow6\":\"0.18\",\"channel10DRIFTrow6\":\"0\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow7\":\"36.990\",\"channel10STANDARDrow7\":\"36.990\",\"channel10UUCrow7\":\"36.94\",\"channel10PREVIOUSCORRECTIONrow7\":\"0.05\",\"channel10CORRECTIONrow7\":\"0.05\",\"channel10UNCERTAINTYrow7\":\"0.18\",\"channel10DRIFTrow7\":\"0\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow8\":\"50.000\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.95\",\"channel10PREVIOUSCORRECTIONrow8\":\"0.05\",\"channel10CORRECTIONrow8\":\"0.05\",\"channel10UNCERTAINTYrow8\":\"0.18\",\"channel10DRIFTrow8\":\"0\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow9\":\"75.000\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.97\",\"channel10PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel10CORRECTIONrow9\":\"0.03\",\"channel10UNCERTAINTYrow9\":\"0.18\",\"channel10DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow10\":\"100.000\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"99.96\",\"channel10PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel10CORRECTIONrow10\":\"0.04\",\"channel10UNCERTAINTYrow10\":\"0.18\",\"channel10DRIFTrow10\":\"0.019999999999999997\"},{\"channelName\":\"channel10\",\"channelKey10\":\"398855\",\"channel10TESTPOINTrow11\":\"124.990\",\"channel10STANDARDrow11\":\"124.990\",\"channel10UUCrow11\":\"124.95\",\"channel10PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel10CORRECTIONrow11\":\"0.04\",\"channel10UNCERTAINTYrow11\":\"0.23\",\"channel10DRIFTrow11\":\"0.010000000000000002\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow1\":\"0.000\",\"channel11STANDARDrow1\":\"0.000\",\"channel11UUCrow1\":\"0.01\",\"channel11PREVIOUSCORRECTIONrow1\":\"0.01\",\"channel11CORRECTIONrow1\":\"-0.01\",\"channel11UNCERTAINTYrow1\":\"0.18\",\"channel11DRIFTrow1\":\"0.02\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow2\":\"-30.010\",\"channel11STANDARDrow2\":\"-30.010\",\"channel11UUCrow2\":\"-30.00\",\"channel11PREVIOUSCORRECTIONrow2\":\"0.01\",\"channel11CORRECTIONrow2\":\"-0.01\",\"channel11UNCERTAINTYrow2\":\"0.18\",\"channel11DRIFTrow2\":\"0.02\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow3\":\"-20.010\",\"channel11STANDARDrow3\":\"-20.010\",\"channel11UUCrow3\":\"-20.01\",\"channel11PREVIOUSCORRECTIONrow3\":\"0.03\",\"channel11CORRECTIONrow3\":\"0.00\",\"channel11UNCERTAINTYrow3\":\"0.18\",\"channel11DRIFTrow3\":\"0.03\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow4\":\"-10.020\",\"channel11STANDARDrow4\":\"-10.020\",\"channel11UUCrow4\":\"-10.02\",\"channel11PREVIOUSCORRECTIONrow4\":\"0.01\",\"channel11CORRECTIONrow4\":\"0.00\",\"channel11UNCERTAINTYrow4\":\"0.18\",\"channel11DRIFTrow4\":\"0.01\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow5\":\"10.000\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"10.01\",\"channel11PREVIOUSCORRECTIONrow5\":\"-0.03\",\"channel11CORRECTIONrow5\":\"-0.01\",\"channel11UNCERTAINTYrow5\":\"0.18\",\"channel11DRIFTrow5\":\"0.019999999999999997\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow6\":\"20.000\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"20.00\",\"channel11PREVIOUSCORRECTIONrow6\":\"-0.01\",\"channel11CORRECTIONrow6\":\"0.00\",\"channel11UNCERTAINTYrow6\":\"0.18\",\"channel11DRIFTrow6\":\"0.01\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow7\":\"37.000\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"37.00\",\"channel11PREVIOUSCORRECTIONrow7\":\"0.05\",\"channel11CORRECTIONrow7\":\"0.00\",\"channel11UNCERTAINTYrow7\":\"0.18\",\"channel11DRIFTrow7\":\"0.05\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow8\":\"50.000\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.98\",\"channel11PREVIOUSCORRECTIONrow8\":\"0.10\",\"channel11CORRECTIONrow8\":\"0.02\",\"channel11UNCERTAINTYrow8\":\"0.18\",\"channel11DRIFTrow8\":\"0.08\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow9\":\"75.000\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.98\",\"channel11PREVIOUSCORRECTIONrow9\":\"0.03\",\"channel11CORRECTIONrow9\":\"0.02\",\"channel11UNCERTAINTYrow9\":\"0.18\",\"channel11DRIFTrow9\":\"0.009999999999999998\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow10\":\"100.000\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"99.95\",\"channel11PREVIOUSCORRECTIONrow10\":\"0.06\",\"channel11CORRECTIONrow10\":\"0.05\",\"channel11UNCERTAINTYrow10\":\"0.18\",\"channel11DRIFTrow10\":\"0.009999999999999995\"},{\"channelName\":\"channel11\",\"channelKey11\":\"424975\",\"channel11TESTPOINTrow11\":\"125.000\",\"channel11STANDARDrow11\":\"125.000\",\"channel11UUCrow11\":\"124.94\",\"channel11PREVIOUSCORRECTIONrow11\":\"0.05\",\"channel11CORRECTIONrow11\":\"0.06\",\"channel11UNCERTAINTYrow11\":\"0.23\",\"channel11DRIFTrow11\":\"0.009999999999999995\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow1\":\"0.000\",\"channel12STANDARDrow1\":\"0.000\",\"channel12UUCrow1\":\"-0.02\",\"channel12PREVIOUSCORRECTIONrow1\":\"0.05\",\"channel12CORRECTIONrow1\":\"0.02\",\"channel12UNCERTAINTYrow1\":\"0.18\",\"channel12DRIFTrow1\":\"0.030000000000000002\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow2\":\"-30.010\",\"channel12STANDARDrow2\":\"-30.010\",\"channel12UUCrow2\":\"-30.02\",\"channel12PREVIOUSCORRECTIONrow2\":\"0.04\",\"channel12CORRECTIONrow2\":\"0.01\",\"channel12UNCERTAINTYrow2\":\"0.18\",\"channel12DRIFTrow2\":\"0.03\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow3\":\"-20.010\",\"channel12STANDARDrow3\":\"-20.010\",\"channel12UUCrow3\":\"-20.03\",\"channel12PREVIOUSCORRECTIONrow3\":\"-0.01\",\"channel12CORRECTIONrow3\":\"0.02\",\"channel12UNCERTAINTYrow3\":\"0.18\",\"channel12DRIFTrow3\":\"0.03\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow4\":\"-10.010\",\"channel12STANDARDrow4\":\"-10.010\",\"channel12UUCrow4\":\"-20.04\",\"channel12PREVIOUSCORRECTIONrow4\":\"0.07\",\"channel12CORRECTIONrow4\":\"0.03\",\"channel12UNCERTAINTYrow4\":\"0.18\",\"channel12DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow5\":\"10.000\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"9.98\",\"channel12PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel12CORRECTIONrow5\":\"0.02\",\"channel12UNCERTAINTYrow5\":\"0.18\",\"channel12DRIFTrow5\":\"0.02\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow6\":\"20.000\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.97\",\"channel12PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel12CORRECTIONrow6\":\"0.03\",\"channel12UNCERTAINTYrow6\":\"0.18\",\"channel12DRIFTrow6\":\"0\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow7\":\"37.000\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"36.97\",\"channel12PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel12CORRECTIONrow7\":\"0.03\",\"channel12UNCERTAINTYrow7\":\"0.18\",\"channel12DRIFTrow7\":\"0\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow8\":\"50.000\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.96\",\"channel12PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel12CORRECTIONrow8\":\"0.04\",\"channel12UNCERTAINTYrow8\":\"0.18\",\"channel12DRIFTrow8\":\"0\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow9\":\"75.000\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.96\",\"channel12PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel12CORRECTIONrow9\":\"0.04\",\"channel12UNCERTAINTYrow9\":\"0.18\",\"channel12DRIFTrow9\":\"0\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow10\":\"100.000\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"99.95\",\"channel12PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel12CORRECTIONrow10\":\"0.05\",\"channel12UNCERTAINTYrow10\":\"0.18\",\"channel12DRIFTrow10\":\"0\"},{\"channelName\":\"channel12\",\"channelKey12\":\"256888\",\"channel12TESTPOINTrow11\":\"125.000\",\"channel12STANDARDrow11\":\"125.000\",\"channel12UUCrow11\":\"124.95\",\"channel12PREVIOUSCORRECTIONrow11\":\"0.04\",\"channel12CORRECTIONrow11\":\"0.05\",\"channel12UNCERTAINTYrow11\":\"0.23\",\"channel12DRIFTrow11\":\"0.010000000000000002\"}],[{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow1\":\"-0.010\",\"channel13STANDARDrow1\":\"-0.010\",\"channel13UUCrow1\":\"-0.06\",\"channel13PREVIOUSCORRECTIONrow1\":\"0.06\",\"channel13CORRECTIONrow1\":\"0.05\",\"channel13UNCERTAINTYrow1\":\"0.18\",\"channel13DRIFTrow1\":\"0.009999999999999995\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow2\":\"-20.000\",\"channel13STANDARDrow2\":\"-20.000\",\"channel13UUCrow2\":\"-20.04\",\"channel13PREVIOUSCORRECTIONrow2\":\"-0.11\",\"channel13CORRECTIONrow2\":\"0.04\",\"channel13UNCERTAINTYrow2\":\"0.18\",\"channel13DRIFTrow2\":\"0.15\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow3\":\"-10.010\",\"channel13STANDARDrow3\":\"-10.010\",\"channel13UUCrow3\":\"-10.06\",\"channel13PREVIOUSCORRECTIONrow3\":\"-0.05\",\"channel13CORRECTIONrow3\":\"0.05\",\"channel13UNCERTAINTYrow3\":\"0.18\",\"channel13DRIFTrow3\":\"0.1\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow4\":\"10.000\",\"channel13STANDARDrow4\":\"10.000\",\"channel13UUCrow4\":\"9.95\",\"channel13PREVIOUSCORRECTIONrow4\":\"0.03\",\"channel13CORRECTIONrow4\":\"0.05\",\"channel13UNCERTAINTYrow4\":\"0.18\",\"channel13DRIFTrow4\":\"0.020000000000000004\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow5\":\"20.000\",\"channel13STANDARDrow5\":\"20.000\",\"channel13UUCrow5\":\"19.93\",\"channel13PREVIOUSCORRECTIONrow5\":\"0.05\",\"channel13CORRECTIONrow5\":\"0.07\",\"channel13UNCERTAINTYrow5\":\"0.18\",\"channel13DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow6\":\"36.990\",\"channel13STANDARDrow6\":\"36.990\",\"channel13UUCrow6\":\"36.91\",\"channel13PREVIOUSCORRECTIONrow6\":\"0.07\",\"channel13CORRECTIONrow6\":\"0.08\",\"channel13UNCERTAINTYrow6\":\"0.18\",\"channel13DRIFTrow6\":\"0.009999999999999995\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow7\":\"49.990\",\"channel13STANDARDrow7\":\"49.990\",\"channel13UUCrow7\":\"49.90\",\"channel13PREVIOUSCORRECTIONrow7\":\"0.07\",\"channel13CORRECTIONrow7\":\"0.09\",\"channel13UNCERTAINTYrow7\":\"0.18\",\"channel13DRIFTrow7\":\"0.01999999999999999\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow8\":\"75.000\",\"channel13STANDARDrow8\":\"75.000\",\"channel13UUCrow8\":\"74.92\",\"channel13PREVIOUSCORRECTIONrow8\":\"0.08\",\"channel13CORRECTIONrow8\":\"0.08\",\"channel13UNCERTAINTYrow8\":\"0.18\",\"channel13DRIFTrow8\":\"0\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow9\":\"100.010\",\"channel13STANDARDrow9\":\"100.010\",\"channel13UUCrow9\":\"99.94\",\"channel13PREVIOUSCORRECTIONrow9\":\"0.11\",\"channel13CORRECTIONrow9\":\"0.07\",\"channel13UNCERTAINTYrow9\":\"0.18\",\"channel13DRIFTrow9\":\"0.039999999999999994\"},{\"channelName\":\"channel13\",\"channelKey13\":\"398013\",\"channel13TESTPOINTrow10\":\"125.000\",\"channel13STANDARDrow10\":\"125.000\",\"channel13UUCrow10\":\"124.92\",\"channel13PREVIOUSCORRECTIONrow10\":\"0.08\",\"channel13CORRECTIONrow10\":\"0.08\",\"channel13UNCERTAINTYrow10\":\"0.23\",\"channel13DRIFTrow10\":\"0\"}],[{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow1\":\"-0.010\",\"channel14STANDARDrow1\":\"-0.010\",\"channel14UUCrow1\":\"0.00\",\"channel14PREVIOUSCORRECTIONrow1\":\"0.01\",\"channel14CORRECTIONrow1\":\"-0.01\",\"channel14UNCERTAINTYrow1\":\"0.18\",\"channel14DRIFTrow1\":\"0.02\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow2\":\"-30.010\",\"channel14STANDARDrow2\":\"-30.010\",\"channel14UUCrow2\":\"-30.01\",\"channel14PREVIOUSCORRECTIONrow2\":\"0.03\",\"channel14CORRECTIONrow2\":\"0.00\",\"channel14UNCERTAINTYrow2\":\"0.18\",\"channel14DRIFTrow2\":\"0.03\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow3\":\"-20.000\",\"channel14STANDARDrow3\":\"-20.000\",\"channel14UUCrow3\":\"-20.01\",\"channel14PREVIOUSCORRECTIONrow3\":\"0.03\",\"channel14CORRECTIONrow3\":\"0.01\",\"channel14UNCERTAINTYrow3\":\"0.18\",\"channel14DRIFTrow3\":\"0.019999999999999997\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow4\":\"-10.010\",\"channel14STANDARDrow4\":\"-10.010\",\"channel14UUCrow4\":\"-10.02\",\"channel14PREVIOUSCORRECTIONrow4\":\"0.05\",\"channel14CORRECTIONrow4\":\"0.01\",\"channel14UNCERTAINTYrow4\":\"0.18\",\"channel14DRIFTrow4\":\"0.04\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow5\":\"10.000\",\"channel14STANDARDrow5\":\"10.000\",\"channel14UUCrow5\":\"10.01\",\"channel14PREVIOUSCORRECTIONrow5\":\"0.01\",\"channel14CORRECTIONrow5\":\"-0.01\",\"channel14UNCERTAINTYrow5\":\"0.18\",\"channel14DRIFTrow5\":\"0.02\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow6\":\"20.000\",\"channel14STANDARDrow6\":\"20.000\",\"channel14UUCrow6\":\"20.00\",\"channel14PREVIOUSCORRECTIONrow6\":\"0.00\",\"channel14CORRECTIONrow6\":\"0.00\",\"channel14UNCERTAINTYrow6\":\"0.18\",\"channel14DRIFTrow6\":\"0\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow7\":\"36.990\",\"channel14STANDARDrow7\":\"36.990\",\"channel14UUCrow7\":\"37.00\",\"channel14PREVIOUSCORRECTIONrow7\":\"0.00\",\"channel14CORRECTIONrow7\":\"-0.01\",\"channel14UNCERTAINTYrow7\":\"0.18\",\"channel14DRIFTrow7\":\"0.01\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow8\":\"49.990\",\"channel14STANDARDrow8\":\"49.990\",\"channel14UUCrow8\":\"49.99\",\"channel14PREVIOUSCORRECTIONrow8\":\"0.01\",\"channel14CORRECTIONrow8\":\"0.00\",\"channel14UNCERTAINTYrow8\":\"0.18\",\"channel14DRIFTrow8\":\"0.01\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow9\":\"75.000\",\"channel14STANDARDrow9\":\"75.000\",\"channel14UUCrow9\":\"74.99\",\"channel14PREVIOUSCORRECTIONrow9\":\"0.01\",\"channel14CORRECTIONrow9\":\"0.01\",\"channel14UNCERTAINTYrow9\":\"0.18\",\"channel14DRIFTrow9\":\"0\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow10\":\"100.010\",\"channel14STANDARDrow10\":\"100.010\",\"channel14UUCrow10\":\"99.99\",\"channel14PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel14CORRECTIONrow10\":\"0.02\",\"channel14UNCERTAINTYrow10\":\"0.18\",\"channel14DRIFTrow10\":\"0.030000000000000002\"},{\"channelName\":\"channel14\",\"channelKey14\":\"491130; Sensor (460737)\",\"channel14TESTPOINTrow11\":\"125.000\",\"channel14STANDARDrow11\":\"125.000\",\"channel14UUCrow11\":\"124.97\",\"channel14PREVIOUSCORRECTIONrow11\":\"0.03\",\"channel14CORRECTIONrow11\":\"0.03\",\"channel14UNCERTAINTYrow11\":\"0.23\",\"channel14DRIFTrow11\":\"0\"}],[{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow1\":\"-0.010\",\"channel15STANDARDrow1\":\"-0.010\",\"channel15UUCrow1\":\"-0.03\",\"channel15PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel15CORRECTIONrow1\":\"0.02\",\"channel15UNCERTAINTYrow1\":\"0.18\",\"channel15DRIFTrow1\":\"0.02\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow2\":\"-30.010\",\"channel15STANDARDrow2\":\"-30.010\",\"channel15UUCrow2\":\"-30.03\",\"channel15PREVIOUSCORRECTIONrow2\":\"0.05\",\"channel15CORRECTIONrow2\":\"0.02\",\"channel15UNCERTAINTYrow2\":\"0.18\",\"channel15DRIFTrow2\":\"0.030000000000000002\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow3\":\"-20.000\",\"channel15STANDARDrow3\":\"-20.000\",\"channel15UUCrow3\":\"-20.03\",\"channel15PREVIOUSCORRECTIONrow3\":\"0.04\",\"channel15CORRECTIONrow3\":\"0.03\",\"channel15UNCERTAINTYrow3\":\"0.18\",\"channel15DRIFTrow3\":\"0.010000000000000002\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow4\":\"-10.010\",\"channel15STANDARDrow4\":\"-10.010\",\"channel15UUCrow4\":\"-10.04\",\"channel15PREVIOUSCORRECTIONrow4\":\"0.07\",\"channel15CORRECTIONrow4\":\"0.03\",\"channel15UNCERTAINTYrow4\":\"0.18\",\"channel15DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow5\":\"10.000\",\"channel15STANDARDrow5\":\"10.000\",\"channel15UUCrow5\":\"9.98\",\"channel15PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel15CORRECTIONrow5\":\"0.02\",\"channel15UNCERTAINTYrow5\":\"0.18\",\"channel15DRIFTrow5\":\"0.02\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow6\":\"20.000\",\"channel15STANDARDrow6\":\"20.000\",\"channel15UUCrow6\":\"19.98\",\"channel15PREVIOUSCORRECTIONrow6\":\"0.04\",\"channel15CORRECTIONrow6\":\"0.02\",\"channel15UNCERTAINTYrow6\":\"0.18\",\"channel15DRIFTrow6\":\"0.02\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow7\":\"36.990\",\"channel15STANDARDrow7\":\"36.990\",\"channel15UUCrow7\":\"36.96\",\"channel15PREVIOUSCORRECTIONrow7\":\"0.02\",\"channel15CORRECTIONrow7\":\"0.03\",\"channel15UNCERTAINTYrow7\":\"0.18\",\"channel15DRIFTrow7\":\"0.009999999999999998\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow8\":\"49.990\",\"channel15STANDARDrow8\":\"49.990\",\"channel15UUCrow8\":\"49.96\",\"channel15PREVIOUSCORRECTIONrow8\":\"0.03\",\"channel15CORRECTIONrow8\":\"0.03\",\"channel15UNCERTAINTYrow8\":\"0.18\",\"channel15DRIFTrow8\":\"0\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow9\":\"75.000\",\"channel15STANDARDrow9\":\"75.000\",\"channel15UUCrow9\":\"74.97\",\"channel15PREVIOUSCORRECTIONrow9\":\"0.04\",\"channel15CORRECTIONrow9\":\"0.03\",\"channel15UNCERTAINTYrow9\":\"0.18\",\"channel15DRIFTrow9\":\"0.010000000000000002\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow10\":\"100.010\",\"channel15STANDARDrow10\":\"100.010\",\"channel15UUCrow10\":\"99.97\",\"channel15PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel15CORRECTIONrow10\":\"0.04\",\"channel15UNCERTAINTYrow10\":\"0.18\",\"channel15DRIFTrow10\":\"0.030000000000000006\"},{\"channelName\":\"channel15\",\"channelKey15\":\"491135; Sensor (460673)\",\"channel15TESTPOINTrow11\":\"125.000\",\"channel15STANDARDrow11\":\"125.000\",\"channel15UUCrow11\":\"124.96\",\"channel15PREVIOUSCORRECTIONrow11\":\"0.06\",\"channel15CORRECTIONrow11\":\"0.04\",\"channel15UNCERTAINTYrow11\":\"0.23\",\"channel15DRIFTrow11\":\"0.019999999999999997\"}],[{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow1\":\"-0.010\",\"channel16STANDARDrow1\":\"-0.010\",\"channel16UUCrow1\":\"-0.06\",\"channel16PREVIOUSCORRECTIONrow1\":\"0.06\",\"channel16CORRECTIONrow1\":\"0.05\",\"channel16UNCERTAINTYrow1\":\"0.18\",\"channel16DRIFTrow1\":\"0.009999999999999995\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow2\":\"-30.010\",\"channel16STANDARDrow2\":\"-30.010\",\"channel16UUCrow2\":\"-30.09\",\"channel16PREVIOUSCORRECTIONrow2\":\"0.09\",\"channel16CORRECTIONrow2\":\"0.08\",\"channel16UNCERTAINTYrow2\":\"0.18\",\"channel16DRIFTrow2\":\"0.009999999999999995\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow3\":\"-20.010\",\"channel16STANDARDrow3\":\"-20.010\",\"channel16UUCrow3\":\"-20.06\",\"channel16PREVIOUSCORRECTIONrow3\":\"0.05\",\"channel16CORRECTIONrow3\":\"0.05\",\"channel16UNCERTAINTYrow3\":\"0.18\",\"channel16DRIFTrow3\":\"0\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow4\":\"-10.020\",\"channel16STANDARDrow4\":\"-10.020\",\"channel16UUCrow4\":\"-10.07\",\"channel16PREVIOUSCORRECTIONrow4\":\"0.09\",\"channel16CORRECTIONrow4\":\"0.05\",\"channel16UNCERTAINTYrow4\":\"0.18\",\"channel16DRIFTrow4\":\"0.039999999999999994\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow5\":\"10.000\",\"channel16STANDARDrow5\":\"10.000\",\"channel16UUCrow5\":\"9.95\",\"channel16PREVIOUSCORRECTIONrow5\":\"0.07\",\"channel16CORRECTIONrow5\":\"0.05\",\"channel16UNCERTAINTYrow5\":\"0.18\",\"channel16DRIFTrow5\":\"0.020000000000000004\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow6\":\"20.000\",\"channel16STANDARDrow6\":\"20.000\",\"channel16UUCrow6\":\"19.96\",\"channel16PREVIOUSCORRECTIONrow6\":\"0.05\",\"channel16CORRECTIONrow6\":\"0.04\",\"channel16UNCERTAINTYrow6\":\"0.18\",\"channel16DRIFTrow6\":\"0.010000000000000002\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow7\":\"36.990\",\"channel16STANDARDrow7\":\"36.990\",\"channel16UUCrow7\":\"36.95\",\"channel16PREVIOUSCORRECTIONrow7\":\"0.05\",\"channel16CORRECTIONrow7\":\"0.04\",\"channel16UNCERTAINTYrow7\":\"0.18\",\"channel16DRIFTrow7\":\"0.010000000000000002\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow8\":\"50.000\",\"channel16STANDARDrow8\":\"50.000\",\"channel16UUCrow8\":\"49.95\",\"channel16PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel16CORRECTIONrow8\":\"0.05\",\"channel16UNCERTAINTYrow8\":\"0.18\",\"channel16DRIFTrow8\":\"0.010000000000000002\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow9\":\"75.000\",\"channel16STANDARDrow9\":\"75.000\",\"channel16UUCrow9\":\"74.96\",\"channel16PREVIOUSCORRECTIONrow9\":\"0.06\",\"channel16CORRECTIONrow9\":\"0.04\",\"channel16UNCERTAINTYrow9\":\"0.18\",\"channel16DRIFTrow9\":\"0.019999999999999997\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow10\":\"100.000\",\"channel16STANDARDrow10\":\"100.000\",\"channel16UUCrow10\":\"99.94\",\"channel16PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel16CORRECTIONrow10\":\"0.06\",\"channel16UNCERTAINTYrow10\":\"0.18\",\"channel16DRIFTrow10\":\"0.010000000000000009\"},{\"channelName\":\"channel16\",\"channelKey16\":\"398981\",\"channel16TESTPOINTrow11\":\"125.000\",\"channel16STANDARDrow11\":\"125.000\",\"channel16UUCrow11\":\"124.94\",\"channel16PREVIOUSCORRECTIONrow11\":\"0.08\",\"channel16CORRECTIONrow11\":\"0.06\",\"channel16UNCERTAINTYrow11\":\"0.23\",\"channel16DRIFTrow11\":\"0.020000000000000004\"}],[{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow1\":\"-0.010\",\"channel17STANDARDrow1\":\"-0.010\",\"channel17UUCrow1\":\"-0.17\",\"channel17PREVIOUSCORRECTIONrow1\":\"0.16\",\"channel17CORRECTIONrow1\":\"0.16\",\"channel17UNCERTAINTYrow1\":\"0.18\",\"channel17DRIFTrow1\":\"0\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow2\":\"-30.010\",\"channel17STANDARDrow2\":\"-30.010\",\"channel17UUCrow2\":\"-30.17\",\"channel17PREVIOUSCORRECTIONrow2\":\"0.18\",\"channel17CORRECTIONrow2\":\"0.16\",\"channel17UNCERTAINTYrow2\":\"0.18\",\"channel17DRIFTrow2\":\"0.01999999999999999\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow3\":\"-20.000\",\"channel17STANDARDrow3\":\"-20.000\",\"channel17UUCrow3\":\"-20.17\",\"channel17PREVIOUSCORRECTIONrow3\":\"0.19\",\"channel17CORRECTIONrow3\":\"0.17\",\"channel17UNCERTAINTYrow3\":\"0.18\",\"channel17DRIFTrow3\":\"0.01999999999999999\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow4\":\"-10.010\",\"channel17STANDARDrow4\":\"-10.010\",\"channel17UUCrow4\":\"-10.17\",\"channel17PREVIOUSCORRECTIONrow4\":\"0.20\",\"channel17CORRECTIONrow4\":\"0.16\",\"channel17UNCERTAINTYrow4\":\"0.18\",\"channel17DRIFTrow4\":\"0.04000000000000001\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow5\":\"10.000\",\"channel17STANDARDrow5\":\"10.000\",\"channel17UUCrow5\":\"9.84\",\"channel17PREVIOUSCORRECTIONrow5\":\"0.17\",\"channel17CORRECTIONrow5\":\"0.16\",\"channel17UNCERTAINTYrow5\":\"0.18\",\"channel17DRIFTrow5\":\"0.010000000000000009\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow6\":\"20.000\",\"channel17STANDARDrow6\":\"20.000\",\"channel17UUCrow6\":\"19.84\",\"channel17PREVIOUSCORRECTIONrow6\":\"0.16\",\"channel17CORRECTIONrow6\":\"0.16\",\"channel17UNCERTAINTYrow6\":\"0.18\",\"channel17DRIFTrow6\":\"0\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow7\":\"36.990\",\"channel17STANDARDrow7\":\"36.990\",\"channel17UUCrow7\":\"36.83\",\"channel17PREVIOUSCORRECTIONrow7\":\"0.16\",\"channel17CORRECTIONrow7\":\"0.16\",\"channel17UNCERTAINTYrow7\":\"0.18\",\"channel17DRIFTrow7\":\"0\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow8\":\"50.000\",\"channel17STANDARDrow8\":\"50.000\",\"channel17UUCrow8\":\"49.82\",\"channel17PREVIOUSCORRECTIONrow8\":\"0.17\",\"channel17CORRECTIONrow8\":\"0.18\",\"channel17UNCERTAINTYrow8\":\"0.18\",\"channel17DRIFTrow8\":\"0.009999999999999981\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow9\":\"75.000\",\"channel17STANDARDrow9\":\"75.000\",\"channel17UUCrow9\":\"74.83\",\"channel17PREVIOUSCORRECTIONrow9\":\"0.17\",\"channel17CORRECTIONrow9\":\"0.17\",\"channel17UNCERTAINTYrow9\":\"0.18\",\"channel17DRIFTrow9\":\"0\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow10\":\"100.000\",\"channel17STANDARDrow10\":\"100.000\",\"channel17UUCrow10\":\"99.79\",\"channel17PREVIOUSCORRECTIONrow10\":\"0.21\",\"channel17CORRECTIONrow10\":\"0.21\",\"channel17UNCERTAINTYrow10\":\"0.18\",\"channel17DRIFTrow10\":\"0\"},{\"channelName\":\"channel17\",\"channelKey17\":\"398828\",\"channel17TESTPOINTrow11\":\"124.990\",\"channel17STANDARDrow11\":\"124.990\",\"channel17UUCrow11\":\"124.77\",\"channel17PREVIOUSCORRECTIONrow11\":\"0.22\",\"channel17CORRECTIONrow11\":\"0.22\",\"channel17UNCERTAINTYrow11\":\"0.23\",\"channel17DRIFTrow11\":\"0\"}],[{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow1\":\"0.000\",\"channel18STANDARDrow1\":\"0.000\",\"channel18UUCrow1\":\"-0.03\",\"channel18PREVIOUSCORRECTIONrow1\":\"0.04\",\"channel18CORRECTIONrow1\":\"0.03\",\"channel18UNCERTAINTYrow1\":\"0.18\",\"channel18DRIFTrow1\":\"0.010000000000000002\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow2\":\"-30.010\",\"channel18STANDARDrow2\":\"-30.010\",\"channel18UUCrow2\":\"-30.03\",\"channel18PREVIOUSCORRECTIONrow2\":\"0.01\",\"channel18CORRECTIONrow2\":\"0.02\",\"channel18UNCERTAINTYrow2\":\"0.18\",\"channel18DRIFTrow2\":\"0.01\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow3\":\"-20.010\",\"channel18STANDARDrow3\":\"-20.010\",\"channel18UUCrow3\":\"-20.02\",\"channel18PREVIOUSCORRECTIONrow3\":\"0.04\",\"channel18CORRECTIONrow3\":\"0.01\",\"channel18UNCERTAINTYrow3\":\"0.18\",\"channel18DRIFTrow3\":\"0.03\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow4\":\"-10.010\",\"channel18STANDARDrow4\":\"-10.010\",\"channel18UUCrow4\":\"-10.04\",\"channel18PREVIOUSCORRECTIONrow4\":\"0.06\",\"channel18CORRECTIONrow4\":\"0.03\",\"channel18UNCERTAINTYrow4\":\"0.18\",\"channel18DRIFTrow4\":\"0.03\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow5\":\"10.000\",\"channel18STANDARDrow5\":\"10.000\",\"channel18UUCrow5\":\"9.98\",\"channel18PREVIOUSCORRECTIONrow5\":\"0.03\",\"channel18CORRECTIONrow5\":\"0.02\",\"channel18UNCERTAINTYrow5\":\"0.18\",\"channel18DRIFTrow5\":\"0.009999999999999998\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow6\":\"20.000\",\"channel18STANDARDrow6\":\"20.000\",\"channel18UUCrow6\":\"19.97\",\"channel18PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel18CORRECTIONrow6\":\"0.03\",\"channel18UNCERTAINTYrow6\":\"0.18\",\"channel18DRIFTrow6\":\"0\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow7\":\"37.000\",\"channel18STANDARDrow7\":\"37.000\",\"channel18UUCrow7\":\"36.97\",\"channel18PREVIOUSCORRECTIONrow7\":\"0.03\",\"channel18CORRECTIONrow7\":\"0.03\",\"channel18UNCERTAINTYrow7\":\"0.18\",\"channel18DRIFTrow7\":\"0\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow8\":\"50.000\",\"channel18STANDARDrow8\":\"50.000\",\"channel18UUCrow8\":\"49.96\",\"channel18PREVIOUSCORRECTIONrow8\":\"0.04\",\"channel18CORRECTIONrow8\":\"0.04\",\"channel18UNCERTAINTYrow8\":\"0.18\",\"channel18DRIFTrow8\":\"0\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow9\":\"75.000\",\"channel18STANDARDrow9\":\"75.000\",\"channel18UUCrow9\":\"74.95\",\"channel18PREVIOUSCORRECTIONrow9\":\"0.05\",\"channel18CORRECTIONrow9\":\"0.05\",\"channel18UNCERTAINTYrow9\":\"0.18\",\"channel18DRIFTrow9\":\"0\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow10\":\"100.010\",\"channel18STANDARDrow10\":\"100.010\",\"channel18UUCrow10\":\"99.95\",\"channel18PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel18CORRECTIONrow10\":\"0.06\",\"channel18UNCERTAINTYrow10\":\"0.18\",\"channel18DRIFTrow10\":\"0.010000000000000009\"},{\"channelName\":\"channel18\",\"channelKey18\":\"398857\",\"channel18TESTPOINTrow11\":\"125.000\",\"channel18STANDARDrow11\":\"125.000\",\"channel18UUCrow11\":\"124.94\",\"channel18PREVIOUSCORRECTIONrow11\":\"0.06\",\"channel18CORRECTIONrow11\":\"0.06\",\"channel18UNCERTAINTYrow11\":\"0.23\",\"channel18DRIFTrow11\":\"0\"}],[{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow1\":\"0.000\",\"channel19STANDARDrow1\":\"0.000\",\"channel19UUCrow1\":\"-0.09\",\"channel19PREVIOUSCORRECTIONrow1\":\"0.11\",\"channel19CORRECTIONrow1\":\"0.09\",\"channel19UNCERTAINTYrow1\":\"0.18\",\"channel19DRIFTrow1\":\"0.020000000000000004\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow2\":\"-20.010\",\"channel19STANDARDrow2\":\"-20.010\",\"channel19UUCrow2\":\"-20.07\",\"channel19PREVIOUSCORRECTIONrow2\":\"0.16\",\"channel19CORRECTIONrow2\":\"0.06\",\"channel19UNCERTAINTYrow2\":\"0.18\",\"channel19DRIFTrow2\":\"0.1\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow3\":\"-10.020\",\"channel19STANDARDrow3\":\"-10.020\",\"channel19UUCrow3\":\"-10.08\",\"channel19PREVIOUSCORRECTIONrow3\":\"0.14\",\"channel19CORRECTIONrow3\":\"0.06\",\"channel19UNCERTAINTYrow3\":\"0.18\",\"channel19DRIFTrow3\":\"0.08000000000000002\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow4\":\"10.010\",\"channel19STANDARDrow4\":\"10.010\",\"channel19UUCrow4\":\"9.93\",\"channel19PREVIOUSCORRECTIONrow4\":\"0.09\",\"channel19CORRECTIONrow4\":\"0.08\",\"channel19UNCERTAINTYrow4\":\"0.18\",\"channel19DRIFTrow4\":\"0.009999999999999995\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow5\":\"20.000\",\"channel19STANDARDrow5\":\"20.000\",\"channel19UUCrow5\":\"19.93\",\"channel19PREVIOUSCORRECTIONrow5\":\"0.08\",\"channel19CORRECTIONrow5\":\"0.07\",\"channel19UNCERTAINTYrow5\":\"0.18\",\"channel19DRIFTrow5\":\"0.009999999999999995\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow6\":\"37.000\",\"channel19STANDARDrow6\":\"37.000\",\"channel19UUCrow6\":\"36.92\",\"channel19PREVIOUSCORRECTIONrow6\":\"0.09\",\"channel19CORRECTIONrow6\":\"0.08\",\"channel19UNCERTAINTYrow6\":\"0.18\",\"channel19DRIFTrow6\":\"0.009999999999999995\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow7\":\"50.000\",\"channel19STANDARDrow7\":\"50.000\",\"channel19UUCrow7\":\"49.92\",\"channel19PREVIOUSCORRECTIONrow7\":\"0.07\",\"channel19CORRECTIONrow7\":\"0.08\",\"channel19UNCERTAINTYrow7\":\"0.18\",\"channel19DRIFTrow7\":\"0.009999999999999995\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow8\":\"75.000\",\"channel19STANDARDrow8\":\"75.000\",\"channel19UUCrow8\":\"74.93\",\"channel19PREVIOUSCORRECTIONrow8\":\"0.06\",\"channel19CORRECTIONrow8\":\"0.07\",\"channel19UNCERTAINTYrow8\":\"0.18\",\"channel19DRIFTrow8\":\"0.010000000000000009\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow9\":\"100.000\",\"channel19STANDARDrow9\":\"100.000\",\"channel19UUCrow9\":\"99.86\",\"channel19PREVIOUSCORRECTIONrow9\":\"0.07\",\"channel19CORRECTIONrow9\":\"0.14\",\"channel19UNCERTAINTYrow9\":\"0.18\",\"channel19DRIFTrow9\":\"0.07\"},{\"channelName\":\"channel19\",\"channelKey19\":\"491130; Sensor (461381)\",\"channel19TESTPOINTrow10\":\"124.990\",\"channel19STANDARDrow10\":\"124.990\",\"channel19UUCrow10\":\"124.86\",\"channel19PREVIOUSCORRECTIONrow10\":\"0.07\",\"channel19CORRECTIONrow10\":\"0.13\",\"channel19UNCERTAINTYrow10\":\"0.23\",\"channel19DRIFTrow10\":\"0.06\"}],[{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow1\":\"0.000\",\"channel20STANDARDrow1\":\"0.000\",\"channel20UUCrow1\":\"-0.04\",\"channel20PREVIOUSCORRECTIONrow1\":\"0.07\",\"channel20CORRECTIONrow1\":\"0.04\",\"channel20UNCERTAINTYrow1\":\"0.18\",\"channel20DRIFTrow1\":\"0.030000000000000006\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow2\":\"-20.010\",\"channel20STANDARDrow2\":\"-20.010\",\"channel20UUCrow2\":\"-20.05\",\"channel20PREVIOUSCORRECTIONrow2\":\"0.13\",\"channel20CORRECTIONrow2\":\"0.04\",\"channel20UNCERTAINTYrow2\":\"0.18\",\"channel20DRIFTrow2\":\"0.09\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow3\":\"-10.020\",\"channel20STANDARDrow3\":\"-10.020\",\"channel20UUCrow3\":\"-10.05\",\"channel20PREVIOUSCORRECTIONrow3\":\"0.09\",\"channel20CORRECTIONrow3\":\"0.03\",\"channel20UNCERTAINTYrow3\":\"0.18\",\"channel20DRIFTrow3\":\"0.06\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow4\":\"10.010\",\"channel20STANDARDrow4\":\"10.010\",\"channel20UUCrow4\":\"9.97\",\"channel20PREVIOUSCORRECTIONrow4\":\"0.05\",\"channel20CORRECTIONrow4\":\"0.04\",\"channel20UNCERTAINTYrow4\":\"0.18\",\"channel20DRIFTrow4\":\"0.010000000000000002\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow5\":\"20.000\",\"channel20STANDARDrow5\":\"20.000\",\"channel20UUCrow5\":\"19.97\",\"channel20PREVIOUSCORRECTIONrow5\":\"0.04\",\"channel20CORRECTIONrow5\":\"0.03\",\"channel20UNCERTAINTYrow5\":\"0.18\",\"channel20DRIFTrow5\":\"0.010000000000000002\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow6\":\"37.000\",\"channel20STANDARDrow6\":\"37.000\",\"channel20UUCrow6\":\"36.97\",\"channel20PREVIOUSCORRECTIONrow6\":\"0.03\",\"channel20CORRECTIONrow6\":\"0.03\",\"channel20UNCERTAINTYrow6\":\"0.18\",\"channel20DRIFTrow6\":\"0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow7\":\"50.000\",\"channel20STANDARDrow7\":\"50.000\",\"channel20UUCrow7\":\"49.97\",\"channel20PREVIOUSCORRECTIONrow7\":\"0.02\",\"channel20CORRECTIONrow7\":\"0.03\",\"channel20UNCERTAINTYrow7\":\"0.18\",\"channel20DRIFTrow7\":\"0.009999999999999998\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow8\":\"75.000\",\"channel20STANDARDrow8\":\"75.000\",\"channel20UUCrow8\":\"74.98\",\"channel20PREVIOUSCORRECTIONrow8\":\"0.01\",\"channel20CORRECTIONrow8\":\"0.02\",\"channel20UNCERTAINTYrow8\":\"0.18\",\"channel20DRIFTrow8\":\"0.01\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow9\":\"100.000\",\"channel20STANDARDrow9\":\"100.000\",\"channel20UUCrow9\":\"99.98\",\"channel20PREVIOUSCORRECTIONrow9\":\"0.05\",\"channel20CORRECTIONrow9\":\"0.02\",\"channel20UNCERTAINTYrow9\":\"0.18\",\"channel20DRIFTrow9\":\"0.030000000000000002\"},{\"channelName\":\"channel20\",\"channelKey20\":\"491135; Sensor (461294)\",\"channel20TESTPOINTrow10\":\"124.990\",\"channel20STANDARDrow10\":\"124.990\",\"channel20UUCrow10\":\"124.94\",\"channel20PREVIOUSCORRECTIONrow10\":\"0.05\",\"channel20CORRECTIONrow10\":\"0.05\",\"channel20UNCERTAINTYrow10\":\"0.23\",\"channel20DRIFTrow10\":\"0\"}]]');

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

--
-- Dumping data for table `temperaturesource`
--

INSERT INTO `temperaturesource` (`id`, `code`, `maxInstability`, `maxAxial`, `maxRadial`, `description`, `status`) VALUES
(1, '798M', '0.0164737276808827', '0.0318408673458147', '0.0158193973757968', 'Stirred Liquid Bath; Isotech;', 'active'),
(3, '798EHT', '0.0295410887735156', '0.0673767764144343', '0.0665107510106499', '', 'active'),
(4, '7109A', '0.0229015606778483', '0.0170895679680059', '0.0148956369450781', '', 'active'),
(9, '6109A', '0.00814063879557321', '0.02762621038073', '0.0420888346239261', '', 'active'),
(12, '2', '2', '1', '1', '2', 'inactive'),
(13, 'Ice Bath', '0.01', '0.01', '0.01', '', 'active'),
(14, '7342A', '0.0182827585243379', '0.0261250996808302', '0.0202361269350974', '', 'active');

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

--
-- Dumping data for table `testweightmaterial`
--

INSERT INTO `testweightmaterial` (`id`, `material`, `density`, `uncertainty`, `unit`) VALUES
(2, 'Platinum', '21400', '150', 'kg m-3'),
(3, 'Nickel Silver', '8600', '170', 'kg m-3'),
(4, 'Brass', '8400', '170', 'kg m-3'),
(5, 'Stainless Steel', '7950', '140', 'kg m-3'),
(6, 'Carbon Steel', '7700', '200', 'kg m-3'),
(7, 'Iron', '7800', '200', 'kg m-3'),
(8, 'Cast Iron(White)', '7700', '400', 'kg m-3'),
(9, 'Cast Iron(Grey)', '7100', '600', 'kg m-3'),
(10, 'Aluminum', '2700', '130', 'kg m-3');

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

--
-- Dumping data for table `testweightmpe`
--

INSERT INTO `testweightmpe` (`id`, `nominalValue`, `nominalUnit`, `class`, `MPE`) VALUES
(14, '5000', 'kg', 'E1', 'N/A'),
(15, '2000', 'kg', 'E1', 'N/A'),
(16, '1000', 'kg', 'E1', 'N/A'),
(17, '500', 'kg', 'E1', 'N/A'),
(18, '200', 'kg', 'E1', 'N/A'),
(19, '100', 'kg', 'E1', 'N/A'),
(20, '50', 'kg', 'E1', '25'),
(21, '20', 'kg', 'E1', '10'),
(22, '10', 'kg', 'E1', '5'),
(23, '5', 'kg', 'E1', '2.5'),
(24, '2', 'kg', 'E1', '1'),
(25, '1', 'kg', 'E1', '0.5'),
(26, '500', 'g', 'E1', '0.25'),
(27, '200', 'g', 'E1', '0.1'),
(28, '100', 'g', 'E1', '0.05'),
(29, '50', 'g', 'E1', '0.03'),
(30, '20', 'g', 'E1', '0.025'),
(31, '10', 'g', 'E1', '0.02'),
(32, '5', 'g', 'E1', '0.016'),
(33, '2', 'g', 'E1', '0.012'),
(34, '1', 'g', 'E1', '0.01'),
(35, '500', 'mg', 'E1', '0.008'),
(36, '200', 'mg', 'E1', '0.006'),
(37, '100', 'mg', 'E1', '0.005'),
(38, '50', 'mg', 'E1', '0.004'),
(39, '20', 'mg', 'E1', '0.003'),
(40, '10', 'mg', 'E1', '0.003'),
(41, '5', 'mg', 'E1', '0.003'),
(42, '2', 'mg', 'E1', '0.003'),
(43, '1', 'mg', 'E1', '0.003'),
(44, '5000', 'kg', 'E2', 'N/A'),
(45, '2000', 'kg', 'E2', 'N/A'),
(46, '1000', 'kg', 'E2', '1600'),
(47, '500', 'kg', 'E2', '800'),
(48, '200', 'kg', 'E2', '300'),
(49, '100', 'kg', 'E2', '160'),
(50, '50', 'kg', 'E2', '80'),
(51, '20', 'kg', 'E2', '30'),
(52, '10', 'kg', 'E2', '16'),
(53, '5', 'kg', 'E2', '8'),
(54, '2', 'kg', 'E2', '3'),
(55, '1', 'kg', 'E2', '1.6'),
(56, '500', 'g', 'E2', '0.8'),
(57, '200', 'g', 'E2', '0.3'),
(58, '100', 'g', 'E2', '0.16'),
(59, '50', 'g', 'E2', '0.1'),
(60, '20', 'g', 'E2', '0.08'),
(61, '10', 'g', 'E2', '0.06'),
(62, '5', 'g', 'E2', '0.05'),
(63, '2', 'g', 'E2', '0.04'),
(64, '1', 'g', 'E2', '0.03'),
(65, '500', 'mg', 'E2', '0.025'),
(66, '200', 'mg', 'E2', '0.02'),
(67, '100', 'mg', 'E2', '0.016'),
(68, '50', 'mg', 'E2', '0.012'),
(69, '20', 'mg', 'E2', '0.01'),
(70, '10', 'mg', 'E2', '0.008'),
(71, '5', 'mg', 'E2', '0.006'),
(72, '2', 'mg', 'E2', '0.006'),
(73, '1', 'mg', 'E2', '0.006'),
(104, '5000', 'kg', 'F1', '25000'),
(105, '2000', 'kg', 'F1', '10000'),
(106, '1000', 'kg', 'F1', '5000'),
(107, '500', 'kg', 'F1', '2500'),
(108, '200', 'kg', 'F1', '1000'),
(109, '100', 'kg', 'F1', '500'),
(110, '50', 'kg', 'F1', '250'),
(111, '20', 'kg', 'F1', '100'),
(112, '10', 'kg', 'F1', '50'),
(113, '5', 'kg', 'F1', '25'),
(114, '2', 'kg', 'F1', '10'),
(115, '1', 'kg', 'F1', '5'),
(116, '500', 'g', 'F1', '2.5'),
(117, '200', 'g', 'F1', '1'),
(118, '100', 'g', 'F1', '0.5'),
(119, '50', 'g', 'F1', '0.3'),
(120, '20', 'g', 'F1', '0.25'),
(121, '10', 'g', 'F1', '0.2'),
(122, '5', 'g', 'F1', '0.16'),
(123, '2', 'g', 'F1', '0.12'),
(124, '1', 'g', 'F1', '0.1'),
(125, '500', 'mg', 'F1', '0.08'),
(126, '200', 'mg', 'F1', '0.06'),
(127, '100', 'mg', 'F1', '0.05'),
(128, '50', 'mg', 'F1', '0.04'),
(129, '20', 'mg', 'F1', '0.03'),
(130, '10', 'mg', 'F1', '0.025'),
(131, '5', 'mg', 'F1', '0.02'),
(132, '2', 'mg', 'F1', '0.02'),
(133, '1', 'mg', 'F1', '0.02'),
(134, '5000', 'kg', 'F2', '80000'),
(135, '2000', 'kg', 'F2', '30000'),
(136, '1000', 'kg', 'F2', '16000'),
(137, '500', 'kg', 'F2', '8000'),
(138, '200', 'kg', 'F2', '3000'),
(139, '100', 'kg', 'F2', '1600'),
(140, '50', 'kg', 'F2', '800'),
(141, '20', 'kg', 'F2', '300'),
(142, '10', 'kg', 'F2', '160'),
(143, '5', 'kg', 'F2', '80'),
(144, '2', 'kg', 'F2', '30'),
(145, '1', 'kg', 'F2', '16'),
(146, '500', 'g', 'F2', '8'),
(147, '200', 'g', 'F2', '3'),
(148, '100', 'g', 'F2', '1.6'),
(149, '50', 'g', 'F2', '1'),
(150, '20', 'g', 'F2', '0.8'),
(151, '10', 'g', 'F2', '0.6'),
(152, '5', 'g', 'F2', '0.5'),
(153, '2', 'g', 'F2', '0.4'),
(154, '1', 'g', 'F2', '0.3'),
(155, '500', 'mg', 'F2', '0.25'),
(156, '200', 'mg', 'F2', '0.2'),
(157, '100', 'mg', 'F2', '0.16'),
(158, '50', 'mg', 'F2', '0.12'),
(159, '20', 'mg', 'F2', '0.1'),
(160, '10', 'mg', 'F2', '0.08'),
(161, '5', 'mg', 'F2', '0.06'),
(162, '2', 'mg', 'F2', '0.06'),
(163, '1', 'mg', 'F2', '0.06'),
(164, '5000', 'kg', 'M1', '250000'),
(165, '2000', 'kg', 'M1', '100000'),
(166, '1000', 'kg', 'M1', '50000'),
(167, '500', 'kg', 'M1', '25000'),
(168, '200', 'kg', 'M1', '10000'),
(169, '100', 'kg', 'M1', '5000'),
(170, '50', 'kg', 'M1', '2500'),
(171, '20', 'kg', 'M1', '1000'),
(172, '10', 'kg', 'M1', '500'),
(173, '5', 'kg', 'M1', '250'),
(174, '2', 'kg', 'M1', '100'),
(175, '1', 'kg', 'M1', '50'),
(176, '500', 'g', 'M1', '25'),
(177, '200', 'g', 'M1', '10'),
(178, '100', 'g', 'M1', '5'),
(179, '50', 'g', 'M1', '3'),
(180, '20', 'g', 'M1', '2.5'),
(181, '10', 'g', 'M1', '2'),
(182, '5', 'g', 'M1', '1.6'),
(183, '2', 'g', 'M1', '1.2'),
(184, '1', 'g', 'M1', '1'),
(185, '500', 'mg', 'M1', '0.8'),
(186, '200', 'mg', 'M1', '0.6'),
(187, '100', 'mg', 'M1', '0.5'),
(188, '50', 'mg', 'M1', '0.4'),
(189, '20', 'mg', 'M1', '0.3'),
(190, '10', 'mg', 'M1', '0.25'),
(191, '5', 'mg', 'M1', '0.2'),
(192, '2', 'mg', 'M1', '0.2'),
(193, '1', 'mg', 'M1', '0.2'),
(194, '5000', 'kg', 'M1-2', '500000'),
(195, '2000', 'kg', 'M1-2', '200000'),
(196, '1000', 'kg', 'M1-2', '100000'),
(197, '500', 'kg', 'M1-2', '50000'),
(198, '200', 'kg', 'M1-2', '20000'),
(199, '100', 'kg', 'M1-2', '10000'),
(200, '50', 'kg', 'M1-2', '50000'),
(201, '20', 'kg', 'M1-2', 'N/A'),
(202, '10', 'kg', 'M1-2', 'N/A'),
(203, '5', 'kg', 'M1-2', 'N/A'),
(204, '2', 'kg', 'M1-2', 'N/A'),
(205, '1', 'kg', 'M1-2', 'N/A'),
(206, '500', 'g', 'M1-2', 'N/A'),
(207, '200', 'g', 'M1-2', 'N/A'),
(208, '100', 'g', 'M1-2', 'N/A'),
(209, '50', 'g', 'M1-2', 'N/A'),
(210, '20', 'g', 'M1-2', 'N/A'),
(211, '10', 'g', 'M1-2', 'N/A'),
(212, '5', 'g', 'M1-2', 'N/A'),
(213, '2', 'g', 'M1-2', 'N/A'),
(214, '1', 'g', 'M1-2', 'N/A'),
(215, '500', 'mg', 'M1-2', 'N/A'),
(216, '200', 'mg', 'M1-2', 'N/A'),
(217, '100', 'mg', 'M1-2', 'N/A'),
(218, '50', 'mg', 'M1-2', 'N/A'),
(219, '20', 'mg', 'M1-2', 'N/A'),
(220, '10', 'mg', 'M1-2', 'N/A'),
(221, '5', 'mg', 'M1-2', 'N/A'),
(222, '2', 'mg', 'M1-2', 'N/A'),
(223, '1', 'mg', 'M1-2', 'N/A'),
(224, '5000', 'kg', 'M2', '800000'),
(225, '2000', 'kg', 'M2', '300000'),
(226, '1000', 'kg', 'M2', '160000'),
(227, '500', 'kg', 'M2', '80000'),
(228, '200', 'kg', 'M2', '30000'),
(229, '100', 'kg', 'M2', '16000'),
(230, '50', 'kg', 'M2', '8000'),
(231, '20', 'kg', 'M2', '3000'),
(232, '10', 'kg', 'M2', '1600'),
(233, '5', 'kg', 'M2', '800'),
(234, '2', 'kg', 'M2', '300'),
(235, '1', 'kg', 'M2', '160'),
(236, '500', 'g', 'M2', '80'),
(237, '200', 'g', 'M2', '30'),
(238, '100', 'g', 'M2', '16'),
(239, '50', 'g', 'M2', '10'),
(240, '20', 'g', 'M2', '8'),
(241, '10', 'g', 'M2', '6'),
(242, '5', 'g', 'M2', '5'),
(243, '2', 'g', 'M2', '4'),
(244, '1', 'g', 'M2', '3'),
(245, '500', 'mg', 'M2', '2.5'),
(246, '200', 'mg', 'M2', '2'),
(247, '100', 'mg', 'M2', '1.6'),
(248, '50', 'mg', 'M2', 'N/A'),
(249, '20', 'mg', 'M2', 'N/A'),
(250, '10', 'mg', 'M2', 'N/A'),
(251, '5', 'mg', 'M2', 'N/A'),
(252, '2', 'mg', 'M2', 'N/A'),
(253, '1', 'mg', 'M2', 'N/A'),
(254, '5000', 'kg', 'M2-3', '1600000'),
(255, '2000', 'kg', 'M2-3', '600000'),
(256, '1000', 'kg', 'M2-3', '300000'),
(257, '500', 'kg', 'M2-3', '160000'),
(258, '200', 'kg', 'M2-3', '60000'),
(259, '100', 'kg', 'M2-3', '30000'),
(260, '50', 'kg', 'M2-3', '16000'),
(261, '20', 'kg', 'M2-3', 'N/A'),
(262, '10', 'kg', 'M2-3', 'N/A'),
(263, '5', 'kg', 'M2-3', 'N/A'),
(264, '2', 'kg', 'M2-3', 'N/A'),
(265, '1', 'kg', 'M2-3', 'N/A'),
(266, '500', 'g', 'M2-3', 'N/A'),
(267, '200', 'g', 'M2-3', 'N/A'),
(268, '100', 'g', 'M2-3', 'N/A'),
(269, '50', 'g', 'M2-3', 'N/A'),
(270, '20', 'g', 'M2-3', 'N/A'),
(271, '10', 'g', 'M2-3', 'N/A'),
(272, '5', 'g', 'M2-3', 'N/A'),
(273, '2', 'g', 'M2-3', 'N/A'),
(274, '1', 'g', 'M2-3', 'N/A'),
(275, '500', 'mg', 'M2-3', 'N/A'),
(276, '200', 'mg', 'M2-3', 'N/A'),
(277, '100', 'mg', 'M2-3', 'N/A'),
(278, '50', 'mg', 'M2-3', 'N/A'),
(279, '20', 'mg', 'M2-3', 'N/A'),
(280, '10', 'mg', 'M2-3', 'N/A'),
(281, '5', 'mg', 'M2-3', 'N/A'),
(282, '2', 'mg', 'M2-3', 'N/A'),
(283, '1', 'mg', 'M2-3', 'N/A'),
(284, '5000', 'kg', 'M3', '2500000'),
(285, '2000', 'kg', 'M3', '1000000'),
(286, '1000', 'kg', 'M3', '500000'),
(287, '500', 'kg', 'M3', '250000'),
(288, '200', 'kg', 'M3', '100000'),
(289, '100', 'kg', 'M3', '50000'),
(290, '50', 'kg', 'M3', '25000'),
(291, '20', 'kg', 'M3', '10000'),
(292, '10', 'kg', 'M3', '5000'),
(293, '5', 'kg', 'M3', '2500'),
(294, '2', 'kg', 'M3', '1000'),
(295, '1', 'kg', 'M3', '500'),
(296, '500', 'g', 'M3', '250'),
(297, '200', 'g', 'M3', '100'),
(298, '100', 'g', 'M3', '50'),
(299, '50', 'g', 'M3', '30'),
(300, '20', 'g', 'M3', '25'),
(301, '10', 'g', 'M3', '20'),
(302, '5', 'g', 'M3', '16'),
(303, '2', 'g', 'M3', '12'),
(304, '1', 'g', 'M3', '10'),
(305, '500', 'mg', 'M3', 'N/A'),
(306, '200', 'mg', 'M3', 'N/A'),
(307, '100', 'mg', 'M3', 'N/A'),
(308, '50', 'mg', 'M3', 'N/A'),
(309, '20', 'mg', 'M3', 'N/A'),
(310, '10', 'mg', 'M3', 'N/A'),
(311, '5', 'mg', 'M3', 'N/A'),
(312, '2', 'mg', 'M3', 'N/A'),
(313, '1', 'mg', 'M3', 'N/A');

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

--
-- Dumping data for table `testweightpab`
--

INSERT INTO `testweightpab` (`id`, `classification`, `class`, `instrument`, `rangePAB`, `cmc`, `method`) VALUES
(1, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '50 g', '0.16 mg', 'CP-003 In-house Calibration'),
(2, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '100 g', '0.16 mg', 'CP-003 In-house Calibration'),
(3, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '200 g', '0.30 mg', 'CP-003 In-house Calibration'),
(4, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '500 g', '0.80 mg', 'CP-003 In-house Calibration'),
(5, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '1 kg', '1.6 mg', 'CP-003 In-house Calibration'),
(6, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '2 kg', '3.0 mg', 'CP-003 In-house Calibration'),
(7, 'Determination of masses', 'F1', 'Set of Weights OIML Class F1', '5 kg', '8.0 mg', 'CP-003 In-house Calibration'),
(8, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '2 g', '0.15 mg', 'CP-003 In-house Calibration'),
(9, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '5 g', '0.16 mg', 'CP-003 In-house Calibration'),
(10, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '10 g', '0.20 mg', 'CP-003 In-house Calibration'),
(11, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '20 g', '0.25 mg', 'CP-003 In-house Calibration'),
(12, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '50 g', '0.30 mg', 'CP-003 In-house Calibration'),
(13, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '100 g', '0.50 mg', 'CP-003 In-house Calibration'),
(14, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '200 g', '1.0 mg', 'CP-003 In-house Calibration'),
(15, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '500 g', '2.5 mg', 'CP-003 In-house Calibration'),
(16, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '1 kg', '5.0 mg', 'CP-003 In-house Calibration'),
(17, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '2 kg', '10 mg', 'CP-003 In-house Calibration'),
(18, 'Determination of masses', 'F2', 'Set of Weights OIML Class F2', '5 kg', '25 mg', 'CP-003 In-house Calibration'),
(19, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '1 g', '0.30 mg', 'CP-003 In-house Calibration'),
(20, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '2 g', '0.40 mg', 'CP-003 In-house Calibration'),
(21, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '5 g', '0.50 mg', 'CP-003 In-house Calibration'),
(22, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '10 g', '0.60 mg', 'CP-003 In-house Calibration'),
(23, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '20 g', '0.80 mg', 'CP-003 In-house Calibration'),
(24, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '50 g', '1.0 mg', 'CP-003 In-house Calibration'),
(25, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '100 g', '1.6 mg', 'CP-003 In-house Calibration'),
(26, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '200 g', '3.0 mg', 'CP-003 In-house Calibration'),
(27, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '500 g', '8.0 mg', 'CP-003 In-house Calibration'),
(28, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '1 kg', '16 mg', 'CP-003 In-house Calibration'),
(29, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '2 kg', '30 mg', 'CP-003 In-house Calibration'),
(30, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '5 kg', '80 mg', 'CP-003 In-house Calibration'),
(31, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '10 kg', '160 mg', 'CP-003 In-house Calibration'),
(32, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '1 g', '0.30 mg', 'CP-003 In-house Calibration'),
(33, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '2 g', '0.40 mg', 'CP-003 In-house Calibration'),
(34, '', 'E1', '', '', '', ''),
(35, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '10 g', '0.60 mg', 'CP-003 In-house Calibration'),
(36, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '20 g', '0.80 mg', 'CP-003 In-house Calibration'),
(37, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '50 g', '1.0 mg', 'CP-003 In-house Calibration'),
(38, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '100 g', '1.6 mg', 'CP-003 In-house Calibration'),
(39, 'Determination of masses', 'M1', 'Set of Weights OIML Class M1 and M2', '20 kg', '300 mg', 'CP-003 In-house Calibration'),
(40, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '200 g', '3.0 mg', 'CP-003 In-house Calibration'),
(41, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '500 g', '8.0 mg', 'CP-003 In-house Calibration'),
(42, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '1 kg', '16 mg', 'CP-003 In-house Calibration'),
(43, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '2 kg', '30 mg', 'CP-003 In-house Calibration'),
(44, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '5 kg', '80 mg', 'CP-003 In-house Calibration'),
(45, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '10 kg', '160 mg', 'CP-003 In-house Calibration'),
(46, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '20 kg', '300 mg', 'CP-003 In-house Calibration');

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

--
-- Dumping data for table `testweightsensitivitytest`
--

INSERT INTO `testweightsensitivitytest` (`id`, `balance`, `empty1`, `full1`, `empty2`, `full2`, `empty3`, `full3`, `empty4`, `full4`, `empty5`, `full5`, `emptySD`, `fullSD`, `sensitivityWeight`, `uncertSensitivityWeight`, `maximumValue`, `minimumValue`, `differenceValue`, `dateCalibrated`, `resolution1`, `resolution2`, `conditionForResolution`, `sensitivityWeightDelta`, `uncertSensitivityWeightDelta`, `pooledValue`, `measurements`) VALUES
(1, 'XPE2006 DR', '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '0.0100032', '0.0000013', '0.00021', '-0.00024', '0.00045', '2022-10-05', '0.00001', '0.000005', '81', '0.00004000000000026205', '0.000017888543820115508', '0.0000053', NULL),
(2, 'MCM2004', '0.0019000', '2000.00280', '0.0020000', '2000.00300', '0.0020000', '2000.00310', '0.0019000', '2000.00300', '0.0018000', '2000.00300', '0.0000836660026534076', '0.0001095445114735353', '0.002018', '0.12', '0.001', '-0.001', '0.002', '', '0.0001', '', '', '0.0001095445114735353', '0.000048989794843366115', '0.000214249', NULL),
(3, 'MCM60K3', '0.4980000', '50000.67800', '0.4940000', '50000.67800', '0.4940000', '50000.68400', '0.4920000', '50000.68200', '0.4940000', '50000.68600', '0.002190890230020666', '0.003577708764728539', '0.500057', '0.08', '0.096', '-0.334', '0.43000000000000005', '2021-04-01', '0.001', '', '', '0.003577708764728539', '0.0016000000003259629', '0.010835326', NULL),
(5, 'MCM2004 - 2023 1st Quarter', '0.0201', '2000.0148', '0.0197', '2000.0151', '0.0199', '2000.0151', '0.0199', '2000.0151', '0.0198', '2000.0154', '0.0001483239697419134', '0.00021213203438310348', '0.019993', '0.000015', '', '', '', '2022-10-05', '0.0001', '', '', '0.00021213203438310348', '0.0000948683298171884', '0.00076', NULL),
(6, 'XPE2006 DR - 2022_4th Quarter', '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '0.0100032', '0.0000013', '', '', '', '2022-10-05', NULL, NULL, NULL, '0.00004000000000026205', '0.000017888543820115508', '0.0000053', NULL),
(7, 'MCM60K3 - 2022_4th Quarter', '0.496', '50000.074', '0.492', '50000.056', '0.488', '50000.088', '0.502', '50000.052', '0.508', '50000.092', '0.007949842765740723', '0.01813284313031058', '0.500076', '0.000040', '', '', '', '2022-10-05', '', '', '', '0.01813284313031058', '0.008109253972942907', '0.00324', NULL),
(8, 'MCM2004- 2023_1st Quarter', '0.0201', '2000.0148', '0.0197', '2000.0151', '0.0199', '2000.0151', '0.0199', '2000.0151', '0.0198', '2000.0154', '0.0001483239697419134', '0.00021213203438310348', '0.019993', '0.000015', '', '', '', '', '0.0001', '', '', '0.00021213203438310348', '0.0000948683298171884', '0.00076', NULL),
(9, 'MCM60K3 -2023 1st Quarter', '0.500', '50000.792', '0.496', '50000.784', '0.498', '50000.808', '0.496', '50000.776', '0.492', '50000.818', '0.0029664793948382677', '0.017227884373721882', '0.500076', '0.000040', '', '', '', '2023-01-26', '0.002', '', '', '0.017227884373721882', '0.0077045441136297035', '0.001661', '[{\"measurementNumber\":\"112\",\"testLoad\":\"112\",\"indication\":\"121\",\"error\":\"212\",\"uncertaintyMeasurement\":\"121\"}]');

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

--
-- Dumping data for table `testweightstandarddetails`
--

INSERT INTO `testweightstandarddetails` (`id`, `serialNumber`, `certificateNumber`, `type`, `class`, `prevAirDensity`, `dateOfCalibration`, `manufacturer`, `description`, `issuer`) VALUES
(3, '57248', '10-2020-TSWT-0413', 'OIML Class F2', 'OIML Class F2', '1.18', '2022-11-17', 'Troemner', 'Test weights, 1 mg to 20 kg', ''),
(5, '57249 - 2022', '12-2021-TSWT-1740', 'OIML Class F2', 'OIML Class F2', '1.19', '2022-02-23', 'Troemner', 'Weights, 2 mg to 1 kg', ''),
(6, '6031214', '09-2021-TSWT-1287', 'OIML Class F2', 'OIML Class F2', '1.18', '2021-11-04', 'Haefner', 'Test weights, 1 mg to 10 kg', 'NML (Philippines)'),
(7, '91096 - 2022 - (Non PAB)', 'W22-0142-A', 'OIML Class E2 Weights', 'E2 Weights', '1.2', '2022-04-11', 'Troemner', 'Test weights', 'Sartorius Lab Instruments GmbH & Co. through FPSI'),
(8, '91096 - 2022 - (Non PAB)', 'W22-0142-A', 'OIML Class E2 Weights', 'E2 Weights', '1.2', '2022-04-11', 'Troemner', 'Test weights', 'Sartorius Weighing Technology GmbH through FPSI'),
(9, '91096 - 2022 - (Non PAB)', 'W22-0142-A', 'OIML Class E2 Weights', 'E2 Weights', '1.2', '2022-04-11', 'Troemner', 'Test weights', 'Sartorius Weighing Technology GmbH through FPSI'),
(10, '91096 - 2022 - (Non PAB)', 'W22-0142-A', 'OIML Class E2 Weights', 'E2 Weights', '1.2', '2022-04-11', 'Troemner', 'Test weights', 'Sartorius Lab Instruments GmbH & Co. through FPSI');

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

--
-- Dumping data for table `testweightstandardvalues`
--

INSERT INTO `testweightstandardvalues` (`id`, `serialNumber`, `class`, `nominalValue`, `nominalUnit`, `marking`, `conventionalMass`, `unit`, `uncertainty`, `mpe`, `issuer`) VALUES
(1, '57248', 'F2', '20', 'kg', 'none', '20000.085', 'g', '100', '300', 'NML'),
(2, '57248', 'F2', '10', 'kg', 'none', '10000.022', 'g', '50', '160', 'NML'),
(3, '57248', 'F2', '5', 'kg', 'none', '5000.002', 'g', '25', '80', 'NML'),
(4, '57248', 'F2', '2', 'kg', 'point', '1999.994', 'g', '10', '30', 'NML'),
(5, '57248', 'F2', '2', 'kg', 'none', '1999.993', 'g', '10', '30', 'NML'),
(6, '57248', 'F2', '1', 'kg', 'none', '1000.0005', 'g', '5', '16', 'NML'),
(7, '57248', 'F2', '500', 'g', 'none', '499.9998', 'g', '2.5', '8', 'NML'),
(8, '57248', 'F2', '200', 'g', 'point', '199.9994', 'g', '1', '3', 'NML'),
(9, '57248', 'F2', '200', 'g', 'none', '200.0013', 'g', '1', '3', 'NML'),
(10, '57248', 'F2', '100', 'g', 'none', '100.00082', 'g', '0.5', '1.6', 'NML'),
(11, '57248', 'F2', '50', 'g', 'none', '50.00028', 'g', '0.3', '1', 'NML'),
(12, '57248', 'F2', '20', 'g', 'point', '20.00026', 'g', '0.25', '0.8', 'NML'),
(13, '57248', 'F2', '20', 'g', 'none', '20.00005', 'g', '0.25', '0.8', 'NML'),
(14, '57248', 'F2', '10', 'g', 'none', '10.00009', 'g', '0.2', '0.6', 'NML'),
(15, '57248', 'F2', '5', 'g', 'none', '5.00003', 'g', '0.16', '', ''),
(16, '57248', 'F2', '2', 'g', 'point', '2.00012', 'g', '0.12', '', ''),
(17, '57248', 'F2', '2', 'g', 'none', '2.0001', 'g', '0.12', '', ''),
(18, '57248', 'F2', '1', 'g', 'none', '1.00019', 'g', '0.1', '', ''),
(19, '57248', 'F2', '500', 'mg', 'none', '0.500076', 'g', '0.08', '', ''),
(20, '57248', 'F2', '200', 'mg', 'point', '0.200062', 'g', '0.06', '', ''),
(21, '57248', 'F2', '200', 'mg', 'none', '0.200055', 'g', '0.06', '', ''),
(22, '57248', 'F2', '100', 'mg', 'none', '0.100054', 'g', '0.05', '', ''),
(23, '57248', 'F2', '50', 'mg', 'none', '0.050', 'g', '0.04', '', ''),
(24, '57248', 'F2', '20', 'mg', 'point', '0.020044', 'g', '0.03', '', ''),
(25, '57248', 'F2', '20', 'mg', 'none', '0.019998', 'g', '0.03', '', ''),
(26, '57248', 'F2', '10', 'mg', 'none', '0.01', 'g', '0.025', '', ''),
(27, '57248', 'F2', '5', 'mg', 'none', '0.005008', 'g', '0.02', '', ''),
(28, '57248', 'F2', '2', 'mg', 'point', '0.002007', 'g', '0.02', '', ''),
(29, '57248', 'F2', '2', 'mg', 'none', '0.002003', 'g', '0.02', '', ''),
(30, '57248', 'F2', '1', 'mg', 'none', '0.001013', 'g', '0.02', '', ''),
(31, '6031214', 'OIML Class F₂', '10', 'kg', 'AFT', '10000.047', 'g', '50', '160', 'NML (Philippines)'),
(34, '6031214', 'F2', '5', 'kg', 'AWF', '5000.021', 'g', '25', '', 'NML (Philippines)'),
(35, '6031214', 'OIML Class F₂', '2', 'kg', 'ASR', '2000.003', 'g', '10', '', 'NML (Philippines)'),
(36, '6031214', 'OIML Class F₂', '2', 'kg', 'ASS', '2000.003', 'g', '10', '', 'NML (Philippines)'),
(37, '6031214', 'OIML Class F₂', '1', 'kg', 'AML', '1000.003', 'g', '5', '', 'NML (Philippines)'),
(38, '6031214', 'OIML Class F₂', '500', 'g', 'AQF', '500.0018', 'g', '2.5', '', 'NML (Philippines)'),
(39, '6031214', 'OIML Class F₂', '200', 'g', 'AMY', '200.0006', 'g', '1', '', 'NML (Philippines)'),
(40, '6031214', 'OIML Class F₂', '200', 'g', 'AMX', '200.0003', 'g', '1', '', 'NML (Philippines)'),
(41, '6031214', 'OIML Class F₂', '100', 'g', 'ANL', '100.00038', 'g', '0.5', '', 'NML (Philippines)'),
(42, '6031214', 'OIML Class F₂', '50', 'g', 'AJL', '50.00027', 'g', '0.30', '', 'NML (Philippines)'),
(43, '6031214', 'OIML Class F₂', '20', 'g', 'AN5', '20.00009', 'g', '0.25', '', 'NML (Philippines)'),
(44, '6031214', 'OIML Class F₂', '20', 'g', 'AN4', '20.00029', 'g', '0.25', '', 'NML (Philippines)'),
(45, '6031214', 'OIML Class F₂', '5', 'g', 'A14', '5.00018', 'g', '0.16', '', 'NML (Philippines)'),
(46, '6031214', 'OIML Class F₂', '2', 'g', 'ALT', '2.00007', 'g', '0.12', '', 'NML (Philippines)'),
(47, '6031214', 'OIML Class F₂', '2', 'g', 'ALS', '2.00011', 'g', '0.12', '', 'NML (Philippines)'),
(48, '6031214', 'F2', '1', 'g', 'AL5', '1.00006', 'g', '0.10', '', 'NML (Philippines)'),
(49, '6031214', 'OIML Class F₂', '500', 'mg', 'none', '0.50008', 'g', '0.080', '', 'NML (Philippines)'),
(50, '6031214', 'OIML Class F₂', '200', 'mg', 'point', '0.199989', 'g', '0.060', '', 'NML (Philippines)'),
(51, '6031214', 'OIML Class F₂', '200', 'mg', 'none', '0.199985', 'g', '0.060', '', 'NML (Philippines)'),
(52, '6031214', 'OIML Class F₂', '100', 'mg', 'none', '0.100077', 'g', '0.050', '', 'NML (Philippines)'),
(53, '6031214', 'OIML Class F₂', '50', 'mg', 'none', '0.050019', 'g', '0.040', '', 'NML (Philippines)'),
(54, '6031214', 'OIML Class F₂', '20', 'mg', 'point', '0.020001', 'g', '0.030', '', 'NML (Philippines)'),
(55, '6031214', 'OIML Class F₂', '20', 'mg', 'none', '0.020011', 'g', '0.030', '', 'NML (Philippines)'),
(56, '6031214', 'OIML Class F₂', '10', 'mg', 'none', '0.010009', 'g', '0.025', '', 'NML (Philippines)'),
(57, '6031214', 'OIML Class F₂', '2', 'mg', 'point', '0.001998', 'g', '0.020', '', 'NML (Philippines)'),
(58, '6031214', 'OIML Class F₂', '2', 'mg', 'none', '0.002006', 'g', '0.020', '', 'NML (Philippines)'),
(59, '6031214', 'F2', '1', 'mg', 'none', '0.000997', 'g', '0.020', '', 'NML (Philippines)'),
(60, '57249 - 2022', 'OIML Class F2', '1', 'kg', 'none', '999.9992', 'g', '5', '16', 'NML (Philippines)'),
(61, '57249 - 2022', 'OIML Class F2', '500', 'g', 'none', '500.0002', 'g', '2.5', '8', 'NML (Philippines)'),
(62, '57249 - 2022', 'OIML Class F2', '200', 'g', 'point', '200.0009', 'g', '1', '3', 'NML (Philippines)'),
(63, '57249 - 2022', 'OIML Class F2', '200', 'g', 'none', '200.0003', 'g', '1', '3', 'NML (Philippines)'),
(64, '57249 - 2022', 'OIML Class F2', '100', 'g', 'none', '99.99989', 'g', '0.5', '1.6', 'NML (Philippines)'),
(65, '57249 - 2022', 'OIML Class F2', '50', 'g', 'none', '50.00023', 'g', '0.3', '1', 'NML (Philippines)'),
(66, '57249 - 2022', 'OIML Class F2', '20', 'g', 'point', '20.00025', 'g', '0.25', '0.8', 'NML (Philippines)'),
(67, '57249 - 2022', 'OIML Class F2', '20', 'g', 'none', '20.00034', 'g', '0.25', '0.8', 'NML (Philippines)'),
(68, '57249 - 2022', 'OIML Class F2', '10', 'g', 'none', '10.00019', 'g', '0.2', '0.6', 'NML (Philippines)'),
(69, '57249 - 2022', 'OIML Class F2', '5', 'g', 'none', '5.0002', 'g', '0.16', '0.5', 'NML (Philippines)'),
(70, '57249 - 2022', 'OIML Class F2', '2', 'g', 'point', '2.00013', 'g', '0.12', '0.4', 'NML (Philippines)'),
(71, '57249 - 2022', 'OIML Class F2', '2', 'g', 'none', '2.00005', 'g', '0.12', '0.4', 'NML (Philippines)'),
(72, '57249 - 2022', 'OIML Class F2', '1', 'g', 'none', '1', 'g', '0.1', '0.3', 'NML (Philippines)'),
(73, '57249 - 2022', 'OIML Class F2', '200', 'mg', 'none', '0.200053', 'g', '0.06', '0.2', 'NML (Philippines)'),
(74, '57249 - 2022', 'OIML Class F2', '200', 'mg', 'none', '0.200046', 'g', '0.06', '0.2', 'NML (Philippines)'),
(75, '57249 - 2022', 'OIML Class F2', '100', 'mg', 'none', '0.100059', 'g', '0.05', '0.16', 'NML (Philippines)'),
(76, '57249 - 2022', 'OIML Class F2', '50', 'mg', 'none', '0.050006', 'g', '0.04', '0.12', 'NML (Philippines)'),
(77, '57249 - 2022', 'OIML Class F2', '20', 'mg', 'point', '0.019963', 'g', '0.03', '0.1', 'NML (Philippines)'),
(78, '57249 - 2022', 'OIML Class F2', '20', 'g', 'none', '0.01999', 'g', '0.03', '0.1', 'NML (Philippines)'),
(79, '57249 - 2022', 'OIML Class F2', '10', 'mg', 'none', '0.010015', 'g', '0.025', '0.08', 'NML (Philippines)'),
(80, '57249 - 2022', 'OIML Class F2', '5', 'mg', 'none', '0.005013', 'g', '0.02', '0.06', 'NML (Philippines)'),
(81, '57249 - 2022', 'OIML Class F2', '2', 'mg', 'point', '0.002018', 'g', '0.02', '0.06', 'NML (Philippines)'),
(82, '57249 - 2022', 'OIML Class F2', '2', 'g', 'none', '0.002015', 'g', '0.02', '0.06', 'NML (Philippines)');

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

--
-- Dumping data for table `thermochamber`
--

INSERT INTO `thermochamber` (`id`, `unit`, `serialNumber`, `inhomogeneity`, `Instability`) VALUES
(1, 'Temperature', 'Chamber 1', '0.50', '0.69'),
(2, 'Relative Humidity', 'Chamber 1', '2.10', '1.80'),
(12, 'Temperature', 'Chamber 2', '0.20', '0.07'),
(13, 'Relative Humidity', 'Chamber 2', '0.80', '0.90');

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

--
-- Dumping data for table `thermostandarddrift`
--

INSERT INTO `thermostandarddrift` (`id`, `serialNumber`, `unit`, `dateCalibrated`, `testPoint`, `testPointValue`) VALUES
(22, '12099313038289', 'Relative Humidity', '2013-10-11', '40', '-4.56'),
(23, '12099313038289', 'Relative Humidity', '2014-10-20', '40', '-5.52'),
(24, '12099313038289', 'Relative Humidity', '2015-11-02', '40', '-2.93'),
(25, '12099313038289', 'Relative Humidity', '2016-11-24', '40', '-4.82'),
(26, '12099313038289', 'Relative Humidity', '2018-01-08', '40', '-4.56'),
(27, '12099313038289', 'Relative Humidity', '2019-05-03', '40', '-4.83'),
(28, '12099313038289', 'Relative Humidity', '2020-12-17', '40', '-0.820'),
(29, '12099313038289', 'Relative Humidity', '2013-10-11', '60', '-5.18'),
(30, '12099313038289', 'Relative Humidity', '2014-10-20', '60', '-5.72'),
(31, '12099313038289', 'Relative Humidity', '2015-11-02', '60', '-1.59'),
(32, '12099313038289', 'Relative Humidity', '2016-11-24', '60', '-3.52'),
(33, '12099313038289', 'Relative Humidity', '2018-01-08', '60', '-3.19'),
(34, '12099313038289', 'Relative Humidity', '2019-05-03', '60', '-2.37'),
(35, '12099313038289', 'Relative Humidity', '2020-12-17', '60', '-2.90'),
(36, '12099313038289', 'Relative Humidity', '2019-05-03', '80', '1.52'),
(37, '12099313038289', 'Relative Humidity', '2020-12-17', '80', '-3.70'),
(40, '12099313038289', '0', '2022-03-21', '0', '0'),
(47, '61830467', '', '2020-06-16', '', ''),
(48, '61830467', '', '2021-06-08', '', ''),
(49, '61830467', '', '2020-06-16', '', ''),
(50, '61830467', '', '2021-06-08', '', ''),
(51, '61830467-', 'Relative Humidity', '2020-06-16', '80', '2.42'),
(52, '61830467-', 'Relative Humidity', '2021-06-08', '80', '-1.59'),
(55, '12099313038289 - 2023', 'Air Temperature', '2013-10-10', '20', '-0.20'),
(56, '12099313038289 - 2023', 'Air Temperature', '2014-10-20', '20', '-0.04'),
(57, '12099313038289 - 2023', 'Air Temperature', '2015-11-02', '20', '-0.15'),
(58, '12099313038289 - 2023', 'Air Temperature', '2016-11-24', '20', '-0.05'),
(59, '12099313038289 - 2023', '', '2018-01-18', '20', '-0.03'),
(60, '12099313038289 - 2023', 'Air Temperature', '2019-05-03', '20', '0.01'),
(61, '12099313038289 - 2023', 'Air Temperature', '2020-12-17', '20', '-0.130'),
(62, '12099313038289 - 2023', 'Air Temperature', '2022-05-18', '20', '-0.03'),
(63, '12099313038289 - 2023', '', '2018-01-08', '20', '-0.03'),
(64, '12099313038289 - 2023', 'Air Temperature', '2018-01-08', '20', '-0.03'),
(65, '12099313038289 - 2023', 'Air Temperature', '2013-10-11', '30', '-0.30'),
(66, '12099313038289 - 2023', 'Air Temperature', '2014-10-20', '30', '-0.10'),
(67, '12099313038289 - 2023', 'Air Temperature', '2015-11-02', '30', '0.02'),
(68, '12099313038289 - 2023', 'Air Temperature', '2016-11-24', '30', '-0.09'),
(69, '12099313038289 - 2023', 'Air Temperature', '2018-01-08', '30', '-0.34'),
(70, '12099313038289 - 2023', 'Air Temperature', '2019-05-03', '30', '-0.03'),
(71, '12099313038289 - 2023', 'Air Temperature', '2020-12-17', '30', '0.090'),
(72, '12099313038289 - 2023', 'Air Temperature', '2022-05-18', '30', '-0.02'),
(73, '12099313038289 - 2023', 'Relative Humidity', '2013-10-11', '40', '-4.56'),
(74, '12099313038289 - 2023', 'Relative Humidity', '2014-10-20', '40', '-5.52'),
(75, '12099313038289 - 2023', 'Relative Humidity', '2015-11-02', '40', '-2.93'),
(76, '12099313038289 - 2023', 'Relative Humidity', '2016-11-24', '40', '-4.82'),
(77, '12099313038289 - 2023', '', '2018-01-08', '40', '-4.56'),
(78, '12099313038289 - 2023', 'Relative Humidity', '2019-05-03', '40', '-4.83'),
(79, '12099313038289 - 2023', 'Relative Humidity', '2020-12-17', '40', '-0.820'),
(80, '12099313038289 - 2023', 'Relative Humidity', '2023-05-18', '40', '-0.93'),
(81, '12099313038289 - 2023', 'Relative Humidity', '2018-01-08', '40', '-4.56'),
(82, '12099313038289', '', '2023-05-18', '', ''),
(83, '12099313038289 - 2023', 'Relative Humidity', '2013-10-11', '60', '-5.18'),
(84, '12099313038289 - 2023', 'Relative Humidity', '2014-10-20', '60', '-5.72'),
(85, '12099313038289 - 2023', 'Relative Humidity', '2015-11-02', '60', '-1.59'),
(86, '12099313038289 - 2023', 'Relative Humidity', '2016-11-24', '60', '-3.52'),
(87, '12099313038289 - 2023', 'Relative Humidity', '2018-01-08', '60', '-3.19'),
(88, '12099313038289 - 2023', 'Relative Humidity', '2019-05-03', '60', '-2.37'),
(89, '12099313038289 - 2023', 'Relative Humidity', '2020-12-17', '60', '-2.90'),
(90, '12099313038289 - 2023', 'Relative Humidity', '2023-05-18', '60', '-2.7'),
(91, '12099313038289 - 2023', 'Relative Humidity', '2019-05-03', '80', '1.52'),
(92, '12099313038289 - 2023', 'Relative Humidity', '2020-12-17', '80', '-3.70'),
(93, '12099313038289 - 2023', 'Relative Humidity', '2023-05-18', '80', '-2.9'),
(94, '12099313038289 - 2023', 'Air Temperature', '2013-10-11', '25', '-0.26'),
(95, '12099313038289 - 2023', 'Air Temperature', '2014-10-20', '25', '-0.04'),
(96, '12099313038289 - 2023', '', '2015-11-02', '25', '-0.22'),
(97, '12099313038289 - 2023', '', '2015-11-02', '25', '-0.22'),
(98, '12099313038289 - 2023', 'Air Temperature', '2015-11-02', '25', '-0.22'),
(99, '12099313038289 - 2023', 'Air Temperature', '2016-11-24', '25', '-0.03'),
(100, '12099313038289 - 2023', 'Air Temperature', '2018-01-08', '25', '-0.02'),
(101, '12099313038289 - 2023', 'Air Temperature', '2019-05-03', '25', '-0.03'),
(102, '12099313038289 - 2023', 'Air Temperature', '2020-12-17', '25', '0.04'),
(103, '12099313038289 - 2023', 'Air Temperature', '2022-05-18', '25', '-0.03'),
(104, '61830467', '', '2020-06-16', '', ''),
(105, '61830467', '', '2021-06-08', '', ''),
(106, '', '', '', '', ''),
(107, '', '', '', '', ''),
(108, '', '', '', '', ''),
(109, '12099313038289', '', '', '', ''),
(114, '12099313038289', 'Relative Humidity', '2023-05-18', '40', '-0.93'),
(115, '12099313038289', 'Relative Humidity', '2023-05-18', '60', '-2.7'),
(116, '12099313038289', 'Relative Humidity', '2023-05-18', '80', '-2.9'),
(120, '61830467', '', '2022-11-03', '', ''),
(121, '61830467', '', '2022-11-03', '', ''),
(122, '61830467', '', '2022-11-03', '', ''),
(123, '2023SMCS25638', 'Air Temperature', '2013-10-11', '20', '-0.20'),
(124, '2023SMCS25638', 'Air Temperature', '2014-10-20', '20', '-0.04'),
(125, '2023SMCS25638', 'Air Temperature', '2015-11-02', '20', '-0.15'),
(126, '2023SMCS25638', 'Air Temperature', '2016-11-24', '20', '-0.05'),
(127, '2023SMCS25638', 'Air Temperature', '2018-01-08', '20', '-0.03'),
(128, '2023SMCS25638', 'Air Temperature', '2019-05-03', '20', '0.01'),
(129, '2023SMCS25638', 'Air Temperature', '2020-12-17', '20', '-0.130'),
(130, '2023SMCS25638', 'Air Temperature', '2022-05-18', '20', '-0.03'),
(131, '2023SMCS25638', 'Air Temperature', '2023-07-17', '20', '0.09'),
(132, '2023SMCS25638', 'Air Temperature', '2013-10-11', '25', '-0.26'),
(133, '2023SMCS25638', 'Air Temperature', '2014-10-20', '25', '-0.04'),
(134, '2023SMCS25638', 'Air Temperature', '2015-11-02', '25', '-0.22'),
(135, '2023SMCS25638', 'Air Temperature', '2016-11-24', '25', '-0.03'),
(136, '2023SMCS25638', 'Air Temperature', '2018-01-08', '25', '-0.02'),
(137, '2023SMCS25638', 'Air Temperature', '2019-05-03', '25', '-0.03'),
(138, '2023SMCS25638', 'Air Temperature', '2020-12-17', '25', '0.04'),
(139, '2023SMCS25638', 'Air Temperature', '2022-05-18', '25', '-0.03'),
(140, '2023SMCS25638', 'Air Temperature', '2023-07-17', '25', '0.11'),
(141, '2023SMCS25638', 'Air Temperature', '2013-10-11', '30', '-0.30'),
(142, '2023SMCS25638', 'Air Temperature', '2014-10-20', '30', '-0.1'),
(143, '2023SMCS25638', 'Air Temperature', '2015-11-02', '30', '0.02'),
(144, '2023SMCS25638', 'Air Temperature', '2016-11-24', '30', '-0.09'),
(145, '2023SMCS25638', 'Air Temperature', '2018-01-08', '30', '-0.34'),
(146, '2023SMCS25638', 'Air Temperature', '2019-05-03', '30', '-0.03'),
(147, '2023SMCS25638', 'Air Temperature', '2020-12-17', '30', '0.090'),
(148, '2023SMCS25638', 'Air Temperature', '2022-05-18', '30', '-0.02'),
(149, '2023SMCS25638', 'Air Temperature', '2023-07-17', '30', '0.3'),
(150, '2023SMCS25638', 'Relative Humidity', '2013-10-11', '40', '-4.56'),
(151, '2023SMCS25638', 'Relative Humidity', '2014-10-20', '40', '-5.52'),
(152, '2023SMCS25638', 'Relative Humidity', '2015-11-02', '40', '-2.93'),
(153, '2023SMCS25638', 'Relative Humidity', '2016-11-24', '40', '-4.82'),
(154, '2023SMCS25638', 'Relative Humidity', '2018-01-08', '40', '-4.56'),
(155, '2023SMCS25638', 'Relative Humidity', '2019-05-13', '40', '-4.83'),
(156, '2023SMCS25638', 'Relative Humidity', '2020-12-17', '40', '-0.820'),
(157, '2023SMCS25638', 'Relative Humidity', '2022-05-18', '40', '-0.93'),
(158, '2023SMCS25638', 'Relative Humidity', '2023-08-15', '40', '0.78'),
(159, '2023SMCS25638', 'Relative Humidity', '2013-10-11', '60', '-5.18'),
(160, '2023SMCS25638', 'Relative Humidity', '2014-10-20', '60', '-5.72'),
(161, '2023SMCS25638', 'Relative Humidity', '2015-11-02', '60', '-1.59'),
(162, '2023SMCS25638', 'Relative Humidity', '2016-11-24', '60', '-3.52'),
(163, '2023SMCS25638', 'Relative Humidity', '2018-01-08', '60', '-3.19'),
(164, '2023SMCS25638', 'Relative Humidity', '2019-05-03', '60', '-2.37'),
(165, '2023SMCS25638', 'Relative Humidity', '2020-12-17', '60', '-2.90'),
(166, '2023SMCS25638', 'Relative Humidity', '2022-05-18', '60', '-2.7'),
(167, '2023SMCS25638', 'Relative Humidity', '2023-08-15', '60', '0.59'),
(168, '2023SMCS25638', 'Relative Humidity', '2019-05-03', '80', '1.52'),
(169, '2023SMCS25638', 'Relative Humidity', '2020-12-17', '80', '-3.70'),
(170, '2023SMCS25638', 'Relative Humidity', '2022-05-18', '80', '-2.9'),
(171, '2023SMCS25638', 'Relative Humidity', '2023-08-15', '80', '0.85'),
(172, '5220178', '', '2023-10-12', '', ''),
(174, '5220178', '', '', '', ''),
(177, '12099313038289', '', '', '', ''),
(178, '12099313038289', '', '', '', ''),
(183, '1', '', '0001-01-01', '0', '0'),
(184, '1', '', '2023-07-17', '0', '0'),
(185, '1', '', '2023-07-17', '0', '0'),
(186, '1', 'Air Temperature', '2023-07-17', '0', '0.10'),
(190, 'None Indicated11', '', '2023-07-17', '0', '1.2'),
(191, 'None Indicated11', '', '2023-07-17', '', ''),
(202, '12099313038289---', 'Air Temperature', '2023-07-17', '20', '0.10'),
(203, '12099313038289---', 'Air Temperature', '2023-07-17', '25', '0.12'),
(204, '12099313038289---', 'Air Temperature', '2023-07-17', '30', '0.01'),
(205, '12099313038289---', '', '2023-07-17', '', ''),
(206, '12099313038289---', 'Relative Humidity', '2023-07-17', '', ''),
(207, '12099313038289---', '', '2023-07-17', '', ''),
(209, '12099313038289 - 2024', 'Air Temperature', '2023-08-15', '0', '0.1'),
(210, '12099313038289 - 2024', 'Air Temperature', '2023-08-15', '0', '0.12'),
(211, '12099313038289 - 2024', 'Air Temperature', '2023-08-15', '0', '0.01'),
(212, '12099313038289 - 2024', 'Relative Humidity', '2023-08-15', '', ''),
(213, '12099313038289 - 2024', '', '2023-08-15', '', ''),
(214, '12099313038289 - 2024', '', '2023-08-15', '', ''),
(218, '12099313038289-2023', '', '2023-08-15', '', ''),
(219, '12099313038289-2023', '', '2023-08-15', '', ''),
(220, '12099313038289-2023', '', '2023-08-15', '', ''),
(221, '12099313038289-2023', '', '2023-08-15', '', ''),
(222, '12099313038289-2023', '', '2023-08-15', '', ''),
(223, '12099313038289-2023', '', '2023-08-15', '', ''),
(227, '12099313038289-2023', '', '2023-08-15', '', ''),
(228, '12099313038289-2023', '', '2023-08-15', '', ''),
(229, '12099313038289-2023', '', '2023-08-15', '', ''),
(233, '12099313038289-2023', '', '2023-08-15', '', '1.2'),
(234, '12099313038289-2023', '', '2023-08-15', '', ''),
(235, '12099313038289-2023', '', '2023-08-15', '', '');

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

--
-- Dumping data for table `thermostandarddriftprt`
--

INSERT INTO `thermostandarddriftprt` (`id`, `serialNumber`, `testPoint`, `previousTest`, `currentTest`, `drift`) VALUES
(1, '98769', '', '', '', ''),
(2, '98769', '-30', '-0.04', '', ''),
(3, '98769', '', '', '', ''),
(4, '98769', '', '', '', ''),
(5, '98773', '-40', '-0.020', '-0.001', ''),
(6, '98773', '-30', '-0.010', '', '0.010'),
(7, '98773', '-20', '-0.060', '0.004', '0.064'),
(8, '98773', '-10', '-0.050', '0.004', '0.054000000000000006'),
(9, '98773', '0', '-0.050', '0.000', '0.05'),
(10, '98773', '20', '-0.030', '-0.001', '0.028999999999999998'),
(11, '98773', '50', '-0.060', '0.008', '0.068'),
(12, '98773', '75', '-0.050', '0.014', '0.064'),
(13, '98773', '100', '-0.020', '-0.010', '0.01'),
(14, '98773', '105', '0.350', '-0.021', '0.371'),
(15, '98773', '150', '-0.110', '-0.177', '0.06699999999999999'),
(16, '32452/2', '', '', '', ''),
(17, '32452/2', '', '', '', ''),
(18, '32452/2', '', '', '', ''),
(19, '32452/2', '', '', '', ''),
(20, '32452/2', '', '', '', ''),
(21, '32452/2', '', '', '', ''),
(22, '32452/2', '', '', '', ''),
(23, '32452/2', '', '', '', ''),
(24, '32452/2', '', '', '', ''),
(25, '32452/2', '', '', '', ''),
(26, '32452/2', '', '', '', ''),
(27, '98770 - 2022', '-40', '-0.020', '-0.001', '0.019'),
(28, '98770 - 2022', '-30.000', '', '', ''),
(29, '98770 - 2022', '-20', '-0.060', '0.004', '0.064'),
(30, '98770 - 2022', '-10', '-0.050', '0.004', '0.054000000000000006'),
(31, '98770 - 2022', '0.000', '-0.050', '0.000', '0.05'),
(32, '98770 - 2022', '20', '-0.030', '-0.001', '0.028999999999999998'),
(33, '98770 - 2022', '50', '-0.060', '0.008', '0.068'),
(34, '98770 - 2022', '75', '-0.050', '0.014', '0.064'),
(35, '98770 - 2022', '100', '-0.020', '-0.010', '0.01'),
(36, '98770 - 2022', '105', '0.350', '-0.021', '0.371'),
(37, '98773 - 2022', '-20.000', '0.019', '-0.05', '0.069'),
(38, '98773 - 2022', '-10.000', '0.020', '-0.05', '0.07'),
(39, '98773 - 2022', '0.000', '0.021', '-0.05', '0.07100000000000001'),
(40, '98773 - 2022', '20.000', '0.014', '-0.03', '0.044'),
(41, '98773 - 2022', '50.000', '0.007', '-0.06', '0.067'),
(42, '98773 - 2022', '75.000', '0.005', '-0.05', '0.055'),
(43, '98773 - 2022', '100.000', '0.009', '-0.06', '0.06899999999999999'),
(44, '98773 - 2022', '150.000', '0.050', '-0.09', '0.14'),
(45, '98773 - 2022', '200.000', '0.165', '0.04', '0.125'),
(46, '98773 - 2022', '250.000', '0.08', '-0.17', '0.25'),
(47, '98769 - 2022', '-40', '0.014', '0.009', '0.005000000000000001'),
(48, '98769 - 2022', '-30', '', '', ''),
(49, '98769 - 2022', '-20', '0.026', '0.018', '0.008'),
(50, '98769 - 2022', '-10', '0.034', '0.018', '0.016000000000000004'),
(51, '98769 - 2022', '0', '0.034', '0.016', '0.018000000000000002'),
(52, '98769 - 2022', '20', '', '0.012', ''),
(53, '98769 - 2022', '50', '0.026', '0.019', '0.006999999999999999'),
(54, '98769 - 2022', '75', '0.031', '-0.021', '0.052000000000000005'),
(55, '98769 - 2022', '100', '0.015', '0.021', '0.006000000000000002'),
(56, '98769 - 2022', '105', '', '0.011', ''),
(57, '98769 - 2022', '150', '0.021', '0.029', '0.008'),
(58, '98769 - 2022', '200', '0.049', '0.022', '0.027000000000000003'),
(59, '98769 - 2022', '250', '0.077', '0.040', '0.037'),
(60, '1003508', '-40', '-0.002', '', ''),
(61, '1003508', '', '', '', ''),
(62, '98773 - 2022', '', '', '', ''),
(63, '98773 - 2022', '100', '0.019', '-0.08', '0.099'),
(64, '32452/2 - 2022', '-40', '-0.004', '0.005', '0.009000000000000001'),
(65, '32452/2 - 2022', '-20', '-0.004', '-0.007', '0.003'),
(66, '32452/2 - 2022', '-10', '-0.010', '-0.014', '0.004'),
(67, '32452/2 - 2022', '0', '-0.014', '-0.022', '0.007999999999999998'),
(68, '32452/2 - 2022', '20', '-0.024', '-0.032', '0.008'),
(69, '32452/2 - 2022', '50', '-0.038', '-0.039', '0.0010000000000000009'),
(70, '32452/2 - 2022', '75', '-0.043', '-0.047', '0.0040000000000000036'),
(71, '32452/2 - 2022', '100', '-0.046', '-0.027', '0.019'),
(72, '32452/2 - 2022', '105', '-0.048', '-0.037', '0.011000000000000003'),
(73, '32452/2 - 2022', '150', '-0.046', '-0.036', '0.010000000000000002'),
(74, '32452/2 - 2022', '200', '-0.016', '-0.036', '0.019999999999999997'),
(75, '32452/2 - 2022', '250', '0.065', '-0.014', '0.079'),
(76, '32452/3 - 2022', '-40', '0.030', '0.035', '0.0050000000000000044'),
(77, '32452/3 - 2022', '-20', '0.027', '0.026', '0.0010000000000000009'),
(78, '32452/3 - 2022', '-10', '0.023', '0.019', '0.004'),
(79, '32452/3 - 2022', '0', '0.016', '0.009', '0.007000000000000001'),
(80, '32452/3 - 2022', '20', '0.007', '0.004', '0.003'),
(81, '32452/3 - 2022', '50', '-0.002', '-0.001', '0.001'),
(82, '32452/3 - 2022', '75', '-0.010', '0.003', '0.013000000000000001'),
(83, '32452/3 - 2022', '100', '-0.024', '0.022', '0.046'),
(84, '32452/3 - 2022', '150', '-0.008', '0.008', '0.016'),
(85, '32452/3 - 2022', '200', '0.0000', '0.022', '0.022'),
(86, '32452/3 - 2022', '250', '0.072', '0.065', '0.006999999999999992'),
(87, '32452/2', '', '', '', ''),
(88, '98770 - 2022', '150', '-0.110', '-0.177', '0.06699999999999999'),
(89, '98769-2023', '-40', '0.009', '0.015', '0.006'),
(90, '98769-2023', '-20', '0.018', '0.018', '0'),
(91, '98769-2023', '-10', '0.018', '0.017', '0.0009999999999999974'),
(92, '98769-2023', '0', '0.016', '0.019', '0.002999999999999999'),
(93, '98769-2023', '20', '0.012', '0.012', '0'),
(94, '98769-2023', '30', '', '', ''),
(95, '98769-2023', '50', '0.019', '0.018', '0.0010000000000000009'),
(96, '98769-2023', '75', '-0.021', '0.020', '0.041'),
(97, '98769-2023', '100', '0.021', '0.003', '0.018000000000000002'),
(98, '98769-2023', '105', '0.011', '-0.007', '0.018'),
(99, '98769-2023', '150', '0.029', '-0.162', '0.191'),
(100, '98769-2023', '200', '0.022', '-0.087', '0.10899999999999999'),
(101, '98769-2023', '250', '0.040', '-0.136', '0.17600000000000002'),
(102, '98773', '200', '0.030', '-0.100', '0.13'),
(103, '1003508', '', '', '', ''),
(104, '1003508', '-10', '0.002', '-0.31', '0.312'),
(105, '1003508', '0', '0.001', '-0.13', '0.131'),
(106, '1003508', '20', '0.007', '-0.35', '0.357'),
(107, '1003508', '50', '0.031', '0', '0.031'),
(108, '1003508', '75', '0.043', '0.24', '0.197'),
(109, '1003508', '100', '0.092', '0.02', '0.072'),
(110, '1003508', '105', '0.085', '', ''),
(111, '1003508', '', '', '', ''),
(112, '1003508', '200', '0.161', '0.42', '0.259'),
(113, '1003508', '250', '0.205', '0.57', '0.365'),
(114, '98770 - 2022', '200', '0.030', '-0.100', '0.13'),
(115, '98770 - 2022', '250', '-0.180', '-0.145', '0.035'),
(116, '98770 - 2023', '-40.000', '0', '-0.001', '0'),
(117, '98773 - 2023', '-40.000', '', '', ''),
(118, '98773 - 2023', '', '', '', ''),
(119, '98773 - 2023', '-20.000', '-0.050', '0.002', '0.052000000000000005'),
(120, '98773 - 2023', '-10.000', '-0.050', '0.006', '0.056'),
(121, '98773 - 2023', '0.000', '-0.050', '0.006', '0.056'),
(122, '98773 - 2023', '20.000', '-0.030', '0.007', '0.037'),
(123, '98773 - 2023', '30.000', '', '0.008', ''),
(124, '98773 - 2023', '50.000', '-0.060', '0.009', '0.06899999999999999'),
(125, '98773 - 2023', '75.000', '-0.050', '0.009', '0.059000000000000004'),
(126, '98773 - 2023', '100.000', '-0.060', '0.009', '0.06899999999999999'),
(127, '98773 - 2023', '105.000', '-0.080', '0.008', '0.088'),
(128, '98773 - 2023', '150.000', '-0.090', '0.005', '0.095'),
(129, '98773 - 2023', '200.000', '0.040', '0.010', '0.03'),
(130, '98773 - 2023', '250', '-0.170', '0.006', '0.17600000000000002'),
(131, '98770 - 2023', '-30.000', '-0.020', '', ''),
(132, '98770 - 2023', '-20.000', '-0.060', '0.004', '0.064'),
(133, '98770 - 2023', '-10.000', '-0.050', '0.004', '0.054000000000000006'),
(134, '98770 - 2023', '0.000', '-0.050', '0.000', '0.05'),
(135, '98770 - 2023', '20.000', '-0.030', '-0.001', '0.028999999999999998'),
(136, '98770 - 2023', '50.000', '-0.060', '0.008', '0.068'),
(137, '98770 - 2023', '75', '-0.050', '0.014', '0.064'),
(138, '98770 - 2023', '100', '-0.020', '-0.010', '0.01'),
(139, '98770 - 2023', '105', '0.350', '-0.021', '0.371'),
(140, '98770 - 2023', '150', '-0.110', '-0.177', '0.06699999999999999'),
(141, '98770 - 2023', '200', '0.030', '-0.100', '0.13'),
(142, '98770 - 2023', '250', '-0.180', '-0.145', '0.035'),
(143, '98770 - 2023', '', '', '', ''),
(144, '98773-2024', '-40.000', '0', '0.003', '0.003'),
(145, '98773-2024', '-30.000', '-0.010', '0.005', '0.015'),
(146, '98773-2024', '-20.000', '-0.050', '0.002', '0.052000000000000005'),
(147, '98773-2024', '-10.000', '-0.050', '0.006', '0.056'),
(148, '98773-2024', '0.000', '-0.050', '0.006', '0.056'),
(149, '98773-2024', '20.000', '-0.030', '0.007', '0.037'),
(150, '98773-2024', '30.000', '0', '0.008', '0.008'),
(151, '98773-2024', '50.000', '-0.060', '0.009', '0.06899999999999999'),
(152, '98773-2024', '75.000', '-0.050', '0.009', '0.059000000000000004'),
(153, '98773-2024', '100.000', '-0.060', '0.009', '0.06899999999999999'),
(154, '98773-2024', '105.000', '-0.080', '0.008', '0.088'),
(155, '98773-2024', '150.000', '-0.090', '0.005', '0.095'),
(156, '98773-2024', '200.000', '0.040', '0.010', '0.03'),
(157, '98773-2024', '250', '-0.170', '0.006', '0.17600000000000002'),
(158, '98773 - 2024', '', '', '', ''),
(159, '98773 - 2024', '', '', '', ''),
(160, '98773 - 2024', '-20.000', '-0.050', '0.0020', '0.052000000000000005'),
(161, '98773 - 2024', '-10.000', '-0.050', '0.0057', '0.0557'),
(162, '98773 - 2024', '0.000', '-0.050', '0.0061', '0.056100000000000004'),
(163, '98773 - 2024', '20.000', '-0.030', '0.0072', '0.0372'),
(164, '98773 - 2024', '30.000', '0', '0.0085', '0.0085'),
(165, '98773 - 2024', '50.000', '-0.060', '0.0091', '0.0691'),
(166, '98773 - 2024', '75.000', '-0.050', '0.0094', '0.0594'),
(167, '98773 - 2024', '100.000', '-0.060', '0.0092', '0.0692'),
(168, '98773 - 2024', '105.000', '-0.080', '0.0082', '0.0882'),
(169, '98773 - 2024', '150.000', '-0.090', '0.0052', '0.09519999999999999'),
(170, '98773 - 2024', '200.000', '0.040', '0.0098', '0.0302'),
(171, '98773 - 2024', '250.000', '-0.17', '0.0057', '0'),
(172, '98769', '', '', '', ''),
(173, '1003058-2024', '', '', '', ''),
(174, '98769-latest 2024', '', '', '', '');

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

--
-- Dumping data for table `thermostandardtable`
--

INSERT INTO `thermostandardtable` (`id`, `standard`, `manufacturer`, `modelNumber`, `serialNumber`, `certificateNumber`, `dateOfCali`, `dateOfNextCali`, `standardUsed`, `stdResolutionTemp`, `stdResolutionRH`, `issuingLab`, `coverageFactor`, `status`) VALUES
(11, 'Platinum Resistance Thermometer with Digital Readout--', 'ISOTECH', '935-14-116', '32452/2', '05-2023-DT-0035', '2023-06-24', '2024-06-24', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(17, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '1003508', '12-2021-DT-0216', '2022-03-11', '2023-03-10', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)', '2', 'active'),
(18, 'Platinum Resistance Thermometer with Digital Readout', 'ISOTECH', '935-14-116', '32452/2 - 2022', '05-2022-DT-0124', '2022-06-24', '2023-06-23', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)', '2', 'active'),
(19, 'Platinum Resistance Thermometer with Digital Readout', 'ISOTECH', '935-14-116', '32452/3 - 2022', '05-2022-DT-0124', '2022-06-24', '2023-06-24', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)', '2', 'active'),
(33, 'Digital Thermometer with Probe', 'Fluke', '1551A', '4010016-latest 2024', '05-2023-DT-0036', '2024-01-01', '2024-01-01', 'Digital Thermometer with Probe', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(37, 'PRT w/ Readout', 'Measurement Specialties', 'R-10625-1', '98770', '03-2023-DT-0022', '2023-05-04', '2024-05-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(48, 'Temperature and Humidity Trasmitter', 'Electronik', 'EE31', '12099313038289-2023', '2023SMCS28934 & 2023SMCS25638', '2023-08-15', '2023-08-15', 'Temperature and Humidity Trasmitter', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(50, 'Humidity and Temperature Data Logger ', 'Rotronic', 'None', '5220178-No drift', '02-2023-RH-0036', '2023-03-06', '2023-03-06', 'Humidity and Temperature Data Logger ', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(51, 'Platinum Resistance Thermometer with Digital Readout', 'Fluke', '5615', '1003058-2024', '23T12125', '2024-03-13', '2024-03-13', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(52, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98773--2024', '23T6941/1', '2024-08-04', '2024-08-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.							', '2', 'active'),
(53, 'Humidity and Temperature Data Logger ', 'Rotronic', 'None', '5220178', '02-2023-RH-0036', '2023-03-06', '2023-03-06', 'Humidity and Temperature Data Logger ', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(54, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98769-2024', '03-2023-DT-0021', '2024-05-04', '2024-05-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(55, 'Temperature and Humidity Trasmitter', 'Electronik', 'EE31', '12099313038289-2023-RH No Drift', '2023SMCS28934 & 2023SMCS25638', '2023-08-15', '2023-08-15', 'Temperature and Humidity Trasmitter', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(56, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98773, 2024, Thermometer', '23T6941/1', '2024-08-04', '2024-08-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.							', '2', 'active'),
(57, 'Platinum Resistance Thermometer with Digital Readout', 'Fluke', '5615', '1003058-2024 Thermometer', '23T12125', '2024-03-13', '2024-03-13', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(58, 'PRT w/ Readout', 'Measurement Specialties', 'R-10625-1', '98770-thermometer', '03-2023-DT-0022', '2023-05-04', '2023-05-04', 'PRT w/ Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(59, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98769-2024 thermomerter', '03-2023-DT-0021', '2024-05-04', '2024-05-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(62, 'Humidity and Temperature Data Logger ', 'Rotronic', 'HL-NT2-D', '61830467', '2023SMCS45777', '2024-01-04', '2025-01-04', 'Humidity and Temperature Data Logger ', '0.001', '0.01', 'Southern Metrology and Calibration Services, Inc.', '2', 'active'),
(65, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98769-latest 2024', '03-2023-DT-0021', '2024-04-04', '2024-04-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(66, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98770-latest 2024', '03-2023-DT-0022', '2024-05-04', '2024-05-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'NML (Philippines)', '2', 'active'),
(67, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98773-latest 2024', '23T6941/1', '2024-08-04', '2024-08-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(68, 'Platinum Resistance Thermometer with Digital Readout', 'Fluke', '5615', '1003058-latest 2024', 'MIRDC-022023-INS-0134A', '2024-03-13', '2024-03-13', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(71, 'Platinum Resistance Thermometer with Digital Readout', 'Fluke (BEND)', '5609', '03304-latest 2024', 'MIRDC-022023-INS-0134A', '2024-03-13', '2024-03-13', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active'),
(72, 'Platinum Resistance Thermometer with Digital Readout', 'Isotech', 'Isotech', '32452/2-latest 2024', '05-2023-DT-0035', '2024-06-08', '2024-06-08', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.							', '2', 'active'),
(73, 'Platinum Resistance Thermometer with Digital Readout', 'Isotech', '935-14-116', '32452/3-latest 2024', '05-2023-DT-0035', '2024-06-08', '2024-06-08', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '0.01', 'Quality Calibration Co., Ltd.', '2', 'active');

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

--
-- Dumping data for table `thermostandardtestpoints`
--

INSERT INTO `thermostandardtestpoints` (`id`, `serialNumber`, `testPoint`, `unit`, `RML`, `NML`, `correction`, `readoutStandardUncertaintyFromCertificate`, `uncertainty`, `previousRML`, `drift`, `range`, `res`, `readability`, `coverageFactor`) VALUES
(71, '98770 - 2022', '-40.000', 'Temperature', '-40.075', '-40.076', '-0.0009999999999976694', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(72, '98770 - 2022', '-20.000', 'Temperature', '-20.030', '-20.026', '0.004000000000001336', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(73, '98770 - 2022', '-10.000', 'Temperature', '-9.988', '-9.984', '0.0039999999999995595', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(74, '98770 - 2022', '0.000', 'Temperature', '-0.005', '-0.005', '0.000', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(75, '98770 - 2022', '20.000', 'Temperature', '20.029', '20.028', '-0.0010000000000012221', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(76, '98770 - 2022', '50.000', 'Temperature', '50.055', '50.063', '0.008000000000002672', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(77, '98770 - 2022', '75.000', 'Temperature', '75.048', '75.062', '0.013999999999995794', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(78, '98770 - 2022', '100.000', 'Temperature', '100.074', '100.064', '-0.010000000000005116', '0', '0.160', NULL, NULL, NULL, NULL, NULL, '2'),
(79, '98770 - 2022', '105.000', 'Temperature', '150.106', '149.929', '-0.1769999999999925', '0', '0.170', NULL, NULL, NULL, NULL, NULL, '2'),
(80, '98770 - 2022', '150.000', 'Temperature', '150.106', '149.929', '-0.1769999999999925', '0', '0.170', NULL, NULL, NULL, NULL, NULL, '2'),
(81, '98770 - 2022', '200.000', 'Temperature', '200.005', '199.905', '-0.09999999999999432', '0', '0.170', NULL, NULL, NULL, NULL, NULL, '2'),
(82, '98770 - 2022', '250.000', 'Temperature', '250.033', '249.888', '-0.1449999999999818', '0', '0.170', NULL, NULL, NULL, NULL, NULL, '2'),
(108, '12099313038289 - 2023', '20', 'Temperature', '20.46', '20.43', '-0.030000000000001137', '0.000', '0.29000', NULL, NULL, NULL, NULL, NULL, '2'),
(109, '12099313038289 - 2023', '25', 'Temperature', '25.32', '25.29', '-0.030000000000001137', '0.000', '0.38000', NULL, NULL, NULL, NULL, NULL, '2'),
(110, '12099313038289 - 2023', '30', 'Temperature', '30.38', '30.36', '-0.019999999999999574', '0.000', '0.52000', NULL, NULL, NULL, NULL, NULL, '2'),
(111, '12099313038289 - 2023', '40', 'Relative Humidity', '41.100', '40.1700', '-0.9299999999999997', '0.000', '0.71', NULL, NULL, NULL, NULL, NULL, '2'),
(112, '12099313038289 - 2023', '60', 'Relative Humidity', '62.600', '59.9000', '-2.700000000000003', '0.000', '1.00', NULL, NULL, NULL, NULL, NULL, '2'),
(113, '12099313038289 - 2023', '80', 'Relative Humidity', '82.9', '80', '-2.9000000000000057', '0.000', '1.9', NULL, NULL, NULL, NULL, NULL, '2'),
(114, '1003508', '-30', 'Temperature', '-29.110', '-30.0400', '-0.9299999999999997', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(115, '1003508', '-20', 'Temperature', '-19.430', '-20.0200', '-0.5899999999999999', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(116, '1003508', '-10', 'Temperature', '-9.690', '-10.0000', '-0.3100000000000005', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(117, '1003508', '0', 'Temperature', '0.090', '-0.0400', '-0.13', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(118, '1003508', '20', 'Temperature', '20.350', '20.0000', '-0.3500000000000014', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(119, '1003508', '50', 'Temperature', '50.010', '50.0100', '0', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(120, '1003508', '75', 'Temperature', '74.760', '75.0000', '0.23999999999999488', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(121, '1003508', '100', 'Temperature', '99.970', '99.9900', '0.01999999999999602', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(122, '1003508', '105', 'Temperature', '105.017', '105.102', '0.08500000000000796', '0', '0.39', NULL, NULL, NULL, NULL, NULL, '2'),
(123, '1003508', '150', 'Temperature', '150.170', '150.0000', '-0.1699999999999875', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(124, '1003508', '200', 'Temperature', '199.580', '200.0000', '0.4199999999999875', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(125, '1003508', '250', 'Temperature', '249.460', '250.0300', '0.5699999999999932', '0', '0.27', NULL, NULL, NULL, NULL, NULL, '2'),
(127, '32452/3', '0', 'Temperature', '0.018', '-0.004', '-0.022', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(128, '32452/3', '-40', 'Temperature', '-40.065', '-40.060', '0.0049999999999954525', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(129, '32452/3', '-20', 'Temperature', '-20.011', '-20.018', '-0.0070000000000014495', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(130, '32452/3', '-10', 'Temperature', '-9.998', '-10.012', '-0.014000000000001123', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(131, '32452/3', '20', 'Temperature', '20.051', '20.019', '-0.03200000000000003', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(132, '32452/3', '50', 'Temperature', '50.074', '50.035', '-0.03900000000000148', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(133, '32452/3', '75', 'Temperature', '75.079', '75.032', '-0.046999999999997044', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(134, '32452/3', '100', 'Temperature', '100.135', '100.108', '-0.027000000000001023', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(135, '32452/3', '105', 'Temperature', '105.115', '105.078', '-0.03699999999999193', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(136, '32452/3', '150', 'Temperature', '150.126', '150.090', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(137, '32452/3', '200', 'Temperature', '199.979', '199.943', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(138, '32452/3', '250', 'Temperature', '249.946', '249.932', '-0.014000000000010004', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(139, '32452/2 - 2022', '-40', 'Temperature', '-40.065', '-40.060', '0.0049999999999954525', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(140, '32452/2 - 2022', '-20', 'Temperature', '-20.011', '-20.018', '-0.0070000000000014495', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(141, '32452/2 - 2022', '-10', 'Temperature', '-9.998', '-10.012', '-0.014000000000001123', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(142, '32452/2 - 2022', '0', 'Temperature', '0.018', '-0.004', '-0.022', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(143, '32452/2 - 2022', '20', 'Temperature', '20.051', '20.019', '-0.03200000000000003', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(144, '32452/2 - 2022', '50', 'Temperature', '50.074', '50.035', '-0.03900000000000148', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(145, '32452/2 - 2022', '75', 'Temperature', '75.079', '75.032', '-0.046999999999997044', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(146, '32452/2 - 2022', '100', 'Temperature', '100.135', '100.108', '-0.027000000000001023', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(147, '32452/2 - 2022', '105', 'Temperature', '105.115', '105.078', '-0.03699999999999193', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(148, '32452/2 - 2022', '150', 'Temperature', '150.126', '150.090', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(149, '32452/2 - 2022', '200', 'Temperature', '199.979', '199.943', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(150, '32452/2 - 2022', '250', 'Temperature', '249.946', '249.932', '-0.014000000000010004', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(151, '32452/3 - 2022', '-40', 'Temperature', '-40.095', '-40.060', '0.03499999999999659', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(152, '32452/3 - 2022', '-20', 'Temperature', '-20.044', '-20.018', '0.0259999999999998', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(153, '32452/3 - 2022', '-10', 'Temperature', '-10.031', '-10.012', '0.019000000000000128', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(154, '32452/3 - 2022', '0', 'Temperature', '-0.013', '-0.004', '0.009', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(155, '32452/3 - 2022', '20', 'Temperature', '20.015', '20.019', '0.003999999999997783', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(156, '32452/3 - 2022', '50', 'Temperature', '50.036', '50.035', '-0.0010000000000047748', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(157, '32452/3 - 2022', '75', 'Temperature', '75.029', '75.032', '0.0030000000000001137', '0', '0.12', NULL, NULL, NULL, NULL, NULL, '2'),
(158, '32452/3 - 2022', '100', 'Temperature', '100.086', '100.108', '0.02200000000000557', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(159, '32452/3 - 2022', '105', 'Temperature', '105.060', '105.078', '0.018000000000000682', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(160, '32452/3 - 2022', '150', 'Temperature', '150.082', '150.090', '0.008000000000009777', '0', '0.14', NULL, NULL, NULL, NULL, NULL, '2'),
(161, '32452/3 - 2022', '200', 'Temperature', '199.921', '199.943', '0.02200000000001978', '0', '0.14', NULL, NULL, NULL, NULL, NULL, '2'),
(162, '32452/3 - 2022', '250', 'Temperature', '249.867', '249.932', '0.06499999999999773', '0', '0.13', NULL, NULL, NULL, NULL, NULL, '2'),
(200, '4010016', '-40', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(201, '4010016', '-20', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(202, '4010016', '-10', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(203, '4010016', '0', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(204, '4010016', '20', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(205, '4010016', '50', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(206, '4010016', '75', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(207, '4010016', '100', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(208, '4010016', '150', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2'),
(236, '98770', '-40', 'Temperature', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, '0'),
(237, '98770', '-20', 'Temperature', '-19.940', '-20.030', '-0.08999999999999986', '0', '0.160', '-20.030', '0.08999999999999986', NULL, NULL, NULL, '2'),
(238, '98770', '-10', 'Temperature', '-9.990', '-9.988', '0.002000000000000668', '0', '0.160', '-9.988', '0.002000000000000668', NULL, NULL, NULL, '2'),
(239, '98770', '0', 'Temperature', '-0.060', '-0.005', '0.055', '0', '0.160', '-0.005', '0.055', NULL, NULL, NULL, '2'),
(240, '98770', '20', 'Temperature', '20.040', '20.029', '-0.010999999999999233', '0', '0.160', '20.029', '0.010999999999999233', NULL, NULL, NULL, '2'),
(241, '98770', '50', 'Temperature', '50.030', '50.055', '0.02499999999999858', '0', '0.160', '50.055', '0.02499999999999858', NULL, NULL, NULL, '2'),
(242, '98770', '75', 'Temperature', '75.030', '75.048', '0.018000000000000682', '0', '0.160', '75.048', '0.018000000000000682', NULL, NULL, NULL, '2'),
(243, '98770', '100', 'Temperature', '100.030', '100.074', '0.04399999999999693', '0', '0.160', '100.074', '0.04399999999999693', NULL, NULL, NULL, '2'),
(244, '98770', '105', 'Temperature', '105.050', '105.060', '0.010000000000005116', '0', '0.160', '105.060', '0.010000000000005116', NULL, NULL, NULL, '2'),
(245, '98770', '150', 'Temperature', '150.100', '150.106', '0.006000000000000227', '0', '0.170', '150.106', '0.006000000000000227', NULL, NULL, NULL, '2'),
(246, '98770', '200', 'Temperature', '199.920', '200.005', '0.08500000000000796', '0', '0.170', '200.005', '0.08500000000000796', NULL, NULL, NULL, '2'),
(247, '98770', '250', 'Temperature', '250.150', '250.033', '-0.11700000000001864', '0', '0.170', '250.033', '0.11700000000001864', NULL, NULL, NULL, '2'),
(299, 'None Indicated11', '-30', 'Temperature', '-29.110', '-30.0400', '-0.9299999999999997', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(300, 'None Indicated11', '-20', 'Temperature', '-19.430', '-20.0200', '-0.5899999999999999', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(301, 'None Indicated11', '-10', 'Temperature', '-9.690', '-10.0000', '-0.3100000000000005', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(302, 'None Indicated11', '0', 'Temperature', '0.090', '-0.0400', '-0.13', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(303, 'None Indicated11', '20', 'Temperature', '20.350', '20.0000', '-0.3500000000000014', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(304, 'None Indicated11', '50', 'Temperature', '50.010', '50.0100', '0', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(305, 'None Indicated11', '75', 'Temperature', '74.760', '75.0000', '0.23999999999999488', '00.27000', '', NULL, NULL, NULL, NULL, NULL, NULL),
(306, 'None Indicated11', '100', 'Temperature', '99.970', '99.9900', '0.01999999999999602', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(307, 'None Indicated11', '150', 'Temperature', '150.170', '150.0000', '-0.1699999999999875', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(308, 'None Indicated11', '200', 'Temperature', '199.580', '200.0000', '0.4199999999999875', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(309, 'None Indicated11', '250', 'Temperature', '249.460', '250.0300', '0.5699999999999932', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(310, 'None Indicated11', '0', 'Temperature', '0.000', '0.0000', '0', '0', '0.27000', NULL, NULL, NULL, NULL, NULL, NULL),
(311, 'None Indicated11', '40', 'Relative Humidity', '41.27', '39.991', '-1.2790000000000035', '0', '0.82', NULL, NULL, NULL, NULL, NULL, NULL),
(312, 'None Indicated11', '60', 'Relative Humidity', '60.48', '60.086', '-0.39399999999999835', '0', '1.3', NULL, NULL, NULL, NULL, NULL, NULL),
(313, 'None Indicated11', '80', 'Relative Humidity', '80.20', '79.907', '-0.29300000000000637', '0', '2.2', NULL, NULL, NULL, NULL, NULL, NULL),
(349, '12099313038289-2023', '20', 'Temperature', '20.36', '20.45', '0.08999999999999986', '0', '0.34', '20.46', '0.10000000000000142', NULL, NULL, NULL, '2'),
(350, '12099313038289-2023', '25', 'Temperature', '25.44', '25.55', '0.10999999999999943', '0', '0.34', '25.32', '0.120000000000001', NULL, NULL, NULL, '2'),
(351, '12099313038289-2023', '30', 'Temperature', '30.39', '30.69', '0.3000000000000007', '0', '0.34', '30.38', '0.010000000000001563', NULL, NULL, NULL, '2'),
(352, '12099313038289-2023', '40', 'Relative Humidity', '39.9', '40.68', '0.7800000000000011', '0', '1.3', '41.1', '1.2000000000000028', NULL, NULL, NULL, '2'),
(355, '12099313038289-2023', '60', 'Relative Humidity', '59.6', '60.19', '0.5899999999999963', '0', '1.5', '62.6', '3', NULL, NULL, NULL, '2'),
(357, '12099313038289-2023', '80', 'Relative Humidity', '79.1', '79.95', '0.8500000000000085', '0', '1.3', '82.9', '3.8000000000000114', NULL, NULL, NULL, '2'),
(372, '5220178-2024', '20', 'Temperature', '20.40', '20.333', '-0.06700000000000017', '0', '0.33', NULL, NULL, NULL, NULL, NULL, NULL),
(373, '5220178-2024', '25', 'Temperature', '25.28', '25.215', '-0.06500000000000128', '0', '0.41', NULL, NULL, NULL, NULL, NULL, NULL),
(374, '5220178-2024', '30', 'Temperature', '30.33', '30.251', '-0.07899999999999707', '0', '0.54', NULL, NULL, NULL, NULL, NULL, NULL),
(375, '5220178-2024', '40', 'Relative Humidity', '41.27', '39.991', '-1.2790000000000035', '0', '0.82', NULL, NULL, NULL, NULL, NULL, NULL),
(376, '5220178-2024', '60', 'Relative Humidity', '60.48', '60.086', '-0.39399999999999835', '0', '1.3', NULL, NULL, NULL, NULL, NULL, NULL),
(377, '5220178-2024', '80', 'Relative Humidity', '80.22', '79.907', '-0.3130000000000024', '0', '2.2', NULL, NULL, NULL, NULL, NULL, NULL),
(382, '5220178-No drift', '20', 'Temperature', '20.40', '20.333', '-0.06700000000000017', '0', '0.33', '20.40', '0', NULL, NULL, NULL, '2'),
(383, '5220178-No drift', '25', 'Temperature', '25.28', '25.215', '-0.06500000000000128', '0', '0.41', '25.28', '0', NULL, NULL, NULL, '2'),
(384, '5220178-No drift', '30', 'Temperature', '30.33', '30.251', '-0.07899999999999707', '0', '0.54', '30.33', '0', NULL, NULL, NULL, '2'),
(385, '5220178-No drift', '40', 'Relative Humidity', '41.27', '39.991', '-1.2790000000000035', '0', '0.82', '41.27', '0', NULL, NULL, NULL, '2'),
(386, '5220178-No drift', '60', 'Relative Humidity', '60.48', '60.086', '-0.39399999999999835', '0', '1.3', '60.48', '0', NULL, NULL, NULL, '2'),
(387, '5220178-No drift', '80', 'Relative Humidity', '80.22', '79.907', '-0.3130000000000024', '0', '2.2', '80.22', '0', NULL, NULL, NULL, '2'),
(406, '98773--2024', '-30', 'Temperature', '-29.980', '-30.004', '-0.02400000000000091', '0', '0.06200', '-30.004', '0.02400000000000091', NULL, NULL, NULL, '2'),
(407, '98773--2024', '-20', 'Temperature', '-19.950', '-20.006', '-0.05600000000000094', '0', '0.06200', '-20.006', '0.05600000000000094', NULL, NULL, NULL, '2'),
(408, '98773--2024', '-10', 'Temperature', '-9.990', '-10.001', '-0.010999999999999233', '0', '0.06200', '-10.001', '0.010999999999999233', NULL, NULL, NULL, '2'),
(409, '98773--2024', '0', 'Temperature', '0.060', '-0.002', '-0.062', '0', '0.06200', '-0.002', '0.062', NULL, NULL, NULL, '2'),
(410, '98773--2024', '20', 'Temperature', '20.040', '20.003', '-0.036999999999999034', '0', '0.06200', '20.003', '0.036999999999999034', NULL, NULL, NULL, '2'),
(411, '98773--2024', '50', 'Temperature', '50.030', '49.999', '-0.030999999999998806', '0', '0.06200', '49.999', '0.030999999999998806', NULL, NULL, NULL, '2'),
(412, '98773--2024', '75', 'Temperature', '75.030', '75.002', '-0.028000000000005798', '0', '0.06200', '75.002', '0.028000000000005798', NULL, NULL, NULL, '2'),
(413, '98773--2024', '100', 'Temperature', '100.050', '100.006', '-0.04399999999999693', '0', '0.06200', '100.006', '0.04399999999999693', NULL, NULL, NULL, '2'),
(414, '98773--2024', '105', 'Temperature', '105.120', '105.001', '-0.11899999999999977', '0', '0.06200', '105.001', '0.11899999999999977', NULL, NULL, NULL, '2'),
(415, '98773--2024', '150', 'Temperature', '150.080', '150.004', '-0.07600000000002183', '0', '0.06200', '150.004', '0.07600000000002183', NULL, NULL, NULL, '2'),
(416, '98773--2024', '200', 'Temperature', '199.910', '200.074', '0.1640000000000157', '0', '0.06200', '200.074', '0.1640000000000157', NULL, NULL, NULL, '2'),
(417, '98773--2024', '250', 'Temperature', '250.14', '250.066', '-0.07399999999998386', '0', '0.23000', '250.066', '0.07399999999998386', NULL, NULL, NULL, '2'),
(430, '5220178', '20', 'Temperature', '20.40', '20.333', '-0.06700000000000017', '0', '0.33', '20.40', '0', NULL, NULL, NULL, '2'),
(431, '5220178', '25', 'Temperature', '25.28', '25.215', '-0.06500000000000128', '0', '0.41', '25.28', '0', NULL, NULL, NULL, '2'),
(432, '5220178', '30', 'Temperature', '30.33', '30.251', '-0.07899999999999707', '0', '0.54', '30.33', '0', NULL, NULL, NULL, '2'),
(433, '5220178', '40', 'Relative Humidity', '41.27', '39.991', '-1.2790000000000035', '0', '0.82', '41.27', '0', NULL, NULL, NULL, '2'),
(434, '5220178', '60', 'Relative Humidity', '60.48', '60.086', '-0.39399999999999835', '0', '1.3', '60.48', '0', NULL, NULL, NULL, '2'),
(435, '5220178', '80', 'Relative Humidity', '80.20', '79.907', '-0.29300000000000637', '0', '2.2', '80.20', '0', NULL, NULL, NULL, '2'),
(436, '98769-2024', '-40', 'Temperature', '-40.091', '-40.047', '0.044000000000004036', '0', '0.160', '-40.047', '0.044000000000004036', NULL, NULL, NULL, '2'),
(437, '98769-2024', '-20', 'Temperature', '-20.044', '-20.032', '0.012000000000000455', '0', '0.160', '-20.032', '0.012000000000000455', NULL, NULL, NULL, '2'),
(438, '98769-2024', '-10', 'Temperature', '-10.052', '-10.001', '0.051000000000000156', '0', '0.160', '-10.001', '0.051000000000000156', NULL, NULL, NULL, '2'),
(439, '98769-2024', '0', 'Temperature', '-0.024', '-0.005', '0.019', '0', '0.160', '-0.024', '0', NULL, NULL, NULL, '2'),
(440, '98769-2024', '20', 'Temperature', '19.995', '20.016', '0.020999999999997243', '0', '0.160', '20.016', '0.020999999999997243', NULL, NULL, NULL, '2'),
(441, '98769-2024', '50', 'Temperature', '50.012', '50.045', '0.03300000000000125', '0', '0.160', '50.045', '0.03300000000000125', NULL, NULL, NULL, '2'),
(442, '98769-2024', '75', 'Temperature', '75.050', '75.042', '-0.007999999999995566', '0', '0.160', '75.042', '0.007999999999995566', NULL, NULL, NULL, '2'),
(443, '98769-2024', '100', 'Temperature', '100.095', '100.061', '-0.033999999999991815', '0', '0.160', '100.061', '0.033999999999991815', NULL, NULL, NULL, '2'),
(444, '98769-2024', '105', 'Temperature', '105.091', '105.046', '-0.044999999999987494', '0', '0.160', '105.046', '0.044999999999987494', NULL, NULL, NULL, '2'),
(445, '98769-2024', '150', 'Temperature', '149.997', '150.091', '0.09399999999999409', '0', '0.170', '150.091', '0.09399999999999409', NULL, NULL, NULL, '2'),
(446, '98769-2024', '200', 'Temperature', '200.011', '199.992', '-0.019000000000005457', '0', '0.170', '199.992', '0.019000000000005457', NULL, NULL, NULL, '2'),
(447, '98769-2024', '250', 'Temperature', '249.924', '250.024', '0.09999999999999432', '0', '0.170', '250.024', '0.09999999999999432', NULL, NULL, NULL, '2'),
(448, '12099313038289-2023-RH No Drift', '20', 'Temperature', '20.36', '20.45', '0.08999999999999986', '0', '0.34', '20.46', '0.10000000000000142', NULL, NULL, NULL, '2'),
(449, '12099313038289-2023-RH No Drift', '25', 'Temperature', '25.44', '25.55', '0.10999999999999943', '0', '0.34', '25.32', '0.120000000000001', NULL, NULL, NULL, '2'),
(450, '12099313038289-2023-RH No Drift', '30', 'Temperature', '30.39', '30.69', '0.3000000000000007', '0', '0.34', '30.38', '0.010000000000001563', NULL, NULL, NULL, '2'),
(451, '12099313038289-2023-RH No Drift', '40', 'Relative Humidity', '39.9', '40.68', '0.7800000000000011', '0', '1.3', '39.9', '0', NULL, NULL, NULL, '2'),
(452, '12099313038289-2023-RH No Drift', '45', 'Relative Humidity', '45.2', '46.09', '0.8900000000000006', '0', '1.3', '45.2', '0', NULL, NULL, NULL, '2'),
(453, '12099313038289-2023-RH No Drift', '50', 'Relative Humidity', '50.3', '51.21', '0.9100000000000037', '0', '1.4', '50.3', '0', NULL, NULL, NULL, '2'),
(454, '12099313038289-2023-RH No Drift', '60', 'Relative Humidity', '59.6', '60.19', '0.5899999999999963', '0', '1.5', '59.6', '0', NULL, NULL, NULL, '2'),
(455, '12099313038289-2023-RH No Drift', '70', 'Relative Humidity', '69.4', '70.12', '0.7199999999999989', '0', '1.4', '69.4', '0', NULL, NULL, NULL, '2'),
(456, '12099313038289-2023-RH No Drift', '80', 'Relative Humidity', '79.1', '79.95', '0.8500000000000085', '0', '1.3', '79.1', '0', NULL, NULL, NULL, '2'),
(457, '98773, 2024', '-30.000', 'Temperature', '-30.004', '-29.98', '0.02400000000000091', '0', '0.062', '-29.98', '0.02400000000000091', NULL, NULL, NULL, '2'),
(458, '98773, 2024', '-20.000', 'Temperature', '-20.006', '-19.95', '0.05600000000000094', '0', '0.062', '-19.95', '0.05600000000000094', NULL, NULL, NULL, '2'),
(459, '98773, 2024', '-10.000', 'Temperature', '-10.001', '-9.99', '0.010999999999999233', '0', '0.062', '-9.99', '0.010999999999999233', NULL, NULL, NULL, '2'),
(460, '98773, 2024', '0.000', 'Temperature', '0.06', '-0.002', '-0.062', '0', '0.062', '-0.002', '0.062', NULL, NULL, NULL, '2'),
(461, '98773, 2024', '20.000', 'Temperature', '20.04', '20.003', '-0.036999999999999034', '0', '0.062', '20.003', '0.036999999999999034', NULL, NULL, NULL, '2'),
(462, '98773, 2024', '50.000', 'Temperature', '50.03', '49.999', '-0.030999999999998806', '0', '0.062', '49.999', '0.030999999999998806', NULL, NULL, NULL, '2'),
(463, '98773, 2024', '75.000', 'Temperature', '75.03', '75.002', '-0.028000000000005798', '0', '0.062', '75.002', '0.028000000000005798', NULL, NULL, NULL, '2'),
(464, '98773, 2024', '100.000', 'Temperature', '100.05', '100.006', '-0.04399999999999693', '0', '0.062', '100.006', '0.04399999999999693', NULL, NULL, NULL, '2'),
(465, '98773, 2024', '105.000', 'Temperature', '105.12', '105.001', '-0.11899999999999977', '0', '0.062', '105.001', '0.11899999999999977', NULL, NULL, NULL, '2'),
(466, '98773, 2024', '150.000', 'Temperature', '150.08', '150.004', '-0.07600000000002183', '0', '0.062', '150.004', '0.07600000000002183', NULL, NULL, NULL, '2'),
(467, '98773, 2024', '200.000', 'Temperature', '199.91', '200.074', '0.1640000000000157', '0', '0.062', '200.074', '0.1640000000000157', NULL, NULL, NULL, '2'),
(468, '98773, 2024', '250.000', 'Temperature', '250.14', '250.066', '-0.07399999999998386', '0', '0.062', '250.066', '0.07399999999998386', NULL, NULL, NULL, '2'),
(476, '1003058-2024 Thermometer', '-40', 'Temperature', '-39.958', '-40.036', '-0.07800000000000296', '0', '0.062', '-40.036', '0.07800000000000296', NULL, NULL, NULL, '2'),
(478, '1003058-2024 Thermometer', '-20', 'Temperature', '-19.99', '-20.017', '-0.027000000000001023', '0', '0.062', '-20.017', '0.027000000000001023', NULL, NULL, NULL, '2'),
(479, '1003058-2024 Thermometer', '-10', 'Temperature', '-10.002', '-10.036', '-0.03399999999999892', '0', '0.062', '-10.036', '0.03399999999999892', NULL, NULL, NULL, '2'),
(480, '1003058-2024 Thermometer', '0', 'Temperature', '-0.015', '-0.009', '0.006', '0', '0.062', '-0.009', '0.006', NULL, NULL, NULL, '2'),
(481, '1003058-2024 Thermometer', '20', 'Temperature', '19.997', '20', '0.0030000000000001137', '0', '0.062', '20', '0.0030000000000001137', NULL, NULL, NULL, '2'),
(482, '1003058-2024 Thermometer', '50', 'Temperature', '49.99', '50', '0.00999999999999801', '0', '0.062', '50', '0.00999999999999801', NULL, NULL, NULL, '2'),
(483, '1003058-2024 Thermometer', '75', 'Temperature', '75.002', '74.986', '-0.015999999999991132', '0', '0.062', '74.986', '0.015999999999991132', NULL, NULL, NULL, '2'),
(484, '1003058-2024 Thermometer', '100', 'Temperature', '99.993', '100.024', '0.03100000000000591', '0', '0.062', '100.024', '0.03100000000000591', NULL, NULL, NULL, '2'),
(485, '1003058-2024 Thermometer', '105', 'Temperature', '104.987', '105.017', '0.030000000000001137', '0', '0.062', '105.017', '0.030000000000001137', NULL, NULL, NULL, '2'),
(486, '1003058-2024 Thermometer', '150', 'Temperature', '150.023', '149.889', '-0.13399999999998613', '0', '0.062', '149.889', '0.13399999999998613', NULL, NULL, NULL, '2'),
(487, '1003058-2024 Thermometer', '200', 'Temperature', '200.046', '199.872', '-0.17399999999997817', '0', '0.062', '199.872', '0.17399999999997817', NULL, NULL, NULL, '2'),
(488, '1003058-2024 Thermometer', '250', 'Temperature', '249.969', '249.759', '-0.21000000000000796', '0', '0.062', '249.759', '0.21000000000000796', NULL, NULL, NULL, '2'),
(489, '1003058-2024', '-20', 'Temperature', '-0.59', '0.003', '0.593', '0', '0.27000', '0.003', '0.593', NULL, NULL, NULL, '2'),
(490, '1003058-2024', '-10', 'Temperature', '-0.31', '0.002', '0.312', '0', '0.27000', '0.002', '0.312', NULL, NULL, NULL, '2'),
(491, '1003058-2024', '0', 'Temperature', '-0.13', '0.001', '0.131', '0', '0.27000', '0.001', '0.131', NULL, NULL, NULL, '2'),
(492, '1003058-2024', '20', 'Temperature', '-0.35', '0.007', '0.357', '0', '0.27000', '0.007', '0.357', NULL, NULL, NULL, '2'),
(493, '1003058-2024', '50', 'Temperature', '0', '0.031', '0.031', '0', '0.27000', '0.031', '0.031', NULL, NULL, NULL, '2'),
(494, '1003058-2024', '75', 'Temperature', '0.24', '0.043', '-0.197', '0', '0.27000', '0.043', '0.197', NULL, NULL, NULL, '2'),
(495, '1003058-2024', '100', 'Temperature', '0.02', '0.092', '0.072', '0', '0.092', '0.092', '0.072', NULL, NULL, NULL, '2'),
(496, '1003058-2024', '150', 'Temperature', '-0.17', '0.137', '0.30700000000000005', '0', '0.27000', '0.137', '0.30700000000000005', NULL, NULL, NULL, '2'),
(497, '1003058-2024', '200', 'Temperature', '0.42', '0.161', '-0.259', '0', '0.27000', '0.161', '0.259', NULL, NULL, NULL, '2'),
(498, '98773, 2024, Thermometer', '-30', 'Temperature', '-30.004', '-29.98', '0.02400000000000091', '0', '0.06200', '-29.98', '0.02400000000000091', NULL, NULL, NULL, '2'),
(499, '98773, 2024, Thermometer', '-20', 'Temperature', '-20.006', '-19.95', '0.05600000000000094', '0', '0.06200', '-19.95', '0.05600000000000094', NULL, NULL, NULL, '2'),
(500, '98773, 2024, Thermometer', '-10', 'Temperature', '-10.001', '-9.99', '0.010999999999999233', '0', '0.06200', '-9.99', '0.010999999999999233', NULL, NULL, NULL, '2'),
(501, '98773, 2024, Thermometer', '0', 'Temperature', '-0.002', '0.06', '0.062', '0', '0.06200', '0.06', '0.062', NULL, NULL, NULL, '2'),
(502, '98773, 2024, Thermometer', '20', 'Temperature', '20.003', '20.04', '0.036999999999999034', '0', '0.06200', '20.04', '0.036999999999999034', NULL, NULL, NULL, '2'),
(503, '98773, 2024, Thermometer', '50', 'Temperature', '49.999', '50.03', '0.030999999999998806', '0', '0.06200', '50.03', '0.030999999999998806', NULL, NULL, NULL, '2'),
(504, '98773, 2024, Thermometer', '75', 'Temperature', '75.002', '75.03', '0.028000000000005798', '0', '0.06200', '75.03', '0.028000000000005798', NULL, NULL, NULL, '2'),
(505, '98773, 2024, Thermometer', '100', 'Temperature', '100.006', '100.05', '0.04399999999999693', '0', '0.06200', '100.05', '0.04399999999999693', NULL, NULL, NULL, '2'),
(506, '98773, 2024, Thermometer', '105', 'Temperature', '105.001', '105.12', '0.11899999999999977', '0', '0.06200', '105.12', '0.11899999999999977', NULL, NULL, NULL, '2'),
(507, '98773, 2024, Thermometer', '150', 'Temperature', '150.004', '150.08', '0.07600000000002183', '0', '0.06200', '150.08', '0.07600000000002183', NULL, NULL, NULL, '2'),
(508, '98773, 2024, Thermometer', '200', 'Temperature', '200.074', '199.91', '-0.1640000000000157', '0', '0.06200', '199.91', '0.1640000000000157', NULL, NULL, NULL, '2'),
(509, '98773, 2024, Thermometer', '250', 'Temperature', '250.066', '250.14', '0.07399999999998386', '0', '0.23000', '250.14', '0.07399999999998386', NULL, NULL, NULL, '2'),
(510, '98770-thermometer', '-20', 'Temperature', '-20.03', '-19.940', '0.08999999999999986', '0', '0.16', '-19.940', '0.08999999999999986', NULL, NULL, NULL, '2'),
(511, '98770-thermometer', '-10', 'Temperature', '-9.988', '-9.990', '-0.002000000000000668', '0', '0.16', '-9.990', '0.002000000000000668', NULL, NULL, NULL, '2'),
(512, '98770-thermometer', '0', 'Temperature', '-0.005', '0.060', '0.065', '0', '0.16', '0.060', '0.065', NULL, NULL, NULL, '2'),
(513, '98770-thermometer', '20', 'Temperature', '20.029', '20.040', '0.010999999999999233', '0', '0.16', '20.040', '0.010999999999999233', NULL, NULL, NULL, '2'),
(514, '98770-thermometer', '50', 'Temperature', '50.055', '50.030', '-0.02499999999999858', '0', '0.16', '50.030', '0.02499999999999858', NULL, NULL, NULL, '2'),
(515, '98770-thermometer', '75', 'Temperature', '75.048', '75.030', '-0.018000000000000682', '0', '0.16', '75.030', '0.018000000000000682', NULL, NULL, NULL, '2'),
(516, '98770-thermometer', '100', 'Temperature', '100.074', '100.030', '-0.04399999999999693', '0', '0.16', '100.030', '0.04399999999999693', NULL, NULL, NULL, '2'),
(517, '98770-thermometer', '105', 'Temperature', '105.06', '105.050', '-0.010000000000005116', '0', '0.16', '105.050', '0.010000000000005116', NULL, NULL, NULL, '2'),
(518, '98770-thermometer', '150', 'Temperature', '150.106', '150.100', '-0.006000000000000227', '0', '0.17', '150.100', '0.006000000000000227', NULL, NULL, NULL, '2'),
(519, '98770-thermometer', '200', 'Temperature', '200.005', '199.920', '-0.08500000000000796', '0', '0.17', '199.920', '0.08500000000000796', NULL, NULL, NULL, '2'),
(520, '98770-thermometer', '250', 'Temperature', '250.033', '250.150', '0.11700000000001864', '0', '0.17', '250.150', '0.11700000000001864', NULL, NULL, NULL, '2'),
(521, '98769-2024 thermomerter', '-40', 'Temperature', '-40.091', '-40.047', '0.044000000000004036', '0', '0.16', '-40.047', '0.044000000000004036', NULL, NULL, NULL, '2'),
(522, '98769-2024 thermomerter', '-20', 'Temperature', '-20.044', '-20.032', '0.012000000000000455', '0', '0.16', '-20.032', '0.012000000000000455', NULL, NULL, NULL, '2'),
(523, '98769-2024 thermomerter', '-10', 'Temperature', '-10.001', '-10.052', '-0.051000000000000156', '0', '0.16', '-10.052', '0.051000000000000156', NULL, NULL, NULL, '2'),
(524, '98769-2024 thermomerter', '0', 'Temperature', '-0.024', '-0.024', '0', '0', '0.16', '-0.024', '0', NULL, NULL, NULL, '2'),
(525, '98769-2024 thermomerter', '20', 'Temperature', '20.016', '19.995', '-0.020999999999997243', '0', '0.16', '19.995', '0.020999999999997243', NULL, NULL, NULL, '2'),
(526, '98769-2024 thermomerter', '50', 'Temperature', '50.045', '50.012', '-0.03300000000000125', '0', '0.16', '50.012', '0.03300000000000125', NULL, NULL, NULL, '2'),
(527, '98769-2024 thermomerter', '75', 'Temperature', '75.042', '75.050', '0.007999999999995566', '0', '0.16', '75.050', '0.007999999999995566', NULL, NULL, NULL, '2'),
(528, '98769-2024 thermomerter', '100', 'Temperature', '100.061', '100.095', '0.033999999999991815', '0', '0.16', '100.095', '0.033999999999991815', NULL, NULL, NULL, '2'),
(529, '98769-2024 thermomerter', '105', 'Temperature', '105.046', '105.091', '0.044999999999987494', '0', '0.16', '105.091', '0.044999999999987494', NULL, NULL, NULL, '2'),
(530, '98769-2024 thermomerter', '150', 'Temperature', '150.091', '149.997', '-0.09399999999999409', '0', '0.17', '149.997', '0.09399999999999409', NULL, NULL, NULL, '2'),
(531, '98769-2024 thermomerter', '200', 'Temperature', '199.992', '200.011', '0.019000000000005457', '0', '0.17', '200.011', '0.019000000000005457', NULL, NULL, NULL, '2'),
(532, '98769-2024 thermomerter', '250', 'Temperature', '250.024', '249.924', '-0.09999999999999432', '0', '0.17', '249.924', '0.09999999999999432', NULL, NULL, NULL, '2'),
(545, '61830467', '20', 'Temperature', '19.86', '20.15', '0.28999999999999915', '0', '0.34', '20.25', '0.39000000000000057', NULL, NULL, NULL, '2'),
(546, '61830467', '25', 'Temperature', '24.86', '25.100', '0.240000000000002', '0', '0.34', '25.39', '0.5300000000000011', NULL, NULL, NULL, '2'),
(547, '61830467', '30', 'Temperature', '29.84', '30.020', '0.17999999999999972', '0', '0.34', '30.26', '0.4200000000000017', NULL, NULL, NULL, '2'),
(548, '61830467', '40', 'Temperature', '39.46', '40.130', '0.6700000000000017', '0', '1.2', '41.15', '1.6899999999999977', NULL, NULL, NULL, '2'),
(549, '61830467', '60', 'Temperature', '59.44', '60.180', '0.740000000000002', '0', '1.6', '60.36', '0.9200000000000017', NULL, NULL, NULL, '2'),
(550, '61830467', '80', 'Temperature', '79.47', '80.270', '0.7999999999999972', '0', '1.8', '79.94', '0.46999999999999886', NULL, NULL, NULL, '2'),
(551, '32452/2', '-20', 'Temperature', '-20.012', '-20.011', '0.0010000000000012221', '0', '0.16', '-20.011', '0.0010000000000012221', NULL, NULL, NULL, '2'),
(552, '32452/2', '-10', 'Temperature', '-9.998', '-9.97', '0.027999999999998693', '0', '0.16', '-9.97', '0.027999999999998693', NULL, NULL, NULL, '2'),
(553, '32452/2', '0', 'Temperature', '0.018', '0.026', '0.008', '0', '0.16', '0.026', '0.008', NULL, NULL, NULL, '2'),
(554, '32452/2', '20', 'Temperature', '20.051', '20.061', '0.010000000000001563', '0', '0.16', '20.061', '0.010000000000001563', NULL, NULL, NULL, '2'),
(555, '32452/2', '50', 'Temperature', '50.074', '50.105', '0.030999999999998806', '0', '0.16', '50.105', '0.030999999999998806', NULL, NULL, NULL, '2'),
(556, '32452/2', '75', 'Temperature', '75.079', '75.125', '0.04600000000000648', '0', '0.16', '75.125', '0.04600000000000648', NULL, NULL, NULL, '2'),
(557, '32452/2', '100', 'Temperature', '100.135', '100.15', '0.015000000000000568', '0', '0.16', '100.15', '0.015000000000000568', NULL, NULL, NULL, '2'),
(558, '32452/2', '150', 'Temperature', '150.126', '150.136', '0.009999999999990905', '0', '0.17', '150.136', '0.009999999999990905', NULL, NULL, NULL, '2'),
(559, '32452/2', '200', 'Temperature', '199.979', '200.004', '0.024999999999977263', '0', '0.17', '200.004', '0.024999999999977263', NULL, NULL, NULL, '2'),
(560, '32452/2', '250', 'Temperature', '249.946', '250.007', '0.06100000000000705', '0', '0.17', '250.007', '0.06100000000000705', NULL, NULL, NULL, '2'),
(575, '98769-latest 2024', '-40', 'Temperature', '-40.091', '-40.047', '0.044000000000004036', '0', '0.16', '-40.047', '0.044000000000004036', NULL, NULL, NULL, '2'),
(576, '98769-latest 2024', '-20', 'Temperature', '-20.044', '-20.032', '0.012000000000000455', '0', '0.16', '-20.032', '0.012000000000000455', NULL, NULL, NULL, '2'),
(577, '98769-latest 2024', '-10', 'Temperature', '-10.052', '-10.001', '0.051000000000000156', '0', '0.16', '-10.001', '0.051000000000000156', NULL, NULL, NULL, '2'),
(578, '98769-latest 2024', '0', 'Temperature', '-0.024', '-0.024', '0', '0', '0.16', '-0.024', '0', NULL, NULL, NULL, '2'),
(579, '98769-latest 2024', '20', 'Temperature', '19.995', '20.016', '0.020999999999997243', '0', '0.16', '20.016', '0.020999999999997243', NULL, NULL, NULL, '2'),
(580, '98769-latest 2024', '50', 'Temperature', '50.012', '50.045', '0.03300000000000125', '0', '0.16', '50.045', '0.03300000000000125', NULL, NULL, NULL, '2'),
(581, '98769-latest 2024', '75', 'Temperature', '75.042', '75.050', '0.007999999999995566', '0', '0.16', '75.050', '0.007999999999995566', NULL, NULL, NULL, '2'),
(582, '98769-latest 2024', '100', 'Temperature', '100.061', '100.095', '0.033999999999991815', '0', '0.16', '100.095', '0.033999999999991815', NULL, NULL, NULL, '2'),
(583, '98769-latest 2024', '105', 'Temperature', '105.046', '105.091', '0.044999999999987494', '0', '0.16', '105.091', '0.044999999999987494', NULL, NULL, NULL, '2'),
(584, '98769-latest 2024', '150', 'Temperature', '149.997', '150.091', '0.09399999999999409', '0', '0.17', '150.091', '0.09399999999999409', NULL, NULL, NULL, '2'),
(585, '98769-latest 2024', '200', 'Temperature', '199.992', '200.011', '0.019000000000005457', '0', '0.17', '200.011', '0.019000000000005457', NULL, NULL, NULL, '2'),
(586, '98769-latest 2024', '250', 'Temperature', '249.924', '250.024', '0.09999999999999432', '0', '0.17', '250.024', '0.09999999999999432', NULL, NULL, NULL, '2'),
(587, '98770-latest 2024', '-20', 'Temperature', '-20.03', '-19.940', '0.08999999999999986', '0', '0.16', '-19.940', '0.08999999999999986', NULL, NULL, NULL, '2'),
(588, '98770-latest 2024', '-10', 'Temperature', '-9.990', '-9.988', '0.002000000000000668', '0', '0.16', '-9.988', '0.002000000000000668', NULL, NULL, NULL, '2'),
(589, '98770-latest 2024', '0', 'Temperature', '-0.005', '0.060', '0.065', '0', '0.16', '0.060', '0.065', NULL, NULL, NULL, '2'),
(590, '98770-latest 2024', '20', 'Temperature', '20.029', '20.040', '0.010999999999999233', '0', '0.16', '20.040', '0.010999999999999233', NULL, NULL, NULL, '2'),
(591, '98770-latest 2024', '50', 'Temperature', '50.030', '50.055', '0.02499999999999858', '0.16', '0', '50.055', '0.02499999999999858', NULL, NULL, NULL, '2'),
(592, '98770-latest 2024', '75', 'Temperature', '75.030', '75.048', '0.018000000000000682', '0', '0.16', '75.048', '0.018000000000000682', NULL, NULL, NULL, '2'),
(593, '98770-latest 2024', '100', 'Temperature', '100.030', '100.074', '0.04399999999999693', '0', '0.16', '100.074', '0.04399999999999693', NULL, NULL, NULL, '2'),
(594, '98770-latest 2024', '105', 'Temperature', '105.050', '105.06', '0.010000000000005116', '0', '0.16', '105.06', '0.010000000000005116', NULL, NULL, NULL, '2'),
(595, '98770-latest 2024', '150', 'Temperature', '150.100', '150.106', '0.006000000000000227', '0', '0.17', '150.106', '0.006000000000000227', NULL, NULL, NULL, '2'),
(596, '98770-latest 2024', '200', 'Temperature', '199.920', '200.005', '0.08500000000000796', '0', '0.17', '200.005', '0.08500000000000796', NULL, NULL, NULL, '2'),
(597, '98770-latest 2024', '250', 'Temperature', '250.033', '250.150', '0.11700000000001864', '0', '0.17', '250.150', '0.11700000000001864', NULL, NULL, NULL, '2'),
(598, '98773-latest 2024', '-30', 'Temperature', '-30.004', '-29.98', '0.02400000000000091', '0', '0.062', '-29.98', '0.02400000000000091', NULL, NULL, NULL, '2'),
(599, '98773-latest 2024', '-20', 'Temperature', '-20.006', '-19.95', '0.05600000000000094', '0', '0.062', '-19.95', '0.05600000000000094', NULL, NULL, NULL, '2'),
(600, '98773-latest 2024', '-10', 'Temperature', '-10.001', '-9.99', '0.010999999999999233', '0', '0.062', '-9.99', '0.010999999999999233', NULL, NULL, NULL, '2'),
(601, '98773-latest 2024', '0', 'Temperature', '-0.002', '0.06', '0.062', '0', '0.062', '0.06', '0.062', NULL, NULL, NULL, '2'),
(602, '98773-latest 2024', '20', 'Temperature', '20.003', '20.04', '0.036999999999999034', '0', '0.062', '20.04', '0.036999999999999034', NULL, NULL, NULL, '2'),
(603, '98773-latest 2024', '50', 'Temperature', '49.999', '50.03', '0.030999999999998806', '0', '0.062', '50.03', '0.030999999999998806', NULL, NULL, NULL, '2'),
(604, '98773-latest 2024', '75', 'Temperature', '75.002', '75.03', '0.028000000000005798', '0', '0.062', '75.03', '0.028000000000005798', NULL, NULL, NULL, '2'),
(605, '98773-latest 2024', '100', 'Temperature', '100.006', '100.05', '0.04399999999999693', '0', '0.062', '100.05', '0.04399999999999693', NULL, NULL, NULL, '2'),
(606, '98773-latest 2024', '105', 'Temperature', '105.001', '105.12', '0.11899999999999977', '0', '0.062', '105.12', '0.11899999999999977', NULL, NULL, NULL, '2'),
(607, '98773-latest 2024', '150', 'Temperature', '150.004', '150.08', '0.07600000000002183', '0', '0.062', '150.08', '0.07600000000002183', NULL, NULL, NULL, '2'),
(608, '98773-latest 2024', '200', 'Temperature', '199.91', '200.074', '0.1640000000000157', '0', '0.062', '200.074', '0.1640000000000157', NULL, NULL, NULL, '2'),
(609, '98773-latest 2024', '250', 'Temperature', '250.066', '250.14', '0.07399999999998386', '0', '0.23', '250.14', '0.07399999999998386', NULL, NULL, NULL, '2'),
(610, '1003058-latest 2024', '-40', 'Temperature', '-40.036', '-39.958', '0.07800000000000296', '0', '0.062', '-39.958', '0.07800000000000296', NULL, NULL, NULL, '2'),
(611, '1003058-latest 2024', '-20', 'Temperature', '-20.017', '-19.99', '0.027000000000001023', '0', '0.062', '-19.99', '0.027000000000001023', NULL, NULL, NULL, '2'),
(612, '1003058-latest 2024', '-10', 'Temperature', '-10.036', '-10.002', '0.03399999999999892', '0', '0.062', '0.034', '10.07', NULL, NULL, NULL, '2'),
(613, '1003058-latest 2024', '0', 'Temperature', '-0.015', '-0.009', '0.006', '0', '0.062', '-0.009', '0.006', NULL, NULL, NULL, '2'),
(614, '1003058-latest 2024', '20', 'Temperature', '19.997', '20', '0.0030000000000001137', '0', '0.062', '20', '0.0030000000000001137', NULL, NULL, NULL, '2'),
(615, '1003058-latest 2024', '50', 'Temperature', '49.99', '50', '0.00999999999999801', '0', '0.062', '50', '0.00999999999999801', NULL, NULL, NULL, '2'),
(616, '1003058-latest 2024', '75', 'Temperature', '74.986', '75.002', '0.015999999999991132', '0', '0.062', '75.002', '0.015999999999991132', NULL, NULL, NULL, '2'),
(617, '1003058-latest 2024', '100', 'Temperature', '99.993', '100.024', '0.03100000000000591', '0', '0.062', '100.024', '0.03100000000000591', NULL, NULL, NULL, '2'),
(618, '1003058-latest 2024', '105', 'Temperature', '104.987', '105.017', '0.030000000000001137', '0', '0.062', '105.017', '0.030000000000001137', NULL, NULL, NULL, '2'),
(619, '1003058-latest 2024', '150', 'Temperature', '149.889', '150.023', '0.13399999999998613', '0', '0.062', '150.023', '0.13399999999998613', NULL, NULL, NULL, '2'),
(620, '1003058-latest 2024', '200', 'Temperature', '199.872', '200.046', '0.17399999999997817', '0', '0.062', '200.046', '0.17399999999997817', NULL, NULL, NULL, '2'),
(621, '1003058-latest 2024', '250', 'Temperature', '249.759', '249.969', '0.21000000000000796', '0', '0.062', '249.969', '0.21000000000000796', NULL, NULL, NULL, '2'),
(622, '4010016-latest 2024', '-20', 'Temperature', '-20.048', '-19.8680', '0.17999999999999972', '0', '0.16', '-19.8680', '0.17999999999999972', NULL, NULL, NULL, '2'),
(623, '4010016-latest 2024', '-10', 'Temperature', '-10.038', '-9.803', '0.23499999999999943', '0', '0.16', '-9.803', '0.23499999999999943', NULL, NULL, NULL, '2'),
(624, '4010016-latest 2024', '0', 'Temperature', '-0.202', '-0.024', '0.17800000000000002', '0', '0.16', '-0.024', '0.17800000000000002', NULL, NULL, NULL, '2'),
(625, '4010016-latest 2024', '20', 'Temperature', '19.997', '20.263', '0.2660000000000018', '0', '0.16', '20.263', '0.2660000000000018', NULL, NULL, NULL, '2'),
(626, '4010016-latest 2024', '100', 'Temperature', '100.058', '100.31800', '0.2599999999999909', '0', '0.16', '100.31800', '0.2599999999999909', NULL, NULL, NULL, '2'),
(627, '4010016-latest 2024', '150', 'Temperature', '150.049', '150.19200', '0.14300000000000068', '0', '0.17', '150.19200', '0.14300000000000068', NULL, NULL, NULL, '2'),
(628, '03304-latest 2024', '-30', 'Temperature', '-29.95', '-29.11', '0.8399999999999999', '0', '0.27', '-29.11', '0.8399999999999999', NULL, NULL, NULL, '2'),
(629, '03304-latest 2024', '-10', 'Temperature', '-9.97', '-9.65', '0.3200000000000003', '0', '0.27', '-9.65', '0.3200000000000003', NULL, NULL, NULL, '2'),
(630, '03304-latest 2024', '0', 'Temperature', '0.09', '0.12', '0.03', '0', '0.27', '0.12', '0.03', NULL, NULL, NULL, '2'),
(631, '03304-latest 2024', '50', 'Temperature', '50.07', '50.1', '0.030000000000001137', '0', '0.27', '50.1', '0.030000000000001137', NULL, NULL, NULL, '2'),
(632, '03304-latest 2024', '75', 'Temperature', '74.86', '75.14', '0.28000000000000114', '0', '0.27', '75.14', '0.28000000000000114', NULL, NULL, NULL, '2'),
(633, '03304-latest 2024', '100', 'Temperature', '99.73', '100.12', '0.39000000000000057', '0', '0.27', '100.12', '0.39000000000000057', NULL, NULL, NULL, '2'),
(634, '03304-latest 2024', '150', 'Temperature', '150.15', '150.18', '0.030000000000001137', '0', '0.27', '150.18', '0.030000000000001137', NULL, NULL, NULL, '2'),
(635, '03304-latest 2024', '200', 'Temperature', '199.6', '200.12', '0.5200000000000102', '0', '0.27', '200.12', '0.5200000000000102', NULL, NULL, NULL, '2'),
(636, '03304-latest 2024', '250', 'Temperature', '249.55', '250.05', '0.5', '0', '0.27', '250.05', '0.5', NULL, NULL, NULL, '2'),
(637, '32452/2-latest 2024', '-20', 'Temperature', '-20.012', '-20.011', '0.0010000000000012221', '0', '0.16', '-20.011', '0.0010000000000012221', NULL, NULL, NULL, '2'),
(638, '32452/2-latest 2024', '-10', 'Temperature', '-9.998', '-9.97', '0.027999999999998693', '0', '0.16', '-9.97', '0.027999999999998693', NULL, NULL, NULL, '2'),
(639, '32452/2-latest 2024', '0', 'Temperature', '0.018', '0.026', '0.008', '0', '0.16', '0.026', '0.008', NULL, NULL, NULL, '2'),
(640, '32452/2-latest 2024', '20', 'Temperature', '20.051', '20.061', '0.010000000000001563', '0', '0.16', '20.061', '0.010000000000001563', NULL, NULL, NULL, '2'),
(641, '32452/2-latest 2024', '50', 'Temperature', '50.074', '50.105', '0.030999999999998806', '0', '0.16', '50.105', '0.030999999999998806', NULL, NULL, NULL, '2'),
(642, '32452/2-latest 2024', '75', 'Temperature', '75.079', '75.125', '0.04600000000000648', '0', '0.16', '75.125', '0.04600000000000648', NULL, NULL, NULL, '2'),
(643, '32452/2-latest 2024', '100', 'Temperature', '100.135', '100.15', '0.015000000000000568', '0', '0.16', '100.15', '0.015000000000000568', NULL, NULL, NULL, '2'),
(644, '32452/2-latest 2024', '150', 'Temperature', '150.126', '150.136', '0.009999999999990905', '0', '0.17', '150.136', '0.009999999999990905', NULL, NULL, NULL, '2'),
(645, '32452/2-latest 2024', '200', 'Temperature', '199.979', '200.004', '0.024999999999977263', '0', '0.17', '200.004', '0.024999999999977263', NULL, NULL, NULL, '2'),
(646, '32452/2-latest 2024', '250', 'Temperature', '249.946', '250.007', '0.06100000000000705', '0', '0.17', '250.007', '0.06100000000000705', NULL, NULL, NULL, '2'),
(647, '32452/3-latest 2024', '-20', 'Temperature', '-20.045', '-20.044', '0.0010000000000012221', '0', '0.16', '-20.044', '0.0010000000000012221', NULL, NULL, NULL, '2'),
(648, '32452/3-latest 2024', '-10', 'Temperature', '-10.031', '-10.000', '0.031000000000000583', '0', '0.16', '-10.000', '0.031000000000000583', NULL, NULL, NULL, '2'),
(649, '32452/3-latest 2024', '0', 'Temperature', '-0.013', '-0.013', '0', '0', '0.16', '-0.013', '0', NULL, NULL, NULL, '2'),
(650, '32452/3-latest 2024', '20', 'Temperature', '20.015', '20.029', '0.013999999999999346', '0', '0.16', '20.029', '0.013999999999999346', NULL, NULL, NULL, '2'),
(651, '32452/3-latest 2024', '50', 'Temperature', '50.036', '50.074', '0.0379999999999967', '0', '0.16', '50.074', '0.0379999999999967', NULL, NULL, NULL, '2'),
(652, '32452/3-latest 2024', '75', 'Temperature', '75.029', '75.090', '0.06100000000000705', '0', '0.16', '75.090', '0.06100000000000705', NULL, NULL, NULL, '2'),
(653, '32452/3-latest 2024', '100', 'Temperature', '100.086', '100.123', '0.03700000000000614', '0', '0.16', '100.123', '0.03700000000000614', NULL, NULL, NULL, '2'),
(654, '32452/3-latest 2024', '150', 'Temperature', '150.065', '150.082', '0.016999999999995907', '0', '0.17', '150.082', '0.016999999999995907', NULL, NULL, NULL, '2'),
(655, '32452/3-latest 2024', '200', 'Temperature', '199.921', '199.945', '0.02400000000000091', '0', '0.17', '199.945', '0.02400000000000091', NULL, NULL, NULL, '2'),
(656, '32452/3-latest 2024', '250', 'Temperature', '249.867', '249.924', '0.05700000000001637', '0', '0.17', '249.924', '0.05700000000001637', NULL, NULL, NULL, '2');

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

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`verifier_id`, `verifierName`, `verifierPosition`, `verifierEmail`) VALUES
(1, 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'roger_esmeria@gmail.com'),
(2, 'John June L. Paran', 'Technical Manager', 'june_paran@gmail.com'),
(4, 'Mylene S. Lontoc', 'Dep. Tech. Manager', 'm.lontoc@r3cms.com'),
(5, 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'r.esmeria@r3cms.com');

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
-- Dumping data for table `wirelesstemperaturelogger`
--

INSERT INTO `wirelesstemperaturelogger` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '1212-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `tempcontrollertable`
--
ALTER TABLE `tempcontrollertable`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balancestandard`
--
ALTER TABLE `balancestandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `barometerstandard`
--
ALTER TABLE `barometerstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `digitalthermometertable`
--
ALTER TABLE `digitalthermometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT for table `elect_table_1`
--
ALTER TABLE `elect_table_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elect_table_2`
--
ALTER TABLE `elect_table_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `elect_table_3`
--
ALTER TABLE `elect_table_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `multiproductcalibratorstandardvalues`
--
ALTER TABLE `multiproductcalibratorstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pabconditions`
--
ALTER TABLE `pabconditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phmetertable`
--
ALTER TABLE `phmetertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ph_meter_standard`
--
ALTER TABLE `ph_meter_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placeholders`
--
ALTER TABLE `placeholders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pressuregaugestandarddetails`
--
ALTER TABLE `pressuregaugestandarddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pressuregaugestandardvalues`
--
ALTER TABLE `pressuregaugestandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `rml_table`
--
ALTER TABLE `rml_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `standard_balance`
--
ALTER TABLE `standard_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_currentcoil`
--
ALTER TABLE `standard_currentcoil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_users_guest`
--
ALTER TABLE `tbl_users_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tempcontrollertable`
--
ALTER TABLE `tempcontrollertable`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `temperaturesource`
--
ALTER TABLE `temperaturesource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testweightmaterial`
--
ALTER TABLE `testweightmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testweightmpe`
--
ALTER TABLE `testweightmpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `testweightpab`
--
ALTER TABLE `testweightpab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `testweightsensitivitytest`
--
ALTER TABLE `testweightsensitivitytest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testweightstandarddetails`
--
ALTER TABLE `testweightstandarddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testweightstandardvalues`
--
ALTER TABLE `testweightstandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `testweighttable`
--
ALTER TABLE `testweighttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermochamber`
--
ALTER TABLE `thermochamber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thermohygrometertable`
--
ALTER TABLE `thermohygrometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermostandarddrift`
--
ALTER TABLE `thermostandarddrift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `thermostandarddriftprt`
--
ALTER TABLE `thermostandarddriftprt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `thermostandardtable`
--
ALTER TABLE `thermostandardtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `thermostandardtestpoints`
--
ALTER TABLE `thermostandardtestpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

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
  MODIFY `verifier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weighingscaletable`
--
ALTER TABLE `weighingscaletable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wirelesstemperaturelogger`
--
ALTER TABLE `wirelesstemperaturelogger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
