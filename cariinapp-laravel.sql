/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.31-MariaDB : Database - cariin-app-hujjat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cariin_recipe_details` */

CREATE TABLE `cariin_recipe_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_recipe` int(10) unsigned NOT NULL,
  `nama_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cariin_recipe_details` */

insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (1,2,'updated1',NULL,'2018-09-15 09:54:01','2018-09-16 05:27:00');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (2,2,'updated2',NULL,'2018-09-15 09:54:01','2018-09-16 05:27:00');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (3,2,'updated3',NULL,'2018-09-15 09:54:01','2018-09-16 05:27:00');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (4,2,'updated4',NULL,'2018-09-15 09:54:02','2018-09-16 05:27:00');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (5,2,'updated5',NULL,'2018-09-15 09:54:02','2018-09-16 05:27:00');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (6,3,'updated1',NULL,'2018-09-16 05:25:49','2018-09-16 05:46:31');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (7,3,'updated2',NULL,'2018-09-16 05:25:50','2018-09-16 05:46:31');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (8,3,'updated3',NULL,'2018-09-16 05:25:50','2018-09-16 05:46:31');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (9,3,'updated4',NULL,'2018-09-16 05:25:50','2018-09-16 05:46:31');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (10,3,'updated5',NULL,'2018-09-16 05:25:50','2018-09-16 05:46:31');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (11,4,'updated1',NULL,'2018-09-16 05:26:00','2018-09-16 05:40:51');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (12,4,'updated2',NULL,'2018-09-16 05:26:00','2018-09-16 05:40:51');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (13,4,'updated3',NULL,'2018-09-16 05:26:00','2018-09-16 05:40:51');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (14,4,'updated4',NULL,'2018-09-16 05:26:01','2018-09-16 05:40:51');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (15,4,'updated5',NULL,'2018-09-16 05:26:01','2018-09-16 05:40:51');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (21,6,'updated1','2018-09-16 05:55:08','2018-09-16 05:54:40','2018-09-16 05:55:08');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (22,6,'updated2','2018-09-16 05:55:08','2018-09-16 05:54:40','2018-09-16 05:55:08');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (23,6,'updated3','2018-09-16 05:55:08','2018-09-16 05:54:40','2018-09-16 05:55:08');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (24,6,'updated4','2018-09-16 05:55:08','2018-09-16 05:54:40','2018-09-16 05:55:08');
insert  into `cariin_recipe_details`(`id`,`id_recipe`,`nama_bahan`,`deleted_at`,`created_at`,`updated_at`) values (25,6,'updated5','2018-09-16 05:55:08','2018-09-16 05:54:40','2018-09-16 05:55:08');

/*Table structure for table `cariin_recipes` */

CREATE TABLE `cariin_recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_masak` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cariin_recipes` */

insert  into `cariin_recipes`(`id`,`id_user`,`nama`,`bahan`,`cara_masak`,`deleted_at`,`created_at`,`updated_at`) values (2,1,'updated',' updated1 updated2 updated3 updated4 updated5','cara masak updated',NULL,'2018-09-15 09:54:01','2018-09-16 05:27:00');
insert  into `cariin_recipes`(`id`,`id_user`,`nama`,`bahan`,`cara_masak`,`deleted_at`,`created_at`,`updated_at`) values (3,1,'updated',' updated1 updated2 updated3 updated4 updated5','cara masak updated',NULL,'2018-09-16 05:25:49','2018-09-16 05:46:31');
insert  into `cariin_recipes`(`id`,`id_user`,`nama`,`bahan`,`cara_masak`,`deleted_at`,`created_at`,`updated_at`) values (4,1,'updated',' updated1 updated2 updated3 updated4 updated5','cara masak updated',NULL,'2018-09-16 05:26:00','2018-09-16 05:40:50');
insert  into `cariin_recipes`(`id`,`id_user`,`nama`,`bahan`,`cara_masak`,`deleted_at`,`created_at`,`updated_at`) values (6,1,'updated dong',' updated1 updated2 updated3 updated4 updated5','cara masak updated','2018-09-16 05:55:08','2018-09-16 05:54:40','2018-09-16 05:55:08');

/*Table structure for table `cariin_users` */

CREATE TABLE `cariin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isEmailConfirmed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `activation_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cariin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cariin_users` */

insert  into `cariin_users`(`id`,`username`,`password`,`name`,`email`,`isEmailConfirmed`,`activation_token`,`avatar`,`deleted_at`,`created_at`,`updated_at`) values (1,'asdasdasd','$2y$10$sCxEvCb929LNhRbX9rU0jOAi9lb9UYlls6wQFv1/whVDCVn/7PG6O','asd','asd','1',NULL,NULL,NULL,'2018-09-14 11:46:09','2018-09-14 12:08:26');
insert  into `cariin_users`(`id`,`username`,`password`,`name`,`email`,`isEmailConfirmed`,`activation_token`,`avatar`,`deleted_at`,`created_at`,`updated_at`) values (2,'gituloh','$2y$10$qE.5g83R3kP2WmGENMbYUeFxHx5HMwEh9IOITOQPfwYCNgMySnYMW','baru','astalavista','1',NULL,NULL,NULL,'2018-09-14 12:08:39','2018-09-14 12:08:47');
insert  into `cariin_users`(`id`,`username`,`password`,`name`,`email`,`isEmailConfirmed`,`activation_token`,`avatar`,`deleted_at`,`created_at`,`updated_at`) values (7,'agungwpg','$2y$10$Nw5zTkL3X5cOtt.fyEU6mOcwStevn6R/ZC/Y/SezfShNfYYYXJmn.','agung','agungwpzzzg@gmail.com','1',NULL,NULL,NULL,'2018-09-14 12:55:04','2018-09-15 09:30:58');

/*Table structure for table `categories` */

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`title`,`description`,`created_at`,`updated_at`) values (2,'asdsa','<p>asdasds<br></p>','2018-09-14 11:32:14','2018-09-14 11:32:14');

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2018_01_22_011911_create_categories_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2018_09_14_111032_create_cariin_users_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2018_09_14_111134_create_cariin_recipes_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2018_09_14_111205_create_cariin_recipe_details_table',2);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`user_type`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','agungwpg@gmail.com','user','$2y$10$dnjkrXFBuecTBWGrFFnVuO0ECDw3MjQ713TDpyxLQ7rYsfdytd4ky',NULL,'2018-09-14 10:45:38','2018-09-14 10:45:38');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
