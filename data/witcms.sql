/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : witcms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-22 22:22:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for witcms_migration
-- ----------------------------
DROP TABLE IF EXISTS `witcms_migration`;
CREATE TABLE `witcms_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of witcms_migration
-- ----------------------------
INSERT INTO `witcms_migration` VALUES ('m000000_000000_base', '1518441620');
INSERT INTO `witcms_migration` VALUES ('m130524_201442_init', '1518441626');

-- ----------------------------
-- Table structure for witcms_user
-- ----------------------------
DROP TABLE IF EXISTS `witcms_user`;
CREATE TABLE `witcms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of witcms_user
-- ----------------------------
INSERT INTO `witcms_user` VALUES ('1', 'sxz123', 'A2_WKq_PFNJyYojDncrQ23Nii8AlT3q1', '$2y$13$JMXNWVpDQCAKnhYvyfJEIOF.DWUDqM1/wjeR2.AP4nCafaKKwaHMm', null, '1129535445@qq.com', '10', '1519205728', '1519205728');
