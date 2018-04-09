<?php

class Hwg_Banner_Block_Adminhtml_Image_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('image_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('banner')->__('Image Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('banner')->__('Image Information'),
          'title'     => Mage::helper('banner')->__('Image Information'),
          'content'   => $this->getLayout()->createBlock('banner/adminhtml_image_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}