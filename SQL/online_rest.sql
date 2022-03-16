-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2022 at 06:43 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '', '2018-04-09 07:36:18'),
(8, 'abc888', '6d0361d5777656072438f6e314a852bc', 'abc@gmail.com', 'QX5ZMN', '2018-04-13 18:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `admin_codes`
--

DROP TABLE IF EXISTS `admin_codes`;
CREATE TABLE IF NOT EXISTS `admin_codes` (
  `id` int(222) NOT NULL AUTO_INCREMENT,
  `codes` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE IF NOT EXISTS `dishes` (
  `d_id` int(222) NOT NULL AUTO_INCREMENT,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 53, 'Chicken Biryani', '', '13.99', 'Chicken Biryani.jpg'),
(2, 53, 'Chicken Tikka Biryani', '', '16.00', 'Chicken Tikka Biryani.jpg'),
(3, 53, 'Chicken Malai Boti', 'One order comes with two skewers.', '8.99', 'Chicken Malai Boti.jpg'),
(4, 53, 'Chicken 65', '', '7.99', 'Chicken 65.jpg'),
(5, 53, 'Chicken Tikka', '2 Full Legs', '11.99', 'chickenTikka.jpg'),
(6, 53, 'Achaari Chicken (half)', 'Serves 2-3 persons', '16.99', 'Achaari_Chicken_half.jpg\r\n'),
(7, 53, 'Achaari Chicken (full)', 'Serves 3-5 persons', '29.99', 'Achaari Chicken.jpg\r\n'),
(11, 48, 'Boneless Bucket', 'Everything we\'re famous for! 8 of our Secret Recipe tenders, large popcorn chicken, large fries and 2 dips. (640-700 Cals/Person)', '32.19', 'bonelessbucket.jpg'),
(12, 48, 'KFC FAMOUS CHICKEN CHICKEN SANDWICH ULTIMATE BOX MEAL', 'Our Famous Chicken chicken sandwich filet, drizzled with buttery garlic oil, 3 sweet pickles, and double mayo.', '15.19', 'famous_chicken_meal.jpg'),
(13, 48, 'Kentucky Scorcher Sandwich Ultimate Box Meal', 'Our Kentucky Scorcher sandwich served with 1 Original Recipe tender, individual popcorn chicken, individual fries, individual salad, regular drink, chocolate chip cookie and 1 dip. (1450-1900 Calories)', '15.89', 'Kentucky.jpg'),
(14, 48, '6 PIECE BUCKET AND 2 LARGE SIDES', '6 pieces of our Canadian farm raised and hand-breaded Secret Recipe chicken with your choice of 2 large sides. (750-2070 Cals/Person)', '26.49', 'bucket.jpg'),
(15, 48, 'Kentucky Scorcher Sandwich', 'Finger lickers beware. This actually spicy sandwich is a thick cut, 100% Canadian chicken breast, doused with signature scorcher sauce, smothered in spicy mayo and topped with crunchy pickles, all on toasted bun', '10.29', 'kfcscorcher.jpg'),
(16, 48, 'TOASTED TWISTER COMBO', 'Toasted Twister wrap filled with our Secret Recipe chicken, individual fries and your choice of drink. (830-1500 Calories)', '10.69', 'twister_combo.jpg\r\n'),
(17, 48, 'PLANT-BASED SANDWICH', 'Our NEW crispy plant-based fillet, coated in KFCs herbs and spices, sandwiched in a potato bun with lettuce and mayo. (700 Cals/Person)', '9.59', 'plant_based.jpg\r\n'),
(18, 49, 'WHOPPER with Cheese Meal', 'The WHOPPER with Cheese sandwich is a  savory flame-grilled beef topped with melted cheese, ripe tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles, and sliced onions, all on a warm, toasted, sesame seed bun. Served with your choice of medium side and medium drink.', '13.29', 'whopper_meal.jpg'),
(19, 49, '16pc Chicken Nuggets', 'Made with tender, seasoned white meat, bite-sized Chicken Nuggets are lightly coated in a seasoned home-style breading and perfect for dipping into any bold or classic sauce.', '6.89', '16nuggets.jpg'),
(20, 49, 'Bacon King Meal', 'The Bacon King Sandwich features two ¼ lb savory flame-grilled beef patties, topped a with hearty portion of thick-cut smoked bacon, melted American cheese and topped with ketchup and creamy mayonnaise all on a soft sesame seed bun. Served with your choice of medium side and medium drink.', '15.29', 'beacon_king_meal.jpg'),
(21, 49, 'Roadhouse King Meal', 'The Roadhouse King Sandwich features two ¼ lb savory flame-grilled beef patties, topped with 4 half-strips of thick-cut smoked bacon, crispy onion rings, tangy BBQ sauce, American cheese and creamy mayonnaise all on our sesame seed bun. Served with your choice of medium side and medium drink.', '15.39', 'Roadhouse King Meal.jpg'),
(22, 49, 'Spicy Chicken Parmesan Sandwich', 'Back for a limited time, the Spicy Chicken Parmesan Sandwich is a premium white meat chicken filet, seasoned and breaded and carefully topped with Italian-style marinara sauce, melted mozzarella cheese and shaved parmesan cheese blend all on a toasted potato bun.', '9.69', 'Spicy Chicken Parmesan Sandwich.jpg'),
(23, 49, 'Triple Stacker Meal', 'Made with our signature Stacker Sauce, three flame grilled patties, two slices of cheese, and bacon. The BK Stacker is back for a limited time.', '10.42', 'Triple Stacker Meal.jpeg'),
(24, 49, 'WHOPPER Family Bundle', 'A complete meal for the whole family, the WHOPPER Family Bundle includes two WHOPPER sandwiches, two WHOPPER JR sandwiches, two medium Fries, two medium Onion Rings, four medium Soft Drinks, and four Apple Turnovers.', '29.29', 'WHOPPER Family Bundle.jpg'),
(25, 49, 'Original Chicken Sandwich', 'The Original Chicken Sandwich is a lightly breaded chicken fillet topped with a simple combination of shredded lettuce and creamy mayonnaise on a sesame seed bun.', '7.29', 'Original Chicken Sandwich.jpg'),
(26, 50, 'French Vanilla Ice Cream (2 liters)', 'No sugar added.', '9.99', 'French Vanilla Ice Cream (2 liters).jpg'),
(27, 50, 'Black Cherry Ice Cream (2 liters)', 'No sugar added', '9.69', 'Black Cherry Ice Cream (2 liters).jpg'),
(28, 50, 'Chocolate Fudge Brownie Indulgence Ice Cream (2 liters)', 'No sugar added.', '9.99', 'Chocolate Fudge Brownie Indulgence Ice Cream (2 liters).jpg'),
(29, 50, 'Only Chocolate Ice Cream (2 Litre)', 'No sugar added.', '8.00', 'Only chocolate.jpg'),
(30, 50, 'Maple Walnut Ice Cream (1 Liter)', 'No sugar added.', '5.99', 'Maple Walnut Ice Cream (1 Liter).jpg'),
(31, 50, 'Lactose Free Vanilla Ice Cream ( 1 Litre)', 'No sugar added.', '6.49', 'Vanilla Ice Cream (1 Liter).jpg'),
(32, 50, 'Chocolate Peanut Butter Ice Cream (1 Litre)', 'No added sugar.', '7.89', 'chocolate peanut butter Ice Cream.jpg'),
(33, 51, 'Chicken Plate', 'Chicken shawarma, Basmati Rice, humus, garlic, red cabbage, lettuce, tomatoes, cucumber, parsley, pickles, red onion, pickled turnip, tahini, hot sauce', '15.99', 'chicken_plate.jpg'),
(34, 51, 'Chicken Shawarma Combo', 'Chicken Shawarma, humus, garlic, red cabbage, lettuce, tomatoes, cucumber, parsley, pickles, red onion, pickled turnip, tahini, hot sauce with fries, rice or salad with drink', '11.99', 'chicken_sharwarma_combo.jpg'),
(36, 51, 'Fresh Cut Fries', '', '5.99', 'Fresh Cut Fries.jpg'),
(37, 51, 'Greek Salad', 'Lettuce, tomato, cucumber, black olives, red onion, and feta cheese.', '11.29', 'Greek Salad.jpg'),
(38, 51, 'Fattoush Salad with Chicken', 'Chicken shawarma, lettuce, tomato, cucumber, parsley, red onion, humus, garlic, cabbage and pita chips with fattoush seasoning', '13.89', 'Fattoush Salad with Chicken.jpg'),
(39, 51, 'Lamb Shawarma Sandwich', 'Australian Lamb, humus, garlic, red cabbage, lettuce, tomatoes, cucumber, parsley, pickles, pickled turnip, red onion, tahini, hot sauce', '10.50', 'Lamb Shawarma Sandwich.jpg'),
(40, 51, 'Beef Shawarma Sandwich', 'Beef tenderloin, humus, garlic, red cabbage, lettuce, tomatoes, cucumber, parsley, pickles, pickled turnip, red onion, tahini, hot sauce', '12.99', 'Beef Shawarma Sandwich'),
(41, 51, 'Chicken Shawarma Sandwich', 'Chicken Shawarma, humus, garlic, red cabbage, lettuce, tomatoes, cucumber, parsley, pickles, pickled turnip, red onion, tahini, hot sauce.', '8.99', 'Chicken Shawarma Sandwich.jpg'),
(42, 52, '10 pc. Plant-Based Chick\'n Bites', 'Tastes like chicken, but without the chicken! The perfect morsel of juicy, plant-based chick\'n served with the plant-based sauce of your choice. Comes in orders of 10 or 20.', '14.99', '10 pc. Plant-Based Chick\'n Bites'),
(43, 52, 'Single Pizzas (Small) + Bottle Pop', 'Items included : Create your own small pizza+ Choice of 500mL bottle of Pop', '10.89', 'pizzaCombo.jpg'),
(44, 52, 'Chicken Wings (10 Wings) + Dipping Sauce', 'Items included : Choice of 10 pc wings + dip', '14.50', 'Chicken Wings (10 Wings) + Dipping Sauce.jpg\r\n'),
(45, 52, 'Single Paparoni Pizza (Medium)', 'Make your own masterpiece with our huge range of crusts, toppings and sauces.', '10.19', 'Single Pizzas (Medium).jpg\r\n'),
(46, 52, 'Small Bacon Double Cheeseburger', 'Cheeseburger. Pizza. Enough Said - Yeah, we did it. Crush two comfort-food classics in one, with ground beef, bacon crumble and six-cheese blend. Try it with Honey Mustard dipping sauce for extra burger bite!', '9.99', 'Cheeseburger.jpg'),
(47, 52, 'Large Great Canadian Pizza', 'True north delicious - As Canadian as a toque on a moose. Pepperoni, fresh mushrooms, bacon crumble and 100% Canadian Dairy mozzarella cheese.', '16.99', 'greatCanadianPizza.jpg'),
(48, 52, 'Tropical Hawaiian Pizza', 'Grab your floral shirt and dip in - Don\'t let anyone tell you it isn\'t amazing. This taste of the tropics brings together sweet pineapple, bacon crumble, bacon strips, and mozzarella cheese for a beach vacation on Flavour Island!', '8.99', 'Tropical Hawaiian.jpg\r\n\r\n'),
(49, 52, 'Meat Supreme pizza', 'Topped with classic pepperoni, bacon crumble, salami, spicy Italian sausage, mozzarella cheese, and Italiano blend seasoning. For the meat-lover in you.', '14.99', 'mearsupreme.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

DROP TABLE IF EXISTS `remark`;
CREATE TABLE IF NOT EXISTS `remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(62, 32, 'in process', 'hi', '2018-04-18 17:35:52'),
(63, 32, 'closed', 'cc', '2018-04-18 17:36:46'),
(64, 32, 'in process', 'fff', '2018-04-18 18:01:37'),
(65, 32, 'closed', 'its delv', '2018-04-18 18:08:55'),
(66, 34, 'in process', 'on a way', '2018-04-18 18:56:32'),
(67, 35, 'closed', 'ok', '2018-04-18 18:59:08'),
(68, 37, 'in process', 'on the way!', '2018-04-18 19:50:06'),
(69, 37, 'rejected', 'if admin cancel for any reason this box is for remark only for buter perposes', '2018-04-18 19:51:19'),
(70, 37, 'closed', 'delivered success', '2018-04-18 19:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `rs_id` int(222) NOT NULL AUTO_INCREMENT,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(48, 1, 'KFC', 'hydepark_KFC@gmail.com', ' 090412 64676', 'https://www.kfc.ca/', '7am', '8pm', 'monday-sunday', ' 1915 Hyde Park Rd, London, ON N6H 0A3', 'KFC_logo.png', '2022-03-16 18:18:36'),
(49, 1, 'Burger King', 'burgerking@gmail.com', '011 2677 9070', 'burgerking.com', '6am', '8pm', 'Monday-Sunday', '1295 Oxford St E, London, ON N5Y 4W4', 'burgerking.png', '2022-03-11 19:01:07'),
(50, 3, 'London Ice Cream Company', 'LondonIceCreamCompany@gmail.com', '090410 35147', 'LondonIceCreamCompany.com', '6am', '6pm', 'mon-sat', '43 Base Line Rd W, London, ON N6J 1V5', 'london ice cream company.png', '2022-03-11 19:12:53'),
(51, 4, 'Wow! Shawarma', 'Wow!shawarma@gmail.com', '(519) 601-9000', 'Wow!shawarma.ca', '8am', '9 pm', 'mon-thu', '434 Clarence St, London, ON N6A 3M8', 'wow.jpg', '2022-03-11 19:01:20'),
(52, 2, 'Pizza Pizza', 'pizzapizza@gmail.com', '687 876 5678', 'pizzapizza.ca', '6am', '10pm', 'Monday-Sunday', '1225 Wonderland Rd N, London, ON N6G 2V9', 'pizzapizza.jpg', '2022-03-11 19:03:08'),
(53, 4, 'Rambo\'s Kitchen', 'RambosKitchen@gmail.com', '465 898 8986', 'Rambo\'sKitchen.com', '7am', '7pm', 'mon-sun', '134 Commissioners Rd W, London, ON N6J 1X8', 'Rambo\'s Kitchen.jpg', '2022-03-11 19:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

DROP TABLE IF EXISTS `res_category`;
CREATE TABLE IF NOT EXISTS `res_category` (
  `c_id` int(222) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Burger\r\n\r\n', '2022-03-11 19:12:34'),
(2, 'Pizza', '2022-03-11 19:00:36'),
(3, 'IceCream\r\n', '2022-03-11 19:12:44'),
(4, 'Asian', '2022-03-11 19:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(33, 'Piyush', 'Piyush', 'Adya', 'Piyushadya52@gmail.com', '6479044624', 'acbd9ab2f68bea3f5291f825416546a1', '55-50 chapman court', 1, '2022-02-17 19:58:19'),
(34, 'HARDIK', 'HARDIK', 'SACHDEVA', 'HGAHDSGSAHD@gmail.com', '4379881654', 'e10adc3949ba59abbe56e057f20f883e', 'chapman ct', 1, '2022-02-17 20:48:15'),
(35, 'hardik1710', 'Hardik', 'Sachdeva', 'sachdeva.hardik@gmail.com', '4379881522', 'fcea920f7412b5da7be0cf42b8c93759', '50 Chapman Ct', 1, '2022-02-18 03:43:15'),
(36, 'hardik_', 'HARDIK', 'SACHDEVA', 's@gmail.com', '+917838201522', 'e19d5cd5af0378da05f63f891c7467af', '767,POCKET-E\r\nMAYUR VIHAR PHASE - 2', 1, '2022-03-09 18:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

DROP TABLE IF EXISTS `users_orders`;
CREATE TABLE IF NOT EXISTS `users_orders` (
  `o_id` int(222) NOT NULL AUTO_INCREMENT,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(37, 31, 'jklmno', 5, '17.99', 'closed', '2018-04-18 19:51:50'),
(38, 31, 'Red Robins Chick on a Stick', 2, '34.99', NULL, '2018-04-18 19:52:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
