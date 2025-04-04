<?php

use Dan\Jobfair\Controller\JobController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

(function () {
    ExtensionUtility::configurePlugin(
        'jobfair',
        'Pi1',
        [
            JobController::class => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
        ],
        [
            JobController::class => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
})();
