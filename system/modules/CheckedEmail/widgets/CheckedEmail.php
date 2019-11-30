<?php

/**
 * Contao Open Source CMS
 * Copyright (C)  2005-2016 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2012-2016
 * @author     Cliff Parnitzky
 * @package    CheckedEmail
 * @license    LGPL
 * @filesource FormPassword.php
 */

/**
 * Class FormCheckedEmail
 *
 * Form field "checkedEmail".
 * @copyright  Cliff Parnitzky 2012-2016
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

	/**
	 * Generate the widget and return it as string
	 *
	 * @return string
	 */
	public function generate()
	{
		// Hide the Punycode format (see #2750)
		$this->varValue = $this->idnaDecode($this->varValue);
		
		return sprintf(
			'<input type="email" name="%s" id="ctrl_%s" class="text%s" value="%s"%s%s',
			$this->strName,
			$this->strId,
			($this->strClass ? ' ' . $this->strClass : ''),
			StringUtil::specialchars($this->value),
			$this->getAttributes(),
			$this->strTagEnding
		);
	}

	/**
	 * Generate the label of the confirmation field and return it as string
	 *
	 * @return string
	 */
	public function generateConfirmationLabel()
	{
		return sprintf(
			'<label for="ctrl_%s_confirm" class="confirm%s">%s%s%s</label>',
			$this->strId,
			($this->strClass ? ' ' . $this->strClass : ''),
			($this->mandatory ? '<span class="invisible">' . $GLOBALS['TL_LANG']['MSC']['mandatory'] . ' </span>' : ''),
			sprintf($GLOBALS['TL_LANG']['MSC']['CheckedEmailConfirmation'], $this->strLabel),
			($this->mandatory ? '<span class="mandatory">*</span>' : '')
		);
	}

	/**
	 * Generate the widget and return it as string
	 *
	 * @return string
	 */
	/*public function generateConfirmation()
	{
		return sprintf(
			'<input type="text" autocomplete="off" name="%s_confirm" id="ctrl_%s_confirm" class="tl_text confirm%s" value="%s"%s onfocus="Backend.getScrollOffset()">%s',
			$this->strName,
			$this->strId,
			($this->strClass ? ' ' . $this->strClass : ''),
			(($this->varValue != '') ? '*****' : ''),
			$this->getAttributes(),
			((isset($GLOBALS['TL_LANG']['MSC']['confirm'][1]) && Config::get('showHelp')) ? "\n  " . '<p class="tl_help tl_tip">' . $GLOBALS['TL_LANG']['MSC']['confirm'][1] . '</p>' : '')
		);
	}*/
}

?>