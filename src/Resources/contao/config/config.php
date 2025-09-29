<?php

/**
 * Contao Open Source CMS
 * Copyright (C)  2005-2025 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2012-2025
 * @author     Cliff Parnitzky
 * @package    CheckedEmail
 * @license    LGPL
 */

use Contao\System;

/**
 * Back end form fields
 */
$GLOBALS['BE_FFL']['checkedEmail'] = 'TextField';

$request = System::getContainer()->get('request_stack')->getCurrentRequest();

if (array_key_exists("checkedEmailForMembers", $GLOBALS['TL_CONFIG']) && 
	  $GLOBALS['TL_CONFIG']['checkedEmailForMembers'] && 
	  ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)))
{
  $GLOBALS['BE_FFL']['checkedEmail']        = 'CliffParnitzky\CheckedEmail';
  $GLOBALS['TL_JAVASCRIPT']['checkedEmail'] = 'bundles/cliffparnitzkyformcheckedemail/checkedEmail.js';
}

/**
 * Front end form fields
 */
$GLOBALS['TL_FFL']['checkedEmail'] = 'CliffParnitzky\FormCheckedEmail';

?>
