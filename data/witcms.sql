/*
Navicat MySQL Data Transfer

Source Server         : localhost
<<<<<<< HEAD
Source Server Version : 100119
=======
Source Server Version : 50553
>>>>>>> 07fc5f1c14f445ce5c25e544a1e033e863fab3af
Source Host           : localhost:3306
Source Database       : witcms

Target Server Type    : MYSQL
<<<<<<< HEAD
Target Server Version : 100119
File Encoding         : 65001

Date: 2018-02-12 16:48:20
=======
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-22 22:22:16
>>>>>>> 07fc5f1c14f445ce5c25e544a1e033e863fab3af
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
<<<<<<< HEAD
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
=======
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
>>>>>>> 07fc5f1c14f445ce5c25e544a1e033e863fab3af
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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

-- ----------------------------
-- Records of wit_user
-- ----------------------------
INSERT INTO `wit_user` VALUES ('1', 'sxz123', 'uTZwVSzBGd5g2LK8UxhhU2TIES6F-M_E', '$2y$13$VD9jg6bYCaczMVqQwveGBOAU7FCsDlDzmxc.emKLzrEcL6yQRfijq', null, '1129535445@qq.com', '10', '1518405548', '1518405548');
=======
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of witcms_user
-- ----------------------------
INSERT INTO `witcms_user` VALUES ('1', 'sxz123', 'A2_WKq_PFNJyYojDncrQ23Nii8AlT3q1', '$2y$13$JMXNWVpDQCAKnhYvyfJEIOF.DWUDqM1/wjeR2.AP4nCafaKKwaHMm', null, '1129535445@qq.com', '10', '1519205728', '1519205728');
>>>>>>> 07fc5f1c14f445ce5c25e544a1e033e863fab3af
