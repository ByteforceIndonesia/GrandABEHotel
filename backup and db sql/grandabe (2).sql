-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2017 at 04:12 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grandabe`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(11) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `image`) VALUES
(1, '149210169520150815_142031.jpg'),
(2, '149210169520160109_175822.jpg'),
(3, '1492101695IMG_0779.JPG'),
(4, '1492101695IMG_0793.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `bnm`
--

CREATE TABLE `bnm` (
  `ta_bnmPageDesc` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnm`
--

INSERT INTO `bnm` (`ta_bnmPageDesc`) VALUES
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida. Suspendisse pharetra ullamcorper laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris vitae porttitor ex. Vestibulum ac tortor congue, pellentesque diam non, congue magna.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida. Suspendisse pharetra ullamcorper laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris vitae porttitor ex. Vestibulum ac tortor congue, pellentesque diam non, congue magna.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `bnmimages`
--

CREATE TABLE `bnmimages` (
  `id` int(11) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmimages`
--

INSERT INTO `bnmimages` (`id`, `image`) VALUES
(6, '1492097141TOBATI_MEETING_ROOM.jpg'),
(7, '1492097142VICTORY_BALLROOM.JPG'),
(8, '1492097142VICTORY_BALLROOM2.JPG'),
(9, '1492097142VIP_GRACIA.jpg'),
(10, '1492097211IMG_0409.JPG'),
(11, '1492097211NAFRI.jpg'),
(16, '1492097661NAFRI2.jpg'),
(17, '1492097661TOBATI_MEETING_ROOM.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value_1` text NOT NULL,
  `value_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`id`, `name`, `value_1`, `value_2`) VALUES
(20, 'asdasdasd', '20', '1'),
(23, 'kentang', '23', '1'),
(24, 'kentang', '24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cafe_catagory`
--

CREATE TABLE `cafe_catagory` (
  `id` int(11) NOT NULL,
  `catagory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafe_catagory`
--

INSERT INTO `cafe_catagory` (`id`, `catagory`) VALUES
(1, 'Whole Cake'),
(2, 'Sliced Cake'),
(3, 'christian santoso atmaja');

-- --------------------------------------------------------

--
-- Table structure for table `cafe_img`
--

CREATE TABLE `cafe_img` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafe_img`
--

INSERT INTO `cafe_img` (`id`, `name`, `link`) VALUES
(20, 'image_freatured', 'images/cake/17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `socialmedia` varchar(500) NOT NULL,
  `link` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `socialmedia`, `link`) VALUES
(1, 'Facebook', 'http://www.facebook.com/'),
(3, 'Twitter', 'http://www.twitter.com/');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `ta_footerTitle` varchar(500) NOT NULL,
  `ta_footerContent` varchar(5000) NOT NULL,
  `ta_addressContent` varchar(5000) NOT NULL,
  `ta_newsletterContent` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`ta_footerTitle`, `ta_footerContent`, `ta_addressContent`, `ta_newsletterContent`) VALUES
('Footer Grand Abe', '<p>Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur.</p>', '<div>\r\n<p>Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin.</p>\r\n</div>', '<p>Sign Up for latest news</p>');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(6, 'testgroup', 'test group');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `ta_landingScreen` varchar(5000) NOT NULL,
  `upload_leftImage` varchar(500) NOT NULL,
  `ta_ShortDesc` varchar(5000) NOT NULL,
  `upload_virtualBg` varchar(500) NOT NULL,
  `ta_aboutUs` varchar(5000) NOT NULL,
  `ta_virtualTourLink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`ta_landingScreen`, `upload_leftImage`, `ta_ShortDesc`, `upload_virtualBg`, `ta_aboutUs`, `ta_virtualTourLink`) VALUES
('<p>adadaafsgd</p>', '1491936658bedAbout.jpg', '<p><strong>Hotel Grand ABE&nbsp;</strong>adalah hotel berbintang tiga tertelak di area utama jalan abepura dan hanya berjarak 30 menit berkendara dari bandar utara setani.</p>', '1491937254home_large.jpg', '<p>Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur. Pellentesque placerat egestas imperdiet. Nunc viverra sodales imperdiet. Praesent et erat ornare, hendrerit dolor et, pretium dui. Integer tristique scelerisque risus, ut bibendum enim maximus id. Nam rhoncus ut enim vel eleifend.</p>\r\n<p>Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur. Pellentesque placerat egestas imperdiet. Nunc viverra sodales imperdiet. Praesent et erat ornare, hendrerit dolor et, pretium dui. Integer tristique scelerisque risus, ut bibendum enim maximus id. Nam rhoncus ut enim vel eleifend.</p>', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `locationheader`
--

CREATE TABLE `locationheader` (
  `ta_where` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationheader`
--

INSERT INTO `locationheader` (`ta_where`) VALUES
('<p>Lasdvfbgnhmj,klm,n bvcfcds gfnhjmk,mnb vcfdgbhnjm</p>');

-- --------------------------------------------------------

--
-- Table structure for table `locationphotos`
--

CREATE TABLE `locationphotos` (
  `id` int(11) NOT NULL,
  `photo` varchar(5000) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `link` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationphotos`
--

INSERT INTO `locationphotos` (`id`, `photo`, `title`, `caption`, `link`) VALUES
(1, '1.jpg', 'Heaven of time', 'What might be right for you may not be right for some. And we know Flipper lives in a world full of wonder flying there-under under the sea.', 'http://goo.gl/49lN3k'),
(3, '2.jpg', 'Speed Racer', NULL, 'http://goo.gl/NJ1Dhf'),
(4, '3.jpg', 'Serenity Beach', 'I have never been to a place so serene in my entire life before. Swimming in clear waters opened my mind to nature and reminded me of my and everybody else''s mortality.', 'http://goo.gl/Qw3ND4'),
(5, '14921694953.jpg', 'Test Image4', 'This is test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `image`, `description`) VALUES
(3, 'erdtfyghjksadv', '1492018241home_large.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut elementum risus, vel mollis nisi. Etiam in condimentum ante. Aliquam sed congue augue. Quisque viverra nibh at velit semper, non interdum est efficitur. Quisque gravida semper felis vel sodales. Integer et quam id mi porttitor volutpat. Cras vestibulum augue ligula, sed consectetur lacus luctus non. Curabitur porta, urna at finibus mattis, nisi elit lacinia nisl, ac sollicitudin metus ligula non mauris. Morbi tempus dolor sit amet nisi vulputate, eu scelerisque dolor faucibus. Duis fringilla eros non lectus tempus tempus.\n\nDonec bibendum tortor quis tristique venenatis. Donec at nunc ac risus vehicula gravida et eu velit. Ut vitae lorem sed dolor convallis dignissim id eu eros. Maecenas vel feugiat magna. Quisque vitae semper mauris. In egestas risus vel nunc elementum ultrices. Mauris velit nunc, molestie ac porttitor in, iaculis ac velit. Sed mattis sit amet massa id placerat. Pellentesque placerat aliquet bibendum.\n\nPraesent sit amet orci volutpat leo porttitor auctor eget eu nisi. Pellentesque laoreet sollicitudin sapien, ac euismod nunc hendrerit nec. Curabitur fermentum ante sit amet fringilla tincidunt. Nulla dapibus quam nunc, nec sodales mi sollicitudin non. Nullam in ligula ut dolor porttitor sagittis. Etiam lectus erat, lobortis a diam quis, sodales rutrum lectus. Nam porta odio sed pretium posuere. Fusce rutrum quam quis viverra aliquet. Nulla aliquet dui felis. Aliquam in vestibulum lorem. Proin condimentum tortor nisi, eu facilisis urna lobortis ut.'),
(4, 'asdfghmj', '3.jpg', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Mauris suscipit lorem a augue dapibus, at faucibus ipsum elementum. Aenean auctor neque eget odio tristique ornare eget eu lorem. Nullam a odio vitae massa aliquam auctor. Praesent sagittis lacus ut mauris suscipit, et gravida metus sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus placerat ullamcorper arcu, eget mollis ante egestas at. Aliquam tincidunt elementum sollicitudin. Phasellus placerat, massa id lacinia dictum, ligula turpis luctus massa, vitae mattis nisl leo id mi. Morbi vestibulum diam dolor, eu mollis urna scelerisque id. Proin a risus lacus. Integer semper sem quis orci venenatis, at ornare lacus vulputate.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Nullam malesuada nec felis id rhoncus. Integer tristique sollicitudin massa quis pellentesque. Proin eu erat id risus porttitor ullamcorper. Nunc id tristique est, rhoncus tempor mauris. Fusce laoreet accumsan nulla. In hac habitasse platea dictumst. Etiam tempus consectetur nulla, sit amet iaculis neque dignissim quis. Suspendisse potenti. Vestibulum venenatis faucibus nisl ut mattis.</p>'),
(5, 'asdawd', '3.jpg', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Cras eget condimentum justo. Sed orci erat, placerat ac volutpat quis, lacinia ut nisi. Duis at sem nibh. Nulla ut elit blandit, tincidunt tortor id, fringilla risus. Integer tempus metus ut gravida efficitur. Nulla dictum nibh vel nibh ullamcorper commodo. Pellentesque semper sed nisl ac efficitur. Nulla aliquam malesuada risus, convallis aliquet diam bibendum non. Aliquam sed consequat velit. Morbi nisl orci, euismod ac nisl ac, scelerisque mollis nisl. Nullam efficitur eleifend risus, et volutpat ante ultrices ut.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Praesent non aliquam massa. Fusce eget orci augue. Nullam scelerisque ullamcorper nisi ac euismod. Curabitur malesuada mollis orci, id malesuada enim condimentum sed. Vivamus vestibulum, mi eget tempus ultrices, dolor massa ullamcorper est, a facilisis libero tortor et neque. Aenean tortor urna, commodo ut scelerisque euismod, hendrerit in massa. Praesent vel rhoncus orci. In hac habitasse platea dictumst. Quisque vehicula nec libero a hendrerit. Fusce non sem lacus. Mauris accumsan velit suscipit aliquet sollicitudin. Nam luctus elit at ex vehicula, ut maximus mauris ullamcorper. Quisque tempor tellus quam, in consequat lacus suscipit non. Quisque sit amet lacus ipsum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mainsettings`
--

CREATE TABLE `mainsettings` (
  `logo` varchar(5000) NOT NULL,
  `background` varchar(5000) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainsettings`
--

INSERT INTO `mainsettings` (`logo`, `background`, `email`, `password`) VALUES
('1492165233logo.png', '14938797734.jpg', 'jeffry24797@gmail.com', 'A6F2V5CatYr2jbBzW0B3R/miG0dop42eKlv3JQrTltrrJK5jpVD7rA6/CEYH6rlc09AWGGngyxzAK/18nrrFOg==');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `content`, `image`) VALUES
(17, 9, 'Dufan', 'Dufan', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `name`) VALUES
(9, 'News'),
(10, 'Press');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `image`, `description`) VALUES
(2, 'Package', '1491937846Delicious.jpg', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Faragnus&nbsp;ipsum dolor sit amet, consectetur adipiscing elit. Morbi at dolor facilisis, viverra lorem at, maximus libero. Morbi volutpat nibh in rutrum mattis. Nam porta efficitur mi, sit amet volutpat sem congue ut. Fusce convallis nisl dictum pretium dignissim. Nam quis leo non ipsum lacinia rhoncus et at elit. Nulla pellentesque erat purus, id dictum leo auctor sed. Sed in nisi enim. Nulla maximus sodales eleifend.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Duis consequat rutrum est, non mattis lorem eleifend vitae. Aenean fermentum luctus lacinia. Nulla nec augue dapibus eros pulvinar consectetur. Aliquam rutrum erat pharetra placerat sagittis. Duis mattis venenatis lorem sit amet aliquet. Sed viverra magna et imperdiet pulvinar. Nam imperdiet lacus nec risus sollicitudin tempor. Quisque augue quam, laoreet eu massa sit amet, scelerisque mattis est.</p>'),
(3, 'Another Package', '1493878759book.png', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Aenean lorem elit, varius in metus ut, tristique malesuada orci. Aenean magna lorem, rutrum sed vulputate eget, gravida nec ipsum. Praesent pulvinar lectus nibh, ut dictum lacus dapibus id. Donec nibh diam, facilisis lacinia metus non, ultrices ultrices neque. Nam ut magna finibus tellus tristique venenatis. Nullam sit amet aliquet quam. Praesent suscipit dolor velit, a imperdiet magna rhoncus vel. Etiam ante elit, venenatis ut justo vitae, ullamcorper rutrum erat. Cras in dignissim nulla. In hac habitasse platea dictumst. Curabitur aliquet gravida ligula.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Sed tempor augue nisl, nec malesuada neque vehicula ut. Morbi in laoreet tortor, at aliquam justo. Nullam vitae rutrum arcu. Donec libero dui, placerat eget vehicula ut, auctor vel felis. Fusce convallis mauris a felis interdum facilisis. Nullam enim lorem, suscipit vitae vestibulum id, tincidunt vulputate massa. In elementum, dolor vel ornare tincidunt, nisl elit tempus lacus, vitae vestibulum tellus justo at dolor. Donec lacinia dapibus magna. Nam aliquet orci urna, ac efficitur nibh pretium et. Curabitur risus eros, mattis ut felis sit amet, viverra tempus mi. Praesent vitae dui quam. Suspendisse nunc massa, pharetra vitae consectetur ac, elementum sed urna. Aenean dignissim enim at tellus porta tristique. Nam faucibus est vel condimentum pretium. Aliquam auctor volutpat diam.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value_1` text,
  `value_2` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`id`, `name`, `value_1`, `value_2`) VALUES
(2, '									FREE WI-FI – Akses internet tercepat di Jayapura								', '2', NULL),
(3, 'GRACIA VIP ROOM - kapasitas hingga 20 orang', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resto_headers`
--

CREATE TABLE `resto_headers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value_1` text NOT NULL,
  `value_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resto_headers`
--

INSERT INTO `resto_headers` (`id`, `name`, `value_1`, `value_2`) VALUES
(1, 'resto_header', 'Gracia Cafe & Resto adalah cafe sekaligus restoran yang berada di lantai satu Grand ABE Hotel. Kami menyediakan berbagai jenis makanan, yaitu Indonesian food, Chinese food, Western food, makanan tradisional Papua, dan tidak ketinggalan juga berbagai jenis kopi, juice, mocktail, dan lainnya. Gracia Cafe & Resto buka setiap hari dari pukul 06.00- 10.00 khusus untuk breakfast buffet dan pukul 10.00-23.00 untuk lunch dan dinner.', 'images/resto/resto_header.jpg'),
(2, 'cafe_header', '<p>Grand ABE Hotel juga membuat berbagai jenis kue ulang tahun, black forest, chesse cake dan berbagai jenis kue lainnya dengan rasa yang nikmat dan dekorasi yang cantik. Tersedia juga aneka produk bakery, seperti roti tawar, roti sisir dan roti manis. dan kentang</p>', 'images/cake/cafe_header.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resto_img`
--

CREATE TABLE `resto_img` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resto_img`
--

INSERT INTO `resto_img` (`id`, `name`, `link`) VALUES
(2, 'image_freatured', 'images/resto/1.jpg'),
(3, 'image_freatured', 'images/resto/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roomheader`
--

CREATE TABLE `roomheader` (
  `ta_roomPageDesc` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomheader`
--

INSERT INTO `roomheader` (`ta_roomPageDesc`) VALUES
('<p>Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `description`) VALUES
(1, 'Superior Room', '1491942381bedAbout.jpg', '<p>Kamar tipe SUPERIOR memiliki luas 23 m<sup>2</sup>, tanpa jendela dan dilengkapi dengan air condition, sofa, TV 32&rdquo; siaran lokal dan internasional, free Wi-Fi, telepon, mineral water, teh &amp; kopi, hot &amp; cold shower, perlengkapan mandi dan fasilitias lainnya. Kami memiliki 20 kamar tipe SUPERIOR.</p>'),
(2, 'Deluxe Room', '1491942408bedAbout.jpg', '<p>Kamar tipe DELUXE memiliki luas 26 m<sup>2</sup> dan dilengkapi dengan jendela, air condition, sofa, TV 32&rdquo; siaran lokal dan internasional, free Wi-Fi, telepon, mineral water, teh &amp; kopi, hot &amp; cold shower, perlengkapan mandi dan fasilitias lainnya. Kami memiliki 64 kamar tipe DELUXE dengan pilihan twin bed dan double bed.</p>'),
(3, 'Family Suit', '1491942427bedAbout.jpg', '<p>Kamar tipe FAMILY SUITE memiliki luas 30 m<sup>2</sup>, berkapasitas tiga orang dan dilengkapi dengan 2 tempat tidur tipe double bed dan twin bed, sofa, kulkas, jendela, air condition, TV 32&rdquo; siaran lokal dan internasional, telepon, mineral water, teh &amp; kopi, hot &amp; cold shower, perlengkapan mandi dan fasilitias lainnya. Kami memiliki 4 kamar tipe FAMILY SUITE.</p>'),
(4, 'Exceutive Suit', '1491942444bedAbout.jpg', '<p>Kamar tipe EXECUTIVE SUITE memiliki luas 48 m<sup>2</sup>, dan dilengkapi dengan double bed, sofa, kulkas, jendela, air condition, TV 32&rdquo; siaran lokal dan internasional, telepon, safe deposit box, mineral water, teh &amp; kopi, hot &amp; cold shower, lemari, sofa perlengkapan mandi dan fasilitias lainnya. Kami memiliki 8 kamar tipe EXECUTIVE SUITE.</p>'),
(5, 'Presidential Suit', '1492017563bedAbout.jpg', '<p>Kamar tipe PRESIDENT SUITE memiliki luas 54 m<sup>2</sup>, dengan kamar tidur dan ruang tamu yang terpisah. Tersedia bar area dengan dapur kecil dan mini bar di dalam kamar, juga dilengkapi dengan double bed, sofa, kulkas, jendela, air condition, TV 42&rdquo; siaran lokal dan internasional, telepon, safe deposit box, mineral water, teh &amp; kopi, hot &amp; cold shower, bathtub, perlengkapan mandi dan fasilitias lainnya.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1500601648, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, '::1', 'iamdev', '$2y$08$NYx/ezvIpFC5iu9MI8Fc4uxcdduHOMOot.xHWhPksgiOMs9oHyPLK', NULL, 'iam@devpur.com', NULL, NULL, NULL, NULL, 1489924334, 1489924494, 1, 'iamtestchar', 'fordevpurposes', 'GrandABE', '191919112'),
(4, '::1', 'troya_t', '$2y$08$cIEdfQz7E4VlD5LNzYci8u4P6mYC37R.bchjcZHHavPid4vK8Yj2y', NULL, 'troya@yahoo.com', NULL, NULL, NULL, NULL, 1489924916, 1489924959, 1, 'troya', 'treyo', 'GrandABE', '121212'),
(5, '::1', 'testper', '$2y$08$OOc7v2t/5qzx8S0S9Oij8.YSMaX9NuDeRz4mD9G3ZGo39Tc0HfzO.', NULL, 'testper@testper.com', NULL, NULL, NULL, NULL, 1489993981, NULL, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 3, 1),
(10, 3, 2),
(11, 4, 2),
(12, 5, 1),
(13, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int(11) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `image`) VALUES
(3, '1492101811wedding_cover_(flayer).jpg'),
(4, '1492101994IMG_0863.JPG'),
(5, '1492107577IMG_9608.JPG'),
(6, '1492107603IMG_0941.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `wnb`
--

CREATE TABLE `wnb` (
  `ta_wedding` varchar(5000) NOT NULL,
  `ta_birthday` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wnb`
--

INSERT INTO `wnb` (`ta_wedding`, `ta_birthday`) VALUES
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmimages`
--
ALTER TABLE `bnmimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafe_catagory`
--
ALTER TABLE `cafe_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafe_img`
--
ALTER TABLE `cafe_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locationphotos`
--
ALTER TABLE `locationphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resto_headers`
--
ALTER TABLE `resto_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resto_img`
--
ALTER TABLE `resto_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bnmimages`
--
ALTER TABLE `bnmimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `cafe_catagory`
--
ALTER TABLE `cafe_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cafe_img`
--
ALTER TABLE `cafe_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `locationphotos`
--
ALTER TABLE `locationphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `resto_headers`
--
ALTER TABLE `resto_headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resto_img`
--
ALTER TABLE `resto_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
