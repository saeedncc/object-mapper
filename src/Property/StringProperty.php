<?php

namespace saeedncc\ObjectMapper\Property;


class StringProperty extends Property
{
	

	/**
	* @return string
	*/
	public function getDefault():string
	{
			return '';
	}
	
	/**
	* @param mixed $value 
	* @return string
	*/
	public function convert($value):string
	{
		return (string)$value;		
	}
	
}

