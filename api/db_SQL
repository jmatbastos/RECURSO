
SET FOREIGN_KEY_CHECKS=0;
--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES (1,'Coffee'),(2,'Hot Beverages'),(3,'Cold Beverages');

--
-- Table structure for table `beverages`
--

DROP TABLE IF EXISTS `beverages`;
CREATE TABLE `beverages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` smallint(6) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `beverages`
--

INSERT INTO `beverages` VALUES (1,'Single Cup Brew',20,1,'Fresh Brewed coffee and steamed milk','middle.png'),(2,'Caffé Americano',14,1,'Fresh Brewed coffee','middle1.png'),(3,'Caramel Macchiato',11,1,'Fresh Caramel','middle2.png'),(4,'Standard black coffee',8,1,'Fresh black ','middle3.png'),(5,'Black Eyed Andy',23,1,'Fresh black ','middle2.png'),(6,'Coffee of the Day',22,1,'Fresh coffee','middle3.png'),(7,'Cuban Shot',14,1,'Cream cuban','middle.png'),(8,'Café Latte',11,1,'Fresh latte','middle1.png'),(9,'Caramel Macchiato',20,2,'Fresh macchiato','middle3.png'),(10,'Coffee of the Day',50,2,'Fresh coffee','middle2.png'),(11,'Caffé Americano',23,2,'Fresh americano','middle.png'),(12,'Filtered Coffee',50,2,'Fresh filtered','middle1.png'),(13,'Cappuccino coffee',10,2,'Fresh coffee','middle2.png'),(14,'Cafe latte',10,2,'Cream latte','middle1.png'),(15,'Espresso coffee',15,2,'Cream espresso','middle3.png'),(16,'Ice/Cold Coffee',18,2,'Super iced','middle.png'),(17,'Single Cup Brew',20,3,'Single cream','middle.png'),(18,'Caffé Americano',14,3,'Cream coffee','middle1.png'),(19,'Caramel Macchiato',11,3,'Fresh caramel','middle3.png'),(20,'Standard black coffee',8,3,'Standard black','middle2.png'),(21,'Black Eyed Andy',23,3,'Super black andy','middle1.png'),(22,'Coffee of the Day',22,3,'Cimbalino well made!','middle3.png'),(23,'Cuban Shot',14,3,'Best bica in town','middle2.png'),(24,'Café Latte',11,3,'Best \"meia de leite\" in town!','middle.png');


--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `password_digest` varchar(255) DEFAULT NULL,
  `remember_digest` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `activation_digest` varchar(255) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `reset_digest` varchar(255) DEFAULT NULL,
  `reset_sent_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,  
  `n_persons` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  UNIQUE KEY `date` (`date`,`client_id`),
  FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;



