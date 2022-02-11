-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2022 at 11:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `alt` text NOT NULL,
  `url` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `project_id`, `alt`, `url`, `type`) VALUES
(1, 1, 'SplashScreen', 'https://play-lh.googleusercontent.com/BWsFVJiyj8c0Jw1Sy8owety6wn7mB_7rpx0-jhPdogsr-N2w6Mts63oZQY2eIPqRnQ', 1),
(2, 1, 'Home', 'https://play-lh.googleusercontent.com/4USMEdOifwO5Sp3kpYy6JlcZcPS_Re2mZq5RS2QgZJ2Jvove8pBieCmKGHG3rFnkMBqk', 1),
(3, 1, 'Filter', 'https://play-lh.googleusercontent.com/2karxc2G0uHeacbXfO_v2VHMCSJdLnLOgZ4wSjEGTHxF_uMWl_r5ud3xiHnsRLQTewk', 1),
(4, 1, 'itemDetails', 'https://play-lh.googleusercontent.com/sd5R0J2GWRfczQeJ5GaUUNHLyr0etqDbyKoSeOv3p_AYSAeHMkgmxK0FYCmjI9Vd2Q', 1),
(5, 1, 'googlePlay id', 'https://play.google.com/store/apps/details?id=com.rgf.rgootf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `protfilo_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `short_discribtion` text NOT NULL,
  `long_discribtion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `protfilo_id`, `name`, `short_discribtion`, `long_discribtion`) VALUES
(1, 1, 'RGF', 'App from scratch With Backend ', '<p>App from scratch With Backend &nbsp;</p>\r\n<p>The technology used to create the APP :</p>\r\n<p>(native with java -MVC pattern design-FireBase Services)</p>\r\n<p>The technology used to create the Backend :</p>\r\n<p>(Native PHP-Bootstrap-Css-Html-JS ES5-MySQL-JQuery)&nbsp;</p>\r\n<p>Third Part Service Used :</p>\r\n<p>(API SMS-Razorpay-onesignal-<span id=\"isPasted\" style=\'color: rgb(0, 0, 0); font-family: \"Times New Roman\"; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>FireBase-facebook&amp;google Auth Services</span>)</p>');

-- --------------------------------------------------------

--
-- Table structure for table `protiflos`
--

CREATE TABLE `protiflos` (
  `id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `covers` text NOT NULL,
  `userid` int(11) NOT NULL,
  `About` text NOT NULL,
  `Bio` text NOT NULL,
  `Edu` text NOT NULL,
  `hobbies` text NOT NULL,
  `skils` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `protiflos`
--

INSERT INTO `protiflos` (`id`, `profile`, `covers`, `userid`, `About`, `Bio`, `Edu`, `hobbies`, `skils`) VALUES
(1, 'https://cdn.dribbble.com/users/3293507/screenshots/14667603/media/d8cbe035a61f64afdf6deabca5182842.jpg', 'https://c8.alamy.com/comp/PF3NTN/desktop-source-code-and-technology-background-developer-or-programer-with-coding-and-programming-wallpaper-by-computer-language-and-source-code-com-PF3NTN.jpg', 1, 'I\'m Abdelrahman khaled Mohamed Abdelsalam software\r\ndeveloper with 2 years of experience building native and\r\nhybrid mobile apps some time worked also as backend\r\ndeveloper to makes my apps live.', 'Native App developer & backend developer at\r\nBrilliantStar Software (Indian company and agency)\r\nHierd at upwork for finsh store project idea\r\nand get good review from agency\r\nhybrid app developer (flutter)\r\n& backend developer at Remake (Egyptian\r\nstartup)\r\nAs freelancer finshed 6 tasks at\r\nMostaql and 2 at upwork with 5 stars review', 'Faculty of commerce', 'Gaming-fitness-puzzel', 'kotlin-Java-(Mvp) Flutter(dart)-(Bloc) MySQL-PHP(pure)- HTML-CSS-JS-NodeJS- MongoDB');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Abdelrhman Khaled', 'abdoelmorap@gmail.com', '$2y$10$vVx3FkhKlOPXzgrYGYksGuzN3lrZxRJAR2hiPrmPTUw1q2OqJGplm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Abdelrhman Khaled', 'abdoelmroeap@gmail.com', 'fasfasfasfasfasfasf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protiflos`
--
ALTER TABLE `protiflos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `protiflos`
--
ALTER TABLE `protiflos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
