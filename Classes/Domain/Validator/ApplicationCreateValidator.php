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

namespace Dan\Jobfair\Domain\Validator;

use Dan\Jobfair\Domain\Model\Application;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

/**
 * The validator for applications
 *
 * @author Dan <typo3dev@outlook.com>
 */
class ApplicationCreateValidator extends AbstractValidator
{
    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @var ConfigurationManager
     */
    protected $configurationManager;

    public function injectConfigurationManager(ConfigurationManager $configurationManager)
    {
        $this->configurationManager = $configurationManager;
    }

    public function setOptions(array $options): void
    {
        $this->initializeDefaultOptions($options);
    }

    /**
     * @param Application $application
     * @return bool
     */
    public function isValid($application): void
    {
        $this->settings = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'jobfair');

        if (empty($application->getEmail()) && $this->settings['application']['validation']['email']['required']) {
            $this->addError(
                $this->translateErrorMessage(
                    'validation.email.required',
                    'jobfair'
                ),
                1502963660
            );
        }

        if (!$this->validEmail($application->getEmail()) && $this->settings['application']['validation']['email']['validEmail']) {
            $this->addError(
                $this->translateErrorMessage(
                    'validation.email.validEmail',
                    'jobfair'
                ),
                1502963661
            );
        }

        if (!is_string($application->getMessage()) && $this->settings['application']['validation']['message']['required']) {
            $this->addError(
                $this->translateErrorMessage(
                    'validation.message.required',
                    'jobfair'
                ),
                1502963662
            );
        }
    }

    /**
     * @param $emailAddress
     * @return bool
     */
    protected function validEmail($emailAddress)
    {
        return GeneralUtility::validEmail($emailAddress);
    }
}
