<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Denis Ryabov and Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2014 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die();

/**
 * Module's helper class
 *
 * @package  Jmb_JShopping_Last_Seen_Products
 * @since    1.0
 */
abstract class ModJmbJShoppingLastSeenProducts
{
	/**
	 * Method to get last seen products
	 *
	 * @param   JRegistry  &$params  Module parameters
	 *
	 * @return  array  Last seen products
	 */
	public static function getLastSeenProducts(&$params)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select('currency_id, currency_value')
			->from($db->quoteName('#__jshopping_currencies'))
			->where('currency_publish = 1');

		$db->setQuery($query);
		$allCurrencies = $db->loadObjectList();

		$currencies = array();

		foreach ($allCurrencies as $v)
		{
			$currencies[$v->currency_id] = $v->currency_value;
		}

		$query->clear();

		$query->select('data')
			->from($db->quoteName('#__jmb_jshopping_last_seen_products'))
			->order('time DESC');

		$db->setQuery($query, 0, $params->get('products_count', 5));
		$lastSeenProducts = $db->loadObjectList();

		$products = array();

		if ($lastSeenProducts)
		{
			foreach ($lastSeenProducts as $product)
			{
				$products[] = json_decode($product->data);
			}

			$count = count($products);

			$session = JFactory::getSession();
			$sessionCurrencyId = $session->get('js_id_currency');

			for ($i = 0; $i < $count; $i++)
			{
				$productCurrency = $currencies[$products[$i]->currencyId];

				if (!$productCurrency)
				{
					$productCurrency = 1;
				}

				$products[$i]->priceCurrency    = $products[$i]->price * $currencies[$sessionCurrencyId] / $productCurrency;
				$products[$i]->oldPriceCurrency = $products[$i]->oldPrice * $currencies[$sessionCurrencyId] / $productCurrency;
			}
		}

		return $products;
	}
}