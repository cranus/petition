<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Guy Sinden <sinden@abis-freiburg.de>
 *  Bastian Bringenberg <typo3@bastian-bringenberg.de>, Bastian Bringenberg
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
 * @package petition
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Petition_Domain_Model_PetitionsEntry extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * firstname
	 *
	 * @var string
	 */
	protected $firstname;

	/**
	 * lastname
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lastname;

	/**
	 * emailadress
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $emailadress;

	/**
	 * country
	 *
	 * @var string
	 */
	protected $country;

	/**
	 * town
	 *
	 * @var string
	 */
	protected $town;

	/**
	 * zip
	 *
	 * @var string
	 */
	protected $zip;

	/**
	 * street
	 *
	 * @var string
	 */
	protected $street;

	/**
	 * petition
	 *
	 * @var Tx_Petition_Domain_Model_Petition
	 * @lazy
	 */
	protected $petition;

        /**
         * tstamp
         *
         * @var DateTime
         */
        protected $tstamp;

       /**
        * hide
        *
        * @var int
        */
        protected $hidden;

	/**
	 * message
	 *
	 * @var string
	 */
	protected $message;

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Returns the emailadress
	 *
	 * @return string $emailadress
	 */
	public function getEmailadress() {
		return $this->emailadress;
	}

	/**
	 * Sets the emailadress
	 *
	 * @param string $emailadress
	 * @return void
	 */
	public function setEmailadress($emailadress) {
		$this->emailadress = $emailadress;
	}

	/**
	 * Returns the country
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Returns the town
	 *
	 * @return string $town
	 */
	public function getTown() {
		return $this->town;
	}

	/**
	 * Sets the town
	 *
	 * @param string $town
	 * @return void
	 */
	public function setTown($town) {
		$this->town = $town;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the street
	 *
	 * @return string $street
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * Sets the street
	 *
	 * @param string $street
	 * @return void
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * Returns the petition
	 *
	 * @return Tx_Petition_Domain_Model_Petition $petition
	 */
	public function getPetition() {
		return $this->petition;
	}

	/**
	 * Sets the petition
	 *
	 * @param Tx_Petition_Domain_Model_Petition $petition
	 * @return void
	 */
	public function setPetition(Tx_Petition_Domain_Model_Petition $petition) {
		$this->petition = $petition;
	}

        public function getTstamp() {
            return $this->tstamp;
        }

        public function setTstamp($tstamp) {
            $this->tstamp = $tstamp;
        }

        /**
        * Get the Hide
        *
        * return int $hidden
        */
        public function getHidden() {
            return $this->hidden;
        }

        /**
        * Set the Hide
        *
        * @param int $hidden
        * @return void
        */
        public function setHidden($hidden) {
            $this->hidden = $hidden;
        }

        /**
        * Get the Message
        *
        * return string $message
        */
        public function getMessage() {
            return $this->message;
        }

        /**
        * Set the Message
        *
        * @param string $message
        * @return void
        */
        public function setMessage($message) {
            $this->message = $message;
        }


        /**
         * Gets the Verification
         *
         * @return String
         */
        public function getVerification(){
            return sha1('Petition' . $this->getUid(). $this->getFirstname());
        }



}
?>
