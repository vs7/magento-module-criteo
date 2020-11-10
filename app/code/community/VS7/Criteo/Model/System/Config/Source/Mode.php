<?php

class VS7_Criteo_Model_System_Config_Source_Mode
{
    public function toOptionArray()
    {
        return array(
            array('value' => 0, 'label'=>Mage::helper('vs7_criteo')->__('GTM'))
        );
    }

}