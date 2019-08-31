/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bot_crm` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bot_crm`;

/*Table structure for table `sys_user` */

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `user_id` int(32) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_code` varchar(32) NOT NULL COMMENT '用户账号',
  `user_name` varchar(50) NOT NULL COMMENT '用户名称',
  `user_password` varchar(32) NOT NULL COMMENT '用户密码',
  `user_state` int(1) NOT NULL COMMENT '1:正常,0:暂停',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `sys_user` */

insert  into `sys_user`(`user_id`,`user_code`,`user_name`,`user_password`,`user_state`) values 
(1,'m0001','小韩','123',1),
(2,'m0002','小雪','123',1),
(3,'m0003','小石','123',1),
(4,'m0004','小陈','123',1);

/*Table structure for table `activation_code` */

DROP TABLE IF EXISTS `activation_code`;

CREATE TABLE `activation_code` (
  `active_id` int(32) NOT NULL AUTO_INCREMENT COMMENT '激活码Id',
  `active_code` varchar(32) NOT NULL UNIQUE COMMENT '激活码',
  `active_type` varchar(16) NOT NULL COMMENT '激活码类型',
  `active_createtime` datetime DEFAULT NULL COMMENT '激活码创建时间',
  `active_endtime` datetime DEFAULT NULL COMMENT '激活码失效时间',
  `active_auth_code` tinyint(1) DEFAULT NULL COMMENT '是否激活',
  PRIMARY KEY (`active_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `activation_code` */

insert  into `activation_code`(`active_id`,`active_code`,`active_type`,`active_createtime`,`active_endtime`,`active_auth_code`) values
 (1,'mRS932DGAGAC33Adedate23d','registerbot','2019-05-24 17:55:01','2019-09-30 17:55:01',0),
 (2,'rgaet3sda53te3rf3qde3dag','nourishbot','2019-05-24 17:55:02','2019-09-30 17:55:02',1),
 (3,'dhasysd789g6980ad78ay35r','hcwqzbot','2019-05-24 17:55:03','2019-09-30 17:55:03',0),
 (4,'gaghdidia3890390da98ndag','nourishbot','2019-05-24 17:55:02','2019-09-30 17:55:02',1),
 (5,'ahuy980da783dghadajpojoj','hcwqzbot','2019-05-24 17:55:04','2019-09-30 17:55:04',1),
 (6,'dashgag98903jhduayaga89h','nourishbot','2019-05-24 17:55:02','2019-09-30 17:55:02',1),
 (7,'huasygt980eweh98hhadyg78','registerbot','2019-05-24 17:55:01','2019-09-30 17:55:01',0),
 (8,'oiasdhhy9weahhoidhahhey8','hcwqzbot','2019-05-24 17:55:05','2019-09-30 17:55:05',1),
 (9,'haiudh34eh3e9huihnjho9ui','registerbot','2019-05-24 17:55:01','2019-09-30 17:55:01',0),
 (10,'ajgjhaiotgeiehgane4983u8','nourishbot','2019-05-24 17:55:02','2019-09-30 17:55:02',1),
 (11,'ndiojh9e3tgohghahg9e39j9','registerbot','2019-05-24 17:55:01','2019-09-30 17:55:01',0);

/*Table structure for table `nourishbot_customer` */

DROP TABLE IF EXISTS `nourishbot_customer`;

