<?php
namespace Album\Form;

use Zend\Form\Form;

class SearchForm extends Form
{
	public function __construct(){
		// we want to ignore the name passed
		parent::__construct('album');
		
		$this->add(array(
				'name' => 'title',
				'type' => 'Text',
				'options' => array(
						'label' => 'Title',
				),
		));
		
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Go',
						'id' => 'submitbutton',
				),
		));
	}
}