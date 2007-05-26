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

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_sremailsubscribe_pi1.php', '_pi1', 'list_type', 0);
t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_sremailsubscribe_pi2.php', '_pi2', 'list_type', 0);

$_EXTCONF = unserialize($_EXTCONF);    // unserializing the configuration so we can use it here:

	// turn the use of flexforms on:
if (!defined ('FH_LIBRARY_EXTkey')) {
	define('FH_LIBRARY_EXTkey','fh_library');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['useFlexforms'] = $_EXTCONF['useFlexforms'];
if (!t3lib_extMgm::isLoaded(FH_LIBRARY_EXTkey)) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['useFlexforms'] = 0;
}

if (t3lib_extMgm::isLoaded(FH_LIBRARY_EXTkey)) {
	if (!defined ('PATH_BE_fh_library')) {
		define('PATH_BE_fh_library', t3lib_extMgm::extPath(FH_LIBRARY_EXTkey));
	}
}
?>
