<?php
/** Reporting of a lost item */
class page_items_report extends HelpfulPage {
	function init(){
		parent::init();

		$m=$this->add('Model_Item');
		$m->getElement('state')->display('radio');

		$m->set('user_id',$this->api->auth->model->id);

		$form=$this->add('Form');
		$form->addClass('wideform');
		$form->setModel($m,array('state','title','description','item_type_id','country_id'));

		$form->addSubmit('Report a Lost Item');

		$form->addButton('Reset')->js('click', $form->js()->reload());
		
	}
}