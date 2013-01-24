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
class Tx_Petition_Controller_PetitionsEntryController extends Tx_Extbase_MVC_Controller_ActionController {

        /**
         * formIDSafe
         *
         * @var String
         */
         protected $formIDSafe = '';

	/**
	 * petitionsEntryRepository
	 *
	 * @var Tx_Petition_Domain_Repository_PetitionsEntryRepository
	 */
	protected $petitionsEntryRepository;

    /**
	 * petitionRepository
	 *
	 * @var Tx_Petition_Domain_Repository_PetitionRepository
	 */
	protected $petitionRepository;

   /**
    * errorString_noPetition
    *
    * @var string
    */
    protected $errorString_noPetition = 'You have not set up a right Petition for this.';

    /**
	 * injectPetitionsEntryRepository
	 *
	 * @param Tx_Petition_Domain_Repository_PetitionsEntryRepository $petitionsEntryRepository
	 * @return void
	 */
	public function injectPetitionsEntryRepository(Tx_Petition_Domain_Repository_PetitionsEntryRepository $petitionsEntryRepository) {
		$this->petitionsEntryRepository = $petitionsEntryRepository;
	}

    /**
	 * injectPetitionRepository
	 *
	 * @param Tx_Petition_Domain_Repository_PetitionRepository $petitionRepository
	 * @return void
	 */
	public function injectPetitionRepository(Tx_Petition_Domain_Repository_PetitionRepository $petitionRepository) {
		$this->petitionRepository = $petitionRepository;
	}

        /**
         * Overwritten to createIDs for the labels
         *
         * @param Tx_Extbase_View_ViewInterface $view The view to be initialized
         * @return void
         */
        protected function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {
           $result = "";
           $charPool = '0123456789abcdefghijklmnopqrstuvwxyz';
           for($p = 0; $p<6; $p++) $result .= $charPool[mt_rand(0,strlen($charPool)-1)];
           $this->formIDSafe = sha1($result);
           $this->view->assign('formIDSafe', $this->formIDSafe);
        }

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
            $petition = $this->petitionRepository->findByUid($this->settings['flexform']['petition']);
            if($petition == NULL) return $this->errorString_noPetition;
            $entries = $this->petitionsEntryRepository->findByPetition($petition);
            $this->view->assign('entries', $entries);
	}

	/**
	 * action new
	 *
	 * @param Tx_Petition_Domain_Model_PetitionsEntry $newPetitionsEntry
	 * @dontvalidate $newPetitionsEntry
	 * @return void
	 */
	public function newAction(Tx_Petition_Domain_Model_PetitionsEntry $newPetitionsEntry = NULL) {
                $petition = $this->petitionRepository->findByUid($this->settings['flexform']['petition']);
                if($petition == NULL) return $this->errorString_noPetition;
		$this->view->assign('newPetitionsEntry', $newPetitionsEntry);
	}

	/**
	 * action create
	 *
	 * @param Tx_Petition_Domain_Model_PetitionsEntry $newPetitionsEntry
	 * @return void
	 */
	public function createAction(Tx_Petition_Domain_Model_PetitionsEntry $newPetitionsEntry) {
            $petition = $this->petitionRepository->findByUid($this->settings['flexform']['petition']);
            $newPetitionsEntry->setPetition($petition);
            $newPetitionsEntry->setHidden(1);
            $this->petitionsEntryRepository->add($newPetitionsEntry);
            /* @var $persistenceManager Tx_Extbase_Persistence_Manager */
            $persistenceManager = t3lib_div::makeInstance('Tx_Extbase_Persistence_Manager');
            $persistenceManager->persistAll();
            $this->view->assign('entry', $newPetitionsEntry);
            $this->sendEmail($newPetitionsEntry);
	}

	/**
	 * action count
	 *
	 * @return void
	 */
	public function countAction() {
            $petition = $this->petitionRepository->findByUid($this->settings['flexform']['petition']);
            if($petition == NULL) return $this->errorString_noPetition;
            $entries = $this->petitionsEntryRepository->findByPetition($petition);
            $this->view->assign('entries', $entries);
	}

    /**
	 * action configm
     *
	 * @param String $verification
     * @param Tx_Petition_Domain_Model_PetitionsEntry $entry
	 * @dontvalidate $entry
	 * @return void
	 */
	public function confirmAction($verification, Tx_Petition_Domain_Model_PetitionsEntry $entry = NULL) {
			$entry = $this->petitionsEntryRepository->findHiddenByUid(intval($this->request->getArgument('entry')));
			$entry = $entry->getFirst();
            if($entry == NULL ) $this->redirect('');
			$status = 0;
            if($verification == $entry->getVerification()){
                $status = 1;
                $entry->setHidden(0);
            }
            $this->view->assign('status', $status);
	}

        /**
        * function send Email
        *
        * @param Tx_Petition_Domain_Model_PetitionsEntry $entry
        */
        protected function sendEmail(Tx_Petition_Domain_Model_PetitionsEntry $entry){
            $mailbody = $this->getEmailText($entry);
            $mail = t3lib_div::makeInstance('t3lib_mail_Message');
            $mail->setFrom(array($this->settings['flexform']['fromMail'] => $this->settings['flexform']['fromName']));
            $mail->addTo($entry->getEmailadress());
            $mail->setSubject('[Petition] '.$this->settings['flexform']['fromHeadline'].' '.$entry->getPetition()->getTitle());
            $mail->setBody($mailbody);
            $mail->send();
        }


        /**
         * function getEmailText
         *
         * @param Tx_Petition_Domain_Model_PetitionsEntry $entry
         * @param String $templateName
         * @return String
         */
        protected function getEmailText(Tx_Petition_Domain_Model_PetitionsEntry $entry, $templateName = 'MailText'){
            $emailView = $this->objectManager->create('Tx_Fluid_View_StandaloneView');
            $emailView->setFormat('txt');
            $templateRootPath = t3lib_extMgm::extPath('petition').'/Resources/Private/Templates/';
            $templatePathAndFilename = $templateRootPath . $this->request->getControllerName().'/' . $templateName . '.txt';
            $emailView->setTemplatePathAndFilename($templatePathAndFilename);
            $this->uriBuilder->setCreateAbsoluteUri(true);
            $this->uriBuilder->setArguments(array('tx_petition_petition' => array('action' => 'confirm','verification' => $entry->getVerification(), 'entry' => $entry->getUid())));
            $link = $this->uriBuilder->buildFrontendUri();
            $emailView->assign('link', $link);
            $emailView->assign('settings', $this->settings);
            $emailView->assign('entry', $entry);
            return $emailView->render();
        }

}
?>
