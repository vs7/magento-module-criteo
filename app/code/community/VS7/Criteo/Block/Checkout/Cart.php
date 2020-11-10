<?php

class VS7_Criteo_Block_Checkout_Cart extends Mage_Checkout_Block_Cart
{
    public function getItemsJSON()
    {
        $i = 0;
        $items = array();
        foreach ($this->getItems() as $item) {
            $i++;
            $items[] = array(
                'id' => $item->getSku(),
                'price' => $item->getPrice(),
                'quantity' => $item->getQty()
            );
        }

        return Mage::helper('core')->jsonEncode($items);
    }
}