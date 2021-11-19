<?php
namespace Dan\Jobfair\ViewHelpers\Misc;


use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

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
 * View helper like ucfirst()
 *
 * @author Dan <typo3dev@outlook.com>
 */
class UpperViewHelper extends AbstractViewHelper {

	/**
	 * @return string
	 */
	public function render()
	{
		$string = $this->arguments['string'];
		return ucfirst($string);
	}

	public function initializeArguments(): void
	{
		parent::initializeArguments();
		$this->registerArgument('string', 'string', '', false, '');
	}
}
