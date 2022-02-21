-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 07:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookname` varchar(50) NOT NULL,
  `bookimage` varchar(50) DEFAULT NULL,
  `booktopic` varchar(50) NOT NULL,
  `bookdate` date NOT NULL,
  `bookprice` int(20) NOT NULL,
  `bookdesc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookname`, `bookimage`, `booktopic`, `bookdate`, `bookprice`, `bookdesc`) VALUES
('2123123', '2123123.jpg', 'Open this select menu', '2022-02-09', 22222222, '12121231111111111'),
('cildren book', 'cildren book.jpg', 'children', '2022-02-05', 54, 'cildren bookcildren bookcildren book'),
('education book', 'education book.jpg', 'educational', '2022-02-05', 89, 'education bookeducation bookeducation book'),
('historybook', 'historybook.jpg', 'historical', '2022-02-05', 23, 'historybookhistorybookhistorybook'),
('magic book', 'magic book.jpg', 'science', '2022-02-05', 33, 'magic bookmagic bookmagic bookmagic book');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `userimage` varchar(50) DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `useremail`, `userpassword`, `userimage`, `isadmin`) VALUES
('mohamedabdelkader', 'm@m.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mohamedabdelkader.jpg', 1),
('Mo_Abdelkader22', 'mohamedabdelkadergaballah@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Mo_Abdelkader22.jpg', 1),
('sadas', '123131@dsa.c', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'sadas.png', 1),
('spy', 'znznzn219@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'spy.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `useremail` (`useremail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
