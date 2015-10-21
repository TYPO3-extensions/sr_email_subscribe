<?php
namespace SJBR\SrEmailSubscribe\Controller;

/*
 *  Copyright notice
 *
 *  (c) 1999-2003 Kasper Skårhøj <kasperYYYY@typo3.com>
 *  (c) 2004-2015 Stanislas Rolland <typo3(arobas)sjbr.ca>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

use SJBR\SrFeuserRegister\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Plugin\AbstractPlugin;

/**
 * Front End creating/editing/deleting records authenticated by email address, also called subscriptions.
 */
class SubscribePluginController extends AbstractPlugin
{

	public $cObj;

	/**
	 * @var string Extension name
	 */
	protected $extensionName = 'SrEmailSubscribe';
	
	/**
	 * Used for CSS classes, variables
	 *
	 * @var string
	 */
	public $prefixId = 'tx_sremailsubscribe_pi1';
	
	/**
	 * Used only by pi_loadLL
	 *
	 * @var string
	 */
	public $scriptRelPath = 'Resources/Private/Language/locallang.xlf';

	/**
	 * Extension key
	 *
	 * @var string
	 */
	public $extKey = 'sr_email_subscribe';

	public function main($content, $conf)
	{
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();

		$content = $this->checkRequirements();

		if (!$content) {
			$adminFieldList = 'name,hidden';
			// Honour Address List (tt_address) configuration settings
			if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['addressTable'] == 'tt_address') {
				$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['tt_address']);
				if ($extConf['disableCombinedNameField'] == '1') {
					// Remove name from adminFieldList
					$adminFieldList = 'hidden';
				}
			}
			$buttonLabelsList = 'register,confirm_register,send_invitation,send_invitation_now,send_link,back_to_form,update,confirm_update,enter,confirm_delete,cancel_delete';
			$otherLabelsList = 'yes,no,click_here_to_register,tooltip_click_here_to_register,v_already_subscribed,click_here_to_edit,tooltip_click_here_to_edit,
			v_wish_to_update_or_delete,v_enter_subscribed_email,click_here_to_delete,tooltip_click_here_to_delete,
			copy_paste_link,enter_account_info,enter_invitation_account_info,required_info_notice,excuse_us,excuse_us_invitation,
			registration_problem,registration_sorry,registration_clicked_twice,registration_help,kind_regards,
			v_verify_before_create,v_verify_invitation_before_create,v_verify_before_update,v_really_wish_to_delete,v_edit_your_account,
			v_dear,hello,v_notification,v_registration_created,v_registration_created_subject,v_registration_created_message1,v_registration_created_message2,
			v_please_confirm,v_your_account_was_created,v_your_account_was_created_nomail,v_follow_instructions1,v_follow_instructions2,v_invitation_confirm,
			v_invitation_account_was_created,v_invitation_instructions1,
			v_registration_initiated,v_registration_initiated_subject,v_registration_initiated_message1,v_registration_initiated_message2,
			v_registration_invited,v_registration_invited_subject,v_registration_invited_message1,v_registration_invited_message2,
			v_registration_confirmed,v_registration_confirmed_subject,v_registration_confirmed_message1,v_registration_confirmed_message2,
			v_registration_cancelled,v_registration_cancelled_subject,v_registration_cancelled_message1,v_registration_cancelled_message2,
			v_registration_updated,v_registration_updated_subject,v_registration_updated_message1,v_registration_deleted,v_registration_deleted_subject,
			v_registration_deleted_message1,v_registration_deleted_message2,v_registration_updated_subject,v_registration_updated_message1,v_registration_deleted,
			v_sending_infomail,v_sending_infomail_message1,v_sending_infomail_message2,v_infomail_subject,v_infomail_reason,v_infomail_message1,v_infomail_message2,
			v_infomail_norecord_subject,v_infomail_norecord_message1,v_infomail_norecord_message2';

			$mainObj = GeneralUtility::makeInstance('tx_srfeuserregister_control_main');
			$mainObj->cObj = $this->cObj;
			$mainObj->extensionName = $this->extensionName;
			$content =
				$mainObj->main(
					$content,
					$conf,
					$this,
					$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['addressTable'],
					$adminFieldList,
					$buttonLabelsList,
					$otherLabelsList
				);
		}
		return $content;
	}

	/**
	 * Checks requirements for this plugin
	 *
	 * @return string Error message, if error found, empty string otherwise
	 */
	protected function checkRequirements()
	{
		$content = '';
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['constraints']['depends'])) {
			$requiredExtensions = array_diff(array_keys($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['constraints']['depends']), array('php', 'typo3'));
			foreach ($requiredExtensions as $requiredExtension) {
				if (!ExtensionManagementUtility::isLoaded($requiredExtension)) {
					$message = sprintf(LocalizationUtility::translate('internal_required_extension_missing', $this->extensionName), $requiredExtension);
					GeneralUtility::sysLog($message, $this->extKey, GeneralUtility::SYSLOG_SEVERITY_ERROR);
					$content .= sprintf(LocalizationUtility::translate('internal_check_requirements_frontend', $this->extensionName), $message);
				}
			}
		}
		return $content;
	}
}