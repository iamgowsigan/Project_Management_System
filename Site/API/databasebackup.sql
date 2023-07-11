DROP TABLE address;

CREATE TABLE `address` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `a_name` varchar(200) DEFAULT NULL,
  `a_phone` varchar(200) DEFAULT NULL,
  `a_address` varchar(2000) DEFAULT NULL,
  `a_city` varchar(200) DEFAULT NULL,
  `a_country` varchar(200) DEFAULT NULL,
  `a_map` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `a_status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;




DROP TABLE admin;

CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_image` varchar(2000) DEFAULT NULL,
  `admin_phone` varchar(2000) DEFAULT NULL,
  `admin_work` varchar(2000) DEFAULT NULL,
  `admin_about` varchar(2000) DEFAULT NULL,
  `power` int NOT NULL DEFAULT '0',
  `business` int DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("2","admin","$2y$12$V/Cnb3OKtq1MSZulWOzKgO7SnvxRhNlOEOXg.Mr.8Oex4MtO9S1Du","Admin","admin","admin1609692311.png","8675002552","","sss","1","0","2019-01-04 23:11:27");



DROP TABLE admin_theam;

CREATE TABLE `admin_theam` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `left_menu` varchar(200) NOT NULL,
  `left_menu_icon` varchar(200) NOT NULL,
  `content_area` varchar(200) NOT NULL,
  `activity_list` int NOT NULL,
  `t_created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admin_theam VALUES("1","default","false","false","50","2022-07-19 10:26:23");



DROP TABLE adminlog;

CREATE TABLE `adminlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  `action` varchar(2000) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=806 DEFAULT CHARSET=latin1;

