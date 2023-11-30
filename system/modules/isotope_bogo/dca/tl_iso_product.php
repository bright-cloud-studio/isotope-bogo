<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

 /* Extend the tl_user palettes */
 $GLOBALS['TL_DCA']['tl_iso_product']['palettes']['default'] = str_replace('{publish_legend}', '{bogo_legend},bogo_buy_total,bogo_get_total;{publish_legend}', $GLOBALS['TL_DCA']['tl_iso_product']['palettes']['default']);


/* Add fields to tl_iso_product */
$GLOBALS['TL_DCA']['tl_iso_product']['fields']['bogo_buy_total'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_iso_product']['bogo_buy_total'],
  'inputType'               => 'text',
  'default'                 => '0',
  'search'                  => true,
  'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_iso_product']['fields']['bogo_get_total'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_iso_product']['bogo_get_total'],
  'inputType'               => 'text',
  'default'                 => '0',
  'search'                  => true,
  'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''",
);

?>
