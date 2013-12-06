<?php
return array(
		//Definition of module's controllers
		'controllers' => array(
				'invokables' => array(
						'Album\Controller\Album' => 'Album\Controller\AlbumController',
				),
		),
		// Definition of Module's routes
		'router' => array(
				'routes' => array(
						'album' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/album[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Album\Controller\Album',
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