INSERT INTO adminlog VALUES("1","5","login","2021-06-24 07:33:00");
INSERT INTO adminlog VALUES("2","5","Sub category deleted","2021-06-24 07:56:31");
INSERT INTO adminlog VALUES("3","5","Category Updated","2021-06-24 08:49:40");
INSERT INTO adminlog VALUES("4","5","login","2021-06-24 11:40:32");
INSERT INTO adminlog VALUES("5","5","login","2021-06-24 12:47:23");
INSERT INTO adminlog VALUES("6","2","login","2021-06-24 13:58:09");
INSERT INTO adminlog VALUES("7","5","login","2021-06-24 14:12:50");
INSERT INTO adminlog VALUES("8","5","Coupon deleted","2021-06-24 14:12:59");
INSERT INTO adminlog VALUES("9","5","user deleted","2021-06-24 14:14:04");
INSERT INTO adminlog VALUES("10","2","login","2021-06-25 06:40:13");
INSERT INTO adminlog VALUES("11","5","login","2021-06-25 18:37:16");
INSERT INTO adminlog VALUES("12","2","login","2021-06-26 08:41:48");
INSERT INTO adminlog VALUES("13","2","login","2021-06-26 12:17:00");
INSERT INTO adminlog VALUES("14","2","login","2021-06-26 12:41:50");
INSERT INTO adminlog VALUES("15","2","login","2021-06-26 12:43:44");
INSERT INTO adminlog VALUES("16","2","login","2021-06-26 12:45:20");
INSERT INTO adminlog VALUES("17","5","login","2021-06-27 19:14:47");
INSERT INTO adminlog VALUES("18","2","login","2021-06-28 15:11:11");
INSERT INTO adminlog VALUES("19","2","login","2021-06-30 11:28:36");
INSERT INTO adminlog VALUES("20","2","login","2021-06-30 15:33:07");
INSERT INTO adminlog VALUES("21","2","login","2021-07-05 11:53:48");
INSERT INTO adminlog VALUES("22","2","Category Updated","2021-07-05 12:17:56");
INSERT INTO adminlog VALUES("23","2","login","2021-07-06 11:54:20");
INSERT INTO adminlog VALUES("24","2","Business deleted","2021-07-09 21:55:21");
INSERT INTO adminlog VALUES("25","2","Business deleted","2021-07-09 21:55:23");
INSERT INTO adminlog VALUES("26","2","Business deleted","2021-07-09 21:55:25");
INSERT INTO adminlog VALUES("27","2","Business deleted","2021-07-09 21:55:27");
INSERT INTO adminlog VALUES("28","2","Business deleted","2021-07-09 21:55:29");
INSERT INTO adminlog VALUES("29","2","Business deleted","2021-07-09 21:55:31");
INSERT INTO adminlog VALUES("30","2","Business deleted","2021-07-09 21:55:33");
INSERT INTO adminlog VALUES("31","2","Business deleted","2021-07-09 21:55:35");
INSERT INTO adminlog VALUES("32","2","Business deleted","2021-07-09 21:55:36");
INSERT INTO adminlog VALUES("33","2","Business deleted","2021-07-09 21:55:38");
INSERT INTO adminlog VALUES("34","2","Business deleted","2021-07-09 21:55:39");
INSERT INTO adminlog VALUES("35","2","Business deleted","2021-07-09 21:55:40");
INSERT INTO adminlog VALUES("36","2","Business deleted","2021-07-09 21:55:43");
INSERT INTO adminlog VALUES("37","2","Business deleted","2021-07-09 21:55:44");
INSERT INTO adminlog VALUES("38","2","login","2021-07-10 14:07:29");
INSERT INTO adminlog VALUES("39","2","login","2021-07-19 20:40:44");
INSERT INTO adminlog VALUES("40","2","Category Updated","2021-07-19 20:40:56");
INSERT INTO adminlog VALUES("41","2","Category Updated","2021-07-19 20:41:08");
INSERT INTO adminlog VALUES("42","2","Category Updated","2021-07-19 20:41:40");
INSERT INTO adminlog VALUES("43","2","Category Updated","2021-07-19 20:42:10");
INSERT INTO adminlog VALUES("44","2","Category Updated","2021-07-19 20:42:24");
INSERT INTO adminlog VALUES("45","2","Category Updated","2021-07-19 20:43:05");
INSERT INTO adminlog VALUES("46","2","login","2021-07-20 18:43:16");
INSERT INTO adminlog VALUES("47","2","login","2021-07-20 21:05:29");
INSERT INTO adminlog VALUES("48","2","login","2021-07-21 16:58:19");
INSERT INTO adminlog VALUES("49","2","Sub Category Updated","2021-07-21 23:37:51");
INSERT INTO adminlog VALUES("50","2","Sub Category Updated","2021-07-21 23:39:58");
INSERT INTO adminlog VALUES("51","2","Sub Category Updated","2021-07-21 23:40:17");
INSERT INTO adminlog VALUES("52","2","Sub Category Updated","2021-07-21 23:40:29");
INSERT INTO adminlog VALUES("53","2","Sub Category Updated","2021-07-21 23:40:43");
INSERT INTO adminlog VALUES("54","2","Sub Category Updated","2021-07-21 23:41:21");
INSERT INTO adminlog VALUES("55","2","Sub Category Updated","2021-07-21 23:42:12");
INSERT INTO adminlog VALUES("56","2","login","2021-07-23 17:37:17");
INSERT INTO adminlog VALUES("57","2","login","2021-07-24 12:16:47");
INSERT INTO adminlog VALUES("58","2","login","2021-07-24 23:48:00");
INSERT INTO adminlog VALUES("59","2","login","2021-07-24 23:48:47");
INSERT INTO adminlog VALUES("60","2","login","2021-07-26 10:38:32");
INSERT INTO adminlog VALUES("61","2","login","2021-07-28 12:14:13");
INSERT INTO adminlog VALUES("62","2","login","2021-07-28 12:34:48");
INSERT INTO adminlog VALUES("63","2","Business Updated","2021-07-28 13:04:34");
INSERT INTO adminlog VALUES("64","2","Business Updated","2021-07-28 13:04:48");
INSERT INTO adminlog VALUES("65","2","Business deleted","2021-07-28 13:05:24");
INSERT INTO adminlog VALUES("66","2","Business Updated","2021-07-28 13:42:39");
INSERT INTO adminlog VALUES("67","2","Business Updated","2021-07-28 13:43:05");
INSERT INTO adminlog VALUES("68","2","Business Updated","2021-07-28 13:43:34");
INSERT INTO adminlog VALUES("69","2","Business Updated","2021-07-28 13:43:56");
INSERT INTO adminlog VALUES("70","2","login","2021-07-28 18:07:49");
INSERT INTO adminlog VALUES("71","2","Business Updated","2021-07-28 18:13:42");
INSERT INTO adminlog VALUES("72","2","Business Updated","2021-07-28 18:13:46");
INSERT INTO adminlog VALUES("73","2","Banner deleted","2021-07-28 20:15:35");
INSERT INTO adminlog VALUES("74","2","Banner deleted","2021-07-28 20:31:51");
INSERT INTO adminlog VALUES("75","2","Category Updated","2021-07-28 20:52:58");
INSERT INTO adminlog VALUES("76","2","Category Updated","2021-07-28 20:53:23");
INSERT INTO adminlog VALUES("77","2","Category Updated","2021-07-28 20:53:27");
INSERT INTO adminlog VALUES("78","2","Category Updated","2021-07-28 20:54:21");
INSERT INTO adminlog VALUES("79","2","Category Updated","2021-07-28 20:54:24");
INSERT INTO adminlog VALUES("80","2","login","2021-07-29 11:03:09");
INSERT INTO adminlog VALUES("81","2","login","2021-07-30 11:52:24");
INSERT INTO adminlog VALUES("82","2","user deleted","2021-07-30 12:18:05");
INSERT INTO adminlog VALUES("83","2","user deleted","2021-07-30 12:20:06");
INSERT INTO adminlog VALUES("84","2","user deleted","2021-07-30 12:20:28");
INSERT INTO adminlog VALUES("85","2","user deleted","2021-07-30 12:21:18");
INSERT INTO adminlog VALUES("86","2","user deleted","2021-07-30 12:22:06");
INSERT INTO adminlog VALUES("87","2","user deleted","2021-07-30 12:23:49");
INSERT INTO adminlog VALUES("88","2","user deleted","2021-07-30 12:24:40");
INSERT INTO adminlog VALUES("89","2","Category Updated","2021-07-30 17:25:54");
INSERT INTO adminlog VALUES("90","2","Category Updated","2021-07-30 17:26:01");
INSERT INTO adminlog VALUES("91","2","Category Updated","2021-07-30 17:26:06");
INSERT INTO adminlog VALUES("92","2","Category Updated","2021-07-30 17:26:14");
INSERT INTO adminlog VALUES("93","2","Banner deleted","2021-07-30 17:35:44");
INSERT INTO adminlog VALUES("94","2","Banner deleted","2021-07-30 17:35:51");
INSERT INTO adminlog VALUES("95","2","login","2021-07-31 12:36:53");
INSERT INTO adminlog VALUES("96","2","login","2021-07-31 17:00:30");
INSERT INTO adminlog VALUES("97","2","Setting Updated","2021-07-31 17:01:20");
INSERT INTO adminlog VALUES("98","2","login","2021-07-31 17:19:28");
INSERT INTO adminlog VALUES("99","2","login","2021-07-31 17:59:11");
INSERT INTO adminlog VALUES("100","2","login","2021-07-31 18:01:04");
INSERT INTO adminlog VALUES("101","2","login","2021-07-31 18:02:07");
INSERT INTO adminlog VALUES("102","2","login","2021-07-31 18:04:42");
INSERT INTO adminlog VALUES("103","2","login","2021-07-31 18:08:52");
INSERT INTO adminlog VALUES("104","2","login","2021-07-31 18:11:41");
INSERT INTO adminlog VALUES("105","2","login","2021-08-02 20:29:48");
INSERT INTO adminlog VALUES("106","2","login","2021-08-02 20:32:30");
INSERT INTO adminlog VALUES("107","2","login","2021-08-03 18:25:12");
INSERT INTO adminlog VALUES("108","2","login","2021-08-03 18:27:16");
INSERT INTO adminlog VALUES("109","2","User Updated","2021-08-03 19:41:32");
INSERT INTO adminlog VALUES("110","2","login","2021-08-03 19:42:55");
INSERT INTO adminlog VALUES("111","2","login","2021-08-03 19:49:59");
INSERT INTO adminlog VALUES("112","6","login","2021-08-03 21:24:36");
INSERT INTO adminlog VALUES("113","6","login","2021-08-03 22:00:45");
INSERT INTO adminlog VALUES("114","6","login","2021-08-04 08:33:31");
INSERT INTO adminlog VALUES("115","6","Coupon Updated","2021-08-04 09:03:03");
INSERT INTO adminlog VALUES("116","6","Coupon Updated","2021-08-04 09:03:06");
INSERT INTO adminlog VALUES("117","6","Coupon Updated","2021-08-04 09:03:07");
INSERT INTO adminlog VALUES("118","6","Coupon Updated","2021-08-04 09:03:19");
INSERT INTO adminlog VALUES("119","6","Coupon Updated","2021-08-04 09:03:52");
INSERT INTO adminlog VALUES("120","6","Coupon Updated","2021-08-04 09:04:00");
INSERT INTO adminlog VALUES("121","6","Coupon Updated","2021-08-04 09:04:04");
INSERT INTO adminlog VALUES("122","2","login","2021-08-04 11:23:41");
INSERT INTO adminlog VALUES("123","2","login","2021-08-04 11:24:31");
INSERT INTO adminlog VALUES("124","7","login","2021-08-04 11:28:43");
INSERT INTO adminlog VALUES("125","2","login","2021-08-04 11:45:58");
INSERT INTO adminlog VALUES("126","2","Setting Updated","2021-08-04 12:42:23");
INSERT INTO adminlog VALUES("127","2","Setting Updated","2021-08-04 12:42:26");
INSERT INTO adminlog VALUES("128","2","Setting Updated","2021-08-04 12:50:35");
INSERT INTO adminlog VALUES("129","2","Setting Updated","2021-08-04 12:51:10");
INSERT INTO adminlog VALUES("130","2","login","2021-08-04 19:15:16");
INSERT INTO adminlog VALUES("131","2","login","2021-08-04 19:47:40");
INSERT INTO adminlog VALUES("132","2","login","2021-08-04 19:49:14");
INSERT INTO adminlog VALUES("133","2","Category Updated","2021-08-10 11:10:17");
INSERT INTO adminlog VALUES("134","2","Category Updated","2021-08-10 11:10:25");
INSERT INTO adminlog VALUES("135","2","Category Updated","2021-08-10 11:10:38");
INSERT INTO adminlog VALUES("136","2","Category Updated","2021-08-10 11:10:46");
INSERT INTO adminlog VALUES("137","2","Category Updated","2021-08-10 11:12:32");
INSERT INTO adminlog VALUES("138","2","Category Updated","2021-08-10 11:13:57");
INSERT INTO adminlog VALUES("139","2","Category Updated","2021-08-10 12:10:55");
INSERT INTO adminlog VALUES("140","2","Category Updated","2021-08-10 12:11:00");
INSERT INTO adminlog VALUES("141","2","Category Updated","2021-08-10 12:11:05");
INSERT INTO adminlog VALUES("142","2","SubCategory Updated","2021-08-10 12:39:01");
INSERT INTO adminlog VALUES("143","2","SubCategory Updated","2021-08-10 12:39:07");
INSERT INTO adminlog VALUES("144","2","login","2021-08-10 12:49:25");
INSERT INTO adminlog VALUES("145","2","Category Updated","2021-08-10 12:52:02");
INSERT INTO adminlog VALUES("146","2","SubCategory Updated","2021-08-10 13:00:12");
INSERT INTO adminlog VALUES("147","2","subcategory deleted","2021-08-10 13:09:16");
INSERT INTO adminlog VALUES("148","2","login","2021-08-10 17:53:32");
INSERT INTO adminlog VALUES("149","2","Category Updated","2021-08-10 19:07:21");
INSERT INTO adminlog VALUES("150","2","Category Updated","2021-08-10 19:50:54");
INSERT INTO adminlog VALUES("151","2","login","2021-08-11 22:03:52");
INSERT INTO adminlog VALUES("152","2","Category Updated","2021-08-11 23:01:25");
INSERT INTO adminlog VALUES("153","2","Category Updated","2021-08-11 23:04:34");
INSERT INTO adminlog VALUES("154","2","login","2021-08-12 11:22:55");
INSERT INTO adminlog VALUES("155","2","login","2021-08-12 12:54:30");
INSERT INTO adminlog VALUES("156","2","author deleted","2021-08-12 13:37:28");
INSERT INTO adminlog VALUES("157","2","Author Updated","2021-08-12 13:52:00");
INSERT INTO adminlog VALUES("158","2","Author Updated","2021-08-12 13:52:07");
INSERT INTO adminlog VALUES("159","2","Author Updated","2021-08-12 13:52:11");
INSERT INTO adminlog VALUES("160","2","Author Updated","2021-08-12 13:52:16");
INSERT INTO adminlog VALUES("161","2","login","2021-08-12 16:46:54");
INSERT INTO adminlog VALUES("162","2","login","2021-08-15 22:32:31");
INSERT INTO adminlog VALUES("163","2","login","2021-08-20 12:52:06");
INSERT INTO adminlog VALUES("164","2","Category Updated","2021-08-20 13:34:42");
INSERT INTO adminlog VALUES("165","2","Category Updated","2021-08-20 13:34:52");
INSERT INTO adminlog VALUES("166","2","Category Updated","2021-08-20 13:34:58");
INSERT INTO adminlog VALUES("167","2","Category Updated","2021-08-20 13:35:05");
INSERT INTO adminlog VALUES("168","2","youtube Updated","2021-08-20 14:50:47");
INSERT INTO adminlog VALUES("169","2","youtube Updated","2021-08-20 14:51:43");
INSERT INTO adminlog VALUES("170","2","youtube Updated","2021-08-20 14:52:22");
INSERT INTO adminlog VALUES("171","2","youtube Updated","2021-08-20 14:52:58");
INSERT INTO adminlog VALUES("172","2","youtube Updated","2021-08-20 14:53:26");
INSERT INTO adminlog VALUES("173","2","youtube deleted","2021-08-20 14:55:09");
INSERT INTO adminlog VALUES("174","2","Author Updated","2021-08-20 14:59:50");
INSERT INTO adminlog VALUES("175","2","author deleted","2021-08-20 15:22:47");
INSERT INTO adminlog VALUES("176","2","login","2021-08-20 17:23:11");
INSERT INTO adminlog VALUES("177","2","login","2021-08-21 13:35:30");
INSERT INTO adminlog VALUES("178","2","login","2021-08-29 15:49:39");
INSERT INTO adminlog VALUES("179","2","Category Updated","2021-08-29 15:51:11");
INSERT INTO adminlog VALUES("180","2","login","2021-08-30 14:15:05");
INSERT INTO adminlog VALUES("181","2","login","2021-08-30 18:03:30");
INSERT INTO adminlog VALUES("182","2","publication deleted","2021-08-30 18:21:12");
INSERT INTO adminlog VALUES("183","2","publication deleted","2021-08-30 18:21:16");
INSERT INTO adminlog VALUES("184","2","publication Updated","2021-08-30 18:37:14");
INSERT INTO adminlog VALUES("185","2","publication Updated","2021-08-30 18:37:23");
INSERT INTO adminlog VALUES("186","2","publication Updated","2021-08-30 18:39:55");
INSERT INTO adminlog VALUES("187","2","publication Updated","2021-08-30 18:40:05");
INSERT INTO adminlog VALUES("188","2","publication Updated","2021-08-30 18:40:12");
INSERT INTO adminlog VALUES("189","2","publication Updated","2021-08-30 18:42:00");
INSERT INTO adminlog VALUES("190","2","publication Updated","2021-08-30 18:42:32");
INSERT INTO adminlog VALUES("191","2","publication Updated","2021-08-30 18:42:45");
INSERT INTO adminlog VALUES("192","2","publication Updated","2021-08-30 18:43:43");
INSERT INTO adminlog VALUES("193","2","publication deleted","2021-08-30 18:43:53");
INSERT INTO adminlog VALUES("194","2","publication Updated","2021-08-30 19:10:15");
INSERT INTO adminlog VALUES("195","2","publication deleted","2021-08-30 19:15:09");
INSERT INTO adminlog VALUES("196","2","publication deleted","2021-08-30 19:15:12");
INSERT INTO adminlog VALUES("197","2","publication deleted","2021-08-30 19:15:16");
INSERT INTO adminlog VALUES("198","2","login","2021-08-30 22:23:54");
INSERT INTO adminlog VALUES("199","2","research Updated","2021-08-31 00:00:09");
INSERT INTO adminlog VALUES("200","2","research deleted","2021-08-31 00:02:59");
INSERT INTO adminlog VALUES("201","2","publication deleted","2021-08-31 00:09:13");
INSERT INTO adminlog VALUES("202","2","research Updated","2021-08-31 00:11:36");
INSERT INTO adminlog VALUES("203","2","news Updated","2021-08-31 00:55:22");
INSERT INTO adminlog VALUES("204","2","news Updated","2021-08-31 00:58:44");
INSERT INTO adminlog VALUES("205","2","news Updated","2021-08-31 01:03:19");
INSERT INTO adminlog VALUES("206","2","login","2021-08-31 10:29:41");
INSERT INTO adminlog VALUES("207","2","Banner deleted","2021-08-31 12:10:45");
INSERT INTO adminlog VALUES("208","2","Banner deleted","2021-08-31 12:11:01");
INSERT INTO adminlog VALUES("209","2","Banner deleted","2021-08-31 12:27:02");
INSERT INTO adminlog VALUES("210","2","login","2021-08-31 19:58:20");
INSERT INTO adminlog VALUES("211","2","Category Updated","2021-08-31 19:59:18");
INSERT INTO adminlog VALUES("212","2","login","2021-09-01 20:12:09");
INSERT INTO adminlog VALUES("213","2","Category Updated","2021-09-01 20:42:11");
INSERT INTO adminlog VALUES("214","2","Category Updated","2021-09-01 20:42:41");
INSERT INTO adminlog VALUES("215","2","Category Updated","2021-09-01 20:43:19");
INSERT INTO adminlog VALUES("216","2","Category Updated","2021-09-01 20:43:53");
INSERT INTO adminlog VALUES("217","2","Category Updated","2021-09-01 20:45:03");
INSERT INTO adminlog VALUES("218","2","Category Updated","2021-09-01 20:46:12");
INSERT INTO adminlog VALUES("219","2","Category Updated","2021-09-01 20:46:56");
INSERT INTO adminlog VALUES("220","2","Category Updated","2021-09-01 20:48:22");
INSERT INTO adminlog VALUES("221","2","Category Updated","2021-09-01 20:49:17");
INSERT INTO adminlog VALUES("222","2","Category Updated","2021-09-01 20:49:39");
INSERT INTO adminlog VALUES("223","2","Category Updated","2021-09-01 20:50:09");
INSERT INTO adminlog VALUES("224","2","publication Updated","2021-09-01 23:11:47");
INSERT INTO adminlog VALUES("225","2","publication Updated","2021-09-01 23:30:35");
INSERT INTO adminlog VALUES("226","2","publication Updated","2021-09-01 23:30:44");
INSERT INTO adminlog VALUES("227","2","login","2021-09-02 09:04:17");
INSERT INTO adminlog VALUES("228","2","login","2021-09-02 12:36:54");
INSERT INTO adminlog VALUES("229","2","publication Updated","2021-09-02 12:37:14");
INSERT INTO adminlog VALUES("230","2","publication Updated","2021-09-02 12:37:24");
INSERT INTO adminlog VALUES("231","2","publication Updated","2021-09-02 12:37:38");
INSERT INTO adminlog VALUES("232","2","author deleted","2021-09-02 14:24:16");
INSERT INTO adminlog VALUES("233","2","login","2021-09-02 23:56:02");
INSERT INTO adminlog VALUES("234","2","login","2021-09-03 11:18:46");
INSERT INTO adminlog VALUES("235","2","events deleted","2021-09-03 11:38:22");
INSERT INTO adminlog VALUES("236","2","Event Updated","2021-09-03 11:55:40");
INSERT INTO adminlog VALUES("237","2","Event Updated","2021-09-03 11:56:04");
INSERT INTO adminlog VALUES("238","2","Event Updated","2021-09-03 12:06:43");
INSERT INTO adminlog VALUES("239","2","Event Updated","2021-09-03 12:18:53");
INSERT INTO adminlog VALUES("240","2","Event Updated","2021-09-03 12:20:07");
INSERT INTO adminlog VALUES("241","2","Event Updated","2021-09-03 12:20:51");
INSERT INTO adminlog VALUES("242","2","Event Updated","2021-09-03 12:31:41");
INSERT INTO adminlog VALUES("243","2","Event Updated","2021-09-03 12:33:14");
INSERT INTO adminlog VALUES("244","2","Event Updated","2021-09-03 12:34:55");
INSERT INTO adminlog VALUES("245","2","Event Updated","2021-09-03 12:36:30");
INSERT INTO adminlog VALUES("246","2","Event Updated","2021-09-03 12:37:28");
INSERT INTO adminlog VALUES("247","2","login","2021-09-04 13:21:50");
INSERT INTO adminlog VALUES("248","2","Event Updated","2021-09-04 13:23:40");
INSERT INTO adminlog VALUES("249","2","Event Updated","2021-09-04 13:26:27");
INSERT INTO adminlog VALUES("250","2","Event Updated","2021-09-04 13:28:17");
INSERT INTO adminlog VALUES("251","2","Event Updated","2021-09-04 13:28:24");
INSERT INTO adminlog VALUES("252","2","Event Updated","2021-09-04 13:28:42");
INSERT INTO adminlog VALUES("253","2","Event Updated","2021-09-04 13:39:02");
INSERT INTO adminlog VALUES("254","2","Event Updated","2021-09-04 13:39:11");
INSERT INTO adminlog VALUES("255","2","login","2021-09-04 23:27:07");
INSERT INTO adminlog VALUES("256","2","login","2021-09-04 23:31:23");
INSERT INTO adminlog VALUES("257","2","login","2021-09-04 23:37:29");
INSERT INTO adminlog VALUES("258","2","login","2021-09-04 23:44:09");
INSERT INTO adminlog VALUES("259","2","publication deleted","2021-09-05 11:09:51");
INSERT INTO adminlog VALUES("260","2","publication deleted","2021-09-05 11:09:54");
INSERT INTO adminlog VALUES("261","2","publication deleted","2021-09-05 11:09:57");
INSERT INTO adminlog VALUES("262","2","publication deleted","2021-09-05 11:10:00");
INSERT INTO adminlog VALUES("263","2","publication deleted","2021-09-05 11:10:04");
INSERT INTO adminlog VALUES("264","2","login","2021-09-05 11:11:29");
INSERT INTO adminlog VALUES("265","2","login","2021-09-07 13:21:45");
INSERT INTO adminlog VALUES("266","2","login","2021-09-07 18:08:14");
INSERT INTO adminlog VALUES("267","2","login","2021-09-07 21:25:01");
INSERT INTO adminlog VALUES("268","2","login","2021-09-11 17:33:32");
INSERT INTO adminlog VALUES("269","2","login","2021-10-04 12:06:30");
INSERT INTO adminlog VALUES("270","2","Event Updated","2021-10-04 12:35:41");
INSERT INTO adminlog VALUES("271","2","Event Updated","2021-10-04 12:35:54");
INSERT INTO adminlog VALUES("272","2","events deleted","2021-10-04 12:46:17");
INSERT INTO adminlog VALUES("273","2","Event Updated","2021-10-04 12:46:50");
INSERT INTO adminlog VALUES("274","2","Event Updated","2021-10-04 12:46:56");
INSERT INTO adminlog VALUES("275","2","events deleted","2021-10-04 13:07:33");
INSERT INTO adminlog VALUES("276","2","events deleted","2021-10-04 13:07:37");
INSERT INTO adminlog VALUES("277","2","Event Updated","2021-10-04 13:16:13");
INSERT INTO adminlog VALUES("278","2","Event Updated","2021-10-04 13:16:22");
INSERT INTO adminlog VALUES("279","2","Event Updated","2021-10-04 13:16:35");
INSERT INTO adminlog VALUES("280","2","login","2021-10-04 20:20:33");
INSERT INTO adminlog VALUES("281","2","Event Updated","2021-10-04 22:22:10");
INSERT INTO adminlog VALUES("282","2","Event Updated","2021-10-04 22:22:25");
INSERT INTO adminlog VALUES("283","2","Event Updated","2021-10-04 22:22:34");
INSERT INTO adminlog VALUES("284","2","events deleted","2021-10-04 22:22:48");
INSERT INTO adminlog VALUES("285","2","events deleted","2021-10-04 22:22:54");
INSERT INTO adminlog VALUES("286","2","Event Updated","2021-10-04 22:30:26");
INSERT INTO adminlog VALUES("287","2","Event Updated","2021-10-04 22:30:59");
INSERT INTO adminlog VALUES("288","2","Event Updated","2021-10-04 22:35:10");
INSERT INTO adminlog VALUES("289","2","Event Updated","2021-10-04 22:35:23");
INSERT INTO adminlog VALUES("290","2","Event Updated","2021-10-04 22:35:25");
INSERT INTO adminlog VALUES("291","2","Event Updated","2021-10-04 22:35:28");
INSERT INTO adminlog VALUES("292","2","Event Updated","2021-10-04 22:36:13");
INSERT INTO adminlog VALUES("293","2","Event Updated","2021-10-04 22:36:16");
INSERT INTO adminlog VALUES("294","2","Event Updated","2021-10-04 22:36:21");
INSERT INTO adminlog VALUES("295","2","login","2021-10-05 10:39:26");
INSERT INTO adminlog VALUES("296","2","events deleted","2021-10-05 10:40:21");
INSERT INTO adminlog VALUES("297","2","events deleted","2021-10-05 10:40:25");
INSERT INTO adminlog VALUES("298","2","Event Updated","2021-10-05 10:47:14");
INSERT INTO adminlog VALUES("299","2","Event Updated","2021-10-05 10:47:16");
INSERT INTO adminlog VALUES("300","2","Event Updated","2021-10-05 10:47:59");
INSERT INTO adminlog VALUES("301","2","Event Updated","2021-10-05 10:48:13");
INSERT INTO adminlog VALUES("302","2","events deleted","2021-10-05 10:48:29");
INSERT INTO adminlog VALUES("303","2","events deleted","2021-10-05 10:48:32");
INSERT INTO adminlog VALUES("304","2","Event Updated","2021-10-05 10:58:31");
INSERT INTO adminlog VALUES("305","2","Event Updated","2021-10-05 11:01:45");
INSERT INTO adminlog VALUES("306","2","publication Updated","2021-10-05 12:29:20");
INSERT INTO adminlog VALUES("307","2","publication Updated","2021-10-05 12:29:32");
INSERT INTO adminlog VALUES("308","2","publication Updated","2021-10-05 12:58:03");
INSERT INTO adminlog VALUES("309","2","publication Updated","2021-10-05 12:58:19");
INSERT INTO adminlog VALUES("310","2","login","2021-10-05 14:57:42");
INSERT INTO adminlog VALUES("311","2","publication Updated","2021-10-05 16:11:18");
INSERT INTO adminlog VALUES("312","2","publication Updated","2021-10-05 16:19:25");
INSERT INTO adminlog VALUES("313","2","publication Updated","2021-10-05 16:22:13");
INSERT INTO adminlog VALUES("314","2","login","2021-10-05 18:39:38");
INSERT INTO adminlog VALUES("315","2","publication Updated","2021-10-05 18:40:26");
INSERT INTO adminlog VALUES("316","2","publication Updated","2021-10-05 18:41:01");
INSERT INTO adminlog VALUES("317","2","publication Updated","2021-10-05 18:41:18");
INSERT INTO adminlog VALUES("318","2","login","2021-10-05 21:41:22");
INSERT INTO adminlog VALUES("319","2","login","2021-10-05 16:52:16");
INSERT INTO adminlog VALUES("320","2","login","2021-10-06 03:16:10");
INSERT INTO adminlog VALUES("321","2","publication Updated","2021-10-06 03:18:54");
INSERT INTO adminlog VALUES("322","2","publication Updated","2021-10-06 03:19:16");
INSERT INTO adminlog VALUES("323","2","publication Updated","2021-10-06 03:19:23");
INSERT INTO adminlog VALUES("324","2","publication Updated","2021-10-06 03:19:30");
INSERT INTO adminlog VALUES("325","2","publication Updated","2021-10-06 03:19:38");
INSERT INTO adminlog VALUES("326","2","publication Updated","2021-10-06 03:19:56");
INSERT INTO adminlog VALUES("327","2","research Updated","2021-10-06 03:20:37");
INSERT INTO adminlog VALUES("328","2","research Updated","2021-10-06 03:21:31");
INSERT INTO adminlog VALUES("329","2","research Updated","2021-10-06 03:21:42");
INSERT INTO adminlog VALUES("330","2","research Updated","2021-10-06 03:21:52");
INSERT INTO adminlog VALUES("331","2","research Updated","2021-10-06 03:22:01");
INSERT INTO adminlog VALUES("332","2","research Updated","2021-10-06 03:22:14");
INSERT INTO adminlog VALUES("333","2","research Updated","2021-10-06 03:22:23");
INSERT INTO adminlog VALUES("334","2","research Updated","2021-10-06 03:22:29");
INSERT INTO adminlog VALUES("335","2","login","2021-10-06 04:11:44");
INSERT INTO adminlog VALUES("336","2","login","2021-10-06 04:43:03");
INSERT INTO adminlog VALUES("337","2","login","2021-10-06 05:09:15");
INSERT INTO adminlog VALUES("338","2","login","2021-10-06 05:13:59");
INSERT INTO adminlog VALUES("339","2","login","2021-10-06 05:27:12");
INSERT INTO adminlog VALUES("340","2","login","2021-10-06 05:54:09");
INSERT INTO adminlog VALUES("341","2","research Updated","2021-10-06 06:07:16");
INSERT INTO adminlog VALUES("342","2","research Updated","2021-10-06 06:08:25");
INSERT INTO adminlog VALUES("343","2","research Updated","2021-10-06 06:09:40");
INSERT INTO adminlog VALUES("344","2","research Updated","2021-10-06 06:10:58");
INSERT INTO adminlog VALUES("345","2","research Updated","2021-10-06 06:11:17");
INSERT INTO adminlog VALUES("346","2","login","2021-10-06 06:23:22");
INSERT INTO adminlog VALUES("347","2","research Updated","2021-10-06 06:25:21");
INSERT INTO adminlog VALUES("348","2","login","2021-10-06 06:33:08");
INSERT INTO adminlog VALUES("349","2","login","2021-10-06 07:00:07");
INSERT INTO adminlog VALUES("350","2","login","2021-10-06 07:02:11");
INSERT INTO adminlog VALUES("351","2","login","2021-10-06 07:07:57");
INSERT INTO adminlog VALUES("352","2","publication Updated","2021-10-06 07:23:49");
INSERT INTO adminlog VALUES("353","2","publication Updated","2021-10-06 07:24:32");
INSERT INTO adminlog VALUES("354","2","publication Updated","2021-10-06 07:25:30");
INSERT INTO adminlog VALUES("355","2","publication Updated","2021-10-06 07:36:52");
INSERT INTO adminlog VALUES("356","2","login","2021-10-06 08:00:49");
INSERT INTO adminlog VALUES("357","2","login","2021-10-06 08:27:27");
INSERT INTO adminlog VALUES("358","2","publication Updated","2021-10-06 08:57:37");
INSERT INTO adminlog VALUES("359","2","login","2021-10-06 09:09:30");
INSERT INTO adminlog VALUES("360","2","publication Updated","2021-10-06 09:09:57");
INSERT INTO adminlog VALUES("361","2","login","2021-10-06 09:14:06");
INSERT INTO adminlog VALUES("362","2","login","2021-10-06 12:25:46");
INSERT INTO adminlog VALUES("363","2","publication Updated","2021-10-06 12:26:53");
INSERT INTO adminlog VALUES("364","2","publication Updated","2021-10-06 12:27:18");
INSERT INTO adminlog VALUES("365","2","publication Updated","2021-10-06 12:27:48");
INSERT INTO adminlog VALUES("366","2","publication Updated","2021-10-06 12:38:51");
INSERT INTO adminlog VALUES("367","2","login","2021-10-06 12:55:29");
INSERT INTO adminlog VALUES("368","2","login","2021-10-06 13:12:13");
INSERT INTO adminlog VALUES("369","2","publication deleted","2021-10-06 13:17:26");
INSERT INTO adminlog VALUES("370","2","login","2021-10-06 13:22:01");
INSERT INTO adminlog VALUES("371","2","publication deleted","2021-10-06 13:22:21");
INSERT INTO adminlog VALUES("372","2","publication Updated","2021-10-06 13:27:01");
INSERT INTO adminlog VALUES("373","2","publication Updated","2021-10-06 13:32:15");
INSERT INTO adminlog VALUES("374","2","publication Updated","2021-10-06 13:34:46");
INSERT INTO adminlog VALUES("375","2","publication Updated","2021-10-06 13:44:19");
INSERT INTO adminlog VALUES("376","2","login","2021-10-06 13:54:57");
INSERT INTO adminlog VALUES("377","2","login","2021-10-06 14:58:19");
INSERT INTO adminlog VALUES("378","2","publication Updated","2021-10-06 15:03:29");
INSERT INTO adminlog VALUES("379","2","login","2021-10-06 15:44:10");
INSERT INTO adminlog VALUES("380","2","login","2021-10-06 17:08:05");
INSERT INTO adminlog VALUES("381","2","research Updated","2021-10-06 17:36:52");
INSERT INTO adminlog VALUES("382","2","login","2021-10-06 19:29:32");
INSERT INTO adminlog VALUES("383","2","research Updated","2021-10-06 19:31:25");
INSERT INTO adminlog VALUES("384","2","login","2021-10-06 19:40:23");
INSERT INTO adminlog VALUES("385","2","login","2021-10-08 04:11:51");
INSERT INTO adminlog VALUES("386","2","login","2021-10-08 07:53:36");
INSERT INTO adminlog VALUES("387","2","login","2021-10-10 06:16:02");
INSERT INTO adminlog VALUES("388","2","login","2021-10-10 06:31:40");
INSERT INTO adminlog VALUES("389","2","login","2021-10-10 06:44:38");
INSERT INTO adminlog VALUES("390","2","login","2021-10-10 07:25:07");
INSERT INTO adminlog VALUES("391","2","news Updated","2021-10-10 07:46:40");
INSERT INTO adminlog VALUES("392","2","login","2021-10-10 07:51:43");
INSERT INTO adminlog VALUES("393","2","news Updated","2021-10-10 08:01:06");
INSERT INTO adminlog VALUES("394","2","news Updated","2021-10-10 08:09:32");
INSERT INTO adminlog VALUES("395","2","login","2021-10-10 10:36:48");
INSERT INTO adminlog VALUES("396","2","login","2021-10-12 08:53:05");
INSERT INTO adminlog VALUES("397","2","login","2021-10-20 22:33:45");
INSERT INTO adminlog VALUES("398","2","login","2021-10-21 00:11:48");
INSERT INTO adminlog VALUES("399","2","Review deleted","2021-10-21 00:34:16");
INSERT INTO adminlog VALUES("400","2","Review deleted","2021-10-21 00:36:08");
INSERT INTO adminlog VALUES("401","2","Review deleted","2021-10-21 00:36:11");
INSERT INTO adminlog VALUES("402","2","Review deleted","2021-10-21 00:36:57");
INSERT INTO adminlog VALUES("403","2","Review deleted","2021-10-21 00:37:19");
INSERT INTO adminlog VALUES("404","2","Review deleted","2021-10-21 00:41:21");
INSERT INTO adminlog VALUES("405","2","Review deleted","2021-10-21 00:42:42");
INSERT INTO adminlog VALUES("406","2","login","2021-10-21 05:51:31");
INSERT INTO adminlog VALUES("407","2","Author Updated","2021-10-21 06:11:09");
INSERT INTO adminlog VALUES("408","2","Author Updated","2021-10-21 06:21:24");
INSERT INTO adminlog VALUES("409","2","Author Updated","2021-10-21 06:22:08");
INSERT INTO adminlog VALUES("410","2","Author Updated","2021-10-21 06:22:14");
INSERT INTO adminlog VALUES("411","2","Author Updated","2021-10-21 06:22:19");
INSERT INTO adminlog VALUES("412","2","Author Updated","2021-10-21 06:23:15");
INSERT INTO adminlog VALUES("413","2","Author Updated","2021-10-21 06:23:20");
INSERT INTO adminlog VALUES("414","2","publication Updated","2021-10-21 06:28:39");
INSERT INTO adminlog VALUES("415","2","publication Updated","2021-10-21 06:31:51");
INSERT INTO adminlog VALUES("416","2","research Updated","2021-10-21 06:34:16");
INSERT INTO adminlog VALUES("417","2","login","2021-10-21 08:48:18");
INSERT INTO adminlog VALUES("418","2","Setting Updated","2021-10-21 08:54:34");
INSERT INTO adminlog VALUES("419","2","Setting Updated","2021-10-21 08:54:40");
INSERT INTO adminlog VALUES("420","2","Setting Updated","2021-10-21 08:55:02");
INSERT INTO adminlog VALUES("421","2","Setting Updated","2021-10-21 08:55:05");
INSERT INTO adminlog VALUES("422","2","login","2021-10-21 09:50:23");
INSERT INTO adminlog VALUES("423","2","Setting Updated","2021-10-21 09:53:31");
INSERT INTO adminlog VALUES("424","2","Setting Updated","2021-10-21 10:14:04");
INSERT INTO adminlog VALUES("425","2","Setting Updated","2021-10-21 10:18:38");
INSERT INTO adminlog VALUES("426","2","Setting Updated","2021-10-21 10:18:51");
INSERT INTO adminlog VALUES("427","2","Setting Updated","2021-10-21 10:40:06");
INSERT INTO adminlog VALUES("428","2","Setting Updated","2021-10-21 10:46:41");
INSERT INTO adminlog VALUES("429","2","Setting Updated","2021-10-21 10:47:55");
INSERT INTO adminlog VALUES("430","2","Setting Updated","2021-10-21 10:48:34");
INSERT INTO adminlog VALUES("431","2","login","2021-11-15 11:13:04");
INSERT INTO adminlog VALUES("432","2","login","2021-11-15 23:12:59");
INSERT INTO adminlog VALUES("433","2","Event Updated","2021-11-15 23:27:04");
INSERT INTO adminlog VALUES("434","2","Event Updated","2021-11-15 23:27:28");
INSERT INTO adminlog VALUES("435","2","Event Updated","2021-11-15 23:35:30");
INSERT INTO adminlog VALUES("436","2","Event Updated","2021-11-15 23:35:35");
INSERT INTO adminlog VALUES("437","2","login","2021-11-17 10:01:19");
INSERT INTO adminlog VALUES("438","2","login","2021-11-17 21:09:36");
INSERT INTO adminlog VALUES("439","2","login","2021-11-20 15:03:32");
INSERT INTO adminlog VALUES("440","2","publication Updated","2021-11-20 15:07:52");
INSERT INTO adminlog VALUES("441","2","publication Updated","2021-11-20 15:10:26");
INSERT INTO adminlog VALUES("442","2","publication Updated","2021-11-20 15:11:35");
INSERT INTO adminlog VALUES("443","2","publication Updated","2021-11-20 15:12:28");
INSERT INTO adminlog VALUES("444","2","publication Updated","2021-11-20 15:14:08");
INSERT INTO adminlog VALUES("445","2","publication Updated","2021-11-20 15:22:06");
INSERT INTO adminlog VALUES("446","2","publication Updated","2021-11-20 15:22:44");
INSERT INTO adminlog VALUES("447","2","publication Updated","2021-11-20 15:24:45");
INSERT INTO adminlog VALUES("448","2","publication Updated","2021-11-20 15:26:52");
INSERT INTO adminlog VALUES("449","2","login","2021-11-20 15:58:43");
INSERT INTO adminlog VALUES("450","2","category deleted","2021-11-20 16:04:35");
INSERT INTO adminlog VALUES("451","2","login","2021-11-20 17:54:32");
INSERT INTO adminlog VALUES("452","2","publication Updated","2021-11-20 18:02:38");
INSERT INTO adminlog VALUES("453","2","publication Updated","2021-11-20 18:03:00");
INSERT INTO adminlog VALUES("454","2","publication Updated","2021-11-20 18:03:31");
INSERT INTO adminlog VALUES("455","2","publication Updated","2021-11-20 18:03:55");
INSERT INTO adminlog VALUES("456","2","user deleted","2021-11-20 18:34:29");
INSERT INTO adminlog VALUES("457","2","user deleted","2021-11-20 18:34:42");
INSERT INTO adminlog VALUES("458","2","login","2021-11-21 09:57:35");
INSERT INTO adminlog VALUES("459","2","publication Updated","2021-11-21 10:30:21");
INSERT INTO adminlog VALUES("460","2","publication Updated","2021-11-21 10:30:59");
INSERT INTO adminlog VALUES("461","2","publication Updated","2021-11-21 10:41:00");
INSERT INTO adminlog VALUES("462","2","research Updated","2021-11-21 11:01:23");
INSERT INTO adminlog VALUES("463","2","login","2021-11-21 12:54:48");
INSERT INTO adminlog VALUES("464","2","publication Updated","2021-11-21 13:12:32");
INSERT INTO adminlog VALUES("465","2","publication Updated","2021-11-21 13:12:53");
INSERT INTO adminlog VALUES("466","2","publication Updated","2021-11-21 13:13:41");
INSERT INTO adminlog VALUES("467","2","publication Updated","2021-11-21 13:13:54");
INSERT INTO adminlog VALUES("468","2","publication Updated","2021-11-21 13:14:11");
INSERT INTO adminlog VALUES("469","2","login","2021-11-23 10:05:10");
INSERT INTO adminlog VALUES("470","2","login","2021-11-23 11:01:00");
INSERT INTO adminlog VALUES("471","2","Event Updated","2021-11-23 11:03:46");
INSERT INTO adminlog VALUES("472","2","Event Updated","2021-11-23 11:04:39");
INSERT INTO adminlog VALUES("473","2","Event Updated","2021-11-23 11:15:13");
INSERT INTO adminlog VALUES("474","2","Event Updated","2021-11-23 11:20:24");
INSERT INTO adminlog VALUES("475","2","Event Updated","2021-11-23 11:20:49");
INSERT INTO adminlog VALUES("476","2","Event Updated","2021-11-23 11:27:26");
INSERT INTO adminlog VALUES("477","2","login","2021-11-24 14:38:31");
INSERT INTO adminlog VALUES("478","2","login","2021-12-05 10:33:11");
INSERT INTO adminlog VALUES("479","2","login","2021-12-11 09:57:00");
INSERT INTO adminlog VALUES("480","2","login","2022-01-01 22:37:50");
INSERT INTO adminlog VALUES("481","2","category deleted","2022-01-01 22:45:16");
INSERT INTO adminlog VALUES("482","2","Category Updated","2022-01-01 22:45:24");
INSERT INTO adminlog VALUES("483","2","category deleted","2022-01-01 22:45:40");
INSERT INTO adminlog VALUES("484","2","login","2022-01-03 21:26:23");
INSERT INTO adminlog VALUES("485","2","problems Updated","2022-01-03 21:27:34");
INSERT INTO adminlog VALUES("486","2","lable deleted","2022-01-03 21:36:30");
INSERT INTO adminlog VALUES("487","2","problems Updated","2022-01-03 21:36:40");
INSERT INTO adminlog VALUES("488","2","problems Updated","2022-01-03 21:36:57");
INSERT INTO adminlog VALUES("489","2","login","2022-01-13 17:46:13");
INSERT INTO adminlog VALUES("490","2","offers deleted","2022-01-13 18:32:10");
INSERT INTO adminlog VALUES("491","2","offers Updated","2022-01-13 18:39:03");
INSERT INTO adminlog VALUES("492","2","offers Updated","2022-01-13 18:39:30");
INSERT INTO adminlog VALUES("493","2","offers Updated","2022-01-13 18:39:43");
INSERT INTO adminlog VALUES("494","2","offers Updated","2022-01-13 18:41:38");
INSERT INTO adminlog VALUES("495","2","offers Updated","2022-01-13 18:42:14");
INSERT INTO adminlog VALUES("496","2","login","2022-01-14 11:27:04");
INSERT INTO adminlog VALUES("497","2","offers Updated","2022-01-14 12:01:45");
INSERT INTO adminlog VALUES("498","2","login","2022-01-17 11:46:33");
INSERT INTO adminlog VALUES("499","2","offers Updated","2022-01-17 11:48:03");
INSERT INTO adminlog VALUES("500","2","login","2022-01-17 23:04:40");
INSERT INTO adminlog VALUES("501","2","Category Updated","2022-01-17 23:05:25");
INSERT INTO adminlog VALUES("502","2","Category Updated","2022-01-17 23:05:52");
INSERT INTO adminlog VALUES("503","2","Category Updated","2022-01-17 23:06:26");
INSERT INTO adminlog VALUES("504","2","Category Updated","2022-01-17 23:06:56");
INSERT INTO adminlog VALUES("505","2","Category Updated","2022-01-17 23:07:15");
INSERT INTO adminlog VALUES("506","2","Category Updated","2022-01-17 23:07:34");
INSERT INTO adminlog VALUES("507","2","Category Updated","2022-01-17 23:07:55");
INSERT INTO adminlog VALUES("508","2","Category Updated","2022-01-17 23:08:18");
INSERT INTO adminlog VALUES("509","2","login","2022-01-18 11:54:46");
INSERT INTO adminlog VALUES("510","2","offers Updated","2022-01-18 11:57:03");
INSERT INTO adminlog VALUES("511","2","offers Updated","2022-01-18 11:57:21");
INSERT INTO adminlog VALUES("512","2","login","2022-01-18 13:12:46");
INSERT INTO adminlog VALUES("513","2","login","2022-01-18 18:07:29");
INSERT INTO adminlog VALUES("514","2","login","2022-01-19 15:49:24");
INSERT INTO adminlog VALUES("515","2","problems Updated","2022-01-19 15:53:37");
INSERT INTO adminlog VALUES("516","2","lable deleted","2022-01-19 15:53:44");
INSERT INTO adminlog VALUES("517","2","problems Updated","2022-01-19 15:53:53");
INSERT INTO adminlog VALUES("518","2","problems Updated","2022-01-19 15:54:05");
INSERT INTO adminlog VALUES("519","2","problems Updated","2022-01-19 15:54:11");
INSERT INTO adminlog VALUES("520","2","problems Updated","2022-01-19 15:54:18");
INSERT INTO adminlog VALUES("521","2","problems Updated","2022-01-19 15:54:30");
INSERT INTO adminlog VALUES("522","2","problems Updated","2022-01-19 16:09:23");
INSERT INTO adminlog VALUES("523","2","problems Updated","2022-01-19 16:09:34");
INSERT INTO adminlog VALUES("524","2","problems Updated","2022-01-19 16:09:49");
INSERT INTO adminlog VALUES("525","2","problems Updated","2022-01-19 16:10:13");
INSERT INTO adminlog VALUES("526","2","login","2022-01-21 09:25:54");
INSERT INTO adminlog VALUES("527","2","login","2022-01-21 09:53:35");
INSERT INTO adminlog VALUES("528","2","login","2022-01-28 12:30:41");
INSERT INTO adminlog VALUES("529","2","offers Updated","2022-01-28 12:53:28");
INSERT INTO adminlog VALUES("530","2","offers Updated","2022-01-28 12:56:00");
INSERT INTO adminlog VALUES("531","2","offers Updated","2022-01-28 12:57:21");
INSERT INTO adminlog VALUES("532","2","login","2022-01-28 19:39:34");
INSERT INTO adminlog VALUES("533","2","Package Added","2022-01-28 19:48:31");
INSERT INTO adminlog VALUES("534","2","Package Updated","2022-01-28 19:49:45");
INSERT INTO adminlog VALUES("535","2","Package deleted","2022-01-28 19:49:52");
INSERT INTO adminlog VALUES("536","2","Package Added","2022-01-28 19:55:19");
INSERT INTO adminlog VALUES("537","2","Package Added","2022-01-28 19:55:45");
INSERT INTO adminlog VALUES("538","2","Package deleted","2022-01-28 19:55:52");
INSERT INTO adminlog VALUES("539","2","Package Updated","2022-01-28 19:56:41");
INSERT INTO adminlog VALUES("540","2","Package Updated","2022-01-28 19:56:49");
INSERT INTO adminlog VALUES("541","2","Package deleted","2022-01-28 19:57:01");
INSERT INTO adminlog VALUES("542","2","Package Updated","2022-01-28 19:59:02");
INSERT INTO adminlog VALUES("543","2","Package Updated","2022-01-28 19:59:16");
INSERT INTO adminlog VALUES("544","2","offers Updated","2022-01-28 20:08:47");
INSERT INTO adminlog VALUES("545","2","offers Updated","2022-01-28 20:09:34");
INSERT INTO adminlog VALUES("546","2","login","2022-01-30 10:04:13");
INSERT INTO adminlog VALUES("547","2","offers Updated","2022-01-30 10:04:40");
INSERT INTO adminlog VALUES("548","2","login","2022-01-31 23:45:06");
INSERT INTO adminlog VALUES("549","2","login","2022-03-17 08:09:23");
INSERT INTO adminlog VALUES("550","2","login","2022-03-17 17:58:15");
INSERT INTO adminlog VALUES("551","2","Category Updated","2022-03-17 18:18:53");
INSERT INTO adminlog VALUES("552","2","Category Updated","2022-03-17 19:27:53");
INSERT INTO adminlog VALUES("553","2","deleted","2022-03-17 19:36:56");
INSERT INTO adminlog VALUES("554","2","deleted","2022-03-17 19:37:48");
INSERT INTO adminlog VALUES("555","2","login","2022-03-18 18:18:57");
INSERT INTO adminlog VALUES("556","2","login","2022-03-19 11:21:33");
INSERT INTO adminlog VALUES("557","2","Banner deleted","2022-03-19 11:49:15");
INSERT INTO adminlog VALUES("558","2","Banner deleted","2022-03-19 11:49:59");
INSERT INTO adminlog VALUES("559","2","login","2022-03-20 11:14:17");
INSERT INTO adminlog VALUES("560","2","login","2022-03-23 15:26:00");
INSERT INTO adminlog VALUES("561","2","Category Updated","2022-03-23 15:28:14");
INSERT INTO adminlog VALUES("562","2","login","2022-03-26 08:04:14");
INSERT INTO adminlog VALUES("563","2","login","2022-03-26 12:00:45");
INSERT INTO adminlog VALUES("564","2","login","2022-03-28 09:04:05");
INSERT INTO adminlog VALUES("565","2","User Updated","2022-03-28 10:00:00");
INSERT INTO adminlog VALUES("566","2","login","2022-03-29 19:43:54");
INSERT INTO adminlog VALUES("567","2","login","2022-04-12 23:59:46");
INSERT INTO adminlog VALUES("568","2","login","2022-04-18 23:30:29");
INSERT INTO adminlog VALUES("569","2","login","2022-04-18 23:38:06");
INSERT INTO adminlog VALUES("570","2","login","2022-04-19 14:10:52");
INSERT INTO adminlog VALUES("571","2","Filter Updated","2022-04-19 14:12:40");
INSERT INTO adminlog VALUES("572","2","login","2022-04-19 23:29:37");
INSERT INTO adminlog VALUES("573","2","login","2022-04-19 23:51:29");
INSERT INTO adminlog VALUES("574","2","Category Updated","2022-04-20 00:05:49");
INSERT INTO adminlog VALUES("575","2","Category Updated","2022-04-20 00:08:01");
INSERT INTO adminlog VALUES("576","2","Category Updated","2022-04-20 00:08:28");
INSERT INTO adminlog VALUES("577","2","Category Updated","2022-04-20 00:08:40");
INSERT INTO adminlog VALUES("578","2","Category Updated","2022-04-20 00:09:35");
INSERT INTO adminlog VALUES("579","2","login","2022-04-20 00:21:18");
INSERT INTO adminlog VALUES("580","2","deleted","2022-04-20 00:35:08");
INSERT INTO adminlog VALUES("581","2","deleted","2022-04-20 00:35:27");
INSERT INTO adminlog VALUES("582","2","Filter Added","2022-04-20 00:46:37");
INSERT INTO adminlog VALUES("583","2","Filter Added","2022-04-20 00:47:16");
INSERT INTO adminlog VALUES("584","2","Filter Added","2022-04-20 00:48:05");
INSERT INTO adminlog VALUES("585","2","Filter Added","2022-04-20 00:48:47");
INSERT INTO adminlog VALUES("586","2","Filter Added","2022-04-20 00:49:20");
INSERT INTO adminlog VALUES("587","2","Filter Added","2022-04-20 00:49:47");
INSERT INTO adminlog VALUES("588","2","Filter Added","2022-04-20 00:50:15");
INSERT INTO adminlog VALUES("589","2","Filter Added","2022-04-20 00:50:58");
INSERT INTO adminlog VALUES("590","2","Filter Added","2022-04-20 00:51:51");
INSERT INTO adminlog VALUES("591","2","Filter Added","2022-04-20 00:52:37");
INSERT INTO adminlog VALUES("592","2","Filter Added","2022-04-20 00:53:17");
INSERT INTO adminlog VALUES("593","2","Filter Added","2022-04-20 00:54:21");
INSERT INTO adminlog VALUES("594","2","Filter Added","2022-04-20 00:55:16");
INSERT INTO adminlog VALUES("595","2","Filter Added","2022-04-20 00:55:31");
INSERT INTO adminlog VALUES("596","2","Filter Added","2022-04-20 00:55:54");
INSERT INTO adminlog VALUES("597","2","Filter Added","2022-04-20 00:56:10");
INSERT INTO adminlog VALUES("598","2","Filter Added","2022-04-20 00:58:52");
INSERT INTO adminlog VALUES("599","2","Filter Added","2022-04-20 00:59:55");
INSERT INTO adminlog VALUES("600","2","Filter Added","2022-04-20 01:00:32");
INSERT INTO adminlog VALUES("601","2","Filter Added","2022-04-20 01:01:02");
INSERT INTO adminlog VALUES("602","2","Filter Added","2022-04-20 01:01:32");
INSERT INTO adminlog VALUES("603","2","Filter Added","2022-04-20 01:02:10");
INSERT INTO adminlog VALUES("604","2","login","2022-04-20 01:06:41");
INSERT INTO adminlog VALUES("605","2","Filter Added","2022-04-20 01:10:24");
INSERT INTO adminlog VALUES("606","2","Filter Added","2022-04-20 01:10:53");
INSERT INTO adminlog VALUES("607","2","Filter Added","2022-04-20 01:11:21");
INSERT INTO adminlog VALUES("608","2","Filter Added","2022-04-20 01:11:42");
INSERT INTO adminlog VALUES("609","2","Filter Added","2022-04-20 01:11:57");
INSERT INTO adminlog VALUES("610","2","Filter Added","2022-04-20 01:14:14");
INSERT INTO adminlog VALUES("611","2","login","2022-04-20 01:16:35");
INSERT INTO adminlog VALUES("612","2","Filter Added","2022-04-20 01:20:41");
INSERT INTO adminlog VALUES("613","2","Filter Added","2022-04-20 01:20:53");
INSERT INTO adminlog VALUES("614","2","Filter Added","2022-04-20 01:21:08");
INSERT INTO adminlog VALUES("615","2","Filter Added","2022-04-20 01:21:55");
INSERT INTO adminlog VALUES("616","2","Filter Added","2022-04-20 01:22:17");
INSERT INTO adminlog VALUES("617","2","Filter Updated","2022-04-20 01:23:11");
INSERT INTO adminlog VALUES("618","2","Filter Updated","2022-04-20 01:23:27");
INSERT INTO adminlog VALUES("619","2","Filter Updated","2022-04-20 01:23:43");
INSERT INTO adminlog VALUES("620","2","Filter Added","2022-04-20 01:23:58");
INSERT INTO adminlog VALUES("621","2","Filter Added","2022-04-20 01:24:08");
INSERT INTO adminlog VALUES("622","2","Filter Added","2022-04-20 01:24:59");
INSERT INTO adminlog VALUES("623","2","Filter Added","2022-04-20 01:25:30");
INSERT INTO adminlog VALUES("624","2","Filter Added","2022-04-20 01:25:45");
INSERT INTO adminlog VALUES("625","2","Filter Added","2022-04-20 01:25:58");
INSERT INTO adminlog VALUES("626","2","Filter Added","2022-04-20 01:26:12");
INSERT INTO adminlog VALUES("627","2","login","2022-04-20 10:28:29");
INSERT INTO adminlog VALUES("628","2","login","2022-04-20 15:17:47");
INSERT INTO adminlog VALUES("629","2","Category Updated","2022-04-20 15:34:49");
INSERT INTO adminlog VALUES("630","2","login","2022-04-21 08:52:40");
INSERT INTO adminlog VALUES("631","2","Banner Added","2022-04-21 08:53:55");
INSERT INTO adminlog VALUES("632","2","Banner Added","2022-04-21 08:54:05");
INSERT INTO adminlog VALUES("633","2","Banner Added","2022-04-21 08:55:30");
INSERT INTO adminlog VALUES("634","2","Banner Added","2022-04-21 08:55:57");
INSERT INTO adminlog VALUES("635","2","Banner Added","2022-04-21 08:56:07");
INSERT INTO adminlog VALUES("636","2","login","2022-04-21 14:18:09");
INSERT INTO adminlog VALUES("637","2","Ad Added","2022-04-21 15:06:31");
INSERT INTO adminlog VALUES("638","2","Ad Added","2022-04-21 15:06:51");
INSERT INTO adminlog VALUES("639","2","Ad Added","2022-04-21 15:07:18");
INSERT INTO adminlog VALUES("640","2","Ad Added","2022-04-21 15:07:42");
INSERT INTO adminlog VALUES("641","2","Ad Added","2022-04-21 15:08:09");
INSERT INTO adminlog VALUES("642","2","Ad Added","2022-04-21 15:08:26");
INSERT INTO adminlog VALUES("643","2","login","2022-04-21 18:33:24");
INSERT INTO adminlog VALUES("644","2","Ad Added","2022-04-21 18:34:38");
INSERT INTO adminlog VALUES("645","2","Ad Added","2022-04-21 18:34:55");
INSERT INTO adminlog VALUES("646","2","Ad Added","2022-04-21 18:35:14");
INSERT INTO adminlog VALUES("647","2","Ad Added","2022-04-21 18:35:31");
INSERT INTO adminlog VALUES("648","2","Ad Added","2022-04-21 18:35:50");
INSERT INTO adminlog VALUES("649","2","Ad Added","2022-04-21 18:36:14");
INSERT INTO adminlog VALUES("650","2","Ad Added","2022-04-21 23:24:53");
INSERT INTO adminlog VALUES("651","2","Ad Added","2022-04-21 23:25:05");
INSERT INTO adminlog VALUES("652","2","Ad Added","2022-04-21 23:25:16");
INSERT INTO adminlog VALUES("653","2","Ad Added","2022-04-21 23:25:29");
INSERT INTO adminlog VALUES("654","2","Ad Added","2022-04-21 23:25:40");
INSERT INTO adminlog VALUES("655","2","Ad Added","2022-04-21 23:33:04");
INSERT INTO adminlog VALUES("656","2","Ad Added","2022-04-21 23:33:19");
INSERT INTO adminlog VALUES("657","2","Ad Added","2022-04-21 23:34:01");
INSERT INTO adminlog VALUES("658","2","Ad Added","2022-04-21 23:34:11");
INSERT INTO adminlog VALUES("659","2","Ad Added","2022-04-21 23:34:23");
INSERT INTO adminlog VALUES("660","2","Ad Added","2022-04-21 23:37:14");
INSERT INTO adminlog VALUES("661","2","Ad Added","2022-04-21 23:37:22");
INSERT INTO adminlog VALUES("662","2","Ad Added","2022-04-21 23:37:29");
INSERT INTO adminlog VALUES("663","2","Ad Added","2022-04-21 23:37:36");
INSERT INTO adminlog VALUES("664","2","Ad Added","2022-04-21 23:39:52");
INSERT INTO adminlog VALUES("665","2","Ad Added","2022-04-21 23:39:59");
INSERT INTO adminlog VALUES("666","2","Ad Added","2022-04-21 23:40:07");
INSERT INTO adminlog VALUES("667","2","Ad Added","2022-04-21 23:40:15");
INSERT INTO adminlog VALUES("668","2","Ad Added","2022-04-21 23:40:24");
INSERT INTO adminlog VALUES("669","2","login","2022-04-26 00:05:49");
INSERT INTO adminlog VALUES("670","2","login","2022-04-27 07:50:03");
INSERT INTO adminlog VALUES("671","2","  deleted","2022-04-27 07:51:54");
INSERT INTO adminlog VALUES("672","2","  deleted","2022-04-27 07:51:57");
INSERT INTO adminlog VALUES("673","2","  deleted","2022-04-27 07:52:00");
INSERT INTO adminlog VALUES("674","2","  deleted","2022-04-27 07:52:03");
INSERT INTO adminlog VALUES("675","2","  deleted","2022-04-27 07:52:05");
INSERT INTO adminlog VALUES("676","2","Filter Added","2022-04-27 08:24:24");
INSERT INTO adminlog VALUES("677","2","Filter Added","2022-04-27 08:24:52");
INSERT INTO adminlog VALUES("678","2","Filter Added","2022-04-27 08:25:29");
INSERT INTO adminlog VALUES("679","2","Filter Added","2022-04-27 08:25:50");
INSERT INTO adminlog VALUES("680","2","Filter Added","2022-04-27 08:26:09");
INSERT INTO adminlog VALUES("681","2","Filter Added","2022-04-27 08:26:39");
INSERT INTO adminlog VALUES("682","2","login","2022-04-27 13:59:33");
INSERT INTO adminlog VALUES("683","2","login","2022-04-27 23:22:15");
INSERT INTO adminlog VALUES("684","2","login","2022-04-29 13:21:08");
INSERT INTO adminlog VALUES("685","2","login","2022-04-30 10:27:50");
INSERT INTO adminlog VALUES("686","2","login","2022-05-02 07:06:59");
INSERT INTO adminlog VALUES("687","2","Category Updated","2022-05-02 07:21:35");
INSERT INTO adminlog VALUES("688","2","Category Updated","2022-05-02 07:21:48");
INSERT INTO adminlog VALUES("689","2","Category Updated","2022-05-02 07:22:02");
INSERT INTO adminlog VALUES("690","2","Category Updated","2022-05-02 07:22:42");
INSERT INTO adminlog VALUES("691","2","Category Updated","2022-05-02 07:22:55");
INSERT INTO adminlog VALUES("692","2","Category Updated","2022-05-02 07:23:12");
INSERT INTO adminlog VALUES("693","2","Category Updated","2022-05-02 07:23:28");
INSERT INTO adminlog VALUES("694","2","Category Updated","2022-05-02 07:23:40");
INSERT INTO adminlog VALUES("695","2","Category Updated","2022-05-02 07:24:08");
INSERT INTO adminlog VALUES("696","2","login","2022-05-04 18:37:23");
INSERT INTO adminlog VALUES("697","2","login","2022-05-05 12:52:05");
INSERT INTO adminlog VALUES("698","2","login","2022-05-05 23:15:48");
INSERT INTO adminlog VALUES("699","2","login","2022-05-06 10:10:41");
INSERT INTO adminlog VALUES("700","2","login","2022-05-06 23:31:03");
INSERT INTO adminlog VALUES("701","2","login","2022-05-12 12:21:34");
INSERT INTO adminlog VALUES("702","2","login","2022-05-14 11:35:54");
INSERT INTO adminlog VALUES("703","2","login","2022-05-15 23:58:48");
INSERT INTO adminlog VALUES("704","2","login","2022-05-17 13:27:37");
INSERT INTO adminlog VALUES("705","2","login","2022-06-25 08:06:17");
INSERT INTO adminlog VALUES("706","2","login","2022-07-19 10:25:16");
INSERT INTO adminlog VALUES("707","2","login","2022-07-19 10:25:58");
INSERT INTO adminlog VALUES("708","2","login","2022-07-30 11:28:34");
INSERT INTO adminlog VALUES("709","2","login","2022-07-30 18:06:03");
INSERT INTO adminlog VALUES("710","2","login","2022-07-30 20:59:29");
INSERT INTO adminlog VALUES("711","2","Category Updated","2022-07-30 21:11:36");
INSERT INTO adminlog VALUES("712","2","Subcategory Updated","2022-07-30 22:08:24");
INSERT INTO adminlog VALUES("713","2","Filter Added","2022-07-30 22:39:19");
INSERT INTO adminlog VALUES("714","2","Filter Added","2022-07-30 22:40:31");
INSERT INTO adminlog VALUES("715","2","Filter Added","2022-07-30 22:41:13");
INSERT INTO adminlog VALUES("716","2","Filter Added","2022-07-30 22:41:40");
INSERT INTO adminlog VALUES("717","2","Filter Added","2022-07-30 22:42:13");
INSERT INTO adminlog VALUES("718","2","Filter Added","2022-07-30 22:42:30");
INSERT INTO adminlog VALUES("719","2","Filter Added","2022-07-30 22:43:00");
INSERT INTO adminlog VALUES("720","2","Filter Added","2022-07-30 22:43:28");
INSERT INTO adminlog VALUES("721","2","Filter Added","2022-07-30 22:43:50");
INSERT INTO adminlog VALUES("722","2","Filter Added","2022-07-30 22:44:11");
INSERT INTO adminlog VALUES("723","2","Filter Added","2022-07-30 22:44:35");
INSERT INTO adminlog VALUES("724","2","Filter Added","2022-07-30 22:44:52");
INSERT INTO adminlog VALUES("725","2","Filter Added","2022-07-30 22:45:04");
INSERT INTO adminlog VALUES("726","2","Filter Added","2022-07-30 22:45:15");
INSERT INTO adminlog VALUES("727","2","Filter Added","2022-07-30 22:45:23");
INSERT INTO adminlog VALUES("728","2","Filter Added","2022-07-30 22:45:30");
INSERT INTO adminlog VALUES("729","2","Filter Added","2022-07-30 22:45:47");
INSERT INTO adminlog VALUES("730","2","Filter Added","2022-07-30 22:45:54");
INSERT INTO adminlog VALUES("731","2","Filter Added","2022-07-30 22:46:21");
INSERT INTO adminlog VALUES("732","2","Filter Added","2022-07-30 22:46:37");
INSERT INTO adminlog VALUES("733","2","Filter Added","2022-07-30 22:46:56");
INSERT INTO adminlog VALUES("734","2","Filter Added","2022-07-30 22:47:18");
INSERT INTO adminlog VALUES("735","2","Filter Added","2022-07-30 22:47:38");
INSERT INTO adminlog VALUES("736","2","Filter Updated","2022-07-30 22:48:10");
INSERT INTO adminlog VALUES("737","2","Filter Added","2022-07-30 22:48:21");
INSERT INTO adminlog VALUES("738","2","Filter Added","2022-07-30 22:48:37");
INSERT INTO adminlog VALUES("739","2","Filter Added","2022-07-30 22:49:06");
INSERT INTO adminlog VALUES("740","2","Filter Added","2022-07-30 22:49:15");
INSERT INTO adminlog VALUES("741","2","Filter Updated","2022-07-30 22:49:40");
INSERT INTO adminlog VALUES("742","2","Filter Added","2022-07-30 22:49:55");
INSERT INTO adminlog VALUES("743","2","Filter Added","2022-07-30 22:50:08");
INSERT INTO adminlog VALUES("744","2","Banner Added","2022-07-30 23:06:32");
INSERT INTO adminlog VALUES("745","2","Banner Added","2022-07-30 23:06:44");
INSERT INTO adminlog VALUES("746","2","Banner Added","2022-07-30 23:06:54");
INSERT INTO adminlog VALUES("747","2","Banner Added","2022-07-30 23:07:14");
INSERT INTO adminlog VALUES("748","2","Banner Added","2022-07-30 23:07:44");
INSERT INTO adminlog VALUES("749","2","login","2022-07-30 23:10:35");
INSERT INTO adminlog VALUES("750","2","login","2022-08-01 11:16:04");
INSERT INTO adminlog VALUES("751","2","Ad Added","2022-08-01 11:23:17");
INSERT INTO adminlog VALUES("752","2","Ad Added","2022-08-01 11:23:42");
INSERT INTO adminlog VALUES("753","2","Ad Added","2022-08-01 11:23:56");
INSERT INTO adminlog VALUES("754","2","Ad Added","2022-08-01 11:24:13");
INSERT INTO adminlog VALUES("755","2","Ad Added","2022-08-01 11:24:28");
INSERT INTO adminlog VALUES("756","2","Filter Added","2022-08-01 11:59:47");
INSERT INTO adminlog VALUES("757","2","Filter Added","2022-08-01 12:00:12");
INSERT INTO adminlog VALUES("758","2","Filter Added","2022-08-01 12:00:50");
INSERT INTO adminlog VALUES("759","2","Category Updated","2022-08-01 12:28:24");
INSERT INTO adminlog VALUES("760","2","Subcategory Updated","2022-08-01 12:29:42");
INSERT INTO adminlog VALUES("761","2","Subcategory Updated","2022-08-01 12:31:11");
INSERT INTO adminlog VALUES("762","2","Subcategory Updated","2022-08-01 12:32:00");
INSERT INTO adminlog VALUES("763","2","Subcategory Updated","2022-08-01 12:32:45");
INSERT INTO adminlog VALUES("764","2","Category Updated","2022-08-01 13:01:48");
INSERT INTO adminlog VALUES("765","2","category deleted","2022-08-01 13:06:26");
INSERT INTO adminlog VALUES("766","2","Subcategory Updated","2022-08-01 13:08:19");
INSERT INTO adminlog VALUES("767","2","Subcategory Updated","2022-08-01 13:09:03");
INSERT INTO adminlog VALUES("768","2","Subcategory Updated","2022-08-01 13:09:26");
INSERT INTO adminlog VALUES("769","2","Category Updated","2022-08-01 13:43:02");
INSERT INTO adminlog VALUES("770","2","Category Updated","2022-08-01 13:46:18");
INSERT INTO adminlog VALUES("771","2","Ad Added","2022-08-01 14:26:39");
INSERT INTO adminlog VALUES("772","2","Category Updated","2022-08-01 14:33:59");
INSERT INTO adminlog VALUES("773","2","Category Updated","2022-08-01 14:34:18");
INSERT INTO adminlog VALUES("774","2","Category Updated","2022-08-01 14:34:33");
INSERT INTO adminlog VALUES("775","2","Category Updated","2022-08-01 14:34:46");
INSERT INTO adminlog VALUES("776","2","login","2022-08-02 22:01:35");
INSERT INTO adminlog VALUES("777","2","Ad Added","2022-08-02 22:09:00");
INSERT INTO adminlog VALUES("778","2","Ad Added","2022-08-02 22:09:14");
INSERT INTO adminlog VALUES("779","2","Ad Added","2022-08-02 22:09:26");
INSERT INTO adminlog VALUES("780","2","Ad Added","2022-08-02 22:09:38");
INSERT INTO adminlog VALUES("781","2","Ad Added","2022-08-02 22:09:52");
INSERT INTO adminlog VALUES("782","2","Ad Added","2022-08-02 22:15:40");
INSERT INTO adminlog VALUES("783","2","Ad Added","2022-08-02 22:15:48");
INSERT INTO adminlog VALUES("784","2","Ad Added","2022-08-02 22:15:58");
INSERT INTO adminlog VALUES("785","2","Ad Added","2022-08-02 22:16:34");
INSERT INTO adminlog VALUES("786","2","Ad Added","2022-08-02 22:16:58");
INSERT INTO adminlog VALUES("787","2","Ad Added","2022-08-02 22:17:08");
INSERT INTO adminlog VALUES("788","2","Ad Added","2022-08-02 22:20:37");
INSERT INTO adminlog VALUES("789","2","Ad Added","2022-08-02 22:20:56");
INSERT INTO adminlog VALUES("790","2","Ad Added","2022-08-02 22:21:08");
INSERT INTO adminlog VALUES("791","2","Ad Added","2022-08-02 22:21:25");
INSERT INTO adminlog VALUES("792","2","Ad Added","2022-08-02 22:21:52");
INSERT INTO adminlog VALUES("793","2","Ad Added","2022-08-02 22:22:04");
INSERT INTO adminlog VALUES("794","2","Ad Added","2022-08-02 22:22:17");
INSERT INTO adminlog VALUES("795","2","Ad Added","2022-08-02 22:27:52");
INSERT INTO adminlog VALUES("796","2","Ad Added","2022-08-02 22:28:03");
INSERT INTO adminlog VALUES("797","2","Ad Added","2022-08-02 22:28:23");
INSERT INTO adminlog VALUES("798","2","Ad Added","2022-08-02 22:28:38");
INSERT INTO adminlog VALUES("799","2","Ad Added","2022-08-02 22:28:48");
INSERT INTO adminlog VALUES("800","2","Ad Added","2022-08-02 22:39:44");
INSERT INTO adminlog VALUES("801","2","Ad Added","2022-08-02 22:39:54");
INSERT INTO adminlog VALUES("802","2","Ad Added","2022-08-02 22:40:04");
INSERT INTO adminlog VALUES("803","2","Ad Added","2022-08-02 22:40:13");
INSERT INTO adminlog VALUES("804","2","Ad Added","2022-08-02 22:40:21");
INSERT INTO adminlog VALUES("805","2","login","2022-09-20 22:55:18");



