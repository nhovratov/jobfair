<?php
namespace Dan\Jobfair\ViewHelpers\Security;

use TYPO3\CMS\Fluid\Core\Compiler\TemplateCompiler;
use TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\AbstractNode;
use TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper;

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
	 * View helper to display edit or delete link if logged in user is owner of the job
	 *
	 * @param null $job
	 * @return bool
	 */
	public function render($job = NULL) {
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
	 * @param string $argumentsVariableName
	 * @param string $renderChildrenClosureVariableName
	 * @param string $initializationPhpCode
	 * @param \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\AbstractNode $syntaxTreeNode
	 * @param \TYPO3\CMS\Fluid\Core\Compiler\TemplateCompiler $templateCompiler
	 * @return string
	 * @internal
	 */
	public function compile(
			$argumentsVariableName,
			$renderChildrenClosureVariableName,
			&$initializationPhpCode,
			AbstractNode $syntaxTreeNode,
			TemplateCompiler $templateCompiler
	) {
		parent::compile(
				$argumentsVariableName,
				$renderChildrenClosureVariableName,
				$initializationPhpCode,
				$syntaxTreeNode,
				$templateCompiler
		);
		return TemplateCompiler::SHOULD_GENERATE_VIEWHELPER_INVOCATION;
	}
}