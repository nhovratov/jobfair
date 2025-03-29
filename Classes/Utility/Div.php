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
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * This class provides misc functions (mostly file related) for the jobfair extension.
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Div
{
    public function __construct(
        protected ConfigurationManagerInterface $configurationManager
    ) {
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
        return $this->sendFluidEmail($template, $receiver, $receiverCc, $receiverBcc, $sender, $subject, $variables, $fileName);
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
            $absFilePath = GeneralUtility::getFileAbsFileName('fileadmin/user_upload/tx_jobfair/applications/' . $fileName);
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
}
