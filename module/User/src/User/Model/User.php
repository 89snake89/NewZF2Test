<?php
namespace User\Model;

class User
{
	private $id;
	private $username;
	private $password;
	
	/**
	 * Empty constructor
	 */
	public function __construct(){}
	
	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->username = (!empty($data['artist'])) ? $data['username'] : null;
		$this->password  = (!empty($data['title'])) ? $data['password'] : null;
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