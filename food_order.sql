-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 09:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Thai Food'),
(2, 'Korean Food'),
(3, 'Chinese Food');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `delivery_fee_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `delivery_fee_id`, `payment_id`, `order_id`, `status`, `phone`) VALUES
(22, 1, 1, 1, '1', '09101010'),
(23, 2, 1, 2, '1', '09101010'),
(24, 2, 1, 3, '0', '0977481324'),
(25, 2, 1, 4, '1', '09101010'),
(26, 2, 1, 5, '1', '09101010'),
(27, 2, 2, 6, '0', '09101010'),
(28, 1, 1, 7, '0', '09101010'),
(29, 1, 1, 8, '0', '09101010'),
(30, 2, 1, 9, '0', '09101010'),
(31, 6, 2, 10, '0', '09101010'),
(32, 4, 2, 11, '0', '09101010'),
(33, 2, 1, 12, '0', '0977481324'),
(34, 1, 1, 13, '0', '09101010'),
(35, 1, 1, 14, '0', '09101010'),
(36, 2, 1, 15, '0', '0989898333'),
(37, 2, 1, 16, '0', '09101010'),
(38, 1, 2, 17, '1', '09101010'),
(39, 3, 2, 18, '0', '09101010'),
(40, 2, 1, 19, '0', '09101010'),
(41, 1, 1, 20, '0', '09101010'),
(42, 2, 1, 21, '0', '09101010'),
(43, 2, 1, 22, '0', '09101010'),
(44, 4, 1, 23, '0', '09101010'),
(45, 1, 1, 24, '0', '09101010'),
(46, 2, 1, 25, '0', '09101010'),
(47, 2, 2, 26, '0', '09101010'),
(48, 1, 1, 27, '0', '09101010'),
(49, 1, 1, 28, '0', '09101010'),
(50, 1, 1, 29, '0', '09101010'),
(51, 3, 1, 30, '0', '09101010'),
(52, 2, 1, 31, '0', '0977481324'),
(53, 2, 1, 32, '0', '09101010'),
(54, 2, 1, 33, '0', '09101010'),
(55, 2, 1, 34, '0', '09101010'),
(56, 3, 2, 35, '1', '0956678788'),
(57, 3, 2, 36, '0', '0956678788'),
(58, 6, 1, 37, '0', '08877789'),
(59, 2, 1, 38, '0', '0956678788'),
(61, 3, 1, 40, '1', '0956678788'),
(62, 5, 1, 52, '0', '09978313769'),
(63, 2, 2, 53, '0', '09978313769');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_fee`
--

