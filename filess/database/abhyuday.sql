-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 04:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abhyuday`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_scholarship`
--

CREATE TABLE `applied_scholarship` (
  `id` int(10) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `scholarship_n` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_scholarship`
--

INSERT INTO `applied_scholarship` (`id`, `user_name`, `scholarship_n`) VALUES
(1, 'riya_', 5),
(2, 'riya_', 5);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `Course_Description` varchar(100) DEFAULT NULL,
  `course_duration` varchar(10) DEFAULT NULL,
  `course_link` varchar(100) DEFAULT NULL,
  `course_fees` int(10) DEFAULT NULL,
  `applicable_for` varchar(100) DEFAULT NULL,
  `Flag` int(10) NOT NULL DEFAULT 0,
  `user_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `Course_Description`, `course_duration`, `course_link`, `course_fees`, `applicable_for`, `Flag`, `user_name`) VALUES
(18, 'Management and accounting', 'Commerce, accounting, banking and management streams are very efficient for people who have disabili', '8 hrs', 'https://www.youtube.com/embed/9VAaqZxbLTQ', 2000, 'Dumb', 1, 'aniket_'),
(19, 'special computer training to dumb', 'special computer training to dumb and deaf Students', '5 hrs', 'https://www.youtube.com/embed/8v8pIq1daOM', 1200, 'Dumb', 1, 'aniket_'),
(20, 'Best Personal Development Course || Self Improvement', 'Best Personal Development Course || Self Improvement', '56 hrs', 'https://www.youtube.com/embed/U1u-uUcrnnA', 0, 'Dumb', 1, 'aniket_'),
(21, 'Coding', 'Aspirants who have a niche for coding and development work', '44', 'https://www.youtube.com/embed/_uQrJ0TkZlc', 1000, 'Dumb', 1, 'divya_'),
(22, 'coding development', 'Aspirants who have a niche for coding and development work can take up Computer Science Engineering ', '22 hrs', 'https://www.youtube.com/embed/MVxYqe9Ul4Q', 0, 'Handicapped', 1, 'divya_'),
(23, 'Fahion designing', 'Designing courses are very popular among the students who aspire to be in creative fields in work. T', '8 hrs', 'https://www.youtube.com/embed/sLkz3ZP9EUQ', 0, 'Handicapped', 1, 'divya_'),
(24, 'Animation ', 'A VFX artist, animator and graphic designer must be very creative and have that visual prospect of t', '23 hrs', 'https://www.youtube.com/embed/Yy278Q4smxQ', 3500, 'Handicapped', 1, 'divya_'),
(25, 'Management and accounting', 'Commerce, accounting, banking and management streams are very efficient for people who have disabili', '8', 'https://www.youtube.com/embed/9VAaqZxbLTQ', 2000, 'Handicapped', 0, 'divya_'),
(26, 'Indian Sign Language', 'Indian Sign Language', '8', 'https://www.youtube.com/embed/KebGAnT85v', 2000, 'Deaf', 0, 'divya_'),
(27, 'ITI Courses for deaf', 'ITI Courses for deaf', '5 hrs', 'https://www.youtube.com/embed/OK7ppVdau8M', 3500, 'Deaf', 1, 'divya_'),
(28, 'Teaching Math to Blind Students ', 'Teaching Math to Blind Students 2', '10 hrs', 'https://www.youtube.com/embed/veRPLYCe1Dw', 1200, 'Blind', 1, 'divya_'),
(29, 'BASIC COMPUTER KNOWLEDGE FOR BLIND PERSONS', 'BASIC COMPUTER KNOWLEDGE FOR BLIND PERSONS', '55', 'https://www.youtube.com/embed/oXjbL9MHlys', 4500, 'Blind', 0, 'divya_'),
(30, 'Learn Braille In One Lesson', 'Learn Braille In One Lesson', '31 hrs', 'https://www.youtube.com/embed/sqQ3gdE7ks0', 4500, 'Blind', -1, 'aniket_'),
(31, 'Learn the basics of touch typing with KeyBlaze', 'Learn the basics of touch typing with KeyBlaze', '3 rs', 'https://www.youtube.com/embed/2S3lhm8LaZo', 1000, 'Blind', 0, 'aniket_'),
(32, 'Deaf Business Training - Online Course Instructions', 'Deaf Business Training - Online Course Instructions', '5 hrs', 'https://www.youtube.com/embed/qSw4YlXMBK8', 4500, 'Deaf', 0, 'aniket_');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `adhar` text DEFAULT NULL,
  `disable` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_name`, `profile`, `adhar`, `disable`) VALUES
(61, 'riya_', 'b.jpg', NULL, NULL),
(63, 'rushikesh_', 'c.jpg', NULL, NULL),
(64, 'parth_', 'd.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(20) NOT NULL,
  `pnameOfSchool` text DEFAULT NULL,
  `ppercentage` text DEFAULT NULL,
  `nnameOfSchool` text DEFAULT NULL,
  `nclass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `pnameOfSchool`, `ppercentage`, `nnameOfSchool`, `nclass`) VALUES
