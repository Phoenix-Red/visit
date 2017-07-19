-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-19 11:59:53
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnly_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `cnly_admin`
--

CREATE TABLE `cnly_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_pwd` varchar(50) DEFAULT NULL,
  `admin_type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_admin`
--

INSERT INTO `cnly_admin` (`id`, `admin_name`, `admin_pwd`, `admin_type`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_baoming`
--

CREATE TABLE `cnly_baoming` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `classobj` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `content` text,
  `add_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_baoming`
--

INSERT INTO `cnly_baoming` (`id`, `name`, `sex`, `age`, `height`, `weight`, `classobj`, `phone`, `address`, `content`, `add_time`) VALUES
(2, '马瑜遥', '女', '22', '173', '55', '计算机', '23123213123123', '山东省临沂市', '性格开朗，善于交友！', '2017-04-23 14:16:46');

-- --------------------------------------------------------

--
-- 表的结构 `cnly_class`
--

CREATE TABLE `cnly_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `eng_name` varchar(100) DEFAULT NULL,
  `class_order` int(11) DEFAULT '255',
  `pid` int(11) DEFAULT '0',
  `display` int(1) DEFAULT '1',
  `cover_pic` varchar(100) DEFAULT NULL,
  `ps_time` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `gjc` varchar(500) DEFAULT NULL,
  `jj` varchar(500) DEFAULT NULL,
  `leixing` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_class`
--

INSERT INTO `cnly_class` (`id`, `class_name`, `eng_name`, `class_order`, `pid`, `display`, `cover_pic`, `ps_time`, `type`, `gjc`, `jj`, `leixing`) VALUES
(570, '休闲娱乐', NULL, 9, 0, 0, 'uploadfile/1393300445.jpg', NULL, 'rl', '', '', 'news'),
(535, '旅游景点', NULL, 1, 486, 0, NULL, NULL, 'mtbd', NULL, NULL, 'product'),
(661, '旅游购物', NULL, 1, 490, 0, NULL, NULL, 'lxww', NULL, NULL, 'news'),
(553, '特色美食', NULL, 1, 551, 0, NULL, NULL, 'hbsb', NULL, NULL, 'news'),
(524, '旅游酒店', NULL, 1, 552, 0, NULL, NULL, 'zxns', NULL, NULL, 'news'),
(687, '旅游季节', '', 2, 483, 1, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(490, '购物', 'Shopping', 8, 0, 0, 'uploadfile/1393300437.jpg', NULL, 'lxww', '', '', 'news'),
(552, '酒店', NULL, 5, 0, 0, 'uploadfile/1393300417.jpg', NULL, 'zxns', '', '', 'news'),
(486, '景点', '', 4, 0, 1, 'uploadfile/1393300409.jpg', NULL, 'mtbd', '', '', 'product'),
(483, '城市简介', '', 1, 0, 1, 'uploadfile/1393300395.jpg', NULL, 'jsxx', '', '', 'about'),
(238, '轮播管理', NULL, 255, 0, 0, NULL, NULL, 'lunbo', NULL, NULL, NULL),
(572, '休闲娱乐', NULL, 1, 570, 0, NULL, NULL, 'rl', NULL, NULL, 'news'),
(509, '友情管理', NULL, 50, 0, 0, NULL, NULL, 'yqgl', NULL, NULL, NULL),
(510, '友情链接', NULL, 1, 509, 0, NULL, NULL, 'yqgl', NULL, NULL, NULL),
(551, '特产美食', NULL, 6, 0, 0, 'uploadfile/1393300426.jpg', NULL, 'hbsb', '', '', 'news'),
(678, '旅游小知识', NULL, 1, 622, 0, NULL, NULL, 'spkt', NULL, NULL, 'news'),
(671, '首页轮播', NULL, 1, 238, 0, NULL, NULL, 'lunbo', NULL, NULL, 'about'),
(691, '旅游动态', NULL, 2, 571, 0, NULL, NULL, 'lx', NULL, NULL, 'news'),
(692, '城市概况', '', 3, 483, 1, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(693, '文化历史', NULL, 4, 483, 0, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(624, '气候地理', '', 1, 483, 1, NULL, NULL, 'jsxx', NULL, NULL, 'about'),
(622, '旅游小知识', NULL, 10, 0, 0, 'uploadfile/1393300457.jpg', NULL, 'spkt', '', '', 'news'),
(571, '旅游动态', NULL, 11, 0, 0, NULL, NULL, 'lx', NULL, NULL, 'news'),
(690, '公司动态', '', 3, 571, 1, NULL, NULL, 'lx', NULL, NULL, 'news'),
(694, '公告栏', '', 1, 571, 1, NULL, NULL, 'lx', NULL, NULL, 'news'),
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

CREATE TABLE `cnly_config` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `domain` varchar(250) DEFAULT NULL,
  `author` varchar(250) DEFAULT NULL,
  `jingtai` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_config`
--

INSERT INTO `cnly_config` (`id`, `title`, `description`, `keywords`, `company`, `domain`, `author`, `jingtai`) VALUES
(57, '山东临沂旅游网---瑜遥毕设', '山东临沂旅游网---瑜遥毕设', '山东临沂旅游网---瑜遥毕设', '山东临沂旅游网---瑜遥毕设', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `cnly_content`
--

CREATE TABLE `cnly_content` (
  `id` int(11) NOT NULL,
  `xiazaiid` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `new` int(11) DEFAULT NULL,
  `recommend` int(11) DEFAULT NULL,
  `promotion` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `news_title` varchar(250) DEFAULT NULL,
  `news_desc` varchar(1000) DEFAULT NULL,
  `news_content` longtext,
  `add_time` datetime DEFAULT NULL,
  `img_thumb` varchar(400) DEFAULT NULL,
  `small_img` varchar(100) DEFAULT NULL,
  `news_url` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `news_order` int(11) DEFAULT '255',
  `news_src` varchar(200) DEFAULT NULL,
  `file_url` varchar(200) DEFAULT NULL,
  `tuijian` varchar(20) NOT NULL DEFAULT 'no',
  `laiyuan` varchar(200) DEFAULT NULL,
  `fbr` varchar(100) DEFAULT NULL,
  `zhuanye` varchar(100) DEFAULT NULL,
  `zhiwei` varchar(100) DEFAULT NULL,
  `danwei` varchar(100) DEFAULT NULL,
  `hit` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_content`
--

INSERT INTO `cnly_content` (`id`, `xiazaiid`, `brand_id`, `new`, `recommend`, `promotion`, `cat_id`, `news_title`, `news_desc`, `news_content`, `add_time`, `img_thumb`, `small_img`, `news_url`, `type`, `news_order`, `news_src`, `file_url`, `tuijian`, `laiyuan`, `fbr`, `zhuanye`, `zhiwei`, `danwei`, `hit`) VALUES
(601, NULL, NULL, NULL, NULL, NULL, 553, '仓山大蒜', '苍山大蒜，亦称葫或葫蒜。据东汉崔实著《东观汉记》载：“李恂，为兖州刺史，所种小麦、葫蒜，悉付从事，无所留”。由此知之，那时大蒜便在山东安家落户。大蒜有很高的食用价值和药用价值。《本草纲目》中谈及大蒜时说：“北方食肉面尤不可无”。大蒜具有降低胃内亚硝酸盐和抗肿瘤作用，仓山大蒜的这种作用更为突出，该县居民普遍有常年生食大蒜佐餐的习惯，除此之外，在收获大蒜的季节，蒜薹、蒜苗、新鲜大蒜成为家家户户的主要蔬菜。据山东省医学院科研所对山东省胃癌低发区的现场调查，发现仓山县是长江以北10万人口以上的县中胃癌死亡率最抵的县。仓山大蒜的成分优于他地大蒜成分的原因在于：仓山蒜区的土壤含较高的有机质，氮磷钾偏高；蒜区的井水多为偏碱水井，部分井水近似一级肥水；仓山大蒜在品质上除了具有香、辣、粘、浓、美味等特点外，其17中氨基酸含量均高于外地大蒜。仓山大蒜外贸出口已有20多年历史，远销新加坡、马来西亚、柬埔寨、泰国、香港等国家和地区。\r\n\r\n', '', '2017-04-29 20:10:33', 'uploadfile/1493439069.jpg', 'uploadfile/small1493439069.jpg', '', 1, 255, NULL, NULL, 'no', '', '', '', '', '', 0),
(596, NULL, NULL, NULL, NULL, NULL, 535, '雪山彩虹谷', '雪山彩虹谷，国家AAAA级旅游景区，总投资1.2亿元，于2004年8月31日正式对外营业，地处沂水县与莒县交界，山东省沂水县城东2.5公里处，总面积200万平方米，主要包括雪山、大山、马山，三座山中以雪山最为秀丽，海拔400多米，是自东部沿海以来最高、最秀、最奇、最美的一座山。雪山树木葱郁，奇石林立，文化内涵丰厚，自古就有“雪山七十二景”之说。 景区有以“晴天幽谷见彩虹”而著称的彩虹谷，浪漫温馨的情人谷，惊险刺激的欢乐谷，重现硝烟战火的野战谷，“飞跃彩虹”滑草项目，精彩纷呈的深山剧场，趣味十足的彩虹旋转漂流、回归童真的摸鱼池等体验项目，是一处集观光、休闲、度假、娱乐、参与、表演于一体的高档旅游区。', '', '2017-04-29 20:07:21', 'uploadfile/1493438890.jpg', 'uploadfile/small1493438890.jpg', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(597, NULL, NULL, NULL, NULL, NULL, 535, '华东革命烈士陵园', '华东革命烈士陵园，建于1949年4月，占地19.2 万平方米，有塔、堂、馆、亭、墓、廊等大型纪念建筑物18座。华东革命烈士陵园是一处大型革命纪念园林，座落在山东沂蒙革命老区临沂市区，陵园表里河山，风光壮美，是有名的形胜之地。毛泽东、刘少奇、周恩来、朱德、任弼时、邓小平、江泽民等10位党和国家领导人为陵园题词。1986年10月，被国务院批准为第一批全国重点烈士纪念建筑物保护单位。2001年被中宣部公布为全国爱国主义教育示范基地。陵园南大门为仿明代连九厅仿式建筑，1984年9月落成，匾额"华东革命烈士陵园"为舒同手书。2013年11月25日，习近平主席到华东革命烈士陵园，向革命烈士纪念塔敬献花篮。', '', '2017-04-29 20:08:13', 'uploadfile/1493438925.jpg', 'uploadfile/small1493438925.jpg', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(598, NULL, NULL, NULL, NULL, NULL, 535, '孟良崮旅游区', '孟良崮旅游区位于山东省临沂市蒙阴县境内，1947年华东野战军一举歼灭了国民党的精锐部队整编七十四师的孟良崮战役使孟良崮名扬海内外。 孟良崮地处蒙阴县和沂南县交界处，属蒙山山系，平均海拔400米左右，主峰海拔575.2米，面积1.5平方公里。"崮"是当地对于顶平坡陡的方山地形之俗称，相传宋朝杨家军将领孟良曾屯兵于此，故名。孟良崮虽系沂蒙山区"七十二崮"之一，但其山体不同于其他石灰岩山峰，而由花岗岩组成。花岗岩巨石裸露于山体上部，相互依撑，构成天然石棚。顶部虽无峭壁，但山势险峻。\r\n\r\n', '', '2017-04-29 20:08:48', 'uploadfile/1493438955.bmp', 'uploadfile/small1493438955.bmp', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(599, NULL, NULL, NULL, NULL, NULL, 553, '临沂糁', '临沂糁(Sá-临沂方言)又称"沂水"，"糁"在字典上有两个读音，一个是"Sǎn"，意思是米饭粒儿，另一个是"Shēn"，意思是谷类磨成的碎粒，但在临沂方言中却读做"Sa"(二声)，实际上就是一种用肉汤熬制的米粥。最早形成影响的是鸡肉糁，现在已经发展到可以根据个人的口味制作猪肉糁，牛肉糁，羊肉糁等等，种类繁多是一道美味可口的汉族名肴，属于鲁菜系。其香辣可口、肥而不腻、祛风除寒、开食健胃为当地人所钟爱，早晨喝糁是山东临沂市的传统食俗，糁也因此而成为闻名山东省的地方小吃。', '', '2017-04-29 20:09:43', 'uploadfile/1493439003.jpg', 'uploadfile/small1493439003.jpg', '', 1, 255, NULL, NULL, 'no', '', '', '', '', '', 0),
(600, NULL, NULL, NULL, NULL, NULL, 553, '临沂煎饼', '临沂煎饼是著名的汉族小吃，山东沂蒙山区家常主食，也是久负盛名的地方土特食品。其主要地域范围以山东临沂为主，南至苏鲁边界，北到泰安、潍坊南部一带，西至兖州、曲阜一线，东到大海。可说是山东的代表食物之一。', '', '2017-04-29 20:10:05', 'uploadfile/1493439031.jpg', 'uploadfile/small1493439031.jpg', '', 1, 255, NULL, NULL, 'no', '', '', '', '', '', 0),
(602, NULL, NULL, NULL, NULL, NULL, 661, '购物商城', '', '<p style="text-indent:21.0pt;">\r\n	临沂小商品城占地<span>350</span>亩，建筑面积<span>22</span>万平方米，总投资<span>5</span>亿元，容纳经营户<span>2600</span>其中商铺<span>17</span>万平方米，分为文体、纸张、化妆品、小商品四个区域，容纳客户<span>1400</span>户<span>;</span>大卖场<span>5</span>万平方米，共<span>3</span>层，<span>1</span>层经营办公用品、文化用品、体育用品、喜庆用品、洗涤用品、化妆用品、纸张及纸制品类等，<span>2</span>层经营饰品、工艺品、小电器、小五金等百货类商品，<span>3</span>层经营年画、字画、装饰画、日历台历、图片、期刊、美容美发用品工具等，容纳客户<span>1200</span>户。<span></span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	临沂华丰国际服装城是由华丰企业集团投资兴建，位于临沂市解放路与通达路交汇处。<span>1987</span>年<span>10</span>月开业，占地<span>40</span>亩，建筑面积<span>7600</span>平方，建有楼房<span>660</span>余间，二层砖混胶质结构精品屋<span>810</span>间，铁橱<span>3000</span>米，玻璃钢瓦大棚<span>5000</span>平方米，其中楼下用于经营，楼上用于停车，实有户数<span>2300</span>户，从业人员<span>6000</span>余人。市场日上市余额达<span>696</span>万元，日上市人数<span>40000</span>人次，市场年交易额达<span>15</span>亿元，经营商品主要有西装、童装、男女时装、妇女用品、衬衣、牛仔服等六大类上千个品种，商品主要来源于浙江、江苏、福建、河北及本省各地市，主要销往安徽及山东省。<span></span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	临沂家电厨卫城于<span>1995</span>年<span>5</span>月开业，主要经销教授稳压器、教授逆变器、教授充电机。弘乐稳压器、弘乐三相全自动补偿式电力稳压器。国产、进口电视机、录放机、影碟机、电冰箱<span>(</span>柜<span>)</span>、空调机、组合音响及各类家用电器、通讯器材、电子元件等十几大类数千个品牌，国内<span>100</span>多个著名家电厂家均在市场内设有总代理、直销点，市场经营状况良好。<span></span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	<span>&nbsp;</span>\r\n</p>\r\n临沂灯具城位于临沂市育才路与琅琊王路交汇处，距临沂机场10公里，紧邻小商品市场、家电厨卫城、摩配成、汽配城、澳龙际物流国际物流城和亚洲最大的汽车站-临沂新汽车站咫尺之遥。新灯具城由山东华强集团投资兴建，总投资3.8亿元，规划占地面积330亩，经营面积26万平方米，容纳经营户800多户。新灯具城规划严整，布局合理，各项市场基础配套设施先进齐全，真正体现了市场提升改造的超前面貌。此外，新灯具城将以其经营定位准确、经营品种丰富、经营环境优良、整体规划设计合理、功能组合齐全、配套设施完善而为显著特色。市场开办方将继续引进国际、国内著名灯具品牌，不断丰富临沂灯具市场的产品，以强大的专业市场充当资源整合器，让市场形成巨大能量磁场，给各级经销商和消费者带来更广阔的选择空间，把新临沂灯具市场打造成全国最大的灯具专业市场', '2017-04-29 20:11:31', 'uploadfile/1493439119.jpg', 'uploadfile/small1493439119.jpg', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(588, NULL, NULL, NULL, NULL, NULL, 671, '天下第一泉', '', '', '2017-04-29 19:54:35', 'uploadfile/1493438150.jpg', 'uploadfile/small1493438150.jpg', '', 1, 1, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0),
(589, NULL, NULL, NULL, NULL, NULL, 671, '1', '', '', '2017-04-29 20:02:52', 'uploadfile/1493438588.jpg', 'uploadfile/small1493438588.jpg', '', 1, 2, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0),
(590, NULL, NULL, NULL, NULL, NULL, 671, '3', '', '', '2017-04-29 20:03:12', 'uploadfile/1493438606.bmp', 'uploadfile/small1493438606.bmp', '', 1, 3, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0),
(591, NULL, NULL, NULL, NULL, NULL, 671, '4', '', '', '2017-04-29 20:03:31', 'uploadfile/1493438628.jpg', 'uploadfile/small1493438628.jpg', '', 1, 4, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0),
(592, NULL, NULL, NULL, NULL, NULL, 671, '5', '', '', '2017-04-29 20:03:51', 'uploadfile/1493438649.jpg', 'uploadfile/small1493438649.jpg', '', 1, 5, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0),
(593, NULL, NULL, NULL, NULL, NULL, 671, '6', '', '', '2017-04-29 20:04:11', 'uploadfile/1493438665.jpg', 'uploadfile/small1493438665.jpg', '', 1, 6, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 0),
(594, NULL, NULL, NULL, NULL, NULL, 693, '临沂', '临沂，山东省地级市，位于山东省东南部，地近黄海，东连日照，西接枣庄、济宁、泰安，北靠淄博、潍坊，南邻江苏。地处长三角经济圈与环渤海经济圈结合点，位于鲁南临港产业带、海洋产业联动发展示范基地、东陇海国家级重点开发区域和山东西部经济隆起带的叠加区域。 临沂总面积17191.2平方公里，是山东省面积最大的市。\r\n临沂因临沂河得名，古称“琅琊”。临沂历史悠久，是中华文明的重要发祥地之一。秦时属琅琊郡和郯郡。近代中共在临沂地区创建了沂蒙革命根据地，1945年8月在莒南县大店镇成立山东省政府。1994年12月，国务院批准撤销临沂地区和县级临沂市，设立地级临沂市。\r\n临沂有临沂商城、沂蒙山、岱崮、王羲之故居、竹泉村、天上王城、汤头温泉等景点，有曾子、荀子、诸葛亮、王羲之、颜真卿、萧道成等历史名人 。曾获“全国文明城市”、“中国最佳文化生态旅游城市”、“中国十佳生态宜居典范城市”、“中国最具投资价值十大城市”、“中国大陆最佳商业城市”、“世界滑水之城”等荣誉称号。', '<p style="text-indent:21.0pt;">\r\n	临沂，山东省地级市，位于山东省东南部，地近黄海，东连日照，西接枣庄、济宁、泰安，北靠淄博、潍坊，南邻江苏。地处长三角经济圈与环渤海经济圈结合点，位于鲁南临港产业带、海洋产业联动发展示范基地、东陇海国家级重点开发区域和山东西部经济隆起带的叠加区域。\r\n临沂总面积<span>17191.2</span>平方公里，是山东省面积最大的市。 <span></span> \r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	临沂因临沂河得名，古称“琅琊”。临沂历史悠久，是中华文明的重要发祥地之一。秦时属琅琊郡和郯郡。近代中共在临沂地区创建了沂蒙革命根据地，<span>1945</span>年<span>8</span>月在莒南县大店镇成立山东省政府。<span>1994</span>年<span>12</span>月，国务院批准撤销临沂地区和县级临沂市，设立地级临沂市。<span></span> \r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	临沂有临沂商城、沂蒙山、岱崮、王羲之故居、竹泉村、天上王城、汤头温泉等景点，有曾子、荀子、诸葛亮、王羲之、颜真卿、萧道成等历史名人\r\n。曾获“全国文明城市”、“中国最佳文化生态旅游城市”、“中国十佳生态宜居典范城市”、“中国最具投资价值十大城市”、“中国大陆最佳商业城市”、“世界滑水之城”等荣誉称号。<span></span> \r\n</p>', '2017-04-29 20:05:21', '', '', '', 1, 1, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(595, NULL, NULL, NULL, NULL, NULL, 535, '景点', '蒙山旅游区由临沂市蒙山管委会管理，为临沂市人民政府直属正县级单位，辖1镇(柏林镇)、1办事处(云蒙办事处)，共49个行政村(社区)，辖区总面积313平方公里，总人口7.7万人。另辖4个国有林场，生态公益林总面积30万亩。蒙山旅游区管委会共设置15个内设机构。市直部门派驻设置了蒙山公安工作办公室、国土资源管理工作办公室、城市管理行政执法局、交通运输管理办公室、地税分局。同时，为更好地做好旅游发展、服务、管理工作，在辖区内设置了5个景区管理处，分别是龟蒙景区管理处、云蒙景区管理处、大洼景区管理处、明光寺景区管理处、沂蒙国家钻石公园管理处。', '', '2017-04-29 20:06:42', '', '', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(603, NULL, NULL, NULL, NULL, NULL, 572, '休闲娱乐', '', '<p style="text-indent:21.0pt;">\r\n	位于临沂市中心，东临沂蒙路，西至新华路，南依银雀山路，北靠红旗路，八一路自广场下通道贯穿连接解放路。广场东西长<span>670</span>米，南北宽<span>320</span>米，占地面积<span>21.6</span>公顷<span>(324</span>亩<span>)</span>，总投资<span>2.3</span>亿元，于<span>2000</span>年<span>2</span>月<span>16</span>日开工建设，<span>2001</span>年<span>1</span>月<span>1</span>日竣工，可同时容纳三、四万人游憩，是目前山东省面积最大的广场。临沂人民广场是<span>"</span>蒙山沂水，文韬武略<span>"</span>。这一主题凝聚了沂蒙文化的精髓，充分展现了<span>"</span>蒙山沂水<span>"</span>的自然特色和<span>"</span>文韬武略<span>"</span>的历史文化特点。总体上说，临沂人民广场是一个功能多样、文化内涵丰富、匠心独运的文化休闲广场，九根巍峨矗立的浮雕风情柱默默地陈述着临沂的漫长历史，让人们感受到它的博大与厚重，气势非常雄伟<span>;</span>高耸入云的<span>"</span>山高水长<span>"</span>市标以山和折射在水中的倒影表现<span>"</span>蒙山沂水<span>"</span>的形象，以挺拔的直线、摆动的曲线分别象征着山的阳刚之气和水的阴柔之美，同时象征着临沂的稳定与发展。整个塑雕以红色，代表了沂蒙山区的光荣传统，如火如荼的发展形势和自强不息、勇于探索的时代精神，把临沂古今与未来有机地联系在了一起<span>;</span>彩虹喷泉、旱喷泉喷珠吐玉流淌出一首首美妙的乐曲<span>;</span>浪漫的文化长廊拓宽了人们文化活动的空间，体现了广场自身的文化内涵<span>;</span>十座端庄凝重的历史名人石雕思忆着临沂的过去，感受着临沂的当前，展望着临沂的未来<span>;</span>巨大而清晰的电子屏幕播放着沂蒙人民战天斗地的丰功伟绩，传播着外界的种种信息，连接着外部世界。<span></span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	临沂凤凰广场是山东省临沂市滨河景区以广场文化为文化建设的主阵地，在凤凰广场等组织了多姿多彩的活动。广场自建成以后，先后举办了临沂第二届风筝节、<span>"</span>亮丽临沂，城市风情<span>"</span>大型灯展、中国·临沂沙雕<span>(</span>羲之书法<span>)</span>艺术展等活动。<span></span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p style="text-indent:21.0pt;">\r\n	依据临沂<span>"</span>龟驼凤凰城<span>"</span>的传说，在凤凰广场突出位置设置了<span>"</span>凤凰台<span>"</span>和<span>"</span>凤之翼<span>"</span>两座雕塑。以栈桥为脉，以碧水为羽，依势造景，构思新颖，其凤凰飞腾的外形与沂河构成龙凤呈祥的壮美景观。其中主题雕塑<span>--"</span>丹凤啼翠<span>"</span>高达<span>16.6</span>米，运用浪漫主义的艺术手法，塑造了一只烈火中永生的凤凰，亭亭玉立在蒙山沂水之间，昂首啼翠，喻意沂蒙大地的兴旺发达和美好未来。<span></span>\r\n</p>', '2017-04-29 20:12:28', 'uploadfile/1493439170.jpg', 'uploadfile/small1493439170.jpg', 'http://', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(604, NULL, NULL, NULL, NULL, NULL, 678, '小知识', '1．确定旅游目的地 在确定旅游目标以前，首先要考虑的是时间，其次是经济承受能力。综合这两种因素，基本上就可以排定目的地的大致方位了。\r\n2．了解交通情况锁定了旅游目标，就得掌握一下交通状况，好做到心中有数。先找地图看看，怎样走最节省时间和资金，把要经过的主要城镇名称记下，然后决定是走陆地、空中还是水上，抑或海陆空并举，要了解要乘坐的交通工具的出发时间、准确的车站、码头、机场位置，设法预订好票，减少临时购票的紧张压力。 \r\n3．出发前的准备 A．掌握旅游地的概况； B．根据天气预报选择服装； C．带一点常用内外科药，如治疗肠胃系统和心血管系统的药物，及创可贴、棉花、酒精等； D．相机、电池、胶卷以及洗漱用具等； E．带少许水果或点心、瓶装饮料水（减少旅途中高价购买开支），钱要分散放好，如有全国通用银行磁卡最好带上； F．带上身份证。\r\n', '', '2017-04-29 20:13:16', 'uploadfile/1493439215.jpg', 'uploadfile/small1493439215.jpg', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(605, NULL, NULL, NULL, NULL, NULL, 696, '吃', '◆吃：这是首要的，只有吃得好，才能游得好，所以一定要吃饱、吃好、吃干净。请大家注意： 1、不要太多地改变自己饮食习惯，注意荤素搭配、多食水果。 2、各地名吃一定要品，但量不可太大，注意消化能力。 3、各地都有风味小吃，特产瓜果，大家吃时勿忘考虑服不服水土问题。', '', '2017-04-29 20:14:03', '', '', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(606, NULL, NULL, NULL, NULL, NULL, 697, '住', '◆住：不要住太贵的饭店，因为出来主要是旅游，而不是睡觉，所以干净、舒适即可。另要注意： 1、只有睡眠充足，才能确保第二天旅游时精力充沛。 2、如果因换环境不能入睡，睡前洗个热水澡会有助睡眠。 3、床具要干净，内裤要穿好，防止得传染病。', '', '2017-04-29 20:14:17', '', '', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(607, NULL, NULL, NULL, NULL, NULL, 698, '行', '行：选择游览目的地，一定要注意该处进得去，也出得来。特别注意： 1、先买好返程票。 2、乘交通工具注意安全。 3、所到处宜购买一份当地地图，以防迷路。 ◆游：游是核心，一定同导游配合好，可领略到更多乐趣和知识。注意： 1、去游览景点之前，找些有关介绍读一读，把读书和游览结合起来，会提高旅游档次。 2、因旅游交通费是主要开支，为此，最好能将目的地附近的景点顺便一游。 3、不要只游览，也顺便考察一下当地和自己行业有关的状况，则会受到启发，使旅游具有更大意义。', '', '2017-04-29 20:14:42', '', '', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(608, NULL, NULL, NULL, NULL, NULL, 700, '购物', '购：异地他乡购些物品也是乐趣之一，但应注意： 1、只购当地独有的。 2、购当地非常便宜的，可以节省旅游费用的开支。 3、千万别购太重的物品，防止行李超重。', '', '2017-04-29 20:15:03', 'uploadfile/1493439333.jpg', 'uploadfile/small1493439333.jpg', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(609, NULL, NULL, NULL, NULL, NULL, 701, '娱乐', '娱：娱乐乃人之常情，但注意： 1、不要入迷，适可而止。 2、玩一些当地喜闻乐见的项目，自己又没玩过的。 3、注意安全，保存体力，切勿到不适当的场所。', '', '2017-04-29 20:15:36', 'uploadfile/1493439372.jpg', 'uploadfile/small1493439372.jpg', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0),
(610, NULL, NULL, NULL, NULL, NULL, 699, '游、', '娱：娱乐乃人之常情，但注意： 1、不要入迷，适可而止。 2、玩一些当地喜闻乐见的项目，自己又没玩过的。 3、注意安全，保存体力，切勿到不适当的场所。', '', '2017-04-29 20:16:14', '', '', '', 1, 255, NULL, NULL, 'no', '', '', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cnly_guestbook`
--

CREATE TABLE `cnly_guestbook` (
  `id` int(11) NOT NULL,
  `book_type` varchar(50) DEFAULT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `book_connect` varchar(250) DEFAULT NULL,
  `book_time` datetime DEFAULT NULL,
  `book_qq` varchar(50) DEFAULT NULL,
  `book_email` varchar(50) DEFAULT NULL,
  `book_name` varchar(50) DEFAULT NULL,
  `book_ifcheck` int(1) DEFAULT '0',
  `book_restore` varchar(250) DEFAULT NULL,
  `is_show` int(11) DEFAULT '0',
  `book_dianhua` varchar(100) DEFAULT NULL,
  `book_address` varchar(200) DEFAULT NULL,
  `book_zhiye` varchar(200) DEFAULT NULL,
  `book_sex` varchar(20) DEFAULT NULL,
  `book_age` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_guestbook`
--

INSERT INTO `cnly_guestbook` (`id`, `book_type`, `book_title`, `book_connect`, `book_time`, `book_qq`, `book_email`, `book_name`, `book_ifcheck`, `book_restore`, `is_show`, `book_dianhua`, `book_address`, `book_zhiye`, `book_sex`, `book_age`) VALUES
(82, NULL, NULL, '这个网站很不错哦！！！', '2017-04-23 17:13:16', NULL, NULL, '李兴部', 0, NULL, 0, '213123123123', NULL, NULL, NULL, NULL),
(83, NULL, NULL, '做的真不错!!!', '2017-04-24 05:30:51', NULL, NULL, '马瑜遥', 0, NULL, 0, '666666666666', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cnly_jiaose`
--

CREATE TABLE `cnly_jiaose` (
  `id` int(11) NOT NULL,
  `jiaose_name` varchar(100) NOT NULL,
  `jiaose_quanxian` text NOT NULL,
  `jiaose_left` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `cnly_left` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `is_show` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `cnly_member` (
  `memberid` int(12) NOT NULL,
  `membertypeid` int(3) DEFAULT NULL,
  `memberprop` tinyint(1) NOT NULL DEFAULT '0',
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usertype` tinyint(1) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `money` varchar(11) DEFAULT NULL,
  `moneytype` tinyint(1) DEFAULT NULL,
  `companynature` int(10) DEFAULT NULL,
  `companytype` tinyint(2) NOT NULL DEFAULT '0',
  `companydate` varchar(12) NOT NULL DEFAULT '',
  `collegedate` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `mobile` varchar(13) NOT NULL DEFAULT '',
  `license` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `passtype` varchar(255) NOT NULL DEFAULT '0',
  `passcode` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(100) NOT NULL DEFAULT '',
  `msn` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `companyintro` text,
  `college` varchar(100) NOT NULL DEFAULT '',
  `collegeintro` text NOT NULL,
  `areaid` tinyint(6) NOT NULL DEFAULT '0',
  `tel_hidden` int(1) NOT NULL DEFAULT '0',
  `fax_hidden` int(1) NOT NULL DEFAULT '0',
  `email_hidden` int(1) NOT NULL DEFAULT '0',
  `checked` int(1) DEFAULT NULL,
  `auth` tinyint(1) NOT NULL DEFAULT '0',
  `tj` tinyint(1) NOT NULL DEFAULT '0',
  `regtime` int(11) DEFAULT NULL,
  `logo` varchar(100) NOT NULL DEFAULT '',
  `pic` varchar(100) NOT NULL DEFAULT '',
  `exptime` int(11) DEFAULT NULL,
  `ip` varchar(26) DEFAULT NULL,
  `logincount` int(20) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `loginip` varchar(50) DEFAULT NULL,
  `jobtime` varchar(12) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cnly_xiangce`
--

CREATE TABLE `cnly_xiangce` (
  `id` int(11) NOT NULL,
  `red_id` int(11) DEFAULT NULL,
  `img_bthumb` varchar(500) DEFAULT NULL,
  `img_xthumb` varchar(500) DEFAULT NULL,
  `add_time` datetime NOT NULL,
  `img_desc` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cnly_xiangce`
--

INSERT INTO `cnly_xiangce` (`id`, `red_id`, `img_bthumb`, `img_xthumb`, `add_time`, `img_desc`) VALUES
(1, 533, '/uploadfile/2017-2-19/1.jpg', '/uploadfile/2017-3-19-27/1.jpg', '2017-04-18 14:03:23', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnly_admin`
--
ALTER TABLE `cnly_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `cnly_baoming`
--
ALTER TABLE `cnly_baoming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_class`
--
ALTER TABLE `cnly_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_config`
--
ALTER TABLE `cnly_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_content`
--
ALTER TABLE `cnly_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_guestbook`
--
ALTER TABLE `cnly_guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_jiaose`
--
ALTER TABLE `cnly_jiaose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_left`
--
ALTER TABLE `cnly_left`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnly_member`
--
ALTER TABLE `cnly_member`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `cnly_xiangce`
--
ALTER TABLE `cnly_xiangce`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cnly_admin`
--
ALTER TABLE `cnly_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `cnly_baoming`
--
ALTER TABLE `cnly_baoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `cnly_class`
--
ALTER TABLE `cnly_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=702;
--
-- 使用表AUTO_INCREMENT `cnly_config`
--
ALTER TABLE `cnly_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- 使用表AUTO_INCREMENT `cnly_content`
--
ALTER TABLE `cnly_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;
--
-- 使用表AUTO_INCREMENT `cnly_guestbook`
--
ALTER TABLE `cnly_guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- 使用表AUTO_INCREMENT `cnly_jiaose`
--
ALTER TABLE `cnly_jiaose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `cnly_left`
--
ALTER TABLE `cnly_left`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `cnly_member`
--
ALTER TABLE `cnly_member`
  MODIFY `memberid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- 使用表AUTO_INCREMENT `cnly_xiangce`
--
ALTER TABLE `cnly_xiangce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
