<?php

namespace Bcs\Model;

use Isotope\Interfaces\IsotopeProductCollectionSurcharge;
use Isotope\Model\ProductCollectionSurcharge;

class BogoSurchargeModel extends ProductCollectionSurcharge implements IsotopeProductCollectionSurcharge
{
    public static function build(): self
    {
        // These are the default values of our custom surcharge and will be manually applied when the time is right
        $surcharge = new self();
        $surcharge->label = 'My Surcharge';
        $surcharge->price = '';
        $surcharge->total_price = -5.0;
        $surcharge->tax_class = 1;
        $surcharge->before_tax = true;
        $surcharge->addToTotal = true;

        return $surcharge;
    }
}
