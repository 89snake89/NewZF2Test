<?php
namespace Car\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class CarTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway){
		$this->tableGateway = $tableGateway;
	}
	
	/**
	 * Return car with pagination
	 * @param boolean $paginated (default FALSE)
	 * @return \Car\Model\Paginator|unknown
	 */
	public function fetchAll($paginated = false)
    {
        if ($paginated) {
            // create a new Select object for the table cars
            $select = new \Zend\Db\Sql\Select('cars');
            // create a new result set based on the Car entity
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Car());
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
	
	/**
	 * 
	 * @param int $carId
	 * @throws \Exception
	 * @return Ambigous <multitype:, ArrayObject, NULL, \ArrayObject, unknown>
	 */
	public function getCar($carId){
		$carId = (int) $carId;
		$carRowset = $this->tableGateway->select(array('id' => $carId));
		
		$row = $carRowset->current();
		
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
	
	public function saveCar(Car $car){
		$data = array(
				'model' => $car->getModel(),
				'brand' => $car->getBrand()
		);
		
		$carId = (int) $car->id;
		if ($carId == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getCar($carId)) {
				$this->tableGateway->update($data, array('id' => $carId));
			} else {
				throw new \Exception('Car id does not exist');
			}
		}
	}
	
	public function deleteCar($carId){
		$this->tableGateway->delete(array('id' => $carId));
	}
}