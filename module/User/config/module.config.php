<?php
return array(
		//Definition of module's controllers
		'controllers' => array(
				'invokables' => array(
						'User\Controller\User' => 'Album\Controller\UserController',
				),
		),
		// Definition of Module's routes
		'router' => array(
				'routes' => array(
						'album' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/album[/][:action]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
										),
										'defaults' => array(
												'controller' => 'User\Controller\User',
												'action'     => 'index',
										),
								),
						),
				),
		),
		//Definition view managers
		'view_manager' => array(
				'template_path_stack' => array(
						'album' => __DIR__ . '/../view',
				),
		),
);