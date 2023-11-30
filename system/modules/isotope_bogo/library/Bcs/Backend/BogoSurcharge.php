<?php

namespace Bcs\Backend;

use Isotope\Interfaces\IsotopeProductCollection;

use Isotope\Model\ProductCollection;
use Bcs\Model\BogoSurchargeModel;

class BogoSurcharge
{
    public function findSurchargesForCollection(IsotopeProductCollection $collection): array
    {
        
        // the total amount to discount from our cart
        $free_discount = 0;
        
        foreach($collection->getItems() as $oItem) {
            $free_discount += $oItem->price * $oItem->quantity_free;
        }
        
        $bogo = new BogoSurchargeModel;
        
        $bogo->label = "Two Free!";
        $bogo->total_price = $free_discount * (-1);
        $bogo->tax_class = 1;
        $bogo->before_tax = true;
        $bogo->addToTotal = true;
        
        return [$bogo];
    }
}
