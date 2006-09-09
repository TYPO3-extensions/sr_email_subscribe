<?php

########################################################################
# Extension Manager/Repository config file for ext: "sr_email_subscribe"
#
# Auto generated 09-09-2006 13:31
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Email Address Subscription',
	'description' => 'A newsletter email subscription variant of Kasper SkÃ¥rhÃ¸j\'s Direct Mail Subscription extension.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.1.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => 'tt_address',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Stanislas Rolland',
	'author_email' => 'stanislas.rolland@fructifor.ca',
	'author_company' => 'Fructifor Inc.',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'tt_address' => '',
			'static_info_tables' => '2.0.0-',
			'sr_feuser_register' => '2.5.0-',
			'php' => '4.1.0-',
			'typo3' => '4.0-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:26:{s:9:"ChangeLog";s:4:"2234";s:21:"ext_conf_template.txt";s:4:"1269";s:12:"ext_icon.gif";s:4:"8d58";s:17:"ext_localconf.php";s:4:"8e3c";s:14:"ext_tables.php";s:4:"806e";s:14:"ext_tables.sql";s:4:"abaf";s:13:"locallang.xml";s:4:"60db";s:16:"locallang_db.xml";s:4:"5dcd";s:37:"pi1/class.tx_sremailsubscribe_pi1.php";s:4:"95bc";s:37:"pi1/class.tx_sremailsubscribe_pi2.php";s:4:"fe65";s:23:"pi1/flexform_ds_pi1.xml";s:4:"9dfb";s:19:"pi1/icon_delete.gif";s:4:"f914";s:17:"pi1/locallang.xml";s:4:"ee98";s:41:"pi1/tx_sremailsubcribe_htmlmail_xhtml.css";s:4:"01ea";s:36:"pi1/tx_sremailsubscribe_htmlmail.css";s:4:"c0df";s:41:"pi1/tx_sremailsubscribe_pi1_css_tmpl.html";s:4:"19dc";s:38:"pi1/tx_sremailsubscribe_pi1_sample.txt";s:4:"2954";s:37:"pi1/tx_sremailsubscribe_pi1_tmpl.tmpl";s:4:"8bf2";s:40:"pi1/tx_sremailsubscribe_pi2_htmlmail.css";s:4:"510d";s:38:"pi1/tx_sremailsubscribe_pi2_sample.txt";s:4:"4c34";s:14:"doc/manual.sxw";s:4:"f99f";s:31:"static/css_styled/constants.txt";s:4:"2fcf";s:27:"static/css_styled/setup.txt";s:4:"e95f";s:30:"static/old_style/constants.txt";s:4:"6ad8";s:30:"static/old_style/editorcfg.txt";s:4:"dc68";s:26:"static/old_style/setup.txt";s:4:"4498";}',
);

?>