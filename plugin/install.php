<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2015 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die;

/**
 * Install script class.
 *
 * @package  Jmb_JShopping_Last_Seen_Products
 * @since    1.0
 */
class PlgJshoppingproductsJmb_Jshopping_Last_Seen_ProductsInstallerScript
{
	/**
	 * Method to run a database query after plugin installation
	 *
	 * @param   JAdapterInstance  $adapter  The class who calls this method
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function install(JAdapterInstance $adapter)
	{
		$db = $adapter->getParent()->getDbo();

		$query = 'CREATE TABLE IF NOT EXISTS `#__jmb_jshopping_last_seen_products` (
		  `product_id` int(10) unsigned NOT NULL,
		  `time` datetime NOT NULL,
		  `data` text NOT NULL,
		  PRIMARY KEY (`product_id`),
		  KEY `time` (`time`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;';

		$db->setQuery($query);
		$db->execute();
	}

	/**
	 * Method to run a database query after plugin uninstall
	 *
	 * @param   JAdapterInstance  $adapter  The class who calls this method
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function uninstall(JAdapterInstance $adapter)
	{
		$db = $adapter->getParent()->getDbo();

		$query = 'DROP TABLE IF EXISTS `#__jmb_jshopping_last_seen_products`';

		$db->setQuery($query);
		$db->execute();
	}
}
