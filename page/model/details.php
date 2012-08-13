<?php
class page_model_details extends Page {
	function init(){
		parent::init();

		$this->api->stickyGET('id');
		
		$u = $this->add('Model_User')->load($_GET['id']);

		$this->add('CRUD')->setModel($u->ref('Item'));
	}
}