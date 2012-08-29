<?php
class page_items_list_details extends Page {
	function init(){
		parent::init();
		
		$model=$this->add('Model_Item')->load($_GET['id']);
		$this->api->stickyGET('id');

		$item= $this->add('View',null,'Item','Item');
		$item->template->set($model->get());


		if(!$model->ref('Item_Flag')
			->addCondition('user_id',$this->api->auth->model->id)
			->tryLoadAny()->loaded()){
			$v=$this->add('Button',null,'Sidebar')->set('Flag this Item');


			$url=$this->api->url(null,array('flag'=>1));

			$url->useAbsoluteURL();

			$v->js('click')->univ()->ajaxec($url);

			if($_GET['flag']){

				$model->flag();

				$js=$v->js()->hide();

				$v->js(null,$js)->univ()->successMessage('The item have been flagged')->execute();
			}
		}

		// 1) Selector
		// 2) Event
		// 3) Actions


		$c=$this->add('comments/Model_Comment');
		$c->addCondition('item_id',$_GET['id']);
		$c->getElement('user_id')->defaultValue($this->api->auth->model->id)->system(true);
		$this->add('comments/View_Comment',null,'Comments')->setModel($c);


	}
	function defaultTemplate(){
		return array('page/item_details');
	}
}