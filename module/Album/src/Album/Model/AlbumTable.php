<?php
namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Console\Prompt\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Album\Form\SearchForm;

class AlbumTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll($paginated=false)
    {
        if ($paginated) {
            // create a new Select object for the table album
            $select = new \Zend\Db\Sql\Select('album');
            // create a new result set based on the Album entity
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Album());
            // create a new pagination adapter object
            $paginatorAdapter = new DbSelect(
                $select,
                // the adapter to run it against
                $this->tableGateway->getAdapter(),
                // the result set to hydrate
                $resultSetPrototype
            );
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
	
    public function searchAlbum($searchKey){
    	// create a new Select object for the table album
    	$select = new \Zend\Db\Sql\Select('album');
    	$select->where('title LIKE \'%'.$searchKey.'%\'');
    	// create a new result set based on the Album entity
    	$resultSetPrototype = new ResultSet();
    	$resultSetPrototype->setArrayObjectPrototype(new Album());
    	// create a new pagination adapter object
    	$paginatorAdapter = new DbSelect(
    			$select,
    			// the adapter to run it against
    			$this->tableGateway->getAdapter(),
    			// the result set to hydrate
    			$resultSetPrototype
    	);
    	$paginator = new Paginator($paginatorAdapter);
    	return $paginator;
    }
    
	public function getAlbum($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveAlbum(Album $album)
	{
		$data = array(
				'artist' => $album->artist,
				'title'  => $album->title,
		);

		$id = (int) $album->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getAlbum($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Album id does not exist');
			}
		}
	}

	public function deleteAlbum($id)
	{
		return $this->tableGateway->delete(array('id' => (int) $id));
	}
}