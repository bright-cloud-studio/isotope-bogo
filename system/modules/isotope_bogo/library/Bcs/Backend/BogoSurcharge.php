<?php

namespace Bcs\Backend;

use Isotope\Interfaces\IsotopeProductCollection;
use Isotope\Model\ProductCollection;
use Bcs\Model\BogoSurchargeModel;

class BogoSurcharge
{
    public function findSurchargesForCollection(IsotopeProductCollection $collection): array
    {
        
        // Array to store all of our surcharges
        $surcharges = [];
        
        // Loop through each product in our cart
        foreach($collection->getItems() as $prod) {
            
            // If this product has a free quantity attached to it
            if($prod->quantity_free > 0) {
                
                // Create a new Bogo Surcharge
                $bogo = new BogoSurchargeModel;
                
                // our discount total is the product's price times the amount of free items
                $free_discount += $prod->price * $prod->quantity_free;
                
                // Build the product name as 'NAME (SKU)'
                $name = $prod->name . ' (' . $prod->sku . ')';
                // Build the surcharge's label
                $bogo->label = '(' . $prod->quantity_free . ') FREE ' . $name;
                // Make our total price negative as it takes away from the total
                $bogo->total_price = $free_discount * (-1);
                // Set some default values
                $bogo->tax_class = 1;
                $bogo->before_tax = true;
                $bogo->addToTotal = true;
                // Add this surcharge to our list of surcharges
                $surcharges[] = $bogo;
            }
            
        }
        
        // Return all of our assembled surcharges
        return $surcharges;
    }
}
