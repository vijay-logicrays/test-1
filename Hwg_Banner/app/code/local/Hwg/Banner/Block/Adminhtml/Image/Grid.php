<?php

class Hwg_Banner_Block_Adminhtml_Image_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
  public function __construct()
  {
      parent::__construct();
      $this->setId('imageGrid');
      $this->setDefaultSort('image_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
	  
      $collection = Mage::getModel('banner/image')->getCollection();	
      $this->setCollection($collection);	  
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {	 
	
      $this->addColumn('image_id', array(
          'header'    => Mage::helper('banner')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'image_id',
      ));
	  
	  
	  $this->addColumn('image', array(
		'header' 	=> Mage::helper('banner')->__('Images'),
		'align'  	=> 'left',
		'index' 	=> 'image',
		'renderer'	=> 'banner/adminhtml_image_renderer_image',
		'width' 	=> '100',
	  ));
	  
	  $this->addColumn('image_title', array(
          'header'    => Mage::helper('banner')->__('Title'),
          'align'     =>'left',
          'index'     => 'image_title',
      ));
	  
      $this->addColumn('banners', array(
          'header'    => Mage::helper('banner')->__('Banner'),
          'align'     =>'left',
		  'index'	  => 'banners',		
		  'renderer'  => 'banner/adminhtml_image_renderer_bannercode',
      ));	  
	  
      $this->addColumn('image_url', array(
          'header'    => Mage::helper('banner')->__('URL'),
          'align'     =>'left',
          'index'     => 'image_url',
      ));
	  
	  $this->addColumn('hover_text', array(
          'header'    => Mage::helper('banner')->__('Hover Text'),
          'align'     =>'left',
          'index'     => 'hover_text',
      ));
	  
	  $this->addColumn('sort_order', array(
          'header'    => Mage::helper('banner')->__('Sort Order'),
          'align'     =>'left',
		  'width'     => '20px',
          'index'     => 'sort_order',
      ));
	  
      $this->addColumn('image_status', array(
          'header'    => Mage::helper('banner')->__('Status'),
          'align'     => 'left',
		  'index'     => 'image_status',
          'width'     => '80px',          
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('banner')->__('Action'),
                'width'     => '50',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('banner')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('banner')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('banner')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('image_id');
        $this->getMassactionBlock()->setFormFieldName('banner');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('banner')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('banner')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('banner/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('banner')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('banner')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}