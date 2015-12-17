# THESE create statements will NOT work if this file is piped into MySQL. 
# Rather they will be detected by the Typo3 Install Tool and through that 
# you should upgrade the tables to content these fields.


CREATE TABLE tt_address (
	static_info_country char(3) DEFAULT '' NOT NULL,
	zone varchar(45) DEFAULT '' NOT NULL,
	language char(5) DEFAULT '' NOT NULL,
	date_of_birth int(11) DEFAULT '0' NOT NULL,
	comments text NOT NULL,
	module_sys_dmail_html tinyint(3) unsigned DEFAULT '0' NOT NULL
);
