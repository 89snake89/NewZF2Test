<?php
namespace Car\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Car implements InputFilterAwareInterface
{
	public $id;
	private $brand;
	private $model;
	
	protected $inputFilter;
	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->brand = (!empty($data['brand'])) ? $data['brand'] : null;
		$this->model  = (!empty($data['model'])) ? $data['model'] : null;
	}
	
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	/**
	 * Filter input 
	 * @see \Zend\InputFilter\InputFilterAwareInterface::getInputFilter()
	 */
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
	
			$inputFilter->add(array(
					'name'     => 'id',
					'required' => true,
					'filters'  => array(
							array('name' => 'Int'),
					),
			));
	
			$inputFilter->add(array(
					'name'     => 'brand',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 127,
									),
							),
					),
			));
	
			$inputFilter->add(array(
					'name'     => 'model',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 127,
									),
							),
					),
			));
	
			$this->inputFilter = $inputFilter;
		}
	
		return $this->inputFilter;
	}
	
	public function getBrand(){
		return $this->brand;
	}
	
	public function getModel(){
		return $this->model;
	}
	
	public function setBrand($newBrand){
		$this->brand = $newBrand;
	}
	
	public function setModel($newModel){
		$this->model = $newModel;
	}
}