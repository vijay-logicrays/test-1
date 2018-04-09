<?php

class Hwg_Banner_Block_Adminhtml_Image_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('image_form', array('legend'=>Mage::helper('banner')->__('Image information')));
	  $fieldset->addType('image', Mage::getConfig()->getBlockClassName('banner/adminhtml_article_helper_image')); 	
	
	  $options = array();
   	  $banner = Mage::getModel('banner/banner')->getCollection()->addFieldToFilter('status',array('eq' => 1));      
  	  $options[] = array(
        	'label' =>  '-- Please Select Banner --',
        	'value' =>  ''
       );
	  foreach($banner->getData() as $data){        
		$options[] = array(
		  'label' =>  $data['title'],
		  'value' =>  $data['banner_id']
	    );
	  }
	  
	  $fieldset->addField('image_title', 'text', array(
          'label'     => Mage::helper('banner')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'image_title',
      ));

	  $fieldset->addField('banners', 'multiselect', array(
          'label'     => Mage::helper('banner')->__('Banner'),
          'required'  => true,
          'name'      => 'banners',
		  'width'     => '100px',
		  'values'    => $options,
	  ));
	  
	  $fieldset->addField('image', 'image', array(
          'label'     => Mage::helper('banner')->__('Image'),
          'name'      => 'image',	
		  'required'  => true,
	  ));	
	  
	  $fieldset->addField('image_url', 'text', array(
          'label'     => Mage::helper('banner')->__('Url'),
          'required'  => false,
          'name'      => 'image_url',
      ));  	

	   $fieldset->addField('hover_text', 'text', array(
          'label'     => Mage::helper('banner')->__('Hover Text'),
          'required'  => false,
          'name'      => 'hover_text',
      ));  
	  
	   $fieldset->addField('description', 'editor', array(
          'name'      => 'description',
          'label'     => Mage::helper('banner')->__('Description'),
          'title'     => Mage::helper('banner')->__('Description'),
          'style'     => 'width:500px; height:200px;',
          'wysiwyg'   => false,
          'required'  => false,
      ));  

	  $fieldset->addField('sort_order', 'text', array(
          'label'     => Mage::helper('banner')->__('Sort Order'),
          'required'  => false,
          'name'      => 'sort_order',
      )); 	  
	  
      $fieldset->addField('image_status', 'select', array(
          'label'     => Mage::helper('banner')->__('Status'),
          'name'      => 'image_status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('banner')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('banner')->__('Disabled'),
              ),
          ),
      ));
	  
	    
     
      if ( Mage::getSingleton('adminhtml/session')->getBannerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getBannerData());
          Mage::getSingleton('adminhtml/session')->setBannerData(null);
      } elseif ( Mage::registry('banner_data') ) {
          $form->setValues(Mage::registry('banner_data')->getData());
      }
      return parent::_prepareForm();
  }
}