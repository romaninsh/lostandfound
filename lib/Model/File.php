<?php
class Model_File extends filestore\Model_File {
	function init(){
		parent::init();

		$this->addField('user_id')->defaultValue($this->api->auth->model->id);
	}
}