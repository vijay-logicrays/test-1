<?php

class Hwg_Banner_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function isEnabled() {
		
		return (int)Mage::getStoreConfig('banner/general/enabled');
	}
	
	public function isSliderPager() {
		
		return (int)Mage::getStoreConfig('banner/slider/pager');
	}
	
	public function isSliderControls() {
		
		return (int)Mage::getStoreConfig('banner/slider/controls');
	}
	
	public function isSliderCaptions() {
		
		return (int)Mage::getStoreConfig('banner/slider/captions');
	}
}