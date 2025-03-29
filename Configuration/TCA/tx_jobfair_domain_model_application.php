<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,name',
        'iconfile' => 'EXT:jobfair/Resources/Public/Icons/tx_jobfair_domain_model_application.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,title,name,email,message,attachment,jobs,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime'],
    ],
    'columns' => [
        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'message' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application.message',
            'config' => [
                'type' => 'text',
                'cols' => 60,
                'rows' => 30,
                'eval' => 'trim'
            ]
        ],
        'attachment' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application.attachment',
            'config' => [
                'type' => 'file',
                'allowed' => 'pdf,zip,rar',
                'maxitems' => 6,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
            ]
        ],
        'jobs' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_jobfair_domain_model_job',
                'MM' => 'tx_jobfair_job_application_mm',
                'MM_opposite_field' => 'application',
            ],
        ],
    ],
];
