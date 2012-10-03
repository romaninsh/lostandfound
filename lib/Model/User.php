<?php
class Model_User extends Model_Table {
	public $table="user";
	function init(){
		parent::init();

		$this->addField('first_name')->mandatory('Enter first name');
		$this->addField('last_name')->mandatory('Enter last name');
		$this->addField('email')->mandatory('Email is required');
		$this->addField('password')->display(array('form'=>'password'))->mandatory('Type your password');
		
		$this->addExpression('full_name')->set('concat(first_name," ",last_name)');

		$this->addField('is_admin')->type('boolean');

		$this->hasMany('Item');

        $this->addExpression('item_cnt')->set(function($m,$q){
            return $m->refSQL('Item')->count();
        });

/*
		$this->add('filestore/Field_Image', 
			array('name'=>'filestore_file_id','use_model'=>'Image'));

*/
/*

		$m=$this;
        $m->thumb=$m
            ->leftJoin('filestore_file','filestore_file_id')
           ->leftJoin('filestore_image.original_file_id',null,'left')
           ->leftJoin('filestore_file','thumb_file_id','left');
            ;
        $m->vol=$m->thumb->leftJoin('filestore_volume',null,'left');

        $m->addExpression('thumb',function($m,$s){
            return $s->expr(
                'COALESCE(
                        concat('.
                            $m->vol->fieldExpr('dirname').
                            ',"/",'.
                            $m->thumb->fieldExpr('filename').
                        ')
                , "templates/default/images/profile.jpg") ');
        })->visible(true);

*/
        $this->addHook('beforeSave',function($m){
            $m['email']=strtolower($m['email']);
        });

        $this->addHook('beforeDelete',array($this,'checkDependencies'));


	}
    function checkDependencies(){


        if($this->ref('Item')->addCondition('is_found',false)->count()->getOne()>0){
            throw $this->exception('Unable to deltee','ValidityCheck');
        }

        $this->ref('Item')->addCondition('is_found',true)->deleteAll();

    }
}