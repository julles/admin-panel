/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : mrt

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-10-08 11:51:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `actions`
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `actions_action_index` (`action`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO actions VALUES ('1', 'create', 'Create', '2015-10-06 10:23:00', '2015-10-06 10:35:02');
INSERT INTO actions VALUES ('3', 'update', 'Update', '2015-10-06 10:38:07', '2015-10-06 10:38:07');
INSERT INTO actions VALUES ('4', 'delete', 'Delete', '2015-10-06 10:38:17', '2015-10-06 10:38:17');
INSERT INTO actions VALUES ('5', 'view', 'View', '2015-10-07 06:25:46', '2015-10-07 06:25:46');
INSERT INTO actions VALUES ('6', 'publish', 'Publish UnPublish', '2015-10-07 06:29:37', '2015-10-07 06:29:37');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_title_controller_permalink_order_index` (`parent_id`,`title`,`controller`,`permalink`,`order`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO menus VALUES ('1', '0', 'Developer', '#', '#', '666', 'developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('2', '1', 'Menu', 'Backend\\MenuController', 'menu', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('19', '1', 'Action', 'Backend\\ActionController', 'action', '2', '', '2015-10-06 09:53:35', '2015-10-06 09:53:35');
INSERT INTO menus VALUES ('20', '0', 'User', '#', '#', '1', '', '2015-10-07 04:57:34', '2015-10-07 04:57:34');
INSERT INTO menus VALUES ('21', '20', 'Role Administration', 'Backend\\RoleController', 'role', '1', 'icon', '2015-10-07 04:58:07', '2015-10-07 07:16:17');
INSERT INTO menus VALUES ('22', '20', 'User Administration', 'Backend\\UserController', 'user', '2', 'user', '2015-10-07 07:17:13', '2015-10-07 07:17:13');

-- ----------------------------
-- Table structure for `menu_actions`
-- ----------------------------
DROP TABLE IF EXISTS `menu_actions`;
CREATE TABLE `menu_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `action_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menu_actions_menu_id_foreign` (`menu_id`),
  KEY `menu_actions_action_id_foreign` (`action_id`),
  CONSTRAINT `menu_actions_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_actions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_actions
-- ----------------------------
INSERT INTO menu_actions VALUES ('7', '19', '4', '2015-10-07 04:50:12', '2015-10-07 04:50:12');
INSERT INTO menu_actions VALUES ('8', '19', '1', '2015-10-07 04:51:28', '2015-10-07 04:51:28');
INSERT INTO menu_actions VALUES ('9', '19', '3', '2015-10-07 04:51:30', '2015-10-07 04:51:30');
INSERT INTO menu_actions VALUES ('10', '21', '1', '2015-10-07 05:01:36', '2015-10-07 05:01:36');
INSERT INTO menu_actions VALUES ('11', '21', '3', '2015-10-07 05:01:37', '2015-10-07 05:01:37');
INSERT INTO menu_actions VALUES ('12', '21', '4', '2015-10-07 06:23:30', '2015-10-07 06:23:30');
INSERT INTO menu_actions VALUES ('15', '22', '1', '2015-10-07 08:10:15', '2015-10-07 08:10:15');
INSERT INTO menu_actions VALUES ('16', '22', '3', '2015-10-07 08:10:18', '2015-10-07 08:10:18');
INSERT INTO menu_actions VALUES ('17', '22', '4', '2015-10-07 08:10:19', '2015-10-07 08:10:19');
INSERT INTO menu_actions VALUES ('18', '21', '5', '2015-10-07 09:53:49', '2015-10-07 09:53:49');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO migrations VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO migrations VALUES ('2015_10_06_045619_create_menus_table', '1');
INSERT INTO migrations VALUES ('2015_10_06_094935_create_actions_table', '2');
INSERT INTO migrations VALUES ('2015_10_07_040654_create_menu_actions_table', '3');
INSERT INTO migrations VALUES ('2015_10_07_051040_create_roles_table', '4');
INSERT INTO migrations VALUES ('2015_10_07_072350_update_users_table', '5');
INSERT INTO migrations VALUES ('2015_10_07_090519_create_rights_table', '6');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `rights`
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `action_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rights_role_id_foreign` (`role_id`),
  KEY `rights_menu_id_foreign` (`menu_id`),
  KEY `rights_action_id_foreign` (`action_id`),
  CONSTRAINT `rights_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rights_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rights_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO rights VALUES ('45', '1', '19', '4', '2015-10-07 11:17:15', '2015-10-07 11:17:15');
INSERT INTO rights VALUES ('46', '1', '19', '1', '2015-10-07 11:17:15', '2015-10-07 11:17:15');
INSERT INTO rights VALUES ('47', '1', '19', '3', '2015-10-07 11:17:15', '2015-10-07 11:17:15');
INSERT INTO rights VALUES ('48', '1', '21', '1', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('51', '1', '21', '5', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('52', '1', '22', '1', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('53', '1', '22', '3', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('54', '1', '22', '4', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('57', '1', '21', '4', '2015-10-07 12:22:47', '2015-10-07 12:22:47');
INSERT INTO rights VALUES ('58', '1', '21', '3', '2015-10-07 12:23:28', '2015-10-07 12:23:28');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO roles VALUES ('1', 'Super Admin', '2015-10-07 17:03:49', '0000-00-00 00:00:00');
INSERT INTO roles VALUES ('5', 'Admin', '2015-10-07 07:43:11', '2015-10-07 07:43:11');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role_id` int(10) unsigned NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('3', 'superadmin', 'webarq@webarq.com', '$2y$10$i2X5wMrFOnEtkTKxdBQbZudlnAGpaDK6.yrs/HoBPvlOx5FcUJbfm', 'HgdojEIzUax2a9c2ht9B4cIWQknpzVc0vPabsDgR8ISalU5zhYhLrBU2pTc8', '2015-10-07 08:34:57', '2015-10-08 03:52:12', '1', 'Web', 'Architect', 'p', 'tes', '085779278894');
INSERT INTO users VALUES ('4', 'admin', 'reza.wikrama2@gmail.com', '$2y$10$WaTLwQIzT4IsSu2Gvl2VnuClxDt/wWfCrAnBiAN9JGhMANaTsOgg.', null, '2015-10-07 12:24:15', '2015-10-08 04:44:03', '5', 'admin', 'webarq', 'w', 'tes', '0123456789');
