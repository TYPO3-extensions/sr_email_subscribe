<?php

########################################################################
# Extension Manager/Repository config file for ext: "sr_email_subscribe"
#
# Auto generated 17-09-2008 21:06
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Email Address Subscription',
	'description' => 'An email and address subscription variant of the Frontend User Registration extension.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.2.5',
	'dependencies' => 'tt_address,static_info_tables,sr_feuser_register,div2007',
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
			'tt_address' => '2.1.0-',
			'static_info_tables' => '2.0.5-',
			'sr_feuser_register' => '2.5.17-',
			'php' => '4.1.0-0.0.0',
			'typo3' => '4.0-0.0.0',
			'div2007' => '0.1.14-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:27:{s:9:"ChangeLog";s:4:"168d";s:16:"contributors.txt";s:4:"f10a";s:21:"ext_conf_template.txt";s:4:"6108";s:12:"ext_icon.gif";s:4:"8d58";s:17:"ext_localconf.php";s:4:"b1a8";s:14:"ext_tables.php";s:4:"c821";s:14:"ext_tables.sql";s:4:"81cc";s:13:"locallang.xml";s:4:"07d2";s:16:"locallang_db.xml";s:4:"a9ae";s:14:"doc/manual.sxw";s:4:"001f";s:37:"pi1/class.tx_sremailsubscribe_pi1.php";s:4:"7d35";s:42:"pi1/class.tx_sremailsubscribe_pi1_base.php";s:4:"681f";s:23:"pi1/flexform_ds_pi1.xml";s:4:"605f";s:19:"pi1/icon_delete.gif";s:4:"f914";s:17:"pi1/locallang.xml";s:4:"06b5";s:41:"pi1/tx_sremailsubcribe_htmlmail_xhtml.css";s:4:"01ea";s:36:"pi1/tx_sremailsubscribe_htmlmail.css";s:4:"c0df";s:49:"pi1/tx_sremailsubscribe_pi1_captcha_css_tmpl.html";s:4:"2a47";s:41:"pi1/tx_sremailsubscribe_pi1_css_tmpl.html";s:4:"4c96";s:38:"pi1/tx_sremailsubscribe_pi1_sample.txt";s:4:"2954";s:37:"pi1/tx_sremailsubscribe_pi1_tmpl.tmpl";s:4:"fa83";s:45:"hooks/class.tx_sremailsubscribe_hooks_cms.php";s:4:"799e";s:31:"static/css_styled/constants.txt";s:4:"dd0c";s:27:"static/css_styled/setup.txt";s:4:"a170";s:30:"static/old_style/constants.txt";s:4:"1224";s:30:"static/old_style/editorcfg.txt";s:4:"e422";s:26:"static/old_style/setup.txt";s:4:"edb6";}',
	'suggests' => array(
	),
);

?>