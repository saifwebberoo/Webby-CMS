-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2011 at 09:54 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aandrnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--


--
-- Table structure for table `email_logs`
--

CREATE TABLE IF NOT EXISTS `email_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `open_on` datetime NOT NULL,
  `send_on` datetime NOT NULL,
  `joined` tinyint(1) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `email_logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `file_types`
--

CREATE TABLE IF NOT EXISTS `file_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `file_types`
--

INSERT INTO `file_types` (`id`, `name`) VALUES
(1, 'Image'),
(2, 'Documents'),
(3, 'Audio'),
(4, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `keyword` varchar(25) NOT NULL,
  `modified_by` mediumint(6) NOT NULL,
  `created_by` mediumint(6) NOT NULL,
  `successmsg` mediumtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `savetodb` tinyint(1) NOT NULL DEFAULT '0',
  `redirect` varchar(255) NOT NULL,
  `fmethod` tinyint(4) NOT NULL,
  `faction` varchar(255) NOT NULL,
  `ccemail` varchar(255) NOT NULL,
  `response_content` mediumtext NOT NULL,
  `response_email` tinyint(1) NOT NULL DEFAULT '0',
  `response_subject` text NOT NULL,
  `response_from` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keyword` (`keyword`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `content`, `created`, `modified`, `keyword`, `modified_by`, `created_by`, `successmsg`, `email`, `savetodb`, `redirect`, `fmethod`, `faction`, `ccemail`, `response_content`, `response_email`, `response_subject`, `response_from`) VALUES
