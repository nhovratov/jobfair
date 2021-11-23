<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Job Fair',
    'description' => 'Simple job market based on Extbase and Fluid. Basically works like dmmjobcontrol. There are list and detail views available. In addition, it is possible to set up an online application system. Furthermore, FE-Users can be enabled to add and edit jobs in the frontend, so to BE-Administration is required. Feeds (Rss091, Rss2, Atom) are also available',
    'category' => 'plugin',
    'version' => '3.0.0',
    'state' => 'stable',
    'uploadfolder' => true,
    'author' => 'Dan',
    'author_email' => 'typo3dev@outlook.com',
    'author_company' => '',
    'constraints' =>
    [
        'depends' =>
        [
            'extbase' => '9.5.0-10.4.99',
            'fluid' => '9.5.0-10.4.99',
            'typo3' => '9.5.0-10.4.99',
        ],
        'conflicts' =>
        [
        ],
        'suggests' =>
        [
        ],
    ],
];
