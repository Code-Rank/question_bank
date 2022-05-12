-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 05:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `class_id`) VALUES
(17, 'Chemistry', 30),
(18, 'Biology', 30),
(19, 'Computer Science', 30),
(20, 'Home Economics', 30),
(21, 'English Book', 30),
(22, 'Education', 30),
(23, 'Physics', 31),
(24, 'Chemistry', 31),
(25, 'Pakistan studies', 31),
(26, 'Islamiat', 31),
(27, 'Urdu', 31),
(28, 'Mathematics', 31),
(29, 'General math', 31),
(30, 'General science', 31),
(31, 'Education', 31),
(32, 'Physics', 32),
(33, 'Mathematics', 32),
(34, 'Statistics', 32),
(35, 'Principle of Commerce', 32);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `chapter_no` int(11) NOT NULL,
  `chapter_name` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapter_no`, `chapter_name`, `book_id`) VALUES
(19, 1, 'Programming and Computational', 19),
(20, 2, 'Computer Networks', 19),
(21, 3, 'Data Management', 19),
(22, 1, 'Introduction', 18),
(23, 2, 'Biological Molecules', 17),
(24, 123, 'fundamentals', 34),
(25, 12, 'bio', 24);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `c_name`) VALUES
(29, '8'),
(30, '9'),
(31, '10'),
(32, '11'),
(33, '12');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `g_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `g_name`) VALUES
(6, 'arts'),
(7, 'science'),
(10, 'biology'),
(11, 'ICS'),
(12, 'FSC pre medical'),
(13, 'FSC pre eng');

-- --------------------------------------------------------

--
-- Table structure for table `objective_type`
--

CREATE TABLE `objective_type` (
  `id` int(11) NOT NULL,
  `question_eng` varchar(200) NOT NULL,
  `question_urdu` varchar(200) NOT NULL,
  `option_1` varchar(200) NOT NULL,
  `option_2` varchar(200) NOT NULL,
  `option_3` varchar(200) NOT NULL,
  `option_4` varchar(200) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `objective_type`
--

INSERT INTO `objective_type` (`id`, `question_eng`, `question_urdu`, `option_1`, `option_2`, `option_3`, `option_4`, `chapter_id`, `class_id`, `book_id`) VALUES
(16, 'Trace table is a technique of', 'ٹریس ٹیبل کی ایک تکنیک ہے۔', 'Running the program a', 'Running the flowchart', 'To test the algorithm', 'Modification', 19, 30, 19),
(17, 'In order to solve a problem, it IS important to follow an approach', 'کسی مسئلے کو حل کرنے کے لیے، کسی نقطہ نظر کی پیروی کرنا ضروری ہے۔', 'Systematic', 'Manual', 'Trace report', 'Central approach', 19, 30, 19),
(18, 'Which is the initial stage of problems', 'جو کہ مسائل کا ابتدائی مرحلہ ہے۔', 'Defining', 'Analyzing', 'Programming', 'Stepping', 19, 30, 19),
(19, 'Number \"17\" is equal to binary system.', 'نمبر \"17\" بائنری سسٹم کے برابر ہے۔', '10000', '10110', '10001', '10100', 20, 30, 19),
(20, 'Temporary memory is _ and permanent memory is', 'عارضی میموری ہے _ اور مستقل میموری ہے۔', 'Volatile', 'Non-volatile', 'Slow, Fast', 'All of these', 20, 30, 19),
(40, 'ttttttttt', 'ttttttttt', 'ttttttttttt', 'ttttttttt', 'tttttttttt', 'ttttttttt', 21, 30, 19);

-- --------------------------------------------------------

--
-- Table structure for table `subjective_type`
--

CREATE TABLE `subjective_type` (
  `id` int(11) NOT NULL,
  `question_eng` varchar(500) NOT NULL,
  `question_urdu` varchar(500) NOT NULL,
  `question_type` varchar(20) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjective_type`
--

INSERT INTO `subjective_type` (`id`, `question_eng`, `question_urdu`, `question_type`, `chapter_id`, `book_id`, `class_id`) VALUES
(15, 'What do you mean by well-defined problem', 'اچھی طرح سے طے شدہ مسئلہ سے آپ کا کیا مطلب ہے؟', 'SQ', 19, 19, 30),
(16, 'Draw a flowchart that Input a year and determine whether it is a leap year or not.', 'ایک فلو چارٹ بنائیں جو ایک سال میں داخل کرے اور اس بات کا تعین کرے کہ آیا یہ لیپ سال ہے یا نہیں۔', 'LQ', 19, 19, 30),
(17, 'Define problem and problem solving', 'مسئلہ اور مسئلہ حل کرنے کی وضاحت کریں۔', 'SQ', 19, 19, 30),
(18, 'List the problem solving steps', 'مسئلہ حل کرنے کے اقدامات کی فہرست بنائیں', 'SQ', 19, 19, 30),
(19, 'What do you mean by planning a solution? Mention strategies for problem', 'حل کی منصوبہ بندی سے آپ کا کیا مطلب ہے؟ مسئلہ کے لیے حکمت عملی کا تذکرہ کریں۔', 'SQ', 19, 19, 30),
(20, 'What is the purpose of Connector symbol in flowchart', 'فلو چارٹ میں کنیکٹر کی علامت کا مقصد کیا ہے؟', 'SQ', 19, 19, 30),
(21, 'What happen if you give invalid data for testing the algorithm? Give example', 'اگر آپ الگورتھم کی جانچ کے لیے غلط ڈیٹا دیتے ہیں تو کیا ہوگا؟ مثال دیں۔', 'LQ', 19, 19, 30),
(22, 'Differentiate between volatile and non-volatile memory.', 'اتار چڑھاؤ اور غیر مستحکم میموری کے درمیان فرق کریں۔', 'SQ', 20, 19, 30),
(23, 'Store the word \"Phone\" in computer memory starting from address 7003 where each letter needs one byte to store in the memory.', 'ایڈریس 7003 سے شروع ہونے والے لفظ \"فون\" کو کمپیوٹر میموری میں اسٹور کریں جہاں ہر حرف کو میموری میں ذخیرہ کرنے کے لیے ایک بائٹ کی ضرورت ہوتی ہے', 'SQ', 20, 19, 30),
(24, '15 Convert (C921)16 to decimal', '15 (C921)16 کو اعشاریہ میں تبدیل کریں۔', 'SQ', 20, 19, 30),
(25, 'What is computer memory? Also write its types.', 'کمپیوٹر میموری کیا ہے؟ اس کی اقسام بھی لکھیں۔', 'SQ', 20, 19, 30),
(26, 'Q.22	What is bit and why binary number system is important for our computer?', 'بٹ کیا ہے اور بائنری نمبر سسٹم ہمارے کمپیوٹر کے لیے کیوں اہم ہے؟', 'SQ', 20, 19, 30),
(27, 'What is OR ,NOT, AND operator?', 'یا، نہیں، اور آپریٹر کیا ہے؟', 'LQ', 20, 19, 30),
(28, 'What are truth value? Give examples.', 'سچائی کی قدر کیا ہیں؟ مثالیں دیں۔', 'LQ', 20, 19, 30),
(29, 'op', 'pp', 'SQ', 19, 19, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objective_type`
--
ALTER TABLE `objective_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjective_type`
--
ALTER TABLE `subjective_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `objective_type`
--
ALTER TABLE `objective_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `subjective_type`
--
ALTER TABLE `subjective_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
