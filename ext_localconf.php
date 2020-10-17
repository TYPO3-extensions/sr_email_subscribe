<?php
defined('TYPO3_MODE') or die();

call_user_func(
    function($extKey)
    {	
        // Make the extension version and constraints available
        $typo3Version = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);
		$typo3Branch = $typo3Version->getBranch();
        $emConfUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extensionmanager\Utility\EmConfUtility::class);
		if (version_compare($typo3Branch, '10.4', '>=')) {
            $emConf =
                $emConfUtility->includeEmConf(
                    $extKey,
                    [
                        'packagePath' => \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:' . $extKey),
                    ]
                );
        } else {
            $emConf =
                $emConfUtility->includeEmConf([
                    'key' => $extKey,
                    'siteRelPath' => \TYPO3\CMS\Core\Utility\PathUtility::stripPathSitePrefix(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extKey)),
                ]);
        }
        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['version'] = $emConf['version'];
		$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['constraints'] = $emConf['constraints'];
		// Captcha hooks
		if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['captcha'])) {
		    $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['captcha'] = [];
		}
		$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['captcha'][] = \SJBR\SrFeuserRegister\Captcha\Captcha::class;
		$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['captcha'][] = \SJBR\SrFeuserRegister\Captcha\Freecap::class;
	},
	'sr_email_subscribe'
);