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

namespace Dan\Jobfair\ViewHelpers\Misc;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * View helper to use camelCaseToLowerCaseUnderscored
 *
 * @author Dan <typo3dev@outlook.com>
 */
class CamelCaseToLowerCaseUnderscoredViewHelper extends AbstractViewHelper
{
    /**
     * View helper to transform a camelCase string to lower_case_underscored
     */
    public function render(): string
    {
        $string = $this->arguments['string'];
        return  GeneralUtility::camelCaseToLowerCaseUnderscored($string);
    }

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('string', 'string', 'Any list (e.g. "a,b,c,d")', true);
    }
}
