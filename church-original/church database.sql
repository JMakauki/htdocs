-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 02:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `church`
--

CREATE TABLE `church` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `church`
--

INSERT INTO `church` (`id`, `name`, `location`) VALUES
(23, 'carmel', 'Morogoro'),
(24, 'Modeco', 'Mazimbu, Morogoro'),
(25, 'st.Patrick', 'Mjini, Morogoro'),
(26, 'st. Monica', 'Kihonda, Morogoro');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `id` int(11) NOT NULL,
  `church` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`id`, `church`, `description`, `deadline`) VALUES
(1, 24, 'desc', '2022-06-09'),
(2, 24, 'Zaka ya mwezi Mei', '2022-05-03'),
(3, 24, 'Zaka ya mwezi april', '2022-05-02'),
(4, 24, 'Zaka ya mwezi april', '2022-05-19'),
(5, 24, 'harambee ya mwisho wa mwezi', '2022-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `believer` int(11) NOT NULL,
  `contribution` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `believer`, `contribution`, `amount`, `time`) VALUES
(1, 37, 1, 5000, '2022-05-02 16:02:12'),
(5, 27, 1, 10000, '2022-05-02 16:07:45'),
(6, 37, 2, 50000, '2022-05-02 16:36:25'),
(7, 37, 4, 20000, '2022-05-05 09:43:03'),
(8, 37, 5, 20000, '2022-05-05 09:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `event` varchar(200) NOT NULL,
  `church` int(11) NOT NULL,
  `date` date NOT NULL,
  `repeat` varchar(200) DEFAULT NULL,
  `weekday` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `time`, `event`, `church`, `date`, `repeat`, `weekday`) VALUES
(2, '01:25:00', 'jello', 23, '2021-09-14', '', NULL),
(26, '21:51:00', 'now', 23, '2021-09-12', '', NULL),
(30, '09:09:00', '1232', 23, '2021-09-15', 'weekly', NULL),
(32, '01:06:00', 'ORIENTATION FOR HOLY COMMUNION', 23, '2021-08-30', 'weekly', 1),
(35, '20:30:00', 'Sunday mass', 26, '2021-09-18', 'weekly', 6),
(38, '20:51:00', 'seminar', 25, '0000-00-00', 'daily', 4),
(41, '23:18:00', 'monica', 26, '2021-09-10', 'weekly', 5),
(42, '12:34:00', 'Johnson Makauki', 25, '2021-09-22', '', 3),
(43, '12:34:00', 'Johnson Makauki', 25, '2021-09-22', '', 3),
(46, '12:59:00', 'dfg', 25, '2021-09-03', '', 5),
(47, '12:59:00', 'dfg', 25, '2021-09-03', '', 5),
(49, '12:59:00', 'dfg', 25, '2021-09-03', '', 5),
(50, '06:30:00', 'Daily mass', 23, '0000-00-00', 'daily', 4),
(51, '23:29:00', 'sample event starting 27 april', 25, '2022-04-27', 'weekly', 3),
(52, '09:00:00', 'Sunday mass', 25, '2022-04-24', 'weekly', 0),
(53, '06:30:00', 'Sunday mass', 24, '2022-05-08', 'weekly', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `church` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `phone`, `password`, `status`, `id`, `church`) VALUES
('johnson', 'adolf', 'johnsonmakauki@gmail.com', '0621083201', '77cc7c19b2af7ff6e94b7474060081e2101104bd', 'admin', 6, NULL),
('jane', 'jane', 'jane@gmail.com', '0134654', '8a8deed44623d4c44268c26652d80945851c4f7f', 'ambassador', 24, 23),
('joan', 'joan', 'JOAN@GMAIL.COM', '321', 'e0397393f2258e8c6ee68e35ceb46d86a4ac5382', 'ambassador', 25, 26),
('james', 'james', 'james@gmail.com', '321', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', 'ambassador', 26, 25),
('emmanuel', 'emmanuel', 'emmanuel@gmail.com', '9826', 'bd234ba4276433f0e5fc7a8fa2d18274fa711567', 'ambassador', 27, 24),
('henry', 'henry', 'henry@gmail.com', '023465', '3eca10f30041813f045165784e24b5a950a6cc7e', 'ambassador', 28, 23),
('hans', 'hans', 'hans@gmail.com', '0123456789', '8800578b51f022c8d8adb9606a8b3db4fedbdac6', 'ambassador', 29, 25),
('baraka', 'baraka', 'baraka@gmail.com', '1255478', '285846ee27541e674eec58d53385c0d77369b528', 'admin', 31, NULL),
('me', 'me', 'me@gmail.com', '0123', 'b1c1d8736f20db3fb6c1c66bb1455ed43909f0d8', 'admin', 32, NULL),
('he', 'he', 'he@gmail.com', '0123', '30f088ea6673877c2e2c1edbe7513ff90eda9a6f', 'ambassador', 33, 24),
('johnson', 'johnson', 'johnson@gmail.com', '0621083206', 'ace893fb2c9553a38a873fb03d0e21a406b351a1', 'admin', 34, NULL),
('admin', 'admin', 'admin@gmail.com', '123', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 35, NULL),
('Kunze', 'lazaro', 'lazaro@gmail.com', '123', 'ae21b5a957209ac152bc779d414faaed988ef3f6', 'believer', 36, 26),
('jafe', 'jafe', 'jafe@gmail.com', '123', '68d2abeb915d4dec1f5680bd5dbc48a80c48b07a', 'believer', 37, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `church`
--
ALTER TABLE `church`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `church` (`church`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `believer` (`believer`),
  ADD KEY `contribution` (`contribution`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule` (`church`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`church`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `church`
--
ALTER TABLE `church`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contribution`
--
ALTER TABLE `contribution`
  ADD CONSTRAINT `contribution_ibfk_1` FOREIGN KEY (`church`) REFERENCES `church` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`believer`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`contribution`) REFERENCES `contribution` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule` FOREIGN KEY (`church`) REFERENCES `church` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user` FOREIGN KEY (`church`) REFERENCES `church` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
