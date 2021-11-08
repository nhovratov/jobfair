<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Dan.' . $_EXTKEY,
	'Pi1',
	array(
		'Job' => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
	),
	// non-cacheable actions
	array(
		'Job' => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
	)
);