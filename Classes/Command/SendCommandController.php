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
 * Command-line controller for sending all pending mails.
 *
 * @author Francois Suter <typo3@cobweb.ch>
 * @package batchmailer
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * $Id$
 */
class Tx_Batchmailer_Command_SendCommandController extends Tx_Extbase_MVC_Controller_CommandController {
	/**
	 * @var Tx_Batchmailer_Domain_Repository_MailRepository
	 * @inject
	 */
	protected $mailRepository;

	/**
	 * Instance of the persistence manager
	 *
	 * @var Tx_Extbase_Persistence_Manager
	 * @inject
	 */
	protected $persistenceManager;

	/**
	 * @var array
	 */
	protected $configuration = array();

	/**
	 * Sends all pending mails.
	 *
	 * Sends all mails that were stored in the database and that haven't been sent yet.
	 *
	 * @return void
	 */
	public function sendCommand() {
		// Read the extension's configuration
		$this->configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['batchmailer']);
		// Override the batch transport
		$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = $this->configuration['originalTransport'];

		/** @var $mailsToSend Tx_Extbase_Persistence_QueryResultInterface */
		$mailsToSend = $this->mailRepository->findBySent(FALSE);

		/** @var $aMail Tx_Batchmailer_Domain_Model_Mail */
		foreach ($mailsToSend as $aMail) {
			try {
				// It seems that the mail object is not automatically unserialized, do it "manually" here
				$mailObject = unserialize($aMail->getMail());
				$result = $mailObject->send();
				$failedRecipients = $mailObject->getFailedRecipients();
				// Mark the mail as sent
				$aMail->setSent(TRUE);
				$aMail->setSentDate(new DateTime());
				// If it was sent to no one, set status to error and add list of failed recipients
				if ($result == 0) {
					$aMail->setSentStatus(3);
					$aMail->setSentErrorMessage('Failed sending the mail to ' . implode(', ', $failedRecipients));

				} else {
					// If it was sent to at least one person and there are no failed recipients,
					// mark it as a success
					if (count($failedRecipients) == 0) {
						$aMail->setSentStatus(6);

					// Otherwise set status to warning and issue list of failed recipients
					} else {
						$aMail->setSentStatus(4);
						$aMail->setSentErrorMessage('Failed sending the mail to ' . implode(', ', $failedRecipients));
					}
				}
			}
			catch (Exception $e) {
				// If an exception happened, the mail is considered to be not sent, and the exception is logged
				$aMail->setSentDate(new DateTime());
				$aMail->setSentStatus(3);
				$aMail->setSentErrorMessage($e->getMessage() . ' (' . $e->getCode() . ')');
			}
			$this->mailRepository->update($aMail);
		}
		$this->persistenceManager->persistAll();
	}
}
?>