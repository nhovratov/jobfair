<?php

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Job Fair',
	'description' => 'Simple job market based on Extbase and Fluid. Basically works like dmmjobcontrol. There are list and detail views available. In addition, it is possible to set up an online application system. Furthermore, FE-Users can be enabled to add and edit jobs in the frontend, so to BE-Administration is required. Feeds (Rss091, Rss2, Atom) are also available',
	'category' => 'plugin',
	'version' => '2.0.1',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => 'uploads/tx_jobfair/',
	'clearcacheonload' => false,
	'author' => 'Dan',
	'author_email' => 'typo3dev@outlook.com',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'extbase' => '7.6.0-8.9.99',
			'fluid' => '7.6.0-8.9.99',
			'typo3' => '7.6.0-8.9.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

