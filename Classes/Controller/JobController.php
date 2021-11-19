<?php

namespace Dan\Jobfair\Controller;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use Dan\Jobfair\Domain\Repository\JobRepository;
use Dan\Jobfair\Domain\Repository\ApplicationRepository;
use Dan\Jobfair\Domain\Repository\RegionRepository;
use Dan\Jobfair\Domain\Repository\SectorRepository;
use Dan\Jobfair\Domain\Repository\CategoryRepository;
use Dan\Jobfair\Domain\Repository\DisciplineRepository;
use Dan\Jobfair\Domain\Repository\EducationRepository;
use Dan\Jobfair\Service\AccessControlService;
use \TYPO3\CMS\Core\Messaging\AbstractMessage;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;
use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use \TYPO3\CMS\Extbase\Persistence\QueryInterface;
use \Dan\Jobfair\Domain\Model\Job;
use \Dan\Jobfair\Domain\Model\Application;
use \Dan\Jobfair\Domain\Model\Filter;
use \Dan\Jobfair\Utility\Div;

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
 * The controller for Jobs
 *
 * @author Dan <typo3dev@outlook.com>
 */
class JobController extends ActionController
{

    const SIGNAL_CreateActionAfterAdd = 'createActionAfterAdd';
    const SIGNAL_UpdateActionAfterUpdate = 'updateActionAfterUpdate';

    /**
     * jobRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\JobRepository
     */
    protected $jobRepository = null;


    /**
     * applicationRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\ApplicationRepository
     */
    protected $applicationRepository = null;


    /**
     * categoryRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\RegionRepository
     */
    protected $regionRepository;

    /**
     * categoryRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\SectorRepository
     */
    protected $sectorRepository;

    /**
     * categoryRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * categoryRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\DisciplineRepository
     */
    protected $disciplineRepository;

    /**
     * categoryRepository
     *
     * @var \Dan\Jobfair\Domain\Repository\EducationRepository
     */
    protected $educationRepository;

    /**
     * Misc Functions
     *
     * @var \Dan\Jobfair\Utility\Div
     */
    protected $div;

    /**
     * @var \Dan\Jobfair\Service\AccessControlService
     */
    protected $accessControlService;

    /**
     * initialize update action
     * allow input of date fields
     *
     * @param void
     */
    public function initializeUpdateAction()
    {
        $this->arguments->getArgument('job')
            ->getPropertyMappingConfiguration()
            ->forProperty('starttime')
            ->setTypeConverterOption(
                'TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter',
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['edit']['dateFormat']
            );
        $this->arguments->getArgument('job')
            ->getPropertyMappingConfiguration()
            ->forProperty('endtime')
            ->setTypeConverterOption(
                'TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter',
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['edit']['dateFormat']
            );
    }

    /**
     * initialize create action
     * allow input of date fields
     */
    public function initializeCreateAction()
    {
        $this->arguments->getArgument('newJob')
            ->getPropertyMappingConfiguration()
            ->forProperty('starttime')
            ->setTypeConverterOption(
                'TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter',
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['new']['dateFormat']
            );
        $this->arguments->getArgument('newJob')
            ->getPropertyMappingConfiguration()
            ->forProperty('endtime')
            ->setTypeConverterOption(
                'TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter',
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['new']['dateFormat']
            );
    }

    /**
     * initialize action
     * allow creation of submodel application
     */
    public function initializeAction()
    {
        if ($this->arguments->hasArgument('newApplication')) {
            $this->arguments->getArgument('newApplication')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('attachment', 'array');
        }
    }

    /**
     * initialize list action
     * Needed to prevent errors from propperty mapper due to empty objects
     *
     */
    public function initializeListAction()
    {
        $arguments = $this->request->getArguments();
        if (intval($arguments['filter']['categories'][0]) === 0) {
            unset($arguments['filter']['categories']);
        }
        if (intval($arguments['filter']['regions'][0]) === 0) {
            unset($arguments['filter']['regions']);
        }
        if (intval($arguments['filter']['sectors'][0]) === 0) {
            unset($arguments['filter']['sectors']);
        }
        if (intval($arguments['filter']['disciplines'][0]) === 0) {
            unset($arguments['filter']['disciplines']);
        }
        if (intval($arguments['filter']['educations'][0]) === 0) {
            unset($arguments['filter']['educations']);
        }
        $this->request->setArguments($arguments);
    }


