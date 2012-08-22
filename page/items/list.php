<?php
class page_items_list extends Page {
	function init(){
		parent::init();
		
		// <div> <li> tab/handle <div> 


		$tt=$this->add('Tabs');
		$t=$tt->addTab('Found Items');

		$t->add('View_ItemList')->setModel('Item_Found');


		$t=$tt->addTab('Lost Items');

		$t->add('View_ItemList')->setModel('Item_Lost');


	}
}