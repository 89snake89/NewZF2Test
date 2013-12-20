<?php 
namespace Login;

use Zend\Db\ResultSet\ResultSet;
use Login\Model\LoginTable;
use Zend\Db\TableGateway\TableGateway;
use Login\Model\Login;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Login\Model\MyAuthStorage;

class Module implements AutoloaderProviderInterface{
	public function getAutoloaderConfig()
	{
		return array(
				'Zend\Loader\ClassMapAutoloader' => array(
						__DIR__ . '/autoload_classmap.php',
				),
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
						),
				),
		);
	}
	
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	public function getServiceConfig()
	{
		return array(
				'factories' => array(
						'Login\Model\MyAuthStorage' => function($sm){
							return new MyAuthStorage('Login');
						},
						'AuthService' => function($sm) {
							$dbAdapter           = $sm->get('Zend\Db\Adapter\Adapter');
							$dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter,
									'users','username','password', 'SHA1(?)');
							 
							$authService = new AuthenticationService();
							$authService->setAdapter($dbTableAuthAdapter);
							$authService->setStorage($sm->get('Login\Model\MyAuthStorage'));
						
							return $authService;
						},
				),
		);
	}
}