-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Lug 08, 2024 alle 14:58
-- Versione del server: 8.3.0
-- Versione PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cemana`
--

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `qry_associates`
-- (Vedi sotto per la vista effettiva)
--
DROP VIEW IF EXISTS `qry_associates`;
CREATE TABLE IF NOT EXISTS `qry_associates` (
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `qry_clients`
-- (Vedi sotto per la vista effettiva)
--
DROP VIEW IF EXISTS `qry_clients`;
CREATE TABLE IF NOT EXISTS `qry_clients` (
);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_appointments`
--

DROP TABLE IF EXISTS `tbl_appointments`;
CREATE TABLE IF NOT EXISTS `tbl_appointments` (
  `appointmentID` int NOT NULL AUTO_INCREMENT,
  `cientID` int DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` datetime DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `associateID` int DEFAULT NULL,
  `statusID` int DEFAULT '1',
  `cancellationt_time` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`appointmentID`),
  KEY `associateID` (`associateID`),
  KEY `client_detailsID` (`cientID`),
  KEY `PoID` (`appointmentID`),
  KEY `tlbl_tatus_tbl_appointments` (`statusID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_appointments`
--

INSERT INTO `tbl_appointments` (`appointmentID`, `cientID`, `date`, `time`, `notes`, `associateID`, `statusID`, `cancellationt_time`, `timestamp`) VALUES
(59, 1, '2018-08-15 00:00:00', '1899-12-30 11:00:00', NULL, 1, 3, NULL, '2018-07-02 16:52:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_appointment_services`
--

DROP TABLE IF EXISTS `tbl_appointment_services`;
CREATE TABLE IF NOT EXISTS `tbl_appointment_services` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `appointmentID` int DEFAULT NULL,
  `serviceID` int DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `statusID` int DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `associateID` int DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `appointmentsID` (`appointmentID`),
  KEY `statusID` (`statusID`),
  KEY `ItemID` (`serviceID`),
  KEY `PoItemID` (`ID`),
  KEY `tbl_associate_profile_tbl_appointment_services` (`associateID`)
) ENGINE=InnoDB AUTO_INCREMENT=8242 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_appointment_services`
--

INSERT INTO `tbl_appointment_services` (`ID`, `appointmentID`, `serviceID`, `start_time`, `end_time`, `statusID`, `discount`, `associateID`, `note`) VALUES
(8235, 59, 29, '1899-12-30 10:00:00', '1899-12-30 11:00:00', NULL, NULL, NULL, NULL),
(8236, 59, 1, '1899-12-30 11:15:00', '1899-12-30 12:30:00', NULL, NULL, NULL, NULL),
(8237, 59, 89, '1899-12-30 13:00:00', '1899-12-30 14:00:00', NULL, NULL, NULL, NULL),
(8238, 59, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(8239, 59, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(8240, 59, 88, NULL, NULL, NULL, NULL, NULL, NULL),
(8241, 59, 102, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_associates_hours`
--

