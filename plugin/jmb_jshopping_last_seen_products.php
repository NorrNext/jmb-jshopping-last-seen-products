<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Denis Ryabov and Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2014 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die;

/**
 * Plugin's base class
 *
 * @package  Jmb_JShopping_Last_Seen_Products
 * @since    1.0
 */
class PlgJshoppingproductsJmb_Jshopping_Last_Seen_Products extends JPlugin
{
	/**
	 * Method to store last seen products
	 *
	 * @param   object  &$product  JoomShopping product
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterDisplayProduct(&$product)
	{
		$product_id = (int) $product->product_id;

		$lastSeenProduct                      = new stdClass;
		$lastSeenProduct->name                = $product->name;
		$lastSeenProduct->product_id          = $product->product_id;
		$lastSeenProduct->image               = $product->image;
		$lastSeenProduct->link                = $_SERVER['REQUEST_URI'];
		$lastSeenProduct->price               = $product->product_price;
		$lastSeenProduct->oldPrice            = $product->product_old_price;
		$lastSeenProduct->currencyId          = $product->currency_id;
		$lastSeenProduct->labelImage          = $product->_label_image;
		$lastSeenProduct->labelName           = $product->_label_name;

		$db = JFactory::getDbo();

		$query = "INSERT INTO #__jmb_jshopping_last_seen_products (`product_id`, `time`, `data`)"
			. " VALUES ($product_id, NOW(), " . $db->quote(json_encode($lastSeenProduct)) . ")"
			. " ON DUPLICATE KEY UPDATE `time` = VALUES(`time`), `data` = VALUES(`data`)";

		$db->setQuery($query);
		$db->execute();
	}
}
