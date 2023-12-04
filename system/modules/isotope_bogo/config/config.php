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
\Isotope\Model\ProductCollectionSurcharge::registerModelType('bogo_surcharge', 'Bcs\Model\BogoSurchargeModel');

/**
 * Attributes
 */
\Isotope\Model\Attribute::registerModelType('bogo_settings', 'Bcs\Model\Attribute\BogoSettings');


/* Isotope Hooks */
//$GLOBALS['ISO_HOOKS']['addProductToCollection'][]         = array('Bcs\Backend\IsotopeBOGO', 'addItemToCollection');
$GLOBALS['ISO_HOOKS']['postAddProductToCollection'][]     = array('Bcs\Backend\IsotopeBOGO', 'postAddItemToCollection');
$GLOBALS['ISO_HOOKS']['postUpdateItemInCollection'][]         = array('Bcs\Backend\IsotopeBOGO', 'postUpdateItemInCollection');
$GLOBALS['ISO_HOOKS']['copiedCollectionItems'][]          = array('Bcs\Backend\IsotopeBOGO', 'mergeWithGuestCollection');

// Calculate Price
$GLOBALS['ISO_HOOKS']['findSurchargesForCollection'][]    = array('Bcs\Backend\BogoSurcharge', 'findSurchargesForCollection');
