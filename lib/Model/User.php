<?php
class Model_User extends Model_Table {
	public $table="user";
	function init(){
		parent::init();

		$this->addField('first_name')->mandatory('Enter first name');
		$this->addField('last_name')->mandatory('Enter last name');
		$this->addField('email')->mandatory('Email is required');
		$this->addField('password')->display('password');

		$this->addField('is_admin')->type('boolean');
		
	}
}