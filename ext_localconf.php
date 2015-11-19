<?php
defined('TYPO3_MODE') or die();

$_EXTCONF = unserialize($_EXTCONF);    // unserializing the configuration so we can use it here:
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['imagefolder'] = $_EXTCONF['imageFolder'] ? $_EXTCONF['imageFolder'] : 'uploads/tx_sremailsubscribe';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['useImageFolder'] = !empty($_EXTCONF['useImageFolder']) ? $_EXTCONF['useImageFolder'] : '0';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['addressTable'] = $_EXTCONF['addressTable'] ?: 'tt_address';

// Save extension version and constraints
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'ext_emconf.php');
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['version'] = $EM_CONF[$_EXTKEY]['version'];
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['constraints'] = $EM_CONF[$_EXTKEY]['constraints'];

// Captcha hooks
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['captcha'])) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['captcha'] = array();
}
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['captcha'][] = 'SJBR\\SrFeuserRegister\\Captcha\\Captcha';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['captcha'][] = 'SJBR\\SrFeuserRegister\\Captcha\\Freecap';

$addressTable = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['addressTable'];
if (TYPO3_MODE === 'BE') {
	if (!defined($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['tt_address']['MENU']) && $addressTable === 'tt_address') {
		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['LLFile'][$addressTable] = 'EXT:sr_email_subscribe/Resources/Private/Language/locallang_db_layout.xlf';
		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables'][$addressTable] = array (
			'default' => array(
				'MENU' => 'm_default',
				'fList' =>  'first_name,middle_name,last_name,title,address,zip,city,country,gender,image,uid',
				'icon' => true
			),
			'ext' => array (
				'MENU' => 'm_ext',
				'fList' =>  'name,description,email,phone,mobile,fax,www,birthday',
				'icon' => true
			),
			'company' => array (
				'MENU' => 'm_company',
				'fList' =>  'name,city,company,building,room,addressgroup',
				'icon' => true
			)
		);
	}
}