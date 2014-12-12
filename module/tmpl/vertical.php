<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Denis Ryabov and Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2014 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die;

if ($params->get('module_style', 1)){
 JHtml::stylesheet('mod_jmb_jshopping_last_seen_products/vertical/style.css', false, true);
}

if (!empty($products)) : ?>
	<div class="jmb-jslsp jmb-jslsp-vertical <?php echo $moduleclass_sfx; ?>">
		<?php foreach ($products as $product) : ?>
			<div class="jmb-jslsp-block-item" >
				<?php if ($params->get('show_image', 1)) : ?>
					<div class="jmb-jslsp-item-image">
						<?php if ($product->labelImage) : ?>
							<div class="jmb-jslsp-product-label">
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
					<div class="jmb-jslsp-item-name">
						<a href="<?php echo $product->link ?>"><?php echo $product->name ?></a>
					</div>
				<?php endif; ?>
				<?php if ($params->get('show_price', 1)) : ?>
					<?php if ($params->get('show_old_price', 1) && !empty($product->oldPriceCurrency)) : ?>
						<span class="jmb-jslsp-item-oldprice">
							<?php echo formatprice($product->oldPriceCurrency); ?>
						</span>
					<?php endif; ?>
					<div class="jmb-jslsp-item-price">
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
