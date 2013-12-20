<?php
namespace User\Model;

class User
{
	private $id;
	private $username;
	private $password;
	
	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->username = (!empty($data['artist'])) ? $data['username'] : null;
		$this->password  = (!empty($data['title'])) ? $data['password'] : null;
	}
}