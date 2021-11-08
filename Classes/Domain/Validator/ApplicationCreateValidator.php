<?php
namespace Dan\Jobfair\Domain\Validator;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

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
 * The validator for applications
 *
 * @author Dan <typo3dev@outlook.com>
 */

class ApplicationCreateValidator extends AbstractValidator  {

	/**
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 *
	 * @var array
	 */
	protected $settings = array();

	/**
	 * @param \Dan\Jobfair\Domain\Model\Application $application
	 * @return bool
	 */
	public function isValid($application) {
		$this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,'jobfair');
		$isValid = TRUE;

		if (empty($application->getEmail()) && $this->settings['application']['validation']['email']['required'] ) {
			$this->addError(
					$this->translateErrorMessage(
							'validation.email.required',
							'jobfair'
					), 1502963660);
			$isValid = FALSE;
		}

		if (!$this->validEmail($application->getEmail()) && $this->settings['application']['validation']['email']['validEmail']) {
			$this->addError(
					$this->translateErrorMessage(
							'validation.email.validEmail',
							'jobfair'
					), 1502963661);
			$isValid = FALSE;
		}

		if (!is_string($application->getMessage()) && $this->settings['application']['validation']['message']['required']) {
			$this->addError(
					$this->translateErrorMessage(
							'validation.message.required',
							'jobfair'
					), 1502963662);
			$isValid = FALSE;
		}
		return $isValid;
	}

	/**
	 * @param $emailAddress
	 * @return bool
	 */
	protected function validEmail($emailAddress) {
		return GeneralUtility::validEmail($emailAddress);
	}
}