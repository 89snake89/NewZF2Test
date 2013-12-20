<?php
namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SuccessController extends AbstractActionController
{
	public function indexAction()
	{
		return new ViewModel();
	}
}