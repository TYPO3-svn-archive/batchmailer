<?php

########################################################################
# Extension Manager/Repository config file for ext: "batchmailer"
#
# Auto generated by Extension Builder 2013-03-12
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Batch Mailer',
	'description' => 'Catches all outgoing mails and sends them later via a Scheduler task.',
	'category' => 'misc',
	'author' => 'François Suter',
	'author_email' => 'typo3@cobweb.ch',
	'author_company' => 'Cobweb Development Sarl',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.7.0-6.0.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>