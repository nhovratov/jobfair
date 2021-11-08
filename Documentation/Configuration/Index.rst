.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================

Under the assumption that the plugin will be used only once (or only a few times) on a website,
the flexform was created in a way that almost all configuration can be done there. For the few
exeptions see the Configuration\TypoScript\Main\setup.txt.

.. important:: Every setting can also be defined by TypoScript. However, please inform yourself about the setting overrideFlexformSettingsIfEmpty_.


.. _configuration-typoscript:

TypoScript Reference
--------------------

Please find an overview of the TypoScript properties below. If you miss anything please see the
Configuration\TypoScript\Main\setup.txt file or report it at forge.


Properties
^^^^^^^^^^

.. container:: ts-properties

	==================================== ====================================== ============== ===============
	Property                             Title / Default                        Sheet          Type
	==================================== ====================================== ============== ===============
	templateRootPaths_                   Template root path for the plugin      n/a            array
	partialRootPaths_                    Partial root path for the plugin       n/a            array
	layoutRootPaths_                     Layout root path for the plugin        n/a            array
	storagePid_                          Storage PID                            General        integer
	divider_                             Object type of the divider             n/a            Object
	value_                               Value of the divider                   n/a
	noTrimWrap_                          Wrap of the divider                    n/a            wrap
	imageMaxWidth_                       50                                                    integer
	imageMaxHeight_                      100                                                   integer
	ordering_                            crdate                                                string
	sorting_                             DESC                                                  string
	pageIdDetail_                                                                              integer
	hideFilter_                          0                                                     integer
	filterlimit_                                                                               integer
	enablePreselect_                     0                                                     integer
	preselectCategory_                                                                         integer
	preselectRegion_                                                                           integer
	preselectSector_                                                                           integer
	preselectDiscipline_                                                                       integer
	preselectEducation_                                                                        integer
	preselectJobType_                                                                          integer
	preselectContractType_                                                                     integer
	hideEmpty_                           0                                                     integer
	`show.imageMaxWidth`_                100                                                   integer
	`show.imageMaxHeight`_               200                                                   integer
	imageContactMaxWidth_                100                                                   integer
	imageContactMaxHeight_               200                                                   integer
	pageIdList_                                                                                integer
	displayErrorMessageIfNotFound_                                                             boolean
	redirectIfNotFound_                                                                        boolean
	disable_                             0                                                     integer
	fromName_                                                                                  string
	fromEmail_                                                                                 string
	requireAttachment_                   0                                                     boolean
	dontSaveAttachment_                  0                                                     boolean
	enableEdit_                          0                                                     integer
	editorUsergroupUid_                                                                        integer
	pageId_                                                                                    integer
	pluginName_                                                                                string
	pluginField_                                                                               string
	`new.enableAdminNotificaton`_                                                              boolean
	`new.fromName`_                                                                            string
	`new.fromEmail`_                                                                           string
	==================================== ====================================== ============== ===============
	`new.adminName`_                                                                           string
	`new.adminEmail`_                                                                          string
	`new.dateFormat`_                                                                          string
	`edit.dateFormat`_                                                                         string
	`latest.enableLatest`_                                                                     integer
	`latest.limit`_                                                                            integer
	`latest.ordering`_                                                                         string
	`latest.pageIdDetail`_                                                                     integer
	`latest.pageIdList`_                                                                       integer
	`latest.imageMaxWidth`_                                                                    integer
	`latest.imageMaxHeight`_                                                                   integer

Property details
^^^^^^^^^^^^^^^^

.. _ts-plugin-tx-jobfair-settings-seoOptimizationLevel:

seoOptimizationLevel
""""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.seoOptimizationLevel
	Data type
		integer
	Default
		0
	Description
		Sets the level of SEO optimization. Level 1 uses job title and short job description as title and meta description tag.

.. _ts-plugin-tx-jobfair-view-templateRootPaths:

templateRootPaths
"""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.view.templateRootPaths
	Data type
		array
	Default
		100 = EXT:jobfair/Resources/Private/Templates/
	Description
		Sets the path for the template files. The new paths ("s" !) function is used, so you can override this setting
		by setting a new array entry.

