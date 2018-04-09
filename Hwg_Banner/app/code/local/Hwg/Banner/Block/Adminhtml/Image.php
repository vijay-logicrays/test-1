<?php
class Hwg_Banner_Block_Adminhtml_Image extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_image';
    $this->_blockGroup = 'banner';
    $this->_headerText = Mage::helper('banner')->__('Image Manager');
    $this->_addButtonLabel = Mage::helper('banner')->__('Add Image');
    parent::__construct();
  }
}