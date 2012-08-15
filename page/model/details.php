<?php
class page_model_details extends Page {
	function init(){
		parent::init();

		$this->api->stickyGET('id');
		
		$u = $this->add('Model_User')->load($_GET['id']);

		$crud = $this->add('CRUD');
		$crud->setModel($u->ref('Item'));


		if($crud->grid){

			$crud->grid->addColumn('button','found','Mark as Found');

			if($_GET['found']){
				$crud->model->load($_GET['found']);

				$crud->model->markAsFound();

				$crud->js(null,$crud->grid->js()->reload())
				->univ()->alert('Success')->execute();
			}
		}

	}
}