(1, 'kvsc', '100', 'vit', '2year');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `course_n` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`id`, `user_name`, `course_n`) VALUES
(1, 'riya_', 18),
(3, 'riya_', 19),
(4, 'riya_', 21),
(52, 'parth_', 18),
(60, 'parth_', 23),
(61, 'rushikesh_', 18),
(62, 'rushikesh_', 21),
(63, 'rushikesh_', 24),
(64, 'rushikesh_', 20),
(65, 'rushikesh_', 21),
(66, 'rushikesh_', 24),
(67, 'rushikesh_', 27),
(68, 'riya_', 24),
(69, 'riya_', 22),
(70, 'riya_', 23),
(72, 'riya_', 18),
(73, 'aniket_', 18),
(74, 'riya_', 18);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_info`
--

CREATE TABLE `instructor_info` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobno` int(12) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name_of_organization` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor_info`
--

INSERT INTO `instructor_info` (`id`, `fname`, `lname`, `state`, `country`, `gender`, `email`, `mobno`, `user_name`, `password`, `name_of_organization`, `designation`) VALUES
(13, 'aniket', 'verma ', 'madhya pradesh', 'India', 'M', 'aniket@gmail.com', 1111111111, 'aniket_', '201e9f52140d38fcde369fa15bd39d39', 'VIT', 'Professor'),
(14, 'divya', 'ahmed', 'Telangana', 'India', 'F', 'divya@gmail.com', 444444444, 'divya_', 'e8c08be3bcc9b43f9eb4b406938b3c95', 'MIT', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) NOT NULL,
  `name_of_company` text DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `job_description` mediumtext DEFAULT NULL,
  `skills_required` varchar(50000) DEFAULT NULL,
  `applicable_for` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `Stipend` varchar(50) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `flag` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name_of_company`, `designation`, `job_description`, `skills_required`, `applicable_for`, `location`, `Stipend`, `last_date`, `link`, `user_name`, `flag`) VALUES
(9, 'Aria Telecom Solutions Pvt. Ltd.', 'Salesman', 'Telecaller        					\r\n-Should have good communication skills			\r\n-Should know communication basics and customer care			\r\n-Have to tell customers about schemes and solve queries			', '-Should know communication basics and customer care', 'Handicapped', 'Gaziyaabad', '10000', '2020-11-29', 'http://www.ariasolutions.net/call-center-headset.html', 'aniket_', 1),
(10, 'National Institute of Speech & Hearing', ' Lecturer ', 'lecturer', 'mathematics technology', 'Handicapped', 'NISH Road, Sreekaryam , Thiruvananthapuram , Kerala 695017				', '100000', '2020-12-26', 'http://www.nish.ac.in/', 'aniket_', 1),
(11, 'Desh Bhagat University', 'RJ', 'Radio Jockey	\r\n-Should have good communication and entertainment skills	\r\n-Should know communication basics and radio.	\r\n-Should have good voice skills	', 'Should know communication basics and radio.	\r\n-Should have good voice skills	', 'Handicapped', 'pune', '5000', '2021-01-03', 'http://deshbhagatuniversity.in/Careers', 'aniket_', -1),
(13, 'Deputy Librarian, Assistant Registrar and more Vacancies', 'Librarian', 'Central University of Gujarat Recruitment 2020 - Deputy Librarian, Assistant Registrar and more Vacancies - ', 'Management', 'All', 'Gujrat', '7500', '2020-12-27', 'https://www.fresherslive.com/job-alert/central-university-of-gujarat-jobs-2020-nine-deputy-librarian', 'divya_', 0),
(14, 'Junior Medical Lab Technologist', 'Technologist', 'Junior Medical Lab Technologist', 'Technician', 'Deaf', 'Delhi', '10000', '2020-12-26', 'https://deafjobsworld.com/content/junior-medical-lab-technologist', 'divya_', 0),
(15, 'Graphic Designing and Video Compositing', 'Designer', 'Graphic Designing and Video Compositing', 'Designing', 'Dumb', 'Mumbai', '5000', '2020-12-27', 'https://www.monsterindia.com/job/graphic-designing-and-video-compositing-aspirealty-hyderabad-secund', 'divya_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `id` int(10) NOT NULL,
  `name_of_scholarship` varchar(500) DEFAULT NULL,
  `scholarship_description` varchar(10000) DEFAULT NULL,
  `condition_for_applying` text DEFAULT NULL,
  `applicable_for` varchar(50) NOT NULL,
  `scholarship_link` mediumtext DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `flag` int(8) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`id`, `name_of_scholarship`, `scholarship_description`, `condition_for_applying`, `applicable_for`, `scholarship_link`, `last_date`, `user_name`, `flag`) VALUES
(5, ' SCHOLARSHIP FOR VISUALLY IMPAIRED ', 'Cognizant Foundation believes  in making the differently-abled students well educated and economical ', 'income less than 8 lakhs ', 'Blind', 'http://www.cognizantfoundation.org/scholarship-for-graduate-study-in-special-education.html', '2020-11-27', 'divya_', 1),
(6, 'National Handicapped Finance and Development Corpooration', 'These scholarships will be available for studies in India, for all differently-abled students ', 'income less than 3 lakhs ', 'Blind', 'http://www.nhfdc.nic.in/scholarship.html', '2020-11-21', 'divya_', 0),
(7, 'National Handicapped Finance and Development Corpooration', 'These scholarships will be available for studies in India, for all differently-abled students', 'income less than 3 lakhs ', 'Deaf', 'http://www.nhfdc.nic.in/scholarship.html', '2020-11-21', 'divya_', 1),
(8, 'National Handicapped Finance and Development Corpooration', 'These scholarships will be available for studies in India, for all differently-abled students ', 'income less than 3 lakhs ', 'Dumb', 'http://www.nhfdc.nic.in/scholarship.html', '2020-11-21', 'divya_', 0),
(9, 'National Handicapped Finance and Development Corpooration', 'These scholarships will be available for studies in India, for all differently-abled students ', 'income less than 3 lakhs ', 'Dumb', 'http://www.nhfdc.nic.in/scholarship.html', '2020-11-21', 'divya_', 0),
(10, 'Post Matric Scholarship for Students with Disabilities', 'The scheme has been introduced by the Government of India with an objective to provide the opportunities', 'for students of age 8 and above', 'Blind', 'https://www.buddy4study.com/scholarship/post-matric-scholarship-for-students-with-disabilities', '2021-01-03', 'aniket_', -1),
(11, 'AG Bell College Scholarship Program', 'As an extremely competitive merit-based program sponsored by the Alexander Graham Bell Association for the Deaf and Hard of Hearing, the AG Bell College Scholarship is granted annually for up to $10,000 to full-time hearing impaired students who are pursuing bachelor’s or master’s degrees at accredited institutions. Applicants must have bilateral hearing loss in the moderately severe to profound range, have been diagnosed before their fourth birthday, and carry a minimum GPA of 3.25 or higher.', 'for students of age 8 and above and income less than 4 lakh', 'Deaf', 'http://www.listeningandspokenlanguage.org/Document_id_266.html', '2020-12-26', 'aniket_', 0),
(12, 'Help America Hear Scholarship', 'Created by the Foundation for Sight and Sound (FSS), the Help America Hear Scholarship provides $500 in tuition assistance with two state-of-the-art ReSound Hearing Aids to graduating high school seniors with significant hearing loss who are furthering their studies in college or vocational school. Applicants must write a one to two-page essay discussing the challenges they’ve experienced as a hearing impaired student and how hearing aids will increase their ability to learn.', 'for students of age 8 and above and income less than 4 lakh', 'Deaf', 'http://www.foundationforsightandsound.org/national-scholarships.php', '2020-12-03', 'aniket_', 0),
(13, 'Sertoma Hard of Hearing or Deaf Scholarship', 'Since its inception in 1994, the Sertoma Hard of Hearing or Deaf Scholarship has provided $1,000to cover the tuition costs of pursuing a bachelor’s degree at an accredited U.S. college for individuals with at least 40dB bilateral hearing loss verified on audiogram. Qualified candidates must be U.S. citizens, be enrolling full-time, have a minimum cumulative GPA of 3.25 or higher, submit two letters of recommendation, and write a 500-word personal statement describing their educational goals.', 'income less than 8 lakhs ', 'All', 'http://www.foundationforsightandsound.org/national-scholarships.php', '2021-02-07', 'aniket_', 0),
(14, 'icro Financing Scheme', 'icro Financing Scheme', 'income less than 3 lakhs ', 'Dumb', 'https://www.buddy4study.com/article/top-scholarships-for-students-with-disability', '2020-12-15', 'aniket_', 0),
(15, 'icro Financing Scheme', 'icro Financing Scheme', 'income less than 3 lakhs ', 'Dumb', 'https://www.buddy4study.com/article/top-scholarships-for-students-with-disability', '2020-12-15', 'aniket_', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `disability` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `mobno` int(11) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `fname`, `lname`, `dob`, `state`, `country`, `gender`, `disability`, `email`, `mobno`, `user_name`, `password`) VALUES
(45, 'parth', 'aggarwal', '2020-11-13', 'kerla', 'India', 'M', 'Physically_Disability', 'parth@gmail.com', 4444444, 'parth_', 'cfb24cc5bddbc54cd4c93ba50f79a542'),
(42, 'Riya', 'Sharma', '2012-02-16', 'uttar Pradesh', 'India', 'F', 'Dumb', 'riya@gmail.com', 1111111111, 'riya_', '337cb1fe3194ae4c45c7dea3540af219'),
(44, 'rushikesh', 'joshi', '2005-07-23', 'Mharashtra', 'India', 'M', 'Blind', 'rushikesh@gmail.com', 3333333, 'rushikesh_', 'e7ec2f1186e4fa02814be7f71edb620e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_scholarship`
--
ALTER TABLE `applied_scholarship`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `instructor_info`
--
ALTER TABLE `instructor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_scholarship`
--
ALTER TABLE `applied_scholarship`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `instructor_info`
--
ALTER TABLE `instructor_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
