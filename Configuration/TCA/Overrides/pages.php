<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

/**
 * Make jobfair selectable in tab "behaviour"
 */
$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes']['contains-jobs'] = 'apps-pagetree-folder-contains-jobs';
$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
    0 => 'Jobfair',
    1 => 'jobs',
    2 => 'apps-pagetree-folder-contains-jobs'
];
