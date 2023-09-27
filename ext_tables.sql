#
# Table structure for table 'tx_jobfair_domain_model_job'
#
CREATE TABLE tx_jobfair_domain_model_job (
	job_title varchar(255) DEFAULT '' NOT NULL,
	slug varchar(2048),
  job_image varchar(255) DEFAULT '' NOT NULL,
	employer varchar(255) DEFAULT '' NOT NULL,
	employer_description text NOT NULL,
	location varchar(255) DEFAULT '' NOT NULL,
	short_job_description text NOT NULL,
	job_description text NOT NULL,
	experience varchar(255) DEFAULT '' NOT NULL,
	job_requirements text NOT NULL,
	job_benefits text NOT NULL,
	apply_information text NOT NULL,
	salary varchar(255) DEFAULT '' NOT NULL,
	job_type int(11) DEFAULT '0' NOT NULL,
	contract_type int(11) DEFAULT '0' NOT NULL,
	region int(11) unsigned DEFAULT '0' NOT NULL,
	contact int(11) unsigned DEFAULT '0',
	sector int(11) unsigned DEFAULT '0' NOT NULL,
	category int(11) unsigned DEFAULT '0' NOT NULL,
	discipline int(11) unsigned DEFAULT '0' NOT NULL,
	education int(11) unsigned DEFAULT '0' NOT NULL,
	feuser int(11) unsigned DEFAULT '0' NOT NULL,
	application int(11) unsigned DEFAULT '0' NOT NULL,
	internal_notes text,
);

#
# Table structure for table 'tx_jobfair_domain_model_contact'
#
CREATE TABLE tx_jobfair_domain_model_contact (
	name varchar(255) DEFAULT '' NOT NULL,
	address text NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	www varchar(255) DEFAULT '' NOT NULL,
  contact_image varchar(255) DEFAULT '' NOT NULL,
	name_cc varchar(255) DEFAULT '' NOT NULL,
	email_cc varchar(255) DEFAULT '' NOT NULL,
	name_bcc varchar(255) DEFAULT '' NOT NULL,
	email_bcc varchar(255) DEFAULT '' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_jobfair_domain_model_region'
#
CREATE TABLE tx_jobfair_domain_model_region (
	name varchar(255) DEFAULT '' NOT NULL,
	jobs int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_jobfair_domain_model_sector'
#
CREATE TABLE tx_jobfair_domain_model_sector (
	name varchar(255) DEFAULT '' NOT NULL,
	jobs int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_jobfair_domain_model_category'
#
CREATE TABLE tx_jobfair_domain_model_category (
	name varchar(255) DEFAULT '' NOT NULL,
	jobs int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_jobfair_domain_model_discipline'
#
CREATE TABLE tx_jobfair_domain_model_discipline (
	name varchar(255) DEFAULT '' NOT NULL,
	jobs int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_jobfair_domain_model_education'
#
CREATE TABLE tx_jobfair_domain_model_education (
	name varchar(255) DEFAULT '' NOT NULL,
	jobs int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_jobfair_domain_model_application'
#
CREATE TABLE tx_jobfair_domain_model_application (
	title varchar(255) DEFAULT '' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
  message text NOT NULL,
	attachment varchar(255) DEFAULT '' NOT NULL,
	jobs int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	jobs int(11) unsigned DEFAULT '0' NOT NULL,
	tx_extbase_type varchar(255) DEFAULT '' NOT NULL
);

#
# Table structure for table 'tx_jobfair_job_region_mm'
#
CREATE TABLE tx_jobfair_job_region_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_jobfair_job_sector_mm'
#
CREATE TABLE tx_jobfair_job_sector_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_jobfair_job_category_mm'
#
CREATE TABLE tx_jobfair_job_category_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_jobfair_job_discipline_mm'
#
CREATE TABLE tx_jobfair_job_discipline_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_jobfair_job_education_mm'
#
CREATE TABLE tx_jobfair_job_education_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_jobfair_job_user_mm'
#
CREATE TABLE tx_jobfair_job_user_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_jobfair_job_application_mm'
#
CREATE TABLE tx_jobfair_job_application_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
