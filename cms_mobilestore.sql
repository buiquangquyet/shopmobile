

-- --------------------------------------------------------

--
-- Table structure for table `ci_captcha`
--

CREATE TABLE IF NOT EXISTS `ci_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `word` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) NOT NULL,
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('47f3548d77068736ba47025017a90bb9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1436106830, 'a:4:{s:9:"user_data";s:0:"";s:2:"ip";s:3:"::1";s:3:"url";s:22:"/mobilestore/index.php";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `itq_banner`
--

CREATE TABLE IF NOT EXISTS `itq_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `itq_banner`
--

INSERT INTO `itq_banner` (`id`, `title`, `image`, `link`, `division`) VALUES
(2, 'MetroPole', '/mobilestore/upload/userfiles/images/2.png', 'http://metropole.com.vn/', 1),
(3, 'Big C', '/mobilestore/upload/userfiles/images/banner_1f0e3dad.jpg', 'http://bigc.com.vn/', 1),
(5, 'ảnh 1', '/mobilestore/upload/userfiles/images/1.png', 'http://localhost/phpmyadmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itq_cart`
--

CREATE TABLE IF NOT EXISTS `itq_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` text COLLATE utf8_unicode_ci NOT NULL,
  `dataproduct` text COLLATE utf8_unicode_ci NOT NULL,
  `totalitem` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `totalmoney` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `itq_cart`
--

INSERT INTO `itq_cart` (`id`, `fullname`, `email`, `telephone`, `address`, `pay`, `order`, `dataproduct`, `totalitem`, `totalmoney`, `time`, `ip`, `status`) VALUES
(1, 'bui quang quyet', 'buiquangquyet@gmail.com', '0964277193', 'sài đồng', '', 'ádasdasdasd', '{"f899139df5e1059396431415e770c6dd":{"rowid":"f899139df5e1059396431415e770c6dd","id":"1","name":"dh-700","qty":"3","price":"2999000","image":"\\/napboncau\\/upload\\/userfiles\\/images\\/images%20(1).jpg","options":{"size":0,"color":0},"subtotal":8997000,"title":"DH-700"},"698d51a19d8a121ce581499d7b701668":{"rowid":"698d51a19d8a121ce581499d7b701668","id":"1","name":"dh-700","qty":"2","price":"2999000","image":"\\/napboncau\\/upload\\/userfiles\\/images\\/images%20(1).jpg","options":{"size":"1","color":"1"},"subtotal":5998000,"title":"DH-700"}}', '5', '14995000', '2015-05-23 08:53:04', '::1', 1),
(2, 'quoắt đại ca', 'buiquangquyet@gmail.com', '0964277193', 'Long Biên - Hà nội', '', 'chẳng có yêu cầu gì', '{"d3d9446802a44259755d38e6d163e820":{"rowid":"d3d9446802a44259755d38e6d163e820","id":"10","name":"htc-desire-510","qty":"1","price":"4500000","image":"\\/mobilestore\\/upload\\/userfiles\\/images\\/images(1).jpg","subtotal":4500000,"title":"HTC DESIRE 510"},"45c48cce2e2d7fbdea1afc51c7c6ad26":{"rowid":"45c48cce2e2d7fbdea1afc51c7c6ad26","id":"9","name":"htc-desire-eye","qty":"1","price":"8990000","image":"\\/mobilestore\\/upload\\/userfiles\\/images\\/htc-desire-eye-1.jpg","subtotal":8990000,"title":"HTC DESIRE EYE"},"c81e728d9d4c2f636f067f89cc14862c":{"rowid":"c81e728d9d4c2f636f067f89cc14862c","id":"2","name":"iphone-5s-16gb","qty":"4","price":"7999000","image":"\\/mobilestore\\/upload\\/userfiles\\/images\\/images%20(15).jpg","subtotal":31996000,"title":"iPhone 5S 16GB"},"c4ca4238a0b923820dcc509a6f75849b":{"rowid":"c4ca4238a0b923820dcc509a6f75849b","id":"1","name":"iphone-4s-8gb","qty":"1","price":"3999000","image":"\\/mobilestore\\/upload\\/userfiles\\/images\\/iphone-4s-8gb--(3).jpg","subtotal":3999000,"title":"iPhone 4S 8GB"}}', '7', '49485000', '2015-06-12 15:17:56', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itq_category`
--

CREATE TABLE IF NOT EXISTS `itq_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `navigation` text COLLATE utf8_unicode_ci NOT NULL,
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `is-home` tinyint(1) NOT NULL DEFAULT '0',
  `is-menu` int(1) NOT NULL DEFAULT '0',
  `is-right` tinyint(4) NOT NULL,
  `is-grid` tinyint(4) NOT NULL,
  `type_category` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `viewed` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid-created` int(11) NOT NULL,
  `userid-updated` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `itq_category`
--

INSERT INTO `itq_category` (`id`, `title`, `alias`, `route`, `parentid`, `description`, `navigation`, `source`, `is-home`, `is-menu`, `is-right`, `is-grid`, `type_category`, `link`, `order`, `level`, `lft`, `rgt`, `image`, `viewed`, `publish`, `lang`, `meta-title`, `meta-keywords`, `meta-description`, `userid-created`, `userid-updated`, `created`, `updated`) VALUES
(1, 'root', 'root', 'root', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 47, '', 0, 0, '', '', '', '', 0, 0, '2015-07-03 04:33:21', '0000-00-00 00:00:00'),
(2, 'trang chủ', 'trang-chu', 'trang-chu', 1, '<p>trang chủ</p>', '', '', 0, 1, 0, 0, 11, '', 1, 1, 1, 2, '', 0, 1, '', 'trang chủ', 'trang chủ', 'trang chủ', 1, 0, '2015-05-21 02:42:59', '0000-00-00 00:00:00'),
(3, 'giới thiệu', 'gioi-thieu', 'gioi-thieu', 1, '<p>giới thiệu</p>', '', '', 0, 1, 0, 0, 22, '', 2, 1, 41, 42, '', 0, 1, '', 'giới thiệu', 'giới thiệu', 'giới thiệu', 1, 1, '2015-07-03 04:32:55', '2015-06-11 06:28:05'),
(6, 'liên hệ', 'lien-he', 'lien-he', 1, '<p>li&ecirc;n hệ</p>', '', '', 0, 1, 0, 0, 33, '', 6, 1, 37, 38, '', 0, 1, '', 'liên hệ', 'liên hệ', 'liên hệ', 1, 1, '2015-07-03 04:32:55', '2015-05-22 08:45:48'),
(7, 'sản phẩm', 'san-pham', 'san-pham', 1, '<p>sản phẩm</p>', '', '', 0, 1, 0, 0, 11, '', 3, 1, 3, 36, '', 0, 1, '', 'sản phẩm', 'sản phẩm', 'sản phẩm', 1, 0, '2015-07-03 04:32:55', '0000-00-00 00:00:00'),
(8, 'Tin Tức', 'tin-tuc', 'tin-tuc', 1, '<p>Tin Tức</p>', '', '', 0, 1, 0, 0, 22, '', 4, 1, 39, 40, '', 0, 1, '', 'Tin Tức', 'Tin Tức', 'Tin Tức', 1, 0, '2015-07-03 04:32:55', '0000-00-00 00:00:00'),
(9, 'Apple', 'apple', 'apple', 10, '<p>Apple</p>', '', '', 1, 0, 0, 0, 11, '', 0, 3, 13, 14, '', 0, 1, '', 'iPhone', 'iPhone', 'iPhone', 1, 1, '2015-07-03 04:14:38', '2015-06-10 00:11:50'),
(10, 'Smart phone', 'smart-phone', 'smart-phone', 7, '<p>Smart phone</p>', '', '', 1, 0, 0, 0, 11, '', 3, 2, 10, 31, '/mobilestore/upload/userfiles/images/00251d36-8cf4-4d09-8eb1-aca35f1bb514.jpg', 0, 1, '', 'Smart phone', 'Smart phone', 'Smart phone', 1, 1, '2015-07-03 04:14:38', '2015-07-03 11:14:08'),
(11, 'SAMSUNG', 'samsung', 'samsung', 10, '', '', '', 1, 0, 0, 0, 11, '', 0, 3, 11, 12, '', 0, 1, '', 'SAMSUNG', 'SAMSUNG', 'SAMSUNG', 1, 0, '2015-07-03 04:14:38', '0000-00-00 00:00:00'),
(12, 'HTC', 'htc', 'htc', 10, '<p>HTC</p>', '', '', 1, 0, 0, 0, 11, '', 0, 3, 15, 16, '', 0, 1, '', 'HTC', 'HTC', 'HTC', 1, 1, '2015-07-03 04:14:38', '2015-06-10 00:12:25'),
(13, 'Nokia', 'nokia', 'nokia', 10, '<p>Nokia</p>', '', '', 1, 0, 0, 0, 11, '', 0, 3, 17, 18, '', 0, 1, '', 'Nokia', 'Nokia', 'Nokia', 1, 1, '2015-07-03 04:14:38', '2015-06-10 00:13:02'),
(14, 'ASUS', 'asus', 'asus', 10, '<p>ASUS</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 19, 20, '', 0, 1, '', 'ASUS', 'ASUS', 'ASUS', 1, 1, '2015-07-03 04:14:38', '2015-06-10 00:13:44'),
(15, 'OPPO', 'oppo', 'oppo', 10, '<p>OPPO</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 21, 22, '', 0, 1, '', 'OPPO', 'OPPO', 'OPPO', 1, 0, '2015-07-03 04:14:38', '0000-00-00 00:00:00'),
(16, 'LG', 'lg', 'lg', 10, '<p>LG</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 23, 24, '', 0, 1, '', 'LG', 'LG', 'LG', 1, 0, '2015-07-03 04:14:38', '0000-00-00 00:00:00'),
(17, 'SONY', 'sony', 'sony', 10, '<p>SONY</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 25, 26, '', 0, 1, '', 'SONY', 'SONY', 'SONY', 1, 0, '2015-07-03 04:14:38', '0000-00-00 00:00:00'),
(18, 'SKY', 'sky', 'sky', 10, '<p>SKY</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 27, 28, '', 0, 1, '', 'SKY', 'SKY', 'SKY', 1, 1, '2015-07-03 04:14:38', '2015-06-10 01:48:21'),
(19, 'BKAV', 'bkav', 'bkav', 10, '<p>BKAV</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 29, 30, '', 0, 1, '', 'BKAV', 'BKAV', 'BKAV', 1, 1, '2015-07-03 04:14:38', '2015-06-10 01:49:15'),
(20, 'Đồng hồ thông minh', 'dong-ho-thong-minh', 'dong-ho-thong-minh', 7, '<p>Đồng hồ th&ocirc;ng minh</p>', '', '', 0, 0, 0, 0, 11, '', 0, 2, 4, 9, '/mobilestore/upload/userfiles/images/smartwatch.jpg', 0, 1, '', 'Đồng hồ thông minh', 'Đồng hồ thông minh', 'Đồng hồ thông minh', 1, 0, '2015-07-03 04:14:08', '0000-00-00 00:00:00'),
(21, 'Đồng Hồ Apple', 'dong-ho-apple', 'dong-ho-apple', 20, '<h1>APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK</h1>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 5, 6, '/mobilestore/upload/userfiles/images/apple-watch-sport-1.jpg', 0, 1, '', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 1, 0, '2015-07-03 04:14:08', '0000-00-00 00:00:00'),
(22, 'Đồng Hồ SamSung', 'dong-ho-samsung', 'dong-ho-samsung', 20, '<h1>APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK</h1>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 7, 8, '/mobilestore/upload/userfiles/images/apple-watch-sport-2.jpg', 0, 1, '', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 1, 0, '2015-07-03 04:14:08', '0000-00-00 00:00:00'),
(23, 'Máy tính bảng', 'may-tinh-bang', 'may-tinh-bang', 7, '<p>M&aacute;y t&iacute;nh bảng</p>', '', '', 0, 0, 0, 0, 11, '', 0, 2, 32, 35, '/mobilestore/upload/userfiles/images/830-3.jpg', 0, 1, '', 'Máy tính bảng', 'Máy tính bảng', 'Máy tính bảng', 1, 1, '2015-07-03 04:32:55', '2015-07-03 11:14:38'),
(24, 'Tablet SamSung', 'tablet-samsung', 'tablet-samsung', 1, '<p>Tablet SamSung</p>', '', '', 0, 0, 0, 0, 11, '', 0, 1, 43, 44, '/mobilestore/upload/userfiles/images/logo_samsung.jpg', 0, 1, '', 'Tablet SamSung', 'Tablet SamSung', 'Tablet SamSung', 1, 0, '2015-07-03 04:33:25', '0000-00-00 00:00:00'),
(25, 'Tablet Nokia', 'tablet-nokia', 'tablet-nokia', 23, '<p>Tablet SamSung</p>', '', '', 0, 0, 0, 0, 11, '', 0, 3, 33, 34, '/mobilestore/upload/userfiles/images/images%20(2)(2).jpg', 0, 1, '', 'Tablet nokia', 'Tablet nokia', 'Tablet nokia', 1, 0, '2015-07-03 04:33:29', '0000-00-00 00:00:00'),
(26, 'Tablet Apple', 'tablet-apple', 'tablet-apple', 1, '<p>Tablet Apple</p>', '', '', 0, 0, 0, 0, 11, '', 0, 1, 45, 46, '/mobilestore/upload/userfiles/images/images(2).jpg', 0, 1, '', 'Tablet Apple', 'Tablet Apple', 'Tablet Apple', 1, 0, '2015-07-03 04:33:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `itq_config`
--

CREATE TABLE IF NOT EXISTS `itq_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `itq_config`
--

INSERT INTO `itq_config` (`id`, `keyword`, `label`, `value`, `type`, `group`, `order`, `publish`, `created`, `updated`) VALUES
(1, 'meta_title', 'Meta Title', 'Mobilestore', 'text', 'seo', 0, 1, '0000-00-00 00:00:00', '2015-06-10 15:02:19'),
(2, 'meta_description', 'Meta Description', 'Mobilestore', 'text', 'seo', 0, 1, '0000-00-00 00:00:00', '2015-06-10 15:02:19'),
(3, 'meta_keywords', 'Meta Keywords', 'Mobilestore', 'text', 'seo', 0, 1, '0000-00-00 00:00:00', '2015-06-10 15:02:19'),
(4, 'telephone', 'Số điện thoại', '01676654901 - 0964277193', 'text', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(6, 'close_website', 'Đóng cửa website', '0', 'radio', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(7, 'close_alert', 'Thông báo đóng cửa', 'Đang bảo trì hệ thống!', 'textarea', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(8, 'ftp_hostname', 'Host name', '123.30.236.65', 'text', 'ftp', 0, 1, '0000-00-00 00:00:00', '2014-06-23 09:07:16'),
(9, 'ftp_username', 'User name', 'doisongsao@doisongsao.net', 'text', 'ftp', 0, 1, '0000-00-00 00:00:00', '2014-06-23 09:07:16'),
(10, 'ftp_password', 'Password', '0YTd5VE9', 'text', 'ftp', 0, 1, '0000-00-00 00:00:00', '2014-06-23 09:07:16'),
(11, 'authorship', 'Tác giả', 'MR: Bùi Quang Quyết', 'text', 'seo', 4, 1, '0000-00-00 00:00:00', '2015-06-10 15:02:19'),
(12, 'google_publisher', 'Xuất bản', 'MR: Bùi Quang Quyết', 'text', 'seo', 5, 1, '0000-00-00 00:00:00', '2015-06-10 15:02:19'),
(13, 'contact_footer', 'Nội dung cuối trang', '', 'editor', 'contact', 1, 0, '0000-00-00 00:00:00', '2014-06-27 09:08:10'),
(28, 'description_footer_alert', 'thông báo dưới footer', 'Mobilestore', 'text', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(14, 'contact_content', 'Thông tin liên hệ', '', 'editor', 'contact', 2, 1, '0000-00-00 00:00:00', '2015-04-16 15:05:20'),
(27, 'address', 'địa chỉ', '557 đường Nguyễn Văn Linh - Long Biên - Hà Nội', 'text', 'frontend', 2, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(15, 'contact_hotline_top', 'Hotline Top', '', 'text', 'contact', 4, 0, '0000-00-00 00:00:00', '2014-05-22 10:45:28'),
(16, 'logo', 'Logo', '/upload/administrator/image/he-thong/logo-doisongsao.png', 'image', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-02-21 21:03:01'),
(17, 'icon', 'Icon', '/upload/administrator/image/he-thong/icon-doisongsao.png', 'image', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-02-21 21:03:01'),
(18, 'name', 'Tên website', 'nắp bồn cầu', 'text', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(19, 'image_default', 'Hình ảnh mặc định', '', 'image', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-02-21 21:03:01'),
(20, 'contact_hotline_bottom', 'Hotline Footer', '', 'text', 'contact', 5, 0, '0000-00-00 00:00:00', '2014-05-22 10:45:28'),
(21, 'banner_header', 'banner-header', '', 'image', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-02-21 21:03:01'),
(22, 'link_twitter', 'twitter', 'http://www.twitter.com', 'text', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(23, 'link_facebook', 'facebook', 'http://www.facebook.com', 'text', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(24, 'link_in', 'in', 'http://www.google.com', 'text', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(25, 'link_youtube', 'Iframe-youtube', '<iframe width="100%" height="260" src="https://www.youtube.com/embed/oQk94T5j_i8" frameborder="0" allowfullscreen></iframe>', 'text', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(26, 'link_gmap', 'Iframe Gmap', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7448.027251272536!2d105.91153750000002!3d21.0321408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1424107205014" width="400" height="200" frameborder="0" style="border:0"></iframe>', 'text', 'frontend', 1, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35'),
(29, 'perpage', 'số lượng sản phẩm', '8', 'text', 'frontend', 0, 1, '0000-00-00 00:00:00', '2015-06-11 09:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `itq_contact`
--

CREATE TABLE IF NOT EXISTS `itq_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `itq_group`
--

CREATE TABLE IF NOT EXISTS `itq_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow` tinyint(4) NOT NULL,
  `group` text COLLATE utf8_unicode_ci NOT NULL,
  `order` tinyint(4) NOT NULL,
  `usercreate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userupdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `itq_group`
--

INSERT INTO `itq_group` (`id`, `title`, `allow`, `group`, `order`, `usercreate`, `userupdate`, `created`, `update`) VALUES
(1, 'Administrator', 0, '', 0, 'buiquangquyet', '', '2015-02-22 15:41:59', '0000-00-00 00:00:00'),
(2, 'CNTT', 1, 'backend/auth/login.backend/account.backend/account/info.backend/account/password.backend/config.backend/config/index.backend/article.backend/article/category.backend/article/item.backend/article/additem.backend/article/edititem.backend/article/edititem/self.backend/user.backend/user/group.backend/user/addgroup.backend/user/editgroup.backend/user/delgroup.backend/user/index.backend/user/add.backend/user/edit.backend/user/del', 0, 'buiquangquyet', '', '2015-02-15 19:33:28', '0000-00-00 00:00:00'),
(23, 'người đưa tin', 1, 'backend/auth/login.backend/home.backend/home/index.backend/account.backend/account/changeInfoUser.backend/account/changePassUser.backend/note.backend/note/listnote.backend/note/item.backend/note/addnote.backend/note/editnote.backend/note/editnew.backend/note/editpublish.backend/product/addproduct.backend/product/listproduct.backend/product/editproduct.backend/product/deleteproduct.backend/product/deleteimages.backend/product/editpublish.backend/product/editnew.backend/product/editbestbuy.backend/type/addtype.backend/type/listtype.backend/type/edittype.backend/type/deletetype.backend/category/listcategory', 0, 'buiquangquyet', '', '2015-02-15 21:00:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `itq_images_product`
--

CREATE TABLE IF NOT EXISTS `itq_images_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product-id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=148 ;

--
-- Dumping data for table `itq_images_product`
--

INSERT INTO `itq_images_product` (`id`, `product-id`, `url`) VALUES
(31, 4, '/mobilestore/upload/userfiles/images/iphone-5s-16gb-1-400x533.png'),
(32, 4, '/mobilestore/upload/userfiles/images/asus3.jpg'),
(33, 4, '/mobilestore/upload/userfiles/images/15a5002c-88e5-42ef-b382-fd60c4a17f18.jpg'),
(48, 5, '/mobilestore/upload/userfiles/images/samsung-galaxy-note-edge.png'),
(49, 5, '/mobilestore/upload/userfiles/images/images%20(5).jpg'),
(50, 6, '/mobilestore/upload/userfiles/images/htc-one-m9-1.jpg'),
(51, 6, '/mobilestore/upload/userfiles/images/htc-desire-816-1-400x533.png'),
(52, 6, '/mobilestore/upload/userfiles/images/htc-one-m9-3.jpg'),
(53, 7, '/mobilestore/upload/userfiles/images/samsung-galaxy-a3-400x400-400x400.png'),
(54, 7, '/mobilestore/upload/userfiles/images/sam-sung-galaxy-s6-1.jpg'),
(55, 8, '/mobilestore/upload/userfiles/images/oppo-find-7a-1-400x533.png'),
(56, 8, '/mobilestore/upload/userfiles/images/nokia-lumia-730-2.jpg'),
(57, 9, '/mobilestore/upload/userfiles/images/9be53f74-0fc2-4f73-a7a5-b326325c3d5d.jpg'),
(58, 9, '/mobilestore/upload/userfiles/images/asus7.jpg'),
(59, 9, '/mobilestore/upload/userfiles/images/asus4.jpg'),
(60, 9, '/mobilestore/upload/userfiles/images/htc-desire-eye-2.jpg'),
(61, 10, '/mobilestore/upload/userfiles/images/d.jpg'),
(62, 10, '/mobilestore/upload/userfiles/images/3dcbb17f-b1f6-4194-90b8-4367d7d7520b.jpg'),
(63, 11, '/mobilestore/upload/userfiles/images/asus3.jpg'),
(64, 11, '/mobilestore/upload/userfiles/images/asus10.jpg'),
(65, 12, '/mobilestore/upload/userfiles/images/asus2.jpg'),
(66, 12, '/mobilestore/upload/userfiles/images/3dcbb17f-b1f6-4194-90b8-4367d7d7520b.jpg'),
(67, 13, '/mobilestore/upload/userfiles/images/925.jpg'),
(68, 14, '/mobilestore/upload/userfiles/images/00251d36-8cf4-4d09-8eb1-aca35f1bb514.jpg'),
(69, 14, '/mobilestore/upload/userfiles/images/0a8cf7aa-758c-4260-b60e-9e0b4a9a5f86.jpg'),
(70, 15, '/mobilestore/upload/userfiles/images/630-2.jpg'),
(71, 16, '/mobilestore/upload/userfiles/images/830.jpg'),
(72, 16, '/mobilestore/upload/userfiles/images/830-1.jpg'),
(73, 16, '/mobilestore/upload/userfiles/images/830-3.jpg'),
(91, 17, '/mobilestore/upload/userfiles/images/525.jpg'),
(92, 17, '/mobilestore/upload/userfiles/images/525_1.jpg'),
(93, 17, '/mobilestore/upload/userfiles/images/525_3.jpg'),
(94, 17, '/mobilestore/upload/userfiles/images/1320.jpg'),
(107, 23, '/mobilestore/upload/userfiles/images/note4-1.jpg'),
(108, 23, '/mobilestore/upload/userfiles/images/Note-4.jpg'),
(109, 23, '/mobilestore/upload/userfiles/images/samsung-galaxy-note-edge.png'),
(110, 24, '/mobilestore/upload/userfiles/images/sam-sung-galaxy-s6-1.jpg'),
(111, 24, '/mobilestore/upload/userfiles/images/s6-2.jpg'),
(112, 24, '/mobilestore/upload/userfiles/images/s6.kpg.jpg'),
(113, 19, '/mobilestore/upload/userfiles/images/asus1.jpg'),
(114, 19, '/mobilestore/upload/userfiles/images/asus10.jpg'),
(117, 18, '/mobilestore/upload/userfiles/images/1320_2.jpg'),
(118, 18, '/mobilestore/upload/userfiles/images/1320_3.jpg'),
(119, 22, '/mobilestore/upload/userfiles/images/ss3.jpg'),
(120, 22, '/mobilestore/upload/userfiles/images/ss2.jpg'),
(121, 22, '/mobilestore/upload/userfiles/images/GalaxyE7.jpg'),
(122, 21, '/mobilestore/upload/userfiles/images/asus7.jpg'),
(123, 21, '/mobilestore/upload/userfiles/images/asus6.jpg'),
(124, 21, '/mobilestore/upload/userfiles/images/asus4.jpg'),
(125, 20, '/mobilestore/upload/userfiles/images/asus2.jpg'),
(126, 20, '/mobilestore/upload/userfiles/images/asus3.jpg'),
(127, 3, '/mobilestore/upload/userfiles/images/15a5002c-88e5-42ef-b382-fd60c4a17f18.jpg'),
(128, 3, '/mobilestore/upload/userfiles/images/asus1.jpg'),
(129, 2, '/mobilestore/upload/userfiles/images/15a5002c-88e5-42ef-b382-fd60c4a17f18.jpg'),
(130, 2, '/mobilestore/upload/userfiles/images/htc-desire-816-trang-10-(3).jpg'),
(131, 1, '/mobilestore/upload/userfiles/images/15a5002c-88e5-42ef-b382-fd60c4a17f18.jpg'),
(132, 1, '/mobilestore/upload/userfiles/images/0baa9f64-6568-4c3c-8a79-7afbeb973727.jpg'),
(133, 1, '/mobilestore/upload/userfiles/images/asus4.jpg'),
(134, 25, '/mobilestore/upload/userfiles/images/apple-watch-sport-7.jpg'),
(135, 25, '/mobilestore/upload/userfiles/images/apple-watch-sport-1.jpg'),
(136, 25, '/mobilestore/upload/userfiles/images/apple-watch-sport-2.jpg'),
(137, 26, '/mobilestore/upload/userfiles/images/0a8cf7aa-758c-4260-b60e-9e0b4a9a5f86.jpg'),
(138, 26, '/mobilestore/upload/userfiles/images/3dcbb17f-b1f6-4194-90b8-4367d7d7520b.jpg'),
(139, 27, '/mobilestore/upload/userfiles/images/apple-watch-sport-2.jpg'),
(140, 27, '/mobilestore/upload/userfiles/images/1394465272_smartosc-vertical.jpg'),
(141, 28, '/mobilestore/upload/userfiles/images/0baa9f64-6568-4c3c-8a79-7afbeb973727.jpg'),
(142, 29, '/mobilestore/upload/userfiles/images/apple-watch-sport-1.jpg'),
(143, 29, '/mobilestore/upload/userfiles/images/apple-watch-sport-2.jpg'),
(145, 31, '/mobilestore/upload/userfiles/images/apple-watch-sport-2.jpg'),
(146, 31, '/mobilestore/upload/userfiles/images/3dcbb17f-b1f6-4194-90b8-4367d7d7520b.jpg'),
(147, 30, '/mobilestore/upload/userfiles/images/GALAXY-GEAR3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `itq_note`
--

CREATE TABLE IF NOT EXISTS `itq_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_banner` tinyint(1) NOT NULL DEFAULT '0',
  `is_right` tinyint(1) NOT NULL DEFAULT '0',
  `category-id` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `meta-title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `userid-creat` int(11) NOT NULL,
  `creattime` datetime NOT NULL,
  `userid-update` int(11) NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `itq_note`
--

INSERT INTO `itq_note` (`id`, `alias`, `route`, `title`, `description`, `content`, `image`, `is_banner`, `is_right`, `category-id`, `new`, `order`, `meta-title`, `meta-keywords`, `meta-description`, `view`, `publish`, `userid-creat`, `creattime`, `userid-update`, `updatetime`) VALUES
(1, 'gioi-thieu', 'gioi-thieu', 'Giới thiệu', 'Giới thiệu cửa hàng', '<p><span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">C&ocirc;ng ty TNHH Dịch vụ v&agrave; Thương mại VLXD&nbsp;</span><strong>Ho&agrave;ng Mai</strong><span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">, tiền th&acirc;n l&agrave; Cửa h&agrave;ng VLXD Thanh Huyền, được th&agrave;nh lập năm 2010. Ch&uacute;ng t&ocirc;i tự h&agrave;o c&oacute; tr&ecirc;n 4 năm kinh nghiệm kinh doanh, sản xuất Vật liệu x&acirc;y dựng, cung cấp Thiết bị vệ sinh, phục vụ c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm của c&aacute;c dự &aacute;n lớn, m&agrave; điểm mạnh của ch&uacute;ng t&ocirc;i l&agrave; C&ocirc;ng tr&igrave;nh nh&agrave; ở d&acirc;n dụng, chung cư.</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">Với xu thế ph&aacute;t triển của đất nước c&ugrave;ng với sự ph&aacute;t triển của kinh tế thị trường, việc Thương mại h&oacute;a c&aacute;c sản phẩm tr&ecirc;n Internet đ&atilde; trở th&agrave;nh xu hướng v&agrave; nhu cầu to&agrave;n x&atilde; hội. C&ocirc;ng ty TNHH Ho&agrave;ng Mai đưa c&aacute;c sản phẩm l&ecirc;n website b&aacute;n h&agrave;ng trực tuyến</span><strong>thietbivesinhvn.com.vn</strong><span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">&nbsp;với mong muốn phục vụ tốt hơn cho nhu cầu của Qu&yacute; kh&aacute;ch h&agrave;ng, mở rộng thị trường v&agrave; x&acirc;y dựng Thương hiệu Ho&agrave;ng Mai vững mạnh. Ch&uacute;ng t&ocirc;i kinh doanh Online với uy t&iacute;n v&agrave; sự đảm bảo như kinh doanh trực tiếp, Quyền lợi v&agrave; Y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng l&agrave; ti&ecirc;u ch&iacute; h&agrave;ng đầu ch&uacute;ng t&ocirc;i lu&ocirc;n lu&ocirc;n hướng tới.</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">Ch&uacute;ng t&ocirc;i lu&ocirc;n hướng đến việc cung cấp Dịch vụ mua h&agrave;ng trực tuyến tốt nhất, với mức ph&iacute; cạnh tranh nhất cho tất cả c&aacute;c sản phẩm Qu&yacute; kh&aacute;ch quan t&acirc;m.</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">Được đ&aacute;nh gi&aacute; l&agrave; một trong những website b&aacute;n h&agrave;ng Online uy t&iacute;n nhất Việt Nam hiện nay,&nbsp;</span><strong>thietbivesinhvn.com.vn</strong><span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">&nbsp;cam kết mọi sản phẩn đều ch&iacute;nh h&atilde;ng. Chi tiết về Xuất xứ sản phẩm, Nơi sản xuất,.. được ghi r&otilde; tr&ecirc;n từng sản phẩm. Ki&ecirc;n quyết kh&ocirc;ng bao giờ b&aacute;n h&agrave;ng nh&aacute;i, h&agrave;ng k&eacute;m chất lượng.</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">Thời gian giao h&agrave;ng lu&ocirc;n đảm bảo như đ&atilde; hẹn, c&oacute; thể đổi trả h&agrave;ng kh&ocirc;ng đạt chất lượng bất kỳ khi n&agrave;o - nếu Sản phẩm ch&iacute;nh h&atilde;ng được x&aacute;c định l&agrave; lỗi.</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">Hiện nay, C&ocirc;ng ty TNHH Ho&agrave;ng Mai đang c&oacute; c&aacute;c sản phẩm:</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">1. Thiết bị vệ sinh</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">2. Thiết bị nh&agrave; bếp</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">3. Thiết bị điện d&acirc;n dụng</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">C&ocirc;ng ty TNHH Ho&agrave;ng Mai lu&ocirc;n mong muốn hợp t&aacute;c với tất cả c&aacute;c nh&agrave; cung cấp li&ecirc;n quan để c&ugrave;ng ph&aacute;t triển.</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial; font-size:12px">Ch&uacute;ng t&ocirc;i cam kết mang tới những sản phẩm đ&uacute;ng chất lượng, gi&aacute; cả cạnh tranh, đ&uacute;ng hẹn. T&ocirc;n chỉ phương tr&acirc;m &ldquo;Kh&aacute;ch h&agrave;ng l&agrave; thượng đế&rdquo;.</span><br />\r\n<br />\r\n<strong>Tr&acirc;n trọng cảm ơn Qu&yacute; kh&aacute;ch đ&atilde; quan t&acirc;m.</strong></p>', '/mobilestore/upload/userfiles/images/images%20(8).jpg', 0, 0, 3, 0, 0, 'Thiết bị vệ sinh', 'Thiết bị vệ sinh', 'Thiết bị vệ sinh', 0, 1, 1, '2015-05-21 15:54:45', 1, '2015-06-11 07:20:36'),
(2, 'dai-ly', 'dai-ly', 'Đại lý', 'Tạo dựng mối quan hệ hợp tác dài hạn trên cơ sở những thỏa thuận cùng hợp tác và chia sẻ', '<p><strong>CH&Iacute;NH S&Aacute;CH CHUNG VỀ PH&Aacute;T TRIỂN ĐẠI L&Yacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Tạo dựng mối quan hệ hợp t&aacute;c d&agrave;i hạn tr&ecirc;n cơ sở những thỏa thuận c&ugrave;ng hợp t&aacute;c v&agrave; chia sẻ.</li>\r\n	<li>Hợp t&aacute;c tr&ecirc;n cở sở v&igrave; lợi &iacute;ch của cả 2 b&ecirc;n.</li>\r\n	<li>Thường xuy&ecirc;n trao đổi th&ocirc;ng tin v&agrave; hổ trợ lẫn nhau kịp thời.</li>\r\n	<li>Ch&iacute;nh s&aacute;ch hỗ trợ c&ocirc;ng bằng v&agrave; hợp l&yacute; đối với c&aacute;c đại l&yacute;.</li>\r\n	<li>Cam kết hổ trợ Qu&iacute; đại l&yacute; theo t&igrave;nh h&igrave;nh thị trường khi c&oacute; biến động.</li>\r\n</ul>\r\n\r\n<p><strong>CH&Iacute;NH S&Aacute;CH VỀ T&Agrave;I CH&Iacute;NH:</strong><br />\r\n<strong><u>Chiết khấu mua h&agrave;ng định kỳ:</u></strong></p>\r\n\r\n<ul>\r\n	<li>Dựa theo doanh số cam kết h&agrave;ng qu&yacute;, Qu&yacute; đại l&yacute; sẽ được tham gia chương tr&igrave;nh chiết khấu tr&ecirc;n doanh số mua h&agrave;ng d&agrave;nh ri&ecirc;ng cho đại l&yacute; của Lubico.</li>\r\n	<li>Khi đạt đủ doanh số mua h&agrave;ng cam kết, Qu&yacute; đại l&yacute; sẽ được hưởng khoản chiết khấu theo tỷ lệ đ&atilde; thỏa thuận của hợp đồng.</li>\r\n	<li>Ch&iacute;nh s&aacute;ch chiết khấu n&agrave;y độc lập v&agrave; được tiến h&agrave;nh song song với c&aacute;c chương tr&igrave;nh hỗ trợ hoặc th&uacute;c đẩy kinh doanh kh&aacute;c từ Lubico cho Qu&iacute; đại l&yacute;.</li>\r\n</ul>\r\n\r\n<p><strong><u>Ch&iacute;nh s&aacute;ch gi&aacute;, bảo vệ gi&aacute;:</u></strong><br />\r\n<strong>&raquo; Gi&aacute; mua h&agrave;ng:</strong></p>\r\n\r\n<ul>\r\n	<li>Căn cứ v&agrave;o kết quả mua h&agrave;ng v&agrave; c&aacute;c thỏa thuận kh&aacute;c Qu&iacute; đại l&yacute; sẽ được hưởng ch&iacute;nh s&aacute;ch gi&aacute; theo đ&uacute;ng th&ocirc;ng b&aacute;o của Lubico.</li>\r\n	<li>Ch&iacute;nh s&aacute;ch gi&aacute; được x&acirc;y dựng để đảm bảo sự ti&ecirc;u thụ v&agrave; lợi nhuận cho Qu&iacute; đại l&yacute; tr&ecirc;n thị trường</li>\r\n</ul>\r\n\r\n<p><strong>&raquo; Bảo vệ gi&aacute;:</strong></p>\r\n\r\n<ul>\r\n	<li>Trong trường hợp Lubico giảm gi&aacute; b&aacute;n, Qu&yacute; đại l&yacute; được bảo vệ gi&aacute; đối với những mặt h&agrave;ng c&ugrave;ng loại đang c&ograve;n tồn trong kho.</li>\r\n	<li>Việc bảo vệ gi&aacute; chỉ &aacute;p dụng cho c&aacute;c mặt h&agrave;ng c&oacute; h&oacute;a đơn nhập h&agrave;ng trong v&ograve;ng 30 ng&agrave;y kể từ ng&agrave;y th&ocirc;ng b&aacute;o giảm gi&aacute;.</li>\r\n</ul>\r\n\r\n<p><strong><u>Hợp đồng nguy&ecirc;n tắc v&agrave; c&ocirc;ng nợ:</u></strong><br />\r\n<strong>&raquo; Hợp đồng nguy&ecirc;n tắc:&nbsp;</strong><span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:13px">Sau khi hai b&ecirc;n k&yacute; HĐNT, Qu&yacute; đại l&yacute; sẽ được đưa v&agrave;o danh s&aacute;ch ưu đ&atilde;i của Lubico, được hưởng c&aacute;c ch&iacute;nh s&aacute;ch d&agrave;nh cho đại l&yacute; của Lubico.</span><br />\r\n<strong>&raquo; C&ocirc;ng nợ mua h&agrave;ng:</strong></p>\r\n\r\n<ul>\r\n	<li>C&ocirc;ng nợ được thỏa thuận cụ thể trong hợp đồng đ&atilde; k&yacute; kết v&agrave; c&aacute;c phụ lục k&egrave;m theo hoặc c&aacute;c thỏa thuận kh&aacute;c (nếu c&oacute;)</li>\r\n	<li>Tr&ecirc;n cở sở kết quả hợp t&aacute;c v&agrave; lịch sử thanh to&aacute;n, Qu&yacute; đại l&yacute; sẽ được hưởng c&aacute;c mức ưu đ&atilde;i tốt hơn về ch&iacute;nh s&aacute;ch t&iacute;n dụng, c&ocirc;ng nợ.</li>\r\n</ul>\r\n\r\n<p><strong>CH&Iacute;NH S&Aacute;CH HỖ TRỢ:</strong><br />\r\n<strong>&raquo; Hỗ trợ về PR &ndash; Marketing:</strong></p>\r\n\r\n<ul>\r\n	<li>Qu&yacute; đại l&yacute; được hỗ trợ catalogue, tờ rơi, banner, &hellip; theo c&aacute;c chương tr&igrave;nh của Lubico. Th&ocirc;ng tin về Qu&yacute; đại l&yacute; sẽ được quảng c&aacute;o tr&ecirc;n c&aacute;c phương tiện th&ocirc;ng tin đại ch&uacute;ng v&agrave; trang web: www.lubico.vn</li>\r\n	<li>Qu&yacute; đại l&yacute; được tham gia tất cả c&aacute;c chương tr&igrave;nh khuyến m&atilde;i v&agrave; th&uacute;c đẩy b&aacute;n h&agrave;ng của Lubico.</li>\r\n	<li>Qu&yacute; đại l&yacute; được cập nhật th&ocirc;ng tin về gi&aacute; cả, h&agrave;ng ho&aacute;, sản phẩm, ch&iacute;nh s&aacute;ch của Lubico, c&aacute;c chương tr&igrave;nh marketing , c&aacute;c t&agrave;i liệu th&uacute;c đẩy b&aacute;n h&agrave;ng.</li>\r\n</ul>\r\n\r\n<p><strong>&raquo; Hỗ trợ về h&agrave;ng h&oacute;a:</strong></p>\r\n\r\n<ul>\r\n	<li>Đổi h&agrave;ng, trả h&agrave;ng: Trong v&ograve;ng 15 ng&agrave;y kể từ ng&agrave;y xuất h&oacute;a đơn, Qu&yacute; đại l&yacute; sẽ được đổi h&agrave;ng mới nếu sản phẩm được x&aacute;c định thuộc lỗi trong sản xuất. Trong trường hợp h&agrave;ng h&oacute;a, gi&aacute; cả kh&ocirc;ng đ&uacute;ng với thỏa thuận mua h&agrave;ng, Qu&yacute; đại l&yacute; c&oacute; quyền trả lại h&agrave;ng cho Lubico. Việc trả h&agrave;ng được thực hiện trong v&ograve;ng 15 ng&agrave;y kể từ ng&agrave;y xuất h&oacute;a đơn v&agrave; k&yacute; bi&ecirc;n bản b&agrave;n giao h&agrave;ng h&oacute;a.</li>\r\n	<li>H&agrave;ng bầy mẫu, thử nghiệm: Lubico sẽ hỗ trợ Qu&yacute; đại l&yacute; mượn h&agrave;ng bầy mẫu, thử nghiệm đối với c&aacute;c sản phẩm mới tung ra thị trường hoặc khi Qu&yacute; đại l&yacute; khai trương/mở địa điểm kinh doanh mới. Xin vui l&ograve;ng li&ecirc;n hệ trực tiếp với Lubico khi c&oacute; nhu cầu.</li>\r\n</ul>\r\n\r\n<p><strong>Y&Ecirc;U CẦU ĐỐI VỚI QU&Yacute; ĐẠI L&Yacute;:</strong></p>\r\n\r\n<ul>\r\n	<li>Trưng b&agrave;y sản phẩm Lubico tr&ecirc;n c&aacute;c kệ h&agrave;ng h&oacute;a.</li>\r\n	<li>Hỗ trợ Lubico khi c&oacute; c&aacute;c chương tr&igrave;nh khuyến m&atilde;i, quảng c&aacute;o diễn ra tại điểm kinh doanh của Qu&yacute; đại l&yacute;.</li>\r\n</ul>', '/mobilestore/upload/userfiles/images/1320_3.jpg', 0, 0, 8, 0, 0, 'Đại lý', 'Đại lý', 'Đại lý', 0, 1, 1, '2015-05-21 16:32:59', 1, '2015-06-11 07:20:59'),
(3, 'mua-tra-gop-la-gi', 'mua-tra-gop-la-gi', 'MUA TRẢ GÓP LÀ GÌ', 'Mua thông thường: bạn trả một lần cho toàn bộ giá trị sản phẩm \r\nMua trả góp: bạn chỉ cần trả ngay một phần để có sản phẩm sử dụng ngay, phần còn lại sẽ được hỗ trợ vay từ công ty tài chính và trả dần theo từng tháng. \r\nVí dụ: Bạn mua trả góp điện thoại Nokia Lumia 930 giá 10.990.000đ, bạn trả trước 2.000.000, công ty tài chính sẽ cho bạn vay 8.990.000 còn lại. Số tiền này là số tiền vay trả góp. Lãi suất, số tiền cần góp hàng tháng của bạn sẽ được tính dựa trên con số này.', '<p><strong>Mua th&ocirc;ng thường:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn trả một lần cho to&agrave;n bộ gi&aacute; trị sản phẩm&nbsp;</span><br />\r\n<strong>Mua trả g&oacute;p:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn chỉ cần trả ngay một phần để c&oacute; sản phẩm sử dụng ngay, phần c&ograve;n lại sẽ được hỗ trợ vay từ c&ocirc;ng ty t&agrave;i ch&iacute;nh v&agrave; trả dần theo từng th&aacute;ng.&nbsp;</span><br />\r\n<strong>V&iacute; dụ:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;Bạn mua trả g&oacute;p điện thoại&nbsp;</span><a href="https://www.thegioididong.com/dtdd/nokia-lumia-930-lumia-icon" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(74, 144, 226); font-family: Helvetica, Arial, ''DejaVu Sans'', ''Liberation Sans'', Freesans, sans-serif; font-size: 14px; line-height: 25px; text-align: justify;" target="_blank" title="nokia lumia 930"><strong>Nokia Lumia 930</strong></a><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;gi&aacute;&nbsp;</span><strong>10.990.000đ</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, bạn trả trước&nbsp;</span><strong>2.000.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, c&ocirc;ng ty t&agrave;i ch&iacute;nh sẽ cho bạn vay&nbsp;</span><strong>8.990.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;c&ograve;n lại. Số tiền n&agrave;y l&agrave; số tiền vay trả g&oacute;p. L&atilde;i suất, số tiền cần g&oacute;p h&agrave;ng th&aacute;ng của bạn sẽ được t&iacute;nh dựa tr&ecirc;n con số n&agrave;y.&nbsp;</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px"><img alt="" src="/mobilestore/upload/userfiles/images/0a8cf7aa-758c-4260-b60e-9e0b4a9a5f86.jpg" style="height:400px; width:600px" /></span></p>\r\n\r\n<p><strong>Mua th&ocirc;ng thường:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn trả một lần cho to&agrave;n bộ gi&aacute; trị sản phẩm&nbsp;</span><br />\r\n<strong>Mua trả g&oacute;p:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn chỉ cần trả ngay một phần để c&oacute; sản phẩm sử dụng ngay, phần c&ograve;n lại sẽ được hỗ trợ vay từ c&ocirc;ng ty t&agrave;i ch&iacute;nh v&agrave; trả dần theo từng th&aacute;ng.&nbsp;</span><br />\r\n<strong>V&iacute; dụ:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;Bạn mua trả g&oacute;p điện thoại&nbsp;</span><a href="https://www.thegioididong.com/dtdd/nokia-lumia-930-lumia-icon" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(74, 144, 226); font-family: Helvetica, Arial, ''DejaVu Sans'', ''Liberation Sans'', Freesans, sans-serif; font-size: 14px; line-height: 25px; text-align: justify;" target="_blank" title="nokia lumia 930"><strong>Nokia Lumia 930</strong></a><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;gi&aacute;&nbsp;</span><strong>10.990.000đ</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, bạn trả trước&nbsp;</span><strong>2.000.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, c&ocirc;ng ty t&agrave;i ch&iacute;nh sẽ cho bạn vay&nbsp;</span><strong>8.990.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;c&ograve;n lại. Số tiền n&agrave;y l&agrave; số tiền vay trả g&oacute;p. L&atilde;i suất, số tiền cần g&oacute;p h&agrave;ng th&aacute;ng của bạn sẽ được t&iacute;nh dựa tr&ecirc;n con số n&agrave;y.&nbsp;</span></p>\r\n\r\n<p><strong>Mua th&ocirc;ng thường:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn trả một lần cho to&agrave;n bộ gi&aacute; trị sản phẩm&nbsp;</span><br />\r\n<strong>Mua trả g&oacute;p:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn chỉ cần trả ngay một phần để c&oacute; sản phẩm sử dụng ngay, phần c&ograve;n lại sẽ được hỗ trợ vay từ c&ocirc;ng ty t&agrave;i ch&iacute;nh v&agrave; trả dần theo từng th&aacute;ng.&nbsp;</span><br />\r\n<strong>V&iacute; dụ:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;Bạn mua trả g&oacute;p điện thoại&nbsp;</span><a href="https://www.thegioididong.com/dtdd/nokia-lumia-930-lumia-icon" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(74, 144, 226); font-family: Helvetica, Arial, ''DejaVu Sans'', ''Liberation Sans'', Freesans, sans-serif; font-size: 14px; line-height: 25px; text-align: justify;" target="_blank" title="nokia lumia 930"><strong>Nokia Lumia 930</strong></a><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;gi&aacute;&nbsp;</span><strong>10.990.000đ</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, bạn trả trước&nbsp;</span><strong>2.000.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, c&ocirc;ng ty t&agrave;i ch&iacute;nh sẽ cho bạn vay&nbsp;</span><strong>8.990.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;c&ograve;n lại. Số tiền n&agrave;y l&agrave; số tiền vay trả g&oacute;p. L&atilde;i suất, số tiền cần g&oacute;p h&agrave;ng th&aacute;ng của bạn sẽ được t&iacute;nh dựa tr&ecirc;n con số n&agrave;y.&nbsp;</span></p>\r\n\r\n<p><strong>Mua th&ocirc;ng thường:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn trả một lần cho to&agrave;n bộ gi&aacute; trị sản phẩm&nbsp;</span><br />\r\n<strong>Mua trả g&oacute;p:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;bạn chỉ cần trả ngay một phần để c&oacute; sản phẩm sử dụng ngay, phần c&ograve;n lại sẽ được hỗ trợ vay từ c&ocirc;ng ty t&agrave;i ch&iacute;nh v&agrave; trả dần theo từng th&aacute;ng.&nbsp;</span><br />\r\n<strong>V&iacute; dụ:</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;Bạn mua trả g&oacute;p điện thoại&nbsp;</span><a href="https://www.thegioididong.com/dtdd/nokia-lumia-930-lumia-icon" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(74, 144, 226); font-family: Helvetica, Arial, ''DejaVu Sans'', ''Liberation Sans'', Freesans, sans-serif; font-size: 14px; line-height: 25px; text-align: justify;" target="_blank" title="nokia lumia 930"><strong>Nokia Lumia 930</strong></a><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;gi&aacute;&nbsp;</span><strong>10.990.000đ</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, bạn trả trước&nbsp;</span><strong>2.000.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">, c&ocirc;ng ty t&agrave;i ch&iacute;nh sẽ cho bạn vay&nbsp;</span><strong>8.990.000</strong><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">&nbsp;c&ograve;n lại. Số tiền n&agrave;y l&agrave; số tiền vay trả g&oacute;p. L&atilde;i suất, số tiền cần g&oacute;p h&agrave;ng th&aacute;ng của bạn sẽ được t&iacute;nh dựa tr&ecirc;n con số n&agrave;y.&nbsp;</span></p>', '/mobilestore/upload/userfiles/images/0a8cf7aa-758c-4260-b60e-9e0b4a9a5f86.jpg', 0, 0, 8, 0, 0, 'MUA TRẢ GÓP LÀ GÌ', 'MUA TRẢ GÓP LÀ GÌ', 'MUA TRẢ GÓP LÀ GÌ', 0, 1, 1, '2015-06-11 06:21:22', 1, '2015-06-11 07:21:05'),
(4, 'bo-doi-de-android-camera-chup-anh-len-toi-120mp-pin-kep-6020mah-trinh-lang', 'bo-doi-de-android-camera-chup-anh-len-toi-120mp-pin-kep-6020mah-trinh-lang', 'Bộ đôi ''dế'' Android camera chụp ảnh lên tới 120MP, pin kép 6020mAh trình làng', 'Gionee đã tổ chức một sự kiện ra mắt sản phẩm toàn cầu tại Bắc Kinh vào ngày hôm nay (10/6). Tại sự kiện này, Gionee Elife E8 đi kèm với thông số kỹ thuật hàng đầu và Gionee Marathon M5 với pin ấn tượng đã chính thức được công bố.Gionee đã tổ chức một sự kiện ra mắt sản phẩm toàn cầu tại Bắc Kinh vào ngày hôm nay (10/6). Tại sự kiện này, Gionee Elife E8 đi kèm với thông số kỹ thuật hàng đầu và Gionee Marathon M5 với pin ấn tượng đã chính thức được công bố.', '<h2 style="text-align:justify"><span style="font-size:16px"><strong>Gionee đ&atilde; tổ chức một&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loat-thong-tin-dang-tin-cay-nhat-ve-bo-doi-smartph-650927" rel="nofollow" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; color: rgb(74, 144, 226); outline: none;" target="_blank" title="Loạt thông tin đáng tin cậy nhất về bộ đôi smartphone Gionee camera ''khủng'', pin ''trâu''">sự kiện ra mắt sản phẩm to&agrave;n cầu</a>&nbsp;tại Bắc Kinh v&agrave;o ng&agrave;y h&ocirc;m nay (10/6). Tại sự kiện n&agrave;y, Gionee Elife E8 đi k&egrave;m với th&ocirc;ng số kỹ thuật h&agrave;ng đầu v&agrave; Gionee Marathon M5 với pin ấn tượng đ&atilde; ch&iacute;nh thức được c&ocirc;ng bố.Gionee đ&atilde; tổ chức một&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loat-thong-tin-dang-tin-cay-nhat-ve-bo-doi-smartph-650927" rel="nofollow" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; color: rgb(74, 144, 226); outline: none;" target="_blank" title="Loạt thông tin đáng tin cậy nhất về bộ đôi smartphone Gionee camera ''khủng'', pin ''trâu''">sự kiện ra mắt sản phẩm to&agrave;n cầu</a>&nbsp;tại Bắc Kinh v&agrave;o ng&agrave;y h&ocirc;m nay (10/6). Tại sự kiện n&agrave;y, Gionee Elife E8 đi k&egrave;m với th&ocirc;ng số kỹ thuật h&agrave;ng đầu v&agrave; Gionee Marathon M5 với pin ấn tượng đ&atilde; ch&iacute;nh thức được c&ocirc;ng bố.Gionee đ&atilde; tổ chức một&nbsp;</strong></span></h2>\r\n\r\n<h2 style="text-align:justify"><img alt="" src="/mobilestore/upload/userfiles/images/galaxy-a7-1.jpg" style="height:304px; width:525px" /></h2>\r\n\r\n<h2 style="text-align:justify"><span style="font-size:16px"><strong><a href="https://www.thegioididong.com/tin-tuc/loat-thong-tin-dang-tin-cay-nhat-ve-bo-doi-smartph-650927" rel="nofollow" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; color: rgb(74, 144, 226); outline: none;" target="_blank" title="Loạt thông tin đáng tin cậy nhất về bộ đôi smartphone Gionee camera ''khủng'', pin ''trâu''">sự kiện ra mắt sản phẩm to&agrave;n cầu</a>&nbsp;tại Bắc Kinh v&agrave;o ng&agrave;y h&ocirc;m nay (10/6). Tại sự kiện n&agrave;y, Gionee Elife E8 đi k&egrave;m với th&ocirc;ng số kỹ thuật h&agrave;ng đầu v&agrave; Gionee Marathon M5 với pin ấn tượng đ&atilde; ch&iacute;nh thức được c&ocirc;ng bố.Gionee đ&atilde; tổ chức một&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loat-thong-tin-dang-tin-cay-nhat-ve-bo-doi-smartph-650927" rel="nofollow" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; color: rgb(74, 144, 226); outline: none;" target="_blank" title="Loạt thông tin đáng tin cậy nhất về bộ đôi smartphone Gionee camera ''khủng'', pin ''trâu''">sự kiện ra mắt sản phẩm to&agrave;n cầu</a>&nbsp;tại Bắc Kinh v&agrave;o ng&agrave;y h&ocirc;m nay (10/6). Tại sự kiện n&agrave;y, Gionee Elife E8 đi k&egrave;m với th&ocirc;ng số kỹ thuật h&agrave;ng đầu v&agrave; Gionee Marathon M5 với pin ấn tượng đ&atilde; ch&iacute;nh thức được c&ocirc;ng bố.Gionee đ&atilde; tổ chức một&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loat-thong-tin-dang-tin-cay-nhat-ve-bo-doi-smartph-650927" rel="nofollow" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; color: rgb(74, 144, 226); outline: none;" target="_blank" title="Loạt thông tin đáng tin cậy nhất về bộ đôi smartphone Gionee camera ''khủng'', pin ''trâu''">sự kiện ra mắt sản phẩm to&agrave;n cầu</a>&nbsp;tại Bắc Kinh v&agrave;o ng&agrave;y h&ocirc;m nay (10/6). Tại sự kiện n&agrave;y, Gionee Elife E8 đi k&egrave;m với th&ocirc;ng số kỹ thuật h&agrave;ng đầu v&agrave; Gionee Marathon M5 với pin ấn tượng đ&atilde; ch&iacute;nh thức được c&ocirc;ng bố.Gionee đ&atilde; tổ chức một&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loat-thong-tin-dang-tin-cay-nhat-ve-bo-doi-smartph-650927" rel="nofollow" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; color: rgb(74, 144, 226); outline: none;" target="_blank" title="Loạt thông tin đáng tin cậy nhất về bộ đôi smartphone Gionee camera ''khủng'', pin ''trâu''">sự kiện ra mắt sản phẩm to&agrave;n cầu</a>&nbsp;tại Bắc Kinh v&agrave;o ng&agrave;y h&ocirc;m nay (10/6). Tại sự kiện n&agrave;y, Gionee Elife E8 đi k&egrave;m với th&ocirc;ng số kỹ thuật h&agrave;ng đầu v&agrave; Gionee Marathon M5 với pin ấn tượng đ&atilde; ch&iacute;nh thức được c&ocirc;ng bố.</strong></span></h2>', '/mobilestore/upload/userfiles/images/830-3.jpg', 0, 0, 8, 0, 0, 'Bộ đôi ''dế'' Android camera chụp ảnh lên tới 120MP, pin kép 6020mAh trình làng', 'Bộ đôi ''dế'' Android camera chụp ảnh lên tới 120MP, pin kép 6020mAh trình làng', 'Bộ đôi ''dế'' Android camera chụp ảnh lên tới 120MP, pin kép 6020mAh trình làng', 0, 1, 1, '2015-06-11 06:23:38', 1, '2015-06-11 07:20:54'),
(5, '3-smartphone-dung-chip-xin-qualcomm-dang-co-gia-ban-cuc-hoi', '3-smartphone-dung-chip-xin-qualcomm-dang-co-gia-ban-cuc-hoi', '3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''', '3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''', '<h2 style="font-style:italic;">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span>3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;<span style="font-size:24px">3 smartphone d&ugrave;ng chip &#39;xịn&#39; Qualcomm đang c&oacute; gi&aacute; b&aacute;n cực &#39;hời&#39;</span></h2>', '/mobilestore/upload/userfiles/images/5.jpg', 0, 0, 8, 0, 0, '3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''', '3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''', '3 smartphone dùng chip ''xịn'' Qualcomm đang có giá bán cực ''hời''', 0, 1, 1, '2015-06-11 06:24:24', 1, '2015-06-11 07:20:48'),
(6, 'ro-ri-thoi-diem-windows-10-mobile-chinh-thuc-buoc-ra-anh-sang', 'ro-ri-thoi-diem-windows-10-mobile-chinh-thuc-buoc-ra-anh-sang', 'Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng', 'Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng', '<p>R&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ngR&ograve; rỉ thời điểm Windows 10 Mobile ch&iacute;nh thức bước ra &aacute;nh s&aacute;ng</p>', '/mobilestore/upload/userfiles/images/htc-desire-eye-2.jpg', 0, 0, 8, 0, 0, 'Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng', 'Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng', 'Rò rỉ thời điểm Windows 10 Mobile chính thức bước ra ánh sáng', 0, 1, 1, '2015-06-11 06:25:19', 1, '2015-06-11 07:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `itq_note_category`
--

CREATE TABLE IF NOT EXISTS `itq_note_category` (
  `note_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itq_note_category`
--

INSERT INTO `itq_note_category` (`note_id`, `category_id`) VALUES
(1, 3),
(6, 8),
(5, 8),
(4, 8),
(2, 8),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `itq_product`
--

CREATE TABLE IF NOT EXISTS `itq_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `priceold` int(11) NOT NULL,
  `type-id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_banner` tinyint(1) NOT NULL DEFAULT '0',
  `is_right` tinyint(1) NOT NULL DEFAULT '0',
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `buy-best` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `meta-title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta-description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid-created` int(11) NOT NULL,
  `creattime` datetime NOT NULL,
  `userid-update` int(11) NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `itq_product`
--

INSERT INTO `itq_product` (`id`, `title`, `alias`, `route`, `categoryid`, `price`, `priceold`, `type-id`, `size`, `color`, `image`, `is_banner`, `is_right`, `images`, `buy-best`, `new`, `description`, `content`, `order`, `view`, `publish`, `meta-title`, `meta-keywords`, `meta-description`, `userid-created`, `creattime`, `userid-update`, `updatetime`) VALUES
(1, 'iPhone 4S 8GB', 'iphone-4s-8gb', 'iphone-4s-8gb', 9, 3999000, 4999000, 8, '', 'trắng', '/mobilestore/upload/userfiles/images/iphone-4s-8gb--(3).jpg', 0, 0, '', 0, 0, '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Chip A5, l&otilde;i k&eacute;p xử l&yacute; nhanh gấp 2 lần, xử l&yacute; đồ họa gấp 7 lần iPhone 4 gi&uacute;p m&aacute;y chạy mượt m&agrave; mọi ứng dụng, game kh&ocirc;ng hề giật, lag.</span></p>', '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Chip A5, l&otilde;i k&eacute;p xử l&yacute; nhanh gấp 2 lần, xử l&yacute; đồ họa gấp 7 lần iPhone 4 gi&uacute;p m&aacute;y chạy mượt m&agrave; mọi ứng dụng, game kh&ocirc;ng hề giật, lag.</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Chip A5, l&otilde;i k&eacute;p xử l&yacute; nhanh gấp 2 lần, xử l&yacute; đồ họa gấp 7 lần iPhone 4 gi&uacute;p m&aacute;y chạy mượt m&agrave; mọi ứng dụng, game kh&ocirc;ng hề giật, lag.</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Chip A5, l&otilde;i k&eacute;p xử l&yacute; nhanh gấp 2 lần, xử l&yacute; đồ họa gấp 7 lần iPhone 4 gi&uacute;p m&aacute;y chạy mượt m&agrave; mọi ứng dụng, game kh&ocirc;ng hề giật, lag.</span></p>', 0, 5, 1, 'iPhone 4', 'iPhone 4', 'iPhone 4', 1, '2015-05-21 09:51:38', 1, '2015-06-11 09:39:20'),
(2, 'iPhone 5S 16GB', 'iphone-5s-16gb', 'iphone-5s-16gb', 9, 7999000, 7999000, 7, '', '', '/mobilestore/upload/userfiles/images/images%20(15).jpg', 0, 0, '', 0, 0, '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">iPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của Apple</span></p>', '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">iPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của Apple</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">iPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của AppleiPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của AppleiPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của AppleiPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của Apple</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">iPhone 5s giữ nguy&ecirc;n thiết kế đặc trưng của iPhone 5 nhưng được c&aacute;ch t&acirc;n hơn với c&aacute;c t&ocirc;ng m&agrave;u sang trọng v&agrave; qu&yacute; ph&aacute;i. Thiết kế n&agrave;y được xem l&agrave; một trong những thiết kế iPhone đẹp nhất của Apple</span></p>', 0, 3, 1, 'iPhone 5s giữ nguyên thiết kế đặc trưng của iPhone 5 nhưng được cách tân hơn với các tông màu sang trọng và quý phái. Thiết kế này được xem là một trong những thiết kế iPhone đẹp nhất của Apple', 'iPhone 5s giữ nguyên thiết kế đặc trưng của iPhone 5 nhưng được cách tân hơn với các tông màu sang trọng và quý phái. Thiết kế này được xem là một trong những thiết kế iPhone đẹp nhất của Apple', 'iPhone 5s giữ nguyên thiết kế đặc trưng của iPhone 5 nhưng được cách tân hơn với các tông màu sang trọng và quý phái. Thiết kế này được xem là một trong những thiết kế iPhone đẹp nhất của Apple', 1, '2015-05-21 09:58:53', 1, '2015-06-11 09:38:40'),
(3, 'iPhone 6 64GB', 'iphone-6-64gb', 'iphone-6-64gb', 9, 8999000, 0, 7, '', 'trắng', '/mobilestore/upload/userfiles/images/iphone-5s-16gb-1-org-1.jpg', 0, 0, '', 0, 0, '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Thiết kế ho&agrave;n to&agrave;n mới lạ với bốn g&oacute;c bo tr&ograve;n mạnh, m&eacute;p k&iacute;nh m&agrave;i tinh tế gi&uacute;p bạn cầm m&aacute;y mềm mại, &ecirc;m tay hơn.</span></p>', '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Thiết kế ho&agrave;n to&agrave;n mới lạ với bốn g&oacute;c bo tr&ograve;n mạnh, m&eacute;p k&iacute;nh m&agrave;i tinh tế gi&uacute;p bạn cầm m&aacute;y mềm mại, &ecirc;m tay hơn.</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Thiết kế ho&agrave;n to&agrave;n mới lạ với bốn g&oacute;c bo tr&ograve;n mạnh, m&eacute;p k&iacute;nh m&agrave;i tinh tế gi&uacute;p bạn cầm m&aacute;y mềm mại, &ecirc;m tay hơn.</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Thiết kế ho&agrave;n to&agrave;n mới lạ với bốn g&oacute;c bo tr&ograve;n mạnh, m&eacute;p k&iacute;nh m&agrave;i tinh tế gi&uacute;p bạn cầm m&aacute;y mềm mại, &ecirc;m tay hơn.</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Thiết kế ho&agrave;n to&agrave;n mới lạ với bốn g&oacute;c bo tr&ograve;n mạnh, m&eacute;p k&iacute;nh m&agrave;i tinh tế gi&uacute;p bạn cầm m&aacute;y mềm mại, &ecirc;m tay hơn.</span></p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Thiết kế ho&agrave;n to&agrave;n mới lạ với bốn g&oacute;c bo tr&ograve;n mạnh, m&eacute;p k&iacute;nh m&agrave;i tinh tế gi&uacute;p bạn cầm m&aacute;y mềm mại, &ecirc;m tay hơn.</span></p>\r\n\r\n<p>&nbsp;</p>', 0, 6, 1, 'Thiết kế hoàn toàn mới lạ với bốn góc bo tròn mạnh, mép kính mài tinh tế giúp bạn cầm máy mềm mại, êm tay hơn.', 'Thiết kế hoàn toàn mới lạ với bốn góc bo tròn mạnh, mép kính mài tinh tế giúp bạn cầm máy mềm mại, êm tay hơn.', 'Thiết kế hoàn toàn mới lạ với bốn góc bo tròn mạnh, mép kính mài tinh tế giúp bạn cầm máy mềm mại, êm tay hơn.', 1, '2015-05-21 09:59:33', 1, '2015-06-11 09:37:42'),
(4, 'iPhone 6 Plus 64GB', 'iphone-6-plus-64gb', 'iphone-6-plus-64gb', 9, 22190000, 26190000, 7, '', 'trắng', '/mobilestore/upload/userfiles/images/iphone-6-128gb.png', 0, 0, '', 0, 0, '<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:15px">Cuộc c&aacute;ch t&acirc;n lớn nhất trong lịch sử iPhone với m&agrave;n h&igrave;nh 5.5 inch, 4 g&oacute;c bo tr&ograve;n v&agrave; mặt k&iacute;nh m&agrave;i tinh xảo, dễ d&agrave;ng cầm nắm thao t&aacute;c sản phẩm hơn.</span></p>', '<p><strong>Lần đầu ti&ecirc;n, Apple mang đến cho người d&ugrave;ng c&aacute;i nh&igrave;n đầy mới lạ thu h&uacute;t với chiếc iPhone 6 Plus 64GB sở hữu m&agrave;n h&igrave;nh 5.5 inch, lớn nhất v&agrave; mới mẻ nhất trong lịch sử c&aacute;c thế hệ iPhone đ&atilde; qua. C&oacute; thể n&oacute;i iPhone 6 Plus l&agrave; một si&ecirc;u phẩm thật sự, vừa mạnh mẽ, s&agrave;nh điệu, tinh tế thời thượng m&agrave; c&ograve;n thể hiện đẳng cấp, đ&aacute;p ứng được nhu cầu của tất cả người d&ugrave;ng y&ecirc;u th&iacute;ch d&ograve;ng sản phẩm thuộc họ nh&agrave; t&aacute;o cắn dở.</strong></p>\r\n\r\n<p><strong>Thiết kế tạo sự đột ph&aacute; mới mẻ.</strong><br />\r\nBỏ đi c&aacute;c cạnh m&aacute;y vu&ocirc;ng g&oacute;c đ&atilde; từng l&agrave;m biết bao người y&ecirc;u th&iacute;ch qua iPhone 4 hay iPhone 5, iPhone mới tiếp tục mang trong m&igrave;nh một thiết kế kh&aacute;c khiến cả thế giới phải ngắm nh&igrave;n, c&aacute;c cạnh, c&aacute;c g&oacute;c được bo tr&ograve;n tinh tế mang đến c&aacute;i nh&igrave;n mềm mại nhưng kh&ocirc;ng qu&aacute; mỏng manh, m&aacute;y được gia c&ocirc;ng thiết kế để c&oacute; độ mỏng chỉ 7.1 mm, kh&ocirc;ng mỏng nhất nhưng thiết kế l&agrave; duy nhất.</p>\r\n\r\n<p><span style="font-family:helvetica,arial,dejavu sans,liberation sans,freesans,sans-serif; font-size:14px">L&agrave; một phi&ecirc;n bản &ldquo;b&eacute; bự&rdquo; của iPhone 6, iPhone 6 Plus 64GB cho c&aacute;i nh&igrave;n rộng r&atilde;i hơn, thao t&aacute;c cũng v&igrave; thế nhanh hơn, đ&aacute;p ứng được tối đa nhu cầu sử dụng của người d&ugrave;ng. Nhưng trở ngại của m&agrave;n h&igrave;nh to l&agrave; đi k&egrave;m m&aacute;y sẽ to hơn, sẽ hơi kh&oacute; cầm nắm hơn với c&aacute;c đối tượng kh&aacute;ch h&agrave;ng l&agrave; nữ c&oacute; đ&ocirc;i b&agrave;n tay nhỏ cũng như bỏ t&uacute;i g&acirc;y vướng v&iacute;u. Nhưng với sự y&ecirc;u th&iacute;ch d&agrave;nh cho iPhone, chắc chắn đ&acirc;y sẽ kh&ocirc;ng phải l&agrave; một trở ngại đ&aacute;ng để suy nghĩ.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><em>phone 6 Plus 64GB c&oacute; ba m&agrave;u để người d&ugrave;ng lựa chọn, v&agrave;ng đồng, bạc v&agrave; x&aacute;m đậm ph&ugrave; hợp với mọi c&aacute; t&iacute;nh.</em></p>\r\n\r\n<p><strong>Chất liệu nh&ocirc;m nguy&ecirc;n khối sang trọng</strong></p>\r\n\r\n<p>Một ưu điểm kh&aacute;c của iPhone 6 Plus so với những đối thủ cạnh tranh ch&iacute;nh l&agrave; bộ vỏ nguy&ecirc;n khối sang trọng, chất liệu m&aacute;y kh&aacute; m&aacute;t tay v&agrave; nh&igrave;n chắc chắn.</p>\r\n\r\n<p>&nbsp;</p>', 0, 3, 1, 'phone 6 Plus 64GB', 'phone 6 Plus 64GB', 'phone 6 Plus 64GB', 1, '2015-05-21 10:01:31', 1, '2015-06-10 00:49:21'),
(5, 'GALAXY S6 EDGE - G925', 'galaxy-s6-edge-g925', 'galaxy-s6-edge-g925', 11, 0, 0, 7, '', '', '/mobilestore/upload/userfiles/images/samsung-galaxy-note-edge.png', 0, 0, '', 0, 0, '<p><strong>Bảo h&agrave;nh:</strong><span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">&nbsp;12 th&aacute;ng</span>Xem địa chỉ bảo h&agrave;nh<br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- 7 ng&agrave;y đổi trả</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Rơi vỡ ngấm nước vẫn bảo h&agrave;nh với Care Diamond</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Mua k&egrave;m BVMH được d&aacute;n cả năm miễn ph&iacute; chỉ với 60,000đ</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- B&aacute;n trả g&oacute;p</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Miễn ph&iacute; c&agrave;i đặt phần mềm trọn đời sản phẩm</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Giao h&agrave;ng tận nơi - h&agrave;i l&ograve;ng mới phải thanh to&aacute;n</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Phụ kiện k&egrave;m theo: Sạc, tai nghe, s&aacute;ch hướng dẫn</span></p>', '<p><strong>Bảo h&agrave;nh:</strong><span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">&nbsp;12 th&aacute;ng</span>Xem địa chỉ bảo h&agrave;nh<br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- 7 ng&agrave;y đổi trả</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Rơi vỡ ngấm nước vẫn bảo h&agrave;nh với Care Diamond</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Mua k&egrave;m BVMH được d&aacute;n cả năm miễn ph&iacute; chỉ với 60,000đ</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- B&aacute;n trả g&oacute;p</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Miễn ph&iacute; c&agrave;i đặt phần mềm trọn đời sản phẩm</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Giao h&agrave;ng tận nơi - h&agrave;i l&ograve;ng mới phải thanh to&aacute;n</span><br />\r\n<span style="font-family:arial,verdana,sans-serif; font-size:13.3333330154419px">- Phụ kiện k&egrave;m theo: Sạc, tai nghe, s&aacute;ch hướng dẫn</span></p>', 0, 3, 1, 'GALAXY S6 EDGE', 'GALAXY S6 EDGE', 'GALAXY S6 EDGE', 1, '2015-06-10 01:07:32', 0, '0000-00-00 00:00:00'),
(6, 'HTC ONE M9', 'htc-one-m9', 'htc-one-m9', 12, 0, 0, 7, '', '', '/mobilestore/upload/userfiles/images/htc-one-m9-1.jpg', 0, 0, '', 0, 0, '<p><strong>Mới đ&acirc;y, HTC tiếp tục cho ra mắt sản phẩm tiếp theo thuộc d&ograve;ng ONE của h&atilde;ng: HTC One M9. Đ&acirc;y l&agrave; sản phẩm được kỳ vọng mang lại nhiều thay đổi cho HTC v&agrave; l&agrave; đối thủ đ&aacute;ng gờm của c&aacute;c smartphone cao cấp như Galaxy S6, Galaxy S6 Edge. HTC One M9 sở hữu m&agrave;n h&igrave;nh Full HD 5 inches, bộ vi xử l&yacute; Snapdragon 810, GPU Adreno 430, RAM 3Gb, hệ điều h&agrave;nh Android 5.0, camera sau 20.7MP, camera trước 4 Ultra Pixel. Thiết bị rất th&iacute;ch hợp cho doanh nh&acirc;n th&agrave;nh đạt, c&aacute;c bạn trẻ đam m&ecirc; kh&aacute;m ph&aacute; c&ocirc;ng nghệ.</strong></p>', '<p><strong>Mới đ&acirc;y, HTC tiếp tục cho ra mắt sản phẩm tiếp theo thuộc d&ograve;ng ONE của h&atilde;ng: HTC One M9. Đ&acirc;y l&agrave; sản phẩm được kỳ vọng mang lại nhiều thay đổi cho HTC v&agrave; l&agrave; đối thủ đ&aacute;ng gờm của c&aacute;c smartphone cao cấp như Galaxy S6, Galaxy S6 Edge. HTC One M9 sở hữu m&agrave;n h&igrave;nh Full HD 5 inches, bộ vi xử l&yacute; Snapdragon 810, GPU Adreno 430, RAM 3Gb, hệ điều h&agrave;nh Android 5.0, camera sau 20.7MP, camera trước 4 Ultra Pixel. Thiết bị rất th&iacute;ch hợp cho doanh nh&acirc;n th&agrave;nh đạt, c&aacute;c bạn trẻ đam m&ecirc; kh&aacute;m ph&aacute; c&ocirc;ng nghệ.<img alt="" src="/mobilestore/upload/userfiles/images/htc-one-m9-1.jpg" style="height:356px; width:640px" /></strong></p>', 0, 2, 1, 'HTC ONE M9', 'HTC ONE M9', 'HTC ONE M9', 1, '2015-06-10 01:10:16', 0, '0000-00-00 00:00:00'),
(7, 'SAMSUNG GALAXY S6 - G920', 'samsung-galaxy-s6-g920', 'samsung-galaxy-s6-g920', 2, 17000000, 18000000, 7, '', '', '/mobilestore/upload/userfiles/images/6e56bf62-f856-4626-89e5-95d0942781ad.jpg', 0, 0, '', 0, 0, '', '', 0, 0, 1, 'SAMSUNG GALAXY S6 - G920', 'SAMSUNG GALAXY S6 - G920', 'SAMSUNG GALAXY S6 - G920', 1, '2015-06-10 01:11:43', 0, '0000-00-00 00:00:00'),
(8, 'NOKIA LUMIA 730 - 2 SIM', 'nokia-lumia-730-2-sim', 'nokia-lumia-730-2-sim', 13, 36000000, 46000000, 7, '', '', '/mobilestore/upload/userfiles/images/f77fc9e3-7484-4b90-8675-46cf00e481de.jpg', 0, 0, '', 0, 0, '<p><strong>amera trước khủng 5megapixel HD v&agrave; g&oacute;c chụp rộng tận hưởng những trải nghiệm Selfie độc đ&aacute;o c&ugrave;ng ứng dụng Lumia Selfie</strong><br />\r\n<strong>&bull; Tận hưởng c&aacute;c ứng dụng v&agrave; game phổ biến nhất hiện nay, kể cả những ứng dụng d&agrave;nh ri&ecirc;ng cho d&ograve;ng điện thoại Lumia như Lumia VIP</strong><br />\r\n<strong>&bull; Trải nghiệm Windows Phone mới nhất v&agrave; tuyệt vời nhất</strong><br />\r\n<strong>&bull; 2 Sim 2 s&oacute;ng tiện &iacute;ch</strong></p>\r\n\r\n<div>&nbsp;\r\n<div>&nbsp;</div>\r\n</div>', '<p><strong>amera trước khủng 5megapixel HD v&agrave; g&oacute;c chụp rộng tận hưởng những trải nghiệm Selfie độc đ&aacute;o c&ugrave;ng ứng dụng Lumia Selfie</strong><br />\r\n<strong>&bull; Tận hưởng c&aacute;c ứng dụng v&agrave; game phổ biến nhất hiện nay, kể cả những ứng dụng d&agrave;nh ri&ecirc;ng cho d&ograve;ng điện thoại Lumia như Lumia VIP</strong><br />\r\n<strong>&bull; Trải nghiệm Windows Phone mới nhất v&agrave; tuyệt vời nhất</strong><br />\r\n<strong>&bull; 2 Sim 2 s&oacute;ng tiện &iacute;ch</strong></p>\r\n\r\n<p><strong><img alt="" src="/mobilestore/upload/userfiles/images/nokia-lumia-730-2.jpg" style="height:617px; width:431px" /></strong></p>\r\n\r\n<div><strong>amera trước khủng 5megapixel HD v&agrave; g&oacute;c chụp rộng tận hưởng những trải nghiệm Selfie độc đ&aacute;o c&ugrave;ng ứng dụng Lumia Selfie</strong><br />\r\n<strong>&bull; Tận hưởng c&aacute;c ứng dụng v&agrave; game phổ biến nhất hiện nay, kể cả những ứng dụng d&agrave;nh ri&ecirc;ng cho d&ograve;ng điện thoại Lumia như Lumia VIP</strong><br />\r\n<strong>&bull; Trải nghiệm Windows Phone mới nhất v&agrave; tuyệt vời nhất</strong><br />\r\n<strong>&bull; 2 Sim 2 s&oacute;ng tiện &iacute;ch</strong>\r\n\r\n<div>&nbsp;</div>\r\n</div>', 0, 1, 1, 'NOKIA LUMIA 730 - 2 SIM', 'NOKIA LUMIA 730 - 2 SIM', 'NOKIA LUMIA 730 - 2 SIM', 1, '2015-06-10 01:14:22', 0, '0000-00-00 00:00:00'),
(9, 'HTC DESIRE EYE', 'htc-desire-eye', 'htc-desire-eye', 12, 8990000, 9990000, 7, '', '', '/mobilestore/upload/userfiles/images/htc-desire-eye-1.jpg', 0, 0, '', 0, 0, '<div>&nbsp;</div>\r\n\r\n<div><strong>Tại sự kiện Double Exposure ng&agrave;y 9/10 vừa qua, HTC đ&atilde; ra mắt chiếc điện thoại cao cấp thuộc d&ograve;ng Desire của HTC l&agrave; HTC Desire Eye . Sản phẩm c&oacute; mặt trước sau đều l&agrave; camera khủng c&oacute; độ ph&acirc;n giải 13-megapixels c&ugrave;ng đ&egrave;n flash LED k&eacute;p, HTC nhấn mạnh đến t&iacute;nh năng chụp ảnh tr&ecirc;n chiếc smartphones mới n&agrave;y.</strong></div>', '<div>&nbsp;</div>\r\n\r\n<div>\r\n<p><strong>Tại sự kiện Double Exposure ng&agrave;y 9/10 vừa qua, HTC đ&atilde; ra mắt chiếc điện thoại cao cấp thuộc d&ograve;ng Desire của HTC l&agrave; HTC Desire Eye . Sản phẩm c&oacute; mặt trước sau đều l&agrave; camera khủng c&oacute; độ ph&acirc;n giải 13-megapixels c&ugrave;ng đ&egrave;n flash LED k&eacute;p, HTC nhấn mạnh đến t&iacute;nh năng chụp ảnh tr&ecirc;n chiếc smartphones mới n&agrave;y.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Thiết kế</strong></p>\r\n\r\n<p>Desire Eye c&oacute; thiết kế nguy&ecirc;n khối Unibody truyền thống như c&aacute;c điện thoại d&ograve;ng Desire kh&aacute;c, điểm kh&aacute;c biệt l&agrave; th&acirc;n m&aacute;y sử dụng chất liệu nhựa si&ecirc;u bền Polycacbonate chứ kh&ocirc;ng phải kim loại ho&agrave;n to&agrave;n như One M8.</p>\r\n\r\n<p><img alt="" src="/mobilestore/upload/userfiles/images/htc-desire-eye-1.jpg" style="height:517px; width:756px" /></p>\r\n\r\n<p>Thiết kế của Desire Eye chia l&agrave;m 3 phần ri&ecirc;ng biệt dễ nhận thấy, v&iacute; dụ ở phi&ecirc;n bản m&agrave;u xanh th&igrave; mặt trước điện thoại c&oacute; m&agrave;u trắng, viền xung quanh l&agrave; xanh da trời v&agrave; mặt lưng c&oacute; m&agrave;u xanh dương.</p>\r\n\r\n<p>Mặt trước điện thoại l&agrave; m&agrave;n h&igrave;nh cảm ứng lớn k&iacute;ch thước 5.2 inches (lớn hơn so với&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai/sony-xperia-z3-white-cong-ty" style="color: black; text-decoration: none; font-weight: bold;">Xperia Z3</a>&nbsp;hay&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai/nokia-lumia-830-white-cong-ty" style="color: black; text-decoration: none; font-weight: bold;">Lumia 830&nbsp;</a>chỉ dừng lại ở 5 inches), ph&iacute;a dưới l&agrave; logo&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-htc" style="color: black; text-decoration: none; font-weight: bold;">HTC&nbsp;</a>, bộ 3 ph&iacute;m cảm ứng của hệ điều h&agrave;nh Android được t&iacute;ch hợp v&agrave;o trong m&agrave;n h&igrave;nh, v&igrave; vậy sẽ chiếm một khoảng diện t&iacute;ch khi sử dụng.</p>\r\n</div>', 0, 1, 1, 'HTC DESIRE EYE', 'HTC DESIRE EYE', 'HTC DESIRE EYE', 1, '2015-06-10 01:16:31', 0, '0000-00-00 00:00:00'),
(10, 'HTC DESIRE 510', 'htc-desire-510', 'htc-desire-510', 12, 4500000, 5600000, 7, '', '', '/mobilestore/upload/userfiles/images/images(1).jpg', 0, 0, '', 0, 0, '<div>&nbsp;</div>\r\n\r\n<div><strong>Mới đ&acirc;y, HTC vừa ra mắt th&ecirc;m một chiếc Desire mới tầm trung mang t&ecirc;n Desire 510. Sản phẩm d&ugrave;ng chip Qualcomm Snapdragon 410, RAM 1GB v&agrave; m&agrave;n h&igrave;nh 4,7 inch FWVGA v&agrave; kết nối 4G. HTC hứa hẹn sẽ mang đến thị trường một sản phẩm với mức gi&aacute; vừa phải nhưng được trang bị những t&iacute;nh năng l&agrave;m việc vượt trội.</strong></div>', '<div>&nbsp;</div>\r\n\r\n<div><strong>Mới đ&acirc;y, HTC vừa ra mắt th&ecirc;m một chiếc Desire mới tầm trung mang t&ecirc;n Desire 510. Sản phẩm d&ugrave;ng chip Qualcomm Snapdragon 410, RAM 1GB v&agrave; m&agrave;n h&igrave;nh 4,7 inch FWVGA v&agrave; kết nối 4G. HTC hứa hẹn sẽ mang đến thị trường một sản phẩm với mức gi&aacute; vừa phải nhưng được trang bị những t&iacute;nh năng l&agrave;m việc vượt trội.</strong>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Mới đ&acirc;y, HTC vừa ra mắt th&ecirc;m một chiếc Desire mới tầm trung mang t&ecirc;n Desire 510. Sản phẩm d&ugrave;ng chip Qualcomm Snapdragon 410, RAM 1GB v&agrave; m&agrave;n h&igrave;nh 4,7 inch FWVGA v&agrave; kết nối 4G. HTC hứa hẹn sẽ mang đến thị trường một sản phẩm với mức gi&aacute; vừa phải nhưng được trang bị những t&iacute;nh năng l&agrave;m việc vượt trội.</strong>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Mới đ&acirc;y, HTC vừa ra mắt th&ecirc;m một chiếc Desire mới tầm trung mang t&ecirc;n Desire 510. Sản phẩm d&ugrave;ng chip Qualcomm Snapdragon 410, RAM 1GB v&agrave; m&agrave;n h&igrave;nh 4,7 inch FWVGA v&agrave; kết nối 4G. HTC hứa hẹn sẽ mang đến thị trường một sản phẩm với mức gi&aacute; vừa phải nhưng được trang bị những t&iacute;nh năng l&agrave;m việc vượt trội.</strong>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Mới đ&acirc;y, HTC vừa ra mắt th&ecirc;m một chiếc Desire mới tầm trung mang t&ecirc;n Desire 510. Sản phẩm d&ugrave;ng chip Qualcomm Snapdragon 410, RAM 1GB v&agrave; m&agrave;n h&igrave;nh 4,7 inch FWVGA v&agrave; kết nối 4G. HTC hứa hẹn sẽ mang đến thị trường một sản phẩm với mức gi&aacute; vừa phải nhưng được trang bị những t&iacute;nh năng l&agrave;m việc vượt trội.</strong></div>\r\n</div>\r\n</div>\r\n</div>', 0, 2, 1, 'HTC', 'HTC', 'HTC', 1, '2015-06-10 01:18:23', 0, '0000-00-00 00:00:00'),
(11, 'HTC ONE MINI 2', 'htc-one-mini-2', 'htc-one-mini-2', 12, 2200000, 2400000, 7, '', '', '/mobilestore/upload/userfiles/images/d136d6b0-64ee-4283-855b-65aa721a567b.jpg', 0, 0, '', 0, 0, '<p><strong>Tiếp sau d&ograve;ng sản phẩm cao cấp đầu bảng One M8, HTC lại tung ra một phi&ecirc;n bản thu nhỏ mang t&ecirc;n One mini 2. Kế thừa được những ưu điểm nổi bật về thiết kế v&agrave; t&iacute;nh năng cũng như một v&agrave;i điều chỉnh lại. One mini 2 xứng đ&aacute;ng l&agrave; chọn lựa cực tốt cho người d&ugrave;ng ở ph&acirc;n kh&uacute;c tầm trung.</strong></p>', '<p><strong>Tiếp sau d&ograve;ng sản phẩm cao cấp đầu bảng One M8, HTC lại tung ra một phi&ecirc;n bản thu nhỏ mang t&ecirc;n One mini 2. Kế thừa được những ưu điểm nổi bật về thiết kế v&agrave; t&iacute;nh năng cũng như một v&agrave;i điều chỉnh lại. One mini 2 xứng đ&aacute;ng l&agrave; chọn lựa cực tốt cho người d&ugrave;ng ở ph&acirc;n kh&uacute;c tầm trung.Tiếp sau d&ograve;ng sản phẩm cao cấp đầu bảng One M8, HTC lại tung ra một phi&ecirc;n bản thu nhỏ mang t&ecirc;n One mini 2. Kế thừa được những ưu điểm nổi bật về thiết kế v&agrave; t&iacute;nh năng cũng như một v&agrave;i điều chỉnh lại. One mini 2 xứng đ&aacute;ng l&agrave; chọn lựa cực tốt cho người d&ugrave;ng ở ph&acirc;n kh&uacute;c tầm trung.Tiếp sau d&ograve;ng sản phẩm cao cấp đầu bảng One M8, HTC lại tung ra một phi&ecirc;n bản thu nhỏ mang t&ecirc;n One mini 2. Kế thừa được những ưu điểm nổi bật về thiết kế v&agrave; t&iacute;nh năng cũng như một v&agrave;i điều chỉnh lại. One mini 2 xứng đ&aacute;ng l&agrave; chọn lựa cực tốt cho người d&ugrave;ng ở ph&acirc;n kh&uacute;c tầm trung.</strong></p>', 0, 0, 1, '', '', '', 1, '2015-06-10 01:20:00', 0, '0000-00-00 00:00:00'),
(12, 'HTC ONE MAX - 16GB', 'htc-one-max-16gb', 'htc-one-max-16gb', 12, 5590000, 6090000, 7, '', '', '/mobilestore/upload/userfiles/images/3dcbb17f-b1f6-4194-90b8-4367d7d7520b.jpg', 0, 0, '', 0, 0, '<h1>HTC ONE MAX - 16GB</h1>\r\n\r\n<p><span style="background-color:rgb(223, 223, 223); color:rgb(0, 0, 0); font-family:times new roman,times,serif; font-size:14px">Sau khi ra mắt HTC One v&agrave;&nbsp; HTC One mini,&nbsp;</span><a href="http://www.nhatcuong.com/dien-thoai-htc" style="text-decoration: none; font-family: ''Times New Roman'', Times, serif; font-size: 14px; line-height: 24px; color: black; font-weight: bold; background-color: rgb(223, 223, 223);">HTC&nbsp;</a><span style="background-color:rgb(223, 223, 223); color:rgb(0, 0, 0); font-family:times new roman,times,serif; font-size:14px">lại tiếp tục tung ra chiếc phablet One Max - phi&ecirc;n bản thứ ba của d&ograve;ng điện thoại HTC One đ&igrave;nh đ&aacute;m. &nbsp;Chiếc Phablet mới nhất n&agrave;y ra mắt với tham vọng cạnh tranh c&ugrave;ng Samsung Galaxy Note 3 v&agrave; Xperia Z Ultra. Sản phẩm n&agrave;y c&oacute; m&agrave;n h&igrave;nh l&ecirc;n đến 5,9 inch Full HD (lớn nhất trong c&aacute;c smartphone của HTC hiện nay), giao diện HTC Sense 5.5, loa BoumSound &acirc;m thanh sống động c&ugrave;ng với cảm biến v&acirc;n tay ở mặt sau. Thiết bị n&agrave;y rất th&iacute;ch hợp với người d&ugrave;ng l&agrave; những doanh nh&acirc;n th&agrave;nh đạt, những người y&ecirc;u th&iacute;ch sự ho&agrave;n hảo v&agrave; c&ocirc;ng nghệ đỉnh cao.</span></p>', '<p><span style="background-color:rgb(223, 223, 223); color:rgb(0, 0, 0); font-family:times new roman,times,serif; font-size:14px">Sau khi ra mắt HTC One v&agrave;&nbsp; HTC One mini,&nbsp;</span><a href="http://www.nhatcuong.com/dien-thoai-htc" style="text-decoration: none; font-family: ''Times New Roman'', Times, serif; font-size: 14px; line-height: 24px; color: black; font-weight: bold; background-color: rgb(223, 223, 223);">HTC&nbsp;</a><span style="background-color:rgb(223, 223, 223); color:rgb(0, 0, 0); font-family:times new roman,times,serif; font-size:14px">lại tiếp tục tung ra chiếc phablet One Max - phi&ecirc;n bản thứ ba của d&ograve;ng điện thoại HTC One đ&igrave;nh đ&aacute;m. &nbsp;Chiếc Phablet mới nhất n&agrave;y ra mắt với tham vọng cạnh tranh c&ugrave;ng Samsung Galaxy Note 3 v&agrave; Xperia Z Ultra. Sản phẩm n&agrave;y c&oacute; m&agrave;n h&igrave;nh l&ecirc;n đến 5,9 inch Full HD (lớn nhất trong c&aacute;c smartphone của HTC hiện nay), giao diện HTC Sense 5.5, loa BoumSound &acirc;m thanh sống động c&ugrave;ng với cảm biến v&acirc;n tay ở mặt sau. Thiết bị n&agrave;y rất th&iacute;ch hợp với người d&ugrave;ng l&agrave; những doanh nh&acirc;n th&agrave;nh đạt, những người y&ecirc;u th&iacute;ch sự ho&agrave;n hảo v&agrave; c&ocirc;ng nghệ đỉnh cao.Sau khi ra mắt HTC One v&agrave;&nbsp; HTC One mini,&nbsp;</span><a href="http://www.nhatcuong.com/dien-thoai-htc" style="text-decoration: none; font-family: ''Times New Roman'', Times, serif; font-size: 14px; line-height: 24px; color: black; font-weight: bold; background-color: rgb(223, 223, 223);">HTC&nbsp;</a><span style="background-color:rgb(223, 223, 223); color:rgb(0, 0, 0); font-family:times new roman,times,serif; font-size:14px">lại tiếp tục tung ra chiếc phablet One Max - phi&ecirc;n bản thứ ba của d&ograve;ng điện thoại HTC One đ&igrave;nh đ&aacute;m. &nbsp;Chiếc Phablet mới nhất n&agrave;y ra mắt với tham vọng cạnh tranh c&ugrave;ng Samsung Galaxy Note 3 v&agrave; Xperia Z Ultra. Sản phẩm n&agrave;y c&oacute; m&agrave;n h&igrave;nh l&ecirc;n đến 5,9 inch Full HD (lớn nhất trong c&aacute;c smartphone của HTC hiện nay), giao diện HTC Sense 5.5, loa BoumSound &acirc;m thanh sống động c&ugrave;ng với cảm biến v&acirc;n tay ở mặt sau. Thiết bị n&agrave;y rất th&iacute;ch hợp với người d&ugrave;ng l&agrave; những doanh nh&acirc;n th&agrave;nh đạt, những người y&ecirc;u th&iacute;ch sự ho&agrave;n hảo v&agrave; c&ocirc;ng nghệ đỉnh cao.Sau khi ra mắt HTC One v&agrave;&nbsp; HTC One mini,&nbsp;</span><a href="http://www.nhatcuong.com/dien-thoai-htc" style="text-decoration: none; font-family: ''Times New Roman'', Times, serif; font-size: 14px; line-height: 24px; color: black; font-weight: bold; background-color: rgb(223, 223, 223);">HTC&nbsp;</a><span style="background-color:rgb(223, 223, 223); color:rgb(0, 0, 0); font-family:times new roman,times,serif; font-size:14px">lại tiếp tục tung ra chiếc phablet One Max - phi&ecirc;n bản thứ ba của d&ograve;ng điện thoại HTC One đ&igrave;nh đ&aacute;m. &nbsp;Chiếc Phablet mới nhất n&agrave;y ra mắt với tham vọng cạnh tranh c&ugrave;ng Samsung Galaxy Note 3 v&agrave; Xperia Z Ultra. Sản phẩm n&agrave;y c&oacute; m&agrave;n h&igrave;nh l&ecirc;n đến 5,9 inch Full HD (lớn nhất trong c&aacute;c smartphone của HTC hiện nay), giao diện HTC Sense 5.5, loa BoumSound &acirc;m thanh sống động c&ugrave;ng với cảm biến v&acirc;n tay ở mặt sau. Thiết bị n&agrave;y rất th&iacute;ch hợp với người d&ugrave;ng l&agrave; những doanh nh&acirc;n th&agrave;nh đạt, những người y&ecirc;u th&iacute;ch sự ho&agrave;n hảo v&agrave; c&ocirc;ng nghệ đỉnh cao.</span></p>', 0, 1, 1, 'HTC Sense 5.5,', 'HTC Sense 5.5,', 'HTC Sense 5.5,', 1, '2015-06-10 01:21:08', 0, '0000-00-00 00:00:00'),
(13, 'NOKIA LUMIA 925', 'nokia-lumia-925', 'nokia-lumia-925', 2, 5590000, 6090000, 7, '', '', '/mobilestore/upload/userfiles/images/925.jpg', 0, 0, '', 0, 0, '<h1>NOKIA LUMIA 925&nbsp;NOKIA LUMIA 925</h1>', '', 0, 0, 1, 'NOKIA LUMIA 925', 'NOKIA LUMIA 925', 'NOKIA LUMIA 925', 1, '2015-06-10 01:22:32', 0, '0000-00-00 00:00:00'),
(14, 'NOKIA X2 - 2 SIM', 'nokia-x2-2-sim', 'nokia-x2-2-sim', 2, 12000000, 20990000, 7, '', '', '/mobilestore/upload/userfiles/images/x2.jpg', 0, 0, '', 0, 0, '<h1>NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;</h1>', '<h1>NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;NOKIA X2 - 2 SIM&nbsp;</h1>', 0, 0, 1, 'NOKIA X2 - 2 SIM', 'NOKIA X2 - 2 SIM', 'NOKIA X2 - 2 SIM', 1, '2015-06-10 01:23:55', 0, '0000-00-00 00:00:00'),
(15, 'NOKIA LUMIA 630', 'nokia-lumia-630', 'nokia-lumia-630', 13, 2200000, 2249000, 7, '', '', '/mobilestore/upload/userfiles/images/630.png', 0, 0, '', 0, 0, '<h1>NOKIA LUMIA 630</h1>', '<h1>NOKIA LUMIA 630</h1>', 0, 1, 1, 'NOKIA LUMIA 630', 'NOKIA LUMIA 630', 'NOKIA LUMIA 630', 1, '2015-06-10 01:25:24', 0, '0000-00-00 00:00:00'),
(16, 'NOKIA NOKIA LUMIA 830', 'nokia-nokia-lumia-830', 'nokia-nokia-lumia-830', 13, 0, 0, 7, '', '', '/mobilestore/upload/userfiles/images/830.jpg', 0, 0, '', 0, 0, '<p>Với bề d&agrave;y chỉ 8.5 mm v&agrave; trọng lượng 150 g &ndash; đ&acirc;y l&agrave; một trong những smartphone mỏng v&agrave; nhẹ nhất hiện nay của h&atilde;ng.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 5 inch HD, sắc n&eacute;t , ch&acirc;n thực</strong></p>\r\n\r\n<p>Sở hữu m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải HD 720 c&ugrave;ng k&iacute;ch thước 5 inches cho chất lượng tốt, m&agrave;u sắc ch&acirc;n thực v&agrave; độ tương phản cao. Ngo&agrave;i ra, m&agrave;n h&igrave;nh&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-nokia" style="text-decoration: none; color: black; font-weight: bold;">Lumia 830&nbsp;</a>c&ograve;n được bảo vệ bởi mặt k&iacute;nh cường lực Gorilla Glass, vừa tạo vẻ sang trọng vừa tạo sự chắc chắn v&agrave; kh&aacute;c biệt trong qu&aacute; tr&igrave;nh sử dụng.</p>', '<p>Với bề d&agrave;y chỉ 8.5 mm v&agrave; trọng lượng 150 g &ndash; đ&acirc;y l&agrave; một trong những smartphone mỏng v&agrave; nhẹ nhất hiện nay của h&atilde;ng.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 5 inch HD, sắc n&eacute;t , ch&acirc;n thực</strong></p>\r\n\r\n<p>Sở hữu m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải HD 720 c&ugrave;ng k&iacute;ch thước 5 inches cho chất lượng tốt, m&agrave;u sắc ch&acirc;n thực v&agrave; độ tương phản cao. Ngo&agrave;i ra, m&agrave;n h&igrave;nh&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-nokia" style="text-decoration: none; color: black; font-weight: bold;">Lumia 830&nbsp;</a>c&ograve;n được bảo vệ bởi mặt k&iacute;nh cường lực Gorilla Glass, vừa tạo vẻ sang trọng vừa tạo sự chắc chắn v&agrave; kh&aacute;c biệt trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với bề d&agrave;y chỉ 8.5 mm v&agrave; trọng lượng 150 g &ndash; đ&acirc;y l&agrave; một trong những smartphone mỏng v&agrave; nhẹ nhất hiện nay của h&atilde;ng.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 5 inch HD, sắc n&eacute;t , ch&acirc;n thực</strong></p>\r\n\r\n<p>Sở hữu m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải HD 720 c&ugrave;ng k&iacute;ch thước 5 inches cho chất lượng tốt, m&agrave;u sắc ch&acirc;n thực v&agrave; độ tương phản cao. Ngo&agrave;i ra, m&agrave;n h&igrave;nh&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-nokia" style="text-decoration: none; color: black; font-weight: bold;">Lumia 830&nbsp;</a>c&ograve;n được bảo vệ bởi mặt k&iacute;nh cường lực Gorilla Glass, vừa tạo vẻ sang trọng vừa tạo sự chắc chắn v&agrave; kh&aacute;c biệt trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với bề d&agrave;y chỉ 8.5 mm v&agrave; trọng lượng 150 g &ndash; đ&acirc;y l&agrave; một trong những smartphone mỏng v&agrave; nhẹ nhất hiện nay củ<img alt="" src="/mobilestore/upload/userfiles/images/830.jpg" style="height:1200px; width:960px" />a h&atilde;ng.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 5 inch HD, sắc n&eacute;t , ch&acirc;n thực</strong></p>\r\n\r\n<p>Sở hữu m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải HD 720 c&ugrave;ng k&iacute;ch thước 5 inches cho chất lượng tốt, m&agrave;u sắc ch&acirc;n thực v&agrave; độ tương phản cao. Ngo&agrave;i ra, m&agrave;n h&igrave;nh&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-nokia" style="text-decoration: none; color: black; font-weight: bold;">Lumia 830&nbsp;</a>c&ograve;n được bảo vệ bởi mặt k&iacute;nh cường lực Gorilla Glass, vừa tạo vẻ sang trọng vừa tạo sự chắc chắn v&agrave; kh&aacute;c biệt trong qu&aacute; tr&igrave;nh sử dụng.</p>', 0, 0, 1, 'NOKIA LUMIA 830', 'NOKIA LUMIA 830', 'NOKIA LUMIA 830', 1, '2015-06-10 01:27:54', 0, '0000-00-00 00:00:00'),
(17, 'Nokia Lumia 525', 'nokia-lumia-525', 'nokia-lumia-525', 2, 2099000, 3230000, 7, '', '', '/mobilestore/upload/userfiles/images/525.jpg', 0, 0, '', 0, 0, '<p>Với bề d&agrave;y chỉ 8.5 mm v&agrave; trọng lượng 150 g &ndash; đ&acirc;y l&agrave; một trong những smartphone mỏng v&agrave; nhẹ nhất hiện nay của h&atilde;ng.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 5 inch HD, sắc n&eacute;t , ch&acirc;n thực</strong></p>\r\n\r\n<p>Sở hữu m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải HD 720 c&ugrave;ng k&iacute;ch thước 5 inches cho chất lượng tốt, m&agrave;u sắc ch&acirc;n thực v&agrave; độ tương phản cao. Ngo&agrave;i ra, m&agrave;n h&igrave;nh&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-nokia" style="text-decoration: none; color: black; font-weight: bold;">Lumia 830&nbsp;</a>c&ograve;n được bảo vệ bởi mặt k&iacute;nh cường lực Gorilla Glass, vừa tạo vẻ sang trọng vừa tạo sự chắc chắn v&agrave; kh&aacute;c biệt trong qu&aacute; tr&igrave;nh sử dụng.</p>', '<p>Với bề d&agrave;y chỉ 8.5 mm v&agrave; trọng lượng 150 g &ndash; đ&acirc;y l&agrave; một trong những smartphone mỏng v&agrave; nhẹ nhất hiện nay của h&atilde;ng.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 5 inch HD, sắc n&eacute;t , ch&acirc;n thực</strong></p>\r\n\r\n<p>Sở hữu m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải HD 720 c&ugrave;ng k&iacute;ch thước 5 inches cho chất lượng tốt, m&agrave;u sắc ch&acirc;n thực v&agrave; độ tương phản cao. Ngo&agrave;i ra, m&agrave;n h&igrave;nh&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai-nokia" style="text-decoration: none; color: black; font-weight: bold;">Lumia 830&nbsp;</a>c&ograve;n được bảo vệ bởi mặt k&iacute;nh cường lực Gorilla Glass, vừa tạo vẻ sang trọng vừa tạo sự chắc chắn v&agrave; kh&aacute;c biệt trong qu&aacute; tr&igrave;nh sử dụng.</p>', 0, 1, 1, 'Nokia Lumia 525', 'Nokia Lumia 525', 'Nokia Lumia 525', 1, '2015-06-10 01:29:48', 1, '2015-06-10 01:38:05'),
(18, 'NOKIA LUMIA 1320', 'nokia-lumia-1320', 'nokia-lumia-1320', 2, 6800000, 7890000, 7, '', '', '/mobilestore/upload/userfiles/images/1320.jpg', 0, 0, '', 0, 0, '', '', 0, 0, 1, 'NOKIA LUMIA 1320', 'NOKIA LUMIA 1320', 'NOKIA LUMIA 1320', 1, '2015-06-10 01:30:59', 1, '2015-06-11 05:35:19');
INSERT INTO `itq_product` (`id`, `title`, `alias`, `route`, `categoryid`, `price`, `priceold`, `type-id`, `size`, `color`, `image`, `is_banner`, `is_right`, `images`, `buy-best`, `new`, `description`, `content`, `order`, `view`, `publish`, `meta-title`, `meta-keywords`, `meta-description`, `userid-created`, `creattime`, `userid-update`, `updatetime`) VALUES
(19, 'ASUS ZENFONE 5 - A501', 'asus-zenfone-5-a501', 'asus-zenfone-5-a501', 14, 3290000, 3390000, 7, '', '', '/mobilestore/upload/userfiles/images/asus1.jpg', 0, 0, '', 0, 0, '<p><strong>Thiết kế với m&agrave;u sắc tươi trẻ, năng động.<br />\r\n&bull; Hệ điều h&agrave;nh Android 4.3 Jelly Bean, giao diện ZenUL.<br />\r\n&bull; Bộ vi xử l&yacute; Atom Z2520, sức mạnh đ&aacute;ng nể .<br />\r\n&bull; Camera 8 chấm, ghi lại mọi khoảnh khắc .<br />\r\n&bull; M&agrave;n h&igrave;nh IPS, m&agrave;u sắc rực rỡ.</strong></p>', '<div>&nbsp;</div>\r\n\r\n<div>\r\n<div class="overalInfo" style="width: 1583px; margin: auto; padding: 15px 0px 40px; font-family: Tahoma, Arial, Verdana, sans-serif; font-size: 13.3333330154419px; line-height: normal; background: rgb(223, 223, 223);">\r\n<div class="wrap" style="display: table; width: 980px; min-width: 980px; margin: auto; padding: 0px 15px;">\r\n<div class="row" style="display: table-row;">\r\n<div style="display: table-cell; line-height: 24px;">\r\n<p><strong>Zenfone 5 l&agrave; chiếc smartphone của h&atilde;ng Asus thuộc ph&acirc;n kh&uacute;c tầm trung c&oacute; thiết kế tươi trẻ, bắt mắt với nhiều m&agrave;u sắc năng động, cấu h&igrave;nh vượt trội so với c&aacute;c sản phẩm kh&aacute;c c&ugrave;ng tầm gi&aacute; v&agrave; được trang bị hệ điều h&agrave;nh Android 4.3.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Thiết kế với m&agrave;u sắc tươi trẻ, năng động</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><a href="http://www.dienthoaididong.com/dien-thoai/asus-zenfone-5-cherry-red-cong-ty" style="text-decoration: none; color: black; font-weight: bold;">Zenfone 5</a>&nbsp;c&oacute; 5 lựa chọn m&agrave;u sắc: trắng, đen, v&agrave;ng, đỏ v&agrave; xanh da trời. ASUS cũng cung cấp th&ecirc;m nhiều lựa chọn t&ugrave;y biến kh&aacute;c cho Zenfone 5, gi&uacute;p cho chiếc smartphone n&agrave;y c&oacute; thể thực sự trở th&agrave;nh một lựa chọn hấp dẫn với người d&ugrave;ng trẻ tuổi. Ph&iacute;a dưới m&agrave;n h&igrave;nh l&agrave; c&aacute;c n&uacute;t bấm quen thuộc v&agrave; một dải v&acirc;n kim loại m&agrave;u bạc, dải v&acirc;n kim loại n&agrave;y sẽ gi&uacute;p Zenfone 5 trở n&ecirc;n nổi bật hơn nữa.</p>\r\n\r\n<p><br />\r\n<strong>M&agrave;n h&igrave;nh IPS, m&agrave;u sắc rực rỡ</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>M&agrave;n h&igrave;nh 5 inch của&nbsp;<a href="http://www.dienthoaididong.com/dien-thoai/asus-zenfone-5-cherry-red-cong-ty" style="text-decoration: none; color: black; font-weight: bold;">Zenfone 5</a>&nbsp;c&oacute; độ ph&acirc;n giải HD 1280 x 720 pixel. Nhờ được trang bị c&ocirc;ng nghệ m&agrave;n h&igrave;nh IPS, m&agrave;u sắc rực rỡ, sắc n&eacute;t v&agrave; g&oacute;c nh&igrave;n kh&aacute; rộng.</p>\r\n\r\n<p><br />\r\n<strong>Hệ điều h&agrave;nh Android 4.3 Jelly Bean, giao diện ZenUL</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><a href="http://www.dienthoaididong.com/dien-thoai/asus-zenfone-5-cherry-red-cong-ty" style="text-decoration: none; color: black; font-weight: bold;">Zenfone 5</a>&nbsp;được trang bị Android 4.3 Jelly Bean, một trong những điểm nhấn của d&ograve;ng sản phẩm Zenfone l&agrave; giao diện ZenUI do ASUS tự tay ph&aacute;t triển. Giao diện ZenUI đ&atilde; được đơn giản h&oacute;a từ giao diện gốc của Android 4.3 v&agrave; hoạt động kh&aacute; mượt m&agrave; tr&ecirc;n Zenfone 5. M&aacute;y nhận c&aacute;c cử chỉ cảm ứng kh&aacute; nhạy, tương đối vượt trội so với c&aacute;c smartphone kh&aacute;c trong tầm gi&aacute;.</p>\r\n\r\n<p><br />\r\n<strong>Bộ vi xử l&yacute; Atom Z2520, sức mạnh đ&aacute;ng nể</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>Zenfone 5 được trang bị vi xử l&yacute; Atom Z2520 hai nh&acirc;n 1.2GHz của Intel. Đ&acirc;y l&agrave; d&ograve;ng sản phẩm Atom cho sức mạnh rất đ&aacute;ng nể. Trong khi Atom Z2520 chắc chắn kh&ocirc;ng thể s&aacute;nh với c&aacute;c chip Snapdragon, vi xử l&yacute; của Intel vẫn c&oacute; đủ sức mạnh để thực hiện c&aacute;c t&aacute;c vụ căn bản tr&ecirc;n Zenfone 5 một c&aacute;ch mượt m&agrave;. Zenfone 5 được trang bị 2GB RAM, kh&aacute; đủ cho c&aacute;c t&aacute;c vụ th&ocirc;ng thường. Pin của m&aacute;y c&oacute; dung lượng 2.050 mAh, ở mức trung b&igrave;nh so với cấu h&igrave;nh của m&aacute;y.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Camera 8 chấm, ghi lại mọi khoảnh khắc</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>Zenfone 5 c&oacute; camera 8MP. Với khẩu độ l&ecirc;n tới f/2.0, cho bạn những bức h&igrave;nh đẹp mắt b&ecirc;n cạnh người th&acirc;n v&agrave; gia đ&igrave;nh. Ngo&agrave;i ra ASUS cũng đ&atilde; ra mắt c&ocirc;ng nghệ phần mềm PixelMaster gi&uacute;p hỗ trợ cải thiện h&igrave;nh ảnh chụp từ m&aacute;y ảnh n&agrave;y.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="techHeader" id="TechnicInfo" style="font-stretch: normal; font-size: 15pt; font-family: ''Myriad Pro Bold Condensed'', Tahoma, Arial, Verdana, sans-serif; text-transform: uppercase; height: 38px; line-height: 38px; background: rgb(193, 193, 193);">\r\n<div class="wrap" style="width: 980px; min-width: 980px; margin: auto; padding: 0px 15px;">\r\n<h3>TH&Ocirc;NG SỐ KỸ THUẬT</h3>\r\n</div>\r\n</div>\r\n\r\n<div class="techInfo" style="width: 1583px; margin: auto; padding: 15px 0px 25px; font-family: Tahoma, Arial, Verdana, sans-serif; font-size: 13.3333330154419px; line-height: normal; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n<div class="wrap" style="display: table; width: 980px; min-width: 980px; margin: auto; padding: 0px 15px;">\r\n<div class="row" style="display: table-row;">\r\n<div class="leftColumn" style="display: table-cell; line-height: 24px; width: 215px;">&nbsp;</div>\r\n\r\n<div style="display: table-cell; line-height: 24px;">\r\n<div class="techSummary" style="border-top-width: 1px; border-top-style: solid; border-top-color: rgb(51, 51, 51); margin: 10px 0px 35px; background: rgb(246, 246, 246);">\r\n<table cellpadding="0" cellspacing="0" style="background-attachment:initial; background-clip:initial; background-image:initial; background-origin:initial; background-position:initial; background-repeat:initial; background-size:initial; margin:auto; width:765px">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan="6">Tổng quan</td>\r\n			<td>Mạng 2G</td>\r\n			<td>GSM 850/900/1800/1900</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mạng 3G</td>\r\n			<td>HSDPA 850/900/1900/2100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SIM</td>\r\n			<td>Micro SIM, 2 SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng bố</td>\r\n			<td>Th&aacute;ng 1/2014</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ph&aacute;t h&agrave;nh</td>\r\n			<td>Q1/2014</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ng&ocirc;n ngữ</td>\r\n			<td>Đa ng&ocirc;n ngữ (c&oacute; tiếng Việt)</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="5">Camera</td>\r\n			<td>Độ ph&acirc;n giải</td>\r\n			<td>8 MP; 3264 x 2448 pixels</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Led flash</td>\r\n			<td>Led flash</td>\r\n		</tr>\r\n		<tr>\r\n			<td>T&iacute;nh năng</td>\r\n			<td>Tự động lấy n&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quay video</td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera phụ</td>\r\n			<td>2MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="6">M&agrave;n h&igrave;nh</td>\r\n			<td>C&ocirc;ng nghệ</td>\r\n			<td>IPS; 16 triệu m&agrave;u</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước</td>\r\n			<td>5.0 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ph&acirc;n giải</td>\r\n			<td>720 x 1280 pixels</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mật độ điểm ảnh</td>\r\n			<td>294 ppi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cảm ứng đa điểm</td>\r\n			<td>Cảm ứng điện dung</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mặt k&iacute;nh</td>\r\n			<td>Corning Gorilla Glass 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="4">Thiết kế</td>\r\n			<td>K&iacute;ch thước (mm)</td>\r\n			<td>148.2 x 72.8 x 5.5-10.3 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khối lượng (gram)</td>\r\n			<td>145 g</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td>Nhựa cao cấp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>V&agrave;ng, Đen, Đỏ, T&iacute;m, Trắng</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="2">&Acirc;m thanh</td>\r\n			<td>Loa ngo&agrave;i</td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jack 3.5mm</td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="3">Bộ nhớ</td>\r\n			<td>Khe cắm thẻ nhớ</td>\r\n			<td>MicroSD l&ecirc;n tới 64GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td>8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>2GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="8">Xử l&yacute;</td>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Android</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chipset</td>\r\n			<td>Intel Atom Z2520</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Dual-core 1.2 GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>GPU</td>\r\n			<td>PowerVR SGX544MP2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cảm biến</td>\r\n			<td>Gia tốc; Tiệm cận</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tin nhắn</td>\r\n			<td>SMS(threaded view); MMS; Email; Push Mail; IM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tr&igrave;nh duyệt web</td>\r\n			<td>HTML</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Java</td>\r\n			<td>via Java MIDP emulator</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="10">Dữ liệu v&agrave; kết nối</td>\r\n			<td>2G - GPRS</td>\r\n			<td>Class 12 (4+1/3+2/2+3/1+4 slots); 32 - 48 kbps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2G - EDGE</td>\r\n			<td>Class 12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3G - Download/Upload</td>\r\n			<td>42.2 Mbps/5.76 Mbps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>WLAN</td>\r\n			<td>Wi-Fi 802.11 b/g/n; Wi-Fi Direct; Wi-Fi hotspot</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bluetooth</td>\r\n			<td>Bluetooth with A2DP, v4.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NFC</td>\r\n			<td>Kh&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cổng hồng ngoại</td>\r\n			<td>Kh&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>USB</td>\r\n			<td>MicroUSB v2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Radio</td>\r\n			<td>Kh&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>GPS</td>\r\n			<td>TBD</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="1">Pin</td>\r\n			<td>Dung lượng pin</td>\r\n			<td>Li-Po 2110 mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="6">T&iacute;nh năng kh&aacute;c</td>\r\n			<td>Định dạng &acirc;m thanh</td>\r\n			<td>MP3/ WAV/ eAAC+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng video</td>\r\n			<td>MP4/ H.263/ H.264</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xử l&yacute; h&igrave;nh ảnh</td>\r\n			<td>Xem/Bi&ecirc;n tập h&igrave;nh ảnh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Xử l&yacute; văn bản</td>\r\n			<td>Đọc văn bản; Tổ chức c&ocirc;ng việc; Đo&aacute;n chữ th&ocirc;ng minh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ra lệnh bằng giọng n&oacute;i</td>\r\n			<td>Ghi &acirc;m/ Quay số bằng giọng n&oacute;i</td>\r\n		</tr>\r\n		<tr>\r\n			<td>T&iacute;ch hợp mạng x&atilde; hội</td>\r\n			<td>SNS integration</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 0, 0, 1, 'Asus FonePad 7', 'Zenfone 5 là chiếc smartphone của hãng Asus thuộc phân khúc tầm trung có thiết kế tươi trẻ, bắt mắt với nhiều màu sắc năng động, cấu hình vượt trội so với các sản phẩm khác cùng tầm giá và được trang bị hệ điều hành Android 4.3.   Asus Zenfone 5  Thiết kế', 'Zenfone 5 là chiếc smartphone của hãng Asus thuộc phân khúc tầm trung có thiết kế tươi trẻ, bắt mắt với nhiều màu sắc năng động, cấu hình vượt trội so với các sản phẩm khác cùng tầm giá và được trang bị hệ điều hành Android 4.3.   Asus Zenfone 5  Thiết kế', 1, '2015-06-10 01:35:13', 1, '2015-06-11 05:35:00'),
(20, 'ASUS ZENFONE 6 - A601', 'asus-zenfone-6-a601', 'asus-zenfone-6-a601', 14, 4900000, 5900000, 7, '', '', '/mobilestore/upload/userfiles/images/asus10.jpg', 0, 0, '', 0, 0, '<p><strong>Thiết kế với m&agrave;u sắc tươi trẻ, năng động.<br />\r\n&bull; Hệ điều h&agrave;nh Android 4.3 Jelly Bean, giao diện ZenUL.<br />\r\n&bull; Bộ vi xử l&yacute; Intel Atom Z2560, sức mạnh đ&aacute;ng nể .<br />\r\n&bull; Camera 13 chấm, đ&egrave;n led Flash, ghi lại mọi khoảnh khắc .<br />\r\n&bull; M&agrave;n h&igrave;nh IPS, m&agrave;u sắc rực rỡ.</strong></p>', '<p><strong>Thiết kế với m&agrave;u sắc tươi trẻ, năng động.<br />\r\n&bull; Hệ điều h&agrave;nh Android 4.3 Jelly Bean, giao diện ZenUL.<br />\r\n&bull; Bộ vi xử l&yacute; Intel Atom Z2560, sức mạnh đ&aacute;ng nể .<br />\r\n&bull; Camera 13 chấm, đ&egrave;n led Flash, ghi lại mọi khoảnh khắc .<br />\r\n&bull; M&agrave;n h&igrave;nh IPS, m&agrave;u sắc rực rỡ.</strong></p>', 0, 2, 1, 'ASUS ZENFONE 6 - A601', 'ASUS ZENFONE 6 - A601', 'ASUS ZENFONE 6 - A601', 1, '2015-06-10 01:36:21', 1, '2015-06-11 05:35:47'),
(21, 'ASUS ZENFONE 4', 'asus-zenfone-4', 'asus-zenfone-4', 2, 1500000, 1900000, 7, '', '', '/mobilestore/upload/userfiles/images/asus6.jpg', 0, 0, '', 0, 0, '', '', 0, 2, 1, 'ASUS ZENFONE 4', 'ASUS ZENFONE 4', 'ASUS ZENFONE 4', 1, '2015-06-10 01:37:10', 1, '2015-06-11 05:35:35'),
(22, 'SAMSUNG GALAXY E7 - E700', 'samsung-galaxy-e7-e700', 'samsung-galaxy-e7-e700', 11, 0, 0, 7, '', '', '/mobilestore/upload/userfiles/images/0baa9f64-6568-4c3c-8a79-7afbeb973727.jpg', 0, 0, '', 0, 1, '', '', 0, 3, 1, 'SAMSUNG GALAXY E7 - E700', 'SAMSUNG GALAXY E7 - E700', 'SAMSUNG GALAXY E7 - E700', 1, '2015-06-10 01:41:04', 1, '2015-06-11 05:35:27'),
(23, 'SAMSUNG GALAXY NOTE 4 - N910', 'samsung-galaxy-note-4-n910', 'samsung-galaxy-note-4-n910', 11, 130000000, 15000000, 7, '', '', '/mobilestore/upload/userfiles/images/Note-4.jpg', 0, 0, '', 0, 1, '', '', 0, 4, 1, 'SAMSUNG GALAXY NOTE 4 - N910', 'SAMSUNG GALAXY NOTE 4 - N910', 'SAMSUNG GALAXY NOTE 4 - N910', 1, '2015-06-10 01:43:34', 1, '2015-06-11 05:34:44'),
(24, 'SAMSUNG GALAXY S IV - I9500', 'samsung-galaxy-s-iv-i9500', 'samsung-galaxy-s-iv-i9500', 11, 7999000, 8300000, 7, '', '', '/mobilestore/upload/userfiles/images/sam-sung-galaxy-s6-1.jpg', 0, 0, '', 0, 1, '<p><strong>&nbsp;M&agrave;n h&igrave;nh sắc n&eacute;t Full HD.Vi xử l&yacute; tốc độ cao.<br />\r\n&bull; Quay phim v&agrave; chụp ảnh từ 2 camera c&ugrave;ng l&uacute;c&nbsp;(Dual Shot).<br />\r\n&bull; Hỗ trợ cử chỉ v&agrave; điều khiển bằng mắt.<br />\r\n&bull; Ng&ocirc;n ngữ kh&ocirc;ng c&ograve;n l&agrave; r&agrave;o cản với chức năng tự dịch th&ocirc;ng minh.<br />\r\n&bull; T&iacute;nh năng chụp ảnh c&ugrave;ng &acirc;m thanh th&uacute; vị.</strong></p>', '<p><strong>&nbsp;M&agrave;n h&igrave;nh sắc n&eacute;t Full HD.Vi xử l&yacute; tốc độ cao.<br />\r\n&bull; Quay phim v&agrave; chụp ảnh từ 2 camera c&ugrave;ng l&uacute;c&nbsp;(Dual Shot).<br />\r\n&bull; Hỗ trợ cử chỉ v&agrave; điều khiển bằng mắt.<br />\r\n&bull; Ng&ocirc;n ngữ kh&ocirc;ng c&ograve;n l&agrave; r&agrave;o cản với chức năng tự dịch th&ocirc;ng minh.<br />\r\n&bull; T&iacute;nh năng chụp ảnh c&ugrave;ng &acirc;m thanh th&uacute; vị.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;M&agrave;n h&igrave;nh sắc n&eacute;t Full HD.Vi xử l&yacute; tốc độ cao.<br />\r\n&bull; Quay phim v&agrave; chụp ảnh từ 2 camera c&ugrave;ng l&uacute;c&nbsp;(Dual Shot).<br />\r\n&bull; Hỗ trợ cử chỉ v&agrave; điều khiển bằng mắt.<br />\r\n&bull; Ng&ocirc;n ngữ kh&ocirc;ng c&ograve;n l&agrave; r&agrave;o cản với chức năng tự dịch th&ocirc;ng minh.<br />\r\n&bull; T&iacute;nh năng chụp ảnh c&ugrave;ng &acirc;m thanh th&uacute; vị.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;M&agrave;n h&igrave;nh sắc n&eacute;t Full HD.Vi xử l&yacute; tốc độ cao.<br />\r\n&bull; Quay phim v&agrave; chụp ảnh từ 2 camera c&ugrave;ng l&uacute;c&nbsp;(Dual Shot).<br />\r\n&bull; Hỗ trợ cử chỉ v&agrave; điều khiển bằng mắt.<br />\r\n&bull; Ng&ocirc;n ngữ kh&ocirc;ng c&ograve;n l&agrave; r&agrave;o cản với chức năng tự dịch th&ocirc;ng minh.<br />\r\n&bull; T&iacute;nh năng chụp ảnh c&ugrave;ng &acirc;m thanh th&uacute; vị.</strong></p>', 0, 1, 1, 'SAMSUNG GALAXY S IV - I9500', 'SAMSUNG GALAXY S IV - I9500', 'SAMSUNG GALAXY S IV - I9500', 1, '2015-06-10 01:45:28', 1, '2015-06-11 05:34:52'),
(25, 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'apple-watch-sport-42mm-space-gray-aluminum-black', 'apple-watch-sport-42mm-space-gray-aluminum-black', 21, 15000000, 17000000, 7, '', '', '/mobilestore/upload/userfiles/images/apple-watch-sport-2.jpg', 0, 0, '', 0, 0, '<h1>APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK</h1>', '<h1>APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACKAPPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK</h1>', 0, 0, 0, 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 'APPLE WATCH SPORT 42MM SPACE GRAY ALUMINUM BLACK', 1, '2015-07-03 10:16:35', 0, '0000-00-00 00:00:00'),
(26, 'APPLE WATCH SPORT 38MM SILVER ALUMINUM GREEN', 'apple-watch-sport-38mm-silver-aluminum-green', 'apple-watch-sport-38mm-silver-aluminum-green', 21, 15000000, 17999000, 7, '', '', '/mobilestore/upload/userfiles/images/apple-watch-sport-1.jpg', 0, 0, '', 0, 0, '<h1>APPLE WATCH SPORT 38MM SILVER ALUMINUM GREENAPPLE WATCH SPORT 38MM SILVER ALUMINUM GREENAPPLE WATCH SPORT 38MM SILVER ALUMINUM GREEN</h1>', '<h1>APPLE WATCH SPORT 38MM SILVER ALUMINUM GREENAPPLE WATCH SPORT 38MM SILVER ALUMINUM GREENAPPLE WATCH SPORT 38MM SILVER ALUMINUM GREEN</h1>', 0, 0, 0, 'APPLE WATCH SPORT 38MM SILVER ALUMINUM GREEN', 'APPLE WATCH SPORT 38MM SILVER ALUMINUM GREEN', 'APPLE WATCH SPORT 38MM SILVER ALUMINUM GREEN', 1, '2015-07-03 10:17:21', 0, '0000-00-00 00:00:00'),
(27, 'APPLE WATCH 38MM STAINLESS STEEL MILANESE LOOP', 'apple-watch-38mm-stainless-steel-milanese-loop', 'apple-watch-38mm-stainless-steel-milanese-loop', 21, 12000000, 15000000, 7, '', '', '/mobilestore/upload/userfiles/images/apple-watch-sport-1.jpg', 0, 0, '', 0, 0, '<h1>APPLE WATCH 38MM STAINLESS STEEL MILANESE LOOPAPPLE WATCH 38MM STAINLESS STEEL MILANESE LOOP</h1>', '<h1>APPLE WATCH 38MM STAINLESS STEEL MILANESE LOOPAPPLE WATCH 38MM STAINLESS STEEL MILANESE LOOPAPPLE WATCH 38MM STAINLESS STEEL MILANESE LOOP</h1>', 0, 0, 0, 'APPLE WATCH 38MM STAINLESS STEEL MILANESE LOOP', 'APPLE WATCH 38MM STAINLESS STEEL MILANESE LOOP', 'APPLE WATCH 38MM STAINLESS STEEL MILANESE LOOP', 1, '2015-07-03 10:18:07', 0, '0000-00-00 00:00:00'),
(28, 'APPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLE', 'apple-watch-38mm-stainless-steel-soft-pink-modern-buckle', 'apple-watch-38mm-stainless-steel-soft-pink-modern-buckle', 21, 1300000000, 123000, 7, '', '', '/mobilestore/upload/userfiles/images/apple-watch-sport-4.jpg', 0, 0, '', 0, 0, '<h1>APPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLE</h1>', '<h1>APPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLE</h1>', 0, 0, 0, 'APPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLEAPPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLE', 'APPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLE', 'APPLE WATCH 38MM STAINLESS STEEL SOFT PINK MODERN BUCKLE', 1, '2015-07-03 10:19:00', 0, '0000-00-00 00:00:00'),
(29, 'Galaxy Grear1', 'galaxy-grear1', 'galaxy-grear1', 22, 12000000, 15000000, 7, '', '', '/mobilestore/upload/userfiles/images/GALAXY-GEAR.jpg', 0, 0, '', 0, 0, '<p>Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1</p>', '<p>Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1</p>', 0, 0, 0, 'Galaxy Grear1', 'Galaxy Grear1', 'Galaxy Grear1', 1, '2015-07-03 10:26:29', 0, '0000-00-00 00:00:00'),
(30, 'Galaxy Grear2', 'galaxy-grear2', 'galaxy-grear2', 22, 0, 0, 7, '', '', '/mobilestore/upload/userfiles/images/GALAXY-GEAR2.jpg', 0, 0, '', 0, 0, '<p>Galaxy Grear1Galaxy Grear1</p>', '<p>Galaxy Grear1Galaxy Grear1Galaxy Grear1</p>', 0, 0, 0, 'Galaxy Grear1', 'Galaxy Grear1', 'Galaxy Grear1', 1, '2015-07-03 10:27:01', 1, '2015-07-03 11:51:03'),
(31, 'Galaxy Grear3', 'galaxy-grear3', 'galaxy-grear3', 22, 17999000, 29990000, 7, '', '', '/mobilestore/upload/userfiles/images/apple-watch-sport-7.jpg', 0, 0, '', 0, 0, '<p>Galaxy Grear1Galaxy Grear1Galaxy Grear1</p>', '<p>Galaxy Grear1Galaxy Grear1Galaxy Grear1Galaxy Grear1</p>', 0, 0, 0, 'Galaxy Grear1', 'Galaxy Grear1', 'Galaxy Grear1', 1, '2015-07-03 10:27:45', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `itq_product_category`
--

CREATE TABLE IF NOT EXISTS `itq_product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itq_product_category`
--

INSERT INTO `itq_product_category` (`product_id`, `category_id`) VALUES
(4, 7),
(4, 9),
(5, 10),
(5, 11),
(6, 10),
(6, 12),
(8, 10),
(8, 13),
(9, 7),
(9, 10),
(9, 12),
(10, 10),
(10, 12),
(11, 12),
(12, 12),
(14, 13),
(15, 10),
(15, 13),
(16, 13),
(17, 10),
(17, 13),
(23, 7),
(23, 10),
(23, 11),
(24, 7),
(24, 10),
(24, 11),
(19, 7),
(19, 10),
(19, 14),
(18, 7),
(18, 10),
(18, 13),
(22, 7),
(22, 10),
(22, 11),
(21, 7),
(21, 10),
(21, 14),
(20, 7),
(20, 10),
(20, 14),
(3, 7),
(3, 11),
(3, 9),
(3, 12),
(2, 7),
(2, 10),
(2, 9),
(1, 7),
(1, 9),
(25, 20),
(25, 21),
(26, 20),
(26, 21),
(27, 20),
(27, 21),
(28, 16),
(28, 19),
(28, 20),
(28, 21),
(29, 20),
(29, 22),
(31, 11),
(31, 20),
(31, 22),
(30, 20),
(30, 22);

-- --------------------------------------------------------

--
-- Table structure for table `itq_sumview`
--

CREATE TABLE IF NOT EXISTS `itq_sumview` (
  `id` int(11) NOT NULL,
  `sumview` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itq_sumview`
--

INSERT INTO `itq_sumview` (`id`, `sumview`) VALUES
(0, 428);

-- --------------------------------------------------------

--
-- Table structure for table `itq_type`
--

CREATE TABLE IF NOT EXISTS `itq_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `itq_type`
--

INSERT INTO `itq_type` (`id`, `title`) VALUES
(7, 'nhập khẩu'),
(8, 'Nội địa');

-- --------------------------------------------------------

--
-- Table structure for table `itq_type_category`
--

CREATE TABLE IF NOT EXISTS `itq_type_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itq_type_category`
--

INSERT INTO `itq_type_category` (`id`, `title`) VALUES
(11, 'sản phẩm'),
(22, 'bài đăng'),
(33, 'liên hệ');

-- --------------------------------------------------------

--
-- Table structure for table `itq_user`
--

CREATE TABLE IF NOT EXISTS `itq_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `salt` text COLLATE utf8_unicode_ci NOT NULL,
  `groupid` int(10) NOT NULL DEFAULT '2',
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `iploggin` text COLLATE utf8_unicode_ci NOT NULL,
  `forgot_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usercreat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` text COLLATE utf8_unicode_ci NOT NULL,
  `logintime` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `itq_user`
--

INSERT INTO `itq_user` (`id`, `username`, `password`, `email`, `salt`, `groupid`, `fullname`, `iploggin`, `forgot_code`, `forgot_time`, `usercreat`, `creattime`, `updatetime`, `logintime`) VALUES
(1, 'buiquangquyet', 'd7cec278e421d473e1fc710424a96d70', 'buiquangquyet@gmail.com', 'IicAFky7H65OzR0x0vatkknUGQATCWoyZsqH9nJUN9byv9E6cQv5WBndMetOWqec13L80', 1, 'Bùi Quang Quyết', '::1', '', '', '', '2015-07-03 03:06:26', '', '2015-07-03 10:06:26'),
(2, 'administrator', 'b2c37c4677a7311023c9b0ae934724eb', 'quangquyet.hubt@gmail.com', '0dm3pwyUt1Dvroos3pNE7R9R7PS7Q2fUjRNnjBUxUoxCnFMIWAV0KT2uRBm3cKXef4WZE', 1, 'administrator', '::1', '', '', 'buiquangquyet', '2015-03-11 15:38:51', '2015-03-11 15:36:54', '2015-03-11 22:38:51'),
(7, 'user123', '5897a1fbe9e76fbd42238b3453632cf0', 'user1@gmail.com', 'eUVu9J86hjCjuhaav53e3go7I0hE2fCjHkYLEolNpVtqYvMF6j0jUuZHCGOpJ58vEprIg', 23, 'user1', '::1', '', '', 'buiquangquyet', '2015-02-15 21:01:15', '2015-02-16 03:48:51', '2015-02-16 04:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `salt` text COLLATE utf8_unicode_ci NOT NULL,
  `groupid` int(10) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `iploggin` text COLLATE utf8_unicode_ci NOT NULL,
  `creattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` text COLLATE utf8_unicode_ci NOT NULL,
  `logintime` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `salt`, `groupid`, `fullname`, `iploggin`, `creattime`, `updatetime`, `logintime`) VALUES
(1, 'admin', '123456', 'admin@admin.com', '', 1, 'Admin', '', '2015-01-15 07:33:56', '', ''),
(2, 'quyet', '13265', '132132132', 'asdasdasd', 0, '', '', '2015-01-19 16:34:05', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
