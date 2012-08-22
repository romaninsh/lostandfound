<?php

class HelpfulPage extends Page {
	function init(){
		parent::init();
		$this->add('View_Help',null,'mytag');
	}

	function defaultTemplate(){
		return array('mypage');
	}
}