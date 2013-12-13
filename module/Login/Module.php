<?php 
namespace Login;

use Zend\Db\ResultSet\ResultSet;
use Login\Model\LoginTable;
use Zend\Db\TableGateway\TableGateway;
use Login\Model\Login;

class Module{
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
				),
		);
	}
}