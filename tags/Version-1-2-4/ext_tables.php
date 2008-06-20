<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

if (t3lib_extMgm::isLoaded(DIV2007_EXTkey) || t3lib_extMgm::isLoaded(FH_LIBRARY_EXTkey)) { // only works if div2007 has been installed. fh_library is used for compatibility and easier upgrade only, but it is deprecated.
	t3lib_extMgm::addStaticFile(SR_EMAIL_SUBSCRIBE_EXTkey, 'static/css_styled/', 'Email Address Subscription CSS-styled');
	t3lib_extMgm::addStaticFile(SR_EMAIL_SUBSCRIBE_EXTkey, 'static/old_style/', 'Email Address Subscription Old Style');
	
	t3lib_div::loadTCA('tt_content');

	if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms']=='1') {
		$TCA['tt_content']['types']['list']['subtypes_excludelist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1']='layout,select_key';
		$TCA['tt_content']['types']['list']['subtypes_addlist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1']='pi_flexform';
		t3lib_extMgm::addPiFlexFormValue(SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1', 'FILE:EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/pi1/flexform_ds_pi1.xml');
	} else {
		$TCA['tt_content']['types']['list']['subtypes_excludelist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1'] = 'layout';
	}
	t3lib_extMgm::addPlugin(Array('LLL:EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/locallang_db.xml:tt_content.email_subscribe', SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1'),'list_type');
}

/**
 * Setting up country, country subdivision, preferred language, first_name and last_name in tt_address table
 * Adjusting some maximum lengths to the values as corresponding fields in fe_users as set by extension sr_feuser_register
 */


t3lib_div::loadTCA('tt_address');

if (
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useImageFolder'] &&
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['imageFolder'] != '')	{
	$TCA['tt_address']['columns']['image']['config']['uploadfolder'] = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['imageFolder'];
}

t3lib_extMgm::addTCAcolumns('tt_address', Array(
	'static_info_country' => Array (
		'exclude' => 0,	
		'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.static_info_country',
		'config' => Array (
			'type' => 'input',
			'size' => '5',
			'max' => '3',
			'eval' => '',
			'default' => ''
		)
	),
	'zone' => Array (
		'exclude' => 0,	
		'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.zone',
		'config' => Array (
			'type' => 'input',
			'size' => '20',
			'max' => '40',
			'eval' => 'trim',
			'default' => ''
		)
	),
	'language' => Array (
		'exclude' => 0,	
		'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.language',
		'config' => Array (
			'type' => 'input',
			'size' => '4',
			'max' => '2',
			'eval' => '',
			'default' => ''
		)
	),
	'date_of_birth' => Array (
		'exclude' => 0,		
		'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.date_of_birth',
		'config' => Array (
			'type' => 'input',
			"size" => "10",
			"max" => "20",
			"eval" => "date",
			"checkbox" => "0",
			"default" => ''
		)
	),
	'comments' => Array (
		'exclude' => 0,
		'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.comments',
		'config' => Array (
			'type' => 'text',
			'rows' => '5',
			'cols' => '48'
		)
	),
));

$TCA['tt_address']['interface']['showRecordFieldList'] = str_replace('country', 'country,zone,static_info_country,language', $TCA['tt_address']['interface']['showRecordFieldList']);

$TCA['tt_address']['interface']['showRecordFieldList'] = str_replace('title', 'date_of_birth,title', $TCA['tt_address']['interface']['showRecordFieldList']);
$TCA['tt_address']['interface']['showRecordFieldList'] = str_replace('www', 'www,comments', $TCA['tt_address']['interface']['showRecordFieldList']);

$TCA['tt_address']['feInterface']['fe_admin_fieldList'] = str_replace('country', 'zone,static_info_country,country,language,comments', $TCA['tt_address']['feInterface']['fe_admin_fieldList']);
$TCA['tt_address']['feInterface']['fe_admin_fieldList'] .= ',date_of_birth';

if (strstr($TCA['tt_address']['feInterface']['fe_admin_fieldList'], 'image') === FALSE)	{
	$TCA['tt_address']['feInterface']['fe_admin_fieldList'] .= ',image';
}

t3lib_extMgm::addToAllTCAtypes('tt_address', 'comments');
$TCA['tt_address']['palettes']['3']['showitem'] = str_replace('country', 'zone,static_info_country,country,language', $TCA['tt_address']['palettes']['3']['showitem']);

	// tt_address modified
if (!t3lib_extMgm::isLoaded('direct_mail')) {
	$tempCols = Array(
		'module_sys_dmail_html' => Array(
			'label'=>'LLL:EXT:'.$_EXTKEY.'/locallang_db.xml:tt_address.module_sys_dmail_html',
			'exclude' => '1',
			'config'=>Array(
				'type'=>'check'
				)
			)
	);
	t3lib_extMgm::addTCAcolumns('tt_address',$tempCols);
	t3lib_extMgm::addToAllTCATypes('tt_address','--div--;Direct mail,module_sys_dmail_html;;;;1-1-1');
	$TCA['tt_address']['feInterface']['fe_admin_fieldList'].=',module_sys_dmail_html';
}

?>