<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

namespace Bcs\Backend;

use Contao\System;
use Isotope\Interfaces\IsotopeProductCollection;
use Isotope\Message;
use Isotope\Model\Config;
use Isotope\Model\Product;
use Isotope\Model\ProductCollection;
use Isotope\Model\ProductCollection\Cart;
use Isotope\Model\ProductCollection\Order;

class IsotopeBOGO extends System {

    
    /* HOOK - Triggered when trying to add a product to the cart on a Product Reader page */
    // RETURN PRODUCT QUANTITY
    public function addItemToCollection( Product $objProduct, $intQuantity, IsotopeProductCollection $objCollection ){
        
        // System Log Message
        \Controller::log('BOGO: checkCollectionQuantity Triggered', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
        return $intQuantity;
    }
    
    /* HOOK - Triggered when trying to update our quantity on a Cart page */
    public function updateItemInCollection($objItem, $arrSet, $objCart) {

        // System Log Message
        \Controller::log('BOGO: updateCollectionQuantity Triggered', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
        return $arrSet;
    }
    
    /* HOOK - Triggered when two carts have merged together (when a guest logs in while having items in their cart, while their account already had a cart attached to it */
    public function mergeWithGuestCollection(IsotopeProductCollection $oldCollection, IsotopeProductCollection $newCollection)
    {
        // System Log Message
        \Controller::log('BOGO: mergeCollections Triggered', __CLASS__ . '::' . __FUNCTION__, 'GENERAL'); 
        
        return true;
    }

    
    public function calculatePriceHook($fltPrice, $objSource, $strField, $intTaxClass, $arrOptions)
	{
		if ( !($objSource instanceof IsotopePrice) ||  
		     ($strField != 'price' && $strField != 'low_price') ||
		     !is_array($arrOptions) ||
		     !$arrOptions['gift_amount']
        )
		{
			return $fltPrice;
		}
		
        $fltPrice = 12345;
		return $fltPrice;
	}





    
  
}
