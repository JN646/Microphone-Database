-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2018 at 08:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL COMMENT 'Microphone ID',
  `make` varchar(50) DEFAULT NULL COMMENT 'Microphone Make',
  `model` varchar(100) DEFAULT NULL COMMENT 'Microphone Model',
  `type` varchar(50) DEFAULT NULL COMMENT 'Microphone Type',
  `polarpattern` varchar(50) DEFAULT NULL COMMENT 'Microphone Polar Pattern',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT 'Microphone Price',
  `price_currency` varchar(3) DEFAULT NULL COMMENT 'Currency Price',
  `discontinued` tinyint(1) DEFAULT '0' COMMENT 'Microphone Status',
  `notes` text COMMENT 'Microphone Notes',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date added',
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date updated',
  `update_revision` int(11) NOT NULL DEFAULT '0' COMMENT 'Number of revisions'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `make`, `model`, `type`, `polarpattern`, `price`, `price_currency`, `discontinued`, `notes`, `added`, `updated`, `update_revision`) VALUES
(1, 'Shure', 'SM57', 'Dynamic', 'Cardioid', '89.00', 'GBP', 0, 'Common studio microphone for recording instruments.', '2018-11-25 20:24:58', '2018-11-25 20:37:19', 0),
(5, 'Shure', 'SM58', 'Dynamic', 'Cardioid', '79.00', 'GBP', 0, 'Common live vocal microphone. Found on almost every stage.', '2018-11-25 20:24:58', '2018-11-25 20:37:23', 0),
(4, 'AKG', 'C414 XLS', 'Condenser', 'Cardioid', '0.00', NULL, 0, 'The C414 is probably the best-known microphone that AKG make, alongside the legendary C12. Nevertheless, the C414 has undergone a number of evolutionary changes over its long lifetime, changing shape, adding and discarding transformers, and now, in its latest incarnation, sprouting LEDs! Although the overall shape of the new versions is unmistakably C414, virtually everything about the microphone has been redesigned in an effort to retain the original sound, while at the same time improving the technical performance. AKG cite 15 improved features, though one of these relates to the depth of engraving and the colour of the infill, so clearly some are of more importance than others!', '2018-11-25 20:24:58', NULL, 0),
(7, 'Shure', 'Beta57', 'Dynamic', 'Cardioid', '0.00', NULL, 0, 'Dynamic microphone good for snare drums.', '2018-11-25 20:24:58', NULL, 0),
(8, 'Rode', 'NT2', 'Condenser', 'Cardioid', '0.00', NULL, 0, NULL, '2018-11-25 20:24:58', NULL, 0),
(9, 'Rode', 'NT4', 'Condenser', 'Cardioid', '0.00', NULL, 0, NULL, '2018-11-25 20:24:58', NULL, 0),
(10, 'AKG', 'D112', 'Dynamic', 'Cardioid', '120.00', 'GBP', 1, 'Good bass response.', '2018-11-25 20:24:58', '2018-11-25 20:37:28', 0),
(11, 'Shure', 'Beta52a', 'Dynamic', 'Cardioid', '0.00', NULL, 0, '', '2018-11-25 20:24:58', NULL, 0),
(12, 'Sennheiser', 'MD421', 'Dynamic', 'Cardioid', '0.00', NULL, 0, 'Studio dynamic microphone.', '2018-11-25 20:24:58', NULL, 0),
(13, 'Neumann', 'KM184', 'Condenser', 'Super-Cardioid', '0.00', NULL, 0, '', '2018-11-25 20:24:58', NULL, 0),
(14, 'Shure', 'SM7B', 'Condenser', 'Cardioid', '0.00', NULL, 0, 'Studio vocal microphone.', '2018-11-25 20:24:58', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `microphone_type`
--

CREATE TABLE `microphone_type` (
  `type_id` int(11) NOT NULL COMMENT 'Type ID',
  `type_name` varchar(75) NOT NULL COMMENT 'Type Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Microphone Types';

--
-- Dumping data for table `microphone_type`
--

INSERT INTO `microphone_type` (`type_id`, `type_name`) VALUES
(1, 'Dynamic'),
(2, 'Condenser'),
(3, 'Ribbon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `microphone_type`
--
ALTER TABLE `microphone_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Microphone ID', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `microphone_type`
--
ALTER TABLE `microphone_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Type ID', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