DROP TABLE ads;

CREATE TABLE `ads` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_title` varchar(200) DEFAULT NULL,
  `a_title_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `a_image` varchar(200) DEFAULT NULL,
  `a_type` enum('category','brand','price','percentage','banner') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '''category'',''brand'',''price'',''percentage''',
  `a_category` varchar(20) DEFAULT NULL,
  `a_sub` varchar(20) DEFAULT NULL,
  `a_brand` varchar(20) DEFAULT NULL,
  `a_product` varchar(20) DEFAULT NULL,
  `a_min` varchar(200) DEFAULT NULL,
  `a_max` varchar(200) DEFAULT NULL,
  `a_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb3;

INSERT INTO ads VALUES("91","","","ad1659460185.jpg","banner","1","","","","","","2022-08-02 22:39:44");
INSERT INTO ads VALUES("92","","","ad1659460195.jpg","banner","1","","","","","","2022-08-02 22:39:54");
INSERT INTO ads VALUES("41","B&Q","B&Q","ad1650546351.png","brand","","","11","","","","2022-07-15 12:19:32");
INSERT INTO ads VALUES("42","Dreams","أحلام","ad1650546374.png","brand","","","","","","","2022-07-15 12:19:32");
INSERT INTO ads VALUES("95","","","ad1659460221.jpg","banner","3","","","","","","2022-08-02 22:40:21");
INSERT INTO ads VALUES("87","","","ad1659459483.webp","price","","","","","10","100","2022-08-02 22:28:03");
INSERT INTO ads VALUES("88","","","ad1659459503.webp","price","","","","","10","100","2022-08-02 22:28:23");
INSERT INTO ads VALUES("39","Citrex","سيتركس","ad1650546315.png","brand","","","6","","","","2022-07-15 12:19:32");
INSERT INTO ads VALUES("40","Nexa","نيكسا","ad1650546332.png","brand","","","11","","","","2022-07-15 12:19:32");
INSERT INTO ads VALUES("93","","","ad1659460204.jpg","banner","3","","","","","","2022-08-02 22:40:04");
INSERT INTO ads VALUES("94","","","ad1659460213.jpg","banner","3","","","","","","2022-08-02 22:40:13");
INSERT INTO ads VALUES("38","Adidas","شركة اديداس","ad1650546296.png","brand","","","6","","","","2022-07-15 12:19:32");
INSERT INTO ads VALUES("68","","","ad1659458340.webp","category","1","","","","","","2022-08-02 22:09:00");
INSERT INTO ads VALUES("86","","","ad1659459472.webp","price","","","","","10","100","2022-08-02 22:27:52");
INSERT INTO ads VALUES("69","","","ad1659458355.webp","category","3","","","","","","2022-08-02 22:09:14");
INSERT INTO ads VALUES("63","Toy Story","Toy Story","ad1659333223.jpg","brand","4","","","","","","2022-08-01 14:47:48");
INSERT INTO ads VALUES("64","Cartoons","Cartoons","ad1659333237.png","brand","3","","","","","","2022-08-01 14:47:45");
INSERT INTO ads VALUES("65","Hot Wheels","Hot Wheels","ad1659333253.png","brand","2","","","","","","2022-08-01 14:47:43");
INSERT INTO ads VALUES("67","Barbee","Barbee","ad1659344199.jpg","brand","1","","","","","","2022-08-01 14:26:39");
INSERT INTO ads VALUES("70","","","ad1659458366.webp","category","1","","","","","","2022-08-02 22:09:26");
INSERT INTO ads VALUES("71","","","ad1659458378.webp","category","3","","","","","","2022-08-02 22:09:38");
INSERT INTO ads VALUES("72","","","ad1659458392.webp","category","1","","","","","","2022-08-02 22:09:52");
INSERT INTO ads VALUES("79","","","ad1659459038.webp","percentage","","","","","12","","2022-08-02 22:20:37");
INSERT INTO ads VALUES("80","","","ad1659459056.webp","percentage","","","","","5","10","2022-08-02 22:20:56");
INSERT INTO ads VALUES("81","","","ad1659459069.webp","percentage","","","","","4","5","2022-08-02 22:21:08");
INSERT INTO ads VALUES("82","","","ad1659459085.webp","percentage","","","","","3","6","2022-08-02 22:21:25");
INSERT INTO ads VALUES("83","","","ad1659459112.webp","percentage","","","","","","","2022-08-02 22:21:52");
INSERT INTO ads VALUES("84","","","ad1659459125.webp","percentage","","","","","4","6","2022-08-02 22:22:04");
INSERT INTO ads VALUES("85","","","ad1659459137.webp","percentage","","","","","6","9","2022-08-02 22:22:17");
INSERT INTO ads VALUES("89","","","ad1659459518.webp","price","","","","","10","100","2022-08-02 22:28:38");
INSERT INTO ads VALUES("90","","","ad1659459529.webp","price","","","","","10","100","2022-08-02 22:28:48");



DROP TABLE app_setting;

CREATE TABLE `app_setting` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `app_version` varchar(200) NOT NULL,
  `tax` varchar(200) DEFAULT '0',
  `otp` varchar(200) DEFAULT NULL,
  `splashscreen` varchar(200) DEFAULT NULL,
  `splashscreen_time` int NOT NULL DEFAULT '3',
  `api_translate` varchar(200) DEFAULT NULL,
  `api_currency` varchar(200) DEFAULT NULL,
  `api_whatsapp` varchar(200) DEFAULT NULL,
  `api_otp` varchar(200) DEFAULT NULL,
  `api_map` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `android_url` varchar(200) DEFAULT NULL,
  `ios_url` varchar(200) DEFAULT NULL,
  `otp_email` varchar(200) DEFAULT NULL,
  `otp_email_password` varchar(200) DEFAULT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `app_font` varchar(200) DEFAULT NULL,
  `enable_cod` int NOT NULL DEFAULT '1',
  `enable_pay` int NOT NULL DEFAULT '1',
  `delivery_cost` varchar(200) NOT NULL DEFAULT '30',
  `stock_valid` int DEFAULT '0',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO app_setting VALUES("1","1","5","12345","splash.jpg","8","AIzaSyAENDKMK6ZJ9eWQGHskDH32rdMBnHl1Iso","b5038187739a5dc8cdb7fe2645cebfb5","qaaaaaaaaaaaaaa","username=TRddDS&password=c&from=Tc","AIzaSyA7X4Gb7UGUQsKaqD6QjKBmQnzsS2S_bhA","https://play.google.com/store/apps/details?id=","https://apps.apple.com/us/app/","ae.bidhub@gmail.com","cwdijpzrhiyyfmbw","971566767658","https://bidhub.store","ae.bidhub@gmail.com","poppins","1","1","30","0");



DROP TABLE banner;

CREATE TABLE `banner` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `b_image` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `b_category` varchar(200) DEFAULT NULL,
  `b_product` varchar(200) DEFAULT NULL,
  `b_url` varchar(200) DEFAULT NULL,
  `b_dated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

