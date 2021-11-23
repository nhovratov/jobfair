<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Dan.' . 'jobfair',
    'Pi1',
    [
        'Job' => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
    ],
    // non-cacheable actions
    [
        'Job' => 'list, latest, show, new, create, edit, update, confirmDelete, delete, newApplication, createApplication',
    ]
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'apps-pagetree-folder-contains-jobs',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:jobfair/Resources/Public/Icons/folder.gif']
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\Dan\Jobfair\Property\TypeConverter\UploadedFileReferenceConverter::class);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(\Dan\Jobfair\Property\TypeConverter\ObjectStorageConverter::class);
