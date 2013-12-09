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
		$albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
		->disableOriginalConstructor()
		->getMock();
		
		$albumTableMock->expects($this->once())
		->method('fetchAll')
		->will($this->returnValue(array()));
		
		$serviceManager = $this->getApplicationServiceLocator();
		$serviceManager->setAllowOverride(true);
		$serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);
		
		$this->dispatch('/album');
		$this->assertResponseStatusCode(200);
	
		$this->assertModuleName('Album');
		$this->assertControllerName('Album\Controller\Album');
		$this->assertControllerClass('AlbumController');
		$this->assertMatchedRouteName('album');
	}
	
	public function testAddActionRedirectsAfterValidPost()
	{
		$albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
		->disableOriginalConstructor()
		->getMock();
	
		$albumTableMock->expects($this->once())
		->method('saveAlbum')
		->will($this->returnValue(null));
	
		$serviceManager = $this->getApplicationServiceLocator();
		$serviceManager->setAllowOverride(true);
		$serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);
	
		$postData = array(
				'title'  => 'Led Zeppelin III',
				'artist' => 'Led Zeppelin',
		);
		$this->dispatch('/album/add', 'POST', $postData);
		$this->assertResponseStatusCode(302);
	
		$this->assertRedirectTo('/album');
	}
	
	public function testCanRetrieveAnAlbumByItsId()
	{
		$album = new Album();
		$album->exchangeArray(array('id'     => 123,
				'artist' => 'The Military Wives',
				'title'  => 'In My Dreams'));
	
		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Album());
		$resultSet->initialize(array($album));
	
		$mockTableGateway = $this->getMock(
				'Zend\Db\TableGateway\TableGateway',
				array('select'),
				array(),
				'',
				false
		);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with(array('id' => 123))
		->will($this->returnValue($resultSet));
	
		$albumTable = new AlbumTable($mockTableGateway);
	
		$this->assertSame($album, $albumTable->getAlbum(123));
	}
	
	public function testCanDeleteAnAlbumByItsId()
	{
		$mockTableGateway = $this->getMock(
				'Zend\Db\TableGateway\TableGateway',
				array('delete'),
				array(),
				'',
				false
		);
		$mockTableGateway->expects($this->once())
		->method('delete')
		->with(array('id' => 123));
	
		$albumTable = new AlbumTable($mockTableGateway);
		$albumTable->deleteAlbum(123);
	}
	
	public function testSaveAlbumWillInsertNewAlbumsIfTheyDontAlreadyHaveAnId()
	{
		$albumData = array(
				'artist' => 'The Military Wives',
				'title'  => 'In My Dreams'
		);
		$album     = new Album();
		$album->exchangeArray($albumData);
	
		$mockTableGateway = $this->getMock(
				'Zend\Db\TableGateway\TableGateway',
				array('insert'),
				array(),
				'',
				false
		);
		$mockTableGateway->expects($this->once())
		->method('insert')
		->with($albumData);
	
		$albumTable = new AlbumTable($mockTableGateway);
		$albumTable->saveAlbum($album);
	}
	
	public function testSaveAlbumWillUpdateExistingAlbumsIfTheyAlreadyHaveAnId()
	{
		$albumData = array(
				'id'     => 123,
				'artist' => 'The Military Wives',
				'title'  => 'In My Dreams',
		);
		$album     = new Album();
		$album->exchangeArray($albumData);
	
		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Album());
		$resultSet->initialize(array($album));
	
		$mockTableGateway = $this->getMock(
				'Zend\Db\TableGateway\TableGateway',
				array('select', 'update'),
				array(),
				'',
				false
		);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with(array('id' => 123))
		->will($this->returnValue($resultSet));
		$mockTableGateway->expects($this->once())
		->method('update')
		->with(
				array(
						'artist' => 'The Military Wives',
						'title'  => 'In My Dreams'
				),
				array('id' => 123)
		);
	
		$albumTable = new AlbumTable($mockTableGateway);
		$albumTable->saveAlbum($album);
	}
	
	public function testExceptionIsThrownWhenGettingNonExistentAlbum()
	{
		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Album());
		$resultSet->initialize(array());
	
		$mockTableGateway = $this->getMock(
				'Zend\Db\TableGateway\TableGateway',
				array('select'),
				array(),
				'',
				false
		);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with(array('id' => 123))
		->will($this->returnValue($resultSet));
	
		$albumTable = new AlbumTable($mockTableGateway);
	
		try {
			$albumTable->getAlbum(123);
		}
		catch (\Exception $e) {
			$this->assertSame('Could not find row 123', $e->getMessage());
			return;
		}
	
		$this->fail('Expected exception was not thrown');
	}
}