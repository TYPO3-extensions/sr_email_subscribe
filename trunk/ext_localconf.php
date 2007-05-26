<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

if (!defined ('SR_EMAIL_SUBSCRIBE_EXTkey')) {
	define('SR_EMAIL_SUBSCRIBE_EXTkey',$_EXTKEY);
}

if (!defined ('PATH_BE_sremailsubscribe')) {
	define('PATH_BE_sremailsubscribe', t3lib_extMgm::extPath(SR_FEUSER_REGISTER_EXTkey));
}

if (!defined ('PATH_BE_sremailsubscribe_rel')) {
	define('PATH_BE_sremailsubscribe_rel', t3lib_extMgm::extRelPath(SR_FEUSER_REGISTER_EXTkey));
}

if (!defined ('PATH_FE_sremailsubscribe_rel')) {
	define('PATH_FE_sremailsubscribe_rel', t3lib_extMgm::siteRelPath(SR_FEUSER_REGISTER_EXTkey));
}

if (!defined ('SR_FEUSER_REGISTER_EXTkey')) {
	define('SR_FEUSER_REGISTER_EXTkey','sr_feuser_register');
}


t3lib_extMgm::addPItoST43(SR_EMAIL_SUBSCRIBE_EXTkey, 'pi1/class.tx_sremailsubscribe_pi1.php', '_pi1', 'list_type', 0);

$_EXTCONF = unserialize($_EXTCONF);    // unserializing the configuration so we can use it here:

	// turn the use of flexforms on:
if (!defined ('FH_LIBRARY_EXTkey')) {
	define('FH_LIBRARY_EXTkey','fh_library');
}

$TYPO3_CONF_VARS['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['imageFolder'] = $_EXTCONF['imageFolder'];
$TYPO3_CONF_VARS['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms'] = $_EXTCONF['useFlexforms'];

if (!t3lib_extMgm::isLoaded(FH_LIBRARY_EXTkey)) {
	$TYPO3_CONF_VARS['EXTCONF'][SR_EMAIL_SUBSCRIBE_EXTkey]['useFlexforms'] = 0;
}

if (t3lib_extMgm::isLoaded(FH_LIBRARY_EXTkey)) {
	if (!defined ('PATH_BE_fh_library')) {
		define('PATH_BE_fh_library', t3lib_extMgm::extPath(FH_LIBRARY_EXTkey));
	}
}
?>
