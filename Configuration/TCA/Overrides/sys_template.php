<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/Main', 'Job Fair - Main Settings');
ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/Layout', 'Job Fair - Add basic layout');
ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/FlashMassages', 'Job Fair - Add CSS for FlashMassages');
ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/RSS', 'Job Fair - Add RSS Feed');
ExtensionManagementUtility::addStaticFile('jobfair', 'Configuration/TypoScript/DatePicker', 'Job Fair - Add DatePicker (jQuery)');
