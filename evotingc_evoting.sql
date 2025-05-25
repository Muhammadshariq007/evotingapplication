-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2025 at 01:17 AM
-- Server version: 8.0.39
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evotingc_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_ballotpaper`
--

CREATE TABLE `table_admin_ballotpaper` (
  `id` int NOT NULL,
  `nomineeId` int NOT NULL,
  `candidateId` varchar(255) DEFAULT NULL,
  `memberId` int NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_admin_ballotpaper`
--

INSERT INTO `table_admin_ballotpaper` (`id`, `nomineeId`, `candidateId`, `memberId`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, '21', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(2, 7, '22', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(3, 5, '26', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(4, 8, '28', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(5, 9, '31', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(6, 11, '34', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(7, 12, '50', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(8, 12, '49', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(9, 12, '48', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(10, 12, '47', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(11, 12, '46', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(12, 12, '37', 7, 'active', '2025-05-22 06:42:21', '2025-05-22 06:42:21'),
(13, 6, '20', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(14, 7, '24', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(15, 5, '26', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(16, 8, '28', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(17, 9, '31', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(18, 11, '34', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(19, 12, '50', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(20, 12, '48', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(21, 12, '46', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(22, 12, '44', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(23, 12, '41', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(24, 12, '39', 6, 'active', '2025-05-22 06:53:08', '2025-05-22 06:53:08'),
(25, 6, '21', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(26, 7, '23', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(27, 5, '26', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(28, 8, '28', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(29, 9, '31', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(30, 11, '32', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(31, 12, '50', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(32, 12, '48', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(33, 12, '46', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(34, 12, '44', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(35, 12, '43', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(36, 12, '42', 5, 'active', '2025-05-22 06:55:20', '2025-05-22 06:55:20'),
(37, 6, '21', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(38, 7, '23', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(39, 5, '26', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(40, 8, '29', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(41, 9, '31', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(42, 11, '34', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(43, 12, '50', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(44, 12, '49', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(45, 12, '48', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(46, 12, '46', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(47, 12, '44', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(48, 12, '43', 10, 'active', '2025-05-22 07:16:35', '2025-05-22 07:16:35'),
(49, 6, '20', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(50, 7, '24', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(51, 5, '26', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(52, 8, '29', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(53, 9, '31', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(54, 11, '32', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(55, 12, '50', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(56, 12, '48', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(57, 12, '46', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(58, 12, '44', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(59, 12, '42', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(60, 12, '40', 4, 'active', '2025-05-22 07:20:46', '2025-05-22 07:20:46'),
(61, 6, '21', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(62, 7, '24', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(63, 5, '26', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(64, 8, '29', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(65, 9, '31', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(66, 11, '34', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(67, 12, '50', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(68, 12, '48', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(69, 12, '46', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(70, 12, '44', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(71, 12, '42', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(72, 12, '40', 2, 'active', '2025-05-22 07:23:41', '2025-05-22 07:23:41'),
(73, 6, '20', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(74, 7, '24', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(75, 5, '25', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(76, 8, '29', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(77, 9, '30', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(78, 11, '33', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(79, 12, '50', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(80, 12, '49', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(81, 12, '48', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(82, 12, '46', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(83, 12, '45', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09'),
(84, 12, '43', 11, 'active', '2025-05-22 20:02:09', '2025-05-22 20:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_candidate`
--

CREATE TABLE `table_admin_candidate` (
  `id` int NOT NULL,
  `nomineeId` int DEFAULT NULL,
  `candidateName` varchar(255) DEFAULT NULL,
  `candidatePhone` varchar(255) DEFAULT NULL,
  `candidateCity` varchar(255) DEFAULT NULL,
  `candidateChaptername` varchar(255) DEFAULT NULL,
  `candidatePicture` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_admin_candidate`
--

INSERT INTO `table_admin_candidate` (`id`, `nomineeId`, `candidateName`, `candidatePhone`, `candidateCity`, `candidateChaptername`, `candidatePicture`, `status`, `created_at`, `updated_at`) VALUES
(20, 6, 'PROF. MUHAMMAD ARSHAD CHOHAN', '03333356327', 'LAHORE', 'LAHORE', '1747222835.jpg', 'active', '2025-05-14 11:37:10', '2025-05-14 11:40:35'),
(21, 6, 'PROF. RUBINA SOHAIL', '03333356327', 'LAHORE', 'LAHORE', '1747222778.jpg', 'active', '2025-05-14 11:39:38', '2025-05-14 11:39:38'),
(22, 7, 'PROF. GUL RUKH QAZI', '03333356327', 'PESHAWAR', 'PESHAWAR', '-', 'active', '2025-05-14 11:41:48', '2025-05-14 11:42:41'),
(23, 7, 'PROF. RABEEA SADAF', '03333356327', 'PESHAWAR', 'PESHAWAR', '-', 'active', '2025-05-14 11:43:57', '2025-05-14 11:43:57'),
(24, 7, 'PROF. REHANA RAHIM', '03333356327', 'PESHAWAR', 'PESHAWAR', '-', 'active', '2025-05-14 11:44:34', '2025-05-14 11:44:34'),
(25, 5, 'PROF. SHAHID IRSHAD RAO', '03333356327', 'LAHORE', 'LAHORE', '-', 'active', '2025-05-14 11:45:18', '2025-05-14 11:45:18'),
(26, 5, 'PROF. TAYYIBA WASIM', '03333356327', 'LAHORE', 'LAHORE', '-', 'active', '2025-05-14 11:45:46', '2025-05-14 11:45:46'),
(28, 8, 'PROF. NUSRAT SHAH', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:46:23', '2025-05-14 11:46:23'),
(29, 8, 'PROF. MAJ. GEN. SHEHLA M. BAQAI', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:46:53', '2025-05-14 11:46:53'),
(30, 9, 'PROF. SADIAH AHSAN PAL', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:47:19', '2025-05-14 11:47:19'),
(31, 9, 'PROF. SHABEEN NAZ MASOOD', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:47:40', '2025-05-14 11:47:40'),
(32, 11, 'Dr. ERUM MAJID', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:48:17', '2025-05-14 11:48:17'),
(33, 11, 'PROF. FARRUKH NAHEED', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:48:40', '2025-05-14 11:48:40'),
(34, 11, 'DR. SHAZIA NASEEB', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:49:01', '2025-05-14 11:49:01'),
(35, 12, 'PROF. MAJ. GEN. ABBEERA CHOUDRY', '03333356327', 'LAHORE', 'LAHORE', '-', 'active', '2025-05-14 11:49:47', '2025-05-14 11:49:47'),
(36, 12, 'PROF. BUSHRA RAUF', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:50:30', '2025-05-14 11:50:46'),
(37, 12, 'PROF. FARIHA FAROOQ', '03333356327', 'Karachi', 'KARACHI', '-', 'active', '2025-05-14 11:51:19', '2025-05-14 11:51:19'),
(38, 12, 'PROF. MARYAM ZUBAIR', '03333356327', 'Karachi', 'KARACHI', '-', 'active', '2025-05-14 11:51:46', '2025-05-14 11:51:46'),
(39, 12, 'DR. NADEEM ZUBERI', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:52:25', '2025-05-14 11:52:25'),
(40, 12, 'PROF. NAEEMA UTMAN', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:52:52', '2025-05-14 11:52:52'),
(41, 12, 'PROF. NAHEED PARVEEN', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:53:14', '2025-05-14 11:53:14'),
(42, 12, 'PROF. NAJMA GHAFFAR', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:53:36', '2025-05-14 11:53:36'),
(43, 12, 'PROF. NARGIS DANISH', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:53:58', '2025-05-14 11:53:58'),
(44, 12, 'PROF. NUSRAT MANZOOR', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:54:20', '2025-05-14 11:54:20'),
(45, 12, 'PROF. SHAHIDA HUSSAIN TARAR', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:54:40', '2025-05-14 11:54:40'),
(46, 12, 'PROF. SHAILA ANWAR', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:54:59', '2025-05-14 11:54:59'),
(47, 12, 'PROF. SHAISTA RASHID', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:55:18', '2025-05-14 11:55:18'),
(48, 12, 'DR. SIDRAH NAUSHEEN', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:55:37', '2025-05-14 11:55:37'),
(49, 12, 'PROF. SAMINA HAQ', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:55:57', '2025-05-14 11:55:57'),
(50, 12, 'PROF. SONIA NAQVI', '03333356327', 'KARACHI', 'KARACHI', '-', 'active', '2025-05-14 11:56:19', '2025-05-14 11:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_chapter`
--

CREATE TABLE `table_admin_chapter` (
  `id` int NOT NULL,
  `Chaptername` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_admin_chapter`
--

INSERT INTO `table_admin_chapter` (`id`, `Chaptername`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KARACHI', 'active', '2024-11-08 20:38:37', '2025-05-14 15:19:10'),
(2, 'ABBOTTABAD', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(3, 'AJK', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(4, 'ASIF KALAY', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(5, 'ATLANTA', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(6, 'BAHAWALPUR', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(7, 'BANNU', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(8, 'BELLERE', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(9, 'BUNER', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(10, 'CHENAB NAGAR', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(11, 'CHINIOT', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(12, 'DALEA', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(13, 'DG KHAN', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(14, 'DI KHAN', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(15, 'DIR', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(16, 'FAISALABAD', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(17, 'GAMBAT', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(18, 'GUJRANWALA', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(19, 'HARIPUR', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(20, 'HYDERABAD', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(21, 'ISLAMABAD', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(22, 'JACOBABAD', 'active', '2024-11-08 20:38:37', '2024-11-08 20:38:37'),
(23, 'KARAK', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(24, 'KATLANG', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(25, 'KHAIRPUR', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(26, 'KOHAT', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(27, 'LAHORE', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(28, 'LARKANA', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(29, 'LODHRAN', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(30, 'LOWER DIR KPK', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(31, 'MANSEHRA', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(32, 'MARDAN', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(33, 'MIRPUR AJK', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(34, 'MIRPUR KHAS', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(35, 'MITHI', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(36, 'MULTAN', 'active', '2024-11-08 20:38:38', '2024-11-08 20:38:38'),
(37, 'NAWABSHAH', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(38, 'NOSHERA', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(39, 'PESHAWAR', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(40, 'QUETTA', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(41, 'RY KHAN', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(42, 'RAWALPINDI', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(43, 'SAHIWAL', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(44, 'SARGODHA', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(45, 'SAWABI', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(46, 'SIALKOT', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(47, 'SUKKUR', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(48, 'SWAT', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(49, 'TEXAS', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(50, 'UAE', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(51, 'UK', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(52, 'USA', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(53, 'VEHARI', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(54, 'WAH CANT', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39'),
(55, 'QATTAR', 'active', '2024-11-08 20:38:39', '2024-11-08 20:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_companies`
--

CREATE TABLE `table_admin_companies` (
  `id` int NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `companyLogo` varchar(255) DEFAULT NULL,
  `companyAddress` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_login`
--

CREATE TABLE `table_admin_login` (
  `id` int NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_admin_login`
--

INSERT INTO `table_admin_login` (`id`, `adminName`, `username`, `password`, `contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Evoting', 'evoting', 'evoting@786', '213213123', '2023-02-12 11:40:55', '2023-02-12 11:40:55', '2023-02-12 11:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_members`
--

CREATE TABLE `table_admin_members` (
  `id` int NOT NULL,
  `memberName` varchar(255) DEFAULT NULL,
  `memberEmail` varchar(255) DEFAULT NULL,
  `memberMobile` varchar(255) DEFAULT NULL,
  `memberCity` varchar(255) DEFAULT NULL,
  `memberChapter` int NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'inactive',
  `progressStatus` varchar(100) NOT NULL DEFAULT 'pending',
  `otpCode` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_admin_members`
--

INSERT INTO `table_admin_members` (`id`, `memberName`, `memberEmail`, `memberMobile`, `memberCity`, `memberChapter`, `status`, `progressStatus`, `otpCode`, `created_at`, `updated_at`) VALUES
(3, 'Prof.Razia Korejo', 'razia@gmail.com', '03002371225', 'KARACHI', 1, 'active', 'pending', NULL, '2025-05-22 00:38:12', '2025-05-22 20:00:36'),
(4, 'Prof.Amtullah Zareen', 'zareen@gmail.com', '03334381585', 'Quetta', 40, 'active', 'complete', '58534226', '2025-05-22 00:39:00', '2025-05-22 20:00:36'),
(5, 'Prof. Sania Khattak', 'sania@gmail.com', '03339201266', 'Peshawar', 39, 'active', 'complete', '81271051', '2025-05-22 00:39:46', '2025-05-22 20:00:36'),
(6, 'Prof.Sadaqat Jabeen', 'sadaqat@gmail.com', '03219152822', 'Quettaq', 40, 'active', 'complete', '46510204', '2025-05-22 00:40:56', '2025-05-22 20:00:36'),
(7, 'Dr. Azra Jameel', 'azra@gmail.com', '03002231864', 'Karachi', 1, 'active', 'complete', '67534025', '2025-05-22 00:41:47', '2025-05-22 20:00:36'),
(8, 'Prof.Tazeen Abbas', 'tazeen.abbas@hotmail.com', '03142137253', 'KARACHI', 1, 'active', 'pending', NULL, '2025-05-22 00:43:05', '2025-05-22 20:00:36'),
(9, 'Prof Tasneem Ashraf', 'ashraftasneem55@gmail.com', '03009381378', 'Quetta', 40, 'active', 'inprocess', '28407477', '2025-05-22 07:00:29', '2025-05-22 20:00:36'),
(10, 'Prof Roshan Ara Qazi', 'roshankhalil@gmail.com', '03332600516', 'Hyderabad', 20, 'active', 'complete', '91606839', '2025-05-22 07:10:31', '2025-05-22 20:00:36'),
(12, 'toqeer', 'toqeerabbasi7@gmail.com', '03103925350', 'KARACHI', 1, 'active', 'pending', NULL, '2025-05-22 20:15:02', '2025-05-22 20:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_nominee`
--

CREATE TABLE `table_admin_nominee` (
  `id` int NOT NULL,
  `nomineeName` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `sorting` varchar(40) DEFAULT NULL,
  `selectionStatus` varchar(100) DEFAULT NULL,
  `selectionLimit` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_admin_nominee`
--

INSERT INTO `table_admin_nominee` (`id`, `nomineeName`, `status`, `sorting`, `selectionStatus`, `selectionLimit`, `created_at`, `updated_at`) VALUES
(5, 'Vice President (Punjab)', 'active', '3', 'single', NULL, '2024-11-08 20:36:16', '2025-05-14 11:33:40'),
(6, 'President Elect', 'active', '1', 'single', NULL, '2024-11-08 20:36:29', '2025-05-14 11:32:19'),
(7, 'Vice President (KPK)', 'active', '2', 'single', NULL, '2025-04-16 07:24:21', '2025-04-16 07:26:59'),
(8, 'Vice President (Sindh)', 'active', '4', 'single', NULL, '2025-04-16 07:24:40', '2025-05-14 11:33:16'),
(9, 'Secretary General', 'active', '5', 'single', NULL, '2025-04-16 07:25:12', '2025-05-14 11:34:02'),
(11, 'Treasurer', 'active', '6', 'single', NULL, '2025-04-16 07:25:47', '2025-05-14 11:34:57'),
(12, 'Executive Members (Select any Six)', 'active', '7', 'multiple', '6', '2025-04-16 07:26:12', '2025-04-16 07:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin_setup`
--

CREATE TABLE `table_admin_setup` (
  `id` int NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `companyLogo` varchar(255) DEFAULT NULL,
  `votingstart` datetime DEFAULT NULL,
  `votingend` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_admin_setup`
--

INSERT INTO `table_admin_setup` (`id`, `companyName`, `companyLogo`, `votingstart`, `votingend`, `created_at`, `updated_at`) VALUES
(1, 'FIFTHTHOUGHT', '1746112495.png', '2025-05-18 12:00:00', '2025-05-24 14:30:00', '2024-11-02 22:23:42', '2025-05-23 10:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin_ballotpaper`
--
ALTER TABLE `table_admin_ballotpaper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_candidate`
--
ALTER TABLE `table_admin_candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_chapter`
--
ALTER TABLE `table_admin_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_companies`
--
ALTER TABLE `table_admin_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_login`
--
ALTER TABLE `table_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_members`
--
ALTER TABLE `table_admin_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_nominee`
--
ALTER TABLE `table_admin_nominee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin_setup`
--
ALTER TABLE `table_admin_setup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin_ballotpaper`
--
ALTER TABLE `table_admin_ballotpaper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `table_admin_candidate`
--
ALTER TABLE `table_admin_candidate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `table_admin_chapter`
--
ALTER TABLE `table_admin_chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `table_admin_companies`
--
ALTER TABLE `table_admin_companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_admin_login`
--
ALTER TABLE `table_admin_login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_admin_members`
--
ALTER TABLE `table_admin_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_admin_nominee`
--
ALTER TABLE `table_admin_nominee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_admin_setup`
--
ALTER TABLE `table_admin_setup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
