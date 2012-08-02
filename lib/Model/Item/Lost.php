<?php
class Model_Item_Lost extends Model_Item {
	function init(){
		parent::init();
		
		$join = $this->join('user_item.item_id');
		$join->addField('created')->type('date');
		$join->addField('action');

		$join->hasOne('User');

		$this->hasOne('Type');

		$this->addCondition('action','lost');
	}
}