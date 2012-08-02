<?php
class page_admin extends Page {
	function init(){
		parent::init();

		$is_admin = $this->api->auth->model['is_admin'];

		if(!$is_admin)$this->api->redirect('index');

		$tabs = $this->add('Tabs');

		$tab = $tabs->addTab('User Admin');

		$tab->add('CRUD')->setModel('User');

		$tab = $tabs->addTab('Item Admin');
		$tab->add('CRUD')->setModel('Item');

		$tab = $tabs->addTab('Lost Items');
		$tab->add('CRUD')->setModel('Item_Lost');
		
		$tab = $tabs->addTab('Item Types');
		$tab->add('CRUD')->setModel('Type');
		
	}
}