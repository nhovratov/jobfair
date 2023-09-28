[![TYPO3 compatibility](https://img.shields.io/badge/TYPO3-12.4%20%7C%2011.5-ff8700?maxAge=3600&logo=typo3)](https://get.typo3.org/)

# Jobfair

Simple job market based on Extbase and Fluid. Basically works like dmmjobcontrol. There are list and detail views available. In addition, it is possible to set up an online application system. Furthermore, FE-Users can be enabled to add and edit jobs in the frontend, so to BE-Administration is required. Feeds (Rss091, Rss2, Atom) are also available.

## Setup

For TYPO3 > v10 you need to add the E-Mail template paths to your AdditionalConfiguration.php or LocalConfiguration.php:

```
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'EXT:jobfair/Resources/Private/Templates/Email';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'EXT:jobfair/Resources/Private/Layouts';
```
