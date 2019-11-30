<?php

/**
 * Contao Open Source CMS
 * Copyright (C)  2005-2019 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2019-2019
 * @author     Cliff Parnitzky
 * @package    CheckedEmail
 * @license    LGPL
 * @filesource Password.php
 */

namespace CliffParnitzky;

use CliffParnitzky\FormCheckdEmail;

/**
 * Class FormCheckedEmail
 *
 * Form field "checkedEmail".
 * @copyright  Cliff Parnitzky 2019-2019
 * @author     Cliff Parnitzky
 * @package    Widget
 */
class CheckedEmail extends FormCheckdEmail
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget_checkedEmail';

	/**
	 * Always use raw request data.
	 *
	 * @param array $arrAttributes
	 */
	public function __construct($arrAttributes=null)
	{
		parent::__construct($arrAttributes);
	}
}

?>