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
     * @var ObjectStorage<Category>
     */
    protected ObjectStorage $categories;

    /**
     * @var ObjectStorage<Region>
     */
    protected ObjectStorage $regions;

    /**
     * @var ObjectStorage<Sector>
     */
    protected ObjectStorage $sectors;

    /**
     * @var ObjectStorage<Discipline>
     */
    protected ObjectStorage $disciplines;

    /**
     * @var ObjectStorage<Education>
     */
    protected $educations;

    protected int $jobType = 99;
    protected int $contractType = 0;
    protected string $searchword = '';
    protected bool $own = false;

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
    protected function initStorageObjects(): void
    {
        $this->categories = new ObjectStorage();
        $this->regions = new ObjectStorage();
        $this->sectors = new ObjectStorage();
        $this->disciplines = new ObjectStorage();
        $this->educations = new ObjectStorage();
    }

    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    /**
     * @return ObjectStorage<Category> $categories
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    /**
     * @param ObjectStorage<Category> $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    public function addRegion(Region $region): void
    {
        $this->regions->attach($region);
    }

    /**
     * @return ObjectStorage<Region> $regions
     */
    public function getRegions(): ObjectStorage
    {
        return $this->regions;
    }

    /**
     * @param ObjectStorage<Region> $regions
     */
    public function setRegions(ObjectStorage $regions): void
    {
        $this->regions = $regions;
    }

    public function addSector(Sector $sector): void
    {
        $this->sectors->attach($sector);
    }

    /**
     * @return ObjectStorage<Sector> $sectors
     */
    public function getSectors()
    {
        return $this->sectors;
    }

    /**
     * @param ObjectStorage<Sector> $sectors
     */
    public function setSectors(ObjectStorage $sectors): void
    {
        $this->sectors = $sectors;
    }

    public function addDiscipline(Discipline $discipline): void
    {
        $this->disciplines->attach($discipline);
    }

    /**
     * @return ObjectStorage<Discipline> $disciplines
     */
    public function getDisciplines()
    {
        return $this->disciplines;
    }

    /**
     * @param ObjectStorage<Discipline> $disciplines
     */
    public function setDisciplines(ObjectStorage $disciplines): void
    {
        $this->disciplines = $disciplines;
    }

    public function addEducation(Education $education): void
    {
        $this->educations->attach($education);
    }

    /**
     * @return ObjectStorage<Education> $educations
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * @param ObjectStorage<Education> $educations
     */
    public function setEducations(ObjectStorage $educations): void
    {
        $this->educations = $educations;
    }

    public function getJobType(): int
    {
        return $this->jobType;
    }

    public function setJobType(int $jobType): void
    {
        $this->jobType = $jobType;
    }

    public function getContractType(): int
    {
        return $this->contractType;
    }

    public function setContractType(int $contractType): void
    {
        $this->contractType = $contractType;
    }

    public function getSearchword(): string
    {
        return $this->searchword;
    }

    public function setSearchword(string $searchword): void
    {
        $this->searchword = $searchword;
    }

    public function getOwn(): bool
    {
        return $this->own;
    }

    public function setOwn(bool $own): void
    {
        $this->own = $own;
    }
}
