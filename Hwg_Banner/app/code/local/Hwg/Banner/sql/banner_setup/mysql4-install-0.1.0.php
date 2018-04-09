<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('banner')};
CREATE TABLE {$this->getTable('banner')} (
  `banner_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `code` varchar(255) NOT NULL default '',
  `content` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '1',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
	
$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('banner_image')};
CREATE TABLE {$this->getTable('banner_image')} (
  `image_id` int(11) unsigned NOT NULL auto_increment,
  `banners` varchar(255) NOT NULL default '',
  `image_title` varchar(255) NOT NULL default '',
  `image_url` varchar(255) NOT NULL default '',
  `hover_text` varchar(255) NOT NULL default '',
  `description` text NOT NULL default '',
  `image_status` smallint(6) NOT NULL default '1',
  `image` text NOT NULL default '',
  `video` smallint(6) NOT NULL default '2',
  `sort_order` int(11) default NULL,
   PRIMARY KEY (`image_id`)   
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
	

$installer->endSetup(); 