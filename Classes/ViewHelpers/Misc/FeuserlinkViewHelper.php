<?php
namespace Dan\Jobfair\ViewHelpers\Misc;

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
 * View helper to create additional parameters for link to user profile
 *
 * @author Dan <typo3dev@outlook.com>
 */
class FeuserlinkViewHelper extends AbstractViewHelper {

	/**
	 * View helper to
	 *
	 * @param int|string $uid UID of the user
	 * @param string $name Name of the plugin to show the user (e.g. "tx_wfqbe_pi1")
	 * @param string $field Field of the plugin to identify the user (e.g. "uid")
	 * @return array $additionalParams
	 */
	public function render($uid = '',$name = '',$field = '') {
    $additionalParams = array($name =>  array($field => $uid));
		return $additionalParams;
	}
}