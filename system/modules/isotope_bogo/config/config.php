<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/


/**
 * Register Isotope model types
 */
\Isotope\Model\ProductCollectionSurcharge::registerModelType('mysurcharge', \CustomSurchageModel::class);



/* Isotope Hooks */
$GLOBALS['ISO_HOOKS']['addProductToCollection'][]         = array('Bcs\Backend\IsotopeBOGO', 'addItemToCollection');
$GLOBALS['ISO_HOOKS']['postAddProductToCollection'][]     = array('Bcs\Backend\IsotopeBOGO', 'postAddItemToCollection');
$GLOBALS['ISO_HOOKS']['updateItemInCollection'][]         = array('Bcs\Backend\IsotopeBOGO', 'updateItemInCollection');
$GLOBALS['ISO_HOOKS']['copiedCollectionItems'][]          = array('Bcs\Backend\IsotopeBOGO', 'mergeWithGuestCollection');

// Calculate Price
//$GLOBALS['ISO_HOOKS']['findSurchargesForCollection'][]    = array('Bcs\Backend\IsotopeBOGO', 'findSurchargesForCollection');
$GLOBALS['ISO_HOOKS']['findSurchargesForCollection'][] = [\CustomSurcharge::class, 'findSurchargesForCollection'];
