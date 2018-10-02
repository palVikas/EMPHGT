-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 12:47 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agroproducer`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_groups`
--

CREATE TABLE `accounting_groups` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `UNDER` int(11) NOT NULL,
  `NATURE` varchar(15) NOT NULL,
  `VISIBLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_groups`
--

INSERT INTO `accounting_groups` (`ID`, `NAME`, `UNDER`, `NATURE`, `VISIBLE`) VALUES
(1, 'Branch / Divisions', 0, 'Liabilities', 0),
(2, 'Capital Account', 0, 'Liabilities', 0),
(3, 'Current Assets', 0, 'Assets', 0),
(4, 'Current Liabilities', 0, 'Liabilities', 0),
(5, 'Direct Expenses', 0, 'Expenses', 0),
(6, 'Direct  Incomes', 0, 'Income', 0),
(7, 'Fixed Assets', 0, 'Assets', 0),
(8, 'Indirect Expenses', 0, 'Expenses', 0),
(9, 'Indirect Incomes', 0, 'Income', 0),
(10, 'Investments', 0, 'Assets', 0),
(11, 'Loans (Liability)', 0, 'Liabilities', 0),
(12, 'Misc Expenses (ASSET)', 0, 'Assets', 0),
(13, 'Purchase Accounts', 0, 'Expenses', 0),
(14, 'Sales Accounts', 0, 'Income', 0),
(15, 'Suspense Accounts', 0, 'Liabilities', 0),
(16, 'Bank Accounts', 3, 'Assets', 0),
(17, 'Bank OD Accounts', 11, 'Liabilities', 0),
(18, 'Cash in Hand', 3, 'Assets', 0),
(19, 'Deposits (Asset)', 3, 'Assets', 0),
(20, 'Duties & Taxes', 4, 'Liabilities', 0),
(21, 'Loan & Advance(Asset)', 3, 'Assets', 0),
(22, 'Provisions', 4, 'Liabilities', 0),
(23, 'Reserves & Surplus', 2, 'Libilities', 0),
(24, 'Secured Loans', 11, 'Liabilities', 0),
(25, 'Stock in Hand', 3, 'Assets', 0),
(28, 'Sundry Creditors', 4, 'Liabilities', 0),
(29, 'Sundry Debtors', 3, 'Assets', 0),
(30, 'Unsecured Loans', 11, 'Liabilities', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `DR_ID` int(11) NOT NULL,
  `CR_ID` int(11) NOT NULL,
  `HRM_ID` int(11) NOT NULL,
  `BRANCH_ID` int(11) NOT NULL,
  `PARTICULAR` varchar(300) NOT NULL,
  `AMOUNT` float NOT NULL,
  `REFRENCE` varchar(50) DEFAULT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COMPANY_ID` int(10) NOT NULL,
  `ACCOUNT_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accouting_ledgers`
--

CREATE TABLE `accouting_ledgers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `UNDER` int(11) UNSIGNED NOT NULL COMMENT 'Accounting head(Foreign key accounting_groups.ID)',
  `VISIBLE` int(11) NOT NULL COMMENT 'Company id who can see this or 0 for everyone',
  `AMOUNT` float NOT NULL COMMENT 'Current balance',
  `AMOUNT_TYPE` tinyint(4) NOT NULL COMMENT '1 for credit 2 for debit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ADJUSTMENT_ID` int(10) UNSIGNED NOT NULL,
  `TYPE` varchar(2) NOT NULL,
  `AMOUNT` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `NAME`, `USERNAME`, `PASSWORD`) VALUES
(1, 'PRIYANSHU RAWAT', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_type`
--

CREATE TABLE `bonus_type` (
  `BONUS_TYPE_ID` int(10) NOT NULL,
  `BONUS_TYPE_NAME` varchar(100) NOT NULL,
  `BONUS_TYPE` int(11) NOT NULL,
  `BONUS_TYPE_AMOUNT` decimal(10,2) NOT NULL,
  `BONUS_TYPE_DESCRIPTION` varchar(100) NOT NULL,
  `COMPANY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus_type`
--

INSERT INTO `bonus_type` (`BONUS_TYPE_ID`, `BONUS_TYPE_NAME`, `BONUS_TYPE`, `BONUS_TYPE_AMOUNT`, `BONUS_TYPE_DESCRIPTION`, `COMPANY_ID`) VALUES
(0, 'ADVISOR', 0, '0.00', 'For Advisor', 1),
(1, 'LOYALTY BONUS (MCS-1 Years)', 0, '0.00', 'LOYALTY BONUS (MCS-1 Years)', 1),
(2, 'LOYALTY BONUS (MCS-2 Years)', 0, '4.00', 'LOYALTY BONUS (MCS-2 Years)', 1),
(3, 'LOYALTY BONUS (MCS-3 Years)', 0, '6.00', 'LOYALTY BONUS (MCS-3 Years)', 1),
(4, 'LOYALTY BONUS (MCS-5 Years)', 0, '8.00', 'LOYALTY BONUS (MCS-5 Years)', 1),
(5, ' (OTCS-NC-1 Years)', 0, '0.00', ' (OTCS-NC-1 Years)', 1),
(6, ' (OTCS-NC-2 Years)', 0, '0.00', ' (OTCS-NC-2 Years)', 1),
(7, ' (OTCS-NC-3 Years)', 0, '0.00', ' (OTCS-NC-3 Years)', 1),
(8, ' (OTCS-NC-4 Years)', 0, '0.00', ' (OTCS-NC-4 Years)', 1),
(9, ' (OTCS-NC-5 Years)', 0, '0.00', ' (OTCS-NC-5 Years)', 1),
(10, ' (OTCS-NC-6 Years)', 0, '0.00', ' (OTCS-NC-6 Years)', 1),
(11, 'Seniour Citezen Bonus (OTCS-NC-1 Years SC)', 0, '0.50', 'Seniour Citezen Bonus (OTCS-NC-1 Years SC)', 1),
(12, 'Seniour Citezen Bonus (OTCS-NC-2 Years SC)', 0, '0.50', 'Seniour Citezen Bonus (OTCS-NC-2 Years SC)', 1),
(13, 'Seniour Citezen Bonus (OTCS-NC-3 Years SC)', 0, '0.50', 'Seniour Citezen Bonus (OTCS-NC-3 Years SC)', 1),
(14, 'Seniour Citezen Bonus (OTCS-NC-4 Years SC)', 0, '0.50', 'Seniour Citezen Bonus (OTCS-NC-4 Years SC)', 1),
(15, 'Seniour Citezen Bonus (OTCS-NC-5 Years SC)', 0, '0.50', 'Seniour Citezen Bonus (OTCS-NC-5 Years SC)', 1),
(16, 'Seniour Citezen Bonus (OTCS-NC-6 Years SC)', 0, '0.50', 'Seniour Citezen Bonus (OTCS-NC-6 Years SC)', 1),
(17, ' (MIS-1 Years)', 0, '0.00', ' (MIS-1 Years)', 1),
(18, ' (MIS-2 Years)', 0, '0.00', ' (MIS-2 Years)', 1),
(19, ' (MIS-3 Years)', 0, '0.00', ' (MIS-3 Years)', 1),
(20, ' (MIS-4 Years)', 0, '0.00', ' (MIS-4 Years)', 1),
(21, ' (MIS-5 Years)', 0, '0.00', ' (MIS-5 Years)', 1),
(22, ' (MIS-6 Years)', 0, '0.00', ' (MIS-6 Years)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BRANCH_ID` int(11) NOT NULL,
  `BRANCH_REG_NO` varchar(20) NOT NULL,
  `BRANCH_NAME` varchar(100) NOT NULL,
  `BRANCH_ADDRESS` varchar(100) NOT NULL,
  `BRANCH_CITY` int(10) NOT NULL,
  `BRANCH_STATE` int(11) NOT NULL,
  `BRANCH_COUNTRY` int(11) NOT NULL,
  `BRANCH_CONTACT` varchar(11) NOT NULL,
  `BRANCH_ALT_CONTACT` varchar(12) NOT NULL,
  `BRANCH_PHONE` varchar(11) NOT NULL,
  `BRANCH_TARGET` decimal(10,0) NOT NULL,
  `BRANCH_USERNAME` varchar(100) NOT NULL,
  `BRANCH_PASSWORD` varchar(100) NOT NULL,
  `BRANCH_REG_DATE` datetime NOT NULL,
  `COMPANY_ID` int(10) NOT NULL,
  `BRANCH_CATEGORY_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BRANCH_ID`, `BRANCH_REG_NO`, `BRANCH_NAME`, `BRANCH_ADDRESS`, `BRANCH_CITY`, `BRANCH_STATE`, `BRANCH_COUNTRY`, `BRANCH_CONTACT`, `BRANCH_ALT_CONTACT`, `BRANCH_PHONE`, `BRANCH_TARGET`, `BRANCH_USERNAME`, `BRANCH_PASSWORD`, `BRANCH_REG_DATE`, `COMPANY_ID`, `BRANCH_CATEGORY_ID`) VALUES
