-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 10:57 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii-starter-kit`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `thumbnail_base_url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_article_author_id` (`author_id`),
  KEY `idx_article_updater_id` (`updater_id`),
  KEY `idx_category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_attachment`
--

CREATE TABLE IF NOT EXISTS `article_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_attachment_article` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `slug`, `title`, `body`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'news', 'News', NULL, NULL, 1, 1430231208, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_storage_item`
--

CREATE TABLE IF NOT EXISTS `file_storage_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component` varchar(255) NOT NULL,
  `base_url` varchar(512) NOT NULL,
  `path` varchar(512) NOT NULL,
  `type` varchar(128) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `upload_ip` varchar(15) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i18n_message`
--

CREATE TABLE IF NOT EXISTS `i18n_message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `translation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `i18n_source_message`
--

CREATE TABLE IF NOT EXISTS `i18n_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `key_storage_item`
--

CREATE TABLE IF NOT EXISTS `key_storage_item` (
  `key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `key_storage_item`
--

INSERT INTO `key_storage_item` (`key`, `value`, `comment`, `updated_at`, `created_at`) VALUES
('backend.layout-boxed', '0', NULL, NULL, NULL),
('backend.layout-collapsed-sidebar', '0', NULL, NULL, NULL),
('backend.layout-fixed', '0', NULL, NULL, NULL),
('backend.theme-skin', 'skin-blue', 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow', NULL, NULL),
('frontend.maintenance', '0', 'Set it to "true" to turn on maintenance mode', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `slug`, `title`, `body`, `status`, `created_at`, `updated_at`, `seo_title`) VALUES
(1, 'about', 'About', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1430231208, 1430231208, ''),
(2, 'welcome', 'Главная', '<p>таике дела</p>', 1, 1430381000, 1430381091, '');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `rbac_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rbac_auth_assignment`
--

INSERT INTO `rbac_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', '1', 1430380603),
('administrator', '4', 1430380658),
('manager', '2', 1430380603),
('user', '3', 1430380603);

-- --------------------------------------------------------

--
-- Table structure for table `rbac_auth_item`
--

CREATE TABLE IF NOT EXISTS `rbac_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rbac_auth_item`
--

INSERT INTO `rbac_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrator', 1, NULL, NULL, NULL, 1430380603, 1430380603),
('loginToBackend', 2, NULL, NULL, NULL, 1430380603, 1430380603),
('manager', 1, NULL, NULL, NULL, 1430380602, 1430380602),
('user', 1, NULL, NULL, NULL, 1430380602, 1430380602);

-- --------------------------------------------------------

--
-- Table structure for table `rbac_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `rbac_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rbac_auth_item_child`
--

INSERT INTO `rbac_auth_item_child` (`parent`, `child`) VALUES
('manager', 'loginToBackend'),
('administrator', 'manager'),
('manager', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_auth_rule`
--

CREATE TABLE IF NOT EXISTS `rbac_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE IF NOT EXISTS `system_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` double DEFAULT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_log_level` (`level`),
  KEY `idx_log_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_migration`
--

CREATE TABLE IF NOT EXISTS `system_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_migration`
--

INSERT INTO `system_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1430231199),
('m140703_123000_user', 1430231207),
('m140703_123055_log', 1430231207),
('m140703_123104_page', 1430231208),
('m140703_123803_article', 1430231210),
('m140703_123813_rbac', 1430231211),
('m140709_173306_widget_menu', 1430231211),
('m140709_173333_widget_text', 1430231212),
('m140712_123329_widget_carousel', 1430231213),
('m140805_084745_key_storage_item', 1430231213),
('m141012_101932_i18n_tables', 1430231214),
('m150205_004740_maintenance', 1430231214),
('m150211_233921_article_attachment', 1430231215),
('m150318_213934_file_storage_item', 1430231215),
('m150408_211055_article_thumbnail', 1430231215),
('m150414_195800_timeline_event', 1430231216);

-- --------------------------------------------------------

--
-- Table structure for table `timeline_event`
--

CREATE TABLE IF NOT EXISTS `timeline_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `timeline_event`
--

INSERT INTO `timeline_event` (`id`, `application`, `category`, `event`, `data`, `created_at`) VALUES
(1, 'frontend', 'user', 'signup', '{"publicIdentity":"webmaster","userId":1,"created_at":1430231216}', 1430231216),
(2, 'frontend', 'user', 'signup', '{"publicIdentity":"manager","userId":2,"created_at":1430231216}', 1430231216),
(3, 'frontend', 'user', 'signup', '{"publicIdentity":"user","userId":3,"created_at":1430231216}', 1430231216),
(4, 'backend', 'user', 'signup', '{"publicIdentity":"admin","userId":4,"created_at":1430380658}', 1430380658);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_client_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `logged_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `oauth_client`, `oauth_client_user_id`, `email`, `status`, `created_at`, `updated_at`, `logged_at`) VALUES
(1, 'webmaster', 'kPoMP9An6y9uEfbjlJ9IX9a7R7kB6I4l', '$2y$13$MV3CsnVLZO5IZ3a92BhU1.1r4QLqGU7Cws9I1L5P0U1WOOs.yxvXu', NULL, NULL, NULL, 'webmaster@example.com', 1, 1430231203, 1430380623, 1430380623),
(2, 'manager', 'Lf2uJrbTYAicmdjIhApiQGLjkgORPgC-', '$2y$13$lL7EctclEosnyaEQ1Lsof.YZ0pndpp6DIcbuCSJLY2h0U4imnpNca', NULL, NULL, NULL, 'manager@example.com', 1, 1430231205, 1430231205, NULL),
(3, 'user', 'ZFMwekO7Q7ACVQ1SfShW7rm20iMZtj1V', '$2y$13$JoWkom5V1rtalu5w94VNFehWL0EeyqnuP/2A1IIEDdBJQA.euvI0W', NULL, NULL, NULL, 'user@example.com', 1, 1430231206, 1430231206, NULL),
(4, 'admin', 'lnO43KMGOeN5NSU2niFauRpdmJA6Wni9', '$2y$13$xb5SK5s2cjwKtnLmoc3BHOe8RXMYkIGoz3fCh6DFo16.7AoklqIAq', NULL, NULL, NULL, 'timofeimih@gmail.com', 1, 1430380658, 1430380658, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_base_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `firstname`, `middlename`, `lastname`, `avatar_path`, `avatar_base_url`, `locale`, `gender`) VALUES
(1, 'John', '', 'Doe', NULL, NULL, 'ru-RU', 2),
(2, NULL, NULL, NULL, NULL, NULL, 'en-US', NULL),
(3, NULL, NULL, NULL, NULL, NULL, 'en-US', NULL),
(4, NULL, NULL, NULL, NULL, NULL, 'en-US', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `widget_carousel`
--

CREATE TABLE IF NOT EXISTS `widget_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `widget_carousel`
--

INSERT INTO `widget_carousel` (`id`, `key`, `status`) VALUES
(1, 'index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `widget_carousel_item`
--

CREATE TABLE IF NOT EXISTS `widget_carousel_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_id` int(11) NOT NULL,
  `base_url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_carousel_id` (`carousel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `widget_carousel_item`
--

INSERT INTO `widget_carousel_item` (`id`, `carousel_id`, `base_url`, `path`, `type`, `url`, `caption`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://yii2-starter-kit.dev', 'img/yii2-starter-kit.gif', 'image/gif', '/', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `widget_menu`
--

CREATE TABLE IF NOT EXISTS `widget_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `widget_menu`
--

INSERT INTO `widget_menu` (`id`, `key`, `title`, `items`, `status`) VALUES
(1, 'frontend-index', 'Frontend index menu', '[\n    {\n        "label": "Get started with Yii2",\n        "url": "http://www.yiiframework.com",\n        "options": {\n            "tag": "span"\n        },\n        "template": "<a href=\\"{url}\\" class=\\"btn btn-lg btn-success\\">{label}</a>"\n    },\n    {\n        "label": "Yii2 Starter Kit on GitHub",\n        "url": "https://github.com/trntv/yii2-starter-kit",\n        "options": {\n            "tag": "span"\n        },\n        "template": "<a href=\\"{url}\\" class=\\"btn btn-lg btn-primary\\">{label}</a>"\n    },\n    {\n        "label": "Find a bug?",\n        "url": "https://github.com/trntv/yii2-starter-kit/issues",\n        "options": {\n            "tag": "span"\n        },\n        "template": "<a href=\\"{url}\\" class=\\"btn btn-lg btn-danger\\">{label}</a>"\n    }\n]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `widget_text`
--

CREATE TABLE IF NOT EXISTS `widget_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_widget_text_key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `widget_text`
--

INSERT INTO `widget_text` (`id`, `key`, `title`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'backend_welcome', 'Welcome to backend', '<p>Welcome to Yii2 Starter Kit Dashboard</p>', 1, 1430231211, 1430231211);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `article_category` (`id`),
  ADD CONSTRAINT `fk_article_updater` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `article_attachment`
--
ALTER TABLE `article_attachment`
  ADD CONSTRAINT `fk_article_attachment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `fk_article_category_section` FOREIGN KEY (`parent_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `i18n_message`
--
ALTER TABLE `i18n_message`
  ADD CONSTRAINT `fk_i18n_message_source_message` FOREIGN KEY (`id`) REFERENCES `i18n_source_message` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rbac_auth_assignment`
--
ALTER TABLE `rbac_auth_assignment`
  ADD CONSTRAINT `rbac_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rbac_auth_item`
--
ALTER TABLE `rbac_auth_item`
  ADD CONSTRAINT `rbac_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `rbac_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `rbac_auth_item_child`
--
ALTER TABLE `rbac_auth_item_child`
  ADD CONSTRAINT `rbac_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rbac_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `widget_carousel_item`
--
ALTER TABLE `widget_carousel_item`
  ADD CONSTRAINT `fk_item_carousel` FOREIGN KEY (`carousel_id`) REFERENCES `widget_carousel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
