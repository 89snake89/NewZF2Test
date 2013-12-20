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
				'username' => $user->getUsername(),
				'password' => $user->getPassword()
		);
		
		$this->tableGateway->insert($data);
	}
}