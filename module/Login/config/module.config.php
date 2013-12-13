<?php
return array(
		//Definition of module's controllers
		'controllers' => array(
				'invokables' => array(
						'Login\Controller\Login' => 'Login\Controller\LoginController',
				),
		),
		// Definition of Module's routes
		'router' => array(
				'routes' => array(
						'login' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/login[/][:action]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
										),
										'defaults' => array(
												'controller' => 'Login\Controller\Login',
												'action'     => 'index',
										),
								),
						),
				),
		),
		//Definition view managers
		'view_manager' => array(
				'template_path_stack' => array(
						'login' => __DIR__ . '/../view',
				),
		),
);