.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _changelog:

ChangeLog
=========

**2.0.0**
----------
| Compatibility with TYPO3 8


**1.0.13**
----------
| SEO Optimization: job title and short job description can be set as title and meta description tag

**1.0.12**
----------
| Added option to avoid saving attachments in file system

**1.0.11**
----------
| More options to set ordering/sorting in flexform
| Edit and delete view are not displayed if user has no right to access the create and update action
| Updates to the manual
| Fixed caching problem regading edit and delete link
| New option to show only jobs for logged in FE-user

**1.0.10**
----------
| Removed RTE wizards and fixed problem with RTE in TYPO3 6.2
| Fixed ordering/sorting in latest view
| Fixed missing icon folder in TYPO3 6.2
| Fixed filter (error when selecting "All")

**1.0.9**
---------
| Removed deprecated calls and configuration (TYPO3 7.6)
| Introduced error handling if jobs are not available anymore
| Email subject (applications) can now be changed

**1.0.8**
---------
| Added field for www to contacts
| Added possibility to set publish and expiration date in frontend
| Some code clean up and minor changes

**1.0.7**
---------
| Possibility to activate admin notification on job creation in frontend
| Added FAQ on how to add items to the select lists
| Option to add CC and BCC to application notification
| Added FAQ on how to add file types for application upload

**1.0.6**
---------
| Minor changes to template (partial Job\Show\Contact.html) and documentation
| Fixed TCA preventing editing jobs in TYPO3 7

**1.0.5**
---------
| Updated documentation
| Fixed templates to avoid wrong links due to missing pageUID value
| Finally, translation works using the translation server
| Language labels in emails can now be overwritten by TypoScript (new template file)
| Email template can now be changed using templateRootPaths
| Job information can now be used in application email

**1.0.4**
---------
| Added "More jobs" link to latest view

**1.0.3**
---------
| Added latest view
| Added option to link to different pages (split detail and list view)

**1.0.2**
---------
| Fixed error in filter function - see Forge #68101
| Migrated flash messages to new coding guidlines (incl. CSS and templates)
| Splitted CSS for flash messages into new template file (see include static)
| Fixed application system (emails)
| Removed backend module (use list module from now on)
| Added documentation on how to add feeds

**1.0.1**
---------
| Security fix - please update!

**1.0.0**
---------
| Bumbed to stable to be able to use the translation server
| Added german translation for the backend

**0.1.3**
---------
| Tested compatibility with TYPO3 7.0
| Added RSS and Atom feed (not yet documented)

**0.1.2**
---------
| Added image for contacts
| Sorting enabled for filters
| Fix preselection
| Preselection is done using select boxes
| Add CSS class/id for table header and buttons
| Make divider configurable

**0.1.1**
---------
| Added manual sorting in Backend
| Added option to set ordering and sorting of the list view

**0.1.0**
---------
| Added image for jobs
| Continued with manual (esp. configuration)
| Removed duplicate setting for email address and name

**0.0.8**
---------
| Added missing filter
| Starting with a manual
| Moved TCA from ext_tables php to Configuration/TCA

**0.0.7**
---------
| Add option to hide empty fields in show view
| Task #60625 - Add RealURL example to the manual
| Feature #60597 - Edit jobs in frontend
| Feature #60596 - Add jobs in frontend
| Refactor flash messaging

**0.0.6**
---------
| Add email templates
| Add option to preselect filter (with categories only)
| Removed deprecated functions

**0.0.5**
---------
| Fix typo in language xml file which broke configuration

**0.0.4**
---------
| Add attachments to applications
| Add possibility to hide apllication link

**0.0.3**
---------
| Replace hard coded labels
| Add german language for the frontend
| Filter can now be hidden
| Filter fields can be selected

**0.0.2**
---------
| Fixed bug #60371
| Added feature #60442 for preliminary testing

**0.0.1**
---------
| Initial Release