INSERT INTO banner VALUES("1","banner1659202592.jpg","1","","","2022-07-30 23:06:32");
INSERT INTO banner VALUES("2","banner1659202604.jpg","2","","","2022-07-30 23:06:44");
INSERT INTO banner VALUES("3","banner1659202615.jpg","","","","2022-07-30 23:06:54");
INSERT INTO banner VALUES("4","banner1659202634.jpg","","","https://www.viral.ae","2022-07-30 23:07:13");
INSERT INTO banner VALUES("5","banner1659202664.jpg","","","https://www.viral.ae","2022-07-30 23:07:43");



DROP TABLE bid;

CREATE TABLE `bid` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int DEFAULT NULL,
  `sc_id` int DEFAULT NULL,
  `p_title` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'title',
  `p_title_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'title arab',
  `p_sub` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'sub title',
  `p_sub_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'sub title arab',
  `p_image` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'cover photo',
  `p_price_start` double DEFAULT '0' COMMENT 'Starting price',
  `p_price_latest` double DEFAULT '0' COMMENT 'Latest price',
  `p_detail` text,
  `p_detail_arab` text,
  `p_quantity` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1',
  `p_unit` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1' COMMENT 'measuring unit',
  `p_color` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1' COMMENT 'base color id',
  `p_tags` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'product tags',
  `p_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `l_id` varchar(20) DEFAULT NULL,
  `f_1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_3` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_4` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_5` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_6` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `start_time` varchar(200) DEFAULT NULL,
  `end_time` varchar(200) DEFAULT NULL,
  `win_user` varchar(20) DEFAULT NULL,
  `trans` varchar(20) DEFAULT NULL,
  `p_status` enum('A','D','E','H','S') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'A' COMMENT 'Active,Deactive,Delete,Hide,Suspend',
  `p_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`),
  KEY `c_id` (`c_id`),
  KEY `sc_id` (`sc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

INSERT INTO bid VALUES("1","1","3","Powerpuff girls","Powerpuff girls","Powerpuff girls - buttercup pop vinyl figure by funko","Powerpuff girls - buttercup pop vinyl figure by funko","product1659346884.jpg","0","100","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Revisit your favourite Cartoon Network shows with&nbsp;this Powerpuff Girls&nbsp;Buttercup Pop! Vinyl Figure.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This PowerPuff Girls -&nbsp;Buttercup Pop Vinyl Figure by Funko features her mid-air and measures 3 3/4 inches and comes in&nbsp;their classic themed display window packaging.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and&nbsp;fun&nbsp;online store for Funko and official Powerpuff Girls Action Figures, Bobbleheads, Statues and&nbsp;Merchandise!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Revisit your favourite Cartoon Network shows with&nbsp;this Powerpuff Girls&nbsp;Buttercup Pop! Vinyl Figure.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This PowerPuff Girls -&nbsp;Buttercup Pop Vinyl Figure by Funko features her mid-air and measures 3 3/4 inches and comes in&nbsp;their classic themed display window packaging.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and&nbsp;fun&nbsp;online store for Funko and official Powerpuff Girls Action Figures, Bobbleheads, Statues and&nbsp;Merchandise!</p>","1","1","1","","79fc41fed2","","3","2","3","3","7","5","3","","2022-08-30T03:12+0400","","","A","2022-08-01 15:11:24");
INSERT INTO bid VALUES("2","1","3","Powerpuff girls","Powerpuff girls","Powerpuff girls - blossom pop vinyl figure by funko","Powerpuff girls - blossom pop vinyl figure by funko","product1659347026.jpg","0","0","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Revisit your favourite Cartoon Network shows with&nbsp;this Powerpuff Girls Blossom Pop! Vinyl Figure.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This PowerPuff Girls - Blossom Pop Vinyl Figure by Funko features her mid-air and measures 3 3/4 inches and comes in&nbsp;their classic themed display window packaging.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and&nbsp;fun&nbsp;online store for Funko and official Powerpuff Girls Action Figures, Bobbleheads, Statues and&nbsp;Merchandise</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Revisit your favourite Cartoon Network shows with&nbsp;this Powerpuff Girls Blossom Pop! Vinyl Figure.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This PowerPuff Girls - Blossom Pop Vinyl Figure by Funko features her mid-air and measures 3 3/4 inches and comes in&nbsp;their classic themed display window packaging.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and&nbsp;fun&nbsp;online store for Funko and official Powerpuff Girls Action Figures, Bobbleheads, Statues and&nbsp;Merchandise</p>","1","1","8","","7a052495e3","2","5","3","7","2","7","5","1","","2022-08-28T03:15+0400","","","A","2022-08-01 15:13:46");
INSERT INTO bid VALUES("3","1","3","Thor","Thor","The avengers thor headknocker by neca","The avengers thor headknocker by neca","product1659347120.jpg","0","0","<div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">It’s The Avengers The Movie Headknocker - Thor.<br><br></div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">These highly detailed resin Head Knockers captures the Avengers in painstaking, movie-accurate detail. All Four Avengers Head Knockers have Avengers symbol bases, are in one consistent scale, and can be displayed together.</div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Avengers are highly detailed, hand-painted, and screen accurate!</div>","<div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">It’s The Avengers The Movie Headknocker - Thor.<br><br></div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">These highly detailed resin Head Knockers captures the Avengers in painstaking, movie-accurate detail. All Four Avengers Head Knockers have Avengers symbol bases, are in one consistent scale, and can be displayed together.</div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></div><div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Avengers are highly detailed, hand-painted, and screen accurate!</div>","1","1","1","","7a0afc4f40","1","2","3","4","5","7","5","0","","2022-08-31T15:16+0400","","","A","2022-08-01 15:15:19");



DROP TABLE bidding;

CREATE TABLE `bidding` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `p_id` int NOT NULL,
  `price` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `b_created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO bidding VALUES("1","1","1","100","2022-08-01 15:54:53");



DROP TABLE cart;

CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `product_type` enum('REGULAR','BIDDING') NOT NULL DEFAULT 'REGULAR',
  `p_id` int DEFAULT NULL,
  `book_id` int NOT NULL DEFAULT '0',
  `variant` int DEFAULT '0',
  `quantity` int DEFAULT '1',
  `purchase_price` double DEFAULT '0',
  `coupon_price` double DEFAULT '0',
  `extra_delivery` double DEFAULT '0',
  `changed` int NOT NULL DEFAULT '0',
  `cart_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;




DROP TABLE category;

CREATE TABLE `category` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(2000) DEFAULT NULL,
  `c_name_arab` varchar(2000) DEFAULT NULL,
  `c_detail` varchar(2000) DEFAULT NULL,
  `c_detail_arab` varchar(2000) DEFAULT NULL,
  `c_image` varchar(200) DEFAULT NULL,
  `c_banner` varchar(200) DEFAULT NULL,
  `showhome` int DEFAULT '1',
  `c_active` int NOT NULL DEFAULT '1',
  `c_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

INSERT INTO category VALUES("1","Action Figure","Action Figure","Action Figure","Action Figure","category1659195258.png","categoryban1659195696.jpg","1","1","2022-07-30 21:04:18");
INSERT INTO category VALUES("2","Statue Collections","Statue Collections","Statue Collections","Statue Collectionsx","category1659337105.png","categoryban1659344640.png","1","1","2022-07-30 21:14:30");
INSERT INTO category VALUES("3","Animals & Dolls","Animals & Dolls","Animals & Dolls","Animals & Dolls","category1659339108.png","categoryban1659344659.jpg","1","1","2022-07-30 21:15:58");
INSERT INTO category VALUES("4","Electronics Toys","Electronics Toys","Electronics Toys","Electronics Toys","category1659198698.png","category1659198698.jpg","1","1","2022-07-30 22:01:37");
INSERT INTO category VALUES("5","Collectibles Toys","Collectibles Toys","Collectibles Toys","Collectibles Toys","category1659341779.png","categoryban1659344674.png","1","1","2022-07-30 22:01:56");
INSERT INTO category VALUES("7","Other Accessories","Other Accessories","Other Accessories","Other Accessories","category1659341810.png","categoryban1659344686.jpg","1","1","2022-08-01 13:46:49");



DROP TABLE coupon_used;

CREATE TABLE `coupon_used` (
  `cu_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `coupon_id` int DEFAULT NULL,
  `coupon_code` varchar(200) DEFAULT NULL,
  `coupon_price` varchar(200) DEFAULT NULL,
  `cu_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;




DROP TABLE coupons;

CREATE TABLE `coupons` (
  `coupon_id` int NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(200) DEFAULT NULL,
  `coupon_detail` varchar(2000) DEFAULT NULL,
  `coupon_price` varchar(200) DEFAULT NULL,
  `coupon_percentage` varchar(20) NOT NULL DEFAULT '0',
  `coupon_products` varchar(2000) DEFAULT NULL,
  `coupon_use` int DEFAULT '0',
  `coupon_active` enum('A','D') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'A',
  `coupon_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

INSERT INTO coupons VALUES("1","NEWW","Use Code NEWW and avail Offer on top brands","10","0","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","2","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("2","OFF","Use code OFF and enjoy the Flat 20% Offer on all purchase","0","20","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","2","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("3","WELCOME","Use our Welcome offer on particular products. Explore now","25","0","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","3","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("4","ALLNEW","Flat 20% Offer on all purchase. Use Code ALLNEW to avail this offer","15","0","","2","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("5","RAMADAN","Use Code NEWW and avail Offer on top brands","0","15","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","3","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("6","NEWYEAR","Use code OFF and enjoy the Flat 20% Offer on all purchase","20","0","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","3","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("7","RANDOM","Use our Welcome offer on particular products. Explore now","25","0","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","2","A","2021-09-25 20:33:58");
INSERT INTO coupons VALUES("8","SUMMER","Flat 20% Offer on all purchase. Use Code ALLNEW to avail this offer","0","20","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40","2","A","2021-09-25 20:33:58");



DROP TABLE filter1;

CREATE TABLE `filter1` (
  `f1_id` int NOT NULL AUTO_INCREMENT,
  `f1_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f1_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f1_image` varchar(2000) DEFAULT NULL,
  `f1_category` varchar(20) DEFAULT NULL,
  `f1_dated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`f1_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

INSERT INTO filter1 VALUES("1","Bath & Body Works","باث اند بودي وركس","filter1650395797.png","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("2","Abag Alghaim","أباج الغيم","filter1650395836.png","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("3","Abayat Alotour","عبيات العطور","filter1650395886.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("4","Beaver Professional","بيفر بروفيشنال","filter1650395928.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("5","Adidas","شركة اديداس","filter1650395961.png","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("6","AE Perfumes","عطور الإمارات","filter1650395988.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("7","Beverly Hills","بيفرلي هيلز","filter1650396016.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("8","Al Majed For Oud","الماجد للعود","filter1650396058.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("9","Anastasia Beverly Hills","أناستازيا بيفرلي هيلز","filter1650396112.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("10","Atelier Cologne","ورشة كولونيا","filter1650396157.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("11","Garnier","غارنييه","filter1650396198.jpg","1,2,3,4,5,6,7","2022-07-15 12:19:33");
INSERT INTO filter1 VALUES("12","Heiker Ouds","هيكير عود","filter1650396262.png","1,2,3,4,5,6,7","2022-07-15 12:19:33");



DROP TABLE filter2;

CREATE TABLE `filter2` (
  `f2_id` int NOT NULL AUTO_INCREMENT,
  `f2_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f2_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f2_image` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f2_category` varchar(20) DEFAULT NULL,
  `f2_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f2_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

INSERT INTO filter2 VALUES("1","India","India","filter1659200960.png","","2022-07-30 22:39:19");
INSERT INTO filter2 VALUES("2","United Arab Emirates","United Arab Emirates","filter1659201032.jpg","","2022-07-30 22:40:31");
INSERT INTO filter2 VALUES("3","China","China","filter1659201074.jpg","","2022-07-30 22:41:13");
INSERT INTO filter2 VALUES("4","Japan","Japan","filter1659201100.jpg","","2022-07-30 22:41:40");



DROP TABLE filter3;

CREATE TABLE `filter3` (
  `f3_id` int NOT NULL AUTO_INCREMENT,
  `f3_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f3_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f3_image` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f3_category` varchar(20) DEFAULT NULL,
  `f3_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f3_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

INSERT INTO filter3 VALUES("1","0 - 18 Months","0 - 18 Months","filter1659201133.webp","","2022-07-30 22:42:13");
INSERT INTO filter3 VALUES("2","18 - 36 Months","18 - 36 Months","filter1659201150.webp","","2022-07-30 22:42:30");
INSERT INTO filter3 VALUES("3","3 - 5 Years","3 - 5 Years","filter1659201180.webp","","2022-07-30 22:43:00");
INSERT INTO filter3 VALUES("4","5 - 7 Years","5 - 7 Years","filter1659201208.webp","","2022-07-30 22:43:28");
INSERT INTO filter3 VALUES("5","7 - 9 Years","7 - 9 Years","filter1659201231.webp","","2022-07-30 22:43:50");
INSERT INTO filter3 VALUES("6","9 - 12 Years","9 - 12 Years","filter1659201251.webp","","2022-07-30 22:44:11");
INSERT INTO filter3 VALUES("7","12+ Years","12+ Years","filter1659201275.webp","","2022-07-30 22:44:35");
INSERT INTO filter3 VALUES("8","All Age","All Age","filter1659335387.jpg","1","2022-08-01 11:59:47");



DROP TABLE filter4;

CREATE TABLE `filter4` (
  `f4_id` int NOT NULL AUTO_INCREMENT,
  `f4_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f4_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f4_image` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f4_category` varchar(20) DEFAULT NULL,
  `f4_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f4_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

INSERT INTO filter4 VALUES("1","Plastic","Plastic","","","2022-07-30 22:44:52");
INSERT INTO filter4 VALUES("2","Fabric","Fabric","","","2022-07-30 22:45:04");
INSERT INTO filter4 VALUES("3","Metal","Metal","","","2022-07-30 22:45:15");
INSERT INTO filter4 VALUES("4","Ceramic","Ceramic","","","2022-07-30 22:45:23");
INSERT INTO filter4 VALUES("5","Mold","Mold","","","2022-07-30 22:45:30");
INSERT INTO filter4 VALUES("6","Nylon","Nylon","","","2022-07-30 22:45:47");
INSERT INTO filter4 VALUES("7","Wood","Wood","","","2022-07-30 22:45:54");



DROP TABLE filter5;

CREATE TABLE `filter5` (
  `f5_id` int NOT NULL AUTO_INCREMENT,
  `f5_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f5_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f5_image` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f5_category` varchar(20) DEFAULT NULL,
  `f5_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f5_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

INSERT INTO filter5 VALUES("1","Pull Back Power","Pull Back Power","","","2022-07-30 22:46:21");
INSERT INTO filter5 VALUES("2","Motorized Power","Motorized Power","","","2022-07-30 22:46:37");
INSERT INTO filter5 VALUES("3","Battery Source","Battery Source","","","2022-07-30 22:46:56");
INSERT INTO filter5 VALUES("4","AC Power Source","AC Power Source","","","2022-07-30 22:47:18");
INSERT INTO filter5 VALUES("5","DC Power Source","DC Power Source","","","2022-07-30 22:49:55");
INSERT INTO filter5 VALUES("6","Not Applicable","Not Applicable","","","2022-07-30 22:50:08");
INSERT INTO filter5 VALUES("7","Statue","Statue","","1, 2, 3, 4, 5","2022-08-01 12:00:12");



DROP TABLE filter6;

CREATE TABLE `filter6` (
  `f6_id` int NOT NULL AUTO_INCREMENT,
  `f6_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f6_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f6_image` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f6_category` varchar(20) DEFAULT NULL,
  `f6_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f6_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

INSERT INTO filter6 VALUES("1","AAA Battery","AAA Battery","","","2022-07-30 22:47:38");
INSERT INTO filter6 VALUES("2","AA Battery","AA Battery","","","2022-07-30 22:48:21");
INSERT INTO filter6 VALUES("3","Adaptor Power","Adaptor Power","","","2022-07-30 22:48:37");
INSERT INTO filter6 VALUES("4","Manual Source","Manual Source","","","2022-07-30 22:49:06");
INSERT INTO filter6 VALUES("5","Not Applicable","Not Applicable","","","2022-07-30 22:49:15");
INSERT INTO filter6 VALUES("6","Hand Power","Hand Power","","1, 2, 3, 4, 5","2022-08-01 12:00:50");



DROP TABLE help;

CREATE TABLE `help` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO help VALUES("1","Help Document for Application 
You can update this page from admin panel");
INSERT INTO help VALUES("3","vjhvjhvjhvhv");



DROP TABLE lable;

CREATE TABLE `lable` (
  `l_id` int NOT NULL AUTO_INCREMENT,
  `l_name` varchar(2000) DEFAULT NULL,
  `l_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `l_color` varchar(200) DEFAULT NULL,
  `l_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO lable VALUES("1","Exclusive","حصري","#6C9E92","2022-04-20 10:50:07","2022-07-15 12:19:34");
INSERT INTO lable VALUES("2","New Launch","إطلاق جديد","#68828F","2022-04-20 10:50:36","2022-07-15 12:19:34");
INSERT INTO lable VALUES("3","Trending","الشائع","#703355","2022-04-20 10:50:57","2022-07-15 12:19:34");
INSERT INTO lable VALUES("4","Hot Sale","عرض ساخن","#474747","2022-04-20 10:51:18","2022-07-15 12:19:34");



DROP TABLE orders;

CREATE TABLE `orders` (
  `o_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `o_type` enum('REGULAR','BIDDING') NOT NULL DEFAULT 'REGULAR',
  `method` enum('pay','cod','wallet') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'pay',
  `quantity` int DEFAULT '0',
  `product_price` varchar(200) DEFAULT '0',
  `offer_price` varchar(200) DEFAULT '0',
  `purchase_price` varchar(200) DEFAULT '0',
  `delivery_cost` varchar(200) DEFAULT '0',
  `coupon_code` varchar(200) DEFAULT NULL,
  `coupon_id` varchar(20) DEFAULT '0',
  `coupon_offer` varchar(200) DEFAULT '0',
  `coupon_product` varchar(200) DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `tax_percentage` varchar(200) DEFAULT '0',
  `tax_cost` varchar(200) DEFAULT '0',
  `order_note` varchar(2000) DEFAULT NULL,
  `delivery_time` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `status` enum('P','A','S','D','C','R') DEFAULT 'P',
  `admin_view` int DEFAULT '0',
  `o_reply` varchar(200) DEFAULT NULL,
  `o_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  `o_accept` datetime DEFAULT NULL,
  `o_sent` datetime DEFAULT NULL,
  `o_deliver` datetime DEFAULT NULL,
  `o_cancel` datetime DEFAULT NULL,
  `o_return` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;




DROP TABLE popads;

CREATE TABLE `popads` (
  `pa_id` int NOT NULL AUTO_INCREMENT,
  `pa_image` varchar(200) DEFAULT NULL,
  `pa_title` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pa_title_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `p_category` varchar(20) DEFAULT NULL,
  `p_product` varchar(20) DEFAULT NULL,
  `p_url` varchar(2000) DEFAULT NULL,
  `pa_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

INSERT INTO popads VALUES("5","ad1.jpg","Special offer on all products","Special offer on all products","1","","","2022-07-15 12:19:34");



DROP TABLE pre_orders;

CREATE TABLE `pre_orders` (
  `o_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `method` enum('pay','cod') DEFAULT 'pay',
  `quantity` int DEFAULT '0',
  `product_price` varchar(200) DEFAULT '0',
  `offer_price` varchar(200) DEFAULT '0',
  `purchase_price` varchar(200) DEFAULT '0',
  `delivery_cost` varchar(200) DEFAULT '0',
  `coupon_code` varchar(200) DEFAULT NULL,
  `coupon_id` int DEFAULT '0',
  `coupon_offer` varchar(200) DEFAULT '0',
  `coupon_product` varchar(200) DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `tax_percentage` varchar(200) DEFAULT '0',
  `tax_cost` varchar(200) DEFAULT '0',
  `order_note` varchar(2000) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `status` enum('P','A','S','D','C','R') DEFAULT 'P',
  `admin_view` int DEFAULT '0',
  `o_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  `o_accept` datetime DEFAULT NULL,
  `o_sent` datetime DEFAULT NULL,
  `o_deliver` datetime DEFAULT NULL,
  `o_cancel` datetime DEFAULT NULL,
  `o_return` datetime DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;




DROP TABLE product_images;

CREATE TABLE `product_images` (
  `pi_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int DEFAULT NULL,
  `is_bid` int DEFAULT '0',
  `pi_image` varchar(2000) DEFAULT NULL,
  `pi_var` varchar(200) DEFAULT NULL,
  `pi_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pi_id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb3;

INSERT INTO product_images VALUES("1","1","0","product16593337690.webp","1","2022-08-01 11:32:49");
INSERT INTO product_images VALUES("2","1","0","product16593337691.webp","1","2022-08-01 11:32:49");
INSERT INTO product_images VALUES("3","1","0","product16593337692.webp","1","2022-08-01 11:32:49");
INSERT INTO product_images VALUES("4","1","0","product16593337850.webp","2","2022-08-01 11:33:05");
INSERT INTO product_images VALUES("5","1","0","product16593337851.webp","2","2022-08-01 11:33:05");
INSERT INTO product_images VALUES("6","2","0","product16593347060.jpg","4","2022-08-01 11:48:25");
INSERT INTO product_images VALUES("7","2","0","product16593347061.jpg","4","2022-08-01 11:48:25");
INSERT INTO product_images VALUES("8","2","0","product16593347062.jpg","4","2022-08-01 11:48:25");
INSERT INTO product_images VALUES("9","2","0","product16593347063.jpg","4","2022-08-01 11:48:25");
INSERT INTO product_images VALUES("10","2","0","product16593347230.jpg","3","2022-08-01 11:48:42");
INSERT INTO product_images VALUES("11","2","0","product16593347231.jpg","3","2022-08-01 11:48:42");
INSERT INTO product_images VALUES("12","2","0","product16593347232.jpg","3","2022-08-01 11:48:42");
INSERT INTO product_images VALUES("13","4","0","product16593357380.jpg","8","2022-08-01 12:05:38");
INSERT INTO product_images VALUES("14","4","0","product16593357381.jpg","8","2022-08-01 12:05:38");
INSERT INTO product_images VALUES("15","4","0","product16593357382.jpg","8","2022-08-01 12:05:38");
INSERT INTO product_images VALUES("16","4","0","product16593357490.jpg","9","2022-08-01 12:05:48");
INSERT INTO product_images VALUES("17","4","0","product16593357491.jpg","9","2022-08-01 12:05:48");
INSERT INTO product_images VALUES("18","5","0","product16593360620.jpg","","2022-08-01 12:11:02");
INSERT INTO product_images VALUES("19","5","0","product16593360621.jpg","","2022-08-01 12:11:02");
INSERT INTO product_images VALUES("20","5","0","product16593360622.jpg","","2022-08-01 12:11:02");
INSERT INTO product_images VALUES("21","5","0","product16593360623.jpg","","2022-08-01 12:11:02");
INSERT INTO product_images VALUES("22","5","0","product16593360624.jpg","","2022-08-01 12:11:02");
INSERT INTO product_images VALUES("23","5","0","product16593360625.jpg","","2022-08-01 12:11:02");
INSERT INTO product_images VALUES("24","6","0","product16593363540.webp","","2022-08-01 12:15:53");
INSERT INTO product_images VALUES("25","6","0","product16593363541.webp","","2022-08-01 12:15:53");
INSERT INTO product_images VALUES("26","6","0","product16593363542.webp","","2022-08-01 12:15:53");
INSERT INTO product_images VALUES("27","6","0","product16593363543.webp","","2022-08-01 12:15:53");
INSERT INTO product_images VALUES("28","6","0","product16593363544.webp","","2022-08-01 12:15:53");
INSERT INTO product_images VALUES("29","6","0","product16593363545.webp","","2022-08-01 12:15:53");
INSERT INTO product_images VALUES("30","7","0","product16593367860.webp","","2022-08-01 12:23:05");
INSERT INTO product_images VALUES("31","7","0","product16593367861.webp","","2022-08-01 12:23:05");
INSERT INTO product_images VALUES("32","7","0","product16593367862.webp","","2022-08-01 12:23:05");
INSERT INTO product_images VALUES("33","7","0","product16593367863.jpg","","2022-08-01 12:23:05");
INSERT INTO product_images VALUES("34","8","0","product16593375850.jpg","","2022-08-01 12:36:24");
INSERT INTO product_images VALUES("35","8","0","product16593375851.jpg","","2022-08-01 12:36:24");
INSERT INTO product_images VALUES("36","8","0","product16593375852.jpg","","2022-08-01 12:36:24");
INSERT INTO product_images VALUES("37","8","0","product16593375853.jpg","","2022-08-01 12:36:24");
INSERT INTO product_images VALUES("38","9","0","product16593377770.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("39","9","0","product16593377771.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("40","9","0","product16593377772.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("41","9","0","product16593377773.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("42","9","0","product16593377774.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("43","9","0","product16593377775.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("44","9","0","product16593377776.jpg","","2022-08-01 12:39:37");
INSERT INTO product_images VALUES("56","10","0","product16593381675.jpg","","2022-08-01 12:46:07");
INSERT INTO product_images VALUES("55","10","0","product16593381674.jpg","","2022-08-01 12:46:07");
INSERT INTO product_images VALUES("54","10","0","product16593381673.jpg","","2022-08-01 12:46:07");
INSERT INTO product_images VALUES("53","10","0","product16593381672.jpg","","2022-08-01 12:46:07");
INSERT INTO product_images VALUES("52","10","0","product16593381671.jpg","","2022-08-01 12:46:07");
INSERT INTO product_images VALUES("51","10","0","product16593381670.jpg","","2022-08-01 12:46:07");
INSERT INTO product_images VALUES("57","11","0","product16593384240.jpg","","2022-08-01 12:50:24");
INSERT INTO product_images VALUES("58","11","0","product16593384241.jpg","","2022-08-01 12:50:24");
INSERT INTO product_images VALUES("59","11","0","product16593384242.jpg","","2022-08-01 12:50:24");
INSERT INTO product_images VALUES("60","11","0","product16593384243.jpg","","2022-08-01 12:50:24");
INSERT INTO product_images VALUES("61","11","0","product16593384244.jpg","","2022-08-01 12:50:24");
INSERT INTO product_images VALUES("62","12","0","product16593386340.jpg","","2022-08-01 12:53:54");
INSERT INTO product_images VALUES("63","12","0","product16593386341.jpg","","2022-08-01 12:53:54");
INSERT INTO product_images VALUES("64","12","0","product16593386342.jpg","","2022-08-01 12:53:54");
INSERT INTO product_images VALUES("65","12","0","product16593386343.jpg","","2022-08-01 12:53:54");
INSERT INTO product_images VALUES("66","12","0","product16593386344.jpg","","2022-08-01 12:53:54");
INSERT INTO product_images VALUES("67","12","0","product16593386345.jpg","","2022-08-01 12:53:54");
INSERT INTO product_images VALUES("68","14","0","product16593398160.webp","","2022-08-01 13:13:35");
INSERT INTO product_images VALUES("69","14","0","product16593398161.webp","","2022-08-01 13:13:35");
INSERT INTO product_images VALUES("70","14","0","product16593398162.webp","","2022-08-01 13:13:35");
INSERT INTO product_images VALUES("71","14","0","product16593398163.webp","","2022-08-01 13:13:35");
INSERT INTO product_images VALUES("72","15","0","product16593399730.webp","","2022-08-01 13:16:12");
INSERT INTO product_images VALUES("73","15","0","product16593399731.webp","","2022-08-01 13:16:12");
INSERT INTO product_images VALUES("74","15","0","product16593399732.webp","","2022-08-01 13:16:12");
INSERT INTO product_images VALUES("75","15","0","product16593399733.webp","","2022-08-01 13:16:12");
INSERT INTO product_images VALUES("76","16","0","product16593401030.jpg","","2022-08-01 13:18:23");
INSERT INTO product_images VALUES("77","16","0","product16593401031.jpg","","2022-08-01 13:18:23");
INSERT INTO product_images VALUES("78","16","0","product16593401032.jpg","","2022-08-01 13:18:23");
INSERT INTO product_images VALUES("79","16","0","product16593401033.jpg","","2022-08-01 13:18:23");
INSERT INTO product_images VALUES("80","17","0","product16593402480.webp","","2022-08-01 13:20:47");
INSERT INTO product_images VALUES("81","17","0","product16593402481.webp","","2022-08-01 13:20:47");
INSERT INTO product_images VALUES("82","17","0","product16593402482.webp","","2022-08-01 13:20:47");
INSERT INTO product_images VALUES("83","17","0","product16593402483.webp","","2022-08-01 13:20:47");
INSERT INTO product_images VALUES("84","17","0","product16593402484.webp","","2022-08-01 13:20:47");
INSERT INTO product_images VALUES("85","18","0","product16593404100.webp","","2022-08-01 13:23:30");
INSERT INTO product_images VALUES("86","18","0","product16593404101.webp","","2022-08-01 13:23:30");
INSERT INTO product_images VALUES("87","18","0","product16593404102.webp","","2022-08-01 13:23:30");
INSERT INTO product_images VALUES("88","18","0","product16593404103.webp","","2022-08-01 13:23:30");
INSERT INTO product_images VALUES("89","18","0","product16593404104.webp","","2022-08-01 13:23:30");
INSERT INTO product_images VALUES("90","18","0","product16593404105.webp","","2022-08-01 13:23:30");
INSERT INTO product_images VALUES("91","19","0","product16593405370.jpg","","2022-08-01 13:25:36");
INSERT INTO product_images VALUES("92","19","0","product16593405371.jpg","","2022-08-01 13:25:36");
INSERT INTO product_images VALUES("93","20","0","product16593408120.jpg","","2022-08-01 13:30:11");
INSERT INTO product_images VALUES("94","20","0","product16593408121.jpg","","2022-08-01 13:30:11");
INSERT INTO product_images VALUES("95","20","0","product16593408122.jpg","","2022-08-01 13:30:11");
INSERT INTO product_images VALUES("96","20","0","product16593408123.jpg","","2022-08-01 13:30:11");
INSERT INTO product_images VALUES("97","20","0","product16593408124.jpg","","2022-08-01 13:30:11");
INSERT INTO product_images VALUES("98","21","0","product16593409910.jpg","","2022-08-01 13:33:10");
INSERT INTO product_images VALUES("99","21","0","product16593409911.jpg","","2022-08-01 13:33:10");
INSERT INTO product_images VALUES("100","21","0","product16593409912.jpg","","2022-08-01 13:33:10");
INSERT INTO product_images VALUES("101","22","0","product16593411200.jpg","","2022-08-01 13:35:19");
INSERT INTO product_images VALUES("102","22","0","product16593411201.jpg","","2022-08-01 13:35:19");
INSERT INTO product_images VALUES("103","22","0","product16593411202.jpg","","2022-08-01 13:35:19");
INSERT INTO product_images VALUES("104","22","0","product16593411203.jpg","","2022-08-01 13:35:19");
INSERT INTO product_images VALUES("105","23","0","product16593412600.jpg","","2022-08-01 13:37:40");
INSERT INTO product_images VALUES("106","23","0","product16593412601.jpg","","2022-08-01 13:37:40");
INSERT INTO product_images VALUES("107","23","0","product16593412602.jpg","","2022-08-01 13:37:40");
INSERT INTO product_images VALUES("108","24","0","product16593414140.jpg","","2022-08-01 13:40:14");
INSERT INTO product_images VALUES("109","24","0","product16593414141.jpg","","2022-08-01 13:40:14");
INSERT INTO product_images VALUES("110","24","0","product16593414142.jpg","","2022-08-01 13:40:14");
INSERT INTO product_images VALUES("111","25","0","product16593422720.jpg","","2022-08-01 13:54:31");
INSERT INTO product_images VALUES("112","25","0","product16593422721.jpg","","2022-08-01 13:54:31");
INSERT INTO product_images VALUES("113","25","0","product16593422722.jpg","","2022-08-01 13:54:31");
INSERT INTO product_images VALUES("114","25","0","product16593422723.jpg","","2022-08-01 13:54:31");
INSERT INTO product_images VALUES("115","25","0","product16593422724.jpg","","2022-08-01 13:54:31");
INSERT INTO product_images VALUES("116","31","0","product16593432450.jpg","","2022-08-01 14:10:45");
INSERT INTO product_images VALUES("117","31","0","product16593432451.jpg","","2022-08-01 14:10:45");
INSERT INTO product_images VALUES("118","31","0","product16593432452.jpg","","2022-08-01 14:10:45");
INSERT INTO product_images VALUES("119","31","0","product16593432453.jpg","","2022-08-01 14:10:45");
INSERT INTO product_images VALUES("120","32","0","product16593433880.jpg","","2022-08-01 14:13:08");
INSERT INTO product_images VALUES("121","32","0","product16593433881.jpg","","2022-08-01 14:13:08");
INSERT INTO product_images VALUES("122","32","0","product16593433882.jpg","","2022-08-01 14:13:08");
INSERT INTO product_images VALUES("123","32","0","product16593433883.jpg","","2022-08-01 14:13:08");
INSERT INTO product_images VALUES("124","32","0","product16593433884.jpg","","2022-08-01 14:13:08");
INSERT INTO product_images VALUES("125","33","0","product16593436300.jpg","","2022-08-01 14:17:09");
INSERT INTO product_images VALUES("126","33","0","product16593436301.jpg","","2022-08-01 14:17:09");
INSERT INTO product_images VALUES("127","33","0","product16593436302.jpg","","2022-08-01 14:17:09");
INSERT INTO product_images VALUES("128","33","0","product16593436303.jpg","","2022-08-01 14:17:09");
INSERT INTO product_images VALUES("129","33","0","product16593436304.jpg","","2022-08-01 14:17:09");
INSERT INTO product_images VALUES("130","33","0","product16593436305.jpg","","2022-08-01 14:17:09");
INSERT INTO product_images VALUES("131","34","0","product16593438210.jpg","","2022-08-01 14:20:20");
INSERT INTO product_images VALUES("132","34","0","product16593438211.jpg","","2022-08-01 14:20:20");
INSERT INTO product_images VALUES("133","34","0","product16593438212.jpg","","2022-08-01 14:20:20");
INSERT INTO product_images VALUES("134","34","0","product16593438213.jpg","","2022-08-01 14:20:20");



DROP TABLE product_like;

CREATE TABLE `product_like` (
  `pl_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int DEFAULT NULL,
  `u_id` int DEFAULT NULL,
  `dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE product_rating;

CREATE TABLE `product_rating` (
  `pr_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `p_id` int DEFAULT NULL,
  `comments` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `star` int DEFAULT '0',
  `pr_reply` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pr_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO product_rating VALUES("1","1","33","Good Product and good for health","4","","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("2","2","33","Very good quality. Worth for money","3","","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("3","3","33","Worth for money. Must try this product","5","","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("4","4","33","Very good quality. Worth for money.Worth for money. Must try this product","2","Thanks for your valuable feedback","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("5","1","33","Good Product and good for health. Easy to handle.","3","","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("6","2","33","Very good quality. Worth for money.Easy to handle. must have in every home","5","","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("7","3","33","Worth for money. Must try this product. very usefull.Easy to handle.","5","Thanks. We will improve the product quality more","2021-09-25 13:08:29");
INSERT INTO product_rating VALUES("8","2","33","Very good quality. Worth for money.Worth for money. Must try this product. value for cost. Super","5","","2021-09-25 13:08:29");



DROP TABLE product_variant;

CREATE TABLE `product_variant` (
  `pv_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int DEFAULT NULL,
  `pv_title` varchar(2000) DEFAULT NULL,
  `pv_title_arab` varchar(2000) DEFAULT NULL,
  `pv_mrp` varchar(200) DEFAULT NULL,
  `pv_sell` varchar(200) DEFAULT NULL,
  `pv_color` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'colorcode without #',
  `pv_active` int DEFAULT '1',
  `pv_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pv_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

INSERT INTO product_variant VALUES("1","1","Full Motion","Full Motion","100","80","FFFFFF","1","2022-08-01 11:32:00");
INSERT INTO product_variant VALUES("2","1","No Motion","No Motion","80","50","5D4037","1","2022-08-01 11:32:26");
INSERT INTO product_variant VALUES("3","2","Without Vehicle","Without Vehicle","200","180","000000","1","2022-08-01 11:47:39");
INSERT INTO product_variant VALUES("4","2","With Vehicle","With Vehicle","250","200","9E9E9E","1","2022-08-01 11:47:57");
INSERT INTO product_variant VALUES("5","3","With Stand","With Stand","200","180","2096F3","1","2022-08-01 11:53:58");
INSERT INTO product_variant VALUES("6","3","Without Stand","Without Stand","150","100","000000","1","2022-08-01 11:54:22");
INSERT INTO product_variant VALUES("7","3","Stand Only","Stand Only","50","40","9E9E9E","1","2022-08-01 11:54:53");
INSERT INTO product_variant VALUES("8","4","With Stand","With Stand","200","150","FF9802","1","2022-08-01 12:04:57");
INSERT INTO product_variant VALUES("9","4","Without Stand","Without Stand","120","100","000000","1","2022-08-01 12:05:24");
INSERT INTO product_variant VALUES("10","5","With Stand","With Stand","300","250","FF9802","1","2022-08-01 12:10:22");
INSERT INTO product_variant VALUES("11","5","Without Stand","Without Stand","200","100","5D4037","1","2022-08-01 12:10:47");
INSERT INTO product_variant VALUES("12","6","With Stand","With Stand","400","350","","1","2022-08-01 12:14:04");
INSERT INTO product_variant VALUES("13","6","Without Stand","Without Stand","300","250","","1","2022-08-01 12:14:25");
INSERT INTO product_variant VALUES("14","6","Without Vehicle","Without Vehicle","200","150","","1","2022-08-01 12:14:40");
INSERT INTO product_variant VALUES("15","6","Without Battery","Without Battery","100","80","","1","2022-08-01 12:15:01");
INSERT INTO product_variant VALUES("16","7","Battery Powered","Battery Powered","500","450","F54336","1","2022-08-01 12:21:14");
INSERT INTO product_variant VALUES("17","7","Manual Power","Manual Power","400","300","FF9802","1","2022-08-01 12:21:36");
INSERT INTO product_variant VALUES("18","7","With Stand","With Stand","300","250","9E9E9E","1","2022-08-01 12:22:18");
INSERT INTO product_variant VALUES("19","9","Without Dress","Without Dress","800","700","5D4037","1","2022-08-01 12:38:59");
INSERT INTO product_variant VALUES("20","9","With Dress","With Dress","800","700","F54336","1","2022-08-01 12:39:16");
INSERT INTO product_variant VALUES("21","12","Without Stand","Without Stand","800","700","","1","2022-08-01 12:55:12");
INSERT INTO product_variant VALUES("22","12","With Stand","With Stand","1000","900","","1","2022-08-01 12:55:26");
INSERT INTO product_variant VALUES("23","19","With Stand","With Stand","1000","800","2096F3","1","2022-08-01 13:26:13");
INSERT INTO product_variant VALUES("24","19","Without Stand","Without Stand","700","600","000000","1","2022-08-01 13:26:30");
INSERT INTO product_variant VALUES("25","20","AC Power","AC Power","1000","800","","1","2022-08-01 13:30:28");
INSERT INTO product_variant VALUES("26","20","DC Power","DC Power","700","600","","1","2022-08-01 13:30:42");
INSERT INTO product_variant VALUES("27","20","Battery Power","Battery Power","500","400","","1","2022-08-01 13:30:54");



DROP TABLE product_views;

CREATE TABLE `product_views` (
  `pv_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int DEFAULT NULL,
  `u_id` int DEFAULT NULL,
  `pv_dated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO product_views VALUES("1","1","1","2022-08-01 11:41:30");
INSERT INTO product_views VALUES("2","2","1","2022-08-01 11:49:28");
INSERT INTO product_views VALUES("3","2","1","2022-08-01 11:54:27");
INSERT INTO product_views VALUES("4","5","1","2022-08-01 12:18:19");
INSERT INTO product_views VALUES("5","12","1","2022-08-01 12:54:37");
INSERT INTO product_views VALUES("6","26","1","2022-08-01 13:59:45");
INSERT INTO product_views VALUES("7","11","1","2022-08-01 14:32:21");
INSERT INTO product_views VALUES("8","12","1","2022-08-01 14:55:06");
INSERT INTO product_views VALUES("9","18","1","2022-08-01 15:09:28");
INSERT INTO product_views VALUES("10","19","1","2022-08-01 15:09:38");
INSERT INTO product_views VALUES("11","32","1","2022-08-02 22:25:51");
INSERT INTO product_views VALUES("12","30","1","2022-08-04 11:40:55");



DROP TABLE products;

CREATE TABLE `products` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int DEFAULT NULL,
  `sc_id` int DEFAULT NULL,
  `p_title` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'title',
  `p_title_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'title arab',
  `p_sub` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'sub title',
  `p_sub_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'sub title arab',
  `p_image` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'cover photo',
  `p_mrp` double DEFAULT '0' COMMENT 'original price',
  `p_sell` double DEFAULT '0' COMMENT 'offer price',
  `p_detail` text,
  `p_detail_arab` text,
  `p_quantity` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1',
  `p_unit` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1' COMMENT 'measuring unit',
  `p_color` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1' COMMENT 'base color id',
  `p_delivery` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' COMMENT 'delivery cost',
  `p_stock` int DEFAULT '100' COMMENT 'available product count',
  `p_stock_left` int DEFAULT '0',
  `p_tags` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'product tags',
  `p_rating` int DEFAULT '0',
  `p_count` int DEFAULT '0',
  `p_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `l_id` varchar(20) DEFAULT NULL,
  `f_1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_3` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_4` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_5` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `f_6` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `p_likes` int NOT NULL DEFAULT '0',
  `p_status` enum('A','D','E','H','S') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'A' COMMENT 'Active,Deactive,Delete,Hide,Suspend',
  `p_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`),
  KEY `c_id` (`c_id`),
  KEY `sc_id` (`sc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

INSERT INTO products VALUES("1","1","1","G.I. Joe camo storm shadow","G.I. Joe camo storm shadow","G.I. Joe camo storm shadow 1:6 scale action figure by threezero","G.I. Joe camo storm shadow 1:6 scale action figure by threezero","product1659333427.jpg","100","80","<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span class=\"s1\">It was for sure one of the best shows we saw while growing up.</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This exciting Threezero X Hasbro G.I. Joe Camo Storm Shadow 1:6 Scale Action Figure joins the collection of G.I. Joe 1:6 scale articulated figures!<br><br>The Camo Storm Shadow figure is based on a Hasbro figure from 1988. Fans can imagine Shadow leaving COBRA and relocating to a remote mountain hideaway, occasionally joining Snake Eyes on special operative missions in this iteration. The Camo Storm Shadow collectible figure stands 12-inches tall and has a fully articulated body with realistic seamless arms, a fabric hand-tailored camouflage costume, and high attention to detail. The 1:6 scale figure comes with the standard 1:6 scale figure\'s accessory loadout as well as two fists with claws that are exclusive to this variant!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore, India\'s largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","","1","1","9","","30","30","","6","2","76b32c9ce9","4","3","3","7","2","6","2","1","0","A","2022-08-01 11:27:06");
INSERT INTO products VALUES("2","1","1","The batman mafex action figure by medicom","The batman mafex action figure by medicom","Medicom has released a new MAFEX figure of The Batman","Medicom has released a new MAFEX figure of The Batman","product1659334424.jpg","200","180","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Batman figure stands approximately 6.3\" tall and features an incredible likeness of actor Robert Pattinson as Batman in the 2022 film. This highly articulated figure comes with two masked head sculpts, two unmasked head sculpts, a wired fabric cape, a cowl accessory, an alternate chest plate, a grappling hook and holster, and a flare. All of these amazing accessories combine to make it the most dynamic Batman figure in this line.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">In the&nbsp;Matt Reeves DC movie, Robert Pattinson played the perfect Batman, who is two years into his role as Gotham\'s embodiment of vengeance a nocturnal vigilante,&nbsp;striking fear in the hearts of Gotham\'s criminals. A reclusive&nbsp;heir of Gotham\'s richest family, Bruce Wayne is the Vengence personified, questioning his family\'s legacy, The World\'s Greatest Detective stalks the streets at night employing a lethal combination of mental mastery, physical strength and expert technology on his journey to becoming the city\'s symbol of hope.</p><div class=\"product_details__in_box\" style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial;\"></ul></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-fragment=\"1\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive DC Comics, and&nbsp;Medicom Toys online store for MAFEX Action Figures, Statues, and other Pop-culture merch!</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-fragment=\"1\"></span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Batman figure stands approximately 6.3\" tall and features an incredible likeness of actor Robert Pattinson as Batman in the 2022 film. This highly articulated figure comes with two masked head sculpts, two unmasked head sculpts, a wired fabric cape, a cowl accessory, an alternate chest plate, a grappling hook and holster, and a flare. All of these amazing accessories combine to make it the most dynamic Batman figure in this line.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">In the&nbsp;Matt Reeves DC movie, Robert Pattinson played the perfect Batman, who is two years into his role as Gotham\'s embodiment of vengeance a nocturnal vigilante,&nbsp;striking fear in the hearts of Gotham\'s criminals. A reclusive&nbsp;heir of Gotham\'s richest family, Bruce Wayne is the Vengence personified, questioning his family\'s legacy, The World\'s Greatest Detective stalks the streets at night employing a lethal combination of mental mastery, physical strength and expert technology on his journey to becoming the city\'s symbol of hope.</p><div class=\"product_details__in_box\" style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial;\"></ul></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-fragment=\"1\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive DC Comics, and&nbsp;Medicom Toys online store for MAFEX Action Figures, Statues, and other Pop-culture merch!</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-fragment=\"1\"></span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action</p>","1","1","11","","30","30","","6","2","76f186f0ca","1","5","2","7","1","6","5","2","0","A","2022-08-01 11:43:44");
INSERT INTO products VALUES("3","1","1","Dc comics speeding bullets batman","Dc comics speeding bullets batman","Dc comics speeding bullets batman by mcfarlane toys","Dc comics speeding bullets batman by mcfarlane toys","product1659334914.jpg","300","250","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gotham\'s own Kryptonian-born Dark Knight! This DC Multiverse Batman: Speeding Bullets 7-Inch Scale Action Figure has up to 22 moving parts for posing and play. Batman is shown in his DC Comic Superman: Speeding Bullets one-shot costume from 1993. Batman comes with two sets of alternate hands as well as a flight stand. A collectible art card with figure photography on the front and a character biography on the back is also included.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This action figure tells the story of Thomas and Martha Wayne discovering a crashed rocket with an alien baby inside on an alternate Earth in the DC Multiverse and raising him as their son, Bruce. Years later, on a fateful night, the Wayne family is walking through an alley when they are stopped by a lone criminal. As his parents are gunned down, Bruce\'s Kryptonian powers are activated,</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gotham\'s own Kryptonian-born Dark Knight! This DC Multiverse Batman: Speeding Bullets 7-Inch Scale Action Figure has up to 22 moving parts for posing and play. Batman is shown in his DC Comic Superman: Speeding Bullets one-shot costume from 1993. Batman comes with two sets of alternate hands as well as a flight stand. A collectible art card with figure photography on the front and a character biography on the back is also included.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This action figure tells the story of Thomas and Martha Wayne discovering a crashed rocket with an alien baby inside on an alternate Earth in the DC Multiverse and raising him as their son, Bruce. Years later, on a fateful night, the Wayne family is walking through an alley when they are stopped by a lone criminal. As his parents are gunned down, Bruce\'s Kryptonian powers are activated,</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","1","1","6","","30","30","","6","2","771023a716","2","5","4","7","1","6","5","0","0","A","2022-08-01 11:51:54");
INSERT INTO products VALUES("4","1","3","Rebirth deathstroke","Rebirth deathstroke","Dc comics rebirth deathstroke figure by mcfarlane toys","Dc comics rebirth deathstroke figure by mcfarlane toys","product1659335553.jpg","80","50","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Slade Wilson,&nbsp;the skilled assassin and menacing mercenary, is on the job!<br data-mce-fragment=\"1\"><br data-mce-fragment=\"1\">This McFarlane 7-inch scale DC Multiverse Deathstroke DC Rebirth Action Figure has ultra articulation and up to 22 moving parts for posing and play. Deathstroke is shown in his DC Rebirth costume of black and orange. Slade comes with a sword, a knife, and a display base. A collectible art card with Deathstroke artwork on the front and a character biography on the back is also included.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Mcfarlane Toys and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Slade Wilson,&nbsp;the skilled assassin and menacing mercenary, is on the job!<br data-mce-fragment=\"1\"><br data-mce-fragment=\"1\">This McFarlane 7-inch scale DC Multiverse Deathstroke DC Rebirth Action Figure has ultra articulation and up to 22 moving parts for posing and play. Deathstroke is shown in his DC Rebirth costume of black and orange. Slade comes with a sword, a knife, and a display base. A collectible art card with Deathstroke artwork on the front and a character biography on the back is also included.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Mcfarlane Toys and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch!</p>","1","1","2","","30","30","","6","2","77380d9ba8","1","2","2","8","1","7","4","0","0","A","2022-08-01 12:02:32");
INSERT INTO products VALUES("5","1","3","Future state supeman","Future state supeman","Dc comics future state supeman figure by mcfarlane toys","Dc comics future state supeman figure by mcfarlane toys","product1659335848.jpg","400","300","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">his DC Multiverse Future State Superman 7-Inch Scale Action Figure has ultra-articulation and up to 22 moving parts for posing and playing. Superman appears in gladiatorial armour from his battles on Warworld\'s Arena! He comes with an axe, a shield, and a display base. A collectible art card with figure photography on the front and a character biography on the back is also included.<br data-mce-fragment=\"1\"><br data-mce-fragment=\"1\">This Figure tells the story of, Superman having gone missing and is presumed dead. In reality, the Man of Steel is imprisoned on Warworld by the new Mongul across the galaxy. Superman must stay alive and find a way to return home after being forced to fight for his life in an arena while lacking his powers.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Mcfarlane Toys and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">his DC Multiverse Future State Superman 7-Inch Scale Action Figure has ultra-articulation and up to 22 moving parts for posing and playing. Superman appears in gladiatorial armour from his battles on Warworld\'s Arena! He comes with an axe, a shield, and a display base. A collectible art card with figure photography on the front and a character biography on the back is also included.<br data-mce-fragment=\"1\"><br data-mce-fragment=\"1\">This Figure tells the story of, Superman having gone missing and is presumed dead. In reality, the Man of Steel is imprisoned on Warworld by the new Mongul across the galaxy. Superman must stay alive and find a way to return home after being forced to fight for his life in an arena while lacking his powers.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Mcfarlane Toys and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","1","1","2","","30","30","","6","2","774a84ff1d","4","5","1","8","1","7","4","1","0","A","2022-08-01 12:07:28");
INSERT INTO products VALUES("6","1","1","Black adam movie hawkman","Black adam movie hawkman","Dc comics black adam movie hawkman figure by mcfarlane toys","Dc comics black adam movie hawkman figure by mcfarlane toys","product1659336137.webp","600","400","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Take to the skies and bring down your foes! This DC Black Adam Movie Hawkman 7-Inch Scale Action Figure comes soaring in from Black Adam. Hawkman is equipped with his mace, movable wings, and a display base. Also included is a collectible art card with figure photography on the front, and a character biography on the back. With up to 22 points of articulation, the winged hero comes packaged in a window box.&nbsp;Assemble a collection of all McFarlane Toys DC Multiverse Figures.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Mcfarlane Toys and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Take to the skies and bring down your foes! This DC Black Adam Movie Hawkman 7-Inch Scale Action Figure comes soaring in from Black Adam. Hawkman is equipped with his mace, movable wings, and a display base. Also included is a collectible art card with figure photography on the front, and a character biography on the back. With up to 22 points of articulation, the winged hero comes packaged in a window box.&nbsp;Assemble a collection of all McFarlane Toys DC Multiverse Figures.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Mcfarlane Toys and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-style=\"text-decoration: underline;\" style=\"text-decoration-line: underline;\"><span style=\"font-weight: 700;\">What’s in the Box?</span></span></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">2x Katanas</li><li style=\"margin-bottom: 12px;\">1x Bow</li><li style=\"margin-bottom: 12px;\">3x Arrows</li><li style=\"margin-bottom: 12px;\">1x Nunchaku</li><li style=\"margin-bottom: 12px;\">8x Interchangeable hands (including fists with claws)</li></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s&nbsp;largest and most comprehensive GIJOE, and ThreeZero online store for Action Figures, Statues, and other Pop-culture merch!</p>","1","1","3","","30","30","","6","2","775c92265b","3","3","2","8","1","3","2","0","0","A","2022-08-01 12:12:17");
INSERT INTO products VALUES("7","1","1","Iron man mark 3","Iron man mark 3","Iron man mark 3 marvel the infinity saga dlx action figure by threezero","Iron man mark 3 marvel the infinity saga dlx action figure by threezero","product1659336569.jpg","500","400","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Infinity Saga Iron Man Mark 3 DLX Action Figure from Threezero and Marvel Studios is the next armoured suit in the Marvel DLX series. It uses the classic colours of red and gold with a multi-layer metallic coating process to accurately replicate Tony Stark\'s armoured suit from the Iron Man films.<br><br>This fully-articulated collectible action figure stands about 6.8 inches tall and is made of threezero\'s renowned DLX die-cast metal system, which has 48 points of articulation. LED lighting functions are located on the chest and eyes, and the four air flaps on the back can be opened and closed.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The action figure\'s detailed structural engineering and exquisite design allow it to depict a variety of action poses while maintaining a realistic appearance. Bring Tony Stark\'s iconic armour into your collection!<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Marvel Studios: The Infinity Saga Iron Man Mark 3 DLX Action Figure includes the following accessories:<br></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">5x Pairs of interchangeable hands: 1x pair of fists, 1x Pair of relaxed hands, 1x Pair of shooting hands, 1x Pair of shooting hands to attach the effects, and 1x Pair of flight hands.</li><li style=\"margin-bottom: 12px;\">2x Pairs of effect parts: 1X Pair of shooting effects and 1X Pair of flying effects (for the feet), 2x Detachable Arm Missiles and 1x DLX action figure stand.</li></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&amp;nbsp;India\'s largest and most comprehensive Marvel Iron Man and ThreeZero online store.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Infinity Saga Iron Man Mark 3 DLX Action Figure from Threezero and Marvel Studios is the next armoured suit in the Marvel DLX series. It uses the classic colours of red and gold with a multi-layer metallic coating process to accurately replicate Tony Stark\'s armoured suit from the Iron Man films.<br><br>This fully-articulated collectible action figure stands about 6.8 inches tall and is made of threezero\'s renowned DLX die-cast metal system, which has 48 points of articulation. LED lighting functions are located on the chest and eyes, and the four air flaps on the back can be opened and closed.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The action figure\'s detailed structural engineering and exquisite design allow it to depict a variety of action poses while maintaining a realistic appearance. Bring Tony Stark\'s iconic armour into your collection!<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Marvel Studios: The Infinity Saga Iron Man Mark 3 DLX Action Figure includes the following accessories:<br></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 12px;\">5x Pairs of interchangeable hands: 1x pair of fists, 1x Pair of relaxed hands, 1x Pair of shooting hands, 1x Pair of shooting hands to attach the effects, and 1x Pair of flight hands.</li><li style=\"margin-bottom: 12px;\">2x Pairs of effect parts: 1X Pair of shooting effects and 1X Pair of flying effects (for the feet), 2x Detachable Arm Missiles and 1x DLX action figure stand.</li></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&amp;nbsp;India\'s largest and most comprehensive Marvel Iron Man and ThreeZero online store.</p>","1","1","1","","30","30","","6","2","777794ca8d","1","3","2","8","1","3","1","0","0","A","2022-08-01 12:19:29");
INSERT INTO products VALUES("8","2","4","Apollo creed","Apollo creed","Apollo creed (rocky iv edition) 1:3 scale statue by pcs","Apollo creed (rocky iv edition) 1:3 scale statue by pcs","product1659337542.jpg","1000","800","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">He is going to drop you like a bad habit!</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Apollo Creed 1:3 Scale Statue - Rocky IV Edition from Premium Collectibles Studio (PCS)&nbsp;dances his way to your Rocky movie collection.<br><br>Apollo Creed hits the mat in this highly detailed and lifelike 1:3 scale collectible statue based on the iconic Rocky film series, expertly sculpted in the likeness of actor Carl Weathers. In preparation for his fatal bout against Soviet boxer Ivan Drago, the former heavyweight champion stands 29\" tall and gives a patriotic performance. Creed is supported by a blue and white square boxing ring base adorned with stars. This legendary boxer, with a muscular physique and a smile on his face, fears nothing and is ready to fight to the death against any opponent.<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Rocky IV Edition features a mixed media costume with custom tailored fabric elements, allowing you to recreate the heavy hitter\'s signature style on your shelf. He is dressed in fabric pants with an American flag pattern and an embellished entrance robe with stars, stripes, and even gold fringe on the sleeves. The robe has wiring in the hem that allows you to pose around the figure. Apollo Creed\'s ring-ready ensemble includes a sculpted top hat, gloves, socks, and boots that continue his vibrant red, white, and blue theme from head to toe.</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">He is going to drop you like a bad habit!</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The Apollo Creed 1:3 Scale Statue - Rocky IV Edition from Premium Collectibles Studio (PCS)&nbsp;dances his way to your Rocky movie collection.<br><br>Apollo Creed hits the mat in this highly detailed and lifelike 1:3 scale collectible statue based on the iconic Rocky film series, expertly sculpted in the likeness of actor Carl Weathers. In preparation for his fatal bout against Soviet boxer Ivan Drago, the former heavyweight champion stands 29\" tall and gives a patriotic performance. Creed is supported by a blue and white square boxing ring base adorned with stars. This legendary boxer, with a muscular physique and a smile on his face, fears nothing and is ready to fight to the death against any opponent.<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Rocky IV Edition features a mixed media costume with custom tailored fabric elements, allowing you to recreate the heavy hitter\'s signature style on your shelf. He is dressed in fabric pants with an American flag pattern and an embellished entrance robe with stars, stripes, and even gold fringe on the sleeves. The robe has wiring in the hem that allows you to pose around the figure. Apollo Creed\'s ring-ready ensemble includes a sculpted top hat, gloves, socks, and boots that continue his vibrant red, white, and blue theme from head to toe.</p>","1","1","9","","30","30","","6","2","77ae189cc8","1","3","3","8","1","6","5","0","0","A","2022-08-01 12:34:01");
INSERT INTO products VALUES("9","2","4","Apollo creed","Apollo creed","Apollo creed (rocky ii edition) 1:3 scale statue by pcs","Apollo creed (rocky ii edition) 1:3 scale statue by pcs","product1659337632.jpg","800","700","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Apollo Creed hits the mat in this highly detailed and lifelike 1:3 scale collectible statue based on the iconic Rocky film series, expertly sculpted in the likeness of actor Carl Weathers. The heavyweight champion boxer stands 23\" tall and stands on a black, yellow, red, and grey boxing ring canvas base with a star in the centre. Apollo Creed, who is light on his feet and has a muscular physique, keeps his fists raised in anticipation of a rematch with the ultimate underdog Rocky Balboa.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This statue has a mixed media costume with custom-tailored fabric elements, allowing collectors to display it in a variety of ways on their shelves. His red and white fabric shorts have an elastic waistband and his name on the thighs, and the collectible also includes a removable white and red entrance robe with his World Heavyweight Champion title emblazoned on the back. When the robe is not being worn, a display rack is included. The figure comes with sculpted red boxing gloves, as well as sculpted red and white socks and boots. Fans can recreate this heavyweight\'s iconic cinematic appearance on their shelf by pairing him with the PCS Rocky II 1:3 Scale Statue (sold separately).</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Apollo Creed hits the mat in this highly detailed and lifelike 1:3 scale collectible statue based on the iconic Rocky film series, expertly sculpted in the likeness of actor Carl Weathers. The heavyweight champion boxer stands 23\" tall and stands on a black, yellow, red, and grey boxing ring canvas base with a star in the centre. Apollo Creed, who is light on his feet and has a muscular physique, keeps his fists raised in anticipation of a rematch with the ultimate underdog Rocky Balboa.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This statue has a mixed media costume with custom-tailored fabric elements, allowing collectors to display it in a variety of ways on their shelves. His red and white fabric shorts have an elastic waistband and his name on the thighs, and the collectible also includes a removable white and red entrance robe with his World Heavyweight Champion title emblazoned on the back. When the robe is not being worn, a display rack is included. The figure comes with sculpted red boxing gloves, as well as sculpted red and white socks and boots. Fans can recreate this heavyweight\'s iconic cinematic appearance on their shelf by pairing him with the PCS Rocky II 1:3 Scale Statue (sold separately).</p>","1","1","1","","30","30","","6","2","77b9fd102b","4","2","4","7","5","5","3","0","0","A","2022-08-01 12:37:11");
INSERT INTO products VALUES("10","2","4","Weapon-x x-men","Weapon-x x-men","Weapon-x x-men age of apocalypse bds art scale 1/10 by iron studios","Weapon-x x-men age of apocalypse bds art scale 1/10 by iron studios","product1659337872.jpg","500","400","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">In this stunning 7-inch statue,&nbsp;Weapon X is climbing a technological pedestal filled with steel conduits and electronic components, the fierce Canadian mutant Logan, his fury on his face, unsheathes his right fist\'s claws coated with the indestructible metal Adamantium (a fictional alloy), and brings his biggest scar, of the hand he lost in combat, in his left fist. In this alternate reality, he wears a red and blue variant of his original costume, with his hair even longer, strange, and messy like a feline mane, and adopts his original codename as a definitive one.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">When Professor Xavier\'s son, David Haller, the psychotic mutant known as Legion, went back in time to eliminate Magneto, he accidentally killed his father, causing a significant change in the timeline and creating another reality. This event allowed Apocalypse to take control of Earth 20 years earlier than predicted, in a world where no one could stop him. Magneto created the X-Men in this reality by transforming humans into his slaves, and he came to believe in his old friend\'s dream of mutants and humans living in peace. The X-Men formed a resistance force against the villain, without the memories of their old reality, except for Bishop, displaced in time, he became the only hope to restore the previous timeline.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">In this stunning 7-inch statue,&nbsp;Weapon X is climbing a technological pedestal filled with steel conduits and electronic components, the fierce Canadian mutant Logan, his fury on his face, unsheathes his right fist\'s claws coated with the indestructible metal Adamantium (a fictional alloy), and brings his biggest scar, of the hand he lost in combat, in his left fist. In this alternate reality, he wears a red and blue variant of his original costume, with his hair even longer, strange, and messy like a feline mane, and adopts his original codename as a definitive one.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">When Professor Xavier\'s son, David Haller, the psychotic mutant known as Legion, went back in time to eliminate Magneto, he accidentally killed his father, causing a significant change in the timeline and creating another reality. This event allowed Apocalypse to take control of Earth 20 years earlier than predicted, in a world where no one could stop him. Magneto created the X-Men in this reality by transforming humans into his slaves, and he came to believe in his old friend\'s dream of mutants and humans living in peace. The X-Men formed a resistance force against the villain, without the memories of their old reality, except for Bishop, displaced in time, he became the only hope to restore the previous timeline.</p>","1","1","12","","30","30","","6","2","77c8fdbb85","4","2","1","3","3","7","5","0","0","A","2022-08-01 12:41:11");
INSERT INTO products VALUES("11","2","5","Stan lee with grumpy cat","Stan lee with grumpy cat","Stan lee with grumpy cat pow! Entertainment minico statue by iron studios","Stan lee with grumpy cat pow! Entertainment minico statue by iron studios","product1659338257.jpg","400","300","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This MiniCo is loaded with adorable!</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Two legends met on a fun Halloween weekend in 2015. Stan Lee, the charismatic and iconic creator of heroes, who is frequently smiling, and the feline celebrity Grumpy Cat, who is always sulky. A thrilling moment in which these two pop culture legends decided to seize the opportunity and pose for a picture, with Grumpy Cat in its usual angry grimace and Mr Lee joining in on the joke and imitating the kitten, resulting in adorable images immortalised in memes and illustrations worldwide.</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This MiniCo is loaded with adorable!</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Two legends met on a fun Halloween weekend in 2015. Stan Lee, the charismatic and iconic creator of heroes, who is frequently smiling, and the feline celebrity Grumpy Cat, who is always sulky. A thrilling moment in which these two pop culture legends decided to seize the opportunity and pose for a picture, with Grumpy Cat in its usual angry grimace and Mr Lee joining in on the joke and imitating the kitten, resulting in adorable images immortalised in memes and illustrations worldwide.</p>","1","1","1","","30","30","","6","2","77e10af307","2","2","3","2","3","7","5","1","0","A","2022-08-01 12:47:36");
INSERT INTO products VALUES("12","2","4","Doc brown back to the future","Doc brown back to the future","doc brown back to the future ii minico statue by iron studios","doc brown back to the future ii minico statue by iron studios","product1659338559.jpg","800","700","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Returning from the hypothetical future year of 2015, the ingenious and distressed scientist shows a newspaper to his friend on which the cover news shows his friend\'s son being arrested, urging the young man to follow him \"Back to the Future\" to prevent such events.<br><br>Iron Studios presents the 5.9-inch Doc Brown - Back to the Future Part II - MiniCo in their best stylized Toy Art format, for the first time in this line, and making up a perfect pair with Marty McFly, over a pedestal with the movie\'s logo in the front, this highly detailed hand-painted PVC figure is a must-have for fans of this iconic movie franchise.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Iron Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Back to the Future Action Figures, Statues, and other Pop-culture merch!</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Returning from the hypothetical future year of 2015, the ingenious and distressed scientist shows a newspaper to his friend on which the cover news shows his friend\'s son being arrested, urging the young man to follow him \"Back to the Future\" to prevent such events.<br><br>Iron Studios presents the 5.9-inch Doc Brown - Back to the Future Part II - MiniCo in their best stylized Toy Art format, for the first time in this line, and making up a perfect pair with Marty McFly, over a pedestal with the movie\'s logo in the front, this highly detailed hand-painted PVC figure is a must-have for fans of this iconic movie franchise.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Iron Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Back to the Future Action Figures, Statues, and other Pop-culture merch!</p>","1","1","3","","30","30","","6","2","77f3f2dd7e","1","3","4","8","1","7","5","2","0","A","2022-08-01 12:52:39");
INSERT INTO products VALUES("13","3","8","Teenage Mutant","Teenage Mutant","Teenage mutant ninja turtles: michelangelo classic head knocker by neca","Teenage mutant ninja turtles: michelangelo classic head knocker by neca","product1659339589.jpg","700","500","<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Featuring your favourite crime-fighting mutant, this Teenage Mutant Ninja Turtles Michelangelo&nbsp;Classic Head Knocker&nbsp;makes for a must-have collectible and desk display piece!</p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Michelangelo Head Knocker stands approximately 6 1/2-inches tall, and is cast in resin and then hand painted for incredible detail. Comes in collectible matte finish packaging with spot gloss.</p>","<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Featuring your favourite crime-fighting mutant, this Teenage Mutant Ninja Turtles Michelangelo&nbsp;Classic Head Knocker&nbsp;makes for a must-have collectible and desk display piece!</p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Michelangelo Head Knocker stands approximately 6 1/2-inches tall, and is cast in resin and then hand painted for incredible detail. Comes in collectible matte finish packaging with spot gloss.</p>","1","1","4","","30","30","","6","2","7834484499","1","5","2","8","2","7","5","0","0","A","2022-08-01 13:09:48");
INSERT INTO products VALUES("14","3","8","T-rex jurassic","T-rex jurassic","T-rex jurassic world fallen kingdom d-stage statue by beast kingdom","T-rex jurassic world fallen kingdom d-stage statue by beast kingdom","product1659339700.jpg","700","600","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">With the release of the Jurassic World diorama collection, the D-Stage, \'Staging Your Dream\' collection from the Beast Kingdom is ready to roar its way onto a desk near you! Since the first Jurassic Park film in the 1990s introduced audiences to realistic depictions of dinosaurs, fans have enjoyed thrilling survival stories unlike any other! Now that the series\' final instalment has arrived, Beast Kingdom is ready to celebrate with fans the incredible series that has defined a generation.<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The T-Rex, one of the most terrifying and ferocious creatures to have ever walked the Earth\'s surface, is paired with a classic ancient scene that includes an erupting volcano and lush forests which brightens with an included light up function!<br><br>Can you spot an essential link to the movies at his feet? Take home a little bit of the movie magic in complete three-dimensional form with this highly detailed 6-inch D-Stage collection statue.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive online store for&nbsp;Beast Kingdom and&nbsp;Jurassic Park and World Statues, Action Figures, and other Pop culture Merchandise!</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">With the release of the Jurassic World diorama collection, the D-Stage, \'Staging Your Dream\' collection from the Beast Kingdom is ready to roar its way onto a desk near you! Since the first Jurassic Park film in the 1990s introduced audiences to realistic depictions of dinosaurs, fans have enjoyed thrilling survival stories unlike any other! Now that the series\' final instalment has arrived, Beast Kingdom is ready to celebrate with fans the incredible series that has defined a generation.<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The T-Rex, one of the most terrifying and ferocious creatures to have ever walked the Earth\'s surface, is paired with a classic ancient scene that includes an erupting volcano and lush forests which brightens with an included light up function!<br><br>Can you spot an essential link to the movies at his feet? Take home a little bit of the movie magic in complete three-dimensional form with this highly detailed 6-inch D-Stage collection statue.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive online store for&nbsp;Beast Kingdom and&nbsp;Jurassic Park and World Statues, Action Figures, and other Pop culture Merchandise!</p>","1","1","12","","30","30","","6","2","783b41cee0","4","6","2","7","4","7","5","0","0","A","2022-08-01 13:11:40");
INSERT INTO products VALUES("15","3","8","Dominion-blue","Dominion-blue","Jurassic world: dominion-blue & beta d-stage statue by beast kingdom","Jurassic world: dominion-blue & beta d-stage statue by beast kingdom","product1659339885.jpg","450","400","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">With the release of the Jurassic World diorama collection, the D-Stage, \'Staging Your Dream\' collection from the Beast Kingdom is ready to roar its way onto a desk near you! Since the first Jurassic Park film in the 1990s introduced audiences to realistic depictions of dinosaurs, fans have enjoyed thrilling survival stories unlike any other! Now that the series\' final instalment has arrived, Beast Kingdom is ready to celebrate with fans the incredible series that has defined a generation.<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">In this final instalment of the Jurassic World trilogy, beloved velociraptor Blue has a baby named Beta! The lush forest landscape, standing on a snowy mound, is an ideal setting for our new and returning characters!<br><br>Can you spot an essential link to the movies at his feet? Take home a little bit of the movie magic in complete three-dimensional form with this highly detailed 6-inch D-Stage collection statue.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive online store for&nbsp;Beast Kingdom and&nbsp;Jurassic Park and World Statues, Action Figures, and other Pop culture Merchandise!</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">With the release of the Jurassic World diorama collection, the D-Stage, \'Staging Your Dream\' collection from the Beast Kingdom is ready to roar its way onto a desk near you! Since the first Jurassic Park film in the 1990s introduced audiences to realistic depictions of dinosaurs, fans have enjoyed thrilling survival stories unlike any other! Now that the series\' final instalment has arrived, Beast Kingdom is ready to celebrate with fans the incredible series that has defined a generation.<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">In this final instalment of the Jurassic World trilogy, beloved velociraptor Blue has a baby named Beta! The lush forest landscape, standing on a snowy mound, is an ideal setting for our new and returning characters!<br><br>Can you spot an essential link to the movies at his feet? Take home a little bit of the movie magic in complete three-dimensional form with this highly detailed 6-inch D-Stage collection statue.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive online store for&nbsp;Beast Kingdom and&nbsp;Jurassic Park and World Statues, Action Figures, and other Pop culture Merchandise!</p>","1","1","12","","30","30","","6","2","7846c8710f","3","3","3","2","2","5","3","0","0","A","2022-08-01 13:14:44");
INSERT INTO products VALUES("16","3","8","Dominion","Dominion","Jurassic world: dominion (film) giganotosaurus statue by prime 1 studio","Jurassic world: dominion (film) giganotosaurus statue by prime 1 studio","product1659340031.jpg","600","500","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">With this 1:38 Scale Giganotosaurus toy version from Jurassic World: Dominion, Prime 1 Studio continues to add more amazing dinosaurs to the Prime Collectible Figure Series!<br><br>Prime 1 Studio challenged its sculptors and painters to use their incredible skills and artistry to bring the largest carnivore ever to live to life. And they responded with these realistic saurian scales, razor-sharp teeth, and a terrifying row of dorsal scales never before seen on a therapod! To complement the fine sculpting, the painters used subtle grey-green hues and a light wash to highlight the anatomy of this dinosaur. Most importantly, it stands at a collector-friendly 8.66 inches tall.</p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Prime 1 Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Jurassic World Action Figures, Statues, and other Pop-culture merch!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">With this 1:38 Scale Giganotosaurus toy version from Jurassic World: Dominion, Prime 1 Studio continues to add more amazing dinosaurs to the Prime Collectible Figure Series!<br><br>Prime 1 Studio challenged its sculptors and painters to use their incredible skills and artistry to bring the largest carnivore ever to live to life. And they responded with these realistic saurian scales, razor-sharp teeth, and a terrifying row of dorsal scales never before seen on a therapod! To complement the fine sculpting, the painters used subtle grey-green hues and a light wash to highlight the anatomy of this dinosaur. Most importantly, it stands at a collector-friendly 8.66 inches tall.</p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Prime 1 Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Jurassic World Action Figures, Statues, and other Pop-culture merch!</p>","1","1","12","","30","30","","6","2","784feb6784","1","2","2","8","2","5","6","0","0","A","2022-08-01 13:17:10");
INSERT INTO products VALUES("17","3","8","Raptor bust","Raptor bust","Jurassic world raptor bust by silverfox collectibles","Jurassic world raptor bust by silverfox collectibles","product1659340153.webp","850","700","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Silverfox\'s Jurassic World Raptor Bust is made of high-quality polystone resin and hand-painted with incredible detail.<br><br>This premium&nbsp;bust measures approximately 11 3/4 inches tall by 6-inches wide and comes with a base and authenticity card. For the ultimate dinosaur showdown, pair it with the Jurassic Park T-Rex Bust (sold separately).</p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Silverfox and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Jurassic World Action Figures, Statues, and other Pop-culture merch!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Silverfox\'s Jurassic World Raptor Bust is made of high-quality polystone resin and hand-painted with incredible detail.<br><br>This premium&nbsp;bust measures approximately 11 3/4 inches tall by 6-inches wide and comes with a base and authenticity card. For the ultimate dinosaur showdown, pair it with the Jurassic Park T-Rex Bust (sold separately).</p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Silverfox and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Jurassic World Action Figures, Statues, and other Pop-culture merch!</p>","1","1","12","","30","30","","6","2","785792cdbf","3","2","1","7","3","4","3","0","0","A","2022-08-01 13:19:13");
INSERT INTO products VALUES("18","3","10","The hobbit smaug","The hobbit smaug","The hobbit smaug the fire-drake 1:100 scale statue by weta workshop","The hobbit smaug the fire-drake 1:100 scale statue by weta workshop","product1659340314.webp","500","400","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">From the certified cool-stuff addicts at Weta Workshop comes the \"Helm\" a new&nbsp;series of collectibles featuring iconic&nbsp;props from - The Lord of the Rings. Weta Workshop is one of the coolest collectibles brands based out of Aotearoa New Zealand.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Smaug had no equal in the lands of Dwarves and Men as a living embodiment of dread, magnificent in excess, and gluttonous beyond restraint. The Hobbit: Smaug the Fire-Drake 1:100 Scale Statue depicts the fearsome dragon, who stands 34 1/2-inches tall.<br><br>Gary Hunt digitally sculpted this limited edition statue, which includes an age-worn ancient Dwarven statue. Measures approximately 32 3/4\" long by 17\" wide.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">From the certified cool-stuff addicts at Weta Workshop comes the \"Helm\" a new&nbsp;series of collectibles featuring iconic&nbsp;props from - The Lord of the Rings. Weta Workshop is one of the coolest collectibles brands based out of Aotearoa New Zealand.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Smaug had no equal in the lands of Dwarves and Men as a living embodiment of dread, magnificent in excess, and gluttonous beyond restraint. The Hobbit: Smaug the Fire-Drake 1:100 Scale Statue depicts the fearsome dragon, who stands 34 1/2-inches tall.<br><br>Gary Hunt digitally sculpted this limited edition statue, which includes an age-worn ancient Dwarven statue. Measures approximately 32 3/4\" long by 17\" wide.</p>","1","1","3","","30","30","","6","2","78619910df","4","3","1","8","2","7","5","1","0","A","2022-08-01 13:21:53");
INSERT INTO products VALUES("19","3","10","Godzilla","Godzilla","Godzilla gallery 1991 godzilla deluxe statue by diamond select toys","Godzilla gallery 1991 godzilla deluxe statue by diamond select toys","product1659340440.jpg","1200","1000","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">A new line of Gallery PVC Dioramas rises from the depths! Each diorama depicts Godzilla, his allies, and his enemies with meticulous sculptural and paint detail.<br><br>This first offering depicts Godzilla in his 1991 appearance from Godzilla vs. King Ghidorah and stands approximately 10 inches tall. Joe Allard designed it, and Jorge Santos Souza sculpted it.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive&nbsp;Godzilla&nbsp;and&nbsp;Diamond Select Toys online store for collectible statues, action figures, and other merchandise!</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">A new line of Gallery PVC Dioramas rises from the depths! Each diorama depicts Godzilla, his allies, and his enemies with meticulous sculptural and paint detail.<br><br>This first offering depicts Godzilla in his 1991 appearance from Godzilla vs. King Ghidorah and stands approximately 10 inches tall. Joe Allard designed it, and Jorge Santos Souza sculpted it.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive&nbsp;Godzilla&nbsp;and&nbsp;Diamond Select Toys online store for collectible statues, action figures, and other merchandise!</p>","1","1","4","","30","30","","6","2","786979628e","","6","4","7","3","7","5","1","0","A","2022-08-01 13:23:59");
INSERT INTO products VALUES("20","4","12","Blue lamborghini","Blue lamborghini","Blue lamborghini v12 vision gran turismo 1/18 scale die cast car by maisto","Blue lamborghini v12 vision gran turismo 1/18 scale die cast car by maisto","product1659340730.jpg","500","400","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Lamborghini V12 Vision Gran Turismo concept uses the powertrain from the Lamborghini Sián FKP 37 - a naturally aspirated 6.5-litre V12 engine coupled with a mild-hybrid system. Lamborghini\'s V12 Vision GT is a concept racing car made for the Sony PlayStation 4 game Gran Turismo Sport racing.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toy Store brings you a 1/18 Scale of this ravishing car is made of high-quality Die-Cast metal and painted to perfection this car achieves all the details of the real one and features opening doors and hoods. Making it an absolute must-have for any car collector.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Lamborghini V12 Vision Gran Turismo concept uses the powertrain from the Lamborghini Sián FKP 37 - a naturally aspirated 6.5-litre V12 engine coupled with a mild-hybrid system. Lamborghini\'s V12 Vision GT is a concept racing car made for the Sony PlayStation 4 game Gran Turismo Sport racing.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toy Store brings you a 1/18 Scale of this ravishing car is made of high-quality Die-Cast metal and painted to perfection this car achieves all the details of the real one and features opening doors and hoods. Making it an absolute must-have for any car collector.</p>","1","1","6","","30","30","","6","2","787b9a1582","1","11","4","7","5","5","1","0","0","A","2022-08-01 13:28:49");
INSERT INTO products VALUES("21","4","12","Green lamborghini","Green lamborghini","Green lamborghini v12 vision gran turismo 1/18 scale die cast car by maisto","Green lamborghini v12 vision gran turismo 1/18 scale die cast car by maisto","product1659340908.jpg","1500","1300","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Lamborghini V12 Vision Gran Turismo concept uses the powertrain from the Lamborghini Sián FKP 37 - a naturally aspirated 6.5-litre V12 engine coupled with a mild-hybrid system. Lamborghini\'s V12 Vision GT is a concept racing car made for the Sony PlayStation 4 game Gran Turismo Sport racing.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toy Store brings you a 1/18 Scale of this ravishing car is made of high-quality Die-Cast metal and painted to perfection this car achieves all the details of the real one and features opening doors and hoods. Making it an absolute must-have for any car collector.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Lamborghini V12 Vision Gran Turismo concept uses the powertrain from the Lamborghini Sián FKP 37 - a naturally aspirated 6.5-litre V12 engine coupled with a mild-hybrid system. Lamborghini\'s V12 Vision GT is a concept racing car made for the Sony PlayStation 4 game Gran Turismo Sport racing.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toy Store brings you a 1/18 Scale of this ravishing car is made of high-quality Die-Cast metal and painted to perfection this car achieves all the details of the real one and features opening doors and hoods. Making it an absolute must-have for any car collector.</p>","1","1","4","","30","30","","6","2","7886bee771","3","8","1","7","5","5","3","0","0","A","2022-08-01 13:31:47");
INSERT INTO products VALUES("22","4","12","Chevrolet corvette C8","Chevrolet corvette C8","Chevrolet corvette c8.R #3 corvette racing 2021 imsa sebring 12 hrs 1:64 scale car by mini gt","Chevrolet corvette c8.R #3 corvette racing 2021 imsa sebring 12 hrs 1:64 scale car by mini gt","product1659341035.jpg","1400","1000","<div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><div class=\"revealer\"><div class=\"revealer-summary\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em;\">Over the years have been bringing you your favourite rides in die-cast form from popular brands across the world.&nbsp;We are making our garage of&nbsp;cars even bigger with one of the most premium brands in the Die-Cast model world&nbsp;Mini GT.<br></p></div></div></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toystore brings you a 1:64 Scale of this Chevrolet Corvette C8.R #3 Corvette Racing 2021 IMSA Sebring 12 Hrs which is made of high-quality Die-Cast metal and painted to perfection this officially licensed model car&nbsp;features&nbsp;a premium level of detailing&nbsp;which is on par with the real one and features&nbsp;<span data-mce-fragment=\"1\">a&nbsp;</span><span data-mce-fragment=\"1\">detailed interior</span>. Making it an absolute must-have for any car collector.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive online store for Officially Licensed Mini GT Die-Cast Model cars!</p>","<div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><div class=\"revealer\"><div class=\"revealer-summary\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em;\">Over the years have been bringing you your favourite rides in die-cast form from popular brands across the world.&nbsp;We are making our garage of&nbsp;cars even bigger with one of the most premium brands in the Die-Cast model world&nbsp;Mini GT.<br></p></div></div></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toystore brings you a 1:64 Scale of this Chevrolet Corvette C8.R #3 Corvette Racing 2021 IMSA Sebring 12 Hrs which is made of high-quality Die-Cast metal and painted to perfection this officially licensed model car&nbsp;features&nbsp;a premium level of detailing&nbsp;which is on par with the real one and features&nbsp;<span data-mce-fragment=\"1\">a&nbsp;</span><span data-mce-fragment=\"1\">detailed interior</span>. Making it an absolute must-have for any car collector.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by Superhero Toystore,&nbsp;India\'s largest and most comprehensive online store for Officially Licensed Mini GT Die-Cast Model cars!</p>","1","1","2","","30","30","","6","2","788eb325bb","4","6","3","7","3","3","1","0","0","A","2022-08-01 13:33:55");
INSERT INTO products VALUES("23","4","12","Desert jeep willy","Desert jeep willy","Adventures of tintin - desert jeep willy 1:24 scale car by moulinsart","Adventures of tintin - desert jeep willy 1:24 scale car by moulinsart","product1659341178.jpg","700","500","<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span class=\"s1\">The Adventures of Tintin (French: Les Aventures de Tintin) is a series of comic albums created by Belgian cartoonist Georges Remi (1907–1983), who wrote under the pen name Hergé. The series was one of the most popular European comics of the 20th century. By the time of the centenary of Hergé\'s birth in 2007, Tintin had been published in more than 70 languages with sales of more than 200 million copies.</span></p><div class=\"single-descriptiontext\" style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><div class=\"wpsc_description\"><p _msttexthash=\"56035642\" _msthash=\"2337296\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em;\">This 1:24 Scale model&nbsp;Desert Jeep Willy&nbsp;from the comic Tintin in the&nbsp;land of black gold. Recreating the desert scene from the comic featuring Tintin and Thompson and their adventure through the desert. It comes with a mini-comic with the moment captured on the cover.</p></div></div><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span class=\"s1\">Check out our range of other Tintin products like Cars, statues, figurines, and keychains by Moulinsart on Superhero Toystore and Bring them home.</span></p>","<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span class=\"s1\">The Adventures of Tintin (French: Les Aventures de Tintin) is a series of comic albums created by Belgian cartoonist Georges Remi (1907–1983), who wrote under the pen name Hergé. The series was one of the most popular European comics of the 20th century. By the time of the centenary of Hergé\'s birth in 2007, Tintin had been published in more than 70 languages with sales of more than 200 million copies.</span></p><div class=\"single-descriptiontext\" style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><div class=\"wpsc_description\"><p _msttexthash=\"56035642\" _msthash=\"2337296\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em;\">This 1:24 Scale model&nbsp;Desert Jeep Willy&nbsp;from the comic Tintin in the&nbsp;land of black gold. Recreating the desert scene from the comic featuring Tintin and Thompson and their adventure through the desert. It comes with a mini-comic with the moment captured on the cover.</p></div></div><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span class=\"s1\">Check out our range of other Tintin products like Cars, statues, figurines, and keychains by Moulinsart on Superhero Toystore and Bring them home.</span></p>","1","1","1","","30","30","","6","2","78979b383b","","3","1","7","5","5","3","0","0","A","2022-08-01 13:36:17");
INSERT INTO products VALUES("24","4","12","1939 Red ford deluxe","1939 Red ford deluxe","1939 red ford deluxe 1/18 scale die-cast car by maisto","1939 red ford deluxe 1/18 scale die-cast car by maisto","product1659341336.jpg","900","700","<div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><div class=\"revealer\"><div class=\"revealer-summary\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em;\">Americans sped through the 1930s in a variety of vehicles. This 1939 Ford convertible coupe provided drivers with a V-8 engine, 1930s styling, and something new for a Ford -- hydraulic brakes. This was also the last year Ford equipped its vehicles with a rumble seat.</p></div></div></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toy Store brings you a 1:18 Scale of this 1939 Ford Deluxe is made of high-quality Die-Cast metal and painted to perfection this car achieves all the details of the real one and features opening doors and hoods. Making it an absolute must-have for any car collector.</p>","<div style=\"color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><div class=\"revealer\"><div class=\"revealer-summary\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em;\">Americans sped through the 1930s in a variety of vehicles. This 1939 Ford convertible coupe provided drivers with a V-8 engine, 1930s styling, and something new for a Ford -- hydraulic brakes. This was also the last year Ford equipped its vehicles with a rumble seat.</p></div></div></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Superhero Toy Store brings you a 1:18 Scale of this 1939 Ford Deluxe is made of high-quality Die-Cast metal and painted to perfection this car achieves all the details of the real one and features opening doors and hoods. Making it an absolute must-have for any car collector.</p>","1","1","1","","30","30","","6","2","78a18557fa","1","7","2","8","5","2","3","0","0","A","2022-08-01 13:38:56");
INSERT INTO products VALUES("25","5","15","Hellboy golden army","Hellboy golden army","Hellboy golden army minico statue by iron studios","Hellboy golden army minico statue by iron studios","product1659342191.jpg","800","700","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The red giant with yellow eyes and black hair plays with his kitten with his long tail and stone right hand, while quenching his thirst with a can of his favourite beverage, next to one of his many small feline pets. He wears an overcoat and tactical pants and boots while carrying the monster-slaying Samaritan on his waist.<br><br>Bearing the logo of the B.P.R.D., an organisation of which he is a member. Iron Studios\' 5.9-inch stylized Toy Art version Hellboy - MiniCo figure is here, inspired by his original film, honours one of the most beloved and charismatic modern heroes in comics, movies, animations, and video games.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Iron Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official&nbsp;Marvel&nbsp;Studios and Doctor Strange Action Figures, Statues, and other Pop-culture merch!</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The red giant with yellow eyes and black hair plays with his kitten with his long tail and stone right hand, while quenching his thirst with a can of his favourite beverage, next to one of his many small feline pets. He wears an overcoat and tactical pants and boots while carrying the monster-slaying Samaritan on his waist.<br><br>Bearing the logo of the B.P.R.D., an organisation of which he is a member. Iron Studios\' 5.9-inch stylized Toy Art version Hellboy - MiniCo figure is here, inspired by his original film, honours one of the most beloved and charismatic modern heroes in comics, movies, animations, and video games.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Iron Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official&nbsp;Marvel&nbsp;Studios and Doctor Strange Action Figures, Statues, and other Pop-culture merch!</p>","1","1","1","","30","30","","6","2","78d6ee9b84","1","2","2","7","4","7","5","0","0","A","2022-08-01 13:53:10");
INSERT INTO products VALUES("26","7","18","Iron man backpack","Iron man backpack","Backpack","Backpack","product1659342406.jpg","80","50","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">If you want to be Tony Stark-level cool then you need a place to store your suit, armour, and sarcasm. Superhero Toy Store brings you this cool backpack with features that an avenger like you needs. It\'s trendy style and eye-popping colors will surely turn heads when you are on the go.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Awesome Backpack comes with a Soft texture featuring your favorite character and a Rubber Pullar and Padded Shoulder Straps for comfort. It also has 2 main compartments with a durable zip for storing all your books and has a dedicated space for your Laptop. In the Front zip pocket is very spacious for small accessories like stationaries or Power Banks and It also has Bottle compartments on both sides of the bags.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Bag is perfect for anyone, Student or Working.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">If you want to be Tony Stark-level cool then you need a place to store your suit, armour, and sarcasm. Superhero Toy Store brings you this cool backpack with features that an avenger like you needs. It\'s trendy style and eye-popping colors will surely turn heads when you are on the go.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Awesome Backpack comes with a Soft texture featuring your favorite character and a Rubber Pullar and Padded Shoulder Straps for comfort. It also has 2 main compartments with a durable zip for storing all your books and has a dedicated space for your Laptop. In the Front zip pocket is very spacious for small accessories like stationaries or Power Banks and It also has Bottle compartments on both sides of the bags.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Bag is perfect for anyone, Student or Working.</p>","1","1","1","","30","30","","6","2","78e4593e24","1","2","4","3","6","6","5","1","0","A","2022-08-01 13:56:45");
INSERT INTO products VALUES("27","7","18","Spiderman red & blue backpack","Spiderman red & blue backpack","Backpack","Backpack","product1659342526.jpg","100","80","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Be the Spiderman of your school Superhero Toy Store brings you this colorful Small Backpack featuring the friendly neighborhood Spiderman printed on this backpack to amaze your child. The zips of the bag have good smoothness that is designed carefully for your kid\'s tender little hands. This official bag is made of durable materials and has good space with one main compartment and one front pocket to fit in all the essentials of your little one.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gift Your little one this cool bag today.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Bag Dimensions: 21 x 9 x 25 cm</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Be the Spiderman of your school Superhero Toy Store brings you this colorful Small Backpack featuring the friendly neighborhood Spiderman printed on this backpack to amaze your child. The zips of the bag have good smoothness that is designed carefully for your kid\'s tender little hands. This official bag is made of durable materials and has good space with one main compartment and one front pocket to fit in all the essentials of your little one.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gift Your little one this cool bag today.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Bag Dimensions: 21 x 9 x 25 cm</p>","1","1","5","","30","30","","6","2","78ebe43d69","1","3","3","4","6","6","5","0","0","A","2022-08-01 13:58:46");
INSERT INTO products VALUES("28","7","18","The avengers big zipper backpack","The avengers big zipper backpack","Backpack","Backpack","product1659342697.jpg","500","300","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">To get through the hardest challenges of the day you need all the stuff for your backup like earth\'s greatest defenders. Carry your life saving stuff around in this awesome Avengers bag which has two large main zipper compartments which offer a safe spot for books or essentials of your little one while the front zipper pocket has enough space for smaller items and is in an&nbsp;easy-to-access spot.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">There are two Side Mesh Pockets for Water Bottle and Padded mesh back &amp; shoulder straps for extra support &amp; comfort of your&nbsp;little one. The bag comes with a PVC embossed print of your favorite Avengers</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gift Your little one this cool bag today.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Bag Dimensions: 31 x 20 x 41 cm</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">To get through the hardest challenges of the day you need all the stuff for your backup like earth\'s greatest defenders. Carry your life saving stuff around in this awesome Avengers bag which has two large main zipper compartments which offer a safe spot for books or essentials of your little one while the front zipper pocket has enough space for smaller items and is in an&nbsp;easy-to-access spot.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">There are two Side Mesh Pockets for Water Bottle and Padded mesh back &amp; shoulder straps for extra support &amp; comfort of your&nbsp;little one. The bag comes with a PVC embossed print of your favorite Avengers</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gift Your little one this cool bag today.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Bag Dimensions: 31 x 20 x 41 cm</p>","1","1","10","","30","30","","6","2","78f68a0529","3","5","4","7","2","6","5","0","0","A","2022-08-01 14:01:36");
INSERT INTO products VALUES("29","7","18","Spiderman big zipper backpack","Spiderman big zipper backpack","Backpack","Backpack","product1659342806.jpg","300","200","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">To be the Friendly neighborhood Spiderman you need all the stuff in the world. Carry them around in this awesome Spiderman bag which has two large main zipper compartments which offer a safe spot for books or essentials of your little one while the front zipper pocket has enough space for smaller items and is in an&nbsp;easy-to-access spot.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">There are two Side Mesh Pockets for Water Bottle and Padded mesh back &amp; shoulder straps for extra support &amp; comfort of your&nbsp;little one. The bag comes with a PVC embossed print of your favorite Spidey!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gift Your little one this cool bag today.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Bag Dimensions: 31 x 20 x 41 cm</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">To be the Friendly neighborhood Spiderman you need all the stuff in the world. Carry them around in this awesome Spiderman bag which has two large main zipper compartments which offer a safe spot for books or essentials of your little one while the front zipper pocket has enough space for smaller items and is in an&nbsp;easy-to-access spot.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">There are two Side Mesh Pockets for Water Bottle and Padded mesh back &amp; shoulder straps for extra support &amp; comfort of your&nbsp;little one. The bag comes with a PVC embossed print of your favorite Spidey!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Gift Your little one this cool bag today.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Bag Dimensions: 31 x 20 x 41 cm</p>","1","1","6","","30","30","","6","2","78fd662a0b","","3","2","6","6","6","5","0","0","A","2022-08-01 14:03:26");
INSERT INTO products VALUES("30","7","18","Captain america white backpack","Captain america white backpack","Backpack","Backpack","product1659342943.jpg","250","200","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">To do it all day like Captain America you need all your stuff. Superhero Toy Store brings you this cool backpack&nbsp;with features that an avenger like you needs. It\'s trendy style and eye-popping colors will surely turn heads when you are on the go.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Awesome Backpack comes with a Soft texture featuring your favorite character and a Rubber Pullar and Padded Shoulder Straps for comfort. It also has&nbsp;2 main compartments with a durable zip for storing all your books and has a dedicated space for your Laptop. In the Front zip pocket is very spacious for small accessories like stationaries or Power Banks and It also has Bottle compartments on both sides of the bags.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Bag is perfect for anyone, Student or Working.</p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">To do it all day like Captain America you need all your stuff. Superhero Toy Store brings you this cool backpack&nbsp;with features that an avenger like you needs. It\'s trendy style and eye-popping colors will surely turn heads when you are on the go.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Awesome Backpack comes with a Soft texture featuring your favorite character and a Rubber Pullar and Padded Shoulder Straps for comfort. It also has&nbsp;2 main compartments with a durable zip for storing all your books and has a dedicated space for your Laptop. In the Front zip pocket is very spacious for small accessories like stationaries or Power Banks and It also has Bottle compartments on both sides of the bags.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">This Bag is perfect for anyone, Student or Working.</p>","1","1","6","","30","30","","6","2","7905f0a445","2","2","1","4","6","6","5","1","0","A","2022-08-01 14:05:43");
INSERT INTO products VALUES("31","5","15","Jill valentine","Jill valentine","Jill valentine resident evil 3 deluxe statue by prime 1 studio","Jill valentine resident evil 3 deluxe statue by prime 1 studio","product1659343146.jpg","560","500","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Jill runs down a set of stairs on her cinematic base, just out of reach of an infected zombie! As if that wasn\'t bad enough, a snarling Zombie Dog has just lunged at her for a fatal attack in the Deluxe version. All of this while Raccoon City burns around her! This tense atmosphere and ominous danger of Resident Evil&nbsp;have been captured by Prime 1 Studio sculptors in vivid detail. Jill\'s seemingly simple outfit is richly detailed with textural sculpting and intricate detailing.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">They have done a magnificent paint job by successfully balancing realism and artistic interpretation to bring the best visual and environmental effects using the game as solid inspiration. You get to choose between two different Jill Valentine portraits! The weathering, shading, and highlighting of the piece determine the mood of the statue. Add to that the amazing LED illumination and you have the ultimate Resident Evil Collectible here!<br><br><span data-mce-fragment=\"1\">Proudly brought to you by Prime 1&nbsp;Studio and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Resident Evil Action Figures, Statues, and other Pop-culture merch!</span></p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Jill runs down a set of stairs on her cinematic base, just out of reach of an infected zombie! As if that wasn\'t bad enough, a snarling Zombie Dog has just lunged at her for a fatal attack in the Deluxe version. All of this while Raccoon City burns around her! This tense atmosphere and ominous danger of Resident Evil&nbsp;have been captured by Prime 1 Studio sculptors in vivid detail. Jill\'s seemingly simple outfit is richly detailed with textural sculpting and intricate detailing.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">They have done a magnificent paint job by successfully balancing realism and artistic interpretation to bring the best visual and environmental effects using the game as solid inspiration. You get to choose between two different Jill Valentine portraits! The weathering, shading, and highlighting of the piece determine the mood of the statue. Add to that the amazing LED illumination and you have the ultimate Resident Evil Collectible here!<br><br><span data-mce-fragment=\"1\">Proudly brought to you by Prime 1&nbsp;Studio and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official Resident Evil Action Figures, Statues, and other Pop-culture merch!</span></p>","1","1","12","","30","30","","6","2","79129f0c08","4","3","1","2","5","7","5","0","0","A","2022-08-01 14:09:05");
INSERT INTO products VALUES("32","5","15","Penguin","Penguin","Penguin (concept design by jason fabok) statue by prime 1 studio","Penguin (concept design by jason fabok) statue by prime 1 studio","product1659343306.jpg","400","300","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Everyone knows that Batman has the most colourful and prolific villains of any superhero. And among the very top is Gotham City\'s top business mogul and crime boss, Oswald Cobblepot aka Penguin, who is a constant thorn in Batman\'s side and a fan favourite of ours!<br data-mce-fragment=\"1\"><br data-mce-fragment=\"1\">The talented sculptors and painters at Prime 1 Studio had a great time bringing Jason Fabok\'s latest statue to life. They infused this 24.8-inch-tall statue with as many real-world textures and realistic detailing as they could. He appears to be prepared for a night out in the crime town! The Penguin is dressed to impress in his top hat, fur-lined leather coat, and signature umbrella.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Surrounded by his blatant display of wealth, The Penguin looks sharp on his own rooftop base, adorned with a light dusting of snow, which is telling of which season this famous Gothamite is celebrating.<br></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-fragment=\"\">Proudly brought to you by&nbsp;Prime 1 Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch!</span></p>","<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Everyone knows that Batman has the most colourful and prolific villains of any superhero. And among the very top is Gotham City\'s top business mogul and crime boss, Oswald Cobblepot aka Penguin, who is a constant thorn in Batman\'s side and a fan favourite of ours!<br data-mce-fragment=\"1\"><br data-mce-fragment=\"1\">The talented sculptors and painters at Prime 1 Studio had a great time bringing Jason Fabok\'s latest statue to life. They infused this 24.8-inch-tall statue with as many real-world textures and realistic detailing as they could. He appears to be prepared for a night out in the crime town! The Penguin is dressed to impress in his top hat, fur-lined leather coat, and signature umbrella.<br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Surrounded by his blatant display of wealth, The Penguin looks sharp on his own rooftop base, adorned with a light dusting of snow, which is telling of which season this famous Gothamite is celebrating.<br></p><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><ul style=\"margin-bottom: 20px; list-style-position: outside; list-style-image: initial; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\"><span data-mce-fragment=\"\">Proudly brought to you by&nbsp;Prime 1 Studios and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official DC Comics Action Figures, Statues, and other Pop-culture merch!</span></p>","1","1","1","","30","30","","6","2","791c9df2d4","","5","1","4","3","2","3","1","0","A","2022-08-01 14:11:45");
INSERT INTO products VALUES("33","5","15","Grog - Vox machina","Grog - Vox machina","Grog - vox machina statue by sideshow collectibles","Grog - vox machina statue by sideshow collectibles","product1659343496.jpg","700","500","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Sideshow introduces our Grog - Vox Machina Statue, charging into the Critical Role collection. This statue stands 13.5\" tall and is fully sculpted to bring the Herd of Storms\' hulking half-giant to life in three dimensions.<br><br>Grog Strongjaw has a hardened exterior and a soft heart, and he\'s here to tear his way through Tal\'Dorei and take more than a few arrows for the team. Grog screams a war cry as he prepares his bloodied axe for another battle. He is depicted here as a high-level brawler, wearing his signature skull spaulder, a dwarven belt for strength, and the Titanstone Knuckles, one of the Vestiges of Divergence.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Grog - Vox Machina Statue by Sideshow has a hexagonal faux-stone figure base engraved with the Vox Machina monogram to match his other teammates in the collection. This Critical Role figure is designed with great detail and incredible musculature, complete with his robust beard, a bear tattoo on his back, and several open wounds that are only mere scratches to this tough hero.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Sideshow Collectibles and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official&nbsp;Vox Machina Action Figures, Statues, and other Pop-culture merch!</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Sideshow introduces our Grog - Vox Machina Statue, charging into the Critical Role collection. This statue stands 13.5\" tall and is fully sculpted to bring the Herd of Storms\' hulking half-giant to life in three dimensions.<br><br>Grog Strongjaw has a hardened exterior and a soft heart, and he\'s here to tear his way through Tal\'Dorei and take more than a few arrows for the team. Grog screams a war cry as he prepares his bloodied axe for another battle. He is depicted here as a high-level brawler, wearing his signature skull spaulder, a dwarven belt for strength, and the Titanstone Knuckles, one of the Vestiges of Divergence.</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Grog - Vox Machina Statue by Sideshow has a hexagonal faux-stone figure base engraved with the Vox Machina monogram to match his other teammates in the collection. This Critical Role figure is designed with great detail and incredible musculature, complete with his robust beard, a bear tattoo on his back, and several open wounds that are only mere scratches to this tough hero.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Proudly brought to you by&nbsp;Sideshow Collectibles and&nbsp;Superhero Toystore, India\'s largest and most comprehensive online store for official&nbsp;Vox Machina Action Figures, Statues, and other Pop-culture merch!</p>","1","1","10","","30","30","","6","2","7928863aef","2","5","2","7","2","7","5","0","0","A","2022-08-01 14:14:56");
INSERT INTO products VALUES("34","5","15","A Thief End Nathan Drake","A Thief End Nathan Drake","Uncharted 4: a thief\'s end nathan drake deluxe statue by prime 1 studio","Uncharted 4: a thief\'s end nathan drake deluxe statue by prime 1 studio","product1659343731.jpg","400","300","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Can you disagree if we say Uncharted is one of the best games of all time?<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Nathan Drake makes Uncharted one of the most enjoyable video games ever! With their Ultimate Premium Masterline statue, Prime 1 Studio proudly presents the&nbsp;ultimate chapter of Nathan Drake\'s epic saga: the 1:4 Scale Nathan Drake from Uncharted 4: A Thief\'s End!</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The artists have posed an extremely acrobatic Nathan in the midst of yet another exciting adventure in this thrilling 27-inch tall statue. He dangles from a wooden beam that supports a cage containing a long-dead crewmate of the famed pirate, Henry Avery! Nathan points his trusty sidearm at an unidentified combatant.<br><br>Prime 1\'s skilled artisans have included a variety of textures and materials in this statue, emphasising the significance of the source material in its creation. The world of Uncharted is filled with detail, grit, and atmosphere. When creating this magnificent figure, the Studio took full advantage of this! The weathering, dirt, and grime come to life thanks to the painting masters\' lifelike rendering.</p>","<p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Can you disagree if we say Uncharted is one of the best games of all time?<br></p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">Nathan Drake makes Uncharted one of the most enjoyable video games ever! With their Ultimate Premium Masterline statue, Prime 1 Studio proudly presents the&nbsp;ultimate chapter of Nathan Drake\'s epic saga: the 1:4 Scale Nathan Drake from Uncharted 4: A Thief\'s End!</p><p data-mce-fragment=\"1\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.6em; color: rgb(64, 64, 64); font-family: Roboto, sans-serif; font-size: 15px;\">The artists have posed an extremely acrobatic Nathan in the midst of yet another exciting adventure in this thrilling 27-inch tall statue. He dangles from a wooden beam that supports a cage containing a long-dead crewmate of the famed pirate, Henry Avery! Nathan points his trusty sidearm at an unidentified combatant.<br><br>Prime 1\'s skilled artisans have included a variety of textures and materials in this statue, emphasising the significance of the source material in its creation. The world of Uncharted is filled with detail, grit, and atmosphere. When creating this magnificent figure, the Studio took full advantage of this! The weathering, dirt, and grime come to life thanks to the painting masters\' lifelike rendering.</p>","1","1","12","","30","30","","6","2","793732a6b5","4","6","4","2","3","6","5","0","0","A","2022-08-01 14:18:51");



DROP TABLE subcategory;

CREATE TABLE `subcategory` (
  `sc_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int DEFAULT NULL,
  `sc_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sc_name_arab` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sc_image` varchar(2000) DEFAULT NULL,
  `sc_guide` varchar(2000) DEFAULT NULL COMMENT 'Image file for size chart etc',
  `sc_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sc_id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

INSERT INTO subcategory VALUES("1","1","Super Heroes","Super Heroes","subcat1659198805.jpg","guide1659198805.","2022-07-30 22:03:24");
INSERT INTO subcategory VALUES("2","1","Play Sets","Play Sets","subcat1659198896.jpg","guide1659198896.","2022-07-30 22:04:55");
INSERT INTO subcategory VALUES("3","1","Cartoon Characters","Cartoon Characters","subcat1659198967.jpg","guide1659198967.","2022-07-30 22:06:07");
INSERT INTO subcategory VALUES("4","2","Movie Characters","Movie Characters","subcat1659337182.jpg","guide1659199042.","2022-08-01 12:29:42");
INSERT INTO subcategory VALUES("5","2","Cartoon Characters","Cartoon Characters","subcat1659337272.jpg","guide1659199080.","2022-08-01 12:31:11");
INSERT INTO subcategory VALUES("6","2","Animals Collections","Animals Collections","subcat1659337321.jpg","guide1659199159.","2022-08-01 12:32:00");
INSERT INTO subcategory VALUES("7","2","Creative Characters","Creative Characters","subcat1659337365.jpeg","guide1659199390.","2022-08-01 12:32:45");
INSERT INTO subcategory VALUES("8","3","Animals","Animals","subcat1659339500.png","guide1659199432.","2022-08-01 13:08:19");
INSERT INTO subcategory VALUES("9","3","Dolls","Dolls","subcat1659199476.jpg","guide1659199476.","2022-08-01 13:09:26");
INSERT INTO subcategory VALUES("10","3","Creative Characters","Creative Characters","subcat1659339543.jpg","guide1659199613.","2022-08-01 13:09:03");
INSERT INTO subcategory VALUES("11","4","RC Robots","RC Robots","subcat1659199666.jpg","guide1659199666.","2022-07-30 22:17:46");
INSERT INTO subcategory VALUES("12","4","RC Cars","RC Cars","subcat1659199723.jpg","guide1659199723.","2022-07-30 22:18:42");
INSERT INTO subcategory VALUES("13","4","Electronic Pets","Electronic Pets","subcat1659199885.jpeg","guide1659199885.","2022-07-30 22:21:25");
INSERT INTO subcategory VALUES("14","4","Music Players","Music Players","subcat1659199939.jpeg","guide1659199939.","2022-07-30 22:22:18");
INSERT INTO subcategory VALUES("15","5","Desk Toys","Desk Toys","subcat1659200006.jpg","guide1659200006.","2022-07-30 22:23:26");
INSERT INTO subcategory VALUES("16","5","Indoor Games","Indoor Games","subcat1659200153.jpeg","guide1659200153.","2022-07-30 22:25:52");
INSERT INTO subcategory VALUES("17","5","Outdoor Games","Outdoor Games","subcat1659200194.jpg","guide1659200194.","2022-07-30 22:26:33");
INSERT INTO subcategory VALUES("18","7","Bags","Bags","subcat1659341939.jpg","guide1659341939.","2022-08-01 13:48:58");
INSERT INTO subcategory VALUES("19","7","Mugs","Mugs","subcat1659341980.jpeg","guide1659341980.","2022-08-01 13:49:39");
INSERT INTO subcategory VALUES("20","7","Key Chains","Key Chains","subcat1659342050.jpg","guide1659342050.","2022-08-01 13:50:49");



DROP TABLE user;

CREATE TABLE `user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '3796',
  `profile_pic` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `email_verify` int NOT NULL DEFAULT '0',
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `address` varchar(200) DEFAULT NULL,
  `lat` double DEFAULT '0',
  `lng` double DEFAULT '0',
  `map_city` varchar(2000) DEFAULT NULL,
  `rating` int DEFAULT '1',
  `count` int DEFAULT '0',
  `about` varchar(2000) DEFAULT NULL,
  `wallet` int NOT NULL DEFAULT '0',
  `fbtoken` varchar(2000) DEFAULT NULL,
  `u_active` int NOT NULL DEFAULT '1',
  `u_dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

INSERT INTO user VALUES("1","Ayyappan","971","3796","","9486884277","whatnextayyappan@gmail.com","0","male","","0","0","","1","0","","0","f2p31_JqRV6sOD7t0cy1iQ:APA91bESLZlXbIctqklJLSKMY1q1FYIZZ3dbSKkKKdU1qGEkpMrLbbwP29lxz-yHE18wp7y9kZp7H8CehqZ4ZEoHNg8aLorxyXhcvktE2fVkQ2OYDz-yzAiyA2VAG977yfyIIhyJ5QHs","1","2022-08-02 22:10:08");



DROP TABLE wallet;

CREATE TABLE `wallet` (
  `w_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `w_amount` varchar(2000) DEFAULT NULL,
  `w_detail` varchar(2000) DEFAULT NULL,
  `w_type` int DEFAULT '1',
  `trans` varchar(200) DEFAULT NULL,
  `w_dated` datetime DEFAULT CURRENT_TIMESTAMP,
  `w_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`w_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




