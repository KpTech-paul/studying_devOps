-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 02:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `1st_friend` varchar(100) NOT NULL,
  `2nd_friend` varchar(100) NOT NULL,
  `sign` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(5) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `picsource` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `user_name`, `picsource`, `status`) VALUES
(1, 'paul k', 'profiles/IMG-20210415-WA0002.jpg', 'Offline'),
(2, 'cool_p', 'profiles/IMG-20210415-WA0011.jpg', 'Offline'),
(3, 'coop_250', 'profiles/vlcsnap-2022-05-31-09h41m23s14.png', 'Offline'),
(4, 'kamali jaque', 'profiles/vlcsnap-error621.png', 'Offline'),
(5, 'jojomarino', 'profiles/WIN_20220430_09_10_34_Pro (2).jpg', 'Offline'),
(6, 'albaxon', 'profiles/ABAX.JPG', 'Offline'),
(7, 'jessy', 'profiles/0.png', 'Offline'),
(11, 'CoOP.', 'profiles/pazzo.jpg', 'Offline'),
(9, 'babalao', 'profiles/vlcsnap-2022-06-07-13h35m44s159.png', 'Offline'),
(10, 'pro_rwanda', 'profiles/BYE BYE MULINDI  Flyer.jpg', 'Offline'),
(22, 'musonera', 'profiles/121279630_200781811570528_2202243879270154981_n.jpg', 'Offline'),
(12, 'master', 'profiles/WIN_20220122_03_22_04_Pro.jpg', 'Offline'),
(20, 'smokish', 'profiles/ide.jpg', 'Offline'),
(13, 'dj Aimon', 'profiles/aimon.jpg', 'Online'),
(14, 'pro', 'profiles/BYE BYE MULINDI  Flyer.jpg', 'Offline'),
(15, '#Li Am', 'profiles/WIN_20211116_10_05_39_Pro.jpg', 'Offline'),
(16, '#bubuna ', 'profiles/283251456_995776901131916_5690600252927760703_n.jpg', 'Offline'),
(19, 'p_square jojo', 'profiles/4.jpg', 'Offline'),
(17, 'dodo', 'profiles/WIN_20220430_09_10_34_Pro (2).jpg', 'Offline'),
(18, 'sando', 'profiles/', 'Offline'),
(21, '@Sky_PE', 'profiles/imi-tavor-tar-21-tavor-imi-tavor-tar-21-soldier-wallpaper-pr.jpg', 'Offline'),
(23, 'KIZIGENZA', 'profiles/119147202_3653993771280213_1153603675669506166_n.jpg', 'Offline'),
(24, 'KIZIGENZA', 'profiles/119147202_3653993771280213_1153603675669506166_n.jpg', 'Offline'),
(25, 'KIZIGENZA', 'profiles/119147202_3653993771280213_1153603675669506166_n.jpg', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(5) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `issue` varchar(350) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `user_name`, `issue`) VALUES
(1, 'CoOP.', 'Posting something and sharing'),
(2, 'master', 'hell i need help'),
(3, 'pro', 'hhj'),
(4, 'aimon', 'how can i change my profile picture???');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(5) NOT NULL,
  `message` mediumtext NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `time1` time NOT NULL,
  `status` varchar(11) NOT NULL,
  `timech` varchar(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`) VALUES
(1, 'kuzwadawe', 'jean paul', 'paul k', 500000),
(2, 'cool', 'p', 'cool_p', 400000),
(3, 'copin', 'copin', 'coop_250', 600000),
(4, 'kamali', 'jaque', 'kamali jaque', 100000),
(5, 'niwemugeni', 'jojo', 'jojomarino', 12345),
(6, 'albaxon', 'uwi', 'albaxon', 0),
(7, 'jessica', 'waida', 'jessy', 123456),
(8, 'elee', 'baba', 'babalao', 123456),
(9, 'protogene', 'harambineza', 'pro_rwanda', 0),
(10, 'PaTriCk', 'CoOP', 'CoOP.', 0),
(11, 'Borne', 'stroupstrap', 'master', 0),
(12, 'Aimon', 'chance', 'dj Aimon', 560293),
(13, 'protogene', 'harambineza', 'pro', 0),
(14, '#Li', 'Am', '#Li Am', 0),
(15, 'trix', 'lee', '#bubuna ', 0),
(16, 'dodog', 'isaac', 'dodo', 1234),
(17, '#sando', 'sandrine', 'sando', 78618),
(18, 'p_square', 'jojo', 'p_square jojo', 123456),
(19, 'smoke', 'kinman', 'smokish', 123456),
(20, 'Celestin', 'Igiraneza', '@Sky_PE', 0),
(21, 'uriho', 'doreen', 'musonera', 123456),
(22, 'Mwana', 'w umwirabura', 'KIZIGENZA', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_ceil`
--
CREATE TABLE `v_ceil` (
`average_marks_ceil` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_concat`
--
CREATE TABLE `v_concat` (
`concat_funct` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_date_between`
--
CREATE TABLE `v_date_between` (
`date1` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_floor`
--
CREATE TABLE `v_floor` (
`average_marks_floor` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_len`
--
CREATE TABLE `v_len` (
`name_length` bigint(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_length`
--
CREATE TABLE `v_length` (
`name_length` bigint(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lower`
--
CREATE TABLE `v_lower` (
`lower_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lpad`
--
CREATE TABLE `v_lpad` (
`name_lpad` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_replace`
--
CREATE TABLE `v_replace` (
`name_replace` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_round`
--
CREATE TABLE `v_round` (
`average_marks_round` double(18,1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rpad`
--
CREATE TABLE `v_rpad` (
`name_rpad` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_trim`
--
CREATE TABLE `v_trim` (
`name_trim` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_upper`
--
CREATE TABLE `v_upper` (
`upper_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `average_marks` double NOT NULL,
  `date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `names`, `country`, `city`, `age`, `average_marks`, `date1`) VALUES
(1, 'kuzwadawe jean paul', 'Rwanda', 'kigali', 22, 87.3, '2022-02-25'),
(2, 'rubagenga copin', 'Rwanda', 'byumba', 24, 85.7, '2022-02-24'),
(3, 'uwimpuhwe euzebie', 'Rwanda', 'Ruhango', 19, 82.4, '2022-02-10');

-- --------------------------------------------------------

--
-- Structure for view `v_ceil`
--
DROP TABLE IF EXISTS `v_ceil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ceil`  AS  select ceiling(`work`.`average_marks`) AS `average_marks_ceil` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_concat`
--
DROP TABLE IF EXISTS `v_concat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_concat`  AS  select concat(`work`.`names`,`work`.`country`,`work`.`city`) AS `concat_funct` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_date_between`
--
DROP TABLE IF EXISTS `v_date_between`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_date_between`  AS  select `work`.`date1` AS `date1` from `work` where (`work`.`date1` between '2022-02-18' and '2022-02-28') ;

-- --------------------------------------------------------

--
-- Structure for view `v_floor`
--
DROP TABLE IF EXISTS `v_floor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_floor`  AS  select floor(`work`.`average_marks`) AS `average_marks_floor` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_len`
--
DROP TABLE IF EXISTS `v_len`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_len`  AS  select length(`work`.`names`) AS `name_length` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_length`
--
DROP TABLE IF EXISTS `v_length`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_length`  AS  select length(`work`.`names`) AS `name_length` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_lower`
--
DROP TABLE IF EXISTS `v_lower`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lower`  AS  select lcase(`work`.`names`) AS `lower_name` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_lpad`
--
DROP TABLE IF EXISTS `v_lpad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lpad`  AS  select lpad(`work`.`names`,4,`work`.`city`) AS `name_lpad` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_replace`
--
DROP TABLE IF EXISTS `v_replace`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_replace`  AS  select replace(`work`.`names`,'jean paul','peter') AS `name_replace` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_round`
--
DROP TABLE IF EXISTS `v_round`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_round`  AS  select round(`work`.`average_marks`,1) AS `average_marks_round` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_rpad`
--
DROP TABLE IF EXISTS `v_rpad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rpad`  AS  select rpad(`work`.`names`,4,`work`.`city`) AS `name_rpad` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_trim`
--
DROP TABLE IF EXISTS `v_trim`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_trim`  AS  select trim(both 'u' from `work`.`names`) AS `name_trim` from `work` ;

-- --------------------------------------------------------

--
-- Structure for view `v_upper`
--
DROP TABLE IF EXISTS `v_upper`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_upper`  AS  select ucase(`work`.`names`) AS `upper_name` from `work` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
