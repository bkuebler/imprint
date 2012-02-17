/* version 3.1.0 $Id$ */
 
DROP TABLE IF EXISTS `#__imprints_relation`;
DROP TABLE IF EXISTS `#__imprints_imprints`;
DROP TABLE IF EXISTS `#__imprints_remarks`;

CREATE  TABLE IF NOT EXISTS `#__imprint_imprints` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL DEFAULT '' ,
  `default` TINYINT NOT NULL DEFAULT 0 ,
  `firma` VARCHAR(255) NOT NULL DEFAULT '' ,
  `name1` VARCHAR(255) NOT NULL DEFAULT '' ,
  `name2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `name3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `name4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `strasse` VARCHAR(255) NOT NULL DEFAULT '' ,
  `plz` VARCHAR(255) NOT NULL DEFAULT '' ,
  `ort` VARCHAR(255) NOT NULL DEFAULT '' ,
  `land` VARCHAR(255) NOT NULL DEFAULT '' ,
  `telefon` VARCHAR(255) NOT NULL DEFAULT '' ,
  `fax` VARCHAR(255) NOT NULL DEFAULT '' ,
  `handy` VARCHAR(255) NOT NULL DEFAULT '' ,
  `website` VARCHAR(255) NOT NULL DEFAULT '' ,
  `email` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankinhaber` VARCHAR(255) NOT NULL DEFAULT '' ,
  `blz` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankname` VARCHAR(255) NOT NULL DEFAULT '' ,
  `kontonr` VARCHAR(255) NOT NULL DEFAULT '' ,
  `iban` VARCHAR(255) NOT NULL DEFAULT '' ,
  `swift` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankinhaber2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `blz2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankname2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `kontonr2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `iban2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `swift2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankinhaber3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `blz3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankname3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `kontonr3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `iban3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `swift3` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankinhaber4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `blz4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `bankname4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `kontonr4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `iban4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `swift4` VARCHAR(255) NOT NULL DEFAULT '' ,
  `vertretertitel` VARCHAR(255) NOT NULL DEFAULT 'Vertretungsberechtigt' ,
  `vertreter` VARCHAR(255) NOT NULL DEFAULT '' ,
  `vertreteremail` VARCHAR(255) NOT NULL DEFAULT '' ,
  `registergericht` VARCHAR(255) NOT NULL DEFAULT '' ,
  `registernummer` VARCHAR(255) NOT NULL DEFAULT '' ,
  `ustidnr` VARCHAR(255) NOT NULL DEFAULT '' ,
  `wirtidnr` VARCHAR(255) NOT NULL DEFAULT '' ,
  `inhaltperson` VARCHAR(255) NOT NULL DEFAULT '' ,
  `inhaltemail` VARCHAR(255) NOT NULL DEFAULT '' ,
  `recht2grund` VARCHAR(255) NOT NULL DEFAULT '' ,
  `vertretertitel2` VARCHAR(255) NOT NULL DEFAULT 'Vertretungsberechtigt' ,
  `vertreter2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `vertreteremail2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `registergericht2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `registernummer2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `ustidnr2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `wirtidnr2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `inhaltperson2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `inhaltemail2` VARCHAR(255) NOT NULL DEFAULT '' ,
  `technikperson` VARCHAR(255) NOT NULL DEFAULT '' ,
  `technikwebsite` VARCHAR(255) NOT NULL DEFAULT '' ,
  `technikemail` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra1titel` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra1person` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra1website` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra1email` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra2titel` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra2person` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra2website` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra2email` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra3titel` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra3person` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra3website` VARCHAR(255) NOT NULL DEFAULT '' ,
  `extra3email` VARCHAR(255) NOT NULL DEFAULT '' ,
  `templatename` VARCHAR(255) NOT NULL DEFAULT '' ,
  `templatehersteller` VARCHAR(255) NOT NULL DEFAULT '' ,
  `templatewebsite` VARCHAR(255) NOT NULL DEFAULT '' ,
  `templateemail` VARCHAR(255) NOT NULL DEFAULT '' ,
  `contacturl` VARCHAR(255) NOT NULL DEFAULT '' ,
  `agburl` VARCHAR(255) NOT NULL DEFAULT '' ,
  `image` VARCHAR(255) NOT NULL DEFAULT '' ,
  `misc` TEXT NOT NULL ,
  `params` TEXT NOT NULL ,
  `bildrechte` TEXT NOT NULL ,
  `bildquellen` TEXT NOT NULL ,
  `adresstitel` VARCHAR(255) NOT NULL DEFAULT 'Anbieterinformationen' ,
  `datenschutztitel` VARCHAR(255) NOT NULL DEFAULT '' ,
  PRIMARY KEY (`id`) )
  COMMENT='Saves the different imprints'
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `#__imprint_remarks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `text` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `#__imprint_relation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `imprint` INT(11) NOT NULL ,
  `remark` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `FK_Imprint` (`imprint` ASC) ,
  INDEX `FK_Remark` (`remark` ASC) ,
  CONSTRAINT `FK_Imprint`
    FOREIGN KEY (`imprint` )
    REFERENCES `#__imprint_imprints` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Remark`
    FOREIGN KEY (`remark` )
    REFERENCES `#__imprint_remarks` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

insert into `#__imprint_imprints`(`id`,`name`,`default`,`misc`) values ( '1', 'Standard', '1', 'Trotz sorgfältiger inhaltlicher Kontrolle übernehmen wir keine Haftung für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich.\n\nAlle hier verwendeten Namen, Begriffe, Zeichen und Grafiken können Marken- oder Warenzeichen im Besitze ihrer rechtlichen Eigentümer sein. Die Rechte aller erwähnten und benutzten Marken- und Warenzeichen liegen ausschließlich bei deren Besitzern.' );
