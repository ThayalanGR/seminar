-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2018 at 03:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `book_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `day_order` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`book_id`, `dept_id`, `group_id`, `day_order`, `period`, `user_id`, `sub_id`, `hall_id`) VALUES
(1, 1, 1, 3, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`dept_id`, `dept_name`) VALUES
(1, 'CSE'),
(2, 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL,
  `day_order` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `day_order`, `date`) VALUES
(1, 1, '2018-08-11'),
(1, 2, '2018-08-12'),
(1, 3, '2018-08-13'),
(1, 4, '2018-08-14'),
(1, 5, '2018-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `book_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `day_order` int(11) NOT NULL,
  `period` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_limit`
--

CREATE TABLE `tbl_limit` (
  `limit_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `current_usage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logindetails`
--

CREATE TABLE `tbl_logindetails` (
  `user_id` int(11) NOT NULL,
  `login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logindetails`
--

INSERT INTO `tbl_logindetails` (`user_id`, `login`, `logout`) VALUES
(1, '2018-08-11 07:36:57', '2018-08-11 07:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `max_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `max_book`) VALUES
(1, 'staff', 3),
(2, 'hod', 8),
(3, 'admin', 0),
(4, 'dept_adimin', 0),
(5, 'web_admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seminarhall`
--

CREATE TABLE `tbl_seminarhall` (
  `hall_id` int(11) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seminarhall`
--

INSERT INTO `tbl_seminarhall` (`hall_id`, `dept`) VALUES
(1, 'cse'),
(2, 'ece'),
(3, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'Unknown',
  `user_name` varchar(255) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_password` varchar(255) DEFAULT NULL,
  `initial_change` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`user_id`, `name`, `user_name`, `dept_id`, `email`, `role_id`, `password`, `forgot_password`, `initial_change`) VALUES
(1, 'Mr. R Hemant Kumar', 'hemantkumar-cse', 1, '', 1, '2bad7ec7505a0c5e727bf53b41bbaac0', '', 0),
(2, 'Ms. N Kavitha', 'kavitha-cse', 1, '', 1, '97b4bc63e6260e74226687b6e4da0945', '988ad95c1ef313568d4d0b70b7828927', 1),
(3, ' Mr. K.S Chandrasekaran', 'chandrasekaran-cse', 1, '', 1, '3431bcf881579752db42f341f3387d1a', '', 0),
(4, 'Mr. D Boobala Muralitharan', 'boobala-cse', 1, '', 1, 'd96137d4e95ec62bd531929cfaea1226', '', 0),
(5, 'Ms. C Merlyne Sandra Christina', 'merlyne-cse', 1, '', 1, '3b44d7823b191c5ac3c90f98cba32164', '', 0),
(6, 'Ms. V Punitha', 'punitha-cse', 1, '', 1, 'ffd86fcb46ea95c971823dd859a0db9b', '', 0),
(7, 'Ms. N Radha', 'radha-cse', 1, '', 1, '0334c8bd6ac8aced89e544162e0ae162', '', 0),
(8, 'Mr. T Sathis Kumar', 'sathiskumar-cse', 1, '', 1, 'd0b9c62739f8f1494524e657a0792574', '', 0),
(9, 'Ms. R Thillaikarasi', 'thillai-cse', 1, '', 1, 'd6948486ac6b960bd055e950be411eaa', '', 0),
(10, 'Ms. K Mohanappriya', 'mohanapriya-cse', 1, '', 1, '486cff1961d5ff19668c252bdeee5845', '', 0),
(11, 'Mr. R Mohankumar', 'mohankumar-cse', 1, '', 1, '0c2f845d9a5b92def600fcd4e111546b', '94cddd878930e43bdea6d6e757f6457e', 1),
(12, 'Ms. C Hemalatha', 'hemalatha-cse', 1, '', 1, '30cd2c149bc4fa78d17e179d9b01bd53', '', 0),
(13, 'Ms. J Sathiaparkavi', 'parkavi-cse', 1, '', 1, 'e4587cc8aab7edbd6a8f75a989ae3466', '', 0),
(14, 'Mr. A.T Barani Vijaya Kumar', 'barani-cse', 1, '', 1, 'a46c4f44f130299a44a1f6d85f96bcdf', '', 0),
(15, 'Dr. S.A. Sahaaya Arul Mary', 'mary-cse', 1, '', 1, '964001796afd30cbe66e1b93ecf9cb00', '', 0),
(16, 'Mr. P Dineshkumar', 'dineshkumar-cse', 1, '', 1, '73c48a8d51596a941ddbdaeb55e5f860', '', 0),
(17, 'Dr. K Karthik Subramanian', 'karthik-cse', 1, '', 1, 'ceb9aa6a87e43a8de62612b351b68e05', '', 0),
(18, 'Ms. R Senthamil Selvi', 'senthamilselvi-cse', 1, '', 1, 'df7a4272d77c9f1ad9fbcb053efe7c7e', '', 0),
(19, 'Dr. S Mohana', 'mohana-cse', 1, '', 1, '49421740e691b6b2c9f6e26b88b34a87', 'df6ceb06c8e6963afc312bb1171c4d03', 1),
(20, 'Dr. P L Rajarajeswari', 'rajarajeswari-cse', 1, '', 1, '53bf41d777683b04867c169cd40218a8', '', 0),
(21, 'Ms. R Lavanya Bai', 'lavanyabai-cse', 1, '', 1, '91e99e13028377bdbbf5007760e69ef5', '', 0),
(22, 'Ms. S Prabasri', 'prabasri-cse', 1, '', 1, '9f9af39d0385fb5ad022ce7bdf9406f5', '', 0),
(23, 'Mr. M Anbazhagan', 'anbazhagan-cse', 1, '', 1, '5e8bbf266724379c8dbf4996430eaaea', '', 0),
(24, 'Ms. H Suganya', 'suganya-cse', 1, '', 1, '40a55f01fcfc97a5d785cca6519af4a7', '', 0),
(25, 'Mr. S Venkatasubramanian', 'veeyes', 1, '', 1, 'b5713c6b1629c85d24296d9b7d29bae9', '', 0),
(26, 'Dr.L. Muruganandam', 'muruganandam-che', 1, '', 1, '8ffa2862ffdc68815037a47110dd1399', '', 0),
(27, 'Ms.R. Maheswari', 'maheswari-che', 1, '', 1, '0f2d4c4bf25dea4c4059b0a3ed769695', '', 0),
(28, 'Mr.B. Balaprasad', 'balaprasad-che', 1, '', 1, 'e0dfd3d3a772f593e666d9af7a371fad', '', 0),
(29, 'Dr.V. Balamurugan', 'balamurugan-che', 1, '', 1, '3f87bbb6966e971b4ea6ba69de673d8f', '', 0),
(30, 'Mr.N. Anantha Krishnan', 'anathakrishnan-che', 1, '', 1, '5edd4026fec643f854ca1118408c9535', '', 0),
(31, 'Dr.K. Sasikala', 'sasikala-che', 1, '', 1, 'e2120cc7dd4d36a207fad05d4dd695af', '', 0),
(47, 'Ms.G. Alaiyarasi', 'alaiyarasi-cse', 1, '', 1, '4c6b6864fd4e5924d2fea93f49260896', '', 0),
(51, 'Dr.A. Revathi', 'revathya-del', 1, '', 1, 'c63c7dd3a143614ac911a2e0a758146a', '', 0),
(52, 'Dr.M. Santhi', 'santhim', 1, '', 1, 'f4ab589215c18ede0e0e74c70119119b', '', 0),
(53, 'Dr.C. Vennila', 'vennila-ece', 1, '', 1, '089d01b33736d6dd59b5dff6b9c6665e', '', 0),
(54, 'Dr.S.A. Arunmozhi', 'arunmozhi-ece', 1, '', 1, '47d3307a37dde66f8e7b3f177f7fd492', '', 0),
(55, 'Dr.S. Rajeswari', 'rajeswaris-ece', 1, '', 1, '52db4591c88b2c9b8a3de391fc68b686', '', 0),
(56, 'Dr.V. Mohan', 'mohan-ece', 1, '', 1, 'f7d5605b2971f09e6fff524dd7795980', '', 0),
(57, 'Dr.M. Padmaa', 'padmaa-ece', 1, '', 1, '252eeda2771bd0d07c24214d0e6bf480', '', 0),
(58, 'Dr.M. Baritha Begum', 'barithabegum-ece', 1, '', 1, '66907a905477a2dfbb1de82aa3ae3a61', '', 0),
(59, 'Mr.S. Hariprasath', 'hariprasath-ece', 1, '', 1, '75d37772685848ffd1448b26b426496d', '', 0),
(60, 'Dr.P. Shanmugapriya', 'shanmugapriya-ece', 1, '', 1, 'b30ac5e7470bc47a230a99464a88098a', '', 0),
(61, 'Ms.J. Eindhumathy', 'eindhumathy-ece', 1, '', 1, '44d75765522460d3abc1d80ba0ade13a', '', 0),
(62, 'Mr.A. Varadarajan', 'varadarajan-ece', 1, '', 1, '30915d4d1db41d6b6f923cb1a1645416', '', 0),
(63, 'Ms.A. Shamim Banu', 'shamimbanu-ece', 1, '', 1, '60b3510fcae4e54202336e34727f3ef0', '', 0),
(64, 'Ms.V. Kavitha', 'kavitha-ece', 1, '', 1, '2a3cb27d4494661753348d94a3368ec7', '', 0),
(65, 'Mr.K. Malaisamy', 'malaisamy-ece', 1, '', 1, '5397b29179279c629ace511404e5e167', '', 0),
(66, 'Mr.G. Sivakannu', 'sivakannu-ece', 1, '', 1, '25b32109eb1265062b9560098ee3e1fb', '', 0),
(67, 'Ms.V. Ramya', 'ramyav-ece', 1, '', 1, '6f6727e552e6900ba4101d5f2fd633ee', '', 0),
(68, 'Ms.J. Shobana', 'shobana-ece', 1, '', 1, '4e96d47e27789f6a7b48a82acc5a7882', '', 0),
(69, 'Ms.S. Priyadharshini', 'priyadharshini-ece', 1, '', 1, '41440204d2950272b80342aeeba97221', '', 0),
(70, 'Mr.M. Mahendran', 'mahendran-ece', 1, '', 1, 'b6a7d540a5364430160b09ddd0aba030', '', 0),
(71, 'Ms.P. Sivagamasundhari', 'sivagamasundhari-ece', 1, '', 1, '2f22f3078bb537edd221cc909d449cce', '', 0),
(72, 'Ms.A. Abiraami', 'abiraami-ece', 1, '', 1, '92dbb7aa0557252a5187a5cf61f6e0be', '', 0),
(73, 'Dr.M. Arutchelvi', 'arutchelvi-eee', 1, '', 1, '5cadc88d81cae3c5515c0b2227a292d4', '', 0),
(74, 'Dr.D. Kalyana Kumar', 'kalyanakumar-eee', 1, '', 1, '8099f6e155e8d7f2b0629e837ca9f9f6', '', 0),
(75, 'Mr.B. Paranthagan', 'paranthagan-eee', 1, '', 1, '76a9a29266d9884c39736e96cbf22e5c', '', 0),
(76, 'Mr.R. Balasubramanian', 'balasubramanian-eee', 1, '', 1, '0a221836c90a4c999250505b1cde0b42', '', 0),
(77, 'Ms.KR. Vairamani', 'vairamani-eee', 1, '', 1, '3c4644d2cc1a0fcf544dbf4392c0c94e', '', 0),
(78, 'Mr.M. Marimuthu', 'marimuthu-eee', 1, '', 1, '3e24d4c8bd8bd10523655015e1d92773', '', 0),
(79, 'Mr.S. Ramprasath', 'ramprasath-eee', 1, '', 1, '156652345ebc5c19c3b991bffb176041', '', 0),
(80, 'Ms.C. Pearline Kamalini', 'pearline-eee', 1, '', 1, '55a35081c674aad181a8b3b7820f92aa', '', 0),
(81, 'Ms.P. Geetha', 'geetha-eee', 1, '', 1, '1915398344dd89ead71b6dc211fefdcd', '', 0),
(82, 'Mr.P. Rameshbabu', 'rameshbabu-eee', 1, '', 1, '4fab96717b0de8e341f31da292d75f85', '', 0),
(83, 'Ms.N. Shobana', 'shobana-eee', 1, '', 1, 'd9bea8a5adcbfc4a1de13a23657d7827', '', 0),
(84, 'Ms.P. Jenitha Deepa', 'jenitha-eee', 1, '', 1, '5414f144209ccc5f7e2a4f45b8ec1c6e', '', 0),
(85, 'Mr.S. Lenin Prakash', 'lenin-eee', 1, '', 1, '1b98f256f238c5f0923d6cf4b891db9a', '', 0),
(86, 'Mr.A. Kamalakannan', 'kamalakannan-eee', 1, '', 1, '8631b15f434ff29f7eb1b059ebf794d4', '', 0),
(87, 'Mr.N. Vijayasarathi', 'vijayasarathi-eee', 1, '', 1, 'a7a2140a5c71e1382ccf8261967e63ca', '', 0),
(88, 'Dr.S. Vijayalakshmi', 'vijayalakshmi-eee', 1, '', 1, 'fadf98eb40dad293616f67b591e25a57', '', 0),
(89, 'Mr.B. Ganesh Koteeswaran', 'ganesh-eee', 1, '', 1, '9c9d3098f0b0d5025565860551f14b5c', '', 0),
(90, 'Ms.S. Sharon Rosy', 'sharonrosy-eee', 1, '', 1, '007c3a8a5bff23a70827120f9ee09144', '', 0),
(91, 'Mr.S. Sabareswar', 'sabareswar-eee', 1, '', 1, 'ec50ffc5604e93366109b9a9b274f8fb', '', 0),
(92, 'Mr.R. Satheesh', 'satheesh-eee', 1, '', 1, '102c1793fb4a30088db400deb3a708f3', '', 0),
(93, 'Mr.D. Kalyanraj', 'kalyanraj-eee', 1, '', 1, '40697cf2469cc06925202c3c2dec7904', '', 0),
(94, 'Dr.R. Uma Alias Seetha', 'uma-eng', 1, '', 1, '64c763f1a9a54b179e57a8b566d8c829', '', 0),
(95, 'Dr.A. Narayanan', 'narayanan-eng', 1, '', 1, '55d9ff64bd3029f28f9ae5b974109edd', '', 0),
(96, 'Ms.S. Sandra', 'sandra-eng', 1, '', 1, '03a98720bfdbb81cdf47fb51de63e4cb', '', 0),
(97, 'Mr.C. Gnanadesikan', 'gnanadesikan-eng', 1, '', 1, '92177937324195c7cc1218af52dc2681', '', 0),
(98, 'Ms.M. Premalatha', 'premalatha-eng', 1, '', 1, '974bde4003234e912a1fda3be3e34d13', '', 0),
(99, 'Dr.S.M. Girirajkumar', 'girirajkumar-ice', 1, '', 1, '7acc081470b6d7bb7cf4c18eae87817b', '', 0),
(100, 'Ms.G. Vijayalakshmi', 'vijayalakshmi-ice', 1, '', 1, '2038129b4d0dd9555648d0c71a82f766', '', 0),
(101, 'Mr.R. Arvind', 'arvind-ice', 1, '', 1, '7c418fb56cbccbd2ea71dabb02273179', '', 0),
(102, 'Ms.S. Arutselvi', 'arutselvi-ice', 1, '', 1, '72001f0dd725538be291d914840909af', '', 0),
(103, 'Mr.R. Gopalakrishnan', 'gopalakrishnan-ice', 1, '', 1, 'd1a7e08deb1bc5063767fdb32ceeffc7', '', 0),
(104, 'Ms.P. Suganthini', 'suganthini-ice', 1, '', 1, '4c83c67e5954345ba75d788e6ad8a3fe', '', 0),
(105, 'Ms.H. Kala', 'kala-ice', 1, '', 1, 'ce07f311b6f1ee0617430f1f2342fbe5', '', 0),
(106, 'Ms.N. Nithyarani', 'nithyarani-ice-left', 1, '', 1, 'eaa2d9a821c7968093bc76b742e69ef5', '', 0),
(107, 'Mr.P. Aravind', 'aravind-ice', 1, '', 1, '9dd2b7176bbe734023c727f6d2657dc6', '', 0),
(108, 'Ms.S. Abirami', 'abirami-ice', 1, '', 1, 'daf1ae9f5a5161797a807b44bfcfaa3f', '', 0),
(109, 'Ms.S. Rathna Prabha', 'rathnaprabha-ice', 1, '', 1, 'd5d1579b82169f655e4c0fe964571633', '', 0),
(110, 'Ms.N. Bhavani', 'bhavani-it', 1, '', 1, '913a58a867840b60bb425645b804910b', '', 0),
(112, 'Mr.P. Anand', 'anand-it', 1, '', 1, '0171ed6011e305519e008e636fcd795c', '', 0),
(113, 'Ms.A. Sheelavathi', 'sheelavathi-it', 1, '', 1, 'f86f10c3133769f4de154769105b3623', '', 0),
(114, 'Ms.M. Padmapriya', 'padmapriya-it', 1, '', 1, '75c455bc68be5b5f96d7b611e6b55ba3', '', 0),
(115, 'Ms.J. Sangeethapriya', 'jspriya-it', 1, '', 1, 'e819f42ba6bb1b1c5d9141b87403ad7c', '', 0),
(116, 'Ms.R. Uma', 'uma-it', 1, '', 1, '45532ba381d8a4b314625dc2a581c437', '', 0),
(117, 'Mr.E. Silambarasan', 'silambarasan-it', 1, '', 1, '9e3be778f4954fdac76a09f057686d0e', '', 0),
(118, 'Mr.V. Manoj Kumar', 'manojkumar-it', 1, '', 1, '04c712ace9c615158b5772e9d4e5368a', '', 0),
(120, 'Dr.A. Krishnamoorthy', 'krish-mat', 1, '', 1, '1020064962c7829d22c9b1435476d9bb', '', 0),
(121, 'Mr.A. Mohan', 'mohan-mat', 1, '', 1, 'c604b87a780011f3a95b83bc8528a98f', '', 0),
(122, 'Ms.D. Geetha', 'geetha-mat', 1, '', 1, 'fcb0c29ddbf52e83d62d0f415f3635bb', '', 0),
(123, 'Dr.S. Revathi', 'revathi-mat', 1, '', 1, '2c958e1922237fbef39fa52a8770f733', '', 0),
(124, 'Dr.D. Rajalaxmi alias Subahashini', 'rajalaxmi-mat', 1, '', 1, 'f6694466e0192b567e0b34aa0fa6c372', '', 0),
(125, 'Ms.R. Padma', 'padma-mat', 1, '', 1, '258e5bfe0c98a20facd86eb76df19ec2', '', 0),
(126, 'Ms.N. Subashini', 'subhashini-mat', 1, '', 1, '18146c5b6665bf48d95615ed2cfb5133', '', 0),
(127, 'Ms.V.S. Akilandeswari', 'akilandeswari-mat', 1, '', 1, '452f56fdc6db4d7308e83ae35d639702', '', 0),
(128, 'Dr.P.K. Lakshmidevi', 'lakshmidevi-mat', 1, '', 1, '443006f4fb8740fb63e781c8beef0d85', '', 0),
(129, 'Dr.S. Arunkumar', 'arunkumar-mat', 1, '', 1, 'efa0c7a3db47950d35bfb82f780b1de1', '', 0),
(130, 'Mr.B S. Chandramouli', 'chandramouli-mba', 1, '', 1, '60d0c734652ec0524a3fb38e691d9b51', '', 0),
(131, 'Dr.K. Karthikeyan', 'karthikeyan-mba', 1, '', 1, 'd3144f4e1b44b51953983cd8848b43a6', '', 0),
(132, 'Ms.S. Radhika', 'radhika-mba', 1, '', 1, 'ab056e80145d6e27efd1305d0fa0945d', '', 0),
(133, 'Mr.K. Arunprasad', 'arunprasad-mba', 1, '', 1, 'e13764aa6c8a51c9a034e25ededee632', '', 0),
(134, 'Dr.N. Anitha', 'anitha-mba', 1, '', 1, '181e07fdb3950f1546d189794cc697b3', '', 0),
(135, 'Ms.K. Preena', 'preena-mba', 1, '', 1, '9b5570ba905726414f5845b8fd2bd1e1', '', 0),
(136, 'Dr.A. Rameshbabu', 'rameshbabu-mca', 1, '', 1, '60415f933630a4a26cbadf7a05a3bb6d', '', 0),
(137, 'Mr.V. Senthil Balaji', 'senthilbalaji-it', 1, '', 1, '682b77fbb6e755e2e8b4b81dd51655ef', '', 0),
(138, 'Ms.G. Gayathri', 'gayathri-mca', 1, '', 1, '733fffce3940c3b67dc0987fe59ed129', '', 0),
(139, 'Mr.S. Mohammed Arif', 'arif-mca', 1, '', 1, '5331e9619695db2e62df5ca2b22fdb62', '', 0),
(140, 'Mr.R. Rengaraj alias Muralidharan', 'rengaraj-it', 1, '', 1, '26b543f2f8ed91ec8380b367dee2f5db', '', 0),
(141, 'Ms.M. Karthika', 'karthika-mca', 1, '', 1, '4a004305dc229b44bde1f7b5af487827', '', 0),
(142, 'Ms.R. Santhi', 'santhi-mca', 1, '', 1, '56e76c42f077c4d6ee047873c0c89379', '', 0),
(143, 'Mr.R. Anbuselvam', 'anbu-mca', 1, '', 1, 'fa1b78471ccc3c73349913487421e507', '', 0),
(144, 'Mr.M. Vadivel', 'vadivel-mca', 1, '', 1, '37a28ce2171b061f9bd1d67359dcc838', '', 0),
(146, 'Mr.K.K. Ramesh', 'ramesh-mca', 1, '', 1, '0c4d16c6563b692e1abef186a17af51b', '', 0),
(147, 'Mr.V. Radhika', 'radhika-mca-DEL', 1, '', 1, 'e3e62ddd33e4abe9f1424cae4be29318', '', 0),
(148, 'Dr.G. Jayaprakash', 'jayaprakash-mech', 1, '', 1, 'cf59592425dcf2eb02244aa988768d89', '', 0),
(149, 'Mr.R S. Baliah', 'baliah-mech', 1, '', 1, '05dd3df2a34ec58a0103e935da59531e', '', 0),
(150, 'Dr.K. Padmanaban', 'padmanaban-mech', 1, '', 1, '2d4e8a5de585bea6b134864823c1a666', '', 0),
(151, 'Mr.. Iyer Gopal Srinivasan', 'gopal-mech', 1, '', 1, 'ecf8a03c67e8008566bfe3a2ebad8e89', '', 0),
(152, 'Mr.R. Sureshbabu', 'sureshbabu-mech', 1, '', 1, 'a305512f08799656d2af675dc5c2d348', '', 0),
(153, 'Mr.S. Chinnathambi', 'chinnathambi-mech', 1, '', 1, '51bb708e43709f0b92e54053d8ed27bf', '', 0),
(154, 'Mr.S. Sathyanarayanan', 'sathyanarayanan-mech', 1, '', 1, 'd298988125509c43881cac5821e53851', '', 0),
(155, 'Ms.A. Mercy Vasan', 'mercyvasan-mech', 1, '', 1, '9ffc50af0bb0189857c36be194c79ec4', '', 0),
(156, 'Dr.R. Rekha', 'rekha-mech', 1, '', 1, 'fc9a7e535a8f0790203a5547c44cd7af', '', 0),
(157, 'Mr.N. Sathiya Narayanan', 'sathiya-mech', 1, '', 1, 'ce0d8d3151e0ab5467144d8375ed2cd2', '', 0),
(158, 'Mr.R. Kumar', 'kumarr-mech', 1, '', 1, '817c905c89f0ee98ba276a954e325565', '', 0),
(159, 'Mr.S. Karthikeyan', 'karthikeyan-mech', 1, '', 1, '0e2ecad790b6c8cf816300c9c84d4756', '', 0),
(160, 'Mr.M. Sridharan', 'sridharan-mech', 1, '', 1, '8a46f932e53b40dbd6e2aed6e8fe58d3', '', 0),
(161, 'Mr.A. Ranjith Raj', 'ranjith-mech', 1, '', 1, '15bbfb9a7b9f1e7c7eb38b61f7fe64e0', '', 0),
(162, 'Mr.K. Amarnath', 'amar-mech', 1, '', 1, '7003e8eccc9801eedd3a517975a3dc93', '', 0),
(163, 'Mr.S. Paramaguru', 'paramaguru-mech', 1, '', 1, '88f7e205d5986a28ff1312a8ab3f8ffe', '', 0),
(164, 'Dr.N. Raghothaman', 'raghothaman-phy', 1, '', 1, '8e03a56633c98e1770a3c87d447e4909', '', 0),
(165, 'Mr.P. Senthilkumar', 'senthilkumar-phy', 1, '', 1, 'b81c29639a2b087cf25ec7c40627beac', '', 0),
(166, 'Ms.V. Saraswathi', 'saraswathi-phy', 1, '', 1, '26aebd349b9bd59b2130fdad700e1c6e', '', 0),
(167, 'Ms.R. Kavitha', 'kavitha-phy', 1, '', 1, '35adef1329ed517cac28aae988191716', '', 0),
(168, 'Mr.G. Anantha Krishnan', 'ananthakrishnan-phy', 1, '', 1, 'fc9bf763ac4987ab6541ebdbdf027ad7', '', 0),
(169, 'Ms.P. Saravana Devi', 'saravanadevi-phy', 1, '', 1, 'ae58447dd5a6c1c04eceeff0cfd54fd6', '', 0),
(171, 'Dr.N. Baskar', 'baskar-mech', 1, '', 1, '969b43bdda98e16f93d63827d765c883', '', 0),
(173, 'Ms.A. Hema', 'hema-che', 1, '', 1, '14af56b17365be28b6855d99752832a8', '', 0),
(174, 'Mr.M. Shanmugasundharam', 'sundharam-mech', 1, '', 1, '0af37a931728daa10f4234f422e9672b', '', 0),
(175, 'Dr.M. Ganesan', 'ganesan-mech', 1, '', 1, '7a0a57df84e64c57b3fbba5f4bbff81a', '', 0),
(176, 'Ms.S. Menaka Devi', 'menaka-che', 1, '', 1, '4c413fc7ca4229032ff47ee384378494', '', 0),
(177, 'Ms.G. Thulasi', 'thulasi-che', 1, '', 1, '4152f5a2af5e1d700fdf1f2673047b34', '', 0),
(178, 'Ms.T. Siron Anita Susan', 'anitasusan-it', 1, '', 1, '3c8f34577fbdd01b31ae247ac9a63ff8', '', 0),
(179, 'Mr.S. Ramachandran', 'ramachandran-ice', 1, '', 1, '7a6913b3b96ae2b6d942aa5feeec8cb2', '', 0),
(180, 'Ms.V. Aarthi', 'aarthi-ece', 1, '', 1, '1728a8170760d401e863b3440412ecb1', '', 0),
(181, 'Mr.S. Sriraman Balaji', 'sriramanbalaji-ece', 1, '', 1, 'da109339f75cbb6fb0a8cf8901b38696', '', 0),
(182, 'Mr.P. Reginald Elvis', 'reginaldelvis-mech', 1, '', 1, 'd9ac95766be1341add094b545a376f99', '', 0),
(183, 'Mr.R. Murali', 'murali-mba', 1, '', 1, '94a2bb48aace070499175f15962a4452', '', 0),
(184, 'Dr.M. Bhuvaneswari', 'bhuvaneswari-eng', 1, '', 1, '224e40f400281fb9ca651f755787d985', '', 0),
(185, 'Mr.P.B.. Arun Prasad', 'arunprasad-it', 1, '', 1, '6859bc50e6c6c4b6a5bedd7286dd32ff', '', 0),
(186, 'Ms.P. Magdelin Jennifer Princy', 'magdelin-eee', 1, '', 1, '27fd80f83310b4953974be3c56a049a6', '', 0),
(187, 'Ms.K. Muthukarupaee', 'muthukarupaee-it', 1, '', 1, 'a0473200351122323b1e341cd616c24b', '', 0),
(188, 'Mr.R. Vijay', 'vijay-eee', 1, '', 1, '7c6502baaf7b0588cc2bca204a09a00b', '', 0),
(189, 'Ms.P. Sathiya', 'sathiya-ice', 1, '', 1, '4efaf74ad28579b45ae5f447da22f065', '', 0),
(190, 'Ms.M. Lakshmiprabha', 'lakshmiprabha-ece', 1, '', 1, 'bfde0fd363db565a65b9b1c6a9535fe4', '', 0),
(191, 'Ms.T. Devashena', 'devashena-ice', 1, '', 1, '02d428b3905263b7613e27ef620345b8', '', 0),
(192, 'Mr.B. JOHNSON JOSEPH JEBAKUMAR', 'johnson-mech', 1, '', 1, '06ce056c6b9cbf439147d089dbcaab1a', '', 0),
(193, 'Mr.A. Stanley Jesudaiyan ', 'stanley-eee', 1, '', 1, 'cc0e353da13a2369f417f3573e9be8d8', '', 0),
(194, 'Dr.A. Rameshbabu', 'rameshbabu-it', 1, '', 1, '438960f793fc7a82305b988f318e612a', '', 0),
(195, 'Mr.J. SIVASUBRAMANIAN', 'siva-mech', 1, '', 1, '09cd34a5b2a7d4675c6fedd4dc0f461c', '', 0),
(196, 'Mr.E. Navin Prasad', 'navinprasad-mech', 1, '', 1, 'f50c819ee46425e7816ffbf706241095', '', 0),
(197, 'Ms.K. Gaayathry', 'gaayathry-eee', 1, '', 1, '31d50a3eadb31e1d08d1fa6f9d8b60dd', '', 0),
(198, 'Dr.D. VALAVAN', 'principal', 1, '', 1, 'e7d715a9b79d263ae527955341bbe9b1', '', 0),
(199, 'Mr.A.. Maria Jackson', 'jackson-mech', 1, '', 1, '90601f2986ce44d4e1e7e5832f4dff3c', '', 0),
(200, 'Mr.S. Syed Muthaliff', 'syed-mba', 1, '', 1, '695f5ac3bcd0b1b5a1018b13146acf6c', '', 0),
(202, 'Dr.K. Karthik Subramanian', 'karthik-mba', 1, '', 1, 'a6698f4acd2f84be640b84666bd3a75a', '', 0),
(203, 'Mr.S. SIVAKUMAR', 'sivakumar-eee', 1, '', 1, '4237047f238bff414806de6b30cbc5cb', '', 0),
(204, 'Ms.S. Anupriya', 'anu-mat', 1, '', 1, '5feeed38ed36ada8fefe04f6f0592438', '', 0),
(205, 'Dr.M R. Anantha Padmanaban', 'mrpadmanaban-mech', 1, '', 1, '421ad843c330b396ab7bccb079faa219', '', 0),
(206, 'Mr.M. Sriram Prasanth', 'sriram-mech', 1, '', 1, '48aa5486caee25675624cb9c637db5e0', '', 0),
(207, 'Dr.S.M. Girirajkumar', 'girirajkumar-ice', 1, '', 1, '7acc081470b6d7bb7cf4c18eae87817b', '', 0),
(208, 'Ms.N. Gayathri', 'gayathri-eee', 1, '', 1, '9476525e4cad38c193d341372dda8750', '', 0),
(209, 'Mr.J. Anthuvan Stephen Edberk', 'anthuvanstephen-mech', 1, '', 1, '119a634255e33c9995949c6af4dcb659', '', 0),
(210, 'Mr.B. Vikram', 'vikram-mech', 1, '', 1, '4e667b9b1ed345c13256538b09a39d27', '', 0),
(211, 'Mr.S. Balakrishnan', 'balakrishnan-mech', 1, '', 1, '397d435692753bc6195747db59f94b31', '', 0),
(212, 'Dr.V. Mahalakshmi', 'mahalakshmi-mba', 1, '', 1, 'ffe8efdb5c10c5f96003b3baef865836', '', 0),
(213, 'Dr.R. Sumathi', 'sumathi-it', 1, '', 1, '54a8652f46a33769ac74abc201714a77', '', 0),
(214, 'Mr.G. Mahesh', 'mahesh-mech', 1, '', 1, '3c3cf872967c90b9687d32c56449a836', '', 0),
(215, 'Mr.S. Sivamani', 'sivamani-mat', 1, '', 1, 'b40e96033a998d1e679d0ea2e611bb5e', '', 0),
(216, 'Ms.G. Lakshmi', 'lakshmi-ece', 1, '', 1, '739346ac472ea4063b649ca8e49abcc6', '', 0),
(217, 'Ms.M. Anthuvan Lydia', 'anthuvanlydia-ece', 1, '', 1, '7ce5bf4e2598e789ef696129b8d6baab', '', 0),
(218, 'Mr.P. Jothi Palavesam', 'jothi-mech', 1, '', 1, 'fbc2b5dd233bbe09e50db95f0654663d', '', 0),
(219, 'Dr.M. Shanmugavalli', 'shanmugavalli-ice', 1, '', 1, '4c6f733d2e399baca57f2a6a7cbdc8da', '', 0),
(220, 'Ms.M.R. Baqheetha Fathima', 'baqheetha-eee', 1, '', 1, '03398db2ff13be8436a2a1998cf7d987', '', 0),
(221, 'Mr.A. Saravanan', 'saravanan-mech', 1, '', 1, '333cfaea88a28d25e14705fd31048703', '', 0),
(222, 'Mr.P V. Rajesh', 'rajesh-mech', 1, '', 1, '83b0c1248e6eb2ea22c91d6b09e8368b', '', 0),
(223, 'Dr.S. Priyarega', 'priyarega-che', 1, '', 1, '2d1a8b4e18dec2655d182d7f7183a9d2', '', 0),
(224, 'Mr.P. Kalidoss', 'kalidoss-mech', 1, '', 1, '3ce815ea7953681e2bc58308e218c595', '', 0),
(226, 'Ms.M. Eazhisai Vallabi', 'eazhisaivallabi-ice', 1, '', 1, '121fe89e5625113426e77f0f8ecf8606', '', 0),
(227, 'Dr.A. Gopikrishnan', 'gopi-ice', 1, '', 1, '395ea634d4c4e04091544c525e5e30a4', '', 0),
(228, 'Mr.J. Rajesh', 'rajesh-mba', 1, '', 1, 'ede47f9356a4487314dee5d36347ef3e', '', 0),
(229, 'Mr.E. SENTHILKUMAR', 'senthil-ece', 1, '', 1, 'ff58f76946e76efebc1c6f1a6263d010', '', 0),
(230, 'Mr.S. Vinoth Kumar', 'vinothkumar-mech', 1, '', 1, 'f91ccd132d856d7be4fef48347ff1557', '', 0),
(231, 'Mr.K. Karthikeyan', 'karthikeyan-phy', 1, '', 1, 'f26ff1323d9b9a2ee130fd31b9a5d655', '', 0),
(232, 'Dr.J. Priya', 'priya-eng', 1, '', 1, 'fa08501b793be7ed5642ec2fef68affe', '', 0),
(233, 'Dr.R. Neelambari', 'neelambari-mat', 1, '', 1, '2a38b5ba580492cdd189abeba3f51198', '', 0),
(234, 'Dr.C. Krishnakumar', 'krishnakumar-eee', 1, '', 1, 'd18edad7a90cbb20d25bb45d64f36ab6', '', 0),
(235, 'Ms.R.S. Shiva Ranjani', 'shivaranjani-mech', 1, '', 1, 'c4818ec7318e130e192f83db7cd1dffa', '', 0),
(237, 'Ms.R. Anila', 'anila-ece', 1, '', 1, '9aee724465c4410d42704bea3828c23b', '', 0),
(238, 'Dr.M.V. Suganyadevi', 'suganyadevi-eee', 1, '', 1, '525842c0df42cbf670a9469c3d0a7234', '', 0),
(239, 'Ms.A.R. Danila Shirly', 'danila-eee', 1, '', 1, 'd98e5a975f4a364e85b413e421b20b80', '', 0),
(240, 'Mr.R. Vigneshwaran', 'vigneshwaran-mech', 1, '', 1, '9a3d2f18cd97d77c69603ff413f971e1', '', 0),
(241, 'Mr.A. Anandraj', 'anandraj-ce', 1, '', 1, '62aa81546e0c0a32eb3194470720a523', '', 0),
(242, 'Mr.P. Vigneshwar', 'vigneshwar-mech', 1, '', 1, '7c5cacf43a569ecd3d80064ea32ee5b7', '', 0),
(243, 'Ms.S. Sophia Christabel', 'sophiachristabel-ce', 1, '', 1, 'ac0429c54c78f8f413f06a7deb5bbe79', '', 0),
(244, 'Ms.N. Karthika', 'karthika-eee', 1, '', 1, '888c67737103f233a8e6ceaba0db28f2', '', 0),
(246, 'Ms.R. Devi', 'devi-ece', 1, '', 1, '4c24aaaa52f882d25fabffd30914feb3', '', 0),
(249, 'Ms.R. Vaishanavi', 'vaishanavi-ece', 1, '', 1, '15b3136bb623472ce2b54d0db145cace', '', 0),
(250, 'Ms.R. Keerthana', 'keerthana-it', 1, '', 1, '71dcdda5d904a77bd7b886abeb099d03', '', 0),
(251, 'Ms.M. Banu Sundareswari', 'banusundareswari-ice', 1, '', 1, '68f7b5c82584bf2b3368fa30fd0931bb', '', 0),
(252, 'Mr.. Kattera Sai Krishna', 'saikrishna-mech', 1, '', 1, '4dd3225be8b91900f4f913cbd154bef0', '', 0),
(253, 'Mr.Sd.. Sairam', 'sairam-ece', 1, '', 1, 'eb10d54330667f6edfff79c694ddb174', '', 0),
(254, 'Mr.V. Dinesh', 'dinesh-ece', 1, '', 1, '22fe52f12a0b96963e6a6d71e64bdab1', '', 0),
(255, 'Mr.P. Thirumurugan', 'thirumurugan-ice', 1, '', 1, 'b6a46f2c8adca9e008b8eb56fbf1e529', '', 0),
(256, 'Mr.P.K. Arunkumar', 'arunkumar-eee', 1, '', 1, '71e64f6310d7478f675bf994965dc671', '', 0),
(257, 'Ms.R. Gayathri', 'gayathri-ce', 1, '', 1, 'b3e3f779bbea5f9db116770bd7613aa3', '', 0),
(258, 'Ms.V. Ajitha', 'ajitha-eee', 1, '', 1, '6dc4b79c704bc805e415ffa3f291b77c', '', 0),
(259, 'Mr.S. Vijayabaskaran', 'vijayabaskaran-ce', 1, '', 1, '52c4dfd77b33103fec4f6dcc87cbadef', '', 0),
(260, 'Mr.M. Rajiv', 'rajiv-ce', 1, '', 1, '4ddbbb4a8330a0fbb7c993899538339f', '', 0),
(262, 'Ms.P. Pushpa', 'ppushpa-eee', 1, '', 1, '013aa2b27409417090231e2dea105321', '', 0),
(265, 'Ms.R. Anuradha', 'anuradha-ce', 1, '', 1, 'c74764af264d226c8e650355aaa2fd15', '', 0),
(266, 'Dr.B. Venkatesh', 'venkatesh-mat', 1, '', 1, 'b394292ce1447831b9fa857e273d4c89', '', 0),
(267, 'Dr.S. Thamizharasan', 'thamizharasan-eee', 1, '', 1, '794d295f09531e4e7319a11c89cacc01', '', 0),
(268, 'Mr.V. Koushick', 'koushick-ece', 1, '', 1, '8b60dfa39d9c40ee2d29f2c83e7f220e', '', 0),
(269, 'Ms.A. Christy Arockia Rani', 'christy-ice', 1, '', 1, 'ac9215019eefb549b93ffdd5a682afd3', '', 0),
(270, 'Ms.K. Ezhilarasi', 'ezhilarasi-ice', 1, '', 1, '64418ae8c21111dbc583de01314472d5', '', 0),
(273, 'Mr.R. Seetharaman', 'seetharaman-ice', 1, '', 1, '401ce6f68b5e34f402e2d3996debd286', '', 0),
(274, 'Mr.M. Ganesh Kumar', 'ganeshkumarm-mech', 1, '', 1, '5d1b5f7300108ba30fffe43b248826f0', '', 0),
(275, 'Ms.J. Debbie Raeshma', 'debbieraeshma-ce', 1, '', 1, '82c9de816ac1e9fbd47ef5f43ddee5f6', '', 0),
(276, 'Mr.J. Sivasubramanian', 'sivasubramanian-mech', 1, '', 1, '4deaedd77478fba413679ecf644059ee', '', 0),
(277, 'Mr.R. Venugopal', 'venugopal-eee', 1, '', 1, 'f44c4d6c4a58001fccc4da86c17c2fcb', '', 0),
(278, 'Mr.S. Saravanan', 'saravanan-ece', 1, '', 1, '364c637351b30a044c79aca852a67713', '', 0),
(279, 'Mr.T. Tamilarasan', 'tamilarasant-eee', 1, '', 1, 'f982ba9123e3d45ace4ef31a3359ca70', '', 0),
(282, 'Ms.B. Deepa', 'deepa-ice', 1, '', 1, 'f08ac2862f4a7d9a63adb9559ec07355', '', 0),
(283, 'Mr.R. Sripragadeesh', 'sripragadeesh-ce', 1, '', 1, '0b3a4a2916e9614461520f916d290236', '', 0),
(284, 'Ms.P. Vaishali', 'vaishali-ce', 1, '', 1, 'd8351b22a749aaa8fb6cb6abefde2ff7', '', 0),
(285, 'Ms.A. Sagaya Bastina', 'sagayabastina-ce', 1, '', 1, 'a91f17729ec8c4c5c042e5a33e6241a1', '', 0),
(286, 'Ms.N. Saranaya', 'saranya-eee', 1, '', 1, '504a04a31a7ce7bbf074d2f387d84726', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `reg` int(2) NOT NULL DEFAULT '17'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`sub_id`, `sub_code`, `sub_name`, `dept_id`, `year`, `sem`, `reg`) VALUES
(1, 'BA7101', 'PRINCIPLES OF MANAGEMENT', 1, 1, 1, 13),
(2, 'BA7102', 'STATISTICS FOR MANAGEMENT', 1, 1, 1, 13),
(3, 'BA7103', 'ECONOMIC ANALYSIS FOR BUSINESS', 1, 1, 1, 13),
(4, 'BA7104', 'TOTAL QUALITY MANAGEMENT', 1, 1, 1, 13),
(5, 'BA7105', 'ORGANIZATIONAL BEHAVIOUR', 1, 1, 1, 13),
(6, 'BA7106', 'ACCOUNTING FOR MANAGEMENT', 1, 1, 1, 13),
(7, 'BA7107', 'LEGAL ASPECTS OF BUSINESS', 1, 1, 1, 13),
(8, 'BA7108', 'WRITTEN COMMUNICATION', 1, 1, 1, 13),
(9, 'MA7151', 'MATHEMATICAL FOUNDATION FOR COMPUTER APPLICATION', 1, 1, 1, 13),
(10, 'MC7101', 'COMPUTER ORGANIZATION', 1, 1, 1, 13),
(11, 'MC7102', 'PROBLEM SOLVING AND PROGRAMMING', 1, 1, 1, 13),
(12, 'MC7103', 'DATABASE MANAGEMENT SYSTEMS', 1, 1, 1, 13),
(13, 'MC7104', 'DATA STRUCTURES AND ALGORITHMS', 1, 1, 1, 13),
(14, 'MC7111', 'DBMS LABORATORY', 1, 1, 1, 13),
(15, 'MC7112', 'DATA STRUCTURES AND ALGORITHMS LABORATORY', 1, 1, 1, 13),
(16, 'MC7113', 'COMMUNICATION SKILLS LABORATORY', 1, 1, 1, 13),
(17, 'MA7163', 'APPLIED MATHEMATICS FOR ELECTRICAL ENGINEERS', 1, 1, 1, 13),
(18, 'PX7101', 'ANALYSIS OF ELECTRICAL MACHINES', 1, 1, 1, 13),
(19, 'PX7102', 'ANALYSIS OF POWER CONVERTERS', 1, 1, 1, 13),
(20, 'PX7103', 'ANALYSIS AND DESIGN OF INVERTERS', 1, 1, 1, 13),
(21, 'PX7104', 'ADVANCED POWER SEMICONDUCTOR DEVICES', 1, 1, 1, 13),
(22, 'MA7158', 'APPLIED MATHEMATICS FOR COMMUNICATION ENGINEERS', 1, 1, 1, 13),
(23, 'CU7101', 'ADVANCED RADIATION SYSTEMS', 1, 1, 1, 13),
(24, 'CU7102', 'ADVANCED DIGITAL COMMUNICATION TECHNIQUES', 1, 1, 1, 13),
(25, 'AP7101', 'ADVANCED DIGITAL SIGNAL PROCESSING', 1, 1, 1, 13),
(26, 'CU7103', 'OPTICAL NETWORKS', 1, 1, 1, 13),
(27, 'CU7111', 'COMMUNICATION SYSTEMS LABORATORY', 1, 1, 1, 13),
(28, 'MA7169', 'ADVANCED NUMERICAL METHODS', 1, 1, 1, 13),
(29, 'TE7101', 'ADVANCED HEAT TRANSFER', 1, 1, 1, 13),
(30, 'TE7102', 'ADVANCED THERMODYNAMICS', 1, 1, 1, 13),
(31, 'TE7103', 'ADVANCED ENGINEERING FLUID MECHANICS', 1, 1, 1, 13),
(32, 'TE7104', 'FUELS AND COMBUSTION', 1, 1, 1, 13),
(33, 'TE7111', 'THERMAL ENGINEERING LABORATORY', 1, 1, 1, 13),
(34, 'AP7202', 'ASIC  AND  FPGA DESIGN', 1, 1, 1, 13),
(35, 'SEMINAR', 'SEMINAR', 1, 1, 1, 13),
(36, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(37, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(38, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(39, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(40, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(41, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(42, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(43, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(44, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(45, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(46, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(47, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(48, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(49, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(50, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(51, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(52, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(53, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(54, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(55, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(56, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(57, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(58, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(59, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(60, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(61, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(62, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(63, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(64, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(65, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(66, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(67, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(68, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(69, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(70, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(71, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(72, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(73, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(74, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(75, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(76, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(77, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(78, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(79, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(80, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(81, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(82, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(83, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(84, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(85, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(86, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(87, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(88, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(89, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(90, 'MC7211', 'OBJECT ORIENTED PROGRAMMING LAB', 1, 1, 1, 13),
(91, 'MC7212', 'WEB PROGRAMMING LAB', 1, 1, 1, 13),
(92, 'MC7213', 'GRAPHICS AND MULTIMEDIA LAB', 1, 1, 1, 13),
(93, 'MC7201', 'OBJECT ORIENTED PROGRAMMING', 1, 1, 1, 13),
(94, 'MC7202', 'WEB PROGRAMMING', 1, 1, 1, 13),
(95, 'MC7203', 'SYSTEM SOFTWARE', 1, 1, 1, 13),
(96, 'MC7204', 'OPERATING SYSTEMS', 1, 1, 1, 13),
(97, 'MC7205', 'COMPUTER GRAPHICS & MULTIMEDIA', 1, 1, 1, 13),
(98, 'CS6201', 'DIGITAL PRINCIPLES AND SYSTEM DESIGN', 1, 1, 1, 13),
(99, 'CS6212', 'PROGRAMMING AND DATA STRUCTURES LABORATORY-I', 1, 1, 1, 13),
(100, 'CS6211', 'DIGITAL LABORATORY', 1, 1, 1, 13),
(101, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(102, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(103, 'CS6202', 'PROGRAMMING AND DATA STRUCTURES -I', 1, 1, 1, 13),
(104, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(105, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(106, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(107, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(108, 'EC6201', 'ELECTRONIC DEVICES', 1, 1, 1, 13),
(109, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(110, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(111, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(112, 'EC6211', 'CIRCUIT AND DEVICES LABORATORY', 1, 1, 1, 13),
(113, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(114, 'EE6201', 'CIRCUIT THEORY', 1, 1, 1, 13),
(115, 'GE6263', 'COMPUTER PROGRAMMING LABORATORY', 1, 1, 1, 13),
(116, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(117, 'GE6251', 'BASIC CIVIL AND MECHANICAL ENGINEERING', 1, 1, 1, 13),
(118, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(119, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(120, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(121, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(122, 'EE6211', 'ELECTRIC CIRCUITS LABORATORY', 1, 1, 1, 13),
(123, 'EE6201', 'CIRCUIT THEORY', 1, 1, 1, 13),
(124, 'BA7201', 'OPERATIONS MANAGEMENT', 1, 1, 1, 13),
(125, 'BA7205', 'INFORMATION MANAGEMENT', 1, 1, 1, 13),
(126, 'BA7206', 'APPLIED OPERATIONS RESEARCH', 1, 1, 1, 13),
(127, 'BA7208', 'TITLE NOT AVAILABLE', 1, 1, 1, 13),
(128, 'BA7207', 'BUSINESS RESEARCH METHODS', 1, 1, 1, 13),
(129, 'BA7203', 'MARKETING MANAGEMENT', 1, 1, 1, 13),
(130, 'BA7202', 'FINANCIAL MANAGEMENT', 1, 1, 1, 13),
(131, 'BA7204', 'HUMAN RESOURCE MANAGEMENT', 1, 1, 1, 13),
(132, 'DS7071', 'SPEECH AND AUDIO SIGNAL PROCESSING', 1, 1, 1, 13),
(133, 'AP7301', 'ELECTROMAGNETIC INTERFERENCE AND COMPATIBILITY', 1, 1, 1, 13),
(134, 'CU7003', 'DIGITAL COMMUNICATION RECEIVERS', 1, 1, 1, 13),
(135, 'CU7211', 'INNOVATIVE SYSTEM DESIGN LABORATORY', 1, 1, 1, 13),
(136, 'CU7202', 'MIC AND RF SYSTEM DESIGN', 1, 1, 1, 13),
(137, 'NC7101', 'HIGH PERFORMANCE NETWORKS', 1, 1, 1, 13),
(138, 'CU7201', 'WIRELESS COMMUNICATION NETWORKS', 1, 1, 1, 13),
(139, 'PX7211', 'POWER ELECTRONICS AND DRIVES LAB', 1, 1, 1, 13),
(140, 'PS7002', 'ENERGY MANAGEMENT AND AUDITING', 1, 1, 1, 13),
(141, 'PX7202', 'SOLID STATE AC DRIVES', 1, 1, 1, 13),
(142, 'PX7002', 'SMPS AND UPS', 1, 1, 1, 13),
(143, 'PX7201', 'SOLID STATE DC DRIVES', 1, 1, 1, 13),
(144, 'PX7204', 'POWER QUALITY', 1, 1, 1, 13),
(145, 'PX7203', 'SPECIAL ELECTRICAL MACHINES', 1, 1, 1, 13),
(146, 'EY7008', 'NUCLEAR ENGINEERING', 1, 1, 1, 13),
(147, 'TE7212', 'SIMULATION LABORATORY', 1, 1, 1, 13),
(148, 'TE7008', 'ENERGY MANAGEMENT IN THERMAL SYSTEMS', 1, 1, 1, 13),
(149, 'TE7007', 'REFRIGERATION SYSTEMS DESIGN', 1, 1, 1, 13),
(150, 'TE7202', 'INSTRUMENTATION FOR THERMAL ENGINEERING', 1, 1, 1, 13),
(151, 'TE7211', 'SEMINAR-I', 1, 1, 1, 13),
(152, 'TE7201', 'DESIGN OF THERMAL SYSTEMS', 1, 1, 1, 13),
(153, 'TE7203', 'ENVIRONMENTAL ENGINEERING AND POLLUTION CONTROL', 1, 1, 1, 13),
(154, 'CS6201', 'DIGITAL PRINCIPLES AND SYSTEM DESIGN', 1, 1, 1, 13),
(155, 'IT6212', 'PROGRAMMING AND DATA STRUCTURES LABORATORY-I', 1, 1, 1, 13),
(156, 'IT6211', 'DIGITAL LABORATORY', 1, 1, 1, 13),
(157, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(158, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(159, 'CS6202', 'PROGRAMMING AND DATA STRUCTURES -I', 1, 1, 1, 13),
(160, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(161, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(162, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(163, 'GE6263', 'COMPUTER PROGRAMMING LABORATORY', 1, 1, 1, 13),
(164, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(165, 'GE6251', 'BASIC CIVIL AND MECHANICAL ENGINEERING', 1, 1, 1, 13),
(166, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(167, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(168, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(169, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(170, 'EE6211', 'ELECTRIC CIRCUITS LABORATORY', 1, 1, 1, 13),
(171, 'EE6201', 'CIRCUIT THEORY', 1, 1, 1, 13),
(172, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(173, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(174, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(175, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(176, 'GE6252', 'BASIC ELECTRICAL AND ELECTRONICS ENGINEERING', 1, 1, 1, 13),
(177, 'GE6253', 'ENGINEERING MECHANICS', 1, 1, 1, 13),
(178, 'GE6261', 'COMPUTER AIDED DRAFTING AND MODELLING LABORATORY', 1, 1, 1, 13),
(179, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(180, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(181, 'CS6301', 'PROGRAMMING AND DATA STRUCTURES II', 1, 1, 1, 13),
(182, 'CS6302', 'DATABASE MANAGEMENT SYSTEMS', 1, 1, 1, 13),
(183, 'CS6303', 'COMPUTER ARCHITECTURE', 1, 1, 1, 13),
(184, 'CS6304', 'ANALOG AND DIGITAL COMMUNICATION', 1, 1, 1, 13),
(185, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(186, 'CS6311', 'PROGRAMMING AND DATA STRUCTURE LABORATORY II', 1, 1, 1, 13),
(187, 'CS6312', 'DATABASE MANAGEMENT SYSTEMS LABORATORY', 1, 1, 1, 13),
(188, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(189, 'EE6352', 'ELECTRICAL ENGINEERING AND INSTRUMENTATION', 1, 1, 1, 13),
(190, 'EC6301', 'OBJECT ORIENTED PROGRAMMING AND DATA STRUCTURES', 1, 1, 1, 13),
(191, 'EC6302', 'DIGITAL ELECTRONICS', 1, 1, 1, 13),
(192, 'EC6303', 'SIGNALS AND SYSTEMS', 1, 1, 1, 13),
(193, 'EC6304', 'ELECTRONIC CIRCUITS- I', 1, 1, 1, 13),
(194, 'EC6311', 'ANALOG AND DIGITAL CIRCUITS LABORATORY', 1, 1, 1, 13),
(195, 'EC6312', 'OOPS AND DATA STRUCTURES LABORATORY', 1, 1, 1, 13),
(196, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(197, 'CS6301', 'PROGRAMMING AND DATA STRUCTURES II', 1, 1, 1, 13),
(198, 'CS6302', 'DATABASE MANAGEMENT SYSTEMS', 1, 1, 1, 13),
(199, 'CS6303', 'COMPUTER ARCHITECTURE', 1, 1, 1, 13),
(200, 'CS6304', 'ANALOG AND DIGITAL COMMUNICATION', 1, 1, 1, 13),
(201, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(202, 'IT6311', 'PROGRAMMING AND DATA STRUCTURES LABORATORY II', 1, 1, 1, 13),
(203, 'IT6312', 'DATABASE MANAGEMENT SYSTEMS LABORATORY', 1, 1, 1, 13),
(204, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(205, 'EE6301', 'DIGITAL LOGIC CIRCUITS', 1, 1, 1, 13),
(206, 'EE6302', 'ELECTROMAGNETIC THEORY', 1, 1, 1, 13),
(207, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(208, 'EC6202', 'ELECTRONIC DEVICES AND CIRCUITS', 1, 1, 1, 13),
(209, 'EE6303', 'LINEAR INTEGRATED CIRCUITS AND APPLICATIONS', 1, 1, 1, 13),
(210, 'EC6361', 'ELECTRONICS LABORATORY', 1, 1, 1, 13),
(211, 'EE6311', 'LINEAR AND DIGITAL INTEGRATED CIRCUITS LABORATORY', 1, 1, 1, 13),
(212, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(213, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(214, 'EE6301', 'DIGITAL LOGIC CIRCUITS', 1, 1, 1, 13),
(215, 'EC6202', 'ELECTRONIC DEVICES AND CIRCUITS', 1, 1, 1, 13),
(216, 'EE6303', 'LINEAR INTEGRATED CIRCUITS AND APPLICATIONS', 1, 1, 1, 13),
(217, 'EI6301', 'ELECTRICAL MEASUREMENTS', 1, 1, 1, 13),
(218, 'EC6361', 'ELECTRONICS LABORATORY', 1, 1, 1, 13),
(219, 'EE6311', 'LINEAR AND DIGITAL INTEGRATED CIRCUITS LABORATORY', 1, 1, 1, 13),
(220, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(221, 'CE6306', 'STRENGTH OF MATERIALS', 1, 1, 1, 13),
(222, 'ME6301', 'ENGINEERING THERMODYNAMICS', 1, 1, 1, 13),
(223, 'CE6451', 'FLUID MECHANICS AND MACHINERY', 1, 1, 1, 13),
(224, 'ME6302', 'MANUFACTURING TECHNOLOGY - I', 1, 1, 1, 13),
(225, 'EE6351', 'ELECTRICAL DRIVES AND CONTROLS', 1, 1, 1, 13),
(226, 'ME6311', 'MANUFACTURING TECHNOLOGY LABORATORY - I', 1, 1, 1, 13),
(227, 'CE6461', 'FLUID MECHANICS AND MACHINERY LABORATORY', 1, 1, 1, 13),
(228, 'EE6365', 'ELECTRICAL ENGINEERING LABORATORY', 1, 1, 1, 13),
(229, 'BA7301', 'ENTERPRISE RESOURCE PLANNING', 1, 1, 1, 13),
(230, 'BA7036', 'STRATEGIC HUMAN RESOURCE MANAGEMENT', 1, 1, 1, 13),
(231, 'BA7302', 'STRATEGIC MANAGEMENT', 1, 1, 1, 13),
(232, 'BA7311', 'PROFESSIONAL SKILL DEVELOPMENT', 1, 1, 1, 13),
(233, 'BA7312', 'SUMMER TRAINING', 1, 1, 1, 13),
(234, 'BA7034', 'INDUSTRIAL RELATIONS & LABOUR WELFARE', 1, 1, 1, 13),
(235, 'MC7301', 'COMPUTER NETWORKS', 1, 1, 1, 13),
(236, 'MC7302', 'EMBEDDED SYSTEMS', 1, 1, 1, 13),
(237, 'MC7303', 'SOFTWARE ENGINEERING', 1, 1, 1, 13),
(238, 'MC7304', 'PROFESSIONAL ETHICS', 1, 1, 1, 13),
(239, 'MC7305', 'INTERNET PROGRAMMING', 1, 1, 1, 13),
(240, 'MC7311', 'EMBEDDED SYSTEMS LABORATORY', 1, 1, 1, 13),
(241, 'MC7312', 'INTERNET PROGRAMMING LABORATORY', 1, 1, 1, 13),
(242, 'MC7313', 'VISUAL PROGRAMMING LABORATORY', 1, 1, 1, 13),
(243, 'PX7301', 'POWER ELECTRONICS FOR RENEWABLE ENERGY SYSTEMS', 1, 1, 1, 13),
(244, 'PX7311', 'PROJECT PHASE -1', 1, 1, 1, 13),
(245, 'PX7411', 'PROJECT PHASE-II', 1, 1, 1, 13),
(246, 'PS7005', 'HIGH VOLTAGE DIRECT CURRENT TRANSMISSION', 1, 1, 1, 13),
(247, 'ET7014', 'APPLICATION OF MEMS TECHNOLOGY', 1, 1, 1, 13),
(248, 'PS7004', 'SOLAR AND ENERGY STORAGE SYSTEMS', 1, 1, 1, 13),
(249, 'PS7007', 'WIND ENERGY CONVERSION SYSTEMS', 1, 1, 1, 13),
(250, 'PX7003', 'NON LINEAR DYNAMICS FOR POWER ELECTRONICS CIRCUITS', 1, 1, 1, 13),
(251, 'PS7008', 'SMART GRID', 1, 1, 1, 13),
(252, 'CU7301', 'ADVANCED SATELLITE BASED SYSTEMS', 1, 1, 1, 13),
(253, 'CU7311', 'PROJECT PHASE-I', 1, 1, 1, 13),
(254, 'CU7411', 'PROJECT PHASE-II', 1, 1, 1, 13),
(255, 'NC7001', 'NETWORK ROUTING ALGORITHMS', 1, 1, 1, 13),
(256, 'NC7202', 'WIRELESS ADHOC AND SENSOR NETWORKS', 1, 1, 1, 13),
(257, 'CU7007', 'INTERNETWORKING MULTIMEDIA', 1, 1, 1, 13),
(258, 'NC7002', 'MULTIMEDIA COMPRESSION TECHNIQUES', 1, 1, 1, 13),
(259, 'CU7008', 'ULTRA WIDE BAND COMMUNICATION', 1, 1, 1, 13),
(260, 'IF7301', 'SOFT COMPUTING', 1, 1, 1, 13),
(261, 'NC7003', 'NETWORK PROCESSOR', 1, 1, 1, 13),
(262, 'NE7007', 'NETWORK MANAGEMENT', 1, 1, 1, 13),
(263, 'NC7201', 'COMMUNICATION NETWORK SECURITY', 1, 1, 1, 13),
(264, 'CU7009', 'NEURAL NETWORKS AND APPLICATIONS', 1, 1, 1, 13),
(265, 'TE7311', 'SEMINAR II', 1, 1, 1, 13),
(266, 'TE7312', 'PROJECT PHASE-I', 1, 1, 1, 13),
(267, 'TE7411', 'PROJECT PHASE-II', 1, 1, 1, 13),
(268, 'EY7202', 'DESIGN AND ANALYSIS OF TURBOMACHINES', 1, 1, 1, 13),
(269, 'TE7009', 'BOUNDARY LAYER THEORY AND TURBULENCE', 1, 1, 1, 13),
(270, 'TE7010', 'ADVANCED POWER PLANT ENGINEERING', 1, 1, 1, 13),
(271, 'EY7010', 'STEAM GENERATOR TECHNOLOGY', 1, 1, 1, 13),
(272, 'TE7011', 'ADVANCED THERMAL STORAGE TECHNOLOGIES', 1, 1, 1, 13),
(273, 'TE7012', 'COGENERATION AND WASTE HEAT RECOVERY SYSTEMS', 1, 1, 1, 13),
(274, 'BA7032', 'ENTREPRENEURSHIP DEVELOPMENT', 1, 1, 1, 13),
(275, 'MA6453', 'PROBABILITY AND QUEUING THEORY', 1, 1, 1, 13),
(276, 'EC6504', 'MICROPROCESSOR AND MICROCONTROLLER', 1, 1, 1, 13),
(277, 'CS6402', 'DESIGN AND ANALYSIS OF ALGORITHMS', 1, 1, 1, 13),
(278, 'CS6401', 'OPERATING SYSTEMS', 1, 1, 1, 13),
(279, 'CS6403', 'SOFTWARE ENGINEERING', 1, 1, 1, 13),
(280, 'IT6411', 'MICROPROCESSOR AND MICROCONTROLLER LABORATORY', 1, 1, 1, 13),
(281, 'IT6412', 'OPERATING SYSTEMS LABORATORY', 1, 1, 1, 13),
(282, 'IT6413', 'SOFTWARE ENGINEERING LABORATORY', 1, 1, 1, 13),
(283, 'MA6453', 'PROBABILITY AND QUEUING THEORY', 1, 1, 1, 13),
(284, 'CS6551', 'COMPUTER NETWORKS', 1, 1, 1, 13),
(285, 'CS6401', 'OPERATING SYSTEMS', 1, 1, 1, 13),
(286, 'CS6402', 'DESIGN AND ANALYSIS OF ALGORITHMS', 1, 1, 1, 13),
(287, 'EC6504', 'MICROPROCESSOR AND MICROCONTROLLER', 1, 1, 1, 13),
(288, 'CS6403', 'SOFTWARE ENGINEERING', 1, 1, 1, 13),
(289, 'CS6411', 'NETWORKS LABORATORY', 1, 1, 1, 13),
(290, 'CS6412', 'MICROPROCESSOR AND MICROCONTROLLER LABORATORY', 1, 1, 1, 13),
(291, 'CS6413', 'OPERATING SYSTEMS LABORATORY', 1, 1, 1, 13),
(292, 'MA6459', 'NUMERICAL METHODS', 1, 1, 1, 13),
(293, 'EE6401', 'ELECTRICAL MACHINES-I', 1, 1, 1, 13),
(294, 'CS6456', 'OBJECT ORIENTED PROGRAMMING', 1, 1, 1, 13),
(295, 'EE6402', 'TRANSMISSION AND DISTRIBUTION', 1, 1, 1, 13),
(296, 'EE6403', 'DISCRETE TIME SYSTEMS AND SIGNAL PROCESSING', 1, 1, 1, 13),
(297, 'EE6404', 'MEASUREMENTS AND INSTRUMENTATION', 1, 1, 1, 13),
(298, 'CS6461', 'OBJECT ORIENTED PROGRAMMING LABORATORY', 1, 1, 1, 13),
(299, 'EE6411', 'ELECTRICAL MACHINES LABORATORY -I', 1, 1, 1, 13),
(300, 'MA6459', 'NUMERICAL METHODS', 1, 1, 1, 13),
(301, 'EI6401', 'TRANSDUCER ENGINEERING', 1, 1, 1, 13),
(302, 'EI6402', 'ELECTRICAL MACHINES', 1, 1, 1, 13),
(303, 'EE6403', 'DISCRETE TIME SYSTEMS AND SIGNAL PROCESSING', 1, 1, 1, 13),
(304, 'CS6456', 'OBJECT ORIENTED PROGRAMMING', 1, 1, 1, 13),
(305, 'EI6403', 'APPLIED THERMODYNAMICS AND FLUID DYNAMICS', 1, 1, 1, 13),
(306, 'EI6411', 'ELECTRICAL MACHINES LABORATORY', 1, 1, 1, 13),
(307, 'CS6461', 'OBJECT ORIENTED PROGRAMMING LABORATORY', 1, 1, 1, 13),
(308, 'MA6452', 'STATISTICS AND NUMERICAL METHODS', 1, 1, 1, 13),
(309, 'ME6401', 'KINEMATICS OF MACHINERY', 1, 1, 1, 13),
(310, 'ME6402', 'MANUFACTURING TECHNOLOGY-II', 1, 1, 1, 13),
(311, 'ME6403', 'ENGINEERING MATERIALS AND METALLURGY', 1, 1, 1, 13),
(312, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(313, 'ME6404', 'THERMAL ENGINEERING', 1, 1, 1, 13),
(314, 'ME6411', 'MANUFACTURING TECHNOLOGY LABORATORY-II', 1, 1, 1, 13),
(315, 'ME6412', 'THERMAL ENGINEERING LABORATORY -I', 1, 1, 1, 13),
(316, 'CE2315', 'STRENGTH OF MATERIALS LABORATORY', 1, 1, 1, 13),
(317, 'MA6451', 'PROBABILITY AND RANDOM PROCESSES', 1, 1, 1, 13),
(318, 'EC6401', 'ELECTRONIC CIRCUITS II', 1, 1, 1, 13),
(319, 'EC6402', 'COMMUNICATION THEORY', 1, 1, 1, 13),
(320, 'EC6403', 'ELECTROMAGNETIC FIELDS', 1, 1, 1, 13),
(321, 'EC6404', 'LINEAR INTEGRATED CIRCUITS', 1, 1, 1, 13),
(322, 'EC6405', 'CONTROL SYSTEM ENGINEERING', 1, 1, 1, 13),
(323, 'EC6411', 'CIRCUIT AND SIMULATION INTEGRATED LABORATORY', 1, 1, 1, 13),
(324, 'EC6412', 'LINEAR INTEGRATED CIRCUIT LABORATORY', 1, 1, 1, 13),
(325, 'EE6461', 'ELECTRICAL ENGINEERING AND CONTROL SYSTEM LABORATORY', 1, 1, 1, 13),
(326, 'CE6315', 'STENGTH OF MATERIALS LAB', 1, 1, 1, 13),
(327, 'BA7211', 'DATA ANALYSIS AND BUSINESS MODELING', 1, 1, 1, 13),
(328, 'BA7401', 'INTERNATIONAL BUSINESS MANAGEMENT', 1, 1, 1, 13),
(329, 'BA7402', 'BUSINESS ETHICS, CORPORATE SOCIAL RESPONSIBILITY AND GOVERNANCE', 1, 1, 1, 13),
(330, 'BA7411', 'CREATIVITY AND INNOVATION', 1, 1, 1, 13),
(331, 'BA7412', 'PROJECT WORK', 1, 1, 1, 13),
(332, 'CL7204', 'SOFT COMPUTING TECHNIQUES', 1, 1, 1, 13),
(333, 'DS7201', 'ADVANCED DIGITAL IMAGE PROCESSING', 1, 1, 1, 13),
(334, 'MC7005', 'SECURITY IN COMPUTING', 1, 1, 1, 13),
(335, 'MC7401', 'RESOURCE MANAGEMENT TECHNIQUES', 1, 1, 1, 13),
(336, 'MC7402', 'OBJECT ORIENTED ANALYSIS AND DESIGN', 1, 1, 1, 13),
(337, 'MC7403', 'DATA WAREHOUSING AND DATA MINING', 1, 1, 1, 13),
(338, 'MC7404', 'NETWORK PROGRAMMING', 1, 1, 1, 13),
(339, 'MC7411', 'SOFTWARE DEVELOPMENT- CASE TOOLS LABORATORY', 1, 1, 1, 13),
(340, 'MC7412', 'NETWORK PROGRAMMING LABORATORY', 1, 1, 1, 13),
(341, 'MC7413', 'TECHNICAL SEMINAR AND REPORT WRITING', 1, 1, 1, 13),
(342, 'EE6502', 'MICROPROCESSORS AND MICROCONTROLLERS', 1, 1, 1, 13),
(343, 'IC6501', 'CONTROL SYSTEMS', 1, 1, 1, 13),
(344, 'EI6501', 'ANALYTICAL INSTRUMENTS', 1, 1, 1, 13),
(345, 'EI6502', 'INDUSTRIAL INSTRUMENTATION - I', 1, 1, 1, 13),
(346, 'EE6503', 'POWER ELECTRONICS', 1, 1, 1, 13),
(347, 'EI6001', 'DATA STRUCTURES AND ALGORITHMS', 1, 1, 1, 13),
(348, 'EE6612', 'MICROPROCESSORS AND MICROCONTROLLERS LABORATORY', 1, 1, 1, 13),
(349, 'EI6511', 'TRANSDUCERS AND MEASUREMENTS LABORATORY', 1, 1, 1, 13),
(350, 'GE6563', 'COMMUNICATION AND SOFT SKILLS- LABORATORY BASED', 1, 1, 1, 13),
(351, 'ME6501', 'COMPUTER AIDED DESIGN', 1, 1, 1, 13),
(352, 'ME6502', 'HEAT AND MASS TRANSFER', 1, 1, 1, 13),
(353, 'ME6503', 'DESIGN OF MACHINE ELEMENTS', 1, 1, 1, 13),
(354, 'ME6504', 'METROLOGY AND MEASUREMENTS', 1, 1, 1, 13),
(355, 'ME6505', 'DYNAMICS OF MACHINES', 1, 1, 1, 13),
(356, 'GE6075', 'PROFESSIONAL ETHICS IN ENGINEERING', 1, 1, 1, 13),
(357, 'ME6511', 'DYNAMICS LABORATORY', 1, 1, 1, 13),
(358, 'PX7001', 'ELECTROMAGNETIC FIELD COMPUTATION & MODELLING', 1, 1, 1, 13),
(359, 'BA7021', 'SECURITY ANALYSIS AND PORTFOLIO MANAGEMENT', 1, 1, 1, 13),
(360, 'BA7024', 'CORPORATE FINANCE', 1, 1, 1, 13),
(361, 'BA7026', 'BANKING FINANCIAL SERVICES MANAGEMENT', 1, 1, 1, 13),
(362, 'BA7013', 'SERVICE MARKETING', 1, 1, 1, 13),
(363, 'BA7014', 'INTEGRATED MARKETING COMMUNICATION', 1, 1, 1, 13),
(364, 'ME6512', 'THERMAL ENGINEERING LABORATORY-II', 1, 1, 1, 13),
(365, 'GE6674', 'COMMUNICATION SKILLS-LABORATORY BASED', 1, 1, 1, 13),
(366, 'MC7501', 'WEB APPLICATION DEVELOPMENT', 1, 1, 1, 13),
(367, 'MC7502', 'SERVICE ORIENTED ARCHITECTURE', 1, 1, 1, 13),
(368, 'MC7503', 'MOBILE COMPUTING', 1, 1, 1, 13),
(369, 'MC7006', 'M-COMMERCE', 1, 1, 1, 13),
(370, 'MC7015', 'SOFTWARE PROJECT MANAGEMENT', 1, 1, 1, 13),
(371, 'MC7511', 'ADVANCED INTERNET PROGRAMMING LAB', 1, 1, 1, 13),
(372, 'MC7512', 'XML AND WEB SERVICES LAB', 1, 1, 1, 13),
(373, 'MC7513', 'MINI PROJECT', 1, 1, 1, 13),
(374, 'SEMINAR', 'SEMINAR', 1, 1, 1, 13),
(375, 'CS6601', 'DISTRIBUTED SYSTEMS', 1, 1, 1, 13),
(376, 'IT6601', 'MOBILE COMPUTING', 1, 1, 1, 13),
(377, 'CS6659', 'ARTIFICIAL INTELLIGENCE', 1, 1, 1, 13),
(378, 'CS6660', 'COMPILER DESIGN', 1, 1, 1, 13),
(379, 'IT6602', 'SOFTWARE ARCHITECTURE', 1, 1, 1, 13),
(380, 'CS6001', 'C# AND .NET', 1, 1, 1, 13),
(381, 'IT6611', 'MOBILE APPLICATION DEVELOPMENT LAB', 1, 1, 1, 13),
(382, 'IT6612', 'COMPILER LAB', 1, 1, 1, 13),
(383, 'GE6674', 'COMMUNICATION SKILLS-LABORATORY BASED', 1, 1, 1, 13),
(384, 'IT6313', 'DIGITAL COMMUNICATION LABORATORY', 1, 1, 1, 13),
(385, 'BA7012', 'RETAIL MANAGEMENT', 1, 1, 1, 13),
(386, 'ET7102', 'MICROCONTROLLER BASED SYSTEM DESIGN', 1, 1, 1, 13),
(387, 'ME6513', 'METROLOGY AND MEASUREMENTS LABORATORY', 1, 1, 1, 13),
(388, 'CS6601', 'DISTRIBUTED SYSTEMS', 1, 1, 1, 13),
(389, 'IT6601', 'MOBILE COMPUTING', 1, 1, 1, 13),
(390, 'CS6660', 'COMPILER DESIGN', 1, 1, 1, 13),
(391, 'IT6502', 'DIGITAL SIGNAL PROCESSING', 1, 1, 1, 13),
(392, 'CS6659', 'ARTIFICIAL INTELLIGENCE', 1, 1, 1, 13),
(393, 'CS6611', 'MOBILE APPLICATION DEVELOPMENT LABORATORY', 1, 1, 1, 13),
(394, 'CS6612', 'COMPILER LABORATORY', 1, 1, 1, 13),
(395, 'GE6674', 'COMMUNICATION SKILLS-LABORATORY BASED', 1, 1, 1, 13),
(396, 'ME6601', 'DESIGN OF TRANSMISSION SYSTEMS', 1, 1, 1, 13),
(397, 'MG6851', 'PRINCIPLES OF MANAGEMENT', 1, 1, 1, 13),
(398, 'ME6602', 'AUTOMOBILE ENGINEERING', 1, 1, 1, 13),
(399, 'ME6603', 'FINITE ELEMENT ANALYSIS', 1, 1, 1, 13),
(400, 'ME6604', 'GAS DYNAMICS AND JET PROPULSION', 1, 1, 1, 13),
(401, 'ME6611', 'C.A.D. / C.A.M. LABORATORY', 1, 1, 1, 13),
(402, 'ME6612', 'DESIGN AND FABRICATION PROJECT', 1, 1, 1, 13),
(403, 'GE6563', 'COMMUNICATION AND SOFT SKILLS- LABORATORY BASED', 1, 1, 1, 13),
(404, 'EI6601', 'MODERN ELECTRONIC INSTRUMENTATION', 1, 1, 1, 13),
(405, 'EI6602', 'PROCESS CONTROL', 1, 1, 1, 13),
(406, 'EI6603', 'INDUSTRIAL INSTRUMENTATION - II', 1, 1, 1, 13),
(407, 'IC6601', 'ADVANCED CONTROL SYSTEM', 1, 1, 1, 13),
(408, 'EC6651', 'COMMUNICATION ENGINEERING', 1, 1, 1, 13),
(409, 'EI6611', 'INDUSTRIAL INSTRUMENTATION LABORATORY', 1, 1, 1, 13),
(410, 'EI6612', 'PROCESS CONTROL LABORATORY', 1, 1, 1, 13),
(411, 'IC6611', 'PRESENTATION SKILLS AND TECHNICAL SEMINAR', 1, 1, 1, 13),
(412, 'EC6651', 'COMMUNICATION ENGINEERING', 1, 1, 1, 13),
(413, 'EE6601', 'SOLID STATE DRIVES', 1, 1, 1, 13),
(414, 'EE6602', 'EMBEDDED SYSTEMS', 1, 1, 1, 13),
(415, 'EE6603', 'POWER SYSTEM OPERATION AND CONTROL', 1, 1, 1, 13),
(416, 'EE6604', 'DESIGN OF ELECTRICAL MACHINES', 1, 1, 1, 13),
(417, 'EE6611', 'POWER ELECTRONICS AND DRIVES LABORATORY', 1, 1, 1, 13),
(418, 'EE6612', 'MICROPROCESSORS AND MICROCONTROLLERS LABORATORY', 1, 1, 1, 13),
(419, 'EE6613', 'PRESENTATION SKILLS AND TECHNICAL SEMINAR', 1, 1, 1, 13),
(420, 'MG6851', 'PRINCIPLES OF MANAGEMENT', 1, 1, 1, 13),
(421, 'CS6303', 'COMPUTER ARCHITECTURE', 1, 1, 1, 13),
(422, 'CS6551', 'COMPUTER NETWORKS', 1, 1, 1, 13),
(423, 'EC6601', 'VLSI DESIGN', 1, 1, 1, 13),
(424, 'EC6602', 'ANTENNA AND WAVE PROPAGATION', 1, 1, 1, 13),
(425, 'EC6611', 'COMPUTER NETWORKS LABORATORY', 1, 1, 1, 13),
(426, 'EC6612', 'VLSI DESIGN LABORATORY', 1, 1, 1, 13),
(427, 'GE6674', 'COMMUNICATION SKILLS-LABORATORY BASED', 1, 1, 1, 13),
(428, 'IT6702', 'DATA WAREHOUSING AND DATA MINING', 1, 1, 1, 13),
(429, 'EC6001', 'MEDICAL ELECTRONICS', 1, 1, 1, 13),
(430, 'EI6002', 'POWER PLANT INSTRUMENTATION', 1, 1, 1, 13),
(431, 'CS6001', 'C# AND .NET', 1, 1, 1, 13),
(432, 'ME6004', 'UNCONVENTIONAL MACHINING PROCESS', 1, 1, 1, 13),
(433, 'ME6003', 'RENEWABLE SOURCE OF ENERGY', 1, 1, 1, 13),
(434, 'EE6002', 'POWER SYSTEM TRANSIENTS', 1, 1, 1, 13),
(435, 'IT6701', 'INFORMATION MANAGEMENT', 1, 1, 1, 13),
(436, 'CS6701', 'CRYPTOGRAPHY AND NETWORK SECURITY', 1, 1, 1, 13),
(437, 'IT6702', 'DATA WARE HOUSING AND DATA MINING', 1, 1, 1, 13),
(438, 'CS6703', 'GRID AND CLOUD COMPUTING', 1, 1, 1, 13),
(439, 'IT6004', 'SOFTWARE TESTING', 1, 1, 1, 13),
(440, 'IT6711', 'DATA MINING LABORATORY', 1, 1, 1, 13),
(441, 'IT6712', 'SECURITY LABORATORY', 1, 1, 1, 13),
(442, 'IT6713', 'GRID AND CLOUD COMPUTING LABORATORY', 1, 1, 1, 13),
(443, 'CS6701', 'CRYPTOGRAPHY AND NETWORK SECURITY', 1, 1, 1, 13),
(444, 'CS6702', 'GRAPH THEORY AND APPLICATIONS', 1, 1, 1, 13),
(445, 'CS6703', 'GRID AND CLOUD COMPUTING', 1, 1, 1, 13),
(446, 'CS6704', 'RESOURCE MANAGEMENT TECHNIQUES', 1, 1, 1, 13),
(447, 'IT6801', 'SERVICE ORIENTED ARCHITECTURE', 1, 1, 1, 13),
(448, 'EC6703', 'EMBEDDED AND REAL TIME SYSTEMS', 1, 1, 1, 13),
(449, 'CS6711', 'SECURITY LABORATORY', 1, 1, 1, 13),
(450, 'CS6712', 'GRID AND CLOUD COMPUTING LABORATORY', 1, 1, 1, 13),
(451, 'IC6701', 'DIGITAL CONTROL SYSTEM', 1, 1, 1, 13),
(452, 'EI6702', 'LOGIC AND DISTRIBUTED CONTROL SYSTEM', 1, 1, 1, 13),
(453, 'EI6701', 'INDUSTRIAL DATA NETWORKS', 1, 1, 1, 13),
(454, 'EE6006', 'APPLIED SOFT COMPUTING', 1, 1, 1, 13),
(455, 'EI6704', 'BIOMEDICAL INSTRUMENTATION', 1, 1, 1, 13),
(456, 'EE6007', 'MICRO ELECTRO MECHANICAL SYSTEMS', 1, 1, 1, 13),
(457, 'IC6711', 'ADVANCED CONTROL SYSTEM LABORATORY', 1, 1, 1, 13),
(458, 'EI6711', 'INSTRUMENTATION SYSTEM DESIGN LABORATORY', 1, 1, 1, 13),
(459, 'IC6712', 'COMPREHENSION', 1, 1, 1, 13),
(460, 'EC6701', 'RF AND MICROWAVE ENGINEERING', 1, 1, 1, 13),
(461, 'EC6702', 'OPTICAL COMMUNICATION AND NETWORKS', 1, 1, 1, 13),
(462, 'EC6703', 'EMBEDDED AND REAL TIME SYSTEMS', 1, 1, 1, 13),
(463, 'EC6016', 'OPTO ELECTRONIC DEVICES', 1, 1, 1, 13),
(464, 'EC6007', 'SPEECH PROCESSING', 1, 1, 1, 13),
(465, 'IT6005', 'DIGITAL IMAGE PROCESSING', 1, 1, 1, 13),
(466, 'EC6711', 'EMBEDDED LABORATORY', 1, 1, 1, 13),
(467, 'EC6712', 'OPTICAL AND MICROWAVE LABORATORY', 1, 1, 1, 13),
(468, 'EE6701', 'HIGH VOLTAGE ENGINEERING', 1, 1, 1, 13),
(469, 'EE6702', 'PROTECTION AND SWITCH GEAR', 1, 1, 1, 13),
(470, 'EE6703', 'SPECIAL ELECTRICAL MACHINES', 1, 1, 1, 13),
(471, 'MG6851', 'PRINCIPLES OF MANAGEMENT', 1, 1, 1, 13),
(472, 'EE6005', 'POWER QUALITY', 1, 1, 1, 13),
(473, 'EE6008', 'MICRO CONTROLLER BASED SYSTEM DESIGN', 1, 1, 1, 13),
(474, 'EE6711', 'POWER SYSTEM SIMULATION LABORATORY', 1, 1, 1, 13),
(475, 'EE6712', 'COMPREHENSION', 1, 1, 1, 13),
(476, 'ME6701', 'POWER PLANT ENGINEERING', 1, 1, 1, 13),
(477, 'ME6702', 'MECHATRONICS', 1, 1, 1, 13),
(478, 'ME6703', 'COMPUTER INTEGRATED MANUFACTURING SYSTEMS', 1, 1, 1, 13),
(479, 'GE6757', 'TOTAL QUALITY MANAGEMENT', 1, 1, 1, 13),
(480, 'ME6012', 'MAINTENANCE ENGINEERING', 1, 1, 1, 13),
(481, 'ME6005', 'PROCESS PLANNING AND COST ESTIMATION', 1, 1, 1, 13),
(482, 'ME6711', 'SIMULATION AND ANALYSIS LAB', 1, 1, 1, 13),
(483, 'ME6712', 'MECHATRONICS LAB', 1, 1, 1, 13),
(484, 'ME6713', 'COMPREHENSION', 1, 1, 1, 13),
(485, 'BA7052', 'SERVICE OPERATIONS MANAGEMENT', 1, 1, 1, 13),
(486, 'BA7053', 'PROJECT MANAGEMENT', 1, 1, 1, 13),
(487, 'BA7035', 'LABOUR LEGISLATIONS', 1, 1, 1, 13),
(488, 'BA7051', 'LOGISTICS AND SUPPLY CHAIN MANAGEMENT', 1, 1, 1, 13),
(489, 'GE6674', 'COMMUNICATIONSKILLS - LABORATORY BASED', 1, 1, 1, 13),
(490, 'MC7611', 'PROJECT WORK', 1, 1, 1, 13),
(491, 'ME6811', 'PROJECT WORK', 1, 1, 1, 13),
(492, 'IE6605', 'PRODUCTION PLANNING AND CONTROL', 1, 1, 1, 13),
(493, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(494, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(495, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(496, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(497, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(498, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(499, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(500, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(501, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(502, 'IC7071', 'ADVANCED INTERNAL COMBUSTION ENGINEERING', 1, 1, 1, 13),
(503, 'MA6566', 'DISCRETE MATHEMATICS', 1, 1, 1, 13),
(504, 'CS6501', 'INTERNET PROGRAMMING', 1, 1, 1, 13),
(505, 'CS6502', 'OBJECT ORIENTED ANALYSIS AND DESIGN', 1, 1, 1, 13),
(506, 'CS6503', 'THEORY OF COMPUTATION', 1, 1, 1, 13),
(507, 'CS6504', 'COMPUTER GRAPHICS', 1, 1, 1, 13),
(508, 'CS6511', 'CASE TOOLS LABORATORY', 1, 1, 1, 13),
(509, 'CS6512', 'INTERNET PROGRAMMING LABORATORY', 1, 1, 1, 13),
(510, 'CS6513', 'COMPUTER GRAPHICS LABORATORY', 1, 1, 1, 13),
(511, 'EC6501', 'DIGITAL COMMUNICATION', 1, 1, 1, 13),
(512, 'EC6502', 'PRINCIPLES OF DIGITAL SIGNAL PROCESSING', 1, 1, 1, 13),
(513, 'EC6503', 'TRANSMISSION LINES AND WAVE GUIDES', 1, 1, 1, 13),
(514, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(515, 'EC6504', 'MICROPROCESSOR AND MICROCONTROLLER', 1, 1, 1, 13),
(516, 'EC6511', 'DIGITAL SIGNAL PROCESSING LABORATORY', 1, 1, 1, 13),
(517, 'EC6512', 'COMMUNICATION SYSTEM LABORATORY', 1, 1, 1, 13),
(518, 'EC6513', 'MICROPROCESSOR AND MICROCONTROLLER LABORATORY', 1, 1, 1, 13),
(519, 'EE6501', 'POWER SYSTEM ANALYSIS', 1, 1, 1, 13),
(520, 'EE6502', 'MICROPROCESSORS AND MICROCONTROLLERS', 1, 1, 1, 13),
(521, 'ME6701', 'POWER PLANT ENGINEERING', 1, 1, 1, 13),
(522, 'EE6503', 'POWER ELECTRONICS', 1, 1, 1, 13),
(523, 'EE6504', 'ELECTRICAL MACHINES II', 1, 1, 1, 13),
(524, 'IC6501', 'CONTROL SYSTEMS', 1, 1, 1, 13),
(525, 'EE6511', 'EE6511 CONTROL AND INSTRUMENTATION LABORATORY', 1, 1, 1, 13),
(526, 'GE6674', 'COMMUNICATION SKILLS-LABORATORY BASED', 1, 1, 1, 13),
(527, 'EE6512', 'ELECTRICAL MACHINES LABORATORY-II', 1, 1, 1, 13),
(528, 'CS6551', 'COMPUTER NETWORKS', 1, 1, 1, 13),
(529, 'IT6501', 'GRAPHICS AND MULTIMEDIA', 1, 1, 1, 13),
(530, 'CS6502', 'OBJECT ORIENTED ANALYSIS AND DESIGN', 1, 1, 1, 13),
(531, 'IT6502', 'DIGITAL SIGNAL PROCESSING', 1, 1, 1, 13),
(532, 'IT6503', 'WEB PROGRAMMING', 1, 1, 1, 13),
(533, 'EC6801', 'WIRELESS COMMUNICATION', 1, 1, 1, 13),
(534, 'IT6511', 'NETWORKS LABORATORY', 1, 1, 1, 13),
(535, 'IT6512', 'WEB PROGRAMMING LABORATORY', 1, 1, 1, 13),
(536, 'IT6513', 'CASE TOOLS LABORATORY', 1, 1, 1, 13),
(537, 'CS6701', 'CRYPTOGRAPHY AND NETWORK SECURITY', 1, 1, 1, 13),
(538, 'HS6151', 'TECHNICAL ENGILISH-1', 1, 1, 1, 13),
(539, 'MA6151', 'MATHEMATICS-1', 1, 1, 1, 13),
(540, 'PH6151', 'ENGINEERING PHYSICS -1', 1, 1, 1, 13),
(541, 'CY6151', 'ENGINEERING CHEMISTRY-1', 1, 1, 1, 13),
(542, 'GE6151', 'COMPUTER PROGRAMMING', 1, 1, 1, 13),
(543, 'GE6152', 'ENGINEERING GRAPHICS', 1, 1, 1, 13),
(544, 'GE6161', 'COMPUTER PRACTICES LABORATORY', 1, 1, 1, 13),
(545, 'GE6162', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 13),
(546, 'GE6163', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(547, 'PS7202', 'FLEXIBLE AC TRANSMISSION SYSTEMS', 1, 1, 1, 13),
(548, 'IT6801', 'SERVICE ORIENTED ARCHITECTURE', 1, 1, 1, 13),
(549, 'ME6016', 'ADVANCED I.C. ENGINES', 1, 1, 1, 13),
(550, 'MG6863', 'ENGINEERING ECONOMICS', 1, 1, 1, 13),
(551, 'IT6013', 'SOFTWARE QUALITY ASSURANCE', 1, 1, 1, 13),
(552, 'CS6004', 'CYBER FORENSICS', 1, 1, 1, 13),
(553, 'IT6811', 'PROJECT WORK', 1, 1, 1, 13),
(554, 'IC6811', 'PROJECT WORK', 1, 1, 1, 13),
(555, 'EI6801', 'COMPUTER CONTROL OF PROCESSES', 1, 1, 1, 13),
(556, 'EE6010', 'HIGH VOLTAGE DIRECT CURRENT TRANSMISSION', 1, 1, 1, 13),
(557, 'EE6811', 'PROJECT WORK', 1, 1, 1, 13),
(558, 'EE6801', 'ELECTRIC ENERGY GENERATION, UTILIZATION AND CONSERVATION', 1, 1, 1, 13),
(559, 'EC6802', 'WIRELESS NETWORKS', 1, 1, 1, 13),
(560, 'EC6018', 'MULTIMEDIA COMPRESSION AND COMMUNICATION', 1, 1, 1, 13),
(561, 'EC6811', 'PROJECT WORK', 1, 1, 1, 13),
(562, 'MG6088', 'SOFTWARE PROJECT MANAGEMENT', 1, 1, 1, 13),
(563, 'CS6801', 'MULTI ? CORE ARCHITECTURES AND PROGRAMMING', 1, 1, 1, 13),
(564, 'CS6811', 'PROJECT WORK', 1, 1, 1, 13),
(565, 'CS6008', 'HUMAN COMPUTER INTERACTION', 1, 1, 1, 13),
(566, 'IT6008', 'NETWORK PROGRAMMING AND MANAGEMENT', 1, 1, 1, 13),
(567, 'CP7008', 'SPEECH PROCESSING AND SYNTHESIS', 1, 1, 1, 13),
(568, 'EC6801', 'WIRELESS COMMUNICATION', 1, 1, 1, 13),
(569, 'GE6075', 'PROFESSIONAL ETHICS IN ENGINEERING', 1, 1, 1, 13),
(570, 'GE6075', 'PROFESSIONAL ETHICS IN ENGINEERING', 1, 1, 1, 13),
(571, 'MG6851', 'PRINCIPLES OF MANAGEMENT', 1, 1, 1, 13),
(572, 'MA6251', 'MATHEMATICS - II', 1, 1, 1, 13),
(573, 'GE6757', 'TOTAL QUALITY MANAGEMENT', 1, 1, 1, 13),
(574, 'HS6251', 'TECHNICAL ENGLISH - 2', 1, 1, 1, 13),
(575, 'PH6251', 'ENGINEERING PHYSICS-2', 1, 1, 1, 13),
(576, 'CY6251', 'ENGINEERING CHEMISTRY-2', 1, 1, 1, 13),
(577, 'GE6261', 'COMPUTER AIDED DRAFTING AND MODELLING LABORATORY', 1, 1, 1, 13),
(578, 'GE6253', 'ENGINEERING MECHANICS', 1, 1, 1, 13),
(579, 'GE6252', 'BASIC ELECTRICAL AND ELECTRONICS ENGINEERING', 1, 1, 1, 13),
(580, 'GE6262', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 13),
(581, 'MA5155', 'APPLIED MATHEMATICS FOR ELECTRICAL ENGINEERS', 1, 1, 1, 17),
(582, 'PX5101', 'POWER SEMICONDUCTOR DEVICES', 1, 1, 1, 17),
(583, 'PX5151', 'ANALYSIS OF ELECTRICAL MACHINES', 1, 1, 1, 17),
(584, 'PX5152', 'ANALYSIS AND DESIGN OF POWER CONVERTERS', 1, 1, 1, 17),
(585, 'IN5152', 'SYSTEM THEORY', 1, 1, 1, 17),
(586, 'PX5091', 'CONTROL SYSTEM DESIGN  FOR POWER ELECTRONICS', 1, 1, 1, 17),
(587, 'PX5111', 'POWER ELECTRONICS CIRCUITS LABORATORY', 1, 1, 1, 17),
(588, 'MA5154', 'APPLIED MATHEMATICS FOR COMMUNICATION ENGINEERS', 1, 1, 1, 17),
(589, 'CU5191', 'ADVANCED RADIATION SYSTEMS', 1, 1, 1, 17),
(590, 'CU5151', 'ADVANCED DIGITAL COMMUNICATION SYSTEMS', 1, 1, 1, 17),
(591, 'AP5152', 'ADVANCED DIGITAL SIGNAL PROCESSING', 1, 1, 1, 17),
(592, 'CU5192', 'OPTICAL NETWORKS', 1, 1, 1, 17),
(593, 'CU5091', 'ADVANCED SATELLITE COMMUNICATION AND NAVIGATION SYSTEM', 1, 1, 1, 17),
(594, 'CU5161', 'COMMUNICATION SYSTEM LABORATORY', 1, 1, 1, 17),
(595, 'MA5153', 'ADVANCED NUMERICAL METHODS', 1, 1, 1, 17),
(596, 'TE5151', 'ADVANCED HEAT TRANSFER', 1, 1, 1, 17),
(597, 'TE5101', 'ADVANCED THERMODYNAMICS', 1, 1, 1, 17),
(598, 'TE5102', 'ADVANCED FLUID MECHANICS', 1, 1, 1, 17),
(599, 'EY5152', 'ENERGY RESOURCES', 1, 1, 1, 17),
(600, 'TE5002', 'ADVANCED INTERNAL COMBUSTION ENGINE', 1, 1, 1, 17),
(601, 'TE5111', 'THERMAL ENGINEERING LAB', 1, 1, 1, 17),
(602, 'GE8261', 'Engineering Practices Laboratory', 1, 1, 1, 17),
(603, 'EC8353', 'Electron Devices and Circuits', 1, 1, 1, 17),
(604, 'EC6015', 'RADAR AND NAVIGATIONAL AIDS', 1, 1, 1, 13),
(605, 'EC6004', 'SATELLITE COMMUNCIATION', 1, 1, 1, 13),
(606, 'CS6007', 'INFORMATION RETRIVAL', 1, 1, 1, 13),
(607, 'BA5101', 'ECONOMIC ANALYSIS FOR BUSINESS', 1, 1, 1, 17),
(608, 'BA5102', 'PRINCIPLES OF MANAGEMENT', 1, 1, 1, 17),
(609, 'BA5103', 'ACCOUNTING FOR MANAGEMENT', 1, 1, 1, 17),
(610, 'BA5104', 'LEGAL ASPECTS OF BUSINESS', 1, 1, 1, 17),
(611, 'BA5105', 'ORGANISATIONAL BEHAVIOUR', 1, 1, 1, 17),
(612, 'BA5106', 'STATISTICS FOR MANAGEMENT', 1, 1, 1, 17),
(613, 'BA5107', 'TOTAL QUALITY MANAGEMENT', 1, 1, 1, 17),
(614, 'BA5111', 'SPOKEN AND WRITTEN COMMUNICATION', 1, 1, 1, 17),
(615, 'IT6010', 'BUSINESS INTELLIGENCE', 1, 1, 1, 13),
(616, 'MA8251', 'ENGINEERING MATHEMATICS - II', 1, 1, 1, 17),
(617, 'PH8253', 'PHYSICS FOR ELECTRONICS ENGINEERING', 1, 1, 1, 17),
(618, 'HS8251', 'Technical English', 1, 1, 1, 17),
(619, 'EC7611', 'Embedded Laboratory', 1, 1, 1, 13),
(620, 'EC8394', 'Analog and Digital Communication', 1, 1, 1, 17),
(621, 'MA8351', 'DISCRETE MATHEMATICS', 1, 1, 1, 17),
(622, 'CS8351', 'DIGITAL PRINCIPLES AND SYSTEM DESIGN', 1, 1, 1, 17),
(623, 'CS8391', 'DATA STRUCTURES', 1, 1, 1, 17),
(624, 'CS8392', 'OBJECT ORIENTED PROGRAMMING', 1, 1, 1, 17),
(625, 'CS8381', 'DATASTRUCTURES LAB', 1, 1, 1, 17),
(626, 'CS8383', 'OBJECT ORIENTED PROGRAMMING LAB', 1, 1, 1, 17),
(627, 'CS8382', 'DIGITAL SYSTEMS LAB', 1, 1, 1, 17),
(628, 'HS8381', 'Interpersonal Skills/Listening &Speaking', 1, 1, 1, 17),
(629, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(630, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(631, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(632, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(633, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(634, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(635, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(636, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(637, 'MA6351', 'TRANSFORMS AND PARTIAL DIFFERENTIAL EQUATIONS', 1, 1, 1, 13),
(638, 'GE6351', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 13),
(639, 'CE6301', 'ENGINEERING GEOLOGY', 1, 1, 1, 13),
(640, 'CE6302', 'MECHANICS OF SOLIDS', 1, 1, 1, 13),
(641, 'CE6303', 'MECHANICS OF FLUIDS', 1, 1, 1, 13),
(642, 'CE6304', 'SURVEYING I', 1, 1, 1, 13),
(643, 'CE6311', 'SURVEY PRACTICAL I', 1, 1, 1, 13),
(644, 'CE6312', 'COMPUTER AIDED BUILDING DRAWING', 1, 1, 1, 13),
(645, 'BE8251', 'BASIC ELECTRICAL AND ELECTRONICS ENGINEERING', 1, 1, 1, 17),
(646, 'CE8211', 'COMPUTER AIDED BUILDING DRAWING', 1, 1, 1, 17),
(647, 'GE8261', 'ENGINEERING PRACTICES ', 1, 1, 1, 17),
(648, 'GE8291', 'ENVIRONMENTAL SCIENCE ', 1, 1, 1, 17),
(649, 'GE8292', 'ENGINEERING MECHANICS', 1, 1, 1, 17),
(650, 'HS8251', 'TECHNICAL ENGLISH', 1, 1, 1, 17),
(651, 'PH8201', 'PHYSICS FOR CIVIL ENGINEERING', 1, 1, 1, 17),
(652, 'HS8251', 'TECHNICAL ENGLISH', 1, 1, 1, 17),
(653, 'HS8251', 'TECHNICAL ENGLISH', 1, 1, 1, 17),
(654, 'MA8251', 'ENGINEERING  MATHEMATICS - II', 1, 1, 1, 17),
(655, 'MA8251', 'ENGINEERING  MATHEMATICS - II', 1, 1, 1, 17),
(656, 'MA8251', 'ENGINEERING  MATHEMATICS - II', 1, 1, 1, 17),
(657, 'HS8251', 'TECHNICAL ENGLISH', 1, 1, 1, 17),
(658, 'PH8252', 'PHYSICS FOR INFORMATION SCIENCE', 1, 1, 1, 17),
(659, 'PH8252', 'PHYSICS FOR INFORMATION SCIENCE', 1, 1, 1, 17),
(660, 'BE8255', 'BASIC ELECTRICAL, ELECTRONICS AND MEASUREMENT ENGINEERING', 1, 1, 1, 17),
(661, 'BE8255', 'BASIC ELECTRICAL, ELECTRONICS AND MEASUREMENT ENGINEERING', 1, 1, 1, 17),
(662, 'CS8251', 'PROGRAMMING IN C', 1, 1, 1, 17),
(663, 'CS8251', 'PROGRAMMING IN C', 1, 1, 1, 17),
(664, 'CS8261', 'C  PROGRAMMING LABORATORY', 1, 1, 1, 17),
(665, 'CS8261', 'C  PROGRAMMING LABORATORY', 1, 1, 1, 17),
(666, 'GE8261', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 17),
(667, 'GE8261', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 17),
(668, 'GE8261', 'ENGINEERING PRACTICES LABORATORY', 1, 1, 1, 17),
(669, 'IT8211', 'INFORMATION TECHNOLOGY ESSENTIALS LABORATORY', 1, 1, 1, 17),
(670, 'GE8291', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 17),
(671, 'GE8291', 'ENVIRONMENTAL SCIENCE AND ENGINEERING', 1, 1, 1, 17),
(672, 'EE8261', 'ELECTRIC CIRCUITS LABORATORY', 1, 1, 1, 17),
(673, 'EE8251', 'CIRCUIT THEORY', 1, 1, 1, 17),
(674, 'PH8253', 'PHYSICS FOR ELECTRONICS ENGINEERING', 1, 1, 1, 17),
(675, 'MA6459', 'NUMERICAL METHODS', 1, 1, 1, 13),
(676, 'CE6401', 'CONSTRUCTION MATERIALS', 1, 1, 1, 13),
(677, 'CE6402', 'STRENGTH OF MATERIALS', 1, 1, 1, 13),
(678, 'CE6403', 'APPLIED HYDRALIC ENGINEERING', 1, 1, 1, 13),
(679, 'CE6404', 'SURVEYING II', 1, 1, 1, 13),
(680, 'CE6405', 'SOIL MECHANICS', 1, 1, 1, 13),
(681, 'CE6411', 'STRENGTH OF MATERIALS LABORATORY', 1, 1, 1, 13),
(682, 'CE6412', 'HYDRALIC ENGINEERING LABORATORY', 1, 1, 1, 13),
(683, 'CE6413', 'SURVEY PRACTICAL - II', 1, 1, 1, 13),
(684, 'BE8252', 'BASIC CIVIL AND MECHANICAL ENGINEERING', 1, 1, 1, 17),
(685, 'IT8201', 'INFORMATION TECHNOLOGY ESSENTIALS', 1, 1, 1, 17),
(686, 'HS8251', 'Technical English', 1, 1, 1, 17),
(687, 'PH8253', 'PHYSICS FOR ELECTRONICS ENGINEERING', 1, 1, 1, 17),
(688, 'BE8252', 'Basic Civil and Mechanical Engineering', 1, 1, 1, 17),
(689, 'EE8251', 'Circuit Theory', 1, 1, 1, 17),
(690, 'GE8291', 'Environmental Science and Engineering', 1, 1, 1, 17),
(691, 'GE8261', 'Engineering Practices\r Laboratory', 1, 1, 1, 17),
(692, 'EE8261', 'Electric Circuits Laboratory', 1, 1, 1, 17),
(693, 'GE8292', 'Engineering Mechanics', 1, 1, 1, 17),
(694, 'GE8291', 'Environmental Science and Engineering', 1, 1, 1, 17),
(695, 'GE8261', 'Engineering Practices Laboratory', 1, 1, 1, 17),
(696, 'BE8261', 'Basic Electrical, Electronics and Instrumentation Engineering Laboratory', 1, 1, 1, 17),
(697, 'HS8251', 'Technical English', 1, 1, 1, 17),
(698, 'MA8353', 'Transforms and Partial Differential Equations', 1, 1, 1, 17),
(699, 'CE8301', 'Strength of Materials I', 1, 1, 1, 17),
(700, 'CE8302', 'Fluid Mechanics', 1, 1, 1, 17),
(701, 'CE8351', 'Surveying', 1, 1, 1, 17),
(702, 'CE8391', 'Construction Materials', 1, 1, 1, 17),
(703, 'CE8392', 'Engineering Geology', 1, 1, 1, 17),
(704, 'CE8311', 'Construction Materials Laboratory', 1, 1, 1, 17),
(705, 'CE8361', 'Surveying Laboratory', 1, 1, 1, 17),
(706, 'HS8381', 'Interpersonal Skills / Listening and Speaking', 1, 1, 1, 17),
(707, 'MA8351', 'DISCRETE MATHEMATICS', 1, 1, 1, 17),
(708, 'CS8351', 'DIGITAL PRINCIPLES AND SYSTEM DESIGN', 1, 1, 1, 17),
(709, 'CS8391', 'DATA STRUCTURES', 1, 1, 1, 17),
(710, 'CS8392', 'OBJECT ORIENTED PROGRAMMING', 1, 1, 1, 17),
(711, 'EC8395', 'COMMUNICATION ENGINEERING', 1, 1, 1, 17),
(712, 'CS8381', 'DATASTRUCTURES LAB', 1, 1, 1, 17),
(713, 'CS8383', 'OBJECT ORIENTED PROGRAMMING LAB', 1, 1, 1, 17),
(714, 'CS8382', 'DIGITAL SYSTEMS LAB', 1, 1, 1, 17),
(715, 'HS8381', 'Interpersonal Skills/Listening &Speaking', 1, 1, 1, 17),
(716, 'MA8352', 'Linear Algebra and Partial Differential Equations', 1, 1, 1, 17),
(717, 'EC8352', 'Signals and Systems', 1, 1, 1, 17),
(718, 'EC8393', 'Fundamentals of Data Structures in C', 1, 1, 1, 17),
(719, 'EC8351', 'Electronic Circuits- I', 1, 1, 1, 17),
(720, 'EC8392', 'Digital Electronics', 1, 1, 1, 17),
(721, 'EC8391', 'Control Systems Engineering', 1, 1, 1, 17),
(722, 'EC8381', 'Fundamentals of Data Structures in C Laboratory', 1, 1, 1, 17),
(723, 'EC8361', 'Analog and Digital Circuits Laboratory', 1, 1, 1, 17),
(724, 'HS8381', 'Interpersonal Skills/Listening &Speaking', 1, 1, 1, 17),
(725, 'MA8353', 'Transforms and Partial Differential Equations', 1, 1, 1, 17),
(726, 'EE8351', 'Digital Logic Circuits', 1, 1, 1, 17),
(727, 'EE8391', 'Electromagnetic Theory', 1, 1, 1, 17),
(728, 'EE8301', 'Electrical Machines - I', 1, 1, 1, 17),
(729, 'EC8353', 'Electron Devices and Circuits', 1, 1, 1, 17),
(730, 'ME8792', 'Power Plant Engineering', 1, 1, 1, 17),
(731, 'EC8311', 'Electronics Laboratory', 1, 1, 1, 17),
(732, 'EE8311', 'Electrical Machines Laboratory - I', 1, 1, 1, 17),
(733, 'MA8353', 'Transforms and Partial Differential Equations', 1, 1, 1, 17),
(734, 'EC8351', 'Electron Devices and Circuits', 1, 1, 1, 17),
(735, 'EE8351', 'Digital Logic Circuits', 1, 1, 1, 17),
(736, 'EI8351', 'Electrical Measurements', 1, 1, 1, 17),
(737, 'EI8352', 'Transducers Engineering', 1, 1, 1, 17),
(738, 'CS8392', 'OBJECT ORIENTED PROGRAMMING', 1, 1, 1, 17),
(739, 'EI8361', 'Measurements and Transducers Laboratory', 1, 1, 1, 17),
(740, 'CS8383', 'OBJECT ORIENTED PROGRAMMING LAB', 1, 1, 1, 17),
(741, 'MA8353', 'Transforms and Partial Differential Equations', 1, 1, 1, 17),
(742, 'ME8391', 'Engineering Thermodynamics', 1, 1, 1, 17),
(743, 'CE8394', 'Fluid Mechanics and Machinery', 1, 1, 1, 17),
(744, 'ME8351', 'Manufacturing Technology - I', 1, 1, 1, 17),
(745, 'EE8353', 'Electrical Drives and Controls', 1, 1, 1, 17),
(746, 'ME8361', 'Manufacturing Technology Laboratory - I', 1, 1, 1, 17),
(747, 'ME8381', 'Computer Aided Machine Drawing', 1, 1, 1, 17),
(748, 'EE8361', 'Electrical Engineering Laboratory', 1, 1, 1, 17),
(749, 'HS8381', 'Interpersonal Skills / Listening & Speaking', 1, 1, 1, 17),
(750, 'CE6501', 'Structural Analysis I ', 1, 1, 1, 13),
(751, 'CE6502', 'Foundation Engineering ', 1, 1, 1, 13),
(752, 'CE6503', 'Environmental Engineering I ', 1, 1, 1, 13),
(753, 'CE6504', 'Highway Engineering ', 1, 1, 1, 13),
(754, 'CE6505', 'Design of Reinforced Concrete Elements ', 1, 1, 1, 13),
(755, 'CE6506', 'Construction Techniques, Equipment and Practice', 1, 1, 1, 13),
(756, 'GE6674', 'Communication and Soft skills- Laboratory Based', 1, 1, 1, 13),
(757, 'CE6511', 'Soil Mechanics Laboratory ', 1, 1, 1, 13),
(758, 'CE6512', 'Survey Camp', 1, 1, 1, 13),
(759, 'IT6006', 'DATA ANALYTICS', 1, 1, 1, 13),
(760, 'BA5301', 'INTERNATIONAL BUSINESS MANAGEMENT', 1, 1, 1, 17),
(761, 'BA5302', 'STRATEGIC MANAGEMENT', 1, 1, 1, 17),
(762, 'BA5311', 'SEMINAR-III', 1, 1, 1, 17),
(763, 'BA5201', 'APPLIED OPERATIONS RESEARCH', 1, 1, 1, 17),
(764, 'BA5202', 'BUSINESS RESEARCH METHODS', 1, 1, 1, 17),
(765, 'BA5203', 'FINANCIAL MANAGEMENT', 1, 1, 1, 17),
(766, 'BA5204', 'HUMAN RESOURCE MANAGEMENT', 1, 1, 1, 17),
(767, 'BA5205', 'INFORMATION MANAGEMENT', 1, 1, 1, 17),
(768, 'BA5206', 'OPERATIONS MANAGEMENT', 1, 1, 1, 17),
(769, 'BA5207', 'MARKETING MANAGEMENT', 1, 1, 1, 17),
(770, 'BA5211', 'DATA ANALYSIS AND BUSINESS MODELLING', 1, 1, 1, 17),
(771, 'BE8254', 'Basic Electrical and Instrumentation Engineering', 1, 1, 1, 17),
(772, 'EC8251', 'CIRCUIT ANALYSIS', 1, 1, 1, 17),
(773, 'EC8252', 'ELECTRONIC DEVICES', 1, 1, 1, 17),
(774, 'EC8261', 'CIRCUIT AND DEVICES LABORATORY', 1, 1, 1, 17),
(775, 'BE8253', 'Basic Electrical, Electronics and Instrumentation Engineering', 1, 1, 1, 17),
(776, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(777, 'PH8251', 'Materials Science', 1, 1, 1, 17),
(778, 'PS5071', 'DISTRIBUTED GENERATION AND MICROGRID', 1, 1, 1, 17),
(779, 'PX5004', 'Modern Rectifiers and Resonant Converter', 1, 1, 1, 17),
(780, 'PX5201', 'and Resonant', 1, 1, 1, 17),
(781, 'PX5202', 'SOLID STATE DRIVES', 1, 1, 1, 17),
(782, 'PX5211', 'ELECTRICAL DRIVES LABORATORY', 1, 1, 1, 17),
(783, 'PX5251', 'Special Electrical Machines', 1, 1, 1, 17),
(784, 'PX5252', 'Power Quality', 1, 1, 1, 17),
(785, 'TE5008', 'Energy Management in Thermal Systems', 1, 1, 1, 17),
(786, 'TE5201', 'Instrumentation for Thermal Engineering', 1, 1, 1, 17),
(787, 'TE5202', 'Fuels and Combustion', 1, 1, 1, 17),
(788, 'TE5211', 'Technical Seminar', 1, 1, 1, 17),
(789, 'TE5261', 'Thermal Systems Simulation Laboratory', 1, 1, 1, 17),
(790, 'TE5291', 'Environmental Engineering and Pollution Control', 1, 1, 1, 17),
(791, 'EY5091', 'Nuclear Engineering', 1, 1, 1, 17),
(792, 'IC5251', 'Alternative Fuels for IC Engines', 1, 1, 1, 17),
(793, 'CP5096', 'Speech Processing and Synthesis', 1, 1, 1, 17),
(794, 'CU5071', 'Digital Communication Receivers', 1, 1, 1, 17),
(795, 'CU5096', 'Pattern Recognition and Machine Learning', 1, 1, 1, 17),
(796, 'CU5201', 'MIC and RF System Design', 1, 1, 1, 17),
(797, 'CU5211', 'RF System Design Laboratory', 1, 1, 1, 17),
(798, 'CU5291', 'Advanced Wireless Communication Systems', 1, 1, 1, 17),
(799, 'CU5292', 'Electromagnetic Interference and Compatibility', 1, 1, 1, 17),
(800, 'CP5281', 'Term Paper Writing and Seminar', 1, 1, 1, 17),
(801, 'MA8251', 'ENGINEERING  MATHEMATICS - II', 1, 1, 1, 17),
(802, 'MA8251', 'ENGINEERING  MATHEMATICS - II', 1, 1, 1, 17),
(803, 'MA8251', 'ENGINEERING  MATHEMATICS - II', 1, 1, 1, 17),
(804, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(805, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(806, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(807, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(808, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(809, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(810, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(811, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(812, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(813, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(814, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(815, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(816, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(817, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(818, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(819, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(820, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(821, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(822, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(823, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(824, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(825, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(826, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(827, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(828, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(829, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(830, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(831, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(832, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(833, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(834, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(835, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(836, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(837, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(838, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(839, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17);
INSERT INTO `tbl_subject` (`sub_id`, `sub_code`, `sub_name`, `dept_id`, `year`, `sem`, `reg`) VALUES
(840, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(841, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(842, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(843, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(844, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(845, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(846, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(847, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(848, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(849, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(850, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(851, 'BS8161', 'PHYSICS AND CHEMISTRY LABORATORY', 1, 1, 1, 17),
(852, 'CY8151', 'ENGINEERING CHEMISTRY', 1, 1, 1, 17),
(853, 'GE8151', 'PROBLEM SOLVING AND PYTHON PROGRAMMING', 1, 1, 1, 17),
(854, 'GE8152', 'ENGINEERING GRAPHICS', 1, 1, 1, 17),
(855, 'GE8161', 'PROBLEM SOLVING AND PYTHON PROGRAMMING LABORATORY', 1, 1, 1, 17),
(856, 'HS8151', 'COMMUNICATIVE ENGLISH', 1, 1, 1, 17),
(857, 'MA8151', 'ENGINEERING MATHEMATICS - I', 1, 1, 1, 17),
(858, 'PH8151', 'ENGINEERING PHYSICS', 1, 1, 1, 17),
(859, 'BA5004', 'INTEGRATED MARKETING COMMUNICATION', 1, 1, 1, 17),
(860, 'BA5005', 'RETAIL MANAGEMENT', 1, 1, 1, 17),
(861, 'BA5006', 'SERVICE MARKETING', 1, 1, 1, 17),
(862, 'BA5008', 'BANKING FINANCIAL SERVICE MANAGEMENT', 1, 1, 1, 17),
(863, 'BA5009', 'CORPORATE FINANCE', 1, 1, 1, 17),
(864, 'BA5012', 'SECURITY ANALYSIS AND PORTFOLIO MANAGEMENT', 1, 1, 1, 17),
(865, 'BA5014', 'Entrepreneurship Development', 1, 1, 1, 17),
(866, 'BA5025', 'LOGISTICS MANAGEMENT', 1, 1, 1, 17),
(867, 'BA5015', 'INDUSTRIAL RELATIONS AND LABOUR WELFARE', 1, 1, 1, 17),
(868, 'BA5029', 'OPERATIONS MANAGEMENT', 1, 1, 1, 17),
(869, 'BA5016', 'LABOUR LEGISLATION', 1, 1, 1, 17),
(870, 'BA5030', 'SUPPLY CHAIN MANAGEMENT', 1, 1, 1, 17),
(871, 'MU5091', 'MULTIMEDIA COMPRESSION TECHNIQUES  ', 1, 1, 1, 17),
(872, 'CU5301', 'MILIMETER WAVE COMMUNICATION', 1, 1, 1, 17),
(873, 'NC5291', 'COMMUNICATION NETWORK SECURITY', 1, 1, 1, 17),
(874, 'CU5311', 'PROJECT WORK', 1, 1, 1, 17),
(875, 'TE5301', 'DESIGN & OPTIMIZATION OF THERMAL ENERGY SYSTEMS ', 1, 1, 1, 17),
(876, 'TE5074', 'ADVANCED POWER PLANT ENGG.', 1, 1, 1, 17),
(877, 'EY5072', 'STEAM GENERATOR TECHNOLOGY', 1, 1, 1, 17),
(878, 'TE5311', 'TECHNICAL SEMINAR', 1, 1, 1, 17),
(879, 'TE5312', 'PROJECT WORK (Phase - 1)', 1, 1, 1, 17),
(880, 'PX5072', ' POWER ELECTRONICS FOR RENEWABLE ENERGY SYSTEMS ', 1, 1, 1, 17),
(881, 'PS5072', 'SOLAR & ENERGY STORAGE SYSTEMS', 1, 1, 1, 17),
(882, 'PX5005', ' HIGH VOLTAGE DIRECT CURRENT TRANSMISSION ', 1, 1, 1, 17),
(883, 'PX5311', 'PROJECT WORK (Phase 1) ', 1, 1, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp`
--

CREATE TABLE `tbl_temp` (
  `dept_id` int(11) NOT NULL,
  `day_order` int(11) NOT NULL,
  `p1` int(11) NOT NULL,
  `p2` int(11) NOT NULL,
  `p3` int(11) NOT NULL,
  `p4` int(11) NOT NULL,
  `p5` int(11) NOT NULL,
  `p6` int(11) NOT NULL,
  `p7` int(11) NOT NULL,
  `p8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `pwd1` varchar(255) NOT NULL,
  `forgot_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `pwd1`, `forgot_pwd`) VALUES
(4, '12345', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workload`
--

CREATE TABLE `tbl_workload` (
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `sec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_workload`
--

INSERT INTO `tbl_workload` (`user_id`, `dept_id`, `sub_id`, `sec`) VALUES
(1, 1, 1, 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `day_order` (`day_order`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_limit`
--
ALTER TABLE `tbl_limit`
  ADD PRIMARY KEY (`limit_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_logindetails`
--
ALTER TABLE `tbl_logindetails`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_seminarhall`
--
ALTER TABLE `tbl_seminarhall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  ADD PRIMARY KEY (`day_order`),
  ADD KEY `tbl_temp_ibfk_1` (`p1`),
  ADD KEY `tbl_temp_ibfk_2` (`p2`),
  ADD KEY `tbl_temp_ibfk_3` (`p3`),
  ADD KEY `tbl_temp_ibfk_4` (`p4`),
  ADD KEY `tbl_temp_ibfk_5` (`p5`),
  ADD KEY `tbl_temp_ibfk_6` (`p6`),
  ADD KEY `tbl_temp_ibfk_7` (`p7`),
  ADD KEY `tbl_temp_ibfk_8` (`p8`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_workload`
--
ALTER TABLE `tbl_workload`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_limit`
--
ALTER TABLE `tbl_limit`
  MODIFY `limit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seminarhall`
--
ALTER TABLE `tbl_seminarhall`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=884;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`dept_id`),
  ADD CONSTRAINT `tbl_booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_staff` (`user_id`),
  ADD CONSTRAINT `tbl_booking_ibfk_3` FOREIGN KEY (`hall_id`) REFERENCES `tbl_seminarhall` (`hall_id`),
  ADD CONSTRAINT `tbl_booking_ibfk_4` FOREIGN KEY (`sub_id`) REFERENCES `tbl_subject` (`sub_id`);

--
-- Constraints for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD CONSTRAINT `tbl_history_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`dept_id`),
  ADD CONSTRAINT `tbl_history_ibfk_2` FOREIGN KEY (`day_order`) REFERENCES `tbl_temp` (`day_order`),
  ADD CONSTRAINT `tbl_history_ibfk_3` FOREIGN KEY (`hall_id`) REFERENCES `tbl_seminarhall` (`hall_id`),
  ADD CONSTRAINT `tbl_history_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `tbl_staff` (`user_id`);

--
-- Constraints for table `tbl_limit`
--
ALTER TABLE `tbl_limit`
  ADD CONSTRAINT `tbl_limit_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`);

--
-- Constraints for table `tbl_logindetails`
--
ALTER TABLE `tbl_logindetails`
  ADD CONSTRAINT `tbl_logindetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_staff` (`user_id`),
  ADD CONSTRAINT `tbl_logindetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_staff` (`user_id`);

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `tbl_staff_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`),
  ADD CONSTRAINT `tbl_staff_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`dept_id`);

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `tbl_subject_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`dept_id`);

--
-- Constraints for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  ADD CONSTRAINT `tbl_temp_ibfk_1` FOREIGN KEY (`p1`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_2` FOREIGN KEY (`p2`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_3` FOREIGN KEY (`p3`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_4` FOREIGN KEY (`p4`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_5` FOREIGN KEY (`p5`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_6` FOREIGN KEY (`p6`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_7` FOREIGN KEY (`p7`) REFERENCES `tbl_booking` (`book_id`),
  ADD CONSTRAINT `tbl_temp_ibfk_8` FOREIGN KEY (`p8`) REFERENCES `tbl_booking` (`book_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_staff` (`user_id`);

--
-- Constraints for table `tbl_workload`
--
ALTER TABLE `tbl_workload`
  ADD CONSTRAINT `tbl_workload_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_staff` (`user_id`),
  ADD CONSTRAINT `tbl_workload_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `tbl_subject` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
