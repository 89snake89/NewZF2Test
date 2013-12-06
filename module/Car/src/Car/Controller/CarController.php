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
			$carForm->setInputFilter($car->getInputFilter());
			$carForm->setData($request->getPost());
			
			if($carForm->isValid()){
				$car->exchangeArray($carForm->getData());
				$this->getCarTable()->saveCar($car);
				
				// Redirect to list of albums
				return $this->redirect()->toRoute('car');
			}
		}
		
		return array('form' => $carForm);
	}
	
	public function editAction(){
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('car', array(
					'action' => 'add'
			));
		}
		
		// Get the Album with the specified id.  An exception is thrown
		// if it cannot be found, in which case go to the index page.
		try {
			$car = $this->getCarTable()->getCar($id);
		}
		catch (\Exception $ex) {
			return $this->redirect()->toRoute('car', array(
					'action' => 'index'
			));
		}
		
		$form  = new CarForm();
		$form->bind($car);
		$form->get('submit')->setAttribute('value', 'Edit');
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter($car->getInputFilter());
			$form->setData($request->getPost());
		
			if ($form->isValid()) {
				$this->getCarTable()->saveCar($car);
				// Redirect to list of car
				return $this->redirect()->toRoute('car');
			}
		}
		
		return array(
				'id' => $id,
				'form' => $form,
		);
	}
	
	public function deleteAction(){
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('car');
		}
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
		
			if ($del == 'Yes') {
				$id = (int) $request->getPost('id');
				$this->getCarTable()->deleteCar($id);
			}
			// Redirect to list of car
			return $this->redirect()->toRoute('car');
		}
		
		return array(
				'id'    => $id,
				'car' => $this->getCarTable()->getCar($id)
		);
	}
	
	public function getCarTable(){
		if(!$this->carTable){
			$sm = $this->getServiceLocator();
			$this->carTable = $sm->get('Car\Model\CarTable');
		}
		return $this->carTable;
	}
}