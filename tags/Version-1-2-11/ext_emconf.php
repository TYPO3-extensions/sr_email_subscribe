<?php

########################################################################
# Extension Manager/Repository config file for ext: "sr_email_subscribe"
#
# Auto generated 01-07-2010 08:26
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Email Address Subscription',
	'description' => 'An email newsletter and address subscription variant of the Front End User Registration.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.2.11',
	'dependencies' => 'static_info_tables,sr_feuser_register,div2007',
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
	'author_email' => 'franz@ttproducts.de',
	'author_company' => 'jambage.com',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'static_info_tables' => '2.0.5-',
			'sr_feuser_register' => '2.5.25-2.5.99',
			'php' => '4.1.0-0.0.0',
			'typo3' => '4.0-0.0.0',
			'div2007' => '0.2.6-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'tt_address' => '2.1.0-',
			'patch1822' => '0.0.3-',
		),
	),
	'_md5_values_when_last_written' => 'a:27:{s:9:"ChangeLog";s:4:"3ae7";s:16:"contributors.txt";s:4:"f10a";s:21:"ext_conf_template.txt";s:4:"eb94";s:12:"ext_icon.gif";s:4:"8d58";s:17:"ext_localconf.php";s:4:"51ed";s:14:"ext_tables.php";s:4:"e9aa";s:14:"ext_tables.sql";s:4:"81cc";s:13:"locallang.xml";s:4:"5ee3";s:16:"locallang_db.xml";s:4:"a9ae";s:14:"doc/manual.sxw";s:4:"b6b8";s:37:"pi1/class.tx_sremailsubscribe_pi1.php";s:4:"361b";s:42:"pi1/class.tx_sremailsubscribe_pi1_base.php";s:4:"69f9";s:23:"pi1/flexform_ds_pi1.xml";s:4:"605f";s:19:"pi1/icon_delete.gif";s:4:"f914";s:17:"pi1/locallang.xml";s:4:"5c90";s:41:"pi1/tx_sremailsubcribe_htmlmail_xhtml.css";s:4:"01ea";s:36:"pi1/tx_sremailsubscribe_htmlmail.css";s:4:"c0df";s:49:"pi1/tx_sremailsubscribe_pi1_captcha_css_tmpl.html";s:4:"2a47";s:41:"pi1/tx_sremailsubscribe_pi1_css_tmpl.html";s:4:"c88c";s:38:"pi1/tx_sremailsubscribe_pi1_sample.txt";s:4:"2954";s:37:"pi1/tx_sremailsubscribe_pi1_tmpl.tmpl";s:4:"737f";s:45:"hooks/class.tx_sremailsubscribe_hooks_cms.php";s:4:"b51e";s:31:"static/css_styled/constants.txt";s:4:"5c1e";s:27:"static/css_styled/setup.txt";s:4:"8fac";s:30:"static/old_style/constants.txt";s:4:"6474";s:30:"static/old_style/editorcfg.txt";s:4:"e422";s:26:"static/old_style/setup.txt";s:4:"9352";}',
	'suggests' => array(
	),
);

?>