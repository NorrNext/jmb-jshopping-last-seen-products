<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Denis Ryabov and Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2014 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die;

if (!empty($products)) : ?>
	<div class="jshop last_seen_products<?php echo $moduleclass_sfx; ?>">
		<?php $style = 'padding: 5px;';

		if ($params->get('module_style', 1))
		{
			$style = 'float: left; padding: 5px;';
		}

		foreach ($products as $product) : ?>
			<div class="block_item" style="<?php echo $style; ?>">
				<?php if ($params->get('show_image', 1)) : ?>
					<div class="item_image">
						<?php if ($product->labelImage) : ?>
							<div class="product_label">
								<img src="<?php echo $product->labelImage ?>" alt="<?php echo $product->labelName ?>"/>
							</div>
						<?php endif; ?>
						<a href="<?php echo $product->link ?>">
							<img src="<?php echo $jshopConfig->image_product_live_path ?>/<?php if ($product->image) echo 'thumb_' . $product->image;
							else echo 'noimage.gif'; ?>" alt="Product image"/>
						</a>
					</div>
				<?php endif; ?>
				<?php if ($params->get('show_name', 1)) : ?>
					<div class="item_name">
						<a href="<?php echo $product->link ?>"><?php echo $product->name ?></a>
					</div>
				<?php endif; ?>
				<?php if ($params->get('show_price', 1)) : ?>
					<?php if ($params->get('show_old_price', 1) && !empty($product->oldPriceCurrency)) : ?>
						<span style="text-decoration: line-through">
							<?php echo formatprice($product->oldPriceCurrency); ?>
						</span>
					<?php endif; ?>
					<div class="item_price">
						<?php echo formatprice($product->priceCurrency); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php else : ?>
	<?php echo JText::_('MOD_JMB_JSHOPPING_LAST_SEEN_PRODUCTS_NO_PRODUCTS'); ?>
<?php endif; ?>

<?php if ($params->get('show_backlink', 1)) : ?>
	<div style="text-align: right; clear: both; font-family: Arial, Helvetica, sans-serif; font-size: 7pt; text-decoration: none">
		<?php echo JText::_('MOD_JMB_JSHOPPING_LAST_SEEN_PRODUCTS_BACKLINK'); ?>
	</div>
<?php endif;
