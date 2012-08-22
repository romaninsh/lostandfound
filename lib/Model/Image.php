<?php
class Model_Image extends filestore\Model_Image {
	function init(){
		parent::init();

		$this->addField('user_id')->defaultValue($this->api->auth->model->id);

/*
		$this->addExpression('name')->set(function($m,$q){
	        return $q->expr('concat_ws("/","'.$m->api->pm->base_path.
	        	'",'.$m->refSQL('filestore_volume_id')->dsql()->field('dirname').')');

		});
		*/
	}
}