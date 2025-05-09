/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - vlc_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vlc_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `vlc_db`;

/*Table structure for table `adjustment` */

DROP TABLE IF EXISTS `adjustment`;

CREATE TABLE `adjustment` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `payroll_period` varchar(100) DEFAULT NULL,
  `empid` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `adjustment` */

insert  into `adjustment`(`id`,`payroll_period`,`empid`,`description`,`amount`,`datearray`,`timearray`,`branch`) values 
(1,'2','01','ADJUSTMENT',1000,'2025-04-30','12:00:11','4'),
(2,'3','04','Holiday Pay',500,'2025-05-02','14:42:15','4'),
(3,'3','02','Holiday Pay',400,'2025-05-02','14:42:44','4'),
(4,'3','01','Adjustment',1250,'2025-05-02','14:56:02','4');

/*Table structure for table `advances` */

DROP TABLE IF EXISTS `advances`;

CREATE TABLE `advances` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `empid` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `advances` */

insert  into `advances`(`id`,`empid`,`description`,`amount`,`branch`,`datearray`,`timearray`,`status`) values 
(1,'03','Cash Advance',5000,'4','2025-04-23','16:02:37','pending'),
(2,'05','Cash Advance',10000,'4','2025-05-05','14:24:46','pending');

/*Table structure for table `balances` */

DROP TABLE IF EXISTS `balances`;

CREATE TABLE `balances` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `balances` */

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `branch` */

insert  into `branch`(`id`,`description`) values 
(4,'KIDAPAWAN'),
(5,'MIDSAYAP');

/*Table structure for table `commissioner` */

DROP TABLE IF EXISTS `commissioner`;

