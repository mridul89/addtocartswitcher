<?php

class AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source
	extends Mage_Eav_Model_Entity_Attribute_Source_Table {

	const MY_CART = 0;
	const PRODUCT = 1;
	const CHECKOUT = 2;

	/**
	 * Retrieve all options array
	 *
	 * @return array
	 */
	public function getAllOptions() {
		if ( is_null( $this->_options ) ) {
			$this->_options = array(
				array(
					'label' => Mage::helper( 'anattadesign_addtocartswitcher' )->__( 'Take Users to My Cart Page' ),
					'value' => self::MY_CART
				),
				array(
					'label' => Mage::helper( 'anattadesign_addtocartswitcher' )->__( 'Take Users To Checkout Page' ),
					'value' => self::CHECKOUT
				),
				array(
					'label' => Mage::helper( 'anattadesign_addtocartswitcher' )->__( 'Keep Users on Previous Page' ),
					'value' => self::PRODUCT
				)
			);
		}
		return $this->_options;
	}

}