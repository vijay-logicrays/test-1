<?php
class Hwg_banner_Block_Adminhtml_Image_Renderer_Bannercode extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract 
{

	public function render(Varien_Object $row) {
		
		$Id = $row->getData($this->getColumn()->getIndex());
		$Ids = explode(",", $Id);		
		
		$banner = Mage::getModel('banner/banner')->getCollection()	
				->addFieldToFilter('banner_id', array('in' => $Ids))
				->addFieldToSelect('title');
				
		$bannerCode = '';
		
		foreach($banner as $data)
		{
			$bannerCode .= $data['title'] .' <br> ';			
		}
		
		return $bannerCode;
	}
}