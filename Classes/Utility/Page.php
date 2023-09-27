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

use TYPO3\CMS\Core\Database\QueryGenerator;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Page Utility class
 *
 */
class Page
{
    /**
     * Return the children page id
     *
     * @param string $pageIds comma separated list of ids
     * @param int $recursive recursive levels
     * @return string comma separated list of ids
     */
    public static function getPageChildren($pageIds = '', $recursive = 0): string
    {
        $recursive = (int) $recursive;
        if ($recursive <= 0) {
            return $pageIds ?? '';
        }

        $queryGenerator = GeneralUtility::makeInstance(QueryGenerator::class);
        $recursiveStoragePids = $pageIds;
        $storagePids = GeneralUtility::intExplode(',', $pageIds);
        foreach ($storagePids as $startPid) {
            if ($startPid >= 0) {
                $pids = $queryGenerator->getTreeList($startPid, $recursive);
                if (strlen($pids) > 0) {
                    $recursiveStoragePids .= ',' . $pids;
                }
            }
        }
        return GeneralUtility::uniqueList($recursiveStoragePids);
    }
}
