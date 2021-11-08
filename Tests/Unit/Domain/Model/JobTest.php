<?php

namespace Dan\Jobfair\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Dan <typo3dev@outlook.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Dan\Jobfair\Domain\Model\Job.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Dan <typo3dev@outlook.com>
 */
class JobTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dan\Jobfair\Domain\Model\Job
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dan\Jobfair\Domain\Model\Job();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getJobTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getJobTitle()
		);
	}

	/**
	 * @test
	 */
	public function setJobTitleForStringSetsJobTitle() {
		$this->subject->setJobTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'jobTitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmployerReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmployer()
		);
	}

	/**
	 * @test
	 */
	public function setEmployerForStringSetsEmployer() {
		$this->subject->setEmployer('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'employer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmployerDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmployerDescription()
		);
	}

	/**
	 * @test
	 */
	public function setEmployerDescriptionForStringSetsEmployerDescription() {
		$this->subject->setEmployerDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'employerDescription',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForStringSetsLocation() {
		$this->subject->setLocation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getShortJobDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getShortJobDescription()
		);
	}

	/**
	 * @test
	 */
	public function setShortJobDescriptionForStringSetsShortJobDescription() {
		$this->subject->setShortJobDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'shortJobDescription',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getJobDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getJobDescription()
		);
	}

	/**
	 * @test
	 */
	public function setJobDescriptionForStringSetsJobDescription() {
		$this->subject->setJobDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'jobDescription',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getExperienceReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getExperience()
		);
	}

	/**
	 * @test
	 */
	public function setExperienceForStringSetsExperience() {
		$this->subject->setExperience('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'experience',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getJobRequirementsReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getJobRequirements()
		);
	}

	/**
	 * @test
	 */
	public function setJobRequirementsForStringSetsJobRequirements() {
		$this->subject->setJobRequirements('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'jobRequirements',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getJobBenefitsReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getJobBenefits()
		);
	}

	/**
	 * @test
	 */
	public function setJobBenefitsForStringSetsJobBenefits() {
		$this->subject->setJobBenefits('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'jobBenefits',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getApplyInformationReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getApplyInformation()
		);
	}

	/**
	 * @test
	 */
	public function setApplyInformationForStringSetsApplyInformation() {
		$this->subject->setApplyInformation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'applyInformation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSalaryReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSalary()
		);
	}

	/**
	 * @test
	 */
	public function setSalaryForStringSetsSalary() {
		$this->subject->setSalary('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'salary',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getJobTypeReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getJobType()
		);
	}

	/**
	 * @test
	 */
	public function setJobTypeForIntegerSetsJobType() {
		$this->subject->setJobType(12);

		$this->assertAttributeEquals(
			12,
			'jobType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContractTypeReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getContractType()
		);
	}

	/**
	 * @test
	 */
	public function setContractTypeForIntegerSetsContractType() {
		$this->subject->setContractType(12);

		$this->assertAttributeEquals(
			12,
			'contractType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRegionReturnsInitialValueForRegion() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getRegion()
		);
	}

	/**
	 * @test
	 */
	public function setRegionForObjectStorageContainingRegionSetsRegion() {
		$region = new \Dan\Jobfair\Domain\Model\Region();
		$objectStorageHoldingExactlyOneRegion = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneRegion->attach($region);
		$this->subject->setRegion($objectStorageHoldingExactlyOneRegion);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneRegion,
			'region',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addRegionToObjectStorageHoldingRegion() {
		$region = new \Dan\Jobfair\Domain\Model\Region();
		$regionObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$regionObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($region));
		$this->inject($this->subject, 'region', $regionObjectStorageMock);

		$this->subject->addRegion($region);
	}

	/**
	 * @test
	 */
	public function removeRegionFromObjectStorageHoldingRegion() {
		$region = new \Dan\Jobfair\Domain\Model\Region();
		$regionObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$regionObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($region));
		$this->inject($this->subject, 'region', $regionObjectStorageMock);

		$this->subject->removeRegion($region);

	}

	/**
	 * @test
	 */
	public function getContactReturnsInitialValueForContact() {
		$this->assertEquals(
			NULL,
			$this->subject->getContact()
		);
	}

	/**
	 * @test
	 */
	public function setContactForContactSetsContact() {
		$contactFixture = new \Dan\Jobfair\Domain\Model\Contact();
		$this->subject->setContact($contactFixture);

		$this->assertAttributeEquals(
			$contactFixture,
			'contact',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSectorReturnsInitialValueForSector() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getSector()
		);
	}

	/**
	 * @test
	 */
	public function setSectorForObjectStorageContainingSectorSetsSector() {
		$sector = new \Dan\Jobfair\Domain\Model\Sector();
		$objectStorageHoldingExactlyOneSector = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneSector->attach($sector);
		$this->subject->setSector($objectStorageHoldingExactlyOneSector);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneSector,
			'sector',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addSectorToObjectStorageHoldingSector() {
		$sector = new \Dan\Jobfair\Domain\Model\Sector();
		$sectorObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$sectorObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($sector));
		$this->inject($this->subject, 'sector', $sectorObjectStorageMock);

		$this->subject->addSector($sector);
	}

	/**
	 * @test
	 */
	public function removeSectorFromObjectStorageHoldingSector() {
		$sector = new \Dan\Jobfair\Domain\Model\Sector();
		$sectorObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$sectorObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($sector));
		$this->inject($this->subject, 'sector', $sectorObjectStorageMock);

		$this->subject->removeSector($sector);

	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategory() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForObjectStorageContainingCategorySetsCategory() {
		$category = new \Dan\Jobfair\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->subject->setCategory($objectStorageHoldingExactlyOneCategory);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategory,
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategory() {
		$category = new \Dan\Jobfair\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->addCategory($category);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory() {
		$category = new \Dan\Jobfair\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->removeCategory($category);

	}

	/**
	 * @test
	 */
	public function getDisciplineReturnsInitialValueForDiscipline() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDiscipline()
		);
	}

	/**
	 * @test
	 */
	public function setDisciplineForObjectStorageContainingDisciplineSetsDiscipline() {
		$discipline = new \Dan\Jobfair\Domain\Model\Discipline();
		$objectStorageHoldingExactlyOneDiscipline = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDiscipline->attach($discipline);
		$this->subject->setDiscipline($objectStorageHoldingExactlyOneDiscipline);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDiscipline,
			'discipline',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDisciplineToObjectStorageHoldingDiscipline() {
		$discipline = new \Dan\Jobfair\Domain\Model\Discipline();
		$disciplineObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$disciplineObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($discipline));
		$this->inject($this->subject, 'discipline', $disciplineObjectStorageMock);

		$this->subject->addDiscipline($discipline);
	}

	/**
	 * @test
	 */
	public function removeDisciplineFromObjectStorageHoldingDiscipline() {
		$discipline = new \Dan\Jobfair\Domain\Model\Discipline();
		$disciplineObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$disciplineObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($discipline));
		$this->inject($this->subject, 'discipline', $disciplineObjectStorageMock);

		$this->subject->removeDiscipline($discipline);

	}

	/**
	 * @test
	 */
	public function getEducationReturnsInitialValueForEducation() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getEducation()
		);
	}

	/**
	 * @test
	 */
	public function setEducationForObjectStorageContainingEducationSetsEducation() {
		$education = new \Dan\Jobfair\Domain\Model\Education();
		$objectStorageHoldingExactlyOneEducation = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneEducation->attach($education);
		$this->subject->setEducation($objectStorageHoldingExactlyOneEducation);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneEducation,
			'education',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addEducationToObjectStorageHoldingEducation() {
		$education = new \Dan\Jobfair\Domain\Model\Education();
		$educationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$educationObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($education));
		$this->inject($this->subject, 'education', $educationObjectStorageMock);

		$this->subject->addEducation($education);
	}

	/**
	 * @test
	 */
	public function removeEducationFromObjectStorageHoldingEducation() {
		$education = new \Dan\Jobfair\Domain\Model\Education();
		$educationObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$educationObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($education));
		$this->inject($this->subject, 'education', $educationObjectStorageMock);

		$this->subject->removeEducation($education);

	}

	/**
	 * @test
	 */
	public function getFeuserReturnsInitialValueForUser() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getFeuser()
		);
	}

	/**
	 * @test
	 */
	public function setFeuserForObjectStorageContainingUserSetsFeuser() {
		$feuser = new \Dan\Jobfair\Domain\Model\User();
		$objectStorageHoldingExactlyOneFeuser = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneFeuser->attach($feuser);
		$this->subject->setFeuser($objectStorageHoldingExactlyOneFeuser);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneFeuser,
			'feuser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addFeuserToObjectStorageHoldingFeuser() {
		$feuser = new \Dan\Jobfair\Domain\Model\User();
		$feuserObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$feuserObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($feuser));
		$this->inject($this->subject, 'feuser', $feuserObjectStorageMock);

		$this->subject->addFeuser($feuser);
	}

	/**
	 * @test
	 */
	public function removeFeuserFromObjectStorageHoldingFeuser() {
		$feuser = new \Dan\Jobfair\Domain\Model\User();
		$feuserObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$feuserObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($feuser));
		$this->inject($this->subject, 'feuser', $feuserObjectStorageMock);

		$this->subject->removeFeuser($feuser);

	}
}
