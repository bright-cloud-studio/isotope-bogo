<?php

use Isotope\Interfaces\IsotopeProductCollectionSurcharge;
use Isotope\Model\ProductCollectionSurcharge;

class CustomSurchargeModel extends ProductCollectionSurcharge implements IsotopeProductCollectionSurcharge
{
    public static function build(): self
    {
        $surcharge = new self();
        $surcharge->label = 'My Surcharge';
        $surcharge->price = '';
        $surcharge->total_price = 100.0;
        $surcharge->tax_class = 1;
        $surcharge->before_tax = true;
        $surcharge->addToTotal = true;

        return $surcharge;
    }
}
