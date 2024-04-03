-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 01:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `performance_data`
--

CREATE TABLE `performance_data` (
  `id` int(11) NOT NULL,
  `pso_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `volume_required` int(11) NOT NULL,
  `volume_achievement` int(11) NOT NULL,
  `rgb_required` int(11) NOT NULL,
  `rgb_achievement` int(11) NOT NULL,
  `ic_required` int(11) NOT NULL,
  `ic_achievement` int(11) NOT NULL,
  `penetration_boxes` int(11) NOT NULL,
  `improvement_percentage` float NOT NULL,
  `red` int(11) NOT NULL,
  `new_outlets` int(11) NOT NULL,
  `zero_sale` int(11) NOT NULL,
  `inefficient` int(11) NOT NULL,
  `call_completion` float NOT NULL,
  `strike_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_data`
--

INSERT INTO `performance_data` (`id`, `pso_name`, `date`, `volume_required`, `volume_achievement`, `rgb_required`, `rgb_achievement`, `ic_required`, `ic_achievement`, `penetration_boxes`, `improvement_percentage`, `red`, `new_outlets`, `zero_sale`, `inefficient`, `call_completion`, `strike_rate`) VALUES
(1, 'Ifthikhar', '2024-04-03', 45, 12, 13, 14, 12, 14, 12, 12, 14, 14, 12, 12, 12, 14),
(2, 'Haji', '2024-04-03', 45, 47, 42, 14, 23, 14, 23, 12, 14, 23, 14, 13, 12, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance_data`
--
ALTER TABLE `performance_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_pso_date` (`pso_name`,`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `performance_data`
--
ALTER TABLE `performance_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
