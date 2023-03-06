.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _faq:

FAQ
===

How can I use my own template?
------------------------------

In your template (setup) use the following typoscript:

.. code-block:: typoscript

	plugin.tx_jobfair {
		view {
			templateRootPaths {
				100 = EXT:jobfair/Resources/Private/Templates/
				200 = fileadmin/template/extensions/jobfair/Templates/
			}
			partialRootPaths {
				100 = EXT:jobfair/Resources/Private/Partials/
				200 = fileadmin/template/extensions/jobfair/Partials/
			}
			layoutRootPaths {
				100 = EXT:jobfair/Resources/Private/Layouts/
				200 = fileadmin/template/extensions/jobfair/Layouts/
			}
		}
	}

NOTE: You do not have to copy the entire folder(s) to the new location. It is sufficient that you place only the
files you are going to change in the fileadmin folder. However, be sure to recreate the right subfolder.

How to change the order of fields?
----------------------------------

The order in the flexforms (list, show, filter) will be used in the frondend as well. So order the fields in the same
sequence as you want them to appear in the frontend.


How to hide fields in the Backend?
----------------------------------

In Page TSConfig:

.. code-block:: typoscript

	TCEFORM.tx_jobfair_domain_model_job {
		contract_type.disabled = 1
		salary.disabled = 1
		sys_language_uid.disabled = 1
	}

How to change language labels in the BACKEND?
---------------------------------------------

In Page TSConfig:

.. code-block:: typoscript

	TCEFORM.tx_jobfair_domain_model_job.job_type {
		label.default = Category
		altLabels.0 = Search
		altLabels.1 = Offer
	}

This can be done language specific:

In Page TSConfig:

.. code-block:: typoscript

	TCEFORM.tx_jobfair_domain_model_job.job_type.label.de = Kategorie


NOTE: Do not use this to translate the entire backend but add your translation to the `translation server of TYPO3 <https://translation.typo3.org/>`_

How to change language labels in the FRONTEND?
----------------------------------------------

In your template (setup) use the following typoscript:

.. code-block:: typoscript

	plugin.tx_jobfair._LOCAL_LANG.default {
    		tx_jobfair_domain_model_job.job_title = New label text
    }

This can be done language specific:

In your template (setup) use the following typoscript:

.. code-block:: typoscript

	plugin.tx_jobfair._LOCAL_LANG.de {
    		tx_jobfair_domain_model_job.job_title = New label text
    }

NOTE: Do not use this to translate the entire Frontend but add your translation to the `translation server of TYPO3 <https://translation.typo3.org/>`_

How to shorten the URL and use RealURL?
---------------------------------------
If you want to shorten the URL, it is possible to skip the controller parameter, since the jobfair extension works
with only one controller in the frontend. To skip the controller add the following to your SETUP:

.. code-block:: php

	plugin.tx_jobfair {
    		features {
        			skipDefaultArguments = 1
    		}
	}

In general, there are two options if you want to shorten the URL by using RealURL: using **postVarSets** or **fixedPostVars**.
|
To use the postVarSets add the following code to your RealURL configuration:

.. code-block:: php
    'postVarSets' => array (
        '_DEFAULT' => array (
                          'job' => array(
                                array(
                                        'GETvar' => 'tx_jobfair_pi1[action]',
                                ),
                                array(
                                        'GETvar' => 'tx_jobfair_pi1[job]',
                                        'lookUpTable' => array(
                                                'table' => 'tx_jobfair_domain_model_job',
                                                'id_field' => 'uid',
                                                'alias_field' => 'job_title',
                                                'addWhereClause' => ' AND NOT deleted',
                                                'useUniqueCache' => 1,
                                                'useUniqueCache_conf' => array(
                                                        'strtolower' => 1,
                                                        'spaceCharacter' => '-',
                                                ),
                                                'languageGetVar' => 'L',
                                                'languageExceptionUids' => '',
                                                'languageField' => 'sys_language_uid',
                                                'transOrigPointerField' => 'l10n_parent',
                                                'autoUpdate' => 1,
                                                'expireDays' => 180,
                                        ),
                                ),
                           ),
        ),
    ),

This will tranform your URL to the following format: http://www.yourdomain.com/*pagepath*/job/show/*job_title*.html
Note that the pagepath depends on your configuration.
|
|
As an even shorter alternative it is possible to configure the fixedPostVars in your RealURL configuration:

.. code-block:: php

    'fixedPostVars' => array(
                'jobfairConfiguration' => array(
          				array(
                	        'GETvar' => 'tx_jobfair_pi1[action]',
                					'valueMap' => array(
                					        'details' => 'show',
                					        'aktuell' => 'latest',
                					        'neu' => 'new',
                					        'anlegen' => 'create',
                					        'bearbeiten' => 'edit',
                					        'aktualisieren' => 'update',
                					        'loeschen' => 'confirmDelete',
                					        'loeschung' => 'delete',
                					        'bewerbung' => 'newApplication',
                					        'bewerben' => 'createApplication',
                					),
                          'noMatch' => 'bypass',
                  ),
          				array(
                          'cond' => array('prevValueInList' => 'show,edit,confirmDelete,newApplication,createApplication'),
                	        'GETvar' => 'tx_jobfair_pi1[job]',
                					'lookUpTable' => array(
                					        'table' => 'tx_jobfair_domain_model_job',
                					        'id_field' => 'uid',
                					        'alias_field' => 'job_title',
                					        'addWhereClause' => ' AND NOT deleted',
                					        'useUniqueCache' => 1,
                					        'useUniqueCache_conf' => array(
                							            'strtolower' => 1,
                							            'spaceCharacter' => '-',
                					        ),
                					),
          				),
          			),
                '279' => 'jobfairConfiguration',
        ),

