-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 02 月 23 日 02:15
-- 服务器版本: 5.0.83
-- PHP 版本: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cnly_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `cnly_admin`
--

CREATE TABLE IF NOT EXISTS `cnly_admin` (
  `id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(50) default NULL,
  `admin_pwd` varchar(50) default NULL,
  `admin_type` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `admin_name` (`admin_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `cnly_admin`
--

INSERT INTO `cnly_admin` (`id`, `admin_name`, `admin_pwd`, `admin_type`) VALUES
(1, 'admin', '3ed223fe06e106eff64820201f402eac', '1');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_baoming`
--

CREATE TABLE IF NOT EXISTS `cnly_baoming` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(10) default NULL,
  `sex` varchar(10) default NULL,
  `age` varchar(10) default NULL,
  `height` varchar(10) default NULL,
  `weight` varchar(10) default NULL,
  `classobj` varchar(100) default NULL,
  `phone` varchar(100) default NULL,
  `address` varchar(100) default NULL,
  `content` text,
  `add_time` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cnly_baoming`
--

INSERT INTO `cnly_baoming` (`id`, `name`, `sex`, `age`, `height`, `weight`, `classobj`, `phone`, `address`, `content`, `add_time`) VALUES
(2, '马瑜遥', '女', '22', '172', '55', '计算机专业', '029-88662010', '山东省临沂市', '性格开朗，善于交友！', '2017-02-12 14:16:46');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_class`
--

CREATE TABLE IF NOT EXISTS `cnly_class` (
  `id` int(11) NOT NULL auto_increment,
  `class_name` varchar(50) default NULL,
  `eng_name` varchar(100) default NULL,
  `class_order` int(11) default '255',
  `pid` int(11) default '0',
  `display` int(1) default '1',
  `cover_pic` varchar(100) default NULL,
  `ps_time` varchar(50) default NULL,
  `type` varchar(50) default NULL,
  `gjc` varchar(500) default NULL,
  `jj` varchar(500) default NULL,
  `leixing` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=702 ;

--
-- 转存表中的数据 `cnly_class`
--

INSERT INTO `cnly_class` (`id`, `class_name`, `eng_name`, `class_order`, `pid`, `display`, `cover_pic`, `ps_time`, `type`, `gjc`, `jj`, `leixing`) VALUES
(570, '休闲娱乐', NULL, 9, 0, 0, 'uploadfile/1393300445.jpg', NULL, 'rl', '', '', 'news'),
(535, '旅游景点', NULL, 1, 486, 0, NULL, NULL, 'mtbd', NULL, NULL, 'product'),
(661, '旅游购物', NULL, 1, 490, 0, NULL, NULL, 'lxww', NULL, NULL, 'news'),
(553, '特色美食', NULL, 1, 551, 0, NULL, NULL, 'hbsb', NULL, NULL, 'news'),
(524, '旅游酒店', NULL, 1, 552, 0, NULL, NULL, 'zxns', NULL, NULL, 'news'),
(687, '旅游季节', NULL, 2, 483, 0, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(490, '购物', 'Shopping', 8, 0, 0, 'uploadfile/1393300437.jpg', NULL, 'lxww', '', '', 'news'),
(552, '酒店', NULL, 5, 0, 0, 'uploadfile/1393300417.jpg', NULL, 'zxns', '', '', 'news'),
(486, '景点', NULL, 4, 0, 0, 'uploadfile/1393300409.jpg', NULL, 'mtbd', '', '', 'product'),
(483, '城市简介', NULL, 1, 0, 0, 'uploadfile/1393300395.jpg', NULL, 'jsxx', '', '', 'about'),
(238, '轮播管理', NULL, 255, 0, 0, NULL, NULL, 'lunbo', NULL, NULL, NULL),
(572, '休闲娱乐', NULL, 1, 570, 0, NULL, NULL, 'rl', NULL, NULL, 'news'),
(509, '友情管理', NULL, 50, 0, 0, NULL, NULL, 'yqgl', NULL, NULL, NULL),
(510, '友情链接', NULL, 1, 509, 0, NULL, NULL, 'yqgl', NULL, NULL, NULL),
(551, '特产美食', NULL, 6, 0, 0, 'uploadfile/1393300426.jpg', NULL, 'hbsb', '', '', 'news'),
(678, '旅游小知识', NULL, 1, 622, 0, NULL, NULL, 'spkt', NULL, NULL, 'news'),
(671, '首页轮播', NULL, 1, 238, 0, NULL, NULL, 'lunbo', NULL, NULL, 'about'),
(691, '旅游动态', NULL, 2, 571, 0, NULL, NULL, 'lx', NULL, NULL, 'news'),
(692, '城市概况', NULL, 3, 483, 0, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(693, '文化历史', NULL, 4, 483, 0, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(624, '气候地理', NULL, 1, 483, 0, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(622, '旅游小知识', NULL, 10, 0, 0, 'uploadfile/1393300457.jpg', NULL, 'spkt', '', '', 'news'),
(571, '旅游动态', NULL, 11, 0, 0, NULL, NULL, 'lx', NULL, NULL, 'news'),
(690, '公司动态', NULL, 3, 571, 0, NULL, NULL, 'lx', NULL, NULL, 'news'),
(694, '公告栏', NULL, 1, 571, 0, NULL, NULL, 'lx', NULL, NULL, 'news'),
(590, '旅游六元素', '', 12, 0, 0, NULL, NULL, 'shbt', NULL, NULL, 'news'),
(696, '吃', '', 1, 590, 0, NULL, NULL, 'shbt', NULL, NULL, 'news'),
(697, '住', '', 2, 590, 0, NULL, NULL, 'shbt', NULL, NULL, 'news'),
(698, '行', '', 3, 590, 0, NULL, NULL, 'shbt', NULL, NULL, 'news'),
(699, '游', '', 4, 590, 0, NULL, NULL, 'shbt', NULL, NULL, 'news'),
(700, '购', '', 5, 590, 0, NULL, NULL, 'shbt', NULL, NULL, 'news'),
(701, '娱', '', 6, 590, 0, NULL, NULL, 'shbt', NULL, NULL, 'news');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_config`
--

CREATE TABLE IF NOT EXISTS `cnly_config` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(250) default NULL,
  `description` varchar(250) default NULL,
  `keywords` varchar(250) default NULL,
  `company` varchar(250) default NULL,
  `domain` varchar(250) default NULL,
  `author` varchar(250) default NULL,
  `jingtai` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `cnly_config`
--

INSERT INTO `cnly_config` (`id`, `title`, `description`, `keywords`, `company`, `domain`, `author`, `jingtai`) VALUES
(54, '山东临沂旅游网', '山东临沂旅游网', '山东临沂旅游网', '山东临沂旅游网', '', '山东临沂旅游网', 0);

-- --------------------------------------------------------

--
-- 表的结构 `cnly_content`
--

CREATE TABLE IF NOT EXISTS `cnly_content` (
  `id` int(11) NOT NULL auto_increment,
  `xiazaiid` int(11) default NULL,
  `brand_id` int(11) default NULL,
  `new` int(11) default NULL,
  `recommend` int(11) default NULL,
  `promotion` int(11) default NULL,
  `cat_id` int(11) default NULL,
  `news_title` varchar(250) default NULL,
  `news_desc` varchar(1000) default NULL,
  `news_content` longtext,
  `add_time` datetime default NULL,
  `img_thumb` varchar(400) default NULL,
  `small_img` varchar(100) default NULL,
  `news_url` varchar(100) default NULL,
  `type` int(11) default NULL,
  `news_order` int(11) default '255',
  `news_src` varchar(200) default NULL,
  `file_url` varchar(200) default NULL,
  `tuijian` varchar(20) NOT NULL default 'no',
  `laiyuan` varchar(200) default NULL,
  `fbr` varchar(100) default NULL,
  `zhuanye` varchar(100) default NULL,
  `zhiwei` varchar(100) default NULL,
  `danwei` varchar(100) default NULL,
  `hit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=561 ;

--
-- 转存表中的数据 `cnly_content`
--

INSERT INTO `cnly_content` (`id`, `xiazaiid`, `brand_id`, `new`, `recommend`, `promotion`, `cat_id`, `news_title`, `news_desc`, `news_content`, `add_time`, `img_thumb`, `small_img`, `news_url`, `type`, `news_order`, `news_src`, `file_url`, `tuijian`, `laiyuan`, `fbr`, `zhuanye`, `zhiwei`, `danwei`, `hit`) VALUES
(560, NULL, NULL, NULL, NULL, NULL, 510, '临沂市旅游攻略', '', '', '2017-02-21 08:36:05', '', NULL, 'http://', 3, 255, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cnly_guestbook`
--

CREATE TABLE IF NOT EXISTS `cnly_guestbook` (
  `id` int(11) NOT NULL auto_increment,
  `book_type` varchar(50) default NULL,
  `book_title` varchar(100) default NULL,
  `book_connect` varchar(250) default NULL,
  `book_time` datetime default NULL,
  `book_qq` varchar(50) default NULL,
  `book_email` varchar(50) default NULL,
  `book_name` varchar(50) default NULL,
  `book_ifcheck` int(1) default '0',
  `book_restore` varchar(250) default NULL,
  `is_show` int(11) default '0',
  `book_dianhua` varchar(100) default NULL,
  `book_address` varchar(200) default NULL,
  `book_zhiye` varchar(200) default NULL,
  `book_sex` varchar(20) default NULL,
  `book_age` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- 转存表中的数据 `cnly_guestbook`
--

INSERT INTO `cnly_guestbook` (`id`, `book_type`, `book_title`, `book_connect`, `book_time`, `book_qq`, `book_email`, `book_name`, `book_ifcheck`, `book_restore`, `is_show`, `book_dianhua`, `book_address`, `book_zhiye`, `book_sex`, `book_age`) VALUES
(82, NULL, NULL, '这个网站很不错哦！！！', '2017-04-21 17:13:16', NULL, NULL, '李兴部', 0, NULL, 0, '123243432', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cnly_jiaose`
--

CREATE TABLE IF NOT EXISTS `cnly_jiaose` (
  `id` int(11) NOT NULL auto_increment,
  `jiaose_name` varchar(100) NOT NULL,
  `jiaose_quanxian` text NOT NULL,
  `jiaose_left` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `cnly_jiaose`
--

INSERT INTO `cnly_jiaose` (`id`, `jiaose_name`, `jiaose_quanxian`, `jiaose_left`) VALUES
(1, '超级管理员', 'a:4:{i:0;s:1:"2";i:1;s:3:"225";i:2;s:1:"3";i:3;s:1:"1";}', 'a:10:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"4";i:3;s:1:"7";i:4;s:1:"8";i:5;s:1:"9";i:6;s:2:"10";i:7;s:2:"11";i:8;s:2:"12";i:9;s:2:"13";}'),
(5, '业务员', '', 'a:2:{i:0;s:2:"17";i:1;s:2:"27";}');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_left`
--

CREATE TABLE IF NOT EXISTS `cnly_left` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `url` varchar(50) default NULL,
  `menu_order` int(11) default NULL,
  `is_show` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `cnly_left`
--

INSERT INTO `cnly_left` (`id`, `name`, `url`, `menu_order`, `is_show`) VALUES
(1, '城市简介', 'news_list.php', 1, '1'),
(2, 'FAQ问答', 'px_list.php', 8, '0'),
(4, '在线报名', 'baoming.php', 252, '0'),
(7, '友情链接', 'friendly_list.php', 249, '1'),
(8, '数据备份', 'databak/backup.php', 8, '0'),
(9, '数据恢复', 'databak/restore.php', 9, '0'),
(10, '栏目分类', 'class.php', 250, '1'),
(11, '站点设置', 'web_config.php', 255, '1'),
(12, '用户管理', 'admin_list.php', 254, '1'),
(13, '角色管理', 'jiaose.php', 13, '0'),
(14, '菜单管理', 'menu.php', 14, '0'),
(17, '会员管理', 'user_list.php', 6, '0'),
(16, '下载专区', 'down_list.php', 4, '0'),
(15, '旅游动态', 'lxww_list.php', 8, '1'),
(18, '专栏', 'zp_list.php', 9, '0'),
(19, '轮播管理', 'lunbo_list.php', 251, '1'),
(20, '酒店', 'wj_list.php', 3, '1'),
(21, '在线留言', 'guestbook.php', 253, '1'),
(22, '网站公告', 'notic_list.php', 8, '0'),
(23, '品牌管理', 'brand_list.php', 4, '0'),
(24, '景点', 'zt_list.php', 2, '1'),
(27, '业绩管理', 'performance_list.php', 6, '0'),
(28, '员工表现', 'biaoxian.php', 7, '0'),
(29, '旅游小知识', 'sp_list.php', 7, '1'),
(30, '旅游六元素', 'bt_list.php', 9, '1'),
(31, ' 特产美食', 'ych_list.php', 4, '1'),
(32, '休闲娱乐', 'rl_list.php', 6, '1'),
(33, '在线考试', 'lx_list.php', 5, '0'),
(34, '购物', 'sj_list.php', 5, '1');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_member`
--

CREATE TABLE IF NOT EXISTS `cnly_member` (
  `memberid` int(12) NOT NULL auto_increment,
  `membertypeid` int(3) default NULL,
  `memberprop` tinyint(1) NOT NULL default '0',
  `user` varchar(30) default NULL,
  `password` varchar(50) default NULL,
  `usertype` tinyint(1) default NULL,
  `company` varchar(255) default NULL,
  `contact` varchar(255) default NULL,
  `number` varchar(20) default NULL,
  `money` varchar(11) default NULL,
  `moneytype` tinyint(1) default NULL,
  `companynature` int(10) default NULL,
  `companytype` tinyint(2) NOT NULL default '0',
  `companydate` varchar(12) NOT NULL default '',
  `collegedate` varchar(30) NOT NULL default '',
  `address` varchar(255) default NULL,
  `telephone` varchar(255) default NULL,
  `mobile` varchar(13) NOT NULL default '',
  `license` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `postcode` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `passtype` varchar(255) NOT NULL default '0',
  `passcode` varchar(255) NOT NULL default '',
  `qq` varchar(100) NOT NULL default '',
  `msn` varchar(100) NOT NULL default '',
  `email` varchar(100) default NULL,
  `companyintro` text,
  `college` varchar(100) NOT NULL default '',
  `collegeintro` text NOT NULL,
  `areaid` tinyint(6) NOT NULL default '0',
  `tel_hidden` int(1) NOT NULL default '0',
  `fax_hidden` int(1) NOT NULL default '0',
  `email_hidden` int(1) NOT NULL default '0',
  `checked` int(1) default NULL,
  `auth` tinyint(1) NOT NULL default '0',
  `tj` tinyint(1) NOT NULL default '0',
  `regtime` int(11) default NULL,
  `logo` varchar(100) NOT NULL default '',
  `pic` varchar(100) NOT NULL default '',
  `exptime` int(11) default NULL,
  `ip` varchar(26) default NULL,
  `logincount` int(20) default NULL,
  `logintime` int(11) default NULL,
  `loginip` varchar(50) default NULL,
  `jobtime` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`memberid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- 转存表中的数据 `cnly_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `cnly_xiangce`
--

CREATE TABLE IF NOT EXISTS `cnly_xiangce` (
  `id` int(11) NOT NULL auto_increment,
  `red_id` int(11) default NULL,
  `img_bthumb` varchar(500) default NULL,
  `img_xthumb` varchar(500) default NULL,
  `add_time` datetime NOT NULL,
  `img_desc` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cnly_xiangce`
--

INSERT INTO `cnly_xiangce` (`id`, `red_id`, `img_bthumb`, `img_xthumb`, `add_time`, `img_desc`) VALUES
(1, 533, '/uploadfile/2013-12-19/1.jpg', '/uploadfile/2013-12-19-17/1.jpg', '2013-12-18 14:03:23', '');
