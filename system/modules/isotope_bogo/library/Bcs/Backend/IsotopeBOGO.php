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
use Isotope\Interfaces\IsotopeOrderableCollection;
use Isotope\Interfaces\IsotopeProductCollection;
use Isotope\Isotope;
use Isotope\Message;
use Isotope\Model\Config;
use Isotope\Model\Product;
use Isotope\Model\ProductCollection;
use Isotope\Model\ProductCollectionItem;
use Isotope\Model\ProductCollection\Cart;
use Isotope\Model\ProductCollection\Order;

class IsotopeBOGO extends System {
    
    /* HOOK - When Products are added to the cart on a Product List page */
    public function postAddItemToCollection(ProductCollectionItem &$item, int $quantity, ProductCollection $collection){

        \Controller::log('BOGO: Hook 1', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
        // Get the actual product using our cart item's sku
        $prod = $objItem->getProduct();
        
        // If this product has the custom 'bogo_settings' attribute attached to it
        if(isset($prod->bogo_settings)) {
            
            // Break our comma separated value into two, [0] is how many to buy and [1] is how many you get for each [0]
            $bogo_settings = explode(",", $prod->bogo_settings);
            
    	    // Calculate how many we get for free
    	    $quantity_free = floor($quantity / $bogo_settings[0]) * $bogo_settings[1];
    	    
    	    // Apply the free quantity to our cart item
    	    $item->quantity_free = $quantity_free;
    	    // Update our quantity to include the free items
            $item->quantity += $quantity_free;
            // Save our cart item
            $item->save();
        }
        
    }
    
    
    /* HOOK - When a quantity is updated on a Cart page */
    public function updateItemInCollection($objItem, $arrSet, $objCart) {
        
        \Controller::log('BOGO: ' . $objItem->sku, __CLASS__ . '::' . __FUNCTION__, 'GENERAL');

        // Get the actual product of our cart item
        $product = $objItem->getProduct();

        // If this product has our 'bogo_settings" custom attribute applied to it
        if(isset($product->bogo_settings)) {

            // If our requested quantity is different from the current quantity
            if($objItem->quantity != $arrSet['quantity']) {
                
                // Break our comma separated value into two, [0] is how many to buy and [1] is how many you get for each [0]
                $bogo_settings = explode(",", $product->bogo_settings);
                
                // Calculate how many we get for free
    	       $quantity_free = floor($arrSet['quantity'] / $bogo_settings[0]) * $bogo_settings[1];

                // Apply our free quantity to the cart item
    	       $objItem->quantity_free = $quantity_free;
                // Apply the quantity to the cart item
    	       $objItem->quantity = $arrSet['quantity'] + $quantity_free;
                // Update the $arrSet to the new quantity
    	       $arrSet['quantity'] = $arrSet['quantity'] + $quantity_free;
                
            }
        }
        
        // Return the $arrSet after our manipulations
        return $arrSet;
    }

    
    /* HOOK - Triggered when two carts have merged together (when a guest logs in while having items in their cart, while their account already had a cart attached to it */
    public function mergeWithGuestCollection(IsotopeProductCollection $oldCollection, IsotopeProductCollection $newCollection)
    {
        // System Log Message
        \Controller::log('BOGO: Hook 4', __CLASS__ . '::' . __FUNCTION__, 'GENERAL'); 
        
        return true;
    }
    
  
}
