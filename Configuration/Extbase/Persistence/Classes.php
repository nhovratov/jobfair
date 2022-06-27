<?php

declare(strict_types=1);

return [
    \Dan\Jobfair\Domain\Model\FileReference::class => [
        'tableName' => 'sys_file_reference',
        'properties' => [
            'uid_local' => [
                'fieldName' => 'originalFileIdentifier',
            ],
        ],
    ],

    \Dan\Jobfair\Domain\Model\User::class => [
        'tableName' => 'fe_users',
        'recordType' => 'Tx_Extbase_Domain_Model_FrontendUser',
    ],

    \TYPO3\CMS\Extbase\Domain\Model\FrontendUser::class => [
        'subclasses' => [
            'Tx_Jobfair_User' => \Dan\Jobfair\Domain\Model\User::class,
        ],
    ],
];
