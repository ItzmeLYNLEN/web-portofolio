-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 03:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_mdaffaa_xirpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `name`, `username`, `password`, `photo`) VALUES
(1, 'Muhammad Daffa Adz Dzikraa', 'daoa', 'zee', 'zee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `author_detail`
--

CREATE TABLE `author_detail` (
  `author_detail_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL,
  `website_url` varchar(100) NOT NULL,
  `website_domain` varchar(100) NOT NULL,
  `instagram_url` varchar(100) NOT NULL,
  `instagram_id` varchar(100) NOT NULL,
  `email_url` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_detail`
--

INSERT INTO `author_detail` (`author_detail_id`, `author_id`, `short_description`, `about`, `location`, `website_url`, `website_domain`, `instagram_url`, `instagram_id`, `email_url`, `email_address`) VALUES
(1, 1, 'Saya Seorang Junior Software Engineering', 'Saya adalah Pelajar Sekolah Menengah Kejuruan (SMK) yang memiliki ketertarikan dibidang IT. Berpengalaman dibidang Software Engineering dan Quality Assurance. Terbuka untuk peluang kerja dibidang Software Engineering dan sejenisnya.', 'Bogor, Indonesia', 'http://adzdzik.tk/', 'adzdzik.tk', 'https://www.instagram.com/dzikraa_24', 'dzikraa_24', 'mailto:m.daffa342@gmail.com', 'm.daffa342@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `description`, `category`, `start_date`, `finish_date`, `thumbnail`) VALUES
(1, 'Rental Buku', 'Website untuk merental buku', 'Website', '2023-02-01', '2023-03-09', 'perpus.png'),
(2, 'E-Booking', 'Website untuk booking tiket', 'Website', '2022-11-22', '2022-12-10', 'travel.png'),
(4, 'Pembayaran Spp', 'Aplikasi untuk membayar SPP', 'Aplikasi Desktop', '2021-12-04', '2021-12-11', 'p3 (1).png'),
(5, 'Inventory Gudang', 'Website mengecek penyimpanan', 'Website', '2022-12-03', '2022-12-04', 'p1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `author_detail`
--
ALTER TABLE `author_detail`
  ADD PRIMARY KEY (`author_detail_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author_detail`
--
ALTER TABLE `author_detail`
  MODIFY `author_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
