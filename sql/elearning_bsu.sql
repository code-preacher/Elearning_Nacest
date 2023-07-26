-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 08:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning_bsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `user_id`, `password`, `phone`) VALUES
(1, 'Peter Goodnewz', 'a@a.com', 'oche', '123456', '08036474832'),
(2, 'Alex Odeh', 'alex@gmail.com', 'alex', '123456', '08035472787');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `jamb` varchar(200) NOT NULL,
  `result` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `course` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `email`, `address`, `nationality`, `jamb`, `result`, `status`, `course`, `date_created`) VALUES
(1, 'Alex Odeh', 'alex@gmail.com', 'Texas,London', 'American', '601d0edfe649d_undraw_choosing_house_v37h.png', '601d0edfe64a1_undraw_choosing_house_v37h.png', 1, 'PHYSICS', '2021-02-05 10:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(30) NOT NULL,
  `dept_name` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `date`) VALUES
(1, 'PHYSICS', '07-11-20 @ 5:12 PM'),
(2, 'CHEMISTRY', '07-11-20 @ 5:12 PM'),
(3, 'COMPUTER SCIENCE', '22-02-21 @ 8:38 AM');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(30) NOT NULL,
  `lecturer_id` int(30) NOT NULL,
  `year` varchar(30) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `q1` text NOT NULL,
  `s1` text NOT NULL,
  `q2` text NOT NULL,
  `s2` text NOT NULL,
  `q3` text NOT NULL,
  `s3` text NOT NULL,
  `q4` text NOT NULL,
  `s4` text NOT NULL,
  `q5` text NOT NULL,
  `s5` text NOT NULL,
  `total` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `lecturer_id`, `year`, `department`, `course`, `q1`, `s1`, `q2`, `s2`, `q3`, `s3`, `q4`, `s4`, `q5`, `s5`, `total`, `status`, `date_created`) VALUES
(1, 1, '2017/2018', 'PHYSICS', 'PHY101', 'mechanism goal', '15', 'types of energy', '15', 'Discuss radiation', '20', 'Proof Themostat math equation', '25', 'Proof Chi square math equation', '25', 100, 1, '2021-09-11 10:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answer`
--

CREATE TABLE `exam_answer` (
  `id` int(30) NOT NULL,
  `exam_id` int(30) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `a1` text NOT NULL,
  `s1` text NOT NULL,
  `a2` text NOT NULL,
  `s2` text NOT NULL,
  `a3` text NOT NULL,
  `s3` text NOT NULL,
  `a4` text NOT NULL,
  `s4` text NOT NULL,
  `a5` text NOT NULL,
  `s5` text NOT NULL,
  `total` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_answer`
--

INSERT INTO `exam_answer` (`id`, `exam_id`, `student_id`, `a1`, `s1`, `a2`, `s2`, `a3`, `s3`, `a4`, `s4`, `a5`, `s5`, `total`, `status`, `date_created`) VALUES
(2, 1, 'BSU/DIST/71946', 'hello', '11', 'hi', '10', 'guy', '16', 'howfa', '20', 'dude', '13', 70, 1, '2021-09-11 18:38:19'),
(3, 3, 'BSU/DIST/71946', 'hello', '', 'hi', '', 'guy', '', 'howfa', '', 'dude', '', 0, 1, '2021-09-11 18:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(30) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `message`, `date`) VALUES
(1, 'White Kate Caro(Student)', 'hello\r\n\r\n                                                                                               ', '07-11-20 @ 6:17 PM'),
(2, 'Admin', 'hy,any complain                                                    ', '28-01-21 @ 8:55 AM');

-- --------------------------------------------------------

--
-- Table structure for table `learning_content`
--

CREATE TABLE `learning_content` (
  `id` int(30) NOT NULL,
  `content_name` text NOT NULL,
  `document` varchar(200) NOT NULL,
  `audio` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `syllabus_id` int(30) NOT NULL,
  `lecturer_id` int(2) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learning_content`
--

INSERT INTO `learning_content` (`id`, `content_name`, `document`, `audio`, `video`, `department`, `syllabus_id`, `lecturer_id`, `date`) VALUES
(1, 'PHY101', 'PHY101_Kinetic,Motion_5fa6f7f5f23cc_ABIGAIL ADELEKE.pdf', 'PHY101_Kinetic,Motion_5fa6f7f5f23d6_45_AM-_hymn)(256k).mp3', 'PHY101_Kinetic,Motion_5fa6f7f5f23d8_Laravel_custom_login_and_redirects_for_multiple_roles(360p).mp4', 'PHYSICS', 2, 1, '07-11-20 @ 8:39 PM'),
(3, 'CMP422 ,INTRODUCTION TO PHP', 'CMP422 ,INTRODUCTION TO PHP_php syntax,php keyword_6033621011fec_CCCRN GRACIOUS GLOBAL TELECOMMUNICATION LTD 1.pdf', 'CMP422 ,INTRODUCTION TO PHP_php syntax,php keyword_6033621011ff4_14 You Hold Me Now.mp3', 'CMP422 ,INTRODUCTION TO PHP_php syntax,php keyword_6033621011ff6_1f83403a873f47df91a3ef7468d58be0.mp4', 'COMPUTER SCIENCE', 5, 2, '22-02-21 @ 8:49 AM'),
(4, 'INtroduction to css', 'INtroduction to css_keyword,datatype_6033728436cb1_AGWUNCHA-JULIET.pdf', 'INtroduction to css_keyword,datatype_6033728436cb9_axwell_ingrosso_dreamer_official_video_ft._trevor_guthrie_ft._trevor_guthrie_mp3_62973.mp3', 'INtroduction to css_keyword,datatype_6033728436cbc_2df972d76b9242cfac7403b1cf683c80.mp4', 'COMPUTER SCIENCE', 6, 2, '22-02-21 @ 9:59 AM');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(30) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `hobby` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `fname`, `mname`, `sname`, `address`, `phone`, `gender`, `dob`, `religion`, `hobby`, `image`, `email`, `password`, `department`, `level`, `date`) VALUES
(1, 'Bola', 'Seyi', 'Ade', 'Oyo', '08133451436', 'FEMALE', '1989-06-07', 'CHRISTIANITY', 'singing', '5fa6c7f15c41b_IMG-20200606-WA0011.jpg', 'b@b.com', '123456', 'PHYSICS', 'lecturer', '07-11-20 @ 5:14 PM'),
(2, 'Samera', 'yy', 'igiy', 'uiy', '08136473738', 'FEMALE', '2222-02-22', 'CHRISTIANITY', 'singing', '60335fae582e6_mypicx.jfif', 'z@z.com', '123456', 'COMPUTER SCIENCE', 'lecturer', '22-02-21 @ 8:39 AM');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(30) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `year` varchar(30) NOT NULL,
  `ref` varchar(200) NOT NULL,
  `matno` varchar(200) NOT NULL,
  `status` varchar(2) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `amount`, `year`, `ref`, `matno`, `status`, `date`) VALUES
