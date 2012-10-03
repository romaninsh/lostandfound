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
		$form->setModel($m,array(/* 'state','title',*/'description','item_type_id','country_id'));

		$form->getElement('item_type_id')->destroy();

		$ff= $form->addField('MyAutocomplete','item_type_id')->setModel('Type');

		//$form->add('Order')->move('item_type','after','title')->now();

		$form->addSubmit('Report a Lost Item');

		$form->addButton('Reset')->js('click', $form->js()->reload());

		if($form->isSubmitted()){

			//$form->model['item_type_id']=

			//$form->update();

			$form->js()->univ()->successMessage($form->get('item_type'))->execute();
		}
		
	}
}

