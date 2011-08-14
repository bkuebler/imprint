/* version 3.0.1 $Id$ */

ALTER TABLE `#__impressum` ADD `templateemail` varchar(255) NOT NULL default '';
ALTER TABLE `#__impressum` CHANGE `aktiv` `default` tinyint NOT NULL default 0;