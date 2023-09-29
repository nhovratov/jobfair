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

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * View helper to create additional parameters for link to user profile
 *
 * @author Dan <typo3dev@outlook.com>
 */
class FeuserlinkViewHelper extends AbstractViewHelper
{
    /**
     * View helper to
     *
     * @return array $additionalParams
     */
    public function render()
    {
        $uid = $this->arguments['uid'];
        $name = $this->arguments['name'];
        $field = $this->arguments['field'];
        $additionalParams = [$name =>  [$field => $uid]];
        return $additionalParams;
    }

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('uid', 'mixed', 'UID of the user', false, '');
        $this->registerArgument('name', 'string', 'Name of the plugin to show the user (e.g. "tx_wfqbe_pi1")', false, '');
        $this->registerArgument('field', 'string', 'Field of the plugin to identify the user (e.g. "uid")', false, '');
    }
}
