<?php
namespace Login\Model;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
class Login implements InputFilterAwareInterfacet
{
	private $id;
	private $user;
	private $password;
	private $rememberme;
	
	protected $inputFilter;
	
	public function setInputFilter(InputFilterInterface $inputFilter){
		throw new \Exception("Not used");
	}
}