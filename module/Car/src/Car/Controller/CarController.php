<?php
namespace Car\Controller;
	
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Car\Model\Car;
use Car\Form\CarForm;

class CarController extends AbstractActionController
{
	
	protected $carTable;
	
	public function indexAction(){
		return new ViewModel(array(
				'cars' => $this->getCarTable()->fetchAll(),
		));
		
	}
	
	public function addAction(){
		$carForm = new CarForm();
		$carForm->get('submit')->setValue('Add');
		
		$request = $this->getRequest();
		
		if($request->isPost()){
			$car = new Car();
			$car->setInputFilter($car->getInputFilter());
			$carForm->setData($request->getPost());
			
			if($carForm->isValid()){
				$car->exchangeArray($carForm->getData());
				$this->getCarTable()->saveCar();
				
				// Redirect to list of albums
				return $this->redirect()->toRoute('car');
			}
		}
		
		return array('form' => $carForm);
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