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
 * The model for Filter
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Filter extends AbstractEntity
{
    /**
     * categories
     *
     * @var ObjectStorage<Category>
     */
    protected $categories;

    /**
     * regions
     *
     * @var ObjectStorage<Region>
     */
    protected $regions;

    /**
     * sectors
     *
     * @var ObjectStorage<Sector>
     */
    protected $sectors;

    /**
     * disciplines
     *
     * @var ObjectStorage<Discipline>
     */
    protected $disciplines;

    /**
     * educations
     *
     * @var ObjectStorage<Education>
     */
    protected $educations;

    /**
     * job type
     *
     * @var int
     */
    protected $jobType;

    /**
     * contract types
     *
     * @var int
     */
    protected $contractType;

    /**
     * searchword
     *
     * @var string
     */
    protected $searchword;

    /**
     * own
     *
     * @var int
     */
    protected $own;

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
     */
    protected function initStorageObjects()
    {
        $this->categories = new ObjectStorage();
        $this->regions = new ObjectStorage();
        $this->sectors = new ObjectStorage();
        $this->disciplines = new ObjectStorage();
        $this->educations = new ObjectStorage();
    }

    /**
     * Adds a category
     *
     * @param Category $category
     */
    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    /**
     * Returns the categories
     *
     * @return ObjectStorage<Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     *
     * @param ObjectStorage<Category> $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * Adds a region
     *
     * @param Region $region
     */
    public function addRegion(Region $region): void
    {
        $this->regions->attach($region);
    }

    /**
     * Returns the regions
     *
     * @return ObjectStorage<Region> $regions
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * Sets the regions
     *
     * @param ObjectStorage<Region> $regions
     */
    public function setRegions(ObjectStorage $regions): void
    {
        $this->regions = $regions;
    }

    /**
     * Adds a sector
     *
     * @param Sector $sector
     */
    public function addSector(Sector $sector): void
    {
        $this->sectors->attach($sector);
    }

    /**
     * Returns the sectors
     *
     * @return ObjectStorage<Sector> $sectors
     */
    public function getSectors()
    {
        return $this->sectors;
    }

    /**
     * Sets the sectors
     *
     * @param ObjectStorage<Sector> $sectors
     */
    public function setSectors(ObjectStorage $sectors): void
    {
        $this->sectors = $sectors;
    }

    /**
     * Adds a discipline
     *
     * @param Discipline $discipline
     */
    public function addDiscipline(Discipline $discipline): void
    {
        $this->disciplines->attach($discipline);
    }

    /**
     * Returns the disciplines
     *
     * @return ObjectStorage<Discipline> $disciplines
     */
    public function getDisciplines()
    {
        return $this->disciplines;
    }

    /**
     * Sets the disciplines
     *
     * @param ObjectStorage<Discipline> $disciplines
     */
    public function setDisciplines(ObjectStorage $disciplines): void
    {
        $this->disciplines = $disciplines;
    }

    /**
     * Adds a education
     *
     * @param Education $education
     */
    public function addEducation(Education $education): void
    {
        $this->educations->attach($education);
    }

    /**
     * Returns the educations
     *
     * @return ObjectStorage<Education> $educations
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * Sets the educations
     *
     * @param ObjectStorage<Education> $educations
     */
    public function setEducations(ObjectStorage $educations): void
    {
        $this->educations = $educations;
    }

    /**
     * Returns the jobType
     *
     * @return int $jobType
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * Sets the jobType
     *
     * @param \integer $jobType
     */
    public function setJobType($jobType): void
    {
        $this->jobType = $jobType;
    }

    /**
     * Returns the contractType
     *
     * @return int $contractType
     */
    public function getContractType()
    {
        return $this->contractType;
    }

    /**
     * Sets the contractType
     *
     * @param \integer $contractType
     */
    public function setContractType($contractType): void
    {
        $this->contractType = $contractType;
    }

    /**
     * Returns the searchword
     *
     * @return string $searchword
     */
    public function getSearchword()
    {
        return $this->searchword;
    }

    /**
     * Sets the searchword
     *
     * @param string $searchword
     */
    public function setSearchword($searchword): void
    {
        $this->searchword = $searchword;
    }

    /**
     * Returns own
     *
     * @return int $own
     */
    public function getOwn()
    {
        return $this->own;
    }

    /**
     * Sets own
     *
     * @param \integer $own
     */
    public function setOwn($own): void
    {
        $this->own = $own;
    }
}
