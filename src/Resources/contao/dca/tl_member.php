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
 * Modify email field for members
 */
if (array_key_exists("checkedEmailForMembers", $GLOBALS['TL_CONFIG']) && $GLOBALS['TL_CONFIG']['checkedEmailForMembers'])
{
	$GLOBALS['TL_DCA']['tl_member']['fields']['email']['inputType'] = "checkedEmail";
	$GLOBALS['TL_DCA']['tl_member']['fields']['email']['eval']['tl_class'] = "clr checkedEmail";
}

?>