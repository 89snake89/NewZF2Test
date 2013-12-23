<?php
namespace User\Form;

use Zend\Form\Form;

class RegistrationForm extends Form
{
	public function __construct(){
		// we want to ignore the name passed
		parent::__construct('registration');
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