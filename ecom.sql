-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2012 at 09:59 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(8) NOT NULL,
  `prod_id` int(8) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`,`prod_id`),
  KEY `fk_cart_products1` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_id`, `quantity`) VALUES
(1001, 1, 2),
(1001, 101, 1),
(1002, 103, 4),
(1002, 202, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(8) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `payment_method` varchar(45) DEFAULT 'paypal',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `sname`, `address`, `email`, `payment_method`) VALUES
(1001, 'Robert', 'McBain', 'On top of a bridge somewhere', 'kill@vietnam.com', 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cart_id` int(8) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `fk_orders_cart1` (`cart_id`),
  KEY `fk_orders_customer1` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `cart_id`, `completed`) VALUES
(1004, 1001, '2012-03-09 21:58:33', 1001, 0),
(1005, 1001, '2012-03-09 21:58:33', 1002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `name_long` varchar(70) NOT NULL,
  `price` int(6) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT '20',
  `details` text,
  `description` text,
  `type` varchar(25) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `supplier_id` int(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=405 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `name_long`, `price`, `quantity`, `details`, `description`, `type`, `date_added`, `supplier_id`) VALUES
(1, 'Flexifoil Hadlow Wakestyle', 'Flexifoil Hadlow Wakestyle', 599, 20, 'Board is sold deck only', '<p>From time to time a great product is invented. A &lsquo;game-changer&rsquo;. Something different. Special. Extraordinary. These products break down barriers, they take things to new levels, they can even change lives. By reading on, you will discover something new, something that will excite you, something that you can now be a part of. Flexifoil, together with Aaron Hadlow, present the HADLOW Wakestyle kiteboard.</p>\n<p>The HADLOW Wakestyle kitesurf board from Flexifoil is accessible enough for any rider using or wanting to use bindings. With its smooth cut through chop, comfortable ride and fast aggressive performance, it&rsquo;s a great ride for those looking to push themselves in wakestyle riding, rails and cross over to cable parks. Designed by Aaron Hadlow himself, the HADLOW Wakestyle kiteboard from Flexifoil offers a new standard in performance. With a long list of features and intricate special designs, in its class, this really is the best performing board you can ask for!</p>', 'Boards', '2012-03-09 13:12:00', 1),
(2, 'Flexifoil Hadlow Freestyle', 'Flexifoil Hadlow Freestyle', 495, 20, 'This board is available in one size, 138x40cm with other sizes due summer 2011', '\n\n<strong>Aaron Hadlow and Flexifoil present</strong>, fresh for the 2011 season, a new direction for the HADLOW brand. With an unprecedented five PKRA championships behind him, Aaron has worked to develop the ultimate freestyle board that has proven its success time after time.<br />\nBuilt from the original design and shape of the late, great Colin McCulloch, the Freestyle board from HADLOW by Flexifoil, brings innovative and unique features to the world of Freestyle kitesurfing, as well as a style and look to boot.<br />\nDeveloped to cater for groundbreaking professionals and intermediates alike, the stability, grip and speed of the Freestyle board offer a learning curve that adapts to you, and a peak of performance that even keeps Aaron going.<br />\n<br />\n<em>&quot;This board is the shape I worked on together with Colin McCulloch over the years that helped me to achieve 5 world championships ... its unique flex and rocker line combined to produce amazing performance for the best of riders and a comfortable, easy ride for any one just wanting to cruise&quot;<br />\nAaron Hadlow - Flexifoil Kitesurfing Team Rider</em><br />\n&nbsp;\n\n', 'Boards', '2012-03-09 13:15:11', 1),
(3, 'Ocean Rodeo Mako', 'Ocean Rodeo Mako', 590, 20, '<b>Mako Freeride 140 x 40 CM</b> The Freeride gets up and goes with its generous 40 cm width while offering less swing weight with its shorter 140 cm length.', 'The Mako is a unique board - nothing else on the market rides like one. It''s extremely comfortable to ride with a nice surfy feel - for a twin tip. Mako''s get rave reviews from everyone who owns or tries one, just do a quick google to see what all the fuss is about.', 'Boards', '2012-03-09 12:57:33', 2),
(101, 'UnderGround Kipuna FreeWave', 'UnderGround Kipuna FreeWave', 799, 20, '<strong>Sizes</strong><br />\r 5&lsquo;4&ldquo; quad, 5&lsquo;8&ldquo; thruster, 6&lsquo;2&ldquo; thruster<br />\r <strong>Stance Options</strong><br />\r 54cm, 58cm, 62cm<br />\r \r <strong>Shape/Construction</strong></p>\r <ul>\r <li>3D recessed deck</li>\r <li>Single-to-double-to-V</li>\r <li>Tucked to sharp rails</li>\r <li>High density foam / Paulownia wood core</li>\r <li>6mm stainless inserts</li>\r <li>Epoxy glass laminate</li>\r <li>Controlled flex</li>\r \r </ul>\r <p><strong>Components</strong></p>\r <ul>\r <li>460 thruster / 538 quad Fiberglass fins</li>\r <li>Full EVA deckpad (flip-flop concept)</li>\r <li>Contour straps</li>\r <li>Toolless screws</li>\r </ul>\r ', '<strong>Express yourself. Rip waves whatever the wind direction and taste the freedom of strapless surfing.</strong><br />\r It doesn&rsquo;t matter how or where you jump onto this game-changing board, the uniquely recessed and padded deck gets you closer to the motion in the ocean &ndash; than ever before! This miracle is achieved without sacrificing volume in the rails, which are built tough from Paulownia wood &ndash; infusion laminated under vacuum &ndash; for extra durability. Pop massive unstrapped air and this lightweight board rises with you &ndash; seemingly glued to your feet. Back on flat water, easy tracking is maintained with a silky smooth, single to double to V base. You&rsquo;ll amaze your mates, and yourself with newschool trickery in the surf and you&rsquo;ll never regret a moment spent on this imagination-fuelled ride. Even we&rsquo;re amazed at the diverse styles this range inspires &ndash; everything from strapped wave riding to un-strapped and un-finned skim boarding! All are remarkably easy to ride in real-world wave conditions, while the 6&rsquo;2&rdquo; pin-tail stands out when the waves get more serious. Available in a range of sizes, tail shapes and fin configurations to suit your freewave style.<br />\r', 'Surfboards', '2012-03-09 13:05:25', 3),
(102, 'UnderGround Pohutu', 'UnderGround Pohutu', 699, 20, '<strong>Sizes</strong><br />\r 5&lsquo;4&ldquo; thruster, 5&lsquo;8&ldquo; thruster, 5&lsquo;10&ldquo; quad, 6&lsquo;2&ldquo; thruster, 6&lsquo;6&ldquo; thruster\r', '<strong>It&lsquo;s all about the wave for you. Morning surf, then kiting when the wind kicks &ndash; now possible on one board!</strong><br />\r The superior wave stick! Refined, fluid lines deliver insane rail to rail carving on your most epic waves, and that&rsquo;s in the morning before the wind comes up! When the wind cranks, this magically light board is ready for big-wave kiting and will take heavy punishment, given its 50mm EPS core, bulletproof epoxy sandwich and wood veneer top and bottom. The proven single to double to V base compliments the range of tails / fin set-ups. Lighter riders or those into max-powered wave riding will prefer the 5&rsquo;4&rdquo; or the proven 5&rsquo;8&rdquo;. The 5&rsquo;10&rdquo; is the all-round board of choice for new school wave-slashers like Patrick Rebstock while the 6&rsquo;2&rdquo; pin-tail is ideal for monstrous walls. All three larger sizes can be used for traditional surfing but the 6&rsquo;6&rdquo; excells as a paddle-in surfboard with the bonus of being a kiteboard. Enjoy!', 'Surfboards', '2012-03-09 13:05:25', 3),
(103, 'Wainman Gambler Surfboard', 'Wainman Gambler Surfboard', 845, 20, '\n<strong>Sizes</strong><br />\r 5&lsquo;4&ldquo; thruster, 5&lsquo;8&ldquo; thruster, 5&lsquo;10&ldquo; quad, 6&lsquo;2&ldquo; thruster, 6&lsquo;6&ldquo; thruster\n', 'The Gambler is a progression of our Wide model from last year, but it is significantly improved. &quot;The Gambler&quot; was made for everyday fun in all conditions. Ridden 4-5 inches shorter than your average board and with less area in the outline it is made for a more progressive riding style than the Magnum. These insane surf features and totally new rocker line, allow for radical performance even in light winds. The bottom shape goes from double under your front foot to single off the tail. Strong construction makes this board stable and provides the rider exceptional control and response.', 'Surfboards', '2012-03-09 13:09:11', 4),
(104, 'Wainman Magnum Surfboard', 'Wainman Magnum Surfboard', 845, 20, '\n<strong>Sizes</strong><br />\r 5&lsquo;4&ldquo; thruster, 5&lsquo;8&ldquo; thruster, 5&lsquo;10&ldquo; quad, 6&lsquo;2&ldquo; thruster, 6&lsquo;6&ldquo; thruster\n', 'The Magnum is a continuation of our classic/last year surfboard model. Available in 4 sizes, it is a bit narrower and designed for the highest performance. This classic shape allows you to enjoy any type of waves. The perfect condition for Magnum is side-shore but it is also suitable for the other wind directions. This board is incredibly fast like no other and this makes it perfect for riders who love to ride with power and speed. These boards are made to rip. If you are looking for a perfect recipe for fun, whether you are kicking it in the flats or taking on serious swells, Magnum is for you.', 'Surfboards', '2012-03-09 13:10:49', 4),
(201, 'Flexifoil Hadlow', 'Flexifoil Hadlow', 775, 20, '', '\n\n<p>&nbsp;Fresh for 2011 is the new HADLOW by Flexifoil. An evolution of 2009s Hadlow Pro, the 3rd generation of Aarons world class signature kite sees retention of the C-kite performance that the series is reputed for, with a strong element of accessibility added for this years iteration.<br />\n\nHaving already nailed the hardcore freestyle attitude of the HADLOW, Aaron has focused on opening the kite up to a new market through the development of an innovative and unique depowered kite setting. With the kite now capable of achieving over 50% more depower under the alternative setting, the versatility of the HADLOW across all conditions, be it freestyle, wave or snow, more than matches its precision, speed and power through the air.<br />\n2011 also brings a refinement in the freestyle attitude of the kite on both settings, with a much more solid feeling throughout; the HADLOW now produces even more pop on demand to make your tricks more explosive. On the smaller sizes, the speed and feel combines to get the kite down and more extreme into megaloops, but stays fast enough to stop you from dropping out of the sky. On bigger sizes, overall handling is improved to give you more confidence and ease into and out of tricks, whether hooked or unhooked.<br />\nIf youre looking to take the next step forward in freestyle kitesurfing, then the 2011 HADLOW is all you need. With its unique innovative depowered setting, the HADLOW gives you the opportunity to step back from the extremities of Aarons abilities when you want to, but push yourself and challenge your skills when you need to.<br />\n&nbsp;</p>\n\n\n', 'Kites', '2012-03-09 14:07:21', 1),
(202, 'Wainman Hawaii', 'Wainman Hawaii', 1100, 10, 'All Prices are for currently for Kite Complete with BAR & LINES', '\n\n<p>After the ground breaking launch of Lou Wainmans first line of kites, the long awaited 2.0 version has just dropped, with some new features, new bar system, new sizes to the gang and some fresh new graphics. These kites have brightened up kitesurfers lives all around the globe for the past few years and the new range is sure to give kitesurfers an even bigger smile on the water!</p>\n\n\n\n', 'Kites', '2012-03-09 14:09:02', 4),
(203, 'Flexifoil Proton 2011', 'Flexifoil Proton 2011', 575, 20, '<p>Available in sizes 5m, 7m, 9m and 12m', '\n\nFlexifoil presents the Proton, a natural evolution from last years model. Aimed squarely at freerider and waveriders, the Proton offers easy relaunch, predictable flight, stability and quick turns, giving you everything you need to take on the waves or simply cruise across the flats with comfort.<br />\nAn exceptional all-rounder that is suited to riders of every level, you can be sure that the stability, predictability and responsiveness that this kite offers will give the headstart you need to concentrate on those board skills, be it in the barrel of a wave or simply tacking those first few runs straight out of school.<br />\nRead on to find out more about why the Proton deserves a place in every quiver...\n\n\n', 'Kites', '2012-03-09 14:10:39', 1),
(204, 'Flexifoil ION 2011', 'Flexifoil ION 2011', 690, 20, '', '\n\nNew for the 2010/11 season, Flexifoil presents the next stage of the Ion range. We dont believe in change for changes sake, but continually improving on what we know works. Thats why with the Ion youll find a number of refinements in quality and performance to give you a product that is of the usual high Flexifoil standards. This is evolution, not revolution.<br />\nContinuing to deliver the combination of C-kite feel and Hybrid performance that the Ion has provided in the past, this seasons revision promises unique enhancements throughout the kite designed to focus its strength to your style of riding.<br />\nThe Ion delivers fast, positive and progressive steering, enabling you to turn quickly into jumps with constant strength, power and lift, and giving great hangtime and the freedom in the air to excel beyond what you thought possible. The Ion fits naturally onto Flexifoils well established bar system, delivering just the right amount of bar pressure and feedback and giving you exceptional control and feel of the kite throughout your ride.<br />\nIf youre already kitesurfing and need a kite that will support you in pushing beyond your existing limits into a new world of skill and enjoyment, then there is no better choice than the Ion.\n\n\n', 'Kites', '2012-03-09 14:13:45', 1),
(301, 'Flexifoil line set', 'Flexifoil line set', 145, 20, '<p>Available in:</p>\r <p>- Standard 4 line 20m plus 5m extension set </p>\r <p>- Hadlow 4 line 22m set with the Hadlow setup.</p>', 'Super strong line set rated to 340kg. These lines are stock on the Hadlow range and probably will be on all future Flexifoil kites. These lines are the best weve seen on the market and are like cables due to the Teflon coating. A little more expensive but well worth it. Black lines with coloured blue and red sleeving.', 'Harnesses', '2012-03-09 14:17:51', 1),
(302, 'Wainman Rabitt Replacement - Rear Pigtai', 'Wainman Rabitt Replacement - Rear Pigtails', 8, 50, '', 'Wainman Rabbit replacement rear pigtails blue and red', 'Harnesses', '2012-03-09 14:22:37', 1),
(303, 'Mystic Shadow Harness', 'Mystic Shadow Harness', 155, 20, '<strong>Available in:</strong><br />\nWHITE size large<br />\nBLACK size small<br />\nBLACK size medium</p>', 'The <strong>MYSTIC SHADOW</strong> harness. The Shadow is Mystics lightweight freestyle harness. The harness offers medium to high back support whilst maintaining a high range of body movement for freestyle tricks. This is the harness of choice for many of the worlds top freestyle kiteboarders such as Aaron Hadlow, Youri Zoon and Bruna Kajiya.<br />', 'Harnesses', '2012-03-09 14:23:26', 1),
(304, 'Mystic Warrior Harness', 'Mystic Warrior Harness', 175, 20, '<strong>Available in:</strong><br />\r WHITE size large<br />\r BLACK size small<br />\r BLACK size medium</p>', '<p>The <strong>MYSTIC Warrior</strong> Harness has been around for over 3 years now and has been tweaked and developed to give you the most comfortable harness that Mystic produce. The Warrior has more support than the Shadow harness making it a bit more comfortable for all free riding. With its higher back support you lose a small bit of body movement compared to the Shadow but that trade off means more comfort, support and a happier back! It is the harness of choice for Ruben Lenten or anyone out there who rides with a lot of power in their kite or wants additional comfort in their harness.</p>', 'Harnesses', '2012-03-09 14:29:08', 1),
(401, 'Prolimit Beanie', 'Prolimit Beanie', 15, 30, 'Limited sizes in stock', '<p>&nbsp;The beanie is ideal for winter conditions, without the closed feeling of a diving cap.</p>\n<p>&bull; double lined beanie with glide skinn inside that makes it stick<br />\n&bull; attachment loop for your wetsuit</p>', 'Accessories', '2012-03-09 14:36:08', 5),
(402, 'Ocean Rodeo Neoprene Beanies', 'Ocean Rodeo Neoprene Beanies', 15, 30, 'Limited sizes in stock', '<p>These beanies are made from double lined neoprene and are essential to keep you warm over the winter months. You loose over 70% of your body heat through your head, and an unexpected dunking in the icy water can really mess you up.<br />', 'Accessories', '2012-03-09 14:36:57', 5),
(403, 'Shred Ready Half-Cut Helmet', 'Shred Ready Half-Cut Helmet', 40, 20, 'Features:<br />\nABS molded shell<br />\nEPP liner &ndash; improved for better fit<br />\n\nHOG 2.0 Occipital Lock<br />\nInterchangeable color coded fitting pads (Sm, Md, Lg)<br />\nNylon straps attached with metal strap hangers<br />\nMeets and exceeds CE 1385 International Standard for Whitewater Helmets<br />', ' A new standard in helmet design has been set with the introduction of the SR Standard. Designed from the ground up to provide unparalleled performance.', 'Accessories', '2012-03-09 14:39:37', 5),
(404, 'Mystic Ammo Twin Bag', 'Mystic Ammo Twin Bag', 145, 20, '<p>Dimensions...</p>\n<p>140cm - 140 x 43 x 35cm (fits boards upto 140cm length and 44cm width) Total Bag weight&nbsp;approx&nbsp;5.5 Kg</p>', '<p>&nbsp;The unique Mystic Ammo Twin Box splits into two separate checkable bags to help avoid overweight baggage charges, making it a strong contender for the best heavy duty kitesurfing travel bag available.</p>\n<p>&nbsp;</p>\n<p>Although heavier than other kite travel bags, the Mystic Ammo Twin Box features a heavy duty padded construction to ensure that over enthusiastic baggage handlers dont totally destroy your stuff before youve even arrived. The integrated wheels with plastic undercarriage and stair runners ensure that transportation is simple.</p>\n<p>It is plenty large enough for a board, 3 kites and all your other kiting stuff with the dual compartment construction giving easy access to the bag contents throughout your travels. An internal bungee system prevents shredding kites in the zipper and keeps everything neat inside.</p>', 'Accessories', '2012-03-09 14:42:43', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `prod_id` int(8) NOT NULL,
  `image_id` varchar(50) NOT NULL,
  PRIMARY KEY (`prod_id`,`image_id`),
  KEY `fk_product_image_products1` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`prod_id`, `image_id`) VALUES
(1, 'images/productImages/kiteboards/1_001.png'),
(1, 'images/productImages/kiteboards/1_002.png'),
(1, 'images/productImages/kiteboards/1_003.png'),
(1, 'images/productImages/kiteboards/1_004.png'),
(2, 'images/productImages/kiteboards/2_001.png'),
(2, 'images/productImages/kiteboards/2_002.jpg'),
(3, 'images/productImages/kiteboards/3_001.jpg'),
(3, 'images/productImages/kiteboards/3_002.jpg'),
(3, 'images/productImages/kiteboards/3_003.jpg'),
(101, 'images/productImages/surfboards/101_001.png'),
(101, 'images/productImages/surfboards/101_002.png'),
(102, 'images/productImages/surfboards/102_001.png'),
(102, 'images/productImages/surfboards/102_002.jpg'),
(103, 'images/productImages/surfboards/103_001.png'),
(103, 'images/productImages/surfboards/103_002.jpg'),
(103, 'images/productImages/surfboards/103_003.jpg'),
(103, 'images/productImages/surfboards/103_004.jpg'),
(104, 'images/productImages/surfboards/104_001.png'),
(104, 'images/productImages/surfboards/104_002.png'),
(201, 'images/productImages/kites/201_001.png'),
(201, 'images/productImages/kites/201_002.jpg'),
(201, 'images/productImages/kites/201_003.jpg'),
(201, 'images/productImages/kites/201_004.jpg'),
(201, 'images/productImages/kites/201_005.png'),
(201, 'images/productImages/kites/201_006.png'),
(202, 'images/productImages/kites/202_001.png'),
(202, 'images/productImages/kites/202_002.png'),
(202, 'images/productImages/kites/202_003.png'),
(202, 'images/productImages/kites/202_004.png'),
(203, 'images/productImages/kites/203_001.png'),
(203, 'images/productImages/kites/203_002.png'),
(203, 'images/productImages/kites/203_003.png'),
(203, 'images/productImages/kites/203_004.jpg'),
(204, 'images/productImages/kites/204_001.png'),
(204, 'images/productImages/kites/204_002.jpg'),
(204, 'images/productImages/kites/204_003.jpg'),
(301, 'images/productImages/harnesses/301_001.jpg'),
(301, 'images/productImages/harnesses/301_002.png'),
(302, 'images/productImages/harnesses/302_001.png'),
(302, 'images/productImages/harnesses/302_002.jpg'),
(303, 'images/productImages/harnesses/303_001.jpg'),
(303, 'images/productImages/harnesses/303_002.jpg'),
(304, 'images/productImages/harnesses/304_001.jpg'),
(304, 'images/productImages/harnesses/304_002.png'),
(401, 'images/productImages/accessories/401_001.png'),
(402, 'images/productImages/accessories/402_001.png'),
(403, 'images/productImages/accessories/403_001.png'),
(403, 'images/productImages/accessories/403_002.png'),
(403, 'images/productImages/accessories/403_003.jpg'),
(404, 'images/productImages/accessories/404_001.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_products1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_cart1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_products1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
