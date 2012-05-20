/* version 3.1.0 $Id$ */

ALTER TABLE `#__imprint_imprints` ADD `remarks` TEXT NOT NULL AFTER `params`;
DROP TABLE IF EXISTS `#__imprints_relation`;