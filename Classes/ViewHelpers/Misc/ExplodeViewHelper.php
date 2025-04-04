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
 * View helper to explode a list
 *
 * @author Dan <typo3dev@outlook.com>
 */
class ExplodeViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('string', 'string', 'Any list (e.g. "a,b,c,d")', false, '');
        $this->registerArgument('separator', 'string', 'Separator sign (e.g. ",")', false, ',');
        $this->registerArgument('trim', 'boolean', 'Should be trimmed?', false, true);
    }

    /**
     * View helper to explode a list
     */
    public function render(): array
    {
        $string = $this->arguments['string'];
        $separator = $this->arguments['separator'];
        $trim = $this->arguments['trim'];
        return $trim ? GeneralUtility::trimExplode($separator, $string, true) : explode($separator, $string);
    }
}