CREATE TABLE `nourishbot_customer` (
  `nbcust_id` int(32) NOT NULL AUTO_INCREMENT COMMENT '客户编号(主键)',
  `nbcust_name` varchar(50) NOT NULL COMMENT '客户名称',
  `nbcust_active_code` varchar(32) DEFAULT NULL UNIQUE COMMENT '激活码',
  `nbcust_mac_address` varchar(48) DEFAULT NULL COMMENT 'MAC地址',
  `nbcust_thread` int(32) DEFAULT NULL COMMENT '线程数',
  `nbcust_auth_code` tinyint(1) DEFAULT NULL COMMENT '是否激活',
  `nbcust_reset` int(32) DEFAULT NULL COMMENT '当日重启次数',
  `nbcust_total` int(128) DEFAULT NULL COMMENT '当日养号次数',
  `nbcust_createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `nbcust_endtime` datetime DEFAULT NULL COMMENT '失效时间',
  `nbcust_expiredtime` datetime DEFAULT NULL COMMENT '用户修改时间',
  PRIMARY KEY (`nbcust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

/*Data for the table `nourishbot_customer` */

insert  into `nourishbot_customer`(`nbcust_id`,`nbcust_name`,`nbcust_active_code`,`nbcust_mac_address`,`nbcust_thread`,`nbcust_auth_code`,`nbcust_reset`,`nbcust_total`,`nbcust_createtime`,`nbcust_endtime`,`nbcust_expiredtime`) values 
									(14,'小张','mRS932DGAGAC33Adedate23d','6',2,'1',10,17,'2019-05-24 17:55:01','2019-9-30 17:55:01','2019-5-26 16:32:01'),
                                    (15,'小韩','rgaet3sda53te3rf3qde3dag','7',3,'0',6,10,'2019-05-24 17:55:02','2019-05-24 17:55:02','2019-05-24 17:55:02'),
                                    (16,'小李','dhasysd789g6980ad78ay35r','8',6,'1',22,39,'2019-05-24 17:55:02','2019-05-24 17:55:02','2019-05-24 17:55:02'),
                                    (17,'小赵','gaghdidia3890390da98ndag','9',4,'0',23,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (22,'小明','ahuy980da783dghadajpojoj','10',5,'1',24,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (24,'小伟','dashgag98903jhduayaga89h','11',6,'0',25,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (25,'Tom','huasygt980eweh98hhadyg78','12',7,'1',26,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (26,'jack','oiasdhhy9weahhoidhahhey8','13',8,'0',27,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (28,'Rose','haiudh34eh3e9huihnjho9ui','14',9,'1',28,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (29,'小韩','ajgjhaiotgeiehgane4983u8','15',10,'0',29,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (30,'小叶','gjhdaaiotadggagane4983u8','16',11,'1',35,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (31,'小韩','ndiojhe3tgohdgaghg9e39j9','17',12,'0',33,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (33,'小海','ndiojh9e3tgodagghg9e39j9','18',13,'1',42,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (34,'小韩','ndiojh9e3tggahhghg9e39j9','19',14,'1',32,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (35,'小姜','ndiojh9e3tgohghahg9e39j9','20',15,'0',21,16,'2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03');
/*Table structure for table `registerbot_customer` */

DROP TABLE IF EXISTS `registerbot_customer`;

CREATE TABLE `registerbot_customer` (
  `rbcust_id` int(32) NOT NULL AUTO_INCREMENT COMMENT '客户编号(主键)',
  `rbcust_name` varchar(50) NOT NULL COMMENT '客户名称',
  `rbcust_active_code` varchar(32) DEFAULT NULL UNIQUE COMMENT '激活码',
  `rbcust_mac_address` varchar(48) DEFAULT NULL COMMENT 'MAC地址',
  `rbcust_thread` int(32) DEFAULT NULL COMMENT '线程数',
  `rbcust_auth_code` tinyint(1) DEFAULT NULL COMMENT '是否激活',
  `rbcust_createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `rbcust_endtime` datetime DEFAULT NULL COMMENT '失效时间',
  `rbcust_expiredtime` datetime DEFAULT NULL COMMENT '用户修改时间',
  PRIMARY KEY (`rbcust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

/*Data for the table `registerbot_customer` */

insert  into `registerbot_customer`(`rbcust_id`,`rbcust_name`,`rbcust_active_code`,`rbcust_mac_address`,`rbcust_thread`,`rbcust_auth_code`,`rbcust_createtime`,`rbcust_endtime`,`rbcust_expiredtime`) values 
									(14,'小张','mRS932DGAGAC33Adedate23d','6',2,'1','2019-05-24 17:55:01','2019-9-30 17:55:01','2019-5-26 16:32:01'),
                                    (15,'小韩','rgaet3sda53te3rf3qde3dag','7',3,'0','2019-05-24 17:55:02','2019-05-24 17:55:02','2019-05-24 17:55:02'),
                                    (16,'小李','dhasysd789g6980ad78ay35r','8',6,'1','2019-05-24 17:55:02','2019-05-24 17:55:02','2019-05-24 17:55:02'),
                                    (17,'小赵','gaghdidia3890390da98ndag','9',4,'0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (22,'小明','ahuy980da783dghadajpojoj','10',5,'1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (24,'小伟','dashgag98903jhduayaga89h','11',6,'0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (25,'Tom','huasygt980eweh98hhadyg78','12',7,'1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (26,'jack','oiasdhhy9weahhoidhahhey8','13',8,'0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (28,'Rose','haiudh34eh3e9huihnjho9ui','14',9,'1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (29,'小韩','ajgjhaiadghaghgane4983u8','15',10,'0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (30,'小叶','ndiojh9ghadghghahg9e39j9','17',12,'0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (33,'小海','ndiojhgagggaddhahg9e39j9','18',13,'1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (34,'小韩','dag34e3dggd3dghahg9e39j9','19',14,'1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (35,'小姜','ndiot3dd3d3tdghahg9e39j9','20',15,'0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03');
/*Table structure for table `hcwqzbot_customer` */

DROP TABLE IF EXISTS `hcwqzbot_customer`;

CREATE TABLE `hcwqzbot_customer` (
  `sbcust_id` int(32) NOT NULL AUTO_INCREMENT COMMENT '客户编号(主键)',
  `sbcust_name` varchar(50) NOT NULL COMMENT '客户名称',
  `sbcust_active_code` varchar(32) DEFAULT NULL UNIQUE COMMENT '激活码',
  `sbcust_mac_address` varchar(48) DEFAULT NULL COMMENT 'MAC地址',
  `sbcust_auth_code` tinyint(1) DEFAULT NULL COMMENT '是否激活',
  `sbcust_createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `sbcust_endtime` datetime DEFAULT NULL COMMENT '失效时间',
  `sbcust_expiredtime` datetime DEFAULT NULL COMMENT '用户修改时间',
  PRIMARY KEY (`sbcust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

/*Data for the table `hcwqzbot_customer` */

insert  into `hcwqzbot_customer`(`sbcust_id`,`sbcust_name`,`sbcust_active_code`,`sbcust_mac_address`,`sbcust_auth_code`,`sbcust_createtime`,`sbcust_endtime`,`sbcust_expiredtime`) values 
									(14,'小张','mRS932DGAGAC33Adedate23d','6','1','2019-05-24 17:55:01','2019-9-30 17:55:01','2019-5-26 16:32:01'),
                                    (15,'小韩','rgaet3sda53te3rf3qde3dag','7','0','2019-05-24 17:55:02','2019-05-24 17:55:02','2019-05-24 17:55:02'),
                                    (16,'小李','dhasysd789g6980ad78ay35r','8','1','2019-05-24 17:55:02','2019-05-24 17:55:02','2019-05-24 17:55:02'),
                                    (17,'小赵','gaghdidia3890390da98ndag','9','0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (22,'小明','ahuy980da783dghadajpojoj','10','1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (24,'小伟','dashgag98903jhduayaga89h','11','0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (25,'Tom','huasygt980eweh98hhadyg78','12','1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (26,'jack','oiasdhhy9weahhoidhahhey8','13','0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (28,'Rose','haiudh34eh3e9huihnjho9ui','14','1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (29,'小韩','ajgjhaiadghaghgane4983u8','15','0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (30,'小叶','ndiojh9ghadghghahg9e39j9','16','1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (31,'小韩','ndiojhgagggaddhahg9e39j9','17','0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (33,'小海','dag34e3dggd3dghahg9e39j9','18','1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (34,'小韩','ndiot3dd3d3tdghahg9e39j9','19','1','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03'),
                                    (35,'小姜','ndagt3dddasgetdghage39j9','20','0','2019-05-24 17:55:03','2019-05-24 17:55:03','2019-05-24 17:55:03');
                                    
/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `order_id` int(32) NOT NULL AUTO_INCREMENT COMMENT '订单号(主键)',
  `rbcust_name` varchar(50) NOT NULL COMMENT '客户名称',
  `order_url` varchar(256) DEFAULT NULL COMMENT '订单照片地址',
  `email_account` varchar(64) DEFAULT NULL UNIQUE COMMENT '用户邮箱账号',
  `order_time` datetime DEFAULT NULL COMMENT '订单时间',
  `order_shoe` varchar(256) DEFAULT NULL COMMENT '鞋款',
  `order_code` varchar(64) DEFAULT NULL COMMENT '鞋子货号',
   `order_size` float(8) DEFAULT NULL COMMENT '鞋子码数',
   `order_price` int(8) DEFAULT NULL COMMENT '鞋子价格',
  `order_pay` tinyint(1) DEFAULT NULL COMMENT '订单是否付款',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

/*Data for the table `order` */

insert  into `order`(`order_id`,`rbcust_name`,`order_url`,`email_account`,`order_time`,`order_shoe`,`order_code`,`order_size`,`order_price`,`order_pay`) values 
(14,'小张',NULL,'utiad@outlook.com','2016-04-08 16:32:01','Air jordan 1','bc0073-300',36,799,'1'),
(15,'小韩',NULL,'uttatg@outlook.com','2016-04-08 16:32:02','Air jordan 1','bc0073-300',35,899,'0'),
(16,'小李',NULL,'uagdaad@outlook.com','2016-04-08 16:32:03','Air jordan 1','bc0073-300',36.5,1199,'1'),
(17,'小赵',NULL,'utagdd@outlook.com','2016-04-08 16:32:04','Air jordan 1','bc0073-300',37,1399,'0'),
(22,'小明',NULL,'ugdgaad@outlook.com','2016-04-08 16:32:05','Air jordan 1','bc0073-300',37.5,699,'1'),
(24,'小伟',NULL,'agiad@outlook.com','2016-04-08 16:32:06','Air jordan 1','bc0073-300',38,800,'1'),
(25,'Tom',NULL,'uagdad@outlook.com','2016-04-08 16:32:07','Air jordan 1','bc0073-300',38.5,699,'0'),
(26,'jack',NULL,'gdiad@outlook.com','2016-04-08 16:32:08','Air jordan 1','bc0073-300',39,799,'1'),
(28,'Rose',NULL,'aiad@outlook.com','2016-04-08 16:32:09','Air jordan 1','bc0073-300',40,699,'1'),
(29,'小韩',NULL,'ugaad@outlook.com','2016-04-08 16:32:10','Air jordan 1','bc0073-300',41,599,'0'),
(30,'小叶',NULL,'adgdga@outlook.com','2016-04-08 16:32:11','Air jordan 1','bc0073-300',42,799,'1'),
(31,'小韩',NULL,'agaaggd@outlook.com','2016-04-08 16:32:12','Air jordan 1','bc0073-300',43,1199,'0'),
(33,'小海',NULL,'ufdadd@outlook.com','2016-04-08 16:32:13','Air jordan 1','bc0073-300',44,2199,'1'),
(34,'小韩',NULL,'uagfadd@outlook.com','2016-04-08 16:32:14','Air jordan 1','bc0073-300',45,2099,'1');
