<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package CheckedEmail
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'FormCheckedEmail' => 'system/modules/CheckedEmail/FormCheckedEmail.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'form_checkedEmail' => 'system/modules/CheckedEmail/templates',
));
