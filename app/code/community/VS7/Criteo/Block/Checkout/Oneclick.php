<?php
class VS7_Criteo_Block_Checkout_Oneclick extends Mage_Catalog_Block_Product
{
    public function getItemsJSON()
    {
        $items = array();

        $product = Mage::registry('current_product');

        $items[] = array(
            'id' => $product->getSku(),
            'price' => $product->getPrice(),
            'quantity' => 1
        );

        return Mage::helper('core')->jsonEncode($items);
    }
}