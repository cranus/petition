<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Petition',
	'Petitions Form'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_petition';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_default.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'List',
	'Petitions List'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_list';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Petition');

t3lib_extMgm::addLLrefForTCAdescr('tx_petition_domain_model_petitionsentry', 'EXT:petition/Resources/Private/Language/locallang_csh_tx_petition_domain_model_petitionsentry.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_petition_domain_model_petitionsentry');
$TCA['tx_petition_domain_model_petitionsentry'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:petition/Resources/Private/Language/locallang_db.xml:tx_petition_domain_model_petitionsentry',
		'label' => 'firstname',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'firstname,lastname,emailadress,country,town,zip,street,petition,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/PetitionsEntry.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_petition_domain_model_petitionsentry.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_petition_domain_model_petition', 'EXT:petition/Resources/Private/Language/locallang_csh_tx_petition_domain_model_petition.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_petition_domain_model_petition');
$TCA['tx_petition_domain_model_petition'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:petition/Resources/Private/Language/locallang_db.xml:tx_petition_domain_model_petition',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
                'petitionsentries' => 'petitionsentries',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Petition.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_petition_domain_model_petition.gif'
	),
);

?>