/*
Navicat MySQL Data Transfer

Source Server         : MySQL_DBLocal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : framgia_real

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-20 11:30:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'TÃªn danh má»¥c',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'HÃ  CÃ´ng ThÃ nh', '2018-10-16 16:52:45', '2018-10-17 11:18:21', '2018-10-17 11:18:21');
INSERT INTO `categories` VALUES ('2', 'ÄÃ¡m cÆ°á»›i', '2018-10-17 09:34:34', '2018-10-17 11:33:22', null);
INSERT INTO `categories` VALUES ('3', 'Lá»… há»™i', '2018-10-17 11:18:32', '2018-10-17 11:18:32', null);
INSERT INTO `categories` VALUES ('4', 'Bá»ƒ bÆ¡i', '2018-10-17 11:19:33', '2018-10-17 11:19:33', null);
INSERT INTO `categories` VALUES ('5', 'PhÃ²ng Ä‘áº¹p', '2018-10-17 11:19:52', '2018-10-17 11:19:52', null);
INSERT INTO `categories` VALUES ('6', 'Test1', '2018-11-18 00:00:54', '2018-11-18 00:01:04', '2018-11-18 00:01:04');

-- ----------------------------
-- Table structure for category_post
-- ----------------------------
DROP TABLE IF EXISTS `category_post`;
CREATE TABLE `category_post` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `category_post_category_id_foreign` (`category_id`),
  CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_post
-- ----------------------------
INSERT INTO `category_post` VALUES ('1', '2', null, null, null);
INSERT INTO `category_post` VALUES ('2', '3', null, null, null);
INSERT INTO `category_post` VALUES ('3', '4', null, null, null);
INSERT INTO `category_post` VALUES ('4', '5', null, null, null);

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for customer_booking_details
-- ----------------------------
DROP TABLE IF EXISTS `customer_booking_details`;
CREATE TABLE `customer_booking_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_booking_log_id` int(10) unsigned NOT NULL COMMENT 'ID nháº­t kÃ½ thuÃª phÃ²ng',
  `room_type_id` int(10) unsigned NOT NULL COMMENT 'ID loáº¡i phÃ²ng',
  `number_room` tinyint(4) NOT NULL COMMENT 'Sá»‘ lÆ°á»£ng phÃ²ng thuÃª cá»§a loáº¡i phÃ²ng nÃ y',
  `total_price` varchar(255) NOT NULL COMMENT 'ThÃ nh tiá»n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_booking_log_id` (`customer_booking_log_id`),
  KEY `room_type_id` (`room_type_id`),
  CONSTRAINT `customer_booking_details_ibfk_1` FOREIGN KEY (`customer_booking_log_id`) REFERENCES `customer_booking_logs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_booking_details_ibfk_2` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_booking_details
-- ----------------------------
INSERT INTO `customer_booking_details` VALUES ('2', '1', '1', '1', '9000000', '2018-11-20 11:22:22', '2018-11-20 11:22:22', null);

-- ----------------------------
-- Table structure for customer_booking_logs
-- ----------------------------
DROP TABLE IF EXISTS `customer_booking_logs`;
CREATE TABLE `customer_booking_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT 'ID khÃ¡ch hÃ ng',
  `start_date` date NOT NULL COMMENT 'NgÃ y nháº­n phÃ²ng',
  `end_date` date NOT NULL COMMENT 'NgÃ y tráº£ phÃ²ng',
  `total_number_people` tinyint(4) NOT NULL COMMENT 'Tá»•ng sá»‘ ngÆ°á»i trong láº§n thuÃª Ä‘Ã³',
  `total_number_room` tinyint(4) NOT NULL COMMENT 'Tá»•ng sá»‘ phÃ²ng thuÃª trong láº§n thuÃª Ä‘Ã³',
  `total_money` varchar(255) NOT NULL COMMENT 'Tá»•ng tiá»n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` text COMMENT 'Ghi chÃº khi Ä‘áº·t phÃ²ng',
  `seen` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: ChÆ°a xem. 1: ÄÃ£ xem',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: Deactivate, 1: Activate',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `customer_booking_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_booking_logs
-- ----------------------------
INSERT INTO `customer_booking_logs` VALUES ('1', '3', '2018-11-22', '2018-11-26', '2', '1', '36000000', '2018-11-20 11:22:22', '2018-11-20 11:23:58', null, 'Cho mÃ¬nh 1 phÃ²ng gáº§n cáº§u thang', '0', '1');

-- ----------------------------
-- Table structure for customer_cares
-- ----------------------------
DROP TABLE IF EXISTS `customer_cares`;
CREATE TABLE `customer_cares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT 'ID khÃ¡ch hÃ ng',
  `carer_id` int(10) unsigned NOT NULL COMMENT 'ID nhÃ¢n viÃªn chÄƒm sÃ³c khÃ¡ch hÃ ng',
  `customer_booking_log_id` int(10) unsigned NOT NULL COMMENT 'ID Ä‘Æ¡n Ä‘áº·t phÃ²ng',
  `title` varchar(191) NOT NULL COMMENT 'TiÃªu Ä‘á»',
  `content` text COMMENT 'Ná»™i dung',
  `type` tinyint(4) NOT NULL COMMENT '1: Gá»i Ä‘iá»‡n thoáº¡i. 2: Gá»­i tin nháº¯n. 3: Gá»­i Email',
  `status` tinyint(4) NOT NULL COMMENT '1: ÄÃ£ nghe mÃ¡y. 2: KhÃ´ng nghe mÃ¡y. 3: ThuÃª bao khÃ´ng liÃªn láº¡c Ä‘Æ°á»£c',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_cares_user_id_foreign` (`user_id`),
  KEY `customer_cares_customer_booking_log_id_foreign` (`customer_booking_log_id`),
  CONSTRAINT `customer_cares_customer_booking_log_id_foreign` FOREIGN KEY (`customer_booking_log_id`) REFERENCES `customer_booking_logs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_cares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_cares
-- ----------------------------
INSERT INTO `customer_cares` VALUES ('1', '3', '1', '1', 'Gá»i Ä‘iá»‡n', 'Gá»i thÃ´ng bÃ¡o Ä‘áº·t phÃ²ng', '1', '1', '2018-11-20 11:24:31', '2018-11-20 11:24:31', null);
INSERT INTO `customer_cares` VALUES ('2', '3', '1', '1', 'Gá»­i tin nháº¯n', 'Nháº¯n tin thÃ´ng bÃ¡o Ä‘áº·t phÃ²ng', '2', '4', '2018-11-20 11:24:47', '2018-11-20 11:24:47', null);
INSERT INTO `customer_cares` VALUES ('3', '3', '1', '1', 'XÃ¡c nháº­n Ä‘áº·t phÃ²ng - Framgia Hotel', '<p>ChÃ o anh/chá»‹&nbsp;<span id=\"name\" class=\"spanField\" style=\"font-family: Tahoma; color: black;\">KhÃ¡ch hÃ ng</span>&nbsp;, khÃ¡ch sáº¡n Framgia Hotel ráº¥t vui khi Ä‘Æ°á»£c anh/chá»‹ Ä‘áº·t phÃ²ng.</p>\n<p>Tá»•ng chi phÃ­:&nbsp;<span id=\"total_money\" class=\"spanField\" style=\"font-family: Tahoma; color: black;\">36000000</span>&nbsp;</p>\n<p>NgÃ y nháº­n phÃ²ng:&nbsp;<span id=\"start_date\" class=\"spanField\" style=\"font-family: Tahoma; color: black;\">2018-11-22</span>&nbsp;</p>\n<p>NgÃ y tráº£ phÃ²ng:&nbsp;<span id=\"end_date\" class=\"spanField\" style=\"font-family: Tahoma; color: black;\">2018-11-26</span>&nbsp;</p>\n\n<script>\n    var content = \"<p>Ch&agrave;o anh\\/ch\\u1ecb&nbsp;<span id=\\\"name\\\" class=\\\"spanField\\\" style=\\\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\\\">&nbsp;H\\u1ecd v&agrave; t&ecirc;n&nbsp;<\\/span>&nbsp;, kh&aacute;ch s\\u1ea1n Framgia Hotel r\\u1ea5t vui khi \\u0111\\u01b0\\u1ee3c anh\\/ch\\u1ecb \\u0111\\u1eb7t ph&ograve;ng.<\\/p>\\n<p>T\\u1ed5ng chi ph&iacute;:&nbsp;<span id=\\\"total_money\\\" class=\\\"spanField\\\" style=\\\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\\\">&nbsp;T\\u1ed5ng ti\\u1ec1n&nbsp;<\\/span>&nbsp;<\\/p>\\n<p>Ng&agrave;y nh\\u1eadn ph&ograve;ng:&nbsp;<span id=\\\"start_date\\\" class=\\\"spanField\\\" style=\\\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\\\">&nbsp;Ng&agrave;y nh\\u1eadn ph&ograve;ng&nbsp;<\\/span>&nbsp;<\\/p>\\n<p>Ng&agrave;y tr\\u1ea3 ph&ograve;ng:&nbsp;<span id=\\\"end_date\\\" class=\\\"spanField\\\" style=\\\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\\\">&nbsp;Ng&agrave;y tr\\u1ea3 ph&ograve;ng&nbsp;<\\/span>&nbsp;<\\/p>\";\n\n    var user = [{\"id\":3,\"name\":\"Kh\\u00e1ch h\\u00e0ng\",\"email\":\"customer@framgia.com\",\"email_verified_at\":null,\"password\":\"$2y$10$b2yXov7wh8Qq3gDTHawlG.XtjzLjSDFaV.NsTlY8boEqS5Qizae0.\",\"gender\":0,\"birthday\":\"1991-12-19\",\"mobile\":\"0969990630\",\"address\":\"S\\u1ed1 4, ng\\u00e1ch 105\\/41, ng\\u00f5 105, Y\\u00ean H\\u00f2a, C\\u1ea7u Gi\\u1ea5y, H\\u00e0 N\\u1ed9i.\",\"avatar\":null,\"rate\":null,\"review\":null,\"type\":0,\"created_at\":\"2018-11-20 10:58:47\",\"updated_at\":\"2018-11-20 11:22:08\",\"deleted_at\":null,\"expire\":12,\"card_type\":\"Visa\",\"card_number\":\"0630199612191991\",\"year\":\"2018\"}];\n\n    var customer_booking_log = [{\"id\":1,\"user_id\":3,\"start_date\":\"2018-11-22\",\"end_date\":\"2018-11-26\",\"total_number_people\":2,\"total_number_room\":1,\"total_money\":\"36000000\",\"created_at\":\"2018-11-20 11:22:22\",\"updated_at\":\"2018-11-20 11:23:58\",\"deleted_at\":null,\"note\":\"Cho m\\u00ecnh 1 ph\\u00f2ng g\\u1ea7n c\\u1ea7u thang\",\"seen\":0,\"status\":1}];\n\n    var arr = [\"name\",\"email\",\"gender\",\"birthday\",\"mobile\",\"address\",\"avatar\",\"rate\",\"review\",\"expire\",\"card_type\",\"card_number\",\"year\",\"start_date\",\"end_date\",\"total_number_people\",\"total_number_room\",\"total_money\",\"created_at\",\"note\"];\n\n    var numb = document.getElementsByClassName(\'spanField\');\n\n    for (var i = 0; i < arr.length; i++) {\n\n        for (var m = 0; m < numb.length; m++) {\n\n            if (arr[i] == numb[m].getAttribute(\'id\')) {\n\n                if (user[0][arr[i]]) {\n\n                    numb[m].innerHTML = user[0][arr[i]];\n                    \n                    numb[m].style.color = \'black\';\n\n                    numb[m].style.backgroundColor = \'\';\n\n                } else if (customer_booking_log[0][arr[i]]) {\n\n                    numb[m].innerHTML = customer_booking_log[0][arr[i]];\n                    \n                    numb[m].style.color = \'black\';\n\n                    numb[m].style.backgroundColor = \'\';\n\n                }\n\n            }\n\n        }\n        \n    }\n</script>', '3', '5', '2018-11-20 11:26:52', '2018-11-20 11:26:52', null);

-- ----------------------------
-- Table structure for email_templates
-- ----------------------------
DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL COMMENT 'TÃªn máº«u Email',
  `title` varchar(191) NOT NULL COMMENT 'TiÃªu Ä‘á» Email',
  `content` text COMMENT 'Ná»™i dung Email',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_templates_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of email_templates
-- ----------------------------
INSERT INTO `email_templates` VALUES ('1', 'XÃ¡c nháº­n Ä‘áº·t phÃ²ng', 'XÃ¡c nháº­n Ä‘áº·t phÃ²ng - Framgia Hotel', '<p>Ch&agrave;o anh/chá»‹&nbsp;<span id=\"name\" class=\"spanField\" style=\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\">&nbsp;Há» v&agrave; t&ecirc;n&nbsp;</span>&nbsp;, kh&aacute;ch sáº¡n Framgia Hotel ráº¥t vui khi Ä‘Æ°á»£c anh/chá»‹ Ä‘áº·t ph&ograve;ng.</p>\n<p>Tá»•ng chi ph&iacute;:&nbsp;<span id=\"total_money\" class=\"spanField\" style=\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\">&nbsp;Tá»•ng tiá»n&nbsp;</span>&nbsp;</p>\n<p>Ng&agrave;y nháº­n ph&ograve;ng:&nbsp;<span id=\"start_date\" class=\"spanField\" style=\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\">&nbsp;Ng&agrave;y nháº­n ph&ograve;ng&nbsp;</span>&nbsp;</p>\n<p>Ng&agrave;y tráº£ ph&ograve;ng:&nbsp;<span id=\"end_date\" class=\"spanField\" style=\"font-family: Tahoma; background-color: #ff6600; color: #ffffff;\">&nbsp;Ng&agrave;y tráº£ ph&ograve;ng&nbsp;</span>&nbsp;</p>', '2018-11-20 11:26:28', '2018-11-20 11:26:28', null);

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'TÃªn tiá»‡n Ã­ch cÃ³ trong phÃ²ng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facilities_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of facilities
-- ----------------------------
INSERT INTO `facilities` VALUES ('1', 'Wifi', '2018-10-16 16:45:04', '2018-10-16 22:32:10', null);
INSERT INTO `facilities` VALUES ('2', 'Ban cÃ´ng', '2018-10-16 22:31:46', '2018-10-16 22:31:46', null);
INSERT INTO `facilities` VALUES ('3', 'CÃ³ phÃ²ng thÃ´ng nhau qua cá»­a ná»‘i', '2018-10-16 22:32:23', '2018-10-16 22:32:23', null);
INSERT INTO `facilities` VALUES ('4', 'NhÃ¬n ra nÃºi', '2018-10-16 22:32:34', '2018-10-16 22:32:34', null);
INSERT INTO `facilities` VALUES ('5', 'NhÃ¬n ra thÃ nh phá»‘', '2018-10-16 22:32:44', '2018-10-16 22:32:44', null);
INSERT INTO `facilities` VALUES ('6', 'MaÌy sÃ¢Ìy toÌc', '2018-10-16 22:32:55', '2018-10-16 22:32:55', null);
INSERT INTO `facilities` VALUES ('7', 'Truyá»n hÃ¬nh tráº£ tiá»n', '2018-10-16 22:33:03', '2018-10-16 22:33:03', null);
INSERT INTO `facilities` VALUES ('8', 'Äá»“ vá»‡ sinh cÃ¡ nhÃ¢n miá»…n phÃ­', '2018-10-16 22:33:10', '2018-10-16 22:33:10', null);
INSERT INTO `facilities` VALUES ('9', 'TV', '2018-10-16 22:33:17', '2018-10-16 22:33:17', null);
INSERT INTO `facilities` VALUES ('10', 'ÄiÃªÌ£n thoaÌ£i', '2018-10-16 22:33:26', '2018-10-16 22:33:26', null);
INSERT INTO `facilities` VALUES ('11', 'PhÃ²ng táº¯m riÃªng', '2018-10-16 22:33:33', '2018-10-16 22:33:33', null);
INSERT INTO `facilities` VALUES ('12', 'TruyÃªÌ€n hiÌ€nh caÌp', '2018-10-16 22:33:49', '2018-10-16 22:33:49', null);
INSERT INTO `facilities` VALUES ('13', 'DeÌp', '2018-10-16 22:34:02', '2018-10-16 22:34:02', null);
INSERT INTO `facilities` VALUES ('14', 'KeÌt an toaÌ€n', '2018-10-16 22:34:10', '2018-10-16 22:34:10', null);
INSERT INTO `facilities` VALUES ('15', 'BÃ´Ì€n tÄƒÌm hoÄƒÌ£c VoÌ€i sen', '2018-10-16 22:34:19', '2018-10-16 22:34:19', null);
INSERT INTO `facilities` VALUES ('16', 'Äiá»u hÃ²a khÃ´ng khÃ­', '2018-10-16 22:34:30', '2018-10-16 22:34:30', null);
INSERT INTO `facilities` VALUES ('17', 'TuÌ‰ laÌ£nh', '2018-10-16 22:34:37', '2018-10-16 22:34:37', null);
INSERT INTO `facilities` VALUES ('18', 'Bá»¯a Äƒn sÃ¡ng', '2018-10-16 22:35:18', '2018-10-16 22:35:18', null);
INSERT INTO `facilities` VALUES ('19', 'BÃ£i Ä‘áº­u xe', '2018-10-16 22:35:40', '2018-10-16 22:35:40', null);
INSERT INTO `facilities` VALUES ('20', 'GYM', '2018-10-16 22:35:52', '2018-10-16 22:35:52', null);
INSERT INTO `facilities` VALUES ('21', 'NhÃ¬n ra biá»ƒn', '2018-10-25 10:52:02', '2018-10-25 10:52:02', null);
INSERT INTO `facilities` VALUES ('22', 'Test1', '2018-11-17 23:46:32', '2018-11-17 23:49:50', '2018-11-17 23:49:50');

-- ----------------------------
-- Table structure for facility_room_type
-- ----------------------------
DROP TABLE IF EXISTS `facility_room_type`;
CREATE TABLE `facility_room_type` (
  `room_type_id` int(10) unsigned NOT NULL,
  `facility_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`room_type_id`,`facility_id`),
  KEY `facility_room_type_facility_id_foreign` (`facility_id`),
  CONSTRAINT `facility_room_type_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facility_room_type_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of facility_room_type
-- ----------------------------
INSERT INTO `facility_room_type` VALUES ('1', '1', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '2', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '4', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '5', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '7', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '8', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '10', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '13', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '16', null, null, null);
INSERT INTO `facility_room_type` VALUES ('1', '19', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '1', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '2', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '3', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '4', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '5', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '6', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '7', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '8', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '9', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '12', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '15', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '18', null, null, null);
INSERT INTO `facility_room_type` VALUES ('2', '21', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '1', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '4', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '6', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '7', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '9', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '10', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '12', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '13', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '16', null, null, null);
INSERT INTO `facility_room_type` VALUES ('3', '19', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '1', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '2', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '4', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '5', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '7', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '8', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '10', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '11', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '13', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '16', null, null, null);
INSERT INTO `facility_room_type` VALUES ('4', '19', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '1', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '2', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '4', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '5', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '7', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '8', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '10', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '11', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '13', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '14', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '16', null, null, null);
INSERT INTO `facility_room_type` VALUES ('5', '19', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '1', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '4', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '7', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '9', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '10', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '12', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '13', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '14', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '15', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '16', null, null, null);
INSERT INTO `facility_room_type` VALUES ('6', '19', null, null, null);

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_type_id` int(10) unsigned NOT NULL,
  `filename` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_room_type_id_foreign` (`room_type_id`),
  CONSTRAINT `images_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', '1', 'img-1_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('2', '1', 'img-2_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('3', '1', 'img-3_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('4', '1', 'img-4_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('5', '1', 'img-5_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('6', '1', 'img-6_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('7', '1', 'img-7_1542686571.jpg', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `images` VALUES ('8', '2', 'img-8_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('9', '2', 'img-9_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('10', '2', 'img-10_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('11', '2', 'img-11_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('12', '2', 'img-12_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('13', '2', 'img-15_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('14', '2', 'img-16_1542686642.jpg', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `images` VALUES ('15', '3', 'img-4_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('16', '3', 'img-5_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('17', '3', 'img-6_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('18', '3', 'img-7_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('19', '3', 'img-8_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('20', '3', 'img-9_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('21', '3', 'img-15_1542686702.jpg', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `images` VALUES ('22', '4', 'img-6_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('23', '4', 'img-7_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('24', '4', 'img-8_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('25', '4', 'img-9_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('26', '4', 'img-10_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('27', '4', 'img-11_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('28', '4', 'img-18_1542686768.jpg', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `images` VALUES ('29', '5', 'img-1_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('30', '5', 'img-2_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('31', '5', 'img-4_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('32', '5', 'img-5_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('33', '5', 'img-6_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('34', '5', 'img-7_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('35', '5', 'img-8_1542686844.jpg', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `images` VALUES ('36', '6', 'img-9_1542686895.jpg', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);
INSERT INTO `images` VALUES ('37', '6', 'img-10_1542686895.jpg', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);
INSERT INTO `images` VALUES ('38', '6', 'img-11_1542686895.jpg', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);
INSERT INTO `images` VALUES ('39', '6', 'img-12_1542686895.jpg', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);
INSERT INTO `images` VALUES ('40', '6', 'img-15_1542686895.jpg', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);
INSERT INTO `images` VALUES ('41', '6', 'img-16_1542686895.jpg', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);
INSERT INTO `images` VALUES ('42', '6', 'img-17_1542686895.jpg', '2018-11-20 11:08:16', '2018-11-20 11:08:16', null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_09_26_141326_create_rooms_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_09_27_025305_create_facilities_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_09_27_025519_create_room_types_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_09_27_031728_create_benefits_table', '1');
INSERT INTO `migrations` VALUES ('7', '2018_09_27_072536_create_room_rental_lists_table', '1');
INSERT INTO `migrations` VALUES ('8', '2018_09_27_093126_create_customer_booking_logs_table', '1');
INSERT INTO `migrations` VALUES ('9', '2018_10_01_064358_create_customer_booking_details_table', '1');
INSERT INTO `migrations` VALUES ('10', '2018_10_01_081034_create_posts_table', '1');
INSERT INTO `migrations` VALUES ('11', '2018_10_01_104735_entrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('13', '2018_10_03_085531_facility_room_type', '2');
INSERT INTO `migrations` VALUES ('14', '2018_10_03_092301_create_facility_room_type_table', '3');
INSERT INTO `migrations` VALUES ('15', '2018_10_03_093401_create_categories_table', '3');
INSERT INTO `migrations` VALUES ('16', '2018_10_03_093633_create_category_post_table', '3');
INSERT INTO `migrations` VALUES ('17', '2018_10_04_021806_add_floor_to_rooms_table', '4');
INSERT INTO `migrations` VALUES ('18', '2018_10_08_133325_add_status_to_rooms_table', '5');
INSERT INTO `migrations` VALUES ('21', '2018_10_14_214740_add_payment_to_users_table', '6');
INSERT INTO `migrations` VALUES ('22', '2018_10_02_033939_create_revenues_table', '7');
INSERT INTO `migrations` VALUES ('23', '2018_10_15_225139_create_images_table', '8');
INSERT INTO `migrations` VALUES ('24', '2018_10_22_002250_add_note_and_seen_to_customer_booking_logs_table', '9');
INSERT INTO `migrations` VALUES ('25', '2018_10_22_151259_add_customer_booking_log_id_to_room_rental_lists_table', '10');
INSERT INTO `migrations` VALUES ('26', '2018_10_22_134650_create_comments_table', '11');
INSERT INTO `migrations` VALUES ('27', '2018_10_25_160005_add_status_to_customer_booking_logs_table', '12');
INSERT INTO `migrations` VALUES ('29', '2018_10_26_143844_create_customer_cares_table', '13');
INSERT INTO `migrations` VALUES ('30', '2018_10_28_152138_create_email_templates_table', '14');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('hacongthanh.game@gmail.com', '$2y$10$OfnpxormxZk8s06pVpJDa.65hl0i63NhCCBO26yTIC3ohqpMwiEcm', '2018-10-11 19:50:57');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'view-posts', 'Xem bÃ i viáº¿t', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('2', 'edit-posts', 'Sá»­a bÃ i viáº¿t', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('3', 'add-posts', 'ThÃªm bÃ i viáº¿t', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('4', 'delete-posts', 'XÃ³a bÃ i viáº¿t', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('5', 'view-room-types', 'Xem danh sÃ¡ch loáº¡i phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('6', 'add-room-types', 'ThÃªm loáº¡i phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('7', 'detail-room-types', 'Xem chi tiáº¿t loáº¡i phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('8', 'edit-room-types', 'Sá»­a loáº¡i phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('9', 'delete-room-types', 'XÃ³a loáº¡i phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('10', 'add-rooms', 'ThÃªm phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('11', 'edit-rooms', 'Sá»­a phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('12', 'delete-rooms', 'XÃ³a phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('13', 'view-facilities', 'Xem danh sÃ¡ch tiá»‡n nghi', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('14', 'add-facilities', 'ThÃªm tiá»‡n nghi', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('15', 'detail-facilities', 'Xem tiá»‡n nghi', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('16', 'edit-facilities', 'Sá»­a tiá»‡n nghi', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('17', 'delete-facilities', 'XÃ³a tiá»‡n nghi', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('18', 'view-booking-list', 'Xem danh sÃ¡ch Ä‘áº·t phÃ²ng', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('19', 'view-categories', 'Xem danh sÃ¡ch danh má»¥c', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('20', 'add-categories', 'ThÃªm danh má»¥c', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('21', 'detail-categories', 'Xem chi tiáº¿t danh má»¥c', null, '2018-11-20 10:58:48', '2018-11-20 10:58:48', null);
INSERT INTO `permissions` VALUES ('22', 'edit-categories', 'Sá»­a danh má»¥c', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('23', 'delete-categories', 'XÃ³a danh má»¥c', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('24', 'add-users', 'ThÃªm nhÃ¢n viÃªn', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('25', 'edit-users', 'Sá»­a nhÃ¢n viÃªn', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('26', 'delete-users', 'XÃ³a nhÃ¢n viÃªn', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('27', 'view-customers', 'Xem chi tiáº¿t khÃ¡ch hÃ ng', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('28', 'delete-customers', 'XÃ³a khÃ¡ch hÃ ng', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('29', 'select-role-users', 'Chá»n vai trÃ² cho ngÆ°á»i dÃ¹ng', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('30', 'view-roles', 'Xem vai trÃ²', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('31', 'add-roles', 'ThÃªm vai trÃ²', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('32', 'edit-roles', 'Sá»­a vai trÃ²', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('33', 'delete-roles', 'XÃ³a vai trÃ²', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('34', 'select-permission', 'Chá»n quyá»n háº¡n cho vai trÃ²', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);
INSERT INTO `permissions` VALUES ('35', 'view-permission', 'Xem quyá»n háº¡n', null, '2018-11-20 10:58:49', '2018-11-20 10:58:49', null);

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('2', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('3', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('4', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('5', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('6', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('7', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('8', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('9', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('10', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('11', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('12', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('13', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('14', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('15', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('16', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('17', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('18', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('19', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('20', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('21', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('22', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('23', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('24', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('25', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('26', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('27', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('28', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('29', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('30', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('31', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('32', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('33', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('34', '1', null, null, null);
INSERT INTO `permission_role` VALUES ('35', '1', null, null, null);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT 'ID ngÆ°á»i viáº¿t',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: ÄÆ°á»£c duyá»‡t, 0: ChÆ°a Ä‘Æ°á»£c duyá»‡t',
  `title` varchar(255) NOT NULL COMMENT 'TiÃªu Ä‘á» bÃ i viáº¿t',
  `slug` varchar(255) NOT NULL COMMENT 'Sá» láº¯c :>',
  `image` varchar(255) DEFAULT NULL COMMENT 'áº¢nh bÃ i viáº¿t',
  `description` text COMMENT 'TÃ³m táº¯t ná»™i dung bÃ i viáº¿t',
  `content` text COMMENT 'Ná»™i dung bÃ i viáº¿t',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', '1', '1', 'Located 400 metres from the Arc de', 'located-400-metres-from-the-arc-de', 'bJg_events-img-1.jpg', 'Náº±m á»Ÿ trung tÃ¢m Paris, Hotel Plaza ElysÃ©es náº±m cÃ¡ch Ä‘áº¡i lá»™ Champs-Ã‰lysÃ©es vÃ  Kháº£i HoÃ n MÃ´n 200 m. KhÃ¡ch sáº¡n cung cáº¥p cÃ¡c phÃ²ng nghá»‰ kÃ¨m TV mÃ n hÃ¬nh LCD 32 inch vÃ  truy cáº­p Internet Wi-Fi miá»…n phÃ­.', '<p>Náº±m á»Ÿ trung t&acirc;m Paris, Hotel Plaza Elys&eacute;es náº±m c&aacute;ch Ä‘áº¡i lá»™ Champs-&Eacute;lys&eacute;es v&agrave; Kháº£i Ho&agrave;n M&ocirc;n 200 m. Kh&aacute;ch sáº¡n cung cáº¥p c&aacute;c ph&ograve;ng nghá»‰ k&egrave;m TV m&agrave;n h&igrave;nh LCD 32 inch v&agrave; truy cáº­p Internet Wi-Fi miá»…n ph&iacute;.</p>\r\n\r\n<p>C&aacute;c ph&ograve;ng c&aacute;ch &acirc;m táº¡i Hotel Plaza Elys&eacute;es Ä‘á»u c&oacute; m&aacute;y Ä‘iá»u h&ograve;a v&agrave; ph&ograve;ng táº¯m ri&ecirc;ng vá»›i m&aacute;y sáº¥y t&oacute;c. Du kh&aacute;ch Ä‘Æ°á»£c táº­n hÆ°á»Ÿng dá»‹ch vá»¥ cung cáº¥p tr&agrave; v&agrave; c&agrave; ph&ecirc; cÅ©ng nhÆ° dá»‹ch vá»¥ chiÌ‰nh trang giÆ°á»ng buá»•i tá»‘i.</p>\r\n\r\n<p>Quáº§y lá»… t&acirc;n táº¡i Hotel Plaza Elys&eacute;es phá»¥c vá»¥ 24/24. Kh&aacute;ch sáº¡n cung cáº¥p dá»‹ch vá»¥ giáº·t l&agrave; trong khi b&atilde;i Ä‘á»— xe ri&ecirc;ng pháº£i tráº£ ph&iacute; náº±m c&aacute;ch Ä‘&oacute; 200 m.</p>\r\n\r\n<p>Hotel Plaza Elys&eacute;es náº±m trong khoáº£ng c&aacute;ch 3 ph&uacute;t Ä‘i bá»™ tá»« ga t&agrave;u Ä‘iá»‡n ngáº§m George V, nÆ¡i c&oacute; lá»‘i Ä‘i tháº³ng Ä‘áº¿n nh&agrave; h&aacute;t Op&eacute;ra Garnier v&agrave; c&ocirc;ng vi&ecirc;n Disneyland Paris. Kh&aacute;ch c&oacute; thá»ƒ t&igrave;m tháº¥y xe Ä‘Æ°a Ä‘&oacute;n s&acirc;n bay trong v&ograve;ng 300 m tá»« kh&aacute;ch sáº¡n v&agrave; b&atilde;i Ä‘á»— xe ri&ecirc;ng náº±m c&aacute;ch Ä‘&oacute; 50 m.&nbsp;</p>\r\n\r\n<p>08. Champs-Elysees - Madeleine l&agrave; lá»±a chá»n tuyá»‡t vá»i cho du kh&aacute;ch th&iacute;ch&nbsp;mua sáº¯m,&nbsp;sá»± l&atilde;ng máº¡n&nbsp;v&agrave;&nbsp;áº©m thá»±c.</p>\r\n\r\n<p>Ä&acirc;y l&agrave; khu vá»±c á»Ÿ Paris m&agrave; kh&aacute;ch y&ecirc;u th&iacute;ch, theo c&aacute;c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p. Khu vá»±c n&agrave;y ráº¥t tuyá»‡t Ä‘á»ƒ mua sáº¯m, c&oacute; nhá»¯ng thÆ°Æ¡ng hiá»‡u ná»•i tiáº¿ng gáº§n Ä‘&oacute;: Gucci, Herm&egrave;s, Ralph Lauren, Chanel, Burberry.</p>', '2018-11-20 11:16:28', '2018-11-20 11:16:28', null);
INSERT INTO `posts` VALUES ('2', '1', '1', 'The soundproofed rooms have an MP3 station, minibar and a flat-screen TV', 'the-soundproofed-rooms-have-an-mp3-station-minibar-and-a-flat-screen-tv', 'nN7_events-img-3.jpg', 'Located 400 metres from the Arc de Triomphe and the Champs ElysÃ©es, this design hotel was designed by the architect Christian de Portzamparc and features a glass facade. The hotel offers rooms and suites decorated in a contemporary design.', '<p>Located 400 metres from the Arc de Triomphe and the Champs Elys&eacute;es, this design hotel was designed by the architect Christian de Portzamparc and features a glass facade. The hotel offers rooms and suites decorated in a contemporary design.</p>\r\n\r\n<p>The soundproofed rooms have an MP3 station, minibar and a flat-screen TV. Some rooms feature a dressing room and floor-to-ceiling windows with a view. The private bathrooms include a hairdryer and luxury toiletries.</p>\r\n\r\n<p>French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte. A buffet breakfast is served every morning at Renaissance Paris Arc De Triomphe Hotel. Children from 0 to 6 years old can enjoy breakfast free of charge and children from 7 to 12 years old can enjoy it at a reduced price.</p>\r\n\r\n<p>This hotel is just 70 metres from Ternes Metro Station, providing access to Montmartre. Public parking is available on site, at an additional cost and provides 2 charging stations for electric cars.&nbsp;</p>\r\n\r\n<p>17. Palais des Congr&egrave;s - Batignolles l&agrave; lá»±a chá»n tuyá»‡t vá»i cho du kh&aacute;ch th&iacute;ch&nbsp;mua sáº¯m,&nbsp;sá»± l&atilde;ng máº¡n&nbsp;v&agrave;&nbsp;ngáº¯m cáº£nh.</p>\r\n\r\n<p>Ä&acirc;y l&agrave; khu vá»±c á»Ÿ Paris m&agrave; kh&aacute;ch y&ecirc;u th&iacute;ch, theo c&aacute;c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p. Khu vá»±c n&agrave;y ráº¥t tuyá»‡t Ä‘á»ƒ mua sáº¯m, c&oacute; nhá»¯ng thÆ°Æ¡ng hiá»‡u ná»•i tiáº¿ng gáº§n Ä‘&oacute;: Cartier, H&amp;M, Chanel, Burberry, Louis Vuitton.</p>', '2018-11-20 11:17:26', '2018-11-20 11:17:26', null);
INSERT INTO `posts` VALUES ('3', '1', '1', 'French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte', 'french-specialities-are-served-in-the-makassar-restaurant-by-chef-benedicte-van-der-motte', 'eEI_events-img-2.jpg', 'French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte. A buffet breakfast is served every morning at Renaissance Paris Arc De Triomphe Hotel. Children from 0 to 6 years old can enjoy breakfast free of charge and children from 7 to 12 years old can enjoy it at a reduced price.', '<p>This design hotel in Paris&rsquo; 10th district features stylish rooms with a Nespresso coffee machine and free Wi-Fi. Gare de L&rsquo;Est Train Station is 600 metres from the hotel and Gare du Nord Train Station is 1 km away.</p>\r\n\r\n<p>The soundproofed guest rooms at Best Western Hotel Faubourg Saint Martin are decorated in light, neutral colours. They are equipped with a flat-screen satellite TV and an iPod docking station.</p>\r\n\r\n<p>A continental buffet breakfast featuring organic items is served daily in a unique dining room with an arched, stone ceiling. Caf&eacute;s and brasseries line the Rue du Faubourg Saint-Martin which is only 100 metres from the hotel.</p>\r\n\r\n<p>Hotel Faubourg Saint Martin is located on a pedestrian street in the heart of the theatre district, 700 metres from the Le Grand Rex Theatre. Strasbourg Saint-Denis Metro Station is 250 metres from the hotel and provides direct access to the Latin Quarter.&nbsp;</p>\r\n\r\n<p>10. Gare du Nord - Gare de l&#39;Est l&agrave; lá»±a chá»n tuyá»‡t vá»i cho du kh&aacute;ch th&iacute;ch&nbsp;ngáº¯m cáº£nh,&nbsp;báº£o t&agrave;ng&nbsp;v&agrave;&nbsp;tÆ°á»£ng Ä‘&agrave;i.</p>\r\n\r\n<p>Ä&acirc;y l&agrave; khu vá»±c á»Ÿ Paris m&agrave; kh&aacute;ch y&ecirc;u th&iacute;ch, theo c&aacute;c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p.</p>\r\n\r\n<p>Chá»— nghá»‰ n&agrave;y cÅ©ng Ä‘Æ°á»£c Ä‘&aacute;nh gi&aacute; l&agrave; Ä‘&aacute;ng gi&aacute; tiá»n nháº¥t á»Ÿ Paris! Kh&aacute;ch sáº½ tiáº¿t kiá»‡m Ä‘Æ°á»£c nhiá»u hÆ¡n so vá»›i nghá»‰ táº¡i nhá»¯ng chá»— nghá»‰ kh&aacute;c á»Ÿ th&agrave;nh phá»‘ n&agrave;y.</p>', '2018-11-20 11:18:43', '2018-11-20 11:18:43', null);
INSERT INTO `posts` VALUES ('4', '1', '1', 'A continental buffet breakfast featuring organic items is served daily', 'a-continental-buffet-breakfast-featuring-organic-items-is-served-daily', 'sf9_img-7.jpg', 'The soundproofed rooms have an MP3 station, minibar and a flat-screen TV. Some rooms feature a dressing room and floor-to-ceiling windows with a view. The private bathrooms include a hairdryer and luxury toiletries.', '<p>Located 400 metres from the Arc de Triomphe and the Champs Elys&eacute;es, this design hotel was designed by the architect Christian de Portzamparc and features a glass facade. The hotel offers rooms and suites decorated in a contemporary design.</p>\r\n\r\n<p>The soundproofed rooms have an MP3 station, minibar and a flat-screen TV. Some rooms feature a dressing room and floor-to-ceiling windows with a view. The private bathrooms include a hairdryer and luxury toiletries.</p>\r\n\r\n<p>French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte. A buffet breakfast is served every morning at Renaissance Paris Arc De Triomphe Hotel. Children from 0 to 6 years old can enjoy breakfast free of charge and children from 7 to 12 years old can enjoy it at a reduced price.</p>\r\n\r\n<p>This hotel is just 70 metres from Ternes Metro Station, providing access to Montmartre. Public parking is available on site, at an additional cost and provides 2 charging stations for electric cars.&nbsp;</p>\r\n\r\n<p>17. Palais des Congr&egrave;s - Batignolles l&agrave; lá»±a chá»n tuyá»‡t vá»i cho du kh&aacute;ch th&iacute;ch&nbsp;mua sáº¯m,&nbsp;sá»± l&atilde;ng máº¡n&nbsp;v&agrave;&nbsp;ngáº¯m cáº£nh.</p>\r\n\r\n<p>Ä&acirc;y l&agrave; khu vá»±c á»Ÿ Paris m&agrave; kh&aacute;ch y&ecirc;u th&iacute;ch, theo c&aacute;c Ä‘&aacute;nh gi&aacute; Ä‘á»™c láº­p. Khu vá»±c n&agrave;y ráº¥t tuyá»‡t Ä‘á»ƒ mua sáº¯m, c&oacute; nhá»¯ng thÆ°Æ¡ng hiá»‡u ná»•i tiáº¿ng gáº§n Ä‘&oacute;: Cartier, H&amp;M, Chanel, Burberry, Louis Vuitton.</p>', '2018-11-20 11:19:43', '2018-11-20 11:19:43', null);

-- ----------------------------
-- Table structure for revenues
-- ----------------------------
DROP TABLE IF EXISTS `revenues`;
CREATE TABLE `revenues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_amount` varchar(255) NOT NULL COMMENT 'Tá»•ng tiá»n thu trong ngÃ y',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of revenues
-- ----------------------------
INSERT INTO `revenues` VALUES ('1', '36000000', '2018-11-20', '2018-11-20', null);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super-admin', 'Super Admin', null, '2018-11-20 10:58:47', '2018-11-20 10:58:47', null);
INSERT INTO `roles` VALUES ('2', 'users', 'NhÃ¢n viÃªn', null, '2018-11-20 10:58:47', '2018-11-20 10:58:47', null);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', null, null, null);
INSERT INTO `role_user` VALUES ('2', '2', '2018-11-20 11:11:02', null, null);

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_type_id` int(10) unsigned NOT NULL COMMENT 'ID loáº¡i phÃ²ng',
  `floor` tinyint(4) NOT NULL COMMENT 'Táº§ng',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: ChÆ°a Ä‘Æ°á»£c thuÃª, 1: ÄÃ£ Ä‘Æ°á»£c thuÃª',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_type_id` (`room_type_id`),
  CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('1', '1', '20', '1', '2018-11-20 11:08:48', '2018-11-20 11:22:22', null);
INSERT INTO `rooms` VALUES ('2', '1', '20', '0', '2018-11-20 11:09:07', '2018-11-20 11:09:07', null);
INSERT INTO `rooms` VALUES ('3', '1', '20', '0', '2018-11-20 11:09:14', '2018-11-20 11:09:14', null);
INSERT INTO `rooms` VALUES ('4', '2', '21', '0', '2018-11-20 11:09:21', '2018-11-20 11:09:21', null);
INSERT INTO `rooms` VALUES ('5', '2', '21', '0', '2018-11-20 11:09:32', '2018-11-20 11:09:32', null);
INSERT INTO `rooms` VALUES ('6', '3', '22', '0', '2018-11-20 11:09:39', '2018-11-20 11:09:39', null);
INSERT INTO `rooms` VALUES ('7', '3', '22', '0', '2018-11-20 11:09:47', '2018-11-20 11:09:47', null);
INSERT INTO `rooms` VALUES ('8', '3', '22', '0', '2018-11-20 11:09:54', '2018-11-20 11:09:54', null);
INSERT INTO `rooms` VALUES ('9', '4', '23', '0', '2018-11-20 11:10:04', '2018-11-20 11:10:04', null);
INSERT INTO `rooms` VALUES ('10', '4', '23', '0', '2018-11-20 11:10:12', '2018-11-20 11:10:12', null);
INSERT INTO `rooms` VALUES ('11', '5', '24', '0', '2018-11-20 11:10:21', '2018-11-20 11:10:21', null);
INSERT INTO `rooms` VALUES ('12', '5', '24', '0', '2018-11-20 11:10:31', '2018-11-20 11:10:31', null);
INSERT INTO `rooms` VALUES ('13', '6', '25', '0', '2018-11-20 11:10:43', '2018-11-20 11:10:43', null);
INSERT INTO `rooms` VALUES ('14', '6', '25', '0', '2018-11-20 11:10:51', '2018-11-20 11:10:51', null);
INSERT INTO `rooms` VALUES ('15', '6', '25', '0', '2018-11-20 11:10:59', '2018-11-20 11:10:59', null);

-- ----------------------------
-- Table structure for room_rental_lists
-- ----------------------------
DROP TABLE IF EXISTS `room_rental_lists`;
CREATE TABLE `room_rental_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT 'ID khÃ¡ch hÃ ng',
  `room_id` int(10) unsigned NOT NULL COMMENT 'ID phÃ²ng',
  `start_date` date NOT NULL COMMENT 'NgÃ y nháº­n phÃ²ng',
  `end_date` date NOT NULL COMMENT 'NgÃ y tráº£ phÃ²ng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_booking_log_id` int(10) unsigned NOT NULL COMMENT 'ID nháº­t kÃ½ Ä‘áº·t phÃ²ng',
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `room_rental_lists_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_rental_lists_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_rental_lists
-- ----------------------------
INSERT INTO `room_rental_lists` VALUES ('1', '3', '1', '2018-11-22', '2018-11-26', '2018-11-20 11:22:22', '2018-11-20 11:22:22', null, '1');

-- ----------------------------
-- Table structure for room_types
-- ----------------------------
DROP TABLE IF EXISTS `room_types`;
CREATE TABLE `room_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'TÃªn loáº¡i phÃ²ng',
  `room_size` double(8,2) NOT NULL COMMENT 'Diá»‡n tÃ­ch cá»§a phÃ²ng',
  `bed` tinyint(4) NOT NULL COMMENT 'Sá»‘ giÆ°á»ng ngá»§',
  `max_people` tinyint(4) NOT NULL COMMENT 'Sá»‘ ngÆ°á»i tá»‘i Ä‘a',
  `price` varchar(255) NOT NULL COMMENT 'GiÃ¡ (1 Ä‘Ãªm x 1 ngÆ°á»i) cá»§a phÃ²ng',
  `description` text NOT NULL COMMENT 'MiÃªu táº£ vá» loáº¡i phÃ²ng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_types
-- ----------------------------
INSERT INTO `room_types` VALUES ('1', 'PhÃ²ng Deluxe', '40.00', '1', '2', '9000000', '<p>Located 400 metres from the Arc de Triomphe and the Champs Elys&eacute;es, this design hotel was designed by the architect Christian de Portzamparc and features a glass facade. The hotel offers rooms and suites decorated in a contemporary design.</p>\r\n\r\n<p>The soundproofed rooms have an MP3 station, minibar and a flat-screen TV. Some rooms feature a dressing room and floor-to-ceiling windows with a view. The private bathrooms include a hairdryer and luxury toiletries.</p>', '2018-11-20 11:02:51', '2018-11-20 11:02:51', null);
INSERT INTO `room_types` VALUES ('2', 'Superior Double Room', '50.00', '2', '2', '10000000', '<p>French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte. A buffet breakfast is served every morning at Renaissance Paris Arc De Triomphe Hotel. Children from 0 to 6 years old can enjoy breakfast free of charge and children from 7 to 12 years old can enjoy it at a reduced price.</p>\r\n\r\n<p>This hotel is just 70 metres from Ternes Metro Station, providing access to Montmartre. Public parking is available on site, at an additional cost and provides 2 charging stations for electric cars.&nbsp;</p>', '2018-11-20 11:04:02', '2018-11-20 11:04:02', null);
INSERT INTO `room_types` VALUES ('3', 'Junior Suite', '50.00', '1', '2', '9000000', '<p>French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte. A buffet breakfast is served every morning at Renaissance Paris Arc De Triomphe Hotel. Children from 0 to 6 years old can enjoy breakfast free of charge and children from 7 to 12 years old can enjoy it at a reduced price.</p>\r\n\r\n<p>This hotel is just 70 metres from Ternes Metro Station, providing access to Montmartre. Public parking is available on site, at an additional cost and provides 2 charging stations for electric cars.&nbsp;</p>\r\n\r\n<p>17. Palais des Congr&egrave;s - Batignolles l&agrave; lá»±a chá»n tuyá»‡t vá»i cho du kh&aacute;ch th&iacute;ch&nbsp;mua sáº¯m,&nbsp;sá»± l&atilde;ng máº¡n&nbsp;v&agrave;&nbsp;ngáº¯m cáº£nh.</p>', '2018-11-20 11:05:02', '2018-11-20 11:05:02', null);
INSERT INTO `room_types` VALUES ('4', 'Family Room', '80.00', '3', '5', '15000000', '<p>The soundproofed rooms have an MP3 station, minibar and a flat-screen TV. Some rooms feature a dressing room and floor-to-ceiling windows with a view. The private bathrooms include a hairdryer and luxury toiletries.</p>\r\n\r\n<p>French specialities are served in the Makassar restaurant by Chef Benedicte Van der Motte. A buffet breakfast is served every morning at Renaissance Paris Arc De Triomphe Hotel. Children from 0 to 6 years old can enjoy breakfast free of charge and children from 7 to 12 years old can enjoy it at a reduced price.</p>\r\n\r\n<p>This hotel is just 70 metres from Ternes Metro Station, providing access to Montmartre. Public parking is available on site, at an additional cost and provides 2 charging stations for electric cars.&nbsp;</p>', '2018-11-20 11:06:08', '2018-11-20 11:06:08', null);
INSERT INTO `room_types` VALUES ('5', 'King Room', '60.00', '1', '2', '20000000', '<p>Náº±m á»Ÿ trung t&acirc;m Paris, Hotel Plaza Elys&eacute;es náº±m c&aacute;ch Ä‘áº¡i lá»™ Champs-&Eacute;lys&eacute;es v&agrave; Kháº£i Ho&agrave;n M&ocirc;n 200 m. Kh&aacute;ch sáº¡n cung cáº¥p c&aacute;c ph&ograve;ng nghá»‰ k&egrave;m TV m&agrave;n h&igrave;nh LCD 32 inch v&agrave; truy cáº­p Internet Wi-Fi miá»…n ph&iacute;.</p>\r\n\r\n<p>C&aacute;c ph&ograve;ng c&aacute;ch &acirc;m táº¡i Hotel Plaza Elys&eacute;es Ä‘á»u c&oacute; m&aacute;y Ä‘iá»u h&ograve;a v&agrave; ph&ograve;ng táº¯m ri&ecirc;ng vá»›i m&aacute;y sáº¥y t&oacute;c. Du kh&aacute;ch Ä‘Æ°á»£c táº­n hÆ°á»Ÿng dá»‹ch vá»¥ cung cáº¥p tr&agrave; v&agrave; c&agrave; ph&ecirc; cÅ©ng nhÆ° dá»‹ch vá»¥ chiÌ‰nh trang giÆ°á»ng buá»•i tá»‘i.</p>\r\n\r\n<p>Quáº§y lá»… t&acirc;n táº¡i Hotel Plaza Elys&eacute;es phá»¥c vá»¥ 24/24. Kh&aacute;ch sáº¡n cung cáº¥p dá»‹ch vá»¥ giáº·t l&agrave; trong khi b&atilde;i Ä‘á»— xe ri&ecirc;ng pháº£i tráº£ ph&iacute; náº±m c&aacute;ch Ä‘&oacute; 200 m.</p>', '2018-11-20 11:07:24', '2018-11-20 11:07:24', null);
INSERT INTO `room_types` VALUES ('6', 'PhÃ²ng Executive', '40.00', '2', '3', '10000000', '<p>C&aacute;c ph&ograve;ng c&aacute;ch &acirc;m táº¡i Hotel Plaza Elys&eacute;es Ä‘á»u c&oacute; m&aacute;y Ä‘iá»u h&ograve;a v&agrave; ph&ograve;ng táº¯m ri&ecirc;ng vá»›i m&aacute;y sáº¥y t&oacute;c. Du kh&aacute;ch Ä‘Æ°á»£c táº­n hÆ°á»Ÿng dá»‹ch vá»¥ cung cáº¥p tr&agrave; v&agrave; c&agrave; ph&ecirc; cÅ©ng nhÆ° dá»‹ch vá»¥ chiÌ‰nh trang giÆ°á»ng buá»•i tá»‘i.</p>\r\n\r\n<p>Quáº§y lá»… t&acirc;n táº¡i Hotel Plaza Elys&eacute;es phá»¥c vá»¥ 24/24. Kh&aacute;ch sáº¡n cung cáº¥p dá»‹ch vá»¥ giáº·t l&agrave; trong khi b&atilde;i Ä‘á»— xe ri&ecirc;ng pháº£i tráº£ ph&iacute; náº±m c&aacute;ch Ä‘&oacute; 200 m.</p>\r\n\r\n<p>Hotel Plaza Elys&eacute;es náº±m trong khoáº£ng c&aacute;ch 3 ph&uacute;t Ä‘i bá»™ tá»« ga t&agrave;u Ä‘iá»‡n ngáº§m George V, nÆ¡i c&oacute; lá»‘i Ä‘i tháº³ng Ä‘áº¿n nh&agrave; h&aacute;t Op&eacute;ra Garnier v&agrave; c&ocirc;ng vi&ecirc;n Disneyland Paris. Kh&aacute;ch c&oacute; thá»ƒ t&igrave;m tháº¥y xe Ä‘Æ°a Ä‘&oacute;n s&acirc;n bay trong v&ograve;ng 300 m tá»« kh&aacute;ch sáº¡n v&agrave; b&atilde;i Ä‘á»— xe ri&ecirc;ng náº±m c&aacute;ch Ä‘&oacute; 50 m.&nbsp;</p>\r\n\r\n<p>08. Champs-Elysees - Madeleine l&agrave; lá»±a chá»n tuyá»‡t vá»i cho du kh&aacute;ch th&iacute;ch&nbsp;mua sáº¯m,&nbsp;sá»± l&atilde;ng máº¡n&nbsp;v&agrave;&nbsp;áº©m thá»±c.</p>', '2018-11-20 11:08:15', '2018-11-20 11:08:15', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'TÃªn ngÆ°á»i dÃ¹ng',
  `email` varchar(255) NOT NULL COMMENT 'Äá»‹a chá»‰ Email',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL COMMENT 'Máº­t kháº©u',
  `gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Nam, 0: Ná»¯',
  `birthday` date DEFAULT NULL COMMENT 'Sinh nháº­t',
  `mobile` varchar(50) DEFAULT NULL COMMENT 'Sá»‘ Ä‘iá»‡n thoáº¡i',
  `address` varchar(255) DEFAULT NULL COMMENT 'Äá»‹a chá»‰',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'áº¢nh Ä‘áº¡i diá»‡n',
  `rate` tinyint(4) DEFAULT NULL COMMENT 'Cho Ä‘iá»ƒm khÃ¡ch sáº¡n',
  `review` text COMMENT 'ÄÃ¡nh giÃ¡ khÃ¡ch sáº¡n',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: KhÃ¡ch hÃ ng, 1: NhÃ¢n viÃªn, 2: Quáº£n lÃ½',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expire` tinyint(4) DEFAULT NULL COMMENT 'NgÃ y háº¿t háº¡n',
  `card_type` varchar(255) DEFAULT NULL COMMENT 'Loáº¡i tháº» thanh toÃ¡n',
  `card_number` varchar(255) DEFAULT NULL COMMENT 'Sá»‘ tháº» thanh toÃ¡n',
  `year` varchar(5) DEFAULT NULL COMMENT 'NÄƒm háº¿t háº¡n',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Super Admin', 'superadmin@framgia.com', null, '$2y$10$y75csjYu4.FeKSi2MmaoUeELeqg3vy5AlD5igi1xFE3aCqrahS2h.', '1', '1991-12-19', '0969991219', 'Sá»‘ 4, ngÃ¡ch 105/41, ngÃµ 105, YÃªn HÃ²a, Cáº§u Giáº¥y, HÃ  Ná»™i.', null, null, null, '1', null, '2018-11-20 10:58:47', '2018-11-20 10:58:47', null, '12', 'Visa', '0630199612191991', '2019');
INSERT INTO `users` VALUES ('2', 'NhÃ¢n viÃªn', 'user@framgia.com', null, '$2y$10$F3xn1zrXf.It7zIQD4QBz.sb8aWcUV/AU5VK7ca22Ooqp7oNnHkqW', '0', '1992-01-20', '0969991229', 'Sá»‘ 5, ngÃ¡ch 216/52, ngÃµ 216, YÃªn HÃ²a, Cáº§u Giáº¥y, HÃ  Ná»™i.', null, null, null, '1', null, '2018-11-20 10:58:47', '2018-11-20 10:58:47', null, '1', 'Master Card', '1741200723202002', '2020');
INSERT INTO `users` VALUES ('3', 'KhÃ¡ch hÃ ng', 'customer@framgia.com', null, '$2y$10$b2yXov7wh8Qq3gDTHawlG.XtjzLjSDFaV.NsTlY8boEqS5Qizae0.', '0', '1991-12-19', '0969990630', 'Sá»‘ 4, ngÃ¡ch 105/41, ngÃµ 105, YÃªn HÃ²a, Cáº§u Giáº¥y, HÃ  Ná»™i.', null, null, null, '0', null, '2018-11-20 10:58:47', '2018-11-20 11:22:08', null, '12', 'Visa', '0630199612191991', '2018');
