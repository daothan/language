-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2017 at 01:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LANGUAGE`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandscore`
--

CREATE TABLE `bandscore` (
  `id` int(32) NOT NULL,
  `parent_id` int(32) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bandscore`
--

INSERT INTO `bandscore` (`id`, `parent_id`, `tittle`, `content`) VALUES
(1, 5, 'How is IELTS scored?', 'IELTS provides a profile of your ability to use English, In other words your IELTS result will consist of a score in each of the tour skills (listening, reading, writing, speaking) which is then averaged to give the Overall Band Score or final mark. Performance is rated in each skill on a scale of 9 to 1. The nine overall Bands and their descriptive statements are as follows:'),
(2, 5, '9 Expert user', 'Has fully operational command of the language: appropriate, accurate and fluent with complete understanding.\r\n'),
(3, 5, '8 Very good user', 'Has fully operational command of the language with only occasional unsystematic inaccuracies and inappropriacies. Misunderstandings may occur in unfamiliar situations. Handles complex detailed argumentation well'),
(4, 5, '7 Good user', 'Has operational command of the language, though with occasional inaccuracies, inappropriacies and misunderstandings in some situations. Generally handles complex language well and understands detailed reasoning.\r\n'),
(5, 5, '6 Competent user', 'Has generally effective command of the language despite inaccuracies, inappropriacies and misunderstandings. Can use and understand fairly complex language, particularly in familiar situations.'),
(6, 5, '5 Modest user', 'Has partial command of the language, coping with overall meaning in most situations, though is likely to make many mistakes, Should be able to handle basic communication in own field,'),
(7, 5, '4 Limited user', 'Basic competence is limited to familiar situations. Has frequent problems in understanding and expression. Is not able to use complex language.\r\n'),
(8, 5, '3 Extremely limited user', 'Conveys and understands only general meaning in very familiar situations. Frequent breakdowns in communication occur.'),
(9, 5, '2 Intermittent user', 'No real communication is possible except for the most basic information using isolated words or short formulae in familiar situations and to meet immediate needs. Has great difficulty understanding spoken and written English,\r\n'),
(10, 5, '1 Non user', 'Essentially has no ability to use the language beyond possibly a few isolated words.'),
(11, 5, '0 Did not attempt the test', 'No assessable information provided.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catename` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catename`) VALUES
(1, 'HOME'),
(2, 'Listening'),
(3, 'Reading'),
(4, 'Exam'),
(5, 'IELTS Band scores'),
(6, '/database/panel/panel.png');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(32) NOT NULL,
  `parent_id` int(32) NOT NULL,
  `tittle` varchar(200) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `parent_id`, `tittle`, `content`) VALUES
(1, 4, '', 'Updating..............\r\nBack to home');

-- --------------------------------------------------------

--
-- Table structure for table `listening`
--

CREATE TABLE `listening` (
  `id` int(32) NOT NULL,
  `parent_id` int(32) NOT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tittle` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `origin_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listening`
--

INSERT INTO `listening` (`id`, `parent_id`, `url`, `tittle`, `subtitle`, `origin_url`) VALUES
(1, 2, '/language/database/listening/TED Imagines The Future You.webm', 'TED Imagines The Future You', '', 'https://www.youtube.com/watch?v=JHCgo_Y7_Sc'),
(2, 2, '/language/database/listening/Why Learn a Foreign Language .mp4', 'Why Learn a Foreign Language?', '', 'https://www.youtube.com/watch?v=u0cUNFPN4YU'),
(3, 2, '/language/database/listening/What makes muscles grow - Jeffrey Siegel.webm', 'What makes muscles grow? - Jeffrey Siegel', '', 'https://www.youtube.com/watch?v=2tM1LFFxeKg'),
(4, 2, '/language/database/listening/The benefits of good posture - Murat Dalkilinc.webm', 'The benefits of good posture - Murat Dalkilinc', '', 'https://www.youtube.com/watch?v=OyK0oE5rwFY'),
(5, 2, 'database/listening/How to improve your English speaking skills (by yourself).mp4', 'How to improve your English speaking skills (by yourself) ', '', 'https://www.youtube.com/watch?v=CAU2zx2Ri_M'),
(6, 2, 'database/listening/How to remember English vocabulary.mp4', 'How to remember English vocabulary ', '', 'https://www.youtube.com/watch?v=XOZBrmODt6c'),
(7, 2, 'database/listening/Deep English - Power of Belief.mp4', ' Deep English - Power of Belief', '', 'https://www.youtube.com/watch?v=5cYoHmIk7g8'),
(8, 2, 'database/listening/Deep English - A Man For All Seasons.mp4', ' Deep English - A Man For All Seasons', '', 'https://www.youtube.com/watch?v=iuQyc_yYb6U');

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

CREATE TABLE `reading` (
  `id` int(32) NOT NULL,
  `parent_id` int(32) NOT NULL,
  `tittle` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `name_pic` varchar(300) NOT NULL,
  `credit_pic` varchar(300) NOT NULL,
  `content` varchar(300) NOT NULL,
  `origin_url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reading`
--

INSERT INTO `reading` (`id`, `parent_id`, `tittle`, `image`, `name_pic`, `credit_pic`, `content`, `origin_url`) VALUES
(1, 3, 'Early dinosaur cousin had a surprising croc-like look', 'database/reading/1/Early dinosaur cousin had a surprising croc-like look.jpg', 'database/reading/1/name pic Early dinosaur cousin had a surprising croc-like look.txt', 'database/reading/1/credit Early dinosaur cousin had a surprising croc-like look.txt', 'database/reading/1/Early dinosaur cousin had a surprising croc-like look.txt', 'https://www.sciencedaily.com/releases/2017/04/170412132326.htm'),
(2, 3, 'Meet \'DeeDee,\' a distant, dim member of our solar system', 'database/reading/2/credit pic Meet \'DeeDee,\' a distant, dim member of our solar system.jpg', 'database/reading/2/name pic Meet \'DeeDee,\' a distant, dim member of our solar system.txt', 'database/reading/2/credit pic Meet \'DeeDee,\' a distant, dim member of our solar system.txt', 'database/reading/2/Meet \'DeeDee,\' a distant, dim member of our solar system.txt', 'https://www.sciencedaily.com/releases/2017/04/170412115749.htm'),
(3, 3, 'First \'image\' of a dark matter web that connects galaxies', 'database/reading/3/First \'image\' of a dark matter web that connects galaxies.jpg', 'database/reading/3/name pic First \'image\' of a dark matter web that connects galaxies.txt', 'database/reading/3/credit pic First \'image\' of a dark matter web that connects galaxies.txt', 'database/reading/3/First \'image\' of a dark matter web that connects galaxies.txt', 'https://www.sciencedaily.com/releases/2017/04/170412091230.htm'),
(4, 3, 'How stevia may help to control blood sugar', 'database/reading/4/How stevia may help to control blood sugar.jpg', 'database/reading/4/name pic How stevia may help to control blood sugar.txt', 'database/reading/4/credit pic How stevia may help to control blood sugar.txt', 'database/reading/4/How stevia may help to control blood sugar.txt', 'http://www.medicalnewstoday.com/articles/316918.php'),
(5, 5, 'The Surprising Impact of Marathons: Delays in Urgent Care', 'database/reading/5/The Surprising Impact of Marathons: Delays in Urgent Care.jpg', 'database/reading/5/name pic The Surprising Impact of Marathons: Delays in Urgent Care.txt', 'database/reading/5/credit pic The Surprising Impact of Marathons: Delays in Urgent Care.txt', 'database/reading/5/The Surprising Impact of Marathons: Delays in Urgent Care.txt', 'http://www.livescience.com/58668-marathons-urgent-care-delays.html'),
(6, 3, 'Trans Fat Ban Tied to Fewer Heart Attacks and Strokes', 'database/reading/6/Trans Fat Ban Tied to Fewer Heart Attacks and Strokes.jpg', 'database/reading/6/name pic Trans Fat Ban Tied to Fewer Heart Attacks and Strokes.txt', 'database/reading/6/credit pic Trans Fat Ban Tied to Fewer Heart Attacks and Strokes.txt', 'database/reading/6/Trans Fat Ban Tied to Fewer Heart Attacks and Strokes.txt', 'http://www.livescience.com/58666-trans-fat-ban-linked-to-drop-in-heart-attacks-strokes.html'),
(7, 3, 'Ant agricultural revolution began 30 million years ago in dry, desert-like climate', 'database/reading/7/Ant agricultural revolution began 30 million years ago in dry, desert-like climate.jpg', 'database/reading/7/name pic Ant agricultural revolution began 30 million years ago in dry, desert-like climate.txt', 'database/reading/7/credit pic Ant agricultural revolution began 30 million years ago in dry, desert-like climate.txt', 'database/reading/7/Ant agricultural revolution began 30 million years ago in dry, desert-like climate.txt', 'https://www.sciencedaily.com/releases/2017/04/170412091130.htm'),
(8, 3, 'Tick tock, stay ahead of the aging clock', 'database/reading/8/Tick tock, stay ahead of the aging clock.jpg', 'database/reading/8/name pic Tick tock, stay ahead of the aging clock.txt', 'database/reading/8/credit pic Tick tock, stay ahead of the aging clock.txt', 'database/reading/8/Tick tock, stay ahead of the aging clock.txt', 'https://www.sciencedaily.com/releases/2017/04/170412124358.htm');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(32) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `level` varchar(32) NOT NULL,
  `band` float NOT NULL,
  `score_listening` varchar(32) NOT NULL,
  `score_reading` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `parent_id`, `level`, `band`, `score_listening`, `score_reading`) VALUES
(1, 5, 'Expert', 9, '39-40', '39-40'),
(2, 5, 'Very Good', 8.5, '37-38', '37-38'),
(3, 5, 'Very Good', 8, '35-36', '35-36'),
(4, 5, 'Good', 7.5, '32-34', '33-34'),
(5, 5, 'Good', 7, '30-31', '30-32'),
(6, 5, 'Competent', 6.5, '26-29', '27-29'),
(7, 5, 'Competent', 6, '23-25', '23-26'),
(8, 5, 'Modest', 5.5, '18-22', '19-22'),
(9, 5, 'Modest', 5, '16-17', '15-18'),
(10, 5, 'Limited', 4.5, '13-15', '13-14'),
(11, 5, 'Limited', 4, '10-12', '10-12'),
(12, 5, 'Emtremely Limited', 3.5, '8-10', '8-9'),
(13, 5, 'Extremely Limited', 3, '6-7', '6-7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandscore`
--
ALTER TABLE `bandscore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listening`
--
ALTER TABLE `listening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading`
--
ALTER TABLE `reading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandscore`
--
ALTER TABLE `bandscore`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `listening`
--
ALTER TABLE `listening`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reading`
--
ALTER TABLE `reading`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