CREATE TABLE `commissioner` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(200) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datearray` date NOT NULL,
  `timearray` time NOT NULL,
  `status` varchar(100) DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `commissioner` */

insert  into `commissioner`(`id`,`lastname`,`firstname`,`branch`,`username`,`password`,`datearray`,`timearray`,`status`) values 
(2,'','JOAN','4','','','2025-04-24','10:08:54','Active'),
(3,'','TOTO','4','','','2025-04-24','10:09:40','Active'),
(4,'','RICKY SOCO','4','','','2025-04-24','10:09:55','Active'),
(5,'','SIR ERNING','4','','','2025-04-24','10:10:04','Active'),
(6,'','JOY','4','','','2025-04-24','10:10:16','Active'),
(7,'','MICO','4','','','2025-04-24','10:10:25','Active'),
(8,'','LTO DANNY','4','','','2025-04-24','10:10:36','Active'),
(9,'','LTO JOSEPH','4','','','2025-04-24','10:10:45','Active'),
(10,'','LAKAY','4','','','2025-04-24','10:10:53','Active'),
(11,'','ENERO','4','','','2025-04-24','10:11:01','Active'),
(12,'','ATE ROSE','4','','','2025-04-24','10:11:12','Active'),
(13,'','ATE BEM','4','','','2025-04-24','10:11:23','Active'),
(14,'','ANN/MEDES','4','','','2025-04-24','10:11:42','Active'),
(15,'','DEN2','4','','','2025-04-24','10:12:13','Active'),
(16,'','CHE2','4','','','2025-04-24','10:12:23','Active'),
(17,'','INGGO','4','','','2025-04-24','10:12:32','Active'),
(18,'','VICKY','4','','','2025-04-24','10:12:43','Active'),
(19,'','ATE ROSE/J','4','','','2025-04-24','10:12:52','Active'),
(20,'','CHE/MAYRAN','4','','','2025-04-24','10:13:02','Active'),
(21,'','TANG2','4','','','2025-04-24','10:13:12','Active'),
(22,'','OMAR','4','','','2025-04-24','10:14:00','Active'),
(23,'','CHA2','4','','','2025-04-24','10:14:42','Active'),
(24,'','MARY','4','','','2025-04-24','10:14:58','Active'),
(25,'','BB CRUZ','4','','','2025-04-24','10:15:12','Active'),
(26,'','JING2','4','','','2025-04-24','10:15:28','Active'),
(27,'','ADMIN','4','','','2025-04-24','10:15:40','Active'),
(28,'','FIDELA','4','','','2025-04-24','10:15:54','Active'),
(29,'','TMU','4','','','2025-04-24','10:16:04','Active'),
(30,'','CLAUDINE/TATA','4','','','2025-04-24','10:16:31','Active'),
(31,'','ATE LETTY','4','','','2025-04-24','10:16:42','Active'),
(32,'','BASIT','4','','','2025-04-24','10:21:34','Active'),
(33,'','JAMIL','4','','','2025-04-24','10:21:42','Active'),
(34,'','LTO LYN2','4','','','2025-04-24','10:21:52','Active'),
(35,'','NASH','4','','','2025-04-24','10:22:01','Active'),
(36,'','LTO INDAY','4','','','2025-04-24','10:22:11','Active'),
(37,'','LTO TINA','4','','','2025-04-24','10:22:21','Active'),
(38,'','LTO MELCY','4','','','2025-04-24','10:22:30','Active'),
(39,'','LTO ALMA','4','','','2025-04-24','10:22:40','Active'),
(40,'','JIJI FERENAL','4','','','2025-04-24','11:14:09','Active'),
(41,'','RAMIL','4','','','2025-04-24','11:14:26','Active'),
(42,'','CHOY','4','','','2025-04-24','11:14:35','Active'),
(43,'','WEN2','4','','','2025-04-24','11:14:44','Active'),
(44,'','ATE SUSAN','4','','','2025-04-24','11:25:45','Active'),
(45,'','ATE MEHAY','4','','','2025-04-24','11:25:57','Active');

/*Table structure for table `commissionerdetails` */

DROP TABLE IF EXISTS `commissionerdetails`;

CREATE TABLE `commissionerdetails` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `comm_id` varchar(100) DEFAULT NULL,
  `trainee_id` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `commissionerdetails` */

insert  into `commissionerdetails`(`id`,`comm_id`,`trainee_id`,`datearray`,`timearray`,`status`) values 
(5,'32','20250424105523','2025-04-23','10:55:23','pending'),
(6,'40','20250424111720','2025-04-24','11:17:20','pending'),
(7,'40','20250424111807','2025-04-24','11:18:07','pending'),
(8,'40','20250424111844','2025-04-24','11:18:44','pending'),
(9,'2','20250424111938','2025-04-24','11:19:38','pending'),
(10,'2','20250424112149','2025-04-24','11:21:49','pending'),
(11,'30','20250424112238','2025-04-24','11:22:38','pending'),
(12,'3','20250424112410','2025-04-24','11:24:10','pending'),
(13,'31','20250424112443','2025-04-24','11:24:43','pending'),
(14,'44','20250424112657','2025-04-24','11:26:57','pending'),
(15,'18','20250424112737','2025-04-24','11:27:37','pending'),
(16,'32','20250424112822','2025-04-24','11:28:22','pending');

/*Table structure for table `computation` */

DROP TABLE IF EXISTS `computation`;

CREATE TABLE `computation` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `tdc` int(11) DEFAULT NULL,
  `pdc` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `computation` */

insert  into `computation`(`id`,`tdc`,`pdc`,`employee`,`branch`) values 
(1,80,60,4,'4');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `controlno` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `commissioner` int(45) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `login_user` varchar(100) DEFAULT NULL,
  `branch` varchar(100) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `customer` */

insert  into `customer`(`id`,`controlno`,`lastname`,`firstname`,`type`,`code`,`amount`,`commissioner`,`status`,`datearray`,`timearray`,`login_user`,`branch`,`remarks`) values 
(5,'20250424105523','TOMES','KERWIN','PDC','12',900,32,'PAID','2025-04-24','10:55:23','Administrator','4',''),
(6,'20250424111720','CAÑETE','JENEVIEVE','PDC','12',1000,40,'PAID','2025-04-24','11:17:20','Administrator','4',''),
(7,'20250424111807','BEDUYA','SHELLA MAE','PDC','12',1000,40,'PAID','2025-04-24','11:18:07','Administrator','4',''),
(8,'20250424111844','GATO','WILMER','PDC','12',1000,40,'PAID','2025-04-24','11:18:44','Administrator','4',''),
(9,'20250424111938','FARE','HARLEY','PDC','12',0,2,'pending','2025-04-24','11:19:38','Administrator','4',''),
(10,'20250424112149','MELENDREZ','IVY','PDC','12',0,2,'pending','2025-04-24','11:21:49','Administrator','4',''),
(11,'20250424112238','TADINA','ERNESTO','PDC','12',0,30,'pending','2025-04-24','11:22:38','Administrator','4',''),
(12,'20250424112410','SISNEROS','JESSIE','PDC','12',1000,3,'PAID','2025-04-24','11:24:10','Administrator','4',''),
(13,'20250424112443','LUZON','FAITH','PDC','12',1000,31,'PAID','2025-04-24','11:24:43','Administrator','4',''),
(14,'20250424112657','NECOR','LARDIE','PDC','12',1000,44,'PAID','2025-04-24','11:26:57','Administrator','4',''),
(15,'20250424112737','MAYAGMA','JOHN REYX','PDC','12',1000,18,'PAID','2025-04-24','11:27:37','Administrator','4',''),
(16,'20250424112822','TABASONDRA','JENNY','PDC','12',900,32,'PAID','2025-04-24','11:28:22','Administrator','4','');

/*Table structure for table `deduction` */

DROP TABLE IF EXISTS `deduction`;

CREATE TABLE `deduction` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `payroll_period` varchar(100) DEFAULT NULL,
  `empid` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `deduction` */

insert  into `deduction`(`id`,`payroll_period`,`empid`,`description`,`amount`,`datearray`,`timearray`,`branch`) values 
(5,'1','04','SSS',0,'2025-04-23','10:07:06','4'),
(6,'1','01','SSS',0,'2025-04-23','10:08:06','4'),
(7,'1','04','HALF DAY',250,'2025-04-23','10:14:52','4'),
(8,'1','05','HALF DAY',175,'2025-04-23','11:18:41','4'),
(9,'1','02','HALF DAY',200,'2025-04-23','11:19:01','4'),
(11,'2','04','PHILHEALTH',0,'2025-04-29','13:28:43','4'),
(12,'2','04','SSS',0,'2025-04-29','13:28:55','4'),
(13,'3','03','Cash Advance',500,'2025-05-02','14:59:39','4');

/*Table structure for table `deposit` */

DROP TABLE IF EXISTS `deposit`;

CREATE TABLE `deposit` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `deposit` */

/*Table structure for table `designation` */

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `designation` */

insert  into `designation`(`id`,`designation`) values 
(6,'SECRETARY'),
(7,'ASSISTANT SECRETARY'),
(8,'TDC INSTRUCTOR'),
(9,'PDC INSTRUCTOR'),
(10,'INSTRUCTOR');

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `idno` varchar(100) DEFAULT NULL,
  `empid` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `employee` */

insert  into `employee`(`id`,`idno`,`empid`,`lastname`,`firstname`,`middlename`,`suffix`,`birthdate`,`gender`) values 
(5,'20250430092721','04','ABOY','DARLYN','VILLOGA','','1991-09-10','Female'),
(6,'20250430093024','01','LABANON','OLIVER','T','','1979-12-24','Male'),
(12,'20250430093020','03','LAGUYO','WILLIE','PILAPIL','JR','2025-11-23','Male'),
(13,'20250430093013','06','AMER','MAYELL','','','1989-05-01','Male'),
(14,'20250430093025','02','LADICA','PRINCESS LARAINE','FERNANDEZ','','1987-11-30','Female'),
(16,'20250430095339','05','BOGADOR','NIEL JONAS','MOJADO','','1992-10-10','Male'),
(17,'20250430095923','07','KELLEY','THOMAS LEE','OSIONES','','2025-04-30','Male');

/*Table structure for table `employeedetails` */

DROP TABLE IF EXISTS `employeedetails`;

CREATE TABLE `employeedetails` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `idno` varchar(100) DEFAULT NULL,
  `empid` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `is_daily` int(11) DEFAULT 1,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `employeedetails` */

insert  into `employeedetails`(`id`,`idno`,`empid`,`designation`,`salary`,`is_daily`,`branch`) values 
(5,'20250430092721','04','6',500,1,'4'),
(6,'20250430093024','01','8',0,0,'4'),
(10,'20250430093025','02','7',400,1,'4'),
(12,'20250430093020','03','9',0,0,'4'),
(13,'20250430093013','06','10',350,1,'4'),
(16,'20250430095339','05','10',350,1,'4'),
(17,'20250430095923','07','10',500,1,'4');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `expenses` */

/*Table structure for table `fixed_deduction` */

DROP TABLE IF EXISTS `fixed_deduction`;

CREATE TABLE `fixed_deduction` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `empid` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `fixed_deduction` */

insert  into `fixed_deduction`(`id`,`empid`,`description`,`amount`,`branch`) values 
(1,'04','SSS',112.5,'4'),
(2,'06','SSS',112.5,'4'),
(3,'05','SSS',112.5,'4'),
(4,'07','SSS',112.5,'4'),
(5,'01','SSS',112.5,'4'),
(6,'02','SSS',112.5,'4'),
(7,'03','SSS',112.5,'4');

/*Table structure for table `payroll_daily` */

DROP TABLE IF EXISTS `payroll_daily`;

CREATE TABLE `payroll_daily` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `payroll_period` varchar(100) DEFAULT NULL,
  `empid` varchar(100) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `no_of_days_required` int(11) DEFAULT NULL,
  `no_of_days_work` int(11) DEFAULT NULL,
  `adjustment` double DEFAULT NULL,
  `deduction` double DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `time_created` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `payroll_daily` */

insert  into `payroll_daily`(`id`,`payroll_period`,`empid`,`salary`,`no_of_days_required`,`no_of_days_work`,`adjustment`,`deduction`,`date_created`,`time_created`,`status`,`branch`) values 
(1,'1','04',500,3,2,250,250,'2025-04-23','09:13:13','posted','4'),
(2,'1','05',350,3,3,0,175,'2025-04-23','10:36:04','posted','4'),
(3,'1','02',400,3,3,0,200,'2025-04-23','10:36:04','posted','4'),
(4,'1','06',350,3,0,0,0,'2025-04-23','11:06:54','posted','4'),
(5,'2','04',500,5,5,0,0,'2025-04-23','11:54:54','posted','4'),
(6,'2','05',350,5,3,0,0,'2025-04-23','11:54:54','posted','4'),
(7,'2','02',400,5,3,0,0,'2025-04-23','11:54:54','posted','4'),
(8,'2','06',350,5,3,0,0,'2025-04-23','11:54:54','posted','4'),
(9,'1','07',500,3,0,0,0,'2025-04-30','10:05:01','posted','4'),
(10,'2','07',500,5,0,0,0,'2025-04-30','10:11:45','posted','4'),
(11,'3','04',500,5,4,500,0,'2025-04-30','11:23:33','posted','4'),
(12,'3','02',400,5,4,400,0,'2025-04-30','11:23:33','posted','4'),
(13,'3','06',350,5,0,0,0,'2025-04-30','11:23:33','posted','4'),
(14,'3','05',350,5,2,0,0,'2025-04-30','11:23:33','posted','4'),
(15,'3','07',500,5,0,0,0,'2025-04-30','11:23:33','posted','4'),
(16,'4','04',500,5,5,0,0,'2025-05-05','12:25:25','posted','4'),
(17,'4','02',400,5,5,0,0,'2025-05-05','12:25:25','posted','4'),
(18,'4','06',350,5,5,0,0,'2025-05-05','12:25:25','posted','4'),
(19,'4','05',350,5,5,0,0,'2025-05-05','12:25:25','posted','4'),
(20,'4','07',500,5,5,0,0,'2025-05-05','12:25:25','posted','4');

/*Table structure for table `payroll_per_head` */

DROP TABLE IF EXISTS `payroll_per_head`;

CREATE TABLE `payroll_per_head` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `payroll_period` varchar(100) DEFAULT NULL,
  `empid` varchar(100) DEFAULT NULL,
  `no_of_heads_pdc` int(11) DEFAULT NULL,
  `no_of_heads_tdc` int(11) DEFAULT NULL,
  `adjustment` double DEFAULT NULL,
  `deduction` double DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `time_created` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `payroll_per_head` */

insert  into `payroll_per_head`(`id`,`payroll_period`,`empid`,`no_of_heads_pdc`,`no_of_heads_tdc`,`adjustment`,`deduction`,`date_created`,`time_created`,`status`,`branch`) values 
(1,'1','01',54,64,500,0,'2025-04-23','09:17:04','posted','4'),
(2,'1','03',54,64,0,0,'2025-04-23','11:04:34','posted','4'),
(3,'2','01',100,133,0,0,'2025-04-23','11:54:54','posted','4'),
(4,'2','03',67,87,0,0,'2025-04-23','11:54:54','posted','4'),
(5,'3','01',89,119,1250,0,'2025-04-30','11:23:34','posted','4'),
(6,'3','03',89,119,0,500,'2025-04-30','11:23:34','posted','4'),
(7,'4','01',50,50,0,0,'2025-05-05','12:25:25','posted','4'),
(8,'4','03',50,50,0,0,'2025-05-05','12:25:25','posted','4');

/*Table structure for table `payroll_period` */

DROP TABLE IF EXISTS `payroll_period`;

CREATE TABLE `payroll_period` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `payroll_period` */

insert  into `payroll_period`(`id`,`startdate`,`enddate`,`branch`) values 
(1,'2025-04-14','2025-04-16','4'),
(2,'2025-04-21','2025-04-25','4'),
(3,'2025-04-28','2025-05-02','4'),
(4,'2025-05-05','2025-05-09','4');

/*Table structure for table `user_logs` */

DROP TABLE IF EXISTS `user_logs`;

CREATE TABLE `user_logs` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `transaction` text DEFAULT NULL,
  `loginuser` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user_logs` */

