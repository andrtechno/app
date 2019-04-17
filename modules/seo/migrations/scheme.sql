CREATE TABLE IF NOT EXISTS `{prefix}seo_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url_id` (`url_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `{prefix}seo_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text,
  `h1` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `{prefix}seo_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_id` int(11) NOT NULL,
  `param` varchar(255) DEFAULT NULL,
  `obj` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `url_id` (`url_id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `{prefix}redirects`;
CREATE TABLE `{prefix}redirects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_from` varchar(255) DEFAULT NULL,
  `url_to` varchar(255) DEFAULT NULL,
  `switch` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET={charset};



INSERT INTO `{prefix}authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Seo.Default.*', 1, 'SEO (*)', NULL, 'N;'),
('Seo.Default.Index', 0, 'Список SEO ссылок', NULL, 'N;'),
('Seo.Default.Delete', 0, 'Удаление SEO ссылок', NULL, 'N;'),
('Seo.Default.Update', 0, 'Редактирование SEO ссылок', NULL, 'N;'),
('Seo.Default.Create', 0, 'Добавление SEO ссылок', NULL, 'N;'),
('Seo.Redirects.*', 1, 'SEO Редирект (*)', NULL, 'N;'),
('Seo.Redirects.Index', 0, 'Список редиректов', NULL, 'N;'),
('Seo.Redirects.Delete', 0, 'Удаление редиректов', NULL, 'N;'),
('Seo.Redirects.Update', 0, 'Редактирование редиректа', NULL, 'N;'),
('Seo.Redirects.Create', 0, 'Добавление редиректа', NULL, 'N;'),
('Seo.Redirects.Switch', 0, 'Скрыть/показать редирект', NULL, 'N;'),
('Seo.Settings.*', 1, 'Настройки SEO (*)', NULL, 'N;'),
('Seo.Settings.Index', 0, 'Настройки SEO', NULL, 'N;');