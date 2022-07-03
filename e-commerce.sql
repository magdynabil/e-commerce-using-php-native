-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 08:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `street` varchar(100) NOT NULL,
  `buildding` varchar(50) DEFAULT NULL,
  `floor` int(10) DEFAULT NULL,
  `flat` varchar(50) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `note` text DEFAULT 'null',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not active ,1->active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `buildding`, `floor`, `flat`, `type`, `note`, `status`, `user_id`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'شارع السلام', 'عمارة رقم 5', 6, '8', 'home', 'الشقة اللي جنب المصعد', 1, 21, 1, '2021-07-29 20:27:44', '2021-07-29 20:27:44'),
(2, 'شارع الروضة', '9', 2, '4', 'work', 'null', 1, 21, 2, '2021-07-29 20:27:44', '2021-07-29 20:27:44'),
(3, 'شارع المحبة ', 'عمارة الاوقاف رقم 3', 1, '3', 'البيت', 'الشقة اللي في وش السلم', 1, 28, 3, '2021-07-29 20:27:44', '2021-07-29 20:27:44'),
(4, 'شارع الطيران', '13', 2, '3', 'working', 'مكتب شركة المسافرين', 1, 25, 4, '2021-07-29 20:27:44', '2021-07-29 20:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not active ,1->active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'سامسونج', 'default.png', 1, '2021-07-29 15:34:23', '2021-07-29 15:34:23'),
(2, 'apple', 'أبل', 'default.png', 1, '2021-07-29 15:34:23', '2021-07-29 15:34:23'),
(3, 'Huawei', 'هواوي', 'default.png', 1, '2021-07-29 15:34:23', '2021-07-29 15:34:23'),
(4, 'PepsiCo', 'بيبسيكو', 'default.png', 1, '2021-07-29 15:34:23', '2021-07-29 15:34:23'),
(5, 'galaxy', 'جالكسي', 'default.png', 1, '2021-07-29 15:34:23', '2021-07-29 15:34:23'),
(6, ' HP', 'اتش بي ', 'default.png', 1, '2021-07-29 15:34:23', '2021-07-29 15:34:23'),
(7, 'Royal Doulton', 'رويال دولتن', 'default.png', 1, '2021-07-29 15:37:32', '2021-07-29 15:37:32'),
(8, 'Tafel', 'تيفال', 'default.png', 1, '2021-07-29 15:37:32', '2021-07-29 15:37:32'),
(9, 'Cat & Jack', 'كات اند جاك', 'default.png', 1, '2021-07-29 15:40:11', '2021-07-29 15:40:11'),
(10, 'Old Navy', 'اولد نيفي', 'default.png', 1, '2021-07-29 15:40:11', '2021-07-29 15:40:11'),
(11, 'Dell', 'ديل', 'default.png', 1, '2021-07-29 15:41:06', '2021-07-29 15:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not active , 1->active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'electronics', 'إلكترونيات', 'default.png', 1, '2021-07-29 15:09:26', '2021-07-29 15:09:26'),
(2, 'kitchen', 'مطبخ', 'default.png', 1, '2021-07-29 15:09:26', '2021-07-29 15:09:26'),
(5, 'supermarket', 'سوبر ماركت', 'default.png', 1, '2021-07-29 15:10:32', '2021-07-29 15:10:32'),
(6, 'babies', 'أطفال', 'default.png', 1, '2021-07-29 15:10:32', '2021-07-29 15:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not active ,1-> active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cairo', 'القاهرة', 1, '2021-07-29 20:12:22', '2021-07-29 20:12:22'),
(2, 'Alex', 'الاسكندرية', 1, '2021-07-29 20:12:22', '2021-07-29 20:12:22'),
(3, 'Gharbia', 'الغربية', 1, '2021-07-29 20:12:22', '2021-07-29 20:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(20) NOT NULL,
  `coupon_usage_count` int(10) NOT NULL,
  `user_usage_count` int(5) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `discount_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->precent,1->fixed',
  `minimum_price` decimal(5,2) NOT NULL,
  `max_discount_price` decimal(10,2) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_products`
--

CREATE TABLE `coupons_products` (
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_users`
--

CREATE TABLE `coupons_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'image.png',
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not active , 1->active',
  `discount` decimal(5,0) NOT NULL,
  `discount_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->persent,1->fixed',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `image`, `title`, `status`, `discount`, `discount_type`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'huwawilaptopphoneoffer.png', 'Huawei Mate 40 Pro And MateBook laptop', 1, '30', 0, '2021-07-20 14:29:21', '2021-08-20 09:43:09', '2021-07-31 09:55:41', '2021-07-31 18:03:29'),
(2, 'samsungtvphoneoffer.png', 'Samsung Q60A Tv And Samsungs21 phone', 1, '20', 0, '2021-07-25 09:55:41', '2021-08-25 09:43:08', '2021-07-31 09:55:41', '2021-07-31 18:03:32'),
(3, 'pepesichbubblessoffer.png', 'Pepsi can with galaxy bubbles bar ', 1, '40', 1, '2021-07-30 09:52:13', '2021-08-15 09:52:13', '2021-07-31 09:55:41', '2021-07-31 09:55:41'),
(4, 'knivesforksoffer.png', 'Royal Doulton knives And forks offer', 1, '20', 1, '2021-07-30 14:30:01', '2021-08-12 09:52:13', '2021-07-31 09:55:41', '2021-07-31 14:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `offer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(5,0) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers_products`
--

INSERT INTO `offers_products` (`offer_id`, `product_id`, `price`, `quantity`) VALUES
(1, 2, '17999', 40),
(1, 6, '7555', 40),
(2, 4, '8444', 50),
(2, 7, '5444', 50),
(3, 8, '4', 50),
(3, 9, '6', 50),
(4, 10, '4', 100),
(4, 11, '7', 100);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not delivered, 1->delivered',
  `delivered_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `addresse_id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `delivered_at`, `created_at`, `updated_at`, `addresse_id`, `coupon_id`) VALUES
(1, 478963, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 2, NULL),
(2, 66554, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 2, NULL),
(3, 7423695, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 4, NULL),
(4, 8293352, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 4, NULL),
(5, 83968526, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 3, NULL),
(6, 8239825, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 3, NULL),
(7, 52696852, 1, '2021-07-29 20:39:46', '2021-07-29 20:39:46', '2021-07-29 20:39:46', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 3, '12362', 2),
(1, 13, '784', 10),
(2, 3, '12362', 2),
(3, 1, '22685', 2),
(3, 3, '69852', 3),
(4, 1, '23684', 2),
(4, 5, '26852', 2),
(4, 7, '12684', 20),
(5, 4, '99999', 3),
(5, 13, '154', 5),
(6, 9, '865', 10),
(7, 4, '25555', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `details_en` text DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `price` float NOT NULL,
  `code` int(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->not active ,1->active',
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `view_number` int(200) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `details_en`, `details_ar`, `price`, `code`, `amount`, `status`, `image`, `brand_id`, `subcategory_id`, `view_number`, `created_at`, `updated_at`) VALUES
(1, 'inspiron 15', 'انسبيرون 15', 'Fully immersive, completely impressive\r\nClarity on display: Enjoy the crisp detail of 15.6\" FHD non-touch anti-glare display to see everything better, especially outside or in bright light.\r\n\r\nStream seamlessly: SmartByte technology makes your gaming and streaming smooth and uninterrupted, so you never miss a second. This network solution ensures that your most important applications get the bandwidth they need for optimal performance.\r\n\r\nHear every detail: Waves MaxxAudio Pro pumps up your sound, so you can hear everything from concerts to film scores and gaming action with rich, resonant tones', 'ميزات متطورة، ملحقات منقطعة النظير.\r\nكل العروض التي تناسبك: قم بالترقية إلى شاشة العرض الاختيارية \"فائقة الدقة بالكامل\" واستمتع بعروض رائعة على شاشة مقاس 15 بوصة كبيرة الحجم ومثالية للمشروعات أو البث المباشر. واختر شاشة تعمل باللمس وتعامل بسهولة مع التطبيقات والعناصر مباشرة على الشاشة.\r\n\r\nالتقط الصور التي تحبها: يتوفر الكمبيوتر المحمول طراز Inspiron بكاميرا مدمجة تعمل بالأشعة تحت الحمراء عندما تختار الشاشة التي تعمل باللمس \"فائقة الدقة بالكامل\". الكمبيوتر مزوّد بميزة Windows Hello لتسجيل الدخول بسهولة دون كلمة مرور، لمزيد من الأمان وسهولة الاستخدام.\r\n\r\nخطة النسخ الاحتياطي: يتيح لك محرك أقراص DVD نسخ الأقراص المضغوطة وأقراص DVD، ما يوفر لك مساحة تخزين إضافية وقابلية تطوير مذهلة للنسخ الاحتياطي للملفات والصور ومقاطع الفيديو؛ كما يتوفر لديك خيار الترقية للكتابة على أقراص Blu-ray. استمتع بفوائد زيادة المساحة التخزينية بسهولة كلما زادت مكتباتك.\r\n\r\nتجربة أداء مذهلة تفي بكافة احتياجاتك: استمتع بأداء سريع الاستجابة يضمن لك تشغيل ملفات الموسيقى والفيديو بسلاسة إلى جانب تشغيل البرامج الأخرى في الخلفية بفضل بطاقات الرسومات المنفصلة المزوّدة بذاكرة GDDR5 بسعة 4 جيجابايت وأحدث معالجات ®Intel من الجيل السابع.', 14999, 123626, 130, 1, 'inspiron.jpg', 11, 1, 28, '2021-07-29 16:04:16', '2021-07-31 17:32:36'),
(2, 'Huawei MateBook X Laptop\r\n', 'هواوي ميت بوك اكس\r\n', '13\", Intel Core i5-10210U (10th Gen), Intel UHD Graphics 620, 512 GB SSD', 'كمبيوتر محمول ،13 بوصة ،(10 الجيل) i5-10210U انتل كور ،انتل يو اتش دي جرافيكس 620 ،512 جيجابايت اس اس دي \r\n\r\n', 18999, 478652, 171, 1, 'MateBook.png', 3, 1, 4, '2021-07-29 16:04:16', '2021-07-31 17:59:38'),
(3, 'ZBook Firefly 14 G7 ', 'اتش بي زد بوك فايرفلاي\r\n', '14\", Intel Core i7-10510U (10th Gen), NVIDIA Quadro P520 (4 GB), 512 GB PCIe NVMe TLC SS', 'محطة عمل محمولة G7 ،كمبيوتر محمول ،14 بوصة ،(10 الجيل) i7-10510U انتل كور ،انفيديا كوادرو بي 520 بسعة 4 جيجابايت ،512 GB PCIe NVMe TLC SSD', 18999, 35652, 95, 1, 'ZBook.png', 6, 1, 11, '2021-07-29 16:04:16', '2021-07-31 16:52:11'),
(4, 'Samsung Galaxy S21 Ultra\r\n', 'سامسونج جالكسي اس 21 الترا', '256 GB, Phantom Black,', 'سعة 256 جيجابايت ،أسود فانتوم ، الجيل الخامس 5G ', 8999, 165633, 235, 1, 'Samsungs21.jpg', 1, 2, 0, '2021-07-29 16:04:16', '2021-07-29 18:43:05'),
(5, 'Apple iPhone 12\r\n', 'ابل ايفون 12', '64 GB, White, 5G ', 'سعة 64 جيجابايت ، ابيض ، الجيل الخامس 5G', 9999, 1453652, 59, 1, 'iphone12.jpg', 2, 2, 8, '2021-07-29 16:04:16', '2021-07-30 20:49:18'),
(6, 'Huawei Mate 40 Pro\r\n', 'هواوي ميت 40 برو\r\n', '256 GB, Silver, 5G', 'سعة 256 جيجابايت ،فضي ، الجيل الخامس 5G', 7999, 482563, 186, 1, 'Mate40Pro.jpg', 3, 2, 24, '2021-07-29 16:04:16', '2021-07-31 17:40:51'),
(7, 'Samsung Q60A', 'سامسونج Q60A', 'Samsung Q60A 75\" 4K Ultra HD QLED (Quantum-dot) Smart TV', '75 بوصة ،دقة 4K الترا اتش دي ،كيو ال اي دي (النقاط الرباعية) ،تلفزيون ذكي ،اسود', 5999, 146325, 200, 1, 'Samsung Q60A.jpg', 1, 3, 0, '2021-07-29 16:04:16', '2021-07-31 10:02:50'),
(8, 'Pepsi', 'بيبسي', 'carbonated soft drink', 'مشروب غازي منعش', 5, 1252, 1892, 1, 'Pepsi.jpeg', 4, 7, 7, '2021-07-29 16:04:16', '2021-07-31 07:56:17'),
(9, 'galaxy bubbles', 'جالكسي بابلز', 'yummy chocolate bubbles bar ', 'قطعة شوكولاته بابلز لذيذة ', 7, 3698, 5125, 1, 'galaxybubles.jpg', 5, 8, 12, '2021-07-29 16:16:29', '2021-07-31 16:19:33'),
(10, 'forks', 'شوك', 'eating forks', 'شوك للأكل', 5, 14535, 2685, 1, 'forks.jpg', 7, 10, 2, '2021-07-29 16:16:29', '2021-07-31 16:52:20'),
(11, 'Knives', 'سكاكسن', 'Kitchen Knifes ', 'سكاكين مطبخ للتقطيع', 8, 36985, 2698, 1, 'knives.jpg', 7, 10, 2, '2021-07-29 16:16:29', '2021-07-31 17:41:24'),
(12, 'frying pan', 'مقلاة', 'tefal frying pan for kitchen ', 'مقلاه من تيفال للمطبخ', 80, 26986, 595, 1, 'frying pan.jpg', 8, 10, 11, '2021-07-29 16:16:29', '2021-07-31 17:41:29'),
(13, 'babies T-shirt', 'تي شيرت أطفال', 'soft comfortable babies T-shirt ', 'تي شيرت خفيف مريح للاطفال ', 140, 826645, 625, 1, 'bshirt.jpg', 9, 11, 21, '2021-07-29 16:16:29', '2021-07-31 17:59:52'),
(14, 'babies car', 'عربة اطفال', 'In the car, or in your favourite coffee spot, getting out and about with baby is easy than ever with our lightest ever pushchair. The super-slim Airo will have you gliding through city streets and tight spaces, then folding it up quickly using just one hand when it’s time to travel or store it away at home.', 'في السيارة أو في مكان القهوة المفضل لديك ، أصبح الخروج مع الطفل أمرًا سهلاً أكثر من أي وقت مضى باستخدام أخف عربة أطفال على الإطلاق. ستجعلك Airo فائقة النحافة تتنقل عبر شوارع المدينة والمساحات الضيقة ، ثم تطويها بسرعة باستخدام يد واحدة فقط عندما يحين وقت السفر أو تخزينها بعيدًا في المنزل.', 1500, 478621, 50, 1, 'baby-car.jpg', 9, 11, 12, '2021-07-31 16:47:48', '2021-07-31 17:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-> not active ,1->active ',
  `distance` float NOT NULL,
  `latitude` float NOT NULL,
  `langtude` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`, `distance`, `latitude`, `langtude`, `created_at`, `updated_at`, `city_id`) VALUES
(1, 'Nasr City', 'مدينة نصر', 1, 20, 20.5, 20.5, '2021-07-29 20:19:18', '2021-07-29 20:19:18', 1),
(2, 'hai elmarg', 'حي المرج', 1, 20, 10.5, 4.5, '2021-07-29 20:19:18', '2021-07-29 20:19:18', 1),
(3, 'tanta', 'طنطا', 1, 50, 50.5, 40.8, '2021-07-29 20:19:18', '2021-07-29 20:19:18', 3),
(4, 'elibrahimiya', 'الإبراهيمية', 1, 10, 4.1, 10.8, '2021-07-29 20:19:18', '2021-07-29 20:19:18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `value` enum('1','2','3','4','5') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `comment`, `value`, `created_at`, `updated_at`) VALUES
(20, 5, 'I liked it', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(20, 8, 'very good', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(21, 3, 'qaef', '3', '2021-07-31 08:09:11', '2021-07-31 08:32:48'),
(21, 6, 'ggggoooodddd', '5', '2021-07-30 21:32:17', '2021-07-30 21:32:17'),
(21, 8, 'not bad ', '3', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(21, 9, 'very good chocolate', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(21, 12, 'sanji can cook with it', '3', '2021-07-31 08:31:48', '2021-07-31 08:32:59'),
(21, 13, 'good t shirt', '5', '2021-07-31 08:16:23', '2021-07-31 08:32:41'),
(22, 5, 'very powerful phone', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(22, 8, 'ok', '4', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(23, 6, 'very good phone', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(23, 12, 'very good pan ', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(24, 2, 'very gooooood', '3', '2021-07-30 21:01:06', '2021-07-30 21:01:06'),
(24, 5, 'woooooow', '4', '2021-07-30 21:38:19', '2021-07-30 21:38:19'),
(25, 1, '', '3', '2021-07-29 19:12:39', '2021-07-30 19:04:55'),
(25, 6, 'mmm not bad ', '3', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(27, 3, 'good laptop', '4', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(27, 5, 'I\'m gona tl my friend to buy it', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(28, 1, 'good', '4', '2021-07-29 19:12:39', '2021-07-31 07:43:13'),
(28, 6, 'I love it ', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(29, 9, 'delicious Choco', '5', '2021-07-29 19:12:39', '2021-07-29 19:12:39'),
(30, 3, 'bad one', '2', '2021-07-29 19:12:39', '2021-07-29 19:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'image.png',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-> not active , 1-> active',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'laptops', 'لابتوب', 'image.png', 1, 1, '2021-07-29 15:21:43', '2021-07-29 15:21:43'),
(2, 'mobiles', 'موبايلات', 'image.png', 1, 1, '2021-07-29 15:21:43', '2021-07-29 15:21:43'),
(3, 'tv', 'تلفاز', 'image.png', 1, 1, '2021-07-29 15:21:43', '2021-07-29 15:21:43'),
(7, 'soft drinks', 'مشروبات غازية', 'image.png', 1, 5, '2021-07-29 15:21:43', '2021-07-29 16:05:00'),
(8, 'chocolate', 'شوكولاته', 'image.png', 1, 5, '2021-07-29 15:21:43', '2021-07-29 15:21:43'),
(10, 'kitchen tools', 'ادوات مطبخ', 'image.png', 1, 2, '2021-07-29 15:26:08', '2021-07-29 15:26:08'),
(11, 'babies stuff', 'متعلقات اطفال', 'image.png', 1, 6, '2021-07-29 15:26:08', '2021-07-29 15:26:08'),
(12, 'Snaks', 'تسالي', 'image.png', 1, 5, '2021-07-29 22:46:52', '2021-07-29 22:46:52'),
(13, 'cooker', 'بوتاجاز', 'image.png', 1, 2, '2021-07-29 22:46:52', '2021-07-29 22:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` varchar(1) NOT NULL COMMENT 'm-> male , f->female',
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `code` int(5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0->not varified ,1-> varified',
  `user_type` tinyint(1) NOT NULL COMMENT '1-> user,2->suplier,3->admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ubdated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `image`, `code`, `status`, `user_type`, `created_at`, `ubdated_at`) VALUES
(20, 'nami', 'nami@gmail.com', 'faa042a37370c64113d4832b32d5e9339e9ba44e', '01142614952', 'f', 'default.png', 54268, 1, 0, '2021-07-27 19:38:14', '2021-07-28 20:31:58'),
(21, ' luffy ', 'luffy@gmail.com', '954ea96655950a6608f6f42414e3426affd6d543', '25458595', 'm', '162750619421.png', 48625, 1, 0, '2021-07-27 19:40:10', '2021-07-29 19:03:15'),
(22, 'zoro', 'zoro@gmail.com', '8e42b60afc46a3f315a9db4c324919d7deb43b10', '11245867', 'm', 'default.png', 48198, 1, 0, '2021-07-27 20:13:32', '2021-07-29 19:04:04'),
(23, 'sanji', 'sanji@gmail.com', 'a89f14f0c67a100bbb4b71e6325ab30b6a565c0c', '01142585876', 'm', 'default.png', 78982, 1, 0, '2021-07-27 20:33:53', '2021-07-28 20:31:58'),
(24, 'red', 'red@gmail.com', '45481556b2533faa8d9c6155a81ef8bef58ada62', '02542541752', 'm', 'default.png', 75171, 1, 0, '2021-07-27 21:52:00', '2021-07-28 20:31:58'),
(25, 'amir', 'amir@gmail.com', '6011101c35ad8cbe2b8248a680507523495a2e79', '12', 'm', 'default.png', 90204, 1, 0, '2021-07-27 22:28:28', '2021-07-28 20:31:58'),
(27, 'salam', 'salma@gmail.com', 'b7f9c1410ed108f63d3fcd1faa1dbf406da3ebfd', '01221050695', 'f', 'default.png', 79869, 1, 0, '2021-07-28 11:59:52', '2021-07-28 20:31:58'),
(28, 'ahmed', 'ahmed@gmail.com', 'f361a37e30978cf07be0e2830595c5b64eb352ec', '0458142569', 'm', 'default.png', 36004, 1, 0, '2021-07-28 15:19:48', '2021-07-28 20:31:58'),
(29, 'magdy', 'magdy@gmail.com', '3c7d3376b1d7eab2890e11669c2ee31e4a68945e', '0458642569', 'm', 'default.png', 38470, 1, 0, '2021-07-28 15:23:28', '2021-07-28 20:31:58'),
(30, 'rana', 'rana@gmail.com', '5bdbeabee6ec6e3aa0f417babfecf43980e7c3d5', '025624859', 'f', 'default.png', 20933, 1, 0, '2021-07-28 17:29:42', '2021-07-28 20:31:58'),
(34, 'Abd El Rahman', 'abdo@gmail.com', '78eb35c5ea19ebe95fa45b5f3d94f22d16386308', '1142696952', 'm', '162774921734.jpg', 88574, 1, 0, '2021-07-31 16:31:17', '2021-07-31 16:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_users_fk` (`user_id`),
  ADD KEY `addresses_regions_fk` (`region_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `carts_products_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_unique` (`code`);

--
-- Indexes for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD PRIMARY KEY (`coupon_id`,`product_id`),
  ADD KEY `coupons_products_products_fk` (`product_id`);

--
-- Indexes for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD PRIMARY KEY (`user_id`,`coupon_id`),
  ADD KEY `coupons_users_coupons_fk` (`coupon_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_products_fk` (`product_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`offer_id`,`product_id`),
  ADD KEY `offers_products_products_fk` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_unique` (`code`),
  ADD KEY `addresses_orders_fk` (`addresse_id`),
  ADD KEY `coupons_orders_fk` (`coupon_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `orders_products_products_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_unique` (`code`),
  ADD KEY `brands_products_fk` (`brand_id`),
  ADD KEY `products_subcategories_fk` (`subcategory_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_regions_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_reviews_fk` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD KEY `categories_subcategories_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email.unique` (`email`),
  ADD UNIQUE KEY `phone.unique` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_wishlists` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_regions_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD CONSTRAINT `coupons_products_coupons_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coupons_products_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD CONSTRAINT `coupons_users_coupons_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coupons_users_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_products_offers_fk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_products_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addresses_orders_fk` FOREIGN KEY (`addresse_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coupons_orders_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_orders_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brands_products_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_subcategories_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `products_reviews_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categories_subcategories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `products_wishlists` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_wishlists_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
