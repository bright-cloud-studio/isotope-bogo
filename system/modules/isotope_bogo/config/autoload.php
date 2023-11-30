<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

/* Register Classes */
ClassLoader::addClasses(array
(
    // Class that contains all of our functionality for the Isotope Hooks
    'Bcs\Backend\IsotopeBOGO'         => 'system/modules/isotope_bogo/library/Bcs/Backend/IsotopeBOGO.php',
    'Bcs\Model\BogoSurchargeModel'    => 'system/modules/isotope_bogo/library/Bcs/Model/BogoSurchargeModel.php',
    'Bcs\Model\Attribute\Bogo'        => 'system/modules/isotope_bogo/library/Bcs/Model/Attribute/Bogo.php'
));
