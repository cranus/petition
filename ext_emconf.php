<?php

########################################################################
# Extension Manager/Repository config file for ext "petition".
#
# Auto generated 20-12-2015 16:33
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Petition',
	'description' => 'Petitions Tool by Bastian Bringenberg for Beschneidung-von-Jungen.de ( a german platform agains circumcision ) planed by abis-freiburg.de

If you need additional content please say a word!',
	'category' => 'plugin',
	'author' => 'Guy Sinden, Bastian Bringenberg',
	'author_email' => 'sinden@abis-freiburg.de, typo3@bastian-bringenberg.de',
	'author_company' => ', Bastian Bringenberg',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.1.1',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:33:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"aa5e";s:14:"ext_tables.php";s:4:"f3db";s:14:"ext_tables.sql";s:4:"f3e2";s:47:"Classes/Controller/PetitionsEntryController.php";s:4:"e4c6";s:33:"Classes/Domain/Model/Petition.php";s:4:"ea07";s:39:"Classes/Domain/Model/PetitionsEntry.php";s:4:"bc3c";s:48:"Classes/Domain/Repository/PetitionRepository.php";s:4:"62b3";s:54:"Classes/Domain/Repository/PetitionsEntryRepository.php";s:4:"c23e";s:44:"Configuration/FlexForms/flexform_default.xml";s:4:"e47b";s:41:"Configuration/FlexForms/flexform_list.xml";s:4:"d7e0";s:30:"Configuration/TCA/Petition.php";s:4:"1877";s:36:"Configuration/TCA/PetitionsEntry.php";s:4:"b0bd";s:38:"Configuration/TypoScript/constants.txt";s:4:"f1da";s:34:"Configuration/TypoScript/setup.txt";s:4:"6d88";s:40:"Resources/Private/Language/locallang.xml";s:4:"18ed";s:77:"Resources/Private/Language/locallang_csh_tx_petiton_domain_model_petition.xml";s:4:"b78f";s:83:"Resources/Private/Language/locallang_csh_tx_petiton_domain_model_petitionsentry.xml";s:4:"db17";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"4b72";s:38:"Resources/Private/Layouts/Default.html";s:4:"43db";s:55:"Resources/Private/Templates/PetitionsEntry/Confirm.html";s:4:"1ca7";s:53:"Resources/Private/Templates/PetitionsEntry/Count.html";s:4:"5b34";s:54:"Resources/Private/Templates/PetitionsEntry/Create.html";s:4:"a80f";s:52:"Resources/Private/Templates/PetitionsEntry/List.html";s:4:"690e";s:55:"Resources/Private/Templates/PetitionsEntry/MailText.txt";s:4:"9bf5";s:51:"Resources/Private/Templates/PetitionsEntry/New.html";s:4:"f06f";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:60:"Resources/Public/Icons/tx_petition_domain_model_petition.gif";s:4:"905a";s:66:"Resources/Public/Icons/tx_petition_domain_model_petitionsentry.gif";s:4:"905a";s:14:"doc/manual.sxw";s:4:"5d90";s:28:"nbproject/project.properties";s:4:"bb9a";s:21:"nbproject/project.xml";s:4:"33e1";s:36:"nbproject/private/private.properties";s:4:"1ffc";}',
);

?>