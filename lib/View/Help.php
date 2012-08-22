<?php
class View_Help extends View {
	function init(){
		parent::init();

		$this->template->trySet('header', $this->api->page );

		$this->add('View')->set($this->getHelpText($this->api->page));

		//$this->add('Button')->set('Edit')->js('click', $this->js()->reload());
	}
	function getHelpText($keyword){
		switch($keyword){
			case 'items_report': return 'Fill in the information about the item you lost';
			default: return 'No help for this page';
		}
		return 123;
	}
	function defaultTemplate(){
		return array('view/help');
	}
}