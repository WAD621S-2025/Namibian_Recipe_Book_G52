-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2025 at 08:42 PM
-- Server version: 9.1.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `IngredientID` int NOT NULL AUTO_INCREMENT,
  `RecipeID` int DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Quantity` varchar(50) DEFAULT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Unit` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`IngredientID`),
  KEY `RecipeID` (`RecipeID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`IngredientID`, `RecipeID`, `Name`, `Quantity`, `CreatedAt`, `Unit`) VALUES
(1, 1, 'Vegitable Oil', '30', '2025-10-18 15:27:23', 'ml'),
(2, 1, 'Meat with bones (Beef, Lamb or Game)', '1', '2025-10-18 15:57:51', 'kg'),
(3, 1, 'Onions (sliced)', '300', '2025-10-18 15:58:23', 'g'),
(4, 1, 'Green Peppers, sliced (Optional)', '300', '2025-10-18 15:58:49', 'g'),
(5, 1, 'Sweet Corn (Optional)', '200', '2025-10-18 15:59:11', 'g'),
(6, 1, '4 Garlic Cloves (minced)', '12', '2025-10-18 15:59:49', 'g'),
(7, 1, 'Carrots (sliced)', '500', '2025-10-18 16:00:06', 'g'),
(8, 1, 'Water or Beef Broth', '400', '2025-10-18 16:00:58', 'ml'),
(9, 1, 'Table Salt', '10', '2025-10-18 16:01:21', 'g'),
(10, 1, 'Black Pepper', '3', '2025-10-18 16:01:30', 'g'),
(11, 1, 'Dried Thyme', '7.5', '2025-10-18 16:01:42', 'g'),
(12, 1, 'Paprika / Cayenne Pepper', '9', '2025-10-18 16:02:11', 'g'),
(13, 1, 'Curry Powder', '7', '2025-10-18 16:02:26', 'g'),
(14, 1, 'Brown Sugar', '12', '2025-10-18 16:02:42', 'g'),
(15, 1, 'Knorr Soup Mix (Brown and Rich )', '50', '2025-10-18 16:04:07', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `RecipeID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Instructions` text,
  `Category` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ImagePath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RecipeID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `Name`, `Instructions`, `Category`, `Region`, `CreatedAt`, `ImagePath`) VALUES
(1, 'Potjiekos', 'Step 1. Brown the Meat:\r\nHeat the vegetable oil in your potjie over medium-high heat (Ironic as this is over a wood fire, lets say just before the oil starts smoking). Once heated, add the meat and brown on all sides to seal in flavor. Remove the browned meat and set aside.\r\n\r\nStep 2. Sauté the Onions and Garlic:\r\nIn the same pot, add the onions and cook until golden brown and fragrant. Stir in the garlic and cook for another minute, being careful not to let it burn.\r\n\r\nStep 3. Layer the Ingredients:\r\nReturn the browned meat to the pot. Traditionally, potjiekos ingredients are layered rather than mixed — this helps preserve their textures.\r\n\r\n4. Add Liquids and Seasoning:\r\nPour water or beef broth over the meat and onions. Sprinkle in paprika, curry powder, salt, and pepper. Gently cover with the lid and let it come to a slow simmer and slow cook for 40 minutes. Avoid stirring, simply rotate the pot occasionally for even cooking. This is where the magic happens. The flavors should blend slowly as the meat tenderizes.\r\n\r\n6. Add Vegetables:\r\nOnce the meat is about 80% tender, layer in your carrots and potatoes (and any other optional vegitables). Continue simmering until the vegetables are cooked to your liking.\r\n\r\n7. Finish with Soup Mix:\r\nIn a small bowl, mix about 50g of the soup mix packet, brown sugar, thyme, and a pinch of curry powder. Stir until the sugar dissolves. Temper the mixture by adding half a cup of water and let it cook for another 10-15 minutes to thicken and enrich the flavor.\r\n\r\n8. Serve and Enjoy:\r\nOnce everything is tender and the aroma fills the air, remove the pot from the fire. Garnish with freshly chopped parsley and serve directly from the pot.\r\n\r\nServing Suggestions\r\n\r\nPotjiekos is best enjoyed the traditional way : outdoors, around the fire, and with good company of course. Serve it with freshly baked bread, rice, or pap (maize porridge).\r\n', 'Omnivore', 'All Around the Country', '2025-09-24 06:08:19', 'assets/uploads/recipes/1760790404_Poitjie2.png'),
(3, 'Potjiekos', 'Step 1. Brown the Meat:\r\nHeat the vegetable oil in your potjie over medium-high heat (Ironic as this is over a wood fire, lets say just before the oil starts smoking). Once heated, add the meat and brown on all sides to seal in flavor. Remove the browned meat and set aside.\r\n\r\nStep 2. Sauté the Onions and Garlic:\r\nIn the same pot, add the onions and cook until golden brown and fragrant. Stir in the garlic and cook for another minute, being careful not to let it burn.\r\n\r\nStep 3. Layer the Ingredients:\r\nReturn the browned meat to the pot. Traditionally, potjiekos ingredients are layered rather than mixed — this helps preserve their textures.\r\n\r\n4. Add Liquids and Seasoning:\r\nPour water or beef broth over the meat and onions. Sprinkle in paprika, curry powder, salt, and pepper. Gently cover with the lid and let it come to a slow simmer and slow cook for 40 minutes. Avoid stirring, simply rotate the pot occasionally for even cooking. This is where the magic happens. The flavors should blend slowly as the meat tenderizes.\r\n\r\n6. Add Vegetables:\r\nOnce the meat is about 80% tender, layer in your carrots and potatoes (and any other optional vegitables). Continue simmering until the vegetables are cooked to your liking.\r\n\r\n7. Finish with Soup Mix:\r\nIn a small bowl, mix about 50g of the soup mix packet, brown sugar, thyme, and a pinch of curry powder. Stir until the sugar dissolves. Temper the mixture by adding half a cup of water and let it cook for another 10-15 minutes to thicken and enrich the flavor.\r\n\r\n8. Serve and Enjoy:\r\nOnce everything is tender and the aroma fills the air, remove the pot from the fire. Garnish with freshly chopped parsley and serve directly from the pot.\r\n\r\nServing Suggestions\r\n\r\nPotjiekos is best enjoyed the traditional way : outdoors, around the fire, and with good company of course. Serve it with freshly baked bread, rice, or pap (maize porridge).\r\n', 'Omnivore', 'All Around the Country', '2025-09-24 06:08:19', 'assets/uploads/recipes/1760790404_Poitjie2.png'),
(4, 'Potjiekos', 'Step 1. Brown the Meat:\r\nHeat the vegetable oil in your potjie over medium-high heat (Ironic as this is over a wood fire, lets say just before the oil starts smoking). Once heated, add the meat and brown on all sides to seal in flavor. Remove the browned meat and set aside.\r\n\r\nStep 2. Sauté the Onions and Garlic:\r\nIn the same pot, add the onions and cook until golden brown and fragrant. Stir in the garlic and cook for another minute, being careful not to let it burn.\r\n\r\nStep 3. Layer the Ingredients:\r\nReturn the browned meat to the pot. Traditionally, potjiekos ingredients are layered rather than mixed — this helps preserve their textures.\r\n\r\n4. Add Liquids and Seasoning:\r\nPour water or beef broth over the meat and onions. Sprinkle in paprika, curry powder, salt, and pepper. Gently cover with the lid and let it come to a slow simmer and slow cook for 40 minutes. Avoid stirring, simply rotate the pot occasionally for even cooking. This is where the magic happens. The flavors should blend slowly as the meat tenderizes.\r\n\r\n6. Add Vegetables:\r\nOnce the meat is about 80% tender, layer in your carrots and potatoes (and any other optional vegitables). Continue simmering until the vegetables are cooked to your liking.\r\n\r\n7. Finish with Soup Mix:\r\nIn a small bowl, mix about 50g of the soup mix packet, brown sugar, thyme, and a pinch of curry powder. Stir until the sugar dissolves. Temper the mixture by adding half a cup of water and let it cook for another 10-15 minutes to thicken and enrich the flavor.\r\n\r\n8. Serve and Enjoy:\r\nOnce everything is tender and the aroma fills the air, remove the pot from the fire. Garnish with freshly chopped parsley and serve directly from the pot.\r\n\r\nServing Suggestions\r\n\r\nPotjiekos is best enjoyed the traditional way : outdoors, around the fire, and with good company of course. Serve it with freshly baked bread, rice, or pap (maize porridge).\r\n', 'Omnivore', 'All Around the Country', '2025-09-24 06:08:19', 'assets/uploads/recipes/1760790404_Poitjie2.png'),
(5, 'Potjiekos', 'Step 1. Brown the Meat:\r\nHeat the vegetable oil in your potjie over medium-high heat (Ironic as this is over a wood fire, lets say just before the oil starts smoking). Once heated, add the meat and brown on all sides to seal in flavor. Remove the browned meat and set aside.\r\n\r\nStep 2. Sauté the Onions and Garlic:\r\nIn the same pot, add the onions and cook until golden brown and fragrant. Stir in the garlic and cook for another minute, being careful not to let it burn.\r\n\r\nStep 3. Layer the Ingredients:\r\nReturn the browned meat to the pot. Traditionally, potjiekos ingredients are layered rather than mixed — this helps preserve their textures.\r\n\r\n4. Add Liquids and Seasoning:\r\nPour water or beef broth over the meat and onions. Sprinkle in paprika, curry powder, salt, and pepper. Gently cover with the lid and let it come to a slow simmer and slow cook for 40 minutes. Avoid stirring, simply rotate the pot occasionally for even cooking. This is where the magic happens. The flavors should blend slowly as the meat tenderizes.\r\n\r\n6. Add Vegetables:\r\nOnce the meat is about 80% tender, layer in your carrots and potatoes (and any other optional vegitables). Continue simmering until the vegetables are cooked to your liking.\r\n\r\n7. Finish with Soup Mix:\r\nIn a small bowl, mix about 50g of the soup mix packet, brown sugar, thyme, and a pinch of curry powder. Stir until the sugar dissolves. Temper the mixture by adding half a cup of water and let it cook for another 10-15 minutes to thicken and enrich the flavor.\r\n\r\n8. Serve and Enjoy:\r\nOnce everything is tender and the aroma fills the air, remove the pot from the fire. Garnish with freshly chopped parsley and serve directly from the pot.\r\n\r\nServing Suggestions\r\n\r\nPotjiekos is best enjoyed the traditional way : outdoors, around the fire, and with good company of course. Serve it with freshly baked bread, rice, or pap (maize porridge).\r\n', 'Omnivore', 'All Around the Country', '2025-09-24 06:08:19', 'assets/uploads/recipes/1760790404_Poitjie2.png'),
(6, 'Potjiekos', 'Step 1. Brown the Meat:\r\nHeat the vegetable oil in your potjie over medium-high heat (Ironic as this is over a wood fire, lets say just before the oil starts smoking). Once heated, add the meat and brown on all sides to seal in flavor. Remove the browned meat and set aside.\r\n\r\nStep 2. Sauté the Onions and Garlic:\r\nIn the same pot, add the onions and cook until golden brown and fragrant. Stir in the garlic and cook for another minute, being careful not to let it burn.\r\n\r\nStep 3. Layer the Ingredients:\r\nReturn the browned meat to the pot. Traditionally, potjiekos ingredients are layered rather than mixed — this helps preserve their textures.\r\n\r\n4. Add Liquids and Seasoning:\r\nPour water or beef broth over the meat and onions. Sprinkle in paprika, curry powder, salt, and pepper. Gently cover with the lid and let it come to a slow simmer and slow cook for 40 minutes. Avoid stirring, simply rotate the pot occasionally for even cooking. This is where the magic happens. The flavors should blend slowly as the meat tenderizes.\r\n\r\n6. Add Vegetables:\r\nOnce the meat is about 80% tender, layer in your carrots and potatoes (and any other optional vegitables). Continue simmering until the vegetables are cooked to your liking.\r\n\r\n7. Finish with Soup Mix:\r\nIn a small bowl, mix about 50g of the soup mix packet, brown sugar, thyme, and a pinch of curry powder. Stir until the sugar dissolves. Temper the mixture by adding half a cup of water and let it cook for another 10-15 minutes to thicken and enrich the flavor.\r\n\r\n8. Serve and Enjoy:\r\nOnce everything is tender and the aroma fills the air, remove the pot from the fire. Garnish with freshly chopped parsley and serve directly from the pot.\r\n\r\nServing Suggestions\r\n\r\nPotjiekos is best enjoyed the traditional way : outdoors, around the fire, and with good company of course. Serve it with freshly baked bread, rice, or pap (maize porridge).\r\n', 'Omnivore', 'All Around the Country', '2025-09-24 06:08:19', 'assets/uploads/recipes/1760790404_Poitjie2.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
