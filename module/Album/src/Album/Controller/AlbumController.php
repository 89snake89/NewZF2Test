<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album;
use Album\Form\AlbumForm;

class AlbumController extends AbstractActionController
{
	protected $albumTable;
	
	public function indexAction()
	{
		// grab the paginator from the AlbumTable
		$paginator = $this->getAlbumTable()->fetchAll(true);
		// set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
		// set the number of items per page to 20
		$paginator->setItemCountPerPage(20);
		return new ViewModel(array(
				'paginator' => $paginator,
		));
	}

	public function addAction()
	{
		$form = new AlbumForm();
		$form->get('submit')->setValue('Add');
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$album = new Album();
			$form->setInputFilter($album->getInputFilter());
			$form->setData($request->getPost());
		
			if ($form->isValid()) {
				$album->exchangeArray($form->getData());
				$this->getAlbumTable()->saveAlbum($album);
		
				// Redirect to list of albums
				return $this->redirect()->toRoute('album');
			}
		}
		return array('form' => $form);
		
	}

	public function editAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('album', array(
					'action' => 'add'
			));
		}
		
		// Get the Album with the specified id.  An exception is thrown
		// if it cannot be found, in which case go to the index page.
		try {
			$album = $this->getAlbumTable()->getAlbum($id);
		}
		catch (\Exception $ex) {
			return $this->redirect()->toRoute('album', array(
					'action' => 'index'
			));
		}
		
		$form  = new AlbumForm();
		$form->bind($album);
		$form->get('submit')->setAttribute('value', 'Edit');
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter($album->getInputFilter());
			$form->setData($request->getPost());
		
			if ($form->isValid()) {
				$this->getAlbumTable()->saveAlbum($album);
		
				// Redirect to list of albums
				return $this->redirect()->toRoute('album');
			}
		}
		
		return array(
				'id' => $id,
				'form' => $form,
		);
	}

	public function deleteAction()
	{
		$request = $this->getRequest();
		$response = $this->getResponse();
		if ($request->isPost()) {
			$id = (int) $request->getPost('id');
			if($this->getAlbumTable()->deleteAlbum($id)){
				$response->setContent(\Zend\Json\Json::encode(array('response' => false)));
			}else{
				$response->setContent(\Zend\Json\Json::encode(array('response' => true)));
			}
		}
	}
	
	public function getAlbumTable()
	{
		if (!$this->albumTable) {
			$sm = $this->getServiceLocator();
			$this->albumTable = $sm->get('Album\Model\AlbumTable');
		}
		return $this->albumTable;
	}
	
}