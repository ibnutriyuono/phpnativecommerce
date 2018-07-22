/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - db_atol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_atol` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_atol`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) DEFAULT NULL,
  `name_admin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username_admin`,`password_admin`,`name_admin`) values ('admin','admin','mity');

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quantity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_post` (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `order` */

insert  into `order`(`id_order`,`id_post`,`id_user`,`date_order`,`quantity`) values (2,18,8,'2018-07-11 19:38:34','2'),(3,20,8,'2018-07-11 19:38:34','2'),(4,21,1,'2018-07-11 19:39:12','2'),(5,20,1,'2018-07-11 19:39:12','2'),(6,18,8,'2018-07-11 19:39:34','4'),(7,21,8,'2018-07-11 19:39:50','3'),(8,19,8,'2018-07-11 19:39:50','1'),(9,19,8,'2018-07-11 19:41:40','3'),(10,18,8,'2018-07-11 19:41:40','3');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock` int(11) DEFAULT NULL,
  `username_admin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `posts_ibfk_1` (`username_admin`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username_admin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `posts` */

insert  into `posts`(`id_post`,`title`,`price`,`image`,`created_at`,`stock`,`username_admin`) values (18,'Ayam Geprek',13000,'download.jpg','2018-07-08 21:11:23',120,'admin'),(19,'Ayam Keju',14000,'ayamkeju.jpg','2018-07-08 20:43:42',50,'admin'),(20,'Ayam Kodok',15000,'ayamkodok.jpg','2018-07-08 21:11:46',80,'admin'),(21,'Ayam Krispi',12000,'ayamkrispi.jpg','2018-07-08 21:12:21',100,'admin');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username_user`,`password_user`,`email_user`,`name_user`) values (1,'ibnu','ibnu','ibnutriyuono@gmail.com','ibnutriyuono'),(2,'mity','mity','mity@mity.co','mity'),(3,'sda','sad','dsa@das.d','asd'),(4,'momo','momo','momo@momo.co','momo'),(5,'momooo','momo','momo@Momo.co','momo'),(6,'jane','jane','jane@hasa.c','jane'),(8,'rafli','123456','rafli060395@gmail.com','rafli rachmawandi');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
