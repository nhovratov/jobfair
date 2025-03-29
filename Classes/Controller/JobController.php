<?php

declare(strict_types=1);

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

namespace Dan\Jobfair\Controller;

use Dan\Jobfair\Domain\Model\Application;
use Dan\Jobfair\Domain\Model\Category;
use Dan\Jobfair\Domain\Model\Discipline;
use Dan\Jobfair\Domain\Model\Education;
use Dan\Jobfair\Domain\Model\Filter;
use Dan\Jobfair\Domain\Model\Job;
use Dan\Jobfair\Domain\Model\Region;
use Dan\Jobfair\Domain\Model\Sector;
use Dan\Jobfair\Domain\Repository\ApplicationRepository;
use Dan\Jobfair\Domain\Repository\CategoryRepository;
use Dan\Jobfair\Domain\Repository\DisciplineRepository;
use Dan\Jobfair\Domain\Repository\EducationRepository;
use Dan\Jobfair\Domain\Repository\JobRepository;
use Dan\Jobfair\Domain\Repository\RegionRepository;
use Dan\Jobfair\Domain\Repository\SectorRepository;
use Dan\Jobfair\Domain\Validator\ApplicationCreateValidator;
use Dan\Jobfair\Service\AccessControlService;
use Dan\Jobfair\Utility\Div;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * The controller for Jobs
 *
 * @author Dan <typo3dev@outlook.com>
 */
class JobController extends ActionController
{
    public function __construct(
        protected ApplicationRepository $applicationRepository,
        protected JobRepository $jobRepository,
        protected RegionRepository $regionRepository,
        protected SectorRepository $sectorRepository,
        protected CategoryRepository $categoryRepository,
        protected DisciplineRepository $disciplineRepository,
        protected EducationRepository $educationRepository,
        protected Div $div,
        protected AccessControlService $accessControlService,
    ) {
    }

    /**
     * initialize update action
     * allow input of date fields
     */
    public function initializeUpdateAction(): void
    {
        $this->arguments->getArgument('job')
            ->getPropertyMappingConfiguration()
            ->forProperty('starttime')
            ->setTypeConverterOption(
                DateTimeConverter::class,
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['edit']['dateFormat']
            );
        $this->arguments->getArgument('job')
            ->getPropertyMappingConfiguration()
            ->forProperty('endtime')
            ->setTypeConverterOption(
                DateTimeConverter::class,
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['edit']['dateFormat']
            );
    }

    /**
     * initialize create action
     * allow input of date fields
     */
    public function initializeCreateAction(): void
    {
        $this->arguments->getArgument('newJob')
            ->getPropertyMappingConfiguration()
            ->forProperty('starttime')
            ->setTypeConverterOption(
                DateTimeConverter::class,
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['new']['dateFormat']
            );
        $this->arguments->getArgument('newJob')
            ->getPropertyMappingConfiguration()
            ->forProperty('endtime')
            ->setTypeConverterOption(
                DateTimeConverter::class,
                DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                $this->settings['new']['dateFormat']
            );
    }

    /**
     * initialize list action
     * Needed to prevent errors from property mapper due to empty objects
     */
    public function initializeListAction(): void
    {
        $arguments = $this->request->getArguments();
        if (((int)($arguments['filter']['categories'][0] ?? 0)) === 0) {
            unset($arguments['filter']['categories']);
        }
        if (((int)($arguments['filter']['regions'][0] ?? 0)) === 0) {
            unset($arguments['filter']['regions']);
        }
        if (((int)($arguments['filter']['sectors'][0] ?? 0)) === 0) {
            unset($arguments['filter']['sectors']);
        }
        if (((int)($arguments['filter']['disciplines'][0] ?? 0)) === 0) {
            unset($arguments['filter']['disciplines']);
        }
        if (((int)($arguments['filter']['educations'][0] ?? 0)) === 0) {
            unset($arguments['filter']['educations']);
        }
        $this->request = $this->request->withArguments($arguments);
    }

