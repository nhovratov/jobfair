<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jobfair_domain_model_job', 'EXT:jobfair/Resources/Private/Language/locallang_csh_tx_jobfair_domain_model_job.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jobfair_domain_model_job');
$GLOBALS['TCA']['tx_jobfair_domain_model_job'] = array(
		'ctrl' => array(
				'title'	=> 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job',
				'label' => 'job_title',
				'tstamp' => 'tstamp',
				'crdate' => 'crdate',
				'cruser_id' => 'cruser_id',
				'sortby' => 'sorting',
				'dividers2tabs' => TRUE,

				'versioningWS' => 2,
				'versioning_followPages' => TRUE,

				'languageField' => 'sys_language_uid',
				'transOrigPointerField' => 'l10n_parent',
				'transOrigDiffSourceField' => 'l10n_diffsource',
				'delete' => 'deleted',
				'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
				),
				'searchFields' => 'job_title,employer,employer_description,location,short_job_description,job_description,experience,job_requirements,job_benefits,apply_information,salary,job_type,contract_type,region,contact,sector,category,discipline,education,feuser,',
				'iconfile' => 'EXT:jobfair/Resources/Public/Icons/tx_jobfair_domain_model_job.gif'
		),
		'interface' => array(
				'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, job_title, job_image, employer, employer_description, location, short_job_description, job_description, experience, job_requirements, job_benefits, apply_information, salary, job_type, contract_type, region, contact, sector, category, discipline, education, feuser, application, internal_notes',
		),
		'types' => array(
				'1' => array(
						'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, job_title, job_image, employer, employer_description, location, short_job_description, job_description, experience, job_requirements, job_benefits, apply_information, salary, job_type, contract_type, region, contact, sector, category, discipline, education, feuser, internal_notes, --div--;LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_application, application, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime',
				),
		),
		'columns' => array(
				'sys_language_uid' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectSingle',
								'foreign_table' => 'sys_language',
								'foreign_table_where' => 'ORDER BY sys_language.title',
								'items' => array(
										array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
										array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
								),
						),
				),
				'l10n_parent' => array(
						'displayCond' => 'FIELD:sys_language_uid:>:0',
						'exclude' => 1,
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
						'config' => array(
								'type' => 'select',
								'items' => array(
										array('', 0),
								),
								'foreign_table' => 'tx_jobfair_domain_model_job',
								'foreign_table_where' => 'AND tx_jobfair_domain_model_job.pid=###CURRENT_PID### AND tx_jobfair_domain_model_job.sys_language_uid IN (-1,0)',
								'renderType' => 'selectSingle',
						),
				),
				'l10n_diffsource' => array(
						'config' => array(
								'type' => 'passthrough',
						),
				),

				't3ver_label' => array(
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
						'config' => array(
								'type' => 'input',
								'size' => 30,
								'max' => 255,
						)
				),

				'hidden' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
						'config' => array(
								'type' => 'check',
								'default' => 0
						),
				),
				'starttime' => array(
						'exclude' => 1,
						'l10n_mode' => 'mergeIfNotBlank',
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
						'config' => array(
								'type' => 'input',
								'size' => 13,
								'max' => 20,
								'eval' => 'datetime',
								'checkbox' => 0,
								'default' => 0,
								'range' => array(
										'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
								),
						),
				),
				'endtime' => array(
						'exclude' => 1,
						'l10n_mode' => 'mergeIfNotBlank',
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
						'config' => array(
								'type' => 'input',
								'size' => 13,
								'max' => 20,
								'eval' => 'datetime',
								'checkbox' => 0,
								'default' => 0,
								'range' => array(
										'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
								),
						),
				),
				'sorting' => array(
						'config' => array(
								'type' => 'passthrough',
						),
				),
				'tstamp' => Array (
						'exclude' => 1,
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.tstamp',
						'config' => Array (
								'type' => 'none',
								'format' => 'date',
								'eval' => 'date',
						),
				),
				'crdate' => Array (
						'exclude' => 1,
						'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.crdate',
						'config' => Array (
								'type' => 'none',
								'format' => 'date',
								'eval' => 'date',
						),
				),
				'job_title' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_title',
						'config' => array(
								'type' => 'input',
								'size' => 30,
								'eval' => 'trim,required'
						),
				),
				'job_image' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_image',
						'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('job_image', array(
										'appearance' => array(
												'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
										),
										'minitems' => 0,
										'maxitems' => 1,
								), $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
				),
				'employer' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.employer',
						'config' => array(
								'type' => 'input',
								'size' => 30,
								'eval' => 'trim'
						),
				),
				'employer_description' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.employer_description',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 15,
								'eval' => 'trim',
						),
						'defaultExtras' => 'richtext:rte_transform[mode=ts_links]',
				),
				'location' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.location',
						'config' => array(
								'type' => 'input',
								'size' => 30,
								'eval' => 'trim'
						),
				),
				'short_job_description' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.short_job_description',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 8,
								'eval' => 'trim'
						)
				),
				'job_description' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_description',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 15,
								'eval' => 'trim',
						),
						'defaultExtras' => 'richtext:rte_transform[mode=ts_links]',
				),
				'experience' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.experience',
						'config' => array(
								'type' => 'input',
								'size' => 30,
								'eval' => 'trim'
						),
				),
				'job_requirements' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_requirements',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 8,
								'eval' => 'trim',
						),
						'defaultExtras' => 'richtext:rte_transform[mode=ts_links]',
				),
				'job_benefits' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_benefits',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 8,
								'eval' => 'trim',
						),
						'defaultExtras' => 'richtext:rte_transform[mode=ts_links]',
				),
				'apply_information' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.apply_information',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 8,
								'eval' => 'trim',
						),
						'defaultExtras' => 'richtext:rte_transform[mode=ts_links]',
				),
				'salary' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.salary',
						'config' => array(
								'type' => 'input',
								'size' => 30,
								'eval' => 'trim'
						),
				),
				'job_type' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_type',
						'config' => array(
								'type' => 'select',
								'items' => array(
										array('LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_type.0', 0),
										array('LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.job_type.1', 1),
								),
								'size' => 1,
								'maxitems' => 1,
								'eval' => '',
								'default' => 1,
								'renderType' => 'selectSingle',
						),
				),
				'contract_type' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type',
						'config' => array(
								'type' => 'select',
								'items' => array(
										array('LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.0', 0),
										array('LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.1', 1),
										array('LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.2', 2),
										array('LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contract_type.3', 3),
								),
								'size' => 1,
								'maxitems' => 1,
								'eval' => '',
								'renderType' => 'selectSingle',
						),
				),
				'region' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.region',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_region',
								'MM' => 'tx_jobfair_job_region_mm',
								'size' => 5,
								'autoSizeMax' => 30,
								'maxitems' => 9999,
								'multiple' => 0,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_add_title',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_region',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'contact' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.contact',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_contact',
								'minitems' => 0,
								'maxitems' => 1,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'Create new',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_contact',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'sector' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.sector',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_sector',
								'MM' => 'tx_jobfair_job_sector_mm',
								'size' => 5,
								'autoSizeMax' => 30,
								'maxitems' => 9999,
								'multiple' => 0,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'Create new',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_sector',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'category' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.category',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_category',
								'MM' => 'tx_jobfair_job_category_mm',
								'size' => 5,
								'autoSizeMax' => 30,
								'maxitems' => 9999,
								'multiple' => 0,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'Create new',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_category',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'discipline' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.discipline',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_discipline',
								'MM' => 'tx_jobfair_job_discipline_mm',
								'size' => 5,
								'autoSizeMax' => 30,
								'maxitems' => 9999,
								'multiple' => 0,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'Create new',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_discipline',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'education' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.education',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_education',
								'MM' => 'tx_jobfair_job_education_mm',
								'size' => 5,
								'autoSizeMax' => 30,
								'maxitems' => 9999,
								'multiple' => 0,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'Create new',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_education',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'feuser' => array(
						'exclude' => 0,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.feuser',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'fe_users',
								'foreign_table_where' => 'ORDER BY fe_users.last_name',
								'size' => 5,
								'autoMaxSize' => 30,
								'maxitems'      => 9999,
								'multiple' => 0,
								'MM' => 'tx_jobfair_job_user_mm',
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'suggest' => array(
												'type' => 'suggest'
										),
								),
						),
				),
				'application' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.application',
						'config' => array(
								'type' => 'select',
								'renderType' => 'selectMultipleSideBySide',
								'foreign_table' => 'tx_jobfair_domain_model_application',
								'MM' => 'tx_jobfair_job_application_mm',
								'size' => 5,
								'autoSizeMax' => 30,
								'maxitems' => 9999,
								'multiple' => 0,
								'wizards' => array(
										'_PADDING' => 1,
										'_VERTICAL' => 1,
										'edit' => array(
												'type' => 'popup',
												'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
												'module' => array(
														'name' => 'wizard_edit',
												),
												'popup_onlyOpenIfSelected' => 1,
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
												'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
										),
										'add' => Array(
												'type' => 'script',
												'title' => 'Create new',
												'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
												'params' => array(
														'table' => 'tx_jobfair_domain_model_application',
														'pid' => '###CURRENT_PID###',
														'setValue' => 'prepend'
												),
												'module' => array(
														'name' => 'wizard_add'
												),
										),
								),
						),
				),
				'internal_notes' => array(
						'exclude' => 1,
						'label' => 'LLL:EXT:jobfair/Resources/Private/Language/locallang_db.xlf:tx_jobfair_domain_model_job.internal_notes',
						'config' => array(
								'type' => 'text',
								'cols' => 40,
								'rows' => 16
						)
				),
		),
);