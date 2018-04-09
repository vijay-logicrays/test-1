
Module Name : HWG_Banner

1) Call Banner in CMS Page or Block

	{{block type="banner/banner" code="banner-code" template="banner/banner.phtml"}}

2) Call Banner In Template file

	echo $this->getLayout()->createBlock('banner/banner')->setData('code', 'banner-code')->setTemplate('banner/banner.phtml')->toHtml();
	
3) Call Banner In XML file

	<block type="banner/banner" name="banner" before="-" template="banner/banner.phtml">				
		<action method="setData"><name>code</name><value>banner-code</value></action>				
	</block>