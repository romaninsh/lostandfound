<?php
class View_ItemList extends CompleteLister {
	function formatRow(){
		parent::formatRow();

		$this->current_row['link']= $this->api->url('./details',
			array('id'=>$this->model->id));
	}
	function defaultTemplate(){
		return array('list/items');
	}
}