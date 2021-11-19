<?php
namespace Dan\Jobfair\Domain\Model;

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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The model for Filter
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Filter extends AbstractEntity {

	/**
	 * categories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Category>
	 */
	protected $categories;

	/**
	 * regions
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Region>
	 */
	protected $regions;

	/**
	 * sectors
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Sector>
	 */
	protected $sectors;

	/**
	 * disciplines
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Discipline>
	 */
	protected $disciplines;

	/**
	 * educations
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Education>
	 */
	protected $educations;
	
	/**
	 * job type
	 *
	 * @var integer
	 */
	protected $jobType;  
  
	/**
	 * contract types
	 * 
	 * @var integer
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
	 * @var integer
	 */
	protected $own;

    /**
     * __construct
     */
    public function __construct() {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     *
     * @return void
     */
    protected function initStorageObjects() {
        $this->categories = new ObjectStorage();
		$this->regions = new ObjectStorage();
		$this->sectors = new ObjectStorage();
		$this->disciplines = new ObjectStorage();
		$this->educations = new ObjectStorage();
    }

	/**
	 * Adds a category
	 *
	 * @param \Dan\Jobfair\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Category> $categories
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Category> $categories
	 * @return void
	 */
	public function setCategories(ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Adds a region
	 *
	 * @param \Dan\Jobfair\Domain\Model\Region $region
	 * @return void
	 */
	public function addRegion(Region $region) {
		$this->regions->attach($region);
	}

	/**
	 * Returns the regions
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Region> $regions
	 */
	public function getRegions() {
		return $this->regions;
	}

	/**
	 * Sets the regions
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Region> $regions
	 * @return void
	 */
	public function setRegions(ObjectStorage $regions) {
		$this->regions = $regions;
	}

	/**
	 * Adds a sector
	 *
	 * @param \Dan\Jobfair\Domain\Model\Sector $sector
	 * @return void
	 */
	public function addSector(Sector $sector) {
		$this->sectors->attach($sector);
	}

	/**
	 * Returns the sectors
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Sector> $sectors
	 */
	public function getSectors() {
		return $this->sectors;
	}

	/**
	 * Sets the sectors
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Sector> $sectors
	 * @return void
	 */
	public function setSectors(ObjectStorage $sectors) {
		$this->sectors = $sectors;
	}

	/**
	 * Adds a discipline
	 *
	 * @param \Dan\Jobfair\Domain\Model\Discipline $discipline
	 * @return void
	 */
	public function addDiscipline(Discipline $discipline) {
		$this->disciplines->attach($discipline);
	}

	/**
	 * Returns the disciplines
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Discipline> $disciplines
	 */
	public function getDisciplines() {
		return $this->disciplines;
	}

	/**
	 * Sets the disciplines
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Discipline> $disciplines
	 * @return void
	 */
	public function setDisciplines(ObjectStorage $disciplines) {
		$this->disciplines = $disciplines;
	}

	/**
	 * Adds a education
	 *
	 * @param \Dan\Jobfair\Domain\Model\Education $education
	 * @return void
	 */
	public function addEducation(Education $education) {
		$this->educations->attach($education);
	}

	/**
	 * Returns the educations
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Education> $educations
	 */
	public function getEducations() {
		return $this->educations;
	}

	/**
	 * Sets the educations
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Education> $educations
	 * @return void
	 */
	public function setEducations(ObjectStorage $educations) {
		$this->educations = $educations;
	}
	
	/**
	 * Returns the jobType
	 *
	 * @return integer $jobType
	 */
	public function getJobType() {
		return $this->jobType;
	}

	/**
	 * Sets the jobType
	 *
	 * @param \integer $jobType
	 * @return void
	 */
	public function setJobType($jobType) {
		$this->jobType = $jobType;
	}
  
	/**
	 * Returns the contractType
	 *
	 * @return integer $contractType
	 */
	public function getContractType() {
		return $this->contractType;
	}

	/**
	 * Sets the contractType
	 *
	 * @param \integer $contractType
	 * @return void
	 */
	public function setContractType($contractType) {
		$this->contractType = $contractType;
	}

	/**
	 * Returns the searchword
	 *
	 * @return string $searchword
	 */
	public function getSearchword() {
		return $this->searchword;
	}

	/**
	 * Sets the searchword
	 *
	 * @param string $searchword
	 * @return void
	 */
	public function setSearchword($searchword) {
		$this->searchword = $searchword;
	}

	/**
	 * Returns own
	 *
	 * @return integer $own
	 */
	public function getOwn() {
		return $this->own;
	}

	/**
	 * Sets own
	 *
	 * @param \integer $own
	 * @return void
	 */
	public function setOwn($own) {
		$this->own = $own;
	}
}