insert  into `user_logs`(`id`,`transaction`,`loginuser`,`datearray`,`timearray`) values 
(19,'Designation successfully saved!','Administrator','2025-04-23','09:05:37'),
(20,'Designation successfully saved!','Administrator','2025-04-23','09:05:57'),
(21,'Designation successfully saved!','Administrator','2025-04-23','09:06:12'),
(22,'Designation successfully saved!','Administrator','2025-04-23','09:06:29'),
(23,'Designation successfully saved!','Administrator','2025-04-23','09:06:48'),
(24,'Branch successfully saved!','Administrator','2025-04-23','09:07:08'),
(25,'Employee successfully saved!','Administrator','2025-04-23','09:08:18'),
(26,'Payroll Period successfully saved!','Administrator','2025-04-23','09:12:55'),
(27,'Employee successfully saved!','Administrator','2025-04-23','09:16:40'),
(28,'Deduction details successfully saved!','Administrator','2025-04-23','10:07:06'),
(29,'Deduction details successfully saved!','Administrator','2025-04-23','10:08:07'),
(30,'Deduction details successfully saved!','Administrator','2025-04-23','10:14:52'),
(31,'Deduction details successfully saved!','Administrator','2025-04-23','10:15:03'),
(32,'Deduction details successfully saved!','Administrator','2025-04-23','10:16:01'),
(33,'Deduction details successfully saved!','Administrator','2025-04-23','10:16:01'),
(34,'Employee successfully saved!','Administrator','2025-04-23','10:24:51'),
(35,'Employee successfully saved!','Administrator','2025-04-23','10:26:36'),
(36,'Employee successfully saved!','Administrator','2025-04-23','10:27:59'),
(37,'Employee successfully saved!','Administrator','2025-04-23','10:28:18'),
(38,'Employee (LADICA_PRINCESS) successfully deleted!','Administrator','2025-04-23','10:28:32'),
(39,'Employee successfully saved!','Administrator','2025-04-23','10:29:23'),
(40,'Employee successfully saved!','Administrator','2025-04-23','10:38:21'),
(41,'Employee (LAGUYO_WILLIE) successfully deleted!','Administrator','2025-04-23','10:38:40'),
(42,'Employee successfully saved!','Administrator','2025-04-23','11:03:52'),
(43,'Employee successfully saved!','Administrator','2025-04-23','11:05:32'),
(44,'Deduction details successfully saved!','Administrator','2025-04-23','11:18:42'),
(45,'Deduction details successfully saved!','Administrator','2025-04-23','11:19:03'),
(46,'Deduction details successfully saved!','Administrator','2025-04-23','11:20:39'),
(47,'Deduction details (ABSENT) successfully deleted!','Administrator','2025-04-23','11:21:04'),
(48,'Deduction details successfully saved!','Administrator','2025-04-23','11:28:00'),
(49,'Deduction details successfully saved!','Administrator','2025-04-23','11:29:44'),
(50,'Deduction details successfully saved!','Administrator','2025-04-23','11:30:05'),
(51,'Employee successfully saved!','Administrator','2025-04-23','11:48:15'),
(52,'Payroll Period successfully saved!','Administrator','2025-04-23','11:54:50'),
(53,'Expenses details successfully saved!','Administrator','2025-04-23','15:55:06'),
(54,'Expenses details successfully saved!','Administrator','2025-04-23','15:55:31'),
(55,'Expenses details successfully saved!','Administrator','2025-04-23','15:55:54'),
(56,'Expenses details successfully saved!','Administrator','2025-04-23','15:56:13'),
(57,'Expenses details successfully saved!','Administrator','2025-04-23','15:56:31'),
(58,'Deposit details successfully saved!','Administrator','2025-04-23','15:56:58'),
(59,'Advance details successfully saved!','Administrator','2025-04-23','16:02:38'),
(60,'Agent successfully saved!','Administrator','2025-04-24','10:08:55'),
(61,'Agent successfully saved!','Administrator','2025-04-24','10:09:40'),
(62,'Agent successfully saved!','Administrator','2025-04-24','10:09:55'),
(63,'Agent successfully saved!','Administrator','2025-04-24','10:10:04'),
(64,'Agent successfully saved!','Administrator','2025-04-24','10:10:16'),
(65,'Agent successfully saved!','Administrator','2025-04-24','10:10:25'),
(66,'Agent successfully saved!','Administrator','2025-04-24','10:10:36'),
(67,'Agent successfully saved!','Administrator','2025-04-24','10:10:45'),
(68,'Agent successfully saved!','Administrator','2025-04-24','10:10:53'),
(69,'Agent successfully saved!','Administrator','2025-04-24','10:11:01'),
(70,'Agent successfully saved!','Administrator','2025-04-24','10:11:12'),
(71,'Agent successfully saved!','Administrator','2025-04-24','10:11:23'),
(72,'Agent successfully saved!','Administrator','2025-04-24','10:11:42'),
(73,'Agent successfully saved!','Administrator','2025-04-24','10:12:13'),
(74,'Agent successfully saved!','Administrator','2025-04-24','10:12:23'),
(75,'Agent successfully saved!','Administrator','2025-04-24','10:12:32'),
(76,'Agent successfully saved!','Administrator','2025-04-24','10:12:43'),
(77,'Agent successfully saved!','Administrator','2025-04-24','10:12:52'),
(78,'Agent successfully saved!','Administrator','2025-04-24','10:13:02'),
(79,'Agent successfully saved!','Administrator','2025-04-24','10:13:13'),
(80,'Agent successfully saved!','Administrator','2025-04-24','10:14:00'),
(81,'Agent successfully saved!','Administrator','2025-04-24','10:14:42'),
(82,'Agent successfully saved!','Administrator','2025-04-24','10:14:59'),
(83,'Agent successfully saved!','Administrator','2025-04-24','10:15:12'),
(84,'Agent successfully saved!','Administrator','2025-04-24','10:15:28'),
(85,'Agent successfully saved!','Administrator','2025-04-24','10:15:40'),
(86,'Agent successfully saved!','Administrator','2025-04-24','10:15:54'),
(87,'Agent successfully saved!','Administrator','2025-04-24','10:16:06'),
(88,'Agent successfully saved!','Administrator','2025-04-24','10:16:31'),
(89,'Agent successfully saved!','Administrator','2025-04-24','10:16:43'),
(90,'Agent successfully saved!','Administrator','2025-04-24','10:21:34'),
(91,'Agent successfully saved!','Administrator','2025-04-24','10:21:43'),
(92,'Agent successfully saved!','Administrator','2025-04-24','10:21:52'),
(93,'Agent successfully saved!','Administrator','2025-04-24','10:22:01'),
(94,'Agent successfully saved!','Administrator','2025-04-24','10:22:11'),
(95,'Agent successfully saved!','Administrator','2025-04-24','10:22:22'),
(96,'Agent successfully saved!','Administrator','2025-04-24','10:22:31'),
(97,'Agent successfully saved!','Administrator','2025-04-24','10:22:41'),
(98,'Trainee successfully saved!','Administrator','2025-04-24','10:53:24'),
(99,'Trainee successfully saved!','Administrator','2025-04-24','10:53:49'),
(100,'Trainee successfully saved!','Administrator','2025-04-24','10:55:23'),
(101,'Trainee (UBAS_JAMES) successfully deleted!','Administrator','2025-04-24','10:56:28'),
(102,'Trainee successfully saved!','Administrator','2025-04-24','11:07:03'),
(103,'Trainee successfully saved!','Administrator','2025-04-24','11:07:12'),
(104,'Agent successfully saved!','Administrator','2025-04-24','11:14:09'),
(105,'Agent successfully saved!','Administrator','2025-04-24','11:14:26'),
(106,'Agent successfully saved!','Administrator','2025-04-24','11:14:35'),
(107,'Agent successfully saved!','Administrator','2025-04-24','11:14:44'),
(108,'Trainee successfully saved!','Administrator','2025-04-24','11:17:20'),
(109,'Trainee successfully saved!','Administrator','2025-04-24','11:18:07'),
(110,'Trainee successfully saved!','Administrator','2025-04-24','11:18:45'),
(111,'Trainee successfully saved!','Administrator','2025-04-24','11:19:38'),
(112,'Trainee successfully saved!','Administrator','2025-04-24','11:21:49'),
(113,'Trainee successfully saved!','Administrator','2025-04-24','11:22:38'),
(114,'Trainee successfully saved!','Administrator','2025-04-24','11:24:10'),
(115,'Trainee successfully saved!','Administrator','2025-04-24','11:24:43'),
(116,'Agent successfully saved!','Administrator','2025-04-24','11:25:45'),
(117,'Agent successfully saved!','Administrator','2025-04-24','11:25:57'),
(118,'Trainee successfully saved!','Administrator','2025-04-24','11:26:57'),
(119,'Trainee successfully saved!','Administrator','2025-04-24','11:27:37'),
(120,'Trainee successfully saved!','Administrator','2025-04-24','11:28:22'),
(121,'Deduction details successfully saved!','Administrator','2025-04-29','13:28:43'),
(122,'Deduction details successfully saved!','Administrator','2025-04-29','13:28:55'),
(123,'Employee successfully saved!','Administrator','2025-04-29','13:31:07'),
(124,'Employee (BOGADOR_NIEL%20JONAS) successfully deleted!','Administrator','2025-04-29','13:33:22'),
(125,'Employee successfully saved!','Administrator','2025-04-29','13:36:26'),
(126,'Employee successfully saved!','Administrator','2025-04-30','09:07:13'),
(127,'Employee successfully saved!','Administrator','2025-04-30','09:45:00'),
(128,'Employee successfully saved!','Administrator','2025-04-30','09:45:09'),
(129,'Employee successfully saved!','Administrator','2025-04-30','09:49:48'),
(130,'Employee successfully saved!','Administrator','2025-04-30','09:53:39'),
(131,'Employee successfully saved!','Administrator','2025-04-30','09:54:41'),
(132,'Employee successfully saved!','Administrator','2025-04-30','09:57:28'),
(133,'Employee successfully saved!','Administrator','2025-04-30','09:57:39'),
(134,'Employee successfully saved!','Administrator','2025-04-30','09:59:23'),
(135,'Employee successfully saved!','Administrator','2025-04-30','10:01:35'),
(136,'Payroll Period successfully saved!','Administrator','2025-04-30','11:23:30'),
(137,'Adjustment details successfully saved!','Administrator','2025-04-30','12:00:11'),
(138,'Deduction details successfully saved!','Administrator','2025-05-02','14:27:57'),
(139,'Deduction details successfully saved!','Administrator','2025-05-02','14:28:24'),
(140,'Deduction details successfully saved!','Administrator','2025-05-02','14:28:40'),
(141,'Deduction details successfully saved!','Administrator','2025-05-02','14:28:53'),
(142,'Deduction details successfully saved!','Administrator','2025-05-02','14:29:12'),
(143,'Deduction details successfully saved!','Administrator','2025-05-02','14:29:24'),
(144,'Deduction details successfully saved!','Administrator','2025-05-02','14:29:41'),
(145,'Adjustment details successfully saved!','Administrator','2025-05-02','14:42:15'),
(146,'Adjustment details successfully saved!','Administrator','2025-05-02','14:42:44'),
(147,'Adjustment details successfully saved!','Administrator','2025-05-02','14:43:00'),
(148,'Employee successfully saved!','Administrator','2025-05-02','14:55:21'),
(149,'Adjustment details successfully saved!','Administrator','2025-05-02','14:56:02'),
(150,'Deduction details successfully saved!','Administrator','2025-05-02','14:59:39'),
(151,'Payroll Period successfully saved!','Administrator','2025-05-05','12:25:22'),
(152,'Advance details successfully saved!','Administrator','2025-05-05','14:24:46'),
(153,'Advance details successfully saved!','Administrator','2025-05-05','14:25:07'),
(154,'Computation successfully saved!','Administrator','2025-05-09','22:58:15');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `is_admin` int(1) DEFAULT NULL,
  `branch` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`fullname`,`is_admin`,`branch`) values 
(2,'admin','1234','Administrator',1,'4');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
