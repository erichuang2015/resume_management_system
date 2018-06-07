-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2016 at 10:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `profid` int(4) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `statement` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `education` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `uid`, `profid`, `nationality`, `address`, `statement`, `skills`, `experience`, `education`) VALUES
(0, 4, 2, 'Bangladeshi', 'Phone number needed', 'nothing to sayh', 'kichu kaj kore na kano', 'kaj kori na', 'ssc,hsc,bsc'),
(3, 7, 2, 'Bangladeshi', 'house:18, Nikunka 2, Dhaka-1212,   hello again', 'I am Mahbub, am from Dhaka Bangladesh, I am  a php programmer  ', 'php, javascript, sql, mysql', 'Dexter web development company limiter \r\nSenior Developer 2014-2017', 'BSc American International University Bangladesh , 2010-2013\r\nMSc, Pardue University 2014-2015 '),
(5, 8, 1, 'Dhakaiya', 'nai', 'kichu na', 'new skill it got', 'yes work till eternity to eternity', 'test need to study sqt'),
(6, 6, 3, 'Ban', ' Nikunjo dfgfd', ' Ggjgjgsj ', 'sdsds', 'sdfsdvdc', 'vdfcx'),
(7, 10, 3, 'Venus', 'hosue 100, Nikunja-2, Dhaka 1212, Bangladesh   ', 'I am ishraq  editing', 'networking, databse , programming, and sleeping of course', 'none, have some in girlfriend department', 'MSc, Italy\r\nBSc, AIUB\r\nSSC, Comilla\r\nHSC, Dhaka'),
(8, 5, 4, 'Uganda', 'Khilkhet, dhaka Khilgao, han tan uash uash zip 136546', 'ki jani na', 'onek skill vai ki raikkha ki koi', 'onek kaj korchi ekhon mone portache na', 'koto je masters , bsc , koto kihcu je porchi'),
(9, 11, 2, 'Bangladeshi', 'House:37,Road:18,Nikunja-2,Khilkhet, Dhaka 1212', 'Hello I am Apu Sarafat Hossain from Dhaka Bangladesh, Currntly Studying in American International University Bangladesh, Banani, Dhaka.\r\nI am a student of Softare Engineering Faculty', 'Programming with: C,C++,JAVA,C#,Python,PHP,\r\nScripting with: Javascript,CoffeeScript\r\nMarkup and Design: HTML,xHTML,XML,CSS,CSS3\r\nOperating System: Ubuntu,Kali,Windows 7,8,8.1,10,xp\r\nIDE: Visual Studio, Codeblocks, NetBeans', 'I have worked on various school projects and some projects of my personal interests.', 'BSc in SE (2013-2017)(ongoing)\r\nAmerican International University Bangladesh(AIUB)\r\nHSC, Science Faculty (2010-2012)\r\nMilestone College Uttara,Dhaka,Bangladesh\r\nSSC, Science Faculty (2008-2010)\r\nBoardbazar High School,Gazipur,Dhaka,Bangladesh'),
(10, 12, 2, 'Bangladeshi', 'House#58,Road#4,Dakshin Mollartek,Dakshin Khan,Dhaka.', 'I love Real Madrid,I live Real Madrid.', 'C,C++,C#,Java,PHP,Javascript,Python,Rubi,Pearl', 'InfoSys 2009-2010,DataSoft2010-2011,SoulShare2011-2012,MuktaSoftware2012-Present', 'AIUB,BSc.CSE');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `id` int(10) NOT NULL,
  `profname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `profname`) VALUES
(1, 'Teacher'),
(2, 'Computer Programmer'),
(3, 'Electrical Engineer'),
(4, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `gender`, `age`, `email`, `password`) VALUES
(4, 'Protick', 'Roy', 'male', 22, 'protick1994@gmail.com', 'Protick1'),
(5, 'test', 'redirect', 'male', 100, 'test@demo.com', 'Test1234'),
(6, 'Akash', 'Islam', 'male', 22, 'islam@gmail.com', 'Password123'),
(7, 'Mahbub', 'Habib', 'male', 25, 'mahbub@email.com', 'Mahbub123'),
(8, 'Another', 'Test', 'male', 25, 'test@gmail.com', 'Test1234'),
(9, 'Akash', 'Khan', 'male', 25, 'akash@gmail.com', 'Akash123'),
(10, 'Ishraq', 'Haque', 'male', 22, 'ishraq@email.com', 'Ishraq123'),
(11, 'Apu', 'Sarafat', 'male', 22, 'apu@email.com', 'Apus1234'),
(12, 'Sifat', 'Jasim', 'male', 21, 'sifat140693@gmail.com', 'S140693khan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `profid` (`profid`),
  ADD KEY `uid_2` (`uid`),
  ADD KEY `uid_3` (`uid`),
  ADD KEY `profid_2` (`profid`),
  ADD KEY `profid_3` (`profid`),
  ADD KEY `profid_4` (`profid`),
  ADD KEY `uid_4` (`uid`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_profession_fk` FOREIGN KEY (`profid`) REFERENCES `profession` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `details_user_fk` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
