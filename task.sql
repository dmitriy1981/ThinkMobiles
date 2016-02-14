/*
Navicat MySQL Data Transfer

Source Server         : main
Source Server Version : 50546
Source Host           : localhost:3306
Source Database       : task

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2016-02-14 19:39:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `interests`
-- ----------------------------
DROP TABLE IF EXISTS `interests`;
CREATE TABLE `interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of interests
-- ----------------------------
INSERT INTO `interests` VALUES ('1', 'Sport');
INSERT INTO `interests` VALUES ('2', 'Games');
INSERT INTO `interests` VALUES ('3', 'Yoga');
INSERT INTO `interests` VALUES ('4', 'Music');
INSERT INTO `interests` VALUES ('5', 'Travels');
INSERT INTO `interests` VALUES ('6', 'Fishing');
INSERT INTO `interests` VALUES ('7', 'Astrology');
INSERT INTO `interests` VALUES ('8', 'History');
INSERT INTO `interests` VALUES ('9', 'Girls');
INSERT INTO `interests` VALUES ('10', 'Painting');
INSERT INTO `interests` VALUES ('11', 'Nature');
INSERT INTO `interests` VALUES ('12', 'Knitting');
INSERT INTO `interests` VALUES ('13', 'Hamsters');
INSERT INTO `interests` VALUES ('14', 'Pills');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'login', 'Login privileges, granted after account confirmation');
INSERT INTO `roles` VALUES ('2', 'admin', 'Administrative user, has access to everything.');

-- ----------------------------
-- Table structure for `roles_users`
-- ----------------------------
DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles_users
-- ----------------------------
INSERT INTO `roles_users` VALUES ('3', '1');
INSERT INTO `roles_users` VALUES ('4', '1');

-- ----------------------------
-- Table structure for `user_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'sergeich-81@inbox.ru', 'dimas', 'e468b923b7ae4fca44b6276e49b5555087a9626e087ff47eb17503ce109ae2a6', '23', '1455455410', 'Zaharov', 'Dima', '1981-03-24');
INSERT INTO `users` VALUES ('4', 'anna@yahoo.hr', 'anna', '56ecd4d92249f3f539380b377c190a646b6020c847f723dbad88fa726046e972', '9', '1455466365', null, null, null);

-- ----------------------------
-- Table structure for `users_interests`
-- ----------------------------
DROP TABLE IF EXISTS `users_interests`;
CREATE TABLE `users_interests` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `interest_id` int(10) unsigned DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `interest_id` (`interest_id`),
  CONSTRAINT `users_interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_interests_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_interests
-- ----------------------------
INSERT INTO `users_interests` VALUES ('3', '2');
INSERT INTO `users_interests` VALUES ('3', '7');
INSERT INTO `users_interests` VALUES ('3', '10');
INSERT INTO `users_interests` VALUES ('3', '8');
INSERT INTO `users_interests` VALUES ('3', '4');
