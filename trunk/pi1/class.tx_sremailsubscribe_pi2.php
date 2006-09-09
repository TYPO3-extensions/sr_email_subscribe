<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2003 Kasper Skaarhoj (kasper@typo3.com)
*  (c) 2004 Stanislas Rolland <stanislas.rolland(arobas)fructifor.ca>
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
* tx_sremailsubscribe_pi2 will use casual language files (tu, t�, du, etc.)
*
* @author Kasper Skaarhoj <kasper@typo3.com>
* @author Stanislas Rolland <stanislas.rolland(arobas)fructifor.ca>
*/

require_once(t3lib_extMgm::extPath('sr_email_subscribe').'pi1/class.tx_sremailsubscribe_pi1.php');

class tx_sremailsubscribe_pi2 extends tx_sremailsubscribe_pi1 {
	
			// Plugin initialization
	var $prefixId = 'tx_sremailsubscribe_pi2';  // Same as class name
	var $scriptRelPath = 'pi1/class.tx_sremailsubscribe_pi2.php'; // Path to this script relative to the extension dir.

}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sr_email_subscribe/pi1/class.tx_sremailsubscribe_pi2.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sr_email_subscribe/pi1/class.tx_sremailsubscribe_pi2.php']);
}

?>
