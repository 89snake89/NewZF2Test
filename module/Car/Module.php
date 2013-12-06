<?php
namespace Car;
use Car\Model\CarTable;
use Car\Model\Car;
class Module
{
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
					'Car\Model\CarTable' => function ($sm) {
						$tableGateway = $sm->get('CarTableGateway');
						$table = new CarTable($tableGateway);
						return $table;
					},
				'CarTableGateway' => function ($sm) {
							$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Car());
							return new TableGateway('cars', $dbAdapter, null, $resultSetPrototype); //Set table name
						},
				),
		);
	}

}