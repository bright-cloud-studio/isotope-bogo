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

use Isotope\Interfaces\IsotopeOrderableCollection;




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
        
        // Get our product, get our 'bogo_settings' values
        $prod = Product::findBy('sku', $item->sku);
        if(isset($prod->bogo_settings)) {
            
            // split our comma separates values to find out how many we buy to get how many for free
            $bogo_settings = explode(",", $prod->bogo_settings);
            
    	    // (how many we bought divided by how many we need to buy to trigger bogo, rounded down) times how many we get for free when bogo is triggered
    	    $quantity_free = floor($quantity / $bogo_settings[0]) * $bogo_settings[1];
    	    
    	    // Apply our values to the item and save it
    	    $item->quantity_free = $quantity_free;
            $item->quantity += $quantity_free;
            $item->save();
            
        }
        
        
        // STEP TWO
        // Do the maths based on our setting
        
        // STEP THREE
        // Determine what our new total is and our free count, save the settings

        

        /*
        $free_count = $item->quantity / 2;
        $item->quantity_free = $free_count;
        $item->quantity += $free_count;
        $item->save();
        */
        
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
    
  
}
