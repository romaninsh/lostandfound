<?php
namespace comments;
class View_Comment extends \View {
	public $lister;
	public $form;
	function init(){
		parent::init();

		$this->lister=$this->add('Lister',null,'PrevComments','PrevComments');


		$f=$this->add('Form',null,'NewComment');

		$f->addSubmit('Post');

		$this->form=$f;
	}
	function setModel($m){
		$m=parent::setModel($m);

		$this->lister->setModel($m);
		$this->form->setModel($m);

		if($this->form->isSubmitted()){
			$this->form->update();
			$this->js()->univ()->successMessage('Your comment is posted')->execute();
		}
	}
	function defaultTemplate(){

		$l=$this->api->locate('addons','comments','location');
		$this->api->pathfinder->addLocation($this->api->locate('addons','comments'),array(
            'template'=>'templates'
        ))->setParent($l);


		return array('view/comment');
	}
}