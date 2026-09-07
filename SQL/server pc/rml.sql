-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 03:13 AM
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
(10, 'MCM2004 - 2023 2nd Quarter', '', '', '', '0.0201', '2000.0254', '0.0200', '2000.0257', '0.0199', '2000.0252', '0.0200', '2000.0252', '0.0199', '2000.0255', '0.00008366600265340704', '0.00021213203430271477', '', '', '0.020005', '0.000015', '', '', 'NaN', '2023-06-21', '0.0001', '', '', '-0.0254000', '0.0000949', '0.000031297145935999', '[]'),
(11, 'MCM60K3 - 2023 2nd Quarter ', '', '', '', '0.492', '50000.512', '0.500', '50000.498', '0.492', '50000.494', '0.498', '50000.524', '0.502', '50000.494', '0.004604345773288539', '0.013221195104827646', '', '', '0.500011', '0.000040', '', '', '', '2023-06-28', '0.002', '', '', '-0.5044000', '0.005912698199636415', '0.0017464470961072', '[]'),
(12, 'XPE2006 DR - RESOLUTION 0.00001', 'Semi-Micro Balance', '', '', '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '', '', '0.0100032', '0.0000013', '0.00021', '-0.00024', '0.00045', '2022-10-05', '0.00001', '', '', '0.00004000000000026205', '0.000017888543820115508', '0.0000053', '[{\"measurementNumber\":\"1\",\"testLoad\":\"0.010002\",\"indication\":\"0.010005\",\"error\":\"0.000003\",\"uncertaintyMeasurement\":\"0.000035\"},{\"measurementNumber\":\"2\",\"testLoad\":\"0.100006\",\"indication\":\"0.100005\",\"error\":\"-0.000001\",\"uncertaintyMeasurement\":\"0.000037\"},{\"measurementNumber\":\"3\",\"testLoad\":\"0.500010\",\"indication\":\"0.500000\",\"error\":\"-0.000010\",\"uncertaintyMeasurement\":\"0.000039\"},{\"measurementNumber\":\"4\",\"testLoad\":\"0.999995\",\"indication\":\"1.000000\",\"error\":\"0.000005\",\"uncertaintyMeasurement\":\"0.000041\"},{\"measurementNumber\":\"5\",\"testLoad\":\"4.999987\",\"indication\":\"4.999985\",\"error\":\"-0.000002\",\"uncertaintyMeasurement\":\"0.000051\"},{\"measurementNumber\":\"6\",\"testLoad\":\"10.000001\",\"indication\":\"9.999985\",\"error\":\"-0.000016\",\"uncertaintyMeasurement\":\"0.00008\"},{\"measurementNumber\":\"7\",\"testLoad\":\"19.999987\",\"indication\":\"19.999965\",\"error\":\"-0.000021\",\"uncertaintyMeasurement\":\"0.00010\"},{\"measurementNumber\":\"8\",\"testLoad\":\"50.000000\",\"indication\":\"50.000070\",\"error\":\"0.000070\",\"uncertaintyMeasurement\":\"0.00012\"},{\"measurementNumber\":\"9\",\"testLoad\":\"79.999987\",\"indication\":\"79.999965\",\"error\":\"-0.000022\",\"uncertaintyMeasurement\":\"0.00021\"},{\"measurementNumber\":\"10\",\"testLoad\":\"99.999970\",\"indication\":\"100.00017\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00017\"},{\"measurementNumber\":\"11\",\"testLoad\":\"119.999956\",\"indication\":\"120.00012\",\"error\":\"0.00016\",\"uncertaintyMeasurement\":\"0.00023\"},{\"measurementNumber\":\"12\",\"testLoad\":\"149.999970\",\"indication\":\"150.00019\",\"error\":\"0.00022\",\"uncertaintyMeasurement\":\"0.00026\"},{\"measurementNumber\":\"13\",\"testLoad\":\"209.999871\",\"indication\":\"210.00007\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00035\"}]'),
(13, 'XPE2006 DR - RESOLUTION 0.000005', 'Semi-Micro Balance', '008648 D-K-15035-01-00 2022-06', 'NML (Philippines)', '0.009995', '200.01011', '0.01', '200.01008', '0.009985', '200.01007', '0.009985', '200.01001', '0.010005', '200.01003', '0.000008944271909998794', '0.00004000000000026205', '', '', '0.0100032', '0.0000013', '0.00021', '-0.00024', '0.00045', '2022-06-27', '0.000005', '', '', '0.00004000000000026205', '0.000017888543820115508', '0.0000053', '[{\"measurementNumber\":\"1\",\"testLoad\":\"0.010002\",\"indication\":\"0.010005\",\"error\":\"0.000003\",\"uncertaintyMeasurement\":\"0.000035\"},{\"measurementNumber\":\"2\",\"testLoad\":\"0.100006\",\"indication\":\"0.100005\",\"error\":\"-0.000001\",\"uncertaintyMeasurement\":\"0.000037\"},{\"measurementNumber\":\"3\",\"testLoad\":\"0.500010\",\"indication\":\"0.500000\",\"error\":\"-0.000010\",\"uncertaintyMeasurement\":\"0.000039\"},{\"measurementNumber\":\"4\",\"testLoad\":\"0.999995\",\"indication\":\"1.000000\",\"error\":\"0.000005\",\"uncertaintyMeasurement\":\"0.000041\"},{\"measurementNumber\":\"5\",\"testLoad\":\"4.999987\",\"indication\":\"4.999985\",\"error\":\"-0.000002\",\"uncertaintyMeasurement\":\"0.000051\"},{\"measurementNumber\":\"6\",\"testLoad\":\"10.000001\",\"indication\":\"9.999985\",\"error\":\"-0.000016\",\"uncertaintyMeasurement\":\"0.00008\"},{\"measurementNumber\":\"7\",\"testLoad\":\"19.999987\",\"indication\":\"19.999965\",\"error\":\"-0.000021\",\"uncertaintyMeasurement\":\"0.00010\"},{\"measurementNumber\":\"8\",\"testLoad\":\"50.000000\",\"indication\":\"50.000070\",\"error\":\"0.000070\",\"uncertaintyMeasurement\":\"0.00012\"},{\"measurementNumber\":\"9\",\"testLoad\":\"79.999987\",\"indication\":\"79.999965\",\"error\":\"-0.000022\",\"uncertaintyMeasurement\":\"0.00021\"},{\"measurementNumber\":\"10\",\"testLoad\":\"99.999970\",\"indication\":\"100.00017\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00017\"},{\"measurementNumber\":\"11\",\"testLoad\":\"119.999956\",\"indication\":\"120.00012\",\"error\":\"0.00016\",\"uncertaintyMeasurement\":\"0.00023\"},{\"measurementNumber\":\"12\",\"testLoad\":\"149.999970\",\"indication\":\"150.00019\",\"error\":\"0.00022\",\"uncertaintyMeasurement\":\"0.00026\"},{\"measurementNumber\":\"13\",\"testLoad\":\"209.999871\",\"indication\":\"210.00007\",\"error\":\"0.00020\",\"uncertaintyMeasurement\":\"0.00035\"}]'),
(14, 'MCM60K3 - 2023 2nd Quarter - 1', '', '', '', '0.492', '50000.512', '0.500', '50000.498', '0.492', '50000.494', '0.498', '50000.524', '0.502', '50000.494', '0.004604345773288539', '0.013221195104827646', '', '', '0.0059127', '0.000040', '', '', '', '2023-08-30', '0.002', '', '', '-0.5044000', '0.005912698199636415', '0.0017464470961072', NULL),
(15, 'MCM2004 - 2023 3rd Quarter', '', '', '', '0.0194', '2000.0204', '0.0194', '2000.0207', '0.0193', '2000.0210', '0.0193', '2000.0211', '0.0193', '2000.0210', '0.000054772255750516275', '0.00028809720574544034', '', '', '0.020005', '0.000015', '', '', '', '2023-08-28', '0.0001', '', '', '-0.0208400', '0.0001288', '0.000031297145935999', ''),
(16, 'MCM60K3 - 2023 3rd Quarter', '', '', '', '0.492', '49999.850', '0.490', '49999.849', '0.492', '49999.844', '0.490', '49999.844', '0.500', '49999.840', '0.004147288270665548', '0.004098780308017689', '', '', '0.500010', '0.000040', '', '', '', '2023-10-06', '0.002', '', '', '0.0072000', '0.0018547236990991423', '0.0017464470961', ''),
(17, 'sample', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]');

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
  `uncertaintyTEMPAIR` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barometerstandard`
--

INSERT INTO `barometerstandard` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `resolution`, `uncertaintyHPA`, `uncertaintyRH`, `uncertaintyTEMPAIR`) VALUES
(1, 'A17110063', 'PICL2022-02D-052 / PICL2022-01C-061 / PICL2022-03D-017', 'Digital Barometer', 'DOST-PAGASA', '0.1', '0.78', '1.7', '0.6'),
(2, 'A17110002', 'PICL2022-01-004 / PICL2021-03-265 / PICL2021-07-096', 'Digital Barometer', 'DOST-PAGASA', '0.1', '0.59', '0.24', '1.6');

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
(157, 'Escaba Food Products, Inc.', 'Sta. Ana , San Pablo City, Laguna'),
(158, 'Green Harvest Food Products', '187 Santa Monica, San Pablo City 4000, Laguna '),
(159, 'Saint Jude Family Hospital', 'Los Baños, Laguna '),
(160, 'Betan Drugstore', '113 E. Quirino St., Brgy. Nanhaya, Victoria, Laguna'),
(161, 'Laguna Holy Family Hospital, Inc.', '1824 J. De Leon St. Pagsawitan, Sta. Cruz, Laguna'),
(162, 'Nalco Philippines, Inc.', 'Brgy. Real, Calamba City, Laguna'),
(163, 'Anihan Technical Institute', '294 Purok 6, Brgy. Milagrosa, Calamba City, Laguna'),
(166, 'Department of Health - Bicol Center for Health and Development', 'Bagtang Road, Sagpon, Daraga, Albay, Philippines'),
(167, 'International Rice Research Institute ', 'College, Los Baños, Laguna'),
(168, 'Sunrich Manufacturing Corporation', 'Building 1, Silangan Interchange, Canlubang, Calamba City, Laguna'),
(169, 'Sunrich Manufacturing Corporation', 'Lot 1, Block 4 Centennial St., Millenium Drive, LISP III, Sto. Tomas, Batangas'),
(170, 'Carlos Superdrug - Mauban Branch', 'Rizal St. Brgy. Rizaliana Pob., Mauban Quezon'),
(171, 'Makiling Medica Drugtore', 'ES Plaza Grove, Brgy. Batong Malake, Los Baños, Laguna'),
(172, 'Carlos Superdrug - CM Recto Branch', 'CM Recto St., Brgy. 6, Lucena City, Quezon'),
(173, 'Carlos Superdrug - Candelaria 1 Branch', 'Regidor St. Cor. Cabunag St., Candelaria, Quezon'),
(174, 'Carlos Superdrug - San Francisco Branch', 'Queblar St., Brgy. Cawayan 1, San Francisco, Quezon'),
(175, 'Carlos Superdrug - Agdangan Branch', 'Aguilar St. cor Yakal St. Brgy. Poblacion 1, Agdangan, Quezon'),
(176, 'Dr. Care Pharmacy Canlubang', 'Blk 43, Lot 23 Asia 1 Kapayapaan Ville, Canlubang, Calamba City, Laguna'),
(177, 'Philippine Carabao Center', 'UPLB, B.M. Gonzales Animal Science Complex, College, Laguna'),
(178, 'Philippine Carabao Center ', 'UPLB, B.M. Gonzales Animal Science Complex, College, Laguna');

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
  `dateTimeCalibrated` text DEFAULT current_timestamp(),
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
  `settingCalibrationProcedureAndTraceability` longtext NOT NULL DEFAULT 'The unit under calibration (UUC) was calibrated in accordance with RML\'s CP-011 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:',
  `settingUncertaintyOfMeasurement` longtext NOT NULL DEFAULT 'The uncertainty stated in this calibration certificate is the expanded uncertainty at a confidence level of approximately 95% with a coverage factor of k = 2.',
  `settingRemarks1` longtext NOT NULL DEFAULT '\'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.\'',
  `settingCalibrationResults` longtext NOT NULL DEFAULT 'The results of calibration are shown on the following pages of this certificate.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digitaltimertable`
--

CREATE TABLE `digitaltimertable` (
  `id` int(11) NOT NULL,
  `PabLogo` varchar(10) DEFAULT 'true',
  `certificateNumber` text DEFAULT NULL,
  `customer` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dateReceived` text DEFAULT NULL,
  `dateCalibrated` text DEFAULT NULL,
  `recommendedDueDate` text DEFAULT NULL,
  `placeOfCalibration` text DEFAULT NULL,
  `equipmentDescription` text DEFAULT NULL,
  `manufacturer` text DEFAULT NULL,
  `modelNumber` text DEFAULT NULL,
  `serialNumber` text DEFAULT NULL,
  `equipmentID` text DEFAULT NULL,
  `startTemp` text DEFAULT NULL,
  `endTemp` text DEFAULT NULL,
  `startRh` text DEFAULT NULL,
  `endRh` text DEFAULT NULL,
  `ambTemp` varchar(50) NOT NULL DEFAULT '''23 ± 3''',
  `ambRh` varchar(50) NOT NULL DEFAULT '''55 ± 15''',
  `standardAndAccessories` text DEFAULT NULL,
  `premA` text DEFAULT NULL,
  `premB` text DEFAULT NULL,
  `premC` text DEFAULT NULL,
  `premD` text DEFAULT NULL,
  `remarksA` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `calibratedBy` text DEFAULT NULL,
  `encodedBy` text DEFAULT NULL,
  `checkedby` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `completion` text DEFAULT NULL,
  `std1` text DEFAULT NULL,
  `uuc1` text DEFAULT NULL,
  `hst1` text DEFAULT NULL,
  `stdOb1` text DEFAULT NULL,
  `uucOb1` text DEFAULT NULL,
  `std2` text DEFAULT NULL,
  `uuc2` text DEFAULT NULL,
  `hst2` text DEFAULT NULL,
  `stdOb2` text DEFAULT NULL,
  `uucOb2` text DEFAULT NULL,
  `std3` text DEFAULT NULL,
  `uuc3` text DEFAULT NULL,
  `hst3` text DEFAULT NULL,
  `stdOb3` text DEFAULT NULL,
  `uucOb3` text DEFAULT NULL,
  `std4` text DEFAULT NULL,
  `uuc4` text DEFAULT NULL,
  `hst4` text DEFAULT NULL,
  `stdOb4` text DEFAULT NULL,
  `uucOb4` text DEFAULT NULL,
  `std5` text DEFAULT NULL,
  `uuc5` text DEFAULT NULL,
  `hst5` text DEFAULT NULL,
  `stdOb5` text DEFAULT NULL,
  `uucOb5` text DEFAULT NULL,
  `std6` text DEFAULT NULL,
  `uuc6` text DEFAULT NULL,
  `hst6` text DEFAULT NULL,
  `stdOb6` text DEFAULT NULL,
  `uucOb6` text DEFAULT NULL,
  `std7` text DEFAULT NULL,
  `uuc7` text DEFAULT NULL,
  `hst7` text DEFAULT NULL,
  `stdOb7` text DEFAULT NULL,
  `uucOb7` text DEFAULT NULL,
  `std8` text DEFAULT NULL,
  `uuc8` text DEFAULT NULL,
  `hst8` text DEFAULT NULL,
  `stdOb8` text DEFAULT NULL,
  `uucOb8` text DEFAULT NULL,
  `std9` text DEFAULT NULL,
  `uuc9` text DEFAULT NULL,
  `hst9` text DEFAULT NULL,
  `stdOb9` text DEFAULT NULL,
  `uucOb9` text DEFAULT NULL,
  `std10` text DEFAULT NULL,
  `uuc10` text DEFAULT NULL,
  `hst10` text DEFAULT NULL,
  `stdOb10` text DEFAULT NULL,
  `uucOb10` text DEFAULT NULL,
  `hstAve` text DEFAULT NULL,
  `stdAve` text DEFAULT NULL,
  `uucAve` text DEFAULT NULL,
  `esdm` text DEFAULT NULL,
  `uucReso` text DEFAULT NULL,
  `resnSTd` text DEFAULT NULL,
  `prevYear` text DEFAULT NULL,
  `uncerPrevYear` text DEFAULT NULL,
  `presentYear` text DEFAULT NULL,
  `uncerPresentYear` text DEFAULT NULL,
  `driftt` text DEFAULT NULL,
  `correctionPresYear` text DEFAULT NULL,
  `stdUncen` text DEFAULT NULL,
  `driftStd` text DEFAULT NULL,
  `uncStd` text DEFAULT NULL,
  `uncUuc` text DEFAULT NULL,
  `hstBias` text DEFAULT NULL,
  `repeatabilityEsdm` text DEFAULT NULL,
  `combinedUnc` text DEFAULT NULL,
  `expUncer` text DEFAULT NULL,
  `issuinglab` varchar(255) DEFAULT '''NML (Philippines)''',
  `stdUsed` text DEFAULT NULL,
  `calibratorAccountEmail` text DEFAULT NULL,
  `calibratorAccountID` text DEFAULT NULL,
  `verifierEmail` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `settingCalibrationProcedureAndTraceability` longtext DEFAULT NULL
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
  `calibrationProvider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elect_table_2`
--

INSERT INTO `elect_table_2` (`id`, `description`, `manufacturer`, `type`, `serialNumber`, `certificateNumber`, `dateOfCalibration`, `class`, `prevAirDensity`, `calibrationProvider`) VALUES
(5, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights ', '91096-2023', '009418 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights  - Test weights', '1.2', 'NML (Philippines)'),
(6, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights', '91095-2023', '009417 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights  - Test weights', '1.2', 'NML (Philippines)'),
(7, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights', '91094-2023', '009416 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights - Test weights', '1.2', 'NML (Philippines)'),
(8, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights', '91093-2023', '009415 D-K-15035-01-00 2023-05', '2023-05-19', 'OIML Class E2 Weights - Test weights', '1.2', 'NML (Philippines)'),
(13, 'OIML Class M1 Weights', 'Haefner', 'OIML Class M₁ Weights', '4640918-2022', '2022-373-MAS-12-001', '2022-12-04', 'Test weights, 1g to 10 kg - M1', '1.18', 'NML (Philippines)'),
(15, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights', '4000014940-2023', '009414 D-K-15035-01-00 2023-05', '2023-05-17', 'E2 - Test weights (25 pcs)', '1.18', 'NML (Philippines)'),
(44, 'Free Nominal Mass Standards', 'FPSI', 'OIML Class M2 Weights', 'M2 Weights - 2022', 'W22-45805-01 to 22 (A to V)', '2022-11-12', 'OIML Class M2 Weights  - Single Test Weight', '1.2', 'Sartorius Lab Instruments GmbH & Co. through FPSI'),
(46, 'OIML Class F2 Weights				', 'Troemner', 'OIML Class F2 Weights', '57248 - 2023', '009412 D-K-15035-01-00 2023-05', '2023-11-05', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1.18', 'NML (Philippines)'),
(47, 'OIML Class F2 Weights				', 'Troemner', 'OIML Class F2 Weights', '57249-2023', '009413 D-K-15035-01-00 2023-06', '2023-06-07', 'F₂ Weights - Test weights, 2 mg to 1 kg', '1.19', 'NML (Philippines)'),
(49, 'OIML Class F1 Weights					', 'Haefner', 'OIML Class F1 Weights', '7740119  - 2023', '009581 D-K-15035-01-00 2023-05', '2023-06-05', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '1.18', 'NML (Philippines)'),
(50, 'Free Nominal Mass Standards', 'FPSI', 'OIML Class M2 Weights', 'M2 Weights (Values Based on Table) - 2022', 'W22-45805-01 to 22 (A to V)', '2022-11-12', 'OIML Class M2 Weights - Single Test Weight', '1.2', 'Sartorius Lab Instruments GmbH & Co. through FPSI'),
(55, 'OIML Class F2 Weights					', 'Haefner', 'OIML Class F2 Weights', '6021214 - 2022', '009001 D-K-15035-01-00 2022-08', '2022-08-15', 'OIML Class F₂ Weights - Test weights, 20 kg', '1.18', 'NML (Philippines)'),
(61, 'OIML Class F2 Weights', 'Haefner', 'OIML Class F2 Weights', '6031214-2022', '009954 D-K-15035-01-00 2023-09', '2023-09-13', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '1.18', 'NML (Philippines)'),
(62, 'OIML Class M1 Weights', 'Haefner', 'OIML Class M₁ Weights', '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', '2022-373-MAS-12-001', '2022-12-04', 'M₁ - Test weights, 1g to 10 kg', '1.18', 'NML (Philippines)'),
(63, 'OIML Class E2 Weights', 'Troemner', 'OIML Class E2 Weights', '4000014940-2023', '12-2019-TSWT-0755', '2023-05-17', 'OIML Class E2 Weights - Test weights (28 pcs)', '1.2', 'NML (Philippines)'),
(64, 'Free Nominal Mass Standards', 'Fuji', 'OIML Class M1 Weights', '09000800-2022', 'W22-45805-23-27', '2022-11-16', 'OIML Class M1 Weights - Set of Weights', '1.18', 'Sartorius Lab Instruments GmbH & Co. through FPSI');

-- --------------------------------------------------------

--
-- Table structure for table `elect_table_3`
--

CREATE TABLE `elect_table_3` (
  `id` int(11) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `class` text DEFAULT NULL,
  `nominalValue` varchar(255) NOT NULL,
  `nominalUnit` varchar(10) NOT NULL,
  `marking` varchar(255) NOT NULL,
  `conventionalMass` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `uncertainty` varchar(255) NOT NULL,
  `mpe` varchar(255) NOT NULL,
  `calibrationProvider` varchar(255) NOT NULL,
  `standardID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elect_table_3`
--

INSERT INTO `elect_table_3` (`id`, `serialNumber`, `type`, `class`, `nominalValue`, `nominalUnit`, `marking`, `conventionalMass`, `unit`, `uncertainty`, `mpe`, `calibrationProvider`, `standardID`) VALUES
(54, '91096-2023', 'OIML Class E2 Weights ', 'OIML Class E2 Weights  - Test weights', '200', 'g', 'None', '200.00007', 'g', '0.1', '0.3', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '5'),
(55, '91095-2023', 'OIML Class E2 Weights', 'OIML Class E2 Weights  - Test weights', '100', 'g', 'none', '100.00004', 'g', '0.05', '0.16', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '6'),
(56, '91094-2023', 'OIML Class E2 Weights', 'OIML Class E2 Weights - Test weights', '50', 'g', 'none', '50.00003', 'g', '0.03', '0.1', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '7'),
(57, '91093-2023', 'OIML Class E2 Weights', 'OIML Class E2 Weights - Test weights', '10', 'g', 'None', '10.000001', 'g', '0.02', '0.06', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '8'),
(58, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '5', 'kg', 'none', '5000.0038', 'g', '2.5', '8.0', 'NML (Philippines)', '15'),
(59, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '2', 'kg', 'point', '2000.0015', 'g', '1.00', '3.0', 'NML (Philippines)', '15'),
(60, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '2', 'kg', 'none', '2000.0013', 'g', '1.00', '3.0', 'NML (Philippines)', '15'),
(61, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '1', 'kg', 'none', '1000.00036', 'g', '0.53', '1.6', 'NML (Philippines)', '15'),
(62, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '500', 'g', 'none', '499.99999', 'g', '0.26', '0.8', 'NML (Philippines)', '15'),
(63, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '200', 'g', 'point', '199.99997', 'g', '0.10', '0.3', 'NML (Philippines)', '15'),
(109, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '10', 'kg', 'APZ', '10000.1550', 'g', '160', '500', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(110, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '5', 'kg', 'AXY', '5000.0880', 'g', '80', '250', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(111, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '2', 'kg', 'BEQ', '2000.0450', 'g', '36', '100', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(112, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '2', 'kg', 'BEN', '2000.0360', 'g', '30', '100', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(113, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '1', 'kg', 'BQ6', '1000.0180', 'g', '16', '50', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(114, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '500', 'g', 'B8L', '500.0046', 'g', '8', '25', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(115, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '200', 'g', 'BQ7', '200.0020', 'g', '3.0', '10', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(116, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '200', 'g', 'BPZ', '200.0028', 'g', '3.0', '10', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(117, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '100', 'g', 'BER', '100.0015', 'g', '1.6', '5', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(118, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '50', 'g', 'BPK', '50.00050', 'g', '1.00', '3', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(119, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '20', 'g', 'BSJ', '20.00098', 'g', '0.81', '2.5', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(120, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '20', 'g', 'BSG', '20.00111', 'g', '0.80', '2.5', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(121, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '10', 'g', 'B8Y', '10.00058', 'g', '0.60', '2', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(122, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '5', 'g', 'B42', '5.00026', 'g', '0.50', '1.6', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(123, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '2', 'g', 'BM3', '2.00012', 'g', '0.40', '1.2', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(124, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '2', 'g', 'BLI', '5.00004', 'g', '0.40', '1.2', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(125, '4640918-2022', 'OIML Class M₁ Weights', 'Test weights, 1g to 10 kg - M1', '1', 'g', 'B5D', '1.00076', 'g', '0.65', '1', 'NML (Philippines) through DOST CALABARZON - RML', '13'),
(126, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '200', 'g', 'none', '199.99997', 'g', '0.10', '0.3', 'NML (Philippines)', '15'),
(127, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '100', 'g', 'none', '100.00002', 'g', '0.053', '0.2', 'NML (Philippines)', '15'),
(128, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '50', 'g', 'none', '49.99997', 'g', '0.033', '0.10', 'NML (Philippines)', '15'),
(129, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '20', 'g', 'point', '20.000007', 'g', '0.026', '0.08', 'NML (Philippines)', '15'),
(130, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '20', 'g', 'none', '20.000016', 'g', '0.026', '0.08', 'NML (Philippines)', '15'),
(131, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '10', 'g', 'none', '9.999974', 'g', '0.020', '0.1', 'NML (Philippines)', '15'),
(132, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '5', 'g', 'none', '5.000017', 'g', '0.016', '0.05', 'NML (Philippines)', '15'),
(133, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '2', 'g', 'point', '2.000013', 'g', '0.013', '0.04', 'NML (Philippines)', '15'),
(134, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '2', 'g', 'none', '2.000011', 'g', '0.013', '0.04', 'NML (Philippines)', '15'),
(135, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '1', 'g', 'none', '1.000017', 'g', '0.010', '0.03', 'NML (Philippines)', '15'),
(136, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '500', 'mg', 'none', '0.500013', 'g', '0.0083', '0.025', 'NML (Philippines)', '15'),
(137, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '200', 'mg', 'point', '0.200007', 'g', '0.0066', '0.020', 'NML (Philippines)', '15'),
(138, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '200', 'mg', 'none', '0.200008', 'g', '0.0066', '0.020', 'NML (Philippines)', '15'),
(139, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '100', 'mg', 'none', '0.100008', 'g', '0.0053', '0.016', 'NML (Philippines)', '15'),
(140, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '50', 'mg', 'none', '0.050004', 'g', '0.0040', '0.012', 'NML (Philippines)', '15'),
(141, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '20', 'mg', 'point', '0.020004', 'g', '0.0033', '0.010', 'NML (Philippines)', '15'),
(142, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '20', 'mg', 'none', '0.020004', 'g', '0.0033', '0.010', 'NML (Philippines)', '15'),
(143, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '10', 'mg', 'none', '0.010003', 'g', '0.0026', '0.008', 'NML (Philippines)', '15'),
(144, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '5', 'mg', 'none', '0.005002', 'g', '0.0020', '0.006', 'NML (Philippines)', '15'),
(145, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '2', 'mg', 'point', '0.002003', 'g', '0.0020', '0.006', 'NML (Philippines)', '15'),
(146, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '2', 'mg', 'none', '0.002003', 'g', '0.0020', '0.006', 'NML (Philippines)', '15'),
(147, '4000014940-2023', 'OIML Class E2 Weights', 'E2 - Test weights (25 pcs)', '1', 'mg', 'none', '0.0020', 'g', '0.0020', '0.006', 'NML (Philippines)', '15'),
(235, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '5', 'kg', 'A', '5000.021', 'g', '83', '800', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(236, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '10', 'kg', 'B', '10000.12', 'g', '160', '1600', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(237, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '10', 'kg', 'C', '10000.02', 'g', '160', '1600', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(238, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'D', '20000.27', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(239, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'E', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(240, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'F', '20000.27', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(241, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'G', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(242, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'H', '20000.33', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(243, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'I', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(244, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'J', '20000.27', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(245, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'K', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(246, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'L', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(247, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'M', '20000.27', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(248, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'N', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(249, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'O', '20000.17', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(251, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'P', '20000.33', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(252, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'Q', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(253, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'R', '20000.17', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(254, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'S', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(255, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'T', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(257, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'U', '20000.27', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(287, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'kg', 'none', '20000.085', 'g', '100', '300', 'NML (Philippines)', '46'),
(288, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '10', 'kg', 'none', '10000.02', 'g', '50', '160', 'NML (Philippines)', '46'),
(289, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '5', 'kg', 'none', '5000.002', 'g', '25', '80', 'NML (Philippines)', '46'),
(290, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'kg', 'point', '1999.996', 'g', '10', '30', 'NML (Philippines)', '46'),
(291, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'kg', 'none', '1999.995', 'g', '10', '30', 'NML (Philippines)', '46'),
(292, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1', 'kg', 'none', '1000.0002', 'g', '5', '16', 'NML (Philippines)', '46'),
(293, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '500', 'g', 'none', '499.9998', 'g', '2.5', '8', 'NML (Philippines)', '46'),
(294, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'g', 'point', '199.9993', 'g', '1', '3', 'NML (Philippines)', '46'),
(295, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'g', 'none', '200.0013', 'g', '1', '3', 'NML (Philippines)', '46'),
(296, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '100', 'g', 'none', '100.00073', 'g', '0.5', '1.6', 'NML (Philippines)', '46'),
(297, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '50', 'g', 'none', '50.00025', 'g', '0.3', '1', 'NML (Philippines)', '46'),
(298, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'g', 'point', '20.00029', 'g', '0.25', '0.8', 'NML (Philippines)', '46'),
(299, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'g', 'none', '20.00007', 'g', '0.25', '0.8', 'NML (Philippines)', '46'),
(300, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '10', 'g', 'none', '10.00012', 'g', '0.2', '0.6', 'NML (Philippines)', '46'),
(301, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '5', 'g', 'none', '5.00003', 'g', '0.16', '0.5', 'NML (Philippines)', '46'),
(302, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'g', 'point', '2.00013', 'g', '0.12', '0.4', 'NML (Philippines)', '46'),
(303, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'g', 'none', '2.00012', 'g', '0.12', '0.4', 'NML (Philippines)', '46'),
(304, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1', 'g', 'none', '1.00019', 'g', '0.1', '0.3', 'NML (Philippines)', '46'),
(305, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '500', 'mg', 'none', '0.500073', 'g', '0.08', '0.25', 'NML (Philippines)', '46'),
(306, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'mg', 'point', '0.200065', 'g', '0.06', '0.2', 'NML (Philippines)', '46'),
(307, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '200', 'mg', 'none', '0.200058', 'g', '0.06', '0.2', 'NML (Philippines)', '46'),
(308, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '100', 'mg', 'none', '0.10005', 'g', '0.05', '0.16', 'NML (Philippines)', '46'),
(309, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '50', 'mg', 'none', '0.05004', 'g', '0.04', '0.12', 'NML (Philippines)', '46'),
(310, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'mg', 'point', '0.020015', 'g', '0.03', '0.1', 'NML (Philippines)', '46'),
(311, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.1', 'NML (Philippines)', '46'),
(312, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '10', 'mg', 'none', '0.009999', 'g', '0.025', '0.08', 'NML (Philippines)', '46'),
(313, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '5', 'mg', 'none', '0.005008', 'g', '0.02', '0.06', 'NML (Philippines)', '46'),
(314, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'mg', 'point', '0.002002', 'g', '0.02', '0.06', 'NML (Philippines)', '46'),
(315, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '2', 'mg', 'none', '0.002004', 'g', '0.02', '0.06', 'NML (Philippines)', '46'),
(316, '57248 - 2023', 'OIML Class F2 Weights', 'OIML Class F2 Weights - Test weights, 1 mg to 20 kg', '1', 'mg', 'none', '0.001011', 'g', '0.02', '0.060', 'NML (Philippines)', '46'),
(317, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '1', 'kg', 'none', '999.9991', 'g', '5', '16', 'NML (Philippines)', '47'),
(318, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '500', 'g', 'none', '500', 'g', '2.5', '8', 'NML (Philippines)', '47'),
(319, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '200', 'g', 'point', '200.0009', 'g', '1', '3', 'NML (Philippines)', '47'),
(320, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '200', 'g', 'none', '200.0002', 'g', '1', '3', 'NML (Philippines)', '47'),
(321, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '100', 'g', 'none', '99.99985', 'g', '0.5', '1.6', 'NML (Philippines)', '47'),
(322, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '50', 'g', 'none', '50.00019', 'g', '0.3', '1', 'NML (Philippines)', '47'),
(323, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '20', 'g', 'point', '20.00022', 'g', '0.25', '0.8', 'NML (Philippines)', '47'),
(324, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '20', 'g', 'none', '20.00032', 'g', '0.25', '0.8', 'NML (Philippines)', '47'),
(325, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '10', 'g', 'none', '10.00021', 'g', '0.2', '0.6', 'NML (Philippines)', '47'),
(326, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '5', 'g', 'none', '5.00021', 'g', '0.16', '0.5', 'NML (Philippines)', '47'),
(327, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '2', 'g', 'point', '1.99989', 'g', '0.12', '0.4', 'NML (Philippines)', '47'),
(328, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '2', 'g', 'none', '1.99992', 'g', '0.12', '0.4', 'NML (Philippines)', '47'),
(329, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '1', 'g', 'none', '1', 'g', '0.1', '0.3', 'NML (Philippines)', '47'),
(330, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '500', 'mg', 'none', '0.500054', 'g', '0.08', '0.25', 'NML (Philippines)', '47'),
(331, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '200', 'mg', 'point', '0.200051', 'g', '0.06', '0.20', 'NML (Philippines)', '47'),
(332, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '200', 'mg', 'none', '0.200045', 'g', '0.06', '0.20', 'NML (Philippines)', '47'),
(333, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '100', 'mg', 'none', '0.100053', 'g', '0.05', '0.16', 'NML (Philippines)', '47'),
(334, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '50', 'mg', 'none', '0.050004', 'g', '0.04', '0.12', 'NML (Philippines)', '47'),
(335, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '20', 'mg', 'point', '0.019963', 'g', '0.03', '0.10', 'NML (Philippines)', '47'),
(336, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '20', 'mg', 'none', '0.020002', 'g', '0.03', '0.10', 'NML (Philippines)', '47'),
(337, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '10', 'mg', 'none', '0.010013', 'g', '0.025', '0.08', 'NML (Philippines)', '47'),
(338, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '5', 'mg', 'point', '0.005014', 'g', '0.02', '0.06', 'NML (Philippines)', '47'),
(339, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '2', 'mg', 'point', '0.002005', 'g', '0.02', '0.06', 'NML (Philippines)', '47'),
(340, '57249-2023', 'OIML Class F2 Weights', 'F₂ Weights - Test weights, 2 mg to 1 kg', '2', 'mg', 'none', '0.002003', 'g', '0.02', '0.06', 'NML (Philippines)', '47'),
(370, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '5', 'kg', 'A', '5000.88', 'g', '250', '800', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(371, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '10', 'kg', 'B', '10000.1', 'g', '500', '1600', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(372, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '10', 'kg', 'C', '10000.1', 'g', '500', '1600', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(373, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'D', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(374, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'E', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(375, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'F', '20000.33', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(376, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'G', '20000.28', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(377, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'H', '20000.33', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(378, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'I', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(379, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'J', '20000.28', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(380, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'K', '20000.28', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(381, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'L', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(382, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'M', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(383, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'N', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(384, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'O', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(385, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'P', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(386, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'Q', '20000.28', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(387, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'R', '20000.28', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(388, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'S', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(389, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'T', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(390, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'U', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(391, 'M2 Weights (Values Based on Table) - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights - Single Test Weight', '20', 'kg', 'V', '20000.38', 'g', '1000', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '50'),
(401, '6021214 - 2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 20 kg', '20', 'kg', 'AC5', '20000.00096', 'g', '100', '300', 'NML (Philippines)', '55'),
(471, 'M2 Weights - 2022', 'OIML Class M2 Weights', 'OIML Class M2 Weights  - Single Test Weight', '20', 'kg', 'V', '20000.07', 'g', '330', '3000', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '44'),
(480, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '10', 'kg', 'AFT', '10000.046', 'g', '50', '160', 'NML (Philippines)', '61'),
(481, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '5', 'kg', 'AWF', '5000.023', 'g', '25', '80', 'NML (Philippines)', '61'),
(483, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '2', 'kg', 'ASR', '2000.006', 'g', '10', '30', 'NML (Philippines)', '61'),
(484, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '2', 'kg', 'ASS', '2000.005', 'g', '10', '30', 'NML (Philippines)', '61'),
(485, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '1', 'kg', 'AML', '1000.0031', 'g', '5', '16', 'NML (Philippines)', '61'),
(486, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '500', 'g', 'AQF', '500.0017', 'g', '2.5', '8', 'NML (Philippines)', '61'),
(487, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '200', 'g', 'AMY', '200.0004', 'g', '1', '3', 'NML (Philippines)', '61'),
(488, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '200', 'g', 'AMX', '200.0007', 'g', '1', '3', 'NML (Philippines)', '61'),
(489, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '100', 'g', 'ANL', '100.00039', 'g', '0.50', '1.6', 'NML (Philippines)', '61'),
(490, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '50', 'g', 'AJL', '50.00026', 'g', '0.30', '1', 'NML (Philippines)', '61'),
(491, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '20', 'g', 'AN5', '20.00007', 'g', '0.25', '0.8', 'NML (Philippines)', '61'),
(492, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '20', 'g', 'AN4', '20.00027', 'g', '0.25', '0.8', 'NML (Philippines)', '61'),
(493, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '20', 'g', 'AK2', '10.0003', 'g', '0.20', '0.6', 'NML (Philippines)', '61'),
(494, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '5', 'g', 'A14', '5.00018', 'g', '0.16', '0.5', 'NML (Philippines)', '61'),
(495, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '2', 'g', 'ALT', '2.00007', 'g', '0.12', '0.4', 'NML (Philippines)', '61'),
(496, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '2', 'g', 'ALS', '2.00011', 'g', '0.12', '0.4', 'NML (Philippines)', '61'),
(497, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '1', 'g', 'AL5', '1.00005', 'g', '0.10', '0.3', 'NML (Philippines)', '61'),
(498, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '500', 'mg', 'none', '0.50001', 'g', '0.080', '0.25', 'NML (Philippines)', '61'),
(499, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '200', 'mg', 'point', '0.199995', 'g', '0.060', '0.2', 'NML (Philippines)', '61'),
(500, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '200', 'mg', 'none', '0.199989', 'g', '0.060', '0.2', 'NML (Philippines)', '61'),
(501, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '100', 'mg', 'none', '0.100075', 'g', '0.050', '0.16', 'NML (Philippines)', '61'),
(502, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '50', 'mg', 'none', '0.050021', 'g', '0.040', '0.12', 'NML (Philippines)', '61'),
(503, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '20', 'mg', 'point', '0.019997', 'g', '0.030', '0.1', 'NML (Philippines)', '61'),
(504, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '20', 'mg', 'none', '0.020007', 'g', '0.030', '0.1', 'NML (Philippines)', '61'),
(505, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '10', 'mg', 'none', '0.010006', 'g', '0.025', '0.08', 'NML (Philippines)', '61'),
(506, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '2', 'mg', 'point', '0.00201', 'g', '0.020', '0.06', 'NML (Philippines)', '61'),
(507, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '2', 'mg', 'none', '0.002008', 'g', '0.020', '0.06', 'NML (Philippines)', '61'),
(509, '6031214-2022', 'OIML Class F2 Weights', 'OIML Class F₂ Weights - Test weights, 1 mg to 10 kg', '1 ', 'mg', 'none', '0.000997', 'g', '0.020', '0.06', 'NML (Philippines)', '61'),
(512, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '500', 'g', 'BXA', '500.00061', 'g', '0.80', '2.5', 'NML (Philippines)', '49'),
(513, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'g', 'DZ9', '200.00011', 'g', '0.30', '1.0', 'NML (Philippines)', '49'),
(514, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'g', 'DZ8', '200.00014', 'g', '0.30', '1.0', 'NML (Philippines)', '49'),
(515, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '100', 'g', 'CL3', '100.00003', 'g', '0.16', '0.5', 'NML (Philippines)', '49'),
(516, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '50', 'g', 'CG4', '49.99997', 'g', '0.10', '0.3', 'NML (Philippines)', '49'),
(517, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'g', 'CUY', '20.000077', 'g', '0.08', '0.25', 'NML (Philippines)', '49'),
(518, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'g', 'CUW', '19.999992', 'g', '0.08', '0.25', 'NML (Philippines)', '49'),
(519, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '10', 'g', 'C7F', '10.000071', 'g', '0.06', '0.20', 'NML (Philippines)', '49'),
(520, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '5', 'g', 'BPF', '5.000045', 'g', '0.05', '0.16', 'NML (Philippines)', '49'),
(521, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'g', 'GI0', '2.000042', 'g', '0.04', '0.12', 'NML (Philippines)', '49'),
(522, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'g', 'GHX', '2.000043', 'g', '0.04', '0.12', 'NML (Philippines)', '49'),
(523, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '1', 'g', 'CFF', '1.000030', 'g', '0.03', '0.10', 'NML (Philippines)', '49'),
(524, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '500', 'mg', 'none', '0.500010', 'g', '0.025', '0.08', 'NML (Philippines)', '49'),
(525, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'mg', 'point', '0.500030', 'g', '0.020', '0.06', 'NML (Philippines)', '49'),
(526, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '200', 'mg', 'none', '0.200033', 'g', '0.020', '0.06', 'NML (Philippines)', '49'),
(527, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '100', 'mg', 'none', '0.100003', 'g', '0.016', '0.05', 'NML (Philippines)', '49'),
(528, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '50', 'mg', 'none', '0.050015', 'g', '0.012', '0.04', 'NML (Philippines)', '49'),
(529, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'mg', 'point', '0.020012', 'g', '0.010', '0.03', 'NML (Philippines)', '49'),
(530, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '20', 'mg', 'none', '0.020000', 'g', '0.010', '0.03', 'NML (Philippines)', '49'),
(531, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '10', 'mg', 'none', '0.020013', 'g', '0.008', '0.025', 'NML (Philippines)', '49'),
(532, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '5', 'mg', 'none', '0.005003', 'g', '0.006', '0.020', 'NML (Philippines)', '49'),
(533, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'mg', 'point', '0.001992', 'g', '0.006', '0.020', 'NML (Philippines)', '49'),
(534, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '2', 'mg', 'none', '0.001995', 'g', '0.006', '0.020', 'NML (Philippines)', '49'),
(535, '7740119  - 2023', 'OIML Class F1 Weights', 'OIML Class F1 Weights - Test weights, 1 mg to 500 g', '1', 'mg', 'none', '0.001001', 'g', '0.006', '0.020', 'NML (Philippines)', '49'),
(536, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '10', 'kg', 'APZ', '10000.1550', 'g', '160', '500', 'NML (Philippines) through DOST CALABARZON - RM', '62'),
(537, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '5', 'kg', 'AXY', '5000.0880', 'g', '80', '250', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(538, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '2', 'kg', 'BEQ', '2000.0450', 'g', '30', '100', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(539, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '2', 'kg', 'BEN', '2000.0360', 'g', '30', '100', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(540, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '1', 'kg', 'BQ6', '1000.0180', 'g', '16', '50', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(541, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '500', 'g', 'B8L', '500.0046', 'g', '8.0', '25', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(542, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '200', 'g', 'BQ7', '200.0020', 'g', '3.0', '10', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(543, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '200', 'g', 'BPZ', '200.0028', 'g', '3.0', '10', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(544, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '100', 'g', 'BER', '100.0015', 'g', '1.6', '5', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(545, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '50', 'g', 'BPK', '50.00050', 'g', '1.2', '3', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(546, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '20', 'g', 'BSJ', '20.00098', 'g', '1.2', '2.5', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(547, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '20', 'g', 'BSG', '20.00111', 'g', '1.2', '2.5', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(548, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '10', 'g', 'B8Y', '10.00058', 'g', '1.2', '2', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(549, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '5', 'g', 'B42', '5.00026', 'g', '1.2', '1.6', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(550, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '2', 'g', 'BM3', '2.00012', 'g', '1.2', '1.2', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(551, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '2', 'g', 'BLI', '5.00004', 'g', '1.2', '1.2', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(552, '4640918 - 2022 (OIML Uncertainty of Measurement  mg)', 'OIML Class M₁ Weights', 'M₁ - Test weights, 1g to 10 kg', '1', 'g', 'B5D', '1.00076', 'g', '1.2', '1', 'NML (Philippines) through DOST CALABARZON - RML', '62'),
(561, '09000800-2022', 'OIML Class M1 Weights', 'OIML Class M1 Weights - Set of Weights', '5', 'kg', 'none', '5000.027', 'g', '83', '250', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '64'),
(562, '09000800-2022', 'OIML Class M1 Weights', 'OIML Class M1 Weights - Set of Weights', '2', 'kg', 'point', '2000.008', 'g', '33', '100', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '64'),
(563, '09000800-2022', 'OIML Class M1 Weights', 'OIML Class M1 Weights - Set of Weights', '2', 'kg', 'none', '2000.028', 'g', '33', '100', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '64'),
(564, '09000800-2022', 'OIML Class M1 Weights', 'OIML Class M1 Weights - Set of Weights', '1', 'kg', 'none', '1000.014', 'g', '16', '50', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '64'),
(565, '09000800-2022', 'OIML Class M1 Weights', 'OIML Class M1 Weights - Set of Weights', '500', 'g', 'none', '500.0071', 'g', '8.3', '25', 'Sartorius Lab Instruments GmbH & Co. through FPSI', '64');

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
(2, 'Mylene S. Lontoc', 'Calibration Officer', 'mylene_lontoc@gmail.com'),
(3, 'Engr. Rogerson A. Esmeria', 'Laboratory Head', 'roger_esmeria@gmail.com'),
(4, 'John June L. Paran', 'Technical Manager', 'june_paran@gmail.com'),
(5, 'Engr. Mark Gilbert E. Marasigan', 'Calibration Officer', NULL),
(6, 'User Account', '', 'user@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `phmetertable`
--

CREATE TABLE `phmetertable` (
  `id` int(11) NOT NULL DEFAULT 0,
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
  `module11Remarks` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placeholders`
--

INSERT INTO `placeholders` (`id`, `module1CalibrationProcedureAndTraceability`, `module1UncertaintyOfMeasurement`, `module1CalibrationResults`, `module1Remarks`, `module2CalibrationProcedureAndTraceability`, `module2UncertaintyOfMeasurement`, `module2CalibrationResults`, `module2Remarks`, `module3CalibrationProcedureAndTraceability`, `module3CalibrationProcedureAndTraceability2`, `module3UncertaintyOfMeasurement`, `module3CalibrationResults`, `module3Remarks`, `module4CalibrationProcedureAndTraceability`, `module4CalibrationProcedureAndTraceability2`, `module4UncertaintyOfMeasurement`, `module4CalibrationResults`, `module4Remarks`, `module5CalibrationProcedureAndTraceability`, `module5UncertaintyOfMeasurement`, `module5CalibrationResults`, `module5Remarks`, `module7CalibrationProcedureAndTraceability`, `module7CalibrationResults`, `module7UncertaintyOfMeasurement`, `module7MeasurementCondition`, `module7Remarks`, `module9CalibrationProcedureAndTraceabilityVolumetric`, `module9CalibrationProcedureAndTraceabilityPova`, `module9CalibrationResults`, `module9UncertaintyOfMeasurement`, `module9Remarks`, `module11CalibrationProcedureAndTraceability`, `module11CalibrationResults`, `module11UncertaintyOfMeasurement`, `module11Remarks`) VALUES
(1, 'The unit under calibration (UUC) was calibrated following CP-010 based on EURAMET cg-18 “Guidelines on the Calibration of Non-Automatic Weighing Instruments”using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The expanded uncertainty of measurement was obtained by multiplying the combined standard uncertainty by the coverage factor k=2 with a confidence level of approximately 95%.', 'The results of calibration are shown on the following pages of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with RML\\\'s CP-012 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The uncertainty stated in this calibration certificate is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with \"JCGM 100:2008 Evaluation of measurement data - Guide to the expression of uncertainty in measurement\". The value of the measurand lies within the assigned range of values with a probability of approximately 95 %.', 'The results of calibration are shown on page 2 of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.(splitHere)Measurement in italicized form are not included in the Scope of Accreditation of the Laboratory.', 'The unit under calibration (UUC) has been calibrated in accordance with OIML R 111-1: 2004 (E) and RML\'s CP-003 Double Substitution Weighing without Air Buoyancy Correction using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The unit under calibration (UUC) has been calibrated in accordance with OIML R 111-1: 2004 (E) and RML\'s CP-003 Double Substitution Weighing with Air Buoyancy Correction using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory', 'The uncertainty stated in this calibration certificate is the expanded uncertainty at a confidence level of approximately 95% with a coverage factor of k=2.', 'The results of calibration are shown on page 2 of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with RML\'s CP-002 using the following references standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The unit under calibration (UUC) was calibrated in accordance with OIML R 76-1 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The expanded uncertainty of measurement is (SPLIT) estimated at a confidence level of 95% with a coverage factor of k=2.', 'The results of calibration are shown on the following pages of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with RML\'s CP-011 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The uncertainty stated in this calibration certificate is the expanded uncertainty at a confidence level of approximately 95% with a coverage factor of k = 2.', 'The results of calibration are shown on the following pages of this certificate.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) was calibrated in accordance with the Guidance DKD R-6-1 (Edition 03/2014) Calibration of Pressure Gauge following sequence B and RML\'s CP-001 using the following reference standard/s that are traceable to the SI Units as maintained by the issuing laboratory:', 'The results of calibration are shown on page 2 of this certificate.', 'The uncertainty stated is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k=2. It has been determined in accordance with the \"EA-4/02 M: 2022 - Evaluation of Measurement in Calibration \". The value of the measurand lies within the assigned range of values with a probability of approximately 95%.', 'The UUC was mounted according to its normal use with the pressure inlet connection at the bottom and has been calibrated from 0 to 4000 psi positive gauge pressures  using air as pressure medium', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The conversion factor used is: 1 kPa = 0.145038 psi.(splitHere)The data with asterisk (*) was provided by the customer.(splitHere)The UUC was calibrated up to 1500 psi only.', 'The unit under calibration (UUC) has been calibrated in accordance with Gravimetric Method and RML\'s CP-015 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The unit under calibration (UUC) has been calibrated in accordance with Gravimetric Method and RML\'s CP-016 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:', 'The results of calibration are shown on page 2 of this certificate.', 'The uncertainty stated in this calibration certificate is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with \"JCGM 100:2008 Evaluation of measurement data - Guide to the expression of uncertainty in measurement\". The value of the measurand lies within the assigned range of values with a probability of approximately 95 %.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.', 'The unit under calibration (UUC) has been calibrated following CP-009 based on  DKD-R-5-7 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory', 'The results of calibration are shown on the following pages of this certificate.', 'The uncertainty stated in this calibration certificate is the expanded uncertainty obtained by multiplying the standard uncertainty by the coverage factor k = 2. It has been determined in accordance with \"JCGM 100:2008 Evaluation of measurement data - Guide to the expression of uncertainty in measurement\". The value of the measurand lies within the assigned range of values with a probability of approximately 95 %.', 'The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein.(splitHere)No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use.(splitHere)Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.(splitHere)The data with asterisk (*) was provided by the customer.');

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
  `unit_Converted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pressuregaugestandarddetails`
--

INSERT INTO `pressuregaugestandarddetails` (`id`, `standardDescription`, `serialNumber`, `model`, `calibrationCertificate`, `laboratory`, `unit_Original`, `unit_Converted`) VALUES
(1, 'Pressure Module', 'PM 620 / 3905003', 'GE Druck PM 620', '08-2018-PRES-0106', 'NML (Philippines)', 'bar', 'kPa'),
(2, 'Pressure Module', '2883658', 'GE DRUCK PM 620', '08-2018-PRES-0104', 'NML (Philippines)', 'kPa', 'kPa'),
(4, '', '', '', '', '', 'atm', 'atm'),
(5, '', '', '', '', '', 'atm', 'atm'),
(6, 'Digital Pressure Gauge', '218181B0037', 'Additel ADT680', '18081612', 'NIST through Additel Corporation (USA)', 'atm', 'atm'),
(7, 'Digital Pressure Gauge DEMO', '218181B0037', 'Additel ADT680', '18081612', 'NIST through Additel Corporation (USA)', 'psi', 'kPa'),
(8, 'sample', 'sample', 'sample', 'sample', 'sample', 'kPa', 'psi'),
(9, 'Digital Pressure Gauge', '3593048', 'GE Druck DPI104', '10-2018-PRES-0178', 'NML (Philippines)', 'psi', 'kPa'),
(10, 'Digital Pressure Gauge', '4024042', 'Fluke 700G31', '10-2018-PRES-0179', 'NML (Philippines)', 'Mpa', 'kPa'),
(11, 'Pressure Module', '2883658', 'GE DRUCK PM 620', '009327 D-K-15035-01-00 2023-03', 'NML (Philippines)', 'bar', 'psi');

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
  `correction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pressuregaugestandardvalues`
--

INSERT INTO `pressuregaugestandardvalues` (`id`, `serialNumber`, `applied`, `increasing`, `decreasing`, `mean`, `deviation`, `uncertainty`, `correction`) VALUES
(6, '2883658', '0', '0', '0.035', '0.018', '0.018', '0.040', '-0.018'),
(7, '2883658', '199.9276', '199.974', '200.096', '200.035', '0.10739999999998417', '0.09', '-0.10739999999998417'),
(9, '2883658', '399.9576', '400.096', '400.229', '400.162', '0.20439999999996417', '0.09', '-0.20439999999996417'),
(10, 'PM 620 / 3905003', '', '', '', '', '', '', ''),
(11, '2883658', '599.8765', '600.126', '600.259', '600.1925', '0.3160000000000309', '0.090', '-0.3160000000000309'),
(12, '2883658', '799.9004', '800.251', '800.395', '800.3230', '0.42259999999998854', '0.100', '-0.42259999999998854'),
(13, '2883658', '999.8250', '1000.285', '1000.435', '1000.3600', '0.5349999999999682', '0.110', '-0.5349999999999682'),
(14, '2883658', '1199.7487', '1200.325', '1200.474', '1200.3990', '0.6502999999997883', '0.110', '-0.6502999999997883'),
(15, '2883658', '1399.7728', '1400.464', '1400.600', '1400.5320', '0.7591999999999643', '0.110', '-0.7591999999999643'),
(16, '2883658', '1599.6970', '1600.507', '1600.632', '1600.5690', '0.8720000000000709', '0.114', '-0.8720000000000709'),
(17, '2883658', '1799.6823', '1800.611', '1800.705', '1800.6580', '0.9756999999999607', '0.128', '-0.9756999999999607'),
(18, '2883658', '1999.6061', '2000.650', '2000.686', '2000.6680', '1.0618999999999232', '0.142', '-1.0618999999999232'),
(19, '', '1999.6061', '2000.650', '2000.686', '2000.6680', '1.0618999999999232', '0.142', '-1.0618999999999232'),
(20, '218181B0037', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0'),
(21, '218181B0037', '2062.2', '2062.9', '2062.9', '2062.9', '0.7000000000002728', '0.5', '-0.7000000000002728'),
(22, '218181B0037', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181'),
(23, '218181B0037', '6188.7', '6189.4', '6189.4', '6189.4', '0.6999999999998181', '0.8', '-0.6999999999998181'),
(24, '218181B0037', '8252.3', '8253.0', '8253.0', '8253.0', '0.7000000000007276', '1.0', '-0.7000000000007276'),
(25, '218181B0037', '10315.3', '10315.9', '10315.9', '10315.9', '0.6000000000003638', '1.2', '-0.6000000000003638'),
(26, '218181B0037', '12378.9', '12378.9', '12378.9', '12378.9', '0', '1.5', '0'),
(27, '218181B0037', '14441.8', '14442.5', '14442.5', '14442.5', '0.7000000000007276', '1.7', '-0.7000000000007276'),
(28, '218181B0037', '16505.4', '16505.4', '16505.4', '16505.4', '0', '0.0000', '0'),
(29, '218181B0037', '18568.3', '18569.0', '18569.0', '18569.0', '0.7000000000007276', '-0.6895', '-0.7000000000007276'),
(30, '218181B0037', '20631.2', '20631.9', '20631.9', '20631.9', '0.7000000000007276', '2.5', '-0.7000000000007276'),
(31, '218181B0037', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0'),
(32, 'sample', '0.0', '0.0', '0.0', '0.0', '0', '0.4', '0'),
(33, 'sample', '2062.2', '2062.9', '2062.9', '2062.9', '0.7000000000002728', '0.5', '-0.7000000000002728'),
(34, 'sample', '4125.8', '4126.5', '4126.5', '4126.5', '0.6999999999998181', '0.6', '-0.6999999999998181'),
(35, 'sample', '6188.7', '6189.4', '6189.4', '6189.4', '0.6999999999998181', '0.8', '-0.6999999999998181'),
(36, 'sample', '8252.3', '8253.0', '8253.0', '8253.0', '0.7000000000007276', '1.0', '-0.7000000000007276'),
(37, 'sample', '10315.3', '10315.9', '10315.9', '10315.9', '0.6000000000003638', '1.2', '-0.6000000000003638'),
(38, 'sample', '12378.9', '12378.9', '12378.9', '12378.9', '0', '1.5', '0'),
(39, 'sample', '14441.8', '14442.5', '14442.5', '14442.5', '0.7000000000007276', '1.7', '-0.7000000000007276'),
(40, 'sample', '16505.4', '16505.4', '16505.4', '16505.4', '0', '2.0', '0'),
(41, 'sample', '18568.3', '18569.0', '18569.0', '18569.0', '0.7000000000007276', '2.2', '-0.7000000000007276'),
(42, 'sample', '20631.2', '20631.9', '20631.9', '20631.9', '0.7000000000007276', '2.5', '-0.7000000000007276'),
(43, '3593048', '0.000', '0.00', '0.10', '0.050', '0.05', '0.100', '-0.05'),
(44, '3593048', '199.930', '199.90', '200.10', '200.000', '0.06999999999999318', '0.100', '-0.06999999999999318'),
(45, '3593048', '399.960', '399.90', '400.20', '400.050', '0.09000000000003183', '0.200', '-0.09000000000003183'),
(46, '3593048', '599.870', '599.80', '600.10', '599.950', '0.08000000000004093', '0.200', '-0.08000000000004093'),
(47, '3593048', '799.900', '799.90', '800.20', '800.050', '0.14999999999997726', '0.200', '-0.14999999999997726'),
(48, '3593048', '999.820', '999.80', '1000.20', '1000.000', '0.17999999999994998', '0.200', '-0.17999999999994998'),
(49, '3593048', '1199.740', '1199.80', '1200.10', '1199.950', '0.21000000000003638', '0.200', '-0.21000000000003638'),
(50, '3593048', '1399.760', '1399.90', '1400.10', '1400.000', '0.2400000000000091', '0.200', '-0.2400000000000091'),
(51, '3593048', '1599.690', '1600.00', '1600.20', '1600.100', '0.4099999999998545', '0.200', '-0.4099999999998545'),
(52, '3593048', '1799.670', '1799.90', '1800.00', '1799.950', '0.2799999999999727', '0.100', '-0.2799999999999727'),
(53, '3593048', '1999.590', '1999.90', '1999.90', '1999.900', '0.3100000000001728', '0.100', '-0.3100000000001728'),
(54, '4024042', '0', '0.0', '1.0', '0.0', '0', '1.0', '0'),
(55, '4024042', '6998.9', '6992.0', '6992.0', '6992.0', '-6.899999999999636', '1.0', '6.899999999999636'),
(56, '4024042', '13998.2', '13987.0', '13987.0', '13987.0', '-11.200000000000728', '2.0', '11.200000000000728'),
(57, '4024042', '20996.4', '20978.0', '20978.0', '20978.0', '-18.400000000001455', '2.0', '18.400000000001455'),
(58, '4024042', '27995.5', '27976.0', '27973.0', '27974.0', '-21.5', '4.0', '21.5'),
(59, '4024042', '34993.6', '34966.0', '34966.0', '34966.0', '-27.599999999998545', '3.0', '27.599999999998545'),
(60, '4024042', '41991.5', '41964.0', '41960.0', '41962.0', '-29.5', '5.0', '29.5'),
(61, '4024042', '48990.4', '48959.0', '48957.0', '48958.0', '-32.400000000001455', '9.0', '32.400000000001455'),
(62, '4024042', '55988.2', '55948.0', '55949.0', '55948.0', '-40.19999999999709', '5.0', '40.19999999999709'),
(63, '4024042', '62985.9', '62943.0', '62939.0', '62941.0', '-44.900000000001455', '7.0', '44.900000000001455'),
(64, '4024042', '69984.6', '69934.0', '69939.0', '69937.0', '-47.60000000000582', '6.0', '47.60000000000582'),
(65, '2883658', '1', '1', '1', '1', '0', '1', '0');

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
  `role` varchar(255) DEFAULT '''admin'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `lname`, `email`, `phone_no`, `password`, `created_at`, `profile_image`, `signature`, `position`, `role`) VALUES
(2, 'Paulo', 'Molleno', 'pau123@gmail.com', '12312312313', '$2y$10$iEJib7LzvdkONhC01ZL1LuJKC1Yif84NAt/tYd/HE2lhyoQM6aInC', '2021-07-26 00:42:33', NULL, NULL, NULL, 'admin'),
(13, 'Admin', 'Account', 'admin@admin.com', '09123456789', '$2y$10$nw5SvCMa7ZffzltBC59pmekxo6gYmtPJayyKNjLKmcMaIZhJu.kra', '2022-09-22 03:37:10', NULL, NULL, NULL, 'admin'),
(14, 'Roger', 'Esmeria', 'roger_esmeria@gmail.com', '09091234567', '$2y$10$FROSpSIn1V43kubbZ3Xb3.6HAJhDGUva1dl24gd7LovDeBhCZCH9u', '2022-09-27 03:10:34', NULL, NULL, NULL, 'admin'),
(15, 'John June', 'Paran', 'june_paran@gmail.com', '09091234567', '$2y$10$FROSpSIn1V43kubbZ3Xb3.6HAJhDGUva1dl24gd7LovDeBhCZCH9u', '2022-09-27 03:10:34', NULL, NULL, NULL, 'admin');

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
(6, 'Mylene', 'Lontoc', 'mylene_lontoc@gmail.com', '$2y$10$67gm2I7HsPTpOsqWWPyLN.RspgV0FKYABIM0PbivTqUeRnQqakNq2', '09091234567', '2022-09-27 02:56:30', '1664247390_a2d4bf7c1d38bc2f77ec.jpg', '1664247390_241aae4ad14440e45892.png', NULL, 'user');

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
(2, 'S5UC09154', '2023-215-TMP-007-002', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2022-07-29', NULL, NULL, NULL, NULL, NULL, '0.82', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.000\",\"channel1UUCrow1\":\"-39.5\",\"channel1CORRECTIONrow1\":\"-0.50\",\"channel1UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.010\",\"channel1UUCrow2\":\"-19.9\",\"channel1CORRECTIONrow2\":\"-0.11\",\"channel1UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.000\",\"channel1UUCrow3\":\"-9.6\",\"channel1CORRECTIONrow3\":\"-0.40\",\"channel1UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"0.000\",\"channel1UUCrow4\":\"0.1\",\"channel1CORRECTIONrow4\":\"-0.10\",\"channel1UNCERTAINTYrow4\":\"0.29\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"10.6\",\"channel1CORRECTIONrow5\":\"-0.60\",\"channel1UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"20.6\",\"channel1CORRECTIONrow6\":\"-0.60\",\"channel1UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.3\",\"channel1CORRECTIONrow7\":\"-0.30\",\"channel1UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50.0\",\"channel1CORRECTIONrow8\":\"0.00\",\"channel1UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"74.7\",\"channel1CORRECTIONrow9\":\"0.30\",\"channel1UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"100.0\",\"channel1CORRECTIONrow10\":\"0.00\",\"channel1UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"150.4\",\"channel1CORRECTIONrow11\":\"-0.40\",\"channel1UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.020\",\"channel1UUCrow12\":\"200.4\",\"channel1CORRECTIONrow12\":\"-0.38\",\"channel1UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.000\",\"channel2UUCrow1\":\"-39.7\",\"channel2CORRECTIONrow1\":\"-0.30\",\"channel2UNCERTAINTYrow1\":\"0.33\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.010\",\"channel2UUCrow2\":\"-20.0\",\"channel2CORRECTIONrow2\":\"-0.01\",\"channel2UNCERTAINTYrow2\":\"0.33\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.000\",\"channel2UUCrow3\":\"-10.1\",\"channel2CORRECTIONrow3\":\"0.10\",\"channel2UNCERTAINTYrow3\":\"0.36\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"0.000\",\"channel2UUCrow4\":\"-0.1\",\"channel2CORRECTIONrow4\":\"0.10\",\"channel2UNCERTAINTYrow4\":\"0.33\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"10.5\",\"channel2CORRECTIONrow5\":\"-0.50\",\"channel2UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"20.6\",\"channel2CORRECTIONrow6\":\"-0.60\",\"channel2UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.3\",\"channel2CORRECTIONrow7\":\"-0.30\",\"channel2UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.1\",\"channel2CORRECTIONrow8\":\"-0.10\",\"channel2UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"74.8\",\"channel2CORRECTIONrow9\":\"0.20\",\"channel2UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"100.1\",\"channel2CORRECTIONrow10\":\"-0.10\",\"channel2UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"150.3\",\"channel2CORRECTIONrow11\":\"-0.30\",\"channel2UNCERTAINTYrow11\":\"0.76\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.020\",\"channel2UUCrow12\":\"200.4\",\"channel2CORRECTIONrow12\":\"-0.38\",\"channel2UNCERTAINTYrow12\":\"0.76\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.000\",\"channel3UUCrow1\":\"-39.7\",\"channel3CORRECTIONrow1\":\"-0.30\",\"channel3UNCERTAINTYrow1\":\"0.32\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.010\",\"channel3UUCrow2\":\"-20.0\",\"channel3CORRECTIONrow2\":\"-0.01\",\"channel3UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.000\",\"channel3UUCrow3\":\"-10.1\",\"channel3CORRECTIONrow3\":\"0.10\",\"channel3UNCERTAINTYrow3\":\"0.32\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"0.000\",\"channel3UUCrow4\":\"-0.1\",\"channel3CORRECTIONrow4\":\"0.10\",\"channel3UNCERTAINTYrow4\":\"0.31\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"10.4\",\"channel3CORRECTIONrow5\":\"-0.40\",\"channel3UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"20.3\",\"channel3CORRECTIONrow6\":\"-0.30\",\"channel3UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.1\",\"channel3CORRECTIONrow7\":\"-0.10\",\"channel3UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"50.0\",\"channel3CORRECTIONrow8\":\"0.00\",\"channel3UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"74.6\",\"channel3CORRECTIONrow9\":\"0.40\",\"channel3UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.000\",\"channel3UUCrow10\":\"100.0\",\"channel3CORRECTIONrow10\":\"0.00\",\"channel3UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.000\",\"channel3UUCrow11\":\"150.2\",\"channel3CORRECTIONrow11\":\"-0.20\",\"channel3UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.020\",\"channel3UUCrow12\":\"200.1\",\"channel3CORRECTIONrow12\":\"-0.08\",\"channel3UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.000\",\"channel4UUCrow1\":\"-39.8\",\"channel4CORRECTIONrow1\":\"-0.20\",\"channel4UNCERTAINTYrow1\":\"0.45\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.010\",\"channel4UUCrow2\":\"-20.1\",\"channel4CORRECTIONrow2\":\"0.09\",\"channel4UNCERTAINTYrow2\":\"0.45\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.000\",\"channel4UUCrow3\":\"-10.3\",\"channel4CORRECTIONrow3\":\"0.30\",\"channel4UNCERTAINTYrow3\":\"0.45\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"0.000\",\"channel4UUCrow4\":\"-0.1\",\"channel4CORRECTIONrow4\":\"0.10\",\"channel4UNCERTAINTYrow4\":\"0.45\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"10.2\",\"channel4CORRECTIONrow5\":\"-0.20\",\"channel4UNCERTAINTYrow5\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"20.1\",\"channel4CORRECTIONrow6\":\"-0.10\",\"channel4UNCERTAINTYrow6\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"36.9\",\"channel4CORRECTIONrow7\":\"0.10\",\"channel4UNCERTAINTYrow7\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.7\",\"channel4CORRECTIONrow8\":\"0.30\",\"channel4UNCERTAINTYrow8\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.4\",\"channel4CORRECTIONrow9\":\"0.60\",\"channel4UNCERTAINTYrow9\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"99.7\",\"channel4CORRECTIONrow10\":\"0.30\",\"channel4UNCERTAINTYrow10\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.000\",\"channel4UUCrow11\":\"150.0\",\"channel4CORRECTIONrow11\":\"0.00\",\"channel4UNCERTAINTYrow11\":\"0.82\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.020\",\"channel4UUCrow12\":\"199.7\",\"channel4CORRECTIONrow12\":\"0.32\",\"channel4UNCERTAINTYrow12\":\"0.82\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.000\",\"channel5UUCrow1\":\"-39.8\",\"channel5CORRECTIONrow1\":\"-0.20\",\"channel5UNCERTAINTYrow1\":\"0.3\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.010\",\"channel5UUCrow2\":\"-20.0\",\"channel5CORRECTIONrow2\":\"-0.01\",\"channel5UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.000\",\"channel5UUCrow3\":\"-10.1\",\"channel5CORRECTIONrow3\":\"0.10\",\"channel5UNCERTAINTYrow3\":\"0.3\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"0.000\",\"channel5UUCrow4\":\"-0.2\",\"channel5CORRECTIONrow4\":\"0.20\",\"channel5UNCERTAINTYrow4\":\"0.29\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"10.1\",\"channel5CORRECTIONrow5\":\"-0.10\",\"channel5UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"20.1\",\"channel5CORRECTIONrow6\":\"-0.10\",\"channel5UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"36.9\",\"channel5CORRECTIONrow7\":\"0.10\",\"channel5UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.8\",\"channel5CORRECTIONrow8\":\"0.20\",\"channel5UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.6\",\"channel5CORRECTIONrow9\":\"0.40\",\"channel5UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"99.9\",\"channel5CORRECTIONrow10\":\"0.10\",\"channel5UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.000\",\"channel5UUCrow11\":\"150\",\"channel5CORRECTIONrow11\":\"0.00\",\"channel5UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.020\",\"channel5UUCrow12\":\"200.2\",\"channel5CORRECTIONrow12\":\"-0.18\",\"channel5UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.000\",\"channel6UUCrow1\":\"-40.0\",\"channel6CORRECTIONrow1\":\"0.00\",\"channel6UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.010\",\"channel6UUCrow2\":\"-20.2\",\"channel6CORRECTIONrow2\":\"0.19\",\"channel6UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.000\",\"channel6UUCrow3\":\"-10.4\",\"channel6CORRECTIONrow3\":\"0.40\",\"channel6UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"0.000\",\"channel6UUCrow4\":\"-0.4\",\"channel6CORRECTIONrow4\":\"0.40\",\"channel6UNCERTAINTYrow4\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"9.9\",\"channel6CORRECTIONrow5\":\"0.10\",\"channel6UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"19.8\",\"channel6CORRECTIONrow6\":\"0.20\",\"channel6UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.9\",\"channel6CORRECTIONrow7\":\"0.10\",\"channel6UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.7\",\"channel6CORRECTIONrow8\":\"0.30\",\"channel6UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.4\",\"channel6CORRECTIONrow9\":\"0.60\",\"channel6UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"99.7\",\"channel6CORRECTIONrow10\":\"0.30\",\"channel6UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.000\",\"channel6UUCrow11\":\"150.0\",\"channel6CORRECTIONrow11\":\"0.00\",\"channel6UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.020\",\"channel6UUCrow12\":\"199.2\",\"channel6CORRECTIONrow12\":\"0.82\",\"channel6UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.000\",\"channel7UUCrow1\":\"-39.5\",\"channel7CORRECTIONrow1\":\"-0.50\",\"channel7UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.010\",\"channel7UUCrow2\":\"-19.9\",\"channel7CORRECTIONrow2\":\"-0.11\",\"channel7UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.000\",\"channel7UUCrow3\":\"-9.7\",\"channel7CORRECTIONrow3\":\"-0.30\",\"channel7UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"0.000\",\"channel7UUCrow4\":\"0.1\",\"channel7CORRECTIONrow4\":\"-0.10\",\"channel7UNCERTAINTYrow4\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"10.5\",\"channel7CORRECTIONrow5\":\"-0.50\",\"channel7UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"20.6\",\"channel7CORRECTIONrow6\":\"-0.60\",\"channel7UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.2\",\"channel7CORRECTIONrow7\":\"-0.20\",\"channel7UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"50.1\",\"channel7CORRECTIONrow8\":\"-0.10\",\"channel7UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"74.8\",\"channel7CORRECTIONrow9\":\"0.20\",\"channel7UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"100.1\",\"channel7CORRECTIONrow10\":\"-0.10\",\"channel7UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.000\",\"channel7UUCrow11\":\"150.4\",\"channel7CORRECTIONrow11\":\"-0.40\",\"channel7UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.020\",\"channel7UUCrow12\":\"199.9\",\"channel7CORRECTIONrow12\":\"0.12\",\"channel7UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.000\",\"channel8UUCrow1\":\"-39.9\",\"channel8CORRECTIONrow1\":\"-0.10\",\"channel8UNCERTAINTYrow1\":\"0.30\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.010\",\"channel8UUCrow2\":\"-20.1\",\"channel8CORRECTIONrow2\":\"0.09\",\"channel8UNCERTAINTYrow2\":\"0.30\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.000\",\"channel8UUCrow3\":\"-10.1\",\"channel8CORRECTIONrow3\":\"0.10\",\"channel8UNCERTAINTYrow3\":\"0.30\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"0.000\",\"channel8UUCrow4\":\"-0.2\",\"channel8CORRECTIONrow4\":\"0.20\",\"channel8UNCERTAINTYrow4\":\"0.30\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"10.5\",\"channel8CORRECTIONrow5\":\"-0.50\",\"channel8UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"20.5\",\"channel8CORRECTIONrow6\":\"-0.50\",\"channel8UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37.1\",\"channel8CORRECTIONrow7\":\"-0.10\",\"channel8UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"50.0\",\"channel8CORRECTIONrow8\":\"0.00\",\"channel8UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"74.8\",\"channel8CORRECTIONrow9\":\"0.20\",\"channel8UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.000\",\"channel8UUCrow10\":\"100\",\"channel8CORRECTIONrow10\":\"0.00\",\"channel8UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.000\",\"channel8UUCrow11\":\"150.3\",\"channel8CORRECTIONrow11\":\"-0.30\",\"channel8UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.020\",\"channel8UUCrow12\":\"200.0\",\"channel8CORRECTIONrow12\":\"0.02\",\"channel8UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.000\",\"channel9UUCrow1\":\"-39.6\",\"channel9CORRECTIONrow1\":\"-0.40\",\"channel9UNCERTAINTYrow1\":\"0.30\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.010\",\"channel9UUCrow2\":\"-20.0\",\"channel9CORRECTIONrow2\":\"-0.01\",\"channel9UNCERTAINTYrow2\":\"0.30\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.000\",\"channel9UUCrow3\":\"-10.1\",\"channel9CORRECTIONrow3\":\"0.10\",\"channel9UNCERTAINTYrow3\":\"0.30\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"0.000\",\"channel9UUCrow4\":\"-0.1\",\"channel9CORRECTIONrow4\":\"0.10\",\"channel9UNCERTAINTYrow4\":\"0.30\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"10.4\",\"channel9CORRECTIONrow5\":\"-0.40\",\"channel9UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"20.4\",\"channel9CORRECTIONrow6\":\"-0.40\",\"channel9UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37.2\",\"channel9CORRECTIONrow7\":\"-0.20\",\"channel9UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"50.1\",\"channel9CORRECTIONrow8\":\"-0.10\",\"channel9UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"74.8\",\"channel9CORRECTIONrow9\":\"0.20\",\"channel9UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"100.2\",\"channel9CORRECTIONrow10\":\"-0.20\",\"channel9UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.000\",\"channel9UUCrow11\":\"150.7\",\"channel9CORRECTIONrow11\":\"-0.70\",\"channel9UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.020\",\"channel9UUCrow12\":\"199.9\",\"channel9CORRECTIONrow12\":\"0.12\",\"channel9UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.000\",\"channel10UUCrow1\":\"-39.7\",\"channel10CORRECTIONrow1\":\"-0.30\",\"channel10UNCERTAINTYrow1\":\"0.33\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.010\",\"channel10UUCrow2\":\"-20.0\",\"channel10CORRECTIONrow2\":\"-0.01\",\"channel10UNCERTAINTYrow2\":\"0.33\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.000\",\"channel10UUCrow3\":\"-10.2\",\"channel10CORRECTIONrow3\":\"0.20\",\"channel10UNCERTAINTYrow3\":\"0.33\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"0.000\",\"channel10UUCrow4\":\"-0.1\",\"channel10CORRECTIONrow4\":\"0.10\",\"channel10UNCERTAINTYrow4\":\"0.33\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"10.2\",\"channel10CORRECTIONrow5\":\"-0.20\",\"channel10UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"20.1\",\"channel10CORRECTIONrow6\":\"-0.10\",\"channel10UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"37.1\",\"channel10CORRECTIONrow7\":\"-0.10\",\"channel10UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.9\",\"channel10CORRECTIONrow8\":\"0.10\",\"channel10UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.6\",\"channel10CORRECTIONrow9\":\"0.40\",\"channel10UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"100.0\",\"channel10CORRECTIONrow10\":\"0.00\",\"channel10UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.000\",\"channel10UUCrow11\":\"150.2\",\"channel10CORRECTIONrow11\":\"-0.20\",\"channel10UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.020\",\"channel10UUCrow12\":\"200.4\",\"channel10CORRECTIONrow12\":\"-0.38\",\"channel10UNCERTAINTYrow12\":\"0.76\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.000\",\"channel11UUCrow1\":\"-39.8\",\"channel11CORRECTIONrow1\":\"-0.20\",\"channel11UNCERTAINTYrow1\":\"0.33\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.010\",\"channel11UUCrow2\":\"-20.0\",\"channel11CORRECTIONrow2\":\"-0.01\",\"channel11UNCERTAINTYrow2\":\"0.33\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.000\",\"channel11UUCrow3\":\"-10.2\",\"channel11CORRECTIONrow3\":\"0.20\",\"channel11UNCERTAINTYrow3\":\"0.33\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"0.000\",\"channel11UUCrow4\":\"-0.2\",\"channel11CORRECTIONrow4\":\"0.20\",\"channel11UNCERTAINTYrow4\":\"0.33\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"10.2\",\"channel11CORRECTIONrow5\":\"-0.20\",\"channel11UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"20.1\",\"channel11CORRECTIONrow6\":\"-0.10\",\"channel11UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"36.9\",\"channel11CORRECTIONrow7\":\"0.10\",\"channel11UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.8\",\"channel11CORRECTIONrow8\":\"0.20\",\"channel11UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.5\",\"channel11CORRECTIONrow9\":\"0.50\",\"channel11UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"99.8\",\"channel11CORRECTIONrow10\":\"0.20\",\"channel11UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"150.0\",\"channel11CORRECTIONrow11\":\"0.00\",\"channel11UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.020\",\"channel11UUCrow12\":\"199.7\",\"channel11CORRECTIONrow12\":\"0.32\",\"channel11UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.000\",\"channel12UUCrow1\":\"-39.9\",\"channel12CORRECTIONrow1\":\"-0.10\",\"channel12UNCERTAINTYrow1\":\"0.30\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.010\",\"channel12UUCrow2\":\"-20.2\",\"channel12CORRECTIONrow2\":\"0.19\",\"channel12UNCERTAINTYrow2\":\"0.30\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.000\",\"channel12UUCrow3\":\"-10.4\",\"channel12CORRECTIONrow3\":\"0.40\",\"channel12UNCERTAINTYrow3\":\"0.30\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"0.000\",\"channel12UUCrow4\":\"-0.4\",\"channel12CORRECTIONrow4\":\"0.40\",\"channel12UNCERTAINTYrow4\":\"0.30\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"9.9\",\"channel12CORRECTIONrow5\":\"0.10\",\"channel12UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.9\",\"channel12CORRECTIONrow6\":\"0.10\",\"channel12UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"37.1\",\"channel12CORRECTIONrow7\":\"-0.10\",\"channel12UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.8\",\"channel12CORRECTIONrow8\":\"0.20\",\"channel12UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.4\",\"channel12CORRECTIONrow9\":\"0.60\",\"channel12UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"99.9\",\"channel12CORRECTIONrow10\":\"0.10\",\"channel12UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.000\",\"channel12UUCrow11\":\"150.3\",\"channel12CORRECTIONrow11\":\"-0.30\",\"channel12UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.020\",\"channel12UUCrow12\":\"201.0\",\"channel12CORRECTIONrow12\":\"-0.98\",\"channel12UNCERTAINTYrow12\":\"0.76\"}]]'),
(3, 'S5UC09155', '2022-270-TMP-07-003', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2022-07-29', NULL, NULL, NULL, NULL, NULL, '-Infinity', '[]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(10, 'S5UC09155 old TC', '2023-215-TMP-07-003', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2023-07-31', NULL, NULL, NULL, NULL, NULL, '0.81', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.000\",\"channel1UUCrow1\":\"-39.5\",\"channel1CORRECTIONrow1\":\"-0.50\",\"channel1UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.000\",\"channel1UUCrow2\":\"-19.6\",\"channel1CORRECTIONrow2\":\"-0.40\",\"channel1UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.000\",\"channel1UUCrow3\":\"-9.7\",\"channel1CORRECTIONrow3\":\"-0.30\",\"channel1UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"0.000\",\"channel1UUCrow4\":\"0.1\",\"channel1CORRECTIONrow4\":\"-0.10\",\"channel1UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"10.2\",\"channel1CORRECTIONrow5\":\"-0.20\",\"channel1UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"20.2\",\"channel1CORRECTIONrow6\":\"-0.20\",\"channel1UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.2\",\"channel1CORRECTIONrow7\":\"-0.20\",\"channel1UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50\",\"channel1CORRECTIONrow8\":\"0.00\",\"channel1UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"75.3\",\"channel1CORRECTIONrow9\":\"-0.30\",\"channel1UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"100.4\",\"channel1CORRECTIONrow10\":\"-0.40\",\"channel1UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"152.1\",\"channel1CORRECTIONrow11\":\"-2.10\",\"channel1UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.000\",\"channel1UUCrow12\":\"201.7\",\"channel1CORRECTIONrow12\":\"-1.70\",\"channel1UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.000\",\"channel2UUCrow1\":\"-39.7\",\"channel2CORRECTIONrow1\":\"-0.30\",\"channel2UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.000\",\"channel2UUCrow2\":\"-19.4\",\"channel2CORRECTIONrow2\":\"-0.60\",\"channel2UNCERTAINTYrow2\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.000\",\"channel2UUCrow3\":\"-9.6\",\"channel2CORRECTIONrow3\":\"-0.40\",\"channel2UNCERTAINTYrow3\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"0.000\",\"channel2UUCrow4\":\"0.3\",\"channel2CORRECTIONrow4\":\"-0.30\",\"channel2UNCERTAINTYrow4\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"10.3\",\"channel2CORRECTIONrow5\":\"-0.30\",\"channel2UNCERTAINTYrow5\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"20.3\",\"channel2CORRECTIONrow6\":\"-0.30\",\"channel2UNCERTAINTYrow6\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.4\",\"channel2CORRECTIONrow7\":\"-0.40\",\"channel2UNCERTAINTYrow7\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.1\",\"channel2CORRECTIONrow8\":\"-0.10\",\"channel2UNCERTAINTYrow8\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"75.4\",\"channel2CORRECTIONrow9\":\"-0.40\",\"channel2UNCERTAINTYrow9\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"100.4\",\"channel2CORRECTIONrow10\":\"-0.40\",\"channel2UNCERTAINTYrow10\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"151.4\",\"channel2CORRECTIONrow11\":\"-1.40\",\"channel2UNCERTAINTYrow11\":\"0.52\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.000\",\"channel2UUCrow12\":\"201\",\"channel2CORRECTIONrow12\":\"-1.00\",\"channel2UNCERTAINTYrow12\":\"0.52\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.000\",\"channel3UUCrow1\":\"-40\",\"channel3CORRECTIONrow1\":\"0.00\",\"channel3UNCERTAINTYrow1\":\"0.68\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.000\",\"channel3UUCrow2\":\"-21.5\",\"channel3CORRECTIONrow2\":\"1.50\",\"channel3UNCERTAINTYrow2\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.000\",\"channel3UUCrow3\":\"-11.2\",\"channel3CORRECTIONrow3\":\"1.20\",\"channel3UNCERTAINTYrow3\":\"0.81\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"0.000\",\"channel3UUCrow4\":\"-0.1\",\"channel3CORRECTIONrow4\":\"0.10\",\"channel3UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"9.9\",\"channel3CORRECTIONrow5\":\"0.10\",\"channel3UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"20\",\"channel3CORRECTIONrow6\":\"0.00\",\"channel3UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.2\",\"channel3CORRECTIONrow7\":\"-0.20\",\"channel3UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"50.1\",\"channel3CORRECTIONrow8\":\"-0.10\",\"channel3UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"75.3\",\"channel3CORRECTIONrow9\":\"-0.30\",\"channel3UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.000\",\"channel3UUCrow10\":\"100.5\",\"channel3CORRECTIONrow10\":\"-0.50\",\"channel3UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.000\",\"channel3UUCrow11\":\"150.7\",\"channel3CORRECTIONrow11\":\"-0.70\",\"channel3UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.000\",\"channel3UUCrow12\":\"200.1\",\"channel3CORRECTIONrow12\":\"-0.10\",\"channel3UNCERTAINTYrow12\":\"0.77\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.000\",\"channel4UUCrow1\":\"-40.1\",\"channel4CORRECTIONrow1\":\"0.10\",\"channel4UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.000\",\"channel4UUCrow2\":\"-19.6\",\"channel4CORRECTIONrow2\":\"-0.40\",\"channel4UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.000\",\"channel4UUCrow3\":\"-9.7\",\"channel4CORRECTIONrow3\":\"-0.30\",\"channel4UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"0.000\",\"channel4UUCrow4\":\"0.1\",\"channel4CORRECTIONrow4\":\"-0.10\",\"channel4UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"10.1\",\"channel4CORRECTIONrow5\":\"-0.10\",\"channel4UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"19.8\",\"channel4CORRECTIONrow6\":\"0.20\",\"channel4UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"37.0\",\"channel4CORRECTIONrow7\":\"0.00\",\"channel4UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.9\",\"channel4CORRECTIONrow8\":\"0.10\",\"channel4UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.7\",\"channel4CORRECTIONrow9\":\"0.30\",\"channel4UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"99.9\",\"channel4CORRECTIONrow10\":\"0.10\",\"channel4UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.000\",\"channel4UUCrow11\":\"150.4\",\"channel4CORRECTIONrow11\":\"-0.40\",\"channel4UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.000\",\"channel4UUCrow12\":\"200.1\",\"channel4CORRECTIONrow12\":\"-0.10\",\"channel4UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.000\",\"channel5UUCrow1\":\"-40\",\"channel5CORRECTIONrow1\":\"0.00\",\"channel5UNCERTAINTYrow1\":\"0.30\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.000\",\"channel5UUCrow2\":\"-20.1\",\"channel5CORRECTIONrow2\":\"0.10\",\"channel5UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.000\",\"channel5UUCrow3\":\"-10.3\",\"channel5CORRECTIONrow3\":\"0.30\",\"channel5UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"0.000\",\"channel5UUCrow4\":\"0.2\",\"channel5CORRECTIONrow4\":\"-0.20\",\"channel5UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"10.1\",\"channel5CORRECTIONrow5\":\"-0.10\",\"channel5UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"20\",\"channel5CORRECTIONrow6\":\"0.00\",\"channel5UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"37\",\"channel5CORRECTIONrow7\":\"0.00\",\"channel5UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.9\",\"channel5CORRECTIONrow8\":\"0.10\",\"channel5UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.7\",\"channel5CORRECTIONrow9\":\"0.30\",\"channel5UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"99.8\",\"channel5CORRECTIONrow10\":\"0.20\",\"channel5UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.000\",\"channel5UUCrow11\":\"150.4\",\"channel5CORRECTIONrow11\":\"-0.40\",\"channel5UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.000\",\"channel5UUCrow12\":\"200.3\",\"channel5CORRECTIONrow12\":\"-0.30\",\"channel5UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.000\",\"channel6UUCrow1\":\"-40.1\",\"channel6CORRECTIONrow1\":\"0.10\",\"channel6UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.000\",\"channel6UUCrow2\":\"-19.7\",\"channel6CORRECTIONrow2\":\"-0.30\",\"channel6UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.000\",\"channel6UUCrow3\":\"-9.6\",\"channel6CORRECTIONrow3\":\"-0.40\",\"channel6UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"0.000\",\"channel6UUCrow4\":\"0.2\",\"channel6CORRECTIONrow4\":\"-0.20\",\"channel6UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"10.1\",\"channel6CORRECTIONrow5\":\"-0.10\",\"channel6UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"19.8\",\"channel6CORRECTIONrow6\":\"0.20\",\"channel6UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.7\",\"channel6CORRECTIONrow7\":\"0.30\",\"channel6UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.6\",\"channel6CORRECTIONrow8\":\"0.40\",\"channel6UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.3\",\"channel6CORRECTIONrow9\":\"0.70\",\"channel6UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"99.5\",\"channel6CORRECTIONrow10\":\"0.50\",\"channel6UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.000\",\"channel6UUCrow11\":\"150\",\"channel6CORRECTIONrow11\":\"0.00\",\"channel6UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.000\",\"channel6UUCrow12\":\"200\",\"channel6CORRECTIONrow12\":\"0.00\",\"channel6UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.000`\",\"channel7UUCrow1\":\"-39.6\",\"channel7CORRECTIONrow1\":\"-0.40\",\"channel7UNCERTAINTYrow1\":\"0.3\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.000\",\"channel7UUCrow2\":\"-20.1\",\"channel7CORRECTIONrow2\":\"0.10\",\"channel7UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.000\",\"channel7UUCrow3\":\"-10.5\",\"channel7CORRECTIONrow3\":\"0.50\",\"channel7UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"0.000\",\"channel7UUCrow4\":\"-0.10\",\"channel7CORRECTIONrow4\":\"0.10\",\"channel7UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"10.1\",\"channel7CORRECTIONrow5\":\"-0.10\",\"channel7UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"20.2\",\"channel7CORRECTIONrow6\":\"-0.20\",\"channel7UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.2\",\"channel7CORRECTIONrow7\":\"-0.20\",\"channel7UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"50\",\"channel7CORRECTIONrow8\":\"0.00\",\"channel7UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"75.6\",\"channel7CORRECTIONrow9\":\"-0.60\",\"channel7UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"100.5\",\"channel7CORRECTIONrow10\":\"-0.50\",\"channel7UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.000\",\"channel7UUCrow11\":\"150.9\",\"channel7CORRECTIONrow11\":\"-0.90\",\"channel7UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.000\",\"channel7UUCrow12\":\"200.1\",\"channel7CORRECTIONrow12\":\"-0.10\",\"channel7UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.000\",\"channel8UUCrow1\":\"-39.8\",\"channel8CORRECTIONrow1\":\"-0.20\",\"channel8UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.000\",\"channel8UUCrow2\":\"-20.4\",\"channel8CORRECTIONrow2\":\"0.40\",\"channel8UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.000\",\"channel8UUCrow3\":\"-10.6\",\"channel8CORRECTIONrow3\":\"0.60\",\"channel8UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"0.000\",\"channel8UUCrow4\":\"0.00\",\"channel8CORRECTIONrow4\":\"0.00\",\"channel8UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"10.1\",\"channel8CORRECTIONrow5\":\"-0.10\",\"channel8UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"20.2\",\"channel8CORRECTIONrow6\":\"-0.20\",\"channel8UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37.3\",\"channel8CORRECTIONrow7\":\"-0.30\",\"channel8UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"50.1\",\"channel8CORRECTIONrow8\":\"-0.10\",\"channel8UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"75.6\",\"channel8CORRECTIONrow9\":\"-0.60\",\"channel8UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.000\",\"channel8UUCrow10\":\"100.6\",\"channel8CORRECTIONrow10\":\"-0.60\",\"channel8UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.000\",\"channel8UUCrow11\":\"151.3\",\"channel8CORRECTIONrow11\":\"-1.30\",\"channel8UNCERTAINTYrow11\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.000\",\"channel8UUCrow12\":\"200.8\",\"channel8CORRECTIONrow12\":\"-0.80\",\"channel8UNCERTAINTYrow12\":\"0.48\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.000\",\"channel9UUCrow1\":\"-39.7\",\"channel9CORRECTIONrow1\":\"-0.30\",\"channel9UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.000\",\"channel9UUCrow2\":\"-19.8\",\"channel9CORRECTIONrow2\":\"-0.20\",\"channel9UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.000\",\"channel9UUCrow3\":\"-10.5\",\"channel9CORRECTIONrow3\":\"0.50\",\"channel9UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"0.000\",\"channel9UUCrow4\":\"0.1\",\"channel9CORRECTIONrow4\":\"-0.10\",\"channel9UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"10.1\",\"channel9CORRECTIONrow5\":\"-0.10\",\"channel9UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"20.1\",\"channel9CORRECTIONrow6\":\"-0.10\",\"channel9UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37.1\",\"channel9CORRECTIONrow7\":\"-0.10\",\"channel9UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"50.1\",\"channel9CORRECTIONrow8\":\"-0.10\",\"channel9UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"75.3\",\"channel9CORRECTIONrow9\":\"-0.30\",\"channel9UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"100.4\",\"channel9CORRECTIONrow10\":\"-0.40\",\"channel9UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.000\",\"channel9UUCrow11\":\"150.6\",\"channel9CORRECTIONrow11\":\"-0.60\",\"channel9UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.000\",\"channel9UUCrow12\":\"200.1\",\"channel9CORRECTIONrow12\":\"-0.10\",\"channel9UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.000\",\"channel10UUCrow1\":\"-39.9\",\"channel10CORRECTIONrow1\":\"-0.10\",\"channel10UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.000\",\"channel10UUCrow2\":\"-19.6\",\"channel10CORRECTIONrow2\":\"-0.40\",\"channel10UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.000\",\"channel10UUCrow3\":\"-9.7\",\"channel10CORRECTIONrow3\":\"-0.30\",\"channel10UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"0.000\",\"channel10UUCrow4\":\"0.1\",\"channel10CORRECTIONrow4\":\"-0.10\",\"channel10UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"10.1\",\"channel10CORRECTIONrow5\":\"-0.10\",\"channel10UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"19.9\",\"channel10CORRECTIONrow6\":\"0.10\",\"channel10UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"36.9\",\"channel10CORRECTIONrow7\":\"0.10\",\"channel10UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.9\",\"channel10CORRECTIONrow8\":\"0.10\",\"channel10UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.8\",\"channel10CORRECTIONrow9\":\"0.20\",\"channel10UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"100\",\"channel10CORRECTIONrow10\":\"0.00\",\"channel10UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.000\",\"channel10UUCrow11\":\"150.4\",\"channel10CORRECTIONrow11\":\"-0.40\",\"channel10UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.000\",\"channel10UUCrow12\":\"200.1\",\"channel10CORRECTIONrow12\":\"-0.10\",\"channel10UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.000\",\"channel11UUCrow1\":\"-39.9\",\"channel11CORRECTIONrow1\":\"-0.10\",\"channel11UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.000\",\"channel11UUCrow2\":\"-19.6\",\"channel11CORRECTIONrow2\":\"-0.40\",\"channel11UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.000\",\"channel11UUCrow3\":\"-9.60\",\"channel11CORRECTIONrow3\":\"-0.40\",\"channel11UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"0.000\",\"channel11UUCrow4\":\"0.20\",\"channel11CORRECTIONrow4\":\"-0.20\",\"channel11UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"10.1\",\"channel11CORRECTIONrow5\":\"-0.10\",\"channel11UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"19.9\",\"channel11CORRECTIONrow6\":\"0.10\",\"channel11UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"36.8\",\"channel11CORRECTIONrow7\":\"0.20\",\"channel11UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.8\",\"channel11CORRECTIONrow8\":\"0.20\",\"channel11UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.5\",\"channel11CORRECTIONrow9\":\"0.50\",\"channel11UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"99.7\",\"channel11CORRECTIONrow10\":\"0.30\",\"channel11UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"150.5\",\"channel11CORRECTIONrow11\":\"-0.50\",\"channel11UNCERTAINTYrow11\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.000\",\"channel11UUCrow12\":\"200.6\",\"channel11CORRECTIONrow12\":\"-0.60\",\"channel11UNCERTAINTYrow12\":\"0.47\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.000\",\"channel12UUCrow1\":\"-39.9\",\"channel12CORRECTIONrow1\":\"-0.10\",\"channel12UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.000\",\"channel12UUCrow2\":\"-19.4\",\"channel12CORRECTIONrow2\":\"-0.60\",\"channel12UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.000\",\"channel12UUCrow3\":\"-9.2\",\"channel12CORRECTIONrow3\":\"-0.80\",\"channel12UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"0.000\",\"channel12UUCrow4\":\"0.1\",\"channel12CORRECTIONrow4\":\"-0.10\",\"channel12UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"10.1\",\"channel12CORRECTIONrow5\":\"-0.10\",\"channel12UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.8\",\"channel12CORRECTIONrow6\":\"0.20\",\"channel12UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"36.6\",\"channel12CORRECTIONrow7\":\"0.40\",\"channel12UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.6\",\"channel12CORRECTIONrow8\":\"0.40\",\"channel12UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.3\",\"channel12CORRECTIONrow9\":\"0.70\",\"channel12UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"99.4\",\"channel12CORRECTIONrow10\":\"0.60\",\"channel12UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.000\",\"channel12UUCrow11\":\"149.9\",\"channel12CORRECTIONrow11\":\"0.10\",\"channel12UNCERTAINTYrow11\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.000\",\"channel12UUCrow12\":\"200\",\"channel12CORRECTIONrow12\":\"0.00\",\"channel12UNCERTAINTYrow12\":\"0.48\"}]]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(11, 'S5UC09155 new TC', '2023-215-TMP-07-004', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Yokogawa', 'FX1012-4-2-H/C7/USB/CC1', '2023-07-31', NULL, NULL, NULL, NULL, NULL, '0.77', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.010\",\"channel1UUCrow1\":\"-39.5\",\"channel1CORRECTIONrow1\":\"-0.51\",\"channel1UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.010\",\"channel1UUCrow2\":\"-19.5\",\"channel1CORRECTIONrow2\":\"-0.51\",\"channel1UNCERTAINTYrow2\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.010\",\"channel1UUCrow3\":\"-9.4\",\"channel1CORRECTIONrow3\":\"-0.61\",\"channel1UNCERTAINTYrow3\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"-0.010\",\"channel1UUCrow4\":\"0.4\",\"channel1CORRECTIONrow4\":\"-0.41\",\"channel1UNCERTAINTYrow4\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"9.990\",\"channel1UUCrow5\":\"10.4\",\"channel1CORRECTIONrow5\":\"-0.41\",\"channel1UNCERTAINTYrow5\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"19.990\",\"channel1UUCrow6\":\"20.5\",\"channel1CORRECTIONrow6\":\"-0.51\",\"channel1UNCERTAINTYrow6\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.5\",\"channel1CORRECTIONrow7\":\"-0.50\",\"channel1UNCERTAINTYrow7\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50.4\",\"channel1CORRECTIONrow8\":\"-0.40\",\"channel1UNCERTAINTYrow8\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"75.5\",\"channel1CORRECTIONrow9\":\"-0.50\",\"channel1UNCERTAINTYrow9\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.010\",\"channel1UUCrow10\":\"100.5\",\"channel1CORRECTIONrow10\":\"-0.49\",\"channel1UNCERTAINTYrow10\":\"0.52\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"151.7\",\"channel1CORRECTIONrow11\":\"-1.70\",\"channel1UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.020\",\"channel1UUCrow12\":\"201.7\",\"channel1CORRECTIONrow12\":\"-1.68\",\"channel1UNCERTAINTYrow12\":\"0.77\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.010\",\"channel2UUCrow1\":\"-39\",\"channel2CORRECTIONrow1\":\"-1.01\",\"channel2UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.010\",\"channel2UUCrow2\":\"-19.2\",\"channel2CORRECTIONrow2\":\"-0.81\",\"channel2UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.010\",\"channel2UUCrow3\":\"-9.10\",\"channel2CORRECTIONrow3\":\"-0.91\",\"channel2UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"-0.010\",\"channel2UUCrow4\":\"0.6\",\"channel2CORRECTIONrow4\":\"-0.61\",\"channel2UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"9.990\",\"channel2UUCrow5\":\"10.5\",\"channel2CORRECTIONrow5\":\"-0.51\",\"channel2UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"19.990\",\"channel2UUCrow6\":\"20.5\",\"channel2CORRECTIONrow6\":\"-0.51\",\"channel2UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.4\",\"channel2CORRECTIONrow7\":\"-0.40\",\"channel2UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.2\",\"channel2CORRECTIONrow8\":\"-0.20\",\"channel2UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"75.2\",\"channel2CORRECTIONrow9\":\"-0.20\",\"channel2UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.010\",\"channel2UUCrow10\":\"100.2\",\"channel2CORRECTIONrow10\":\"-0.19\",\"channel2UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"151\",\"channel2CORRECTIONrow11\":\"-1.00\",\"channel2UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.020\",\"channel2UUCrow12\":\"201.1\",\"channel2CORRECTIONrow12\":\"-1.08\",\"channel2UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.010\",\"channel3UUCrow1\":\"-39.5\",\"channel3CORRECTIONrow1\":\"-0.51\",\"channel3UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.010\",\"channel3UUCrow2\":\"-19.6\",\"channel3CORRECTIONrow2\":\"-0.41\",\"channel3UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.010\",\"channel3UUCrow3\":\"-9.6\",\"channel3CORRECTIONrow3\":\"-0.41\",\"channel3UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"-0.010\",\"channel3UUCrow4\":\"0.2\",\"channel3CORRECTIONrow4\":\"-0.21\",\"channel3UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"9.990\",\"channel3UUCrow5\":\"10\",\"channel3CORRECTIONrow5\":\"-0.01\",\"channel3UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"19.990\",\"channel3UUCrow6\":\"20.1\",\"channel3CORRECTIONrow6\":\"-0.11\",\"channel3UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.2\",\"channel3CORRECTIONrow7\":\"-0.20\",\"channel3UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"50.2\",\"channel3CORRECTIONrow8\":\"-0.20\",\"channel3UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"75.3\",\"channel3CORRECTIONrow9\":\"-0.30\",\"channel3UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.010\",\"channel3UUCrow10\":\"100.5\",\"channel3CORRECTIONrow10\":\"-0.49\",\"channel3UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.000\",\"channel3UUCrow11\":\"151.3\",\"channel3CORRECTIONrow11\":\"-1.30\",\"channel3UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.020\",\"channel3UUCrow12\":\"201.5\",\"channel3CORRECTIONrow12\":\"-1.48\",\"channel3UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.010\",\"channel4UUCrow1\":\"-39.6\",\"channel4CORRECTIONrow1\":\"-0.41\",\"channel4UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.010\",\"channel4UUCrow2\":\"-19.6\",\"channel4CORRECTIONrow2\":\"-0.41\",\"channel4UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.010\",\"channel4UUCrow3\":\"-9.8\",\"channel4CORRECTIONrow3\":\"-0.21\",\"channel4UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"-0.010\",\"channel4UUCrow4\":\"0.1\",\"channel4CORRECTIONrow4\":\"-0.11\",\"channel4UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"9.990\",\"channel4UUCrow5\":\"10.1\",\"channel4CORRECTIONrow5\":\"-0.11\",\"channel4UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"19.990\",\"channel4UUCrow6\":\"20.1\",\"channel4CORRECTIONrow6\":\"-0.11\",\"channel4UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"37\",\"channel4CORRECTIONrow7\":\"0.00\",\"channel4UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"50\",\"channel4CORRECTIONrow8\":\"0.00\",\"channel4UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"75.2\",\"channel4CORRECTIONrow9\":\"-0.20\",\"channel4UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.010\",\"channel4UUCrow10\":\"100.4\",\"channel4CORRECTIONrow10\":\"-0.39\",\"channel4UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.000\",\"channel4UUCrow11\":\"151.1\",\"channel4CORRECTIONrow11\":\"-1.10\",\"channel4UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.020\",\"channel4UUCrow12\":\"201\",\"channel4CORRECTIONrow12\":\"-0.98\",\"channel4UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.010\",\"channel5UUCrow1\":\"-39.3\",\"channel5CORRECTIONrow1\":\"-0.71\",\"channel5UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.010\",\"channel5UUCrow2\":\"-19.4\",\"channel5CORRECTIONrow2\":\"-0.61\",\"channel5UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.010\",\"channel5UUCrow3\":\"-9.7\",\"channel5CORRECTIONrow3\":\"-0.31\",\"channel5UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"-0.010\",\"channel5UUCrow4\":\"0.1\",\"channel5CORRECTIONrow4\":\"-0.11\",\"channel5UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"9.990\",\"channel5UUCrow5\":\"10.1\",\"channel5CORRECTIONrow5\":\"-0.11\",\"channel5UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"19.990\",\"channel5UUCrow6\":\"20.1\",\"channel5CORRECTIONrow6\":\"-0.11\",\"channel5UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"36.9\",\"channel5CORRECTIONrow7\":\"0.10\",\"channel5UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"50\",\"channel5CORRECTIONrow8\":\"0.00\",\"channel5UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"75\",\"channel5CORRECTIONrow9\":\"0.00\",\"channel5UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.010\",\"channel5UUCrow10\":\"100\",\"channel5CORRECTIONrow10\":\"0.01\",\"channel5UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.000\",\"channel5UUCrow11\":\"150.6\",\"channel5CORRECTIONrow11\":\"-0.60\",\"channel5UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.020\",\"channel5UUCrow12\":\"200.1\",\"channel5CORRECTIONrow12\":\"-0.08\",\"channel5UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.010\",\"channel6UUCrow1\":\"-39.6\",\"channel6CORRECTIONrow1\":\"-0.41\",\"channel6UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.010\",\"channel6UUCrow2\":\"-16.7\",\"channel6CORRECTIONrow2\":\"-3.31\",\"channel6UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.010\",\"channel6UUCrow3\":\"-10.3\",\"channel6CORRECTIONrow3\":\"0.29\",\"channel6UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"-0.010\",\"channel6UUCrow4\":\"-0.1\",\"channel6CORRECTIONrow4\":\"0.09\",\"channel6UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"9.990\",\"channel6UUCrow5\":\"10.2\",\"channel6CORRECTIONrow5\":\"-0.21\",\"channel6UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"19.990\",\"channel6UUCrow6\":\"19.9\",\"channel6CORRECTIONrow6\":\"0.09\",\"channel6UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"36.9\",\"channel6CORRECTIONrow7\":\"0.10\",\"channel6UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"50\",\"channel6CORRECTIONrow8\":\"0.00\",\"channel6UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"75.1\",\"channel6CORRECTIONrow9\":\"-0.10\",\"channel6UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.010\",\"channel6UUCrow10\":\"100.2\",\"channel6CORRECTIONrow10\":\"-0.19\",\"channel6UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.000\",\"channel6UUCrow11\":\"151.2\",\"channel6CORRECTIONrow11\":\"-1.20\",\"channel6UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.020\",\"channel6UUCrow12\":\"200.8\",\"channel6CORRECTIONrow12\":\"-0.78\",\"channel6UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.010\",\"channel7UUCrow1\":\"-39.5\",\"channel7CORRECTIONrow1\":\"-0.51\",\"channel7UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.010\",\"channel7UUCrow2\":\"-19.6\",\"channel7CORRECTIONrow2\":\"-0.41\",\"channel7UNCERTAINTYrow2\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.010\",\"channel7UUCrow3\":\"-9.4\",\"channel7CORRECTIONrow3\":\"-0.61\",\"channel7UNCERTAINTYrow3\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"-0.010\",\"channel7UUCrow4\":\"0.3\",\"channel7CORRECTIONrow4\":\"-0.31\",\"channel7UNCERTAINTYrow4\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"9.990\",\"channel7UUCrow5\":\"10.5\",\"channel7CORRECTIONrow5\":\"-0.51\",\"channel7UNCERTAINTYrow5\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"19.990\",\"channel7UUCrow6\":\"20.4\",\"channel7CORRECTIONrow6\":\"-0.41\",\"channel7UNCERTAINTYrow6\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.4\",\"channel7CORRECTIONrow7\":\"-0.40\",\"channel7UNCERTAINTYrow7\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"50.3\",\"channel7CORRECTIONrow8\":\"-0.30\",\"channel7UNCERTAINTYrow8\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"75.3\",\"channel7CORRECTIONrow9\":\"-0.30\",\"channel7UNCERTAINTYrow9\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.010\",\"channel7UUCrow10\":\"100.3\",\"channel7CORRECTIONrow10\":\"-0.29\",\"channel7UNCERTAINTYrow10\":\"0.52\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.000\",\"channel7UUCrow11\":\"151.4\",\"channel7CORRECTIONrow11\":\"-1.40\",\"channel7UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.020\",\"channel7UUCrow12\":\"201.1\",\"channel7CORRECTIONrow12\":\"-1.08\",\"channel7UNCERTAINTYrow12\":\"0.77\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.010\",\"channel8UUCrow1\":\"-39.4\",\"channel8CORRECTIONrow1\":\"-0.61\",\"channel8UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.010\",\"channel8UUCrow2\":\"-19.5\",\"channel8CORRECTIONrow2\":\"-0.51\",\"channel8UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.010\",\"channel8UUCrow3\":\"-9.4\",\"channel8CORRECTIONrow3\":\"-0.61\",\"channel8UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"-0.010\",\"channel8UUCrow4\":\"0.3\",\"channel8CORRECTIONrow4\":\"-0.31\",\"channel8UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"9.990\",\"channel8UUCrow5\":\"10.4\",\"channel8CORRECTIONrow5\":\"-0.41\",\"channel8UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"19.990\",\"channel8UUCrow6\":\"20.3\",\"channel8CORRECTIONrow6\":\"-0.31\",\"channel8UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37.3\",\"channel8CORRECTIONrow7\":\"-0.30\",\"channel8UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"50.2\",\"channel8CORRECTIONrow8\":\"-0.20\",\"channel8UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"75.3\",\"channel8CORRECTIONrow9\":\"-0.30\",\"channel8UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.010\",\"channel8UUCrow10\":\"100.4\",\"channel8CORRECTIONrow10\":\"-0.39\",\"channel8UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.000\",\"channel8UUCrow11\":\"151.2\",\"channel8CORRECTIONrow11\":\"-1.20\",\"channel8UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.020\",\"channel8UUCrow12\":\"201\",\"channel8CORRECTIONrow12\":\"-0.98\",\"channel8UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.010\",\"channel9UUCrow1\":\"-39.5\",\"channel9CORRECTIONrow1\":\"-0.51\",\"channel9UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.010\",\"channel9UUCrow2\":\"-19.6\",\"channel9CORRECTIONrow2\":\"-0.41\",\"channel9UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.010\",\"channel9UUCrow3\":\"-9.6\",\"channel9CORRECTIONrow3\":\"-0.41\",\"channel9UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"-0.010\",\"channel9UUCrow4\":\"0.3\",\"channel9CORRECTIONrow4\":\"-0.31\",\"channel9UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"9.990\",\"channel9UUCrow5\":\"10.1\",\"channel9CORRECTIONrow5\":\"-0.11\",\"channel9UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"19.990\",\"channel9UUCrow6\":\"20.1\",\"channel9CORRECTIONrow6\":\"-0.11\",\"channel9UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37.2\",\"channel9CORRECTIONrow7\":\"-0.20\",\"channel9UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"50.3\",\"channel9CORRECTIONrow8\":\"-0.30\",\"channel9UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"75.3\",\"channel9CORRECTIONrow9\":\"-0.30\",\"channel9UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.010\",\"channel9UUCrow10\":\"100.6\",\"channel9CORRECTIONrow10\":\"-0.59\",\"channel9UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.000\",\"channel9UUCrow11\":\"151.1\",\"channel9CORRECTIONrow11\":\"-1.10\",\"channel9UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.020\",\"channel9UUCrow12\":\"200.9\",\"channel9CORRECTIONrow12\":\"-0.88\",\"channel9UNCERTAINTYrow12\":\"0.75\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.010\",\"channel10UUCrow1\":\"-39.6\",\"channel10CORRECTIONrow1\":\"-0.41\",\"channel10UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.010\",\"channel10UUCrow2\":\"-19.6\",\"channel10CORRECTIONrow2\":\"-0.41\",\"channel10UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.010\",\"channel10UUCrow3\":\"-9.9\",\"channel10CORRECTIONrow3\":\"-0.11\",\"channel10UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"-0.010\",\"channel10UUCrow4\":\"0.1\",\"channel10CORRECTIONrow4\":\"-0.11\",\"channel10UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"9.990\",\"channel10UUCrow5\":\"10.1\",\"channel10CORRECTIONrow5\":\"-0.11\",\"channel10UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"19.990\",\"channel10UUCrow6\":\"20\",\"channel10CORRECTIONrow6\":\"-0.01\",\"channel10UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"37.1\",\"channel10CORRECTIONrow7\":\"-0.10\",\"channel10UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"50.1\",\"channel10CORRECTIONrow8\":\"-0.10\",\"channel10UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"75.2\",\"channel10CORRECTIONrow9\":\"-0.20\",\"channel10UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.010\",\"channel10UUCrow10\":\"100.5\",\"channel10CORRECTIONrow10\":\"-0.49\",\"channel10UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.170\",\"channel10UUCrow11\":\"151\",\"channel10CORRECTIONrow11\":\"-0.83\",\"channel10UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.020\",\"channel10UUCrow12\":\"200.6\",\"channel10CORRECTIONrow12\":\"-0.58\",\"channel10UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.010\",\"channel11UUCrow1\":\"-39.4\",\"channel11CORRECTIONrow1\":\"-0.61\",\"channel11UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.010\",\"channel11UUCrow2\":\"-19.1\",\"channel11CORRECTIONrow2\":\"-0.91\",\"channel11UNCERTAINTYrow2\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.010\",\"channel11UUCrow3\":\"-9.8\",\"channel11CORRECTIONrow3\":\"-0.21\",\"channel11UNCERTAINTYrow3\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"-0.010\",\"channel11UUCrow4\":\"0.1\",\"channel11CORRECTIONrow4\":\"-0.11\",\"channel11UNCERTAINTYrow4\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"9.990\",\"channel11UUCrow5\":\"10.1\",\"channel11CORRECTIONrow5\":\"-0.11\",\"channel11UNCERTAINTYrow5\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"19.990\",\"channel11UUCrow6\":\"20.1\",\"channel11CORRECTIONrow6\":\"-0.11\",\"channel11UNCERTAINTYrow6\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"36.9\",\"channel11CORRECTIONrow7\":\"0.10\",\"channel11UNCERTAINTYrow7\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"50\",\"channel11CORRECTIONrow8\":\"0.00\",\"channel11UNCERTAINTYrow8\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"75\",\"channel11CORRECTIONrow9\":\"0.00\",\"channel11UNCERTAINTYrow9\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.010\",\"channel11UUCrow10\":\"100.1\",\"channel11CORRECTIONrow10\":\"-0.09\",\"channel11UNCERTAINTYrow10\":\"0.47\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"149.9\",\"channel11CORRECTIONrow11\":\"0.10\",\"channel11UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.020\",\"channel11UUCrow12\":\"199.2\",\"channel11CORRECTIONrow12\":\"0.82\",\"channel11UNCERTAINTYrow12\":\"0.74\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.010\",\"channel12UUCrow1\":\"-39.4\",\"channel12CORRECTIONrow1\":\"-0.61\",\"channel12UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.010\",\"channel12UUCrow2\":\"-19.0\",\"channel12CORRECTIONrow2\":\"-1.01\",\"channel12UNCERTAINTYrow2\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.010\",\"channel12UUCrow3\":\"-9.9\",\"channel12CORRECTIONrow3\":\"-0.11\",\"channel12UNCERTAINTYrow3\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"-0.010\",\"channel12UUCrow4\":\"0.00\",\"channel12CORRECTIONrow4\":\"-0.01\",\"channel12UNCERTAINTYrow4\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"9.990\",\"channel12UUCrow5\":\"10.1\",\"channel12CORRECTIONrow5\":\"-0.11\",\"channel12UNCERTAINTYrow5\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"19.990\",\"channel12UUCrow6\":\"20.0\",\"channel12CORRECTIONrow6\":\"-0.01\",\"channel12UNCERTAINTYrow6\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"36.9\",\"channel12CORRECTIONrow7\":\"0.10\",\"channel12UNCERTAINTYrow7\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"50.0\",\"channel12CORRECTIONrow8\":\"0.00\",\"channel12UNCERTAINTYrow8\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.9\",\"channel12CORRECTIONrow9\":\"0.10\",\"channel12UNCERTAINTYrow9\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.010\",\"channel12UUCrow10\":\"100.1\",\"channel12CORRECTIONrow10\":\"-0.09\",\"channel12UNCERTAINTYrow10\":\"0.48\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.000\",\"channel12UUCrow11\":\"150.0\",\"channel12CORRECTIONrow11\":\"0.00\",\"channel12UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.020\",\"channel12UUCrow12\":\"199.3\",\"channel12CORRECTIONrow12\":\"0.72\",\"channel12UNCERTAINTYrow12\":\"0.75\"}]]');
INSERT INTO `temperaturerecorder` (`id`, `serialNumber`, `certificateNumber`, `description`, `provider`, `brand`, `model`, `dateOfCalibration`, `channelNumber`, `testPoint`, `stdReading`, `uucReading`, `correction`, `uncertainty`, `measurements`) VALUES
(15, 'H31173261', '2023-215-TMP-07-001', 'Temperature Recorder with Type \"K\" Thermocouple probes', 'NML (Philippines)  through DOST-CALABARZON RML', 'Graptec', 'GL820', '2023-07-28', NULL, NULL, NULL, NULL, NULL, '1.4', '[[{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow1\":\"-40\",\"channel1STANDARDrow1\":\"-40.000\",\"channel1UUCrow1\":\"-39.6\",\"channel1CORRECTIONrow1\":\"-0.40\",\"channel1UNCERTAINTYrow1\":\"1.2\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow2\":\"-20\",\"channel1STANDARDrow2\":\"-20.000\",\"channel1UUCrow2\":\"-21.4\",\"channel1CORRECTIONrow2\":\"1.40\",\"channel1UNCERTAINTYrow2\":\"1.2\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow3\":\"-10\",\"channel1STANDARDrow3\":\"-10.000\",\"channel1UUCrow3\":\"-11.7\",\"channel1CORRECTIONrow3\":\"1.70\",\"channel1UNCERTAINTYrow3\":\"1.2\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow4\":\"0\",\"channel1STANDARDrow4\":\"0.000\",\"channel1UUCrow4\":\"-0.9\",\"channel1CORRECTIONrow4\":\"0.90\",\"channel1UNCERTAINTYrow4\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow5\":\"10\",\"channel1STANDARDrow5\":\"10.000\",\"channel1UUCrow5\":\"9.7\",\"channel1CORRECTIONrow5\":\"0.30\",\"channel1UNCERTAINTYrow5\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow6\":\"20\",\"channel1STANDARDrow6\":\"20.000\",\"channel1UUCrow6\":\"19.9\",\"channel1CORRECTIONrow6\":\"0.10\",\"channel1UNCERTAINTYrow6\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow7\":\"37\",\"channel1STANDARDrow7\":\"37.000\",\"channel1UUCrow7\":\"37.1\",\"channel1CORRECTIONrow7\":\"-0.10\",\"channel1UNCERTAINTYrow7\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow8\":\"50\",\"channel1STANDARDrow8\":\"50.000\",\"channel1UUCrow8\":\"50\",\"channel1CORRECTIONrow8\":\"0.00\",\"channel1UNCERTAINTYrow8\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow9\":\"75\",\"channel1STANDARDrow9\":\"75.000\",\"channel1UUCrow9\":\"74.9\",\"channel1CORRECTIONrow9\":\"0.10\",\"channel1UNCERTAINTYrow9\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow10\":\"100\",\"channel1STANDARDrow10\":\"100.000\",\"channel1UUCrow10\":\"100.3\",\"channel1CORRECTIONrow10\":\"-0.30\",\"channel1UNCERTAINTYrow10\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow11\":\"150\",\"channel1STANDARDrow11\":\"150.000\",\"channel1UUCrow11\":\"150.3\",\"channel1CORRECTIONrow11\":\"-0.30\",\"channel1UNCERTAINTYrow11\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow12\":\"200\",\"channel1STANDARDrow12\":\"200.000\",\"channel1UUCrow12\":\"198.9\",\"channel1CORRECTIONrow12\":\"1.10\",\"channel1UNCERTAINTYrow12\":\"1.4\"},{\"channelName\":\"channel1\",\"channelKey1\":\"1\",\"channel1TESTPOINTrow13\":\"230\",\"channel1STANDARDrow13\":\"230.000\",\"channel1UUCrow13\":\"229.9\",\"channel1CORRECTIONrow13\":\"0.10\",\"channel1UNCERTAINTYrow13\":\"1.4\"}],[{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow1\":\"-40\",\"channel2STANDARDrow1\":\"-40.000\",\"channel2UUCrow1\":\"-39.6\",\"channel2CORRECTIONrow1\":\"-0.40\",\"channel2UNCERTAINTYrow1\":\"1.2\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow2\":\"-20\",\"channel2STANDARDrow2\":\"-20.000\",\"channel2UUCrow2\":\"-21.1\",\"channel2CORRECTIONrow2\":\"1.10\",\"channel2UNCERTAINTYrow2\":\"1.2\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow3\":\"-10\",\"channel2STANDARDrow3\":\"-10.000\",\"channel2UUCrow3\":\"-11.3\",\"channel2CORRECTIONrow3\":\"1.30\",\"channel2UNCERTAINTYrow3\":\"1.2\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow4\":\"0\",\"channel2STANDARDrow4\":\"0.000\",\"channel2UUCrow4\":\"-0.9\",\"channel2CORRECTIONrow4\":\"0.90\",\"channel2UNCERTAINTYrow4\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow5\":\"10\",\"channel2STANDARDrow5\":\"10.000\",\"channel2UUCrow5\":\"9.8\",\"channel2CORRECTIONrow5\":\"0.20\",\"channel2UNCERTAINTYrow5\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow6\":\"20\",\"channel2STANDARDrow6\":\"20.000\",\"channel2UUCrow6\":\"20\",\"channel2CORRECTIONrow6\":\"0.00\",\"channel2UNCERTAINTYrow6\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow7\":\"37\",\"channel2STANDARDrow7\":\"37.000\",\"channel2UUCrow7\":\"37.2\",\"channel2CORRECTIONrow7\":\"-0.20\",\"channel2UNCERTAINTYrow7\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow8\":\"50\",\"channel2STANDARDrow8\":\"50.000\",\"channel2UUCrow8\":\"50.1\",\"channel2CORRECTIONrow8\":\"-0.10\",\"channel2UNCERTAINTYrow8\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow9\":\"75\",\"channel2STANDARDrow9\":\"75.000\",\"channel2UUCrow9\":\"75\",\"channel2CORRECTIONrow9\":\"0.00\",\"channel2UNCERTAINTYrow9\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow10\":\"100\",\"channel2STANDARDrow10\":\"100.000\",\"channel2UUCrow10\":\"100.4\",\"channel2CORRECTIONrow10\":\"-0.40\",\"channel2UNCERTAINTYrow10\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow11\":\"150\",\"channel2STANDARDrow11\":\"150.000\",\"channel2UUCrow11\":\"150.4\",\"channel2CORRECTIONrow11\":\"-0.40\",\"channel2UNCERTAINTYrow11\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow12\":\"200\",\"channel2STANDARDrow12\":\"200.000\",\"channel2UUCrow12\":\"199.2\",\"channel2CORRECTIONrow12\":\"0.80\",\"channel2UNCERTAINTYrow12\":\"1.4\"},{\"channelName\":\"channel2\",\"channelKey2\":\"2\",\"channel2TESTPOINTrow13\":\"230\",\"channel2STANDARDrow13\":\"230.000\",\"channel2UUCrow13\":\"230.8\",\"channel2CORRECTIONrow13\":\"-0.80\",\"channel2UNCERTAINTYrow13\":\"1.4\"}],[{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow1\":\"-40\",\"channel3STANDARDrow1\":\"-40.000\",\"channel3UUCrow1\":\"-39.6\",\"channel3CORRECTIONrow1\":\"-0.40\",\"channel3UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow2\":\"-20\",\"channel3STANDARDrow2\":\"-20.00\",\"channel3UUCrow2\":\"-19.8\",\"channel3CORRECTIONrow2\":\"-0.20\",\"channel3UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow3\":\"-10\",\"channel3STANDARDrow3\":\"-10.000\",\"channel3UUCrow3\":\"-9.9\",\"channel3CORRECTIONrow3\":\"-0.10\",\"channel3UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow4\":\"0\",\"channel3STANDARDrow4\":\"0.000\",\"channel3UUCrow4\":\"0.1\",\"channel3CORRECTIONrow4\":\"-0.10\",\"channel3UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow5\":\"10\",\"channel3STANDARDrow5\":\"10.000\",\"channel3UUCrow5\":\"10.0\",\"channel3CORRECTIONrow5\":\"0.00\",\"channel3UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow6\":\"20\",\"channel3STANDARDrow6\":\"20.000\",\"channel3UUCrow6\":\"20.0\",\"channel3CORRECTIONrow6\":\"0.00\",\"channel3UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow7\":\"37\",\"channel3STANDARDrow7\":\"37.000\",\"channel3UUCrow7\":\"37.0\",\"channel3CORRECTIONrow7\":\"0.00\",\"channel3UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow8\":\"50\",\"channel3STANDARDrow8\":\"50.000\",\"channel3UUCrow8\":\"49.8\",\"channel3CORRECTIONrow8\":\"0.20\",\"channel3UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow9\":\"75\",\"channel3STANDARDrow9\":\"75.000\",\"channel3UUCrow9\":\"74.7\",\"channel3CORRECTIONrow9\":\"0.30\",\"channel3UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow10\":\"100\",\"channel3STANDARDrow10\":\"100.000\",\"channel3UUCrow10\":\"100.0\",\"channel3CORRECTIONrow10\":\"0.00\",\"channel3UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow11\":\"150\",\"channel3STANDARDrow11\":\"150.040\",\"channel3UUCrow11\":\"150.2\",\"channel3CORRECTIONrow11\":\"-0.16\",\"channel3UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow12\":\"200\",\"channel3STANDARDrow12\":\"200.000\",\"channel3UUCrow12\":\"199.2\",\"channel3CORRECTIONrow12\":\"0.80\",\"channel3UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel3\",\"channelKey3\":\"3\",\"channel3TESTPOINTrow13\":\"230\",\"channel3STANDARDrow13\":\"229.980\",\"channel3UUCrow13\":\"229.4\",\"channel3CORRECTIONrow13\":\"0.58\",\"channel3UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow1\":\"-40\",\"channel4STANDARDrow1\":\"-40.000\",\"channel4UUCrow1\":\"-39.7\",\"channel4CORRECTIONrow1\":\"-0.30\",\"channel4UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow2\":\"-20\",\"channel4STANDARDrow2\":\"-20.000\",\"channel4UUCrow2\":\"-20.0\",\"channel4CORRECTIONrow2\":\"0.00\",\"channel4UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow3\":\"-10\",\"channel4STANDARDrow3\":\"-10.000\",\"channel4UUCrow3\":\"-10.1\",\"channel4CORRECTIONrow3\":\"0.10\",\"channel4UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow4\":\"0\",\"channel4STANDARDrow4\":\"0.000\",\"channel4UUCrow4\":\"0.0\",\"channel4CORRECTIONrow4\":\"0.00\",\"channel4UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow5\":\"10\",\"channel4STANDARDrow5\":\"10.000\",\"channel4UUCrow5\":\"9.9\",\"channel4CORRECTIONrow5\":\"0.10\",\"channel4UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow6\":\"20\",\"channel4STANDARDrow6\":\"20.000\",\"channel4UUCrow6\":\"19.9\",\"channel4CORRECTIONrow6\":\"0.10\",\"channel4UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow7\":\"37\",\"channel4STANDARDrow7\":\"37.000\",\"channel4UUCrow7\":\"36.9\",\"channel4CORRECTIONrow7\":\"0.10\",\"channel4UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow8\":\"50\",\"channel4STANDARDrow8\":\"50.000\",\"channel4UUCrow8\":\"49.7\",\"channel4CORRECTIONrow8\":\"0.30\",\"channel4UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow9\":\"75\",\"channel4STANDARDrow9\":\"75.000\",\"channel4UUCrow9\":\"74.6\",\"channel4CORRECTIONrow9\":\"0.40\",\"channel4UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow10\":\"100\",\"channel4STANDARDrow10\":\"100.000\",\"channel4UUCrow10\":\"100.0\",\"channel4CORRECTIONrow10\":\"0.00\",\"channel4UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow11\":\"150\",\"channel4STANDARDrow11\":\"150.040\",\"channel4UUCrow11\":\"150.2\",\"channel4CORRECTIONrow11\":\"-0.16\",\"channel4UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow12\":\"200\",\"channel4STANDARDrow12\":\"200.000\",\"channel4UUCrow12\":\"200.9\",\"channel4CORRECTIONrow12\":\"-0.90\",\"channel4UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel4\",\"channelKey4\":\"4\",\"channel4TESTPOINTrow13\":\"230\",\"channel4STANDARDrow13\":\"229.980\",\"channel4UUCrow13\":\"231.9\",\"channel4CORRECTIONrow13\":\"-1.92\",\"channel4UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow1\":\"-40\",\"channel5STANDARDrow1\":\"-40.000\",\"channel5UUCrow1\":\"-39.7\",\"channel5CORRECTIONrow1\":\"-0.30\",\"channel5UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow2\":\"-20\",\"channel5STANDARDrow2\":\"-20.000\",\"channel5UUCrow2\":\"-19.9\",\"channel5CORRECTIONrow2\":\"-0.10\",\"channel5UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow3\":\"-10\",\"channel5STANDARDrow3\":\"-10.000\",\"channel5UUCrow3\":\"-10\",\"channel5CORRECTIONrow3\":\"0.00\",\"channel5UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow4\":\"0\",\"channel5STANDARDrow4\":\"0.000\",\"channel5UUCrow4\":\"0\",\"channel5CORRECTIONrow4\":\"0.00\",\"channel5UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow5\":\"10\",\"channel5STANDARDrow5\":\"10.000\",\"channel5UUCrow5\":\"9.9\",\"channel5CORRECTIONrow5\":\"0.10\",\"channel5UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow6\":\"20\",\"channel5STANDARDrow6\":\"20.000\",\"channel5UUCrow6\":\"20\",\"channel5CORRECTIONrow6\":\"0.00\",\"channel5UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow7\":\"37\",\"channel5STANDARDrow7\":\"37.000\",\"channel5UUCrow7\":\"36.9\",\"channel5CORRECTIONrow7\":\"0.10\",\"channel5UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow8\":\"50\",\"channel5STANDARDrow8\":\"50.000\",\"channel5UUCrow8\":\"49.7\",\"channel5CORRECTIONrow8\":\"0.30\",\"channel5UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow9\":\"75\",\"channel5STANDARDrow9\":\"75.000\",\"channel5UUCrow9\":\"74.6\",\"channel5CORRECTIONrow9\":\"0.40\",\"channel5UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow10\":\"100\",\"channel5STANDARDrow10\":\"100.000\",\"channel5UUCrow10\":\"100.1\",\"channel5CORRECTIONrow10\":\"-0.10\",\"channel5UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow11\":\"150\",\"channel5STANDARDrow11\":\"150.040\",\"channel5UUCrow11\":\"150.2\",\"channel5CORRECTIONrow11\":\"-0.16\",\"channel5UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow12\":\"200\",\"channel5STANDARDrow12\":\"200.000\",\"channel5UUCrow12\":\"199.1\",\"channel5CORRECTIONrow12\":\"0.90\",\"channel5UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel5\",\"channelKey5\":\"5\",\"channel5TESTPOINTrow13\":\"230\",\"channel5STANDARDrow13\":\"229.980\",\"channel5UUCrow13\":\"229.2\",\"channel5CORRECTIONrow13\":\"0.78\",\"channel5UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow1\":\"-40\",\"channel6STANDARDrow1\":\"-40.000\",\"channel6UUCrow1\":\"-39.6\",\"channel6CORRECTIONrow1\":\"-0.40\",\"channel6UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow2\":\"-20\",\"channel6STANDARDrow2\":\"-20.000\",\"channel6UUCrow2\":\"-20.4\",\"channel6CORRECTIONrow2\":\"0.40\",\"channel6UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow3\":\"-10\",\"channel6STANDARDrow3\":\"-10.000\",\"channel6UUCrow3\":\"-10.6\",\"channel6CORRECTIONrow3\":\"0.60\",\"channel6UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow4\":\"0\",\"channel6STANDARDrow4\":\"0.000\",\"channel6UUCrow4\":\"0\",\"channel6CORRECTIONrow4\":\"0.00\",\"channel6UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow5\":\"10\",\"channel6STANDARDrow5\":\"10.000\",\"channel6UUCrow5\":\"10\",\"channel6CORRECTIONrow5\":\"0.00\",\"channel6UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow6\":\"20\",\"channel6STANDARDrow6\":\"20.000\",\"channel6UUCrow6\":\"20.1\",\"channel6CORRECTIONrow6\":\"-0.10\",\"channel6UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow7\":\"37\",\"channel6STANDARDrow7\":\"37.000\",\"channel6UUCrow7\":\"37\",\"channel6CORRECTIONrow7\":\"0.00\",\"channel6UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow8\":\"50\",\"channel6STANDARDrow8\":\"50.000\",\"channel6UUCrow8\":\"49.9\",\"channel6CORRECTIONrow8\":\"0.10\",\"channel6UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow9\":\"75\",\"channel6STANDARDrow9\":\"75.000\",\"channel6UUCrow9\":\"74.8\",\"channel6CORRECTIONrow9\":\"0.20\",\"channel6UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow10\":\"100\",\"channel6STANDARDrow10\":\"100.000\",\"channel6UUCrow10\":\"100.3\",\"channel6CORRECTIONrow10\":\"-0.30\",\"channel6UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow11\":\"150\",\"channel6STANDARDrow11\":\"150.040\",\"channel6UUCrow11\":\"150.4\",\"channel6CORRECTIONrow11\":\"-0.36\",\"channel6UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow12\":\"200\",\"channel6STANDARDrow12\":\"200.000\",\"channel6UUCrow12\":\"199.2\",\"channel6CORRECTIONrow12\":\"0.80\",\"channel6UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel6\",\"channelKey6\":\"6\",\"channel6TESTPOINTrow13\":\"230\",\"channel6STANDARDrow13\":\"229.980\",\"channel6UUCrow13\":\"229.8\",\"channel6CORRECTIONrow13\":\"0.18\",\"channel6UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow1\":\"-40\",\"channel7STANDARDrow1\":\"-40.000\",\"channel7UUCrow1\":\"-39.6\",\"channel7CORRECTIONrow1\":\"-0.40\",\"channel7UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow2\":\"-20\",\"channel7STANDARDrow2\":\"-20.000\",\"channel7UUCrow2\":\"-19.8\",\"channel7CORRECTIONrow2\":\"-0.20\",\"channel7UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow3\":\"-10\",\"channel7STANDARDrow3\":\"-10.000\",\"channel7UUCrow3\":\"-9.9\",\"channel7CORRECTIONrow3\":\"-0.10\",\"channel7UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow4\":\"0\",\"channel7STANDARDrow4\":\"0.000\",\"channel7UUCrow4\":\"0.1\",\"channel7CORRECTIONrow4\":\"-0.10\",\"channel7UNCERTAINTYrow4\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow5\":\"10\",\"channel7STANDARDrow5\":\"10.000\",\"channel7UUCrow5\":\"10.0\",\"channel7CORRECTIONrow5\":\"0.00\",\"channel7UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow6\":\"20\",\"channel7STANDARDrow6\":\"20.000\",\"channel7UUCrow6\":\"20.0\",\"channel7CORRECTIONrow6\":\"0.00\",\"channel7UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow7\":\"37\",\"channel7STANDARDrow7\":\"37.000\",\"channel7UUCrow7\":\"37.0\",\"channel7CORRECTIONrow7\":\"0.00\",\"channel7UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow8\":\"50\",\"channel7STANDARDrow8\":\"50.000\",\"channel7UUCrow8\":\"49.8\",\"channel7CORRECTIONrow8\":\"0.20\",\"channel7UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow9\":\"75\",\"channel7STANDARDrow9\":\"75.000\",\"channel7UUCrow9\":\"74.8\",\"channel7CORRECTIONrow9\":\"0.20\",\"channel7UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow10\":\"100\",\"channel7STANDARDrow10\":\"100.000\",\"channel7UUCrow10\":\"100.3\",\"channel7CORRECTIONrow10\":\"-0.30\",\"channel7UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow11\":\"150\",\"channel7STANDARDrow11\":\"150.040\",\"channel7UUCrow11\":\"150.4\",\"channel7CORRECTIONrow11\":\"-0.36\",\"channel7UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow12\":\"200\",\"channel7STANDARDrow12\":\"200.000\",\"channel7UUCrow12\":\"199.0\",\"channel7CORRECTIONrow12\":\"1.00\",\"channel7UNCERTAINTYrow12\":\"0.74\"},{\"channelName\":\"channel7\",\"channelKey7\":\"7\",\"channel7TESTPOINTrow13\":\"230\",\"channel7STANDARDrow13\":\"229.980\",\"channel7UUCrow13\":\"229.1\",\"channel7CORRECTIONrow13\":\"0.88\",\"channel7UNCERTAINTYrow13\":\"0.74\"}],[{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow1\":\"-40\",\"channel8STANDARDrow1\":\"-40.000\",\"channel8UUCrow1\":\"-39.6\",\"channel8CORRECTIONrow1\":\"-0.40\",\"channel8UNCERTAINTYrow1\":\"0.29\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow2\":\"-20\",\"channel8STANDARDrow2\":\"-20.000\",\"channel8UUCrow2\":\"-19.7\",\"channel8CORRECTIONrow2\":\"-0.30\",\"channel8UNCERTAINTYrow2\":\"0.29\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow3\":\"-10\",\"channel8STANDARDrow3\":\"-10.000\",\"channel8UUCrow3\":\"-9.9\",\"channel8CORRECTIONrow3\":\"-0.10\",\"channel8UNCERTAINTYrow3\":\"0.29\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow4\":\"0\",\"channel8STANDARDrow4\":\"0.000\",\"channel8UUCrow4\":\"0.1\",\"channel8CORRECTIONrow4\":\"-0.10\",\"channel8UNCERTAINTYrow4\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow5\":\"10\",\"channel8STANDARDrow5\":\"10.000\",\"channel8UUCrow5\":\"9.9\",\"channel8CORRECTIONrow5\":\"0.10\",\"channel8UNCERTAINTYrow5\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow6\":\"20\",\"channel8STANDARDrow6\":\"20.000\",\"channel8UUCrow6\":\"20\",\"channel8CORRECTIONrow6\":\"0.00\",\"channel8UNCERTAINTYrow6\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow7\":\"37\",\"channel8STANDARDrow7\":\"37.000\",\"channel8UUCrow7\":\"37\",\"channel8CORRECTIONrow7\":\"0.00\",\"channel8UNCERTAINTYrow7\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow8\":\"50\",\"channel8STANDARDrow8\":\"50.000\",\"channel8UUCrow8\":\"49.8\",\"channel8CORRECTIONrow8\":\"0.20\",\"channel8UNCERTAINTYrow8\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow9\":\"75\",\"channel8STANDARDrow9\":\"75.000\",\"channel8UUCrow9\":\"74.7\",\"channel8CORRECTIONrow9\":\"0.30\",\"channel8UNCERTAINTYrow9\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow10\":\"100\",\"channel8STANDARDrow10\":\"100.000\",\"channel8UUCrow10\":\"100.2\",\"channel8CORRECTIONrow10\":\"-0.20\",\"channel8UNCERTAINTYrow10\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow11\":\"150\",\"channel8STANDARDrow11\":\"150.040\",\"channel8UUCrow11\":\"150.3\",\"channel8CORRECTIONrow11\":\"-0.26\",\"channel8UNCERTAINTYrow11\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow12\":\"200\",\"channel8STANDARDrow12\":\"200.000\",\"channel8UUCrow12\":\"199.2\",\"channel8CORRECTIONrow12\":\"0.80\",\"channel8UNCERTAINTYrow12\":\"0.74\"},{\"channelName\":\"channel8\",\"channelKey8\":\"8\",\"channel8TESTPOINTrow13\":\"230\",\"channel8STANDARDrow13\":\"229.980\",\"channel8UUCrow13\":\"229.1\",\"channel8CORRECTIONrow13\":\"0.88\",\"channel8UNCERTAINTYrow13\":\"0.74\"}],[{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow1\":\"-40\",\"channel9STANDARDrow1\":\"-40.000\",\"channel9UUCrow1\":\"-39.6\",\"channel9CORRECTIONrow1\":\"-0.40\",\"channel9UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow2\":\"-20\",\"channel9STANDARDrow2\":\"-20.000\",\"channel9UUCrow2\":\"-19.1\",\"channel9CORRECTIONrow2\":\"-0.90\",\"channel9UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow3\":\"-10\",\"channel9STANDARDrow3\":\"-10.000\",\"channel9UUCrow3\":\"-9.5\",\"channel9CORRECTIONrow3\":\"-0.50\",\"channel9UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow4\":\"0\",\"channel9STANDARDrow4\":\"0.000\",\"channel9UUCrow4\":\"0.1\",\"channel9CORRECTIONrow4\":\"-0.10\",\"channel9UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow5\":\"10\",\"channel9STANDARDrow5\":\"10.000\",\"channel9UUCrow5\":\"9.9\",\"channel9CORRECTIONrow5\":\"0.10\",\"channel9UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow6\":\"20\",\"channel9STANDARDrow6\":\"20.000\",\"channel9UUCrow6\":\"20\",\"channel9CORRECTIONrow6\":\"0.00\",\"channel9UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow7\":\"37\",\"channel9STANDARDrow7\":\"37.000\",\"channel9UUCrow7\":\"37\",\"channel9CORRECTIONrow7\":\"0.00\",\"channel9UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow8\":\"50\",\"channel9STANDARDrow8\":\"50.000\",\"channel9UUCrow8\":\"49.8\",\"channel9CORRECTIONrow8\":\"0.20\",\"channel9UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow9\":\"75\",\"channel9STANDARDrow9\":\"75.000\",\"channel9UUCrow9\":\"74.7\",\"channel9CORRECTIONrow9\":\"0.30\",\"channel9UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow10\":\"100\",\"channel9STANDARDrow10\":\"100.000\",\"channel9UUCrow10\":\"100.1\",\"channel9CORRECTIONrow10\":\"-0.10\",\"channel9UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow11\":\"150\",\"channel9STANDARDrow11\":\"150.040\",\"channel9UUCrow11\":\"150.2\",\"channel9CORRECTIONrow11\":\"-0.16\",\"channel9UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow12\":\"200\",\"channel9STANDARDrow12\":\"200.000\",\"channel9UUCrow12\":\"199\",\"channel9CORRECTIONrow12\":\"1.00\",\"channel9UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel9\",\"channelKey9\":\"9\",\"channel9TESTPOINTrow13\":\"230\",\"channel9STANDARDrow13\":\"229.980\",\"channel9UUCrow13\":\"229.0\",\"channel9CORRECTIONrow13\":\"0.98\",\"channel9UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow1\":\"-40\",\"channel10STANDARDrow1\":\"-40.000\",\"channel10UUCrow1\":\"-39.6\",\"channel10CORRECTIONrow1\":\"-0.40\",\"channel10UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow2\":\"-20\",\"channel10STANDARDrow2\":\"-20.000\",\"channel10UUCrow2\":\"-19.6\",\"channel10CORRECTIONrow2\":\"-0.40\",\"channel10UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow3\":\"-10\",\"channel10STANDARDrow3\":\"-10.000\",\"channel10UUCrow3\":\"-9.7\",\"channel10CORRECTIONrow3\":\"-0.30\",\"channel10UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow4\":\"0\",\"channel10STANDARDrow4\":\"0.000\",\"channel10UUCrow4\":\"0.1\",\"channel10CORRECTIONrow4\":\"-0.10\",\"channel10UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow5\":\"10\",\"channel10STANDARDrow5\":\"10.000\",\"channel10UUCrow5\":\"10\",\"channel10CORRECTIONrow5\":\"0.00\",\"channel10UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow6\":\"20\",\"channel10STANDARDrow6\":\"20.000\",\"channel10UUCrow6\":\"20.1\",\"channel10CORRECTIONrow6\":\"-0.10\",\"channel10UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow7\":\"37\",\"channel10STANDARDrow7\":\"37.000\",\"channel10UUCrow7\":\"37\",\"channel10CORRECTIONrow7\":\"0.00\",\"channel10UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow8\":\"50\",\"channel10STANDARDrow8\":\"50.000\",\"channel10UUCrow8\":\"49.8\",\"channel10CORRECTIONrow8\":\"0.20\",\"channel10UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow9\":\"75\",\"channel10STANDARDrow9\":\"75.000\",\"channel10UUCrow9\":\"74.7\",\"channel10CORRECTIONrow9\":\"0.30\",\"channel10UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow10\":\"100\",\"channel10STANDARDrow10\":\"100.000\",\"channel10UUCrow10\":\"100.3\",\"channel10CORRECTIONrow10\":\"-0.30\",\"channel10UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow11\":\"150\",\"channel10STANDARDrow11\":\"150.040\",\"channel10UUCrow11\":\"150.4\",\"channel10CORRECTIONrow11\":\"-0.36\",\"channel10UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow12\":\"200\",\"channel10STANDARDrow12\":\"200.000\",\"channel10UUCrow12\":\"199.1\",\"channel10CORRECTIONrow12\":\"0.90\",\"channel10UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel10\",\"channelKey10\":\"10\",\"channel10TESTPOINTrow13\":\"230\",\"channel10STANDARDrow13\":\"229.980\",\"channel10UUCrow13\":\"229.0\",\"channel10CORRECTIONrow13\":\"0.98\",\"channel10UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow1\":\"-40\",\"channel11STANDARDrow1\":\"-40.000\",\"channel11UUCrow1\":\"-39.6\",\"channel11CORRECTIONrow1\":\"-0.40\",\"channel11UNCERTAINTYrow1\":\"1.1\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow2\":\"-20\",\"channel11STANDARDrow2\":\"-20.000\",\"channel11UUCrow2\":\"-19.8\",\"channel11CORRECTIONrow2\":\"-0.20\",\"channel11UNCERTAINTYrow2\":\"1.1\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow3\":\"-10\",\"channel11STANDARDrow3\":\"-10.000\",\"channel11UUCrow3\":\"-10\",\"channel11CORRECTIONrow3\":\"0.00\",\"channel11UNCERTAINTYrow3\":\"1.1\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow4\":\"0\",\"channel11STANDARDrow4\":\"0.000\",\"channel11UUCrow4\":\"0\",\"channel11CORRECTIONrow4\":\"0.00\",\"channel11UNCERTAINTYrow4\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow5\":\"10\",\"channel11STANDARDrow5\":\"10.000\",\"channel11UUCrow5\":\"9.9\",\"channel11CORRECTIONrow5\":\"0.10\",\"channel11UNCERTAINTYrow5\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow6\":\"20\",\"channel11STANDARDrow6\":\"20.000\",\"channel11UUCrow6\":\"20\",\"channel11CORRECTIONrow6\":\"0.00\",\"channel11UNCERTAINTYrow6\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow7\":\"37\",\"channel11STANDARDrow7\":\"37.000\",\"channel11UUCrow7\":\"37.1\",\"channel11CORRECTIONrow7\":\"-0.10\",\"channel11UNCERTAINTYrow7\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow8\":\"50\",\"channel11STANDARDrow8\":\"50.000\",\"channel11UUCrow8\":\"49.8\",\"channel11CORRECTIONrow8\":\"0.20\",\"channel11UNCERTAINTYrow8\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow9\":\"75\",\"channel11STANDARDrow9\":\"75.000\",\"channel11UUCrow9\":\"74.9\",\"channel11CORRECTIONrow9\":\"0.10\",\"channel11UNCERTAINTYrow9\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow10\":\"100\",\"channel11STANDARDrow10\":\"100.000\",\"channel11UUCrow10\":\"100.3\",\"channel11CORRECTIONrow10\":\"-0.30\",\"channel11UNCERTAINTYrow10\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow11\":\"150\",\"channel11STANDARDrow11\":\"150.000\",\"channel11UUCrow11\":\"150.4\",\"channel11CORRECTIONrow11\":\"-0.40\",\"channel11UNCERTAINTYrow11\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow12\":\"200\",\"channel11STANDARDrow12\":\"200.000\",\"channel11UUCrow12\":\"199.2\",\"channel11CORRECTIONrow12\":\"0.80\",\"channel11UNCERTAINTYrow12\":\"1.3\"},{\"channelName\":\"channel11\",\"channelKey11\":\"11\",\"channel11TESTPOINTrow13\":\"230\",\"channel11STANDARDrow13\":\"230.000\",\"channel11UUCrow13\":\"228.9\",\"channel11CORRECTIONrow13\":\"1.10\",\"channel11UNCERTAINTYrow13\":\"1.3\"}],[{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow1\":\"-40\",\"channel12STANDARDrow1\":\"-40.000\",\"channel12UUCrow1\":\"-39.6\",\"channel12CORRECTIONrow1\":\"-0.40\",\"channel12UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow2\":\"-20\",\"channel12STANDARDrow2\":\"-20.000\",\"channel12UUCrow2\":\"-19.8\",\"channel12CORRECTIONrow2\":\"-0.20\",\"channel12UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow3\":\"-10\",\"channel12STANDARDrow3\":\"-10.000\",\"channel12UUCrow3\":\"-10.2\",\"channel12CORRECTIONrow3\":\"0.20\",\"channel12UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow4\":\"0\",\"channel12STANDARDrow4\":\"0.000\",\"channel12UUCrow4\":\"-0.1\",\"channel12CORRECTIONrow4\":\"0.10\",\"channel12UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow5\":\"10\",\"channel12STANDARDrow5\":\"10.000\",\"channel12UUCrow5\":\"9.9\",\"channel12CORRECTIONrow5\":\"0.10\",\"channel12UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow6\":\"20\",\"channel12STANDARDrow6\":\"20.000\",\"channel12UUCrow6\":\"19.9\",\"channel12CORRECTIONrow6\":\"0.10\",\"channel12UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow7\":\"37\",\"channel12STANDARDrow7\":\"37.000\",\"channel12UUCrow7\":\"37.1\",\"channel12CORRECTIONrow7\":\"-0.10\",\"channel12UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow8\":\"50\",\"channel12STANDARDrow8\":\"50.000\",\"channel12UUCrow8\":\"49.8\",\"channel12CORRECTIONrow8\":\"0.20\",\"channel12UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow9\":\"75\",\"channel12STANDARDrow9\":\"75.000\",\"channel12UUCrow9\":\"74.8\",\"channel12CORRECTIONrow9\":\"0.20\",\"channel12UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow10\":\"100\",\"channel12STANDARDrow10\":\"100.000\",\"channel12UUCrow10\":\"100.2\",\"channel12CORRECTIONrow10\":\"-0.20\",\"channel12UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow11\":\"150\",\"channel12STANDARDrow11\":\"150.040\",\"channel12UUCrow11\":\"150.4\",\"channel12CORRECTIONrow11\":\"-0.36\",\"channel12UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow12\":\"200\",\"channel12STANDARDrow12\":\"200.000\",\"channel12UUCrow12\":\"199.1\",\"channel12CORRECTIONrow12\":\"0.90\",\"channel12UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel12\",\"channelKey12\":\"12\",\"channel12TESTPOINTrow13\":\"230\",\"channel12STANDARDrow13\":\"229.980\",\"channel12UUCrow13\":\"228.8\",\"channel12CORRECTIONrow13\":\"1.18\",\"channel12UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow1\":\"-40\",\"channel13STANDARDrow1\":\"-40.000\",\"channel13UUCrow1\":\"-39.6\",\"channel13CORRECTIONrow1\":\"-0.40\",\"channel13UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow2\":\"-20\",\"channel13STANDARDrow2\":\"-20.000\",\"channel13UUCrow2\":\"-19.7\",\"channel13CORRECTIONrow2\":\"-0.30\",\"channel13UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow3\":\"-10\",\"channel13STANDARDrow3\":\"-10.000\",\"channel13UUCrow3\":\"-10.2\",\"channel13CORRECTIONrow3\":\"0.20\",\"channel13UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow4\":\"0\",\"channel13STANDARDrow4\":\"0.000\",\"channel13UUCrow4\":\"-0.1\",\"channel13CORRECTIONrow4\":\"0.10\",\"channel13UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow5\":\"10\",\"channel13STANDARDrow5\":\"10.000\",\"channel13UUCrow5\":\"9.9\",\"channel13CORRECTIONrow5\":\"0.10\",\"channel13UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow6\":\"20\",\"channel13STANDARDrow6\":\"20.000\",\"channel13UUCrow6\":\"20\",\"channel13CORRECTIONrow6\":\"0.00\",\"channel13UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow7\":\"37\",\"channel13STANDARDrow7\":\"37.000\",\"channel13UUCrow7\":\"37.1\",\"channel13CORRECTIONrow7\":\"-0.10\",\"channel13UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow8\":\"50\",\"channel13STANDARDrow8\":\"50.000\",\"channel13UUCrow8\":\"49.8\",\"channel13CORRECTIONrow8\":\"0.20\",\"channel13UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow9\":\"75\",\"channel13STANDARDrow9\":\"75.000\",\"channel13UUCrow9\":\"74.9\",\"channel13CORRECTIONrow9\":\"0.10\",\"channel13UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow10\":\"100\",\"channel13STANDARDrow10\":\"100.000\",\"channel13UUCrow10\":\"100.3\",\"channel13CORRECTIONrow10\":\"-0.30\",\"channel13UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow11\":\"150\",\"channel13STANDARDrow11\":\"150.040\",\"channel13UUCrow11\":\"150.4\",\"channel13CORRECTIONrow11\":\"-0.36\",\"channel13UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow12\":\"200\",\"channel13STANDARDrow12\":\"200.000\",\"channel13UUCrow12\":\"199.1\",\"channel13CORRECTIONrow12\":\"0.90\",\"channel13UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel13\",\"channelKey13\":\"13\",\"channel13TESTPOINTrow13\":\"230\",\"channel13STANDARDrow13\":\"229.980\",\"channel13UUCrow13\":\"228.8\",\"channel13CORRECTIONrow13\":\"1.18\",\"channel13UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow1\":\"-40\",\"channel14STANDARDrow1\":\"-40.000\",\"channel14UUCrow1\":\"-39.6\",\"channel14CORRECTIONrow1\":\"-0.40\",\"channel14UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow2\":\"-20\",\"channel14STANDARDrow2\":\"-20.000\",\"channel14UUCrow2\":\"-19.8\",\"channel14CORRECTIONrow2\":\"-0.20\",\"channel14UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow3\":\"-10\",\"channel14STANDARDrow3\":\"-10.000\",\"channel14UUCrow3\":\"-10.1\",\"channel14CORRECTIONrow3\":\"0.10\",\"channel14UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow4\":\"0\",\"channel14STANDARDrow4\":\"0.000\",\"channel14UUCrow4\":\"-0.1\",\"channel14CORRECTIONrow4\":\"0.10\",\"channel14UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow5\":\"10\",\"channel14STANDARDrow5\":\"10.000\",\"channel14UUCrow5\":\"9.8\",\"channel14CORRECTIONrow5\":\"0.20\",\"channel14UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow6\":\"20\",\"channel14STANDARDrow6\":\"20.000\",\"channel14UUCrow6\":\"19.9\",\"channel14CORRECTIONrow6\":\"0.10\",\"channel14UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow7\":\"37\",\"channel14STANDARDrow7\":\"37.000\",\"channel14UUCrow7\":\"37.1\",\"channel14CORRECTIONrow7\":\"-0.10\",\"channel14UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow8\":\"50\",\"channel14STANDARDrow8\":\"50.000\",\"channel14UUCrow8\":\"49.8\",\"channel14CORRECTIONrow8\":\"0.20\",\"channel14UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow9\":\"75\",\"channel14STANDARDrow9\":\"75.000\",\"channel14UUCrow9\":\"74.9\",\"channel14CORRECTIONrow9\":\"0.10\",\"channel14UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow10\":\"100\",\"channel14STANDARDrow10\":\"100.000\",\"channel14UUCrow10\":\"100.3\",\"channel14CORRECTIONrow10\":\"-0.30\",\"channel14UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow11\":\"150\",\"channel14STANDARDrow11\":\"150.040\",\"channel14UUCrow11\":\"150.4\",\"channel14CORRECTIONrow11\":\"-0.36\",\"channel14UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow12\":\"200\",\"channel14STANDARDrow12\":\"200.000\",\"channel14UUCrow12\":\"199\",\"channel14CORRECTIONrow12\":\"1.00\",\"channel14UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel14\",\"channelKey14\":\"14\",\"channel14TESTPOINTrow13\":\"230\",\"channel14STANDARDrow13\":\"229.980\",\"channel14UUCrow13\":\"228.6\",\"channel14CORRECTIONrow13\":\"1.38\",\"channel14UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow1\":\"-40\",\"channel15STANDARDrow1\":\"-40.000\",\"channel15UUCrow1\":\"-39.7\",\"channel15CORRECTIONrow1\":\"-0.30\",\"channel15UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow2\":\"-20\",\"channel15STANDARDrow2\":\"-20.000\",\"channel15UUCrow2\":\"-19.8\",\"channel15CORRECTIONrow2\":\"-0.20\",\"channel15UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow3\":\"-10\",\"channel15STANDARDrow3\":\"-10.000\",\"channel15UUCrow3\":\"-10.1\",\"channel15CORRECTIONrow3\":\"0.10\",\"channel15UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow4\":\"0\",\"channel15STANDARDrow4\":\"0.000\",\"channel15UUCrow4\":\"-0.3\",\"channel15CORRECTIONrow4\":\"0.30\",\"channel15UNCERTAINTYrow4\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow5\":\"10\",\"channel15STANDARDrow5\":\"10.000\",\"channel15UUCrow5\":\"9.7\",\"channel15CORRECTIONrow5\":\"0.30\",\"channel15UNCERTAINTYrow5\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow6\":\"20\",\"channel15STANDARDrow6\":\"20.000\",\"channel15UUCrow6\":\"19.8\",\"channel15CORRECTIONrow6\":\"0.20\",\"channel15UNCERTAINTYrow6\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow7\":\"37\",\"channel15STANDARDrow7\":\"37.000\",\"channel15UUCrow7\":\"37\",\"channel15CORRECTIONrow7\":\"0.00\",\"channel15UNCERTAINTYrow7\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow8\":\"50\",\"channel15STANDARDrow8\":\"50.000\",\"channel15UUCrow8\":\"49.7\",\"channel15CORRECTIONrow8\":\"0.30\",\"channel15UNCERTAINTYrow8\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow9\":\"75\",\"channel15STANDARDrow9\":\"75.000\",\"channel15UUCrow9\":\"74.9\",\"channel15CORRECTIONrow9\":\"0.10\",\"channel15UNCERTAINTYrow9\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow10\":\"100\",\"channel15STANDARDrow10\":\"100.000\",\"channel15UUCrow10\":\"100.3\",\"channel15CORRECTIONrow10\":\"-0.30\",\"channel15UNCERTAINTYrow10\":\"0.78\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow11\":\"150\",\"channel15STANDARDrow11\":\"150.040\",\"channel15UUCrow11\":\"150.4\",\"channel15CORRECTIONrow11\":\"-0.36\",\"channel15UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow12\":\"200\",\"channel15STANDARDrow12\":\"200.000\",\"channel15UUCrow12\":\"199\",\"channel15CORRECTIONrow12\":\"1.00\",\"channel15UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel15\",\"channelKey15\":\"15\",\"channel15TESTPOINTrow13\":\"230\",\"channel15STANDARDrow13\":\"229.980\",\"channel15UUCrow13\":\"228.7\",\"channel15CORRECTIONrow13\":\"1.28\",\"channel15UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow1\":\"-40\",\"channel16STANDARDrow1\":\"-40.000\",\"channel16UUCrow1\":\"-39.7\",\"channel16CORRECTIONrow1\":\"-0.30\",\"channel16UNCERTAINTYrow1\":\"0.31\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow2\":\"-20\",\"channel16STANDARDrow2\":\"-20.000\",\"channel16UUCrow2\":\"-19.8\",\"channel16CORRECTIONrow2\":\"-0.20\",\"channel16UNCERTAINTYrow2\":\"0.31\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow3\":\"-10\",\"channel16STANDARDrow3\":\"-10.000\",\"channel16UUCrow3\":\"-10.1\",\"channel16CORRECTIONrow3\":\"0.10\",\"channel16UNCERTAINTYrow3\":\"0.31\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow4\":\"0\",\"channel16STANDARDrow4\":\"0.000\",\"channel16UUCrow4\":\"0.000\",\"channel16CORRECTIONrow4\":\"0.00\",\"channel16UNCERTAINTYrow4\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow5\":\"10\",\"channel16STANDARDrow5\":\"10.000\",\"channel16UUCrow5\":\"9.7\",\"channel16CORRECTIONrow5\":\"0.30\",\"channel16UNCERTAINTYrow5\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow6\":\"20\",\"channel16STANDARDrow6\":\"20.000\",\"channel16UUCrow6\":\"19.8\",\"channel16CORRECTIONrow6\":\"0.20\",\"channel16UNCERTAINTYrow6\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow7\":\"37\",\"channel16STANDARDrow7\":\"37.000\",\"channel16UUCrow7\":\"37\",\"channel16CORRECTIONrow7\":\"0.00\",\"channel16UNCERTAINTYrow7\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow8\":\"50\",\"channel16STANDARDrow8\":\"50.000\",\"channel16UUCrow8\":\"49.7\",\"channel16CORRECTIONrow8\":\"0.30\",\"channel16UNCERTAINTYrow8\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow9\":\"75\",\"channel16STANDARDrow9\":\"75.000\",\"channel16UUCrow9\":\"74.9\",\"channel16CORRECTIONrow9\":\"0.10\",\"channel16UNCERTAINTYrow9\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow10\":\"100\",\"channel16STANDARDrow10\":\"100.000\",\"channel16UUCrow10\":\"100.2\",\"channel16CORRECTIONrow10\":\"-0.20\",\"channel16UNCERTAINTYrow10\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow11\":\"150\",\"channel16STANDARDrow11\":\"150.040\",\"channel16UUCrow11\":\"150.4\",\"channel16CORRECTIONrow11\":\"-0.36\",\"channel16UNCERTAINTYrow11\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow12\":\"200\",\"channel16STANDARDrow12\":\"200.000\",\"channel16UUCrow12\":\"199\",\"channel16CORRECTIONrow12\":\"1.00\",\"channel16UNCERTAINTYrow12\":\"0.75\"},{\"channelName\":\"channel16\",\"channelKey16\":\"16\",\"channel16TESTPOINTrow13\":\"230\",\"channel16STANDARDrow13\":\"229.980\",\"channel16UUCrow13\":\"228.4\",\"channel16CORRECTIONrow13\":\"1.58\",\"channel16UNCERTAINTYrow13\":\"0.75\"}],[{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow1\":\"-40\",\"channel17STANDARDrow1\":\"-40.000\",\"channel17UUCrow1\":\"-39.8\",\"channel17CORRECTIONrow1\":\"-0.20\",\"channel17UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow2\":\"-20\",\"channel17STANDARDrow2\":\"-20.000\",\"channel17UUCrow2\":\"-19.8\",\"channel17CORRECTIONrow2\":\"-0.20\",\"channel17UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow3\":\"-10\",\"channel17STANDARDrow3\":\"-10.000\",\"channel17UUCrow3\":\"-10.2\",\"channel17CORRECTIONrow3\":\"0.20\",\"channel17UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow4\":\"0\",\"channel17STANDARDrow4\":\"0.000\",\"channel17UUCrow4\":\"-0.3\",\"channel17CORRECTIONrow4\":\"0.30\",\"channel17UNCERTAINTYrow4\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow5\":\"10\",\"channel17STANDARDrow5\":\"10.000\",\"channel17UUCrow5\":\"9.6\",\"channel17CORRECTIONrow5\":\"0.40\",\"channel17UNCERTAINTYrow5\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow6\":\"20\",\"channel17STANDARDrow6\":\"20.000\",\"channel17UUCrow6\":\"19.7\",\"channel17CORRECTIONrow6\":\"0.30\",\"channel17UNCERTAINTYrow6\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow7\":\"37\",\"channel17STANDARDrow7\":\"37.000\",\"channel17UUCrow7\":\"36.8\",\"channel17CORRECTIONrow7\":\"0.20\",\"channel17UNCERTAINTYrow7\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow8\":\"50\",\"channel17STANDARDrow8\":\"50.000\",\"channel17UUCrow8\":\"49.6\",\"channel17CORRECTIONrow8\":\"0.40\",\"channel17UNCERTAINTYrow8\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow9\":\"75\",\"channel17STANDARDrow9\":\"75.000\",\"channel17UUCrow9\":\"74.7\",\"channel17CORRECTIONrow9\":\"0.30\",\"channel17UNCERTAINTYrow9\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow10\":\"100\",\"channel17STANDARDrow10\":\"100.000\",\"channel17UUCrow10\":\"100.1\",\"channel17CORRECTIONrow10\":\"-0.10\",\"channel17UNCERTAINTYrow10\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow11\":\"150\",\"channel17STANDARDrow11\":\"150.040\",\"channel17UUCrow11\":\"150.2\",\"channel17CORRECTIONrow11\":\"-0.16\",\"channel17UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow12\":\"200\",\"channel17STANDARDrow12\":\"200.000\",\"channel17UUCrow12\":\"198.7\",\"channel17CORRECTIONrow12\":\"1.30\",\"channel17UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel17\",\"channelKey17\":\"17\",\"channel17TESTPOINTrow13\":\"230\",\"channel17STANDARDrow13\":\"229.980\",\"channel17UUCrow13\":\"228.3\",\"channel17CORRECTIONrow13\":\"1.68\",\"channel17UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow1\":\"-40\",\"channel18STANDARDrow1\":\"-40.000\",\"channel18UUCrow1\":\"-39.8\",\"channel18CORRECTIONrow1\":\"-0.20\",\"channel18UNCERTAINTYrow1\":\"0.37\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow2\":\"-20\",\"channel18STANDARDrow2\":\"-20.000\",\"channel18UUCrow2\":\"-19.7\",\"channel18CORRECTIONrow2\":\"-0.30\",\"channel18UNCERTAINTYrow2\":\"0.37\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow3\":\"-10\",\"channel18STANDARDrow3\":\"-10.000\",\"channel18UUCrow3\":\"-9.7\",\"channel18CORRECTIONrow3\":\"-0.30\",\"channel18UNCERTAINTYrow3\":\"0.37\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow4\":\"0\",\"channel18STANDARDrow4\":\"0.000\",\"channel18UUCrow4\":\"-0.3\",\"channel18CORRECTIONrow4\":\"0.30\",\"channel18UNCERTAINTYrow4\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow5\":\"10\",\"channel18STANDARDrow5\":\"10.000\",\"channel18UUCrow5\":\"9.6\",\"channel18CORRECTIONrow5\":\"0.40\",\"channel18UNCERTAINTYrow5\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow6\":\"20\",\"channel18STANDARDrow6\":\"20.000\",\"channel18UUCrow6\":\"19.7\",\"channel18CORRECTIONrow6\":\"0.30\",\"channel18UNCERTAINTYrow6\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow7\":\"37\",\"channel18STANDARDrow7\":\"37.000\",\"channel18UUCrow7\":\"36.8\",\"channel18CORRECTIONrow7\":\"0.20\",\"channel18UNCERTAINTYrow7\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow8\":\"50\",\"channel18STANDARDrow8\":\"50.000\",\"channel18UUCrow8\":\"49.5\",\"channel18CORRECTIONrow8\":\"0.50\",\"channel18UNCERTAINTYrow8\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow9\":\"75\",\"channel18STANDARDrow9\":\"75.000\",\"channel18UUCrow9\":\"74.7\",\"channel18CORRECTIONrow9\":\"0.30\",\"channel18UNCERTAINTYrow9\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow10\":\"100\",\"channel18STANDARDrow10\":\"100.000\",\"channel18UUCrow10\":\"100.1\",\"channel18CORRECTIONrow10\":\"-0.10\",\"channel18UNCERTAINTYrow10\":\"0.78\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow11\":\"150\",\"channel18STANDARDrow11\":\"150.040\",\"channel18UUCrow11\":\"150.3\",\"channel18CORRECTIONrow11\":\"-0.26\",\"channel18UNCERTAINTYrow11\":\"0.77\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow12\":\"200\",\"channel18STANDARDrow12\":\"200.000\",\"channel18UUCrow12\":\"198.8\",\"channel18CORRECTIONrow12\":\"1.20\",\"channel18UNCERTAINTYrow12\":\"0.77\"},{\"channelName\":\"channel18\",\"channelKey18\":\"18\",\"channel18TESTPOINTrow13\":\"230\",\"channel18STANDARDrow13\":\"229.980\",\"channel18UUCrow13\":\"228.2\",\"channel18CORRECTIONrow13\":\"1.78\",\"channel18UNCERTAINTYrow13\":\"0.77\"}],[{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow1\":\"-40\",\"channel19STANDARDrow1\":\"-40.000\",\"channel19UUCrow1\":\"-39.6\",\"channel19CORRECTIONrow1\":\"-0.40\",\"channel19UNCERTAINTYrow1\":\"0.54\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow2\":\"-20\",\"channel19STANDARDrow2\":\"-20.000\",\"channel19UUCrow2\":\"-19.8\",\"channel19CORRECTIONrow2\":\"-0.20\",\"channel19UNCERTAINTYrow2\":\"0.54\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow3\":\"-10\",\"channel19STANDARDrow3\":\"-10.000\",\"channel19UUCrow3\":\"-10.1\",\"channel19CORRECTIONrow3\":\"0.10\",\"channel19UNCERTAINTYrow3\":\"0.54\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow4\":\"0\",\"channel19STANDARDrow4\":\"0.000\",\"channel19UUCrow4\":\"-0.3\",\"channel19CORRECTIONrow4\":\"0.30\",\"channel19UNCERTAINTYrow4\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow5\":\"10\",\"channel19STANDARDrow5\":\"10.000\",\"channel19UUCrow5\":\"9.7\",\"channel19CORRECTIONrow5\":\"0.30\",\"channel19UNCERTAINTYrow5\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow6\":\"20\",\"channel19STANDARDrow6\":\"20.000\",\"channel19UUCrow6\":\"19.8\",\"channel19CORRECTIONrow6\":\"0.20\",\"channel19UNCERTAINTYrow6\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow7\":\"37\",\"channel19STANDARDrow7\":\"37.000\",\"channel19UUCrow7\":\"37.0\",\"channel19CORRECTIONrow7\":\"0.00\",\"channel19UNCERTAINTYrow7\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow8\":\"50\",\"channel19STANDARDrow8\":\"50.000\",\"channel19UUCrow8\":\"49.6\",\"channel19CORRECTIONrow8\":\"0.40\",\"channel19UNCERTAINTYrow8\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow9\":\"75\",\"channel19STANDARDrow9\":\"75.000\",\"channel19UUCrow9\":\"74.8\",\"channel19CORRECTIONrow9\":\"0.20\",\"channel19UNCERTAINTYrow9\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow10\":\"100\",\"channel19STANDARDrow10\":\"100.000\",\"channel19UUCrow10\":\"100.2\",\"channel19CORRECTIONrow10\":\"-0.20\",\"channel19UNCERTAINTYrow10\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow11\":\"150\",\"channel19STANDARDrow11\":\"150.040\",\"channel19UUCrow11\":\"150.5\",\"channel19CORRECTIONrow11\":\"-0.46\",\"channel19UNCERTAINTYrow11\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow12\":\"200\",\"channel19STANDARDrow12\":\"200.000\",\"channel19UUCrow12\":\"198.7\",\"channel19CORRECTIONrow12\":\"1.30\",\"channel19UNCERTAINTYrow12\":\"0.87\"},{\"channelName\":\"channel19\",\"channelKey19\":\"19\",\"channel19TESTPOINTrow13\":\"230\",\"channel19STANDARDrow13\":\"229.980\",\"channel19UUCrow13\":\"228.3\",\"channel19CORRECTIONrow13\":\"1.68\",\"channel19UNCERTAINTYrow13\":\"0.87\"}],[{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow1\":\"-40\",\"channel20STANDARDrow1\":\"-40.000\",\"channel20UUCrow1\":\"-39.5\",\"channel20CORRECTIONrow1\":\"-0.50\",\"channel20UNCERTAINTYrow1\":\"0.75\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow2\":\"-20\",\"channel20STANDARDrow2\":\"-20.000\",\"channel20UUCrow2\":\"-20.9\",\"channel20CORRECTIONrow2\":\"0.90\",\"channel20UNCERTAINTYrow2\":\"0.75\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow3\":\"-10\",\"channel20STANDARDrow3\":\"-10.000\",\"channel20UUCrow3\":\"-11.2\",\"channel20CORRECTIONrow3\":\"1.20\",\"channel20UNCERTAINTYrow3\":\"0.75\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow4\":\"0\",\"channel20STANDARDrow4\":\"0.000\",\"channel20UUCrow4\":\"-0.5\",\"channel20CORRECTIONrow4\":\"0.50\",\"channel20UNCERTAINTYrow4\":\"1.00\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow5\":\"10\",\"channel20STANDARDrow5\":\"10.000\",\"channel20UUCrow5\":\"9.5\",\"channel20CORRECTIONrow5\":\"0.50\",\"channel20UNCERTAINTYrow5\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow6\":\"20\",\"channel20STANDARDrow6\":\"20.000\",\"channel20UUCrow6\":\"19.7\",\"channel20CORRECTIONrow6\":\"0.30\",\"channel20UNCERTAINTYrow6\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow7\":\"37\",\"channel20STANDARDrow7\":\"37.000\",\"channel20UUCrow7\":\"36.9\",\"channel20CORRECTIONrow7\":\"0.10\",\"channel20UNCERTAINTYrow7\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow8\":\"50\",\"channel20STANDARDrow8\":\"50.000\",\"channel20UUCrow8\":\"49.7\",\"channel20CORRECTIONrow8\":\"0.30\",\"channel20UNCERTAINTYrow8\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow9\":\"75\",\"channel20STANDARDrow9\":\"75.000\",\"channel20UUCrow9\":\"74.9\",\"channel20CORRECTIONrow9\":\"0.10\",\"channel20UNCERTAINTYrow9\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow10\":\"100\",\"channel20STANDARDrow10\":\"100.000\",\"channel20UUCrow10\":\"100.4\",\"channel20CORRECTIONrow10\":\"-0.40\",\"channel20UNCERTAINTYrow10\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow11\":\"150\",\"channel20STANDARDrow11\":\"150.040\",\"channel20UUCrow11\":\"151.1\",\"channel20CORRECTIONrow11\":\"-1.06\",\"channel20UNCERTAINTYrow11\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow12\":\"200\",\"channel20STANDARDrow12\":\"200.000\",\"channel20UUCrow12\":\"198.7\",\"channel20CORRECTIONrow12\":\"1.30\",\"channel20UNCERTAINTYrow12\":\"1.0\"},{\"channelName\":\"channel20\",\"channelKey20\":\"20\",\"channel20TESTPOINTrow13\":\"230\",\"channel20STANDARDrow13\":\"230.000\",\"channel20UUCrow13\":\"228.3\",\"channel20CORRECTIONrow13\":\"1.70\",\"channel20UNCERTAINTYrow13\":\"1.0\"}]]');

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
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temperaturesource`
--

INSERT INTO `temperaturesource` (`id`, `code`, `maxInstability`, `maxAxial`, `maxRadial`, `description`) VALUES
(1, '798M', '0.01563', '0.30767', '0.32883', 'Stirred Liquid Bath; Isotech;'),
(3, '798M - 2', '0.0156269', '0.307669958', '0.3288298', 'Stirred Liquid Bath; Isotech; - 2'),
(4, '7109A', '0.0133368', '0.0200052', '0.019081426', 'Platinum Resistance Thermometer with Digital Readout'),
(9, '7109A', '0.02290', '0.01709', '0.01490', 'Platinum Resistance Thermometer with Digital Readout-1');

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
(34, 'Determination of masses', 'M2', 'Set of Weights OIML Class M1 and M2', '5 g', '0.50 mg', 'CP-003 In-house Calibration'),
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
  `calibratedBy` text DEFAULT NULL,
  `encodedBy` varchar(255) DEFAULT NULL,
  `checkedBy` text DEFAULT NULL,
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
  `comment` text DEFAULT NULL,
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
(13, 'Relative Humidity', 'Chamber 2', '0.80', '0.90'),
(30, 'Temperature', 'SAMPLE', '2', '1'),
(31, 'Relative Humidity', 'SAMPLE', '4', '3');

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
(1, '12099313038289', 'Air Temperature', '2013-10-11', '20', '-0.20'),
(2, '12099313038289', 'Air Temperature', '2014-10-20', '20', '-0.04'),
(3, '12099313038289', 'Air Temperature', '2015-11-02', '20', '-0.15'),
(4, '12099313038289', 'Air Temperature', '2016-11-24', '20', '-0.05'),
(5, '12099313038289', 'Air Temperature', '2018-01-08', '20', '-0.03'),
(6, '12099313038289', 'Air Temperature', '2019-05-03', '20', '0.01'),
(7, '12099313038289', 'Air Temperature', '2020-12-17', '20', '-0.130'),
(8, '12099313038289', 'Air Temperature', '2013-10-11', '25', '-0.26'),
(9, '12099313038289', 'Air Temperature', '2014-10-20', '25', '-0.04'),
(10, '12099313038289', 'Air Temperature', '2015-11-02', '25', '-0.22'),
(11, '12099313038289', 'Air Temperature', '2016-11-24', '25', '-0.03'),
(12, '12099313038289', 'Air Temperature', '2018-01-08', '25', '-0.02'),
(13, '12099313038289', 'Air Temperature', '2019-05-03', '25', '-0.03'),
(14, '12099313038289', 'Air Temperature', '2020-12-17', '25', '0.04'),
(15, '12099313038289', 'Air Temperature', '2013-10-11', '30', '-0.30'),
(16, '12099313038289', 'Air Temperature', '2014-10-20', '30', '-0.1'),
(17, '12099313038289', 'Air Temperature', '2015-11-02', '30', '0.02'),
(18, '12099313038289', 'Air Temperature', '2016-11-24', '30', '-0.09'),
(19, '12099313038289', 'Air Temperature', '2018-01-08', '30', '-0.34'),
(20, '12099313038289', 'Air Temperature', '2019-05-03', '30', '-0.03'),
(21, '12099313038289', 'Air Temperature', '2020-12-17', '30', '0.090'),
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
(41, '61830467', 'Air Temperature', '2020-06-16', '20', '-0.94'),
(42, '61830467', 'Air Temperature', '2021-06-08', '20', '-0.13'),
(43, '61830467', 'Air Temperature', '2020-06-16', '25', '-0.38'),
(44, '61830467', 'Air Temperature', '2021-06-08', '25', '0.09'),
(45, '61830467', 'Air Temperature', '2020-06-16', '30', '0.28'),
(46, '61830467', 'Air Temperature', '2021-06-08', '30', '0.06'),
(47, '61830467', 'Relative Humidity', '2020-06-16', '40', '-0.17'),
(48, '61830467', 'Relative Humidity', '2021-06-08', '40', '-1.74'),
(49, '61830467', 'Relative Humidity', '2020-06-16', '60', '1.06'),
(50, '61830467', 'Relative Humidity', '2021-06-08', '60', '-1.49'),
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
(104, '61830467', 'Relative Humidity', '2020-06-16', '80', '2.42'),
(105, '61830467', 'Relative Humidity', '2021-06-08', '80', '-1.59'),
(106, '', '', '', '', ''),
(107, '', '', '', '', ''),
(108, '', '', '', '', ''),
(109, '12099313038289', '', '', '', ''),
(111, '12099313038289', 'Air Temperature', '2022-05-18', '20', '-0.03'),
(112, '12099313038289', 'Air Temperature', '2022-05-18', '25', '-0.03'),
(113, '12099313038289', 'Air Temperature', '2022-05-18', '30', '-0.02'),
(114, '12099313038289', 'Relative Humidity', '2023-05-18', '40', '-0.93'),
(115, '12099313038289', 'Relative Humidity', '2023-05-18', '60', '-2.7'),
(116, '12099313038289', 'Relative Humidity', '2023-05-18', '80', '-2.9'),
(117, '61830467', 'Air Temperature', '2022-11-03', '20', '0.318'),
(118, '61830467', 'Air Temperature', '2022-11-03', '25', '-0.025'),
(119, '61830467', 'Air Temperature', '2022-11-03', '30', '0.09'),
(120, '61830467', 'Relative Humidity', '2022-11-03', '40', '-2.484'),
(121, '61830467', 'Relative Humidity', '2022-11-03', '60', '-0.958'),
(122, '61830467', 'Relative Humidity', '2022-11-03', '80', '-0.713'),
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
(174, '5220178', '', '', '', '');

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
(1, '98769', '-40', '', '0.013', ''),
(2, '98769', '-30', '-0.04', '', ''),
(3, '98769', '-20', '', '0.017', ''),
(4, '98769', '-10', '-0.01', '0.024', '0.034'),
(5, '98773', '-40', '', '0.011', ''),
(6, '98773', '-30', '-0.010', '', '0.010'),
(7, '98773', '-20', '-0.050', '0.013', '0.063'),
(8, '98773', '-10', '-0.050', '0.013', '0.063'),
(9, '98773', '0', '-0.050', '0.014', '0.064'),
(10, '98773', '20', '-0.030', '0.006', '0.036'),
(11, '98773', '50', '-0.060', '0.010', '0.06999999999999999'),
(12, '98773', '75', '-0.050', '0.007', '0.057'),
(13, '98773', '100', '-0.060', '-0.010', '0.049999999999999996'),
(14, '98773', '105', '-0.080', '-0.019', '0.061'),
(15, '98773', '150', '-0.090', '-0.133', '0.04300000000000001'),
(16, '32452/2', '-40', '0.030', '0.035', '0.0050000000000000044'),
(17, '32452/2', '-20', '0.027', '0.026', '0.0010000000000000009'),
(18, '32452/2', '-10', '0.023', '0.019', '0.004'),
(19, '32452/2', '0', '0.016', '0.009', '0.007000000000000001'),
(20, '32452/2', '20', '0.007', '0.004', '0.003'),
(21, '32452/2', '50', '-0.002', '-0.001', '0.001'),
(22, '32452/2', '75', '-0.010', '0.003', '0.013000000000000001'),
(23, '32452/2', '100', '-0.024', '0.022', '0.046'),
(24, '32452/2', '150', '-0.008', '0.008', '0.016'),
(25, '32452/2', '200', '0.0000', '0.022', '0.022'),
(26, '32452/2', '250', '0.072', '0.065', '0.006999999999999992'),
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
(61, '1003508', '-30', '', '-0.93', ''),
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
(87, '32452/2', '105', '-0.022', '0.018', '0.039999999999999994'),
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
(102, '98773', '200', '0.040', '-0.059', '0.099'),
(103, '1003508', '-20', '0.003', '-0.59', '0.593'),
(104, '1003508', '-10', '0.002', '-0.31', '0.312'),
(105, '1003508', '0', '0.001', '-0.13', '0.131'),
(106, '1003508', '20', '0.007', '-0.35', '0.357'),
(107, '1003508', '50', '0.031', '0', '0.031'),
(108, '1003508', '75', '0.043', '0.24', '0.197'),
(109, '1003508', '100', '0.092', '0.02', '0.072'),
(110, '1003508', '105', '0.085', '', ''),
(111, '1003508', '150', '0.137', '-0.17', '0.30700000000000005'),
(112, '1003508', '200', '0.161', '0.42', '0.259'),
(113, '1003508', '250', '0.205', '0.57', '0.365'),
(114, '98770 - 2022', '200', '0.030', '-0.100', '0.13'),
(115, '98770 - 2022', '250', '-0.180', '-0.145', '0.035');

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
  `issuingLab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thermostandardtable`
--

INSERT INTO `thermostandardtable` (`id`, `standard`, `manufacturer`, `modelNumber`, `serialNumber`, `certificateNumber`, `dateOfCali`, `dateOfNextCali`, `standardUsed`, `stdResolutionTemp`, `stdResolutionRH`, `issuingLab`) VALUES
(1, 'Digital Hygrometer ', 'Electronik', 'EE31', '12099313038289', '06-2021-RH-0201', '2020-12-17', '2021-12-17', 'Temperature and Humidity Transmitter', '0.01', '0.1', 'NML (Philippines)'),
(7, 'IPRT', 'Measurement Specialties', 'R-10625-1', '98769-2023', '10-2020-DT-0150', '2023-04-24', '2024-04-24', '', '0.01', '0.01', 'NML (Philippines)'),
(9, 'Platinum Resistance Thermometer with Digital Readout (PRT)', 'Measurement Specialties', 'R-10625-1', '98773', '12-2020-DT-0172', '2023-05-04', '2023-05-04', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)'),
(11, 'Platinum Resistance Thermometer with Digital Readout--', 'ISOTECH', '935-14-116', '32452/2', '05-2022-DT-0124', '2023-06-24', '2024-06-24', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)'),
(12, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98770 - 2022', '03-2023-DT-0022', '2023-05-04', '2024-05-04', 'Platinum Resistance Thermometer with Digital Readout - ', '0.001', '', 'NML (Philippines)'),
(13, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '98773 - 2022', 'MIRDC-022022-INS-0152A', '2022-03-14', '2023-03-14', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'KRISS South Korea, NMC-A*STAR Singapore through DOST - MIRDC'),
(17, 'Platinum Resistance Thermometer with Digital Readout', 'Measurement Specialties', 'R-10625-1', '1003508', '12-2021-DT-0216', '2022-03-11', '2023-03-10', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)'),
(18, 'Platinum Resistance Thermometer with Digital Readout', 'ISOTECH', '935-14-116', '32452/2 - 2022', '05-2022-DT-0124', '2022-06-24', '2023-06-23', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)'),
(19, 'Platinum Resistance Thermometer with Digital Readout', 'ISOTECH', '935-14-116', '32452/3 - 2022', '05-2022-DT-0124', '2022-06-24', '2023-06-24', 'Platinum Resistance Thermometer with Digital Readout', '0.001', '', 'NML (Philippines)'),
(20, 'Temperature and Humidity Transmitter									', 'Electronik', 'EE31', '2023SMCS25638', '2023SMCS25638', '2024-07-17', '2024-08-15', 'Temperature and Humidity Transmitter -', '0.01', '0.1', 'NML (Philippines)'),
(22, 'Humidity and Temperature Data Logger', 'Rotronic', 'None', '5220178', '02-2023-RH-0036', '2023-03-06', '2023-03-06', 'Humidity and Temperature Data Logger', '0.01', '0.01', 'NML (Philippines)'),
(27, '4', '', '', '', '', '', '', '', '', '', ''),
(28, '3', '', '', '', '', '', '', '', '', '', ''),
(29, '2', '', '', '', '', '', '', '', '', '', ''),
(30, 'Digital Hygrometer ', 'None Indicated', 'None Indicated', '10006157', '2023-088-MAS-04-001 DEMO', '2023-11-03', '2023-11-10', 'Humidity and Temperature Data Logger', '0.01', '0.1', 'NML (Philippines)'),
(31, '5', '', '', '', '', '2021-11-02', '2022-11-08', '', '', '', ''),
(32, '1', '', '', '', '', '', '', '', '', '', ''),
(33, 'Digital Thermometer with Probe', 'Fluke', '1551A', '4010016', '05-2022-DT-0125', '2023-06-24', '2024-06-24', 'Digital Thermometer with Probe', '0.01', '0.01', 'NML (Philippines)');

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
  `range` text DEFAULT NULL,
  `res` text DEFAULT NULL,
  `readability` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thermostandardtestpoints`
--

INSERT INTO `thermostandardtestpoints` (`id`, `serialNumber`, `testPoint`, `unit`, `RML`, `NML`, `correction`, `readoutStandardUncertaintyFromCertificate`, `uncertainty`, `range`, `res`, `readability`) VALUES
(5, '12099313038289', '20', 'Temperature', '20.46', '20.43', '-0.030', '0.000', '0.29000', NULL, NULL, '0.5'),
(6, '12099313038289', '25', 'Temperature', '25.32', '25.29', '-0.030', '0.000', '0.38000', NULL, NULL, '0.5'),
(7, '12099313038289', '30', 'Temperature', '30.38', '30.36', '-0.020', '0.000', '0.52000', NULL, NULL, '0.5'),
(28, '12099313038289', '40', 'Relative Humidity', '41.100', '40.1700', '-0.930', '0.000', '0.71', NULL, NULL, '0.2'),
(29, '12099313038289', '60', 'Relative Humidity', '62.600', '59.9000', '-2.700', '0.000', '1.00', NULL, NULL, '0.2'),
(30, '12099313038289', '80', 'Relative Humidity', '82.9', '80', '-2.900', '0.000', '1.9', NULL, NULL, ''),
(32, '98769', '-40', 'Temperature', '-39.95', '-39.934', '0.014', '0.000', '0.09900', '', '0.1', '0.5'),
(44, '98773', '-40', 'Temperature', '-40.087', '-40.076', '0.011000000000002785', '0', '0.16', NULL, NULL, NULL),
(45, '98773', '-20', 'Temperature', '-20.039', '-20.026', '0.013000000000001677', '0', '0.16', NULL, NULL, NULL),
(46, '98773', '-10', 'Temperature', '-9.997', '-9.984', '0.0129999999999999', '0', '0.16', NULL, NULL, NULL),
(47, '98773', '0', 'Temperature', '-0.019', '-0.005', '0.013999999999999999', '0', '0.16', NULL, NULL, NULL),
(48, '98773', '20', 'Temperature', '20.022', '20.028', '0.006000000000000227', '0', '0.16', NULL, NULL, NULL),
(49, '98773', '50', 'Temperature', '50.053', '50.063', '0.010000000000005116', '0', '0.16', NULL, NULL, NULL),
(50, '98773', '75', 'Temperature', '75.055', '75.062', '0.006999999999990791', '0', '0.16', NULL, NULL, NULL),
(51, '98773', '100', 'Temperature', '100.074', '100.064', '-0.010000000000005116', '0', '0.16', NULL, NULL, NULL),
(52, '98773', '105', 'Temperature', '105.058', '105.039', '-0.019000000000005457', '0', '0.16', NULL, NULL, NULL),
(53, '98773', '150', 'Temperature', '150.062', '149.929', '-0.13300000000000978', '0', '0.17', NULL, NULL, NULL),
(54, '98773', '200', 'Temperature', '199.964', '199.905', '-0.0589999999999975', '0', '0.17', NULL, NULL, NULL),
(58, '32452/2', '-40', 'Temperature', '-40.065', '-40.060', '0.0049999999999954525', '0', '0.12000', NULL, NULL, NULL),
(59, '32452/2', '-20', 'Temperature', '-20.011', '-20.018', '-0.0070000000000014495', '0', '0.12000', NULL, NULL, NULL),
(60, '32452/2', '-10', 'Temperature', '-9.998', '-10.012', '-0.014000000000001123', '0', '0.12000', NULL, NULL, NULL),
(61, '32452/2', '0', 'Temperature', '0.018', '-0.004', '-0.022', '0', '0.12000', NULL, NULL, NULL),
(62, '32452/2', '20', 'Temperature', '20.051', '20.019', '-0.03200000000000003', '0', '0.12000', NULL, NULL, NULL),
(63, '32452/2', '50', 'Temperature', '50.074', '50.035', '-0.03900000000000148', '0', '0.12000', NULL, NULL, NULL),
(64, '32452/2', '75', 'Temperature', '75.079', '75.032', '-0.046999999999997044', '0', '0.12000', NULL, NULL, NULL),
(65, '32452/2', '100', 'Temperature', '100.135', '100.108', '-0.027000000000001023', '0', '0.12000', NULL, NULL, NULL),
(66, '32452/2', '105', 'Temperature', '105.115', '105.078', '-0.03699999999999193', '0', '0.12000', NULL, NULL, NULL),
(67, '32452/2', '150', 'Temperature', '150.126', '150.090', '-0.036000000000001364', '0', '0.13000', NULL, NULL, NULL),
(68, '32452/2', '200', 'Temperature', '199.979', '199.943', '-0.036000000000001364', '0', '0.13000', NULL, NULL, NULL),
(69, '32452/2', '250', 'Temperature', '249.946', '249.932', '-0.014000000000010004', '0', '0.13000', NULL, NULL, NULL),
(71, '98770 - 2022', '-40.000', 'Temperature', '-40.075', '-40.076', '-0.0009999999999976694', '0', '0.160', NULL, NULL, NULL),
(72, '98770 - 2022', '-20.000', 'Temperature', '-20.030', '-20.026', '0.004000000000001336', '0', '0.160', NULL, NULL, NULL),
(73, '98770 - 2022', '-10.000', 'Temperature', '-9.988', '-9.984', '0.0039999999999995595', '0', '0.160', NULL, NULL, NULL),
(74, '98770 - 2022', '0.000', 'Temperature', '-0.005', '-0.005', '0.000', '0', '0.160', NULL, NULL, NULL),
(75, '98770 - 2022', '20.000', 'Temperature', '20.029', '20.028', '-0.0010000000000012221', '0', '0.160', NULL, NULL, NULL),
(76, '98770 - 2022', '50.000', 'Temperature', '50.055', '50.063', '0.008000000000002672', '0', '0.160', NULL, NULL, NULL),
(77, '98770 - 2022', '75.000', 'Temperature', '75.048', '75.062', '0.013999999999995794', '0', '0.160', NULL, NULL, NULL),
(78, '98770 - 2022', '100.000', 'Temperature', '100.074', '100.064', '-0.010000000000005116', '0', '0.160', NULL, NULL, NULL),
(79, '98770 - 2022', '105.000', 'Temperature', '150.106', '149.929', '-0.1769999999999925', '0', '0.170', NULL, NULL, NULL),
(80, '98770 - 2022', '150.000', 'Temperature', '150.106', '149.929', '-0.1769999999999925', '0', '0.170', NULL, NULL, NULL),
(81, '98770 - 2022', '200.000', 'Temperature', '200.005', '199.905', '-0.09999999999999432', '0', '0.170', NULL, NULL, NULL),
(82, '98770 - 2022', '250.000', 'Temperature', '250.033', '249.888', '-0.1449999999999818', '0', '0.170', NULL, NULL, NULL),
(84, '98773 - 2022', '-30.000', 'Temperature', '-29.980', '-29.99', '-0.010', '0', '0.15', NULL, NULL, NULL),
(85, '98773 - 2022', '-20.000', 'Temperature', '-19.950', '-20', '-0.050', '0', '0.15', NULL, NULL, NULL),
(86, '98773 - 2022', '-10.000', 'Temperature', '-9.990', '-10.04', '-0.050', '0', '0.15', NULL, NULL, NULL),
(87, '98773 - 2022', '0.000', 'Temperature', '0.060', '0.01', '-0.050', '0', '0.15', NULL, NULL, NULL),
(88, '98773 - 2022', '20.000', 'Temperature', '20.040', '20.01', '-0.030', '0', '0.15', NULL, NULL, NULL),
(89, '98773 - 2022', '50.000', 'Temperature', '50.030', '49.97', '-0.060', '0', '0.15', NULL, NULL, NULL),
(90, '98773 - 2022', '75.000', 'Temperature', '75.030', '74.98', '-0.050', '0', '0.15', NULL, NULL, NULL),
(91, '98773 - 2022', '100.000', 'Temperature', '100.05', '99.99', '-0.060', '0', '0.15', NULL, NULL, NULL),
(92, '98773 - 2022', '105.000', 'Temperature', '105.12', '105.04', '-0.080', '0', '0.15', NULL, NULL, NULL),
(93, '98773 - 2022', '200.000', 'Temperature', '199.91', '199.95', '0.040', '0', '0.15', NULL, NULL, NULL),
(94, '98773 - 2022', '250', 'Temperature', '250.14', '249.97', '-0.170', '0', '0.15', NULL, NULL, NULL),
(95, '98773', '250', 'Temperature', '249.972', '249.888', '-0.08400000000000318', '0', '0.17', NULL, NULL, NULL),
(108, '12099313038289 - 2023', '20', 'Temperature', '20.46', '20.43', '-0.030000000000001137', '0.000', '0.29000', NULL, NULL, NULL),
(109, '12099313038289 - 2023', '25', 'Temperature', '25.32', '25.29', '-0.030000000000001137', '0.000', '0.38000', NULL, NULL, NULL),
(110, '12099313038289 - 2023', '30', 'Temperature', '30.38', '30.36', '-0.019999999999999574', '0.000', '0.52000', NULL, NULL, NULL),
(111, '12099313038289 - 2023', '40', 'Relative Humidity', '41.100', '40.1700', '-0.9299999999999997', '0.000', '0.71', NULL, NULL, NULL),
(112, '12099313038289 - 2023', '60', 'Relative Humidity', '62.600', '59.9000', '-2.700000000000003', '0.000', '1.00', NULL, NULL, NULL),
(113, '12099313038289 - 2023', '80', 'Relative Humidity', '82.9', '80', '-2.9000000000000057', '0.000', '1.9', NULL, NULL, NULL),
(114, '1003508', '-30', 'Temperature', '-29.110', '-30.0400', '-0.9299999999999997', '0', '0.27', NULL, NULL, NULL),
(115, '1003508', '-20', 'Temperature', '-19.430', '-20.0200', '-0.5899999999999999', '0', '0.27', NULL, NULL, NULL),
(116, '1003508', '-10', 'Temperature', '-9.690', '-10.0000', '-0.3100000000000005', '0', '0.27', NULL, NULL, NULL),
(117, '1003508', '0', 'Temperature', '0.090', '-0.0400', '-0.13', '0', '0.27', NULL, NULL, NULL),
(118, '1003508', '20', 'Temperature', '20.350', '20.0000', '-0.3500000000000014', '0', '0.27', NULL, NULL, NULL),
(119, '1003508', '50', 'Temperature', '50.010', '50.0100', '0', '0', '0.27', NULL, NULL, NULL),
(120, '1003508', '75', 'Temperature', '74.760', '75.0000', '0.23999999999999488', '0', '0.27', NULL, NULL, NULL),
(121, '1003508', '100', 'Temperature', '99.970', '99.9900', '0.01999999999999602', '0', '0.27', NULL, NULL, NULL),
(122, '1003508', '105', 'Temperature', '105.017', '105.102', '0.08500000000000796', '0', '0.39', NULL, NULL, NULL),
(123, '1003508', '150', 'Temperature', '150.170', '150.0000', '-0.1699999999999875', '0', '0.27', NULL, NULL, NULL),
(124, '1003508', '200', 'Temperature', '199.580', '200.0000', '0.4199999999999875', '0', '0.27', NULL, NULL, NULL),
(125, '1003508', '250', 'Temperature', '249.460', '250.0300', '0.5699999999999932', '0', '0.27', NULL, NULL, NULL),
(126, '98773 - 2022', '150', 'Temperature', '150.08', '149.99', '-0.09000000000000341', '0', '0.15', NULL, NULL, NULL),
(127, '32452/3', '0', 'Temperature', '0.018', '-0.004', '-0.022', '0', '0.12', NULL, NULL, NULL),
(128, '32452/3', '-40', 'Temperature', '-40.065', '-40.060', '0.0049999999999954525', '0', '0.12', NULL, NULL, NULL),
(129, '32452/3', '-20', 'Temperature', '-20.011', '-20.018', '-0.0070000000000014495', '0', '0.12', NULL, NULL, NULL),
(130, '32452/3', '-10', 'Temperature', '-9.998', '-10.012', '-0.014000000000001123', '0', '0.12', NULL, NULL, NULL),
(131, '32452/3', '20', 'Temperature', '20.051', '20.019', '-0.03200000000000003', '0', '0.12', NULL, NULL, NULL),
(132, '32452/3', '50', 'Temperature', '50.074', '50.035', '-0.03900000000000148', '0', '0.12', NULL, NULL, NULL),
(133, '32452/3', '75', 'Temperature', '75.079', '75.032', '-0.046999999999997044', '0', '0.12', NULL, NULL, NULL),
(134, '32452/3', '100', 'Temperature', '100.135', '100.108', '-0.027000000000001023', '0', '0.12', NULL, NULL, NULL),
(135, '32452/3', '105', 'Temperature', '105.115', '105.078', '-0.03699999999999193', '0', '0.12', NULL, NULL, NULL),
(136, '32452/3', '150', 'Temperature', '150.126', '150.090', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL),
(137, '32452/3', '200', 'Temperature', '199.979', '199.943', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL),
(138, '32452/3', '250', 'Temperature', '249.946', '249.932', '-0.014000000000010004', '0', '0.13', NULL, NULL, NULL),
(139, '32452/2 - 2022', '-40', 'Temperature', '-40.065', '-40.060', '0.0049999999999954525', '0', '0.12', NULL, NULL, NULL),
(140, '32452/2 - 2022', '-20', 'Temperature', '-20.011', '-20.018', '-0.0070000000000014495', '0', '0.12', NULL, NULL, NULL),
(141, '32452/2 - 2022', '-10', 'Temperature', '-9.998', '-10.012', '-0.014000000000001123', '0', '0.12', NULL, NULL, NULL),
(142, '32452/2 - 2022', '0', 'Temperature', '0.018', '-0.004', '-0.022', '0', '0.12', NULL, NULL, NULL),
(143, '32452/2 - 2022', '20', 'Temperature', '20.051', '20.019', '-0.03200000000000003', '0', '0.12', NULL, NULL, NULL),
(144, '32452/2 - 2022', '50', 'Temperature', '50.074', '50.035', '-0.03900000000000148', '0', '0.12', NULL, NULL, NULL),
(145, '32452/2 - 2022', '75', 'Temperature', '75.079', '75.032', '-0.046999999999997044', '0', '0.12', NULL, NULL, NULL),
(146, '32452/2 - 2022', '100', 'Temperature', '100.135', '100.108', '-0.027000000000001023', '0', '0.12', NULL, NULL, NULL),
(147, '32452/2 - 2022', '105', 'Temperature', '105.115', '105.078', '-0.03699999999999193', '0', '0.12', NULL, NULL, NULL),
(148, '32452/2 - 2022', '150', 'Temperature', '150.126', '150.090', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL),
(149, '32452/2 - 2022', '200', 'Temperature', '199.979', '199.943', '-0.036000000000001364', '0', '0.13', NULL, NULL, NULL),
(150, '32452/2 - 2022', '250', 'Temperature', '249.946', '249.932', '-0.014000000000010004', '0', '0.13', NULL, NULL, NULL),
(151, '32452/3 - 2022', '-40', 'Temperature', '-40.095', '-40.060', '0.03499999999999659', '0', '0.12', NULL, NULL, NULL),
(152, '32452/3 - 2022', '-20', 'Temperature', '-20.044', '-20.018', '0.0259999999999998', '0', '0.12', NULL, NULL, NULL),
(153, '32452/3 - 2022', '-10', 'Temperature', '-10.031', '-10.012', '0.019000000000000128', '0', '0.12', NULL, NULL, NULL),
(154, '32452/3 - 2022', '0', 'Temperature', '-0.013', '-0.004', '0.009', '0', '0.12', NULL, NULL, NULL),
(155, '32452/3 - 2022', '20', 'Temperature', '20.015', '20.019', '0.003999999999997783', '0', '0.12', NULL, NULL, NULL),
(156, '32452/3 - 2022', '50', 'Temperature', '50.036', '50.035', '-0.0010000000000047748', '0', '0.12', NULL, NULL, NULL),
(157, '32452/3 - 2022', '75', 'Temperature', '75.029', '75.032', '0.0030000000000001137', '0', '0.12', NULL, NULL, NULL),
(158, '32452/3 - 2022', '100', 'Temperature', '100.086', '100.108', '0.02200000000000557', '0', '0.13', NULL, NULL, NULL),
(159, '32452/3 - 2022', '105', 'Temperature', '105.060', '105.078', '0.018000000000000682', '0', '0.13', NULL, NULL, NULL),
(160, '32452/3 - 2022', '150', 'Temperature', '150.082', '150.090', '0.008000000000009777', '0', '0.14', NULL, NULL, NULL),
(161, '32452/3 - 2022', '200', 'Temperature', '199.921', '199.943', '0.02200000000001978', '0', '0.14', NULL, NULL, NULL),
(162, '32452/3 - 2022', '250', 'Temperature', '249.867', '249.932', '0.06499999999999773', '0', '0.13', NULL, NULL, NULL),
(173, '5220178', '20', 'Temperature', '20.40', '20.333', '-0.06700000000000017', '0', '0.33', NULL, NULL, NULL),
(174, '5220178', '25', 'Temperature', '25.28', '25.215', '-0.06500000000000128', '0', '0.41', NULL, NULL, NULL),
(175, '5220178', '30', 'Temperature', '30.33', '30.251', '-0.07899999999999707', '0', '0.54', NULL, NULL, NULL),
(176, '5220178', '40', 'Relative Humidity', '41.27', '39.991', '-1.2790000000000035', '0', ' 0.82', NULL, NULL, NULL),
(177, '5220178', '60', 'Relative Humidity', '60.48', '60.086', '-0.39399999999999835', '0', '1.3', NULL, NULL, NULL),
(178, '5220178', '80', 'Temperature', '80.20', '79.907', '-0.29300000000000637', '0', '2.2', NULL, NULL, NULL),
(179, '98769-2023', '-40', 'Temperature', '-40.091', '-40.076', '0.015000000000000568', '0', '0.160', NULL, NULL, NULL),
(180, '98769-2023', '-20', 'Temperature', '-20.044', '-20.026', '0.018000000000000682', '0', '0.160', NULL, NULL, NULL),
(181, '98769-2023', '-10', 'Temperature', '-10.001', '-9.984', '0.01699999999999946', '0', '0.160', NULL, NULL, NULL),
(182, '98769-2023', '0', 'Temperature', '-0.024', '-0.005', '0.019', '0', '0.160', NULL, NULL, NULL),
(183, '98769-2023', '20', 'Temperature', '20.016', '20.028', '0.012000000000000455', '0', '0.160', NULL, NULL, NULL),
(184, '98769-2023', '50', 'Temperature', '50.045', '50.063', '0.018000000000000682', '0', '0.160', NULL, NULL, NULL),
(185, '98769-2023', '75', 'Temperature', '75.042', '75.062', '0.01999999999999602', '0', '0.160', NULL, NULL, NULL),
(186, '98769-2023', '100', 'Temperature', '100.061', '100.064', '0.002999999999985903', '0', '0.160', NULL, NULL, NULL),
(187, '98769-2023', '105', 'Temperature', '105.046', '105.039', '-0.007000000000005002', '0', '0.160', NULL, NULL, NULL),
(188, '98769-2023', '150', 'Temperature', '150.091', '149.929', '-0.16200000000000614', '0', '0.170', NULL, NULL, NULL),
(189, '98769-2023', '200', 'Temperature', '199.992', '199.905', '-0.08699999999998909', '0', '0.170', NULL, NULL, NULL),
(190, '98769-2023', '250', 'Temperature', '250.024', '249.888', '-0.13599999999999568', '0', '0.170', NULL, NULL, NULL),
(191, '2023SMCS25638', '20', 'Temperature', '20.36', '20.45', '0.08999999999999986', '0.000', '0.34000', NULL, NULL, NULL),
(192, '2023SMCS25638', '25', 'Temperature', '25.44', '25.55', '0.10999999999999943', '0.000', '0.34000', NULL, NULL, NULL),
(193, '2023SMCS25638', '30', 'Temperature', '30.39', '30.69', '0.3000000000000007', '0.000', '0.34000', NULL, NULL, NULL),
(194, '2023SMCS25638', '40', 'Temperature', '39.900', '40.6800', '0.7800000000000011', '0.000', '1.30', NULL, NULL, NULL),
(195, '2023SMCS25638', '45', 'Temperature', '45.200', '46.0900', '0.8900000000000006', '0.000', '1.30', NULL, NULL, NULL),
(196, '2023SMCS25638', '50', 'Temperature', '50.300', '51.2100', '0.9100000000000037', '0.000', '1.40', NULL, NULL, NULL),
(197, '2023SMCS25638', '60', 'Temperature', '59.600', '60.1900', '0.5899999999999963', '0.000', '1.50', NULL, NULL, NULL),
(198, '2023SMCS25638', '70', 'Temperature', '69.400', '70.1200', '0.7199999999999989', '0.000', '1.40', NULL, NULL, NULL),
(199, '2023SMCS25638', '80', 'Temperature', '79.1', '79.95', '0.8500000000000085', '0.000', '1.30', NULL, NULL, NULL),
(200, '4010016', '-40', 'Temperature', '-40.084', '-40.0600', '0.02400000000000091', '0', '0.13000', NULL, NULL, NULL),
(201, '4010016', '-20', 'Temperature', '-20.048', '-20.0180', '0.029999999999997584', '0', '0.13000', NULL, NULL, NULL),
(202, '4010016', '-10', 'Temperature', '-10.038', '-10.0120', '0.0259999999999998', '0', '0.13000', NULL, NULL, NULL),
(203, '4010016', '0', 'Temperature', '-0.024', '-0.0040', '0.02', '0', '0.13000', NULL, NULL, NULL),
(204, '4010016', '20', 'Temperature', '19.997', '20.0190', '0.021999999999998465', '0', '0.13000', NULL, NULL, NULL),
(205, '4010016', '50', 'Temperature', '50.004', '50.0350', '0.030999999999998806', '0', '0.13000', NULL, NULL, NULL),
(206, '4010016', '75', 'Temperature', '75.000', '75.0320', '0.031999999999996476', '0', '0.13000', NULL, NULL, NULL),
(207, '4010016', '100', 'Temperature', '100.058', '100.1080', '0.04999999999999716', '0', '0.13000', NULL, NULL, NULL),
(208, '4010016', '150', 'Temperature', '150.049', '150.0900', '0.04099999999999682', '0', '0.13000', NULL, NULL, NULL);

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
  `calibratedBy` text NOT NULL,
  `encodedBy` text NOT NULL,
  `checkedby` text NOT NULL,
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
  `comment` text DEFAULT NULL,
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

--
-- Dumping data for table `timer_standard`
--

INSERT INTO `timer_standard` (`id`, `description`, `serialNumber`, `certificateNumber`, `calibrationProvider`) VALUES
(1, 'Digital Stopwatch', '18HS80TW002', '06-2019-FREQ-0126', 'NML (Philippines)'),
(2, 'Digital Stopwatch', '18HS80TW001', '07-2021-FREQ-0120', 'NML (Philippines)');

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
(2, 'John June L. Paran', 'Technical Manager', 'june_paran@gmail.com');

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
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
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
-- Indexes for table `digitaltimertable`
--
ALTER TABLE `digitaltimertable`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `barometerstandard`
--
ALTER TABLE `barometerstandard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `digitalthermometertable`
--
ALTER TABLE `digitalthermometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitaltimertable`
--
ALTER TABLE `digitaltimertable`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `elect_table_3`
--
ALTER TABLE `elect_table_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

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
-- AUTO_INCREMENT for table `pabconditions`
--
ALTER TABLE `pabconditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pressuregaugestandardvalues`
--
ALTER TABLE `pressuregaugestandardvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `pressuregaugetable`
--
ALTER TABLE `pressuregaugetable`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_users_guest`
--
ALTER TABLE `tbl_users_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempcontrollertable`
--
ALTER TABLE `tempcontrollertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temperaturerecorder`
--
ALTER TABLE `temperaturerecorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `temperaturesource`
--
ALTER TABLE `temperaturesource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `thermohygrometertable`
--
ALTER TABLE `thermohygrometertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thermostandarddrift`
--
ALTER TABLE `thermostandarddrift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `thermostandarddriftprt`
--
ALTER TABLE `thermostandarddriftprt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `thermostandardtable`
--
ALTER TABLE `thermostandardtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `thermostandardtestpoints`
--
ALTER TABLE `thermostandardtestpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `thermotable`
--
ALTER TABLE `thermotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timer_standard`
--
ALTER TABLE `timer_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verifier`
--
ALTER TABLE `verifier`
  MODIFY `verifier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