(1, 'KNGR00000001', 'KIDWAI NAGAR BRANCH', 'O BLOCK KIDWAI NAGAR', 1328, 1328, 1328, '8090739313', '8090739313', '8090739313', '500000', 'kidwainagar', '123456', '2018-09-05 00:00:00', 1, 1),
(2, 'BADV00000002', 'BARADEVI BRANCH', 'BARADEVI\n', 1328, 1328, 1328, '8090739313', '8090739313', '8090739313', '100000', 'bradevi', '123456', '2018-09-01 00:00:00', 1, 1),
(3, 'BARR00000003', 'BARRA BRANCH', '44/12 naubasta kanpur', 1328, 1328, 1328, '8090739313', '8090739313', '8090739313', '700000', 'billu@12', 'pass', '2018-09-29 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_category`
--

CREATE TABLE `branch_category` (
  `BRANCH_CATEGORY_ID` int(11) NOT NULL,
  `BRANCH_CATEGORY_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_category`
--

INSERT INTO `branch_category` (`BRANCH_CATEGORY_ID`, `BRANCH_CATEGORY_NAME`) VALUES
(1, 'AGROPRODUCER'),
(2, 'HOSPITALS'),
(3, 'MEDICAL STORES');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CITY_ID` int(11) NOT NULL,
  `CITY_NAME` varchar(100) NOT NULL,
  `CITY_STATE` varchar(100) NOT NULL,
  `CITY_COUNTRY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CITY_ID`, `CITY_NAME`, `CITY_STATE`, `CITY_COUNTRY`) VALUES
(1, 'Kolhapur', 'Maharashtra', 'INDIA'),
(2, 'Port Blair', 'Andaman & Nicobar Islands', 'INDIA'),
(3, 'Adilabad', 'Andhra Pradesh', 'INDIA'),
(4, 'Adoni', 'Andhra Pradesh', 'INDIA'),
(5, 'Amadalavalasa', 'Andhra Pradesh', 'INDIA'),
(6, 'Amalapuram', 'Andhra Pradesh', 'INDIA'),
(7, 'Anakapalle', 'Andhra Pradesh', 'INDIA'),
(8, 'Anantapur', 'Andhra Pradesh', 'INDIA'),
(9, 'Badepalle', 'Andhra Pradesh', 'INDIA'),
(10, 'Banganapalle', 'Andhra Pradesh', 'INDIA'),
(11, 'Bapatla', 'Andhra Pradesh', 'INDIA'),
(12, 'Bellampalle', 'Andhra Pradesh', 'INDIA'),
(13, 'Bethamcherla', 'Andhra Pradesh', 'INDIA'),
(14, 'Bhadrachalam', 'Andhra Pradesh', 'INDIA'),
(15, 'Bhainsa', 'Andhra Pradesh', 'INDIA'),
(16, 'Bheemunipatnam', 'Andhra Pradesh', 'INDIA'),
(17, 'Bhimavaram', 'Andhra Pradesh', 'INDIA'),
(18, 'Bhongir', 'Andhra Pradesh', 'INDIA'),
(19, 'Bobbili', 'Andhra Pradesh', 'INDIA'),
(20, 'Bodhan', 'Andhra Pradesh', 'INDIA'),
(21, 'Chilakaluripet', 'Andhra Pradesh', 'INDIA'),
(22, 'Chirala', 'Andhra Pradesh', 'INDIA'),
(23, 'Chittoor', 'Andhra Pradesh', 'INDIA'),
(24, 'Cuddapah', 'Andhra Pradesh', 'INDIA'),
(25, 'Devarakonda', 'Andhra Pradesh', 'INDIA'),
(26, 'Dharmavaram', 'Andhra Pradesh', 'INDIA'),
(27, 'Eluru', 'Andhra Pradesh', 'INDIA'),
(28, 'Farooqnagar', 'Andhra Pradesh', 'INDIA'),
(29, 'Gadwal', 'Andhra Pradesh', 'INDIA'),
(30, 'Gooty', 'Andhra Pradesh', 'INDIA'),
(31, 'Gudivada', 'Andhra Pradesh', 'INDIA'),
(32, 'Gudur', 'Andhra Pradesh', 'INDIA'),
(33, 'Guntakal', 'Andhra Pradesh', 'INDIA'),
(34, 'Guntur', 'Andhra Pradesh', 'INDIA'),
(35, 'Hanuman Junction', 'Andhra Pradesh', 'INDIA'),
(36, 'Hindupur', 'Andhra Pradesh', 'INDIA'),
(37, 'Hyderabad', 'Andhra Pradesh', 'INDIA'),
(38, 'Ichchapuram', 'Andhra Pradesh', 'INDIA'),
(39, 'Jaggaiahpet', 'Andhra Pradesh', 'INDIA'),
(40, 'Jagtial', 'Andhra Pradesh', 'INDIA'),
(41, 'Jammalamadugu', 'Andhra Pradesh', 'INDIA'),
(42, 'Jangaon', 'Andhra Pradesh', 'INDIA'),
(43, 'Kadapa', 'Andhra Pradesh', 'INDIA'),
(44, 'Kadiri', 'Andhra Pradesh', 'INDIA'),
(45, 'Kagaznagar', 'Andhra Pradesh', 'INDIA'),
(46, 'Kakinada', 'Andhra Pradesh', 'INDIA'),
(47, 'Kalyandurg', 'Andhra Pradesh', 'INDIA'),
(48, 'Kamareddy', 'Andhra Pradesh', 'INDIA'),
(49, 'Kandukur', 'Andhra Pradesh', 'INDIA'),
(50, 'Karimnagar', 'Andhra Pradesh', 'INDIA'),
(51, 'Kavali', 'Andhra Pradesh', 'INDIA'),
(52, 'Khammam', 'Andhra Pradesh', 'INDIA'),
(53, 'Koratla', 'Andhra Pradesh', 'INDIA'),
(54, 'Kothagudem', 'Andhra Pradesh', 'INDIA'),
(55, 'Kothapeta', 'Andhra Pradesh', 'INDIA'),
(56, 'Kovvur', 'Andhra Pradesh', 'INDIA'),
(57, 'Kurnool', 'Andhra Pradesh', 'INDIA'),
(58, 'Kyathampalle', 'Andhra Pradesh', 'INDIA'),
(59, 'Macherla', 'Andhra Pradesh', 'INDIA'),
(60, 'Machilipatnam', 'Andhra Pradesh', 'INDIA'),
(61, 'Madanapalle', 'Andhra Pradesh', 'INDIA'),
(62, 'Mahbubnagar', 'Andhra Pradesh', 'INDIA'),
(63, 'Mancherial', 'Andhra Pradesh', 'INDIA'),
(64, 'Mandamarri', 'Andhra Pradesh', 'INDIA'),
(65, 'Mandapeta', 'Andhra Pradesh', 'INDIA'),
(66, 'Manuguru', 'Andhra Pradesh', 'INDIA'),
(67, 'Markapur', 'Andhra Pradesh', 'INDIA'),
(68, 'Medak', 'Andhra Pradesh', 'INDIA'),
(69, 'Miryalaguda', 'Andhra Pradesh', 'INDIA'),
(70, 'Mogalthur', 'Andhra Pradesh', 'INDIA'),
(71, 'Nagari', 'Andhra Pradesh', 'INDIA'),
(72, 'Nagarkurnool', 'Andhra Pradesh', 'INDIA'),
(73, 'Nandyal', 'Andhra Pradesh', 'INDIA'),
(74, 'Narasapur', 'Andhra Pradesh', 'INDIA'),
(75, 'Narasaraopet', 'Andhra Pradesh', 'INDIA'),
(76, 'Narayanpet', 'Andhra Pradesh', 'INDIA'),
(77, 'Narsipatnam', 'Andhra Pradesh', 'INDIA'),
(78, 'Nellore', 'Andhra Pradesh', 'INDIA'),
(79, 'Nidadavole', 'Andhra Pradesh', 'INDIA'),
(80, 'Nirmal', 'Andhra Pradesh', 'INDIA'),
(81, 'Nizamabad', 'Andhra Pradesh', 'INDIA'),
(82, 'Nuzvid', 'Andhra Pradesh', 'INDIA'),
(83, 'Ongole', 'Andhra Pradesh', 'INDIA'),
(84, 'Palacole', 'Andhra Pradesh', 'INDIA'),
(85, 'Palasa Kasibugga', 'Andhra Pradesh', 'INDIA'),
(86, 'Palwancha', 'Andhra Pradesh', 'INDIA'),
(87, 'Parvathipuram', 'Andhra Pradesh', 'INDIA'),
(88, 'Pedana', 'Andhra Pradesh', 'INDIA'),
(89, 'Peddapuram', 'Andhra Pradesh', 'INDIA'),
(90, 'Pithapuram', 'Andhra Pradesh', 'INDIA'),
(91, 'Pondur', 'Andhra pradesh', 'INDIA'),
(92, 'Ponnur', 'Andhra Pradesh', 'INDIA'),
(93, 'Proddatur', 'Andhra Pradesh', 'INDIA'),
(94, 'Punganur', 'Andhra Pradesh', 'INDIA'),
(95, 'Puttur', 'Andhra Pradesh', 'INDIA'),
(96, 'Rajahmundry', 'Andhra Pradesh', 'INDIA'),
(97, 'Rajam', 'Andhra Pradesh', 'INDIA'),
(98, 'Ramachandrapuram', 'Andhra Pradesh', 'INDIA'),
(99, 'Ramagundam', 'Andhra Pradesh', 'INDIA'),
(100, 'Rayachoti', 'Andhra Pradesh', 'INDIA'),
(101, 'Rayadurg', 'Andhra Pradesh', 'INDIA'),
(102, 'Renigunta', 'Andhra Pradesh', 'INDIA'),
(103, 'Repalle', 'Andhra Pradesh', 'INDIA'),
(104, 'Sadasivpet', 'Andhra Pradesh', 'INDIA'),
(105, 'Salur', 'Andhra Pradesh', 'INDIA'),
(106, 'Samalkot', 'Andhra Pradesh', 'INDIA'),
(107, 'Sangareddy', 'Andhra Pradesh', 'INDIA'),
(108, 'Sattenapalle', 'Andhra Pradesh', 'INDIA'),
(109, 'Siddipet', 'Andhra Pradesh', 'INDIA'),
(110, 'Singapur', 'Andhra Pradesh', 'INDIA'),
(111, 'Sircilla', 'Andhra Pradesh', 'INDIA'),
(112, 'Srikakulam', 'Andhra Pradesh', 'INDIA'),
(113, 'Srikalahasti', 'Andhra Pradesh', 'INDIA'),
(115, 'Suryapet', 'Andhra Pradesh', 'INDIA'),
(116, 'Tadepalligudem', 'Andhra Pradesh', 'INDIA'),
(117, 'Tadpatri', 'Andhra Pradesh', 'INDIA'),
(118, 'Tandur', 'Andhra Pradesh', 'INDIA'),
(119, 'Tanuku', 'Andhra Pradesh', 'INDIA'),
(120, 'Tenali', 'Andhra Pradesh', 'INDIA'),
(121, 'Tirupati', 'Andhra Pradesh', 'INDIA'),
(122, 'Tuni', 'Andhra Pradesh', 'INDIA'),
(123, 'Uravakonda', 'Andhra Pradesh', 'INDIA'),
(124, 'Venkatagiri', 'Andhra Pradesh', 'INDIA'),
(125, 'Vicarabad', 'Andhra Pradesh', 'INDIA'),
(126, 'Vijayawada', 'Andhra Pradesh', 'INDIA'),
(127, 'Vinukonda', 'Andhra Pradesh', 'INDIA'),
(128, 'Visakhapatnam', 'Andhra Pradesh', 'INDIA'),
(129, 'Vizianagaram', 'Andhra Pradesh', 'INDIA'),
(130, 'Wanaparthy', 'Andhra Pradesh', 'INDIA'),
(131, 'Warangal', 'Andhra Pradesh', 'INDIA'),
(132, 'Yellandu', 'Andhra Pradesh', 'INDIA'),
(133, 'Yemmiganur', 'Andhra Pradesh', 'INDIA'),
(134, 'Yerraguntla', 'Andhra Pradesh', 'INDIA'),
(135, 'Zahirabad', 'Andhra Pradesh', 'INDIA'),
(136, 'Rajampet', 'Andhra Pradesh', 'INDIA'),
(137, 'Along', 'Arunachal Pradesh', 'INDIA'),
(138, 'Bomdila', 'Arunachal Pradesh', 'INDIA'),
(139, 'Itanagar', 'Arunachal Pradesh', 'INDIA'),
(140, 'Naharlagun', 'Arunachal Pradesh', 'INDIA'),
(141, 'Pasighat', 'Arunachal Pradesh', 'INDIA'),
(142, 'Abhayapuri', 'Assam', 'INDIA'),
(143, 'Amguri', 'Assam', 'INDIA'),
(144, 'Anandnagaar', 'Assam', 'INDIA'),
(145, 'Barpeta', 'Assam', 'INDIA'),
(146, 'Barpeta Road', 'Assam', 'INDIA'),
(147, 'Bilasipara', 'Assam', 'INDIA'),
(148, 'Bongaigaon', 'Assam', 'INDIA'),
(149, 'Dhekiajuli', 'Assam', 'INDIA'),
(150, 'Dhubri', 'Assam', 'INDIA'),
(151, 'Dibrugarh', 'Assam', 'INDIA'),
(152, 'Digboi', 'Assam', 'INDIA'),
(153, 'Diphu', 'Assam', 'INDIA'),
(154, 'Dispur', 'Assam', 'INDIA'),
(156, 'Gauripur', 'Assam', 'INDIA'),
(157, 'Goalpara', 'Assam', 'INDIA'),
(158, 'Golaghat', 'Assam', 'INDIA'),
(159, 'Guwahati', 'Assam', 'INDIA'),
(160, 'Haflong', 'Assam', 'INDIA'),
(161, 'Hailakandi', 'Assam', 'INDIA'),
(162, 'Hojai', 'Assam', 'INDIA'),
(163, 'Jorhat', 'Assam', 'INDIA'),
(164, 'Karimganj', 'Assam', 'INDIA'),
(165, 'Kokrajhar', 'Assam', 'INDIA'),
(166, 'Lanka', 'Assam', 'INDIA'),
(167, 'Lumding', 'Assam', 'INDIA'),
(168, 'Mangaldoi', 'Assam', 'INDIA'),
(169, 'Mankachar', 'Assam', 'INDIA'),
(170, 'Margherita', 'Assam', 'INDIA'),
(171, 'Mariani', 'Assam', 'INDIA'),
(172, 'Marigaon', 'Assam', 'INDIA'),
(173, 'Nagaon', 'Assam', 'INDIA'),
(174, 'Nalbari', 'Assam', 'INDIA'),
(175, 'North Lakhimpur', 'Assam', 'INDIA'),
(176, 'Rangia', 'Assam', 'INDIA'),
(177, 'Sibsagar', 'Assam', 'INDIA'),
(178, 'Silapathar', 'Assam', 'INDIA'),
(179, 'Silchar', 'Assam', 'INDIA'),
(180, 'Tezpur', 'Assam', 'INDIA'),
(181, 'Tinsukia', 'Assam', 'INDIA'),
(182, 'Amarpur', 'Bihar', 'INDIA'),
(183, 'Araria', 'Bihar', 'INDIA'),
(184, 'Areraj', 'Bihar', 'INDIA'),
(185, 'Arrah', 'Bihar', 'INDIA'),
(186, 'Asarganj', 'Bihar', 'INDIA'),
(187, 'Aurangabad', 'Bihar', 'INDIA'),
(188, 'Bagaha', 'Bihar', 'INDIA'),
(189, 'Bahadurganj', 'Bihar', 'INDIA'),
(190, 'Bairgania', 'Bihar', 'INDIA'),
(191, 'Bakhtiarpur', 'Bihar', 'INDIA'),
(192, 'Banka', 'Bihar', 'INDIA'),
(193, 'Banmankhi Bazar', 'Bihar', 'INDIA'),
(194, 'Barahiya', 'Bihar', 'INDIA'),
(195, 'Barauli', 'Bihar', 'INDIA'),
(196, 'Barbigha', 'Bihar', 'INDIA'),
(197, 'Barh', 'Bihar', 'INDIA'),
(198, 'Begusarai', 'Bihar', 'INDIA'),
(199, 'Behea', 'Bihar', 'INDIA'),
(200, 'Bettiah', 'Bihar', 'INDIA'),
(201, 'Bhabua', 'Bihar', 'INDIA'),
(202, 'Bhagalpur', 'Bihar', 'INDIA'),
(203, 'Bihar Sharif', 'Bihar', 'INDIA'),
(204, 'Bikramganj', 'Bihar', 'INDIA'),
(205, 'Bodh Gaya', 'Bihar', 'INDIA'),
(206, 'Buxar', 'Bihar', 'INDIA'),
(207, 'Chandan Bara', 'Bihar', 'INDIA'),
(208, 'Chanpatia', 'Bihar', 'INDIA'),
(209, 'Chhapra', 'Bihar', 'INDIA'),
(210, 'Colgong', 'Bihar', 'INDIA'),
(211, 'Dalsinghsarai', 'Bihar', 'INDIA'),
(212, 'Darbhanga', 'Bihar', 'INDIA'),
(213, 'Daudnagar', 'Bihar', 'INDIA'),
(214, 'Dehri-on-Sone', 'Bihar', 'INDIA'),
(215, 'Dhaka', 'Bihar', 'INDIA'),
(216, 'Dighwara', 'Bihar', 'INDIA'),
(217, 'Dumraon', 'Bihar', 'INDIA'),
(218, 'Fatwah', 'Bihar', 'INDIA'),
(219, 'Forbesganj', 'Bihar', 'INDIA'),
(220, 'Gaya', 'Bihar', 'INDIA'),
(221, 'Gogri Jamalpur', 'Bihar', 'INDIA'),
(222, 'Gopalganj', 'Bihar', 'INDIA'),
(223, 'Hajipur', 'Bihar', 'INDIA'),
(224, 'Hilsa', 'Bihar', 'INDIA'),
(225, 'Hisua', 'Bihar', 'INDIA'),
(226, 'Islampur', 'Bihar', 'INDIA'),
(227, 'Jagdispur', 'Bihar', 'INDIA'),
(228, 'Jamalpur', 'Bihar', 'INDIA'),
(229, 'Jamui', 'Bihar', 'INDIA'),
(230, 'Jehanabad', 'Bihar', 'INDIA'),
(231, 'Jhajha', 'Bihar', 'INDIA'),
(232, 'Jhanjharpur', 'Bihar', 'INDIA'),
(233, 'Jogabani', 'Bihar', 'INDIA'),
(234, 'Kanti', 'Bihar', 'INDIA'),
(235, 'Katihar', 'Bihar', 'INDIA'),
(236, 'Khagaria', 'Bihar', 'INDIA'),
(237, 'Kharagpur', 'Bihar', 'INDIA'),
(238, 'Kishanganj', 'Bihar', 'INDIA'),
(239, 'Lakhisarai', 'Bihar', 'INDIA'),
(240, 'Lalganj', 'Bihar', 'INDIA'),
(241, 'Madhepura', 'Bihar', 'INDIA'),
(242, 'Madhubani', 'Bihar', 'INDIA'),
(243, 'Maharajganj', 'Bihar', 'INDIA'),
(244, 'Mahnar Bazar', 'Bihar', 'INDIA'),
(245, 'Makhdumpur', 'Bihar', 'INDIA'),
(246, 'Maner', 'Bihar', 'INDIA'),
(247, 'Manihari', 'Bihar', 'INDIA'),
(248, 'Marhaura', 'Bihar', 'INDIA'),
(249, 'Masaurhi', 'Bihar', 'INDIA'),
(250, 'Mirganj', 'Bihar', 'INDIA'),
(251, 'Mokameh', 'Bihar', 'INDIA'),
(252, 'Motihari', 'Bihar', 'INDIA'),
(253, 'Motipur', 'Bihar', 'INDIA'),
(254, 'Munger', 'Bihar', 'INDIA'),
(255, 'Murliganj', 'Bihar', 'INDIA'),
(256, 'Muzaffarpur', 'Bihar', 'INDIA'),
(257, 'Narkatiaganj', 'Bihar', 'INDIA'),
(258, 'Naugachhia', 'Bihar', 'INDIA'),
(259, 'Nawada', 'Bihar', 'INDIA'),
(260, 'Nokha', 'Bihar', 'INDIA'),
(261, 'Patna', 'Bihar', 'INDIA'),
(262, 'Piro', 'Bihar', 'INDIA'),
(263, 'Purnia', 'Bihar', 'INDIA'),
(264, 'Rafiganj', 'Bihar', 'INDIA'),
(265, 'Rajgir', 'Bihar', 'INDIA'),
(266, 'Ramnagar', 'Bihar', 'INDIA'),
(267, 'Raxaul Bazar', 'Bihar', 'INDIA'),
(268, 'Revelganj', 'Bihar', 'INDIA'),
(269, 'Rosera', 'Bihar', 'INDIA'),
(270, 'Saharsa', 'Bihar', 'INDIA'),
(271, 'Samastipur', 'Bihar', 'INDIA'),
(272, 'Sasaram', 'Bihar', 'INDIA'),
(273, 'Sheikhpura', 'Bihar', 'INDIA'),
(274, 'Sheohar', 'Bihar', 'INDIA'),
(275, 'Sherghati', 'Bihar', 'INDIA'),
(276, 'Silao', 'Bihar', 'INDIA'),
(277, 'Sitamarhi', 'Bihar', 'INDIA'),
(278, 'Siwan', 'Bihar', 'INDIA'),
(279, 'Sonepur', 'Bihar', 'INDIA'),
(280, 'Sugauli', 'Bihar', 'INDIA'),
(281, 'Sultanganj', 'Bihar', 'INDIA'),
(282, 'Supaul', 'Bihar', 'INDIA'),
(283, 'Warisaliganj', 'Bihar', 'INDIA'),
(284, 'Ahiwara', 'Chhattisgarh', 'INDIA'),
(285, 'Akaltara', 'Chhattisgarh', 'INDIA'),
(286, 'Ambagarh Chowki', 'Chhattisgarh', 'INDIA'),
(287, 'Ambikapur', 'Chhattisgarh', 'INDIA'),
(288, 'Arang', 'Chhattisgarh', 'INDIA'),
(289, 'Bade Bacheli', 'Chhattisgarh', 'INDIA'),
(290, 'Balod', 'Chhattisgarh', 'INDIA'),
(291, 'Baloda Bazar', 'Chhattisgarh', 'INDIA'),
(292, 'Bemetra', 'Chhattisgarh', 'INDIA'),
(293, 'Bhatapara', 'Chhattisgarh', 'INDIA'),
(294, 'Bilaspur', 'Chhattisgarh', 'INDIA'),
(295, 'Birgaon', 'Chhattisgarh', 'INDIA'),
(296, 'Champa', 'Chhattisgarh', 'INDIA'),
(297, 'Chirmiri', 'Chhattisgarh', 'INDIA'),
(298, 'Dalli-Rajhara', 'Chhattisgarh', 'INDIA'),
(299, 'Dhamtari', 'Chhattisgarh', 'INDIA'),
(300, 'Dipka', 'Chhattisgarh', 'INDIA'),
(301, 'Dongargarh', 'Chhattisgarh', 'INDIA'),
(302, 'Durg-Bhilai Nagar', 'Chhattisgarh', 'INDIA'),
(303, 'Gobranawapara', 'Chhattisgarh', 'INDIA'),
(304, 'Jagdalpur', 'Chhattisgarh', 'INDIA'),
(305, 'Janjgir', 'Chhattisgarh', 'INDIA'),
(306, 'Jashpurnagar', 'Chhattisgarh', 'INDIA'),
(307, 'Kanker', 'Chhattisgarh', 'INDIA'),
(308, 'Kawardha', 'Chhattisgarh', 'INDIA'),
(309, 'Kondagaon', 'Chhattisgarh', 'INDIA'),
(310, 'Korba', 'Chhattisgarh', 'INDIA'),
(311, 'Mahasamund', 'Chhattisgarh', 'INDIA'),
(312, 'Mahendragarh', 'Chhattisgarh', 'INDIA'),
(313, 'Mungeli', 'Chhattisgarh', 'INDIA'),
(314, 'Naila Janjgir', 'Chhattisgarh', 'INDIA'),
(315, 'Raigarh', 'Chhattisgarh', 'INDIA'),
(316, 'Raipur', 'Chhattisgarh', 'INDIA'),
(317, 'Rajnandgaon', 'Chhattisgarh', 'INDIA'),
(318, 'Sakti', 'Chhattisgarh', 'INDIA'),
(319, 'Tilda Newra', 'Chhattisgarh', 'INDIA'),
(320, 'Amli', 'Dadra & Nagar Haveli', 'INDIA'),
(321, 'Silvassa', 'Dadra & Nagar Haveli', 'INDIA'),
(322, 'Daman and Diu', 'Daman & Diu', 'INDIA'),
(323, 'Daman and Diu', 'Daman & Diu', 'INDIA'),
(324, 'Asola', 'Delhi', 'INDIA'),
(325, 'Delhi', 'Delhi', 'INDIA'),
(326, 'Aldona', 'Goa', 'INDIA'),
(327, 'Curchorem Cacora', 'Goa', 'INDIA'),
(328, 'Madgaon', 'Goa', 'INDIA'),
(329, 'Mapusa', 'Goa', 'INDIA'),
(330, 'Margao', 'Goa', 'INDIA'),
(331, 'Marmagao', 'Goa', 'INDIA'),
(332, 'Panaji', 'Goa', 'INDIA'),
(333, 'Ahmedabad', 'Gujarat', 'INDIA'),
(334, 'Amreli', 'Gujarat', 'INDIA'),
(335, 'Anand', 'Gujarat', 'INDIA'),
(336, 'Ankleshwar', 'Gujarat', 'INDIA'),
(337, 'Bharuch', 'Gujarat', 'INDIA'),
(338, 'Bhavnagar', 'Gujarat', 'INDIA'),
(339, 'Bhuj', 'Gujarat', 'INDIA'),
(340, 'Cambay', 'Gujarat', 'INDIA'),
(341, 'Dahod', 'Gujarat', 'INDIA'),
(342, 'Deesa', 'Gujarat', 'INDIA'),
(343, 'Dharampur', ' India', 'INDIA'),
(344, 'Dholka', 'Gujarat', 'INDIA'),
(345, 'Gandhinagar', 'Gujarat', 'INDIA'),
(346, 'Godhra', 'Gujarat', 'INDIA'),
(347, 'Himatnagar', 'Gujarat', 'INDIA'),
(348, 'Idar', 'Gujarat', 'INDIA'),
(349, 'Jamnagar', 'Gujarat', 'INDIA'),
(350, 'Junagadh', 'Gujarat', 'INDIA'),
(351, 'Kadi', 'Gujarat', 'INDIA'),
(352, 'Kalavad', 'Gujarat', 'INDIA'),
(353, 'Kalol', 'Gujarat', 'INDIA'),
(354, 'Kapadvanj', 'Gujarat', 'INDIA'),
(355, 'Karjan', 'Gujarat', 'INDIA'),
(356, 'Keshod', 'Gujarat', 'INDIA'),
(357, 'Khambhalia', 'Gujarat', 'INDIA'),
(358, 'Khambhat', 'Gujarat', 'INDIA'),
(359, 'Kheda', 'Gujarat', 'INDIA'),
(360, 'Khedbrahma', 'Gujarat', 'INDIA'),
(361, 'Kheralu', 'Gujarat', 'INDIA'),
(362, 'Kodinar', 'Gujarat', 'INDIA'),
(363, 'Lathi', 'Gujarat', 'INDIA'),
(364, 'Limbdi', 'Gujarat', 'INDIA'),
(365, 'Lunawada', 'Gujarat', 'INDIA'),
(366, 'Mahesana', 'Gujarat', 'INDIA'),
(367, 'Mahuva', 'Gujarat', 'INDIA'),
(368, 'Manavadar', 'Gujarat', 'INDIA'),
(369, 'Mandvi', 'Gujarat', 'INDIA'),
(370, 'Mangrol', 'Gujarat', 'INDIA'),
(371, 'Mansa', 'Gujarat', 'INDIA'),
(372, 'Mehmedabad', 'Gujarat', 'INDIA'),
(373, 'Modasa', 'Gujarat', 'INDIA'),
(374, 'Morvi', 'Gujarat', 'INDIA'),
(375, 'Nadiad', 'Gujarat', 'INDIA'),
(376, 'Navsari', 'Gujarat', 'INDIA'),
(377, 'Padra', 'Gujarat', 'INDIA'),
(378, 'Palanpur', 'Gujarat', 'INDIA'),
(379, 'Palitana', 'Gujarat', 'INDIA'),
(380, 'Pardi', 'Gujarat', 'INDIA'),
(381, 'Patan', 'Gujarat', 'INDIA'),
(382, 'Petlad', 'Gujarat', 'INDIA'),
(383, 'Porbandar', 'Gujarat', 'INDIA'),
(384, 'Radhanpur', 'Gujarat', 'INDIA'),
(385, 'Rajkot', 'Gujarat', 'INDIA'),
(386, 'Rajpipla', 'Gujarat', 'INDIA'),
(387, 'Rajula', 'Gujarat', 'INDIA'),
(388, 'Ranavav', 'Gujarat', 'INDIA'),
(389, 'Rapar', 'Gujarat', 'INDIA'),
(390, 'Salaya', 'Gujarat', 'INDIA'),
(391, 'Sanand', 'Gujarat', 'INDIA'),
(392, 'Savarkundla', 'Gujarat', 'INDIA'),
(393, 'Sidhpur', 'Gujarat', 'INDIA'),
(394, 'Sihor', 'Gujarat', 'INDIA'),
(395, 'Songadh', 'Gujarat', 'INDIA'),
(396, 'Surat', 'Gujarat', 'INDIA'),
(397, 'Talaja', 'Gujarat', 'INDIA'),
(398, 'Thangadh', 'Gujarat', 'INDIA'),
(399, 'Tharad', 'Gujarat', 'INDIA'),
(400, 'Umbergaon', 'Gujarat', 'INDIA'),
(401, 'Umreth', 'Gujarat', 'INDIA'),
(402, 'Una', 'Gujarat', 'INDIA'),
(403, 'Unjha', 'Gujarat', 'INDIA'),
(404, 'Upleta', 'Gujarat', 'INDIA'),
(405, 'Vadnagar', 'Gujarat', 'INDIA'),
(406, 'Vadodara', 'Gujarat', 'INDIA'),
(407, 'Valsad', 'Gujarat', 'INDIA'),
(408, 'Vapi', 'Gujarat', 'INDIA'),
(409, 'Vapi', 'Gujarat', 'INDIA'),
(410, 'Veraval', 'Gujarat', 'INDIA'),
(411, 'Vijapur', 'Gujarat', 'INDIA'),
(412, 'Viramgam', 'Gujarat', 'INDIA'),
(413, 'Visnagar', 'Gujarat', 'INDIA'),
(414, 'Vyara', 'Gujarat', 'INDIA'),
(415, 'Wadhwan', 'Gujarat', 'INDIA'),
(416, 'Wankaner', 'Gujarat', 'INDIA'),
(417, 'Adalaj', 'Gujrat', 'INDIA'),
(418, 'Adityana', 'Gujrat', 'INDIA'),
(419, 'Alang', 'Gujrat', 'INDIA'),
(420, 'Ambaji', 'Gujrat', 'INDIA'),
(421, 'Ambaliyasan', 'Gujrat', 'INDIA'),
(422, 'Andada', 'Gujrat', 'INDIA'),
(423, 'Anjar', 'Gujrat', 'INDIA'),
(424, 'Anklav', 'Gujrat', 'INDIA'),
(425, 'Antaliya', 'Gujrat', 'INDIA'),
(426, 'Arambhada', 'Gujrat', 'INDIA'),
(427, 'Atul', 'Gujrat', 'INDIA'),
(428, 'Ballabhgarh', 'Hariyana', 'INDIA'),
(429, 'Ambala', 'Haryana', 'INDIA'),
(430, 'Ambala', 'Haryana', 'INDIA'),
(431, 'Asankhurd', 'Haryana', 'INDIA'),
(432, 'Assandh', 'Haryana', 'INDIA'),
(433, 'Ateli', 'Haryana', 'INDIA'),
(434, 'Babiyal', 'Haryana', 'INDIA'),
(435, 'Bahadurgarh', 'Haryana', 'INDIA'),
(436, 'Barwala', 'Haryana', 'INDIA'),
(437, 'Bhiwani', 'Haryana', 'INDIA'),
(438, 'Charkhi Dadri', 'Haryana', 'INDIA'),
(439, 'Cheeka', 'Haryana', 'INDIA'),
(440, 'Ellenabad 2', 'Haryana', 'INDIA'),
(441, 'Faridabad', 'Haryana', 'INDIA'),
(442, 'Fatehabad', 'Haryana', 'INDIA'),
(443, 'Ganaur', 'Haryana', 'INDIA'),
(444, 'Gharaunda', 'Haryana', 'INDIA'),
(445, 'Gohana', 'Haryana', 'INDIA'),
(446, 'Gurgaon', 'Haryana', 'INDIA'),
(447, 'Haibat(Yamuna Nagar)', 'Haryana', 'INDIA'),
(448, 'Hansi', 'Haryana', 'INDIA'),
(449, 'Hisar', 'Haryana', 'INDIA'),
(450, 'Hodal', 'Haryana', 'INDIA'),
(451, 'Jhajjar', 'Haryana', 'INDIA'),
(452, 'Jind', 'Haryana', 'INDIA'),
(453, 'Kaithal', 'Haryana', 'INDIA'),
(454, 'Kalan Wali', 'Haryana', 'INDIA'),
(455, 'Kalka', 'Haryana', 'INDIA'),
(456, 'Karnal', 'Haryana', 'INDIA'),
(457, 'Ladwa', 'Haryana', 'INDIA'),
(458, 'Mahendragarh', 'Haryana', 'INDIA'),
(459, 'Mandi Dabwali', 'Haryana', 'INDIA'),
(460, 'Narnaul', 'Haryana', 'INDIA'),
(461, 'Narwana', 'Haryana', 'INDIA'),
(462, 'Palwal', 'Haryana', 'INDIA'),
(463, 'Panchkula', 'Haryana', 'INDIA'),
(464, 'Panipat', 'Haryana', 'INDIA'),
(465, 'Pehowa', 'Haryana', 'INDIA'),
(466, 'Pinjore', 'Haryana', 'INDIA'),
(467, 'Rania', 'Haryana', 'INDIA'),
(468, 'Ratia', 'Haryana', 'INDIA'),
(469, 'Rewari', 'Haryana', 'INDIA'),
(470, 'Rohtak', 'Haryana', 'INDIA'),
(471, 'Safidon', 'Haryana', 'INDIA'),
(472, 'Samalkha', 'Haryana', 'INDIA'),
(473, 'Shahbad', 'Haryana', 'INDIA'),
(474, 'Sirsa', 'Haryana', 'INDIA'),
(475, 'Sohna', 'Haryana', 'INDIA'),
(476, 'Sonipat', 'Haryana', 'INDIA'),
(477, 'Taraori', 'Haryana', 'INDIA'),
(478, 'Thanesar', 'Haryana', 'INDIA'),
(479, 'Tohana', 'Haryana', 'INDIA'),
(480, 'Yamunanagar', 'Haryana', 'INDIA'),
(481, 'Arki', 'Himachal Pradesh', 'INDIA'),
(482, 'Baddi', 'Himachal Pradesh', 'INDIA'),
(483, 'Bilaspur', 'Himachal Pradesh', 'INDIA'),
(484, 'Chamba', 'Himachal Pradesh', 'INDIA'),
(485, 'Dalhousie', 'Himachal Pradesh', 'INDIA'),
(486, 'Dharamsala', 'Himachal Pradesh', 'INDIA'),
(487, 'Hamirpur', 'Himachal Pradesh', 'INDIA'),
(488, 'Mandi', 'Himachal Pradesh', 'INDIA'),
(489, 'Nahan', 'Himachal Pradesh', 'INDIA'),
(490, 'Shimla', 'Himachal Pradesh', 'INDIA'),
(491, 'Solan', 'Himachal Pradesh', 'INDIA'),
(492, 'Sundarnagar', 'Himachal Pradesh', 'INDIA'),
(493, 'Jammu', 'Jammu & Kashmir', 'INDIA'),
(494, 'Achabbal', 'Jammu & Kashmir', 'INDIA'),
(495, 'Akhnoor', 'Jammu & Kashmir', 'INDIA'),
(496, 'Anantnag', 'Jammu & Kashmir', 'INDIA'),
(497, 'Arnia', 'Jammu & Kashmir', 'INDIA'),
(498, 'Awantipora', 'Jammu & Kashmir', 'INDIA'),
(499, 'Bandipore', 'Jammu & Kashmir', 'INDIA'),
(500, 'Baramula', 'Jammu & Kashmir', 'INDIA'),
(501, 'Kathua', 'Jammu & Kashmir', 'INDIA'),
(502, 'Leh', 'Jammu & Kashmir', 'INDIA'),
(503, 'Punch', 'Jammu & Kashmir', 'INDIA'),
(504, 'Rajauri', 'Jammu & Kashmir', 'INDIA'),
(505, 'Sopore', 'Jammu & Kashmir', 'INDIA'),
(506, 'Srinagar', 'Jammu & Kashmir', 'INDIA'),
(507, 'Udhampur', 'Jammu & Kashmir', 'INDIA'),
(508, 'Amlabad', 'Jharkhand', 'INDIA'),
(509, 'Ara', 'Jharkhand', 'INDIA'),
(510, 'Barughutu', 'Jharkhand', 'INDIA'),
(511, 'Bokaro Steel City', 'Jharkhand', 'INDIA'),
(512, 'Chaibasa', 'Jharkhand', 'INDIA'),
(513, 'Chakradharpur', 'Jharkhand', 'INDIA'),
(514, 'Chandrapura', 'Jharkhand', 'INDIA'),
(515, 'Chatra', 'Jharkhand', 'INDIA'),
(516, 'Chirkunda', 'Jharkhand', 'INDIA'),
(517, 'Churi', 'Jharkhand', 'INDIA'),
(518, 'Daltonganj', 'Jharkhand', 'INDIA'),
(519, 'Deoghar', 'Jharkhand', 'INDIA'),
(520, 'Dhanbad', 'Jharkhand', 'INDIA'),
(521, 'Dumka', 'Jharkhand', 'INDIA'),
(522, 'Garhwa', 'Jharkhand', 'INDIA'),
(523, 'Ghatshila', 'Jharkhand', 'INDIA'),
(524, 'Giridih', 'Jharkhand', 'INDIA'),
(525, 'Godda', 'Jharkhand', 'INDIA'),
(526, 'Gomoh', 'Jharkhand', 'INDIA'),
(527, 'Gumia', 'Jharkhand', 'INDIA'),
(528, 'Gumla', 'Jharkhand', 'INDIA'),
(529, 'Hazaribag', 'Jharkhand', 'INDIA'),
(530, 'Hussainabad', 'Jharkhand', 'INDIA'),
(531, 'Jamshedpur', 'Jharkhand', 'INDIA'),
(532, 'Jamtara', 'Jharkhand', 'INDIA'),
(533, 'Jhumri Tilaiya', 'Jharkhand', 'INDIA'),
(534, 'Khunti', 'Jharkhand', 'INDIA'),
(535, 'Lohardaga', 'Jharkhand', 'INDIA'),
(536, 'Madhupur', 'Jharkhand', 'INDIA'),
(537, 'Mihijam', 'Jharkhand', 'INDIA'),
(538, 'Musabani', 'Jharkhand', 'INDIA'),
(539, 'Pakaur', 'Jharkhand', 'INDIA'),
(540, 'Patratu', 'Jharkhand', 'INDIA'),
(541, 'Phusro', 'Jharkhand', 'INDIA'),
(542, 'Ramngarh', 'Jharkhand', 'INDIA'),
(543, 'Ranchi', 'Jharkhand', 'INDIA'),
(544, 'Sahibganj', 'Jharkhand', 'INDIA'),
(545, 'Saunda', 'Jharkhand', 'INDIA'),
(546, 'Simdega', 'Jharkhand', 'INDIA'),
(547, 'Tenu Dam-cum- Kathhara', 'Jharkhand', 'INDIA'),
(548, 'Arasikere', 'Karnataka', 'INDIA'),
(549, 'Bangalore', 'Karnataka', 'INDIA'),
(550, 'Belgaum', 'Karnataka', 'INDIA'),
(551, 'Bellary', 'Karnataka', 'INDIA'),
(552, 'Chamrajnagar', 'Karnataka', 'INDIA'),
(553, 'Chikkaballapur', 'Karnataka', 'INDIA'),
(554, 'Chintamani', 'Karnataka', 'INDIA'),
(555, 'Chitradurga', 'Karnataka', 'INDIA'),
(556, 'Gulbarga', 'Karnataka', 'INDIA'),
(557, 'Gundlupet', 'Karnataka', 'INDIA'),
(558, 'Hassan', 'Karnataka', 'INDIA'),
(559, 'Hospet', 'Karnataka', 'INDIA'),
(560, 'Hubli', 'Karnataka', 'INDIA'),
(561, 'Karkala', 'Karnataka', 'INDIA'),
(562, 'Karwar', 'Karnataka', 'INDIA'),
(563, 'Kolar', 'Karnataka', 'INDIA'),
(564, 'Kota', 'Karnataka', 'INDIA'),
(565, 'Lakshmeshwar', 'Karnataka', 'INDIA'),
(566, 'Lingsugur', 'Karnataka', 'INDIA'),
(567, 'Maddur', 'Karnataka', 'INDIA'),
(568, 'Madhugiri', 'Karnataka', 'INDIA'),
(569, 'Madikeri', 'Karnataka', 'INDIA'),
(570, 'Magadi', 'Karnataka', 'INDIA'),
(571, 'Mahalingpur', 'Karnataka', 'INDIA'),
(572, 'Malavalli', 'Karnataka', 'INDIA'),
(573, 'Malur', 'Karnataka', 'INDIA'),
(574, 'Mandya', 'Karnataka', 'INDIA'),
(575, 'Mangalore', 'Karnataka', 'INDIA'),
(576, 'Manvi', 'Karnataka', 'INDIA'),
(577, 'Mudalgi', 'Karnataka', 'INDIA'),
(578, 'Mudbidri', 'Karnataka', 'INDIA'),
(579, 'Muddebihal', 'Karnataka', 'INDIA'),
(580, 'Mudhol', 'Karnataka', 'INDIA'),
(581, 'Mulbagal', 'Karnataka', 'INDIA'),
(582, 'Mundargi', 'Karnataka', 'INDIA'),
(583, 'Mysore', 'Karnataka', 'INDIA'),
(584, 'Nanjangud', 'Karnataka', 'INDIA'),
(585, 'Pavagada', 'Karnataka', 'INDIA'),
(586, 'Puttur', 'Karnataka', 'INDIA'),
(587, 'Rabkavi Banhatti', 'Karnataka', 'INDIA'),
(588, 'Raichur', 'Karnataka', 'INDIA'),
(589, 'Ramanagaram', 'Karnataka', 'INDIA'),
(590, 'Ramdurg', 'Karnataka', 'INDIA'),
(591, 'Ranibennur', 'Karnataka', 'INDIA'),
(592, 'Robertson Pet', 'Karnataka', 'INDIA'),
(593, 'Ron', 'Karnataka', 'INDIA'),
(594, 'Sadalgi', 'Karnataka', 'INDIA'),
(595, 'Sagar', 'Karnataka', 'INDIA'),
(596, 'Sakleshpur', 'Karnataka', 'INDIA'),
(597, 'Sandur', 'Karnataka', 'INDIA'),
(598, 'Sankeshwar', 'Karnataka', 'INDIA'),
(599, 'Saundatti-Yellamma', 'Karnataka', 'INDIA'),
(600, 'Savanur', 'Karnataka', 'INDIA'),
(601, 'Sedam', 'Karnataka', 'INDIA'),
(602, 'Shahabad', 'Karnataka', 'INDIA'),
(603, 'Shahpur', 'Karnataka', 'INDIA'),
(604, 'Shiggaon', 'Karnataka', 'INDIA'),
(605, 'Shikapur', 'Karnataka', 'INDIA'),
(606, 'Shimoga', 'Karnataka', 'INDIA'),
(607, 'Shorapur', 'Karnataka', 'INDIA'),
(608, 'Shrirangapattana', 'Karnataka', 'INDIA'),
(609, 'Sidlaghatta', 'Karnataka', 'INDIA'),
(610, 'Sindgi', 'Karnataka', 'INDIA'),
(611, 'Sindhnur', 'Karnataka', 'INDIA'),
(612, 'Sira', 'Karnataka', 'INDIA'),
(613, 'Sirsi', 'Karnataka', 'INDIA'),
(614, 'Siruguppa', 'Karnataka', 'INDIA'),
(615, 'Srinivaspur', 'Karnataka', 'INDIA'),
(616, 'Talikota', 'Karnataka', 'INDIA'),
(617, 'Tarikere', 'Karnataka', 'INDIA'),
(618, 'Tekkalakota', 'Karnataka', 'INDIA'),
(619, 'Terdal', 'Karnataka', 'INDIA'),
(620, 'Tiptur', 'Karnataka', 'INDIA'),
(621, 'Tumkur', 'Karnataka', 'INDIA'),
(622, 'Udupi', 'Karnataka', 'INDIA'),
(623, 'Vijayapura', 'Karnataka', 'INDIA'),
(624, 'Wadi', 'Karnataka', 'INDIA'),
(625, 'Yadgir', 'Karnataka', 'INDIA'),
(626, 'Adoor', 'Kerala', 'INDIA'),
(627, 'Akathiyoor', 'Kerala', 'INDIA'),
(628, 'Alappuzha', 'Kerala', 'INDIA'),
(629, 'Ancharakandy', 'Kerala', 'INDIA'),
(630, 'Aroor', 'Kerala', 'INDIA'),
(631, 'Ashtamichira', 'Kerala', 'INDIA'),
(632, 'Attingal', 'Kerala', 'INDIA'),
(633, 'Avinissery', 'Kerala', 'INDIA'),
(634, 'Chalakudy', 'Kerala', 'INDIA'),
(635, 'Changanassery', 'Kerala', 'INDIA'),
(636, 'Chendamangalam', 'Kerala', 'INDIA'),
(637, 'Chengannur', 'Kerala', 'INDIA'),
(638, 'Cherthala', 'Kerala', 'INDIA'),
(639, 'Cheruthazham', 'Kerala', 'INDIA'),
(640, 'Chittur-Thathamangalam', 'Kerala', 'INDIA'),
(641, 'Chockli', 'Kerala', 'INDIA'),
(642, 'Erattupetta', 'Kerala', 'INDIA'),
(643, 'Guruvayoor', 'Kerala', 'INDIA'),
(644, 'Irinjalakuda', 'Kerala', 'INDIA'),
(645, 'Kadirur', 'Kerala', 'INDIA'),
(646, 'Kalliasseri', 'Kerala', 'INDIA'),
(647, 'Kalpetta', 'Kerala', 'INDIA'),
(648, 'Kanhangad', 'Kerala', 'INDIA'),
(649, 'Kanjikkuzhi', 'Kerala', 'INDIA'),
(650, 'Kannur', 'Kerala', 'INDIA'),
(651, 'Kasaragod', 'Kerala', 'INDIA'),
(652, 'Kayamkulam', 'Kerala', 'INDIA'),
(653, 'Kochi', 'Kerala', 'INDIA'),
(654, 'Kodungallur', 'Kerala', 'INDIA'),
(655, 'Kollam', 'Kerala', 'INDIA'),
(656, 'Koothuparamba', 'Kerala', 'INDIA'),
(657, 'Kothamangalam', 'Kerala', 'INDIA'),
(658, 'Kottayam', 'Kerala', 'INDIA'),
(659, 'Kozhikode', 'Kerala', 'INDIA'),
(660, 'Kunnamkulam', 'Kerala', 'INDIA'),
(661, 'Malappuram', 'Kerala', 'INDIA'),
(662, 'Mattannur', 'Kerala', 'INDIA'),
(663, 'Mavelikkara', 'Kerala', 'INDIA'),
(664, 'Mavoor', 'Kerala', 'INDIA'),
(665, 'Muvattupuzha', 'Kerala', 'INDIA'),
(666, 'Nedumangad', 'Kerala', 'INDIA'),
(667, 'Neyyattinkara', 'Kerala', 'INDIA'),
(668, 'Ottappalam', 'Kerala', 'INDIA'),
(669, 'Palai', 'Kerala', 'INDIA'),
(670, 'Palakkad', 'Kerala', 'INDIA'),
(671, 'Panniyannur', 'Kerala', 'INDIA'),
(672, 'Pappinisseri', 'Kerala', 'INDIA'),
(673, 'Paravoor', 'Kerala', 'INDIA'),
(674, 'Pathanamthitta', 'Kerala', 'INDIA'),
(675, 'Payyannur', 'Kerala', 'INDIA'),
(676, 'Peringathur', 'Kerala', 'INDIA'),
(677, 'Perinthalmanna', 'Kerala', 'INDIA'),
(678, 'Perumbavoor', 'Kerala', 'INDIA'),
(679, 'Ponnani', 'Kerala', 'INDIA'),
(680, 'Punalur', 'Kerala', 'INDIA'),
(681, 'Quilandy', 'Kerala', 'INDIA'),
(682, 'Shoranur', 'Kerala', 'INDIA'),
(683, 'Taliparamba', 'Kerala', 'INDIA'),
(684, 'Thiruvalla', 'Kerala', 'INDIA'),
(685, 'Thiruvananthapuram', 'Kerala', 'INDIA'),
(686, 'Thodupuzha', 'Kerala', 'INDIA'),
(687, 'Thrissur', 'Kerala', 'INDIA'),
(688, 'Tirur', 'Kerala', 'INDIA'),
(689, 'Vadakara', 'Kerala', 'INDIA'),
(690, 'Vaikom', 'Kerala', 'INDIA'),
(691, 'Varkala', 'Kerala', 'INDIA'),
(692, 'Kavaratti', 'Lakshadweep', 'INDIA'),
(693, 'Ashok Nagar', 'Madhya Pradesh', 'INDIA'),
(694, 'Balaghat', 'Madhya Pradesh', 'INDIA'),
(695, 'Betul', 'Madhya Pradesh', 'INDIA'),
(696, 'Bhopal', 'Madhya Pradesh', 'INDIA'),
(697, 'Burhanpur', 'Madhya Pradesh', 'INDIA'),
(698, 'Chhatarpur', 'Madhya Pradesh', 'INDIA'),
(699, 'Dabra', 'Madhya Pradesh', 'INDIA'),
(700, 'Datia', 'Madhya Pradesh', 'INDIA'),
(701, 'Dewas', 'Madhya Pradesh', 'INDIA'),
(702, 'Dhar', 'Madhya Pradesh', 'INDIA'),
(703, 'Fatehabad', 'Madhya Pradesh', 'INDIA'),
(704, 'Gwalior', 'Madhya Pradesh', 'INDIA'),
(705, 'Indore', 'Madhya Pradesh', 'INDIA'),
(706, 'Itarsi', 'Madhya Pradesh', 'INDIA'),
(707, 'Jabalpur', 'Madhya Pradesh', 'INDIA'),
(708, 'Katni', 'Madhya Pradesh', 'INDIA'),
(709, 'Kotma', 'Madhya Pradesh', 'INDIA'),
(710, 'Lahar', 'Madhya Pradesh', 'INDIA'),
(711, 'Lundi', 'Madhya Pradesh', 'INDIA'),
(712, 'Maharajpur', 'Madhya Pradesh', 'INDIA'),
(713, 'Mahidpur', 'Madhya Pradesh', 'INDIA'),
(714, 'Maihar', 'Madhya Pradesh', 'INDIA'),
(715, 'Malajkhand', 'Madhya Pradesh', 'INDIA'),
(716, 'Manasa', 'Madhya Pradesh', 'INDIA'),
(717, 'Manawar', 'Madhya Pradesh', 'INDIA'),
(718, 'Mandideep', 'Madhya Pradesh', 'INDIA'),
(719, 'Mandla', 'Madhya Pradesh', 'INDIA'),
(720, 'Mandsaur', 'Madhya Pradesh', 'INDIA'),
(721, 'Mauganj', 'Madhya Pradesh', 'INDIA'),
(722, 'Mhow Cantonment', 'Madhya Pradesh', 'INDIA'),
(723, 'Mhowgaon', 'Madhya Pradesh', 'INDIA'),
(724, 'Morena', 'Madhya Pradesh', 'INDIA'),
(725, 'Multai', 'Madhya Pradesh', 'INDIA'),
(726, 'Murwara', 'Madhya Pradesh', 'INDIA'),
(727, 'Nagda', 'Madhya Pradesh', 'INDIA'),
(728, 'Nainpur', 'Madhya Pradesh', 'INDIA'),
(729, 'Narsinghgarh', 'Madhya Pradesh', 'INDIA'),
(730, 'Narsinghgarh', 'Madhya Pradesh', 'INDIA'),
(731, 'Neemuch', 'Madhya Pradesh', 'INDIA'),
(732, 'Nepanagar', 'Madhya Pradesh', 'INDIA'),
(733, 'Niwari', 'Madhya Pradesh', 'INDIA'),
(734, 'Nowgong', 'Madhya Pradesh', 'INDIA'),
(735, 'Nowrozabad', 'Madhya Pradesh', 'INDIA'),
(736, 'Pachore', 'Madhya Pradesh', 'INDIA'),
(737, 'Pali', 'Madhya Pradesh', 'INDIA'),
(738, 'Panagar', 'Madhya Pradesh', 'INDIA'),
(739, 'Pandhurna', 'Madhya Pradesh', 'INDIA'),
(740, 'Panna', 'Madhya Pradesh', 'INDIA'),
(741, 'Pasan', 'Madhya Pradesh', 'INDIA'),
(742, 'Pipariya', 'Madhya Pradesh', 'INDIA'),
(743, 'Pithampur', 'Madhya Pradesh', 'INDIA'),
(744, 'Porsa', 'Madhya Pradesh', 'INDIA'),
(745, 'Prithvipur', 'Madhya Pradesh', 'INDIA'),
(746, 'Raghogarh-Vijaypur', 'Madhya Pradesh', 'INDIA'),
(747, 'Rahatgarh', 'Madhya Pradesh', 'INDIA'),
(748, 'Raisen', 'Madhya Pradesh', 'INDIA'),
(749, 'Rajgarh', 'Madhya Pradesh', 'INDIA'),
(750, 'Ratlam', 'Madhya Pradesh', 'INDIA'),
(751, 'Rau', 'Madhya Pradesh', 'INDIA'),
(752, 'Rehli', 'Madhya Pradesh', 'INDIA'),
(753, 'Rewa', 'Madhya Pradesh', 'INDIA'),
(754, 'Sabalgarh', 'Madhya Pradesh', 'INDIA'),
(755, 'Sagar', 'Madhya Pradesh', 'INDIA'),
(756, 'Sanawad', 'Madhya Pradesh', 'INDIA'),
(757, 'Sarangpur', 'Madhya Pradesh', 'INDIA'),
(758, 'Sarni', 'Madhya Pradesh', 'INDIA'),
(759, 'Satna', 'Madhya Pradesh', 'INDIA'),
(760, 'Sausar', 'Madhya Pradesh', 'INDIA'),
(761, 'Sehore', 'Madhya Pradesh', 'INDIA'),
(762, 'Sendhwa', 'Madhya Pradesh', 'INDIA'),
(763, 'Seoni', 'Madhya Pradesh', 'INDIA'),
(764, 'Seoni-Malwa', 'Madhya Pradesh', 'INDIA'),
(765, 'Shahdol', 'Madhya Pradesh', 'INDIA'),
(766, 'Shajapur', 'Madhya Pradesh', 'INDIA'),
(767, 'Shamgarh', 'Madhya Pradesh', 'INDIA'),
(768, 'Sheopur', 'Madhya Pradesh', 'INDIA'),
(769, 'Shivpuri', 'Madhya Pradesh', 'INDIA'),
(770, 'Shujalpur', 'Madhya Pradesh', 'INDIA'),
(771, 'Sidhi', 'Madhya Pradesh', 'INDIA'),
(772, 'Sihora', 'Madhya Pradesh', 'INDIA'),
(773, 'Singrauli', 'Madhya Pradesh', 'INDIA'),
(774, 'Sironj', 'Madhya Pradesh', 'INDIA'),
(775, 'Sohagpur', 'Madhya Pradesh', 'INDIA'),
(776, 'Tarana', 'Madhya Pradesh', 'INDIA'),
(777, 'Tikamgarh', 'Madhya Pradesh', 'INDIA'),
(778, 'Ujhani', 'Madhya Pradesh', 'INDIA'),
(779, 'Ujjain', 'Madhya Pradesh', 'INDIA'),
(780, 'Umaria', 'Madhya Pradesh', 'INDIA'),
(781, 'Vidisha', 'Madhya Pradesh', 'INDIA'),
(782, 'Wara Seoni', 'Madhya Pradesh', 'INDIA'),
(783, 'Ahmednagar', 'Maharashtra', 'INDIA'),
(784, 'Akola', 'Maharashtra', 'INDIA'),
(785, 'Amravati', 'Maharashtra', 'INDIA'),
(786, 'Aurangabad', 'Maharashtra', 'INDIA'),
(787, 'Baramati', 'Maharashtra', 'INDIA'),
(788, 'Chalisgaon', 'Maharashtra', 'INDIA'),
(789, 'Chinchani', 'Maharashtra', 'INDIA'),
(790, 'Devgarh', 'Maharashtra', 'INDIA'),
(791, 'Dhule', 'Maharashtra', 'INDIA'),
(792, 'Dombivli', 'Maharashtra', 'INDIA'),
(793, 'Durgapur', 'Maharashtra', 'INDIA'),
(794, 'Ichalkaranji', 'Maharashtra', 'INDIA'),
(795, 'Jalna', 'Maharashtra', 'INDIA'),
(796, 'Kalyan', 'Maharashtra', 'INDIA'),
(797, 'Latur', 'Maharashtra', 'INDIA'),
(798, 'Loha', 'Maharashtra', 'INDIA'),
(799, 'Lonar', 'Maharashtra', 'INDIA'),
(800, 'Lonavla', 'Maharashtra', 'INDIA'),
(801, 'Mahad', 'Maharashtra', 'INDIA'),
(802, 'Mahuli', 'Maharashtra', 'INDIA'),
(803, 'Malegaon', 'Maharashtra', 'INDIA'),
(804, 'Malkapur', 'Maharashtra', 'INDIA'),
(805, 'Manchar', 'Maharashtra', 'INDIA'),
(806, 'Mangalvedhe', 'Maharashtra', 'INDIA'),
(807, 'Mangrulpir', 'Maharashtra', 'INDIA'),
(808, 'Manjlegaon', 'Maharashtra', 'INDIA'),
(809, 'Manmad', 'Maharashtra', 'INDIA'),
(810, 'Manwath', 'Maharashtra', 'INDIA'),
(811, 'Mehkar', 'Maharashtra', 'INDIA'),
(812, 'Mhaswad', 'Maharashtra', 'INDIA'),
(813, 'Miraj', 'Maharashtra', 'INDIA'),
(814, 'Morshi', 'Maharashtra', 'INDIA'),
(815, 'Mukhed', 'Maharashtra', 'INDIA'),
(816, 'Mul', 'Maharashtra', 'INDIA'),
(817, 'Mumbai', 'Maharashtra', 'INDIA'),
(818, 'Murtijapur', 'Maharashtra', 'INDIA'),
(819, 'Nagpur', 'Maharashtra', 'INDIA'),
(820, 'Nalasopara', 'Maharashtra', 'INDIA'),
(821, 'Nanded-Waghala', 'Maharashtra', 'INDIA'),
(822, 'Nandgaon', 'Maharashtra', 'INDIA'),
(823, 'Nandura', 'Maharashtra', 'INDIA'),
(824, 'Nandurbar', 'Maharashtra', 'INDIA'),
(825, 'Narkhed', 'Maharashtra', 'INDIA'),
(826, 'Nashik', 'Maharashtra', 'INDIA'),
(827, 'Navi Mumbai', 'Maharashtra', 'INDIA'),
(828, 'Nawapur', 'Maharashtra', 'INDIA'),
(829, 'Nilanga', 'Maharashtra', 'INDIA'),
(830, 'Osmanabad', 'Maharashtra', 'INDIA'),
(831, 'Ozar', 'Maharashtra', 'INDIA'),
(832, 'Pachora', 'Maharashtra', 'INDIA'),
(833, 'Paithan', 'Maharashtra', 'INDIA'),
(834, 'Palghar', 'Maharashtra', 'INDIA'),
(835, 'Pandharkaoda', 'Maharashtra', 'INDIA'),
(836, 'Pandharpur', 'Maharashtra', 'INDIA'),
(837, 'Panvel', 'Maharashtra', 'INDIA'),
(838, 'Parbhani', 'Maharashtra', 'INDIA'),
(839, 'Parli', 'Maharashtra', 'INDIA'),
(840, 'Parola', 'Maharashtra', 'INDIA'),
(841, 'Partur', 'Maharashtra', 'INDIA'),
(842, 'Pathardi', 'Maharashtra', 'INDIA'),
(843, 'Pathri', 'Maharashtra', 'INDIA'),
(844, 'Patur', 'Maharashtra', 'INDIA'),
(845, 'Pauni', 'Maharashtra', 'INDIA'),
(846, 'Pen', 'Maharashtra', 'INDIA'),
(847, 'Phaltan', 'Maharashtra', 'INDIA'),
(848, 'Pulgaon', 'Maharashtra', 'INDIA'),
(849, 'Pune', 'Maharashtra', 'INDIA'),
(850, 'Purna', 'Maharashtra', 'INDIA'),
(851, 'Pusad', 'Maharashtra', 'INDIA'),
(852, 'Rahuri', 'Maharashtra', 'INDIA'),
(853, 'Rajura', 'Maharashtra', 'INDIA'),
(854, 'Ramtek', 'Maharashtra', 'INDIA'),
(855, 'Ratnagiri', 'Maharashtra', 'INDIA'),
(856, 'Raver', 'Maharashtra', 'INDIA'),
(857, 'Risod', 'Maharashtra', 'INDIA'),
(858, 'Sailu', 'Maharashtra', 'INDIA'),
(859, 'Sangamner', 'Maharashtra', 'INDIA'),
(860, 'Sangli', 'Maharashtra', 'INDIA'),
(861, 'Sangole', 'Maharashtra', 'INDIA'),
(862, 'Sasvad', 'Maharashtra', 'INDIA'),
(863, 'Satana', 'Maharashtra', 'INDIA'),
(864, 'Satara', 'Maharashtra', 'INDIA'),
(865, 'Savner', 'Maharashtra', 'INDIA'),
(866, 'Sawantwadi', 'Maharashtra', 'INDIA'),
(867, 'Shahade', 'Maharashtra', 'INDIA'),
(868, 'Shegaon', 'Maharashtra', 'INDIA'),
(869, 'Shendurjana', 'Maharashtra', 'INDIA'),
(870, 'Shirdi', 'Maharashtra', 'INDIA'),
(871, 'Shirpur-Warwade', 'Maharashtra', 'INDIA'),
(872, 'Shirur', 'Maharashtra', 'INDIA'),
(873, 'Shrigonda', 'Maharashtra', 'INDIA'),
(874, 'Shrirampur', 'Maharashtra', 'INDIA'),
(875, 'Sillod', 'Maharashtra', 'INDIA'),
(876, 'Sinnar', 'Maharashtra', 'INDIA'),
(877, 'Solapur', 'Maharashtra', 'INDIA'),
(878, 'Soyagaon', 'Maharashtra', 'INDIA'),
(879, 'Talegaon Dabhade', 'Maharashtra', 'INDIA'),
(880, 'Talode', 'Maharashtra', 'INDIA'),
(881, 'Tasgaon', 'Maharashtra', 'INDIA'),
(882, 'Tirora', 'Maharashtra', 'INDIA'),
(883, 'Tuljapur', 'Maharashtra', 'INDIA'),
(884, 'Tumsar', 'Maharashtra', 'INDIA'),
(885, 'Uran', 'Maharashtra', 'INDIA'),
(886, 'Uran Islampur', 'Maharashtra', 'INDIA'),
(887, 'Wadgaon Road', 'Maharashtra', 'INDIA'),
(888, 'Wai', 'Maharashtra', 'INDIA'),
(889, 'Wani', 'Maharashtra', 'INDIA'),
(890, 'Wardha', 'Maharashtra', 'INDIA'),
(891, 'Warora', 'Maharashtra', 'INDIA'),
(892, 'Warud', 'Maharashtra', 'INDIA'),
(893, 'Washim', 'Maharashtra', 'INDIA'),
(894, 'Yevla', 'Maharashtra', 'INDIA'),
(895, 'Uchgaon', 'Maharashtra', 'INDIA'),
(896, 'Udgir', 'Maharashtra', 'INDIA'),
(897, 'Umarga', 'Maharastra', 'INDIA'),
(898, 'Umarkhed', 'Maharastra', 'INDIA'),
(899, 'Umred', 'Maharastra', 'INDIA'),
(900, 'Vadgaon Kasba', 'Maharastra', 'INDIA'),
(901, 'Vaijapur', 'Maharastra', 'INDIA'),
(902, 'Vasai', 'Maharastra', 'INDIA'),
(903, 'Virar', 'Maharastra', 'INDIA'),
(904, 'Vita', 'Maharastra', 'INDIA'),
(905, 'Yavatmal', 'Maharastra', 'INDIA'),
(906, 'Yawal', 'Maharastra', 'INDIA'),
(907, 'Imphal', 'Manipur', 'INDIA'),
(908, 'Kakching', 'Manipur', 'INDIA'),
(909, 'Lilong', 'Manipur', 'INDIA'),
(910, 'Mayang Imphal', 'Manipur', 'INDIA'),
(911, 'Thoubal', 'Manipur', 'INDIA'),
(912, 'Jowai', 'Meghalaya', 'INDIA'),
(913, 'Nongstoin', 'Meghalaya', 'INDIA'),
(914, 'Shillong', 'Meghalaya', 'INDIA'),
(915, 'Tura', 'Meghalaya', 'INDIA'),
(916, 'Aizawl', 'Mizoram', 'INDIA'),
(917, 'Champhai', 'Mizoram', 'INDIA'),
(918, 'Lunglei', 'Mizoram', 'INDIA'),
(919, 'Saiha', 'Mizoram', 'INDIA'),
(920, 'Dimapur', 'Nagaland', 'INDIA'),
(921, 'Kohima', 'Nagaland', 'INDIA'),
(922, 'Mokokchung', 'Nagaland', 'INDIA'),
(923, 'Tuensang', 'Nagaland', 'INDIA'),
(924, 'Wokha', 'Nagaland', 'INDIA'),
(925, 'Zunheboto', 'Nagaland', 'INDIA'),
(950, 'Anandapur', 'Orissa', 'INDIA'),
(951, 'Anugul', 'Orissa', 'INDIA'),
(952, 'Asika', 'Orissa', 'INDIA'),
(953, 'Balangir', 'Orissa', 'INDIA'),
(954, 'Balasore', 'Orissa', 'INDIA'),
(955, 'Baleshwar', 'Orissa', 'INDIA'),
(956, 'Bamra', 'Orissa', 'INDIA'),
(957, 'Barbil', 'Orissa', 'INDIA'),
(958, 'Bargarh', 'Orissa', 'INDIA'),
(959, 'Bargarh', 'Orissa', 'INDIA'),
(960, 'Baripada', 'Orissa', 'INDIA'),
(961, 'Basudebpur', 'Orissa', 'INDIA'),
(962, 'Belpahar', 'Orissa', 'INDIA'),
(963, 'Bhadrak', 'Orissa', 'INDIA'),
(964, 'Bhawanipatna', 'Orissa', 'INDIA'),
(965, 'Bhuban', 'Orissa', 'INDIA'),
(966, 'Bhubaneswar', 'Orissa', 'INDIA'),
(967, 'Biramitrapur', 'Orissa', 'INDIA'),
(968, 'Brahmapur', 'Orissa', 'INDIA'),
(969, 'Brajrajnagar', 'Orissa', 'INDIA'),
(970, 'Byasanagar', 'Orissa', 'INDIA'),
(971, 'Cuttack', 'Orissa', 'INDIA'),
(972, 'Debagarh', 'Orissa', 'INDIA'),
(973, 'Dhenkanal', 'Orissa', 'INDIA'),
(974, 'Gunupur', 'Orissa', 'INDIA'),
(975, 'Hinjilicut', 'Orissa', 'INDIA'),
(976, 'Jagatsinghapur', 'Orissa', 'INDIA'),
(977, 'Jajapur', 'Orissa', 'INDIA'),
(978, 'Jaleswar', 'Orissa', 'INDIA'),
(979, 'Jatani', 'Orissa', 'INDIA'),
(980, 'Jeypur', 'Orissa', 'INDIA'),
(981, 'Jharsuguda', 'Orissa', 'INDIA'),
(982, 'Joda', 'Orissa', 'INDIA'),
(983, 'Kantabanji', 'Orissa', 'INDIA'),
(984, 'Karanjia', 'Orissa', 'INDIA'),
(985, 'Kendrapara', 'Orissa', 'INDIA'),
(986, 'Kendujhar', 'Orissa', 'INDIA'),
(987, 'Khordha', 'Orissa', 'INDIA'),
(988, 'Koraput', 'Orissa', 'INDIA'),
(989, 'Malkangiri', 'Orissa', 'INDIA'),
(990, 'Nabarangapur', 'Orissa', 'INDIA'),
(991, 'Paradip', 'Orissa', 'INDIA'),
(992, 'Parlakhemundi', 'Orissa', 'INDIA'),
(993, 'Pattamundai', 'Orissa', 'INDIA'),
(994, 'Phulabani', 'Orissa', 'INDIA'),
(995, 'Puri', 'Orissa', 'INDIA'),
(996, 'Rairangpur', 'Orissa', 'INDIA'),
(997, 'Rajagangapur', 'Orissa', 'INDIA'),
(998, 'Raurkela', 'Orissa', 'INDIA'),
(999, 'Rayagada', 'Orissa', 'INDIA'),
(1000, 'Sambalpur', 'Orissa', 'INDIA'),
(1001, 'Soro', 'Orissa', 'INDIA'),
(1002, 'Sunabeda', 'Orissa', 'INDIA'),
(1003, 'Sundargarh', 'Orissa', 'INDIA'),
(1004, 'Talcher', 'Orissa', 'INDIA'),
(1005, 'Titlagarh', 'Orissa', 'INDIA'),
(1006, 'Umarkote', 'Orissa', 'INDIA'),
(1007, 'Karaikal', 'Pondicherry', 'INDIA'),
(1008, 'Mahe', 'Pondicherry', 'INDIA'),
(1009, 'Pondicherry', 'Pondicherry', 'INDIA'),
(1010, 'Yanam', 'Pondicherry', 'INDIA'),
(1011, 'Ahmedgarh', 'Punjab', 'INDIA'),
(1012, 'Amritsar', 'Punjab', 'INDIA'),
(1013, 'Barnala', 'Punjab', 'INDIA'),
(1014, 'Batala', 'Punjab', 'INDIA'),
(1015, 'Bathinda', 'Punjab', 'INDIA'),
(1016, 'Bhagha Purana', 'Punjab', 'INDIA'),
(1017, 'Budhlada', 'Punjab', 'INDIA'),
(1018, 'Chandigarh', 'Punjab', 'INDIA'),
(1019, 'Dasua', 'Punjab', 'INDIA'),
(1020, 'Dhuri', 'Punjab', 'INDIA'),
(1021, 'Dinanagar', 'Punjab', 'INDIA'),
(1022, 'Faridkot', 'Punjab', 'INDIA'),
(1023, 'Fazilka', 'Punjab', 'INDIA'),
(1024, 'Firozpur', 'Punjab', 'INDIA'),
(1025, 'Firozpur Cantt.', 'Punjab', 'INDIA'),
(1026, 'Giddarbaha', 'Punjab', 'INDIA'),
(1027, 'Gobindgarh', 'Punjab', 'INDIA'),
(1028, 'Gurdaspur', 'Punjab', 'INDIA'),
(1029, 'Hoshiarpur', 'Punjab', 'INDIA'),
(1030, 'Jagraon', 'Punjab', 'INDIA'),
(1031, 'Jaitu', 'Punjab', 'INDIA'),
(1032, 'Jalalabad', 'Punjab', 'INDIA'),
(1033, 'Jalandhar', 'Punjab', 'INDIA'),
(1034, 'Jalandhar Cantt.', 'Punjab', 'INDIA'),
(1035, 'Jandiala', 'Punjab', 'INDIA'),
(1036, 'Kapurthala', 'Punjab', 'INDIA'),
(1037, 'Karoran', 'Punjab', 'INDIA'),
(1038, 'Kartarpur', 'Punjab', 'INDIA'),
(1039, 'Khanna', 'Punjab', 'INDIA'),
(1040, 'Kharar', 'Punjab', 'INDIA'),
(1041, 'Kot Kapura', 'Punjab', 'INDIA'),
(1042, 'Kurali', 'Punjab', 'INDIA'),
(1043, 'Longowal', 'Punjab', 'INDIA'),
(1044, 'Ludhiana', 'Punjab', 'INDIA'),
(1045, 'Malerkotla', 'Punjab', 'INDIA'),
(1046, 'Malout', 'Punjab', 'INDIA'),
(1047, 'Mansa', 'Punjab', 'INDIA'),
(1048, 'Maur', 'Punjab', 'INDIA'),
(1049, 'Moga', 'Punjab', 'INDIA'),
(1050, 'Mohali', 'Punjab', 'INDIA'),
(1051, 'Morinda', 'Punjab', 'INDIA'),
(1052, 'Mukerian', 'Punjab', 'INDIA'),
(1053, 'Muktsar', 'Punjab', 'INDIA'),
(1054, 'Nabha', 'Punjab', 'INDIA'),
(1055, 'Nakodar', 'Punjab', 'INDIA'),
(1056, 'Nangal', 'Punjab', 'INDIA'),
(1057, 'Nawanshahr', 'Punjab', 'INDIA'),
(1058, 'Pathankot', 'Punjab', 'INDIA'),
(1059, 'Patiala', 'Punjab', 'INDIA'),
(1060, 'Patran', 'Punjab', 'INDIA'),
(1061, 'Patti', 'Punjab', 'INDIA'),
(1062, 'Phagwara', 'Punjab', 'INDIA'),
(1063, 'Phillaur', 'Punjab', 'INDIA'),
(1064, 'Qadian', 'Punjab', 'INDIA'),
(1065, 'Raikot', 'Punjab', 'INDIA'),
(1066, 'Rajpura', 'Punjab', 'INDIA'),
(1067, 'Rampura Phul', 'Punjab', 'INDIA'),
(1068, 'Rupnagar', 'Punjab', 'INDIA'),
(1069, 'Samana', 'Punjab', 'INDIA'),
(1070, 'Sangrur', 'Punjab', 'INDIA'),
(1071, 'Sirhind Fatehgarh Sahib', 'Punjab', 'INDIA'),
(1072, 'Sujanpur', 'Punjab', 'INDIA'),
(1073, 'Sunam', 'Punjab', 'INDIA'),
(1074, 'Talwara', 'Punjab', 'INDIA'),
(1075, 'Tarn Taran', 'Punjab', 'INDIA'),
(1076, 'Urmar Tanda', 'Punjab', 'INDIA'),
(1077, 'Zira', 'Punjab', 'INDIA'),
(1078, 'Zirakpur', 'Punjab', 'INDIA'),
(1079, 'Bali', 'Rajasthan', 'INDIA'),
(1080, 'Banswara', 'Rajastan', 'INDIA'),
(1081, 'Ajmer', 'Rajasthan', 'INDIA'),
(1082, 'Alwar', 'Rajasthan', 'INDIA'),
(1083, 'Bandikui', 'Rajasthan', 'INDIA'),
(1084, 'Baran', 'Rajasthan', 'INDIA'),
(1085, 'Barmer', 'Rajasthan', 'INDIA'),
(1086, 'Bikaner', 'Rajasthan', 'INDIA'),
(1087, 'Fatehpur', 'Rajasthan', 'INDIA'),
(1088, 'Jaipur', 'Rajasthan', 'INDIA'),
(1089, 'Jaisalmer', 'Rajasthan', 'INDIA'),
(1090, 'Jodhpur', 'Rajasthan', 'INDIA'),
(1091, 'Kota', 'Rajasthan', 'INDIA'),
(1092, 'Lachhmangarh', 'Rajasthan', 'INDIA'),
(1093, 'Ladnu', 'Rajasthan', 'INDIA'),
(1094, 'Lakheri', 'Rajasthan', 'INDIA'),
(1095, 'Lalsot', 'Rajasthan', 'INDIA'),
(1096, 'Losal', 'Rajasthan', 'INDIA'),
(1097, 'Makrana', 'Rajasthan', 'INDIA'),
(1098, 'Malpura', 'Rajasthan', 'INDIA'),
(1099, 'Mandalgarh', 'Rajasthan', 'INDIA'),
(1100, 'Mandawa', 'Rajasthan', 'INDIA'),
(1101, 'Mangrol', 'Rajasthan', 'INDIA'),
(1102, 'Merta City', 'Rajasthan', 'INDIA'),
(1103, 'Mount Abu', 'Rajasthan', 'INDIA'),
(1104, 'Nadbai', 'Rajasthan', 'INDIA'),
(1105, 'Nagar', 'Rajasthan', 'INDIA'),
(1106, 'Nagaur', 'Rajasthan', 'INDIA'),
(1107, 'Nargund', 'Rajasthan', 'INDIA'),
(1108, 'Nasirabad', 'Rajasthan', 'INDIA'),
(1109, 'Nathdwara', 'Rajasthan', 'INDIA'),
(1110, 'Navalgund', 'Rajasthan', 'INDIA'),
(1111, 'Nawalgarh', 'Rajasthan', 'INDIA'),
(1112, 'Neem-Ka-Thana', 'Rajasthan', 'INDIA'),
(1113, 'Nelamangala', 'Rajasthan', 'INDIA'),
(1114, 'Nimbahera', 'Rajasthan', 'INDIA'),
(1115, 'Nipani', 'Rajasthan', 'INDIA'),
(1116, 'Niwai', 'Rajasthan', 'INDIA'),
(1117, 'Nohar', 'Rajasthan', 'INDIA'),
(1118, 'Nokha', 'Rajasthan', 'INDIA'),
(1119, 'Pali', 'Rajasthan', 'INDIA'),
(1120, 'Phalodi', 'Rajasthan', 'INDIA'),
(1121, 'Phulera', 'Rajasthan', 'INDIA'),
(1122, 'Pilani', 'Rajasthan', 'INDIA'),
(1123, 'Pilibanga', 'Rajasthan', 'INDIA'),
(1124, 'Pindwara', 'Rajasthan', 'INDIA'),
(1125, 'Pipar City', 'Rajasthan', 'INDIA'),
(1126, 'Prantij', 'Rajasthan', 'INDIA'),
(1127, 'Pratapgarh', 'Rajasthan', 'INDIA'),
(1128, 'Raisinghnagar', 'Rajasthan', 'INDIA'),
(1129, 'Rajakhera', 'Rajasthan', 'INDIA'),
(1130, 'Rajaldesar', 'Rajasthan', 'INDIA'),
(1131, 'Rajgarh (Alwar)', 'Rajasthan', 'INDIA'),
(1132, 'Rajgarh (Churu', 'Rajasthan', 'INDIA'),
(1133, 'Rajsamand', 'Rajasthan', 'INDIA'),
(1134, 'Ramganj Mandi', 'Rajasthan', 'INDIA'),
(1135, 'Ramngarh', 'Rajasthan', 'INDIA'),
(1136, 'Ratangarh', 'Rajasthan', 'INDIA'),
(1137, 'Rawatbhata', 'Rajasthan', 'INDIA'),
(1138, 'Rawatsar', 'Rajasthan', 'INDIA'),
(1139, 'Reengus', 'Rajasthan', 'INDIA'),
(1140, 'Sadri', 'Rajasthan', 'INDIA'),
(1141, 'Sadulshahar', 'Rajasthan', 'INDIA'),
(1142, 'Sagwara', 'Rajasthan', 'INDIA'),
(1143, 'Sambhar', 'Rajasthan', 'INDIA'),
(1144, 'Sanchore', 'Rajasthan', 'INDIA'),
(1145, 'Sangaria', 'Rajasthan', 'INDIA'),
(1146, 'Sardarshahar', 'Rajasthan', 'INDIA'),
(1147, 'Sawai Madhopur', 'Rajasthan', 'INDIA'),
(1148, 'Shahpura', 'Rajasthan', 'INDIA'),
(1149, 'Shahpura', 'Rajasthan', 'INDIA'),
(1150, 'Sheoganj', 'Rajasthan', 'INDIA'),
(1151, 'Sikar', 'Rajasthan', 'INDIA'),
(1152, 'Sirohi', 'Rajasthan', 'INDIA'),
(1153, 'Sojat', 'Rajasthan', 'INDIA'),
(1154, 'Sri Madhopur', 'Rajasthan', 'INDIA'),
(1155, 'Sujangarh', 'Rajasthan', 'INDIA'),
(1156, 'Sumerpur', 'Rajasthan', 'INDIA'),
(1157, 'Suratgarh', 'Rajasthan', 'INDIA'),
(1158, 'Taranagar', 'Rajasthan', 'INDIA'),
(1159, 'Todabhim', 'Rajasthan', 'INDIA'),
(1160, 'Todaraisingh', 'Rajasthan', 'INDIA'),
(1161, 'Tonk', 'Rajasthan', 'INDIA'),
(1162, 'Udaipur', 'Rajasthan', 'INDIA'),
(1163, 'Udaipurwati', 'Rajasthan', 'INDIA'),
(1164, 'Vijainagar', 'Rajasthan', 'INDIA'),
(1165, 'Gangtok', 'Sikkim', 'INDIA'),
(1166, 'Calcutta', 'West Bengal', 'INDIA'),
(1167, 'Arakkonam', 'Tamil Nadu', 'INDIA'),
(1168, 'Arcot', 'Tamil Nadu', 'INDIA'),
(1169, 'Aruppukkottai', 'Tamil Nadu', 'INDIA'),
(1170, 'Bhavani', 'Tamil Nadu', 'INDIA'),
(1171, 'Chengalpattu', 'Tamil Nadu', 'INDIA'),
(1172, 'Chennai', 'Tamil Nadu', 'INDIA'),
(1173, 'Chinna salem', 'Tamil nadu', 'INDIA'),
(1174, 'Coimbatore', 'Tamil Nadu', 'INDIA'),
(1175, 'Coonoor', 'Tamil Nadu', 'INDIA'),
(1176, 'Cuddalore', 'Tamil Nadu', 'INDIA'),
(1177, 'Dharmapuri', 'Tamil Nadu', 'INDIA'),
(1178, 'Dindigul', 'Tamil Nadu', 'INDIA'),
(1179, 'Erode', 'Tamil Nadu', 'INDIA'),
(1180, 'Gudalur', 'Tamil Nadu', 'INDIA'),
(1181, 'Gudalur', 'Tamil Nadu', 'INDIA'),
(1182, 'Gudalur', 'Tamil Nadu', 'INDIA'),
(1183, 'Kanchipuram', 'Tamil Nadu', 'INDIA'),
(1184, 'Karaikudi', 'Tamil Nadu', 'INDIA'),
(1185, 'Karungal', 'Tamil Nadu', 'INDIA'),
(1186, 'Karur', 'Tamil Nadu', 'INDIA'),
(1187, 'Kollankodu', 'Tamil Nadu', 'INDIA'),
(1188, 'Lalgudi', 'Tamil Nadu', 'INDIA'),
(1189, 'Madurai', 'Tamil Nadu', 'INDIA'),
(1190, 'Nagapattinam', 'Tamil Nadu', 'INDIA'),
(1191, 'Nagercoil', 'Tamil Nadu', 'INDIA'),
(1192, 'Namagiripettai', 'Tamil Nadu', 'INDIA'),
(1193, 'Namakkal', 'Tamil Nadu', 'INDIA'),
(1194, 'Nandivaram-Guduvancheri', 'Tamil Nadu', 'INDIA'),
(1195, 'Nanjikottai', 'Tamil Nadu', 'INDIA'),
(1196, 'Natham', 'Tamil Nadu', 'INDIA'),
(1197, 'Nellikuppam', 'Tamil Nadu', 'INDIA'),
(1198, 'Neyveli', 'Tamil Nadu', 'INDIA'),
(1199, 'O\' Valley', 'Tamil Nadu', 'INDIA'),
(1200, 'Oddanchatram', 'Tamil Nadu', 'INDIA'),
(1201, 'P.N.Patti', 'Tamil Nadu', 'INDIA'),
(1202, 'Pacode', 'Tamil Nadu', 'INDIA'),
(1203, 'Padmanabhapuram', 'Tamil Nadu', 'INDIA'),
(1204, 'Palani', 'Tamil Nadu', 'INDIA'),
(1205, 'Palladam', 'Tamil Nadu', 'INDIA'),
(1206, 'Pallapatti', 'Tamil Nadu', 'INDIA'),
(1207, 'Pallikonda', 'Tamil Nadu', 'INDIA'),
(1208, 'Panagudi', 'Tamil Nadu', 'INDIA'),
(1209, 'Panruti', 'Tamil Nadu', 'INDIA'),
(1210, 'Paramakudi', 'Tamil Nadu', 'INDIA'),
(1211, 'Parangipettai', 'Tamil Nadu', 'INDIA'),
(1212, 'Pattukkottai', 'Tamil Nadu', 'INDIA'),
(1213, 'Perambalur', 'Tamil Nadu', 'INDIA'),
(1214, 'Peravurani', 'Tamil Nadu', 'INDIA'),
(1215, 'Periyakulam', 'Tamil Nadu', 'INDIA'),
(1216, 'Periyasemur', 'Tamil Nadu', 'INDIA'),
(1217, 'Pernampattu', 'Tamil Nadu', 'INDIA'),
(1218, 'Pollachi', 'Tamil Nadu', 'INDIA'),
(1219, 'Polur', 'Tamil Nadu', 'INDIA'),
(1220, 'Ponneri', 'Tamil Nadu', 'INDIA'),
(1221, 'Pudukkottai', 'Tamil Nadu', 'INDIA'),
(1222, 'Pudupattinam', 'Tamil Nadu', 'INDIA'),
(1223, 'Puliyankudi', 'Tamil Nadu', 'INDIA'),
(1224, 'Punjaipugalur', 'Tamil Nadu', 'INDIA'),
(1225, 'Rajapalayam', 'Tamil Nadu', 'INDIA'),
(1226, 'Ramanathapuram', 'Tamil Nadu', 'INDIA'),
(1227, 'Rameshwaram', 'Tamil Nadu', 'INDIA'),
(1228, 'Rasipuram', 'Tamil Nadu', 'INDIA'),
(1229, 'Salem', 'Tamil Nadu', 'INDIA'),
(1230, 'Sankarankoil', 'Tamil Nadu', 'INDIA'),
(1231, 'Sankari', 'Tamil Nadu', 'INDIA'),
(1232, 'Sathyamangalam', 'Tamil Nadu', 'INDIA'),
(1233, 'Sattur', 'Tamil Nadu', 'INDIA'),
(1234, 'Shenkottai', 'Tamil Nadu', 'INDIA'),
(1235, 'Sholavandan', 'Tamil Nadu', 'INDIA'),
(1236, 'Sholingur', 'Tamil Nadu', 'INDIA'),
(1237, 'Sirkali', 'Tamil Nadu', 'INDIA'),
(1238, 'Sivaganga', 'Tamil Nadu', 'INDIA'),
(1239, 'Sivagiri', 'Tamil Nadu', 'INDIA'),
(1240, 'Sivakasi', 'Tamil Nadu', 'INDIA'),
(1241, 'Srivilliputhur', 'Tamil Nadu', 'INDIA'),
(1242, 'Surandai', 'Tamil Nadu', 'INDIA'),
(1243, 'Suriyampalayam', 'Tamil Nadu', 'INDIA'),
(1244, 'Tenkasi', 'Tamil Nadu', 'INDIA'),
(1245, 'Thammampatti', 'Tamil Nadu', 'INDIA'),
(1246, 'Thanjavur', 'Tamil Nadu', 'INDIA'),
(1247, 'Tharamangalam', 'Tamil Nadu', 'INDIA'),
(1248, 'Tharangambadi', 'Tamil Nadu', 'INDIA'),
(1249, 'Theni Allinagaram', 'Tamil Nadu', 'INDIA'),
(1250, 'Thirumangalam', 'Tamil Nadu', 'INDIA'),
(1251, 'Thirunindravur', 'Tamil Nadu', 'INDIA'),
(1252, 'Thiruparappu', 'Tamil Nadu', 'INDIA'),
(1253, 'Thirupuvanam', 'Tamil Nadu', 'INDIA'),
(1254, 'Thiruthuraipoondi', 'Tamil Nadu', 'INDIA'),
(1255, 'Thiruvallur', 'Tamil Nadu', 'INDIA'),
(1256, 'Thiruvarur', 'Tamil Nadu', 'INDIA'),
(1257, 'Thoothukudi', 'Tamil Nadu', 'INDIA'),
(1258, 'Thuraiyur', 'Tamil Nadu', 'INDIA'),
(1259, 'Tindivanam', 'Tamil Nadu', 'INDIA'),
(1260, 'Tiruchendur', 'Tamil Nadu', 'INDIA'),
(1261, 'Tiruchengode', 'Tamil Nadu', 'INDIA'),
(1262, 'Tiruchirappalli', 'Tamil Nadu', 'INDIA'),
(1263, 'Tirukalukundram', 'Tamil Nadu', 'INDIA'),
(1264, 'Tirukkoyilur', 'Tamil Nadu', 'INDIA'),
(1265, 'Tirunelveli', 'Tamil Nadu', 'INDIA'),
(1266, 'Tirupathur', 'Tamil Nadu', 'INDIA'),
(1267, 'Tirupathur', 'Tamil Nadu', 'INDIA'),
(1268, 'Tiruppur', 'Tamil Nadu', 'INDIA'),
(1269, 'Tiruttani', 'Tamil Nadu', 'INDIA'),
(1270, 'Tiruvannamalai', 'Tamil Nadu', 'INDIA'),
(1271, 'Tiruvethipuram', 'Tamil Nadu', 'INDIA'),
(1272, 'Tittakudi', 'Tamil Nadu', 'INDIA'),
(1273, 'Udhagamandalam', 'Tamil Nadu', 'INDIA'),
(1274, 'Udumalaipettai', 'Tamil Nadu', 'INDIA'),
(1275, 'Unnamalaikadai', 'Tamil Nadu', 'INDIA'),
(1276, 'Usilampatti', 'Tamil Nadu', 'INDIA'),
(1277, 'Uthamapalayam', 'Tamil Nadu', 'INDIA'),
(1278, 'Uthiramerur', 'Tamil Nadu', 'INDIA'),
(1279, 'Vadakkuvalliyur', 'Tamil Nadu', 'INDIA'),
(1280, 'Vadalur', 'Tamil Nadu', 'INDIA'),
(1281, 'Vadipatti', 'Tamil Nadu', 'INDIA'),
(1282, 'Valparai', 'Tamil Nadu', 'INDIA'),
(1283, 'Vandavasi', 'Tamil Nadu', 'INDIA'),
(1284, 'Vaniyambadi', 'Tamil Nadu', 'INDIA'),
(1285, 'Vedaranyam', 'Tamil Nadu', 'INDIA'),
(1286, 'Vellakoil', 'Tamil Nadu', 'INDIA'),
(1287, 'Vellore', 'Tamil Nadu', 'INDIA');
INSERT INTO `cities` (`CITY_ID`, `CITY_NAME`, `CITY_STATE`, `CITY_COUNTRY`) VALUES
(1288, 'Vikramasingapuram', 'Tamil Nadu', 'INDIA'),
(1289, 'Viluppuram', 'Tamil Nadu', 'INDIA'),
(1290, 'Virudhachalam', 'Tamil Nadu', 'INDIA'),
(1291, 'Virudhunagar', 'Tamil Nadu', 'INDIA'),
(1292, 'Viswanatham', 'Tamil Nadu', 'INDIA'),
(1293, 'Agartala', 'Tripura', 'INDIA'),
(1294, 'Badharghat', 'Tripura', 'INDIA'),
(1295, 'Dharmanagar', 'Tripura', 'INDIA'),
(1296, 'Indranagar', 'Tripura', 'INDIA'),
(1297, 'Jogendranagar', 'Tripura', 'INDIA'),
(1298, 'Kailasahar', 'Tripura', 'INDIA'),
(1299, 'Khowai', 'Tripura', 'INDIA'),
(1300, 'Pratapgarh', 'Tripura', 'INDIA'),
(1301, 'Udaipur', 'Tripura', 'INDIA'),
(1302, 'Achhnera', 'Uttar Pradesh', 'INDIA'),
(1303, 'Adari', 'Uttar Pradesh', 'INDIA'),
(1304, 'Agra', 'Uttar Pradesh', 'INDIA'),
(1305, 'Aligarh', 'Uttar Pradesh', 'INDIA'),
(1306, 'Allahabad', 'Uttar Pradesh', 'INDIA'),
(1307, 'Amroha', 'Uttar Pradesh', 'INDIA'),
(1308, 'Azamgarh', 'Uttar Pradesh', 'INDIA'),
(1309, 'Bahraich', 'Uttar Pradesh', 'INDIA'),
(1310, 'Ballia', 'Uttar Pradesh', 'INDIA'),
(1311, 'Balrampur', 'Uttar Pradesh', 'INDIA'),
(1312, 'Banda', 'Uttar Pradesh', 'INDIA'),
(1313, 'Bareilly', 'Uttar Pradesh', 'INDIA'),
(1314, 'Chandausi', 'Uttar Pradesh', 'INDIA'),
(1315, 'Dadri', 'Uttar Pradesh', 'INDIA'),
(1316, 'Deoria', 'Uttar Pradesh', 'INDIA'),
(1317, 'Etawah', 'Uttar Pradesh', 'INDIA'),
(1318, 'Fatehabad', 'Uttar Pradesh', 'INDIA'),
(1319, 'Fatehpur', 'Uttar Pradesh', 'INDIA'),
(1320, 'Fatehpur', 'Uttar Pradesh', 'INDIA'),
(1321, 'Greater Noida', 'Uttar Pradesh', 'INDIA'),
(1322, 'Hamirpur', 'Uttar Pradesh', 'INDIA'),
(1323, 'Hardoi', 'Uttar Pradesh', 'INDIA'),
(1324, 'Jajmau', 'Uttar Pradesh', 'INDIA'),
(1325, 'Jaunpur', 'Uttar Pradesh', 'INDIA'),
(1326, 'Jhansi', 'Uttar Pradesh', 'INDIA'),
(1327, 'Kalpi', 'Uttar Pradesh', 'INDIA'),
(1328, 'Kanpur', 'Uttar Pradesh', 'INDIA'),
(1329, 'Kota', 'Uttar Pradesh', 'INDIA'),
(1330, 'Laharpur', 'Uttar Pradesh', 'INDIA'),
(1331, 'Lakhimpur', 'Uttar Pradesh', 'INDIA'),
(1332, 'Lal Gopalganj Nindaura', 'Uttar Pradesh', 'INDIA'),
(1333, 'Lalganj', 'Uttar Pradesh', 'INDIA'),
(1334, 'Lalitpur', 'Uttar Pradesh', 'INDIA'),
(1335, 'Lar', 'Uttar Pradesh', 'INDIA'),
(1336, 'Loni', 'Uttar Pradesh', 'INDIA'),
(1337, 'Lucknow', 'Uttar Pradesh', 'INDIA'),
(1338, 'Mathura', 'Uttar Pradesh', 'INDIA'),
(1339, 'Meerut', 'Uttar Pradesh', 'INDIA'),
(1340, 'Modinagar', 'Uttar Pradesh', 'INDIA'),
(1341, 'Muradnagar', 'Uttar Pradesh', 'INDIA'),
(1342, 'Nagina', 'Uttar Pradesh', 'INDIA'),
(1343, 'Najibabad', 'Uttar Pradesh', 'INDIA'),
(1344, 'Nakur', 'Uttar Pradesh', 'INDIA'),
(1345, 'Nanpara', 'Uttar Pradesh', 'INDIA'),
(1346, 'Naraura', 'Uttar Pradesh', 'INDIA'),
(1347, 'Naugawan Sadat', 'Uttar Pradesh', 'INDIA'),
(1348, 'Nautanwa', 'Uttar Pradesh', 'INDIA'),
(1349, 'Nawabganj', 'Uttar Pradesh', 'INDIA'),
(1350, 'Nehtaur', 'Uttar Pradesh', 'INDIA'),
(1351, 'NOIDA', 'Uttar Pradesh', 'INDIA'),
(1352, 'Noorpur', 'Uttar Pradesh', 'INDIA'),
(1353, 'Obra', 'Uttar Pradesh', 'INDIA'),
(1354, 'Orai', 'Uttar Pradesh', 'INDIA'),
(1355, 'Padrauna', 'Uttar Pradesh', 'INDIA'),
(1356, 'Palia Kalan', 'Uttar Pradesh', 'INDIA'),
(1357, 'Parasi', 'Uttar Pradesh', 'INDIA'),
(1358, 'Phulpur', 'Uttar Pradesh', 'INDIA'),
(1359, 'Pihani', 'Uttar Pradesh', 'INDIA'),
(1360, 'Pilibhit', 'Uttar Pradesh', 'INDIA'),
(1361, 'Pilkhuwa', 'Uttar Pradesh', 'INDIA'),
(1362, 'Powayan', 'Uttar Pradesh', 'INDIA'),
(1363, 'Pukhrayan', 'Uttar Pradesh', 'INDIA'),
(1364, 'Puranpur', 'Uttar Pradesh', 'INDIA'),
(1365, 'Purquazi', 'Uttar Pradesh', 'INDIA'),
(1366, 'Purwa', 'Uttar Pradesh', 'INDIA'),
(1367, 'Rae Bareli', 'Uttar Pradesh', 'INDIA'),
(1368, 'Rampur', 'Uttar Pradesh', 'INDIA'),
(1369, 'Rampur Maniharan', 'Uttar Pradesh', 'INDIA'),
(1370, 'Rasra', 'Uttar Pradesh', 'INDIA'),
(1371, 'Rath', 'Uttar Pradesh', 'INDIA'),
(1372, 'Renukoot', 'Uttar Pradesh', 'INDIA'),
(1373, 'Reoti', 'Uttar Pradesh', 'INDIA'),
(1374, 'Robertsganj', 'Uttar Pradesh', 'INDIA'),
(1375, 'Rudauli', 'Uttar Pradesh', 'INDIA'),
(1376, 'Rudrapur', 'Uttar Pradesh', 'INDIA'),
(1377, 'Sadabad', 'Uttar Pradesh', 'INDIA'),
(1378, 'Safipur', 'Uttar Pradesh', 'INDIA'),
(1379, 'Saharanpur', 'Uttar Pradesh', 'INDIA'),
(1380, 'Sahaspur', 'Uttar Pradesh', 'INDIA'),
(1381, 'Sahaswan', 'Uttar Pradesh', 'INDIA'),
(1382, 'Sahawar', 'Uttar Pradesh', 'INDIA'),
(1383, 'Sahjanwa', 'Uttar Pradesh', 'INDIA'),
(1384, 'Saidpur', ' Ghazipur', 'INDIA'),
(1385, 'Sambhal', 'Uttar Pradesh', 'INDIA'),
(1386, 'Samdhan', 'Uttar Pradesh', 'INDIA'),
(1387, 'Samthar', 'Uttar Pradesh', 'INDIA'),
(1388, 'Sandi', 'Uttar Pradesh', 'INDIA'),
(1389, 'Sandila', 'Uttar Pradesh', 'INDIA'),
(1390, 'Sardhana', 'Uttar Pradesh', 'INDIA'),
(1391, 'Seohara', 'Uttar Pradesh', 'INDIA'),
(1392, 'Shahabad', ' Hardoi', 'INDIA'),
(1393, 'Shahabad', ' Rampur', 'INDIA'),
(1394, 'Shahganj', 'Uttar Pradesh', 'INDIA'),
(1395, 'Shahjahanpur', 'Uttar Pradesh', 'INDIA'),
(1396, 'Shamli', 'Uttar Pradesh', 'INDIA'),
(1397, 'Shamsabad', ' Agra', 'INDIA'),
(1398, 'Shamsabad', ' Farrukhabad', 'INDIA'),
(1399, 'Sherkot', 'Uttar Pradesh', 'INDIA'),
(1400, 'Shikarpur', ' Bulandshahr', 'INDIA'),
(1401, 'Shikohabad', 'Uttar Pradesh', 'INDIA'),
(1402, 'Shishgarh', 'Uttar Pradesh', 'INDIA'),
(1403, 'Siana', 'Uttar Pradesh', 'INDIA'),
(1404, 'Sikanderpur', 'Uttar Pradesh', 'INDIA'),
(1405, 'Sikandra Rao', 'Uttar Pradesh', 'INDIA'),
(1406, 'Sikandrabad', 'Uttar Pradesh', 'INDIA'),
(1407, 'Sirsaganj', 'Uttar Pradesh', 'INDIA'),
(1408, 'Sirsi', 'Uttar Pradesh', 'INDIA'),
(1409, 'Sitapur', 'Uttar Pradesh', 'INDIA'),
(1410, 'Soron', 'Uttar Pradesh', 'INDIA'),
(1411, 'Suar', 'Uttar Pradesh', 'INDIA'),
(1412, 'Sultanpur', 'Uttar Pradesh', 'INDIA'),
(1413, 'Sumerpur', 'Uttar Pradesh', 'INDIA'),
(1414, 'Tanda', 'Uttar Pradesh', 'INDIA'),
(1415, 'Tanda', 'Uttar Pradesh', 'INDIA'),
(1416, 'Tetri Bazar', 'Uttar Pradesh', 'INDIA'),
(1417, 'Thakurdwara', 'Uttar Pradesh', 'INDIA'),
(1418, 'Thana Bhawan', 'Uttar Pradesh', 'INDIA'),
(1419, 'Tilhar', 'Uttar Pradesh', 'INDIA'),
(1420, 'Tirwaganj', 'Uttar Pradesh', 'INDIA'),
(1421, 'Tulsipur', 'Uttar Pradesh', 'INDIA'),
(1422, 'Tundla', 'Uttar Pradesh', 'INDIA'),
(1423, 'Unnao', 'Uttar Pradesh', 'INDIA'),
(1424, 'Utraula', 'Uttar Pradesh', 'INDIA'),
(1425, 'Varanasi', 'Uttar Pradesh', 'INDIA'),
(1426, 'Vrindavan', 'Uttar Pradesh', 'INDIA'),
(1427, 'Warhapur', 'Uttar Pradesh', 'INDIA'),
(1428, 'Zaidpur', 'Uttar Pradesh', 'INDIA'),
(1429, 'Zamania', 'Uttar Pradesh', 'INDIA'),
(1430, 'Almora', 'Uttarakhand', 'INDIA'),
(1431, 'Bazpur', 'Uttarakhand', 'INDIA'),
(1432, 'Chamba', 'Uttarakhand', 'INDIA'),
(1433, 'Dehradun', 'Uttarakhand', 'INDIA'),
(1434, 'Haldwani', 'Uttarakhand', 'INDIA'),
(1435, 'Haridwar', 'Uttarakhand', 'INDIA'),
(1436, 'Jaspur', 'Uttarakhand', 'INDIA'),
(1437, 'Kashipur', 'Uttarakhand', 'INDIA'),
(1438, 'kichha', 'Uttarakhand', 'INDIA'),
(1439, 'Kotdwara', 'Uttarakhand', 'INDIA'),
(1440, 'Manglaur', 'Uttarakhand', 'INDIA'),
(1441, 'Mussoorie', 'Uttarakhand', 'INDIA'),
(1442, 'Nagla', 'Uttarakhand', 'INDIA'),
(1443, 'Nainital', 'Uttarakhand', 'INDIA'),
(1444, 'Pauri', 'Uttarakhand', 'INDIA'),
(1445, 'Pithoragarh', 'Uttarakhand', 'INDIA'),
(1446, 'Ramnagar', 'Uttarakhand', 'INDIA'),
(1447, 'Rishikesh', 'Uttarakhand', 'INDIA'),
(1448, 'Roorkee', 'Uttarakhand', 'INDIA'),
(1449, 'Rudrapur', 'Uttarakhand', 'INDIA'),
(1450, 'Sitarganj', 'Uttarakhand', 'INDIA'),
(1451, 'Tehri', 'Uttarakhand', 'INDIA'),
(1452, 'Muzaffarnagar', 'Uttar Pradesh', 'INDIA'),
(1453, 'Adra', ' Purulia', 'INDIA'),
(1454, 'Alipurduar', 'West Bengal', 'INDIA'),
(1455, 'Arambagh', 'West Bengal', 'INDIA'),
(1456, 'Asansol', 'West Bengal', 'INDIA'),
(1457, 'Baharampur', 'West Bengal', 'INDIA'),
(1458, 'Bally', 'West Bengal', 'INDIA'),
(1459, 'Balurghat', 'West Bengal', 'INDIA'),
(1460, 'Bankura', 'West Bengal', 'INDIA'),
(1461, 'Barakar', 'West Bengal', 'INDIA'),
(1462, 'Barasat', 'West Bengal', 'INDIA'),
(1463, 'Bardhaman', 'West Bengal', 'INDIA'),
(1464, 'Bidhan Nagar', 'West Bengal', 'INDIA'),
(1465, 'Chinsura', 'West Bengal', 'INDIA'),
(1466, 'Contai', 'West Bengal', 'INDIA'),
(1467, 'Cooch Behar', 'West Bengal', 'INDIA'),
(1468, 'Darjeeling', 'West Bengal', 'INDIA'),
(1469, 'Durgapur', 'West Bengal', 'INDIA'),
(1470, 'Haldia', 'West Bengal', 'INDIA'),
(1471, 'Howrah', 'West Bengal', 'INDIA'),
(1472, 'Islampur', 'West Bengal', 'INDIA'),
(1473, 'Jhargram', 'West Bengal', 'INDIA'),
(1474, 'Kharagpur', 'West Bengal', 'INDIA'),
(1475, 'Kolkata', 'West Bengal', 'INDIA'),
(1476, 'Mainaguri', 'West Bengal', 'INDIA'),
(1477, 'Mal', 'West Bengal', 'INDIA'),
(1478, 'Mathabhanga', 'West Bengal', 'INDIA'),
(1479, 'Medinipur', 'West Bengal', 'INDIA'),
(1480, 'Memari', 'West Bengal', 'INDIA'),
(1481, 'Monoharpur', 'West Bengal', 'INDIA'),
(1482, 'Murshidabad', 'West Bengal', 'INDIA'),
(1483, 'Nabadwip', 'West Bengal', 'INDIA'),
(1484, 'Naihati', 'West Bengal', 'INDIA'),
(1485, 'Panchla', 'West Bengal', 'INDIA'),
(1486, 'Pandua', 'West Bengal', 'INDIA'),
(1487, 'Paschim Punropara', 'West Bengal', 'INDIA'),
(1488, 'Purulia', 'West Bengal', 'INDIA'),
(1489, 'Raghunathpur', 'West Bengal', 'INDIA'),
(1490, 'Raiganj', 'West Bengal', 'INDIA'),
(1491, 'Rampurhat', 'West Bengal', 'INDIA'),
(1492, 'Ranaghat', 'West Bengal', 'INDIA'),
(1493, 'Sainthia', 'West Bengal', 'INDIA'),
(1494, 'Santipur', 'West Bengal', 'INDIA'),
(1495, 'Siliguri', 'West Bengal', 'INDIA'),
(1496, 'Sonamukhi', 'West Bengal', 'INDIA'),
(1497, 'Srirampore', 'West Bengal', 'INDIA'),
(1498, 'Suri', 'West Bengal', 'INDIA'),
(1499, 'Taki', 'West Bengal', 'INDIA'),
(1500, 'Tamluk', 'West Bengal', 'INDIA'),
(1501, 'Tarakeswar', 'West Bengal', 'INDIA'),
(1502, 'Chikmagalur', 'Karnataka', 'INDIA'),
(1503, 'Davanagere', 'Karnataka', 'INDIA'),
(1504, 'Dharwad', 'Karnataka', 'INDIA'),
(1505, 'Gadag', 'Karnataka', 'INDIA'),
(1506, 'Chennai', 'Tamil Nadu', 'INDIA'),
(1507, 'Coimbatore', 'Tamil Nadu', 'INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `COMPANY_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(100) NOT NULL,
  `COMPANY_ADDRESS` varchar(500) NOT NULL,
  `COMPANY_CITY` int(11) NOT NULL,
  `COMPANY_STATE` int(11) NOT NULL,
  `COMPANY_COUNTRY` int(11) NOT NULL,
  `COMPANY_EMAIL` varchar(100) NOT NULL,
  `COMPANY_CONTACT` varchar(12) NOT NULL,
  `COMPANY_PHONE` varchar(12) NOT NULL,
  `COMPANY_TIN` varchar(12) NOT NULL,
  `COMPANY_GST` varchar(100) NOT NULL,
  `COMPANY_REG_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COMPANY_LOGO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_ADDRESS`, `COMPANY_CITY`, `COMPANY_STATE`, `COMPANY_COUNTRY`, `COMPANY_EMAIL`, `COMPANY_CONTACT`, `COMPANY_PHONE`, `COMPANY_TIN`, `COMPANY_GST`, `COMPANY_REG_DATE`, `COMPANY_LOGO`) VALUES
(1, 'Prithvi Agro Producer Pvt Ltd', 'Kidwai Nagar', 1328, 1328, 1328, 'PRITVIAGRO@GMAIL.COM', '9999999999', '9999999999', '999999999999', '999999999999', '2018-08-31 18:30:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(11) UNSIGNED NOT NULL,
  `COMP_NO` varchar(20) NOT NULL,
  `ISSUE` varchar(15) NOT NULL,
  `PROBLEM` varchar(1000) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `PRODUCT_ID` int(11) UNSIGNED NOT NULL,
  `REG_DATE` datetime NOT NULL,
  `REGISTERED_BY` varchar(20) NOT NULL DEFAULT 'OPERATOR',
  `RESOLVE_DETAILS` varchar(1000) NOT NULL,
  `VICTIM_ID` int(11) UNSIGNED NOT NULL,
  `OP_ID` int(10) UNSIGNED NOT NULL,
  `RESOLVE_DATE` datetime DEFAULT NULL,
  `PRIORITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `controllers`
--

CREATE TABLE `controllers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `URL` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `controller_permisson`
--

CREATE TABLE `controller_permisson` (
  `ID` int(11) NOT NULL,
  `URL_PERMISSION` varchar(900) NOT NULL,
  `TYPE` tinyint(4) NOT NULL,
  `STAFF_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `CUSTOMER_REG_NO` int(11) NOT NULL,
  `CUSTOMER_REG_DATE` date NOT NULL,
  `CUSTOMER_TITLE` varchar(11) NOT NULL,
  `CUSTOMER_SEX` varchar(5) NOT NULL,
  `CUSTOMER_FIRST_NAME` varchar(11) NOT NULL,
  `CUSTOMER_MIDDLE_NAME` varchar(15) NOT NULL,
  `CUSTOMER_LAST_NAME` varchar(15) NOT NULL,
  `CUSTOMER_NATIONALITY` varchar(20) NOT NULL,
  `CUSTOMER_ACCOUNT_TYPE` varchar(20) NOT NULL,
  `CUSTOMER_PROFESSION_ID` int(10) NOT NULL,
  `CUSTOMER_CREDIT_LIMIT` int(11) NOT NULL,
  `CUSTOMER_ADDRESS` varchar(256) NOT NULL,
  `CUSTOMER_PAN` varchar(20) NOT NULL,
  `CUSTOMER_ADHAAR` varchar(20) NOT NULL,
  `CUSTOMER_GSTNO` varchar(20) NOT NULL,
  `CUSTOMER_CONTACT` varchar(20) NOT NULL,
  `CUSTOMER_ALT_CONTACT` varchar(20) NOT NULL,
  `CUSTOMER_PHONE` varchar(20) NOT NULL,
  `CUSTOMER_IMAGE` varchar(200) NOT NULL,
  `PLAN_EMI_ID` int(11) NOT NULL,
  `HRM_ID` int(11) NOT NULL,
  `BRANCH_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrm`
--

CREATE TABLE `hrm` (
  `HRM_ID` int(11) NOT NULL,
  `HRM_TYPE_ID` int(11) NOT NULL,
  `RANK_ID` int(2) NOT NULL,
  `HRM_TITLE` varchar(4) NOT NULL DEFAULT 'Mr',
  `HRM_REG_NO` varchar(20) NOT NULL,
  `HRM_REG_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `HRM_ACCOUNT_TYPE` int(10) NOT NULL COMMENT 'LOAN FD RD',
  `HRM_FIRST_NAME` varchar(100) NOT NULL,
  `HRM_MIDDLE_NAME` varchar(100) NOT NULL,
  `HRM_LAST_NAME` varchar(100) NOT NULL,
  `HRM_PROFESSION_ID` int(11) NOT NULL,
  `HRM_CREDIT_LIMIT` int(11) NOT NULL,
  `HRM_ADDRESS` varchar(100) NOT NULL,
  `HRM_CITY` int(11) NOT NULL,
  `HRM_STATE` int(11) NOT NULL,
  `HRM_COUNTRY` int(11) NOT NULL,
  `HRM_SEX` varchar(1) NOT NULL,
  `HRM_NATIONALITY` varchar(20) NOT NULL,
  `HRM_CONTACT` varchar(10) NOT NULL,
  `HRM_ALT_CONTACT` varchar(10) NOT NULL,
  `HRM_EMAIL` varchar(100) NOT NULL,
  `HRM_PAN` varchar(10) NOT NULL,
  `HRM_ADHAAR` varchar(20) NOT NULL,
  `HRM_GST` varchar(20) NOT NULL,
  `PLAN_EMI_ID` int(11) NOT NULL,
  `HRM_USERNAME` varchar(100) NOT NULL,
  `HRM_PASSWORD` varchar(100) NOT NULL,
  `HRM_STATUS` int(11) NOT NULL,
  `BRANCH_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrm`
--

INSERT INTO `hrm` (`HRM_ID`, `HRM_TYPE_ID`, `RANK_ID`, `HRM_TITLE`, `HRM_REG_NO`, `HRM_REG_DATE`, `HRM_ACCOUNT_TYPE`, `HRM_FIRST_NAME`, `HRM_MIDDLE_NAME`, `HRM_LAST_NAME`, `HRM_PROFESSION_ID`, `HRM_CREDIT_LIMIT`, `HRM_ADDRESS`, `HRM_CITY`, `HRM_STATE`, `HRM_COUNTRY`, `HRM_SEX`, `HRM_NATIONALITY`, `HRM_CONTACT`, `HRM_ALT_CONTACT`, `HRM_EMAIL`, `HRM_PAN`, `HRM_ADHAAR`, `HRM_GST`, `PLAN_EMI_ID`, `HRM_USERNAME`, `HRM_PASSWORD`, `HRM_STATUS`, `BRANCH_ID`) VALUES
(1, 2, 1, 'MR.', '1', '2018-09-27 13:33:37', 0, 'SUPER ADVISOR 1', '', 'gupta', 0, 0, '', 1328, 1328, 1328, '', '', '', '', '', '', '', '', 0, '', '', 0, 2),
(2, 2, 2, 'MR.', '2', '2018-09-27 13:32:52', 0, 'SUPER ADVISOR 2', '', '', 0, 0, '', 1328, 1328, 1328, '', '', '', '', '', '', '', '', 0, '', '', 0, 2),
(3, 2, 3, 'MR.', '3', '2018-09-27 13:32:48', 0, 'SUPER ADVISOR 3', '', '', 0, 0, '', 1328, 1328, 1328, '', '', '', '', '', '', '', '', 0, '', '', 0, 2),
(4, 2, 4, 'MR.', '4', '2018-09-27 13:32:43', 0, 'SUPER ADVISOR 4', '', '', 0, 0, '', 1328, 1328, 1328, '', '', '', '', '', '', '', '', 0, '', '', 0, 2),
(5, 1, 5, 'MR.', 'NL05000006', '2018-09-27 13:32:38', 0, 'NAND', '', 'LAL', 0, 0, '89/32 shukla ganj', 1328, 1328, 1328, '', '', '8090324567', '', '', '', '', '', 0, '', '', 0, 1),
(6, 4, 0, 'MR.', '6', '2018-09-27 13:32:33', 1, 'naresh', '', 'gautam', 1, 40000, '46/12 govind nagar', 6, 6, 6, 'm', 'indian', '7865439987', '7548', 'priyanshurawat786@gmail.com', '4456789', '3465476', '87436', 14, 'abhi@123', 'oops', 1, 1),
(7, 1, 5, 'MR.', 'NS05000007', '2018-09-27 13:32:28', 0, 'naresh', '', 'shukla', 1, 0, '46/12 govind nagar', 494, 494, 494, 'm', 'indian', '6567456', '6567456', 'shukla@432', '6567456', '6567456', '6567456', 0, 'abhi@123', '123', 1, 1),
(8, 4, 0, 'MR.', '8', '2018-09-27 13:32:23', 1, 'abhinav', '', 'ahuja', 1, 0, '456/16 gomti nagar', 5, 5, 5, 'm', 'indian', '64746747', '47634677', 'gyegg@gmail.com', '34567', '5656744', '5785484', 19, 'madhu412', '09865', 1, 1),
(9, 4, 0, 'MR.', '9', '2018-09-27 13:32:19', 1, 'ashwani', '', 'tiwari', 1, 6000, '46/12 govind nagar', 11, 11, 11, 'm', 'indian', '454768', '586748', 'priyanshurawat786@gmail.com', '123457', '2545678', '5768', 41, 'billu@12', '1234', 1, 1),
(12, 1, 5, 'MR.', 'RS05000008', '2018-09-27 13:32:15', 0, 'Raghav', '', 'Singh', 1, 0, '44/12 naubasta kanpur', 418, 418, 418, 'm', 'indian', '745875691', '', '', '', '48394859', '', 0, '89674867', 'hoolki', 1, 1),
(13, 1, 5, 'MR.', 'RK05000009', '2018-09-27 13:32:11', 0, 'rajendra', '', 'kumar', 1, 0, '46/12 govind nagar', 418, 418, 418, 'm', 'indian', '678868942', '', 'abhi@yahoo.com', '', '629569', '', 0, 'raju412', 'locoma', 1, 1),
(18, 4, 0, 'MR.', 'EMPGHT00000010', '2018-09-27 13:32:06', 1, 'rajendra', '', 'shukla', 1, 568, '46/12 govind nagar', 8, 8, 8, 'm', 'indo', '585', '', 'sh@gmail.com', '', '6748793', '', 6, 'billu@12', '123', 1, 1),
(19, 1, 8, 'MR.', 'NS08000010', '2018-09-27 13:32:02', 0, 'Narendra', '', 'shukla', 1, 0, '46/12 govind nagar', 626, 626, 626, 'm', 'indian', '8906908732', '', 'narendra12@gmail.com', '4456754328', '978465542893', '', 0, 'abhi@123', 'abhi432', 1, 1),
(20, 4, 0, 'MR.', 'EMPGHT00000011', '2018-09-27 13:31:58', 1, 'sunil', '', 'katiyar', 1, 4000, '46/12 govind nagar', 7, 7, 7, 'm', 'indian', '9087654329', '', 'abhi@yahoo.com', '', '134567', '', 18, 'abhi@123', '12234', 1, 1),
(21, 1, 5, 'MR.', 'AA05000011', '2018-09-27 13:31:53', 0, 'AKSHIT', '', 'AHUJA', 2, 0, '46/12 govind nagar', 4, 4, 4, 'm', '', '8525598675', '', '', '', '', '', 0, '', '', 1, 1),
(22, 4, 0, 'mrs.', 'EMPGHT00000012', '2018-10-01 18:30:00', 1, 'SUMAN', '', 'CHAURASIYA', 2, 40000, 'varun vihar barra kanpur', 4, 4, 4, 'f', 'indian', '', '', 'suman199721@gmail.com', '', '345709872128', '', 14, '', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hrm_relation`
--

CREATE TABLE `hrm_relation` (
  `HRM_RELATION_ID` int(1) NOT NULL,
  `NEW_HRM_ID` int(2) NOT NULL,
  `HRM_PARENT_ID` int(2) NOT NULL,
  `HRM_ADDED_BY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrm_relation`
--

INSERT INTO `hrm_relation` (`HRM_RELATION_ID`, `NEW_HRM_ID`, `HRM_PARENT_ID`, `HRM_ADDED_BY`) VALUES
(18, 1, 1, 1),
(19, 2, 1, 1),
(20, 3, 2, 2),
(21, 4, 3, 3),
(22, 5, 4, 4),
(24, 7, 4, 4),
(25, 8, 5, 7),
(29, 12, 4, 4),
(30, 13, 12, 12),
(35, 18, 12, 12),
(36, 19, 13, 13),
(37, 20, 19, 19),
(38, 21, 21, 21),
(39, 22, 12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `hrm_type`
--

CREATE TABLE `hrm_type` (
  `HRM_TYPE_ID` int(11) NOT NULL,
  `HRM_TYPE_POST` varchar(100) NOT NULL,
  `HRM_SALARY` int(100) NOT NULL,
  `COMPANY_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrm_type`
--

INSERT INTO `hrm_type` (`HRM_TYPE_ID`, `HRM_TYPE_POST`, `HRM_SALARY`, `COMPANY_ID`) VALUES
(0, 'ADMIN', 0, 1),
(1, 'ADVISOR', 5000, 1),
(2, 'SUPER ADVISOR', 1000, 1),
(4, 'CUSTOMER', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `ID` int(11) UNSIGNED NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue_sub`
--

CREATE TABLE `issue_sub` (
  `ID` int(11) UNSIGNED NOT NULL,
  `ISSUE_ID` int(11) UNSIGNED NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `AMOUNT` float(10,2) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE `menu_group` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `SECTION` int(11) NOT NULL,
  `VISIBLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `ID` int(10) UNSIGNED NOT NULL,
  `GROUP_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `VISIBLE` int(11) NOT NULL,
  `LINK` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `NOMINEE_ID` int(11) NOT NULL,
  `HRM_ID` int(11) NOT NULL,
  `NOMINEE_TITLE` varchar(10) NOT NULL,
  `NOMINEE_FIRST_NAME` varchar(100) NOT NULL,
  `NOMINEE_MIDDLE_NAME` varchar(20) NOT NULL,
  `NOMINEE_LAST_NAME` varchar(20) NOT NULL,
  `NOMINEE_AADHAR` bigint(15) NOT NULL,
  `PROFESSION_ID` int(3) NOT NULL,
  `NOMINEE_ADDRESS` varchar(256) NOT NULL,
  `NOMINEE_RELATION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`NOMINEE_ID`, `HRM_ID`, `NOMINEE_TITLE`, `NOMINEE_FIRST_NAME`, `NOMINEE_MIDDLE_NAME`, `NOMINEE_LAST_NAME`, `NOMINEE_AADHAR`, `PROFESSION_ID`, `NOMINEE_ADDRESS`, `NOMINEE_RELATION`) VALUES
(1, 3, 'mr.', 'jyoti', '', '', 456789976, 1, '89674867', 'mother'),
(2, 4, 'mr.', 'kusum', '', 'gupta', 55669, 1, '426/12 khandepur', 'njdhou[p'),
(3, 6, 'mr.', 'narendra', '', 'narayan', 0, 1, 'fwyyguwhd', 'mother'),
(4, 7, 'mr.', 'rajesh', '', 'kanaujiya', 4567890, 1, 'vaeughpifeuweg', 'bksfhiovr'),
(6, 6, 'mr.', 'kamal', '', 'lodhi', 89765423, 1, '426/12 khandepur', 'mother'),
(7, 8, 'mr.', 'kusum', 'shukla', '', 675432234, 1, '426/12 khandepur', 'mother'),
(8, 9, 'mr.', 'kusum', '', 'kanaujiya', 11261165655, 1, '426/12 khandepur', 'father'),
(9, 14, 'mr.', 'kusum', '', 'kanaujiya', 11261165655, 2, '426/12 khandepur', ''),
(10, 15, 'mr.', 'kusum', '', 'kanaujiya', 11261165655, 1, '426/12 khandepur', 'father'),
(11, 16, 'mr.', '', '', '', 39948, 1, '426/12 khandepur', ''),
(12, 17, 'mr.', 'kusum', '', 'kanaujiya', 12349876, 1, '426/12 khandepur', ''),
(13, 18, 'mr.', 'kusum', '', 'kanaujiya', 77898676, 1, '426/12 khandepur', 'mother'),
(14, 20, 'mr.', 'kusum', '', 'kanaujiya', 124467, 1, '426/12 khandepur', 'sister'),
(15, 22, 'mr.', 'kamlesh', '', 'kumar', 213409672390, 1, '90/32 aroli barabanki', 'sister');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `ID` tinyint(3) UNSIGNED NOT NULL,
  `NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `ID` int(10) UNSIGNED NOT NULL,
  `OP_ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `MENU_ITEM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `PLAN_ID` int(10) NOT NULL,
  `PLAN_NO` bigint(11) NOT NULL,
  `PLAN_NAME` varchar(100) NOT NULL,
  `PLAN_DESCRIPTION` varchar(100) NOT NULL,
  `PLAN_INTEREST_ID` int(11) NOT NULL,
  `BONUS_TYPE_ID` int(11) NOT NULL,
  `PLAN_TYPE_ID` int(10) NOT NULL,
  `COMPANY_ID` int(10) NOT NULL,
  `PLAN_STATUS` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`PLAN_ID`, `PLAN_NO`, `PLAN_NAME`, `PLAN_DESCRIPTION`, `PLAN_INTEREST_ID`, `BONUS_TYPE_ID`, `PLAN_TYPE_ID`, `COMPANY_ID`, `PLAN_STATUS`) VALUES
(1, 0, 'MCS-1 Years', 'MCS-1 Years', 1, 0, 1, 1, 1),
(2, 0, 'MCS-2 Years', 'MCS-2 Years', 2, 2, 1, 1, 1),
(3, 0, 'MCS-3 Years', 'MCS-3 Years', 3, 3, 1, 1, 1),
(4, 0, 'MCS-5 Years', 'MCS-5 Years', 4, 4, 1, 1, 1),
(5, 0, 'OTCS-NC-1 Years', 'OTCS-NC-1 Years', 1, 0, 2, 1, 1),
(6, 0, 'OTCS-NC-2 Years', 'OTCS-NC-2 Years', 2, 0, 2, 1, 1),
(7, 0, 'OTCS-NC-3 Years', 'OTCS-NC-3 Years', 3, 0, 2, 1, 1),
(8, 0, 'OTCS-NC-4 Years', 'OTCS-NC-4 Years', 5, 0, 2, 1, 0),
(9, 0, 'OTCS-NC-5 Years', 'OTCS-NC-5 Years', 6, 0, 2, 1, 1),
(10, 0, 'OTCS-NC-6 Years', 'OTCS-NC-6 Years', 7, 0, 2, 1, 0),
(11, 0, 'OTCS-SC-1 Years', 'OTCS-SC-1 Years', 2, 11, 2, 1, 1),
(12, 0, 'OTCS-SC-2 Years', 'OTCS-SC-2 Years', 2, 12, 2, 1, 1),
(13, 0, 'OTCS-SC-3 Years', 'OTCS-SC-3 Years', 3, 13, 2, 1, 1),
(14, 0, 'OTCS-SC-4 Years', 'OTCS-SC-4 Years', 5, 14, 2, 1, 0),
(15, 0, 'OTCS-SC-5 Years', 'OTCS-SC-5 Years', 6, 15, 2, 1, 1),
(16, 0, 'OTCS-SC-6 Years', 'OTCS-SC-6 Years', 7, 16, 2, 1, 0),
(17, 0, 'MIS-1 Years', 'MIS-1 Years', 8, 17, 3, 1, 0),
(18, 0, 'MIS-2 Years', 'MIS-2 Years', 9, 18, 3, 1, 1),
(19, 0, 'MIS-3 Years', 'MIS-3 Years', 10, 19, 3, 1, 1),
(20, 0, 'MIS-4 Years', 'MIS-4 Years', 11, 20, 3, 1, 0),
(21, 0, 'MIS-5 Years', 'MIS-5 Years', 3, 21, 3, 1, 1),
(22, 0, 'MIS-6 Years', 'MIS-6 Years', 5, 22, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan_activation`
--

CREATE TABLE `plan_activation` (
  `PLAN_ACTIVATION_ID` bigint(20) NOT NULL,
  `PLAN_EMI_ID` int(10) NOT NULL,
  `PLAN_ACTIVATION_DATE` datetime NOT NULL,
  `PLAN_EXPIRY_DATE` datetime NOT NULL,
  `PLAN_ACTIVATION_STATUS` int(1) NOT NULL DEFAULT '1' COMMENT '0- Matured  1-Activated   2-discontinued',
  `CUSTOMER_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_activation`
--

INSERT INTO `plan_activation` (`PLAN_ACTIVATION_ID`, `PLAN_EMI_ID`, `PLAN_ACTIVATION_DATE`, `PLAN_EXPIRY_DATE`, `PLAN_ACTIVATION_STATUS`, `CUSTOMER_ID`) VALUES
(1619870000004, 6, '2018-09-01 00:00:00', '2019-09-01 00:00:00', 1, 18),
(1619870000005, 18, '2018-09-19 00:00:00', '2020-09-19 00:00:00', 1, 20),
(1619870000006, 14, '2018-10-02 00:00:00', '2020-10-02 00:00:00', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `plan_emi`
--

CREATE TABLE `plan_emi` (
  `PLAN_EMI_ID` int(11) NOT NULL,
  `PLAN_ID` int(11) NOT NULL,
  `PLAN_EMI_AMOUNT` int(11) NOT NULL,
  `PLAN_EMI_PERIOD` int(2) NOT NULL COMMENT 'in months',
  `PLAN_BONUS_ID` int(11) NOT NULL DEFAULT '0' COMMENT 'if applicable then id of the plan_bonus',
  `PLAN_EMI_EFFECTIVE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_emi`
--

INSERT INTO `plan_emi` (`PLAN_EMI_ID`, `PLAN_ID`, `PLAN_EMI_AMOUNT`, `PLAN_EMI_PERIOD`, `PLAN_BONUS_ID`, `PLAN_EMI_EFFECTIVE_DATE`) VALUES
(0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(1, 1, 500, 12, 1, '0000-00-00 00:00:00'),
(2, 1, 600, 12, 1, '0000-00-00 00:00:00'),
(3, 1, 700, 12, 1, '0000-00-00 00:00:00'),
(4, 1, 800, 12, 1, '0000-00-00 00:00:00'),
(5, 1, 900, 12, 1, '0000-00-00 00:00:00'),
(6, 1, 1000, 12, 1, '0000-00-00 00:00:00'),
(7, 1, 2000, 12, 1, '0000-00-00 00:00:00'),
(8, 1, 3000, 12, 1, '0000-00-00 00:00:00'),
(9, 1, 4000, 12, 1, '0000-00-00 00:00:00'),
(10, 1, 5000, 12, 1, '0000-00-00 00:00:00'),
(11, 2, 500, 24, 1, '0000-00-00 00:00:00'),
(12, 2, 600, 24, 1, '0000-00-00 00:00:00'),
(13, 2, 700, 24, 1, '0000-00-00 00:00:00'),
(14, 2, 800, 24, 1, '0000-00-00 00:00:00'),
(15, 2, 900, 24, 1, '0000-00-00 00:00:00'),
(16, 2, 1000, 24, 1, '0000-00-00 00:00:00'),
(17, 2, 2000, 24, 1, '0000-00-00 00:00:00'),
(18, 2, 3000, 24, 1, '0000-00-00 00:00:00'),
(19, 2, 4000, 24, 1, '0000-00-00 00:00:00'),
(20, 2, 5000, 24, 1, '0000-00-00 00:00:00'),
(21, 3, 500, 36, 1, '0000-00-00 00:00:00'),
(22, 3, 600, 36, 1, '0000-00-00 00:00:00'),
(23, 3, 700, 36, 1, '0000-00-00 00:00:00'),
(24, 3, 800, 36, 1, '0000-00-00 00:00:00'),
(25, 3, 900, 36, 1, '0000-00-00 00:00:00'),
(26, 3, 1000, 36, 1, '0000-00-00 00:00:00'),
(27, 3, 2000, 36, 1, '0000-00-00 00:00:00'),
(28, 3, 3000, 36, 1, '0000-00-00 00:00:00'),
(29, 3, 4000, 36, 1, '0000-00-00 00:00:00'),
(30, 3, 5000, 36, 1, '0000-00-00 00:00:00'),
(31, 4, 500, 60, 1, '0000-00-00 00:00:00'),
(32, 4, 600, 60, 1, '0000-00-00 00:00:00'),
(33, 4, 700, 60, 1, '0000-00-00 00:00:00'),
(34, 4, 800, 60, 1, '0000-00-00 00:00:00'),
(35, 4, 900, 60, 1, '0000-00-00 00:00:00'),
(36, 4, 1000, 60, 1, '0000-00-00 00:00:00'),
(37, 4, 2000, 60, 1, '0000-00-00 00:00:00'),
(38, 4, 3000, 60, 1, '0000-00-00 00:00:00'),
(39, 4, 4000, 60, 1, '0000-00-00 00:00:00'),
(40, 4, 5000, 60, 1, '0000-00-00 00:00:00'),
(41, 5, 5000, 12, 1, '0000-00-00 00:00:00'),
(42, 5, 10000, 12, 1, '0000-00-00 00:00:00'),
(43, 5, 20000, 12, 1, '0000-00-00 00:00:00'),
(44, 5, 30000, 12, 1, '0000-00-00 00:00:00'),
(45, 5, 40000, 12, 1, '0000-00-00 00:00:00'),
(46, 5, 50000, 12, 1, '0000-00-00 00:00:00'),
(47, 5, 60000, 12, 1, '0000-00-00 00:00:00'),
(48, 5, 70000, 12, 1, '0000-00-00 00:00:00'),
(49, 5, 80000, 12, 1, '0000-00-00 00:00:00'),
(50, 5, 90000, 12, 1, '0000-00-00 00:00:00'),
(51, 5, 100000, 12, 1, '0000-00-00 00:00:00'),
(52, 6, 5000, 24, 1, '0000-00-00 00:00:00'),
(53, 6, 10000, 24, 1, '0000-00-00 00:00:00'),
(54, 6, 20000, 24, 1, '0000-00-00 00:00:00'),
(55, 6, 30000, 24, 1, '0000-00-00 00:00:00'),
(56, 6, 40000, 24, 1, '0000-00-00 00:00:00'),
(57, 6, 50000, 24, 1, '0000-00-00 00:00:00'),
(58, 6, 60000, 24, 1, '0000-00-00 00:00:00'),
(59, 6, 70000, 24, 1, '0000-00-00 00:00:00'),
(60, 6, 80000, 24, 1, '0000-00-00 00:00:00'),
(61, 6, 90000, 24, 1, '0000-00-00 00:00:00'),
(62, 6, 100000, 24, 1, '0000-00-00 00:00:00'),
(63, 7, 5000, 36, 1, '0000-00-00 00:00:00'),
(64, 7, 10000, 36, 1, '0000-00-00 00:00:00'),
(65, 7, 20000, 36, 1, '0000-00-00 00:00:00'),
(66, 7, 30000, 36, 1, '0000-00-00 00:00:00'),
(67, 7, 40000, 36, 1, '0000-00-00 00:00:00'),
(68, 7, 50000, 36, 1, '0000-00-00 00:00:00'),
(69, 7, 60000, 36, 1, '0000-00-00 00:00:00'),
(70, 7, 70000, 36, 1, '0000-00-00 00:00:00'),
(71, 7, 80000, 36, 1, '0000-00-00 00:00:00'),
(72, 7, 90000, 36, 1, '0000-00-00 00:00:00'),
(73, 7, 100000, 36, 1, '0000-00-00 00:00:00'),
(74, 8, 5000, 48, 1, '0000-00-00 00:00:00'),
(75, 8, 10000, 48, 1, '0000-00-00 00:00:00'),
(76, 8, 20000, 48, 1, '0000-00-00 00:00:00'),
(77, 8, 30000, 48, 1, '0000-00-00 00:00:00'),
(78, 8, 40000, 48, 1, '0000-00-00 00:00:00'),
(79, 8, 50000, 48, 1, '0000-00-00 00:00:00'),
(80, 8, 60000, 48, 1, '0000-00-00 00:00:00'),
(81, 8, 70000, 48, 1, '0000-00-00 00:00:00'),
(82, 8, 80000, 48, 1, '0000-00-00 00:00:00'),
(83, 8, 90000, 48, 1, '0000-00-00 00:00:00'),
(84, 8, 100000, 48, 1, '0000-00-00 00:00:00'),
(85, 9, 5000, 60, 1, '0000-00-00 00:00:00'),
(86, 9, 10000, 60, 1, '0000-00-00 00:00:00'),
(87, 9, 20000, 60, 1, '0000-00-00 00:00:00'),
(88, 9, 30000, 60, 1, '0000-00-00 00:00:00'),
(89, 9, 40000, 60, 1, '0000-00-00 00:00:00'),
(90, 9, 50000, 60, 1, '0000-00-00 00:00:00'),
(91, 9, 60000, 60, 1, '0000-00-00 00:00:00'),
(92, 9, 70000, 60, 1, '0000-00-00 00:00:00'),
(93, 9, 80000, 60, 1, '0000-00-00 00:00:00'),
(94, 9, 90000, 60, 1, '0000-00-00 00:00:00'),
(95, 9, 100000, 60, 1, '0000-00-00 00:00:00'),
(96, 10, 5000, 72, 1, '0000-00-00 00:00:00'),
(97, 10, 10000, 72, 1, '0000-00-00 00:00:00'),
(98, 10, 20000, 72, 1, '0000-00-00 00:00:00'),
(99, 10, 30000, 72, 1, '0000-00-00 00:00:00'),
(100, 10, 40000, 72, 1, '0000-00-00 00:00:00'),
(101, 10, 50000, 72, 1, '0000-00-00 00:00:00'),
(102, 10, 60000, 72, 1, '0000-00-00 00:00:00'),
(103, 10, 70000, 72, 1, '0000-00-00 00:00:00'),
(104, 10, 80000, 72, 1, '0000-00-00 00:00:00'),
(105, 10, 90000, 72, 1, '0000-00-00 00:00:00'),
(106, 10, 100000, 72, 1, '0000-00-00 00:00:00'),
(107, 11, 10000, 12, 1, '0000-00-00 00:00:00'),
(108, 11, 20000, 12, 1, '0000-00-00 00:00:00'),
(109, 11, 30000, 12, 1, '0000-00-00 00:00:00'),
(110, 11, 40000, 12, 1, '0000-00-00 00:00:00'),
(111, 11, 50000, 12, 1, '0000-00-00 00:00:00'),
(112, 11, 60000, 12, 1, '0000-00-00 00:00:00'),
(113, 11, 70000, 12, 1, '0000-00-00 00:00:00'),
(114, 11, 80000, 12, 1, '0000-00-00 00:00:00'),
(115, 11, 90000, 12, 1, '0000-00-00 00:00:00'),
(116, 11, 100000, 12, 1, '0000-00-00 00:00:00'),
(117, 11, 150000, 12, 1, '0000-00-00 00:00:00'),
(118, 11, 200000, 12, 1, '0000-00-00 00:00:00'),
(119, 11, 250000, 12, 1, '0000-00-00 00:00:00'),
(120, 11, 300000, 12, 1, '0000-00-00 00:00:00'),
(121, 12, 10000, 24, 1, '0000-00-00 00:00:00'),
(122, 12, 20000, 24, 1, '0000-00-00 00:00:00'),
(123, 12, 30000, 24, 1, '0000-00-00 00:00:00'),
(124, 12, 40000, 24, 1, '0000-00-00 00:00:00'),
(125, 12, 50000, 24, 1, '0000-00-00 00:00:00'),
(126, 12, 60000, 24, 1, '0000-00-00 00:00:00'),
(127, 12, 70000, 24, 1, '0000-00-00 00:00:00'),
(128, 12, 80000, 24, 1, '0000-00-00 00:00:00'),
(129, 12, 90000, 24, 1, '0000-00-00 00:00:00'),
(130, 12, 100000, 24, 1, '0000-00-00 00:00:00'),
(131, 12, 150000, 24, 1, '0000-00-00 00:00:00'),
(132, 12, 200000, 24, 1, '0000-00-00 00:00:00'),
(133, 12, 250000, 24, 1, '0000-00-00 00:00:00'),
(134, 12, 300000, 24, 1, '0000-00-00 00:00:00'),
(135, 13, 10000, 36, 1, '0000-00-00 00:00:00'),
(136, 13, 20000, 36, 1, '0000-00-00 00:00:00'),
(137, 13, 30000, 36, 1, '0000-00-00 00:00:00'),
(138, 13, 40000, 36, 1, '0000-00-00 00:00:00'),
(139, 13, 50000, 36, 1, '0000-00-00 00:00:00'),
(140, 13, 60000, 36, 1, '0000-00-00 00:00:00'),
(141, 13, 70000, 36, 1, '0000-00-00 00:00:00'),
(142, 13, 80000, 36, 1, '0000-00-00 00:00:00'),
(143, 13, 90000, 36, 1, '0000-00-00 00:00:00'),
(144, 13, 100000, 36, 1, '0000-00-00 00:00:00'),
(145, 13, 150000, 36, 1, '0000-00-00 00:00:00'),
(146, 13, 200000, 36, 1, '0000-00-00 00:00:00'),
(147, 13, 250000, 36, 1, '0000-00-00 00:00:00'),
(148, 13, 300000, 36, 1, '0000-00-00 00:00:00'),
(149, 14, 10000, 48, 1, '0000-00-00 00:00:00'),
(150, 14, 20000, 48, 1, '0000-00-00 00:00:00'),
(151, 14, 30000, 48, 1, '0000-00-00 00:00:00'),
(152, 14, 40000, 48, 1, '0000-00-00 00:00:00'),
(153, 14, 50000, 48, 1, '0000-00-00 00:00:00'),
(154, 14, 60000, 48, 1, '0000-00-00 00:00:00'),
(155, 14, 70000, 48, 1, '0000-00-00 00:00:00'),
(156, 14, 80000, 48, 1, '0000-00-00 00:00:00'),
(157, 14, 90000, 48, 1, '0000-00-00 00:00:00'),
(158, 14, 100000, 48, 1, '0000-00-00 00:00:00'),
(159, 14, 150000, 48, 1, '0000-00-00 00:00:00'),
(160, 14, 200000, 48, 1, '0000-00-00 00:00:00'),
(161, 14, 250000, 48, 1, '0000-00-00 00:00:00'),
(162, 14, 300000, 48, 1, '0000-00-00 00:00:00'),
(163, 15, 10000, 60, 1, '0000-00-00 00:00:00'),
(164, 15, 20000, 60, 1, '0000-00-00 00:00:00'),
(165, 15, 30000, 60, 1, '0000-00-00 00:00:00'),
(166, 15, 40000, 60, 1, '0000-00-00 00:00:00'),
(167, 15, 50000, 60, 1, '0000-00-00 00:00:00'),
(168, 15, 60000, 60, 1, '0000-00-00 00:00:00'),
(169, 15, 70000, 60, 1, '0000-00-00 00:00:00'),
(170, 15, 80000, 60, 1, '0000-00-00 00:00:00'),
(171, 15, 90000, 60, 1, '0000-00-00 00:00:00'),
(172, 15, 100000, 60, 1, '0000-00-00 00:00:00'),
(173, 15, 150000, 60, 1, '0000-00-00 00:00:00'),
(174, 15, 200000, 60, 1, '0000-00-00 00:00:00'),
(175, 15, 250000, 60, 1, '0000-00-00 00:00:00'),
(176, 15, 300000, 60, 1, '0000-00-00 00:00:00'),
(177, 16, 10000, 72, 1, '0000-00-00 00:00:00'),
(178, 16, 20000, 72, 1, '0000-00-00 00:00:00'),
(179, 16, 30000, 72, 1, '0000-00-00 00:00:00'),
(180, 16, 40000, 72, 1, '0000-00-00 00:00:00'),
(181, 16, 50000, 72, 1, '0000-00-00 00:00:00'),
(182, 16, 60000, 72, 1, '0000-00-00 00:00:00'),
(183, 16, 70000, 72, 1, '0000-00-00 00:00:00'),
(184, 16, 80000, 72, 1, '0000-00-00 00:00:00'),
(185, 16, 90000, 72, 1, '0000-00-00 00:00:00'),
(186, 16, 100000, 72, 1, '0000-00-00 00:00:00'),
(187, 16, 150000, 72, 1, '0000-00-00 00:00:00'),
(188, 16, 200000, 72, 1, '0000-00-00 00:00:00'),
(189, 16, 250000, 72, 1, '0000-00-00 00:00:00'),
(190, 16, 300000, 72, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `plan_interest`
--

CREATE TABLE `plan_interest` (
  `PLAN_INTEREST_ID` int(11) NOT NULL,
  `PLAN_INTEREST_RATE` decimal(10,2) NOT NULL,
  `PLAN_INTEREST_TYPE` int(2) NOT NULL DEFAULT '0' COMMENT '0-PERCENTAGE 1-FLAT',
  `TRANSACTION_DATE` datetime NOT NULL,
  `PLAN_INTEREST_STATUS` int(11) NOT NULL DEFAULT '1' COMMENT '1-ENABLED 2-DISABLED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_interest`
--

INSERT INTO `plan_interest` (`PLAN_INTEREST_ID`, `PLAN_INTEREST_RATE`, `PLAN_INTEREST_TYPE`, `TRANSACTION_DATE`, `PLAN_INTEREST_STATUS`) VALUES
(1, '11.00', 0, '2018-09-27 00:00:00', 1),
(2, '11.50', 0, '2018-09-27 00:00:00', 1),
(3, '12.00', 0, '2018-09-27 00:00:00', 1),
(4, '12.75', 0, '2018-09-27 00:00:00', 1),
(5, '12.50', 0, '0000-00-00 00:00:00', 1),
(6, '13.00', 0, '0000-00-00 00:00:00', 1),
(7, '13.50', 0, '0000-00-00 00:00:00', 1),
(8, '9.00', 0, '0000-00-00 00:00:00', 1),
(9, '9.50', 0, '0000-00-00 00:00:00', 1),
(10, '10.00', 0, '0000-00-00 00:00:00', 1),
(11, '10.50', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_rank_commission`
--

CREATE TABLE `plan_rank_commission` (
  `PLAN_RANK_COMMISSION_ID` int(11) NOT NULL,
  `PLAN_ID` int(11) NOT NULL,
  `RANK_ID` int(11) NOT NULL,
  `PLAN_RANK_COMMISSION` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_rank_commission`
--

INSERT INTO `plan_rank_commission` (`PLAN_RANK_COMMISSION_ID`, `PLAN_ID`, `RANK_ID`, `PLAN_RANK_COMMISSION`) VALUES
(1, 1, 1, 11.50),
(2, 1, 2, 11.00),
(3, 1, 3, 10.50),
(4, 1, 4, 10.00),
(5, 1, 5, 9.50),
(6, 1, 6, 9.00),
(7, 1, 7, 8.50),
(8, 1, 8, 8.00),
(9, 1, 9, 7.50),
(10, 1, 10, 7.00),
(11, 1, 11, 6.50),
(12, 1, 12, 6.00),
(13, 1, 13, 5.50),
(14, 1, 14, 5.00),
(15, 2, 1, 12.00),
(16, 2, 2, 11.50),
(17, 2, 3, 11.00),
(18, 2, 4, 10.50),
(19, 2, 5, 10.00),
(20, 2, 6, 9.50),
(21, 2, 7, 9.00),
(22, 2, 8, 8.50),
(23, 2, 9, 8.00),
(24, 2, 10, 7.50),
(25, 2, 11, 7.00),
(26, 2, 12, 6.50),
(27, 2, 13, 6.00),
(28, 2, 14, 5.50),
(29, 3, 1, 12.50),
(30, 3, 2, 12.00),
(31, 3, 3, 11.50),
(32, 3, 4, 11.00),
(33, 3, 5, 10.50),
(34, 3, 6, 10.00),
(35, 3, 7, 9.50),
(36, 3, 8, 9.00),
(37, 3, 9, 8.50),
(38, 3, 10, 8.00),
(39, 3, 11, 7.50),
(40, 3, 12, 7.00),
(41, 3, 13, 6.50),
(42, 3, 14, 6.00),
(43, 1, 0, 0.00),
(44, 2, 0, 0.00),
(45, 3, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `plan_taxes`
--

CREATE TABLE `plan_taxes` (
  `PLAN_TAXES_ID` int(11) NOT NULL,
  `PLAN_ID` int(11) NOT NULL,
  `TAX_ID` int(11) NOT NULL,
  `PLAN_TAXES_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_type`
--

CREATE TABLE `plan_type` (
  `PLAN_TYPE_ID` int(10) NOT NULL,
  `PLAN_NAME` varchar(100) NOT NULL,
  `PLAN_DESCRIPTION` varchar(100) NOT NULL,
  `PLAN_TYPE_PLAN` int(2) NOT NULL COMMENT '0 for monthly 1 for yearly',
  `PLAN_STARTS_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COMPANY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_type`
--

INSERT INTO `plan_type` (`PLAN_TYPE_ID`, `PLAN_NAME`, `PLAN_DESCRIPTION`, `PLAN_TYPE_PLAN`, `PLAN_STARTS_DATE`, `COMPANY_ID`) VALUES
(1, 'MCS', 'MCS', 0, '2018-09-12 09:54:57', 1),
(2, 'OTCS', 'OTCS', 1, '2018-09-12 09:54:57', 1),
(3, 'OTCMRS', 'OTCMRS', 0, '2018-09-12 09:54:57', 1),
(4, 'Company Advisor Plan', 'For Hidden Ranks', 1, '2018-09-20 12:00:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `COST_PRICE` int(11) NOT NULL,
  `SELLING_PRICE` int(11) NOT NULL,
  `UNIT` tinyint(1) NOT NULL,
  `HSN/SAC` smallint(5) UNSIGNED NOT NULL,
  `VISIBLE` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `PROFESSION_ID` int(10) NOT NULL,
  `PROFESSION_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`PROFESSION_ID`, `PROFESSION_NAME`) VALUES
(1, 'TEACHER'),
(2, 'DOCTOR');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `RANK_ID` int(100) NOT NULL,
  `RANK_NAME` varchar(100) NOT NULL,
  `RANK_DESCRIPTION` varchar(100) NOT NULL,
  `RANK_TARGET_AMOUNT` decimal(10,0) NOT NULL,
  `RANK_AGENT_COMMISSION` decimal(10,2) NOT NULL,
  `RANK_COMMISION_TYPE` int(100) NOT NULL,
  `RANK_STATUS` int(1) NOT NULL DEFAULT '2' COMMENT '0 for advisor and 1 for super-advisor 2 for customer',
  `COMPANY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`RANK_ID`, `RANK_NAME`, `RANK_DESCRIPTION`, `RANK_TARGET_AMOUNT`, `RANK_AGENT_COMMISSION`, `RANK_COMMISION_TYPE`, `RANK_STATUS`, `COMPANY_ID`) VALUES
(0, 'Customer', '0', '0', '0.00', 0, 2, 1),
(1, 'SUPER RANK 14', '14', '0', '11.50', 0, 1, 1),
(2, 'SUPER RANK 13', '13', '0', '11.00', 0, 1, 1),
(3, 'SUPER RANK 12', '12', '0', '10.50', 0, 1, 1),
(4, 'SUPER RANK 11', '11', '0', '10.00', 0, 1, 1),
(5, 'RANK 10', '10', '0', '9.50', 0, 0, 1),
(6, 'RANK 09', '9', '0', '9.00', 0, 0, 1),
(7, 'RANK 08', '8', '0', '8.50', 0, 0, 1),
(8, 'RANK 07', '7', '0', '8.00', 0, 0, 1),
(9, 'RANK 06', '6', '0', '7.50', 0, 0, 1),
(10, 'RANK 05', '5', '0', '7.00', 0, 0, 1),
(11, 'RANK 04', '4', '0', '6.50', 0, 0, 1),
(12, 'RANK 03', '3', '0', '6.00', 0, 0, 1),
(13, 'RANK 02', '2', '0', '5.50', 0, 0, 1),
(14, 'RANK 01', '1', '0', '5.00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `REMARKS` varchar(200) NOT NULL,
  `REMINDING_DATE` datetime NOT NULL,
  `TYPE` tinyint(4) NOT NULL,
  `STATUS` tinyint(4) NOT NULL,
  `VISIBLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reminder_types`
--

CREATE TABLE `reminder_types` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `ID` int(10) UNSIGNED NOT NULL,
  `MSG` varchar(2000) NOT NULL,
  `RECIPENT` varchar(2000) NOT NULL,
  `OP_ID` int(10) UNSIGNED NOT NULL,
  `COST` int(11) NOT NULL,
  `TAMPLATE` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_credit`
--

CREATE TABLE `sms_credit` (
  `ID` int(10) UNSIGNED NOT NULL,
  `OP_ID` int(10) UNSIGNED NOT NULL,
  `CREDIT` int(10) UNSIGNED NOT NULL,
  `COST` float(10,2) NOT NULL,
  `SOURCE` varchar(50) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_tamplate`
--

CREATE TABLE `sms_tamplate` (
  `ID` int(10) UNSIGNED NOT NULL,
  `OP_ID` int(11) NOT NULL,
  `CONTENT` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `target_amount`
--

CREATE TABLE `target_amount` (
  `TARGET_ID` int(10) NOT NULL,
  `PLAN_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) NOT NULL,
  `RATE` float NOT NULL,
  `RATE_TYPE` int(11) NOT NULL,
  `DATE` datetime DEFAULT NULL,
  `STATUS` int(11) NOT NULL,
  `CLOSING_DATE` datetime NOT NULL,
  `VISIBLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `TAX_ID` int(11) NOT NULL,
  `TAX_NAME` varchar(100) NOT NULL,
  `TAX_PERCENTAGE` int(3) NOT NULL,
  `TAX_STATUS` int(1) NOT NULL DEFAULT '1' COMMENT '1 ACTIVE 2 DEACTIVE',
  `TAX_DATETIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_balance`
--

CREATE TABLE `wallet_balance` (
  `WALLET_ID` int(10) NOT NULL,
  `RECEIPT_NO` bigint(17) NOT NULL DEFAULT '0',
  `WALLET_AMOUNT` decimal(10,2) NOT NULL,
  `WALLET_TRANSACTION_METHOD` int(11) NOT NULL COMMENT '1-CASH 2-CHEQUE 3-DD 4-NETBANKING 5-BONUS',
  `WALLET_TRANSACTION_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `HRM_ID` int(5) NOT NULL COMMENT '1- FOR CUSTOMER_ID PLAN ACTIVATION   2-FOR HRM_ID COMMISSION',
  `PLAN_ACTIVATION_ID` bigint(20) NOT NULL,
  `WALLET_REMARK` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_balance`
--

INSERT INTO `wallet_balance` (`WALLET_ID`, `RECEIPT_NO`, `WALLET_AMOUNT`, `WALLET_TRANSACTION_METHOD`, `WALLET_TRANSACTION_TIME`, `HRM_ID`, `PLAN_ACTIVATION_ID`, `WALLET_REMARK`) VALUES
(494, 0, '-1000.00', 1, '2018-09-26 11:09:42', 18, 1619870000004, 'Purchase a plan of 1000 Rupees'),
(2792, 0, '-3000.00', 1, '2018-09-27 08:44:43', 20, 1619870000005, 'Purchase a plan of 3000 Rupees'),
(2801, 4612983600000004, '1000.00', 0, '2018-10-01 17:29:21', 18, 1619870000004, 'Payment successfull of plan worth rupees 1000'),
(2802, 0, '95.00', 0, '2018-10-01 17:29:21', 12, 1619870000004, 'Multi level commission'),
(2803, 0, '5.00', 0, '2018-10-01 17:29:21', 4, 1619870000004, 'Multi level commission'),
(2804, 0, '5.00', 0, '2018-10-01 17:29:21', 3, 1619870000004, 'Multi level commission'),
(2805, 0, '5.00', 0, '2018-10-01 17:29:21', 2, 1619870000004, 'Multi level commission'),
(2806, 0, '20.00', 0, '2018-10-01 17:29:21', 1, 1619870000004, 'Multi level commission'),
(2807, 4612983600000000, '3000.00', 0, '2018-10-02 07:23:14', 20, 1619870000005, 'Payment successfull of plan worth rupees 3000'),
(2808, 0, '240.00', 0, '2018-10-02 07:23:14', 19, 1619870000005, 'Multi level commission'),
(2809, 0, '45.00', 0, '2018-10-02 07:23:14', 13, 1619870000005, 'Multi level commission'),
(2810, 0, '0.00', 0, '2018-10-02 07:23:14', 12, 1619870000005, 'Multi level commission'),
(2811, 0, '15.00', 0, '2018-10-02 07:23:14', 4, 1619870000005, 'Multi level commission'),
(2812, 0, '15.00', 0, '2018-10-02 07:23:14', 3, 1619870000005, 'Multi level commission'),
(2813, 0, '15.00', 0, '2018-10-02 07:23:14', 2, 1619870000005, 'Multi level commission'),
(2814, 0, '105.00', 0, '2018-10-02 07:23:14', 1, 1619870000005, 'Multi level commission'),
(2815, 4612983600000001, '-800.00', 1, '2018-10-02 09:43:44', 22, 1619870000006, 'Purchase a plan of 800 Rupees'),
(2822, 4612983600000001, '800.00', 1, '2018-10-02 09:58:19', 22, 1619870000006, 'Payment successfull of plan worth rupees 800'),
(2823, 0, '76.00', 5, '2018-10-02 09:58:19', 7, 1619870000006, 'Multi level commission'),
(2824, 0, '4.00', 5, '2018-10-02 09:58:19', 4, 1619870000006, 'Multi level commission'),
(2825, 0, '4.00', 5, '2018-10-02 09:58:19', 3, 1619870000006, 'Multi level commission'),
(2826, 0, '4.00', 5, '2018-10-02 09:58:19', 2, 1619870000006, 'Multi level commission'),
(2827, 0, '16.00', 5, '2018-10-02 09:58:19', 1, 1619870000006, 'Multi level commission');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_groups`
--
ALTER TABLE `accounting_groups`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `GROUP_NAME` (`NAME`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DR_ID` (`DR_ID`),
  ADD KEY `CR_ID` (`CR_ID`),
  ADD KEY `HRM_ID` (`HRM_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Indexes for table `accouting_ledgers`
--
ALTER TABLE `accouting_ledgers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD KEY `UNDER` (`UNDER`),
  ADD KEY `UNDER_2` (`UNDER`),
  ADD KEY `VISIBLE` (`VISIBLE`);

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_type`
--
ALTER TABLE `bonus_type`
  ADD PRIMARY KEY (`BONUS_TYPE_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BRANCH_ID`),
  ADD UNIQUE KEY `BRANCH_USERNAME` (`BRANCH_USERNAME`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`),
  ADD KEY `BRANCH_CATEGORY_ID` (`BRANCH_CATEGORY_ID`),
  ADD KEY `BRANCH_CITY` (`BRANCH_CITY`);

--
-- Indexes for table `branch_category`
--
ALTER TABLE `branch_category`
  ADD PRIMARY KEY (`BRANCH_CATEGORY_ID`),
  ADD UNIQUE KEY `BRANCH_CATEGORY_NAME` (`BRANCH_CATEGORY_NAME`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CITY_ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMPANY_ID`),
  ADD KEY `FORRANK` (`COMPANY_ID`),
  ADD KEY `FORBRANCH` (`COMPANY_ID`),
  ADD KEY `COMPANY_CITY` (`COMPANY_CITY`),
  ADD KEY `COMPANY_COUNTRY` (`COMPANY_COUNTRY`),
  ADD KEY `COMPANY_STATE` (`COMPANY_STATE`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VICTIM_ID` (`VICTIM_ID`),
  ADD KEY `OP_ID` (`OP_ID`);

--
-- Indexes for table `controllers`
--
ALTER TABLE `controllers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `URL` (`URL`);

--
-- Indexes for table `controller_permisson`
--
ALTER TABLE `controller_permisson`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`),
  ADD KEY `PLAN_ID` (`PLAN_EMI_ID`,`HRM_ID`),
  ADD KEY `CUSTOMER_PROFESSION_ID` (`CUSTOMER_PROFESSION_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`);

--
-- Indexes for table `hrm`
--
ALTER TABLE `hrm`
  ADD PRIMARY KEY (`HRM_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`),
  ADD KEY `HRM_TYPE_ID` (`HRM_TYPE_ID`),
  ADD KEY `COMPANY_ID` (`HRM_FIRST_NAME`),
  ADD KEY `RANK_ID` (`RANK_ID`),
  ADD KEY `HRM_CITY` (`HRM_CITY`),
  ADD KEY `HRM_STATE` (`HRM_STATE`,`HRM_COUNTRY`),
  ADD KEY `HRM_COUNTRY` (`HRM_COUNTRY`),
  ADD KEY `HRM_TYPE_ID_2` (`HRM_TYPE_ID`),
  ADD KEY `HRM_TYPE_ID_3` (`HRM_TYPE_ID`),
  ADD KEY `PLAN_EMI_ID` (`PLAN_EMI_ID`);

--
-- Indexes for table `hrm_relation`
--
ALTER TABLE `hrm_relation`
  ADD PRIMARY KEY (`HRM_RELATION_ID`),
  ADD KEY `NEW_HRM_ID` (`NEW_HRM_ID`),
  ADD KEY `HRM_PARENT_ID` (`HRM_PARENT_ID`),
  ADD KEY `HRM_ADDED_BY` (`HRM_ADDED_BY`);

--
-- Indexes for table `hrm_type`
--
ALTER TABLE `hrm_type`
  ADD PRIMARY KEY (`HRM_TYPE_ID`),
  ADD KEY `HRM_TYPE_POST` (`HRM_TYPE_POST`),
  ADD KEY `HRM_TYPE_ID` (`HRM_TYPE_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `issue_sub`
--
ALTER TABLE `issue_sub`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ISSUE_ID` (`ISSUE_ID`),
  ADD KEY `ISSUE_ID_2` (`ISSUE_ID`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`NOMINEE_ID`),
  ADD KEY `PROFESSION_ID` (`PROFESSION_ID`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`PLAN_ID`),
  ADD KEY `PLAN_TYPE_ID` (`PLAN_TYPE_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`),
  ADD KEY `BONUS_TYPE_ID` (`BONUS_TYPE_ID`),
  ADD KEY `PLAN_INTEREST_ID` (`PLAN_INTEREST_ID`);

--
-- Indexes for table `plan_activation`
--
ALTER TABLE `plan_activation`
  ADD PRIMARY KEY (`PLAN_ACTIVATION_ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`,`PLAN_EMI_ID`),
  ADD KEY `PLAN_ID` (`PLAN_EMI_ID`);

--
-- Indexes for table `plan_emi`
--
ALTER TABLE `plan_emi`
  ADD PRIMARY KEY (`PLAN_EMI_ID`),
  ADD KEY `PLAN_ID` (`PLAN_ID`),
  ADD KEY `PLAN_BONUS_ID` (`PLAN_BONUS_ID`);

--
-- Indexes for table `plan_interest`
--
ALTER TABLE `plan_interest`
  ADD PRIMARY KEY (`PLAN_INTEREST_ID`);

--
-- Indexes for table `plan_rank_commission`
--
ALTER TABLE `plan_rank_commission`
  ADD PRIMARY KEY (`PLAN_RANK_COMMISSION_ID`),
  ADD KEY `RANK_ID` (`RANK_ID`),
  ADD KEY `PLAN_ID` (`PLAN_ID`);

--
-- Indexes for table `plan_type`
--
ALTER TABLE `plan_type`
  ADD PRIMARY KEY (`PLAN_TYPE_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`PROFESSION_ID`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`RANK_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reminder_types`
--
ALTER TABLE `reminder_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sms_credit`
--
ALTER TABLE `sms_credit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sms_tamplate`
--
ALTER TABLE `sms_tamplate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `target_amount`
--
ALTER TABLE `target_amount`
  ADD PRIMARY KEY (`TARGET_ID`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`TAX_ID`);

--
-- Indexes for table `wallet_balance`
--
ALTER TABLE `wallet_balance`
  ADD PRIMARY KEY (`WALLET_ID`),
  ADD KEY `PLAN_ACTIVATION_ID` (`PLAN_ACTIVATION_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_groups`
--
ALTER TABLE `accounting_groups`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accouting_ledgers`
--
ALTER TABLE `accouting_ledgers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CITY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `controllers`
--
ALTER TABLE `controllers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `controller_permisson`
--
ALTER TABLE `controller_permisson`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hrm`
--
ALTER TABLE `hrm`
  MODIFY `HRM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hrm_relation`
--
ALTER TABLE `hrm_relation`
  MODIFY `HRM_RELATION_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hrm_type`
--
ALTER TABLE `hrm_type`
  MODIFY `HRM_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_sub`
--
ALTER TABLE `issue_sub`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominee`
--
ALTER TABLE `nominee`
  MODIFY `NOMINEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `ID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_activation`
--
ALTER TABLE `plan_activation`
  MODIFY `PLAN_ACTIVATION_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `plan_emi`
--
ALTER TABLE `plan_emi`
  MODIFY `PLAN_EMI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `plan_interest`
--
ALTER TABLE `plan_interest`
  MODIFY `PLAN_INTEREST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `plan_rank_commission`
--
ALTER TABLE `plan_rank_commission`
  MODIFY `PLAN_RANK_COMMISSION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `plan_type`
--
ALTER TABLE `plan_type`
  MODIFY `PLAN_TYPE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `PROFESSION_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `RANK_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder_types`
--
ALTER TABLE `reminder_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_credit`
--
ALTER TABLE `sms_credit`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_tamplate`
--
ALTER TABLE `sms_tamplate`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target_amount`
--
ALTER TABLE `target_amount`
  MODIFY `TARGET_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `TAX_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_balance`
--
ALTER TABLE `wallet_balance`
  MODIFY `WALLET_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2828;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`DR_ID`) REFERENCES `accouting_ledgers` (`ID`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`CR_ID`) REFERENCES `accouting_ledgers` (`ID`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`HRM_ID`) REFERENCES `hrm` (`HRM_ID`),
  ADD CONSTRAINT `accounts_ibfk_4` FOREIGN KEY (`BRANCH_ID`) REFERENCES `branch` (`BRANCH_ID`),
  ADD CONSTRAINT `accounts_ibfk_5` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `accouting_ledgers`
--
ALTER TABLE `accouting_ledgers`
  ADD CONSTRAINT `accouting_ledgers_ibfk_1` FOREIGN KEY (`UNDER`) REFERENCES `accounting_groups` (`ID`),
  ADD CONSTRAINT `accouting_ledgers_ibfk_2` FOREIGN KEY (`VISIBLE`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `bonus_type`
--
ALTER TABLE `bonus_type`
  ADD CONSTRAINT `bonus_type_ibfk_1` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_comidfk` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`),
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`BRANCH_CATEGORY_ID`) REFERENCES `branch_category` (`BRANCH_CATEGORY_ID`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`COMPANY_CITY`) REFERENCES `cities` (`CITY_ID`),
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`COMPANY_STATE`) REFERENCES `cities` (`CITY_ID`),
  ADD CONSTRAINT `company_ibfk_3` FOREIGN KEY (`COMPANY_COUNTRY`) REFERENCES `cities` (`CITY_ID`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `cust_professionidfk` FOREIGN KEY (`CUSTOMER_PROFESSION_ID`) REFERENCES `profession` (`PROFESSION_ID`),
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`PLAN_EMI_ID`) REFERENCES `plan_emi` (`PLAN_EMI_ID`);

--
-- Constraints for table `hrm`
--
ALTER TABLE `hrm`
  ADD CONSTRAINT `hrm_ibfk_1` FOREIGN KEY (`HRM_CITY`) REFERENCES `cities` (`CITY_ID`),
  ADD CONSTRAINT `hrm_ibfk_2` FOREIGN KEY (`HRM_STATE`) REFERENCES `cities` (`CITY_ID`),
  ADD CONSTRAINT `hrm_ibfk_3` FOREIGN KEY (`HRM_COUNTRY`) REFERENCES `cities` (`CITY_ID`),
  ADD CONSTRAINT `hrm_ibfk_4` FOREIGN KEY (`PLAN_EMI_ID`) REFERENCES `plan_emi` (`PLAN_EMI_ID`),
  ADD CONSTRAINT `hrm_typidfk` FOREIGN KEY (`HRM_TYPE_ID`) REFERENCES `hrm_type` (`HRM_TYPE_ID`);

--
-- Constraints for table `hrm_relation`
--
ALTER TABLE `hrm_relation`
  ADD CONSTRAINT `hrm_relation_ibfk_1` FOREIGN KEY (`NEW_HRM_ID`) REFERENCES `hrm` (`HRM_ID`),
  ADD CONSTRAINT `hrm_relation_ibfk_2` FOREIGN KEY (`HRM_PARENT_ID`) REFERENCES `hrm` (`HRM_ID`),
  ADD CONSTRAINT `hrm_relation_ibfk_3` FOREIGN KEY (`HRM_ADDED_BY`) REFERENCES `hrm` (`HRM_ID`);

--
-- Constraints for table `hrm_type`
--
ALTER TABLE `hrm_type`
  ADD CONSTRAINT `hrmtyp_comidfk` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `nominee`
--
ALTER TABLE `nominee`
  ADD CONSTRAINT `nominee_ibfk_1` FOREIGN KEY (`PROFESSION_ID`) REFERENCES `profession` (`PROFESSION_ID`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`BONUS_TYPE_ID`) REFERENCES `bonus_type` (`BONUS_TYPE_ID`),
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`),
  ADD CONSTRAINT `plan_ibfk_3` FOREIGN KEY (`PLAN_TYPE_ID`) REFERENCES `plan_type` (`PLAN_TYPE_ID`);

--
-- Constraints for table `plan_activation`
--
ALTER TABLE `plan_activation`
  ADD CONSTRAINT `plan_activation_ibfk_2` FOREIGN KEY (`PLAN_EMI_ID`) REFERENCES `plan_emi` (`PLAN_EMI_ID`),
  ADD CONSTRAINT `plan_activation_ibfk_3` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `hrm` (`HRM_ID`);

--
-- Constraints for table `plan_rank_commission`
--
ALTER TABLE `plan_rank_commission`
  ADD CONSTRAINT `plan_rank_commission_ibfk_1` FOREIGN KEY (`PLAN_ID`) REFERENCES `plan` (`PLAN_ID`),
  ADD CONSTRAINT `plan_rank_commission_ibfk_2` FOREIGN KEY (`RANK_ID`) REFERENCES `rank` (`RANK_ID`);

--
-- Constraints for table `plan_type`
--
ALTER TABLE `plan_type`
  ADD CONSTRAINT `plantype_comid` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
