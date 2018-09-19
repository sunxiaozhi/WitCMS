/*
Navicat MySQL Data Transfer

Source Server         : phpstudy_mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : witcms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-09-19 21:25:53
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
INSERT INTO `wit_admin` VALUES ('1', 'admin', 'fVXR19v5dMVRub2Hy06h4f_e8Mn1ocVq', '$2y$13$257Eh6dhyfkSL76iinsQJ.Z/OTE1rgca7b/9aThY1CH6lDLSL072.', null, '1129535445@qq.com', '10', '1518405548', '1533716711');

-- ----------------------------
-- Table structure for wit_article
-- ----------------------------
DROP TABLE IF EXISTS `wit_article`;
CREATE TABLE `wit_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `category_id` int(11) unsigned NOT NULL COMMENT '文章分类',
  `sub_title` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `content` text NOT NULL COMMENT '文章内容',
  `is_recommend` tinyint(2) DEFAULT '0' COMMENT '是否推荐 0不推荐 1推荐',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `type` tinyint(2) DEFAULT '0' COMMENT '类型 0文章 1单页',
  `seo_title` varchar(255) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) DEFAULT '' COMMENT 'seo关键词',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of wit_article
-- ----------------------------
INSERT INTO `wit_article` VALUES ('44', '测试文章', '3', '测试文章副标题', '测试文章摘要水电费水电费水电费水电费是的发送到水电费水电费所发生的水电费沙发斯蒂芬舒服舒服沙发斯蒂芬所发生的发送放松放松发送的发顺分发送发顺分舒服舒服所发生的防守打法舒服舒服是否是沙发斯蒂芬是所发生的飞', '<p style=\"margin-left: 20px;\">干豆腐干豆腐电饭锅电饭锅电饭锅d</p><p><strong>豆腐干豆腐</strong></p><p style=\"margin-left: 20px;\">电饭锅电饭锅梵蒂冈地方 电饭锅</p>', '1', '12', '1', '0', '1233', '444', '55555', '1533533945', '1537339774');
INSERT INTO `wit_article` VALUES ('45', '阿萨德df的非官方大哥梵蒂冈地方', '3', '打的', 'dadas', '<p>打打杀杀</p>', '1', '2', '1', '0', 'dasd', 'dad', 'dad', '1536718630', '1537341502');
INSERT INTO `wit_article` VALUES ('46', '其请求无', '3', '戚薇戚薇戚薇', 'qwrqweqwe', '<p>戚薇戚薇戚薇</p>', '1', '3', '1', '0', 'dasd', '绕弯儿', 'werwer', '1537146094', '1537339778');

-- ----------------------------
-- Table structure for wit_article_category
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_category`;
CREATE TABLE `wit_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '别名',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '备注',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章分类表';

-- ----------------------------
-- Records of wit_article_category
-- ----------------------------
INSERT INTO `wit_article_category` VALUES ('1', '0', 'php', 'php', '0', 'www', '1468293958', '0');
INSERT INTO `wit_article_category` VALUES ('2', '0', 'mysql', 'mysql', '3', '1313', '1468293965', '1537340502');
INSERT INTO `wit_article_category` VALUES ('3', '0', 'javascript', 'javascript', '0', '', '1468293974', '1533621262');
INSERT INTO `wit_article_category` VALUES ('4', '2', 'mysql优化', 'mysql优化', '1', '', '1537340518', '1537340518');

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
-- Table structure for wit_article_tag
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_tag`;
CREATE TABLE `wit_article_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '名称',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '别名',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '备注',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章标签表';

-- ----------------------------
-- Records of wit_article_tag
-- ----------------------------
INSERT INTO `wit_article_tag` VALUES ('1', 'php', 'php', '0', 'www', '1468293958', '1468293958');
INSERT INTO `wit_article_tag` VALUES ('2', 'java', 'java', '3', '1313', '1468293965', '1533621214');
INSERT INTO `wit_article_tag` VALUES ('3', 'javascript', 'javascript', '0', '', '1468293974', '1533621262');
INSERT INTO `wit_article_tag` VALUES ('4', '3543', '5345', '3', '4534543', '1536893860', '1536893860');
INSERT INTO `wit_article_tag` VALUES ('5', '3543', '5345', '3', '4534543', '1536893891', '1536893891');
INSERT INTO `wit_article_tag` VALUES ('6', '1', '1', '0', '', '1537145042', '1537145042');
INSERT INTO `wit_article_tag` VALUES ('7', '2', '2', '0', '', '1537145042', '1537145042');
INSERT INTO `wit_article_tag` VALUES ('8', '3', '3', '0', '', '1537145042', '1537145042');
INSERT INTO `wit_article_tag` VALUES ('9', '37', '37', '0', '', '1537145049', '1537145049');
INSERT INTO `wit_article_tag` VALUES ('10', '嗯嗯嗯', '嗯嗯嗯', '0', '', '1537146094', '1537146094');
INSERT INTO `wit_article_tag` VALUES ('11', '456456', '456456', '0', '', '1537341502', '1537341502');

-- ----------------------------
-- Table structure for wit_article_tag_relation
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_tag_relation`;
CREATE TABLE `wit_article_tag_relation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tag_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '标签id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='文章标签映射表';

-- ----------------------------
-- Records of wit_article_tag_relation
-- ----------------------------
INSERT INTO `wit_article_tag_relation` VALUES ('35', '44', '6');
INSERT INTO `wit_article_tag_relation` VALUES ('36', '44', '7');
INSERT INTO `wit_article_tag_relation` VALUES ('37', '44', '9');
INSERT INTO `wit_article_tag_relation` VALUES ('38', '46', '10');
INSERT INTO `wit_article_tag_relation` VALUES ('39', '45', '11');

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
INSERT INTO `wit_auth_assignment` VALUES ('普通管理员', '1', '1533776565');
INSERT INTO `wit_auth_assignment` VALUES ('普通管理员', '20', '1533716031');

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
INSERT INTO `wit_auth_item` VALUES ('测试', '1', '测试', null, null, '1533712861', '1533712861');
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
INSERT INTO `wit_friend_link` VALUES ('1', '百度', '', 'www.baidu.com', '_blank', '0', '1', '1468303882', '1536196092');
INSERT INTO `wit_friend_link` VALUES ('2', '谷歌', '', 'www.google.com', '_self', '1', '1', '222', '1533776786');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of wit_menu
-- ----------------------------
INSERT INTO `wit_menu` VALUES ('1', '仪表盘', '0', 'site/index', 'fa fa-dashboard', '0', '0', '1', '0', '1521970930', '1533174592');
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
INSERT INTO `wit_menu` VALUES ('13', '首页', '0', 'site/index', 'fa fa-map', '1', '0', '1', '0', '1533193393', '1533193393');
INSERT INTO `wit_menu` VALUES ('14', '文章分类', '5', 'article-category/index', 'fa fa-folder-open', '0', '0', '1', '0', '1533611643', '1536892649');
INSERT INTO `wit_menu` VALUES ('15', 'PHP', '0', 'article/index', '', '1', '0', '1', '0', '1536568679', '1536568679');
INSERT INTO `wit_menu` VALUES ('16', 'PHP知识', '15', 'article/index', '', '1', '0', '1', '0', '1536568723', '1536568723');
INSERT INTO `wit_menu` VALUES ('17', '文章标签', '5', 'article-tag/index', 'fa fa-tags', '0', '0', '1', '0', '1536892002', '1536892658');

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
