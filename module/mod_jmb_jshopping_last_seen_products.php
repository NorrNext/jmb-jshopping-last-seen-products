<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Denis Ryabov and Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2015 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die;

if (!file_exists(JPATH_SITE . '/components/com_jshopping/jshopping.php'))
{
	throw new Exception('Please install JoomShopping', 500);
}

require_once JPATH_SITE . '/components/com_jshopping/lib/factory.php';
require_once JPATH_SITE . '/components/com_jshopping/lib/functions.php';
require_once __DIR__ . '/helper.php';

$jshopConfig = JSFactory::getConfig();
$jshopConfig->cur_lang = $jshopConfig->frontend_lang;

JSFactory::loadLanguageFile();

$products           = ModJmbJShoppingLastSeenProducts::getLastSeenProducts($params);
$moduleclass_sfx    = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_jmb_jshopping_last_seen_products');
