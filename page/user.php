<?php
class page_user extends Page {
	function init(){
		parent::init();

		$form = $this->add('Form');

		$form->setModel($this->api->auth->model,
			array('first_name','last_name','email','password','filestore_file_id'));

		$form->addField('password','password_confirm');

		$form->addSubmit();

		if($form->isSubmitted()){
			if($form->get('password') != $form->get('password_confirm')){
				$form->displayError('password','Passwords should match');
			}


			$form->update();
			$form->js()->univ()->successMessage('Saved')->execute();
		}
		/*
		// alternatitve implementation
		$form->onSubmit(function($form){
			if($form->get('password') != $form->get('password_confirm')){
				throw $form->exception('Password missmatch','ValidityCheck')
					->setField('password');
			}


			$form->update();
			$form->js()->univ()->successMessage('Saved')->execute();
		});
		*/

		
	}
}