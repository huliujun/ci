-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-15 12:44:14
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父节点',
  `filepath` varchar(128) NOT NULL DEFAULT '' COMMENT '文件路径',
  `filename` varchar(40) NOT NULL DEFAULT '' COMMENT '报表文件名称',
  `remarks` varchar(64) NOT NULL DEFAULT '' COMMENT '备注',
  `group_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0非组文件；1组文件目录；2组文件成员；==1时group_ids字段要填写组ID',
  `group_ids` varchar(1024) NOT NULL DEFAULT '' COMMENT '如果是个组权限，就用JSON放要显示的ID进去',
  `title_name` varchar(40) NOT NULL DEFAULT '' COMMENT '报表名称',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '小的排前面',
  `show` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示；1显示',
  `open_all` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否对所有用户开放;1是',
  `dir_icon` varchar(100) NOT NULL DEFAULT '' COMMENT '报表目录图标',
  `history` int(11) NOT NULL DEFAULT '0' COMMENT '是否记住历史；1是',
  `target` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否新窗口打开',
  PRIMARY KEY (`id`),
  KEY `filepath` (`filepath`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='报表文件表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `filepath`, `filename`, `remarks`, `group_type`, `group_ids`, `title_name`, `order`, `show`, `open_all`, `dir_icon`, `history`, `target`) VALUES
(1, 0, '', '项目1', '', 0, '', '', 0, 1, 0, '', 0, 0),
(2, 0, '', '项目2', '', 0, '', '', 0, 1, 0, '', 0, 0),
(3, 1, '/test/index', '数据库my_db', '', 0, '', '', 1, 1, 0, '', 0, 0),
(4, 1, '/test/index1', '测试1', '', 0, '', '', 0, 1, 0, '', 0, 0),
(5, 2, '/demo/index', 'demo测试', '', 0, '', '', 0, 1, 0, '', 0, 0),
(6, 2, '/demo/foo', 'foo', '', 0, '', '', 1, 1, 0, '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
