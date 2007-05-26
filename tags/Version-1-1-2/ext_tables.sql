# THESE create statements will NOT work if this file is piped into MySQL. 
# Rather they will be detected by the Typo3 Install Tool and through that 
# you should upgrade the tables to content these fields.

CREATE TABLE tt_address (
  static_info_country char(3) DEFAULT '' NOT NULL,
  zone varchar(45) DEFAULT '' NOT NULL,
  language char(2) DEFAULT '' NOT NULL,
  first_name varchar(50) DEFAULT '' NOT NULL,
  last_name varchar(50) DEFAULT '' NOT NULL,
  name tinytext NOT NULL,
  country varchar(60) DEFAULT '' NOT NULL,
  zip varchar(20) DEFAULT '' NOT NULL,
  email varchar(255) DEFAULT '' NOT NULL,
  phone varchar(30) DEFAULT '' NOT NULL,
  fax varchar(30) DEFAULT '' NOT NULL,
  date_of_birth int(11) DEFAULT '0' NOT NULL,
  comments text NOT NULL,
  module_sys_dmail_html tinyint(3) unsigned DEFAULT '0' NOT NULL
);

