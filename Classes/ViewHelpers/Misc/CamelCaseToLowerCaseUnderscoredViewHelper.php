<?php
namespace Dan\Jobfair\ViewHelpers\Misc;

use \TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * View helper to use camelCaseToLowerCaseUnderscored
 *
 * @author Dan <typo3dev@outlook.com>
 */
class CamelCaseToLowerCaseUnderscoredViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * View helper to transform a camelCase string to to lower_case_underscored
	 *
	 * @param \string $string 			Any list (e.g. "a,b,c,d")
	 * @return \string
	 */
	public function render($string) {
		return  GeneralUtility::camelCaseToLowerCaseUnderscored($string) ;
	}
}