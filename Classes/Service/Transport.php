<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 François Suter <typo3@cobweb.ch>, Cobweb Development Sarl
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Mail Transport which stores all mails in a database table, to be sent later by a Scheduler task.
 *
 * @author Francois Suter <typo3@cobweb.ch>
 * @package batchmailer
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * $Id$
 */
class Tx_Batchmailer_Service_Transport implements Swift_Transport {
	/**
	 * @var Tx_Batchmailer_Domain_Repository_MailRepository
	 */
	protected $mailRepository;

	/**
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	/**
	 * Instance of the persistence manager
	 *
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;

	/**
	 * @var array
	 */
	protected $configuration = array();

	public function __construct($settings) {
		// Initialize objects manually, as the full Extbase context is not loaded and we cannot rely
		// on dependency injection at this point
		$this->mailRepository = t3lib_div::makeInstance('Tx_Batchmailer_Domain_Repository_MailRepository');
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$this->persistenceManager = t3lib_div::makeInstance('Tx_Extbase_Persistence_Manager');
		// Read the extension's configuration
		$this->configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['batchmailer']);
	}

	/**
	 * Tests if this Transport mechanism has started.
	 *
	 * Not used.
	 *
	 * @return boolean
	 */
	public function isStarted() {
		return FALSE;
	}

	/**
	 * Starts this Transport mechanism.
	 *
	 * Not used.
	 */
	public function start() {
		// TODO: Implement start() method.
	}

	/**
	 * Stops this Transport mechanism.
	 *
	 * Not used.
	 */
	public function stop() {
		// TODO: Implement stop() method.
	}

	/**
	 * Stores the given message in the database.
	 *
	 * With this transport, messages are not sent right away, but stored in the database
	 * to be sent at a later stage.
	 *
	 * @param Swift_Mime_Message $message
	 * @param string[] &$failedRecipients to collect failures by-reference
	 * @return int
	 */
	public function send(Swift_Mime_Message $message, &$failedRecipients = null) {
		// Create the Mail object and set its values
		/** @var $newMail Tx_Batchmailer_Domain_Model_Mail */
		$newMail = $this->objectManager->create('Tx_Batchmailer_Domain_Model_Mail');
		$newMail->setPid($this->getStoragePage());
		$newMail->setSubject($message->getSubject());
		$newMail->setBody($message->getBody());
		$newMail->setRecipients(Tx_Batchmailer_Utility_Format::formatListOfNames($message->getTo()));
		$newMail->setSender(Tx_Batchmailer_Utility_Format::formatListOfNames($message->getFrom()));
		$newMail->setCopies(Tx_Batchmailer_Utility_Format::formatListOfNames($message->getCc()));
		$newMail->setBlindCopies(Tx_Batchmailer_Utility_Format::formatListOfNames($message->getBcc()));
		$newMail->setMailObject($message);
		// Add to the repository and persist
		$this->mailRepository->add($newMail);
		$this->persistenceManager->persistAll();
	}

	/**
	 * Registers a plugin in the Transport.
	 *
	 * Not used.
	 *
	 * @param Swift_Events_EventListener $plugin
	 */
	public function registerPlugin(Swift_Events_EventListener $plugin) {
		// TODO: Implement registerPlugin() method.
	}

	/**
	 * Defines the storage pid for mail objects
	 *
	 * @return int
	 */
	protected function getStoragePage() {
		// Default is the configured storage pid (or 0)
		$storagePid = (isset($this->configuration['storagePid'])) ? $this->configuration['storagePid'] : 0;
		// In the FE context, use the current page, unless it should be overridden by the default storage pid
		if (isset($GLOBALS['TSFE']) && empty($this->configuration['storagePidOverride'])) {
			$storagePid = $GLOBALS['TSFE']->id;
		}
		return $storagePid;
	}
}
?>