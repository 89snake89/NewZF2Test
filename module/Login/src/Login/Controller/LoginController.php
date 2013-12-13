<?php
namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Login\Form\LoginForm;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
	public function indexAction(){
		$form = new LoginForm();
		
		return new ViewModel(array('form' => $form));
	}
	
	public function loginAction(){
		
	}
	
	public function logoutAction(){
		
	}
}