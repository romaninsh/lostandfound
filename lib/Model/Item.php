<?php
class Model_Item extends Model_Table {
	public $table="item";
	function init(){
		parent::init();
		
		$this->addField('title');
		$this->addField('description')->type('text');

		$this->hasOne('User',null,'email');
		$this->hasOne('Type');
		$this->hasOne('Country');
	}
}