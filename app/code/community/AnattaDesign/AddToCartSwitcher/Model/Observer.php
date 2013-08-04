<?php

class AnattaDesign_AddToCartSwitcher_Model_Observer {

	function checkoutCartAddProductComplete( $observer ) {
		$product = $observer->getEvent()->getProduct();

		/** @var $response Mage_Core_Controller_Request_Http * */
		$request = $observer->getEvent()->getRequest();

		/** @var $response Mage_Core_Controller_Response_Http * */
		$response = $observer->getEvent()->getResponse();

		/** @var $category_collection Mage_Catalog_Model_Resource_Category_Collection */
		$category_collection = $product->getCategoryCollection();
		$category_collection->addAttributeToSelect( 'anattadesign_addtocartcode' );
		$category_collection->load();

		$redirect_setting = Mage::getStoreConfigFlag( 'checkout/cart/redirect_to_cart' ) ? AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source::MY_CART : AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source::PRODUCT;
		foreach ( $category_collection as $category ) {
			if ( is_numeric( $category->getAnattadesignAddtocartcode() ) )
				$redirect_setting = $category->getAnattadesignAddtocartcode();
		}

		if ( $redirect_setting ) {
			$url = Mage::helper( 'anattadesign_addtocartswitcher' )->getRedirectUrl( $redirect_setting, $request );

			if ( $url )
				$response->setRedirect( $url );
			else
				$response->setRedirect( $product->getProductUrl() );

			if ( ! Mage::getSingleton( 'checkout/session' )->getNoCartRedirect( true ) ) {
				if ( ! Mage::getSingleton( 'checkout/cart' )->getQuote()->getHasError() ) {
					$message = Mage::helper( 'anattadesign_addtocartswitcher' )
					           ->__( '%s was added to your shopping cart.',
					                 Mage::helper( 'core' )->escapeHtml( $product->getName() ) );
					Mage::getSingleton( 'checkout/session' )->addSuccess( $message );
				}
			}

			$response->sendHeaders();
			$response->sendResponse();
			$response->outputBody();
			die();
		}
	}

}