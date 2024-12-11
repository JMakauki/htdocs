-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 12:40 AM
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
-- Database: `accommodation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `sex` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `FirstName`, `LastName`, `sex`) VALUES
('admin', 'admin', 'Mwaisa', 'mtumbadi', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `id` int(11) NOT NULL,
  `student` varchar(30) NOT NULL,
  `room` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`id`, `student`, `room`, `date`) VALUES
(2, '13301001', 5, '2022-06-20 20:34:14'),
(3, '13301002', 1, '2022-04-20 23:01:39'),
(4, '13301003', 1, '2022-04-20 23:01:57'),
(5, '13301004', 1, '2022-04-20 23:02:11'),
(6, '13301005', 2, '2022-04-20 23:02:41'),
(7, '13301006', 2, '2022-04-20 23:03:08'),
(8, '13301007', 2, '2022-04-20 23:03:38'),
(12, '13301008', 2, '2022-04-20 23:17:02'),
(13, '13301040', 51, '2022-04-20 23:21:26'),
(14, '13301048', 41, '2022-04-21 12:50:36'),
(15, '13301098', 275, '2022-04-21 18:17:30'),
(16, '13301099', 50, '2022-06-20 21:38:37'),
(17, '13301097', 49, '2022-06-20 21:37:43'),
(18, '13301030', 277, '2022-04-21 18:22:26'),
(19, '13301071', 51, '2022-04-27 18:13:05'),
(20, '13301054', 273, '2022-06-20 19:43:21'),
(23, '13301071', 1, '2022-04-28 08:48:41'),
(24, '13301044', 39, '2022-05-01 16:01:25'),
(25, '13301055', 73, '2022-05-31 14:20:13'),
(27, '13301001', 11, '2022-06-08 08:52:00'),
(28, '13301091', 273, '2022-06-08 20:33:53'),
(29, '13301092', 49, '2022-06-20 21:38:04'),
(30, '13301065', 3, '2022-06-10 13:13:14'),
(32, '13301050', 275, '2022-06-20 20:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `Hostel_ID` int(3) NOT NULL,
  `Hostel_name` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`Hostel_ID`, `Hostel_name`, `sex`) VALUES
(1, 'Mwinyi', 'M'),
(2, 'Kinjekitile', 'M'),
(3, 'Mirambo', 'M'),
(4, 'Kingo', 'M'),
(5, 'Mkwawa', 'M'),
(6, 'Nyerere', 'M'),
(7, 'Mkapa', 'M'),
(8, 'Ntare', 'M'),
(9, 'Block A', 'M'),
(10, 'Nyirenda', 'M'),
(20, 'Maria', 'F'),
(21, 'Sophia', 'F'),
(22, 'Mareale', 'F'),
(23, 'Yanga', 'F'),
(24, 'Dangote', 'F'),
(25, 'Obama', 'F'),
(26, 'rumanyika', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_ID` int(3) NOT NULL,
  `Room_no` int(3) NOT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  `Hostel_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_ID`, `Room_no`, `room_capacity`, `Hostel_ID`) VALUES
