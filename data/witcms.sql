/*
Navicat MySQL Data Transfer

Source Server         : phpstudy_mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : witcms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-01 16:11:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wit_admin
-- ----------------------------
DROP TABLE IF EXISTS `wit_admin`;
CREATE TABLE `wit_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='后台用户表';

-- ----------------------------
-- Records of wit_admin
-- ----------------------------
INSERT INTO `wit_admin` VALUES ('1', 'admin', 'uTZwVSzBGd5g2LK8UxhhU2TIES6F-M_E', '$2y$13$VD9jg6bYCaczMVqQwveGBOAU7FCsDlDzmxc.emKLzrEcL6yQRfijq', null, '1129535445@qq.com', '10', '1518405548', '1518405548');

-- ----------------------------
-- Table structure for wit_article
-- ----------------------------
DROP TABLE IF EXISTS `wit_article`;
CREATE TABLE `wit_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `sub_title` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of wit_article
-- ----------------------------
INSERT INTO `wit_article` VALUES ('1', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('2', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('3', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('4', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('5', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('6', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('7', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('8', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('9', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('10', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('11', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('12', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('13', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('14', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('15', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('16', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('17', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('18', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('19', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('20', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('21', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('22', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('23', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('24', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('25', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('26', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('27', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('28', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('29', 'dgdf', '', '', '0', '1', '444', '4444');
INSERT INTO `wit_article` VALUES ('30', '测试', '', '', '0', '1', '1519375410', '1519375410');
INSERT INTO `wit_article` VALUES ('31', '33', '', '', '0', '1', '444', '555');
INSERT INTO `wit_article` VALUES ('32', 'dgdf', '', '', '0', '1', '444', '4444');

-- ----------------------------
-- Table structure for wit_article_content
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_content`;
CREATE TABLE `wit_article_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章内容id',
  `article_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `content` text NOT NULL COMMENT '文章内容',
  PRIMARY KEY (`id`),
  KEY `article_id_index` (`article_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章内容表';

-- ----------------------------
-- Records of wit_article_content
-- ----------------------------

-- ----------------------------
-- Table structure for wit_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_assignment`;
CREATE TABLE `wit_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `wit_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `wit_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='给用户分配权限的表';

-- ----------------------------
-- Records of wit_auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for wit_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_item`;
CREATE TABLE `wit_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `wit_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `wit_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='生成许可表';

-- ----------------------------
-- Records of wit_auth_item
-- ----------------------------
INSERT INTO `wit_auth_item` VALUES ('#', '2', '', '#', null, '1522050422', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('admin/index', '2', '', 'admin/index', null, '1522049871', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('article/index', '2', '', 'article/index', null, '1522050419', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('backend-menu/index', '2', '', 'backend-menu/index', null, '1522050419', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('frontend-menu/index', '2', '', 'frontend-menu/index', null, '1522050419', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('rabc/index', '2', '', 'rabc/index', null, '1522050414', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('user/index', '2', '', 'user/index', null, '1522049871', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('普通管理员', '1', '普通管理员', null, null, '1521783127', '1522052221');
INSERT INTO `wit_auth_item` VALUES ('超级管理员', '1', '拥有所有权限', null, null, '1521783127', '1522054534');

-- ----------------------------
-- Table structure for wit_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_item_child`;
CREATE TABLE `wit_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `wit_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `wit_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wit_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `wit_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='给用户分配许可的表';

-- ----------------------------
-- Records of wit_auth_item_child
-- ----------------------------
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', '#');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'admin/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'article/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'backend-menu/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'frontend-menu/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'rabc/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'user/index');

-- ----------------------------
-- Table structure for wit_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_rule`;
CREATE TABLE `wit_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='权限规则表';

-- ----------------------------
-- Records of wit_auth_rule
-- ----------------------------
INSERT INTO `wit_auth_rule` VALUES ('#', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A313A2223223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323034393530333B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522049503', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('admin/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31313A2261646D696E2F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323034393837313B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522049871', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('article/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31333A2261727469636C652F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431393B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050419', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('backend-menu/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31383A226261636B656E642D6D656E752F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431393B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050419', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('frontend-menu/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31393A2266726F6E74656E642D6D656E752F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431393B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050419', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('rabc/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31303A22726162632F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431343B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050414', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('user/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31303A22757365722F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323034393635383B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522049658', '1522050852');

-- ----------------------------
-- Table structure for wit_comments
-- ----------------------------
DROP TABLE IF EXISTS `wit_comments`;
CREATE TABLE `wit_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `status` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '评论的状态 0未审 1通过 2未通过',
  `content` text NOT NULL COMMENT '评论内容',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of wit_comments
-- ----------------------------
INSERT INTO `wit_comments` VALUES ('1', '1', '1', '1', '0', '测试', '0');
INSERT INTO `wit_comments` VALUES ('2', '1', '1', '1', '1', '测试', '0');
INSERT INTO `wit_comments` VALUES ('3', '1', '1', '1', '2', '测试', '0');

-- ----------------------------
-- Table structure for wit_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `wit_friend_link`;
CREATE TABLE `wit_friend_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接id',
  `name` varchar(255) NOT NULL COMMENT '友情链接名字',
  `image` varchar(255) DEFAULT NULL COMMENT '友情链接图片',
  `url` varchar(255) DEFAULT NULL COMMENT '友情链接网址',
  `target` varchar(255) NOT NULL DEFAULT '_blank' COMMENT '跳转方式',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of wit_friend_link
-- ----------------------------
INSERT INTO `wit_friend_link` VALUES ('1', '百度', '', 'www.baidu.com', '_self', '0', '0', '1468303882', '1521775415');
INSERT INTO `wit_friend_link` VALUES ('2', '谷歌', '', 'www.google.com', '_self', '1', '1', '222', '1522140486');

-- ----------------------------
-- Table structure for wit_menu
-- ----------------------------
DROP TABLE IF EXISTS `wit_menu`;
CREATE TABLE `wit_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `name` varchar(255) NOT NULL COMMENT '菜单名称',
  `parent_id` int(10) unsigned DEFAULT '0' COMMENT '父id',
  `route` varchar(255) NOT NULL COMMENT '路由',
  `icon` varchar(255) DEFAULT NULL COMMENT '图标样式',
  `type` tinyint(1) DEFAULT '0' COMMENT '菜单类型 0 后台菜单 1前台菜单',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 0不显示 1显示',
  `is_absolute_url` tinyint(1) DEFAULT '0' COMMENT '是否是绝对地址',
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of wit_menu
-- ----------------------------
INSERT INTO `wit_menu` VALUES ('1', '系统设置', '0', 'site/index', 'fa fa-cog', '0', '0', '1', '0', '1521970930', '1522140524');
INSERT INTO `wit_menu` VALUES ('2', '用户管理', '0', 'user/index', 'fa fa-users', '0', '0', '1', '0', '1521970961', '1533108596');
INSERT INTO `wit_menu` VALUES ('3', '权限管理', '0', '#', 'fa fa-lock', '0', '0', '1', '0', '1521970961', '1521971972');
INSERT INTO `wit_menu` VALUES ('4', '菜单管理', '0', '#', 'fa fa-bars', '0', '0', '1', '0', '1521971007', '1521971690');
INSERT INTO `wit_menu` VALUES ('5', '内容管理', '0', '#', 'fa fa-file', '0', '0', '1', '0', '1521970983', '1521971644');
INSERT INTO `wit_menu` VALUES ('6', '友情链接', '0', 'friend-link/index', 'fa fa-link', '0', '0', '1', '0', '1521971227', '1521973122');
INSERT INTO `wit_menu` VALUES ('8', '管理员', '3', 'admin/index', 'fa fa-id-badge', '0', '0', '1', '0', '1521971313', '1533107632');
INSERT INTO `wit_menu` VALUES ('9', '角色', '3', 'rabc/index', 'fa fa-th-large', '0', '0', '1', '0', '1521972025', '1521972048');
INSERT INTO `wit_menu` VALUES ('10', '后台菜单', '4', 'backend-menu/index', 'fa fa-map', '0', '0', '1', '0', '1521972100', '1533108290');
INSERT INTO `wit_menu` VALUES ('11', '前台菜单', '4', 'frontend-menu/index', 'fa fa-map-o', '0', '0', '1', '0', '1521972134', '1533108306');
INSERT INTO `wit_menu` VALUES ('12', '文章管理', '5', 'article/index', 'fa fa-edit', '0', '0', '1', '0', '1521972263', '1533108167');

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
INSERT INTO `wit_migration` VALUES ('m140506_102106_rbac_init', '1519788294');
INSERT INTO `wit_migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', '1519788294');

-- ----------------------------
-- Table structure for wit_user
-- ----------------------------
DROP TABLE IF EXISTS `wit_user`;
CREATE TABLE `wit_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='前台用户表';

-- ----------------------------
-- Records of wit_user
-- ----------------------------
INSERT INTO `wit_user` VALUES ('1', 'sxz123', 'uTZwVSzBGd5g2LK8UxhhU2TIES6F-M_E', '$2y$13$VD9jg6bYCaczMVqQwveGBOAU7FCsDlDzmxc.emKLzrEcL6yQRfijq', null, '1129535445@qq.com', '10', '1518405548', '1518405548');
