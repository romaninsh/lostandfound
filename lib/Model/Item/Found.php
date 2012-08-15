<?php
class Model_Item_Found extends Model_Item {
	function init(){
		parent::init();

		$this->addCondition('state','found');
	}
}