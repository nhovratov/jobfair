<?php
namespace Dan\Jobfair\ViewHelpers\Misc;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
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

/**
 * View helper to explode a list
 *
 * @author Dan <typo3dev@outlook.com>
 */
class ExplodeViewHelper extends AbstractViewHelper {

	/**
	 * View helper to explode a list
	 *
	 * @param \string $string 			Any list (e.g. "a,b,c,d")
	 * @param \string $separator 		Separator sign (e.g. ",")
	 * @param \boolean $trim 			Should be trimmed?
	 * @return \array
	 */
	public function render($string = '', $separator = ',', $trim = TRUE) {
		return $trim ? GeneralUtility::trimExplode($separator, $string, 1) : explode($separator, $string);
	}
}