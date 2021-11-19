<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


/**
 * FE Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'jobfair',
	'Pi1',
	'Job Fair'
);


/**
 * Flexform
 */
$pluginSignature = str_replace('_','','jobfair') . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . 'jobfair' . '/Configuration/FlexForms/flexform_jobfair.xml');


/**
 * Static TypoScript
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/Main', 'Job Fair - Main Settings');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/Layout', 'Job Fair - Add basic layout');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/FlashMassages', 'Job Fair - Add CSS for FlashMassages');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/RSS', 'Job Fair - Add RSS Feed');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/DatePicker', 'Job Fair - Add DatePicker (jQuery)');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_application', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_application.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_application');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_category', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_category');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_contact', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_contact.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_contact');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_discipline', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_discipline.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_discipline');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_education', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_education.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_education');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_job', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_job.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_job');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_region', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_region.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_region');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_sector', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_sector.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_sector');