DROP TABLE IF EXISTS `tbl_associates_hours`;
CREATE TABLE IF NOT EXISTS `tbl_associates_hours` (
  `associate_hourID` int NOT NULL AUTO_INCREMENT,
  `associateID` int DEFAULT NULL,
  `dayID` int DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `finish_time` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`associate_hourID`),
  KEY `associateID` (`associateID`),
  KEY `dayID` (`dayID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_associate_profile`
--

DROP TABLE IF EXISTS `tbl_associate_profile`;
CREATE TABLE IF NOT EXISTS `tbl_associate_profile` (
  `associateID` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `address1` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `cabine_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `cellular_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `email` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `hourly_rate` double DEFAULT NULL,
  `hire_date` datetime DEFAULT NULL,
  `termination_date` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`associateID`),
  KEY `associateID` (`associateID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_associate_profile`
--

INSERT INTO `tbl_associate_profile` (`associateID`, `first_name`, `last_name`, `address1`, `cabine_number`, `cellular_number`, `email`, `hourly_rate`, `hire_date`, `termination_date`, `date_created`) VALUES
(1, 'Gina', 'Whipp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-02 16:28:54');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_client_profile`
--

DROP TABLE IF EXISTS `tbl_client_profile`;
CREATE TABLE IF NOT EXISTS `tbl_client_profile` (
  `clientID` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `address1` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `mobile_phone` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `payment_termID` int DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`clientID`),
  KEY `payment_termID` (`payment_termID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_client_profile`
--

INSERT INTO `tbl_client_profile` (`clientID`, `first_name`, `last_name`, `address1`, `mobile_phone`, `email`, `payment_termID`, `timestamp`) VALUES
(1, 'Olive', 'Oyl', 'Calle 23', '234556666', 'olive@gmail.com', 1, NULL),
(19, 'DANIELE', 'DIPIETRO', 'Calle 34 324', '333333456546', 'test1@gmail.com', 1, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_days`
--

DROP TABLE IF EXISTS `tbl_days`;
CREATE TABLE IF NOT EXISTS `tbl_days` (
  `dayID` int NOT NULL AUTO_INCREMENT,
  `day` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`dayID`),
  KEY `dayID` (`dayID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_days`
--

INSERT INTO `tbl_days` (`dayID`, `day`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_payment_terms`
--

DROP TABLE IF EXISTS `tbl_payment_terms`;
CREATE TABLE IF NOT EXISTS `tbl_payment_terms` (
  `payment_termID` int NOT NULL AUTO_INCREMENT,
  `days` int DEFAULT NULL,
  `message` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`payment_termID`),
  KEY `payment_termID` (`payment_termID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_payment_terms`
--

INSERT INTO `tbl_payment_terms` (`payment_termID`, `days`, `message`, `active`) VALUES
(1, 30, 'Payment due within 30 days.', 1),
(2, 60, 'Payment due within 60 days.', 1),
(3, 15, 'Payment due within 15 days.', 1),
(4, 7, 'Payment due within 7 days.', 1),
(5, 0, 'Payment due upon receipt.', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_services`
--

DROP TABLE IF EXISTS `tbl_services`;
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `servicesID` int NOT NULL AUTO_INCREMENT,
  `service` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `duration` datetime DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `available` tinyint(1) DEFAULT '0',
  `categoryID` int DEFAULT NULL,
  PRIMARY KEY (`servicesID`),
  KEY `CategoriesID` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_services`
--

INSERT INTO `tbl_services` (`servicesID`, `service`, `duration`, `cost`, `available`, `categoryID`) VALUES
(1, 'Pedicure', '1899-12-30 00:15:00', NULL, 1, NULL),
(6, 'Chin Wax', '1899-12-30 00:15:00', NULL, 1, NULL),
(11, 'Brazillian', '1899-12-30 00:45:00', NULL, 1, NULL),
(29, 'Classic Manicure', '1899-12-30 00:45:00', NULL, 1, NULL),
(88, 'Hair Cut', '1899-12-30 01:30:00', NULL, 1, NULL),
(89, 'Nails', '1899-12-30 00:45:00', NULL, 1, NULL),
(102, 'Beauty Spot', '1899-12-30 00:45:00', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `statusID` int NOT NULL AUTO_INCREMENT,
  `status` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`statusID`),
  KEY `statusID` (`statusID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_status`
--

INSERT INTO `tbl_status` (`statusID`, `status`, `sort_order`, `active`) VALUES
(1, 'Open', NULL, 1),
(2, 'Tentative', NULL, 1),
(3, 'Cancelled', NULL, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_times`
--

DROP TABLE IF EXISTS `tbl_times`;
CREATE TABLE IF NOT EXISTS `tbl_times` (
  `timeID` int NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  PRIMARY KEY (`timeID`),
  KEY `timeID` (`timeID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tbl_times`
--

INSERT INTO `tbl_times` (`timeID`, `time`, `sort_order`) VALUES
(1, '1899-12-30 09:00:00', NULL),
(2, '1899-12-30 09:15:00', NULL),
(3, '1899-12-30 09:30:00', NULL),
(4, '1899-12-30 09:45:00', NULL),
(5, '1899-12-30 10:00:00', NULL),
(6, '1899-12-30 10:15:00', NULL),
(7, '1899-12-30 10:30:00', NULL),
(8, '1899-12-30 10:45:00', NULL),
(9, '1899-12-30 11:00:00', NULL),
(10, '1899-12-30 11:15:00', NULL),
(11, '1899-12-30 11:30:00', NULL),
(12, '1899-12-30 11:45:00', NULL),
(13, '1899-12-30 12:00:00', NULL),
(14, '1899-12-30 12:15:00', NULL),
(15, '1899-12-30 12:30:00', NULL),
(16, '1899-12-30 12:45:00', NULL),
(17, '1899-12-30 13:00:00', NULL),
(18, '1899-12-30 13:15:00', NULL),
(19, '1899-12-30 13:30:00', NULL),
(20, '1899-12-30 13:45:00', NULL),
(21, '1899-12-30 14:00:00', NULL),
(22, '1899-12-30 14:15:00', NULL),
(23, '1899-12-30 14:30:00', NULL),
(24, '1899-12-30 14:45:00', NULL),
(25, '1899-12-30 15:00:00', NULL),
(26, '1899-12-30 15:15:00', NULL),
(27, '1899-12-30 15:30:00', NULL),
(28, '1899-12-30 15:45:00', NULL),
(29, '1899-12-30 16:00:00', NULL),
(30, '1899-12-30 16:15:00', NULL),
(31, '1899-12-30 16:30:00', NULL),
(32, '1899-12-30 16:45:00', NULL),
(33, '1899-12-30 17:00:00', NULL),
(34, '1899-12-30 17:15:00', NULL),
(35, '1899-12-30 17:30:00', NULL),
(36, '1899-12-30 17:45:00', NULL),
(37, '1899-12-30 18:00:00', NULL),
(38, '1899-12-30 18:15:00', NULL),
(39, '1899-12-30 18:30:00', NULL),
(40, '1899-12-30 18:45:00', NULL),
(41, '1899-12-30 19:00:00', NULL),
(42, '1899-12-30 19:15:00', NULL),
(43, '1899-12-30 19:30:00', NULL),
(44, '1899-12-30 19:45:00', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `user_name`, `role`, `password`) VALUES
(6, '', '', 'administrator', '', 'administrator'),
(8, 'cemana', 'cemana', 'cemana', 'admin', '$2y$10$TRmEWJeBUKRbm9uv0xZpFujJuPe4LzG/OUdigz3HcqUwgHNtz7rXa');

-- --------------------------------------------------------

--
-- Struttura della tabella `tlb_categories`
--

DROP TABLE IF EXISTS `tlb_categories`;
CREATE TABLE IF NOT EXISTS `tlb_categories` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `category` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dump dei dati per la tabella `tlb_categories`
--

INSERT INTO `tlb_categories` (`categoryID`, `category`, `sort_order`, `active`) VALUES
(1, 'Facial', NULL, 1),
(2, 'Body', NULL, 1),
(3, 'Nails', NULL, 1),
(4, 'Waxing', NULL, 1),
(5, 'Semi Make-up', NULL, 1),
(6, 'Tinting', NULL, 1),
(7, 'Bang Trim', NULL, 1),
(8, 'Cut (Female)', NULL, 1),
(9, 'Cut (Male)', NULL, 1);

-- --------------------------------------------------------

--
-- Struttura per vista `qry_associates`
--
DROP TABLE IF EXISTS `qry_associates`;

DROP VIEW IF EXISTS `qry_associates`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_associates`  AS SELECT `tbl_associate_profile`.`associateID` AS `associateID`, if((`tbl_associate_profile`.`apNickname` <> ''),(`tbl_associate_profile`.`apNickname` & (' ' + `tbl_associate_profile`.`last_name`)),(`tbl_associate_profile`.`first_name` & (' ' + `tbl_associate_profile`.`last_name`))) AS `Associate`, `tbl_associate_profile`.`initials` AS `initials` FROM `tbl_associate_profile` ORDER BY `tbl_associate_profile`.`first_name` ASC ;

-- --------------------------------------------------------

--
-- Struttura per vista `qry_clients`
--
DROP TABLE IF EXISTS `qry_clients`;

DROP VIEW IF EXISTS `qry_clients`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_clients`  AS SELECT `tbl_client_profile`.`clientID` AS `clientID`, ((`tbl_client_profile`.`first_name` & ', ') & `tbl_client_profile`.`last_name`) AS `Client`, if((`tbl_client_profile`.`archive` = true),'x',NULL) AS `Archive` FROM `tbl_client_profile` ;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD CONSTRAINT `tbl_associate_profile_tbl_appointments` FOREIGN KEY (`associateID`) REFERENCES `tbl_associate_profile` (`associateID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_client_profile_tbl_appointments` FOREIGN KEY (`cientID`) REFERENCES `tbl_client_profile` (`clientID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tlbl_tatus_tbl_appointments` FOREIGN KEY (`statusID`) REFERENCES `tbl_status` (`statusID`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `tbl_appointment_services`
--
ALTER TABLE `tbl_appointment_services`
  ADD CONSTRAINT `tbl_appointments_tbl_appointment_services` FOREIGN KEY (`appointmentID`) REFERENCES `tbl_appointments` (`appointmentID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_associate_profile_tbl_appointment_services` FOREIGN KEY (`associateID`) REFERENCES `tbl_associate_profile` (`associateID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_services_tbl_appointment_services` FOREIGN KEY (`serviceID`) REFERENCES `tbl_services` (`servicesID`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `tbl_associates_hours`
--
ALTER TABLE `tbl_associates_hours`
  ADD CONSTRAINT `tbl_associate_profile_tbl_associates_hours` FOREIGN KEY (`associateID`) REFERENCES `tbl_associate_profile` (`associateID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tlb_days_tbl_associates_hours` FOREIGN KEY (`dayID`) REFERENCES `tbl_days` (`dayID`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `tbl_client_profile`
--
ALTER TABLE `tbl_client_profile`
  ADD CONSTRAINT `tlb_payment_terms_tbl_client_profile` FOREIGN KEY (`payment_termID`) REFERENCES `tbl_payment_terms` (`payment_termID`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD CONSTRAINT `tbl_categories_tbl_services` FOREIGN KEY (`categoryID`) REFERENCES `tlb_categories` (`categoryID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
