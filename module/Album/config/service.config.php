<?php
namespace Album;
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Album\Model\Album;
use Zend\Db\TableGateway\TableGateway;

return array(
		'factories' => array(
				'doctrine.authenticationadapter.orm_another'  => new \DoctrineModule\Service\Authentication\AdapterFactory('orm_another'),
				'doctrine.authenticationstorage.orm_another'  => new \DoctrineModule\Service\Authentication\StorageFactory('orm_another'),
				'doctrine.authenticationservice.orm_another'  => new \DoctrineModule\Service\Authentication\AuthenticationServiceFactory('orm_another'),
				'doctrine.connection.orm_another'             => new \DoctrineORMModule\Service\DBALConnectionFactory('orm_another'),
				'doctrine.configuration.orm_another'          => new \DoctrineORMModule\Service\ConfigurationFactory('orm_another'),
				'doctrine.entitymanager.orm_another'          => new \DoctrineORMModule\Service\EntityManagerFactory('orm_another'),
				'doctrine.driver.orm_another'                 => new \DoctrineModule\Service\DriverFactory('orm_another'),
				'doctrine.eventmanager.orm_another'           => new \DoctrineModule\Service\EventManagerFactory('orm_another'),
				'doctrine.entity_resolver.orm_another'        => new \DoctrineORMModule\Service\EntityResolverFactory('orm_another'),
				'doctrine.sql_logger_collector.orm_another'   => new \DoctrineORMModule\Service\SQLLoggerCollectorFactory('orm_another'),
				'doctrine.mapping_collector.orm_another'      => function (\Zend\ServiceManager\ServiceLocatorInterface $sl) {
					$em = $sl->get('doctrine.entitymanager.orm_another');
					return new \DoctrineORMModule\Collector\MappingCollector($em->getMetadataFactory(), 'orm_another_mappings');
				},
				'DoctrineORMModule\Form\Annotation\AnnotationBuilder' => function(\Zend\ServiceManager\ServiceLocatorInterface $sl) {
					return new \DoctrineORMModule\Form\Annotation\AnnotationBuilder($sl->get('doctrine.entitymanager.orm_another'));
				},
				'Album\Model\AlbumTable' =>  function($sm) {
					$tableGateway = $sm->get('AlbumTableGateway');
					$table = new AlbumTable($tableGateway);
					return $table;
				},
				'AlbumTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Album());
					return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
				},
		),
);