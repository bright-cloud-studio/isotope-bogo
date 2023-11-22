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

use Isotope\Model\ProductCollection;

class CustomSurcharge
{
    public function findSurchargesForCollection(ProductCollection $collection): array
    {
        return [\CustomSurchargeModel::build()];
    }
}
