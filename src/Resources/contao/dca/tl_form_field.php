<?php

/**
 * Contao Open Source CMS
 * Copyright (C)  2005-2023 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2012-2023
 * @author     Cliff Parnitzky
 * @package    CheckedEmail
 * @license    LGPL
 */

/**
 * Add a palette to tl_form_field
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkedEmail'] = '{type_legend},type,name,label,confirmLabel;{fconfig_legend},mandatory,placeholder;{expert_legend:hide},class,value,minlength,maxlength,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['confirmLabel'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['confirmLabel'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''"
);
