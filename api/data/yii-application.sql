/*
Navicat MySQL Data Transfer

Source Server         : phpstudy_mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yii-application

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-13 16:27:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '键盘', '199.99');
INSERT INTO `goods` VALUES ('2', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('3', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('4', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('5', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('6', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('7', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('8', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('9', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('10', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('11', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('12', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('13', '鼠标', '109.55');
INSERT INTO `goods` VALUES ('14', '鼠标', '109.55');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1544066548');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1544066550');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password_hash` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `password_reset_token` varchar(50) NOT NULL DEFAULT '' COMMENT '密码token',
  `email` varchar(20) NOT NULL DEFAULT '' COMMENT '邮箱',
  `auth_key` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `access_token` varchar(50) NOT NULL DEFAULT '' COMMENT 'restful请求token',
  `allowance` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'restful剩余的允许的请求数',
  `allowance_updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'restful请求的UNIX时间戳数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `access_token` (`access_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$13$1KWwchqGvxDeORDt5pRW.OJarf06PjNYxe2vEGVs7e5amD3wnEX.i', '', '', 'z3sM2KZvXdk6mNXXrz25D3JoZlGXoJMC', '10', '1478686493', '1478686493', '123', '4', '1478686493');

-- ----------------------------
-- Table structure for user_bak
-- ----------------------------
DROP TABLE IF EXISTS `user_bak`;
CREATE TABLE `user_bak` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_bak
-- ----------------------------
