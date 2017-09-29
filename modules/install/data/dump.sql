DROP TABLE IF EXISTS `{prefix}language`;
CREATE TABLE `{prefix}language` (
  `id` SMALLINT(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `code` CHAR(2) DEFAULT '',
  `locale` CHAR(5) DEFAULT '',
  `is_default` ENUM('1','0') NOT NULL DEFAULT '0',
  `flag_name` CHAR(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `is_default` (`is_default`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}session`;
CREATE TABLE `{prefix}session` (
  `uname` varchar(50) NOT NULL,
  `user_login` varchar(50) DEFAULT NULL,
  `start_expire` CHAR(14) DEFAULT NULL,
  `expire` CHAR(14) DEFAULT NULL,
  `ip_address` CHAR(45) DEFAULT NULL,
  `user_agent` text,
  `user_type` tinyint(1) NOT NULL DEFAULT '0',
  `user_avatar` varchar(255) NOT NULL,
  `module` varchar(100) NOT NULL,
  `current_url` varchar(255) NOT NULL,
  UNIQUE KEY `uname` (`uname`),
  KEY `current_url` (`current_url`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}attachments`;
CREATE TABLE `{prefix}attachments` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(4) unsigned NOT NULL,
  `user_id` int(4) unsigned NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_main` ENUM('1','0') NOT NULL DEFAULT '0',
  `alt_title` varchar(255) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `user_id` (`user_id`),
  KEY `model` (`model`),
  KEY `is_main` (`is_main`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}user`;
CREATE TABLE `{prefix}user` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_registration` datetime NOT NULL,
  `date_birthday` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `login_ip` CHAR(45) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `user_agent` text NOT NULL,
  `language` varchar(2) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `recovery_key` varchar(20) DEFAULT NULL,
  `recovery_password` varchar(100) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `banned` ENUM('1','0') NOT NULL DEFAULT '0',
  `active` ENUM('1','0') NOT NULL DEFAULT '0',
  `subscribe` ENUM('1','0') NOT NULL DEFAULT '1',
  `message` ENUM('1','0') NOT NULL DEFAULT '1',
  `service` varchar(50) DEFAULT NULL,
  `edit_mode` ENUM('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS `{prefix}timeline`;
CREATE TABLE `{prefix}timeline` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(4) unsigned NOT NULL,
  `message` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` CHAR(45) NOT NULL,
  `user_agent` text NOT NULL,
  `user_platform` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}tag`;
CREATE TABLE `{prefix}tag` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}components`;
CREATE TABLE `{prefix}components` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `switch` ENUM('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `switch` (`switch`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

CREATE TABLE IF NOT EXISTS `{prefix}dekstop` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(4) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `addons` ENUM('1','0') NOT NULL DEFAULT '1',
  `columns` int(11) NOT NULL,
  `private` ENUM('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}modules`;
CREATE TABLE `{prefix}modules` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `switch` ENUM('1','0') NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}grid_columns`;
CREATE TABLE `{prefix}grid_columns` (
  `grid_id` varchar(255) NOT NULL,
  `module` varchar(25) DEFAULT NULL,
  `key` int(11) NOT NULL,
  `ordern` int(11) NOT NULL,
  UNIQUE KEY `grid_id` (`grid_id`,`key`),
  KEY `ordern` (`ordern`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};


DROP TABLE IF EXISTS `{prefix}menu`;
CREATE TABLE `{prefix}menu` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `switch` ENUM('1','0') NOT NULL DEFAULT '1',
  `ordern` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ordern` (`ordern`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}user_favorites`;
CREATE TABLE `{prefix}user_favorites` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(4) unsigned NOT NULL,
  `owner_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `model_class` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}blocks`;
CREATE TABLE `{prefix}blocks` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `widget` text NOT NULL,
  `position` enum('fly','left','right','top','bottom') NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0',
  `modules` varchar(255) NOT NULL,
  `action` varchar(6) DEFAULT NULL,
  `expire` int(11) NOT NULL DEFAULT '0',
  `switch` ENUM('1','0') NOT NULL DEFAULT '1',
  `ordern` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ordern` (`ordern`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};



DROP TABLE IF EXISTS `{prefix}blocks_translate`;
CREATE TABLE `{prefix}blocks_translate` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(4) unsigned NOT NULL,
  `language_id` int(4) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};


DROP TABLE IF EXISTS `{prefix}categories`;
CREATE TABLE `{prefix}categories` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(4) unsigned NOT NULL,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `seo_alias` varchar(255) NOT NULL,
  `switch` ENUM('1','0') NOT NULL DEFAULT '1',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime NOT NULL,
  `ordern` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `ordern` (`ordern`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}authassignment`;
CREATE TABLE `{prefix}authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

CREATE TABLE IF NOT EXISTS `{prefix}rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}authitem`;
CREATE TABLE `{prefix}authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}authitemchild`;
CREATE TABLE `{prefix}authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
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

DROP TABLE IF EXISTS `{prefix}settings_theme`;
CREATE TABLE `{prefix}settings_theme` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT '',
  `key` varchar(255) DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}notifications`;
CREATE TABLE `{prefix}notifications` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('order','comment') NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `status` ENUM('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}rating`;
CREATE TABLE `{prefix}rating` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `modul` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `host` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}dekstop_widgets`;
CREATE TABLE `{prefix}dekstop_widgets` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `dekstop_id` int(4) unsigned NOT NULL,
  `widget_id` varchar(255) NOT NULL,
  `column` int(11) NOT NULL,
  `ordern` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dekstop_id` (`dekstop_id`,`widget_id`),
  KEY `ordern` (`ordern`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};

DROP TABLE IF EXISTS `{prefix}banned_ip`;
CREATE TABLE `{prefix}banned_ip` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(4) unsigned NOT NULL COMMENT 'Who blocked',
  `ip_address` CHAR(45) NOT NULL,
  `reason` text NOT NULL,
  `date_create` datetime NOT NULL,
  `time` varchar(50) NOT NULL COMMENT 'End blocked',
  `timetime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};


INSERT INTO `{prefix}authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Admin', 1, NULL, NULL);

INSERT INTO `{prefix}authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
 ('Admin', 2, 'Администраторы', NULL, 'N;'),
 ('Authenticated', 2, 'Пользователи', NULL, 'N;'),
 ('Moderator', 2, 'Модератор', NULL, 'N;');

INSERT INTO `{prefix}language` (`id`, `name`, `code`, `locale`, `is_default`, `flag_name`) VALUES
 (1, 'Русский', 'ru', 'ru_RU', 1, 'ru.png');


INSERT INTO `{prefix}menu` (`id`, `label`, `url`, `switch`, `ordern`) VALUES
 (1, 'Главная', '/', 1, 1),
 (2, 'Новости', '/news', 1, 2);




ALTER TABLE `{prefix}grid_columns`
ADD CONSTRAINT `{prefix}grid_columns_ibfk_1` FOREIGN KEY (`module`) REFERENCES `{prefix}modules` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `{prefix}authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin.Auth.*', 1, 'Авторизация в админ-панель (*)', NULL, 'N;'),
('Admin.Default.*', 1, 'Главная страница админ-панели (*)', NULL, 'N;'),
('Admin.Dekstop.*', 1, 'Рабочий стол (*)', NULL, 'N;'),
('Admin.Dekstop.CreateWidget', 0, 'Добавление виджета на рабочий стол', NULL, 'N;'),
('Admin.Dekstop.Delete', 0, 'Удаление рабочего стола', NULL, 'N;'),
('Admin.Dekstop.DeleteWidget', 0, 'Удаление виджета с рабочего стола', NULL, 'N;'),
('Admin.Dekstop.Update', 0, 'Управление рабочим столом', NULL, 'N;'),
('Admin.Modules.*', 1, 'Модули (*)', NULL, 'N;'),
('Admin.Modules.Index', 0, 'Список модулей', NULL, 'N;'),
('Admin.Modules.Delete', 0, 'Удаление модулей', NULL, 'N;'),
('Admin.Modules.Install', 0, 'Установка модулей', NULL, 'N;'),
('Admin.Modules.Update', 0, 'Управление модулями', NULL, 'N;'),
('Admin.Modules.InsertSql', 0, 'Импорт SQL модулей', NULL, 'N;'),
('Admin.Security.*', 1, 'Безопасность (*)', NULL, 'N;'),
('Admin.Security.Index', 0, 'Настойка безопасности', NULL, 'N;'),
('Admin.Security.Banlist', 0, 'Список заблокированых пользователей', NULL, 'N;'),
('Admin.Security.Clear', 0, 'Очистка логов', NULL, 'N;'),
('Admin.Security.Logs', 0, 'Просмотр голов', NULL, 'N;'),
('Admin.Security.Update', 0, 'Блокировка пользователей', NULL, 'N;'),
('Admin.Database.*', 1, 'База данных (*)', NULL, 'N;'),
('Admin.Database.Index', 0, 'База данных', NULL, 'N;'),
('Admin.Database.Delete', 0, 'Удаление резервной копии', NULL, 'N;'),
('Admin.Settings.*', 1, 'Настройки (*)', NULL, 'N;'),
('Admin.Settings.Index', 0, 'Настройки', NULL, 'N;'),
('Admin.Languages.*', 1, 'Языки (*)', NULL, 'N;'),
('Admin.Languages.Index', 0, 'Список языков', NULL, 'N;'),
('Admin.Languages.Update', 0, 'Редактирование языков', NULL, 'N;'),
('Admin.Languages.Create', 0, 'Добавление языков', NULL, 'N;'),
('Admin.Languages.Online', 0, 'Онлайн переводчик', NULL, 'N;'),
('Admin.Translates.*', 1, 'Переводы (*)', NULL, 'N;'),
('Admin.Translates.Index', 0, 'Переводы', NULL, 'N;'),
('Admin.Translates.Application', 0, 'Перевод всего сайта', NULL, 'N;'),
('Admin.Blocks.*', 1, 'Блоки (*)', NULL, 'N;'),
('Admin.Blocks.Index', 0, 'Список блоки', NULL, 'N;'),
('Admin.Blocks.Create', 0, 'Добавление блоков', NULL, 'N;'),
('Admin.Blocks.Update', 0, 'Редактирование блоков', NULL, 'N;'),
('Admin.Blocks.Delete', 0, 'Удаление блоков', NULL, 'N;'),
('Admin.Blocks.Switch', 0, 'Скрыть/показать блок', NULL, 'N;'),
('Admin.Blocks.Sortable', 0, 'Сортировка блоков', NULL, 'N;'),
('Admin.FileEditor.*', 1, 'Файловый редактор (*)', NULL, 'N;'),
('Admin.FileEditor.Index', 0, 'Файловый редактор', NULL, 'N;'),
('Admin.Menu.*', 1, 'Меню (*)', NULL, 'N;'),
('Admin.Menu.Index', 0, 'Меню', NULL, 'N;'),
('Admin.Menu.Create', 0, 'Добавление пунктов меню', NULL, 'N;'),
('Admin.Menu.Update', 0, 'Редактирование пунктов меню', NULL, 'N;'),
('Admin.Menu.Delete', 0, 'Удаление пунктов меню', NULL, 'N;'),
('Admin.Menu.Switch', 0, 'Скрыть/показать пунктов меню', NULL, 'N;'),
('Admin.Menu.Sortable', 0, 'Сортировка пунктов меню', NULL, 'N;'),
('Admin.Service.*', 1, 'Обслуживание (*)', NULL, 'N;'),
('Admin.Service.Index', 0, 'Обслуживание', NULL, 'N;'),
('Admin.Service.Upgrade', 0, 'Обновление системы', NULL, 'N;'),
('Admin.Template.*', 1, 'Шаблоны (*)', NULL, 'N;'),
('Admin.Template.Index', 0, 'Шаблоны', NULL, 'N;'),
('Users.Default.*', 1, 'Пользователи (*)', NULL, 'N;'),
('Users.Default.Index', 0, 'Список пользователей', NULL, 'N;'),
('Users.Default.Update', 0, 'Редактирование пользователей', NULL, 'N;'),
('Users.Default.Create', 0, 'Добавление пользователей', NULL, 'N;'),
('Users.Default.Delete', 0, 'Удаление пользователей', NULL, 'N;');


