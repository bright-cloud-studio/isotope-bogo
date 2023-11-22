<?php

use Isotope\Model\ProductCollection;

class CustomSurcharge
{
    public function findSurchargesForCollection(ProductCollection $collection): array
    {
        return [\CustomSurchargeModel::build()];
    }
}
