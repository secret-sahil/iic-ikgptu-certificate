-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2022 at 03:25 PM
-- Server version: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.3.29-1+focal

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cert_certifucate_ikgptu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(65) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'Admin IKGPTU', 'admin@ptu.ac.in', '$2y$10$0e9xVt5B0NGsnWVdKiQH0.3d.tRk3sKuKQhHbYvQ3G0Zfm6ikw5.2', 'admin'),
(10, 'Sahil Kumar', 'contact@mrsahil.in', '$2y$10$ea2nEPZ2SvzgrJAgytsCJO5KF/nrMbBaa13bNSKdrYOjxom2EiZYe', 'issuer');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` varchar(255) NOT NULL,
  `name` varchar(120) NOT NULL,
  `Roll` bigint(12) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `campus_name` text NOT NULL,
  `event_date` date DEFAULT NULL,
  `issuedBy` varchar(300) NOT NULL,
  `issuedFor` varchar(240) NOT NULL,
  `issuedOn` date NOT NULL,
  `description` text DEFAULT NULL,
  `position` varchar(4) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `Roll`, `email`, `campus_name`, `event_date`, `issuedBy`, `issuedFor`, `issuedOn`, `description`, `position`, `type`) VALUES
('PTU0324fd', 'Suraj Kumar Pandey', 1, 'Pandeyysuraj@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTU032504', 'Suraj Maurya', 1, 'mnaveen1888@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTU032506', 'Somesh Upadhyay', 1, 'someshupadhyay008@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTU032508', 'Sinesh Kumar', 1, 'sineshkumarr@gmail.com', 'I K Gujral Punjab Technical University, Mohali Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTU0eaa83', 'Bikash Kumar', 2022677, 'contact.biku001@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTU1a4185', 'Sonu Kumar', 1, 'thakurpushkarsonu@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', '1st', 'Merit'),
('PTU312a6e', 'Aakash Kumar Verma', 1, 'kumarvermaaakash@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', '3rd', 'Merit'),
('PTU60495c', 'Sanskriti Verma', 1, 'sanskritipctebajmc2018@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', '2nd', 'Merit'),
('PTU7c4bd8', 'Abhishek Kumar', 1, 'ak2636433@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTU9ea95d', 'Hari Singh', 1, 'harisingh35309@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', '2nd', 'Merit'),
('PTUb2e362', 'Ankita Ranjan', 2022671, 'ankitaranjan60907@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'admin@ptu.ac.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238e5', 'Ashirvad Kumar', 1, 'kumarashirvad411@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238eb', 'Adarsh Singh', 1, 'Adarsh.save.girl@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238ec', 'Aditya Raj', 1, 'adi2000raj.1812@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238ed', 'Akash Gupta', 1, 'akashkumargupta12101@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238ee', 'Aakash Kumar', 1, 'ak951575@gmail.com', 'I K Gujral Punjab Technical University, Amritsar Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238ef', 'Alok Sharma', 1, 'kingofkingsalok@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f0', 'Md Faisal', 1, 'mdf24277@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f1', 'Nishant Marwaha', 1, 'marwahanishant11@gmail.com ', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f2', 'Anshu Kumar', 1, 'kumaranshu2930@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f3', 'Anurag ', 1, 'anuragvaibhav2508@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f4', 'Arshdeep Singh', 1, 'ishir.sagoo@gmail.com', 'I K Gujral Punjab Technical University, Hoshirapur Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f5', 'Deepak Gupta', 1, 'maddeshiyadeepak01@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f6', 'Gurnoorpreet Kaur', 1, 'gurnoorpreet568@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f7', 'Hardik Bajaj', 1, 'hardikbajaj12002@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238f8', 'Shubham Kumar', 1, 'raijishubham12345@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238fa', 'Kiran Kumar', 1, 'kk9840042@gmail.com', 'I K Gujral Punjab Technical University, Amritsar Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238fb', 'Hemant Raman', 1, 'hemantraman76@gmail.com', 'I K Gujral Punjab Technical University, Amritsar Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238fc', 'Indrajeet Rai', 1, 'indrajeetrai903@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238fd', 'Karan', 1, 'karanarora110498@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238fe', 'Lakshay', 1, 'lakshaykumar4675@gmail.com', 'I K Gujral Punjab Technical University, Amritsar Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc238ff', 'Mayank', 1, 'mayanknathawat4@gmail.com', 'I K Gujral Punjab Technical University, Mohali Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23900', 'Nilesh Kumar', 1, 'mishranilesh1504@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23901', 'Nitesh Kumar', 1, 'Kumar9118558812ku@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23902', 'Pankila Vasishat ', 1, 'pankilavasishat@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23903', 'Tania', 1, 'tania7707979412@gmail.com', 'I K Gujral Punjab Technical University, Hoshiarpur Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23904', 'Vivek Kumar Sonkar', 1, 'Golusonkar94500@mail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23905', 'Pawan Kumar', 1, 'pawankumar93116@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23906', 'Pradum Kumar', 1, 'pradumkr06@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23907', 'Pranav Kumar Kaushik', 1, 'meeraranjana345@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23908', 'Priyanshu Manas', 1, 'priyanshumanas1304@gmail.com', 'I K Gujral Punjab Technical University, Mohali Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23909', 'Radhika', 1, 'missradhika2002@gmail.com', 'I K Gujral Punjab Technical University, Mohali Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2390a', 'Raghav Kundra', 1, 'kundra.raghav@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2390b', 'Rahul Ranjan', 1, 'e17pk2110040@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2390c', 'Aanchal Tuteja', 1, 'aatuteja13@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2390d', 'Roshan Kumar', 1, 'roshanrana12321@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2390e', 'Rishav Raj', 1, 'rishavraj4177@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2390f', 'Ranjana Kundal', 1, 'ranjanakundal5@gmail.com', 'I K Gujral Punjab Technical University, Amritsar Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23911', 'Sachin Tyagi', 1, 'sachintyagi55555@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23912', 'Sarthak Oberoi', 1, 'sarthakoberoi80@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23913', 'Sharanjeet Sidhu', 1, 'sharansidhu48147@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23915', 'Sidhanth Pandey', 1, 'Sidhant.212.pandey@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23916', 'Siddharth Sharma', 1, 'siddharthsharmaa222@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23917', 'Sumit Kumar Jha', 1, 'jhasumitias501@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23918', 'Swaraj Swain', 1, 'swaraj.swain6365@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc23919', 'Vatsala gupta', 1, 'vatsala00000gupta@gmail.com', 'I K Gujral Punjab Technical University, Amritsar Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2391a', 'Vinayak Kamat', 1, 'vinayakkamat001@gmail.com', 'I K Gujral Punjab Technical University, Jalandhar', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation'),
('PTUc2391b', 'Suraj', 1, 'suraj158912@gmail.com ', 'I K Gujral Punjab Technical University, Hoshiarpur Campus', '2022-03-02', 'contact@mrsahil.in', 'Virtual Debate Tournament', '2022-03-15', '', 'none', 'Participation');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`) VALUES
(1, 'Sahil Kumar Deleted certificate having certificate id \"PTUba5056\" on 15-03-2022 | 02:17:12am'),
(2, 'Sahil Kumar Added new certificate having certificate id () on 15-03-2022 | 01:26:57pm'),
(3, 'Sahil Kumar Edited certificate having certificate ID (PTU0eaa83) on 15-03-2022 | 02:04:06pm'),
(4, 'Admin IKGPTU Added new certificate having certificate id () on 15-03-2022 | 03:09:24pm'),
(5, 'Sahil Kumar Added new certificate having certificate id () on 15-03-2022 | 05:55:19pm'),
(6, 'Sahil Kumar Deleted certificate having certificate id \"PTU0d8b80\" on 15-03-2022 | 05:55:35pm'),
(7, 'Sahil Kumar Added new certificate having certificate id () on 15-03-2022 | 06:08:23pm'),
(8, 'Sahil Kumar Added new certificate having certificate id () on 15-03-2022 | 06:10:35pm'),
(9, 'Sahil Kumar Edited certificate having certificate ID (PTUb2e362) on 15-03-2022 | 06:10:49pm'),
(10, 'Sahil Kumar Edited certificate having certificate ID (PTU60495c) on 15-03-2022 | 06:15:11pm'),
(11, 'Sahil Kumar Edited certificate having certificate ID (PTU1a4185) on 15-03-2022 | 06:15:22pm'),
(12, 'Sahil Kumar Added new certificate having certificate id () on 15-03-2022 | 06:19:49pm'),
(13, 'Sahil Kumar Edited certificate having certificate ID (PTU1a4185) on 15-03-2022 | 07:15:20pm'),
(14, 'Sahil Kumar Added new certificate having certificate id () on 15-03-2022 | 08:16:50pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
