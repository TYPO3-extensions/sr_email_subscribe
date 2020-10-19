<?php
/*
 * Extension Manager configuration file for ext "sr_email_subscribe".
 *
 */
$EM_CONF[$_EXTKEY] = [
	'title' => 'Email Address Subscription',
	'description' => 'Email address subscription for TYPO3.',
	'category' => 'plugin',
	'version' => '7.0.2',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => 'tt_address',
	'clearcacheonload' => 1,
	'author' => 'Stanislas Rolland',
	'author_email' => 'typo3@sjbr.ca',
	'author_company' => 'SJBR',
	'constraints' => [
		'depends' => [
			'typo3' => '9.5.0-10.4.99',
			'sr_feuser_register' => '7.0.0-7.0.99',
			'tt_address' => '5.1.2-5.2.99',
			'static_info_tables' => '6.9.0-6.9.99'
		],
		'conflicts' => [
		],
		'suggests' => [
			'sr_freecap' => '2.5.3-2.6.99',
			'direct_mail' => '6.0.0-6.0.99'
		]
	]
];