.. _ts-plugin-tx-jobfair-view-partialRootPaths:

partialRootPaths
""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.view.partialRootPaths
	Data type
		array
	Default
		100 = EXT:jobfair/Resources/Private/Partials/
	Description
		Sets the path for the partial files. The new paths ("s" !) function is used, so you can override this setting by
		setting a new array entry.

.. _ts-plugin-tx-jobfair-view-layoutRootPaths:

layoutRootPaths
"""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.view.layoutRootPaths
	Data type
		array
	Default
		100 = EXT:jobfair/Resources/Private/Layouts/
	Description
		Sets the path for the layout files. The new paths ("s" !) function is used, so you can override this setting by
		setting a new array entry.

.. _ts-plugin-tx-jobfair-persistence-storagePid:

storagePid
""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.persistence.storagePid
	Data type
		integer
	Default
		{$plugin.tx_jobfair.persistence.storagePid}
	Description
		Sets the UID of the page where your job information (jobs, regions, applications) is stored.

.. _ts-plugin-tx-jobfair-_divider:

divider
"""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.divider
	Data type
		Object
	Default
		TEXT
	Description
		Object which is used as a divider between link buttons.

.. _ts-plugin-tx-jobfair-_value:

value
"""""
.. container:: table-row

	Property
		plugin.tx_jobfair.divider.value
	Data type
		string
	Default
		|
	Description
		Text which is used as a divider between link buttons. Default is "|"

.. _ts-plugin-tx-jobfair-_noTrimWrap:

noTrimWrap
""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.divider.noTrimWrap
	Data type
		wrap
	Default
		| | |
	Description
		Wrap for the text which is used as a divider between link buttons. Default is "| | |" resulting in one space before and
		after the "|" (see plugin.tx_jobfair.divider.value from above).


.. _ts-plugin-tx-jobfair-settings-list-imageMaxWidth:

imageMaxWidth
"""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.list.imageMaxWidth
	Data type
		integer
	Default
		50
	Description
		Sets the maximum width of images in list view. The maximum width of images in detail view can be configured separately.


.. _ts-plugin-tx-jobfair-settings-list-imageMaxHeight:

imageMaxHeight
""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.list.imageMaxWidth
	Data type
		integer
	Default
		100
	Description
		Sets the maximum height of images in list view. The maximum height of images in detail view can be configured separately.


.. _ts-plugin-tx-jobfair-settings-list-ordering:

ordering
""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.list.ordering
	Data type
		string
	Default
		crdate
	Description
		Sets the field for ordering the list view. Use the fieldname like in MYSQL (e.g. job_title is correct, not jobTitle).


.. _ts-plugin-tx-jobfair-settings-list-sorting:

sorting
"""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.list.sorting
	Data type
		string
	Default
		ASC
	Description
		Sets the sorting of the list view. Possible values are ASC and DESC.


.. _ts-plugin-tx-jobfair-settings-list-pageIdDetail:

pageIdDetail
""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.list.pageIdDetail
	Data type
		integer
	Default
		|
	Description
		Sets the UID of the page containing the plugin with the detail view. Empty for same page.


.. _ts-plugin-tx-jobfair-settings-filter-hideFilter:

hideFilter
""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.hideFilter
	Data type
		integer
	Default
		|
	Description
		If set to 1 the filter will be hidden.


.. _ts-plugin-tx-jobfair-settings-filter-filterlimit:

filterlimit
"""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.filterlimit
	Data type
		integer
	Default
		|
	Description
		Sets the minimum number of jobs which are neccessary for the filter to appear. E.g. if set to 20 the filter will not appear if there are only 15 jobs present, but will show if there are 25 entries.


.. _ts-plugin-tx-jobfair-settings-filter-enablePreselect:

enablePreselect
"""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.enablePreselect
	Data type
		integer
	Default
		|
	Description
		If set to 1 the preselect is activated.


.. _ts-plugin-tx-jobfair-settings-filter-preselectCategory:

preselectCategory
"""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectCategory
	Data type
		integer
	Default
		|
	Description
		The UID of the category to preselect jobs. Only job entries with a category having the given UID are shown.


.. _ts-plugin-tx-jobfair-settings-filter-preselectRegion:

preselectRegion
"""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectRegion
	Data type
		integer
	Default
		|
	Description
		The UID of the region to preselect jobs. Only job entries with a region having the given UID are shown.


.. _ts-plugin-tx-jobfair-settings-filter-preselectSector:

preselectSector
"""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectSector
	Data type
		integer
	Default
		|
	Description
		The UID of the sector to preselect jobs. Only job entries with a sector having the given UID are shown.


.. _ts-plugin-tx-jobfair-settings-filter-preselectDiscipline:

preselectDiscipline
"""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectDiscipline
	Data type
		integer
	Default
		|
	Description
		The UID of the discipline to preselect jobs. Only job entries with a discipline having the given UID are shown.


.. _ts-plugin-tx-jobfair-settings-filter-preselectEducation:

preselectEducation
""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectEducation
	Data type
		integer
	Default
		|
	Description
		The UID of the education to preselect jobs. Only job entries with a education having the given UID are shown.


.. _ts-plugin-tx-jobfair-settings-filter-preselectJobType:

preselectJobType
""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectJobType
	Data type
		integer
	Default
		|
	Description
		The value of the job type to preselect jobs. Only job entries with a job type having the given value are shown.


.. _ts-plugin-tx-jobfair-settings-filter-preselectContractType:

preselectContractType
"""""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.filter.preselectContractType
	Data type
		integer
	Default
		|
	Description
		The value of the contract type to preselect jobs. Only job entries with a contract type having the given value are shown.


.. _ts-plugin-tx-jobfair-settings-show-hideEmpty:

hideEmpty
"""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.hideEmpty
	Data type
		integer
	Default
		|
	Description
		If set to 1 all empty fields in the detail view are hidden. That might be useful if you do not fill every field for
each job entry.


.. _ts-plugin-tx-jobfair-settings-show.imageMaxWidth:

show.imageMaxWidth
""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.imageMaxWidth
	Data type
		integer
	Default
		|
	Description
		Sets the maximum width of images in detail view. The maximum width of images in list view can be configured separately.


.. _ts-plugin-tx-jobfair-settings-show.imageMaxHeight:

show.imageMaxHeight
"""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.imageMaxHeight
	Data type
		integer
	Default
		|
	Description
		Sets the maximum height of images in detail view. The maximum height of images in list view can be configured separately.


.. _ts-plugin-tx-jobfair-settings-show-imageContactMaxWidth:

imageContactMaxWidth
""""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.imageContactMaxWidth
	Data type
		integer
	Default
		|
	Description
		Sets the maximum width of contact image in detail view.


.. _ts-plugin-tx-jobfair-settings-show-imageContactMaxHeight:

imageContactMaxHeight
"""""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.imageContactMaxHeight
	Data type
		integer
	Default
		|
	Description
		Sets the maximum height of contact image in detail view.


.. _ts-plugin-tx-jobfair-settings-show-pageIdList:

pageIdList
""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.pageIdList
	Data type
		integer
	Default
		|
	Description
		Sets the UID of the page containing the plugin with the list view. Empty for same page.


.. _ts-plugin-tx-jobfair-settings-show-displayErrorMessageIfNotFound:

displayErrorMessageIfNotFound
"""""""""""""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.displayErrorMessageIfNotFound
	Data type
		boolean
	Default
		|
	Description
		If set, a message will be displayed if the job is not found.


.. _ts-plugin-tx-jobfair-settings-show-redirectIfNotFound:

