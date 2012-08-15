<?php
class Model_Item extends Model_Table {
	public $table="item";
	function init(){
		parent::init();
		
		$this->addField('title')->mandatory('Need a title');
		$this->addField('description')->type('text');

		$this->addField('state')->enum(array('lost','found'))->mandatory(true);

		$this->addField('is_found')->type('boolean');

		$this->hasOne('User',null,'full_name');
		$this->hasOne('Type');
		$this->hasOne('Country');
	}

	function markAsFound(){
		$this['is_found']=true;
		$this->save();
	}
}