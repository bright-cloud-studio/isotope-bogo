<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

 
 
/**
 * Load tl_iso_product language file for field legends
 */
\System::loadLanguageFile('tl_iso_product');


// Palettes
$GLOBALS['TL_DCA']['tl_iso_attribute']['palettes']['alternateAlias'] = '{bogo_legend},type,legend,bogo_buy,bogo_get;';

// Fields
$GLOBALS['TL_DCA']['tl_iso_attribute']['fields']['bogo_buy'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_iso_attribute']['bogo_buy'],
  'inputType'               => 'text',
  'default'                 => '0',
  'search'                  => true,
  'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''",
);
$GLOBALS['TL_DCA']['tl_iso_attribute']['fields']['bogo_get'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_iso_attribute']['bogo_get'],
  'inputType'               => 'text',
  'default'                 => '0',
  'search'                  => true,
  'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''",
);
