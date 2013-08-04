<?php

class AnattaDesign_AddToCartSwitcher_Helper_Data extends Mage_Core_Helper_Abstract {

	/**
	 * @param $redirect_setting int
	 * @param $request Mage_Core_Controller_Request_Http
	 *
	 * @return bool|string
	 */
	function getRedirectUrl( $redirect_setting ) {
		if ( ! is_numeric( $redirect_setting ) )
			return false;

		switch ( intval( $redirect_setting ) ) {
			case AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source::MY_CART :
				return Mage::helper( 'checkout/url' )->getUrl( 'checkout/cart' );
				break;
			case AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source::PRODUCT :
				if(Mage::helper('core/http')->getHttpReferer())
					return Mage::helper('core/http')->getHttpReferer();
				break;
			case AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source::CHECKOUT :
				return Mage::helper( 'checkout/url' )->getCheckoutUrl();
				break;
		}

		return false;
	}
}