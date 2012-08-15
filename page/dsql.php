<?php
class page_dsql extends Page {
	function init(){
		parent::init();





		/* 

		// Example 1

		$q=$this->api->db->dsql();

		$q->debug();

		$name = $q->table('user')->field('first_name')->getOne();
		echo $name;

		/*  */





		/* */
		// Example 2

		$q=$this->api->db->dsql();

		$q->table('item')->field('title')->field('first_name');
		$q->field( $q->expr('length(title)'), 'len' );
		$q->join('user');
		$q->where('first_name',$q->getField('title'));

		$q->debug();



		foreach($q as $row){
			echo $row['title']." (".$row['len'].")".
				' by '.$row['first_name'].
				' in '.$row['country'].
				'<br/>';
		}

		//$q->where('email','joe@example.com');
		//$q->field($q->expr('(select name from country where country.id=country_id)'),'country');

		//	$q->getField('country_id')


		/* */





		exit;
		
	}
}