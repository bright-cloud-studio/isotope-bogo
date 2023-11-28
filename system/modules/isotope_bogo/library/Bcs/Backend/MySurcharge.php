<?php

namespace Bcs\Backend;

use Isotope\Model\ProductCollection;
use Bcs\Model;

class MySurcharge
{
    public function findSurchargesForCollection(ProductCollection $collection): array
    {
        return [MySurchargeModel::build()];
    }
}
