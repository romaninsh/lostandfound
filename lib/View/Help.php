<?php
class View_Help extends View {
	function init(){
		parent::init();

		$this->add('Button')->set('Refresh')->js('click',$this->js()->reload());
		
	}
	function defaultTemplate(){
		return array('view/help');
	}
}