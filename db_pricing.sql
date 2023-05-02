-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour landing_page
CREATE DATABASE IF NOT EXISTS `landing_page` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_swedish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `landing_page`;

-- Listage de la structure de table landing_page. pricing
CREATE TABLE IF NOT EXISTS `pricing` (
  `id_pricing` int NOT NULL AUTO_INCREMENT,
  `price` float(8,2) NOT NULL DEFAULT '0.00',
  `icon` int NOT NULL,
  `sale` int NOT NULL,
  `bandwidth` varchar(50) CHARACTER SET utf32 COLLATE utf32_swedish_ci NOT NULL,
  `onlineSpace` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  `supportNo` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  `domain` varchar(50) COLLATE utf32_swedish_ci NOT NULL DEFAULT '',
  `hiddenFees` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  `name` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pricing`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

-- Listage des données de la table landing_page.pricing : ~3 rows (environ)
INSERT INTO `pricing` (`id_pricing`, `price`, `icon`, `sale`, `bandwidth`, `onlineSpace`, `supportNo`, `domain`, `hiddenFees`, `name`) VALUES
	(1, 9.99, 1, 0, '1 GB', '500 Mb', 'No', '1', 'No', 'Starter'),
	(2, 19.99, 1, 20, '2 GB', '1 GB', 'Yes', '3', 'No', 'Intermediate'),
	(3, 29.99, 1, 0, '3 GB', '2 GB', 'Yes', 'Unlimited', 'No', 'Advanced');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
