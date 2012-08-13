<?php
class page_dsql extends Page {
	function init(){
		parent::init();





		/*

		// Example 1

		$q=$this->api->db->dsql();

		$name = $q->table('user')->field('first_name')->getOne();
		echo $name;

		/*  */





		/*
		// Example 2

		$q=$this->api->db->dsql();

		$q->table('item')->field('title')->field('first_name');
		$q->join('user');

		$q->debug();

		$q->field($q->expr('(select name from country where country.id=country_id)'),'country');


		foreach($q as $row){
			echo $row['title'].
				' by '.$row['first_name'].
				' in '.$row['country'].
				'<br/>';
		}

		//$q->where('email','joe@example.com');

		//	$q->getField('country_id')


		/* */





		exit;
		
	}
}