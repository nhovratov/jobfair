<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',

        'versioningWS' => 2,
        'versioning_followPages' => true,

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
        'iconfile' => 'EXT:jobfair/Resources/Public/Icons/tx_jobfair_domain_model_application.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, name, email, message, attachment, jobs',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,--palette--;;1,title,name,email,message,attachment,jobs,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ]
                ],
                'foreign_table' => 'tx_jobfair_domain_model_application',
                // no sys_language_uid = -1 allowed explicitly!
                'foreign_table_where' => 'AND tx_jobfair_domain_model_application.pid=###CURRENT_PID### AND tx_jobfair_domain_model_application.sys_language_uid IN (-1,0)',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],

        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ]
        ],

        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ]
        ],
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
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'attachment',
                [
                    'foreign_match_fields' => [
                        'tablenames' => 'tx_jobfair_domain_model_application',
                        'table_local' => 'sys_file'
                    ],
                    'maxitems' => 6,
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ]
                ],
                'pdf,zip,rar'
            )
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
                'size' => 1,
                'autoSizeMax' => 1,
                'maxitems' => 1,
                'multiple' => 0,
            ],
        ],
    ],
];
