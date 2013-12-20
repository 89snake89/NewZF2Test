<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use User\Form\RegistrationForm;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
	 */
	public function indexAction(){
		$form = new RegistrationForm();
		
		return new ViewModel(array('form' => $form));
	}
	
	/**
	 * Register action UserController
	 * This function get form data and register new user and save record in DB
	 */
	public function registerAction(){
		$request = $this->getRequest();
		if ($request->isPost()) {
			;
		}
	}
}