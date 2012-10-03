<?php
class View_ItemList extends CompleteLister {
	function formatRow(){
		parent::formatRow();

		$this->current_row['link']= $this->api->url('./details',
			array('id'=>$this->model->id));

		//$this->current_row['img_url'] = $this->model->ref('image_id')->get('url');
	}
	function defaultTemplate(){
		return array('list/items');
	}
}