<?php
class Model_User extends Model_Table {
	public $table="user";
	function init(){
		parent::init();

		$this->addField('first_name')->mandatory('Enter first name');
		$this->addField('last_name')->mandatory('Enter last name');
		$this->addField('email')->mandatory('Email is required');
		$this->addField('password')->display('password');
		
		$this->addExpression('full_name')->set('concat(first_name," ",last_name)');

		$this->addField('is_admin')->type('boolean');

		$this->hasMany('Item');

/*
		$this->add('filestore/Field_Image', 
			array('name'=>'filestore_file_id','use_model'=>'Image'));

*/

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

	}
}