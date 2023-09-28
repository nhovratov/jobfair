<?php

declare(strict_types=1);

use Dan\Jobfair\Domain\Model\FileReference;
use Dan\Jobfair\Domain\Model\User;

return [
    FileReference::class => [
        'tableName' => 'sys_file_reference',
        'properties' => [
            'uid_local' => [
                'fieldName' => 'originalFileIdentifier',
            ],
        ],
    ],

    User::class => [
        'tableName' => 'fe_users',
        'recordType' => 'Tx_Extbase_Domain_Model_FrontendUser',
    ],
];
