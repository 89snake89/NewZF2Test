<?php
return array(
		'controllers' => array(
				'invokables' => array(
						'Login\Controller\Auth' => 'Login\Controller\AuthController',
						'Login\Controller\Success' => 'Login\Controller\SuccessController',
				),
		),
		'router' => array(
				'routes' => array(
						 
						'login' => array(
								'type'    => 'Literal',
								'options' => array(
										'route'    => '/login',
										'defaults' => array(
												'__NAMESPACE__' => 'Login\Controller',
												'controller'    => 'Auth',
												'action'        => 'login',
										),
								),
								'may_terminate' => true,
								'child_routes' => array(
										'process' => array(
												'type'    => 'Segment',
												'options' => array(
														'route'    => '/[:action]',
														'constraints' => array(
																'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
																'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
														),
														'defaults' => array(
														),
												),
										),
								),
						),
						 
						'success' => array(
								'type'    => 'Literal',
								'options' => array(
										'route'    => '/success',
										'defaults' => array(
												'__NAMESPACE__' => 'Login\Controller',
												'controller'    => 'Success',
												'action'        => 'index',
										),
								),
								'may_terminate' => true,
								'child_routes' => array(
										'default' => array(
												'type'    => 'Segment',
												'options' => array(
														'route'    => '/[:action]',
														'constraints' => array(
																'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
																'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
														),
														'defaults' => array(
														),
												),
										),
								),
						),
						 
				),
		),
		'view_manager' => array(
				'template_path_stack' => array(
						'Login' => __DIR__ . '/../view',
				),
		),
);