<?php

use Dan\Jobfair\Controller\JobController;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
    $iconRegistry->registerIcon(
        'apps-pagetree-folder-contains-jobs',
        BitmapIconProvider::class,
        ['source' => 'EXT:jobfair/Resources/Public/Icons/folder.gif']
    );
})();
