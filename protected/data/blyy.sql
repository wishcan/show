-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 12 日 09:57
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告页面和位置' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bl_advert_data`
--

CREATE TABLE IF NOT EXISTS `bl_advert_data` (
  `aid` int(11) NOT NULL,
  `thumb` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bl_arters`
--

CREATE TABLE IF NOT EXISTS `bl_arters` (
  `aid` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `bl_category`
--

INSERT INTO `bl_category` (`id`, `cname`, `pid`, `type`) VALUES
(1, '一级栏目', 0, 1),
(2, '新闻', 1, 1),
(3, '评论', 1, 1),
(4, '专题', 1, 1),
(5, '拍卖收藏', 1, 1),
(6, '艺术家网', 1, 1),
(7, '当代艺术', 1, 1),
(8, '画廊', 1, 1),
(10, '展览', 1, 1),
(11, '摄影', 1, 1),
(12, '综合', 2, 1),
(13, '教育', 2, 1),
(14, '出版', 2, 1),
(15, '收藏', 2, 1),
(16, '市场', 2, 1),
(17, '综合', 3, 1),
(18, '展览', 3, 1),
(19, '收藏', 3, 1),
(21, '预展', 5, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='每一个展览' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `bl_gallery`
--

INSERT INTO `bl_gallery` (`gid`, `uid`, `title`, `description`, `typeID`, `cid`, `recommendation`, `tag`, `createTime`, `updateTime`, `type_id`) VALUES
(1, 0, 'adsa', 'dasd', NULL, 18, NULL, 'dsa', '2012-12-11 06:39:17', NULL, 1),
(2, 0, 'test', 'test', NULL, 18, NULL, '111', '2012-12-11 06:52:22', NULL, 1),
(3, 0, 'd', 'das', NULL, 18, NULL, '1', '2012-12-11 06:54:22', NULL, 1),
(4, 0, 'tet', 'test', NULL, 18, NULL, '1', '2012-12-11 06:57:08', NULL, 1),
(5, 0, '1', '1', NULL, 18, NULL, '1', '2012-12-11 06:58:09', NULL, 1),
(6, 0, '16', '16', NULL, 18, NULL, '1', '2012-12-11 06:59:36', NULL, 1);

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
  `gid` int(11) NOT NULL COMMENT 'gallery的主键ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='展览信息内容表\n';

--
-- 转存表中的数据 `bl_gallery_data`
--

INSERT INTO `bl_gallery_data` (`thumb`, `title`, `gid`) VALUES
('3-3.JPG', NULL, 5),
('4-1.JPG', NULL, 5),
('6-3.JPG', NULL, 5),
('1212/4-1.JPG', NULL, 6),
('1212/6-3.JPG', NULL, 6),
('1212/7-8.JPG', NULL, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `bl_news`
--

INSERT INTO `bl_news` (`id`, `cid`, `title`, `decription`, `createTime`, `source`, `bl_user_id`, `click`, `recomendation`, `tag`, `updateTime`, `type_id`, `home_cate`, `home_top`, `children_top`) VALUES
(1, 0, 'postpost', '', '2012-12-05 03:07:12', '', 0, 0, NULL, '', NULL, 1, 0, 0, 0),
(5, 0, '擦速度', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', NULL, NULL, 0, 0, 0),
(6, 0, '123', '', '0000-00-00 00:00:00', '', 123, 0, NULL, '', NULL, NULL, 0, 0, 0),
(7, 0, 'ddsadsad', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', NULL, NULL, 0, 0, 0),
(8, 0, 'sadsad', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', NULL, NULL, 0, 0, 0),
(9, 0, 'dasdsa', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', NULL, NULL, 0, 0, 0),
(10, 0, '11', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', NULL, NULL, 0, 0, 0),
(11, 0, '1', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', NULL, NULL, 0, 0, 0),
(12, 13, '1111', '', '0000-00-00 00:00:00', '', 1, 0, NULL, '', '0000-00-00 00:00:00', NULL, 0, 0, 0),
(13, 1, 'dasdas', 'dasdas', '2012-12-11 07:55:05', 'das', 0, 0, 1, 'asd', NULL, 1, 0, 0, 0),
(14, 1, 'asd', 'dsa', '2012-12-11 07:55:43', 'das', 0, 0, 1, 'das', NULL, 1, 0, 0, 0),
(15, 1, 'dasd', 'da', '2012-12-11 07:56:30', 'dsa', 0, 0, 1, 'dsa', NULL, 1, 0, 0, 0),
(16, 1, '213', '中文', '2012-12-11 07:59:16', '1', 0, 0, 1, '123', NULL, 1, 0, 0, 0),
(17, 1, 'test', '1', '2012-12-12 03:26:03', '1', 0, 0, 1, '1', NULL, 1, 0, 0, 0),
(18, 1, '123123213213', '11', '2012-12-12 03:28:59', '11', 0, 0, 1, '12312312312', NULL, 1, 0, 0, 0),
(19, 1, '112', '312', '2012-12-12 03:31:33', '213', 0, 0, 1, '123', NULL, 1, 0, 0, 0),
(20, 1, '21124124', '214', '2012-12-12 03:45:03', '214124', 0, 0, 1, '142', NULL, 1, 0, 0, 0),
(22, 1, 'asdsadasd', 'dsa', '2012-12-12 03:46:24', 'das', 0, 0, 1, 'dsa', NULL, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `bl_news_data`
--

CREATE TABLE IF NOT EXISTS `bl_news_data` (
  `nid` int(11) NOT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `thumb` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bl_news_data`
--

INSERT INTO `bl_news_data` (`nid`, `content`, `thumb`) VALUES
(0, ':content', ':thumb'),
(16, '''<p>321<br /></p>''', '1212116-3.JPG'),
(17, '''<p>1111111111<br /></p>''', '1212123-3.JPG'),
(18, '''<p>1231<br /></p>''', '1212126-3.JPG'),
(19, '''<p>231231123<br /></p>''', '12121211-19.JPG'),
(20, '''<p>4124124214<br /></p>''', '12121211-19.JPG'),
(22, '''<p>saddsa<br /></p>''', '1212124-1.JPG');

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
