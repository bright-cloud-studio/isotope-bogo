<?php

/*
 * Bright Cloud Studio's Isotope BOGO
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-bogo
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
*/

// Palettes
$GLOBALS['TL_DCA']['tl_iso_attribute']['palettes']['bogo_settings'] = '{attribute_legend},name,field_name,type,legend;{bogo_legend},bogo_buy,bogo_get;';

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
