<?php 
namespace Login;

use Zend\Db\ResultSet\ResultSet;
use Login\Model\LoginTable;
use Zend\Db\TableGateway\TableGateway;
use Login\Model\Login;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\AuthenticationService;

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
						'Login\Model\LoginTable' => function ($sm) {
							$tableGateway = $sm->get('LoginTableGateway');
							$table = new LoginTable($tableGateway);
							return $table;
						},
						'LoginTableGateway' => function ($sm) {
							$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Login());
							return new TableGateway('users', $dbAdapter, null, $resultSetPrototype); //Set table name
						},
						'Login\Model\MyAuthStorage' => function($sm){
							return new MyAuthStorage('zf_tutorial');
						},
						'AuthService' => function($sm) {
							//My assumption, you've alredy set dbAdapter
							//and has users table with columns : user_name and pass_word
							//that password hashed with md5
							$dbAdapter           = $sm->get('Zend\Db\Adapter\Adapter');
							$dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter,
									'users','username','password', 'SHA1(?)');
							 
							$authService = new AuthenticationService();
							$authService->setAdapter($dbTableAuthAdapter);
							$authService->setStorage($sm->get('SanAuth\Model\MyAuthStorage'));
						
							return $authService;
						},
				),
		);
	}
}