<?php
/*
 * Extension Manager configuration file for ext "sr_email_subscribe".
 *
 */
$EM_CONF[$_EXTKEY] = array(
	'title' => 'Email Address Subscription',
	'description' => 'An email newsletter and address subscription variant of the Front End User Registration.',
	'category' => 'plugin',
	'version' => '6.0.0',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => 'tt_address',
	'clearcacheonload' => 1,
	'author' => 'Stanislas Rolland',
	'author_email' => 'typo3@sjbr.ca',
	'author_company' => 'SJBR',
	'constraints' => 
	array(
		'depends' => array(
			'typo3' => '9.5.0-10.4.99',
			'sr_feuser_register' => '5.1.0-7.99.99',
			'tt_address' => '3.2.1-5.99.99',
			'static_info_tables' => '6.4.2-6.99.99'
		),
		'conflicts' => array(
			'germandates' => '0.0.0-99.99.99',
			'rlmp_language_detection' => '0.0.0-99.99.99',
			'patch1822' => '0.0.0-99.99.99'
		),
		'suggests' => array(
			'sr_freecap' => '2.4.0-2.4.99',
			'direct_mail' => '5.1.0-5.9.99'
		)
	)
);