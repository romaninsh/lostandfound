<?php
class Form_Field_MyAutocomplete extends autocomplete\Form_Field_plus {
	function addCondition($q){
		$this->model->addCondition(
			$this->model->dsql()->orExpr()
				->where($this->model->getElement( $this->model->title_field),'like','%'.$q.'%')
				->where($this->model->getElement( $this->model->id_field),'like','%'.$q.'%')
				);
	}

}
