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

namespace Dan\Jobfair\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The model for Discipline
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Discipline extends AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * jobs
     *
     * @var ObjectStorage<Job>
     */
    protected $jobs;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     */
    protected function initStorageObjects()
    {
        $this->jobs = new ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Adds a Job
     *
     * @param Job $job
     */
    public function addJob(Job $job)
    {
        $this->jobs->attach($job);
    }

    /**
     * Removes a Job
     *
     * @param Job $jobToRemove The Job to be removed
     */
    public function removeJob(Job $jobToRemove)
    {
        $this->jobs->detach($jobToRemove);
    }

    /**
     * Returns the jobs
     *
     * @return ObjectStorage<Job> $jobs
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Sets the jobs
     *
     * @param ObjectStorage<Job> $jobs
     */
    public function setJobs(ObjectStorage $jobs)
    {
        $this->jobs = $jobs;
    }
}
