<?php
namespace User\Model;

class User
{
	public $id;
	private $username;
	private $password;
	private $name;
	private $surname;
	private $gender;
	
	/**
	 * Empty constructor
	 */
	public function __construct(){}
	
	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->username = (!empty($data['username'])) ? $data['username'] : null;
		$this->password  = (!empty($data['password'])) ? sha1($data['password']) : null;
		$this->name     = (!empty($data['name'])) ? $data['name'] : null;
		$this->surname = (!empty($data['surname'])) ? $data['surname'] : null;
		$this->gender  = (!empty($data['gender'])) ? $data['gender'] : null;
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
	
	/**
	 * Get name method
	 * @return string
	 */
	public function getName(){
		return $this->name;
	}
	
	/**
	 * Get surname method
	 * @return String <NULL, unknown>
	 */
	public function getSurname(){
		return $this->surname;
	}
	
	/**
	 * Get gender method
	 * @return String <NULL, string>
	 */
	public function getGender(){
		return $this->gender;
	}
}