<?php
namespace Login\Model;

use Zend\Authentication\Storage\Session;

class MyAuthStorage extends Session
{
	public function setRememberMe($rememberMe = 0, $time = 1209600){
		if($rememberMe == 1){
			$this->session->getManager()->remenberMe($time);
		}
	}
	
	public function forgetMe(){
		$this->session->getManager()->forgetMe();
	}
}