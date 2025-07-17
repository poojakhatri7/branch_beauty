-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 17, 2025 at 01:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `branch_beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_details`
--

CREATE TABLE `admin_login_details` (
  `id` int(40) NOT NULL,
  `branch_details_id` int(200) DEFAULT NULL,
  `branch_name` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(10) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `gst_number` varchar(200) DEFAULT NULL,
  `last_invoice_no` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login_details`
--

INSERT INTO `admin_login_details` (`id`, `branch_details_id`, `branch_name`, `name`, `mobile`, `email`, `address`, `password`, `role`, `file`, `gst_number`, `last_invoice_no`) VALUES
(9, 5, 'Lucknow branch', 'pooja khatri', 8707858421, 'pooja@gmail.com', 'alambhag', '123', 1, 'upload-images/hair_06.jpg', '29AALC6789996', 98000006),
(12, NULL, NULL, 'navya khatri', 8707858427, 'navya@gmail.com', 'Hazratganj', '12345', 2, 'upload-images/beauty_02.jpg', NULL, NULL),
(16, NULL, NULL, 'anvi', 8019858421, 'anvi@gmail.com', 'Hazratganj', '1234', 2, 'upload-images/team-9.jpg', NULL, NULL),
(26, NULL, NULL, 'Maya khatri', 7907858477, 'maya@gmail.com', 'rajajipuram ', '7777', 3, 'upload-images/hair_08.jpg', NULL, NULL),
(27, 1, 'Delhi branch', 'priyanka tondon', 6657858477, 'tondon@gmail.com', 'lucknow', '12345', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `all_services`
--

CREATE TABLE `all_services` (
  `a_id` int(40) NOT NULL,
  `all_service` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `discount_percentage` int(200) NOT NULL,
  `price_after_discount` int(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `file1` varchar(200) NOT NULL,
  `file2` varchar(200) NOT NULL,
  `service_number` int(100) NOT NULL,
  `c_id_category_service` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_services`
--

INSERT INTO `all_services` (`a_id`, `all_service`, `price`, `discount_percentage`, `price_after_discount`, `description`, `file`, `file1`, `file2`, `service_number`, `c_id_category_service`) VALUES
(2, 'Mens haircut', 100, 10, 90, 'The simplest men hairstyles are the buzz cut, crew cut, Ivy League, classic side part, undercut, textured French crop, slick back, comb over', 'upload-images/haircut11.jpg', 'upload-images/haircut12.jpg', 'upload-images/hairr.jpg', 1, 1),
(3, 'blow dry', 100, 10, 90, 'Start by applying a volumizing spray onto your hair and roots', 'upload-images/blowdry1.jpg', 'upload-images/blowdry2.jpg', 'upload-images/blowdry3.jpg', 1, 1),
(5, 'Child Hair cut ', 200, 10, 180, 'Quiff Hairstyle with Short Sides. Buzz Cut. Caesar Cut. Brushed Back Hair with Fade. drop fade with quiff. Curtain Bangs. Scissor Cut kids.', 'upload-images/child hair cut.jpg', 'upload-images/child1.jpg', 'upload-images/child2.jpg', 1, 1),
(6, 'brazillan blow out', 180, 10, 162, '(Includes KC MAX Treatment Spray)', 'upload-images/brazillian.jpg', 'upload-images/brazillian1.jpg', 'upload-images/brazillian2.jpg', 2, 1),
(8, 'Keratin Complex', 300, 50, 150, 'A revolutionary smoothing treatment that infuses keratin deep into the hair cuticle, reducing frizz and curl, and leaving hair smooth, shiny, and manageable.', 'upload-images/keratin.jpg', 'upload-images/61Ai3TMpi6L.jpg', 'upload-images/k1complex.jpg', 2, 1),
(9, 'Keratin Complex Max', 350, 15, 298, '(Service length 60 minutes)', 'upload-images/max123.jpg', 'upload-images/keratin12.jpg', 'upload-images/keratin123.jpg', 2, 1),
(10, 'Permanent Wave', 185, 25, 139, 'The Permanent Wave service at Jolie Spa provides a way to add long-lasting curls or waves to your hair, offering volume and texture', 'upload-images/wave.jpg', 'upload-images/wave1.jpg', 'upload-images/wave2.jpg', 2, 1),
(11, 'Hair Gloss', 550, 21, 435, 'provides hair with high shine and a subtle wash of color while improving the look and feel of hair.', 'upload-images/hair-gloss.jpg', 'upload-images/gloss2.jpg', 'upload-images/gloss1.jpg', 2, 1),
(12, 'Safe Color Treatment', 95, 50, 48, 'These alternatives use natural colorants like henna, indigo, cassia, and coffee, providing a gentle and effective way to color hair without damaging it. ', 'upload-images/colour.jpg', 'upload-images/haircolour1.jpg', 'upload-images/haircolur2.jpg', 2, 1),
(13, 'Hair & Scalp Treatments', 240, 27, 175, 'After thoroughly washing hair, the stylist or person performing the treatment will apply a scalp mask or treatment that meets the specific needs of the scalp.', 'upload-images/scalp_treatment.jpg', 'upload-images/Hair-Scalp-Treament.jpg', 'upload-images/hairscalp1.jpg', 2, 1),
(14, 'Single Process', 130, 80, 26, 'A single process refers to any color service that is done in one step. It can also be reffered to as a base color or a ', 'upload-images/single.jpg', 'upload-images/single2.jpg', 'upload-images/single3.jpg', 3, 1),
(15, 'Double Process', 375, 15, 319, '(gloss not included)', 'upload-images/double.jpg', 'upload-images/double1.jpg', 'upload-images/haircolour1.jpg', 3, 1),
(16, 'Full Head Highlights', 380, 2, 372, 'This technique provides an even, cohesive colour boost that enhances the overall look with a luminous, multi-tonal effect', 'upload-images/full.jpg', 'upload-images/double11.jpg', 'upload-images/double23.jpg', 3, 1),
(17, 'Half Head Highlights', 290, 70, 87, 'Service length 1,5 hours', 'upload-images/half.jpg', 'upload-images/double121.jpg', 'upload-images/blowdry1.jpg', 3, 1),
(18, 'Balayage', 220, 90, 22, 'Dye or lightener is usually painted on, starting midshaft and becoming denser as it moves down the section of hair to the ends', 'upload-images/balayaye.jpg', 'upload-images/max123.jpg', 'upload-images/single2.jpg', 3, 1),
(19, 'Color Refresh', 130, 60, 52, 'Color Refresh Autumn Red 300 ml is a red color bomb containing red color pigments', 'upload-images/refresh.webp', 'upload-images/colorrefresh34.jpg', 'upload-images/colorrefresh12.jpg', 3, 1),
(20, 'Blowdry with Extensions', 95, 5, 90, 'Blowdry your hair in a downward motion to help prevent frizz and smooth your strands', 'upload-images/extension.jpg', 'upload-images/blowdry23.jpg', 'upload-images/blowdry34.jpg', 4, 1),
(21, 'Extensions Service', 110, 25, 83, 'Discover the New & Trendy World of Hair Extensions. At the forefront of beauty, we offer premium hair extensions that cater to all hair types and tones.', 'upload-images/extensionservice.jpg', 'upload-images/extensionservices1.jpg', 'upload-images/extensionservices3.jpg', 4, 1),
(22, 'Keratin Hair Extensions', 860, 15, 731, 'Unlike most hair extension types, keratin bond extensions last about 3 to 6 months', 'upload-images/keratinn.jpg', 'upload-images/double1.jpg', 'upload-images/keratinhairextension21.jpg', 4, 1),
(23, 'Hair Extension Removal', 275, 70, 83, 'Fast Acting Remover for Tape-in Hair Extensions, Wig Glue, and Double-Sided Extension Tape', 'upload-images/removal.jpg', 'upload-images/extensionremoval1.png', 'upload-images/extensionremoval43.jpg', 4, 1),
(24, 'Herbal Facial', 80, 5, 76, 'Service length 1 hour', 'upload-images/herbal.jpg', 'upload-images/herbalfacial1.jpg', 'upload-images/herbalfacial2.jpg', 5, 2),
(25, 'Deep Cleaning Facial', 130, 25, 98, 'Service length 55 minutes', 'upload-images/deepcleaning3.jpg', 'upload-images/herbalfacial2.jpg', 'upload-images/deepcleaning2.jpg', 5, 2),
(26, 'Organic Facial', 185, 7, 172, 'Service length 1,5 hours', 'upload-images/organic.jpg', 'upload-images/FACIAL--scaled.jpg', 'upload-images/facial231.jpg', 5, 2),
(27, 'Four Layer Facial', 140, 50, 70, 'A four-layer facial is a skincare treatment that involves applying multiple layers of products to the face, often focusing on specific skin concerns like aging, brightening, or hydration. ', 'upload-images/fourlayer2.jpg', 'upload-images/fourlayer3.jpg', 'upload-images/fourlayerfacial1.jpg', 5, 2),
(28, 'Biolight Facial', 165, 20, 132, 'Biolight facials aim to reduce the appearance of dark spots, age spots, acne scars, and hyperpigmentation, leaving skin more radiant and even-toned. ', 'upload-images/biolight1.jpg', 'upload-images/biologht2.jpg', 'upload-images/biolight3.jpg', 5, 2),
(32, 'Anti-Ageing Facial', 175, 50, 88, 'Service length 50 minutes', 'upload-images/anti.jpg', 'upload-images/antiaging1.jpg', 'upload-images/antiaging2.jpg', 5, 2),
(33, 'Gentleman’s Facial', 60, 10, 54, 'Service length 50 minutes', 'upload-images/gentleman.jpg', 'upload-images/gentleman2.jpg', 'upload-images/gentleman1.jpg', 5, 2),
(34, 'Teen Facial', 200, 20, 160, 'Specific to teenagers, this facial helps to control and minimize acne breakouts. Includes a gentle cleansing, exfoliation, extractions and customized masque', 'upload-images/teenfacial2.jpg', 'upload-images/teenfacial1.jpg', 'upload-images/teenfacial3.jpg', 5, 2),
(36, 'Eyebrow Waxing', 15, 10, 14, 'Eyebrow waxing is a safe and effective way to remove unwanted hair. Here are a few reasons why you should consider seeing a cosmetic specialist to have your eyebrows waxed: Longer Regrowth Period.', 'upload-images/eyebrowwax3.jpg', 'upload-images/eyebrow2.jpg', 'upload-images/eyebrowwax1.jpg', 6, 2),
(38, 'Lip Waxing', 12, 25, 9, 'Service length 40 minutes', 'upload-images/lip.jpg', 'upload-images/lipwaxiing3.jpg', 'upload-images/lipwaxing2.jpg', 6, 2),
(39, 'Half Arm Waxing', 30, 20, 24, 'Service length 1,5 hours', 'upload-images/halfarm.jpg', 'upload-images/halfarm1.jpg', 'upload-images/halfarm2.jpg', 6, 2),
(40, 'Cheeks Waxing', 15, 25, 11, 'Service length 2 hours', 'upload-images/cheeks.jpg', 'upload-images/cheecks1.jpg', 'upload-images/cheeks2.jpg', 6, 2),
(41, 'Full Arm Waxing', 45, 40, 27, 'Service length 1,5 hours', 'upload-images/full_armwaxing.jpg', 'upload-images/fullarmwax234.jpg', 'upload-images/fullarmwax45.jpg', 6, 2),
(42, 'Full Face Waxing', 100, 20, 80, 'Service length 4 hours', 'upload-images/fullface.jpg', 'upload-images/face1jpg.jpg', 'upload-images/face2.jpg', 6, 2),
(43, 'Half Leg Waxing', 30, 10, 27, 'Service length 1 hour', 'upload-images/waxing-half-67.jpg', 'upload-images/halflegwax12.jpg', 'upload-images/waxing-half-67.jpg', 6, 2),
(44, 'Under Arm Waxing', 20, 10, 18, 'Service length 40 mins', 'upload-images/halfarmwax342.jpg', 'upload-images/halfarm232.jpg', 'upload-images/halfarmwax342.jpg', 6, 2),
(45, 'Full Leg Waxing', 50, 25, 38, 'Service length 1,5 hours', 'upload-images/full_legwax.jpg', 'upload-images/fullleg45.jpg', 'upload-images/fullwax1234.png', 6, 2),
(47, 'Eyebrow Shaping', 50, 25, 38, 'Service length 20 minutes', 'upload-images/eyebrowshaping.jpg', 'upload-images/Eyebrow-Shaping12.jpg', 'upload-images/eyebrowshaping45.jpg', 7, 2),
(48, 'Laser Treatment', 400, 10, 360, 'Service length 30 minutes', 'upload-images/fastface.jpg', 'upload-images/antiaging1.jpg', 'upload-images/biologht2.jpg', 7, 2),
(49, 'Brow Tint', 50, 10, 45, 'Service length 20 minutes', 'upload-images/browtint.jpg', 'upload-images/browtint12.jpg', 'upload-images/browtint121.jpg', 7, 2),
(52, 'Lash Tint', 200, 0, 200, 'Service length 27 minutes', 'upload-images/lashtint1.jpg', 'upload-images/tintt.jpg', 'upload-images/browtint121.jpg', 7, 2),
(53, 'Eyelash Tinting', 25, 10, 23, 'Service length 20 minutes', 'upload-images/eyelashextesion.jpg', 'upload-images/browtint12.jpg', 'upload-images/blowdry2.jpg', 7, 2),
(54, 'Lash Lift', 175, 65, 61, 'Service length 40 minutes', 'upload-images/eyee.jpg', 'upload-images/eye1.png', 'upload-images/eyepic45.jpg', 7, 2),
(55, 'Lash Application', 45, 21, 36, 'Service length 45 minutes', 'upload-images/lash_lifted.jpg', 'upload-images/lashapplication11.jpg', 'upload-images/lash901.jpg', 7, 2),
(56, 'Eyelash Extensions', 155, 10, 140, 'Introducing our exquisite collection of eyelashes made from natural mink hair. Unlike synthetic fibers, these lashes offer a luxurious and wispy feel.', 'upload-images/lashapplication12.jpg', 'upload-images/eyelashextion56.jpg', 'upload-images/eyelashextension12.jpg', 7, 2),
(57, 'Classic Manicure', 19, 25, 14, 'Service length 40 minutes', 'upload-images/download.jpg', 'upload-images/classicmanicure1.jpg', 'upload-images/manicure123.jpg', 8, 3),
(58, 'Spa Manicure', 30, 60, 12, 'Service length 1 hour', 'upload-images/spa.jpg', 'upload-images/spamanicure1.jpg', 'upload-images/spamanicure345.jpg', 8, 3),
(59, 'Signature Gel Manicure', 50, 70, 15, 'Service length 30 minutes', 'upload-images/spa1.jpg', 'upload-images/signaturegel1.jpg', 'upload-images/signature2.jpg', 8, 3),
(60, 'Hard Gel Full Set', 85, 40, 51, 'Service length 30 - 55 minutes', 'upload-images/b.jpg', 'upload-images/classicmanicure1.jpg', 'upload-images/manicure12345.jpg', 8, 3),
(61, 'Nail Art', 20, 10, 18, 'Service length 30 minutes', 'upload-images/nail_art.jpg', 'upload-images/nailart2.jpg', 'upload-images/nailart1.jpg', 9, 3),
(62, 'Callus Treatment', 290, 10, 261, 'treatment', 'upload-images/treatment.jpg', 'upload-images/antiaging1.jpg', 'upload-images/biolight1.jpg', 9, 3),
(63, 'French Polish', 32, 65, 11, 'Service length 1 hour', 'upload-images/qwe.jpg', 'upload-images/fresnchpolish1.png', 'upload-images/fresnchpolish22.jpg', 9, 3),
(64, 'Collagen Mask', 25, 10, 23, 'Service length 45 minutes', 'upload-images/collagen.jpg', 'upload-images/collegenmask1.jpg', 'upload-images/colegn2.jpg', 9, 3),
(65, 'Organic Express Pedi', 76, 20, 61, 'Service length 30 - 55 minutes', 'upload-images/images1.jpg', 'upload-images/organic12.jpg', 'upload-images/manicure1234.jpg', 8, 3),
(66, 'Aloe Vera Manicure', 55, 10, 50, 'Service length 45 minutes', 'upload-images/images12.jpg', 'upload-images/nailart1.jpg', 'upload-images/nailart2.jpg', 8, 3),
(67, 'French Manicure', 100, 20, 80, 'Service length 25-35 minutes', 'upload-images/french.jpg', 'upload-images/frenchmaincure23.jpg', 'upload-images/frenchmanicure44.jpg', 8, 3),
(90, 'djlsdfkd', 23, 0, 0, 'we', '', '', '', 31, 68),
(98, 'Women s Haircut', 200, 50, 100, 'Short hair cuts for women, long hair styles, curly hair styles, bob hairstyles, womens hairstyles', 'upload-images/womens1.jpg', 'upload-images/womenshaircut2.jpg', 'upload-images/womenshaircut3.jpg', 1, 1),
(107, 'haircut', 100, 10, 90, 'good', 'upload-images/browtint12.jpg', '', '', 67, 212);

-- --------------------------------------------------------

--
-- Table structure for table `banner_management`
--

CREATE TABLE `banner_management` (
  `id` int(40) NOT NULL,
  `file` varchar(300) NOT NULL,
  `content` varchar(200) NOT NULL,
  `buttonName` varchar(200) DEFAULT NULL,
  `buttonLink` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_management`
--

INSERT INTO `banner_management` (`id`, `file`, `content`, `buttonName`, `buttonLink`) VALUES
(2, 'upload-images/hero-9.jpg', 'Skin care studio', 'View Menu', 'https://beautyparlour.ranjeetyadav.in/pprice?c_id=1'),
(3, 'upload-images/slide-1.jpg', 'Unleash your beauty with Demo Beauty Studio', 'View Menu', 'https://beautyparlour.edug.in/pprice?c_id=3'),
(9, 'upload-images/slide-15.jpg', 'Hair Care Studio', 'View Menu', 'https://beautyparlour.edug.in/pprice?c_id=1'),
(13, 'upload-images/slide-3.jpg', 'Make up studio', 'View Menu', NULL),
(30, 'upload-images/makeupp.avif', 'Beauty salon', 'View Menu', 'https://beautyparlour.edug.in/pprice?c_id=2'),
(35, 'upload-images/wallpaper51.jpg', 'Artist', 'demo studio Menu', 'https://beautyparlour.edug.in/pprice?c_id=2'),
(38, 'upload-images/wallpaper71.jpg', 'Artist', 'demo studio Menu', 'https://beautyparlour.edug.in/pprice?c_id=1');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Sno` bigint(50) NOT NULL,
  `appointment_id` int(50) NOT NULL,
  `bill_amount` bigint(50) NOT NULL,
  `discount_percent` int(20) NOT NULL,
  `bill_after_discount` int(20) NOT NULL,
  `adding_gst` int(50) NOT NULL,
  `round_off_bill` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Sno`, `appointment_id`, `bill_amount`, `discount_percent`, `bill_after_discount`, `adding_gst`, `round_off_bill`) VALUES
(1, 57, 690, 10, 621, 733, 733),
(2, 58, 0, 10, 302, 356, 356),
(5, 63, 770, 10, 693, 818, 818),
(8, 66, 600, 10, 540, 637, 637),
(9, 98, 0, 10, 302, 356, 356);

-- --------------------------------------------------------

--
-- Table structure for table `branch_details`
--

CREATE TABLE `branch_details` (
  `id` int(200) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `branch_manager_name` varchar(35) NOT NULL,
  `mobile` bigint(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_details`
--

INSERT INTO `branch_details` (`id`, `branch_name`, `city`, `email`, `address`, `branch_manager_name`, `mobile`) VALUES
(1, 'Delhi Branch', 'noida', 'delhi@gmail.com', 'mayur vihar', 'priya sharma ', 2207858489),
(5, 'Lucknow Branch', 'lucknow ', 'xyza@gmail.com', ' RAJAJIPURAM', 'avika gaur', 7777843126);

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `day`, `open_time`, `close_time`) VALUES
(1, 'Monday', '03:00:00', '21:00:00'),
(2, 'Tuesday', '13:00:00', '21:00:00'),
(3, 'Wednesday', '11:04:00', '21:00:00'),
(4, 'Thursday', '10:00:00', '19:30:00'),
(5, 'Friday', '10:00:00', '21:00:00'),
(6, 'Saturday', '11:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_service`
--

CREATE TABLE `category_service` (
  `c_id` int(40) NOT NULL,
  `c_service` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_service`
--

INSERT INTO `category_service` (`c_id`, `c_service`, `description`, `file`) VALUES
(1, 'Hair Services', 'It’s time to give your hair some love', 'upload-images/h.jpg'),
(2, 'Beauty Services', 'Unleash your beauty with Reine Studio', 'upload-images/15.webp'),
(3, 'Hand & Feet services', NULL, 'upload-images/34_SB.jpg'),
(213, 'xyz', '', 'upload-images/browtint121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_message`
--

CREATE TABLE `enquiry_message` (
  `id` int(35) NOT NULL,
  `branch_details_id` varchar(200) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(35) NOT NULL,
  `message` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry_message`
--

INSERT INTO `enquiry_message` (`id`, `branch_details_id`, `branch_name`, `name`, `email`, `mobile`, `message`, `created_at`) VALUES
(22, '5', 'Lucknow Branch', 'pooja', 'pooja@gmail.com', 8899117706, 'hello', '2025-07-01 06:30:58'),
(26, '1', 'Delhi Branch', 'Pari Kapoor', 'pari@gmail.com', 4543555345, 'dfghfhgfgh', '2025-07-17 06:51:11'),
(27, '1', 'Delhi Branch', 'abcd', 'abcd@gmail.com', 3423434234, 'fgfdgdfgfd', '2025-07-17 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `billing_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `appointment_id`, `totalPrice`, `discount`, `billing_number`, `created_at`) VALUES
(1, 57, 300.00, 32.00, '98000012', '2025-06-11 11:27:32'),
(2, 58, 0.00, 10.00, '97000003', '2025-06-11 11:40:01'),
(3, 58, 400.00, 10.00, '98000013', '2025-06-11 11:48:08'),
(4, 58, 0.00, 10.00, '97000004', '2025-06-17 04:38:41'),
(5, 59, 735.00, 32.00, '98000014', '2025-06-17 09:10:55'),
(6, 59, 0.00, 10.00, '97000005', '2025-06-17 09:11:27'),
(7, 58, 0.00, 32.00, '97000006', '2025-06-17 09:57:12'),
(8, 59, 0.00, 40.00, '97000007', '2025-06-17 10:05:07'),
(9, 59, 0.00, 10.00, '97000008', '2025-06-17 10:58:29'),
(10, 59, 0.00, 10.00, '97000008', '2025-06-17 10:58:29'),
(11, 59, 0.00, 32.00, '97000008', '2025-06-17 10:58:29'),
(12, 59, 0.00, 40.00, '97000008', '2025-06-17 10:58:29'),
(13, 59, 0.00, 10.00, '97000009', '2025-06-17 11:39:41'),
(14, 59, 0.00, 10.00, '97000001', '2025-06-17 11:46:18'),
(15, 59, 0.00, 32.00, '97000002', '2025-06-17 12:08:13'),
(16, 58, 0.00, 40.00, '97000003', '2025-06-18 04:34:13'),
(17, 59, 470.00, 35.00, '98000015', '2025-06-18 04:46:26'),
(18, 58, 0.00, 10.00, '97000004', '2025-06-18 05:00:53'),
(19, 59, 400.00, 75.00, '98000016', '2025-06-19 04:07:22'),
(20, 58, 0.00, 32.00, '97000005', '2025-06-19 04:07:54'),
(21, 60, 300.00, 10.00, '98000017', '2025-06-21 05:21:14'),
(22, 60, 600.00, 32.00, '98000018', '2025-06-21 05:21:52'),
(23, 60, 0.00, 32.00, '97000006', '2025-06-21 05:22:33'),
(24, 63, 770.00, 10.00, '98000019', '2025-06-25 09:27:34'),
(25, 63, 0.00, 10.00, '97000007', '2025-06-25 09:28:31'),
(26, 66, 600.00, 10.00, '98000020', '2025-06-25 10:41:48'),
(27, 68, 0.00, 10.00, '92000008', '2025-06-26 09:54:54'),
(28, 69, 277.00, 15.00, '98000021', '2025-06-26 10:37:30'),
(29, 69, 1535.00, 10.00, '98000022', '2025-06-26 11:21:27'),
(30, 70, 130.00, 10.00, '98000023', '2025-06-26 11:30:33'),
(31, 71, 505.00, 10.00, '98000024', '2025-06-26 11:36:43'),
(32, 72, 680.00, 15.00, '98000025', '2025-06-27 08:46:33'),
(33, 72, 692.00, 25.00, '98000026', '2025-06-27 08:47:48'),
(34, 91, 400.00, 10.00, '98000027', '2025-07-07 11:28:29'),
(35, 76, 335.00, 10.00, '98000028', '2025-07-07 11:40:44'),
(36, 75, 600.00, 10.00, '98000029', '2025-07-07 11:44:36'),
(37, 92, 1340.00, 10.00, '98000030', '2025-07-07 11:54:20'),
(38, 96, 400.00, 10.00, '98000031', '2025-07-08 09:31:36'),
(39, 96, 1540.00, 10.00, '98000032', '2025-07-08 09:36:08'),
(40, 97, 660.00, 7.00, '98000033', '2025-07-08 09:38:52'),
(41, 88, 0.00, 10.00, '92000009', '2025-07-08 09:48:20'),
(42, 98, 0.00, 10.00, '92000010', '2025-07-08 09:51:58'),
(43, 98, 0.00, 10.00, '92000011', '2025-07-08 10:05:12'),
(44, 98, 200.00, 10.00, '98000034', '2025-07-08 10:05:51'),
(45, 1, 1000.00, 10.00, '98000001', '2025-07-08 10:26:20'),
(46, 1, 0.00, 10.00, '92000001', '2025-07-08 10:26:45'),
(47, 2, 0.00, 10.00, '92000002', '2025-07-08 10:44:04'),
(48, 3, 500.00, 10.00, '98000001', '2025-07-08 10:48:21'),
(49, 3, 0.00, 10.00, '92000001', '2025-07-08 10:48:37'),
(50, 3, 1135.00, 10.00, '98000002', '2025-07-08 10:49:17'),
(51, 4, 0.00, 10.00, '92000002', '2025-07-11 04:15:15'),
(52, 5, 0.00, 10.00, '92000003', '2025-07-11 04:45:59'),
(53, 5, 0.00, 10.00, '92000004', '2025-07-11 04:46:21'),
(54, 5, 400.00, 32.00, '98000003', '2025-07-11 04:47:18'),
(55, 6, 1670.00, 10.00, '98000004', '2025-07-11 09:07:53'),
(56, 6, 0.00, 40.00, '92000005', '2025-07-11 09:08:42'),
(57, 7, 400.00, 10.00, '98000005', '2025-07-11 09:10:20'),
(58, 7, 100.00, 10.00, '98000006', '2025-07-11 09:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(200) NOT NULL,
  `package_name` varchar(200) NOT NULL,
  `package_number` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `discount` int(200) NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `package_name`, `package_number`, `description`, `discount`, `file`) VALUES
(9, 'platinum package ', '328101', 'A haircut, in the most common sense, is the act of cutting and styling hair, usually performed by a barber or stylist', 10, 'upload-images/biolight1.jpg'),
(10, 'Gold package', '305836', 'Permanent color treatment is traditional oxidization color treatment – oxidization refers to the chemical process that makes it possible to alter the color at the core of the hair', 10, 'upload-images/biolight3.jpg'),
(11, 'silver package ', '648184', 'A \"facial\" is a skin treatment designed to cleanse, exfoliate, and hydrate the skin, often targeting specific concerns like acne, wrinkles, or uneven skin tone', 32, 'upload-images/teenfacial3.jpg'),
(13, 'hair package', '774800', 'different styling of hair ', 40, 'upload-images/blowdry1.jpg'),
(19, 'platinum package ', '443441', 'good', 10, 'upload-images/brazillian1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package_selected`
--

CREATE TABLE `package_selected` (
  `id` int(200) NOT NULL,
  `appointment_id` int(200) DEFAULT NULL,
  `package_name` varchar(200) DEFAULT NULL,
  `package1_id` int(200) DEFAULT NULL,
  `package_number` int(200) DEFAULT NULL,
  `billing_number` int(200) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_selected`
--

INSERT INTO `package_selected` (`id`, `appointment_id`, `package_name`, `package1_id`, `package_number`, `billing_number`, `created_at`, `time`) VALUES
(1, 3, 'Gold package', 10, NULL, 92000001, '2025-07-08 10:48:37.554446', '00:00:00'),
(2, 4, 'platinum package ', 9, NULL, 92000002, '2025-07-11 04:15:15.959014', '00:00:00'),
(3, 5, 'Gold package', 10, NULL, 92000003, '2025-07-11 04:45:59.458594', '00:00:00'),
(4, 5, 'Gold package', 10, NULL, 92000004, '2025-07-11 04:46:21.535271', '00:00:00'),
(5, 6, 'hair package', 13, NULL, 92000005, '2025-07-11 09:08:42.774117', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `package_services`
--

CREATE TABLE `package_services` (
  `id` int(200) NOT NULL,
  `package_id` int(200) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `price_after_discount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_services`
--

INSERT INTO `package_services` (`id`, `package_id`, `service_name`, `price`, `price_after_discount`) VALUES
(1, 9, 'Women s Haircut', 200, 180),
(2, 9, 'Child Hair cut', 200, 180),
(3, 10, 'Hair & Scalp Treatments', 240, 216),
(4, 10, 'Safe Color Treatment', 95, 86),
(5, 11, 'Teen Facial', 200, 136),
(6, 11, 'Herbal Facial', 80, 54),
(7, 12, 'Women s Haircut', 200, 180),
(8, 12, 'Mens haircut', 100, 90),
(9, 12, 'Color Refresh', 130, 117),
(10, 12, 'Single Process', 130, 117),
(11, 13, 'Women s Haircut', 200, 120),
(12, 13, 'Mens haircut', 100, 60),
(13, 13, 'Keratin Complex', 300, 180),
(14, 14, 'Women s Haircut', 200, 60),
(15, 14, 'Child Hair cut', 200, 60),
(16, 14, 'blow dry', 100, 30),
(17, 14, 'Mens haircut', 100, 30),
(18, 15, 'Women s Haircut', 200, 136),
(19, 15, 'Child Hair cut', 200, 136),
(20, 16, 'Women s Haircut', 200, 180),
(21, 16, 'Mens haircut', 100, 90),
(22, 17, 'Women s Haircut', 200, 110),
(23, 17, 'Child Hair cut', 200, 110),
(24, 17, 'blow dry', 100, 55),
(25, 17, 'Mens haircut', 100, 55),
(26, 18, 'Women s Haircut', 200, 186),
(27, 19, 'Women s Haircut', 200, 180),
(28, 19, 'Child Hair cut', 200, 180);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(60) NOT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `file`) VALUES
(16, 'upload-images/bg-01.jpg'),
(19, 'upload-images/bg-02.jpg'),
(23, 'upload-images/img-11.jpg'),
(24, 'upload-images/img-08.jpg'),
(25, 'upload-images/woman_03.jpg'),
(29, 'upload-images/hair_08.jpg'),
(30, 'upload-images/slide-1.jpg'),
(40, 'upload-images/extensionservice.jpg'),
(41, 'upload-images/blow dry.jpg'),
(42, 'upload-images/full.jpg'),
(44, 'upload-images/brazillian2.jpg'),
(46, 'upload-images/browtint12.jpg'),
(47, 'upload-images/blowdry1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `comment`) VALUES
(8, 'TARA', ' Absolutely loved my experience here! The staff is incredibly friendly, and the ambience is so relaxing. My facial left my skin glowing, and the haircut was just perfect. Highly recommended for anyone'),
(9, 'SHIKHA', ' This beauty parlour is a hidden gem! The hairstylists are experts, and the skincare treatments are amazing. My manicure and pedicure were done with great precision. I always leave feeling refreshed a'),
(10, 'Kavya ', ' Had a fantastic makeover session! The staff took great care in understanding my skin type and recommended the perfect treatment. The results were beyond my expectations. The hygiene standards are exc'),
(11, 'Pari Kapoor', ' I got my bridal makeup done here, and it was absolutely stunning! The makeup artists are professionals who know exactly how to enhance natural beauty. The products used were of high quality, and my l'),
(12, 'DIYA', ' Best beauty parlour I’ve ever visited! The waxing service was painless, and the massage was so relaxing. The atmosphere is clean and soothing. The team is professional and ensures you get the best ca'),
(17, 'POOJA KHATRI', ' service is nice');

-- --------------------------------------------------------

--
-- Table structure for table `staff_designation`
--

CREATE TABLE `staff_designation` (
  `id` int(50) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_designation`
--

INSERT INTO `staff_designation` (`id`, `designation`) VALUES
(1, 'Management'),
(2, 'Hair Stylist'),
(3, 'Makeup-artist'),
(4, 'Nail Artists'),
(20, 'xyz'),
(23, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `staff_gallery`
--

CREATE TABLE `staff_gallery` (
  `id` int(60) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `staff_designation_id` int(200) DEFAULT NULL,
  `Short_bio` varchar(200) NOT NULL,
  `Experience` varchar(200) NOT NULL,
  `Availability` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_gallery`
--

INSERT INTO `staff_gallery` (`id`, `name`, `file`, `staff_designation_id`, `Short_bio`, `Experience`, `Availability`) VALUES
(3, 'shikha', 'upload-images/woman_08.jpg', 1, 'Our talented stylists are dedicated to providing.', '5', '12 am to 5 pm'),
(4, 'divya', 'upload-images/nail_10.jpg', 1, 'Dedicated to enhancing natural beauty through creativity and precision.', '2', '12 am to 5 pm'),
(6, 'pooja', 'upload-images/hair_11.jpg', 1, 'Professional hairstylist specializing in trendy cuts, color, and styling. Known for personalized consultations and transforming hair with care and confidence.', '4', '12 am to 5 pm'),
(8, 'Pari Kapoor', 'upload-images/team-2.jpg', 2, 'Skilled beautician offering a wide range of skincare, facial, and grooming services. Committed to providing relaxing experiences and visible results for every client.', '7', '12 am to 5 pm'),
(9, 'shikha srivastava ', 'upload-images/team-5.jpg', 2, 'Known for personalized consultations and transforming hair with care and confidence.', '8', '12 am to 5 pm'),
(10, 'kavya singh', 'upload-images/team-6.jpg', 2, 'Known for personalized consultations and transforming hair with care and confidence.', '12', '12 am to 5 pm'),
(11, 'Nancy Verma', 'upload-images/team-3.jpg', 2, 'Skilled beautician offering a wide range of skincare, facial, and grooming services. Committed to providing relaxing experiences and visible results for every client.', '10', '12 am to 5 pm'),
(13, 'Diyva Kapoor', 'upload-images/team-8.jpg', 2, 'Dedicated to enhancing natural beauty through creativity and precision.', '15', '12 am to 5 pm'),
(19, 'bhawna', 'upload-images/woman_05.jpg', 3, 'Professional hairstylist specializing in trendy cuts, color, and styling. Known for personalized consultations and transforming hair with care and confidence.', '5', '12 am to 5 pm'),
(21, 'Pratigya Singh', 'upload-images/team-9.jpg', 3, 'Skilled beautician offering a wide range of skincare, facial, and grooming services. Committed to providing relaxing experiences and visible results for every client.', '7', '12 am to 5 pm'),
(25, 'Pari Kapoor', 'upload-images/hair_06.jpg', 3, 'Dedicated to enhancing natural beauty through creativity and precision.', '8', '12 am to 5 pm'),
(29, 'pooja', 'upload-images/banner-1.jpg', 15, 'Dedicated to enhancing natural beauty through creativity and precision.', '9', '12 am to 5 pm'),
(31, 'Pari Kapoor', 'upload-images/beauty_03.jpg', 18, 'Our talented stylists are dedicated to providing.', '15', '12 am to 5 pm'),
(33, 'pooja', 'upload-images/lashtint1.jpg', 20, 'good', '6', '12 am to 5 pm');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_service`
--

CREATE TABLE `sub_category_service` (
  `s_id` int(40) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `sub_service` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category_service`
--

INSERT INTO `sub_category_service` (`s_id`, `s_name`, `description`, `file`, `sub_service`) VALUES
(1, 'Cutting and Styling', 'Each service is crafted to enhance your unique style and beauty.', 'upload-images/hair_extesion.webp', 1),
(2, 'Hair treatment', 'Revive your damaged hair with our expert tips & hair care routine for damaged hair.', 'upload-images/hr3.webp', 1),
(3, 'Hair Coloring', ' Semi-permanent and temporary colors are gentler, last a few weeks, and are ideal for experimenting or subtle change', 'upload-images/12.webp', 1),
(4, 'Hair extension', 'Our superior-quality straight clip-in hair extensions are artisan-made using the finest human hair to give you a completely natural and flawlessly layered look.', 'upload-images/haircolour.jpg', 1),
(5, 'Skin Care and facial', 'A facial is a noninvasive skin treatment that includes cleansing, moisturizing, exfoliating and other elements that are customized to your specific skin type and needs', 'upload-images/service.jpg', 2),
(6, 'Body Waxing ', 'Waxing is a form of epilation that grabs hair follicles at the root', 'upload-images/bodywax.webp', 2),
(7, 'Make up & Eyebrow', 'Create perfectly sculpted brows with eyebrow makeup by Charlotte Tilbury, including precise eyebrow pencils, eyebrow pens and iconic eyebrow gels.', 'upload-images/eyebrow.jpg', 2),
(8, 'Hand & feet', 'Pamper your hands and feet with the best treatments! Enjoy relaxing nail care, stylish designs, and rejuvenating ', 'upload-images/istockphoto-838483760-612x612.jpg', 3),
(9, 'Add on services', 'Collagen masks offer a range of benefits: Improves Elasticity: Firms skin and reduces visible signs of ageing', 'upload-images/makeup-beauty-parlour-for-women.jpg', 3),
(65, 'make up ', 'about make up', 'upload-images/image.webp', 210);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(40) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `name`, `mobile`, `email`, `address`, `password`, `file`) VALUES
(1, 'Maya tondon', 7907858477, 'maya@gmail.com', 'rajajipuram ', '7777', 'upload-images/hair_08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(40) NOT NULL,
  `page_title` varchar(35) NOT NULL,
  `page_description` varchar(400) NOT NULL,
  `page_content` varchar(400) DEFAULT NULL,
  `page_text` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `page_title`, `page_description`, `page_content`, `page_text`) VALUES
(1, '', '<p>hello hy</p>\r\n', NULL, NULL),
(2, 'Mind, Body and Soul', 'Demo salon where you will feel unique', 'Welcome to our Demo salon, where you’ll experience personalized beauty treatments in a sophisticated and relaxing atmosphere. Our expert team ensures that every visit leaves you feeling unique, pamper', 'Step into our luxury salon, where every detail is crafted to make you feel unique. Experience personalized beauty treatments in an elegant, serene environment. Our expert stylists and beauticians are '),
(3, 'Our Services', 'Feel Yourself More Beautiful', 'Embrace your beauty with our expert treatments, designed to enhance your natural features and make you feel radiant. Rediscover your confidence and step out looking and feeling your absolute best with', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_about_us`
--

CREATE TABLE `tb_about_us` (
  `id` int(200) NOT NULL,
  `page_title` varchar(200) DEFAULT NULL,
  `heading` varchar(200) DEFAULT NULL,
  `file1` varchar(200) DEFAULT NULL,
  `file2` varchar(200) DEFAULT NULL,
  `text_area` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_about_us`
--

INSERT INTO `tb_about_us` (`id`, `page_title`, `heading`, `file1`, `file2`, `text_area`) VALUES
(1, 'About Demo Studio', 'Demo salon where you will feel unique and Free', 'upload-images/hair_06.jpg', 'upload-images/hair_02.jpg', '<p>Welcome to our Demo salon, where you&rsquo;ll experience personalized beauty treatments in a sophisticated and relaxing atmosphere. Our expert team ensures that every visit leaves you feeling unique, pampered, and confident with exceptional service tailored just for you.Step into our luxury salon, where every detail is crafted to make you feel unique. Experience personalized beauty treatments in an elegant, serene environment. Our expert stylists and beauticians are dedicated to providing you with exceptional service, ensuring that you leave feeling refreshed, rejuvenated, and truly one-of-a-kind.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_appointment`
--

CREATE TABLE `tb_appointment` (
  `id` int(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mobile` bigint(35) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `prefered_time` varchar(35) NOT NULL,
  `appointment_for` varchar(35) NOT NULL,
  `staff` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_appointment`
--

INSERT INTO `tb_appointment` (`id`, `name`, `email`, `mobile`, `address`, `date`, `prefered_time`, `appointment_for`, `staff`) VALUES
(4, 'rama', 'rama@gmail.com', 8907843155, 'Hazratganj', '2025-07-30', '09:48', 'offline booking', ''),
(5, 'veronica', 'veronica@gmail.com', 8907843188, 'Hazratganj', '2025-07-16', '10:19', 'offline booking', ''),
(6, 'preetikhatri', 'preeti@gmail.com', 8997843126, 'Alambhag', '2025-07-29', '18:37', 'offline booking', ''),
(7, 'preetikhatri', 'preeti@gmail.com', 8997843126, 'Alambhag', '2025-07-30', '19:39', 'offline booking', ''),
(8, 'xyz', 'xyz@gmail.com', 7777843126, 'Alambhag', '2025-07-17', '17:05', 'Hair Services', 'Veronica Aaron');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_us`
--

CREATE TABLE `tb_contact_us` (
  `id` int(11) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email_us` varchar(35) NOT NULL,
  `time` varchar(200) NOT NULL,
  `Logo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_contact_us`
--

INSERT INTO `tb_contact_us` (`id`, `mobile_number`, `address`, `email_us`, `time`, `Logo`) VALUES
(1, 8789090876, ' RAJAJIPURAM', 'h@yourdomain.com', '18:25', 'upload-images/slide-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(200) NOT NULL,
  `appointment_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` bigint(35) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(35) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `appointment_id`, `name`, `mobile`, `address`, `email`, `date`) VALUES
(1, 3, 'Sneha tondon', 8619858421, 'Alambhag', 's@gmail.com', '2025-07-09'),
(5, 5, 'veronica', 8907843188, 'Hazratganj', 'veronica@gmail.com', '2025-07-16'),
(6, 6, 'preetikhatri', 8997843126, 'Alambhag', 'preeti@gmail.com', '2025-07-29'),
(7, 7, 'preetikhatri', 8997843126, 'Alambhag', 'preeti@gmail.com', '2025-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_selected_services`
--

CREATE TABLE `tb_selected_services` (
  `id` int(11) NOT NULL,
  `appointment_id` int(35) NOT NULL,
  `c_id` int(200) DEFAULT NULL,
  `s_id` int(200) DEFAULT NULL,
  `a_id` int(200) DEFAULT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` decimal(10,2) NOT NULL,
  `discount_percentage` int(200) DEFAULT NULL,
  `price_after_discount` int(200) DEFAULT NULL,
  `billing_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` time DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_selected_services`
--

INSERT INTO `tb_selected_services` (`id`, `appointment_id`, `c_id`, `s_id`, `a_id`, `service_name`, `service_price`, `discount_percentage`, `price_after_discount`, `billing_number`, `created_at`, `time`) VALUES
(1, 3, 1, 1, 98, 'Women s Haircut', 200.00, 50, 100, '98000001', '2025-07-08 10:48:20', '16:18:20'),
(2, 3, 1, 1, 5, 'Child Hair cut ', 200.00, 10, 180, '98000001', '2025-07-08 10:48:20', '16:18:20'),
(3, 3, 1, 1, 3, 'blow dry', 100.00, 10, 90, '98000001', '2025-07-08 10:48:20', '16:18:20'),
(4, 3, 2, 5, 34, 'Teen Facial', 200.00, 20, 160, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(5, 3, 2, 5, 33, 'Gentleman’s Facial', 60.00, 10, 54, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(6, 3, 2, 5, 32, 'Anti-Ageing Facial', 175.00, 50, 88, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(7, 3, 2, 5, 28, 'Biolight Facial', 165.00, 20, 132, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(8, 3, 2, 5, 27, 'Four Layer Facial', 140.00, 50, 70, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(9, 3, 2, 5, 26, 'Organic Facial', 185.00, 7, 172, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(10, 3, 2, 5, 25, 'Deep Cleaning Facial', 130.00, 25, 98, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(11, 3, 2, 5, 24, 'Herbal Facial', 80.00, 5, 76, '98000002', '2025-07-08 10:49:17', '16:19:17'),
(12, 5, 1, 1, 98, 'Women s Haircut', 200.00, 50, 100, '98000003', '2025-07-11 04:47:18', '10:17:18'),
(13, 5, 1, 1, 5, 'Child Hair cut ', 200.00, 10, 180, '98000003', '2025-07-11 04:47:18', '10:17:18'),
(14, 6, 1, 1, 98, 'Women s Haircut', 200.00, 50, 100, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(15, 6, 1, 1, 5, 'Child Hair cut ', 200.00, 10, 180, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(16, 6, 1, 1, 3, 'blow dry', 100.00, 10, 90, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(17, 6, 1, 1, 2, 'Mens haircut', 100.00, 10, 90, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(18, 6, 1, 2, 13, 'Hair & Scalp Treatments', 240.00, 27, 175, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(19, 6, 1, 2, 12, 'Safe Color Treatment', 95.00, 50, 48, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(20, 6, 1, 2, 11, 'Hair Gloss', 550.00, 21, 435, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(21, 6, 1, 2, 10, 'Permanent Wave', 185.00, 25, 139, '98000004', '2025-07-11 09:07:53', '14:37:53'),
(22, 7, 1, 1, 98, 'Women s Haircut', 200.00, 50, 100, '98000005', '2025-07-11 09:10:20', '14:40:20'),
(23, 7, 1, 1, 5, 'Child Hair cut ', 200.00, 10, 180, '98000005', '2025-07-11 09:10:20', '14:40:20'),
(24, 7, 1, 1, 3, 'blow dry', 100.00, 10, 90, '98000006', '2025-07-11 09:52:07', '15:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id` int(35) NOT NULL,
  `service_name` varchar(35) NOT NULL,
  `service_price` bigint(35) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_services`
--

INSERT INTO `tb_services` (`id`, `service_name`, `service_price`, `creation_date`) VALUES
(30, 'WOMENS HAIR CUT', 3000, '2025-01-09 08:56:11'),
(31, 'CLEAN UP', 200, '2025-03-06 06:00:36'),
(32, 'MANICURE', 3000, '2025-02-15 07:01:40'),
(33, 'LASH APPLICATION', 20, '0000-00-00 00:00:00'),
(34, 'MENS HAIRCUT', 200, '0000-00-00 00:00:00'),
(35, 'FACIAL ', 200, '0000-00-00 00:00:00'),
(36, 'WAXING', 40000, '2025-02-17 06:44:47'),
(37, 'MANICURE', 3000, '2025-02-15 07:01:40'),
(84, 'spa6', 200, '2025-03-06 11:23:41'),
(86, 'spa', 200, '2025-03-10 08:31:39'),
(87, 'spa', 200, '2025-03-10 08:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(35) NOT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `address`, `password`, `file`) VALUES
(6, 'priyanka', 8907843117, 'Malhotra@gmail.com', ' RAJAJIPURAM', '123', 'upload-images/team-9.jpg'),
(7, 'khanna', 8907843128, 'khanna@gmail.com', 'Alambhag', '1234', 'upload-images/user1-128x128.jpg'),
(8, 'Angel ', 1234456789, 'john@gmail.com', 'Goa', '123', 'upload-images/avatar5.png'),
(18, 'POOJA KHATRI', 8907843126, 'pooja@gmail.com', 'Alambhag', '123', 'upload-images/hair_08.jpg'),
(19, 'pooja', 8907843123, 'khatri@gmail.com', 'Hazratganj', '123', ''),
(20, 'Pari Kapoor', 8719858421, 'Priyanka@gmail.com', 'Alambhag', '123', ''),
(21, 'Rohan', 8907843129, 'khatri@gmail.com', 'Hazratganj', '123', ''),
(22, 'shikha', 8709858421, 'shikha@gmail.com', 'Hazratganj', '123', 'upload-images/team-2.jpg'),
(23, 'Sneha tondon', 9348459403, 'sneha@gmail.com', 'sneha@gmail.com', '123', ''),
(24, 'archit ', 8907843127, 'archit@gmail.com', 'Hazratganj', '123', 'upload-images/barber_01.jpg'),
(25, 'shahid ', 8900843126, 'shahid@gmail.com', ' RAJAJIPURAM', '123', 'upload-images/barber_05.jpg'),
(26, 'archit ', 8719858429, 'archit@gmail.com', 'Hazratganj', '123', ''),
(27, 'POOJA KHATRI', 8117843126, 'Priyanka@gmail.com', 'Hazratganj', '1234', ''),
(28, 'preeti', 5507843126, 'khatri@gmail.com', 'Alambhag', '1234', ''),
(29, 'nitish khatri', 9305476387, 'nitish@gmail.com', 'Alambhag', '12345', 'upload-images/barber_03.jpg'),
(30, 'Pari Kapoor', 8207843126, 'pari@gmail.com', 'Hazratganj', '12345', ''),
(31, 'divya kapoor', 8908843126, 'Kapoor@gmail.com', 'Alambhag', '123', 'upload-images/hair_06.jpg'),
(32, 'chhaya khatri ', 8717758421, 'chhaya@gmail.com', 'alambhag', '123', ''),
(33, 'Maya Batra', 3407843126, 'maya@gmail.com', 'Hazratganj', '123', ''),
(34, 'Maya Batra', 8887843126, 'MayaBatra@gmail.com', ' RAJAJIPURAM', '123', ''),
(36, 'bhawna khatri', 8707858420, 'bhawna@gmail.com', 'Hazratganj', '123', ''),
(37, 'POOJA KHATRI', 8907843124, 'khatri@gmail.com', 'Hazratganj', '12345', ''),
(38, 'Pari Kapoor', 9347459403, 'khatri@gmail.com', 'Hazratganj', '12345', ''),
(39, 'pooja khatri', 8707858421, 'poojakhatri@gmail.com', '29AALC6789996', '123', ''),
(40, 'shikha srivastava ', 8904843126, 'shikha@gmail.com', 'Hazratganj', '123', ''),
(41, 'anuj ', 8907843177, 'anuj@gmail.com', 'alambhag', '123456', ''),
(42, 'divya tondon', 9807654325, 'divya@gmail.com', 'Alambhag', '12345', ''),
(43, 'priyanka', 8907843667, 'Priyanka@gmail.com', ' RAJAJIPURAM', '321', ''),
(44, 'POOJA KHATRI', 9807657899, 'mansi@gmail.com', 'Hazratganj', '123', ''),
(45, 'riya singh', 8907843726, 'khatri@gmail.com', 'Hazratganj', '12345', ''),
(46, 'varsha kakkar', 8709858427, 'varsha@gmail.com', '', '123', ''),
(47, 'veronica', 8907843188, 'veronica@gmail.com', 'Hazratganj', '123', ''),
(48, 'rama', 8907843155, 'rama@gmail.com', 'Hazratganj', '123', ''),
(49, '', 0, '', '', '123', ''),
(50, '', 4324234234, '', '', '123', ''),
(51, '', 4342342342, '', '', '123', ''),
(52, 'pooja', 5435443453, 'khatrip197@gmail.com', 'hello', '123', ''),
(53, '', 42342324, '', '', '123', ''),
(54, '', 43242342, '', '', '123', ''),
(55, 'POOJA KHATRI', 89078, 'w@gmail.com', 'Hazratganj', '123', ''),
(56, 'pooja', 843126, 'khatri@gmail.com', 'Alambhag', '123', ''),
(57, 'Pari Kapoor', 89078431, 'ktri@gmail.com', 'Hazratganj', '123', ''),
(58, 'Pari Kapoor', 6456467657567654, 'pooja@gmail.com', 'Hazratganj', '123', ''),
(59, 'Pari Kapoor', 6565654387, 'Priyanka@gmail.com', 'Hazratganj', '678', ''),
(60, 'POOJA KHATRI', 5678956789, 'kha@gmail.com', 'Alambhag', '4561', ''),
(61, 'Tara', 8907643126, 't@gmail.com', 'Hazratganj', '123', ''),
(62, 'xyz', 8807843126, 'xyz@gmail.com', 'Hazratganj', '123', ''),
(63, 'abc', 8407843126, 'abc@gmail.com', 'Alambhag', '123', ''),
(64, 'preetikhatri', 8997843126, 'preeti@gmail.com', 'Alambhag', '123', ''),
(65, 'POOJA KHATRI', 8907743126, 'p@gmail.com', 'Hazratganj', '123', ''),
(66, 'Sneha tondon', 8619858421, 's@gmail.com', 'Alambhag', '123', ''),
(67, 'xyz', 7777843126, 'xyz@gmail.com', 'Alambhag', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_services`
--
ALTER TABLE `all_services`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `banner_management`
--
ALTER TABLE `banner_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Sno`),
  ADD UNIQUE KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `branch_details`
--
ALTER TABLE `branch_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_service`
--
ALTER TABLE `category_service`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `enquiry_message`
--
ALTER TABLE `enquiry_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_selected`
--
ALTER TABLE `package_selected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_services`
--
ALTER TABLE `package_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_designation`
--
ALTER TABLE `staff_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_gallery`
--
ALTER TABLE `staff_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category_service`
--
ALTER TABLE `sub_category_service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_about_us`
--
ALTER TABLE `tb_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_appointment`
--
ALTER TABLE `tb_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact_us`
--
ALTER TABLE `tb_contact_us`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_selected_services`
--
ALTER TABLE `tb_selected_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `all_services`
--
ALTER TABLE `all_services`
  MODIFY `a_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `banner_management`
--
ALTER TABLE `banner_management`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Sno` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branch_details`
--
ALTER TABLE `branch_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_service`
--
ALTER TABLE `category_service`
  MODIFY `c_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `enquiry_message`
--
ALTER TABLE `enquiry_message`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `package_selected`
--
ALTER TABLE `package_selected`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_services`
--
ALTER TABLE `package_services`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff_designation`
--
ALTER TABLE `staff_designation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff_gallery`
--
ALTER TABLE `staff_gallery`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sub_category_service`
--
ALTER TABLE `sub_category_service`
  MODIFY `s_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_about_us`
--
ALTER TABLE `tb_about_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_appointment`
--
ALTER TABLE `tb_appointment`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_selected_services`
--
ALTER TABLE `tb_selected_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