(1, 'Contact From', '<div class="main">\r\n	<p>\r\n		Please fill all the required field before submit.</p>\r\n	<ul class="form-lay">\r\n		<li>\r\n			<label>Full Name</label> <input maxlength="255" name="data[name]" type="text" /></li>\r\n		<li>\r\n			<br />\r\n			<label>Email Address</label> <input maxlength="255" name="data[email]" type="text" /></li>\r\n		<li>\r\n			<label>Phone/Mobile</label> <input maxlength="255" name="data[mobile]" type="text" /></li>\r\n		<li>\r\n			<label>Subject</label> <input maxlength="255" name="data[subject]" type="text" /></li>\r\n		<li>\r\n			<label>Message</label><textarea name="data[message]"></textarea></li>\r\n		<li>\r\n			<input id="submit-button" type="submit" value="Send Now" /></li>\r\n	</ul>\r\n</div>\r\n', '2010-10-26 11:48:10', '2011-12-13 07:48:10', 'contact_frm', 0, 15, 'Saved Successfully', 'saif.silver@gmail.com', 1, '', 1, '', 'saif.silver@gmail.com', '<p>\r\n	Thanks</p>\r\n<p>\r\n	For Contacting</p>\r\n', 1, 'Test Response Subject', 'saif.silver@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE IF NOT EXISTS `form_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` mediumtext NOT NULL,
  `form_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `value`, `form_id`, `created`, `modified`) VALUES
(1, 'YTo3OntzOjg6ImZvcm1uYW1lIjtzOjIwOiJZMjl1ZEdGamRGOW1jbTBqSXlNeCI7czo4OiJyZWRpcmVjdCI7czoxOToiL3BhZ2VzL2NvbnRhY3QuaHRtbCI7czo0OiJuYW1lIjtzOjU6InNhZmluIjtzOjU6ImVtYWlsIjtzOjE3OiJzYWZpbnNtQGdtYWlsLmNvbSI7czo2OiJtb2JpbGUiO3M6MTA6Ijg4OTExMjgyNDkiO3M6Nzoic3ViamVjdCI7czo0OiJzZGFkIjtzOjc6Im1lc3NhZ2UiO3M6MTE6InNkc2FmZGZkZmRzIjt9', 1, '2011-12-13 15:54:14', '2011-12-13 15:54:14'),
(2, 'YTo3OntzOjg6ImZvcm1uYW1lIjtzOjIwOiJZMjl1ZEdGamRGOW1jbTBqSXlNeCI7czo4OiJyZWRpcmVjdCI7czoxOToiL3BhZ2VzL2NvbnRhY3QuaHRtbCI7czo0OiJuYW1lIjtzOjU6InNhZmluIjtzOjU6ImVtYWlsIjtzOjE3OiJzYWZpbnNtQGdtYWlsLmNvbSI7czo2OiJtb2JpbGUiO3M6MTA6Ijg4OTExMjgyNDkiO3M6Nzoic3ViamVjdCI7czo0OiJzZGFkIjtzOjc6Im1lc3NhZ2UiO3M6MTE6InNkc2FmZGZkZmRzIjt9', 1, '2011-12-13 15:54:21', '2011-12-13 15:54:21'),
(3, 'YTo3OntzOjg6ImZvcm1uYW1lIjtzOjIwOiJZMjl1ZEdGamRGOW1jbTBqSXlNeCI7czo4OiJyZWRpcmVjdCI7czoxOToiL3BhZ2VzL2NvbnRhY3QuaHRtbCI7czo0OiJuYW1lIjtzOjU6InNhZmluIjtzOjU6ImVtYWlsIjtzOjE3OiJzYWZpbnNtQGdtYWlsLmNvbSI7czo2OiJtb2JpbGUiO3M6MTA6Ijg4OTExMjgyNDkiO3M6Nzoic3ViamVjdCI7czo0OiJzZGFkIjtzOjc6Im1lc3NhZ2UiO3M6MTE6InNkc2FmZGZkZmRzIjt9', 1, '2011-12-13 15:54:51', '2011-12-13 15:54:51'),
(4, 'YTo3OntzOjg6ImZvcm1uYW1lIjtzOjIwOiJZMjl1ZEdGamRGOW1jbTBqSXlNeCI7czo4OiJyZWRpcmVjdCI7czoxOToiL3BhZ2VzL2NvbnRhY3QuaHRtbCI7czo0OiJuYW1lIjtzOjU6InNhZmluIjtzOjU6ImVtYWlsIjtzOjE3OiJzYWZpbnNtQGdtYWlsLmNvbSI7czo2OiJtb2JpbGUiO3M6MTA6Ijg4OTExMjgyNDkiO3M6Nzoic3ViamVjdCI7czo0OiJzZGFkIjtzOjc6Im1lc3NhZ2UiO3M6MTE6InNkc2FmZGZkZmRzIjt9', 1, '2011-12-13 15:55:16', '2011-12-13 15:55:16'),
(5, 'YTo3OntzOjg6ImZvcm1uYW1lIjtzOjIwOiJZMjl1ZEdGamRGOW1jbTBqSXlNeCI7czo4OiJyZWRpcmVjdCI7czoxOToiL3BhZ2VzL2NvbnRhY3QuaHRtbCI7czo0OiJuYW1lIjtzOjg6ImV3cmV3cndlIjtzOjU6ImVtYWlsIjtzOjE3OiJyd2Vyd2VAc2RhZHNkLmNvbSI7czo2OiJtb2JpbGUiO3M6ODoic3dlcndlcnciO3M6Nzoic3ViamVjdCI7czo0OiJlcmV3IjtzOjc6Im1lc3NhZ2UiO3M6ODoicndlcmV3cnciO30=', 1, '2011-12-13 15:55:19', '2011-12-13 15:55:19'),
(6, 'YTo3OntzOjg6ImZvcm1uYW1lIjtzOjIwOiJZMjl1ZEdGamRGOW1jbTBqSXlNeCI7czo4OiJyZWRpcmVjdCI7czoxOToiL3BhZ2VzL2NvbnRhY3QuaHRtbCI7czo0OiJuYW1lIjtzOjU6InNhZmluIjtzOjU6ImVtYWlsIjtzOjE3OiJzYWZpbnNtQGdtYWlsLmNvbSI7czo2OiJtb2JpbGUiO3M6MTA6Ijg4OTExMjgyNDkiO3M6Nzoic3ViamVjdCI7czo0OiJzZGFkIjtzOjc6Im1lc3NhZ2UiO3M6MTE6InNkc2FmZGZkZmRzIjt9', 1, '2011-12-13 15:55:32', '2011-12-13 15:55:32');

-- --------------------------------------------------------


--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` tinyint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_count` smallint(6) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `user_count`, `created`, `modified`) VALUES
(1, 'Super Admin', 3, '2011-09-12 17:03:52', '2011-09-12 17:03:53'),
(2, 'Admin', 2, '2011-09-12 17:03:59', '2011-09-12 17:04:00'),
(3, 'Staff', 1, '2011-09-12 17:04:12', '2011-09-12 17:04:13'),
(5, 'Senior Admin', 0, '2011-12-12 16:11:08', '2011-12-12 16:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `new_window` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `image_category_id` int(10) unsigned NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_category_id` (`image_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Table structure for table `image_categories`
--

CREATE TABLE IF NOT EXISTS `image_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `crop_width` mediumint(9) NOT NULL,
  `crop_height` mediumint(9) NOT NULL,
  `path_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `image_categories`
--

INSERT INTO `image_categories` (`id`, `name`, `crop_width`, `crop_height`, `path_name`) VALUES
(1, 'Main Banner', 420, 240, 'Main_Banner'),
(2, 'Bottom Slider', 140, 144, 'Bottom_Slider'),
(3, 'Sponsor Banner', 900, 50, 'Sponsor_Banner');

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `morder` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `published`, `created`, `modified`, `created_by`, `modified_by`, `morder`) VALUES
(1, 'Main Menu', 1, '2010-09-28 16:36:06', '2010-09-28 16:36:06', 0, 0, 1),
(8, 'Footer Menu', 1, '2010-10-04 14:27:19', '2010-10-04 14:27:19', 0, 0, 2),
(10, 'Registration pages', 1, '2011-11-25 16:42:46', '2011-11-25 16:42:46', 0, 0, 0),
(11, 'Top Navigation', 1, '2011-12-08 17:09:33', '2011-12-08 17:09:33', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` mediumint(4) NOT NULL,
  `porder` mediumint(4) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pageurl` varchar(250) NOT NULL,
  `page_id` int(10) unsigned NOT NULL DEFAULT '0',
  `head_script` text NOT NULL,
  `content` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `meta_keywords` mediumtext NOT NULL,
  `meta_descriptions` mediumtext NOT NULL,
  `menu_label` varchar(255) NOT NULL,
  `link_type` enum('External','Internal') NOT NULL DEFAULT 'External',
  `islink` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pageurl` (`pageurl`(20))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101;



-- --------------------------------------------------------

--
-- Table structure for table `pages_widgets`
--

CREATE TABLE IF NOT EXISTS `pages_widgets` (
  `page_id` mediumint(5) unsigned NOT NULL,
  `widget_id` tinyint(4) unsigned NOT NULL,
  KEY `page_id` (`page_id`,`widget_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `pair` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `setting_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `pair`, `description`, `created`, `modified`, `setting_type_id`) VALUES
(1, 'SHOW_PAGES', '20', 'Using for Pagination ', '0000-00-00 00:00:00', '2011-12-13 08:42:38', 1),
(2, 'SITE_NAME', 'Webberoo.IN', 'Website Name Used to display in title of page as default\r\n', '0000-00-00 00:00:00', '2011-12-12 09:18:43', 1),
(17, 'ADMIN_EMAIL', 'saif.silver@gmail.com', 'Used for notify new member Joining, Money Deposit/Withdraw Alerts, New Campaign Creation Alerts etc.', '2010-01-10 18:08:43', '2010-09-24 13:50:20', 1),
(18, 'FROM_EMAIL', 'saif.silver@gmail.com', 'User in from place to an email', '2010-01-10 18:14:49', '2011-12-12 09:23:19', 1),
(19, 'LOGO_SIZE', '100,100', 'width,height', '2010-02-08 11:26:04', '2011-12-12 09:19:43', 9),
(21, 'IMAGE_THUMB_SIZE', '100,100', 'width,height', '2010-02-08 11:33:17', '2011-12-12 09:19:52', 9),
(22, 'IMAGE_SIZE', '400,400', 'width,height', '2010-02-08 11:33:44', '2011-12-12 09:20:00', 9),
(37, 'ADMIN_EMAIL_NAME', 'Webberoo.IN', 'Used in email as Name of Sender', '2011-12-13 07:54:55', '2011-12-13 07:54:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting_types`
--

CREATE TABLE IF NOT EXISTS `setting_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `setting_types`
--

INSERT INTO `setting_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Common Settings', '2010-01-08 05:59:12', '2011-12-12 09:19:31'),
(9, 'Media Settings', '2011-12-12 09:19:23', '2011-12-12 09:19:23');


-- --------------------------------------------------------

--
-- Table structure for table `template_files`
--

CREATE TABLE IF NOT EXISTS `template_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `path` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `template_files`
--


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `group_id` tinyint(4) unsigned DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT '0',
  `blocked` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(50) DEFAULT NULL,
  `remote_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `group_id`, `is_online`, `blocked`, `created`, `modified`, `last_login`, `last_login_ip`, `remote_address`) VALUES
(1, 'Super Admin', 'admin', '6f9848a1bf9d8e9ba61f15f47f0b5c88043bad80', 'saif@webberoo.com.au', 1, 0, 0, '2011-09-12 17:24:27', '2011-12-20 19:11:49', '2011-12-20 19:11:08', '127.0.0.1', '127.0.0.1')

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `worder` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` tinyint(4) NOT NULL,
  `modified_by` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `content`, `worder`, `created`, `modified`, `created_by`, `modified_by`, `published`, `show_title`) VALUES
(14, 'Connect Us On Social', '<div class="social-icons"><a class="facebook" href="#facebook">Facebook</a> <a class="twitter" href="#facebook">Twitter</a> <a class="gplus" href="#facebook">GPlus</a> <a class="rss" href="#facebook">Rss Feed</a></div>', 0, '2011-04-16 00:12:17', '2011-12-12 12:33:32', 15, 0, 1, 0),
(15, 'Facebook Like Box', '<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fplatform&amp;width=280&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%2335656b&amp;stream=false&amp;header=false&amp;appId=229078523801628" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:280px; height:258px;" allowTransparency="true"></iframe>', 3, '2011-08-11 20:00:33', '2011-12-20 16:36:19', 15, 15, 0, 0),
(17, 'Twitter', '<p></p>\r\n<script src="http://widgets.twimg.com/j/2/widget.js" type="text/javascript"></script>\r\n<script type="text/javascript">// <![CDATA[\r\nnew TWTR.Widget({\r\n  version: 2,\r\n  type: ''profile'',\r\n  rpp: 4,\r\n  interval: 30000,\r\n  width: 280,\r\n  height: 200,\r\n  theme: {\r\n    shell: {\r\n      background: ''#35656b'',\r\n      color: ''#ffffff''\r\n    },\r\n    tweets: {\r\n      background: ''#262929'',\r\n      color: ''#ffffff'',\r\n      links: ''#4aed05''\r\n    }\r\n  },\r\n  features: {\r\n    scrollbar: false,\r\n    loop: false,\r\n    live: false,\r\n    behavior: ''default''\r\n  }\r\n}).render().setUser(''twitter'').start();\r\n// ]]></script>', 1, '2011-11-25 16:56:21', '2011-12-13 08:16:22', 0, 0, 1, 0);