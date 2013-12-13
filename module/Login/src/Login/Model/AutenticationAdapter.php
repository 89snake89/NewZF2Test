<?php
namespace Login\Model;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Validator\Authentication;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

class AutenticationAdapter implements AdapterInterface
{
	private $username;
	private $password;
	private $dbAdapter;
	private $authAdapter;
	
	public function __construct($usr, $pwd){
		$this->username = $usr;
		$this->password = $pwd;
	}
	
	public function setDbAdapter($dbAdapter)
	{
		$this->dbAdapter = $dbAdapter;
	}
	
	public function authenticate(){
		// Configure the instance with constructor parameters...
	    $this->authAdapter = new AuthAdapter($this->dbAdapter, 'user', 'Mail', 'Psw');
	    
	    $this->authAdapter->setIdentity($this->username)
                                    ->setCredential($this->password)
                                    ->setCredentialTreatment('SHA1(?)');
	}
	
	public function getResultRowObject($returnColumns = null, $omitColumns = null)
	{
		return $this->authAdapter->getResultRowObject($returnColumns, $omitColumns);
	}
}