<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/Main', 'Job Fair - Main Settings');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/Layout', 'Job Fair - Add basic layout');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/FlashMassages', 'Job Fair - Add CSS for FlashMassages');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/RSS', 'Job Fair - Add RSS Feed');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/DatePicker', 'Job Fair - Add DatePicker (jQuery)');
