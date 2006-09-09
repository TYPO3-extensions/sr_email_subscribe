<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2003 Kasper Skaarhoj (kasper@typo3.com)
*  (c) 2004-2006 Stanislas Rolland <stanislas.rolland(arobas)fructifor.ca>
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 *
 * Front End creating/editing/deleting records authenticated by email address, also called subscriptions.
 *
 * @author Kasper Skaarhoj <kasper@typo3.com>
 * @author Stanislas Rolland <stanislas.rolland(arobas)fructifor.ca>
 */

require_once(t3lib_extMgm::extPath('sr_feuser_register').'pi1/class.tx_srfeuserregister_pi1.php');

class tx_sremailsubscribe_pi1 extends tx_srfeuserregister_pi1 {

	var $buttonLabelsList = 'register,confirm_register,send_invitation,send_invitation_now,send_link,back_to_form,update,confirm_update,enter,confirm_delete,cancel_delete';
	var $otherLabelsList = 'yes,no,click_here_to_register,tooltip_click_here_to_register,v_already_subscribed,click_here_to_edit,tooltip_click_here_to_edit,
		v_wish_to_update_or_delete,v_enter_subscribed_email,click_here_to_delete,tooltip_click_here_to_delete,
		copy_paste_link,enter_account_info,enter_invitation_account_info,required_info_notice,excuse_us,excuse_us_invitation,
		registration_problem,registration_sorry,registration_clicked_twice,registration_help,kind_regards,
		v_verify_before_create,v_verify_invitation_before_create,v_verify_before_update,v_really_wish_to_delete,v_edit_your_account,
		v_dear,hello,v_notification,v_registration_created,v_registration_created_subject,v_registration_created_message1,v_registration_created_message2,
		v_please_confirm,v_your_account_was_created,v_follow_instructions1,v_follow_instructions2,v_invitation_confirm,
		v_invitation_account_was_created,v_invitation_instructions1,
		v_registration_initiated,v_registration_initiated_subject,v_registration_initiated_message1,v_registration_initiated_message2,
		v_registration_invited,v_registration_invited_subject,v_registration_invited_message1,v_registration_invited_message2,
		v_registration_confirmed,v_registration_confirmed_subject,v_registration_confirmed_message1,v_registration_confirmed_message2,
		v_registration_cancelled,v_registration_cancelled_subject,v_registration_cancelled_message1,v_registration_cancelled_message2,
		v_registration_updated,v_registration_updated_subject,v_registration_updated_message1,v_registration_deleted,v_registration_deleted_subject,
		v_registration_deleted_message1,v_registration_deleted_message2,v_registration_updated_subject,v_registration_updated_message1,v_registration_deleted,
		v_sending_infomail,v_sending_infomail_message1,v_sending_infomail_message2,v_infomail_subject,v_infomail_reason,v_infomail_message1,v_infomail_message2,
		v_infomail_norecord_subject,v_infomail_norecord_message1,v_infomail_norecord_message2';
	var $infomailPrefix = 'INFOMAIL_';
	
		// Plugin initialization
	var $prefixId = 'tx_sremailsubscribe_pi1';  // Same as class name
	var $scriptRelPath = 'pi1/class.tx_sremailsubscribe_pi1.php'; // Path to this script relative to the extension dir.
	var $extKey = 'sr_email_subscribe';  // The extension key.
	var $theTable = 'tt_address';
	var $adminFieldList = 'name,hidden';
	
	/**
	 * Adds language-dependent label markers
	 *
	 * @param array  $markerArray: the input marker array
	 * @param array  $dataArray: the record array
	 * @return array  the output marker array
	 */
	function addLabelMarkers($markerArray, $dataArray) {
		
			// Data field labels
		$infoFields = t3lib_div::trimExplode(',', $this->fieldList, 1);
		while (list(, $fName) = each($infoFields)) {
			$markerArray['###LABEL_'.$this->cObj->caseshift($fName,'upper').'###'] = $this->pi_getLL($fName) ? $this->pi_getLL($fName) : $this->getLLFromString($this->TCA['columns'][$fName]['label']);
			$markerArray['###TOOLTIP_'.$this->cObj->caseshift($fName,'upper').'###'] = $this->pi_getLL('tooltip_' . $fName);
			$markerArray['###TOOLTIP_INVITATION_'.$this->cObj->caseshift($fName,'upper').'###'] = $this->pi_getLL('tooltip_invitation_' . $fName);
				// <Ries van Twisk added support for multiple checkboxes>
			if (is_array($dataArray[$fName])) {
				$colContent = '';
				$markerArray['###FIELD_'.$fName.'_CHECKED###'] = '';
				$markerArray['###LABEL_'.$fName.'_CHECKED###'] = '';
				$this->dataArr['###POSTVARS_'.$fName.'###'] = ''; 
				foreach ($dataArray[$fName] AS $key => $value) {
					$colConfig = $this->TCA['columns'][$fName]['config'];
					$markerArray['###FIELD_'.$fName.'_CHECKED###'] .= '- '.$this->getLLFromString($colConfig['items'][$value][0]).'<br />';
					$markerArray['###LABEL_'.$fName.'_CHECKED###'] .= '- '.$this->getLLFromString($colConfig['items'][$value][0]).'<br />';
					$markerArray['###POSTVARS_'.$fName.'###'] .= chr(10).'	<input type="hidden" name="FE[tt_address]['.$fName.']['.$key.']" value ="'.$value.'" />';
				}
			// </Ries van Twisk added support for multiple checkboxes>
			} else {
				$markerArray['###FIELD_'.$fName.'_CHECKED###'] = ($dataArray[$fName])?'checked':'';
				$markerArray['###LABEL_'.$fName.'_CHECKED###'] = ($dataArray[$fName])?$this->pi_getLL('yes'):$this->pi_getLL('no');
			}
			if (in_array(trim($fName), $this->requiredArr) ) {
				$markerArray['###REQUIRED_'.$this->cObj->caseshift($fName,'upper').'###'] = '<span>*</span>';
				$markerArray['###MISSING_'.$this->cObj->caseshift($fName,'upper').'###'] = $this->pi_getLL('missing_'.$fName);
				$markerArray['###MISSING_INVITATION_'.$this->cObj->caseshift($fName,'upper').'###'] = $this->pi_getLL('missing_invitation_'.$fName);
			} else {
				$markerArray['###REQUIRED_'.$this->cObj->caseshift($fName,'upper').'###'] = '';
			}
		}
		
			// Button labels
		$buttonLabels = t3lib_div::trimExplode(',', $this->buttonLabelsList);
		while (list(, $labelName) = each($buttonLabels) ) {
			$markerArray['###LABEL_BUTTON_'.$this->cObj->caseshift($labelName,'upper').'###'] = $this->pi_getLL('button_'.$labelName);
		}
		
			// Extra labels
		if (isset($this->conf['extraLabels']) && $this->conf['extraLabels'] != '') {
				$otherLabelsList .= ',' . $this->conf['extraLabels'];
		}
		
			// Labels possibly with variables
		$otherLabels = t3lib_div::trimExplode(',', $this->otherLabelsList);
		while (list(, $labelName) = each($otherLabels) ) {
			$markerArray['###LABEL_'.$this->cObj->caseshift($labelName,'upper').'###'] = sprintf($this->pi_getLL($labelName), $this->thePidTitle, $dataArray['name'], $dataArray['email'], $dataArray['first_name']); 
		}
		
		return $markerArray;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sr_email_subscribe/pi1/class.tx_sremailsubscribe_pi1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sr_email_subscribe/pi1/class.tx_sremailsubscribe_pi1.php']);
}

?>
