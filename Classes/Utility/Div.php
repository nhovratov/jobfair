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

namespace Dan\Jobfair\Utility;

use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * This class provides misc functions (mostly file related) for the jobfair extension.
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Div
{

    /**
     * configurationManager
     *
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     */
    protected $configurationManager;

    /**
     * objectManager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     */
    protected $objectManager;

    /**
     * Upload file
     *
     * @param \array $attachmentFile
     * @return mixed	false or file.xyz
     */
    public function uploadFile($attachmentFile)
    {
        // create new filename and upload it
        $basicFileFunctions = GeneralUtility::makeInstance('TYPO3\CMS\Core\Utility\File\BasicFileUtility');
        $newFileName = bin2hex(random_bytes(20)) . '_' . $attachmentFile['name'];
        $absFilePath = GeneralUtility::getFileAbsFileName('uploads/tx_jobfair');
        GeneralUtility::mkdir_deep($absFilePath);
        $newFile = $basicFileFunctions->getUniqueName($newFileName, $absFilePath);

        if (GeneralUtility::upload_copy_move($attachmentFile['tmp_name'], $newFile)) {
            $fileInfo = pathinfo($newFile);
            return $fileInfo['basename'];
        }
        return false;
    }

    /**
     * Check extension of given filename
     *
     * @param \string		Filename like (upload.png)
     * @return \bool		If Extension is allowed
     */
    public static function checkExtension($filename)
    {
        $extensionList = $GLOBALS['TCA']['tx_jobfair_domain_model_application']['columns']['attachment']['config']['overrideChildTca']['columns']['uid_local']['config']['appearance']['elementBrowserAllowed'];
        $fileInfo = pathinfo($filename);
        if (!empty($fileInfo['extension']) && GeneralUtility::inList($extensionList, strtolower($fileInfo['extension']))) {
            return true;
        }
        return false;
    }

    /**
     * Generate and send Email
     *
     * @param \string Template file in Templates/Email/
     * @param \array $receiver Combination of Email => Name
     * @param \array $receiverCc Combination of Email => Name
     * @param \array $receiverBcc Combination of Email => Name
     * @param \array $sender Combination of Email => Name
     * @param \string $subject Mail subject
     * @param \array $variables Variables for assignMultiple
     * @param \string $fileName
     * @return \bool Mail was sent?
     */
    public function sendEmail($template, $receiver, $receiverCc, $receiverBcc, $sender, $subject, $variables, $fileName)
    {
        if ((new Typo3Version())->getMajorVersion() > 9) {
            return $this->sendFluidEmail($template, $receiver, $receiverCc, $receiverBcc, $sender, $subject, $variables, $fileName);
        }

        return $this->sendSwiftEmail($template, $receiver, $receiverCc, $receiverBcc, $sender, $subject, $variables, $fileName);
    }

    public function sendSwiftEmail($template, $receiver, $receiverCc, $receiverBcc, $sender, $subject, $variables, $fileName)
    {

        /** @var $emailBodyObject \TYPO3\CMS\Fluid\View\StandaloneView */
        $emailBodyObject = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
        $emailBodyObject->setTemplatePathAndFilename($this->getTemplatePath('Email/' . $template . '.html'));
        //$emailBodyObject->setTemplatePathAndFileName(ExtensionManagementUtility::extPath('jobfair') . 'Resources/Private/Templates/Email/' . $template . '.html');
        $emailBodyObject->setLayoutRootPaths([
                'default' => ExtensionManagementUtility::extPath('jobfair') . 'Resources/Private/Layouts',
                'specific' => 'fileadmin/template/extensions/jobfair/Layouts'
        ]);
        $emailBodyObject->setPartialRootPaths([
                'default' => ExtensionManagementUtility::extPath('jobfair') . 'Resources/Private/Partials',
                'specific' => 'fileadmin/template/extensions/jobfair/Partials'
        ]);
        $emailBodyObject->assignMultiple($variables);

        $email = $this->objectManager->get('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        $email
                ->setTo($receiver)
                ->setCc($receiverCc)
                ->setBcc($receiverBcc)
                ->setFrom($sender)
                ->setSubject($subject)
                ->setCharset($GLOBALS['TSFE']->metaCharset)
                ->setBody($emailBodyObject->render(), 'text/html');

        if ($fileName) {
            /** @var $filePathAndName string Path to file name (incl. path) */
            $filePathAndName = 'uploads/tx_jobfair/' . $fileName;
            $email->attach(\Swift_Attachment::fromPath($filePathAndName));
        }

        $email->send();

        return $email->isSent();
    }

    /**
     * Generate and send Email
     * TYPO3 v10 with symfony mailer component
     */
    protected function sendFluidEmail(string $template, array $receiver, array $receiverCc, array $receiverBcc, array $sender, string $subject, array $variables, string $fileName)
    {
        $receiver = $this->transformArrayToAddresses($receiver);
        $receiverCc = $this->transformArrayToAddresses($receiverCc);
        $receiverBcc = $this->transformArrayToAddresses($receiverBcc);
        $sender = $this->transformArrayToAddresses($sender);
        $email = GeneralUtility::makeInstance(FluidEmail::class);
        $email
            ->to(...$receiver)
            ->from(...$sender)
            ->subject($subject)
            ->format('html')
            ->setTemplate($template)
            ->assignMultiple($variables);

        if ($receiverCc !== []) {
            $email->cc(...$receiverCc);
        }

        if ($receiverBcc !== []) {
            $email->cc(...$receiverBcc);
        }

        if ($fileName) {
            $absFilePath = GeneralUtility::getFileAbsFileName('uploads/tx_jobfair/' . $fileName);
            $email->attachFromPath($absFilePath);
        }

        $mailer = GeneralUtility::makeInstance(Mailer::class);
        $mailer->send($email);

        return $mailer->getSentMessage() !== null;
    }

    protected function transformArrayToAddresses(array $array): array
    {
        $result = [];
        foreach ($array as $email => $name) {
            $result[] = new Address($email, $name);
        }
        return $result;
    }

    /**
     * Return path and filename for a file
     * 		respect *RootPaths and *RootPath
     *
     *@todo Remove this function as soon as StandaloneView supports templaterootpaths ... , maybe TYPO3 6.3 ?
     *
     * @param string $relativePathAndFilename e.g. Email/Name.html
     * @return string
     */
    public function getTemplatePath($relativePathAndFilename)
    {
        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
        );
        if (!empty($extbaseFrameworkConfiguration['view']['templateRootPaths'])) {
            foreach ($extbaseFrameworkConfiguration['view']['templateRootPaths'] as $path) {
                $absolutePath = GeneralUtility::getFileAbsFileName($path);
                if (file_exists($absolutePath . $relativePathAndFilename)) {
                    $absolutePathAndFilename = $absolutePath . $relativePathAndFilename;
                }
            }
        }
        if (empty($absolutePathAndFilename)) {
            $absolutePathAndFilename = GeneralUtility::getFileAbsFileName(
                'EXT:jobfair/Resources/Private/Templates/' . $relativePathAndFilename
            );
        }
        return $absolutePathAndFilename;
    }

    public function injectConfigurationManager($configurationManager): void
    {
        $this->configurationManager = $configurationManager;
    }

    public function injectObjectManager($objectManager): void
    {
        $this->objectManager = $objectManager;
    }
}
