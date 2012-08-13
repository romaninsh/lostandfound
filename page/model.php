<?php
class page_model extends Page {
	function init(){
		parent::init();





/*

		// Example 1

		$m=$this->add('Model_User');

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
		$m=$this->add('Model_Item');

		foreach($m as $junk){
			echo $m['title'].
				' by '.$m->ref('user_id')->get('first_name').
				' in '.$m->ref('country_id')->get('name').
				'<br/>';

		}

		/*
		$cnt=0;
		$this->api->db->addHook('query',function()use(&$cnt){ $cnt++; });
		var_Dump($cnt);

		/* */





		/*
		// Example 4
		$m=$this->add('Model_Item');

		$m_user = $m->join('user');
		$m_user -> addField('first_name');
		$m_user -> addField('email');

		$m_user = $m->join('country');
		$m_user -> addField('code');

		foreach($m as $junk){
			echo $m['title'].
				' by '.$m['first_name'].' ('.$m['email'].')'.
				' in '.$m['country'].' ('.$m['code'].')'.
				'<br/>';
		}


		/* */







		// Example 5
		$m=$this->add('Model_User');

		$m->addExpression('full_name')->set('concat(first_name," ",last_name)');

		$crud=$this->add('CRUD');
		$crud->setModel($m);

		/* */

		//$m->addExpression('lost_items')->set(function($m,$q){ });




		/* */
		if($crud->grid)$crud->grid->addColumn('expander','details');





		//exit;
	}
}