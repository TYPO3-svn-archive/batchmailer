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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Batchmailer_Domain_Model_Mail.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Batch Mailer
 *
 * @author François Suter <typo3@cobweb.ch>
 */
class Tx_Batchmailer_Domain_Model_MailTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Batchmailer_Domain_Model_Mail
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Batchmailer_Domain_Model_Mail();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getRecipientsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setRecipientsForStringSetsRecipients() { 
		$this->fixture->setRecipients('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getRecipients()
		);
	}
	
	/**
	 * @test
	 */
	public function getCopiesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCopiesForStringSetsCopies() { 
		$this->fixture->setCopies('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCopies()
		);
	}
	
	/**
	 * @test
	 */
	public function getBlindCopiesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBlindCopiesForStringSetsBlindCopies() { 
		$this->fixture->setBlindCopies('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBlindCopies()
		);
	}
	
	/**
	 * @test
	 */
	public function getSenderReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSenderForStringSetsSender() { 
		$this->fixture->setSender('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSender()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubjectReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSubjectForStringSetsSubject() { 
		$this->fixture->setSubject('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSubject()
		);
	}
	
	/**
	 * @test
	 */
	public function getBodyReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBodyForStringSetsBody() { 
		$this->fixture->setBody('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBody()
		);
	}
	
	/**
	 * @test
	 */
	public function getMailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMailForStringSetsMail() { 
		$this->fixture->setMail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMail()
		);
	}
	
	/**
	 * @test
	 */
	public function getMailObjectReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMailObjectForStringSetsMailObject() { 
		$this->fixture->setMailObject('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMailObject()
		);
	}
	
}
?>