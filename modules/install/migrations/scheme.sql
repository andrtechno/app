DROP TABLE IF EXISTS `{prefix}modules`;
CREATE TABLE `{prefix}modules` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `switch` ENUM('1','0') NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};


DROP TABLE IF EXISTS `{prefix}settings`;
CREATE TABLE `{prefix}settings` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT '',
  `key` varchar(255) DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};