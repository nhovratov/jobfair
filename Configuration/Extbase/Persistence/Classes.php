<?php

declare(strict_types=1);

use Dan\Jobfair\Domain\Model\User;

return [
    User::class => [
        'tableName' => 'fe_users',
        'recordType' => 'Tx_Extbase_Domain_Model_FrontendUser',
    ],
];
