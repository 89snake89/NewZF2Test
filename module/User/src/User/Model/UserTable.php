<?php
namespace User\Model;

use Zend\Db\TableGateway\TableGateway;
class UserTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway){
		$this->tableGateway = $tableGateway;
	}
	
	public function saveUser(User $user){
		$data = array(
				'id' => null,
				'username' => $user->getUsername(),
				'password' => $user->getPassword(),
				'name' => $user->getName(),
				'surname' => $user->getSurname(),
				'gender' => $user->getGender()
		);
		
		$this->tableGateway->insert($data);
	}
}