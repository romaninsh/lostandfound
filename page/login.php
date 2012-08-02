<?php
class page_login extends Page {
	function init(){
		parent::init();

		$this->api->redirect('/');
		
	}
}