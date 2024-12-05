-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2024 at 09:44 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nova_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `course` varchar(50) NOT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic` (`nic`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nic`, `name`, `address`, `telephone`, `course`, `registration_date`) VALUES
(6, '992345678V', 'Nimal Perera', 'No. 45, Galle Road, Colombo', '0771234567', 'ICT Basics', '2023-08-15 04:53:45'),
(7, '000456789V', 'Kamal Wijesinghe', 'No. 10, Temple Road, Kandy', '0713456789', 'Web Development', '2023-08-20 10:00:00'),
(8, '001234567V', 'Sunil Fernando', 'No. 3, Main Street, Kurunegala', '0784567890', 'Programming', '2023-08-25 02:30:00'),
(9, '993456780V', 'Samantha Jayawardena', 'No. 88, Lake Road, Anuradhapura', '0709876543', 'Data Science', '2023-09-01 07:15:30'),
(10, '882345679V', 'Amali Gunarathne', 'No. 12, Green Lane, Negombo', '0724567890', 'ICT Basics', '2023-09-05 03:45:00'),
(11, '995678123V', 'Mahesh Silva', 'No. 5, Flower Avenue, Matara', '0777890123', 'Web Development', '2023-09-10 08:50:00'),
(12, '001987654V', 'Dinesh Pathirana', 'No. 25, Station Road, Jaffna', '0781234567', 'Networking', '2023-09-15 11:10:00'),
(13, '994567890V', 'Tharindu Bandara', 'No. 19, City Lane, Gampaha', '0703456789', 'Data Science', '2023-09-20 06:00:00'),
(14, '991234789V', 'Ruwan Herath', 'No. 7, Coconut Garden, Kalutara', '0719876543', 'Graphic Design', '2023-09-25 07:30:00'),
(15, '993457890V', 'Shanika Karunaratne', 'No. 23, Palm Grove, Hambantota', '0776543210', 'Web Development', '2023-09-30 10:20:00'),
(16, '003456789V', 'Harsha Weerasinghe', 'No. 9, King Street, Colombo', '0719876541', 'Graphic Design', '2023-10-01 03:40:00'),
(17, '004567890V', 'Pasan Madushanka', 'No. 15, Hill Crest, Nuwara Eliya', '0785678901', 'Data Science', '2023-10-05 09:15:00'),
(18, '995678234V', 'Iresha Samarakoon', 'No. 42, Beach Road, Hikkaduwa', '0701234568', 'Computer Science', '2023-10-10 03:00:00'),
(19, '998765432V', 'Lakmini Alwis', 'No. 30, Elm Lane, Ratnapura', '0772345671', 'Programming', '2023-10-15 05:50:00'),
(20, '990123456V', 'Ravindu Ekanayake', 'No. 22, Lake Drive, Polonnaruwa', '0713456782', 'Networking', '2023-10-20 10:40:00'),
(21, '882456789V', 'Dilini Rathnayake', 'No. 8, Park Avenue, Chilaw', '0788765432', 'Web Development', '2023-10-25 04:30:00'),
(22, '886789123V', 'Chathura Perera', 'No. 12, Main Street, Vavuniya', '0776789012', 'Cyber Security', '2023-10-30 09:05:00'),
(23, '003987654V', 'Sanduni Jayasuriya', 'No. 56, Canal View, Galle', '0709876542', 'Graphic Design', '2023-11-01 04:20:00'),
(24, '004876543V', 'Naveen Rodrigo', 'No. 3, Mountain Pass, Bandarawela', '0717654321', 'Data Science', '2023-11-05 09:55:00'),
(25, '006789012V', 'Pradeep Samarasinghe', 'No. 7, River Side, Trincomalee', '0786543210', 'Cyber Security', '2023-11-10 07:10:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
