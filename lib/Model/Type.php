<?php
class Model_Type extends Model_Table {
	public $table="item_type";
	function init(){
		parent::init();

		$this->addField('name');
	}
}