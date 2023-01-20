<?php

namespace saeedncc\ObjectMapper\Property;


class IntegerProperty extends Property
{
	

	/**
	* @return int
	*/
	public function getDefault():int
	{
			return 0;
	}
	
	/**
	* @param mixed $value 
	* @return int
	*/
	public function convert($value):int
	{
		return (int)$value;		
	}
	
}

