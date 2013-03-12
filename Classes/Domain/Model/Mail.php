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
 *
 *
 * @package batchmailer
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Batchmailer_Domain_Model_Mail extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Recipients of the mail
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $recipients;

	/**
	 * Persons cc'ed in the mail
	 *
	 * @var string
	 */
	protected $copies;

	/**
	 * Persons bcc'ed in the mail
	 *
	 * @var string
	 */
	protected $blindCopies;

	/**
	 * Person sending the mail (from field)
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $sender;

	/**
	 * Subject of the mail
	 *
	 * @var string
	 */
	protected $subject;

	/**
	 * Content of the mail
	 *
	 * @var string
	 */
	protected $body;

	/**
	 * The mail object itself, serialized
	 *
	 * @var string
	 */
	protected $mail;

	/**
	 * The unserialized mail object
	 *
	 * @var Tx_Batchmailer_Utility_Message
	 */
	protected $mailObject;

	/**
	 * Returns the recipients
	 *
	 * @return string $recipients
	 */
	public function getRecipients() {
		return $this->recipients;
	}

	/**
	 * Sets the recipients
	 *
	 * @param string $recipients
	 * @return void
	 */
	public function setRecipients($recipients) {
		$this->recipients = $recipients;
	}

	/**
	 * Returns the copies
	 *
	 * @return string $copies
	 */
	public function getCopies() {
		return $this->copies;
	}

	/**
	 * Sets the copies
	 *
	 * @param string $copies
	 * @return void
	 */
	public function setCopies($copies) {
		$this->copies = $copies;
	}

	/**
	 * Returns the blindCopies
	 *
	 * @return string $blindCopies
	 */
	public function getBlindCopies() {
		return $this->blindCopies;
	}

	/**
	 * Sets the blindCopies
	 *
	 * @param string $blindCopies
	 * @return void
	 */
	public function setBlindCopies($blindCopies) {
		$this->blindCopies = $blindCopies;
	}

	/**
	 * Returns the sender
	 *
	 * @return string $sender
	 */
	public function getSender() {
		return $this->sender;
	}

	/**
	 * Sets the sender
	 *
	 * @param string $sender
	 * @return void
	 */
	public function setSender($sender) {
		$this->sender = $sender;
	}

	/**
	 * Returns the subject
	 *
	 * @return string $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Sets the subject
	 *
	 * @param string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * Returns the body
	 *
	 * @return string $body
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Sets the body
	 *
	 * @param string $body
	 * @return void
	 */
	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * Returns the mail
	 *
	 * @return string $mail
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * Sets the mail
	 *
	 * @param string $mail
	 * @return void
	 */
	public function setMail($mail) {
		$this->mail = $mail;
		$this->mailObject = unserialize($mail);
	}

	/**
	 * Returns the mailObject
	 *
	 * @return Tx_Batchmailer_Utility_Message $mailObject
	 */
	public function getMailObject() {
		return $this->mailObject;
	}

	/**
	 * Sets the mailObject
	 *
	 * @param Tx_Batchmailer_Utility_Message $mailObject
	 * @return void
	 */
	public function setMailObject($mailObject) {
		$this->mailObject = $mailObject;
		$this->mail = serialize($mailObject);
	}

}
?>