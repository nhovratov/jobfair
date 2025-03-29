<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job',
        'label' => 'job_title',
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
        'searchFields' => 'job_title,employer,employer_description,location,short_job_description,job_description,experience,job_requirements,job_benefits,apply_information,salary,job_type,contract_type,region,contact,sector,category,discipline,education,feuser,',
        'iconfile' => 'EXT:jobfair/Resources/Public/Icons/tx_jobfair_domain_model_job.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,job_title,slug,job_image,employer,employer_description,location,short_job_description,job_description,experience,job_requirements,job_benefits,apply_information,salary,job_type,contract_type,region,contact,sector,category,discipline,education,feuser,internal_notes,--div--;LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application,application,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime',
        ],
    ],
    'columns' => [
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tstamp' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.tstamp',
            'config' => [
                'type' => 'none',
                'format' => 'date',
                'eval' => 'date',
            ],
        ],
        'crdate' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.crdate',
            'config' => [
                'type' => 'none',
                'format' => 'date',
                'eval' => 'date',
            ],
        ],
        'job_title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true
            ],
        ],
        'job_image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_image',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'maxitems' => 1,
            ],
        ],
        'employer' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.employer',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'employer_description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.employer_description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'enableRichtext' => true
            ],
        ],
        'location' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.location',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'short_job_description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.short_job_description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'job_description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'enableRichtext' => true
            ],
        ],
        'experience' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.experience',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'job_requirements' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_requirements',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'eval' => 'trim',
                'enableRichtext' => true
            ],
        ],
        'job_benefits' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_benefits',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'eval' => 'trim',
                'enableRichtext' => true
            ],
        ],
        'apply_information' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.apply_information',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'eval' => 'trim',
                'enableRichtext' => true
            ],
        ],
        'salary' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.salary',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'job_type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_type',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_type.0', 'value' => 0],
                    ['label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_type.1', 'value' => 1],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => '',
                'default' => 1,
                'renderType' => 'selectSingle',
            ],
        ],
        'contract_type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.0', 'value' => 0],
                    ['label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.1', 'value' => 1],
                    ['label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.2', 'value' => 2],
                    ['label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.3', 'value' => 3],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => '',
                'renderType' => 'selectSingle',
            ],
        ],
        'region' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.region',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_region',
                'MM' => 'tx_jobfair_job_region_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'contact' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contact',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_contact',
                'maxitems' => 1,
                'default' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'sector' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.sector',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_sector',
                'MM' => 'tx_jobfair_job_sector_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'category' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.category',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_category',
                'MM' => 'tx_jobfair_job_category_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'discipline' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.discipline',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_discipline',
                'MM' => 'tx_jobfair_job_discipline_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'education' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.education',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_education',
                'MM' => 'tx_jobfair_job_education_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'feuser' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.feuser',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'fe_users',
                'foreign_table_where' => 'ORDER BY fe_users.last_name',
                'size' => 5,
                'autoMaxSize' => 30,
                'maxitems' => 9999,
                'MM' => 'tx_jobfair_job_user_mm',
            ],
        ],
        'application' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.application',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_jobfair_domain_model_application',
                'MM' => 'tx_jobfair_job_application_mm',
                'size' => 5,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false
                    ]
                ],
            ],
        ],
        'internal_notes' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.internal_notes',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 16
            ]
        ],
        'slug' => [
            'label' => 'Slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['job_title'],
                    'replacements' => [
                        '/' => '-'
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => ''
            ]
        ],
    ],
];
