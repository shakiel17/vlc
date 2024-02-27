/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - vlc_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vlc_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vlc_db`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `payroll_period` */

DROP TABLE IF EXISTS `payroll_period`;

CREATE TABLE `payroll_period` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
