<?php
defined('TYPO3_MODE') or die();

// Get the extensions's configuration
$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sr_email_subscribe']);
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['imagefolder'] = $extConf['imageFolder'] ? $extConf['imageFolder'] : '2:/tx_sremailsubscribe/';
if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getNumericTypo3Version()) < 8000000) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['imagefolder'] = $extConf['imagefolder'] ? $extConf['imagefolder'] : 'uploads/tx_sremailsubscribe';
}
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['useImageFolder'] = !empty($extConf['useImageFolder']) ? $extConf['useImageFolder'] : '0';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['addressTable'] = $extConf['addressTable'] ?: 'tt_address';

// Save extension version and constraints
$emConfUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extensionmanager\Utility\EmConfUtility::class);
$emConf = $emConfUtility->includeEmConf(['key' => 'sr_email_subscribe', 'siteRelPath' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('sr_email_subscribe')]);
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['version'] = $emConf['sr_email_subscribe']['version'];
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['constraints'] = $emConf['sr_email_subscribe']['constraints'];

// Captcha hooks
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['captcha'])) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['captcha'] = [];
}
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['captcha'][] = \SJBR\SrFeuserRegister\Captcha\Captcha::class;
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['captcha'][] = \SJBR\SrFeuserRegister\Captcha\Freecap::class;

$addressTable = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['sr_email_subscribe']['addressTable'];

unset($extConf);
unset($emConfUtility);
unset($emConf);