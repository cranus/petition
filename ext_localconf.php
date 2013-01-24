<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Petition',
	array(
		'PetitionsEntry' => 'new, create, confirm',	
	),
	// non-cacheable actions
	array(
		'PetitionsEntry' => 'create, ',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'List',
	array(
		'PetitionsEntry' => 'list, count',	
	),
	// non-cacheable actions
	array(
		'PetitionsEntry' => '',
	)
);

?>