redirectIfNotFound
""""""""""""""""""
.. container:: table-row

	Property
		plugin.tx_jobfair.settings.show.redirectIfNotFound
	Data type
		boolean
	Default
		|
	Description
		If set, users will be redirected to the list view if the job is not found. Can be combined with an additional message


.. _ts-plugin-tx-jobfair-settings-application-disable:

disable
"""""""

:typoscript:`plugin.tx_jobfair.settings.application.disable  =` :ref:`t3tsref:data-type-integer`

If set to 1 the application function is disabled.


.. _ts-plugin-tx-jobfair-settings-application-fromName:

fromName
""""""""

:typoscript:`plugin.tx_jobfair.settings.application.fromName  =` :ref:`t3tsref:data-type-string`

Sets the email name of the email sender for applications.


.. _ts-plugin-tx-jobfair-settings-application-fromEmail:

fromEmail
"""""""""

:typoscript:`plugin.tx_jobfair.settings.application.fromEmail  =` :ref:`t3tsref:data-type-string`

Sets the email address of the email sender for applications.


.. _ts-plugin-tx-jobfair-settings-application-validation-attachment-required:

requireAttachment
"""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.application.validation.attachment.required  =` :ref:`t3tsref:data-type-boolean`

If set to 1 attachments are mandatory in applications.


.. _ts-plugin-tx-jobfair-settings-application-dontSaveAttachment:

dontSaveAttachment
""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.application.dontSaveAttachment  =` :ref:`t3tsref:data-type-boolean`

If set to 1 attachments are not saved in the file system.


.. _ts-plugin-tx-jobfair-settings-feuser-enableEdit:

enableEdit
""""""""""

:typoscript:`plugin.tx_jobfair.settings.feuser.enableEdit  =` :ref:`t3tsref:data-type-integer`

If set to 1 the editing of entries by logged in frontend users is enabled. NOTE: You need to set editorUsergroupUid to
the UID of the frontend user group which has the permission to edit their own entries and add new ones.


.. _ts-plugin-tx-jobfair-settings-feuser-editorUsergroupUid:

editorUsergroupUid
""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.feuser.editorUsergroupUid  =` :ref:`t3tsref:data-type-integer`

The UID of the frontend user group which has the permission to edit their own entries and add new ones.


.. _ts-plugin-tx-jobfair-settings-feuser-pageId:

pageId
""""""

:typoscript:`plugin.tx_jobfair.settings.feuser.pageId  =` :ref:`t3tsref:data-type-integer`

The UID of a page where the frontend user details are shown.

NOTE: This setting belongs to the group of settings (pageId, pluginName, pluginField) which allow you to link the name
of your front end user to a page where his or her details are shown by a another plugin.

EXAMPLE: If you use the extension "femanager" and insert the plugin showing the detail view for FE-user, a link to the
page should look like this: http://www.yourdomain.de/index.php?id=111&tx_femanager_pi1%5Buser%5D=222. The part "111"
correspondends to the setting "pageID", the part "tx_femanager_pi" correspondends to the setting "pluginName" and the part
"user" corresponds to the setting "pluginField".


.. _ts-plugin-tx-jobfair-settings-feuser-pluginName:

pluginName
""""""""""

:typoscript:`plugin.tx_jobfair.settings.feuser.pluginName  =` :ref:`t3tsref:data-type-string`

The name of a plugin which is used to show the frontend user details on a different page.

NOTE: This setting belongs to the group of settings (pageId, pluginName, pluginField) which allow you to link the name
of your front end user to a page where his or her details are shown by a pre Extbase plugin.


.. _ts-plugin-tx-jobfair-settings-feuser-pluginField:

pluginField
"""""""""""

:typoscript:`plugin.tx_jobfair.settings.feuser.pluginField  =` :ref:`t3tsref:data-type-string`

The name of a plugin field which is used to show the frontend user details on a different page.

NOTE: This setting belongs to the group of settings (pageId, pluginName, pluginField) which allow you to link the name
of your front end user to a page where his or her details are shown by a pre Extbase plugin.


.. _ts-plugin-tx-jobfair-settings-new.enableAdminNotificaton:

new.enableAdminNotificaton
""""""""""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.enableAdminNotificaton  =` :ref:`t3tsref:data-type-boolean`

