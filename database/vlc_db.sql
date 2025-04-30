/*
SQLyog Ultimate
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `designation` */

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `fixed_deduction` */

DROP TABLE IF EXISTS `fixed_deduction`;

CREATE TABLE `fixed_deduction` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `empid` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `payroll_period` */

DROP TABLE IF EXISTS `payroll_period`;

CREATE TABLE `payroll_period` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `user_logs` */

DROP TABLE IF EXISTS `user_logs`;

CREATE TABLE `user_logs` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `transaction` text DEFAULT NULL,
  `loginuser` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
