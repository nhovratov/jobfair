<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}
$tmp_alumni_columns = [

    'jobs' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_jobfair_domain_model_job',
            'size' => 10,
            'autoMaxSize' => 10,
            'maxitems' => 9999,
            'multiple' => 0,
            'MM' => 'tx_jobfair_job_user_mm',
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('fe_users', $tmp_alumni_columns);

$GLOBALS['TCA']['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'] .= ',--div--;LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'] .= 'jobs';

// Use first and last name as default label instead of username:
$GLOBALS['TCA']['fe_users']['ctrl']['label'] = 'last_name';
$GLOBALS['TCA']['fe_users']['ctrl']['label_alt'] = 'first_name';
$GLOBALS['TCA']['fe_users']['ctrl']['label_alt_force'] = true;
