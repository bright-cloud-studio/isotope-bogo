<?php

namespace Bcs\Backend;

use Isotope\Interfaces\IsotopeProductCollection;

use Isotope\Model\ProductCollection;
use Bcs\Model\MySurchargeModel;

class MySurcharge
{
    public function findSurchargesForCollection(IsotopeProductCollection $collection): array
    {
        
        // the total amount to discount from our cart
        $free_discount = 0;
        
        
        foreach($collection->getItems() as $oItem) {
            //echo "Quantity: " . $oItem->quantity . '<br>';
            //echo "Quantity (Free): " . $oItem->quantity_free . '<br>';
            //echo 'Price: ' . $oItem->price;
            
            $free_discount += $oItem->price * $oItem->quantity_free;
        }
        
        
        $bogo = new MySurchargeModel;
        
        $bogo->label = "Two Free!";
        $bogo->total_price = $free_discount * (-1);
        $bogo->tax_class = 1;
        $bogo->before_tax = true;
        $bogo->addToTotal = true;
        
        return [$bogo];
    }
}