    #[Extbase\IgnoreValidation(['argumentName' => 'filter'])]
    public function listAction(Filter $filter = null): ResponseInterface
    {
        /* redirect to latest view if enabled in the plugin */
        if ($this->settings['latest']['enableLatest'] ?? false) {
            return new ForwardResponse('latest');
        }

        /* set sorting and ordering for job repository */
        if ($this->settings['list']['ordering']) {
            $ordering = $this->settings['list']['ordering'];
        } else {
            $ordering = 'crdate';
        }
        $sorting = $this->settings['list']['sorting'];
        if ($sorting === 'DESC') {
            $this->jobRepository->setDefaultOrderings([$ordering => QueryInterface::ORDER_DESCENDING]);
        } else {
            $this->jobRepository->setDefaultOrderings([$ordering => QueryInterface::ORDER_ASCENDING]);
        }

        /* set the ordering and sorting for all other repositories */
        $this->categoryRepository->setDefaultOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        $this->regionRepository->setDefaultOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        $this->sectorRepository->setDefaultOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        $this->disciplineRepository->setDefaultOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        $this->educationRepository->setDefaultOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);

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
        } elseif ($this->settings['filter']['enablePreselect'] ?? false) {
            $filter = new Filter();
            if ($this->settings['filter']['preselectCategory'] ?? false) {
                /** @var Category $category */
                $category = $this->categoryRepository->findByUid($this->settings['filter']['preselectCategory']);
                $filter->addCategory($category);
            } elseif ($this->settings['filter']['preselectRegion']) {
                /** @var Region $region */
                $region = $this->regionRepository->findByUid($this->settings['filter']['preselectRegion']);
                $filter->addRegion($region);
            } elseif ($this->settings['filter']['preselectSector']) {
                /** @var Sector $sector */
                $sector = $this->sectorRepository->findByUid($this->settings['filter']['preselectSector']);
                $filter->addSector($sector);
            } elseif ($this->settings['filter']['preselectDiscipline']) {
                /** @var Discipline $discipline */
                $discipline = $this->disciplineRepository->findByUid($this->settings['filter']['preselectDiscipline']);
                $filter->addDiscipline($discipline);
            } elseif ($this->settings['filter']['preselectEducation']) {
                /** @var Education $education */
                $education = $this->educationRepository->findByUid($this->settings['filter']['preselectEducation']);
                $filter->addEducation($education);
            } elseif ($this->settings['filter']['preselectJobType']) {
                $filter->setJobType((int)($this->settings['filter']['preselectJobType'] ?? 0));
            } elseif ($this->settings['filter']['preselectContractType']) {
                $filter->setContractType((int)($this->settings['filter']['preselectContractType'] ?? 0));
            } elseif ($this->settings['filter']['preselectOwn']) {
                $filter->setOwn((bool)($this->settings['filter']['preselectOwn'] ?? false));
            }
            $jobs = $this->jobRepository->findFiltered($filter);
        } else {
            /* load all jobs if no filter is set */
            $jobs = $this->jobRepository->findAll();
        }
        $this->view->assign('jobs', $jobs);
        return $this->htmlResponse();
    }

    public function latestAction(): ResponseInterface
    {
        /** @var string $ordering */
        $ordering = $this->settings['latest']['ordering'];
        if ($this->settings['latest']['limit'] >= 1) {
            $limit = (int)$this->settings['latest']['limit'];
        } else {
            $limit = 3;
        }
        $jobs = $this->jobRepository->findLatest($ordering, $limit);
        $this->view->assign('jobs', $jobs);
        return $this->htmlResponse();
    }

    public function showAction(Job $job = null): ResponseInterface
    {
        if ($this->settings['seoOptimizationLevel'] && $job instanceof Job) {
            // @todo Use PageTitle API
//            $this->response->addAdditionalHeaderData('<title>' . $job->getJobTitle() . '</title>');
            // @todo Use MetaTag API
//            $this->response->addAdditionalHeaderData('<meta name="description" content="' . $job->getShortJobDescription() . '"/>');
        }
        if ($job === null && $this->settings['show']['displayErrorMessageIfNotFound']) {
            $this->flashMessageService('notFoundMessage', 'notFoundStatus', 'INFO');
        }
        if ($job === null && $this->settings['show']['redirectIfNotFound']) {
            return $this->redirect('list');
        }
        if ($job instanceof Job) {
            $this->view->assign('job', $job);
        }
        return $this->htmlResponse();
    }

    #[Extbase\IgnoreValidation(['argumentName' => 'newJob'])]
    public function newAction(Job $newJob = null): ResponseInterface
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            return $this->redirect('list');
        }
        if ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
            $this->settings['feuser']['editorUsergroupUid'],
            $this->accessControlService->getFrontendUserGroups()
        )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        $this->view->assign('regions', $this->regionRepository->findAll());
        $this->view->assign('sectors', $this->sectorRepository->findAll());
        $this->view->assign('categories', $this->categoryRepository->findAll());
        $this->view->assign('disciplines', $this->disciplineRepository->findAll());
        $this->view->assign('educations', $this->educationRepository->findAll());
        $this->view->assign('newJob', $newJob);

        return $this->htmlResponse();
    }

    public function createAction(Job $newJob): ResponseInterface
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            return $this->redirect('list');
        }
        if ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
            $this->settings['feuser']['editorUsergroupUid'],
            $this->accessControlService->getFrontendUserGroups()
        )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        $loggedInFeuser = $this->accessControlService->getFrontendUserObject();
        if ($loggedInFeuser !== null) {
            $newJob->addFeuser($loggedInFeuser);
        }
        $newJob->setSorting(9999999);
        $this->jobRepository->add($newJob);
        // @todo Migrate to PSR-14
        //        $this->signalSlotDispatcher->dispatch(__CLASS__, self::SIGNAL_CreateActionAfterAdd, ['job' => $newJob]);
        if ($this->settings['new']['enableAdminNotificaton'] &&
            GeneralUtility::validEmail($this->settings['new']['adminEmail']) &&
            GeneralUtility::validEmail($this->settings['new']['fromEmail'])) {
            $sender = ([$this->settings['new']['fromEmail'] => $this->settings['new']['fromName']]);
            $to = ['email' => $this->settings['new']['adminEmail'], 'name' => $this->settings['new']['adminName']];

            $recipients = [];
            foreach ($to as $pair) {
                if (GeneralUtility::validEmail($pair['email'])) {
                    if (trim($pair['name'])) {
                        $recipients[$pair['email']] = $pair['name'];
                    } else {
                        $recipients[] = $pair['email'];
                    }
                }
            }

            $this->div->sendEmail(
                'MailAdminNotificationCreate',
                $recipients,
                [],
                [],
                $sender,
                LocalizationUtility::translate('tx_jobfair_domain_model_job', 'jobfair') . ': ' . $newJob->getJobTitle(),
                ['job' => $newJob],
                ''
            );
        }
        $this->flashMessageService('jobAddMessage', 'jobAddStatus', 'OK');
        return $this->redirect('list');
    }

    #[Extbase\IgnoreValidation(['argumentName' => 'job'])]
    public function editAction(Job $job): ResponseInterface
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            return $this->redirect('list');
        }
        if ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
            $this->settings['feuser']['editorUsergroupUid'],
            $this->accessControlService->getFrontendUserGroups()
        )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        $this->view->assign('regions', $this->regionRepository->findAll());
        $this->view->assign('sectors', $this->sectorRepository->findAll());
        $this->view->assign('categories', $this->categoryRepository->findAll());
        $this->view->assign('disciplines', $this->disciplineRepository->findAll());
        $this->view->assign('educations', $this->educationRepository->findAll());
        $this->view->assign('job', $job);
        return $this->htmlResponse();
    }

    public function updateAction(Job $job): ResponseInterface
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            return $this->redirect('list');
        }
        if ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
            $this->settings['feuser']['editorUsergroupUid'],
            $this->accessControlService->getFrontendUserGroups()
        )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        $this->flashMessageService('jobEditedMessage', 'jobEditedStatus', 'OK');
        $this->jobRepository->update($job);
        // @todo Migrate to PSR-14
        //        $this->signalSlotDispatcher->dispatch(__CLASS__, self::SIGNAL_UpdateActionAfterUpdate, ['job' => $job]);
        return $this->redirect('show', 'Job', null, ['job' => $job]);
    }

    public function confirmDeleteAction(Job $job): ResponseInterface
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            return $this->redirect('list');
        }
        if ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
            $this->settings['feuser']['editorUsergroupUid'],
            $this->accessControlService->getFrontendUserGroups()
        )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        $this->view->assign('job', $job);
        return $this->htmlResponse();
    }

    public function deleteAction(Job $job): ResponseInterface
    {
        if (!$this->settings['feuser']['enableEdit']) {
            $this->flashMessageService('editingDisabledMessage', 'editingDisabledStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->hasLoggedInFrontendUser()) {
            $this->flashMessageService('editingNotLoggedInMessage', 'editingNotLoggedInStatus', 'ERROR');
            return $this->redirect('list');
        }
        if ($this->settings['feuser']['editorUsergroupUid'] && !in_array(
            $this->settings['feuser']['editorUsergroupUid'],
            $this->accessControlService->getFrontendUserGroups()
        )) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        if (!$this->accessControlService->isOwner($job)) {
            $this->flashMessageService('editingNoPermissionMessage', 'editingNoPermissionStatus', 'ERROR');
            return $this->redirect('list');
        }
        $this->flashMessageService('jobRemovedMessage', 'jobRemovedStatus', 'OK');
        $this->jobRepository->remove($job);
        return $this->redirect('list');
    }

    #[Extbase\IgnoreValidation(['argumentName' => 'newApplication'])]
    public function newApplicationAction(Job $job, Application $newApplication = null): ResponseInterface
    {
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $defaultStorage = $storageRepository->getDefaultStorage();
        $identifier = 'user_upload/tx_jobfair/applications';
        $hasFolder = $defaultStorage->hasFolder($identifier);
        if ($hasFolder === false) {
            $defaultStorage->createFolder($identifier);
        }
        $loggedInFeuserObject = $this->accessControlService->getFrontendUserObject();
        $this->view->assignMultiple(
            [
                'job' => $job,
                'user' => $loggedInFeuserObject,
                'newApplication' => $newApplication
            ]
        );
        return $this->htmlResponse();
    }

    #[Extbase\Validate(['validator' => ApplicationCreateValidator::class, 'param' => 'newApplication'])]
    public function createApplicationAction(Application $newApplication, Job $job): ResponseInterface
    {
        $newApplication->setTitle($job->getJobTitle() . ' - ' . $newApplication->getName());

        $this->applicationRepository->add($newApplication);
        $persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);
        $persistenceManager->persistAll();

        $job->addApplication($newApplication);
        $this->jobRepository->update($job);

        $sender = [];
        if ($this->settings['application']['fromEmail']) {
            $sender = ([$this->settings['application']['fromEmail'] => $this->settings['application']['fromName']]);
        }

        $to = [];
        $contact = $job->getContact();
        if ($contact !== null) {
            $to[] = ['email' => $contact->getEmail(), 'name' => $contact->getName()];
        }

        $feusers = $job->getFeuser();
        foreach ($feusers as $feuser) {
            $to [] = ['email' => $feuser->getEmail(), 'name' => $feuser->getFirstName() . ' ' . $feuser->getLastName()];
        }

        $recipients = [];
        foreach ($to as $pair) {
            if (GeneralUtility::validEmail($pair['email'])) {
                if (trim($pair['name'])) {
                    $recipients[$pair['email']] = $pair['name'];
                } else {
                    $recipients[] = $pair['email'];
                }
            }
        }

        if (!count($recipients)) {
            $this->flashMessageService('applicationSendMessageNoRecipients', 'applicationSendMessageNoRecipientsStatus', 'ERROR');
            return $this->redirect('show', 'Job', null, ['job' => $job]);
        }

        // toCc and toBcc (only relevant if send to contacts)
        $recipientsCc = [];
        $recipientsBcc = [];
        if ($contact) {
            $toCc = [];
            $toCc [] = ['email' => $contact->getEmailCc(), 'name' => $contact->getNameCc()];

            foreach ($toCc as $pair) {
                if (GeneralUtility::validEmail($pair['email'])) {
                    if (trim($pair['name'])) {
                        $recipientsCc[$pair['email']] = $pair['name'];
                    } else {
                        $recipientsCc[] = $pair['email'];
                    }
                }
            }

            $toBcc = [];
            $toBcc [] = ['email' => $contact->getEmailBcc(), 'name' => $contact->getNameBcc()];

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
        $subject = LocalizationUtility::translate(
            'tx_jobfair_domain_model_application.email_subject',
            'jobfair',
            ['jobTitle' => $job->getJobTitle()]
        );
        $sentMessageResult = $this->div->sendEmail(
            'MailApplication',
            $recipients,
            $recipientsCc,
            $recipientsBcc,
            $sender,
            $subject,
            ['newApplication' => $newApplication, 'job' => $job],
            $newApplication->getAttachment()->getOriginalResource()->getName()
        );
        if ($sentMessageResult) {
            $this->flashMessageService('applicationSendMessage', 'applicationSendStatus', 'OK');
        } else {
            $this->flashMessageService('applicationSendMessageGeneralError', 'applicationSendStatusGeneralErrorStatus', 'ERROR');
        }
        if ($this->settings['application']['dontSaveAttachment']) {
            $newApplication->setAttachment(null);
            // @todo hard-coded fileadmin folder: Use FAL API for default storage.
            $filePathAndName = Environment::getPublicPath() . '/fileadmin/user_upload/tx_jobfair/applications' . $newApplication->getAttachment()->getOriginalResource()->getName();
            if (file_exists($filePathAndName)) {
                @unlink($filePathAndName);
            }
        }
        return $this->redirect('show', 'Job', null, ['job' => $job]);
    }

    protected function flashMessageService(string $messageKey, string $statusKey, string $levelString): void
    {
        $level = match ($levelString) {
            'NOTICE' => ContextualFeedbackSeverity::NOTICE,
            'INFO' => ContextualFeedbackSeverity::INFO,
            'WARNING' => ContextualFeedbackSeverity::WARNING,
            'ERROR' => ContextualFeedbackSeverity::ERROR,
            default => ContextualFeedbackSeverity::OK,
        };

        $this->addFlashMessage(
            LocalizationUtility::translate($messageKey, 'jobfair'),
            LocalizationUtility::translate($statusKey, 'jobfair'),
            $level,
        );
    }
}