(1, 1, 4, 1),
(2, 2, 4, 1),
(3, 1, 4, 2),
(4, 2, 4, 2),
(5, 1, 4, 3),
(6, 2, 4, 3),
(7, 1, 4, 4),
(8, 2, 4, 4),
(9, 1, 4, 5),
(10, 2, 4, 5),
(11, 1, 4, 6),
(12, 2, 4, 6),
(13, 1, 4, 7),
(14, 2, 4, 7),
(15, 1, 4, 8),
(16, 2, 4, 8),
(17, 1, 4, 9),
(18, 2, 4, 9),
(19, 1, 4, 10),
(20, 2, 4, 10),
(39, 1, 4, 20),
(40, 2, 4, 20),
(41, 1, 4, 21),
(42, 2, 4, 21),
(43, 1, 4, 22),
(44, 2, 4, 22),
(45, 1, 4, 23),
(46, 2, 4, 23),
(47, 1, 4, 24),
(48, 2, 4, 24),
(49, 1, 4, 25),
(50, 2, 1, 25),
(51, 3, 4, 1),
(52, 3, 4, 2),
(53, 3, 4, 3),
(54, 3, 4, 4),
(55, 3, 4, 5),
(56, 3, 4, 6),
(57, 3, 4, 7),
(58, 3, 4, 8),
(59, 3, 4, 9),
(60, 3, 4, 10),
(70, 3, 4, 20),
(71, 3, 4, 21),
(72, 3, 4, 22),
(73, 3, 4, 23),
(74, 3, 4, 24),
(75, 3, 4, 25),
(82, 4, 4, 1),
(83, 4, 4, 2),
(84, 4, 4, 3),
(85, 4, 4, 4),
(86, 4, 4, 5),
(87, 4, 4, 6),
(88, 4, 4, 7),
(89, 4, 4, 8),
(90, 4, 4, 9),
(91, 4, 4, 10),
(101, 4, 4, 20),
(102, 4, 4, 21),
(103, 4, 4, 22),
(104, 4, 4, 23),
(105, 4, 4, 24),
(106, 4, 4, 25),
(113, 5, 4, 1),
(114, 5, 4, 2),
(115, 5, 4, 3),
(116, 5, 4, 4),
(117, 5, 4, 5),
(118, 5, 4, 6),
(119, 5, 4, 7),
(120, 5, 4, 8),
(121, 5, 4, 9),
(122, 5, 4, 10),
(132, 5, 4, 20),
(133, 5, 4, 21),
(134, 5, 4, 22),
(135, 5, 4, 23),
(136, 5, 4, 24),
(137, 5, 4, 25),
(144, 6, 4, 1),
(145, 6, 4, 2),
(146, 6, 4, 3),
(147, 6, 4, 4),
(148, 6, 4, 5),
(149, 6, 4, 6),
(150, 6, 4, 7),
(151, 6, 4, 8),
(152, 6, 4, 9),
(153, 6, 4, 10),
(163, 6, 4, 20),
(164, 6, 4, 21),
(165, 6, 4, 22),
(166, 6, 4, 23),
(167, 6, 4, 24),
(168, 6, 4, 25),
(175, 7, 4, 1),
(176, 7, 4, 2),
(177, 7, 4, 3),
(178, 7, 4, 4),
(179, 7, 4, 5),
(180, 7, 4, 6),
(181, 7, 4, 7),
(182, 7, 4, 8),
(183, 7, 4, 9),
(184, 7, 4, 10),
(194, 7, 4, 20),
(195, 7, 4, 21),
(196, 7, 4, 22),
(197, 7, 4, 23),
(198, 7, 4, 24),
(199, 7, 4, 25),
(206, 8, 4, 1),
(207, 8, 4, 2),
(208, 8, 4, 3),
(209, 8, 4, 4),
(210, 8, 4, 5),
(211, 8, 4, 6),
(212, 8, 4, 7),
(213, 8, 4, 8),
(214, 8, 4, 9),
(215, 8, 4, 10),
(225, 8, 4, 20),
(226, 8, 4, 21),
(227, 8, 4, 22),
(228, 8, 4, 23),
(229, 8, 4, 24),
(230, 8, 4, 25),
(237, 9, 4, 1),
(238, 9, 4, 2),
(239, 9, 4, 3),
(240, 9, 4, 4),
(241, 9, 4, 5),
(242, 9, 4, 6),
(243, 9, 4, 7),
(244, 9, 4, 8),
(245, 9, 4, 9),
(256, 9, 4, 20),
(257, 9, 4, 21),
(258, 9, 4, 22),
(259, 9, 4, 23),
(260, 9, 4, 24),
(261, 9, 4, 25),
(262, 10, 2, 8),
(263, 11, 5, 8),
(264, 12, 5, 8),
(265, 13, 1, 8),
(266, 14, 4, 8),
(267, 15, 0, 8),
(268, 16, 0, 8),
(269, 17, 0, 8),
(270, 10, 2, 1),
(272, 55, 6, 8),
(273, 1, 2, 26),
(274, 2, 12, 26),
(275, 15, 2, 26),
(277, 20, 1, 10),
(278, 0, 1, 1),
(279, 56, 3, 1),
(280, 23, 5, 1),
(282, 12, 1, 22),
(283, 10, 1, 22),
(284, 11, 4, 22),
(286, 10, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `hostel_ID` int(3) DEFAULT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `FirstName`, `LastName`, `DOB`, `Sex`, `hostel_ID`, `Phone`, `Email`, `password`) VALUES
('mu.001', 'JAMES', 'ONESMO', '1970-02-05', 'M', 1, '0621112233', 'jonesmo@gmail.com', '123'),
('mu.002', 'JACOB', 'ZUMA', '1969-03-16', 'M', 2, '0692112233', 'jzuma@gmail.com', '123'),
('mu.003', 'ABEID', 'MBARUKU', '1975-05-22', 'M', 3, '0689112233', 'ambaruku@gmail.com', '123'),
('mu.004', 'IDDI', 'MWAMNYETO', '1974-06-29', 'M', 4, '0624331221', 'imwamnyeto@gmail.com', '123'),
('mu.005', 'STEVEN', 'KESSY', '1977-12-30', 'M', 5, '0754331221', 'skessy@gmail.com', '123'),
('mu.006', 'YVONNE', 'MWANGOSI', '1970-04-11', 'F', 20, '0756322113', 'ymwangosi@gmail.com', '123'),
('mu.007', 'ROSE', 'SASABO', '1970-08-08', 'F', 3, '0755321231', 'rsasabo@gmail.com', '123'),
('mu.008', 'MARIAM', 'MWAITUBI', '1967-10-19', 'F', NULL, '0764365421', 'mmwaitubi@gmail.com', '123'),
('mu.009', 'JANE', 'JOHN', '1968-09-01', 'F', NULL, '0764365422', 'jjohn@gmail.com', '123'),
('mu.010', 'JOAN', 'LUKAS', '1969-12-23', 'F', 20, '0764555521', 'jlukas@gmail.com', '123'),
('mu.011', 'GRACE', 'SAMSONI', '1969-01-23', 'F', 21, '0764225521', 'gsamsoni@gmail.com', '123'),
('mu.012', 'JANETH', 'FUSSY', '1969-01-03', 'F', 22, '0768765521', 'jfussy@gmail.com', '123'),
('mu.013', 'GLORY', 'LUKUMBI', '1969-11-02', 'F', 23, '0764985521', 'glukumbi@gmail.com', '123'),
('mu.014', 'AGNES', 'YEKONIA', '1969-11-03', 'F', 24, '0764785521', 'ayekonia@gmail.com', '123'),
('mu.015', 'MERCY', 'MASIKA', '1969-11-24', 'F', 25, '0764556621', 'mmasika@gmail.com', '123'),
('mu.016', 'AMANI', 'KAPUMU', '1967-11-21', 'M', 6, '0764363215', 'akapumu@gmail.com', '123'),
('mu.017', 'STEPHANO', 'MNANGWA', '1967-11-23', 'M', 7, '0764365587', 'smnangwa@gmail.com', '123'),
('mu.018', 'GODFREY', 'JACOB', '1968-07-23', 'M', 8, '0764365565', 'goja@gmail.com', '123'),
('mu.019', 'GEOFREY', 'JAMES', '1968-01-23', 'M', 9, '0764365545', 'gejam@gmail.com', '123'),
('mu.020', 'HAMISI', 'TAMBWE', '1964-08-23', 'M', 10, '0764365331', 'htambwe@gmail.com', '123'),
('mu.021', 'EZEKIEL', 'NATHANAEL', '1966-08-23', 'M', NULL, '0764312521', 'ezke@gmail.com', '123'),
('mu.022', 'ISRAEL', 'BENEDICTO', '1965-08-21', 'M', NULL, '0764323521', 'Ibenedicto@gmail.com', '123'),
('mu.023', 'MOSES', 'RYANGA', '1965-11-20', 'M', NULL, '0764362321', 'mryanga@gmail.com', '123'),
('mu.024', 'ABEL', 'MPEHEYE', '1979-11-19', 'M', NULL, '0764365534', 'ampeheye@gmail.com', '123'),
('mu.025', 'LAURENCE', 'MAYUNGA', '1979-11-15', 'M', NULL, '0764565521', 'lmayungan@gmail.com', '123'),
('mu.026', 'jonas', 'wamchongo', '0000-00-00', 'M', 2, '', NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regno` varchar(30) NOT NULL,
  `FirstName` char(30) NOT NULL,
  `LastName` char(30) NOT NULL,
  `Program` char(30) NOT NULL,
  `DOB` date NOT NULL,
  `sex` char(1) NOT NULL,
  `Disability` char(3) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regno`, `FirstName`, `LastName`, `Program`, `DOB`, `sex`, `Disability`, `Phone`, `Email`, `password`) VALUES
