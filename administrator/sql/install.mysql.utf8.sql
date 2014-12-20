CREATE TABLE IF NOT EXISTS `#__ammaperta_concessioni` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`data_pubblicazione` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`beneficiario` VARCHAR(255)  NOT NULL ,
`datifiscali` VARCHAR(255)  NOT NULL ,
`incarico` TEXT NOT NULL ,
`importo` DOUBLE NOT NULL ,
`assegnazione` VARCHAR(255)  NOT NULL ,
`ufficio` VARCHAR(255)  NOT NULL ,
`responsabile` VARCHAR(255)  NOT NULL ,
`allegato` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

