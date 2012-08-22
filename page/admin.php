<?php
class page_admin extends Page {
	function page_index(){

		$is_admin = $this->api->auth->model['is_admin'];

		if(!$is_admin)$this->api->redirect('index');

		$tabs = $this->add('Tabs');

		$tab = $tabs->addTab('User Admin');

		$user_crud=$tab->add('CRUD');
		$user_crud->setModel('User');
		if($user_crud->grid)$user_crud->grid->addClass('zebra bordered');

		$tab = $tabs->addTab('Item Admin');
		$tab->add('CRUD')->setModel('Item');

		// Countries has a long list, only load them on-demand
		$tab = $tabs->addTabURL($this->api->url('./country'),'Country Admin');

		$tab = $tabs->addTab('Item Types');
		$tab->add('CRUD')->setModel('Type');
	}

	function page_country(){
		$c=$this->add('CRUD');
		$c->setModel('Country');
		if($c->grid)$c->grid->addPaginator(50);


	}
}
