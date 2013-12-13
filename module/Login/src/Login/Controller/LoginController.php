<?php
namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Login\Form\LoginForm;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;
use Login\Model\AutenticationAdapter;
use Login\Event\EventLogged;

class LoginController extends AbstractActionController
{
	public function indexAction(){
		$form = new LoginForm();

		return new ViewModel(array('form' => $form));
	}

	public function loginAction(){
		$auth = new AuthenticationService();

		$form = new LoginForm();
		$request = $this->getRequest();
		
		if($request->isPost()){
			$form->setData($request->getPost());
			if($form->isValid()){
				$formData = $form->getData();

				//Verifica delle credenziali dell'utente
				$authAdapter = new AutenticationAdapter(
						$formData["user"],
						$formData["password"]
				);
				$authAdapter->setDbAdapter(
						$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter'));
				// Attempt authentication, saving the result
				$result = $auth->authenticate($authAdapter);
				if (!$result->isValid()) {
					// Authentication failed; print the reasons why
					foreach ($result->getMessages() as $message) {
						echo "$message\n";
					}
				} else {
					$auth->getStorage()->write($authAdapter->getResultRowObject(null, array('Psw')));
					$even = new EventLogged();
					//return $this->forward()->dispatch('Prova\Controller\Auto',array('action' => 'index'));
					$even->getEventManager()->attach('userLogged', function(){
						return $this->redirect()->toRoute('auto');
						});
					$even->userLogged();
		
				}
			}
		}
		
		if ($auth->hasIdentity()) {
			$identity = $auth->getIdentity();
		}
		
		return new ViewModel(array('form' => $form));
	}
	
	public function logoutAction(){
		
	}
}