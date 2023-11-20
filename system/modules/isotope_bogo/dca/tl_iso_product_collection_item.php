<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

/* Add fields to tl_iso_product */
$GLOBALS['TL_DCA']['tl_iso_product_collection_item']['fields']['quantity_free'] = array
(
  'sql'                   => "int(10) unsigned NOT NULL default '0'",
);

?>
