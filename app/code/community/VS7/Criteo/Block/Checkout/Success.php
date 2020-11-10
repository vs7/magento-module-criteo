<?php
class VS7_Criteo_Block_Checkout_Success extends Mage_Checkout_Block_Onepage_Success
{
    private $_order;

    public function getItemsJSON()
    {
        $i = 0;
        $items = array();

        foreach ($this->getOrder()->getAllItems() as $item) {
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            $i++;
            $items[] = array(
                'id' => $product->getSku(),
                'price' => $item->getPrice(),
                'quantity' => $item->getQtyOrdered()
            );
        }

        return Mage::helper('core')->jsonEncode($items);
    }

    public function getOrder() {
        if ($this->_order) {
            return $this->_order;
        }

        $this->_order = Mage::getModel('sales/order')->loadByIncrementId($this->getOrderId());
        return $this->_order;
    }
}