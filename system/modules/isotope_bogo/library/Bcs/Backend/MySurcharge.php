<?php

namespace Bcs\Backend;

use Isotope\Model\ProductCollection;

class MySurcharge
{
    public function findSurchargesForCollection(ProductCollection $collection): array
    {
        return [\MySurchargeModel::build()];
    }
}
