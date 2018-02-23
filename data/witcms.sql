/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : witcms

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2018-02-23 10:48:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wit_migration
-- ----------------------------
DROP TABLE IF EXISTS `wit_migration`;
CREATE TABLE `wit_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wit_migration
-- ----------------------------
INSERT INTO `wit_migration` VALUES ('m000000_000000_base', '1518405199');
INSERT INTO `wit_migration` VALUES ('m130524_201442_init', '1518405203');

-- ----------------------------
-- Table structure for wit_user
-- ----------------------------
DROP TABLE IF EXISTS `wit_user`;
CREATE TABLE `wit_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

-- ----------------------------
-- Records of wit_user
-- ----------------------------
INSERT INTO `wit_user` VALUES ('1', 'sxz123', 'uTZwVSzBGd5g2LK8UxhhU2TIES6F-M_E', '$2y$13$VD9jg6bYCaczMVqQwveGBOAU7FCsDlDzmxc.emKLzrEcL6yQRfijq', null, '1129535445@qq.com', '10', '1518405548', '1518405548');
