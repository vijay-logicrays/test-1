<?php
class Hwg_banner_Block_Adminhtml_Article_Helper_Image extends Varien_Data_Form_Element_Image{
    protected function _getUrl(){
        $url = false;
        if ($this->getValue()) {
            $url = Mage::getBaseUrl('media').'banner/'.$this->getValue();
        }		
        return $url;
    }
} 