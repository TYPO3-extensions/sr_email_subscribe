<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sr_email_subscribe_pi1'] = 'layout,select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sr_email_subscribe_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('sr_email_subscribe_pi1', 'FILE:EXT:sr_email_subscribe/Configuration/FlexForms/flexform_ds_pi1.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(Array('LLL:EXT:sr_email_subscribe/Resources/Private/Language/locallang_db.xlf:tt_content.email_subscribe', 'sr_email_subscribe_pi1'), 'list_type', 'sr_email_subscribe');