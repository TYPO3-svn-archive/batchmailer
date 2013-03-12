<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_batchmailer_domain_model_mail'] = array(
	'ctrl' => $TCA['tx_batchmailer_domain_model_mail']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, recipients, copies, blind_copies, sender, subject, body',
	),
	'types' => array(
		'1' => array('showitem' => 'crdate, hidden, recipients, copies, blind_copies, sender, subject, body'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'crdate' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.crdate',
			'config' => array(
				'type' => 'input',
				'eval' => 'datetime',
				'readOnly' => TRUE
			),
		),
		'hidden' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'recipients' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.recipients',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'readOnly' => TRUE
			),
		),
		'copies' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.copies',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => TRUE
			),
		),
		'blind_copies' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.blind_copies',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => TRUE
			),
		),
		'sender' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.sender',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required',
				'readOnly' => TRUE
			),
		),
		'subject' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.subject',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'readOnly' => TRUE
			),
		),
		'body' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.body',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'readOnly' => TRUE
			),
		),
		'mail' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:batchmailer/Resources/Private/Language/locallang_db.xlf:tx_batchmailer_domain_model_mail.mail',
			'config' => array(
				'type' => 'none'
			)
		)
	),
);

?>