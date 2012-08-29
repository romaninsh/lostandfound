<?php
namespace comments;
class Model_Comment extends \Model_Table {
	public $table="comment";
	function init(){
		parent::init();

		$this->hasOne('User',null,'first_name');
		$this->hasOne('Item');
		$this->addField('comment')->type('text');
		
	}
}