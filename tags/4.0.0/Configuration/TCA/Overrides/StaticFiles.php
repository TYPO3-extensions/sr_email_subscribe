<?php
defined('TYPO3_MODE') or die();
// Configure extension static template
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('sr_email_subscribe', 'Configuration/TypoScript/PluginSetup', 'Email Address Subscription Setup');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('sr_email_subscribe', 'Configuration/TypoScript/DefaultStyles', 'Email Address Subscription CSS Styles');