    /**
     * action list
     *
     * @param $filter \Dan\Jobfair\Domain\Model\Filter
     * @return void
     * @Extbase\IgnoreValidation("filter")
     * @var $category \Dan\Jobfair\Domain\Model\Category
     */
    public function listAction(Filter $filter = null)
    {
        /* redirect to latest view if enabled in the plugin */
        if ($this->settings['latest']['enableLatest']) {
            $this->forward('latest');
        }

        /* set sorting and ordering for job repository */
        if ($this->settings['list']['ordering']) {
            $ordering = $this->settings['list']['ordering'];
        } else {
            $ordering = 'crdate';
        }
        $sorting = $this->settings['list']['sorting'];
        if ($sorting == 'DESC') {
            $this->jobRepository->setDefaultOrderings(array($ordering => QueryInterface::ORDER_DESCENDING));
        } else {
            $this->jobRepository->setDefaultOrderings(array($ordering => QueryInterface::ORDER_ASCENDING));
        }

        /* set the ordering and sorting for all other repositories */
        $this->categoryRepository->setDefaultOrderings(array('sorting' => QueryInterface::ORDER_ASCENDING));
        $this->regionRepository->setDefaultOrderings(array('sorting' => QueryInterface::ORDER_ASCENDING));
        $this->sectorRepository->setDefaultOrderings(array('sorting' => QueryInterface::ORDER_ASCENDING));
        $this->disciplineRepository->setDefaultOrderings(array('sorting' => QueryInterface::ORDER_ASCENDING));
        $this->educationRepository->setDefaultOrderings(array('sorting' => QueryInterface::ORDER_ASCENDING));

        /* load filter contents */
        $this->view->assign('filter', $filter);
        $this->view->assign('categories', $this->categoryRepository->findAll());
        $this->view->assign('regions', $this->regionRepository->findAll());
        $this->view->assign('sectors', $this->sectorRepository->findAll());
        $this->view->assign('disciplines', $this->disciplineRepository->findAll());
        $this->view->assign('educations', $this->educationRepository->findAll());

        /* load jobs if filter is set */
        if ($filter !== null) {
            $jobs = $this->jobRepository->findFiltered($filter);
        } elseif ($this->settings['filter']['enablePreselect']) {
            $filter = new Filter();
            if ($this->settings['filter']['preselectCategory']) {
                /** @var \Dan\Jobfair\Domain\Model\Category $category */
                $category = $this->categoryRepository->findByUid($this->settings['filter']['preselectCategory']);
                $filter->addCategory($category);
            } elseif ($this->settings['filter']['preselectRegion']) {
                /** @var \Dan\Jobfair\Domain\Model\Region $region */
                $region = $this->regionRepository->findByUid($this->settings['filter']['preselectRegion']);
                $filter->addRegion($region);
            } elseif ($this->settings['filter']['preselectSector']) {
                /** @var \Dan\Jobfair\Domain\Model\Sector $sector */
                $sector = $this->sectorRepository->findByUid($this->settings['filter']['preselectSector']);
                $filter->addSector($sector);
            } elseif ($this->settings['filter']['preselectDiscipline']) {
                /** @var \Dan\Jobfair\Domain\Model\Discipline $discipline */
                $discipline = $this->disciplineRepository->findByUid($this->settings['filter']['preselectDiscipline']);
                $filter->addDiscipline($discipline);
            } elseif ($this->settings['filter']['preselectEducation']) {
                /** @var \Dan\Jobfair\Domain\Model\Education $education */
                $education = $this->educationRepository->findByUid($this->settings['filter']['preselectEducation']);
                $filter->addEducation($education);
            } elseif ($this->settings['filter']['preselectJobType']) {
                $filter->setJobType($this->settings['filter']['preselectJobType']);
            } elseif ($this->settings['filter']['preselectContractType']) {
                $filter->setContractType($this->settings['filter']['preselectContractType']);
            } elseif ($this->settings['filter']['preselectOwn']) {
                $filter->setOwn($this->settings['filter']['preselectOwn']);
            }
            $jobs = $this->jobRepository->findFiltered($filter);
        } else {
            /* load all jobs if no filter is set */
            $jobs = $this->jobRepository->findAll();
        }
        $this->view->assign('jobs', $jobs);
    }


    /**
     * action latest
     *
     * @return void
     */
    public function latestAction()
    {
        /** @var string $ordering */
        $ordering = $this->settings['latest']['ordering'];
        /** @var int $limit */
        if ($this->settings['latest']['limit'] >= 1) {
            $limit = intval($this->settings['latest']['limit']);
        } else {
            $limit = 3;
        }
        $jobs = $this->jobRepository->findLatest($ordering, $limit);
        $this->view->assign('jobs', $jobs);
    }


