<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Job Fair',
    'description' => 'Simple job market based on Extbase and Fluid. Basically works like dmmjobcontrol. There are list and detail views available. In addition, it is possible to set up an online application system. Furthermore, FE-Users can be enabled to add and edit jobs in the frontend, so to BE-Administration is required. Feeds (Rss091, Rss2, Atom) are also available',
    'category' => 'plugin',
    'version' => '5.0.3',
    'state' => 'stable',
    'author' => 'Dan',
    'author_email' => 'typo3dev@outlook.com',
    'author_company' => '',
    'constraints' => [
        'depends' => [
            'extbase' => '11.5.3-12.4.99',
            'fluid' => '11.5.3-12.4.99',
            'typo3' => '11.5.3-12.4.99',
        ],
    ],
];
