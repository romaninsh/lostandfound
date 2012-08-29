<?php
class Model_Item_Flag extends Model_Table {
	public $table="item_flag";
	function init(){
		parent::init();

		$this->hasOne('User');
		$this->hasOne('Item');
		
	}
}