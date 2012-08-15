<?php
class page_model extends Page {
	function init(){
		parent::init();





	/* 	

		// Example 1

		$m=$this->add('Model_User');

		$m->addCondition('is_admin',false);

		$name = $m->loadAny() -> get('first_name');
		echo $name;

		/*  */
		

		/* 


		// Example 2

		$m=$this->add('Model_Item');

		$m->loadAny();

		$item = $m['title'];
		$name = $m -> ref('user_id') -> get('first_name');

		echo $item.' lost by '.$name;

		/*  */
		

		/*  

		// Example 3
		$cnt=0;
		$this->api->db->addHook('query',function()use(&$cnt){ $cnt++; });
		$m=$this->add('Model_Item');

		$m->debug();

		foreach($m as $junk){
			echo $m['title'].
				' by '.$m['user'].
				' in '.$m['country'].
				'<br/>';

		}
		var_Dump($cnt);
		exit;

		/*

		/* */





		/*  *l/
		// Example 4
		$m=$this->add('Model_Item');

		$m_user = $m->join('user');
		$m_user -> addField('first_name');
		$m_user -> addField('email');

		$country = $m->join('country');
		$country -> addField('code');


/*
		foreach($m as $junk){
			echo $m['title'].
				' by '.$m['first_name'].' ('.$m['email'].')'.
				' in '.$m['country'].' ('.$m['code'].')'.
				'<br/>';
		}
		*/

		//var_Dump($cnt);

		/* */






		// Example 5
		$m=$this->add('Model_User');

		$m->addExpression('full_name')->set('concat(first_name," ",last_name)');
		$m->addExpression('items_lost')->set(function($m,$q){
			return $m->refSQL('Item')->count();
		});

		$crud=$this->add('CRUD');
		$crud->setModel($m);
		
		if($crud->grid)$crud->grid->addColumn('expander','details');

		/* */

		//$m->addExpression('lost_items')->set(function($m,$q){ });




		/* */





		//exit;
	}
}