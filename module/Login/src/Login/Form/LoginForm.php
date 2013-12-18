<?php
namespace Login\Form;
use Zend\Form\Form;
class LoginForm extends Form
{
	public function __construct(){
		parent::__construct('login');
		
		$this->add(array(
				'name' => 'user',
				'type' => 'text',
				'options' => array(
						'label' => 'User',
				),
		));
		
		$this->add(array(
				'name' => 'password',
				'type' => 'password',
				'options' => array(
						'label' => 'Password',
				),
		));
		
		$this->add(array(
				'name' => 'rememberme',
				'type' => 'checkbox',
				'value' => 1,
				'options' => array(
						'label' => 'Remember Me',
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