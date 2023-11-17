<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

/* Isotope Hooks */
$GLOBALS['ISO_HOOKS']['addProductToCollection'][] = array('Bcs\Backend\IsotopeBOGO', 'checkCollectionQuantity');
$GLOBALS['ISO_HOOKS']['updateItemInCollection'][] = array('Bcs\Backend\IsotopeBOGO', 'updateCollectionQuantity');
$GLOBALS['ISO_HOOKS']['copiedCollectionItems'][] = array('Bcs\Backend\IsotopeBOGO', 'mergeCollections');
