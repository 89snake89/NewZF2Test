<?php
namespace AlbumTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class AlbumControllerTest extends AbstractHttpControllerTestCase
{
	protected $traceError = true;
	public function setUp()
	{
		
		$this->setApplicationConfig(
				include '../../../../config/application.config.php'
		);
		parent::setUp();
	}
	
	public function testIndexActionCanBeAccessed()
	{
		$this->dispatch('/album');
		$this->assertResponseStatusCode(200);
	
		$this->assertModuleName('Album');
		$this->assertControllerName('Album\Controller\Album');
		$this->assertControllerClass('AlbumController');
		$this->assertMatchedRouteName('album');
	}
}