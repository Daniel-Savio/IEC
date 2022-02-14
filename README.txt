Código para tabelas do banco


CREATE TABLE `xmlfiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xml_file_name` varchar(40) COLLATE utf8_bin NOT NULL COMMENT 'Nome do arquivo xml',
  `xml_file_path` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Caminho padrão "ext/"',
  `csv_id` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'ID do csv ligado a esse xml',
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE = utf8_bin



CREATE TABLE `csvfiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `csv_file_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `csv_file_path` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE = utf8_bin