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
 * @copyright  Cliff Parnitzky 2012-2019
 * @author     Cliff Parnitzky
 * @package    CheckedEmail
 * @license    LGPL
 * @filesource FormPassword.php
 */

namespace CliffParnitzky;

use Contao\Config;
use Contao\StringUtil;
use Contao\Widget;

/**
 * Class FormCheckedEmail
 *
 * Form field "checkedEmail".
 * @copyright  Cliff Parnitzky 2012-2019
 * @author     Cliff Parnitzky
 * @package    Forms
 */
class FormCheckedEmail extends Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Add a for attribute
	 *
	 * @var boolean
	 */
	protected $blnForAttribute = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_checkedEmail';

	/**
	 * The CSS class prefix
	 *
	 * @var string
	 */
	protected $strPrefix = 'widget widget-text widget-checked-email'; 

	/**
	 * Always decode entities
	 * @param array
	 */
	public function __construct($arrAttributes=false)
	{
		parent::__construct($arrAttributes);
		$this->decodeEntities = true;
		$this->rgxp = 'email';
	}

	/**
	 * Add specific attributes
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'maxlength':
				if ($varValue > 0)
				{
					$this->arrAttributes['maxlength'] = $varValue;
				}
				break; 
			
			case 'mandatory':
				if ($varValue)
				{
					$this->arrAttributes['required'] = 'required';
				}
				else
				{
					unset($this->arrAttributes['required']);
				}
				parent::__set($strKey, $varValue);
				break; 
			
			case 'placeholder':
				$this->arrAttributes['placeholder'] = $varValue;
				break;
			
			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}

	/**
	 * Validate input and set value
	 * @param mixed
	 * @return string
	 */
	protected function validator($varInput)
	{
		$this->blnSubmitInput = false;
		
		if (!strlen($varInput) && (strlen($this->varValue) || !$this->mandatory))
		{
			return '';
		}
		
		if ($varInput != $this->getPost($this->strName . '_confirm'))
		{
			$this->addError($GLOBALS['TL_LANG']['ERR']['CheckedEmailError']);
		}

		$varInput = $this->idnaEncodeEmail($varInput);
		$varInput = parent::validator($varInput);

		if (!$this->hasErrors())
		{
			$this->blnSubmitInput = true;
			
		}

		return $varInput;
	}
	
	/**
	 * Parse the template file and return it as string
	 *
	 * @param array $arrAttributes An optional attributes array
	 *
	 * @return string The template markup
	 */
	public function parse($arrAttributes=null)
	{
		$this->confirmLabel = sprintf($GLOBALS['TL_LANG']['MSC']['CheckedEmailConfirmation'], $this->strLabel);

		return parent::parse($arrAttributes);
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
			'<input type="email" name="%s" id="ctrl_%s" class="tl_text%s" value="%s"%s onfocus="Backend.getScrollOffset()">%s%s',
			$this->strName,
			$this->strId,
			($this->strClass ? ' ' . $this->strClass : ''),
			StringUtil::specialchars($this->value),
			$this->getAttributes(),
			$this->wizard,
			(($this->description && Config::get('showHelp') && !$this->hasErrors()) ? "\n  " . '<p class="tl_help tl_tip">' . $this->description . '</p>' : '')
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
	public function generateConfirmation()
	{
		// Hide the Punycode format (see #2750)
		$this->varValue = $this->idnaDecode($this->varValue);
		
		return sprintf(
			'<input type="email" name="%s_confirm" id="ctrl_%s_confirm" class="tl_text confirm%s" value="%s"%s onfocus="Backend.getScrollOffset()">%s',
			$this->strName,
			$this->strId,
			($this->strClass ? ' ' . $this->strClass : ''),
			(!$this->hasErrors()) ? StringUtil::specialchars($this->value) : '',
			$this->getAttributes(),
			((isset($GLOBALS['TL_LANG']['tl_member']['email_confirm'][1]) && Config::get('showHelp')) ? "\n  " . '<p class="tl_help tl_tip">' . $GLOBALS['TL_LANG']['tl_member']['email_confirm'][1] . '</p>' : '')
		);
	}
}

?>