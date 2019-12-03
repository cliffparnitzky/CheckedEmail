<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2019 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'CliffParnitzky',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Forms
	'CliffParnitzky\FormCheckedEmail' => 'system/modules/CheckedEmail/forms/FormCheckedEmail.php',

	// Widgets                        
	'CliffParnitzky\CheckedEmail'     => 'system/modules/CheckedEmail/widgets/CheckedEmail.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_widget_checkedEmail' => 'system/modules/CheckedEmail/templates/backend',
	'form_checkedEmail'      => 'system/modules/CheckedEmail/templates/forms',
));
