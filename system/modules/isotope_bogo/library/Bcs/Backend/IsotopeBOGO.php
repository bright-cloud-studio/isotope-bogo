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
    public function checkCollectionQuantity( Product $objProduct, $intQuantity, IsotopeProductCollection $objCollection ){
        
        // Reset our message log so we don't get stacking errors every time
        Message::reset();
        
        // None of our conditions hit, move on
        return false;
    }
    
    
    /* HOOK - Triggered when trying to update our quantity on a Cart page */
    public function updateCollectionQuantity($objItem, $arrSet, $objCart) {
        
        // Return our modified set
        return $arrSet;
    }

    
    /* HOOK - Triggered when two carts have merged together (when a guest logs in while having items in their cart, while their account already had a cart attached to it */
    public function mergeCollections(IsotopeProductCollection $oldCollection, IsotopeProductCollection $newCollection)
    {
      
    }
  
}