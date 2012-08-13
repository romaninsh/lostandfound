<?php
class Model_Country extends Model_Table {
	public $table="country";
	function init(){
		parent::init();

		$this->addField('code');
		$this->addField('name');

		$this->addField('eu_member');

	}
}