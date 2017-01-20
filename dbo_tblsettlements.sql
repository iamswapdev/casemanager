-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 04:01 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbo_tblsettlements`
--

CREATE TABLE IF NOT EXISTS `dbo_tblsettlements` (
  `Settlement_Id` int(11) NOT NULL,
  `Settlement_Amount` decimal(19,4) DEFAULT NULL,
  `Settlement_Int` decimal(19,4) DEFAULT NULL,
  `Settlement_Af` decimal(19,4) DEFAULT NULL,
  `Settlement_Ff` decimal(19,4) DEFAULT NULL,
  `Settlement_Total` decimal(19,4) DEFAULT NULL,
  `Settlement_Date` datetime(6) DEFAULT NULL,
  `Treatment_Id` int(11) DEFAULT NULL,
  `Case_Id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `User_Id` varchar(50) NOT NULL,
  `SettledWith` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Settlement_Notes` varchar(2000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Settlement_Rfund_PR` decimal(19,4) DEFAULT NULL,
  `Settlement_Rfund_Int` decimal(19,4) DEFAULT NULL,
  `Settlement_Rfund_Total` decimal(19,4) DEFAULT NULL,
  `Settlement_Rfund_date` datetime(6) DEFAULT NULL,
  `Settlement_Rfund_Batch` int(11) DEFAULT NULL,
  `Settlement_Rfund_UserId` varchar(50) DEFAULT NULL,
  `Settlement_Batch` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbo_tblsettlements`
--

INSERT INTO `dbo_tblsettlements` (`Settlement_Id`, `Settlement_Amount`, `Settlement_Int`, `Settlement_Af`, `Settlement_Ff`, `Settlement_Total`, `Settlement_Date`, `Treatment_Id`, `Case_Id`, `User_Id`, `SettledWith`, `Settlement_Notes`, `Settlement_Rfund_PR`, `Settlement_Rfund_Int`, `Settlement_Rfund_Total`, `Settlement_Rfund_date`, `Settlement_Rfund_Batch`, `Settlement_Rfund_UserId`, `Settlement_Batch`) VALUES
(13, '832.1800', '1100.1400', '386.4600', '654.0000', '0.0000', '2017-01-12 12:24:37.000000', NULL, 'NB09-1', 'admin', ' Adelson Gary => [ADJ.PH#: 585-295-4412 / INS CPY: CLARENDON NATIONAL INSURANCE COMPANY / ADJ FAX#: 585-295-8411] ', 'AAA HEARING WON => 832.18 / 1100.14 / 386.46 / 654.00 , Sett % 100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2016-12-21 17:02:24.000000', NULL, 'AR16-8435', 'admin', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '500.0000', '0.0000', '1000.0000', '0.0000', '500.0000', '2016-12-27 13:26:49.000000', NULL, 'AR13-5426', 'admin', ' Ambrosio Mariana => [ADJ.PH#: 631-577-7289 / INS CPY: A.CENTRAL INSURANCE COMPANY / ADJ FAX#: 866-889-8376] ', 'iuiuiu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '792.3600', '0.0000', '0.0000', '0.0000', '0.0000', '2016-12-26 10:20:06.000000', NULL, 'AR12-3017', 'admin', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '792.3600', '1.0565', '50.0000', '50.0000', '892.3600', '2016-12-27 12:37:54.000000', NULL, 'AR09-35', 'alla', ' ANDERSON ANNMARIE => [ADJ.PH#: 631-385-6658 / INS CPY: STATE FARM MUTUAL AUTOMOBILE INSURANCE COMPANY / ADJ FAX#: 631-385-6569] ', 'dfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '1515.3600', '456.0000', '500.0000', '445.0000', '1401.0000', '2016-12-27 13:14:30.000000', NULL, 'AR15-6718', 'admin', ' Dunn Antoinette => [ADJ.PH#: 610-270-3938 / INS CPY: UNITRIN DIRECT INSURANCE COMPANY / ADJ FAX#: 610-276-3931] ', 'sdsds', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '1515.3600', '15.0000', '303.0720', '0.0000', '0.0000', '2016-12-26 14:09:59.000000', NULL, 'AR16-8431', 'admin', ' 0Select Adjuster  ! => [ADJ.PH#: 0 / INS CPY:  / ADJ FAX#: 0 ] ', 'ssd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '781.0400', '0.0000', '156.2080', '0.0000', '937.2480', '2016-12-29 00:00:00.000000', NULL, 'AR10-946', 'alla', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '139.6700', '516.6700', '135.8500', '100.0000', '915.0900', '2016-12-30 15:57:25.000000', NULL, 'AR16-8475', 'admin', ' ADOCCHIO JUNE => [ADJ.PH#: 516-714-7574 / INS CPY: GEICO INSURANCE COMPANY / ADJ FAX#: 866-625-8508] ', 'SETTLED IN COURT => 162.57 / 516.67 / 135.85 / 100.00 , Sett % 100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '600.0000', '356.4000', '191.2800', '0.0000', '0.0000', '2017-01-12 12:23:21.000000', NULL, 'AR13-5069', 'sid', ' ADAMS MARYBETH => [ADJ.PH#: 516-714-7202 / INS CPY: GEICO INSURANCE COMPANY / ADJ FAX#: 516-213-1205] ', 'SETTLED/PHONE => 600.00 / 356.40 / 191.28 / 0.00 , Sett % 100.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '4000.0000', '100.0000', '200.0000', '85.0000', NULL, '2017-01-11 00:00:00.000000', NULL, 'AR14-6017', 'sid2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '100.0000', '200.0000', '50.0000', '50.0000', '400.0000', '2017-01-12 12:24:37.000000', NULL, 'AR15-6715', 'alla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '567.0000', '258.0000', '40.0000', '40.0000', '905.0000', '2017-01-03 00:00:00.000000', NULL, 'AR15-6718', 'sid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbo_tblsettlements`
--
ALTER TABLE `dbo_tblsettlements`
  ADD PRIMARY KEY (`Settlement_Id`),
  ADD KEY `IX_tblSettlementsCase` (`Case_Id`),
  ADD KEY `IX_tblSettlementsUser` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbo_tblsettlements`
--
ALTER TABLE `dbo_tblsettlements`
  MODIFY `Settlement_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
