<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'jobfair',
    'Pi1',
    'Job Fair'
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    'jobfair_pi1',
    'after:subheader'
);
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:jobfair/Configuration/FlexForms/flexform_jobfair.xml',
    'jobfair_pi1'
);
