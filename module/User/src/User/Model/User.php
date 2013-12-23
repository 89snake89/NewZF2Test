<?php
namespace User\Model;

class User
{
	public $id;
	private $username;
	private $password;
	
	/**
	 * Empty constructor
	 */
	public function __construct(){}
	
	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->username = (!empty($data['username'])) ? $data['username'] : null;
		$this->password  = (!empty($data['password'])) ? sha1($data['password']) : null;
	}
	
	/**
	 * Get username method
	 * @return string <NULL, unknown>
	 */
	public function getUsername(){
		return $this->username;
	}
	
	/**
	 * Get password method
	 * @return string <NULL, unknown>
	 */
	public function getPassword(){
		return $this->password;
	}
}