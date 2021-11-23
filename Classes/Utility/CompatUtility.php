<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

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
