<?php

/* @var $installer AnattaDesign_AddToCartSwitcher_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->addAttribute( 'catalog_category', 'anattadesign_addtocartcode', array(
	//the EAV attribute type, NOT a MySQL varchar
	'type' => 'int',
	'label' => 'Add To Cart Switcher Action',
	'input' => 'select',
	'class' => '',
	'backend' => '',
	'frontend' => '',
	'source' => 'anattadesign_addtocartswitcher/eav_entity_attribute_source',
	'required' => true,
	'user_defined' => true,
	'default' => AnattaDesign_AddToCartSwitcher_Model_Eav_Entity_Attribute_Source::MY_CART,
	'unique' => false,
	'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
) );

$installer->addAttributeGroup( 'catalog_category', $installer->getDefaultAttributeSetId( 'catalog_category' ), 'Add To Cart Switcher' );

$installer->addAttributeToGroup( 'catalog_category', $installer->getDefaultAttributeSetId( 'catalog_category' ), 'Add To Cart Switcher', 'anattadesign_addtocartcode' );

// Re-indexing the category structure. It is the same as "Category Flat Data" option under System > Index Management
Mage::getSingleton( 'index/indexer' )->getProcessByCode( 'catalog_category_flat' )->reindexAll();

// Cleaning the cache
Mage::app()->cleanCache( array(
	                         'CONFIG',
	                         'TRANSLATE',
	                         'COLLECTION_DATA',
	                         'EAV'
                         ) );

$installer->endSetup();