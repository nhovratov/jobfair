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

namespace Dan\Jobfair\ViewHelpers\Security;

use Dan\Jobfair\Domain\Model\Job;
use Dan\Jobfair\Service\AccessControlService;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * View helper to create additional parameters for link to user profile
 *
 * @author Dan <typo3dev@outlook.com>
 */
class EditLinkViewHelper extends AbstractConditionViewHelper
{

    /**
     * @var AccessControlService
     */
    protected $accessControlService;

    public function injectAccessControlService(AccessControlService $accessControlService)
    {
        $this->accessControlService = $accessControlService;
    }

    /**
     * Register argument "job" so that it can be passed to viewhelper
     */
    public function initializeArguments()
    {
        $this->registerArgument('job', 'Dan\Jobfair\Domain\Model\Job', 'Object of the job', true);
    }

    /**
     * View helper to display edit or delete link if logged in user is owner of the job
     *
     * @param Job $job The job to be tested for ownership
     * @return string The output
     */
    public function render()
    {
        $job = $this->arguments['job'];
        if ($this->accessControlService->isOwner($job)) {
            return $this->renderThenChild();
        }
        return $this->renderElseChild();
    }
}
