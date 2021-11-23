<?php

namespace Dan\Jobfair\Utility;

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Resource\Security\FileNameValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CompatUtility
{
    public static function verifyFilenameAgainstDenyPattern(string $filename): bool
    {
        if ((new Typo3Version())->getMajorVersion() > 9) {
            return GeneralUtility::makeInstance(FileNameValidator::class)->isValid($filename);
        }

        return GeneralUtility::verifyFilenameAgainstDenyPattern($filename);
    }
}