Enables the admin notification if new jobs are added in the frontend.

NOTE: You need to set admin name and email address to make this work


.. _ts-plugin-tx-jobfair-settings-new.fromName:

new.fromName
""""""""""""

:typoscript:`plugin.tx_jobfair.settings.new.fromName  =` :ref:`t3tsref:data-type-string`

Sets the email name of the email sender for admin notifications.


.. _ts-plugin-tx-jobfair-settings-new-fromEmail:

new.fromEmail
"""""""""""""

:typoscript:`plugin.tx_jobfair.settings.new.fromEmail  =` :ref:`t3tsref:data-type-string`

Sets the email address of the email sender for admin notifications.


.. _ts-plugin-tx-jobfair-settings-new.adminName::

new.adminName
"""""""""""""

:typoscript:`plugin.tx_jobfair.settings.adminName  =` :ref:`t3tsref:data-type-string`

Sets the name of the admin for notification mails


.. _ts-plugin-tx-jobfair-settings-new.adminEmail:

new.adminEmail
""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.adminEmail  =` :ref:`t3tsref:data-type-string`

Sets the email address of the admin for notification mails


.. _ts-plugin-tx-jobfair-settings-new.dateFormat:

new.dateFormat
""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.new.dateFormat  =` :ref:`t3tsref:data-type-string`

Sets the date format for the publish and expirate date fields in form for new jobs.


.. _ts-plugin-tx-jobfair-settings-edit.dateFormat:

edit.dateFormat
"""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.edit.dateFormat  =` :ref:`t3tsref:data-type-string`

Sets the date format for the publish and expirate date fields in edit form.


.. _ts-plugin-tx-jobfair-settings-latest.enableLatest:

latest.enableLatest
"""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.enableLatest  =` :ref:`t3tsref:data-type-integer`

If set to 1 the list view is replaced with the latest view.


.. _ts-plugin-tx-jobfair-settings-latest.limit:

latest.limit
""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.limit  =` :ref:`t3tsref:data-type-integer`

Sets the number of jobs displayed in the latest view


.. _ts-plugin-tx-jobfair-settings-latest.ordering:

latest.ordering
"""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.ordering  =` :ref:`t3tsref:data-type-string`

Sets the field for ordering the list view. Use the fieldname like in MYSQL (crdate, tstamp or sorting).


.. _ts-plugin-tx-jobfair-settings-latest.pageIdDetail:

latest.pageIdDetail
"""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.pageIdDetail  =` :ref:`t3tsref:data-type-integer`

Sets the UID of the page containing the plugin with the detail view. Empty for same page.


.. _ts-plugin-tx-jobfair-settings-latest.pageIdList:

latest.pageIdList
"""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.pageIdList  =` :ref:`t3tsref:data-type-integer`

Sets the UID of the page containing the plugin with the list view. Necessary for the "More jobs" link to appear.


.. _ts-plugin-tx-jobfair-settings-latest.imageMaxWidth:

latest.imageMaxWidth
""""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.imageMaxWidth  =` :ref:`t3tsref:data-type-integer`

Sets the maximum width of images in latest view. The maximum width of images in detail and list view can be configured separately.


.. _ts-plugin-tx-jobfair-settings-latest.imageMaxHeight:

latest.imageMaxHeight
"""""""""""""""""""""

:typoscript:`plugin.tx_jobfair.settings.latest.imageMaxHeight  =` :ref:`t3tsref:data-type-integer`

Sets the maximum height of images in latest view. The maximum height of images in detail and list view can be configured separately.


TypoScript Reference (Feeds)
----------------------------

If you want to change the configuration of the feeds please check the following two files:
Configuration\TypoScript\RSS\setup.txt and Configuration\TypoScript\RSS\constants.txt file. All necessary configuration
can be done using the constant editor.