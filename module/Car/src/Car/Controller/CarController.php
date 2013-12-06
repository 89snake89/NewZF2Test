<?php
namespace Car\Controller;
	
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Car\Model\Car;

class CarController extends AbstractActionController
{
	
	protected $carTable;
	
	public function indexAction(){
		return new ViewModel(array(
				'cars' => $this->getCarTable()->fetchAll(),
		));
		
	}
	
	public function addAction(){
		
	}
	
	public function editAction(){
		
	}
	
	public function deleteAction(){
		
	}
	
	public function getCarTable(){
		if(!$this->carTable){
			$sm = $this->getServiceLocator();
			$this->carTable = $sm->get('Car\Model\CarTable');
		}
		return $this->carTable;
	}
}