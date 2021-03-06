DROP TABLE IF EXISTS `destoon_info_22`;
CREATE TABLE `destoon_info_22` (
  `itemid` bigint(20) unsigned NOT NULL auto_increment,
  `catid` int(10) unsigned NOT NULL default '0',
  `level` tinyint(1) unsigned NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `style` varchar(50) NOT NULL default '',
  `fee` float NOT NULL default '0',
  `keyword` varchar(255) NOT NULL default '',
  `pptword` varchar(255) NOT NULL default '',
  `hits` int(10) unsigned NOT NULL default '0',
  `comments` int(10) unsigned NOT NULL default '0',
  `thumb` varchar(255) NOT NULL default '',
  `thumb1` varchar(255) NOT NULL default '',
  `thumb2` varchar(255) NOT NULL default '',
  `thumbs` text NOT NULL,
  `username` varchar(30) NOT NULL default '',
  `groupid` smallint(4) unsigned NOT NULL default '0',
  `addtime` int(10) unsigned NOT NULL default '0',
  `adddate` date NOT NULL default '0000-00-00',
  `totime` int(10) unsigned NOT NULL default '0',
  `areaid` int(10) unsigned NOT NULL default '0',
  `company` varchar(100) NOT NULL default '',
  `vip` smallint(2) unsigned NOT NULL default '0',
  `validated` tinyint(1) unsigned NOT NULL default '0',
  `truename` varchar(30) NOT NULL default '',
  `telephone` varchar(50) NOT NULL default '',
  `fax` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `qq` varchar(20) NOT NULL default '',
  `wx` varchar(50) NOT NULL default '',
  `ali` varchar(30) NOT NULL default '',
  `skype` varchar(30) NOT NULL default '',
  `introduce` varchar(255) NOT NULL default '',
  `n1` varchar(100) NOT NULL,
  `n2` varchar(100) NOT NULL,
  `n3` varchar(100) NOT NULL,
  `v1` varchar(100) NOT NULL,
  `v2` varchar(100) NOT NULL,
  `v3` varchar(100) NOT NULL,
  `editor` varchar(30) NOT NULL default '',
  `edittime` int(10) unsigned NOT NULL default '0',
  `editdate` date NOT NULL default '0000-00-00',
  `ip` varchar(50) NOT NULL default '',
  `template` varchar(30) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `listorder` smallint(4) unsigned NOT NULL default '0',
  `islink` tinyint(1) unsigned NOT NULL default '0',
  `linkurl` varchar(255) NOT NULL default '',
  `filepath` varchar(255) NOT NULL default '',
  `note` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`itemid`),
  KEY `username` (`username`),
  KEY `edittime` (`edittime`),
  KEY `catid` (`catid`),
  KEY `areaid` (`areaid`),
  KEY `editdate` (`editdate`,`vip`,`edittime`)
) TYPE=MyISAM COMMENT='??????';

DROP TABLE IF EXISTS `destoon_info_data_22`;
CREATE TABLE `destoon_info_data_22` (
  `itemid` bigint(20) unsigned NOT NULL default '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY  (`itemid`)
) TYPE=MyISAM COMMENT='????????????';