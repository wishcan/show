-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 03 日 10:59
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blyy`
--

-- --------------------------------------------------------

--
-- 表的结构 `bl_activity`
--

CREATE TABLE IF NOT EXISTS `bl_activity` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `uid` varchar(45) DEFAULT NULL,
  `createTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='本月活动' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_advert`
--

CREATE TABLE IF NOT EXISTS `bl_advert` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT '属于哪个页面',
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告页面和位置' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bl_advert`
--

INSERT INTO `bl_advert` (`aid`, `cid`, `title`) VALUES
(1, 1, '首页幻灯片');

-- --------------------------------------------------------

--
-- 表的结构 `bl_advert_data`
--

CREATE TABLE IF NOT EXISTS `bl_advert_data` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `thumb` varchar(20) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `bl_advert_data`
--

INSERT INTO `bl_advert_data` (`adid`, `aid`, `thumb`, `title`, `link`) VALUES
(1, 1, '121230123000.jpg', '澳门电影展红地毯', ''),
(2, 1, '121230123001.jpg', '夕阳', ''),
(3, 1, '121230123002.jpg', '爱达在天安门', ''),
(4, 1, '121230123003.jpg', '爱达', '');

-- --------------------------------------------------------

--
-- 表的结构 `bl_arters`
--

CREATE TABLE IF NOT EXISTS `bl_arters` (
  `aid` int(11) NOT NULL,
  `sex` enum('男','女') NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `birthDay` varchar(10) DEFAULT NULL COMMENT '出生日期',
  `bl_arters_category_cateid` int(11) NOT NULL,
  `tags` varchar(100) DEFAULT NULL COMMENT '标签 特长',
  `district` varchar(16) DEFAULT NULL COMMENT '国内地方',
  `country` varchar(45) DEFAULT NULL COMMENT '国家',
  `bl_arterscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `fk_bl_arters_bl_arters_category1_idx` (`bl_arters_category_cateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='艺术家\n';

-- --------------------------------------------------------

--
-- 表的结构 `bl_arters_category`
--

CREATE TABLE IF NOT EXISTS `bl_arters_category` (
  `cateid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='艺术家分类' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_arters_imgs`
--

CREATE TABLE IF NOT EXISTS `bl_arters_imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `oid` int(11) DEFAULT NULL,
  `bl_arters_opus_oid` int(11) NOT NULL,
  PRIMARY KEY (`id`,`bl_arters_opus_oid`),
  KEY `fk_bl_arters_imgs_bl_arters_opus1_idx` (`bl_arters_opus_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='作品集里面的图片' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_arters_opus`
--

CREATE TABLE IF NOT EXISTS `bl_arters_opus` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `smallimg` varchar(45) DEFAULT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `bl_arters_aid` int(11) NOT NULL,
  `opuName` varchar(20) DEFAULT NULL COMMENT '作品集名称',
  `creatTime` varchar(45) DEFAULT NULL COMMENT '创作时间',
  `tag` int(11) DEFAULT NULL COMMENT '标签',
  PRIMARY KEY (`oid`),
  KEY `fk_bl_arters_opus_bl_arters1_idx` (`bl_arters_aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='艺术家的作品' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_category`
--

CREATE TABLE IF NOT EXISTS `bl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `type` int(3) NOT NULL DEFAULT '1' COMMENT '1文章 2图片3 视频',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `bl_category`
--

INSERT INTO `bl_category` (`id`, `cname`, `pid`, `type`) VALUES
(1, '一级栏目', 0, 1),
(22, '新闻', 1, 1),
(23, '系列', 1, 1),
(24, '分类', 1, 2),
(25, '摄影', 1, 2),
(26, '视频', 1, 3),
(27, '新闻动态', 22, 1),
(28, '趣谈', 22, 1),
(29, '航母系列', 23, 2),
(30, '太和系列', 23, 2),
(31, '百度系列', 23, 2),
(32, '非水墨|非油画|非版画|非摄影|非观念', 23, 2),
(33, '度一系列', 23, 2),
(34, '青藤系列', 23, 2),
(35, '鹊华秋色系列', 23, 2),
(36, '九如系列', 23, 2),
(37, '国外风光系列', 23, 2),
(38, '扎西德勒系列', 23, 2),
(39, '吉祥金刚系列', 23, 2),
(40, '清供 杂花系列', 23, 2),
(41, '国色天香系列', 23, 2),
(42, '梅花系列', 23, 2),
(43, '一句佛陀系列', 23, 2),
(44, '湖系列  岛系列', 23, 2),
(45, '城市之光系列', 23, 2),
(46, '生命的律动-海底系列', 23, 2),
(47, '远山的呼唤系列', 23, 2),
(48, '唐人诗意系列', 23, 2),
(49, '临摹宋元明清作品', 23, 2),
(50, '收租院组画', 23, 2),
(51, '火车头 小人书', 23, 2),
(52, '出生于青海', 23, 2),
(53, '非洲动物', 25, 2),
(54, '非洲女性', 25, 2),
(55, '影子系列', 25, 2);

-- --------------------------------------------------------

--
-- 表的结构 `bl_comment_category`
--

CREATE TABLE IF NOT EXISTS `bl_comment_category` (
  `cateid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_comment_data`
--

CREATE TABLE IF NOT EXISTS `bl_comment_data` (
  `cid` int(11) NOT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `bl_commet_ cid` int(11) NOT NULL,
  `recommendation` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_bl_comment_data_bl_commet1_idx` (`bl_commet_ cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论内容\n';

-- --------------------------------------------------------

--
-- 表的结构 `bl_commet`
--

CREATE TABLE IF NOT EXISTS `bl_commet` (
  ` cid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `decription` varchar(100) DEFAULT NULL,
  `createTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `source` varchar(10) DEFAULT NULL,
  `bl_comment_category_cateid` int(11) NOT NULL,
  `recommendation` int(11) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `updataTime` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (` cid`,`bl_comment_category_cateid`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `fk_bl_commet_bl_comment_category1_idx` (`bl_comment_category_cateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_exhibition`
--

CREATE TABLE IF NOT EXISTS `bl_exhibition` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(45) DEFAULT NULL,
  `startTime` varchar(45) DEFAULT NULL,
  `endTime` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `exhibitionTitle` varchar(45) DEFAULT NULL,
  `bl_exhibition_data_did` int(11) NOT NULL,
  `bl_exhibition_data_bl_exhibition_category_cid` int(11) NOT NULL,
  `bl_exhibition_data_bl_exhibition_tag_tid` int(11) NOT NULL,
  `creatime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`eid`,`bl_exhibition_data_did`,`bl_exhibition_data_bl_exhibition_category_cid`,`bl_exhibition_data_bl_exhibition_tag_tid`),
  KEY `fk_bl_exhibition_bl_exhibition_data1_idx` (`bl_exhibition_data_did`,`bl_exhibition_data_bl_exhibition_category_cid`,`bl_exhibition_data_bl_exhibition_tag_tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='展厅位置' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_exhibition_category`
--

CREATE TABLE IF NOT EXISTS `bl_exhibition_category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='展览';

-- --------------------------------------------------------

--
-- 表的结构 `bl_exhibition_data`
--

CREATE TABLE IF NOT EXISTS `bl_exhibition_data` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `thumb` varchar(30) DEFAULT NULL,
  `eid` varchar(45) DEFAULT NULL,
  `bl_exhibition_category_cid` int(11) NOT NULL,
  `click` int(11) DEFAULT NULL COMMENT '点击',
  `goods` int(11) DEFAULT NULL COMMENT '好评',
  `title` varchar(45) DEFAULT NULL,
  `bl_exhibition_tag_tid` int(11) NOT NULL,
  `tag` varchar(20) DEFAULT NULL COMMENT '文章标签',
  PRIMARY KEY (`did`,`bl_exhibition_category_cid`,`bl_exhibition_tag_tid`),
  KEY `fk_bl_exhibition_data_bl_exhibition_category1_idx` (`bl_exhibition_category_cid`),
  KEY `fk_bl_exhibition_data_bl_exhibition_tag1_idx` (`bl_exhibition_tag_tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_exhibition_tag`
--

CREATE TABLE IF NOT EXISTS `bl_exhibition_tag` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(10) DEFAULT NULL COMMENT '标签名',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标签' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_gallery`
--

CREATE TABLE IF NOT EXISTS `bl_gallery` (
  `gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片类信息',
  `uid` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `typeID` varchar(45) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  `recommendation` int(11) DEFAULT NULL COMMENT '推荐',
  `tag` varchar(20) DEFAULT NULL,
  `createTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='每一个展览' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `bl_gallery`
--

INSERT INTO `bl_gallery` (`gid`, `uid`, `title`, `description`, `typeID`, `cid`, `recommendation`, `tag`, `createTime`, `updateTime`, `type_id`) VALUES
(1, 0, '图片测试', '12月23日图片测试', NULL, 25, NULL, '', '2012-12-23 12:56:11', NULL, 1),
(4, 0, '爱达在中国', '', NULL, 25, NULL, '', '2013-01-02 13:31:18', NULL, 1),
(5, 0, '非洲摄影测试1', '', NULL, 25, NULL, '', '2013-01-02 13:32:36', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 ` bl_gallery_category`
--

CREATE TABLE IF NOT EXISTS ` bl_gallery_category` (
  `cateid` int(11) NOT NULL,
  `cname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='画廊栏目';

-- --------------------------------------------------------

--
-- 表的结构 `bl_gallery_data`
--

CREATE TABLE IF NOT EXISTS `bl_gallery_data` (
  `thumb` varchar(16) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `gid` int(11) NOT NULL COMMENT 'gallery的主键ID',
  `gdid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`gdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='展览信息内容表\n' AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `bl_gallery_data`
--

INSERT INTO `bl_gallery_data` (`thumb`, `title`, `gid`, `gdid`) VALUES
('12122395.jpg', NULL, 1, 1),
('12122396.jpg', NULL, 1, 2),
('12122397.jpg', NULL, 1, 3),
('12122398.jpg', NULL, 1, 4),
('12122399.jpg', NULL, 1, 5),
('121223100.jpg', NULL, 1, 6),
('13010234.jpg', NULL, 2, 7),
('13010235.jpg', NULL, 2, 8),
('13010235.jpg', NULL, 2, 9),
('13010236.jpg', NULL, 2, 10),
('13010243.jpg', NULL, 2, 11),
('13010244.jpg', NULL, 2, 12),
('13010245.jpg', NULL, 2, 13),
('130102156.jpg', NULL, 3, 14),
('130102157.jpg', NULL, 3, 15),
('130102158.jpg', NULL, 3, 16),
('130102159.jpg', NULL, 3, 17),
('130102160.jpg', NULL, 3, 18),
('130102161.jpg', NULL, 3, 19),
('130102162.jpg', NULL, 3, 20),
('130102170.jpg', NULL, 3, 21),
('130102170.jpg', NULL, 3, 22),
('130102171.jpg', NULL, 3, 23),
('1301021.jpg', NULL, 4, 24),
('1301022.jpg', NULL, 4, 25),
('1301023.jpg', NULL, 4, 26),
('1301024.jpg', NULL, 4, 27),
('1301025.jpg', NULL, 4, 28),
('13010210.jpg', NULL, 4, 29),
('13010211.jpg', NULL, 4, 30),
('13010212.jpg', NULL, 4, 31),
('13010213.jpg', NULL, 4, 32),
('13010228.jpg', NULL, 5, 33),
('13010229.jpg', NULL, 5, 34),
('13010232.jpg', NULL, 5, 35),
('13010233.jpg', NULL, 5, 36),
('130102101.jpg', NULL, 5, 37),
('130102102.jpg', NULL, 5, 38),
('130102103.jpg', NULL, 5, 39),
('130102104.jpg', NULL, 5, 40);

-- --------------------------------------------------------

--
-- 表的结构 `bl_news`
--

CREATE TABLE IF NOT EXISTS `bl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `decription` varchar(100) DEFAULT NULL,
  `createTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `source` varchar(10) DEFAULT NULL,
  `bl_user_id` int(11) NOT NULL,
  `click` int(11) DEFAULT '0',
  `recomendation` int(11) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `type_id` int(1) DEFAULT NULL COMMENT '1发布 2审核 3草稿 4回收站',
  `home_cate` int(2) NOT NULL DEFAULT '0' COMMENT '首页栏里显示',
  `home_top` int(2) NOT NULL DEFAULT '0' COMMENT '首页置顶',
  `children_top` int(2) NOT NULL DEFAULT '0' COMMENT '子页面置顶',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `bl_news`
--

INSERT INTO `bl_news` (`id`, `cid`, `title`, `decription`, `createTime`, `source`, `bl_user_id`, `click`, `recomendation`, `tag`, `updateTime`, `type_id`, `home_cate`, `home_top`, `children_top`) VALUES
(24, 27, '南博金基计划“中国画—画世界”原创艺术活动及科研项目 ', '', '2012-12-17 14:48:00', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(25, 27, '杨彦丈六巨制《溪山滴翠图》参加12月18日北京九歌拍卖', '', '2012-12-17 14:50:06', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(26, 27, '《中国邮票2005》由中国集邮总公司于2005年12月出版发', '', '2012-12-17 14:51:04', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(27, 27, '第六届“中国画画世界”于2011年3月10日启程 ', '', '2012-12-17 14:52:26', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(28, 27, '中国移动集团邀杨彦先生作“和谐图” ', '', '2012-12-17 14:52:54', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(30, 27, '杨彦应邀参加“列宾人油画展” ', '', '2012-12-17 14:54:57', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(31, 27, '“实者慧——邹佩珠、李小可、李珠、李庚捐赠李可染作品展” ', '', '2012-12-17 15:04:05', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(32, 27, '李可染作品捐赠展亮相京城 ', '', '2012-12-17 15:05:01', '', 0, 0, 0, '', NULL, 1, 0, 0, 0),
(34, 27, '＂艺术家走进西部活动＂ 在京启动 ', '', '2012-12-18 12:42:16', '', 0, 0, 0, '', NULL, 1, 1, 0, 0),
(35, 27, '中国画 * 画世界 – 东欧行 今日启程 ', '', '2012-12-18 12:45:28', '', 0, 0, 0, '', NULL, 1, 1, 0, 0),
(36, 27, '中国画 * 画世界 – 东欧行 精彩一行 ', '', '2012-12-18 12:48:24', '', 0, 0, 0, '', NULL, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `bl_news_data`
--

CREATE TABLE IF NOT EXISTS `bl_news_data` (
  `nid` int(11) NOT NULL,
  `content` text,
  `thumb` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bl_news_data`
--

INSERT INTO `bl_news_data` (`nid`, `content`, `thumb`) VALUES
(24, '''<p>由南京博物院策划主办，南京金基房地产开发有限公司投资，南博•金基计划“中国画—画世界”原创艺术活动及科研项目于2005年6月8日正式启动。全部计划为期十年，前八年为出国写生采风与创作展示期，后两年为全部成果的学术总结与重点推广期。该计划首次活动将组织11位江苏中年实力派国画家，由南京博物院徐湖平院长带队，今年10月首站奔赴墨西哥、巴西、阿根廷等南美国家。今后每年组织十位左右画家出国写生采风一次，回国后全面投入艺术创作，每年举办专题展览，出版画集。计划以八年时间周游包括南北极在内的七大洲，挥写全球山河大地、风土人情之精粹。八年活动结束，精选200幅优秀作品，出版大型画集，花两年时间到全国各大城市、世界有关国家巡回展览，向全国和世界热爱艺术的观众，展示当代中国画家表现与创造的才华，以及中国画艺术语言形式开拓发展的巨大潜能。该项活动堪称前无古人，举世无双的划时代壮举。<br /><br />　　为什么要实施工程如此浩大的艺术计划?徐湖平院长揭示其巨大的文化意义和学术价值：首先，中国画经历了近百年的颠波起伏之后，如今正以其丰富多彩的形式风貌和独特的艺术语言征服越来越多的中外观众，屹立于世界艺术之林。值此中国腾飞之际，进一步打造中国画的世界品牌，正是顺应了天时地利人和。其次，江苏自古以来绘画人才辈出，其比率在全国，乃至在世界首屈一指。20世纪由傅抱石、钱松岩等创立的“新金陵画派”创造了全国画坛瞩目的辉煌业绩。当今江苏画家能否再续辉煌，主动担当起弘扬中国画艺术的重任?相信今天的签约画家将会全力以赴，对这个问题奉上满意的答卷。南京博物院作为古今艺术品珍藏、研究、展示的机构和素质教育的重要基地，牵头落实该计划也是义不容辞的责任。而投资单位南京金基房地产开发有限公司为弘扬民族艺术勇于投入，回报社会的公德尤为难能可贵，令人鼓舞。最后，中国画传统是一个自身不断更新，并与世界各民族艺术交流互动的生态流程。而地球村时代的中国画家更应当胸怀全球，努力打造“世界画派”，该计划的实施能够有力激发中国画的良性生态，促进对于中国画未来发展型态的学术研究，进一步确立中国绘画的优越性与国际地位。<br /><br />　　“中国画——画世界” 原创艺术活动首批签约画家皆为省高等艺术院校的教授级画家与省市专业书画院的高级美术师。他们分别为南京艺术学院的周京新、杨春华、张友宪、于友善：南京师范大学美术学院的范扬、刘赦；南京大学艺术研究院的聂危谷；江苏省国画院的胡宁娜、薛亮；中国民族画院的杨彦和南通市书画院的朱建忠。<br /><br /></p><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203145thalbmw4bwhdnumn.jpg" /><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203145reb4e8b9z5oly5er.jpg" /><br />　　 <div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203145vbkvfktkq2hhq6p3.jpg" /><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203145kuasuqfa4afpqa44.jpg" /><br />　　 <div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203145btypp186g8fa1ftl.jpg" /></div></div></div><p><br /></p>''', '121217203145reb4e8b9z5oly5er.jpg'),
(25, '''<p>杨彦丈六巨制《溪山滴翠图》参加12月18日北京九歌拍卖，预展日期15至17日北京昆仑饭店，18日拍卖。</p><p style="text-align:center;"><a href="http://www.d1wh.com/data/attachment/portal/201106/15/203327v88vwx22wffqwb8w.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203327v88vwx22wffqwb8w.jpg" /></a></p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/203317lwggmmqmd1amkr9m.png" target="_blank"><p> </p><p style="text-align:center;"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203317lwggmmqmd1amkr9m.png" /></p></a><p><br /></p>''', '121217203327v88vwx22wffqwb8w.jpg'),
(26, '''<p><span style="font-size:medium;color:#993300;font-size:16px;">《中国邮票2005》由中国集邮总公司于2005年12月出版发行，其中刊载了杨彦先生的书画作品、邮票情结及摄影作品。有需求者,请与杨彦画友会联系!</span></p><div><span style="font-size:medium;color:#993300;font-size:16px;">《中国邮票2005》由中国集邮总公司于2005年12月出版发行，其中刊载了杨彦先生的书画作品、邮票情结及摄影作品。有需求者,请与杨彦画友会联系!</span></div><div><span style="font-size:medium"><span style="color:#993300"></span></span> </div><div><span style="font-size:medium;color:#993300;font-size:16px;">电话：010-87731985</span></div><div><span style="font-size:medium"><span style="color:#993300"></span></span> </div><span style="font-size:medium"><span style="color:#993300"><p style="text-align:center;"><a href="http://www.d1wh.com/data/attachment/portal/201106/15/2024257a4h7hgj4yh4yn32.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/2024257a4h7hgj4yh4yn32.jpg" /></a></p></span></span><p><br /></p>''', '1212172024257a4h7hgj4yh4yn32.jpg'),
(27, '''<p style="text-align:center"><strong>2006年9月《中国画画世界》策划人序</strong></p><p style="text-align:right"><span style="font-size:small;font-size:12px;">作者：庄天明</span></p><p style="text-align:center"><strong>中国画画世界官方网站：</strong><a href="http://www.pworld2006.com/"><span style="color:#256eb1;">http://www.pworld2006.com/</span></a></p><p style="text-align:center"><img style="width:453px;height:3px" src="http://www.d1wh.com/data/attachment/portal/201106/15/231550gv525jg8sck2rcme.gif" border="0" height="3" width="238" /></p><p>　　考察中国的人文传统，有很大的胸怀与很高的目标。胸怀之大、目标之高，有“平天下”、“世界大同”、“天人合一”等词语自觉与不自觉地影响着一代又一代的中国文化人。无奈由于历史与政治等原因，中国在近代进入了低谷，八国瓜分之羞，日本入侵之耻，是中国堕落至最低潮的标志。真所谓有升必有降，有衰必有盛，改革开放使中国摆脱了贫穷与落后，逐渐富裕与强大起来;也使中国人充满自信地投入到中华复兴的伟大事业中去。改革开放给中国带来了蓬勃生机，给中国文艺界带来了真正的“百花齐放”，也使“中国画画世界”成为可能，成为当代画家挑战自我、挑战时代、挑战历史与古人的一大举措。</p><p>　　考察近现代中国画家表现外国风情的艺术创作(亦可称之为“中国画画世界”)，拟可分为三个阶段：一为民国时期的初步尝试阶段;二为解放后至文革前的初见成效阶段;三为改革开放以后的普及提高阶段。</p><p>　　第一阶段为民国时期的初步尝试阶段。有据可查的用中国画形式表现外国风景人物的画家有何香凝、刘海粟、高剑父、徐悲鸿等。何香凝与刘海粟于1930年在法国合作《瑞士勃郎崖》，虽异国风味不浓，然开了近现代中国画画世界的先声。其次，高剑父1932年始创作了一批印度、缅甸题材的山水与人物画;徐悲鸿则于1940年间创作了《泰戈尔像》与《印度妇人像》等人物画。高剑父与徐悲鸿都能结合自己的风格，构出所画对象的形貌特色，是中国画画世界一个良好开端。</p><p>　　起始于解放后至文革前的第二阶段，有机会参与画世界的画家人数渐多，作品数量渐增。其中石鲁1955年画印度、1956年画埃及的风景与人物;1957年，傅抱石画罗马尼亚、捷克斯洛伐克风景，李可染画德国风景;另有张大千1960年以后画日本、瑞士等国山水，叶浅予画外国舞蹈等等。上列画家表现外国题材的作品都比较成功，加上及时出版与发表，影响较大。所以，可以将这一时期称之为初见成效阶段。</p><p>　　改革开放以后可称之为第三阶段，即普及提高阶段。画家们借助祖国开放之利、经济上升之便、出国考察采风与创作作品者越来越多，但被艺术界公认的作家与作品且有限。所以普及是事实，提高且是这一代画家所面临的攻关项目。怎样表现外国风情，怎样处理好传统与创新的关系，怎样凸现个人语言风格与时代精神风貌，怎样超越前人画世界的成就……这些都是大家所关心与面临的重要课题。</p><p>　　徐湖平院长任内嘱我设想一个重要的、具有可操作性的艺术创作选题，利用南博的资源，江苏美术力量的优势与有实力的、对文化艺术感兴趣的投资机构合作做一件有意义的事情。我以往在出国工作考察期间，常为异国风光与情调所激动，同时积累了不少外国风情的资料与素材，心中做着“画遍全世界”的梦。所以，当徐院长提到重要选题之时，我便提出了“中国画画世界”的大题目。徐院长当即首肯，并要我尽快形成可操作的策划书。于是“中国画画世界”便由理想化作为计划。</p><p>　　“中国画画世界”的投资代表江小群先生是我认识多年的朋友，当我与他谈到这个题目时，他说：“有意思，这个项目就由我来投资了。”徐院长与江总也是一见如故，当即敲定了合作的关系。真没想到这么快就找到了合作伙伴。接着便联络江苏年龄在45—55岁之间的江苏中年实力派画家自愿签约参加该活动，也得到了大多数预选画家的支持，加盟这一原创的艺术活动与科研项目。</p><p>　　按照本人的预想与愿望，我希望通过这个活动来创造江苏乃至全国美术史上的一个新的篇章。这个画家群体最终将成为“世界画派”，他们创作的作品与完成的业绩能够继续江苏历代美术的辉煌。这虽', '121217231550932zjv9ypx3z9z5y.jpg'),
(30, '''<div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203506d26gudox52shz7gl.jpg" border="0" height="338" width="600" /></div><p>2009年5月20日，在民族宫看了一个俄罗斯三人油画展，这三位画家是目前在俄罗斯很有影响力的画家，而且都毕业于著名的列宾美院。此次展览共展出了150幅作品，其中还包括了一部分他们的素描。在北京为期10天的展览已经卖掉了40张作品，最低的成交金额都在15000千欧元，画家们自己都没有想到，中国有如此之大的销售市场，这些作品大部分被行家收藏了。北京展览之后，他们将在上海继续办展。<br /></p><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507qmx0hht7dx1baqxz.jpg" border="0" height="325" width="500" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/20350773iwi17bl0rhvi3r.jpg" border="0" height="611" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507uxd1s9svj71vn1zx.jpg" border="0" height="563" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507an95axb4cabf9f4i.jpg" border="0" height="533" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/2035070urzbrqc9sjblts0.jpg" border="0" height="533" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507dx500ddyll0izv65.jpg" border="0" height="442" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507p7a7p1fza278uftk.jpg" border="0" height="520" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507q2j4sn1w4wnaz2yr.jpg" border="0" height="560" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507ho9pssb6h8pss04n.jpg" border="0" height="590" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507l5u4ui9zlelh4kcc.jpg" border="0" height="302" width="400" /></div><div align="center"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203507hn6', '121217203506d26gudox52shz7gl.jpg'),
(31, '''<p style="text-align:center;"><a href="http://www.d1wh.com/data/attachment/portal/201106/15/203827bsz9oho0bmoiovo1.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203827bsz9oho0bmoiovo1.jpg" /></a></p><p>“实者慧——邹佩珠、李小可、李珠、李庚捐赠<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C0%EE%BF%C9%C8%BE">李可染</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D7%F7%C6%B7">作品</span>展”将于2009年6月1日在<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%B1%B1%BE%A9">北京</span>画院<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C3%C0%CA%F5%B9%DD">美术馆</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BF%AA%C4%BB">开幕</span>,<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D5%B9%C0%C0">展览</span>以李可染夫人邹佩珠及其子女的捐赠<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BB%EE%B6%AF">活动</span>为契机，共展出李可染<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D6%D0%B9%FA">中国</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BB%AD%D7%F7">画作</span>品108幅、水彩画作品13幅，这个展览涵盖了李可染这位中国<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C9%BD%CB%AE%BB%AD">山水画</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D2%D5%CA%F5">艺术</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%B4%F3%CA%A6">大师</span>自二十世纪40年代至80年代的<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BE%AB%C6%B7">精品</span>，展览将持续到月底。</p><p style="text-align:center;"><a href="http://www.d1wh.com/data/attachment/portal/201106/15/203842urcnmulamnrlqu0c.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/203842urcnmulamnrlqu0c.jpg" /></a></p><p>此次展览将利用<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C3%C0', '121217203827bsz9oho0bmoiovo1.jpg'),
(32, '''<div align="center"><img style="cursor:pointer" alt="树杪百重泉 110.9×79.2cm 1982年" src="http://www.d1wh.com/data/attachment/portal/201106/15/20370102s2zav05o5rjsji.jpg" border="0" height="346" width="480" /><br /><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C0%EE%BF%C9%C8%BE">李可染</span> 树杪百重泉 110.9×79.2cm 1982年</div><p>6月1日<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%B1%B1%BE%A9">北京</span>画院隆重推出“实者慧——邹佩珠、李小可、李珠、李庚捐赠李可染<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D7%F7%C6%B7">作品</span>展”。<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D5%B9%C0%C0">展览</span>由全国政协<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%CA%E9%BB%AD">书画</span>室、北京画院主办，以李可染夫人邹佩珠及其子女的捐赠<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BB%EE%B6%AF">活动</span>为契机，展出李可染<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D6%D0%B9%FA">中国</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BB%AD%D7%F7">画作</span>品108幅、水彩画作品13幅，涵盖了李可染自20世纪40年代至80年代的<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BE%AB%C6%B7">精品</span>。 </p><p><br />李可染<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D7%F7%C6%B7%D5%B9">作品展</span>是北京画院“二十世纪<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C3%C0%CA%F5">美术</span>大家系列展览”中最为重要的<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%D2%D5%CA%F5">艺术</span>专题之一。此次展览利用了三个展厅陈列作品，展品中既有李可染早年创作的《天王送子图》、《执扇仕女图》、《卖唱图》、《钟馗送妹图》等<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%BE%AD%B5%E4">经典</span><span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C8%CB%CE%EF%BB%AD">人物画</span>作品，也有奠定其<span class="t_tag" href="http://www.art9966.com/200912/Discuz/tag.php?name=%C9%BD%CB%AE%BB%AD">山水画</span>巨匠地位的代表作品《夕照中的重庆山城', '12121720370102s2zav05o5rjsji.jpg'),
(34, '''<div><h2><div><span style="font-size:16px;"><div><div>中国经济网<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%B1%B1%BE%A9">北京</span>6月15日讯(记者徐克强)6月14日<br /><br />由中国山水画研究院、<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%D1%EE%D1%E5">杨彦</span>画友会、中央数字电视《<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%CA%E9%BB%AD">书画</span><span class="t_tag" href="http://www.d1wh.com/tag.php?name=%C3%FB%BC%D2">名家</span>》栏目、茂林阁<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%CE%C4%BB%AF">文化</span>经纪公司共同发起的“打开西部文化之窗——艺术家走进西部”活动在北京正式启动。<br /><br />出席启动仪式的艺术家有：中国山水画研究院院长陈克永、北京<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%C3%C0%CA%F5">美术</span>家协会副主席程振国、中国山水画研究院副院长李春海、中国山水画研究院常务院长王梦湖、中国山水画研究院副院长师恩钊、于永茂、长锻铁、<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%CA%C0%BD%E7">世界</span>华人美术家协会山水画委员会主席杨彦、中国美协敦煌创作中心副主任程风子、长安<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%CB%AE%C4%AB">水墨</span>丹林艺术研究会名誉会长丹林、<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%BB%AD%BC%D2">画家</span>陈虹等。<br /><br />中央数字电视《书画名家》栏目制片人薛刚、王茂也出席了启动仪式。 我国西部地区地域广阔、民族众多，在长期的历史变迁中孕育了灿烂的历史文化艺术。为进一步推进西部地区文化艺术发展，与会艺术家们一致表示，将积极参加“打开西部文化之窗——走进西部”活动。中国山水画研究院院长陈克永说:为将文化大繁荣、大发展落到实处，作为现代文化艺术的发起者，我们有义务、有责任深入西部地区，把我国其他地区文化艺术融合到西部地区、传播到西部地区，使西部地区爱好文化艺术的人民感受到文化大繁荣大发展带来的成果。这是当代中国艺术家们肩上共同担负的历史责任。我们将努力使西部地区的艺术和文化得到快速发展和世人的认可。这也是“打开西部文化之窗——走进西部”活动的意义所在。职业画家杨彦说：为使艺术在西部地区山区的孩子身上得到传承，我们画友会愿意真诚服务于西部地区。画家程风子表示，愿意将自己的艺术知识和技能传授给西部地区爱好艺术的中小学生，用实际行动表达对西部地区人民的爱。生长在西部地区的艺术家丹林、陈虹更是表达了自己的愿望：要用毕生精力为西部地区艺术文化发展而努力，为西部地区的文化事业献出自己的人生。</div><div><img src="http://www.art9966.com/uploads/allimg/100713/20141HP0-0.jpg" border="0" height="415" width="622" /></div><p>出席“<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%D2%D5%CA%F5">艺术</span>家走进西部”<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%BB%EE%B6%AF">活动</span>启动仪式的<span class="t_tag" href="http://www.d1wh.com/tag.php?name=%D2%D5%CA%F5%BC%D2">艺术家</span>等合影。</p><div><img src="http://www.art9966.com/uploads/', ' '),
(35, '''<div><p style="text-align:center;"><a href="http://www.d1wh.com/data/attachment/portal/201106/15/204315vxyiz0ja03qy38f0.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/204315vxyiz0ja03qy38f0.jpg" /></a></p><p style="text-align:center">照片左至右：范扬 萧平 常进 徐乐乐 杨彦 庄天明等艺术家</p><p><br /><span style="color:#993300">中国画@画世界——东欧行（第四届） 于2008年6月17日北京首都机场起飞。<br />行程：俄罗斯——奥地利——捷克 斯洛伐克——匈牙利<br /></span><br />由南京博物院主办，计划以八年时间周游包括南北极在内的七大洲，挥写全球山河大地、风土人情之精粹。八年活动结束，精选200幅优秀作品，出版大型画集，花两年时间到全国各大城市、世界有关国家巡回展览，向全国和世界热爱艺术的观众，展示当代中国画家表现与创造的才华，以及中国画艺术语言形式开拓发展的巨大潜能。该项活动堪称前无古人，举世无双的划时代壮举。<br /><br />为什么要实施工程如此浩大的艺术计划?徐湖平院长揭示其巨大的文化意义和学术价值：首先，中国画经历了近百年的颠波起伏之后，如今正以其丰富多彩的形式风貌和独特的艺术语言征服越来越多的中外观众，屹立于世界艺术之林。值此中国腾飞之际，进一步打造中国画的世界品牌，正是顺应了天时地利人和。其次，江苏自古以来绘画人才辈出，其比率在全国，乃至在世界首屈一指。20世纪由傅抱石、钱松岩等创立的“新金陵画派”创造了全国画坛瞩目的辉煌业绩。当今江苏画家能否再续辉煌，主动担当起弘扬中国画艺术的重任?相信今天的签约画家将会全力以赴，对这个问题奉上满意的答卷。南京博物院作为古今艺术品珍藏、研究、展示的机构和素质教育的重要基地，牵头落实该计划也是义不容辞的责任。而投资单位南京金基房地产开发有限公司为弘扬民族艺术勇于投入，回报社会的公德尤为难能可贵，令人鼓舞。最后，中国画传统是一个自身不断更新，并与世界各民族艺术交流互动的生态流程。而地球村时代的中国画家更应当胸怀全球，努力打造“世界画派”，该计划的实施能够有力激发中国画的良性生态，促进对于中国画未来发展型态的学术研究，进一步确立中国绘画的优越性与国际地位。</p></div><p><br /></p>''', '121218204315vxyiz0ja03qy38f0.jpg'),
(36, '''<div class="vm_pagetitle xw1">中国画@画世界——东欧行（第四届）活动圆满结束</div><div><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/211459g2vv5gxp6v34pftt.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/211459g2vv5gxp6v34pftt.jpg" /></a></p></div><div> </div><div><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/211727rxrqnpqdy4wpbkxv.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/211727rxrqnpqdy4wpbkxv.jpg" /></a></p><p> </p><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/211722qg0akk406jjjjh6m.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/211722qg0akk406jjjjh6m.jpg" /></a></p><p> </p><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/21171637g31wcuogzutg7u.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/21171637g31wcuogzutg7u.jpg" /></a></p></div><div> </div><div><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/211709u605aut6v9qteh6b.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/211709u605aut6v9qteh6b.jpg" /></a></p><p> </p></div><div><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/21144769xlvxqshws5rzir.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/21144769xlvxqshws5rzir.jpg" /></a></p></div><div> </div><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/2114449j2ijp9hr829srqw.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/2114449j2ijp9hr829srqw.jpg" /></a></p><p> </p><p><a href="http://www.d1wh.com/data/attachment/portal/201106/15/211703fe3efsf2mdebiffm.jpg" target="_blank"><img src="http://www.d1wh.com/data/attachment/portal/201106/15/211703fe3efsf2mdebiffm.jpg" /></a></p><p><br /></p>''', '121218211459g2vv5gxp6v34pftt.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `bl_news_type`
--

CREATE TABLE IF NOT EXISTS `bl_news_type` (
  `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章状态ID',
  `typeName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `bl_news_type`
--

INSERT INTO `bl_news_type` (`tid`, `typeName`) VALUES
(1, '发布'),
(2, '草稿'),
(3, '未审核'),
(4, '回收站');

-- --------------------------------------------------------

--
-- 表的结构 `bl_position`
--

CREATE TABLE IF NOT EXISTS `bl_position` (
  `pid` int(11) NOT NULL,
  `positionname` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告位置';

-- --------------------------------------------------------

--
-- 表的结构 `bl_project_data`
--

CREATE TABLE IF NOT EXISTS `bl_project_data` (
  `did` int(11) NOT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `bl_project_datacol` varchar(45) DEFAULT NULL,
  `bl_subject_news_snid` int(11) NOT NULL,
  `createTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`did`,`bl_subject_news_snid`),
  KEY `fk_bl_project_data_bl_subject_news1_idx` (`bl_subject_news_snid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bl_role`
--

CREATE TABLE IF NOT EXISTS `bl_role` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_shops`
--

CREATE TABLE IF NOT EXISTS `bl_shops` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `shopName` varchar(20) DEFAULT NULL COMMENT '店名',
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='宝隆商家' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_shops_imgs`
--

CREATE TABLE IF NOT EXISTS `bl_shops_imgs` (
  `id` int(11) NOT NULL,
  `thumb` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商家--图片';

-- --------------------------------------------------------

--
-- 表的结构 `bl_subject`
--

CREATE TABLE IF NOT EXISTS `bl_subject` (
  `pid` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `bl_subject_category_cid` int(11) NOT NULL,
  `bl_subject_category_bl_subject_ sid` int(11) NOT NULL,
  `recommendation` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`,`bl_subject_category_cid`,`bl_subject_category_bl_subject_ sid`),
  KEY `fk_bl_project_bl_subject_category1_idx` (`bl_subject_category_cid`,`bl_subject_category_bl_subject_ sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='每个专题\n';

-- --------------------------------------------------------

--
-- 表的结构 `bl_subject_category`
--

CREATE TABLE IF NOT EXISTS `bl_subject_category` (
  `cateid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(10) DEFAULT NULL COMMENT '栏目名',
  `bl_subject_ sid` int(11) NOT NULL,
  PRIMARY KEY (`cateid`,`bl_subject_ sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='专题栏目' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_subject_news`
--

CREATE TABLE IF NOT EXISTS `bl_subject_news` (
  `bl_subject_pid` int(11) NOT NULL,
  `bl_subject_bl_subject_category_cid` int(11) NOT NULL,
  `bl_subject_bl_subject_category_bl_subject_ sid` int(11) NOT NULL DEFAULT '0',
  `snid` int(11) NOT NULL AUTO_INCREMENT COMMENT '每个专题内的内容文件id',
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `recommendation` int(11) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `creatTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`snid`,`bl_subject_pid`,`bl_subject_bl_subject_category_cid`,`bl_subject_bl_subject_category_bl_subject_ sid`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `fk_bl_subject_news_bl_subject1` (`bl_subject_pid`,`bl_subject_bl_subject_category_cid`,`bl_subject_bl_subject_category_bl_subject_ sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='每个专题内的文章' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_user`
--

CREATE TABLE IF NOT EXISTS `bl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(36) DEFAULT NULL,
  `creatime` datetime DEFAULT NULL,
  `bl_role_rid` int(11) NOT NULL,
  `bl_news_ nid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bl_user_bl_role_idx` (`bl_role_rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_user_role`
--

CREATE TABLE IF NOT EXISTS `bl_user_role` (
  `rid` int(11) DEFAULT NULL COMMENT '角色ID\\n',
  `uid` varchar(45) DEFAULT NULL COMMENT '用户ID\\n',
  `bl_user_rolecol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bl_video`
--

CREATE TABLE IF NOT EXISTS `bl_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL COMMENT '介绍',
  `source` varchar(10) DEFAULT NULL COMMENT '来源',
  `description` varchar(45) DEFAULT NULL,
  `bl_user_id` int(11) NOT NULL,
  `createTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `thumb` varchar(45) DEFAULT NULL,
  `recommendation` int(11) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `bl_video_category_cid` int(11) NOT NULL,
  PRIMARY KEY (`id`,`bl_video_category_cid`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `fk_bl_video_bl_user1_idx` (`bl_user_id`),
  KEY `fk_bl_video_bl_video_category1_idx` (`bl_video_category_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_video_category`
--

CREATE TABLE IF NOT EXISTS `bl_video_category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 限制导出的表
--

--
-- 限制表 `bl_project_data`
--
ALTER TABLE `bl_project_data`
  ADD CONSTRAINT `fk_bl_project_data_bl_subject_news1` FOREIGN KEY (`bl_subject_news_snid`) REFERENCES `bl_subject_news` (`snid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `bl_subject`
--
ALTER TABLE `bl_subject`
  ADD CONSTRAINT `fk_bl_project_bl_subject_category1` FOREIGN KEY (`bl_subject_category_cid`, `bl_subject_category_bl_subject_ sid`) REFERENCES `bl_subject_category` (`cateid`, `bl_subject_ sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `bl_subject_news`
--
ALTER TABLE `bl_subject_news`
  ADD CONSTRAINT `fk_bl_subject_news_bl_subject1` FOREIGN KEY (`bl_subject_pid`, `bl_subject_bl_subject_category_cid`, `bl_subject_bl_subject_category_bl_subject_ sid`) REFERENCES `bl_subject` (`pid`, `bl_subject_category_cid`, `bl_subject_category_bl_subject_ sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `bl_user`
--
ALTER TABLE `bl_user`
  ADD CONSTRAINT `fk_bl_user_bl_role` FOREIGN KEY (`bl_role_rid`) REFERENCES `bl_role` (`rid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `bl_video`
--
ALTER TABLE `bl_video`
  ADD CONSTRAINT `fk_bl_video_bl_user1` FOREIGN KEY (`bl_user_id`) REFERENCES `bl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bl_video_bl_video_category1` FOREIGN KEY (`bl_video_category_cid`) REFERENCES `bl_video_category` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
