# Host: localhost  (Version 5.5.5-10.4.10-MariaDB)
# Date: 2022-07-08 01:43:23
# Generator: MySQL-Front 6.1  (Build 1.11)


#
# Structure for table "jenis_perawatan"
#

DROP TABLE IF EXISTS `jenis_perawatan`;
CREATE TABLE `jenis_perawatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "jenis_perawatan"
#

INSERT INTO `jenis_perawatan` VALUES (5,'Ganti Oli'),(9,'Steam');

#
# Structure for table "merk"
#

DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `produk` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "merk"
#

INSERT INTO `merk` VALUES (6,'CRV','Honda'),(8,'HRV','Honda');

#
# Structure for table "mobil"
#

DROP TABLE IF EXISTS `mobil`;
CREATE TABLE `mobil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(50) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `biaya_sewa` double(20,2) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `cc` int(11) NOT NULL DEFAULT 0,
  `tahun` int(11) DEFAULT NULL,
  `merk_id` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "mobil"
#

INSERT INTO `mobil` VALUES (2,'B6444ZON','Alamaat doang ko',99.00,'2022-07-09',2,2147483647,8,'1657218833551959.jpg\n'),(4,'B6444ZOQ','Hitam',20000.00,'Test',200,2018,6,'1657218833551959.jpg');

#
# Structure for table "perawatan"
#

DROP TABLE IF EXISTS `perawatan`;
CREATE TABLE `perawatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `biaya` double(20,2) DEFAULT NULL,
  `km_mobil` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `jenis_perawatan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "perawatan"
#

INSERT INTO `perawatan` VALUES (1,'0000-00-00',NULL,NULL,NULL,NULL,NULL),(2,'0000-00-00',NULL,NULL,NULL,NULL,NULL),(3,'2022-07-08',200000.00,200000,'tes',2,5);

#
# Structure for table "sewa"
#

DROP TABLE IF EXISTS `sewa`;
CREATE TABLE `sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `noktp` varchar(20) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "sewa"
#

INSERT INTO `sewa` VALUES (3,'2022-06-12','2022-07-07','ingin kuliah di luar negeri','2',2,2),(5,'2022-07-06','2022-07-07','pengen aja','2',5,2),(6,'2022-07-07','2022-07-07','kurang orang','1',5,2),(7,'2022-07-31','2022-08-31','Depok','1234567',5,2),(8,'2022-07-08','2022-07-15','Depok','1234567',5,4);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','202cb962ac59075b964b07152d234b70','admin@gmail.com','2022-06-12 07:07:42','2022-06-12 07:07:42',1,'administrator'),(2,'aminah','90b74c589f46e8f3a484082d659308bd','aminah@gmail.com','2022-06-12 07:07:44','2022-06-12 07:07:44',0,'public'),(5,'ilham','202cb962ac59075b964b07152d234b70','ilham@gmail.com','2022-07-06 14:37:51',NULL,1,'public');
