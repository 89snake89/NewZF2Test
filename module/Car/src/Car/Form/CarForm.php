<?php
use Zend\Form\Form;
class CarForm extends Form
{
	public function __construct($name = null){
		parent::__construct('car');
		
		$this->add(array(
				'name' => 'id',
				'type' => 'hidden'
		));
		
		$this->add(array(
				'name' => 'brand',
				'type' => 'text',
				'options' => array(
						'label' => 'Brand',
				),
		));
		
		$this->add(array(
				'name' => 'model',
				'type' => 'text',
				'options' => array(
						'label' => 'Model',
				),
		));
	}
}