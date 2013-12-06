<?php
return array(
		//Definition of module's controllers
		'controllers' => array(
				'invokables' => array(
						'Car\Controller\Car' => 'Car\Controller\CarController',
				),
		),
		// Definition of Module's routes
		'router' => array(
				'routes' => array(
						'car' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/car[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'car\Controller\car',
												'action'     => 'index',
										),
								),
						),
				),
		),
		//Definition view managers
		'view_manager' => array(
				'template_path_stack' => array(
						'car' => __DIR__ . '/../view',
				),
		),
);