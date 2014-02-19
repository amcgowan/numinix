<?php
/**
 * @package Pages
 * @copyright Copyright 20010-2013 Numinix.com
 * @partial Copyright 2008-2010 RubikIntegration.com
 * @author numinix
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

/**
 * NOTE: You can use php files for both javascript and css.
 *
 * Global variables must be declared global as they are referenced inside the loader class
 *
 * They must be coded like so:
 * Javascript:
 * <script language="javascript" type="text/javascript">
 * <?php // php code goes here ?>
 * </script>
 *
 * CSS:
 * <style type="text/css">
 * <?php // php code goes here ?>
 * </style>
 */
$loaders[] = array(
	'conditions' => array(
		'pages' => array('index_home', 'products_new', 'featured_products', 'products_all', 'advanced_search_result'), // if you want to load on all pages, use 'pages' => array('*')  
	),
	// the "key" of this associate array is the "path" which is relative to the css or jscript folder
	// the "value" is the order the file should be loaded
	'jscript_files' => array(
		'//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' => 1,
		'mcgowan.js' => 2
	)
);