    /**
     * action show
     *
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @return void
     */
    public function showAction(Job $job = null)
    {
        if ($this->settings['seoOptimizationLevel']) {
            $this->response->addAdditionalHeaderData('<title>' . $job->getJobTitle() . '</title>');
            $this->response->addAdditionalHeaderData('<meta name="description" content="' . $job->getShortJobDescription() . '"/>');
        }
        if ($job == null && $this->settings['show']['displayErrorMessageIfNotFound']) {
            $this->flashMessageService('notFoundMessage', 'notFoundStatus', 'INFO');
        }
        if ($job == null && $this->settings['show']['redirectIfNotFound']) {
            $this->redirect('list');
        }
        if ($job !== null) {
            $this->view->assign('job', $job);
        }
    }


    /**
     * action new
     *
     * @param \Dan\Jobfair\Domain\Model\Job $newJob
     * @return void
     * @Extbase\IgnoreValidation("newJob")
     */
    public function newAction(Job $newJob = null)
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            $this->redirect('list');
        } elseif (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            $this->redirect('list');
        } elseif ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
                $this->settings['feuser']['editorUsergroupUid'],
                $this->accessControlService->getFrontendUserGroups()
            )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        $this->view->assign('regions', $this->regionRepository->findAll());
        $this->view->assign('sectors', $this->sectorRepository->findAll());
        $this->view->assign('categories', $this->categoryRepository->findAll());
        $this->view->assign('disciplines', $this->disciplineRepository->findAll());
        $this->view->assign('educations', $this->educationRepository->findAll());
        $this->view->assign('newJob', $newJob);
    }

    /**
     * action create
     *
     * @param \Dan\Jobfair\Domain\Model\Job $newJob
     * @return void
     */

    public function createAction(Job $newJob)
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            $this->redirect('list');
        } elseif (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            $this->redirect('list');
        } elseif ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
                $this->settings['feuser']['editorUsergroupUid'],
                $this->accessControlService->getFrontendUserGroups()
            )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        /** @var $loggedInFeuser \Dan\Jobfair\Domain\Model\User */
        $loggedInFeuser = $this->accessControlService->getFrontendUserObject();
        if ($loggedInFeuser) {
            $newJob->addFeuser($loggedInFeuser);
        }
        $newJob->setSorting(9999999);
        $this->jobRepository->add($newJob);
        $this->signalSlotDispatcher->dispatch(__CLASS__, self::SIGNAL_CreateActionAfterAdd, array('job' => $newJob));
        if ($this->settings['new']['enableAdminNotificaton'] &&
            GeneralUtility::validEmail($this->settings['new']['adminEmail']) &&
            GeneralUtility::validEmail($this->settings['new']['fromEmail'])) {
            // from
            $sender = (array($this->settings['new']['fromEmail'] => $this->settings['new']['fromName']));
            // to
            /** @var $to array Array to collect all the receipients */
            $to = array();
            $to [] = array('email' => $this->settings['new']['adminEmail'], 'name' => $this->settings['new']['adminName']);

            $recipients = array();
            foreach ($to as $pair) {
                if (GeneralUtility::validEmail($pair['email'])) {
                    if (trim($pair['name'])) {
                        $recipients[$pair['email']] = $pair['name'];
                    } else {
                        $recipients[] = $pair['email'];
                    }
                }
            }

            /** @var $recipientsCc array Array to collect all CC receipients */
            /** @var $recipientsBcc array Array to collect all BCC receipients */
            /** @var $fileName mixed false or file.xyz (name of the attached file) */
            $this->div->sendEmail(
                'MailAdminNotificationCreate',
                $recipients,
                $recipientsCc,
                $recipientsBcc,
                $sender,
                LocalizationUtility::translate('tx_jobfair_domain_model_job', 'jobfair') . ": " . $newJob->getJobTitle(),
                array('job' => $newJob),
                $fileName
            );
        }
        $this->flashMessageService('jobAddMessage', 'jobAddStatus', 'OK');
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @return void
     * @Extbase\IgnoreValidation("job")
     */
    public function editAction(Job $job)
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            $this->redirect('list');
        } elseif (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            $this->redirect('list');
        } elseif ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
                $this->settings['feuser']['editorUsergroupUid'],
                $this->accessControlService->getFrontendUserGroups()
            )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        $this->view->assign('regions', $this->regionRepository->findAll());
        $this->view->assign('sectors', $this->sectorRepository->findAll());
        $this->view->assign('categories', $this->categoryRepository->findAll());
        $this->view->assign('disciplines', $this->disciplineRepository->findAll());
        $this->view->assign('educations', $this->educationRepository->findAll());
        $this->view->assign('job', $job);
    }

    /**
     * action update
     *
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @return void
     */
    public function updateAction(Job $job)
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            $this->redirect('list');
        } elseif (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            $this->redirect('list');
        } elseif ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
                $this->settings['feuser']['editorUsergroupUid'],
                $this->accessControlService->getFrontendUserGroups()
            )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        $this->flashMessageService('jobEditedMessage', 'jobEditedStatus', 'OK');
        $this->jobRepository->update($job);
        $this->signalSlotDispatcher->dispatch(__CLASS__, self::SIGNAL_UpdateActionAfterUpdate, array('job' => $job));
        $this->redirect('show', 'Job', null, array('job' => $job));
    }

    /**
     * action confirmDelete
     *
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @return void
     */
    public function confirmDeleteAction(Job $job)
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            $this->redirect('list');
        } elseif (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            $this->redirect('list');
        } elseif ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
                $this->settings['feuser']['editorUsergroupUid'],
                $this->accessControlService->getFrontendUserGroups()
            )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        $this->view->assign('job', $job);
    }

    /**
     * action delete
     *
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @return void
     */
    public function deleteAction(Job $job)
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            $this->redirect('list');
        } elseif (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            $this->redirect('list');
        } elseif ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
                $this->settings['feuser']['editorUsergroupUid'],
                $this->accessControlService->getFrontendUserGroups()
            )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            $this->redirect('list');
        }
        $this->flashMessageService('jobRemovedMessage', 'jobRemovedStatus', 'OK');
        $this->jobRepository->remove($job);
        $this->redirect('list');
    }

    /**
     * action newApplication
     *
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @param \Dan\Jobfair\Domain\Model\Application $newApplication
     * @return void
     * @Extbase\IgnoreValidation("newApplication")
     */
    public function newApplicationAction(Job $job, Application $newApplication = null)
    {
        $loggedInFeuserObject = $this->accessControlService->getFrontendUserObject();
        $this->view->assignMultiple(array(
                                        'job' => $job,
                                        'user' => $loggedInFeuserObject,
                                        'newApplication' => $newApplication
                                    )
        );
    }

    /**
     * action createApplication
     *
     * @param \Dan\Jobfair\Domain\Model\Application $newApplication
     * @param \Dan\Jobfair\Domain\Model\Job $job
     * @return void
     * @Extbase\Validate("\Dan\Jobfair\Domain\Validator\ApplicationCreateValidator", param="newApplication")
     */
    public function createApplicationAction(Application $newApplication, Job $job)
    {
        $newApplication->setTitle($job->getJobTitle() . " - " . $newApplication->getName());

        $attachmentFile = $newApplication->getAttachment();
        // Check if attachment is missing
        if (empty($attachmentFile['name']) && $this->settings['application']['validation']['attachment']['required']) {
            $this->flashMessageService('applicationAttachmentMissing', 'applicationAttachmentMissingStatus', 'ERROR');
            $this->forward('newApplication', 'Job', null, array('job' => $job));
        }
        // Check file extension
        if (!empty($attachmentFile['name']) && (!Div::checkExtension($attachmentFile['name']) || !GeneralUtility::verifyFilenameAgainstDenyPattern($attachmentFile['name']))) {
            $this->flashMessageService('applicationExtensionError', 'applicationExtensionErrorStatus', 'ERROR');
            $this->forward('newApplication', 'Job', null, array('job' => $job));
        }
        /** @var $fileName mixed false or file.xyz (name of the attached file) */
        $fileName = $this->div->uploadFile($attachmentFile);
        $newApplication->setAttachment($fileName);

        $this->applicationRepository->add($newApplication);
        $persistenceManager = GeneralUtility::makeInstance("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
        $persistenceManager->persistAll();

        $job->addApplication($newApplication);
        $this->jobRepository->update($job);


        // from
        $sender = array();
        if ($this->settings['application']['fromEmail']) {
            $sender = (array($this->settings['application']['fromEmail'] => $this->settings['application']['fromName']));
        }

        /** @var $to array Array to collect all the receipients */
        $to = array();

        $contact = $job->getContact();
        if ($contact) {
            $to [] = array('email' => $contact->getEmail(), 'name' => $contact->getName());
        }

        $feusers = $job->getFeuser();
        /** @var $feuser \Dan\Jobfair\Domain\Model\User */
        foreach ($feusers as $feuser) {
            $to [] = array('email' => $feuser->getEmail(), 'name' => $feuser->getFirstName() . " " . $feuser->getLastName());
        }

        $recipients = array();
        if (is_array($to)) {
            foreach ($to as $pair) {
                if (GeneralUtility::validEmail($pair['email'])) {
                    if (trim($pair['name'])) {
                        $recipients[$pair['email']] = $pair['name'];
                    } else {
                        $recipients[] = $pair['email'];
                    }
                }
            }
        }

        if (!count($recipients)) {
            $this->flashMessageService('applicationSendMessageNoRecipients', 'applicationSendMessageNoRecipientsStatus', 'ERROR');
            $this->redirect('show', 'Job', null, array('job' => $job));
        }

        // toCc and toBcc (only relevant if send to contacts)
        if ($contact) {
            /** @var $toCc array Array to collect all the receipients */
            $toCc = array();
            $toCc [] = array('email' => $contact->getEmailCc(), 'name' => $contact->getNameCc());

            $recipientsCc = array();
            foreach ($toCc as $pair) {
                if (GeneralUtility::validEmail($pair['email'])) {
                    if (trim($pair['name'])) {
                        $recipientsCc[$pair['email']] = $pair['name'];
                    } else {
                        $recipientsCc[] = $pair['email'];
                    }
                }
            }

            /** @var $toBcc array Array to collect all the receipients */
            $toBcc = array();
            $toBcc [] = array('email' => $contact->getEmailBcc(), 'name' => $contact->getNameBcc());

            $recipientsBcc = array();
            foreach ($toBcc as $pair) {
                if (GeneralUtility::validEmail($pair['email'])) {
                    if (trim($pair['name'])) {
                        $recipientsBcc[$pair['email']] = $pair['name'];
                    } else {
                        $recipientsBcc[] = $pair['email'];
                    }
                }
            }
        }

        // send email to contacts and frontend users
        /** @var $recipientsCc array Array to collect all the CC receipients */
        /** @var $recipientsBcc array Array to collect all the BCC receipients */
        if ($this->div->sendEmail(
            'MailApplication',
            $recipients,
            $recipientsCc,
            $recipientsBcc,
            $sender,
            LocalizationUtility::translate('tx_jobfair_domain_model_application.email_subject', 'jobfair', array('jobTitle' => $job->getJobTitle())),
            array('newApplication' => $newApplication, 'job' => $job),
            $fileName
        )) {
            $this->flashMessageService('applicationSendMessage', 'applicationSendStatus', 'OK');
        } else {
            $this->flashMessageService('applicationSendMessageGeneralError', 'applicationSendStatusGeneralErrorStatus', 'ERROR');
        }
        if ($this->settings['application']['dontSaveAttachment']) {
            $newApplication->setAttachment('');
            $filePathAndName = 'uploads/tx_jobfair/' . $fileName;
            if (file_exists($filePathAndName)) {
                @unlink($filePathAndName);
            }
        }
        $this->redirect('show', 'Job', null, array('job' => $job));
    }

    /**
     *
     * @param \string $messageKey
     * @param \string $statusKey
     * @param \string $level
     */
    function flashMessageService($messageKey, $statusKey, $level)
    {
        switch ($level) {
            case "NOTICE":
                $level = AbstractMessage::NOTICE;
                break;
            case "INFO":
                $level = AbstractMessage::INFO;
                break;
            case "OK":
                $level = AbstractMessage::OK;
                break;
            case "WARNING":
                $level = AbstractMessage::WARNING;
                break;
            case "ERROR":
                $level = AbstractMessage::ERROR;
                break;
        }

        $this->addFlashMessage(
            LocalizationUtility::translate($messageKey, 'jobfair'),
            LocalizationUtility::translate($statusKey, 'jobfair'),
            $level,
            true
        );
    }

    public function injectJobRepository(JobRepository $jobRepository): void
    {
        $this->jobRepository = $jobRepository;
    }

    public function injectApplicationRepository(ApplicationRepository $applicationRepository): void
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function injectRegionRepository(RegionRepository $regionRepository): void
    {
        $this->regionRepository = $regionRepository;
    }

    public function injectSectorRepository(SectorRepository $sectorRepository): void
    {
        $this->sectorRepository = $sectorRepository;
    }

    public function injectCategoryRepository(CategoryRepository $categoryRepository): void
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function injectDisciplineRepository(DisciplineRepository $disciplineRepository): void
    {
        $this->disciplineRepository = $disciplineRepository;
    }

    public function injectEducationRepository(EducationRepository $educationRepository): void
    {
        $this->educationRepository = $educationRepository;
    }

    public function injectDiv(Div $div): void
    {
        $this->div = $div;
    }

    public function injectAccessControlService(AccessControlService $accessControlService): void
    {
        $this->accessControlService = $accessControlService;
    }
}
