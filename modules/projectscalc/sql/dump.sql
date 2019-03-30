CREATE TABLE IF NOT EXISTS `{prefix}projects_calc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `switch` tinyint(1) NOT NULL DEFAULT '1',
  `ordern` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `{prefix}projects_calc_translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `title` varchar(140) DEFAULT NULL,
  `full_text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;


CREATE TABLE IF NOT EXISTS `{prefix}projects_calc_modules_translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `full_text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;



CREATE TABLE IF NOT EXISTS `{prefix}projects_calc_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `documentation_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;


CREATE TABLE IF NOT EXISTS `{prefix}projects_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;



INSERT INTO `{prefix}projects_calc` (`id`, `user_id`, `date_create`, `date_update`, `switch`, `ordern`) VALUES
(1, 1, '2016-09-08 20:42:35', '2016-09-08 20:49:41', 1, 1);


INSERT INTO `{prefix}projects_calc_modules` (`id`, `type_id`, `documentation_id`, `price`) VALUES
(1, 1, NULL, '20'),
(2, 1, NULL, '200'),
(3, 1, NULL, '500'),
(4, 1, NULL, '100'),
(5, 1, NULL, '300');


INSERT INTO `{prefix}projects_calc_modules_translate` (`id`, `object_id`, `language_id`, `title`, `full_text`) VALUES
(1, 1, 1, 'Новости', '<p>fsadafsdafsdfasd</p>'),
(2, 1, 2, 'Новости', '<p>fsadafsdafsdfasd</p>'),
(3, 1, 15, 'Новости', '<p>fsadafsdafsdfasd</p>'),
(4, 2, 1, 'Интернет магазин Lite', ''),
(5, 2, 2, 'Интернет магазин Lite', ''),
(6, 2, 15, 'Интернет магазин Lite', ''),
(7, 3, 1, 'Интернет магазин Pro', ''),
(8, 3, 2, 'Интернет магазин Pro', ''),
(9, 3, 15, 'Интернет магазин Pro', ''),
(10, 4, 1, 'Корзина Lite', ''),
(11, 4, 2, 'Корзина Lite', ''),
(12, 4, 15, 'Корзина Lite', ''),
(13, 5, 1, 'Корзина Pro', ''),
(14, 5, 2, 'Корзина Pro', ''),
(15, 5, 15, 'Корзина Pro', '');

-- --------------------------------------------------------



INSERT INTO `{prefix}projects_calc_translate` (`id`, `object_id`, `language_id`, `title`, `full_text`) VALUES
(1, 1, 1, 'Aprilgroup', '<p>fsadfdsafda</p>'),
(2, 1, 2, 'test', '<p>fsadfdsafda</p>'),
(3, 1, 15, 'test', '<p>fsadfdsafda</p>');


INSERT INTO `{prefix}projects_modules` (`id`, `mod_id`, `project_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 3, 1),
(4, 5, 1);
