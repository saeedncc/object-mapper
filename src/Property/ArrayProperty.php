<?php

namespace saeedncc\ObjectMapper\Property;


class ArrayProperty extends Property
{
	

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

