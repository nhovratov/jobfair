<?php
namespace Dan\Jobfair\Service;

use Dan\Jobfair\Domain\Model\Job;
use Dan\Jobfair\Domain\Model\User;
use TYPO3\CMS\Core\SingletonInterface;

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
 * Service to control frontend editing access for frontend user
 *
 * @author Dan <typo3dev@outlook.com>
 */
class AccessControlService implements SingletonInterface {

	/**
	 * @var \Dan\Jobfair\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository;

	/**
	 * Tests, if the given person is owner of a job
	 *
	 * @param \Dan\Jobfair\Domain\Model\Job $job
	 * @return bool The result; TRUE if the given person is logged in; otherwise FALSE
	 */
	public function isOwner(Job $job) {
		$loggedInFeuserObject = $this->getFrontendUserObject();
		if ($loggedInFeuserObject instanceof User) {
			if ($job->getFeuser()->offsetExists($loggedInFeuserObject)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * @return bool
	 */
	public function hasLoggedInFrontendUser() {
		if ($GLOBALS['TSFE']->loginUser) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * @return array
	 */
	public function getFrontendUserGroups() {
		if($this->hasLoggedInFrontendUser()) {
			return $GLOBALS['TSFE']->fe_user->groupData['uid'];
		}
		return array();
	}

	/**
	 * @return int|null
	 */
	public function getFrontendUserUid() {
		if($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
			return intval($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		return NULL;
	}

	/**
	 * @return \Dan\Jobfair\Domain\Model\User|null
	 */
	public function getFrontendUserObject() {
		if($this->hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
			return $this->userRepository->findByUid($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		return NULL;
	}

}