Note: You need to adapt the configuration to the page ID where you inserted the jobfair plugin (change 279 to your page ID).

How can I use TYPO3 9+ routing with jobfair?
--------------------------------------------

If you want to use shortened URLs with TYPO3 9+, you can use the following code in your site configuration.

Please mind the the intendation: "routeEnhancers" starts on the first character of the line.

.. code-block:: yaml

		routeEnhancers:
		  Jobfair:
		    type: Extbase
		    extension: Jobfair
		    plugin: Pi1
		    routes:
		      -
		        routePath: '/{job_title}'
		        _controller: 'Job::show'
		        _arguments:
		          job_title: job
		      -
		        routePath: '/'
		        _controller: 'Job::list'
		      -
		        routePath: 'apply/{job_title}'
		        _controller: 'Job::newApplication'
		        _arguments:
		          job_title: job
		    defaultController: 'Job::show'
		    aspects:
		      job_title:
		        type: PersistedAliasMapper
		        tableName: tx_jobfair_domain_model_job
		        routeFieldName: slug


The first part will give you a shortened URL for the job itself.

The second part will give you a shortened URL for the "Back to list" button in the single view of the job.

And the third and final part will shorten the URL of the "Apply now" button. Here you should adapt the "apply" string to your needs.

You can also put the above code into your sitepackage and import it:

.. code-block:: yaml

		imports:
  		-
    		resource: 'EXT:yoursitepackage/Configuration/Routes/Default.yaml'


How can I hide the jobs tab/field in the backend for Frontend Users?
--------------------------------------------------------------------

Add the following TypoScript Configuration to Page TSConfig of your folder containing the Frontend Users (see page proberties)

.. code-block:: typoscript

	TCEFORM.fe_users {
		jobs.disabled = 1
	}

The field will be hidden in the Backend


I want a latest view on my homepage and link to a different detail page!
------------------------------------------------------------------------

Add the plugin to the homepage and set the checkbox "Replace standard list view with latest view" within the plugin. In
addition, you need to set the UID ("UID of the page containing the plugin for detail view") to link to your page containing
the detail view.

How can I change which fields are required to send an application?
------------------------------------------------------------------

You can change the default behaviour by editing the template file "NewApplication.html". Search for the attribute
required="required". Plese note: to change the setting for the textarea, you need to set it using a different
attribute:

.. code-block:: html

	additionalAttributes="{required: 'required'}

How can I change the multiple select fields to simple dropdowns in filter?
--------------------------------------------------------------------------

You need to change the partial of the filter field (e.g. category: EXT:jobfair/Resources/Private/Partials/Job/Filter/Category.html). Find the line

.. code-block:: html

	multiple="true"

and change it to

.. code-block:: html

	multiple=""
    size="1"

How can I add fields to the selects like contract types?
--------------------------------------------------------

The reason why these fields are selects / dropdowns is that the fields where used in the older dmmjobcontrol extension. To make the transition process easy, those fields where not changed.

However, you can change both, the quantity of the items and the label. The process on how to change the labels is stated in the FAQ as well. To change those labels in the backend add the following to the page TSConfig:

.. code-block:: typoscript

	TCEFORM.tx_jobfair_domain_model_job.job_type.altLabels.0= XYZ

Additionally you have to add the following to the SETUP to change the label in the frontend:

.. code-block:: typoscript

	plugin.tx_jobfair._LOCAL_LANG.default {
    tx_jobfair_domain_model_job.job_type.0 = XYZ
    }

To add items you can simply add the following to the page TSConfig of the folder containing the jobs:

.. code-block:: typoscript

	TCEFORM.tx_jobfair_domain_model_job.job_type.addItems {
                2 = XYZ
                3 = TEST 1
                4 = TEST 2
    }

Finally, you need to change the partial JobType.html and add the following if statement (duplicate if you have more additional entries):

.. code-block:: html

	<f:if condition="{job.jobType} == 2">
    	<f:translate key="tx_jobfair_domain_model_job.job_type.2" />
	</f:if>

How can I changes file types allowed to upload?
-----------------------------------------------
A new feature in TYPO3 CMS 6.2 is that we can simply change the TCA by putting files in Configuration/TCA/Overrides/
The TCA in these files will be added to the cached TCA for extra speed. So if you have not done this before create a
simply (empty) extension for your installation. By convention we'll simply use as filename tx_jobfair_domain_model_application.php,
in our case: Configuration/TCA/Overrides/tx_jobfair_domain_model_application.php . Insert the following content:

.. code-block:: php

	<?php
	if (!defined('TYPO3_MODE')) {
			die ('Access denied.');
	}
	$GLOBALS['TCA']['tx_jobfair_domain_model_application']['columns']['attachment']['config']['allowed'] = 'pdf,zip,rar,doc,docx,odt';
