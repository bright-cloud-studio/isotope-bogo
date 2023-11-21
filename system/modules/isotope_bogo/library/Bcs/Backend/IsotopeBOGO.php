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
use Isotope\Isotope;
use Isotope\Interfaces\IsotopeProductCollection;
use Isotope\Message;
use Isotope\Model\Config;
use Isotope\Model\Product;
use Isotope\Model\ProductCollection;
use Isotope\Model\ProductCollectionItem;
use Isotope\Model\ProductCollection\Cart;
use Isotope\Model\ProductCollection\Order;




class IsotopeBOGO extends System {
    
    public $tick = 0;
    
    /* HOOK - Triggered when trying to add a product to the cart on a Product Reader page */
    // RETURN PRODUCT QUANTITY
    public function addItemToCollection( Product $objProduct, $intQuantity, IsotopeProductCollection $objCollection ){
        
        // System Log Message
        \Controller::log('BOGO: checkCollectionQuantity Triggered', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
    
        // insert custom rule into database to discount the total of the cart
        
        
        return $intQuantity;
    }



    public function postAddItemToCollection(ProductCollectionItem &$item, int $quantity, ProductCollection $collection){
        
        // System Log Message
        \Controller::log('BOGO: postAddItemToCollection Triggered', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');

        $free_count = $item->quantity / 2;
        
        $item->quantity_free = $free_count;
        $item->quantity += $free_count;
        
        $item->save();
        
        // insert custom rule into the database to discount the total of the cart

    }



    
    
    
    /* HOOK - Triggered when trying to update our quantity on a Cart page */
    public function updateItemInCollection($objItem, $arrSet, $objCart) {

        // System Log Message
        \Controller::log('BOGO: updateCollectionQuantity Triggered', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
        $free_count = $objItem->quantity / 2;
        
        $objItem->quantity_free = $free_count;
        $objItem->quantity += $free_count;
        
        return $arrSet;
        
        // insert custom rule into the database to discount hte total of the cart
        
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
	    // I dont think I need this hook anymore, going to do everything when the quantities are adjusted above
		return $fltPrice;
		    
	}





    
  
}
