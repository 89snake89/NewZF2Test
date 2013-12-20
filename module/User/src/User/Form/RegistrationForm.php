<?php
namespace User\Form;

use Zend\Form\Form;

class RegistrationForm extends Form
{
	public function __construct(){
		$this->add(array(
				'name' => 'user',
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