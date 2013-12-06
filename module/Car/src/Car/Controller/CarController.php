<?php
namespace Car\Controller;
	
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Crypt\PublicKey\Rsa\PublicKey;
use Zend\View\Helper\ViewModel;
class CarController extends AbstractActionController
{
	
	protected $carTable;
	
	public function indexAction(){
		return new ViewModel();
	}
	
	public function addAction(){
		
	}
	
	public function editAction(){
		
	}
	
	public function deleteAction(){
		
	}
	
	public function getCarTable(){
		
	}
}