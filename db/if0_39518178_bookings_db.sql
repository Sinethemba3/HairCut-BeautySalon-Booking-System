-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.infinityfree.com
-- Generation Time: Dec 14, 2025 at 12:05 PM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39518178_bookings_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `video` blob NOT NULL,
  `blog_name` varchar(25) NOT NULL,
  `uploaded_by` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `role` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `surname`, `email`, `password`, `image`, `role`, `gender`, `birthday`, `date`) VALUES
(1, 'aviwe.manka', 'Aviwe', 'Manka', 'aviwe@yahoo.com', '$2y$10$gXuuaOGneh4nc2n/4/cCtuNeVxzevy6ydQ8R0856XrSKxsongP6xi', 'uploads/pic.png', 'Customer', 'Female', '2024-02-26', '2024-02-25 09:57:15'),
(2, 'arya.stark', 'Arya', 'Stark', 'stark@yahoo.com', '$2y$10$G4M9HoXPFi8qOf3KtzzsxeVoWGy3RKydUm/0BNGaAawDUZKzDKPRW', 'uploads/user.png', 'Customer', 'Female', '2024-02-29', '2024-02-29 22:47:03'),
(3, 'asavela.ntshwanti', 'Asavela', 'Ntshwanti', 'asavelan302@gmail.com', '$2y$10$GquprLoFrZfpy15rSDkWLuqs/sJ8.Cq1pUrB5PrQUwiWCSKtOoWRq', 'uploads/20240321_101358.jpg', 'Customer', 'Female', '2007-09-23', '2024-03-29 08:15:54'),
(4, 'asavela.ntshwanti1677', 'Asavela', 'Ntshwanti', 'asavelan3@gmail.com', '$2y$10$xaqSFLISgn74lg0yNfnqbuhM5Dv3T9H9uoFp/uWFOqVCsuJHYMSOS', 'uploads/PHOTO-2024-01-30-12-08-48.jpg', 'Customer', 'Female', '2024-01-17', '2024-04-02 12:19:47'),
(5, 'nonyaniso .ngqele', 'NONYANISO ', 'Ngqele', 'nonyaniso.ngqele@transnet.net', '$2y$10$ieagG2ugMQDb3fN7WeQ5eut/zFg/3pmx6pgWaGfmKvABtfcnR.xBa', 'uploads/20240205_201842.jpg', 'Customer', 'Female', '1988-03-08', '2024-04-02 14:00:34'),
(6, 'asavela.ntshwanti1588', 'Asavela', 'Ntshwanti', 'asavela2024@gmail.com', '$2y$10$PL5dURKsbvdwLGDNfqIQu.1O1T1yyVfovD8esvCATSRxc9CX5G3na', 'uploads/PHOTO-2024-01-30-12-08-48.jpg', 'Customer', 'Female', '2024-02-06', '2024-04-02 15:05:06'),
(7, 'asavela.ntshwanti8433', 'Asavela', 'Ntshwanti', 'asavela123@gmail.com', '$2y$10$ay/RmFl8JgNoUQUxpZFaVuC2uAdObiFQ3fomCEAOnRyfql7LoJo3e', 'uploads/PHOTO-2024-01-30-12-08-48.jpg', 'Customer', 'Female', '2024-01-10', '2024-04-02 15:12:27'),
(8, 'phila.mbandazwayo', 'Phila', 'Mbandazwayo', 'phila123@gmail.com', '$2y$10$CMa8EEsEQ7Xm0ShONaoeRuRxpl2HkJMG7rRjkE6z6FA8PywLDQzzq', 'uploads/PHOTO-2024-01-30-12-08-48.jpg', 'Customer', 'Female', '2023-12-11', '2024-04-02 15:26:39'),
(9, 'ntobololo.ntobololo', 'Ntobololo', 'Ntobololo', 'ntobololol@gmail.com', '$2y$10$SzwsH7mRcrGLTUUftULEo.0FxmrDOh/WuDcghxKAleNqj2CIs/bLS', 'uploads/inbound6030031875424054254.jpg', 'Customer', 'Female', '2001-06-02', '2024-04-02 21:15:23'),
(10, 'yandi.ndzena', 'Yandi', 'Ndzena', 'yandiswandzena1@gmail.com', '$2y$10$WhBRUYDPIE44PvAQbv8Gw.sQtHosqMX2yqCtwhTZFZjz9a1HShBWS', 'uploads/Acer_Wallpaper_01_3840x2400.jpg', 'Customer', 'Female', '1986-06-19', '2024-04-06 20:17:56'),
(11, 'nokuphila.mbandazwayo', 'Nokuphila', 'Mbandazwayo', 'noku1@gmail.com', '$2y$10$RsWPiDQxRDEit2Me5w/kKefDShgKqXuNkKSjxWJdI3t8uU5h4XFnu', 'uploads/PHOTO-2024-01-30-12-08-48.jpg', 'Customer', 'Female', '2022-12-14', '2024-04-08 11:55:09'),
(12, 'noluxolo.sishuba', 'Noluxolo', 'Sishuba', 'zimnandiimvuyozam@gmail.com', '$2y$10$quZ.21aE.1k8HAUzvDYr1eTYjIf2B1m/w3fPCrOZxSjiQ4sw9YX0O', 'uploads/IMG_6473.jpeg', 'Customer', 'Female', '1986-08-21', '2024-04-09 09:05:18'),
(13, 'nondumiso.tungu', 'Nondumiso', 'Tungu', 'nondumiso.tungu@gmail.com', '$2y$10$n99RDtP/.Aq.gxp/PGWjuOZiawqeVrAap9PaWiJEDcY9lGe9bJAxe', 'uploads/inbound6053486032064459571.jpg', 'Customer', 'Female', '1986-04-05', '2024-04-09 16:06:41'),
(14, 'lelethu.zepe', 'LELETHU', 'ZEPE', 'lelethuzephe@gmail.com', '$2y$10$EJqyGkRen33NQGtLahQOd.ZZ4YrWj96OWve.nmrHlH4PKqhHk7YAu', 'uploads/FB_IMG_1704430006457.jpg', 'Customer', 'Female', '1990-10-23', '2024-04-10 11:52:32'),
(15, 'nokuphila.mbandazwayo7805', 'Nokuphila', 'Mbandazwayo', 'noku12@gmail.com', '$2y$10$1BlS11ve7t7DUo.cJ5yIyOUsWfsYGHPWD1hRG79dDLE0QIDhhqFO6', 'uploads/Screenshot_20240409_104551_Instagram.jpg', 'Customer', 'Female', '2023-11-21', '2024-04-11 11:28:11'),
(16, 'tembisa .sikolo', 'Tembisa ', 'Sikolo', 'tkahla52@gmail.com', '$2y$10$WELa1EZIahOFCQRivUKIgOhKhSrWcew9zW5rK5y/9O.aWFikREwWi', 'uploads/IMG_0645.jpeg', 'Customer', 'Female', '2024-05-22', '2024-04-14 10:55:33'),
(17, 'yolanda .sayo', 'Yolanda ', 'Sayo', 'yol.sayo@gmail.com', '$2y$10$IFo5g1UckAa4f2EBG6rig.6Qq92aWNXxbnK6FaeDL13pW1YTT3cxS', 'uploads/IMG_1504.jpeg', 'Customer', 'Female', '1988-06-04', '2024-04-15 14:01:15'),
(18, 'ndileka.nazo', 'Ndileka', 'Nazo', 'ndileka.mjacu@gmail.com', '$2y$10$JhiK4TPcxzI19d/R7PsVWuK9DXure9d1R207gQWNZSMhl9dZTIabW', 'uploads/IMG_3474.png', 'Customer', 'Female', '2024-04-18', '2024-04-16 13:16:50'),
(19, 'olothando .dlulane', 'Olothando ', 'Dlulane', 'yamkeladlulane@gmail.com', '$2y$10$qRtnlB4ohxq/DdTyj7dCMeiIL.2yOypLBCUfP6aqitm60jGRVUvOm', 'uploads/Screenshot_20240306_154857_WhatsApp.jpg', 'Customer', 'Female', '2007-01-28', '2024-04-16 17:12:48'),
(20, 'brenda.taitai', 'Brenda', 'Taitai', 'taitai.brenda@gmail.com', '$2y$10$lcneuLaSG6VIPFdoV4zYUe0ozvCw/u3.GnSR1.sUHZkWheAgaGk8y', 'uploads/IMG_0446.jpeg', 'Customer', 'Female', '1983-04-24', '2024-04-18 10:59:50'),
(21, 'afika .rwayi', 'Afika ', 'Rwayi', 'a.b.rwayi@gmail.com', '$2y$10$u678NFNxgsNC8bs/JQyy4uPwrQ/BwpOSF/PLoZHyc91u6Ae3WXx1y', 'uploads/inbound3039306088547466141.jpg', 'Customer', 'Female', '1998-06-06', '2024-04-21 08:00:12'),
(22, 'mookho.malahleha', 'Mookho', 'Malahleha', 'mookhodoc@gmail.com', '$2y$10$FU3uLgRZFBnZkTmQGRN6qOB99sUDpU7eOC58PK3rivM7mx0aNKK.6', 'uploads/0AD459B1-4221-4DF6-B74C-EEA382235264.jpeg', 'Customer', 'Female', '1981-03-04', '2024-04-23 17:37:43'),
(23, 'nomzolisi.mgudlandlu', 'Nomzolisi', 'Mgudlandlu', 'nomzolisimgudlandlu@gamil.com', '$2y$10$Q9AZA2eBSYegIEmLgy4ZaeqkncNw9tGQNj5Uy3BmELx1dok7pMXj.', 'uploads/IMG20240415134204.jpg', 'Customer', 'Female', '1991-03-20', '2024-04-26 16:00:59'),
(24, 'kellyswasp.kellyswaspon', 'KellySwasp', 'KellySwaspON', 'mckinneyevelyn6@gmail.com', '$2y$10$lXgZvnO/50KMYBgQsvwR6eHsEdo2wVD7yGxzP/OoWSf25SjxXzcNu', '', 'Customer', 'Male', '1985-08-06', '2024-04-27 12:44:45'),
(25, 'abongile.ganya', 'Abongile', 'Ganya', 'abz.ganya@gmail.com', '$2y$10$.plDUf2QNlRyugOqWjkzp.uQvAadjZ5SXTtgz5AhdLXtwI.QE4q7y', 'uploads/IMG_6065.jpeg', 'Customer', 'Female', '1985-09-29', '2024-04-29 21:09:21'),
(26, 'kecia .fleming', 'Kecia ', 'Fleming', 'kyfleming1017@gmail.com', '$2y$10$2uvVrs8NoabMXcDorcUKcuh922IOXRIYTG1sqaY3R8pQu2kZrZHTe', 'uploads/IMG_0448.jpeg', 'Customer', 'Female', '1971-08-24', '2024-05-06 15:57:29'),
(27, 'cloria .nhambu', 'Cloria ', 'Nhambu', 'cloriacarol8@gmail.com', '$2y$10$07MVhMDZ/Zwslh3WPqCsHOG/bp30KIhiUp.mOGXhZTz0e6igLQukm', 'uploads/IMG_1800.jpeg', 'Customer', 'Female', '1991-04-04', '2024-05-07 21:42:40'),
(28, 'preye.abule', 'Preye', 'Abule', 'soulchild7ng@yahoo.con', '$2y$10$cHC58C5upppjHtb4jQenQO6TS8a621wPfFW5YoE9f4Yf6uy8Iy4ma', 'uploads/IMG_1196.jpeg', 'Customer', 'Female', '1995-05-22', '2024-05-08 04:33:59'),
(29, 'sonia.currithers', 'Sonia', 'Currithers', 'sowner001@gmail.com', '$2y$10$CjwVnW0m2U85mYYPqcBcYOT/WBKDod4yLhnxNEtitfBksl8VBDIOe', 'uploads/afro-girl-postiche2-darling.jpg', 'Customer', 'Female', '1988-02-11', '2024-05-08 16:04:21'),
(30, 'preye.abule1344', 'Preye', 'Abule', 'soulchild7ng@yahoo.com', '$2y$10$Hs3Cc1W7kalOR8ZBcKGQD.iTf9g44tNWfCvqZ7lYI0NM81N6Zndy.', 'uploads/IMG_1255.jpeg', 'Customer', 'Female', '2024-05-24', '2024-05-10 22:11:56'),
(31, 'preye.abule3820', 'Preye', 'Abule', 'craftlifephc@gmail.com', '$2y$10$rWr/APnYg.juy/9fgIfOTOQQwbIgMPE8/HhY.sVEkIsbTJve1GeZG', 'uploads/image.jpg', 'Customer', 'Female', '2024-05-07', '2024-05-10 22:14:47'),
(32, 'edvani .lemos', 'Edvani ', 'Lemos', 'edbatista0737@gmail.com', '$2y$10$xTOEUVO8/Fv8JvkEHbJpjeTvlWrkhjy.28oGKR9TvJDvovxMOUlju', 'uploads/IMG_0014_Original.jpeg', 'Customer', 'Female', '1969-11-07', '2024-05-11 04:16:41'),
(33, 'lusanda.jakavula', 'LUSANDA', 'JAKAVULA', 'lusandad@gmail.com', '$2y$10$R1InYCjs8CtLGqnKqydsmeaRFaLYilnFiGcD4ym4hfustrMrMvFiW', 'uploads/IMG_7737.jpeg', 'Customer', 'Female', '1978-04-09', '2024-05-11 18:05:39'),
(34, 'yolanda .l', 'Yolanda ', 'L', 'yelivingston@gmail.com', '$2y$10$i/VHt5CPxaTFmhHFg8AZcugETxiQ59NAC4PifeCZ4JJBmDGi9nAlC', 'uploads/IMG_7290.jpeg', 'Customer', 'Female', '1971-05-30', '2024-05-17 14:53:45'),
(35, 'monica .allen', 'Monica ', 'Allen', 'droidmonica@gmail.com', '$2y$10$gRVlG/T6jg4.BNUnxeSjheisdJ8b9rEa8FKBNPbc/Tq1aCaPEW5La', 'uploads/IMG_5163.jpeg', 'Customer', 'Female', '1981-02-28', '2024-05-22 04:29:19'),
(36, 'nomfundo .zindela', 'Nomfundo ', 'Zindela', 'zindela@icloud.com', '$2y$10$1ZX2mDzz6CKlt8.3miQoLuQFJU96ZjJea0UTB2hrpGyu.mJ4mH8xm', 'uploads/6C06B349-1A77-43C2-99D7-089149031369.jpeg', 'Customer', 'Female', '1990-08-10', '2024-05-25 05:40:47'),
(37, 'zingcwele .songelwa', 'Zingcwele ', 'Songelwa', 'zingcwelesongelwa@gmail.com', '$2y$10$OS1zcWeA1.Wgc9t5esxRbOsAmT83IdszN0x.JGoI.gM7SOAGmpW9O', 'uploads/5139BA99-F489-4A0B-A9C3-C441CE22995A.jpeg', 'Customer', 'Female', '1992-05-08', '2024-05-28 08:29:26'),
(38, 'zingcwele.songelwa', 'ZINGCWELE', 'SONGELWA', 'zingcwele.songelwa@drdar.gov.za', '$2y$10$o52CZV7j0cnwIf9ZGGwwOeT2y/TRuX7RFNtFsF6b0sTUN20Fj7OY.', 'uploads/6900E0ED-9CE2-4F93-A729-9D29FF864B39.jpeg', 'Customer', 'Female', '1992-05-08', '2024-05-28 08:35:29'),
(39, 'sunde.daniels', 'Sunde', 'Daniels', 'sunde.w.daniels@gmail.com', '$2y$10$6Cxox0HVu84dvoHNDTfO8./.O./SnCoDqI8Hnko7uNAAqW20/xwWW', 'uploads/20240522_183927.jpeg', 'Customer', 'Female', '1977-02-10', '2024-05-29 12:32:58'),
(40, 'adebisi.shonekan', 'Adebisi', 'Shonekan', 'bisi.shonekan@gmail.com', '$2y$10$h9rZ1zIbKXsWyljeVnOz.eAdMV0KBowgbQPDX.o3RGWDHrgX3lXb6', 'uploads/IMG_1876.jpeg', 'Customer', 'Female', '1975-02-21', '2024-05-29 17:06:47'),
(41, 'latonya.curtis', 'LaTonya', 'Curtis', 'latonya_curtis@hotmail.com', '$2y$10$dH0PpBYEZ8FMeqgUHIjRxO4BCqRLzi59luyNt9Ipf6VQBz9qxnIMi', 'uploads/IMG_9259.jpeg', 'Customer', 'Female', '1969-07-18', '2024-05-31 13:58:19'),
(42, 'scheepers .m', 'scheepers ', 'm', 'matsheposcheepers@gmail.com', '$2y$10$Atpkik1P.M9Xw4EgMS7njegVHdfrh9GF2.2ZM6G9Gf.lJ5xrqivMy', 'uploads/54D59ABE-301B-4301-A30F-2C6468BA8E2E.jpeg', 'Customer', 'Female', '1987-06-02', '2024-06-01 06:13:47'),
(43, 'ntombizodwa.ngqokotya', 'Ntombizodwa', 'Ngqokotya', 'pngqokotya@yahoo.com', '$2y$10$6sMlo0pdBVfemHWf3ASQcekiRZz4sGSmnG3Wd701AZHxe.i0epctm', 'uploads/IMG-20240604-WA0003.jpg', 'Customer', 'Female', '1989-02-14', '2024-06-04 06:56:24'),
(44, 'yandisa .ngesi', 'Yandisa ', 'Ngesi', 'yandisamn@gmail.com', '$2y$10$l38AacFRjluRCthqZIylAu7QYtqSQ6gtcDq1c3/rxO2mtur3MHQ3a', 'uploads/IMG-20230525-WA0021.jpg', 'Customer', 'Female', '1983-11-30', '2024-06-11 15:27:32'),
(45, 'zamokuhle.gqweta', 'Zamokuhle', 'Gqweta', 'zamokuhle44@gmail.com', '$2y$10$wHIi06AxUG/72sfIroJcpOlMknE93dcC4KL4RxLQujTyZIlNY3MEe', '', 'Customer', 'Female', '1997-03-26', '2024-06-15 14:30:39'),
(46, 'mmathapelo .mtshwene', 'Mmathapelo ', 'Mtshwene', 'omphileey05@icloud.com', '$2y$10$NeHa2zXQ6ApqD4aeWZ3qCO0ohoCSrKfbY4DAOOvXJgV2S6hPc4B12', 'uploads/IMG_8428.jpeg', 'Customer', 'Female', '1994-03-26', '2024-06-15 22:35:59'),
(47, 'siphokazi .lusithi', 'Siphokazi ', 'Lusithi', 'spokazmani@gmail.com', '$2y$10$zjEM4ayppSVEidDVVOSiOuY00eBm5eY3jiRS0aCkuG8fn7ZDh.b/i', 'uploads/5fd1ddc5-1ac2-4997-9e7e-74513f8e17de.jpeg', 'Customer', 'Female', '1986-07-19', '2024-06-17 15:21:51'),
(48, 'aphelele .zinja', 'Aphelele ', 'Zinja', 'aphelelemelyiisa@gmail.com', '$2y$10$9bHShQQGUD3StcKe9l/sBONvrGEWzI7XZYwi4QpMt6zQKKidYLcc.', 'uploads/IMG_4347.jpeg', 'Customer', 'Female', '1999-02-20', '2024-06-20 12:05:57'),
(49, 'maria.nashapi', 'Maria', 'Nashapi', 'maria.nashapi@gmail.com', '$2y$10$Q8Yk4D.C1zfRc7TQbg/MJ.Y4y3zVcuAnmFe6n7gWH.goo6DQh//vi', 'uploads/208D8E14-69E6-42B3-8CFF-7F0D2E3F7B54.jpeg', 'Customer', 'Female', '1986-11-01', '2024-06-21 09:26:23'),
(50, 'claudezex.claudezexti', 'Claudezex', 'ClaudezexTI', 'mccollumrh8evie@gmail.com', '$2y$10$ONJvdGSf7b6Rh239PgClzuSzZ4vlRMF8Rpd8KXUSAqQDO6kO9Rb2.', '', 'Customer', 'Male', '1980-08-03', '2024-06-21 12:38:06'),
(51, 'mbali.ndlovu', 'Mbali', 'Ndlovu', 'mbali83@hotmail.com', '$2y$10$EGi.XLOQ.IMAhFpmI6EFxOrG7NOdU6Q8/2bvSQE8Wdml1so4Igbp2', 'uploads/IMG_4508.jpeg', 'Customer', 'Female', '1983-04-13', '2024-06-23 18:45:57'),
(52, 'siyasanga .mbube', 'Siyasanga ', 'Mbube', 'siyasangambube@gmail.com', '$2y$10$8ihL5KTUJWsfeyqZ/J3EtOZ6XfPPAWWzYk1SBznR8l57rFL3rq0pK', 'uploads/IMG_3828.jpeg', 'Customer', 'Female', '1995-07-12', '2024-06-25 07:17:17'),
(53, 'lisa.williams', 'Lisa', 'Williams', 'll01willi@gmail.com', '$2y$10$FesKfkNQhG/w7e0EHcbWH.aVXbgWgqAbLxkinFI43T8T/E1dlCP8q', 'uploads/IMG_6068.jpeg', 'Customer', 'Female', '1977-07-27', '2024-06-26 17:48:19'),
(54, 'vee.m', 'Vee', 'M', 'msutwana.vuyiseka@gmail.com', '$2y$10$2zQVVGbJAZfwGAMkXEmq8OmWIrjAbhqRNuSHJ2iWkQsDzLS2zU4x6', 'uploads/IMG_7989.jpeg', 'Customer', 'Female', '1991-04-18', '2024-06-29 16:33:16'),
(55, 'iviwe.komani', 'Iviwe', 'Komani', 'iviwekomani@gmail.com', '$2y$10$Glcn66d9nIL9MrmIM6N3k.nUB2gw23JpzFuY02LKl/IpDKtIJ65kO', 'uploads/7090607586134836230_avatar.png.jpg', 'Customer', 'Female', '1988-04-07', '2024-07-09 00:20:59'),
(56, 'jessierox.jessieroxuz', 'Jessierox', 'JessieroxUZ', 'leslievjponce262@gmail.com', '$2y$10$5ZX1K67xMNJv.4YrNdqcAeGpgCRfD0j9zw6s2.5dHNNouU7raymGi', '', 'Customer', 'Male', '1985-03-04', '2024-07-24 11:14:32'),
(57, 'ntombikayise.qinga', 'Ntombikayise', 'Qinga', 'ntombiqinga@gmail.com', '$2y$10$mRRzJ/YyJeHX7Lv.bK1o4.K4He0/42uHmd7RO0Rrjldf8SCzk3Z2e', 'uploads/image.jpg', 'Customer', 'Female', '1993-09-06', '2024-07-27 18:05:19'),
(58, 'siphokazi.makuzeni', 'Siphokazi', 'Makuzeni', 'samakuzeni@gmail.com', '$2y$10$OQ4.gG6rMJ.NutoyYMppk.q6flegcf7DNKsZdlePrwmTyF8awFsvy', 'uploads/IMG_7399.jpeg', 'Customer', 'Female', '1998-05-27', '2024-07-30 17:46:10'),
(59, 'siphokazi.dick', 'Siphokazi', 'Dick', 'sssibindlana@gmail.com', '$2y$10$m38vlWWUGhlPfXHjCb4O0e9ivjjh79ma1jwDqMAlLqQ.t0aBjOKHu', '', 'Customer', 'Female', '1985-10-18', '2024-07-30 18:32:19'),
(60, 'gosiame .khoele', 'Gosiame ', 'Khoele', 'gosiame.khoele@gmail.com', '$2y$10$syICAE8ekb.o8ILw5h0ngu5lQWo2kIPAivQ5f6ghEfEZvs8g4zgZi', 'uploads/IMG_1298.jpeg', 'Customer', 'Female', '1980-11-30', '2024-08-04 05:11:27'),
(61, 'mijeloyamanzi.mbebe', 'Mijeloyamanzi', 'Mbebe', 'gcasambasimbulele@gmail.com', '$2y$10$65jLa6iOp6ljjOSZmp/IJO52jVn1Zz4xqf790LauuwvWlUVEX475i', 'uploads/InShot_20240616_151837034.jpg', 'Customer', 'Female', '1996-09-05', '2024-08-04 10:00:32'),
(62, 'ronaldgok.ronaldgokkl', 'RonaldGok', 'RonaldGokKL', 'wilks.all427@gmail.com', '$2y$10$UqKhg0oImnP1rObBatTFRe7ZDXfJQcEg2t2ew.l869LsiNA1M6pVa', '', 'Customer', 'Male', '1988-03-04', '2024-08-08 23:06:25'),
(63, 'kamvelihle.mankayi', 'Kamvelihle', 'Mankayi', 'kamvelihlemankayi@gmail.com', '$2y$10$RPi6sEQEOx/USriRH.wipu6hXAN37rlhucrztTZbveQKk3bylC65q', 'uploads/43AFCBC7-3FB1-42A7-A333-6CE0BE0B9817.jpeg', 'Customer', 'Female', '2003-05-31', '2024-08-10 14:14:04'),
(64, 'zoliswa.sifolo', 'Zoliswa', 'Sifolo', 'zsifolo85@gmail.com', '$2y$10$rnzX9bzgBWTHFkSjVYbq5u13xXOS.bIkIyGnRU5SCNA8iycFDKWqq', 'uploads/inbound23733912788497327.jpg', 'Customer', 'Female', '1985-08-31', '2024-08-20 17:36:41'),
(65, 'felipecreen.felipecreenxo', 'Felipecreen', 'FelipecreenXO', 'fanning.co65@gmail.com', '$2y$10$wiC.NJ3q.KcqSvQTyluu0eBbXoK0zudPkHmTYy0AX8HShpRRkN1.S', '', 'Customer', 'Male', '1982-03-02', '2024-08-22 12:32:02'),
(66, 'lwandisa.pinyana', 'Lwandisa', 'Pinyana', 'pinyanalwandisa@yahoo.com', '$2y$10$3Xbhn9s./9934fG6U6QC0O5rWbVjXvoX9GZYdQECG2lK7/4WuViAi', 'uploads/3A1C0F3B-73B4-40F0-8F8E-7C591D18BD53.jpeg', 'Customer', 'Female', '1990-08-07', '2024-08-26 12:03:13'),
(67, 'adrianton.adriantonaz', 'Adrianton', 'AdriantonAZ', 'vic75chiu@gmail.com', '$2y$10$dnVr9L0gywo74/.YZ8oOYed7UwflYJdvZfuVv0z7g0Mf.SKDoOb/q', '', 'Customer', 'Male', '1980-04-03', '2024-08-27 19:41:35'),
(68, 'vuyiseka.masiku', 'Vuyiseka', 'MASIKU', 'vuyiseka274@gmail.com', '$2y$10$QqSp4Twqv3MXH5BgosVqK.iW1bgdNsYQoCFIC/Bw9zm6ydvvGWND6', 'uploads/IMG-20240418-WA0225(1).jpg', 'Customer', 'Female', '1999-11-26', '2024-08-28 01:48:14'),
(69, 'khanyisa .captein', 'Khanyisa ', 'Captein', 'ndalo.captein@gmail.com', '$2y$10$3PmCNYnGPHIO9359oUwntu299jkiR1eWSkfbDLdGmQuj0MGRh90UG', 'uploads/inbound8908681219742365373.jpg', 'Customer', 'Female', '1987-01-31', '2024-08-31 07:58:45'),
(70, 'ronaldlix.ronaldlixdx', 'RonaldLix', 'RonaldLixDX', 'jomobekem682@gmail.com', '$2y$10$rKOLkG0ZzDntWCM3jJG0u.mNXgywA9u7l/hEGE/RO0hvz46NVn7dC', '', 'Customer', 'Male', '1987-08-06', '2024-09-02 00:36:23'),
(71, 'sinakho.nqoma', 'Sinakho', 'Nqoma', 'sinakhonqoma@gmail.com', '$2y$10$fD5abIwrhX3vbvwD72mXGuRT7D388j5283ma.E1N8nnDNXdBe8zQO', 'uploads/inbound4995188179245760807.jpg', 'Customer', 'Female', '1985-12-13', '2024-09-04 16:35:00'),
(72, 'williambub.williambubkh', 'Williambub', 'WilliambubKH', 'wesiped172@gmail.com', '$2y$10$Pt6ne7lvq1qw1VQ6nnzaaOTr7bKAaPtLyHOBt0sVA1f5hrkBzSQaC', '', 'Customer', 'Male', '1980-05-00', '2024-09-10 14:03:57'),
(73, 'phumeza.mquqo', 'Phumeza', 'Mquqo', 'nginaseakhona@gmail.com', '$2y$10$gvc6Hk8Rh/n3oo5LmPI1n.3CzfHN6mnLZ42VEvG.9iyuHPE5NKj6S', 'uploads/IMG_8517.jpeg', 'Customer', 'Female', '1977-09-19', '2024-09-15 13:54:55'),
(74, 'lutho.madlulela', 'Lutho', 'Madlulela', 'Lmadlulela@yahoo.com', '$2y$10$7XfKQAria3g1jTHpzpculeTYaZs2HbKl89p.zPTry7SgN5WjFiRwS', 'uploads/IMG_4807.jpeg', 'Customer', 'Female', '2000-02-03', '2024-09-27 02:28:03'),
(75, 'sixolo.sinoxolo', 'Sixolo', 'Sinoxolo', 'sinoxsixolo@gmail.com', '$2y$10$Fm2It71odKmsftjzx1UzGushFZw1dgrN6puQEJND7SrNmfgwrB6L2', 'uploads/IMG_4350.jpeg', 'Customer', 'Female', '1995-01-22', '2024-09-28 11:16:01'),
(76, 'nana.mshumpela', 'Nana', 'Mshumpela', 'unathiylbf@gmail.com', '$2y$10$o.aoRtT0q7LIMf/A1C3AX.4PgJ5esgpjAe7zJS9d3rrIzT/t2/8B2', 'uploads/acca92b7-3d8b-488f-a0ee-807df879ee95.jpeg', 'Customer', 'Female', '2002-02-09', '2024-10-10 19:17:07'),
(77, 'tabisa .mrwebi', 'Tabisa ', 'Mrwebi', 'mrwebitabisa@yahoo.com', '$2y$10$TC1nJX2M6q4Ol8fPTBKawOOflg.KFtMQeJnHrRWk886mqQc77WBrO', 'uploads/IMG_9653.jpeg', 'Customer', 'Female', '1985-07-06', '2024-10-15 11:39:39'),
(78, 'sinovuyo.silo', 'Sinovuyo', 'Silo', 'sinovuyosilo@gmail.com', '$2y$10$Rx5C1O5AUp89lYrFlLAKS.UzKLEyq8s2CPFDYON/udcYGcXW5..LG', 'uploads/20241021_185222.jpg', 'Customer', 'Female', '1988-10-26', '2024-10-24 17:20:16'),
(79, 'zizipho.j', 'Zizipho', 'J', 'zizipoj@gmail.com', '$2y$10$ppYafURO1DkbeViBjDl45enlsdqGWC2ukIbPwGgY38rZZu3CcN36u', 'uploads/inbound3777476958757234783.jpg', 'Customer', 'Female', '1990-02-02', '2024-11-09 05:33:16'),
(80, 'avela .tsotetsi', 'Avela ', 'Tsotetsi', 'mvikoavela@gmail.com', '$2y$10$1SLN9isHwAsHKrnrTvZXP.ffJrNpdeVLkyINL5/C2m9ZFhtsJRg/a', 'uploads/inbound5284233923730189434.jpg', 'Customer', 'Female', '1983-06-27', '2024-11-30 01:29:20'),
(81, 'silindokuhle .nyezi', 'Silindokuhle ', 'Nyezi', 'kwanisilindokuhle@gmail.com', '$2y$10$57ugDVWWM.QRGQgV.o75E.U6WDeZoeNPt28eKbo9wTZhHiJbfpKyG', 'uploads/IMG_8606.jpeg', 'Customer', 'Female', '1993-01-24', '2024-12-05 14:48:25'),
(82, 'kuhle.cweba', 'Kuhle', 'Cweba', 'cwebakuhle@gmail.com', '$2y$10$afWK5AzMUs4XhsEIyQuxTOGQyNUnt3QDUwTwLyS1jHDSgoiQ08GM2', 'uploads/WhatsApp Image 2024-11-02 at 11.31.31_2adb4daa.jpg', 'Customer', 'Female', '2007-03-23', '2024-12-07 06:15:12'),
(83, 'khanyisani.madikane', 'Khanyisani', 'Madikane', 'khnyii@gmail.com', '$2y$10$gR4ECZJPf23REdCrDQwwL.E7WO7OPwgg0wl9xHMIQ6K8HUUyfR8pq', 'uploads/image.jpg', 'Customer', 'Female', '2002-09-30', '2024-12-11 07:31:21'),
(84, 'noza.jack', 'Noza', 'Jack', 'nozajack92@gmail.com', '$2y$10$5wyx2MhQsQ1lFJLyT86xNOqpQqQzn7s/naDHLD5.JWtOIpv4lK95q', 'uploads/Snapchat-1320235519.jpg', 'Customer', 'Female', '2007-04-18', '2024-12-11 08:18:29'),
(85, 'douglasbug.douglasbugic', 'Douglasbug', 'DouglasbugIC', 'inutowohig175@gmail.com', '$2y$10$xAhS/XT9Qs0MOoyJZzTOx.p.0j26c92/sPk9F6cgE5WZAQgPHSPDe', '', 'Customer', 'Male', '1985-00-03', '2024-12-18 06:39:36'),
(86, 'andisiwe.yali', 'Andisiwe', 'Yali', '9aandisiweyali@gmail.com', '$2y$10$0GZpF95P.wo/9kX0640WWePHeN5n09m8NDEuAqf/Afh5.U9zCpAES', 'uploads/IMG_0017.jpeg', 'Customer', 'Female', '1999-06-18', '2024-12-18 08:37:51'),
(87, 'akahlulwa.nxavipi', 'Akahlulwa', 'Nxavipi', 'akahlulwa1@gmail.com', '$2y$10$w4OATyA8HMcB.Gg2FhLyvuriRmJ9rAukWNRbvF6IuQTXI1306gOL.', 'uploads/1737754519_male.png', 'Customer', 'Male', '2025-03-18', '2025-03-18 19:29:30'),
(97, 'customer.customers', 'Customer', 'Customers', 'customers@gmail.com', '$2y$10$8goKEZ2nXFOboIMojywahud4lad7A5xuqUqaHyw/NSlI0sS.899ku', 'uploads/IMG-20241222-WA0000.png', 'Customer', 'Female', '2025-04-17', '2025-04-04 06:47:24'),
(98, 'asavela.ntshwanti2212', 'Asavela', 'Ntshwanti', 'asavelan302@gmail.com', '$2y$10$Jbnjmi/HXS92ZL3MQCSToOTwEIP3swwZdGnDC4/PgomzA8TCdH2BO', 'uploads/IMG_8136.jpeg', 'Customer', 'Female', '1987-07-20', '2025-07-20 16:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(130) NOT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `reply` varchar(120) DEFAULT 'Pending',
  `user_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `salon_id` varchar(60) DEFAULT NULL,
  `public_holidays` varchar(20) DEFAULT NULL,
  `mondays_sundays` varchar(20) DEFAULT NULL,
  `sundays` varchar(10) DEFAULT NULL,
  `public_holidays_time` varchar(20) DEFAULT NULL,
  `mondays_sundays_time` varchar(20) DEFAULT NULL,
  `sundays_time` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `user_id`, `salon_id`, `public_holidays`, `mondays_sundays`, `sundays`, `public_holidays_time`, `mondays_sundays_time`, `sundays_time`, `date`) VALUES
(1, 'sinethemba.nxavipi', 'nNX6J17V632jXwc6wTyO44Fk2so7MBhk5OqVH2ds9IGD8dgV6bAhiuk9ltYr', 'Public Holidays', 'Monday - Saturday', 'Sundays', '09:00 - 15:00', '08:30 - 17:30', '11:00 - 16:00', '2025-07-16 10:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `service_id` varchar(60) DEFAULT NULL,
  `salon_id` varchar(60) DEFAULT NULL,
  `services` varchar(60) DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `user_id`, `service_id`, `salon_id`, `services`, `image`, `date`) VALUES
(1, 'sinethemba.nxavipi', '1551563', 'NmYHnH6o6TMWcx2zn0bi9jCp0FFkFmVQNz2Hug4syrUOqFpTwxp8v7bCl5Zj', 'Beauty', 'uploads/foot-massage.jpg', '2024-02-02 06:27:44'),
(2, 'sinethemba.nxavipi', '6456016', 'NmYHnH6o6TMWcx2zn0bi9jCp0FFkFmVQNz2Hug4syrUOqFpTwxp8v7bCl5Zj', 'Hair', 'uploads/makeover.jpg', '2024-02-02 06:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `salons`
--

CREATE TABLE `salons` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `salon_id` varchar(60) DEFAULT NULL,
  `store_name` varchar(60) DEFAULT NULL,
  `store_phone` varchar(60) DEFAULT NULL,
  `store_email` varchar(1025) DEFAULT NULL,
  `store_address` text DEFAULT NULL,
  `store_owner` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `user_image` varchar(1024) DEFAULT NULL,
  `slider` varchar(1025) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salons`
--

INSERT INTO `salons` (`id`, `user_id`, `salon_id`, `store_name`, `store_phone`, `store_email`, `store_address`, `store_owner`, `city`, `state`, `country`, `postal_code`, `description`, `image`, `user_image`, `slider`, `date`) VALUES
(1, 'sinethemba.nxavipi', 'NmYHnH6o6TMWcx2zn0bi9jCp0FFkFmVQNz2Hug4syrUOqFpTwxp8v7bCl5Zj', 'DataSync', '+27 87 654 2345', 'admin@bookings.co.za', '663 Ndevana', 'Sinethemba Nxayiphi', 'King Williams Town', 'Eastern Cape', 'South Africa', '7844', 'DataSync is a 100% black owned business that provides taylor made Website services. We are a leading Web development company servicing a highly differentiated market. DataSync provides quality services to best suite our client\'s needs. We offer a high-end personalized client experience for all clients by using the highest quality products for all projects offered by our highly qualified, skilled and professional developers. We pride ourselves in ensuring that whichever service we offer it is of high quality and will contribute to the overall satisfaction of our clients', 'uploads/1753034961_Asset10.png', 'uploads/1753450447_1718988404472.jpg', 'uploads/1753034961_Asset10.png', '2024-01-14 14:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `salon_services`
--

CREATE TABLE `salon_services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `service_id` varchar(60) DEFAULT NULL,
  `main_service` varchar(225) DEFAULT NULL,
  `service` varchar(60) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `service_name` varchar(60) DEFAULT NULL,
  `price1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `small` varchar(5) DEFAULT NULL,
  `medium` varchar(6) DEFAULT NULL,
  `large` varchar(5) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salon_services`
--

INSERT INTO `salon_services` (`id`, `user_id`, `service_id`, `main_service`, `service`, `name`, `service_name`, `price1`, `price2`, `price3`, `small`, `medium`, `large`, `date`) VALUES
(1, 'sinethemba.nxavipi', 'p4wLaVwIjf6ybZBAXgcZEgtdFuAeYaV8glSsCRKC1cZElN6jWMAEFPWz2FPP', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Relaxer', '540.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 09:50:43'),
(2, 'sinethemba.nxavipi', 'ZqUbrEAiz1Eat5DoqYKSxzkbT9XdadQgJp4McaWZ2HObNtjTvF7eBxU4PAid', 'Hair', 'Hairdressing', 'Olive Oil', 'Relaxer', '500.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:20:16'),
(3, 'sinethemba.nxavipi', 'rn7rfM47zubOd5ZMRiu0KF12LZtEzjhMVJSQxC0k7JReCnePHZvMzUf5veWt', 'Hair', 'Hairdressing', 'Afika M Hair Care', 'Moisture Spray', '250.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:20:50'),
(4, 'sinethemba.nxavipi', '7hFnhwgChdDua7p7uGDwWefwqS2S6we2yLCeyfzuZS330z82kBZRDpvooBEl', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Relaxer, Cut, Blowave & Iron', '890.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:27:05'),
(5, 'sinethemba.nxavipi', 'CpylqK5bFyM6S7pjBWpqvM1qKGRrJ9yzf1HpyHqKBnTYlrgtlv847ywm17xZ', 'Hair', 'Hairdressing', 'Mizani After Care', 'Shine Extent', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:27:48'),
(6, 'sinethemba.nxavipi', '7mb3Vm7DigAC9qo94chLXmrq34VVepUwyEn7NyeK8DhmJUWAC8KdxeeYMYso', 'Hair', 'Wig Bar', 'Wig Services', 'Wig Making', '850.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:42:20'),
(7, 'sinethemba.nxavipi', 'JAxytQYo8Vi6UyCVYm5dOmF4Ttx7ls8YTdzE54MZd2n7zOVwTIiAjHQEIJrM', 'Hair', 'Wig Bar', 'Installation', 'Wig Lines', '170.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:42:49'),
(8, 'sinethemba.nxavipi', '89hgOYHorpwx18qmkCVnPIbv9VrtFdEWEMcq0q5b6n7wMgCUdTQk7YnhqEH4', 'Hair', 'Wig Bar', 'Wig Treat', 'Pixie Curly 8\" Or Shorter', '250.00', '50.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:43:42'),
(9, 'sinethemba.nxavipi', 'szaheJsJAIIOIwhmukqXU6DezROQsF1s6THuQoBGDJjWfK3MWiZtrcf7HODA', 'Hair', 'Wig Bar', 'Wig Colouring', '8\" Wig Or Shorter', '600.00', '40.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:44:34'),
(10, 'sinethemba.nxavipi', 'J0LhcgMyT8JkVhsZfgpWO3WOtWbChaMMMlyeA2FrLGZFxsXtSxwrdHsUNrN6', 'Hair', 'Wig Bar', 'Weaving', 'Weaving with Hair Out', '690.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:48:19'),
(11, 'sinethemba.nxavipi', 'VtKvu1V25zrn8oHCHYzNHkzQmbSYSpZ1Ji6O1roDbfF8afk6hXXkcjsYknDr', 'Hair', 'Wig Bar', 'Wig Blowave, Iron, & Curling', '8\" or Shorter', '280.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 14:48:56'),
(12, 'sinethemba.nxavipi', '7wG6UajFdSEmj4sP7gB1dUweCListlzhpeJ4iRNMKuqlliaih3S6mAA5tIfg', 'Hair', 'Plaits & Braids', 'Take Off', 'Plaits', '90.00', '150.00', '0.00', NULL, NULL, NULL, '2024-02-02 15:10:27'),
(13, 'sinethemba.nxavipi', 'KhQIwtZxkXGgUqoW32Z6ybpzx8U5m9NbZPpqbCq6KC29CDXY4Db7FgQjdjxV', 'Hair', 'Plaits & Braids', 'Natural Plaits (Excl Extentions)', 'Straight Back', '500.00', '440.00', '320.00', 'Small', 'Medium', 'Large', '2024-02-02 15:13:18'),
(14, 'sinethemba.nxavipi', 'UR0jVKVFvBBHKG95ZvImaVXmP0A5uflBmpfHY7NQKHKofMPc3IjK3KkxUjti', 'Hair', 'Plaits & Braids', 'Hair', 'Braids/Twist', '2750.00', '2380.00', '2130.00', 'Small', 'Medium', 'Large', '2024-02-02 15:15:56'),
(15, 'sinethemba.nxavipi', 'afiBEeRFfKXts4eNUqSjvm2g20svJKhXm55r5u9mBUlIfArQXxKl4cS6t97s', 'Hair', 'Plaits & Braids', 'Microbonding', 'Full Head', '2800.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 15:16:31'),
(16, 'sinethemba.nxavipi', 'hgVSNoDP833gD1Blbejs0LLSUhskDzYo7asFsddDbcDqysf703jAbP2sIZLQ', 'Hair', 'Plaits & Braids', 'Hair Accessories', 'Wig Bags', '190.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-02 15:16:57'),
(17, 'sinethemba.nxavipi', '5x5eJ7BmUblegFUWFicMpY9qWW7erZmyWXo6ZJXMSkGJJSEHZnycAVRf5gSC', 'Beauty', 'Nails', 'Gel Nails', 'Gel Overlay', '290.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 15:50:13'),
(18, 'sinethemba.nxavipi', 'Q02wboleD8heIyfGbzaTsHaFprMGnqO33PN0VxJXBO1deLKdMXStNoj3ajaP', 'Beauty', 'Nails', 'Repair', 'One Nail (With tips)', '40.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:06:22'),
(19, 'sinethemba.nxavipi', 'SACjIHe94zPBuGfpYk9iPRYYPRIXSaXJ617pnWAB5hCBpKFjTQOyUfmbuApk', 'Beauty', 'Nails', 'Ladies Manicure', 'Full Manicure', '230.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:06:53'),
(20, 'sinethemba.nxavipi', 'HPJttpsaMhn317QSdvMXfLGDnlXnByplgkuEJ5OuSy1P3IUMHsaj0WaRMafE', 'Beauty', 'Nails', 'Ladies Pedicure', 'Full Pedicure', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:07:40'),
(21, 'sinethemba.nxavipi', 'ibJcD6TFvOVXDy4qyQizgp3VcPQ4JTBCxaRuUNqmvwgMAvbiB4XcRZ6KElOE', 'Beauty', 'Nails', 'Male Grooming', 'Ear Wax', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:08:13'),
(22, 'sinethemba.nxavipi', 'hxkYXDFnzyEBKwimtDSAYfYwUt2SGIOfBjEAyqI6SxxYOS1A1R8pjoUptOA9', 'Beauty', 'Nails', 'Express Hands & Feet', 'Buff & Polish', '150.00', '120.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:09:09'),
(23, 'sinethemba.nxavipi', 'YsfGgQPk491R9ICY8BckQCDji9ZWr3U6ebP07ayuQuhz7PbUeVfnAXu0c4iM', 'Beauty', 'Kiddies', 'Massages', 'Full Body Massage (45 min)', '280.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:10:55'),
(24, 'sinethemba.nxavipi', 'i8XjwsKhgGlukxHPNokMlDtqh0THZwl2FYdHfCQoVhOJK3HA7WtMI5qXrW5g', 'Beauty', 'Kiddies', 'Mini Manis & Pedis', 'Manicure Treat', '200.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:11:45'),
(25, 'sinethemba.nxavipi', '8oVOLcPsSC7b0uks71bf7aJdW2aLqo7UjR1KBcUav0yx2sBeyuySYVakQGhL', 'Beauty', 'Kiddies', 'Natural Make-up', 'Soft Glam', '250.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:12:17'),
(26, 'sinethemba.nxavipi', 'neQyUG43khZkBPrZSG17c24zEGFY7aNc6ttWTqFAtt8tPfeBhV0N3iC68SjO', 'Beauty', 'Elderly', 'Elderly Mondays', '(Elderly Mondays) 10% Off Prices For Pensioners', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:13:20'),
(27, 'sinethemba.nxavipi', 'ndu0h3PMhXPLOydbKXqqzXm7PTushsnK9crTFRY1Dsph7JsgcGlyy4X3OsnO', 'Beauty', 'Face & Body', 'Facial Therapy', 'Deep Cleansing (1 hour)', '380.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:14:38'),
(28, 'sinethemba.nxavipi', 'v4lRTMTOSHAMWEdF9zOcOgsUTzJBVBekxVJZnIu0K0C8mJzPFnDqBsQzeKoM', 'Beauty', 'Face & Body', 'Body Therapy', 'Back, Neck & Shoulder Massage (30 min)', '320.00', '370.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:15:56'),
(29, 'sinethemba.nxavipi', 'gt9ATXtEidAeMBn4DPjSvU1pXuqzQYUhKqXQfiP9P1n8pe3qlC1zzlQnONOi', 'Beauty', 'Face & Body', 'Waxing', 'Brow Shape', '90.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:16:26'),
(30, 'sinethemba.nxavipi', 'Nug8fWcU7NfT42ecAM6KbuHITXpivNcpLBBfjnsrE0L0oTYsDIEE1RF7UdSW', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Eyebrow Shaping - Blade', '60.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:17:16'),
(31, 'sinethemba.nxavipi', 'JWPcHdjDDbSM37ClUrW1ti6zASl8OvgKfVEHI4pt80L5pxZdjTcESeDdRbpk', 'Beauty', 'Face & Body', 'Threading', 'Eyebrow Threading', '90.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:17:53'),
(32, 'sinethemba.nxavipi', 'EH7Z2eg3F3J2sAD9JxQcS49FKK5LPOHmle2hBxGyYyAbzM44wZv6WrwU6lIm', 'Beauty', 'Face & Body', 'Semi Permanent Make-up', 'Microshading (Inc 6 Weeks Touch Up)', '2100.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:19:01'),
(33, 'sinethemba.nxavipi', 'ayR1inEALyx7YbSoNQqMuS3ZEnu9hvVOiYfZFWoCh05XEQuvdw3ahGETBL9r', 'Beauty', 'Face & Body', 'Make-up', 'Magnetic Liquid Eyeliner', '190.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:41:31'),
(34, 'sinethemba.nxavipi', 'bojHjGlSwFpKG9n126L1zkzlXVnmggRXqJGVDYFc6F0f758VhPcF88FbrHYO', 'Beauty', 'Face & Body', 'Make-up Products', 'Lipliner', '50.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:41:58'),
(35, 'sinethemba.nxavipi', '09YA0VfV2QnW3I3lQPYNW0wyff0ecXaR6bJTKG2BQyNijdHPpvqFk7kh3ibX', 'Beauty', 'Packages', 'De-Congestion Treatment', 'Back & Neck Massage & De-Composition', '380.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:43:04'),
(36, 'sinethemba.nxavipi', 'qqQF3gvE57Y6AV4N5GD080ZJZxKU2oqHvYS1PQD3eeWG2jSPOwvUHBjiZbNV', 'Beauty', 'Packages', 'Body Waxing Delux', 'Eyebrow Wax', '500.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:43:52'),
(37, 'sinethemba.nxavipi', '3m4bXDSk6lzG9DFkVt5HITLShIzHQBobifbmsgR7DPu843xqduwPVeFCbd0J', 'Beauty', 'Packages', 'Express Treatment', 'Back & Neck Massage', '700.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:44:20'),
(38, 'sinethemba.nxavipi', 'rNR0El4E6FeE6vspt2f38jnpmyoyuYZ3QltmcoifTWvvb0p6Gvomk6CwJPoF', 'Beauty', 'Packages', 'Afika M Luxury Treat', 'Full Body Massage', '1100.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:45:35'),
(39, 'sinethemba.nxavipi', 'UFqfnPphgomUKCuhthyetpjNwJf8EhY1aiMweIu766rZuu42VegXoUSRnsGC', 'Beauty', 'Packages', 'Birthday Package', 'Deep Cleansing Facial', '1350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:46:11'),
(40, 'sinethemba.nxavipi', 'oeqQEKEgovKoKSdSTFy1j0q5l9Vl14cixAZkWtYSnjRlDd12QoNiJFmDYQrC', 'Beauty', 'Packages', 'Bestie Package (2 People)', 'Pedicure', '2300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:46:44'),
(41, 'sinethemba.nxavipi', 'q4A4wFBns9lf1ZkHHbFwRyr9qurhl6u4LD14fgh1T6MTe1TeJhBi0GM8ZAvQ', 'Beauty', 'Packages', 'Couples Treatments (2 People)', 'Full Body Massage', '2500.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:49:31'),
(43, 'sinethemba.nxavipi', 'exAwLlOJjnZGFTDQOwPTOoGKxhBLbaw5VRPmCF6ZhXs23Ihyled1SutBNCJy', 'Beauty', 'Packages', 'Coporate Packages (Silver Package)', 'Express Neck & Shoulder Massage', '450.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:51:20'),
(44, 'sinethemba.nxavipi', '1uQji4pFKJxGFZGmvXslCO33oMHakTw8LM3ny8ZJ0O2hiem6fDd0WwtRDKEu', 'Beauty', 'Packages', 'Coporate Packages (Gold Package)', 'Back & Neck Massage', '1000.00', '0.00', '0.00', NULL, NULL, NULL, '2024-02-03 16:51:52'),
(45, 'asavela.ntshwanti', 'MUNYuZUvtMlgFtEAQ0y7LMzvbllXPoHOw4rXdobMSxkrBhfqLMjRf6dxl1rc', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Individual Leshes', '550.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 12:55:42'),
(48, 'asavela.ntshwanti', 'hx9vf5KogVwUjmfw0ibIqpl14izP4EEQmO9yQ5iPVHVXqb9uAJg4r2lW3yDT', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Dual Leshes ', '450.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 12:58:36'),
(49, 'asavela.ntshwanti', 'DuFln7pJvx5JwkGsF37XP8UUqVlKlDfVHYKjz5OcCZQth6dnDandXn6wDN2g', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Strips Leshes ', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:00:42'),
(50, 'asavela.ntshwanti', 'rjgw8rdiliOFdubNMEwDmbmKh9Q2FSeAS13NEfn35x1vEzv4qnzsymDpm1oW', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Sensitive Relaxer ', '600.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:42:18'),
(51, 'asavela.ntshwanti', 'KgpdcFuAuKvPvJCjHugUDFpVrUHZyHusGCBxQTLf72e9RC5jZqC4WLDwVPt5', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Wash', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:44:12'),
(52, 'asavela.ntshwanti', 's7aPIr6KAOeVrJzaueeVqRK1qYHnZ6LeUTmmPSlj0pUneVkJN6Kz3hs9nAex', 'Hair', 'Hairdressing', 'Olive Oil', 'Wash ', '290.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:45:10'),
(53, 'asavela.ntshwanti', 'fPaBKK51D8SEl5gWuUSeJAgESwPiJNoreQ6kDRofSj0xAjpQIOLmhTcZ8uOT', 'Hair', 'Hairdressing', 'Mizani', 'Kera/Hydra treat', '400.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:46:18'),
(54, 'asavela.ntshwanti', 'fkMSH3QIkLRTrubmraMoNbE0PDck77926YAFby3tqhly6CjiTKvtlklDdsML', 'Hair', 'Hairdressing', 'Mizani', 'Thermasmooth treat', '480.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:47:08'),
(55, 'asavela.ntshwanti', 'hGi4gnfAxXIrcnk11MDt0ER2jrVj2V21Vlm8ouAoMlTf35kojJh6S9bM7Zch', 'Hair', 'Hairdressing', 'Mizani', 'True texture treat', '480.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:47:38'),
(56, 'asavela.ntshwanti', 'MCThTixlASHHAC7ntMGxBJielJkVcsQI7S2cdoQmiFV5VIrVbsRZLzWrN5yj', 'Hair', 'Hairdressing', 'Mizani', 'True texture wash', '380.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:48:09'),
(58, 'asavela.ntshwanti', '8xQoXotzsAuSAQ5oK5yPycOsRFSIqOYR6KTi3yXK01qm3JVhyUCydMh0vq4j', 'Hair', 'Hairdressing', 'Mizani', 'Scalp oil drop', '50.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:49:07'),
(59, 'asavela.ntshwanti', 'zwZ1sLaGKG36ZGfiQrE8ngi5AWXl55olEheYC6Q28ToUs3pfpmE2NNZbD0fF', 'Hair', 'Hairdressing', 'Olive Oil', 'Treatment ', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:51:16'),
(60, 'asavela.ntshwanti', 'NeHvRNfvC1oCOvhLihLxgjp1icEATA0aDNivgMbBZRL7R3sw8i7X2ofChXuB', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Blowave& iron,split ends (R100 as an extra)', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:53:22'),
(61, 'asavela.ntshwanti', 'IZO66FMqGF5ylkf5uzLeGbafxUpHen5CZKIxWAZoN93r1rJZTmwqYihoMHYD', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Blowave & Iron', '120.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:53:58'),
(62, 'asavela.ntshwanti', 'CFqSbmtelAkbtasQOyLGCSrDVOvHUMzmYgAVzDF6TF7L7WY8je7b6ICof3hP', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Split ends only', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:54:31'),
(63, 'asavela.ntshwanti', 'qtivL0IBYXcrxfL7nx595qLrnqnnjpDFor0Edd00tyUSdGwiCw07eWt2P7oF', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Bun (own hair)', '450.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:55:07'),
(64, 'asavela.ntshwanti', 'CGYT5W8Sej3u1wEOCx8wAhTTeVPu26juQb7Acw25t93WTNUYHI5wNR7ysLh7', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Bun ( with our hair)', '600.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:55:38'),
(65, 'asavela.ntshwanti', 'oXnU3H6eR19r8WOigtFpJcgaQSXRQ2fBD0rJ575hQwXpKQYgS05wRqOgxCw1', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Blowave ', '570.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:56:17'),
(66, 'asavela.ntshwanti', 'ZOP5UgcnhXMlBv8zjqzMEZXqM3alkSeY1pI5jj7jeBKm6llR8WP7kS4z4BAp', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Dry perm only', '380.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:56:43'),
(67, 'asavela.ntshwanti', 'w1GT8YTxZUA94oj8Vci3Nbsb2SBYzzuyedmKZPkunVoeVhzT6xPLGhgy88Cw', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Plus dry perm', '190.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:57:10'),
(68, 'asavela.ntshwanti', 'siBSJyCvPdleoMS9SnixLdhakX9F0PSIn5IaufdzuVDju80CoauyfK4k6p5S', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Afro hairstyle', '800.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-02 13:57:33'),
(69, 'asavela.ntshwanti', 'dkWI6GeD5NjEqu9KUnxyrXFvEtK2MWZ732hz9SmSJElMcRRXa2iTFGC3s4Xs', 'Hair', 'Hairdressing', 'Mizani', 'Scalp tonic', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:54:11'),
(70, 'asavela.ntshwanti', 'cMQLBvRp7zR3AmBPuhl1u2QqwhIhixalzCfMDEGN5BR89VyQcl6EJqacwJPG', 'Hair', 'Wig Bar', 'Wig Services', 'Plucking only', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:55:24'),
(71, 'asavela.ntshwanti', 'rcWpWaOAdDio5apBK6MA4ViMZDM1RxPq66sEMzyCTjYADVJnPhjAoZXRTaQc', 'Hair', 'Wig Bar', 'Wig Services', 'Bleaching knots only', '200.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:55:56'),
(72, 'asavela.ntshwanti', 'cG9OXIxab04OSkwtddDlzirKaZBiM5G2Y72hlEODvS8ShJvgkolT7VdIrvuG', 'Hair', 'Wig Bar', 'Wig Services', 'Gutter only', '100.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:56:25'),
(73, 'asavela.ntshwanti', '56jXC8d14DnjFo9Q8aWsOTcjuGZcaHcaIhGd4qTP927CXmz5tmQlkwwRfr5W', 'Hair', 'Wig Bar', 'Wig Services', 'Wig Blowave & Iron', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:57:51'),
(74, 'asavela.ntshwanti', '70Jmtnc4iut1dEHKZIVVjTkCr8h98zgJ6XpfKT3grkxCYEX5M2BTO1kpG2c7', 'Hair', 'Wig Bar', 'Wig Services', 'Blowave & Curl', '420.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:58:31'),
(75, 'asavela.ntshwanti', 'SDStDDI2GcscdMhs2eyTnEDlal7R5qHNeklvMTFVZVcOAwUlbK3dgAWQsM7d', 'Hair', 'Wig Bar', 'Wig Services', 'Wig Style ( including Curling)', '570.00', '820.00', '0.00', NULL, NULL, NULL, '2024-04-08 14:59:58'),
(76, 'asavela.ntshwanti', '8teZE3eXtrPb9cwJUA4arXq2GlUS864wXBkxGdIZkvuXSuqXQMnq9GO8vZva', 'Hair', 'Wig Bar', 'Wig Services', 'Wig touch up Straight', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:00:56'),
(77, 'asavela.ntshwanti', 'GAMFWR2wex6djjLRZyYqyMMIYi2MseBdq3E99cV91LSu87vkk68KKCUdPePF', 'Hair', 'Wig Bar', 'Wig Services', 'Wig touch up Curly', '130.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:01:24'),
(78, 'asavela.ntshwanti', 'XzANZguoZZnf8RIJwlodZ4F2nbijtjvf0nLVH9oM7ckx2Q70zH35T9rqsLBh', 'Hair', 'Wig Bar', 'Wig Services', 'Wig Trimming/Cut', '250.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:02:22'),
(79, 'asavela.ntshwanti', 'va1flnIXHch3qOke0N8uk5ePnL6KWWMLzxJoErEBIdicyZP7weOOSkh6DScy', 'Hair', 'Wig Bar', 'Wig Services', 'Cut lace frontal only', '130.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:03:00'),
(80, 'asavela.ntshwanti', 'aK8pQ7s62dkCR3IWChZ34P87KDDi4UkoBlWdJI2UxGQMjzeMYMNFXuuXfdkE', 'Hair', 'Wig Bar', 'Wig Services', 'Cut lace top only', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:03:44'),
(81, 'asavela.ntshwanti', 'a5yyNXoicfBnhWO6J2zO2PMUonVBDpHW8B9XhDtMh5ctVhQ2rNFDrNiiTtnn', 'Hair', 'Wig Bar', 'Installation', 'Client wig ( incl Blowave&Iron or Loose Curl)', '550.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:05:33'),
(82, 'asavela.ntshwanti', 'KOcFqNksXFBB37672QoKJUp8sAy7HaQsmvZ4AjHZLrGu3V2G3Ui67qU1YbPb', 'Hair', 'Wig Bar', 'Installation', 'Afika M Wig incl Blowave& Iron or Loose Curl', '490.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:06:53'),
(83, 'asavela.ntshwanti', 'edFXRCOokQnJ3BEg1Rq56hauNSFLaa6YJggm6H2oU3x10ig1YCW3tQFme88h', 'Hair', 'Wig Bar', 'Installation', 'Wig touch up ( Depending on length, straight or curly)', '130.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-08 15:09:43'),
(84, 'asavela.ntshwanti', 'ZYWfSZ1uPNzrJAcvlZdzmbquQi2JArR5M5gq1YtNKTJOxYb3ZwvGMHoYLr99', 'Beauty', 'Nails', 'Gel Nails', 'Full Set Gel(hands)', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 07:54:54'),
(85, 'asavela.ntshwanti', 'VIYpzgVyiDa4ajPJbheICIo0Oh70l1AUtX9jmV3sLZ9plVEJED7tSILxtLcY', 'Beauty', 'Nails', 'Gel Nails', 'Gel on hands fill', '220.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 07:55:30'),
(86, 'asavela.ntshwanti', 'f4ewJGNRArPCgRq2U37JlSgaTpgoEjNpR0EfEJbJyYSFXhtQx6y1Qese2GFC', 'Beauty', 'Nails', 'Gel Nails', 'Gel Overlay ( Toes)', '270.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 07:57:09'),
(87, 'asavela.ntshwanti', 'X26bF0vCO6t04BgKKMlPIPYfCmNyznEYZFY3y7KBBRsDzKm9064MVD4s65aJ', 'Beauty', 'Nails', 'Gel Nails', 'Full Set (with acrylic bass)', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 07:58:06'),
(88, 'asavela.ntshwanti', 'LZvoIVFGbVyTUdECueunU6hQQxO1NcmxuTojU67Ir6WBl8Lf8a61Vu97Rd3c', 'Beauty', 'Face & Body', 'Facial Therapy', 'Express Facial ( 30min)', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 14:55:51'),
(91, 'asavela.ntshwanti', 'yUMFHhnw81Wv0jVryMwu3GdwFB0DFxURnaFsftBd7ZPVemmw8WXSgtulg6se', 'Beauty', 'Face & Body', 'Waxing', 'Lip & Chin', '120.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:03:02'),
(92, 'asavela.ntshwanti', 'dQ65RZk7dHNhrU76CVGJEYquD93iQdaBQ7qBnMKjJNFeAxSJpR8J2fOIYcHB', 'Beauty', 'Face & Body', 'Waxing', 'Full Facial Wax', '180.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:03:47'),
(93, 'asavela.ntshwanti', 'mmCbqFQqVGbDLdosMy7H3jTVTR5iRsJHD6LwN9evhlqSwsAMVeAvJQiN8ps7', 'Beauty', 'Face & Body', 'Waxing', 'Underarms', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:04:42'),
(94, 'asavela.ntshwanti', 'HccHfFVbZNAxstLRzj0psR7B1ZIQBPu1ISvEHPMTUvPDKxUMs9nmaSsGSogZ', 'Beauty', 'Face & Body', 'Waxing', 'Bikini', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:05:06'),
(95, 'asavela.ntshwanti', 'ojHt1ZdfDTO84DEwEENwbH6dAjd54oqxuiGnuOFZUxsu7H01JiItCB2W07Pm', 'Beauty', 'Face & Body', 'Waxing', 'Brazilian', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:06:09'),
(96, 'asavela.ntshwanti', 'bHDKyvSWLPZDVCBx53wyZiKqzczT11QOhxBX17EsPuJKdaPrWFKvgXAoh0hK', 'Beauty', 'Face & Body', 'Waxing', 'Hollywood', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:06:46'),
(97, 'asavela.ntshwanti', 'W7do7lOCabPpHOdibqSSnWxprEsZgFyPFuf09vsiv5zt09nWmlT8tUXMOBni', 'Beauty', 'Face & Body', 'Waxing', 'Half leg wax', '200.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:15:44'),
(98, 'asavela.ntshwanti', '1rlLAekHXGfHwJ1FQU31MJHblDLiNfuEK6hSXVYjgtYirgorkIB8NZKBgjWk', 'Beauty', 'Face & Body', 'Waxing', 'Full leg wax', '260.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:16:14'),
(99, 'asavela.ntshwanti', 'PDoLS5PSM4l2jGAsoSoWovOF7zxlNT4B94z8xRikxQ5a4pS1HR8ggymDAJJy', 'Beauty', 'Face & Body', 'Threading', 'Lip & Brow', '120.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:18:53'),
(100, 'asavela.ntshwanti', 'lKXk7QJMLQR3Q6jFsoZwHxxMHWxu7qtAqiSjF7kA529GV7aCzSBkN9lcji0t', 'Beauty', 'Face & Body', 'Semi Permanent Make-up', 'Combination of Microblading & Microshading', '2300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:19:54'),
(101, 'asavela.ntshwanti', 'wFBmr1V3dVsaT5GKWM7VFzNpOiX8QigLT74wHTwQ43ikW93ldeepot2qO1QV', 'Beauty', 'Face & Body', 'Semi Permanent Make-up', 'Permanent Eyeliner', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-09 15:20:35'),
(102, 'nokuphila.mbandazwayo', 'sNm7WogBQQQtqVJFWLpKSs4VZGxKV0skvFKuMV6QAiMRdMRxmXQmkkhxYxuD', 'Beauty', 'Face & Body', 'Make-up', 'Magnetic liquid eyeliner', '190.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:00:18'),
(103, 'nokuphila.mbandazwayo', 'fAq9djg7FOqJMSQEMce3wHDfbq2ViX3f5avQAIx9loFie9avYn8SCffbq4Es', 'Beauty', 'Face & Body', 'Make-up', 'Natural Make-Up / Soft Glam', '680.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:01:34'),
(105, 'nokuphila.mbandazwayo', 'eOtpxuB3oYAItjzxTQHQ2YxEO4uGLtppK2KO4vlwKLLPqsBjNGWBKM0Fqvog', 'Beauty', 'Face & Body', 'Make-up', 'Natural Make-Up / Soft Glam by Afika', '800.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:03:29'),
(108, 'nokuphila.mbandazwayo', 'KEaZuwQX39lIbbS6vshImfPjFM0UuWO7Vi3F0zciH1ZRHT5SStswo1oXkDXR', 'Beauty', 'Face & Body', 'Body Therapy', 'Leg & Foot Massage(30min)', '250.00', '280.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:09:34'),
(109, 'nokuphila.mbandazwayo', '6pK75WPxvn1oVGiw0f6K7d4uvNMnZsAROqAaUrVbIomUijPfUKp9Hjh4uLsu', 'Beauty', 'Face & Body', 'Body Therapy', 'Swedish full body massage(1hr)', '440.00', '490.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:10:58'),
(110, 'nokuphila.mbandazwayo', 'tL8H6qfiad69AoFtYIDTwiglssp6eZdUGVLIGdg9HkpoS84lCZL595ByORaZ', 'Beauty', 'Face & Body', 'Facial Therapy', 'Indian Head Massage (15 min)', '240.00', '270.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:11:55'),
(111, 'nokuphila.mbandazwayo', 'PgThyBJO69KibbYfs21FaddTN0GMVvAcZYW36d6Z8brlqh91AEhoqpePle07', 'Beauty', 'Face & Body', 'Body Therapy', 'Hot Stone Massage(1 hr)', '500.00', '570.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:12:55'),
(112, 'nokuphila.mbandazwayo', 'ZuJxm8ADUX3msFCKEJBR9Erar7ROpM0VOM3nhUtog11RXEGdQb8vJZzt2AmE', 'Beauty', 'Face & Body', 'Body Therapy', 'Aromatherapy (1hr)', '490.00', '540.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:13:41'),
(113, 'nokuphila.mbandazwayo', '8J9WShgbYtt6wQRm4f5HeAxwtYhsrl7rgxMVNCIQVTkbMcW76qPcz3Do5Nal', 'Beauty', 'Face & Body', 'Body Therapy', 'Body Scrub (30min)', '320.00', '380.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:14:25'),
(114, 'nokuphila.mbandazwayo', 'xVO05I9vjOOVve3BX29I4hFOWm3pQIDj4sy48thVrAHKaQL9WTKsAnUUmFC9', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Blade Eyebrow shaping', '60.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:18:13'),
(115, 'nokuphila.mbandazwayo', 'W1CVx9QOpfTxshkvPjkyNxiaKUQ4EeuRbx6J8qj8TiLY5iBC2Bwr4vxgtpml', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Threading', '90.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:20:13'),
(116, 'nokuphila.mbandazwayo', 'JGq52QKvXD52pdnBqV1U1pWjctya40yQ62kxUj2xRYXi3AWGtpn8dVx0qZtI', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Tweezing', '80.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:20:43'),
(117, 'nokuphila.mbandazwayo', 'Z6p6xiWwMR5zUG7Tx683eX0th1F1KnBq16Q1IMJn2l49KSNzu8jeZ8NjUCqK', 'Beauty', 'Face & Body', 'Eyebrows & Lashes', 'Tint', '80.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:21:22'),
(118, 'nokuphila.mbandazwayo', 'T0l4xUV83PhMjDu8WRJFsYGJe22U2JLRazGSh0W047ahlcqxgNiiOgeSjIPk', 'Beauty', 'Face & Body', 'Make-up Products', 'Beauty blender', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:21:55'),
(119, 'nokuphila.mbandazwayo', 'sM4ca85uROMgof7JAnh7D27fXsYDodQK4lCpjUiXUov7aJzP6r0UJ7SvixqC', 'Beauty', 'Face & Body', 'Make-up Products', 'Huda highlighter ', '440.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:22:34'),
(120, 'nokuphila.mbandazwayo', '9WAw3dJyXDuwUsXeoIVjS38rf9r2mHRoAe3BkYiZtGPya7fj9QEYCoiNyO0g', 'Beauty', 'Face & Body', 'Make-up Products', 'Huda Rose Gold Eyeshadow', '570.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:23:17'),
(121, 'nokuphila.mbandazwayo', 'bFHbgEWxn3rAY19mlUxYgUSSCK8tu1eTZCKZNEOfVz9elFDM3OG9b3BIA9nT', 'Beauty', 'Face & Body', 'Make-up Products', 'Huda Dessert Dawn Eyeshadow', '570.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:23:57'),
(122, 'nokuphila.mbandazwayo', 'LHfjtXIKZvnLlzMf7SE4j2GUF3BxrhzxX2ff3wYV5oDl7e9aIWhTRYpCpZbl', 'Beauty', 'Face & Body', 'Make-up Products', 'Febble', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:24:22'),
(123, 'nokuphila.mbandazwayo', 'eX1GuWW92BMwY7ewX6OwHeYdZqPgSOe1HF0HwBfhKl2fY3Ky07crjZ8cy5p4', 'Beauty', 'Face & Body', 'Make-up Products', 'Huda textured eyeshadow', '440.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:24:57'),
(124, 'nokuphila.mbandazwayo', 'B8QZhJEj0NkK0YVFY4nunjBfwqWrFPzzSvPfw8TC01T9KH3GVQ80IfI7NDmE', 'Beauty', 'Nails', 'Repair', 'One nail ( without tips)', '20.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:36:40'),
(125, 'nokuphila.mbandazwayo', 'BITlcBvZNIeiVYaRgkxv1CNGlfAnJCSx2zuhNI5EFqWp4gGEBGxrcczLlgTr', 'Beauty', 'Nails', 'Ladies Manicure', 'Soak off & Manicure', '290.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:37:39'),
(126, 'nokuphila.mbandazwayo', 'YgwYCL5pp7FCrgQdAqwIKVuem63dqkyqNrd5jnjWPVbs5sZh2hCtA3kVgN64', 'Beauty', 'Nails', 'Ladies Manicure', 'Full wax treatment', '290.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:38:10'),
(127, 'nokuphila.mbandazwayo', 'GEznJW2mhFeRhOpsaSA1qhW7cdVT1t06VM313gUvW7QzZxPrxtofXXt0HROG', 'Beauty', 'Nails', 'Ladies Pedicure', 'Pedicure with parafin wax', '390.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:38:48'),
(128, 'nokuphila.mbandazwayo', 'dAn1zrBMnaAgqPM4lkMtrWcDrg4gapuWKXwHcavRJTYXwhnlosWszv15Ypjm', 'Beauty', 'Nails', 'Ladies Pedicure', 'Pedicure Medi', '390.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:39:12'),
(129, 'nokuphila.mbandazwayo', '8NiK1bxP4O8ayGVkC6b8lYUgL5N3ZPwBXY6rUMVyixqfJimmMZTsydrV1Ob9', 'Beauty', 'Nails', 'Ladies Pedicure', 'Express pedi', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:39:32'),
(130, 'nokuphila.mbandazwayo', 'WKnfnAQLISco4XCtX0yRj0SmpbXatSOkMVP8OP2bKNTwovtUW6CP9DKU5I99', 'Beauty', 'Nails', 'Male Grooming', 'Nose wax', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:39:57'),
(131, 'nokuphila.mbandazwayo', 'J67SB5bX94eMj5HYBjPgWoMi5xqnFznQ2HxYNkQCYIKPnuejBOVMBUOT8qQ4', 'Beauty', 'Nails', 'Male Grooming', 'Back wax', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:40:27'),
(132, 'nokuphila.mbandazwayo', 'QwzWyOoUuvZRSgVd7cLRza3sWaoLlFs7KC0W1WIumzVXvrnUg9u0XgALAFmI', 'Beauty', 'Nails', 'Male Grooming', 'Chest wax and stomach ', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:41:03'),
(133, 'nokuphila.mbandazwayo', '6xDXXctJgZaUhke7wXPI2Oy8PBT6vKVIE4wDJuf3H9QuKyABciJZZygDpz3k', 'Beauty', 'Nails', 'Male Grooming', 'Master Manicure', '280.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:41:38'),
(134, 'nokuphila.mbandazwayo', 'FsTF6WUEtpAfhWlTd5FULMIL6N2sZp1Ps4FKf0L0ygXlxNiVhkmjOSATELz2', 'Beauty', 'Nails', 'Male Grooming', 'Master Pedicure', '390.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:41:59'),
(135, 'nokuphila.mbandazwayo', 'XlNPVwOYqqK0optFbdv16YzBl1zLgiiQ0K58V27BP0xGfuyXor7LUNgaKGif', 'Beauty', 'Nails', 'Express Hands & Feet', 'Soak off with buff & polish', '220.00', '250.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:42:57'),
(136, 'nokuphila.mbandazwayo', 'kmviDxkhUImMJy3CSIJJYVDvNxRCku1i8TVqUSD693AKHQVPczUgNvZb58p1', 'Beauty', 'Nails', 'Express Hands & Feet', 'Soak off (when doing another set)', '90.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:43:45'),
(137, 'nokuphila.mbandazwayo', '3kLwDakr2avJV2HwBjcrSHAMszjCgJXjJTHYiKYSLCn0ZnQF6Rpv84QebCk9', 'Beauty', 'Nails', 'Express Hands & Feet', 'Acrylic Soak Off ( When doing another set)', '130.00', '120.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:44:51'),
(138, 'nokuphila.mbandazwayo', 'sqcsDM7WyhxcKcyceoHsKyLuj2Bo76vK2WhmvQgDS3RaqBE7n3jN2J0gmv9B', 'Beauty', 'Nails', 'Express Hands & Feet', 'Acrylic Soak off with Buff & Polish', '250.00', '280.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:45:36'),
(139, 'nokuphila.mbandazwayo', 'MuzsuNsh3qSTNdyKn5Vdo6pPXp3rsV0bEkf1WvHGbZEAeG2UPAIXqK4Orvba', 'Beauty', 'Nails', 'Ladies Manicure', 'Full Manicure', '230.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:48:04'),
(140, 'nokuphila.mbandazwayo', '3H2E5xFDjOThiPO4tkQzqFQ9MhuHIChWgo90wGUWFKAEFAJul5K19CNOuLkb', 'Beauty', 'Nails', 'Ladies Pedicure', 'Pedicure Full', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:48:47'),
(141, 'nokuphila.mbandazwayo', 'bn1UQT6C3bD2zQgvN7RBdFOdkAnnV8xeCxDMhuI5yeVSo1RF7yTvqKGeayZn', 'Beauty', 'Nails', 'Male Grooming', 'Ear Wax', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:49:54'),
(142, 'nokuphila.mbandazwayo', 'OSF4q2ZIkUIFYIUgeSVsOcdvKcJ2RJnWV14hth79abFAWoxYOF09wA2yQhty', 'Beauty', 'Nails', 'Express Hands & Feet', 'Buff & Polish', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:50:16'),
(143, 'nokuphila.mbandazwayo', 'kyXT3CR5YXYNVtOr2wZHJTPfwdFGVNrIukvYeBeiHck56M1twdiGhcM8RZcP', 'Beauty', 'Nails', 'Repair', 'One nail ( with tips)', '40.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:51:44'),
(145, 'nokuphila.mbandazwayo', 'F9o9Q2qGHBJbmtq4PgucnBOFNwKYxys0RqmOVMtHOhDVlWcGZZB5bEPuUk0p', 'Beauty', 'Nails', 'Gel Nails', 'Paint on nail art ( 1Free)', '15.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:54:35'),
(146, 'nokuphila.mbandazwayo', 'MRPf9yoTbxqdusKve9vk6WFdpTYPIK9fJ0zq07soVoZRoQs68dAMvER7WW32', 'Beauty', 'Nails', 'Gel Nails', 'Sticks on nail art (1 free)', '10.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:55:09'),
(147, 'nokuphila.mbandazwayo', '5RCnK7RdZ0XKlYS4CBDiANMU1NHMajXKqJ9xS9YA4Yd2VK8Cxhf6yfwOFett', 'Beauty', 'Nails', 'Gel Nails', 'Colour Change', '400.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:55:59'),
(148, 'nokuphila.mbandazwayo', 'boYDHub0eZ2SpxKQfINmGT5oxxBfWgCioCNH9Em6Ea3dRIdywiVnAHrX1oVW', 'Beauty', 'Nails', 'Gel Nails', 'Full set ', '390.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 07:56:58'),
(149, 'nokuphila.mbandazwayo', 'kmDFvBVUK8Ya3zqocQmaqIuqza8pOycdt3aB61Zm2wW9q6Dh916IBbZcul53', 'Beauty', 'Packages', 'De-Congestion Treatment', 'Back & Neck Massage and De-Congestion', '380.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:16:18'),
(150, 'nokuphila.mbandazwayo', 'Y9qFjEbblRykqdryKgndauHLpWsrgSEQfJgOFRfIWgtzzBAOqkTzt1YsrtAL', 'Beauty', 'Packages', 'Body Waxing Delux', 'Eyebrow wax, Underarms and Legs & Bikini ', '500.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:18:45'),
(151, 'nokuphila.mbandazwayo', 'uSfP8yOrolBuaEZ40ZXV5vC3kACEUGxxQqAad2MD6eH257q25ZzCj07vgmW5', 'Beauty', 'Packages', 'Express Treatment', 'Back&Neck Massage, Indian Head Massage and Manicure', '700.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:20:28'),
(152, 'nokuphila.mbandazwayo', 'pPWWGsUpik8JxuU9D76ttW5NNdhBtl44ycRpzdWD2SbhUa0cPVvtX2HvbYtT', 'Beauty', 'Packages', 'Afika M Luxury Treat', 'Full Body Massage, Facial and Pedicure', '1100.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:21:41'),
(153, 'nokuphila.mbandazwayo', 'k9SFPhtmWmsZcol1QunHePLed5E8Ezdfhw16UAlSDBrkY3XMZnSzLleoy7Cs', 'Beauty', 'Packages', 'Birthday Package', 'Deep Cleansing facial, Hot Stone Massage, Pedicure and Gel O', '1350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:23:45'),
(154, 'nokuphila.mbandazwayo', 'JaKIZNOidPkL8fzUcLhtP7EySSHcoRceO4qjwkyKAssli5FUEEf0vT8n3EMG', 'Beauty', 'Packages', 'Bestie Package (2 People)', 'Pedicure, Manicure, Facial and Back & Neck Massage', '2300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:24:58'),
(155, 'nokuphila.mbandazwayo', 'cU3VFQsKl2icbqgGKfiF3Mu3qpjjP20uMzu484LYWz4jeloixnyW2HJZgyco', 'Beauty', 'Packages', 'Couples Treatments (2 People)', 'Full body Massage, Facial, Pedicure, Manicure, (incl Bottle ', '2500.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:26:56'),
(156, 'nokuphila.mbandazwayo', 'm2KKtmwnoqzlT5ydiDZwvG8b3wPkeAcAhprOBu63VropDsDqkWUAwVChImbs', 'Beauty', 'Packages', 'Coporate Packages (Silver Package)', 'Express Neck & Shoulder Massage and Express Pedicure', '450.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:28:13'),
(157, 'nokuphila.mbandazwayo', 'dXeV8pNWJ5yt4Ga8Brwi9llsMS4rWNSLzZuKTiEOj7ZIzgv08hE6n13JUDxb', 'Beauty', 'Packages', 'Coporate Packages (Gold Package)', 'Back & Neck Massage, Manicure, Pedicure and Indian Head Mass', '1000.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:30:04'),
(158, 'nokuphila.mbandazwayo', 'G6P2lbWOCA7wh4KEMS6oITGCd1QakYm67lEnmBfMQDGuV9dnUSeFtuM1Tdc1', 'Beauty', 'Kiddies', 'Massages', 'Full Body Massage (45min)', '280.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:32:58'),
(159, 'nokuphila.mbandazwayo', 'Eb4raYNRfnLU7YXBpvaqON6uhbbMrv0wPPhoFAVgXu6i0JUCLrIXHXa0HC1Q', 'Beauty', 'Kiddies', 'Massages', 'Back, Neck & Shoulder Massage(15min)', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:34:24'),
(160, 'nokuphila.mbandazwayo', '57OQ74rqjAhILjCSh7MtPCiA2YkGEq4m96IgzIfuioAKZT9yPgtkKba8mEGy', 'Beauty', 'Kiddies', 'Massages', 'Leg & Foot Massage(15min)', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:34:57'),
(161, 'nokuphila.mbandazwayo', 'e4r8e2j3aQArSgX4u9fCftdkri2We1CHefwepkKh7PnAVxjek8vmNWA0kfgm', 'Beauty', 'Kiddies', 'Mini Manis & Pedis', 'Manicure Treat (incl Gel Polish & hand Massage)', '200.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:36:06'),
(162, 'nokuphila.mbandazwayo', 'LyULupLokCGpEQwzW3op7Mb7OXEw1E5ftwl5Endr8UyqXmwOSSzfKc1JnFsk', 'Beauty', 'Kiddies', 'Mini Manis & Pedis', 'Gel polish only', '160.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:36:43'),
(163, 'nokuphila.mbandazwayo', '707rOqY5BpkcHfRMARgPhou1eP7ud4vmmAVc6hSoglGp8QQ288eohQEgbLFM', 'Beauty', 'Kiddies', 'Mini Manis & Pedis', 'Express pedicure (incl nail polish)', '150.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:38:14'),
(164, 'nokuphila.mbandazwayo', 'J4dShfPNw4fZlrNkKIl0Of0pRnEkLnZmOtmoslBt3gklRLunDv356jxWRwDI', 'Beauty', 'Kiddies', 'Mini Manis & Pedis', 'Toe polish only', '100.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:38:54'),
(165, 'nokuphila.mbandazwayo', 'vGo49BpMHURrYeezyU01dlI3Q3hSE0pkXl8KQ7qzYkhXhh01uQXNmJfLDe1c', 'Beauty', 'Kiddies', 'Natural Make-up', 'Soft glam', '250.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:39:17'),
(166, 'nokuphila.mbandazwayo', 've0DzDm6KeT9P89A9xyWUuxcSforzLrQ6WRSGyVXGWCm8ioTVXC1k277Uzvj', 'Beauty', 'Kiddies', 'Natural Make-up', 'Themed make-up', '300.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:39:46'),
(167, 'nokuphila.mbandazwayo', 'a8Iyb3r6RoARniPPR7Giw2wSm1Ir0ovzFTArzwLuEkqeWVM0btK2y9MXuESz', 'Beauty', 'Elderly', 'Elderly Mondays', '10% off prices for pensioners', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-10 08:40:50'),
(168, 'asavela.ntshwanti', 'u6BlMBUziXOJJh27scoMs9KMnGjSGVeF3Ki4lvv1HzR509mc9kVohVaQ3sBg', 'Beauty', 'Nails', 'Gel Nails', 'Gel Overlay (free hand massage)', '290.00', '0.00', '0.00', NULL, NULL, NULL, '2024-04-12 08:37:30'),
(169, 'asavela.ntshwanti', '21HK9PZclGS2ZZZAa1JCihiOoh6ldNF91AlrYl4JNB0ivOB6AdZFH4YZScJb', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Relaxer', '540.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:35:15'),
(170, 'asavela.ntshwanti', 'rsrl4B52FVOZVIlNcyVZtDCYzITWZjsdbaOtkwqILBN62UHm0FNjAJbrR75i', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Relaxer Afro', '640.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:35:43'),
(171, 'asavela.ntshwanti', 'dyKNRKz61l6fA7i49oShkm2vN2Knsi2M1o5KVvLAmECrBWXf3Diu4JmHPrfq', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Sensitive Relaxer ', '600.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:36:06'),
(172, 'asavela.ntshwanti', '554umBHiUaH1IHHnAvxlqVXgkqr8IKfkRKPh2Zfr7zNFixpKiAIlQIylZ8ft', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Sensitive Relaxer Afro', '700.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:36:25'),
(173, 'asavela.ntshwanti', 'ODxcHcOnSrOqYy3OxLgzNHFxKdPdJpA8HZ8o8PcPikCzuXtbhk20PQIDVEKD', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Wash', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:36:54'),
(174, 'asavela.ntshwanti', 'MXZ7LftUhMdZfTZeEI3wCu1lvOaMOatmKox3cWObyl4mrgpSXLIHnCy1rGad', 'Hair', 'Hairdressing', 'Mizani', 'Mizani Wash Afro', '370.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:39:43'),
(176, 'asavela.ntshwanti', 'oagUERix20u7etlZZrVsXcxW1YXxXJSdIRFFPZbGrLzFnwXdNl6b0UoboZvu', 'Hair', 'Hairdressing', 'Mizani', 'Thermasmooth treat', '480.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:40:57'),
(177, 'asavela.ntshwanti', 'NiCNeV1nZpcZrUjc6D6CAmiqnmUf9Gx7uzqkKkkhHL46ORSBhG06rsvmKAcZ', 'Hair', 'Hairdressing', 'Mizani', 'True texture treat', '480.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:42:10'),
(178, 'asavela.ntshwanti', '3ikLfkvogfbJxMeKejys9YlH9xREjjlbsBDXvUi9FjZokiiUlzHG6WBCwQgS', 'Hair', 'Hairdressing', 'Mizani', 'Kera/Hydra treat', '400.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:43:05'),
(179, 'asavela.ntshwanti', 'CiEhYni1cUqXlwI8G8FJ05E7O5yJvog6seneqR2qcxiAtkx6IqGl8wIpaXSg', 'Hair', 'Hairdressing', 'Mizani', 'Kera/Hydra treat Afro', '450.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:43:26'),
(180, 'asavela.ntshwanti', '5AI3hiZw5yYoRlC6eYSU9GkBhjVEoLjuBOrY2YHrl5ezikNhImZQXwXTBjsJ', 'Hair', 'Hairdressing', 'Mizani', 'True texture wash', '380.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:43:58'),
(181, 'asavela.ntshwanti', 'qlrxBuBUINr5XYuL76GtuORZazt0FJxCLMLvsYMRVdYUAwpFRF0WYcCHQBa3', 'Hair', 'Hairdressing', 'Mizani', 'True texture wash Afro', '430.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:44:33'),
(182, 'asavela.ntshwanti', 'v2uS9M3q9IU52yxQyX8uHoikyw1uRWPzdduhXfYKY0KvjB7pmQYBYWqJgKaK', 'Hair', 'Hairdressing', 'Mizani', 'Scalp tonic', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:45:29'),
(183, 'asavela.ntshwanti', 'o6ZkTSvJ3csfTJlJokmAnUEy5vPN20dwIDOPpkufjzry6PykywG1qw9qhZLb', 'Hair', 'Hairdressing', 'Mizani', 'Scalp oil drop', '50.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:45:54'),
(184, 'asavela.ntshwanti', '5pKcSD3s4XsWiiPRVqVpCmQVTRvvd6fKVPaNUzdfpO01FbY1WAodcgiVWtM2', 'Hair', 'Hairdressing', 'Olive Oil', 'Olive Relaxer', '500.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:46:40'),
(187, 'asavela.ntshwanti', 'iWl8LLr1c7GO7oOaPWlPHeLhjeiwJGse69hv0gktf5ZkmzCZNMPIqmo7Omn4', 'Hair', 'Hairdressing', 'Olive Oil', 'Olive Wash', '290.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:49:06'),
(188, 'asavela.ntshwanti', '5PEKUqj2vkHlB0QQfPO7EBgHhtxSsssQ5LnEPMubMIM8x4lIOdP5eLMTusuO', 'Hair', 'Hairdressing', 'Olive Oil', 'Olive Treatment', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:49:57'),
(189, 'asavela.ntshwanti', 'fJYmqRFLbxU8hZMiFykVghMXoK1wY1bGJYwH7VHKQlFMh6w89hxUEpjoesMA', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Relaxer  Cut, Blowave & Iron ', '890.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:51:59'),
(190, 'asavela.ntshwanti', 'AyLVOzeFlgWXEiXjxRpNbNxk5xXQqwbfNz4Tk1U9JtmnAqhMfT7vK4yNzkGI', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Blowave & Iron, Splitends (R100 as an extra)', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:53:05'),
(191, 'asavela.ntshwanti', 'kzxN7uC4ypf9IKjox4869Q8YC3aPTWkI0QJaZRePvIcizqovyCkK19VBS8kK', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Blowave & Iron', '120.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:53:32'),
(192, 'asavela.ntshwanti', 'NtDtVzu4k6eopiIn9OKDAajXYrlkkdPPOZdmlUrptbrAmY7zOND9j9mopBLa', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Split ends only', '70.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:54:11'),
(193, 'asavela.ntshwanti', '9JvA2p5fDujYFfVj8KXiuP4srpPTWhIoipfMBOjHegPOWBK3J3PPXjpRHTim', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Bun ( Own hair)', '600.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 10:55:20'),
(194, 'asavela.ntshwanti', 'ZfkXg14ujl3pE9xxVZBWmL665W9qVULITgz49IB1mn6pfV8pGYgxXdG5fthm', 'Hair', 'Hairdressing', 'Extra (Own Hair)', 'Bun ( with our hair)', '570.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-05 11:04:36'),
(195, 'asavela.ntshwanti', '6N3HtAWx5CfgRYRUE66uxOoq94JME8rm4MEh6YKMbefAxGRzePHa9GZ91vpL', 'Beauty', 'Face & Body', 'Make-up', 'Bridal Make-Up', '1600.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-07 09:42:39'),
(196, 'asavela.ntshwanti', 'PMQH8rh43bPk60xx1aCbn3ijpTfOgkUp0qqKoFFnKOh5LirSaa2PVnWNQyQT', 'Beauty', 'Face & Body', 'Make-up', 'Full Facebeat by Afika', '1200.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-07 09:43:21'),
(197, 'asavela.ntshwanti', 'rIiNu762szYh7NJIeDvtdHXdkxuG3j7glSjRRVWwVDxyFaxkxT9ysC0VuzR4', 'Beauty', 'Face & Body', 'Make-up', 'Natural Make-Up / Soft Glam by Afika', '1000.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-07 09:44:09'),
(198, 'asavela.ntshwanti', 'IwdzMM81j8itVIc7oJQLCuKB2aGqHht5xhmb4zbyH6Uv5b18ZuN3fsznT0GU', 'Beauty', 'Face & Body', 'Make-up', 'Full Facebeat / Make-Up', '790.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-07 09:45:33'),
(199, 'asavela.ntshwanti', 'vXtGjeElqU1y3VBNe3nJIviquuMoUWhUKWvDRmVGaOZk77qiHiluduBTWstA', 'Hair', 'Hairdressing', 'Mizani After Care', 'Shine Extent', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:17:27'),
(200, 'asavela.ntshwanti', 'SGEogr2cxp5iJWbgyXHBWR3W4AyQxdMu3C7z7SPfvNVTdLcLdOESd7NTA8tU', 'Hair', 'Hairdressing', 'Mizani After Care', 'Rose H20', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:17:53'),
(201, 'asavela.ntshwanti', 'PLEWG4bhJ0ALAtN5ZdfXVv4KzIq5FYHUMvUq87rz8u4B0NIf7jrrVJUnbGoz', 'Hair', 'Hairdressing', 'Mizani After Care', 'Intense night time treatment', '400.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:18:30'),
(202, 'asavela.ntshwanti', '21gtXe26PzB7CsCXQTWtSEDwqvypiKUUdJz6TXtOVBzxrrubEDkSAI9iluXa', 'Hair', 'Hairdressing', 'Mizani After Care', 'Coconut Souffle', '330.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:18:59'),
(203, 'asavela.ntshwanti', 'gyLqVAKlSFbtIsz9YFQK7FtR8Tt0LQ7onsYZSehswRCKCiypFYf3XQIee774', 'Hair', 'Hairdressing', 'Mizani After Care', 'Mizani 25 Nourishing Oil', '400.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:19:32'),
(204, 'asavela.ntshwanti', 'oFolou4pHAUzCDA8sQXJpMyoMWuvaJ3hETGVZKwPoHfZGHp9XFeQStX7HwwN', 'Hair', 'Hairdressing', 'Mizani After Care', 'Smooth Guard', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:28:46'),
(205, 'asavela.ntshwanti', '43lNyV6ufMnbYUDite750cCjkdGAxRo3MjK7KOamK7Jlmv8vmzSDy3os5Pri', 'Hair', 'Hairdressing', 'Mizani After Care', 'Curl Enhancing lotion', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:37:11'),
(206, 'asavela.ntshwanti', 'Y1zOnvmQf1L2gj9mvYWufi9y2mmRyxixzEv7PjBeZP6B6imqeYx7vy1QsVLp', 'Hair', 'Hairdressing', 'Mizani After Care', 'TT Twist and Coil Jelly', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:39:43'),
(207, 'asavela.ntshwanti', 'mLqiOrrY8v8wPi7y7DVOksUKo9p0enzIxXqncFWyx3lh8arQOktW5U7eZ61B', 'Hair', 'Hairdressing', 'Mizani After Care', 'Scalp Care Calming Lotion', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:40:27'),
(208, 'asavela.ntshwanti', 'ECVjLIGaSJ3o9D1b4IioMUz6vR1T1PvtxokULABUZRz7hqR8aPOAZNVFBnQk', 'Hair', 'Hairdressing', 'Mizani After Care', 'Scalp Care Cooling Lotion', '350.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:40:53'),
(209, 'asavela.ntshwanti', 'H7PLmOmalJkyZUhdTGOz5ZPqHZEP5dK0iRSjJYAC3nGi2KRoyKgtYV6caVJp', 'Hair', 'Hairdressing', 'Mizani After Care', 'Mizani 25 Miracle Milk 400ml', '490.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:41:30'),
(210, 'asavela.ntshwanti', 'HnbufxLKGIoeMzM9E3Ui6jg8A65MW2IfQ2Ke2HntS58GB2rRMZhK31zc6wTQ', 'Hair', 'Hairdressing', 'Mizani After Care', 'Mizani 25 Miracle Milk 250ml', '320.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:41:53'),
(211, 'asavela.ntshwanti', 'tJDIzEooPc7ydM56Vmfr0n6rPR61WhZR1k3ICGMfemAVomxlCJJ7Lq3P16XG', 'Hair', 'Wig Bar', 'Wig Services', 'Wig Making', '850.00', '0.00', '0.00', NULL, NULL, NULL, '2024-05-16 08:43:05'),
(213, 'sinethemba.nxavipi', '1551563', 'Hair', 'Hairdressing', 'Olive Oil', 'Hair cut', '120.00', '0.00', '0.00', NULL, NULL, NULL, '2025-07-09 17:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `therapist_id` varchar(60) DEFAULT NULL,
  `user_url` int(11) NOT NULL DEFAULT 0,
  `appointment_id` varchar(60) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `name_` varchar(60) DEFAULT NULL,
  `surname_` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(130) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `amount` varchar(225) NOT NULL DEFAULT '0.00',
  `services_` varchar(1024) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `remark` varchar(60) DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `appointment_time` varchar(60) DEFAULT NULL,
  `appointment_date` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `therapist_id`, `user_url`, `appointment_id`, `name`, `name_`, `surname_`, `phone`, `email`, `paid`, `amount`, `services_`, `status`, `remark`, `terms`, `appointment_time`, `appointment_date`, `date`) VALUES
(1, 'aviwe.manka', '8', 1, '03553664', 'Sinethemba Nxayiphi', 'Philiswa', 'Mbandazayo', '0817679053', 'sinethembanxayiphi3@gmail.com', 1, '540.00, 500.00', 'Mizani Relaxer, Relaxer', 'Pending', NULL, 'I accept the Terms and Conditions', '13:30 - 14:30', '2025-07-18', '2025-07-18 11:53:54'),
(3, 'asavela.ntshwanti2212', '6', 98, '33435425', 'Ntshwanti', 'Kuhle', 'Mnyikizo', '0631875397', 'asavelan302@gmail.com', 0, '540.00', 'Mizani Relaxer', 'Rejected', 'Appointment Rejected', 'I accept the Terms and Conditions', '08:30 - 09:30', '2025-07-23', '2025-07-20 16:14:21'),
(4, 'aviwe.manka', '5', 1, '00522103', 'Sinethemba Nxavipi', 'Kuhle', 'Mnyikizo', '0817679053', 'sinethembanxayiphi3@gmail.com', 0, '290.00', 'Gel Overlay', 'Pending', NULL, 'I accept the Terms and Conditions', '10:30 - 11:30', '2025-07-21', '2025-07-20 18:46:55'),
(5, 'aviwe.manka', '6', 1, '20560020', 'Sinethemba Nxavipi', 'Kuhle', 'Mnyikizo', '0817679053', 'sinethembanxayiphi3@gmail.com', 0, '540.00', 'Mizani Relaxer', 'Pending', NULL, 'I accept the Terms and Conditions', '09:30 - 10:30', '2025-07-21', '2025-07-21 02:56:33'),
(6, 'aviwe.manka', '8', 1, '56652056', 'Sinethemba Nxavipi', 'Philiswa', 'Mbandazayo', '0817679053', 'sinethembanxayiphi3@gmail.com', 0, '540.00', 'Mizani Relaxer', 'Pending', NULL, 'I accept the Terms and Conditions', '13:30 - 14:30', '2025-07-21', '2025-07-21 03:07:40'),
(7, 'aviwe.manka', '3', 1, '36140340', 'Sinethemba Nxavipi', 'Petyr', 'Baelish', '0817679053', 'sinethembanxayiphi3@gmail.com', 1, '290.00', 'Gel Overlay', 'Pending', NULL, 'I accept the Terms and Conditions', '09:30 - 10:30', '2025-07-23', '2025-07-21 09:25:42'),
(8, 'sinethemba.nxavipi', '3', 32, '61202466', 'Sinethemba Nxavipi', 'Petyr', 'Baelish', '0817679053', 'sinethembanxayiphi3@gmail.com', 0, '290.00', 'Gel Overlay', 'Pending', NULL, 'I accept the Terms and Conditions', '09:30 - 10:30', '2025-07-25', '2025-07-24 14:49:46'),
(9, 'sinethemba.nxavipi', NULL, 32, '31320522', NULL, NULL, NULL, NULL, NULL, 0, '290.00, 40.00', 'Gel Overlay, One Nail (With tips)', 'Pending', NULL, NULL, NULL, NULL, '2025-07-24 16:15:04'),
(10, 'sinethemba.nxavipi', '10', 32, '61506233', 'Sinethemba Nxavipi', 'Tyrion', 'Lannister', '0817679053', 'sinethembanxayiphi3@gmail.com', 1, '290.00, 40.00', 'Gel Overlay, One Nail (With tips)', 'Pending', NULL, 'I accept the Terms and Conditions', '11:30 - 12:30', '2025-07-25', '2025-07-24 16:15:04'),
(11, 'sinethemba.nxavipi', '10', 32, '33124261', 'Sinethemba Nxavipi', 'Tyrion', 'Lannister', '0817679053', 'sinethembanxayiphi3@gmail.com', 1, '290.00, 40.00, 230.00', 'Gel Overlay, One Nail (With tips), Full Manicure', 'Pending', NULL, 'I accept the Terms and Conditions', '10:30 - 11:30', '2025-07-25', '2025-07-24 16:31:07'),
(12, 'aviwe.manka', NULL, 1, '23102244', NULL, NULL, NULL, NULL, NULL, 0, '540.00, 500.00, 250.00', 'Mizani Relaxer, Relaxer, Moisture Spray', 'Pending', NULL, NULL, NULL, NULL, '2025-08-09 20:30:51'),
(13, 'aviwe.manka', '8', 1, '31416633', 'Sinethemba Nxavipi', 'Jaime', 'Lannister', '0817679053', 'sinethembanxayiphi3@gmail.com', 1, '540.00, 500.00, 250.00', 'Mizani Relaxer, Relaxer, Moisture Spray', 'Pending', NULL, 'I accept the Terms and Conditions', '08:30 - 09:30', '2025-08-15', '2025-08-09 20:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`id`, `order_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(32, 3),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(41, 8),
(42, 8),
(43, 8),
(44, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `salon_id` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `monday` varchar(10) NOT NULL DEFAULT 'mo',
  `tuesday` varchar(10) NOT NULL DEFAULT 'tu',
  `wednesday` varchar(10) NOT NULL DEFAULT 'we',
  `thursday` varchar(10) NOT NULL DEFAULT 'th',
  `friday` varchar(10) NOT NULL DEFAULT 'fr',
  `saturday` varchar(10) NOT NULL DEFAULT 'st',
  `sunday` varchar(10) NOT NULL DEFAULT 'sn',
  `occupation` varchar(60) DEFAULT NULL,
  `branch` varchar(60) DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `salon_id`, `email`, `password`, `name`, `surname`, `gender`, `birthday`, `role`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `occupation`, `branch`, `image`, `date`) VALUES
(3, 'emma.taka', '510031356261235463342064515532154455255113502221144303356106', 'baelish@yahoo.com', '$2y$10$ZRxrmwtvO1aVXEseGaufk.X6ki2hxG1SvLa91B.Hm5YpRjoi15tIC', 'Petyr', 'Baelish', 'Male', '2023-12-21', 'Staff', 'mo', 'off', 'we', 'th', 'fr', 'st', 'sn', 'Beauty', 'East London', 'uploads/1753089207_face1.jpg', '2023-12-21 11:00:50'),
(5, 'kuhle.mnyikizo', '510031356261235463342064515532154455255113502221144303356106', 'bran@yahoo.com', '$2y$10$hVs3RwMUTqVm2ZLqXXwG8ubEsP9ujbWc3zejJf9hY/X44MiXAeBPa', 'Bran', 'Stark', 'Male', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'off', 'st', 'sn', 'Beauty', 'East London', 'uploads/1753089114_face3.jpg', '2023-12-21 11:08:11'),
(6, 'kuhle.mnyikizo7503', '510031356261235463342064515532154455255113502221144303356106', 'greyjoy@yahoo.com', '$2y$10$Qg/aaIk/PwaJDsUeOw9KJe0/CZfQh4XS8DtUhyks1poEa0f4e2Wui', 'Theon', 'Greyjoy', 'Male', '2023-12-21', 'Staff', 'mo', 'tu', 'off', 'th', 'fr', 'st', 'sn', 'Hair', 'East London', 'uploads/1753088915_face4.jpg', '2023-12-21 11:08:48'),
(8, 'philiswa.mbandazayo3086', '510031356261235463342064515532154455255113502221144303356106', 'jaime@yahoo.com', '$2y$10$/WpKhl9UxMZAZdrHD0279.N1Hw1BtUIssH75eZle8krltwJlKl3MC', 'Jaime', 'Lannister', 'Female', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'fr', 'off', 'sn', 'Hair', 'East London', 'uploads/1753088744_face7.jpg', '2023-12-21 11:11:48'),
(10, 'afika.mbandazayo', '510031356261235463342064515532154455255113502221144303356106', 'tyrion@yahoo.com', '$2y$10$jPM98DFTBtebIShhO1Xnn.cdY0AEmOQvqHjozMAmXcLj6WnFqcy/S', 'Tyrion', 'Lannister', 'Male', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'fr', 'off', 'sn', 'Beauty', 'East London', 'uploads/1753088648_face8.jpg', '2023-12-21 11:14:20'),
(12, 'afika.mbandazayo6220', '510031356261235463342064515532154455255113502221144303356106', 'mormont@yahoo.com', '$2y$10$fZdC2P0mc/vYgsl7u1ujkOD.Pz/dfifFkxI8c6dSl09CUv.B.D78e', 'Lyanna', 'Mormont', 'Female', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'fr', 'st', 'off', 'Hair', 'Mthatha', 'uploads/1753088568_face20.jpg', '2023-12-21 11:16:59'),
(13, 'anita.ndakisa', '510031356261235463342064515532154455255113502221144303356106', 'tyrell@yahoo.com', '$2y$10$GB0UowHriA3Qypz8XfTmT.dqlbBsgjykck/FTaZUo70cVZ85Sv2nW', 'Margaery', 'Tyrell', 'Female', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'fr', 'off', 'sn', 'Beauty', 'Mthatha', 'uploads/1753088477_face11.jpg', '2023-12-21 11:20:11'),
(14, 'aphelele.eseya', '510031356261235463342064515532154455255113502221144303356106', 'lannister@yahoo.com', '$2y$10$ge22y2OQyvRiGmA7WazByO6fmKcTj74Dta/T1f/9SNEpMoYG33Qo.', 'Cersei', 'Lannister', 'Female', '2023-12-21', 'Staff', 'off', 'tu', 'we', 'th', 'fr', 'st', 'sn', 'Hair', 'Mthatha', 'uploads/1753088385_face10.jpg', '2023-12-21 11:22:30'),
(15, 'janie.silva', '510031356261235463342064515532154455255113502221144303356106', 'sansa@yahoo.com', '$2y$10$Hs7VU3pfqvtOI5Nn9Xq9nuzSHOfnBu8Nox/tJ7mkrizt8sc0Q9uoO', 'Sansa', 'Stark', 'Female', '2023-12-21', 'Staff', 'mo', 'off', 'we', 'th', 'fr', 'st', 'sn', 'Hair', 'Mthatha', 'uploads/1753088296_face6.jpg', '2023-12-21 11:27:33'),
(16, 'zanele.cotani', '510031356261235463342064515532154455255113502221144303356106', 'stark@yahoo.com', '$2y$10$GmKzR5qXSIqs48NQKdRBG.Gc5QQnBI6U..LV4j1WWbUZ.HRUkbZMS', 'Arya', 'Stark', 'Female', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'off', 'st', 'sn', 'Beauty', 'Mthatha', 'uploads/1753088225_face5.jpg', '2023-12-21 11:28:49'),
(22, 'nomandla.gqangeni', '510031356261235463342064515532154455255113502221144303356106', 'snow@gmail.com', '$2y$10$5AmtLHBo9FTNpFRZJLpmKersleH18Y7FTt6IAvbjQFfbHALfIPXmi', 'Jon', 'Snow', 'Male', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'fr', 'st', 'off', 'Hair', 'Mthatha', 'uploads/1753088146_face9.jpg', '2023-12-21 20:21:58'),
(23, 'nokuphila.mbandazayo', '510031356261235463342064515532154455255113502221144303356106', 'targaryen@yahoo.com', '$2y$10$EbqiajPoU1cGI/dPrDL9GelNEHgADBtUhoOLwraPeumhFysLHV75O', 'Daenerys', 'Targaryen', 'Female', '2023-12-21', 'Staff', 'mo', 'tu', 'we', 'th', 'off', 'st', 'sn', 'Hair', 'Mthatha', 'uploads/1753088067_face2.jpg', '2023-12-21 20:22:51'),
(30, 'asavela.ntshwanti', 'NmYHnH6o6TMWcx2zn0bi9jCp0FFkFmVQNz2Hug4syrUOqFpTwxp8v7bCl5Zj', 'asavelantshwanti123@gmail.com', '$2y$10$3UrqvCLje6afBGNRdlMS1ucLNFNp9hZCBVSQzi02CsmwIjVjCgbM.', 'Asavela', 'Ntshwanti', 'Female', '2024-02-12', 'Supper_admin', 'mo', 'tu', 'we', 'th', 'fr', 'st', 'sn', '', NULL, 'uploads/1751870840_5ae2c6a97ef428320f2ac2a09d9c2a78.jpg', '2024-02-12 12:08:21'),
(32, 'sinethemba.nxavipi', 'NmYHnH6o6TMWcx2zn0bi9jCp0FFkFmVQNz2Hug4syrUOqFpTwxp8v7bCl5Zj', 'sinethembanxayiphi3@gmail.com', '$2y$10$xMMirZI5aLb7.YYj1KDEBeJ473227GU5xpd69knm3DeBHAZV0XbzC', 'Sinethemba', 'Nxavipi', 'Male', '2025-03-19', 'Supper_admin', 'mo', 'tu', 'we', 'th', 'fr', 'st', 'sn', '', NULL, 'uploads/1753034989_1718988404472.jpg', '2025-03-19 15:04:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_name` (`blog_name`),
  ADD KEY `uploaded_by` (`uploaded_by`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `video` (`video`(768));

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `name` (`name`),
  ADD KEY `surname` (`surname`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `gender` (`gender`),
  ADD KEY `birthday` (`birthday`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `salon_id` (`salon_id`),
  ADD KEY `public_holidays` (`public_holidays`),
  ADD KEY `mondays_sundays` (`mondays_sundays`),
  ADD KEY `sundays` (`sundays`),
  ADD KEY `public_holidays_time` (`public_holidays_time`),
  ADD KEY `mondays_sundays_time` (`mondays_sundays_time`),
  ADD KEY `sundays_time` (`sundays_time`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services` (`services`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `salon_id` (`salon_id`);

--
-- Indexes for table `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `salon_id` (`salon_id`),
  ADD KEY `date` (`date`),
  ADD KEY `salon` (`store_name`),
  ADD KEY `description` (`description`(3072)),
  ADD KEY `postal_code` (`postal_code`),
  ADD KEY `country` (`country`),
  ADD KEY `state` (`state`),
  ADD KEY `city` (`city`),
  ADD KEY `store_owner` (`store_owner`),
  ADD KEY `store_email` (`store_email`),
  ADD KEY `store_phone` (`store_phone`);

--
-- Indexes for table `salon_services`
--
ALTER TABLE `salon_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service` (`service`),
  ADD KEY `name` (`name`),
  ADD KEY `price1` (`price1`),
  ADD KEY `price2` (`price2`),
  ADD KEY `price3` (`price3`),
  ADD KEY `small` (`small`),
  ADD KEY `medium` (`medium`),
  ADD KEY `large` (`large`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `date` (`date`),
  ADD KEY `service_name` (`service_name`),
  ADD KEY `main_sevice` (`main_service`),
  ADD KEY `main_service` (`main_service`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapist_id` (`therapist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_url` (`user_url`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `name` (`name`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role` (`role`),
  ADD KEY `service_id` (`salon_id`),
  ADD KEY `occupation` (`occupation`),
  ADD KEY `date` (`date`),
  ADD KEY `birthday` (`birthday`),
  ADD KEY `gender` (`gender`),
  ADD KEY `surname` (`surname`),
  ADD KEY `monday` (`monday`),
  ADD KEY `tuesday` (`tuesday`),
  ADD KEY `wednesday` (`wednesday`),
  ADD KEY `thursday` (`thursday`),
  ADD KEY `frriday` (`friday`),
  ADD KEY `saturday` (`saturday`),
  ADD KEY `sunday` (`sunday`),
  ADD KEY `branch` (`branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salons`
--
ALTER TABLE `salons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salon_services`
--
ALTER TABLE `salon_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
