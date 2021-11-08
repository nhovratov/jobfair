<?php
namespace Dan\Jobfair\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
 * The model for Job
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Job extends AbstractEntity {

	/**
	 * jobTitle
	 *
	 * @var string
	 */
	protected $jobTitle = '';

	/**
	 * jobImage
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $jobImage;

	/**
	 * employer
	 *
	 * @var string
	 */
	protected $employer = '';

	/**
	 * employerDescription
	 *
	 * @var string
	 */
	protected $employerDescription = '';

	/**
	 * location
	 *
	 * @var string
	 */
	protected $location = '';

	/**
	 * shortJobDescription
	 *
	 * @var string
	 */
	protected $shortJobDescription = '';

	/**
	 * jobDescription
	 *
	 * @var string
	 */
	protected $jobDescription = '';

	/**
	 * experience
	 *
	 * @var string
	 */
	protected $experience = '';

	/**
	 * jobRequirements
	 *
	 * @var string
	 */
	protected $jobRequirements = '';

	/**
	 * jobBenefits
	 *
	 * @var string
	 */
	protected $jobBenefits = '';

	/**
	 * applyInformation
	 *
	 * @var string
	 */
	protected $applyInformation = '';

	/**
	 * salary
	 *
	 * @var string
	 */
	protected $salary = '';

	/**
	 * jobType
	 *
	 * @var integer
	 */
	protected $jobType = 0;

	/**
	 * contractType
	 *
	 * @var integer
	 */
	protected $contractType = 0;

	/**
	 * region
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Region>
	 */
	protected $region = NULL;

	/**
	 * contact
	 *
	 * @var \Dan\Jobfair\Domain\Model\Contact
	 */
	protected $contact = NULL;

	/**
	 * sector
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Sector>
	 */
	protected $sector = NULL;

	/**
	 * category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Category>
	 */
	protected $category = NULL;

	/**
	 * discipline
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Discipline>
	 */
	protected $discipline = NULL;

	/**
	 * education
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Education>
	 */
	protected $education = NULL;

	/**
	 * feuser
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\User>
	 */
	protected $feuser = NULL;

	/**
	 * application
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Application>
	 */
	protected $application = NULL;
  
	/**
	 * @var \DateTime
	 */
	protected $starttime = '';

	/**
	 * @var \DateTime
	 */
	protected $endtime = '';


	/**
	 * @var integer
	 */
	protected $hidden;
  
  /**
	 * crdate
	 *
	 * @var \DateTime
	 */
	protected $crdate;

	/**
	 * tstamp
	 *
	 * @var \DateTime
	 */
	protected $tstamp;

	/**
	 * sorting
	 *
	 * @var integer
	 */
	protected $sorting;

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
		$this->region = new ObjectStorage();
		$this->sector = new ObjectStorage();
		$this->category = new ObjectStorage();
		$this->discipline = new ObjectStorage();
		$this->education = new ObjectStorage();
		$this->feuser = new ObjectStorage();
		$this->application = new ObjectStorage();
	}

	/**
	 * Returns the jobTitle
	 *
	 * @return string $jobTitle
	 */
	public function getJobTitle() {
		return $this->jobTitle;
	}

	/**
	 * Sets the jobTitle
	 *
	 * @param string $jobTitle
	 * @return void
	 */
	public function setJobTitle($jobTitle) {
		$this->jobTitle = $jobTitle;
	}

	/**
	 * Returns the jobImage
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $jobImage
	 */
	public function getJobImage() {
		return $this->jobImage;
	}

	/**
	 * Sets the jobImage
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $jobImage
	 * @return void
	 */
	public function setJobImage($jobImage) {
		$this->jobImage = $jobImage;
	}

	/**
	 * Returns the employer
	 *
	 * @return string $employer
	 */
	public function getEmployer() {
		return $this->employer;
	}

	/**
	 * Sets the employer
	 *
	 * @param string $employer
	 * @return void
	 */
	public function setEmployer($employer) {
		$this->employer = $employer;
	}

	/**
	 * Returns the employerDescription
	 *
	 * @return string $employerDescription
	 */
	public function getEmployerDescription() {
		return $this->employerDescription;
	}

	/**
	 * Sets the employerDescription
	 *
	 * @param string $employerDescription
	 * @return void
	 */
	public function setEmployerDescription($employerDescription) {
		$this->employerDescription = $employerDescription;
	}

	/**
	 * Returns the location
	 *
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the shortJobDescription
	 *
	 * @return string $shortJobDescription
	 */
	public function getShortJobDescription() {
		return $this->shortJobDescription;
	}

	/**
	 * Sets the shortJobDescription
	 *
	 * @param string $shortJobDescription
	 * @return void
	 */
	public function setShortJobDescription($shortJobDescription) {
		$this->shortJobDescription = $shortJobDescription;
	}

	/**
	 * Returns the jobDescription
	 *
	 * @return string $jobDescription
	 */
	public function getJobDescription() {
		return $this->jobDescription;
	}

	/**
	 * Sets the jobDescription
	 *
	 * @param string $jobDescription
	 * @return void
	 */
	public function setJobDescription($jobDescription) {
		$this->jobDescription = $jobDescription;
	}

	/**
	 * Returns the experience
	 *
	 * @return string $experience
	 */
	public function getExperience() {
		return $this->experience;
	}

	/**
	 * Sets the experience
	 *
	 * @param string $experience
	 * @return void
	 */
	public function setExperience($experience) {
		$this->experience = $experience;
	}

	/**
	 * Returns the jobRequirements
	 *
	 * @return string $jobRequirements
	 */
	public function getJobRequirements() {
		return $this->jobRequirements;
	}

	/**
	 * Sets the jobRequirements
	 *
	 * @param string $jobRequirements
	 * @return void
	 */
	public function setJobRequirements($jobRequirements) {
		$this->jobRequirements = $jobRequirements;
	}

	/**
	 * Returns the jobBenefits
	 *
	 * @return string $jobBenefits
	 */
	public function getJobBenefits() {
		return $this->jobBenefits;
	}

	/**
	 * Sets the jobBenefits
	 *
	 * @param string $jobBenefits
	 * @return void
	 */
	public function setJobBenefits($jobBenefits) {
		$this->jobBenefits = $jobBenefits;
	}

	/**
	 * Returns the applyInformation
	 *
	 * @return string $applyInformation
	 */
	public function getApplyInformation() {
		return $this->applyInformation;
	}

	/**
	 * Sets the applyInformation
	 *
	 * @param string $applyInformation
	 * @return void
	 */
	public function setApplyInformation($applyInformation) {
		$this->applyInformation = $applyInformation;
	}

	/**
	 * Returns the salary
	 *
	 * @return string $salary
	 */
	public function getSalary() {
		return $this->salary;
	}

	/**
	 * Sets the salary
	 *
	 * @param string $salary
	 * @return void
	 */
	public function setSalary($salary) {
		$this->salary = $salary;
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
	 * @param integer $jobType
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
	 * @param integer $contractType
	 * @return void
	 */
	public function setContractType($contractType) {
		$this->contractType = $contractType;
	}

	/**
	 * Adds a Region
	 *
	 * @param \Dan\Jobfair\Domain\Model\Region $region
	 * @return void
	 */
	public function addRegion(\Dan\Jobfair\Domain\Model\Region $region) {
		$this->region->attach($region);
	}

	/**
	 * Removes a Region
	 *
	 * @param \Dan\Jobfair\Domain\Model\Region $regionToRemove
	 * @return void
	 */
	public function removeRegion(\Dan\Jobfair\Domain\Model\Region $regionToRemove) {
		$this->region->detach($regionToRemove);
	}

	/**
	 * Returns the region
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Region> $region
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * Sets the region
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Region> $region
	 * @return void
	 */
	public function setRegion(ObjectStorage $region) {
		$this->region = $region;
	}

	/**
	 * Returns the contact
	 *
	 * @return \Dan\Jobfair\Domain\Model\Contact $contact
	 */
	public function getContact() {
		return $this->contact;
	}

	/**
	 * Sets the contact
	 *
	 * @param \Dan\Jobfair\Domain\Model\Contact $contact
	 * @return void
	 */
	public function setContact(\Dan\Jobfair\Domain\Model\Contact $contact) {
		$this->contact = $contact;
	}

	/**
	 * Adds a Sector
	 *
	 * @param \Dan\Jobfair\Domain\Model\Sector $sector
	 * @return void
	 */
	public function addSector(\Dan\Jobfair\Domain\Model\Sector $sector) {
		$this->sector->attach($sector);
	}

	/**
	 * Removes a Sector
	 *
	 * @param \Dan\Jobfair\Domain\Model\Sector $sectorToRemove The Sector to be removed
	 * @return void
	 */
	public function removeSector(\Dan\Jobfair\Domain\Model\Sector $sectorToRemove) {
		$this->sector->detach($sectorToRemove);
	}

	/**
	 * Returns the sector
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Sector> $sector
	 */
	public function getSector() {
		return $this->sector;
	}

	/**
	 * Sets the sector
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Sector> $sector
	 * @return void
	 */
	public function setSector(ObjectStorage $sector) {
		$this->sector = $sector;
	}

	/**
	 * Adds a Category
	 *
	 * @param \Dan\Jobfair\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\Dan\Jobfair\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \Dan\Jobfair\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\Dan\Jobfair\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Returns the category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

	/**
	 * Adds a Discipline
	 *
	 * @param \Dan\Jobfair\Domain\Model\Discipline $discipline
	 * @return void
	 */
	public function addDiscipline(\Dan\Jobfair\Domain\Model\Discipline $discipline) {
		$this->discipline->attach($discipline);
	}

	/**
	 * Removes a Discipline
	 *
	 * @param \Dan\Jobfair\Domain\Model\Discipline $disciplineToRemove The Discipline to be removed
	 * @return void
	 */
	public function removeDiscipline(\Dan\Jobfair\Domain\Model\Discipline $disciplineToRemove) {
		$this->discipline->detach($disciplineToRemove);
	}

	/**
	 * Returns the discipline
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Discipline> $discipline
	 */
	public function getDiscipline() {
		return $this->discipline;
	}

	/**
	 * Sets the discipline
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Discipline> $discipline
	 * @return void
	 */
	public function setDiscipline(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $discipline) {
		$this->discipline = $discipline;
	}

	/**
	 * Adds a Education
	 *
	 * @param \Dan\Jobfair\Domain\Model\Education $education
	 * @return void
	 */
	public function addEducation(\Dan\Jobfair\Domain\Model\Education $education) {
		$this->education->attach($education);
	}

	/**
	 * Removes a Education
	 *
	 * @param \Dan\Jobfair\Domain\Model\Education $educationToRemove The Education to be removed
	 * @return void
	 */
	public function removeEducation(\Dan\Jobfair\Domain\Model\Education $educationToRemove) {
		$this->education->detach($educationToRemove);
	}

	/**
	 * Returns the education
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Education> $education
	 */
	public function getEducation() {
		return $this->education;
	}

	/**
	 * Sets the education
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Education> $education
	 * @return void
	 */
	public function setEducation(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $education) {
		$this->education = $education;
	}

	/**
	 * Adds a User
	 *
	 * @param \Dan\Jobfair\Domain\Model\User $feuser
	 * @return void
	 */
	public function addFeuser(\Dan\Jobfair\Domain\Model\User $feuser) {
		$this->feuser->attach($feuser);
	}

	/**
	 * Removes a User
	 *
	 * @param \Dan\Jobfair\Domain\Model\User $feuserToRemove The User to be removed
	 * @return void
	 */
	public function removeFeuser(\Dan\Jobfair\Domain\Model\User $feuserToRemove) {
		$this->feuser->detach($feuserToRemove);
	}

	/**
	 * Returns the feuser
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\User> $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\User> $feuser
	 * @return void
	 */
	public function setFeuser(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $feuser) {
		$this->feuser = $feuser;
	}

	/**
	 * Adds a Application
	 *
	 * @param \Dan\Jobfair\Domain\Model\Application $application
	 * @return void
	 */
	public function addApplication(\Dan\Jobfair\Domain\Model\Application $application) {
		$this->application->attach($application);
	}

	/**
	 * Removes a Application
	 *
	 * @param \Dan\Jobfair\Domain\Model\Application $applicationToRemove The Application to be removed
	 * @return void
	 */
	public function removeApplication(\Dan\Jobfair\Domain\Model\Application $applicationToRemove) {
		$this->application->detach($applicationToRemove);
	}

	/**
	 * Returns the application
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Application> $application
	 */
	public function getApplication() {
		return $this->application;
	}

	/**
	 * Sets the application
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dan\Jobfair\Domain\Model\Application> $application
	 * @return void
	 */
	public function setApplication(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $application) {
		$this->application = $application;
	}

	/**
	 * @param \DateTime $starttime
	 * @return void
	 */
	public function setStarttime($starttime) {
		$this->starttime = $starttime;
	}

	/**
	 * @return \DateTime
	 */
	public function getStarttime() {
		return $this->starttime;
	}

	/**
	 * @param \DateTime $endtime
	 * @return void
	 */
	public function setEndtime($endtime) {
		$this->endtime = $endtime;
	}

	/**
	 * @return \DateTime
	 */
	public function getEndtime() {
		return $this->endtime;
	}

	/**
	 * Get hidden flag
	 *
	 * @return integer
	 */
	public function getHidden() {
		return $this->hidden;
	}

	/**
	 * Set hidden flag
	 *
	 * @param integer $hidden hidden flag
	 * @return void
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}
  
  	/**
	 * @param \DateTime $crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * @return \DateTime
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * @param \DateTime $tstamp
	 * @return void
	 */
	public function setTstamp($tstamp) {
		$this->tstamp = $tstamp;
	}

	/**
	 * @return \DateTime
	 */
	public function getTstamp() {
		return $this->tstamp;
	}

	/**
	 * @param integer $sorting
	 * @return void
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * @return integer
	 */
	public function getSorting() {
		return $this->sorting;
	}
}