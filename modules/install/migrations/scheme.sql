DROP TABLE IF EXISTS `{prefix}modules`;
CREATE TABLE `{prefix}modules` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `className` varchar(255) DEFAULT '',
  `switch` tinyint(1) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};


DROP TABLE IF EXISTS `{prefix}settings`;
CREATE TABLE `{prefix}settings` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT '',
  `param` varchar(255) DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `param` (`param`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};


DROP TABLE IF EXISTS `{prefix}chat`;
CREATE TABLE `{prefix}chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` text,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;