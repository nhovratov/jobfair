<?php
namespace Dan\Jobfair\ViewHelpers\Security;

use TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper;
use TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\ViewHelperNode;
use TYPO3Fluid\Fluid\Core\Compiler\TemplateCompiler;

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
 * View helper to create additional parameters for link to user profile
 *
 * @author Dan <typo3dev@outlook.com>
 */
class EditLinkViewHelper extends IfViewHelper {

	/**
	 * @var \Dan\Jobfair\Service\AccessControlService
	 * @inject
	 */
	protected $accessControlService;

	/**
	 * Register argument "job" so that it can be passed to viewhelper
	 */
	public function initializeArguments()
	{
		$this->registerArgument('job', 'Dan\Jobfair\Domain\Model\Job', 'Object of the job', TRUE);
	}

	/**
	 * View helper to display edit or delete link if logged in user is owner of the job
	 *
	 * @param \Dan\Jobfair\Domain\Model\Job $job The job to be tested for ownership
	 * @return string The output
	 */
	public function render() {
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->arguments['job']);
		$job = $this->arguments['job'];
		if ($this->accessControlService->isOwner($job)) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}

	/**
	 * The compiled ViewHelper adds two new ViewHelper arguments: __thenClosure and __elseClosure.
	 * These contain closures which are be executed to render the then(), respectively else() case.
	 *
	 * @param string $argumentsName
	 * @param string $closureName
	 * @param string $initializationPhpCode
	 * @param ViewHelperNode $node
	 * @param TemplateCompiler $compiler
	 * @return string
	 */
	public function compile(
			$argumentsName,
			$closureName,
			&$initializationPhpCode,
			ViewHelperNode $node,
			TemplateCompiler $compiler
	) {
		parent::compile(
				$argumentsName,
				$closureName,
				$initializationPhpCode,
				$node,
				$compiler
		);
		return TemplateCompiler::SHOULD_GENERATE_VIEWHELPER_INVOCATION;
	}
}
