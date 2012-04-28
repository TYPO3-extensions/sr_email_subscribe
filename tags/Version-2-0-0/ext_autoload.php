<?php
/*
 * Register necessary class names with autoloader
 *
 * $Id: ext_autoload.php $
 */
$sr_email_subscribeExtensionPath = t3lib_extMgm::extPath('sr_email_subscribe');
return array(
	'tx_sremailsubscribe_pi1' => $sr_email_subscribeExtensionPath . 'pi1/class.tx_sremailsubscribe_pi1.php',
	'tx_sremailsubscribe_pi1_base' => $sr_email_subscribeExtensionPath . 'pi1/class.tx_sremailsubscribe_pi1_base.php',
);
unset($sr_email_subscribeExtensionPath);
?>