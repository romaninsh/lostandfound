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

		$this->hasMany('Item_Flag');

		$this->addField('is_deleted')->type('boolean');

		$this->addCondition('is_deleted',0);
	}

	function markAsFound(){
		$this['is_found']=true;
		$this->save();
	}

	function flag(){
		$m=$this->add('Model_Item_Flag');
		$m->addCondition('user_id',$this->api->auth->model->id);
		$m->addCondition('item_id',$this->id);

		$m->tryLoadAny();

		$m->save();

	}
    function delete($id=null){
        if($id)$this->load($id);

		$this['is_deleted']=1;
		return $this->saveAndUnload();
	}
    function deleteAll(){

        $delete=$this->dsql();
        $delete->owner->beginTransaction();
        $this->hook('beforeDeleteAll',array($delete));
        $delete->set('is_deleted',1)->update();
        $this->hook('afterDeleteAll');
        $delete->owner->commit();
        $this->reset();

        return $this;
	}
}