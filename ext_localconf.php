<?php

use Dan\Jobfair\Controller\JobController;
use Dan\Jobfair\Property\TypeConverter\UploadedFileReferenceConverter;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

(function() {
    ExtensionUtility::configurePlugin(
        'jobfair',
        'Pi1',
        [
            JobController::class => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
        ],
        [
            JobController::class => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
        ],
//        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
    $iconRegistry->registerIcon(
        'apps-pagetree-folder-contains-jobs',
        BitmapIconProvider::class,
        ['source' => 'EXT:jobfair/Resources/Public/Icons/folder.gif']
    );

    if ((new Typo3Version())->getMajorVersion() < 12) {
        ExtensionUtility::registerTypeConverter(UploadedFileReferenceConverter::class);
        ExtensionUtility::registerTypeConverter(\Dan\Jobfair\Property\TypeConverter\ObjectStorageConverter::class);
    }
})();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][FileReference::class] = [
    'className' => \Dan\Jobfair\Domain\Model\FileReference::class,
];
