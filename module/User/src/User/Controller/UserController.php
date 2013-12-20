<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use User\Form\RegistrationForm;
use Zend\View\Model\ViewModel;
use User\Model\User;
use User\Model\UserTable;

class UserController extends AbstractActionController
{
	protected $userTable;
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
			$postData = $request->getPost();
			\Zend\Debug\Debug::dump($postData);
			$newUser = new User();
			$postData = array('username' => $postData->username, 'password' => $postData->password);
			$newUser->exchangeArray($postData);
			$this->getUserTable()->insert($newUser);
		}
	}
	
	private function getUserTable(){
		if($this->userTable){
			$sm = $this->getServiceLocator();
			$this->userTable = $sm->get('User\Model\UserTable');
		}
		return $this->userTable;
	}
}