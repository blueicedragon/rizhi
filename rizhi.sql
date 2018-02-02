--
-- 用户表
--
CREATE TABLE `rz_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `sex` int(2) UNSIGNED NOT NULL,
  `mobile` VARCHAR(30) NOT NULL,
  `ip` VARCHAR (30) NOT NULL,
  `regtime` int(11) UNSIGNED NOT NULL,
  `status` int(2) UNSIGNED NOT NULL,
  `session_id` varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 项目表
--
CREATE TABLE `rz_project` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `regtime` int(11) UNSIGNED NOT NULL,
  `status` int(2) UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 工作日志表
--
CREATE TABLE `rz_log_work` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projectid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `worktime` float(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `regtime` int(11) UNSIGNED NOT NULL,
  `status` int(2) UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 管理员表
--
CREATE TABLE `rz_admin` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `logins` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `oldlogintime` int(11) UNSIGNED NOT NULL,
  `oldlogin_ip` varchar(15) NOT NULL,
  `oldlogin_area` varchar(50) NOT NULL,
  `lastlogintime` int(11) UNSIGNED NOT NULL,
  `lastlogin_ip` varchar(15) NOT NULL,
  `lastlogin_area` varchar(50) NOT NULL,
  `info_name` varchar(50) NOT NULL,
  `info_qq` int(20) UNSIGNED NOT NULL,
  `info_msn` varchar(255) NOT NULL,
  `info_mail` varchar(255) NOT NULL,
  `info_tel` varchar(30) NOT NULL,
  `info_phone` varchar(20) NOT NULL,
  `info_photo` varchar(255) NOT NULL,
  `info_company` varchar(100) NOT NULL,
  `info_department` varchar(30) NOT NULL,
  `info_add` varchar(255) NOT NULL,
  `info_post` varchar(30) NOT NULL,
  `info_ZipCode` varchar(30) NOT NULL,
  `addTime` int(11) UNSIGNED NOT NULL,
  `upDataTime` int(11) UNSIGNED NOT NULL,
  `purview` text NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `salt` int(8) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 插入管理员
--
INSERT INTO `rz_admin` (`id`, `name`, `password`, `logins`, `oldlogintime`, `oldlogin_ip`, `oldlogin_area`, `lastlogintime`, `lastlogin_ip`, `lastlogin_area`, `info_name`, `info_qq`, `info_msn`, `info_mail`, `info_tel`, `info_phone`, `info_photo`, `info_company`, `info_department`, `info_add`, `info_post`, `info_ZipCode`, `addTime`, `upDataTime`, `purview`, `session_id`, `salt`) VALUES
(1, 'admin', '4fec2b459ebb9ef1fb1a3c456548640e', 317, 1510192024, '127.0.0.1', '局域网-对方和您在同一内部网', 1510204386, '127.0.0.1', ' 未分配或者内网IP---', 'hu', 0, '', '', '', '', 'Upload/day_160305/201603051305558990.jpg', 'gs', '123123', '', 'zhiwu', '', 0, 1457183148, '', 'i9iipgbqkc7fo867519ui6ufh5', 1209),
(2, 'test', '3f567c8c0350762cf41fac24f1194f6f', 8, 1458923448, '192.168.0.89', '局域网-对方和您在同一内部网', 1458980825, '192.168.0.89', '局域网-对方和您在同一内部网', '测试管理员', 0, '', '', '', '', '', '', '', '', '', '', 1451662066, 1458920832, '{"Config":"4"}', '42c29e9a3496c28fb4365b2a9c45131f', 1209);

--
-- 管理员session表
--
CREATE TABLE `rz_admin_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

ALTER TABLE `rz_admin_session`
  ADD UNIQUE KEY `session_id` (`session_id`);


--
-- 操作日志表
--
CREATE TABLE `rz_log_action` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mName` varchar(20) NOT NULL,
  `addTime` int(11) UNSIGNED NOT NULL,
  `status` int(2) UNSIGNED NOT NULL,
  `type` int(10) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `aName` varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 登录日志表
--
CREATE TABLE `rz_log_login` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `loginDate` int(10) UNSIGNED NOT NULL,
  `loginIp` varchar(15) NOT NULL,
  `loginArea` varchar(255) NOT NULL,
  `loginName` varchar(60) NOT NULL,
  `loginStatus` int(2) UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 表的结构 `rz_auth_group`
--

CREATE TABLE `rz_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- 表的结构 `rz_auth_group_access`
--

CREATE TABLE `rz_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `rz_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);


--
-- 表的结构 `rz_auth_rule`
--

CREATE TABLE `rz_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `ismenu` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `rz_auth_rule`
  ADD UNIQUE KEY `name` (`name`);