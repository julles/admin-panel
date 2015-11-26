/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : webarq-core-fix

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-11-26 16:44:47
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `about`
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO about VALUES ('1', 'testing', '<p><img alt=\"\" src=\"/backend/elfinder/php/../../../contents/images/tes/1002156_4378331915527_1135570609_n.jpg\" style=\"height:221px; width:323px\" /></p>\r\n\r\n<p>testing wase</p>\r\n', '0000-00-00 00:00:00', '2015-10-12 07:53:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO actions VALUES ('1', 'create', 'Create', '2015-10-06 10:23:00', '2015-10-06 10:35:02');
INSERT INTO actions VALUES ('3', 'update', 'Update', '2015-10-06 10:38:07', '2015-10-06 10:38:07');
INSERT INTO actions VALUES ('4', 'delete', 'Delete', '2015-10-06 10:38:17', '2015-10-06 10:38:17');
INSERT INTO actions VALUES ('5', 'view', 'View', '2015-10-07 06:25:46', '2015-10-07 06:25:46');
INSERT INTO actions VALUES ('6', 'publish', 'Publish UnPublish', '2015-10-07 06:29:37', '2015-10-07 06:29:37');
INSERT INTO actions VALUES ('7', 'upload', 'Upload', '2015-10-08 12:09:20', '2015-10-08 12:09:20');

-- ----------------------------
-- Table structure for `histories`
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `values` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `histories_action_index` (`action`),
  KEY `histories_user_id_foreign` (`user_id`),
  CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of histories
-- ----------------------------
INSERT INTO histories VALUES ('1', '3', 'Login', '0', 'superadmin : Login  () ', '2015-11-26 08:36:11', '2015-11-26 08:36:11');
INSERT INTO histories VALUES ('2', '3', 'Update', '29', 'superadmin : Update About MRT (_token = QmhL829hQmZrWwaUuTw2KqXswxndOnIhalW0nmPC , title = testing , description = <p><img alt=\"\" src=\"/backend/elfinder/php/../../../contents/images/tes/1002156_4378331915527_1135570609_n.jpg\" style=\"height:221px; width:323px\" /></p>\r\n\r\n<p>testing wase</p>\r\n ,) ', '2015-11-26 08:36:34', '2015-11-26 08:36:34');
INSERT INTO histories VALUES ('3', '3', 'Published', '22', 'superadmin : Published User Administration (id = 4 ,) ', '2015-11-26 08:40:34', '2015-11-26 08:40:34');
INSERT INTO histories VALUES ('4', '3', 'Update His Profile', '30', 'superadmin : Update His Profile Profile (role_id = 1 , email = webarq@webarq.com , name = superadmin , password = $2y$10$zN.bB1SU1R4t8Guu3FB43.bBrOTgYlz7Ax3j1RILbF/TxcgVaADDG , firstname = Web , lastname = Architect , gender = p , address = tes , phone = 085779278894 ,) ', '2015-11-26 08:44:50', '2015-11-26 08:44:50');
INSERT INTO histories VALUES ('5', '3', 'Login', '0', 'superadmin : Login  () ', '2015-11-26 09:31:13', '2015-11-26 09:31:13');
INSERT INTO histories VALUES ('6', '5', 'Login', '0', 'reza : Login  () ', '2015-11-26 09:31:53', '2015-11-26 09:31:53');
INSERT INTO histories VALUES ('7', '5', 'Login', '0', 'reza : Login  () ', '2015-11-26 09:43:38', '2015-11-26 09:43:38');
INSERT INTO histories VALUES ('8', '5', 'Login', '0', 'reza : Login  () ', '2015-11-26 09:44:09', '2015-11-26 09:44:09');
INSERT INTO histories VALUES ('9', '5', 'Update His Profile', '30', 'reza : Update His Profile Profile (role_id = 1 , email = reza.wikrama3@gmail.com , name = reza , password = $2y$10$vRWHDaPcgZI9AOkIp5fknufAVvnXVCTXPepq76h8WctFY1gUzrwGS , firstname = Muhamad Reza , lastname = Abdul Rohim , gender = p , address =  , phone =  ,) ', '2015-11-26 09:44:25', '2015-11-26 09:44:25');
INSERT INTO histories VALUES ('10', '5', 'Login', '0', 'reza : Login  () ', '2015-11-26 09:44:34', '2015-11-26 09:44:34');

-- ----------------------------
-- Table structure for `media_library_configuration`
-- ----------------------------
DROP TABLE IF EXISTS `media_library_configuration`;
CREATE TABLE `media_library_configuration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_thumbnail_width` int(11) NOT NULL,
  `image_thumbnail_height` int(11) NOT NULL,
  `allowed_image_extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allowed_video_extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allowed_document_extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of media_library_configuration
-- ----------------------------
INSERT INTO media_library_configuration VALUES ('1', '100', '200', 'jpg;png;gif', '', '', '0000-00-00 00:00:00', '2015-10-09 12:30:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO menus VALUES ('1', '0', 'Developer', '#', '#', '666', 'developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('2', '1', 'Menu', 'Backend\\MenuController', 'menu', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('19', '1', 'Action', 'Backend\\ActionController', 'action', '2', '', '2015-10-06 09:53:35', '2015-10-06 09:53:35');
INSERT INTO menus VALUES ('20', '0', 'User', '#', '#', '1', '', '2015-10-07 04:57:34', '2015-10-07 04:57:34');
INSERT INTO menus VALUES ('21', '20', 'Role Administration', 'Backend\\RoleController', 'role', '1', 'icon', '2015-10-07 04:58:07', '2015-10-07 07:16:17');
INSERT INTO menus VALUES ('22', '20', 'User Administration', 'Backend\\UserController', 'user', '2', 'user', '2015-10-07 07:17:13', '2015-10-07 07:17:13');
INSERT INTO menus VALUES ('23', '0', 'Media Library', '#', '#', '1', 'media', '2015-10-08 10:23:38', '2015-10-08 10:23:38');
INSERT INTO menus VALUES ('24', '23', 'Image Library', 'Backend\\ImageLibraryController', 'image-library', '1', '', '2015-10-08 10:24:18', '2015-10-08 10:24:18');
INSERT INTO menus VALUES ('25', '23', 'Video Library', 'Backend\\VideoLibraryController', 'video-library', '2', '', '2015-10-09 11:46:26', '2015-10-09 11:46:26');
INSERT INTO menus VALUES ('26', '23', 'Document Library', 'Backend\\DocumentLibraryControlelr', 'document-library', '3', '', '2015-10-09 12:04:19', '2015-10-09 12:04:19');
INSERT INTO menus VALUES ('27', '23', 'Media Library Configuration', 'Backend\\MediaLibraryConfigurationController', 'media-library-configuration', '4', '', '2015-10-09 12:18:16', '2015-10-09 12:18:35');
INSERT INTO menus VALUES ('28', '0', 'About Us', '#', '#', '1', '', '2015-10-12 05:14:11', '2015-10-12 05:14:11');
INSERT INTO menus VALUES ('29', '28', 'About MRT', 'Backend\\AboutController', 'about-mrt', '1', '', '2015-10-12 05:14:40', '2015-10-12 05:14:40');
INSERT INTO menus VALUES ('30', '20', 'Profile', 'Backend\\ProfileController', 'profile', '3', '', '2015-11-26 08:41:26', '2015-11-26 08:41:26');
INSERT INTO menus VALUES ('31', '20', 'History', 'Backend\\HistoryController', 'history', '4', '', '2015-11-26 08:46:43', '2015-11-26 08:46:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO menu_actions VALUES ('19', '2', '1', '2015-10-08 08:12:54', '2015-10-08 08:12:54');
INSERT INTO menu_actions VALUES ('20', '2', '3', '2015-10-08 08:12:55', '2015-10-08 08:12:55');
INSERT INTO menu_actions VALUES ('21', '2', '4', '2015-10-08 08:12:55', '2015-10-08 08:12:55');
INSERT INTO menu_actions VALUES ('22', '2', '5', '2015-10-08 08:12:56', '2015-10-08 08:12:56');
INSERT INTO menu_actions VALUES ('23', '2', '6', '2015-10-08 08:12:57', '2015-10-08 08:12:57');
INSERT INTO menu_actions VALUES ('24', '24', '7', '2015-10-08 12:09:36', '2015-10-08 12:09:36');
INSERT INTO menu_actions VALUES ('26', '24', '4', '2015-10-08 12:10:41', '2015-10-08 12:10:41');
INSERT INTO menu_actions VALUES ('27', '25', '7', '2015-10-09 11:54:26', '2015-10-09 11:54:26');
INSERT INTO menu_actions VALUES ('28', '25', '4', '2015-10-09 11:54:30', '2015-10-09 11:54:30');
INSERT INTO menu_actions VALUES ('29', '26', '7', '2015-10-09 12:04:37', '2015-10-09 12:04:37');
INSERT INTO menu_actions VALUES ('30', '26', '4', '2015-10-09 12:04:40', '2015-10-09 12:04:40');
INSERT INTO menu_actions VALUES ('31', '22', '6', '2015-11-26 08:37:48', '2015-11-26 08:37:48');

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
INSERT INTO migrations VALUES ('2015_10_09_121320_create_media_library_configuration', '7');
INSERT INTO migrations VALUES ('2015_10_11_055244_create_about_table', '8');
INSERT INTO migrations VALUES ('2015_11_26_082425_create_histories_table', '9');

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO rights VALUES ('48', '1', '21', '1', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('51', '1', '21', '5', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('52', '1', '22', '1', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('53', '1', '22', '3', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('54', '1', '22', '4', '2015-10-07 11:17:19', '2015-10-07 11:17:19');
INSERT INTO rights VALUES ('57', '1', '21', '4', '2015-10-07 12:22:47', '2015-10-07 12:22:47');
INSERT INTO rights VALUES ('58', '1', '21', '3', '2015-10-07 12:23:28', '2015-10-07 12:23:28');
INSERT INTO rights VALUES ('59', '1', '19', '4', '2015-10-08 08:13:37', '2015-10-08 08:13:37');
INSERT INTO rights VALUES ('60', '1', '19', '1', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('61', '1', '19', '3', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('62', '1', '2', '1', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('63', '1', '2', '3', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('64', '1', '2', '4', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('65', '1', '2', '5', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('66', '1', '2', '6', '2015-10-08 08:13:38', '2015-10-08 08:13:38');
INSERT INTO rights VALUES ('71', '1', '24', '4', '2015-10-08 12:29:25', '2015-10-08 12:29:25');
INSERT INTO rights VALUES ('72', '1', '24', '7', '2015-10-09 03:59:21', '2015-10-09 03:59:21');
INSERT INTO rights VALUES ('73', '1', '25', '7', '2015-10-09 11:54:44', '2015-10-09 11:54:44');
INSERT INTO rights VALUES ('74', '1', '25', '4', '2015-10-09 11:54:45', '2015-10-09 11:54:45');
INSERT INTO rights VALUES ('75', '1', '26', '7', '2015-10-09 12:04:53', '2015-10-09 12:04:53');
INSERT INTO rights VALUES ('76', '1', '26', '4', '2015-10-09 12:04:53', '2015-10-09 12:04:53');
INSERT INTO rights VALUES ('77', '1', '22', '6', '2015-11-26 08:38:01', '2015-11-26 08:38:01');

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
  `status` enum('y','n') COLLATE utf8_unicode_ci DEFAULT 'n',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('3', 'superadmin', 'webarq@webarq.com', '$2y$10$zN.bB1SU1R4t8Guu3FB43.bBrOTgYlz7Ax3j1RILbF/TxcgVaADDG', 'PJSFqcMKfaovanBXnEXsbp3Sl8EYJHWUOxTdKXiBgYUMbeLtS9qF2zHRThKu', '2015-10-07 08:34:57', '2015-11-26 09:31:49', '1', 'Web', 'Architect', 'p', 'tes', '085779278894', 'y');
INSERT INTO users VALUES ('4', 'admin', 'reza.wikrama2@gmail.com', '$2y$10$WaTLwQIzT4IsSu2Gvl2VnuClxDt/wWfCrAnBiAN9JGhMANaTsOgg.', null, '2015-10-07 12:24:15', '2015-11-26 08:40:34', '5', 'admin', 'webarq', 'w', 'tes', '0123456789', 'y');
INSERT INTO users VALUES ('5', 'reza', 'reza.wikrama3@gmail.com', '$2y$10$vRWHDaPcgZI9AOkIp5fknufAVvnXVCTXPepq76h8WctFY1gUzrwGS', 'qiyCttqvAEVZAogo4FXrMhRkm2lAgceW6rqKmH3poAvhJSTbYM5LDbNA9H7t', '2015-11-26 09:31:46', '2015-11-26 09:44:30', '1', 'Muhamad Reza', 'Abdul Rohim', 'p', '', '', 'n');
