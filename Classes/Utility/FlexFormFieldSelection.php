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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This class provides a helper function to select fields in flexform for the jobfair extension.
 *
 * @author Dan <typo3dev@outlook.com>
 */
class FlexFormFieldSelection
{
    /**
     * Add options to FlexForm Selection - Options can be defined in TSConfig
     *
     * @param $params
     */
    public function addOptions(&$params): void
    {
        $tSconfig = BackendUtility::getPagesTSconfig($this->getPid());

        // add fields from TSconfig
        if (!empty($tSconfig['tx_femanager.']['flexForm.'][$params['config']['itemsProcFuncTab'] . '.']['addFieldOptions.'])) {
            $options = $tSconfig['tx_femanager.']['flexForm.'][$params['config']['itemsProcFuncTab'] . '.']['addFieldOptions.'];
            foreach ((array)$options as $value => $label) {
                $params['items'][] = [
                    \str_starts_with($label, 'LLL:') ? $GLOBALS['LANG']->sL($label) : $label,
                    $value
                ];
            }
        }
    }

    /**
     * Read pid from current URL
     * 		URL example:
     * 		http://powermailt361.in2code.de/typo3/alt_doc.php?&returnUrl=
     * 		%2Ftypo3%2Fsysext%2Fcms%2Flayout%2Fdb_layout.php
     * 		%3Fid%3D17%23element-tt_content-14
     * 		&edit[tt_content][14]=edit
     *
     * @return int
     */
    protected function getPid()
    {
        $pid = 0;
        $backUrl = str_replace('?', '&', $GLOBALS['TYPO3_REQUEST']->getParsedBody()['returnUrl'] ?? $GLOBALS['TYPO3_REQUEST']->getQueryParams()['returnUrl'] ?? null);
        $urlParts = GeneralUtility::trimExplode('&', $backUrl, true);
        foreach ($urlParts as $part) {
            if (stristr($part, 'id=')) {
                $pid = str_replace('id=', '', $part);
            }
        }

        return (int)$pid;
    }
}
