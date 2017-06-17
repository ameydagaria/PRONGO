-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 08:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prongo`
--

-- --------------------------------------------------------

--
-- Table structure for table `abc2_uploads_table`
--

CREATE TABLE `abc2_uploads_table` (
  `project_title` varchar(20) DEFAULT NULL,
  `project_technology` varchar(50) DEFAULT NULL,
  `project_abstract` varchar(300) DEFAULT NULL,
  `project_courses` varchar(50) NOT NULL,
  `project_file_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc2_uploads_table`
--

INSERT INTO `abc2_uploads_table` (`project_title`, `project_technology`, `project_abstract`, `project_courses`, `project_file_path`) VALUES
('project1', 'php', 'ecommerce website', '', 'project_uploads/FORM.html'),
('project2', 'java', 'cart script', '', 'project_uploads/FORM.html'),
('social networking ', 'php,java,mysql', 'its a social networking app', '', ''),
('social networking ', 'php,java,mysql', 'its a social networking app', '', 'project_uploads/FORM.html'),
('social networking ', 'php,java,mysql', 'its a social networking app', '', 'project_uploads/FORM.html'),
('weddingz', 'php,mysql,javascript', 'online platform to book wedding vendors', '', 'project_uploads/FORM.html'),
('flipkart', 'php,mysql,javascript', 'ecommerce website', '', 'project_uploads/FORM.html'),
('project 4', 'java,python,nodejs', 'recommendation engine', 'cs,it', 'project_uploads/5b75ddc3345549018b5feac0f2296235.j');

-- --------------------------------------------------------

--
-- Table structure for table `project_upload_table`
--

CREATE TABLE `project_upload_table` (
  `user_email` varchar(20) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `project_title` varchar(20) NOT NULL,
  `project_technology` varchar(20) NOT NULL,
  `project_abstract` varchar(300) NOT NULL,
  `project_courses` varchar(50) NOT NULL,
  `project_file_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_upload_table`
--

INSERT INTO `project_upload_table` (`user_email`, `user_name`, `project_title`, `project_technology`, `project_abstract`, `project_courses`, `project_file_path`) VALUES
('abc2@gmail.com', '', 'social networking ', '0', '0', '', '0'),
('abc2@gmail.com', '', 'weddingz', '0', '0', '', '0'),
('abc2@gmail.com', '', 'flipkart', 'php,mysql,javascript', 'ecommerce website', '', 'project_uploads/FORM.html'),
('abc2@gmail.com', '', 'project 4', 'java,python,nodejs', '', 'project_courses', 'project_uploads/5b75ddc3345549018b5feac0f2296235.j');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `name_user` varchar(20) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password_user` varchar(30) NOT NULL,
  `profilephoto_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`name_user`, `email_user`, `password_user`, `profilephoto_user`) VALUES
('aashray pandya', 'aashryap@gmail.com', '1234', ''),
('abc2', 'abc2@gmail.com', '1234', 'profile_photo/5b75ddc3345549018b5feac0f2296235.jpg'),
('abc', 'abc@gmail.com', 'abc', 'profile_photo/5b75ddc3345549018b5feac0f2296235.jpg'),
('amay dagaria', 'amaydagaria@gmail.com', '1234', 'profile_photo/saree.jpg'),
('vivek mishra', 'vivekmishra@gmail.com', '1234', 'profile_photo/5b75ddc3345549018b5feac0f2296235.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`email_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
