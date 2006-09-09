<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::addStaticFile(SR_EMAIL_SUBSCRIBE_EXTkey, 'static/css_styled/', 'Email Address Subscription CSS-styled');
t3lib_extMgm::addStaticFile(SR_EMAIL_SUBSCRIBE_EXTkey, 'static/old_style/', 'Email Address Subscription Old Style');

t3lib_div::loadTCA('tt_content');
if ($TYPO3_CONF_VARS['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms']==1) {
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1']='layout,select_key';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1']='pi_flexform';
	t3lib_extMgm::addPiFlexFormValue(SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1', 'FILE:EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/pi1/flexform_ds_pi1.xml');
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi2']='layout,select_key';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi2']='pi_flexform';
	t3lib_extMgm::addPiFlexFormValue(SR_EMAIL_SUBSCRIBE_EXTkey.'_pi2', 'FILE:EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/pi1/flexform_ds_pi1.xml');
} else {
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1'] = 'layout';
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][SR_EMAIL_SUBSCRIBE_EXTkey.'_pi2'] = 'layout';
}
t3lib_extMgm::addPlugin(Array('LLL:EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/locallang_db.xml:tt_content.email_subscribe', SR_EMAIL_SUBSCRIBE_EXTkey.'_pi1'),'list_type');
t3lib_extMgm::addPlugin(Array('LLL:EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/locallang_db.xml:tt_content.email_subscribe_casual', SR_EMAIL_SUBSCRIBE_EXTkey.'_pi2'),'list_type');

/**
 * Setting up country, country subdivision, preferred language, first_name and last_name in tt_address table
 * Adjusting some maximum lengths to the values as corresponding fields in fe_users as set by extension sr_feuser_register
 */


t3lib_div::loadTCA('tt_address');
$TCA['tt_address']['columns']['name']['config']['max'] = '100';
$TCA['tt_address']['columns']['company']['config']['max'] = '50';
$TCA['tt_address']['columns']['city']['config']['max'] = '40';
$TCA['tt_address']['columns']['country']['config']['max'] = '60';
$TCA['tt_address']['columns']['zip']['config']['size'] = '15';
$TCA['tt_address']['columns']['zip']['config']['max'] = '20';
$TCA['tt_address']['columns']['email']['config']['max'] = '255';
$TCA['tt_address']['columns']['phone']['config']['max'] = '25';
$TCA['tt_address']['columns']['fax']['config']['max'] = '25';

$TCA['tt_address']['columns']['image']['config']['uploadfolder'] = 'uploads/tx_sremailsubscribe';

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
		'first_name' => Array (
			'exclude' => 0,	
			'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.first_name',
			'config' => Array (
				'type' => 'input',
				'size' => '20',
				'max' => '50',
				'eval' => 'trim',
				'default' => ''
			)
		),
		'last_name' => Array (
			'exclude' => 0,	
			'label' => 'LLL:EXT:sr_email_subscribe/locallang_db.xml:tt_address.last_name',
			'config' => Array (
				'type' => 'input',
				'size' => '20',
				'max' => '50',
				'eval' => 'trim',
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

$TCA['tt_address']['interface']['showRecordFieldList'] = str_replace('country', 'zone,static_info_country,country,language', $TCA['tt_address']['interface']['showRecordFieldList']);
$TCA['tt_address']['interface']['showRecordFieldList'] = str_replace('title', 'first_name,last_name,date_of_birth,title', $TCA['tt_address']['interface']['showRecordFieldList']);
$TCA['tt_address']['interface']['showRecordFieldList'] = str_replace('www', 'www,comments', $TCA['tt_address']['interface']['showRecordFieldList']);

$TCA['tt_address']['feInterface']['fe_admin_fieldList'] = str_replace('country', 'zone,static_info_country,country,language,comments', $TCA['tt_address']['feInterface']['fe_admin_fieldList']);
$TCA['tt_address']['feInterface']['fe_admin_fieldList'] = str_replace('title', 'first_name,last_name,title', $TCA['tt_address']['feInterface']['fe_admin_fieldList']);
$TCA['tt_address']['feInterface']['fe_admin_fieldList'] .= ',image,date_of_birth';

t3lib_extMgm::addToAllTCAtypes('tt_address', 'comments');
$TCA['tt_address']['palettes']['3']['showitem'] = str_replace('country', 'zone,static_info_country,country,language', $TCA['tt_address']['palettes']['3']['showitem']);
$TCA['tt_address']['palettes']['2']['showitem'] = str_replace('title', 'first_name,last_name,title', $TCA['tt_address']['palettes']['2']['showitem']);

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