(2, '300000', '2017/2018', 'bdfb0f07c84c817ba2dd', 'BSU/DIST/0', '1', '10-11-20 @ 12:08 PM'),
(3, '400000', '2018/2019', 'f71f9aca33d03251c397', 'BSU/DIST/0', '0', '10-11-20 @ 12:09 PM'),
(4, '45000', '2017/2018', '54775d5e6455f1c6df38', 'BSU/DIST/71946', '1', '22-02-21 @ 7:08 AM'),
(5, '70000', '2020/2021', '57448f1b35a9a238c61c', 'BSU/DIST/115191', '1', '22-02-21 @ 8:45 AM');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(30) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `department` varchar(30) NOT NULL,
  `year` varchar(30) NOT NULL,
  `gp` varchar(30) NOT NULL,
  `gp_type` varchar(30) NOT NULL,
  `issue` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `department`, `year`, `gp`, `gp_type`, `issue`, `date_created`) VALUES
(3, 'BSU/DIST/71946', 'PHYSICS', '2017/2018', '3.21', 'Upper Credit', 'no issue', '2021-09-11 23:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `session_log`
--

CREATE TABLE `session_log` (
  `id` int(30) NOT NULL,
  `level` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL,
  `device` varchar(200) NOT NULL,
  `status` varchar(2) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_log`
--

INSERT INTO `session_log` (`id`, `level`, `fullname`, `user_id`, `password`, `login_time`, `logout_time`, `device`, `status`, `date`) VALUES
(1, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '6:16 PM', '6:18 PM', 'DESKTOP-V6MC5VA', '0', '07/11/20'),
(2, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '6:27 PM', '9:04 PM', 'DESKTOP-V6MC5VA', '0', '07/11/20'),
(3, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '6:32 AM', '11:36 PM', 'DESKTOP-V6MC5VA', '0', '09/11/20'),
(4, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '10:45 AM', '11:29 AM', 'DESKTOP-V6MC5VA', '0', '10/11/20'),
(5, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '12:12 PM', '', 'DESKTOP-V6MC5VA', '1', '10/11/20'),
(6, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '1:22 AM', '2:33 AM', 'DESKTOP-V6MC5VA', '0', '11/11/20'),
(7, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '7:59 PM', '9:15 PM', 'DESKTOP-V6MC5VA', '0', '14/11/20'),
(8, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '8:41 PM', '8:46 PM', 'DESKTOP-V6MC5VA', '0', '14/11/20'),
(9, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '9:09 PM', '9:15 PM', 'DESKTOP-V6MC5VA', '0', '14/11/20'),
(10, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '9:13 PM', '9:15 PM', 'DESKTOP-V6MC5VA', '0', '14/11/20'),
(11, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '8:56 AM', '9:27 AM', 'DESKTOP-3MUDN68', '0', '28/01/21'),
(12, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '9:10 AM', '9:16 AM', 'DESKTOP-3MUDN68', '0', '28/01/21'),
(13, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '9:16 AM', '9:27 AM', 'DESKTOP-3MUDN68', '0', '28/01/21'),
(14, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '1:10 PM', '', 'CODE-PREACHER', '1', '01/02/21'),
(15, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '12:29 PM', '12:35 PM', 'CODE-PREACHER', '0', '05/02/21'),
(16, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '12:33 PM', '12:35 PM', 'CODE-PREACHER', '0', '05/02/21'),
(17, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '6:51 AM', '7:04 AM', 'CODE-PREACHER', '0', '22/02/21'),
(18, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '7:07 AM', '7:12 AM', 'CODE-PREACHER', '0', '22/02/21'),
(19, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '7:08 AM', '7:12 AM', 'CODE-PREACHER', '0', '22/02/21'),
(20, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '8:40 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(21, 'lecturer', 'igiy yy Samera', 'z@z.com', '123456', '8:41 AM', '10:02 AM', 'CODE-PREACHER', '0', '22/02/21'),
(22, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '8:42 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(23, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '8:45 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(24, 'lecturer', 'igiy yy Samera', 'z@z.com', '123456', '8:47 AM', '10:02 AM', 'CODE-PREACHER', '0', '22/02/21'),
(25, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '8:49 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(26, 'lecturer', 'igiy yy Samera', 'z@z.com', '123456', '8:50 AM', '10:02 AM', 'CODE-PREACHER', '0', '22/02/21'),
(27, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '8:54 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(28, 'lecturer', 'igiy yy Samera', 'z@z.com', '123456', '9:57 AM', '10:02 AM', 'CODE-PREACHER', '0', '22/02/21'),
(29, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '9:59 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(30, 'lecturer', 'igiy yy Samera', 'z@z.com', '123456', '10:02 AM', '10:02 AM', 'CODE-PREACHER', '0', '22/02/21'),
(31, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '10:02 AM', '10:06 AM', 'CODE-PREACHER', '0', '22/02/21'),
(32, 'student', 'White Kate Caro', 'BSU/DIST/0', '123456', '12:19 PM', '12:20 PM', 'CODE-PREACHER', '0', '25/03/21'),
(33, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '6:22 PM', '', 'CODE-PREACHER', '1', '14/04/21'),
(34, 'lecturer', 'igiy yy Samera', 'z@z.com', '123456', '8:28 PM', '8:29 PM', 'CODE-PREACHER', '0', '27/04/21'),
(35, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '1:25 PM', '1:52 PM', 'CODE-PREACHER', '0', '10/09/21'),
(36, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '1:55 PM', '2:00 PM', 'CODE-PREACHER', '0', '10/09/21'),
(37, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '10:18 AM', '3:43 PM', 'CODE-PREACHER', '0', '11/09/21'),
(38, 'student', 'h kni Yusuf', 'BSU/DIST/115191', '123456', '3:43 PM', '3:43 PM', 'CODE-PREACHER', '0', '11/09/21'),
(39, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '3:43 PM', '9:49 PM', 'CODE-PREACHER', '0', '11/09/21'),
(40, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '4:23 PM', '9:49 PM', 'CODE-PREACHER', '0', '11/09/21'),
(41, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '9:49 PM', '', 'CODE-PREACHER', '1', '11/09/21'),
(42, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '12:20 AM', '2:02 AM', 'CODE-PREACHER', '0', '12/09/21'),
(43, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '12:56 AM', '1:59 AM', 'CODE-PREACHER', '0', '12/09/21'),
(44, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '1:45 AM', '1:59 AM', 'CODE-PREACHER', '0', '12/09/21'),
(45, 'lecturer', 'Ade Seyi Bola', 'b@b.com', '123456', '1:57 AM', '1:59 AM', 'CODE-PREACHER', '0', '12/09/21'),
(46, 'student', 'Lex Ogbu Alex', 'BSU/DIST/71946', '123456', '1:59 AM', '2:02 AM', 'CODE-PREACHER', '0', '12/09/21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(30) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `hobby` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `matno` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `mname`, `sname`, `address`, `phone`, `gender`, `dob`, `religion`, `hobby`, `image`, `matno`, `email`, `password`, `department`, `level`, `year`, `date`) VALUES
(1, 'Caro', 'Kate', 'White', 'Houston', '07033451436', 'FEMALE', '2020-11-28', 'CHRISTIANITY', 'travelling', '5fa6c84fe8d39_IMG-20200606-WA0012.jpg', 'BSU/DIST/0', 'c@c.com', '123456', 'PHYSICS', 'student', '2017/2018', '07-11-20 @ 5:16 PM'),
(2, 'Alex', 'Ogbu', 'Lex', 'London', '08136473738', 'MALE', '2222-02-22', 'CHRISTIANITY', 'Reading', '60334a20d44a3_delight birthday.png', 'BSU/DIST/71946', 'o@o.com', '123456', 'PHYSICS', 'student', '2017/2018', '22-02-21 @ 7:07 AM'),
(3, 'Yusuf', 'kni', 'h', 'iih', '08136473738', 'MALE', '2222-02-22', 'CHRISTIANITY', 'Reading', '60335fd8c25ba_delight birthday.png', 'BSU/DIST/115191', 'y@y.com', '123456', 'COMPUTER SCIENCE', 'student', '2020/2021', '22-02-21 @ 8:40 AM');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(30) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `sender`, `message`, `date`) VALUES
(1, 'b@b.com', 'i order for coke 50cl but got coke 75cl , how to i change it..\r\n\r\n                                                                                               ', '21-08-19 @ 12:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(30) NOT NULL,
  `coursename` varchar(200) NOT NULL,
  `syllabus` text NOT NULL,
  `year` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `lecturer_id` int(10) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `coursename`, `syllabus`, `year`, `department`, `lecturer_id`, `date`) VALUES
(2, 'PHY101', 'Kinetic,Motion', '2015/2016', 'PHYSICS', 1, '07-11-20 @ 6:56 PM'),
(3, 'PHY102', 'Gravity', '2017/2018', 'PHYSICS', 1, '07-11-20 @ 6:56 PM'),
(4, 'PHY105', 'Practical themodynamics', '2017/2018', 'PHYSICS', 1, '07-11-20 @ 6:56 PM'),
(5, 'CMP422 ,INTRODUCTION TO PHP', 'php syntax,php keyword', '2020/2021', 'COMPUTER SCIENCE', 2, '22-02-21 @ 8:42 AM'),
(6, 'INtroduction to css', 'keyword,datatype', '2020/2021', 'COMPUTER SCIENCE', 2, '22-02-21 @ 9:58 AM');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_event_department`
--

CREATE TABLE `upcoming_event_department` (
  `id` int(30) NOT NULL,
  `department` varchar(200) NOT NULL,
  `information` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming_event_department`
--

INSERT INTO `upcoming_event_department` (`id`, `department`, `information`, `date_created`) VALUES
(2, '0', 'Hi', '2021-09-10 11:17:51'),
(3, '0', 'Hi', '2021-09-10 11:17:51'),
(5, 'PHYSICS', 'Hello sam', '2021-09-10 11:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_event_general`
--

CREATE TABLE `upcoming_event_general` (
  `id` int(30) NOT NULL,
  `information` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming_event_general`
--

INSERT INTO `upcoming_event_general` (`id`, `information`, `date_created`) VALUES
(2, 'Hi', '2021-09-10 11:17:51'),
(3, 'Hi', '2021-09-10 11:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(30) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `password`, `level`) VALUES
(1, 'b@b.com', '123456', 'lecturer'),
(2, 'BSU/DIST/0', '123456', 'student'),
(3, 'BSU/DIST/71946', '123456', 'student'),
(4, 'z@z.com', '123456', 'lecturer'),
(5, 'BSU/DIST/115191', '123456', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_answer`
--
ALTER TABLE `exam_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_content`
--
ALTER TABLE `learning_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_log`
--
ALTER TABLE `session_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming_event_department`
--
ALTER TABLE `upcoming_event_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming_event_general`
--
ALTER TABLE `upcoming_event_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_answer`
--
ALTER TABLE `exam_answer`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learning_content`
--
ALTER TABLE `learning_content`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session_log`
--
ALTER TABLE `session_log`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upcoming_event_department`
--
ALTER TABLE `upcoming_event_department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upcoming_event_general`
--
ALTER TABLE `upcoming_event_general`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
