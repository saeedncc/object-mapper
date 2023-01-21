<?php

namespace saeedncc\ObjectMapper\Property;


class ObjectProperty extends Property
{
	
	public $name;
	public $mapname;
	public $subproperty;
	
	public function __construct($name,$mapname,$subproperty){
		$this->name=$name;
		$this->mapname=$mapname;
		$this->subproperty=$subproperty;
	}

	/**
	* @return array
	*/
	public function getDefault():array
	{
			return [];
	}
	
	/**
	* @param mixed $value 
	* @return array
	*/
	public function convert($value):array
	{
		return (array)$value;		
	}
	
}

