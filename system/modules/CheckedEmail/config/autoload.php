<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Forms
	'FormCheckedEmail' => 'system/modules/CheckedEmail/forms/FormCheckedEmail.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'form_checkedEmail' => 'system/modules/CheckedEmail/templates/forms',
));
