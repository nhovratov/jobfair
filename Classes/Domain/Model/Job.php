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

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The model for Job
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Job extends AbstractEntity
{
    /**
     * jobTitle
     *
     * @var string
     */
    protected $jobTitle = '';

    /**
     * jobImage
     * @var FileReference
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
     * @var int
     */
    protected $jobType = 0;

    /**
     * contractType
     *
     * @var int
     */
    protected $contractType = 0;

    /**
     * region
     *
     * @var ObjectStorage<Region>
     */
    protected $region;

    /**
     * contact
     *
     * @var Contact
     */
    protected $contact;

    /**
     * sector
     *
     * @var ObjectStorage<Sector>
     */
    protected $sector;

    /**
     * category
     *
     * @var ObjectStorage<Category>
     */
    protected $category;

    /**
     * discipline
     *
     * @var ObjectStorage<Discipline>
     */
    protected $discipline;

    /**
     * education
     *
     * @var ObjectStorage<Education>
     */
    protected $education;

    /**
     * feuser
     *
     * @var ObjectStorage<User>
     */
    protected $feuser;

    /**
     * application
     *
     * @var ObjectStorage<Application>
     */
    protected $application;

    /**
     * @var \DateTime
     */
    protected $starttime;

    /**
     * @var \DateTime
     */
    protected $endtime;

    /**
     * @var int
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
     * @var int
     */
    protected $sorting;

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
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Sets the jobTitle
     *
     * @param string $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * Returns the jobImage
     *
     * @return ObjectStorage<FileReference> $jobImage
     */
    public function getJobImage()
    {
        return $this->jobImage;
    }

    /**
     * Sets the jobImage
     *
     * @param ObjectStorage<FileReference> $jobImage
     */
    public function setJobImage($jobImage)
    {
        $this->jobImage = $jobImage;
    }

    /**
     * Returns the employer
     *
     * @return string $employer
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * Sets the employer
     *
     * @param string $employer
     */
    public function setEmployer($employer)
    {
        $this->employer = $employer;
    }

    /**
     * Returns the employerDescription
     *
     * @return string $employerDescription
     */
    public function getEmployerDescription()
    {
        return $this->employerDescription;
    }

    /**
     * Sets the employerDescription
     *
     * @param string $employerDescription
     */
    public function setEmployerDescription($employerDescription)
    {
        $this->employerDescription = $employerDescription;
    }

    /**
     * Returns the location
     *
     * @return string $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Returns the shortJobDescription
     *
     * @return string $shortJobDescription
     */
    public function getShortJobDescription()
    {
        return $this->shortJobDescription;
    }

    /**
     * Sets the shortJobDescription
     *
     * @param string $shortJobDescription
     */
    public function setShortJobDescription($shortJobDescription)
    {
        $this->shortJobDescription = $shortJobDescription;
    }

    /**
     * Returns the jobDescription
     *
     * @return string $jobDescription
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * Sets the jobDescription
     *
     * @param string $jobDescription
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;
    }

    /**
     * Returns the experience
     *
     * @return string $experience
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Sets the experience
     *
     * @param string $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * Returns the jobRequirements
     *
     * @return string $jobRequirements
     */
    public function getJobRequirements()
    {
        return $this->jobRequirements;
    }

    /**
     * Sets the jobRequirements
     *
     * @param string $jobRequirements
     */
    public function setJobRequirements($jobRequirements)
    {
        $this->jobRequirements = $jobRequirements;
    }

    /**
     * Returns the jobBenefits
     *
     * @return string $jobBenefits
     */
    public function getJobBenefits()
    {
        return $this->jobBenefits;
    }

    /**
     * Sets the jobBenefits
     *
     * @param string $jobBenefits
     */
    public function setJobBenefits($jobBenefits)
    {
        $this->jobBenefits = $jobBenefits;
    }

    /**
     * Returns the applyInformation
     *
     * @return string $applyInformation
     */
    public function getApplyInformation()
    {
        return $this->applyInformation;
    }

    /**
     * Sets the applyInformation
     *
     * @param string $applyInformation
     */
    public function setApplyInformation($applyInformation)
    {
        $this->applyInformation = $applyInformation;
    }

    /**
     * Returns the salary
     *
     * @return string $salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Sets the salary
     *
     * @param string $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
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
     * @param int $jobType
     */
    public function setJobType($jobType)
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
     * @param int $contractType
     */
    public function setContractType($contractType)
    {
        $this->contractType = $contractType;
    }

    /**
     * Adds a Region
     *
     * @param Region $region
     */
    public function addRegion(Region $region)
    {
        $this->region->attach($region);
    }

    /**
     * Removes a Region
     *
     * @param Region $regionToRemove
     */
    public function removeRegion(Region $regionToRemove)
    {
        $this->region->detach($regionToRemove);
    }

    /**
     * Returns the region
     *
     * @return ObjectStorage<Region> $region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Sets the region
     *
     * @param ObjectStorage<Region> $region
     */
    public function setRegion(ObjectStorage $region)
    {
        $this->region = $region;
    }

    /**
     * Returns the contact
     *
     * @return Contact $contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the contact
     *
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Adds a Sector
     *
     * @param Sector $sector
     */
    public function addSector(Sector $sector)
    {
        $this->sector->attach($sector);
    }

    /**
     * Removes a Sector
     *
     * @param Sector $sectorToRemove The Sector to be removed
     */
    public function removeSector(Sector $sectorToRemove)
    {
        $this->sector->detach($sectorToRemove);
    }

    /**
     * Returns the sector
     *
     * @return ObjectStorage<Sector> $sector
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Sets the sector
     *
     * @param ObjectStorage<Sector> $sector
     */
    public function setSector(ObjectStorage $sector)
    {
        $this->sector = $sector;
    }

    /**
     * Adds a Category
     *
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->category->attach($category);
    }

    /**
     * Removes a Category
     *
     * @param Category $categoryToRemove The Category to be removed
     */
    public function removeCategory(Category $categoryToRemove)
    {
        $this->category->detach($categoryToRemove);
    }

    /**
     * Returns the category
     *
     * @return ObjectStorage<Category> $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param ObjectStorage<Category> $category
     */
    public function setCategory(ObjectStorage $category)
    {
        $this->category = $category;
    }

    /**
     * Adds a Discipline
     *
     * @param Discipline $discipline
     */
    public function addDiscipline(Discipline $discipline)
    {
        $this->discipline->attach($discipline);
    }

    /**
     * Removes a Discipline
     *
     * @param Discipline $disciplineToRemove The Discipline to be removed
     */
    public function removeDiscipline(Discipline $disciplineToRemove)
    {
        $this->discipline->detach($disciplineToRemove);
    }

    /**
     * Returns the discipline
     *
     * @return ObjectStorage<Discipline> $discipline
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Sets the discipline
     *
     * @param ObjectStorage<Discipline> $discipline
     */
    public function setDiscipline(ObjectStorage $discipline)
    {
        $this->discipline = $discipline;
    }

    /**
     * Adds a Education
     *
     * @param Education $education
     */
    public function addEducation(Education $education)
    {
        $this->education->attach($education);
    }

    /**
     * Removes a Education
     *
     * @param Education $educationToRemove The Education to be removed
     */
    public function removeEducation(Education $educationToRemove)
    {
        $this->education->detach($educationToRemove);
    }

    /**
     * Returns the education
     *
     * @return ObjectStorage<Education> $education
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Sets the education
     *
     * @param ObjectStorage<Education> $education
     */
    public function setEducation(ObjectStorage $education)
    {
        $this->education = $education;
    }

    /**
     * Adds a User
     *
     * @param User $feuser
     */
    public function addFeuser(User $feuser)
    {
        $this->feuser->attach($feuser);
    }

    /**
     * Removes a User
     *
     * @param User $feuserToRemove The User to be removed
     */
    public function removeFeuser(User $feuserToRemove)
    {
        $this->feuser->detach($feuserToRemove);
    }

    /**
     * Returns the feuser
     *
     * @return ObjectStorage<User> $feuser
     */
    public function getFeuser()
    {
        return $this->feuser;
    }

    /**
     * Sets the feuser
     *
     * @param ObjectStorage<User> $feuser
     */
    public function setFeuser(ObjectStorage $feuser)
    {
        $this->feuser = $feuser;
    }

    /**
     * Adds a Application
     *
     * @param Application $application
     */
    public function addApplication(Application $application)
    {
        $this->application->attach($application);
    }

    /**
     * Removes a Application
     *
     * @param Application $applicationToRemove The Application to be removed
     */
    public function removeApplication(Application $applicationToRemove)
    {
        $this->application->detach($applicationToRemove);
    }

    /**
     * Returns the application
     *
     * @return ObjectStorage<Application> $application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Sets the application
     *
     * @param ObjectStorage<Application> $application
     */
    public function setApplication(ObjectStorage $application)
    {
        $this->application = $application;
    }

    /**
     * @param \DateTime $starttime
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return \DateTime
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param \DateTime $endtime
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * @return \DateTime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Get hidden flag
     *
     * @return int
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set hidden flag
     *
     * @param int $hidden hidden flag
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @param \DateTime $crdate
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * @return \DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @param \DateTime $tstamp
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return \DateTime
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @param int $sorting
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * @return int
     */
    public function getSorting()
    {
        return $this->sorting;
    }
}
