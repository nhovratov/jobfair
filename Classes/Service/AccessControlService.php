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

namespace Dan\Jobfair\Service;

use Dan\Jobfair\Domain\Model\Job;
use Dan\Jobfair\Domain\Model\User;
use Dan\Jobfair\Domain\Repository\UserRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Service to control frontend editing access for frontend user
 *
 * @author Dan <typo3dev@outlook.com>
 */
class AccessControlService implements SingletonInterface
{
    public function __construct(
        protected UserRepository $userRepository
    ) {
    }

    /**
     * Tests, if the given person is owner of a job
     *
     * @param Job $job
     * @return bool The result; TRUE if the given person is logged in; otherwise FALSE
     */
    public function isOwner(Job $job)
    {
        $loggedInFeuserObject = $this->getFrontendUserObject();
        if ($loggedInFeuserObject instanceof User) {
            if ($job->getFeuser()->offsetExists($loggedInFeuserObject)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function hasLoggedInFrontendUser()
    {
        if (GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('frontend.user', 'isLoggedIn')) {
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getFrontendUserGroups()
    {
        if ($this->hasLoggedInFrontendUser()) {
            return $GLOBALS['TSFE']->fe_user->groupData['uid'];
        }
        return [];
    }

    /**
     * @return int|null
     */
    public function getFrontendUserUid()
    {
        if ($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
            return (int)$GLOBALS['TSFE']->fe_user->user['uid'];
        }
        return null;
    }

    public function getFrontendUserObject(): ?User
    {
        if ($this->hasLoggedInFrontendUser()) {
            $frontendUserId = GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('frontend.user', 'id');
            $user = $this->userRepository->findByUid($frontendUserId);
            return $user;
        }
        return null;
    }
}
