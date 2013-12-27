<?php
namespace User\Form;

use Zend\Form\Form;

class RegistrationForm extends Form
{
	public function __construct(){
		// we want to ignore the name passed
		parent::__construct('registration');
		
		$this->add(array(
				'name' => 'gender',
				'type' => 'Zend\Form\Element\Radio',
				'options' => array(
						'label' => 'What is your gender ?',
						'value_options' => array(
								'F' => 'Female',
								'M' => 'Male',
						),
				),
		));
		
		$this->add(array(
				'name' => 'name',
				'type' => 'text',
				'options' => array(
						'label' => 'Name',
				),
		));
		
		$this->add(array(
				'name' => 'surname',
				'type' => 'text',
				'options' => array(
						'label' => 'Surame',
				),
		));
		
		$this->add(array(
				'name' => 'username',
				'type' => 'text',
				'options' => array(
						'label' => 'Username',
				),
		));
		
		$this->add(array(
				'name' => 'password',
				'type' => 'password',
				'options' => array(
						'label' => 'Password',
				),
		));
		
		//Submit button
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Login',
						'id' => 'submitbutton',
				),
		));
	}
}