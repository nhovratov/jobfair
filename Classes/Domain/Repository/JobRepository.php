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

namespace Dan\Jobfair\Domain\Repository;

use Dan\Jobfair\Domain\Model\Category;
use Dan\Jobfair\Domain\Model\Discipline;
use Dan\Jobfair\Domain\Model\Education;
use Dan\Jobfair\Domain\Model\Filter;
use Dan\Jobfair\Domain\Model\Region;
use Dan\Jobfair\Domain\Model\Sector;
use Dan\Jobfair\Service\AccessControlService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for Jobs
 *
 * @author Dan <typo3dev@outlook.com>
 */
class JobRepository extends Repository
{
    protected AccessControlService $accessControlService;

    public function injectAccessControlService(AccessControlService $accessControlService): void
    {
        $this->accessControlService = $accessControlService;
    }

    /**
     * Find by filter in front end
     *
     * @param Filter $filter
     * @return array|QueryResultInterface
     */
    public function findFiltered(Filter $filter = null)
    {
        $query = $this->createQuery();
        $constraints = []; //to collect all filter constraints
        if ($filter !== null) {
            //jobtype
            $jobType = $filter->getJobType();
            if ($jobType !== 99) {      // 99 is used as "all" option in hard coded select forms
                $constraints[] = $query->equals('job_type', $jobType);
            }

            //contracttype
            $contractType = $filter->getContractType();
            if ($contractType !== 99) {      // 99 is used as "all" option in hard coded select forms
                $constraints[] = $query->equals('contract_type', $contractType);
            }

            //category
            $categories = $filter->getCategories();
            foreach ($categories as $category) {
                $constraints[] = $query->contains('category', $category);
            }

            //region
            $regions = $filter->getRegions();
            foreach ($regions as $region) {
                $constraints[] = $query->contains('region', $region);
            }

            //sector
            $sectors = $filter->getSectors();
            foreach ($sectors as $sector) {
                $constraints[] = $query->contains('sector', $sector);
            }

            //discipline
            $disciplines = $filter->getDisciplines();
            foreach ($disciplines as $discipline) {
                $constraints[] = $query->contains('discipline', $discipline);
            }

            //education
            $educations = $filter->getEducations();
            foreach ($educations as $education) {
                $constraints[] = $query->contains('education', $education);
            }

            if ($filter->getSearchword() !== '') {
                $or = [];
                $searchwords = GeneralUtility::trimExplode(' ', $filter->getSearchword(), true);
                foreach ($searchwords as $searchword) {
                    $or[] = $query->like('job_title', '%' . $searchword . '%');
                    $or[] = $query->like('employer', '%' . $searchword . '%');
                    $or[] = $query->like('employer_description', '%' . $searchword . '%');
                    $or[] = $query->like('location', '%' . $searchword . '%');
                    $or[] = $query->like('short_job_description', '%' . $searchword . '%');
                    $or[] = $query->like('job_description', '%' . $searchword . '%');
                    $or[] = $query->like('experience', '%' . $searchword . '%');
                    $or[] = $query->like('job_requirements', '%' . $searchword . '%');
                    $or[] = $query->like('job_benefits', '%' . $searchword . '%');
                    $or[] = $query->like('apply_information', '%' . $searchword . '%');
                    $or[] = $query->like('salary', '%' . $searchword . '%');
                    $constraints[] = $query->logicalOr(...$or);
                }
            }

            //own
            $own = $filter->getOwn();
            if ($own) {
                $loggedInFeuser = $this->accessControlService->getFrontendUserObject();
                $constraints[] = $query->contains('feuser', $loggedInFeuser);
            }

            if (count($constraints) > 0) {
                $query->matching($query->logicalAnd(...$constraints));
                return $query->execute();
            }
        }
        return $this->findAll();
    }

    /**
     * Find latest jobs
     *
     * @param string $ordering
     * @param int $limit
     * @return array|QueryResultInterface
     */
    public function findLatest($ordering, $limit)
    {
        $query = $this->createQuery();
        if ($ordering == 'sorting') {
            $query->setOrderings([$ordering => QueryInterface::ORDER_ASCENDING]);
        } else {
            $query->setOrderings([$ordering => QueryInterface::ORDER_DESCENDING]);
        }
        $query->setLimit($limit);
        return $query->execute();
    }
}
