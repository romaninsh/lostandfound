<?php
class page_index extends cms\Page_CmsCore {
	function init(){
		parent::init();

		if($this->api->auth->isLoggedIn()){
			$this->add('View_Info')->set('Hello, '.$this->api->auth->model['first_name']);
		}
		
	}
}