CREATE TABLE `delivery_fee` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_fee`
--

INSERT INTO `delivery_fee` (`id`, `city_name`, `fee`) VALUES
(1, 'Pyi Gyi Ta gon', '1500'),
(2, 'TampaWadi', '1500'),
(3, 'Chan Mya Tha Zi', '2000'),
(4, 'ChanAyeTharSi', '2000'),
(5, 'Aung Mya Thar Zan', '1500'),
(6, 'Chan Aye Thar Zan', '1500'),
(7, 'Maha Aung Myay', '1500'),
(9, 'Garden City', '2000'),
(10, 'Mandalay', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `feedback`) VALUES
(1, 'htet@gmail.com', 'good'),
(2, 'mgmg@gmail.com', 'very good!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_amount`) VALUES
(1, 2, '2022-08-03 01:51:06', '17000'),
(2, 2, '2022-08-05 01:51:35', '11500'),
(3, 2, '2022-08-08 01:52:02', '11000'),
(4, 2, '2022-09-06 01:52:27', '10500'),
(5, 2, '2022-09-13 01:53:47', '8000'),
(6, 2, '2023-05-02 01:54:10', '11500'),
(7, 5, '2023-05-03 01:55:12', '8500'),
(8, 5, '2023-05-06 01:55:32', '10500'),
(9, 5, '2023-05-11 01:55:55', '10000'),
(10, 5, '2023-05-23 01:56:21', '10500'),
(11, 5, '2023-07-08 01:58:55', '6000'),
(12, 5, '2023-07-14 01:59:31', '24000'),
(13, 5, '2023-07-22 01:59:56', '10500'),
(14, 13, '2023-07-29 02:01:20', '8000'),
(15, 13, '2023-08-07 02:01:44', '7000'),
(16, 13, '2023-08-13 02:02:06', '9500'),
(17, 13, '2023-08-06 02:02:33', '14000'),
(18, 13, '2023-09-01 02:03:05', '7000'),
(19, 13, '2023-09-02 02:03:21', '7000'),
(20, 14, '2023-09-03 02:04:09', '9000'),
(21, 14, '2023-09-04 02:05:35', '6000'),
(22, 14, '2023-09-04 02:17:52', '5500'),
(23, 15, '2023-09-05 02:18:42', '5500'),
(24, 15, '2023-09-06 02:19:19', '6000'),
(25, 15, '2021-09-06 02:19:40', '11500'),
(26, 15, '2023-09-06 02:21:51', '10000'),
(27, 15, '2023-09-06 02:22:09', '9000'),
(28, 15, '2022-09-06 02:22:29', '6500'),
(29, 15, '2022-09-09 02:22:49', '8000'),
(30, 15, '2023-09-06 02:23:30', '18000'),
(31, 15, '2023-09-06 02:23:51', '12000'),
(32, 15, '2023-09-06 02:24:24', '6500'),
(33, 15, '2023-09-06 02:24:41', '9500'),
(34, 15, '2023-09-06 02:25:01', '8500'),
(35, 81, '2023-09-07 06:54:01', '11000'),
(36, 81, '2023-09-07 06:55:01', '4000'),
(37, 82, '2023-09-07 07:24:12', '44000'),
(38, 81, '2023-09-07 09:16:48', '6500'),
(39, 81, '2023-09-07 09:16:49', '0'),
(40, 81, '2023-09-07 09:18:13', '11000'),
(41, 2, '2021-08-03 01:51:06', '17000'),
(42, 2, '2021-08-03 01:51:06', '17000'),
(43, 2, '2021-08-08 01:52:02', '11000'),
(44, 15, '2021-08-06 02:19:40', '11500'),
(45, 15, '2021-01-01 02:21:51', '10000'),
(46, 15, '2021-01-02 02:22:09', '9000'),
(47, 15, '2021-02-06 02:21:51', '10000'),
(48, 15, '2021-02-03 02:22:29', '5500'),
(49, 15, '2021-04-03 02:22:29', '5500'),
(50, 15, '2021-05-19 02:22:29', '5500'),
(51, 15, '2021-06-12 02:21:51', '10000'),
(52, 2, '2023-11-17 07:59:41', '3500'),
(53, 1, '2023-12-12 07:53:49', '6500');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `qty`, `order_id`) VALUES
(1, 5, 1, 1),
(2, 16, 1, 1),
(3, 26, 1, 1),
(4, 50, 1, 2),
(5, 14, 2, 2),
(6, 12, 1, 3),
(7, 22, 1, 3),
(8, 24, 1, 3),
(9, 17, 1, 4),
(10, 22, 1, 4),
(11, 11, 1, 4),
(12, 12, 1, 5),
(13, 7, 2, 5),
(14, 8, 2, 6),
(15, 18, 2, 6),
(16, 10, 1, 7),
(17, 18, 1, 7),
(18, 12, 1, 7),
(19, 9, 1, 8),
(20, 15, 2, 8),
(21, 12, 1, 8),
(22, 11, 1, 9),
(23, 18, 1, 9),
(24, 20, 1, 9),
(25, 16, 1, 10),
(26, 9, 1, 10),
(27, 28, 1, 10),
(28, 13, 1, 11),
(29, 14, 1, 11),
(30, 3, 1, 12),
(31, 24, 5, 12),
(32, 26, 1, 12),
(33, 25, 1, 13),
(34, 10, 3, 13),
(35, 1, 1, 14),
(36, 20, 1, 14),
(37, 18, 1, 14),
(38, 7, 1, 15),
(39, 24, 1, 15),
(40, 11, 2, 16),
(41, 18, 1, 16),
(42, 12, 1, 17),
(43, 20, 1, 17),
(44, 28, 1, 17),
(45, 24, 1, 17),
(46, 12, 2, 18),
(47, 11, 1, 19),
(48, 20, 1, 19),
(49, 1, 1, 20),
(50, 10, 2, 20),
(51, 20, 1, 20),
(52, 13, 1, 21),
(53, 8, 1, 21),
(54, 26, 1, 22),
(55, 5, 1, 23),
(56, 23, 1, 23),
(57, 9, 1, 24),
(58, 20, 1, 24),
(59, 18, 2, 25),
(60, 28, 1, 25),
(61, 13, 1, 26),
(62, 20, 2, 26),
(63, 19, 1, 27),
(64, 14, 2, 27),
(65, 7, 1, 28),
(66, 12, 1, 28),
(67, 17, 1, 29),
(68, 10, 1, 29),
(69, 8, 1, 29),
(70, 7, 1, 30),
(71, 40, 1, 30),
(72, 44, 1, 30),
(73, 35, 1, 30),
(74, 15, 1, 31),
(75, 26, 2, 31),
(76, 15, 1, 32),
(77, 14, 1, 32),
(78, 16, 1, 33),
(79, 50, 1, 33),
(80, 17, 1, 34),
(81, 8, 2, 34),
(82, 12, 2, 28),
(83, 26, 1, 1),
(84, 26, 1, 1),
(85, 4, 2, 35),
(86, 5, 4, 35),
(87, 1, 3, 35),
(88, 3, 2, 36),
(89, 10, 10, 37),
(90, 14, 9, 37),
(91, 1, 3, 38),
(92, 4, 2, 38),
(93, 3, 3, 40),
(94, 6, 3, 40),
(95, 12, 2, 3),
(96, 1, 1, 52),
(97, 2, 1, 52),
(98, 1, 3, 53),
(99, 10, 1, 53);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_type`) VALUES
(1, 'Kpay'),
(2, 'Wavepay'),
(3, 'AYA'),
(5, 'CB Pay'),
(6, 'KBZ Pay');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `cat_id`) VALUES
(1, 'Gabapentin', '1000', '1694073838tom-yum-2.jpg', 'Stereo radiosurgery NEC', 1),
(2, 'Cat Hair, Standardized', '1000', '1694073970Mah-Hor-(Galloping-Horses).webp', 'Hemorr contrl post T & A', 3),
(3, 'False Ragweed', '1000', '1694074398Spicy-Noodle-Soup.webp', 'Excis lesion of muscle', 2),
(4, 'Zyprexa', '1000', '1694074416pra-plao-2.jpg', 'Nonop remov hrt asst sys', 2),
(5, 'Royal Antibacterial Passion Plum Hand Cleanse', '1000', '1694073780Thai-Dry-Meat-Curry.webp', 'Excision of hydrocele', 2),
(6, 'Ohm 8 Hour Pain Reliever/Fever Reducer', '2000', '1694073874khao-kha-moo-2.jpg', 'Intrcoronry thromb infus', 2),
(7, 'AVODART', '2000', '1694074210Pad-See-Ew.webp', 'Mesenteric repair NEC', 3),
(8, 'Peptic Relief', '2000', '16939765839f06711e-a761-44c2-9539-c9b0e669c6d9.webp', 'Excise bone for grft NOS', 1),
(9, 'Molds, Rusts and Smuts, Curvularia spicifera', '2000', '1694072264496b95ba-5a96-4728-84c5-f5abf8ce763d.webp', 'Periph nerve incis NEC', 1),
(10, 'EMEND', '2000', '1694073886khao-kha-moo-2.jpg', 'Enterovesico fist repair', 2),
(11, 'eye itch', '2500', '1694074274ec5acea6-0ddd-4090-b123-78b535b125d4.webp', 'Excision of wrist NEC', 3),
(12, 'GPS Topical Anesthetic', '2500', '1694073903kaeng-som-2.jpg', 'Thermcaut scler w iridec', 2),
(13, 'Pollens - Trees, Eucalyptus (Blue Gum) Eucalyptus globulus', '2500', '1694074316mango-sticky-rice-2.jpg', 'Transab lg bowel endosc', 3),
(14, 'PROVIGIL', '2500', '169407421976741ec4-324b-412e-950a-bc6c3d64987d.webp', 'Middle ear incision', 3),
(15, 'Medline Enema', '2500', '169407227576741ec4-324b-412e-950a-bc6c3d64987d.webp', 'Gb-to-intestine anastom', 1),
(16, 'Neutrogena MoistureShine SPF20', '3000', '1694074135e474641d-317d-4c62-933c-934b8b2eb63e.webp', 'Breast tissu destruc NOS', 2),
(17, 'EXCEDRIN', '3000', '16940722982136cc48-4379-41ec-b02f-f29b89f360d0.webp', 'Repair retina detach NEC', 1),
(18, 'Hydrochlorothiazide', '3000', '1694072313e474641d-317d-4c62-933c-934b8b2eb63e.webp', 'Subtalr jt arthroereisis', 1),
(19, 'Anticavity Rinse', '3000', '1694072329gai-yang-2.jpg', 'Foot reattachment', 1),
(20, 'Lidocaine Viscous', '3000', '1694074152Spicy-Noodle-Soup.webp', 'Ocular thermography', 2),
(21, 'OXALIPLATIN', '3500', '1694074236thai-coconut-chicken.webp', 'LITT lesn, guide oth/NOS', 3),
(22, 'Irbesartan', '3500', '1694074173massaman-curry-2.jpg', 'Remov other urin device', 2),
(23, 'ONDANSETRON', '3500', '1694074328hoi-tod-oyster-omelette-2.jpg', 'Perirectal excision', 2),
(24, 'ziprasidone hydrochloride', '3500', '1694074254Steamed-Fish-with-Spicy-Lime-Sauce.webp', 'Cardiac mapping', 3),
(25, 'Flawless Finish Dual Perfection Makeup SPF 8 Ivory', '3500', '1694074344kluai-buat-chi-2.jpg', 'Lap incis hern repr-grft', 2),
(26, 'VOLTAREN', '4000', '1694073918gai-yang-2.jpg', 'Culture-endocrine', 3),
(27, 'Sandy Beige Expert Finish Makeup Makeup Broad Spectrum SPF 25', '4000', '1694073984khao-kluk-kapi-2.jpg', 'Reopen craniotomy site', 3),
(28, 'Gas Relief', '4000', '1694073996image2.jpg.webp', 'Replace trach tube', 3),
(29, 'Pleo Sanuvis', '4000', '1694072342kluai-buat-chi-2.jpg', 'Pros repair atria def-cl', 1),
(30, 'Loratadine and Pseudoephedrine Sulfate', '4000', '1694074023Minced-Pork-Stir-Fried-with-Thai-Basil.webp', 'Psychia interv/eval NEC', 3),
(31, 'Xyzal', '4500', '1694074041hor-mok-pla-2.jpg', 'Intelligence test admin', 3),
(32, 'SECRETIPSS SCALP HAIR ESSENTIAL BOOSTER', '4500', '1694074056pad-thai-3.jpg', 'Loc excis esoph divertic', 3),
(33, 'Urinary Tract Infections', '4500', '1694074069khao-mok-gai-thai-biryani-2.jpg', 'Urethrostomy closure', 3),
(34, 'Womens Mitchum Advanced Invisible Antiperspirant Deodorant', '4500', '1694072355khao-kluk-kapi-2.jpg', 'Spine tract w skull dev', 1),
(35, 'Ringers', '4500', '1693976154image3.jpg', 'Tongue operation NEC', 1),
(36, 'Nyloxin', '4500', '1694072375khao-pad-fried-rice-2.jpg', 'Unilat rad neck dissect', 1),
(37, 'healthy accents naproxen sodium', '4500', '1694073765thai-green-curry-2.jpg', 'Anal incision NEC', 1),
(38, 'Vecuronium Bromide', '4500', '1694073853chicken-pandan-leaves-2.jpg', 'Cholecystostomy NEC', 1),
(39, 'Venlafaxine Hydrochloride', '4500', '1694074081khao-kha-moo-2.jpg', 'Bone graft-radius/ulna', 1),
(40, 'HYDROCODONE BITARTRATE AND ACETAMINOPHEN', '4500', '1694074195pad-thai-2.webp', 'Decortication of lung', 3),
(41, 'Glyburide', '5000', '1694074009kaeng-som-2.jpg', 'Osteoclasis-metatar/tar', 3),
(42, 'CENTER-AL - POPULUS DELTOIDES SSP. MONILIFERA POLLEN', '5000', '1694074360bami-kiao-wonton-2.jpg', 'Therapeu erythropheresis', 2),
(43, 'Boudreauxs', '5000', '1694073805tom-yum-goong.webp', 'Incis cx to assist deliv', 2),
(44, 'Fairly Light Foundation SPF 15', '5000', '1694074107jok-rice-porridge-2.jpg', 'Vas & epididy repair NEC', 1),
(45, 'Equaline Hair Regrowth Treatment', '5000', '1694073938pad-kra-pao-rice-1-1024x683.jpg', 'Leg artery resec w repla', 2),
(46, 'good sense pain relief', '5000', '1694074124khao-kha-moo-2.jpg', 'Other nasal sinus ops', 1),
(47, 'Sciatica', '5000', '1694073957Thai-Coconut-Curry-Noodle-Soup.webp', 'Unilat radical mastectom', 2),
(48, 'OMEPRAZOLE DR', '5000', '1694074093khao-pad-fried-rice-2.jpg', 'Ethmoidotomy', 1),
(49, 'Diabenex', '5000', '1694074379khao-kluk-kapi-2.jpg', 'Reduc overcorrect ptosis', 1),
(50, 'ToPoKi', '5000', '1694265551kf.jpg', 'Excis cul-de-sac lesion', 2),
(51, ' Pan-fried gyoza', '8000', '1694265406m.jpg', ' gyoza', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'Khin Htwe', 'khin@gmail.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'TaKhot Khamine Region'),
(2, 'Rose', 'dcoase1@imdb.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '15707 Browning Court'),
(3, 'Jasmine', 'jganing2@scientificamerican.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '25 Texas Way'),
(4, 'Lynde', 'ylynde3@pbs.org', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3 Atwood Pass'),
(5, 'Bilsford', 'abilsford4@adobe.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '307 Merry Court'),
(6, 'Leechman', 'tleechman5@goo.gl', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '7 Clyde Gallagher Avenue'),
(7, 'Marfe', 'lmarfe6@google.es', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '91 Arizona Junction'),
(8, 'Semble', 'jsemble7@dmoz.org', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '9 Prentice Drive'),
(9, 'De Carlo', 'ndecarlo8@google.es', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '71 Golf View Terrace'),
(10, 'Georgiev', 'cgeorgiev9@prlog.org', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '95423 Atwood Junction'),
(11, 'Foskew', 'ffoskewa@army.mil', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '30 Blue Bill Park Parkway'),
(12, 'Redgewell', 'jredgewellb@smh.com.au', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '51 Pankratz Trail'),
(13, 'Pottie', 'spottiec@nytimes.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '2408 Kingsford Avenue'),
(14, 'Monica', 'wmuncied@yelp.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '8256 Surrey Drive'),
(15, 'Miya', 'snylese@live.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '9 American Lane'),
(16, 'Jedrych', 'ajedrychf@nasa.gov', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '365 Walton Center'),
(17, 'Glancey', 'bglanceyg@ezinearticles.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '32 Mayer Center'),
(18, 'Gut', 'aguth@pen.io', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '24 Monterey Hill'),
(19, 'Servant', 'rservanti@sfgate.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '98 Shelley Crossing'),
(20, 'Jeckells', 'bjeckellsj@mail.ru', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '87 Annamark Way'),
(21, 'eparrish0@php.net', 'bstoffer0@uiuc.edu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3 Towne Lane'),
(22, 'genston1@wiley.com', 'lteulier1@yellowbook.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '72821 Roth Point'),
(23, 'kbreed2@wufoo.com', 'jdensie2@deviantart.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '52 Eggendart Drive'),
(24, 'nbunker3@slashdot.org', 'fmacknockiter3@ucoz.ru', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '8 Hazelcrest Lane'),
(25, 'ehegden4@shareasale.com', 'dmcenteggart4@booking.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '619 Sullivan Way'),
(26, 'beschalotte5@icio.us', 'lmacmearty5@purevolume.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '2793 Buena Vista Terrace'),
(27, 'wbergeau6@ucoz.com', 'scicconetti6@sun.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '38222 Sutteridge Circle'),
(28, 'cgentzsch7@livejournal.com', 'cchevalier7@ifeng.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '42864 Mockingbird Place'),
(29, 'clattimore8@unesco.org', 'aeginton8@independent.co.uk', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '0241 Express Center'),
(30, 'edressel9@youku.com', 'leggleston9@prnewswire.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '529 Logan Point'),
(31, 'fplaicea@amazonaws.com', 'amullena@bloomberg.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '68097 Lien Avenue'),
(32, 'llowisb@1688.com', 'icallesb@spiegel.de', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '61 Jenna Way'),
(33, 'sackeroydc@archive.org', 'flunkc@de.vu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '78555 Mandrake Street'),
(34, 'dtrehearnd@barnesandnoble.com', 'aneubigind@artisteer.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '38 Towne Alley'),
(35, 'acollinse@mayoclinic.com', 'cpetyte@meetup.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '50 7th Center'),
(36, 'rkaindlf@tmall.com', 'cbackhurstf@unesco.org', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '9 Canary Trail'),
(37, 'fbeirneg@intel.com', 'aandreag@usa.gov', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '0063 Northview Drive'),
(38, 'cdolohuntyh@ask.com', 'wcaltonh@toplist.cz', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '7790 Rockefeller Park'),
(39, 'rvaleki@hc360.com', 'dantoniasi@mtv.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '68 Meadow Ridge Point'),
(40, 'vdaniellsj@mediafire.com', 'asandesj@harvard.edu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '99941 Scofield Lane'),
(41, 'lbeevisk@paginegialle.it', 'agillicek@cbslocal.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '26 Blue Bill Park Point'),
(42, 'nvalesl@springer.com', 'cbleesl@csmonitor.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '4753 Petterle Plaza'),
(43, 'ilabam@pagesperso-orange.fr', 'hgledstanem@mayoclinic.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '0 Morningstar Park'),
(44, 'bforstern@phoca.cz', 'ngagien@surveymonkey.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '14 Shoshone Court'),
(45, 'ahassono@altervista.org', 'bpindredo@g.co', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '59563 Novick Hill'),
(46, 'ddrewryp@devhub.com', 'gbrumblep@last.fm', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '10556 Mosinee Trail'),
(47, 'spoizerq@ycombinator.com', 'kdillestonq@sbwire.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '93839 Pepper Wood Junction'),
(48, 'rbrettorr@tumblr.com', 'bnorthenr@nature.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '4 Sage Trail'),
(49, 'jalcidos@gov.uk', 'pselleks@ox.ac.uk', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1239 Holmberg Lane'),
(50, 'jdarwent@webs.com', 'bnoyest@state.tx.us', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '6452 Meadow Ridge Street'),
(51, 'rdonaghyu@ft.com', 'cmullanyu@themeforest.net', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '29332 7th Street'),
(52, 'kbracciv@pcworld.com', 'wmccullyv@booking.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '9937 Lien Plaza'),
(53, 'sainsliew@seattletimes.com', 'mcurdw@census.gov', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '39798 Texas Court'),
(54, 'awibrewx@slideshare.net', 'afeaversx@usnews.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '42112 Hanover Terrace'),
(55, 'jcoggony@weibo.com', 'uboggisy@wufoo.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '2 Rockefeller Lane'),
(56, 'tcutajarz@mac.com', 'bnormantz@slashdot.org', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '121 Surrey Pass'),
(57, 'dmacwilliam10@baidu.com', 'rowlner10@psu.edu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '655 Declaration Avenue'),
(58, 'kgallardo11@tiny.cc', 'ohuton11@irs.gov', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '88 American Ash Parkway'),
(59, 'ctriplow12@nifty.com', 'apagon12@about.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '69 Brentwood Point'),
(60, 'gburndred13@home.pl', 'nnund13@ucsd.edu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '958 Macpherson Trail'),
(61, 'kballintime14@squarespace.com', 'stidbold14@ed.gov', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '21 Cambridge Trail'),
(62, 'bcarbin15@businesswire.com', 'hseiter15@upenn.edu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '22 Everett Place'),
(63, 'zcarlick16@unc.edu', 'mcharity16@spotify.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '72 South Alley'),
(64, 'rbickersteth17@ocn.ne.jp', 'warnau17@auda.org.au', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1837 Scoville Drive'),
(65, 'mniess18@nhs.uk', 'jlester18@skype.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '7749 Homewood Drive'),
(66, 'cgigg19@ezinearticles.com', 'dcarnell19@multiply.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3 Leroy Hill'),
(67, 'ebuten1a@studiopress.com', 'jlahiff1a@studiopress.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1 Grim Hill'),
(68, 'gfforde1b@cornell.edu', 'tstoneman1b@clickbank.net', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '6 Jenifer Road'),
(69, 'akigelman1c@theguardian.com', 'bhuckle1c@ucoz.ru', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '86 Westport Terrace'),
(70, 'dbartozzi1d@si.edu', 'mchatterton1d@bandcamp.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '12526 Northland Pass'),
(71, 'fbice1e@epa.gov', 'emcgaughie1e@nhs.uk', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3189 Portage Way'),
(72, 'medworthye1f@go.com', 'wivakhno1f@yandex.ru', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3 Victoria Way'),
(73, 'idalgleish1g@seattletimes.com', 'jmillichap1g@flickr.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '24373 Continental Point'),
(74, 'arichley1h@delicious.com', 'vmctrustram1h@addtoany.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '4 Lake View Plaza'),
(75, 'marmand1i@java.com', 'dfirpi1i@pinterest.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '481 Walton Trail'),
(76, 'hbidewell1j@arstechnica.com', 'bmulberry1j@sun.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '6427 Morningstar Plaza'),
(77, 'bcrowdace1k@squidoo.com', 'darni1k@kickstarter.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '40 Pine View Parkway'),
(78, 'ipaske1l@paypal.com', 'dwillcox1l@dedecms.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '28062 Spohn Pass'),
(79, 'afirpo1m@sciencedaily.com', 'etrotton1m@feedburner.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '41 Milwaukee Crossing'),
(80, 'lkowal1n@1und1.de', 'csacco1n@alibaba.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '511 Scott Road'),
(81, 'Htet', 'htet@gmail.com', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 'Mandalay'),
(82, 'Mg Mg', 'mgmg@gmail.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'Magway');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_fee_id` (`delivery_fee_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`delivery_fee_id`) REFERENCES `delivery_fee` (`id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
