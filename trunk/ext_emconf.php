<?php
/*
 * Extension Manager configuration file for ext "sr_email_subscribe".
 *
 */
$EM_CONF[$_EXTKEY] = array(
	'title' => 'Email Address Subscription',
	'description' => 'An email newsletter and address subscription variant of the Front End User Registration.',
	'category' => 'plugin',
	'version' => '4.0.0',
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
			'php' => '5.3.0-0.0.0',
			'typo3' => '6.2.0-6.2.99',
			'sr_feuser_register' => '4.0.0-4.99.99',
			'tt_address' => '2.2.0-',
			'static_info_tables' => '6.3.1-6.3.99'
		),
		'conflicts' => array(
			'germandates' => '0.0.0-99.99.99',
			'rlmp_language_detection' => '0.0.0-99.99.99',
			'patch1822' => '0.0.0-99.99.99'
		),
		'suggests' => array(
			'sr_freecap' => '2.3.0-2.3.99'
		)
	)
);