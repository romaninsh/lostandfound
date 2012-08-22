<?php
class page_json extends Page {
	/** This is an example page showing how you can build simple API pages */
	function init(){
		parent::init();

		$this->add('Controller_MyJson')->setModel('User');
		
	}
}

class Controller_MyJson extends AbstractController {
	function setModel($m){
		parent::setModel($m);

		echo json_encode($this->model->getRows());
		exit;
	}
}