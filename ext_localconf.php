<?php
defined('TYPO3_MODE') or die();

if (!defined ('SR_EMAIL_SUBSCRIBE_EXTkey')) {
	define('SR_EMAIL_SUBSCRIBE_EXTkey', $_EXTKEY);
}

if (!defined ('PATH_BE_sremailsubscribe')) {
	define('PATH_BE_sremailsubscribe', t3lib_extMgm::extPath(SR_EMAIL_SUBSCRIBE_EXTkey));
}

if (!defined ('PATH_BE_sremailsubscribe_rel')) {
	define('PATH_BE_sremailsubscribe_rel', t3lib_extMgm::extRelPath(SR_EMAIL_SUBSCRIBE_EXTkey));
}

if (!defined ('PATH_FE_sremailsubscribe_rel')) {
	define('PATH_FE_sremailsubscribe_rel', t3lib_extMgm::siteRelPath(SR_EMAIL_SUBSCRIBE_EXTkey));
}

if (!defined ('SR_FEUSER_REGISTER_EXTkey')) {
	define('SR_FEUSER_REGISTER_EXTkey','sr_feuser_register');
}



t3lib_extMgm::addPItoST43(SR_EMAIL_SUBSCRIBE_EXTkey, 'pi1/class.tx_sremailsubscribe_pi1.php', '_pi1', 'list_type', 0);

$_EXTCONF = unserialize($_EXTCONF);    // unserializing the configuration so we can use it here:
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['imagefolder'] = $_EXTCONF['imageFolder'] ? $_EXTCONF['imageFolder'] : 'uploads/tx_sremailsubscribe';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useImageFolder'] = !empty($_EXTCONF['useImageFolder']) ? $_EXTCONF['useImageFolder'] : '0';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['addressTable'] = $_EXTCONF['addressTable'];

	// Save extension version and constraints
require_once(t3lib_extMgm::extPath($_EXTKEY) . 'ext_emconf.php');
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['version'] = $EM_CONF[SR_EMAIL_SUBSCRIBE_EXTkey]['version'];
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['constraints'] = $EM_CONF[SR_EMAIL_SUBSCRIBE_EXTkey]['constraints'];

	// Captcha hooks
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['tx_sremailsubscribe_pi1']['registrationProcess'][] = 'EXT:' . SR_FEUSER_REGISTER_EXTkey . '/hooks/captcha/class.tx_srfeuserregister_captcha.php:&tx_srfeuserregister_captcha';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['tx_sremailsubscribe_pi1']['model'][] = 'EXT:' . SR_FEUSER_REGISTER_EXTkey . '/hooks/captcha/class.tx_srfeuserregister_captcha.php:&tx_srfeuserregister_captcha';
	// Freecap hooks
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['tx_sremailsubscribe_pi1']['registrationProcess'][] = 'EXT:' . SR_FEUSER_REGISTER_EXTkey . '/hooks/freecap/class.tx_srfeuserregister_freecap.php:&tx_srfeuserregister_freecap';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['tx_sremailsubscribe_pi1']['model'][] = 'EXT:' . SR_FEUSER_REGISTER_EXTkey . '/hooks/freecap/class.tx_srfeuserregister_freecap.php:&tx_srfeuserregister_freecap';

$addressTable = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['addressTable'];
if (!$addressTable) {
	$addressTable = 'tt_address';
}
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['addressTable'] = $addressTable;

if (TYPO3_MODE === 'BE') {

	if (
		!defined($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['fe_users']['MENU'])
		&& ($addressTable == 'tt_address')
	) {
		$tableArray = array($addressTable);
		foreach ($tableArray as $theTable)	{
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['LLFile'][$theTable] = 'EXT:sr_email_subscribe/Resources/Private/Language/locallang.xlf';
		}

		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables'][$addressTable] = array (
			'default' => array(
				'MENU' => 'm_default',
				'fList' =>  'first_name,middle_name,last_name,title,address,zip,city,country,gender,image,uid',
				'icon' => TRUE
			),
			'ext' => array (
				'MENU' => 'm_ext',
				'fList' =>  'name,description,email,phone,mobile,fax,www,birthday',
				'icon' => TRUE
			),
			'company' => array (
				'MENU' => 'm_company',
				'fList' =>  'name,city,company,building,room,addressgroup',
				'icon' => TRUE
			),
		);
	}
}