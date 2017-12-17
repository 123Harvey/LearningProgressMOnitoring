/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.26-MariaDB : Database - dti_procurement
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dti_procurement` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dti_procurement`;

/*Table structure for table `accounting` */

DROP TABLE IF EXISTS `accounting`;

CREATE TABLE `accounting` (
  `accounting_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `accounting_date` date DEFAULT NULL,
  `cashier_id` int(11) NOT NULL,
  PRIMARY KEY (`accounting_id`),
  UNIQUE KEY `accounting_id` (`accounting_id`),
  KEY `idx_accounting` (`cashier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `accounting` */

insert  into `accounting`(`accounting_id`,`accounting_date`,`cashier_id`) values (1,'2017-01-02',1),(2,'2017-01-01',2),(3,'2017-02-02',3),(4,'2017-03-03',4),(5,'2018-03-04',5),(6,'2017-02-01',6);

/*Table structure for table `accounting_logs` */

DROP TABLE IF EXISTS `accounting_logs`;

CREATE TABLE `accounting_logs` (
  `accounting_id` int(11) NOT NULL AUTO_INCREMENT,
  `accounting_date` date DEFAULT NULL,
  `cashier_id` int(11) DEFAULT NULL,
  `changedon` datetime DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  KEY `accounting_id` (`accounting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `accounting_logs` */

insert  into `accounting_logs`(`accounting_id`,`accounting_date`,`cashier_id`,`changedon`,`action`) values (1,'2017-01-02',1,'2017-12-13 14:10:05','Insert'),(1,'2017-01-02',1,'2017-12-13 14:10:22','Update'),(2,'2017-01-01',2,'2017-12-13 14:25:08','Insert'),(3,'2017-02-02',3,'2017-12-13 14:25:57','Insert'),(4,'2017-03-03',4,'2017-12-13 14:26:39','Insert'),(5,'2018-03-04',5,'2017-12-13 14:27:26','Insert'),(6,'2017-02-01',6,'2017-12-13 14:28:37','Insert'),(1,'2017-01-02',1,'2017-12-13 14:34:15','Update'),(1,'2017-01-02',1,'2017-12-13 14:34:53','Update'),(2,'2017-01-01',2,'2017-12-13 14:35:34','Update'),(2,'2017-01-01',2,'2017-12-13 14:40:05','Update'),(3,'2017-02-02',3,'2017-12-13 14:40:15','Update'),(4,'2017-03-03',4,'2017-12-13 14:40:22','Update'),(6,'2017-02-01',6,'2017-12-13 14:40:32','Update'),(5,'2018-03-04',5,'2017-12-13 14:40:57','Update');

/*Table structure for table `cashier` */

DROP TABLE IF EXISTS `cashier`;

CREATE TABLE `cashier` (
  `cashier_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cashier_date` date DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`cashier_id`),
  UNIQUE KEY `cashier_id` (`cashier_id`),
  KEY `idx_cashier` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cashier` */

insert  into `cashier`(`cashier_id`,`cashier_date`,`supplier_id`) values (1,'2017-01-01',1),(2,'2017-01-01',4),(3,'2017-01-02',5),(4,'2017-03-03',6),(5,'2018-02-02',7),(6,'2017-02-04',8);

/*Table structure for table `cashier_logs` */

DROP TABLE IF EXISTS `cashier_logs`;

CREATE TABLE `cashier_logs` (
  `cashier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `cashier_date` date DEFAULT NULL,
  `changedon` datetime DEFAULT NULL,
  KEY `cashier_id` (`cashier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cashier_logs` */

insert  into `cashier_logs`(`cashier_id`,`supplier_id`,`action`,`cashier_date`,`changedon`) values (1,1,'Insert','2017-01-01','2017-12-13 14:10:05'),(1,1,'Update','2017-01-01','2017-12-13 14:10:22'),(2,4,'Insert','2017-01-01','2017-12-13 14:25:08'),(3,5,'Insert','2017-01-02','2017-12-13 14:25:56'),(4,6,'Insert','2017-03-03','2017-12-13 14:26:39'),(5,7,'Insert','2018-02-02','2017-12-13 14:27:25'),(6,8,'Insert','2017-02-04','2017-12-13 14:28:37'),(1,1,'Update','2017-01-01','2017-12-13 14:34:15'),(1,1,'Update','2017-01-01','2017-12-13 14:34:52'),(2,4,'Update','2017-01-01','2017-12-13 14:35:34'),(2,4,'Update','2017-01-01','2017-12-13 14:40:05'),(3,5,'Update','2017-01-02','2017-12-13 14:40:15'),(4,6,'Update','2017-03-03','2017-12-13 14:40:22'),(6,8,'Update','2017-02-04','2017-12-13 14:40:32'),(5,7,'Update','2018-02-02','2017-12-13 14:40:57');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `category_date` date NOT NULL,
  `pr_id` int(11) NOT NULL,
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_name`,`category_date`,`pr_id`) values (1,'','0000-00-00',0),(2,'','0000-00-00',0),(3,'foods','2017-12-13',1),(4,'','0000-00-00',0),(5,'foods','2017-12-13',4),(6,'hardware','2017-12-13',5),(7,'hardware','2017-12-13',6),(8,'rental','2017-12-13',8),(9,'foods','2017-12-13',7);

/*Table structure for table `cost` */

DROP TABLE IF EXISTS `cost`;

CREATE TABLE `cost` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(10) DEFAULT NULL,
  `total_actual_cost` int(11) DEFAULT NULL,
  `total_approved_budget_cost` int(11) DEFAULT NULL,
  `accounting_id` int(11) NOT NULL,
  PRIMARY KEY (`po_id`),
  KEY `idx_cost` (`po_id`),
  KEY `idx_cost_0` (`accounting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cost` */

insert  into `cost`(`po_id`,`po_number`,`total_actual_cost`,`total_approved_budget_cost`,`accounting_id`) values (1,'1',1,1,1),(2,'1',1,2,2),(3,'1',2,2,3),(4,'2',2,2,4),(5,'4',4,4,5),(6,'2',3,3,6);

/*Table structure for table `cost_logs` */

DROP TABLE IF EXISTS `cost_logs`;

CREATE TABLE `cost_logs` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(20) DEFAULT NULL,
  `po_number` varchar(10) DEFAULT NULL,
  `total_actual_cost` int(11) DEFAULT NULL,
  `total_approved_budget_cost` int(11) DEFAULT NULL,
  `changedon` datetime DEFAULT NULL,
  `accounting_id` int(11) DEFAULT NULL,
  KEY `po_id` (`po_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cost_logs` */

insert  into `cost_logs`(`po_id`,`action`,`po_number`,`total_actual_cost`,`total_approved_budget_cost`,`changedon`,`accounting_id`) values (0,'Insert','1',1,1,'2017-12-13 14:10:05',1),(1,'Update','1',1,1,'2017-12-13 14:10:22',1),(0,'Insert','1',1,2,'2017-12-13 14:25:08',2),(0,'Insert','1',2,2,'2017-12-13 14:25:57',3),(0,'Insert','2',2,2,'2017-12-13 14:26:39',4),(0,'Insert','4',4,4,'2017-12-13 14:27:26',5),(0,'Insert','2',3,3,'2017-12-13 14:28:37',6),(1,'Update','1',1,1,'2017-12-13 14:34:16',1),(1,'Update','1',1,1,'2017-12-13 14:34:53',1),(2,'Update','1',1,2,'2017-12-13 14:35:35',2),(2,'Update','1',1,2,'2017-12-13 14:40:06',2),(3,'Update','1',2,2,'2017-12-13 14:40:15',3),(4,'Update','2',2,2,'2017-12-13 14:40:22',4),(6,'Update','2',3,3,'2017-12-13 14:40:32',6),(5,'Update','4',4,4,'2017-12-13 14:40:57',5);

/*Table structure for table `delivery` */

DROP TABLE IF EXISTS `delivery`;

CREATE TABLE `delivery` (
  `pr_id` int(11) NOT NULL,
  `notice_to_proceed` text,
  `delivery_completion` text,
  `acceptance_turn_over` text NOT NULL,
  `ci_no` text,
  `number_of_days_po_to_delivery` int(11) DEFAULT NULL,
  `number_of_days_delivery_to_cashier` int(11) DEFAULT NULL,
  KEY `idx_delivery` (`pr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `delivery` */

insert  into `delivery`(`pr_id`,`notice_to_proceed`,`delivery_completion`,`acceptance_turn_over`,`ci_no`,`number_of_days_po_to_delivery`,`number_of_days_delivery_to_cashier`) values (1,'2017-01-01','2017-01-01','1','1',1,1),(4,'2017-01-01','2017-01-01','1','1',1,1),(5,'2017-02-02','2017-01-01','1','2',2,2),(6,'2017-03-03','2017-02-03','3','3',3,3),(7,'2017-02-02','2017-01-01','2','2',3,3),(8,'2017-02-02','2017-02-02','1','1',1,1);

/*Table structure for table `delivery_logs` */

DROP TABLE IF EXISTS `delivery_logs`;

CREATE TABLE `delivery_logs` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(20) DEFAULT NULL,
  `notice_to_proceed` varchar(10) DEFAULT NULL,
  `delivery_completion` varchar(10) DEFAULT NULL,
  `acceptance_turn_over` varchar(10) DEFAULT NULL,
  `ci_no` text,
  `number_of_days_po_to_delivery` int(11) DEFAULT NULL,
  `number_of_days_delivery_to_cashier` int(11) DEFAULT NULL,
  `changedon` datetime DEFAULT NULL,
  KEY `pr_id` (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `delivery_logs` */

insert  into `delivery_logs`(`pr_id`,`action`,`notice_to_proceed`,`delivery_completion`,`acceptance_turn_over`,`ci_no`,`number_of_days_po_to_delivery`,`number_of_days_delivery_to_cashier`,`changedon`) values (1,'Insert','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:10:05'),(1,'Update','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:10:22'),(4,'Insert','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:25:08'),(5,'Insert','2017-02-02','2017-01-01','1','2',2,2,'2017-12-13 14:25:56'),(6,'Insert','2017-03-03','2017-02-03','3','3',3,3,'2017-12-13 14:26:39'),(7,'Insert','2017-02-02','2017-01-01','2','2',3,3,'2017-12-13 14:27:25'),(8,'Insert','2017-02-02','2017-02-02','1','1',1,1,'2017-12-13 14:28:36'),(1,'Update','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:34:15'),(1,'Update','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:34:53'),(4,'Update','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:35:34'),(4,'Update','2017-01-01','2017-01-01','1','1',1,1,'2017-12-13 14:40:05'),(5,'Update','2017-02-02','2017-01-01','1','2',2,2,'2017-12-13 14:40:15'),(6,'Update','2017-03-03','2017-02-03','3','3',3,3,'2017-12-13 14:40:22'),(8,'Update','2017-02-02','2017-02-02','1','1',1,1,'2017-12-13 14:40:32'),(7,'Update','2017-02-02','2017-01-01','2','2',3,3,'2017-12-13 14:40:57');

/*Table structure for table `item_logs` */

DROP TABLE IF EXISTS `item_logs`;

CREATE TABLE `item_logs` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_date` date DEFAULT NULL,
  `pr_number` int(11) DEFAULT NULL,
  `particulars_details` text,
  `total_approved_budget_cost` int(11) DEFAULT NULL,
  `division` text,
  `po_number` int(11) DEFAULT NULL,
  `supplier_name` text,
  `total_actual_cost` int(11) DEFAULT NULL,
  `delivery_completion` date DEFAULT NULL,
  `acceptance_turn_over` date DEFAULT NULL,
  `ci_number` int(11) DEFAULT NULL,
  `accounting_date` date DEFAULT NULL,
  `cashier_date` date DEFAULT NULL,
  `number_of_days_po_to_delivery` date DEFAULT NULL,
  `remarks_details` text,
  `pr_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item_logs` */

/*Table structure for table `particular_logs` */

DROP TABLE IF EXISTS `particular_logs`;

CREATE TABLE `particular_logs` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(20) DEFAULT NULL,
  `pr_number` varchar(10) DEFAULT NULL,
  `pr_date` date DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `date_required` date DEFAULT NULL,
  `particulars_details` text,
  `changedon` datetime DEFAULT NULL,
  KEY `pr_id` (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `particular_logs` */

insert  into `particular_logs`(`pr_id`,`action`,`pr_number`,`pr_date`,`request_date`,`date_required`,`particulars_details`,`changedon`) values (1,'Insert','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:10:04'),(1,'Update','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:10:22'),(2,'Insert','1','2017-12-12','2017-12-12','2017-12-12','sample','2017-12-13 14:23:28'),(3,'Insert','2','2017-02-02','2017-01-01','2017-01-12','food','2017-12-13 14:24:45'),(4,'Insert','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:25:08'),(5,'Insert','2','2017-02-02','2017-01-02','2017-02-02','2','2017-12-13 14:25:56'),(6,'Insert','3','2017-03-03','2017-03-03','2017-02-03','3','2017-12-13 14:26:38'),(7,'Insert','4','2017-04-04','2017-02-04','2017-02-02','2','2017-12-13 14:27:25'),(8,'Insert','6','2017-06-06','2017-02-03','2017-02-03','3','2017-12-13 14:28:36'),(1,'Update','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:34:15'),(1,'Update','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:34:52'),(4,'Update','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:35:34'),(4,'Update','1','2017-01-01','2017-01-01','2017-01-01','1','2017-12-13 14:40:05'),(5,'Update','2','2017-02-02','2017-01-02','2017-02-02','2','2017-12-13 14:40:14'),(6,'Update','3','2017-03-03','2017-03-03','2017-02-03','3','2017-12-13 14:40:22'),(8,'Update','6','2017-06-06','2017-02-03','2017-02-03','3','2017-12-13 14:40:31'),(7,'Update','4','2017-04-04','2017-02-04','2017-02-02','2','2017-12-13 14:40:57');

/*Table structure for table `particulars` */

DROP TABLE IF EXISTS `particulars`;

CREATE TABLE `particulars` (
  `pr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pr_number` varchar(10) DEFAULT NULL,
  `pr_date` date DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `date_required` date DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `particulars_details` text,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `particulars` */

insert  into `particulars`(`pr_id`,`pr_number`,`pr_date`,`request_date`,`date_required`,`supplier_id`,`particulars_details`) values (1,'1','2017-01-01','2017-01-01','2017-01-01',1,'1'),(2,'1','2017-12-12','2017-12-12','2017-12-12',2,'sample'),(3,'2','2017-02-02','2017-01-01','2017-01-12',3,'food'),(4,'1','2017-01-01','2017-01-01','2017-01-01',4,'1'),(5,'2','2017-02-02','2017-01-02','2017-02-02',5,'2'),(6,'3','2017-03-03','2017-03-03','2017-02-03',6,'3'),(7,'4','2017-04-04','2017-02-04','2017-02-02',7,'2'),(8,'6','2017-06-06','2017-02-03','2017-02-03',8,'3');

/*Table structure for table `quantity` */

DROP TABLE IF EXISTS `quantity`;

CREATE TABLE `quantity` (
  `quantity_id` int(11) NOT NULL AUTO_INCREMENT,
  `pieces` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  KEY `quantity_id` (`quantity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `quantity` */

insert  into `quantity`(`quantity_id`,`pieces`,`pr_id`) values (1,0,0),(2,0,0),(3,0,0),(4,0,0),(5,0,0),(6,0,0),(7,1,1);

/*Table structure for table `remarks` */

DROP TABLE IF EXISTS `remarks`;

CREATE TABLE `remarks` (
  `remarks_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks_details` text,
  `pr_id` int(11) NOT NULL,
  PRIMARY KEY (`remarks_id`),
  KEY `idx_remarks` (`remarks_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `remarks` */

insert  into `remarks`(`remarks_id`,`remarks_details`,`pr_id`) values (1,'PAYABLE',1),(2,'PAYABLE',4),(3,'PAYABLE',5),(4,'PAYABLE',6),(5,'PAYABLE',7),(6,'PAYABLE',8);

/*Table structure for table `remarks_logs` */

DROP TABLE IF EXISTS `remarks_logs`;

CREATE TABLE `remarks_logs` (
  `remarks_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(20) DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `remarks_details` text,
  `changedon` datetime DEFAULT NULL,
  KEY `remarks_id` (`remarks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `remarks_logs` */

insert  into `remarks_logs`(`remarks_id`,`action`,`pr_id`,`remarks_details`,`changedon`) values (1,'Insert',1,'PAYABLE','2017-12-13 14:10:05'),(2,'Update',1,'PAYABLE','2017-12-13 14:10:22'),(3,'Insert',4,'PAYABLE','2017-12-13 14:25:08'),(4,'Insert',5,'PAYABLE','2017-12-13 14:25:57'),(5,'Insert',6,'PAYABLE','2017-12-13 14:26:39'),(6,'Insert',7,'PAYABLE','2017-12-13 14:27:26'),(7,'Insert',8,'PAYABLE','2017-12-13 14:28:37'),(8,'Update',1,'PAYABLE','2017-12-13 14:34:15'),(9,'Update',1,'PAYABLE','2017-12-13 14:34:53'),(10,'Update',4,'PAYABLE','2017-12-13 14:35:34'),(11,'Update',4,'PAYABLE','2017-12-13 14:40:05'),(12,'Update',5,'PAYABLE','2017-12-13 14:40:15'),(13,'Update',6,'PAYABLE','2017-12-13 14:40:22'),(14,'Update',8,'PAYABLE','2017-12-13 14:40:32'),(15,'Update',7,'PAYABLE','2017-12-13 14:40:57');

/*Table structure for table `req_div` */

DROP TABLE IF EXISTS `req_div`;

CREATE TABLE `req_div` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `division` text,
  KEY `pr_id` (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `req_div` */

insert  into `req_div`(`pr_id`,`division`) values (1,'1'),(4,'1'),(5,'2'),(6,'3'),(7,'2'),(8,'3');

/*Table structure for table `req_div_logs` */

DROP TABLE IF EXISTS `req_div_logs`;

CREATE TABLE `req_div_logs` (
  `action` text NOT NULL,
  `div_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_id` int(11) NOT NULL,
  `division` text,
  KEY `div_id` (`div_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `req_div_logs` */

/*Table structure for table `req_logs` */

DROP TABLE IF EXISTS `req_logs`;

CREATE TABLE `req_logs` (
  `action` text NOT NULL,
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `division` text,
  `changedat` datetime NOT NULL,
  KEY `pr_id` (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `req_logs` */

insert  into `req_logs`(`action`,`pr_id`,`division`,`changedat`) values ('Insert',1,'1','2017-12-13 14:10:04'),('Update',1,'1','2017-12-13 14:10:23'),('Insert',4,'1','2017-12-13 14:25:08'),('Insert',5,'2','2017-12-13 14:25:56'),('Insert',6,'3','2017-12-13 14:26:39'),('Insert',7,'2','2017-12-13 14:27:25'),('Insert',8,'3','2017-12-13 14:28:36'),('Update',1,'1','2017-12-13 14:34:16'),('Update',1,'1','2017-12-13 14:34:53'),('Update',4,'1','2017-12-13 14:35:35'),('Update',4,'1','2017-12-13 14:40:06'),('Update',5,'2','2017-12-13 14:40:15'),('Update',6,'3','2017-12-13 14:40:22'),('Update',8,'3','2017-12-13 14:40:32'),('Update',7,'2','2017-12-13 14:40:57');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` text,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`supplier_id`,`supplier_name`,`user_id`) values (1,'1',2),(2,'jun2',3),(3,'1',3),(4,'1',3),(5,'2',3),(6,'2',3),(7,'2',3),(8,'2',3);

/*Table structure for table `supplier_logs` */

DROP TABLE IF EXISTS `supplier_logs`;

CREATE TABLE `supplier_logs` (
  `action` varchar(20) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `supplier_name` text,
  `changedon` date DEFAULT NULL,
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `supplier_logs` */

insert  into `supplier_logs`(`action`,`supplier_id`,`user_id`,`supplier_name`,`changedon`) values ('Insert',1,2,'1','2017-12-13'),('Update',1,2,'1','2017-12-13'),('Insert',2,3,'jun2','2017-12-13'),('Insert',3,3,'1','2017-12-13'),('Insert',4,3,'1','2017-12-13'),('Insert',5,3,'2','2017-12-13'),('Insert',6,3,'2','2017-12-13'),('Insert',7,3,'2','2017-12-13'),('Insert',8,3,'2','2017-12-13'),('Update',1,2,'1','2017-12-13'),('Update',1,2,'1','2017-12-13'),('Update',4,3,'1','2017-12-13'),('Update',4,3,'1','2017-12-13'),('Update',5,3,'2','2017-12-13'),('Update',6,3,'2','2017-12-13'),('Update',8,3,'2','2017-12-13'),('Update',7,3,'2','2017-12-13');

/*Table structure for table `tbl_uploads` */

DROP TABLE IF EXISTS `tbl_uploads`;

CREATE TABLE `tbl_uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_uploads` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `register_at` datetime NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`first_name`,`last_name`,`register_at`,`email`) values (1,'d','‚wà‘\ru•´Hyvà‘­','d','d','2017-12-13 14:09:19','d'),(2,'d','‚wà‘\ru•´Hyvà‘­','d','d','2017-12-13 14:09:39','d'),(3,'accion','¥þÂk¡¥—Š/“ðRÆÀõe','dan','dan','2017-12-13 14:13:57','accion@gmail.com');

/* Trigger structure for table `accounting` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_accounting` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_accounting` BEFORE INSERT ON `accounting` FOR EACH ROW begin
insert into accounting_logs
set action = 'Insert',
accounting_id = new.accounting_id,
accounting_date = new.accounting_date,
cashier_id = new.cashier_id,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `accounting` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_accounting` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_accounting` BEFORE UPDATE ON `accounting` FOR EACH ROW begin
insert into accounting_logs
set action = 'Update',
accounting_id = old.accounting_id,
accounting_date = old.accounting_date,
cashier_id = old.cashier_id,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `accounting` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_accounting` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_accounting` BEFORE DELETE ON `accounting` FOR EACH ROW BEGIN
INSERT INTO accounting_logs
SET ACTION = 'Delete',
accounting_id = old.accounting_id,
accounting_date = old.accounting_date,
cashier_id = old.cashier_id,
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `cashier` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_cashier` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_cashier` BEFORE INSERT ON `cashier` FOR EACH ROW BEGIN
INSERT INTO cashier_logs
SET ACTION = 'Insert',
cashier_id = new.cashier_id,
cashier_date = new.cashier_date,
supplier_id = new.supplier_id, 
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `cashier` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_cashier` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_cashier` BEFORE UPDATE ON `cashier` FOR EACH ROW begin
insert into cashier_logs
set action = 'Update',
cashier_id = old.cashier_id,
supplier_id = old.supplier_id,
cashier_date = old.cashier_date,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `cashier` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_cashier` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_cashier` BEFORE DELETE ON `cashier` FOR EACH ROW begin
insert into cashier_logs
set action = 'Delete',
cashier_id = old.cashier_id,
supplier_id = old.supplier_id,
cashier_date = old.cashier_date,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `cost` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_cost` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_cost` BEFORE INSERT ON `cost` FOR EACH ROW begin
insert into cost_logs
set action = 'Insert',
po_id = new.po_id,
po_number = new.po_number,
total_actual_cost = new.total_actual_cost,
total_approved_budget_cost = new.total_approved_budget_cost,
accounting_id = new.accounting_id,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `cost` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_cost` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_cost` BEFORE UPDATE ON `cost` FOR EACH ROW begin
insert into cost_logs
set action = 'Update',
po_id = old.po_id,
po_number = old.po_number,
total_actual_cost = old.total_actual_cost,
total_approved_budget_cost = old.total_approved_budget_cost,
accounting_id = old.accounting_id,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `cost` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_cost` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_cost` BEFORE DELETE ON `cost` FOR EACH ROW begin
insert into cost_logs
set action = 'Delete',
po_id = old.po_id,
po_number = old.po_number,
total_actual_cost = old.total_actual_cost,
total_approved_budget_cost = old.total_approved_budget_cost,
accounting_id = old.accounting_id,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `delivery` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_delivery` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_delivery` BEFORE INSERT ON `delivery` FOR EACH ROW begin
insert into delivery_logs
set action = 'Insert',
pr_id = new.pr_id,
notice_to_proceed = new.notice_to_proceed,
delivery_completion = new.delivery_completion,
acceptance_turn_over = new.acceptance_turn_over,
ci_no = new.ci_no,
number_of_days_po_to_delivery = new.number_of_days_po_to_delivery,
number_of_days_delivery_to_cashier = new.number_of_days_delivery_to_cashier, 
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `delivery` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_delivery` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_delivery` BEFORE UPDATE ON `delivery` FOR EACH ROW begin
insert into delivery_logs
set action = 'Update',
pr_id = old.pr_id,
notice_to_proceed = old.notice_to_proceed,
delivery_completion = old.delivery_completion,
acceptance_turn_over = old.acceptance_turn_over,
ci_no = old.ci_no,
number_of_days_po_to_delivery = old.number_of_days_po_to_delivery,
number_of_days_delivery_to_cashier = old.number_of_days_delivery_to_cashier, 
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `delivery` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_delivery` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_delivery` BEFORE DELETE ON `delivery` FOR EACH ROW begin
insert into delivery_logs
set action = 'Delete',
pr_id = old.pr_id,
notice_to_proceed = old.notice_to_proceed,
delivery_completion = old.delivery_completion,
acceptance_turn_over = old.acceptance_turn_over,
ci_no = old.ci_no,
number_of_days_po_to_delivery = old.number_of_days_po_to_delivery,
number_of_days_delivery_to_cashier = old.number_of_days_delivery_to_cashier, 
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `particulars` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_particulars` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_particulars` BEFORE INSERT ON `particulars` FOR EACH ROW BEGIN
INSERT INTO particular_logs
SET ACTION = 'Insert',
pr_id = new.pr_id,
pr_number = new.pr_number,
pr_date = new.pr_date,
request_date = new.request_date,
date_required = new.date_required,
particulars_details = new.particulars_details,
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `particulars` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_particulars` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_particulars` BEFORE UPDATE ON `particulars` FOR EACH ROW BEGIN
INSERT INTO particular_logs
SET ACTION = 'Update',
pr_id = old.pr_id,
pr_number = old.pr_number,
pr_date = old.pr_date,
request_date = old.request_date,
date_required = old.date_required,
particulars_details = old.particulars_details,
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `particulars` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_particulars` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_particulars` BEFORE DELETE ON `particulars` FOR EACH ROW BEGIN
INSERT INTO particular_logs
SET ACTION = 'Delete',
pr_id = old.pr_id,
pr_number = old.pr_number,
pr_date = old.pr_date,
request_date = old.request_date,
date_required = old.date_required,
particulars_details = old.particulars_details,
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `remarks` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_remarks` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_remarks` BEFORE INSERT ON `remarks` FOR EACH ROW begin
insert into remarks_logs
set action = 'Insert',
pr_id = new.pr_id,
remarks_details = new.remarks_details,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `remarks` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_remarks` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_remarks` BEFORE UPDATE ON `remarks` FOR EACH ROW begin
insert into remarks_logs
set action = 'Update',
pr_id = old.pr_id,
remarks_details = old.remarks_details,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `remarks` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_remarks` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_remarks` BEFORE DELETE ON `remarks` FOR EACH ROW begin
insert into remarks_logs
set action = 'Delete',
pr_id = old.pr_id,
remarks_details = old.remarks_details,
changedon = now();
End */$$


DELIMITER ;

/* Trigger structure for table `req_div` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Insert_req` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Insert_req` BEFORE INSERT ON `req_div` FOR EACH ROW BEGIN
INSERT INTO req_logs
SET ACTION = 'Insert',
pr_id = new.pr_id,
division = new.division,
changedat = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `req_div` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_req` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_req` BEFORE UPDATE ON `req_div` FOR EACH ROW BEGIN
INSERT INTO req_logs
SET ACTION = 'Update',
pr_id = old.pr_id,
division = old.division,
changedat = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `req_div` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_req` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_req` BEFORE DELETE ON `req_div` FOR EACH ROW BEGIN
INSERT INTO req_logs
SET ACTION = 'Delete',
pr_id = old.pr_id,
division = old.division,
changedat = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `supplier` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_supplier` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_supplier` BEFORE INSERT ON `supplier` FOR EACH ROW BEGIN
INSERT INTO supplier_logs
SET ACTION = 'Insert',
supplier_id = new.supplier_id,
supplier_name = new.supplier_name,
user_id = new.user_id,
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `supplier` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Update_supplier` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Update_supplier` BEFORE UPDATE ON `supplier` FOR EACH ROW BEGIN
INSERT INTO supplier_logs
SET ACTION = 'Update',
supplier_id = old.supplier_id,
supplier_name = old.supplier_name,
user_id = old.user_id,
changedon = NOW();
END */$$


DELIMITER ;

/* Trigger structure for table `supplier` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_Delete_supplier` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_Delete_supplier` BEFORE DELETE ON `supplier` FOR EACH ROW BEGIN
INSERT INTO supplier_logs
SET ACTION = 'Delete',
supplier_id = old.supplier_id,
supplier_name = old.supplier_name,
user_id = old.user_id,
changedon = NOW();
END */$$


DELIMITER ;

/* Procedure structure for procedure `insertIntoAccounting` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoAccounting` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoAccounting`(accounting_date Date,cashier_id int)
begin
insert into accounting(accounting_date,cashier_id)
values(accounting_date,cashier_id);
end */$$
DELIMITER ;

/* Procedure structure for procedure `insertIntoCashier` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoCashier` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoCashier`(cashier_date date,supplier_id int)
begin
insert into Cashier(cashier_date,supplier_id)
values(cashier_date,supplier_id);
end */$$
DELIMITER ;

/* Procedure structure for procedure `insertIntoCost` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoCost` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoCost`(po_number varchar(10),total_actual_cost int,total_approved_budget_cost int,accounting_id int)
begin
insert into cost(po_number,total_actual_cost,total_approved_budget_cost,accounting_id)
values(po_number,total_actual_cost,total_approved_budget_cost,accounting_id);
end */$$
DELIMITER ;

/* Procedure structure for procedure `insertintoDelivery` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertintoDelivery` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertintoDelivery`(pr_id int,notice_to_proceed TEXT,delivery_completion TEXT,
acceptance_turn_over TEXT,ci_no text,number_of_days_po_to_delivery int,number_of_days_delivery_to_cashier INT)
begin
insert into delivery(pr_id,notice_to_proceed ,delivery_completion ,
acceptance_turn_over ,ci_no ,number_of_days_po_to_delivery ,number_of_days_delivery_to_cashier )
values(pr_id,notice_to_proceed ,delivery_completion ,
acceptance_turn_over ,ci_no ,number_of_days_po_to_delivery ,number_of_days_delivery_to_cashier );
end */$$
DELIMITER ;

/* Procedure structure for procedure `insertIntoParticulars` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoParticulars` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoParticulars`(pr_number int,pr_date date,request_date date,date_required date,supplier_id int,particulars_details text)
BEGIN
	INSERT INTO particulars(pr_number,pr_date,request_date,date_required,supplier_id,particulars_details)
	VALUES(pr_number,pr_date,request_date,date_required,supplier_id,particulars_details);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insertIntoRemarks` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoRemarks` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoRemarks`(remarks_details text,pr_id INT)
BEGIN
	INSERT INTO remarks(remarks_details,pr_id)
VALUES(remarks_details,pr_id);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insertIntoReqdiv` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoReqdiv` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoReqdiv`(pr_id int,division text)
BEGIN
INSERT INTO req_div(pr_id,division)
VALUES(pr_id,division);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insertIntoSupplier` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertIntoSupplier` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoSupplier`(
supplier_name text,user_id int)
begin
insert into supplier(supplier_name,user_id)
values(supplier_name,user_id);
end */$$
DELIMITER ;

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

/*!50001 DROP VIEW IF EXISTS `history` */;
/*!50001 DROP TABLE IF EXISTS `history` */;

/*!50001 CREATE TABLE  `history`(
 `pr_date` date ,
 `pr_number` varchar(10) ,
 `particulars_details` text ,
 `total_approved_budget_cost` int(11) ,
 `division` text ,
 `po_number` varchar(10) ,
 `supplier_name` text ,
 `total_actual_cost` int(11) ,
 `notice_to_proceed` varchar(10) ,
 `delivery_completion` varchar(10) ,
 `acceptance_turn_over` varchar(10) ,
 `ci_no` text ,
 `accounting_date` date ,
 `cashier_date` date ,
 `number_of_days_po_to_delivery` int(11) ,
 `number_of_days_delivery_to_cashier` int(11) ,
 `remarks_details` text ,
 `pr_id` int(11) unsigned 
)*/;

/*Table structure for table `home` */

DROP TABLE IF EXISTS `home`;

/*!50001 DROP VIEW IF EXISTS `home` */;
/*!50001 DROP TABLE IF EXISTS `home` */;

/*!50001 CREATE TABLE  `home`(
 `pr_date` date ,
 `pr_number` varchar(10) ,
 `particulars_details` text ,
 `total_approved_budget_cost` int(11) ,
 `division` text ,
 `po_number` varchar(10) ,
 `supplier_name` text ,
 `total_actual_cost` int(11) ,
 `notice_to_proceed` text ,
 `delivery_completion` text ,
 `acceptance_turn_over` text ,
 `ci_no` text ,
 `accounting_date` date ,
 `cashier_date` date ,
 `number_of_days_po_to_delivery` int(11) ,
 `number_of_days_delivery_to_cashier` int(11) ,
 `pr_id` int(11) unsigned 
)*/;

/*Table structure for table `ininventory` */

DROP TABLE IF EXISTS `ininventory`;

/*!50001 DROP VIEW IF EXISTS `ininventory` */;
/*!50001 DROP TABLE IF EXISTS `ininventory` */;

/*!50001 CREATE TABLE  `ininventory`(
 `pr_date` date ,
 `pr_number` varchar(10) ,
 `particulars_details` text ,
 `total_approved_budget_cost` int(11) ,
 `division` text ,
 `po_number` varchar(10) ,
 `supplier_name` text ,
 `total_actual_cost` int(11) ,
 `notice_to_proceed` text ,
 `delivery_completion` text ,
 `acceptance_turn_over` text ,
 `ci_no` text ,
 `accounting_date` date ,
 `cashier_date` date ,
 `number_of_days_po_to_delivery` int(11) ,
 `number_of_days_delivery_to_cashier` int(11) ,
 `remarks_details` text ,
 `pr_id` int(11) unsigned ,
 `category_name` text 
)*/;

/*Table structure for table `outinventory` */

DROP TABLE IF EXISTS `outinventory`;

/*!50001 DROP VIEW IF EXISTS `outinventory` */;
/*!50001 DROP TABLE IF EXISTS `outinventory` */;

/*!50001 CREATE TABLE  `outinventory`(
 `pr_date` date ,
 `pr_number` varchar(10) ,
 `particulars_details` text ,
 `total_approved_budget_cost` int(11) ,
 `division` text ,
 `po_number` varchar(10) ,
 `supplier_name` text ,
 `total_actual_cost` int(11) ,
 `notice_to_proceed` text ,
 `delivery_completion` text ,
 `acceptance_turn_over` text ,
 `ci_no` text ,
 `accounting_date` date ,
 `cashier_date` date ,
 `number_of_days_po_to_delivery` int(11) ,
 `number_of_days_delivery_to_cashier` int(11) ,
 `remarks_details` text ,
 `pr_id` int(11) unsigned ,
 `category_name` text 
)*/;

/*Table structure for table `output` */

DROP TABLE IF EXISTS `output`;

/*!50001 DROP VIEW IF EXISTS `output` */;
/*!50001 DROP TABLE IF EXISTS `output` */;

/*!50001 CREATE TABLE  `output`(
 `pr_date` date ,
 `pr_number` varchar(10) ,
 `particulars_details` text ,
 `total_approved_budget_cost` int(11) ,
 `division` text ,
 `po_number` varchar(10) ,
 `supplier_name` text ,
 `total_actual_cost` int(11) ,
 `notice_to_proceed` text ,
 `delivery_completion` text ,
 `acceptance_turn_over` text ,
 `ci_no` text ,
 `accounting_date` date ,
 `cashier_date` date ,
 `number_of_days_po_to_delivery` int(11) ,
 `number_of_days_delivery_to_cashier` int(11) ,
 `remarks_details` text ,
 `pr_id` int(11) unsigned ,
 `category_name` text ,
 `amount` int(11) 
)*/;

/*Table structure for table `remarksview` */

DROP TABLE IF EXISTS `remarksview`;

/*!50001 DROP VIEW IF EXISTS `remarksview` */;
/*!50001 DROP TABLE IF EXISTS `remarksview` */;

/*!50001 CREATE TABLE  `remarksview`(
 `pr_date` date ,
 `pr_number` varchar(10) ,
 `particulars_details` text ,
 `total_approved_budget_cost` int(11) ,
 `division` text ,
 `po_number` varchar(10) ,
 `supplier_name` text ,
 `total_actual_cost` int(11) ,
 `notice_to_proceed` text ,
 `delivery_completion` text ,
 `acceptance_turn_over` text ,
 `ci_no` text ,
 `accounting_date` date ,
 `cashier_date` date ,
 `number_of_days_po_to_delivery` int(11) ,
 `number_of_days_delivery_to_cashier` int(11) ,
 `remarks_details` text ,
 `pr_id` int(11) unsigned 
)*/;

/*View structure for view history */

/*!50001 DROP TABLE IF EXISTS `history` */;
/*!50001 DROP VIEW IF EXISTS `history` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history` AS select distinct `p`.`pr_date` AS `pr_date`,`p`.`pr_number` AS `pr_number`,`p`.`particulars_details` AS `particulars_details`,`co`.`total_approved_budget_cost` AS `total_approved_budget_cost`,`r`.`division` AS `division`,`co`.`po_number` AS `po_number`,`s`.`supplier_name` AS `supplier_name`,`co`.`total_actual_cost` AS `total_actual_cost`,`d`.`notice_to_proceed` AS `notice_to_proceed`,`d`.`delivery_completion` AS `delivery_completion`,`d`.`acceptance_turn_over` AS `acceptance_turn_over`,`d`.`ci_no` AS `ci_no`,`a`.`accounting_date` AS `accounting_date`,`c`.`cashier_date` AS `cashier_date`,`d`.`number_of_days_po_to_delivery` AS `number_of_days_po_to_delivery`,`d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,`re`.`remarks_details` AS `remarks_details`,`p`.`pr_id` AS `pr_id` from (((((((`particulars` `p` left join `supplier_logs` `s` on((`p`.`supplier_id` = `s`.`supplier_id`))) left join `cashier_logs` `c` on((`c`.`supplier_id` = `s`.`supplier_id`))) left join `accounting_logs` `a` on((`a`.`cashier_id` = `c`.`cashier_id`))) left join `cost_logs` `co` on((`co`.`accounting_id` = `a`.`accounting_id`))) left join `req_logs` `r` on((`r`.`pr_id` = `p`.`pr_id`))) left join `delivery_logs` `d` on((`d`.`pr_id` = `p`.`pr_id`))) left join `remarks_logs` `re` on((`re`.`pr_id` = `p`.`pr_id`))) */;

/*View structure for view home */

/*!50001 DROP TABLE IF EXISTS `home` */;
/*!50001 DROP VIEW IF EXISTS `home` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `home` AS select `p`.`pr_date` AS `pr_date`,`p`.`pr_number` AS `pr_number`,`p`.`particulars_details` AS `particulars_details`,`co`.`total_approved_budget_cost` AS `total_approved_budget_cost`,`r`.`division` AS `division`,`co`.`po_number` AS `po_number`,`s`.`supplier_name` AS `supplier_name`,`co`.`total_actual_cost` AS `total_actual_cost`,`d`.`notice_to_proceed` AS `notice_to_proceed`,`d`.`delivery_completion` AS `delivery_completion`,`d`.`acceptance_turn_over` AS `acceptance_turn_over`,`d`.`ci_no` AS `ci_no`,`a`.`accounting_date` AS `accounting_date`,`c`.`cashier_date` AS `cashier_date`,`d`.`number_of_days_po_to_delivery` AS `number_of_days_po_to_delivery`,`d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,`p`.`pr_id` AS `pr_id` from ((((((`particulars` `p` left join `supplier` `s` on((`p`.`supplier_id` = `s`.`supplier_id`))) left join `cashier` `c` on((`c`.`supplier_id` = `s`.`supplier_id`))) left join `accounting` `a` on((`a`.`cashier_id` = `c`.`cashier_id`))) left join `cost` `co` on((`co`.`accounting_id` = `a`.`accounting_id`))) left join `req_div` `r` on((`r`.`pr_id` = `p`.`pr_id`))) left join `delivery` `d` on((`d`.`pr_id` = `p`.`pr_id`))) */;

/*View structure for view ininventory */

/*!50001 DROP TABLE IF EXISTS `ininventory` */;
/*!50001 DROP VIEW IF EXISTS `ininventory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ininventory` AS select `p`.`pr_date` AS `pr_date`,`p`.`pr_number` AS `pr_number`,`p`.`particulars_details` AS `particulars_details`,`co`.`total_approved_budget_cost` AS `total_approved_budget_cost`,`r`.`division` AS `division`,`co`.`po_number` AS `po_number`,`s`.`supplier_name` AS `supplier_name`,`co`.`total_actual_cost` AS `total_actual_cost`,`d`.`notice_to_proceed` AS `notice_to_proceed`,`d`.`delivery_completion` AS `delivery_completion`,`d`.`acceptance_turn_over` AS `acceptance_turn_over`,`d`.`ci_no` AS `ci_no`,`a`.`accounting_date` AS `accounting_date`,`c`.`cashier_date` AS `cashier_date`,`d`.`number_of_days_po_to_delivery` AS `number_of_days_po_to_delivery`,`d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,`re`.`remarks_details` AS `remarks_details`,`p`.`pr_id` AS `pr_id`,`cat`.`category_name` AS `category_name` from ((((((((`particulars` `p` left join `supplier` `s` on((`p`.`supplier_id` = `s`.`supplier_id`))) left join `cashier` `c` on((`c`.`supplier_id` = `s`.`supplier_id`))) left join `accounting` `a` on((`a`.`cashier_id` = `c`.`cashier_id`))) left join `cost` `co` on((`co`.`accounting_id` = `a`.`accounting_id`))) left join `req_div` `r` on((`r`.`pr_id` = `p`.`pr_id`))) left join `delivery` `d` on((`d`.`pr_id` = `p`.`pr_id`))) left join `remarks` `re` on((`re`.`pr_id` = `p`.`pr_id`))) left join `category` `cat` on((`p`.`pr_id` = `cat`.`pr_id`))) */;

/*View structure for view outinventory */

/*!50001 DROP TABLE IF EXISTS `outinventory` */;
/*!50001 DROP VIEW IF EXISTS `outinventory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outinventory` AS select `p`.`pr_date` AS `pr_date`,`p`.`pr_number` AS `pr_number`,`p`.`particulars_details` AS `particulars_details`,`co`.`total_approved_budget_cost` AS `total_approved_budget_cost`,`r`.`division` AS `division`,`co`.`po_number` AS `po_number`,`s`.`supplier_name` AS `supplier_name`,`co`.`total_actual_cost` AS `total_actual_cost`,`d`.`notice_to_proceed` AS `notice_to_proceed`,`d`.`delivery_completion` AS `delivery_completion`,`d`.`acceptance_turn_over` AS `acceptance_turn_over`,`d`.`ci_no` AS `ci_no`,`a`.`accounting_date` AS `accounting_date`,`c`.`cashier_date` AS `cashier_date`,`d`.`number_of_days_po_to_delivery` AS `number_of_days_po_to_delivery`,`d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,`re`.`remarks_details` AS `remarks_details`,`p`.`pr_id` AS `pr_id`,`cat`.`category_name` AS `category_name` from ((((((((`particulars` `p` left join `supplier` `s` on((`p`.`supplier_id` = `s`.`supplier_id`))) left join `cashier` `c` on((`c`.`supplier_id` = `s`.`supplier_id`))) left join `accounting` `a` on((`a`.`cashier_id` = `c`.`cashier_id`))) left join `cost` `co` on((`co`.`accounting_id` = `a`.`accounting_id`))) left join `req_div` `r` on((`r`.`pr_id` = `p`.`pr_id`))) left join `delivery` `d` on((`d`.`pr_id` = `p`.`pr_id`))) left join `remarks` `re` on((`re`.`pr_id` = `p`.`pr_id`))) left join `category` `cat` on((`p`.`pr_id` = `cat`.`pr_id`))) */;

/*View structure for view output */

/*!50001 DROP TABLE IF EXISTS `output` */;
/*!50001 DROP VIEW IF EXISTS `output` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `output` AS select `p`.`pr_date` AS `pr_date`,`p`.`pr_number` AS `pr_number`,`p`.`particulars_details` AS `particulars_details`,`co`.`total_approved_budget_cost` AS `total_approved_budget_cost`,`r`.`division` AS `division`,`co`.`po_number` AS `po_number`,`s`.`supplier_name` AS `supplier_name`,`co`.`total_actual_cost` AS `total_actual_cost`,`d`.`notice_to_proceed` AS `notice_to_proceed`,`d`.`delivery_completion` AS `delivery_completion`,`d`.`acceptance_turn_over` AS `acceptance_turn_over`,`d`.`ci_no` AS `ci_no`,`a`.`accounting_date` AS `accounting_date`,`c`.`cashier_date` AS `cashier_date`,`d`.`number_of_days_po_to_delivery` AS `number_of_days_po_to_delivery`,`d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,`re`.`remarks_details` AS `remarks_details`,`p`.`pr_id` AS `pr_id`,`cat`.`category_name` AS `category_name`,`q`.`pieces` AS `amount` from (((((((((`particulars` `p` left join `supplier` `s` on((`p`.`supplier_id` = `s`.`supplier_id`))) left join `cashier` `c` on((`c`.`supplier_id` = `s`.`supplier_id`))) left join `accounting` `a` on((`a`.`cashier_id` = `c`.`cashier_id`))) left join `cost` `co` on((`co`.`accounting_id` = `a`.`accounting_id`))) left join `req_div` `r` on((`r`.`pr_id` = `p`.`pr_id`))) left join `delivery` `d` on((`d`.`pr_id` = `p`.`pr_id`))) left join `remarks` `re` on((`re`.`pr_id` = `p`.`pr_id`))) left join `category` `cat` on((`p`.`pr_id` = `cat`.`pr_id`))) left join `quantity` `q` on((`p`.`pr_id` = `q`.`pr_id`))) where ((`d`.`acceptance_turn_over` is not null) and (`cat`.`category_name` is not null) and (`q`.`pieces` is not null)) */;

/*View structure for view remarksview */

/*!50001 DROP TABLE IF EXISTS `remarksview` */;
/*!50001 DROP VIEW IF EXISTS `remarksview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remarksview` AS select `p`.`pr_date` AS `pr_date`,`p`.`pr_number` AS `pr_number`,`p`.`particulars_details` AS `particulars_details`,`co`.`total_approved_budget_cost` AS `total_approved_budget_cost`,`r`.`division` AS `division`,`co`.`po_number` AS `po_number`,`s`.`supplier_name` AS `supplier_name`,`co`.`total_actual_cost` AS `total_actual_cost`,`d`.`notice_to_proceed` AS `notice_to_proceed`,`d`.`delivery_completion` AS `delivery_completion`,`d`.`acceptance_turn_over` AS `acceptance_turn_over`,`d`.`ci_no` AS `ci_no`,`a`.`accounting_date` AS `accounting_date`,`c`.`cashier_date` AS `cashier_date`,`d`.`number_of_days_po_to_delivery` AS `number_of_days_po_to_delivery`,`d`.`number_of_days_delivery_to_cashier` AS `number_of_days_delivery_to_cashier`,`re`.`remarks_details` AS `remarks_details`,`p`.`pr_id` AS `pr_id` from (((((((`particulars` `p` left join `supplier` `s` on((`p`.`supplier_id` = `s`.`supplier_id`))) left join `cashier` `c` on((`c`.`supplier_id` = `s`.`supplier_id`))) left join `accounting` `a` on((`a`.`cashier_id` = `c`.`cashier_id`))) left join `cost` `co` on((`co`.`accounting_id` = `a`.`accounting_id`))) left join `req_div` `r` on((`r`.`pr_id` = `p`.`pr_id`))) left join `delivery` `d` on((`d`.`pr_id` = `p`.`pr_id`))) left join `remarks` `re` on((`re`.`pr_id` = `p`.`pr_id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
