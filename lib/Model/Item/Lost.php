<?php
class Model_Item_Lost extends Model_Item {
	function init(){
		parent::init();

		$this->addCondition('state','lost');
	}
}