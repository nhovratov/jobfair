<?php
namespace Dan\Jobfair\Utility;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

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
 * This class provides misc functions (mostly file related) for the jobfair extension.
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Div {

	/**
	 * configurationManager
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * objectManager
	 *
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 * @inject
	 */
	protected $objectManager;

	/**
	 * Upload file
	 *
	 * @param \array $attachmentFile
	 * @return mixed	false or file.xyz
	 */
	public function uploadFile($attachmentFile) {
		// create new filename and upload it
		$basicFileFunctions = GeneralUtility::makeInstance('TYPO3\CMS\Core\Utility\File\BasicFileUtility');
        $newFileName = bin2hex(random_bytes(20)) . '_' . $attachmentFile['name'];
		$newFile = $basicFileFunctions->getUniqueName(
                $newFileName,
				GeneralUtility::getFileAbsFileName( self::getUploadFolderFromTca() )
		);
		if (GeneralUtility::upload_copy_move($attachmentFile['tmp_name'], $newFile)) {
			$fileInfo = pathinfo($newFile);
			return $fileInfo['basename'];
		}
		return FALSE;
	}

	/**
	 * Check extension of given filename
	 *
	 * @param \string		Filename like (upload.png)
	 * @return \bool		If Extension is allowed
	 */
	public static function checkExtension($filename) {
		$extensionList = $GLOBALS['TCA']['tx_jobfair_domain_model_application']['columns']['attachment']['config']['allowed'];
		$fileInfo = pathinfo($filename);
		if (!empty($fileInfo['extension']) && GeneralUtility::inList($extensionList, strtolower($fileInfo['extension']))) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Read upload folder of the attachment from TCA
	 *
	 * @return \string path - standard "uploads/pics"
	 */
	public static function getUploadFolderFromTca() {
		$path = $GLOBALS['TCA']['tx_jobfair_domain_model_application']['columns']['attachment']['config']['uploadfolder'];
		if (empty($path)) {
			$path = 'uploads/pics';
		}
		return $path;
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
	public function sendEmail($template, $receiver, $receiverCc, $receiverBcc, $sender, $subject, $variables = array(), $fileName) {

		/** @var $emailBodyObject \TYPO3\CMS\Fluid\View\StandaloneView */
		$emailBodyObject = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$emailBodyObject->setTemplatePathAndFilename($this->getTemplatePath('Email/' . $template . '.html'));
		//$emailBodyObject->setTemplatePathAndFileName(ExtensionManagementUtility::extPath('jobfair') . 'Resources/Private/Templates/Email/' . $template . '.html');
		$emailBodyObject->setLayoutRootPaths(array(
				'default' => ExtensionManagementUtility::extPath('jobfair') . 'Resources/Private/Layouts',
				'specific' => 'fileadmin/template/extensions/jobfair/Layouts'
		));
		$emailBodyObject->setPartialRootPaths(array(
				'default' => ExtensionManagementUtility::extPath('jobfair') . 'Resources/Private/Partials',
				'specific' => 'fileadmin/template/extensions/jobfair/Partials'
		));
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
			$filePathAndName = 'uploads/tx_jobfair/'.$fileName;
			$email->attach(\Swift_Attachment::fromPath($filePathAndName));
		}

		$email->send();

		return $email->isSent();
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
	public function getTemplatePath($relativePathAndFilename) {
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
}
