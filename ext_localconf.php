<?php
if (!defined('TYPO3_MODE')) die('Access denied.');

$typoVersion = t3lib_div::int_from_ver($GLOBALS['TYPO_VERSION']);

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

if (!defined ('FH_LIBRARY_EXTkey')) {
	define('FH_LIBRARY_EXTkey','fh_library');
}

if (!defined ('DIV2007_EXTkey')) {
	define('DIV2007_EXTkey','div2007');
}

if (!defined ('TT_ADDRESS_EXTkey')) {
	define('TT_ADDRESS_EXTkey','tt_address');
}

if (!defined ('PARTNER_EXTkey')) {
	define('PARTNER_EXTkey','partner');
}

if (!defined ('PARTY_EXTkey')) {
	define('PARTY_EXTkey','tx_party');
}


$bPhp5 = version_compare(phpversion(), '5.0.0', '>=');

t3lib_extMgm::addPItoST43(SR_EMAIL_SUBSCRIBE_EXTkey, 'pi1/class.tx_sremailsubscribe_pi1.php', '_pi1', 'list_type', 0);

$_EXTCONF = unserialize($_EXTCONF);    // unserializing the configuration so we can use it here:


if (isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]) && is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]))	{
	$tmpArray = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey];
} else {
	unset($tmpArray);
}

if (isset($_EXTCONF) && is_array($_EXTCONF)) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey] = $_EXTCONF;
	if (isset($tmpArray) && is_array($tmpArray)) {
		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey] = array_merge($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey], $tmpArray);
	}
} else {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey] = array();
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms'] = '1';
}


if (t3lib_extMgm::isLoaded(DIV2007_EXTkey))	{
	if (!defined ('PATH_BE_div2007')) {
		define('PATH_BE_div2007', t3lib_extMgm::extPath(DIV2007_EXTkey));
	}
}

if (t3lib_extMgm::isLoaded(DIV2007_EXTkey)) {
	if (!defined ('PATH_BE_div2007')) {
		define('PATH_BE_div2007', t3lib_extMgm::extPath(DIV2007_EXTkey));
	}
} else {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms'] = 0;
}


$addressTable = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['addressTable'];

if (!$addressTable)	{
	if (t3lib_extMgm::isLoaded(PARTY_EXTkey))	{
		$addressTable = 'tx_wecpeople_addresses';
	} else if (t3lib_extMgm::isLoaded(PARTNER_EXTkey))	{
		$addressTable = 'tx_partner_main';
	} else if (t3lib_extMgm::isLoaded(TT_ADDRESS_EXTkey)) {
		$addressTable = 'tt_address';
	} else {
		$addressTable = 'fe_users';
	}
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['addressTable'] = $addressTable;


if (TYPO3_MODE=='BE')	{

	if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms'] && defined('PATH_BE_div2007'))	{
		// replace the output of the former CODE field with the flexform
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info'][SR_EMAIL_SUBSCRIBE_EXTkey . '_pi1'][] = 'EXT:' . SR_EMAIL_SUBSCRIBE_EXTkey . '/hooks/class.tx_sremailsubscribe_hooks_cms.php:&tx_sremailsubscribe_hooks_cms->pmDrawItem';
	}

	if (
		($typoVersion >= 4004000 || t3lib_extMgm::isLoaded('patch1822'))
		&& !defined($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['fe_users']['MENU'])
		&& ($addressTable == 'tt_address')
	) {
		$tableArray = array($addressTable);
		foreach ($tableArray as $theTable)	{
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['LLFile'][$theTable] = 'EXT:'.SR_EMAIL_SUBSCRIBE_EXTkey.'/locallang.xml';
		}

		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables'][$addressTable] = array (
			'default' => array(
				'MENU' => 'm_default',
				'fList' =>  'name,title,address,zip,city,country,gender,image,uid',
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


if (TYPO3_MODE == 'FE') {
	if (t3lib_extMgm::isLoaded('tt_products')) {
		$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_products']['extendingTCA'][] = SR_EMAIL_SUBSCRIBE_EXTkey;
	}
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_feuser_register']['extendingTCA'][] = SR_EMAIL_SUBSCRIBE_EXTkey;
}


?>
