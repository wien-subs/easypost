/*
Navicat MySQL Data Transfer

Source Server         : My Computer
Source Server Version : 100214
Source Host           : localhost:3306
Source Database       : tla

Target Server Type    : MYSQL
Target Server Version : 100214
File Encoding         : 65001

Date: 2019-01-27 21:34:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for editor
-- ----------------------------
DROP TABLE IF EXISTS `editor`;
CREATE TABLE `editor` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `dicord_id` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for enc
-- ----------------------------
DROP TABLE IF EXISTS `enc`;
CREATE TABLE `enc` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `dicord_id` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for ep_logs
-- ----------------------------
DROP TABLE IF EXISTS `ep_logs`;
CREATE TABLE `ep_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(100) COLLATE utf8_romanian_ci DEFAULT NULL,
  `data_ws` longtext COLLATE utf8_romanian_ci DEFAULT NULL,
  `data_sh` longtext COLLATE utf8_romanian_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `value` text COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=819 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for tlcs
-- ----------------------------
DROP TABLE IF EXISTS `tlcs`;
CREATE TABLE `tlcs` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `dicord_id` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `notification` int(1) NOT NULL DEFAULT 1,
  `password` varchar(255) COLLATE utf8_romanian_ci DEFAULT '',
  `token` varchar(21) COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for tls
-- ----------------------------
DROP TABLE IF EXISTS `tls`;
CREATE TABLE `tls` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `dicord_id` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `notification` int(1) NOT NULL DEFAULT 1,
  `password` varchar(255) COLLATE utf8_romanian_ci DEFAULT '',
  `token` varchar(21) COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for tl_anime
-- ----------------------------
DROP TABLE IF EXISTS `tl_anime`;
CREATE TABLE `tl_anime` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `tl_id` int(11) NOT NULL,
  `aname` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `progress` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tlids` (`tl_id`),
  CONSTRAINT `tlids` FOREIGN KEY (`tl_id`) REFERENCES `tls` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_romanian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_romanian_ci DEFAULT NULL,
  `password` text COLLATE utf8_romanian_ci DEFAULT NULL,
  `discord_id` varchar(50) COLLATE utf8_romanian_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_romanian_ci DEFAULT NULL,
  `registred` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `tl` tinyint(1) NOT NULL DEFAULT 0,
  `tlc` tinyint(1) NOT NULL DEFAULT 0,
  `editor` tinyint(1) NOT NULL DEFAULT 0,
  `enc` tinyint(1) NOT NULL DEFAULT 0,
  `access` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Table structure for users_data
-- ----------------------------
DROP TABLE IF EXISTS `users_data`;
CREATE TABLE `users_data` (
  `uid` int(200) NOT NULL AUTO_INCREMENT,
  `id_user` int(200) NOT NULL,
  `nickname` varchar(50) COLLATE utf8_romanian_ci DEFAULT NULL,
  `telegram` varchar(50) COLLATE utf8_romanian_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_romanian_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_romanian_ci DEFAULT NULL,
  `privacy` text COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `iduser` (`id_user`),
  CONSTRAINT `iduser` FOREIGN KEY (`id_user`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;
