<?php

class VS7_Criteo_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isCheckoutSuccess()
    {
        $handles = Mage::app()->getLayout()->getUpdate()->getHandles();
        $successHandles = array(
            'checkout_onepage_success',
            'checkout_multishipping_success',
            'one_click_order_submit_submit',
            'checkout_index_fastsave'
        );
        foreach ($successHandles as $successHandle) {
            if (in_array($successHandle, $handles)) return true;
        }

        return false;
    }

    public function getCustomerEmail()
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer->getId()) {
            $email = $customer->getEmail();
            if (Mage::getStoreConfig('vs7_criteo/general/hash_email')) {
                return md5($email);
            }
            return $email;
        }

        return null;
    }
}