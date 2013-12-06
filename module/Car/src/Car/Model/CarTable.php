<?php
namespace Car\Model;

use Zend\Db\TableGateway\TableGateway;

class CarTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway){
		$this->tableGateway = $tableGateway;
	}
	
	/**
	 * Return all cars
	 * @return Ambigous <\Zend\Db\ResultSet\ResultSet, NULL, \Zend\Db\ResultSet\ResultSetInterface>
	 */
	public function fetchAll(){
		$result = $this->tableGateway->select();
		return $result;
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
				'brand' => $ar->getBrand()
		);
		
		$carId = (int) $car->id;
		if ($id == 0) {
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