('13301001', 'EZEKIEL', 'MTAWA', 'ITS1', '1995-06-15', 'M', 'NO', '0753096930', 'Ezmtawa@gmail.com', '123'),
('13301002', 'KELVIN', 'MASOUD', 'ITS', '1998-11-12', 'M', 'NO', '0784567683', 'Kmasoud11@gmail.com', '123'),
('13301003', 'JOHN', 'MWENDA', 'ITS', '1996-02-20', 'M', 'NO', '0622025459', 'jmwenda@gmail.com', '123'),
('13301004', 'AMON', 'MOSES', 'ITS', '1999-04-05', 'M', 'NO', '0624055365', 'kmoses@gmail.com', '123'),
('13301005', 'DOMINICK', 'KIMASA', 'ITS', '1998-05-06', 'M', 'NO', '0754125497', 'jkimasa@gmail.com', '123'),
('13301006', 'ABRAHAM', 'MWANSANSU', 'ITS', '1998-05-06', 'M', 'NO', '0624144748', 'amwansansu@gmail.com', '123'),
('13301007', 'JOEL', 'MWAKALEBELA', 'ITS', '1996-02-20', 'M', 'NO', '0782252623', 'dmwakalebela@gmail.com', '123'),
('13301008', 'RICHARD', 'MWAIGE', 'ITS', '1998-05-14', 'M', 'NO', '0755124282', 'amwaige@gmail.com', '123'),
('13301009', 'FRED', 'MICHAEL', 'ITS', '1998-11-15', 'M', 'NO', '0624758693', 'Jmsaki@gmail.com', '123'),
('13301010', 'ABUBAKAR', 'DILUNGA', 'POM', '1998-11-16', 'M', 'YES', '0624261548', 'adilunga@gmail.com', '123'),
('13301011', 'JUMA', 'KIKULI', 'POM', '1998-05-18', 'M', 'NO', '0624481526', 'jkikuli@gmail.com', '123'),
('13301012', 'VICTOR', 'MWAISIGE', 'POM', '1998-11-08', 'M', 'NO', '0624794613', 'vmwaisige@gmail.com', '123'),
('13301013', 'CLEMENCE', 'MWIKABE', 'POM', '1998-05-05', 'M', 'NO', '0624124679', 'cmwikabe@gmail.com', '123'),
('13301014', 'ABEL', 'SHAYO', 'POM', '1998-05-01', 'M', 'YES', '0624172839', 'ashayo@gmail.com', '123'),
('13301015', 'MOSES', 'JAMES', 'POM', '1998-11-03', 'M', 'YES', '0624115544', 'mjames@gmail.com', '123'),
('13301016', 'RAMADHAN', 'SUDI', 'BAF', '1999-04-03', 'M', 'NO', '0723255588', 'rsudi@gmail.com', '123'),
('13301017', 'ALI', 'RAMADHAN', 'BAF', '1999-04-09', 'M', 'NO', '0782345588', 'aramadhan@gmail.com', '123'),
('13301018', 'JONAS', 'MKUDE', 'BAF', '1998-04-08', 'M', 'NO', '0782455588', 'jmkude@gmail.com', '123'),
('13301019', 'ANTHONY', 'MPOKI', 'BAF', '1989-04-02', 'M', 'NO', '0785655588', 'ampoki@gmail.com', '123'),
('13301020', 'SHEDRACK', 'ZAKAYO', 'BAF', '1999-04-03', 'M', 'NO', '0767255588', 'szakayo@gmail.com', '123'),
('13301021', 'INNOCENT', 'MGAVE', 'BAF', '1999-05-03', 'M', 'NO', '0778255588', 'imgave@gmail.com', '123'),
('13301022', 'TARIQ', 'SEIF', 'BAF', '1999-01-03', 'M', 'NO', '0782289588', 'tseif@gmail.com', '123'),
('13301023', 'AHMED', 'ABED', 'BAF', '1999-04-04', 'M', 'NO', '0782287588', 'aabed@gmail.com', '123'),
('13301024', 'ABEID', 'MUSA', 'BAF', '1999-04-03', 'M', 'NO', '0782276588', 'amusa@gmail.com', '123'),
('13301025', 'DANFORD', 'KALABA', 'BAF', '1999-04-03', 'M', 'NO', '0782555884', 'dkalaba@gmail.com', '123'),
('13301026', 'DOMINICK', 'SALAMBA', 'ICTM', '1999-04-05', 'M', 'NO', '0652255588', 'dsalamba@gmail.com', '123'),
('13301027', 'RICHARD', 'BISHANGWAYO', 'ICTM', '1999-04-06', 'M', 'NO', '0762255588', 'rbishangwayo@gmail.com', '123'),
('13301028', 'KENNEDY', 'ANTHONY', 'ICTM', '1999-04-05', 'M', 'NO', '0782255548', 'kantonny@gmail.com', '123'),
('13301029', 'STEVEN', 'MAUYA', 'ICTM', '1999-05-03', 'M', 'NO', '0782255554', 'smauya@gmail.com', '123'),
('13301030', 'COLLINS', 'SHIRIMA', 'BAF', '1999-05-03', 'M', 'NO', '0782255543', 'cshirima@gmail.com', '123'),
('13301031', 'MICHAEL', 'MASWA', 'BAF', '1999-05-03', 'M', 'NO', '0782253488', 'mmaswa@gmail.com', '123'),
('13301032', 'GABRIEL', 'ASEKI', 'BAF', '1999-05-03', 'M', 'NO', '0782255532', 'gaseki@gmail.com', '123'),
('13301033', 'FAHAD', 'JUMA', 'BAF', '1999-05-03', 'M', 'NO', '0782255237', 'fjuma@gmail.com', '123'),
('13301034', 'VICTOR', 'KISANGA', 'BAF', '1999-05-03', 'M', 'NO', '0782325588', 'vkisanga@gmail.com', '123'),
('13301035', 'SOSPETER', 'WANDELA', 'BAF', '1999-06-03', 'M', 'NO', '0782345588', 'swandela@gmail.com', '123'),
('13301036', 'ABDALLAH', 'CHISALA', 'BAF', '1999-06-03', 'M', 'NO', '0784355588', 'achisala@gmail.com', '123'),
('13301037', 'ATHUMAN', 'KASSIM', 'BAF', '1999-04-03', 'M', 'NO', '0745455588', 'akassim@gmail.com', '123'),
('13301038', 'SHUKURU', 'KAWAMBWA', 'BAF', '1998-06-03', 'M', 'NO', '0785655588', 'skawambwa@gmail.com', '123'),
('13301039', 'JOHN', 'GABRIEL', 'BAF', '1998-04-01', 'M', 'NO', '0782656588', 'jgabriel@gmail.com', '123'),
('13301040', 'AYOUB', 'NJONJO', 'BAF', '1998-05-02', 'M', 'NO', '0782265588', 'anjonjo@gmail.com', '123'),
('13301041', 'ANNA', 'MGASA', 'BAF', '1998-05-03', 'F', 'NO', '0782287588', 'amgas@gmail.com', '123'),
('13301042', 'ASHURA', 'HAULE', 'BAF', '1997-07-04', 'F', 'NO', '0782875588', 'ahaule@gmail.com', '123'),
('13301043', 'JANE', 'MASAWE', 'BAF', '1995-07-05', 'F', 'NO', '0782255588', 'jmasawe@gmail.com', '123'),
('13301044', 'JANETH', 'LIVINGSTONE', 'BAF', '1996-06-01', 'F', 'NO', '0782277588', 'jlivingstone@gmail.com', '123'),
('13301045', 'JANETH', 'MASONDA', 'BAF', '1996-05-01', 'F', 'NO', '0782255577', 'jmasonda@gmail.com', '123'),
('13301046', 'AGNES', 'MWAKILASA', 'BAF', '1996-05-01', 'F', 'NO', '0782257788', 'amwakilasa@gmail.com', '123'),
('13301047', 'IRENE', 'MINGA', 'BAF', '1996-04-03', 'F', 'NO', '0782255565', 'iminga@gmail.com', '123'),
('13301048', 'HADIJA', 'RAJABU', 'BAF', '1998-03-05', 'F', 'NO', '0782255668', 'hrajab@gmail.com', '123'),
('13301049', 'SHAMIRA', 'ALI', 'BAF', '1998-04-06', 'F', 'NO', '0782255658', 'sali@gmail.com', '123'),
('13301050', 'AGNES', 'MWAMBENE', 'BAF', '1998-04-06', 'F', 'NO', '0782565880', 'amwambene@gmail.com', '123'),
('13301051', 'SHAMIRA', 'ISSAH', 'BAF', '1998-03-07', 'F', 'NO', '0782345588', 'sissah@gmail.com', '123'),
('13301052', 'ANETH', 'RICHARD', 'BAF', '1997-03-08', 'F', 'NO', '0782335588', 'arichard@gmail.com', '123'),
('13301053', 'JOAN', 'JACKSON', 'BAF', '1997-02-09', 'F', 'NO', '0782255338', 'jjackson@gmail.com', '123'),
('13301054', 'LINNAH', 'MUSHI', 'BAF', '1997-02-10', 'F', 'NO', '0782233588', 'lmushi@gmail.com', '123'),
('13301055', 'LISSA', 'CHIKWENDE', 'ICTM', '2000-02-11', 'F', 'NO', '0782445588', 'lchikwende@gmail.com', '123'),
('13301056', 'HAMIDA', 'RASHID', 'BAF', '2000-01-12', 'F', 'NO', '0782254488', 'hrashid@gmail.com', '123'),
('13301057', 'HAMIDA', 'MUSA', 'ICTM', '1999-01-13', 'F', 'NO', '0782455588', 'hmusa@gmail.com', '123'),
('13301058', 'GIFT', 'MACHA', 'BAF', '1999-12-14', 'F', 'NO', '0782255388', 'gmacha@gmail.com', '123'),
('13301059', 'ANGEL', 'JOHN', 'BAF', '1999-12-15', 'F', 'NO', '0782255528', 'ajohn@gmail.com', '123'),
('13301060', 'CLARA', 'JEREMIA', 'BAF', '1998-12-16', 'F', 'NO', '0782225588', 'cjeremia@gmail.com', '123'),
('13301061', 'KABIR', 'HASSAN', 'BBA', '1998-12-17', 'M', 'NO', '0782255548', 'khassan@gmail.com', '123'),
('13301062', 'ABDUL', 'SWAMADU', 'BBA', '1998-11-18', 'M', 'NO', '0782255584', 'aswamadu@gmail.com', '123'),
('13301063', 'BASHIR', 'ABDUL', 'BBA', '1998-11-19', 'M', 'NO', '0782255548', 'babdul@gmail.com', '123'),
('13301064', 'MOHAMMED', 'BAKARI', 'BBA', '1997-11-20', 'M', 'NO', '0782235588', 'mbakari@gmail.com', '123'),
('13301065', 'SALEH', 'MWENDA', 'BBA', '1997-11-21', 'M', 'NO', '0782245583', 'smwenda@gmail.com', '123'),
('13301066', 'ABEID', 'SWALEHE', 'BBA', '1996-11-22', 'M', 'NO', '0782454588', 'aswaleh@gmail.com', '123'),
('13301067', 'AMANI', 'MAHUNA', 'BBA', '1996-11-23', 'M', 'NO', '0782257588', 'amahuna@gmail.com', '123'),
('13301068', 'JUNIOR', 'KIMARO', 'BBA', '1995-10-24', 'M', 'NO', '0782755588', 'jkimaro@gmail.com', '123'),
('13301069', 'ALFA', 'RAYMOND', 'BBA', '1994-10-25', 'M', 'NO', '0782275588', 'araymond@gmail.com', '123'),
('13301070', 'RAYMOND', 'KIKWETE', 'BBA', '1994-10-26', 'M', 'NO', '0782285588', 'rkikwete@gmail.com', '123'),
('13301071', 'JEREMIAH', 'ANTHONY', 'BBA', '1993-10-27', 'M', 'NO', '0788225558', 'janthony@gmail.com', '123'),
('13301072', 'TAREQ', 'KIKEKE', 'BBA', '1993-10-28', 'M', 'NO', '0782255488', 'tkikeke@gmail.com', '123'),
('13301073', 'LUKAS', 'KIKOTI', 'BBA', '1992-09-29', 'M', 'NO', '0782234588', 'kikoti@gmail.com', '123'),
('13301074', 'NEYMAR', 'MAJOGORO', 'BBA', '1992-09-30', 'M', 'NO', '0782253488', 'nmajogoro@gmail.com', '123'),
('13301075', 'NASIB', 'ABDUL', 'BBA', '1991-08-01', 'M', 'NO', '0782253488', 'nabdul@gmail.com', '123'),
('13301076', 'LUKOSA', 'JUNIOR', 'BBA', '1991-08-02', 'M', 'NO', '0782276588', 'ljunior@gmail.com', '123'),
('13301077', 'LEBRON', 'JAMES', 'BBA', '1999-08-03', 'M', 'NO', '0782255648', 'ljames@gmail.com', '123'),
('13301078', 'SENZO', 'MBATA', 'BBA', '1999-07-04', 'M', 'NO', '0782255546', 'smbata@gmail.com', '123'),
('13301079', 'BROWN', 'BRIAN', 'BBA', '1999-07-05', 'M', 'NO', '0782255536', 'bbrian@gmail.com', '123'),
('13301080', 'WILLIAMS', 'JACKSON', 'BBA', '1998-07-06', 'M', 'NO', '0783655588', 'wjack@gmail.com', '123'),
('13301081', 'VIVIAN', 'BROWN', 'BBA', '1998-07-07', 'F', 'NO', '0782255488', 'vbr@gmail.com', '123'),
('13301082', 'SOPHIA', 'ALI', 'BBA', '1989-06-08', 'F', 'NO', '0782255577', 'sal@gmail.com', '123'),
('13301083', 'SONIA', 'BRIAN', 'BBA', '1997-06-09', 'F', 'NO', '0782255478', 'sobr@gmail.com', '123'),
('13301084', 'MERCY', 'KELVIN', 'BBA', '1997-06-10', 'F', 'NO', '0782255888', 'merke@gmail.com', '123'),
('13301085', 'SAIMA', 'HASSAM', 'BBA', '1997-06-11', 'F', 'NO', '0782254788', 'saihas@gmail.com', '123'),
('13301086', 'GRACE', 'JAMES', 'BBA', '1996-06-12', 'F', 'NO', '0782255748', 'graja@gmail.com', '123'),
('13301087', 'NEEMA', 'ANTHONY', 'BBA', '1996-05-13', 'F', 'NO', '0782274588', 'nanth@gmail.com', '123'),
('13301088', 'DIANA', 'BENARD', 'BBA', '1996-05-14', 'F', 'NO', '0782257488', 'diben@gmail.com', '123'),
('13301089', 'TECKLA', 'INNOCENT', 'ICTM', '1995-04-15', 'F', 'NO', '0787755588', 'tinn@gmail.com', '123'),
('13301090', 'MARIAM', 'URASA', 'ICTM', '1995-05-16', 'F', 'NO', '0782254488', 'mura@gmail.com', '123'),
('13301091', 'AMINA', 'JUMA', 'ICTM', '1994-05-17', 'F', 'NO', '0782255546', 'ajuma@gmail.com', '123'),
('13301092', 'SURAIYA', 'ABDUL', 'ICTM', '1994-04-18', 'F', 'NO', '0782246588', 'sabd@gmail.com', '123'),
('13301093', 'KABULA', 'JAMES', 'ICTM', '1994-04-20', 'F', 'NO', '0782256488', 'kajam@gmail.com', '123'),
('13301094', 'VIOLETH', 'AMON', 'ICTM', '1993-04-21', 'F', 'NO', '0782256488', 'vamon@gmail.com', '123'),
('13301095', 'GLORY', 'ANORLD', 'BBA', '1993-04-22', 'F', 'NO', '0782253688', 'gano@gmail.com', '123'),
('13301096', 'ALICE', 'DENIS', 'ICTM', '1993-04-23', 'F', 'NO', '0782255368', 'alid@gmail.com', '123'),
('13301097', 'ISABELA', 'OSCAR', 'ICTM', '1992-05-24', 'F', 'NO', '0782236588', 'isosc@gmail.com', '123'),
('13301098', 'CAROLINE', 'JASON', 'ICTM', '1992-03-25', 'F', 'NO', '0782365588', 'coja@gmail.com', '123'),
('13301099', 'STELLA', 'PAUL', 'ICTM', '1991-02-26', 'F', 'NO', '0782255368', 'stepa@gmail.com', '123'),
('13301100', 'SHADYA', 'HASSAN', 'ICTM', '1991-01-27', 'F', 'NO', '0782236588', 'shass@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `room` (`room`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`Hostel_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_ID`),
  ADD KEY `Hostel_ID` (`Hostel_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `hostel_ID` (`hostel_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `Hostel_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Room_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `allocation_ibfk_2` FOREIGN KEY (`student`) REFERENCES `student` (`regno`),
  ADD CONSTRAINT `allocation_ibfk_3` FOREIGN KEY (`room`) REFERENCES `room` (`Room_ID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`Hostel_ID`) REFERENCES `hostel` (`Hostel_ID`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`hostel_ID`) REFERENCES `hostel` (`Hostel_ID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
