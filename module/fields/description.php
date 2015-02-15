<?php
/**
 * @package    Jmb_JShopping_Last_Seen_Products
 * @author     Dmitry Rekun <support@norrnext.com>
 * @copyright  Copyright (C) 2015 NorrNext. All rights reserved.
 * @license    GNU General Public License version 3 or later; see license.txt
 */

defined('_JEXEC') or die;

/**
 * Description field class.
 *
 * @package  Jmb_JShopping_Last_Seen_Products
 * @since    1.0
 */
class JmbFormFieldDescription extends JFormField
{
	/**
	 * Field name.
	 *
	 * @var  string
	 */
	protected $type = 'description';

	/**
	 * Method to get field input.
	 *
	 * @return  string  HTML output.
	 */
	protected function getInput()
	{
		$html = '<div class="row-fluid">';
		$html .= '<img class="pull-left img-polaroid" style="margin-right:10px;width:125px;" src="' . JUri::root() . 'modules/mod_jmb_jshopping_last_seen_products/fields/jmb_js_last_seen_products.png" />';
		$html .= JText::_('MOD_JMB_JSHOPPING_LAST_SEEN_PRODUCTS_DESCRIPTION');
		$html .= '</div>';
		$html .= '<div class="row-fluid" style="margin-top: 20px">';
		$html .= JText::_('MOD_JMB_JSHOPPING_LAST_SEEN_PRODUCTS_ABOUT_NORRNEXT');
		$html .= $this->getSocialButtons();
		$html .= $this->getPaypalDonation();
		$html .= '</div>';

		return $html;
	}

	/**
	 * Method to get social buttons
	 *
	 * @return  string  Social buttons layout.
	 *
	 * @since   1.0
	 */
	private function getSocialButtons()
	{
		$html = '
			<a href="https://twitter.com/norrnext"
				class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-lang="en"></a>
			<script>
				! function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (!d.getElementById(id)) {
						js = d.createElement(s);
						js.id = id;
						js.src = "//platform.twitter.com/widgets.js";
						fjs.parentNode.insertBefore(js, fjs);
					}
				}(document, "script", "twitter-wjs");
			</script>
			<iframe
				src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2Fnorrnext&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21"
				scrolling="no"
				frameborder="0"
				style="border:none; overflow:hidden; height:20px; width:120px"
				allowTransparency="true">
			</iframe><br />
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			<g:plus href="https://plus.google.com/108999239898392136664" width="200" height="131"></g:plus>
		';

		return $html;
	}

	/**
	 * Method to get PayPal donation layout
	 *
	 * @return  string  PayPal donation form layout
	 *
	 * @since   1.0
	 */
	private function getPaypalDonation()
	{
		// If we do not use form element then the next form element will not be displayed.
		// Some kind of bug...
		$html = '<div style="display: none"><form></form></div>';

		$html .= '
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		';

		return $html;
	}
}
