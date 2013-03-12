<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Batch Mailer');

t3lib_extMgm::addLLrefForTCAdescr('tx_batchmailer_domain_model_mail', 'EXT:batchmailer/Resources/Private/Language/locallang_csh_tx_batchmailer_domain_model_mail.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_batchmailer_domain_model_mail');
$TCA['tx_batchmailer_domain_model_mail'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail',
		'label' => 'subject',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'default_sortby' => 'ORDER BY crdate',
		'dividers2tabs' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'searchFields' => 'recipients,copies,blind_copies,sender,subject,body',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Mail.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_batchmailer_domain_model_mail.png'
	),
);

?>