<?php

########################################################################
# Extension Manager/Repository config file for ext: "sr_email_subscribe"
#
# Auto generated 26-11-2007 07:29
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Email Address Subscription',
	'description' => 'A newsletter email subscription variant of the Frontend User Registration extension.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.2.1',
	'dependencies' => 'cms,div2007,tt_address,static_info_tables,sr_feuser_register',
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
	'author' => 'Stanislas Rolland / Franz Holzinger',
	'author_email' => 'contact@fholzinger.com',
	'author_company' => 'jambage.com',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'tt_address' => '2.1.0-',
			'static_info_tables' => '2.0.5-',
			'sr_feuser_register' => '2.5.9-',
			'php' => '4.1.0-',
			'typo3' => '4.0-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'div2007' => '0.1.2-',
		),
	),
	'_md5_values_when_last_written' => 'a:25:{s:9:"ChangeLog";s:4:"f7e1";s:16:"contributors.txt";s:4:"f10a";s:21:"ext_conf_template.txt";s:4:"0384";s:12:"ext_icon.gif";s:4:"8d58";s:17:"ext_localconf.php";s:4:"5c8c";s:14:"ext_tables.php";s:4:"ee96";s:14:"ext_tables.sql";s:4:"81cc";s:13:"locallang.xml";s:4:"60db";s:16:"locallang_db.xml";s:4:"0503";s:14:"doc/manual.sxw";s:4:"b721";s:37:"pi1/class.tx_sremailsubscribe_pi1.php";s:4:"7165";s:23:"pi1/flexform_ds_pi1.xml";s:4:"9dfb";s:19:"pi1/icon_delete.gif";s:4:"f914";s:17:"pi1/locallang.xml";s:4:"6c02";s:41:"pi1/tx_sremailsubcribe_htmlmail_xhtml.css";s:4:"01ea";s:36:"pi1/tx_sremailsubscribe_htmlmail.css";s:4:"c0df";s:49:"pi1/tx_sremailsubscribe_pi1_captcha_css_tmpl.html";s:4:"6121";s:41:"pi1/tx_sremailsubscribe_pi1_css_tmpl.html";s:4:"4dfd";s:38:"pi1/tx_sremailsubscribe_pi1_sample.txt";s:4:"2954";s:37:"pi1/tx_sremailsubscribe_pi1_tmpl.tmpl";s:4:"8a18";s:31:"static/css_styled/constants.txt";s:4:"2fcf";s:27:"static/css_styled/setup.txt";s:4:"3240";s:30:"static/old_style/constants.txt";s:4:"6ad8";s:30:"static/old_style/editorcfg.txt";s:4:"e422";s:26:"static/old_style/setup.txt";s:4:"48ad";}',
);

?>