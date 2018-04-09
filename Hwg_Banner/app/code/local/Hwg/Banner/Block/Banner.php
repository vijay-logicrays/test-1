<?php
class Hwg_Banner_Block_Banner extends Mage_Core_Block_Template
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
	public function getBanner()     
	{ 
        if (!$this->hasData('banner')) {
            $this->setData('banner', Mage::registry('banner'));
        }
        return $this->getData('banner');
        
    }
	public function getBannerCollection()
	{
		$bannerCode = $this->getData('code');
		if($bannerCode){ 
			$model = Mage::getModel('banner/banner')->getCollection()
				->addFieldToFilter('code', array('eq' => $bannerCode))
				->addFieldToFilter('status', array('eq' => 1))
				->addFieldToSelect('banner_id');
			foreach($model as $code)
			{
				$bannerId = $code->getBannerId();			
			}
		}
		if($bannerId){ 
			$imageModel = Mage::getModel('banner/image')->getcollection()
				->addFieldToFilter('banners', array('finset' => $bannerId))
				->addFieldToFilter('image_status', array('eq' => 1))
				->setOrder('sort_order', 'ASC');
		}
		return $imageModel;
	}
}