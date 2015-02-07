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
		$html .= JText::_('PLG_JMB_JSHOPPING_LAST_SEEN_PRODUCTS_DESCRIPTION');
		$html .= '</div>';
		$html .= '<div class="row-fluid" style="margin-top: 20px">';
		$html .= JText::_('PLG_JMB_JSHOPPING_LAST_SEEN_PRODUCTS_ABOUT_NORRNEXT');
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
		$html = '<div>
			<script async="async" src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=eugene.sivokon@gmail.com"
				data-button="donate"
				data-name="NorrNext - Joomla & Pagekit extensions. JMB JShopping Last Seen Products plugin."
				data-lc="' . JFactory::getLanguage()->getTag() . '"
			></script>
		</div>';

		return $html;
	}
}
