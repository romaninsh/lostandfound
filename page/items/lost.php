<?php
/** Reporting of a lost item */
class page_items_lost extends Page {
	function init(){
		parent::init();

		$form=$this->add('Form');
		$form->setModel('Item');

		$form->addSubmit('Report a Lost Item');
		
	}
}